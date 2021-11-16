<html>	
	<head>
	<link rel="stylesheet" href="styles.css">
	</head>
	<body>
		 <div class="topnav">
			<div class = "center color topnav">Restauraunt Reservation System</div>
  			<a href="restaurant.php">Home</a>
  			<a href="checkreserve.php">Check Reservation</a>
  			<a href="deletereserve.php">Delete Reservation</a>
  			<a class="active" href="createdb.php">Create Database</a>
			<a href="billgen.php">Bill Generation</a>
			<a href="billinp.php">Bill Input</a>
		</div>
		<form method ="POST" action ="createdb.php">
		
			<input type = "submit" name = "db" value = "CREATE DATABASE">
			<input type = "submit" name = "table" value="CREATE TABLE">
		</form> 
	</body>
</html>
<?php
	if(isset($_POST["db"]))
	{
		$con = mysqli_connect("localhost","root","");
	
		if(!$con){
			die("Connection failed!!! please Try again Later.".mysqli_connect_error());
		}
		else
		{
			$sql = "CREATE DATABASE resto";
			if(mysqli_query($con,$sql)){

				echo "Database created succesfully";
			}
			else
			{
				echo "error";
			}
		}
	}
	
	else if(isset($_POST["table"]))
	{
		$con2 = mysqli_connect("localhost","root","","resto");
	
		if(!$con2){
			die("Connection failed!!! please Try again Later.".mysqli_connect_error());
		}
		else
		{
			$sql2 = "CREATE TABLE reservation(
					ID INT PRIMARY KEY,
					Name VARCHAR(30),
					Size INT NOT NULL,
					Time_Res VARCHAR(20) NOT NULL,
					Date_Res VARCHAR(20) NOT NULL,
					active bit DEFAULT 1,
					Bill FLOAT DEFAULT 0.0
					);";

			if(mysqli_query($con2,$sql2)){

				echo "Table created Successfully";
			}
				
			else
			{
				echo"error : Table not created";
			} 
		}
	}
?>

		
	