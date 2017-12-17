<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php
include('function.php');
$con=dbconnect();
session_start();
$fid=validate($_POST['uid']);
$uid=$_SESSION['uid'];
$query="select * from photos where uid=$fid";
$res=$con->query($query);
if($res->num_rows==0)
{
	  
}
   else{
	   $pid=1;
	   while($arr=$res->fetch_array()){
		   if($arr['pid']>$pid){
			   $pid=$arr['pid'];
		   }
	   }
		  
	  $var=1;
	  while($var<=$pid)
	  {
		  ?>
          <img src="<?php echo "../uploads/".$fid."_".$var.".jpg"?>">
		  <?php
		  $var=$var+1;
	  }
   }
?>
<div id="fid"><?php echo $fid.""?></div>

<input type="submit" name="addfriend" value="ADD FRIEND" id="addfriend">
<div id="x"></div>
<script type="text/javascript" src="../js/search.js"></script>
<script type="text/javascript" src="../js/profile.js"></script>
</body>
</html>