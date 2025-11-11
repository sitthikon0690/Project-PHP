<?php
    $connect = mysqli_connect("localhost", "root", "", "data");
    if ($_POST["Choose"]=="Status to NULL" or $_POST["Choose"]=="Selled and Status to NULL"){
        $sql ='UPDATE Products
                set Pro_status = "NULL"
                where Pro_id = "'.$_POST["Pro_id"].'";';
        $result = mysqli_query($connect, $sql);
        if (!$result) {
            echo mysqli_error($connect) . '<br>';
            die('Fail to Status to NULL');
            include("UpdateProductStatus.php");  
        } 
    }
    if ($_POST["Choose"]=="Selled and Status to NULL" or $_POST["Choose"]=="Selled and Update"){
        $sql = "INSERT INTO Selled_Product VALUES('".$_POST["Pro_id"]."','".$_POST["Email"]."','".$_POST["date"]."')";
        $result = mysqli_query($connect, $sql);
        if (!$result) {
             echo mysqli_error($connect) . '<br>';
            die('Fail to Selled and Status to NULL');
            include("UpdateProductStatus.php");  
        }
    }      
    mysqli_close($connect);
    header("Location: Product_table.php");
    exit();  
?>