<?php

   

    $bool = "false";
    $uid =  $name;
  
	$pwd =  $code= substr(md5(rand()),0,8);
    
    
    
	
	  
	
    
	if($link && strlen($name) > 3) {
        $sql = "SELECT * from user_auth where `UID` = '". $uid. "'";
      
        $result = mysqli_query($link , $sql);
        if ($result->num_rows > 0) {
            $row = mysqli_fetch_assoc($result);
            
            $email =$row["Email"];
            $salt = $row["Salt"];
        
            
            $iterations = 1000;
            $pwd_hash_result = hash_pbkdf2("sha256", $pwd, $salt, $iterations, 20);

            $sql = "UPDATE user_auth set PW='".$pwd_hash_result."' where UID = '". $uid ."'";
            
            $test = mysqli_query($link , $sql);
           
            $nachricht = "Hallo!\r\n\r\nPasswort zurückgesetzt\r\nIhre neues Password lautet: ". $pwd;
            $nachricht .= "\r\n\r\n\r\nLG Ihr EventMe Team ...";
            $header = 'From: no-reply@heman449.de' . "\r\n" .
            'Reply-To: EventMe.info@heman449.de' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
            
            $nachricht = wordwrap($nachricht, 70, "\r\n");
            
            // Verschicken
            if ($email) {
            mail($email, 'EventME', $nachricht, $header);
            $bool ="true";
             
            } else {$bool ="false3";$ausgabe="<br><br><p class='p_biggie p_center'>Fehler beim vesenden der Email!</p>";}

        }  else{ $bool ="false2";$ausgabe="<br><br><p class='p_biggie p_center'>Username existiert nicht!</p>"; }  

        

        
       
        //print($btmp_uid_check .";".$btmp_email_check_syntax .";".$btmp_email_check_domane  );
        
      
      
        

    } else { $bool ="false1";$ausgabe="<br><br><p class='p_biggie p_center'>Bitte Eingabe überprüfen!</p>";}
    
    if ($bool=="true") {
        $header='<div class="p_bigger">Passwort gesendet</div>';
        $ausgabe=<<<AUSGABE
                        <br><br><p class="p_biggie p_center">Bitte überprüfen Sie Ihr Email-Postfach. Ein neues Passwort wurde Ihnen zugesendet!</p>
                    AUSGABE;
    } else {
        $header='<div class="p_bigger">Passwort nicht gesendet</div>';
       
    }

    $nav="";

   

?>