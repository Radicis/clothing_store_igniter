
var tweets = function() {

    $.ajax({
        url: 'http://localhost/igniter/clothing_store_igniter/twitter/tweets_json.php',
        data: {'screen_name' : 'ASOS', 'count':4, 'callback': '127.0.0.1'},
        type: 'GET',
        dataType: 'html',
        success: function (result) {
            $('#tweets').html(result);
        }
    });
};


$( document ).ready(function() {
    tweets();
});





