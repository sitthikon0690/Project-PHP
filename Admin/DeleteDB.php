<!DOCTYPE html>
<html>
<head>
    <title>Delete a Row</title>
    <style>
        table {
            width: 80%; /* Adjust the width as needed */
            margin: 0 auto; /* Center the table */
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
        .button-container {
            text-align: center;
            margin-top: 20px;
        }
    </style>
    <script>
        function confirmDelete() {
            return confirm('Are you sure you want to delete this?');
        }
    </script>
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<?php
$connect = mysqli_connect("localhost", "root", "", "data");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Pro_id = $_POST['id'];

    // Delete product from products table
    $delete_product_sql = "DELETE FROM products WHERE Pro_id='$Pro_id'";
    mysqli_query($connect, $delete_product_sql);

    // Delete related tags
    $delete_tags_sql = "DELETE FROM Product_Tags WHERE Tag_pid='$Pro_id'";
    mysqli_query($connect, $delete_tags_sql);

    mysqli_close($connect);

    header("Location: Product_table.php");
    exit();
}

$sql = 'SELECT Pro_id, Pro_Name FROM products';
$result = mysqli_query($connect, $sql);
$numrows = mysqli_num_rows($result);
$numfields = mysqli_num_fields($result);

if (!$result) {
    echo '<b>Error </b>';
} elseif ($numrows == 0) {
    echo '<b>Query executed successfully but no row returns!</b>';
} else {
    echo '<table border="1" cellspacing="0" cellpadding="3">';
    echo '<tr>';
    echo '<th>ID</th>';
    echo '<th>NAME</th>';
    echo '<th>DELETE</th>';
    echo '</tr>';
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>' . $row['Pro_id'] . '</td>';
        echo '<td>' . $row['Pro_Name'] . '</td>';
        echo '<td>
                <form method="post" action="">
                    <input type="hidden" name="id" value="' . $row['Pro_id'] . '">
                    <input type="submit" name="smtUpdate" value="Delete" onclick="return confirmDelete();">
                </form>
              </td>';
        echo '</tr>';
    }
    echo '</table>';
}

mysqli_close($connect);
?>

<div class="button-container">
    <button onclick="window.location.href='admin_home.php'" class="btn btn-outline-secondary">Return</button>
</div>

</body>
</html>
