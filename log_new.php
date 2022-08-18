<?php 
	
	session_start();

    function formread($liste) {
        if (isset($_POST[$liste])) {
            return htmlspecialchars (($_POST[$liste]));                
        } else { return ""; }
    }

	$uid =  formread("uid"); 

	$email =  formread("email");
    $pwd =  formread("pwd");

    
    
    
    
	define("host","rdbms.strato.de");
	define("name","U3509054");
	define ("pw" ,"he19man79kool");
	define( "db" ,"DB3509054"); 
	
	
	$con = mysqli_connect(host, name, pw, db);
    
	if($con) {

        $sql = "SELECT * from user_auth ";
        $query = mysqli_query($con , $sql);
       
        $btmp_uid_check = "false";
        while ($data = mysqli_fetch_assoc($query)  )
        {
                // $output[]=$data;
                    $stmp_uid = $data["UID"];
                    if ($stmp_uid == $uid) { $btmp_uid_check = "true"; }
        }
 
        $btmp_email_check_syntax = "false";
        if (filter_var($email, FILTER_VALIDATE_EMAIL) ) { $btmp_email_check_syntax = "true"; }
        
        $btmp_email_check_domane = "false";
        if($email != ''){
            
            function domain_exists($email_ziel, $record = 'MX'){
                list($user, $domain) = explode('@', $email_ziel);
                return checkdnsrr($domain, $record);
            }
            
            if(domain_exists($email)) { $btmp_email_check_domane = "true"; }
            
        }

        
       
        //print($btmp_uid_check .";".$btmp_email_check_syntax .";".$btmp_email_check_domane  );
        
        if ($btmp_uid_check == "false"&& $btmp_email_check_syntax == "true" && $btmp_email_check_domane == "true") {
           
           
            $code= substr(md5(rand()),0,8);
            $nachricht = "Hallo!\r\n\r\nWillkommen bei EventMe!\r\nIhre Zugangscode lautet: ". $code;
            $nachricht .= "\r\n\r\n\r\nLG Ihr EventMe Team ...";
            $header = 'From: no-reply@heman449.de' . "\r\n" .
            'Reply-To: EventMe.info@heman449.de' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
            
            $nachricht = wordwrap($nachricht, 70, "\r\n");
            
            // Verschicken
            mail($email, 'EventME', $nachricht, $header);
            $_SESSION['pwd'] = $pwd;
            $_SESSION['UID'] = $uid;
            $_SESSION['mail'] = $email;
            $_SESSION['log_new'] = "1";
            $_SESSION['code']= $code;
            
            print ("true");
        } else { print ("false" );}
        mysqli_close($con);
    } else { print ("false");}
    
    
       
?>