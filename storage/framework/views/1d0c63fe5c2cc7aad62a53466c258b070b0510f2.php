<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>جدول ها | کنترل پنل</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?php echo e(asset('admin_panel/dist/css/bootstrap-theme.css')); ?>">
    <!-- Bootstrap rtl -->
    <link rel="stylesheet" href="<?php echo e(asset('admin_panel/dist/css/rtl.css')); ?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo e(asset('admin_panel/bower_components/font-awesome/css/font-awesome.min.css')); ?>">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo e(asset('admin_panel/bower_components/Ionicons/css/ionicons.min.css')); ?>">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo e(asset('admin_panel/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')); ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo e(asset('admin_panel/dist/css/AdminLTE.css')); ?>">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo e(asset('admin_panel/dist/css/skins/_all-skins.min.css')); ?>">

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
    <!-- right side column. contains the logo and sidebar -->
   <?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <br>
                <br>

                <h1>لیست مشتریان</h1>
            </h1>
            <br>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> خانه</a></li>
                <li><a href="#">جدول</a></li>
                <li class="active">پیشرفته</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-4">
                    <form action="addcustomer" method="get">
                    <button type="submit" class="btn btn-block btn-primary btn-lg">اضافه کردن مشتری</button>
                    </form>
                </div>
                <br>
                <br>

                <div class="col-xs-12">

                    <!-- /.box -->

                    <div class="box">
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>شماره</th>
                                    <th>نام</th>
                                    <th>نام خانوادگی </th>
                                    <th>تلفن</th>
                                    <th> کد ملی</th>
                                    <th>بروز رسانی</th>
                                    <th>تاریخچه خرید</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $customerresults; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customerresult): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($customerresult->id); ?></td>
                                        <td><?php echo e($customerresult->name); ?></td>
                                        <td><?php echo e($customerresult->lname); ?></td>
                                        <td><?php echo e($customerresult->phone); ?></td>
                                        <td><?php echo e($customerresult->code); ?></td>
                                        <td> <button type="button" class="btn btn-info"> بروز رسانی  </button></td>
                                        <td>
                                            <a href="/customerorder/<?php echo e($customerresult->id); ?>">
                                                <button type="button" class="btn btn-primary"> تاریخچه مشتری </button>
                                            </a>
                                        </td>
                                     </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </tfoot>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
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
<script src="https://kit.fontawesome.com/3f3aebf6a2.js" crossorigin="anonymous"></script>
<!-- jQuery 3 -->
<script src="<?php echo e(asset('admin_panel/bower_components/jquery/dist/jquery.min.js')); ?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo e(asset('admin_panel/bower_components/bootstrap/dist/js/bootstrap.min.js')); ?>"></script>
<!-- DataTables -->
<script src="<?php echo e(asset('admin_panel/bower_components/datatables.net/js/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('admin_panel/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')); ?>"></script>
<!-- SlimScroll -->
<script src="<?php echo e(asset('admin_panel/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')); ?>"></script>
<!-- FastClick -->
<script src="<?php echo e(asset('admin_panel/bower_components/fastclick/lib/fastclick.js')); ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo e(asset('admin_panel/dist/js/adminlte.min.js')); ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo e(asset('admin_panel/dist/js/demo.js')); ?>"></script>
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
</body>
</html>
<?php /**PATH C:\xampp\htdocs\sales\Laravel Framework 9.6.0\resources\views/admin_panel/customer.blade.php ENDPATH**/ ?>