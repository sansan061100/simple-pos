@extends('admin.layouts.app')

@section('content')
<div class="col-md-4">
    <div class="card">
        <div class="card-header bg-info">
            <h5 class="card-title">Product Information</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th>SKU</th>
                        <td class="text-right">{{ $product->sku }}</td>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <td class="text-right">{{ $product->name }}</td>
                    </tr>
                    <tr>
                        <th>Category</th>
                        <td class="text-right">{{ $product->category }}</td>
                    </tr>
                    <tr>
                        <th>Purchase Price</th>
                        <td class="text-right">{{ rupiah($product->purchase_price) }}</td>
                    </tr>
                    <tr>
                        <th>Selling Price</th>
                        <td class="text-right">{{ rupiah($product->selling_price) }}</td>
                    </tr>
                    <tr>
                        <th>Available Stock</th>
                        <td class="text-right">{{ rupiah($product->stock, '') }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="col-md-8">
    <div class="card-body"></div>
</div>
@endsection