<?php include('config.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Password Reset PHP</title>
	<link rel="stylesheet" href="main.css">
</head>
<body>

	<form class="login-form" action="auth-login-basic.php" method="post" style="text-align: center;">
		
        <?php 
        $mail= $_GET['email'];
        echo "<script>alert('A password reset link was sent to $mail Please login into your email account and click on the link we sent to reset your password');</script>";  
        echo "<script>window.location.href = 'auth-login-basic.php'</script>";
        //header('location: auth-login-basic.php');

        ?>
	</form>
		
</body>
</html>