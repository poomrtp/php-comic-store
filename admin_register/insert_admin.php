<?php
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "comic_store";
    $conn = mysqli_connect( $hostname, $username, $password );
    if ( ! $conn ) die ( "ไม่สามารถติดต่อกับ MySQL ได้" );
    mysqli_select_db ( $conn, $dbname )or die ( "ไม่สามารถเลือกฐานข้อมูล comic_store ได้" );

    $user = $_POST["username"];
    $pass = $_POST["password"];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $minput = $_POST["mname"];
    $mpass = "xjapan";

    // insert
    if($minput == $mpass){
        $sql = "INSERT INTO admin (admin_id, admin_password, admin_fname, admin_lname)VALUES
        ('$user', '$pass', '$fname', '$lname')";
        if ($conn->query($sql) === TRUE) {
            echo "Register successfully";
        } else {
        //echo "Error: " . $sql . "<br>" . $conn->error;
        echo "<center>";
        echo "email used! <br>" ;
        echo "<a href='register.php'><input type='button' value='back to register'></a>";
        echo "</center>";
      }
    }
    mysqli_close($conn);
?>
