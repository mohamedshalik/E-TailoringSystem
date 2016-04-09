<?php
   
   
   $conn = mysql_connect('localhost:3306', 'root', '');
   
   if(! $conn ) {
      die('Could not connect: ' . mysql_error());
   }
   
   $sql = 'SELECT * FROM tshop ';
   mysql_select_db('demo');
   $retval = mysql_query( $sql, $conn );
   
   if(! $retval ) {
      die('Could not get data: ' . mysql_error());
   }
   
   while($row = mysql_fetch_array($retval, MYSQL_ASSOC)) {
      echo "First Name :{$row['first_name']}  <br> ".
         "Last Name : {$row['last_name']} <br> ".
         "Email : {$row['email_address']} <br> ".
		 "Date Of Birth :{$row['dob']}  <br> ".
         "Primary Address : {$row['primary_address']} <br> ".
         "City : {$row['city']} <br> ".
		 "State :{$row['state']}  <br> ".
         "Mobile : {$row['mobile']} <br> ".
         "Date Of Joining : {$row['doj']} <br> ".
         "--------------------------------<br>";
   }
   
   echo "Fetched data successfully\n";
   
   mysql_close($conn);
?>