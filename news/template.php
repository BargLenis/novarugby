<?php
include '../_init.php';
$section = 'news';

if (preg_match('/news\/[0-9]{4}-[0-9]{2}-[0-9]{2}\/.+$/', $_SERVER['REQUEST_URI'], $matches)) {
    $url = $matches[0];
} else {
    header("HTTP/1.0 404 Not Found");
    exit();
}

$article = $db->prepare('select * from articles where url = ? limit 1');
$article->bindValue(1, $url);

if (!$article->execute() || !$article->rowCount()) {
    header("HTTP/1.0 404 Not Found");
    exit();
}
$article = $article->fetchObject();

include '../_header.php';
?>
<article class="full-article">
    <header>
        <h1><?= $article->title ?></h1>
    </header>
    <figure>
        <img src="<?= $article->imgurl ?>">
    </figure>
</article>
<? include '../_footer.php' ?>