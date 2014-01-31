<?
$articles = $db->prepare("select * from articles order by pubdate desc limit 10");
$articles->bindColumn('url', $url);
$articles->bindColumn('title', $title);
$articles->bindColumn('synopsis', $synopsis);
$articles->bindColumn('body', $body);
$articles->execute();
$articles->fetch(PDO::FETCH_BOUND);
?>
<header>
    <h1>News</h1>
</header>
<article>
    <img src="photo/nova.jpg" alt="some pic" style="height:279px; width:100%;">
    <h3><a href="<?= $url ?>"><?= $title ?></a></h3>
    <p><?= $synopsis ?>
    <p><?= $body ?>
</article>
<? while ($articles->fetch(PDO::FETCH_BOUND)): ?>
<article class="content-sm feed">
    <img src="photo/nova.jpg" alt="some pic">
    <h4><a href="<?= $url ?>"><?= $title ?></a></h4>
    <p><?= $synopsis ?>
</article>
<? endwhile ?>