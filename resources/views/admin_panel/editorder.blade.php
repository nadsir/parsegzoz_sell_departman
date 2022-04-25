<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>جدول ها | کنترل پنل</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('admin_panel/dist/css/bootstrap-theme.css') }}">
    <!-- Bootstrap rtl -->
    <link rel="stylesheet" href="{{ asset('admin_panel/dist/css/rtl.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('admin_panel/bower_components/font-awesome/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('admin_panel/bower_components/Ionicons/css/ionicons.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet"
          href="{{ asset('admin_panel/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('admin_panel/dist/css/AdminLTE.css') }}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('admin_panel/dist/css/skins/_all-skins.min.css') }}">

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

@include('layouts.admin-header')
@include('layouts.sidebar')
<!-- right side column. contains the logo and sidebar -->


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <br>
                <br>

                <h1>تاریخچه خرید آقای {{$name}}</h1>
            </h1>
            <br>
            <ol class="breadcrumb">
                <form action="/customerorder/{{$customerid}}" method="get">
                    <button style="background-color: cornflowerblue" type="submit" class="btn btn-primary" >
                        تاریخچه مشتری
                    </button>
                </form>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">

                <br>
                <br>

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">جزعیات فاکتور</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                            <div class="row">
                                <div class="col-sm-6"></div>
                                <div class="col-sm-6"></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="example2" class="table table-bordered table-hover dataTable" role="grid"
                                           aria-describedby="example2_info">
                                        <tr>


                                            <th>شماره</th>
                                            <th>مبلغ خرید</th>

                                            <th>درصد تخفیف</th>
                                            <th>قیمت بعد از اعمال تخفیف </th>
                                            <th>تسویه نقدی</th>
                                            <th> باقی مانده</th>
                                            <th>نام بانک</th>
                                            <th>نوع پرداخت</th>
                                            <th>وضعیت اعلام به واحد مالی</th>
                                            <th>وضعیت وصولی </th>
                                            <th>تاریخ خرید</th>
                                            <th> زمان خرید</th>
                                            <th> بروز رسانی فاکتور </th>
                                            <th>وضعیت مالیاتی </th>

                                        </tr>

                                        <tbody>
                                        @foreach($orderdetails as $orderdetail)
                                        <tr role="row" class="odd">
                                          <?php
                                            $checkid=$orderdetail->id;
                                          ?>
                                              <td>{{$orderdetail->id}}</td>
                                              <td class="money">{{$orderdetail->mount}}</td>

                                              <td>{{$orderdetail->discount}} %</td>
                                              <td class="money">{{$orderdetail->afterdiscount}}</td>
                                              <td class="money">{{$orderdetail->cashpay}}</td>
                                              <td class="money">{{$orderdetail->aftercash}}</td>
                                              <td>{{$orderdetail->bank}}</td>
                                              @if($orderdetail->cash== 1)
                                                  <td >پرداخت نقدی</td>
                                              @else
                                                  <td>پرداخت چکی</td>
                                              @endif
                                              @if($orderdetail->announced== 1)
                                                  <td >اعلام شده</td>
                                              @else
                                                  <td>اعلام نشده</td>
                                              @endif
                                              @if($orderdetail->recovery== 1)
                                                  <td > وصول شده</td>
                                              @else
                                                  <td> وصول نشده</td>
                                              @endif
                                              <td>
                                                  {{$orderdetail->data}}
                                              </td>
                                              <td>{{$orderdetail->time}}</td>
                                              <td>
                                                  <a href="/editfactor/{{$orderdetail->id}}">
                                                      <button type="button" class="btn btn-warning">  ویرایش فاکتور </button>
                                                  </a>
                                              </td>
                                              @if($orderdetail->tax== 1)
                                                  <td  style="background-color: #e5ffb0;border: solid grey 1px"></td>
                                              @else
                                                  <td  style="background-color: #ffd9df;border: solid grey 1px""></td>
                                              @endif
                                        </tr>
                                        @if(!$orderdetail->check->isEmpty())
                                            <tr role="row" class="nader">
                                                <td style="background-color: #f4f4f4"  colspan="13">
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="box col-md-4" >
                                                                <div class="box-header">
                                                                    <h3 class="box-title">جدول ریسپانسیو</h3>

                                                                    <div class="box-tools">
                                                                        <div class="input-group input-group-sm" style="width: 150px;">
                                                                            <input type="text" name="table_search" class="form-control pull-right" placeholder="جستجو">

                                                                            <div class="input-group-btn">
                                                                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- /.box-header -->
                                                                <div class="box-body table-responsive no-padding">
                                                                    <table class="table table-hover">
                                                                        <tbody>
                                                                        <tr>
                                                                            <th>شماره</th>
                                                                            <th>مبلغ چک</th>
                                                                            <th>شماره چک</th>
                                                                            <th>تاریخ چک</th>
                                                                            <th>  بروزرسانی</th>
                                                                            <th>تغییر وضعیت چک</th>
                                                                            <th>وضعیت چک</th>
                                                                        </tr>
                                                                        @foreach($orderdetail->check  as $check)
                                                                            <tr>
                                                                                <td>{{$check->order_id}}</td>
                                                                                <td class="money">{{$check->amount_check}}</td>
                                                                                <td>{{$check->check_number}}</td>
                                                                                <td>{{$check->date}}</td>
                                                                                <td>
                                                                                    <form action="/changecheck/{{$check->id}}" method="get">
                                                                                        <button type="submit" class="btn btn-warning">بروز رسانی چک</button>
                                                                                    </form>
                                                                                </td>
                                                                                <td>
                                                                                    <form action="/changestatus/{{$check->id}}" method="get">
                                                                                    <button type="submit" class="btn btn-info">تغییر وضعیت چک</button>
                                                                                    </form>
                                                                                </td>

                                                                                <td>
                                                                                    @if($check->status ==1)
                                                                                        <button type="button" class="btn btn-success">تصویه شده</button>
                                                                                    @elseif($check->status ==null)
                                                                                        <button type="button" class="btn btn-danger">تصویه نشده</button>
                                                                                    @endif

                                                                                </td>


                                                                            </tr>
                                                                        @endforeach

                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                                <!-- /.box-body -->
                                                            </div>
                                                        </div>
                                                    </div>


                                                </td>

                                            </tr>

                                        @endif
                                        @endforeach


                                        </tbody>
                                        <tfoot>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            <div class="row col-md-6">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th scope="col">مجموع کل</th>
                                        <th scope="col">مجموع باکسر کلیه چک ها</th>
                                        <th scope="col">مجموع باکسر چک های پرداختی</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th class="money">{{$finalallmount}}</th>
                                        <th class="money">{{$finalallmount-$allcheck}}</th>
                                        <td class="money">{{$finalallmount-$paycheck}}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <form action="/addcheck/{{$checkid}}" method="post">
            @csrf
        <div class="container">
            <button type="button" class="btn btn-secondary btn-lg" id="Secondary" style="background-color: #ffc107 !important;margin: 20px">افزودن چک</button>

            <div class="row handle" style="display: none">



            </div>
            <button  type="submit" class="btn btn-primary sendoption" style="    background-color: #3c8dbc!important; display: none">
                ارسال
            </button>
        </div>
            <input class="counter" id="counter" name="counter" type="text" style="display:none;">
        </form>
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
<script src="{{ asset('admin_panel/bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('admin_panel/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- DataTables -->
<script src="{{ asset('admin_panel/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin_panel/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<!-- SlimScroll -->
<script src="{{ asset('admin_panel/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('admin_panel/bower_components/fastclick/lib/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('admin_panel/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('admin_panel/dist/js/demo.js') }}"></script>
<!-- page script -->
<script src="{{ asset('admin_panel/dist/js/simple.money.format.js') }}"></script>

