<html>
<body>
<?php
session_start();
$uName=$_POST["uname"];
$_SESSION['username']=$uName;
$pwd=$_POST['pswd'];
$_SESSION['password']=$pwd;

$rem=$_POST['rme'];
if(isset($rem))
{
	header("Location:checked.php");	
}
else
{
	header("Location:notchecked.php");
}
?>
</body>
</html>
	

			


