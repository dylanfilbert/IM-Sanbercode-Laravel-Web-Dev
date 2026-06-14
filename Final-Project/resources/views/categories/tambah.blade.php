@extends('layout.master')
@section('title')
    Add Category
@endsection

@section('content')
    <form action="/categories" method="POST">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @csrf
            <div class="mb-3">
                <label  class="form-label">Name</label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">description</label>
                <textarea name="description" class="form-control" cols="30" row="10" id=""></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection