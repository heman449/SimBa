<?php

$uid = $_SESSION["uid"];
$user_rights = $_SESSION["log_status"];
$str_rights = $right[$user_rights];
$ausgabe=$user_rights;

if($link) {

        
        $ausgabe=' 
                    <table class="p_tabelle_border">
                        <tr  class="p_tabelle_border p_bg_grey" >
                            ';
        if ($user_rights=="3" || $user_rights=="2" ){
            $ausgabe.='     <td>
                                <form action="index.php" method="post">
                                    <input class="p_mid" type="submit" name="Submit" value="Neues Event starten">
                                </form>
                            </td>
            ';
        }
        $ausgabe.='         
                        
                        <td  > <div class="p_mid p_center">Rechte: '. $str_rights .'</div></td>
                    </table>
                    <br><br>           
        ';
        $sql = "SELECT * from events";
        $result = mysqli_query($link , $sql);
        $sql_2 = "SELECT * from event_auth";
        $result_2 = mysqli_query($link , $sql_2);

        $ausgabe.='<table class="p_tabelle_mit_border">';
        $ausgabe.='<tr>';
        $ausgabe.='<th>ID</th>';
        $ausgabe.='<th>Name</th>';
        $ausgabe.='<th>Zugang</th>';
        $ausgabe.='<th>Anmelden</th>';
        /*if ($user_rights == "3") 
        {
            $ausgabe.='<th>Löschen</th>';

        }
        */
    
        $ausgabe.='</tr>';
        while  ($row = mysqli_fetch_assoc($result)) {
            $sql_2 = "SELECT * from event_auth";
            $result_2 = mysqli_query($link , $sql_2);
            $bool = false;
            while($row_auth = mysqli_fetch_assoc($result_2)) {
                $event_id = "". $row_auth["event_auth_event_id"];
                $user_id = "". $row_auth["event_auth_uid"];
                $ausgabe.="$event_id  ".$row["event_id"];
                if ($event_id == $row["event_id"] &&  $user_id == $_SESSION["uid_id"] ) {$bool=true; }
               
            }

            $ausgabe.='<tr>';
                $ausgabe.='<td>';
                    $ausgabe.=$row["event_id"];            
                $ausgabe.='</td>';

                $ausgabe.='<td>';
                    $ausgabe.=$row["event_name"];            
                $ausgabe.='</td>';
                
                $zugang=$row["event_zugang"]; 
                $ausgabe.='<td>';
                    $ausgabe.=$ar_zugang[$zugang];            
                $ausgabe.='</td>';
                if ($bool) {
                    $anmelden='angemeldet'; 
                } else {
                    $anmelden='<form action="index.php" method="post">
                    <input type="hidden" name="event_id" value="'. $row["event_id"] .'">
                    <input type="hidden" name="event_zugang" value="'. $row["event_zugang"] .'">
                    <input type="submit" name="Submit" value="Anmelden">
                    </form>'; 
                }
               

                $ausgabe.='<td>';
                    $ausgabe.=$anmelden;            
                $ausgabe.='</td>';
                /*
                $btn_delete='<form action="index.php" method="post">
                                <input type="submit" name="Submit" value="Event löschen">
                             </form>'; 

                $ausgabe.='<td>';
                    $ausgabe.=$btn_delete;            
                $ausgabe.='</td>';
               */
            $ausgabe.='</tr>';
        }
        $ausgabe.='</table>';



        
} else {
    
    $ausgabe='<p class="p_center p_big">Fehler, keine verbindung zu SQL-Server möglich!</p>';
}

$header = "<div class='p_bigger'>Übersicht Event</div>";
include("include/navigation.php");

?>