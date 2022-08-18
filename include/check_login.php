<?php
$ausgabe=<<<INIT

<div class="p_center p_mid">	
    <br>
    <form id="form_id_1" onsubmit="return test_input_2()" action="log_in.php"  method="post">	
        
        <table class="ausgabeknopf">
            
            
            <tr>
                <td>
                    <table>
                        <tr>
                            <td></td>
                            <td class="p_mid">Bitte Authentifizieren Sie sich:<br><br></td>
                        </tr>
                        <tr>
                            <td class="p_mid">User:</td>
                            <td><input class="p_mid" value="$name" type="text" id="name" name="name" ></td>
                        </tr>
                        <tr> 
                            <td class="p_mid">Passwort:</td> 
                            <td><input class="p_mid" type="password" id="pwd" name="pwd"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td class=""><br><input class="p_mid" type="submit"  name="Submit" value="Log in">
                            </form> <br>
                            <form  id="form_id_2"  action="log_in.php"  method="post">	
                                <input  class="p_mid" type="submit" name="Submit" value="Neu anmelden">
                                <br><div class="p_center"><a class="p_small p_center" href="log_vergessen.php">Passwort vergessen</a></div></td>
                            </form>
                        </tr>
                    </table>
                <td>
            </tr>
            
        </table>

        
        
        
        
        
     
</div> 	
	
INIT;

$jss = "function test_input_2() {          
    var name = document.getElementById('name').value;
    var pwd = document.getElementById('pwd').value;
  
    if (name != '' &&  pwd != '' ) {
        if (name.length > 3 && pwd.length > 3) {
            
                alert('Sende Daten zum Authentifizieren' );               
                return true;
            
        } else {
            alert('Formular unvollständig. Mindestens 4 Zeichen!');            
        }
        
    } else {
            alert('Bitte Formular vollständig ausfüllen');
    }

    return false; 
}";

$nav="";

$header='<div class="p_bigger">Authentifikation<div>';

$_SESSION["log_status"]="0";

?>