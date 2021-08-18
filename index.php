<?php

echo"<script type='text/javascript' src='config.js'></script><script type='text/javascript'>

// Store keys and tokens in vars...
const consumerKey = config.CONSUMER_KEY;
const consumerSecret = config.CONSUMER_SECRET;
const accessToken = config.access_token;
const accessTokenSecret = config.access_token_secret;

</script>";

// Import the TwitterOAuth class...
require "twitteroauth/autoload.php";
use Abraham\TwitterOAuth\TwitterOAuth;

// Start making API requests...
$connection = new TwitterOAuth(consumerKey, consumerSecret, accessToken, accessTokenSecret);
$content = $connection->get("account/verify_credentials");

// POST tweets via TwitterOAuth...
$statues = $connection->post("statuses/update", ["status" => "What, menino, WHAAAAATTT???"]);

// GET tweet timelines via TwitterOAuth...
$statuses = $connection->get("statuses/home_timeline", ["count" => 25, "exclude_replies" => true]);

print_r($statuses);

?>