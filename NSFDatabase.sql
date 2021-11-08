DROP DATABASE IF EXISTS NSFDatabase;
CREATE DATABASE IF NOT EXISTS NSFDatabase;

USE NSFDatabase;

/*************************************************************
* Name:         Announcements
* Database:     NSFDatabase
* Description:  A table to store announcement for the website
*************************************************************/
CREATE TABLE Announcements (
  ID              INT NOT NULL AUTO_INCREMENT,
  Title           varchar(128) NOT NULL,
  Date_announced	varchar(128) NOT NULL,
  Contents        varchar(128) NOT NULL,
  PRIMARY KEY     (ID)
);

/*************************************************************
* Name:         Projects
* Database:     NSFDatabase
* Description:  A table to store the project information
*************************************************************/
CREATE TABLE Projects (
  ProjectID     INT NOT NULL AUTO_INCREMENT,
  Name          VARCHAR(20) NULL UNIQUE,
  Summary       VARCHAR(256) NOT NULL,
  Availability  VARCHAR(20) NOT NULL,
  Rating        int NOT NULL,
  Clicks        int DEFAULT 0,
  PRIMARY KEY   (ProjectID)
);
/*************************************************************
* Name:         Course
* Database:     NSFDatabase
* Description:  A table to store the user and pass of database
*               access account
*************************************************************/
CREATE TABLE Course (
  CourseID    INT NOT NULL AUTO_INCREMENT,
  Name        VARCHAR(20) NOT NULL UNIQUE,
  Clicks      INT DEFAULT 0,
  PRIMARY KEY (CourseID)
);
/*************************************************************
* Name:         Files
* Database:     NSFDatabase
* Description:  A table to store the file information
*************************************************************/
CREATE TABLE Files (
  FileID      INT NOT NULL AUTO_INCREMENT,
  Location    varchar(128) NOT NULL,
  Clicks			int DEFAULT 0,
  PRIMARY KEY (FileID)
);
/*************************************************************
* Name:         Reviews
* Database:     NSFDatabase
* Description:  A table to store review data
*************************************************************/
CREATE TABLE Reviews (
  ReviewID    INT NOT NULL AUTO_INCREMENT,
  Title       VARCHAR(64) NOT NULL,
  Content     VARCHAR(265) NOT NULL,
  Rating      INT NOT NULL,
  Date        DATE NOT NULL,
  PRIMARY KEY (ReviewID)
);
/*************************************************************
* Name:         MailList
* Database:     NSFDatabase
* Description:  A table to store the email list data
*************************************************************/
CREATE TABLE MailList (
  ListID      INT NOT NULL UNIQUE,
  Email       varchar(128) NOT NULL UNIQUE,
  PRIMARY KEY (ListID)
);
/*************************************************************
* Name:         Users
* Database:     NSFDatabase
* Description:  A table to store the user and pass of database
*               access account
* Access:       Integer for access level, pending   = -1
*                                         Guest     = 0
                                          Auth User = 1
                                          Team      = 2
                                          Webmaster = 3 
*************************************************************/
CREATE TABLE Users (
  UserID      INT NOT NULL AUTO_INCREMENT,
  FirstName   VARCHAR(64) NOT NULL,
  LastName    VARCHAR(64) NOT NULL,
  Email       VARCHAR(128) NOT NULL UNIQUE,
  Salt			  VARCHAR(20) NOT NULL UNIQUE,
  Password    VARCHAR(64) NOT NULL,
  Access      INT DEFAULT -1,
  University  VARCHAR(60) NOT NULL,
  CourseTitle VARCHAR(30) NOT NULL,
  PRIMARY KEY (UserID)
);
/*************************************************************
* Name:         CourseFiles
* Database:     NSFDatabase
* Description:  A table to link Course with Files
*************************************************************/
CREATE TABLE CourseFiles (
  ID          INT NOT NULL AUTO_INCREMENT,
  CourseID    INT NOT NULL,
  FileID      INT NOT NULL,
  PRIMARY KEY (ID),
  FOREIGN KEY (CourseID) REFERENCES Course(CourseID),
  FOREIGN KEY (FileID) REFERENCES Files(FileID)
);
/*************************************************************
* Name:         Users
* Database:     NSFDatabase
* Description:  A table to link Projects with Files
*************************************************************/
CREATE TABLE ProjectFiles (
  ID          INT NOT NULL AUTO_INCREMENT,
  ProjectID    INT NOT NULL,
  FileID      INT NOT NULL,
  PRIMARY KEY (ID),
  FOREIGN KEY (ProjectID) REFERENCES Projects(ProjectID),
  FOREIGN KEY (FileID) REFERENCES Files(FileID)
);
/*************************************************************
* Name:         Users
* Database:     NSFDatabase
* Description:  A table to link Course with Reviews
*************************************************************/
CREATE TABLE CourseReviews (
  ID          INT NOT NULL AUTO_INCREMENT,
  CourseID    INT NOT NULL,
  ReviewID    INT NOT NULL,
  PRIMARY KEY (ID),
  FOREIGN KEY (ReviewID) REFERENCES Reviews(ReviewID),
  FOREIGN KEY (CourseID) REFERENCES Course(CourseID)
);
/*************************************************************
* Name:         Users
* Database:     NSFDatabase
* Description:  A table to link Projects with Reviews
*************************************************************/
CREATE TABLE ProjectReviews (
  ID          INT NOT NULL AUTO_INCREMENT,
  ProjectID   INT NOT NULL,
  ReviewID    INT NOT NULL,
  PRIMARY KEY (ID),
  FOREIGN KEY (ProjectID) REFERENCES Projects(ProjectID),
  FOREIGN KEY (ReviewID) REFERENCES Reviews(ReviewID)
);
/*************************************************************
* Name:         Users
* Database:     NSFDatabase
* Description:  A table to like Files with Reviews
*************************************************************/
CREATE TABLE FileReviews (
  ID          INT NOT NULL AUTO_INCREMENT,
  ReviewID    INT NOT NULL,
  FileID      INT NOT NULL,
  PRIMARY KEY (ID),
  FOREIGN KEY (ReviewID) REFERENCES Reviews(ReviewID),
  FOREIGN KEY (FileID) REFERENCES Files(FileID)
);


-- Insert Statements
INSERT INTO Users (FirstName, LastName, Email, Salt, Password, Access, University, CourseTitle) VALUES ('Chris', 'Lloyd', 'lloydcd@clarkson.edu', 'aNK5PfG3xMeKZLZSxVL7','6b24cc0e60b1629d5cf1b52f3d920cdba97ccf5215a8b7b8fa44c8a9e1da1990', 3, 'Clarkson University', 'EE418 Senior Design');
INSERT INTO Users (FirstName, LastName, Email, Salt, Password, Access, University, CourseTitle) VALUES ('admin', 'user', 'admin', 'YWOJoT7TYnPXv5UqyNsB','ff96223f33f5ef21704cc44b4fc604341f08a7960836a91958030005001a3479', 4, 'Clarkson University', 'EE418');