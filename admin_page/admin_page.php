<!DOCTYPE html>
<html>
    <head><title></title></head>
    <meta charset="utf-8">
    <body>
        <?php
            session_start();
            if(isset($_SESSION['AdminUserName'])){
                echo "<script> alert('".$_SESSION['AdminUserName']."') </script>";
            }else{
                header("Location: admin_login.php");
            }
        ?>
        <?php
            $UserName = $_SESSION['AdminUserName'];
            echo "$UserName";
        ?>
        <table>
            <tr>
                <td>
                    <a href="addbook.php"><input type="button" name="addBook" value="add Book"></a>
                </td>
                <td>
                    <a href="listbook.php"><input type="button" name="updateBook" value="update Book"></a>
                </td>
                <td>
                    <a href="check_sale.php"><input type="button" name="updateBook" value="ดูยอดขาย"></a>
                </td>
            </tr>
        </table>
    </body>
</html>