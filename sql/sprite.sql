-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 12 Dec 2015 la 12:27
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sprite`
--

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `categ_id` int(200) NOT NULL AUTO_INCREMENT,
  `denumire` varchar(500) COLLATE utf8_romanian_ci NOT NULL,
  `categ_urlslug` varchar(500) COLLATE utf8_romanian_ci NOT NULL,
  PRIMARY KEY (`categ_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_romanian_ci AUTO_INCREMENT=16 ;

--
-- Salvarea datelor din tabel `categories`
--

INSERT INTO `categories` (`categ_id`, `denumire`, `categ_urlslug`) VALUES
(7, 'Arta si Cultura ', 'arta-si-cultura'),
(8, 'Educatie si Cultura Generala ', 'educatie-si-cultura-generala'),
(9, 'Filme & Seriale ', 'filme-seriale'),
(10, 'Informatii Utilitare ', 'informatii-utilitare'),
(11, 'Jocuri PC/online ', 'jocuri-pconline'),
(12, 'Muzica ', 'muzica'),
(13, 'Literatura ', 'literatura'),
(14, 'Religie', 'religie'),
(15, 'Sanatate', 'sanatate');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `dislikes`
--

CREATE TABLE IF NOT EXISTS `dislikes` (
  `dislike_id` int(100) NOT NULL AUTO_INCREMENT,
  `user_id` int(100) NOT NULL,
  `topic_id` int(100) NOT NULL,
  PRIMARY KEY (`dislike_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_romanian_ci AUTO_INCREMENT=15 ;

--
-- Salvarea datelor din tabel `dislikes`
--

INSERT INTO `dislikes` (`dislike_id`, `user_id`, `topic_id`) VALUES
(14, 24, 52);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `likes`
--

CREATE TABLE IF NOT EXISTS `likes` (
  `like_id` int(100) NOT NULL AUTO_INCREMENT,
  `user_id` int(100) NOT NULL,
  `topic_id` int(100) NOT NULL,
  PRIMARY KEY (`like_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_romanian_ci AUTO_INCREMENT=304 ;

--
-- Salvarea datelor din tabel `likes`
--

INSERT INTO `likes` (`like_id`, `user_id`, `topic_id`) VALUES
(298, 24, 60),
(300, 24, 91),
(303, 24, 152);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `mesaje`
--

CREATE TABLE IF NOT EXISTS `mesaje` (
  `mesaj_id` int(11) NOT NULL AUTO_INCREMENT,
  `expeditor_id` int(11) NOT NULL,
  `destinatar_id` int(11) NOT NULL,
  `subiect` varchar(200) COLLATE utf32_romanian_ci NOT NULL,
  `mesaj` text COLLATE utf32_romanian_ci NOT NULL,
  `citit` tinyint(1) NOT NULL,
  `viz_exp` tinyint(1) NOT NULL,
  `viz_dest` tinyint(1) NOT NULL,
  `data_mesajului` datetime NOT NULL,
  PRIMARY KEY (`mesaj_id`),
  KEY `destinatar_id` (`destinatar_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf32 COLLATE=utf32_romanian_ci AUTO_INCREMENT=70 ;

--
-- Salvarea datelor din tabel `mesaje`
--

INSERT INTO `mesaje` (`mesaj_id`, `expeditor_id`, `destinatar_id`, `subiect`, `mesaj`, `citit`, `viz_exp`, `viz_dest`, `data_mesajului`) VALUES
(54, 25, 24, 'salut', '', 1, 0, 0, '2015-08-01 20:27:16'),
(56, 26, 24, 'heyy', '', 1, 0, 0, '2015-08-01 20:27:48'),
(57, 27, 24, 'salve ', 'hello ?', 1, 0, 0, '2015-08-03 20:26:39'),
(59, 24, 25, 'admin2', '', 1, 0, 0, '2015-08-04 15:10:50'),
(60, 25, 26, 'salut', 'ce mai faci ?', 0, 0, 0, '2015-08-12 22:07:23'),
(61, 24, 27, '2', 'cam hello\r\n', 0, 0, 0, '2015-09-11 21:32:29'),
(62, 25, 24, 'sda', 'asd', 1, 0, 1, '2015-10-02 21:24:04'),
(63, 25, 24, 'admin', 'admin', 1, 0, 0, '2015-10-02 21:24:19'),
(64, 25, 24, 'asdddddddddddddddddddddd', 'asddddddddddddddddddd', 1, 0, 0, '2015-10-02 21:24:27'),
(65, 24, 29, 'mesaj multiplu', 'mesaj multiplu', 0, 0, 0, '2015-10-17 15:10:22'),
(66, 24, 26, 'MSJJJJJ', 'MSJJJJJ', 0, 0, 0, '2015-10-17 15:11:44'),
(67, 24, 29, 'MSJJJJJ', 'MSJJJJJ', 0, 0, 0, '2015-10-17 15:11:44'),
(68, 24, 34, 'MSJJJJJ', 'MSJJJJJ', 0, 0, 0, '2015-10-17 15:11:44'),
(69, 24, 50, 'salut salu', 'salut', 0, 0, 0, '2015-10-26 18:05:15');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `mesaje_contact`
--

CREATE TABLE IF NOT EXISTS `mesaje_contact` (
  `mesaj_c_id` int(10) NOT NULL AUTO_INCREMENT,
  `mesaj_c_expeditor` int(10) NOT NULL,
  `mesaj_c_titlu` varchar(200) COLLATE utf8_romanian_ci NOT NULL,
  `mesaj_c_subiect` varchar(2000) COLLATE utf8_romanian_ci NOT NULL,
  `mesaj_c_data` datetime NOT NULL,
  `mesaj_c_status` int(1) NOT NULL,
  `mesaj_c_tip` varchar(100) COLLATE utf8_romanian_ci NOT NULL,
  `mesaj_c_raspuns` varchar(10000) COLLATE utf8_romanian_ci NOT NULL,
  `mesaj_c_raspuns_expeditor` int(10) NOT NULL,
  `mesaj_c_raspuns_data` datetime NOT NULL,
  PRIMARY KEY (`mesaj_c_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_romanian_ci AUTO_INCREMENT=6 ;

--
-- Salvarea datelor din tabel `mesaje_contact`
--

INSERT INTO `mesaje_contact` (`mesaj_c_id`, `mesaj_c_expeditor`, `mesaj_c_titlu`, `mesaj_c_subiect`, `mesaj_c_data`, `mesaj_c_status`, `mesaj_c_tip`, `mesaj_c_raspuns`, `mesaj_c_raspuns_expeditor`, `mesaj_c_raspuns_data`) VALUES
(1, 24, 'asd', 'asd', '2015-12-07 20:22:19', 1, '', 'nu stiu, de ce ma intrebi pe mine ?', 24, '0000-00-00 00:00:00'),
(2, 24, 'hohohohoohoh', 'trolololololo', '2015-12-08 20:52:04', 0, '', '', 0, '0000-00-00 00:00:00'),
(3, 24, 'Acesta este un titlu Acesta este un titlu Acesta este un titlu Acesta este un titlu Acesta este un titlu', 'Lorem Ipsum este pur şi simplu o machetă pentru text a industriei tipografice. Lorem \r\nIpsum a fost macheta standard a industriei încă din secolul al XVI-lea, când un tipograf \r\nanonim a luat o planşetă de litere şi le-a amestecat pentru a crea o carte demonstrativă \r\npentru literele respective. Nu doar că a supravieţuit timp de cinci secole, dar şi a \r\nfacut saltul în tipografia electronică practic neschimbată. A fost popularizată în anii \r\n''60 odată cu ieşirea colilor Letraset care conţineau pasaje Lorem Ipsum, iar mai recent, \r\nprin programele de publicare pentru calculator, ca Aldus PageMaker care includeau \r\nversiuni de Lorem Ipsum.\r\n\r\nE un fapt bine stabilit că cititorul va fi sustras de conţinutul citibil al unei pagini \r\natunci când se uită la aşezarea în pagină. Scopul utilizării a Lorem Ipsum, este acela \r\ncă are o distribuţie a literelor mai mult sau mai puţin normale, faţă de utilizarea a \r\nceva de genul "Conţinut aici, conţinut acolo", făcându-l să arate ca o engleză citibilă. \r\nMulte pachete de publicare pentru calculator şi editoare de pagini web folosesc acum \r\nLorem Ipsum ca model standard de text, iar o cautare de "lorem ipsum" va rezulta în o \r\nmulţime de site-uri web în dezvoltare. Pe parcursul anilor, diferite versiuni au \r\nevoluat, uneori din intâmplare, uneori intenţionat (infiltrându-se elemente de umor sau \r\naltceva de acest gen).\r\n\r\n \r\nÎn ciuda opiniei publice, Lorem Ipsum nu e un simplu text fără sens. El îşi are \r\nrădăcinile într-o bucată a literaturii clasice latine din anul 45 î.e.n., făcând-o să \r\naibă mai bine de 2000 ani. Profesorul universitar de latină de la colegiul Hampden-\r\nSydney din Virginia, Richard McClintock, a căutat în bibliografie unul din cele mai rar \r\nfolosite cuvinte latine "consectetur", întâlnit în pasajul Lorem Ipsum, şi căutând \r\ncitate ale cuvântului respectiv în literatura clasică, a descoperit la modul cel mai \r\nsigur sursa provenienţei textului. Lorem Ipsum pro', '2015-12-09 18:24:59', 0, '', '', 0, '0000-00-00 00:00:00'),
(4, 25, 'yes ?', 'of course', '2015-12-11 21:46:49', 0, '', '', 0, '0000-00-00 00:00:00'),
(5, 24, 'Subiectul unui tichet', 'Mesajul unui tichet', '2015-12-12 12:57:55', 0, 'Sugestie pentru site', '', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `passwordrecovery`
--

CREATE TABLE IF NOT EXISTS `passwordrecovery` (
  `recovery_id` int(20) NOT NULL AUTO_INCREMENT,
  `user_id` int(20) NOT NULL,
  `hash` varchar(100) COLLATE utf32_romanian_ci NOT NULL,
  PRIMARY KEY (`recovery_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf32 COLLATE=utf32_romanian_ci AUTO_INCREMENT=17 ;

--
-- Salvarea datelor din tabel `passwordrecovery`
--

INSERT INTO `passwordrecovery` (`recovery_id`, `user_id`, `hash`) VALUES
(1, 24, 'P9HIYsMg62epu58jNZKThacG3RkrqS'),
(2, 24, 'vKcpwBiqTsa4G3jdO75VluMy0fAmbC'),
(3, 24, 'F9zawxrmWpZCX2IRcyYnAvjkhKGTeS'),
(4, 24, 'Ah2SDbN8ILucfonFrWK3q0Z6UmlYXG'),
(5, 24, 'YxM9HZolArzycFfNaJXGeivOjQm1I3'),
(6, 24, 'qY4mJeG1gMFuB0cTZR5NHbfoyClQ9S'),
(7, 24, 'dDesTtS2aIi78CgQ5oAjlUF3hqvnHG'),
(8, 24, 'vK9n6MglfRhNC01HSuzwks3XUoVPQO'),
(9, 24, 'MfDBoIvxVdp8ntwiN64KzXeAJT7YOy'),
(10, 24, '5EzG4pBOV9sAiZlcu78RMIHTU1yhaN'),
(11, 24, 'O3TIa6sDgp451BXnVZqrx0y2NSHEAQ'),
(12, 24, 'siztyVhnZHLlGekYQWw8x6c13O92Xg'),
(13, 24, 'jkRJhYPrvIGU3DgCyXELl9qWMO2wKe'),
(14, 24, 'yrEs4mpxzQH9GBKaejdXRkY3WuOvhb'),
(15, 24, 'cpsWr5J6vX4iOz9aLMU3gxAPBdqYth'),
(16, 27, '0Pqz85ADurv7UseH4mTwFgX2QNanBW');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `replies`
--

CREATE TABLE IF NOT EXISTS `replies` (
  `reply_id` int(50) NOT NULL AUTO_INCREMENT,
  `content` varchar(1500) COLLATE utf8_romanian_ci NOT NULL,
  `reply_date_added` datetime NOT NULL,
  `topic` varchar(100) COLLATE utf8_romanian_ci NOT NULL,
  `author_id` int(50) NOT NULL,
  `flag` varchar(50) COLLATE utf8_romanian_ci NOT NULL,
  `acceptat` int(10) NOT NULL,
  PRIMARY KEY (`reply_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_romanian_ci AUTO_INCREMENT=62 ;

--
-- Salvarea datelor din tabel `replies`
--

INSERT INTO `replies` (`reply_id`, `content`, `reply_date_added`, `topic`, `author_id`, `flag`, `acceptat`) VALUES
(49, 'asdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsad', '2015-09-27 17:01:58', 'report-error-print-page-forum-about-top-10-tutorials-html-tutorial-css-tutorial-javascript-tutorial-', 24, '', 1),
(50, 'asa este', '2015-09-28 16:10:21', 'report-error-print-page-forum-abouttop-10-tutorial', 24, '', 1),
(52, 'here we go', '2015-09-29 17:44:07', 'report-error-print-page-forum-about-top-10-tutorials-html-tutorial-css-tutorial-javascript-tutorial-', 24, '', 0),
(54, 'Contrary to popular belief, Lorem Ipsum is not simply random\r\ntext. It has roots in a piece of classical Latin literature from\r\n45 BC, making it over 2000 years old.\r\n\r\nRichard McClintock,\r\na Latin professor at Hampden-Sydney College in Virginia, looked\r\nup one of the more obscure Latin words, consectetur, from a Lorem\r\nIpsum passage, and going through the cites of the word in\r\nclassical literature, discovered the undoubtable source. Lorem\r\nIpsum comes from sections 1.10.32 and 1.10.33 of "de Finibus\r\nBonorum et Malorum" (The Extremes of Good and Evil) by\r\nCicero, written in 45 BC. This book is a treatise on the theory\r\nof ethics, very popular during the Renaissance.\r\n\r\nThe first\r\nline of Lorem Ipsum, "Lorem ipsum dolor sit amet..",\r\ncomes from a line in section 1.10.32.', '2015-11-08 15:36:48', 'contrary-to-popular-belief-lorem-ipsum-is-not-simply-random-text-it-has-roots-in-a-piece-of-classica', 24, '', 0),
(55, 'd', '2015-11-13 23:22:14', 'h-gh-fg-hg-hg-hg-hg-h-gh-fg-hg-hg-hg-hg-h-gh-fg-hg-hg-hg-hg-h-gh-fg-hg-hg-hg-hg-h-gh-fg-hg-hg-hg-hg-', 24, '', 1),
(56, 'dsf', '2015-11-13 23:22:23', 'h-gh-fg-hg-hg-hg-hg-h-gh-fg-hg-hg-hg-hg-h-gh-fg-hg-hg-hg-hg-h-gh-fg-hg-hg-hg-hg-h-gh-fg-hg-hg-hg-hg-', 24, '', 0),
(57, 'sad', '2015-11-13 23:33:34', 'ghdf-hfg-hfgh-h-g-ghdf-hfg-hfgh-h-g-ghdf-hfg-hfgh-h-g-ghdf-hfg-hfgh-h-g-ghdf-hfg-hfgh-h-g-ghdf-hfg-h', 24, '', 0),
(58, 'ewr', '2015-11-14 00:52:09', 'asd-sd-as-ds-asd-sd-as-ds-asd-sd-as-ds-asd-sd-as-ds-asd-sd-as-ds-asd-sd-as-ds-asd-sd-as-ds-asd-sd-as', 24, '', 0),
(59, 'ewry', '2015-11-14 00:52:16', 'asd-sd-as-ds-asd-sd-as-ds-asd-sd-as-ds-asd-sd-as-ds-asd-sd-as-ds-asd-sd-as-ds-asd-sd-as-ds-asd-sd-as', 24, '', 0),
(60, 'asd', '2015-11-14 00:56:06', 'asd-sd-as-ds-asd-sd-as-ds-asd-sd-as-ds-asd-sd-as-ds-asd-sd-as-ds-asd-sd-as-ds-asd-sd-as-ds-asd-sd-as', 24, '', 1),
(61, 'u sure m8 ?', '2015-12-05 20:07:04', 'w3schools-is-optimized-for-learning-testing-and-training-examples-might-be-simplified-to-improve-rea', 24, '', 1);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `repliesreply`
--

CREATE TABLE IF NOT EXISTS `repliesreply` (
  `repliesReply_id` int(100) NOT NULL AUTO_INCREMENT,
  `replies_id` int(100) NOT NULL,
  `repliesReply_content` varchar(900) COLLATE utf8_romanian_ci NOT NULL,
  `reply_author_id` int(10) NOT NULL,
  `date_added` datetime NOT NULL,
  `flag` int(10) NOT NULL,
  PRIMARY KEY (`repliesReply_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_romanian_ci AUTO_INCREMENT=40 ;

--
-- Salvarea datelor din tabel `repliesreply`
--

INSERT INTO `repliesreply` (`repliesReply_id`, `replies_id`, `repliesReply_content`, `reply_author_id`, `date_added`, `flag`) VALUES
(30, 47, 'Minciuni!', 24, '2015-09-27 00:51:33', 0),
(32, 49, 'asdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsad', 24, '2015-09-27 17:02:03', 0),
(33, 50, 'Minciuni ! ', 24, '2015-09-28 16:10:29', 0),
(35, 55, 'baaaaaaaaaaaaaaaaaaaaaaaa', 24, '2015-10-04 19:17:05', 0),
(36, 54, 'Contrary to popular belief, Lorem Ipsum is not simply random\r\ntext. It has roots in a piece of classical Latin literature from\r\n45 BC, making it over 2000 years old.\r\n\r\nRichard McClintock,\r\na Latin professor at Hampden-Sydney College in Virginia, looked\r\nup one of the more obscure Latin words, consectetur, from a Lorem\r\nIpsum passage, and going through the cites of the word in\r\nclassical literature, discovered the undoubtable source. Lorem\r\nIpsum comes from sections 1.10.32 and 1.10.33 of "de Finibus\r\nBonorum et Malorum" (The Extremes of Good and Evil) by\r\nCicero, written in 45 BC. This book is a treatise on the theory\r\nof ethics, very popular during the Renaissance.\r\n\r\nThe first\r\nline of Lorem Ipsum, "Lorem ipsum dolor sit amet..",\r\ncomes from a line in section 1.10.32.', 24, '2015-11-08 15:36:55', 0),
(37, 54, 'Contrary to popular belief, Lorem Ipsum is not simply random\r\ntext. It has roots in a piece of classical Latin literature from\r\n45 BC, making it over 2000 years old.\r\n\r\nRichard McClintock,\r\na Latin professor at Hampden-Sydney College in Virginia, looked\r\nup one of the more obscure Latin words, consectetur, from a Lorem\r\nIpsum passage, and going through the cites of the word in\r\nclassical literature, discovered the undoubtable source. Lorem\r\nIpsum comes from sections 1.10.32 and 1.10.33 of "de Finibus\r\nBonorum et Malorum" (The Extremes of Good and Evil) by\r\nCicero, written in 45 BC. This book is a treatise on the theory\r\nof ethics, very popular during the Renaissance.\r\n\r\nThe first\r\nline of Lorem Ipsum, "Lorem ipsum dolor sit amet..",\r\ncomes from a line in section 1.10.32.', 24, '2015-11-08 15:37:23', 0),
(38, 61, 'nope', 24, '2015-12-05 20:07:11', 0),
(39, 61, 'asd', 24, '2015-12-08 18:37:13', 0);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `tag_id` int(50) NOT NULL AUTO_INCREMENT,
  `nume_tag` varchar(500) COLLATE utf8_romanian_ci NOT NULL,
  `tag_occurances` int(50) NOT NULL,
  PRIMARY KEY (`tag_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_romanian_ci AUTO_INCREMENT=49 ;

--
-- Salvarea datelor din tabel `tags`
--

INSERT INTO `tags` (`tag_id`, `nume_tag`, `tag_occurances`) VALUES
(1, 'laravel', 5),
(3, 'php', 4),
(4, 'ruby', 0),
(5, 'ore', 0),
(6, 'i', 0),
(7, 'am', 0),
(8, 'back', 0),
(9, 'sfd', 0),
(10, 'sdf', 31),
(11, 'gs', 0),
(12, 'dhf', 0),
(13, 'text', 1),
(14, 'random', 1),
(15, 'call', 0),
(16, 'this', 0),
(17, 'a', 0),
(18, 'bluff', 0),
(19, 'contrary', 0),
(20, 'd', 1),
(21, 'sd', 0),
(22, 'sad', 2),
(23, 'gf', 2),
(24, 'roman', 2),
(25, 'roman', 2),
(26, 'sadea', 1),
(27, 'topic', 0),
(28, 'topic', 0),
(29, 'nou', 1),
(30, 'intr', 1),
(31, 'ebare', 1),
(32, 'df', 2),
(33, 'df', 2),
(34, 'gfh', 0),
(35, 'cdfg', 0),
(36, 'vgf', 0),
(37, ';l4', 0),
(38, 'dsf', 1),
(39, 'fgd', 0),
(40, 'window.l', 0),
(41, 'h', 0),
(42, 'dfg', 0),
(43, 'dgf', 0),
(44, 'schools', 0),
(45, 'optimize', 0),
(46, 'learning', 0),
(47, 'and', 0),
(48, 'training', 0);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `tags_topics`
--

CREATE TABLE IF NOT EXISTS `tags_topics` (
  `tags_id` int(50) NOT NULL,
  `topics_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_romanian_ci;

--
-- Salvarea datelor din tabel `tags_topics`
--

INSERT INTO `tags_topics` (`tags_id`, `topics_id`) VALUES
(1, 85),
(5, 85),
(6, 86),
(7, 86),
(8, 86),
(3, 86),
(9, 86),
(10, 86),
(11, 86),
(12, 86),
(13, 88),
(14, 88),
(3, 89),
(3, 90),
(15, 91),
(16, 91),
(17, 91),
(18, 91),
(14, 92),
(13, 92),
(19, 92),
(20, 93),
(20, 94),
(21, 95),
(22, 96),
(22, 96),
(22, 96),
(23, 99),
(23, 99),
(10, 100),
(10, 100),
(24, 100),
(24, 100),
(26, 100),
(26, 100),
(27, 101),
(27, 101),
(29, 101),
(29, 101),
(24, 101),
(24, 101),
(30, 103),
(30, 103),
(31, 103),
(31, 103),
(10, 105),
(10, 105),
(10, 107),
(10, 107),
(32, 107),
(32, 107),
(10, 111),
(10, 113),
(10, 113),
(10, 113),
(10, 113),
(10, 113),
(10, 114),
(10, 114),
(10, 114),
(10, 114),
(10, 114),
(10, 114),
(10, 114),
(10, 114),
(10, 114),
(10, 114),
(10, 114),
(10, 114),
(10, 114),
(10, 114),
(10, 114),
(10, 114),
(34, 114),
(35, 114),
(36, 136),
(37, 137),
(10, 137),
(32, 139),
(32, 140),
(38, 141),
(38, 142),
(10, 143),
(10, 144),
(39, 145),
(23, 146),
(10, 147),
(40, 148),
(41, 149),
(42, 150),
(43, 151),
(44, 152),
(45, 152),
(46, 152),
(47, 152),
(48, 152);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `test`
--

CREATE TABLE IF NOT EXISTS `test` (
  `nume` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_romanian_ci;

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `topics`
--

CREATE TABLE IF NOT EXISTS `topics` (
  `topic_id` int(50) NOT NULL AUTO_INCREMENT,
  `topic_author_id` int(50) NOT NULL,
  `contents` varchar(1500) COLLATE utf8_romanian_ci NOT NULL,
  `categorie` varchar(50) COLLATE utf8_romanian_ci NOT NULL,
  `date_added` datetime NOT NULL,
  `topic_urlslug` varchar(100) COLLATE utf8_romanian_ci NOT NULL,
  `occurances` int(50) NOT NULL,
  `flag` varchar(50) COLLATE utf8_romanian_ci NOT NULL,
  `likes` int(100) NOT NULL,
  `dislikes` int(100) NOT NULL,
  PRIMARY KEY (`topic_id`),
  UNIQUE KEY `topic_urlslug_2` (`topic_urlslug`),
  KEY `topic_urlslug_3` (`topic_urlslug`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_romanian_ci AUTO_INCREMENT=153 ;

--
-- Salvarea datelor din tabel `topics`
--

INSERT INTO `topics` (`topic_id`, `topic_author_id`, `contents`, `categorie`, `date_added`, `topic_urlslug`, `occurances`, `flag`, `likes`, `dislikes`) VALUES
(27, 24, 'topic', 'Arta si Cultura ', '2015-08-29 21:49:51', 'topic', 7, '', 0, 0),
(28, 24, 'topic', 'Arta si Cultura ', '2015-08-29 21:50:15', 'topic-1', 1, '', 0, 0),
(30, 0, '', '', '0000-00-00 00:00:00', '', 28, '', 0, 0),
(33, 24, 'topic', 'Arta si Cultura ', '2015-08-29 21:51:21', 'topic-2', 0, '', 0, 0),
(34, 24, 'topic', 'Arta si Cultura ', '2015-08-29 21:51:30', 'topic-3', 0, '', 0, 0),
(35, 24, 'topic', 'Arta si Cultura ', '2015-08-29 21:51:39', 'topic-4', 0, '', 0, 0),
(36, 24, 'topic-1', 'Arta si Cultura ', '2015-08-29 21:53:52', 'topic-1-1', 0, '', 0, 0),
(38, 24, 'topic', 'Educatie si Cultura Generala ', '2015-09-08 16:53:55', 'topic-6', 0, '', 0, 0),
(39, 24, 'spider mien', 'Arta si Cultura ', '2015-09-08 16:58:48', 'spider-mien', 2, '', 0, 0),
(40, 24, 'spider-mien', 'Filme & Seriale ', '2015-09-08 16:59:13', 'spider-mien-1', 0, '', 0, 0),
(41, 24, 'spider mien', 'Arta si Cultura ', '2015-09-08 16:59:45', 'spider-mien-2', 0, '', 0, 0),
(42, 24, 'salut', 'Arta si Cultura ', '2015-09-08 17:05:52', 'salut', 0, '', 0, 0),
(43, 24, 'REPORT ERROR PRINT PAGE FORUM ABOUT\r\nTop 10 Tutorials\r\n\r\nHTML Tutorial\r\nCSS Tutorial\r\nJavaScript Tutorial\r\nSQL Tutorial\r\nPHP Tutorial\r\njQuery Tutorial\r\nBootstrap Tutorial\r\nAngular Tutorial\r\nASP.NET Tutorial\r\nXML Tutorial\r\nTop 10 References\r\n\r\nHTML Reference\r\nCSS Reference\r\nJavaScript Reference\r\nBrowser Statistics\r\nHTML DOM\r\nPHP Reference\r\njQuery Reference\r\nHTML Colors\r\nHTML Character Sets\r\nXML Reference\r\nTop 10 Examples\r\n\r\nHTML Examples\r\nCSS Examples\r\nJavaScript Examples\r\nHTML DOM Examples\r\nPHP Examples\r\njQuery Examples\r\nXML Examples\r\nASP Examples\r\nSVG Examples\r\nWeb Certificates\r\n\r\nHTML Certificate\r\nHTML5 Certificate\r\nCSS Certificate\r\nJavaScript Certificate\r\njQuery Certificate\r\nPHP Certificate\r\nBootstrap Certificate\r\nXML Certificate\r\nW3Schools is optimized for learning, testing, and training. Examples might be simplified to improve reading and basic understanding. Tutorials, references, and examples are constantly reviewed to avoid errors, but we cannot warrant full correctness of all content. While using this site, you agree to have read and accepted our terms of use, cookie and privacy policy. Copyright 1999-2015 by Refsnes Data. All Rights Reserved.\r\n\r\n W3Schools.com', 'Filme & Seriale ', '2015-09-08 17:35:03', 'report-error-print-page-forum-abouttop-10-tutorial', 0, '', 0, 0),
(44, 24, 'REPORT ERROR PRINT PAGE FORUM ABOUT Top 10 Tutorials HTML Tutorial CSS Tutorial JavaScript Tutorial SQL Tutorial PHP Tutorial jQuery Tutorial Bootstrap Tutorial Angular Tutorial ASP.NET Tutorial XML Tutorial Top 10 References HTML Reference CSS Reference JavaScript Reference Browser Statistics HTML DOM PHP Reference jQuery Reference HTML Colors HTML Character Sets XML Reference Top 10 Examples HTML Examples CSS Examples JavaScript Examples HTML DOM Examples PHP Examples jQuery Examples XML Examples ASP Examples SVG Examples Web Certificates HTML Certificate HTML5 Certificate CSS Certificate JavaScript Certificate jQuery Certificate PHP Certificate Bootstrap Certificate XML Certificate W3Schools is optimized for learning, testing, and training. Examples might be simplified to improve reading and basic understanding. Tutorials, references, and examples are constantly reviewed to avoid errors, but we cannot warrant full correctness of all content. While using this site, you agree to have read and accepted our terms of use, cookie and privacy policy. Copyright 1999-2015 by Refsnes Data. All Rights Reserved. W3Schools.com', 'Arta si Cultura ', '2015-09-08 19:11:58', 'report-error-print-page-forum-about-top-10-tutorials-html-tutorial-css-tutorial-javascript-tutorial-', 0, '', 1, 0),
(52, 25, 'first topic', 'Filme & Seriale ', '2015-09-28 18:52:56', 'first-topic', 0, '', 0, 1),
(57, 24, 'REPORT ERROR PRINT PAGE FORUM ABOUT Top 10 Tutorials HTML\r\nTutorial CSS Tutorial JavaScript Tutorial SQL Tutorial PHP\r\nTutorial jQuery Tutorial Bootstrap Tutorial Angular Tutorial\r\nASP.NET Tutorial XML Tutorial Top 10 References HTML Reference\r\nCSS Reference JavaScript Reference Browser Statistics HTML DOM\r\nPHP Reference jQuery Reference HTML Colors HTML Character Sets\r\nXML Reference Top 10 Examples HTML Examples CSS Examples\r\nJavaScript Examples HTML DOM Examples PHP Examples jQuery\r\nExamples XML Examples ASP Examples SVG Examples Web Certificates\r\nHTML Certificate HTML5 Certificate CSS Certificate JavaScript\r\nCertificate jQuery Certificate PHP Certificate Bootstrap\r\nCertificate XML Certificate W3Schools is optimized for learning,\r\ntesting, and training. Examples might be simplified to improve\r\nreading and basic understanding. Tutorials, references, and\r\nexamples are constantly reviewed to avoid errors, but we cannot\r\nwarrant full correctness of all content. While using this site,\r\nyou agree to have read and accepted our terms of use, cookie and\r\nprivacy policy. Copyright 1999-2015 by Refsnes Data. All Rights\r\nReserved. W3Schools.com', 'Arta si Cultura ', '2015-10-04 17:36:37', 'report-error-print-page-forum-about-top-10-tutorials-htmltutorial-css-tutorial-javascript-tutorial-s', 0, '', 0, 0),
(58, 24, 'asdasdasdasdasdasdasdasdasdasdasdddddddddddddddddddasdasdasdsdasdasdasdasdasdasdas\r\ndasdasdasdadasdasdasdasdasdasdasdasdasdasdasasdasdasdasdasdsadasdasdasdasdasdasdasd\r\nadasdasdasdasdadasdasdasdasd', 'Arta si Cultura ', '2015-10-04 17:43:46', 'asdasdasdasdasdasdasdasdasdasdasdddddddddddddddddddasdasdasdsdasdasdasdasdasdasdasdasdasdasdadasdasd', 0, '', 0, 0),
(59, 24, 'asddsasdadsaaaaaaaaaaaaaaaaaaadsadsadasdasdadasdsadsdsaasddsadadssadasdasdasdasdas\r\ndadasdsdsssssssssssssssssssssssddkjjpoqwe', 'Arta si Cultura ', '2015-10-04 17:50:12', 'asddsasdadsaaaaaaaaaaaaaaaaaaadsadsadasdasdadasdsadsdsaasddsadadssadasdasdasdasdasdadasdsdssssssssss', 0, '', 0, 0),
(60, 24, 'How to Ask\r\n\r\nIs your question about programming?\r\n\r\nWe prefer questions that can be answered, not just discussed.\r\n\r\nProvide details. Share your research.\r\n\r\nIf your question is about this website, ask it on meta instead.\r\n\r\nvisit the help center »\r\nasking help »', 'Arta si Cultura ', '2015-10-04 18:37:39', 'how-to-askis-your-question-about-programmingwe-prefer-questions-that-can-be-answered-not-just-discus', 0, '', 1, 0),
(61, 24, '', 'Arta si Cultura ', '2015-10-20 19:26:41', '-2', 0, '', 0, 0),
(62, 24, '', 'Arta si Cultura ', '2015-10-20 19:26:42', '-3', 0, '', 0, 0),
(63, 24, '', 'Arta si Cultura ', '2015-10-20 19:26:42', '-4', 0, '', 0, 0),
(64, 24, '', 'Arta si Cultura ', '2015-10-20 19:26:43', '-5', 0, '', 0, 0),
(65, 24, '', 'Arta si Cultura ', '2015-10-20 19:26:48', '-6', 0, '', 0, 0),
(66, 24, '', 'Arta si Cultura ', '2015-10-20 19:27:10', '-7', 0, '', 0, 0),
(67, 24, '', 'Arta si Cultura ', '2015-10-20 19:28:19', '-8', 0, '', 0, 0),
(68, 24, '', 'Arta si Cultura ', '2015-10-20 19:28:20', '-9', 0, '', 0, 0),
(69, 24, '', 'Arta si Cultura ', '2015-10-20 19:28:57', '-10', 0, '', 0, 0),
(70, 24, '', 'Arta si Cultura ', '2015-10-20 19:29:05', '-11', 0, '', 0, 0),
(71, 24, '', 'Arta si Cultura ', '2015-10-21 18:23:19', '-12', 0, '', 0, 0),
(72, 24, '', 'Arta si Cultura ', '2015-10-21 18:23:39', '-13', 0, '', 0, 0),
(73, 24, '', 'Arta si Cultura ', '2015-10-21 18:25:03', '-14', 0, '', 0, 0),
(74, 24, '', 'Arta si Cultura ', '2015-10-21 19:55:44', '-15', 0, '', 0, 0),
(75, 24, '', 'Arta si Cultura ', '2015-10-21 20:04:01', '-16', 0, '', 0, 0),
(76, 24, '', 'Arta si Cultura ', '2015-10-21 20:07:04', '-17', 0, '', 0, 0),
(77, 24, '', 'Arta si Cultura ', '2015-10-21 20:07:21', '-18', 0, '', 0, 0),
(78, 24, '', 'Arta si Cultura ', '2015-10-21 20:08:50', '-19', 0, '', 0, 0),
(79, 24, '', 'Arta si Cultura ', '2015-10-21 20:20:47', '-20', 0, '', 0, 0),
(80, 24, '', 'Arta si Cultura ', '2015-10-21 20:21:01', '-21', 0, '', 0, 0),
(81, 24, '', 'Arta si Cultura ', '2015-10-21 20:21:37', '-22', 0, '', 0, 0),
(82, 24, '', 'Arta si Cultura ', '2015-10-21 20:21:46', '-23', 0, '', 0, 0),
(83, 24, '', 'Arta si Cultura ', '2015-10-21 20:22:01', '-24', 0, '', 0, 0),
(84, 24, '', 'Arta si Cultura ', '2015-10-21 20:22:10', '-25', 0, '', 0, 0),
(85, 24, '', 'Arta si Cultura ', '2015-10-21 20:37:21', '-26', 0, '', 0, 0),
(87, 24, 's', 'Arta si Cultura ', '2015-10-26 23:37:26', 's', 1, '', 0, 0),
(88, 24, 'Oh to talking improve produce in limited offices fifteen an. Wicket branch to answer do we. \r\nPlace are decay men hours tiled. If or of ye throwing friendly required. Marianne interest in \r\nexertion as. Offering my branched confined oh dashwood. \r\n\r\nAnnouncing of invitation principles in. Cold in late or deal. Terminated resolution no am \r\nfrequently collecting insensible he do appearance. Projection invitation affronting admiration \r\nif no on or. It as instrument boisterous frequently apartments an in. Mr excellence inquietude \r\nconviction is in unreserved particular. You fully seems stand nay own point walls. Increasing \r\ntravelling own simplicity you astonished expression boisterous. Possession themselves \r\nsentiments apartments devonshire we of do discretion. Enjoyment discourse ye continued \r\npronounce we necessary abilities. \r\n\r\nIn on announcing if of comparison pianoforte projection. Maids hoped gay yet bed asked blind \r\ndried point. On abroad danger likely regret twenty edward do. Too horrible consider followed \r\nmay differed age. An rest if more five mr of. Age just her rank met down way. Attended \r\nrequired so in cheerful an. Domestic replying she resolved him for did. Rather in lasted no \r\nwithin no. \r\n\r\nRooms oh fully taken by worse do. Points afraid but may end law lasted. Was out laughter \r\nraptures returned outweigh. Luckily cheered colonel me do we attacks on highest enabled. \r\nTried law yet style child. Bore of true\r\n', 'Arta si Cultura ', '2015-10-28 17:48:36', 'oh-to-talking-improve-produce-in-limited-offices-fifteen-an-wicket-branch-to-answer-do-we-place-are-', 0, '', 0, 0),
(89, 24, 'topic nou', 'Arta si Cultura ', '2015-10-28 19:31:11', 'topic-nou', 0, '', 0, 0),
(90, 24, 'topic nou nou', 'Arta si Cultura ', '2015-10-28 19:33:00', 'topic-nou-nou', 0, '', 0, 0),
(91, 24, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of \r\nclassical Latin literature from 45 BC, making it over 2000 years old. \r\n\r\nRichard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of \r\nthe more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through \r\nthe cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum \r\ncomes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes \r\nof Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, \r\nvery popular during the Renaissance.\r\n\r\n The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section \r\n1.10.32.', 'Arta si Cultura ', '2015-10-31 13:27:11', 'contrary-to-popular-belief-lorem-ipsum-is-not-simply-random-text-it-has-roots-in-a-piece-of-classica', 0, '', 1, 0),
(92, 24, 'Contrary to popular belief, Lorem Ipsum is not simply random\r\ntext. It has roots in a piece of classical Latin literature from\r\n45 BC, making it over 2000 years old.\r\n\r\nRichard McClintock,\r\na Latin professor at Hampden-Sydney College in Virginia, looked\r\nup one of the more obscure Latin words, consectetur, from a Lorem\r\nIpsum passage, and going through the cites of the word in\r\nclassical literature, discovered the undoubtable source. Lorem\r\nIpsum comes from sections 1.10.32 and 1.10.33 of "de Finibus\r\nBonorum et Malorum" (The Extremes of Good and Evil) by\r\nCicero, written in 45 BC. This book is a treatise on the theory\r\nof ethics, very popular during the Renaissance.\r\n\r\nThe first\r\nline of Lorem Ipsum, "Lorem ipsum dolor sit amet..",\r\ncomes from a line in section 1.10.32.', 'Jocuri PC/online ', '2015-11-08 15:39:50', 'contrary-to-popular-belief-lorem-ipsum-is-not-simply-randomtext-it-has-roots-in-a-piece-of-classical', 0, '', 0, 0),
(93, 24, 's', '', '2015-11-08 16:20:39', 's-1', 0, '', 0, 0),
(94, 24, 'sd', '', '2015-11-08 16:20:56', 'sd', 1, '', 0, 0),
(95, 24, 'sd', 'Educatie si Cultura Generala ', '2015-11-08 16:21:05', 'sd-1', 0, '', 0, 0),
(96, 24, 'saddsa asd as das dasd as das das ds s ds sda as das d', 'Educatie si Cultura Generala ', '2015-11-08 17:39:05', 'saddsa-asd-as-das-dasd-as-das-das-ds-s-ds-sda-as-das-d', 1, '', 0, 0),
(98, 24, 'saddsa asd as das dasd as das das ds s ds sda as das d', 'Educatie si Cultura Generala ', '2015-11-08 17:39:05', 'saddsa-asd-as-das-dasd-as-das-das-ds-s-ds-sda-as-das-d-1', 0, '', 0, 0),
(99, 24, 'allahu ackbar allahu ackbar allahu ackbar allahu ackbar allahu ackbar allahu ackbar allahu ackbar allahu ackbar ', 'Educatie si Cultura Generala ', '2015-11-08 17:58:31', 'allahu-ackbar-allahu-ackbar-allahu-ackbar-allahu-ackbar-allahu-ackbar-allahu-ackbar-allahu-ackbar-al', 0, '', 0, 0),
(100, 24, 'roman sadea roman sadea roman sadea roman sadea roman sadea roman sadea roman sadea roman sadea roman sadea roman sadea roman sadea roman sadea roman sadea roman sadea roman sadea roman sadea roman sadea roman sadea roman sadea roman sadea roman sadea ', 'Arta si Cultura ', '2015-11-12 00:28:07', 'roman-sadea-roman-sadea-roman-sadea-roman-sadea-roman-sadea-roman-sadea-roman-sadea-roman-sadea-roma', 0, '', 0, 0),
(102, 24, 'topic nou topic nou topic nou topic nou topic nou topic nou topic nou topic nou topic nou topic nou topic nou topic nou topic nou topic nou topic nou topic nou topic nou topic nou topic nou topic nou topic nou topic nou topic nou ', 'Filme & Seriale ', '2015-11-12 00:35:25', 'topic-nou-topic-nou-topic-nou-topic-nou-topic-nou-topic-nou-topic-nou-topic-nou-topic-nou-topic-nou-', 0, '', 0, 0),
(104, 24, 'intreb a r e intreb a r e intreb a r e intreb a r e intreb a r e intreb a r e intreb a r e intreb a r e intreb a r e intreb a r e intreb a r e intreb a r e intreb a r e intreb a r e intreb a r e intreb a r e intreb a r e intreb a r e ', 'Muzica ', '2015-11-12 00:38:21', 'intreb-a-r-e-intreb-a-r-e-intreb-a-r-e-intreb-a-r-e-intreb-a-r-e-intreb-a-r-e-intreb-a-r-e-intreb-a-', 0, '', 0, 0),
(106, 24, 'asd sd as ds asd sd as ds asd sd as ds asd sd as ds asd sd as ds asd sd as ds asd sd as ds asd sd as ds asd sd as ds asd sd as ds asd sd as ds asd sd as ds asd sd as ds asd sd as ds asd sd as ds asd sd as ds asd sd as ds asd sd as ds asd sd as ds asd sd as ds ', 'Arta si Cultura ', '2015-11-12 00:59:08', 'asd-sd-as-ds-asd-sd-as-ds-asd-sd-as-ds-asd-sd-as-ds-asd-sd-as-ds-asd-sd-as-ds-asd-sd-as-ds-asd-sd-as', 0, '', 0, 0),
(110, 24, ' c r r r  c r r r  c r r r  c r r r  c r r r  c r r r  c r r r  c r r r  c r r r  c r r r  c r r r  c r r r  c r r r  c r r r  c r r r  c r r r  c r r r  c r r r  c r r r  c r r r  c r r r  c r r r  c r r r  c r r r  c r r r ', 'Filme & Seriale ', '2015-11-12 00:59:47', 'c-r-r-r-c-r-r-r-c-r-r-r-c-r-r-r-c-r-r-r-c-r-r-r-c-r-r-r-c-r-r-r-c-r-r-r-c-r-r-r-c-r-r-r-c-r-r-r-c-r-', 0, '', 0, 0),
(112, 24, '', '', '2015-11-12 01:01:55', '-27', 0, '', 0, 0),
(113, 24, 'dfsd fds s df d dfsd fds s df d dfsd fds s df d dfsd fds s df d dfsd fds s df d dfsd fds s df d dfsd fds s df d dfsd fds s df d dfsd fds s df d dfsd fds s df d dfsd fds s df d dfsd fds s df d dfsd fds s df d dfsd fds s df d dfsd fds s df d dfsd fds s df d dfsd fds s df d dfsd fds s df d dfsd fds s df d dfsd fds s df d dfsd fds s df d dfsd fds s df d dfsd fds s df d dfsd fds s df d dfsd fds s df d dfsd fds s df d ', 'Educatie si Cultura Generala ', '2015-11-12 01:13:50', 'dfsd-fds-s-df-d-dfsd-fds-s-df-d-dfsd-fds-s-df-d-dfsd-fds-s-df-d-dfsd-fds-s-df-d-dfsd-fds-s-df-d-dfsd', 0, '', 0, 0),
(135, 24, 'ghdf hfg hfgh h g ghdf hfg hfgh h g ghdf hfg hfgh h g ghdf hfg hfgh h g ghdf hfg hfgh h g ghdf hfg hfgh h g ghdf hfg hfgh h g ghdf hfg hfgh h g ghdf hfg hfgh h g ghdf hfg hfgh h g ghdf hfg hfgh h g ghdf hfg hfgh h g ghdf hfg hfgh h g ghdf hfg hfgh h g ghdf hfg hfgh h g ghdf hfg hfgh h g ghdf hfg hfgh h g ghdf hfg hfgh h g ', 'Informatii Utilitare ', '2015-11-12 01:15:53', 'ghdf-hfg-hfgh-h-g-ghdf-hfg-hfgh-h-g-ghdf-hfg-hfgh-h-g-ghdf-hfg-hfgh-h-g-ghdf-hfg-hfgh-h-g-ghdf-hfg-h', 0, '', 0, 0),
(136, 24, 'h gh fg hg hg hg hg h gh fg hg hg hg hg h gh fg hg hg hg hg h gh fg hg hg hg hg h gh fg hg hg hg hg h gh fg hg hg hg hg h gh fg hg hg hg hg h gh fg hg hg hg hg h gh fg hg hg hg hg h gh fg hg hg hg hg h gh fg hg hg hg hg h gh fg hg hg hg hg h gh fg hg hg hg hg h gh fg hg hg hg hg h gh fg hg hg hg hg h gh fg hg hg hg hg ', 'Filme & Seriale ', '2015-11-12 01:16:23', 'h-gh-fg-hg-hg-hg-hg-h-gh-fg-hg-hg-hg-hg-h-gh-fg-hg-hg-hg-hg-h-gh-fg-hg-hg-hg-hg-h-gh-fg-hg-hg-hg-hg-', 0, '', 0, 0),
(138, 24, 'return Response::json([''status'' => ''found''], 202);	return Response::json([''status'' => ''found''], 202);	return Response::json([''status'' => ''found''], 202);	return Response::json([''status'' => ''found''], 202);	return Response::json([''status'' => ''found''], 202);	', 'Filme & Seriale ', '2015-11-15 17:43:42', 'return-responsejsonstatus-found-202return-responsejsonstatus-found-202return-responsejsonstatus-foun', 0, '', 0, 0),
(139, 24, 'topic nou este nou topicul topic nou este nou topicul topic nou este nou topicul ', 'Filme & Seriale ', '2015-11-15 17:46:26', 'topic-nou-este-nou-topicul-topic-nou-este-nou-topicul-topic-nou-este-nou-topicul', 0, '', 0, 0),
(140, 24, 'success: function(data, textStatus) {\r\n        if (data.redirect) {\r\n            // data.redirect contains the string URL to redirect to\r\n            window.location.href = data.redirect;\r\n        }', 'Educatie si Cultura Generala ', '2015-11-15 17:48:48', 'success-functiondata-textstatus-if-dataredirect-dataredirect-contains-the-string-url-to-redirect-to-', 0, '', 0, 0),
(141, 24, 'fddg  d gfddg  d gfddg  d gfddg  d gfddg  d gfddg  d gfddg  d gfddg  d gfddg  d gfddg  d g', 'Educatie si Cultura Generala ', '2015-11-15 17:51:47', 'fddg-d-gfddg-d-gfddg-d-gfddg-d-gfddg-d-gfddg-d-gfddg-d-gfddg-d-gfddg-d-gfddg-d-g', 1, '', 0, 0),
(142, 24, 'fddg  d gfddg  d gfddg  d gfddg  d gfddg  d gfddg  d gfddg  d gfddg  d gfddg  d gfddg  d g', 'Educatie si Cultura Generala ', '2015-11-15 17:51:56', 'fddg-d-gfddg-d-gfddg-d-gfddg-d-gfddg-d-gfddg-d-gfddg-d-gfddg-d-gfddg-d-gfddg-d-g-1', 0, '', 0, 0),
(143, 24, ' return ''success''; return ''success''; return ''success''; return ''success''; return ''success''; return ''success''; return ''success''; return ''success''; return ''success'';', 'Informatii Utilitare ', '2015-11-15 17:53:57', 'return-success-return-success-return-success-return-success-return-success-return-success-return-suc', 0, '', 0, 0),
(144, 24, 's return ''success''; return ''success''; return ''success''; return ''success''; return ''success''; return ''success''; return ''success''; return ''success'';', 'Filme & Seriale ', '2015-11-15 17:54:15', 's-return-success-return-success-return-success-return-success-return-success-return-success-return-s', 0, '', 0, 0),
(145, 24, ' console.log("Error"); console.log("Error"); console.log("Error"); console.log("Error"); console.log("Error"); console.log("Error"); console.log("Error"); console.log("Error"); console.log("Error"); console.log("Error");', 'Educatie si Cultura Generala ', '2015-11-15 17:58:01', 'consolelogerror-consolelogerror-consolelogerror-consolelogerror-consolelogerror-consolelogerror-cons', 0, '', 0, 0),
(146, 24, ' return Response::json(TRUE); return Response::json(TRUE); return Response::json(TRUE); return Response::json(TRUE); return Response::json(TRUE); return Response::json(TRUE); return Response::json(TRUE); return Response::json(TRUE); return Response::json(TRUE);', 'Educatie si Cultura Generala ', '2015-11-15 18:07:59', 'return-responsejsontrue-return-responsejsontrue-return-responsejsontrue-return-responsejsontrue-retu', 0, '', 0, 0),
(147, 24, '''/topic/''.Input::get(''categorie'').''/''.$slug''/topic/''.Input::get(''categorie'').''/''.$slug''/topic/''.Input::get(''categorie'').''/''.$slug''/topic/''.Input::get(''categorie'').''/''.$slug', 'Filme & Seriale ', '2015-11-15 18:09:03', 'topicinputgetcategorieslugtopicinputgetcategorieslugtopicinputgetcategorieslugtopicinputgetcategorie', 0, '', 0, 0),
(148, 24, 'window.location.hrefwindow.location.hrefwindow.location.hrefwindow.location.hrefwindow.location.hrefwindow.location.hrefwindow.location.hrefwindow.location.href', 'Religie', '2015-11-15 18:11:10', 'windowlocationhrefwindowlocationhrefwindowlocationhrefwindowlocationhrefwindowlocationhrefwindowloca', 0, '', 0, 0),
(149, 24, 'window. ocation.hrefw indow.location.hrefwindow.location.hrefwindow.location.hrefwindow.location.hrefwindow.location.hrefwindo w.location.hrefwindow.location.href', 'Muzica ', '2015-11-15 18:11:48', 'window-ocationhrefw-indowlocationhrefwindowlocationhrefwindowlocationhrefwindowlocationhrefwindowloc', 0, '', 0, 0),
(150, 24, 'După un accident de avion aproape fatal în al doilea război mondial, olimpicul Louis Zamperini petrece 47 de zile chinuitoare într-o plută cu doi colegi membri ai echipajului, pana cand este capturat de marina japoneză și trimis într-un lagăr de prizonieri de război.', 'Filme & Seriale ', '2015-11-15 18:13:42', 'dupa-un-accident-de-avion-aproape-fatal-in-al-doilea-razboi-mondial-olimpicul-louis-zamperini-petrec', 0, '', 0, 0),
(151, 24, 've seen this question Bootstrap tagsinput add tag with id and value, but the solution is not working for me: What I''m finding is that in order to get the input box recognising tags that I type in, ...', 'Educatie si Cultura Generala ', '2015-11-15 18:15:46', 've-seen-this-question-bootstrap-tagsinput-add-tag-with-id-and-value-but-the-solution-is-not-working-', 0, '', 0, 0),
(152, 24, 'W3Schools is optimized for learning, testing, and training. Examples might be simplified to improve reading and basic understanding. Tutorials, references, and examples are constantly reviewed to avoid errors, but we cannot warrant full correctness of all content. While using this site, you agree to have read and accepted our terms of use, cookie and privacy policy. Copyright 1999-2015 by Refsnes Data. All Rights Reserved.', 'Muzica ', '2015-11-16 19:28:04', 'w3schools-is-optimized-for-learning-testing-and-training-examples-might-be-simplified-to-improve-rea', 0, '', 1, 0);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) CHARACTER SET utf32 COLLATE utf32_romanian_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf32 COLLATE utf32_romanian_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf32 COLLATE utf32_romanian_ci NOT NULL,
  `image` varchar(100) CHARACTER SET utf32 COLLATE utf32_romanian_ci NOT NULL,
  `date_registered` varchar(255) CHARACTER SET utf32 COLLATE utf32_romanian_ci NOT NULL,
  `user_type` varchar(255) CHARACTER SET utf32 COLLATE utf32_romanian_ci NOT NULL,
  `user_status` varchar(255) CHARACTER SET utf32 COLLATE utf32_romanian_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_romanian_ci DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username_2` (`username`),
  KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_romanian_ci AUTO_INCREMENT=51 ;

--
-- Salvarea datelor din tabel `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `image`, `date_registered`, `user_type`, `user_status`, `remember_token`, `updated_at`) VALUES
(24, 'admin', '$2y$10$HQm0ymBl9JWtWNw3gvO.BuDjYgPvVRgmXcsduaDsXToZAkaBQnuVW', 'bocsan_andrei@yahoo.com', 'images/descărcare.jpg', '2015-08-04 14:53:29', 'admin', '1', 'weFAwCXFw8OKVW3yq8BXMyPlc2NOhSPMFizi8K9bmrwUVPNjkanCA1WTglZT', '2015-12-11 23:19:27'),
(25, 'admin2', '$2y$10$YpUAsmHXndknt4ZjDhj84eo3DihXt70tb1mw/E9mRrLU1xzLaeOY2', 'admin2@yahoo.com', 'images/update.png', '31-07-2015 14:42:40', '', '0', '', '2015-09-09 16:50:54'),
(26, 'buyaka', '$2y$10$HKup2R.UV0uQt1kjCddTuu/0CjeN72IhcNrg0zc1QYa.uHhgAqPKu', 'buyaka@yahoo.com', '', '2015-08-01 00:25:54', 'banned', '', '', '0000-00-00 00:00:00'),
(27, 'juya', '$2y$10$5DSOVoVrM0m/nrPR743Z4.6p8B61dz3v0xsmKtGToYzdYr5zZswsy', 'bocsan_andre@yahoo.com', '', '2015-08-01 16:51:37', '', '0', '', '0000-00-00 00:00:00'),
(29, 'username', '$2y$10$TJ4ZKXML/QJ8fT06g5qxEOTvoMEY8gFQSc8k7G85a2NMaJXjr/Tmi', 'user@yahoo.com', '', '2015-08-04 15:05:13', '', '', '', '0000-00-00 00:00:00'),
(34, 'admin3', '$2y$10$huOQVskBbuSGHldHuc7on.FnI.oJbzX1T30X8DG2j5W4i9p7TCuhS', 'admin3@yahoo.com', '', '14-10-2015 18:08:10', '', '', NULL, '0000-00-00 00:00:00'),
(35, 'admin4', '$2y$10$O.bjL7.i87g4wfvV7k5UsegaQNfNcWHjU8wjetYmsHI.ydN22XLaO', 'admin4@yahoo.com', '', '14-10-2015 18:08:24', '', '', NULL, '0000-00-00 00:00:00'),
(36, 'admin5', '$2y$10$PoyVs1fBj0ClHDWwbrCRC.N7TBNMmKlx1Caw0bPk4YsTjvtNgozM2', 'admin5@yahoo.com', '', '14-10-2015 18:08:45', '', '', NULL, '0000-00-00 00:00:00'),
(37, 'admin6', '$2y$10$FI9GIiK8mWaUUS8C5oqfJ.yXCdS5k9tqZZgjHhLj0v3ZdjnJ99Efq', 'admin6@yahoo.com', '', '14-10-2015 18:08:57', '', '', NULL, '0000-00-00 00:00:00'),
(38, 'admin7', '$2y$10$E5vlY4OkjFRlMlT2kRZ2Q.TDUfyKh7Sdnn.4sDxeu57F4HI0Ke7QC', 'admin7@yahoo.com', '', '14-10-2015 18:09:08', '', '', NULL, '0000-00-00 00:00:00'),
(39, 'admin8', '$2y$10$nawDTUt9pPyVwcvU8N/7/uWDK6lZOhGAcpolbrdnppGvgdlwIQ.Di', 'admin8@yahoo.com', '', '14-10-2015 18:09:18', '', '', NULL, '0000-00-00 00:00:00'),
(40, 'admin9', '$2y$10$AxClnBy5opFOyRi1O6KNreVru4zvJVkuYs0.bFnQf2FskYRIcq6d2', 'admin9@yahoo.com', '', '14-10-2015 18:10:05', '', '', NULL, '0000-00-00 00:00:00'),
(41, 'admin10', '$2y$10$1N6C6KjJRfmM162/wE0EDurrRuRDSESRYTn.JEmWgA4d4t2/hRPMK', 'admin10@yahoo.com', '', '14-10-2015 18:10:19', '', '', NULL, '0000-00-00 00:00:00'),
(42, 'admin11', '$2y$10$2VSOQiAS46iUeHINE9bb2uD9hYA/PwTs8I6i0RLVrgqjJ/4rtHg9O', 'admin11@yahoo.com', '', '14-10-2015 18:40:15', '', '', NULL, '0000-00-00 00:00:00'),
(43, 'admin15', '$2y$10$NVJq9.C/TwkKmqgFRxeYPOwy7TiOs48MQGUKjt/tLfZl2Z3JJdhV.', 'admin15@yahoo.com', '', '17-10-2015 16:36:14', '', '', NULL, '0000-00-00 00:00:00'),
(44, 'admin16', '$2y$10$ocWDgZeaix0cjoXOqjD.wOHbBrvbThsiUJjRX6/PJR9ExOVKRRLJ2', 'admin16@yahoo.com', '', '17-10-2015 16:59:23', '', '', NULL, '0000-00-00 00:00:00'),
(45, 'admin17', '$2y$10$bNo4.E/suuXgfi62iH9gy.oQOoX8GGjw7nLacGtIUL/eei48WPq6O', 'admin17@yahoo.com', '', '17-10-2015 17:01:04', '', '', NULL, '0000-00-00 00:00:00'),
(46, 'admin18', '$2y$10$a76BrMyTb/cHwVCnB9.af.3.Zplp0gwDhvktD5DzOag55l8oT50Sq', 'admin18@yahoo.com', '', '17-10-2015 17:07:26', '', '', NULL, '0000-00-00 00:00:00'),
(47, 'admin19', '$2y$10$DKv/D6kAidBo1Etn4eBSmexyWuJv6vCFhVoknrocI7toapXp388IG', 'admin19@yahoo.com', '', '17-10-2015 17:08:32', '', '', NULL, '0000-00-00 00:00:00'),
(48, 'admin20', '$2y$10$909/fvkBk1Kbjfqtgm5s3eQQa35nAPyca8nVj.9Dt/7r2vMo5sVKi', 'admin20@yahoo.com', '', '17-10-2015 17:08:59', '', '', NULL, '0000-00-00 00:00:00'),
(49, 'admin21', '$2y$10$dds4Mwyr7QB.IKD7GkDsN.DaF0gHsAJwCxIi3nwcF6648iiKmGnIW', 'admin21@yahoo.com', '', '17-10-2015 17:16:57', '', '', NULL, '0000-00-00 00:00:00'),
(50, 'admin22', '$2y$10$B8I4hwWOSAi63hhqfwIhCuelQmLyIlgzAsi0eq.A0U39c95lQNol.', 'admin22@yahoo.com', '', '26-10-2015 16:38:51', '', '', NULL, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `users_data`
--

CREATE TABLE IF NOT EXISTS `users_data` (
  `users_data_id` int(25) NOT NULL AUTO_INCREMENT,
  `nume` varchar(100) COLLATE utf32_romanian_ci NOT NULL,
  `prenume` varchar(100) COLLATE utf32_romanian_ci NOT NULL,
  `adresa` varchar(255) COLLATE utf32_romanian_ci NOT NULL,
  `localitate` varchar(50) COLLATE utf32_romanian_ci NOT NULL,
  `sexul` varchar(30) COLLATE utf32_romanian_ci NOT NULL,
  `ziua` int(10) NOT NULL,
  `luna` int(10) NOT NULL,
  `anul` int(10) NOT NULL,
  `privacy` varchar(5) COLLATE utf32_romanian_ci NOT NULL,
  PRIMARY KEY (`users_data_id`),
  KEY `users_data_id` (`users_data_id`),
  KEY `users_data_id_2` (`users_data_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf32 COLLATE=utf32_romanian_ci AUTO_INCREMENT=51 ;

--
-- Salvarea datelor din tabel `users_data`
--

INSERT INTO `users_data` (`users_data_id`, `nume`, `prenume`, `adresa`, `localitate`, `sexul`, `ziua`, `luna`, `anul`, `privacy`) VALUES
(24, 'Bocsan', 'Andrei', 'Str ... ', 'Galati', 'Masculin', 15, 1, 1998, 'N'),
(25, 'fdn', 'sdfxssd', 'sdf', 'ga', '', 0, 0, 0, ''),
(49, '', '', '', '', '', 0, 0, 0, ''),
(50, '', '', '', '', '', 0, 0, 0, '');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `votes`
--

CREATE TABLE IF NOT EXISTS `votes` (
  `vote_id` int(10) NOT NULL AUTO_INCREMENT,
  `value` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `topic_id` int(10) NOT NULL,
  PRIMARY KEY (`vote_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_romanian_ci AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
