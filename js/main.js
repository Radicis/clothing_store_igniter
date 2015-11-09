/**
 * Created by alloy on 13/10/2015.
 */


$('#foo').click( function(){
    console.log("foo");
    $.ajax({
        type: "GET",
        url: "http://localhost/clothing_store_igniter/index.php/store",
        success: function(data)
        {
            console.log(data);
        }

    });

});
