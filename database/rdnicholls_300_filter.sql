-- Adminer 4.8.4 MySQL 8.0.39-0ubuntu0.22.04.1 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `messages`;
CREATE TABLE `messages` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `text` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `target` int NOT NULL,
  `sender` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `target` (`target`),
  KEY `sender` (`sender`),
  CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`target`) REFERENCES `users` (`id`),
  CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`sender`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `messages` (`id`, `title`, `text`, `target`, `sender`) VALUES
(21,	'Hey! Monopoly?',	'Wondering if you wanted to play Monopoly; seems like we have a schedule overlap when we can.',	11,	9);

DROP TABLE IF EXISTS `times`;
CREATE TABLE `times` (
  `id` int NOT NULL AUTO_INCREMENT,
  `userid` int NOT NULL,
  `day` varchar(9) COLLATE utf8mb4_general_ci NOT NULL,
  `start_time` int NOT NULL,
  `end_time` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`),
  CONSTRAINT `times_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `times` (`id`, `userid`, `day`, `start_time`, `end_time`) VALUES
(30,	9,	'Monday',	12,	24),
(31,	9,	'Tuesday',	12,	24),
(32,	9,	'Wednesday',	12,	24),
(33,	9,	'Thursday',	12,	24),
(34,	9,	'Friday',	12,	24),
(35,	10,	'Monday',	5,	16),
(36,	10,	'Thursday',	17,	19),
(37,	11,	'Wednesday',	14,	18),
(38,	11,	'Saturday',	1,	7),
(39,	11,	'Sunday',	5,	6),
(40,	12,	'Thursday',	1,	24),
(41,	13,	'Monday',	5,	17),
(42,	13,	'Sunday',	5,	8),
(43,	14,	'Monday',	5,	18),
(44,	14,	'Thursday',	4,	9),
(45,	14,	'Sunday',	2,	12),
(46,	15,	'Monday',	1,	24),
(47,	16,	'Wednesday',	5,	12),
(48,	17,	'Monday',	1,	24),
(49,	9,	'Saturday',	1,	12),
(51,	18,	'Monday',	12,	16),
(52,	18,	'Tuesday',	4,	12);

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `hash` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `type` int NOT NULL,
  `continent` int NOT NULL,
  `preferences` varchar(40) COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `users` (`id`, `username`, `hash`, `type`, `continent`, `preferences`, `description`) VALUES
(9,	'reptileman1234',	'$2y$10$BJOT7wAXkPIllE4ZSPsPB.sjdEgOokR.agysKx6x6T6ojFI1yirxK',	1,	1,	'Monopoly',	'Really looking forward to playing monopoly with some people! Hoping to have lots of fun.'),
(10,	'Oceanator',	'$2y$10$kkcSOBG5MtpS5EVH4TaWv.pw6ZFdTKFE1u4pg3dprVsI3on9QNUx2',	1,	4,	'Monopoly',	'i really like fish, im taking aquaculture and hoping to play my favourite game monopoly'),
(11,	'MrThornberry',	'$2y$10$LfKfj4tofWi0BR41Ds.qo.xvAe54sWz..B0blmZbQN7ES5I8MoX1O',	1,	1,	'monopoly',	'I like tending to my garden in my spare time, but I can put up a mean game of monopoly when I feel like it. Watch out for me when I land on go!'),
(12,	'john',	'$2y$10$PGskxZbCtrk2DhE3IwqA7et1g5rjcOd.nyAP2MmfLj.RMJztOTC4y',	1,	4,	'monopoly',	'good jolly, i do love me some monopoly.'),
(13,	'BigJoe',	'$2y$10$4Fko9LV.QCjKgvJp1Rvdmugfindf6Zfaq0a6c5GkVH5VbYQLIlX8e',	2,	1,	'monopoly',	'only play with big joe if you aren\'t a BABY who\'s going to LOSE. I mean business. pain and hurt are tattoo\'ed on my knuckles. watch out pal'),
(14,	'LilJoe',	'$2y$10$Hcrc7TS3FH7AzCmpcOuOjOOEMwWVo/mX5vjO1Qy4nXC7f59JI1w9m',	2,	1,	'monopoly',	'here to defeat big joe. thank me later.'),
(15,	'randomamerican',	'$2y$10$XCqXreap.7gNvXM3Fd2LU.MQQ83nQCVTS6Z3f79W5HjNFsW6NxblS',	1,	5,	'Risk',	'im a random american man, looking to play with someone. I love risk. but i need someone to play it with.'),
(16,	'riskplayerOCE',	'$2y$10$FoYBzTqH7zMcCrVoAHK2xeeq26NiOmqjjop8Ye3aCZhnSUl5AGVaK',	1,	1,	'risk',	'im not that american guy on an alt, i promise!'),
(17,	'RiskPlayerNZ',	'$2y$10$9XlsOQAgQdLwWQq8s36.H.Ph4Tj5vT/1BwG3gUXLQCdE1UP872msa',	1,	1,	'monopoly',	'waawaw'),
(18,	'BillyJoe',	'$2y$10$Do2DjO19qnHF9dVcqXLTLeb0QNR8B5s/wglVH3GmVVZE9hOyRqo56',	1,	1,	'Monopoly',	'looking to have lots of fun playing monopoly!'),
(19,	'totallywaffles',	'$2y$10$nYhuZC1gRGbyxTPGPrh/TeA8Gp73pci34yU8oWr5RlxBtjl47PHS6',	2,	6,	'Scythe',	'looking to play some scythe, its pretty cool looking but i have no irl\'s to play it with');

-- 2024-09-02 23:23:01
