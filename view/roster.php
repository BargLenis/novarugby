<?
$roster = $db->prepare("SELECT CONCAT(firstname, ' ', lastname), position, height, weight, school FROM roster ORDER BY lastname ASC, firstname ASC");
$roster->bindColumn(1, $name);
$roster->bindColumn(2, $position);
$roster->bindColumn(3, $height);
$roster->bindColumn(4, $weight);
$roster->bindColumn(5, $school);
$roster->execute();
?>
<header>
    <h1>Roster</h1>
</header>

<? while ($roster->fetch(PDO::FETCH_BOUND)): ?>
<div class="content-sm player-card">
    <h2><?= $name ?></h2>
    <img src="img/user-icon.png" alt="<?= $name ?> Profile">
    <p class="position"><?= $position ?>
    <p class="height-weight"><?= $height ? floor($height/12) . "' " . $height%12 . '"' : null, $height && $weight ? ', ' : '', $weight ?  $weight . ' lbs' : '' ?>
    <p class="position">
    <p class="school"><?= $school ?>
</div>
<? endwhile ?>
