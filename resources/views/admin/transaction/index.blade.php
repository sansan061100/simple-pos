@extends('admin.layouts.app')

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <div class="float-right">
                <a class="btn btn-info" href="{{ route('admin.transaction.create') }}">Add</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table w-100" id="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
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
@endpush