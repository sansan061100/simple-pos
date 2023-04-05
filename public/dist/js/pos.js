document.addEventListener('alpine:init', async () => {


    Alpine.store('pos', {
        products: [],
        emptyProducts: false,
        cart: [],
        search: '',
        category: '',
        loading: false,
        subTotal: 0,
        total: 0,
        discount: 0,
        async fetchProduct() {
            let url = BASE_URL + '/admin/api/product' + '?q=' + this.search + '&category=' +
                this.category
            const response = await axios.get(url)
                .then(response => {
                    this.loading = false
                    this.products = response.data

                    if (this.products.length == 0) {
                        this.emptyProducts = true
                    } else {
                        this.emptyProducts = false
                    }
                })

            this.subTotalCount()
        },
        async addToCart(product) {
            let cartData = {
                id: product.id,
                name: product.name,
                price: product.selling_price,
                qty: 1,
                image: imageUrl(product.photo)
            }

            // check if product already in cart
            let index = this.cart.findIndex(item => item.id == product.id)
            if (index > -1) {
                this.cart[index].qty++
            } else {
                this.cart.push(cartData)
            }

            this.subTotalCount()
        },
        async changeQty(id, qty) {
            let index = this.cart.findIndex(item => item.id == id)
            if (index > -1) {
                this.cart[index].qty += qty
                if (this.cart[index].qty < 1) {
                    this.cart[index].qty = 1
                }
            }

            this.calculate()
        },
        async deleteItem(id) {
            let index = this.cart.findIndex(item => item.id == id)
            if (index > -1) {
                this.cart.splice(index, 1)
            }
            this.calculate()
        },
        async subTotalCount() {
            let subTotal = 0
            this.cart.forEach(item => {
                subTotal += item.price * item.qty
            });

            this.subTotal = subTotal
        },
        async calculate() {
            this.subTotalCount()
            let discount = this.discount / 100 * this.subTotal
            this.total = this.subTotal - discount
        }
    });
})
