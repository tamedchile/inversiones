@extends('layouts.client-app')

@section('page-title')
    <div class="row bg-title top-left-part2" >
      <!-- .page title -->
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title"><span class="circle w__40 yellow">{{$user->pnombre[0]}}</span>{{$user->pnombre}} {{$user->papellido}}</h4>
        </div>
        <!-- /.page title -->
        <!-- .breadcrumb -->
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="{{ route('client.dashboard.index') }}">@lang('app.menu.home')</a></li>
                <li><a href="{{ route('client.projects.index') }}">{{ __($pageTitle) }}</a></li>
                <li class="active">@lang('app.menu.invoices')</li>
            </ol>
        </div>
        <!-- /.breadcrumb -->
    </div>
@endsection

@section('content')
    <link href="{{ asset('css/task-stilos.css') }}" rel="stylesheet">
    <div class="row abajo-titulo" >
        <div class="col-md-12">

            <section>
                      <link href='https://fonts.googleapis.com/css?family=Josefin+Slab' rel='stylesheet' type='text/css'>
                      <div class="row">
                        <div class="col-md-7" style="padding: 100px; padding-left: 30px;">

                          @if($clientDetail->llamado !== 1)

                             @if( $user->tareas($user->id) === 3)
                             <h3 class="default-title">Bienvenido a TAMED, el portal digital de tus inversiones inmobiliarias</h3>
                             @elseif($user->tareas($user->id) === 2 )
                             <h4 class="default-title">¡Excelente! Has terminado el primer paso.</h4>
                             @elseif($user->tareas($user->id) === 1)
                             <h4 class="default-title">¡Excelente! Gracias por completar el formulario.</h4>
                             @elseif($user->tareas($user->id) === 0)
                             <h4 class="default-title">¡Excelente! ... </h4>
                             @endif
                             @if( $user->tareas($user->id) === 3)
                             <p class="m-t-15">Nos alegra que estés tomando la decisión de comprar una propiedad.
                               Te apoyaremos en todo este proceso haciéndolo más eficiente y seguro, para tu conveniencia 😀
                               Comencemos completando los datos de tu cuenta.
                             </p>
                             @elseif($user->tareas($user->id) === 2 )
                             <p class="m-t-15">Ahora vamos a evaluar tu capacidad crediticia. Iniciarás
                                una encuesta que te permitirá saber, preliminarmente,
                                cuántas UF podemos conseguir para lograr tu objetivo.
                             </p>
                             @elseif($user->tareas($user->id) === 1 )
                             <p class="m-t-15">La informacion proporcionada nos sera de mucha utilidad para asesorarte de la mejor manera. 
                               Ahora necesitamos que acredites la informacion proporcionada en base a los documentos solicitados.
                             </p>
                             @elseif($user->tareas($user->id) === 0 )
                             <p class="m-t-15">Necesitamos contactarnos contigo, te pedimos que solicites una llamada por parte de tu asesor.
                             Para esto <a onclick="solicitarLlamada()">has click aqui.</a></p>
                             
                             @endif

                          @else

                            @if($user->tareas($user->id) === 1)
                              <h4 class="default-title">Gracias por haberte conectado con tu asesor financiero</h4>
                              <p class="m-t-15">Ahora, necesitamos definir el proyecto en el que deseas invertir. Verifica todos los detalles que en los proyectos se especifican, especialmente los beneficios con que cuentan, para que podamos obtener las mejores condiciones.
                             </p>
                            @endif
                            @if($user->tareas($user->id) === 0)
                              <h4 class="default-title">¡Excelente decisión! Ahora vamos a negociar</h4>
                              <p class="m-t-15">Siempre es bueno que nos hagan un cariño extra :) Con tu selección, desde ya nos ponemos manos a la obra en conseguir la propiedad que buscas, esperando lograr aún mejores condiciones con la inmobiliaria. Te mantendremos informado muy pronto.
                             </p>

                             <input type="text" class="form-control" id="fecha_limite" name="fecha_limite" value=" {{ $fechaRespuesta->fecha }}" style="display: none">

                             <h4 class="default-title" id="countdown"></h4>

                            @endif

                          @endif

                        </div>
                        <div class="col-md-4" >
                          <div class="col-md-12" style="padding: 100px; padding-left: 30px;">


                            @if($user->tareas($user->id) < 2)

                              <h4 class="default-title"> Capacidad preliminar: </h4> <p class="m-t-15">{{ $monto->monto_preliminar }} </p>

                            @endif

                          </div>

                        </div>

                    </div>
                    
                    <div class="wizard">
                      <ul class="nav nav-tabs">
                          @if ($clientDetail->pnombre == '' || $clientDetail->snombre == '' || $clientDetail->papellido == ''|| $clientDetail->sapellido == '' || $clientDetail->mobile == '' || $clientDetail->company_name == '' || $clientDetail->address == '' || $clientDetail->rut == '' || $clientDetail->fnacimiento == '' || $clientDetail->comuna == '' || $clientDetail->ciudad == '' ||  $clientDetail->cuentabancaria == '' || $clientDetail->banco == '' || $clientDetail->tipocuentabancaria == '')
                          <li class="active">
                              <a href="#tab_tax" data-toggle="tab" aria-expanded="true">
                                  <img src="{{asset('img/compliance.png')}}" alt=""> <span>Quedan datos de tu perfil por completar</span>
                              </a>
                          </li>
                          @endif
                          @if($clientDetail->eess == 0)
                          <li class="active">
                              <a href="#tab_domain_business_email" data-toggle="tab" aria-expanded="false">
                                  <img src="{{asset('img/form.png')}}" alt="">
                                  <span>Diligencia el formulario de EESS</span>
                              </a>
                          </li>
                          @endif
                          @if($clientDetail->llamado !== 1)

                            @if($user->tareas($user->id) === 1 )

                              <li class="active">
                                  <a href="#tab_business_website" data-toggle="tab" aria-expanded="false">
                                    <img src="{{asset('img/folder.png')}}" alt="">
                                    <span>Subir documentos</span>
                                  </a>
                              </li>

                            @endif

                          @else

                            @if($user->tareas($user->id) === 1 )

                              <li class="active">
                                  <a href="#tab_definir_proyecto" data-toggle="tab" aria-expanded="false">
                                    <img src="{{asset('img/edificio.png')}}" alt="">
                                    <span>Definir Proyecto</span>
                                  </a>
                              </li>

                            @endif

                          @endif
                      </ul>
                      <div class="tab-content box-items">
                          <div class="tab-pane @if ($clientDetail->pnombre == '' || $clientDetail->snombre == '' || $clientDetail->papellido == ''|| $clientDetail->sapellido == '' || $clientDetail->mobile == '' || $clientDetail->company_name == '' || $clientDetail->address == '' || $clientDetail->rut == '' || $clientDetail->fnacimiento == '' || $clientDetail->comuna == '' || $clientDetail->ciudad == '' || $clientDetail->fijo == '' || $clientDetail->cuentabancaria == '' || $clientDetail->banco == '' || $clientDetail->tipocuentabancaria == '') active  @endif" id="tab_tax">
                              <div class="item open" id="js_item_box_9">
                                  <div class="item-heading">
                                      <span class="title">Algunos de los datos e tu perfil aún no han sido diligenciados</span>
                                  </div>
                                  <div class="item-desc">
                                      <h4>Debes ir a tu perfil y completarlos</h4>

                                      <div class="box pad__30">
                                          <div class="row">
                                              <div class="col-lg-6">
                                                  <ul class="list-unstyled package-includes package-includes-domain-business-email">
                                                      <li class="build-brand">
                                                          <div class="t">Completar todos tus datos</div>
                                                          <p>Es importante para poder asesorarte correctamente en el uso correcto de la plataforma y en el proceso de la adquisición de tu nuevo hogar. </p>
                                                      </li>
                                                      <li class="build-brand">
                                                          <div class="t">Confirmación de finalizado</div>
                                                          <p>Cuando veas un check verde sobre todos los datos <u>personales</u>, de <u>contácto</u> y <u>bancarios</u>, quiere decir que has completado correctamente este paso y podrás avanzar al siguiente paso. </p>
                                                      </li>

                                                  </ul>
                                              </div>

                                              <div class="col-lg-6 right text-center">
                                                  <img src="/static/img/logos/mazuma-logo.png" class="img-responsive" alt="" style="display:inline-block; max-width:150px">
                                                  <div class="clearfix"></div>
                                                  <a href="{{ route('client.profile.index') }}" id="toggle_schedule_tax_btn" class="btn btn-green btn-block m-b-20 m-t-30 text-uppercase">
                                                      Completar datos
                                                  </a>

                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>

                          <div class="tab-pane @if( $clientDetail->eess == 0 ) active @endif" id="tab_domain_business_email">
                              <div class="item open" id="js_item_box_9">
                                  <div class="item-heading">
                                      <span class="title">Debes diligenciar el formulario para poder evaluar tu capacidad preliminar de inversión</span>
                                      <span class="explain pull-right">This item was included with your purchased package.</span>
                                  </div>
                                  <div class="item-desc">
                                      <h4>What to expect?</h4>
                                      <p class="item-sub-desc">
                                          Your brand is about to get a HUGE update! Through our partnership with web.com, <strong>your order is eligible to receive the 1st Year FREE on a business domain and email package</strong>, to help you build your brand. <a href="#" data-toggle="modal" data-target="#js-modal-view-terms" class="text-light-blue">View terms</a>
                                      </p>
                                      <div class="box pad__30">
                                          <div class="row">
                                              <div class="col-lg-6">
                                                  <ul class="list-unstyled package-includes package-includes-domain-business-email">
                                                      <li class="build-brand">
                                                          <div class="t">Build Brand Credibility</div>
                                                          <p>Build credibility by developing a web presence to describe your products and services.</p>
                                                      </li>
                                                      <li class="business-card">
                                                          <div class="t">Professional Email on Business Cards</div>
                                                          <p>Build brand consistency with every new person you meet by having a professional email.</p>
                                                      </li>

                                                  </ul>
                                              </div>
                                              <div class="col-lg-6 right">
                                                  <p class="m-tlg-50 text-center">
                                                      <img src="/static/order/dashboard//img/action_items/domain-email/webcom.png" alt="">
                                                  </p>
                                                  <a href="#"  class="btn btn-green btn-block m-t-20 m-b-40 text-uppercase" style="white-space: inherit;">
                                                    Diligenciar Formulario EESS
                                                  </a>

                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="modal fade" id="js-modal-view-terms">
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <button type="button" class="close" style="opacity: 0.5; font-size:40px;" data-dismiss="modal" aria-hidden="true">×</button>
                                              <h4 class="modal-title">View Terms</h4>
                                          </div>
                                          <div class="modal-body pad__30">
                                              <sup>*</sup>DISCLAIMER:&nbsp;The one (1) year free promotion for the Business Email service includes professional email, domain registration and perfect privacy. The Business Email service will automatically renew at an annual term after the first year free promotion expires and will be collected to the credit card or payment method on file. One-Year term price is $41.88 (a discounted monthly rate of $3.49/mo., collected annually). Two Year term price is $59.76 (a discounted monthly rate of $2.49/mo., collected annually). Domain registration, renewal and perfect privacy will be included at no additional cost as long as the Business Email product remains active. If Business Email product is cancelled, domain&nbsp;registration&nbsp;and perfect privacy will renew at the current retail rates and will be billed to the credit card or payment method on file.&nbsp;<a href="https://www.web.com/" target="_blank">Web.com<sup>®</sup></a>&nbsp;will retain ownership of the domain until two consecutive renewal payments have been collected for the monthly term. Once domain ownership eligibility terms have been met,&nbsp;<a ref="https://www.web.com/" target="_blank">Web.com<sup>®</sup></a>&nbsp;will transfer ownership of the domain name to the customer. For one and two year terms, domain ownership eligibility will be met with initial term payment and ownership of the domain name will belong to the customer. Pricing is subject to change at the sole discretion of&nbsp;<a ref="https://www.web.com/" target="_blank">Web.com<sup>®</sup></a>. Customer may cancel prior to the end of the promotional period or at any time thereafter by contacting&nbsp;<a ref="https://www.web.com/" target="_blank">Web.com<sup>®</sup></a>&nbsp;at <a href="tel:8009324678">800-932-4678</a>. Please see our&nbsp;<a href="https://legal.web.com/" target="_blank">Services Agreement</a>&nbsp;for additional terms and conditions.
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="tab-pane" id="tab_business_website">
                              <div class="item open" id="js_item_box_3">
                                  <div class="item-heading">
                                      <span class="title">A contionu</span>
                                      <span class="explain pull-right">This item was included with your purchased package.</span>
                                  </div>
                                  <div class="item-desc">
                                      <h4>What to expect?</h4>
                                      <p class="item-sub-desc">
                                          You have the option to redeem a website that will be user-friendly on all devices and give
                                          <br> your business a professional appearance.
                                      </p>
                                      <div class="box pad__30">
                                          <div class="row">
                                              <div class="col-lg-6">
                                              </div>
                                              <div class="col-lg-6 right">
                                                  <p class="m-tlg-50 text-center">
                                                      <img src="/static/order/dashboard//img/action_items/snipermonkey-logo.png" alt="">
                                                  </p>
                                                  <p class="m-t-30">Fill out your intake form as the next step in receiving your business website.</p>
                                                  <a href="javascript:void(0)" class="btn btn-green btn-block m-t-b-40 text-uppercase" style="white-space: inherit;">
                                                    Subir documentos
                                                  </a>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>

                            <div class="tab-pane @if($clientDetail->llamado == 1) @if($user->tareas($user->id) === 1 ) active @endif @endif" id="tab_definir_proyecto">
                              <div class="item open" id="js_item_box_9">
                                  <div class="item-heading">
                                      <span class="title"> </span>
                                  </div>
                                  <div class="item-desc">
                                      <div class="box pad__30">
                                          <div class="row">
                                            <div class="col-md-2 ">
                                            </div>
                                              <div class="col-md-8 ">
                                                  <p class="m-tlg-50 text-center">
                                                      <img src="/static/order/dashboard//img/action_items/domain-email/webcom.png" alt="">
                                                  </p>
                                                  <a href="#" onclick="definirProyecto()" class="btn btn-green btn-block m-t-20 m-b-40 text-uppercase" style="white-space: inherit;">
                                                    Ir al Portal Inmobiliario de TAMED | Completar información del proyecto
                                                  </a>

                                              </div>
                                              <div class="col-md-2 ">
                                            </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>

                          <div class="clearfix"></div>
                      </div>
                  </div>

                    <div class="content-wrap">
                        <section id="section-line-3" class="show">
                            <div class="row">
                                <div class="col-md-12" id="invoices-list-panel">
                                    <div class="white-box">
                                        <h2>@lang('app.menu.tasks')</h2>


                                        <ul class="list-group" id="invoices-list">
                                            <li class="list-group-item">
                                                <div class="row font-bold">
                                                    <div class="col-md-10">
                                                        @lang('app.task')
                                                    </div>
                                                    <div class="col-md-2 text-right">
                                                        @lang('app.dueDate')
                                                    </div>
                                                </div>
                                            </li>
                                            <style media="screen">
                                            .text-muted {
                                                color: #000 !important;
                                              }
                                            </style>
                                            @forelse($tasks as $task)
                                              @foreach ($task->users as $member)
                                              @if ($member->id == $user->id )
                                                <li class="list-group-item">
                                                    <div class="row">
                                                        <div class="col-md-9">

                                                           <a href="javascript:;" class="text-muted show-task-detail"
                                                             data-task-id="{{ $task->id }}">{{ ucfirst($task->heading) }}</a>


                                                        </div>
                                                        <div class="col-md-3 text-right">
                                                            <span class="@if($task->due_date->isPast()) text-danger @else text-success @endif m-r-10">{{ $task->due_date->format($global->date_format) }}</span>


                                                                <img data-toggle="tooltip" data-original-title="{{ ucwords($member->name) }}" src="{{ $member->image_url }}"
                    alt="user" class="img-circle" width="25" height="25">

                                                        </div>
                                                    </div>
                                                </li>
                                                @endif
                                              @endforeach
                                            @empty
                                                <li class="list-group-item">
                                                    <div class="row">
                                                        <div class="col-md-7">
                                                            @lang('messages.noRecordFound')
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforelse
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </section>

                    </div><!-- /content -->
                </div><!-- /tabs -->
            </section>
        </div>

            <!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#FAF9F9;">
        <h5 class="modal-title" id="exampleModalLongTitle" style="color: #000000">Estaremos en contacto</h5>
      </div>
      <input type="text" class="form-control" id="idUsuario" name="idUsuario" value=" {{$user->id}}" style="display: none">
      <div class="modal-body">
        <p>Ya estamos a pocos pasos, tu asesor se pondra en contacto contigo, te llamará al siguente numero: {{ $clientDetail->mobile }}, ¿Deseas agendar la llamada? </p>
        <p>*En caso de que el numero sea incorrecto puedes editarlo en tu informacion personal.  </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="background: #03a9f3; color: #fff;" onclick="agendarLlamada()">Agendar</button>
      </div>
    </div>
  </div>
