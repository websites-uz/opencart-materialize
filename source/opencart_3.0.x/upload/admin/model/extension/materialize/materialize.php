<?php
class ModelExtensionMaterializeMaterialize extends Model {
	public function install($data) {
		$this->db->query("
			CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "materialize_color_schemes` (
				`scheme_id` INT(11) NOT NULL AUTO_INCREMENT,
				`title` VARCHAR(64) NOT NULL,
				`name` VARCHAR(64) NOT NULL,
				`value` TEXT NOT NULL,
				`hex` VARCHAR(7) NOT NULL,
				`custom_scheme` TINYINT(1) NOT NULL,
				PRIMARY KEY (`scheme_id`)
			) ENGINE=MyISAM CHARSET=utf8 COLLATE=utf8_general_ci;
		");

		foreach ($data['color_schemes'] as $name => $value) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "materialize_color_schemes SET `title` = '" . $this->db->escape($value['title']) . "', `name` = '" . $this->db->escape($value['name']) . "', `value` = '" . $this->db->escape(json_encode($value['value'], true)) . "', `hex` = '" . $this->db->escape($value['hex']) . "', `custom_scheme` = '0'");
		}

		$this->db->query("
			CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "materialize_colors` (
				`color_id` INT(11) NOT NULL AUTO_INCREMENT,
				`name` VARCHAR(25) NOT NULL,
				`hex` VARCHAR(11) NOT NULL,
				PRIMARY KEY (`color_id`),
				INDEX (`name`)
			) ENGINE=MyISAM CHARSET=utf8 COLLATE=utf8_general_ci;
		");

		$this->db->query("
			INSERT INTO `" . DB_PREFIX . "materialize_colors` (`color_id`, `name`, `hex`) VALUES
			(1, 'red lighten-5', 'ffebee'),
			(2, 'red lighten-4', 'ffcdd2'),
			(3, 'red lighten-3', 'ef9a9a'),
			(4, 'red lighten-2', 'e57373'),
			(5, 'red lighten-1', 'ef5350'),
			(6, 'red', 'f44336'),
			(7, 'red darken-1', 'e53935'),
			(8, 'red darken-2', 'd32f2f'),
			(9, 'red darken-3', 'c62828'),
			(10, 'red darken-4', 'b71c1c'),
			(11, 'red accent-1', 'ff8a80'),
			(12, 'red accent-2', 'ff5252'),
			(13, 'red accent-3', 'ff1744'),
			(14, 'red accent-4', 'd50000'),
			(15, 'pink lighten-5', 'fce4ec'),
			(16, 'pink lighten-4', 'f8bbd0'),
			(17, 'pink lighten-3', 'f48fb1'),
			(18, 'pink lighten-2', 'f06292'),
			(19, 'pink lighten-1', 'ec407a'),
			(20, 'pink', 'e91e63'),
			(21, 'pink darken-1', 'd81b60'),
			(22, 'pink darken-2', 'c2185b'),
			(23, 'pink darken-3', 'ad1457'),
			(24, 'pink darken-4', '880e4f'),
			(25, 'pink accent-1', 'ff80ab'),
			(26, 'pink accent-2', 'ff4081'),
			(27, 'pink accent-3', 'f50057'),
			(28, 'pink accent-4', 'c51162'),
			(29, 'purple lighten-5', 'f3e5f5'),
			(30, 'purple lighten-4', 'e1bee7'),
			(31, 'purple lighten-3', 'ce93d8'),
			(32, 'purple lighten-2', 'ba68c8'),
			(33, 'purple lighten-1', 'ab47bc'),
			(34, 'purple', '9c27b0'),
			(35, 'purple darken-1', '8e24aa'),
			(36, 'purple darken-2', '7b1fa2'),
			(37, 'purple darken-3', '6a1b9a'),
			(38, 'purple darken-4', '4a148c'),
			(39, 'purple accent-1', 'ea80fc'),
			(40, 'purple accent-2', 'e040fb'),
			(41, 'purple accent-3', 'd500f9'),
			(42, 'purple accent-4', 'aa00ff'),
			(43, 'deep-purple lighten-5', 'ede7f6'),
			(44, 'deep-purple lighten-4', 'd1c4e9'),
			(45, 'deep-purple lighten-3', 'b39ddb'),
			(46, 'deep-purple lighten-2', '9575cd'),
			(47, 'deep-purple lighten-1', '7e57c2'),
			(48, 'deep-purple', '673ab7'),
			(49, 'deep-purple darken-1', '5e35b1'),
			(50, 'deep-purple darken-2', '512da8'),
			(51, 'deep-purple darken-3', '4527a0'),
			(52, 'deep-purple darken-4', '311b92'),
			(53, 'deep-purple accent-1', 'b388ff'),
			(54, 'deep-purple accent-2', '7c4dff'),
			(55, 'deep-purple accent-3', '651fff'),
			(56, 'deep-purple accent-4', '6200ea'),
			(57, 'indigo lighten-5', 'e8eaf6'),
			(58, 'indigo lighten-4', 'c5cae9'),
			(59, 'indigo lighten-3', '9fa8da'),
			(60, 'indigo lighten-2', '7986cb'),
			(61, 'indigo lighten-1', '5c6bc0'),
			(62, 'indigo', '3f51b5'),
			(63, 'indigo darken-1', '3949ab'),
			(64, 'indigo darken-2', '303f9f'),
			(65, 'indigo darken-3', '283593'),
			(66, 'indigo darken-4', '1a237e'),
			(67, 'indigo accent-1', '8c9eff'),
			(68, 'indigo accent-2', '536dfe'),
			(69, 'indigo accent-3', '3d5afe'),
			(70, 'indigo accent-4', '304ffe'),
			(71, 'blue lighten-5', 'e3f2fd'),
			(72, 'blue lighten-4', 'bbdefb'),
			(73, 'blue lighten-3', '90caf9'),
			(74, 'blue lighten-2', '64b5f6'),
			(75, 'blue lighten-1', '42a5f5'),
			(76, 'blue', '2196f3'),
			(77, 'blue darken-1', '1e88e5'),
			(78, 'blue darken-2', '1976d2'),
			(79, 'blue darken-3', '1565c0'),
			(80, 'blue darken-4', '0d47a1'),
			(81, 'blue accent-1', '82b1ff'),
			(82, 'blue accent-2', '448aff'),
			(83, 'blue accent-3', '2979ff'),
			(84, 'blue accent-4', '2962ff'),
			(85, 'light-blue lighten-5', 'e1f5fe'),
			(86, 'light-blue lighten-4', 'b3e5fc'),
			(87, 'light-blue lighten-3', '81d4fa'),
			(88, 'light-blue lighten-2', '4fc3f7'),
			(89, 'light-blue lighten-1', '29b6f6'),
			(90, 'light-blue', '03a9f4'),
			(91, 'light-blue darken-1', '039be5'),
			(92, 'light-blue darken-2', '0288d1'),
			(93, 'light-blue darken-3', '0277bd'),
			(94, 'light-blue darken-4', '01579b'),
			(95, 'light-blue accent-1', '80d8ff'),
			(96, 'light-blue accent-2', '40c4ff'),
			(97, 'light-blue accent-3', '00b0ff'),
			(98, 'light-blue accent-4', '0091ea'),
			(99, 'cyan lighten-5', 'e0f7fa'),
			(100, 'cyan lighten-4', 'b2ebf2'),
			(101, 'cyan lighten-3', '80deea'),
			(102, 'cyan lighten-2', '4dd0e1'),
			(103, 'cyan lighten-1', '26c6da'),
			(104, 'cyan', '00bcd4'),
			(105, 'cyan darken-1', '00acc1'),
			(106, 'cyan darken-2', '0097a7'),
			(107, 'cyan darken-3', '00838f'),
			(108, 'cyan darken-4', '006064'),
			(109, 'cyan accent-1', '84ffff'),
			(110, 'cyan accent-2', '18ffff'),
			(111, 'cyan accent-3', '00e5ff'),
			(112, 'cyan accent-4', '00b8d4'),
			(113, 'teal lighten-5', 'e0f2f1'),
			(114, 'teal lighten-4', 'b2dfdb'),
			(115, 'teal lighten-3', '80cbc4'),
			(116, 'teal lighten-2', '4db6ac'),
			(117, 'teal lighten-1', '26a69a'),
			(118, 'teal', '009688'),
			(119, 'teal darken-1', '00897b'),
			(120, 'teal darken-2', '00796b'),
			(121, 'teal darken-3', '00695c'),
			(122, 'teal darken-4', '004d40'),
			(123, 'teal accent-1', 'a7ffeb'),
			(124, 'teal accent-2', '64ffda'),
			(125, 'teal accent-3', '1de9b6'),
			(126, 'teal accent-4', '00bfa5'),
			(127, 'green lighten-5', 'e8f5e9'),
			(128, 'green lighten-4', 'c8e6c9'),
			(129, 'green lighten-3', 'a5d6a7'),
			(130, 'green lighten-2', '81c784'),
			(131, 'green lighten-1', '66bb6a'),
			(132, 'green', '4caf50'),
			(133, 'green darken-1', '43a047'),
			(134, 'green darken-2', '388e3c'),
			(135, 'green darken-3', '2e7d32'),
			(136, 'green darken-4', '1b5e20'),
			(137, 'green accent-1', 'b9f6ca'),
			(138, 'green accent-2', '69f0ae'),
			(139, 'green accent-3', '00e676'),
			(140, 'green accent-4', '00c853'),
			(141, 'light-green lighten-5', 'f1f8e9'),
			(142, 'light-green lighten-4', 'dcedc8'),
			(143, 'light-green lighten-3', 'c5e1a5'),
			(144, 'light-green lighten-2', 'aed581'),
			(145, 'light-green lighten-1', '9ccc65'),
			(146, 'light-green', '8bc34a'),
			(147, 'light-green darken-1', '7cb342'),
			(148, 'light-green darken-2', '689f38'),
			(149, 'light-green darken-3', '558b2f'),
			(150, 'light-green darken-4', '33691e'),
			(151, 'light-green accent-1', 'ccff90'),
			(152, 'light-green accent-2', 'b2ff59'),
			(153, 'light-green accent-3', '76ff03'),
			(154, 'light-green accent-4', '64dd17'),
			(155, 'lime lighten-5', 'f9fbe7'),
			(156, 'lime lighten-4', 'f0f4c3'),
			(157, 'lime lighten-3', 'e6ee9c'),
			(158, 'lime lighten-2', 'dce775'),
			(159, 'lime lighten-1', 'd4e157'),
			(160, 'lime', 'cddc39'),
			(161, 'lime darken-1', 'c0ca33'),
			(162, 'lime darken-2', 'afb42b'),
			(163, 'lime darken-3', '9e9d24'),
			(164, 'lime darken-4', '827717'),
			(165, 'lime accent-1', 'f4ff81'),
			(166, 'lime accent-2', 'eeff41'),
			(167, 'lime accent-3', 'c6ff00'),
			(168, 'lime accent-4', 'aeea00'),
			(169, 'yellow lighten-5', 'fffde7'),
			(170, 'yellow lighten-4', 'fff9c4'),
			(171, 'yellow lighten-3', 'fff59d'),
			(172, 'yellow lighten-2', 'fff176'),
			(173, 'yellow lighten-1', 'ffee58'),
			(174, 'yellow', 'ffeb3b'),
			(175, 'yellow darken-1', 'fdd835'),
			(176, 'yellow darken-2', 'fbc02d'),
			(177, 'yellow darken-3', 'f9a825'),
			(178, 'yellow darken-4', 'f57f17'),
			(179, 'yellow accent-1', 'ffff8d'),
			(180, 'yellow accent-2', 'ffff00'),
			(181, 'yellow accent-3', 'ffea00'),
			(182, 'yellow accent-4', 'ffd600'),
			(183, 'amber lighten-5', 'fff8e1'),
			(184, 'amber lighten-4', 'ffecb3'),
			(185, 'amber lighten-3', 'ffe082'),
			(186, 'amber lighten-2', 'ffd54f'),
			(187, 'amber lighten-1', 'ffca28'),
			(188, 'amber', 'ffc107'),
			(189, 'amber darken-1', 'ffb300'),
			(190, 'amber darken-2', 'ffa000'),
			(191, 'amber darken-3', 'ff8f00'),
			(192, 'amber darken-4', 'ff6f00'),
			(193, 'amber accent-1', 'ffe57f'),
			(194, 'amber accent-2', 'ffd740'),
			(195, 'amber accent-3', 'ffc400'),
			(196, 'amber accent-4', 'ffab00'),
			(197, 'orange lighten-5', 'fff3e0'),
			(198, 'orange lighten-4', 'ffe0b2'),
			(199, 'orange lighten-3', 'ffcc80'),
			(200, 'orange lighten-2', 'ffb74d'),
			(201, 'orange lighten-1', 'ffa726'),
			(202, 'orange', 'ff9800'),
			(203, 'orange darken-1', 'fb8c00'),
			(204, 'orange darken-2', 'f57c00'),
			(205, 'orange darken-3', 'ef6c00'),
			(206, 'orange darken-4', 'e65100'),
			(207, 'orange accent-1', 'ffd180'),
			(208, 'orange accent-2', 'ffab40'),
			(209, 'orange accent-3', 'ff9100'),
			(210, 'orange accent-4', 'ff6d00'),
			(211, 'deep-orange lighten-5', 'fbe9e7'),
			(212, 'deep-orange lighten-4', 'ffccbc'),
			(213, 'deep-orange lighten-3', 'ffab91'),
			(214, 'deep-orange lighten-2', 'ff8a65'),
			(215, 'deep-orange lighten-1', 'ff7043'),
			(216, 'deep-orange', 'ff5722'),
			(217, 'deep-orange darken-1', 'f4511e'),
			(218, 'deep-orange darken-2', 'e64a19'),
			(219, 'deep-orange darken-3', 'd84315'),
			(220, 'deep-orange darken-4', 'bf360c'),
			(221, 'deep-orange accent-1', 'ff9e80'),
			(222, 'deep-orange accent-2', 'ff6e40'),
			(223, 'deep-orange accent-3', 'ff3d00'),
			(224, 'deep-orange accent-4', 'dd2c00'),
			(225, 'brown lighten-5', 'efebe9'),
			(226, 'brown lighten-4', 'd7ccc8'),
			(227, 'brown lighten-3', 'bcaaa4'),
			(228, 'brown lighten-2', 'a1887f'),
			(229, 'brown lighten-1', '8d6e63'),
			(230, 'brown', '795548'),
			(231, 'brown darken-1', '6d4c41'),
			(232, 'brown darken-2', '5d4037'),
			(233, 'brown darken-3', '4e342e'),
			(234, 'brown darken-4', '3e2723'),
			(235, 'grey lighten-5', 'fafafa'),
			(236, 'grey lighten-4', 'f5f5f5'),
			(237, 'grey lighten-3', 'eeeeee'),
			(238, 'grey lighten-2', 'e0e0e0'),
			(239, 'grey lighten-1', 'bdbdbd'),
			(240, 'grey', '9e9e9e'),
			(241, 'grey darken-1', '757575'),
			(242, 'grey darken-2', '616161'),
			(243, 'grey darken-3', '424242'),
			(244, 'grey darken-4', '212121'),
			(245, 'blue-grey lighten-5', 'eceff1'),
			(246, 'blue-grey lighten-4', 'cfd8dc'),
			(247, 'blue-grey lighten-3', 'b0bec5'),
			(248, 'blue-grey lighten-2', '90a4ae'),
			(249, 'blue-grey lighten-1', '78909c'),
			(250, 'blue-grey', '607d8b'),
			(251, 'blue-grey darken-1', '546e7a'),
			(252, 'blue-grey darken-2', '455a64'),
			(253, 'blue-grey darken-3', '37474f'),
			(254, 'blue-grey darken-4', '263238'),
			(255, 'black', '000000'),
			(256, 'white', 'ffffff'),
			(257, 'transparent', 'transparent');
		");

		$this->db->query("
			CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "materialize_colors_text` (
				`color_id` INT(11) NOT NULL AUTO_INCREMENT,
				`name` VARCHAR(35) NOT NULL,
				`hex` VARCHAR(6) NOT NULL,
				PRIMARY KEY (`color_id`),
				INDEX (`name`)
			) ENGINE=MyISAM CHARSET=utf8 COLLATE=utf8_general_ci;
		");

		$this->db->query("
			INSERT INTO `" . DB_PREFIX . "materialize_colors_text` (`color_id`, `name`, `hex`) VALUES
			(1, 'red-text text-lighten-5', 'ffebee'),
			(2, 'red-text text-lighten-4', 'ffcdd2'),
			(3, 'red-text text-lighten-3', 'ef9a9a'),
			(4, 'red-text text-lighten-2', 'e57373'),
			(5, 'red-text text-lighten-1', 'ef5350'),
			(6, 'red-text', 'f44336'),
			(7, 'red-text text-darken-1', 'e53935'),
			(8, 'red-text text-darken-2', 'd32f2f'),
			(9, 'red-text text-darken-3', 'c62828'),
			(10, 'red-text text-darken-4', 'b71c1c'),
			(11, 'red-text text-accent-1', 'ff8a80'),
			(12, 'red-text text-accent-2', 'ff5252'),
			(13, 'red-text text-accent-3', 'ff1744'),
			(14, 'red-text text-accent-4', 'd50000'),
			(15, 'pink-text text-lighten-5', 'fce4ec'),
			(16, 'pink-text text-lighten-4', 'f8bbd0'),
			(17, 'pink-text text-lighten-3', 'f48fb1'),
			(18, 'pink-text text-lighten-2', 'f06292'),
			(19, 'pink-text text-lighten-1', 'ec407a'),
			(20, 'pink-text', 'e91e63'),
			(21, 'pink-text text-darken-1', 'd81b60'),
			(22, 'pink-text text-darken-2', 'c2185b'),
			(23, 'pink-text text-darken-3', 'ad1457'),
			(24, 'pink-text text-darken-4', '880e4f'),
			(25, 'pink-text text-accent-1', 'ff80ab'),
			(26, 'pink-text text-accent-2', 'ff4081'),
			(27, 'pink-text text-accent-3', 'f50057'),
			(28, 'pink-text text-accent-4', 'c51162'),
			(29, 'purple-text text-lighten-5', 'f3e5f5'),
			(30, 'purple-text text-lighten-4', 'e1bee7'),
			(31, 'purple-text text-lighten-3', 'ce93d8'),
			(32, 'purple-text text-lighten-2', 'ba68c8'),
			(33, 'purple-text text-lighten-1', 'ab47bc'),
			(34, 'purple-text', '9c27b0'),
			(35, 'purple-text text-darken-1', '8e24aa'),
			(36, 'purple-text text-darken-2', '7b1fa2'),
			(37, 'purple-text text-darken-3', '6a1b9a'),
			(38, 'purple-text text-darken-4', '4a148c'),
			(39, 'purple-text text-accent-1', 'ea80fc'),
			(40, 'purple-text text-accent-2', 'e040fb'),
			(41, 'purple-text text-accent-3', 'd500f9'),
			(42, 'purple-text text-accent-4', 'aa00ff'),
			(43, 'deep-purple-text text-lighten-5', 'ede7f6'),
			(44, 'deep-purple-text text-lighten-4', 'd1c4e9'),
			(45, 'deep-purple-text text-lighten-3', 'b39ddb'),
			(46, 'deep-purple-text text-lighten-2', '9575cd'),
			(47, 'deep-purple-text text-lighten-1', '7e57c2'),
			(48, 'deep-purple-text', '673ab7'),
			(49, 'deep-purple-text text-darken-1', '5e35b1'),
			(50, 'deep-purple-text text-darken-2', '512da8'),
			(51, 'deep-purple-text text-darken-3', '4527a0'),
			(52, 'deep-purple-text text-darken-4', '311b92'),
			(53, 'deep-purple-text text-accent-1', 'b388ff'),
			(54, 'deep-purple-text text-accent-2', '7c4dff'),
			(55, 'deep-purple-text text-accent-3', '651fff'),
			(56, 'deep-purple-text text-accent-4', '6200ea'),
			(57, 'indigo-text text-lighten-5', 'e8eaf6'),
			(58, 'indigo-text text-lighten-4', 'c5cae9'),
			(59, 'indigo-text text-lighten-3', '9fa8da'),
			(60, 'indigo-text text-lighten-2', '7986cb'),
			(61, 'indigo-text text-lighten-1', '5c6bc0'),
			(62, 'indigo-text', '3f51b5'),
			(63, 'indigo-text text-darken-1', '3949ab'),
			(64, 'indigo-text text-darken-2', '303f9f'),
			(65, 'indigo-text text-darken-3', '283593'),
			(66, 'indigo-text text-darken-4', '1a237e'),
			(67, 'indigo-text text-accent-1', '8c9eff'),
			(68, 'indigo-text text-accent-2', '536dfe'),
			(69, 'indigo-text text-accent-3', '3d5afe'),
			(70, 'indigo-text text-accent-4', '304ffe'),
			(71, 'blue-text text-lighten-5', 'e3f2fd'),
			(72, 'blue-text text-lighten-4', 'bbdefb'),
			(73, 'blue-text text-lighten-3', '90caf9'),
			(74, 'blue-text text-lighten-2', '64b5f6'),
			(75, 'blue-text text-lighten-1', '42a5f5'),
			(76, 'blue-text', '2196f3'),
			(77, 'blue-text text-darken-1', '1e88e5'),
			(78, 'blue-text text-darken-2', '1976d2'),
			(79, 'blue-text text-darken-3', '1565c0'),
			(80, 'blue-text text-darken-4', '0d47a1'),
			(81, 'blue-text text-accent-1', '82b1ff'),
			(82, 'blue-text text-accent-2', '448aff'),
			(83, 'blue-text text-accent-3', '2979ff'),
			(84, 'blue-text text-accent-4', '2962ff'),
			(85, 'light-blue-text text-lighten-5', 'e1f5fe'),
			(86, 'light-blue-text text-lighten-4', 'b3e5fc'),
			(87, 'light-blue-text text-lighten-3', '81d4fa'),
			(88, 'light-blue-text text-lighten-2', '4fc3f7'),
			(89, 'light-blue-text text-lighten-1', '29b6f6'),
			(90, 'light-blue-text', '03a9f4'),
			(91, 'light-blue-text text-darken-1', '039be5'),
			(92, 'light-blue-text text-darken-2', '0288d1'),
			(93, 'light-blue-text text-darken-3', '0277bd'),
			(94, 'light-blue-text text-darken-4', '01579b'),
			(95, 'light-blue-text text-accent-1', '80d8ff'),
			(96, 'light-blue-text text-accent-2', '40c4ff'),
			(97, 'light-blue-text text-accent-3', '00b0ff'),
			(98, 'light-blue-text text-accent-4', '0091ea'),
			(99, 'cyan-text text-lighten-5', 'e0f7fa'),
			(100, 'cyan-text text-lighten-4', 'b2ebf2'),
			(101, 'cyan-text text-lighten-3', '80deea'),
			(102, 'cyan-text text-lighten-2', '4dd0e1'),
			(103, 'cyan-text text-lighten-1', '26c6da'),
			(104, 'cyan-text', '00bcd4'),
			(105, 'cyan-text text-darken-1', '00acc1'),
			(106, 'cyan-text text-darken-2', '0097a7'),
			(107, 'cyan-text text-darken-3', '00838f'),
			(108, 'cyan-text text-darken-4', '006064'),
			(109, 'cyan-text text-accent-1', '84ffff'),
			(110, 'cyan-text text-accent-2', '18ffff'),
			(111, 'cyan-text text-accent-3', '00e5ff'),
			(112, 'cyan-text text-accent-4', '00b8d4'),
			(113, 'teal-text text-lighten-5', 'e0f2f1'),
			(114, 'teal-text text-lighten-4', 'b2dfdb'),
			(115, 'teal-text text-lighten-3', '80cbc4'),
			(116, 'teal-text text-lighten-2', '4db6ac'),
			(117, 'teal-text text-lighten-1', '26a69a'),
			(118, 'teal-text', '009688'),
			(119, 'teal-text text-darken-1', '00897b'),
			(120, 'teal-text text-darken-2', '00796b'),
			(121, 'teal-text text-darken-3', '00695c'),
			(122, 'teal-text text-darken-4', '004d40'),
			(123, 'teal-text text-accent-1', 'a7ffeb'),
			(124, 'teal-text text-accent-2', '64ffda'),
			(125, 'teal-text text-accent-3', '1de9b6'),
			(126, 'teal-text text-accent-4', '00bfa5'),
			(127, 'green-text text-lighten-5', 'e8f5e9'),
			(128, 'green-text text-lighten-4', 'c8e6c9'),
			(129, 'green-text text-lighten-3', 'a5d6a7'),
			(130, 'green-text text-lighten-2', '81c784'),
			(131, 'green-text text-lighten-1', '66bb6a'),
			(132, 'green-text', '4caf50'),
			(133, 'green-text text-darken-1', '43a047'),
			(134, 'green-text text-darken-2', '388e3c'),
			(135, 'green-text text-darken-3', '2e7d32'),
			(136, 'green-text text-darken-4', '1b5e20'),
			(137, 'green-text text-accent-1', 'b9f6ca'),
			(138, 'green-text text-accent-2', '69f0ae'),
			(139, 'green-text text-accent-3', '00e676'),
			(140, 'green-text text-accent-4', '00c853'),
			(141, 'light-green-text text-lighten-5', 'f1f8e9'),
			(142, 'light-green-text text-lighten-4', 'dcedc8'),
			(143, 'light-green-text text-lighten-3', 'c5e1a5'),
			(144, 'light-green-text text-lighten-2', 'aed581'),
			(145, 'light-green-text text-lighten-1', '9ccc65'),
			(146, 'light-green-text', '8bc34a'),
			(147, 'light-green-text text-darken-1', '7cb342'),
			(148, 'light-green-text text-darken-2', '689f38'),
			(149, 'light-green-text text-darken-3', '558b2f'),
			(150, 'light-green-text text-darken-4', '33691e'),
			(151, 'light-green-text text-accent-1', 'ccff90'),
			(152, 'light-green-text text-accent-2', 'b2ff59'),
			(153, 'light-green-text text-accent-3', '76ff03'),
			(154, 'light-green-text text-accent-4', '64dd17'),
			(155, 'lime-text text-lighten-5', 'f9fbe7'),
			(156, 'lime-text text-lighten-4', 'f0f4c3'),
			(157, 'lime-text text-lighten-3', 'e6ee9c'),
			(158, 'lime-text text-lighten-2', 'dce775'),
			(159, 'lime-text text-lighten-1', 'd4e157'),
			(160, 'lime-text', 'cddc39'),
			(161, 'lime-text text-darken-1', 'c0ca33'),
			(162, 'lime-text text-darken-2', 'afb42b'),
			(163, 'lime-text text-darken-3', '9e9d24'),
			(164, 'lime-text text-darken-4', '827717'),
			(165, 'lime-text text-accent-1', 'f4ff81'),
			(166, 'lime-text text-accent-2', 'eeff41'),
			(167, 'lime-text text-accent-3', 'c6ff00'),
			(168, 'lime-text text-accent-4', 'aeea00'),
			(169, 'yellow-text text-lighten-5', 'fffde7'),
			(170, 'yellow-text text-lighten-4', 'fff9c4'),
			(171, 'yellow-text text-lighten-3', 'fff59d'),
			(172, 'yellow-text text-lighten-2', 'fff176'),
			(173, 'yellow-text text-lighten-1', 'ffee58'),
			(174, 'yellow-text', 'ffeb3b'),
			(175, 'yellow-text text-darken-1', 'fdd835'),
			(176, 'yellow-text text-darken-2', 'fbc02d'),
			(177, 'yellow-text text-darken-3', 'f9a825'),
			(178, 'yellow-text text-darken-4', 'f57f17'),
			(179, 'yellow-text text-accent-1', 'ffff8d'),
			(180, 'yellow-text text-accent-2', 'ffff00'),
			(181, 'yellow-text text-accent-3', 'ffea00'),
			(182, 'yellow-text text-accent-4', 'ffd600'),
			(183, 'amber-text text-lighten-5', 'fff8e1'),
			(184, 'amber-text text-lighten-4', 'ffecb3'),
			(185, 'amber-text text-lighten-3', 'ffe082'),
			(186, 'amber-text text-lighten-2', 'ffd54f'),
			(187, 'amber-text text-lighten-1', 'ffca28'),
			(188, 'amber-text', 'ffc107'),
			(189, 'amber-text text-darken-1', 'ffb300'),
			(190, 'amber-text text-darken-2', 'ffa000'),
			(191, 'amber-text text-darken-3', 'ff8f00'),
			(192, 'amber-text text-darken-4', 'ff6f00'),
			(193, 'amber-text text-accent-1', 'ffe57f'),
			(194, 'amber-text text-accent-2', 'ffd740'),
			(195, 'amber-text text-accent-3', 'ffc400'),
			(196, 'amber-text text-accent-4', 'ffab00'),
			(197, 'orange-text text-lighten-5', 'fff3e0'),
			(198, 'orange-text text-lighten-4', 'ffe0b2'),
			(199, 'orange-text text-lighten-3', 'ffcc80'),
			(200, 'orange-text text-lighten-2', 'ffb74d'),
			(201, 'orange-text text-lighten-1', 'ffa726'),
			(202, 'orange-text', 'ff9800'),
			(203, 'orange-text text-darken-1', 'fb8c00'),
			(204, 'orange-text text-darken-2', 'f57c00'),
			(205, 'orange-text text-darken-3', 'ef6c00'),
			(206, 'orange-text text-darken-4', 'e65100'),
			(207, 'orange-text text-accent-1', 'ffd180'),
			(208, 'orange-text text-accent-2', 'ffab40'),
			(209, 'orange-text text-accent-3', 'ff9100'),
			(210, 'orange-text text-accent-4', 'ff6d00'),
			(211, 'deep-orange-text text-lighten-5', 'fbe9e7'),
			(212, 'deep-orange-text text-lighten-4', 'ffccbc'),
			(213, 'deep-orange-text text-lighten-3', 'ffab91'),
			(214, 'deep-orange-text text-lighten-2', 'ff8a65'),
			(215, 'deep-orange-text text-lighten-1', 'ff7043'),
			(216, 'deep-orange-text', 'ff5722'),
			(217, 'deep-orange-text text-darken-1', 'f4511e'),
			(218, 'deep-orange-text text-darken-2', 'e64a19'),
			(219, 'deep-orange-text text-darken-3', 'd84315'),
			(220, 'deep-orange-text text-darken-4', 'bf360c'),
			(221, 'deep-orange-text text-accent-1', 'ff9e80'),
			(222, 'deep-orange-text text-accent-2', 'ff6e40'),
			(223, 'deep-orange-text text-accent-3', 'ff3d00'),
			(224, 'deep-orange-text text-accent-4', 'dd2c00'),
			(225, 'brown-text text-lighten-5', 'efebe9'),
			(226, 'brown-text text-lighten-4', 'd7ccc8'),
			(227, 'brown-text text-lighten-3', 'bcaaa4'),
			(228, 'brown-text text-lighten-2', 'a1887f'),
			(229, 'brown-text text-lighten-1', '8d6e63'),
			(230, 'brown-text', '795548'),
			(231, 'brown-text text-darken-1', '6d4c41'),
			(232, 'brown-text text-darken-2', '5d4037'),
			(233, 'brown-text text-darken-3', '4e342e'),
			(234, 'brown-text text-darken-4', '3e2723'),
			(235, 'grey-text text-lighten-5', 'fafafa'),
			(236, 'grey-text text-lighten-4', 'f5f5f5'),
			(237, 'grey-text text-lighten-3', 'eeeeee'),
			(238, 'grey-text text-lighten-2', 'e0e0e0'),
			(239, 'grey-text text-lighten-1', 'bdbdbd'),
			(240, 'grey-text', '9e9e9e'),
			(241, 'grey-text text-darken-1', '757575'),
			(242, 'grey-text text-darken-2', '616161'),
			(243, 'grey-text text-darken-3', '424242'),
			(244, 'grey-text text-darken-4', '212121'),
			(245, 'blue-grey-text text-lighten-5', 'eceff1'),
			(246, 'blue-grey-text text-lighten-4', 'cfd8dc'),
			(247, 'blue-grey-text text-lighten-3', 'b0bec5'),
			(248, 'blue-grey-text text-lighten-2', '90a4ae'),
			(249, 'blue-grey-text text-lighten-1', '78909c'),
			(250, 'blue-grey-text', '607d8b'),
			(251, 'blue-grey-text text-darken-1', '546e7a'),
			(252, 'blue-grey-text text-darken-2', '455a64'),
			(253, 'blue-grey-text text-darken-3', '37474f'),
			(254, 'blue-grey-text text-darken-4', '263238'),
			(255, 'black-text', '000000'),
			(256, 'white-text', 'ffffff');
		");

		$this->db->query("
			CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "materialize_social_networks` (
				`icon_id` int(11) NOT NULL AUTO_INCREMENT,
				`language_id` int(11) NOT NULL,
				`title` varchar(128) DEFAULT NULL,
				`link` varchar(255) DEFAULT NULL,
				`icon` varchar(255) DEFAULT NULL,
				`sort_order` int(3) NOT NULL,
				PRIMARY KEY (`icon_id`)
			) ENGINE=MyISAM CHARSET=utf8 COLLATE=utf8_general_ci;
		");

		$this->db->query("ALTER TABLE `" . DB_PREFIX . "information` ADD `top` INT(1) NOT NULL DEFAULT '0'");

		$this->db->query("ALTER TABLE `" . DB_PREFIX . "product` ADD `progressbar` INT(4) NOT NULL");
	}

	public function uninstall() {
		$this->db->query("
			DROP TABLE IF EXISTS
				`" . DB_PREFIX . "materialize_colors`,
				`" . DB_PREFIX . "materialize_colors_text`,
				`" . DB_PREFIX . "materialize_social_networks`,
				`" . DB_PREFIX . "materialize_color_schemes`
			;
		");

		$query = $this->db->query("SELECT * FROM information_schema.COLUMNS WHERE TABLE_SCHEMA = DATABASE() AND COLUMN_NAME = 'top' AND TABLE_NAME = '" . DB_PREFIX . "information'");

		if (count($query->rows) > 0) {
			$this->db->query("ALTER TABLE `" . DB_PREFIX . "information` DROP `top`;");
		}

		if (count($query->rows) > 0) {
			$this->db->query("ALTER TABLE `" . DB_PREFIX . "product` DROP `progressbar`;");
		}
	}

	public function addMaterializeColorScheme($data) {
		foreach ($data['color_schemes'] as $color_scheme) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "materialize_color_schemes SET `title` = '" . $this->db->escape($color_scheme['title']) . "', `name` = '" . $this->db->escape($color_scheme['name']) . "', `value` = '" . $this->db->escape(json_encode($color_scheme['value'], true)) . "', `hex` = '" . $this->db->escape($color_scheme['hex']) . "', `custom_scheme` = '1'");
		}
	}

	public function deleteMaterializeColorSchemeById($scheme_id) {
		$this->db->query("DELETE FROM " . DB_PREFIX . "materialize_color_schemes WHERE `scheme_id` = '" . (int)$scheme_id . "' AND `custom_scheme` = '1'");
	}

	public function deleteMaterializeCustomColorSchemes() {
		$this->db->query("DELETE FROM " . DB_PREFIX . "materialize_color_schemes WHERE `custom_scheme` = '1'");
	}

	public function getMaterializeColorScheme($scheme_id) {
		$query = $this->db->query("SELECT scheme_id, title, name, hex, value FROM " . DB_PREFIX . "materialize_color_schemes WHERE `scheme_id` = '" . (int)$scheme_id . "'");

		if ($query->num_rows) {
			return array(
				'scheme_id'	=> $query->row['scheme_id'],
				'title'		=> $query->row['title'],
				'name'		=> $query->row['name'],
				'hex'		=> $query->row['hex'],
				'value'		=> json_decode($query->row['value'], true)
			);
		} else {
			return false;
		}
	}

	public function getMaterializeColorSchemes() {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "materialize_color_schemes");

		return $query->rows;
	}

	public function getMaterializeCustomColorSchemes() {
		$query = $this->db->query("SELECT scheme_id, title FROM " . DB_PREFIX . "materialize_color_schemes WHERE `custom_scheme` = '1'");

		return $query->rows;
	}

	public function getMaterializeColors() {
		$materialize_colors = $this->cache->get('admin.materialize_colors');

		if (!$materialize_colors) {
			$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "materialize_colors ORDER BY name ASC");

			$materialize_colors = $query->rows;

			$this->cache->set('admin.materialize_colors', $materialize_colors);
		}

		return $materialize_colors;
	}

	public function getMaterializeColorsText() {
		$materialize_colors_text = $this->cache->get('admin.materialize_colors_text');

		if (!$materialize_colors_text) {
			$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "materialize_colors_text ORDER BY name ASC");

			$materialize_colors_text = $query->rows;

			$this->cache->set('admin.materialize_colors_text', $materialize_colors_text);
		}

		return $materialize_colors_text;
	}

	public function editSocialIcon($data) {
		$this->db->query("DELETE FROM " . DB_PREFIX . "materialize_social_networks");

		if (isset($data['theme_materialize_social_icon'])) {
			foreach ($data['theme_materialize_social_icon'] as $language_id => $value) {
				foreach ($value as $theme_materialize_social_icon) {
					$this->db->query("INSERT INTO " . DB_PREFIX . "materialize_social_networks SET language_id = '" . (int)$language_id . "', title = '" .  $this->db->escape($theme_materialize_social_icon['title']) . "', link = '" .  $this->db->escape($theme_materialize_social_icon['link']) . "', icon = '" .  $this->db->escape($theme_materialize_social_icon['icon']) . "', sort_order = '" . (int)$theme_materialize_social_icon['sort_order'] . "'");
				}
			}
		}
	}

	public function getSocialIcons() {
		$social_icon_data = array();

		$social_icon_query = $this->db->query("SELECT * FROM " . DB_PREFIX . "materialize_social_networks ORDER BY sort_order ASC");

		foreach ($social_icon_query->rows as $social_icon) {
			$social_icon_data[$social_icon['language_id']][] = array(
				'title'			=> $social_icon['title'],
				'link'			=> $social_icon['link'],
				'icon'			=> $social_icon['icon'],
				'sort_order'	=> $social_icon['sort_order']
			);
		}

		return $social_icon_data;
	}

	public function update() {
		$check_information_top = $this->db->query("SELECT * FROM information_schema.COLUMNS WHERE TABLE_SCHEMA = DATABASE() AND COLUMN_NAME = 'top' AND TABLE_NAME = '" . DB_PREFIX . "information'");
		$check_product_progressbar = $this->db->query("SELECT * FROM information_schema.COLUMNS WHERE TABLE_SCHEMA = DATABASE() AND COLUMN_NAME = 'progressbar' AND TABLE_NAME = '" . DB_PREFIX . "product'");

		if (count($check_information_top->rows) <= 0) {
			$check_information_top = $this->db->query("ALTER TABLE `" . DB_PREFIX . "information` ADD `top` INT(1) NOT NULL DEFAULT '0'");
		}

		if (count($check_product_progressbar->rows) <= 0) {
			$check_product_progressbar = $this->db->query("ALTER TABLE `" . DB_PREFIX . "product` ADD `progressbar` INT(4) NOT NULL");
		}
	}
}