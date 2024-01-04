-- MariaDB dump 10.19  Distrib 10.6.12-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: rhino
-- ------------------------------------------------------
-- Server version	10.6.12-MariaDB-0ubuntu0.22.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `example`
--

DROP TABLE IF EXISTS `example`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `example` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `example`
--

LOCK TABLES `example` WRITE;
/*!40000 ALTER TABLE `example` DISABLE KEYS */;
/*!40000 ALTER TABLE `example` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phinxlog`
--

DROP TABLE IF EXISTS `phinxlog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phinxlog` (
  `version` bigint(20) NOT NULL,
  `migration_name` varchar(100) DEFAULT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `breakpoint` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phinxlog`
--

LOCK TABLES `phinxlog` WRITE;
/*!40000 ALTER TABLE `phinxlog` DISABLE KEYS */;
/*!40000 ALTER TABLE `phinxlog` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rhino_apps`
--

DROP TABLE IF EXISTS `rhino_apps`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rhino_apps` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `alias` varchar(100) NOT NULL,
  `overviewFields` varchar(255) DEFAULT NULL,
  `active` tinyint(1) DEFAULT 1,
  `rhino_group_id` int(11) DEFAULT NULL,
  `created` timestamp NULL DEFAULT current_timestamp(),
  `modified` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rhino_apps`
--

LOCK TABLES `rhino_apps` WRITE;
/*!40000 ALTER TABLE `rhino_apps` DISABLE KEYS */;
INSERT INTO `rhino_apps` VALUES (1,'test','Test','',1,1,'2024-01-02 10:43:17','2024-01-02 10:44:21'),(2,'example','Beispiel','',1,NULL,'2024-01-02 10:48:06','2024-01-02 10:48:06'),(3,'rhino_nodes','Nodes','',1,NULL,'2024-01-04 14:29:10','2024-01-04 14:29:10');
/*!40000 ALTER TABLE `rhino_apps` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rhino_contents`
--

DROP TABLE IF EXISTS `rhino_contents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rhino_contents` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `page_id` int(11) DEFAULT NULL,
  `element_id` int(11) DEFAULT NULL,
  `html` text DEFAULT NULL,
  `media` varchar(255) DEFAULT NULL,
  `active` tinyint(1) DEFAULT 1,
  `position` int(11) DEFAULT 0,
  `created` timestamp NULL DEFAULT current_timestamp(),
  `modified` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rhino_contents`
--

LOCK TABLES `rhino_contents` WRITE;
/*!40000 ALTER TABLE `rhino_contents` DISABLE KEYS */;
INSERT INTO `rhino_contents` VALUES (1,1,1,'{\"time\":1690121834854,\"blocks\":[{\"id\":\"BkMrFh55lD\",\"type\":\"header\",\"data\":{\"text\":\"Welcome to Rhino &#x1F98F;\",\"level\":1}},{\"id\":\"R_LcFT6kwI\",\"type\":\"paragraph\",\"data\":{\"text\":\"The fast but stable Application-Framwork.<br>Powered by <a href=\\\"https://cakephp.org/\\\">CakePHP</a>.\"}}],\"version\":\"2.26.5\"}',NULL,1,0,'2023-11-29 14:01:51','2023-11-29 14:01:51'),(2,1,1,'{\"time\":1704191991910,\"blocks\":[{\"id\":\"_aWHWf1u4q\",\"type\":\"paragraph\",\"data\":{\"text\":\"Hallo Johannes! ✨<br>\"}}],\"version\":\"2.26.5\"}',NULL,1,1,'2023-12-01 09:58:17','2024-01-02 10:39:51'),(4,1,2,'','1',1,2,'2024-01-02 10:42:05','2024-01-02 10:42:34');
/*!40000 ALTER TABLE `rhino_contents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rhino_elements`
--

DROP TABLE IF EXISTS `rhino_elements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rhino_elements` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `element` varchar(255) DEFAULT NULL,
  `active` tinyint(1) DEFAULT 1,
  `created` timestamp NULL DEFAULT current_timestamp(),
  `modified` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rhino_elements`
--

LOCK TABLES `rhino_elements` WRITE;
/*!40000 ALTER TABLE `rhino_elements` DISABLE KEYS */;
INSERT INTO `rhino_elements` VALUES (1,'Text','text.php',1,'2023-11-29 14:01:51','2024-01-04 08:42:16'),(2,'media','media.php',1,'2024-01-02 10:41:45','2024-01-02 10:41:45');
/*!40000 ALTER TABLE `rhino_elements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rhino_fields`
--

DROP TABLE IF EXISTS `rhino_fields`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rhino_fields` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `alias` varchar(100) DEFAULT NULL,
  `tableName` varchar(100) NOT NULL,
  `type` varchar(255) DEFAULT 'string',
  `description` text DEFAULT NULL,
  `standard` varchar(255) DEFAULT NULL,
  `settings` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rhino_fields`
--

LOCK TABLES `rhino_fields` WRITE;
/*!40000 ALTER TABLE `rhino_fields` DISABLE KEYS */;
INSERT INTO `rhino_fields` VALUES (1,'name','Name','test','string','','','{\"autosuggest\":\"\"}');
/*!40000 ALTER TABLE `rhino_fields` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rhino_groups`
--

DROP TABLE IF EXISTS `rhino_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rhino_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `active` tinyint(1) DEFAULT 1,
  `created` timestamp NULL DEFAULT current_timestamp(),
  `modified` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rhino_groups`
--

LOCK TABLES `rhino_groups` WRITE;
/*!40000 ALTER TABLE `rhino_groups` DISABLE KEYS */;
INSERT INTO `rhino_groups` VALUES (1,'New Group',1,'2024-01-02 10:43:32','2024-01-02 10:43:32');
/*!40000 ALTER TABLE `rhino_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rhino_layouts`
--

DROP TABLE IF EXISTS `rhino_layouts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rhino_layouts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `layout` varchar(255) DEFAULT NULL,
  `active` tinyint(1) DEFAULT 1,
  `created` timestamp NULL DEFAULT current_timestamp(),
  `modified` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rhino_layouts`
--

LOCK TABLES `rhino_layouts` WRITE;
/*!40000 ALTER TABLE `rhino_layouts` DISABLE KEYS */;
INSERT INTO `rhino_layouts` VALUES (1,'Default','default',1,'2023-11-29 14:01:51','2023-11-29 14:01:51'),(2,'asdfasdf','',1,'2023-12-20 08:21:21','2023-12-20 08:21:21'),(3,'adsfafdf','',1,'2023-12-20 08:21:27','2023-12-20 08:21:27');
/*!40000 ALTER TABLE `rhino_layouts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rhino_media`
--

DROP TABLE IF EXISTS `rhino_media`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rhino_media` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `filename` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  `media_category_id` int(11) DEFAULT NULL,
  `created` timestamp NULL DEFAULT current_timestamp(),
  `modified` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rhino_media`
--

LOCK TABLES `rhino_media` WRITE;
/*!40000 ALTER TABLE `rhino_media` DISABLE KEYS */;
INSERT INTO `rhino_media` VALUES (1,'2k.jpg','','',1,1,'2024-01-02 10:40:58','2024-01-02 10:40:58');
/*!40000 ALTER TABLE `rhino_media` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rhino_media_categories`
--

DROP TABLE IF EXISTS `rhino_media_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rhino_media_categories` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rhino_media_categories`
--

LOCK TABLES `rhino_media_categories` WRITE;
/*!40000 ALTER TABLE `rhino_media_categories` DISABLE KEYS */;
INSERT INTO `rhino_media_categories` VALUES (1,'Test','');
/*!40000 ALTER TABLE `rhino_media_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rhino_nodes`
--

DROP TABLE IF EXISTS `rhino_nodes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rhino_nodes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `active` tinyint(1) DEFAULT 1,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_id` int(11) NOT NULL,
  `node_type` varchar(255) NOT NULL DEFAULT 'page',
  `role` varchar(255) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `lft` int(10) NOT NULL,
  `rght` int(10) NOT NULL,
  `level` int(10) NOT NULL DEFAULT 0,
  `template_id` int(11) DEFAULT 0,
  `language` varchar(255) DEFAULT NULL,
  `version` int(11) DEFAULT NULL,
  `config` text DEFAULT NULL,
  `content` text DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_lft` (`lft`),
  KEY `parent_id` (`parent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rhino_nodes`
--

LOCK TABLES `rhino_nodes` WRITE;
/*!40000 ALTER TABLE `rhino_nodes` DISABLE KEYS */;
INSERT INTO `rhino_nodes` VALUES (1,'Home',1,'2024-01-04 13:17:52','2024-01-04 14:42:11',1,'0','0',NULL,1,24,0,0,NULL,NULL,NULL,NULL),(2,'About',1,'2024-01-04 13:18:15','2024-01-04 13:47:11',1,'0','0',1,2,15,1,0,NULL,NULL,NULL,NULL),(3,'Services',1,'2024-01-04 13:19:56','2024-01-04 13:47:11',1,'0','',1,16,17,1,0,NULL,NULL,NULL,NULL),(5,'First Component',1,'2024-01-04 13:27:43','2024-01-04 13:47:11',1,'1','',2,3,10,2,0,NULL,NULL,NULL,NULL),(6,'Secound Component',1,'2024-01-04 13:28:05','2024-01-04 13:47:11',1,'1','',2,11,14,2,0,NULL,NULL,NULL,NULL),(7,'Sub Component',1,'2024-01-04 13:28:27','2024-01-04 13:46:50',1,'1','',5,4,7,3,0,NULL,NULL,NULL,NULL),(8,'Some Content',1,'2024-01-04 13:28:48','2024-01-04 13:46:50',1,'2','',7,5,6,4,0,NULL,NULL,NULL,NULL),(9,'More Content',1,'2024-01-04 13:29:15','2024-01-04 13:46:50',1,'2','',5,8,9,3,0,NULL,NULL,NULL,NULL),(10,'Another Content',1,'2024-01-04 13:29:50','2024-01-04 13:47:11',1,'2','',6,12,13,3,0,NULL,NULL,NULL,NULL),(11,'Sub Content',1,'2024-01-04 13:31:34','2024-01-04 13:47:11',1,'2','',1,18,19,1,0,NULL,NULL,NULL,NULL),(13,'Test',1,'2024-01-04 14:18:55','2024-01-04 14:43:02',1,'page','3',NULL,25,26,0,0,NULL,NULL,NULL,NULL),(14,'Work',1,'2024-01-04 14:22:26','2024-01-04 14:43:14',1,'0','0',1,20,23,1,0,NULL,NULL,NULL,NULL),(15,'References',1,'2024-01-04 14:41:16','2024-01-04 14:43:14',1,'0','0',14,21,22,2,0,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `rhino_nodes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rhino_pages`
--

DROP TABLE IF EXISTS `rhino_pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rhino_pages` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `active` tinyint(1) DEFAULT 1,
  `is_homepage` tinyint(1) DEFAULT 0,
  `page_type` int(11) DEFAULT 0,
  `parent_id` int(11) DEFAULT NULL,
  `lft` int(10) NOT NULL,
  `rght` int(10) NOT NULL,
  `level` int(10) NOT NULL DEFAULT 0,
  `url` varchar(255) DEFAULT NULL,
  `layout_id` int(11) DEFAULT 0,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `idx_lft` (`lft`),
  KEY `parent_id` (`parent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rhino_pages`
--

LOCK TABLES `rhino_pages` WRITE;
/*!40000 ALTER TABLE `rhino_pages` DISABLE KEYS */;
INSERT INTO `rhino_pages` VALUES (1,'Home',1,1,0,NULL,2,2,0,NULL,1,'2023-11-29 14:01:51','2024-01-02 10:40:24'),(2,'About',1,0,0,NULL,3,4,0,'',1,'2023-12-01 09:58:55','2024-01-02 10:40:24'),(3,'Test',1,0,0,1,0,1,1,'',1,'2024-01-02 10:40:24','2024-01-02 10:40:24');
/*!40000 ALTER TABLE `rhino_pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rhino_phinxlog`
--

DROP TABLE IF EXISTS `rhino_phinxlog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rhino_phinxlog` (
  `version` bigint(20) NOT NULL,
  `migration_name` varchar(100) DEFAULT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `breakpoint` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rhino_phinxlog`
--

LOCK TABLES `rhino_phinxlog` WRITE;
/*!40000 ALTER TABLE `rhino_phinxlog` DISABLE KEYS */;
INSERT INTO `rhino_phinxlog` VALUES (20230411070244,'RhinoInit','2023-11-29 14:01:51','2023-11-29 14:01:51',0),(20240104123228,'PageTree','2024-01-04 12:40:53','2024-01-04 12:40:53',0);
/*!40000 ALTER TABLE `rhino_phinxlog` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rhino_roles`
--

DROP TABLE IF EXISTS `rhino_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rhino_roles` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `access` text NOT NULL,
  `created` timestamp NULL DEFAULT current_timestamp(),
  `modified` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rhino_roles`
--

LOCK TABLES `rhino_roles` WRITE;
/*!40000 ALTER TABLE `rhino_roles` DISABLE KEYS */;
INSERT INTO `rhino_roles` VALUES (1,'Admin','{\"example_view\":\"1\",\"example_edit\":\"1\",\"example_add\":\"1\",\"example_delete\":\"1\",\"rhino_apps_view\":\"1\",\"rhino_apps_edit\":\"1\",\"rhino_apps_add\":\"1\",\"rhino_apps_delete\":\"1\",\"rhino_contents_view\":\"1\",\"rhino_contents_edit\":\"1\",\"rhino_contents_add\":\"1\",\"rhino_contents_delete\":\"1\",\"rhino_elements_view\":\"1\",\"rhino_elements_edit\":\"1\",\"rhino_elements_add\":\"1\",\"rhino_elements_delete\":\"1\",\"rhino_fields_view\":\"1\",\"rhino_fields_edit\":\"1\",\"rhino_fields_add\":\"1\",\"rhino_fields_delete\":\"1\",\"rhino_groups_view\":\"1\",\"rhino_groups_edit\":\"1\",\"rhino_groups_add\":\"1\",\"rhino_groups_delete\":\"1\",\"rhino_layouts_view\":\"1\",\"rhino_layouts_edit\":\"1\",\"rhino_layouts_add\":\"1\",\"rhino_layouts_delete\":\"1\",\"rhino_media_view\":\"1\",\"rhino_media_edit\":\"1\",\"rhino_media_add\":\"1\",\"rhino_media_delete\":\"1\",\"rhino_media_categories_view\":\"1\",\"rhino_media_categories_edit\":\"1\",\"rhino_media_categories_add\":\"1\",\"rhino_media_categories_delete\":\"1\",\"rhino_pages_view\":\"1\",\"rhino_pages_edit\":\"1\",\"rhino_pages_add\":\"1\",\"rhino_pages_delete\":\"1\",\"rhino_roles_view\":\"1\",\"rhino_roles_edit\":\"1\",\"rhino_roles_add\":\"1\",\"rhino_roles_delete\":\"1\",\"rhino_users_view\":\"1\",\"rhino_users_edit\":\"1\",\"rhino_users_add\":\"1\",\"rhino_users_delete\":\"1\",\"rhino_widget_categories_view\":\"1\",\"rhino_widget_categories_edit\":\"1\",\"rhino_widget_categories_add\":\"1\",\"rhino_widget_categories_delete\":\"1\",\"rhino_widgets_view\":\"1\",\"rhino_widgets_edit\":\"1\",\"rhino_widgets_add\":\"1\",\"rhino_widgets_delete\":\"1\",\"test_view\":\"1\",\"test_edit\":\"1\",\"test_add\":\"1\",\"test_delete\":\"1\"}','2023-11-29 14:01:51','2024-01-02 10:50:13'),(2,'Redakteur','','2023-11-29 14:01:51','2023-11-29 14:01:51'),(3,'User','','2023-11-29 14:01:51','2023-11-29 14:01:51');
/*!40000 ALTER TABLE `rhino_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rhino_users`
--

DROP TABLE IF EXISTS `rhino_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rhino_users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role_id` varchar(100) NOT NULL DEFAULT '1',
  `theme` varchar(255) NOT NULL DEFAULT 'rhino',
  `password` varchar(255) NOT NULL,
  `active` tinyint(1) DEFAULT 1,
  `created` timestamp NULL DEFAULT current_timestamp(),
  `modified` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rhino_users`
--

LOCK TABLES `rhino_users` WRITE;
/*!40000 ALTER TABLE `rhino_users` DISABLE KEYS */;
INSERT INTO `rhino_users` VALUES (1,'Carsten Coull','carsten.coull@swu.de','1','rhino','$2y$10$TPYE/dE9sPn/pAlDNCJpsuviDyoD3d09HdxDNNFXIm/BAhfVBTLMC',1,'2023-11-29 15:31:15','2023-11-29 15:31:15');
/*!40000 ALTER TABLE `rhino_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rhino_widget_categories`
--

DROP TABLE IF EXISTS `rhino_widget_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rhino_widget_categories` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rhino_widget_categories`
--

LOCK TABLES `rhino_widget_categories` WRITE;
/*!40000 ALTER TABLE `rhino_widget_categories` DISABLE KEYS */;
INSERT INTO `rhino_widget_categories` VALUES (1,'Basic','');
/*!40000 ALTER TABLE `rhino_widget_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rhino_widgets`
--

DROP TABLE IF EXISTS `rhino_widgets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rhino_widgets` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `template` varchar(255) DEFAULT NULL,
  `widget_category_id` int(11) DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  `created` timestamp NULL DEFAULT current_timestamp(),
  `modified` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rhino_widgets`
--

LOCK TABLES `rhino_widgets` WRITE;
/*!40000 ALTER TABLE `rhino_widgets` DISABLE KEYS */;
INSERT INTO `rhino_widgets` VALUES (1,'Test','{\"html\":\"Some Text\"}','text.php',1,1,'2023-11-29 15:41:07','2023-11-29 15:53:57');
/*!40000 ALTER TABLE `rhino_widgets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `test`
--

DROP TABLE IF EXISTS `test`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `test` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `test`
--

LOCK TABLES `test` WRITE;
/*!40000 ALTER TABLE `test` DISABLE KEYS */;
INSERT INTO `test` VALUES (1,'Carsten Coull'),(2,'Johannes Braun');
/*!40000 ALTER TABLE `test` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-01-04 16:04:07
