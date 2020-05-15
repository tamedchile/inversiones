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
                                  <img src="<?php echo e(asset('img/form.png')); ?>" alt="">
                                  <span>Completar formulario de EESS</span>
                              </a>
                          </li>
                      </ul>
    
                      <div class="item-desc">
                          
                          <div class="box pad__30" id="div1">
                            <h2 align="center"><strong>Antecedentes para Inversión Inmobiliaria</strong></h2>
                            <h6 align="center">Información privada, protegida por las condiciones de uso y manejo establecidas por la empresa TAMED Inversiones S.p.A.</h6>
                            <br>
                            <br>
                            <input type="text" class="form-control" id="idUsuario" name="idUsuario" value=" <?php echo e($clientDetail->id); ?>" style="display: none">
                            <?php if($eess->paso === 1 || $eess->paso === 12): ?>
                            <div style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); padding: 30px;">
                              <div class="cabezera" >
                                  <img src="<?php echo e(asset('img/ra-offer.png')); ?>" alt="Información personal" style="padding: 0 0 12px;"><b style="font-size: 25px; font-weight: 100;" class="titulo-menu">Antecedentes personales</b>
                                  <?php if($clientDetail->pnombre == '' || $clientDetail->snombre == '' || $clientDetail->papellido == ''|| $clientDetail->sapellido == '' || $clientDetail->rut == '' || $clientDetail->fnacimiento == '' || $clientDetail->nacionalidad == null || $clientDetail->nacionalidad == ''): ?><span class="pull-right text-green" style="margin-left: 5px"> <img src="<?php echo e(asset('img/remove.png')); ?>" alt="faltan datos" width="20px"> </span><?php else: ?>
                                  <span class="pull-right text-green" style="margin-left: 5px"> <img src="<?php echo e(asset('img/correct.png')); ?>" alt="Correcto" width="20px"> </span><?php endif; ?>
                                <?php if($clientDetail->estado == 1): ?>
                                  <a class="editar-datos" onclick="desplegar_form_personal()" id="editarPersonal" style="float: right;">Editar </a>
                                  <a class="editar-datos" onclick="desplegar_info_personal()" id="verPersonal" style="float: right;" hidden>Cerrar </a>

                                <?php endif; ?>

                                  <hr>
                              </div>

                                                                        <form id="form_eess">
                                            <?php if($clientDetail->estado == 1): ?>
                                            <div id="divAntecedentesPersonales" hidden>
                                            <?php else: ?>
                                            <div id="divAntecedentesPersonales">
                                            <?php endif; ?>
                                              <div class="row">
                                                <div class="col-xs-12 col-sm-12 col-md-3">
                                                    <div class="form-group">
                                                        <p align="center" class="control-label" for="PnombreUsuario">Primer nombre</p>
                                                        <input type="text" class="form-control" id="PnombreUsuario" name="PnombreUsuario" value="<?php echo e($clientDetail->pnombre); ?>">
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-3">
                                                    <div class="form-group">
                                                        <p align="center" class="control-label" for="SnombreUsuario">Segundo nombre</p>
                                                        <input type="text" class="form-control" id="SnombreUsuario" name="SnombreUsuario" value=" <?php echo e($clientDetail->snombre); ?>">
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-3">
                                                    <div class="form-group">
                                                        <p align="center" class="control-label" for="PapellidoUsuario">Primer Apellido</p>
                                                        <input type="text" class="form-control" id="PapellidoUsuario" name="PapellidoUsuario" value=" <?php echo e($clientDetail->papellido); ?>">
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-3">
                                                    <div class="form-group">
                                                        <p align="center" class="control-label" for="SapellidoUsuario">Segundo Apellido</p>
                                                        <input type="text" class="form-control" id="SapellidoUsuario" name="SapellidoUsuario" value=" <?php echo e($clientDetail->sapellido); ?>">
                                                    </div>
                                                </div>
                                              </div>
                                              <br>
                                              <div class="row">
                                                <div class="col-xs-12 col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <p align="center" class="control-label" for="rutUsuario">RUT</p>
                                                        <input type="text" class="form-control" id="rutUsuario" name="rutUsuario" maxlength="15" placeholder="Solo con guión" value=" <?php echo e($clientDetail->rut); ?>">
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <p align="center" class="control-label" for="fechaNacimientoUsuario">Fecha de nacimiento</p>
                                                        <div class="input-group date"  >
                                                            <span class="input-group-addon">
                                                                <span class="fa fa-calendar"></span>
                                                            </span>
                                                            <input type="date" class="form-control" id="fechaNacimientoUsuario" name="fechaNacimientoUsuario" value="<?php echo e($clientDetail->fnacimiento); ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <p align="center" class="control-label" for="nacionalidadUsuario">Nacionalidad </p>
                                                        <input type="text" class="form-control" id="nacionalidadUsuario" name="nacionalidadUsuario" value=" <?php echo e($clientDetail->nacionalidad); ?>">
                                                    </div>
                                                </div>
                                              </div>

                                                <div class="row">
                                                  <div class="col-xs-12 col-sm-12 col-md-6">
                                                    
                                                  </div>
                                                  <div class="col-xs-12 col-sm-12 col-md-6">
                                                    
                                                      <button onclick="guardarDatosPersonales()" style="float: right;margin-bottom: 30px;" id="save-form" class="btn btn-success"><i class="fa fa-check"></i> Listo
                                                      </button>
                                                  </div>
                                                </div>
                                            </div>
                                            <?php if($clientDetail->estado == 1): ?>
                                            <div class="row" style="padding: 0 13px 30px;" id="divAntecedentesPersonalesLista">
                                            <?php else: ?>
                                            <div class="row" style="padding: 0 13px 30px;" id="info-divAntecedentesPersonalesLista" hidden>
                                            <?php endif; ?>
                                            
                                             <div class="col-md-6">
                                                 <div class="row-data flex center">
                                                       <p class="datos-contacto"><b>Nombre:</b> <?php echo e($clientDetail->pnombre); ?> <?php echo e($clientDetail->snombre); ?> <?php echo e($clientDetail->papellido); ?> <?php echo e($clientDetail->sapellido); ?></p>
                                                 </div>
                                                 <div class="row-data flex center">
                                                       <p class="datos-contacto"><b>RUT:</b> <?php echo e($clientDetail->rut); ?></p>
                                                 </div>
                                             </div>
                                             <div class="col-md-6">
                                                 <div class="row-data flex center">
                                                       <p class="datos-contacto"><b>Fecha de nacimiento:</b> <?php echo e($clientDetail->fnacimiento); ?></p>
                                                 </div>
                                                 <div class="row-data flex center">
                                                     <p class="datos-contacto"><b>Nacionalidad:</b> <?php echo e($clientDetail->nacionalidad); ?></p>
                                               </div>
                                             </div>
                                           </div>
                                        </div>
                                        <br>
                                        <br>
                                        <?php endif; ?>

                                        <?php if($eess->paso === 2 || $eess->paso === 12): ?>
                                        <div style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); padding: 30px;">
                                        
                                          <div class="cabezera" >
                                            <img src="<?php echo e(asset('img/dinero.png')); ?>" alt="Motivacion por Invertir" style="padding: 0 0 12px;"><b style="font-size: 25px; font-weight: 100;" class="titulo-menu">Tu motivación por invertir</b>
                                            <?php if($eess->motivacion == '' || $eess->tipo_v_motivacion == '' || $eess->cant_v_motivacion < 0): ?><span class="pull-right text-green" style="margin-left: 5px"> <img src="<?php echo e(asset('img/remove.png')); ?>" alt="faltan datos" width="20px"> </span><?php else: ?>
                                            <span class="pull-right text-green" style="margin-left: 5px"> <img src="<?php echo e(asset('img/correct.png')); ?>" alt="Correcto" width="20px"> </span><?php endif; ?>

                                            <?php if($eess->estado_motivacion == 1): ?>
                                              <a class="editar-datos" onclick="desplegar_form_motivacion()" id="editarMotivacion" style="float: right;">Editar </a>
                                              <a class="editar-datos" onclick="desplegar_info_motivacion()" id="verMotivacion" style="float: right;" hidden>Cerrar </a>

                                            <?php endif; ?>

                                            <hr>
                                          </div>
                                          <?php if($eess->estado_motivacion != 1): ?>
                                            <div id="divMotivacionPorInvertir" >
                                            <?php else: ?>
                                            <div id="divMotivacionPorInvertir" hidden>
                                            <?php endif; ?>
                                          
                                            <div class="row">
                                              <div class="col-xs-12 col-sm-12 col-md-12" id="divMotivacion">
                                                <div class="form-group">
                                                  <p align="center" class="control-label" for="motivacion">¿Cuál es tu motivación para invertir?</p>
                                                    <select class="form-control" id="motivacion" name="motivacion">
                                                      <option hidden selected>Elige tu motivación </option>
                                                      <option value="Primera vivienda">Primera vivienda</option>
                                                      <option value="Segunda vivienda o vacacional">Segunda vivienda o vacacional</option>
                                                      <option value="Vivienda de inversión">Vivienda de inversión</option>
                                                    </select>
                                                </div>
                                              </div>
                                              <div id="dinamicoMotivacion">
                                              </div>
                                            </div>
                                            <div class="row">
                                              <div class="col-xs-12 col-sm-12 col-md-6">
                                                
                                              </div>
                                              <div class="col-xs-12 col-sm-12 col-md-6">
                                                
                                                  <button onclick="guardarDatosMotivacion()" style="float: right;" id="save-form" class="btn btn-success"><i class="fa fa-check"></i> Listo
                                                  </button>
                                              </div>
                                            </div>
                                          </div>
                                          <?php if($eess->estado_motivacion == 1): ?>
                                            <div class="row" style="padding: 0 13px 30px;" id="divMotivacionPorInvertirLista" >
                                             <div class="col-md-6">
                                                 <div class="row-data flex center">
                                                       <p class="datos-contacto"><b>Motivación:</b>  <?php echo e($eess->motivacion); ?></p>
                                                 </div>
                                                 <div class="row-data flex center">
                                                       <p class="datos-contacto"><b>Tipo de Vivienda:</b>  <?php echo e($eess->tipo_v_motivacion); ?></p>
                                                 </div>
                                                 <?php if($eess->cant_v_motivacion != null): ?>
                                                 <div class="row-data flex center">
                                                       <p class="datos-contacto"><b>Cantidad de Viviendas:</b>  <?php echo e($eess->cant_v_motivacion); ?></p>
                                                 </div>
                                                 <?php endif; ?>
                                             </div>
                                           </div>
                                           <?php endif; ?>
                                        </div>
                                        <br>
                                        <br>
                                        <?php endif; ?>

                                        <?php if($eess->paso === 3 || $eess->paso === 12): ?>
                                        <div style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); padding: 30px;">

                                          <div class="cabezera" >
                                            <img src="<?php echo e(asset('img/libro.png')); ?>" alt="Educación" style="padding: 0 0 12px;"><b style="font-size: 25px; font-weight: 100;" class="titulo-menu">Educación</b>
                                            <?php if($eess == null || $eess->rama == '' || $eess->fecha_ingreso_rama == '' || $eess->nvl_educacional == ''|| $eess->lugar_estudio == '' || $eess->titulo == '' || $eess->año_egreso == '' ): ?><span class="pull-right text-green" style="margin-left: 5px"> <img src="<?php echo e(asset('img/remove.png')); ?>" alt="faltan datos" width="20px"> </span><?php else: ?>
                                            <span class="pull-right text-green" style="margin-left: 5px"> <img src="<?php echo e(asset('img/correct.png')); ?>" alt="Correcto" width="20px"> </span><?php endif; ?>

                                            <?php if($eess->estado_estudio == 1): ?>
                                              <a class="editar-datos" onclick="desplegar_form_estudio()" id="editarEstudio" style="float: right;">Editar </a>
                                              <a class="editar-datos" onclick="desplegar_info_estudio()" id="verEstudio" style="float: right;" hidden>Cerrar </a>

                                            <?php endif; ?>

                                            <hr>
                                          </div>
                                          <?php if($eess->estado_estudio != 1): ?>
                                            <div id="divEducacion">
                                            <?php else: ?>
                                            <div id="divEducacion" hidden>
                                            <?php endif; ?>
                                            <div class="row">
                                              <div class="col-xs-12 col-sm-12 col-md-4">
                                                <div class="form-group">
                                                  <p align="center" class="control-label" for="ramaUsuario">Rama a la que pertenece</p>
                                                    <select class="form-control" id="ramaUsuario" name="ramaUsuario">
                                                      
                                                      <?php if($eess->rama == ""): ?>
                                                      <option hidden selected>Selecciona Rama</option>
                                                      <?php else: ?>
                                                      <option selected value="<?php echo e($eess->rama); ?>"><?php echo e($eess->rama); ?></option>
                                                      <?php endif; ?>
                                                      <option value="Ejército de Chile">Ejército de Chile</option>
                                                      <option value="Armada de Chile">Armada de Chile</option>
                                                      <option value="Fuerza Aérea de Chile">Fuerza Aérea de Chile</option>
                                                      <option value="Carabineros de Chile">Carabineros de Chile</option>
                                                      <option value="Policía de Investigaciones de Chile">Policía de Investigaciones de Chile</option>
                                                      <option value="Gendarmería de Chile">Gendarmería de Chile</option>
                                                    </select>
                                                </div>
                                              </div>
                                              <div class="col-xs-12 col-sm-12 col-md-4">
                                                <div class="form-group">
                                                    <p align="center" class="control-label" for="fechaIngresoInstitucion">Indique la fecha de ingreso a la Institución</p>
                                                    <div class="input-group date"  >
                                                        <span class="input-group-addon">
                                                            <span class="fa fa-calendar"></span>
                                                        </span>
                                                        <input type="date" class="form-control" id="fechaIngresoInstitucion" name="fechaIngresoInstitucion" value="<?php echo e($eess->fecha_ingreso_rama); ?>">
                                                    </div>
                                                </div>
                                              </div>
                                              <div class="col-xs-12 col-sm-12 col-md-4">
                                                <div class="form-group">
                                                  <p align="center" class="control-label" for="nivelEducacionalUsuario">Nivel educacional</p>
                                                    <select class="form-control" id="nivelEducacionalUsuario" name="nivelEducacionalUsuario">
                                                      <?php if($eess->nvl_educacional == ""): ?>
                                                      <option hidden selected>Selecciona nivel educacional</option>
                                                      <?php else: ?>
                                                      <option selected value="<?php echo e($eess->nvl_educacional); ?>"><?php echo e($eess->nvl_educacional); ?></option>
                                                      <?php endif; ?>
                                                      <option value="Educación Técnica Completa">Educación Técnica Completa</option>
                                                      <option value="Educación Universitaria Completa">Educación Universitaria Completa</option>
                                                      <option value="Post-grado completo">Post-grado completo</option>
                                                    </select>
                                                </div>
                                              </div>
                                            </div>
                                          <br>
                                          <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-4">
                                              <div class="form-group">
                                                <p align="center" class="control-label" for="lugarEstudio">Escuela Matriz, Universidad o CFT donde cursó estudios</p>
                                                <input type="text" class="form-control" id="lugarEstudio" name="lugarEstudio" value="<?php echo e($eess->lugar_estudio); ?>">
                                              </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-4">
                                              <div class="form-group">
                                                <p align="center" class="control-label" for="tituloUsuario">Título/Licenciatura obtenida</p>
                                                <br>
                                                <input type="text" class="form-control" id="tituloUsuario" name="tituloUsuario" value="<?php echo e($eess->titulo); ?>">
                                              </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-4">
                                              <div class="form-group">
                                                <p align="center" class="control-label" for="añoEgreso">Año de egreso</p>
                                                <br>
                                                <input type="number" class="form-control" min="1900" id="añoEgreso" name="añoEgreso" value="<?php echo e($eess->año_egreso); ?>">
                                              </div>
                                            </div>
                                          </div>
                                            <div class="row">
                                              <div class="col-xs-12 col-sm-12 col-md-6">
                                                
                                              </div>
                                              <div class="col-xs-12 col-sm-12 col-md-6">
                                                
                                                  <button onclick="guardarDatosEstudios()" style="float: right;" id="save-form" class="btn btn-success"><i class="fa fa-check"></i> Listo
                                                  </button>
                                              </div>
                                            </div>
                                        </div>
                                         <?php if($eess->estado_estudio == 1): ?>
                                           <div class="row" style="padding: 0 13px 30px;" id="divEducacionLista" >
                                            <div class="col-md-6">
                                                <div class="row-data flex center">
                                                      <p class="datos-contacto"><b>Rama a la que pertenece:</b>  <?php echo e($eess->rama); ?></p>
                                                </div>
                                                <div class="row-data flex center">
                                                      <p class="datos-contacto"><b>Fecha ingreso institución:</b>  <?php echo e($eess->fecha_ingreso_rama); ?></p>
                                                </div>
                                                <div class="row-data flex center">
                                                      <p class="datos-contacto"><b>Nivel educacional:</b>  <?php echo e($eess->nvl_educacional); ?></p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="row-data flex center">
                                                      <p class="datos-contacto"><b>Establecimiento educacional:</b>  <?php echo e($eess->lugar_estudio); ?></p>
                                                </div>
                                                <div class="row-data flex center">
                                                      <p class="datos-contacto"><b>Titulo obtenido:</b>  <?php echo e($eess->titulo); ?></p>
                                                </div>
                                                <div class="row-data flex center">
                                                      <p class="datos-contacto"><b>Año egreso:</b>  <?php echo e($eess->año_egreso); ?></p>
                                                </div>
                                            </div>
                                          </div>
                                          <?php endif; ?>
                                        </div>
                                        <br>
                                        <br>
                                        <?php endif; ?>

                                        <?php if($eess->paso === 4 || $eess->paso === 12): ?>
                                        <div style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); padding: 30px;">
                                        
                                          <div class="cabezera" >
                                            <img src="<?php echo e(asset('img/madre.png')); ?>" alt="Estado civil y dependencia económica" style="padding: 0 0 12px;"><b style="font-size: 25px; font-weight: 100;" class="titulo-menu">Estado civil y dependencia económica</b>
                                            <?php if($eess->estado_civil == 'Casado'): ?><!-- SE HACE DIFERENCIA SI TIENE PAREJA O NO, AQUI ES CUANDO TIENE PAREJA -->
                                              <?php if($eess->regimen_matrimonial == '' || $eess->personas_cargo == '' || $conyuge->estado == 0): ?>
                                              <span class="pull-right text-green" style="margin-left: 5px"> <img src="<?php echo e(asset('img/remove.png')); ?>" alt="faltan datos" width="20px"> </span><?php else: ?>
                                              <span class="pull-right text-green" style="margin-left: 5px"> <img src="<?php echo e(asset('img/correct.png')); ?>" alt="Correcto" width="20px"> </span><?php endif; ?>


                                              <?php if($eess->estado_dependencia == 1): ?>
                                              <a class="editar-datos" onclick="desplegar_form_estado_civil()" id="editarEstadoCivil" style="float: right;">Editar </a>
                                              <a class="editar-datos" onclick="desplegar_info_estado_civil()" id="verEstadoCivil" style="float: right;" hidden>Cerrar </a>

                                              <?php endif; ?>


                                              <hr>
                                            </div>

                                              <?php if($eess->estado_dependencia != 1): ?>
                                              <div id="divCamposEstadoCivil">
                                              <?php else: ?>
                                              <div id="divCamposEstadoCivil" hidden>
                                              <?php endif; ?>
                                            <div class="row">
                                              <div class="col-xs-12 col-sm-12 col-md-4" id="divEstadoCivil">
                                                <div class="form-group">
                                                  <p align="center" class="control-label" for="estadoCivil">¿Cuál es tu estado civil?</p>
                                                  <br style="" id="brEstadoCivil">
                                                    <select class="form-control" id="estadoCivil" name="estadoCivil">
                                                      <option hidden selected>Selecciona estado civil</option>
                                                      <option value="Soltero">Soltero</option>
                                                      <option value="Casado">Casado</option>
                                                      <option value="Viudo">Viudo</option>
                                                      <option value="Separado">Separado</option>
                                                      <option value="Divorciado">Divorciado</option>
                                                      <option value="Conviviente">Conviviente</option>
                                                    </select>
                                                </div>
                                              </div>
                                              <div class="col-xs-12 col-sm-12 col-md-4" id="divRegimenMatrimonial">
                                                <div class="form-group">
                                                  <p align="center" class="control-label" for="regimenMatrimonial">Régimen matrimonial</p>
                                                    <br>
                                                    <select class="form-control" id="regimenMatrimonial" name="regimenMatrimonial">
                                                      <option hidden selected>Régimen matrimonial</option>
                                                      <option value="Separación de bienes">Separación de bienes</option>
                                                      <option value="Participación en las ganancias">Participación en las ganancias</option>
                                                      <option value="Sociedad conyugal">Sociedad conyugal</option>
                                                    </select>
                                                </div>
                                              </div>
                                              <div class="col-xs-12 col-sm-12 col-md-4" id="divDependientesUsuario">
                                                <div class="form-group">
                                                  <p align="center" class="control-label" for="dependientesUsuario">¿Cuántas personas dependen económicamente de ti?</p>
                                                  <input type="number" class="form-control" min="0" id="dependientesUsuario" name="dependientesUsuario">
                                                </div>
                                              </div>
                                            </div>
                                            <div id="divDatosConyuge">
                                              <br>
                                              <br>
                                              <h2 align="center">Antecedentes Cónyuge</h2>
                                              <h6 align="center">En ocasiones es bueno complementar rentas :)</h6>
                                              <br>
                                              <br>
                                              <div class="row">
                                                  <div class="col-xs-12 col-sm-12 col-md-4">
                                                      <div class="form-group">
                                                          <p align="center" class="control-label" for="primerNombreConyuge">Primer nombre</p>
                                                          <input type="text" class="form-control" id="primerNombreConyuge" name="primerNombreConyuge">
                                                      </div>
                                                  </div>
                                                  <div class="col-xs-12 col-sm-12 col-md-4">
                                                      <div class="form-group">
                                                          <p align="center" class="control-label" for="segundoNombreConyuge">Segundo nombre</p>
                                                          <input type="text" class="form-control" id="segundoNombreConyuge" name="segundoNombreConyuge">
                                                      </div>
                                                  </div>
                                                  <div class="col-xs-12 col-sm-12 col-md-4">
                                                      <div class="form-group">
                                                          <p align="center" class="control-label" for="apellidosConyuge">Apellidos</p>
                                                          <input type="text" class="form-control" id="apellidosConyuge" name="apellidosConyuge">
                                                      </div>
                                                  </div>
                                              </div>
                                              <br>
                                              <div class="row">
                                                  <div class="col-xs-12 col-sm-12 col-md-4">
                                                      <div class="form-group">
                                                          <p align="center" class="control-label" for="rutConyuge">RUT</p>
                                                          <input type="text" class="form-control" id="rutConyuge" name="rutConyuge" maxlength="12" placeholder="Sin puntos ni guión">
                                                      </div>
                                                  </div>
                                                  <div class="col-xs-12 col-sm-12 col-md-4">
                                                      <div class="form-group">
                                                          <p align="center" class="control-label" for="fechaNacimientoConyuge">Fecha de nacimiento</p>
                                                          <div class="input-group date"  >
                                                              <span class="input-group-addon">
                                                                  <span class="fa fa-calendar"></span>
                                                              </span>
                                                              <input type="date" class="form-control" id="fechaNacimientoConyuge" name="fechaNacimientoConyuge">
                                                          </div>
                                                      </div>
                                                  </div>
                                                  <div class="col-xs-12 col-sm-12 col-md-4">
                                                      <div class="form-group">
                                                          <p align="center" class="control-label" for="nacionalidadConyuge">Nacionalidad </p>
                                                          <input type="text" class="form-control" id="nacionalidadConyuge" name="nacionalidadConyuge">
                                                      </div>
                                                  </div>
                                              </div>
                                              <br>
                                              <div class="row">
                                                <div class="col-xs-12 col-sm-12 col-md-4">
                                                  <div class="form-group">
                                                    <p align="center" class="control-label" for="nivelEducacionalconyuge">Nivel educacional</p>
                                                      <select class="form-control" id="nivelEducacionalconyuge" name="nivelEducacionalconyuge">
                                                        <option hidden selected>Seleccione nivel educacional</option>
                                                        <option value="Básica completa">Básica completa</option>
                                                        <option value="Media completa">Media completa</option>
                                                        <option value="Técnica completa">Técnica completa</option>
                                                        <option value="Universitaria completa">Universitaria completa</option>
                                                        <option value="Post-grado completo">Post-grado completo</option>
                                                        <option value="Incompleto">Incompleto</option>
                                                      </select>
                                                  </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                      <div class="form-group">
                                                        <p align="center" class="control-label" for="ocupacionConyuge">Ocupación </p>
                                                        <input type="text" class="form-control" id="ocupacionConyuge" name="ocupacionConyuge">
                                                      </div>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <p align="center" class="control-label" for="ingresoConyuge">Ingreso mensual</p>
                                                        <input type="number" min="0" class="form-control" id="ingresoConyuge" name="ingresoConyuge">
                                                    </div>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="row">
                                                  <div class="col-xs-12 col-sm-12 col-md-6">
                                                    
                                                  </div>
                                                  <div class="col-xs-12 col-sm-12 col-md-6">
                                                    
                                                      <button onclick="guardarDatosEstadoCivil()" style="float: right;margin-bottom: 30px;" id="save-form" class="btn btn-success"><i class="fa fa-check"></i> Listo
                                                      </button>
                                                  </div>
                                                </div>
                                            </div>

                                            <?php if($eess->estado_dependencia == 1): ?>
                                           <div class="row" style="padding: 0 13px 30px;" id="divEstadoCivilLista" >
                                            <div class="col-md-6">
                                                <div class="row-data flex center">
                                                      <p class="datos-contacto"><b>Estado Civil:</b>  <?php echo e($eess->estado_civil); ?></p>
                                                </div>
                                                <div class="row-data flex center">
                                                      <p class="datos-contacto"><b>Régimen matrimonial:</b>  <?php echo e($eess->regimen_matrimonial); ?></p>
                                                </div>
                                                <div class="row-data flex center">
                                                      <p class="datos-contacto"><b>Personas dependientes:</b>  <?php echo e($eess->personas_cargo); ?></p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="row-data flex center">
                                                      <p class="datos-contacto"><b>Nombre conyuge:</b>  <?php echo e($conyuge->pnombre); ?> <?php echo e($conyuge->snombre); ?> <?php echo e($conyuge->apellidos); ?></p>
                                                </div>
                                                <div class="row-data flex center">
                                                      <p class="datos-contacto"><b>Rut conyuge:</b>  <?php echo e($conyuge->rut); ?></p>
                                                </div>
                                                <div class="row-data flex center">
                                                      <p class="datos-contacto"><b>Fecha nacimiento conyuge:</b>  <?php echo e($conyuge->fnacimiento); ?></p>
                                                </div>
                                                <div class="row-data flex center">
                                                      <p class="datos-contacto"><b>Nacionalidad conyuge:</b>  <?php echo e($conyuge->nacionalidad); ?></p>
                                                </div>
                                                <div class="row-data flex center">
                                                      <p class="datos-contacto"><b>Nivel educacional conyuge:</b>  <?php echo e($conyuge->nvl_educacional); ?></p>
                                                </div>
                                                <div class="row-data flex center">
                                                      <p class="datos-contacto"><b>Ocupacion conyuge:</b>  <?php echo e($conyuge->ocupacion); ?></p>
                                                </div>
                                                <div class="row-data flex center">
                                                      <p class="datos-contacto"><b>Ingresos conyuge:</b>  <?php echo e($conyuge->ingresos); ?></p>
                                                </div>
                                            </div>
                                            </div>
                                            <?php endif; ?>
                                            <?php else: ?> <!-- SE HACE DIFERENCIA SI TIENE PAREJA O NO, AQUI ES CUANDO NO TIENE PAREJA -->

                                              <?php if( $eess->personas_cargo == ''): ?>
                                              <span class="pull-right text-green" style="margin-left: 5px"> <img src="<?php echo e(asset('img/remove.png')); ?>" alt="faltan datos" width="20px"> </span><?php else: ?>
                                              <span class="pull-right text-green" style="margin-left: 5px"> <img src="<?php echo e(asset('img/correct.png')); ?>" alt="Correcto" width="20px"> </span><?php endif; ?>

                                              <?php if($eess->estado_dependencia == 1): ?>
                                                <a class="editar-datos" onclick="desplegar_form_estado_civil()" id="editarEstadoCivil" style="float: right;">Editar </a>
                                                <a class="editar-datos" onclick="desplegar_info_estado_civil()" id="verEstadoCivil" style="float: right;" hidden>Cerrar </a>

                                              <?php endif; ?>
                                              <hr>
                                             </div>

                                              <?php if($eess->estado_dependencia != 1): ?>
                                              <div id="divCamposEstadoCivil">
                                              <?php else: ?>
                                              <div id="divCamposEstadoCivil" hidden>
                                              <?php endif; ?>
                                               

                                             <div class="row">
                                               <div class="col-xs-12 col-sm-12 col-md-6" id="divEstadoCivil">
                                                 <div class="form-group">
                                                   <p align="center" class="control-label" for="estadoCivil">¿Cuál es tu estado civil?</p>
                                                   <br style="display:none;" id="brEstadoCivil">
                                                     <select class="form-control" id="estadoCivil" name="estadoCivil">
                                                       <option hidden selected>Selecciona estado civil</option>
                                                       <option value="Soltero">Soltero</option>
                                                       <option value="Casado">Casado</option>
                                                       <option value="Viudo">Viudo</option>
                                                       <option value="Separado">Separado</option>
                                                       <option value="Divorciado">Divorciado</option>
                                                       <option value="Conviviente">Conviviente</option>
                                                     </select>
                                                 </div>
                                               </div>
                                               <div class="col-xs-12 col-sm-12 col-md-4" style="display:none;" id="divRegimenMatrimonial">
                                                 <div class="form-group">
                                                   <p align="center" class="control-label" for="regimenMatrimonial">Régimen matrimonial</p>
                                                     <br>
                                                     <select class="form-control" id="regimenMatrimonial" name="regimenMatrimonial">
                                                       <option hidden selected>Régimen matrimonial</option>
                                                       <option value="Separación de bienes">Separación de bienes</option>
                                                       <option value="Participación en las ganancias">Participación en las ganancias</option>
                                                       <option value="Sociedad conyugal">Sociedad conyugal</option>
                                                     </select>
                                                 </div>
                                               </div>
                                               <div class="col-xs-12 col-sm-12 col-md-6" id="divDependientesUsuario">
                                                 <div class="form-group">
                                                   <p align="center" class="control-label" for="dependientesUsuario">¿Cuántas personas dependen económicamente de ti?</p>
                                                   <input type="number" class="form-control" min="0" id="dependientesUsuario" name="dependientesUsuario">
                                                 </div>
                                               </div>
                                             </div>
                                             <div id="divDatosConyuge" style="display:none;">
                                               <br>
                                               <br>
                                               <h2 align="center">Antecedentes Cónyuge</h2>
                                               <h6 align="center">En ocasiones es bueno complementar rentas :)</h6>
                                               <br>
                                               <br>
                                               <div class="row">
                                                   <div class="col-xs-12 col-sm-12 col-md-4">
                                                       <div class="form-group">
                                                           <p align="center" class="control-label" for="primerNombreConyuge">Primer nombre</p>
                                                           <input type="text" class="form-control" id="primerNombreConyuge" name="primerNombreConyuge">
                                                       </div>
                                                   </div>
                                                   <div class="col-xs-12 col-sm-12 col-md-4">
                                                       <div class="form-group">
                                                           <p align="center" class="control-label" for="segundoNombreConyuge">Segundo nombre</p>
                                                           <input type="text" class="form-control" id="segundoNombreConyuge" name="segundoNombreConyuge">
                                                       </div>
                                                   </div>
                                                   <div class="col-xs-12 col-sm-12 col-md-4">
                                                       <div class="form-group">
                                                           <p align="center" class="control-label" for="apellidosConyuge">Apellidos</p>
                                                           <input type="text" class="form-control" id="apellidosConyuge" name="apellidosConyuge">
                                                       </div>
                                                   </div>
                                               </div>
                                               <br>
                                               <div class="row">
                                                   <div class="col-xs-12 col-sm-12 col-md-4">
                                                       <div class="form-group">
                                                           <p align="center" class="control-label" for="rutConyuge">RUT</p>
                                                           <input type="text" class="form-control" id="rutConyuge" name="rutConyuge" maxlength="12" placeholder="Sin puntos ni guión">
                                                       </div>
                                                   </div>
                                                   <div class="col-xs-12 col-sm-12 col-md-4">
                                                       <div class="form-group">
                                                           <p align="center" class="control-label" for="fechaNacimientoConyuge">Fecha de nacimiento</p>
                                                           <div class="input-group date"  >
                                                               <span class="input-group-addon">
                                                                   <span class="fa fa-calendar"></span>
                                                               </span>
                                                               <input type="date" class="form-control" id="fechaNacimientoConyuge" name="fechaNacimientoConyuge">
                                                           </div>
                                                       </div>
                                                   </div>
                                                   <div class="col-xs-12 col-sm-12 col-md-4">
                                                       <div class="form-group">
                                                           <p align="center" class="control-label" for="nacionalidadConyuge">Nacionalidad </p>
                                                           <input type="text" class="form-control" id="nacionalidadConyuge" name="nacionalidadConyuge">
                                                       </div>
                                                   </div>
                                               </div>
                                               <br>
                                               <div class="row">
                                                 <div class="col-xs-12 col-sm-12 col-md-4">
                                                   <div class="form-group">
                                                     <p align="center" class="control-label" for="nivelEducacionalconyuge">Nivel educacional</p>
                                                       <select class="form-control" id="nivelEducacionalconyuge" name="nivelEducacionalconyuge">
                                                         <option hidden selected>Seleccione nivel educacional</option>
                                                         <option value="Básica completa">Básica completa</option>
                                                         <option value="Media completa">Media completa</option>
                                                         <option value="Técnica completa">Técnica completa</option>
                                                         <option value="Universitaria completa">Universitaria completa</option>
                                                         <option value="Post-grado completo">Post-grado completo</option>
                                                         <option value="Incompleto">Incompleto</option>
                                                       </select>
                                                   </div>
                                                 </div>
                                                 <div class="col-xs-12 col-sm-12 col-md-4">
                                                     <div class="form-group">
                                                       <div class="form-group">
                                                         <p align="center" class="control-label" for="ocupacionConyuge">Ocupación </p>
                                                         <input type="text" class="form-control" id="ocupacionConyuge" name="ocupacionConyuge">
                                                       </div>
                                                     </div>
                                                 </div>
                                                 <div class="col-xs-12 col-sm-12 col-md-4">
                                                     <div class="form-group">
                                                         <p align="center" class="control-label" for="ingresoConyuge">Ingreso mensual</p>
                                                         <input type="number" min="0" class="form-control" id="ingresoConyuge" name="ingresoConyuge">
                                                     </div>
                                                 </div>
                                               </div>
                                             </div>

                                            <div class="row">
                                              <div class="col-xs-12 col-sm-12 col-md-6">
                                                
                                              </div>
                                              <div class="col-xs-12 col-sm-12 col-md-6">
                                                
                                                  <button onclick="guardarDatosEstadoCivil()" style="float: right;" id="save-form" class="btn btn-success"><i class="fa fa-check"></i> Listo
                                                  </button>
                                              </div>
                                            </div>
                                            </div>
                                            <?php if($eess->estado_dependencia == 1): ?>
                                             <div class="row" style="padding: 0 13px 30px;" id="divEstadoCivilLista" >
                                              <div class="col-md-6">
                                                  <div class="row-data flex center">
                                                        <p class="datos-contacto"><b>Estado Civil:</b>  <?php echo e($eess->estado_civil); ?></p>
                                                  </div>
                                                  <div class="row-data flex center">
                                                        <p class="datos-contacto"><b>Personas dependientes:</b>  <?php echo e($eess->personas_cargo); ?></p>
                                                  </div>
                                              </div>
                                            </div>
                                            <?php endif; ?>

                                            <?php endif; ?>
                                          
                                        </div>
                                        <br>
                                        <br>
                                        <?php endif; ?>

                                        <?php if($eess->paso === 5 || $eess->paso === 12): ?>
                                        <div style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); padding: 30px;">
                                        
                                          <div class="cabezera" >
                                            <img src="<?php echo e(asset('img/efectivo.png')); ?>" alt="Ingresos personales" style="padding: 0 0 12px;"><b style="font-size: 25px; font-weight: 100;" class="titulo-menu">Ingresos personales</b>
                                            <?php if($eess->sueldo == '' || $eess->otros_ingresos == '' || $eess->concepto_ingreso == ''|| $eess->total_ingreso == ''): ?><span class="pull-right text-green" style="margin-left: 5px"> <img src="<?php echo e(asset('img/remove.png')); ?>" alt="faltan datos" width="20px"> </span><?php else: ?>
                                            <span class="pull-right text-green" style="margin-left: 5px"> <img src="<?php echo e(asset('img/correct.png')); ?>" alt="Correcto" width="20px"> </span><?php endif; ?>

                                            <?php if($eess->estado_ingresos == 1): ?>
                                                <a class="editar-datos" onclick="desplegar_form_ingresos()" id="editarIngresos" style="float: right;">Editar </a>
                                                <a class="editar-datos" onclick="desplegar_info_ingresos()" id="verIngresos" style="float: right;" hidden>Cerrar </a>

                                            <?php endif; ?>

                                            <hr>
                                          </div> 
                                          <?php if($eess->estado_ingresos != 1): ?>
                                          <div id="divIngresos">
                                          <?php else: ?>
                                          <div id="divIngresos" hidden="">
                                          <?php endif; ?>
                                            <div class="row">
                                              <div class="col-xs-12 col-sm-12 col-md-6">
                                                <div class="form-group">
                                                  <p align="center" class="control-label" for="ingresosUsuario">Sueldo mensual</p>
                                                  <input type="number" class="form-control" min="0" id="ingresosUsuario" name="ingresosUsuario">
                                                </div>
                                              </div>
                                              <div class="col-xs-12 col-sm-12 col-md-6">
                                                <div class="form-group">
                                                  <p align="center" class="control-label" for="ingresosAdicionales">¿Percibes otros ingresos recurrentes mensuales?</p>
                                                    <select class="form-control" id="ingresosAdicionales" name="ingresosAdicionales">
                                                      <option hidden selected>Seleccione Opción</option>
                                                      <option value="Si">Si</option>
                                                      <option value="No">No</option>
                                                    </select>
                                                </div>
                                              </div>
                                            </div>
                                            <?php if($eess->otros_ingresos != 1): ?>
                                            <div class="row" style="display:none;" id="divIngresosAdicionales">
                                            <?php else: ?>
                                            <div class="row" style="" id="divIngresosAdicionales">
                                            <?php endif; ?>
                                              <div class="col-xs-12 col-sm-12 col-md-6">
                                                <div class="form-group">
                                                  <p align="center" class="control-label" for="conceptoIngresoAdicional">Indicar concepto del ingreso</p>
                                                  <input type="text" class="form-control" id="conceptoIngresoAdicional" name="conceptoIngresoAdicional">
                                                </div>
                                              </div>
                                              <div class="col-xs-12 col-sm-12 col-md-6">
                                                <div class="form-group">
                                                  <p align="center" class="control-label" for="montoIngresoAdicional">Total del ingreso extra mensual</p>
                                                  <input type="number" class="form-control" min="0" id="montoIngresoAdicional" name="montoIngresoAdicional">
                                                </div>
                                              </div>
                                            </div>

                                          <div class="row">
                                              <div class="col-xs-12 col-sm-12 col-md-6">
                                                
                                              </div>
                                              <div class="col-xs-12 col-sm-12 col-md-6">
                                                
                                                  <button onclick="guardarDatosIngresos()" style="float: right;" id="save-form" class="btn btn-success"><i class="fa fa-check"></i> Listo
                                                  </button>
                                              </div>
                                            </div>
                                          </div>

                                            <?php if($eess->estado_ingresos == 1): ?>
                                             <div class="row" style="padding: 0 13px 30px;" id="divIngresosLista" >
                                              <div class="col-md-6">
                                                  <div class="row-data flex center">
                                                        <p class="datos-contacto"><b>Sueldo Mensual :$</b>  <?php if($eess->sueldo == ""): ?> 0 <?php else: ?> <?php echo e($eess->sueldo); ?> <?php endif; ?></p>
                                                  </div>
                                                  <div class="row-data flex center">
                                                        <p class="datos-contacto"><b>¿Otros ingresos? :</b>  <?php if($eess->otros_ingresos != 0): ?> Si <?php else: ?> No <?php endif; ?> </p>
                                                  </div>
                                              </div>
                                              <?php if($eess->otros_ingresos != 0): ?> 
                                              <div class="col-md-6">
                                                  <div class="row-data flex center">
                                                        <p class="datos-contacto"><b>Concepto del ingreso extra :</b>  <?php echo e($eess->concepto_ingreso); ?> </p>
                                                  </div>
                                                  <div class="row-data flex center">
                                                        <p class="datos-contacto"><b>Monto total ingreso extra :$</b>  <?php if($eess->total_ingreso == ""): ?> 0 <?php else: ?> <?php echo e($eess->total_ingreso); ?> <?php endif; ?>  </p>
                                                  </div>
                                              </div>
                                              <?php endif; ?>
                                            </div>
                                            <?php endif; ?>

                                        </div>
                                        <br>
                                        <br>
                                        <?php endif; ?>

                                        <?php if($eess->paso === 6 || $eess->paso === 12): ?>
                                        <div style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); padding: 30px;">
                                        
                                          <div class="cabezera" >
                                            <img src="<?php echo e(asset('img/coche.png')); ?>" alt="Vehículos" style="padding: 0 0 12px;"><b style="font-size: 25px; font-weight: 100;" class="titulo-menu">Vehículos</b>
                                            <?php if($eess->vehiculos === null): ?><span class="pull-right text-green" style="margin-left: 5px"> <img src="<?php echo e(asset('img/remove.png')); ?>" alt="faltan datos" width="20px"> </span><?php else: ?>
                                            <span class="pull-right text-green" style="margin-left: 5px"> <img src="<?php echo e(asset('img/correct.png')); ?>" alt="Correcto" width="20px"> </span><?php endif; ?>
                                            <?php if($eess->vehiculos !== null): ?>
                                              <a class="editar-datos" onclick="desplegar_form_vehiculos()" id="editarVehiculos" style="float: right;">Editar </a>
                                              <a class="editar-datos" onclick="desplegar_info_vehiculos()" id="verVehiculos" style="float: right;" hidden>Cerrar </a>
                                            <?php endif; ?>

                                            <hr>
                                          </div>

                                          <?php if($eess->vehiculos === null): ?>

                                          <div class="row" style="text-align: center;">
                                            <div  class="col-xs-12 col-sm-12 col-md-4">
                                            </div>
                                            <div  class="col-xs-12 col-sm-12 col-md-4">
                                              <div class="form-group">
                                                <p align="center" class="control-label" for="cantVehiculos">¿Vehículos a tu nombre?</p>
                                                <input type="number" class="form-control" min="0" id="cantVehiculos" name="cantVehiculos">
                                                <p align="center" class="control-label">*Si no posees vehículos a tu nombre, deja el contador en 0.</p>
                                              </div>
                                            </div>
                                            <div  class="col-xs-12 col-sm-12 col-md-4">
                                            </div>
                                          </div>
                                          <div id="divDatosVehiculos">
                                          </div>
                                          <div class="row" id=""  id="divBotonListoVehiculo">
                                            <div class="col-xs-12 col-sm-12 col-md-6">
                                              
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-6">
                                              
                                                <button onclick="guardarDatosVehiculos()" style="float: right;" id="save-form" class="btn btn-success"><i class="fa fa-check"></i> Listo
                                                </button>
                                            </div>
                                          </div>

                                          <?php else: ?>

                                            <input type="text" class="form-control" id="cantidadV" name="cantidadV" value=" <?php echo e(count($vehiculos)); ?>" style="display: none">

                                            <?php if( count($vehiculos) > 0 ): ?>
                                              <div  style="padding: 0 13px 30px;" id="divVehiculosLista" >
                                                <?php
                                                 $i= 1; 
                                                ?>
                                                <?php $__currentLoopData = $vehiculos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vehiculo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                
                                                  <div class="row">  
                                                    <div class="col-md-4">
                                                        <div class="row-data flex center">
                                                              <p class="datos-contacto"><b>Marca Vehículo <?php echo e($i); ?> :</b><?php echo e($vehiculo->marca); ?></p>
                                                        </div>
                                                        <div class="row-data flex center">
                                                              <p class="datos-contacto"><b>Modelo Vehículo <?php echo e($i); ?> :</b> <?php echo e($vehiculo->modelo); ?> </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                      <div class="row-data flex center">
                                                            <p class="datos-contacto"><b>Año Vehículo <?php echo e($i); ?> :</b> <?php echo e($vehiculo->año); ?> </p>
                                                      </div>
                                                      <div class="row-data flex center">
                                                            <p class="datos-contacto"><b>Patente Vehículo <?php echo e($i); ?> :</b> <?php echo e($vehiculo->patente); ?></p>
                                                      </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                      <div class="row-data flex center">
                                                            <p class="datos-contacto"><b>Valor Vehículo <?php echo e($i); ?> :$</b> <?php echo e($vehiculo->valor); ?> </p>
                                                      </div>
                                                    </div>
                                                  </div>

                                                  <br>
                                                <?php
                                                 $i= $i+1; 
                                                ?>

                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                              </div>

                                              <div id="divEditarVehiculosLista" hidden="" >
                                                <?php
                                                 $i= 1; 
                                                ?>
                                                <?php $__currentLoopData = $vehiculos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vehiculo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                <div class="row">
                                                  <h2 align="center">Vehículo <?php echo e($i); ?>  </h2>
                                                  <input type="text" class="form-control" id="idVehiculo<?php echo e($i); ?>" name="idVehiculo<?php echo e($i); ?>" value="<?php echo e($vehiculo->id); ?>" style="display: none;">
                                                  <div class="col-xs-12 col-sm-12 col-md-4">
                                                      <div class="form-group">
                                                          <p align="center" class="control-label" for="marcaVehiculo<?php echo e($i); ?> ">Marca vehículo </p>
                                                          <input type="text" class="form-control" id="marcaVehiculo<?php echo e($i); ?>" name="marcaVehiculo<?php echo e($i); ?>" value="<?php echo e($vehiculo->marca); ?>">
                                                      </div>
                                                  </div>
                                                  <div class="col-xs-12 col-sm-12 col-md-4">
                                                      <div class="form-group">
                                                          <p align="center" class="control-label" for="modeloVehiculo<?php echo e($i); ?>">Modelo vehículo</p>
                                                          <input type="text" class="form-control" id="modeloVehiculo<?php echo e($i); ?>" name="modeloVehiculo<?php echo e($i); ?>" value="<?php echo e($vehiculo->modelo); ?>">
                                                      </div>
                                                  </div>
                                                  <div class="col-xs-12 col-sm-12 col-md-4">
                                                      <div class="form-group">
                                                          <p align="center" class="control-label" for="añoVehiculo<?php echo e($i); ?>">Año vehículo</p>
                                                          <input type="number" min="1900" class="form-control" id="añoVehiculo<?php echo e($i); ?>" name="añoVehiculo<?php echo e($i); ?>" maxlength="4" value="<?php echo e($vehiculo->año); ?>">
                                                      </div>
                                                  </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                  <div class="col-xs-12 col-sm-12 col-md-2">
                                                  </div>
                                                  <div class="col-xs-12 col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <p align="center" class="control-label" for="patenteVehiculo<?php echo e($i); ?>">Patente vehículo</p>
                                                        <input type="text" class="form-control" id="patenteVehiculo<?php echo e($i); ?>" name="patenteVehiculo'+i+'" maxlength="8" value="<?php echo e($vehiculo->patente); ?>">
                                                      </div>
                                                  </div>
                                                  <div class="col-xs-12 col-sm-12 col-md-4">
                                                      <div class="form-group">
                                                          <p align="center" class="control-label" for="valorVehiculo<?php echo e($i); ?>">Valor comercial vehículo</p>
                                                          <input type="number" min="0" class="form-control" id="valorVehiculo<?php echo e($i); ?>" name="valorVehiculo<?php echo e($i); ?>" value="<?php echo e($vehiculo->valor); ?>">
                                                      </div>
                                                  </div>
                                                  <div class="col-xs-12 col-sm-12 col-md-2">
                                                  </div>
                                                </div>
                                                <?php
                                                 $i= $i+1; 
                                                ?>

                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <div class="row" id="divBotonListoVehiculo" hidden="">
                                                  <div class="col-xs-12 col-sm-12 col-md-6">
                                                    
                                                  </div>
                                                  <div class="col-xs-12 col-sm-12 col-md-6">
                                                    
                                                      <button onclick="guardarDatosVehiculos()" style="float: right;" id="save-form" class="btn btn-success"><i class="fa fa-check"></i> Listo
                                                      </button>
                                                  </div>
                                                </div>
                                              </div>
                                            <?php else: ?>
                                              <div class="row" style="padding: 0 13px 30px;" id="divVehiculosLista" >
                                                <div class="col-md-6">
                                                    <div class="row-data flex center">
                                                          <p class="datos-contacto"><b>Vehículos a tu nombre: </b> 0</p>
                                                    </div>
                                                </div>
                                              </div>

                                                <div class="row" style="text-align: center;" id="divEditarVehiculosLista" hidden>
                                                  <div  class="col-xs-12 col-sm-12 col-md-4">
                                                  </div>
                                                  <div  class="col-xs-12 col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                      <p align="center" class="control-label" for="cantVehiculos">¿Vehículos a tu nombre?</p>
                                                      <input type="number" class="form-control" min="0" id="cantVehiculos" name="cantVehiculos">
                                                      <p align="center" class="control-label">*Si no posees vehículos a tu nombre, deja el contador en 0.</p>
                                                    </div>
                                                  </div>
                                                  <div  class="col-xs-12 col-sm-12 col-md-4">
                                                  </div>
                                                </div>
                                                <div id="divDatosVehiculos" >
                                                </div>
                                                <div class="row" id="divBotonListoVehiculo" hidden="">
                                                  <div class="col-xs-12 col-sm-12 col-md-6">
                                                    
                                                  </div>
                                                  <div class="col-xs-12 col-sm-12 col-md-6">
                                                    
                                                      <button onclick="guardarDatosVehiculos()" style="float: right;" id="save-form" class="btn btn-success"><i class="fa fa-check"></i> Listo
                                                      </button>
                                                  </div>
                                                </div>
                                            <?php endif; ?>

                                          <?php endif; ?>

                                        </div>
                                        <br>
                                        <br>
                                        <?php endif; ?>

                                        <?php if($eess->paso === 7 || $eess->paso === 12): ?>
                                        <div style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); padding: 30px;">
                                          <div class="cabezera" >
                                            <img src="<?php echo e(asset('img/carrera.png')); ?>" alt="Propiedades" style="padding: 0 0 12px;"><b style="font-size: 25px; font-weight: 100;" class="titulo-menu">Propiedades</b>
                                            <?php if($eess->propiedades === null ): ?><span class="pull-right text-green" style="margin-left: 5px"> <img src="<?php echo e(asset('img/remove.png')); ?>" alt="faltan datos" width="20px"> </span><?php else: ?>
                                            <span class="pull-right text-green" style="margin-left: 5px"> <img src="<?php echo e(asset('img/correct.png')); ?>" alt="Correcto" width="20px"> </span><?php endif; ?>
                                            <?php if($eess->propiedades !== null ): ?>
                                            <a class="editar-datos" onclick="desplegar_form_propiedades()" id="editarPropiedades" style="float: right;">Editar </a>
                                            <a class="editar-datos" onclick="desplegar_info_propiedades()" id="verPropiedades" style="float: right;" hidden>Cerrar </a>
                                            <?php endif; ?>

                                            <hr>
                                          </div>

                                          <?php if($eess->propiedades === null): ?>
                                          <div class="row" style="text-align: center;" id="">
                                            <div  class="col-xs-12 col-sm-12 col-md-4">
                                            </div>
                                            <div  class="col-xs-12 col-sm-12 col-md-4">
                                              <div class="form-group">
                                                <p align="center" class="control-label" for="cantPropiedades">¿Propiedades a tu nombre?</p>
                                                <input type="number" class="form-control" min="0" id="cantPropiedades" name="cantPropiedades">
                                                <p align="center" class="control-label">*Si no posees propiedades a tu nombre, deja el contador en 0.</p>
                                              </div>
                                            </div>
                                            <div  class="col-xs-12 col-sm-12 col-md-4">
                                            </div>
                                          </div>
                                          <div id="divDatosPropiedades">
                                          </div>
                                          <div class="row"  id="divBotonListoPropiedades" hidden>
                                            <div class="col-xs-12 col-sm-12 col-md-6">
                                              
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-6">
                                              
                                                <button onclick="guardarDatosPropiedades()" style="float: right;" id="save-form" class="btn btn-success"><i class="fa fa-check"></i> Listo
                                                </button>
                                            </div>
                                          </div>
                                          <?php else: ?>

                                            <?php if($eess->propiedades === 0): ?>

                                              <div class="row" style="padding: 0 13px 30px;" id="divPropiedadesLista" >
                                                <div class="col-md-6">
                                                    <div class="row-data flex center">
                                                          <p class="datos-contacto"><b>No posees propiedades a tu nombre </b> </p>
                                                    </div>
                                                </div>
                                              </div>
                                              <div class="row" style="text-align: center;" id="divEditarPropiedadesListo" hidden="">
                                                <div  class="col-xs-12 col-sm-12 col-md-4">
                                                </div>
                                                <div  class="col-xs-12 col-sm-12 col-md-4">
                                                  <div class="form-group">
                                                    <p align="center" class="control-label" for="cantPropiedades">¿Propiedades a tu nombre?</p>
                                                    <input type="number" class="form-control" min="0" id="cantPropiedades" name="cantPropiedades">
                                                    <p align="center" class="control-label">*Si no posees propiedades a tu nombre, deja el contador en 0.</p>
                                                  </div>
                                                </div>
                                                <div  class="col-xs-12 col-sm-12 col-md-4">
                                                </div>
                                              </div>
                                              <div id="divDatosPropiedades">
                                              </div>
                                              <div class="row"  hidden="" id="divBotonListoPropiedades">
                                                <div class="col-xs-12 col-sm-12 col-md-6">
                                                  
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-6">
                                                  
                                                    <button onclick="guardarDatosPropiedades()" style="float: right;" id="save-form" class="btn btn-success"><i class="fa fa-check"></i> Listo
                                                    </button>
                                                </div>
                                              </div>

                                            <?php else: ?>


                                            <input type="text" class="form-control" id="cantidadPro" name="cantidadPro" value=" <?php echo e(count($propiedades)); ?>" style="display: none;">
                                            <div  style="padding: 0 13px 30px;" id="divPropiedadesLista" >
                                              <?php
                                               $i= 1; 
                                              ?>
                                              <?php $__currentLoopData = $propiedades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $propiedad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                              
                                                <div class="row">  
                                                  <div class="col-md-4">
                                                      <div class="row-data flex center">
                                                            <p class="datos-contacto"><b>Tipo propiedad <?php echo e($i); ?> :</b><?php echo e($propiedad->tipo); ?></p>
                                                      </div>
                                                      <div class="row-data flex center">
                                                            <p class="datos-contacto"><b>Dirección propiedad <?php echo e($i); ?> :</b><?php echo e($propiedad->direccion); ?></p>
                                                      </div>
                                                      <div class="row-data flex center">
                                                            <p class="datos-contacto"><b>Credito hipotecario <?php echo e($i); ?> :</b><?php if($propiedad->credito === 1): ?> Si <?php else: ?> No <?php endif; ?></p>
                                                      </div>
                                                  </div>
                                                  <div class="col-md-4">
                                                    <div class="row-data flex center">
                                                          <p class="datos-contacto"><b>Comuna propiedad <?php echo e($i); ?> :</b> <?php echo e($propiedad->comuna); ?> </p>
                                                    </div>
                                                    <div class="row-data flex center">
                                                          <p class="datos-contacto"><b>Ciudad propiedad<?php echo e($i); ?> :</b> <?php echo e($propiedad->ciudad); ?> </p>
                                                    </div>
                                                  </div>
                                                  <div class="col-md-4">
                                                    <div class="row-data flex center">
                                                          <p class="datos-contacto"><b>Rol propiedad <?php echo e($i); ?> :</b> <?php echo e($propiedad->rol); ?> </p>
                                                    </div>
                                                    <div class="row-data flex center">
                                                          <p class="datos-contacto"><b>Valor comercial propiedad <?php echo e($i); ?> :</b> $<?php echo e($propiedad->valor_comercial); ?> </p>
                                                    </div>
                                                  </div>
                                                </div>
                                                <?php if($propiedad->credito === 1): ?>
                                                <div class="row">  
                                                  <div class="col-md-3">
                                                      <div class="row-data flex center">
                                                            <p class="datos-contacto"><b>Banco a favor del credito  :</b><?php echo e($propiedad->banco); ?></p>
                                                      </div>
                                                  </div>
                                                  <div class="col-md-3">
                                                    <div class="row-data flex center">
                                                          <p class="datos-contacto"><b>Monto del credito :</b> $ <?php echo e($propiedad->monto); ?> </p>
                                                    </div>
                                                  </div>
                                                  <div class="col-md-3">
                                                    <div class="row-data flex center">
                                                          <p class="datos-contacto"><b>Valor de la cuota :</b> <?php echo e($propiedad->valor_cuota); ?> </p>
                                                    </div>
                                                  </div>
                                                  <div class="col-md-3">
                                                    <div class="row-data flex center">
                                                          <p class="datos-contacto"><b>Cuotas restantes :</b>  <?php echo e($propiedad->cuotas_restantes); ?> </p>
                                                    </div>
                                                  </div>
                                                </div>
                                                <?php endif; ?>

                                                <br>
                                              <?php
                                               $i= $i+1; 
                                              ?>

                                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            </div>

                                            <div id="divEditarPropiedadesListo" hidden="true" >
                                                <?php
                                                 $i= 1; 
                                                ?>
                                                <?php $__currentLoopData = $propiedades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $propiedad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                <div class="row">
                                                <input type="number" class="form-control" min="0" id="idPropiedad<?php echo e($i); ?>" name="idPropiedad<?php echo e($i); ?>" value="<?php echo e($propiedad->id); ?>" style="display: none;">

                                                <h2 align="center">Propiedad <?php echo e($i); ?></h2>
                                                <div class="col-xs-12 col-sm-12 col-md-3">
                                                  <div class="form-group">
                                                    <p align="center" class="control-label" for="tipoPropiedad<?php echo e($i); ?>">Tipo propiedad</p>
                                                      <select class="form-control" id="tipoPropiedad<?php echo e($i); ?>" name="tipoPropiedad<?php echo e($i); ?>">
                                                        <option selected value="<?php echo e($propiedad->tipo); ?>"><?php echo e($propiedad->tipo); ?></option>
                                                        <option value="Casa">Casa</option>
                                                        <option value="Departamento">Departamento</option>
                                                        <option value="Oficina">Oficina</option>
                                                        <option value="Sitio">Sitio</option>
                                                      </select>
                                                  </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-3">
                                                  <div class="form-group">
                                                    <p align="center" class="control-label" for="direccionPropiedad<?php echo e($i); ?>">Dirección propiedad</p>
                                                    <input type="text" class="form-control" id="direccionPropiedad<?php echo e($i); ?>" name="direccionPropiedad<?php echo e($i); ?>" value="<?php echo e($propiedad->direccion); ?>">
                                                  </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-3">
                                                  <div class="form-group">
                                                    <p align="center" class="control-label" for="comunaPropiedad<?php echo e($i); ?>">Comuna propiedad</p>
                                                    <input type="text" class="form-control" id="comunaPropiedad<?php echo e($i); ?>" name="comunaPropiedad<?php echo e($i); ?>" value="<?php echo e($propiedad->comuna); ?> ">
                                                  </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-3">
                                                  <div class="form-group">
                                                    <p align="center" class="control-label" for="ciudadPropiedad<?php echo e($i); ?>">Ciudad propiedad</p>
                                                    <input type="text" class="form-control"  id="ciudadPropiedad<?php echo e($i); ?>" name="ciudadPropiedad<?php echo e($i); ?>" value="<?php echo e($propiedad->ciudad); ?>">
                                                  </div>
                                                </div>
                                              </div>
                                              <div class="row">
                                                <div class="col-xs-12 col-sm-12 col-md-4">
                                                 <div class="form-group">
                                                    <p align="center" class="control-label" for="rolPropiedad<?php echo e($i); ?>">ROL propiedad</p>
                                                    <input type="text" class="form-control" id="rolPropiedad<?php echo e($i); ?>" name="rolPropiedad<?php echo e($i); ?>" value="<?php echo e($propiedad->rol); ?>">
                                                  </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-4">
                                                  <div class="form-group">
                                                    <p align="center" class="control-label" for="valorPropiedad<?php echo e($i); ?>">Valor comercial propiedad</p>
                                                    <input type="number" min="0" class="form-control" id="valorPropiedad<?php echo e($i); ?>" name="valorPropiedad<?php echo e($i); ?>" value="<?php echo e($propiedad->valor_comercial); ?>">
                                                  </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-4">
                                                  <div class="form-group">
                                                    <p align="center" class="control-label" for="propiedadCredito<?php echo e($i); ?>">¿Propiedad con crédito hipotecario?</p>
                                                      <select class="form-control" id="propiedadCredito<?php echo e($i); ?>" name="propiedadCredito<?php echo e($i); ?>" onchange="propiedadCredito(<?php echo e($i); ?>)">
                                                        <option hidden selected>Selecciona una opción</option>
                                                        <option value="Si">Si</option>
                                                        <option value="No">No</option>
                                                      </select>
                                                  </div>
                                                </div>
                                              </div>
                                              <?php if($propiedad->credito !== 1): ?>
                                              <div id="divDatosHipotecarios<?php echo e($i); ?>" style="display:none;">
                                              <?php else: ?>
                                              <div id="divDatosHipotecarios<?php echo e($i); ?>">
                                              <?php endif; ?>
                                                <div class="row">
                                                  <div class="col-xs-12 col-sm-12 col-md-3">
                                                   <div class="form-group">
                                                      <p align="center" class="control-label" for="bancoCredito<?php echo e($i); ?>">Banco a favor de la hipoteca propiedad</p>
                                                      
                                                        <select class="form-control" id="bancoCredito<?php echo e($i); ?>" name="bancoCredito<?php echo e($i); ?>">
                                                          <option selected value="<?php echo e($propiedad->banco); ?>"><?php echo e($propiedad->banco); ?></option>
                                                          <option value="Banco BBVA">Banco BBVA</option>
                                                          <option value="Banco BCI">Banco BCI</option>
                                                          <option value="Banco BICE">Banco BICE</option>
                                                          <option value="Banco CORP Banca">Banco CORP Banca</option>
                                                          <option value="Banco Consorcio">Banco Consorcio</option>
                                                          <option value="Banco Coopeuch">Banco Coopeuch</option>
                                                          <option value="Banco Estado">Banco Estado</option>
                                                          <option value="Banco Falabella">Banco Falabella</option>
                                                          <option value="Banco ITAÚ">Banco ITAÚ</option>
                                                          <option value="Banco Internacional">Banco Internacional</option>
                                                          <option value="Banco París">Banco París</option>
                                                          <option value="Banco Ripley">Banco Ripley</option>
                                                          <option value="Banco Santander/Banefe">Banco Santander/Banefe</option>
                                                          <option value="Banco Security">Banco Security</option>
                                                          <option value="Banco de Chile/Edwards/Credichile">Banco de Chile/Edwards/Credichile</option>
                                                          <option value="Banco del Desarrollo">Banco del Desarrollo</option>
                                                          <option value="HSBC Bank">HSBC Bank</option>
                                                          <option value="Prepago Los Héroes">Prepago Los Héroes</option>
                                                          <option value="Mutuaria">Mutuaria</option>
                                                        </select>
                                                    </div>
                                                  </div>
                                                  <div class="col-xs-12 col-sm-12 col-md-3">
                                                      <div class="form-group">
                                                        <div class="form-group">
                                                          <p align="center" class="control-label" for="montoCreditoHipotecario<?php echo e($i); ?>">Monto total del crédito hipotecario</p>
                                                          <br>
                                                          <input type="number" min="0" class="form-control" id="montoCreditoHipotecario<?php echo e($i); ?>" name="montoCreditoHipotecario<?php echo e($i); ?>" value="<?php echo e($propiedad->monto); ?>">
                                                        </div>
                                                     </div>
                                                  </div>
                                                  <div class="col-xs-12 col-sm-12 col-md-3">
                                                      <div class="form-group">
                                                          <p align="center" class="control-label" for="valorCuotaMensulaHipotecario<?php echo e($i); ?>">Valor cuota mensual hipotecario</p>
                                                          <br>
                                                          <input type="number" min="0" class="form-control" id="valorCuotaMensulaHipotecario<?php echo e($i); ?>" name="valorCuotaMensulaHipotecario<?php echo e($i); ?>" value="<?php echo e($propiedad->valor_cuota); ?>">
                                                      </div>
                                                  </div>
                                                  <div class="col-xs-12 col-sm-12 col-md-3">
                                                      <div class="form-group">
                                                          <p align="center" class="control-label" for="cuotasRestantesHipotecario<?php echo e($i); ?>">Cantidad de cuotas restantes hipotecario</p>
                                                          <input type="number" min="0" maxlength="3" class="form-control" id="cuotasRestantesHipotecario<?php echo e($i); ?>" name="cuotasRestantesHipotecario<?php echo e($i); ?>" value="<?php echo e($propiedad->cuotas_restantes); ?>">
                                                      </div>
                                                  </div>
                                                </div>
                                              </div>
                                                <?php
                                                 $i= $i+1; 
                                                ?>

                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                
                                                <div class="row" id="divBotonListoPropiedades" hidden="">
                                                  <div class="col-xs-12 col-sm-12 col-md-6">
                                                    
                                                  </div>
                                                  <div class="col-xs-12 col-sm-12 col-md-6">
                                                    
                                                      <button onclick="guardarDatosPropiedades()" href="#" style="float: right;" id="save" class="btn btn-success"><i class="fa fa-check"></i> Listo
                                                      </button>
                                                  </div>
                                                </div>
                                              </div>


                                            <?php endif; ?>

                                          <?php endif; ?>



                                        </div>
                                        <br>
                                        <br>
                                        <?php endif; ?>

                                        <?php if($eess->paso === 8 || $eess->paso === 12): ?>
                                        <div style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); padding: 30px;">
                                        
                                          <div class="cabezera" >
                                            <img src="<?php echo e(asset('img/presupuesto.png')); ?>" alt="Inversiones" style="padding: 0 0 12px;"><b style="font-size: 25px; font-weight: 100;" class="titulo-menu">Inversiones</b>
                                            <?php if($eess->inversiones === null): ?><span class="pull-right text-green" style="margin-left: 5px"> <img src="<?php echo e(asset('img/remove.png')); ?>" alt="faltan datos" width="20px"> </span><?php else: ?>
                                            <span class="pull-right text-green" style="margin-left: 5px"> <img src="<?php echo e(asset('img/correct.png')); ?>" alt="Correcto" width="20px"> </span><?php endif; ?>
                                            <?php if($eess->inversiones !== null): ?>
                                              <a class="editar-datos" onclick="desplegar_form_inversiones()" id="editarInversiones" style="float: right;">Editar </a>
                                              <a class="editar-datos" onclick="desplegar_info_inversiones()" id="verInversiones" style="float: right;" hidden>Cerrar </a>
                                            <?php endif; ?>

                                            <hr>
                                          </div>

                                          <?php if($eess->inversiones === null): ?>
                                          <div class="row" style="text-align: center;">
                                            <div  class="col-xs-12 col-sm-12 col-md-4">
                                            </div>
                                            <div  class="col-xs-12 col-sm-12 col-md-4">
                                              <div class="form-group">
                                                <p align="center" class="control-label" for="instrumentosInversion">¿Posee instrumentos de inversión?</p>
                                                <input type="number" class="form-control" min="0" id="instrumentosInversion" name="instrumentosInversion">
                                                <p align="center" class="control-label">*Si no posees instrumentos de inversión, deja el contador en 0.</p>
                                              </div>
                                            </div>
                                            <div  class="col-xs-12 col-sm-12 col-md-4">
                                            </div>
                                          </div>
                                          <div id="divDatosInversiones">
                                          </div>
                                          <div class="row" id="divBotonListoInversion" hidden="">
                                            <div class="col-xs-12 col-sm-12 col-md-6">
                                              
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-6">
                                              
                                                <button onclick="guardarDatosInversion()" href="#" style="float: right;" id="save-form" class="btn btn-success"><i class="fa fa-check"></i> Listo
                                                </button>
                                            </div>
                                          </div>
                                          <?php else: ?> 

                                            <?php if($eess->inversiones === 0): ?>

                                              <div class="row" style="padding: 0 13px 30px;" id="divInversionesLista" >
                                                <div class="col-md-6">
                                                    <div class="row-data flex center">
                                                          <p class="datos-contacto"><b>No posees instrumentos de inversión </b></p>
                                                    </div>
                                                </div>
                                              </div>
                                              <div class="row" style="text-align: center;" id="divEditarInversionLista" hidden="true">
                                               <div  class="col-xs-12 col-sm-12 col-md-4">
                                                </div>
                                                <div  class="col-xs-12 col-sm-12 col-md-4">
                                                  <div class="form-group">
                                                    <p align="center" class="control-label" for="instrumentosInversion">¿Posee instrumentos de inversión?</p>
                                                    <input type="number" class="form-control" min="0" id="instrumentosInversion" name="instrumentosInversion">
                                                    <p align="center" class="control-label">*Si no posees instrumentos de inversión, deja el contador en 0.</p>
                                                  </div>
                                                </div>
                                                <div  class="col-xs-12 col-sm-12 col-md-4">
                                                </div>
                                              </div>
                                              <div id="divDatosInversiones">
                                              </div>
                                              <div class="row" id="divBotonListoInversion" hidden="">
                                                <div class="col-xs-12 col-sm-12 col-md-6">
                                                  
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-6">
                                                  
                                                    <button onclick="guardarDatosInversion()" href="#" style="float: right;" id="save" class="btn btn-success"><i class="fa fa-check"></i> Listo
                                                    </button>
                                                </div>
                                              </div>
    
                                            <?php else: ?>

                                            <input type="text" class="form-control" id="cantidadI" name="cantidadI" value=" <?php echo e(count($inversiones)); ?>" style="display: none;">
                                            <div  style="padding: 0 13px 30px;" id="divInversionesLista" >
                                              <?php
                                               $i= 1; 
                                              ?>
                                              <?php $__currentLoopData = $inversiones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inversion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                              
                                                <div class="row">  
                                                  <div class="col-md-6">
                                                      <div class="row-data flex center">
                                                            <p class="datos-contacto"><b>Tipo instrumento inversión <?php echo e($i); ?> :</b><?php echo e($inversion->tipo); ?></p>
                                                      </div>
                                                  </div>
                                                  <div class="col-md-6">
                                                    <div class="row-data flex center">
                                                          <p class="datos-contacto"><b>Valor comercial Instrumento <?php echo e($i); ?> :</b> <?php echo e($inversion->valor); ?> </p>
                                                    </div>
                                                  </div>
                                                </div>

                                                <br>
                                              <?php
                                               $i= $i+1; 
                                              ?>

                                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            </div>
                                            
                                              <div id="divEditarInversionLista" hidden="true" >
                                                <?php
                                                 $i= 1; 
                                                ?>
                                                <?php $__currentLoopData = $inversiones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inversion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                <div class="row">
                                                <input type="number" class="form-control" min="0" id="idInstrumento<?php echo e($i); ?>" name="idInstrumento<?php echo e($i); ?>" value="<?php echo e($inversion->id); ?>" style="display: none;">
                                                <h2 align="center">Instrumento inversión <?php echo e($i); ?></h2>
                                                  <div class="col-xs-12 col-sm-12 col-md-6">
                                                    <div class="form-group">
                                                      <p align="center" class="control-label" for="tipoInstrumento<?php echo e($i); ?>">Tipo de instrumento</p>
                                                        <select class="form-control" id="tipoInstrumento<?php echo e($i); ?>" name="tipoInstrumento<?php echo e($i); ?>">
                                                          <option selected value="<?php echo e($inversion->tipo); ?>"><?php echo e($inversion->tipo); ?></option>
                                                          <option value="Acciones">Acciones</option>
                                                          <option value="Fondo mutuo">Fondo mutuo</option>
                                                          <option value="Depósito a plazo">Depósito a plazo</option>
                                                        </select>
                                                    </div>
                                                  </div>
                                                  <div class="col-xs-12 col-sm-12 col-md-6">
                                                    <div class="form-group">
                                                      <p align="center" class="control-label" for="valorInstrumento<?php echo e($i); ?>">Valor comercial instrumento</p>
                                                      <input type="number" class="form-control" min="0" id="valorInstrumento<?php echo e($i); ?>" name="valorInstrumento<?php echo e($i); ?>" value="<?php echo e($inversion ->valor); ?>">
                                                    </div>
                                                  </div>
                                                </div>
                                                <?php
                                                 $i= $i+1; 
                                                ?>

                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                
                                                <div class="row" id="divBotonListoInversion" hidden="">
                                                  <div class="col-xs-12 col-sm-12 col-md-6">
                                                    
                                                  </div>
                                                  <div class="col-xs-12 col-sm-12 col-md-6">
                                                    
                                                      <button onclick="guardarDatosInversion()" href="#" style="float: right;" id="save" class="btn btn-success"><i class="fa fa-check"></i> Listo
                                                      </button>
                                                  </div>
                                                </div>
                                              </div>

                                            <?php endif; ?>

                                          <?php endif; ?>

                                        </div>
                                        <br>
                                        <br>
                                        <?php endif; ?>

                                        <?php if($eess->paso === 9 || $eess->paso === 12): ?>
                                        <div style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); padding: 30px;">
                                        
                                          <div class="cabezera" >
                                            <img src="<?php echo e(asset('img/organizacion.png')); ?>" alt="Participación en Empresas" style="padding: 0 0 12px;"><b style="font-size: 25px; font-weight: 100;" class="titulo-menu">Participación en Empresas</b>
                                            <?php if($eess->participacion_empresa === null): ?><span class="pull-right text-green" style="margin-left: 5px"> <img src="<?php echo e(asset('img/remove.png')); ?>" alt="faltan datos" width="20px"> </span><?php else: ?>
                                            <span class="pull-right text-green" style="margin-left: 5px"> <img src="<?php echo e(asset('img/correct.png')); ?>" alt="Correcto" width="20px"> </span><?php endif; ?>
                                            <?php if($eess->participacion_empresa !== null): ?>
                                            <a class="editar-datos" onclick="desplegar_form_participaciones()" id="editarParticipaciones" style="float: right;">Editar </a>
                                            <a class="editar-datos" onclick="desplegar_info_participaciones()" id="verParticipaciones" style="float: right;" hidden>Cerrar </a>
                                            <?php endif; ?>

                                            <hr>
                                          </div>
                                          <?php if($eess->participacion_empresa === null): ?>
                                            <div class="row" style="text-align: center;">
                                              <div  class="col-xs-12 col-sm-12 col-md-4">
                                              </div>
                                              <div  class="col-xs-12 col-sm-12 col-md-4">
                                                <div class="form-group">
                                                  <p align="center" class="control-label" for="participacionEmpresa">¿Participa en alguna sociedad?</p>
                                                  <input type="number" class="form-control" min="0" id="participacionEmpresa" name="participacionEmpresa">
                                                  <p align="center" class="control-label">*Si no participas en alguna sociedad, deja el contador en 0.</p>
                                                </div>
                                              </div>
                                              <div  class="col-xs-12 col-sm-12 col-md-4">
                                              </div>
                                            </div>
                                            <div id="divDatosParticipaciones">
                                            </div>
                                            <div class="row" id="divBotonListoParticipacion" hidden="">
                                              <div class="col-xs-12 col-sm-12 col-md-6">
                                                
                                              </div>
                                              <div class="col-xs-12 col-sm-12 col-md-6">
                                                
                                                  <button onclick="guardarDatosParticipacion()" href="#" style="float: right;" id="save" class="btn btn-success"><i class="fa fa-check"></i> Listo
                                                  </button>
                                              </div>
                                            </div>
                                          <?php else: ?>

                                            <?php if($eess->participacion_empresa === 0): ?>

                                              <div class="row" style="padding: 0 13px 30px;" id="divParticipacionesLista" >
                                                <div class="col-md-6">
                                                    <div class="row-data flex center">
                                                          <p class="datos-contacto"><b>No posees participaciones en empresas</b></p>
                                                    </div>
                                                </div>
                                              </div>
                                              <div id="divEditarParticipacionesLista" hidden="true">
                                               <div class="row" style="text-align: center;">
                                                 <div  class="col-xs-12 col-sm-12 col-md-4">
                                                 </div>
                                                 <div  class="col-xs-12 col-sm-12 col-md-4">
                                                   <div class="form-group">
                                                     <p align="center" class="control-label" for="participacionEmpresa">¿Participa en alguna sociedad?</p>
                                                     <input type="number" class="form-control" min="0" id="participacionEmpresa" name="participacionEmpresa">
                                                     <p align="center" class="control-label">*Si no participas en alguna sociedad, deja el contador en 0.</p>
                                                   </div>
                                                 </div>
                                                 <div  class="col-xs-12 col-sm-12 col-md-4">
                                                 </div>
                                               </div>
                                               <div id="divDatosParticipaciones">
                                               </div>
                                               <div class="row" id="">
                                                 <div class="col-xs-12 col-sm-12 col-md-6">
                                                   
                                                 </div>
                                                 <div class="col-xs-12 col-sm-12 col-md-6">
                                                   
                                                     <button onclick="guardarDatosParticipacion()" href="#" style="float: right;" id="save" class="btn btn-success"><i class="fa fa-check"></i> Listo
                                                     </button>
                                                 </div>
                                               </div>
                                            </div>

                                            <?php else: ?>

                                            <input type="text" class="form-control" id="cantidadPa" name="cantidadPa" value=" <?php echo e(count($participacionEmpresas)); ?>" style="display: none;">
                                            <div  style="padding: 0 13px 30px;" id="divParticipacionesLista" >
                                              <?php
                                               $i= 1; 
                                              ?>
                                              <?php $__currentLoopData = $participacionEmpresas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $participacionEmpresa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                              
                                                <div class="row">  
                                                  <div class="col-md-6">
                                                      <div class="row-data flex center">
                                                            <p class="datos-contacto"><b>Razón social empresa <?php echo e($i); ?> :</b><?php echo e($participacionEmpresa->razon_social); ?></p>
                                                      </div>
                                                      <div class="row-data flex center">
                                                          <p class="datos-contacto"><b>Rut sociedad empresa <?php echo e($i); ?> :</b> <?php echo e($participacionEmpresa->rut_sociedad); ?> </p>
                                                    </div>
                                                  </div>
                                                  <div class="col-md-6">
                                                    <div class="row-data flex center">
                                                          <p class="datos-contacto"><b>Giro sociedad empresa <?php echo e($i); ?> :</b> <?php echo e($participacionEmpresa->giro_sociedad); ?> </p>
                                                    </div>
                                                    <div class="row-data flex center">
                                                          <p class="datos-contacto"><b>Porcentaje de participacion empresa <?php echo e($i); ?> :</b> % <?php echo e($participacionEmpresa->participacion); ?> </p>
                                                    </div>
                                                    <div class="row-data flex center">
                                                          <p class="datos-contacto"><b>Ventas totales ultimo año empresa <?php echo e($i); ?> :</b> $ <?php echo e($participacionEmpresa->ventas_totales); ?> </p>
                                                    </div>
                                                  </div>
                                                </div>

                                                <br>
                                              <?php
                                               $i= $i+1; 
                                              ?>

                                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            </div>
                                              <div id="divEditarParticipacionesLista" hidden="true" >
                                                <?php
                                                 $i= 1; 
                                                ?>
                                                <?php $__currentLoopData = $participacionEmpresas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $participacionEmpresa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                <div class="row">
                                                <input type="number" class="form-control" min="0" id="idParticipacion<?php echo e($i); ?>" name="idParticipacion<?php echo e($i); ?>" value="<?php echo e($participacionEmpresa->id); ?>" style="display: none;">
                                                <h2 align="center">Participación <?php echo e($i); ?></h2>
                                                <div class="col-xs-12 col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <p align="center" class="control-label" for="razonSocial<?php echo e($i); ?>">Razón social</p>
                                                        <input type="text" class="form-control" id="razonSocial<?php echo e($i); ?>" name="razonSocial<?php echo e($i); ?>" value="<?php echo e($participacionEmpresa->razon_social); ?>">
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <p align="center" class="control-label" for="rutSociedad<?php echo e($i); ?>">RUT de la Sociedad</p>
                                                        <input type="text" class="form-control" id="rutSociedad<?php echo e($i); ?>" name="rutSociedad<?php echo e($i); ?>" maxlength="17" placeholder="Sin puntos ni guión" value="<?php echo e($participacionEmpresa->rut_sociedad); ?>">
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <p align="center" class="control-label" for="giroSociedad<?php echo e($i); ?>">Giro de la sociedad</p>
                                                        <input type="text" class="form-control" id="giroSociedad<?php echo e($i); ?>" name="giroSociedad<?php echo e($i); ?>" value="<?php echo e($participacionEmpresa->giro_sociedad); ?>">
                                                    </div>
                                                </div>
                                              </div>
                                              <br>
                                              <div class="row">
                                                  <div class="col-xs-12 col-sm-12 col-md-2">
                                                  </div>
                                                  <div class="col-xs-12 col-sm-12 col-md-4">
                                                     <div class="form-group">
                                                          <p align="center" class="control-label" for="porcentajeParticipacion<?php echo e($i); ?>">Porcentaje de participación</p>
                                                          <input type="number" min="0" max="100" class="form-control" id="porcentajeParticipacion<?php echo e($i); ?>" name="porcentajeParticipacion<?php echo e($i); ?>" value="<?php echo e($participacionEmpresa->participacion); ?>">
                                                     </div>
                                                 </div>
                                                  <div class="col-xs-12 col-sm-12 col-md-4">
                                                      <div class="form-group">
                                                          <p align="center" class="control-label" for="ventasTotales<?php echo e($i); ?>">Ventas totales último año</p>
                                                          <input type="number" min="0" class="form-control" id="ventasTotales<?php echo e($i); ?>" name="ventasTotales<?php echo e($i); ?>" value="<?php echo e($participacionEmpresa->ventas_totales); ?>">
                                                      </div>
                                                  </div>
                                                  <div class="col-xs-12 col-sm-12 col-md-2">
                                                 </div>
                                                </div>
                                                <?php
                                                 $i= $i+1; 
                                                ?>

                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                
                                                <div class="row" id="divBotonListoParticipacion" hidden="">
                                                  <div class="col-xs-12 col-sm-12 col-md-6">
                                                    
                                                  </div>
                                                  <div class="col-xs-12 col-sm-12 col-md-6">
                                                    
                                                      <button onclick="guardarDatosParticipacion()" href="#" style="float: right;" id="save" class="btn btn-success"><i class="fa fa-check"></i> Listo
                                                      </button>
                                                  </div>
                                                </div>
                                              </div>

                                            <?php endif; ?>


                                          <?php endif; ?>


                                        </div>

                                        <br>
                                        <br>
                                        <?php endif; ?>

                                        <?php if($eess->paso === 10 || $eess->paso === 12): ?>
                                        <div style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); padding: 30px;">
                                        
                                          <div class="cabezera" >
                                            <img src="<?php echo e(asset('img/icon-business-banking.png')); ?>" alt="cuentas corrientes" style="padding: 0 0 12px; width: 34px;"><b style="font-size: 25px; font-weight: 100;" class="titulo-menu">Cuentas corrientes</b>
                                            <?php if($eess->cuenta_corriente === null): ?><span class="pull-right text-green" style="margin-left: 5px"> <img src="<?php echo e(asset('img/remove.png')); ?>" alt="faltan datos" width="20px"> </span><?php else: ?>
                                            <span class="pull-right text-green" style="margin-left: 5px"> <img src="<?php echo e(asset('img/correct.png')); ?>" alt="Correcto" width="20px"> </span><?php endif; ?>

                                            <?php if($eess->cuenta_corriente !== null): ?>
                                            <a class="editar-datos" onclick="desplegar_form_cuentas_corriente()" id="editarCuentasCorriente" style="float: right;">Editar </a>
                                            <a class="editar-datos" onclick="desplegar_info_cuenta_corriente()" id="verCuentasCorriente" style="float: right;" hidden>Cerrar </a>
                                            <?php endif; ?>

                                            <hr>
                                          </div>

                                          <?php if($eess->cuenta_corriente === null): ?>

                                          <div class="row" style="text-align: center;">
                                            <div  class="col-xs-12 col-sm-12 col-md-4">
                                            </div>
                                            <div  class="col-xs-12 col-sm-12 col-md-4">
                                              <div class="form-group">
                                                <p align="center" class="control-label" for="cantCuentaCorriente">¿Posees cuenta corriente?</p>
                                                <input type="number" class="form-control" min="0" id="cantCuentaCorriente" name="cantCuentaCorriente">
                                                <p align="center" class="control-label">*Si no posees ninguna cuenta corriente, deja el contador en 0.</p>
                                              </div>
                                            </div>
                                            <div  class="col-xs-12 col-sm-12 col-md-4">
                                            </div>
                                          </div>
                                          <div id="divDatosCuentasCorrientes">
                                          </div>
                                          <div class="row" id="divBotonListoCuentasCorriente" hidden="">
                                            <div class="col-xs-12 col-sm-12 col-md-6">
                                              
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-6">
                                              
                                                <button onclick="guardarDatosCuentaCorriente()" href="#" style="float: right;" id="save" class="btn btn-success"><i class="fa fa-check"></i> Listo
                                                </button>
                                            </div>
                                          </div>

                                          <?php else: ?>

                                            <?php if($eess->cuenta_corriente === 0): ?>

                                              <div class="row" style="padding: 0 13px 30px;" id="divCuentasCorrienteLista" >
                                                <div class="col-md-6">
                                                    <div class="row-data flex center">
                                                          <p class="datos-contacto"><b>No posees cuentas corriente</b></p>
                                                    </div>
                                                </div>
                                              </div>
                                              <div class="row" style="text-align: center;" hidden="true" id="divEditarCuentaCorrienteLista">
                                                <div  class="col-xs-12 col-sm-12 col-md-4">
                                                </div>
                                                <div  class="col-xs-12 col-sm-12 col-md-4">
                                                  <div class="form-group">
                                                    <p align="center" class="control-label" for="cantCuentaCorriente">¿Posees cuenta corriente?</p>
                                                    <input type="number" class="form-control" min="0" id="cantCuentaCorriente" name="cantCuentaCorriente">
                                                    <p align="center" class="control-label">*Si no posees ninguna cuenta corriente, deja el contador en 0.</p>
                                                  </div>
                                                </div>
                                                <div  class="col-xs-12 col-sm-12 col-md-4">
                                                </div>
                                              </div>
                                              <div id="divDatosCuentasCorrientes">
                                              </div>
                                              <div class="row" id="divBotonListoCuentasCorriente" hidden="">
                                                <div class="col-xs-12 col-sm-12 col-md-6">
                                                  
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-6">
                                                  
                                                    <button onclick="guardarDatosCuentaCorriente()" href="#" style="float: right;" id="save" class="btn btn-success"><i class="fa fa-check"></i> Listo
                                                    </button>
                                                </div>
                                              </div>

                                            <?php else: ?>

                                            <input type="text" class="form-control" id="cantidadCtaC" name="cantidadCtaC" value=" <?php echo e(count($cuentasCorriente)); ?>" style="display: none;">
                                            <div  style="padding: 0 13px 30px;" id="divCuentasCorrienteLista" >
                                              <?php
                                               $i= 1; 
                                              ?>
                                              <?php $__currentLoopData = $cuentasCorriente; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cuentaCorriente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                              
                                                <div class="row">  
                                                  <div class="col-md-3">
                                                      <div class="row-data flex center">
                                                            <p class="datos-contacto"><b>Banco cuenta corriente <?php echo e($i); ?> :</b><?php echo e($cuentaCorriente->banco); ?></p>
                                                      </div>
                                                  </div>
                                                  <div class="col-md-3">
                                                    <div class="row-data flex center">
                                                          <p class="datos-contacto"><b>Ejecutivo y sucursal cuenta corriente <?php echo e($i); ?> :</b> <?php echo e($cuentaCorriente->ejecutivo_sucursal); ?> </p>
                                                    </div>
                                                  </div>
                                                  <div class="col-md-3">
                                                    <div class="row-data flex center">
                                                          <p class="datos-contacto"><b>Monto linea credito cuenta corriente <?php echo e($i); ?> :</b> $ <?php echo e($cuentaCorriente->monto_linea); ?> </p>
                                                    </div>
                                                  </div>
                                                  <div class="col-md-3">
                                                    <div class="row-data flex center">
                                                          <p class="datos-contacto"><b>Monto tarjeta credito cuenta corriente <?php echo e($i); ?> :</b> $<?php echo e($cuentaCorriente->monto_tarjeta); ?> </p>
                                                    </div>
                                                    <div class="row-data flex center">
                                                          <p class="datos-contacto"><b>Saldo actual cuenta corriente <?php echo e($i); ?> :</b> $<?php echo e($cuentaCorriente->saldo_actual); ?> </p>
                                                    </div>
                                                  </div>
                                                </div>

                                                <br>
                                              <?php
                                               $i= $i+1; 
                                              ?>

                                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            </div>
                                              <div id="divEditarCuentaCorrienteLista" hidden="true" >
                                                <?php
                                                 $i= 1; 
                                                ?>
                                                <?php $__currentLoopData = $cuentasCorriente; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cuentaCorriente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                <div class="row">
                                                <input type="number" class="form-control" min="0" id="idCuentaCorriente<?php echo e($i); ?>" name="idCuentaCorriente<?php echo e($i); ?>" value="<?php echo e($cuentaCorriente->id); ?>" style="display: none;">
                                                <h2 align="center">Cuenta corriente <?php echo e($i); ?></h2>
                                                 <div class="col-xs-12 col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                         <p align="center" class="control-label" for="bancoCuentaCorriente<?php echo e($i); ?>">Banco cuenta corriente</p>
                                                         <select class="form-control" id="bancoCuentaCorriente<?php echo e($i); ?>" name="bancoCuentaCorriente<?php echo e($i); ?>">
                                                          <option selected value="<?php echo e($cuentaCorriente->banco); ?>"><?php echo e($cuentaCorriente->banco); ?></option>
                                                          <option value="Banco BBVA">Banco BBVA</option>
                                                          <option value="Banco BCI">Banco BCI</option>
                                                          <option value="Banco BICE">Banco BICE</option>
                                                          <option value="Banco CORP Banca">Banco CORP Banca</option>
                                                          <option value="Banco Consorcio">Banco Consorcio</option>
                                                          <option value="Banco Coopeuch">Banco Coopeuch</option>
                                                          <option value="Banco Estado">Banco Estado</option>
                                                          <option value="Banco Falabella">Banco Falabella</option>
                                                          <option value="Banco ITAÚ">Banco ITAÚ</option>
                                                          <option value="Banco Internacional">Banco Internacional</option>
                                                          <option value="Banco París">Banco París</option>
                                                          <option value="Banco Ripley">Banco Ripley</option>
                                                          <option value="Banco Santander/Banefe">Banco Santander/Banefe</option>
                                                          <option value="Banco Security">Banco Security</option>
                                                          <option value="Banco de Chile/Edwards/Credichile">Banco de Chile/Edwards/Credichile</option>
                                                          <option value="Banco del Desarrollo">Banco del Desarrollo</option>
                                                          <option value="HSBC Bank">HSBC Bank</option>
                                                          <option value="Prepago Los Héroes">Prepago Los Héroes</option>
                                                          <option value="Mutuaria">Mutuaria</option>
                                                         </select>
                                                    </div>
                                                 </div>
                                                 <div class="col-xs-12 col-sm-12 col-md-4">
                                                     <div class="form-group">
                                                         <p align="center" class="control-label" for="ejecutivoSucursalCuenta<?php echo e($i); ?>">Nombre ejecutivo(a) y sucursal cuenta corriente </p>
                                                         <input type="text" class="form-control" id="ejecutivoSucursalCuenta<?php echo e($i); ?>" name="ejecutivoSucursalCuenta<?php echo e($i); ?>" value="<?php echo e($cuentaCorriente->ejecutivo_sucursal); ?>">
                                                     </div>
                                                 </div>
                                                 <div class="col-xs-12 col-sm-12 col-md-4">
                                                     <div class="form-group">
                                                         <p align="center" class="control-label" for="saldoActualCuenta<?php echo e($i); ?>">Saldo actual cuenta corriente </p>
                                                         <input type="number" class="form-control" min="0" id="saldoActualCuenta<?php echo e($i); ?>" name="saldoActualCuenta<?php echo e($i); ?>" value="<?php echo e($cuentaCorriente->saldo_actual); ?>">
                                                     </div>
                                                 </div>
                                               </div>
                                               <br>
                                               <div class="row">
                                                   <div class="col-xs-12 col-sm-12 col-md-2">
                                                   </div>
                                                   <div class="col-xs-12 col-sm-12 col-md-4">
                                                       <div class="form-group">
                                                           <p align="center" class="control-label" for="montoUtilizadoLinea<?php echo e($i); ?>">Monto utilizado línea de crédito cuenta corriente</p>
                                                           <input type="number" class="form-control" min="0" id="montoUtilizadoLinea<?php echo e($i); ?>" name="montoUtilizadoLinea<?php echo e($i); ?>" value="<?php echo e($cuentaCorriente->monto_linea); ?>" >
                                                       </div>
                                                    </div>
                                                   <div class="col-xs-12 col-sm-12 col-md-4">
                                                       <div class="form-group">
                                                           <p align="center" class="control-label" for="montoUtilizadoTarjeta<?php echo e($i); ?>">Monto utilizado tarjeta de crédito cuenta corriente </p>
                                                           <input type="number" min="0" class="form-control" id="montoUtilizadoTarjeta<?php echo e($i); ?>" name="montoUtilizadoTarjeta<?php echo e($i); ?>" value="<?php echo e($cuentaCorriente->monto_tarjeta); ?>">
                                                        </div>
                                                   </div>
                                                   <div class="col-xs-12 col-sm-12 col-md-2">
                                                   </div>
                                               </div>
                                                
                                                <?php
                                                 $i= $i+1; 
                                                ?>

                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                
                                                <div class="row" id="divBotonListoCuentasCorriente" hidden="">
                                                  <div class="col-xs-12 col-sm-12 col-md-6">
                                                    
                                                  </div>
                                                  <div class="col-xs-12 col-sm-12 col-md-6">
                                                    
                                                      <button onclick="guardarDatosCuentaCorriente()" href="#" style="float: right;" id="save" class="btn btn-success"><i class="fa fa-check"></i> Listo
                                                      </button>
                                                  </div>
                                                </div>
                                              </div>


                                            <?php endif; ?>


                                          <?php endif; ?>


                                        </div>
                                        <br>
                                        <br>
                                        <?php endif; ?>

                                        <?php if($eess->paso === 11 || $eess->paso === 12): ?>
                                        <div style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); padding: 30px;">
                                        
                                          <div class="cabezera" >
                                            <img src="<?php echo e(asset('img/icon-business-banking.png')); ?>" alt="Créditos de consumo" style="padding: 0 0 12px; width: 34px;"><b style="font-size: 25px; font-weight: 100;" class="titulo-menu">Créditos de consumo</b>
                                            <?php if($eess->credito_consumo === null): ?><span class="pull-right text-green" style="margin-left: 5px"> <img src="<?php echo e(asset('img/remove.png')); ?>" alt="faltan datos" width="20px"> </span><?php else: ?>
                                            <span class="pull-right text-green" style="margin-left: 5px"> <img src="<?php echo e(asset('img/correct.png')); ?>" alt="Correcto" width="20px"> </span><?php endif; ?>
                                            <?php if($eess->credito_consumo !== null): ?>
                                            <a class="editar-datos" onclick="desplegar_form_credito_consumo()" id="editarCreditoConsumo" style="float: right;">Editar </a>
                                            <a class="editar-datos" onclick="desplegar_info_credito_consumo()" id="verCreditoConsumo" style="float: right;" hidden>Cerrar </a>
                                            <?php endif; ?>
                                            <hr>
                                          </div>

                                          <?php if($eess->credito_consumo === null): ?>
                                            <div class="row" style="text-align: center;">
                                              <div  class="col-xs-12 col-sm-12 col-md-4">
                                              </div>
                                              <div  class="col-xs-12 col-sm-12 col-md-4">
                                                <div class="form-group">
                                                  <p align="center" class="control-label" for="cantCreditoConsumo">¿Posees créditos de consumo?</p>
                                                  <input type="number" class="form-control" min="0" id="cantCreditoConsumo" name="cantCreditoConsumo">
                                                  <p align="center" class="control-label">*Si no posees ningun crédito de consumo, deja el contador en 0.</p>
                                                </div>
                                              </div>
                                              <div  class="col-xs-12 col-sm-12 col-md-4">
                                              </div>
                                            </div>
                                            <div id="divDatosCreditoConsumo">
                                            </div>
                                            <div class="row" id="divBotonListoCreditoConsumo" >
                                              <div class="col-xs-12 col-sm-12 col-md-6">
                                                
                                              </div>
                                              <div class="col-xs-12 col-sm-12 col-md-6">
                                                
                                                  <button onclick="guardarDatosCreditoConsumo()" href="#" style="float: right;" id="save" class="btn btn-success"><i class="fa fa-check"></i> Listo
                                                  </button>
                                              </div>
                                            </div>

                                          <?php else: ?>

                                            <?php if($eess->credito_consumo === 0): ?>

                                              <div class="row" style="padding: 0 13px 30px;" id="divCreditoConsumoLista" >
                                                <div class="col-md-6">
                                                    <div class="row-data flex center">
                                                          <p class="datos-contacto"><b>No posees cuentas corriente</b></p>
                                                    </div>
                                                </div>
                                              </div>
                                              <div class="row" style="text-align: center;" id="divEditarCreditoConsumoLista" hidden="">
                                                <div  class="col-xs-12 col-sm-12 col-md-4">
                                                </div>
                                                <div  class="col-xs-12 col-sm-12 col-md-4">
                                                  <div class="form-group">
                                                    <p align="center" class="control-label" for="cantCreditoConsumo">¿Posees créditos de consumo?</p>
                                                    <input type="number" class="form-control" min="0" id="cantCreditoConsumo" name="cantCreditoConsumo">
                                                    <p align="center" class="control-label">*Si no posees ningun crédito de consumo, deja el contador en 0.</p>
                                                  </div>
                                                </div>
                                                <div  class="col-xs-12 col-sm-12 col-md-4">
                                                </div>
                                              </div>
                                              <div id="divDatosCreditoConsumo">
                                              </div>
                                              <div class="row" id="divBotonListoCreditoConsumo" hidden="true">
                                                <div class="col-xs-12 col-sm-12 col-md-6">
                                                  
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-6">
                                                  
                                                    <button onclick="guardarDatosCreditoConsumo()" href="#" style="float: right;" id="save" class="btn btn-success"><i class="  fa fa-check"></i> Listo
                                                    </button>
                                                </div>
                                              </div>


                                            <?php else: ?>


                                              <input type="text" class="form-control" id="cantidadCreditoConsumoRegistrado" name="cantidadCreditoConsumoRegistrado" value=" <?php echo e(count($creditosConsumo)); ?>" style="display: none;">
                                            <div  style="padding: 0 13px 30px;" id="divCreditoConsumoLista" >
                                              <?php
                                               $i= 1; 
                                              ?>
                                              <?php $__currentLoopData = $creditosConsumo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $creditoConsumo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                              
                                                <div class="row">  
                                                  <div class="col-md-3">
                                                      <div class="row-data flex center">
                                                            <p class="datos-contacto"><b>Banco credito consumo <?php echo e($i); ?> :</b><?php echo e($creditoConsumo->banco); ?></p>
                                                      </div>
                                                  </div>
                                                  <div class="col-md-3">
                                                    <div class="row-data flex center">
                                                          <p class="datos-contacto"><b>Monto credito <?php echo e($i); ?> :</b> <?php echo e($creditoConsumo->monto); ?> </p>
                                                    </div>
                                                  </div>
                                                  <div class="col-md-3">
                                                    <div class="row-data flex center">
                                                          <p class="datos-contacto"><b>Valor cuota credito <?php echo e($i); ?> :</b> $ <?php echo e($creditoConsumo->valor_cuota); ?> </p>
                                                    </div>
                                                  </div>
                                                  <div class="col-md-3">
                                                    <div class="row-data flex center">
                                                          <p class="datos-contacto"><b>Cuotas restantes credito <?php echo e($i); ?> :</b> $<?php echo e($creditoConsumo->cuotas_restantes); ?> </p>
                                                    </div>
                                                  </div>
                                                </div>

                                                <br>
                                              <?php
                                               $i= $i+1; 
                                              ?>

                                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            </div>
                                              <div id="divEditarCreditoConsumoLista" hidden="true" >
                                                <?php
                                                 $i= 1; 
                                                ?>
                                                <?php $__currentLoopData = $creditosConsumo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $creditoConsumo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                <div class="row">
                                                  <input type="number" class="form-control" min="0" id="idCreditoConsumo<?php echo e($i); ?>" name="idCreditoConsumo<?php echo e($i); ?>" value="<?php echo e($creditoConsumo->id); ?>" style="display: none;">
                                                  <h2 align="center">Credito de consumo <?php echo e($i); ?></h2>
                                                   <div class="col-xs-12 col-sm-12 col-md-3">
                                                     <div class="form-group">
                                                       <p align="center" class="control-label" for="bancoCreditoConsumo<?php echo e($i); ?>">Banco crédito de consumo</p>
                                                         <select class="form-control" id="bancoCreditoConsumo<?php echo e($i); ?>" name="bancoCreditoConsumo<?php echo e($i); ?>">
                                                          <option selected value="<?php echo e($creditoConsumo->banco); ?>"><?php echo e($creditoConsumo->banco); ?></option>
                                                          <option value="Banco BBVA">Banco BBVA</option>
                                                          <option value="Banco BCI">Banco BCI</option>
                                                          <option value="Banco BICE">Banco BICE</option>
                                                          <option value="Banco CORP Banca">Banco CORP Banca</option>
                                                          <option value="Banco Consorcio">Banco Consorcio</option>
                                                          <option value="Banco Coopeuch">Banco Coopeuch</option>
                                                          <option value="Banco Estado">Banco Estado</option>
                                                          <option value="Banco Falabella">Banco Falabella</option>
                                                          <option value="Banco ITAÚ">Banco ITAÚ</option>
                                                          <option value="Banco Internacional">Banco Internacional</option>
                                                          <option value="Banco París">Banco París</option>
                                                          <option value="Banco Ripley">Banco Ripley</option>
                                                          <option value="Banco Santander/Banefe">Banco Santander/Banefe</option>
                                                          <option value="Banco Security">Banco Security</option>
                                                          <option value="Banco de Chile/Edwards/Credichile">Banco de Chile/Edwards/Credichile</option>
                                                          <option value="Banco del Desarrollo">Banco del Desarrollo</option>
                                                          <option value="HSBC Bank">HSBC Bank</option>
                                                          <option value="Prepago Los Héroes">Prepago Los Héroes</option>
                                                          <option value="Mutuaria">Mutuaria</option>
                                                         </select>
                                                    </div>
                                                   </div>
                                                   <div class="col-xs-12 col-sm-12 col-md-3">
                                                     <div class="form-group">
                                                       <p align="center" class="control-label" for="montoTotalCredito<?php echo e($i); ?>">Monto total del crédito</p>
                                                       <input type="number" class="form-control" min="0" id="montoTotalCredito<?php echo e($i); ?>" name="montoTotalCredito<?php echo e($i); ?>" value="<?php echo e($creditoConsumo->monto); ?>">
                                                     </div>
                                                   </div>
                                                   <div class="col-xs-12 col-sm-12 col-md-3">
                                                     <div class="form-group">
                                                       <p align="center" class="control-label" for="valorCuotaMensualConsumo<?php echo e($i); ?>">Valor cuota mensual crédito </p>
                                                       <input type="number" class="form-control" min="0" id="valorCuotaMensualConsumo<?php echo e($i); ?>" name="valorCuotaMensualConsumo<?php echo e($i); ?>" value="<?php echo e($creditoConsumo->valor_cuota); ?>">
                                                     </div>
                                                   </div>
                                                   <div class="col-xs-12 col-sm-12 col-md-3">
                                                     <div class="form-group">
                                                       <p align="center" class="control-label" for="cuotasRestantesConsumo<?php echo e($i); ?>">Cuotas restantes crédito  </p>
                                                       <input type="number" class="form-control" min="0" id="cuotasRestantesConsumo<?php echo e($i); ?>" name="cuotasRestantesConsumo<?php echo e($i); ?>" value="<?php echo e($creditoConsumo->cuotas_restantes); ?>">
                                                     </div>
                                                   </div>
                                                 </div>
                                                
                                                <?php
                                                 $i= $i+1; 
                                                ?>

                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                <div class="row" id="divBotonListoCreditoConsumo" hidden="true">
                                                  <div class="col-xs-12 col-sm-12 col-md-6">
                                                    
                                                  </div>
                                                  <div class="col-xs-12 col-sm-12 col-md-6">
                                                    
                                                      <button onclick="guardarDatosCreditoConsumo()" href="#" style="float: right;" id="save" class="btn btn-success"><i class="  fa fa-check"></i> Listo
                                                      </button>
                                                  </div>
                                                </div>
                                              </div>


                                            <?php endif; ?>


                                          <?php endif; ?>

                                        </div>
                                        <?php endif; ?>
                                        </form>
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
        ..........
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

    $("#formulario").click(function(){
      $("#div1").fadeIn("slow");

    });



    //FUNCION QUE HACE DINAMICO LA MOTIVACION  
    $('#motivacion').on('change', function() {
      var selectMotivacion = $(this).val();
      $( "#divMotivacion" ).removeClass().addClass( "col-xs-12 col-sm-12 col-md-12" );
      $( "#dinamicoMotivacion" ).empty();

      if(selectMotivacion == "Vivienda de inversión"){

        $( "#divMotivacion" ).removeClass( "col-xs-12 col-sm-12 col-md-12" ).addClass( "col-xs-12 col-sm-12 col-md-4" );
        $( "#dinamicoMotivacion" ).append('<div class="col-xs-12 col-sm-12 col-md-4">'+
                                                '<div class="form-group">'+
                                                  '<p align="center" class="control-label" for="tipoViviendaInversion">¿Qué tipo de vivienda prefieres?</p>'+
                                                    '<select class="form-control" id="tipoViviendaInversion" name="tipoViviendaInversion">'+
                                                      '<option value="Casas">Casas</option>'+
                                                      '<option value="Departamentos">Departamentos</option>'+
                                                      '<option value="Oficinas">Oficinas</option>'+
                                                      '<option value="Sitios">Sitios</option>'+
                                                    '</select>'+
                                                '</div>'+
                                              '</div>'+
                                              '<div class="col-xs-12 col-sm-12 col-md-4">'+
                                                '<div class="form-group">'+
                                                  '<p align="center" class="control-label" for="cantidadPropiedadesInversion">¿Cuántas propiedades prefieres?</p>'+
                                                  '<input type="number" class="form-control" min="1" id="cantidadPropiedadesInversion" name="cantidadPropiedadesInversion">'+
                                                '</div>'+
                                              '</div>');


      }else{

        $( "#divMotivacion" ).removeClass( "col-xs-12 col-sm-12 col-md-12" ).addClass( "col-xs-12 col-sm-12 col-md-6" );
        $( "#dinamicoMotivacion" ).append('<div class="col-xs-12 col-sm-12 col-md-6">'+
                                                        '<div class="form-group">'+
                                                          '<p align="center" class="control-label" for="tipoViviendaInversion">¿Qué tipo de vivienda prefieres?</p>'+
                                                            '<select class="form-control" id="tipoViviendaInversion" name="tipoViviendaInversion">'+
                                                              '<option value="Casa">Casa</option>'+
                                                              '<option value="Departamento">Departamento</option>'+
                                                            '</select>'+
                                                        '</div>'+
                                                      '</div>');

      }

      
    });

    //FUNCION QUE HACE DINAMICO EL ESTADO CIVIL Y DATOS CONYUGE
    $('#estadoCivil').on('change', function() {
      var selectEstadoCivil = $(this).val();
      $( "#divEstadoCivil" ).removeClass().addClass( "col-xs-12 col-sm-12 col-md-6" );
      $( "#divDependientesUsuario" ).removeClass().addClass( "col-xs-12 col-sm-12 col-md-6" );
      $("#divRegimenMatrimonial").fadeOut();
      $("#brEstadoCivil").fadeOut();
      $("#divDatosConyuge").fadeOut();

      if(selectEstadoCivil == "Casado"){

        $("#divRegimenMatrimonial").fadeIn('slow');
        $("#brEstadoCivil").fadeIn('slow');
        $("#divDatosConyuge").fadeIn('slow');
        $( "#divEstadoCivil" ).removeClass( "col-xs-12 col-sm-12 col-md-6" ).addClass( "col-xs-12 col-sm-12 col-md-4" );
        $( "#divDependientesUsuario" ).removeClass( "col-xs-12 col-sm-12 col-md-6" ).addClass( "col-xs-12 col-sm-12 col-md-4" );


      }

    });

    //FUNCION QUE HACE DINAMICO EL INGRESO 
    $('#ingresosAdicionales').on('change', function() {
      var selectIngresosAdicionales = $(this).val();

      if(selectIngresosAdicionales == "Si"){

        $("#divIngresosAdicionales").fadeIn('slow');

      }else{

        $("#divIngresosAdicionales").fadeOut();

      }

    });

    //FUNCION QUE HACE DINAMICO VEHICULOS
    $('#cantVehiculos').on('change', function() {
      var cantidadVehiculos = $(this).val();
      var i = 1;

      $("#divDatosVehiculos").empty();
      $("#divBotonListoVehiculo").show();

      while (i <= cantidadVehiculos){

        $("#divDatosVehiculos").append( '<div class="row">'+
                                          '<h2 align="center">Vehículo '+i+ '</h2>'+
                                          '<div class="col-xs-12 col-sm-12 col-md-4">'+
                                              '<div class="form-group">'+
                                                  '<p align="center" class="control-label" for="marcaVehiculo'+i+'">Marca vehículo </p>'+
                                                  '<input type="text" class="form-control" id="marcaVehiculo'+i+'" name="marcaVehiculo'+i+'">'+
                                              '</div>'+
                                          '</div>'+
                                          '<div class="col-xs-12 col-sm-12 col-md-4">'+
                                              '<div class="form-group">'+
                                                  '<p align="center" class="control-label" for="modeloVehiculo'+i+'">Modelo vehículo</p>'+
                                                  '<input type="text" class="form-control" id="modeloVehiculo'+i+'" name="modeloVehiculo'+i+'">'+
                                              '</div>'+
                                          '</div>'+
                                          '<div class="col-xs-12 col-sm-12 col-md-4">'+
                                              '<div class="form-group">'+
                                                  '<p align="center" class="control-label" for="añoVehiculo'+i+'">Año vehículo</p>'+
                                                  '<input type="number" min="1900" class="form-control" id="añoVehiculo'+i+'" name="añoVehiculo'+i+'" maxlength="4">'+
                                              '</div>'+
                                          '</div>'+
                                        '</div>'+
                                        '<br>'+
                                        '<div class="row">'+
                                          '<div class="col-xs-12 col-sm-12 col-md-2">'+
                                          '</div>'+
                                          '<div class="col-xs-12 col-sm-12 col-md-4">'+
                                            '<div class="form-group">'+
                                                '<p align="center" class="control-label" for="patenteVehiculo'+i+'">Patente vehículo</p>'+
                                                '<input type="text" class="form-control" id="patenteVehiculo'+i+'" name="patenteVehiculo'+i+'" maxlength="8">'+
                                              '</div>'+
                                          '</div>'+
                                          '<div class="col-xs-12 col-sm-12 col-md-4">'+
                                              '<div class="form-group">'+
                                                  '<p align="center" class="control-label" for="valorVehiculo'+i+'">Valor comercial vehículo</p>'+
                                                  '<input type="number" min="0" class="form-control" id="valorVehiculo'+i+'" name="valorVehiculo'+i+'">'+
                                              '</div>'+
                                          '</div>'+
                                          '<div class="col-xs-12 col-sm-12 col-md-2">'+
                                          '</div>'+
                                        '</div>');
        i++;

      }
      
    });

    //FUNCION QUE HACE DINAMICO PROPIEDADES
    $('#cantPropiedades').on('change', function() {
      var cantidadPropiedades = $(this).val();
      var i = 1;
      $("#divDatosPropiedades").empty();
      $("#divBotonListoPropiedades").show();

      while (i <= cantidadPropiedades){

        $("#divDatosPropiedades").append( '<div class="row">'+
                                            '<h2 align="center">Propiedad '+i+ '</h2>'+
                                            '<div class="col-xs-12 col-sm-12 col-md-3">'+
                                              '<div class="form-group">'+
                                                '<p align="center" class="control-label" for="tipoPropiedad'+i+ '">Tipo propiedad</p>'+
                                                  '<select class="form-control" id="tipoPropiedad'+i+ '" name="tipoPropiedad'+i+ '">'+
                                                    '<option hidden selected>Selecciona tipo propiedad</option>'+
                                                    '<option value="Casa">Casa</option>'+
                                                    '<option value="Departamento">Departamento</option>'+
                                                    '<option value="Oficina">Oficina</option>'+
                                                    '<option value="Sitio">Sitio</option>'+
                                                  '</select>'+
                                              '</div>'+
                                            '</div>'+
                                            '<div class="col-xs-12 col-sm-12 col-md-3">'+
                                              '<div class="form-group">'+
                                                '<p align="center" class="control-label" for="direccionPropiedad'+i+ '">Dirección propiedad</p>'+
                                                '<input type="text" class="form-control" id="direccionPropiedad'+i+ '" name="direccionPropiedad'+i+ '">'+
                                              '</div>'+
                                            '</div>'+
                                            '<div class="col-xs-12 col-sm-12 col-md-3">'+
                                              '<div class="form-group">'+
                                                '<p align="center" class="control-label" for="comunaPropiedad'+i+ '">Comuna propiedad</p>'+
                                                '<input type="text" class="form-control" id="comunaPropiedad'+i+ '" name="comunaPropiedad'+i+ '">'+
                                              '</div>'+
                                            '</div>'+
                                            '<div class="col-xs-12 col-sm-12 col-md-3">'+
                                              '<div class="form-group">'+
                                                '<p align="center" class="control-label" for="ciudadPropiedad'+i+ '">Ciudad propiedad</p>'+
                                                '<input type="text" class="form-control"  id="ciudadPropiedad'+i+ '" name="ciudadPropiedad'+i+ '">'+
                                              '</div>'+
                                            '</div>'+
                                          '</div>'+
                                          '<div class="row">'+
                                            '<div class="col-xs-12 col-sm-12 col-md-4">'+
                                              '<div class="form-group">'+
                                                '<p align="center" class="control-label" for="rolPropiedad'+i+ '">ROL propiedad</p>'+
                                                '<input type="text" class="form-control" id="rolPropiedad'+i+ '" name="rolPropiedad'+i+ '">'+
                                              '</div>'+
                                            '</div>'+
                                            '<div class="col-xs-12 col-sm-12 col-md-4">'+
                                              '<div class="form-group">'+
                                                '<p align="center" class="control-label" for="valorPropiedad'+i+ '">Valor comercial propiedad</p>'+
                                                '<input type="number" min="0" class="form-control" id="valorPropiedad'+i+ '" name="valorPropiedad'+i+ '">'+
                                              '</div>'+
                                            '</div>'+
                                            '<div class="col-xs-12 col-sm-12 col-md-4">'+
                                              '<div class="form-group">'+
                                                '<p align="center" class="control-label" for="propiedadCredito'+i+ '">¿Propiedad con crédito hipotecario?</p>'+
                                                  '<select class="form-control" id="propiedadCredito'+i+ '" name="propiedadCredito'+i+ '">'+
                                                    '<option hidden selected>Selecciona una opción</option>'+
                                                    '<option value="Si">Si</option>'+
                                                    '<option value="No">No</option>'+
                                                  '</select>'+
                                              '</div>'+
                                            '</div>'+
                                          '</div>'+
                                          '<div id="divDatosHipotecarios'+i+ '" style="display:none;">'+
                                            '<div class="row">'+
                                              '<div class="col-xs-12 col-sm-12 col-md-3">'+
                                                '<div class="form-group">'+
                                                  '<p align="center" class="control-label" for="bancoCredito'+i+ '">Banco a favor de la hipoteca propiedad</p>'+
                                                  
                                                    '<select class="form-control" id="bancoCredito'+i+ '" name="bancoCredito'+i+ '">'+
                                                      '<option hidden selected>Seleccione banco</option>'+
                                                      '<option value="Banco BBVA">Banco BBVA</option>'+
                                                      '<option value="Banco BCI">Banco BCI</option>'+
                                                      '<option value="Banco BICE">Banco BICE</option>'+
                                                      '<option value="Banco CORP Banca">Banco CORP Banca</option>'+
                                                      '<option value="Banco Consorcio">Banco Consorcio</option>'+
                                                      '<option value="Banco Coopeuch">Banco Coopeuch</option>'+
                                                      '<option value="Banco Estado">Banco Estado</option>'+
                                                      '<option value="Banco Falabella">Banco Falabella</option>'+
                                                      '<option value="Banco ITAÚ">Banco ITAÚ</option>'+
                                                      '<option value="Banco Internacional">Banco Internacional</option>'+
                                                      '<option value="Banco París">Banco París</option>'+
                                                      '<option value="Banco Ripley">Banco Ripley</option>'+
                                                      '<option value="Banco Santander/Banefe">Banco Santander/Banefe</option>'+
                                                      '<option value="Banco Security">Banco Security</option>'+
                                                      '<option value="Banco de Chile/Edwards/Credichile">Banco de Chile/Edwards/Credichile</option>'+
                                                      '<option value="Banco del Desarrollo">Banco del Desarrollo</option>'+
                                                      '<option value="HSBC Bank">HSBC Bank</option>'+
                                                      '<option value="Prepago Los Héroes">Prepago Los Héroes</option>'+
                                                      '<option value="Mutuaria">Mutuaria</option>'+
                                                    '</select>'+
                                                '</div>'+
                                              '</div>'+
                                              '<div class="col-xs-12 col-sm-12 col-md-3">'+
                                                 ' <div class="form-group">'+
                                                    '<div class="form-group">'+
                                                      '<p align="center" class="control-label" for="montoCreditoHipotecario'+i+ '">Monto total del crédito hipotecario</p>'+
                                                      '<br>'+
                                                      '<input type="number" min="0" class="form-control" id="montoCreditoHipotecario'+i+ '" name="montoCreditoHipotecario'+i+ '">'+
                                                    '</div>'+
                                                  '</div>'+
                                              '</div>'+
                                              '<div class="col-xs-12 col-sm-12 col-md-3">'+
                                                  '<div class="form-group">'+
                                                      '<p align="center" class="control-label" for="valorCuotaMensulaHipotecario'+i+ '">Valor cuota mensual hipotecario</p>'+
                                                      '<br>'+
                                                      '<input type="number" min="0" class="form-control" id="valorCuotaMensulaHipotecario'+i+ '" name="valorCuotaMensulaHipotecario'+i+ '">'+
                                                  '</div>'+
                                              '</div>'+
                                              '<div class="col-xs-12 col-sm-12 col-md-3">'+
                                                  '<div class="form-group">'+
                                                      '<p align="center" class="control-label" for="cuotasRestantesHipotecario'+i+ '">Cantidad de cuotas restantes hipotecario</p>'+
                                                      '<input type="number" min="0" maxlength="3" class="form-control" id="cuotasRestantesHipotecario'+i+ '" name="cuotasRestantesHipotecario'+i+ '">'+
                                                  '</div>'+
                                              '</div>'+
                                            '</div>'+
                                          '</div>');
        
        $('#propiedadCredito'+i).on('change', function() {

          var nombre = $(this).attr('name');
          var numero = nombre.slice(16);

          if($(this).val()== 'Si'){

            $("#divDatosHipotecarios"+numero).fadeIn('slow');

          }else{

            $("#divDatosHipotecarios"+numero).fadeOut();

          }
          

        });

        i++;

      }
      
    });

    //FUNCION QUE HACE DINAMICO INVERSIONES
    $('#instrumentosInversion').on('change', function() {
      var instrumentos = $(this).val();
      var i = 1;
      $('#divBotonListoInversion').show();
      $("#divDatosInversiones").empty();

      while (i <= instrumentos){

        $("#divDatosInversiones").append( '<div class="row">'+
                                          '<h2 align="center">Instrumento inversión '+i+ '</h2>'+
                                            '<div class="col-xs-12 col-sm-12 col-md-6">'+
                                              '<div class="form-group">'+
                                                '<p align="center" class="control-label" for="tipoInstrumento'+i+ '">Tipo de instrumento</p>'+
                                                  '<select class="form-control" id="tipoInstrumento'+i+ '" name="tipoInstrumento'+i+ '">'+
                                                    '<option hidden selected>Seleccione Opción</option>'+
                                                    '<option value="Acciones">Acciones</option>'+
                                                    '<option value="Fondo mutuo">Fondo mutuo</option>'+
                                                    '<option value="Depósito a plazo">Depósito a plazo</option>'+
                                                  '</select>'+
                                              '</div>'+
                                            '</div>'+
                                            '<div class="col-xs-12 col-sm-12 col-md-6">'+
                                              '<div class="form-group">'+
                                                '<p align="center" class="control-label" for="valorInstrumento'+i+ '">Valor comercial instrumento</p>'+
                                                '<input type="number" class="form-control" min="0" id="valorInstrumento'+i+ '" name="valorInstrumento">'+
                                              '</div>'+
                                            '</div>'+
                                          '</div>');
        i++;

      }
      
    });
  
    //FUNCION QUE HACE DINAMICO PARTICIPACIONES
    $('#participacionEmpresa').on('change', function() {
      var participaciones = $(this).val();
      var i = 1;
      $("#divDatosParticipaciones").empty();
      $("#divBotonListoParticipacion").show();
      while (i <= participaciones){

        $("#divDatosParticipaciones").append( '<div class="row">'+
                                                '<h2 align="center">Participación '+i+ '</h2>'+
                                                '<div class="col-xs-12 col-sm-12 col-md-4">'+
                                                    '<div class="form-group">'+
                                                        '<p align="center" class="control-label" for="razonSocial'+i+ '">Razón social</p>'+
                                                        '<input type="text" class="form-control" id="razonSocial'+i+ '" name="razonSocial'+i+ '">'+
                                                    '</div>'+
                                                '</div>'+
                                                '<div class="col-xs-12 col-sm-12 col-md-4">'+
                                                    '<div class="form-group">'+
                                                        '<p align="center" class="control-label" for="rutSociedad'+i+ '">RUT de la Sociedad</p>'+
                                                        '<input type="text" class="form-control" id="rutSociedad'+i+ '" name="rutSociedad'+i+ '" maxlength="17" placeholder="Sin puntos ni guión">'+
                                                    '</div>'+
                                                '</div>'+
                                                '<div class="col-xs-12 col-sm-12 col-md-4">'+
                                                    '<div class="form-group">'+
                                                        '<p align="center" class="control-label" for="giroSociedad'+i+ '">Giro de la sociedad</p>'+
                                                        '<input type="text" class="form-control" id="giroSociedad'+i+ '" name="giroSociedad'+i+ '">'+
                                                    '</div>'+
                                                '</div>'+
                                              '</div>'+
                                              '<br>'+
                                              '<div class="row">'+
                                                  '<div class="col-xs-12 col-sm-12 col-md-2">'+
                                                  '</div>'+
                                                  '<div class="col-xs-12 col-sm-12 col-md-4">'+
                                                      '<div class="form-group">'+
                                                          '<p align="center" class="control-label" for="porcentajeParticipacion'+i+ '">Porcentaje de participación</p>'+
                                                          '<input type="number" min="0" max="100" class="form-control" id="porcentajeParticipacion'+i+ '" name="porcentajeParticipacion'+i+ '">'+
                                                      '</div>'+
                                                  '</div>'+
                                                  '<div class="col-xs-12 col-sm-12 col-md-4">'+
                                                      '<div class="form-group">'+
                                                          '<p align="center" class="control-label" for="ventasTotales'+i+ '">Ventas totales último año</p>'+
                                                          '<input type="number" min="0" class="form-control" id="ventasTotales'+i+ '" name="ventasTotales'+i+ '">'+
                                                      '</div>'+
                                                  '</div>'+
                                                  '<div class="col-xs-12 col-sm-12 col-md-2">'+
                                                  '</div>'+
                                              '</div>');
        i++;

      }
      
    });

    //FUNCION QUE HACE DINAMICO CUENTAS CORRIENTES
    $('#cantCuentaCorriente').on('change', function() {
      var cuentas = $(this).val();
      var i = 1;
      $("#divDatosCuentasCorrientes").empty();
      $("#divBotonListoCuentasCorriente").show();

      while (i <= cuentas){

        $("#divDatosCuentasCorrientes").append('<div class="row">'+
                                                '<h2 align="center">Cuenta corriente '+i+ '</h2>'+
                                                 '<div class="col-xs-12 col-sm-12 col-md-4">'+
                                                     '<div class="form-group">'+
                                                         '<p align="center" class="control-label" for="bancoCuentaCorriente'+i+ '">Banco cuenta corriente</p>'+
                                                         '<select class="form-control" id="bancoCuentaCorriente'+i+ '" name="bancoCuentaCorriente'+i+ '">'+
                                                          '<option hidden selected>Seleccione banco</option>'+
                                                          '<option value="Banco BBVA">Banco BBVA</option>'+
                                                          '<option value="Banco BCI">Banco BCI</option>'+
                                                          '<option value="Banco BICE">Banco BICE</option>'+
                                                          '<option value="Banco CORP Banca">Banco CORP Banca</option>'+
                                                          '<option value="Banco Consorcio">Banco Consorcio</option>'+
                                                          '<option value="Banco Coopeuch">Banco Coopeuch</option>'+
                                                          '<option value="Banco Estado">Banco Estado</option>'+
                                                          '<option value="Banco Falabella">Banco Falabella</option>'+
                                                          '<option value="Banco ITAÚ">Banco ITAÚ</option>'+
                                                          '<option value="Banco Internacional">Banco Internacional</option>'+
                                                          '<option value="Banco París">Banco París</option>'+
                                                          '<option value="Banco Ripley">Banco Ripley</option>'+
                                                          '<option value="Banco Santander/Banefe">Banco Santander/Banefe</option>'+
                                                          '<option value="Banco Security">Banco Security</option>'+
                                                          '<option value="Banco de Chile/Edwards/Credichile">Banco de Chile/Edwards/Credichile</option>'+
                                                          '<option value="Banco del Desarrollo">Banco del Desarrollo</option>'+
                                                          '<option value="HSBC Bank">HSBC Bank</option>'+
                                                          '<option value="Prepago Los Héroes">Prepago Los Héroes</option>'+
                                                          '<option value="Mutuaria">Mutuaria</option>'+
                                                         '</select>'+
                                                     '</div>'+
                                                 '</div>'+
                                                 '<div class="col-xs-12 col-sm-12 col-md-4">'+
                                                     '<div class="form-group">'+
                                                         '<p align="center" class="control-label" for="ejecutivoSucursalCuenta'+i+ '">Nombre ejecutivo(a) y sucursal cuenta corriente </p>'+
                                                         '<input type="text" class="form-control" id="ejecutivoSucursalCuenta'+i+ '" name="ejecutivoSucursalCuenta'+i+ '">'+
                                                     '</div>'+
                                                 '</div>'+
                                                 '<div class="col-xs-12 col-sm-12 col-md-4">'+
                                                     '<div class="form-group">'+
                                                         '<p align="center" class="control-label" for="saldoActualCuenta'+i+ '">Saldo actual cuenta corriente </p>'+
                                                         '<input type="number" class="form-control" min="0" id="saldoActualCuenta'+i+ '" name="saldoActualCuenta'+i+ '" >'+
                                                     '</div>'+
                                                 '</div>'+
                                               '</div>'+
                                               '<br>'+
                                               '<div class="row">'+
                                                   '<div class="col-xs-12 col-sm-12 col-md-2">'+
                                                   '</div>'+
                                                   '<div class="col-xs-12 col-sm-12 col-md-4">'+
                                                       '<div class="form-group">'+
                                                           '<p align="center" class="control-label" for="montoUtilizadoLinea'+i+ '">Monto utilizado línea de crédito cuenta corriente</p>'+
                                                           '<input type="number" class="form-control" min="0" id="montoUtilizadoLinea'+i+ '" name="montoUtilizadoLinea'+i+ '" >'+
                                                       '</div>'+
                                                  ' </div>'+
                                                  ' <div class="col-xs-12 col-sm-12 col-md-4">'+
                                                       '<div class="form-group">'+
                                                           '<p align="center" class="control-label" for="montoUtilizadoTarjeta'+i+ '">Monto utilizado tarjeta de crédito cuenta corriente </p>'+
                                                           '<input type="number" min="0" class="form-control" id="montoUtilizadoTarjeta'+i+ '" name="montoUtilizadoTarjeta'+i+ '">'+
                                                       '</div>'+
                                                   '</div>'+
                                                   '<div class="col-xs-12 col-sm-12 col-md-2">'+
                                                   '</div>'+
                                               '</div>');
        i++;

      }
      
    });

    //FUNCION QUE HACE DINAMICO CREDITOS CONSUMO
    $('#cantCreditoConsumo').on('change', function() {
      var creditosConsumo = $(this).val();
      var i = 1;
      $("#divDatosCreditoConsumo").empty();

      while (i <= creditosConsumo){

        $("#divDatosCreditoConsumo").append('<div class="row">'+
                                              '<h2 align="center">Credito de consumo '+i+ '</h2>'+
                                              '<div class="col-xs-12 col-sm-12 col-md-3">'+
                                                '<div class="form-group">'+
                                                  '<p align="center" class="control-label" for="bancoCreditoConsumo'+i+ '">Banco crédito de consumo</p>'+
                                                    '<select class="form-control" id="bancoCreditoConsumo'+i+ '" name="bancoCreditoConsumo'+i+ '">'+
                                                      '<option hidden selected>Seleccione banco</option>'+
                                                      '<option value="Banco BBVA">Banco BBVA</option>'+
                                                      '<option value="Banco BCI">Banco BCI</option>'+
                                                      '<option value="Banco BICE">Banco BICE</option>'+
                                                      '<option value="Banco CORP Banca">Banco CORP Banca</option>'+
                                                      '<option value="Banco Consorcio">Banco Consorcio</option>'+
                                                      '<option value="Banco Coopeuch">Banco Coopeuch</option>'+
                                                      '<option value="Banco Estado">Banco Estado</option>'+
                                                      '<option value="Banco Falabella">Banco Falabella</option>'+
                                                      '<option value="Banco ITAÚ">Banco ITAÚ</option>'+
                                                      '<option value="Banco Internacional">Banco Internacional</option>'+
                                                      '<option value="Banco París">Banco París</option>'+
                                                      '<option value="Banco Ripley">Banco Ripley</option>'+
                                                      '<option value="Banco Santander/Banefe">Banco Santander/Banefe</option>'+
                                                      '<option value="Banco Security">Banco Security</option>'+
                                                      '<option value="Banco de Chile/Edwards/Credichile">Banco de Chile/Edwards/Credichile</option>'+
                                                      '<option value="Banco del Desarrollo">Banco del Desarrollo</option>'+
                                                      '<option value="HSBC Bank">HSBC Bank</option>'+
                                                      '<option value="Prepago Los Héroes">Prepago Los Héroes</option>'+
                                                      '<option value="Mutuaria">Mutuaria</option>'+
                                                    '</select>'+
                                                '</div>'+
                                              '</div>'+
                                              '<div class="col-xs-12 col-sm-12 col-md-3">'+
                                                '<div class="form-group">'+
                                                  '<p align="center" class="control-label" for="montoTotalCredito'+i+ '">Monto total del crédito</p>'+
                                                  '<input type="number" class="form-control" min="0" id="montoTotalCredito'+i+ '" name="montoTotalCredito'+i+ '">'+
                                                '</div>'+
                                              '</div>'+
                                              '<div class="col-xs-12 col-sm-12 col-md-3">'+
                                                '<div class="form-group">'+
                                                  '<p align="center" class="control-label" for="valorCuotaMensualConsumo'+i+ '">Valor cuota mensual crédito </p>'+
                                                  '<input type="number" class="form-control" min="0" id="valorCuotaMensualConsumo'+i+ '" name="valorCuotaMensualConsumo'+i+ '">'+
                                                '</div>'+
                                              '</div>'+
                                              '<div class="col-xs-12 col-sm-12 col-md-3">'+
                                                '<div class="form-group">'+
                                                  '<p align="center" class="control-label" for="cuotasRestantesConsumo'+i+ '">Cuotas restantes crédito  </p>'+
                                                  '<input type="number" class="form-control" min="0" id="cuotasRestantesConsumo'+i+ '" name="cuotasRestantesConsumo'+i+ '">'+
                                                '</div>'+
                                              '</div>'+
                                            '</div>');
        i++;

      }
      
    });




  });

