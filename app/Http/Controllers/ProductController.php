<?php

namespace App\Http\Controllers;

use App\Models\User;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{

    public function index()
{
  Auth::user();
    $products= Product::all();// lấy dữ liệu từ bảng product
    return view('product.index', ['products'=>$products]);
}

public function create()
{
    return view('product.create');
}

/**
 * Store a newly created resource in storage.
 */
public function store(StoreProductRequest $request)
{
 //
   $name= $request->input('name');
   $price= $request->input('price');
   $gender= $request->input('gender');
   $image = $request->file('image')->getClientOriginalName( );// lấy tên file
   $path=$request->file('image')->storeAs('public/images',$image);// lưu file vào đường dẫn 
   $description= $request->input('description');
   // tạo data để lưu vào db 
   $data= [
    'name'=> $name,
    'price'=> $price,
    'gender'=> $gender,
    'image'=> $image,
  'description'=> $description
   ];
   Product::create($data);// tạo bản ghi có dữ liệu là $data
   return redirect()->route('product.index')
   ->with('success', 'Product đã được tạo thành công.');




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
public function edit(Product $product)
{
    //
    return view('product.edit',compact('product'));
}

/**
 * Update the specified resource in storage.
 */
public function update(UpdateProductRequest $request, Product $product)
{
    $name= $request->input('name');
    $price= $request->input('price');
    $gender= $request->input('gender');
    
    $description= $request->input('description');
    $product->fill([
        'name'=> $name,
        'price'=> $price,
        'gender'=> $gender,
      
      'description'=> $description
    
    ])->save();
if($request->file('image')!=null) {
$image = $request->file('image')->getClientOriginalName( );// lấy tên file
$request->file('image')->storeAs('public/images',$image);// lưu file vào đường dẫn 
$product->fill([
        
    'image'=> $image,
    ])->save();
}
   

   
    return redirect()->route('product.index')
    ->with('success', 'Brand đã cập nhập thành công');
}

/**
 * Remove the specified resource from storage.
 */
public function destroy(Product $product) {
{
    $product->delete();
  return redirect()->route('product.index')->with('success','product successfully deleted');
}
}
}
