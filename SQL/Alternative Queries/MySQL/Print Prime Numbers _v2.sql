DELIMITER $$

CREATE PROCEDURE prime_numbers()
BEGIN
    DECLARE counter INT;
    DECLARE k INT;
    DECLARE n INT;
    DECLARE result TEXT;

    SET result = '';
    SET n = 2;
    WHILE n <= 1000 DO
        SET counter = 0;
        SET k = FLOOR(N/2);
        SET @i = 2;
        WHILE @i <= k DO
            IF MOD(N, @i) = 0 THEN
                SET counter = 1;
            END IF;
            SET @i = @i + 1;
        END WHILE;

        IF counter = 0 THEN
            SET result = CONCAT(result, N, '&');
        END IF;

        SET n = n + 1;
    END WHILE;

    SELECT SUBSTRING(result, 1, LENGTH(result) - 1) AS prime_result;
END $$

DELIMITER ;

CALL prime_numbers();
