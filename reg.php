<?php

$link = mysql_connect('localhost:3306', 'root', '');
 
 $dbSelected = @mysql_select_db('demo',$link);

			$dbSuccess = true;
			// Check connection
			if ($link) {
				if (!$dbSelected) {
					echo "DB connection FAILED<br /><br />";
					$dbSuccess = false;
				}		
			} else {
				echo "MySQL connection FAILED<br /><br />";
				$dbSuccess = false;
			}
			


 
// attempt insert query execution
$sql = "INSERT INTO tshop (first_name,last_name,email_address,dob,primary_address,city,state,mobile,employment_status,doj,password) VALUES ('$_POST[first_name]', '$_POST[last_name]', '$_POST[email]','$_POST[dob]', '$_POST[primary_address]', '$_POST[city]','$_POST[state]', '$_POST[mobile]', '$_POST[employment_status]','$_POST[doj]','$_POST[password]')";
mysql_query($sql,$link);
   // echo "Thank You For Registration <br /> Have a Great day.... " ;

 
// close connection
mysql_close($link);

?>
<html>
<body>
<span style="font-size:27px;">
<br><br><br><br><br><center>
Thank You For Registration <br /> Have a Great day....</center></span>
<?php
header("location:login.php");
?>
</body>
</html>
