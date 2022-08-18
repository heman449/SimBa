<?php
    $nav='  <form action="index.php" method="post">
    <input class="p_mid" type="submit" name="Submit" value="Home"></form><br>';
    
    /*$nav.='<form action="index.php" method="post"><input class="p_mid" type="submit" name="Submit" value="Übersicht Events"></form>';
    $nav.='<form action="index.php" method="post"><input class="p_mid" type="submit" name="Submit" value="Eigene Events"></form>';
    */
    $nav.='  <form action="index.php" method="post">
    <input type="hidden" name="init" value="2">
    <input class="p_mid" type="submit" name="Submit" value="Einstellungen"></form><br><br>';

    

    $nav.='<form action="index.php" method="post"><input class="p_mid" type="submit" name="Submit" value="Logout"></form>';


?>