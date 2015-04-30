<?php
/**
 * Created by PhpStorm.
 * User: robertarandazzo
 * Date: 27/04/15
 * Time: 13:22
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




$update_rows=$connessione->exec( "UPDATE User SET Username='Stronzo' WHERE Username='Bill'");

echo $update_rows."Aggiornamento Effettuato  <br> <a href='select_form.php'>Back </a>";