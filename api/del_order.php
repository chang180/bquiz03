<?php
include_once "../base.php";

$Ord->del($_POST['id']);

to("../admin.php?do=order");