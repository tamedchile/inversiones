<section class="section bg-img" id="section-contact" style="background-image: url(<?php echo e(asset('front/img/bg-cup.jpg')); ?>)" data-overlay="8">
    <div class="container">
        <div class="row gap-y">

            <div class="col-12 col-md-6">
                <?php echo Form::open(['id'=>'contactUs','class'=>'row', 'method'=>'POST']); ?>

                    <div class="col-12 col-md-10 offset-md-1 bg-white px-30 py-45 rounded">
                        <p id="alert"></p>
                        <div id="contactUsBox">
                            <div class="form-group">
                                <input class="form-control form-control-lg" type="text" name="name" placeholder="<?php echo app('translator')->get('modules.profile.yourName'); ?>">
                            </div>

                            <div class="form-group">
                                <input class="form-control form-control-lg" type="email" name="email" placeholder="<?php echo app('translator')->get('modules.profile.yourEmail'); ?>">
                            </div>

                            <div class="form-group">
                                <textarea class="form-control form-control-lg" rows="4" placeholder="<?php echo app('translator')->get('modules.messages.message'); ?>" name="message"></textarea>
                            </div>

                            <div class="g-recaptcha" data-sitekey="<?php echo e($global->google_recaptcha_key); ?>"></div>
                            <br>

                            <button class="btn btn-lg btn-block btn-primary " type="button" id="save-form"><?php echo app('translator')->get('modules.frontCms.submitEnquiry'); ?></button>
                        </div>


                    </div>
                <?php echo Form::close(); ?>

            </div>

            <div class="col-12 col-md-4 offset-md-1 text-inverse pt-40">
                <h6><?php echo app('translator')->get('app.address'); ?></h6>
                <p><?php echo e($detail->address); ?></p>
                <?php if($detail->phone): ?>
                    <br>
                    <h6><?php echo app('translator')->get('app.phone'); ?></h6>
                    <p><?php echo e($detail->phone); ?></p>
                <?php endif; ?>
                <br>
                <h6><?php echo app('translator')->get('app.email'); ?></h6>
                <p><?php echo e($detail->email); ?></p>
            </div>

        </div>
    </div>
</section>
<?php /**PATH /home/inversiones.tamed.global/public_html/dashboard/resources/views/front/section/contact.blade.php ENDPATH**/ ?>