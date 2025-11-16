<?php
session_start();
$dsn="mysql:host=localhost;dbname=testdb;charset=utf8mb4";
$u="root";
$p="";
$db=new PDO($dsn,$u,$p);
$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$a=$_POST["user"];
$b=$_POST["pass"];
$q=$db->prepare("SELECT * FROM users WHERE username=? OR email=? LIMIT 1");
$q->execute([$a,$a]);
$r=$q->fetch(PDO::FETCH_ASSOC);
if($r && password_verify($b,$r["password"])) {
$_SESSION["login"]=true;
$_SESSION["user"]=$r["username"];
header("Location: home.php");
exit;
} else {
echo "Invalid login";
}
?>
