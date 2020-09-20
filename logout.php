<?php
error_reporting(0);
ob_start();
session_start();
include "config.php";
include "securityfunctions.php";
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php
try{
    session_destroy();
    header("Location:login.php");
}catch (Exception $e){
    echo "<script>alert('Something went wrong. Try again or Contact us.')</script>";
}
?>
</body>
</html>
