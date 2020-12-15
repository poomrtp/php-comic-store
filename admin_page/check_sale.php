<html>
    <head>
        <title>listbook</title>

        <link rel="stylesheet" type="text/css" href="css/util.css">
        <link rel="stylesheet" type="text/css" href="css/passenger-table.css">

    </head>

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
    <header>
        
    </header>
        <div>
            <div>
                <div>
                    <div>
                        <table border='1'>
                            <thead>
                                <tr >
                                    <th >comic id</th>
                                    <th >comic name</th>
                                    <th >author</th>
                                    <th >publisher</th>
                                    <th >price</th>
                                    <th >status</th>
                                    <th >picture</th>
                                    <th >จำนวนครั้งการขาย</th>
                                    <th >รายได้ทั้งหมด</th>
                                </tr>
                            </thead>

                            <tbody>                           
                                <?php
                                    $hostname = "localhost";
                                    $username = "root";
                                    $password = "";
                                    $dbname = "comic_store";
                                    $conn = mysqli_connect( $hostname, $username, $password, $dbname );
                                    $conn->set_charset("utf8");

                                    $sqltxt = "SELECT * FROM comic order by comic_id";
                                    $result = mysqli_query( $conn, $sqltxt );

                                    // Fetch each row in an associative array
                                    //echo '<table border="1">';

                                    while ($row = mysqli_fetch_array( $result )) 
                                    {
                                        $n = 1;
                                        $o = 0;
                                        echo "<tr height='100px'>";
                                        echo "<form action='editbook.php' method='POST'>";
                                        echo "<input name='comic_id' type='hidden' value=".$row[0].">";

                                        for ($i = 0 ; $i < 7 ; $i++)
                                        {
                                            //echo "<input name=".$i." type='hidden' value=".$row[$i].">";
                                            echo "<td class='column$n'>".$row[$i]."</td>"; //&nbsp
                                            $o++;
                                            if($o == 6){
                                                //echo "<input name=".$i." type='hidden' value=".$row[$i].">";
                                                echo "<td class='column$n'><img src='".$row[6]." 'width='10%' height='10%'></td>";
                                            break;
                                            }
                                            $n++;
                                        }
                                        echo "<td class='column14'>".countQuantitySale($row[0])."</td>";
                                        echo "<td class='column14'>".sumSale($row[0])."</td>";
                                        echo "</form>";
                                        echo "</tr>";
                                    }
                                    function countQuantitySale($c_id){
                                        $hostname = "localhost";
                                        $username = "root";
                                        $password = "";
                                        $dbname = "comic_store";
                                        $conn = mysqli_connect( $hostname, $username, $password, $dbname );
                                        $conn->set_charset("utf8");
                                        $sqltxt = "SELECT COUNT(comic_id) FROM purchase_history WHERE comic_id = '$c_id'";
                                        $result = mysqli_query( $conn, $sqltxt );
                                        $data = mysqli_fetch_array( $result );
                                        return $data[0];
                                    }
                                    function sumSale($c_id){
                                        //SELECT SUM(Quantity)
                                        //FROM OrderDetails;
                                        $hostname = "localhost";
                                        $username = "root";
                                        $password = "";
                                        $dbname = "comic_store";
                                        $conn = mysqli_connect( $hostname, $username, $password, $dbname );
                                        $conn->set_charset("utf8");
                                        $sqltxt = "SELECT SUM(price) FROM purchase_history WHERE comic_id = '$c_id'";
                                        $result = mysqli_query( $conn, $sqltxt );
                                        $data = mysqli_fetch_array( $result );
                                        return $data[0];
                                        //echo $data[0];
                                    }
                                    ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>