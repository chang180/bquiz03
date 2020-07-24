<?php
include_once "../base.php";



$movie_date = $_GET['date'];
$movie_id = $_GET['id'];
// $db=new DB("ord");

$movieName=$Movie->find($movie_id)['name'];

$today = strtotime(date("Y-m-d"));
// $ondate = strtotime($movie['ondate']);

if (strtotime($movie_date) == $today) {
    $now = ((floor((date("G") - 12) / 2)));
    $now=($now>0)?$now:0;
    for ($i = ($now + 1); $i <= 5; $i++) {

        //計算剩餘座位數 20-x
        $qt=$Ord->q("SELECT SUM(`qt`) FROM `ord` WHERE `movie`='$movieName' && `date`='$movie_date' && `session`='".$sess[$i]."' ")[0][0];
        echo "<option value='$i' data-session='".$sess[$i]."'>" . $sess[$i] . " 剩餘座位".(20-$qt)." </option>";
    }
} else {
    for ($i = 1; $i <= 5; $i++) {
        $qt=$Ord->q("SELECT SUM(`qt`) FROM `ord` WHERE `movie`='$movieName' && `date`='$movie_date' && `session`='".$sess[$i]."' ")[0][0];
        echo "<option value='$i' data-session='".$sess[$i]."'>" . $sess[$i] . "剩餘座位".(20-$qt)." </option>";
    }
}
