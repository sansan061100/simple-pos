<script>
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
</script>
