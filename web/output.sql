CREATE TABLE books(
id INT NOT NULL UNIQUE PRIMARY KEY,
title VARCHAR NOT NULL,
author VARCHAR,
location VARCHAR NOT NULL,
notes VARCHAR,
genre VARCHAR,
series BOOL NOT NULL,
series_name VARCHAR,
series_position INT,
book_type INT NOT NULL,
book_level VARCHAR(1),
culture VARCHAR,
publication_year INT(4));

CREATE SEQUENCE books_pk START AT 1001;

CREATE TABLE loans(
id INT NOT NULL UNIQUE PRIMARY KEY,
book_id INT NOT NULL UNIQUE FOREIGN KEY references books(id),
name VARCHAR NOT NULL,
contact_info VARCHAR NOT NULL,
due_date DATE);

CREATE SEQUENCE loans_pk START AT 1001;

INSERT INTO books(
books_pk, "The General In His Labyrinth", "Gabriel Garcia Marquez", "Living Room", NULL, "Magical Realism", FALSE, 
NULL, NULL, 1, NULL, "Latin America", 1990
);

INSERT INTO books(
books_pk, "Ressurection", "Leo Tolstoy", "Living Room", NULL, "Realistic Fiction", FALSE, 
NULL, NULL, 1, NULL, "Russian", 1899
);

INSERT INTO books(
books_pk, "Things Fall Apart", "Chinua Achebe", "Living Room", NULL, "Magical Realism", FALSE, 
NULL, NULL, 1, NULL, "African", 1959
);

INSERT INTO books(
books_pk, "Coraline", "Neil Gaiman", "Advanced Children's Box", NULL, "Fantasy", FALSE, 
NULL, NULL, 2, "W", "United States", 2002
);