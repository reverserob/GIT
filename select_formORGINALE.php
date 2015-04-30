<?php
/**
 * Created by PhpStorm.
 * User: robertarandazzo
 * Date: 27/04/15
 * Time: 16:40
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
                        color: #FF9900;
                        }

            h1{
                text-decoration: overline;
                color: aquamarine;
                }

            table, tr, td {     font-family: font-family: Georgia, Utopia, Palatino, ‘Palatino Linotype’, serif;
                                margin: 0 auto;
                                border: 1px solid black;
                                text-align: center;
                                background-color: aquamarine;
                                color:black;
                            }

           table a:link, a:active, a:visited {
                                                color:#FF9900;
                                                }

            table a:hover{
                            color:darkslategrey;
                            }

        </style>
    </head>
    <body>

        <h1>DataBase Registrazione - Tabella User</h1>

        <div id="p1"> <p> INSERT a new Record <a href="insert_form.php"> Here </a> </p>
            <p><form method='post' action='ricerca_form.php'>
            FIND Record <input type='text' name='cerca'  />
            <input type="submit" value="FIND"  />
            </form></p>
        </div>

        <div>
            <p>
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


        <?php
//query link per ordinare la tabella NON FUNZIONANO!!
        /* If(isset( $_GET['order'])) {
             $order = $_GET['order'];
             $sql_order = $connessione->query('SELECT * FROM User ORDER BY $order');
         foreach ($s_order = $sql_order->fetch(PDO::FETCH_ASSOC)as $order_usern) {
                 //stampa tutto il DB riga per riga
                 echo '<td>' . $order_usern['IDuser'] . '</td><td>' . $order_usern['Username'] . '</td><td>' . $order_usern['Password'] . '</td><td> ' . $order_usern['Email'] . '</td>';

                 // LINK delete_form.php
                 echo '<td><a href="delete_form.php?id=' . $row['IDuser'] . '">DELETE</a> or ';

                 // LINK update_form.php
                 echo '<a href="update_form.php?IDuser=' . $row['IDuser'] . '&Username=' . $row['Username'] . '&Password=' . $row['Password'] . '&Email=' . $row['Email'] . '">UPDATE</a></td></tr>';

             }
         }



            $s_order = $sql_order->fetch(PDO::FETCH_ASSOC);
            while($row = $stmt->fetch()){
                                          $usn = $row['Username'];
                                          $eml = $row['Email'];
                                          $pss = $row['Password'];
                                          $idd = $row['id'];



        */


echo'
    <table>
    <tr>
        <td> ID </td>
        <td> <a href="select_form.php?order=Username"> Username </a></td>
        <td> PASSWORD </td>
        <td> EMAIL </td>
        <td> ACTION </td>
    </tr>
    ';



    //TABELLA SELECT mostra tutti i Record Presenti con link ad UPDATE E DELETE per ogni record
    foreach($connessione->query('SELECT * FROM User ') as $row)
    {
        //stampa tutto il DB riga per riga
        echo '<td>'.$row['IDuser'].'</td><td>'.$row['Username'].'</td><td>'.$row['Password'].'</td><td> '.$row['Email'].'</td>';

        // LINK delete_form.php
        echo '<td><a href="delete_form.php?id='.$row['IDuser'].'">DELETE</a> or ';

        // LINK update_form.php
        echo '<a href="update_form.php?IDuser='.$row['IDuser'].'&Username='.$row['Username'].'&Password='.$row['Password'].'&Email='.$row['Email'].'">UPDATE</a></td></tr>';

    }











     $connessione=null;
    ?>
</table></body></html>






