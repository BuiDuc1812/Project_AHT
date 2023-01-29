<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
// use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Pagination;

use Session;
use Stripe;

class HomeController extends Controller
{
    public function index()
    {
        $product = Product::paginate(3);
        return view('home.userpage', compact('product'));
    }
    public function redirect()
    {
        $usertype = Auth::user()->usertype;
        if ($usertype == '1') {
            return view('admin.home');
        } else {
            $product = Product::paginate(3);
            return view('home.userpage', compact('product'));
        }
    }
    public function product_details($id)
    {
        $product = product::find($id);
        return view('home.product_details', compact('product'));
    }
    public function add_cart(Request $request, $id)
    {
        if (Auth::id()) {
            $user = Auth::user();
            // dd($user);
            $product = product::find($id);
            // dd($product);
            $cart = new cart;
            $cart->name = $user->name;
            $cart->email = $user->email;
            $cart->phone = $user->phone;
            $cart->address = $user->address;
            $cart->user_id = $user->id;
            $cart->product_name = $product->name;
            if ($product->discount != null) {
                $cart->price = $product->discount * $request->quantity;
            } else {
                $cart->price = $product->price * $request->quantity;
            }
            $cart->image = $product->image;
            $cart->product_id = $product->id;
            $cart->quantity = $request->quantity;
            $cart->save();
            return redirect()->back();
        } else {
            return redirect('login');
        }
    }
    public function show_cart(){ 
        if(Auth::id()){
            $id=Auth::user()->id;
        $cart=cart::where('user_id','=',$id)->get();
        return view('home.show_cart',compact('cart'));
        }
        else
        {
            return redirect('login');
        }
    }
    public function remove_cart($id){
        $cart=cart::find($id);
        $cart->delete();
        return redirect()->back();
    }
    public function cash_order(){
        $user=Auth::user();
        $userid = $user->id;
        $data=cart::where('user_id','=',$userid)->get();
        foreach($data as $data){
            $order = new order;
            $order->name=$data->name; 
            $order->email=$data->email; 
            $order->phone=$data->phone; 
            $order->address=$data->address; 
            $order->user_id=$data->user_id; 
            $order->product_name=$data->product_name; 
            $order->price=$data->price; 
            $order->quantity=$data->quantity; 
            $order->image=$data->image; 
            $order->product_id=$data->product_id;
            $order->payment_status='cash on delivery'; 
            $order->delivery_status='processing';
            $order->save(); 
            $cart_id=$data->id;
            $cart=cart::find($cart_id);
            $cart->delete();
        }
        return redirect()->back()->with('message','Đơn hàng của bạn đã được gửi đi. Vui lòng chờ yêu cầu xác nhân ^^');
    }
    public function stripe($totalprice){
        return view('home.stripe',compact('totalprice'));
    }

    public function stripePost(Request $request, $totalprice)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    
        Stripe\Charge::create ([
                "amount" => $totalprice * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Thank for payment !!" 
        ]);


        $user=Auth::user();
        $userid = $user->id;
        $data=cart::where('user_id','=',$userid)->get();
        foreach($data as $data){
            $order = new order;
            $order->name=$data->name; 
            $order->email=$data->email; 
            $order->phone=$data->phone; 
            $order->address=$data->address; 
            $order->user_id=$data->user_id; 
            $order->product_name=$data->product_name; 
            $order->price=$data->price; 
            $order->quantity=$data->quantity; 
            $order->image=$data->image; 
            $order->product_id=$data->product_id;
            $order->payment_status='Paid'; 
            $order->delivery_status='processing';
            $order->save(); 
            $cart_id=$data->id;
            $cart=cart::find($cart_id);
            $cart->delete();
        }
        Session::flash('success','Payment successfull');
        return back();
    }
}