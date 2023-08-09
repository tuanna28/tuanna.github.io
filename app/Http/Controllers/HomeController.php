<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Models\Size;
use Illuminate\Support\Facades\Session;

use Stripe;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Stripe\BillingPortal\Session as BillingPortalSession;

class HomeController extends Controller
{
  public function index(){
    $products= Product::all();// lấy dữ liệu từ bảng product
    return view('clientView.home', ['products'=>$products]);
  }
  public function products()
{
  $products= Product::all();// lấy dữ liệu từ bảng size
    return view('clientView.products',['products'=>$products]);
}
public function Sizes()
{
  $Sizes= Size::all();// lấy dữ liệu từ bảng size
    return view('clientView.detail-product',['Sizes'=>$Sizes]);
}
public function detailProduct($id)
{
  //co relation roi thi o day chi can load them cai size ra la dc
  $product = Product::find($id);
  $sizes= Size::all();
    return view('clientView.detailProduct', ['product' => $product, 'sizes' => $sizes]);
}

public function addCart(Request $request,$id)
{

$user=Auth::user();

$product=Product::find($id);
$cart = new Cart;
$cart->name=$user->name;
$cart->email=$user->email;
$cart->user_id=$user->id;
$cart->product_name=$product->name;
$cart->price=$product->price;
$cart->image=$product->image;
$cart->product_id=$product->id;
$cart->email=$user->email;
$cart->email=$user->email;
$cart->size=$request->size;
if($request->size!=null){
  $cart->size =$request->size;
}else {
  $cart->size='M';
}
if($request->quantity!=null){
  $cart->quantity =$request->quantity;
}else {
  $cart->quantity=1;
}

$cart->total= $product->price * $cart->quantity;
$cart->save();
return redirect()->back()->with('success', 'Product add to cart successfully!');
}
public function showCart(){
  
  $id=Auth::user()->id;
  $carts= cart::where('user_id', '=', $id)->get();
  return view('ClientView.cart.cart',compact('carts'));
}
public function removeCart($id){
  $cart = Cart::find($id);
  $cart->delete();
  return redirect()->back();
}

public function cashOrder()
{
$user=Auth::user();
$userId=$user->id;

$datas= Cart::where('user_id','=',$userId)->get();
if(!empty($datas)) {
foreach($datas as $data)
{
$order= new Order;
$order->name= $data->name;
$order->email= $data->email;
$order->phone= $data->phone;
$order->address= $data->address;
$order->user_id= $data->user_id;
//
$order->product_name= $data->product_name;
$order->price= $data->total;
$order->image= $data->image;
$order->quantity= $data->quantity;
$order->product_id= $data->product_id;
//

$order->payment_status='Thanh Khi Nhận Hàng';
$order->delivery_status='Đang Giao Hàng';

$order->save();

$cart_id= $data->id;
$cart= Cart::find($cart_id);
$cart->delete();

}
return redirect()->back()->with('success', 'Chúng tôi đã nhận được đơn hàng của bạn và sẽ kết nối với bạn sớm!');
}else {
  return redirect()->back()->with('message', 'Giỏ hàng của bạn đang trống, Hãy đặt hãng để tiếp tục!');
}
}
public function stripe($totalPrice)
{
  return view('clientView.cart.stripe', compact('totalPrice'));
}
public function stripePost(Request $request, $totalPrice)
{
    Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

    Stripe\Charge::create ([
            "amount" => $totalPrice * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Cảm Ơn Đã Thanh Toán" 
    ]);
    $user=Auth::user();
    $userId=$user->id;
    
    $datas= Cart::where('user_id','=',$userId)->get();
   
    foreach($datas as $data)
    {
    $order= new Order;
    $order->name= $data->name;
    $order->email= $data->email;
    $order->phone= $data->phone;
    $order->address= $data->address;
    $order->user_id= $data->user_id;
    //
    $order->product_name= $data->product_name;
    $order->price= $data->total;
    $order->image= $data->image;
    $order->quantity= $data->quantity;
    $order->product_id= $data->product_id;
    //
    
    $order->payment_status='Đã Thanh Toán';
    $order->delivery_status='Đang Giao Hàng';
    
    $order->save();
    
    $cart_id= $data->id;
    $cart= Cart::find($cart_id);
    $cart->delete();
    }
    Session::flash('success', 'Payment successful!');
          
    return back();
 
  
 
}
}

