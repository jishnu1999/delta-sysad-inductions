<?php

if(isset($_COOKIE["uName"]))
{
	header('Location: checked.php');
}


?>
<html>
<head>
<title>user login</title>
</head>
<body>

<form action="redirection.php" method="post">
<b>Username:</b><br />
<input type="text" name="uname"><br />
<b>Password:</b><br />
<input type="text" name="pswd"><br />
<b>Remember Me</b> 
<input type="checkbox" name="rme" value="remval"><br />
<input type="submit" name="login" value="Login">
</form>

</body>
</html>

