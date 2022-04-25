<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>داشبرد ۲ | کنترل پنل مدیریت</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="admin_panel/dist/css/bootstrap-theme.css">
    <!-- Bootstrap rtl -->
    <link rel="stylesheet" href="admin_panel/dist/css/rtl.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="admin_panel/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="admin_panel/bower_components/Ionicons/css/ionicons.min.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="admin_panel/bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="admin_panel/dist/css/AdminLTE.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="admin_panel/dist/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">

@include('layouts.admin-header')
@include('layouts.sidebar')
    @yield('content')

    <div class="control-sidebar-bg"></div>
</body>
<script src="admin_panel/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="admin_panel/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="admin_panel/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="admin_panel/dist/js/adminlte.min.js"></script>
<!-- Sparkline -->
<script src="admin_panel/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap  -->
<script src="admin_panel/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="admin_panel/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll -->
<script src="admin_panel/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS -->
<script src="admin_panel/bower_components/Chart.js/Chart.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="admin_panel/dist/js/pages/dashboard2.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="admin_panel/dist/js/demo.js"></script>

</body>
</html>
