$(document).ready(function () {
    var stackedBarChartCanvas = $('#locations').get(0).getContext('2d')
    var donutChartCanvas = $('#donutChart').get(0).getContext('2d')

    $.ajax({
        type: "GET",
        url: "/graph",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {},
        dataType: 'json',
        success: function (data) {
            console.log(data);
            locationsChart(data.sold, data.notSold, stackedBarChartCanvas);
            standsCount(data.stands, donutChartCanvas);
        }
    });
});

function locationsChart(soldValues, notSoldValues, chart) {
    var labels = [];
    var sold = [];
    var notSold = [];

    for (var i in soldValues) {
        labels.push(soldValues[i].name);
        sold.push(soldValues[i].count);
    }
    for (var i in notSoldValues) {
        notSold.push(notSoldValues[i].count);
    }

    var chartData = {
        labels: labels,
        datasets: [{
                label: 'Sold Stands',
                backgroundColor: 'rgba(60,141,188,0.9)',
                borderColor: 'rgba(60,141,188,0.8)',
                pointRadius: false,
                pointColor: '#3b8bba',
                pointStrokeColor: 'rgba(60,141,188,1)',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgba(60,141,188,1)',
                data: sold
            },
            {
                label: 'Stands Not Sold',
                backgroundColor: 'rgba(210, 214, 222, 1)',
                borderColor: 'rgba(210, 214, 222, 1)',
                pointRadius: false,
                pointColor: 'rgba(210, 214, 222, 1)',
                pointStrokeColor: '#c1c7d1',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgba(220,220,220,1)',
                data: notSold
            },
        ]
    }

    var barChartData = jQuery.extend(true, {}, chartData)
    var temp0 = chartData.datasets[0]
    var temp1 = chartData.datasets[1]
    barChartData.datasets[0] = temp1
    barChartData.datasets[1] = temp0

    var stackedBarChartData = jQuery.extend(true, {}, barChartData)

    var stackedBarChartOptions = {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            xAxes: [{
                stacked: true,
            }],
            yAxes: [{
                stacked: true
            }]
        }
    }

    var stackedBarChart = new Chart(chart, {
        type: 'bar',
        data: stackedBarChartData,
        options: stackedBarChartOptions
    })
}

function standsCount(data, chart) {
    //console.log(data);
    var labels = [];
    var values = [];

    for (var i in data) {
        labels.push(data[i].name);
        values.push(data[i].count);
    }

    var donutData = {
        labels: labels,
        datasets: [{
            data: values,
            backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
        }]
    }
    var donutOptions = {
        maintainAspectRatio: false,
        responsive: true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    var donutChart = new Chart(chart, {
        type: 'doughnut',
        data: donutData,
        options: donutOptions
    })
}
