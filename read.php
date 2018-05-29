<?php
//read.php
require_once '../login.php';
$conn = new mysqli($mysql_host, $mysql_username, $mysql_password, $mysql_database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}  
$sql = "SELECT * FROM Movies WHERE genre='" . $_POST['genre'] . "'";
$result = $conn->query($sql);
    
$movie_ID = $row[0];
$title = $row[1];
$director = $row[2];
$genre = $row[3];
// HTML to display the form on this page.


echo"<HEAD> <link rel='stylesheet' href='styles.css'></HEAD><BODY>";
echo nl2br("<H3>Here are the list of movies "." ". $_POST['genre']."</H3>");
//$num_names = mysql_num_rows($roster_table);

if ($result->num_rows > 0)//will only do this if there is something to be returned from the aboe line
	{	echo"<HEAD> <link rel='stylesheet' href='styles.css'></HEAD>";
		echo "<TABLE><TR><TH>movie_id</TH><TH>title</TH><TH>genre</TH></TR>";
		// Iterate through all of the returned images, placing them in a table for easy viewing
	while($row = $result->fetch_assoc())
		{
			// The following few lines store information from specific cells in the data about an image
			echo "<TR>";
			echo "<TD>".$row['movie_id']. "</TD><TD>". $row['title']. "</TD><TD>".$row['genre'] ."</TD>";
			echo "<TD><form action= 'update.php' method = 'post'>";
			echo "<button name = 'update'   type = 'submit' value =".$row['movie_id'].">Edit</button></FORM>";
			echo "<TD><form action= 'delete.php' method = 'post'>";
			echo "<button name = 'delete'   type = 'submit' value =".$row['movie_id'].">Delete</button></FORM>";
			echo "</TR>";
		}
		
	echo "</TABLE>";
	echo"<br> Need to update an item? <form action= 'update_delete.php' method = 'get'>";
	echo "<input name = 'action'   type = 'submit' value = 'Yes'>";
	echo "<input name = 'action'   type = 'submit' value = 'No'>";
	echo "</FORM>";
	}
	else{
		echo "<br> 0 results";
		}
		echo '</body>';
	
?>