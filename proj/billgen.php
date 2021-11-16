<html>
	<head>
	<link rel="stylesheet" href="styles.css">
	</head>
	<body>
		 <div class="topnav">
			<div class = "center color topnav">Restaurant Reservation System</div>
  			<a href="restaurant.php">Home</a>
  			<a  href="checkreserve.php">Check Reservation</a>
  			<a href="deletereserve.php">Delete Reservation</a>
  			<a href="createdb.php">Create Database</a>
			<a class="active" href="billgen.php">Bill Generation</a>
			<a href="billinp.php">Bill Input</a>
		</div> 
	<body>
	
		<form method ="POST" action ="billgen.php">
			Input Unique Id:<input type = "number" name = "uniId">
			<input type = "submit" name = "checkid" value = "Generate">
		</form>
	</body>
</html>
<?php
	if(isset($_POST["checkid"]))
	{
		$con = mysqli_connect("localhost","root","","resto");
		if(!$con){
			die("error, connection failed!!! , please try again later".mysqli_connect_error());
		}
		else
		{
			$id = $_POST["uniId"];
			$res = mysqli_query($con,"SELECT * FROM reservation WHERE ID = $id");
			echo "----------------BILL------------------</br>";
			while($row = mysqli_fetch_array($res))
			{
				$temp = "";
				echo "Unique ID: ".$row["ID"]."</br>";
				echo "Name Under Reservation: ".$row["Name"]."</br>";
				echo "Seated For: ".$row["Size"]."</br>";
				echo "Time Slot: ".$row["Time_Res"]."</br>";
				echo "Date Booked on: ".$row["Date_Res"]."</br>";
				
				if($row["Bill"] != 0.0)
				{
					echo "Bill amount: ".$row["Bill"]."</br>";
				}
				else if($row["Bill"] == 0.0)
				{
					echo "Bill amount: not updated </br>";
				}
				if($row["active"] == 1)
				{
					$temp = "yes";
				} 
				echo "Reservation status: ".$temp;
			}
		}
	}
?>