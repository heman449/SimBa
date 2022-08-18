<?php

$header = "<div class='p_bigger'>Event erstellen</div>";
include("include/navigation.php");

$name= formread("event_name");
$beschreibung= formread("beschreibung");

if (formread("chk_corona")!= "") {$chk_corona="1"; } else {$chk_corona="0";}
if (formread("chk_guestbook")!="") {$chk_guestbook="1"; } else {$chk_guestbook="0";}
if (formread("chk_bilder")!="") {$chk_bilder="1"; } else {$chk_bilder="0";}

$zugang= formread("zugang");
$nachweis= formread("nachweis");
$teilnehmer_min= formread("teilnehmer_min");
$teilnehmer_max= formread("teilnehmer_max");
$alter_max= formread("alter_max");
$alter_min= formread("alter_min");

$date= date("m.d.y");


// INSERT INTO MyGuests (firstname, lastname, email) VALUES ('John', 'Doe', 'john@example.com')
if($link) {
    $bool = false;
    $sql = "SELECT event_name from events";
    if($result=mysqli_query($link , $sql)){
        
        while (  $row = mysqli_fetch_assoc($result)  )  {
        
    
            if($row["event_name"] == $name) 
            {
               $bool = true;
            }
        
    
        }

    } 

    if ($bool == false) {
        $sql = "INSERT INTO `events`(`event_name`, `event_text`,                                 
                                    `event_user_min`, `event_user_max`, `event_old_min`, `event_old_max`, `event_erstell_datum`, 
                                    `event_zugang`) VALUES (
                                    '$name','$beschreibung',                                    
                                    $teilnehmer_min , $teilnehmer_max , $alter_min , $alter_max , '$date' ,
                                    $zugang)";
                                    $ausgabe= $sql;
        $result = mysqli_query($link , $sql);
        $ausgabe="<p class=\"p_center p_big\">Das Event \"$name\" wurde erstellt!<br>".$sql."</p>
                <div class=\"p_center\"><a class=\"p_small p_center\" href=\"index.php\">zurueck</a></div>                       
                ";                                
    } else {  
        $ausgabe='  <p class="p_center p_big">Fehler, Eventname: "'. $name .'" existiert schon!</p>
                    <div class="p_center">
                        <form action="index.php" method="post">
                            <input type="hidden" name="post_beschreibung" value="'. $beschreibung .'">
                            <input type="hidden" name="covid" value="'. $chk_corona .'">
                            <input type="hidden" name="guestbook" value="'. $chk_guestbook .'">
                            <input type="hidden" name="gallerie" value="'. $chk_bilder .'">
                            <input type="hidden" name="zugang" value="'. $zugang .'">
                            <input type="hidden" name="nachweis" value="'. $nachweis .'">

                            <input type="hidden" name="teilnehmer_max" value="'. $teilnehmer_max .'">
                            <input type="hidden" name="teilnehmer_min" value="'. $teilnehmer_min .'">
                            <input type="hidden" name="alter_max" value="'. $alter_max .'">
                            <input type="hidden" name="alter_min" value="'. $alter_min .'">

                            <input type="hidden" name="fehler" value="Bitte einen neuen Namen angeben!">
                            <input type="submit" name="Submit" value="zurück zum Formular">
                        </form>
                    </div>';
            } 
} else {
    
    $ausgabe='<p class="p_center p_big">Fehler, keine verbindung zu SQL-Server möglich!</p>';
}

/*
                            <form action="index.php" method="post">
                                <input type="hidden" name="post_beschreibung" value="'. $beschreibung .'">
                                <input type="submit" name="Submit" value="zurück zum Formular">
                            </form>
                        
                        */
?>