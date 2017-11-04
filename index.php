<?php
  require_once('./vendor/autoload.php');
  use \LINE\LINEBot\HTTPClient\CurlHTTPClient;
  use \LINE\LINEBot;
  use \LINE\LINEBot\MessageBuilder\TextMessageBuilder;

  $channel_token = 'mKHjsIuCJYsy79zw+5IgVdw1TgHZH40q2TTxjmFoHJKT81Ws1z8s9TBDo3ldaHjbdPYC4h0o0zRYh3HICn/UQ5f/0Vo/7Wh9qTQdyAdy1aWlA+GU8WiCVGD37b9bPf+a56tt10kaNCPnQv7BbMuT/gdB04t89/1O/w1cDnyilFU=';
  $channel_secret = '7b8abd826a3faa5168785b1220c90586';

  //Get message from Line API
  $content = file_get_contents('php://input');
  $events=json_decode($content, true);

  if (!is_null($events['events'])) { //Loop through each event
      foreach($events['events']as $event){
        //Get replyToken
        $replyToken = $event['replyToken']; $ask = $event['message']['text'];
          switch(strtolower($ask)) { case 'm':
          $respMessage='What sup man.Go away!';
            break; case 'f':
          $respMessage='Love you lady.';
            break; default:
          $respMessage='What is your sex? M or F'; break;
}
  $httpClient = new CurlHTTPClient($channel_token);
  $bot=newLINEBot($httpClient, array('channelSecret'=> $channel_secret)); $textMessageBuilder = new TextMessageBuilder($respMessage);
  $response=$bot->replyMessage($replyToken, $textMessageBuilder); }
