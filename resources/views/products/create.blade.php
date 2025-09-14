@extends('layouts.app')

@section('title', 'إضافة منتج جديد')

@section('content')
    <h1>إضافة منتج جديد</h1>

    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        @include('products._form')
        <button type="submit" class="btn btn-primary mt-3">حفظ</button>
    </form>
@endsection
