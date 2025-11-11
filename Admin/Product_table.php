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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<?php
$connect = mysqli_connect("localhost", "root","", "data");
if (!isset($smtUpdate)) {
    $sql =' select Pro_id,Pro_Name from products';
    $result = mysqli_query($connect, $sql);
    $numrows = mysqli_num_rows($result);
    $numfields = mysqli_num_fields($result);

    if (!$result) {
        echo '<b>Error </b>';
    } elseif ($numrows==0) {
        echo '<b>Query executed successfully but no row returns!</b>';
    } else {
        echo '<table border="1" cellspacing="0" cellpadding="3">';
        echo '<tr>';
        echo '<th>ID</th>';
        echo '<th>NAME</th>';
        echo '<th>UPDATE</th>';
        echo '</tr>';
        while ($row = mysqli_fetch_array($result)) {
            echo '<form name="frmUpdate'.$row['Pro_id'].'" method="post" action="edit_product.php">'."\n";
            echo '<tr>';
            for ($i=0; $i<$numfields; $i++) {
                echo '<td>'.$row[$i].'&nbsp;</td>'."\n";
            }
            echo '<input type="hidden" name="id" value="'.$row['Pro_id'].'">'."\n";
            echo '<td><input name="smtUpdate" type="submit" value="Update" onClick=" return confirmUpdate();"></td>'."\n";
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
