<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>
  <h1>Employee Login</h1>
<form action="" method="POST">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input required="" name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input required="" name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>

  <button name="login" type="submit" class="btn btn-primary">Submit</button>
</form>
</body>
</html>
<?php
require('database.php');

if(isset($_POST['login']))
{
$email =$_POST['email'];
  $password = $_POST['password'];

    if ($email != "" && $password != ""){

        $sql_query = "select count(*) as cntUser from employee where email='".$email."' and password='".$password."'";
        $result = mysqli_query($con,$sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['cntUser'];

        if($count > 0)
        {
            $_SESSION['email'] = $email;
            header('Location: home.php');
        }else{
            echo "Invalid username and password";
        }

    }

}