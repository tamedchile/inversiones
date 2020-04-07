@extends('layouts.client-app')

@section('page-title')
  <div class="row bg-title top-left-part2" >
    <!-- .page title -->
      <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
          <h4 class="page-title"><span class="circle w__40 gray">{{$user->pnombre[0]}}</span>{{$user->pnombre}} {{$user->papellido}}</h4>

      </div>
        <!-- /.page title -->
        <!-- .breadcrumb -->
        <div class="" style="float:right">
            hola
        </div>
        <!-- /.breadcrumb -->
    </div>
@endsection

@section('content')
    <style media="screen">
      .panel .panel-body {
        padding: 25px;
        background-color: #f6f7f9 !important;
      }
      .form-actions {
          margin: 15px;
      }
      .cabezera {
          margin: 1px 11px 33px;;
      }
      .row-perfil{
        margin: 0px;
        box-shadow: 12px 7px 10px 2px #d7d0d0;
        border-radius: 10px;
        background-color: #fff;
        padding: 30px 30px 2px;
      }
      .editar-datos{
          font-size: 15px;
          color: #0090ff !important;
      }

      .datos-contacto{
        font-size: 17px
      }
      .text-green {
          color: #58bd75!important;
      }
      .pull-right {
          float: right!important;
      }
    </style>
    <div class="row abajo-titulo">
        <div class="col-md-12">

            <div class="panel panel-inverse">

                <div class="panel-wrapper collapse in" aria-expanded="true">
                    <div class="panel-body">
                        {!! Form::open(['id'=>'updateProfile','class'=>'ajax-form','method'=>'PUT']) !!}
                        <div class="form-body">

                              <div class="row row-perfil" style="margin-bottom: 25px">
                                <div class="cabezera" >
                                    <img src="{{asset('img/ra-offer.png')}}" alt="Información personal" style="padding: 0 0 12px;"><b style="font-size: 25px; font-weight: 100;" class="titulo-menu">Información personal</b>
                                    @if ($clientDetail->pnombre == '' || $clientDetail->snombre == '' || $clientDetail->papellido == ''|| $clientDetail->sapellido == '' || $clientDetail->rut == '' || $clientDetail->fnacimiento == '')<span class="pull-right text-green" style="margin-left: 5px"> <img src="{{asset('img/remove.png')}}" alt="faltan datos" width="20px"> </span>@else
                                    <span class="pull-right text-green" style="margin-left: 5px"> <img src="{{asset('img/correct.png')}}" alt="Correcto" width="20px"> </span>@endif
                                    <a class="editar-datos" onclick="desplegar_form()" id="editar" style="float: right;">Editar </a>
                                    <a class="editar-datos" onclick="desplegar_info()" id="noeditar" style="float: right;" hidden>Cerrar </a>

                                    <hr>
                                </div>
                                <div class="row" id="info-personal" hidden>


                                  <div class="col-md-3">
                                      <label>Fotografía del perfil</label>
                                      <div class="form-group">
                                          <div class="fileinput fileinput-new" data-provides="fileinput" >
                                              <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                  @if(is_null($userDetail->image))
                                                      <img src="https://via.placeholder.com/200x150.png?text={{ str_replace(' ', '+', __('modules.profile.uploadPicture')) }}"
                                                           alt=""/>
                                                  @else
                                                      <img src="{{ asset_url('avatar/'.$userDetail->image) }}" alt=""/>
                                                  @endif
                                              </div>
                                              <div class="fileinput-preview fileinput-exists thumbnail"
                                                   style="max-width: 200px; max-height: 150px;"></div>
                                              <div>
                                                <span class="btn btn-info btn-file" style="padding: 8px 29px;">
                                                  <span class="fileinput-new"> @lang("app.selectImage") </span>
                                                  <span class="fileinput-exists"> @lang("app.change") </span>
                                                  <input type="file" name="image" id="image"> </span>
                                                  <a href="javascript:;" class="btn btn-danger fileinput-exists"
                                                     data-dismiss="fileinput"> @lang("app.remove") </a>
                                              </div>
                                          </div>
                                      </div>

                                  </div>

                                  <div class="col-md-9">
                                    <div class="col-md-6 ">
                                        <div class="form-group">
                                            <label>Primer nombre</label>
                                            <input type="text" name="pnombre" id="pnombre"
                                                   class="form-control" value="{{ $clientDetail->pnombre }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 ">
                                        <div class="form-group">
                                            <label>Segundo Nombre</label>
                                            <input type="text" name="snombre" id="snombre"
                                                   class="form-control" value="{{ $clientDetail->snombre }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 ">
                                        <div class="form-group">
                                            <label>Apellido paterno</label>
                                            <input type="text" name="papellido" id="papellido"
                                                   class="form-control" value="{{ $clientDetail->papellido }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 ">
                                        <div class="form-group">
                                            <label>Apellido materno</label>
                                            <input type="text" name="sapellido" id="sapellido"
                                                   class="form-control" value="{{ $clientDetail->sapellido }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 ">
                                        <div class="form-group">
                                            <label>Rut</label>
                                            <input type="text" name="rut" id="rut"
                                                   class="form-control" value="{{ $clientDetail->rut }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 ">
                                        <div class="form-group">
                                            <label>Fecha de nacimiento</label>
                                            <input type="date" name="fnacimiento" id="fnacimiento"
                                                   class="form-control" value="{{ $clientDetail->fnacimiento }}">
                                        </div>
                                    </div>

                                  </div>
                                  <div class="form-actions">

                                        <button  style="float: right;margin-bottom: 30px;" type="submit" id="save-form" class="btn btn-success"><i class="fa fa-check"></i>
                                            @lang("app.update")
                                        </button>
                                        <button style="float: right;margin-right: 10px;margin-bottom: 30px" type="reset" class="btn btn-default">@lang("app.reset")</button>

                                  </div>
                                </div>
                                <div class="row" style="padding: 0 13px 30px;" id="id-info">
                                  <div class="col-md-3" style="padding-top: 0px;">
                                      <div class="f-size__24 text-medium m-b-15">
                                        @if(is_null($userDetail->image))
                                          <img src="https://via.placeholder.com/200x150.png?text={{ str_replace(' ', '+', __('modules.profile.uploadPicture')) }}"
                                               alt="" width="180px" style="border-radius: 4%;"/>
                                      @else
                                          <img src="{{ asset_url('avatar/'.$userDetail->image) }}" alt="" width="180px" style="border-radius: 4%;"/>
                                      @endif

                                    </div>

                                  </div>
                                  <div class="col-md-9" style="margin-top: 38px;">
                                      <div class="row-data flex center">
                                            <p class="datos-contacto"><b>Nombre:</b> {{$clientDetail->pnombre}} {{$clientDetail->snombre}} {{$clientDetail->papellido}} {{$clientDetail->sapellido}}</p>
                                      </div>

                                      <div class="row-data flex center">
                                            <p class="datos-contacto"><b>Rut:</b> {{$clientDetail->rut}}</p>
                                      </div>
                                      <div class="row-data flex center">
                                            <p class="datos-contacto"><b>Fecha de nacimiento:</b> {{date('d-m-Y', strtotime($clientDetail->fnacimiento))}}</p>
                                      </div>


                                  </div>
                                </div>

                              </div>



                              <div class="row row-perfil" style="margin-bottom: 25px">
                                <div class="cabezera" >
                                  <img src="{{asset('img/phone-email.png')}}" alt="Datos de contacto" style="padding: 0 0 12px;"><b style="font-size: 25px; font-weight: 100;" class="titulo-menu">Información de contacto</b>
                                  @if ($clientDetail->company_name == '' || $clientDetail->address == '' || $clientDetail->mobile == ''|| $clientDetail->comuna == '' || $clientDetail->ciudad == '')<span class="pull-right text-green" style="margin-left: 5px"> <img src="{{asset('img/remove.png')}}" alt="faltan datos" width="20px"> </span>@else
                                  <span class="pull-right text-green" style="margin-left: 5px"> <img src="{{asset('img/correct.png')}}" alt="Correcto" width="20px"> </span>@endif
                                  <a class="editar-datos" onclick="desplegar_formc()" id="editarc" style="float: right;">Editar </a>
                                  <a class="editar-datos" onclick="desplegar_infoc()" id="noeditarc" style="float: right;" hidden>Cerrar </a>
                                  <hr>
                                </div>
                                <div class="row" id="form-contacto" hidden>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Institución o empresa</label>
                                            <input type="text" name="company_name" value="{{ $clientDetail->company_name }}" id="company_name" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Correo electrónico</label>
                                            <input type="email" name="email" id="email"
                                                   class="form-control"  value="{{ $clientDetail->email }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Teléfono fijo</label>
                                            <input type="tel" name="fijo" id="fijo" class="form-control"
                                                   value="{{ $clientDetail->fijo }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Teléfono móvil</label>
                                            <input type="tel" name="mobile" id="mobile" class="form-control"
                                                   value="{{ $clientDetail->mobile }}">
                                        </div>
                                    </div>



                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Dirección</label>
                                            <input type="text" name="address" id="address" rows="5"
                                              value="@if(!empty($clientDetail)){{ $clientDetail->address }}@endif"        class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Comuna</label>
                                            <input type="text" name="comuna" value="{{ $clientDetail->comuna }}" id="comuna" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Ciudad</label>
                                            <input type="text" name="ciudad" value="{{ $clientDetail->ciudad }}" id="ciudad" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Contraseña</label>
                                            <input type="password" name="password" id="password" class="form-control">
                                            <span class="help-block"> Déjala en blanco si no la quieres cambiar</span>
                                        </div>
                                    </div>
                                    <div class="form-actions">

                                          <button  style="float: right;margin-bottom: 30px;" type="submit" id="save-form2" class="btn btn-success"><i class="fa fa-check"></i>
                                              @lang("app.update")
                                          </button>
                                          <button style="float: right;margin-right: 10px;margin-bottom: 30px" type="reset" class="btn btn-default">@lang("app.reset")</button>

                                    </div>
                                  </div>
                                  <div class="row" style="padding: 0 13px 30px;" id="info-contacto">
                                    <div class="col-md-6">
                                        <div class="row-data flex center">
                                              <p class="datos-contacto"><b>Institución o empresa:</b> {{$clientDetail->company_name}}</p>
                                        </div>

                                        <div class="row-data flex center">
                                              <p class="datos-contacto"><b>Correo electrónico:</b> {{$clientDetail->email}}</p>
                                        </div>
                                        <div class="row-data flex center">
                                              <p class="datos-contacto"><b>Teléfono fijo:</b> {{$clientDetail->fijo}}</p>
                                        </div>
                                        <div class="row-data flex center">
                                              <p class="datos-contacto"><b>Teléfono móvil:</b> {{$clientDetail->mobile}}</p>
                                        </div>




                                    </div>
                                    <div class="col-md-6">
                                      <div class="row-data flex center">
                                            <p class="datos-contacto"><b>Dirección:</b> {{$clientDetail->address}}</p>
                                      </div>
                                      <div class="row-data flex center">
                                            <p class="datos-contacto"><b>Comuna:</b> {{$clientDetail->comuna}}</p>
                                      </div>
                                      <div class="row-data flex center">
                                            <p class="datos-contacto"><b>Ciudad:</b> {{$clientDetail->ciudad}}</p>
                                      </div>
                                    </div>
                                  </div>
                              </div>
                              <div class="row row-perfil">
                                <div class="cabezera" >
                                  <img src="{{asset('img/icon-business-banking.png')}}" alt="Datos de bancarios" style="padding: 0 0 12px; width: 34px;"><b style="font-size: 25px; font-weight: 100;" class="titulo-menu">Información Bancaria</b>
                                  @if ($clientDetail->cuentabancaria == '' || $clientDetail->banco == '' || $clientDetail->tipocuentabancaria == '')<span class="pull-right text-green" style="margin-left: 5px"> <img src="{{asset('img/remove.png')}}" alt="faltan datos" width="20px"> </span>@else
                                  <span class="pull-right text-green" style="margin-left: 5px"> <img src="{{asset('img/correct.png')}}" alt="Correcto" width="20px"> </span>@endif
                                  <a class="editar-datos" onclick="desplegar_formb()" id="editarb" style="float: right;">Editar </a>
                                  <a class="editar-datos" onclick="desplegar_infob()" id="noeditarb" style="float: right;" hidden>Cerrar </a>
                                  <hr>
                                </div>
                                <div class="row" id="form-banco" hidden>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Tipo cuenta bancaria</label>
                                            <input type="text" name="tipocuentabancaria" value="{{ $clientDetail->tipocuentabancaria }}" id="tipocuentabancaria" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Banco</label>
                                            <input type="text" name="banco" id="banco"
                                                   class="form-control"  value="{{ $clientDetail->banco }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Número de cuenta</label>
                                            <input type="num" name="cuentabancaria" id="cuentabancaria" class="form-control"
                                                   value="{{ $clientDetail->cuentabancaria }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Ejecutivo</label>
                                            <input type="text" name="ejecutivobancario" id="ejecutivobancario" class="form-control"
                                                   value="{{ $clientDetail->ejecutivobancario }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Correo del Ejecutivo</label>
                                            <input type="text" name="correoejecutivo" id="correoejecutivo" rows="5"
                                              value="{{ $clientDetail->correoejecutivo }}"        class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-actions">

                                          <button  style="float: right;margin-bottom: 30px;" type="submit" id="save-form3" class="btn btn-success"><i class="fa fa-check"></i>
                                              @lang("app.update")
                                          </button>
                                          <button style="float: right;margin-right: 10px;margin-bottom: 30px" type="reset" class="btn btn-default">@lang("app.reset")</button>

                                    </div>
                                </div>
                                <div class="row" style="padding: 0 13px 30px;" id="info-banco">
                                    <div class="col-md-6">
                                        <div class="row-data flex center">
                                              <p class="datos-contacto"><b>Tipo de cuenta:</b> {{$clientDetail->tipocuentabancaria}}</p>
                                        </div>

                                        <div class="row-data flex center">
                                              <p class="datos-contacto"><b>Banco:</b> {{$clientDetail->banco}}</p>
                                        </div>
                                        <div class="row-data flex center">
                                              <p class="datos-contacto"><b>Cuenta bancaria:</b> {{$clientDetail->cuentabancaria}}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row-data flex center">
                                              <p class="datos-contacto"><b>Ejecutivo:</b> {{$clientDetail->ejecutivobancario}}</p>
                                        </div>
                                        <div class="row-data flex center">
                                              <p class="datos-contacto"><b>Correo del Ejecutivo:</b> {{$clientDetail->correoejecutivo}}</p>
                                        </div>
                                    </div>
                                </div>
                              </div>


                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>    <!-- .row -->

    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
