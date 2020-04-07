@extends('layouts.client-app')

@section('page-title')
    <div class="row bg-title top-left-part2" >
        <!-- .page title -->
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title"><span class="circle w__40 light-blue">{{$user->pnombre[0]}}</span>{{$user->pnombre}} {{$user->papellido}}</h4>
        </div>
        <!-- /.page title -->
        <!-- .breadcrumb -->
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="{{ route('member.dashboard') }}">@lang("app.menu.home")</a></li>
                <li class="active">{{ __($pageTitle) }}</li>
            </ol>
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
      .datos-contacto{
        font-size: 17px
      }

    </style>
    <div class="row abajo-titulo">
        <div class="col-md-12">

            <div class="panel panel-inverse">

                <div class="panel-wrapper collapse in" aria-expanded="true">
                    <div class="panel-body">

                        <div class="form-body">
                          @foreach($member as $miembro)
                              <div class="row row-perfil" style="margin-bottom: 25px">

                                <div class="cabezera" >
                                    <img src="{{asset('img/ra-offer.png')}}" alt="Información personal" style="padding: 0 0 12px;"><b style="font-size: 25px; font-weight: 100;" class="titulo-menu">Datos de contacto</b>
                                    <hr>
                                </div>
                                  <div class="row" style="padding: 0 13px 30px;">
                                    <div class="col-md-3" style="padding-top: 0px;">
                                        <div class="f-size__24 text-medium m-b-15">
                                          @if(is_null($miembro->image))
                                            <img src="https://via.placeholder.com/200x150.png?text={{ str_replace(' ', '+', __('modules.profile.uploadPicture')) }}"
                                                 alt="" width="180px" style="border-radius: 4%;"/>
                                        @else
                                            <img src="{{ asset_url('avatar/'.$miembro->image) }}" alt="" width="180px" style="border-radius: 4%;"/>
                                        @endif

                                      </div>

                                    </div>
                                    <div class="col-md-9">
                                        <div class="row-data flex center">
                                              <p class="datos-contacto"><b>Nombre:</b> {{$miembro->name}}</p>
                                        </div>
                                        <div class="row-data flex center">
                                              <p class="datos-contacto"><b>Correo Electrónico:</b> {{$miembro->email}}</p>
                                        </div>
                                        <div class="row-data flex center">
                                              <p class="datos-contacto"><b>Número de celular:</b> {{$miembro->mobile}}</p>
                                        </div>
                                        <div class="row-data flex center">
                                              <p class="datos-contacto"><b>Dirección:</b> {{$miembro->address}}</p>
                                        </div>

                                        <div class="row-data flex center">
                                              <p class="datos-contacto"><b>Designación:</b> {{$miembro->designation}}</p>
                                        </div>
                                    </div>


                                    </div>

                              </div>
                          @endforeach





                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    <!-- .row -->

@endsection
