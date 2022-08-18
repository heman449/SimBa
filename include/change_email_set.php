<?php 
    $uid =  $_SESSION["uid"];
    $email =  formread("email");
    $header = "<div class='p_bigger'>Emailadresse Änderung</div>";
    include("include/navigation.php");
    function domain_exists($email_ziel, $record = 'MX'){
        list($user, $domain) = explode('@', $email_ziel);
        return checkdnsrr($domain, $record);
    }
	
    if( domain_exists($email) ) {    
        if($link) {
            
            $sql = "UPDATE user_auth Set Email='". $email."' WHERE UID='". $uid."'";
            
        
            if(mysqli_query($link , $sql)){
                $ausgabe='<p class="p_center p_big">Email-Adresse wurde geändert!</p>';
            } else{
                $ausgabe='<p class="p_center p_big">Fehler, User nicht gefunden!</p>';
            }
            
        } else { $ausgabe='<p class="p_center p_big">Fehler, keine verbindung zu SQL-Server möglich!</p>';}
    } else { $ausgabe='<p class="p_center p_big">Fehler, Domäne exisitiert nicht!</p>';}
    $ausgabe.='<br><p class="p_center"><a class="p_small" href="index.php">zurück</a></p>';
    
    



?>