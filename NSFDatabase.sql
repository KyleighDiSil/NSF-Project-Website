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
  Date_announced	DATE NOT NULL,
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
* Name:         Feature
* Database:     NSFDatabase
* Description:  Features for each project
*************************************************************/
CREATE TABLE Feature (
  ID          INT NOT NULL AUTO_INCREMENT,
  ProjectID   INT NOT NULL,
  FileID      INT NOT NULL,
  Name        VARCHAR(20) NULL UNIQUE,
  Summary     VARCHAR(256) NOT NULL,
  GitLink     VARCHAR(128) NOT NULL,
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
INSERT INTO Users (FirstName, LastName, Email, Salt, Password, Access, University, CourseTitle) VALUES ('admin', 'user', 'admin2', 'YWOJoT7TYnPXv5UqyNsf','ff96223f33f5ef21704cc44b4fc604341f08a7960836a91958030005001a3479', 1, 'Clarkson University', 'EE418');
INSERT INTO Users (FirstName, LastName, Email, Salt, Password, Access, University, CourseTitle) VALUES ('admin', 'user', 'admin3', 'YWOJoT7TYnPXv5UqyNsh','ff96223f33f5ef21704cc44b4fc604341f08a7960836a91958030005001a3479', 1, 'Clarkson University', 'EE418');
INSERT INTO COURSE(Name, Clicks) VALUES ("Discrete Math", 40);
INSERT INTO COURSE(Name, Clicks) VALUES ("Intro To CS", 100);
INSERT INTO Reviews(Title, Content, Rating, Date)
VALUES ("Physics", "This is so much fun", 4, 0001-01-01);
INSERT INTO Reviews(Title, Content, Rating, Date)
VALUES ("Chem", "This is not fun at all", 1, 0002-01-01);
INSERT INTO CourseReviews(CourseID, ReviewID) VALUES(1, 1);
INSERT INTO CourseReviews(CourseID, ReviewID) VALUES(2, 2);

INSERT INTO Projects (Name, Summary, Availability, Rating, Clicks) VALUES ("Xfig", "Vector graphics editor on UNIX like platforms, figure libraries and supporting JPG, PNG, EPS.", 0, 4, 69420);
INSERT INTO Projects (Name, Summary, Availability, Rating, Clicks) VALUES ("Mango", "Web-based (Tomcat, Ajax) platform for sensor and M2M control, data acquisition and visualization.", 1, 3, 42069);
INSERT INTO Projects (Name, Summary, Availability, Rating, Clicks) VALUES ("WordPress", "Open-source software for creating website, blog, or app.", 2, 0, 0);
INSERT INTO Projects (Name, Summary, Availability, Rating, Clicks) VALUES ("MuseScore", "Music notation and writing software.", 3, 0, 0);
INSERT INTO Projects (Name, Summary, Availability, Rating, Clicks) VALUES ("VSCode", "Microsoft's open-source code editor.", 3, 0, 0);
INSERT INTO Projects (Name, Summary, Availability, Rating, Clicks) VALUES ("Hunt", "Virtual scavenger hunt mobile app where players can join a game, select a team and solve hints to acquire treasure. The team with the most points wins.", 3, 0, 0);
INSERT INTO Projects (Name, Summary, Availability, Rating, Clicks) VALUES ("iTrust", "Electronic medical records web application that supports patients and medical staff in securely managing healthcare workflows.", 3, 0, 0);
INSERT INTO Projects (Name, Summary, Availability, Rating, Clicks) VALUES ("Qt", "Cross-platform application and UI framework, active developer community.", 3, 0, 0);
INSERT INTO Projects (Name, Summary, Availability, Rating, Clicks) VALUES ("SuperTuxKart", "3D open-source arcade racer with a variety characters, tracks, and modes to play.", 3, 0, 0);
INSERT INTO Projects (Name, Summary, Availability, Rating, Clicks) VALUES ("Mozilla", "Well-known web browser with strong support for software engineering education.", 3, 0, 0);
INSERT INTO Projects (Name, Summary, Availability, Rating, Clicks) VALUES ("WinMerge", "Text file merging and comparison tool for Windows used in software course.", 3, 0, 0);
INSERT INTO Projects (Name, Summary, Availability, Rating, Clicks) VALUES ("Moodle", "Platform for educators/learners to create personalized learning environments.", 3, 0, 0);

INSERT INTO FILES (Location, Clicks) VALUES ("../files/feature-description-vdx.docx", 420);
INSERT INTO FILES (Location, Clicks) VALUES ("../files/feature-description-Undo-Shortcut-Button.docx", 420);
INSERT INTO FILES (Location, Clicks) VALUES ("../files/feature-description-Undo_redo.docx", 420);
INSERT INTO FILES (Location, Clicks) VALUES ("../files/feature-description-Toggle-Unit-Shortcut-Button.docx", 420);
INSERT INTO FILES (Location, Clicks) VALUES ("../files/feature-description-send-to-back.docx", 420);
INSERT INTO FILES (Location, Clicks) VALUES ("../files/feature-description-rotation.docx", 420);
INSERT INTO FILES (Location, Clicks) VALUES ("../files/feature-description-quick-coloring.docx", 420);
INSERT INTO FILES (Location, Clicks) VALUES ("../files/feature-description-free-selection.docx", 420);
INSERT INTO FILES (Location, Clicks) VALUES ("../files/feature-description-Default-depth-value.docx", 420);
INSERT INTO FILES (Location, Clicks) VALUES ("../files/feature-description-Advanced.docx", 420);

INSERT INTO Feature (ProjectID, FileID, Name, Summary, GitLink) VALUES (1,1,"Export to VDX", "Exporting to VDX Format", "http://192.168.0.86:3000/NSF-SE-Repositories/XFig/src/branch/Export-to-VDX");
INSERT INTO Feature (ProjectID, FileID, Name, Summary, GitLink) VALUES (1,2,"Undo Shortcut", "Shortcut Button for Undo", "http://192.168.0.86:3000/NSF-SE-Repositories/XFig/src/branch/Undo-Shortcut");
INSERT INTO Feature (ProjectID, FileID, Name, Summary, GitLink) VALUES (1,3,"Undo/Redo", "Enhanced Undo/Redo", "http://192.168.0.86:3000/NSF-SE-Repositories/XFig/src/branch/Undo/Redo");
INSERT INTO Feature (ProjectID, FileID, Name, Summary, GitLink) VALUES (1,4,"Toggle Units Shortcut", "Shortcut Button for Toggling Unit of Length", "http://192.168.0.86:3000/NSF-SE-Repositories/XFig/src/branch/Toggle-Units-Shortcut");
INSERT INTO Feature (ProjectID, FileID, Name, Summary, GitLink) VALUES (1,5,"Send to Back", "Send to Back & Bring to Front", "http://192.168.0.86:3000/NSF-SE-Repositories/XFig/src/branch/Send-to-Back");
INSERT INTO Feature (ProjectID, FileID, Name, Summary, GitLink) VALUES (1,6,"Rotation Control", "Enhanced Rotation", "http://192.168.0.86:3000/NSF-SE-Repositories/XFig/src/branch/Rotation-Control");
INSERT INTO Feature (ProjectID, FileID, Name, Summary, GitLink) VALUES (1,8,"Free Selection", "Free Selection", "http://192.168.0.86:3000/NSF-SE-Repositories/XFig/src/branch/Free-Selection");
INSERT INTO Feature (ProjectID, FileID, Name, Summary, GitLink) VALUES (1,7,"Quick Coloring", "Quick Coloring", "http://192.168.0.86:3000/NSF-SE-Repositories/XFig/src/branch/Quick-Coloring");
INSERT INTO Feature (ProjectID, FileID, Name, Summary, GitLink) VALUES (1,9,"Default Depth Value", "Auto Increment Default Depth Value", "http://192.168.0.86:3000/NSF-SE-Repositories/XFig/src/branch/Default-Depth-Value");
INSERT INTO Feature (ProjectID, FileID, Name, Summary, GitLink) VALUES (1,10,"Advanced Features", "Advanced Features as extra challanges", "http://192.168.0.86:3000/NSF-SE-Repositories/XFig/src/branch/Advanced-Features");

INSERT INTO Announcements (Date_announced, Title, Contents) VALUES ("2015-03-14", "Title of announcement", "Here is the content of the actual announcement. As you can see it's a larger sentence to test wrapping and elipses. That should have two s's I think. Like Elipsses. Nope that's also wrong. Either way this is a useful announcement as you can see. I hope you feel informed. The rest of these will be randomly generated using Mockaroo ;)");

INSERT INTO Announcements (Date_announced, Title, Contents) VALUES ("2021-05-24", "Speech Pathologist", "Nullam porttitor lacus at turpis. Donec posuere metus vitae ipsum. Aliquam non mauris.");
INSERT INTO Announcements (Date_announced, Title, Contents) VALUES ("2020-12-19", "Software Test Engineer III", "Donec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pharetra, magna vestibulum aliquet ultrices, erat tortor sollicitudin mi, sit amet lobortis sapien sapien non mi. Integer ac neque.");
INSERT INTO Announcements (Date_announced, Title, Contents) VALUES ("2021-04-08", "Director of Sales", "Vestibulum quam sapien, varius ut, blandit non, interdum in, ante. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis faucibus accumsan odio. Curabitur convallis.");
INSERT INTO Announcements (Date_announced, Title, Contents) VALUES ("2021-05-06", "Structural Engineer", "Vestibulum quam sapien, varius ut, blandit non, interdum in, ante. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis faucibus accumsan odio. Curabitur convallis.");
INSERT INTO Announcements (Date_announced, Title, Contents) VALUES ("2021-09-22", "Chief Design Engineer", "Vestibulum ac est lacinia nisi venenatis tristique. Fusce congue, diam id ornare imperdiet, sapien urna pretium nisl, ut volutpat sapien arcu sed augue. Aliquam erat volutpat.");
