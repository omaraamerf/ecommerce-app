@extends('layouts.app')

@section('title', 'إدارة الأدوار والصلاحيات')

@section('content')
<h1>إدارة الأدوار والصلاحيات</h1>

<div class="row">
    {{-- إنشاء دور جديد --}}
    <div class="col-md-4">
        <h3>إنشاء دور جديد</h3>
        <form action="{{ route('roles.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">اسم الدور</label>
                <input type="text" name="name" id="name" class="form-control" required>
                @error('name')<div class="form-error">{{ $message }}</div>@enderror
            </div>
            <button type="submit" class="btn btn-primary">إنشاء</button>
        </form>
    </div>

    {{-- عرض الأدوار الحالية --}}
    <div class="col-md-8">
        <h3>الأدوار الحالية</h3>
        @foreach ($roles as $role)
            <div class="card mb-3">
                <div class="card-header">
                    {{ $role->name }}
                </div>
                <div class="card-body">
                    <h5>الصلاحيات الممنوحة:</h5>
                    @forelse ($role->permissions as $permission)
                        <span class="badge bg-success me-1">
                            {{ $permission->name }}
                            <form action="{{ route('roles.permissions.detach', $role) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="permission" value="{{ $permission->name }}">
                                <button type="submit" class="btn-close btn-close-white" aria-label="Close" style="font-size: 0.5em;"></button>
                            </form>
                        </span>
                    @empty
                        <p>لا توجد صلاحيات لهذا الدور.</p>
                    @endforelse

                    <hr>
                    <h5>إضافة صلاحية جديدة:</h5>
                    <form action="{{ route('roles.permissions.attach', $role) }}" method="POST">
                        @csrf
                        <div class="input-group">
                            <select name="permission" class="form-select">
                                @foreach ($perms as $perm)
                                    <option value="{{ $perm->name }}">{{ $perm->name }}</option>
                                @endforeach
                            </select>
                            <button class="btn btn-outline-secondary" type="submit">إضافة</button>
                        </div>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
