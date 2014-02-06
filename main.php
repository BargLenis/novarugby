<?php
define('ROOT', __DIR__);

$base_url = '/novarugby/';
$url = $_SERVER['REQUEST_URI'];
$rel_url = preg_replace('/^'.preg_quote($base_url,'/').'/','',$url);

if (preg_match('~([a-z]*)/{0,1}([a-z-]*)\.?([a-z]*)$~',$rel_url,$matches)) {
    $section = $matches[1] == "" ? 'news' : $matches[1];
    $pg = $matches[2];
    $ext = $matches[3] ? $matches[3] : 'html';
} else {
    header('HTTP/1.0 404 Not Found');
    require 'view/404.html';
    exit();
}

$db = new PDO('mysql:host=localhost;dbname=novarugby', 'novarugby', 'Cardinal7');

$file = 'view/' . $section . ($pg ? '/' . $pg : '') . '.' . $ext;
if (file_exists($file)) {
    if ($ext == 'html') {
        require 'view/_header.html';
        require $file;
        require 'view/_footer.html';
    } elseif ($ext == 'rss') {
        header('Content-type: text/xml');
        require $file;
    } else {
        header('HTTP/1.0 404 Not Found');
        require 'view/404.html';
        exit();
    }
} else {
    header('HTTP/1.0 404 Not Found');
    require 'view/404.html';
    exit();
}
