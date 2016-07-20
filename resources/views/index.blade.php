<!DOCTYPE html>
<html ng-app="rpg">
  <head>
    <meta charset="utf-8">
    <title>RPGi</title>
    <link rel="stylesheet" type="text/css" href="/glyphter/css/rpg.css">
    <link rel="stylesheet" type="text/css" href="/vendor/Materialize/dist/css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="/vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/vendor/dropzone/dist/min/dropzone.min.css">
    <link rel="stylesheet" href="/css/custom.css" charset="utf-8">
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  </head>
  <body ng-controller="RpgController as RPG">
    <section id="container" data-token="{{{ csrf_token() }}}">
      <div ng-view></div>
    </section>
  </body>
  <script type="text/javascript" src="/vendor/jquery/dist/jquery.min.js"></script>
  <script type="text/javascript" src="/vendor/Materialize/dist/js/materialize.min.js"></script>
  <script type="text/javascript" src="/vendor/dropzone/dist/min/dropzone.min.js"></script>
  <script type="text/javascript" src="/vendor/angular/angular.min.js"></script>
  <script type="text/javascript" src="/vendor/angular-resource/angular-resource.min.js"></script>
  <script type="text/javascript" src="/vendor/angular-route/angular-route.min.js"></script>
  <script type="text/javascript" src="/vendor/angular-animate/angular-animate.min.js"></script>
  <!-- <script type="text/javascript" src="/vendor/angular-flash-alert/dist/angular-flash.min.js"></script> -->
  <script type="text/javascript" src="/js/angular-fullscreen.js"></script>
  <script type="text/javascript" src="/js/app.js"></script>
  <script type="text/javascript" src="/js/controllers/RpgController.js"></script>
  <script type="text/javascript" src="/js/controllers/UserController.js"></script>
  <script type="text/javascript" src="/js/controllers/DashController.js"></script>
  <script type="text/javascript" src="/js/controllers/FileController.js"></script>
</html>
