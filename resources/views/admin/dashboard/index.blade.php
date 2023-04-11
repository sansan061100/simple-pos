@extends('admin.layouts.app')

@section('content')
    <div class="col-md-12">
        <form class="card" id="form-filter">
            <div class="card-header">
                <div class="row">
                    <div class="form-group col-md-3">
                        <label>Month</label>
                        <select name="month" class="select2 form-control" style="width: 100%">
                            <option value="">Month</option>
                            @foreach (allMonths() as $key => $month)
                                <option value="{{ $key }}">
                                    {{ $month }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Year</label>
                        <select name="year" class="select2 form-control" style="width: 100%">
                            <option value="">Year</option>
                            @foreach (allYears(2023, 5, 5) as $year)
                                <option value="{{ $year }}">
                                    {{ $year }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <label>&nbsp;</label>
                        <button class="btn btn-primary btn-block" type="submit">Filter</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="col-md-12">
        <div class="row" id="widget"></div>
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

        $('#form-filter').submit(function(e) {
            e.preventDefault();
            var data = $(this).serialize();
            $.ajax({
                url: CURRENT_URL + '/filter',
                type: "GET",
                data: data,
                success: function(response) {
                    let widget = '';
                    $.each(response.widget, function(key, value) {
                        widget += `
                        <div class="${value.size} col-sm-6 col-12">
                            <div class="info-box">
                                <span class="info-box-icon ${value.color}"><i class="${value.icon}"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">${value.title}</span>
                                    <span class="info-box-number">${
                                        key == 4 ? rupiah(value.value) : numeric(value.value)
                                    }</span>
                                </div>
                            </div>
                        </div>
                        `
                    })

                    $('#widget').html(widget);
                }
            });
        });
    </script>
@endpush
