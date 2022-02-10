CREATE TABLE media ( id int PRIMARY KEY AUTO_INCREMENT, mediatype enum('serie','film'), title varchar(255), rating varchar(255), description varchar(255), awards int, duration int, releasedate date, seasons int, country varchar(255), lang enum('EN', 'NL'), trailerid varchar(255) );

INSERT INTO media (mediatype, title, rating, description, awards, duration, releasedate, seasons, country, lang, trailerid) VALUES
('serie', 'The good place', '4', 'De serie gaat over een vrouw, Eleanor Shellstrop, die zich in het hiernamaals bevindt.', '0', '0', '2017-9-21', '4', 'UK', 'EN', ' ')

INSERT INTO media (mediatype, title, rating, description, awards, duration, releasedate, seasons, country, lang, trailerid) VALUES
('film', 'The Dark Knight', '5', 'When the menace known as the Joker wreaks havoc and chaos on the people of Gotham, Batman must accept one of the greatest psychological and physical tests of his ability to fight injustice', '1', '152', '2008-07-24', '0', 'US', 'EN', 'UwrOQ2pYDxY')






