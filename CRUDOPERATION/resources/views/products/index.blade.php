<!DOCTYPE html>
<html lang="en">
<head>
  <title> Laravel CRUD</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-sm bg-dark">
    <ul class="nav">
        <li class="nav-item">
          <a class="nav-link text-light" href="#">Products</a>
        </li>

      </ul>
    </nav>
<div class="jumbotron text-center">



    <div class="container">
        <div class="text-right">
            <a href="/products/create"  class="btn btn-dark">New Product</a>
        </div>
        <h1>Products</h1>
    </div>

    <table class="table table-hover">
        <thead>
          <tr>
            <th>No.</th>
            <th>Name</th>
            <th>Image</th>
            <th>Action</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td>{{ $loop->index+1}}</td>
                <td>{{ $product->name }}</td>
                <td>
                    <img src="products/{{ $product->image }}"  width="50" height="50">
                </td>
                <td>
                    <a href="products/{{ $product->id }}/edit" class="btn btn-dark btn-small">Edit</a>
                </td>

                <td>
                    {{-- <a href="products/{{ $product->id }}/delete" class="btn btn-danger btn-small">delete</a> --}}

                    <form method="post" action="products/{{ $product->id }}/delete">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-small">Delete</button>
                </form>
                </td>

              </tr>
            @endforeach

        </tbody>
    </table>

</body>
</html>

