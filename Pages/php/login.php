<!DOCTYPE HTML>
<html>
<head>
<title>Quizes for Aristocracy and Nobles - Login page</title>
</head>
<header>
<h1>Hello, please Login to continue.</h1>
</header>
<body>
<nav>
<ul>
<li><a href="../html/index.html">Home</a>
	<ul>
		<li><a href="logintest2.html">Login</a></li>
	</ul>
</li>
<li><a href="quiz.hmtl">Quiz</a></li>
</ul>
</nav>
<maincontent>
<h3>If you are new, login with the username "user" and the password "password".</h3>
<br>
<form id="logintest2" name="logintest2" action="login.php">
<div>
<?php
session_start();
$error="Processing Login";
require 'DBUtils.php';

if (isset($_POST['submit'])) { // Has the submit button been pressed?
if (empty($_POST['username']) || empty($_POST['password'])) {
	$error = "Login invalid - please enter a Username and Password";
} else {
	
	$conn = getConn();
		//GET LOGIN FIELDS
		$username = $_POST["username"];
		$password = $_POST["password"];
		
		$sql = "SELECT UserID, Username, Password, isAdmin FROM users WHERE Username = '$username' AND Password = '$password'";
		//echo $sql;
		
		$result = mysqli_query($conn,$sql) or die(mysqli_error($conn)) ;
		//$result = $conn->query($sql);
		
		if (mysqli_num_rows($result)>0) {
			// GET the results into $row
			$row = mysqli_fetch_assoc($result);
			
			$isAdmin = $row["isAdmin"];
			$stusername = $row["Username"];
			
			if ($isAdmin=="Y") {
				$error = "<p>Admin Logged In successfully</p>";
			} else {
				$error = "<p>$username Logged in Successfully</p>";
			}
			
			$_SESSION["username"]=$username;
			$_SESSION["password"]=$password;
			$_SESSION["isAdmin"]=$isAdmin;
			
		} else {
			$error = "Invalid Username and Password";
		}
		
		mysqli_close($conn);
}
} else {
	$error = "<p>Login Invalid!</p>";
}
?>
</div>
<span><?php echo $error; ?></span>
</form>
</maincontent>
<footer>
</footer>
</body>
</html>