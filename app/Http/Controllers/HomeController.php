<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Chat;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        // $user=User::all()->count();
        $user=User::where('usertype','user')->get()->count();
        $product=Product::all()->count();
        $order=Order::all()->count();
        $delivered=Order::where('status','delivered')->get()->count();
        return view('admin.index',compact('user','product','order','delivered'));
    }
    public function home()
    {

        $product=Product::all();
        if(Auth::id())
        {
            $user=Auth::user();
            $user_id=$user->id;
            $user_name=$user->name;
            $count=Cart::where('user_id',$user_id)->count();
        }
        else 
        {
            $count='';
            $user_name='';
        }
        return view('home.index',compact('product','count','user_name'));
    }
    public function login_home()
    {
        $product=Product::all();
        
        if(Auth::id())
        {
            $user=Auth::user();
            $user_id=$user->id;
            $count=Cart::where('user_id',$user_id)->count();
            $user_name=$user->name;
        }
        else 
        {
            $user_name='';
            $count='';
        }

       // dd($count);
        return view('home.index',compact('product','count','user_name'));
    }
    public function product_details($id)
    {
        $pt=Product::find($id);
        if(Auth::id())
        {
            $user=Auth::user();
            $user_id=$user->id;
            $user_name=$user->name;
            $count=Cart::where('user_id',$user_id)->count();
        }
        else 
        {
            $count='';
            $user_name='';
        }
        return view('home.product_details',compact('pt','count','user_name'));
    }
    public function add_cart($id)
    {
         $product_id=$id;
         $user=Auth::user();
         $user_id=$user->id;
         $data=new Cart();
         $data->user_id=$user_id;
         $data->product_id=$product_id;
         $data->save();
         toastr()->timeOut(5000)->closeButton()->addSuccess('product added to the cart successfully');
         return redirect()->back();
    }
    public function mycart()
    {
        if(Auth::id())
        {
            $user=Auth::user();
            $user_id=$user->id;
            $count=Cart::where('user_id',$user_id)->count();
            $cart=Cart::where('user_id',$user_id)->get();
            $user_name=$user->name;
        }
        else 
        {
            $count='';
            $user_name='';
        }

          return view('home.mycart',compact('count','cart','user_name'));
    }
    public function delete_cart($id)
    {
       $data=Cart::find($id);
       $data->delete();
       toastr()->timeOut(5000)->closeButton()->addSuccess('product deleted successfully');
        return redirect()->back();
    }
    public function confirm_order(Request $request)
    {
        
         $name=$request->name;
         $phone=$request->phone;
         $address=$request->address;
         $user_id=Auth::user()->id;
         $cart=Cart::where('user_id',$user_id)->get();
         foreach($cart as $ct)
         {
            $order=new Order();
            $order->name=$name;
            $order->phone=$phone;
            $order->rec_address=$address;
            $order->user_id=$user_id;
            $order->product_id=$ct->product_id;
           
            $order->save();
            $getid=Cart::find($ct->id);
            $getid->delete();
         }
         toastr()->timeOut(5000)->closeButton()->addSuccess('order placed successfully');
         return redirect()->back();
         

    }

   public function myorders()
 {
     $user_id=Auth::user()->id;
     $count=Cart::where('user_id',$user_id)->get()->count();
     $order=Order::where('user_id',$user_id)->get();
     $user_name=Auth::user()->name;
      return view('home.order',compact('count','order','user_name'));
 }

 public function contack_us()
 {
    
    $user_id=Auth::user()->id;
    $count=Cart::where('user_id',$user_id)->get()->count();
    $order=Order::where('user_id',$user_id)->get();
    $message=Chat::where('user_id',$user_id)->get();
    $user_name=Auth::user()->name;

     return view('home.contact',compact('count','message','user_name'));
 }
 public function upload_chat(Request $request)
 {
    $user_id=Auth::user()->id;
    $count=Cart::where('user_id',$user_id)->get()->count();
    $order=Order::where('user_id',$user_id)->get();
    $data=new Chat();
    $data->user_id=$user_id;
    $data->user_chat=$request->chat;
    $data->save();

    return redirect()->back();
     
 }


}
