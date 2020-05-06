<?php

namespace App\Http\Controllers\Client;

use App\ClientDetails;
use App\Helper\Files;
use App\Helper\Reply;
use App\Http\Requests\User\UpdateProfile;
use App\User;
use App\Eess;
use App\Conyuge;
use App\Vehiculo;
use App\InstrumentoInversion;
use App\ParticipacionEmpresa;
use App\CuentaCorriente;
use App\CreditoConsumo;
use App\Propiedad;
use App\CreditoHipotecario;
use App\Tareas;
use DB;
use Mail;
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
        $eess = Eess::where('user_id',$this->clientDetail->id)->first();
        $conyuge = Conyuge::where('user_id',$this->clientDetail->id)->first();
        $vehiculos = Vehiculo::where('user_id',$this->clientDetail->id)->get();
        $inversion = InstrumentoInversion::where('user_id',$this->clientDetail->id)->get();
        $participacionEmpresas = ParticipacionEmpresa::where('user_id',$this->clientDetail->id)->get();
        $cuentaCorriente = CuentaCorriente::where('user_id',$this->clientDetail->id)->get();
        $creditoConsumo = CreditoConsumo::where('user_id',$this->clientDetail->id)->get();
        $propiedades = Propiedad::where('user_id',$this->clientDetail->id)->get();

 

        if($eess == ""){

            $eess2 = New Eess();
            $eess2->user_id = $this->clientDetail->id;
            $eess2->paso = 1;

            $eess2->save();

            return view('client.tasks.form', $this->data)->with('eess',$eess2)->with('conyuge',$conyuge)->with('vehiculos',$vehiculos)->with('inversiones',$inversion)->with('participacionEmpresas',$participacionEmpresas)->with('cuentasCorriente',$cuentaCorriente)->with('creditosConsumo',$creditoConsumo)->with('propiedades',$propiedades);

        }else{

            return view('client.tasks.form', $this->data)->with('eess',$eess)->with('conyuge',$conyuge)->with('vehiculos',$vehiculos)->with('inversiones',$inversion)->with('participacionEmpresas',$participacionEmpresas)->with('cuentasCorriente',$cuentaCorriente)->with('creditosConsumo',$creditoConsumo)->with('propiedades',$propiedades);

        }
        
        

    }

    public function guardarDatosPersonales(Request $request){


       $cliente =  ClientDetails::where('id', $request->id)->first();
       $eess = Eess::where('user_id', $cliente->id)->first();

       $cliente->pnombre = $request->primer_nombre;
       $cliente->snombre = $request->segundo_nombre;
       $cliente->papellido = $request->primer_apellido;
       $cliente->sapellido = $request->segundo_apellido;
       $cliente->nacionalidad = $request->nacionalidad;
       $cliente->rut = $request->rut;

       if($request->primer_nombre != "" || $request->segundo_nombre != "" || $request->primer_apellido != "" || $request->segundo_apellido != "" || $request->nacionalidad != "" || $request->rut != ""  ){

        $cliente->estado = 1;  

       }else{

        $cliente->estado = 0; 

       }

       if($eess->paso == 12){

       }else{

        $eess->paso = $eess->paso+1;
        $eess->save();
       }
       

       $cliente->save();

       

       if($cliente->save()){

           return 1;

       }else{

           return 0;
       }

    }

    public function guardarDatosMotivacion(Request $request){


       $cliente = ClientDetails::where('id', $request->id)->first();
       $motivacion =  $request->motivacion;
       $tipo_vivienda_inversion =  $request->tipo_vivienda_inversion;
       $cant_propiedades_inversion =  $request->cant_propiedades_inversion;

       $eess = Eess::where('user_id', $cliente->id)->first();

       $eess->motivacion = $motivacion;
       $eess->tipo_v_motivacion = $tipo_vivienda_inversion;

       if($eess->paso == 12){

       }else{

        $eess->paso = $eess->paso+1;
       }

       if($motivacion == "Vivienda de inversión"){

           $eess->cant_v_motivacion = $cant_propiedades_inversion;

           if($eess->motivacion != "" || $eess->tipo_v_motivacion != "" || $eess->cant_v_motivacion != "" ){

               $eess->estado_motivacion = 1;

           }else{
               $eess->estado_motivacion = 0;
           }

       }else{

           $eess->cant_v_motivacion = null;

           if($eess->motivacion != "" || $eess->tipo_v_motivacion != ""){

               $eess->estado_motivacion = 1;

           }else{
               $eess->estado_motivacion = 0;
           }


       }

       

       try {

         $eess->save();
         return 1;
       
       } catch (\Exception $e) {
       
           return $e->getMessage();
       }
        

    }

    public function guardarDatosEducacion(Request $request){


       $cliente =  ClientDetails::where('id', $request->id)->first();
       $rama =  $request->rama;
       $fecha_ingreso =  $request->fecha_ingreso;
       $nivel_educacional =  $request->nivel_educacional;
       $lugar_estudio =  $request->lugar_estudio;
       $titulo =  $request->titulo;
       $año_egreso =  $request->año_egreso;

        if($nivel_educacional == 'Selecciona nivel educacional'){
            $nivel_educacional = null;
        }


       $eess = Eess::where('user_id', $cliente->id)->first();

       $eess->rama = $rama;
       $eess->fecha_ingreso_rama = $fecha_ingreso;
       $eess->nvl_educacional = $nivel_educacional;
       $eess->lugar_estudio = $lugar_estudio;
       $eess->titulo = $titulo;
       $eess->año_egreso = $año_egreso;

       if($eess->paso == 12){

       }else{

        $eess->paso = $eess->paso+1;

       }


       if($eess->rama != "" || $eess->fecha_ingreso_rama != "" || $eess->nvl_educacional != "" || $eess->lugar_estudio != "" || $eess->titulo != "" || $eess->año_egreso != "" ){

        $eess->estado_estudio = 1;

       }else{

        $eess->estado_estudio = 0;

       }

       

       try {

         $eess->save();

         return 1;
       
       } catch (\Exception $e) {
       
           return $e->getMessage();
       }
        

    }


    public function guardarDatosEstadoCivil(Request $request){


       $cliente =  ClientDetails::where('id', $request->id)->first();
       $estado_civil =  $request->estado_civil;
       $dependientes_usuario =  $request->dependientes_usuario;
       $pnombre_conyuge =  $request->pnombre_conyuge;
       $snombre_conyuge =  $request->snombre_conyuge;
       $rut_conyuge =  $request->rut_conyuge;
       $fecha_nacimiento_conyuge =  $request->fecha_nacimiento_conyuge;
       $nacionalidad_conyuge =  $request->nacionalidad_conyuge;
       $nivel_educacional_conyuge =  $request->nivel_educacional_conyuge;
       $ocupacion =  $request->ocupacion;
       $ingreso =  $request->ingreso;
       $apellidos_conyuge =  $request->apellidos_conyuge;
       $regimen_matrimonial =  $request->regimen_matrimonial;

       $eess = Eess::where('user_id', $cliente->id)->first();

       $eess->estado_civil = $estado_civil;
       $eess->personas_cargo = $dependientes_usuario;

       if($eess->paso == 12){

       }else{

        $eess->paso = $eess->paso+1;
       }

       if($estado_civil == 'Casado'){
        $eess->regimen_matrimonial = $regimen_matrimonial;
            if($estado_civil != "" || $dependientes_usuario != "" || $regimen_matrimonial != ""){
                $eess->estado_dependencia = 1;   
            }else{
                $eess->estado_dependencia = 0;   
            }

        $conyuge = Conyuge::where('user_id',$cliente->id)->first();

        if($conyuge == ""){

            $conyuge2 = new Conyuge();
            $conyuge2->user_id = $cliente->id;
            $conyuge2->pnombre = $pnombre_conyuge;
            $conyuge2->snombre = $snombre_conyuge;
            $conyuge2->apellidos = $apellidos_conyuge;
            $conyuge2->rut = $rut_conyuge;
            $conyuge2->fnacimiento = $fecha_nacimiento_conyuge;
            $conyuge2->nacionalidad = $nacionalidad_conyuge;
            $conyuge2->nvl_educacional = $nivel_educacional_conyuge;
            $conyuge2->ocupacion = $ocupacion;
            $conyuge2->ingresos = $ingreso;

            if($conyuge2->pnombre == "" || $conyuge2->snombre == "" || $conyuge2->apellidos == "" || $conyuge2->rut == "" || $conyuge2->fnacimiento == "" || $conyuge2->nacionalidad == "" || $conyuge2->nvl_educacional == "" || $conyuge2->ocupacion == "" || $conyuge2->ingresos == "" ){

                $conyuge2->estado = 0;

            }else{

                $conyuge2->estado = 1;

            }


            try {

              $eess->save();

              $conyuge2->save();

              return 1;
            
            } catch (\Exception $e) {
            
                return $e->getMessage();
            }
        

        }else{

            $conyuge->pnombre = $pnombre_conyuge;
            $conyuge->snombre = $snombre_conyuge;
            $conyuge->apellidos = $apellidos_conyuge;
            $conyuge->rut = $rut_conyuge;
            $conyuge->fnacimiento = $fecha_nacimiento_conyuge;
            $conyuge->nacionalidad = $nacionalidad_conyuge;
            $conyuge->nvl_educacional = $nivel_educacional_conyuge;
            $conyuge->ocupacion = $ocupacion;
            $conyuge->ingresos = $ingreso;

            if($conyuge->pnombre == "" || $conyuge->snombre == "" || $conyuge->apellidos == "" || $conyuge->rut == "" || $conyuge->fnacimiento == "" || $conyuge->nacionalidad == "" || $conyuge->nvl_educacional == "" || $conyuge->ocupacion == "" || $conyuge->ingresos == "" ){

                $conyuge->estado = 0;

            }else{

                $conyuge->estado = 1;

            }


            try {

              $eess->save();

              $conyuge->save();

              return 1;
            
            } catch (\Exception $e) {
            
                return $e->getMessage();
            }

        }

       }else{
            if($estado_civil != "" || $dependientes_usuario != "" ){
                $eess->estado_dependencia = 1;   
            }else{
                $eess->estado_dependencia = 0;   
            }
            $eess->regimen_matrimonial = null;
        try {

              $eess->save();

              return 1;
            
            } catch (\Exception $e) {
            
                return $e->getMessage();
            }

       }

    }

    public function guardarDatosIngresos(Request $request){


       $cliente =  ClientDetails::where('id', $request->id)->first();

       $sueldo =  $request->sueldo;
       $ingresos_adicionales =  $request->ingresos_adicionales;
       $concepto_ingreso =  $request->concepto_ingreso;
       $total_adicional =  $request->total_adicional;

       


        if($ingresos_adicionales == "Si"){

            $ingresos_adicionales = 1;

        }else{

            $ingresos_adicionales = 0;
            $concepto_ingreso = null;
            $total_adicional = null;

        }


       $eess = Eess::where('user_id', $cliente->id)->first();

       if($eess->paso == 12){

                $div_mensual = 0;
        $cred_mensual = 0;
        $valor_com_prop = 0;
        $valor_com_vehiculo = 0;
        $valor_inv = 0;
        $saldos_cuentas = 0;
        $saldo_insoluto_credito = 0;
        $saldo_insoluto_tar_cred = 0;
        $saldo_insoluto_linea_cred = 0;
        $ingreso_carga = 0;

        if($eess->propiedades == 1){

          $propiedades = Propiedad::where('user_id', $eess->user_id)->get();

          if(count($propiedades) > 0){

            foreach ($propiedades as $propiedad) {
              $div_mensual = $propiedad['valor_cuota']+$div_mensual;

              $valor_com_prop = $propiedad['valor_comercial']+$valor_com_prop;


            }

          }

          $cred_mensual = $div_mensual*48*1.2;

        }


        if($eess->vehiculos == 0){

          $vehiculos = Vehiculo::where('user_id', $eess->user_id)->get();

          if(count($vehiculos) > 0){

            foreach ($vehiculos as $vehiculo) {
              $valor_com_vehiculo = $vehiculo['valor']+$valor_com_vehiculo;
            }

          }

        }

        if($eess->inversiones == 1){

          $inversiones = InstrumentoInversion::where('user_id', $eess->user_id)->get();

          if (count($inversiones) > 0) {
            
            foreach ($inversiones as $inversion ) {
              
              $valor_inv = $inversion['valor']+$valor_inv;

            }

          }

        }

        if($eess->cuenta_corriente == 1){

          $cuentas = CuentaCorriente::where('user_id', $eess->user_id)->get();

          if (count($cuentas) > 0) {
            
            foreach ($cuentas as $cuenta ) {
              
              $saldos_cuentas = $cuenta['saldo_actual']+$saldos_cuentas;

              $saldo_insoluto_linea_cred = $cuenta['monto_linea']+$saldo_insoluto_linea_cred;

              $saldo_insoluto_tar_cred = $cuenta['monto_tarjeta']+$saldo_insoluto_tar_cred;

            }

          }

        }


        if($eess->credito_consumo == 1){

          $creditos = CreditoConsumo::where('user_id', $eess->user_id)->get();

          if (count($creditos) > 0) {
            
            foreach ($creditos as $credito ) {
              
              $saldo_insoluto_credito = $credito['valor_cuota']*$credito['cuotas_restantes']*0.8;

            }

          }

        }


        if($eess->estado_civil == 'Casado'){

          $conyuge = Conyuge::where('user_id', $eess->user_id)->first();

          $ingreso_carga = $conyuge->ingresos;

          $ingreso_mensual = $eess->sueldo+$ingreso_carga * 0.75;

        }else{

          $ingreso_mensual = $eess->sueldo;

        }



        if($eess->otros_ingresos == 1){

          $otros_ingresos = $eess->total_ingreso*0.8;

        }



        $resultado1 = $ingreso_mensual-$div_mensual-$cred_mensual-50000;



        $total_activos = $valor_com_prop+$valor_com_vehiculo+$valor_inv+$saldos_cuentas;

        $total_pasivos = $saldo_insoluto_credito+$saldo_insoluto_tar_cred+$saldo_insoluto_linea_cred;



        //if($eess->nvl_educacional == "")

        $resultado =$resultado1 * (1-0.25 * $eess->personas_cargo *1.5 * 30 + ($total_activos - $total_pasivos)-$resultado1) * 10;

        $resultado2 = ((($resultado1) * (1-0.25*$eess->personas_cargo)*1.5)*0.25*12) / 0.7;


        if($resultado2 > $resultado){

          $eess->monto_preliminar = $resultado;

          $datosEmail = array(
              'nombre_cliente' => $cliente->pnombre.' '.$cliente->papellido,
              'email_cliente' => $cliente->email,
              'monto' => $resultado
          );

         Mail::send('mail.nuevo_usuario', $datosEmail, function($message) use ($datosEmail){
              $message->from('inversiones@tamed.global', 'TAMED Inversiones');
              $message->to($datosEmail['email_cliente'])->subject("Capacidad crediticia");
          });

        }else{

          $eess->monto_preliminar = $resultado2;


          $datosEmail = array(
              'nombre_cliente' => $cliente->pnombre.' '.$cliente->papellido,
              'email_cliente' => $cliente->email,
              'monto' => $resultado2
          );

           Mail::send('mail.nuevo_usuario', $datosEmail, function($message) use ($datosEmail){
              $message->from('inversiones@tamed.global', 'TAMED Inversiones');
              $message->to($datosEmail['email_cliente'])->subject("Capacidad crediticia");
          });


        }

       }else{

        $eess->paso = $eess->paso+1;
       }

       $eess->sueldo = $sueldo;
       $eess->otros_ingresos = $ingresos_adicionales; 
       $eess->concepto_ingreso = $concepto_ingreso;
       $eess->total_ingreso = $total_adicional;
       

       if($eess->sueldo != "" || $eess->concepto_ingreso != "" || $eess->total_ingreso != "" || $eess->otros_ingresos != "" ){

        $eess->estado_ingresos = 1;

       }else{

        $eess->estado_estudio = 0;

       }

       

       try {

         $eess->save();

         return 1;
       
       } catch (\Exception $e) {
       
           return $e->getMessage();
       }
        

    }

    public function guardarDatosVehiculos(Request $request){


       $cliente =  ClientDetails::where('id', $request->id)->first();
       $eess = Eess::where('user_id', $cliente->id)->first();
       if($eess->paso == 12){

        $div_mensual = 0;
        $cred_mensual = 0;
        $valor_com_prop = 0;
        $valor_com_vehiculo = 0;
        $valor_inv = 0;
        $saldos_cuentas = 0;
        $saldo_insoluto_credito = 0;
        $saldo_insoluto_tar_cred = 0;
        $saldo_insoluto_linea_cred = 0;
        $ingreso_carga = 0;

        if($eess->propiedades == 1){

          $propiedades = Propiedad::where('user_id', $eess->user_id)->get();

          if(count($propiedades) > 0){

            foreach ($propiedades as $propiedad) {
              $div_mensual = $propiedad['valor_cuota']+$div_mensual;

              $valor_com_prop = $propiedad['valor_comercial']+$valor_com_prop;


            }

          }

          $cred_mensual = $div_mensual*48*1.2;

        }


        if($eess->vehiculos == 0){

          $vehiculos = Vehiculo::where('user_id', $eess->user_id)->get();

          if(count($vehiculos) > 0){

            foreach ($vehiculos as $vehiculo) {
              $valor_com_vehiculo = $vehiculo['valor']+$valor_com_vehiculo;
            }

          }

        }

        if($eess->inversiones == 1){

          $inversiones = InstrumentoInversion::where('user_id', $eess->user_id)->get();

          if (count($inversiones) > 0) {
            
            foreach ($inversiones as $inversion ) {
              
              $valor_inv = $inversion['valor']+$valor_inv;

            }

          }

        }

        if($eess->cuenta_corriente == 1){

          $cuentas = CuentaCorriente::where('user_id', $eess->user_id)->get();

          if (count($cuentas) > 0) {
            
            foreach ($cuentas as $cuenta ) {
              
              $saldos_cuentas = $cuenta['saldo_actual']+$saldos_cuentas;

              $saldo_insoluto_linea_cred = $cuenta['monto_linea']+$saldo_insoluto_linea_cred;

              $saldo_insoluto_tar_cred = $cuenta['monto_tarjeta']+$saldo_insoluto_tar_cred;

            }

          }

        }


        if($eess->credito_consumo == 1){

          $creditos = CreditoConsumo::where('user_id', $eess->user_id)->get();

          if (count($creditos) > 0) {
            
            foreach ($creditos as $credito ) {
              
              $saldo_insoluto_credito = $credito['valor_cuota']*$credito['cuotas_restantes']*0.8;

            }

          }

        }


        if($eess->estado_civil == 'Casado'){

          $conyuge = Conyuge::where('user_id', $eess->user_id)->first();

          $ingreso_carga = $conyuge->ingresos;

          $ingreso_mensual = $eess->sueldo+$ingreso_carga * 0.75;

        }else{

          $ingreso_mensual = $eess->sueldo;

        }



        if($eess->otros_ingresos == 1){

          $otros_ingresos = $eess->total_ingreso*0.8;

        }



        $resultado1 = $ingreso_mensual-$div_mensual-$cred_mensual-50000;



        $total_activos = $valor_com_prop+$valor_com_vehiculo+$valor_inv+$saldos_cuentas;

        $total_pasivos = $saldo_insoluto_credito+$saldo_insoluto_tar_cred+$saldo_insoluto_linea_cred;



        //if($eess->nvl_educacional == "")

        $resultado =$resultado1 * (1-0.25 * $eess->personas_cargo *1.5 * 30 + ($total_activos - $total_pasivos)-$resultado1) * 10;

        $resultado2 = ((($resultado1) * (1-0.25*$eess->personas_cargo)*1.5)*0.25*12) / 0.7;


        if($resultado2 > $resultado){

          $eess->monto_preliminar = $resultado;

          $datosEmail = array(
              'nombre_cliente' => $cliente->pnombre.' '.$cliente->papellido,
              'email_cliente' => $cliente->email,
              'monto' => $resultado
          );

         Mail::send('mail.nuevo_usuario', $datosEmail, function($message) use ($datosEmail){
              $message->from('inversiones@tamed.global', 'TAMED Inversiones');
              $message->to($datosEmail['email_cliente'])->subject("Capacidad crediticia");
          });

        }else{

          $eess->monto_preliminar = $resultado2;


          $datosEmail = array(
              'nombre_cliente' => $cliente->pnombre.' '.$cliente->papellido,
              'email_cliente' => $cliente->email,
              'monto' => $resultado2
          );

           Mail::send('mail.nuevo_usuario', $datosEmail, function($message) use ($datosEmail){
              $message->from('inversiones@tamed.global', 'TAMED Inversiones');
              $message->to($datosEmail['email_cliente'])->subject("Capacidad crediticia");
          });


        }

       }else{

        $eess->paso = $eess->paso+1;
       }

       $arrayDatos =  $request->arrayDatosVehiculos;


       if($arrayDatos == "" || count($arrayDatos) == 0){

        $eess->vehiculos = 0;

       }else{

        $eess->vehiculos = 1;

        if($arrayDatos[0]['id'] == ""){

            foreach ($arrayDatos as $arrayDato ) {
                $nuevoVehiculo = new Vehiculo();
                $nuevoVehiculo->user_id = $cliente->id;
                $nuevoVehiculo->marca = $arrayDato['marca_vehiculo'];
                $nuevoVehiculo->modelo = $arrayDato['modelo_vehiculo'];
                $nuevoVehiculo->año = $arrayDato['año_vehiculo'];
                $nuevoVehiculo->patente = $arrayDato['patente_vehiculo'];
                $nuevoVehiculo->valor = $arrayDato['valor_vehiculo'];


                $nuevoVehiculo->save();

            }

        }else{

            foreach ($arrayDatos as $arrayDato ) {
                $actualizarVehiculo = Vehiculo::find($arrayDato['id']);
                $actualizarVehiculo->marca = $arrayDato['marca_vehiculo'];
                $actualizarVehiculo->modelo = $arrayDato['modelo_vehiculo'];
                $actualizarVehiculo->año = $arrayDato['año_vehiculo'];
                $actualizarVehiculo->patente = $arrayDato['patente_vehiculo'];
                $actualizarVehiculo->valor = $arrayDato['valor_vehiculo'];


                $actualizarVehiculo->save();

            }

        }

       }

       

       try {

         $eess->save();

         return 1;
       
       } catch (\Exception $e) {
       
           return $e->getMessage();
       }
        

    }


    public function guardarDatosInversiones(Request $request){


       $cliente =  ClientDetails::where('id', $request->id)->first();
       $eess = Eess::where('user_id', $cliente->id)->first();

       if($eess->paso == 12){

        $div_mensual = 0;
        $cred_mensual = 0;
        $valor_com_prop = 0;
        $valor_com_vehiculo = 0;
        $valor_inv = 0;
        $saldos_cuentas = 0;
        $saldo_insoluto_credito = 0;
        $saldo_insoluto_tar_cred = 0;
        $saldo_insoluto_linea_cred = 0;
        $ingreso_carga = 0;

        if($eess->propiedades == 1){

          $propiedades = Propiedad::where('user_id', $eess->user_id)->get();

          if(count($propiedades) > 0){

            foreach ($propiedades as $propiedad) {
              $div_mensual = $propiedad['valor_cuota']+$div_mensual;

              $valor_com_prop = $propiedad['valor_comercial']+$valor_com_prop;


            }

          }

          $cred_mensual = $div_mensual*48*1.2;

        }


        if($eess->vehiculos == 0){

          $vehiculos = Vehiculo::where('user_id', $eess->user_id)->get();

          if(count($vehiculos) > 0){

            foreach ($vehiculos as $vehiculo) {
              $valor_com_vehiculo = $vehiculo['valor']+$valor_com_vehiculo;
            }

          }

        }

        if($eess->inversiones == 1){

          $inversiones = InstrumentoInversion::where('user_id', $eess->user_id)->get();

          if (count($inversiones) > 0) {
            
            foreach ($inversiones as $inversion ) {
              
              $valor_inv = $inversion['valor']+$valor_inv;

            }

          }

        }

        if($eess->cuenta_corriente == 1){

          $cuentas = CuentaCorriente::where('user_id', $eess->user_id)->get();

          if (count($cuentas) > 0) {
            
            foreach ($cuentas as $cuenta ) {
              
              $saldos_cuentas = $cuenta['saldo_actual']+$saldos_cuentas;

              $saldo_insoluto_linea_cred = $cuenta['monto_linea']+$saldo_insoluto_linea_cred;

              $saldo_insoluto_tar_cred = $cuenta['monto_tarjeta']+$saldo_insoluto_tar_cred;

            }

          }

        }


        if($eess->credito_consumo == 1){

          $creditos = CreditoConsumo::where('user_id', $eess->user_id)->get();

          if (count($creditos) > 0) {
            
            foreach ($creditos as $credito ) {
              
              $saldo_insoluto_credito = $credito['valor_cuota']*$credito['cuotas_restantes']*0.8;

            }

          }

        }


        if($eess->estado_civil == 'Casado'){

          $conyuge = Conyuge::where('user_id', $eess->user_id)->first();

          $ingreso_carga = $conyuge->ingresos;

          $ingreso_mensual = $eess->sueldo+$ingreso_carga * 0.75;

        }else{

          $ingreso_mensual = $eess->sueldo;

        }



        if($eess->otros_ingresos == 1){

          $otros_ingresos = $eess->total_ingreso*0.8;

        }



        $resultado1 = $ingreso_mensual-$div_mensual-$cred_mensual-50000;



        $total_activos = $valor_com_prop+$valor_com_vehiculo+$valor_inv+$saldos_cuentas;

        $total_pasivos = $saldo_insoluto_credito+$saldo_insoluto_tar_cred+$saldo_insoluto_linea_cred;



        //if($eess->nvl_educacional == "")

        $resultado =$resultado1 * (1-0.25 * $eess->personas_cargo *1.5 * 30 + ($total_activos - $total_pasivos)-$resultado1) * 10;

        $resultado2 = ((($resultado1) * (1-0.25*$eess->personas_cargo)*1.5)*0.25*12) / 0.7;


        if($resultado2 > $resultado){

          $eess->monto_preliminar = $resultado;

          $datosEmail = array(
              'nombre_cliente' => $cliente->pnombre.' '.$cliente->papellido,
              'email_cliente' => $cliente->email,
              'monto' => $resultado
          );

         Mail::send('mail.nuevo_usuario', $datosEmail, function($message) use ($datosEmail){
              $message->from('inversiones@tamed.global', 'TAMED Inversiones');
              $message->to($datosEmail['email_cliente'])->subject("Capacidad crediticia");
          });

        }else{

          $eess->monto_preliminar = $resultado2;


          $datosEmail = array(
              'nombre_cliente' => $cliente->pnombre.' '.$cliente->papellido,
              'email_cliente' => $cliente->email,
              'monto' => $resultado2
          );

           Mail::send('mail.nuevo_usuario', $datosEmail, function($message) use ($datosEmail){
              $message->from('inversiones@tamed.global', 'TAMED Inversiones');
              $message->to($datosEmail['email_cliente'])->subject("Capacidad crediticia");
          });


        }

       }else{

        $eess->paso = $eess->paso+1;
       }

       $arrayDatos = $request->array;

       

       if($arrayDatos == "" || count($arrayDatos) == 0){

        $eess->inversiones = 0;

       }else{

        $eess->inversiones = 1;

        if($arrayDatos[0]['id'] == ""){

            foreach ($arrayDatos as $arrayDato ) {
                $nuevoInstrumento = new InstrumentoInversion();
                $nuevoInstrumento->user_id = $cliente->id;
                $nuevoInstrumento->tipo = $arrayDato['tipo'];
                $nuevoInstrumento->valor = $arrayDato['valor'];


                $nuevoInstrumento->save();

            }

        }else{

            foreach ($arrayDatos as $arrayDato ) {
                $actualizarInstrumento = InstrumentoInversion::find($arrayDato['id']);
                $actualizarInstrumento->tipo = $arrayDato['tipo'];
                $actualizarInstrumento->valor = $arrayDato['valor'];


                $actualizarInstrumento->save();

            }

        }

       }

       

       try {

         $eess->save();

         return 1;
       
       } catch (\Exception $e) {
       
           return $e->getMessage();
       }
        

    }


    public function guardarDatosParticipaciones(Request $request){


       $cliente =  ClientDetails::where('id', $request->id)->first();
       $eess = Eess::where('user_id', $cliente->id)->first();

       if($eess->paso == 12){

        $div_mensual = 0;
        $cred_mensual = 0;
        $valor_com_prop = 0;
        $valor_com_vehiculo = 0;
        $valor_inv = 0;
        $saldos_cuentas = 0;
        $saldo_insoluto_credito = 0;
        $saldo_insoluto_tar_cred = 0;
        $saldo_insoluto_linea_cred = 0;
        $ingreso_carga = 0;

        if($eess->propiedades == 1){

          $propiedades = Propiedad::where('user_id', $eess->user_id)->get();

          if(count($propiedades) > 0){

            foreach ($propiedades as $propiedad) {
              $div_mensual = $propiedad['valor_cuota']+$div_mensual;

              $valor_com_prop = $propiedad['valor_comercial']+$valor_com_prop;


            }

          }

          $cred_mensual = $div_mensual*48*1.2;

        }


        if($eess->vehiculos == 0){

          $vehiculos = Vehiculo::where('user_id', $eess->user_id)->get();

          if(count($vehiculos) > 0){

            foreach ($vehiculos as $vehiculo) {
              $valor_com_vehiculo = $vehiculo['valor']+$valor_com_vehiculo;
            }

          }

        }

        if($eess->inversiones == 1){

          $inversiones = InstrumentoInversion::where('user_id', $eess->user_id)->get();

          if (count($inversiones) > 0) {
            
            foreach ($inversiones as $inversion ) {
              
              $valor_inv = $inversion['valor']+$valor_inv;

            }

          }

        }

        if($eess->cuenta_corriente == 1){

          $cuentas = CuentaCorriente::where('user_id', $eess->user_id)->get();

          if (count($cuentas) > 0) {
            
            foreach ($cuentas as $cuenta ) {
              
              $saldos_cuentas = $cuenta['saldo_actual']+$saldos_cuentas;

              $saldo_insoluto_linea_cred = $cuenta['monto_linea']+$saldo_insoluto_linea_cred;

              $saldo_insoluto_tar_cred = $cuenta['monto_tarjeta']+$saldo_insoluto_tar_cred;

            }

          }

        }


        if($eess->credito_consumo == 1){

          $creditos = CreditoConsumo::where('user_id', $eess->user_id)->get();

          if (count($creditos) > 0) {
            
            foreach ($creditos as $credito ) {
              
              $saldo_insoluto_credito = $credito['valor_cuota']*$credito['cuotas_restantes']*0.8;

            }

          }

        }


        if($eess->estado_civil == 'Casado'){

          $conyuge = Conyuge::where('user_id', $eess->user_id)->first();

          $ingreso_carga = $conyuge->ingresos;

          $ingreso_mensual = $eess->sueldo+$ingreso_carga * 0.75;

        }else{

          $ingreso_mensual = $eess->sueldo;

        }



        if($eess->otros_ingresos == 1){

          $otros_ingresos = $eess->total_ingreso*0.8;

        }



        $resultado1 = $ingreso_mensual-$div_mensual-$cred_mensual-50000;



        $total_activos = $valor_com_prop+$valor_com_vehiculo+$valor_inv+$saldos_cuentas;

        $total_pasivos = $saldo_insoluto_credito+$saldo_insoluto_tar_cred+$saldo_insoluto_linea_cred;



        //if($eess->nvl_educacional == "")

        $resultado =$resultado1 * (1-0.25 * $eess->personas_cargo *1.5 * 30 + ($total_activos - $total_pasivos)-$resultado1) * 10;

        $resultado2 = ((($resultado1) * (1-0.25*$eess->personas_cargo)*1.5)*0.25*12) / 0.7;


        if($resultado2 > $resultado){

          $eess->monto_preliminar = $resultado;

          $datosEmail = array(
              'nombre_cliente' => $cliente->pnombre.' '.$cliente->papellido,
              'email_cliente' => $cliente->email,
              'monto' => $resultado
          );

         Mail::send('mail.nuevo_usuario', $datosEmail, function($message) use ($datosEmail){
              $message->from('inversiones@tamed.global', 'TAMED Inversiones');
              $message->to($datosEmail['email_cliente'])->subject("Capacidad crediticia");
          });

        }else{

          $eess->monto_preliminar = $resultado2;


          $datosEmail = array(
              'nombre_cliente' => $cliente->pnombre.' '.$cliente->papellido,
              'email_cliente' => $cliente->email,
              'monto' => $resultado2
          );

           Mail::send('mail.nuevo_usuario', $datosEmail, function($message) use ($datosEmail){
              $message->from('inversiones@tamed.global', 'TAMED Inversiones');
              $message->to($datosEmail['email_cliente'])->subject("Capacidad crediticia");
          });


        }

       }else{

        $eess->paso = $eess->paso+1;

       }

       $arrayDatos = $request->array;

       

       if($arrayDatos == "" || count($arrayDatos) == 0){

        $eess->participacion_empresa = 0;

       }else{

        $eess->participacion_empresa = 1;

        if($arrayDatos[0]['id'] == ""){

            foreach ($arrayDatos as $arrayDato ) {
                $nuevaParticipacion = new ParticipacionEmpresa();
                $nuevaParticipacion->user_id = $cliente->id;
                $nuevaParticipacion->razon_social = $arrayDato['razon_social'];
                $nuevaParticipacion->rut_sociedad = $arrayDato['rut_sociedad'];
                $nuevaParticipacion->giro_sociedad = $arrayDato['giro_sociedad'];
                $nuevaParticipacion->participacion = $arrayDato['porcentaje_participacion'];
                $nuevaParticipacion->ventas_totales = $arrayDato['ventas_totales'];

                $nuevaParticipacion->save();

            }

        }else{

            foreach ($arrayDatos as $arrayDato ) {
                $actualizarParticipacion = ParticipacionEmpresa::find($arrayDato['id']);
                $actualizarParticipacion->razon_social = $arrayDato['razon_social'];
                $actualizarParticipacion->rut_sociedad = $arrayDato['rut_sociedad'];
                $actualizarParticipacion->giro_sociedad = $arrayDato['giro_sociedad'];
                $actualizarParticipacion->participacion = $arrayDato['porcentaje_participacion'];
                $actualizarParticipacion->ventas_totales = $arrayDato['ventas_totales'];


                $actualizarParticipacion->save();

            }

        }

       }

       

       try {

         $eess->save();

         return 1;
       
       } catch (\Exception $e) {
       
           return $e->getMessage();
       }
        

    }


    public function guardarDatosCuentaCorriente(Request $request){


       $cliente =  ClientDetails::where('id', $request->id)->first();
       $eess = Eess::where('user_id', $cliente->id)->first();

       if($eess->paso == 12){


        $div_mensual = 0;
        $cred_mensual = 0;
        $valor_com_prop = 0;
        $valor_com_vehiculo = 0;
        $valor_inv = 0;
        $saldos_cuentas = 0;
        $saldo_insoluto_credito = 0;
        $saldo_insoluto_tar_cred = 0;
        $saldo_insoluto_linea_cred = 0;
        $ingreso_carga = 0;

        if($eess->propiedades == 1){

          $propiedades = Propiedad::where('user_id', $eess->user_id)->get();

          if(count($propiedades) > 0){

            foreach ($propiedades as $propiedad) {
              $div_mensual = $propiedad['valor_cuota']+$div_mensual;

              $valor_com_prop = $propiedad['valor_comercial']+$valor_com_prop;


            }

          }

          $cred_mensual = $div_mensual*48*1.2;

        }


        if($eess->vehiculos == 0){

          $vehiculos = Vehiculo::where('user_id', $eess->user_id)->get();

          if(count($vehiculos) > 0){

            foreach ($vehiculos as $vehiculo) {
              $valor_com_vehiculo = $vehiculo['valor']+$valor_com_vehiculo;
            }

          }

        }

        if($eess->inversiones == 1){

          $inversiones = InstrumentoInversion::where('user_id', $eess->user_id)->get();

          if (count($inversiones) > 0) {
            
            foreach ($inversiones as $inversion ) {
              
              $valor_inv = $inversion['valor']+$valor_inv;

            }

          }

        }

        if($eess->cuenta_corriente == 1){

          $cuentas = CuentaCorriente::where('user_id', $eess->user_id)->get();

          if (count($cuentas) > 0) {
            
            foreach ($cuentas as $cuenta ) {
              
              $saldos_cuentas = $cuenta['saldo_actual']+$saldos_cuentas;

              $saldo_insoluto_linea_cred = $cuenta['monto_linea']+$saldo_insoluto_linea_cred;

              $saldo_insoluto_tar_cred = $cuenta['monto_tarjeta']+$saldo_insoluto_tar_cred;

            }

          }

        }


        if($eess->credito_consumo == 1){

          $creditos = CreditoConsumo::where('user_id', $eess->user_id)->get();

          if (count($creditos) > 0) {
            
            foreach ($creditos as $credito ) {
              
              $saldo_insoluto_credito = $credito['valor_cuota']*$credito['cuotas_restantes']*0.8;

            }

          }

        }


        if($eess->estado_civil == 'Casado'){

          $conyuge = Conyuge::where('user_id', $eess->user_id)->first();

          $ingreso_carga = $conyuge->ingresos;

          $ingreso_mensual = $eess->sueldo+$ingreso_carga * 0.75;

        }else{

          $ingreso_mensual = $eess->sueldo;

        }



        if($eess->otros_ingresos == 1){

          $otros_ingresos = $eess->total_ingreso*0.8;

        }



        $resultado1 = $ingreso_mensual-$div_mensual-$cred_mensual-50000;



        $total_activos = $valor_com_prop+$valor_com_vehiculo+$valor_inv+$saldos_cuentas;

        $total_pasivos = $saldo_insoluto_credito+$saldo_insoluto_tar_cred+$saldo_insoluto_linea_cred;



        //if($eess->nvl_educacional == "")

        $resultado =$resultado1 * (1-0.25 * $eess->personas_cargo *1.5 * 30 + ($total_activos - $total_pasivos)-$resultado1) * 10;

        $resultado2 = ((($resultado1) * (1-0.25*$eess->personas_cargo)*1.5)*0.25*12) / 0.7;


        if($resultado2 > $resultado){

          $eess->monto_preliminar = $resultado;

          $datosEmail = array(
              'nombre_cliente' => $cliente->pnombre.' '.$cliente->papellido,
              'email_cliente' => $cliente->email,
              'monto' => $resultado
          );

         Mail::send('mail.nuevo_usuario', $datosEmail, function($message) use ($datosEmail){
              $message->from('inversiones@tamed.global', 'TAMED Inversiones');
              $message->to($datosEmail['email_cliente'])->subject("Capacidad crediticia");
          });

        }else{

          $eess->monto_preliminar = $resultado2;


          $datosEmail = array(
              'nombre_cliente' => $cliente->pnombre.' '.$cliente->papellido,
              'email_cliente' => $cliente->email,
              'monto' => $resultado2
          );

           Mail::send('mail.nuevo_usuario', $datosEmail, function($message) use ($datosEmail){
              $message->from('inversiones@tamed.global', 'TAMED Inversiones');
              $message->to($datosEmail['email_cliente'])->subject("Capacidad crediticia");
          });


        }

       }else{

        $eess->paso = $eess->paso+1;
       }

       $arrayDatos = $request->array;

       

       if($arrayDatos == "" || count($arrayDatos) == 0){

        $eess->cuenta_corriente = 0;

       }else{

        $eess->cuenta_corriente = 1;

        if($arrayDatos[0]['id'] == ""){

            foreach ($arrayDatos as $arrayDato ) {
                $nuevaCuentaCorriente = new CuentaCorriente();
                $nuevaCuentaCorriente->user_id = $cliente->id;
                $nuevaCuentaCorriente->banco = $arrayDato['banco_cuenta_corriente'];
                $nuevaCuentaCorriente->ejecutivo_sucursal = $arrayDato['nombre_ejecutivo_sucursal'];
                $nuevaCuentaCorriente->saldo_actual = $arrayDato['saldo_actual'];
                $nuevaCuentaCorriente->monto_linea = $arrayDato['monto_utilizado_linea'];
                $nuevaCuentaCorriente->monto_tarjeta = $arrayDato['monto_utilizado_tarjeta'];

                $nuevaCuentaCorriente->save();

            }

        }else{

            foreach ($arrayDatos as $arrayDato ) {
                $actualizarCuentaCorriente = CuentaCorriente::find($arrayDato['id']);
                $actualizarCuentaCorriente->banco = $arrayDato['banco_cuenta_corriente'];
                $actualizarCuentaCorriente->ejecutivo_sucursal = $arrayDato['nombre_ejecutivo_sucursal'];
                $actualizarCuentaCorriente->saldo_actual = $arrayDato['saldo_actual'];
                $actualizarCuentaCorriente->monto_linea = $arrayDato['monto_utilizado_linea'];
                $actualizarCuentaCorriente->monto_tarjeta = $arrayDato['monto_utilizado_tarjeta'];



                $actualizarCuentaCorriente->save();

            }

        }

       }

       

       try {

         $eess->save();

         return 1;
       
       } catch (\Exception $e) {
       
           return $e->getMessage();
       }
        

    }


    public function guardarDatosCreditoConsumo(Request $request){


       $cliente =  ClientDetails::where('id', $request->id)->first();
       $eess = Eess::where('user_id', $cliente->id)->first();

       if($eess->paso == 12){

        $div_mensual = 0;
        $cred_mensual = 0;
        $valor_com_prop = 0;
        $valor_com_vehiculo = 0;
        $valor_inv = 0;
        $saldos_cuentas = 0;
        $saldo_insoluto_credito = 0;
        $saldo_insoluto_tar_cred = 0;
        $saldo_insoluto_linea_cred = 0;
        $ingreso_carga = 0;

        if($eess->propiedades == 1){

          $propiedades = Propiedad::where('user_id', $eess->user_id)->get();

          if(count($propiedades) > 0){

            foreach ($propiedades as $propiedad) {
              $div_mensual = $propiedad['valor_cuota']+$div_mensual;

              $valor_com_prop = $propiedad['valor_comercial']+$valor_com_prop;


            }

          }

          $cred_mensual = $div_mensual*48*1.2;

        }


        if($eess->vehiculos == 0){

          $vehiculos = Vehiculo::where('user_id', $eess->user_id)->get();

          if(count($vehiculos) > 0){

            foreach ($vehiculos as $vehiculo) {
              $valor_com_vehiculo = $vehiculo['valor']+$valor_com_vehiculo;
            }

          }

        }

        if($eess->inversiones == 1){

          $inversiones = InstrumentoInversion::where('user_id', $eess->user_id)->get();

          if (count($inversiones) > 0) {
            
            foreach ($inversiones as $inversion ) {
              
              $valor_inv = $inversion['valor']+$valor_inv;

            }

          }

        }

        if($eess->cuenta_corriente == 1){

          $cuentas = CuentaCorriente::where('user_id', $eess->user_id)->get();

          if (count($cuentas) > 0) {
            
            foreach ($cuentas as $cuenta ) {
              
              $saldos_cuentas = $cuenta['saldo_actual']+$saldos_cuentas;

              $saldo_insoluto_linea_cred = $cuenta['monto_linea']+$saldo_insoluto_linea_cred;

              $saldo_insoluto_tar_cred = $cuenta['monto_tarjeta']+$saldo_insoluto_tar_cred;

            }

          }

        }


        if($eess->credito_consumo == 1){

          $creditos = CreditoConsumo::where('user_id', $eess->user_id)->get();

          if (count($creditos) > 0) {
            
            foreach ($creditos as $credito ) {
              
              $saldo_insoluto_credito = $credito['valor_cuota']*$credito['cuotas_restantes']*0.8;

            }

          }

        }


        if($eess->estado_civil == 'Casado'){

          $conyuge = Conyuge::where('user_id', $eess->user_id)->first();

          $ingreso_carga = $conyuge->ingresos;

          $ingreso_mensual = $eess->sueldo+$ingreso_carga * 0.75;

        }else{

          $ingreso_mensual = $eess->sueldo;

        }



        if($eess->otros_ingresos == 1){

          $otros_ingresos = $eess->total_ingreso*0.8;

        }



        $resultado1 = $ingreso_mensual-$div_mensual-$cred_mensual-50000;



        $total_activos = $valor_com_prop+$valor_com_vehiculo+$valor_inv+$saldos_cuentas;

        $total_pasivos = $saldo_insoluto_credito+$saldo_insoluto_tar_cred+$saldo_insoluto_linea_cred;



        //if($eess->nvl_educacional == "")

        $resultado =$resultado1 * (1-0.25 * $eess->personas_cargo *1.5 * 30 + ($total_activos - $total_pasivos)-$resultado1) * 10;

        $resultado2 = ((($resultado1) * (1-0.25*$eess->personas_cargo)*1.5)*0.25*12) / 0.7;


        if($resultado2 > $resultado){

          $eess->monto_preliminar = $resultado;

          $datosEmail = array(
              'nombre_cliente' => $cliente->pnombre.' '.$cliente->papellido,
              'email_cliente' => $cliente->email,
              'monto' => $resultado
          );

         Mail::send('mail.nuevo_usuario', $datosEmail, function($message) use ($datosEmail){
              $message->from('inversiones@tamed.global', 'TAMED Inversiones');
              $message->to($datosEmail['email_cliente'])->subject("Capacidad crediticia");
          });

        }else{

          $eess->monto_preliminar = $resultado2;


          $datosEmail = array(
              'nombre_cliente' => $cliente->pnombre.' '.$cliente->papellido,
              'email_cliente' => $cliente->email,
              'monto' => $resultado2
          );

           Mail::send('mail.nuevo_usuario', $datosEmail, function($message) use ($datosEmail){
              $message->from('inversiones@tamed.global', 'TAMED Inversiones');
              $message->to($datosEmail['email_cliente'])->subject("Capacidad crediticia");
          });


        }

       }else{

          $tareas = Tareas::where('user_id',$cliente->user_id)->first();

         $tareas->tareas = $tareas->tareas - 1;

         $tareas->save();

        $eess->paso = $eess->paso+1;
       }

       $arrayDatos = $request->array;

       

       if($arrayDatos == "" || count($arrayDatos) == 0){

        $eess->credito_consumo = 0;

       }else{

        $eess->credito_consumo = 1;

        if($arrayDatos[0]['id'] == ""){

            foreach ($arrayDatos as $arrayDato ) {
                $nuevaCreditoConsumo = new CreditoConsumo();
                $nuevaCreditoConsumo->user_id = $cliente->id;
                $nuevaCreditoConsumo->banco = $arrayDato['banco_credito_consumo'];
                $nuevaCreditoConsumo->monto = $arrayDato['monto_credito_consumo'];
                $nuevaCreditoConsumo->valor_cuota = $arrayDato['valor_cuota_consumo'];
                $nuevaCreditoConsumo->cuotas_restantes = $arrayDato['cuotas_restantes_consumo'];

                $nuevaCreditoConsumo->save();


            }

        }else{

            foreach ($arrayDatos as $arrayDato ) {
                $actualizarCreditoConsumo = CreditoConsumo::find($arrayDato['id']);
                $actualizarCreditoConsumo->banco = $arrayDato['banco_credito_consumo'];
                $actualizarCreditoConsumo->monto = $arrayDato['monto_credito_consumo'];
                $actualizarCreditoConsumo->valor_cuota = $arrayDato['valor_cuota_consumo'];
                $actualizarCreditoConsumo->cuotas_restantes = $arrayDato['cuotas_restantes_consumo'];



                $actualizarCreditoConsumo->save();

            }

        }

       }

       

       try {

         $eess->save();

         return 1;
       
       } catch (\Exception $e) {
       
           return $e->getMessage();
       }
        

    }

    public function guardarDatosPropiedades(Request $request){


       $cliente =  ClientDetails::where('id', $request->id)->first();
       $eess = Eess::where('user_id', $cliente->id)->first();

       if($eess->paso == 12){

        $div_mensual = 0;
        $cred_mensual = 0;
        $valor_com_prop = 0;
        $valor_com_vehiculo = 0;
        $valor_inv = 0;
        $saldos_cuentas = 0;
        $saldo_insoluto_credito = 0;
        $saldo_insoluto_tar_cred = 0;
        $saldo_insoluto_linea_cred = 0;
        $ingreso_carga = 0;

        if($eess->propiedades == 1){

          $propiedades = Propiedad::where('user_id', $eess->user_id)->get();

          if(count($propiedades) > 0){

            foreach ($propiedades as $propiedad) {
              $div_mensual = $propiedad['valor_cuota']+$div_mensual;

              $valor_com_prop = $propiedad['valor_comercial']+$valor_com_prop;


            }

          }

          $cred_mensual = $div_mensual*48*1.2;

        }


        if($eess->vehiculos == 0){

          $vehiculos = Vehiculo::where('user_id', $eess->user_id)->get();

          if(count($vehiculos) > 0){

            foreach ($vehiculos as $vehiculo) {
              $valor_com_vehiculo = $vehiculo['valor']+$valor_com_vehiculo;
            }

          }

        }

        if($eess->inversiones == 1){

          $inversiones = InstrumentoInversion::where('user_id', $eess->user_id)->get();

          if (count($inversiones) > 0) {
            
            foreach ($inversiones as $inversion ) {
              
              $valor_inv = $inversion['valor']+$valor_inv;

            }

          }

        }

        if($eess->cuenta_corriente == 1){

          $cuentas = CuentaCorriente::where('user_id', $eess->user_id)->get();

          if (count($cuentas) > 0) {
            
            foreach ($cuentas as $cuenta ) {
              
              $saldos_cuentas = $cuenta['saldo_actual']+$saldos_cuentas;

              $saldo_insoluto_linea_cred = $cuenta['monto_linea']+$saldo_insoluto_linea_cred;

              $saldo_insoluto_tar_cred = $cuenta['monto_tarjeta']+$saldo_insoluto_tar_cred;

            }

          }

        }


        if($eess->credito_consumo == 1){

          $creditos = CreditoConsumo::where('user_id', $eess->user_id)->get();

          if (count($creditos) > 0) {
            
            foreach ($creditos as $credito ) {
              
              $saldo_insoluto_credito = $credito['valor_cuota']*$credito['cuotas_restantes']*0.8;

            }

          }

        }


        if($eess->estado_civil == 'Casado'){

          $conyuge = Conyuge::where('user_id', $eess->user_id)->first();

          $ingreso_carga = $conyuge->ingresos;

          $ingreso_mensual = $eess->sueldo+$ingreso_carga * 0.75;

        }else{

          $ingreso_mensual = $eess->sueldo;

        }



        if($eess->otros_ingresos == 1){

          $otros_ingresos = $eess->total_ingreso*0.8;

        }



        $resultado1 = $ingreso_mensual-$div_mensual-$cred_mensual-50000;



        $total_activos = $valor_com_prop+$valor_com_vehiculo+$valor_inv+$saldos_cuentas;

        $total_pasivos = $saldo_insoluto_credito+$saldo_insoluto_tar_cred+$saldo_insoluto_linea_cred;



        //if($eess->nvl_educacional == "")

        $resultado =$resultado1 * (1-0.25 * $eess->personas_cargo *1.5 * 30 + ($total_activos - $total_pasivos)-$resultado1) * 10;

        $resultado2 = ((($resultado1) * (1-0.25*$eess->personas_cargo)*1.5)*0.25*12) / 0.7;


        if($resultado2 > $resultado){

          $eess->monto_preliminar = $resultado;

          $datosEmail = array(
              'nombre_cliente' => $cliente->pnombre.' '.$cliente->papellido,
              'email_cliente' => $cliente->email,
              'monto' => $resultado
          );

         Mail::send('mail.nuevo_usuario', $datosEmail, function($message) use ($datosEmail){
              $message->from('inversiones@tamed.global', 'TAMED Inversiones');
              $message->to($datosEmail['email_cliente'])->subject("Capacidad crediticia");
          });

        }else{

          $eess->monto_preliminar = $resultado2;


          $datosEmail = array(
              'nombre_cliente' => $cliente->pnombre.' '.$cliente->papellido,
              'email_cliente' => $cliente->email,
              'monto' => $resultado2
          );

           Mail::send('mail.nuevo_usuario', $datosEmail, function($message) use ($datosEmail){
              $message->from('inversiones@tamed.global', 'TAMED Inversiones');
              $message->to($datosEmail['email_cliente'])->subject("Capacidad crediticia");
          });


        }

       }else{


        $eess->paso = $eess->paso+1;
       }

       $arrayDatos = $request->array;

       

       if($arrayDatos == "" || count($arrayDatos) == 0){

        $eess->propiedades = 0;

       }else{

        $eess->propiedades = 1;

        if($arrayDatos[0]['id'] == ""){

            foreach ($arrayDatos as $arrayDato ) {

                $credito = $arrayDato['propiedad_credito'];

                if($credito == 'Si'){

                    $credito2 = 1;

                }else{

                    $credito2 = 0;

                }


                $nuevaPropiedad = new Propiedad();
                $nuevaPropiedad->user_id = $cliente->id;
                $nuevaPropiedad->tipo = $arrayDato['tipo_propiedad'];
                $nuevaPropiedad->direccion = $arrayDato['direccion_propiedad'];
                $nuevaPropiedad->comuna = $arrayDato['comuna_propiedad'];
                $nuevaPropiedad->ciudad = $arrayDato['ciudad_propiedad'];
                $nuevaPropiedad->rol = $arrayDato['rol_propiedad'];
                $nuevaPropiedad->valor_comercial = $arrayDato['valor_propiedad'];
                $nuevaPropiedad->credito = $credito2;
                $nuevaPropiedad->banco = $arrayDato['banco_credito_propiedad'];
                $nuevaPropiedad->monto = $arrayDato['monto_credito_hipotecario'];
                $nuevaPropiedad->valor_cuota = $arrayDato['valor_cuota_hipotecario'];
                $nuevaPropiedad->cuotas_restantes = $arrayDato['cuotas_restantes_hipotecario'];

                $nuevaPropiedad->save();

            }


        }else{

            foreach ($arrayDatos as $arrayDato ) {

                $credito = $arrayDato['propiedad_credito'];

                if($credito == 'Si'){

                    $credito2 = 1;

                }else{

                    $credito2 = 0;

                }

                $actualizarPropiedad = Propiedad::find($arrayDato['id']);
                $actualizarPropiedad->user_id = $cliente->id;
                $actualizarPropiedad->tipo = $arrayDato['tipo_propiedad'];
                $actualizarPropiedad->direccion = $arrayDato['direccion_propiedad'];
                $actualizarPropiedad->comuna = $arrayDato['comuna_propiedad'];
                $actualizarPropiedad->ciudad = $arrayDato['ciudad_propiedad'];
                $actualizarPropiedad->rol = $arrayDato['rol_propiedad'];
                $actualizarPropiedad->valor_comercial = $arrayDato['valor_propiedad'];
                $actualizarPropiedad->credito = $credito2;
                $actualizarPropiedad->banco = $arrayDato['banco_credito_propiedad'];
                $actualizarPropiedad->monto = $arrayDato['monto_credito_hipotecario'];
                $actualizarPropiedad->valor_cuota = $arrayDato['valor_cuota_hipotecario'];
                $actualizarPropiedad->cuotas_restantes = $arrayDato['cuotas_restantes_hipotecario'];

                $actualizarPropiedad->save();

            }

        }

       }

       

       try {

         $eess->save();

         return 1;
       
       } catch (\Exception $e) {
       
           return $e->getMessage();
       }
        

    }


    public function agendarLlamada(Request $request){


      $id = $request->id;

      $cliente = ClientDetails::where('user_id',$id)->first();

      $cliente->llamado = 0;

      $datosEmail = array(
        'nombre_cliente' => $cliente->pnombre,
        'email_cliente' => $cliente->email
      );

      Mail::send('mail.llamada_agendada', $datosEmail, function($message) use ($datosEmail){
        $message->from('inversiones@tamed.global', 'TAMED Inversiones');
        $message->to($datosEmail['email_cliente'])->subject("Gracias por agendar tu llamado");
      });

      try {

        $cliente->save();
        return 1;
        
      } catch (Exception $e) {
          
          return 0;

      }

    }

    


}
