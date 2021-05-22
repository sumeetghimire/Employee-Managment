<!DOCTYPE html>
<html>
  <?php
       require('database.php');
          if (isset($_GET['id']) == false) {
           header('location:manager.php');
         }
           else
           {
            $id=$_GET['id'];
           }

          ?>
<head>
  <title></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>
  <?php 
    $query = "SELECT * FROM employee WHERE id ='$id'";
     $result = mysqli_query($con,$query);

    while ($row = mysqli_fetch_assoc($result))
    {  
  $firstname=$row['firstname'];
  $lastname=$row['lastname'];
   $dob=$row['DOB'];
    $email=$row['email'];
     $password=$row['password'];
      $employee_code=$row['employee_code'];
 
    }


  ?>
<form action="" method="POST">
   <div class="form-group">
    <label for="exampleInputEmail1">First Name</label>
    <input value="<?php echo $firstname;   ?>" required="" name='fname' type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="First Name">
    
  </div>

   <div class="form-group">
    <label for="exampleInputEmail1">Last Name</label>
    <input required="" value="<?php echo $lastname;?>" name="lname" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Last Name">
    
  </div>
   <div class="form-group">
    <label for="exampleInputEmail1">DOB</label>
    <input value="<?php echo $dob;?>" required="" name="dob"   type="date"  class="form-control" aria-describedby="emailHelp" placeholder="Last Name">
    
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input required="" value="<?php echo $email;?>" name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input required="" value="<?php echo $password;?>" name="password" type="text  " class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
   <div class="form-group">
    <label for="exampleInputEmail1">Create Employee Code</label>
    <input required="" value="<?php echo $employee_code;?>" name="employee_code" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Last Name">
    
  </div>
  <button name="update" type="submit" class="btn btn-primary">Update</button>
</form>
</body>
</html>

<?php

if(isset($_POST['update']))
{
  
$date=$_POST['dob'];
$firstname=$_POST['fname'];
$lastname=$_POST['lname'];
$email=$_POST['email'];
$password=$_POST['password'];
$employee_code=$_POST['employee_code'];


$sql = "UPDATE employee SET firstname='$firstname', lastname='$lastname',
DOB='$date', email='$email',password='$password',employee_code ='$employee_code'
 WHERE id=$id";

if ($con->query($sql) === TRUE) {
        $msg="Employee Details Updated";
          header("location:manager.php?msg=$msg");
} else {
  echo "Error: " . $sql . "<br>" . $con->error;
}

$con->close();

}

?>