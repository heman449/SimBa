<?php 
    
    $header="<div class='p_bigger'>Emailadresse ändern</div>";
    include("include/navigation.php");
    
    $uid = $_SESSION["uid"];
    $mail = "";
   
    
    
    
   
   
    if($link) {
            
        $sql = "SELECT * from user_auth where `UID` = '". $uid. "'";
        $result = mysqli_query($link , $sql);
            
        if ($result->num_rows > 0) {
            $row = mysqli_fetch_assoc($result);
            
            $mail =$row["Email"];

           
            $ausgabe=<<<AUSGABE
        
            <br>
            <td>
            <p class="p_center p_big">Wollen Sie wirklich ihr Email-Adresse ändern?</p>
            </td>
        
            
            <table class="ausgabeknopf">
                <form action="index.php" onsubmit="return test_input()" method="post">
                <tr>
                
                    <td>
                        <table>
                            <tr>
                                <td>
                                    <div class="p_big p_just fill_element">Email-Adresse:</div>
                                </td>
                                <td >
                                        
                                        <input class="p_big fill_element" type="text" id="email" name="email" value="$mail"><br><br>                          
                                </td>
                            </tr>
                        </table>
                    </td
                </tr>
                
                <tr>
                    <td >
                            
                            <input class="p_big" type="submit" name="Submit" value="Email-Adresse übernehmen">
                        </form><br>
                    </td>
                </tr>
                <tr>
                    
                    <td >
                        <form action="index.php"  method="post" >                            
                            <input class="p_big" type="submit" name="Submit" value="Abbrechen">
                        </form>
                    </td>
                </tr>               
            </table>
        
            AUSGABE;

           
            
        }  else{ $ausgabe='<p class="p_center p_big">Fehler, User nicht gefunden!</p>'; }  
   
    } else { $ausgabe='<p class="p_center p_big">Fehler, keine verbindung zu SQL-Server möglich!</p>';}
    
    $jss="  function ajaxrequest(php_file, tagID) {
        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');  
        
        
        var  the_data = 'uid='+ document.getElementById('name').value + '&pwd=' + document.getElementById('pwd_1').value  ;
        the_data = the_data + '&email=' + document.getElementById('email').value
        
        request.open('POST', php_file, true);    
        
        
        request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        request.send(the_data);    
                        
        request.onreadystatechange = function() {
            if (request.readyState == 4) {
            /*document.getElementById(tagID).innerHTML = request.responseText;*/
            }
        }
    }

    function test_input() {              
       
        var email = document.getElementById('email').value;
        
        
        var emailReg = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        if ( email != '' ) {
            if (email.match(emailReg)) { 
                return true;
            } else {
                alert('Syntaxfehler Emailadresse!');                
            }
        } else {
                alert('Bitte Formular vollständig ausfüllen');
        }
        return false; 
    }

    
";

    


?>