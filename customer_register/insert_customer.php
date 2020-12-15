<?php
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "comic_store";
    $conn = mysqli_connect( $hostname, $username, $password,$dbname );
    $conn->set_charset("utf8");
    if ( ! $conn ) die ( "ไม่สามารถติดต่อกับ MySQL ได้" );
    mysqli_select_db ( $conn, $dbname )or die ( "ไม่สามารถเลือกฐานข้อมูล comic_store ได้" );

    $user = $_POST["username"];
    $pass = $_POST["password"];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $pocket = 0;

    // insert
    $sql = "INSERT INTO customer (customer_id, customer_password, customer_fname, customer_lname, pocket)
            VALUES ('$user', '$pass', '$fname', '$lname', '$pocket')";
    if ($conn->query($sql) === TRUE) {
        echo "Register successfully";
        header('refresh: 0; url=../index.php');
    } else {
        //echo "Error: " . $sql . "<br>" . $conn->error;
        echo "<center>";
        echo "email used! <br>" ;
        echo "<a href='register.php'><input type='button' value='back to register'></a>";
        echo "</center>";
    }

?>
