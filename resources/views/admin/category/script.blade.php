<script>
    // init datatable
    $('#table').DataTable({
        processing: true,
        serverSide: true,
        ajax: BASE_URL + '/admin/category',
        columns: [{
                mData: 'id',
                render: function(data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            {
                data: 'name',
            },
            {
                mData: 'id',
                render: function(data, type, row, meta) {
                    return `<button class="btn btn-info btn-sm editData" data-id="${data}">Edit</button>
                            <button class="btn btn-danger btn-sm deleteData" data-id="${data}">Delete</button>`;
                }
            }
        ]
    });

    // button add modal
    $('#add').on('click', function() {
        $('.modal-title').text('Add Category');
        $('#modal-store').modal('show');
        removeValidations();
    });

    $('#table').on('click', '.editData', function() {
        removeValidations();
        let id = $(this).data('id');
        $.ajax({
            url: BASE_URL + '/admin/category/' + id + '/edit',
            type: "GET",
            success: function(result) {
                $('.modal-title').text('Edit Category');
                $('#modal-store').modal('show');
                $('#form-store').find('input[name="name"]').val(result.data.name);
                $('#form-store').find('input[name="id"]').val(result.data.id);
            }
        })
    });

    $('#table').on('click', '.deleteData', function() {
        let id = $(this).data('id');
        let konfirmasi = confirm('Are you sure?');

        if (konfirmasi) {
            $.ajax({
                url: BASE_URL + '/admin/category/' + id,
                type: "DELETE",
                success: function(result) {
                    successNotif(result.message);
                    $('#table').DataTable().ajax.reload();
                },
                error: function(error) {
                    errorNotif(res.message);
                }
            })
        }
    });

    // submit form
    $('#form-store').on('submit', function(e) {
        e.preventDefault();
        // setIsValid all input, select, textarea
        setIsValid('#form-store input , #form-store select, #form-store textarea');

        let data = $(this).serialize();
        storeData({
            data: data,
        })
    });
</script>
