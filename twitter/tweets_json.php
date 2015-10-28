<?php
require 'tmhOAuth.php'; // Get it from: https://github.com/themattharris/tmhOAuth

// Use the data from http://dev.twitter.com/apps to fill out this info
// notice the slight name difference in the last two items)

$connection = new tmhOAuth(array(
  'consumer_key' => 'lSHOt4VJNNKCy6oTbEba6IkvX',
	'consumer_secret' => 'kZHLfYp2k8lHO8Pv5nOdse2UOPSBH5sHKIG81i29woK3kYyykB',
	'user_token' => '', //access token
	'user_secret' => '' //access token secret
));

// set up parameters to pass
$parameters = array();

if ($_GET['count']) {
	$parameters['count'] = strip_tags($_GET['count']);
}

if ($_GET['screen_name']) {
	$parameters['screen_name'] = strip_tags($_GET['screen_name']);
}


$twitter_path = '1.1/statuses/user_timeline.json';


$http_code = $connection->request('GET', $connection->url($twitter_path), $parameters );

if ($http_code === 200) { // if everything's good


	$response = strip_tags($connection->response['response']);
	if ($_GET['callback']) { 
		echo $_GET['callback'],'(', $response,');';
	} else {
		echo $response;	
	}

} else {
	echo "Error ID: ",$http_code, "<br>\n";
	echo "Error: ",$connection->response['error'], "<br>\n";
}

// You may have to download and copy http://curl.haxx.se/ca/cacert.pem