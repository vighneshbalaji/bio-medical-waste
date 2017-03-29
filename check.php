<html lang="en">
<head>
	<title>Check</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="bootstrap.min.css">
<style type="text/css">
.formdiv
{
	border: solid 4px orange;
	border-radius: 3px;
	text-align: center;
	padding: 20px;
}
@font-face {
   font-family: myfont;
   src: url(HARRYP.ttf);
}
.form
{
  font-family:cursive;
  font-size:11pt;
  color:yellow;
}
.chckbx
{
	color:darkgreen;
}
.button {
  display: inline-block;
  border-radius: 4px;
  background-color: #f4511e;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 17px;
  padding: 10px;
  width: 100px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '»';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}
</style>
</head>
<body style="background:url('bg.jpg') fixed; background-repeat: no-repeat;" >
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
	if(isset($_REQUEST['subbtn']))
	{
		title();
		echo "Form is Submit";
		
	$con = mysql_connect("mysql1.000webhost.com","a2177738_vbchat","chat07"); mysql_select_db("a2177738_chat",$con);		
		if( ! $con)
			die("Error to connect");
		
		$air = $_REQUEST['air'];
		$petrol = $_REQUEST['petrol'];
		$medical = $_REQUEST['medical'];
		$space = $_REQUEST['space'];
		$break = $_REQUEST['break'];
		$id = $_SESSION['id'];
		date_default_timezone_set("Asia/Kolkata");
		$date = date("Y/m/d");
		
	    $sql = "INSERT INTO `con`(`air`, `petrol`, `medical`, `space`, `break`, `id`, `date`) VALUES ('$air','$petrol','$medical','$space','$break','$id','$date')";
		
		$qur = mysql_query($sql,$con);
		
		header("Location:customer.php");
		
	}
	else
	{
		title();
?>
<script type="text/Javascript">
	function chcksbt()
	{
	   var flag = 0;
	   document.chckvch.air.style.border = "";
	   document.chckvch.petrol.style.border = "";
	   document.chckvch.medical.style.border = "";
	   document.chckvch.space.style.border = "";
	   document.chckvch.break.style.border = "";
	   if(document.chckvch.air.value == "Select one")
	   {
		document.chckvch.air.focus();
		document.chckvch.air.style.border = "solid 3px red";
		return false;   
	   }
	   if(document.chckvch.petrol.value == "Select one")
	  {
		document.chckvch.petrol.focus();
		document.chckvch.petrol.style.border = "solid 3px red";
		return false;   
	   }
	   if(document.chckvch.medical.value == "Select one")
	   {
		document.chckvch.medical.focus();
		document.chckvch.medical.style.border = "solid 3px red";
		return false;   
	   }
	   if(document.chckvch.space.value == "Select one")
		{
		document.chckvch.space.focus();
		document.chckvch.space.style.border = "solid 3px red";
		return false;   
	    }
	   if(document.break.space.value == "Select one")
		{
		document.chckvch.break.focus();
		document.chckvch.break.style.border = "solid 3px red";
		return false;   
	    }
	}
	
</script>
		<div name="chckfrm" class="formdiv">
		<form name="chckvch" class="form" action="check.php" method="post">
		Air condition &nbsp;&nbsp;&nbsp;<br /><br />
		<select name="air" class="chckbx">
		<option selected>Select one</option>
		<option>Full</option>
		<option>Medium</option>
		<option>Empty</option>
		</select><br /><br />
		Petrol/Diesel condition &nbsp;&nbsp;&nbsp;<br /><br />
		<select name="petrol" class="chckbx">
		<option selected>Select one</option>
		<option>Full</option>
		<option>Medium</option>
		<option>Empty</option>
		</select><br /><br />
		Medical condition &nbsp;&nbsp;&nbsp;<br /><br />
		<select name="medical" class="chckbx">
		<option selected>Select one</option>
		<option>Available</option>
		<option>Not Available</option>
		</select><br /><br />
		There is enough space &nbsp;&nbsp;&nbsp;<br /><br />
		<select name="space" class="chckbx">
		<option selected>Select one</option>
		<option>Yes</option>
		<option>No</option>
		</select><br /><br />
		Break condition &nbsp;&nbsp;&nbsp;<br /><br />
		<select name="break" class="chckbx">
		<option selected>Select one</option>
		<option>Fine</option>
		<option>Not Fine</option>
		</select><br /><br />
		<button type="submit" name="subbtn" class="button" style="vertical-align:middle" onclick="return chcksbt();"><span>Submit</span></button>
		<input type="hidden" size="30" name="usrname1" value="<?php echo $_REQUEST['usrname'];?>" />
		</form>
		</div>

<?php
	}
	
?>
</body>
</html>
