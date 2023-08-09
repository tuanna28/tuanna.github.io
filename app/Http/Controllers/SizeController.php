<?php

namespace App\Http\Controllers;
use App\Models\Size;
use Illuminate\Http\Request;

class HomeController extends Controller
{

  public function Sizes()
{
  $Sizes= Size::all();// lấy dữ liệu từ bảng product
    return view('clientView.detail-product',['Sizes'=>$Sizes]);
}
}
