<<<<<<< HEAD
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
=======
//Converts twitter datestamp into ..ago or into system time if longer than a week
function parseTwitterDate(tdate) {
    var system_date = new Date(Date.parse(tdate));
    var user_date = new Date();
    if (K.ie) {
        system_date = Date.parse(tdate.replace(/( \+)/, ' UTC$1'))
    }
    var diff = Math.floor((user_date - system_date) / 1000);
    if (diff <= 1) {return "just now";}
    if (diff < 20) {return diff + " seconds ago";}
    if (diff < 40) {return "half a minute ago";}
    if (diff < 60) {return "less than a minute ago";}
    if (diff <= 90) {return "one minute ago";}
    if (diff <= 3540) {return Math.round(diff / 60) + " minutes ago";}
    if (diff <= 5400) {return "1 hour ago";}
    if (diff <= 86400) {return Math.round(diff / 3600) + " hours ago";}
    if (diff <= 129600) {return "1 day ago";}
    if (diff < 604800) {return Math.round(diff / 86400) + " days ago";}
    if (diff <= 777600) {return "1 week ago";}
    return " on " + system_date;
}

// from http://widgets.twimg.com/j/1/widget.js
var K = function () {
    var a = navigator.userAgent;
    return {
        ie: a.match(/MSIE\s([^;]*)/)
    }
}();

//Parses string for urls and renders then as links
function urlify(text) {
    var urlRegex = /(https?:\/\/[^\s]+)/g;
    return text.replace(urlRegex, function(url) {
        return '<a href="' + url + '">' + url + '</a>';
    })
}


//gets the tweets from tweets_json.php and displays on the homepage
$(document).ready(function(){       
        $.getJSON('http://localhost/igniter/clothing_store_igniter/twitter/tweets_json.php?count=3&screen_name=asos&callback=?',{
          format: "json"
        }).done(function(data){
			$.each(data, function(index){
				var now = new Date();
				$('#tweets').append('<p>' + urlify(data[index].text) + '<span style="color:#ccc"> - ' + parseTwitterDate(data[index].created_at) + '</span></p>');
		});
          
        });     
      });





>>>>>>> 1e1377192bd0ef1c7ea78a9e9ba38b388417d22b
