SELECT *
FROM series
WHERE rating > 2.5
ORDER BY rating DESC;

SELECT *
FROM series
WHERE seasons < 5
ORDER BY seasons ASC;

SELECT title 
FROM series
WHERE seasons < 3 OR seasons > 20
ORDER BY 
    seasons, 
    country;