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
        customer: '',
        paid: '',
        charge: 0,
        // invoiceCode: '',
        // dateTime: '',
        async init() {
            this.fetchProduct()
        },
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

            this.calculate()
        },
        async addToCart(product) {
            let cartData = {
                id: product.id,
                name: product.name,
                price: product.selling_price,
                qty: 1,
                image: imageUrl(product.photo),
            }

            // check if product already in cart
            let index = this.cart.findIndex(item => item.id == product.id)
            if (index > -1) {
                this.cart[index].qty++
            } else {
                this.cart.push(cartData)
            }

            this.calculate()
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
            let paid = 0;
            // remove dot and Rp
            paid = this.paid.replace(/[^,\d]/g, '').toString()

            this.charge = (paid - this.total) < 0 ? 0 : paid - this.total
        },
        async checkout() {

            let paid = this.paid.replace(/[^,\d]/g, '').toString()
            console.log(paid < this.total ? 'true' : 'false')
            if (this.cart.length == 0) {
                errorNotif('Cart is empty')
                return
            }



            if (paid < this.total) {
                errorNotif('Paid is less than total')
                return
            }

            let data = {
                cart: this.cart,
                discount: this.discount,
                total: this.total,
                customer: this.customer,
                paid: this.paid.replace(/[^,\d]/g, '').toString()
            }

            const response = await axios.post(BASE_URL + '/admin/order', data)
                .then(response => {
                    successNotif(response.data.message)
                    setTimeout(() => {
                        window.location.href = response.data.redirect
                    }, 1000);
                })
                .catch(error => {
                    errorNotif(error.message)
                })
        },
        // async dateTimeTick() {
        //     let date = new Date()
        //     let day = date.getDate()
        //     let month = date.getMonth() + 1
        //     let year = date.getFullYear()
        //     let hour = date.getHours()
        //     let minute = date.getMinutes()
        //     let second = date.getSeconds()

        //     this.dateTime = day + '/' + month + '/' + year + ' ' + hour + ':' + minute + ':' +
        //         second
        // }
    });
})
