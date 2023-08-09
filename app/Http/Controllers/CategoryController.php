<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $categories = Category::all();// lấy dữ liệu từ bảng category
    return view('category.index', ['categories'=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        //
       $name=$request->input('name');
       $description= $request->input('description');


       // tạo data để lưu vào db 
       $data= [
        'name'=> $name,
        'description'=> $description,
      
       ];
       category::create($data);// tạo bản ghi có dữ liệu là $data
       return redirect()->route('category.index')
       ->with('success', 'category has been created successfully.');




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
    public function edit(Category $category)
    {
        //
        return view('category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $name= $request->input('name');
        $description= $request->input('description');
        
        $category->fill([
            'name'=> $name,
        'description'=> $description,
        
        ])->save();

       
 
       
        return redirect()->route('category.index')
        ->with('success', 'category đã cập nhập thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category) {
    {
        $category->delete();
        return redirect()->route('category.index')->with('success','category successfully deleted');
    }
}
}