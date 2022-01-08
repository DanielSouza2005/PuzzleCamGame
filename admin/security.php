<?PHP

session_start();

require_once("./connection.php");

$user = $_SESSION["user"];
$password   = $_SESSION["password"];

$sql = "select  
			Login, 
			Password 
		from users
		where Login = '$user' and Password = '$password'";
		
$sql = mysqli_query($con, $sql) or die ("It didn't work :/") ;

$total = mysqli_num_rows($sql);

if ($total == 0) {
	header("Location: ./negated_access.php");
} 

?>




