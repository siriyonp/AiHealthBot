<?php
  require_once('./vendor/autoload.php');
  use \LINE\LINEBot\HTTPClient\CurlHTTPClient;
  use \LINE\LINEBot;
  use \LINE\LINEBot\MessageBuilder\TextMessageBuilder;

  $channel_token = 'mKHjsIuCJYsy79zw+5IgVdw1TgHZH40q2TTxjmFoHJKT81Ws1z8s9TBDo3ldaHjbdPYC4h0o0zRYh3HICn/UQ5f/0Vo/7Wh9qTQdyAdy1aWlA+GU8WiCVGD37b9bPf+a56tt10kaNCPnQv7BbMuT/gdB04t89/1O/w1cDnyilFU=';
  $channel_secret = '7b8abd826a3faa5168785b1220c90586';

  //Get message from Line API
  $content = file_get_contents('php://input'); $events=json_decode($content, true);
      if (!is_null($events['events'])) { //Loop through each event
          foreach($events['events']as $event){
            //Line API send a lot of event type, we interested in message only.
              if($event['type']=='message' && $event['message']['type']=='text'){
                //Get replyToken
                  $replyToken = $event['replyToken'];
                  //Split message then keep it in database. $appointments=explode(',', $event['message']['text']);
                    if(count($appointments) == 2) {
                      $host = 'ec2-54-225-88-191.compute-1.amazonaws.com';
                      $dbname = 'd4cek5g8tbvd82';
                      $user = 'vkalaifleiqywc';

                      $pass = '9a022e5db970609db6a9c600230b3577bb09168068a94dbdab666edab9d51182';
                      $connection=newPDO("pgsql:host=$host;dbname=$dbname", $user, $pass);
                      $params = array('time'=> $appointments[0],
                                      'content'=> $appointments[1],
                                     );
                      $statement=$connection->prepare("INSERT INTO appointments
                                             (time, content)VALUES(:time, $result = $statement->execute($params);
                      }
              }
        }
?>
