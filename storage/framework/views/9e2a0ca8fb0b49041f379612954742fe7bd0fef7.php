<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.png">
    <title>403 - <?php echo app('translator')->get('app.forbiddenError'); ?></title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo e(asset("bootstrap/dist/css/bootstrap.min.css")); ?>" rel="stylesheet">
    <!-- animation CSS -->
    <link href="<?php echo e(asset("css/animate.css")); ?>" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo e(asset("css/style.css")); ?>" rel="stylesheet">
    <!-- color CSS -->
    <link href="<?php echo e(asset("css/colors/default-dark.css")); ?>" id="theme"  rel="stylesheet">
    <link href="<?php echo e(asset("css/custom.css")); ?>"  rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
<!-- Preloader -->
<div class="preloader">
    <div class="cssload-speeding-wheel"></div>
</div>
<section id="wrapper" class="error-page">
    <div class="error-box">
        <div class="error-body text-center">
            <h1>403</h1>
            <h3 class="text-uppercase"><?php echo app('translator')->get('app.forbiddenError'); ?></h3>
            <p class="text-muted m-t-30 m-b-30 text-uppercase"><?php echo app('translator')->get('app.noPermission'); ?></p>
            <a href="<?php echo e(url('/login')); ?>" class="btn btn-info btn-rounded waves-effect waves-light m-b-40"><?php echo app('translator')->get('app.back'); ?> <?php echo app('translator')->get('app.to'); ?> <?php echo app('translator')->get('app.menu.home'); ?></a> </div>
        <footer class="footer text-center"><?php echo e(\Carbon\Carbon::today()->year); ?></footer>
    </div>
</section>
<!-- jQuery -->
<script src="<?php echo e(asset('plugins/bower_components/jquery/dist/jquery.min.js')); ?>"></script>
<!-- Bootstrap Core JavaScript -->
<script src="<?php echo e(asset("bootstrap/dist/js/bootstrap.min.js")); ?>"></script>
<!-- Custom Theme JavaScript -->
<script src="<?php echo e(asset("js/custom.min.js")); ?>"></script>

</body>
</html><?php /**PATH D:\laragon\www\inversiones\resources\views/errors/403.blade.php ENDPATH**/ ?>