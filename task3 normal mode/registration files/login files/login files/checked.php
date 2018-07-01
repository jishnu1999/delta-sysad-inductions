
<html>
<body>
<?php
session_start();
DEFINE ("host", "localhost");
DEFINE ("username", "jishnu");
DEFINE ("password", "qwerty");
DEFINE ("dbname", "users");
$flag=0;
if(!($flag))
{
	$uname=$_SESSION['username'];
	$pswd=$_SESSION['password'];
}

else
{
	$uname=$_COOKIE["uName"];
	$pswd=$_COOKIE["pwd"];
}

$psswrd=sha1($pswd);
$conn = mysqli_connect(host,username,password,dbname);
	
if($conn->connect_error)
{
	die("connection error:" . $conn->connect_error);
}


$sql="SELECT username , password, fullname , nov FROM details WHERE username = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("s",$uname);
$stmt->execute();

mysqli_stmt_store_result($stmt);
	
if(mysqli_stmt_num_rows($stmt)==1)
{
	$stmt->bind_result($username, $password, $fname, $nov);
	$stmt->fetch();

	if(!(strcmp($password,$psswrd)))
	{
		$n=$nov+1;		
		echo "Welcome ". $fname .",you have visited this page ". $n ." times";
		$sqla="UPDATE details SET nov = ? WHERE username = ?";
		$stmta = $conn->prepare($sqla);
		$stmta->bind_param("is", $n , $uname);
		$stmta->execute();
		$stmta->close(); 	
		setcookie('uName',$uname,time()+(86400));
		setcookie('pwd', $pswd,time()+(86400));		
	
		
	}	
	else
	{
		echo "invalid password";
	}
}
else
{
	echo "invalid username";
}
$stmt->close();
$conn->close();





?>





<form action="logout.php" method="post">
<input type="submit" name="logout" value="Logout">
</form>


</body>
</html>


