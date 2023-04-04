@extends('admin.layouts.app')

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <div class="float-right">
                <button class="btn btn-primary" id="add-stock">Add Stock</button>
                <button class="btn btn-info" id="add">Add</button>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table w-100" id="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Photo</th>
                            <th>SKU</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Purchase Price</th>
                            <th>Selling Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

@include('admin.product.modal')
@include('admin.product.modal-stock')

@endsection

@push('styles')
@include('admin.plugins.datatable-css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css">

<style>
    .dropify-wrapper .dropify-message p {
        font-size: 20px;
    }
</style>
@endpush

@push('scripts')
@include('admin.plugins.datatable-js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.8/jquery.inputmask.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>

@include('admin.product.script')
@endpush