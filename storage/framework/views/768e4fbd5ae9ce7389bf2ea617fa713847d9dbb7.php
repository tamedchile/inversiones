<?php $__env->startSection('page-title'); ?>
    <div class="row bg-title top-left-part2" >
      <!-- .page title -->
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title"><span class="circle w__40 yellow"><?php echo e($user->pnombre[0]); ?></span><?php echo e($user->pnombre); ?> <?php echo e($user->papellido); ?></h4>
        </div>
        <!-- /.page title -->
        <!-- .breadcrumb -->
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="<?php echo e(route('client.dashboard.index')); ?>"><?php echo app('translator')->get('app.menu.home'); ?></a></li>
                <li><a href="<?php echo e(route('client.projects.index')); ?>"><?php echo e(__($pageTitle)); ?></a></li>
                <li class="active"><?php echo app('translator')->get('app.menu.invoices'); ?></li>
            </ol>
        </div>
        <!-- /.breadcrumb -->
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <link href="<?php echo e(asset('css/task-stilos.css')); ?>" rel="stylesheet">


    <div class="row abajo-titulo" >
        <div class="col-md-12">

            <section>
                      <link href='https://fonts.googleapis.com/css?family=Josefin+Slab' rel='stylesheet' type='text/css'>
                      <div class="row">
                        <div class="col-md-7" style="padding: 50px">
                          <h3 class="default-title"></h3>
                          
                        </div>

                    </div>
                    <div class="wizard">
                      <ul class="nav nav-tabs">
                          <li class="<?php if( $user->tareas($user->id) < 3 ): ?> active <?php endif; ?>">
                              <a href="#tab_domain_business_email" data-toggle="tab" aria-expanded="false">
                                  <img src="<?php echo e(asset('img/icon.png')); ?>" alt="">
                                  <span>Completar datos de proyecto</span>
                              </a>
                          </li>
                      </ul>
    
                      <div class="item-desc">
                          
                          <div class="box pad__30" id="div1">
                            <h2 align="center"><strong>Datos Proyectos de preferencia</strong></h2>
                            <h6 align="center"></h6>
                            <br>
                            <br>
                            <input type="text" class="form-control" id="idUsuario" name="idUsuario" value=" <?php echo e($clientDetail->id); ?>" style="display: none">
                            <input type="number" class="form-control" id="cantidadAgregados" name="cantidadAgregados" value="0" style="display: none">
                            <div style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); padding: 30px;">
                              <div class="cabezera" >
                                  <img src="<?php echo e(asset('img/edificio.png')); ?>" alt="Información personal" style="padding: 0 0 12px;"><b style="font-size: 25px; font-weight: 100;" class="titulo-menu">Datos del proyecto</b>
                                  <hr>
                                  <?php if(count($proyectos) == 0): ?>
                                  <div class="row">
                                    <span class="pull-right text-green" style="margin-left: 5px"> <img src="<?php echo e(asset('img/plus.png')); ?>" alt="Correcto" width="20px"> </span>
                                  <a class="editar-datos" onclick="agregarMas()" id="agregarMas" style="float: right;">Agregar más </a>
                                  </div>
                                  <br>
                                  <div class="row">
                                    <span class="pull-right text-green" style="margin-left: 5px"> <img src="<?php echo e(asset('img/diverso.png')); ?>" alt="Correcto" width="20px"> </span>
                                  <a class="editar-datos" onclick="limpiar()" id="agregarMas" style="float: right;">Limpiar extras</a>
                                  </div>
                                  <br>
                                <div class="row">
                                  <div class="col-xs-3 col-sm-12 col-md-3">
                                      <div class="form-group">
                                          <p align="center" class="control-label" for="urlProyecto">Url</p>
                                          <input type="url" class="form-control" id="urlProyecto" name="urlProyecto">
                                      </div>
                                  </div>
                                  <div class="col-xs-3 col-sm-12 col-md-3">
                                    <div class="form-group">
                                          <p align="center" class="control-label" for="inmobiliaria">Inmobiliaria</p>
                                          <input type="text" class="form-control" id="inmobiliaria" name="inmobiliaria">
                                      </div>
                                  </div>
                                  <div class="col-xs-3 col-sm-12 col-md-3">
                                    <div class="form-group">
                                       <p align="center" class="control-label" for="tipoPropiedad">Tipo Propiedad</p>
                                       <select class="form-control" id="tipoPropiedad" name="tipoPropiedad">
                                         <option hidden selected>Seleccione tipo propiedad</option>
                                         <option value="Departamento">Departamento</option>
                                         <option value="Casa">Casa</option>
                                         <option value="Oficina">Oficina</option>
                                       </select>
                                    </div>
                                  </div>
                                  <div class="col-xs-3 col-sm-12 col-md-3">
                                    <div class="form-group">
                                          <p align="center" class="control-label" for="pisoPreferencia">Piso de preferencia</p>
                                          <input type="number" min="0" max="50" class="form-control" id="pisoPreferencia" name="pisoPreferencia">
                                      </div>
                                  </div>
                                </div>  
                                <div class="row">
                                  <div class="col-xs-3 col-sm-12 col-md-3">
                                    <div class="form-group">
                                        <p align="center" class="control-label" for="orientacion">Orientacion</p>
                                        <input type="text" class="form-control" id="orientacion" name="orientacion">
                                    </div>
                                  </div>
                                  <div class="col-xs-3 col-sm-12 col-md-3">
                                    <div class="form-group">
                                        <p align="center" class="control-label" for="cantBaños">Cantidad baños</p>
                                        <input type="number" min="0" max="5" class="form-control" id="cantBaños" name="cantBaños">
                                    </div>
                                  </div>
                                  <div class="col-xs-3 col-sm-12 col-md-3">
                                    <div class="form-group">
                                          <p align="center" class="control-label" for="cantDormitorios">Cantidad dormitorios</p>
                                          <input type="number" max="5" min="0" class="form-control" id="cantDormitorios" name="cantDormitorios">
                                      </div>
                                  </div>
                                  <div class="col-xs-3 col-sm-12 col-md-3">
                                    <div class="form-group">
                                          <p align="center" class="control-label" for="metrosCuadrados">Metros Cuadrados</p>
                                          <input type="number" min="0" class="form-control" id="metrosCuadrados" name="metrosCuadrados">
                                      </div>
                                  </div>

                                </div>
                                <div class="row"> 
                                  <div class="col-xs-3 col-sm-12 col-md-12">
                                    <div class="form-group">
                                          <p align="center" class="control-label" for="observaciones">Observaciones</p>
                                          <input type="text" class="form-control" id="observaciones" name="observaciones">
                                      </div>
                                  </div>

                                </div>

                                <div id="masProyectos">


                                  
                                </div>

                                <div class="row">
                                  <div class="col-xs-12 col-sm-12 col-md-6">
                                    
                                  </div>
                                  <div class="col-xs-12 col-sm-12 col-md-6">
                                    
                                      <button onclick="guardarDatos()" href="#" style="float: right;" id="save" class="btn btn-success"><i class="fa fa-check"></i> Listo
                                      </button>
                                  </div>
                                </div>
                                <?php else: ?>

                                  <?php
                                   $i= 1; 
                                  ?>
                                  <?php $__currentLoopData = $proyectos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $proyecto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                  
                                    <div class="row">  
                                      <div class="col-md-4">
                                          <div class="row-data flex center">
                                                <p class="datos-contacto"><b>Inmobiliaria <?php echo e($i); ?> :</b><?php echo e($proyecto->inmobiliaria); ?></p>
                                          </div>
                                          <div class="row-data flex center">
                                                <p class="datos-contacto"><b>Tipo propiedad <?php echo e($i); ?> :</b> <?php echo e($proyecto->tipo_propiedad); ?> </p>
                                          </div>
                                        <div class="row-data flex center">
                                              <p class="datos-contacto"><b>Piso preferencia <?php echo e($i); ?> :</b> <?php echo e($proyecto->piso_preferencia); ?> </p>
                                        </div>
                                      </div>
                                      <div class="col-md-4">
                                        <div class="row-data flex center">
                                              <p class="datos-contacto"><b>Orientacion <?php echo e($i); ?> :</b> <?php echo e($proyecto->orientacion); ?></p>
                                        </div>
                                        <div class="row-data flex center">
                                              <p class="datos-contacto"><b>Cantidad de baños <?php echo e($i); ?> :</b> <?php echo e($proyecto->cantidad_baños); ?> </p>
                                        </div>
                                        <div class="row-data flex center">
                                              <p class="datos-contacto"><b>Cantidad dormitorios <?php echo e($i); ?> :</b> <?php echo e($proyecto->cantidad_dormitorios); ?></p>
                                        </div>
                                      </div>
                                      <div class="col-md-4">
                                        <div class="row-data flex center">
                                              <p class="datos-contacto"><b>Metros cuadrados <?php echo e($i); ?> :</b> <?php echo e($proyecto->metros_cuadrados); ?> </p>
                                        </div>
                                        <div class="row-data flex center">
                                              <p class="datos-contacto"><b>Observaciones <?php echo e($i); ?> :</b> <?php echo e($proyecto->observaciones); ?> </p>
                                        </div>
                                      </div>
                                    </div>

                                    <br>
                                  <?php
                                   $i= $i+1; 
                                  ?>

                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                              </div>

                            </div>
                          </div>
                      </div>
                  </div>
                </div><!-- /tabs -->
            </section>
        </div>


    </div>
    <!-- .row -->

    <!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#FAF9F9;">
        <h5 class="modal-title" id="exampleModalLongTitle" style="color: #000000">INSTRUICCIONES</h5>
      </div>
      <div class="modal-body">
        <p>
         Necesitamos que nos indiques los siguentes datos de la propiedad de la cual estas interesado: inmobiliaria, tipo de propiedad, piso de preferencia, orientación, cantidad de dormitorios, cantidad de baños, metros cuadrados. </p>
         <p>
         Además de cualquier otro dato a incluir en el campo: Observaciones
        </p>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="background: #03a9f3; color: #fff;">Entendido</button>
      </div>
    </div>
  </div>
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<?php $__env->stopSection(); ?> 



