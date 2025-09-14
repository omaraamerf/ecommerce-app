<div class="mb-3">
    <label for="title" class="form-label">عنوان المنتج</label>
    <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $product ?? null) }}" required>
    @error('title') <div class="form-error">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label for="price" class="form-label">السعر</label>
    <input type="number" step="0.01" class="form-control" id="price" name="price" value="{{ old('price', $product ?? null) }}" required>
    @error('price') <div class="form-error">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label for="stock" class="form-label">المخزون</label>
    <input type="number" class="form-control" id="stock" name="stock" value="{{ old('stock', $product ?? null) }}" required>
    @error('stock') <div class="form-error">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label for="category_id" class="form-label">القسم</label>
    <select class="form-select" id="category_id" name="category_id">
        <option value="">-- اختر قسم --</option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}" @selected(old('category_id', $product ?? null) == $category->id)>{{ $category->name }}</option>
        @endforeach
    </select>
    @error('category_id') <div class="form-error">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label for="description" class="form-label">الوصف</label>
    <textarea class="form-control" id="description" name="description" rows="4">{{ old('description', $product ?? null) }}</textarea>
    @error('description') <div class="form-error">{{ $message }}</div> @enderror
</div>
<div class="mb-3">
    <label for="status" class="form-label">حالة المنتج</label>
    <select class="form-select" id="status" name="status">
        @foreach($statuses as $status)
            <option value="{{ $status->value }}" @selected(old('status', $product->status->value ?? '') == $status->value)>
                {{ $status->label() }}
            </option>
        @endforeach
    </select>
    @error('status') <div class="form-error">{{ $message }}</div> @enderror
</div>


<div class="form-check mb-3">
    <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" @checked(old('is_active', $product->is_active ?? true))>
    <label class="form-check-label" for="is_active">
        فعال
    </label>
</div>
