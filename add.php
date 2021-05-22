<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>
<form action="" method="POST">
   <div class="form-group">
    <label for="exampleInputEmail1">First Name</label>
    <input required="" name='fname' type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="First Name">
    
  </div>

   <div class="form-group">
    <label for="exampleInputEmail1">Last Name</label>
    <input required="" name="lname" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Last Name">
    
  </div>
   <div class="form-group">
    <label for="exampleInputEmail1">DOB</label>
    <input required="" name="dob"   type="date"  class="form-control" aria-describedby="emailHelp" placeholder="Last Name">
    
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input required="" name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input required="" name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
   <div class="form-group">
    <label for="exampleInputEmail1">Create Employee Code</label>
    <input required="" name="employee_code" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Employee Code">
    
  </div>
  <button name="add" type="submit" class="btn btn-primary">Add</button>
</form>
</body>
</html>

<?php

if(isset($_POST['add']))
{
  
require('database.php');
$date=$_POST['dob'];
$firstname=$_POST['fname'];
$lastname=$_POST['lname'];
$email=$_POST['email'];
$password=$_POST['password'];
$employee_code=$_POST['employee_code'];
$s = "select * from employee where email= '$email'";
$result = mysqli_query($con, $s);
$num = mysqli_fetch_row($result);
if($num==true)
{
$msg="These Employee Details is already Added";
 header("location:manager.php?msg=$msg");
}
else
{
$sql = "INSERT INTO employee (firstname, lastname, DOB,email,password,employee_code)

VALUES ('$firstname', '$lastname', '$date' ,'$email','$password',$employee_code)";

if ($con->query($sql) === TRUE) {
        $msg="New Employee Created";
          header("location:manager.php?msg=$msg");
} else {
  echo "Error: " . $sql . "<br>" . $con->error;
}
}
$con->close();

}

?>