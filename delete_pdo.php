<?php
/**
 * Created by PhpStorm.
 * User: robertarandazzo
 * Date: 27/04/15
 * Time: 12:37
 */
/**
 * Created by PhpStorm.
 * User: robertarandazzo
 * Date: 27/04/15
 * Time: 10:02
 */

/*

// blocco dei parametri di connessione

// nome di host
$host = "localhost";



// nome del database
$db = "Registrazione";

// username dell'utente in connessione
$user = "root";

// password dell'utente
$password = "";


$connessione = new PDO("mysql:host=$host;dbname=$db", $user, $password); */

include'conn_db.php';



$sql= $connessione->exec(" DELETE FROM User WHERE IDUSER=5 ");

echo"Dato: id=13 - Cancellato";
