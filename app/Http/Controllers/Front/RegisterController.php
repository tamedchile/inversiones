<?php

namespace App\Http\Controllers\Front;

use App\Company;
use App\ClientDetails;
use App\DataTables\Admin\ProjectsDataTable;
use App\Currency;
use App\EmployeeDetails;
use App\Helper\Reply;
use App\Http\Requests\Front\Register\StoreRequest;
use App\Notifications\EmailVerification;
use App\Notifications\EmailVerificationSuccess;
use App\Notifications\NewCompanyRegister;
use App\Notifications\NewUser;
use App\Role;
use App\User;
use Mail;
use Session;
use App\ProjectActivity;
use App\ProjectCategory;
use App\ProjectFile;
use App\ProjectMember;
use App\ProjectTemplate;
use App\Project;
use App\Task;
use App\TaskUser;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use App\GlobalSetting;

class RegisterController extends FrontBaseController
{
    public function index() {
        $this->pageTitle = 'Sign Up';

        if($this->setting->front_design == 1){
            return view('auth.register', $this->data);
        }
        return view('front.register', $this->data);

    }

    public function store(StoreRequest $request) {

        DB::beginTransaction();
        // Save company name
        // Save Admin
        $user = new User();
        $user->company_id = 1;
        $user->name       = $request->pnombre .' '. $request->papellido;
        $user->pnombre       = $request->pnombre;
        $user->papellido       = $request->papellido;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->locale = 'en';
        $user->status = 'active';
        $user->email_verification_code = str_random(40);
        $user->save();

        $existing_client_count = ClientDetails::select('id', 'email', 'company_id')
            ->where(
                [
                    'email' => $request->input('email')
                ]
            )->count();

        if ($existing_client_count === 0) {
            $client = new ClientDetails();
            $client->company_id = 1;
            $client->user_id = $user->id;
            $client->name = $request->pnombre .' '. $request->papellido;
            $client->pnombre       = $request->pnombre;
            $client->papellido       = $request->papellido;
            $client->company_name       = $request->company_name;
            $client->email = $request->email;
            $client->save();

        } else {
            return Reply::error('Provided email is already registered. Try with different email.');
        }
        $globalSetting = GlobalSetting::first();
        if($globalSetting->email_verification == 1) {
              $user->notify(new EmailVerification($user));
              $user->status = 'deactive';
              $user->save();

              $message =  __('messages.signUpThankYouVerify');
          } else {


              $message = __('messages.signUpThankYou').' <a href="'.route('login').'">Login Now</a>.';
          }

        DB::commit();
        $datosEmail = array(
            'nombre_cliente'              => $client->name,
            'email_cliente' => $request->email
        );
        Mail::send('mail.nuevo_usuario', $datosEmail, function($message) use ($datosEmail){
            $message->from('inversiones@tamed.global', 'TAMED Inversiones');
            $message->to('enilo@tamed.global')->subject("Nuevo cliente registrado");
        });
        Mail::send('mail.nuevo_usuario', $datosEmail, function($message) use ($datosEmail){
            $message->from('inversiones@tamed.global', 'TAMED Inversiones');
            $message->to('jortega@tamed.global')->subject("Nuevo cliente registrado");
        });
        Session::flash('message1', $message);
        return redirect('login');
    }

    public function validateGoogleRecaptcha($googleRecaptchaResponse)
    {
        $client = new Client();
        $response = $client->post(
            'https://www.google.com/recaptcha/api/siteverify',
            ['form_params'=>
                [
                    'secret'=> $this->global->google_recaptcha_secret,
                    'response'=> $googleRecaptchaResponse,
                    'remoteip' => $_SERVER['REMOTE_ADDR']
                ]
            ]
        );

        $body = json_decode((string)$response->getBody());

        return $body->success;
    }

