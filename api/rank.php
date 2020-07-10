<?php
include_once "../base.php";

$row1=$Poster->find($_POST['id'][0]);
$row2=$Poster->find($_POST['id'][1]);

list($row1['rank'],$row2['rank']) = array($row2['rank'],$row1['rank']);

$Poster->save($row1);
$Poster->save($row2);

?>