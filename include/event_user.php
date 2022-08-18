<?php

$header = "<div class='p_bigger'>Eigene Events</div>";
include("include/navigation.php");
$user_rights = $right[$_SESSION["log_status"]];
$ausgabe="<div class='p_mid'>Rechte: ". $user_rights ."</div>";
?>