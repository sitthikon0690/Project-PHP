<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AddProduct</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>

        #form2{
            justify-content: left;
            width: 410px;
            height: 700px;
            padding: 20px;
            border-radius: 3%;
            margin-top: 10px;
            box-shadow: 0px 5px 10px 0px rgba(0, 0, 0, 0.5)
        }

    </style>
</head>
<?php
$connect = mysqli_connect("localhost", "root","", "data");
$sql ="select * from products where Pro_id = '".$_POST['id']."' ";
$result = mysqli_query($connect, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    $Pro_id = $row['Pro_id'];
    $Pro_name = $row['Pro_name'];
    $Pro_price = $row['Pro_price'];
    $Pro_description = $row['Pro_description'];
    $Pro_date = $row['Pro_date'];
    $Pro_image = $row['Pro_image'];
    $Pro_status = $row['Pro_status'];
    $Pro_email = $row['Pro_email'];
}
$selectedTags = [];
$sql = "SELECT Tag_pid,Tag_tn FROM product_tags WHERE Tag_pid = '".$_POST['id']."'";
$result_selected = mysqli_query($connect, $sql);
while ($row_selected = mysqli_fetch_assoc($result_selected)) {
    $selectedTags[] = $row_selected['Tag_tn'];
}
?>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <table align = "center">
    <form method="post" action="UpdateToDB.php" enctype="multipart/form-data">
        <tr>
            <td>
                <div id = "form2">
                    <h4 align = 'center'>Update Product ID: <?php echo $Pro_id; ?></h4><br>
                    <input type="hidden" name="Pro_id" value="<?php echo $Pro_id; ?>">
                    <label class="form-label">Seller ID</label><br>
                        <input type="text" name="Email" size="45" value = "<?php echo $Pro_email; ?>" required class="form-select form-select-sm"><br>
                    <label class="form-label">Product Name</label><br>
                        <input type="text" name="Pro_name" size="45" value = "<?php echo $Pro_name; ?>" required class="form-select form-select-sm"><br>
                    <label class="form-label">Price</label><br>
                        <input type="text" name="Pro_price" size="45" value = "<?php echo $Pro_price; ?>" required class="form-select form-select-sm"><br>
                    <label class="form-label" for="Tags">Product Tag(s)</label><br>
                    <table>
                        <tr>
                            <td valign="top">
                            <?php
                                // Loop through all tags
                                $tags = ["For Professor", "1st Year Student", "2nd Year Student", "3rd Year Student",
                                        "4th Year Student", "4th+ Year Student"];

                                foreach ($tags as $i => $tag) {
                                    $isChecked = (in_array($tag, $selectedTags)) ? 'checked' : '';
                                    echo "<input type='checkbox' name='Tag" . ($i + 1) . "' value='$tag' $isChecked>$tag<br>";
                                }
                                ?>
                            </td>
                            <td valign="top">
                            <?php
                                // Loop through all tags
                                $tags = [ "Electronics", "Study", "Utility",
                                        "Cloth and Accessories", "Other(s)"];

                                foreach ($tags as $i => $tag) {
                                    $isChecked = (in_array($tag, $selectedTags)) ? 'checked' : '';
                                    echo "<input type='checkbox' name='Tag" . ($i + 7) . "' value='$tag' $isChecked>$tag<br>";
                                    }
                                ?>
                            </td>
                        </tr>
                    </table><br>
                    <label class="form-label">Date Added</label>
                        <input type="date" name="date" value = "<?php echo $Pro_date; ?>"class="form-select form-select-sm" required><br>
                    <label class="form-label">Product Images</label>
                    <input name="picfile" class="form-control form-control-sm" type="file" aria-label=".form-control-sm example">
                    <br>
                </div>
            </td>
            <td>
                <div id = "form2">
                    <label class="form-label">Descriptions</label><br>
                    <textarea class="form-select form-select-sm" name="Pro_description" cols="48" rows="23"> <?php echo trim($Pro_description); ?></textarea><br>
                    <div align = "right">
                        <a href="<?php echo $Pro_image; ?>" target="_blank" class="btn btn-outline-secondary">View Old Image</a>
                        <button type="submit" class="btn btn-outline-secondary">Submit</button>
                        <button onclick="window.location.href='Product_table.php'" class="btn btn-outline-secondary" >Return</button>
                    </div>
                </div>
            </td>
        </tr>
    </form>
    </table>
    <script>
        function openImage(imageUrl) {
            window.open(imageUrl, '_blank', 'width=800,height=800');
        }
    </script>
</body>
</html>
