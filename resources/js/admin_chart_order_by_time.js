window.onload = function () {
    Chart.defaults.global.elements.rectangle.borderColor = '#000';
    Chart.defaults.global.elements.rectangle.borderWidth = 0.5;

    var urlPending = $(".pending").data("url");
    $.ajax({
        type: 'get',
        url: urlPending,
        success: function(data) {
            var data = JSON.parse(data);
            var barChart = document.getElementById('bar-chart-pending');
            barChart.width = 700;
            new Chart(barChart, {
                type: 'bar',
                data: {
                    labels: data[0]['days'],
                    datasets: [
                        {
                            label: 'pending',
                            data: data[0]['pending'],
                            backgroundColor: 'rgb(0, 0, 255)'
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
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

    var urlApproved = $(".approved").data("url");
    $.ajax({
        type: 'get',
        url: urlApproved,
        success: function(data) {
            var data = JSON.parse(data);
            var barChart = document.getElementById('bar-chart-approved');
            barChart.width = 700;
            new Chart(barChart, {
                type: 'bar',
                data: {
                    labels: data[0]['days'],
                    datasets: [
                        {
                            label: 'approved',
                            data: data[0]['approved'],
                            backgroundColor: 'rgb(124, 252, 0)'
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
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

    var urlRejected = $(".rejected").data("url");
    $.ajax({
        type: 'get',
        url: urlRejected,
        success: function(data) {
            var data = JSON.parse(data);
            var barChart = document.getElementById('bar-chart-rejected');
            barChart.width = 700;
            new Chart(barChart, {
                type: 'bar',
                data: {
                    labels: data[0]['days'],
                    datasets: [
                        {
                            label: 'rejected',
                            data: data[0]['rejected'],
                            backgroundColor: 'rgb(255, 0, 0)'
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
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

    var urlCanceled = $(".canceled").data("url");
    $.ajax({
        type: 'get',
        url: urlCanceled,
        success: function(data) {
            var data = JSON.parse(data);
            var barChart = document.getElementById('bar-chart-canceled');
            barChart.width = 700;
            new Chart(barChart, {
                type: 'bar',
                data: {
                    labels: data[0]['days'],
                    datasets: [
                        {
                            label: 'canceled',
                            data: data[0]['canceled'],
                            backgroundColor: 'rgb(128, 128, 128)'
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
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
