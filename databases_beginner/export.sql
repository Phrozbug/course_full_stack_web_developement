DROP DATABASE IF EXISTS Sterrenstelsel;

CREATE DATABASE Sterrenstelsel;

USE Sterrenstelsel;

CREATE TABLE planeten (
    naam varchar(255)
);

INSERT INTO planeten (naam)
VALUES ('Zon'), ('Mercurius'), ('Venus'), ('Aarde'), ('Mars');

TRUNCATE TABLE planeten;

ALTER TABLE planeten
ADD diameter int(11),
ADD afstand int(11),
ADD massa int(11);

INSERT INTO planeten (naam, diameter, afstand, massa)
VALUES ('Zon', 1392000, 0, 332946), 
('Mercurius', 4880, 57910000, 0), 
('Venus', 12104, 108208930, 1), 
('Aarde', 12756, 149597870, 1), 
('Mars', 6974, 227936640, 0);

ALTER TABLE planeten
MODIFY COLUMN naam varchar(255) NOT NULL,
MODIFY COLUMN diameter int(11) NOT NULL,
MODIFY COLUMN afstand int(11) NOT NULL,
MODIFY COLUMN massa int(11) NOT NULL;

ALTER TABLE planeten
ADD bezoekdatum date;

INSERT INTO planeten (naam, diameter, afstand, massa, bezoekdatum)
VALUES ('Maan', 3475, 150000000, 0, '1969-01-03');

ALTER TABLE planeten
ADD id int(11) NOT NULL AUTO_INCREMENT,
ADD PRIMARY KEY (id);

INSERT INTO planeten (naam, diameter, afstand, massa)
VALUES ('Mars', 6974, 227936640, 0);

UPDATE planeten 
SET naam = 'Teenalp' 
WHERE id = 7;