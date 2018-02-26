CREATE TABLE teachers(
	id SERIAL NOT NULL PRIMARY KEY, 
	f_name VARCHAR(20) NOT NULL,
	l_name VARCHAR(20) NOT NULL
);

CREATE TABLE background_profiles(
	id SERIAL NOT NULL PRIMARY KEY,
	sports INT, 
	medicine INT,
	school_life INT,
	home_life INT,
	life_science INT,
	earth_space_science INT,
	literary_allusions INT,
	ancient_history INT,
	modern_history INT,
	the_arts INT
);

CREATE TABLE students
(
	id SERIAL NOT NULL PRIMARY KEY, 
	f_name VARCHAR(20) NOT NULL,
	l_name VARCHAR(20) NOT NULL,
	grade SMALLINT NOT NULL,
	teacher_id INT NOT NULL REFERENCES teachers(id),
	decoding_skill INT,
	vocab INT, 
	background_knowledge INT REFERENCES background_profiles(id),
	print_density INT,
	print_size INT,
	inference INT, 
	visuals INT, 
	retention INT,
	overall INT
);

CREATE TABLE books(
	id SERIAL NOT NULL PRIMARY KEY,
	image_file VARCHAR, 
	title VARCHAR NOT NULL,
	author VARCHAR NOT NULL,
	decoding_skill INT,
	vocab INT, 
	background_knowledge INT REFERENCES background_profiles(id),
	print_density INT,
	print_size INT,
	inference INT, 
	visuals INT, 
	retention INT,
	overall INT
);
INSERT INTO books(image_file, title, author, decoding_skill, vocab, background_knowledge, 
print_density, print_size, inference, visuals, retention, overall) VALUES
('Abraham_Lincoln_ProWrestler.jpg', 'Abraham Lincoln ProWrestler', 'Steve Sheinkin', 
SELECT trunc(random() * 40 + 1), SELECT trunc(random() * 40 + 1), SELECT trunc(random() * 40 + 1),
SELECT trunc(random() * 40 + 1), SELECT trunc(random() * 40 + 1), SELECT trunc(random() * 40 + 1),
SELECT trunc(random() * 40 + 1), SELECT trunc(random() * 40 + 1), SELECT trunc(random() * 40 + 1)),
('Bad_Kitty.jpg', 'Bad Kitty', 'Nick Bruel',
SELECT trunc(random() * 40 + 1), SELECT trunc(random() * 40 + 1), SELECT trunc(random() * 40 + 1),
SELECT trunc(random() * 40 + 1), SELECT trunc(random() * 40 + 1), SELECT trunc(random() * 40 + 1),
SELECT trunc(random() * 40 + 1), SELECT trunc(random() * 40 + 1), SELECT trunc(random() * 40 + 1)),
('Dear_Girl.jpg', 'Dear Girl', 'Rosenthal',
SELECT trunc(random() * 40 + 1), SELECT trunc(random() * 40 + 1), SELECT trunc(random() * 40 + 1),
SELECT trunc(random() * 40 + 1), SELECT trunc(random() * 40 + 1), SELECT trunc(random() * 40 + 1),
SELECT trunc(random() * 40 + 1), SELECT trunc(random() * 40 + 1), SELECT trunc(random() * 40 + 1)),
('Dogman_and_Catkid.jpg', 'Dogman and Catkid', 'Dav Pilkey',
SELECT trunc(random() * 40 + 1), SELECT trunc(random() * 40 + 1), SELECT trunc(random() * 40 + 1),
SELECT trunc(random() * 40 + 1), SELECT trunc(random() * 40 + 1), SELECT trunc(random() * 40 + 1),
SELECT trunc(random() * 40 + 1), SELECT trunc(random() * 40 + 1), SELECT trunc(random() * 40 + 1)),
('Dragons_Love_Tacos.jpg', 'Dragons Love Tacos', 'Adam Rubin'
SELECT trunc(random() * 40 + 1), SELECT trunc(random() * 40 + 1), SELECT trunc(random() * 40 + 1),
SELECT trunc(random() * 40 + 1), SELECT trunc(random() * 40 + 1), SELECT trunc(random() * 40 + 1),
SELECT trunc(random() * 40 + 1), SELECT trunc(random() * 40 + 1), SELECT trunc(random() * 40 + 1)),
('From_the_Heart_of_Africa.jpg','From the Heart of Africa', 'Eric Walters'
SELECT trunc(random() * 40 + 1), SELECT trunc(random() * 40 + 1), SELECT trunc(random() * 40 + 1),
SELECT trunc(random() * 40 + 1), SELECT trunc(random() * 40 + 1), SELECT trunc(random() * 40 + 1),
SELECT trunc(random() * 40 + 1), SELECT trunc(random() * 40 + 1), SELECT trunc(random() * 40 + 1)),
('Harry_Potter.jpg', 'Harry Potter', 'J.K. Rowling'
SELECT trunc(random() * 40 + 1), SELECT trunc(random() * 40 + 1), SELECT trunc(random() * 40 + 1),
SELECT trunc(random() * 40 + 1), SELECT trunc(random() * 40 + 1), SELECT trunc(random() * 40 + 1),
SELECT trunc(random() * 40 + 1), SELECT trunc(random() * 40 + 1), SELECT trunc(random() * 40 + 1))
('If_Animals_Kissed_Goodnight.jpg', 'If Animals Kissed Goodnight', 'Ann Whitford Paul',
SELECT trunc(random() * 40 + 1), SELECT trunc(random() * 40 + 1), SELECT trunc(random() * 40 + 1),
SELECT trunc(random() * 40 + 1), SELECT trunc(random() * 40 + 1), SELECT trunc(random() * 40 + 1),
SELECT trunc(random() * 40 + 1), SELECT trunc(random() * 40 + 1), SELECT trunc(random() * 40 + 1));

