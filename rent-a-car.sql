-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Gegenereerd op: 12 jun 2024 om 09:28
-- Serverversie: 5.7.28
-- PHP-versie: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rent-a-car`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `admin_cred`
--

DROP TABLE IF EXISTS `admin_cred`;
CREATE TABLE IF NOT EXISTS `admin_cred` (
  `sr_no` int(11) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(150) NOT NULL,
  `admin_pass` varchar(150) NOT NULL,
  PRIMARY KEY (`sr_no`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `admin_cred`
--

INSERT INTO `admin_cred` (`sr_no`, `admin_name`, `admin_pass`) VALUES
(1, 'Jansen ', '12345');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `booking_details`
--

DROP TABLE IF EXISTS `booking_details`;
CREATE TABLE IF NOT EXISTS `booking_details` (
  `sr_no` int(11) NOT NULL AUTO_INCREMENT,
  `booking_id` int(11) NOT NULL,
  `car_name` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `total_pay` int(11) NOT NULL,
  `car_no` int(11) DEFAULT NULL,
  `user_name` varchar(100) NOT NULL,
  `phonenum` varchar(100) NOT NULL,
  `address` varchar(150) NOT NULL,
  PRIMARY KEY (`sr_no`),
  KEY `booking_id` (`booking_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `booking_details`
--

INSERT INTO `booking_details` (`sr_no`, `booking_id`, `car_name`, `price`, `total_pay`, `car_no`, `user_name`, `phonenum`, `address`) VALUES
(2, 4, 'Mercedes W126', 200, 600, NULL, 'Daan Swart', '0681701480', 'iepenstraat 4');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `booking_order`
--

