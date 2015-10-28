


data = [{
    name: 'Prices',
    data: []
}];


var testChart = function() {

    $.ajax({
        url: "http://localhost/igniter/clothing_store_igniter/index.php/store/foo",
        type: 'GET',
        success: function (result) {

            $(result).each(function (index) {
                //console.log(result[index]['item_price']);
                data[0].data.push(parseFloat(result[index]['item_price']));
            });

            console.log(data[0].data)

            $(function () {
                $('#chart').highcharts({
                    title: {
                        text: 'Price Analysis',
                        x: -20 //center
                    },
                    xAxis: {
                        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                            'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
                    },
                    yAxis: {
                        title: {
                            text: 'Price'
                        },
                        plotLines: [{
                            value: 0,
                            width: 1,
                            color: '#808080'
                        }]
                    },
                    legend: {
                        layout: 'vertical',
                        align: 'right',
                        verticalAlign: 'middle',
                        borderWidth: 0
                    },
                    series: data
                });
            });
        }
    });
}

$( document ).ready(function() {
    testChart();
});



