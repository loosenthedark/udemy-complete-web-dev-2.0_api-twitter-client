<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"                    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">-->

    <!-- custom stylesheet -->
    <link rel="stylesheet" href="./style.css">

    <title>@perninha_curta | Twitter Client</title>
</head>

<body>

    <?php
        
      echo"<script type='text/javascript' src='config.js'></script><script type='text/javascript'>
        const consumerKey = config.CONSUMER_KEY;
        const consumerSecret = config.CONSUMER_SECRET;
        const accessToken = config.access_token;
        const accessTokenSecret = config.access_token_secret;</script>";
    
      // Import the TwitterOAuth class...
      require "twitteroauth/autoload.php";
      use Abraham\TwitterOAuth\TwitterOAuth;
    
      // Start making API requests...
      $connection = new TwitterOAuth(consumerKey, consumerSecret, accessToken, accessTokenSecret);
      $content = $connection->get("account/verify_credentials");
    
      // POST tweets via TwitterOAuth...
      $statues = $connection->post("statuses/update", ["status" => "What, menino, WHAAAAATTT???"]);
    
      // GET tweet timelines via TwitterOAuth...
      $statuses = $connection->get("statuses/home_timeline", ["count" => 100, "exclude_replies" => true]);
    
      // print_r($statuses);
    
      foreach ($statuses as $tweet) {
        
              // Only the ones that have been favorited at least twice (the most popular ones).
              if ($tweet->favorite_count >= 2) {
                  $status = $connection->get("statuses/oembed", ["id" => $tweet->id]);
                  echo $status->html;
              }
          
          };
    
    ?>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <!--<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>-->
        <!--<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>-->
        <!--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>-->

</body>

</html>