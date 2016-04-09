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
$sql = "INSERT INTO `order`(`orderid`, `status`, `Price`, `quantity`, `mobile`, `doo`) VALUES ('$_POST[orderid]', '$_POST[status]', '$_POST[price]','$_POST[quantity]', '$_POST[mobile]', '$_POST[doo]')";
mysql_query($sql,$link);
   // echo "Thank You For Registration <br /> Have a Great day.... " ;

 
// close connection
mysql_close($link);
header("location: dashboardadadmin.html");
echo '<script language="javascript">';
echo 'alert("Successfully Added ")';
echo '</script>';
?>
