@extends('layouts.app')

@section('title', 'تسوق الآن')

@section('content')
<div class="container">
    <div class="p-4 p-md-5 mb-4 rounded text-body-emphasis bg-body-secondary">
        <div class="col-lg-8 px-0">
            <h1 class="display-4 fst-italic">تسوّق أحدث المنتجات</h1>
            <p class="lead my-3">تصفح مجموعتنا المميزة من المنتجات المختارة بعناية لتناسب جميع احتياجاتك. جودة عالية وأسعار تنافسية.</p>
        </div>
    </div>

    <div class="row">
        @forelse ($products as $product)
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>صورة المنتج</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">صورة المنتج</text></svg>

                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $product->title }}</h5>
                        <p class="card-text text-muted flex-grow-1">{{ Str::limit($product->description, 100) }}</p>

                        {{-- START: Added Comments Section --}}
                        <div class="mt-2">
                            <h6 class="card-subtitle mb-2 text-muted">التعليقات ({{ $product->comments->count() }})</h6>
                            <ul class="list-group list-group-flush" style="font-size: 0.9rem;">
                                @forelse ($product->comments as $comment)
                                    <li class="list-group-item px-0 py-1">{{ $comment->body }}</li>
                                @empty
                                    <li class="list-group-item px-0 py-1 text-muted">لا توجد تعليقات.</li>
                                @endforelse
                            </ul>
                        </div>
                        {{-- END: Added Comments Section --}}

                        <div class="d-flex justify-content-between align-items-center mt-auto pt-3">
                            <div class="btn-group">
                                <a href="#" class="btn btn-sm btn-outline-secondary">عرض التفاصيل</a>
                                <a href="#" class="btn btn-sm btn-primary">أضف للسلة</a>
                            </div>
                            <span class="text-success fw-bold">{{ money($product->price, 'USD') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-warning text-center">
                    <p>عذراً، لا توجد منتجات متاحة للعرض حالياً.</p>
                </div>
            </div>
        @endforelse
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $products->links() }}
    </div>
</div>
@endsection
