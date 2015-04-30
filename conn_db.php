<?php
// nome di host
$host = "localhost";



// nome del database
$db = "Registrazione";

// username dell'utente in connessione
$user = "root";

// password dell'utente
$password = "";


$connessione = new PDO("mysql:host=$host;dbname=$db", $user, $password);
