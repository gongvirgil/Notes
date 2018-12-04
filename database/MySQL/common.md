# common

DROP DATABASE IF EXISTS `common`;
CREATE DATABASE IF NOT EXISTS `common` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `common`;
SET GLOBAL log_bin_trust_function_creators=TRUE;

## isColumnExists

DROP FUNCTION IF EXISTS `isColumnExists`;
CREATE DEFINER=`root`@`localhost` FUNCTION `isColumnExists`(table_IN VARCHAR(255) CHARSET utf8, column_IN VARCHAR(255) CHARSET utf8) 
RETURNS int(11)
RETURN (
	SELECT COUNT(COLUMN_NAME) FROM INFORMATION_SCHEMA.columns WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = table_IN AND COLUMN_NAME = column_IN
);

## isIndexExists

DROP FUNCTION IF EXISTS `isIndexExists`;
CREATE DEFINER=`root`@`localhost` FUNCTION `isIndexExists`(table_IN VARCHAR(255) CHARSET utf8, index_IN VARCHAR(255) CHARSET utf8) 
RETURNS int(11)
RETURN (
	SELECT COUNT(INDEX_NAME) FROM INFORMATION_SCHEMA.statistics WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = table_IN AND INDEX_NAME = index_IN
);

## addColumn

DROP PROCEDURE IF EXISTS `addColumn`;
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `addColumn`(IN table_IN VARCHAR(255), IN column_IN VARCHAR(255), IN constraints_IN VARCHAR(255))
BEGIN
	SET @isColumnExists = isColumnExists(table_IN, column_IN);
	IF (@isColumnExists = 0) THEN
		SET @sql = CONCAT('ALTER TABLE ', table_IN, ' ', 'ADD COLUMN', ' ', column_IN, ' ', constraints_IN);
		PREPARE statement FROM @sql;
		EXECUTE statement;
		DEALLOCATE PREPARE statement;
	END IF;
END //
DELIMITER ;

## dropColumn

DROP PROCEDURE IF EXISTS `dropColumn`;
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `dropColumn`(IN table_IN VARCHAR(255), IN column_IN VARCHAR(255))
BEGIN
    SET @isColumnExists = isColumnExists(table_IN, column_IN);
    IF (@isColumnExists != 0) THEN
        SET @sql = CONCAT('ALTER TABLE ', table_IN, ' ', 'DROP COLUMN', ' ', column_IN);
		PREPARE statement FROM @sql;
		EXECUTE statement;
		DEALLOCATE PREPARE statement;
    END IF;
END //
DELIMITER ;

## addIndex

DROP PROCEDURE IF EXISTS `addIndex`;
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `addIndex`(IN table_IN VARCHAR(255) , IN index_IN VARCHAR(255) , IN fields_IN VARCHAR(255) ) 
BEGIN
	SET @isIndexExists = isIndexExists(table_IN, index_IN);
	IF (@isIndexExists = 0) THEN
		SET @sql = CONCAT('ALTER TABLE ', table_IN, ' ', 'ADD INDEX', ' ', index_IN, ' ', fields_IN);
		PREPARE statement FROM @sql;
		EXECUTE statement;
		DEALLOCATE PREPARE statement;
	END IF;
END //
DELIMITER ;

## addUniqueKey

DROP PROCEDURE IF EXISTS `addUniqueKey`;
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `addUniqueKey`(IN table_IN VARCHAR(255) , IN index_IN VARCHAR(255) , IN fields_IN VARCHAR(255) ) 
BEGIN
	SET @isIndexExists = isIndexExists(table_IN, index_IN);
	IF (@isIndexExists = 0) THEN
		SET @sql = CONCAT('ALTER TABLE ', table_IN, ' ', 'ADD UNIQUE', ' ', index_IN, ' ', fields_IN);
		PREPARE statement FROM @sql;
		EXECUTE statement;
		DEALLOCATE PREPARE statement;
	END IF;
END //
DELIMITER ;

## dropIndex

DROP PROCEDURE IF EXISTS `dropIndex`;
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `dropIndex`(IN table_IN VARCHAR(255), IN index_IN VARCHAR(255))
BEGIN
    SET @isIndexExists = isIndexExists(table_IN, index_IN);
    IF (@isIndexExists != 0) THEN
        SET @sql = CONCAT('ALTER TABLE ', table_IN, ' ', 'DROP INDEX', ' ', index_IN);
		PREPARE statement FROM @sql;
		EXECUTE statement;
		DEALLOCATE PREPARE statement;
	END IF;
END //
DELIMITER ;