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

$destination=validate($_POST['destination']);
$plid=validate($_POST['plid']);

$date=validate($_POST['date']);
$remdate=validate($_POST['remdate']);?>
<input type="text" value ="<?php echo $plid?>" id="plid" name="plid" >
<input type="text" value="<?php echo $destination ?>" id="destination" class="destination" name="destination">
        Date of journey
        <input type="date" value="<?php echo $date ?>" name="date" id="date" >
        Reminder date
        <input type="date" value="<?php echo $remdate ?>" name="remdate" id="remdate" >
         <input type="submit" value="UPDATE" name="update" id="update">
      <script src="../js/search.js"></script>
<script src="../js/edit.js"></script>
	<div id="response"></div>
<?php ?>
</body>
</html>