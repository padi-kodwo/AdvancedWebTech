<?php

    if(isset($_POST["address2"])){
        $address2 = $_POST["address2"];
    }
    else{
        $address2 = "NULL";
    }
    if(isset($_POST["country"])){
        $country = $_POST["country"];
    }
    else{
        $country = "NULL";
    }
    if(isset($_POST["postal"])){
        $postal = $_POST["postal"];
    }
    else{
        $postal = "NULL";
    }
    if(isset($_POST["mobile"])){
        $mobile = $_POST["mobile"];
    }
    else{
        $mobile = "NULL";
    }

?>

    <?php

    //Declaring required values from the form
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $address = $_POST["address"];
    $country = $_POST["country"];
    $city = $_POST["city"];
    $email = $_POST["email"];
    $home = $_POST["home"];
    $skills = $_POST["skills"];

?>

        <?php
    //creating the database connection
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "db_charity";
    $connection = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

    //testing if the connection occurred
    if(mysqli_connect_errno()){
        die("Database connection failed ".mysqli_connect_error().
            "(".mysqli_connect_errno().")");
    }

?>

            <?php //the form values insertion query
    $query ="INSERT INTO tb_rpersonnel (first_name, last_name, address, address2,
            country, postal, city, email, home, mobile, skills)
            VALUES('{$first_name}', '{$last_name}', '{$address}', '{$address2}',
            '{$country}', '{$postal}','{$city}','{$email}','{$home}','{$mobile}',
            '{$skills}') ";
    
    $result= mysqli_query($connection, $query);

    if($result){
        //success;
        echo "Success";
        header("Location: http://localhost/advancedweb/wordpress");
               exit;
    }
    else{
        die("Database query failed. ". mysqli_error($connection));
    }
    
    mysqli_close($connection);
?>
