<?php include("connection.php");?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="formstyle.css">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  background-color:gray;
}

* {
  box-sizing: border-box;
}

/* Add padding to containers */
.container {
  padding: 16px;
  background-color: white;
}

  .container label {
   
    margin-right: 78px;
    text-align: center;
}

/* Full-width input fields */
input[type=text]{
 
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus {
  background-color: #ddd;
  outline: none;
}



/* Set a style for the submit button */
.registerbtn {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity: 1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}


</style>
</head>
<body>

<form action="#" method="POST" enctype="multipart/form-data">
  <div class="container">
    <div class="title">
      <h1>Register Form</h1>
    </div>
    <div class="input_filed" style="">
    <label for="name"><b>Profile Image</b></label>
    <input type="file" style="width: 200px;height: 4vw; border: 1px solid gray" name="uploadfile" >
<br>
</div>
    <div>
    <label for="name"><b>FullName</b></label>
    <input type="text" placeholder="Enter name" name="name"  required style="width: 18vw;height: 4vw; border: 1px solid gray;
    background: #f1f1f1;">
<br>
</div>
    <label for="gender"><b>Gender</b></label>
    <input type="radio" name="gender" value="male" margin-left: 15px; > Male
    <input type="radio" name="gender" value="female"> FeMale
 <br>
 <br>
    <label for="dob"><b>DOB</b></label>
     <input type="date" name="dob" required style="margin-left: 31px;width: 18vw;height: 4vw;border: 1px solid gray;
    background: #f1f1f1;
}">
     <br>
     <br>
     <div class="input_field">
   <label for="address"><b>Address</b></label>
    <textarea class="textarea" name="address" type="textarea" style="width: 18vw;height: 4vw; border: 1px solid gray;
    background: #f1f1f1;" required ></textarea>
    <br>
    <br>
</div>
      <label for="hobbies"><b>Hobbies</b></label>
    <select name="hobbies" required style="width: 18vw;height: 4vw; border: 1px solid gray;
    background: #f1f1f1;">
       <option value="">Select</option>
        <option value="dance">Dance</option>
        <option value="playing">Playing</option>
        <option value="reading" >Reading</option>
   </select>
   <br>


    
     <input type="submit" name="register" value="register" class="registerbtn">

 </div>
  
 
</form>

</body>
</html>

<?php
if($_POST['register'])
{
	error_reporting(0);
$filename = $_FILES["uploadfile"]["name"];
$tempname = $_FILES["uploadfile"]["tmp_name"];
$folder = "images/".$filename;
move_uploaded_file($tempname,$folder);


	

   $id = $_POST['id'];
    $pic = $_POST['uploadfile'];
    $fname = $_POST['name'];
     $gender = $_POST['gender'];
      $dob = $_POST['dob'];
       $address = $_POST['address'];
        $hobbies = $_POST['hobbies'];

$query = "INSERT INTO registrationform (id,Profile_Img,name,gender,dob,address,hobbies) Values('$id','$folder','$fname','$gender','$dob','$address','$hobbies')";
        $data = mysqli_query($conn,$query);

        if($data){
           echo "<script>alert('Records Inserted Succesfully')</script>";
        }
        else {
            echo "<script>alert('Failed to insert')</script>";
        }
}


 ?>