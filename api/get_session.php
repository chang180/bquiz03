<?php
include_once "../base.php";



$movie_date = $_GET['date'];
$movie_id = $_GET['id'];
// $db=new DB("order");

// $movie=$db->find($movie_id);

$today = strtotime(date("Y-m-d"));
// $ondate = strtotime($movie['ondate']);

if (strtotime($movie_date) == $today) {
    $now = ((floor((date("G") - 12) / 2)));
    $now=($now>0)?$now:0;
    for ($i = ($now + 1); $i <= 5; $i++) {
        echo "<option value='$i' data-session='".$sess[$i]."'>" . $sess[$i] . "</option>";
    }
} else {
    for ($i = 1; $i <= 5; $i++) {
        echo "<option value='$i' data-session='".$sess[$i]."'>" . $sess[$i] . "</option>";
    }
}
