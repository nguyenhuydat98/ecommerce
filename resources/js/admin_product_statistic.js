window.onload = function () {
    var url = $(".product-statistic").data("url");
    // console.log(url);
    $.ajax({
        type: 'get',
        url: url,
        success: function(data) {
            var data = JSON.parse(data);
            // console.log(data[0]['item']);
            var barChart = document.getElementById('bar-chart-product');
            new Chart(barChart, {
                type: 'bar',
                data: {
                    labels: data[0]['item'],
                    datasets: [
                        {
                            label: 'product',
                            data: data[0]['quantity'],
                            backgroundColor: 'rgba(0, 128, 128, 0.5)',
                            borderColor: 'rgba(0, 0, 0)',
                            borderWidth: 1
                        }
                    ]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true,
                                stepSize: 1
                            }
                        }]
                    },
                    tooltips: {
                        mode: 'index',
                        intersect: false
                    }
                }
            });
        }
    });
};
