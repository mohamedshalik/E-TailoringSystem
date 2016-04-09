 <?php
$error='';
//if (isset($_POST['submit'])) {
if (empty($_POST['username']) || empty($_POST['password'])) {
$error = "Username or Password is invalid";
echo 'Username or Password is invalid';
}
else
{
// Define $username and $password
$username=$_POST['username'];
$password=$_POST['password'];
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = mysql_connect('localhost:3306', 'root', '');
// Selecting Database
$db = mysql_select_db("demo", $connection);
if ($_POST['username']=="admin")
{
// SQL query to fetch information of registerd users and finds user match.
$query = mysql_query("select * from tshopadmin where password='$password' ", $connection);
$rows = mysql_num_rows($query);
mysql_free_result($query);
if ($rows == 1) {
echo 'Username or Password ';
header("location: dashboardadadmin.html"); // Redirecting To Other Page
}
else{
$error = "Username or Password is invalid";
echo 'Username or Password is invalid';
}

}
else{
// SQL query to fetch information of registerd users and finds user match.
$query = mysql_query("select * from tshop where password='$password' AND mobile='$username'", $connection);
$rows = mysql_num_rows($query);
mysql_free_result($query);
if ($rows == 1) {
echo 'Username or Password ';
header("location: dashboard.html"); // Redirecting To Other Page
}
else{
$error = "Username or Password is invalid";
echo 'Username or Password is invalid';
}
}
mysql_close($connection); // Closing Connection
}

?>
