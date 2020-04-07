<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo e(asset('favicon/apple-icon-57x57.png')); ?>">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo e(asset('favicon/apple-icon-60x60.png')); ?>">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo e(asset('favicon/apple-icon-72x72.png')); ?>">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo e(asset('favicon/apple-icon-76x76.png')); ?>">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo e(asset('favicon/apple-icon-114x114.png')); ?>">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo e(asset('favicon/apple-icon-120x120.png')); ?>">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo e(asset('favicon/apple-icon-144x144.png')); ?>">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo e(asset('favicon/apple-icon-152x152.png')); ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo e(asset('favicon/apple-icon-180x180.png')); ?>">
    <link rel="icon" type="image/png" sizes="192x192" href="<?php echo e(asset('favicon/android-icon-192x192.png')); ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo e(asset('favicon/favicon-32x32.png')); ?>">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo e(asset('favicon/favicon-96x96.png')); ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo e(asset('favicon/favicon-16x16.png')); ?>">
    <link rel="manifest" href="<?php echo e(asset('favicon/manifest.json')); ?>">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?php echo e(asset('favicon/ms-icon-144x144.png')); ?>">
    <meta name="theme-color" content="#ffffff">

    <title><?php echo e($setting->company_name); ?></title>

    <link href="<?php echo e(asset('bootstrap/dist/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('less/icons/font-awesome/css/font-awesome.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/auth.css')); ?>" rel="stylesheet">
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>;
    </script>

    <style>
        #background-section {
            background: url("<?php echo e($setting->login_background_url); ?>") center center/cover no-repeat !important;
        }
        #auth-logo {
            background: <?php echo e($setting->logo_background_color); ?>;
        }
        .row.centrado {
            display: block;
            margin: 0 auto;
            top: 20%;
            position: relative;
        }
        .titulo {
            font-size: 36px;
            color: #fff;
            margin: 0 80px;
            text-align: center;
            font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
            font-weight: 500;
        }
        .contenido {
            font-size: 16px;
            line-height: 1.5;
            color: #fff;
            margin: 10px 114px;
            text-align: center;
            font-weight: 100;
            font-family: inherit;
        }
    </style>

</head>
<body>

<div class="container-fluid">
  <div class="row">
    <div class="col-xs-12 col-lg-4" id="form-section">
        <div id="auth-logo">
            <img src="<?php echo e($setting->logo_url); ?>" style="max-height: 50px" alt="Logo" />
        </div>

        <div id="auth-form">


            <?php echo $__env->yieldContent('content'); ?>

        </div>
    </div>

    <div class="col-lg-8 visible-lg" id="background-section2">
      <div class="row centrado">
        <div class="titulo">
                Compra tu siguiente propiedad de manera inteligente
        </div>
        <div class="contenido">
          Digitalizamos el proceso de adquisición inmobiliaria y logramos las mejores
           condiciones que puedas obtener. Desde la evaluación de tu capacidad crediticia,
           hasta la entrega de tu propiedad. Invierte seguro, eficiente y convenientemente.
        </div>
      </div>

    </div>
  </div>
</div>

<script src="<?php echo e(asset('plugins/bower_components/jquery/dist/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('bootstrap/dist/js/bootstrap.min.js')); ?>"></script>
<script src='https://www.google.com/recaptcha/api.js'></script>

</body>
</html>
<?php /**PATH /home/inversiones.tamed.global/public_html/dashboard/resources/views/layouts/auth.blade.php ENDPATH**/ ?>