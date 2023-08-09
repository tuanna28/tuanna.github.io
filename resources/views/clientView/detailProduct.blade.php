<?php
// require "../../connect.php";
//     include_once '../../model/connect.php';
//     include_once '../../model/detail-products.php';
// require "../../model/comment.php";
//     $id = $_GET['id'];
// $sql = "select * from `sanpham` WHERE `sanpham`.`id_sanpham` = '$id'";
// $row = $conn->query($sql)->fetchAll();
// $dsbl = loadall_binhluan();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Single Product</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Colo Shop Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{asset('src/css/bootstrap4/bootstrap.min.css')}}">
    <link href="{{asset('src/plugins/font-awesome-4.7.0/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{asset('src/plugins/OwlCarousel2-2.2.1/owl.carousel.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('src/plugins/OwlCarousel2-2.2.1/owl.theme.default.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('src/plugins/OwlCarousel2-2.2.1/animate.css')}}">
    <link rel="stylesheet" href="{{asset('src/plugins/themify-icons/themify-icons.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('src/plugins/jquery-ui-1.12.1.custom/jquery-ui.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('src/css/single_styles.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('src/css/single_responsive.css')}}">
</head>

<body>

<div class="super_container">

    <!-- Header -->

  
    @include('clientView.header')
<br><br><br><br><br>
    <div class="container single_product_container">
    @if(session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div> 
    @endif
        <div class="row">
            <div class="col">

                <!-- Breadcrumbs -->

                <div class="breadcrumbs d-flex flex-row align-items-center">
                    <ul>
                        <li><a href="{{url('home')}}">Home</a></li>
                        <li><a href="categories.html"><i class="fa fa-angle-right" aria-hidden="true"></i>Men's</a></li>
                        <li class="active"><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>Single Product</a></li>
                    </ul>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-lg-7">
                <div class="single_product_pics">
                    <div class="row">

                        <div class="col-lg-9 image_col order-lg-2 order-1">
                            <div class="single_product_image">
                                <!-- <img src="{{ asset('storage/images/'.$product->image) }}" alt="" height="300"> -->
                                
                                <div class="single_product_image_background" style="background-image:url({{ asset('storage/images/'.$product->image) }})"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="product_details">
                    <div class="product_details_title">
                        <!-- cai nay la laravel chu co phai PHP thuan da-->
                        <h2>{{$product->name}}</h2>
                        <p>{{$product->description}}</p>
                    </div>
                    <div class="free_delivery d-flex flex-row align-items-center justify-content-center">
                        <span class="ti-truck"></span><span>Miễn phí vận chuyển</span>
                    </div>
                    <div class="original_price"></div>
                    <div class="product_price">{{$product->price}}  VND</div>
<!--                    <ul class="star_rating">-->
<!--                        <li><i class="fa fa-star" aria-hidden="true"></i></li>-->
<!--                        <li><i class="fa fa-star" aria-hidden="true"></i></li>-->
<!--                        <li><i class="fa fa-star" aria-hidden="true"></i></li>-->
<!--                        <li><i class="fa fa-star" aria-hidden="true"></i></li>-->
<!--                        <li><i class="fa fa-star-o" aria-hidden="true"></i></li>-->
<!--                    </ul>-->


                <form action="{{route('add-cart',$product->id)}}" method="Post" >
                            @csrf
                    <div class="product_color">
                        <span>Size sản phẩm:</span>
                        <ul>
                            <select name="size">
                                @foreach ($sizes as $size) 
                                    <option value="{{$size->name}}">{{$size->name}}</option>
                                @endforeach
                            </select>
                           
                        </ul>
                    </div>
                    <div class="quantity d-flex flex-column flex-sm-row align-items-sm-center">
                        
                            <input id="quantity_value" type="number" name="quantity" min="1" max="10" value="1">
                            <input class="red_button add_to_cart_button" id="submit"  type="submit" name="addcart" style="margin-top:5px;"  value="Add to Cart" />
                            </form>
                        </div>
<!--                        <div class="quantity_selector">-->
                          
<!--                            <span class="minus"><i class="fa fa-minus" aria-hidden="true"></i></span>-->
<!--                            <span id="quantity_value">1</span>-->
<!--                            <span class="plus"><i class="fa fa-plus" aria-hidden="true"></i></span>-->

<!--                        </div>-->
                     

                        <!--                        <div class="red_button add_to_cart_button"><a href="#">add to cart</a></div>-->
<!--                        <div class="product_favorite d-flex flex-column align-items-center justify-content-center"></div>-->
                    </div>
                    </form>

                </div>
            </div>
        </div>

    </div>

    <!-- Tabs -->

    <div class="tabs_section_container">

        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="tabs_container">
                        <ul class="tabs d-flex flex-sm-row flex-column align-items-left align-items-md-center justify-content-center">
                            <li class="tab active" data-active-tab="tab_1"><span>Description</span></li>
                            <li class="tab" data-active-tab="tab_2"><span>Additional Information</span></li>
                            <li class="tab" data-active-tab="tab_3"><span>Reviews (2)</span></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">

                    <!-- Tab Description -->

                    <div id="tab_1" class="tab_container active">
                        <div class="row">
                            <div class="col-lg-5 desc_col">
                                <div class="tab_title">
                                    <h4>Description</h4>
                                </div>
                                <div class="tab_text_block">
                                    <h2>Pocket cotton sweatshirt</h2>
                                    <p>Nam tempus turpis at metus scelerisque placerat nulla deumantos solicitud felis. Pellentesque diam dolor, elementum etos lobortis des mollis ut...</p>
                                </div>
                                <div class="tab_image">
                                    <img src="images/desc_1.jpg" alt="">
                                </div>
                                <div class="tab_text_block">
                                    <h2>Pocket cotton sweatshirt</h2>
                                    <p>Nam tempus turpis at metus scelerisque placerat nulla deumantos solicitud felis. Pellentesque diam dolor, elementum etos lobortis des mollis ut...</p>
                                </div>
                            </div>
                            <div class="col-lg-5 offset-lg-2 desc_col">
                                <div class="tab_image">
                                    <img src="images/desc_2.jpg" alt="">
                                </div>
                                <div class="tab_text_block">
                                    <h2>Pocket cotton sweatshirt</h2>
                                    <p>Nam tempus turpis at metus scelerisque placerat nulla deumantos solicitud felis. Pellentesque diam dolor, elementum etos lobortis des mollis ut...</p>
                                </div>
                                <div class="tab_image desc_last">
                                    <img src="images/desc_3.jpg" alt="">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tab Additional Info -->

                    <div id="tab_2" class="tab_container">
                        <div class="row">
                            <div class="col additional_info_col">
                                <div class="tab_title additional_info_title">
                                    <h4>Additional Information</h4>
                                </div>
                                <p>COLOR:<span>Gold, Red</span></p>
                                <p>SIZE:<span>L,M,XL</span></p>
                            </div>
                        </div>
                    </div>

                    <!-- Tab Reviews -->

                    <div id="tab_3" class="tab_container">
                        <div class="row">

                            <!-- User Reviews -->

                            <div class="col-lg-6 reviews_col">
                                <div class="tab_title reviews_title">
                                    <h4>Reviews (2)</h4>
                                </div>

                                <!-- User Review -->

                                <div class="user_review_container d-flex flex-column flex-sm-row">
                                    <div class="user">
                                        <div class="user_pic"></div>
                                        <div class="user_rating">
                                            <ul class="star_rating">
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="review">
                                        <div class="review_date">27 Aug 2016</div>
                                        <div class="user_name">Brandon William</div>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                    </div>
                                </div>

                                <!-- User Review -->

                                <div class="user_review_container d-flex flex-column flex-sm-row">
                                    <div class="user">
                                        <div class="user_pic"></div>
                                        <div class="user_rating">
                                            <ul class="star_rating">
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="review">
                                        <div class="review_date">27 Aug 2016</div>
                                        <div class="user_name">Brandon William</div>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Add Review -->

                            <div class="col-lg-6 add_review_col">

                                <div class="add_review">
                                    <form id="review_form" action="post">
                                        <div>
                                            <h1>Add Review</h1>
                                            <input id="review_name" class="form_input input_name" type="text" name="name" placeholder="Name*" required="required" data-error="Name is required.">
                                            <input id="review_email" class="form_input input_email" type="email" name="email" placeholder="Email*" required="required" data-error="Valid email is required.">
                                        </div>
                                        <div>
                                            <h1>Your Rating:</h1>
                                            <ul class="user_star_rating">
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                                            </ul>
                                            <textarea id="review_message" class="input_review" name="message"  placeholder="Your Review" rows="4" required data-error="Please, leave us a review."></textarea>
                                        </div>
                                        <div class="text-left text-sm-right">
                                            <button id="review_submit" type="submit" class="red_button review_submit_btn trans_300" value="Submit">submit</button>
                                        </div>
                                    </form>
                                </div>

                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

    <!-- Benefit -->

    <div class="benefit">
        <div class="container">
            <div class="row benefit_row">
                <div class="col-lg-3 benefit_col">
                    <div class="benefit_item d-flex flex-row align-items-center">
                        <div class="benefit_icon"><i class="fa fa-truck" aria-hidden="true"></i></div>
                        <div class="benefit_content">
                            <h6>free shipping</h6>
                            <p>Suffered Alteration in Some Form</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 benefit_col">
                    <div class="benefit_item d-flex flex-row align-items-center">
                        <div class="benefit_icon"><i class="fa fa-money" aria-hidden="true"></i></div>
                        <div class="benefit_content">
                            <h6>cach on delivery</h6>
                            <p>The Internet Tend To Repeat</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 benefit_col">
                    <div class="benefit_item d-flex flex-row align-items-center">
                        <div class="benefit_icon"><i class="fa fa-undo" aria-hidden="true"></i></div>
                        <div class="benefit_content">
                            <h6>45 days return</h6>
                            <p>Making it Look Like Readable</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 benefit_col">
                    <div class="benefit_item d-flex flex-row align-items-center">
                        <div class="benefit_icon"><i class="fa fa-clock-o" aria-hidden="true"></i></div>
                        <div class="benefit_content">
                            <h6>opening all week</h6>
                            <p>8AM - 09PM</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Newsletter -->

    <div class="newsletter">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="newsletter_text d-flex flex-column justify-content-center align-items-lg-start align-items-md-center text-center">
                        <h4>Newsletter</h4>
                        <p>Subscribe to our newsletter and get 20% off your first purchase</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <form action="post">
                        <div class="newsletter_form d-flex flex-md-row flex-column flex-xs-column align-items-center justify-content-lg-end justify-content-center">
                            <input id="newsletter_email" type="email" placeholder="Your email" required="required" data-error="Valid email is required.">
                            <button id="newsletter_submit" type="submit" class="newsletter_submit_btn trans_300" value="Submit">subscribe</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="footer_nav_container d-flex flex-sm-row flex-column align-items-center justify-content-lg-start justify-content-center text-center">
                        <ul class="footer_nav">
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">FAQs</a></li>
                            <li><a href="contact.html">Contact us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="footer_social d-flex flex-row align-items-center justify-content-lg-end justify-content-center">
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-skype" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer_nav_container">
                        <div class="cr">©2018 All Rights Reserverd. This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="#">Colorlib</a> &amp; distributed by <a href="https://themewagon.com">ThemeWagon</a></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

</div>

<script src="{{asset('src/js/jquery-3.2.1.min.js')}}"></script>
            <script src="{{asset('src/css/bootstrap4/popper.js')}}"></script>
            <script src="{{asset('src/css/bootstrap4/bootstrap.min.js')}}"></script>
            <script src="{{asset('src/plugins/Isotope/isotope.pkgd.min.js')}}"></script>
            <script src="{{asset('src/plugins/OwlCarousel2-2.2.1/owl.carousel.js')}}"></script>
            <script src="{{asset('src/plugins/easing/easing.js')}}"></script>
            <script src="{{asset('src/js/custom.js')}}"></script>
<script src="{{asset('src/plugins/jquery-ui-1.12.1.custom/jquery-ui.js')}}"></script>
</body>

</html>
