<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Product List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body class="bg-light">

    <div class="container my-5">

      <!-- Create Button -->
      <div class="d-flex justify-content-end mb-2">
        <a href="{{ route('products.create') }}" class="btn btn-dark btn-sm">Create</a>
      </div>

      @if(session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif
      @if(session('error'))
        <div class="alert alert-danger">
          {{ session('error') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif
      

      <!-- Card with Table -->
      <div class="card shadow-lg rounded-3">
        <div class="card-header bg-dark text-white text-center fs-3">
          Create Product
        </div>
        <div class="table-responsive">
          <table class="table align-middle mb-0">
            <thead class="table-light">
              <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Name</th>
                <th>SKU</th>
                <th>Price</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @if($products->isNotEmpty())
                @foreach($products as $product)
                <tr>
                <td>{{$product->id }}</td>
                <td>
                  @if($product->image)
                     <img class="riunded" src="{{asset('uploads/products/' .$product->image)}}" width="50" class="img-thumbnail" alt="Product" style="max-width: 60px;">
                  @else
                    <img src="https://placehold.co/600x400" width="50" class="img-thumbnail" alt="Default Image" style="max-width: 60px;">
                  @endif
                 
                </td>
                <td>{{ $product->name }}</td>
                <td>{{$product->sku}}</td>
                <td>{{$product->price}}</td>
                <td>
                  @if($product->status == 'active')
                    <span class="badge bg-success">Active</span>
                  @else
                    <span class="badge bg-secondary">Inactive</span>
                  @endif
                </td>
                <td>
                 <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-dark me-1">Edit</a>
                  <form action="{{route('products.destroy', $product-> id)}}"
                       method="POST" class="d-inline"
                       onsubmit="return confirm('Are you sure you want to delete this product?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                  </form>
                </td> 
              </tr>
                @endforeach
              @else
                <tr>
                  <td colspan="7" class="text-center">No products found</td>
                </tr>
              @endif
              
              <!-- Add more rows as needed -->
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
