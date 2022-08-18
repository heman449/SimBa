<?php
$header = "<div class='p_bigger'>Für Event anmelden</div>";
include("include/navigation.php");

$name= formread("event_name");
$beschreibung= formread("beschreibung");



$event_id= formread("event_id");
$event_zugang= formread("event_zugang");

$ausgabe="$event_id :: $event_zugang ";


if ($link) {
    if ($event_zugang == "0") {
        $ausgabe="<div class='p_big p_center'><br><br><div class='p_big'>Event \"$event_id\" ist eine privates Event!</div><br><br>Zugang verweigert, nur auf Einladung!
                  <br><br><br>  <div class='p_trim_25'><form action='index.php' method='post'>                 
                        <input type='submit' name='Submit' value='Übersicht Events'>
                        </form></div></div>";
    } else if ($event_zugang == "1") {    

    } else if ($event_zugang == "2") { 
        $uid= $_SESSION["uid_id"];   

        $sql = "INSERT INTO `event_auth`(`event_auth_uid`, `event_auth_event_id`) VALUES (
                                    '$uid','$event_id')";
                                    $ausgabe= $sql;
       $result = mysqli_query($link , $sql);
        $ausgabe="<div class='p_big p_center'><br><br><div class='p_big'>Anmeldung zum Event \"$event_id\" erfolgreich!</div><br><br>
                  <br><br><br>  <div class='p_trim_25'><form action='index.php' method='post'>                 
                        <input type='submit' name='Submit' value='Übersicht Events'>
                        </form></div></div>";
    }

} else {
    
    $ausgabe='<p class="p_center p_big">Fehler, keine verbindung zu SQL-Server möglich!</p>';
}
/*

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


                            <form action="index.php" method="post">
                                <input type="hidden" name="post_beschreibung" value="'. $beschreibung .'">
                                <input type="submit" name="Submit" value="zurück zum Formular">
                            </form>
                        
                        */
?>