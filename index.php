<?php
      require_once('./vendor/autoload.php');

      use \LINE\LINEBot\HTTPClient\CurlHTTPClient;
      use \LINE\LINEBot;
      use \LINE\LINEBot\MessageBuilder\TextMessageBuilder;

      $channel_token = 'eoWlOTURjumGHVwZ758WCzRSAxsO2Na6mI2LEZ3QJEwtNBiXqqDNtch2ZzquLo6gdPYC4h0o0zRYh3HICn/UQ5f/0Vo/7Wh9qTQdyAdy1aUim5cKD9dxzqLl+ZpIs5qWZCcQJ1MJVLcRmAOjdlLQQgdB04t89/1O/w1cDnyilFU=';
      $channel_secret = '4ccf33748e78c7cb555b373a9da71e86';
          //Get message from Line API
          $content = file_get_contents('php://input');
          $events=json_decode($content, true);
                //Loop through each event
                foreach($events['events']as $event){
                //Get replyToken
                    $replyToken = $event['replyToken']; $ask = $event['message']['text'];
                    switch(strtolower($ask)) { case 'm':
                    $respMessage='What sup man.Go away!';
                    break; case 'f':
                    $respMessage='Love you lady.';
                    break; default:
                    $respMessage='What is your sex? M or F';
                break; }
          $httpClient = new CurlHTTPClient($channel_token);
          $bot=newLINEBot($httpClient, array('channelSecret'=> $channel_secret));
          $textMessageBuilder = new TextMessageBuilder($respMessage);
          $response=$bot->replyMessage($replyToken, $textMessageBuilder);
          }
        }
echo "OK";
