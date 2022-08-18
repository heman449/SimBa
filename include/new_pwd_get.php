<?php

    $header='<div class="p_bigger">Passwort zurücksetzen</div>';
    $ausgabe=<<<AUSGABE
        
        <br>
        <td>
        <p class="p_center p_big">Wollen Sie wirklich ihr Passwort zurücksetzen lassen?</p>
        </td>
       
        
        <table class="ausgabeknopf">
            <form action="log_vergessen.php"  method="post">
            <tr>
               
                <td>
                    <table>
                        <tr>
                            <td>
                                <div class="p_big p_just fill_element">Username:</div>
                            </td>
                            <td >
                                    
                                    <input class="p_big fill_element" type="text" name="name" value="$name"><br><br>                          
                            </td>
                        </tr>
                    </table>
                </td
            </tr>
            
            <tr>
                <td >
                    	
                        <input class="p_big" type="submit" name="Submit" value="neues Passwort anfordern">
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

    $nav ="";
    //include("include/navigation.php");

?>