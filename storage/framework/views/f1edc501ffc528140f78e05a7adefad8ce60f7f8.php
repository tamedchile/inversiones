<?php $__env->startSection('content'); ?>


    <?php if(session('status')): ?>
        <div class="alert alert-success">
            <?php echo e(session('status')); ?>

        </div>
    <?php endif; ?>

    <form class="form-horizontal"  method="POST" action="<?php echo e(route('password.request')); ?>">
        <?php echo e(csrf_field()); ?>


        <input type="hidden" name="token" value="<?php echo e($token); ?>">

        <h3 >Reset Password</h3>

        <div class="form-group <?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
            <label for="email" class="col-xs-12 ">E-Mail Address</label>
            <div class="col-xs-12">
                <input id="email" type="email" class="form-control" name="email" value="<?php echo e($email ?? old('email')); ?>" required autofocus>

                <?php if($errors->has('email')): ?>
                    <span class="help-block">
                        <?php echo e($errors->first('email')); ?>

                    </span>
                <?php endif; ?>
            </div>
        </div>

        <div class="form-group <?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
            <label for="password" class="col-xs-12 ">Password</label>
            <div class="col-xs-12">
                <input id="password" type="password" class="form-control" name="password" required>

                <?php if($errors->has('password')): ?>
                    <span class="help-block">
                        <?php echo e($errors->first('password')); ?>

                    </span>
                <?php endif; ?>
            </div>
        </div>

        <div class="form-group <?php echo e($errors->has('password_confirmation') ? ' has-error' : ''); ?>">
            <label for="password-confirm" class="col-xs-12 ">Confirm Password</label>
            <div class="col-xs-12">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                <?php if($errors->has('password_confirmation')): ?>
                    <span class="help-block">
                        <?php echo e($errors->first('password_confirmation')); ?>

                    </span>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-group text-center m-t-20">
            <div class="col-xs-12">
                <button class="btn btn-primary btn-rounded btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Reset Password</button>
            </div>
        </div>

        <div class="form-group m-b-0">
            <div class="col-sm-12 text-center">
                <p><a href="<?php echo e(route('login')); ?>" class="text-primary m-l-5"><b><?php echo app('translator')->get('app.login'); ?></b></a></p>
            </div>
        </div>

    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/inversiones.tamed.global/public_html/dashboard/resources/views/auth/passwords/reset.blade.php ENDPATH**/ ?>