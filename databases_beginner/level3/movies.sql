USE `netland`;

CREATE TABLE films (
	id MEDIUMINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    titel VARCHAR(100) NOT NULL,
    duur TIME NOT NULL,
    datum_van_uitkomst DATE,
    land_van_uitkomst VARCHAR(100) NOT NULL,
    omschrijving TEXT NOT NULL,
    idtrailer VARCHAR(255) NOT NULL
);    

INSERT INTO films (titel, duur, datum_van_uitkomst, land_van_uitkomst, omschrijving, idtrailer) 
VALUES ('The Dark Knight', '02:32:00', '2008-07-24', 'VS', 'When the menace known as the Joker wreaks havoc and chaos on the people of Gotham, Batman must accept one of the greatest psychological and physical tests of his ability to fight injustice', 'UwrOQ2pYDxY'),
    ('Pulp Fiction', '02:34:00', '1994-12-1', 'VS', 'The lives of two mob hitmen, a boxer, a gangster and his wife, and a pair of diner bandits intertwine in four tales of violence and redemption.', 's7EdQ4FqbhY'),
    ('The Godfather', '02:55:00', '1972-09-28', 'VS', 'The Godfather follows Vito Corleone, Don of the Corleone family, as he passes the mantel to his unwilling son, Michael.', 'sY1S34973zA'),
    ('Nuovo Cinema Paradiso', '02:35:00', '1990-04-13', 'I', 'A filmmaker recalls his childhood when falling in love with the pictures at the cinema of his home village and forms a deep friendship with the cinemas projectionist.', 'sU-gR459VVg'),
    ('Dune', '02:35:00', '2021-09-16', 'VS', 'Feature adaptation of Frank Herberts science fiction novel about the son of a noble family entrusted with the protection of the most valuable asset and most vital element in the galaxy.', 'n9xhJrPXop4');