<script>
    $(function () {
        $('#example1').DataTable()
        $('#example2').DataTable({
            'paging': true,
            'lengthChange': false,
            'searching': false,
            'ordering': true,
            'info': true,
            'autoWidth': false
        })
    })
</script>
<script>
    var counter=1;

    $("#Secondary").click(function(){
        var value = $( this ).val();
        if(value==0){
            $('.handle').css('display', 'block');
        }else{
            $('.handle').css('display', 'none');
        }
        $('.sendoption').css('display', 'block');
        $( ".handle" ).prepend( "<div class='card "+ counter +" col-md-3' '><div class='card-header'>چک شماره "+ counter+"</div><ul class='list-group list-group-flush'><li class='list-group-item'><div class='mb-3'><label for='exampleFormControlInput1' class='form-label'>مبلغ چک</label><input onkeyup='javascript:this.value=itpro(this.value);'  name='amount"+counter+"' type='text' class='form-control' id='exampleFormControlInput1' placeholder='مبلغ چک'></div></li><li class='list-group-item'><div class='mb-3'><label for='exampleFormControlInput1' class='form-label'>شماره چک</label><input name='number"+counter+"' type='text' class='form-control' id='exampleFormControlInput1' placeholder='شماره چک'></div></li><li class='list-group-item'><label for='exampleInputEmail1'>تاریخ</label><input  name='date"+ counter +"' type='text'   class='form-control usage' pdp-id='pdp-6733270'  placeholder=' تاریخ'></li><li class='list-group-item'><label for='exampleInputEmail1'>   وضعیت چک پرداخت شده   </label><input  name='status"+ counter +"' type='checkbox'   class='form-control usage' value='1'   placeholder=' وضعیت'></li></ul></div>" );
        $("#counter").val(counter);
        counter++;

    });
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

</script>
</body>
</html>