</div>


    </div>
    <!-- .row -->

@endsection

@push('footer-script')
    <script>
        $('.show-task-detail').click(function () {
            $(".right-sidebar").slideDown(50).addClass("shw-rside");

            var id = $(this).data('task-id');
            var url = "{{ route('client.tasks.show',':id') }}";
            url = url.replace(':id', id);

            $.easyAjax({
                type: 'GET',
                url: url,
                success: function (response) {
                    if (response.status == "success") {
                        $('#right-sidebar-content').html(response.view);
                    }
                }
            });
        })
    </script>

    <script>
      
      function solicitarLlamada(id){

        $('#exampleModalLong').modal('toggle')

      }

      function agendarLlamada(id){

        id = $.trim($('#idUsuario').val());

        $.ajax({
        url: '/inversiones/public/client/agendarLlamada',
        type: 'GET',
        data: {
            "id": id
        },
        success: function(data){
            
            toastr.options = {
                "debug": false,
                "newestOnTop": false,
                "positionClass": "toast-top-center",
                "closeButton": true,
                "toastClass": "animated fadeInDown",
            };
            toastr.success('Tu llamada se agendo correctamente.');
           
        },
        error: function(xhr){
            console.log(xhr.responseText);
        },
    });

      }

      function definirProyecto(){


        window.open('https://tamed.global/cl/portafolio');

        window.location.href = "{{ route('client.misPropiedades', 1) }}";

      }

    </script>

    <script>

      var fecha = $.trim($('#fecha_limite').val());


      if(fecha != ""){

        var end = new Date(fecha);
    
        var _second = 1000;
        var _minute = _second * 60;
        var _hour = _minute * 60;
        var _day = _hour * 24;
        var timer;
    
        function showRemaining() {
            var now = new Date();
            var distance = end - now;
            if (distance < 0) {
    
                clearInterval(timer);
                document.getElementById('countdown').innerHTML = 'EXPIRED!';
    
                return;
            }
            var days = Math.floor(distance / _day);
            var hours = Math.floor((distance % _day) / _hour);
            var minutes = Math.floor((distance % _hour) / _minute);
            var seconds = Math.floor((distance % _minute) / _second);
    
            document.getElementById('countdown').innerHTML = days + ' dias  ';
            document.getElementById('countdown').innerHTML += hours + ' : ';
            document.getElementById('countdown').innerHTML += minutes + ' : ';
            document.getElementById('countdown').innerHTML += seconds ;
        }
    
        timer = setInterval(showRemaining, 1000);

      }
    </script>

@endpush
