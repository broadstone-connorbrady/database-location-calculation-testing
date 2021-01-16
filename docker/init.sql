CREATE SCHEMA IF NOT EXISTS `a-database`;

CREATE USER 'user'@'%' IDENTIFIED BY 'root';
GRANT ALL ON *.* to 'user'@'%';
flush privileges;
