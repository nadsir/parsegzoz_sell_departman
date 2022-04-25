<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Check;
use Verta;

class SellerController extends Controller
{
    public function index()
    {

        $role = Auth::user()->role;
        if ($role == '1') {
            return view('admin');
        }

        if ($role == '2') {
            $customerresults = Customer::all();
            return view('admin_panel.customer', compact('customerresults'));
        } else {
            return view('dashboard');
        }
    }

    public function addcustomer()
    {

        $role = Auth::user()->role;
        if ($role == '1') {
            return view('admin');
        }

        if ($role == '2') {
            return view('admin_panel.addcustomer');
        } else {
            return view('dashboard');
        }
    }

    public function addcustomertodb(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|max:255|alpha',
            'lname' => 'required|alpha',
            'phone' => 'required|numeric',
            'deposit' => 'required|regex:/^[0-9 ,]+$/',
            'code' => 'required|numeric',
            'address' => 'required'
        ], [
            'name.required' => 'نام را وارد کنید',
            'name.alpha' => 'در فیلد نام فقط از حروف استفاده کنید',

            'lname.required' => 'نام خانوادگی را وارد کنید',
            'lname.alpha' => 'در فیلد نام خانوادگی فقط از حروف استفاده کنید',

            'phone.required' => 'تلفن را وارد کنید',
            'phone.regex' => 'در فیلد تلفن فقط از اعداد استفاده کنید',

            'deposit.required' => 'مبلغ ودیعه را وارد کنید',
            'deposit.numeric' => 'مبلغ ودیعه فقط عدد می باشد',

            'code.required' => 'کد ملی را وارد کنید',
            'code.numeric' => 'در فیلد کدملی فقط از اعداد استفاده کنید',
            'code.max' => 'کدملی را اشتباه وارد کرده اید',


            'address.required' => 'آدرس را وارد کنید',
        ]);


        $customer = new Customer;
        $customer->name = $request->name;
        $customer->lname = $request->lname;
        $customer->phone = $request->phone;
        $customer->code = $request->code;
        $customer->address = $request->address;
        $resultdeposit = str_replace(array(","), '', $request->deposit);
        $customer->deposit = $resultdeposit;
        $customer->save();
        $request->session()->flash('status', 'عملیات اضافه کردن مشتری با موفقیت انجام شد');

        return view('admin_panel.addcustomer');


    }

    public function customerorder($id)
    {
        $role = Auth::user()->role;
        if ($role == '1') {
            return view('admin');
        }

        if ($role == '2') {
            $orderdetails = Order::where('customer_id', $id)->with('check')->get();
            $customerres = Customer::where('id', $id)->first();


            $comments = Customer::find($id)->Order;

            $customersinfo = Customer::find($id);

            foreach ($comments as $key => $comment) {
                $date = explode('-', $comment->data);
                $res = Verta::getJalali($date[0], $date[1], $date[2]);
                $geregori = $res[0] . '-' . $res[1] . '-' . $res[2];
                $comments[$key]['data'] = $geregori;
            }
            $paycheck2 = 0;
            $allpay2 = 0;
            $allpaywithdiscount = 0;
            $allaftercash = 0;
            $allcashpay = 0;
            $finalafterdiscount = 0;
            foreach ($orderdetails as $key => $orderdetail) {
                $finalmount = $orderdetail->afterdiscount;
                $allaftercash += $orderdetail->aftercash;

                $allcashpay += $orderdetail->cashpay;
                $finalafterdiscount += $orderdetail->afterdiscount;


                $allpay2 += $finalmount;
                $allpaywithdiscount += ($finalmount - ($finalmount * $orderdetail->discount / 100));

                foreach ($orderdetail->check as $key => $comment2) {
                    if ($comment2->status == 1) {
                        $paycheck2 += $comment2->amount_check;
                    }
                }

            }
            $res = $finalafterdiscount - ($allcashpay + $paycheck2);
            $res2 = $customerres->deposit - $res;
            $res3 = $customerres->deposit;


            return view('admin_panel.orders', compact('comments', 'customersinfo', 'paycheck2', 'allpay2', 'allaftercash', 'res2', 'res3'));
        } else {
            return view('dashboard');
        }


    }

    public function addorders(Request $request)
    {
        $role = Auth::user()->role;
        if ($role == '1') {
            return view('admin');
        }

        if ($role == '2') {
            $customerid = $request->customer;

            return view('admin_panel.addorders', compact('customerid'));
        } else {
            return view('dashboard');
        }
    }

    public function addcustomerorder(Request $request)
    {
        $role = Auth::user()->role;
        if ($role == '1') {
            return view('admin');
        }
        $randomNumber = random_int(100000, 999999);

        if ($role == '2') {


            $validated = $request->validate([
                'cid' => 'required|max:255',
                'mount' => 'required|regex:/^[0-9 ,]+$/',
                'cashpay' => 'required|regex:/^[0-9 ,]+$/',
                'discount' => 'required',
                'bank' => 'required',

                'cash' => 'required',
                'announced' => 'required',
                'recovery' => 'required',
                'date' => 'required|date_format:Y-m-d',
                'tax' => 'required',
            ], [
                'mount.required' => 'مبلغ را وارد کنید',
                'mount.regex' => 'فرمت ورودی پول صحیح نمی باشد ',
                'cashpay.regex' => 'فرمت ورودی پول برای فیلدپرداخت نقدی صحیح نمی باشد ',


                'discount.required' => 'درصد تخفیف را وارد کنید',
                'date.required' => 'تاریخ را وارد کنید',
                'date.date_format' => 'تاریخ را با فرمت صحیح وارد کنید برای مثال 08-04-1400',
            ]);
            $lastcounter = $request->counter;
            $date = explode('-', $request->date);
            $res = Verta::getGregorian($date[0], $date[1], $date[2]);
            $geregori = $res[0] . '-' . $res[1] . '-' . $res[2];
            for ($lastcounter; $lastcounter >= 1; $lastcounter--) {

                $validated = $request->validate([
                    'date' . $lastcounter => 'required|date_format:Y-m-d',
                    'number' . $lastcounter => 'required',
                    'amount' . $lastcounter => 'required|regex:/^[0-9 ,]+$/'
                ], [
                    'date' . $lastcounter . '.required' => 'تاریخ چک شمار' . $lastcounter . ' را وارد کنید',
                    'date' . $lastcounter . '.date_format' => ' تاریخ را با فرمت صحیح وارد کنید برای مثال 08-04-1400',

                    'number' . $lastcounter . '.required' => 'شماره چک' . $lastcounter . ' را وارد کنید',


                    'amount' . $lastcounter . '.required' => 'مبلغ چک' . $lastcounter . ' را وارد کنید',
                    'amount' . $lastcounter . '.regex' => 'فرمت ورودی پول صحیح نمی باشد',

                ]);
            }
            $v = verta();
            $v->timezone;
            $hour = $v->hour; // 14
            $minut = $v->minute; // 18
            $second = $v->second; // 23
            $ttime = $hour . ':' . $minut . ':' . $second;


            $order = new Order;
            $order->id = $randomNumber;
            $order->customer_id = $request->cid;
            $resultmount = str_replace(array(","), '', $request->mount);
            $order->mount = $resultmount;
            $order->discount = $request->discount;
            $resultcashpay = str_replace(array(","), '', $request->cashpay);
            $order->cashpay = $resultcashpay;
            $afterdiscount = ($resultmount - ($resultmount * $request->discount / 100));


            $order->afterdiscount = $afterdiscount;
            $order->aftercash = $afterdiscount - $resultcashpay;
            $order->bank = $request->bank;
            $order->cash = $request->cash;
            $order->announced = $request->announced;
            $order->recovery = $request->recovery;
            $order->tax = $request->tax;
            $order->data = $geregori;
            $order->time = $ttime;

            $order->save();
            $secondcounter = $request->counter;
            for ($secondcounter; $secondcounter >= 1; $secondcounter--) {
                $number = 'number' . $secondcounter;
                $mount = 'amount' . $secondcounter;
                $date = 'date' . $secondcounter;
                $resultmount = str_replace(array(","), '', $request->$mount);
                $status = 'status' . $secondcounter;
                $check = new Check;
                $check->order_id = $randomNumber;
                $check->amount_check = $resultmount;
                $check->check_number = $request->$number;
                $dat = explode('-', $request->$date);
                $res2 = Verta::getGregorian($dat[0], $dat[1], $dat[2]);
                $geregoricheck = $res2[0] . '-' . $res2[1] . '-' . $res2[2];
                $check->date = $geregoricheck;
                $check->status = $request->$status;
                $check->whois = Auth::user()->role;


                $check->save();
            }
            $request->session()->flash('status', 'عملیات اضافه کردن مشتری با موفقیت انجام شد');


            return redirect()->back();

        } else {
            return view('dashboard');
        }
    }

    public function editorder($id)
    {
        $orderdetails = Order::where('id', $id)->with('check')->get();
        foreach ($orderdetails as $key => $orderdetail) {

            $date1 = explode('-', $orderdetail->data);
            $res1 = Verta::getJalali($date1[0], $date1[1], $date1[2]);
            $geregori = $res1[0] . '-' . $res1[1] . '-' . $res1[2];
            $orderdetail->data = $geregori;
            $allmount = $orderdetail->mount;
            $finalallmount = $orderdetail->aftercash;
            $customerid=$orderdetail->customer_id;


        }
        $paycheck = 0;
        foreach ($orderdetails as $key => $orderdetail) {
            foreach ($orderdetail->check as $key => $comment) {
                $date = explode('-', $comment->date);
                $res = Verta::getJalali($date[0], $date[1], $date[2]);
                $geregori = $res[0] . '-' . $res[1] . '-' . $res[2];
                $orderdetail->check[$key]['date'] = $geregori;
                if ($comment->status == 1) {
                    $paycheck += $comment->amount_check;
                }
            }

        }
        $allcheck = 0;
        foreach ($orderdetails as $key => $orderdetail) {
            foreach ($orderdetail->check as $key => $comment) {

                $allcheck += $comment->amount_check;

            }

        }


        $customername = Order::where('id', $id)->with('customer')->first();
        $name = $customername->customer->name;

        return view('admin_panel.editorder', compact('customerid','orderdetails', 'name', 'allmount', 'paycheck', 'allcheck', 'finalallmount'));


    }

    public function test()
    {
        /* $res=Customer::with('Order.check')->get();*/
        /*$res = Verta::getGregorian(1394, 10, 4);*/


        function generate_numbers()
        {
            $number = 1;
            while (true) {
                yield $number;
                $number++;
            }
        }

        $generator = generate_numbers();
        foreach ($generator as $number) {
            dump($number);
            if ($number == 20) break;
        }

    }

    public function changestatus($id)
    {
        $getcheck = Check::find($id);
        $getcheck->status = 1;
        $getcheck->save();
        return redirect()->back();
    }

    public function addcheck($id, Request $request)
    {
        $secondcounter = $request->counter;
        for ($secondcounter; $secondcounter >= 1; $secondcounter--) {
            $number = 'number' . $secondcounter;
            $mount = 'amount' . $secondcounter;
            $date = 'date' . $secondcounter;
            $resultmount = str_replace(array(","), '', $request->$mount);
            $status = 'status' . $secondcounter;
            $check = new Check;
            $check->order_id = $id;
            $check->amount_check = $resultmount;
            $check->check_number = $request->$number;
            $dat = explode('-', $request->$date);
            $res2 = Verta::getGregorian($dat[0], $dat[1], $dat[2]);
            $geregoricheck = $res2[0] . '-' . $res2[1] . '-' . $res2[2];
            $check->date = $geregoricheck;
            $check->status = $request->$status;
            $check->whois = Auth::user()->role;


            $check->save();
        }
        return redirect()->back();
    }

    public function editfactor($id)
    {
        $orderdetails = Order::where('id', $id)->with('check')->get();
        $factor2 = Order::where('id', $id)->first();
        $customerid = $factor2['customer_id'];

        foreach ($orderdetails as $key => $orderdetail) {

            $date1 = explode('-', $orderdetail->data);

            $res1 = Verta::getJalali($date1[0], $date1[1], $date1[2]);
            if ($res1[1]<10){
                $res1[1]='0'.$res1[1];
            }
            if ($res1[2]<10){
                $res1[2]='0'.$res1[2];
            }
            $geregori = $res1[0] . '-' . $res1[1] . '-' . $res1[2];
            $orderdetail->data = $geregori;

        }


        return view('admin_panel.editfactor', compact('orderdetails', 'customerid'));


    }

    public function editcustomerorder(Request $request)
    {

        $validated = $request->validate([
            'cid' => 'required|max:255',
            'mount' => 'required|regex:/^[0-9 ,]+$/',
            'cashpay' => 'required|regex:/^[0-9 ,]+$/',
            'discount' => 'required',
            'bank' => 'required',


            'announced' => 'required',
            'recovery' => 'required',
            'date' => 'required|date_format:Y-m-d',
            'tax' => 'required',
        ], [
            'mount.required' => 'مبلغ را وارد کنید',
            'mount.regex' => 'فرمت ورودی پول صحیح نمی باشد ',
            'cashpay.regex' => 'فرمت ورودی پول برای فیلدپرداخت نقدی صحیح نمی باشد ',


            'discount.required' => 'درصد تخفیف را وارد کنید',
            'date.required' => 'تاریخ را وارد کنید',
            'date.date_format' => 'تاریخ را با فرمت صحیح وارد کنید برای مثال 08-04-1400',
        ]);

        $date = explode('-', $request->date);
        $res = Verta::getGregorian($date[0], $date[1], $date[2]);
        $geregori = $res[0] . '-' . $res[1] . '-' . $res[2];





        $order = Order::where('id',$request->factornumber)->first();
        $v = verta();
        $v->timezone;
        $hour = $v->hour; // 14
        $minut = $v->minute; // 18
        $second = $v->second; // 23
        $ttime = $hour . ':' . $minut . ':' . $second;

        $order->customer_id = $request->cid;
        $resultmount = str_replace(array(","), '', $request->mount);
        $order->mount = $resultmount;
        $order->discount = $request->discount;
        $resultcashpay = str_replace(array(","), '', $request->cashpay);
        $order->cashpay = $resultcashpay;
        $afterdiscount = ($resultmount - ($resultmount * $request->discount / 100));


        $order->afterdiscount = $afterdiscount;
        $order->aftercash = $afterdiscount - $resultcashpay;
        $order->bank = $request->bank;

        $order->announced = $request->announced;
        $order->recovery = $request->recovery;
        $order->tax = $request->tax;
        $order->data = $geregori;
        $order->time = $ttime;

        $order->save();

        $request->session()->flash('status', 'عملیات اضافه کردن مشتری با موفقیت انجام شد');
        return redirect()->back();

    }
    public function changecheck($id){

        $orderdetails = Check::where('id', $id)->get();
        foreach ($orderdetails as $key => $orderdetail) {

            $date1 = explode('-', $orderdetail->date);

            $res1 = Verta::getJalali($date1[0], $date1[1], $date1[2]);
            if ($res1[1]<10){
                $res1[1]='0'.$res1[1];
            }
            if ($res1[2]<10){
                $res1[2]='0'.$res1[2];
            }
            $geregori = $res1[0] . '-' . $res1[1] . '-' . $res1[2];
            $orderdetail->date = $geregori;

        }
        return view('admin_panel.editcheck',compact('orderdetails'));

    }
    public function editcustomercheck(Request $request){
        $validated = $request->validate([
            'mount' => 'required|regex:/^[0-9 ,]+$/',
            'discount' => 'required|regex:/^[0-9 ,]+$/',



            'date' => 'required|date_format:Y-m-d',

        ], [
            'mount.required' => 'مبلغ را وارد کنید',
            'mount.regex' => 'فرمت ورودی پول صحیح نمی باشد ',
            'discount.required' => 'شماره چک را وارد کنید',



            'date.required' => 'تاریخ را وارد کنید',
            'date.date_format' => 'تاریخ را با فرمت صحیح وارد کنید برای مثال 08-04-1400',
        ]);
        $check=Check::where('id',$request->id)->first();
        $resultmount = str_replace(array(","), '', $request->mount);
        $check->amount_check=$resultmount;
        $check->check_number=$request->discount;
        $date1 = explode('-', $request->date);
        $res1 = Verta::getGregorian($date1[0], $date1[1], $date1[2]);
        $geregori = $res1[0] . '-' . $res1[1] . '-' . $res1[2];
        $check->date=$geregori;
        $check->save();
        $request->session()->flash('status', 'عملیات اضافه کردن مشتری با موفقیت انجام شد');
        return redirect()->back();
    }
}
