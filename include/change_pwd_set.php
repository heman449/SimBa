<?php 
    session_start();
    $uid =  $_SESSION["uid"];
    $pwd_hash =  $_POST["pwd"];
    include("include/navigation.php");
    
    
	define("host","rdbms.strato.de");
	define("name","U3509054");
	define ("pw" ,"he19man79kool");
	define( "db" ,"DB3509054"); 

	$bytes  = openssl_random_pseudo_bytes(16);
    $salt   = bin2hex($bytes);
    $iterations = 1000;
    $pwd_hash = hash_pbkdf2("sha256", $pwd_hash, $salt, $iterations, 20);
    

	
	$con = mysqli_connect(host, name, pw, db);
    
	if($con) {
            //('dasd2321','12313','3dda','123123','2")
        //$sql = "INSERT INTO `user_auth` (UID,PW,Email,Salt,Status) VALUES ('". $uid ."', '". $pwd_hash ."', '". $email ."','". $salt."','1')";
        $sql = "UPDATE user_auth Set PW='". $pwd_hash."', Salt='".$salt."' WHERE UID='". $uid."'";
        //$sql = "INSERT INTO `user_auth`(`UID`, `Email`, `PW`, `Salt`, `Status`) VALUES ('123dasd', 'asdads','sdfsf', 'fsdfsf',1)";
       
        if(mysqli_query($con , $sql)){
            print ("true");
        } else{
            print ("false");
        }
        mysqli_close($con);
    } else { print ("false");}
     
    
 
?>