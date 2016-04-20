-- MySQL dump 10.14  Distrib 5.5.41-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: spreadsheet
-- ------------------------------------------------------
-- Server version	5.5.41-MariaDB

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
-- Table structure for table `designers`
--

DROP TABLE IF EXISTS `designers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `designers` (
  `designer_id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  PRIMARY KEY (`designer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `designers`
--

LOCK TABLES `designers` WRITE;
/*!40000 ALTER TABLE `designers` DISABLE KEYS */;
INSERT INTO `designers` VALUES (1,'Kerry','Helms'),(2,'Nancy','Oliver'),(3,'Janet','Sinn-Hanlon'),(4,'Marcos','DelCristo'),(5,'Karen','Edwards'),(6,'Mitchell','Dalen');
/*!40000 ALTER TABLE `designers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jobs` (
  `job_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `designer_id` mediumint(9) NOT NULL,
  `description` varchar(50) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `bill_date` date DEFAULT NULL,
  `primary_contact` varchar(30) NOT NULL,
  `percent_done` int(11) NOT NULL DEFAULT '0',
  `work_status` varchar(30) NOT NULL,
  PRIMARY KEY (`job_id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
INSERT INTO `jobs` VALUES (13,1,'VTH bag design','2015-01-01','2015-10-01','0000-00-00','Holly Fuson',90,'On Hold'),(14,1,'Academic Leadership Brochure','2015-07-01','2015-08-15','0000-00-00','Gennifer Gilbert',75,'In Progress'),(15,1,'Pathobiology Artwork','2014-08-01','2015-09-01','0000-00-00','Dr. Kuhlenschmidt',0,'In Progress'),(16,2,'VTH Referral Directory','2015-07-15','2015-09-15','0000-00-00','Chris B/Ginger P',0,'In Progress'),(17,1,'Toxicology Poster','2015-07-15','0015-09-12','0000-00-00','SynDee',0,'In Progress'),(18,1,'Open House Poster/T-shirt Design   8/3/15 two conc','2015-07-15','2015-09-15','0000-00-00','Chris B',0,'In Progress'),(19,1,'Thank you Card/Cardio','0015-06-12','2015-09-01','0000-00-00','Ryan Fries',90,'In Progress'),(20,1,'Leadership Training/Assistant Professors','2015-07-12','0000-00-00','0000-00-00','Gennifer Gilbert',0,'In Progress'),(21,1,'VDL Artwork','2015-06-01','2015-10-01','0000-00-00','Lisa Shipp',0,'In Progress'),(22,2,'Microsurgery website','2014-06-01','2015-11-01','0000-00-00','Heidi Phillipps',80,'In Progress'),(23,2,'ISRS/Symposium for PEER website','2015-07-15','2015-07-31','0000-00-00','Adam Li',80,'In Progress'),(24,2,'SAC Isolation module','2015-07-01','2015-08-21','0000-00-00','N. George',75,'In Progress'),(25,4,'Vet Med Multisite setup','2015-07-27','0000-00-00','0000-00-00','Chris/Dan',0,'In Progress'),(26,4,'Class schedule/courses','2015-06-01','2015-08-21','0000-00-00','-',0,'In Progress'),(27,4,'ACVS Surgery website','2015-07-01','2015-08-07','0000-00-00','Ann Johnson',0,'In Progress'),(28,4,'Unreal Engine/Bessie','2015-04-01','2015-08-03','0000-00-00','-',0,'In Progress'),(29,6,'Unreal Engine/Bessie','2015-07-01','2015-07-31','0000-00-00','-',0,'In Progress'),(30,6,'Design Group Work List','2015-07-01','2015-07-31','0000-00-00','-',100,'Completed'),(31,1,'LAC 100 Windows/Bird Proof Design','2015-07-01','2015-08-31','0000-00-00','Stuart Clark-Price',0,'In Progress'),(32,4,'IFAMS website','2015-03-16','2015-07-31','0000-00-00','Jim Lowe',100,'In Progress'),(33,3,'Rat Anatomy/Microsurgery','2014-07-01','2015-10-15','0000-00-00','Heidi Phillipps',60,'In Progress'),(34,3,'Ko Lab/Inside illustration','2015-05-01','2015-07-24','0000-00-00','Jay Ko',100,'Completed'),(35,3,'IGB/bee project','2015-01-01','2015-08-07','0000-00-00','Tim G',95,'In Progress'),(36,3,'Cow sticker/CSLC','2015-03-01','2015-08-24','0000-00-00','Dr. Morin/Sherrie',70,'In Progress'),(37,3,'Anatomy Posters','2015-03-02','2015-09-15','0000-00-00','Dr. Harper/Kellie Lecher',0,'In Progress'),(38,3,'Cow/Unreal Engine project','2015-02-02','2015-07-31','0000-00-00','-',0,'In Progress'),(39,2,'VM 601/606 interactive graded activities (5)','2015-08-24','0000-00-00','0000-00-00','CSLC',0,'In Progress'),(40,3,'Inside Illustrations','2015-07-15','0000-00-00','0000-00-00','Stan Rubin',0,'In Progress'),(41,3,'Slides/Presentation','2015-08-03','2015-09-15','0000-00-00','Laurie Rund/Schook Lab',0,'In Progress'),(42,5,'Bossin\' around','2015-08-03','0000-00-00','0000-00-00','Kerry Helms',0,'In Progress');
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-08-03 10:06:01
