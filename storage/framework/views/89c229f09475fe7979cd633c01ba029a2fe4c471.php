<?php $__env->startSection('content'); ?>
    <!-- START Contact Section -->
    <section class="contact-section bg-white sp-100-70">
        <div class="container">
            <div class="row gap-y">
                <div class="col-12 col-md-6 offset-md-3 form-section">
                    <div class="col-12 col-md-10 bg-white px-30 py-45 rounded">
                        <div class="alert alert-<?php echo e($class); ?>">
                            <?php echo $messsage; ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END Contact Section -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.sass-app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/inversiones.tamed.global/public_html/dashboard/resources/views/saas/email-verification.blade.php ENDPATH**/ ?>