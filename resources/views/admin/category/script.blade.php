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
        ]
    });

    // button add modal
    $('#add').on('click', function() {
        $('.modal-title').text('Add Category');
        $('#modal-store').modal('show');
    });

    // submit form
    $('#form-store').on('submit', function(e) {
        e.preventDefault();
        // setIsValid all input, select, textarea
        setIsValid('#form-store input , #form-store select, #form-store textarea');

        let data = $(this).serialize();
        $.ajax({
            url: BASE_URL + '/admin/category',
            type: "POST",
            data: data,
            success: function(result) {
                successNotif(result.message);
                $('#modal-store').modal('hide');
            },
            error: function(error) {
                let res = error.responseJSON;

                if (error.status == 422) {
                    errorNotif('Please check your input');
                    $.each(res.errors, function(key, value) {
                        $('#form-store').find('input[name="' + key + '"]').addClass(
                            'is-invalid').removeClass('is-valid').after(
                            '<span class="invalid-feedback">' + value + '</span>');

                        $('#form-store').find('textare[name="' + key + '"]').addClass(
                            'is-invalid').removeClass('is-valid').after(
                            '<span class="invalid-feedback">' + value + '</span>');

                        $('#form-store').find('select[name="' + key + '"]').addClass(
                            'is-invalid').removeClass('is-valid').after(
                            '<span class="invalid-feedback">' + value + '</span>');
                    });
                } else {
                    errorNotif(res.message);
                    alert('Error');
                }
            }
        })
    });
</script>
