
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{csrf_token()}}">

<!-- CSS only -->
<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
<link rel="stylesheet" href="{{asset('fontawesome-free/css/all.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->


 <!-- Sweet Alert -->

 <style>
  .p-body{
      padding: 50px;
  }
  .btn-place {
    display: inline;
  }
  #exTab2 h3{
    color: white;
    background-color: #428bca;
    padding: 5px 15px;
  }
  /* .error {
    border: 1px solid;
    margin: 10px 0px;
    padding: 15px 10px 15px 50px;
    background-position: 10px center;
    color: #D8000C;
    background-color: #FFBABA;
    width: 50%;
  } */
  .errors {
    padding-top: 10px;
  }
</style>
</head>
<body class="hold-transition sidebar-mini">
{{-- <div class="wrapper"> --}}




    {{-- 2. Left Menu --}}
    @include('layouts.leftmenu')

    {{-- 3.Main Content(Body) --}}

  {{-- <div class="content-wrapper"> --}}
    <!-- Main content -->

  {{-- </div> --}}

{{-- </div> --}}
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<!-- JavaScript Bundle with Popper -->
<script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js" integrity="sha512-2rNj2KJ+D8s1ceNasTIex6z4HWyOnEYLVC3FigGOmyQCZc2eBXKgOxQmo3oKLHyfcj53uz4QMsRCWNbLd32Q1g=="
   crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
 crossorigin="anonymous"></script>
<!-- JavaScript Bundle with Popper -->

</body>
@yield('script')
</html>
