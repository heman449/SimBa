<?php 
$header = '<div class="p_bigger">Login</div>';
$ausgabe='<div class="p_big p_center"><br>';
if($link) {
    $bool = "false";
    $sql = "SELECT * from user_auth where `UID` = '". $uid. "'";
    $result = mysqli_query($link , $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        
        $real_pw =$row["PW"];
        $salt = $row["Salt"];
        $status =$row["Status"];
        $uid_id = $row["UID_id"];
        
        $iterations = 1000;
        $pwd_hash_result = hash_pbkdf2("sha256", $pwd_log, $salt, $iterations, 20);

        if($pwd_hash_result==$real_pw){
            $_SESSION["log_status"]= $status;
            $_SESSION["uid"]= $uid;
            $_SESSION["uid_id"]= $uid_id;
            $ausgabe.='Login erfolgreich!<br><a class="p_small" href="index.php">weiter</a></div>';
        } else {
            $_SESSION["log_status"]= "0";
            $ausgabe.='Login nicht erfolgreich!<br><a class="p_small" href="index.php">zurueck</a></div>';
        }

    }  else {
        $_SESSION["log_status"]= "0";
        $ausgabe.='Login nicht erfolgreich!<br><a class="p_small" href="index.php">zurueck</a></div>';
    }
    
        
}

$nav= "";
 
?>