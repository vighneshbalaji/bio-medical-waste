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
   .button {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding:10px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 15px;
    margin: 4px 2px;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    cursor: pointer;
	border-radius:20px;
}
.button1 {
    background-color: white;
    color: black;
    border: 2px solid #f44336;
}

.button1:hover {
    background-color: #f44336;
    color: white;
}
.button2 {
    background-color: white;
    color: black;
    border: 2px solid #008CBA;
}

.button2:hover {
    background-color: #008CBA;
    color: white;
}


	</style>
</head>
<body style="background:url('bg.jpg') fixed; background-repeat: no-repeat;">
	<hr width="80%" color="red"/>
	<p style="font-family:myfont; color:yellow; font-size:20pt; text-align:center;">BIO-MEDICAL WASTE MANAGEMENT</p>
	<hr width="80%" color="red"/>	
	<?php
	session_start();
	
	if(isset($_REQUEST['gener']))
	{
		header("Location:generate.php");
	}
	else if(isset($_REQUEST['cust']))
	{
		header("Location:customer.php");
	}
	else if(isset($_REQUEST['rep']))
	{
		header("Location:report.php");
	}
	else if($_SESSION['id']=="admin")
	{
	?>
	<div align="center">
	<form name="menuopt" action="customer.php" method="post">
	<input type="submit" class="button button1" name="cust" value="Customer details" />	
	</form>
	<form name="menuopt" action="report.php" method="post">
	<input type="submit" class="button button2" name="drep" value="Daily Report" />	<br /><br />
	<input type="submit" class="button button2" name="mrep" value="Monthly Report" />	
	</form>
	</div>
	<?php
	}
	else
	{
	?>
	<div align="center">
	<form name="menuopt" action="generate.php" method="post">
	<input type="submit" class="button button1" name="gener" value="Generate QR" />
	</form>
	<form name="menuopt" action="customer.php" method="post">
	<input type="submit" class="button button2" name="cust" value="Customer details" />	
	</form>
	</div>
	<?php
	}
	
	?>
</body>
</html>