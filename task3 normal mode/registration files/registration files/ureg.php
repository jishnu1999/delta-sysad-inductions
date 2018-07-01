<html>
<body>
<?php
$flag=0;
$uName=$_POST["uname"];
$pwd=$_POST["pswd"];
$fName=$_POST["fname"];
$emailId=$_POST["email"];
$ct=0;
if(!((strlen($uName)>=5)&&(strlen($uName)<=10)))
{
	echo "invalid username</br>";
	$flag=1;
}

if(!((preg_match('/[a-zA-Z]/',$pwd))&&(preg_match('/\d/',$pwd))&&(preg_match('/[^a-zA-Z\d]/',$pwd))&&(strlen($pwd)>=5)))
{
	echo "invalid password</br>";
	$flag=1;
}
if(!(filter_var($emailId,FILTER_VALIDATE_EMAIL)))
{
	echo "invalid email address</br>";
	$flag=1;

}
if(!($flag))
{
	DEFINE ("host", "localhost");
	DEFINE ("username", "jishnu");
	DEFINE ("password", "qwerty");
	DEFINE ("dbname", "users");


	$psswrd=sha1($pwd);
	$conn = mysqli_connect(host,username,password,dbname);
	
	if($conn->connect_error)
	{
		die("connection error:" . $conn->connect_error);
	}
	$sql="INSERT IGNORE INTO details VALUES (?,?,?,?,?)";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param("ssssi", $uName, $psswrd, $fName, $emailId, $ct);
	$stmt->execute();
	if (!(mysqli_query($conn,$sql)))
	{
		echo "registration successful";
	}
	$stmt->close();
	$conn->close();


}
		

?>

</body>
</html>
