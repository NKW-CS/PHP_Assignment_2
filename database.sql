DROP DATABASE IF EXISTS db_crud;
CREATE DATABASE db_crud;

/**/

USE db_crud;

CREATE TABLE guests(
    guestID INT  PRIMARY KEY AUTO_INCREMENT,
    guestName VARCHAR(100),
    guestRoom INT(100)
);

CREATE TABLE users(
    userid INT  PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(100),
    password VARCHAR(100)
);
