-- MySQL dump 10.13  Distrib 5.7.17, for macos10.12 (x86_64)
--
-- Host: localhost    Database: practice
-- ------------------------------------------------------
-- Server version	5.7.17

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Chatroom`
--

DROP TABLE IF EXISTS `Chatroom`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Chatroom` (
  `RoomId` int(11) NOT NULL AUTO_INCREMENT,
  `Content` text,
  `ChatStartUser` varchar(20) NOT NULL,
  PRIMARY KEY (`RoomId`),
  KEY `ChatStartUser_idx` (`ChatStartUser`),
  CONSTRAINT `ChatStartUser_fk` FOREIGN KEY (`ChatStartUser`) REFERENCES `User` (`Username`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `idChatRoom_fk` FOREIGN KEY (`RoomId`) REFERENCES `activeChatRooms` (`idactiveChatRoom`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Chatroom`
--

LOCK TABLES `Chatroom` WRITE;
/*!40000 ALTER TABLE `Chatroom` DISABLE KEYS */;
/*!40000 ALTER TABLE `Chatroom` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Forum`
--

DROP TABLE IF EXISTS `Forum`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Forum` (
  `ForumId` int(11) NOT NULL AUTO_INCREMENT,
  `ForumName` varchar(20) NOT NULL,
  `Status` enum('open','closed','request') NOT NULL DEFAULT 'request',
  `Description` text,
  `StartModerator` varchar(20) NOT NULL,
  `Picture` blob,
  PRIMARY KEY (`ForumId`),
  KEY `forum_status_idx` (`Status`),
  KEY `start_moderator_idx` (`StartModerator`),
  CONSTRAINT `start_moderator_fk` FOREIGN KEY (`StartModerator`) REFERENCES `User` (`Username`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Forum`
--

LOCK TABLES `Forum` WRITE;
/*!40000 ALTER TABLE `Forum` DISABLE KEYS */;
INSERT INTO `Forum` VALUES (1,'Chimichangas!','open','Shenanigans and chimichangas','Flash',NULL),(2,'Marvel vs DC','open','Be prepared to fight to the death','Flash',NULL),(3,'Star Wars Lore','open','Everything and anything Star Wars related','RJSkywalker',NULL),(5,'LOTR','open','Everything LOTR','RJSkywalker',NULL);
/*!40000 ALTER TABLE `Forum` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Mailbox`
--

DROP TABLE IF EXISTS `Mailbox`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Mailbox` (
  `msgId` int(11) NOT NULL AUTO_INCREMENT,
  `Subject` varchar(45) NOT NULL,
  `msgText` text,
  `Status` enum('read','unread') NOT NULL DEFAULT 'unread',
  `msgDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Sender` varchar(45) NOT NULL,
  `Receiver` varchar(45) NOT NULL,
  PRIMARY KEY (`msgId`),
  KEY `Sender_idx` (`Sender`),
  KEY `Receiver_idx` (`Receiver`),
  KEY `msg_status_idx` (`Status`),
  CONSTRAINT `Receiver` FOREIGN KEY (`Receiver`) REFERENCES `User` (`Username`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `Sender` FOREIGN KEY (`Sender`) REFERENCES `User` (`Username`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Mailbox`
--

LOCK TABLES `Mailbox` WRITE;
/*!40000 ALTER TABLE `Mailbox` DISABLE KEYS */;
INSERT INTO `Mailbox` VALUES (3,'<3','Love you spidey!','read','2017-05-01 20:18:04','Deadpool','Spiderman'),(4,'Fastest Man?','Flash, you crazy man. ','read','2017-05-01 20:19:30','Spiderman','Flash'),(5,'Stolen Name?','Are you Luke\'s father?','read','2017-05-01 20:20:19','Deadpool','RJSkywalker'),(6,'No really','You have to know something...I really, really, really think we should be a team. Like, we are perfect together! Just think about it. <3','read','2017-05-08 19:58:59','Deadpool','Spiderman');
/*!40000 ALTER TABLE `Mailbox` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Post`
--

DROP TABLE IF EXISTS `Post`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Post` (
  `postID` int(11) NOT NULL AUTO_INCREMENT,
  `threadNo` int(11) NOT NULL,
  `postText` longtext NOT NULL,
  `uploadDate` datetime DEFAULT NULL,
  `postUser` varchar(45) NOT NULL,
  KEY `postUser_idx` (`postUser`),
  KEY `postID_idx` (`postID`),
  CONSTRAINT `postUser_k` FOREIGN KEY (`postUser`) REFERENCES `User` (`Username`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Post`
--

LOCK TABLES `Post` WRITE;
/*!40000 ALTER TABLE `Post` DISABLE KEYS */;
INSERT INTO `Post` VALUES (1,1,'I\'m gonna kill him!','2017-05-10 19:39:58','Deadpool'),(3,2,'Avengers of course','2017-05-10 19:39:58','Spiderman'),(4,2,'Justice League!','2017-05-10 19:39:58','Flash'),(5,3,'What\' Star Wars?','2017-05-10 19:39:58','Flash'),(6,3,'Only the best ever!!','2017-05-10 19:39:58','RJSkywalker'),(7,8,'WHAT?',NULL,'Flash'),(11,8,'Hello',NULL,'Flash'),(12,8,'I have no idea',NULL,'RJSkywalker'),(16,4,'Yahoo!',NULL,'Deadpool');
/*!40000 ALTER TABLE `Post` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Thread`
--

DROP TABLE IF EXISTS `Thread`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Thread` (
  `forumNo` int(11) NOT NULL,
  `title` varchar(45) NOT NULL,
  `status` enum('open','closed') NOT NULL DEFAULT 'open',
  `createDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `startUser` varchar(45) NOT NULL,
  `ranking` int(11) DEFAULT NULL,
  `threadID` int(11) NOT NULL AUTO_INCREMENT,
  KEY `forumNo_idx` (`forumNo`),
  KEY `startUser_idx` (`startUser`),
  KEY `threadID_idx` (`threadID`),
  CONSTRAINT `forumNo_k` FOREIGN KEY (`forumNo`) REFERENCES `Forum` (`ForumId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `startUser_k` FOREIGN KEY (`startUser`) REFERENCES `User` (`Username`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Thread`
--

LOCK TABLES `Thread` WRITE;
/*!40000 ALTER TABLE `Thread` DISABLE KEYS */;
INSERT INTO `Thread` VALUES (1,'FRANCIS','open','2017-05-10 19:39:58','Deadpool',2,1),(3,'Rebel or Imperial?','open','2017-05-10 19:39:58','RJSkywalker',4,3),(2,'Does Superman have human emotions?','open','2017-05-15 19:31:13','RJSkywalker',5,4),(2,'Who Avenges the Avengers?','closed','2017-05-15 21:05:19','Flash',5,8);
/*!40000 ALTER TABLE `Thread` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `User`
--

DROP TABLE IF EXISTS `User`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `User` (
  `Username` varchar(45) NOT NULL,
  `Password` varchar(45) NOT NULL,
  `FullName` varchar(45) DEFAULT NULL,
  `Status` enum('user','moderator','admin') NOT NULL DEFAULT 'user',
  PRIMARY KEY (`Username`),
  KEY `user_status_idx` (`Status`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `User`
--

LOCK TABLES `User` WRITE;
/*!40000 ALTER TABLE `User` DISABLE KEYS */;
INSERT INTO `User` VALUES ('Deadpool','chimichanga','Wade Wilson','user'),('Flash','lightning','Wally West','moderator'),('RJSkywalker','password','Robert Merino','admin'),('Spiderman','webslinger','Peter Park','user');
/*!40000 ALTER TABLE `User` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `activeChatRooms`
--

DROP TABLE IF EXISTS `activeChatRooms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `activeChatRooms` (
  `idactiveChatRoom` int(11) NOT NULL AUTO_INCREMENT,
  `chatName` varchar(20) NOT NULL,
  PRIMARY KEY (`idactiveChatRoom`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activeChatRooms`
--

LOCK TABLES `activeChatRooms` WRITE;
/*!40000 ALTER TABLE `activeChatRooms` DISABLE KEYS */;
/*!40000 ALTER TABLE `activeChatRooms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bannedUsers`
--

DROP TABLE IF EXISTS `bannedUsers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bannedUsers` (
  `nameBannedUser` varchar(20) NOT NULL,
  `forumBanned` int(11) NOT NULL,
  KEY `userBanned_idx` (`nameBannedUser`),
  KEY `forumBanned_idx` (`forumBanned`),
  CONSTRAINT `forumBanned_fk` FOREIGN KEY (`forumBanned`) REFERENCES `Forum` (`ForumId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `userBanned_fk` FOREIGN KEY (`nameBannedUser`) REFERENCES `User` (`Username`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bannedUsers`
--

LOCK TABLES `bannedUsers` WRITE;
/*!40000 ALTER TABLE `bannedUsers` DISABLE KEYS */;
/*!40000 ALTER TABLE `bannedUsers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usersInChatroom`
--

DROP TABLE IF EXISTS `usersInChatroom`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usersInChatroom` (
  `userInChat` varchar(20) NOT NULL,
  `chatUserIn` int(11) NOT NULL,
  KEY `userInChat_fk_idx` (`userInChat`),
  KEY `chatUserIn_fk_idx` (`chatUserIn`),
  CONSTRAINT `chatUserIn_fk` FOREIGN KEY (`chatUserIn`) REFERENCES `Chatroom` (`RoomId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `userInChat_fk` FOREIGN KEY (`userInChat`) REFERENCES `User` (`Username`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usersInChatroom`
--

LOCK TABLES `usersInChatroom` WRITE;
/*!40000 ALTER TABLE `usersInChatroom` DISABLE KEYS */;
/*!40000 ALTER TABLE `usersInChatroom` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-05-15 23:04:06
