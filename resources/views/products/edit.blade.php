@extends('layouts.app')

@section('title', 'تعديل المنتج')

@section('content')
    <h1>تعديل المنتج: {{ $product->title }}</h1>

    <form action="{{ route('products.update', $product) }}" method="POST">
        @csrf
        @method('PUT')
        @include('products._form')
        <button type="submit" class="btn btn-primary mt-3">تحديث</button>
    </form>
@endsection
