<!DOCTYPE html>
<html lang="en">
 <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PSU Shop</title>
	<style>
        .custom-div {
            background-image: url('IMG/DSC_8815-squoosh (1).jpg');
            background-size: cover;
            background-position: center;
            height: 300px; /* Set the height of the div */
            padding: 50px;
            color: black;
        }		
		 .container {
			max-width: 100%;
			padding: 0 20px;
			margin: auto auto;
		}
		.row {
            overflow: hidden;
        }
		.col-6 {
            float: right;
            width: 100%; /* 70% ของพื้นที่ใน row */
            padding: 50px; /* เพิ่ม padding เพื่อเพิ่มระยะห่างของเนื้อหา */
            /*background-color: #66ffff;  เปลี่ยนสีพื้นหลัง */
            /*border: 3px solid #000099;  เพิ่มเส้นขอบ */
        }
		
		
		
    </style>
	<link rel = 'stylesheet' href='style.css'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">

 </head>
 <body>
 <section class='header'>
	
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
	
	<nav class="navbar bg-body-tertiary">
		<div class="container">
			<a class="navbar-brand" href="page1Home.php">
				<img src="IMG/Logo-PSU-EH-011.png" alt="PSULOGO" width="150" height="60" style="display: block; float: left;">
			</a>
			<form class="d-flex" role="search">
				<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
				<button class="btn btn-outline-info" type="submit">Search</button>
				<button class="logout" onclick="location.href='logout.php'" type="button">Logout</button>
			</form>
		</div>
	</nav>

    <div class="row">
		<div class="col border-0" style = "background-color: #293E6A; padding-bottom: 40px">
		</div>
	</div>

<div class="container">
<div class="row">
			<?php
				$connect = mysqli_connect("localhost", "root", "", "data");
				if ($connect->connect_error) {
					die("Connection failed: " . $connect->connect_error);
				}
				
				
				if(isset($_GET['shoptype'])) {
				   $shoptype = $_GET['shoptype'];
				}
				
				$sql = "SELECT *
				FROM product_tags
				JOIN products ON product_tags.Tag_pid = products.Pro_id
				JOIN tags ON product_tags.Tag_tn = tags.Tag_name
				WHERE products.Pro_id = '".$shoptype."'
				GROUP BY product_tags.Tag_pid";
    
				$result = $connect->query($sql);

				
				if ($result !== false && $result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
					
						$Pro_name = $row["Pro_name"];
						$shopSellerID = $row['Pro_email'];
						$shopPrice = $row['Pro_price'];
						$shopDes =  $row['Pro_description'];
						$shopTag = $row['Tag_name'];
						$shopimage = $row['Pro_image'];
						echo '<div class="col-6"><img src="/Project/Project/Admin/'.$shopimage.'" alt="Bootstrap"width="500" height="500"></div>';
						echo '<div class="col-6 card-border-0" style="width: 40rem; background-color: rgba(255, 255, 255, 0);">';
						echo '<strong style="color: white;"><h1>';
						echo "[".$shoptype."]"." ".$Pro_name;
						echo '</h1>';
						echo '----------------------------------------------------------------------------------';
						echo '<br> <h4>By ';
						echo $shopSellerID."";
						echo '</h4>';
						echo '----------------------------------------------------------------------------------';
						echo '<br> <h4>';
						echo $shopPrice;
						echo ' Baht</h4>';
						echo '----------------------------------------------------------------------------------';
						echo '<br>';
						echo 'Tag(s): ';
						echo $shopTag;
						echo '<br>';
						echo '----------------------------------------------------------------------------------';
						echo '<br>';
						echo $shopDes;
						echo '<br>';
						echo '----------------------------------------------------------------------------------';
						echo '</strong>';
						echo '</div>';
						}
				} 
			else {
				echo "0 results";
			}
			$connect->close();
			?>
</div>
</div>

 <div class="row" align="right">
	<div class="col-2">
	</div>
	
	<div class='col-8'>
		<p style="text-align: right;">
			<span class="custom-spacing">&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp;</span>
			<!-- <a href="#" class="btn btn-outline-primary" id="chatButton" style='font-size: 20px; padding: 20px 40px;'>Chat to Seller</a> -->			
		</p>
	</div>
	
	<div class="col-2">
	</div>

</div> 
    <div class="row">
		<div class="col border-0" style = "background-color: #293E6A; padding-bottom: 40px">
	</div>
 </body>
</html>
