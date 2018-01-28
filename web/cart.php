<?php
session_start();
$books = $_POST["books"];
$_SESSION['books'] = $books;
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
		<h1>Cart</h1>
		<ul>
		<?php
			foreach ($books as $book)
			{
				$book_clean = htmlspecialchars($book);
				echo "<li><p>$book_clean</p></li>";
			}
		?>
		</ul>
		<a href="checkout.php">Check Out<a>
		<br>
		<a href="shopping.html">Return to Shopping<a>
	</body>
</html>