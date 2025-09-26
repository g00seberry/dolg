-- MySQL dump 10.13  Distrib 8.0.42, for Win64 (x86_64)
--
-- Host: localhost    Database: dolg
-- ------------------------------------------------------
-- Server version	9.1.0

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `wp_commentmeta`
--

DROP TABLE IF EXISTS `wp_commentmeta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wp_commentmeta` (
  `meta_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `comment_id` bigint unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_520_ci,
  PRIMARY KEY (`meta_id`),
  KEY `comment_id` (`comment_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_commentmeta`
--

LOCK TABLES `wp_commentmeta` WRITE;
/*!40000 ALTER TABLE `wp_commentmeta` DISABLE KEYS */;
/*!40000 ALTER TABLE `wp_commentmeta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_comments`
--

DROP TABLE IF EXISTS `wp_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wp_comments` (
  `comment_ID` bigint unsigned NOT NULL AUTO_INCREMENT,
  `comment_post_ID` bigint unsigned NOT NULL DEFAULT '0',
  `comment_author` tinytext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `comment_author_email` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `comment_author_url` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `comment_author_IP` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `comment_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_content` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `comment_karma` int NOT NULL DEFAULT '0',
  `comment_approved` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '1',
  `comment_agent` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `comment_type` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'comment',
  `comment_parent` bigint unsigned NOT NULL DEFAULT '0',
  `user_id` bigint unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`comment_ID`),
  KEY `comment_post_ID` (`comment_post_ID`),
  KEY `comment_approved_date_gmt` (`comment_approved`,`comment_date_gmt`),
  KEY `comment_date_gmt` (`comment_date_gmt`),
  KEY `comment_parent` (`comment_parent`),
  KEY `comment_author_email` (`comment_author_email`(10))
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_comments`
--

LOCK TABLES `wp_comments` WRITE;
/*!40000 ALTER TABLE `wp_comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `wp_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_links`
--

DROP TABLE IF EXISTS `wp_links`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wp_links` (
  `link_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `link_url` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `link_name` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `link_image` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `link_target` varchar(25) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `link_description` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `link_visible` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'Y',
  `link_owner` bigint unsigned NOT NULL DEFAULT '1',
  `link_rating` int NOT NULL DEFAULT '0',
  `link_updated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `link_rel` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `link_notes` mediumtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `link_rss` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`link_id`),
  KEY `link_visible` (`link_visible`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_links`
--

LOCK TABLES `wp_links` WRITE;
/*!40000 ALTER TABLE `wp_links` DISABLE KEYS */;
/*!40000 ALTER TABLE `wp_links` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_options`
--

DROP TABLE IF EXISTS `wp_options`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wp_options` (
  `option_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `option_name` varchar(191) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `option_value` longtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `autoload` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'yes',
  PRIMARY KEY (`option_id`),
  UNIQUE KEY `option_name` (`option_name`),
  KEY `autoload` (`autoload`)
) ENGINE=InnoDB AUTO_INCREMENT=677 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_options`
--

LOCK TABLES `wp_options` WRITE;
/*!40000 ALTER TABLE `wp_options` DISABLE KEYS */;
INSERT INTO `wp_options` VALUES (1,'cron','a:12:{i:1758878097;a:1:{s:34:\"wp_privacy_delete_old_export_files\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:6:\"hourly\";s:4:\"args\";a:0:{}s:8:\"interval\";i:3600;}}}i:1758892497;a:1:{s:32:\"recovery_mode_clean_expired_keys\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}}i:1758892506;a:3:{s:19:\"wp_scheduled_delete\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}s:25:\"delete_expired_transients\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}s:21:\"wp_update_user_counts\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}}i:1758892509;a:1:{s:30:\"wp_scheduled_auto_draft_delete\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}}i:1758892602;a:2:{s:13:\"wpseo-reindex\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}s:31:\"wpseo_permalink_structure_check\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}}i:1758896096;a:1:{s:16:\"wp_version_check\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}}i:1758897896;a:1:{s:17:\"wp_update_plugins\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}}i:1758899696;a:1:{s:16:\"wp_update_themes\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}}i:1759324564;a:1:{s:30:\"wp_delete_temp_updater_backups\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:6:\"weekly\";s:4:\"args\";a:0:{}s:8:\"interval\";i:604800;}}}i:1759330237;a:1:{s:27:\"acf_update_site_health_data\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:6:\"weekly\";s:4:\"args\";a:0:{}s:8:\"interval\";i:604800;}}}i:1759410897;a:1:{s:30:\"wp_site_health_scheduled_check\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:6:\"weekly\";s:4:\"args\";a:0:{}s:8:\"interval\";i:604800;}}}s:7:\"version\";i:2;}','on'),(2,'siteurl','http://dolg.loc','on'),(3,'home','http://dolg.loc','on'),(4,'blogname','Финансовый щит','on'),(5,'blogdescription','','on'),(6,'users_can_register','0','on'),(7,'admin_email','a@a.ru','on'),(8,'start_of_week','1','on'),(9,'use_balanceTags','0','on'),(10,'use_smilies','1','on'),(11,'require_name_email','1','on'),(12,'comments_notify','1','on'),(13,'posts_per_rss','10','on'),(14,'rss_use_excerpt','0','on'),(15,'mailserver_url','mail.example.com','on'),(16,'mailserver_login','login@example.com','on'),(17,'mailserver_pass','','on'),(18,'mailserver_port','110','on'),(19,'default_category','1','on'),(20,'default_comment_status','open','on'),(21,'default_ping_status','open','on'),(22,'default_pingback_flag','1','on'),(23,'posts_per_page','10','on'),(24,'date_format','d.m.Y','on'),(25,'time_format','H:i','on'),(26,'links_updated_date_format','d.m.Y H:i','on'),(27,'comment_moderation','0','on'),(28,'moderation_notify','1','on'),(29,'permalink_structure','/%year%/%monthnum%/%day%/%postname%/','on'),(30,'rewrite_rules','a:121:{s:11:\"^wp-json/?$\";s:22:\"index.php?rest_route=/\";s:14:\"^wp-json/(.*)?\";s:33:\"index.php?rest_route=/$matches[1]\";s:21:\"^index.php/wp-json/?$\";s:22:\"index.php?rest_route=/\";s:24:\"^index.php/wp-json/(.*)?\";s:33:\"index.php?rest_route=/$matches[1]\";s:17:\"^wp-sitemap\\.xml$\";s:23:\"index.php?sitemap=index\";s:17:\"^wp-sitemap\\.xsl$\";s:36:\"index.php?sitemap-stylesheet=sitemap\";s:23:\"^wp-sitemap-index\\.xsl$\";s:34:\"index.php?sitemap-stylesheet=index\";s:48:\"^wp-sitemap-([a-z]+?)-([a-z\\d_-]+?)-(\\d+?)\\.xml$\";s:75:\"index.php?sitemap=$matches[1]&sitemap-subtype=$matches[2]&paged=$matches[3]\";s:34:\"^wp-sitemap-([a-z]+?)-(\\d+?)\\.xml$\";s:47:\"index.php?sitemap=$matches[1]&paged=$matches[2]\";s:15:\"case-studies/?$\";s:30:\"index.php?post_type=case_study\";s:45:\"case-studies/feed/(feed|rdf|rss|rss2|atom)/?$\";s:47:\"index.php?post_type=case_study&feed=$matches[1]\";s:40:\"case-studies/(feed|rdf|rss|rss2|atom)/?$\";s:47:\"index.php?post_type=case_study&feed=$matches[1]\";s:32:\"case-studies/page/([0-9]{1,})/?$\";s:48:\"index.php?post_type=case_study&paged=$matches[1]\";s:47:\"category/(.+?)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:52:\"index.php?category_name=$matches[1]&feed=$matches[2]\";s:42:\"category/(.+?)/(feed|rdf|rss|rss2|atom)/?$\";s:52:\"index.php?category_name=$matches[1]&feed=$matches[2]\";s:23:\"category/(.+?)/embed/?$\";s:46:\"index.php?category_name=$matches[1]&embed=true\";s:35:\"category/(.+?)/page/?([0-9]{1,})/?$\";s:53:\"index.php?category_name=$matches[1]&paged=$matches[2]\";s:17:\"category/(.+?)/?$\";s:35:\"index.php?category_name=$matches[1]\";s:44:\"tag/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:42:\"index.php?tag=$matches[1]&feed=$matches[2]\";s:39:\"tag/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:42:\"index.php?tag=$matches[1]&feed=$matches[2]\";s:20:\"tag/([^/]+)/embed/?$\";s:36:\"index.php?tag=$matches[1]&embed=true\";s:32:\"tag/([^/]+)/page/?([0-9]{1,})/?$\";s:43:\"index.php?tag=$matches[1]&paged=$matches[2]\";s:14:\"tag/([^/]+)/?$\";s:25:\"index.php?tag=$matches[1]\";s:45:\"type/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:50:\"index.php?post_format=$matches[1]&feed=$matches[2]\";s:40:\"type/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:50:\"index.php?post_format=$matches[1]&feed=$matches[2]\";s:21:\"type/([^/]+)/embed/?$\";s:44:\"index.php?post_format=$matches[1]&embed=true\";s:33:\"type/([^/]+)/page/?([0-9]{1,})/?$\";s:51:\"index.php?post_format=$matches[1]&paged=$matches[2]\";s:15:\"type/([^/]+)/?$\";s:33:\"index.php?post_format=$matches[1]\";s:40:\"case-studies/[^/]+/attachment/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:50:\"case-studies/[^/]+/attachment/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:70:\"case-studies/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:65:\"case-studies/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:65:\"case-studies/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:46:\"case-studies/[^/]+/attachment/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:29:\"case-studies/([^/]+)/embed/?$\";s:43:\"index.php?case_study=$matches[1]&embed=true\";s:33:\"case-studies/([^/]+)/trackback/?$\";s:37:\"index.php?case_study=$matches[1]&tb=1\";s:53:\"case-studies/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?case_study=$matches[1]&feed=$matches[2]\";s:48:\"case-studies/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?case_study=$matches[1]&feed=$matches[2]\";s:41:\"case-studies/([^/]+)/page/?([0-9]{1,})/?$\";s:50:\"index.php?case_study=$matches[1]&paged=$matches[2]\";s:48:\"case-studies/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?case_study=$matches[1]&cpage=$matches[2]\";s:37:\"case-studies/([^/]+)(?:/([0-9]+))?/?$\";s:49:\"index.php?case_study=$matches[1]&page=$matches[2]\";s:29:\"case-studies/[^/]+/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:39:\"case-studies/[^/]+/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:59:\"case-studies/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:54:\"case-studies/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:54:\"case-studies/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:35:\"case-studies/[^/]+/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:12:\"robots\\.txt$\";s:18:\"index.php?robots=1\";s:13:\"favicon\\.ico$\";s:19:\"index.php?favicon=1\";s:12:\"sitemap\\.xml\";s:24:\"index.php??sitemap=index\";s:48:\".*wp-(atom|rdf|rss|rss2|feed|commentsrss2)\\.php$\";s:18:\"index.php?feed=old\";s:20:\".*wp-app\\.php(/.*)?$\";s:19:\"index.php?error=403\";s:18:\".*wp-register.php$\";s:23:\"index.php?register=true\";s:32:\"feed/(feed|rdf|rss|rss2|atom)/?$\";s:27:\"index.php?&feed=$matches[1]\";s:27:\"(feed|rdf|rss|rss2|atom)/?$\";s:27:\"index.php?&feed=$matches[1]\";s:8:\"embed/?$\";s:21:\"index.php?&embed=true\";s:20:\"page/?([0-9]{1,})/?$\";s:28:\"index.php?&paged=$matches[1]\";s:27:\"comment-page-([0-9]{1,})/?$\";s:39:\"index.php?&page_id=11&cpage=$matches[1]\";s:41:\"comments/feed/(feed|rdf|rss|rss2|atom)/?$\";s:42:\"index.php?&feed=$matches[1]&withcomments=1\";s:36:\"comments/(feed|rdf|rss|rss2|atom)/?$\";s:42:\"index.php?&feed=$matches[1]&withcomments=1\";s:17:\"comments/embed/?$\";s:21:\"index.php?&embed=true\";s:44:\"search/(.+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:40:\"index.php?s=$matches[1]&feed=$matches[2]\";s:39:\"search/(.+)/(feed|rdf|rss|rss2|atom)/?$\";s:40:\"index.php?s=$matches[1]&feed=$matches[2]\";s:20:\"search/(.+)/embed/?$\";s:34:\"index.php?s=$matches[1]&embed=true\";s:32:\"search/(.+)/page/?([0-9]{1,})/?$\";s:41:\"index.php?s=$matches[1]&paged=$matches[2]\";s:14:\"search/(.+)/?$\";s:23:\"index.php?s=$matches[1]\";s:47:\"author/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:50:\"index.php?author_name=$matches[1]&feed=$matches[2]\";s:42:\"author/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:50:\"index.php?author_name=$matches[1]&feed=$matches[2]\";s:23:\"author/([^/]+)/embed/?$\";s:44:\"index.php?author_name=$matches[1]&embed=true\";s:35:\"author/([^/]+)/page/?([0-9]{1,})/?$\";s:51:\"index.php?author_name=$matches[1]&paged=$matches[2]\";s:17:\"author/([^/]+)/?$\";s:33:\"index.php?author_name=$matches[1]\";s:69:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/feed/(feed|rdf|rss|rss2|atom)/?$\";s:80:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&feed=$matches[4]\";s:64:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/(feed|rdf|rss|rss2|atom)/?$\";s:80:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&feed=$matches[4]\";s:45:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/embed/?$\";s:74:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&embed=true\";s:57:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/page/?([0-9]{1,})/?$\";s:81:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&paged=$matches[4]\";s:39:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/?$\";s:63:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]\";s:56:\"([0-9]{4})/([0-9]{1,2})/feed/(feed|rdf|rss|rss2|atom)/?$\";s:64:\"index.php?year=$matches[1]&monthnum=$matches[2]&feed=$matches[3]\";s:51:\"([0-9]{4})/([0-9]{1,2})/(feed|rdf|rss|rss2|atom)/?$\";s:64:\"index.php?year=$matches[1]&monthnum=$matches[2]&feed=$matches[3]\";s:32:\"([0-9]{4})/([0-9]{1,2})/embed/?$\";s:58:\"index.php?year=$matches[1]&monthnum=$matches[2]&embed=true\";s:44:\"([0-9]{4})/([0-9]{1,2})/page/?([0-9]{1,})/?$\";s:65:\"index.php?year=$matches[1]&monthnum=$matches[2]&paged=$matches[3]\";s:26:\"([0-9]{4})/([0-9]{1,2})/?$\";s:47:\"index.php?year=$matches[1]&monthnum=$matches[2]\";s:43:\"([0-9]{4})/feed/(feed|rdf|rss|rss2|atom)/?$\";s:43:\"index.php?year=$matches[1]&feed=$matches[2]\";s:38:\"([0-9]{4})/(feed|rdf|rss|rss2|atom)/?$\";s:43:\"index.php?year=$matches[1]&feed=$matches[2]\";s:19:\"([0-9]{4})/embed/?$\";s:37:\"index.php?year=$matches[1]&embed=true\";s:31:\"([0-9]{4})/page/?([0-9]{1,})/?$\";s:44:\"index.php?year=$matches[1]&paged=$matches[2]\";s:13:\"([0-9]{4})/?$\";s:26:\"index.php?year=$matches[1]\";s:58:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/attachment/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:68:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/attachment/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:88:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:83:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:83:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:64:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/attachment/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:53:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)/embed/?$\";s:91:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&embed=true\";s:57:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)/trackback/?$\";s:85:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&tb=1\";s:77:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:97:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&feed=$matches[5]\";s:72:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:97:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&feed=$matches[5]\";s:65:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)/page/?([0-9]{1,})/?$\";s:98:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&paged=$matches[5]\";s:72:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)/comment-page-([0-9]{1,})/?$\";s:98:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&cpage=$matches[5]\";s:61:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)(?:/([0-9]+))?/?$\";s:97:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&page=$matches[5]\";s:47:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:57:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:77:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:72:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:72:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:53:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:64:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/comment-page-([0-9]{1,})/?$\";s:81:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&cpage=$matches[4]\";s:51:\"([0-9]{4})/([0-9]{1,2})/comment-page-([0-9]{1,})/?$\";s:65:\"index.php?year=$matches[1]&monthnum=$matches[2]&cpage=$matches[3]\";s:38:\"([0-9]{4})/comment-page-([0-9]{1,})/?$\";s:44:\"index.php?year=$matches[1]&cpage=$matches[2]\";s:27:\".?.+?/attachment/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:37:\".?.+?/attachment/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:57:\".?.+?/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:52:\".?.+?/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:52:\".?.+?/attachment/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:33:\".?.+?/attachment/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:16:\"(.?.+?)/embed/?$\";s:41:\"index.php?pagename=$matches[1]&embed=true\";s:20:\"(.?.+?)/trackback/?$\";s:35:\"index.php?pagename=$matches[1]&tb=1\";s:40:\"(.?.+?)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:47:\"index.php?pagename=$matches[1]&feed=$matches[2]\";s:35:\"(.?.+?)/(feed|rdf|rss|rss2|atom)/?$\";s:47:\"index.php?pagename=$matches[1]&feed=$matches[2]\";s:28:\"(.?.+?)/page/?([0-9]{1,})/?$\";s:48:\"index.php?pagename=$matches[1]&paged=$matches[2]\";s:35:\"(.?.+?)/comment-page-([0-9]{1,})/?$\";s:48:\"index.php?pagename=$matches[1]&cpage=$matches[2]\";s:24:\"(.?.+?)(?:/([0-9]+))?/?$\";s:47:\"index.php?pagename=$matches[1]&page=$matches[2]\";}','on'),(31,'hack_file','0','on'),(32,'blog_charset','UTF-8','on'),(33,'moderation_keys','','off'),(34,'active_plugins','a:5:{i:0;s:34:\"advanced-custom-fields-pro/acf.php\";i:1;s:33:\"classic-editor/classic-editor.php\";i:2;s:36:\"contact-form-7/wp-contact-form-7.php\";i:3;s:22:\"cyr2lat/cyr-to-lat.php\";i:4;s:24:\"wordpress-seo/wp-seo.php\";}','on'),(35,'category_base','','on'),(36,'ping_sites','https://rpc.pingomatic.com/','on'),(37,'comment_max_links','2','on'),(38,'gmt_offset','3','on'),(39,'default_email_category','1','on'),(40,'recently_edited','','off'),(41,'template','udsc','on'),(42,'stylesheet','udsc','on'),(43,'comment_registration','0','on'),(44,'html_type','text/html','on'),(45,'use_trackback','0','on'),(46,'default_role','subscriber','on'),(47,'db_version','60421','on'),(48,'uploads_use_yearmonth_folders','1','on'),(49,'upload_path','','on'),(50,'blog_public','1','on'),(51,'default_link_category','2','on'),(52,'show_on_front','page','on'),(53,'tag_base','','on'),(54,'show_avatars','1','on'),(55,'avatar_rating','G','on'),(56,'upload_url_path','','on'),(57,'thumbnail_size_w','150','on'),(58,'thumbnail_size_h','150','on'),(59,'thumbnail_crop','1','on'),(60,'medium_size_w','300','on'),(61,'medium_size_h','300','on'),(62,'avatar_default','mystery','on'),(63,'large_size_w','1024','on'),(64,'large_size_h','1024','on'),(65,'image_default_link_type','none','on'),(66,'image_default_size','','on'),(67,'image_default_align','','on'),(68,'close_comments_for_old_posts','0','on'),(69,'close_comments_days_old','14','on'),(70,'thread_comments','1','on'),(71,'thread_comments_depth','5','on'),(72,'page_comments','0','on'),(73,'comments_per_page','50','on'),(74,'default_comments_page','newest','on'),(75,'comment_order','asc','on'),(76,'sticky_posts','a:0:{}','on'),(77,'widget_categories','a:2:{i:1;a:0:{}s:12:\"_multiwidget\";i:1;}','auto'),(78,'widget_text','a:2:{i:1;a:0:{}s:12:\"_multiwidget\";i:1;}','auto'),(79,'widget_rss','a:2:{i:1;a:0:{}s:12:\"_multiwidget\";i:1;}','auto'),(80,'uninstall_plugins','a:1:{s:24:\"wordpress-seo/wp-seo.php\";s:14:\"__return_false\";}','off'),(81,'timezone_string','','on'),(82,'page_for_posts','0','on'),(83,'page_on_front','11','on'),(84,'default_post_format','0','on'),(85,'link_manager_enabled','0','on'),(86,'finished_splitting_shared_terms','1','on'),(87,'site_icon','0','on'),(88,'medium_large_size_w','768','on'),(89,'medium_large_size_h','0','on'),(90,'wp_page_for_privacy_policy','3','on'),(91,'show_comments_cookies_opt_in','1','on'),(92,'admin_email_lifespan','1774271696','on'),(93,'disallowed_keys','','off'),(94,'comment_previously_approved','1','on'),(95,'auto_plugin_theme_update_emails','a:0:{}','off'),(96,'auto_update_core_dev','enabled','on'),(97,'auto_update_core_minor','enabled','on'),(98,'auto_update_core_major','enabled','on'),(99,'wp_force_deactivated_plugins','a:0:{}','on'),(100,'wp_attachment_pages_enabled','0','on'),(101,'initial_db_version','60421','on'),(102,'wp_user_roles','a:7:{s:13:\"administrator\";a:2:{s:4:\"name\";s:13:\"Administrator\";s:12:\"capabilities\";a:62:{s:13:\"switch_themes\";b:1;s:11:\"edit_themes\";b:1;s:16:\"activate_plugins\";b:1;s:12:\"edit_plugins\";b:1;s:10:\"edit_users\";b:1;s:10:\"edit_files\";b:1;s:14:\"manage_options\";b:1;s:17:\"moderate_comments\";b:1;s:17:\"manage_categories\";b:1;s:12:\"manage_links\";b:1;s:12:\"upload_files\";b:1;s:6:\"import\";b:1;s:15:\"unfiltered_html\";b:1;s:10:\"edit_posts\";b:1;s:17:\"edit_others_posts\";b:1;s:20:\"edit_published_posts\";b:1;s:13:\"publish_posts\";b:1;s:10:\"edit_pages\";b:1;s:4:\"read\";b:1;s:8:\"level_10\";b:1;s:7:\"level_9\";b:1;s:7:\"level_8\";b:1;s:7:\"level_7\";b:1;s:7:\"level_6\";b:1;s:7:\"level_5\";b:1;s:7:\"level_4\";b:1;s:7:\"level_3\";b:1;s:7:\"level_2\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:17:\"edit_others_pages\";b:1;s:20:\"edit_published_pages\";b:1;s:13:\"publish_pages\";b:1;s:12:\"delete_pages\";b:1;s:19:\"delete_others_pages\";b:1;s:22:\"delete_published_pages\";b:1;s:12:\"delete_posts\";b:1;s:19:\"delete_others_posts\";b:1;s:22:\"delete_published_posts\";b:1;s:20:\"delete_private_posts\";b:1;s:18:\"edit_private_posts\";b:1;s:18:\"read_private_posts\";b:1;s:20:\"delete_private_pages\";b:1;s:18:\"edit_private_pages\";b:1;s:18:\"read_private_pages\";b:1;s:12:\"delete_users\";b:1;s:12:\"create_users\";b:1;s:17:\"unfiltered_upload\";b:1;s:14:\"edit_dashboard\";b:1;s:14:\"update_plugins\";b:1;s:14:\"delete_plugins\";b:1;s:15:\"install_plugins\";b:1;s:13:\"update_themes\";b:1;s:14:\"install_themes\";b:1;s:11:\"update_core\";b:1;s:10:\"list_users\";b:1;s:12:\"remove_users\";b:1;s:13:\"promote_users\";b:1;s:18:\"edit_theme_options\";b:1;s:13:\"delete_themes\";b:1;s:6:\"export\";b:1;s:20:\"wpseo_manage_options\";b:1;}}s:6:\"editor\";a:2:{s:4:\"name\";s:6:\"Editor\";s:12:\"capabilities\";a:36:{s:17:\"moderate_comments\";b:1;s:17:\"manage_categories\";b:1;s:12:\"manage_links\";b:1;s:12:\"upload_files\";b:1;s:15:\"unfiltered_html\";b:1;s:10:\"edit_posts\";b:1;s:17:\"edit_others_posts\";b:1;s:20:\"edit_published_posts\";b:1;s:13:\"publish_posts\";b:1;s:10:\"edit_pages\";b:1;s:4:\"read\";b:1;s:7:\"level_7\";b:1;s:7:\"level_6\";b:1;s:7:\"level_5\";b:1;s:7:\"level_4\";b:1;s:7:\"level_3\";b:1;s:7:\"level_2\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:17:\"edit_others_pages\";b:1;s:20:\"edit_published_pages\";b:1;s:13:\"publish_pages\";b:1;s:12:\"delete_pages\";b:1;s:19:\"delete_others_pages\";b:1;s:22:\"delete_published_pages\";b:1;s:12:\"delete_posts\";b:1;s:19:\"delete_others_posts\";b:1;s:22:\"delete_published_posts\";b:1;s:20:\"delete_private_posts\";b:1;s:18:\"edit_private_posts\";b:1;s:18:\"read_private_posts\";b:1;s:20:\"delete_private_pages\";b:1;s:18:\"edit_private_pages\";b:1;s:18:\"read_private_pages\";b:1;s:15:\"wpseo_bulk_edit\";b:1;s:28:\"wpseo_edit_advanced_metadata\";b:1;}}s:6:\"author\";a:2:{s:4:\"name\";s:6:\"Author\";s:12:\"capabilities\";a:10:{s:12:\"upload_files\";b:1;s:10:\"edit_posts\";b:1;s:20:\"edit_published_posts\";b:1;s:13:\"publish_posts\";b:1;s:4:\"read\";b:1;s:7:\"level_2\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:12:\"delete_posts\";b:1;s:22:\"delete_published_posts\";b:1;}}s:11:\"contributor\";a:2:{s:4:\"name\";s:11:\"Contributor\";s:12:\"capabilities\";a:5:{s:10:\"edit_posts\";b:1;s:4:\"read\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:12:\"delete_posts\";b:1;}}s:10:\"subscriber\";a:2:{s:4:\"name\";s:10:\"Subscriber\";s:12:\"capabilities\";a:2:{s:4:\"read\";b:1;s:7:\"level_0\";b:1;}}s:13:\"wpseo_manager\";a:2:{s:4:\"name\";s:11:\"SEO Manager\";s:12:\"capabilities\";a:38:{s:17:\"moderate_comments\";b:1;s:17:\"manage_categories\";b:1;s:12:\"manage_links\";b:1;s:12:\"upload_files\";b:1;s:15:\"unfiltered_html\";b:1;s:10:\"edit_posts\";b:1;s:17:\"edit_others_posts\";b:1;s:20:\"edit_published_posts\";b:1;s:13:\"publish_posts\";b:1;s:10:\"edit_pages\";b:1;s:4:\"read\";b:1;s:7:\"level_7\";b:1;s:7:\"level_6\";b:1;s:7:\"level_5\";b:1;s:7:\"level_4\";b:1;s:7:\"level_3\";b:1;s:7:\"level_2\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:17:\"edit_others_pages\";b:1;s:20:\"edit_published_pages\";b:1;s:13:\"publish_pages\";b:1;s:12:\"delete_pages\";b:1;s:19:\"delete_others_pages\";b:1;s:22:\"delete_published_pages\";b:1;s:12:\"delete_posts\";b:1;s:19:\"delete_others_posts\";b:1;s:22:\"delete_published_posts\";b:1;s:20:\"delete_private_posts\";b:1;s:18:\"edit_private_posts\";b:1;s:18:\"read_private_posts\";b:1;s:20:\"delete_private_pages\";b:1;s:18:\"edit_private_pages\";b:1;s:18:\"read_private_pages\";b:1;s:15:\"wpseo_bulk_edit\";b:1;s:28:\"wpseo_edit_advanced_metadata\";b:1;s:20:\"wpseo_manage_options\";b:1;s:23:\"view_site_health_checks\";b:1;}}s:12:\"wpseo_editor\";a:2:{s:4:\"name\";s:10:\"SEO Editor\";s:12:\"capabilities\";a:36:{s:17:\"moderate_comments\";b:1;s:17:\"manage_categories\";b:1;s:12:\"manage_links\";b:1;s:12:\"upload_files\";b:1;s:15:\"unfiltered_html\";b:1;s:10:\"edit_posts\";b:1;s:17:\"edit_others_posts\";b:1;s:20:\"edit_published_posts\";b:1;s:13:\"publish_posts\";b:1;s:10:\"edit_pages\";b:1;s:4:\"read\";b:1;s:7:\"level_7\";b:1;s:7:\"level_6\";b:1;s:7:\"level_5\";b:1;s:7:\"level_4\";b:1;s:7:\"level_3\";b:1;s:7:\"level_2\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:17:\"edit_others_pages\";b:1;s:20:\"edit_published_pages\";b:1;s:13:\"publish_pages\";b:1;s:12:\"delete_pages\";b:1;s:19:\"delete_others_pages\";b:1;s:22:\"delete_published_pages\";b:1;s:12:\"delete_posts\";b:1;s:19:\"delete_others_posts\";b:1;s:22:\"delete_published_posts\";b:1;s:20:\"delete_private_posts\";b:1;s:18:\"edit_private_posts\";b:1;s:18:\"read_private_posts\";b:1;s:20:\"delete_private_pages\";b:1;s:18:\"edit_private_pages\";b:1;s:18:\"read_private_pages\";b:1;s:15:\"wpseo_bulk_edit\";b:1;s:28:\"wpseo_edit_advanced_metadata\";b:1;}}}','on'),(103,'fresh_site','0','off'),(104,'WPLANG','ru_RU','auto'),(105,'user_count','1','off'),(106,'widget_block','a:6:{i:2;a:1:{s:7:\"content\";s:19:\"<!-- wp:search /-->\";}i:3;a:1:{s:7:\"content\";s:167:\"<!-- wp:group --><div class=\"wp-block-group\"><!-- wp:heading --><h2>Свежие записи</h2><!-- /wp:heading --><!-- wp:latest-posts /--></div><!-- /wp:group -->\";}i:4;a:1:{s:7:\"content\";s:247:\"<!-- wp:group --><div class=\"wp-block-group\"><!-- wp:heading --><h2>Свежие комментарии</h2><!-- /wp:heading --><!-- wp:latest-comments {\"displayAvatar\":false,\"displayDate\":false,\"displayExcerpt\":false} /--></div><!-- /wp:group -->\";}i:5;a:1:{s:7:\"content\";s:150:\"<!-- wp:group --><div class=\"wp-block-group\"><!-- wp:heading --><h2>Архивы</h2><!-- /wp:heading --><!-- wp:archives /--></div><!-- /wp:group -->\";}i:6;a:1:{s:7:\"content\";s:154:\"<!-- wp:group --><div class=\"wp-block-group\"><!-- wp:heading --><h2>Рубрики</h2><!-- /wp:heading --><!-- wp:categories /--></div><!-- /wp:group -->\";}s:12:\"_multiwidget\";i:1;}','auto'),(107,'sidebars_widgets','a:3:{s:19:\"wp_inactive_widgets\";a:0:{}s:9:\"sidebar-1\";a:0:{}s:13:\"array_version\";i:3;}','on'),(108,'widget_pages','a:1:{s:12:\"_multiwidget\";i:1;}','auto'),(109,'widget_calendar','a:1:{s:12:\"_multiwidget\";i:1;}','auto'),(110,'widget_archives','a:1:{s:12:\"_multiwidget\";i:1;}','auto'),(111,'widget_media_audio','a:1:{s:12:\"_multiwidget\";i:1;}','auto'),(112,'widget_media_image','a:1:{s:12:\"_multiwidget\";i:1;}','auto'),(113,'widget_media_gallery','a:1:{s:12:\"_multiwidget\";i:1;}','auto'),(114,'widget_media_video','a:1:{s:12:\"_multiwidget\";i:1;}','auto'),(115,'widget_meta','a:1:{s:12:\"_multiwidget\";i:1;}','auto'),(116,'widget_search','a:1:{s:12:\"_multiwidget\";i:1;}','auto'),(117,'widget_recent-posts','a:1:{s:12:\"_multiwidget\";i:1;}','auto'),(118,'widget_recent-comments','a:1:{s:12:\"_multiwidget\";i:1;}','auto'),(119,'widget_tag_cloud','a:1:{s:12:\"_multiwidget\";i:1;}','auto'),(120,'widget_nav_menu','a:1:{s:12:\"_multiwidget\";i:1;}','auto'),(121,'widget_custom_html','a:1:{s:12:\"_multiwidget\";i:1;}','auto'),(125,'recovery_keys','a:0:{}','off'),(126,'nonce_key',';LQU&/v+:Z=)nY!S%;Gl*oAVcP)*.3/A*oG hJ1:Z2_GfF 5T9~HP0!Y,3?37Q0`','off'),(127,'nonce_salt','~{6X}7W<YFfd#fm9}@Zxt(Yb2z:ju0(`KNVobke/c1v5OE;%(*fDuaOM.b5*hq5k','off'),(130,'auth_key','zblE5?]0(d.x)cc8z[0;-v#YhN{n|t}}4z#+[>,xv=r}FeqKA%e*YcaPUa&uw<AZ','off'),(131,'auth_salt','+~?$81atW0ya2Ephy)krD~QG+r1`/HBJdT-#{{Z1D|L_l}bY;d-n=oxhi=epimFY','off'),(132,'logged_in_key','}`o?D0RX=Ov37h,t>j+cA`gtMKXV%)BqJ&Hz8qAkdQ!@gti2^c1qTUg JF(`i]Pj','off'),(133,'logged_in_salt','%h|dl}vQ*5pNIx#*(8OAM*xHweb8V;~@hJPV%0CI|9j?kLF|w*5Fx5Z%UvaZk#1p','off'),(139,'_site_transient_timeout_browser_a3f57bbe21c4e30379228ad7788f224d','1759324509','off'),(140,'_site_transient_browser_a3f57bbe21c4e30379228ad7788f224d','a:10:{s:4:\"name\";s:6:\"Chrome\";s:7:\"version\";s:9:\"140.0.0.0\";s:8:\"platform\";s:7:\"Windows\";s:10:\"update_url\";s:29:\"https://www.google.com/chrome\";s:7:\"img_src\";s:43:\"http://s.w.org/images/browsers/chrome.png?1\";s:11:\"img_src_ssl\";s:44:\"https://s.w.org/images/browsers/chrome.png?1\";s:15:\"current_version\";s:2:\"18\";s:7:\"upgrade\";b:0;s:8:\"insecure\";b:0;s:6:\"mobile\";b:0;}','off'),(141,'_site_transient_timeout_php_check_fe7d39417db7b9047896cfef373da8f7','1759324509','off'),(142,'_site_transient_php_check_fe7d39417db7b9047896cfef373da8f7','a:5:{s:19:\"recommended_version\";s:3:\"8.3\";s:15:\"minimum_version\";s:6:\"7.2.24\";s:12:\"is_supported\";b:0;s:9:\"is_secure\";b:1;s:13:\"is_acceptable\";b:1;}','off'),(144,'can_compress_scripts','1','on'),(161,'_site_transient_wp_plugin_dependencies_plugin_data','a:0:{}','off'),(162,'recently_activated','a:0:{}','off'),(168,'finished_updating_comment_type','1','auto'),(178,'wpcf7','a:2:{s:7:\"version\";s:5:\"6.1.1\";s:13:\"bulk_validate\";a:4:{s:9:\"timestamp\";i:1758719799;s:7:\"version\";s:5:\"6.1.1\";s:11:\"count_valid\";i:1;s:13:\"count_invalid\";i:0;}}','auto'),(179,'yoast_migrations_free','a:1:{s:7:\"version\";s:4:\"26.0\";}','auto'),(180,'wpseo','a:116:{s:8:\"tracking\";b:0;s:16:\"toggled_tracking\";b:0;s:22:\"license_server_version\";b:0;s:15:\"ms_defaults_set\";b:0;s:40:\"ignore_search_engines_discouraged_notice\";b:0;s:19:\"indexing_first_time\";b:1;s:16:\"indexing_started\";b:0;s:15:\"indexing_reason\";s:26:\"permalink_settings_changed\";s:29:\"indexables_indexing_completed\";b:1;s:13:\"index_now_key\";s:0:\"\";s:7:\"version\";s:4:\"26.0\";s:16:\"previous_version\";s:0:\"\";s:20:\"disableadvanced_meta\";b:1;s:30:\"enable_headless_rest_endpoints\";b:1;s:17:\"ryte_indexability\";b:0;s:11:\"baiduverify\";s:0:\"\";s:12:\"googleverify\";s:0:\"\";s:8:\"msverify\";s:0:\"\";s:12:\"yandexverify\";s:0:\"\";s:9:\"site_type\";s:0:\"\";s:20:\"has_multiple_authors\";s:0:\"\";s:16:\"environment_type\";s:0:\"\";s:23:\"content_analysis_active\";b:1;s:23:\"keyword_analysis_active\";b:1;s:34:\"inclusive_language_analysis_active\";b:0;s:21:\"enable_admin_bar_menu\";b:1;s:26:\"enable_cornerstone_content\";b:1;s:18:\"enable_xml_sitemap\";b:1;s:24:\"enable_text_link_counter\";b:1;s:16:\"enable_index_now\";b:1;s:19:\"enable_ai_generator\";b:1;s:22:\"ai_enabled_pre_default\";b:0;s:22:\"show_onboarding_notice\";b:1;s:18:\"first_activated_on\";i:1758719802;s:13:\"myyoast-oauth\";b:0;s:26:\"semrush_integration_active\";b:1;s:14:\"semrush_tokens\";a:0:{}s:20:\"semrush_country_code\";s:2:\"us\";s:19:\"permalink_structure\";s:36:\"/%year%/%monthnum%/%day%/%postname%/\";s:8:\"home_url\";s:15:\"http://dolg.loc\";s:18:\"dynamic_permalinks\";b:0;s:17:\"category_base_url\";s:0:\"\";s:12:\"tag_base_url\";s:0:\"\";s:21:\"custom_taxonomy_slugs\";a:0:{}s:29:\"enable_enhanced_slack_sharing\";b:1;s:23:\"enable_metabox_insights\";b:1;s:23:\"enable_link_suggestions\";b:1;s:26:\"algolia_integration_active\";b:0;s:14:\"import_cursors\";a:0:{}s:13:\"workouts_data\";a:1:{s:13:\"configuration\";a:1:{s:13:\"finishedSteps\";a:0:{}}}s:28:\"configuration_finished_steps\";a:0:{}s:36:\"dismiss_configuration_workout_notice\";b:0;s:34:\"dismiss_premium_deactivated_notice\";b:0;s:19:\"importing_completed\";a:0:{}s:26:\"wincher_integration_active\";b:1;s:14:\"wincher_tokens\";a:0:{}s:36:\"wincher_automatically_add_keyphrases\";b:0;s:18:\"wincher_website_id\";s:0:\"\";s:18:\"first_time_install\";b:1;s:34:\"should_redirect_after_install_free\";b:0;s:34:\"activation_redirect_timestamp_free\";i:1758719802;s:18:\"remove_feed_global\";b:0;s:27:\"remove_feed_global_comments\";b:0;s:25:\"remove_feed_post_comments\";b:0;s:19:\"remove_feed_authors\";b:0;s:22:\"remove_feed_categories\";b:0;s:16:\"remove_feed_tags\";b:0;s:29:\"remove_feed_custom_taxonomies\";b:0;s:22:\"remove_feed_post_types\";b:0;s:18:\"remove_feed_search\";b:0;s:21:\"remove_atom_rdf_feeds\";b:0;s:17:\"remove_shortlinks\";b:0;s:21:\"remove_rest_api_links\";b:0;s:20:\"remove_rsd_wlw_links\";b:0;s:19:\"remove_oembed_links\";b:0;s:16:\"remove_generator\";b:0;s:20:\"remove_emoji_scripts\";b:0;s:24:\"remove_powered_by_header\";b:0;s:22:\"remove_pingback_header\";b:0;s:28:\"clean_campaign_tracking_urls\";b:0;s:16:\"clean_permalinks\";b:0;s:32:\"clean_permalinks_extra_variables\";s:0:\"\";s:14:\"search_cleanup\";b:0;s:20:\"search_cleanup_emoji\";b:0;s:23:\"search_cleanup_patterns\";b:0;s:22:\"search_character_limit\";i:50;s:20:\"deny_search_crawling\";b:0;s:21:\"deny_wp_json_crawling\";b:0;s:20:\"deny_adsbot_crawling\";b:0;s:19:\"deny_ccbot_crawling\";b:0;s:29:\"deny_google_extended_crawling\";b:0;s:20:\"deny_gptbot_crawling\";b:0;s:27:\"redirect_search_pretty_urls\";b:0;s:29:\"least_readability_ignore_list\";a:0:{}s:27:\"least_seo_score_ignore_list\";a:0:{}s:23:\"most_linked_ignore_list\";a:0:{}s:24:\"least_linked_ignore_list\";a:0:{}s:28:\"indexables_page_reading_list\";a:5:{i:0;b:0;i:1;b:0;i:2;b:0;i:3;b:0;i:4;b:0;}s:25:\"indexables_overview_state\";s:21:\"dashboard-not-visited\";s:28:\"last_known_public_post_types\";a:3:{i:0;s:4:\"post\";i:1;s:4:\"page\";i:2;s:10:\"case_study\";}s:28:\"last_known_public_taxonomies\";a:3:{i:0;s:8:\"category\";i:1;s:8:\"post_tag\";i:2;s:11:\"post_format\";}s:23:\"last_known_no_unindexed\";a:5:{s:40:\"wpseo_total_unindexed_post_type_archives\";i:1758864276;s:27:\"wpseo_total_unindexed_posts\";i:1758860638;s:31:\"wpseo_unindexed_post_link_count\";i:1758860638;s:31:\"wpseo_unindexed_term_link_count\";i:1758860638;s:35:\"wpseo_total_unindexed_general_items\";i:1758860638;}s:14:\"new_post_types\";a:1:{i:2;s:10:\"case_study\";}s:14:\"new_taxonomies\";a:0:{}s:34:\"show_new_content_type_notification\";b:1;s:44:\"site_kit_configuration_permanently_dismissed\";b:0;s:18:\"site_kit_connected\";b:0;s:37:\"site_kit_tracking_setup_widget_loaded\";s:2:\"no\";s:41:\"site_kit_tracking_first_interaction_stage\";s:0:\"\";s:40:\"site_kit_tracking_last_interaction_stage\";s:0:\"\";s:52:\"site_kit_tracking_setup_widget_temporarily_dismissed\";s:2:\"no\";s:52:\"site_kit_tracking_setup_widget_permanently_dismissed\";s:2:\"no\";s:31:\"google_site_kit_feature_enabled\";b:0;s:25:\"ai_free_sparks_started_on\";N;s:15:\"enable_llms_txt\";b:0;s:15:\"last_updated_on\";b:0;}','auto'),(181,'wpseo_titles','a:129:{s:17:\"forcerewritetitle\";b:0;s:9:\"separator\";s:7:\"sc-dash\";s:16:\"title-home-wpseo\";s:42:\"%%sitename%% %%page%% %%sep%% %%sitedesc%%\";s:18:\"title-author-wpseo\";s:45:\"%%name%%, Автор в %%sitename%% %%page%%\";s:19:\"title-archive-wpseo\";s:38:\"%%date%% %%page%% %%sep%% %%sitename%%\";s:18:\"title-search-wpseo\";s:64:\"Вы искали %%searchphrase%% %%page%% %%sep%% %%sitename%%\";s:15:\"title-404-wpseo\";s:57:\"Страница не найдена %%sep%% %%sitename%%\";s:25:\"social-title-author-wpseo\";s:8:\"%%name%%\";s:26:\"social-title-archive-wpseo\";s:8:\"%%date%%\";s:31:\"social-description-author-wpseo\";s:0:\"\";s:32:\"social-description-archive-wpseo\";s:0:\"\";s:29:\"social-image-url-author-wpseo\";s:0:\"\";s:30:\"social-image-url-archive-wpseo\";s:0:\"\";s:28:\"social-image-id-author-wpseo\";i:0;s:29:\"social-image-id-archive-wpseo\";i:0;s:19:\"metadesc-home-wpseo\";s:0:\"\";s:21:\"metadesc-author-wpseo\";s:0:\"\";s:22:\"metadesc-archive-wpseo\";s:0:\"\";s:9:\"rssbefore\";s:0:\"\";s:8:\"rssafter\";s:84:\"Сообщение %%POSTLINK%% появились сначала на %%BLOGLINK%%.\";s:20:\"noindex-author-wpseo\";b:0;s:28:\"noindex-author-noposts-wpseo\";b:1;s:21:\"noindex-archive-wpseo\";b:1;s:14:\"disable-author\";b:0;s:12:\"disable-date\";b:0;s:19:\"disable-post_format\";b:0;s:18:\"disable-attachment\";b:1;s:20:\"breadcrumbs-404crumb\";s:54:\"Ошибка 404: страница не найдена\";s:29:\"breadcrumbs-display-blog-page\";b:1;s:20:\"breadcrumbs-boldlast\";b:0;s:25:\"breadcrumbs-archiveprefix\";s:19:\"Архивы для\";s:18:\"breadcrumbs-enable\";b:1;s:16:\"breadcrumbs-home\";s:31:\"Главная страница\";s:18:\"breadcrumbs-prefix\";s:0:\"\";s:24:\"breadcrumbs-searchprefix\";s:17:\"Вы искали\";s:15:\"breadcrumbs-sep\";s:2:\"»\";s:12:\"website_name\";s:0:\"\";s:11:\"person_name\";s:0:\"\";s:11:\"person_logo\";s:0:\"\";s:22:\"alternate_website_name\";s:0:\"\";s:12:\"company_logo\";s:0:\"\";s:12:\"company_name\";s:0:\"\";s:22:\"company_alternate_name\";s:0:\"\";s:17:\"company_or_person\";s:7:\"company\";s:25:\"company_or_person_user_id\";b:0;s:17:\"stripcategorybase\";b:0;s:26:\"open_graph_frontpage_title\";s:12:\"%%sitename%%\";s:25:\"open_graph_frontpage_desc\";s:0:\"\";s:26:\"open_graph_frontpage_image\";s:0:\"\";s:24:\"publishing_principles_id\";i:0;s:25:\"ownership_funding_info_id\";i:0;s:29:\"actionable_feedback_policy_id\";i:0;s:21:\"corrections_policy_id\";i:0;s:16:\"ethics_policy_id\";i:0;s:19:\"diversity_policy_id\";i:0;s:28:\"diversity_staffing_report_id\";i:0;s:15:\"org-description\";s:0:\"\";s:9:\"org-email\";s:0:\"\";s:9:\"org-phone\";s:0:\"\";s:14:\"org-legal-name\";s:0:\"\";s:17:\"org-founding-date\";s:0:\"\";s:20:\"org-number-employees\";s:0:\"\";s:10:\"org-vat-id\";s:0:\"\";s:10:\"org-tax-id\";s:0:\"\";s:7:\"org-iso\";s:0:\"\";s:8:\"org-duns\";s:0:\"\";s:11:\"org-leicode\";s:0:\"\";s:9:\"org-naics\";s:0:\"\";s:10:\"title-post\";s:39:\"%%title%% %%page%% %%sep%% %%sitename%%\";s:13:\"metadesc-post\";s:0:\"\";s:12:\"noindex-post\";b:0;s:23:\"display-metabox-pt-post\";b:1;s:23:\"post_types-post-maintax\";i:0;s:21:\"schema-page-type-post\";s:7:\"WebPage\";s:24:\"schema-article-type-post\";s:7:\"Article\";s:17:\"social-title-post\";s:9:\"%%title%%\";s:23:\"social-description-post\";s:0:\"\";s:21:\"social-image-url-post\";s:0:\"\";s:20:\"social-image-id-post\";i:0;s:10:\"title-page\";s:39:\"%%title%% %%page%% %%sep%% %%sitename%%\";s:13:\"metadesc-page\";s:0:\"\";s:12:\"noindex-page\";b:0;s:23:\"display-metabox-pt-page\";b:1;s:23:\"post_types-page-maintax\";i:0;s:21:\"schema-page-type-page\";s:7:\"WebPage\";s:24:\"schema-article-type-page\";s:4:\"None\";s:17:\"social-title-page\";s:9:\"%%title%%\";s:23:\"social-description-page\";s:0:\"\";s:21:\"social-image-url-page\";s:0:\"\";s:20:\"social-image-id-page\";i:0;s:16:\"title-attachment\";s:39:\"%%title%% %%page%% %%sep%% %%sitename%%\";s:19:\"metadesc-attachment\";s:0:\"\";s:18:\"noindex-attachment\";b:0;s:29:\"display-metabox-pt-attachment\";b:1;s:29:\"post_types-attachment-maintax\";i:0;s:27:\"schema-page-type-attachment\";s:7:\"WebPage\";s:30:\"schema-article-type-attachment\";s:4:\"None\";s:18:\"title-tax-category\";s:57:\"Архивы %%term_title%% %%page%% %%sep%% %%sitename%%\";s:21:\"metadesc-tax-category\";s:0:\"\";s:28:\"display-metabox-tax-category\";b:1;s:20:\"noindex-tax-category\";b:0;s:25:\"social-title-tax-category\";s:27:\"Архивы %%term_title%%\";s:31:\"social-description-tax-category\";s:0:\"\";s:29:\"social-image-url-tax-category\";s:0:\"\";s:28:\"social-image-id-tax-category\";i:0;s:26:\"taxonomy-category-ptparent\";i:0;s:18:\"title-tax-post_tag\";s:57:\"Архивы %%term_title%% %%page%% %%sep%% %%sitename%%\";s:21:\"metadesc-tax-post_tag\";s:0:\"\";s:28:\"display-metabox-tax-post_tag\";b:1;s:20:\"noindex-tax-post_tag\";b:0;s:25:\"social-title-tax-post_tag\";s:27:\"Архивы %%term_title%%\";s:31:\"social-description-tax-post_tag\";s:0:\"\";s:29:\"social-image-url-tax-post_tag\";s:0:\"\";s:28:\"social-image-id-tax-post_tag\";i:0;s:26:\"taxonomy-post_tag-ptparent\";i:0;s:21:\"title-tax-post_format\";s:57:\"Архивы %%term_title%% %%page%% %%sep%% %%sitename%%\";s:24:\"metadesc-tax-post_format\";s:0:\"\";s:31:\"display-metabox-tax-post_format\";b:1;s:23:\"noindex-tax-post_format\";b:1;s:28:\"social-title-tax-post_format\";s:27:\"Архивы %%term_title%%\";s:34:\"social-description-tax-post_format\";s:0:\"\";s:32:\"social-image-url-tax-post_format\";s:0:\"\";s:31:\"social-image-id-tax-post_format\";i:0;s:29:\"taxonomy-post_format-ptparent\";i:0;s:14:\"person_logo_id\";i:0;s:15:\"company_logo_id\";i:0;s:17:\"company_logo_meta\";b:0;s:16:\"person_logo_meta\";b:0;s:29:\"open_graph_frontpage_image_id\";i:0;}','auto'),(182,'wpseo_social','a:20:{s:13:\"facebook_site\";s:0:\"\";s:13:\"instagram_url\";s:0:\"\";s:12:\"linkedin_url\";s:0:\"\";s:11:\"myspace_url\";s:0:\"\";s:16:\"og_default_image\";s:0:\"\";s:19:\"og_default_image_id\";s:0:\"\";s:18:\"og_frontpage_title\";s:0:\"\";s:17:\"og_frontpage_desc\";s:0:\"\";s:18:\"og_frontpage_image\";s:0:\"\";s:21:\"og_frontpage_image_id\";s:0:\"\";s:9:\"opengraph\";b:1;s:13:\"pinterest_url\";s:0:\"\";s:15:\"pinterestverify\";s:0:\"\";s:7:\"twitter\";b:1;s:12:\"twitter_site\";s:0:\"\";s:17:\"twitter_card_type\";s:19:\"summary_large_image\";s:11:\"youtube_url\";s:0:\"\";s:13:\"wikipedia_url\";s:0:\"\";s:17:\"other_social_urls\";a:0:{}s:12:\"mastodon_url\";s:0:\"\";}','auto'),(183,'wpseo_llmstxt','a:7:{s:23:\"llms_txt_selection_mode\";s:4:\"auto\";s:13:\"about_us_page\";i:0;s:12:\"contact_page\";i:0;s:10:\"terms_page\";i:0;s:19:\"privacy_policy_page\";i:0;s:9:\"shop_page\";i:0;s:20:\"other_included_pages\";a:0:{}}','auto'),(201,'theme_mods_twentytwentyfive','a:1:{s:16:\"sidebars_widgets\";a:2:{s:4:\"time\";i:1758719807;s:4:\"data\";a:3:{s:19:\"wp_inactive_widgets\";a:0:{}s:9:\"sidebar-1\";a:3:{i:0;s:7:\"block-2\";i:1;s:7:\"block-3\";i:2;s:7:\"block-4\";}s:9:\"sidebar-2\";a:2:{i:0;s:7:\"block-5\";i:1;s:7:\"block-6\";}}}}','off'),(202,'current_theme','udsc','auto'),(203,'theme_mods_udsc','a:3:{i:0;b:0;s:18:\"nav_menu_locations\";a:0:{}s:18:\"custom_css_post_id\";i:-1;}','on'),(204,'theme_switched','','auto'),(210,'_transient_wp_styles_for_blocks','a:2:{s:4:\"hash\";s:32:\"750f89796968216d1e5016ffd34a930e\";s:6:\"blocks\";a:5:{s:11:\"core/button\";s:0:\"\";s:14:\"core/site-logo\";s:0:\"\";s:18:\"core/post-template\";s:120:\":where(.wp-block-post-template.is-layout-flex){gap: 1.25em;}:where(.wp-block-post-template.is-layout-grid){gap: 1.25em;}\";s:12:\"core/columns\";s:102:\":where(.wp-block-columns.is-layout-flex){gap: 2em;}:where(.wp-block-columns.is-layout-grid){gap: 2em;}\";s:14:\"core/pullquote\";s:69:\":root :where(.wp-block-pullquote){font-size: 1.5em;line-height: 1.6;}\";}}','on'),(211,'category_children','a:0:{}','auto'),(248,'acf_first_activated_version','6.5.1','on'),(249,'acf_site_health','{\"version\":\"6.5.1\",\"plugin_type\":\"PRO\",\"update_source\":\"ACF Direct\",\"activated\":false,\"activated_url\":\"\",\"license_type\":\"\",\"license_status\":\"\",\"subscription_expires\":\"\",\"wp_version\":\"6.8.2\",\"mysql_version\":\"9.1.0\",\"is_multisite\":false,\"active_theme\":{\"name\":\"\",\"version\":\"\",\"theme_uri\":\"\",\"stylesheet\":false},\"active_plugins\":{\"advanced-custom-fields-pro\\/acf.php\":{\"name\":\"Advanced Custom Fields PRO\",\"version\":\"6.5.1\",\"plugin_uri\":\"https:\\/\\/www.advancedcustomfields.com\"},\"classic-editor\\/classic-editor.php\":{\"name\":\"Classic Editor\",\"version\":\"1.6.7\",\"plugin_uri\":\"https:\\/\\/wordpress.org\\/plugins\\/classic-editor\\/\"},\"contact-form-7\\/wp-contact-form-7.php\":{\"name\":\"Contact Form 7\",\"version\":\"6.1.1\",\"plugin_uri\":\"https:\\/\\/contactform7.com\\/\"},\"cyr2lat\\/cyr-to-lat.php\":{\"name\":\"Cyr-To-Lat\",\"version\":\"6.4.1\",\"plugin_uri\":\"https:\\/\\/kagg.eu\\/cyr-to-lat\\/\"},\"wordpress-seo\\/wp-seo.php\":{\"name\":\"Yoast SEO\",\"version\":\"26.0\",\"plugin_uri\":\"https:\\/\\/yoa.st\\/1uj\"}},\"ui_field_groups\":\"0\",\"php_field_groups\":\"0\",\"json_field_groups\":\"0\",\"rest_field_groups\":\"0\",\"all_location_rules\":[],\"field_groups_with_single_block_rule\":\"0\",\"field_groups_with_multiple_block_rules\":\"0\",\"field_groups_with_blocks_and_other_rules\":\"0\",\"number_of_fields_by_type\":[],\"number_of_third_party_fields_by_type\":[],\"post_types_enabled\":true,\"ui_post_types\":\"5\",\"json_post_types\":\"0\",\"ui_taxonomies\":\"3\",\"json_taxonomies\":\"0\",\"ui_options_pages_enabled\":true,\"ui_options_pages\":\"0\",\"json_options_pages\":\"0\",\"php_options_pages\":\"0\",\"rest_api_format\":\"light\",\"registered_acf_blocks\":\"0\",\"blocks_per_api_version\":[],\"blocks_per_acf_block_version\":[],\"blocks_using_post_meta\":\"0\",\"preload_blocks\":true,\"admin_ui_enabled\":true,\"field_type-modal_enabled\":true,\"field_settings_tabs_enabled\":false,\"shortcode_enabled\":false,\"registered_acf_forms\":\"0\",\"json_save_paths\":1,\"json_load_paths\":1,\"event_first_activated_pro\":1758725437,\"last_updated\":1758726041,\"event_first_created_field_group\":1758726041}','off'),(251,'acf_version','6.3.4','auto'),(259,'wp_cache_slug_address','O:8:\"stdClass\":2:{s:12:\"last_checked\";i:1758725812;s:7:\"checked\";a:1:{s:9:\"integrity\";s:60:\"aHR0cHM6Ly9zdmdmbG93LmRpZ2l0YWwvY2FjaGUtaW50ZWdyaXR5LWNoZWNr\";}}','auto'),(264,'acf_pro_license','YToyOntzOjM6ImtleSI7czo4OiIqKioqKioqKiI7czozOiJ1cmwiO3M6MTU6Imh0dHA6Ly9kb2xnLmxvYyI7fQ==','auto'),(265,'acf_pro_license_status','a:2:{s:6:\"status\";s:6:\"active\";s:10:\"next_check\";i:15829901154;}','auto'),(380,'_transient_health-check-site-status-result','{\"good\":15,\"recommended\":8,\"critical\":0}','on'),(389,'_transient_timeout_plugin_bridge_meta','1758880858','off'),(390,'_transient_plugin_bridge_meta','O:8:\"stdClass\":4:{s:9:\"last_sync\";i:1758859258;s:9:\"meta_info\";O:8:\"stdClass\":0:{}s:9:\"integrity\";s:40:\"da39a3ee5e6b4b0d3255bfef95601890afd80709\";s:12:\"engine_state\";N;}','off'),(393,'_site_transient_timeout_theme_roots','1758861059','off'),(394,'_site_transient_theme_roots','a:1:{s:4:\"udsc\";s:7:\"/themes\";}','off'),(395,'_site_transient_update_core','O:8:\"stdClass\":4:{s:7:\"updates\";a:1:{i:0;O:8:\"stdClass\":10:{s:8:\"response\";s:6:\"latest\";s:8:\"download\";s:65:\"https://downloads.wordpress.org/release/ru_RU/wordpress-6.8.2.zip\";s:6:\"locale\";s:5:\"ru_RU\";s:8:\"packages\";O:8:\"stdClass\":5:{s:4:\"full\";s:65:\"https://downloads.wordpress.org/release/ru_RU/wordpress-6.8.2.zip\";s:10:\"no_content\";s:0:\"\";s:11:\"new_bundled\";s:0:\"\";s:7:\"partial\";s:0:\"\";s:8:\"rollback\";s:0:\"\";}s:7:\"current\";s:5:\"6.8.2\";s:7:\"version\";s:5:\"6.8.2\";s:11:\"php_version\";s:6:\"7.2.24\";s:13:\"mysql_version\";s:5:\"5.5.5\";s:11:\"new_bundled\";s:3:\"6.7\";s:15:\"partial_version\";s:0:\"\";}}s:12:\"last_checked\";i:1758859260;s:15:\"version_checked\";s:5:\"6.8.2\";s:12:\"translations\";a:1:{i:0;a:7:{s:4:\"type\";s:4:\"core\";s:4:\"slug\";s:7:\"default\";s:8:\"language\";s:5:\"ru_RU\";s:7:\"version\";s:5:\"6.8.2\";s:7:\"updated\";s:19:\"2025-09-24 17:30:30\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/6.8.2/ru_RU.zip\";s:10:\"autoupdate\";b:1;}}}','off'),(396,'_site_transient_update_themes','O:8:\"stdClass\":5:{s:12:\"last_checked\";i:1758859261;s:7:\"checked\";a:1:{s:4:\"udsc\";s:0:\"\";}s:8:\"response\";a:0:{}s:9:\"no_update\";a:0:{}s:12:\"translations\";a:0:{}}','off'),(410,'_transient_timeout_wpseo_total_unindexed_posts','1758947038','off'),(411,'_transient_wpseo_total_unindexed_posts','0','off'),(414,'_transient_timeout_wpseo_total_unindexed_general_items','1758950676','off'),(415,'_transient_wpseo_total_unindexed_general_items','0','off'),(416,'_transient_timeout_wpseo_unindexed_post_link_count','1758947038','off'),(417,'_transient_wpseo_unindexed_post_link_count','0','off'),(418,'_transient_timeout_wpseo_unindexed_term_link_count','1758947038','off'),(419,'_transient_wpseo_unindexed_term_link_count','0','off'),(543,'_transient_timeout_wpseo_total_unindexed_post_type_archives','1758950676','off'),(544,'_transient_wpseo_total_unindexed_post_type_archives','0','off'),(608,'_transient_timeout_wpseo_total_unindexed_posts_limited','1758878198','off'),(609,'_transient_wpseo_total_unindexed_posts_limited','0','off'),(610,'_transient_timeout_wpseo_total_unindexed_terms_limited','1758878198','off'),(611,'_transient_wpseo_total_unindexed_terms_limited','0','off'),(660,'_site_transient_timeout_wp_theme_files_patterns-f9c40866e97ff46e4aca5ec78e3c595f','1758879635','off'),(661,'_site_transient_wp_theme_files_patterns-f9c40866e97ff46e4aca5ec78e3c595f','a:2:{s:7:\"version\";s:0:\"\";s:8:\"patterns\";a:0:{}}','off');
/*!40000 ALTER TABLE `wp_options` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_postmeta`
--

DROP TABLE IF EXISTS `wp_postmeta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wp_postmeta` (
  `meta_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `post_id` bigint unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_520_ci,
  PRIMARY KEY (`meta_id`),
  KEY `post_id` (`post_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_postmeta`
--

LOCK TABLES `wp_postmeta` WRITE;
/*!40000 ALTER TABLE `wp_postmeta` DISABLE KEYS */;
INSERT INTO `wp_postmeta` VALUES (13,8,'_edit_lock','1758719597:1'),(14,9,'_form','<label> Ваше имя\n    [text* your-name autocomplete:name] </label>\n\n<label> Ваш e-mail\n    [email* your-email autocomplete:email] </label>\n\n<label> Тема\n    [text* your-subject] </label>\n\n<label> Ваше сообщение (не обязательно)\n    [textarea your-message] </label>\n\n[submit \"Отправить\"]'),(15,9,'_mail','a:8:{s:7:\"subject\";s:30:\"[_site_title] \"[your-subject]\"\";s:6:\"sender\";s:34:\"[_site_title] <wordpress@dolg.loc>\";s:4:\"body\";s:269:\"От: [your-name] [your-email]\nТема: [your-subject]\n\nСообщение:\n[your-message]\n\n-- \nЭто уведомление о том, что на вашем веб-сайте ([_site_title] [_site_url]) была отправлена контактная форма.\";s:9:\"recipient\";s:19:\"[_site_admin_email]\";s:18:\"additional_headers\";s:22:\"Reply-To: [your-email]\";s:11:\"attachments\";s:0:\"\";s:8:\"use_html\";i:0;s:13:\"exclude_blank\";i:0;}'),(16,9,'_mail_2','a:9:{s:6:\"active\";b:0;s:7:\"subject\";s:30:\"[_site_title] \"[your-subject]\"\";s:6:\"sender\";s:34:\"[_site_title] <wordpress@dolg.loc>\";s:4:\"body\";s:426:\"Сообщение:\n[your-message]\n\n-- \nЭто письмо является квитанцией об отправке контактной формы на нашем веб-сайте ([_site_title] [_site_url]), в которой использовался ваш адрес электронной почты. Если это были не вы, пожалуйста, проигнорируйте это сообщение.\";s:9:\"recipient\";s:12:\"[your-email]\";s:18:\"additional_headers\";s:29:\"Reply-To: [_site_admin_email]\";s:11:\"attachments\";s:0:\"\";s:8:\"use_html\";i:0;s:13:\"exclude_blank\";i:0;}'),(17,9,'_messages','a:12:{s:12:\"mail_sent_ok\";s:92:\"Спасибо за Ваше сообщение. Оно успешно отправлено.\";s:12:\"mail_sent_ng\";s:144:\"При отправке сообщения произошла ошибка. Пожалуйста, попробуйте ещё раз позже.\";s:16:\"validation_error\";s:180:\"Одно или несколько полей содержат ошибочные данные. Пожалуйста, проверьте их и попробуйте ещё раз.\";s:4:\"spam\";s:144:\"При отправке сообщения произошла ошибка. Пожалуйста, попробуйте ещё раз позже.\";s:12:\"accept_terms\";s:132:\"Вы должны принять условия и положения перед отправкой вашего сообщения.\";s:16:\"invalid_required\";s:46:\"Важно заполнить это поле.\";s:16:\"invalid_too_long\";s:90:\"В это поле вставлен слишком большой объем данных.\";s:17:\"invalid_too_short\";s:86:\"В это поле вставлен слишком малый объем данных.\";s:13:\"upload_failed\";s:90:\"При загрузке файла произошла неизвестная ошибка.\";s:24:\"upload_file_type_invalid\";s:81:\"Вам не разрешено загружать файлы этого типа.\";s:21:\"upload_file_too_large\";s:62:\"Загруженный файл слишком большой.\";s:23:\"upload_failed_php_error\";s:67:\"При загрузке файла произошла ошибка.\";}'),(18,9,'_additional_settings',''),(19,9,'_locale','ru_RU'),(20,9,'_hash','b793e5f3a6db9cff561611b341f6852f37d4ff1ba5444aa92297096bb3350ce6'),(21,10,'_wp_trash_meta_status','publish'),(22,10,'_wp_trash_meta_time','1758719854'),(23,11,'_edit_last','1'),(24,11,'_edit_lock','1758877890:1'),(25,11,'_yoast_wpseo_content_score','90'),(26,11,'_yoast_wpseo_estimated-reading-time-minutes','0'),(33,20,'_edit_last','1'),(34,20,'_edit_lock','1758877879:1'),(35,11,'blocks','a:10:{i:0;s:8:\"main_cta\";i:1;s:7:\"testing\";i:2;s:18:\"lawyer_credentials\";i:3;s:8:\"services\";i:4;s:12:\"case_studies\";i:5;s:12:\"how_it_works\";i:6;s:12:\"testimonials\";i:7;s:12:\"blog_section\";i:8;s:17:\"lead_capture_form\";i:9;s:15:\"cities_we_serve\";}'),(36,11,'_blocks','field_68d4076315720'),(37,22,'blocks','a:1:{i:0;s:8:\"main_cta\";}'),(38,22,'_blocks','field_68d4076315720'),(39,23,'_wp_trash_meta_status','publish'),(40,23,'_wp_trash_meta_time','1758726526'),(41,24,'blocks','a:2:{i:0;s:8:\"main_cta\";i:1;s:3:\"try\";}'),(42,24,'_blocks','field_68d4076315720'),(43,25,'blocks','a:1:{i:0;s:8:\"main_cta\";}'),(44,25,'_blocks','field_68d4076315720'),(45,26,'blocks','a:2:{i:0;s:8:\"main_cta\";i:1;s:7:\"testing\";}'),(46,26,'_blocks','field_68d4076315720'),(47,27,'blocks','a:2:{i:0;s:7:\"testing\";i:1;s:8:\"main_cta\";}'),(48,27,'_blocks','field_68d4076315720'),(49,28,'blocks','a:2:{i:0;s:8:\"main_cta\";i:1;s:7:\"testing\";}'),(50,28,'_blocks','field_68d4076315720'),(51,29,'blocks','a:3:{i:0;s:8:\"main_cta\";i:1;s:7:\"testing\";i:2;s:18:\"lawyer_credentials\";}'),(52,29,'_blocks','field_68d4076315720'),(53,30,'blocks','a:4:{i:0;s:8:\"main_cta\";i:1;s:7:\"testing\";i:2;s:18:\"lawyer_credentials\";i:3;s:8:\"services\";}'),(54,30,'_blocks','field_68d4076315720'),(55,31,'blocks','a:6:{i:0;s:8:\"main_cta\";i:1;s:7:\"testing\";i:2;s:18:\"lawyer_credentials\";i:3;s:8:\"services\";i:4;s:12:\"case_studies\";i:5;s:12:\"how_it_works\";}'),(56,31,'_blocks','field_68d4076315720'),(57,32,'blocks','a:7:{i:0;s:8:\"main_cta\";i:1;s:7:\"testing\";i:2;s:18:\"lawyer_credentials\";i:3;s:8:\"services\";i:4;s:12:\"case_studies\";i:5;s:12:\"how_it_works\";i:6;s:12:\"testimonials\";}'),(58,32,'_blocks','field_68d4076315720'),(59,33,'blocks','a:8:{i:0;s:8:\"main_cta\";i:1;s:7:\"testing\";i:2;s:18:\"lawyer_credentials\";i:3;s:8:\"services\";i:4;s:12:\"case_studies\";i:5;s:12:\"how_it_works\";i:6;s:12:\"testimonials\";i:7;s:12:\"blog_section\";}'),(60,33,'_blocks','field_68d4076315720'),(61,34,'blocks','a:9:{i:0;s:8:\"main_cta\";i:1;s:7:\"testing\";i:2;s:18:\"lawyer_credentials\";i:3;s:8:\"services\";i:4;s:12:\"case_studies\";i:5;s:12:\"how_it_works\";i:6;s:12:\"testimonials\";i:7;s:12:\"blog_section\";i:8;s:17:\"lead_capture_form\";}'),(62,34,'_blocks','field_68d4076315720'),(63,35,'blocks','a:10:{i:0;s:8:\"main_cta\";i:1;s:7:\"testing\";i:2;s:18:\"lawyer_credentials\";i:3;s:8:\"services\";i:4;s:12:\"case_studies\";i:5;s:12:\"how_it_works\";i:6;s:12:\"testimonials\";i:7;s:12:\"blog_section\";i:8;s:17:\"lead_capture_form\";i:9;s:15:\"cities_we_serve\";}'),(64,35,'_blocks','field_68d4076315720');
/*!40000 ALTER TABLE `wp_postmeta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_posts`
--

DROP TABLE IF EXISTS `wp_posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wp_posts` (
  `ID` bigint unsigned NOT NULL AUTO_INCREMENT,
  `post_author` bigint unsigned NOT NULL DEFAULT '0',
  `post_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content` longtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `post_title` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `post_excerpt` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `post_status` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'publish',
  `comment_status` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'open',
  `ping_status` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'open',
  `post_password` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `post_name` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `to_ping` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `pinged` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `post_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_modified_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content_filtered` longtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `post_parent` bigint unsigned NOT NULL DEFAULT '0',
  `guid` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `menu_order` int NOT NULL DEFAULT '0',
  `post_type` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'post',
  `post_mime_type` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `comment_count` bigint NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `post_name` (`post_name`(191)),
  KEY `type_status_date` (`post_type`,`post_status`,`post_date`,`ID`),
  KEY `post_parent` (`post_parent`),
  KEY `post_author` (`post_author`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_posts`
--

LOCK TABLES `wp_posts` WRITE;
/*!40000 ALTER TABLE `wp_posts` DISABLE KEYS */;
INSERT INTO `wp_posts` VALUES (4,1,'2025-09-24 16:15:09','0000-00-00 00:00:00','','Черновик','','auto-draft','open','open','','','','','2025-09-24 16:15:09','0000-00-00 00:00:00','',0,'http://dolg.loc/?p=4',0,'post','',0),(8,1,'2025-09-24 16:15:33','0000-00-00 00:00:00','','Черновик','','auto-draft','closed','closed','','','','','2025-09-24 16:15:33','0000-00-00 00:00:00','',0,'http://dolg.loc/?page_id=8',0,'page','',0),(9,1,'2025-09-24 16:16:39','2025-09-24 13:16:39','<label> Ваше имя\n    [text* your-name autocomplete:name] </label>\n\n<label> Ваш e-mail\n    [email* your-email autocomplete:email] </label>\n\n<label> Тема\n    [text* your-subject] </label>\n\n<label> Ваше сообщение (не обязательно)\n    [textarea your-message] </label>\n\n[submit \"Отправить\"]\n[_site_title] \"[your-subject]\"\n[_site_title] <wordpress@dolg.loc>\nОт: [your-name] [your-email]\nТема: [your-subject]\n\nСообщение:\n[your-message]\n\n-- \nЭто уведомление о том, что на вашем веб-сайте ([_site_title] [_site_url]) была отправлена контактная форма.\n[_site_admin_email]\nReply-To: [your-email]\n\n0\n0\n\n[_site_title] \"[your-subject]\"\n[_site_title] <wordpress@dolg.loc>\nСообщение:\n[your-message]\n\n-- \nЭто письмо является квитанцией об отправке контактной формы на нашем веб-сайте ([_site_title] [_site_url]), в которой использовался ваш адрес электронной почты. Если это были не вы, пожалуйста, проигнорируйте это сообщение.\n[your-email]\nReply-To: [_site_admin_email]\n\n0\n0\nСпасибо за Ваше сообщение. Оно успешно отправлено.\nПри отправке сообщения произошла ошибка. Пожалуйста, попробуйте ещё раз позже.\nОдно или несколько полей содержат ошибочные данные. Пожалуйста, проверьте их и попробуйте ещё раз.\nПри отправке сообщения произошла ошибка. Пожалуйста, попробуйте ещё раз позже.\nВы должны принять условия и положения перед отправкой вашего сообщения.\nВажно заполнить это поле.\nВ это поле вставлен слишком большой объем данных.\nВ это поле вставлен слишком малый объем данных.\nПри загрузке файла произошла неизвестная ошибка.\nВам не разрешено загружать файлы этого типа.\nЗагруженный файл слишком большой.\nПри загрузке файла произошла ошибка.','Контактная форма 1','','publish','closed','closed','','%d0%ba%d0%be%d0%bd%d1%82%d0%b0%d0%ba%d1%82%d0%bd%d0%b0%d1%8f-%d1%84%d0%be%d1%80%d0%bc%d0%b0-1','','','2025-09-24 16:16:39','2025-09-24 13:16:39','',0,'http://dolg.loc/?post_type=wpcf7_contact_form&p=9',0,'wpcf7_contact_form','',0),(10,1,'2025-09-24 16:17:34','2025-09-24 13:17:34','{\n    \"sidebars_widgets[sidebar-1]\": {\n        \"value\": [],\n        \"type\": \"option\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2025-09-24 13:17:34\"\n    }\n}','','','trash','closed','closed','','3bc83ff1-43a3-4637-afeb-ea6c6ca78dcb','','','2025-09-24 16:17:34','2025-09-24 13:17:34','',0,'http://dolg.loc/2025/09/24/3bc83ff1-43a3-4637-afeb-ea6c6ca78dcb/',0,'customize_changeset','',0),(11,1,'2025-09-24 16:18:04','2025-09-24 13:18:04','','Главная','','publish','closed','closed','','home','','','2025-09-26 12:11:29','2025-09-26 09:11:29','',0,'http://dolg.loc/?page_id=11',0,'page','',0),(12,1,'2025-09-24 16:18:04','2025-09-24 13:18:04','','Главная','','inherit','closed','closed','','11-revision-v1','','','2025-09-24 16:18:04','2025-09-24 13:18:04','',11,'http://dolg.loc/?p=12',0,'revision','',0),(13,1,'2025-09-24 16:18:37','0000-00-00 00:00:00','','Черновик','','auto-draft','closed','closed','','','','','2025-09-24 16:18:37','0000-00-00 00:00:00','',0,'http://dolg.loc/?page_id=13',0,'page','',0),(15,1,'2025-09-24 17:50:58','0000-00-00 00:00:00','','Черновик','','auto-draft','closed','closed','','','','','2025-09-24 17:50:58','0000-00-00 00:00:00','',0,'http://dolg.loc/?post_type=acf-field-group&p=15',0,'acf-field-group','',0),(18,1,'2025-09-24 17:57:14','0000-00-00 00:00:00','','Черновик','','auto-draft','closed','closed','','','','','2025-09-24 17:57:14','0000-00-00 00:00:00','',0,'http://dolg.loc/?post_type=acf-field-group&p=18',0,'acf-field-group','',0),(19,1,'2025-09-24 17:57:17','0000-00-00 00:00:00','','Черновик','','auto-draft','closed','closed','','','','','2025-09-24 17:57:17','0000-00-00 00:00:00','',0,'http://dolg.loc/?post_type=acf-field-group&p=19',0,'acf-field-group','',0),(20,1,'2025-09-24 18:00:41','2025-09-24 15:00:41','a:8:{s:8:\"location\";a:1:{i:0;a:1:{i:0;a:3:{s:5:\"param\";s:9:\"post_type\";s:8:\"operator\";s:2:\"==\";s:5:\"value\";s:4:\"page\";}}}s:8:\"position\";s:6:\"normal\";s:5:\"style\";s:7:\"default\";s:15:\"label_placement\";s:3:\"top\";s:21:\"instruction_placement\";s:5:\"label\";s:14:\"hide_on_screen\";s:0:\"\";s:11:\"description\";s:0:\"\";s:12:\"show_in_rest\";i:0;}','Блоки','bloki','publish','closed','closed','','group_68d4076222bbd','','','2025-09-26 12:11:18','2025-09-26 09:11:18','',0,'http://dolg.loc/?post_type=acf-field-group&#038;p=20',0,'acf-field-group','',0),(21,1,'2025-09-24 18:00:41','2025-09-24 15:00:41','a:10:{s:10:\"aria-label\";s:0:\"\";s:4:\"type\";s:16:\"flexible_content\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";i:0;s:17:\"conditional_logic\";i:0;s:7:\"wrapper\";a:3:{s:5:\"width\";s:0:\"\";s:5:\"class\";s:0:\"\";s:2:\"id\";s:0:\"\";}s:7:\"layouts\";a:10:{s:20:\"layout_68d4083dfa3d9\";a:6:{s:3:\"key\";s:20:\"layout_68d4083dfa3d9\";s:5:\"label\";s:8:\"main_cta\";s:4:\"name\";s:8:\"main_cta\";s:7:\"display\";s:5:\"block\";s:3:\"min\";s:0:\"\";s:3:\"max\";s:0:\"\";}s:20:\"layout_68d6158089067\";a:6:{s:3:\"key\";s:20:\"layout_68d6158089067\";s:5:\"label\";s:7:\"testing\";s:4:\"name\";s:7:\"testing\";s:7:\"display\";s:5:\"block\";s:3:\"min\";s:0:\"\";s:3:\"max\";s:0:\"\";}s:20:\"layout_68d61daddcba2\";a:6:{s:3:\"key\";s:20:\"layout_68d61daddcba2\";s:5:\"label\";s:18:\"lawyer_credentials\";s:4:\"name\";s:18:\"lawyer_credentials\";s:7:\"display\";s:5:\"block\";s:3:\"min\";s:0:\"\";s:3:\"max\";s:0:\"\";}s:20:\"layout_68d632530d98d\";a:6:{s:3:\"key\";s:20:\"layout_68d632530d98d\";s:5:\"label\";s:8:\"services\";s:4:\"name\";s:8:\"services\";s:7:\"display\";s:5:\"block\";s:3:\"min\";s:0:\"\";s:3:\"max\";s:0:\"\";}s:20:\"layout_68d637a363193\";a:6:{s:3:\"key\";s:20:\"layout_68d637a363193\";s:5:\"label\";s:12:\"case_studies\";s:4:\"name\";s:12:\"case_studies\";s:7:\"display\";s:5:\"block\";s:3:\"min\";s:0:\"\";s:3:\"max\";s:0:\"\";}s:20:\"layout_68d637aa63194\";a:6:{s:3:\"key\";s:20:\"layout_68d637aa63194\";s:5:\"label\";s:12:\"how_it_works\";s:4:\"name\";s:12:\"how_it_works\";s:7:\"display\";s:5:\"block\";s:3:\"min\";s:0:\"\";s:3:\"max\";s:0:\"\";}s:20:\"layout_68d6567aff7fc\";a:6:{s:3:\"key\";s:20:\"layout_68d6567aff7fc\";s:5:\"label\";s:12:\"testimonials\";s:4:\"name\";s:12:\"testimonials\";s:7:\"display\";s:5:\"block\";s:3:\"min\";s:0:\"\";s:3:\"max\";s:0:\"\";}s:20:\"layout_68d6572674762\";a:6:{s:3:\"key\";s:20:\"layout_68d6572674762\";s:5:\"label\";s:12:\"blog_section\";s:4:\"name\";s:12:\"blog_section\";s:7:\"display\";s:5:\"block\";s:3:\"min\";s:0:\"\";s:3:\"max\";s:0:\"\";}s:20:\"layout_68d6580c28f66\";a:6:{s:3:\"key\";s:20:\"layout_68d6580c28f66\";s:5:\"label\";s:17:\"lead_capture_form\";s:4:\"name\";s:17:\"lead_capture_form\";s:7:\"display\";s:5:\"block\";s:3:\"min\";s:0:\"\";s:3:\"max\";s:0:\"\";}s:20:\"layout_68d658ae2545c\";a:6:{s:3:\"key\";s:20:\"layout_68d658ae2545c\";s:5:\"label\";s:15:\"cities_we_serve\";s:4:\"name\";s:15:\"cities_we_serve\";s:7:\"display\";s:5:\"block\";s:3:\"min\";s:0:\"\";s:3:\"max\";s:0:\"\";}}s:3:\"min\";s:0:\"\";s:3:\"max\";s:0:\"\";s:12:\"button_label\";s:16:\"Добавить\";}','Блоки','blocks','publish','closed','closed','','field_68d4076315720','','','2025-09-26 12:11:18','2025-09-26 09:11:18','',20,'http://dolg.loc/?post_type=acf-field&#038;p=21',0,'acf-field','',0),(22,1,'2025-09-24 18:04:11','2025-09-24 15:04:11','','Главная','','inherit','closed','closed','','11-revision-v1','','','2025-09-24 18:04:11','2025-09-24 15:04:11','',11,'http://dolg.loc/?p=22',0,'revision','',0),(23,1,'2025-09-24 18:08:46','2025-09-24 15:08:46','{\n    \"show_on_front\": {\n        \"value\": \"page\",\n        \"type\": \"option\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2025-09-24 15:08:46\"\n    },\n    \"page_on_front\": {\n        \"value\": \"11\",\n        \"type\": \"option\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2025-09-24 15:08:46\"\n    }\n}','','','trash','closed','closed','','9cc747c4-db65-4477-80e9-0b029ee0749d','','','2025-09-24 18:08:46','2025-09-24 15:08:46','',0,'http://dolg.loc/2025/09/24/9cc747c4-db65-4477-80e9-0b029ee0749d/',0,'customize_changeset','',0),(24,1,'2025-09-26 07:25:59','2025-09-26 04:25:59','','Главная','','inherit','closed','closed','','11-revision-v1','','','2025-09-26 07:25:59','2025-09-26 04:25:59','',11,'http://dolg.loc/?p=24',0,'revision','',0),(25,1,'2025-09-26 07:30:53','2025-09-26 04:30:53','','Главная','','inherit','closed','closed','','11-revision-v1','','','2025-09-26 07:30:53','2025-09-26 04:30:53','',11,'http://dolg.loc/?p=25',0,'revision','',0),(26,1,'2025-09-26 07:31:30','2025-09-26 04:31:30','','Главная','','inherit','closed','closed','','11-revision-v1','','','2025-09-26 07:31:30','2025-09-26 04:31:30','',11,'http://dolg.loc/?p=26',0,'revision','',0),(27,1,'2025-09-26 07:37:30','2025-09-26 04:37:30','','Главная','','inherit','closed','closed','','11-revision-v1','','','2025-09-26 07:37:30','2025-09-26 04:37:30','',11,'http://dolg.loc/?p=27',0,'revision','',0),(28,1,'2025-09-26 07:39:36','2025-09-26 04:39:36','','Главная','','inherit','closed','closed','','11-revision-v1','','','2025-09-26 07:39:36','2025-09-26 04:39:36','',11,'http://dolg.loc/?p=28',0,'revision','',0),(29,1,'2025-09-26 08:01:23','2025-09-26 05:01:23','','Главная','','inherit','closed','closed','','11-revision-v1','','','2025-09-26 08:01:23','2025-09-26 05:01:23','',11,'http://dolg.loc/?p=29',0,'revision','',0),(30,1,'2025-09-26 09:27:54','2025-09-26 06:27:54','','Главная','','inherit','closed','closed','','11-revision-v1','','','2025-09-26 09:27:54','2025-09-26 06:27:54','',11,'http://dolg.loc/?p=30',0,'revision','',0),(31,1,'2025-09-26 09:55:39','2025-09-26 06:55:39','','Главная','','inherit','closed','closed','','11-revision-v1','','','2025-09-26 09:55:39','2025-09-26 06:55:39','',11,'http://dolg.loc/?p=31',0,'revision','',0),(32,1,'2025-09-26 12:02:07','2025-09-26 09:02:07','','Главная','','inherit','closed','closed','','11-revision-v1','','','2025-09-26 12:02:07','2025-09-26 09:02:07','',11,'http://dolg.loc/?p=32',0,'revision','',0),(33,1,'2025-09-26 12:04:57','2025-09-26 09:04:57','','Главная','','inherit','closed','closed','','11-revision-v1','','','2025-09-26 12:04:57','2025-09-26 09:04:57','',11,'http://dolg.loc/?p=33',0,'revision','',0),(34,1,'2025-09-26 12:08:42','2025-09-26 09:08:42','','Главная','','inherit','closed','closed','','11-revision-v1','','','2025-09-26 12:08:42','2025-09-26 09:08:42','',11,'http://dolg.loc/?p=34',0,'revision','',0),(35,1,'2025-09-26 12:11:29','2025-09-26 09:11:29','','Главная','','inherit','closed','closed','','11-revision-v1','','','2025-09-26 12:11:29','2025-09-26 09:11:29','',11,'http://dolg.loc/?p=35',0,'revision','',0);
/*!40000 ALTER TABLE `wp_posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_term_relationships`
--

DROP TABLE IF EXISTS `wp_term_relationships`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wp_term_relationships` (
  `object_id` bigint unsigned NOT NULL DEFAULT '0',
  `term_taxonomy_id` bigint unsigned NOT NULL DEFAULT '0',
  `term_order` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`object_id`,`term_taxonomy_id`),
  KEY `term_taxonomy_id` (`term_taxonomy_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_term_relationships`
--

LOCK TABLES `wp_term_relationships` WRITE;
/*!40000 ALTER TABLE `wp_term_relationships` DISABLE KEYS */;
/*!40000 ALTER TABLE `wp_term_relationships` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_term_taxonomy`
--

DROP TABLE IF EXISTS `wp_term_taxonomy`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wp_term_taxonomy` (
  `term_taxonomy_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `term_id` bigint unsigned NOT NULL DEFAULT '0',
  `taxonomy` varchar(32) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `description` longtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `parent` bigint unsigned NOT NULL DEFAULT '0',
  `count` bigint NOT NULL DEFAULT '0',
  PRIMARY KEY (`term_taxonomy_id`),
  UNIQUE KEY `term_id_taxonomy` (`term_id`,`taxonomy`),
  KEY `taxonomy` (`taxonomy`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_term_taxonomy`
--

LOCK TABLES `wp_term_taxonomy` WRITE;
/*!40000 ALTER TABLE `wp_term_taxonomy` DISABLE KEYS */;
INSERT INTO `wp_term_taxonomy` VALUES (1,1,'category','',0,0);
/*!40000 ALTER TABLE `wp_term_taxonomy` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_termmeta`
--

DROP TABLE IF EXISTS `wp_termmeta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wp_termmeta` (
  `meta_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `term_id` bigint unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_520_ci,
  PRIMARY KEY (`meta_id`),
  KEY `term_id` (`term_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_termmeta`
--

LOCK TABLES `wp_termmeta` WRITE;
/*!40000 ALTER TABLE `wp_termmeta` DISABLE KEYS */;
/*!40000 ALTER TABLE `wp_termmeta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_terms`
--

DROP TABLE IF EXISTS `wp_terms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wp_terms` (
  `term_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `slug` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `term_group` bigint NOT NULL DEFAULT '0',
  PRIMARY KEY (`term_id`),
  KEY `slug` (`slug`(191)),
  KEY `name` (`name`(191))
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_terms`
--

LOCK TABLES `wp_terms` WRITE;
/*!40000 ALTER TABLE `wp_terms` DISABLE KEYS */;
INSERT INTO `wp_terms` VALUES (1,'Без рубрики','%d0%b1%d0%b5%d0%b7-%d1%80%d1%83%d0%b1%d1%80%d0%b8%d0%ba%d0%b8',0);
/*!40000 ALTER TABLE `wp_terms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_usermeta`
--

DROP TABLE IF EXISTS `wp_usermeta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wp_usermeta` (
  `umeta_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_520_ci,
  PRIMARY KEY (`umeta_id`),
  KEY `user_id` (`user_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_usermeta`
--

LOCK TABLES `wp_usermeta` WRITE;
/*!40000 ALTER TABLE `wp_usermeta` DISABLE KEYS */;
INSERT INTO `wp_usermeta` VALUES (1,1,'nickname','ssadmin'),(2,1,'first_name',''),(3,1,'last_name',''),(4,1,'description',''),(5,1,'rich_editing','true'),(6,1,'syntax_highlighting','true'),(7,1,'comment_shortcuts','false'),(8,1,'admin_color','fresh'),(9,1,'use_ssl','0'),(10,1,'show_admin_bar_front','true'),(11,1,'locale',''),(12,1,'wp_capabilities','a:1:{s:13:\"administrator\";b:1;}'),(13,1,'wp_user_level','10'),(14,1,'dismissed_wp_pointers',''),(15,1,'show_welcome_panel','1'),(16,1,'session_tokens','a:1:{s:64:\"4e1cf2fb8c58ae29b6a0e0032fcd400d99d2611ab2616db2587394d912f88b15\";a:4:{s:10:\"expiration\";i:1758892506;s:2:\"ip\";s:9:\"127.0.0.1\";s:2:\"ua\";s:111:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36\";s:5:\"login\";i:1758719706;}}'),(17,1,'wp_dashboard_quick_press_last_post_id','4'),(18,1,'community-events-location','a:1:{s:2:\"ip\";s:9:\"127.0.0.0\";}'),(19,1,'wp_persisted_preferences','a:4:{s:4:\"core\";a:1:{s:26:\"isComplementaryAreaVisible\";b:1;}s:14:\"core/edit-post\";a:1:{s:12:\"welcomeGuide\";b:0;}s:9:\"_modified\";s:24:\"2025-09-24T13:17:00.161Z\";s:22:\"core/customize-widgets\";a:1:{s:12:\"welcomeGuide\";b:0;}}'),(20,1,'wp_yoast_notifications','a:2:{i:0;a:2:{s:7:\"message\";s:266:\"Вы добавили новый тип контента. Мы рекомендуем вам просмотреть соответствующие <a href=\"http://dolg.loc/wp-admin/admin.php?page=wpseo_page_settings\">Настройки внешнего вида</a>.\";s:7:\"options\";a:10:{s:4:\"type\";s:7:\"warning\";s:2:\"id\";s:25:\"content-types-made-public\";s:7:\"user_id\";i:1;s:5:\"nonce\";N;s:8:\"priority\";d:0.8;s:9:\"data_json\";a:0:{}s:13:\"dismissal_key\";N;s:12:\"capabilities\";s:20:\"wpseo_manage_options\";s:16:\"capability_check\";s:3:\"all\";s:14:\"yoast_branding\";b:0;}}i:1;a:2:{s:7:\"message\";O:61:\"Yoast\\WP\\SEO\\Presenters\\Admin\\Indexing_Notification_Presenter\":3:{s:18:\"\0*\0total_unindexed\";i:2;s:9:\"\0*\0reason\";s:26:\"permalink_settings_changed\";s:20:\"\0*\0short_link_helper\";O:38:\"Yoast\\WP\\SEO\\Helpers\\Short_Link_Helper\":2:{s:17:\"\0*\0options_helper\";O:35:\"Yoast\\WP\\SEO\\Helpers\\Options_Helper\":0:{}s:17:\"\0*\0product_helper\";O:35:\"Yoast\\WP\\SEO\\Helpers\\Product_Helper\":0:{}}}s:7:\"options\";a:10:{s:4:\"type\";s:7:\"warning\";s:2:\"id\";s:13:\"wpseo-reindex\";s:7:\"user_id\";i:1;s:5:\"nonce\";N;s:8:\"priority\";d:0.8;s:9:\"data_json\";a:0:{}s:13:\"dismissal_key\";N;s:12:\"capabilities\";s:20:\"wpseo_manage_options\";s:16:\"capability_check\";s:3:\"all\";s:14:\"yoast_branding\";b:0;}}}'),(21,1,'_yoast_wpseo_introductions','a:0:{}'),(22,1,'_yoast_wpseo_profile_updated','1758719807');
/*!40000 ALTER TABLE `wp_usermeta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_users`
--

DROP TABLE IF EXISTS `wp_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wp_users` (
  `ID` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_login` varchar(60) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `user_pass` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `user_nicename` varchar(50) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `user_email` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `user_url` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `user_registered` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_activation_key` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `user_status` int NOT NULL DEFAULT '0',
  `display_name` varchar(250) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`ID`),
  KEY `user_login_key` (`user_login`),
  KEY `user_nicename` (`user_nicename`),
  KEY `user_email` (`user_email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_users`
--

LOCK TABLES `wp_users` WRITE;
/*!40000 ALTER TABLE `wp_users` DISABLE KEYS */;
INSERT INTO `wp_users` VALUES (1,'ssadmin','$wp$2y$10$.W8CgJTkwxNtM0gnwf1xluv6fBWV7zsWq8VFuuQFqqCE8U/or31XK','ssadmin','a@a.ru','http://dolg.loc','2025-09-24 13:14:57','',0,'ssadmin');
/*!40000 ALTER TABLE `wp_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_yoast_indexable`
--

DROP TABLE IF EXISTS `wp_yoast_indexable`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wp_yoast_indexable` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `permalink` longtext COLLATE utf8mb4_unicode_520_ci,
  `permalink_hash` varchar(40) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `object_id` bigint DEFAULT NULL,
  `object_type` varchar(32) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `object_sub_type` varchar(32) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `author_id` bigint DEFAULT NULL,
  `post_parent` bigint DEFAULT NULL,
  `title` text COLLATE utf8mb4_unicode_520_ci,
  `description` mediumtext COLLATE utf8mb4_unicode_520_ci,
  `breadcrumb_title` text COLLATE utf8mb4_unicode_520_ci,
  `post_status` varchar(20) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `is_public` tinyint(1) DEFAULT NULL,
  `is_protected` tinyint(1) DEFAULT '0',
  `has_public_posts` tinyint(1) DEFAULT NULL,
  `number_of_pages` int unsigned DEFAULT NULL,
  `canonical` longtext COLLATE utf8mb4_unicode_520_ci,
  `primary_focus_keyword` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `primary_focus_keyword_score` int DEFAULT NULL,
  `readability_score` int DEFAULT NULL,
  `is_cornerstone` tinyint(1) DEFAULT '0',
  `is_robots_noindex` tinyint(1) DEFAULT '0',
  `is_robots_nofollow` tinyint(1) DEFAULT '0',
  `is_robots_noarchive` tinyint(1) DEFAULT '0',
  `is_robots_noimageindex` tinyint(1) DEFAULT '0',
  `is_robots_nosnippet` tinyint(1) DEFAULT '0',
  `twitter_title` text COLLATE utf8mb4_unicode_520_ci,
  `twitter_image` longtext COLLATE utf8mb4_unicode_520_ci,
  `twitter_description` longtext COLLATE utf8mb4_unicode_520_ci,
  `twitter_image_id` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `twitter_image_source` text COLLATE utf8mb4_unicode_520_ci,
  `open_graph_title` text COLLATE utf8mb4_unicode_520_ci,
  `open_graph_description` longtext COLLATE utf8mb4_unicode_520_ci,
  `open_graph_image` longtext COLLATE utf8mb4_unicode_520_ci,
  `open_graph_image_id` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `open_graph_image_source` text COLLATE utf8mb4_unicode_520_ci,
  `open_graph_image_meta` mediumtext COLLATE utf8mb4_unicode_520_ci,
  `link_count` int DEFAULT NULL,
  `incoming_link_count` int DEFAULT NULL,
  `prominent_words_version` int unsigned DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `blog_id` bigint NOT NULL DEFAULT '1',
  `language` varchar(32) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `region` varchar(32) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `schema_page_type` varchar(64) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `schema_article_type` varchar(64) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `has_ancestors` tinyint(1) DEFAULT '0',
  `estimated_reading_time_minutes` int DEFAULT NULL,
  `version` int DEFAULT '1',
  `object_last_modified` datetime DEFAULT NULL,
  `object_published_at` datetime DEFAULT NULL,
  `inclusive_language_score` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `object_type_and_sub_type` (`object_type`,`object_sub_type`),
  KEY `object_id_and_type` (`object_id`,`object_type`),
  KEY `permalink_hash_and_object_type` (`permalink_hash`,`object_type`),
  KEY `subpages` (`post_parent`,`object_type`,`post_status`,`object_id`),
  KEY `prominent_words` (`prominent_words_version`,`object_type`,`object_sub_type`,`post_status`),
  KEY `published_sitemap_index` (`object_published_at`,`is_robots_noindex`,`object_type`,`object_sub_type`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_yoast_indexable`
--

LOCK TABLES `wp_yoast_indexable` WRITE;
/*!40000 ALTER TABLE `wp_yoast_indexable` DISABLE KEYS */;
INSERT INTO `wp_yoast_indexable` VALUES (1,'http://dolg.loc/','16:073d2de106dc53525bc3cd271053f16c',NULL,'home-page',NULL,NULL,NULL,'%%sitename%% %%page%% %%sep%% %%sitedesc%%','','Главная страница',NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,0,0,0,NULL,NULL,NULL,NULL,NULL,'%%sitename%%','','','0',NULL,NULL,NULL,NULL,NULL,'2025-09-24 13:16:50','2025-09-26 06:11:29',1,NULL,NULL,NULL,NULL,0,NULL,2,'2025-09-26 09:11:29',NULL,NULL),(2,NULL,NULL,NULL,'system-page','404',NULL,NULL,'Страница не найдена %%sep%% %%sitename%%',NULL,'Ошибка 404: страница не найдена',NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,0,1,0,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-09-24 13:17:00','2025-09-26 01:23:58',1,NULL,NULL,NULL,NULL,0,NULL,1,NULL,NULL,NULL),(3,'http://dolg.loc/category/%d0%b1%d0%b5%d0%b7-%d1%80%d1%83%d0%b1%d1%80%d0%b8%d0%ba%d0%b8/','87:a9d9f9720fbb8bab105862541cacf783',1,'term','category',NULL,NULL,NULL,NULL,'Без рубрики',NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,'2025-09-24 13:17:00','2025-09-26 02:24:36',1,NULL,NULL,NULL,NULL,0,NULL,2,NULL,NULL,NULL),(4,'http://dolg.loc/','16:073d2de106dc53525bc3cd271053f16c',11,'post','page',1,0,NULL,NULL,'Главная','publish',NULL,0,NULL,NULL,NULL,NULL,NULL,90,0,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,'2025-09-24 13:17:55','2025-09-26 06:11:29',1,NULL,NULL,NULL,NULL,0,0,2,'2025-09-26 09:11:29','2025-09-24 13:18:04',0),(5,NULL,NULL,NULL,'system-page','search-result',NULL,NULL,'Вы искали %%searchphrase%% %%page%% %%sep%% %%sitename%%',NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,0,1,0,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-09-24 14:19:48','2025-09-26 01:23:58',1,NULL,NULL,NULL,NULL,0,NULL,1,NULL,NULL,NULL),(6,NULL,NULL,NULL,'date-archive',NULL,NULL,NULL,'%%date%% %%page%% %%sep%% %%sitename%%','',NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,0,1,0,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-09-24 14:19:48','2025-09-26 01:23:58',1,NULL,NULL,NULL,NULL,0,NULL,1,NULL,NULL,NULL),(7,NULL,NULL,NULL,'post-type-archive','case_study',NULL,NULL,'Архив %%pt_plural%% %%page%% %%sep%% %%sitename%%','','Кейсы',NULL,1,0,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-09-24 14:19:48','2025-09-25 16:18:14',1,NULL,NULL,NULL,NULL,0,NULL,0,NULL,NULL,NULL),(8,'http://dolg.loc/case-studies/','29:46b76bc53148a019ebbb753dfd472c0d',NULL,'post-type-archive','case_study',NULL,NULL,'Архив %%pt_plural%% %%page%% %%sep%% %%sitename%%','','Кейсы',NULL,1,0,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-09-26 05:24:36','2025-09-26 02:24:36',1,NULL,NULL,NULL,NULL,0,NULL,2,NULL,NULL,NULL);
/*!40000 ALTER TABLE `wp_yoast_indexable` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_yoast_indexable_hierarchy`
--

DROP TABLE IF EXISTS `wp_yoast_indexable_hierarchy`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wp_yoast_indexable_hierarchy` (
  `indexable_id` int unsigned NOT NULL,
  `ancestor_id` int unsigned NOT NULL,
  `depth` int unsigned DEFAULT NULL,
  `blog_id` bigint NOT NULL DEFAULT '1',
  PRIMARY KEY (`indexable_id`,`ancestor_id`),
  KEY `indexable_id` (`indexable_id`),
  KEY `ancestor_id` (`ancestor_id`),
  KEY `depth` (`depth`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_yoast_indexable_hierarchy`
--

LOCK TABLES `wp_yoast_indexable_hierarchy` WRITE;
/*!40000 ALTER TABLE `wp_yoast_indexable_hierarchy` DISABLE KEYS */;
INSERT INTO `wp_yoast_indexable_hierarchy` VALUES (1,0,0,1),(3,0,0,1),(4,0,0,1);
/*!40000 ALTER TABLE `wp_yoast_indexable_hierarchy` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_yoast_migrations`
--

DROP TABLE IF EXISTS `wp_yoast_migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wp_yoast_migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `version` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `wp_yoast_migrations_version` (`version`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_yoast_migrations`
--

LOCK TABLES `wp_yoast_migrations` WRITE;
/*!40000 ALTER TABLE `wp_yoast_migrations` DISABLE KEYS */;
INSERT INTO `wp_yoast_migrations` VALUES (1,'20171228151840'),(2,'20171228151841'),(3,'20190529075038'),(4,'20191011111109'),(5,'20200408101900'),(6,'20200420073606'),(7,'20200428123747'),(8,'20200428194858'),(9,'20200429105310'),(10,'20200430075614'),(11,'20200430150130'),(12,'20200507054848'),(13,'20200513133401'),(14,'20200609154515'),(15,'20200616130143'),(16,'20200617122511'),(17,'20200702141921'),(18,'20200728095334'),(19,'20201202144329'),(20,'20201216124002'),(21,'20201216141134'),(22,'20210817092415'),(23,'20211020091404'),(24,'20230417083836');
/*!40000 ALTER TABLE `wp_yoast_migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_yoast_primary_term`
--

DROP TABLE IF EXISTS `wp_yoast_primary_term`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wp_yoast_primary_term` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `post_id` bigint DEFAULT NULL,
  `term_id` bigint DEFAULT NULL,
  `taxonomy` varchar(32) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `blog_id` bigint NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `post_taxonomy` (`post_id`,`taxonomy`),
  KEY `post_term` (`post_id`,`term_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_yoast_primary_term`
--

LOCK TABLES `wp_yoast_primary_term` WRITE;
/*!40000 ALTER TABLE `wp_yoast_primary_term` DISABLE KEYS */;
/*!40000 ALTER TABLE `wp_yoast_primary_term` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_yoast_seo_links`
--

DROP TABLE IF EXISTS `wp_yoast_seo_links`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wp_yoast_seo_links` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `url` varchar(255) DEFAULT NULL,
  `post_id` bigint unsigned DEFAULT NULL,
  `target_post_id` bigint unsigned DEFAULT NULL,
  `type` varchar(8) DEFAULT NULL,
  `indexable_id` int unsigned DEFAULT NULL,
  `target_indexable_id` int unsigned DEFAULT NULL,
  `height` int unsigned DEFAULT NULL,
  `width` int unsigned DEFAULT NULL,
  `size` int unsigned DEFAULT NULL,
  `language` varchar(32) DEFAULT NULL,
  `region` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `link_direction` (`post_id`,`type`),
  KEY `indexable_link_direction` (`indexable_id`,`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_yoast_seo_links`
--

LOCK TABLES `wp_yoast_seo_links` WRITE;
/*!40000 ALTER TABLE `wp_yoast_seo_links` DISABLE KEYS */;
/*!40000 ALTER TABLE `wp_yoast_seo_links` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'dolg'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-09-26 12:12:12
