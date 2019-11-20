<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Http\Requests;
use App\Invoice;
use App\Order;
use App\Supplement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Mail\MailQueue;

class HomeController extends Controller
{

    public function getHome(){
        //$supplements = Supplement::all();
        $supplements = \App\Supplement::orderBy('supplement_id', 'desc')->paginate(6); // use eloquent
        return view('user.index', ['supplements' => $supplements]);
    }

    public function getCart(){
        if (!Session::has('cart')) {
            return view('user.cart');
        }
        // if the we have a cart 
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('user.cart', ['supplements' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }
    // get the product full details
    public function getProductDetails($id){
        $supplements = Supplement::find($id);
        return view('user.details', ['supplements' => $supplements]);
    }
    
    // get category products
    public function getCategoryProduct($id){
        $supplements = Supplement::where('supplement_category_id', $id)->paginate(6); // must use paginate here as well
        return view('user.index', ['supplements' => $supplements]);
    }
    // add supplement to the cart
    public function getAddToCart(Request $request, $id){
        $supplement = Supplement::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($supplement, $supplement->supplement_id);
        $request->session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Supplement added.');
    }

    public function getReduceByOne($id){
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($id);

        if(count($cart->items) > 0){
            Session::put('cart', $cart);
        }else{
            Session::forget('cart');
        }
        return redirect()->route('getCart');
    }

    public function getIncreaseByOne($id){
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->increaseByOne($id);
        return redirect()->route('getCart');
    }

    public function getRemoveItem($id){
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);

        if(count($cart->items) > 0){
            Session::put('cart', $cart);
        }else{
            Session::forget('cart');
        }
        return redirect()->route('getCart');
    }

    public function getCheckOut(){
        if (!Session::has('cart')){
            return view('user.index');
        }

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;
        return view('user.checkout', ['total' => $total]);
    }

    public function postCheckOut(Request $request){
        if (!Session::has('cart')){
            return view('user.index');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        // PAYMENT INTEGRATION IS DONE HERE AND THE USER IS ALERT ABOUT WHAT THEY BOUGHT 
        // create a new order 
        $order = new Order();
        $order->cart = serialize($cart);
        $order->address = $request->input('address');
        $order->name = $request->input('name');
        $order->payment_id = mt_rand();
        $order->totalPrice = $cart->totalPrice; // price of the cart
        Auth::user()->orders()->save($order);
        // INVOICE IS GENERATED AND CREATED HERE 
        $invoice = new Invoice();
        $invoice->invoice_number = time();
        $invoice->invoice_date =  date('Y-m-d');
        $invoice->order_id = $order->order_id; //gets the new created order 
        Auth::user()->invoices()->save($invoice);
        // EMAIL USER 
        //$orders = DB::table('orders')->where('user_id', Auth::id())->latest()->first(); //DB::select('select * from orders where user_id = ?', [Auth::id()])->get();
        //$orders = Auth::user()->orders->last()->toArray();
        //$orders = Auth::user()->orders;
        //dd($orders);
        $orders = Auth::user()->orders->sortByDesc('order_id')->take(1);
        $orders->transform(function($order, $key){
            $order->cart = unserialize($order->cart);
            return $order;
        });
        $data = array('orders' => $orders);
        Mail::send('user.email', $data, function($message){
            $message->to(Auth::user()->user_email, Auth::user()->user_name)->from('admin@qualityhealth.co.za')->subject('ORDER RECEIVED!');
        });

        // forget the session 
        Session::forget('cart');
        return redirect()->route('getHome')->with('success', 'Thanks for purchasing');
    }
}
