<?php
$url = $argv[1] ?: "https://www.php.net/manual/en/pdo.drivers.php";
include_once ("simple_html_dom.php");
header('Content-Type: application/json');
$html = file_get_html($url);
$arr_type=["img"=>"src", "a"=>"href", "script"=>"src", "link"=>"href"];
foreach ($arr_type as $key=>$item){
    foreach($html->find($key) as $element){
        if($element->$item==""){continue;}
        $tags[$key][]= $element->$item;
    }
}
var_dump( json_encode($tags, JSON_UNESCAPED_SLASHES)."\n");



