<?php
include_once "../base.php";
// echo $_POST;

foreach ($_POST['id'] as $k => $id) {
    if (!empty($_POST['del']) && in_array($id, $_POST['del'])) {
        $Poster->del($id);
    } else {
        $row = $Poster->find($id);
        $row['name'] = $_POST['name'][$k];
        $row['sh'] = (!empty($_POST['sh']) && in_array($id, $_POST['sh']))?1:0;
        $row['ani'] = $_POST['ani'][$k];
        $Poster->save($row);
    }
}



to("../admin.php?do=poster");
?>
