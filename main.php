<?php
$base_url = '/novarugby/';
$url = $_SERVER['REQUEST_URI'];
$rel_url = preg_replace('/^'.preg_quote($base_url,'/').'/','',$url);

if (preg_match('~([a-z]*)/{0,1}([a-z]*)$~',$rel_url,$matches)) {
    $section = $matches[1] == "" ? 'news' : $matches[1];
    $pg = $matches[2];
} else {
    header('HTTP/1.0 404 Not Found');
    require 'view/404.html';
    exit();
}

$db = new PDO('mysql:host=localhost;dbname=novarugby', 'novarugby', 'Cardinal7');

$file = 'view/' . $section . '.php';
if (file_exists($file)) {
    require 'view/_header.php';
    require $file;
    require 'view/_footer.php';
} else {
    header('HTTP/1.0 404 Not Found');
    require 'view/404.html';
    exit();
}
