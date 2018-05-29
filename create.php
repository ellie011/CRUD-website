<?php
//create.php
if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {//Check it is coming from a form
		//mysql credentials
//	require_once 'login.php';
$mysql_host = "localhost";
$mysql_database ="Ellie";
$mysql_username = "ellie011";
$mysql_password = "Ebl101502";
	//delcare PHP variables
	$title = $_POST["title"];
	$director = $_POST["director"];
	$genre = $_POST["genre"];
	//Open a new connection to the MySQL server
	//see https://www.sanwebe.com/2013/03/basic-php-mysqli-usage for more info
	$mysqli = new mysqli($mysql_host, $mysql_username, $mysql_password, $mysql_database);
	
	//Output any connection error
	if ($mysqli->connect_error) {
		die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
	}   
	
		$statement = $mysqli->prepare("INSERT INTO Movies (title, director, genre) VALUES(?, ?, ?)"); //prepare sql insert query
		//bind parameters for markers, where (s = string, i = integer, d = double,  b = blob)
		$statement->bind_param(sss, $title, $director, $genre); //bind value
		echo"<HTML><head></head><body>";
		if($statement->execute())
			{
				//print output text
				echo("The title of the film is ". $title . "! It was directed by ". $director.  " under the genre ". $genre .".");
			}
			else{
					print $mysqli->error; //show mysql error if any 
				}
echo"<br><form action= 'create.php' method = 'get'>";
echo "<input name = 'action'   type = 'submit' value = 'Go Back'></form><br><body>";
         }
         
else{
    echo ("error");
    }  
if ($_GET['action'] == 'Go Back') 
    {
             //action for No
        header('Location: CRUD_website.html');
        exit;   
    }
    
       
?>
