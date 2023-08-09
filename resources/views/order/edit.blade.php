<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Order</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../src/font/fontawesome-free-6.2.1-web/css/all.min.css">
    <link rel="stylesheet" href="../src/css/main.css">
    <link rel="stylesheet" href="../src/css/form.css">
</head>


<body>

    <div class="container mt-2">
    <div class="khung">
 

 @include('order.aside')
         
 @include('order.header')
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left mb-2">
                    <h2>Edit order</h2>
                </div>
            </div>
        </div>
        <!-- @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
        @endif -->
        <form action="{{ route('order.update',$order->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>order Name:</strong>
                        <input type="text" name="name" value="{{$order->name}}" class="form-control" placeholder="order Name">
                        @error('name')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
             
              
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>order email:</strong>
                        <input type="text" value="{{$order->email}}" name="email" class="form-control" placeholder="order email">
                        @error('email')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>order phone:</strong>
                        <input type="number" value="{{$order->phone}}" name="phone" class="form-control" placeholder="order phone">
                        @error('phone')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>order address:</strong>
                        <input type="text" value="{{$order->address}}" name="address" class="form-control" placeholder="order address">
                        @error('address')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
               
           
                <button type="submit" class="btn btn-primary ml-3">Submit</button>
            </div>
        </form>
    </div>
</body>
</html>