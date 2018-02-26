<html>
<body>

<?php
//get data from form
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$grade = $_POST['grade'];
$teach_ln = $_POST['teach_ln'];

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

$statement = $db->prepare("SELECT * FROM books WHERE 
(overall<= SELECT overall FROM students WHERE (f_name = $f_name AND l_name = $l_name AND grade = $grade AND teacher_id = (SELECT id FROM teachers WHERE l_name = $teach_ln))AND
vocab <= SELECT vocab FROM students WHERE (f_name = $f_name AND l_name = $l_name AND grade = $grade AND teacher_id = (SELECT id FROM teachers WHERE l_name = $teach_ln))AND
decoding_skill<= SELECT decoding_skill FROM students WHERE (f_name = $f_name AND l_name = $l_name AND grade = $grade AND teacher_id = (SELECT id FROM teachers WHERE l_name = $teach_ln))AND
print_density<= SELECT print_density FROM students WHERE (f_name = $f_name AND l_name = $l_name AND grade = $grade AND teacher_id = (SELECT id FROM teachers WHERE l_name = $teach_ln))AND
print_size<= SELECT overall FROM print_size WHERE (f_name = $f_name AND l_name = $l_name AND grade = $grade AND teacher_id = (SELECT id FROM teachers WHERE l_name = $teach_ln))AND
visuals<= SELECT visuals FROM students WHERE (f_name = $f_name AND l_name = $l_name AND grade = $grade AND teacher_id = (SELECT id FROM teachers WHERE l_name = $teach_ln))AND
inference<= SELECT inference FROM students WHERE (f_name = $f_name AND l_name = $l_name AND grade = $grade AND teacher_id = (SELECT id FROM teachers WHERE l_name = $teach_ln))AND
retention<= SELECT retention FROM students WHERE (f_name = $f_name AND l_name = $l_name AND grade = $grade AND teacher_id = (SELECT id FROM teachers WHERE l_name = $teach_ln))AND
(SELECT sports FROM background_profiles WHERE id = 
   (SELECT background_knowledge FROM books))
   <= (SELECT sports FROM background_profiles WHERE id = 
   (SELECT background_knowledge FROM students WHERE
      (f_name = $f_name AND l_name = $l_name AND grade = $grade AND teacher_id = (SELECT id FROM teachers WHERE l_name = $teach_ln))))AND
(SELECT medicine FROM background_profiles WHERE id = 
   (SELECT background_knowledge FROM books))
   <= (SELECT medicine FROM background_profiles WHERE id = 
   (SELECT background_knowledge FROM students WHERE
      (f_name = $f_name AND l_name = $l_name AND grade = $grade AND teacher_id = (SELECT id FROM teachers WHERE l_name = $teach_ln))))AND
(SELECT school_life FROM background_profiles WHERE id = 
   (SELECT background_knowledge FROM books))
   <= (SELECT school_life FROM background_profiles WHERE id = 
   (SELECT background_knowledge FROM students WHERE
      (f_name = $f_name AND l_name = $l_name AND grade = $grade AND teacher_id = (SELECT id FROM teachers WHERE l_name = $teach_ln))))AND
(SELECT home_life FROM background_profiles WHERE id = 
   (SELECT background_knowledge FROM books))
   <= (SELECT home_life FROM background_profiles WHERE id = 
   (SELECT background_knowledge FROM students WHERE
      (f_name = $f_name AND l_name = $l_name AND grade = $grade AND teacher_id = (SELECT id FROM teachers WHERE l_name = $teach_ln))))AND	  
(SELECT life_science FROM background_profiles WHERE id = 
   (SELECT background_knowledge FROM books))
   <= (SELECT life_science FROM background_profiles WHERE id = 
   (SELECT background_knowledge FROM students WHERE
      (f_name = $f_name AND l_name = $l_name AND grade = $grade AND teacher_id = (SELECT id FROM teachers WHERE l_name = $teach_ln))))AND
	  (SELECT earth_space_science FROM background_profiles WHERE id = 
   (SELECT background_knowledge FROM books))
   <= (SELECT earth_space_science FROM background_profiles WHERE id = 
   (SELECT background_knowledge FROM students WHERE
      (f_name = $f_name AND l_name = $l_name AND grade = $grade AND teacher_id = (SELECT id FROM teachers WHERE l_name = $teach_ln))))AND
	  (SELECT literary_allusions FROM background_profiles WHERE id = 
   (SELECT background_knowledge FROM books))
   <= (SELECT literary_allusions FROM background_profiles WHERE id = 
   (SELECT background_knowledge FROM students WHERE
      (f_name = $f_name AND l_name = $l_name AND grade = $grade AND teacher_id = (SELECT id FROM teachers WHERE l_name = $teach_ln))))AND
	  (SELECT ancient_history FROM background_profiles WHERE id = 
   (SELECT background_knowledge FROM books))
   <= (SELECT ancient_history FROM background_profiles WHERE id = 
   (SELECT background_knowledge FROM students WHERE
      (f_name = $f_name AND l_name = $l_name AND grade = $grade AND teacher_id = (SELECT id FROM teachers WHERE l_name = $teach_ln))))AND
	  (SELECT modern_history FROM background_profiles WHERE id = 
   (SELECT background_knowledge FROM books))
   <= (SELECT modern_history FROM background_profiles WHERE id = 
   (SELECT background_knowledge FROM students WHERE
      (f_name = $f_name AND l_name = $l_name AND grade = $grade AND teacher_id = (SELECT id FROM teachers WHERE l_name = $teach_ln))))AND
	  (SELECT the_arts FROM background_profiles WHERE id = 
   (SELECT background_knowledge FROM books))
   <= (SELECT the_arts FROM background_profiles WHERE id = 
   (SELECT background_knowledge FROM students WHERE
      (f_name = $f_name AND l_name = $l_name AND grade = $grade AND teacher_id = (SELECT id FROM teachers WHERE l_name = $teach_ln))))
")
$statment->execute();
while ($row = $statement->fetch(PDO::FETCH_ASSOC))
{
	echo '<p>';
	echo '$row['title'] . ' by ' . $row['author']';
	echo '</p>';
	echo '<img href=\" . $row['image_file'] . \">';
	echo '<br>';
}
?>

</body>
</html>