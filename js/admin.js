


data = [{
    name: 'Stock',
    data: []
}];


var testChart = function() {

    $.ajax({
        url: "http://localhost/igniter/clothing_store_igniter/index.php/item/get_stock_level",
        type: 'GET',
        success: function (result) {

            console.log(result);

            $(result).each(function (index) {
                //console.log(result[index]['item_price']);
                data[0].data.push([result[index]['name'], parseFloat(result[index]['stock'])]);
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
                            text: 'Price'
                        },
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



