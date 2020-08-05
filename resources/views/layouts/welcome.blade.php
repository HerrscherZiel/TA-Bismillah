<!DOCTYPE html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sistem Informasi Kelas Proyek</title>

    <!-- Custom fonts for this template-->
    <link href="{{url('/')}}/asset/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="{{url('/')}}/asset/css/select2.min.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{url('/')}}/asset/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="{{url('/')}}/asset/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  </style>
  <style>
    img:hover {
    background-color: #4c85c7;
    }
    body {
    color: black;
    }
    button {
     width: 80%;
     height: 100%;
     align: center;
}  
</style>
</head>

<body class="bg-gradient-primary">


<div style="min-height: 100%; min-height: 100vh;display: flex; align-items: center;">
    <div class="container-fluid" style="padding: 0 0;">
    @if(request()->is('login'))
    @else
            <div class="col-1 text-center pb-2">
                <a href="/login">
                <i class="fa fa-lg fa-arrow-left" aria-hidden="true" style="transform: scale(2.1,1.5); color:white;"></i></a>
                <br>
            </div>
    @endif
        <div class="row text-center" style="padding: 0; background-color:white; margin: 0;">
                <div class="col-lg-6" style="padding:0px;  margin:auto;">
                <img class="img-fluid float-center" src="{{url('/')}}/asset/img/logos.jpg" style="width: 70%; height: auto; padding:0px; " alt="Responsive image">
                </div>
                <div class="col-lg-6" style="padding:0px; background-color:#d5e1f5;">
                @yield('content')
                <br>
                </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="{{url('/')}}/asset/vendor/jquery/jquery.min.js"></script>
<script src="{{url('/')}}/asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="{{url('/')}}/asset/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="{{url('/')}}/asset/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="{{url('/')}}/asset/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="{{url('/')}}/asset/js/demo/chart-area-demo.js"></script>
<script src="{{url('/')}}/asset/js/demo/chart-pie-demo.js"></script>
<script src="{{url('/')}}/asset/js/select2.min.js"></script>


<!-- Page level plugins -->
<script src="{{url('/')}}/asset/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="{{url('/')}}/asset/vendor/datatables/dataTables.bootstrap4.min.js"></script>


<!-- Page level custom scripts -->
{{--                <script src="{{url('/')}}/asset/js/demo/datatables-demo.js"></script>--}}

<script>




</script>
@stack('scripts')
</body>


</html>
