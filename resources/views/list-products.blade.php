<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-4">
        <h2 class="text-center">List Product</h2>
    <table class="table">
    <thead class="table-dark text-white">
       <th scope="col">Name</th>
       <th scope="col">Price</th>
       <th scope="col">Gender</th>
       <th scope="col">Image</th>
       <th scope="col">Description</th>

    </thead>
    <tbody>
 @foreach ($products as $pr) 
    <tr>
        <td scope="col">{{$pr->name}}</td>
        <td scope="col">{{$pr->price}}</td>
        <td scope="col">{{$pr->gender}}</td>
        <td scope="col">{{$pr->image}}</td>
        <td scope="col">{{$pr->description}}</td>
    </tr>
@endforeach
    </tbody>
    </table>
    </div>
</body>
</html>