<?php
/**
 * Created by PhpStorm.
 * User: robertarandazzo
 * Date: 27/04/15
 * Time: 17:03
 */

/*include'conn_db.php';*/
$host = "localhost";



// nome del database
$db = "Registrazione";

// username dell'utente in connessione al DB
$user = "root";

// password del DB
$password = "";


$connessione = new PDO("mysql:host=$host;dbname=$db", $user, $password);



$id=$_GET['id'];


$sql= $connessione->exec(" DELETE FROM User WHERE IDuser=".$id);

echo"<br><br> Record: ".$id."  - Eliminato! <br> <a href='select_form.php'>Back </a> " ;