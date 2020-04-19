<?php
require_once("phpQuery-onefile.php");
// HTMLの取得
$doc = phpQuery::newDocumentFile("https://talent.thetv.jp/person/2000031367/tv/");
$text = "";

foreach ($doc[".listItem"] as $key => $list){

    //番号
    $key = $key + 1;
    //タイトル
    $title = pq($list)->find('.listHeading')->text();
    //日時
    $time = pq($list)->find('.listDetailOnAir__datetime')->text();
    //放送局
    $station = pq($list)->find('.listDetailOnAir__station')->text();

    $text = $text.$key.".".$title."\n".$time."\n".$station."\n\n";
  }



/**
 * Copyright 2016 LINE Corporation
 *
 * LINE Corporation licenses this file to you under the Apache License,
 * version 2.0 (the "License"); you may not use this file except in compliance
 * with the License. You may obtain a copy of the License at:
 *
 *   https://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations
 * under the License.
 */

require_once('./LINEBotTiny.php');

$channelAccessToken = 'xriJJ2wfCNCXygkplrF34bo3qeylR3jCxujh83YkyBsO/rBOtnryS9dp7yZtgWj2ujhzmkSuT9zOZXyso0kRngFnf0TyCduX3dBfzXljowSoqXjeqdt651i5cGf2rmdHgvPxhHcldQyDe0rWechjagdB04t89/1O/w1cDnyilFU=';
$channelSecret = '60b89777e481b7c7cd29ca7ac92dc71e'; 

$client = new LINEBotTiny($channelAccessToken, $channelSecret);
foreach ($client->parseEvents() as $event) {
    switch ($event['type']) {
        case 'message':
            $message = $event['message'];
            switch ($message['type']) {
                case 'text':
                    $client->replyMessage([
                        'replyToken' => $event['replyToken'],
                        'messages' => [
                            [
                                'type' => 'text',
                                'text' => $text
                            ]
                        ]
                    ]);
                    break;
                default:
                    error_log('Unsupported message type: ' . $message['type']);
                    break;
            }
            break;
        default:
            error_log('Unsupported event type: ' . $event['type']);
            break;
    }
};


?>