    public function getEmailVerification($code)
    {
        $this->pageTitle = __('modules.accountSettings.emailVerification');

        $user = User::where('email_verification_code', $code)->whereNotNull('email_verification_code')->withoutGlobalScope('active')->first();

        if($user) {
            $user->status = 'active';
            $user->email_verification_code = '';
            $user->save();

            $user->notify(new EmailVerificationSuccess($user));

            $adminRole = Role::where('name', 'client')->where('company_id', $user->company_id)->first();
            $user->roles()->attach($adminRole->id);

            $this->messsage = 'Has verificado correctamente tu correo electrónico. A partir de ahora puedes iniciar sesión.';
            $this->class = 'success';

            $cliente = ClientDetails::where('user_id', $user->id)->first();

            $memberExistsInTemplate = false;
            $date = Carbon::now();
            $date = $date->format('Y-m-d');
            $project = new Project();

            $project->project_name = 'Proyecto adquisición inmobiliaria cliente: '.$cliente->pnombre.' '. $cliente->papellido;
            $project->start_date = $date;
            $project->company_id = 1;
            $project->category_id = 4;
            $project->client_id = $cliente->user_id;
            $project->client_view_task = 'enable';
            $project->allow_client_notification = 'enable';
            $project->manual_timelog = 'enable';
            $project->status = 'in progress';

            $project->save();
              $template = ProjectTemplate::findOrFail(1);

              //lista los empleados de tipo asesor
              $empleados = User::join('role_user', 'users.id','role_user.user_id')->where('company_id', '!=','')->where('role_user.role_id', 4)->where('role_user.user_id', '!=',2)->get();
              $turnos = DB::table('turnos')->count();

              if($turnos == count($empleados)){
                  DB::table('turnos')->delete();
              }
              //por cada empleado inciar el reconicimiento si ya fue asignado anteriormente
              foreach($empleados as $emp){
                //selecciona el ultimo turno y si corresponde con el empleado

                $turno = DB::table('turnos')->where('user_id', $emp->user_id)->first();

                //si no encuentra al empleado en el trurno lo omite, de lo contrario lo agrega a la tabla turno
                if(!isset($turno)){

                  $turno3  = DB::table('turnos')->insert([
                    'user_id' => $emp->user_id,
                    'proyecto_id' => $project->id
                  ]);
                  break;
                }
              }

              //agrega el empleado como mienbro del proyecto
              $turno2 = DB::table('turnos')->orderby('id', 'desc')->first();

              $projectMember = new ProjectMember();

              $projectMember->user_id    = $turno2->user_id;
              $projectMember->project_id = $project->id;
              $projectMember->company_id = 1;
              $projectMember->save();


              foreach ($template->tasks as $task) {

                  $projectTask = new Task();

                  $projectTask->project_id  = $project->id;
                  $projectTask->company_id  = 1;
                  $projectTask->heading     = $task->heading;
                  $projectTask->description = $task->description;
                  $projectTask->task_category_id  = 1;
                  $projectTask->due_date    = Carbon::now()->addDay()->format('Y-m-d');
                  $projectTask->status      = 'incomplete';
                  $projectTask->save();

                  $task_user = new TaskUser();

                  switch  ($task->heading){
                    case 'Registro':
                    $task_user->user_id = $cliente->user_id;
                    break;
                    case 'Correo de bienvenida':
                    $task_user->user_id = $turno2->user_id;
                    break;
                    case 'Llenar el formulario EESS':
                    $task_user->user_id = $cliente->user_id;
                    break;
                    case 'Enviar correo con resultado del formulario capacidad preliminar crediticia':
                    $task_user->user_id = $turno2->user_id;
                    break;
                    case 'Subir liquidaciones':
                    $task_user->user_id = $cliente->user_id;
                    break;
                    case 'Subir carnet de identidad':
                    $task_user->user_id = $cliente->user_id;
                    break;
                    case 'Subir avalúo propiedades':
                    $task_user->user_id = $cliente->user_id;
                    break;
                    case 'Subir padrón vehicular':
                    $task_user->user_id = $cliente->user_id;
                    break;
                    case 'Otros documentos adicionales':
                    $task_user->user_id = $cliente->user_id;
                    break;
                    case 'Asesoría financiera':
                    $task_user->user_id = $turno2->user_id;
                    break;
                    case 'Definición de proyectos':
                    $task_user->user_id = $cliente->user_id;
                    break;
                    case 'Gestión crediticia':
                    $task_user->user_id = $turno2->user_id;
                    break;
                    case 'Correo con confirmación de crédito':
                    $task_user->user_id = $turno2->user_id;
                    break;
                    case 'Asesoría financiera 2':
                    $task_user->user_id = $turno2->user_id;
                    break;
                    case 'Aprobación bancaria':
                    $task_user->user_id = $turno2->user_id;
                    break;
                    case 'Negociación con inmobiliaria':
                    $task_user->user_id = $turno2->user_id;
                    break;
                    case 'Subir documento de reserva al DocuSign':
                    $task_user->user_id = $turno2->user_id;
                    break;
                    case 'Correo electrónico al cliente para que proceda a la firma y el pago de la reserva':
                    $task_user->user_id = $turno2->user_id;
                    break;
                    case 'Firma de la reserva en DocuSign':
                    $task_user->user_id = $cliente->user_id;
                    break;
                    case 'Pago de la reserva':
                    $task_user->user_id = $cliente->user_id;
                    break;
                    case 'Confirmación de firma y pago':
                    $task_user->user_id = $cliente->user_id;
                    break;
                    case 'Elaboración de promesa de compraventa':
                    $task_user->user_id = $turno2->user_id;
                    break;
                    case 'Correo electrónico con promesa disponible':
                    $task_user->user_id = $turno2->user_id;
                    break;
                    case 'Firma de la promesa en notaría':
                    $task_user->user_id = $cliente->user_id;
                    break;
                    case 'Seguimiento a la situación financiera del cliente':
                    $task_user->user_id = $turno2->user_id;
                    break;
                    case 'Gestión crediticia':
                    $task_user->user_id = $turno2->user_id;
                    break;
                    case 'Correo electrónico notificando aprobación o rechazo':
                    $task_user->user_id = $turno2->user_id;
                    break;
                    case 'Correo electrónico notificando escritura de compraventa':
                    $task_user->user_id = $turno2->user_id;
                    break;
                    case 'Firma por parte del cliente en notaría':
                    $task_user->user_id = $cliente->user_id;
                    break;
                    case 'Subir escritura de compraventa':
                    $task_user->user_id = $cliente->user_id;
                    break;
                    case 'Correo final con felicitaciones por ser propietario y haber trabajado con nosotros':
                    $task_user->user_id = $turno2->user_id;
                    break;
                    default:
                    $task_user->user_id = $turno2->user_id;
                  }

                  $task_user->task_id = $projectTask->id;

                  $task_user->save();
              }


            DB::table('tareas')->insert([
              'user_id' => $cliente->user_id,
              'tareas' => 3
            ]);

            $date2 = Carbon::now();
            $date2 = $date2->format('Y-m-d H:i:s');

            $tarea1 = Task::where('heading', 'Registro')->where('project_id', $project->id)->first();
            $tarea1->project_id  = $project->id;
            $tarea1->board_column_id = 4;
            $tarea1->completed_on = $date2;
            $tarea1->status      = 'completed';
            $tarea1->save();

            $tarea2 = Task::where('heading', 'Correo de bienvenida')->where('project_id', $project->id)->first();
            $tarea2->project_id  = $project->id;
            $tarea2->board_column_id = 4;
            $tarea2->completed_on = $date2;
            $tarea2->status      = 'completed';
            $tarea2->save();

          Session::flash('message1', $this->messsage);
          return redirect('login');

      } else {
          $this->messsage = 'Este email ya ha sido verificado o este enlace caducó.';
          $this->class = 'success';
          Session::flash('message1', $this->messsage);
          return redirect('login');
      }

    }
}
