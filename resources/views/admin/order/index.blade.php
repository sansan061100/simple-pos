@extends('admin.layouts.app')

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <div class="float-right">
                <a class="btn btn-info" href="{{ route('admin.order.create') }}">Add</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table w-100" id="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Date</th>
                            <th>Invoice Code</th>
                            <th>Customer</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
@include('admin.plugins.datatable-css')
@endpush

@push('scripts')
@include('admin.plugins.datatable-js')
@include('admin.order.script')
@endpush