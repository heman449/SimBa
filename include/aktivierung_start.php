<?php
session_start();

$footer= "Footer";
$header="Header";
$nav="Navigation";
$title = "RPG_V1.0_by_Heman449";
$ausgabe = "";
echo "asdasd";
/*
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
    $header="Aktivierung"
    $nav="";
    $_SESSION["log_new"] = "1";
    $jss = "function test_input() {              
        var code = document.getElementById('code').value;
        var sess_code = document.getElementById('hidden_code').value;
        if (code == sess_code ) {
        
                        alert('Sende Daten zum Authentifizieren' );
                    
                        return true;
                    
        } else {
                alert('Aktivierungscode ist nicht korrekt!'); return false;
        }


        return false; 
    }";

    $ausgabe=<<<CODE_EINGEBEN
                
                <br><br>
                <form action="user_new.php" onsubmit="return test_input()" method="post">
                    <table>
                        <tr>
                            <td></td>
                            <td><h2>Bitte Aktivierungscode eingeben:</h2></td>
                        </tr>
                        <tr>
                            <td>Code:</td>
                            <td><input type="text" id="code" name="code" ></td>
                        </tr>
                        
                        <tr>
                            <td></td>
                            <td><br> <input onsubmit ="test_code" type="submit" name="aktivieren" value="Aktivieren">
                            </td>
                        </tr>
                    </table>
                    <input type="hidden" id="hidden_code" value="$code"> 
                </form><br>
    CODE_EINGEBEN;

mysqli_close($link);

include("template.php");	
*/
?>