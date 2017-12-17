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
$uid=$_SESSION['uid'];
$fid=validate($_POST['fid']);
$query="select * from `request status` where uid=$uid and fid=$fid";
$res=$con->query($query);
	$var=1;

$query="UPDATE `traveller`.`request status`  SET status=1 WHERE uid=$fid and fid=$uid;";
echo "Friends";

$con->query($query);
$query2="select * from photos where uid=$fid";
$res2=$con->query($query2);
if($res2->num_rows==0)
{
	  
}
   else{
	   $pid=1;
	   while($arr=$res2->fetch_array()){
		   if($arr['pid']>$pid){
			   $pid=$arr['pid'];
		   }
	   }
		  
	  $var=1;
	  while($var<=$pid)
	  {
		 
		  $query3="select * from `photos` where (uid=$fid and pid=$var) and `like`=1";
		  $res3=$con->query($query3);
		  /*$con->query($query3);
		  	if($con->errno){
	die("Sorry could not execute query".$con->error);	
	
}*/
		 if($res3->num_rows==0)
		 {
             $like=0;
		  }
		  else
		  {
			  $like=0;
			  while($arr3=$res3->fetch_array()){
				  $like=$like+1;
		   					
		  }
		 }
		  ?>
          <img src="<?php echo "../uploads/".$fid."_".$var.".jpg"?>">
          <input type="submit" name="like" value="LIKE" id="like">
          <div id="like"><?php echo $like ?></div>
          <div id="uid"><?php echo $fid ?></div>
          <div id="fid"><?php echo $uid ?></div>
          <div id="pid"><?php echo $var ?> </div>
          <input type="submit" name="comment" value="COMMENT" id="comment">
   
		  <?php
		  $var=$var+1;
	  }
	 
   }
   ?>
          <script type="text/javascript" src="../js/search.js"></script>
          <script type="text/javascript" src="../js/likes.js"></script>
</body>
</html>