-- Adminer 4.3.0 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `admins`;
CREATE TABLE `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `admins` (`id`, `login`, `password`) VALUES
(1,	'admin',	'admin'),
(2,	'user',	'12345678');

DROP TABLE IF EXISTS `questions`;
CREATE TABLE `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `topic_id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `e_mail` varchar(255) NOT NULL,
  `description_question` varchar(255) NOT NULL,
  `description_answer` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `date_question` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `questions` (`id`, `topic_id`, `author`, `e_mail`, `description_question`, `description_answer`, `status`, `date_question`) VALUES
(1,	1,	'Excepteur',	'Excepteur@mail.com',	'Vivamus rhoncus sapien in quam consequat eleifend?',	'Praesent porta purus ut velit mattis, a tempus turpis pulvinar. Maecenas lacinia finibus imperdiet.',	2,	'2017-04-24 04:23:49'),
(2,	2,	'Vestibulum',	'Vestibulum@mail.com',	'Integer tempus risus nec luctus pulvinar?',	'Ut at viverra justo.',	2,	'2017-04-24 04:25:15'),
(3,	3,	'Rhoncus',	'Rhoncus@mail.com',	'Duis venenatis metus sit amet dapibus dictum?',	'Ut odio lacus, volutpat gravida purus nec, pulvinar ornare odio.',	2,	'2017-04-24 04:26:33'),
(4,	1,	'Maecenas',	'Maecenas@mail.com',	'Nunc porta eros eget quam dictum commodo?',	'Curabitur aliquam, dui vel suscipit cursus, lacus nibh congue tellus, vel tincidunt mauris nunc vitae nisl.',	1,	'2017-04-24 04:28:01'),
(5,	2,	'Lorem',	'Lorem@mail.com',	'Mauris non augue vulputate, consectetur lectus vel, accumsan elit?',	'Sed id vestibulum elit, congue blandit ex?',	1,	'2017-04-24 04:29:26'),
(7,	2,	'Aliquam',	'Aliquam@mail.com',	'Curabitur aliquam, dui vel suscipit cursus, lacus nibh congue tellus, vel tincidunt mauris nunc vitae nisl. Ut iaculis enim et dui dapibus vestibulum?',	'Curabitur gravida purus lectus, sed ullamcorper magna laoreet eget.',	1,	'2017-04-24 04:31:08'),
(8,	1,	'Morbi',	'Pellentesque@mail.com',	'Aenean eleifend iaculis blandit. Sed nec commodo nunc. Curabitur sed augue in lacus aliquet luctus sit amet vitae orci. Morbi eu tellus egestas augue maximus consequat?',	'Ut porttitor, nisl eu consectetur tristique, velit tellus tincidunt nulla, a ullamcorper tortor arcu non mi. Nulla elit felis, luctus id leo vitae, ornare posuere leo. Nullam at molestie erat.',	2,	'2017-04-24 04:34:13'),
(9,	3,	'Nulla facilisi',	'Nullafacilisi@mail.com',	'Fusce dap rhoncus dui ac dapibus iaculis?',	'',	0,	'2017-04-24 04:41:22');

DROP TABLE IF EXISTS `topics`;
CREATE TABLE `topics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `topics` (`id`, `name`) VALUES
(1,	'Consectetur adipiscing'),
(2,	'Lorem ipsum'),
(3,	'Duis aute');

-- 2017-05-05 11:35:52
