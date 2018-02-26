<html>
<body>

<?php
//get data from form
$title = $_POST['title'];
$author = $_POST['author'];
$image = $_POST['image'];
$level = $_POST['level']
$vocab = $_POST['vocab'];
$decode = $_POST['decode'];
$print_den = $_POST['print_den'];
$print_size = $_POST['print_size'];
$infer = $_POST['infer'];
$retain = $_POST['retain'];
$visual = $_POST['visual'];
$bk_sport = $_POST['bk_sport'];
$bk_med = $_POST['bk_med'];
$bk_school = $_POST['bk_school'];
$bk_home = $_POST['bk_home'];
$bk_life_sci = $_POST['bk_life_sci'];
$bk_earth_sci = $_POST['bk_earth_sci'];
$bk_lit = $_POST['bk_lit'];
$bk_an_hist = $_POST['bk_an_hist'];
$bk_mod_hist = $_POST['bk_mod_hist'];
$bk_arts = $_POST['bk_arts'];

// default Heroku Postgres configuration URL
$dbUrl = getenv('DATABASE_URL');

$dbopts = parse_url($dbUrl);

print "<p>$dbUrl</p>\n\n";

$dbHost = $dbopts["host"];
$dbPort = $dbopts["port"];
$dbUser = $dbopts["user"];
$dbPassword = $dbopts["pass"];
$dbName = ltrim($dbopts["path"],'/');

print "<p>pgsql:host=$dbHost;port=$dbPort;dbname=$dbName</p>\n\n";

try {
 $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
}
catch (PDOException $ex) {
 print "<p>error: $ex->getMessage() </p>\n\n";
 die();
}

$statement = $db->prepare("INSERT INTO background_profiles 
(sports, medicine  ,school_life  ,home_life  ,life_science  ,earth_space_science  ,literary_allusions  ,ancient_history  ,modern_history  ,the_arts)
VALUES ($bk_sport, $bk_med, $bk_school, $bk_home, $bk_life_sci, $bk_earth_sci, $bk_lit, $bk_an_hist, $bk_mod_hist, $bk_arts)");
$statement->execute();
$statement = $db->prepare("INSERT INTO books 
(image_file, title ,author ,decoding_skill,vocab , background_knowledge,print_density,print_size,inference, visuals, retention, overall) VALUES
($image, $title, $author, $decode, $vocab, 
SELECT * FROM background_profiles WHERE id= (SELECT MAX(id) FROM background_profiles), 
$print_den, $print_size, $infer, $retain, $overall)");
$statement=$db->execute();

echo '<p> You have successfully added $title by $author </p>
?>

</body>
</html>