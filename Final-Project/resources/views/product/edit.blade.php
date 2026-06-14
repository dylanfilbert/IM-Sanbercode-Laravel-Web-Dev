@extends('layout.master')
@section('title')
    Add Product
@endsection

@section('content')
    <div class="container py-4">
    <h3 class="mb-4">Edit Product: {{ $product->description }}</h3>

    <form action="/product/{{ $product->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="mb-3">
            <label class="form-label">Description</label>
            <input type="text" name="description" value="{{ $product->description }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Product Image</label>
            <div class="mb-2">
                <small class="text-muted d-block mb-1">Gambar saat ini:</small>
                <img src="{{ asset('storage/' . $product->image) }}" alt="Current Image" class="img-thumbnail" style="max-height: 100px;">
            </div>
            <input class="form-control" type="file" name="image">
            <small class="text-muted">Biarkan kosong jika tidak ingin mengganti gambar.</small>
        </div>

        <div class="mb-3">
            <label class="form-label">Price</label>
            <input type="number" name="price" value="{{ $product->price }}" class="form-control" required> 
        </div>

        <div class="mb-3">
            <label class="form-label">Stock</label>
            <input type="number" name="stock" value="{{ $product->stock }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Category</label>
            <select name="categories_id" class="form-control" required>
                <option value="">-- Select Category --</option>
                @foreach ($categories as $cat)
                    <option value="{{ $cat->id }}" {{ $cat->id == $product->categories_id ? 'selected' : '' }}>
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-warning">Update Product</button>
        <a href="/product" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection