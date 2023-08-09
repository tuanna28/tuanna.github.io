<!doctype html>
<html lang="en">

<head>
    <title>Fasone Shop</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Colo Shop Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{asset('src/css/bootstrap4/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('src/font/fontawesome-free-6.2.1-web/css/all.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('src/plugins/OwlCarousel2-2.2.1/owl.carousel.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('src/plugins/OwlCarousel2-2.2.1/owl.theme.default.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('src/plugins/OwlCarousel2-2.2.1/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('src/css/main_styles.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('src/css/responsive.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('src/css/cart.css')}}">
</head>



<body>


@include('clientView.header')
    <!-- Cart ---->
    <br><br><br> <br><br><br> <br><br><br> <br><br>
    <h1>GIỎ HÀNG</h1>
    @if(session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div> 
    @endif
    @if(session('message'))
        <div class="alert alert-warning">
          {{ session('message') }}
        </div> 
    @endif
    <div class="center ">
        <table class="table">
          <thead>
        <tr>
              
                <th>Tên sản phẩm</th>
                <th>Hình</th>
                <th>Đơn giá</th>
                <th>Số lượng</th>
                <th>Size</th>
                <th>Thành tiền ($)</th>
                <th>Action</th>
            </tr>
            </thead>
            <?php $totalPrice=0; ?>
            @foreach ($carts as $cart)
            <tbody>
           
            <tr class="spadd">
                <td>{{$cart->product_name}}</td>
                <td><img style="height:150px; width:150px" src="{{ asset('storage/images/'.$cart->image) }}" alt=""></td>
               
                <td>{{$cart->price}}</td>
                <td>{{$cart->quantity}}</td>
                <td>{{$cart->size}}</td>
                <td>{{$cart->total}}</td>
              <td><a href="{{url('/remove_cart',$cart->id)}}" onclick="return confirm('Are you sure remove this product ?') " class="btn btn-danger ">Xóa SP</a></td>
          
            </tr>
            <?php $totalPrice=$totalPrice + $cart->total?>
            @endforeach
            <tr>
                        <th colspan="7"><h3>Tổng đơn hàng: {{$totalPrice}} VND</h1></th>
                   
    
                    </tr>
            </tbody>
        </table>
     <div>
        <h1></h1>
     </div>
    </div>

    
    <div class="luachon">
        <form action="../../model/checkout.php">
     <div>
        <h2 style="font-size: 25px;">Tiến Hành Đặt Hàng:</h2>
     <a href="{{route('cash_order')}}" class="btn btn-danger ">Thanh Toán Khi Nhận Hàng</a>
     <a href="{{route('stripe', $totalPrice)}}" class="btn btn-danger " >Thanh Toán Bằng Thẻ (visa) </a>
     </div>
          
            <!-- <input type="submit" value="ĐỒNG Ý ĐẶT HÀNG" name="dongydathang"> -->
     <p>________________________________</p>
      <div class="mt-3 " >
              <a href=""><input type="button" value="XÓA TOÀN BỘ GIỎ HÀNG"></a>
            <a href="route('home')"><input type="button" value="TIẾP TỤC ĐẶT HÀNG"></a>
      </div>
        </form>
        </div>
    </div>
    </div>
    <br><br><br>
    @include('clientView.footer')
</body>

</html>