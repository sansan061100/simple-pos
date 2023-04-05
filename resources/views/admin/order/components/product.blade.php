<span id="items">
    <div class="row">

        <template x-if="$store.pos.emptyProducts">
            {{-- center & middle --}}
            <div class="w-100 pt-5 d-flex flex-column justify-content-center align-items-center my-auto mx-auto">
                <div>
                    <img src="{{ asset('dist/img/undraw_not_found_re_bh2e.svg') }}" width="200">
                </div>
                <h4 class="mt-5">Product Not Found</h4>
            </div>

        </template>

        <template x-for="product in $store.pos.products" :key="product.id">
            <div class="col-md-3">
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
