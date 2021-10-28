-- Use mysql -u root < NSFDatabase.sql to call this file

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
  Password      varchar(50)   NULL,
  PRIMARY KEY (AccountID)
);

-- Insert Statements
INSERT INTO Account (Email, Password) VALUES ('lloydcd@clarkson.edu', 'pass');
