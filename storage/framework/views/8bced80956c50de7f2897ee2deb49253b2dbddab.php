<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>جدول ها | کنترل پنل</title>
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
    <!-- DataTables -->
    <link rel="stylesheet" href="admin_panel/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
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
<div class="wrapper">

<?php echo $__env->make('layouts.admin-header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- right side column. contains the logo and sidebar -->



    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <br>
                <br>

                <h1>اضافه کردن مشتریان</h1>
            </h1>
            <br>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> خانه</a></li>
                <li><a href="#">جدول</a></li>
                <li class="active">پیشرفته</li>
            </ol>
        </section>
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"> ورود اطلاعات مشتری</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->


        </div>
        <!-- Main content -->

        <!-- /.content -->

        <form action="/addcustomer" method="post">
            <?php echo csrf_field(); ?>
        <div class="container" style="background-color: #ffffff">
            <div class="row">
                <?php if($errors->any()): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>
                    <?php if(session('status')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>
                <div class="col-md-6">
                    <form role="form">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">نام</label>
                                <input name="name" type="text" class="form-control" id="exampleInputEmail1" placeholder="نام">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">نام خانوادگی</label>
                                <input name="lname" type="text" class="form-control" id="exampleInputEmail1" placeholder="نام خانوادگی">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">شماره تماس</label>
                                <input name="phone" type="text" class="form-control" id="exampleInputEmail1" placeholder="شماره تماس">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">کد ملی</label>
                                <input name="code" type="text" class="form-control" id="exampleInputEmail1" placeholder="شماره تماس">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">مبلغ ودیعه</label>
                                <input name="deposit" onkeyup="javascript:this.value=itpro(this.value);" type="text" class="form-control" id="exampleInputEmail1" placeholder="مبلغ ودیعه">
                            </div>
                            <div class="form-group">
                                <label>آدرس</label>
                                <textarea name="address" class="form-control" rows="3" placeholder="آدرس"></textarea>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">ارسال</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </form>
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer text-left">
    </footer>

    <!-- Control Sidebar -->

    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="admin_panel/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="admin_panel/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="admin_panel/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="admin_panel/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="admin_panel/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="admin_panel/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="admin_panel/admin_panel/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="admin_panel/dist/js/demo.js"></script>
<!-- page script -->
<script>
    $(function () {
        $('#example1').DataTable()
        $('#example2').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
        })
    })
</script>
<script>
    function itpro(Number)
    {
        Number+= '';
        Number= Number.replace(',', ''); Number= Number.replace(',', ''); Number= Number.replace(',', '');
        Number= Number.replace(',', ''); Number= Number.replace(',', ''); Number= Number.replace(',', '');
        x = Number.split('.');
        y = x[0];
        z= x.length > 1 ? '.' + x[1] : '';
        var rgx = /(\d+)(\d{3})/;
        while (rgx.test(y))
            y= y.replace(rgx, '$1' + ',' + '$2');
        return y+ z;
    }
</script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\sales\Laravel Framework 9.6.0\resources\views/admin_panel/addcustomer.blade.php ENDPATH**/ ?>