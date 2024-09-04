@php
    // Determine the indentation prefix based on the level
    $indent = str_repeat('-', $level * 2);
@endphp

<option value="{{ $category->id }}" {{ old('category_id', $product->category_id ?? '') == $category->id ? 'selected' : '' }}>
    {{ $indent }} {{ $category->category_name }}
</option>

@foreach ($categories->where('parent_cat_id', $category->id) as $subCategory)
    @include('ecommerce.backend.partials.category-option', ['category' => $subCategory, 'categories' => $categories, 'level' => $level + 1])
@endforeach
