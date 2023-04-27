<?php
include("connection.php");

$id =$_GET['id'];

$query = "DELETE FROM registrationform WHERE id='$id' ";
$data = mysqli_query($conn,$query);
if($data){
	 echo "<script>alert('Records Deleted')</script>";
	 ?>

	 <meta http-equiv = "refresh" content = "1; url = http://localhost/CRUD/display.php" />
<?php
}
else{
	echo "failed to delte";
}

?>