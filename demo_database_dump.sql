SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;


CREATE TABLE IF NOT EXISTS `action` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `amount` int(11) DEFAULT NULL,
  `random_factor` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

INSERT INTO `action` (`id`, `name`, `type`, `amount`, `random_factor`) VALUES
(1, 'Heal Player 5-15 Points', 0, 10, 5),
(2, 'Damage Player 50-100 Points', 1, 75, 25);

CREATE TABLE IF NOT EXISTS `equipslot` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `game` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `welcome_message` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `version_numeric` int(11) NOT NULL,
  `version_display` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `initial_location_id` int(11) DEFAULT NULL,
  `about_text` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_83199EB21AD73273` (`initial_location_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

INSERT INTO `game` (`id`, `name`, `welcome_message`, `version_numeric`, `version_display`, `initial_location_id`, `about_text`) VALUES
(1, 'Demo Game', 'Welcome to the game. This is just a demo game. have fun!', 0, 'v0.1', 1, 'The demo game for ">use lamp".');

CREATE TABLE IF NOT EXISTS `gameentity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `location_text` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location_id` int(11) DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_FED2D79D64D218E` (`location_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

INSERT INTO `gameentity` (`id`, `name`, `location_text`, `description`, `location_id`, `type`) VALUES
(1, 'lamp', 'A small, shaded, drawstring lamp sits on a pedestal in the center of the room.', 'Looks like the kind you''d find at any department store.', 1, 'item'),
(3, 'bottle', 'A bottle with a skull and crossbones is here.', 'A large green bottle filled with an unknown liquid, but the skull and crossbones on it makes you feel it can''t be good.', 2, 'item'),
(5, 'John', NULL, NULL, 1, 'player');

