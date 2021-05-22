<!DOCTYPE html>
<?php 
require ('database.php');

?>
<html>
<head>
	<title></title>
	<style>
body {
  background-color:#f0f0f0;
font-family:'Lato', sans-serif;
}

section {
  width:200px;
  display: block;
  margin: 0 auto;
  padding: 80px 0;
}

.btn {
outline:none;
background-color: transparent;
padding: 3px; /* Space between the two borders */
width: 200px;
cursor:pointer;
display: inline-block;
border: 2px solid #1d1d1d;
-webkit-user-select:none;
-moz-user-select:none;
user-select:none;
z-index:999;
position: relative;
text-decoration: none;
  line-height: 40px;

}

.btn span {
outline:none;
line-height: 40px;
height: 40px;
-webkit-transition:all .05s ease-in;
-moz-transition:all .05s ease-in;
-o-transition:all .05s ease-in;
transition:all .05s ease-in;
border: 2px solid #1d1d1d;
display: block;
color:#1d1d1d;
font-weight: 900;
text-transform: uppercase;
font-size: 14px;
letter-spacing:1px;
text-align: center;
background-color:#fff;
z-index:99;

}

.btn span:hover {
background-color:#ff5c5c;
}

.btn:active{
outline:none;
-webkit-transform:translateY(3px);
-moz-transform:translateY(3px);
-ms-transform:translateY(3px);
-o-transform:translateY(3px);
transform:translateY(3px);
text-decoration:none;}

.btn-two {
  background-color:#ff5c5c;
  -webkit-box-shadow:inset 2px 2px 0 0 #fff, 2px 2px 0 0 #ffada8;
box-shadow:inset 2px 2px 0 0 #fff, 2px 2px 0 0 #ffada8;
color:#1d1d1d;
font-weight: 900;
text-transform: uppercase;
font-size: 14px;
letter-spacing:1px;
text-align: center;
}


.btn-three {
  background-color:#ff5c5c;
  -webkit-box-shadow:inset 2px 2px 0 0 #fff, 3px 3px 0 0 #1d1d1d;
box-shadow:inset 2px 2px 0 0 #fff, 3px 3px 0 0 #1d1d1d;
color:#1d1d1d;
font-weight: 900;
text-transform: uppercase;
font-size: 14px;
letter-spacing:1px;
text-align: center;
}

.border {
  border: 2px solid #f0f0f0;
}

.shadow-one {
 -webkit-box-shadow:inset 2px 2px 0 0 #ff5c5c, 2px 2px 0 0 #ffada8;
box-shadow:inset 2px 2px 0 0 #ff5c5c, 2px 2px 0 0 #ffada8;
}

.shadow-two {
 -webkit-box-shadow:inset 2px 2px 0 0 #ff5c5c, 3px 3px 0 0 #1d1d1d;
box-shadow:inset 2px 2px 0 0 #ff5c5c, 3px 3px 0 0 #1d1d1d;
}
<?php 
  $email=$_SESSION['email'];
    $query = "SELECT * FROM employee WHERE email ='$email'";
     $result = mysqli_query($con,$query);

    while ($row = mysqli_fetch_assoc($result))
    {  
  $firstname=$row['firstname'];
    $lastname=$row['lastname'];
}
  ?>
	</style>
</head>
<body>
<section>
<p> <?php echo $firstname?> <?php echo $lastname;?> is Login in Sucessfully</p>
</section>

<section>
<a href="logout.php" class="btn"><span>Log out</span></a>
</section>

</body>
</html>