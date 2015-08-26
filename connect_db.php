<?

$host = "localhost";
$username = "moyersof_blanker";
$password = "1M=U%e8axTNe";
$db_name = "moyersof_blank";

$con = mysqli_connect($host, $username, $password, $db_name);
if (mysqli_connect_errno()) {
	die("Failed to connect to MySQL: " . mysqli_connect_error());
} else {
	mysqli_select_db($con, $db_name);
}

?>