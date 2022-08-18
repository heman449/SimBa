<?php 




echo "true";
exit;
  
include("define.php");
include("funktionen.php");
define_homepage();




$name= fomread("event_name");


$link = mysqli_connect(host,name,pw,db);


if (!$link) {
	echo "Fehler: konnte nicht mit MySQL verbinden." . PHP_EOL;
	echo "Debug-Fehlernummer: " . mysqli_connect_errno() . PHP_EOL;
	echo "Debug-Fehlermeldung: " . mysqli_connect_error() . PHP_EOL;
	exit;
}




    if($link) {
            //('dasd2321','12313','3dda','123123','2")
        //$sql = "INSERT INTO `user_auth` (UID,PW,Email,Salt,Status) VALUES ('". $uid ."', '". $pwd_hash ."', '". $email ."','". $salt."','1')";
        $sql = "SELECT event_name from events";
        //$sql = "INSERT INTO `user_auth`(`UID`, `Email`, `PW`, `Salt`, `Status`) VALUES ('123dasd', 'asdads','sdfsf', 'fsdfsf',1)";
    
        if($result=mysqli_query($link , $sql)){
            
            while (  $row = mysqli_fetch_assoc($result)  )  {
            
        
                if($row["event_name"] == $name) 
                {
                    echo "true";
                    mysqli_close($link);
                    exit;        
                }
            
        
            }

        } else{
            $ausgabe =  "false";   
        }
        
    } else { 
        $ausgabe = "false";
    }



mysqli_close($link);
 
echo $ausgabe;      



?>




