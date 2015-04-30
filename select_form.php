<?php
/**
 * Created by PhpStorm.
 * User: robertarandazzo
 * Date: 29/04/15
 * Time: 11:02
 */
include'conn_db.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>SELECT PDO</title>
    <style>
        body{
                    font-family: Georgia, Utopia, Palatino, ‘Palatino Linotype’, serif;
                    text-align: center;
                    background-color: darkslategrey;
                    color: aquamarine;
                }

        #p1 a:link, a:active, a:visited{
                                            color: aquamarine;
                                        }

        #p1 a:hover{
                        color: #FFB84D;
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

        .td {
            font-family: Georgia, Utopia, Palatino, ‘Palatino Linotype’, serif;
                                                color:#FF9900;
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

<h1>DataBase Registrazione - Tabella User</h1>
<!-- TEXTFIELD INSERT NEW RECORD -->
<div id="p1"> <p> INSERT a new Record <a href="insert_form.php"> Here </a> </p>
    <!--TEXTFIELD CERCA FIND RECORD-->
    <p><form method='post' action='ricerca_form.php'>
        FIND Record <input type='text' name='cerca'  />
        <input type="submit" value="FIND"  />
    </form></p>
</div>

<div>
    <p><!-- PULSANTE GET LUCKY-->
    <form method='post' action='<?php $_PHP_SELF ?>'>
        Get a RANDOM Record ..
        <input type="submit" value="GET LUCKY!" name="lucky"  />
        <?php

        // GET LUCKY
        if (isset($_POST['lucky'])){

            $query_lucky=$connessione->query('SELECT * FROM User ORDER BY RAND() LIMIT 1');

            $qlucky = $query_lucky->fetch(PDO::FETCH_ASSOC);

            echo '<br>IDuser: '.$qlucky['IDuser'].'  - Username: '.$qlucky['Username'].'  - Password: '.$qlucky['Password'].'  -  Email: '.$qlucky['Email'].' <br>';

        }

        ?>
    </form>
    </p>
</div>
<br><br>





    <table>
    <tr>
        <td><form method="GET" action="<?php $_PHP_SELF ?>">
                <input type="submit"  name="bastardo" value="ID"></form></td>
        <td> <form method="GET" action="<?php $_PHP_SELF ?>">
			<input type="submit"  name="stronzo" value="Username"></form>
        </td >
        <td class="td"> PASSWORD </td>
        <td> <form method="GET" action="<?php $_PHP_SELF ?>">
                <input type="submit"  name="maledetto" value="Email"></form> </td>
        <td class="td"> ACTION </td>
    </tr>

        <?php

//query button per ordinare la tabella per username !!

If(isset( $_GET['stronzo'])) {



    foreach($connessione->query('SELECT * FROM User ORDER BY Username') as $row)
    {
        //stampa tutto il DB riga per riga
        echo '<td>'.$row['IDuser'].'</td><td>'.$row['Username'].'</td><td>'.$row['Password'].'</td><td> '.$row['Email'].'</td>';

        // LINK update_form.php
        echo '<td><a href="update_form.php?IDuser='.$row['IDuser'].'&Username='.$row['Username'].'&Password='.$row['Password'].'&Email='.$row['Email'].'">UPDATE</a> or ';

        // LINK delete_form.php
        echo '<a href="delete_form.php?id='.$row['IDuser'].'"> DELETE</a></td></tr> ';
    }
}
        //query button per ordinare la tabella per MAIL !!

        If(isset( $_GET['maledetto'])) {



            foreach($connessione->query('SELECT * FROM User ORDER BY Email') as $row)
            {
                //stampa tutto il DB riga per riga
                echo '<td>'.$row['IDuser'].'</td><td>'.$row['Username'].'</td><td>'.$row['Password'].'</td><td> '.$row['Email'].'</td>';

                // LINK update_form.php
                echo '<td><a href="update_form.php?IDuser='.$row['IDuser'].'&Username='.$row['Username'].'&Password='.$row['Password'].'&Email='.$row['Email'].'">UPDATE</a> or ';

                // LINK delete_form.php
                echo '<a href="delete_form.php?id='.$row['IDuser'].'"> DELETE</a></td></tr> ';
            }
        }

        //query button per ordinare la tabella per IDuser !!
        If(isset( $_GET['bastardo'])) {



            foreach($connessione->query('SELECT * FROM User ORDER BY IDuser') as $row)
            {
                //stampa tutto il DB riga per riga
                echo '<td>'.$row['IDuser'].'</td><td>'.$row['Username'].'</td><td>'.$row['Password'].'</td><td> '.$row['Email'].'</td>';

                // LINK update_form.php
                echo '<td><a href="update_form.php?IDuser='.$row['IDuser'].'&Username='.$row['Username'].'&Password='.$row['Password'].'&Email='.$row['Email'].'">UPDATE</a> or ';

                // LINK delete_form.php
                echo '<a href="delete_form.php?id='.$row['IDuser'].'"> DELETE</a></td></tr> ';
            }
        }


    else{


//TABELLA SELECT a CARICAMENTO PAGINA mostra tutti i Record Presenti con link ad UPDATE E DELETE per ogni record
foreach($connessione->query('SELECT * FROM User') as $row)
{
    //stampa tutto il DB riga per riga
    echo '<td>'.$row['IDuser'].'</td><td>'.$row['Username'].'</td><td>'.$row['Password'].'</td><td> '.$row['Email'].'</td>';

    // LINK update_form.php
    echo '<td><a href="update_form.php?IDuser='.$row['IDuser'].'&Username='.$row['Username'].'&Password='.$row['Password'].'&Email='.$row['Email'].'">UPDATE</a> or ';

    // LINK delete_form.php
    echo '<a href="delete_form.php?id='.$row['IDuser'].'"> DELETE</a></td></tr> ';
}

        }

$connessione=null;
?>
</table></body></html>


