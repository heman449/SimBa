<?php 
    $header = '<div class="p_bigger">Anmeldung</div>';
    $nav="";
    $ausgabe ='    
    
        <form action="index.php" onsubmit="return test_input()" method="post">
            <table class="ausgabeknopf" >
                <tr>
                    <td></td>
                    <td><h2 >Bitte ausfuellen:</h2></td>
                </tr>
                <tr>
                    <td class="">Username:</td>
                    <td><input class="p_big" value="'. $name .'" type="text" id="name" name="name" ></td>
                </tr>
                <tr> 
                    <td class="">Passwort:</td> 
                    <td><input class="p_big" type="password" id="pwd_1" name="pwd_1"></td>
                </tr>
                <tr> 
                    <td class="">Passwort wiederholen:</td> 
                    <td><input class="p_big" type="password" id="pwd_2" name="pwd_2"></td>
                </tr>
                <tr> 
                    <td class="">Email Adresse:</td> 
                    <td><input class="p_big" placeholder="Adresse@Server.de" type="text" id="email" name="email"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><br> <input onsubmit ="test_input" type="submit" name="Submit" value="Anmelden">
                        <br><a class="p_small" href="index.php">zurueck</a></td>
                </tr>
            </table>

        </form>
    <br>';
    
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
                var name = document.getElementById('name').value;
                var email = document.getElementById('email').value;
                var pwd_1 = document.getElementById('pwd_1').value;
                var pwd_2 = document.getElementById('pwd_2').value;
                
                var emailReg = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
                if (name != '' && email != '' && pwd_1 != '' && pwd_2 != '') {
                    if (email.match(emailReg)) {
                        
                        if (name.length > 3 && pwd_1.length > 3&& pwd_2.length > 3) {
                            if ( pwd_1 == pwd_2) {
                                alert('Sende Daten zum Authentifizieren' );
                                ajaxrequest('log_new.php', 'out_ajax');
                                return true;
                            } else {
                                alert('Passwörter stimmen nicht überein');            
                            }
                        } else {
                            alert('Formular unvollständig. Mindestens 4 Zeichen!');            
                        }
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