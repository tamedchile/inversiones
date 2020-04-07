<?php $__env->startSection('content'); ?>
<style media="screen">
#auth-logo {
  padding: 0% 11% 0%;
  background: #fff !important;
  display: block;
  margin: 14% auto -14px;
}
#auth-form {
    max-width: 80%;
    margin: 9% auto 25%;
}
</style>
    <form class="form-horizontal form-material" id="loginform" action="<?php echo e(route('front.signup.store')); ?>" method="POST">
        <?php echo e(csrf_field()); ?>



        <div class="form-group m-t-20">
            <div class="col-xs-12">
                <input class="form-control" type="text" id="pnombre" name="pnombre" required  autofocus placeholder="Tu nombre">
            </div>
        </div>
        <div class="form-group m-t-20">
            <div class="col-xs-12">
                <input class="form-control" type="text" id="papellido" name="papellido" required  autofocus placeholder="Tu apellido">
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-12">
                <input class="form-control" type="email"  name="email" id="email" required placeholder="Tu correo electrónico">
            </div>
        </div>
        <div class="form-group">
          <div class="col-xs-12">
            <input type="text" name="company_name" id="company_name" placeholder="Institución o empresa" class="form-control" required>
          </div>
        </div>
        <div class="form-group ">
            <div class="col-xs-12">
                <input class="form-control" type="password" id="password" name="password" required placeholder="Contraseña">
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-12">
                <input class="form-control" id="password-confirm" name="password_confirmation" type="password" required placeholder="Confirmar contraseña">
            </div>
        </div>
        <div class="form-group text-center m-t-20" >
            <div class="col-xs-12" style="margin-top: 14px;">
                <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Regístrate</button>
            </div>
        </div>
        <div class="form-group m-b-0">
            <div class="col-sm-12 text-center">
                <p>¿Ya estás registrado? <a href="<?php echo e(route('login')); ?>" class="text-primary m-l-5"><b>Iniciar sesión</b></a></p>
            </div>
        </div>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/inversiones.tamed.global/public_html/dashboard/resources/views/auth/register.blade.php ENDPATH**/ ?>