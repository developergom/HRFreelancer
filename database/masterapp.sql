CREATE DATABASE  IF NOT EXISTS `masterapp` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `masterapp`;
-- MySQL dump 10.13  Distrib 5.7.15, for Linux (x86_64)
--
-- Host: localhost    Database: masterapp
-- ------------------------------------------------------
-- Server version	5.7.15-0ubuntu0.16.04.1

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
-- Table structure for table `action_types`
--

DROP TABLE IF EXISTS `action_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `action_types` (
  `action_type_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `action_type_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `action_type_desc` text COLLATE utf8_unicode_ci,
  `active` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`action_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `action_types`
--

LOCK TABLES `action_types` WRITE;
/*!40000 ALTER TABLE `action_types` DISABLE KEYS */;
INSERT INTO `action_types` VALUES (1,'Event','Event\r\n','1',1,1,'2016-06-22 23:55:32','2016-08-31 19:53:10'),(2,'Non Event','Non Event','1',1,1,'2016-06-22 23:56:11','2016-08-31 19:53:36'),(3,'Action Type 3','','0',1,1,'2016-06-23 00:15:40','2016-08-31 19:55:23');
/*!40000 ALTER TABLE `action_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `actions`
--

DROP TABLE IF EXISTS `actions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `actions` (
  `action_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `action_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `action_alias` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `action_desc` text COLLATE utf8_unicode_ci,
  `active` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`action_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `actions`
--

LOCK TABLES `actions` WRITE;
/*!40000 ALTER TABLE `actions` DISABLE KEYS */;
INSERT INTO `actions` VALUES (1,'Create','C','Action Control to Create New Item','1',1,1,'2016-05-25 20:50:06','2016-05-25 21:01:44'),(2,'Read','R','Action Control to Read/View an Item','1',1,1,'2016-05-25 20:51:29','2016-05-25 21:02:36'),(3,'Update','U','Action Control to Update an Item','1',1,NULL,'2016-05-25 21:02:22','2016-05-25 21:02:22'),(4,'Delete','D','Action Control to Delete an Item','1',1,NULL,'2016-05-25 21:03:13','2016-05-25 21:03:13'),(5,'Download','DL','Action Control to Download an Item','1',1,NULL,'2016-05-25 21:05:51','2016-05-25 21:05:51'),(6,'Upload','UL','Action Control to Upload an Item','1',1,NULL,'2016-05-25 21:06:16','2016-05-25 21:06:16'),(7,'delete test','delete test','deleting test','0',1,1,'2016-05-25 21:07:16','2016-05-25 21:07:54'),(8,'Approval','A','Action Control to Approve','1',1,1,'2016-06-02 20:55:27','2016-06-02 20:55:52'),(9,'Print','P','Action Control to Print','1',1,NULL,'2016-06-02 20:56:21','2016-06-02 20:56:21');
/*!40000 ALTER TABLE `actions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `actions_modules`
--

DROP TABLE IF EXISTS `actions_modules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `actions_modules` (
  `action_id` int(11) DEFAULT NULL,
  `module_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `actions_modules`
--

LOCK TABLES `actions_modules` WRITE;
/*!40000 ALTER TABLE `actions_modules` DISABLE KEYS */;
INSERT INTO `actions_modules` VALUES (1,2),(2,2),(3,2),(4,2),(2,1),(2,4),(2,12),(1,13),(2,3),(1,4),(3,4),(4,4),(1,12),(3,12),(4,12),(2,13),(3,13),(4,13),(1,19),(2,19),(3,19),(4,19),(1,20),(2,20),(3,20),(4,20),(1,23),(2,23),(3,23),(4,23),(1,24),(2,24),(3,24),(4,24),(1,27),(2,27),(3,27),(4,27),(1,30),(2,30),(3,30),(4,30),(1,31),(2,31),(3,31),(4,31),(2,35),(1,36),(2,36),(3,36),(4,36),(1,37),(2,37),(3,37),(4,37);
/*!40000 ALTER TABLE `actions_modules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `announcements`
--

DROP TABLE IF EXISTS `announcements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `announcements` (
  `announcement_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `announcement_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `announcement_detail` text COLLATE utf8_unicode_ci NOT NULL,
  `announcement_startdate` date NOT NULL,
  `announcement_enddate` date NOT NULL,
  `active` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`announcement_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `announcements`
--

LOCK TABLES `announcements` WRITE;
/*!40000 ALTER TABLE `announcements` DISABLE KEYS */;
INSERT INTO `announcements` VALUES (1,'Pengumuman 1','Pengumuman 1 Yes','2016-10-06','2016-10-10','1',1,1,'2016-10-05 22:27:02','2016-10-05 22:32:37'),(2,'Pengumuman 2','Pengumuman 2 YA','2016-10-06','2016-10-06','1',1,0,'2016-10-05 22:33:08','2016-10-05 22:33:08'),(3,'Pengumuman 3','Pengumuman3','2016-10-06','2016-10-07','1',1,0,'2016-10-05 22:33:35','2016-10-05 22:33:35'),(4,'Pengumuman 4','Kemarin','2016-10-01','2016-10-06','1',1,0,'2016-10-05 22:38:42','2016-10-05 22:38:42'),(5,'Pengumuman 5','Pengumuman 5','2016-10-05','2016-10-08','1',1,0,'2016-10-05 22:39:16','2016-10-05 22:39:16');
/*!40000 ALTER TABLE `announcements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `approval_types`
--

DROP TABLE IF EXISTS `approval_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `approval_types` (
  `approval_type_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `approval_type_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`approval_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `approval_types`
--

LOCK TABLES `approval_types` WRITE;
/*!40000 ALTER TABLE `approval_types` DISABLE KEYS */;
INSERT INTO `approval_types` VALUES (1,'Submitted','1',1,1,'2015-12-31 17:00:00','2015-12-31 17:00:00'),(2,'Approved','1',1,1,'2015-12-31 17:00:00','2015-12-31 17:00:00'),(3,'Rejected','1',1,1,'2015-12-31 17:00:00','2015-12-31 17:00:00'),(4,'Finished','1',1,1,'2015-12-31 17:00:00','2015-12-31 17:00:00');
/*!40000 ALTER TABLE `approval_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `configs`
--

DROP TABLE IF EXISTS `configs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `configs` (
  `config_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `config_key` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `config_value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `config_desc` text COLLATE utf8_unicode_ci,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`config_id`),
  UNIQUE KEY `configs_config_key_unique` (`config_key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `configs`
--

LOCK TABLES `configs` WRITE;
/*!40000 ALTER TABLE `configs` DISABLE KEYS */;
/*!40000 ALTER TABLE `configs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `downloads`
--

DROP TABLE IF EXISTS `downloads`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `downloads` (
  `download_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `upload_file_id` int(11) NOT NULL,
  `download_ip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `download_device` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `download_os` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `download_browser` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`download_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `downloads`
--

LOCK TABLES `downloads` WRITE;
/*!40000 ALTER TABLE `downloads` DISABLE KEYS */;
INSERT INTO `downloads` VALUES (1,17,'127.0.0.1','PC','Linux','Firefox',13,0,'2016-09-14 21:16:39','2016-09-14 21:16:39'),(2,23,'127.0.0.1','PC','Linux','Firefox',9,0,'2016-09-14 21:26:03','2016-09-14 21:26:03'),(3,1,'127.0.0.1','PC','Linux','Firefox',9,0,'2016-09-14 21:49:32','2016-09-14 21:49:32'),(4,24,'127.0.0.1','PC','Linux','Firefox',9,0,'2016-09-15 02:05:48','2016-09-15 02:05:48'),(5,25,'127.0.0.1','PC','Linux','Firefox',9,0,'2016-09-15 02:05:53','2016-09-15 02:05:53'),(6,28,'127.0.0.1','PC','Linux','Firefox',9,0,'2016-09-15 03:41:52','2016-09-15 03:41:52'),(7,29,'127.0.0.1','PC','Linux','Firefox',9,0,'2016-09-15 21:17:08','2016-09-15 21:17:08'),(8,30,'127.0.0.1','PC','Linux','Firefox',9,0,'2016-09-18 22:04:31','2016-09-18 22:04:31'),(9,31,'127.0.0.1','PC','Linux','Firefox',9,0,'2016-09-18 23:34:33','2016-09-18 23:34:33'),(10,35,'127.0.0.1','PC','Linux','Firefox',9,0,'2016-09-19 03:19:28','2016-09-19 03:19:28'),(11,36,'127.0.0.1','PC','Linux','Firefox',9,0,'2016-09-19 03:19:31','2016-09-19 03:19:31'),(12,37,'127.0.0.1','PC','Linux','Firefox',9,0,'2016-09-19 03:19:35','2016-09-19 03:19:35');
/*!40000 ALTER TABLE `downloads` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `flow_groups`
--

DROP TABLE IF EXISTS `flow_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `flow_groups` (
  `flow_group_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `module_id` int(11) NOT NULL,
  `flow_group_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `flow_group_desc` text COLLATE utf8_unicode_ci,
  `active` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`flow_group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `flow_groups`
--

LOCK TABLES `flow_groups` WRITE;
/*!40000 ALTER TABLE `flow_groups` DISABLE KEYS */;
INSERT INTO `flow_groups` VALUES (1,28,'Action Plan','Action Plan Flow System','1',1,0,'2016-08-22 00:05:55','2016-08-22 00:05:55');
/*!40000 ALTER TABLE `flow_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `flows`
--

DROP TABLE IF EXISTS `flows`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `flows` (
  `flow_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `flow_group_id` int(11) NOT NULL,
  `flow_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `flow_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `flow_no` int(11) NOT NULL,
  `flow_prev` int(11) NOT NULL,
  `flow_next` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `flow_by` enum('AUTHOR','GROUP','INDUSTRY','PIC','MEDIA') CHARACTER SET utf8 NOT NULL,
  `flow_parallel` enum('true','false') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'false',
  `flow_condition` enum('EQUAL','NOT_EQUAL','GREATER','LESS','GREATER_EQUAL','LESS_EQUAL') COLLATE utf8_unicode_ci NOT NULL,
  `flow_condition_value` int(11) NOT NULL,
  `active` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`flow_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `flows`
--

LOCK TABLES `flows` WRITE;
/*!40000 ALTER TABLE `flows` DISABLE KEYS */;
INSERT INTO `flows` VALUES (1,1,'Creating Action Plan','/plan/actionplan/create',1,1,2,12,'AUTHOR','false','EQUAL',0,'1',1,1,'2016-08-29 00:29:36','2016-08-29 02:00:24'),(2,1,'Appoval Action Plan','/plan/actionplan/approval/',2,1,3,18,'GROUP','false','EQUAL',0,'1',1,1,'2016-08-29 00:30:38','2016-08-29 02:30:09'),(3,1,'wrponmg','',3,2,4,12,'AUTHOR','false','EQUAL',0,'0',1,1,'2016-08-29 01:26:42','2016-08-29 01:26:52'),(4,1,'Sisipan Flow','/sisispan',2,1,3,16,'INDUSTRY','false','EQUAL',0,'0',1,1,'2016-08-29 02:29:34','2016-08-29 02:30:09');
/*!40000 ALTER TABLE `flows` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `groups` (
  `group_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(50) NOT NULL,
  `group_desc` text,
  `active` enum('0','1') DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `groups`
--

LOCK TABLES `groups` WRITE;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` VALUES (1,'Group 1','Group 1\r\n','1',1,1,'2016-06-10 06:31:03','2016-10-12 03:15:06'),(2,'Group 2','Group 2','1',1,1,'2016-06-10 06:31:48','2016-10-12 03:15:25'),(3,'Group 3','Group 3','1',1,1,'2016-06-10 06:32:00','2016-10-12 03:15:40'),(4,'Group 4','Group 4','1',1,1,'2016-06-10 06:32:10','2016-10-12 03:15:56'),(5,'Group 5','Group 5','1',1,1,'2016-06-10 06:32:19','2016-10-12 03:16:08'),(6,'Group 6','Group 6','1',1,1,'2016-08-30 04:31:42','2016-10-12 03:16:23');
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `holidays`
--

DROP TABLE IF EXISTS `holidays`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `holidays` (
  `holiday_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `holiday_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `holiday_date` date NOT NULL,
  `active` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`holiday_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `holidays`
--

LOCK TABLES `holidays` WRITE;
/*!40000 ALTER TABLE `holidays` DISABLE KEYS */;
INSERT INTO `holidays` VALUES (1,'Tahun Baru 2016','2016-01-01','1',1,0,'2016-06-08 21:01:01','2016-06-08 21:01:01'),(2,'Tahun Baru Cina','0000-00-00','1',1,0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(3,'Tahun Baru Saka','0000-00-00','1',1,0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(4,'Good Friday','0000-00-00','0',1,1,'0000-00-00 00:00:00','2016-06-08 22:26:36'),(5,'Hari Buruh Internasional','0000-00-00','1',1,0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(6,'test','0000-00-00','1',1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(7,'lagi lagi','0000-00-00','1',1,0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(8,'Kawqa','0000-00-00','1',1,0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(9,'Binga','2016-03-01','1',1,0,'2016-06-08 21:37:55','2016-06-08 21:37:55'),(10,'Ya ya ya','2011-11-11','1',1,1,'0000-00-00 00:00:00','2016-06-08 17:00:00'),(11,'Natal','2016-12-25','1',1,0,'2016-06-08 21:45:53','2016-06-08 21:45:53'),(12,'Jijiji','0000-00-00','1',1,0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(13,'Iii','0000-00-00','1',1,0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(14,'again','2014-12-11','1',1,1,'0000-00-00 00:00:00','2016-06-08 17:00:00'),(15,'Bir','2016-09-06','1',1,0,'2016-06-08 21:55:26','2016-06-08 21:55:26'),(16,'gagaga','2015-01-01','1',1,0,'2016-06-08 17:00:00','2016-06-08 17:00:00'),(17,'Format','2012-05-01','1',1,1,'0000-00-00 00:00:00','2016-06-08 22:23:11');
/*!40000 ALTER TABLE `holidays` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menus` (
  `menu_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `module_id` int(11) NOT NULL,
  `menu_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `menu_desc` text COLLATE utf8_unicode_ci,
  `menu_icon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `menu_order` int(11) NOT NULL,
  `menu_parent` int(11) NOT NULL,
  `active` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menus`
--

LOCK TABLES `menus` WRITE;
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;
INSERT INTO `menus` VALUES (1,1,'Home','Menu for Home','zmdi zmdi-home',2,0,'1',1,1,'2016-07-13 21:05:14','2016-07-19 21:13:50'),(2,2,'Users Management','Menu for Users Management',NULL,2,0,'1',1,NULL,'2016-07-13 21:06:01','2016-07-13 21:06:01'),(3,3,'Master Data','Menu for Master Data',NULL,3,0,'1',1,NULL,'2016-07-13 21:06:47','2016-07-13 21:06:47'),(4,4,'Action Controls Management','Menu for Action Controls Management',NULL,1,3,'1',1,NULL,'2016-07-13 21:07:36','2016-07-13 21:07:36'),(12,12,'Groups Management','Menu for Groups Management',NULL,4,3,'1',1,1,'2016-07-13 21:14:54','2016-10-11 19:20:39'),(13,13,'Holidays Management','Menu for Holiday Management',NULL,5,3,'1',1,1,'2016-07-13 21:15:37','2016-10-11 19:20:40'),(19,19,'Menus Management','Menu for Menus Management',NULL,7,3,'1',1,1,'2016-07-13 21:20:30','2016-10-11 19:22:08'),(20,20,'Modules Management','Menu for Modules Management',NULL,9,3,'1',1,1,'2016-07-13 21:21:42','2016-10-11 19:22:09'),(23,23,'Religions Management','Menu for Religions Management',NULL,11,3,'1',1,1,'2016-07-13 21:23:45','2016-10-11 19:22:35'),(24,24,'Roles Management','Menu for Roles Management',NULL,12,3,'1',1,1,'2016-07-13 21:24:30','2016-10-11 19:22:35'),(27,27,'Flow Groups Management','Menu for Flow Groups Management','zmdi zmdi-home',3,3,'1',1,1,'2016-07-20 21:39:34','2016-10-11 19:20:40'),(30,30,'Flows Management','Menu for Flows Management','zmdi zmdi-home',2,3,'1',1,1,'2016-08-22 01:18:20','2016-10-11 19:20:40'),(31,31,'Notification Types Management','Menu for Notification Types Management','zmdi zmdi-home',10,3,'1',1,1,'2016-08-31 20:41:45','2016-10-11 19:22:09'),(35,35,'Configurations','Menu for configurations parents','zmdi zmdi-settings',4,0,'1',1,1,'2016-10-04 21:53:14','2016-10-11 19:22:27'),(36,36,'Application Settings','Menu for application settings','zmdi zmdi-settings-square',2,35,'1',1,1,'2016-10-04 21:54:28','2016-10-05 22:22:33'),(37,37,'Announcement Management','Menu for announcement management','zmdi zmdi-info',1,35,'1',1,1,'2016-10-05 22:07:21','2016-10-05 22:22:33');
/*!40000 ALTER TABLE `menus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menus_modules`
--

DROP TABLE IF EXISTS `menus_modules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menus_modules` (
  `menu_id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menus_modules`
--

LOCK TABLES `menus_modules` WRITE;
/*!40000 ALTER TABLE `menus_modules` DISABLE KEYS */;
/*!40000 ALTER TABLE `menus_modules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES ('2014_10_12_000000_create_users_table',1),('2014_10_12_100000_create_password_resets_table',1),('2016_05_11_093524_create_roles_table',1),('2016_05_11_094826_create_users_roles_table',1),('2016_05_11_094847_create_modules_table',1),('2016_05_11_094858_create_menus_table',1),('2016_05_11_094918_create_actions_table',1),('2016_05_11_094929_create_configs_table',1),('2016_05_11_094943_create_menus_modules_table',1),('2016_05_11_094955_create_roles_modules_table',1),('2016_05_12_071210_create_users_medias_table',1),('2016_05_12_071232_create_users_subindustries_table',1),('2016_05_12_071452_create_media_groups_table',1),('2016_05_12_071922_create_media_categories_table',1),('2016_05_12_072147_create_medias_table',1),('2016_05_12_072517_create_media_editions_table',1),('2016_05_12_072947_create_papers',1),('2016_05_12_073325_create_units_table',1),('2016_05_12_073601_create_advertise_sizes_table',1),('2016_05_12_073613_create_advertise_positions_table',1),('2016_05_12_073625_create_advertise_rates_table',1),('2016_05_12_080341_create_holidays_table',1),('2016_05_12_080353_create_religions_table',1),('2016_05_12_080404_create_industries_table',1),('2016_05_12_080412_create_subindustries_table',1),('2016_05_12_080418_create_brands_table',1),('2016_05_12_081334_create_client_types_table',1),('2016_05_12_081343_create_clients_table',1),('2016_05_12_081350_create_clients_contacts_table',1),('2016_05_12_083328_create_client_products_table',1),('2016_05_12_083339_create_flow_groups_table',1),('2016_05_12_083347_create_flows_table',1),('2016_05_12_084514_create_action_types_table',1),('2016_05_12_084528_create_inventory_types_table',1),('2016_05_12_084540_create_proposal_types_table',1),('2016_05_12_084553_create_rkk_inventories_table',1),('2016_05_12_084600_create_rkk_proposals_table',1),('2016_05_26_072328_create_actions_modules_table',2),('2016_06_10_043804_create_groups_table',2),('2016_07_21_031419_create_users_groups_table',2),('2016_08_19_042103_create_action_plans_table',2),('2016_08_19_042635_create_action_plan_media_table',2),('2016_08_19_042654_create_action_plan_media_edition_table',2),('2016_08_19_042706_create_action_plan_uploads_table',2),('2016_08_19_083415_create_upload_files_table',3),('2016_08_19_083724_create_action_plan_upload_file_table',3),('2016_09_01_032400_create_notification_types_table',4),('2016_09_01_032410_create_notifications_table',4),('2016_09_02_040009_create_role_levels_table',5),('2016_09_02_093034_create_action_plan_histories_table',6),('2016_09_14_090001_create_download_table',7),('2016_09_15_094726_create_approval_type_table',8),('2016_09_27_041556_create_agenda_types_table',9),('2016_09_27_041603_create_agendas_table',9),('2016_09_27_041615_create_agendas_proposal_table',9),('2016_09_27_041626_create_agendas_inventories_table',9),('2016_09_27_041636_create_agendas_clients_table',9),('2016_09_27_041648_create_agendas_client_contacts_table',9),('2016_09_27_041657_create_agendas_users_table',9),('2016_10_05_043832_create_settings_table',10),('2016_10_06_041740_create_announcements_table',11);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `modules`
--

DROP TABLE IF EXISTS `modules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `modules` (
  `module_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `module_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `module_action` text COLLATE utf8_unicode_ci NOT NULL,
  `module_desc` text COLLATE utf8_unicode_ci,
  `active` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`module_id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modules`
--

LOCK TABLES `modules` WRITE;
/*!40000 ALTER TABLE `modules` DISABLE KEYS */;
INSERT INTO `modules` VALUES (1,'/home','','Home for dashboard','1',1,NULL,'2016-07-13 20:37:38','2016-07-13 20:37:38'),(2,'/user','','Module for user management','1',1,NULL,'2016-07-13 20:38:20','2016-07-13 20:38:20'),(3,'/master/#','','Module for master data parent','1',1,NULL,'2016-07-13 20:39:14','2016-07-13 20:39:14'),(4,'/master/action','','Module for Action Control Management','1',1,1,'2016-07-13 20:40:30','2016-10-11 19:23:20'),(12,'/master/group','','Module for Group Management','1',1,NULL,'2016-07-13 20:49:51','2016-07-13 20:49:51'),(13,'/master/holiday','','Module for Holiday Management','1',1,NULL,'2016-07-13 20:50:21','2016-07-13 20:50:21'),(19,'/master/menu','','Module for Menu Management','1',1,NULL,'2016-07-13 20:57:30','2016-07-13 20:57:30'),(20,'/master/module','','Module for Module Management','1',1,NULL,'2016-07-13 20:58:39','2016-07-13 20:58:39'),(23,'/master/religion','','Module for Religion Management','1',1,NULL,'2016-07-13 21:00:40','2016-07-13 21:00:40'),(24,'/master/role','','Module for Role Management','1',1,NULL,'2016-07-13 21:01:10','2016-07-13 21:01:10'),(27,'/master/flowgroup','','Module for Flow Group Management','1',1,NULL,'2016-07-20 21:38:03','2016-07-20 21:38:03'),(30,'/master/flow','','Flow Management','1',1,NULL,'2016-08-22 01:16:35','2016-08-22 01:16:35'),(31,'/master/notificationtype','','Module for Master Notification Type','1',1,NULL,'2016-08-31 20:40:21','2016-08-31 20:40:21'),(35,'/config/#','','Module for configuration','1',1,1,'2016-10-04 21:46:46','2016-10-04 21:48:07'),(36,'/config/setting','','Module for application settings','1',1,NULL,'2016-10-04 21:49:26','2016-10-04 21:49:26'),(37,'/config/announcement','','Module for Announcement Management','1',1,NULL,'2016-10-05 22:05:23','2016-10-05 22:05:23');
/*!40000 ALTER TABLE `modules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notification_types`
--

DROP TABLE IF EXISTS `notification_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notification_types` (
  `notification_type_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `notification_type_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `notification_type_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `notification_type_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `notification_type_desc` text CHARACTER SET utf8,
  `notification_type_need_confirmation` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `active` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`notification_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notification_types`
--

LOCK TABLES `notification_types` WRITE;
/*!40000 ALTER TABLE `notification_types` DISABLE KEYS */;
INSERT INTO `notification_types` VALUES (1,'actionplanapproval','Action Plan Approval','/plan/actionplan','Action Plan Approval','1','1',1,0,'2016-08-31 21:16:04','2016-09-18 20:36:52'),(2,'actionplanfinished','Action Plan Finished','/plan/actionplan','Action Plan Finished','0','1',1,0,'2016-09-15 01:54:54','2016-09-18 22:57:44'),(3,'actionplanreject','Action Plan Reject','/plan/actionplan','Action Plan Reject','1','1',1,0,'2016-09-15 02:31:06','2016-09-15 02:31:06');
/*!40000 ALTER TABLE `notification_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notifications` (
  `notification_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `notification_type_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `notification_text` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `notification_ref_id` int(11) NOT NULL,
  `notification_receiver` int(11) NOT NULL,
  `notification_senttime` datetime NOT NULL,
  `notification_readtime` datetime NOT NULL,
  `notification_status` int(11) NOT NULL,
  `active` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`notification_id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notifications`
--

LOCK TABLES `notifications` WRITE;
/*!40000 ALTER TABLE `notifications` DISABLE KEYS */;
INSERT INTO `notifications` VALUES (1,'actionplanapproval','Please check ',2,9,'2016-09-19 04:41:18','0000-00-00 00:00:00',1,'0',13,9,'2016-09-07 01:21:26','2016-09-18 21:41:18'),(2,'actionplanapproval','Please check ',3,9,'2016-09-19 04:41:18','0000-00-00 00:00:00',1,'0',13,9,'2016-09-07 01:51:34','2016-09-18 21:41:18'),(3,'actionplanapproval','Please check ',5,9,'2016-09-19 04:41:18','0000-00-00 00:00:00',1,'0',13,9,'2016-09-07 03:02:00','2016-09-18 21:41:18'),(4,'actionplanapproval','Please check ',6,9,'2016-09-19 04:41:12','0000-00-00 00:00:00',1,'0',13,9,'2016-09-07 03:03:21','2016-09-18 21:41:12'),(5,'actionplanapproval','Please check ',7,9,'2016-09-19 04:41:12','0000-00-00 00:00:00',1,'0',13,9,'2016-09-14 00:11:43','2016-09-18 21:41:12'),(6,'actionplanapproval','Please check ',8,9,'2016-09-19 04:41:12','0000-00-00 00:00:00',1,'0',13,9,'2016-09-14 00:40:13','2016-09-18 21:41:12'),(7,'actionplanfinished','Action Plan \"Bermain bersama bobo\" has been approved.',1,9,'2016-09-19 04:41:12','0000-00-00 00:00:00',1,'0',9,9,'2016-09-15 01:59:50','2016-09-18 21:41:12'),(8,'actionplanfinished','Action Plan \"Bermain bersama bobo\" has been approved.',1,9,'2016-09-19 04:41:12','0000-00-00 00:00:00',1,'0',9,9,'2016-09-15 02:00:12','2016-09-18 21:41:12'),(9,'actionplanfinished','Action Plan \"Bermain bersama bobo\" has been approved.',1,9,'2016-09-19 04:41:12','0000-00-00 00:00:00',1,'0',9,9,'2016-09-15 02:00:29','2016-09-18 21:41:12'),(10,'actionplanfinished','Action Plan \"Bermain bersama bobo\" has been approved.',1,9,'2016-09-19 05:01:43','0000-00-00 00:00:00',1,'0',9,9,'2016-09-15 02:01:13','2016-09-18 22:01:43'),(11,'actionplanapproval','Please check Action Plan \"Ulang Tahun XY\"',9,9,'2016-09-19 05:01:42','0000-00-00 00:00:00',1,'0',13,9,'2016-09-15 02:04:44','2016-09-18 22:01:42'),(12,'actionplanfinished','Action Plan \"Ulang Tahun XY\" has been approved.',9,13,'2016-09-19 05:49:30','0000-00-00 00:00:00',1,'0',9,13,'2016-09-15 02:06:04','2016-09-18 22:49:30'),(13,'actionplanreject','Action Plan \"Tahun Baru\" rejected.',2,13,'2016-09-19 05:49:30','0000-00-00 00:00:00',1,'0',9,13,'2016-09-15 02:33:14','2016-09-18 22:49:30'),(14,'actionplanapproval','Please check Action Plan \"Tahun Baru Edot\"',2,9,'2016-09-19 05:01:42','0000-00-00 00:00:00',1,'0',13,9,'2016-09-15 03:35:53','2016-09-18 22:01:42'),(15,'actionplanreject','Action Plan \"Tahun Baru Edot\" rejected.',2,13,'2016-09-19 05:49:30','0000-00-00 00:00:00',1,'0',9,13,'2016-09-15 03:38:54','2016-09-18 22:49:30'),(16,'actionplanapproval','Please check Action Plan \"Tahun Baru Edot\"',2,9,'2016-09-19 05:01:42','0000-00-00 00:00:00',1,'0',13,9,'2016-09-15 03:39:45','2016-09-18 22:01:42'),(17,'actionplanfinished','Action Plan \"Tahun Baru Edot\" has been approved.',2,13,'2016-09-19 05:49:30','0000-00-00 00:00:00',1,'0',9,13,'2016-09-15 03:42:03','2016-09-18 22:49:30'),(18,'actionplanapproval','Please check Action Plan \"Dari Dua Dua\"',10,9,'2016-09-19 05:01:42','0000-00-00 00:00:00',1,'0',4,9,'2016-09-15 21:07:32','2016-09-18 22:01:42'),(19,'actionplanfinished','Action Plan \"Dari Dua Dua\" has been approved.',10,4,'2016-09-19 05:58:00','2016-09-19 06:08:20',1,'0',9,4,'2016-09-15 21:17:18','2016-09-18 23:08:20'),(20,'actionplanapproval','Please check Action Plan \"Kertas\"',11,9,'2016-09-19 05:01:42','0000-00-00 00:00:00',1,'0',4,9,'2016-09-18 20:54:54','2016-09-18 22:01:42'),(21,'actionplanfinished','Action Plan \"Kertas\" has been approved.',11,4,'2016-09-19 05:58:00','2016-09-19 06:08:14',1,'0',9,4,'2016-09-18 21:17:54','2016-09-18 23:08:14'),(22,'actionplanapproval','Please check Action Plan \"Makan Siang\"',12,9,'2016-09-19 05:02:42','0000-00-00 00:00:00',1,'0',4,9,'2016-09-18 22:02:37','2016-09-18 22:02:42'),(23,'actionplanreject','Action Plan \"Makan Siang\" rejected.',12,4,'2016-09-19 06:25:37','2016-09-19 06:08:06',1,'0',9,4,'2016-09-18 22:03:08','2016-09-18 23:25:37'),(24,'actionplanapproval','Please check Action Plan \"Makan Siang\"',12,9,'2016-09-19 05:04:11','0000-00-00 00:00:00',1,'0',4,9,'2016-09-18 22:03:44','2016-09-18 22:04:11'),(25,'actionplanfinished','Action Plan \"Makan Siang\" has been approved.',12,4,'2016-09-19 05:58:00','2016-09-19 06:07:59',1,'0',9,4,'2016-09-18 22:04:45','2016-09-18 23:07:59'),(26,'actionplanfinished','Action Plan \"Jalan Jalan Maret\" has been approved.',7,13,'2016-09-19 06:31:29','2016-09-19 06:31:35',1,'0',9,13,'2016-09-18 23:30:34','2016-09-18 23:31:35'),(27,'actionplanreject','Action Plan \"Kabisat Tanpa File\" rejected.',3,13,'2016-09-19 06:32:36','2016-09-19 06:32:51',1,'0',9,13,'2016-09-18 23:32:01','2016-09-18 23:33:14'),(28,'actionplanapproval','Please check Action Plan \"Kabisat Tanpa File\"',3,9,'2016-09-19 06:34:03','2016-09-19 06:35:45',1,'0',13,9,'2016-09-18 23:33:14','2016-09-18 23:35:45'),(29,'actionplanfinished','Action Plan \"Kabisat Tanpa File\" has been approved.',3,13,'2016-09-19 06:35:15','2016-09-19 06:36:04',1,'0',9,13,'2016-09-18 23:34:45','2016-09-18 23:36:04'),(30,'actionplanreject','Action Plan \"Event Many Many File Upload\" rejected.',8,13,'2016-09-19 06:38:48','0000-00-00 00:00:00',1,'0',9,13,'2016-09-18 23:38:38','2016-09-18 23:39:07'),(31,'actionplanapproval','Please check Action Plan \"Event Many Many File Upload\"',8,9,'2016-09-19 06:39:15','2016-09-19 06:39:33',1,'0',13,9,'2016-09-18 23:39:07','2016-09-18 23:54:21'),(32,'actionplanreject','Action Plan \"Event Many Many File Upload\" rejected.',8,13,'2016-09-19 06:43:08','2016-09-19 06:44:29',1,'0',9,13,'2016-09-18 23:42:27','2016-09-18 23:54:47'),(33,'actionplanapproval','Please check Action Plan \"Event Many Many File Upload\"',8,9,'2016-09-19 06:45:19','0000-00-00 00:00:00',1,'0',13,9,'2016-09-18 23:44:41','2016-09-18 23:55:17'),(34,'actionplanreject','Action Plan \"Event Many Many File Upload\" rejected.',8,13,'2016-09-19 06:54:34','0000-00-00 00:00:00',1,'0',9,13,'2016-09-18 23:54:21','2016-09-18 23:54:34'),(35,'actionplanapproval','Please check Action Plan \"Event Many Many File Upload\"',8,9,'2016-09-19 06:54:59','2016-09-19 09:16:38',1,'0',13,9,'2016-09-18 23:54:47','2016-09-19 02:16:38'),(36,'actionplanfinished','Action Plan \"Event Many Many File Upload\" has been approved.',8,13,'2016-09-19 06:55:49','0000-00-00 00:00:00',1,'0',9,13,'2016-09-18 23:55:17','2016-09-18 23:55:49'),(37,'actionplanapproval','Please check Action Plan \"Three\"',13,9,'2016-09-19 10:19:07','2016-09-19 10:19:15',1,'0',4,9,'2016-09-19 03:18:41','2016-09-19 03:19:55'),(38,'actionplanfinished','Action Plan \"Three\" has been approved.',13,4,'2016-09-19 10:20:09','2016-09-19 10:20:15',1,'0',9,4,'2016-09-19 03:19:55','2016-09-19 03:20:15'),(39,'actionplanapproval','Please check Action Plan \"Ngetest\"',14,9,'2016-09-22 05:59:00','0000-00-00 00:00:00',1,'0',4,9,'2016-09-21 22:53:04','2016-09-21 23:00:21'),(40,'actionplanreject','Action Plan \"Ngetest\" rejected.',14,4,'2016-09-22 06:00:43','2016-09-22 06:00:46',1,'0',9,4,'2016-09-21 23:00:22','2016-09-21 23:01:45'),(41,'actionplanapproval','Please check Action Plan \"Ngetest\"',14,9,'2016-09-22 06:02:34','2016-09-22 06:02:41',1,'0',4,9,'2016-09-21 23:01:46','2016-09-21 23:03:05'),(42,'actionplanfinished','Action Plan \"Ngetest\" has been approved.',14,4,'2016-09-28 09:04:04','0000-00-00 00:00:00',1,'1',9,4,'2016-09-21 23:03:05','2016-09-28 02:04:04');
/*!40000 ALTER TABLE `notifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `religions`
--

DROP TABLE IF EXISTS `religions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `religions` (
  `religion_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `religion_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `active` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`religion_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `religions`
--

LOCK TABLES `religions` WRITE;
/*!40000 ALTER TABLE `religions` DISABLE KEYS */;
INSERT INTO `religions` VALUES (1,'Islam','1',1,1,'2016-05-19 02:00:10','2016-05-19 02:00:10'),(2,'Kristen Katolik','1',1,1,'2016-05-19 02:00:10','2016-05-19 02:00:10'),(3,'Kristen Protestan','1',1,1,'2016-05-19 02:00:10','2016-05-19 02:00:10'),(4,'Hindu','1',1,1,'2016-05-19 02:00:10','2016-05-19 02:00:10'),(5,'Budha','1',1,1,'2016-05-19 02:00:10','2016-05-19 02:00:10'),(6,'Konghucu Edit','0',1,1,'2016-05-23 02:08:49','2016-05-23 02:10:41'),(7,'tujuh','1',1,0,'2016-05-25 01:58:21','2016-05-25 01:58:21');
/*!40000 ALTER TABLE `religions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_levels`
--

DROP TABLE IF EXISTS `role_levels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_levels` (
  `role_level_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_level_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role_level_desc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`role_level_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_levels`
--

LOCK TABLES `role_levels` WRITE;
/*!40000 ALTER TABLE `role_levels` DISABLE KEYS */;
INSERT INTO `role_levels` VALUES (1,'Level 1','Staff','1',1,1,'2016-09-01 21:22:39','2016-09-01 21:22:39'),(2,'Level 2','Superintendent','1',1,1,'2016-09-01 21:22:39','2016-09-01 21:22:39'),(3,'Level 3','Manager','1',1,1,'2016-09-01 21:22:39','2016-09-01 21:22:39'),(4,'Level 4','Division Head','1',1,1,'2016-09-01 21:22:39','2016-09-01 21:22:39'),(5,'Level 5','General Manager','1',1,1,'2016-09-01 21:22:39','2016-09-01 21:22:39'),(6,'Level 6','Administrator','1',1,1,'2016-09-01 21:22:39','2016-09-01 21:22:39'),(7,'Level 7','Super Administrator','1',1,1,'2016-09-01 21:22:39','2016-09-01 21:22:39');
/*!40000 ALTER TABLE `role_levels` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `role_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_level_id` int(11) DEFAULT NULL,
  `role_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `role_desc` text COLLATE utf8_unicode_ci NOT NULL,
  `active` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,7,'Super Administrator','Role for Super Administrator','1',1,1,'2016-05-19 02:00:10','2016-09-02 00:29:53'),(2,6,'Administrator','Role for Adminstrator','1',1,1,'2016-05-20 00:31:22','2016-09-02 00:30:33'),(3,1,'Operator','Role for operator','1',1,1,'2016-05-20 00:33:20','2016-07-13 21:35:02');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles_modules`
--

DROP TABLE IF EXISTS `roles_modules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles_modules` (
  `role_id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL,
  `action_id` int(11) NOT NULL,
  `access` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles_modules`
--

LOCK TABLES `roles_modules` WRITE;
/*!40000 ALTER TABLE `roles_modules` DISABLE KEYS */;
INSERT INTO `roles_modules` VALUES (15,1,2,1),(13,1,2,1),(16,1,2,1),(29,1,2,1),(30,1,2,1),(6,1,2,1),(14,1,2,1),(19,1,2,1),(4,1,2,1),(21,1,2,1),(22,1,2,1),(23,1,2,1),(24,1,2,1),(25,1,2,1),(10,1,2,1),(18,1,2,1),(12,1,2,1),(7,1,2,1),(31,1,2,1),(1,1,2,1),(1,2,1,1),(1,2,2,1),(1,2,3,1),(1,2,4,1),(1,3,2,1),(1,4,1,1),(1,4,2,1),(1,4,3,1),(1,4,4,1),(1,30,1,1),(1,30,2,1),(1,30,3,1),(1,30,4,1),(1,27,1,1),(1,27,2,1),(1,27,3,1),(1,27,4,1),(1,12,1,1),(1,12,2,1),(1,12,3,1),(1,12,4,1),(1,13,1,1),(1,13,2,1),(1,13,3,1),(1,13,4,1),(1,19,1,1),(1,19,2,1),(1,19,3,1),(1,19,4,1),(1,20,1,1),(1,20,2,1),(1,20,3,1),(1,20,4,1),(1,31,1,1),(1,31,2,1),(1,31,3,1),(1,31,4,1),(1,23,1,1),(1,23,2,1),(1,23,3,1),(1,23,4,1),(1,24,1,1),(1,24,2,1),(1,24,3,1),(1,24,4,1),(1,35,2,1),(1,36,1,1),(1,36,2,1),(1,36,3,1),(1,36,4,1),(1,37,1,1),(1,37,2,1),(1,37,3,1),(1,37,4,1),(2,1,2,1),(2,2,1,1),(2,2,2,1),(2,2,3,1),(2,3,2,1),(2,4,1,1),(2,4,2,1),(2,4,3,1),(2,12,1,1),(2,12,2,1),(2,12,3,1),(2,12,4,1),(2,13,1,1),(2,13,2,1),(2,13,3,1),(2,13,4,1),(2,19,1,1),(2,19,2,1),(2,19,3,1),(2,20,1,1),(2,20,2,1),(2,20,3,1),(2,31,1,1),(2,31,2,1),(2,31,3,1),(2,31,4,1),(2,23,1,1),(2,23,2,1),(2,23,3,1),(2,23,4,1),(2,24,1,1),(2,24,2,1),(2,24,3,1),(2,35,2,1),(2,36,2,1),(2,36,3,1),(2,37,1,1),(2,37,2,1),(2,37,3,1),(2,37,4,1),(3,1,2,1),(3,3,2,1),(3,4,2,1),(3,4,3,1),(3,12,1,1),(3,12,2,1),(3,12,3,1),(3,12,4,1),(3,13,1,1),(3,13,2,1),(3,13,3,1),(3,13,4,1),(3,35,2,1),(3,37,1,1),(3,37,2,1),(3,37,3,1);
/*!40000 ALTER TABLE `roles_modules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `settings` (
  `setting_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `setting_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `setting_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `setting_desc` text COLLATE utf8_unicode_ci NOT NULL,
  `setting_value` text COLLATE utf8_unicode_ci NOT NULL,
  `active` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`setting_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` VALUES (1,'app_name','Application Name','Application\'s Name','Master<b>APP</b>','1',1,1,'2016-10-04 22:19:22','2016-10-11 20:19:30');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `upload_files`
--

DROP TABLE IF EXISTS `upload_files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `upload_files` (
  `upload_file_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `upload_file_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `upload_file_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `upload_file_path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `upload_file_size` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `upload_file_desc` text COLLATE utf8_unicode_ci NOT NULL,
  `active` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`upload_file_id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `upload_files`
--

LOCK TABLES `upload_files` WRITE;
/*!40000 ALTER TABLE `upload_files` DISABLE KEYS */;
INSERT INTO `upload_files` VALUES (1,'jpg','bobo_cover2.jpg','uploads/files','32912','','1',13,NULL,'2016-09-07 01:18:39','2016-09-07 01:18:39'),(2,'jpeg','images.jpeg','uploads/files','14089','','1',13,NULL,'2016-09-07 01:18:39','2016-09-07 01:18:39'),(3,'jpg','bobo_cover227.jpg','uploads/files','32912','','1',13,NULL,'2016-09-07 01:21:26','2016-09-07 01:21:26'),(4,'png','pasang_iklan.png','uploads/files','52087','','1',13,NULL,'2016-09-07 01:21:26','2016-09-07 01:21:26'),(5,'html','404.html','uploads/files','3413','','1',13,NULL,'2016-09-07 02:59:36','2016-09-07 02:59:36'),(6,'png','ideaonline.png','uploads/files','13836','','1',13,NULL,'2016-09-07 02:59:36','2016-09-07 02:59:36'),(7,'html','breadcrumb-demo.html','uploads/files','63614','','1',13,NULL,'2016-09-07 03:03:20','2016-09-07 03:03:20'),(8,'html','buttons.html','uploads/files','68710','','1',13,NULL,'2016-09-07 03:03:20','2016-09-07 03:03:20'),(9,'html','calendar.html','uploads/files','50090','','1',13,NULL,'2016-09-07 03:03:20','2016-09-07 03:03:20'),(10,'html','colors.html','uploads/files','49190','','1',13,NULL,'2016-09-07 03:03:21','2016-09-07 03:03:21'),(11,'html','components.html','uploads/files','163756','','1',13,NULL,'2016-09-07 03:03:21','2016-09-07 03:03:21'),(12,'png','ideaonline82.png','uploads/files','13836','','1',13,NULL,'2016-09-14 00:11:43','2016-09-14 00:11:43'),(13,'jpg','iklan-lucu-3.jpg','uploads/files','24852','','1',13,NULL,'2016-09-14 00:11:43','2016-09-14 00:11:43'),(14,'jpeg','images78.jpeg','uploads/files','14089','','1',13,NULL,'2016-09-14 00:11:43','2016-09-14 00:11:43'),(15,'jpeg','36-angkasa.jpeg','uploads/files','148792','','1',13,NULL,'2016-09-14 00:40:12','2016-09-14 00:40:12'),(16,'html','alerts.html','uploads/files','42966','','1',13,NULL,'2016-09-14 00:40:12','2016-09-14 00:40:12'),(17,'png','autobild online.png','uploads/files','5276','','1',13,NULL,'2016-09-14 00:40:12','2016-09-14 00:40:12'),(18,'jpg','bobo_cover279.jpg','uploads/files','32912','','1',13,NULL,'2016-09-14 00:40:12','2016-09-14 00:40:12'),(19,'jpg','hai.jpg','uploads/files','25190','','1',13,NULL,'2016-09-14 00:40:12','2016-09-14 00:40:12'),(20,'png','ideaonline9.png','uploads/files','13836','','1',13,NULL,'2016-09-14 00:40:12','2016-09-14 00:40:12'),(21,'jpg','iklan-lucu-382.jpg','uploads/files','24852','','1',13,NULL,'2016-09-14 00:40:12','2016-09-14 00:40:12'),(22,'jpeg','images70.jpeg','uploads/files','14089','','1',13,NULL,'2016-09-14 00:40:13','2016-09-14 00:40:13'),(23,'txt','ngetest.txt','uploads/files','20','','1',13,NULL,'2016-09-14 00:40:13','2016-09-14 00:40:13'),(24,'html','buttons57.html','uploads/files','68710','','1',13,NULL,'2016-09-15 02:04:44','2016-09-15 02:04:44'),(25,'jpg','iklan-lucu-340.jpg','uploads/files','24852','','1',13,NULL,'2016-09-15 02:04:44','2016-09-15 02:04:44'),(26,'jpg','hai86.jpg','uploads/files','25190','','1',13,NULL,'2016-09-15 03:35:53','2016-09-15 03:35:53'),(27,'jpg','iklan-lucu-340.jpg','uploads/files','24852','','1',13,NULL,'2016-09-15 03:35:53','2016-09-15 03:35:53'),(28,'jpg','wika.jpg','uploads/files','258970','','1',13,NULL,'2016-09-15 03:39:45','2016-09-15 03:39:45'),(29,'jpg','bobo_cover278.jpg','uploads/files','32912','','1',4,NULL,'2016-09-15 21:07:31','2016-09-15 21:07:31'),(30,'jpg','iklan-lucu-370.jpg','uploads/files','24852','','1',4,NULL,'2016-09-18 22:03:44','2016-09-18 22:03:44'),(31,'jpg','Rebeca Tamara iklan kartu im339.jpg','uploads/files','69193','','1',13,NULL,'2016-09-18 23:33:14','2016-09-18 23:33:14'),(32,'jpg','kawanku3.jpg','uploads/files','113708','','1',13,NULL,'2016-09-18 23:39:06','2016-09-18 23:39:06'),(33,'jpg','wika86.jpg','uploads/files','258970','','1',13,NULL,'2016-09-18 23:44:41','2016-09-18 23:44:41'),(34,'jpeg','images70.jpeg','uploads/files','14089','','1',13,NULL,'2016-09-18 23:54:47','2016-09-18 23:54:47'),(35,'jpeg','36-angkasa2.jpeg','uploads/files','148792','','1',4,NULL,'2016-09-19 03:18:40','2016-09-19 03:18:40'),(36,'png','ideaonline56.png','uploads/files','13836','','1',4,NULL,'2016-09-19 03:18:40','2016-09-19 03:18:40'),(37,'jpg','iklan-lucu-38.jpg','uploads/files','24852','','1',4,NULL,'2016-09-19 03:18:40','2016-09-19 03:18:40');
/*!40000 ALTER TABLE `upload_files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_lastname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_gender` enum('1','2') COLLATE utf8_unicode_ci NOT NULL,
  `religion_id` int(11) NOT NULL,
  `user_birthdate` date DEFAULT NULL,
  `user_lastlogin` datetime DEFAULT NULL,
  `user_lastip` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_avatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_status` enum('ACTIVE','INACTIVE','BLOCKED','EXPIRED') COLLATE utf8_unicode_ci NOT NULL,
  `active` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `users_user_name_unique` (`user_name`),
  UNIQUE KEY `users_user_email_unique` (`user_email`),
  KEY `users_user_firstname_user_phone_user_birthdate_index` (`user_firstname`,`user_phone`,`user_birthdate`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'025407','soni@gramedia-majalah.com','$2y$10$1LdG9jpzi6kJJZFcUblN8umDjFQZfsDSC.vycnwh6bbta/hTnj0VS','Soni','Rahayu','081111111111','1',1,'1990-01-01',NULL,NULL,'avatar.jpg','ACTIVE','1',1,1,'zhk6GMHLbhmvI0WPkdUxfdJPHu6bpemj5l5HxSpsC2gLMBcsuFOYDd1nAlHO','2016-05-19 02:00:10','2016-10-11 20:21:09'),(15,'000000','admin@admin.com','$2y$10$bDcWDAcug4u0OGrenwehCuqdDZBkCvZ63dmSgpun552lhTVfp6liS','Operator','Application','085522002200','2',1,'2000-01-01',NULL,NULL,'avatar-female.jpg','ACTIVE','1',1,NULL,'v22P10fFmBOB3QHf0eoOziOzlMwNwwx3gewNYQ4ZzcDUpYf5CPDYRdvnxmEg','2016-10-11 20:18:59','2016-10-11 20:21:31');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_groups`
--

DROP TABLE IF EXISTS `users_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_groups` (
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_groups`
--

LOCK TABLES `users_groups` WRITE;
/*!40000 ALTER TABLE `users_groups` DISABLE KEYS */;
INSERT INTO `users_groups` VALUES (11,3),(13,6),(9,6),(2,3),(2,4),(2,5),(2,6),(2,1),(2,2),(4,6),(1,3),(1,4),(1,5),(1,6),(1,1),(1,2),(10,1),(15,1);
/*!40000 ALTER TABLE `users_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_roles`
--

DROP TABLE IF EXISTS `users_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_roles` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_roles`
--

LOCK TABLES `users_roles` WRITE;
/*!40000 ALTER TABLE `users_roles` DISABLE KEYS */;
INSERT INTO `users_roles` VALUES (8,1,0,NULL,NULL,NULL),(8,4,0,NULL,NULL,NULL),(8,7,0,NULL,NULL,NULL),(10,7,0,NULL,NULL,NULL),(11,2,0,NULL,NULL,NULL),(12,1,0,NULL,NULL,NULL),(5,1,0,NULL,NULL,NULL),(14,3,0,NULL,NULL,NULL),(13,12,0,NULL,NULL,NULL),(9,18,0,NULL,NULL,NULL),(2,1,0,NULL,NULL,NULL),(4,12,0,NULL,NULL,NULL),(1,1,1,NULL,NULL,NULL),(15,3,0,NULL,NULL,NULL);
/*!40000 ALTER TABLE `users_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'masterapp'
--

--
-- Dumping routines for database 'masterapp'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-10-12 10:22:02
