CREATE TABLE $tables(id MEDIUMINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
					  time DATETIME NOT NULL,
					  site VARCHAR(256) NOT NULL,
					  ipaddr VARCHAR(256) NOT NULL,
					  email VARCHAR(256),
					  abuse VARCHAR(256),
					  admincont VARCHAR(256))