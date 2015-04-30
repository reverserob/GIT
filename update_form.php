<?php
/**
 * Created by PhpStorm.
 * User: robertarandazzo
 * Date: 27/04/15
 * Time: 17:18
 */



// il get mi porta i valori  dei recor presenti ni link della pagina SELECT nei campi del form in questa pagina
            $id=$_GET['IDuser'];
            $username=$_GET['Username'];
            $pass=$_GET['Password'];
            $email=$_GET['Email'];

//definizione condizione post
if($_POST)
{
    // collegamento al db
    include'conn_db.php';

    //variabili prese dopo il submit tra virgolette ci sono gli ID delle variabili nel form


    $usern= (isset($_POST['usern'])) ? $_POST['usern'] : '';
    $passn = (isset($_POST['passn'])) ? $_POST['passn'] : '';
    $emailn = (isset($_POST['emailn'])) ? $_POST['emailn'] : '';


// modifica del record nel db con update
    $sql= $connessione->exec("UPDATE User
    							SET Username='$usern' , Password='$passn' , Email='$emailn'
                              	WHERE IDuser='$id'
                               ");


        //stampo l'avvenuto aggiornamento
     echo "<br><br> Aggiornamento Record Effettuato <a href='select_form.php'>Back </a>";

            }
            else
            {

?>
<!DOCTYPE html>
<html>
<head>
    <title>Update Record PDO</title>
    <style>
        body{
            font-family: Georgia, Utopia, Palatino, ‘Palatino Linotype’, serif;
            text-align: center;
            background-color: darkslategrey;
            color: aquamarine;
        }
        h1{
            text-decoration: overline;
            color: #FFB84D;
        }

        table, tr, td {
            font-family: font-family: Georgia, Utopia, Palatino, ‘Palatino Linotype’, serif;
            margin: 0 auto;
            border: 1px solid black;
            text-align: center;
            background-color: aquamarine;
            color:black;
        }
        table input[type=submit]{
            border: 0px;
            color: #FF9900;
            font-size: large;
            background-color: transparent;
            font-family: Georgia, Utopia, Palatino, ‘Palatino Linotype’, serif;
            cursor:pointer;
            text-decoration: underline;
        }
        table input[type=submit]:hover{color:#CC7A00}
        table a:link, a:active, a:visited{
            color: #FF9900;

        }
        table a:hover{color:#CC7A00}
    </style>
</head>
<body>
<h1>PDO: Update Record</h1>
<form method="post" action="<?php $_PHP_SELF ?>">
    <table>
        <tr>
            <td> IDuser</td>
            <td> Username</td>
            <td> Password </td>
            <td> Email </td>
            <td>Action</td>
        </tr>
        <tr>
            <td><input type="text" name="<?php  echo $id ?>" value="<?php  echo $id ?>"> </td>
            <td><input type="text" name="usern" value="<?php  echo $username ?>"> </td>
            <td><input type="text" name="passn" value="<?php  echo $pass ?>"> </td>
            <td><input type="text" name="emailn" value="<?php  echo $email ?>"> </td>

            <td>
                <input type="submit" name"update" value="Update">
                <a href="select_form.php">BACK</a>
            </td>
        </tr>

    </table>
    </form>
<?php
}
?>
</body>
</html>