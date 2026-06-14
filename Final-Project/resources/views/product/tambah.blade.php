@extends('layout.master')
@section('title')
    Add Product
@endsection

@section('content')
<div class="container py-4">
    <h3 class="mb-4">Tambah Produk Baru</h3>

    <form action="/product" method="POST" enctype="multipart/form-data">
        @csrf

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
            <input type="text" name="description" value="{{ old('description') }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Product Image</label>
            <input class="form-control" type="file" name="image" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Price</label>
            <input type="number" name="price" value="{{ old('price') }}" class="form-control" required> 
        </div>

        <div class="mb-3">
            <label class="form-label">Stock</label>
            <input type="number" name="stock" value="{{ old('stock') }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Category</label>
            <select name="categories_id" class="form-control" required>
                <option value="">-- Select Category --</option>
                @foreach ($categories as $cat)
                    <option value="{{ $cat->id }}" {{ old('categories_id') == $cat->id ? 'selected' : '' }}>
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Add Product</button>
        <a href="/product" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection