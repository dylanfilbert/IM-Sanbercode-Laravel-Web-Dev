@extends('layout.master')
@section('title')
    Tampil Categories
@endsection

@section('content')
    <a href="/categories/create" class="btn btn-sm btn-primary my-3">Tambah</a>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($categories as $item)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$item->name}}</td>
                    <td>
                        <form action="/categories/{{$item->id}}" method="POST">
                            <a href="/categories/{{$item->id}}" class="btn btn-sm btn-info">Detail</a>
                            <a href="/categories/{{$item->id}}/edit" class="btn btn-sm btn-warning">Edit</a>
                            
                            
                            @csrf
                            @method("DELETE")
                            <input type="submit" class="btn btn-sm btn-danger" value="Delete"/>
                        
                        </form>
                        
                    </td>
                </tr>
                
            @empty
                <tr>
                    <td>No Category Shown</td>
                </tr>
                
            @endforelse

        </tbody>
    </table>
@endsection