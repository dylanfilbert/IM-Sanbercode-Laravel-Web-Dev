@extends('layout.master')
@section('title')
    Edit Category
@endsection

@section('content')
    <form action="/categories/{{$category->id}}" method="POST">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        @method("PUT")

        @csrf
            <div class="mb-3">
                <label  class="form-label">Name</label>
                <input type="text" name="name" value="{{$category->name}}" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">description</label>
                <textarea name="description" class="form-control" cols="30" row="10" id="">{{$category->description}}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection