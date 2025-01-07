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
	
	<div class="container text-center" >
	<h2 style="color: white"> Quiz Test</h2>
    <h2 class = "blinking"> Welcome <?php echo $_SESSION['username']; ?> take a quiz test</h2>
  <div class="card">
  	<form action ="result.php" method = "post" >

<?php

$conn=new mysqli('localhost','root','','final');
if($conn->connect_error)
{
	die('Connection Failed...'.$conn->connect_error);
}
else 
{
$query = "select * from question";
$data = mysqli_query($conn,$query);
while($row=mysqli_fetch_assoc($data))
{
?>
   <div class="card-header"><h3><?php echo $row['qname']?></h3></div>

   <div class="card-body"><span style="float:left"><input type="radio" name="check[<?php echo $row['qid']; ?>]" value= "<?php echo $row['op1'] ?>">
   	<?php echo $row['op1']; ?></span></div>

    <div class="card-body"><span style="float:left"><input type="radio" name="check[<?php echo $row['qid']; ?>]" value= "<?php echo $row['op2'] ?>">
   	<?php echo $row['op2']; ?></span></div>

   	 <div class="card-body"><span style="float:left"><input type="radio" name="check[<?php echo $row['qid']; ?>]" value= "<?php echo $row['op3'] ?>">
   	<?php echo $row['op3']; ?></span></div>

   	 <div class="card-body"><span style="float:left"><input type="radio" name="check[<?php echo $row['qid']; ?>]" value= "<?php echo $row['op4'] ?>">
   	<?php echo $row['op4']; ?></span></div>


<?php 
}
}
?>
<div class = "card-footer text-center">
	<input type = "submit" name = "sub" class = "btn btn-primary"><br><br>
	<a href = 'result.php'>
</div>
</form>
</div>
</body>
</html>