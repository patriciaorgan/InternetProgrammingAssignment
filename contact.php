<!--Patricia Organ - 01110489 - HDip Software Design and Development - CT870 - Internet Programming-->
<!-- as this is a file that will use php, changing the extension, and include changes also-->
<!--Assignment7-->
<?php
	//create variables
	$name = $email = $comment = $question = $validText ="";
	$check = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		//only start process if all text is not empty
		//check if any text box is blank
		if (
		!empty($_POST["fullname"]) &&
		!empty($_POST["email"]) &&
		!empty($_POST["comment"])
		){
			//store the values in local variables
			$name = $_POST["fullname"];
			$email = $_POST["email"];
			$comment = $_POST["comment"];
			$question = $_POST["question"];

				//check to see if name is long enough
				if (!length(10,$name)){
						$check=false;//this will stop the submission, email.
				}
				//check to see if email is long enough
				if (!length(10,$email)){
						$check=false;
				}
				if(!checkemail($email)){
					$check=false;
				}
				//check to see if comment is long enough
				if (!length(25,$comment)){
						$check=false;
				}

				if($check === ""){
					//call my own function that cleans the text ready for SQL insertion
					$name = cleanText($name);
					$email = cleanText($email);
					$comment = cleanText($comment);
					$question = cleanText($question);
					
					//Assignment 6 Database instead of email
					//send to database 
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
					$sql = "INSERT INTO `WebsiteQuerys` (`name`, `email`, `question`, `comments`) 
					VALUES ('{$name}', '{$email}', '{$question}', '{$comment}')";

					if ($conn->query($sql) === TRUE) {
						echo '<script type="text/javascript">';
						echo 'alert("New record created successfully");';
						echo '</script>';
					} else {
						echo "Error: " . $sql . "<br>" . $conn->error;
					}
					//close connection
					$conn->close();

					//echo to screen that it successed also
					$validText = "Your message has been successfully sent to our".
					"</br>Staff we will aim to get back to ".
					"you within 10 working days. </br>Type: ".
					$question."</br>From - ". $name.", ". $email;
					
				}
			}//end if empty
		
	}//end if Post method

	//this function will check the presence of an @ or dot in email
	function checkemail($text){
		$result = true;
		$ats = '@';
		$dot = '.';
		
		if (!(strpos( $text , $ats)))
		{
			$result = false;
		}
		if (!(strpos( $text , $dot)))
		{
			$result = false;
		}
		return $result;

	}
	//this function will be passed a valid length that is expected, plus the data
	//and return false if not long enough
	function length($len,$text){
		if( (strlen($text)) < $len  ){
			return false;
		}else{ 	
		return true;}
	}
	
	//this function strips the text so it is clean
	function cleanText($text){
		$text = trim($text);
		$text = stripslashes($text);
		$text = htmlspecialchars($text);
	  return $text;
	}
?>
<?php include 'top.html'; ?>
<div id="content" class="center">
		<h2>How to contact us</h2>
			<p>Please use the form below to submit your questions
			or comments sent to the lovely web designer :)
			</p>

    <div class = "contact" >

	<!-- old code for javascript commented out
        <form onsubmit="return validateSubmit(this)" >-->

<!--htmlspecialchars - prevents attackers from exploiting the code by injecting HTML or
 Javascript code in forms. As the code is on the same page send it to PHP_Self-->
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" accept-charset="UTF-8">
            <fieldset>
                <legend>Contact Form:</legend>
                <table  class="formstyle">
                    <tr>
                        <td>Select your question type: </td>
                        <td>
                            <select name="question" >
                            <option value="Comment" <?php if(isset($_POST['question']) && $_POST['question']=="Comment"){ echo "selected";}?>>Comment</option>
                            <option value="Shipping" <?php if(isset($_POST['question']) && $_POST['question']=="Shipping"){ echo "selected";}?>>Shipping</option>
                            <option value="Sales" <?php if(isset($_POST['question']) && $_POST['question']=="Sales"){ echo "selected";}?>>Sales</option>
                            <option value="Returns" <?php if(isset($_POST['question']) && $_POST['question']=="Returns"){ echo "selected";}?>>Returns</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td valign= "top">
                            Write your comment/<br>question here:<br>
                        </td>
                        <td>
                            <textarea rows="6" cols="30" name= "comment" ><?PHP if(isset($_POST['comment'])) echo htmlspecialchars($_POST['comment']); ?></textarea><br>
                        </td>
                    </tr>
                    <tr>
                        <td align="right">
                            Name:
                        </td>
                        <td>
                            <input type="text" name="fullname"  value="<?PHP if(isset($_POST['fullname'])) echo htmlspecialchars($_POST['fullname']); ?>">
                        </td>
                    </tr>
                    <tr>
                        <td align="right">
                            Email:
                        </td>
                        <td>
                            <input type="text" name="email"  value="<?PHP if(isset($_POST['email'])) echo htmlspecialchars($_POST['email']); ?>" >
                        </td>
                    </tr>
                    <tr>
                        <td>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td  align="right"><input type="submit" value="Submit" name ="submit" ></td>

                    </tr>
                </table>

            </fieldset>
        </form>
    </div>
	<!-- this div will display the submission confirmation text if it was valid-->
	<div>
	<?php
	echo "<p>";
	echo $validText;
	echo "</p>";
	?>
</div>

    <table id="smalltable" class="tableStyle">
        <td>
            <ul><h4>Fulfilment Executive</h4>
                <li>Name: John Bishop</li>
                <li>Phone Number: 091 672934</li>
                <li>Email:<a href="mailto:johnbishop@carboot.ie">johnbishop@carboot.ie<a/></li>
            </ul>
        </td>

        <td>
            <ul><h4>Marketing Officer</h4>
                <li>Name: Mary Molly</li>
                <li>Phone Number: 091 1293812</li>
                <li>Email:<a href="mailto:marymolly@carboot.ie">marymolly@carboot.ie</a></li>
            </ul>
        </td>

        <td>

            <ul><h4>Secretary</h4>
                <li>Name: James Jules</li>
                <li>Phone Number: 091 6981233</li>
                <li>Email:<a href="mailto:jamesjules@carboot.ie">jamesjules@carboot.ie</a></li>
            </ul>
        </td>
    </table>
	<p>&nbsp;</p>
</div>
<?php include 'bottom.html'; ?>
