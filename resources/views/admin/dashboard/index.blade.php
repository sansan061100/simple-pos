@extends('admin.layouts.app')

@section('content')
    <div class="col-md-12">
        <form class="card">
            <div class="card-header">
                <div class="row">
                    <div class="form-group col-md-3">
                        <label>Month</label>
                        <select name="month" class="select2 w-100">
                            <option value="">Month</option>
                            @foreach (allMonths() as $key => $month)
                                <option value="{{ $key }}">
                                    {{ $month }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Year</label>
                        <select name="year" class="select2 w-100">
                            <option value="">Year</option>
                            @foreach (allYears(2023, 5, 5) as $year)
                                <option value="{{ $year }}">
                                    {{ $year }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <label>&nbsp;</label>
                        <button class="btn btn-primary btn-block">Filter</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
            <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">User</span>
                <span class="info-box-number">1,410</span>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
            <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Product</span>
                <span class="info-box-number">1,410</span>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
            <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Customer</span>
                <span class="info-box-number">1,410</span>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
            <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Order</span>
                <span class="info-box-number">1,410</span>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    @include('admin.plugins.select2-css')
@endpush

@push('scripts')
    @include('admin.plugins.select2-js')
    <script>
        $('.select2').select2({
            theme: 'bootstrap4',
        });
    </script>
@endpush
