window.onload = function () {
    var url = $(".url").data("url");
    $.ajax({
        type: 'get',
        url: url,
        success: function(data) {
            var orders = JSON.parse(data);
            var barChart = document.getElementById('bar-chart');
            new Chart(barChart, {
                type: 'bar',
                data: {
                    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                    datasets: [
                        {
                            label: 'pending',
                            data: orders[0]['pending'],
                            backgroundColor: 'rgb(0, 0, 255)',
                            borderColor: 'rgba(0, 0, 0)',
                            borderWidth: 0.5
                        },
                        {
                            label: 'approved',
                            data: orders[0]['approved'],
                            backgroundColor: 'rgb(124, 252, 0)',
                            borderColor: 'rgba(0, 0, 0)',
                            borderWidth: 0.5
                        },
                        {
                            label: 'rejected',
                            data: orders[0]['rejected'],
                            backgroundColor: 'rgb(255, 0, 0)',
                            borderColor: 'rgba(0, 0, 0)',
                            borderWidth: 0.5
                        },
                        {
                            label: 'canceled',
                            data: orders[0]['canceled'],
                            backgroundColor: 'rgb(128, 128, 128)',
                            borderColor: 'rgba(0, 0, 0)',
                            borderWidth: 0.5
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
