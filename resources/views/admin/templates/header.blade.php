@php
  $getSetting = App\Models\Setting::getSetting();
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="{{ asset('uploads/setting/'.$getSetting->favicon) }}" rel="icon">
  <title>
      {{ !empty($getSetting->app_name) ? $getSetting->app_name : '' }}
      {{ !empty($getSetting->version) ? $getSetting->version : '' }}
  </title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="{{ asset('asset/plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('asset/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('asset/dist/css/adminlte.min.css') }}">
</head>
<body class="hold-transition login-page" style="background-image: url('{{ asset('uploads/bg/'.$getSetting->bg_image) }}');background-size:cover;">