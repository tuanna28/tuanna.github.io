<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Product</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../src/font/fontawesome-free-6.2.1-web/css/all.min.css">
    <link rel="stylesheet" href="../src/css/main.css">
    <link rel="stylesheet" href="../src/css/form.css">
</head>


<body>

    <div class="container mt-2">
    <div class="khung">
 

 @include('product.aside')
         
 @include('product.header')
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left mb-2">
                    <h2>Edit Product</h2>
                </div>
            </div>
        </div>
        <!-- @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
        @endif -->
        <form action="{{ route('product.update',$product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>User Name:</strong>
                        <input type="text" name="name"  value="{{$product->name}}"  class="form-control" placeholder="User Name">
                        @error('name')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>User Email:</strong>
                        <input type="number"  name="email"  value="{{$product->email}}" class="form-control" placeholder="User Email">
                        @error('email')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>User Password:</strong>
                        <input type="text"  name="password"  value="{{$product->password}}" class="form-control" placeholder="User Password">
                        @error('password')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>User phone:</strong>
                        <input type="number" name="phone"  value="{{$product->phone}}" class="form-control" placeholder="User phone">
                        @error('phone')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>User Address:</strong>
                        <input type="text"  name="address"  value="{{$product->address}}" class="form-control" placeholder="User Address">
                        @error('address')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
              
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Product TypeUser:</strong>
                        <input type="radio"  value="{{$product->typeuser}}"   name="typeuser" class="form-control" placeholder="User TypeUser">Admin
                        <input type="radio"  value="{{$product->typeuser}}"  name="typeuser" class="form-control" placeholder="User TypeUser"> Client
                        @error('typeuser')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
        </form>
    </div>
</body>
</html>