<!DOCTYPE HTML>
<html lang="en">
<head>
  <meta charset="utf-8">
	<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> 
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <link href="{{asset('/assets/succ/css/style.css')}}" rel="stylesheet" type="text/css"/>
  <link rel="icon" type="image/x-icon" href="{{url('assets/succ/images/Group 787.png')}}">
  <title>Thalir Natural Solutions</title>

 
  <meta name="description" content="SignUpCasuals - Online Shopping Site">
  <meta name="keywords" content="SignUpCasuals, SIGN UP CASUALS">

  <title>{{config('app.name', 'SignUpCasualWear')}} @if(isset($title)) - {{$title}}@endif</title>

  <link href="{{asset('/assets/succ/css/mystyle.css')}}" rel="stylesheet" type="text/css"/>


   <!-- jQuery -->
   <script src="{{asset('/assets/suc/js/jquery-2.0.0.min.js')}}" type="text/javascript"></script>
 
  <!-- Toastr -->
  <link rel="stylesheet" href="{{asset('plugins/toastr/toastr.min.css')}}">
  <script src="{{asset('plugins/toastr/toastr.min.js')}}"></script>

      <!-- toasty.js plugin files: -->
      <link href="{{asset('/dist/snackbar.min.css')}}" rel="stylesheet"/>
      <script src="{{asset('/dist/snackbar.min.js')}}" type="text/javascript"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Font awesome 5 -->
    <link href="{{asset('/assets/suc/fonts/fontawesome/css/all.min.css?v=2.0')}}" type="text/css" rel="stylesheet">
  <!-- ----  -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head>
<body style="">

  @yield('header')

  <!-- footer section  -->
  <a href="//wa.me/9947612712" class="floats" target="_blank">
    <i class="fa fa-whatsapp my-floats"></i>
  </a>
</body>
</html>

<script>
window.onpageshow = function(event) {
    if (event.persisted) {
        // Page was loaded from cache
        location.reload(true);
    }
};
</script>
