<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Add Title</title>
</head>
<body>
	<nav>
		<ul>
		  <li><a href="home.html">Home</a></li>
		  <li><a href="assignments.html">Assignments</a></li>
		  <li class="dropdown"><a href="library.html">Library</a></li>
			<div class="dropdown-content">
			  <a href="#">Search Books</a>
			  <a href="add_title.html">Add Title</a>
			  <a href="#">Add Student</a>
			</div> 
		</ul>
	</nav>

<?php
//get data from form
$title = $_POST['title'];
$author = $_POST['author'];

function get_db() {
    $db = NULL;
    try {
        // default Heroku Postgres configuration URL
        $dbUrl = getenv('DATABASE_URL');
        if (!isset($dbUrl) || empty($dbUrl)) {
          $dbUrl = "postgres://postgres:piano1990@localhost:5432/library";
        }
        // Get the various parts of the DB Connection from the URL
        $dbopts = parse_url($dbUrl);
        $dbHost = $dbopts["host"];
        $dbPort = $dbopts["port"];
        $dbUser = $dbopts["user"];
        $dbPassword = $dbopts["pass"];
        $dbName = ltrim($dbopts["path"],'/');
        // Create the PDO connection
        $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
        // this line makes PDO give us an exception when there are problems, and can be very helpful in debugging!
        $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    }
    catch (PDOException $ex) {
        // If this were in production, you would not want to echo
        // the details of the exception.
        echo "Error connecting to DB. Details: $ex";
        die();
    }
    return $db;
}

$db = get_db();
echo '<p>Open</p>';

$statement = $db->prepare("SELECT * FROM books WHERE (books.title='$title' OR books.author='$author')");
$statement->execute();
echo '<p>Select</p>';
// Go through each result
while ($row = $statement->fetch(PDO::FETCH_ASSOC))
{
	// The variable "row" now holds the complete record for that
	// row, and we can access the different values based on their
	// name
	echo '<p>';
	echo $row['title'] . ' by ' . $row['author'];
	echo '</p>';
	echo '<img href=' . $row['image_file'] . '>';
	echo '<br>';
}
?>

</body>
</html>