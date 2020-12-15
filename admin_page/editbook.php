<html>
  <head>
    <link rel="shortcut icon" type="image/x-icon" href="img/books.png">
    <meta charset="utf-8">
    <title>Comic Store - Edit Book</title>
  </head>
    <body>
      <?php
        session_start();
        if(isset($_SESSION['AdminUserName'])){
            echo "<script> alert('".$_SESSION['AdminUserName']."') </script>";
        }else{
            header("Location: admin_page/admin_login.php");
        }
      ?>
      <?php
        $UserName = $_SESSION['AdminUserName'];
        echo "$UserName";
      ?>
        <center> แก้ไขหนังสือ </center>
        <form enctype='multipart/form-data' method="post" action="update_book.php">
          <?php

            $c_id       = $_POST["comic_id"];

            $hostname = "localhost";
            $username = "root";
            $password = "";
            $dbname = "comic_store";
            $conn = mysqli_connect( $hostname, $username, $password );
            $conn->set_charset("utf8");
            if ( ! $conn ) die ( "ไม่สามารถติดต่อกับ MySQL ได้" );
                mysqli_select_db ( $conn, $dbname )or die ( "ไม่สามารถเลือกฐานข้อมูล comic_store ได้" );


            $sqltxt = "SELECT * FROM comic WHERE comic_id = '$c_id' ";
            $result = mysqli_query( $conn, $sqltxt );
            $row = mysqli_fetch_array( $result );

            echo "รหัสหนังสือ   : <input type='text' name='comic_id' value='$row[0]'><br>";
            echo "ชื่อหนังสือ    : <input type='text' name='comic_name' value='$row[1]'><br>";
            echo "ชื่อผู้แต่ง     : <input type='text' name='author' value='$row[2]'><br>";
            echo "สำนักพิมพ์    : <input type='text' name='publisher' value='$row[3]'><br>";
            echo "ราคาจำหน่าย   : <input type='text' name='comic_price' value='$row[4]'><br>";
            echo "<select name='comic_available'>";
            echo "  <option value='available'>available</option>";
            echo "  <option value='unvailable'>unvailable</option>";
            echo "</select>";
            //echo "<input type='hidden' name='comic_available' value='available' value='$c_id'>";
            echo "image : <input type='file' name='comic_pic' value=''><br>";
            echo "<input type='submit' name='submit' value='edit'>";
            
            
          ?>
        </form>
    </body>
</html>