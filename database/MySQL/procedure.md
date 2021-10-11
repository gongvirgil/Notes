# 存储过程


## 循环

DROP PROCEDURE if EXISTS test;
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE test()
BEGIN
	DECLARE i INT;
	SET i=1;
	TRUNCATE test_part;
	WHILE i<= 18000000 DO
		INSERT INTO test_part(id,eid,uid,text,time) VALUES(i,ceil((i%100)/10),i%100,CONCAT('text-',i),i);
		SET i=i+1;
	END WHILE;
END //
DELIMITER ;

CALL test();

## 自动创建分表

DROP PROCEDURE if EXISTS P_createTable;
DELIMITER //
CREATE PROCEDURE P_createTable(masterTableName VARCHAR(30), suffixString VARCHAR(30))
BEGIN
	SET @tbName = masterTableName;
	SET @suffix = suffixString;
	SET @createTableSql = concat('CREATE TABLE ', @tbName, '_', @suffix, ' LIKE ', @tbName);
	PREPARE preSql FROM @createTableSql;
	EXECUTE preSql;
	DEALLOCATE PREPARE preSql;
END //
DELIMITER ;

CALL P_createTable('xxx');

DATE_FORMAT(NOW(), '%Y%m')

DROP EVENT IF EXISTS `E_autoCreateTablePerMonth`;
DELIMITER //
CREATE EVENT `E_autoCreateTable` 
ON SCHEDULE EVERY 1 MONTH STARTS '2020-03-01 00:00:01' 
ON COMPLETION NOT PRESERVE ENABLE DO
BEGIN
    SET @suffix = DATE_FORMAT(NOW(), '%Y%m');
    CALL P_createTable('xxx');
END //
DELIMITER ;

