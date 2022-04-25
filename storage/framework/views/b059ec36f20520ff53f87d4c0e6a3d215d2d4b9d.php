
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

    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">

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

                <h1>تاریخچه خرید جناب آقای <?php echo e($customersinfo->name); ?></h1>
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
                    <form action="/addorders" method="get">
                        <button type="submit" class="btn btn-block btn-primary btn-lg">اضافه کردن سفارش</button>
                        <input name="customer" type="text" value="<?php echo e($customersinfo->id); ?>" style="display: none">
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
                                    <th>قیمت</th>
                                    <th>درصد تخفیف</th>
                                    <th>قیمت بعد از اعمال تخفیف </th>
                                    <th>تسویه نقدی</th>
                                    <th>وضعیت ودیعه</th>

                                    <th>نام بانک</th>
                                    <th>نوع پرداخت</th>
                                    <th>وضعیت اعلام به واحد مالی</th>
                                    <th>وضعیت وصولی </th>
                                    <th>تاریخ خرید</th>
                                    <th> زمان خرید</th>
                                    <th>وضعیت مالیاتی </th>

                                    <th> جزئیات فاکتور </th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($comment->id); ?></td>
                                        <td class="money"><?php echo e($comment->mount); ?></td>

                                        <td><?php echo e($comment->discount); ?>%</td>
                                        <td class="money"><?php echo e($comment->afterdiscount); ?></td>
                                        <td class="money"><?php echo e($comment->cashpay); ?></td>
                                        <?php if($res2<0): ?>
                                            <td style="text-align: center!important;font-size: 20px"><i style="color: orangered" class="fa fa-exclamation-triangle" aria-hidden="true"></i></td>
                                        <?php else: ?>
                                            <td style="text-align: center!important;font-size: 20px"><i style="color: green" class="fa fa-check-square" aria-hidden="true"></i></td>
                                        <?php endif; ?>

                                        <td><?php echo e($comment->bank); ?></td>
                                        <?php if($comment->cash== 1): ?>
                                            <td >پرداخت نقدی</td>
                                        <?php else: ?>
                                            <td>پرداخت چکی</td>
                                        <?php endif; ?>
                                        <?php if($comment->announced== 1): ?>
                                            <td >اعلام شده</td>
                                        <?php else: ?>
                                            <td>اعلام نشده</td>
                                        <?php endif; ?>
                                        <?php if($comment->recovery== 1): ?>
                                            <td > وصول شده</td>
                                        <?php else: ?>
                                            <td> وصول نشده</td>
                                        <?php endif; ?>
                                        <td>
                                            <?php echo e($comment->data); ?>

                                        </td>
                                        <td><?php echo e($comment->time); ?></td>

                                        <?php if($comment->tax== 1): ?>
                                            <td  style="background-color: #e5ffb0;border: solid grey 1px"></td>
                                        <?php else: ?>
                                            <td  style="background-color: #ffd9df;border: solid grey 1px""></td>
                                        <?php endif; ?>

                                        <td>
                                            <a href="/editorder/<?php echo e($comment->id); ?>">
                                                <button type="button" class="btn btn-info">  جزعیات فاکتور </button>
                                            </a>
                                        </td>
                                    </tr>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </tfoot>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <div class="row col-md-6">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">مجموع کل</th>
                                <th scope="col">مانده تسویه</th>
                                <th>وضعیت ودیعه</th>
                                <th>مبلغ ودیعه</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th class="money"><?php echo e($allpay2); ?></th>
                                <th class="money"><?php echo e($allaftercash-$paycheck2); ?></th>
                                <td class="money"><?php echo e($res2); ?></td>
                                <td class="money"><?php echo e($res3); ?></td>
                            </tr>

                            </tbody>
                        </table>
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
<script src="<?php echo e(asset('admin_panel/dist/js/simple.money.format.js')); ?>"></script>
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
    let text = document.getElementById("demo").textContent;
    let text2 = text.toLocaleString();
    alert(text2);
</script>
<script type="text/javascript">
    $('.money').simpleMoneyFormat();
</script>
<script type="text/javascript">

    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-36251023-1']);
    _gaq.push(['_setDomainName', 'jqueryscript.net']);
    _gaq.push(['_trackPageview']);

    (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();


</script>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\sales\Laravel Framework 9.6.0\resources\views/admin_panel/orders.blade.php ENDPATH**/ ?>