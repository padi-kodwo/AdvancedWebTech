<?php
        if(isset($_POST["address2"])){
            $address2 = $_POST["address2"];
        }
        else{
            $adress2 = "NULL";
        }
        if(isset($_POST["postal"])){
            $postal = $_POST["postal"];
        }
        else{
            $postal = "NULL";
        }
        if(isset($_POST["email"])){
            $email = $_POST["email"];
        }
        else{
            $email = "NULL";
        }

        if(isset($_POST["mobile"])){
            $mobile = $_POST["mobile"];
        }
        else{
            $mobile = "NULL";
        }
?>

<?php
    //taking form inputs
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $address = $_POST["address"];
    $country= $_POST["country"];
    $city = $_POST["city"];
    $home = $_POST["home"];//this take the value of homephone number
    $acnt_number = $_POST["acnt_number"];
    $contribution = $_POST["contribution"];    
?>

<?php
        //creating the database connection
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

<?php //the form values insertion query
    $query ="INSERT INTO tb_donations (first_name, last_name, address, address2,
            country, postal, city, email, home, mobile, acnt_number, contribution)
            VALUES('{$first_name}', '{$last_name}', '{$address}', '{$address2}',
            '{$country}', '{$postal}','{$city}','{$email}','{$home}','{$mobile}',
            '{$acnt_number}','{$contribution}') ";
    
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
?>

<!DOCTYPE html 5>
<html>
    <head>
        <title>Databases</title>
    </head>
    <body>
    </body>
</html>
<?php
        mysqli_close($connection);
?>