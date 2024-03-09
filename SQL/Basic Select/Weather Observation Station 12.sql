-- MySQL

SELECT DISTINCT(CITY)
FROM STATION
WHERE REGEXP_LIKE(CITY, '^[^AEIOU].*[^AEIOU]$', 'i');