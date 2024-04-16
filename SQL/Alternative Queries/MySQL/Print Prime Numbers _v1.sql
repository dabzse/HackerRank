DELIMITER $$

CREATE PROCEDURE prime_numbers()
BEGIN
    DECLARE n INT DEFAULT 2;
    DECLARE k INT;
    DECLARE counter INT;
    DECLARE result TEXT DEFAULT '';

    WHILE n <= 1000 DO
        SET counter = 0;
        SET k = FLOOR(n / 2);
        block1: BEGIN
            DECLARE i INT DEFAULT 2;
            WHILE i <= k DO
                IF MOD(n, i) = 0 THEN
                    SET counter = 1;
                    LEAVE block1;
                END IF;
                SET i = i + 1;
            END WHILE;
        END;

        IF counter = 0 THEN
            SET result = CONCAT(result, n, '&');
        END IF;

        SET n = n + 1;
    END WHILE;

    SELECT SUBSTRING(result, 1, CHAR_LENGTH(result) - 1);
END $$

DELIMITER ;

CALL prime_numbers();