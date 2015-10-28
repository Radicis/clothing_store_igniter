<?php
require_once('TwitterAPIExchange.php');
$settings = array(
    'oauth_access_token' => "lSHOt4VJNNKCy6oTbEba6IkvX",
    'oauth_access_token_secret' => "kZHLfYp2k8lHO8Pv5nOdse2UOPSBH5sHKIG81i29woK3kYyykB",
    'consumer_key' => "",
    'consumer_secret' => ""
);

$requestMethod = 'GET';

$url = "https://api.twitter.com/1.1/statuses/user_timeline.json"; // I can decode output from this
$getfield = "?screen_name=alloydwebdev&count=5"; // I can decode output from this

$twitter = new TwitterAPIExchange($settings);
$string = $twitter->setGetfield($getfield)
    ->buildOauth($url, $requestMethod)
    ->performRequest(); // from stackOverflow
$string = json_decode($string, $assoc = TRUE); // seems i cannot use json_decode for output from tweets.json
if ($string["errors"][0]["message"] != "")
{
    echo "twitter error message:" . $string[errors][0]["message"];
    exit();
}
foreach ($string as $items)
{
    echo "tweet text =[". $items['text']."]<br />";
}
