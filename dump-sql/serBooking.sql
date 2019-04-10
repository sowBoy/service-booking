-- Adminer 4.7.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `address`;
CREATE TABLE `address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_info_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `street` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude` double NOT NULL,
  `latitude` double NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_D4E6F81586DFF2` (`user_info_id`),
  KEY `IDX_D4E6F818BAC62AF` (`city_id`),
  CONSTRAINT `FK_D4E6F81586DFF2` FOREIGN KEY (`user_info_id`) REFERENCES `user_info` (`id`),
  CONSTRAINT `FK_D4E6F818BAC62AF` FOREIGN KEY (`city_id`) REFERENCES `city` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `booking`;
CREATE TABLE `booking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `booking_status_id` int(11) DEFAULT NULL,
  `kuruma_cleaner_account_id` int(11) DEFAULT NULL,
  `user_info_id` int(11) DEFAULT NULL,
  `address_id` int(11) DEFAULT NULL,
  `appointment_time` datetime DEFAULT NULL,
  `total_amount` double NOT NULL,
  `distance` double DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_E00CEDDEF8C5CBBE` (`booking_status_id`),
  KEY `IDX_E00CEDDE3F6308D7` (`kuruma_cleaner_account_id`),
  KEY `IDX_E00CEDDE586DFF2` (`user_info_id`),
  KEY `IDX_E00CEDDEF5B7AF75` (`address_id`),
  CONSTRAINT `FK_E00CEDDE3F6308D7` FOREIGN KEY (`kuruma_cleaner_account_id`) REFERENCES `kuruma_cleaner_account` (`id`),
  CONSTRAINT `FK_E00CEDDE586DFF2` FOREIGN KEY (`user_info_id`) REFERENCES `user_info` (`id`),
  CONSTRAINT `FK_E00CEDDEF5B7AF75` FOREIGN KEY (`address_id`) REFERENCES `address` (`id`),
  CONSTRAINT `FK_E00CEDDEF8C5CBBE` FOREIGN KEY (`booking_status_id`) REFERENCES `booking_status` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `booking_status`;
CREATE TABLE `booking_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `city`;
CREATE TABLE `city` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `city_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `kuruma_cleaner_account`;
CREATE TABLE `kuruma_cleaner_account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `siret` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `siren` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `identity_doc_num` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `accepted` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `package`;
CREATE TABLE `package` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vehicle_categories_id` int(11) DEFAULT NULL,
  `washing_type_id` int(11) DEFAULT NULL,
  `booking_id` int(11) DEFAULT NULL,
  `amount` double NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_DE686795F5C3497D` (`vehicle_categories_id`),
  KEY `IDX_DE6867957AAF7026` (`washing_type_id`),
  KEY `IDX_DE6867953301C60` (`booking_id`),
  CONSTRAINT `FK_DE6867953301C60` FOREIGN KEY (`booking_id`) REFERENCES `booking` (`id`),
  CONSTRAINT `FK_DE6867957AAF7026` FOREIGN KEY (`washing_type_id`) REFERENCES `washing_type` (`id`),
  CONSTRAINT `FK_DE686795F5C3497D` FOREIGN KEY (`vehicle_categories_id`) REFERENCES `vehicle_categories` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `payment`;
CREATE TABLE `payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kuruma_cleaner_account_id` int(11) DEFAULT NULL,
  `user_info_id` int(11) DEFAULT NULL,
  `booking_id` int(11) DEFAULT NULL,
  `amount` double NOT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_6D28840D3301C60` (`booking_id`),
  KEY `IDX_6D28840D3F6308D7` (`kuruma_cleaner_account_id`),
  KEY `IDX_6D28840D586DFF2` (`user_info_id`),
  CONSTRAINT `FK_6D28840D3301C60` FOREIGN KEY (`booking_id`) REFERENCES `booking` (`id`),
  CONSTRAINT `FK_6D28840D3F6308D7` FOREIGN KEY (`kuruma_cleaner_account_id`) REFERENCES `kuruma_cleaner_account` (`id`),
  CONSTRAINT `FK_6D28840D586DFF2` FOREIGN KEY (`user_info_id`) REFERENCES `user_info` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `user_info`;
CREATE TABLE `user_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `vehicle_categories`;
CREATE TABLE `vehicle_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `washing_type`;
CREATE TABLE `washing_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- 2019-04-10 06:57:06
