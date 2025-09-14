<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'متجر إلكتروني')</title>
    {{-- Bootstrap CSS --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css">
    <style>
        body { padding-top: 60px; }
        .form-error { color: red; font-size: 0.875em; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
  <div class="container">
    <a class="navbar-brand" href="{{ url('/') }}">متجري</a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav me-auto mb-2 mb-md-0">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('products.index') }}">المنتجات</a>
        </li>
        @auth
          @if(auth()->user()->hasRole('admin'))
            <li class="nav-item">
              <a class="nav-link" href="{{ route('roles.index') }}">الأدوار والصلاحيات</a>
            </li>
          @endif
        @endauth
        <li class="nav-item">
            <a class="nav-link" href="{{ route('shop.index') }}">المتجر</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<main class="container mt-4">
    @if(session('ok'))
        <div class="alert alert-success">
            {{ session('ok') }}
        </div>
    @endif
    @yield('content')
</main>

{{-- Bootstrap JS --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
