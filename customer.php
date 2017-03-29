<html lang="en">
<head>
	<title>Check</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="bootstrap.min.css">
	<style type="text/css">
	@font-face {
   font-family: myfont;
   src: url(HARRYP.ttf);
}
th
{
	
	font-family:cursive;
	font-size:13pt;
	color:skyblue;
	text-align:center;
}
td
{
	font-family:cursive;
	font-size:13pt;
	color:pink;
	
	
}
.button {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
}
.button2:hover {
    box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
}


	</style>
</head>
<body style="background:url('bg.jpg') fixed; background-repeat: no-repeat;">
	<form name="cust" method="post" action="menu.php">
	<table border="3" cellspacing="10" cellpadding="10" width="80%" align="center" style="border:5px solid red;">
	<tr>
	<th>Hospital Name</th>
	<th>Hospital Address</th>
	<th>Phone No</th>
	<?php
	session_start();
	if($_SESSION['id']=="admin")
	{
	?>
	<th>Driver ID</th>
	<?php
	}
	?>
	</tr>
	<?php
		function title()
{
	?>
	<hr width="80%" color="red"/>
	<p style="font-family:myfont; color:yellow; font-size:20pt; text-align:center;">BIO-MEDICAL WASTE MANAGEMENT</p>
	<hr width="80%" color="red"/>	
	<p style="font-family:myfont; color:yellow; font-size:20pt; text-align:center;">CUSTOMER DETAILS</p>
	<?php
}
    title();
$con = mysql_connect("mysql1.000webhost.com","a2177738_vbchat","chat07"); mysql_select_db("a2177738_chat",$con);		
		if( ! $con)
			die("Error to connect");
		
	if($_SESSION['id'] == "admin")
	$sql = "SELECT * FROM cust ";
	else
	$sql = "SELECT * FROM cust WHERE id = '".$_SESSION['id']."'";
	
	if(! $sql)
		die("Error on sql");
	
	$qur = mysql_query($sql,$con);
	
	while($row = mysql_fetch_array($qur))
	{
		?>
		<tr>
		<td><?php echo $row['hosname'] ?></td>
		<td><?php echo $row['hosadd'] ?></td>
		<td><?php echo $row['phno'] ?></td>
		<?php
		if($_SESSION['id'] == "admin")
		{
		?>
		<td><?php echo $row['id'] ?></td>
		<?php
		}
		?>
		</tr>
		<?php

	}	

	?>
	</table><br /><br />
	<div align="center"><input type="submit" name="subbtn" class="button button2" value="menu" /></div>
	</form>
</body>
</html>