<?php
    session_start();
    if(!isset($_SESSION['UserName']))header("Location: ../index.php");
    $UserName = $_SESSION['UserName'];

    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "comic_store";
    $conn = mysqli_connect( $hostname, $username, $password, $dbname);
    if ( ! $conn ) die ( "ไม่สามารถติดต่อกับ MySQL ได้" );
        mysqli_select_db ( $conn, $dbname )or die ( "ไม่สามารถเลือกฐานข้อมูล comic_store ได้" );
    if (isset($_POST["comic_price"]) && isset($_POST["comic_id"])) {

        $c_id       = $_POST["comic_id"];
        $c_price    = $_POST["comic_price"];

        // check price
        $sqlcheck = " SELECT pocket FROM customer WHERE customer_id = '$UserName'";
        $check = mysqli_query($conn, $sqlcheck);
        $money = mysqli_fetch_array($check);
        $point = $money[0];
        // check avialable
        $sqlavai = " SELECT comic_available FROM comic WHERE comic_id = '$c_id'";
        $check = mysqli_query($conn, $sqlavai);
        $status = mysqli_fetch_array($check);
        // gen purchase id
        $sqlgen = " SELECT COUNT(*) FROM purchase_history";
        $gennumber = mysqli_query($conn, $sqlgen);
        $count = mysqli_fetch_array($gennumber);

        function checkBook($User,$con,$com_id)
        {
          $sql = " SELECT comic_id FROM purchase_history WHERE customer_id = '$User'";
          $book= mysqli_query($con, $sql);

          $sqlgen = " SELECT COUNT(*) FROM purchase_history WHERE customer_id = '$User'";
          $gennumber = mysqli_query($con, $sqlgen);
          $num = mysqli_fetch_array($gennumber);

          $re = true;
          $cou = 0;
          while($check = mysqli_fetch_array($book)) if($check[0] != $com_id && ($num[0]) > 0)$cou++;
          if($cou != ($num[0]) && ($num[0]) > 0) $re = false;
          return $re;
        }

        if(checkBook($UserName,$conn,$c_id)){
          if($money[0] >= $c_price && $status[0] == "available"){
              $point -= $c_price;
              // insert
              $gen = $count[0]+1;
              $sql1 = "INSERT INTO purchase_history (purchase_number, comic_id, customer_id, price)VALUES('$gen', '$c_id', '$UserName', '$c_price')";
              if (!$conn->query($sql1) === TRUE){
                  echo"<script>alert('ซื้อหนังสือไม่สำเร็จ')</script>";
              }
              else{
                $sql2 = "UPDATE customer SET pocket='$point' WHERE customer_id='$UserName'";
                if ($conn->query($sql2) === TRUE){
                  echo "<script>
                  alert('ซื้อหนังสือสำเร็จ');
                  window.location = '../store/store.php';
                  </script>";
                }
              }
          }
          else{
              echo "<script>
              var con = confirm('จำนวน Point ไม่พอ กรุณาเติม Point');
              if(con) location.href='../topup/topup.php';
              else location.href='../store/store.php';
              </script>";
          }
        }
        else{
          echo "<script>
          alert('คุณมีหนังสือเรื่องนี้แล้ว');
          window.location = '../store/store.php';
          </script>";
        }
        mysqli_close($conn);
    }
?>