CREATE TABLE IF NOT EXISTS `item` (
  `id` int(11) NOT NULL,
  `in_inventory_of_player_id` int(11) DEFAULT NULL,
  `weight` double NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_BF298A20AECA3FE2` (`in_inventory_of_player_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `item` (`id`, `in_inventory_of_player_id`, `weight`) VALUES
(1, NULL, 1.2),
(3, NULL, 1);

CREATE TABLE IF NOT EXISTS `itemtype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `equips_in_slot_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_7FE4F889DB40209F` (`equips_in_slot_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `item__useactions` (
  `item_id` int(11) NOT NULL,
  `action_id` int(11) NOT NULL,
  PRIMARY KEY (`item_id`,`action_id`),
  KEY `IDX_B9C8F1BA126F525E` (`item_id`),
  KEY `IDX_B9C8F1BA9D32F035` (`action_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `item__useactions` (`item_id`, `action_id`) VALUES
(1, 1),
(3, 2);

CREATE TABLE IF NOT EXISTS `location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `navigation_matrix_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_A7E8EB9D49AA4A57` (`navigation_matrix_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

INSERT INTO `location` (`id`, `name`, `description`, `navigation_matrix_id`) VALUES
(1, 'Mysterious Room', 'You are in a mysterious, dark room. You can see light under a doorcrack to the south.', 1),
(2, 'Mansion Foyer', 'The foyer of an old southern mansion. The shutters outside have begun to fall off, and a thick layer of dust has settled over everything. There is a door into a room to the north and an exit onto a patio to the south.', 2),
(3, 'Screened-In Patio', 'A screened-in patio of an old southern mansion. A door to the north leads back inside. Cicadas buzz in the distance.', 3);

CREATE TABLE IF NOT EXISTS `navigationmatrix` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `location_north_id` int(11) DEFAULT NULL,
  `location_northeast_id` int(11) DEFAULT NULL,
  `location_northwest_id` int(11) DEFAULT NULL,
  `location_east_id` int(11) DEFAULT NULL,
  `location_west_id` int(11) DEFAULT NULL,
  `location_south_id` int(11) DEFAULT NULL,
  `location_southeast_id` int(11) DEFAULT NULL,
  `location_southwest_id` int(11) DEFAULT NULL,
  `location_in_id` int(11) DEFAULT NULL,
  `location_out_id` int(11) DEFAULT NULL,
  `location_up_id` int(11) DEFAULT NULL,
  `location_down_id` int(11) DEFAULT NULL,
  `invalid_direction_message` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_DCA443DD21C25A05` (`location_north_id`),
  KEY `IDX_DCA443DD8DC939D0` (`location_northeast_id`),
  KEY `IDX_DCA443DDE619F621` (`location_northwest_id`),
  KEY `IDX_DCA443DDAA20C291` (`location_east_id`),
  KEY `IDX_DCA443DDC1F00D60` (`location_west_id`),
  KEY `IDX_DCA443DDDB794E47` (`location_south_id`),
  KEY `IDX_DCA443DDFDA2CEBB` (`location_southeast_id`),
  KEY `IDX_DCA443DD9672014A` (`location_southwest_id`),
  KEY `IDX_DCA443DD66A53B16` (`location_in_id`),
  KEY `IDX_DCA443DD4F7DD078` (`location_out_id`),
  KEY `IDX_DCA443DD73736139` (`location_up_id`),
  KEY `IDX_DCA443DDFC79B96E` (`location_down_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

INSERT INTO `navigationmatrix` (`id`, `location_north_id`, `location_northeast_id`, `location_northwest_id`, `location_east_id`, `location_west_id`, `location_south_id`, `location_southeast_id`, `location_southwest_id`, `location_in_id`, `location_out_id`, `location_up_id`, `location_down_id`, `invalid_direction_message`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, 'You fumble around in the darkness but cannot find an exit that way.'),
(2, 1, NULL, NULL, NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, 'There isn''t a door that way!'),
(3, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'You can''t go out that way!');

CREATE TABLE IF NOT EXISTS `nonplayercharacter` (
  `id` int(11) NOT NULL,
  `strength` int(11) NOT NULL,
  `intellect` int(11) NOT NULL,
  `dexterity` int(11) NOT NULL,
  `charisma` int(11) NOT NULL,
  `luck` int(11) NOT NULL,
  `gender` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `notification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `player_id` int(11) DEFAULT NULL,
  `time` datetime NOT NULL,
  `message` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_A765AD3299E6F5DF` (`player_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=15 ;

INSERT INTO `notification` (`id`, `player_id`, `time`, `message`) VALUES
(1, 5, '2013-10-06 06:09:47', 'John danced to music only they could hear.'),
(2, 5, '2013-10-06 06:10:34', 'John danced to music only they could hear.'),
(3, 5, '2013-10-06 06:10:42', 'John danced to music only they could hear.'),
(4, 5, '2013-10-06 06:10:54', 'John danced to music only they could hear.'),
(5, 5, '2013-10-06 06:11:31', 'John danced to music only they could hear.'),
(6, 5, '2013-10-06 06:11:46', 'John danced to music only they could hear.'),
(7, 5, '2013-10-06 06:16:28', 'John danced to music only they could hear.'),
(8, 5, '2013-10-06 06:17:54', 'John danced to music only they could hear.'),
(9, 5, '2013-10-06 06:18:10', 'John danced to music only they could hear.'),
(10, 5, '2013-10-06 06:26:31', 'John danced to music only he could hear.'),
(11, 5, '2013-10-06 06:27:16', 'John danced to music only he could hear.'),
(12, 5, '2013-10-06 06:27:42', 'John danced to music only it could hear.'),
(13, 5, '2013-10-06 06:27:55', 'John danced to music only zhe could hear.'),
(14, 5, '2013-10-06 06:28:34', 'John danced to music only he could hear.');

CREATE TABLE IF NOT EXISTS `playercharacter` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `money` int(11) NOT NULL,
  `health` int(11) NOT NULL,
  `max_health` int(11) NOT NULL,
  `strength` int(11) NOT NULL,
  `intellect` int(11) NOT NULL,
  `dexterity` int(11) NOT NULL,
  `charisma` int(11) NOT NULL,
  `luck` int(11) NOT NULL,
  `last_active` datetime NOT NULL,
  `gender` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_BB6DB4B4A76ED395` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `playercharacter` (`id`, `user_id`, `money`, `health`, `max_health`, `strength`, `intellect`, `dexterity`, `charisma`, `luck`, `last_active`, `gender`) VALUES
(5, 10, 10, 100, 100, 90, 110, 110, 110, 100, '2013-10-06 06:28:34', 1);

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `verbose_mode_on` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

INSERT INTO `user` (`id`, `email_address`, `password_hash`, `verbose_mode_on`) VALUES
(10, 'test@user.com', '$1$Sc2.z94.$yGhAkyLme5spSXK8S2Hhr/', 1);


ALTER TABLE `game`
  ADD CONSTRAINT `FK_83199EB21AD73273` FOREIGN KEY (`initial_location_id`) REFERENCES `location` (`id`);

ALTER TABLE `gameentity`
  ADD CONSTRAINT `FK_B623D17B64D218E` FOREIGN KEY (`location_id`) REFERENCES `location` (`id`);

ALTER TABLE `item`
  ADD CONSTRAINT `FK_BF298A20AECA3FE2` FOREIGN KEY (`in_inventory_of_player_id`) REFERENCES `playercharacter` (`id`),
  ADD CONSTRAINT `FK_BF298A20BF396750` FOREIGN KEY (`id`) REFERENCES `gameentity` (`id`) ON DELETE CASCADE;

ALTER TABLE `itemtype`
  ADD CONSTRAINT `FK_7FE4F889DB40209F` FOREIGN KEY (`equips_in_slot_id`) REFERENCES `equipslot` (`id`);

ALTER TABLE `item__useactions`
  ADD CONSTRAINT `FK_B9C8F1BA126F525E` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_B9C8F1BA9D32F035` FOREIGN KEY (`action_id`) REFERENCES `action` (`id`) ON DELETE CASCADE;

ALTER TABLE `location`
  ADD CONSTRAINT `FK_A7E8EB9D49AA4A57` FOREIGN KEY (`navigation_matrix_id`) REFERENCES `navigationmatrix` (`id`);

ALTER TABLE `navigationmatrix`
  ADD CONSTRAINT `FK_DCA443DD21C25A05` FOREIGN KEY (`location_north_id`) REFERENCES `location` (`id`),
  ADD CONSTRAINT `FK_DCA443DD4F7DD078` FOREIGN KEY (`location_out_id`) REFERENCES `location` (`id`),
  ADD CONSTRAINT `FK_DCA443DD66A53B16` FOREIGN KEY (`location_in_id`) REFERENCES `location` (`id`),
  ADD CONSTRAINT `FK_DCA443DD73736139` FOREIGN KEY (`location_up_id`) REFERENCES `location` (`id`),
  ADD CONSTRAINT `FK_DCA443DD8DC939D0` FOREIGN KEY (`location_northeast_id`) REFERENCES `location` (`id`),
  ADD CONSTRAINT `FK_DCA443DD9672014A` FOREIGN KEY (`location_southwest_id`) REFERENCES `location` (`id`),
  ADD CONSTRAINT `FK_DCA443DDAA20C291` FOREIGN KEY (`location_east_id`) REFERENCES `location` (`id`),
  ADD CONSTRAINT `FK_DCA443DDC1F00D60` FOREIGN KEY (`location_west_id`) REFERENCES `location` (`id`),
  ADD CONSTRAINT `FK_DCA443DDDB794E47` FOREIGN KEY (`location_south_id`) REFERENCES `location` (`id`),
  ADD CONSTRAINT `FK_DCA443DDE619F621` FOREIGN KEY (`location_northwest_id`) REFERENCES `location` (`id`),
  ADD CONSTRAINT `FK_DCA443DDFC79B96E` FOREIGN KEY (`location_down_id`) REFERENCES `location` (`id`),
  ADD CONSTRAINT `FK_DCA443DDFDA2CEBB` FOREIGN KEY (`location_southeast_id`) REFERENCES `location` (`id`);

ALTER TABLE `nonplayercharacter`
  ADD CONSTRAINT `FK_E95B93DBF396750` FOREIGN KEY (`id`) REFERENCES `gameentity` (`id`) ON DELETE CASCADE;

ALTER TABLE `notification`
  ADD CONSTRAINT `FK_A765AD3299E6F5DF` FOREIGN KEY (`player_id`) REFERENCES `playercharacter` (`id`);

ALTER TABLE `playercharacter`
  ADD CONSTRAINT `FK_B1590889BF396750` FOREIGN KEY (`id`) REFERENCES `gameentity` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_BB6DB4B4A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
