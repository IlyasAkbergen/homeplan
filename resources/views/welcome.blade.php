<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SMALL - Веб портал</title>
    <link rel="icon" type="image/png" href="favicon.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <div id="root">

    </div>
</div>
<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