@endsection

@push('footer-script')
<script>
    $('#mostrar_modal').click(function () {
        $('exampleModal').modal();
    });

    $('#save-form').click(function () {
        $.easyAjax({
            url: '{{route('client.profile.update', [$userDetail->id])}}',
            container: '#updateProfile',
            type: "POST",
            redirect: true,
            file: (document.getElementById("image").files.length == 0) ? false : true,
            data: $('#updateProfile').serialize()
        })
    });
    $('#save-form2').click(function () {
        $.easyAjax({
            url: '{{route('client.profile.update', [$userDetail->id])}}',
            container: '#updateProfile',
            type: "POST",
            redirect: true,
            file: (document.getElementById("image").files.length == 0) ? false : true,
            data: $('#updateProfile').serialize()
        })
    });
    $('#save-form3').click(function () {
        $.easyAjax({
            url: '{{route('client.profile.update', [$userDetail->id])}}',
            container: '#updateProfile',
            type: "POST",
            redirect: true,
            file: (document.getElementById("image").files.length == 0) ? false : true,
            data: $('#updateProfile').serialize()
        })
    });
    function desplegar_form() {

        $('#id-info').hide();
        $('#info-personal').show();
        $('#editar').hide();
        $('#noeditar').show();
    }
    function desplegar_info() {

        $('#id-info').show();
        $('#info-personal').hide();
        $('#editar').show();
          $('#noeditar').hide();
    }
    function desplegar_formc() {

        $('#form-contacto').show();
        $('#info-contacto').hide();
        $('#editarc').hide();
        $('#noeditarc').show();
    }
    function desplegar_infoc() {

        $('#form-contacto').hide();
        $('#info-contacto').show();
        $('#editarc').show();
        $('#noeditarc').hide();
    }
    function desplegar_formb() {

        $('#form-banco').show();
        $('#info-banco').hide();
        $('#editarb').hide();
        $('#noeditarb').show();
    }
    function desplegar_infob() {

        $('#form-banco').hide();
        $('#info-banco').show();
        $('#editarb').show();
        $('#noeditarb').hide();
    }
</script>
@endpush
