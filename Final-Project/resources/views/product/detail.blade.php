@extends('layout.master')
@section('title', 'Product')

@section('content')
<div class="container py-4">
    <h3 class="text-muted mb-1">Kategori: {{ $product->category_name }}</h3>
    
    <h1 class="text-primary fw-bold mb-4">{{ $product->description }}</h1>
    
    <div class="row">
        <div class="col-md-4 mb-3">
            <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" class="img-fluid rounded shadow-sm" style="max-height: 300px; object-fit: contain;">
        </div>
        
        <div class="col-md-8">
            <div class="card card-body shadow-sm">
                <p class="mb-2"><strong>Stok Tersedia:</strong> {{ $product->stock }} pcs</p>
                <p class="text-danger fw-bold fs-4 mb-3">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                
                <div>
                    <a href="/product" class="btn btn-secondary btn-sm">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection