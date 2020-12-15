<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "comic_store";

    $user = $_POST["username"];
    $pass = $_POST["password"];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $minput = $_POST["mname"];
    $mpass = "xjapan";
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // insert
    if($minput == $mpass){
        $sql = "INSERT INTO admin (admin_id, admin_password, admin_fname, admin_lname) 
            VALUES ('$user', '$pass', '$fname', '$lname')";
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
        //echo "Error: " . $sql . "<br>" . $conn->error;
        echo "<center>";
        echo "email used! <br>" ;
        echo "<a href='index.html'><input type='button' value='back to register'></a>";
        echo "</center>";
    }

    }
    /*
    $sql = "INSERT INTO admin (customer_id, customer_password, customer_fname, customer_lname, pocket) 
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
    */
    
?>