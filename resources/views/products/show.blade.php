@extends('layouts.app')

@section('title', $product->title)

@section('content')
    <br>
    <h1>{{ $product->title }}</h1>
    <p><strong>القسم:</strong> {{ $product->category?->name ?? 'N/A' }}</p>
    <p><strong>السعر:</strong> {{ money($product->price) }}</p>
    <p class="text-muted">‍
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">‍
            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/>‍
            <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"/>‍
        </svg>‍
        تمت مشاهدته {{ $product->view_count }} مرة‍
    </p>‍
    <p><strong>المخزون:</strong> {{ $product->stock }}</p>
    <p><strong>الحالة:</strong> {{ $product->status->label() }}</p>
    <div>
        <strong>الوصف:</strong>
        <p>{{ $product->description ?? 'لا يوجد وصف.' }}</p>
    </div>
    <a href="{{ route('products.index') }}" class="btn btn-secondary">العودة إلى القائمة</a>
@endsection
