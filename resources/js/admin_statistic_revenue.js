window.onload = function () {
    function currencyFormat(number) {
        return new Number(number).toLocaleString('en-US');
    }

    var url = $(".revenue-in-month").data("url");
    $.ajax({
        type: 'get',
        url: url,
        success: function(data) {
            var data = JSON.parse(data);
            var barChart = document.getElementById('bar-chart-revenue');
            new Chart(barChart, {
                type: 'bar',
                data: {
                    labels: data[0]['days'],
                    datasets: [
                        {
                            label: 'day of month',
                            data: data[0]['revenue'],
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
                                callback: function(value, index, values) {
                                    return currencyFormat(value);
                                },
                                stepSize: 10000000
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
