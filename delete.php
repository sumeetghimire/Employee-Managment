<?php
require('database.php');
$id=$_GET['id'];
$sql = "DELETE FROM employee WHERE id=$id";

if ($con->query($sql) === TRUE) {
  $msg="Employee Details Deleted";
  header("location:manager.php?msg=$msg");


} else {

  $msg= "Error deleting record: " . $conn->error;
    header("location:manager.php?msg=$msg");
}