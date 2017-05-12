DROP DATABASE IF EXISTS dbproject;

CREATE DATABASE dbproject;

USE ;

CREATE TABLE `User` (
  `Username` varchar(45) NOT NULL,
  `Password` varchar(45) NOT NULL,
  `FullName` varchar(45) DEFAULT NULL,
  `Status` enum('user','moderator','admin') NOT NULL DEFAULT 'user',
  PRIMARY KEY (`Username`),
  KEY `user_status_idx` (`Status`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `Mailbox` (
  `msgId` int(11) NOT NULL AUTO_INCREMENT,
  `Subject` varchar(45) NOT NULL,
  `msgText` text,
  `Status` enum('read','unread') NOT NULL DEFAULT 'unread',
  `msgDate` datetime NOT NULL,
  `Sender` varchar(45) NOT NULL,
  `Receiver` varchar(45) NOT NULL,
  PRIMARY KEY (`msgId`),
  KEY `Sender_idx` (`Sender`),
  KEY `Receiver_idx` (`Receiver`),
  KEY `msg_status_idx` (`Status`),
  CONSTRAINT `Receiver` FOREIGN KEY (`Receiver`) REFERENCES `User` (`Username`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `Sender` FOREIGN KEY (`Sender`) REFERENCES `User` (`Username`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

CREATE TABLE `Forum` (
  `ForumId` int(11) NOT NULL AUTO_INCREMENT,
  `ForumName` varchar(20) NOT NULL,
  `Status` enum('open','closed','request') NOT NULL DEFAULT 'open',
  `Description` text,
  `StartModerator` varchar(20) NOT NULL,
  `Picture` blob,
  PRIMARY KEY (`ForumId`),
  KEY `forum_status_idx` (`Status`),
  KEY `start_moderator_idx` (`StartModerator`),
  CONSTRAINT `start_moderator_fk` FOREIGN KEY (`StartModerator`) REFERENCES `User` (`Username`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

CREATE TABLE `Thread` (
  `forumNo` int(11) NOT NULL,
  `title` varchar(45) NOT NULL,
  `status` enum('open','closed') NOT NULL DEFAULT 'open',
  `createDate` datetime NOT NULL,
  `startUser` varchar(45) NOT NULL,
  `ranking` int(11) DEFAULT NULL,
  `threadID` int(11) NOT NULL AUTO_INCREMENT,
  KEY `forumNo_idx` (`forumNo`),
  KEY `startUser_idx` (`startUser`),
  KEY `threadID_idx` (`threadID`),
  CONSTRAINT `forumNo_k` FOREIGN KEY (`forumNo`) REFERENCES `Forum` (`ForumId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `startUser_k` FOREIGN KEY (`startUser`) REFERENCES `User` (`Username`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

CREATE TABLE `Post` (
  `postID` int(11) NOT NULL AUTO_INCREMENT,
  `threadNo` int(11) NOT NULL,
  `postText` longtext NOT NULL,
  `uploadDate` datetime NOT NULL,
  `postUser` varchar(45) NOT NULL,
  KEY `postUser_idx` (`postUser`),
  KEY `postID_idx` (`postID`),
  CONSTRAINT `postUser_k` FOREIGN KEY (`postUser`) REFERENCES `User` (`Username`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO User (Username,Password,FullName,Status) VALUES ('RJSkywalker','password','Robert Merino','admin');
INSERT INTO User (Username,Password,FullName,Status) VALUES ('Deadpool','chimichanga','Wade Wilson','user');
INSERT INTO User (Username,Password,FullName,Status) VALUES ('Flash','lightning','Wally West','moderator');
INSERT INTO User (Username,Password,FullName,Status) VALUES ('Spiderman','webslinger','Peter Park','user');
INSERT INTO Mailbox (Subject, msgText, Sender, Receiver) VALUES ('<3', 'Love you spidey!', 'Deadpool','Spiderman');
INSERT INTO Mailbox (Subject, msgText, Sender, Receiver) VALUES ('Fastest Man?', 'Flash, you crazy man. ', 'Spiderman','Flash');
INSERT INTO Mailbox (Subject, msgText, Sender, Receiver) VALUES ('Stolen Name?', 'Are you Luke\'s father?', 'Deadpool','RJSkywalker');
INSERT INTO Forum (ForumName, Description, StartModerator) VALUES ('Chimichangas!', 'Shenanigans and chimichangas', 'Flash');
INSERT INTO Forum (ForumName, Description, StartModerator) VALUES ('Marvel vs DC', 'Be prepared to fight to the death', 'Flash');
INSERT INTO Forum (ForumName, Description, StartModerator) VALUES ('Star Wars Lore', 'Everything and anything Star Wars related', 'RJSkywalker');
INSERT INTO Thread (ForumNo, Title, StartUser) VALUES ('4','FRANCIS', 'Deadpool');
INSERT INTO Thread (ForumNo, Title, StartUser) VALUES ('5','Best team?', 'Flash');
INSERT INTO Thread (ForumNo, Title, StartUser) VALUES ('6','Rebel or Imperial?', 'RJSkywalker');
INSERT INTO Post (ThreadNo, postText, postUser) VALUES ('1','I\'m gonna kill him!', 'Deadpool');
INSERT INTO Post (ThreadNo, postText, postUser) VALUES ('1','Why so angry?', 'Flash');
INSERT INTO Post (ThreadNo, postText, postUser) VALUES ('2','Avengers of course', 'Spiderman');
INSERT INTO Post (ThreadNo, postText, postUser) VALUES ('2','Justice League!', 'Flash');
INSERT INTO Post (ThreadNo, postText, postUser) VALUES ('3','What\' Star Wars?', 'Flash');
INSERT INTO Post (ThreadNo, postText, postUser) VALUES ('3','Only the best ever!!', 'RJSkywalker');
