<?php
/**
 * Created by PhpStorm.
 * User: robertarandazzo
 * Date: 27/04/15
 * Time: 12:52
 */
/*

// nome di host
$host = "localhost";



// nome del database
$db = "Registrazione";

// username dell'utente in connessione
$user = "root";

// password dell'utente
$password = "";


$connessione = new PDO("mysql:host=$host;dbname=$db", $user, $password);*/

include'conn_db.php';

foreach($connessione->query('SELECT * FROM User') as $row) {
    echo $row['Username'].', '.$row['Password'].', '.$row['Email'].' <br>';
}


