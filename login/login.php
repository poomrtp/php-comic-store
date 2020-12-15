<html>
  <head>
    <link rel="stylesheet" href="login.css">
    <link rel="shortcut icon" type="image/x-icon" href="../img/books.png">
    <meta charset="utf-8">
    <title>Comic Store - Login</title>
  </head>
  <body>
    <?php
      session_start(); //เรยี กฟังกช์ นั่ session_start() เพอื่ เรมิ่ ใชง้ําน session
      if(isset($_POST['S'])){
          $_SESSION['username']=$_POST['username'];
      }
      $_SESSION['Status']="OK";
    ?>
    <br><br><br><br><br>
    <form method="post">
      <h2><span class="entypo-login"><i class="fa fa-sign-in"></i></span> Login</h2>
      <button class="submit button1" name="submit"><span class="entypo-lock"><i class="fa fa-lock"></i></span></button>

      <span class="entypo-user inputUserIcon"></span>
      <input type="text" class="user" placeholder="Username" name="username"/>

      <span class="entypo-key inputPassIcon"></span>
      <input type="password" class="pass" placeholder="Password" name="password"/>
    </form>
    <h2 align="center">OR</h2>
    <table align="center">
      <tr align="right">
        <td><a href="../customer_register/register_customer.php"><button class="button2" style="margin-right : 10px;">Register</button></a></td>
        <td><a href="../admin_register/register_admin.php"><button class="button2" style="margin-right: -3px;">Register admin</button></a></td>
      </tr>
    </table>

    <?php
        if(isset($_POST["submit"]) && isset($_POST["username"]) && isset($_POST["password"]))
        {
          $UserName = $_POST['username'];
          $Password = $_POST['password'];
          $hostname = "localhost";
          $username = "root";
          $password = "";
          $dbname = "comic_store";
          $conn = mysqli_connect( $hostname, $username, $password );
          if ( ! $conn ) die ( "ไม่สามารถติดต่อกับ MySQL ได้" );
          mysqli_select_db ( $conn, $dbname )or die ( "ไม่สามารถเลือกฐานข้อมูล comic_store ได้" );
          mysqli_set_charset($conn,"utf8");


          $sqltxt = "SELECT customer_id, customer_password FROM customer where customer_id = '$UserName'";
          $result = mysqli_query ($conn, $sqltxt);
          $rs = mysqli_fetch_assoc($result);

          if($rs["customer_id"] == $UserName)
          {
            if ($rs["customer_password"] == $Password) {
              $_SESSION['UserName']=$_POST['UserName'];
              header("Location: ../index.php?UserName=$UserName");
            }
            else {
              $message = "Password not match.";
              echo "<script type='text/javascript'>alert('$message');</script>";
            }
          }
          else
          {
            $message = "Not found Username \"".$UserName."\"";
            echo "<script type='text/javascript'>alert('$message');</script>";
          }
        }
    ?>
  </body>
</html>
