<?php
session_start();
?>
<html>
<head>

  <title>Quiz Exam</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<style>

.blinking{
	animation:blinkingText 1.2s infinite;
}
 @keyframes blinkingText{
  0%{      color: #FFEB3B; }
  49%{     color: #FF5722; }
  60%{     color: #429600; }
  99%{     color: #e91e1e; }
  100%{    color: #FFF; }
 }
 
</style>
<body style = "background: #607d8b">
  <form action = "logout.php" method="post">

	
	<div class="container text-center" >
	<h1 style="color: white"> Quiz Result</h1>
    <h2 class = "blinking"> <?php echo $_SESSION['username']; ?> Your result</h2>

    <div class="card-header text-center" style = "color:white"><h2>Result</h2></div>
    <div class="card-body">
    	
    	<table border = '1px' width="100%" style = "color:white">
    		<th>Attempt Question</th>
    		<th>Your Score is </th>
    		<tr><?php

if(isset($_POST['sub']))
{ 
$conn=new mysqli('localhost','root','','final');
if($conn->connect_error)
{
	die('Connection Failed...'.$conn->connect_error);
}
if(!empty($_POST['check']))
{
	$i = 27;
	$res= 0;
	  $match = count($_POST['check']);
	 echo "<td>out of 10 you have attempt ".$match." questions</td>";
	 $select = $_POST['check'];
	 //print_r($select);
	$query = "select * from question";
	$data = mysqli_query($conn,$query);
	while($row = mysqli_fetch_assoc($data))
	{
     $check = $row['ans']==$select[$i];
    //echo $row['ans'];
    //echo $select[$i]."<br>";
    if($check)
    {
       $res++;
    } 

    $i++;
        
	}

	echo "<td>".$res."</td>";

}
else 
{
	echo "<b>Please select something..<b>";
}
}
?> </tr>

 </div>  
</div>
</table>

<div class="card-footer text-center">
      
  <input type = "submit" value = "Log Out" class = "btn btn-primary"><br><br>
  </div>
</form>
</body>
</html>





