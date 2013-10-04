CREATE TABLE IF NOT EXISTS `Game` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `welcome_message` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `version_numeric` int(11) NOT NULL,
  `version_display` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `initial_location_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_83199EB21AD73273` (`initial_location_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

INSERT INTO `Game` (`id`, `name`, `welcome_message`, `version_numeric`, `version_display`, `initial_location_id`) VALUES
(1, 'Demo Game', 'Welcome to the game. This is just a demo game. have fun!', 0, 'v0.1', 1);

CREATE TABLE IF NOT EXISTS `GameEntity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `location_text` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `location_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_FED2D79D64D218E` (`location_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

INSERT INTO `GameEntity` (`id`, `name`, `location_text`, `description`, `location_id`) VALUES
(1, 'lamp', 'A small, shaded, drawstring lamp sits on a pedestal in the center of the room.', 'Looks like the kind you''d find at any department store.', 1);


CREATE TABLE IF NOT EXISTS `Location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `navigation_matrix_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_A7E8EB9D49AA4A57` (`navigation_matrix_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

INSERT INTO `Location` (`id`, `name`, `description`, `navigation_matrix_id`) VALUES
(1, 'Mysterious Room', 'You are in a mysterious, dark room. You can see light under a doorcrack to the south.', 1),
(2, 'Mansion Foyer', 'The foyer of an old southern mansion. The shutters outside have begun to fall off, and a thick layer of dust has settled over everything. There is a door into a room to the north and an exit onto a patio to the south.', 2),
(3, 'Screened-In Patio', 'A screened-in patio of an old southern mansion. A door to the north leads back inside. Cicadas buzz in the distance.', 3);

CREATE TABLE IF NOT EXISTS `NavigationMatrix` (
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

INSERT INTO `NavigationMatrix` (`id`, `location_north_id`, `location_northeast_id`, `location_northwest_id`, `location_east_id`, `location_west_id`, `location_south_id`, `location_southeast_id`, `location_southwest_id`, `location_in_id`, `location_out_id`, `location_up_id`, `location_down_id`, `invalid_direction_message`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, 'You fumble around in the darkness but cannot find an exit that way.'),
(2, 1, NULL, NULL, NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, 'There isn''t a door that way!'),
(3, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'You can''t go out that way!');

ALTER TABLE `Game`
  ADD CONSTRAINT `FK_83199EB21AD73273` FOREIGN KEY (`initial_location_id`) REFERENCES `Location` (`id`);

ALTER TABLE `GameEntity`
  ADD CONSTRAINT `FK_FED2D79D64D218E` FOREIGN KEY (`location_id`) REFERENCES `Game` (`id`);

ALTER TABLE `Location`
  ADD CONSTRAINT `FK_A7E8EB9D49AA4A57` FOREIGN KEY (`navigation_matrix_id`) REFERENCES `NavigationMatrix` (`id`);

ALTER TABLE `NavigationMatrix`
  ADD CONSTRAINT `FK_DCA443DDFC79B96E` FOREIGN KEY (`location_down_id`) REFERENCES `Location` (`id`),
  ADD CONSTRAINT `FK_DCA443DD21C25A05` FOREIGN KEY (`location_north_id`) REFERENCES `Location` (`id`),
  ADD CONSTRAINT `FK_DCA443DD4F7DD078` FOREIGN KEY (`location_out_id`) REFERENCES `Location` (`id`),
  ADD CONSTRAINT `FK_DCA443DD66A53B16` FOREIGN KEY (`location_in_id`) REFERENCES `Location` (`id`),
  ADD CONSTRAINT `FK_DCA443DD73736139` FOREIGN KEY (`location_up_id`) REFERENCES `Location` (`id`),
  ADD CONSTRAINT `FK_DCA443DD8DC939D0` FOREIGN KEY (`location_northeast_id`) REFERENCES `Location` (`id`),
  ADD CONSTRAINT `FK_DCA443DD9672014A` FOREIGN KEY (`location_southwest_id`) REFERENCES `Location` (`id`),
  ADD CONSTRAINT `FK_DCA443DDAA20C291` FOREIGN KEY (`location_east_id`) REFERENCES `Location` (`id`),
  ADD CONSTRAINT `FK_DCA443DDC1F00D60` FOREIGN KEY (`location_west_id`) REFERENCES `Location` (`id`),
  ADD CONSTRAINT `FK_DCA443DDDB794E47` FOREIGN KEY (`location_south_id`) REFERENCES `Location` (`id`),
  ADD CONSTRAINT `FK_DCA443DDE619F621` FOREIGN KEY (`location_northwest_id`) REFERENCES `Location` (`id`),
  ADD CONSTRAINT `FK_DCA443DDFDA2CEBB` FOREIGN KEY (`location_southeast_id`) REFERENCES `Location` (`id`);
