<?php 
    
    $header="<div class='p_bigger'>Einstellungen</div>";
    include("include/navigation.php");
    
    $ausgabe=<<<AUSGABE
            <br><br>
            
            <table class="ausgabeknopf">
                
                <tr>
                   
                    <td >
                        <form action="$pfad" method="post"><input type="submit" class="p_big" name="Submit" value="Passwort ändern"></form><br>
                    </td>
                </tr>               
                <tr>
                    
                    <td class="p_big">
                        <form action="$pfad" method="post"><input type="submit" class="p_big" name="Submit" value="Emailadresse ändern"></form>
                    </td>
                </tr>
                
            </table>
    AUSGABE;
?>