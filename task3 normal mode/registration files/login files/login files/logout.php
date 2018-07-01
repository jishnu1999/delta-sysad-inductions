<html>
<body>
<?php

setcookie("uName","",time()-(86400));
setcookie("pwd", "",time()-(86400));		
header('Location: login.php');

?>
</body>
</html>
