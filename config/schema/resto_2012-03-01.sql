# ************************************************************
# Sequel Pro SQL dump
# Version 3408
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.5.21)
# Database: resto
# Generation Time: 2012-03-02 05:15:01 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table contact
# ------------------------------------------------------------

DROP TABLE IF EXISTS `contact`;

CREATE TABLE `contact` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(250) NOT NULL DEFAULT '',
  `last_name` varchar(250) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `contact` WRITE;
/*!40000 ALTER TABLE `contact` DISABLE KEYS */;

INSERT INTO `contact` (`id`, `first_name`, `last_name`)
VALUES
	(1,'Surendra','Mathe Test'),
	(2,'Roger','Hom'),
	(3,'Fred','Isaacs'),
	(4,'Trevor','Deng'),
	(5,'Amir','Hidjabib'),
	(6,'Damon','Hastings');

/*!40000 ALTER TABLE `contact` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table location
# ------------------------------------------------------------

DROP TABLE IF EXISTS `location`;

CREATE TABLE `location` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `address` varchar(1000) DEFAULT '',
  `cross_street` varchar(1000) DEFAULT NULL,
  `lat` varchar(25) DEFAULT NULL,
  `lng` varchar(25) DEFAULT NULL,
  `postal_code` varchar(10) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `distance` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `location` WRITE;
/*!40000 ALTER TABLE `location` DISABLE KEYS */;

INSERT INTO `location` (`id`, `address`, `cross_street`, `lat`, `lng`, `postal_code`, `city`, `state`, `country`, `distance`)
VALUES
	(1,'Address 1','Cross Street 1','1','1','11111','San Francisco','CA','USA',NULL),
	(2,'Address 2','Cross Street 2','2','2','22222','Oakland','CA','USA',NULL),
	(3,'Address 3','Cross Street 3','3','3','33333','Kansas City','MO','USA',NULL);

/*!40000 ALTER TABLE `location` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table suggestion
# ------------------------------------------------------------

DROP TABLE IF EXISTS `suggestion`;

CREATE TABLE `suggestion` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `data` varchar(5000) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `suggestion` WRITE;
/*!40000 ALTER TABLE `suggestion` DISABLE KEYS */;

INSERT INTO `suggestion` (`id`, `data`)
VALUES
	(1,'suggestion 1'),
	(2,'suggestion 2'),
	(3,'suggestion 3'),
	(4,'suggestion 4'),
	(5,'suggestion 5');

/*!40000 ALTER TABLE `suggestion` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL DEFAULT '',
  `last_name` varchar(100) NOT NULL DEFAULT '',
  `nick_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;

INSERT INTO `user` (`id`, `first_name`, `last_name`, `nick_name`)
VALUES
	(1,'Surendra','Mathe','suri'),
	(2,'Fred','Issacs','fred'),
	(3,'Roger','Hom','roger');

/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table userSuggestions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `userSuggestions`;

CREATE TABLE `userSuggestions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `suggestion_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `userId` (`user_id`),
  KEY `suggestionId` (`suggestion_id`),
  CONSTRAINT `us_suggestion_id` FOREIGN KEY (`suggestion_id`) REFERENCES `suggestion` (`id`),
  CONSTRAINT `us_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `userSuggestions` WRITE;
/*!40000 ALTER TABLE `userSuggestions` DISABLE KEYS */;

INSERT INTO `userSuggestions` (`id`, `user_id`, `suggestion_id`)
VALUES
	(2,1,1),
	(3,1,2),
	(4,2,3),
	(5,3,4);

/*!40000 ALTER TABLE `userSuggestions` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table venue
# ------------------------------------------------------------

DROP TABLE IF EXISTS `venue`;

CREATE TABLE `venue` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(500) NOT NULL DEFAULT '',
  `location_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `venue_loc_id` (`location_id`),
  CONSTRAINT `venue_loc_id` FOREIGN KEY (`location_id`) REFERENCES `location` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `venue` WRITE;
/*!40000 ALTER TABLE `venue` DISABLE KEYS */;

INSERT INTO `venue` (`id`, `name`, `location_id`)
VALUES
	(3,'Venue 1',1),
	(4,'Venue 2',3),
	(5,'Venue 3',2);

/*!40000 ALTER TABLE `venue` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table venueContacts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `venueContacts`;

CREATE TABLE `venueContacts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `venue_id` int(11) unsigned NOT NULL,
  `contact_id` int(11) unsigned NOT NULL,
  `isOwner` tinyint(11) NOT NULL DEFAULT '0',
  `isManger` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `vc_venue_id` (`venue_id`),
  KEY `vc_contacs_id` (`contact_id`),
  CONSTRAINT `vc_contacs_id` FOREIGN KEY (`contact_id`) REFERENCES `contact` (`id`),
  CONSTRAINT `vc_venue_id` FOREIGN KEY (`venue_id`) REFERENCES `venue` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `venueContacts` WRITE;
/*!40000 ALTER TABLE `venueContacts` DISABLE KEYS */;

INSERT INTO `venueContacts` (`id`, `venue_id`, `contact_id`, `isOwner`, `isManger`)
VALUES
	(3,3,3,0,0),
	(4,3,4,1,0),
	(5,3,5,0,1),
	(6,4,2,0,0),
	(7,5,1,0,0);

/*!40000 ALTER TABLE `venueContacts` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table venueSuggestions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `venueSuggestions`;

CREATE TABLE `venueSuggestions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `venue_id` int(11) unsigned NOT NULL,
  `suggestion_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `vs_venue_id` (`venue_id`),
  KEY `vd_sugg_id` (`suggestion_id`),
  CONSTRAINT `vd_sugg_id` FOREIGN KEY (`suggestion_id`) REFERENCES `suggestion` (`id`),
  CONSTRAINT `vs_venue_id` FOREIGN KEY (`venue_id`) REFERENCES `venue` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `venueSuggestions` WRITE;
/*!40000 ALTER TABLE `venueSuggestions` DISABLE KEYS */;

INSERT INTO `venueSuggestions` (`id`, `venue_id`, `suggestion_id`)
VALUES
	(1,3,1),
	(2,4,2),
	(3,5,3);

/*!40000 ALTER TABLE `venueSuggestions` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
