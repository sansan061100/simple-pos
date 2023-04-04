<script>
    $(document).ready(function() {
        $('.currencyInput').inputmask({
            alias: "currency",
            prefix: "Rp ",
            digits: 0,
            groupSeparator: ".",
            rightAlign: false,
        })

        $('.numericInput').inputmask({
            alias: "currency",
            digits: 0,
            groupSeparator: ".",
            rightAlign: false,
        })
    })

    let columns = [{
            mData: 'id',
            render: function(data, type, row, meta) {
                return meta.row + meta.settings._iDisplayStart + 1;
            }
        },
        {
            mData: 'photo',
            render: function(data, type, row, meta) {
                let img = data ? BASE_URL + '/storage/product/' + data :
                    "https://media.istockphoto.com/id/1147544807/vector/thumbnail-image-vector-graphic.jpg?s=612x612&w=0&k=20&c=rnCKVbdxqkjlcs3xH87-9gocETqpspHFXu5dIGB4wuM=";
                return `<img src="${img}" alt="" width="75">`;
            }
        },
        {
            data: 'sku',
        },
        {
            data: 'name',
        },
        {
            data: 'category',
            searchable: false,
        },
        {
            mData: 'purchase_price',
            render: function(data, type, row, meta) {
                return rupiah(data);
            }
        },
        {
            mData: 'selling_price',
            render: function(data, type, row, meta) {
                return rupiah(data);
            }
        },
        {
            mData: 'id',
            render: function(data, type, row, meta) {
                return `<button class="btn btn-info btn-sm editData" data-id="${data}">Edit</button>
                            <button class="btn btn-danger btn-sm deleteData" data-id="${data}">Delete</button>`;
            }
        }
    ]
    initDatatable({
        columns: columns,
    });

    // button add modal
    $('#add').on('click', function() {
        $('#form-store').find('input[name="id"]').val('');
        $('#photo').html(`
            <label>Photo</label>
            <input type="file" name="photo" class="dropify">
        `)
        // reset dropify
        $('.dropify').off('change');
        $('.dropify').dropify();
        $('.modal-title').text('Add Category');
        $('#modal-store').modal('show');
        removeValidations();
    });

    $('#table').on('click', '.editData', function() {
        removeValidations();
        let id = $(this).data('id');
        $.ajax({
            url: CURRENT_URL + '/' + id + '/edit',
            type: "GET",
            success: function(result) {
                let img = result.data.photo ? BASE_URL + '/storage/product/' + result.data.photo :
                    '';

                $('.modal-title').text('Edit Category');
                $('#modal-store').modal('show');
                $('#photo').html(`
                    <label>Photo</label>
                    <input type="file" name="photo" class="dropify" data-default-file="${img}">
                `)
                // reset dropify
                $('.dropify').dropify();

                $('#form-store').find('input[name="sku"]').val(result.data.sku);
                $('#form-store').find('input[name="name"]').val(result.data.name);
                $('#form-store').find('select[name="category"]').val(result.data.category_id);
                $('#form-store').find('input[name="purchase_price"]').val(result.data
                    .purchase_price).trigger('input');
                $('#form-store').find('input[name="selling_price"]').val(result.data.selling_price)
                    .trigger('input');
                $('#form-store').find('input[name="id"]').val(result.data.id);
            }
        })
    });

    $('#table').on('click', '.deleteData', function() {
        let id = $(this).data('id');

        deleteData({
            url: CURRENT_URL + '/' + id,
            table: 'table',
        })
    });

    // submit form store
    $('#form-store').on('submit', function(e) {
        e.preventDefault();

        // setIsValid all input, select, textarea
        setIsValid('#form-store input , #form-store select, #form-store textarea');

        let data = new FormData(this);

        storeData({
            data: data,
        })
    });

    // add stock
    $('#add-stock').on('click', function() {
        $('.modal-title-stock').text('Add Stock');

        $('#modal-stock').modal('show');
        removeValidations();
    });

    // ajax select2
    $('#form-stock select[name="product"]').select2({
        placeholder: 'Select Product',
        ajax: {
            url: BASE_URL + '/admin/product/select2',
            dataType: 'json',
            delay: 250,
            data: function(params) {
                return {
                    q: params.term,
                    page: params.page || 1
                }
            },
            processResults: function(data, params) {
                params.page = params.page || 1;
                return {
                    results: data.data,
                    pagination: {
                        more: (params.page * 10) < data.total
                    }
                }
            },
            cache: true
        }
    });
</script>