DROP TABLE IF EXISTS `booking_order`;
CREATE TABLE IF NOT EXISTS `booking_order` (
  `booking_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `order_id` varchar(150) NOT NULL,
  `datentime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`booking_id`),
  KEY `user_id` (`user_id`),
  KEY `car_id` (`car_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `booking_order`
--

INSERT INTO `booking_order` (`booking_id`, `user_id`, `car_id`, `check_in`, `check_out`, `order_id`, `datentime`) VALUES
(4, 12, 9, '2024-06-12', '2024-06-15', 'ORD_122868937', '2024-06-12 10:53:34');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `carousel`
--

DROP TABLE IF EXISTS `carousel`;
CREATE TABLE IF NOT EXISTS `carousel` (
  `sr_no` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(150) CHARACTER SET utf8mb4 NOT NULL,
  PRIMARY KEY (`sr_no`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `carousel`
--

INSERT INTO `carousel` (`sr_no`, `image`) VALUES
(34, 'IMG_24669.png'),
(32, 'IMG_99599.png'),
(31, 'IMG_22230.png');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `cars`
--

DROP TABLE IF EXISTS `cars`;
CREATE TABLE IF NOT EXISTS `cars` (
  `sr_no` int(11) NOT NULL AUTO_INCREMENT,
  `license_plate` varchar(20) NOT NULL,
  `brand` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `cost_per_day` int(11) NOT NULL,
  `description` varchar(350) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `removed` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`sr_no`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `cars`
--

INSERT INTO `cars` (`sr_no`, `license_plate`, `brand`, `type`, `cost_per_day`, `description`, `status`, `removed`) VALUES
(1, '12-12-12', 'Fiat', 'Panda', 250, 'Lorem ipsum dolor sit amet consectetur adipiscing elit, lacus mollis ante erat euismod accumsan eros arcu, hac justo bibendum vestibulum faucibus varius.', 1, 0),
(2, '13-13-13', 'Fiat', 'Punto', 100, 'Lorem ipsum dolor sit amet consectetur adipiscing elit, lacus mollis ante erat euismod accumsan eros arcu, hac justo bibendum vestibulum faucibus varius.', 1, 1),
(3, '14-14-14', 'Volvo', 'V70', 50, 'Lorem ipsum dolor sit amet consectetur adipiscing elit nisi, tortor vulputate bibendum elementum pharetra consequat vitae, varius magnis leo at cras tellus enim. Rutrum proin natoque condimentum viverra lobortis platea augue placerat dapibus, potenti varius nisi non ultrices ridiculus nunc conubia,.', 1, 0),
(4, '15-15-15', 'Opel', 'Corsa', 210, 'Lorem ipsum dolor sit amet consectetur adipiscing elit, lacus mollis ante erat euismod accumsan eros arcu, hac justo bibendum vestibulum faucibus varius.', 1, 0),
(5, '16-16-16', 'Renault', 'Clio', 60, 'Lorem ipsum dolor sit amet consectetur adipiscing elit, lacus mollis ante erat euismod accumsan eros arcu, hac justo bibendum vestibulum faucibus varius.', 1, 1),
(6, '17-17-17', 'Mercedes', 'Benz', 500, 'Lorem ipsum dolor sit amet consectetur adipiscing elit, lacus mollis ante erat euismod accumsan eros arcu, hac justo bibendum vestibulum faucibus varius.', 1, 1),
(7, 'DA-SS-32', 'Opel', 'Corsa', 1000, 'Deze Opel Corsa is volledig automatisch geschakeld. Ik mis deze auto heel erg.', 1, 1),
(8, '16-16-16', 'Mercedes', 'W126', 250, 'Lorem ipsum dolor sit amet consectetur adipiscing elit, lacus mollis ante erat euismod accumsan eros arcu, hac justo bibendum vestibulum faucibus varius.', 1, 1),
(9, '16-16-16', 'Mercedes', 'W126', 200, 'Lorem ipsum dolor sit amet consectetur adipiscing elit, lacus mollis ante erat euismod accumsan eros arcu, hac justo bibendum vestibulum faucibus varius.', 1, 0),
(10, 'AC-11-9B', 'Renault', 'Clio', 900, 'Lorem ipsum dolor sit amet consectetur adipiscing elit, lacus mollis ante erat euismod accumsan eros...', 1, 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `car_facilities`
--

DROP TABLE IF EXISTS `car_facilities`;
CREATE TABLE IF NOT EXISTS `car_facilities` (
  `sr_no` int(11) NOT NULL AUTO_INCREMENT,
  `car_id` int(11) NOT NULL,
  `facilities_id` int(11) NOT NULL,
  PRIMARY KEY (`sr_no`),
  KEY `facilities_id` (`facilities_id`),
  KEY `car_id` (`car_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `car_images`
--

DROP TABLE IF EXISTS `car_images`;
CREATE TABLE IF NOT EXISTS `car_images` (
  `sr_no` int(11) NOT NULL AUTO_INCREMENT,
  `car_id` int(11) NOT NULL,
  `image` varchar(150) NOT NULL,
  `thumb` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`sr_no`),
  KEY `car_id` (`car_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `car_images`
--

INSERT INTO `car_images` (`sr_no`, `car_id`, `image`, `thumb`) VALUES
(1, 1, 'IMG_54755.jpg', 0),
(2, 1, 'IMG_96117.jpg', 1),
(6, 1, 'IMG_27466.jpg', 0),
(7, 3, 'IMG_19719.jpg', 1),
(8, 4, 'IMG_85466.jpg', 1),
(10, 9, 'IMG_47521.jpg', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `contact_details`
--

DROP TABLE IF EXISTS `contact_details`;
CREATE TABLE IF NOT EXISTS `contact_details` (
  `sr_no` int(11) NOT NULL AUTO_INCREMENT,
  `address` varchar(50) NOT NULL,
  `gmap` varchar(100) NOT NULL,
  `pn1` bigint(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `fb` varchar(100) NOT NULL,
  `insta` varchar(100) NOT NULL,
  `tw` varchar(100) NOT NULL,
  `iframe` varchar(300) NOT NULL,
  PRIMARY KEY (`sr_no`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `contact_details`
--

INSERT INTO `contact_details` (`sr_no`, `address`, `gmap`, `pn1`, `email`, `fb`, `insta`, `tw`, `iframe`) VALUES
(1, 'Roc Flevoland, Almere, Flevoland', 'https://maps.app.goo.gl/zSfQ2XQdf9R2f3qN6', 366754321, 'voorbeeld@hotmail.com', 'https://www.facebook.com/', 'https://www.instagram.com/', '', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d311811.99125459243!2d4.648311!3d52.3698546!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c617c1dcedf6af:0xb7e60f149191e0f!2sMBO College Almere - ROC van Flevoland!5e0!3m2!1snl!2snl!4v1711100915707!5m2!1snl!2snl');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `facilities`
--

DROP TABLE IF EXISTS `facilities`;
CREATE TABLE IF NOT EXISTS `facilities` (
  `sr_no` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `category` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`sr_no`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `facilities`
--

INSERT INTO `facilities` (`sr_no`, `name`, `category`) VALUES
(1, 'Elektrisch', 'Fuel'),
(2, 'Benzine', 'Fuel'),
(3, 'Gas', 'Fuel'),
(4, 'Diesel', 'Fuel'),
(5, 'Handgeschakeld', 'Gear'),
(6, 'Automaat', 'Gear'),
(7, '4 zitplaaten', 'Seats'),
(8, '5 zitplaatsen', 'Seats'),
(9, '7 zitplaatsen', 'Seats'),
(10, '4 deuren', 'Doors'),
(11, '5 deuren', 'Doors'),
(12, '1 koffer', 'Suitcase'),
(13, '2 koffers', 'Suitcase'),
(14, '3 koffers', 'Suitcase'),
(15, 'Airco', NULL);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `sr_no` int(11) NOT NULL AUTO_INCREMENT,
  `site_title` varchar(50) NOT NULL,
  `site_about` varchar(250) NOT NULL,
  `shutdown` tinyint(1) NOT NULL,
  PRIMARY KEY (`sr_no`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `settings`
--

INSERT INTO `settings` (`sr_no`, `site_title`, `site_about`, `shutdown`) VALUES
(1, 'Rent-A-Car', 'Lorem ipsum dolor sit amet consectetur adipiscing elit ut, sociis ultricies vehicula euismod justo dis duis, aenean odio etiam id in malesuada nunc. Sem nisi in ligula ornare commodo vitae curae susc.', 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `team_details`
--

DROP TABLE IF EXISTS `team_details`;
CREATE TABLE IF NOT EXISTS `team_details` (
  `sr_no` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `picture` varchar(150) NOT NULL,
  PRIMARY KEY (`sr_no`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `team_details`
--

INSERT INTO `team_details` (`sr_no`, `name`, `picture`) VALUES
(7, 'Persoon 1', 'IMG_43742.jpg'),
(8, 'Persoon 2', 'IMG_99060.jpg'),
(9, 'Persoon 3', 'IMG_73748.jpg'),
(10, 'persoon 4', 'IMG_38838.jpg'),
(11, 'persoon 5', 'IMG_61499.jpg'),
(12, 'persoon 6', 'IMG_16215.jpg');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user_cred`
--

DROP TABLE IF EXISTS `user_cred`;
CREATE TABLE IF NOT EXISTS `user_cred` (
  `sr_no` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `zip-code` varchar(32) NOT NULL,
  `address` varchar(120) NOT NULL,
  `phonenum` varchar(100) NOT NULL,
  `residence` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `password` varchar(200) NOT NULL,
  `profile` varchar(100) NOT NULL,
  `is_verified` int(11) NOT NULL DEFAULT '0',
  `token` varchar(200) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `datentime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`sr_no`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `user_cred`
--

INSERT INTO `user_cred` (`sr_no`, `name`, `email`, `zip-code`, `address`, `phonenum`, `residence`, `dob`, `password`, `profile`, `is_verified`, `token`, `status`, `datentime`) VALUES
(12, 'Daan Swart', 'daswart18@outlook.com', '1326BA', 'iepenstraat 4', '0681701480', 'Almere', '1991-11-24', '$2y$10$T0t8/KDTTwMSlHHLRiOgc.pdp95rAxVayNxx/fEsiBeajcJgoZLb2', 'IMG_80946.jpg', 1, '2df7a8ceaa342e06805a53748faa2027', 1, '2024-06-06 17:26:21');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user_queries`
--

DROP TABLE IF EXISTS `user_queries`;
CREATE TABLE IF NOT EXISTS `user_queries` (
  `sr_no` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `message` varchar(500) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `seen` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`sr_no`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `user_queries`
--

INSERT INTO `user_queries` (`sr_no`, `name`, `email`, `subject`, `message`, `date`, `seen`) VALUES
(9, 'Daan', 'daan@mail.com', 'abc', 'abcdefg', '2024-04-02 14:06:10', 0);

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `booking_details`
--
ALTER TABLE `booking_details`
  ADD CONSTRAINT `booking_details_ibfk_1` FOREIGN KEY (`booking_id`) REFERENCES `booking_order` (`booking_id`);

--
-- Beperkingen voor tabel `booking_order`
--
ALTER TABLE `booking_order`
  ADD CONSTRAINT `booking_order_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_cred` (`sr_no`),
  ADD CONSTRAINT `booking_order_ibfk_2` FOREIGN KEY (`car_id`) REFERENCES `cars` (`sr_no`);

--
-- Beperkingen voor tabel `car_facilities`
--
ALTER TABLE `car_facilities`
  ADD CONSTRAINT `car_id` FOREIGN KEY (`car_id`) REFERENCES `cars` (`sr_no`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `facilities_id` FOREIGN KEY (`facilities_id`) REFERENCES `facilities` (`sr_no`) ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `car_images`
--
ALTER TABLE `car_images`
  ADD CONSTRAINT `car_images_ibfk_1` FOREIGN KEY (`car_id`) REFERENCES `cars` (`sr_no`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
