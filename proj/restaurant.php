<html>
	<head>
	<link rel="stylesheet" href="styles.css">
	</head>
	<body>
		 <div class="topnav">
			<div class = "center color">Restaurant Reservation System</div>
  			<a class="active" href="restaurant.php">Home</a>
  			<a href="checkreserve.php">Check Reservation</a>
  			<a href="deletereserve.php">Delete Reservation</a>
  			<a href="createdb.php">Create Database</a>
			<a href="billgen.php">Bill Generation</a>
			<a href="billinp.php">Bill Input</a>
		</div> 
		<form method = "POST" action ="restaurant.php">
			Name :<input type = "text" name ="name"></br>
			Table size:
						<select name ="tablesize" id = "tablesize">
							<option value = " " disabled>No.</option>
							<option value = "4">4</option>
							<option value = "3">3</option>
							<option value = "2">2</option>
							<option value = "1">1</option>
						</select>
					</br>

			Time :<select name ="time" id = "time">
							<option value = " " disabled>Time frame.</option>
							<option value = "morn">Morning(10AM - 1PM)</option>
							<option value = "noon">Afternoon(2PM - 6PM)</option>
							<option value = "eve">Evening(7PM - 10PM)</option>
							
					</select></br>
			Date :<input type ="date" name ="date"></br>

			<input type = "submit" name = "submit" value = "Confirm">
			
		</form>

		
	</body>
</html>
<?php

		if(isset($_POST["submit"])){
			$checkarr = array();

			$con = mysqli_connect("localhost","root","","resto");
			if(!$con){
		
				die("error, connection failed!!!, please try again later".mysqli_connect_error());
			}
			else{
				$rand_gen = $rand_gen = mt_rand(100000,999999);;
				$name = $_POST["name"];
				$size = $_POST["tablesize"];
				$time = $_POST["time"];
				$date = $_POST["date"];
				
				
				/*$res = mysqli_query($con,"SELECT * FROM reservation");
				while($row = mysqli_fetch_array($res))
				{
					echo $row['ID']." ".$row['Name']." ".$row['Size']." ".$row['Time_Res']." ".$row['Date_Res']." ".$row['active'];
				}*/

				$ins = "INSERT INTO reservation (ID,Name,Size,Time_Res,Date_Res) VALUES('$rand_gen','$name','$size','$time','$date')";

				$check = 0;

				do{
						if(mysqli_query($con,"INSERT INTO reservation (ID,Name,Size,Time_Res,Date_Res) VALUES('$rand_gen','$name','$size','$time','$date')"))
						{
							echo "you're table has been booked, please use the code :".$rand_gen." to check the status of your reservation";
							$check = 1;
						}
						else
						{

							echo "nope";
							$rand_gen = mt_rand(100000,999999);
						}
				}while($check == 0);
				
			}

			
		}
?>

