<html>
	<head>
	<link rel="stylesheet" href="styles.css">
	</head>
	<body>
		 <div class="topnav">
			<div class = "center color">Restaurant Reservation System</div>
  			<a href="restaurant.php">Home</a>
  			<a href="checkreserve.php">Check Reservation</a>
  			<a class="active" href="deletereserve.php">Delete Reservation</a>
  			<a href="createdb.php">Create Database</a>
			<a href="billgen.php">Bill Generation</a>
			<a href="billinp.php">Bill Input</a>
		</div> 
	
	
		<form method ="POST" action ="deletereserve.php">
			Input Unique Id:<input type = "number" name = "uniId">
			<input type = "submit" name = "delid" value = "Delete">
		</form>
	</body>
</html>
<?php
	if(isset($_POST["delid"]))
	{
		$con = mysqli_connect("localhost","root","","resto");
		if(!$con){
			die("error, connection failed!!! , please try again later".mysqli_connect_error());
		}
		else
		{
			$id = $_POST["uniId"];
			$res = mysqli_query($con,"SELECT * FROM reservation WHERE ID = $id");
			echo "----------------REMOVAL REPORT------------------</br>";
			while($row = mysqli_fetch_array($res))
			{
				$temp = "";
				echo "The following reservation has been deleted: </br>";
				echo "Unique ID: ".$row["ID"]."</br>";
				echo "Name Under Reservation: ".$row["Name"]."</br>";
				echo "Seated For: ".$row["Size"]."</br>";
				echo "Time Slot: ".$row["Time_Res"]."</br>";
				echo "Date Booked on: ".$row["Date_Res"]."</br>";
				
			}
			
			
			$sql_query="DELETE FROM reservation WHERE ID = $id";
			
			if(mysqli_query($con,$sql_query))
			{
				echo '<script>alert("Reservation has been deleted")</script>';
				
			}
			else
			{
				echo "error";
				mysqli_error($con);
				
			}
			
		}
	}
?>

