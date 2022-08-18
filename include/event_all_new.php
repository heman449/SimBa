<?php
$header = "<div class='p_bigger'>Event starten</div>";
include("include/navigation.php");

$uid = $_SESSION["uid"];
$user_rights = $_SESSION["log_status"];
$str_rights = $right[$user_rights];

$fehler= "";
$fehler = $_POST["fehler"];

$beschreibung = $_POST["post_beschreibung"];
$covid = $_POST["covid"];
if ($covid == "0" || $covid == "" ) {$covid = "";} else {$covid="checked";}

$guestbook = $_POST["guestbook"];
if ($guestbook == "0"  || $guestbook == "" ) {$guestbook = "";} else {$guestbook="checked";}

$gallerie = $_POST["gallerie"];
if ($gallerie == "0" || $gallerie == "" ) {$gallerie = "";} else {$gallerie="checked";}


$zugang = $_POST["zugang"];
if ($zugang == "0") {$sel_0 = "selected";} else {$sel_0 == "";}
if ($zugang == "1") {$sel_1 = "selected";} else {$sel_1 == "";}
if ($zugang == "2") {$sel_2 = "selected";} else {$sel_2 == "";}

$nachweis = $_POST["nachweis"];
if ($nachweis == "0") {$ssel_0 = "selected";} else {$ssel_0 == "";}
if ($nachweis == "1") {$ssel_1 = "selected";} else {$ssel_1 == "";}
if ($nachweis == "2") {$ssel_2 = "selected";} else {$ssel_2 == "";}
if ($nachweis == "3") {$ssel_3 = "selected";} else {$ssel_2 == "";}

$teilnehmer_max = $_POST["teilnehmer_max"];
$teilnehmer_min = $_POST["teilnehmer_min"];
$alter_max = $_POST["alter_max"];
$alter_min = $_POST["alter_min"];

if ($teilnehmer_max == "") {$teilnehmer_max = "0";} 
if ($teilnehmer_min == "") {$teilnehmer_min = "0";} 
if ($alter_max == "") {$alter_max = "0";} 
if ($alter_min == "") {$alter_min = "0";} 


$ausgabe='   <br><div class="p_mid p_center">Bitte Formular ausfüllen:</div><br>
            
            <form onsubmit="return test_input()" action="index.php" method="post">
                <table class="p_min">
                    <tr>
                        <td>
                            Name des Events:<br><br>
                        </td>
                        <td></td>
                        <td></td>
                        <td>              
                            <input class="p_full"  type="text" name="event_name"  id="event_name" value=""><br>
                            <div class="rot">'. $fehler .' </div> 
                            <br>
                        </td>
                    </tr> 
                    <tr>
                        <td>
                            Beschreibung<br><br>
                        </td>
                        <td></td>
                        <td></td>
                        <td> 
                            <textarea id="beschreibung" name="beschreibung" id="beschreibung" rows="4" cols="25">'. $beschreibung .'</textarea><br><br>
                        </td>
                    </tr>                   
                                      
                    <tr>
                        <td>
                            Zugang:<br><br>
                        </td>
                        <td></td>
                        <td></td>
                        <td class="p_left" >
                        <select  name="zugang" id="zugang">
                            <option '. $sel_0 .' value="0">privat(mit Einladung)</option>
                            <option '. $sel_1 .' value="1">geschlossen(auf Anfrage)</option>
                            <option '. $sel_2 .' value="2">öffentlich</option>
                        </select><br><br>
                        </td>
                    </tr>
                    
                    <tr>
                        <td>
                            Teinehmer:
                        </td>
                        <td></td>
                        <td></td>
                        <td>
                            <span>             
                            min. <input class="p_zahl" type="number" name="teilnehmer_min" min="0" value="'. $teilnehmer_min .'"> 
                            </span>
                            <span>             
                            max. <input class="p_zahl" type="number" name="teilnehmer_max" min="0" value="'. $teilnehmer_max .'"> 
                            </span>
                        </td>
                    </tr> 
                    <tr>
                        <td>
                            Alter:
                        </td>
                        <td></td>
                        <td></td>
                        <td>
                            <span>             
                            min. <input class="p_zahl" type="number" name="alter_max" min="0" value="'. $alter_max .'"> 
                            </span>
                            <span>             
                            max. <input class="p_zahl" type="number" name="alter_min" min="0" value="'. $alter_min .'"> 
                            </span>
                        </td>
                    </tr> 
                   
                    <br>
                    <tr>
                       
                        <td colspan="4"><br><br>
                            <input type="submit" name="Submit" value="Event starten">
                        </td>
                    </tr>
                </table>
            </form>
            
            <br> <br><br>
';

$jss=" 


    function test_input() { 
        
        var beschreibung = document.getElementById('beschreibung').value;
        var event_name = document.getElementById('event_name').value;
     
        if ( event_name.length > 3 ) {
            if ( beschreibung.length > 15) {  
               return true;                
            } else {
                alert('Bitte Beschreibung des Events eingeben. Mindestens 16 Zeichen!');            
            }
        } else {
            alert('Bitte Namen des Events eingeben. Mindestens 4 Zeichen!');            
        }

        return false; 

      
    }

   


";
/*
 <tr>
                        <td>
                            Covid-Impfnachweis: 
                        </td>
                        <td></td>
                        <td></td>
                        <td class="p_left">
                        <label>
                            <input type="checkbox" '.$covid.' name="chk_corona">
                        </label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Gästebuch:
                        </td>
                        <td></td>
                        <td></td>
                        <td class="p_left">
                        <label>
                            <input type="checkbox" '. $guestbook .' name="chk_guestbook">
                        </label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Bildergalerie(20):<br><br>
                        </td>
                        <td></td>
                        <td></td>
                        <td class="p_left">
                        <label>
                            <input type="checkbox" '. $gallerie .' name="chk_bilder"> <br><br>
                        </label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Identifikations Nachweis:<br><br>
                        </td>
                        <td></td>
                        <td></td>
                        <td class="p_left" >
                        <select name="nachweis" id="nachweis">
                            <option '. $ssel_0 .' value="0">kein Nachweis</option>
                            <option '. $ssel_1 .' value="1">Mail-Authentifikation</option>
                            <option '. $ssel_2 .' value="2">Lichtbild</option>
                            <option '. $ssel_3 .' value="3">Personal oder Reisepass</option>
                        </select><br><br>
                        </td>
                    </tr>

*/

?>