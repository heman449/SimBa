<?php 

    $jss = "function test_input() {              
        var code = document.getElementById('code').value;
        var sess_code = document.getElementById('hidden_code').value;
        if (code == sess_code ) {
        
                        alert('Sende Daten zum Authentifizieren' );
                    
                        return true;
                    
        } else {
                alert('Aktivierungscode ist nicht korrekt!'); return false;
        }


        return false; 
    }";

    $ausgabe=<<<CODE_EINGEBEN
                
                <br><br>
                <form action="user_new.php" onsubmit="return test_input()" method="post">
                    <table>
                        <tr>
                            <td></td>
                            <td><h2>Bitte Aktivierungscode eingeben:</h2></td>
                        </tr>
                        <tr>
                            <td>Code:</td>
                            <td><input type="text" id="code" name="code" ></td>
                        </tr>
                        
                        <tr>
                            <td></td>
                            <td><br> <input onsubmit ="test_code" type="submit" name="aktivieren" value="Aktivieren">
                            </td>
                        </tr>
                    </table>
                    <input type="hidden" id="hidden_code" value="$code"> 
                </form><br>
    CODE_EINGEBEN;
?>