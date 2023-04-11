<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js/dist/chart.umd.min.js"></script>
<script>
    $('.select2').select2({
        theme: 'bootstrap4',
    });

    const dataTopSellProduct = {
        labels: [],
        datasets: [{
            label: 'Sales',
            data: [],
            backgroundColor: [
                'rgb(255, 99, 132)',
                'rgb(54, 162, 235)',
                'rgb(255, 206, 86)',
                'rgb(75, 192, 192)',
                'rgb(153, 102, 255)',
                'rgb(255, 159, 64)'
            ],
            hoverOffset: 4
        }]
    };

    const configTopSellProduct = {
        type: 'pie',
        data: dataTopSellProduct,
        weight: 20
    };

    let topSellProduct = new Chart(
        document.getElementById('topSellProduct'),
        configTopSellProduct
    );


    $('#form-filter').submit(function(e) {
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            url: CURRENT_URL + '/filter',
            type: "GET",
            data: data,
            beforeSend: function() {
                $(".preload").show();
            },
            success: function(response) {
                // Widget
                let widget = '';
                $.each(response.widget, function(key, value) {
                    widget += `
                    <div class="${value.size} col-sm-6 col-12">
                        <div class="info-box">
                            <span class="info-box-icon ${value.color}"><i class="${value.icon}"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">${value.title}</span>
                                <span class="info-box-number">${
                                    key == 4 ? rupiah(value.value) : numeric(value.value)
                                }</span>
                            </div>
                        </div>
                    </div>
                    `
                })
                $('#widget').html(widget);

                topSellProduct.data.labels = response.topSellProduct.labels;
                topSellProduct.data.datasets[0].data = response.topSellProduct.data;
                topSellProduct.update();
            }
        });
    });
</script>
