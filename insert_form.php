





<!DOCTYPE html>
<html>
<head>
	<title>Insert New Record PDO</title>
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


<!-- just a header -->
<h1>PDO: Add a Record</h1>

<!--we have our html form here where user information will be entered-->
<form action='#' method='post' border='0'>
    <table>
        <tr>
            <td>Username</td>
            <td>Email</td>
            <td>Password</td>
            <td>Action</td>

        </tr>
        <tr>
            <td><input type='text' name='username' required /></td>
            <td><input type='email' name='email' required /></td>
            <td><input type='text' name='password' required /></td>
            <td>
                <input type='submit' value='Save' />
                or &nbsp;
                <a href='select_form.php'>Back </a>
            </td>
        </tr>
        <tr>


    </table>
</form>


</body>
</html>
<?php
/**
 * Created by PhpStorm.
 * User: robertarandazzo
 * Date: 27/04/15
 * Time: 18:52
 */

if($_POST) {
    //include database connection
    include 'conn_db.php';

    $username = (isset($_POST['username'])) ? $_POST['username'] : '';
    $pass = (isset($_POST['password'])) ? $_POST['password'] : '';
    $email = (isset($_POST['email'])) ? $_POST['email'] : '';


    $sql = $connessione->prepare("INSERT INTO `User`( `Username`, `Password`,`Email`)

                        VALUES ('".$username."','".$pass."','".$email."') "
    );
    if ($sql->execute()) {
        echo "Dato: ".$username.", ".$email.", ".$password." - Inserito";
    } else {
        die('Impossibile Salvare il Record.');
    }
}

?>
