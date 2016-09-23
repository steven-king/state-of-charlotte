<!-- <head>
  <title>Twitter</title>
  <link rel="stylesheet" type="text/css" href="twitter-style.css">
</head>
  <body> -->
<?php
require_once('TwitterAPIExchange.php');
/** Set access tokens here - see: https://dev.twitter.com/apps/ **/
$settings = array(
'oauth_access_token' => "1573344817-0bq7v9LoxMrJAjfqrXkPIjsXGgg7ZvGweeEomFH",
'oauth_access_token_secret' => "L135T0ryyWNyHSmgoI1HWj486Ml91xTzsjpLKTX06KTSn",
'consumer_key' => "2eZSQ61jln2XcDkbmIK4rQCtw",
'consumer_secret' => "mR6PMdZTg6rFXXE19pVn6KsQr6UARUiJQD02nrE753zEmb9B0O"
);
$url = "https://api.twitter.com/1.1/statuses/user_timeline.json";
$requestMethod = "GET";
if (isset($_GET['user']))  {$user = $_GET['user'];}  else {$user  = "theobserver";}
if (isset($_GET['count'])) {$count = $_GET['count'];} else {$count = 20;}
$getfield = "?screen_name=$user&count=$count";
$twitter = new TwitterAPIExchange($settings);
$string = json_decode($twitter->setGetfield($getfield)
->buildOauth($url, $requestMethod)
->performRequest(),$assoc = TRUE);
if($string["errors"][0]["message"] != "") {echo "<h3>Sorry, there was a problem.</h3><p>Twitter returned the following error message:</p><p><em>".$string[errors][0]["message"]."</em></p>";exit();}
foreach($string as $items)
    {
        echo "<div class='tweet-div'>".$items['created_at']."<br />";
        echo $items['text']."<br />"."</div>";

    }
 ?>
 <!-- </body> -->
