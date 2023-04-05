@extends('admin.layouts.pos')

@section('content')

<section class="section-content padding-y-sm bg-default " x-data>
    <div class="container-fluid" x-init="$store.pos.fetchProduct()">
        <div class="row">
            <div class="col-md-8 card padding-y-sm card " style="height: 750px;overflow-y: scroll">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-search"></i></span>
                    </div>
                    <input type="search" class="form-control" placeholder="Search..." x-model="$store.pos.search"
                        @keyup="$store.pos.fetchProduct()">
                </div>
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
                <span id="items">
                    <div class="row">
                        <template x-if="$store.pos.products.length == 0" x-cloak>
                            <div class="col-md-12">
                                Not Found
                            </div>
                        </template>
                        <template x-for="product in $store.pos.products" :key="product.id">
                            <div class="col-md-2">
                                <figure class="card card-product" @click="$store.pos.addToCart(product)">
                                    {{-- <span class="badge-new"> NEW </span> --}}
                                    <div class="img-wrap">
                                        <img :src="imageUrl(product.photo)">
                                    </div>
                                    <figcaption class="info-wrap">
                                        <a href="#" class="title" x-text="product.name"></a>
                                        <div class="action-wrap">
                                            <div class="price-wrap h5">
                                                <span class="price-new" x-text="rupiah(product.selling_price)"></span>
                                            </div> <!-- price-wrap.// -->
                                        </div> <!-- action-wrap -->
                                    </figcaption>
                                </figure> <!-- card // -->
                            </div> <!-- col // -->
                        </template>
                    </div> <!-- row.// -->
                </span>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <span id="cart">
                        <div class="table-responsive">
                            <table class="table table-hover shopping-cart-wrap">
                                <thead class="text-muted">
                                    <tr>
                                        <th scope="col">Item</th>
                                        <th scope="col" width="120">Qty</th>
                                        <th scope="col" width="120">Price</th>
                                        <th scope="col" class="text-right" width="200">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <template x-for="item in $store.pos.cart" :key="item.id">
                                        <tr>
                                            <td>
                                                <figure class="media">
                                                    <div class="img-wrap"><img :src="item.image"
                                                            class="img-thumbnail img-xs"></div>
                                                    <figcaption class="media-body">
                                                        <h6 class="title text-truncate" x-text="item.name"></h6>
                                                    </figcaption>
                                                </figure>
                                            </td>
                                            <td class="text-center">
                                                <div class="m-btn-group m-btn-group--pill btn-group mr-2" role="group"
                                                    aria-label="...">
                                                    <button type="button" class="m-btn btn btn-default"><i
                                                            class="fa fa-minus"
                                                            @click="$store.pos.changeQty(item.id, -1)"></i></button>
                                                    <button type="button" class="m-btn btn btn-default" disabled
                                                        x-text="item.qty"></button>
                                                    <button type="button" class="m-btn btn btn-default"><i
                                                            class="fa fa-plus"
                                                            @click="$store.pos.changeQty(item.id, 1)"></i></button>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="price-wrap">
                                                    <p x-text="rupiah(item.price)"></p>
                                                </div> <!-- price-wrap .// -->
                                            </td>
                                            <td class="text-right">
                                                <a href="" class="btn btn-outline-danger"> <i
                                                        class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    </template>
                                </tbody>
                            </table>
                        </div>
                    </span>
                </div> <!-- card.// -->
                <div class="box">
                    <dl class="dlist-align">
                        <dt>Tax: </dt>
                        <dd class="text-right">12%</dd>
                    </dl>
                    <dl class="dlist-align">
                        <dt>Discount:</dt>
                        <dd class="text-right"><a href="#">0%</a></dd>
                    </dl>
                    <dl class="dlist-align">
                        <dt>Sub Total:</dt>
                        <dd class="text-right">$215</dd>
                    </dl>
                    <dl class="dlist-align">
                        <dt>Total: </dt>
                        <dd class="text-right h4 b"> $215 </dd>
                    </dl>
                    <div class="row">
                        <div class="col-md-6">
                            <a href="#" class="btn  btn-default btn-error btn-lg btn-block"><i
                                    class="fa fa-times-circle "></i> Cancel </a>
                        </div>
                        <div class="col-md-6">
                            <a href="#" class="btn  btn-primary btn-lg btn-block"><i class="fa fa-shopping-bag"></i>
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
<style>
    [x-cloak] {
        display: none !important;
    }
</style>
@endpush

@push('scripts')
<script src="//unpkg.com/alpinejs" defer></script>
<script src="https://cdn.jsdelivr.net/npm/axios@1.1.2/dist/axios.min.js"></script>
<script>
    document.addEventListener('alpine:init', async () => {
    Alpine.store('pos', {
        products: [],
        cart: [],
        search : '',
        category : '',
        loading : false,
        async fetchProduct() {
            let url = BASE_URL + '/admin/api/product' + '?q=' + this.search + '&category=' + this.category
            const response = await axios.get(url)
            .then(response => {
                this.loading = false
                this.products = response.data
            })
        },
        async addToCart(product) {
            let cartData = {
                id: product.id,
                name: product.name,
                price: product.selling_price,
                qty: 1,
                image : imageUrl(product.photo)
            }

            // check if product already in cart
            let index = this.cart.findIndex(item => item.id == product.id)
            if (index > -1) {
                this.cart[index].qty++
            } else {
                this.cart.push(cartData)
            }
            console.log(this.cart)
        },
        async changeQty(id, qty) {
            let index = this.cart.findIndex(item => item.id == id)
            if (index > -1) {
                this.cart[index].qty += qty
                if (this.cart[index].qty < 1) {
                    this.cart[index].qty = 1
                }
            }
        },
    });
})
</script>
@endpush