INSERT INTO teachers (f_name, l_name) VALUES
('Steve', 'McMillen'),
('Amelia', 'Bedelia'),
('Minerva', 'McGonegal');

INSERT INTO students (f_name, l_name, grade, teacher_id, decoding_skill, vocab, background_knowledge, 
print_density, print_size, inference, visuals, retention, overall) VALUES
('Jack', 'Sprat', 3, 1, 
SELECT trunc(random() * 40 + 1), SELECT trunc(random() * 40 + 1), SELECT trunc(random() * 40 + 1),
SELECT trunc(random() * 40 + 1), SELECT trunc(random() * 40 + 1), SELECT trunc(random() * 40 + 1),
SELECT trunc(random() * 40 + 1), SELECT trunc(random() * 40 + 1), SELECT trunc(random() * 40 + 1)),
('Mary', 'Contrary', 2, 2,
SELECT trunc(random() * 40 + 1), SELECT trunc(random() * 40 + 1), SELECT trunc(random() * 40 + 1),
SELECT trunc(random() * 40 + 1), SELECT trunc(random() * 40 + 1), SELECT trunc(random() * 40 + 1),
SELECT trunc(random() * 40 + 1), SELECT trunc(random() * 40 + 1), SELECT trunc(random() * 40 + 1)),
('George', 'Washington', 1, 3,
SELECT trunc(random() * 40 + 1), SELECT trunc(random() * 40 + 1), SELECT trunc(random() * 40 + 1),
SELECT trunc(random() * 40 + 1), SELECT trunc(random() * 40 + 1), SELECT trunc(random() * 40 + 1),
SELECT trunc(random() * 40 + 1), SELECT trunc(random() * 40 + 1), SELECT trunc(random() * 40 + 1));

FOR i IN 1...40 LOOP
INSERT INTO background_profiles VALUES
(i, SELECT trunc(random() * 40 + 1), SELECT trunc(random() * 40 + 1),
SELECT trunc(random() * 40 + 1), SELECT trunc(random() * 40 + 1), SELECT trunc(random() * 40 + 1),
SELECT trunc(random() * 40 + 1), SELECT trunc(random() * 40 + 1), SELECT trunc(random() * 40 + 1),
SELECT trunc(random() * 40 + 1), SELECT trunc(random() * 40 + 1))
END LOOP;