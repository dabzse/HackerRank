SELECT SUM(CITY.Population) AS Asia_Population
FROM CITY
JOIN COUNTRY
    ON CITY.CountryCode = COUNTRY.Code
WHERE COUNTRY.Continent = 'Asia';