<?php
session_start();
if(!isset($_SESSION["login"])) { header("Location: login.html"); exit; }
?>
<!DOCTYPE html>
<html>
<head>
<title>Home</title>
</head>
<body>
<h2>Welcome <?php echo $_SESSION["user"]; ?></h2>
<a href="logout.php">Logout</a>
</body>
</html>
