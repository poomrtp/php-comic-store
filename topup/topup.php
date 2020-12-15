<html>
  <head>
    <link href="https://fonts.googleapis.com/css?family=Prompt&display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="../image/x-icon" href="../img/books.png">
    <link rel="stylesheet" href="topup.css">
    <meta charset="utf-8">
    <title>Comic Store - Login</title>
  </head>
    <body>
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
                 <div class="drop-down-item"><a href="topup.php"><h3 class="menu">เติม Point</h3></a></div>
             </div>
             <div class="rela-block drop-down-container">
                 <div class="drop-down-item"><a href="../logout.php"><h3 class="menu">Logout</h3></a></div>
             </div>
          </div>
        </header>

        <center><h1> เติม Point </h1>
        <form method="post" action="update_pocket.php">
          <?php
            session_start();
            if(!isset($_SESSION['UserName']))header("Location: ../index.php");
            $UserName = $_SESSION['UserName'];

            echo "<input type='hidden' name='customer_id' value='".$UserName."'>";
          ?>

          <table>
            <tr>
              <td><a href="update_pocket.php"><button name="topup" class="button" value="10">10</button></a></td>
              <td><a href="update_pocket.php"><button name="topup" class="button" value="50">50</button></a></td>
              <td><a href="update_pocket.php"><button name="topup" class="button" value="100">100</button></a></td>
            </tr>
            <tr>
              <td><a href="update_pocket.php"><button name="topup" class="button" value="500">500</button></a></td>
              <td><a href="update_pocket.php"><button name="topup" class="button" value="1000">1000</button></a></td>
              <td><a href="update_pocket.php"><button name="topup" class="button" value="5000">5000</button></a></td>
            </tr>
            <tr>
              <td colspan="2"><input type="" placeholder="ใส่จำนวน Point ที่ต้องการ" name="topup2"/></td>
              <td><button type="submit" name="submit" class="button">ตกลง</button></td>
            </tr>
          </table>
        </form>

        <table align="center">
          <tr>
            <td><img src="../img/wallet.png" width="200" height="200" align="center"></td>
          </tr>
        </table>

        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="../menu.js"></script>
    </body>
</html>
