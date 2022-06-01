<?php
require_once("functions.php");
$id=$_GET["id"];
deletePfe($id);
header("location:index.php");
?>
