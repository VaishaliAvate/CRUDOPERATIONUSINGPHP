<html>
	<head>
		<title>Display Data</title>
		<style>
			body{
				background:lightgray;
			}
			table{
				background-color: white;
			}
			.update, .delete {
				background-color: green;
				border-radius:3px;
				outline:none;
				color:white;
				height:24px;
				width:80px;
				font-weight: 400px;
				cursor: pointer;

			}
			.delete{
				background-color: red;


			}
		</style>
	</head>



<?php include("connection.php");

 $query = "SELECT * FROM registrationform";
 $data = mysqli_query($conn, $query);
 $total = mysqli_num_rows($data);
  
	

	

 if($total!=0){

 	?>
 	<h1 align="center">Displaying All Record</h1>
<table border="1" cellspacing="7" align="center" >
	<tr>
		<th width="5%">Id</th>
		<th width="10%">ProfileImage</th>
		<th width="10%">FullName</th>
		<th width="10%">Gender</th>
		<th width="10%">DOB</th>
		<th width="10%">Address</th>
		<th width="10%">Hobbies</th>
		<th width="10%">CRUD Operation</th>
		
	</tr>


<?php
 	while($result= mysqli_fetch_assoc($data)){
 		//echo $result["id"]." ".$result["Name"]."".$result["Gender"]."".$result["DOB"]."".$result["Address"]."".$result["Hobbies"];
		echo "<tr>
			<td>".$result["id"]."</td>
			<td><img src='".$result["Profile_Img"]."'height='50px' width='50px'></td>
			<td>".$result["Name"]."</td>
			<td>".$result["Gender"]."</td>
			<td>".$result["DOB"]."</td>
			<td>".$result["Address"]."</td>
			<td>".$result["Hobbies"]."</td>
			<td>
			<a href='update.php?id=$result[id]'><input type='submit' value='update' class='update'></a>


			<a href='delete.php?id=$result[id]'><input type='submit' value='Delete' class='delete' onclick='return checkdelete()'></a>

			</td>
			</tr>";
				}
 		}
 else {
 	echo "No record found";
 }

?>
</table>
<script>
	function checkdelete(){
		return confirm('Are you really want to delete this Record?');
	}
	</script>
</html>