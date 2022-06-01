<?php
require_once("functions.php");
$etudiant=$_GET["nom_etud"];
addEtudiant($etudiant);
header("location:addPfePage.php");
?>