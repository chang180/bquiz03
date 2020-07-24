<?php
include_once "../base.php";
$movie=$_POST['movie'];
$date=$_POST['date'];
$session=$_POST['session'];
$seat=$_POST['seat'];

$data['movie']=$Movie->find($movie)['name'];
$data['date']=$date;
$data['session']=$sess[$session];
$data['qt']=count($seat);

sort($seat);
$data['seat']=serialize($seat);


$data['no']=date("Ymd");
$data['no'].=sprintf("%04d",$Movie->q("SELECT MAX(`id`) from `ord`")[0][0]+1);

$Ord->save($data);
echo $data['no'];

