<?php 
session_start();
$footer= "Footer";
$header="Anmeldung";
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



$email= $_SESSION["mail"];
$pwd= $_SESSION["pwd"];
$uid = $_SESSION["UID"];

//----------------------------------- SQL sauber einbinden ----------

$link = mysqli_connect(host,name,pw,db);


if (!$link) {
	echo "Fehler: konnte nicht mit MySQL verbinden." . PHP_EOL;
	echo "Debug-Fehlernummer: " . mysqli_connect_errno() . PHP_EOL;
	echo "Debug-Fehlermeldung: " . mysqli_connect_error() . PHP_EOL;
	exit;
}
if (mysqli_set_charset($link, "utf8") == false){$ausgabe .= "FEHLER: konnte chars nicht laden !!";}

// ------------------------------------- Hauptprogramm -----------------

    $bytes  = openssl_random_pseudo_bytes(16);
    $salt   = bin2hex($bytes);
    $iterations = 1000;
    $pwd_hash = hash_pbkdf2("sha256", $pwd, $salt, $iterations, 20);
    $header = '<div class="p_bigger">Neuer User</div>';
    $nav="";
    if ($_SESSION["log_new"] == "1") {
   

        if($link) {
                //('dasd2321','12313','3dda','123123','2")
            //$sql = "INSERT INTO `user_auth` (UID,PW,Email,Salt,Status) VALUES ('". $uid ."', '". $pwd_hash ."', '". $email ."','". $salt."','1')";
            $sql = "INSERT INTO `user_auth`(`UID`, `Email`, `PW`, `Salt`, `Status`) VALUES ('$uid', '$email' ,'$pwd_hash', '$salt','1')";
            //$sql = "INSERT INTO `user_auth`(`UID`, `Email`, `PW`, `Salt`, `Status`) VALUES ('123dasd', 'asdads','sdfsf', 'fsdfsf',1)";
        
            if(mysqli_query($link , $sql)){
               
                
                $_SESSION["log_new"]="0";
                $_SESSION["code"]="";
                $_SESSION["mail"]="";
                $_SESSION["pwd"]="";
                $_SESSION["log_status"]="1";
                
                
                $ausgabe="<br><br><a href='./index.php'>Erfolgreich Angemeldet (weiter)</a><br><br>";
                

            } else{
                $ausgabe= "<br><br><a href='./index.php'>Wert wurde nicht geschrieben! (weiter)</a><br><br>";
            }
            
        } else { 
            $ausgabe=  "<br><br><a href='./index.php'>SQL-Verbindung konnte nicht hergestellt werden</a><br><br>";
        }

    }

        mysqli_close($link);
        

        include("template.php");	

?>




