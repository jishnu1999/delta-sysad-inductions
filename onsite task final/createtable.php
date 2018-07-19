<?php
$file=fopen("test.txt","r")or die ("unable to open file");
$str=fgets($file);
$n=substr_count($str, ' ');
explode(" ",$str);
$flag=0;
echo "enter table name";
$name=fgets(STDIN);

DEFINE ("host", "localhost");
DEFINE ("username", "jishnu");
DEFINE ("password", "qwerty");
DEFINE ("dbname", "users");


$conn = mysqli_connect(host,username,password,dbname);

if($conn->connect_error)
{
	die("connection error:" . $conn->connect_error);
}
$sqla ="select 1 from $name LIMIT 1";
if($conn->query($sqla) !== FALSE)
{

	$flag=1;
	
}

if(!$flag)
{
	$sqlb="CREATE TABLE $name ($str[0] varchar(100))";
	$conn->query($sqlb);
	for($x=1;$x<=$n;$x++)
	{
		$sqlc="ALTER TABLE $name ADD COLUMN $str[$x] AFTER $str[$x-1]";
		$conn->query($sqlc);
	}
}

while(!feof($file))
{
	$stra=fgets($file);
	$n=substr_count($stra, ' ');
	explode(" ",$stra);
	for($d=0;$d<$n;$d++)
	{
		$sqld="INSERT INTO $name ($str[$d]) VALUES ($stra[$d])";
		$conn->query($sqld);
	}
}
	



?>

	
	
	
