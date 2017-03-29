<html lang="en">
<head>
	<title>Login</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="bootstrap.min.css">
	<style type="text/css">
  #logdiv
  {
  border:4px solid #2F4F4F;
  border-radius:20px;
  text-align:center;
  background-color:#79A5E7;
  }
  .button {
  display: inline-block;
  padding: 13px 7px;
  font-size: 15px;
  cursor: pointer;
  text-align: center;
  text-decoration: none;
  outline: none;
  color: #fff;
  background-color: #4CAF50;
  border: none;
  border-radius: 50%;
  box-shadow: 0 5px #999;
}

.button:hover {background-color: #F4511E}

.button:active {
  background-color: #3e8e41;
  box-shadow: 0 3px #666;
  transform: translateY(3px);
}
@font-face {
   font-family: myfont;
   src: url(HARRYP.ttf);
}

  </style>
</head>
<body style="background:url('logbg.jpg') fixed; background-repeat: no-repeat; background-size:100% 100%;">


<?php
	session_start();
function title()
{
	?>
	<hr width="80%" color="red"/>
	<p style="font-family:myfont; color:yellow; font-size:20pt; text-align:center;">BIO-MEDICAL WASTE MANAGEMENT</p>
	<hr width="80%" color="red"/>	
	<?php
}
function mnu()
{
	
	?>
	<form name="loginform" method="post" action="login.php">
	<div id="logdiv">
	<label for="usrname" style="color:#ffffff;">User ID</label> <br /><input type="textbox" size="30" style="border-radius:4px;" name="usrname"  placeholder="Enter Your ID"/><br /><br />
	<label for="usrpass" style="color:#ffffff;">Password</label> <br /><input type="password" size="30" style="border-radius:4px;" name="usrpass" placeholder="Enter Your Password"/><br /><br />
	<input type="submit" name="subbtn" id="subbtn" class="button" value="Login" /><br /><br />
	</div>
	</form>
	<?php
}
	
	if(isset($_REQUEST["subbtn"]))
	{
		$flag = 0; 
		
	    $con = mysql_connect("mysql1.000webhost.com","a2177738_vbchat","chat07"); mysql_select_db("a2177738_chat",$con);
		
		if( ! $con)
			die("Error to connect");
		
		$name = $_REQUEST["usrname"];
		$password = $_REQUEST["usrpass"];
		$_SESSION['id'] = $name;
		
		$sql1 = "SELECT * FROM `usrdet` WHERE id LIKE '$name'";
			
		$qury1 = mysql_query($sql1,$con);
		
		if  (! $qury1)
			die("Error Unable to select") ;
		
		

		
		while($i = mysql_fetch_array($qury1))
		{
			if((strcmp($name,$i['id'])==0)&&(strcmp($password,$i['password'])==0))
			{  
				$flag = 1;
				break;
			}
			
		}
		if($flag == 1)
		{
			   date_default_timezone_set("Asia/Kolkata");
			   $date = date("Y/m/d");
			   $time = date("h:i:sa");
			   $sql2 = "SELECT id,date from daylog where id = '$name' AND date = '$date'";
			   
			   if(! $sql2)
				   die("Sql2 Error");
			   
			  $qur2 = mysql_query($sql2,$con);
			  
			  $nrow = mysql_affected_rows($con);
			   if($name == "admin")
				   $nrow = 2;
			   
			  if($nrow == 1)
				  header("Location:customer.php");
			  else if($nrow == 0)
			  {
				$sql3 = "INSERT INTO daylog (id,date,time) VALUES ('$name','$date','$time')";
				if(! $sql3)
				   die("Sql3 Error");	 	
				$qur3 = mysql_query($sql3,$con);
				header("Location:check.php");
			  }
			  else
				  header("Location:menu.php");
		}
		else if($flag == 0)
		{
			title();
			echo "<p style='text-align:center; color:red;'>Username or password is incorrect</p>";
			mnu();
			
		}
	 
		mysql_close($con);
	
	}
	else
	{
		title();
		mnu();
	}
	
?>
</body>
</html>
