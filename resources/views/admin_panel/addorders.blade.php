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
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->


    <link href='datepicker/css/normalize.css' rel='stylesheet'/>
    <link href='datepicker/css/fontawesome/css/font-awesome.min.css' rel='stylesheet'/>
    <link href="datepicker/css/vertical-responsive-menu.min.css" rel="stylesheet"/>
    <link href="datepicker/css/style.css" rel="stylesheet"/>
    <link href="datepicker/css/prism.css" rel="stylesheet"/>
    <link rel="stylesheet" href="datepicker/css/persianDatepicker-default.css"/>
    <link rel="stylesheet" href="datepicker/css/persianDatepicker-latoja.css"/>

    <script src="js/prism.js"></script>
    <script src="js/vertical-responsive-menu.min.js"></script>


    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!--persian date picker -->


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

                <h1>اضافه کردن سفارش</h1>
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
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">جزعیات سفارش</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->


        </div>
        <!-- Main content -->

        <!-- /.content -->

        <form action="/addcustomerorder" method="post">
            <input type="text" name="cid" value="{{$customerid}}" style="display:none;">
            @csrf
            <div class="container" style="background-color: #ffffff">
                <div class="row">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="col-md-6">

                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">قیمت</label>
                                <input name="mount" type="text" class="form-control" id="exampleInputEmail1"
                                       placeholder="قیمت" onkeyup="javascript:this.value=itpro(this.value);">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">درصد تخفیف</label>
                                <input name="discount" type="text" class="form-control" id="exampleInputEmail1"
                                       placeholder="درصد تخفیف">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">پرداخت نقدی</label>
                                <input name="cashpay" type="text" class="form-control" id="exampleInputEmail1"
                                       placeholder="پرداخت نقدی" onkeyup="javascript:this.value=itpro(this.value);">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">نام بانک</label>
                                <select name="bank" class="form-control" id="asdas">
                                    <option value="ملی">ملی</option>
                                    <option value="ملت">ملت</option>
                                    <option>کشاورزی</option>
                                    <option>پارسیان</option>
                                    <option>پاسارگاد</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">نوع پرداخت</label>
                                <select name="cash" class="form-control" id="bank" >
                                    <option value="1">نقدی</option>
                                    <option value="0">چکی</option>

                                </select>
                            </div>

                        </div>
                        <!-- /.box-body -->


                    </div>

                    <div class="col-md-6">

                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1"> وضعیت اعلام به واحد مالی</label>
                                <select name="announced" class="form-control" id="exampleFormControlSelect1">
                                    <option value="1">اعلام شده</option>
                                    <option value="0">اعلام نشده</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1"> وضعیت وصولی</label>
                                <select name="recovery" class="form-control" id="exampleFormControlSelect1">
                                    <option value="1">وصول شده</option>
                                    <option value="0">وصول نشده</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1"> وضعیت مالیاتی</label>
                                <select name="tax" class="form-control" id="exampleFormControlSelect1">
                                    <option value="1">وصول شده</option>
                                    <option value="0">وصول نشده</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">تاریخ</label>

                                <input  name="date" type="text" id="pdpF2"  class="form-control pdp-el" data-jdate="1401-01-02" data-gdate="2022-03-22">
                            </div>

                        </div>
                        <!-- /.box-body -->


                    </div>
                </div>
                <div class="container">
                    <button type="button" class="btn btn-secondary btn-lg" id="Secondary" style="background-color: #ffc107 !important;margin: 20px">افزودن چک</button>

                    <div class="row handle" style="display: none">



                    </div>
                </div>
                <input class="counter" id="counter" name="counter" type="text" style="display:none;">


                <div class="box-footer">
                    <button type="submit" class="btn btn-primary" style="    background-color: #3c8dbc!important;">
                        ارسال
                    </button>
                </div>

            </div>

        </form>


    </div>


    <!-- /.content-wrapper -->
    <script>

    </script>
    <footer class="main-footer text-left">
    </footer>

    <!-- Control Sidebar -->

    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<script src="{{asset('js/app.js')}}"></script>
<script src="datepicker/js/jquery-1.10.1.min.js"></script>
<script src="datepicker/js/persianDatepicker.js"></script>
<script>
    $(function () {
        //usage
        $(".usage").persianDatepicker();

        //themes
        $("#pdpDefault").persianDatepicker({alwaysShow: true,});
        $("#pdpLatoja").persianDatepicker({theme: "latoja", alwaysShow: true,});
        $("#pdpLightorang").persianDatepicker({theme: "lightorang", alwaysShow: true,});
        $("#pdpMelon").persianDatepicker({theme: "melon", alwaysShow: true,});
        $("#pdpDark").persianDatepicker({theme: "dark", alwaysShow: true,});

        //size
        $("#pdpSmall").persianDatepicker({cellWidth: 14, cellHeight: 12, fontSize: 8});
        $("#pdpBig").persianDatepicker({cellWidth: 78, cellHeight: 60, fontSize: 18});

        //formatting
        $("#pdpF1").persianDatepicker({formatDate: "YYYY/MM/DD 0h:0m:0s:ms"});
        $("#pdpF2").persianDatepicker({formatDate: "YYYY-0M-0D"});
        $("#pdpF3").persianDatepicker({formatDate: "YYYY-NM-DW|ND", isRTL: !0});

        //startDate & endDate
        $("#pdpStartEnd").persianDatepicker({startDate: "1394/11/12", endDate: "1395/5/5"});
        $("#pdpStartToday").persianDatepicker({startDate: "today", endDate: "1410/11/5"});
        $("#pdpEndToday").persianDatepicker({startDate: "1397/11/12", endDate: "today"});

        //selectedBefor & selectedDate
        $("#pdpSelectedDate").persianDatepicker({selectedDate: "1404/1/1", alwaysShow: !0});
        $("#pdpSelectedBefore").persianDatepicker({selectedBefore: !0});
        $("#pdpSelectedBoth").persianDatepicker({selectedBefore: !0, selectedDate: "1395/5/5"});

        //jdate & gdate attributes
        $("#pdp-data-jdate").persianDatepicker({
            onSelect: function () {
                alert($("#pdp-data-jdate").attr("data-gdate"));
            }
        });
        $("#pdp-data-gdate").persianDatepicker({
            showGregorianDate: true,
            onSelect: function () {
                alert($("#pdp-data-gdate").attr("data-jdate"));
            }
        });


        //Gregorian date
        $("#pdpGregorian").persianDatepicker({showGregorianDate: true});


        //startDate is tomarrow
        var p = new persianDate();
        $("#pdpStartDateTomarrow").persianDatepicker({
            startDate: p.now().addDay(1).toString("YYYY/MM/DD"),
            endDate: p.now().addDay(4).toString("YYYY/MM/DD")
        });


    });
</script>
<!-- jQuery 3 -->
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
            'paging': true,
            'lengthChange': false,
            'searching': false,
            'ordering': true,
            'info': true,
            'autoWidth': false
        })


    })
    $( "#bank" )
        .change(function () {

            if(this.value==1){
                $('#Secondary').css('display', 'none');
            }else{
                $('#Secondary').css('display', 'block');
            }


        })
        .change();
    var counter=1;

    $("#Secondary").click(function(){
        var value = $( this ).val();
        if(value==0){
            $('.handle').css('display', 'block');
        }else{
            $('.handle').css('display', 'none');
        }
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
</body>
</html>
