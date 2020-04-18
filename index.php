<?php
require_once("phpQuery-onefile.php");
// HTMLの取得
$doc = phpQuery::newDocumentFile("https://talent.thetv.jp/person/2000031367/tv/");

foreach ($doc[".listItem"] as $list){
    //タイトル
    $title = pq($list)->find('.listHeading')->text();
    //日時
    $time = pq($list)->find('.listDetailOnAir__datetime')->text();
    //放送局
    $station = pq($list)->find('.listDetailOnAir__station')->text();
    
    echo $title;
    echo $time;
    echo $station;
    echo "<br>";
  }

?>