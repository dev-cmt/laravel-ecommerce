<h3 class="tp-shop-widget-title">Applied Filters</h3>
<ul id="active-filters-list">
    @if(!empty($appliedFilters['price']))
        <li>Price: {{ $appliedFilters['price'] }}</li>
    @endif
    @if(!empty($appliedFilters['categories']))
        @foreach($appliedFilters['categories'] as $categoryId)
            <li>Category: {{ $categories->find($categoryId)->category_name }}</li>
        @endforeach
    @endif
    @if(!empty($appliedFilters['colors']))
        @foreach($appliedFilters['colors'] as $colorId)
            <li>Color: {{ $colors->find($colorId)->color_name }}</li>
        @endforeach
    @endif
</ul>
<button id="clear-filters" class="tp-shop-widget-filter-btn" type="button">Clear All</button>
