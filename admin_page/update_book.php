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
<?php
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "comic_store";
    $conn = mysqli_connect( $hostname, $username, $password );
    $conn->set_charset("utf8");
    if ( ! $conn ) die ( "ไม่สามารถติดต่อกับ MySQL ได้" );
        mysqli_select_db ( $conn, $dbname )or die ( "ไม่สามารถเลือกฐานข้อมูล comic_store ได้" );
    if (isset($_POST["submit"])) {

        $c_id       = $_POST["comic_id"];
        $c_name     = $_POST["comic_name"];
        $author     = $_POST["author"];
        $publisher  = $_POST["publisher"];
        $c_price    = $_POST["comic_price"];
        $c_available= $_POST["comic_available"];
        //$c_pic      = $_POST["comic_pic"];
        
        // upload pic
        
        $target_dir = "../img/manga/";
        $basename = basename($_FILES["comic_pic"]["name"]);
        $target_file = $target_dir . $basename;
        $uploadOk = 1;
        $check = true;
        $comic_picType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


        if(basename($_FILES["comic_pic"]["name"]) !==""){
            $check = getimagesize($_FILES["comic_pic"]["tmp_name"]);
        }
        else    
            $check = false;
            $uploadOk = 0;

        // base64

        if ($check !== false) {
            //echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } 
        else {
            if ($uploadOk == 1) echo "File is not an image.<br>";                   
            $uploadOk = 0;
        }
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.<br>";
            // if everything is ok, try to upload file
        } 
        else {
            if (move_uploaded_file($_FILES["comic_pic"]["tmp_name"], $target_file)) {
                echo "The file " . basename($_FILES["comic_pic"]["name"]) . " has been uploaded.<br>";
                // insert
                $sql = "UPDATE comic SET comic_name='$c_name', author='$author', publisher='$publisher', comic_price='$c_price',
                comic_available='$c_available', comic_pic='$target_file' WHERE comic_id='$c_id'";
                //mysqli_query($conn, $sql);

                if ($conn->query($sql) === TRUE) {
                    echo "edit book successfully";
                    header('refresh: 0; url=admin_page.php');
                } else {
                    //echo "Error: " . $sql . "<br>" . $conn->error;
                    echo "<center>";
                    echo "email used! <br>" ;
                    echo "<a href='register.php'><input type='button' value='back to register'></a>";
                    echo "</center>";
                }
            } else {
                echo "Sorry, there was an error uploading your file.<br>";
            }
        }
        
        
        mysqli_close($conn);
    }
?>