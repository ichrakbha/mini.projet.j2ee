<?php
require_once("functions.php");
$ens=$_GET["nom_ens"];
addEns($ens);
header("location:addPfePage.php");
?>