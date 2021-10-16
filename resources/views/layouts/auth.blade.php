
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>{{$title ?? config('app.name')}}</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{asset('skydash/vendors/feather/feather.css')}}">
  <link rel="stylesheet" href="{{asset('skydash/vendors/ti-icons/css/themify-icons.css')}}">
  <link rel="stylesheet" href="{{asset('skydash/vendors/css/vendor.bundle.base.css')}}">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{asset('skydash/css/vertical-layout-light/style.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{asset('skydash/images/favicon.png')}}" />
</head>

<body>
  <div class="container-scroller">
    @yield('content')
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="{{asset('skydash/vendors/js/vendor.bundle.base.js')}}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{asset('skydash/js/off-canvas.js')}}"></script>
  <script src="{{asset('skydash/hoverable-collapse.js')}}"></script>
  <script src="{{asset('skydash/template.js')}}"></script>
  <script src="{{asset('skydash/settings.js')}}"></script>
  <script src="{{asset('skydash/todolist.js')}}"></script>
  <!-- endinject -->
</body>

</html>