<?php $__env->startPush('footer-script'); ?>




<script>
  $(document).ready(function(){

    $('#exampleModalLong').modal('toggle')


  });
  $('.show-task-detail').click(function () {
      $(".right-sidebar").slideDown(50).addClass("shw-rside");

      var id = $(this).data('task-id');
      var url = "<?php echo e(route('client.tasks.show',':id')); ?>";
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
  });
    </script>

    <script type="text/javascript">

      function limpiar(){

        $('#masProyectos').empty();

        $('#cantidadAgregados').val(0);

      }
      
      function agregarMas(){

        cantidad =  parseInt($('#cantidadAgregados').val());

        cantidad = cantidad + 1;

        $('#cantidadAgregados').val(cantidad);

        $('#masProyectos').append('<div class="row">'+
                                  '<h2 align="center">Proyecto extra '+cantidad+ '</h2>'+
                                  '<div class="col-xs-3 col-sm-12 col-md-3">'+
                                      '<div class="form-group">'+
                                          '<p align="center" class="control-label" for="urlProyecto'+cantidad+'">Url</p>'+
                                          '<input type="url" class="form-control" id="urlProyecto'+cantidad+'" name="urlProyecto'+cantidad+'">'+
                                      '</div>'+
                                  '</div>'+
                                  '<div class="col-xs-3 col-sm-12 col-md-3">'+
                                    '<div class="form-group">'+
                                          '<p align="center" class="control-label" for="inmobiliaria'+cantidad+'">Inmobiliaria</p>'+
                                          '<input type="text" class="form-control" id="inmobiliaria'+cantidad+'" name="inmobiliaria'+cantidad+'">'+
                                      '</div>'+
                                  '</div>'+
                                  '<div class="col-xs-3 col-sm-12 col-md-3">'+
                                    '<div class="form-group">'+
                                       '<p align="center" class="control-label" for="tipoPropiedad'+cantidad+'">Tipo Propiedad</p>'+
                                       '<select class="form-control" id="tipoPropiedad'+cantidad+'" name="tipoPropiedad'+cantidad+'">'+
                                         '<option hidden selected>Seleccione tipo propiedad</option>'+
                                         '<option value="Departamento">Departamento</option>'+
                                         '<option value="Casa">Casa</option>'+
                                         '<option value="Oficina">Oficina</option>'+
                                       '</select>'+
                                    '</div>'+
                                  '</div>'+
                                  '<div class="col-xs-3 col-sm-12 col-md-3">'+
                                    '<div class="form-group">'+
                                          '<p align="center" class="control-label" for="pisoPreferencia'+cantidad+'">Piso de preferencia</p>'+
                                          '<input type="number" min="0" max="50" class="form-control" id="pisoPreferencia'+cantidad+'" name="pisoPreferencia'+cantidad+'">'+
                                      '</div>'+
                                  '</div>'+
                                '</div>  '+
                                '<div class="row">'+
                                  '<div class="col-xs-3 col-sm-12 col-md-3">'+
                                    '<div class="form-group">'+
                                        '<p align="center" class="control-label" for="orientacion'+cantidad+'">Orientacion</p>'+
                                        '<input type="text" class="form-control" id="orientacion'+cantidad+'" name="orientacion'+cantidad+'">'+
                                    '</div>'+
                                  '</div>'+
                                  '<div class="col-xs-3 col-sm-12 col-md-3">'+
                                    '<div class="form-group">'+
                                        '<p align="center" class="control-label" for="cantBaños'+cantidad+'">Cantidad Baños</p>'+
                                        '<input type="number" min="0" max="5" class="form-control" id="cantBaños'+cantidad+'" name="cantBaños'+cantidad+'">'+
                                    '</div>'+
                                  '</div>'+
                                  '<div class="col-xs-3 col-sm-12 col-md-3">'+
                                    '<div class="form-group">'+
                                          '<p align="center" class="control-label" for="cantDormitorios'+cantidad+'">Cantidad dormitorios</p>'+
                                          '<input type="number" max="5" min="0" class="form-control" id="cantDormitorios'+cantidad+'" name="cantDormitorios'+cantidad+'">'+
                                      '</div>'+
                                  '</div>'+
                                  '<div class="col-xs-3 col-sm-12 col-md-3">'+
                                    '<div class="form-group">'+
                                          '<p align="center" class="control-label" for="metrosCuadrados'+cantidad+'">Metros Cuadrados</p>'+
                                          '<input type="number" min="0" class="form-control" id="metrosCuadrados'+cantidad+'" name="metrosCuadrados'+cantidad+'">'+
                                      '</div>'+
                                  '</div>'+

                                '</div>'+
                                '<div class="row"> '+
                                  '<div class="col-xs-3 col-sm-12 col-md-12">'+
                                    '<div class="form-group">'+
                                          '<p align="center" class="control-label" for="observaciones'+cantidad+'">Observaciones</p>'+
                                          '<input type="text" class="form-control" id="observaciones'+cantidad+'" name="observaciones'+cantidad+'">'+
                                      '</div>'+
                                  '</div>'+

                                '</div>');


      }

    </script>

    <script type="text/javascript">
      
      function guardarDatos(){

        cantidad =  parseInt($('#cantidadAgregados').val());
        id = $.trim($('#idUsuario').val());


        var hoy = new Date();
        var mes = hoy.getMonth();
        var day = hoy.getDate();
        var hora = hoy.getHours();
        var año = hoy.getFullYear();
        var minutos = hoy.getMinutes();

        mes = mes + 1;
        var dia = hoy.getDay();

        if(dia == 6){

          var sum = 1;
        }else if(dia == 7){

          var sum = 0;

        }else if (dia == 5){

          var sum = 2;

        }else{

          var sum = 0;
        }

        sum = sum + 3;

        var day2 = day+sum;

        var fecha_limite = new Date(mes+'/'+day2+'/'+año+' '+hora+':'+minutos);

        

        if(cantidad > 0){

          i = 1;

          var arrayDatos  = new Array();

            item = {}
            item ["url"] = $.trim($('#urlProyecto').val());
            item ["inmobiliaria"] = $.trim($('#inmobiliaria').val()); 
            item ["tipoPropiedad"] = $('#tipoPropiedad').find(":selected").val();
            item ["pisoPreferencia"] = $.trim($('#pisoPreferencia').val());
            item ["orientacion"] = $.trim($('#orientacion').val());
            item ["cantBaños"] = $.trim($('#cantBaños').val());
            item ["cantDormitorios"] = $.trim($('#cantDormitorios').val());
            item ["metrosCuadrados"] = $.trim($('#metrosCuadrados').val());
            item ["observaciones"] = $.trim($('#observaciones').val());
            arrayDatos.push(item);

          while (i <= cantidad){

            item = {}
            item ["url"] = $.trim($('#urlProyecto'+i+'').val());
            item ["inmobiliaria"] = $.trim($('#inmobiliaria'+i+'').val()); 
            item ["tipoPropiedad"] = $('#tipoPropiedad'+i+'').find(":selected").val();
            item ["pisoPreferencia"] = $.trim($('#pisoPreferencia'+i+'').val());
            item ["orientacion"] = $.trim($('#orientacion'+i+'').val());
            item ["cantBaños"] = $.trim($('#cantBaños'+i+'').val());
            item ["cantDormitorios"] = $.trim($('#cantDormitorios'+i+'').val());
            item ["metrosCuadrados"] = $.trim($('#metrosCuadrados'+i+'').val());
            item ["observaciones"] = $.trim($('#observaciones'+i+'').val());
            arrayDatos.push(item);

            i++;

          }

            $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });
            $.ajax({
                url: 'guardarDatosProyectos',
                type: 'GET',
                data: {
                    "id": id,
                    "array": arrayDatos,
                    "fecha_limite": fecha_limite
                },
                success: function(data){
                    toastr.options = {
                      "debug": false,
                      "newestOnTop": false,
                      "positionClass": "toast-top-center",
                      "closeButton": true,
                      "toastClass": "animated fadeInDown",
                  };
                  toastr.success('Datos guardados correctamente');

                  setTimeout(location.reload(),7000); 
                   
                },
                error: function(xhr){

                    console.log(xhr.responseText);

                    alert(0);
                },
            });

        }else{

            var arrayDatos  = new Array();
            

            item = {}
            item ["url"] = $.trim($('#urlProyecto').val());
            item ["inmobiliaria"] = $.trim($('#inmobiliaria').val()); 
            item ["tipoPropiedad"] = $('#tipoPropiedad').find(":selected").val();
            item ["pisoPreferencia"] = $.trim($('#pisoPreferencia').val());
            item ["orientacion"] = $.trim($('#orientacion').val());
            item ["cantBaños"] = $.trim($('#cantBaños').val());
            item ["cantDormitorios"] = $.trim($('#cantDormitorios').val());
            item ["metrosCuadrados"] = $.trim($('#metrosCuadrados').val());
            item ["observaciones"] = $.trim($('#observaciones').val());
            arrayDatos.push(item);


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: 'guardarDatosProyectos',
                type: 'GET',
                data: {
                    "id": id,
                    "array": arrayDatos,
                    "fecha_limite": fecha_limite
                },
                success: function(data){

                  if(data == 1){
                  toastr.options = {
                      "debug": false,
                      "newestOnTop": false,
                      "positionClass": "toast-top-center",
                      "closeButton": true,
                      "toastClass": "animated fadeInDown",
                  }
                  toastr.success('Datos guardados correctamente');

                  
                  setTimeout(location.reload(),7000); 

                  }

                   
                },
                error: function(xhr){

                    console.log(xhr.responseText);

                    alert(0);
                },
            });

        }

      }

    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.client-app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\inversiones\resources\views/client/tasks/definicion_proyectos.blade.php ENDPATH**/ ?>