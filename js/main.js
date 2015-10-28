


data = [{
    name: 'Prices',
    data: []
}];


var tweets = function() {

    $.ajax({
        url: 'http://localhost/igniter/clothing_store_igniter/twitter/tweets_json.php',
        type: 'GET',
        success: function (result) {
            console.log(result);
        }
    });
}




