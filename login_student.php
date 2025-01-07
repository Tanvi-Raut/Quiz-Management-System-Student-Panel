<?php
session_start();
$conn = new mysqli('localhost','root','','final');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

else 
 {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $query="select * from student_registration where username ='$username' and password='$password'";
  $result=$conn->query($query);


  if($result->num_rows ==1)
  {

     $_SESSION['username']=$username;
     header("Location: home_student.html");
     exit; 
  }
  else
  {
     echo"<script> alert('Invalid user name or password');</script>";
     echo "<a href='login_student.html'>Try again</a>";
  }
}

?>