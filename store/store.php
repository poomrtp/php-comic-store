<html>
  <head>
    <link href="https://fonts.googleapis.com/css?family=Prompt&display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="../image/x-icon" href="../img/books.png">
    <link rel="stylesheet" href="store.css">
    <meta charset="utf-8">
    <title>Comic Store</title>
  </head>
  <body>
    <?php
      session_start();
      if(!isset($_SESSION['UserName']))header("Location: ../index.php");
      $UserName = $_SESSION['UserName'];
    ?>
    <header>
      <div class="fixed-nav-bar">
          <a href="store.php"><img src="../img/books.png" width="100" height="100" align="center" class="book"></a>
          <input type="checkbox" id="menuButton" />
          <label for="menuButton" class="menu-button-label">
              <div class="white-bar"></div>
              <div class="white-bar"></div>
              <div class="white-bar"></div>
              <div class="white-bar"></div>
          </label>
      </div>
      <div class="the-bass">
         <div class="rela-block drop-down-container">
             <div class="drop-down-item"><a href="../profile/profile.php"><h3 class="menu">Profile</h3></a></div>
         </div>
         <div class="rela-block drop-down-container">
             <div class="drop-down-item"><a href="../bookshelf/bookshelf.php"><h3 class="menu">ชั้นหนังสือ</h3></a></div>
         </div>
         <div class="rela-block drop-down-container">
             <div class="drop-down-item"><a href="../topup/topup.php"><h3 class="menu">เติม Point</h3></a></div>
         </div>
         <div class="rela-block drop-down-container">
             <div class="drop-down-item"><a href="../logout.php"><h3 class="menu">Logout</h3></a></div>
         </div>
      </div>
    </header>

    <br><br>
    <table align="center">
      <?php
        $hostname = "localhost";
        $username = "root";
        $password = "";
        $dbname = "comic_store";
        $conn = mysqli_connect( $hostname, $username, $password );
        if ( ! $conn ) die ( "ไม่สามารถติดต่อกับ MySQL ได้" );
        mysqli_select_db ( $conn, $dbname )or die ( "ไม่สามารถเลือกฐานข้อมูล comic_store ได้" );
        mysqli_set_charset($conn,"utf8");

        $sqltxt = "SELECT * FROM comic WHERE comic_available = 'available' order by comic_id ";

        $result = mysqli_query ( $conn, $sqltxt );
        $count = 0;
        while ( $rs = mysqli_fetch_array ( $result ) )
        {
          if($count == 0)echo "<tr align='center'>";
          echo "<td width='400'><a href='../sell/sell.php?id=$rs[0]'><img src='$rs[6]' width='300' height='400'><br><h3>$rs[1] ราคา $rs[4]</h3></a></td>";
          if($count == 3)echo "</tr><tr height='50'><td></td></tr>";
          $count++;
          if($count == 4)$count = 0;
        }
        mysqli_close($conn);
      ?>
    </table>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="../menu.js"></script>
  </body>
</html>
