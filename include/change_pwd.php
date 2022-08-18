<?php 
    
    $header="<div class='p_bigger'>Passwort ändern</div>";
    include("include/navigation.php");
    
    $ausgabe=<<<AUSGABE
        
    <br>
    <td>
    <p class="p_center p_big">Wollen Sie wirklich ihr Passwort zurücksetzen lassen?</p>
    </td>
   
    
    <table >
        <form action="index.php" onsubmit="return test_input()" method="post">
        <tr>
           
            <td>
                <table>
                    <tr>
                        <td>
                            <div class="p_mid fill_element">Passwort:</div>
                        </td>
                        <td >
                                
                                <input class="" type="password" id="pwd_1" name="pwd_1" value=""><br><br>                       
                        </td>
                    </tr>
                    <tr>
                    <td>
                        <div class="p_mid fill_element">Passwort wiederholen:</div>
                    </td>
                    <td >
                            
                            <input class="" type="password" id="pwd_2"  name="pwd_2" value=""><br><br>                        
                    </td>
                    </tr>
                </table>
            </td
        </tr>
        
        <tr>
            <td >
                    
                    <input class="p_big" type="submit" name="Submit" value="Passwort übernehmen">
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

$jss="  function ajaxrequest(php_file, tagID) {
        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');  


        var  the_data = '&pwd=' + document.getElementById('pwd_1').value  ;
       

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
            var pwd_1 = document.getElementById('pwd_1').value;
            var pwd_2 = document.getElementById('pwd_2').value;
                      
            if ( pwd_1.length > 3 && pwd_2.length > 3) {
                if ( pwd_1 == pwd_2) {
                    alert('Neues Passwort wird übernommen!' );
                    ajaxrequest('include/change_pwd_set.php', 'out_ajax');
                    return true;
                } else {
                    alert('Passwörter stimmen nicht überein');            
                }
            } else {
                alert('Formular unvollständig. Mindestens 4 Zeichen!');            
            }
            return false; 
        }


";


/*
 
    
   
  
*/
?>