<?php
/**
 * Created by PhpStorm.
 * User: robertarandazzo
 * Date: 28/04/15
 * Time: 09:52
 */
echo"<h1>Risultati della tua ricerca</h1> <p> Click   <a href='select_form.php'> HERE </a> to go back to the DB Home</p>";
//connessione db
include('conn_db.php');



// variabile presa dal submit in "name" se esiste


/*$cerca= (isset($_POST['cerca'])) ? $_POST['cerca'] : '';*/

if (!empty($_POST["cerca"])) {

    $cerca=$_POST['cerca'];
/*-----------------------------------


 //stringa funzionante!!!

    // variabile presa dal submit in "name"
        $cerca = $_POST['cerca'];

 // stampa tutto il DB riga per riga

foreach($connessione->query("SELECT * FROM USER  WHERE (IDuser LIKE '%$cerca%')
                            OR ( Username LIKE '%$cerca%')
                            OR (Email LIKE '%$cerca%')
                            OR (Password LIKE '%$cerca%')
                        ")
        as $row) {
    echo 'IDuser: '.$row['IDuser'].'  - Username: '.$row['Username'].'  - Password: '. $row['Password'].'  -  Email: '.$row['Email'].' <br>';

                }

-------------------------------------*/

$sql = "SELECT * FROM USER  WHERE (IDuser LIKE '%$cerca%')
                            OR ( Username LIKE '%$cerca%')
                            OR (Email LIKE '%$cerca%')
                            ";
if ($res = $connessione->query($sql)) {

    /* Check the number of rows that match the SELECT statement */
    if ($res->fetchColumn() > 0) {


        foreach ($connessione->query($sql) as $row) {

            print 'IDuser: '.$row['IDuser'].'  - Username: '.$row['Username'].'  - Password: '. $row['Password'].'  -  Email: '.$row['Email'].' <br>';
        }
    }

    /* No rows matched -- do something else */
    else {
         echo "Non esiste alcun RECORD contenente il temine: ".$cerca ;


    }

}
            }else{  echo"ERRORE - Nessun Parametro di Ricerca Inserito! ";}

$res = null;
$conn = null;




