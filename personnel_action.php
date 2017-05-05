<?php

    $dbhost="localhost";
        $dbuser="root";
        $dbpass="";
        $dbname="db_charity";
        $connection = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

        //testing if connection occurred
        if(mysqli_connect_errno()){
            die("Database connection failed:".
                 mysqli_connect_error().
                 "(".mysqli_connect_errno().")"
               );
        }
?>

<?php
        $query ="SELECT first_name, last_name, email, home, mobile FROM tb_spersonnel";

            $result= mysqli_query($connection, $query);

            if(!$result){
                die("Database query failed. ". mysqli_error($connection));
            }
        $query2 ="SELECT first_name, last_name, email, home, mobile FROM tb_rpersonnel";

            $result2= mysqli_query($connection, $query2);

            if(!$result2){
                die("Database query failed. ". mysqli_error($connection));
            }
?>

<html>

    <head>
        <title>Our Personnel</title>
        <link rel="stylesheet" type="text/css" href="signup_styles.css" />
    </head>

    <body>

        <div>Our Current Regular Personnel<br /><br />
            <?php
            if(isset($_POST["spersonnel"]) && isset($_POST["rpersonnel"])){
                echo "Our Regular Personnels";
                echo "<br />";
                while($row = mysqli_fetch_assoc($result2)){
                    echo $row["first_name"]."  |  ";
                    echo $row["last_name"]."   | ";
                    echo $row["email"]."  |  ";
                    echo $row["home"]."   |  ";
                    echo $row["mobile"]."  |  ";
                    echo "<br />";
                }
                    echo "Our Skilled Personnels";
                    echo "<br />";
                 while($row = mysqli_fetch_assoc($result)){
                    echo $row["first_name"]."  |  ";
                    echo $row["last_name"]."   | ";
                    echo $row["email"]."  |  ";
                    echo $row["home"]."   |  ";
                    echo $row["mobile"]."  |  ";
                    echo "<br />";
                }
            }
            elseif(isset($_POST["rpersonnel"])){
                echo "Our Regular Personnels";
                while($row = mysqli_fetch_assoc($result2)){
                    echo $row["first_name"]."  |  ";
                    echo $row["last_name"]."   | ";
                    echo $row["email"]."  |  ";
                    echo $row["home"]."   |  ";
                    echo $row["mobile"]."  |  ";
                    echo "<br />";
                }
            }
            elseif(isset($_POST["spersonnel"])){
                echo "Our Skilled Personnels";
            while($row = mysqli_fetch_assoc($result)){
                    echo $row["first_name"]."  |  ";
                    echo $row["last_name"]."   | ";
                    echo $row["email"]."  |  ";
                    echo $row["home"]."   |  ";
                    echo $row["mobile"]."  |  ";
                    echo "<br />";
                }
            }
            
            ?>
        </div>
    </body>

    </html>
<?php
         mysqli_close($connection);
            ?>