@extends('layouts.app')

@section('title', $product->title)

@section('content')
    <h1>{{ $product->title }}</h1>
    <p><strong>القسم:</strong> {{ $product->category?->name ?? 'N/A' }}</p>
    <p><strong>السعر:</strong> {{ money($product->price) }}</p>
    <p><strong>المخزون:</strong> {{ $product->stock }}</p>
    <p><strong>الحالة:</strong> {{ $product->status->label() }}</p>
    <div>
        <strong>الوصف:</strong>
        <p>{{ $product->description ?? 'لا يوجد وصف.' }}</p>
    </div>
    <a href="{{ route('products.index') }}" class="btn btn-secondary">العودة إلى القائمة</a>
@endsection
