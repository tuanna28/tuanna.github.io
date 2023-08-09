
<?php
// include_once "../../model/connect.php";
// include_once "../../model/products.php";
// include_once "../../model/category.php";
// require "../../connect.php";
// $query = "select * from sanpham";
// $row = $conn->query($query)->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Fasone Shop</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Colo Shop Template">
    <link rel="stylesheet" href="{{asset('src/css/style.css')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{asset('src/css/bootstrap4/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('src/font/fontawesome-free-6.2.1-web/css/all.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('src/plugins/OwlCarousel2-2.2.1/owl.carousel.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('src/plugins/OwlCarousel2-2.2.1/owl.theme.default.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('src/plugins/OwlCarousel2-2.2.1/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('src/css/main_styles.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('src/css/responsive.css')}}">

  
</head>
<body>
<main>
    @include('clientView.header')
    <div class="main_slider"  >
        <div class="container fill_height">
            <div class="row align-items-center fill_height">
                <div class="col">
                    <div class="main_slider_content">
<!--                        <h6 style="color: white">Fasone thời trang dành cho phái mạnh</h6>-->
<!--                        <h1>Get up to 30% Off New Arrivals</h1>-->
<!--                        <div class="red_button shop_now_button"><a href="#">shop now</a></div>-->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Banner -->

    <div class="banner" id="sp">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="banner_item align-items-center" style="background-image:url(../src/image/anh-ngoi.jpg)">
                        <div class="banner_category">
                            <a href="categories.html">Mạnh mẽ</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="banner_item align-items-center" style="background-image:url(../src/image/phoi-do-thoi-trang-nam-6.jpg)">
                        <div class="banner_category">
                            <a href="categories.html">Thời trang</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="banner_item align-items-center" style="background-image:url(../src/image/quan-ao-the-thao-nam-dep-nike.webp)">
                        <div class="banner_category">
                            <a href="categories.html">Năng Động</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- New Arrivals -->

    <div class="new_arrivals" >
        <div class="container">
       
            <div class="row">
                <div class="col text-center">
                    <div class="section_title new_arrivals_title">
                        <h2>Sản Phẩm</h2>
                    </div>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col text-center">
                    <div class="new_arrivals_sorting">
                        <ul class="arrivals_grid_sorting clearfix button-group filters-button-group">
                            <li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center active is-checked" data-filter="*">Tất cả</li>
                            <li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".women">women's</li>
                            <li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".accessories">accessories</li>
                            <li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".men">men's</li>
                        </ul>
                    </div>
                </div>
            </div>
            @if(session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div> 
    @endif
            <div class="row">
                <div class="col">
                    <div class="product-grid" data-isotope='{ "itemSelector": ".product-item", "layoutMode": "fitRows" }'>

                        <!-- Product 1 -->
                      
     @foreach($products as $product)
                        <div class="product-item men">
                            <div class="product discount product_filter">
                                <div class="product_image">
                                <a href="{{url ('detail-product',$product->id)}}">         <img src="{{ asset('storage/images/'.$product->image) }}" > </a>
                                </div>
                                <div class="favorite favorite_left"></div>
                                <div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center"><span>-$20</span></div>
                                <div class="product_info">
                                    <h6 class="product_name"><a href="{{url ('detail-product',$product->id)}} ?>">{{$product->name}}></a></h6>
                                    <div class="product_price"><a href="{{url ('detail-product',$product->id)}}">{{$product->price}}</a>VND<span></span></div>
                                </div>
                            </div>
                            <form action="{{route('add-cart',$product->id)}}" method="Post" >
                            @csrf
                            <div class="red_button add_to_cart_button" ><input type="submit"  value="Add to Cart" ></div>
                            </form>
                        </div>
                    @endforeach
                    </div>

                </div>

            </div>

        </div>

        <div class="deal_ofthe_week">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="deal_ofthe_week_img">
                            <img src="../src/image/deal_ofthe_week.png" alt="">
                        </div>
                    </div>
                    <div class="col-lg-6 text-right deal_ofthe_week_col">
                        <div class="deal_ofthe_week_content d-flex flex-column align-items-center float-right">
                            <div class="section_title">
                                <h2>Giảm giá trong tuần</h2>
                            </div>
                            <ul class="timer">
                                <li class="d-inline-flex flex-column justify-content-center align-items-center">
                                    <div id="day" class="timer_num">03</div>
                                    <div class="timer_unit">ngày</div>
                                </li>
                                <li class="d-inline-flex flex-column justify-content-center align-items-center">
                                    <div id="hour" class="timer_num">15</div>
                                    <div class="timer_unit">giờ</div>
                                </li>
                                <li class="d-inline-flex flex-column justify-content-center align-items-center">
                                    <div id="minute" class="timer_num">45</div>
                                    <div class="timer_unit">phút</div>
                                </li>
                                <li class="d-inline-flex flex-column justify-content-center align-items-center">
                                    <div id="second" class="timer_num">23</div>
                                    <div class="timer_unit">giây</div>
                                </li>
                            </ul>
                            <div class="red_button deal_ofthe_week_button"><a href="#">mua ngay</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        

            <div class="benefit">
                <div class="container">
                    <div class="row benefit_row">
                        <div class="col-lg-3 benefit_col">
                            <div class="benefit_item d-flex flex-row align-items-center">
                                <div class="benefit_icon"><i class="fa fa-truck" aria-hidden="true"></i></div>
                                <div class="benefit_content">
                                    <h6>Miễn phí vận chuyển</h6>
                                    <p>Thay đổi trong một số hình thức</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 benefit_col">
                            <div class="benefit_item d-flex flex-row align-items-center">
                                <div class="benefit_icon"><i class="fa-regular fa-money-bill" aria-hidden="true"></i></div>
                                <div class="benefit_content">
                                    <h6>cách thức giao hàng</h6>
                                    <p>Giao hàng hỏa tốc</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 benefit_col">
                            <div class="benefit_item d-flex flex-row align-items-center">
                                <div class="benefit_icon"><i class="fa fa-undo" aria-hidden="true"></i></div>
                                <div class="benefit_content">
                                    <h6>Hoàn hàng sau 30 ngày</h6>
                                    <p>Nếu sản phẩm có lỗi</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 benefit_col">
                            <div class="benefit_item d-flex flex-row align-items-center">
                                <div class="benefit_icon"><i class="fa-sharp fa-solid fa-timer" aria-hidden="true"></i></div>
                                <div class="benefit_content">
                                    <h6>Mở cửa trong tuần</h6>
                                    <p>8AM - 09PM</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="blogs">
                <div class="container">
                    <div class="row">
                        <div class="col text-center">
                            <div class="section_title">
                                <h2>Giới thiệu</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row blogs_container">
                        <div class="col-lg-4 blog_item_col">
                            <div class="blog_item">
                                <div class="blog_background" style="background-image:url(../../src/image/blog_1.jpg)"></div>
                                <div class="blog_content d-flex flex-column align-items-center justify-content-center text-center">
                                    <h4 class="blog_title">Giới thiệu về FASONE</h4>
                                    <span class="blog_meta">by admin | dec 01, 2022</span>
                                    <a class="blog_more" href="./about.php">Read more</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 blog_item_col">
                            <div class="blog_item">
                                <div class="blog_background" style="background-image:url(../../src/image/blog_2.jpg)"></div>
                                <div class="blog_content d-flex flex-column align-items-center justify-content-center text-center">
                                    <h4 class="blog_title">Câu chuyện dịch vụ khách hàng của Fasone</h4>
                                    <span class="blog_meta">by admin | dec 01, 2022</span>
                                    <a class="blog_more" href="./about.php">Read more</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 blog_item_col">
                            <div class="blog_item">
                                <div class="blog_background" style="background-image:url(../../src/image/blog_3.jpg)"></div>
                                <div class="blog_content d-flex flex-column align-items-center justify-content-center text-center">
                                    <h4 class="blog_title">Câu chuyện mô hình doanh nghiệp CÓ TRÁCH NHIỆM
                                        FasOne đang hướng tới</h4>
                                    <span class="blog_meta">by admin | dec 01, 2022</span>
                                    <a class="blog_more" href="./about.php">Read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="newsletter">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="newsletter_text d-flex flex-column justify-content-center align-items-lg-start align-items-md-center text-center">
                                <h4>Bản tin</h4>
                                <p>Đăng ký nhận bản tin ngay, giảm giá 20% cho lần mua hàng đầu tiên</p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <form action="post">
                                <div class="newsletter_form d-flex flex-md-row flex-column flex-xs-column align-items-center justify-content-lg-end justify-content-center">
                                    <input id="newsletter_email" type="email" placeholder="Email của bạn" required="required" data-error="Valid email is required.">
                                    <button id="newsletter_submit" type="submit" class="newsletter_submit_btn trans_300" value="Submit">Đăng kí</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

         @include('clientView.footer')
         <script src="{{asset('src/js/jquery-3.2.1.min.js')}}"></script>
            <script src="{{asset('src/css/bootstrap4/popper.js')}}"></script>
            <script src="{{asset('src/css/bootstrap4/bootstrap.min.js')}}"></script>
            <script src="{{asset('src/plugins/Isotope/isotope.pkgd.min.js')}}"></script>
            <script src="{{asset('src/plugins/OwlCarousel2-2.2.1/owl.carousel.js')}}"></script>
            <script src="{{asset('src/plugins/easing/easing.js')}}"></script>
            <script src="{{asset('src/js/custom.js')}}"></script>
</body>

</html>
