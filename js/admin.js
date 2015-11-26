

var testChart = function() {

    var data = [{
        name: 'Stock',
        colorByPoint: true,
        data :[]
    }];

    var drillData = {series: []};

    $.ajax({
        url: "http://localhost/igniter/clothing_store_igniter/index.php/item/get_stock_level",
        type: 'GET',
        success: function (result) {
             $(result).each(function (index) {
                item = {
                    name: result[index]['name'],
                    y: parseFloat(result[index]['stock']),
                    drilldown: result[index]['name']
                }
                 drillItem = {
                     name: result[index]['name'],
                     id:result[index]['name'],
                     data: []
                 };
                 for(var i=0;i<result[index]['drill'].length;i++){
                     console.log(result[index]['drill'][i]['name']);
                     drillItem.data.push({name: result[index]['drill'][i]['name'], y: parseFloat(result[index]['drill'][i]['stock'])});
                 }
                 drillData.series.push(drillItem);

                data[0].data.push(item);

            });


            $(function () {
                $('#chart').highcharts({
                    chart:{type:'column'},
                    title: {
                        text: 'Stock Analysis',

                    },
                    xAxis: {
                        type: 'category'
                    },
                    yAxis: {
                        title: {
                            text: 'Stock Quantity'
                        },
                    },
                    tooltip: {
                        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}</b> in stock<br/>'
                    },
                    plotOptions: {
                        series: {
                            borderWidth: 0,
                            dataLabels: {
                                enabled: true,
                                format: '{point.y}'
                            }
                        }},
                    series: data,
                    drilldown: drillData
                });
            });
        }
    });
}

var testChart2 = function() {

    var data = [{
        name: 'Orders',
        colorByPoint: true,
        data :[
        ]
    }];

    var drillData = {series: []};

    $.ajax({
        url: "http://localhost/igniter/clothing_store_igniter/index.php/order/get_dates",
        type: 'GET',
        success: function (result) {
            console.log(result);
            $(result).each(function (index) {

                thisDate = result[index].date;
                //console.log(time);
                data[0].data.push([Date.UTC(2015,11,11),1]);

            });


            $(function () {
                $('#chart').highcharts({
                    title: {
                        text: 'Order Analysis',

                    },
                    xAxis: {
                        type: 'datetime',
                        dateTimeLabelFormats: { // don't display the dummy year
                            month: '%e. %b',
                            year: '%b'
                        },
                        title: {
                            text: 'Date'
                        }
                    },
                    yAxis: {
                        title: {
                            text: 'Stock Quantity'
                        },
                    },
                    series: data,
                });
            });
        }
    });
}

$( document ).ready(function() {
    testChart();

});



