<script>
    let columns = [{
            mData: 'id',
            render: function(data, type, row, meta) {
                return meta.row + meta.settings._iDisplayStart + 1;
            }
        },
        {
            mData: 'created_at',
            render: function(data, type, row, meta) {
                return new Date(data).toLocaleDateString('id-ID', {
                    day: '2-digit',
                    month: '2-digit',
                    year: 'numeric',
                    hour: '2-digit',
                    minute: '2-digit'
                });
            }
        },
        {
            data: 'invoice_code',
        },
        {
            mData: 'customer',
            render: function(data, type, row, meta) {
                return data ?? '-'
            }
        },
        {
            mData: 'amount',
            render: function(data, type, row, meta) {
                return rupiah(data);
            }
        },
        {
            mData: 'status',
            render: function(data, type, row, meta) {
                return data == 1 ? `<span class="badge badge-success">Success</span>` :
                    `<span class="badge badge-danger">Canceled</span>`
            }
        },
        {
            mData: 'id',
            render: function(data, type, row, meta) {
                return `
                <a class="btn btn-warning btn-sm" href="${CURRENT_URL+'/'+data}">Detail</a>
                <button class="btn btn-danger btn-sm editData" data-id="${data}">Cancel</button>`;
            }
        }
]

initDatatable({
    columns: columns,
});
</script>