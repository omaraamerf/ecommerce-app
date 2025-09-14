@extends('layouts.app')

@section('title', 'قائمة المنتجات')

@section('content')
    <h1>قائمة المنتجات</h1>
    @can('product.create')
        <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">إضافة منتج جديد</a>
    @endcan

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>العنوان</th>
                <th>القسم</th>
                <th>السعر</th>
                <th>الحالة</th>
                <th>إجراءات</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->title }}</td>
                    <td>{{ $product->category?->name ?? 'غير محدد' }}</td>
                    <td>{{ money($product->price) }}</td>
                    <td><span class="badge bg-info">{{ $product->status->label() }}</span></td>
                    <td>
                        @can('view', $product)
                            <a href="{{ route('products.show', $product) }}" class="btn btn-sm btn-info">عرض</a>
                        @endcan
                        @can('update', $product)
                            <a href="{{ route('products.edit', $product) }}" class="btn btn-sm btn-warning">تعديل</a>
                        @endcan
                        @can('delete', $product)
                            <form action="{{ route('products.destroy', $product) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('هل أنت متأكد؟')">حذف</button>
                            </form>
                        @endcan
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">لا توجد منتجات.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    {!! $products->links() !!}
@endsection
