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
   </style>
</head>
<body style="background:url('bg.jpg') fixed; background-repeat: no-repeat;">
	<hr width="80%" color="red"/>
	<p style="font-family:myfont; color:yellow; font-size:20pt; text-align:center;">BIO-MEDICAL WASTE MANAGEMENT</p>
	<hr width="80%" color="red"/>
	<table border="3" cellspacing="10" cellpadding="10" width="80%" align="center" style="border:5px solid red;">
	<tr>
	<th rowspan="2">Date</th>
	<th rowspan="2">Time of arrival of the vehicle</th>
	<th rowspan="2">Name of hospital</th>
	<th colspan="4">Category-wise  quantity  of  bio-medical waste received in kg</th>
	<th rowspan="2">Total Quantity Recieved</th>	
	<th rowspan="2">Name of the Vehicle driver </th>	
	<th colspan="2">Signatures</th>
	</tr>
	<tr>
	<th>Red</th>
	<th>Blue</th>
	<th>Yellow</th>
	<th>Black</th>
	<th>Vehicle Driver</th>
	<th>Representative of the HCF</th>
	</tr>
	<?php
	if(isset($_REQUEST['drep']))
	{
?>
<p style="font-family:myfont; color:yellow; font-size:20pt; text-align:center;">DAILY REPORT</p>
<?php
		date_default_timezone_set("Asia/Kolkata");
		$date = date("Y/m/d");
			   
	$con = mysql_connect("mysql1.000webhost.com","a2177738_vbchat","chat07"); mysql_select_db("a2177738_chat",$con);		
		if( ! $con)
			die("Error to connect");
		
		$sql1 = 'SELECT id FROM usrdet WHERE id LIKE "b%"';
		
		if(! $sql1)
			die("Error on sql1");
		
		$qur1 = mysql_query($sql1,$con);
		
		while($id = mysql_fetch_array($qur1))
		{
			
			
	         $sql2 = "SELECT hosname FROM cust WHERE id = '".$id['id']."'";
			 
			 $qur2 = mysql_query($sql2,$con);
			 
			 while($hos = mysql_fetch_array($qur2))
			 {		 
				
				$ids = $id['id'];
				$hospi = $hos['hosname'];
				
		        $sql3 = "SELECT * FROM biodet WHERE id = '$ids' AND hosname = '$hospi' AND date = '$date'";
				
				$qur3 = mysql_query($sql3,$con);
				
				$nrow1 = mysql_affected_rows($con);
				
				if($nrow1 > 0)
				{
			        $sam = mysql_fetch_array($qur3);
					$time = $sam['time'];
					?>
					<tr>
					<td><?php echo $date ?></td>
					<td><?php echo $time ?></td>
					<td><?php echo $hos['hosname'] ?></td>
					<?php
					$i = 1;
					$tot = 0;
					
					while($i <= 4)
					{
				       $sql4 = "SELECT qunty FROM biodet WHERE id = '$ids' AND hosname = '$hospi' AND date = '$date' AND cat = '$i'";
					   $qur4 = mysql_query($sql4,$con);
					   
					   $nrow2 = mysql_affected_rows($con);
					   
					   if($nrow2 > 0)
					   {
						 $qntys = mysql_fetch_array($qur4);
						 $tot += $qntys['qunty'];	
				          ?>
						  <td><?php echo $qntys['qunty'] ?></td>
						  <?php
					   }
					   else
					   {
						   ?>
						  <td>0</td>
						  <?php
					   }
					   $i++;
					   
					}
					
					?>
					<td><?php echo $tot ?></td>
					<td><?php echo $id['id'] ?></td>
					<td><?php echo $id['id'] ?></td>
					<td><?php echo $hos['hosname'] ?></td>
					</tr>
					<?php
					
					
				}
				else
					break;
			
		 
		     }
	
		}	
	}
	else if(isset($_REQUEST['mrep']))
	{
?>
<p style="font-family:myfont; color:yellow; font-size:20pt; text-align:center;">Monthly REPORT</p>
<?php
		date_default_timezone_set("Asia/Kolkata");
		$month = date("Y/m");
			   
	$con = mysql_connect("mysql1.000webhost.com","a2177738_vbchat","chat07"); mysql_select_db("a2177738_chat",$con);		
		if( ! $con)
			die("Error to connect");
		
		$sql1 = 'SELECT id FROM usrdet WHERE id LIKE "b%"';
		
		if(! $sql1)
			die("Error on sql1");
		
		$qur1 = mysql_query($sql1,$con);
		
		while($id = mysql_fetch_array($qur1))
		{
			
			
	         $sql2 = "SELECT hosname FROM cust WHERE id = '".$id['id']."'";
			 
			 $qur2 = mysql_query($sql2,$con);
			 
			 while($hos = mysql_fetch_array($qur2))
			 {		 
				
				$ids = $id['id'];
				$hospi = $hos['hosname'];
				  for($d=2;$d<=12;$d++)
				 {

			     if($d < 10)
			     $date = "2016/10/0".$d;
				else
				$date = "2016/10/".$d;

			     $sql3 = "SELECT * FROM biodet WHERE id = '$ids' AND hosname = '$hospi' AND date = '$date'";
				
				$qur3 = mysql_query($sql3,$con);
				
				$nrow1 = mysql_affected_rows($con);
				
				if($nrow1 > 0)
				{
			        $sam = mysql_fetch_array($qur3);
					$time = $sam['time'];
					?>
					<tr>
					<td><?php echo $date ?></td>
					<td><?php echo $time ?></td>
					<td><?php echo $hos['hosname'] ?></td>
					<?php
					$i = 1;
					$tot = 0;
					
					while($i <= 4)
					{
				       $sql4 = "SELECT qunty FROM biodet WHERE id = '$ids' AND hosname = '$hospi' AND date = '$date' AND cat = '$i'";
					   $qur4 = mysql_query($sql4,$con);
					   
					   $nrow2 = mysql_affected_rows($con);
					   
					   if($nrow2 > 0)
					   {
						 $qntys = mysql_fetch_array($qur4);
						 $tot += $qntys['qunty'];	
				          ?>
						  <td><?php echo $qntys['qunty'] ?></td>
						  <?php
					   }
					   else
					   {
						   ?>
						  <td>0</td>
						  <?php
					   }
					   $i++;
					   
					}
					
					?>
					<td><?php echo $tot ?></td>
					<td><?php echo $id['id'] ?></td>
					<td><?php echo $id['id'] ?></td>
					<td><?php echo $hos['hosname'] ?></td>
					</tr>
					<?php
					
					
				}
				else
					break;
				   }
		 
		     }
	
		}	
	}
	?>
	</table>
</body>
</html>