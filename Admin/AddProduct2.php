<?php
    $newfile = 'image/'.$_FILES['picfile']['name'];
    copy($_FILES['picfile']['tmp_name'],$newfile);
    $connect = mysqli_connect("localhost", "root", "", "data");
    $sql ='SELECT MAX(Pro_id) as max_id FROM Products';
    $result = mysqli_query($connect, $sql);
    if (!$result) {
        echo mysqli_error($connect) . '<br>';
        die('Can not access database!(Products1)');
        include("AddProduct.php");  
    } else {
        $ID = 1;
        while ($row = mysqli_fetch_assoc($result)) {
                $ID = $row["max_id"] + 1;
        }       
        $sql = "INSERT INTO Products VALUES(
            '".$ID."',
            '".$_POST["Pro_name"]."',
            '".$_POST["Pro_price"]."',
            '".$_POST["Pro_description"]."',
            '".$_POST["date"]."',
            '".$newfile."',
            'HAVE',
            '".$_POST["Email"]."')";
        $result = mysqli_query($connect, $sql);
        if (!$result) {
            echo mysqli_error($connect) . '<br>';
            die('Can not access database!(Products2)');
            include("AddProduct.php");  
        } else {
            mysqli_close($connect);
            $connect = mysqli_connect("localhost", "root", "", "data");
            $sql2 = "";
            for ($x = 1; $x <= 11; $x++) {
                if (isset($_POST["Tag".$x])) {
                    $sql2 .= "(
                        '".$ID."',
                        '".$_POST["Tag".$x]."')";
                    $sql2 .= ",";
                }
            }
            $sql2 = substr_replace($sql2, ";", -1);
            $sql2 = "INSERT INTO Product_Tags VALUES $sql2" ;
            $result = mysqli_query($connect, $sql2);
            if (!$result) {
                echo mysqli_error($connect) . '<br>';
                die('Can not access database!(Product_Tags)');
                include("AddProduct.php");  
            }
        }
    } 
    mysqli_close($connect);
    include("AddProduct.php"); 
?>
