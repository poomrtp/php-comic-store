<html>
 <head>
   <link href="https://fonts.googleapis.com/css?family=Prompt&display=swap" rel="stylesheet">
   <link rel="shortcut icon" type="image/x-icon" href="../img/books.png">
   <link rel="stylesheet" href="sell.css">
   <meta charset="utf-8">
   <title>Comic Store</title>
 </head>
 <body>
  <?php
    session_start();
    if(!isset($_SESSION['UserName']))header("Location: ../index.php");
  ?>
  <?php
    $UserName = $_SESSION['UserName'];
  ?>
   <header>
     <div class="fixed-nav-bar">
         <a href="../store/store.php"><img src="../img/books.png" width="100" height="100" align="center" class="book"></a>
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
    <form method="post" action="purchase.php">
    <?php
        $id = $_GET['id'];
        $hostname = "localhost";
        $username = "root";
        $password = "";
        $dbname = "comic_store";
        $conn = mysqli_connect( $hostname, $username, $password );
        if ( ! $conn ) die ( "ไม่สามารถติดต่อกับ MySQL ได้" );
        mysqli_select_db ( $conn, $dbname )or die ( "ไม่สามารถเลือกฐานข้อมูล comic_store ได้" );
        mysqli_set_charset($conn,"utf8");

        $sqltxt = "SELECT * FROM comic WHERE comic_id = $id";
        $result = mysqli_query ($conn, $sqltxt);
        $data = mysqli_fetch_array ($result);

        echo "<h1 align='center'>".$data["comic_name"]."</h1>";
        echo "<table align='center'>";
        echo "<tr>";
        echo "<td width='600' align='center'><img src='".$data["comic_pic"]."' width='450' height='600'></td>";
        echo "<td width='400'>";
        echo "<h2 class='data1'>ผู้แต่ง </h2><h2 class='data2'>".$data["author"]."</h2><br>";
        echo "<h2 class='data1'>สำนักพิมพ์ </h2><h2 class='data2'>".$data["publisher"]."</h2><br>";
        echo "<h2 class='data1'>ราคา </h2><h2 class='data2'>".$data["comic_price"]."</h2><h2 class='data1'> Point</h2><br>";
        echo "<br><br><br><br><br><a href='purchase.php'><button class='button'>Buy</button></a>";
        echo "</td>";
        echo "</tr>";
        echo "</table>";
        echo "<input type='hidden' name='comic_price' value='".$data['comic_price']."'>";
        echo "<input type='hidden' name='comic_id' value='".$id."'>";
        mysqli_close($conn);
    ?>
    </form>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="../menu.js"></script>
 </body>
</html>
