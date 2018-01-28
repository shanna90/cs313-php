<?php
session_start();
$books = $_SESSION['books'];
$name = htmlspecialchars($_POST['name']);
$mail = htmlspecialchars($_POST['mail']);
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css">
	<title>Prove 02</title>
	</head>

	<body>
		<nav>
			<ul>
			  <li><a href="home.html">Home</a></li>
			  <li><a href="assignments.html">Assignments</a></li>
			  <li><a href="shopping.html">Browse Items</a></li>
			</ul>
		</nav>
		<h1>Confirmation</h1>
		<p>You have purchased:</p>
		<ul>
		<?php
			foreach ($books as $book)
			{
				$book_clean = htmlspecialchars($book);
				echo "<li><p>$book_clean</p></li><br>";
			}
		?>
		</ul>
		<br>
		<p>To be sent to: </p>
		<?php
			echo "<p>$name</p>";
			echo "<p>$mail</p>"
		?>		
	</body>
</html>