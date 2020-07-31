$(document).ready(function () {

    var revenueBarChartCanvas = $('#revenue').get(0).getContext('2d');
    var standsBarChartCanvas = $('#standsChart').get(0).getContext('2d');
    var standsCountBarChartCanvas = $('#standsCountChart').get(0).getContext('2d');

    $.ajax({
        type: "GET",
        url: "/reports/location/data/" + getParameterValues('id'),
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {},
        dataType: 'json',
        success: function (data) {
            console.log(data);
            $('#totalRevenue').text('$' + data.overview.amount_paid);
            $('#soldStands').text(data.overview.sold_stands);
            $('#stands').text(data.overview.stands);
            $('#totalValue').text('$' + data.overview.value_amount);

            revenueChart(data.revenue, revenueBarChartCanvas);
            standsChart(data.sold, data.notSold, standsBarChartCanvas);
            standsCountChart(data.standsCount, standsCountBarChartCanvas);
            // ageChart(data.age, age);
            // rolesChart(data.roles, roles);
            // genderChart(data.gender, gender);
            // contractsChart(data.contracts, contracts);
            // branchesChart(data.branches, branches);
        }
    });


});

function getParameterValues(param) {
    var url = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
    for (var i = 0; i < url.length; i++) {
        var urlparam = url[i].split('=');
        if (urlparam[0] == param) {
            return urlparam[1];
        }
    }
}

function revenueChart(data, chart) {
    var labels = [];
    var values = [];

    for (var i in data) {
        labels.push(data[i].size);
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
    };

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
    })
}

function standsChart(sold, notSold, chart) {
    var labels = [];
    var soldValues = [];
    var notSoldValues = [];

    for (var i in sold) {
        labels.push(sold[i].size);
        soldValues.push(sold[i].count);
    }

    for (var i in notSold) {
        notSoldValues.push(notSold[i].count);
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
                data: soldValues
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
                data: notSoldValues
            },
        ]
    };

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

function standsCountChart(data, chart) {
    var labels = [];
    var values = [];

    for (var i in data) {
        labels.push(data[i].size);
        values.push(data[i].count);
    }

    var chartData = {
        labels: labels,
        datasets: [{
            label: 'Stands Count',
            backgroundColor: 'rgba(60,141,188,0.9)',
            borderColor: 'rgba(60,141,188,0.8)',
            pointRadius: false,
            pointColor: '#3b8bba',
            pointStrokeColor: 'rgba(60,141,188,1)',
            pointHighlightFill: '#fff',
            pointHighlightStroke: 'rgba(60,141,188,1)',
            data: values
        }, ]
    };

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
    })
}
