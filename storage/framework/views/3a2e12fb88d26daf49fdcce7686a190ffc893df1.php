<header class="header h-fullscreen" style="background-image: linear-gradient(150deg, #fdfbfb 0%, #eee 100%);">
    <div class="container-wide">

        <div class="row h-full align-items-center text-center text-lg-left">

            <div class="offset-1 col-10 col-lg-4 offset-lg-1">
                <h1><?php echo e($detail->header_title); ?></h1>
                <br>
                <p class="lead mx-auto"><?php echo e($detail->header_description); ?></p>
                <br>
                <?php if($detail->get_started_show == 'yes'): ?>
                    <a class="btn btn-lg btn-success" href="<?php echo e(route('front.signup.index')); ?>"><?php echo app('translator')->get('modules.frontCms.getStarted'); ?></a>
                <?php endif; ?>
                <?php if($detail->sign_in_show == 'yes'): ?>
                    <a class="btn btn-lg btn-info" href="<?php echo e(route('login')); ?>"><?php echo app('translator')->get('app.login'); ?></a>
                <?php endif; ?>
            </div>

            <div class="col-12 col-lg-6 offset-lg-1 img-outside-right hidden-md-down">
                <img class="shadow-4 mt-80" src="<?php echo e($detail->image_url); ?>" alt="...">
            </div>
        </div>

    </div>
</header>
<?php /**PATH /home/inversiones.tamed.global/public_html/dashboard/resources/views/front/section/header.blade.php ENDPATH**/ ?>