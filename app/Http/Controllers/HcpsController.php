<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Order;
use App\Supplement;
use App\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use ConsoleTVs\Charts\Chart;

class HcpsController extends Controller
{
    // constructor 
    public function __construct()
    {
        $this->middleware('auth:hcp');
    }
    // ['day_orders' => $day_orders, 'week_orders' => $week_orders, 'month_orders' => $month_orders]
    // function to show dashboard
    public function dashboard()
    {
        $day_orders = DB::table('orders')
                ->selectRaw('SUM(totalPrice) as total_sales')
                ->whereRaw("date_format(created_at, '%Y-%m-%d') = CURRENT_DATE")
                ->value('total_sales');
        $week_orders = DB::table('orders')
                ->selectRaw('SUM(totalPrice) as total_sales')
                ->whereRaw("WEEK(date_format(created_at, '%Y-%m-%d')) = WEEK(CURRENT_DATE)")
                ->value('total_sales');
        $month_orders = DB::table('orders')
                ->selectRaw('SUM(totalPrice) as total_sales')
                ->whereRaw("MONTH(date_format(created_at, '%Y-%m-%d')) = MONTH(CURRENT_DATE)")
                ->value('total_sales');
        //dd($orders);
        return view('admin.dashboard', ['day_orders' => $day_orders, 'week_orders' => $week_orders, 'month_orders' => $month_orders]);
    }

    public function getProduct(){
        $sups = Supplement::all();
        return view('admin.products', ['sups' => $sups]);
    }

    public function getOrders(){
        $orders = Order::all();
        $orders->transform(function($order, $key){
            $order->cart = unserialize($order->cart);
            return $order;
        });

        return view('admin.orders', ['orders' => $orders]);
    }

    public function getChart(){
        return view('admin.charts');
    }

    public function getCalendar(){
        return view('admin.calendar');
    }

    public function getUsers(){
        $users = User::all();
        return view('admin.users', ['users' => $users]);
    }

    public function getAdmins(){
        return view('admin.update');
    }

    public function addProduct(Request $request){
        // validate form input 
        $this->validate($request, [
            'supName' => 'required|min:3',
            'supPrice' => 'required|numeric',
            'supDesc' => 'required',
            'supPic' => 'required'
        ]);
        // check for the image file for supplements
        if ($request->hasFile('supPic')) {
            $fileNameWithExt = $request->file('supPic')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('supPic')->getClientOriginalExtension();
            $fileNameToStore = $fileName . '-' . time() . '.'. $extension;
            //$path = $request->file('supPic')->storeAs('public/src/images', $fileNameToStore);
            $request->file('supPic')->move('src/images', $fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }
        // add the product to database 
        $supplement = new Supplement([
            'supplement_name' => $request->input('supName'),
            'supplement_price' => $request->input('supPrice'),
            'supplement_description' => $request->input('supDesc'),
            'supplement_pic' => $fileNameToStore,
            'supplement_category_id' => $request->input('supCategory'),
            'supplier_id' => $request->input('supSupplier')
        ]);
        $supplement->save();
        return redirect()->back()->with('success', 'Supplement added.');
    }

    public function deleteProduct(Request $request, $id){
        $supplement = Supplement::find($id);
        if ($supplement->supplement_pic != 'noimage.jpg') {
            File::delete('public/src/images/'.$supplement->supplement_pic);
        }
        $supplement->delete();
        return redirect()->back()->with('success', 'Supplement deleted');
        /*
            if(File::exists($imagePath)){
                File::delete($imagePath);
            }
        */
    }

    public function getLogout(Request$request){
        Auth::logout();
        $request->session()->flush();
        return redirect()->route("getHome");
    }
}
