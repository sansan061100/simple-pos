@extends('admin.layouts.pos')

@section('content')
    <section class="section-content padding-y-sm bg-default " x-data>
        <div class="container-fluid" x-init="$store.pos.fetchProduct()">
            <div class="row">
                @include('admin.transaction.components.product')
                <div class="col-md-4">
                    @include('admin.transaction.components.cart')
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
                                    <input type="number" class="form-control" x-model="$store.pos.discount" max="100"
                                        min="0" @keyup="$store.pos.calculate()">
                                    <div class="input-group-append">
                                        <span class="input-group-text">%</span>
                                    </div>
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
                        <div class="row">
                            <div class="col-md-6">
                                <a href="{{ route('admin.transaction.index') }}" class="btn btn-danger btn-lg btn-block"><i
                                        class="fa fa-times-circle "></i> Cancel </a>
                            </div>
                            <div class="col-md-6">
                                <a href="#" class="btn  btn-primary btn-lg btn-block"><i
                                        class="fa fa-shopping-bag"></i>
                                    Charge </a>
                            </div>
                        </div>
                    </div> <!-- box.// -->
                </div>
            </div>
        </div><!-- container //  -->
    </section>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('dist/css/pos.css') }}">
@endpush

@push('scripts')
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/axios@1.1.2/dist/axios.min.js"></script>
    <script src="{{ asset('dist/js/pos.js') }}"></script>
@endpush
