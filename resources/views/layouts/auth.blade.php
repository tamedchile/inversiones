<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('favicon/apple-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('favicon/apple-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('favicon/apple-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('favicon/apple-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('favicon/apple-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('favicon/apple-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('favicon/apple-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('favicon/apple-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/apple-icon-180x180.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('favicon/android-icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('favicon/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('favicon/manifest.json') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ asset('favicon/ms-icon-144x144.png') }}">
    <meta name="theme-color" content="#ffffff">

    <title>{{ $setting->company_name }}</title>

    <link href="{{ asset('bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('less/icons/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('css/auth.css') }}" rel="stylesheet">
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

    <style>
        #background-section {
            background: url("{{ $setting->login_background_url }}") center center/cover no-repeat !important;
        }
        #auth-logo {
            background: {{ $setting->logo_background_color }};
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
            <img src="{{ $setting->logo_url }}" style="max-height: 50px" alt="Logo" />
        </div>

        <div id="auth-form">


            @yield('content')

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

<script src="{{ asset('plugins/bower_components/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src='https://www.google.com/recaptcha/api.js'></script>

</body>
</html>
