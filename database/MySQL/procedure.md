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