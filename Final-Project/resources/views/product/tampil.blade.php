@extends('layout.master')
@section('title')
    Product
@endsection
@section('content')
<div>
    <a href="/product/create">
        <button type="button" class="btn btn-primary my-3">Tambah</button>
    </a>
    
</div>
<div class="row">
@forelse ($product as $item)
    <div class="col-md-4 mb-3">
        <div class="card h-100">
            <img src="{{ asset('storage/' . $item->image) }}" class="card-img-top" alt="Product Image" style="object-fit: cover; height: 250px;">

            <div class="card-body d-flex flex-column">
                <span class="badge bg-secondary mb-2 align-self-start">{{ $item->category_name }}</span>

                <h5 class="card-title">{{ $item->description }}</h5>
                
                <p class="card-text text-success fw-bold">
                    Rp {{ number_format($item->price) }}
                </p>
                
                <p class="card-text text-muted small">
                    Stock: {{ $item->stock }}
                </p>
                
                <div class="mt-auto">
                    <form action="/product/{{ $item->id }}" method="POST">
                    <a href="/product/{{ $item->id }}">
                        <button type="button" class="btn btn-info">Detail</button>
                    </a>
                    <a href="/product/{{ $item->id }}/edit">
                        <button type="button" class="btn btn-warning">edit</button>
                    </a>
                    @csrf
                    @method("DELETE")
                    <input type="submit"class="btn btn-danger" value="Delete"/>
                </form>
                    
                </div>
            </div>
        </div>
    </div>

@empty
    <tr>
        <td>Tidak ada Product</td>
    </tr>
@endforelse
</div>


                  
  <script src="{{asset('templating/src/assets/libs/jquery/dist/jquery.min.js')}}"></script>
  <script src="{{asset('templating/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('templating/src/assets/js/app.min.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
@endsection