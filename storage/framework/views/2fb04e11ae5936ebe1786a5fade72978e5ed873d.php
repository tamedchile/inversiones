<?php $__env->startSection('page-title'); ?>
  <div class="row bg-title top-left-part2" >
    <!-- .page title -->
      <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
          <h4 class="page-title"><span class="circle w__40 gray"><?php echo e($user->pnombre[0]); ?></span><?php echo e($user->pnombre); ?> <?php echo e($user->papellido); ?></h4>

      </div>
        <!-- /.page title -->
        <!-- .breadcrumb -->

        <!-- /.breadcrumb -->
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
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
                        <?php echo Form::open(['id'=>'updateProfile','class'=>'ajax-form','method'=>'PUT']); ?>

                        <div class="form-body">

                              <div class="row row-perfil" style="margin-bottom: 25px">
                                <div class="cabezera" >
                                    <img src="<?php echo e(asset('img/ra-offer.png')); ?>" alt="Información personal" style="padding: 0 0 12px;"><b style="font-size: 25px; font-weight: 100;" class="titulo-menu">Información personal</b>
                                    <?php if($clientDetail->pnombre == '' || $clientDetail->snombre == '' || $clientDetail->papellido == ''|| $clientDetail->sapellido == '' || $clientDetail->rut == '' || $clientDetail->fnacimiento == ''): ?><span class="pull-right text-green" style="margin-left: 5px"> <img src="<?php echo e(asset('img/remove.png')); ?>" alt="faltan datos" width="20px"> </span><?php else: ?>
                                    <span class="pull-right text-green" style="margin-left: 5px"> <img src="<?php echo e(asset('img/correct.png')); ?>" alt="Correcto" width="20px"> </span><?php endif; ?>
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
                                                  <?php if(is_null($userDetail->image)): ?>
                                                      <img src="https://via.placeholder.com/200x150.png?text=<?php echo e(str_replace(' ', '+', __('modules.profile.uploadPicture'))); ?>"
                                                           alt=""/>
                                                  <?php else: ?>
                                                      <img src="<?php echo e(asset_url('avatar/'.$userDetail->image)); ?>" alt=""/>
                                                  <?php endif; ?>
                                              </div>
                                              <div class="fileinput-preview fileinput-exists thumbnail"
                                                   style="max-width: 200px; max-height: 150px;"></div>
                                              <div>
                                                <span class="btn btn-info btn-file" style="padding: 8px 29px;">
                                                  <span class="fileinput-new"> <?php echo app('translator')->get("app.selectImage"); ?> </span>
                                                  <span class="fileinput-exists"> <?php echo app('translator')->get("app.change"); ?> </span>
                                                  <input type="file" name="image" id="image"> </span>
                                                  <a href="javascript:;" class="btn btn-danger fileinput-exists"
                                                     data-dismiss="fileinput"> <?php echo app('translator')->get("app.remove"); ?> </a>
                                              </div>
                                          </div>
                                      </div>

                                  </div>

                                  <div class="col-md-9">
                                    <div class="col-md-6 ">
                                        <div class="form-group">
                                            <label>Primer nombre</label>
                                            <input type="text" name="pnombre" id="pnombre"
                                                   class="form-control" value="<?php echo e($clientDetail->pnombre); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6 ">
                                        <div class="form-group">
                                            <label>Segundo Nombre</label>
                                            <input type="text" name="snombre" id="snombre"
                                                   class="form-control" value="<?php echo e($clientDetail->snombre); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6 ">
                                        <div class="form-group">
                                            <label>Apellido paterno</label>
                                            <input type="text" name="papellido" id="papellido"
                                                   class="form-control" value="<?php echo e($clientDetail->papellido); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6 ">
                                        <div class="form-group">
                                            <label>Apellido materno</label>
                                            <input type="text" name="sapellido" id="sapellido"
                                                   class="form-control" value="<?php echo e($clientDetail->sapellido); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6 ">
                                        <div class="form-group">
                                            <label>Rut</label>
                                            <input type="text" name="rut" id="rut"
                                                   class="form-control" value="<?php echo e($clientDetail->rut); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6 ">
                                        <div class="form-group">
                                            <label>Fecha de nacimiento</label>
                                            <input type="date" name="fnacimiento" id="fnacimiento"
                                                   class="form-control" value="<?php echo e($clientDetail->fnacimiento); ?>">
                                        </div>
                                    </div>

                                  </div>
                                  <div class="form-actions">

                                        <button  style="float: right;margin-bottom: 30px;" type="submit" id="save-form" class="btn btn-success"><i class="fa fa-check"></i>
                                            <?php echo app('translator')->get("app.update"); ?>
                                        </button>
                                        <button style="float: right;margin-right: 10px;margin-bottom: 30px" type="reset" class="btn btn-default"><?php echo app('translator')->get("app.reset"); ?></button>

                                  </div>
                                </div>
                                <div class="row" style="padding: 0 13px 30px;" id="id-info">
                                  <div class="col-md-3" style="padding-top: 0px;">
                                      <div class="f-size__24 text-medium m-b-15">
                                        <?php if(is_null($userDetail->image)): ?>
                                          <img src="https://via.placeholder.com/200x150.png?text=<?php echo e(str_replace(' ', '+', __('modules.profile.uploadPicture'))); ?>"
                                               alt="" width="180px" style="border-radius: 4%;"/>
                                      <?php else: ?>
                                          <img src="<?php echo e(asset_url('avatar/'.$userDetail->image)); ?>" alt="" width="180px" style="border-radius: 4%;"/>
                                      <?php endif; ?>

                                    </div>

                                  </div>
                                  <div class="col-md-9" style="margin-top: 38px;">
                                      <div class="row-data flex center">
                                            <p class="datos-contacto"><b>Nombre:</b> <?php echo e($clientDetail->pnombre); ?> <?php echo e($clientDetail->snombre); ?> <?php echo e($clientDetail->papellido); ?> <?php echo e($clientDetail->sapellido); ?></p>
                                      </div>

                                      <div class="row-data flex center">
                                            <p class="datos-contacto"><b>Rut:</b> <?php echo e($clientDetail->rut); ?></p>
                                      </div>
                                      <div class="row-data flex center">
                                            <p class="datos-contacto"><b>Fecha de nacimiento:</b> <?php echo e(date('d-m-Y', strtotime($clientDetail->fnacimiento))); ?></p>
                                      </div>


                                  </div>
                                </div>

                              </div>



                              <div class="row row-perfil" style="margin-bottom: 25px">
                                <div class="cabezera" >
                                  <img src="<?php echo e(asset('img/phone-email.png')); ?>" alt="Datos de contacto" style="padding: 0 0 12px;"><b style="font-size: 25px; font-weight: 100;" class="titulo-menu">Información de contacto</b>
                                  <?php if($clientDetail->company_name == '' || $clientDetail->address == '' || $clientDetail->mobile == ''|| $clientDetail->comuna == '' || $clientDetail->ciudad == ''): ?><span class="pull-right text-green" style="margin-left: 5px"> <img src="<?php echo e(asset('img/remove.png')); ?>" alt="faltan datos" width="20px"> </span><?php else: ?>
                                  <span class="pull-right text-green" style="margin-left: 5px"> <img src="<?php echo e(asset('img/correct.png')); ?>" alt="Correcto" width="20px"> </span><?php endif; ?>
                                  <a class="editar-datos" onclick="desplegar_formc()" id="editarc" style="float: right;">Editar </a>
                                  <a class="editar-datos" onclick="desplegar_infoc()" id="noeditarc" style="float: right;" hidden>Cerrar </a>
                                  <hr>
                                </div>
                                <div class="row" id="form-contacto" hidden>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Institución o empresa</label>
                                            <input type="text" name="company_name" value="<?php echo e($clientDetail->company_name); ?>" id="company_name" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Correo electrónico</label>
                                            <input type="email" name="email" id="email"
                                                   class="form-control"  value="<?php echo e($clientDetail->email); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Teléfono fijo</label>
                                            <input type="tel" name="fijo" id="fijo" class="form-control"
                                                   value="<?php echo e($clientDetail->fijo); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Teléfono móvil</label>
                                            <input type="tel" name="mobile" id="mobile" class="form-control" value="<?php echo e($clientDetail->mobile); ?>">
                                        </div>
                                    </div>



                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Dirección</label>
                                            <input type="text" name="address" id="address" rows="5" value="<?php echo e($clientDetail->address); ?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Comuna</label>
                                            <input type="text" name="comuna" value="<?php echo e($clientDetail->comuna); ?>" id="comuna" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Ciudad</label>
                                            <input type="text" name="ciudad" value="<?php echo e($clientDetail->ciudad); ?>" id="ciudad" class="form-control">
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
                                              <?php echo app('translator')->get("app.update"); ?>
                                          </button>
                                          <button style="float: right;margin-right: 10px;margin-bottom: 30px" type="reset" class="btn btn-default"><?php echo app('translator')->get("app.reset"); ?></button>

                                    </div>
                                  </div>
                                  <div class="row" style="padding: 0 13px 30px;" id="info-contacto">
                                    <div class="col-md-6">
                                        <div class="row-data flex center">
                                              <p class="datos-contacto"><b>Institución o empresa:</b> <?php echo e($clientDetail->company_name); ?></p>
                                        </div>

                                        <div class="row-data flex center">
                                              <p class="datos-contacto"><b>Correo electrónico:</b> <?php echo e($clientDetail->email); ?></p>
                                        </div>
                                        <div class="row-data flex center">
                                              <p class="datos-contacto"><b>Teléfono fijo:</b> <?php echo e($clientDetail->fijo); ?></p>
                                        </div>
                                        <div class="row-data flex center">
                                              <p class="datos-contacto"><b>Teléfono móvil:</b> <?php echo e($clientDetail->mobile); ?></p>
                                        </div>




                                    </div>
                                    <div class="col-md-6">
                                      <div class="row-data flex center">
                                            <p class="datos-contacto"><b>Dirección:</b> <?php echo e($clientDetail->address); ?></p>
                                      </div>
                                      <div class="row-data flex center">
                                            <p class="datos-contacto"><b>Comuna:</b> <?php echo e($clientDetail->comuna); ?></p>
                                      </div>
                                      <div class="row-data flex center">
                                            <p class="datos-contacto"><b>Ciudad:</b> <?php echo e($clientDetail->ciudad); ?></p>
                                      </div>
                                    </div>
                                  </div>
                              </div>
                              <div class="row row-perfil">
                                <div class="cabezera" >
                                  <img src="<?php echo e(asset('img/icon-business-banking.png')); ?>" alt="Datos de bancarios" style="padding: 0 0 12px; width: 34px;"><b style="font-size: 25px; font-weight: 100;" class="titulo-menu">Información Bancaria</b>
                                  <?php if($clientDetail->cuentabancaria == '' || $clientDetail->banco == '' || $clientDetail->tipocuentabancaria == ''): ?><span class="pull-right text-green" style="margin-left: 5px"> <img src="<?php echo e(asset('img/remove.png')); ?>" alt="faltan datos" width="20px"> </span><?php else: ?>
                                  <span class="pull-right text-green" style="margin-left: 5px"> <img src="<?php echo e(asset('img/correct.png')); ?>" alt="Correcto" width="20px"> </span><?php endif; ?>
                                  <a class="editar-datos" onclick="desplegar_formb()" id="editarb" style="float: right;">Editar </a>
                                  <a class="editar-datos" onclick="desplegar_infob()" id="noeditarb" style="float: right;" hidden>Cerrar </a>
                                  <hr>
                                </div>
                                <div class="row" id="form-banco" hidden>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Tipo cuenta bancaria</label>
                                            <input type="text" name="tipocuentabancaria" value="<?php echo e($clientDetail->tipocuentabancaria); ?>" id="tipocuentabancaria" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Banco</label>
                                            <input type="text" name="banco" id="banco"
                                                   class="form-control"  value="<?php echo e($clientDetail->banco); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Número de cuenta</label>
                                            <input type="num" name="cuentabancaria" id="cuentabancaria" class="form-control"
                                                   value="<?php echo e($clientDetail->cuentabancaria); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Ejecutivo</label>
                                            <input type="text" name="ejecutivobancario" id="ejecutivobancario" class="form-control"
                                                   value="<?php echo e($clientDetail->ejecutivobancario); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Correo del Ejecutivo</label>
                                            <input type="text" name="correoejecutivo" id="correoejecutivo" rows="5"
                                              value="<?php echo e($clientDetail->correoejecutivo); ?>"        class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-actions">

                                          <button  style="float: right;margin-bottom: 30px;" type="submit" id="save-form3" class="btn btn-success"><i class="fa fa-check"></i>
                                              <?php echo app('translator')->get("app.update"); ?>
                                          </button>
                                          <button style="float: right;margin-right: 10px;margin-bottom: 30px" type="reset" class="btn btn-default"><?php echo app('translator')->get("app.reset"); ?></button>

                                    </div>
                                </div>
                                <div class="row" style="padding: 0 13px 30px;" id="info-banco">
                                    <div class="col-md-6">
                                        <div class="row-data flex center">
                                              <p class="datos-contacto"><b>Tipo de cuenta:</b> <?php echo e($clientDetail->tipocuentabancaria); ?></p>
                                        </div>

                                        <div class="row-data flex center">
                                              <p class="datos-contacto"><b>Banco:</b> <?php echo e($clientDetail->banco); ?></p>
                                        </div>
                                        <div class="row-data flex center">
                                              <p class="datos-contacto"><b>Cuenta bancaria:</b> <?php echo e($clientDetail->cuentabancaria); ?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row-data flex center">
                                              <p class="datos-contacto"><b>Ejecutivo:</b> <?php echo e($clientDetail->ejecutivobancario); ?></p>
                                        </div>
                                        <div class="row-data flex center">
                                              <p class="datos-contacto"><b>Correo del Ejecutivo:</b> <?php echo e($clientDetail->correoejecutivo); ?></p>
                                        </div>
                                    </div>
                                </div>
                              </div>


                        </div>

                        <?php echo Form::close(); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>    <!-- .row -->

    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <br><br><br>
      <div class="modal-body">
        El texto editar sobre cada uno de los apartados permite que se desplique el formulario correspondiente para permitir actualizar los datos <br>
        el textp cerrar permite volver a la vista de revision de datos en cada apartado <br>
         la imagen <img src="<?php echo e(asset('img/remove.png')); ?>" alt="faltan datos" width="20px"> indica que en alguno de los apartados aun faltan datos por diligenciar <br>
         la imagen <img src="<?php echo e(asset('img/correct.png')); ?>" alt="faltan datos" width="20px"> indica que los datos han sido diligenciados en su totalidad, a partir de este momento se cerrara la tarea y podras avanzar en tu proceso.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('footer-script'); ?>
<script>
    $( document ).ready(function() {
    $('#exampleModal').modal('toggle')
    });

    $('#save-form').click(function () {
        $.easyAjax({
            url: '<?php echo e(route('client.profile.update', [$userDetail->id])); ?>',
            container: '#updateProfile',
            type: "POST",
            redirect: true,
            file: (document.getElementById("image").files.length == 0) ? false : true,
            data: $('#updateProfile').serialize()
        })
    });
    $('#save-form2').click(function () {
        $.easyAjax({
            url: '<?php echo e(route('client.profile.update', [$userDetail->id])); ?>',
            container: '#updateProfile',
            type: "POST",
            redirect: true,
            file: (document.getElementById("image").files.length == 0) ? false : true,
            data: $('#updateProfile').serialize()
        })
    });
    $('#save-form3').click(function () {
        $.easyAjax({
            url: '<?php echo e(route('client.profile.update', [$userDetail->id])); ?>',
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
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.client-app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/inversiones.tamed.global/public_html/dashboard/resources/views/client/profile/edit.blade.php ENDPATH**/ ?>