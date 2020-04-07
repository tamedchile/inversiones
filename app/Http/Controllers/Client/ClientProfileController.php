<?php

namespace App\Http\Controllers\Client;

use App\ClientDetails;
use App\Helper\Files;
use App\Helper\Reply;
use App\Http\Requests\User\UpdateProfile;
use App\User;
use DB;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;

class ClientProfileController extends ClientBaseController
{

    public function __construct() {
        parent::__construct();
        $this->pageTitle = "app.menu.profileSettings";
        $this->pageIcon = 'icon-user';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $this->userDetail = auth()->user();
        $this->clientDetail = ClientDetails::where('user_id', '=', $this->userDetail->id)->first();
        return view('client.profile.edit', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProfile $request, $id) {


        config(['filesystems.default' => 'local']);

        $user = User::withoutGlobalScope('active')->findOrFail($id);

        if($request->password != ''){
            $user->password = Hash::make($request->input('password'));
        }
        $user->email = $request->email;
        $user->save();



        $client2 = ClientDetails::where('user_id', $user->id)->first();
        $client = DB::table('client_details')->where('user_id', $user->id)->update([
          'name' => $request->pnombre.' '.$request->papellido,
          'address' => $request->address,
          'pnombre' => $request->pnombre,
          'snombre' => $request->snombre,
          'papellido' => $request->papellido,
          'sapellido' => $request->sapellido,
          'rut' => $request->rut,
          'fnacimiento' => $request->fnacimiento,
          'fijo' => $request->fijo,
          'comuna' => $request->comuna,
          'ciudad' => $request->ciudad,
          'banco' => $request->banco,
          'cuentabancaria' => $request->cuentabancaria,
          'ejecutivobancario' => $request->ejecutivobancario,
          'correoejecutivo' => $request->correoejecutivo,
          'tipocuentabancaria' => $request->tipocuentabancaria,
          'email' => $request->email,
          'mobile' => $request->mobile,
          'company_name' => $request->company_name,
        ]);

        $user2 = DB::table('users')->where('id', $user->id)->update([
          'name' => $request->pnombre.' '.$request->papellido,
          'pnombre' => $request->pnombre,
          'snombre' => $request->snombre,
          'papellido' => $request->papellido,
          'sapellido' => $request->sapellido,
          'email' => $request->email,
          'mobile' => $request->mobile,
        ]);

        $datos_finalizados = ClientDetails::where('user_id', $user->id)->first();
        if ($datos_finalizados->pnombre == '' ||
        $datos_finalizados->snombre == '' ||
        $datos_finalizados->papellido == '' ||
        $datos_finalizados->sapellido == '' ||
        $datos_finalizados->rut == '' ||
        $datos_finalizados->fnacimiento == '' ||
        $datos_finalizados->company_name == '' ||
        $datos_finalizados->fijo == '' ||
        $datos_finalizados->mobile == '' ||
        $datos_finalizados->address == '' ||
        $datos_finalizados->comuna == '' ||
        $datos_finalizados->ciudad == '' ||
        $datos_finalizados->tipocuentabancaria == '' ||
        $datos_finalizados->banco == '' ||
        $datos_finalizados->cuentabancaria == '')
        {

        }else{
          $tareas = DB::table('tareas')->where('user_id', $user->id)->first();
          if ($tareas->tareas < 3){

          }else{
            DB::table('tareas')->where('id',$tareas->id)->decrement('tareas');
          }

        }

        if ($request->hasFile('image')) {
            Files::deleteFile($client2->image,'avatar');
            $client2->image = Files::upload($request->image, 'avatar',300);
        }

        if ($request->hasFile('image')) {
            Files::deleteFile($user->image,'avatar');
            $user->image = Files::upload($request->image, 'avatar',300);
            $user->save();
        }

        $client2->save();
        return Reply::redirect(route('client.profile.index'), __("messages.profileUpdated"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function changeLanguage(Request $request) {
        $setting = User::findOrFail($this->user->id);
        $setting->locale = $request->input('lang');
        $setting->save();
        session()->forget('user');
        return Reply::success('Language changed successfully.');
    }

    public function changeCompany(Request $request) {
        $user = User::findOrFail(auth()->user()->id);
        $user->save();

        Auth::logout();
        Auth::login($user);

        return Reply::success(__('messages.companyChanged'));
    }

    public function form(){

        $this->userDetail = auth()->user();
        $this->clientDetail = ClientDetails::where('user_id', '=', $this->userDetail->id)->first();
        return view('client.tasks.form', $this->data);

    }
}
