@extends('layout.master')
@section('title')
    Detail Categories
@endsection


@section('content')
    <h1 class="text-primary">{{$category->name}}</h1>
    <p>{{$category->description}}</p>
    <a href="/categories" class="btn btn-secondary btn-sm my-3">Back</a>
@endsection