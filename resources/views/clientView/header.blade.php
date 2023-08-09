<?php
// $query = "select * from user";
// $item = getOne($query);
// 

use Illuminate\Support\Facades\Auth;

?>
<header>

    <div class="super_container">

        <!-- Header -->

        <header class="header trans_300">

            <!-- Top Navigation -->

            <div class="top_nav">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="top_nav_left">Chào mừng bạn đến với cửa hàng thời trang FASONE</div>
                        </div>
                        <div class="col-md-6 text-right ">
                            <div class="top_nav_right ">
                                <ul class="top_nav_menu ">
                                    <li class="account ">
                                        
                                @if(Auth::user())
                                 
                                         <a href="#">
                                           {{Auth::user()->name}}
                                            <i class="fa fa-angle-down"></i>
                                        </a>
                                        
                                        <ul class="account_selection">
                                            <li>
                                            <form method="POST" action="{{ route('logout') }}">
                                                     @csrf
                                                     <li> <button type="submit"  class="bg-white">   <i class="fa fa-sign-in" aria-hidden="true"> </i>Log Out</button></li>
                                         </form>
                                            <li><a href="profile-edit"><i class="fa fa-user-plus" aria-hidden="true"></i>ProFile</a></li>
                                        </ul>';
                                      @else    
                                    <a href="#">
                                  My Account 
                                  <i class="fa fa-angle-down"></i>
                              </a>
                              <ul class="account_selection">
                                            <li><a href="login"><i class="fa fa-sign-in" aria-hidden="true"></i>Sign In</a></li>
                                            <li><a href="register"><i class="fa fa-user-plus" aria-hidden="true"></i>Register</a></li>
                                        </ul>
                                 

                                    @endif 
                                       
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Navigation -->

            <div class="main_nav_container">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-right">
                            <div class="logo_container">
                                <a href="#">fasone<span>shop</span></a>
                            </div>
                            <nav class="navbar">
                                <div class="search">

                                    <form action="./dieukien.php?act=sanpham" method="POST">
                                        <div class="search_box">
                                            <input type="search" class="input" name="kw" placeholder="Tìm Kiếm Sản Phẩm..." required="">
                                            <button type="submit" name="timkiem">Tìm kiếm</button>
                                        </div>
                                    </form>

                                </div>
                                <ul class="navbar_user">

                                    <li><a href="detail-user.php?id="><i class="fa fa-user" aria-hidden="true"></i></a></li>
                                    <li class="checkout">
                                        <a href="{{url('show_cart')}}">
                                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                </ul>
                                <div class="hamburger_container">
                                    <i class="fa fa-bars" aria-hidden="true"></i>
                                </div>
                            </nav>


                        </div>
                        <nav class="navbar">
                            <ul class="navbar_menu">
                                <li><a href="home">Trang chủ</a></li>
                                <li><a href="">sản phẩm</a></li>
                                <li><a href="#">pages</a></li>
                                <li><a href="about.php">giới thiệu</a></li>
                                <li><a href="lienhe.php">liên hệ</a></li>
                            </ul>

                            <div class="hamburger_container">
                                <i class="fa fa-bars" aria-hidden="true"></i>
                            </div>
                        </nav>

                    </div>
                </div>
        </header>