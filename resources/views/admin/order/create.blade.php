@extends('admin.layouts.pos')

@section('content')
    @php
        $invoiceCode = 'INV-' . date('YmdHis');
    @endphp
    <form @submit.prevent="$store.pos.checkout()" method="POST" x-data>

        <section class="section-content padding-y-sm bg-default " x-data>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card" x-init="$store.pos.init()">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">Cashier</label>
                                                    <input type="text" disabled value="{{ auth()->user()->name }}"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group" x-init="() => {
                                                    select2 = $($refs.select).select2({
                                                        theme: 'bootstrap4',
                                                    });
                                                    select2.on('select2:select', (event) => {
                                                        $store.pos.customer = event.target.value;
                                                    });
                                                }">
                                                    <label for="">Customer</label>
                                                    <select class="form-control" x-model="$store.pos.customer"
                                                        x-ref="select">
                                                        <option value="">Customer</option>
                                                        @foreach ($customer as $item)
                                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            {{-- <div class="col-md-3">
                                                <label for="">&nbsp;</label>
                                                <input type="text" readonly class="form-control" x-model="$store.pos.dateTime">
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-search"></i></span>
                                            </div>
                                            <input type="search" class="form-control" placeholder="Search..."
                                                x-model="$store.pos.search" @input="$store.pos.fetchProduct()">
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <ul class=" nav bg radius nav-pills nav-fill mb-3 bg" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active show" data-toggle="pill"
                                                    @click="$store.pos.category = ''; $store.pos.fetchProduct()">
                                                    <i class="fa fa-tags pr-2"></i> All</a>
                                            </li>
                                            @foreach ($category as $item)
                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="pill"
                                                        @click="$store.pos.category = {{ $item->id }}; $store.pos.fetchProduct()">
                                                        <i class="fa fa-tags pr-2"></i> {{ $item->name }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                        @include('admin.order.components.product')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        @include('admin.order.components.cart')
                        <div class="box">
                            {{-- <dl class="dlist-align">
                                <dt>Tax: </dt>
                                <dd class="text-right">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="" value="0">
                                        <div class="input-group-append">
                                            <span class="input-group-text">%</span>
                                        </div>
                                    </div>
                                </dd>
                            </dl> --}}
                            <dl class="dlist-align">
                                <dt>Discount:</dt>
                                <dd class="text-right">
                                    <div class="input-group">
                                        <input type="number" class="form-control" x-model="$store.pos.discount"
                                            max="100" min="0" @keyup="$store.pos.calculate()">
                                        <div class="input-group-append">
                                            <span class="input-group-text">%</span>
                                        </div>
                                    </div>
                                </dd>
                            </dl>
                            <dl class="dlist-align">
                                <dt>Paid:</dt>
                                <dd class="text-right">
                                    <div class="input-group" x-init="paid = $($refs.paid).inputmask({
                                        alias: 'currency',
                                        prefix: 'Rp ',
                                        digits: 0,
                                        groupSeparator: '.',
                                        rightAlign: false,
                                    });
                                    paid.on('keyup', (event) => {
                                        $store.pos.paid = event.target.value;
                                        $store.pos.calculate();
                                    });">
                                        <input type="text" class="form-control" x-ref="paid">
                                    </div>
                                </dd>
                            </dl>
                            <dl class="dlist-align">
                                <dt>Sub Total:</dt>
                                <h5 class="text-right" x-text="rupiah($store.pos.subTotal)"></h5>
                            </dl>
                            <dl class="dlist-align">
                                <dt>Total: </dt>
                                <dd class="text-right h4" x-text="rupiah($store.pos.total)"></dd>
                            </dl>
                            <dl class="dlist-align">
                                <dt>Charge: </dt>
                                <dd class="text-right h4" x-text="rupiah($store.pos.charge)"></dd>
                            </dl>

                            <hr>

                            <div class="row">
                                <div class="col-md-6">
                                    <a href="{{ route('admin.order.index') }}" class="btn btn-danger btn-lg btn-block"><i
                                            class="fa fa-times-circle "></i> Cancel
                                    </a>
                                </div>
                                <div class="col-md-6">
                                    <button type="submit" class="btn  btn-primary btn-lg btn-block"><i
                                            class="fa fa-shopping-bag"></i>
                                        Charge </button>
                                </div>
                            </div>
                        </div> <!-- box.// -->
                    </div>
                </div>
            </div><!-- container //  -->
        </section>
    </form>
@endsection

@push('styles')
    @include('admin.plugins.select2-css')
    <link rel="stylesheet" href="{{ asset('dist/css/pos.css') }}">
@endpush

@push('scripts')
    @include('admin.plugins.select2-js')
    @include('admin.plugins.jquery-mask-js')
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/axios@1.1.2/dist/axios.min.js"></script>
    <script>
        $('.select2').select2({
            theme: 'bootstrap4'
        });
    </script>
    <script src="{{ asset('dist/js/pos.js') }}"></script>
@endpush
