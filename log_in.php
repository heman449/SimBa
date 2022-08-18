<?php 
session_start();
$footer= "Footer";
$header="Header";
$nav="Navigation";
$title = "RPG_V1.0_by_Heman449//:Login";
$ausgabe = "";

$jss="";
$pfad = $_SERVER["PHP_SELF"];
//$header="<img src='pics/header.png' alt=''>";

include("include/define.php");
include("include/funktionen.php");
define_homepage();

// ------------------------------------- Variabalenen sauber einbinden--

$init= formread("init");

$pwd_log= formread("pwd");
$pwd= formread("pwd_1");
$pwd= formread("pwd_2");
$uid= formread("name");
$submit = formread("Submit");
$activity= formread("activity");
$log = $_SESSION["log_status"];
if ($log == "0" || $log == "") {
	$init = "0";
}
// ------------------------------------- SQL sauber einbinden ----------

$link = (mysqli_connect(host,name,pw,db));
if (!$link) {
	echo "Fehler: konnte nicht mit MySQL verbinden." . PHP_EOL;
	echo "Debug-Fehlernummer: " . mysqli_connect_errno() . PHP_EOL;
	echo "Debug-Fehlermeldung: " . mysqli_connect_error() . PHP_EOL;
	exit;
}
if (mysqli_set_charset($link, "utf8") == false){$ausgabe .= "FEHLER: konnte chars nicht laden !!";}

// ------------------------------------- Hauptprogramm -----------------

if ($submit == "Log in") { include("include/submit_login.php"); }
if ($submit == "Neu anmelden") { include("include/submit_new_user.php"); }
if ($submit == "Anmelden") { $header = "Anmeldung<br>"; }

mysqli_close($link);

include("template.php");	

?>