</script>


<script type="text/javascript">
  
  //funcion que toma datos perosnales y los guarda

  function guardarDatosPersonales(){

    fecha_nacimiento = $.trim($('#fechaNacimientoUsuario').val());
    primer_nombre = $.trim($('#PnombreUsuario').val());
    segundo_nombre = $.trim($('#SnombreUsuario').val());
    primer_apellido = $.trim($('#PapellidoUsuario').val());
    segundo_apellido = $.trim($('#SapellidoUsuario').val());
    rut = $.trim($('#rutUsuario').val());
    nacionalidad = $.trim($('#nacionalidadUsuario').val());
    id = $.trim($('#idUsuario').val());

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: 'personalesEss',
        type: 'GET',
        data: {
            "fecha_nacimiento": fecha_nacimiento,
            "primer_nombre": primer_nombre,
            "primer_apellido": primer_apellido,
            "segundo_apellido": segundo_apellido,
            "rut": rut,
            "nacionalidad": nacionalidad,
            "id": id,
            "segundo_nombre": segundo_nombre
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
        },
    });

  }



  //funcion que toma datos motivacion y los guarda

  function guardarDatosMotivacion(){

    motivacion = $('#motivacion').find(":selected").val();
    tipo_vivienda_inversion = $('#tipoViviendaInversion').find(":selected").val();
    cant_propiedades_inversion = $.trim($('#cantidadPropiedadesInversion').val());
    id = $.trim($('#idUsuario').val());

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: 'motivacionEss',
        type: 'GET',
        data: {
            "id": id,
            "motivacion": motivacion,
            "tipo_vivienda_inversion": tipo_vivienda_inversion,
            "cant_propiedades_inversion": cant_propiedades_inversion
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
        },
    });

  }


  //funcion que toma datos estudio y los guarda

  function guardarDatosEstudios(){

    rama = $('#ramaUsuario').find(":selected").val();
    fecha_ingreso = $.trim($('#fechaIngresoInstitucion').val());
    nivel_educacional = $('#nivelEducacionalUsuario').find(":selected").val();
    lugar_estudio = $.trim($('#lugarEstudio').val());
    titulo = $.trim($('#tituloUsuario').val());
    año_egreso = $.trim($('#añoEgreso').val());
    id = $.trim($('#idUsuario').val());

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: 'educacionEss',
        type: 'GET',
        data: {
            "id": id,
            "rama": rama,
            "fecha_ingreso": fecha_ingreso,
            "nivel_educacional": nivel_educacional,
            "lugar_estudio": lugar_estudio,
            "titulo": titulo,
            "año_egreso": año_egreso
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
        },
    });

  }


  function guardarDatosEstadoCivil(){

    estado_civil = $('#estadoCivil').find(":selected").val();
    dependientes_usuario = $.trim($('#dependientesUsuario').val());
    regimen_matrimonial = $('#regimenMatrimonial').find(":selected").val();
    pnombre_conyuge = $.trim($('#primerNombreConyuge').val());
    snombre_conyuge = $.trim($('#segundoNombreConyuge').val());
    apellidos_conyuge = $.trim($('#apellidosConyuge').val());
    rut_conyuge = $.trim($('#rutConyuge').val());
    fecha_nacimiento_conyuge = $.trim($('#fechaNacimientoConyuge').val());
    nacionalidad_conyuge = $.trim($('#nacionalidadConyuge').val());
    nivel_educacional_conyuge = $.trim($('#nivelEducacionalconyuge').val());
    ocupacion = $.trim($('#ocupacionConyuge').val());
    ingreso = $.trim($('#ingresoConyuge').val());
    id = $.trim($('#idUsuario').val());

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: 'estadoCivilEss',
        type: 'GET',
        data: {
            "id": id,
            "estado_civil": estado_civil,
            "dependientes_usuario": dependientes_usuario,
            "regimen_matrimonial": regimen_matrimonial,
            "pnombre_conyuge": pnombre_conyuge,
            "snombre_conyuge": snombre_conyuge,
            "rut_conyuge": rut_conyuge,
            "fecha_nacimiento_conyuge": fecha_nacimiento_conyuge,
            "nacionalidad_conyuge": nacionalidad_conyuge,
            "nivel_educacional_conyuge": nivel_educacional_conyuge,
            "ocupacion": ocupacion,
            "ingreso": ingreso,
            "apellidos_conyuge": apellidos_conyuge
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
        },
    });

  }


  function guardarDatosIngresos(){

    sueldo = $.trim($('#ingresosUsuario').val());
    ingresos_adicionales = $('#ingresosAdicionales').find(":selected").val();
    concepto_ingreso = $.trim($('#conceptoIngresoAdicional').val());
    total_adicional = $.trim($('#montoIngresoAdicional').val());
    id = $.trim($('#idUsuario').val());

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: 'ingresosEss',
        type: 'GET',
        data: {
            "id": id,
            "sueldo": sueldo,
            "ingresos_adicionales": ingresos_adicionales,
            "concepto_ingreso": concepto_ingreso,
            "total_adicional": total_adicional
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
        },
    });

  }

  function guardarDatosVehiculos(){

    cantidadVehiculos = $.trim($('#cantVehiculos').val());
    var arrayDatosVehiculos  = new Array();
    id = $.trim($('#idUsuario').val());

    if(cantidadVehiculos == ""){

      cantVehiculosRegistrados = $.trim($('#cantidadV').val());

    if (cantVehiculosRegistrados > 0){

      i=1;

      while(i <= cantVehiculosRegistrados){

            item = {}
            item ["id"] = $.trim($('#idVehiculo'+i+'').val());
            item ["marca_vehiculo"] = $.trim($('#marcaVehiculo'+i+'').val());
            item ["modelo_vehiculo"] = $.trim($('#modeloVehiculo'+i+'').val());
            item ["año_vehiculo"] = $.trim($('#añoVehiculo'+i+'').val());
            item ["patente_vehiculo"] = $.trim($('#patenteVehiculo'+i+'').val());
            item ["valor_vehiculo"] = $.trim($('#valorVehiculo'+i+'').val());

            arrayDatosVehiculos.push(item);
            i++;

      }

      i = 1;

    }


  }else{

    //valida que existan vahiculos y crea array con datos
    if (cantidadVehiculos > 0){

      i=1;

      while(i <= cantidadVehiculos){

            item = {}
            item ["id"] = "";
            item ["marca_vehiculo"] = $.trim($('#marcaVehiculo'+i+'').val());
            item ["modelo_vehiculo"] = $.trim($('#modeloVehiculo'+i+'').val());
            item ["año_vehiculo"] = $.trim($('#añoVehiculo'+i+'').val());
            item ["patente_vehiculo"] = $.trim($('#patenteVehiculo'+i+'').val());
            item ["valor_vehiculo"] = $.trim($('#valorVehiculo'+i+'').val());

            arrayDatosVehiculos.push(item);
            i++;

      }

      i = 1;

    }


  }


//
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: 'vehiculosEss',
        type: 'GET',
        data: {
            "id": id,
            "arrayDatosVehiculos": arrayDatosVehiculos
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
        },
    });

  }

  function guardarDatosInversion(){

    cantidadInversiones = $.trim($('#instrumentosInversion').val());
    var arrayDatosInstrumentosInversion  = new Array();
    id = $.trim($('#idUsuario').val());

    if(cantidadInversiones == ""){

      cantInversionesRegistradas = $.trim($('#cantidadI').val());

    if (cantInversionesRegistradas > 0){

      i=1;

      while(i <= cantInversionesRegistradas){

            item = {}
            item ["id"] = $.trim($('#idInstrumento'+i+'').val());
            item ["tipo"] = $.trim($('#tipoInstrumento'+i+'').val());
            item ["valor"] = $.trim($('#valorInstrumento'+i+'').val());

            arrayDatosInstrumentosInversion.push(item);
            i++;

      }

      i = 1;

    }


  }else{

    //valida que existan vahiculos y crea array con datos
    var arrayDatosInstrumentosInversion  = new Array();
    if (cantidadInversiones > 0){

      i=1;

      while(i <= cantidadInversiones){

            item = {}
            item ["id"] = "";
            item ["tipo"] = $.trim($('#tipoInstrumento'+i+'').val());
            item ["valor"] = $.trim($('#valorInstrumento'+i+'').val());

            arrayDatosInstrumentosInversion.push(item);
            i++;

      }

      i = 1;

    }


  }


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: 'inversionesEss',
        type: 'GET',
        data: {
            "id": id,
            "array": arrayDatosInstrumentosInversion
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


  }

  function guardarDatosParticipacion(){

    cantidadParticipaciones = $.trim($('#participacionEmpresa').val());
    var arrayDatosParticipacionEmpresas  = new Array();
    id = $.trim($('#idUsuario').val());

    if(cantidadParticipaciones == ""){

      cantParticipacionesRegistradas = $.trim($('#cantidadPa').val());

    if (cantParticipacionesRegistradas > 0){

      i=1;

      while(i <= cantParticipacionesRegistradas){

            item = {}
            item ["id"] = $.trim($('#idParticipacion'+i+'').val());
            item ["razon_social"] = $.trim($('#razonSocial'+i+'').val());
            item ["rut_sociedad"] = $.trim($('#rutSociedad'+i+'').val());
            item ["giro_sociedad"] = $.trim($('#giroSociedad'+i+'').val());
            item ["porcentaje_participacion"] = $.trim($('#porcentajeParticipacion'+i+'').val());
            item ["ventas_totales"] = $.trim($('#ventasTotales'+i+'').val());
            arrayDatosParticipacionEmpresas.push(item);
            i++;

      }

      i = 1;

    }


  }else{

    //valida que existan vahiculos y crea array con datos
    var arrayDatosParticipacionEmpresas  = new Array();
    if (cantidadParticipaciones > 0){

      i=1;

      while(i <= cantidadParticipaciones){

        item = {}
        item ["id"] = $.trim($('#idParticipacion'+i+'').val());
        item ["razon_social"] = $.trim($('#razonSocial'+i+'').val());
        item ["rut_sociedad"] = $.trim($('#rutSociedad'+i+'').val());
        item ["giro_sociedad"] = $.trim($('#giroSociedad'+i+'').val());
        item ["porcentaje_participacion"] = $.trim($('#porcentajeParticipacion'+i+'').val());
        item ["ventas_totales"] = $.trim($('#ventasTotales'+i+'').val());
        arrayDatosParticipacionEmpresas.push(item);
        i++;

      }

      i = 1;

    }


  }


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: 'participacionesEss',
        type: 'GET',
        data: {
            "id": id,
            "array": arrayDatosParticipacionEmpresas
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


  }


  function guardarDatosCuentaCorriente(){

    cantidadCuentaCorriente = $.trim($('#cantCuentaCorriente').val());
    var arrayDatosCuentasCorriente  = new Array();
    id = $.trim($('#idUsuario').val());

    if(cantidadCuentaCorriente == ""){

      cantCuentasCorrienteRegistradas = $.trim($('#cantidadCtaC').val());

    if (cantCuentasCorrienteRegistradas > 0){

      i=1;

      while(i <= cantCuentasCorrienteRegistradas){

            item = {}
            item ["id"] = $.trim($('#idCuentaCorriente'+i+'').val());
            item ["banco_cuenta_corriente"] = $('#bancoCuentaCorriente'+i+'').find(":selected").val();
            item ["nombre_ejecutivo_sucursal"] = $.trim($('#ejecutivoSucursalCuenta'+i+'').val());
            item ["saldo_actual"] = $.trim($('#saldoActualCuenta'+i+'').val());
            item ["monto_utilizado_linea"] = $.trim($('#montoUtilizadoLinea'+i+'').val());
            item ["monto_utilizado_tarjeta"] = $.trim($('#montoUtilizadoTarjeta'+i+'').val());
            arrayDatosCuentasCorriente.push(item);
            i++;

      }

      i = 1;

    }


  }else{

    //valida que existan vahiculos y crea array con datos
    var arrayDatosCuentasCorriente  = new Array();
    if (cantidadCuentaCorriente > 0){

      i=1;

      while(i <= cantidadCuentaCorriente){

        item = {}
        item ["id"] = "";
        item ["banco_cuenta_corriente"] = $('#bancoCuentaCorriente'+i+'').find(":selected").val();
        item ["nombre_ejecutivo_sucursal"] = $.trim($('#ejecutivoSucursalCuenta'+i+'').val());
        item ["saldo_actual"] = $.trim($('#saldoActualCuenta'+i+'').val());
        item ["monto_utilizado_linea"] = $.trim($('#montoUtilizadoLinea'+i+'').val());
        item ["monto_utilizado_tarjeta"] = $.trim($('#montoUtilizadoTarjeta'+i+'').val());
        arrayDatosCuentasCorriente.push(item);
        i++;

      }

      i = 1;

    }


  }


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: 'cuentaCorrienteEss',
        type: 'GET',
        data: {
            "id": id,
            "array": arrayDatosCuentasCorriente
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


  }


  function guardarDatosCreditoConsumo(){

    cantidadCreditoConsumo = $.trim($('#cantCreditoConsumo').val());
    var arrayDatosCreditoConsumo  = new Array();
    id = $.trim($('#idUsuario').val());

    if(cantidadCreditoConsumo == ""){

      cantidadCreditoConsumoRegistrado = $.trim($('#cantidadCreditoConsumoRegistrado').val());

    if (cantidadCreditoConsumoRegistrado > 0){

      i=1;

      while(i <= cantidadCreditoConsumoRegistrado){

            item = {}
            item ["id"] = $.trim($('#idCreditoConsumo'+i+'').val());
            item ["banco_credito_consumo"] = $('#bancoCreditoConsumo'+i+'').find(":selected").val();
            item ["monto_credito_consumo"] = $.trim($('#montoTotalCredito'+i+'').val());
            item ["valor_cuota_consumo"] = $.trim($('#valorCuotaMensualConsumo'+i+'').val());
            item ["cuotas_restantes_consumo"] = $.trim($('#cuotasRestantesConsumo'+i+'').val());
            arrayDatosCreditoConsumo.push(item);
            i++;

      }

      i = 1;

    }


  }else{

    //valida que existan vahiculos y crea array con datos
    var arrayDatosCreditoConsumo  = new Array();
    if (cantidadCreditoConsumo > 0){

      i=1;

      while(i <= cantidadCreditoConsumo){

        item = {}
        item ["id"] = "";
        item ["banco_credito_consumo"] = $('#bancoCreditoConsumo'+i+'').find(":selected").val();
        item ["monto_credito_consumo"] = $.trim($('#montoTotalCredito'+i+'').val());
        item ["valor_cuota_consumo"] = $.trim($('#valorCuotaMensualConsumo'+i+'').val());
        item ["cuotas_restantes_consumo"] = $.trim($('#cuotasRestantesConsumo'+i+'').val());
        arrayDatosCreditoConsumo.push(item);
        i++;

      }

      i = 1;

    }


  }


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: 'creditoConsumoEss',
        type: 'GET',
        data: {
            "id": id,
            "array": arrayDatosCreditoConsumo
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


  }


    function guardarDatosPropiedades(){

    cantidadPropiedades = $.trim($('#cantPropiedades').val());
    var arrayDatosPropiedades  = new Array();
    id = $.trim($('#idUsuario').val());

    if(cantidadPropiedades == ""){

      cantidadPropiedadesRegistrado = $.trim($('#cantidadPro').val());

    if (cantidadPropiedadesRegistrado > 0){

      i=1;

      while(i <= cantidadPropiedadesRegistrado){

            item = {}
            item ["id"] = $.trim($('#idPropiedad'+i+'').val());
            item ["tipo_propiedad"] = $('#tipoPropiedad'+i+'').find(":selected").val();
            item ["direccion_propiedad"] = $.trim($('#direccionPropiedad'+i+'').val());
            item ["comuna_propiedad"] = $.trim($('#comunaPropiedad'+i+'').val());
            item ["ciudad_propiedad"] = $.trim($('#ciudadPropiedad'+i+'').val());
            item ["rol_propiedad"] = $.trim($('#rolPropiedad'+i+'').val());
            item ["valor_propiedad"] = $.trim($('#valorPropiedad'+i+'').val());
            item ["propiedad_credito"] = $('#propiedadCredito'+i+'').find(":selected").val();

            if($('#propiedadCredito'+i+'').find(":selected").val() == "Si"){

              item ["banco_credito_propiedad"] = $('#bancoCredito'+i+'').find(":selected").val();
              item ["monto_credito_hipotecario"] = $.trim($('#montoCreditoHipotecario'+i+'').val());
              item ["valor_cuota_hipotecario"] = $.trim($('#valorCuotaMensulaHipotecario'+i+'').val());
              item ["cuotas_restantes_hipotecario"] = $.trim($('#cuotasRestantesHipotecario'+i+'').val());

            }else{

              item ["banco_credito_propiedad"] = "";
              item ["monto_credito_hipotecario"] = "";
              item ["valor_cuota_hipotecario"] = "";
              item ["cuotas_restantes_hipotecario"] = "";

            }

            arrayDatosPropiedades.push(item);
            i++;

      }

      i = 1;

    }


  }else{

    //valida que existan vahiculos y crea array con datos
    var arrayDatosPropiedades  = new Array();
    if (cantidadPropiedades > 0){

      i=1;

      while(i <= cantidadPropiedades){

        item = {}
        item ["id"] = "";
        item ["tipo_propiedad"] = $('#tipoPropiedad'+i+'').find(":selected").val();
        item ["direccion_propiedad"] = $.trim($('#direccionPropiedad'+i+'').val());
        item ["comuna_propiedad"] = $.trim($('#comunaPropiedad'+i+'').val());
        item ["ciudad_propiedad"] = $.trim($('#ciudadPropiedad'+i+'').val());
        item ["rol_propiedad"] = $.trim($('#rolPropiedad'+i+'').val());
        item ["valor_propiedad"] = $.trim($('#valorPropiedad'+i+'').val());
        item ["propiedad_credito"] = $('#propiedadCredito'+i+'').find(":selected").val();

        if($('#propiedadCredito'+i+'').find(":selected").val() == "Si"){

          item ["banco_credito_propiedad"] = $('#bancoCredito'+i+'').find(":selected").val();
          item ["monto_credito_hipotecario"] = $.trim($('#montoCreditoHipotecario'+i+'').val());
          item ["valor_cuota_hipotecario"] = $.trim($('#valorCuotaMensulaHipotecario'+i+'').val());
          item ["cuotas_restantes_hipotecario"] = $.trim($('#cuotasRestantesHipotecario'+i+'').val());

        }else{

          item ["banco_credito_propiedad"] = "";
          item ["monto_credito_hipotecario"] = "";
          item ["valor_cuota_hipotecario"] = "";
          item ["cuotas_restantes_hipotecario"] = "";

        }

        arrayDatosPropiedades.push(item);
        i++;

      }

      i = 1;

    }


  }


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: 'propiedadesEss',
        type: 'GET',
        data: {
            "id": id,
            "array": arrayDatosPropiedades
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


  }

  function propiedadCredito(numero){


    
    var validar = $('#propiedadCredito'+numero+'').find(":selected").val();

    if(validar == 'Si'){

      $("#divDatosHipotecarios"+numero).fadeIn('slow');

    }else{

      $("#divDatosHipotecarios"+numero).fadeOut();

    }
      


  }




</script>

<script type="text/javascript">
  
  //funciones que permitiran mostrar y cerar campos de edicion

  function desplegar_form_personal(){//informacion personal

    $("#divAntecedentesPersonales").fadeIn("slow");
    $("#divAntecedentesPersonalesLista").hide();
    $('#editarPersonal').hide();
    $('#verPersonal').show();

  }

  function desplegar_info_personal(){//informacion personal 

    $("#divAntecedentesPersonales").hide();
    $("#divAntecedentesPersonalesLista").fadeIn("slow");
    $('#verPersonal').hide();
    $('#editarPersonal').show();

  }

  function desplegar_form_motivacion(){//informacion motivacion

    $("#divMotivacionPorInvertir").fadeIn("slow");
    $("#divMotivacionPorInvertirLista").hide();
    $('#editarMotivacion').hide();
    $('#verMotivacion').show();

  }

  function desplegar_info_motivacion(){//informacion motivacion

    $("#divMotivacionPorInvertir").hide();
    $("#divMotivacionPorInvertirLista").fadeIn("slow");
    $('#verMotivacion').hide();
    $('#editarMotivacion').show();

  }

  function desplegar_form_estudio(){//informacion educacion

    $("#divEducacion").fadeIn("slow");
    $("#divEducacionLista").hide();
    $('#editarEstudio').hide();
    $('#verEstudio').show();

  }

  function desplegar_info_estudio(){//informacion educacion

    $("#divEducacion").hide();
    $("#divEducacionLista").fadeIn("slow");
    $('#verEstudio').hide();
    $('#editarEstudio').show();

  }

  function desplegar_form_estado_civil(){//informacion educacion

    $("#divCamposEstadoCivil").fadeIn("slow");
    $("#divEstadoCivilLista").hide();
    $('#editarEstadoCivil').hide();
    $('#verEstadoCivil').show();

  }

  function desplegar_info_estado_civil(){//informacion educacion

    $("#divCamposEstadoCivil").hide();
    $("#divEstadoCivilLista").fadeIn("slow");
    $('#verEstadoCivil').hide();
    $('#editarEstadoCivil').show();

  }

  function desplegar_form_ingresos(){//informacion ingresos

    $("#divIngresos").fadeIn("slow");
    $("#divIngresosLista").hide();
    $('#editarIngresos').hide();
    $('#verIngresos').show();

  }

  function desplegar_info_ingresos(){//informacion ingresos

    $("#divIngresos").hide();
    $("#divIngresosLista").fadeIn("slow");
    $('#verIngresos').hide();
    $('#editarIngresos').show();

  }

  function desplegar_form_vehiculos(){//informacion vehiculos

    $("#divEditarVehiculosLista").fadeIn("slow");
    $("#divVehiculosLista").hide();
    $('#editarVehiculos').hide();
    $('#verVehiculos').show();
    $('#divBotonListoVehiculo').show();

  }

  function desplegar_info_vehiculos(){//informacion vehiculos

    $("#divEditarVehiculosLista").hide();
    $("#divVehiculosLista").fadeIn("slow");
    $('#verVehiculos').hide();
    $('#editarVehiculos').show();
    $('#divBotonListoVehiculo').hide();
  }

  function desplegar_form_inversiones(){//informacion inversiones

    $("#divEditarInversionLista").fadeIn("slow");
    $("#divInversionesLista").hide();
    $('#editarInversiones').hide();
    $('#verInversiones').show();
    $('#divBotonListoInversion').show();

  }

  function desplegar_info_inversiones(){//informacion inversiones

    $("#divEditarInversionLista").hide();
    $("#divInversionesLista").fadeIn("slow");
    $('#verInversiones').hide();
    $('#editarInversiones').show();
    $('#divBotonListoInversion').hide();
  }

  function desplegar_form_participaciones(){//informacion inversiones

    $("#divEditarParticipacionesLista").fadeIn("slow");
    $("#divParticipacionesLista").hide();
    $('#editarParticipaciones').hide();
    $('#verParticipaciones').show();
    $('#divBotonListoParticipacion').show();

  }

  function desplegar_info_participaciones(){//informacion inversiones

    $("#divEditarParticipacionesLista").hide();
    $("#divParticipacionesLista").fadeIn("slow");
    $('#verParticipaciones').hide();
    $('#editarParticipaciones').show();
    $('#divBotonListoParticipacion').hide();
  }

  function desplegar_form_cuentas_corriente(){//informacion inversiones

    $("#divEditarCuentaCorrienteLista").fadeIn("slow");
    $("#divCuentasCorrienteLista").hide();
    $('#editarCuentasCorriente').hide();
    $('#verCuentasCorriente').show();
    $('#divBotonListoCuentasCorriente').show();

  }

  function desplegar_info_cuenta_corriente(){//informacion inversiones

    $("#divEditarCuentaCorrienteLista").hide();
    $("#divCuentasCorrienteLista").fadeIn("slow");
    $('#verCuentasCorriente').hide();
    $('#editarCuentasCorriente').show();
    $('#divBotonListoCuentasCorriente').hide();
  }

  function desplegar_form_credito_consumo(){//informacion inversiones

    $("#divEditarCreditoConsumoLista").fadeIn("slow");
    $("#divCreditoConsumoLista").hide();
    $('#editarCreditoConsumo').hide();
    $('#verCreditoConsumo').show();
    $('#divBotonListoCreditoConsumo').show();

  }

  function desplegar_info_credito_consumo(){//informacion inversiones

    $("#divEditarCreditoConsumoLista").hide();
    $("#divCreditoConsumoLista").fadeIn("slow");
    $('#verCreditoConsumo').hide();
    $('#editarCreditoConsumo').show();
    $('#divBotonListoCreditoConsumo').hide();
  }

  function desplegar_form_propiedades(){//informacion inversiones

    $("#divEditarPropiedadesListo").fadeIn("slow");
    $("#divPropiedadesLista").hide();
    $('#editarPropiedades').hide();
    $('#verPropiedades').show();
    $('#divBotonListoPropiedades').show();

  }

  function desplegar_info_propiedades(){//informacion inversiones

    $("#divEditarPropiedadesListo").hide();
    $("#divPropiedadesLista").fadeIn("slow");
    $('#verPropiedades').hide();
    $('#editarPropiedades').show();
    $('#divBotonListoPropiedades').hide();
  }

</script>

    <script>
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
        })
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.client-app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\inversiones\resources\views/client/tasks/form.blade.php ENDPATH**/ ?>