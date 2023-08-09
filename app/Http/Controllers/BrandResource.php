<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

class BrandResource extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::get(); //lấy data từ db

        return response()->json($brands);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $brandname = $request->input('name'); //lấy thông tin name từ request
        $description = $request->input('description');
      
        $logo = $request->file('logo')->getClientOriginalName();
        $request->file('logo')->storeAs('public/images', $logo);
        $data = [
            'name' => $brandname,
            'logo' => $logo,
            'description' => $description,
        ];
        $brand = Brand::create($data); //tao ban ghi co du lieu la $data
        
        return response()->json($brand);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(brand $brand)
    {
        return response()->json($brand);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
       
        $name = $request->input('name');
   
        $description = $request->input('description');
     

        $logo = $request->hasFile('logo')?$request->file('logo')->getClientOriginalName():$brand->logo;
        if($logo){
            $request->file('logo')->storeAs('public/images', $logo);
        }
        $data = [
            'name' => $name,
     
          
            'logo' => $logo,
            'description' => $description,
          
        ];

        $brand->update($data);
        return response()->json([
            "massage"=>'Update success',
            $data
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();

        return response(['message' => 'Delete successful']); //trả về message thông báo
    }
}