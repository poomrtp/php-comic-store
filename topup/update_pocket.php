<?php
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "comic_store";
    $conn = mysqli_connect( $hostname, $username, $password );
    if ( ! $conn ) die ( "ไม่สามารถติดต่อกับ MySQL ได้" );
        mysqli_select_db ( $conn, $dbname )or die ( "ไม่สามารถเลือกฐานข้อมูล comic_store ได้" );

    if (isset($_POST["submit"]) || isset($_POST["topup"])) {
        $customer_id    = $_POST["customer_id"];
        $pocket         = $_POST["topup"];
        $pocket2        = $_POST["topup2"];
        if(isset($_POST["topup"]))$tmp = $pocket;
        else if(isset($_POST["topup2"]))$tmp = $pocket2;
        $tmp2 = $tmp;

        $sumpocket = "SELECT pocket FROM customer WHERE customer_id='$customer_id'";
        $result = $conn->query($sumpocket);
        $clash = $result->fetch_assoc();
        $tmp += $clash['pocket'];

        $sql = "UPDATE customer SET pocket='$tmp' WHERE customer_id='$customer_id'";
        if ($conn->query($sql) === TRUE) {
          echo "<script>
          alert('เติม Point $tmp2 Point สำเร็จ');
          window.location = '../store/store.php';
          </script>";
        }
        mysqli_close($conn);
    }
?>
