<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "comic_store";

    $user = $_POST["username"];
    $pass = $_POST["password"];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $pocket = 0;
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    $conn->set_charset("utf8");
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // insert
    $sql = "INSERT INTO customer (customer_id, customer_password, customer_fname, customer_lname, pocket) 
            VALUES ('$user', '$pass', '$fname', '$lname', '$pocket')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        //echo "Error: " . $sql . "<br>" . $conn->error;
        echo "<center>";
        echo "email used! <br>" ;
        echo "<a href='index.html'><input type='button' value='back to register'></a>";
        echo "</center>";
    }
    
?>