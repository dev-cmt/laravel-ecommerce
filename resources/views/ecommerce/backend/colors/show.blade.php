<x-app-layout :title="'Color Details'">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Color Details</h4>
                </div>
                <div class="card-body">
                    <p><strong>Color Name:</strong> {{ $color->color_name }}</p>
                    <p><strong>Hex Value:</strong> {{ $color->hex_value }}</p>
                    <a href="{{ route('colors.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
