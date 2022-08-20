<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Session;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{
    //function for show products on slider and trendings:
    function index()
    {
        $data= Product::all();
        return view('product',['product'=>$data]);
    }

    //function for showing detail of product:
    function detail($id)
    {
        $data= Product::find($id);
         return view('detail',['product'=>$data]);
    }

    //function for search bar:
    function search(Request $req)
    {
        $data= Product::
        where('name','like','%'.$req->input('query').'%')
        ->get();
        return view('search',['products'=>$data]);
    }

    //function for adding products in the cart:
    function addToCart(Request $req)
    {
        if ($req->session()->has('user')) {
             $cart= new Cart;
             $cart->user_id= $req->session()->get('user')['id'];
             $cart->product_id=$req->product_id;
             $cart->save();
             return redirect('/');
        }
        else {
            return redirect('/login');
        }
        
    }

    //function for count the items in the cart:
    public static function cartItem()
    {
        $user_id = session()->get('user')['id'];
        $items = Cart::where('user_id',$user_id)->get();
        return count($items);
    }

    //function for showing products in cart
    function cartList()
    {
       $user_id = session()->get('user')['id'];
      $data= DB::table('cart')
       ->join('products','cart.product_id','products.id')
       ->select('products.*','cart.id as cart_id')
       ->where('cart.user_id',$user_id)
       ->get();
       return view('cartlist',['products'=>$data]);
    }

    //function for removing products from the cart
    function removeCart($id)
    {
         Cart:: destroy($id);
         return redirect('cartlist');
    }

    //function for order:
    function orderNow()
    {
      $user_id = session()->get('user')['id'];
      $total= DB::table('cart')
       ->join('products','cart.product_id','products.id')
       ->where('cart.user_id',$user_id)
       ->sum('products.price');
       return view('ordernow',['total'=>$total]);
    }

    //function for placing order:
    function orderplace(Request $req )
    {
        $user_id = session()->get('user')['id'];
        $cartall= Cart::where('user_id',$user_id)->get();
        foreach ($cartall as $cart)
         {
            $order= new Order;
            $order->product_id=$cart['product_id'];
            $order->user_id=$cart['user_id'];
            $order->address=$req->address;
            $order->status="pending";
            $order->payment_method=$req->payment;
            $order->payment_status="pending";
            $order->save();
        }
        Cart::where('user_id',$user_id)->delete();
         return redirect('/');
    }

    //function for checking orders:
    function myorder()
    {
        $user_id = session()->get('user')['id'];
        $orders= DB::table('orders')
       ->join('products','orders.product_id','products.id')
       ->where('orders.user_id',$user_id)
       ->get();
        return view('myorders',['orders'=>$orders]);
    }
}
