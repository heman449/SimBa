<?php 
session_start();
$footer= "Footer";
$header="Header";
$nav="Navigation";
$title = "RPG_V1.0_by_Heman449//:Passwort_vergessen";
$ausgabe = "";

$jss="";
$pfad = $_SERVER["PHP_SELF"];
//$header="<img src='pics/header.png' alt=''>";

include("include/define.php");
include("include/funktionen.php");
define_homepage(); 

// ------------------------------------- Variabalenen sauber einbinden--

//$init= formread("init");
$submit = formread("Submit");
$pwd= formread("pwd");
$name= formread("name");
$activity= formread("activity");
$log = $_SESSION["log_status"];
$log_new = $_SESSION["log_new"];
$code = $_SESSION["code"];
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


		
if ( $submit == "") { include("include/new_pwd_get.php"); } 
else if ($submit == "neues Passwort anfordern") { include("include/new_pwd_send.php"); }	
else { include("include/home.php"); }		
		


mysqli_close($link);
include("template.php");	

?>