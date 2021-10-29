DROP DATABASE IF EXISTS NSFDatabase;
CREATE DATABASE IF NOT EXISTS NSFDatabase;

USE NSFDatabase;

/*************************************************************
* Name:         Account
* Database:     NSFDatabase
* Description:  A table to store the user and pass of database
*               access account
*************************************************************/
CREATE TABLE Account (
  AccountID INT NOT NULL AUTO_INCREMENT,
  Email         varchar(128)  NULL UNIQUE,
  Salt			varchar(20) NULL UNIQUE,
  Password      varchar(50)   NULL,
  PRIMARY KEY (AccountID)
);

-- Insert Statements
INSERT INTO Account (Email, Salt, Password) VALUES ('lloydcd@clarkson.edu', 'aNK5PfG3xMeKZLZSxVL7','6b24cc0e60b1629d5cf1b52f3d920cdba97ccf5215a8b7b8fa44c8a9e1da1990');
INSERT INTO Account (Email, Salt, Password) VALUES ('admin', 'YWOJoT7TYnPXv5UqyNsB','ff96223f33f5ef21704cc44b4fc604341f08a7960836a91958030005001a3479');