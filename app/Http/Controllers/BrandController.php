<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $brands= Brand::all();// lấy dữ liệu từ bảng brand
    return view('brand.index', ['brands'=>$brands]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('brand.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBrandRequest $request)
    {
        //
       $name= $request->input('name');
       $description= $request->input('description');
       $logo = $request->file('logo')->getClientOriginalName( );// lấy tên file
       $path=$request->file('logo')->storeAs('public/images',$logo);// lưu file vào đường dẫn 

       // tạo data để lưu vào db 
       $data= [
        'name'=> $name,
        'description'=> $description,
        'logo'=> $logo,
       ];
       Brand::create($data);// tạo bản ghi có dữ liệu là $data
       return redirect()->route('brand.index')
       ->with('success', 'Brand has been created successfully.');




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
    public function edit(Brand $brand)
    {
        //
        return view('brand.edit',compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBrandRequest $request, Brand $brand)
    {
        $name= $request->input('name');
        $description= $request->input('description');
        
        $brand->fill([
            'name'=> $name,
        'description'=> $description,
        
        ])->save();
if($request->file('logo')!=null) {
    $logo = $request->file('logo')->getClientOriginalName( );// lấy tên file
    $request->file('logo')->storeAs('public/images',$logo);// lưu file vào đường dẫn 
    $brand->fill([
            
        'logo'=> $logo,
        ])->save();
}
       
 
       
        return redirect()->route('brand.index')
        ->with('success', 'Brand đã cập nhập thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand) {
    {
        $brand->delete();
        return redirect()->route('brand.index')->with('success','brand successfully deleted');
    }
}
}