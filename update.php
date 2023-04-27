<?php include("connection.php");
error_reporting(0);
 $id = $_GET['id'];
 echo $id;
 $query = "SELECT * FROM registrationform where id='$id'";
 $data = mysqli_query($conn, $query);
 $total = mysqli_num_rows($data);
 $result= mysqli_fetch_assoc($data);
  
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
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
  width: 30%;
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

<form action="#" method="POST">
  <div class="container">
    <h1>Update Details</h1>


    <label for="name"><b>FullName</b></label>
    <input type="text" placeholder="Enter name" name="name" style="width: 20vw;height: 4vw; border: 1px solid gray;
    background: #f1f1f1;" required value="<?php echo $result['Name']; ?>">
<br>
    <label ><b>Gender</b></label>
    <input type="radio" name="gender" value="male"  margin-left: 13px; 
     <?php 
      if($result['Gender'] == 'male')
      {
        echo 'checked="checked"';
      } 
     
     ?>
     >Male
    <input type="radio" name="gender" value="female" 
    <?php 
    if($result['Gender'] == 'female')
      {
        echo 'checked="checked"';
      } 
     ?>
    >Female

    
 <br>
 <br>
    <label ><b>DOB</b></label>
     <input type="date"  name="dob" required style="margin-left: 31px;width: 20vw;height: 4vw;border: 1px solid gray;
    background: #f1f1f1;" value="<?php echo $result['DOB']; ?>">
     <br>
     <br>
   <label ><b>Address</b></label>
    <textarea class="form-control" name="address" type="textarea"  style="width: 20vw;height: 4vw; border: 1px solid gray;
    background: #f1f1f1;" required>
     <?php echo $result['Address'];?>
    </textarea>
    <br>
    <br>
      <label for="hobbies"><b>Hobbies</b></label>
    <select name="hobbies" style="width: 18vw;height: 4vw; border: 1px solid gray;
    background: #f1f1f1;" required>
    <option value="">Select</option>

    <option value="dance"
      <?php 
      if($result['Hobbies'] == 'dance')
      {
        echo 'selected';
      } 
      ?>
      >
    Dance</option>

     <option value="Playing"
      <?php
      if($result['Hobbies']== 'playing'){
        echo 'selected';
      
      }
 ?>
 >
     Playing</option>

      <option value="reading"
  <?php
      if($result['Hobbies']== 'reading'){
        echo 'selected';
      }
       ?>
>
      Reading</option>
   </select>
   <br>


    <input type="submit" name="update" value="update" class="btn">
 </div>
  
 
</form>

</body>
</html>

<?php

if($_POST['update'])
{
  $id = $_POST['id'];
  $name = $_POST['name'];
  $gender = $_POST['gender'];
  $dob = $_POST['dob'];
  $address = $_POST['address'];
  $hobbies = $_POST['hobbies'];



        $query = "UPDATE registrationform SET Name='$name',Gender='$gender',DOB='$dob',Address='$address',Hobbies='$hobbies' WHERE id='$id'";
        $data = mysqli_query($conn, $query);
        if($data){
          echo "<script>alert('Records updated')</script>";
       ?>
<meta http-equiv = "refresh" content = "2; url = http://localhost/CRUD/display.php" />


<?php
 }

        else {
          echo "Failed to update";
        }
}


 ?>