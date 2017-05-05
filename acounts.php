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
            $query ="SELECT * FROM tb_donations";

            $result= mysqli_query($connection, $query);

            if(!$result){
                die("Database query failed. ". mysqli_error($connection));
            }
?>
        <html>

        <head>
            <title>Donation Accounts</title>
            <link rel="stylesheet" type="text/css" href="signup_styles.css" />
        </head>

        <body>

            <div><?php
                echo "Donations";
                echo "<br />";
                while($row = mysqli_fetch_assoc($result)){
                    echo $row["first_name"]."  |  ";
                    echo $row["last_name"]."   | ";
                    echo $row["address"]."  |  ";
                    echo $row["country"]."   |  ";
                    echo $row["city"]."  |  ";
                    echo $row["home"]."  |  ";
                    echo $row["mobile"]."  |  ";
                    echo $row["email"]."  |  ";
                    echo "<br />";
                }
             ?>
                
            </div>
        </body>

        </html>
        <?php
         mysqli_close($connection);
    ?>
