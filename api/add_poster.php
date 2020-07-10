<?php
include_once "../base.php";
// echo $_POST;
$db=new DB("poster");

$data=[];
if(!empty($_FILES['poster']['tmp_name'])){
    $data['path']=$_FILES['poster']['name'];
    move_uploaded_file($_FILES['poster']['tmp_name'],"../img/".$data['path']);
}

$data['name']=$_POST['name'];
$data['sh']=1;
$data['ani']=1;
$data['rank']=$db->q("SELECT MAX(`id`) FROM `poster`")[0][0]+1;

$db->save($data);

to("../admin.php?do=poster");

?>