<?php include 'top.html'; ?>
<div id="content" >
<!--This include is an inline menu bare for the puprpose of multiple pages in admin area -->
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
	$getSql = "SELECT * FROM WebsiteQuerys";
	//call the query on the connection made
	$resultData = $conn->query($getSql);
	
	echo"<br>
	<br>
	<table style='width:100%' border=1 cellspacing='3' cellpadding='3'>
	<tr>
	<th>QueryID</th>
	<th>Name</th>
	<th>Email</th>
	<th>Category</th>
	<th>Comments</th>
	</tr>";
	if ($resultData->num_rows >0){
		//loop through the rows in database and display them
		while ($row = $resultData->fetch_assoc()){
		echo "<tr>";
		echo "<td>".$row['idWebsiteQuerys']."</td>";
		echo "<td>".$row['name']."</td>";
		echo "<td>".$row['email']."</td>";
		echo "<td>".$row['question']."</td>";
		echo "<td>".$row['comments']."</td>";
		}
	}else {
		echo "0 results";
	}
	echo "</table>";
	$conn->close();
?>
</div>
<?php include 'bottom.html'; ?>