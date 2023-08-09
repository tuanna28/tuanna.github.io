<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;;
use App\Http\Requests\UpdateUserRequest;
class UserController extends Controller
{

    public function index()
{
    $users= User::all();// lấy dữ liệu từ bảng user
    return view('user.index', ['users'=>$users]);
}

public function create()
{
    return view('user.create');
}

/**
 * Store a newly created resource in storage.
 */
public function store(StoreUserRequest $request)
{
 //
   $name= $request->input('name');
   $email= $request->input('email');
   $password= $request->input('password');
   $address= $request->input('address');
   $phone= $request->input('phone');
   $typeUser= $request->input('typeuser');
   // tạo data để lưu vào db 
   $data= [
    'name'=> $name,
    'email'=> $email,
    'phone'=> $phone,
    'password'=> $password,
    'address'=> $address,
    'typeuser'=> $typeUser,
   ];
   User::create($data);// tạo bản ghi có dữ liệu là $data
   return redirect()->route('user.index')
   ->with('success', 'user đã được tạo thành công.');




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
public function edit(user $user)
{
    //
    return view('user.edit',compact('user'));
}

/**
 * Update the specified resource in storage.
 */
public function update(UpdateUserRequest $request, User $user)
{
    $name= $request->input('name');
    $email= $request->input('email');
    $password= $request->input('password');
    $address= $request->input('address');
    $phone= $request->input('phone');
    $typeUser= $request->input('typeuser');

    $user->fill([
        'name'=> $name,
        'email'=> $email,
        'phone'=> $phone,
        'password'=> $password,
        'address'=> $address,
        'typeuser'=> $typeUser,
    ])->save();

   

   
    return redirect()->route('user.index')
    ->with('success', 'User đã cập nhập thành công');
}

/**
 * Remove the specified resource from storage.
 */
public function destroy(User $user) {
{
    $user->delete();
    return  redirect()->route('user.index')->with('success','user successfully deleted');
}
}
}
