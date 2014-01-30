<?
$articles = $db->prepare("select * from articles order by pubdate desc limit 10");
$articles->bindColumn('url', $url);
$articles->bindColumn('title', $title);
$articles->bindColumn('synopsis', $synopsis);
$section = 'news';
?>
<header>
    <h1>News</h1>
</header>
<? while ($articles->fetch(PDO::FETCH_BOUND)): ?>
<article class="content-sm feed">
    <img src="photo/nova.jpg" alt="some pic">
    <h1><a href="<?= $url ?>"><?= $title ?></a></h1>
    <p><?= $synopsis ?>
</article>
<? endwhile ?>