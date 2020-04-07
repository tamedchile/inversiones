<?php $__env->startSection('content'); ?>
    <!-- START Contact Section -->
    <section class="contact-section bg-white sp-100-70">
        <div class="container">

            <?php echo Form::open(['id'=>'contactUs', 'method'=>'POST']); ?>

            <br>
            <div class="row">
                <div class="alert col-md-12 text-center" id="alert">

                </div>
            </div>

            <div class="row" id="contactUsBox">
                <div class="form-group mb-4 col-lg-6 col-12">
                    <input type="text" name="name" class="form-control" placeholder="<?php echo app('translator')->get('modules.profile.yourName'); ?>"
                           id="name">
                </div>
                <div class="form-group mb-4 col-lg-6 col-12">
                    <input type="email" class="form-control" placeholder="<?php echo app('translator')->get('modules.profile.yourEmail'); ?>"
                           name="email" id="email">
                </div>
                <div class="form-group mb-4 col-12">
                            <textarea rows="6" name="message" class="form-control br-10"
                                      placeholder="<?php echo app('translator')->get('modules.messages.message'); ?>"
                                      id="message"></textarea>
                </div>
                <div class="g-recaptcha" data-sitekey="<?php echo e($global->google_recaptcha_key); ?>"></div>
                <br>
                <div class="col-12">
                    <button type="button" class="btn btn-lg btn-custom mt-1" id="contact-submit">
                        <?php echo e($frontMenu->contact_submit); ?>

                    </button>
                </div>
            </div>
            <?php echo Form::close(); ?>


        </div>
    </section>
    <!-- END Contact Section -->
<?php $__env->stopSection(); ?>
<?php $__env->startPush('footer-script'); ?>
    <script>
        $('#contact-submit').click(function () {

            <?php if(!is_null($global->google_recaptcha_key)): ?>
            if (grecaptcha.getResponse().length == 0) {
                alert('Please click the reCAPTCHA checkbox');
                return false;
            }
            <?php endif; ?>

            $.easyAjax({
                url: '<?php echo e(route('front.contact-us')); ?>',
                container: '#contactUs',
                type: "POST",
                data: $('#contactUs').serialize(),
                messagePosition: "inline",
                success: function (response) {
                    if (response.status === 'success') {
                        $('#contactUsBox').remove();
                    }
                }
            })
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.sass-app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/inversiones.tamed.global/public_html/dashboard/resources/views/saas/contact.blade.php ENDPATH**/ ?>