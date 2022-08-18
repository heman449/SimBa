<?php 
session_start();
$footer= "Footer";
$header="Header";
$nav="Navigation";
$title = "SimBa_V0.1a_by_Heman449";
$ausgabe = "";
$right = array("0"=>"Gast", "1"=>"User", "2"=>"Admin" , "3"=>"Superadmin");
$ar_zugang = array("0"=>"privat", "1"=>"geschlossen", "2"=>"öffentlich" );
$ar_ausweis = array("0"=>"Kein", "1"=>"Mail", "2"=>"Lichtbild" , "3"=>"amtl. Ausweis");
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

if ( ($log == "" || $log == "0" || $submit == "Logout") && ($log_new != "1" ) ) {
	include("include/check_login.php");
} else{
		if ($log_new == "1" ) {
			include("include/aktivierung.php");
		} else {
			if ( $submit == "Einstellungen") { include("include/einstellungen.php"); } 
			else if ($submit == "Passwort ändern") { include("include/change_pwd.php"); }			
			else if ($submit == "Emailadresse ändern") { include("include/change_email.php"); }	
			else if ($submit == "Email-Adresse übernehmen") { include("include/change_email_set.php"); }
			
			else if ($submit == "Anmelden") { include("include/event_anmelden.php"); }	
			/*	
			else if ($submit == "Übersicht Events") { include("include/event_all.php"); }
			else if ($submit == "Neues Event starten" || $submit == "zurück zum Formular" ) { include("include/event_all_new.php"); }	
			else if ($submit == "Event starten" ) { include("include/event_all_new_set.php"); }	
			else if ($submit == "Eigene Events") { include("include/event_user.php"); }		*/
			else { include("include/home.php"); }		
		}
}


mysqli_close($link);
include("template.php");	

?>




