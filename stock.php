<!--Patricia Organ - 01110489 - HDip Software Design and Development - CT870 - Internet Programming-->
<!-- as this is a file that will use php, changing the extension, and include changes also-->
<!--Assignment7-->
<?php include 'top.html'; ?>
<div id="content">
<!--This include is an inline menu bare for the purpose of multiple pages in admin area -->
<?php include 'adminMenu.html'; ?>
<?php
	$servername = "danu6.it.nuigalway.ie";
	$username = "mydb1628u";
	$password = "mydb1628u";
	$dbname = "mydb1628";
	
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	
	//create a SQL query to get back all data from the table
	$getSql = "SELECT * FROM Stock";
	//call the query on the connection made
	$resultData = $conn->query($getSql);
	
	echo"<br>
	<br>
	<table style='width:100%' border=1 cellspacing='3' cellpadding='3'>
	<tr>
	<th>StockID</th>
	<th>Name</th>
	<th>Description</th>
	<th>Price</th>
	<th>Stock Level</th>
	<th>Image file</th>
	</tr>";
	if ($resultData->num_rows >0){
		//loop through the rows in database and display them
		while ($row = $resultData->fetch_assoc()){
		echo "<tr>";
		echo "<td>".$row['idStock']."</td>";
		echo "<td>".$row['productName']."</td>";
		echo "<td>".$row['productDesc']."</td>";
		echo "<td>".$row['price']."</td>";
		echo "<td>".$row['productQty']."</td>";
		echo "<td>".$row['imageFile']."</td>";
		}
	}else {
		echo "0 results";
	}
	echo "</table>";
	$conn->close();
?>
</div>
<?php include 'bottom.html'; ?>