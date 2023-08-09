<?php
// include_once "../../model/connect.php";
// include_once "../../model/products.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('src/font/fontawesome-free-6.2.1-web/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('src/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('src/css/products.css')}}">
</head>
<body>
   
 
<div class="khung">
@include('category.aside')
        <main>
@include('category.header')

        <div class="banner">
            <div class="conten-text">
                <h1>Welcome to categorys</h1>
            </div>
            <div class="conten-banner">
               <img src="{{asset('src/image/slider-pic.png')}}" alt="">
            </div>
        </div>
        <div class="category">
            <div class="text">
                <h1>categories list</h1>
            </div>
            <div class="action">
                <div class="product-action">
                <a class="btn btn-success" href="{{ route('category.create') }}"> New Category</a>
                </div>
                <div class="product-form">
                <form action="products.php" method="POSTPOST">
                    <input type="text" name="findname" placeholder="Search name products">
                    <button><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
                </div>
            </div>
        </div>
    
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Category Name</th>
                    <th>Category Description</th>
                  
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->description }}</td>
                       
                        <td>
                            <form action="{{ route('category.destroy',$category->id) }}" method="Post">
                                <a class="btn btn-primary" href="{{ route('category.edit',$category->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
        
        </main>  
        
    </div>
</body>
</html>