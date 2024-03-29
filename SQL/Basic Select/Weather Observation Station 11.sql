-- MySQL

SELECT DISTINCT CITY
FROM STATION
WHERE REGEXP_LIKE(UPPER(CITY), '^[^AEIOU]')
    OR REGEXP_LIKE(UPPER(CITY), '[^AEIOU]$');