<?php

$connect = mysqli_connect("localhost", "root", "", "data");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Pro_id = $_POST['Pro_id'];
    $Pro_name = $_POST['Pro_name'];
    $Pro_price = $_POST['Pro_price'];
    $Pro_description = $_POST['Pro_description'];
    $Pro_date = $_POST['date'];
    $Pro_email = $_POST['Email'];

    $newfile = 'image/'.$_FILES['picfile']['name'];
    if (!file_exists($newfile)) {
        copy($_FILES['picfile']['tmp_name'], $newfile);
    } else {
        echo "File already exists. Ignoring copy operation.";
    }
    
    // Handle file upload
    if ($_FILES['picfile']['name']) {
        $file_name = 'image/'.$_FILES['picfile']['name'];
        $file_tmp = 'image/'.$_FILES['picfile']['tmp_name'];
        move_uploaded_file($file_tmp, "image/" . $file_name);
        $update_image_sql = "UPDATE products SET Pro_image='$file_name' WHERE Pro_id='$Pro_id'";
        mysqli_query($connect, $update_image_sql);
    }

    // Update product table
    $update_product_sql = "UPDATE products SET Pro_name='$Pro_name', Pro_price='$Pro_price', Pro_description='$Pro_description', Pro_date='$Pro_date', Pro_email='$Pro_email' WHERE Pro_id='$Pro_id'";
    mysqli_query($connect, $update_product_sql);

    // Delete old tags
    $delete_tags_sql = "DELETE FROM Product_Tags WHERE Tag_pid='$Pro_id'";
    mysqli_query($connect, $delete_tags_sql);

    // Insert new tags if any
    $sql2 = "";
    for ($x = 1; $x <= 11; $x++) {
        if (isset($_POST["Tag".$x])) {
            $sql2 .= "(
                '".$Pro_id."',
                '".$_POST["Tag".$x]."')";
                echo "Tag".$x;
            $sql2 .= ",";
        }
    }
    if (!empty($sql2)) {
        $sql2 = substr_replace($sql2, ";", -1);
        $sql2 = "INSERT INTO Product_Tags VALUES $sql2" ;
        $result = mysqli_query($connect, $sql2);
        if (!$result) {
            echo mysqli_error($connect) . '<br>';
            die('Can not access database!(Product_Tags)');
        }
    }

    mysqli_close($connect);

    header("Location: Product_table.php");
    exit();
}

?>
