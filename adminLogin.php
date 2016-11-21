<!--Patricia Organ - 01110489 - HDip Software Design and Development - CT870 - Internet Programming-->
<!-- as this is a file that will use php, changing the extension, and include changes also-->
<!--Assignment7-->
<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
//if not empty and equal to saved password then send them to the Admin page
	if(!empty($_POST["password"])){
		if($_POST["password"] === "admin"){
			echo '<script>window.location = "showContactUs.php"</script>';
		}
	}
}
?>
<?php include 'top.html'; ?>
<div id ="content" class="center">
<br>
<br>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" accept-charset="UTF-8">
            <fieldset>
                <legend align="left">Admin Access:</legend>
                <table align="center" >
				<tr></tr>
                    <tr>
                        <td >Enter Admin Password: </td>
					</tr>
					<tr>
					<td><input name="password" type="text" ></input></td>
					</tr>
					<tr>
					<td>
					<input type="submit" value="Submit" name ="submit" >
					</td>
					</tr>
				</table>
			</fieldset>
</form>
</div>
<?php include 'bottom.html'; ?>
