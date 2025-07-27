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
     <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('products.index') }}" class="btn btn-dark btn-sm">Back</a>
      </div>

      <!-- Card with Table -->
      <div class="card shadow-lg rounded-3">
        <div class="card-header bg-dark text-white text-center fs-3">
          Create Product
        </div>
        <div class="card-body">
         <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
  @csrf

  <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input
      type="text"
      class="form-control @error('name') is-invalid @enderror"
      id="name"
      name="name"
      value="{{ old('name') }}"
      placeholder="Enter product name"
    />
    @error('name')
      <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>

  <div class="mb-3">
    <label for="image" class="form-label">Image</label>
    <input
      type="file"
      class="form-control @error('image') is-invalid @enderror"
      id="image"
      name="image"
    />
    @error('image')
      <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>

  <div class="mb-3">
    <label for="sku" class="form-label">Sku</label>
    <input
      type="text"
      class="form-control @error('sku') is-invalid @enderror"
      id="sku"
      name="sku"
      value="{{ old('sku') }}"
      placeholder="Enter product SKU"
    />
    @error('sku')
      <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>

  <div class="mb-3">
    <label for="price" class="form-label">Price</label>
    <input
      type="number"
      class="form-control @error('price') is-invalid @enderror"
      id="price"
      name="price"
      value="{{ old('price') }}"
      placeholder="Enter product price"
    />
    @error('price')
      <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>

  <div class="mb-3">
    <label for="status" class="form-label">Status</label>
    <select
      name="status"
      id="status"
      class="form-select @error('status') is-invalid @enderror"
    >
      <option value="active">Active</option>
      <option value="Inactive">Inactive</option>
    </select>
    @error('status')
      <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>

  <button type="submit" class="btn btn-dark mt-3">Submit</button>
</form>

        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
