<html>
	<head>
	<link rel="stylesheet" href="styles.css">
	</head>
	<body>
		 <div class="topnav">
			<div class = "center color topnav">Restaurant Reservation System</div>
  			<a href="restaurant.php">Home</a>
  			<a class="active" href="checkreserve.php">Check Reservation</a>
  			<a href="deletereserve.php">Delete Reservation</a>
  			<a href="createdb.php">Create Database</a>
			<a href="billgen.php">Bill Generation</a>
			<a class="active" href="billinp.php">Bill Input</a>
		</div> 
	<body>
	
		<form method ="POST" action ="billinp.php">
			Input Unique Id:<input type = "number" name = "uniId">
			Total:<input type = "number" name = "billamt">
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
			$tot = $_POST["billamt"];
			
			$total = $tot + ($tot*18)/100;

			$res = "UPDATE reservation SET Bill = $total WHERE ID = $id";

			if(mysqli_query($con,$res)){
				echo "Bill Amount has been updated";
			}
			else{
				echo "Bill not updated, Please try again"; 
			}
		}
	}
?>