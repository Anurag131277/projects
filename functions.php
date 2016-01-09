<?php
session_start();
require 'dbconfig.php';
function checkuser($fuid,$ffname,$femail){

	$startq="CREATE TABLE IF NOT EXISTS `Users` (
  			`UID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
 			 `Fuid` varchar(100) NOT NULL,
 			 `Ffname` varchar(60) NOT NULL,
 			 `Fname` varchar(60) NOT NULL,
 			 `Lname` varchar(60) NOT NULL,
 			 `Femail` varchar(60) DEFAULT NULL,
 			 `Jcode` varchar(60) NOT NULL,
 				 PRIMARY KEY (`UID`)
				)";
	mysql_query($startq);

    $check = mysql_query("select * from Users where Fuid='$fuid'");
	$check = mysql_num_rows($check);

	if (empty($check)) { // if new user . Insert a new record
	
		$name=explode(" ",$ffname,2);
		$fname=mysql_real_escape_string($name[0]);
		$lname=mysql_real_escape_string($name[1]);

		$colg_name="JUET";
		$sub_name=strtoupper(substr($fname,0,3));
		$num=mt_rand(100,mt_getrandmax());
		$num=substr($num,0,4);
		$arr=array($colg_name,$sub_name,$num);
		$juet_code=mysql_real_escape_string(trim(implode("-", $arr)));
			
		$query = "INSERT INTO Users (Fuid,Ffname,Fname,Lname,Femail,Jcode) VALUES ('$fuid','$ffname','$fname','$lname','$femail','$juet_code')";
		mysql_query($query);	
	} else 
	{   // If Returned user . update the user record		
	$query = "UPDATE Users SET `Ffname`='$ffname', `Femail`='$femail' where `Fuid`='$fuid'";
	mysql_query($query);
	}


	$qu="SELECT `Jcode` from users WHERE `Fuid`='$fuid'";
		if($qry_run=mysql_query($qu)){
			$row_num=mysql_num_rows($qry_run);
			if($row_num==1){
				$row=mysql_fetch_assoc($qry_run);
				$code=$row['Jcode'];
			}
		}
		$_SESSION['JCODE']=$code;

}

?>
