<?
$roster = $db->prepare("SELECT lastname, firstname, position, height, weight, school FROM roster ORDER BY lastname ASC, firstname ASC");
$roster->bindColumn(1, $lname);
$roster->bindColumn(2, $fname);
$roster->bindColumn(3, $position);
$roster->bindColumn(4, $height);
$roster->bindColumn(5, $weight);
$roster->bindColumn(6, $school);
$roster->execute();
?>
<header>
    <h1>Roster</h1>
</header>
<table class="roster">
    <thead>
        <tr>
            <th>Player
            <th>Position
            <th>Height
            <th>Weight
            <th>School
        </tr>
    </thead>
    <tbody>
<? while ($roster->fetch(PDO::FETCH_BOUND)): ?>
        <tr>
            <td><?= $lname, ', ', $fname ?>
            <td><?= $position ?>
            <td><?= $height ? floor($height/12) . "' " . $height%12 . '"' : null ?>
            <td><?= $weight ?>
            <td><?= $school ?>
        </tr>
<? endwhile ?>
    </tbody>
</table>