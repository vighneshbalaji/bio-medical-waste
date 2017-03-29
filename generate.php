<html lang="en">
<head>
	<title>Check</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="bootstrap.min.css">
	<style>
	@font-face {
   font-family: myfont;
   src: url(HARRYP.ttf);
}
	</style>
</head>
<body body style="background:url('bg.jpg') fixed; background-repeat: no-repeat;">
	<hr width="80%" color="red"/>
	<p style="font-family:myfont; color:yellow; font-size:20pt; text-align:center;">BIO-MEDICAL WASTE MANAGEMENT</p>
	<hr width="80%" color="red"/>	
	<?php
	
	session_start();
	function details()
	{
	?>
	<form name="entry" method="post" action="generate.php">
	<span style="font-size:13pt; color:red;">Weight</span><br /><br /><input type="text" name="weight" size="20"/><br />
	<span style="font-size:13pt; color:red;">category</span><br /><br /><select name="cat">
	<option value='1'>Category 1</option>
	<option value='2'>Category 2</option>
	<option value='3'>Category 3</option>
	<option value='4'>Category 4</option>
	</select><br /><br />
	<input type="submit" name="qrsbt" value="Generate Qr CODE" />
	</form>
	<?php	
    }
	
	if(isset($_REQUEST['hossbt']))
	{
	  $_SESSION['hos'] = $_REQUEST['hosname'];
	  date_default_timezone_set("Asia/Kolkata");
	  $date = date("Y/m/d");
	  details();	
	}
	else if(isset($_REQUEST['qrsbt']))
	{
		date_default_timezone_set("Asia/Kolkata");
		$date = date("Y/m/d");
		$time = date("h:i:sa");
		include('phpqrcode/phpqrcode.php'); 
		$amnt = $_REQUEST['weight'] * 30;
		$cont = "HOSPITAL NAME: ".$_SESSION['hos']."\nCategory Type: ".$_REQUEST['cat']."\nWASTEAGE WEIGHT: ".$_REQUEST['weight']."kg"."\nAmount: ".$amnt;
		QRcode::png($cont,'out.png',QR_ECLEVEL_L,7); 
		
		echo '<img src="out.png" />';

	$con = mysql_connect("mysql1.000webhost.com","a2177738_vbchat","chat07"); mysql_select_db("a2177738_chat",$con);		
		
		if( ! $con)
			die("Error to connect");
		
		$sql = "INSERT INTO `biodet`(`id`, `hosname`, `date`,`time`, `cat`, `qunty`, `amount`) VALUES ('".$_SESSION['id']."','".$_SESSION['hos']."','$date','$time','".$_REQUEST['cat']."','".$_REQUEST['weight']."','$amnt')";
		
		$qry = mysql_query($sql,$con);
	?><br /><br />
	<form name="entry" method="post" action="generate.php">
	<input type="submit" name="anthsbt" value="Another Details" />	<br /><br />
	<input type="submit" name="mnubt" value="Menu" />	
	</form>
	<?php
	}
	else if(isset($_REQUEST['anthsbt']))
	{
		details();
	}
	else if(isset($_REQUEST['mnubt']))
	{
      header("Location:menu.php");
	}
	else
	{
$con = mysql_connect("mysql1.000webhost.com","a2177738_vbchat","chat07"); mysql_select_db("a2177738_chat",$con);		
		if( ! $con)
			die("Error to connect");
		
		
	$sql = "SELECT * FROM cust WHERE id = '".$_SESSION['id']."'";
	
	if(! $sql)
		die("Error on sql");
	
	$qur = mysql_query($sql,$con);
	?>
	<form name="entry" method="post" action="generate.php">
	<div align="center"><span style="color:skyblue;">HOSPITAL NAME</span><br /><br /><select name="hosname" >
	<option selected>SELECT ONE</option>
	<?php
	while($row = mysql_fetch_array($qur))
	{
		?>
		<option><?php echo $row['hosname'] ?></option>
		<?php

	}	
	?>
	</select><br /><br />
	<input type="submit" name="hossbt" value="Submit" /></div>
	</form>
	<?php

	}
	?>
</body>
</html>