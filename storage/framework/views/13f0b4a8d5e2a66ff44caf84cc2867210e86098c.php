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
                        <div class="col-md-7" style="padding: 100px">
                          <h3 class="default-title">¡Excelente! Has terminado el primer paso.</h3>
                          <p class="m-t-15">Ahora vamos a evaluar tu capacidad crediticia. Iniciarás
                             una encuesta que te permitirá saber, preliminarmente,
                             cuántas UF podemos conseguir para lograr tu objetivo.
                          </p>
                          
                        </div>

                    </div>
                    <div class="wizard">
                      <ul class="nav nav-tabs">
                          <li class="<?php if( $user->tareas($user->id) < 3 ): ?> active <?php endif; ?>">
                              <a href="#tab_domain_business_email" data-toggle="tab" aria-expanded="false">
                                  <img src="<?php echo e(asset('img/form.png')); ?>" alt="">
                                  <span>Diligencia el formulario de EESS</span>
                              </a>
                          </li>
                          <li class="">
                              <a href="#tab_business_website" data-toggle="tab" aria-expanded="false">
                                <img src="<?php echo e(asset('img/folder.png')); ?>" alt="">
                                <span>Subir documentos</span>
                              </a>
                          </li>
                      </ul>
                      <div class="tab-content box-items">
                          <div class="tab-pane <?php if($clientDetail->pnombre == '' || $clientDetail->snombre == '' || $clientDetail->papellido == ''|| $clientDetail->sapellido == '' || $clientDetail->mobile == '' || $clientDetail->company_name == '' || $clientDetail->address == '' || $clientDetail->rut == '' || $clientDetail->fnacimiento == '' || $clientDetail->comuna == '' || $clientDetail->ciudad == '' || $clientDetail->fijo == '' || $clientDetail->cuentabancaria == '' || $clientDetail->banco == '' || $clientDetail->tipocuentabancaria == ''): ?> active  <?php endif; ?>" id="tab_tax">
                              <div class="item open" id="js_item_box_9">
                                  <div class="item-heading">
                                      <span class="title">Algunos de los datos e tu perfil aún no han sido diligenciados</span>
                                      <span class="explain pull-right">You chose this selection with your order.</span>
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
                                                  <a href="<?php echo e(route('client.profile.index')); ?>" id="toggle_schedule_tax_btn" class="btn btn-green btn-block m-b-20 m-t-30 text-uppercase">
                                                      Completar datos
                                                  </a>

                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>

                          <div class="tab-pane <?php if( $user->tareas($user->id) < 3 ): ?> active <?php endif; ?>" id="tab_domain_business_email">
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
                                                  <h4 class="m-b-30">The Standard Package Includes:</h4>
                                                  <ul class="list-unstyled package-includes">
                                                      <li class="developer">
                                                          <div class="t">Website built by Professional Developers</div>
                                                          <p>
                                                              Choose from over 20 custom website designs and get them customized to your liking from our experienced designers.
                                                          </p>
                                                      </li>
                                                      <li class="revisions">
                                                          <div class="t">Unlimited Revisions</div>
                                                          <p>You can request as many changes as you like until the design is finalized. Our team will work with you until you are fully satisfied.</p>
                                                      </li>
                                                      <li class="hosting">
                                                          <div class="t">Reliable Hosting</div>
                                                          <p>Our platform is built upon Amazon's AWS cloud service, providing our customers extreme reliability and uptime even when there is a huge spike in website visitors.</p>
                                                      </li>
                                                      <li class="website-domain">
                                                          <div class="t">Free Website Domain (Annual Subscribers)</div>
                                                          <p>
                                                              If you're an Annual Subscribers, you will be given the choice to select a free domain which will also renewed each year if you keep on hosting with Snapweb.com
                                                          </p>
                                                      </li>
                                                      <li class="email-setup">
                                                          <div class="t">Assistance with Email Setup</div>
                                                          <p>Our team will assist with setting up your email account so that it works with your domain. *(Email package needs to be purchased from a reputed email provider.)</p>
                                                      </li>
                                                  </ul>
                                              </div>
                                              <div class="col-lg-6 right">
                                                  <p class="m-tlg-50 text-center">
                                                      <img src="/static/order/dashboard//img/action_items/snipermonkey-logo.png" alt="">
                                                  </p>
                                                  <p class="m-t-30">Fill out your intake form as the next step in receiving your business website.</p>
                                                  <a href="javascript:void(0)" class="btn btn-green btn-block m-t-b-40 text-uppercase" style="white-space: inherit;">
                                                    Subir documentos
                                                  </a>
                                                  <p class="bold">
                                                      <span>All websites are subject to snapweb.com’s $20/month hosting rate.</span>
                                                      <span class="m-t-20" style="display: block">
                                                          Pay $0 with your waived setup fee (regularly $499) included with your Platinum package purchase.
                                                        </span>
                                                  </p>
                                                  <hr class="m-t-b-35" style="margin-left: 0; margin-right: 0">
                                                  <div>
                                                      <div class="checkbox checkbox-default">
                                                          <input type="checkbox" class="no_longer" id="chk_no_longer_require_website" value="toggle_business_website_btn">
                                                          <label for="chk_no_longer_require_website">I no longer require a business website.</label>
                                                      </div>
                                                      <div class="clearfix"></div>
                                                      <button onclick="ActionItemComponent.noLonger(3, 'Snapweb')" class="btn btn-round btn-green btn-xs m-t-15 hide" style="padding:8px 25px">Confirm</button>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="clearfix"></div>
                      </div>
                  </div>
                </div><!-- /tabs -->
            </section>
        </div>


    </div>
    <!-- .row -->

<?php $__env->stopSection(); ?>

<?php $__env->startPush('footer-script'); ?>
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