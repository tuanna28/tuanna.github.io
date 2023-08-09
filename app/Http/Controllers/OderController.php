<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateOrderRequest;
class OrderController extends Controller
{

    public function index()
{
    $orders= Order::all();// lấy dữ liệu từ bảng order
    return view('order.index', ['orders'=>$orders]);
}

public function create()
{
    return view('order.create');
}

/**
 * Store a newly created resource in storage.
 */
public function store()
{
 //
//    $name= $request->input('name');
//    $email= $request->input('email');
//    $address= $request->input('address');
//    $phone= $request->input('phone');
//    $user_id= $request->input('user_id');
//    $product_name= $request->input('product_name');
//    $product_id= $request->input('product_id');
//    $quantity= $request->input('quantity');
//    $price= $request->input('price');
//    $payment_status= $request->input('payment_status');
//    $dilivery_status= $request->input('dilivery_status');
//    $image = $request->file('image')->getClientOriginalName( );// lấy tên file
//    $path=$request->file('image')->storeAs('public/images',$image);// lưu file vào đường dẫn 
   
//    // tạo data để lưu vào db 
//    $data= [
//     'name'=> $name,
  
//         'email'=> $email,
//         'phone'=> $phone,
//         'address'=> $address,
//         'user_id'=> $user_id,
//         'product_name'=> $product_name,
//         'product_id'=> $product_id,
  
//         'price'=> $price,
//         'image'=> $image,
//         'quantity'=> $quantity,
//         'payment_status'=> $payment_status,
//         'dilivery_status'=> $dilivery_status,
//    ];
//    Order::create($data);// tạo bản ghi có dữ liệu là $data
//    return redirect()->route('order.index')
//    ->with('success', 'order đã được tạo thành công.');




}

/**
 * Display the specified resource.
 */
public function show(string $id)
{
    //
}

/**
 * Show the form for editing the specified resource.
 */
public function edit(Order $order)
{
    //
    return view('order.edit',compact('order'));
}

/**
 * Update the specified resource in storage.
 */
public function update(UpdateOrderRequest $request, Order $order)
{
    $name= $request->input('name');
    $email= $request->input('email');
    $address= $request->input('address');
    $phone= $request->input('phone');
   
   
   
    $order->fill([
        'name'=> $name,
  
        'email'=> $email,
        'phone'=> $phone,
        'address'=> $address,
       
    
    ])->save();

   

   
    return redirect()->route('order.index')
    ->with('success', 'Order đã cập nhập thành công');
}

/**
 * Remove the specified resource from storage.
 */
public function destroy(Order $order) {
{
    $order->delete();
  return redirect()->route('order.index')->with('success','order successfully deleted');
}
}
}
