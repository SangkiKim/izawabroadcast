<?php

require_once("./phpQuery-onefile.php");

$contents = file_get_contents("https://tv.yahoo.co.jp/search/?q=IT");
$html = count(phpQuery::newDocument($contents)->find('ul'));
var_dump(phpQuery::newDocument($contents)->find('ul'));
echo $html;

?>