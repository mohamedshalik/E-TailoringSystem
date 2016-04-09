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
			

$s=$_POST['status'];
$oid=$_POST['orderid'];
 
// attempt insert query execution
$sql = "UPDATE `order` SET `status`='$s' WHERE orderid='$oid'";
mysql_query($sql,$link);
   // echo "Thank You For Registration <br /> Have a Great day.... " ;

 
// close connection
mysql_close($link);
header("location: dashboardadadmin.html");
echo '<script language="javascript">';
echo 'alert("updated ")';
echo '</script>';
?>
