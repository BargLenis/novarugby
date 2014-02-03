<?
$articles = $db->prepare("select * from articles order by pubdate desc limit 10");
$articles->bindColumn('url', $url);
$articles->bindColumn('imgurl', $imgurl);
$articles->bindColumn('title', $title);
$articles->bindColumn('pubdate', $pubdate);
$articles->bindColumn('synopsis', $synopsis);
$articles->bindColumn('body', $body);
$articles->execute();
?>
<h1>News</h1>
<? while ($articles->fetch(PDO::FETCH_BOUND)): ?>
<article class="news-item">
    <figure>
        <img src="<?= $imgurl ?>" alt="some pic">
    </figure>
    <time datetime="<?= $pubdate ?>"><?= date('l, F j', strtotime($pubdate)) ?></time>
    <h4><a href="<?= $url ?>"><?= $title ?></a></h4>
    <p><?= $synopsis ?>
</article>
<? endwhile ?>
<? require '_dues.php' ?>