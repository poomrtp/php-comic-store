<html>
  <head>
    <link rel="shortcut icon" type="image/x-icon" href="img/books.png">
    <meta charset="utf-8">
    <title>Comic Store - Add Book</title>
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
        <center> เพิ่มหนังสือ </center>
        <form enctype='multipart/form-data' method="post" action="insert_book.php">
            รหัสหนังสือ   : <input type="text" name="comic_id"><br>
            ชื่อหนังสือ    : <input type="text" name="comic_name"><br>
            ชื่อผู้แต่ง     : <input type="text" name="author"><br>
            สำนักพิมพ์    : <input type="text" name="publisher"><br>
            ราคาจำหน่าย   : <input type="text" name="comic_price"><br>
            <input type="hidden" name="comic_available" value="available">
            image : <input type='file' name='comic_pic' value=""><br>
            <input type="submit" name="submit" value="register">
        </form>
    </body>
</html>