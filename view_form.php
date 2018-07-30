<?php
	session_start();
	require_once('dbconfig/config.php');
	//phpinfo();
?>
<!DOCTYPE html>
<html>
<head>
<title>Home Page</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div id="main-wrapper">
		<center><h2>Submitted forms</h2></center>
		<center><h3>Welcome <?php echo $_SESSION['username']; ?></h3></center>
	</div>
	<div class="inner_container">	
		<form action = view_form_query.php method="post">
			PIS NO :
        <input type="text" name="PIS_NO" placeholder="PIS NO" required/>
		<button class="login_button" name="view_form" type="submit">View Form</button>
		</form>
</body>
</html>
	
	
		