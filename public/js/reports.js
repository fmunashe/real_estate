$(document).ready(function () {
    var stackedBarChartCanvas = $('#locations').get(0).getContext('2d')
    var revenueChart = $('#revenue').get(0).getContext('2d')

    $.ajax({
        type: "GET",
        url: "/reports/data",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {},
        dataType: 'json',
        success: function (data) {
            console.log(data);
            report(data, stackedBarChartCanvas);
        }
    });


});

$('.daterange').daterangepicker({
    ranges: {
        'Today': [moment(), moment()],
        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
        'This Month': [moment().startOf('month'), moment().endOf('month')],
        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
    },
    startDate: moment().subtract(29, 'days'),
    endDate: moment()
}, function (start, end) {
    const startDate = start.format('YYYY-MM-DD');
    const endDate = end.format('YYYY-MM-DD');
    var revenueChart = $('#revenue').get(0).getContext('2d')

    $.ajax({
        type: "POST",
        url: "/reports/revenue",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            startDate: startDate,
            endDate: endDate
        },
        dataType: 'json',
        success: function (data) {
            console.log(data);
            customRevenueReport(data, revenueChart);
        }
    });
    
});

function report(data, chart) {
    var labels = [];
    var values = [];

    for (var i in data) {
        labels.push(data[i].name);
        values.push(data[i].amount_paid);
    }

    var chartData = {
        labels: labels,
        datasets: [{
            label: 'Revenue',
            backgroundColor: 'rgba(60,141,188,0.9)',
            borderColor: 'rgba(60,141,188,0.8)',
            pointRadius: false,
            pointColor: '#3b8bba',
            pointStrokeColor: 'rgba(60,141,188,1)',
            pointHighlightFill: '#fff',
            pointHighlightStroke: 'rgba(60,141,188,1)',
            data: values
        }, ]
    }

    var barChartData = jQuery.extend(true, {}, chartData)
    var temp0 = chartData.datasets[0]
    barChartData.datasets[0] = temp0

    var stackedBarChartData = jQuery.extend(true, {}, barChartData)

    var stackedBarChartOptions = {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            xAxes: [{
                stacked: false,
            }],
            yAxes: [{
                stacked: false
            }]
        }
    }

    var stackedBarChart = new Chart(chart, {
        type: 'bar',
        data: stackedBarChartData,
        options: stackedBarChartOptions
    });
}

function customRevenueReport(data, chart) {
    var labels = [];
    var values = [];

    for (var i in data) {
        labels.push(data[i].name);
        values.push(data[i].revenue);
    }

    var chartData = {
        labels: labels,
        datasets: [{
            label: 'Revenue',
            backgroundColor: 'rgba(60,141,188,0.9)',
            borderColor: 'rgba(60,141,188,0.8)',
            pointRadius: false,
            pointColor: '#3b8bba',
            pointStrokeColor: 'rgba(60,141,188,1)',
            pointHighlightFill: '#fff',
            pointHighlightStroke: 'rgba(60,141,188,1)',
            data: values
        }, ]
    }

    var barChartData = jQuery.extend(true, {}, chartData)
    var temp0 = chartData.datasets[0]
    barChartData.datasets[0] = temp0

    var stackedBarChartData = jQuery.extend(true, {}, barChartData)

    var stackedBarChartOptions = {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            xAxes: [{
                stacked: false,
            }],
            yAxes: [{
                stacked: false
            }]
        }
    }

    var stackedBarChart = new Chart(chart, {
        type: 'bar',
        data: stackedBarChartData,
        options: stackedBarChartOptions
    });
}
