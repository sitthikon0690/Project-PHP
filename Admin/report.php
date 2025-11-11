<html>
<head>
    <title>Update a Row</title>
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
    <script language="JavaScript">
        function confirmUpdate() {
            return confirm('Are you sure you want to Update this?');
        }
    </script>
</head>
<body>
<?php
$connect = mysqli_connect("localhost", "root", "", "data");
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = 'SELECT p.*, s.* FROM products p INNER JOIN selled_product s ON p.Pro_id = s.SP_pid';
$result = mysqli_query($connect, $sql);
if (!$result) {
    echo '<b>Error</b>';
} else {
    $numrows = mysqli_num_rows($result);
    if ($numrows == 0) {
        echo '<b>No rows found</b>';
    } else {
        echo '<table border="1" cellspacing="0" cellpadding="3">';
        echo '<tr>';
        echo '<th>ID</th>';
        echo '<th>Name</th>';
        echo '<th>Price</th>';
        echo '<th>Buyer Email</th>';
        echo '<th>Seller Email</th>';
        echo '<th>Added Date</th>';
        echo '<th>Sold Date</th>';
        echo '<th>Status</th>';
        echo '</tr>';
        
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td>'.$row['Pro_id'].'</td>';
            echo '<td>'.$row['Pro_name'].'</td>';
            echo '<td>'.$row['Pro_price'].'</td>';
            echo '<td>'.$row['Pro_email'].'</td>';
            echo '<td>'.(isset($row['SP_email']) ? $row['SP_email'] : '').'</td>';
            echo '<td>'.$row['Pro_date'].'</td>';
            echo '<td>'.(isset($row['SP_selldate']) ? $row['SP_selldate'] : '').'</td>';
            echo '<td>'.$row['Pro_status'].'</td>';
            echo '<input type="hidden" name="id" value="'.$row['Pro_id'].'">'."\n";
            echo '</tr>'."\n";
            echo '</form>'."\n";
        }
        echo '</table>';
    }
}

mysqli_close($connect);
?>
<div class="button-container">
    <button onclick="window.location.href='admin_home.php'" class="btn btn-outline-secondary">Return</button>
</div>
</body>
</html>
