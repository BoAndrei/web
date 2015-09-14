-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 14 Sep 2015 la 19:53
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_romanian_ci AUTO_INCREMENT=10 ;

--
-- Salvarea datelor din tabel `categories`
--

INSERT INTO `categories` (`categ_id`, `denumire`, `categ_urlslug`) VALUES
(7, 'Arta si Cultura ', 'arta-si-cultura'),
(8, 'Educatie si Cultura Generala ', 'educatie-si-cultura-generala'),
(9, 'Filme & Seriale ', 'filme-seriale');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `dislikes`
--

CREATE TABLE IF NOT EXISTS `dislikes` (
  `dislike_id` int(100) NOT NULL AUTO_INCREMENT,
  `user_id` int(100) NOT NULL,
  `topic_id` int(100) NOT NULL,
  PRIMARY KEY (`dislike_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_romanian_ci AUTO_INCREMENT=57 ;

--
-- Salvarea datelor din tabel `dislikes`
--

INSERT INTO `dislikes` (`dislike_id`, `user_id`, `topic_id`) VALUES
(56, 24, 48);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `likes`
--

CREATE TABLE IF NOT EXISTS `likes` (
  `like_id` int(100) NOT NULL AUTO_INCREMENT,
  `user_id` int(100) NOT NULL,
  `topic_id` int(100) NOT NULL,
  PRIMARY KEY (`like_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_romanian_ci AUTO_INCREMENT=260 ;

--
-- Salvarea datelor din tabel `likes`
--

INSERT INTO `likes` (`like_id`, `user_id`, `topic_id`) VALUES
(259, 24, 47);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf32 COLLATE=utf32_romanian_ci AUTO_INCREMENT=62 ;

--
-- Salvarea datelor din tabel `mesaje`
--

INSERT INTO `mesaje` (`mesaj_id`, `expeditor_id`, `destinatar_id`, `subiect`, `mesaj`, `citit`, `viz_exp`, `viz_dest`, `data_mesajului`) VALUES
(54, 25, 24, 'salut', '', 1, 0, 0, '2015-08-01 20:27:16'),
(56, 26, 24, 'heyy', '', 1, 0, 0, '2015-08-01 20:27:48'),
(57, 27, 24, 'salve ', 'hello ?', 1, 0, 0, '2015-08-03 20:26:39'),
(59, 24, 25, 'admin2', '', 1, 0, 0, '2015-08-04 15:10:50'),
(60, 25, 26, 'salut', 'ce mai faci ?', 1, 0, 0, '2015-08-12 22:07:23'),
(61, 24, 27, '2', 'cam hello\r\n', 1, 0, 0, '2015-09-11 21:32:29');

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
  `content` varchar(100) COLLATE utf8_romanian_ci NOT NULL,
  `date_added` datetime NOT NULL,
  `topic` varchar(100) COLLATE utf8_romanian_ci NOT NULL,
  `author_id` int(50) NOT NULL,
  `flag` varchar(50) COLLATE utf8_romanian_ci NOT NULL,
  PRIMARY KEY (`reply_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_romanian_ci AUTO_INCREMENT=27 ;

--
-- Salvarea datelor din tabel `replies`
--

INSERT INTO `replies` (`reply_id`, `content`, `date_added`, `topic`, `author_id`, `flag`) VALUES
(11, 'afs', '2015-08-28 21:42:34', 'marked-as-duplicate-by-bytecode77-qiu-edchum-bardi', 24, ''),
(12, 'sdf', '2015-08-29 00:31:20', 'marked-as-duplicate-by-bytecode77-qiu-edchum-bardi', 24, ''),
(15, 'Minciuni !', '2015-09-08 19:24:24', 'report-error-print-page-forum-about-top-10-tutorials-html-tutorial-css-tutorial-javascript-tutorial-', 24, ''),
(16, 'ba nu', '2015-09-08 19:25:58', 'report-error-print-page-forum-about-top-10-tutorials-html-tutorial-css-tutorial-javascript-tutorial-', 24, ''),
(17, 'asd', '2015-09-08 19:57:04', 'report-error-print-page-forum-about-top-10-tutorials-html-tutorial-css-tutorial-javascript-tutorial-', 24, ''),
(18, 'asg', '2015-09-08 19:57:53', 'report-error-print-page-forum-about-top-10-tutorials-html-tutorial-css-tutorial-javascript-tutorial-', 24, ''),
(19, 'test', '2015-09-10 17:37:16', 'sdadsasaddsadsasaddsadsasdasdasdasdasdadsasdaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaasdadsas', 24, ''),
(26, 'mda', '2015-09-13 17:15:27', 'sdadsasaddsadsasaddsadsasdasdasdasdasdadsasdaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaasdadsas', 24, '');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `topics`
--

CREATE TABLE IF NOT EXISTS `topics` (
  `topic_id` int(50) NOT NULL AUTO_INCREMENT,
  `author_id` int(50) NOT NULL,
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_romanian_ci AUTO_INCREMENT=48 ;

--
-- Salvarea datelor din tabel `topics`
--

INSERT INTO `topics` (`topic_id`, `author_id`, `contents`, `categorie`, `date_added`, `topic_urlslug`, `occurances`, `flag`, `likes`, `dislikes`) VALUES
(27, 24, 'topic', 'Arta si Cultura ', '2015-08-29 21:49:51', 'topic', 6, '', 0, 0),
(28, 24, 'topic', 'Arta si Cultura ', '2015-08-29 21:50:15', 'topic-1', 1, '', 0, 0),
(30, 0, '', '', '0000-00-00 00:00:00', '', 1, '', 0, 0),
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
(45, 24, 'fg                f', 'Arta si Cultura ', '2015-09-08 19:14:50', 'fg-f', 0, '', 0, 0),
(46, 24, 'sa lu t     ', 'Arta si Cultura ', '2015-09-08 19:15:07', 'sa-lu-t', 0, '', 0, 0),
(47, 24, 'sdadsasaddsadsasaddsadsasdasdasdasdasdadsasdaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaasdadsasaddsadsasaddsadsasdasdasdasdasdadsasdaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaasdadsasaddsadsasaddsadsasdasdasdasdasdadsasdaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaasdadsasaddsadsasaddsadsasdasdasdasdasdadsasdaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaasdadsasaddsadsasaddsadsasdasdasdasdasdadsasdaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaasdadsasaddsadsasaddsadsasdasdasdasdasdadsasdaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaasdadsasaddsadsasaddsadsasdasdasdasdasdadsasdaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaasdadsasaddsadsasaddsadsasdasdasdasdasdadsasdaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaasdadsasaddsadsasaddsadsasdasdasdasdasdadsasdaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaasdadsasaddsadsasaddsadsasdasdasdasdasdadsasdaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaasdadsasaddsadsasaddsadsasdasdasdasdasdadsasdaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaasdadsasaddsadsasaddsadsasdasdasdasdasdadsasdaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaasdadsasaddsadsasaddsadsasdasdasdasdasdadsasdaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaasdadsasaddsadsasaddsadsasdasdasdasdasdadsasdaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaasdadsasaddsadsasaddsadsasdasdasdasdasdadsasdaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaasdadsasaddsadsasaddsadsasdasdasdasdasdadsasdaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaasdadsasaddsa', 'Arta si Cultura ', '2015-09-09 14:37:57', 'sdadsasaddsadsasaddsadsasdasdasdasdasdadsasdaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaasdadsas', 0, '', 1, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_romanian_ci AUTO_INCREMENT=32 ;

--
-- Salvarea datelor din tabel `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `image`, `date_registered`, `user_type`, `user_status`, `remember_token`, `updated_at`) VALUES
(24, 'admin', '$2y$10$HQm0ymBl9JWtWNw3gvO.BuDjYgPvVRgmXcsduaDsXToZAkaBQnuVW', 'bocsan_andrei@yahoo.com', 'images/descărcare.jpg', '2015-08-04 14:53:29', 'admin', '0', '', '2015-09-14 14:35:26'),
(25, 'admin2', '$2y$10$YpUAsmHXndknt4ZjDhj84eo3DihXt70tb1mw/E9mRrLU1xzLaeOY2', 'admin2@yahoo.com', 'images/sad.jpg', '31-07-2015 14:42:40', '', '0', '', '2015-09-09 16:50:54'),
(26, 'buyaka', '$2y$10$HKup2R.UV0uQt1kjCddTuu/0CjeN72IhcNrg0zc1QYa.uHhgAqPKu', 'buyaka@yahoo.com', '', '2015-08-01 00:25:54', '', '', '', '0000-00-00 00:00:00'),
(27, 'juya', '$2y$10$5DSOVoVrM0m/nrPR743Z4.6p8B61dz3v0xsmKtGToYzdYr5zZswsy', 'bocsan_andre@yahoo.com', '', '2015-08-01 16:51:37', '', '0', '', '0000-00-00 00:00:00'),
(29, 'username', '$2y$10$TJ4ZKXML/QJ8fT06g5qxEOTvoMEY8gFQSc8k7G85a2NMaJXjr/Tmi', 'user@yahoo.com', '', '2015-08-04 15:05:13', '', '', '', '0000-00-00 00:00:00'),
(30, 'admin3', '$2y$10$3zT6rjh4WGUtc8feE/dBCe6G.yFkzKnGTN5x8l6ZuHSJw5Kv1xtoa', 'admin3@yahoo.com', '', '2015-08-15 22:54:25', '', '', '', '0000-00-00 00:00:00'),
(31, 'admin9', '$2y$10$nk0u1y5fTfruu6HQiStoZuGmZ1A0DMUoJYkhKp79a.a4LBxn3aOg.', 'admin9@yahoo.com', '', '14-09-2015 18:28:31', '', '', NULL, '0000-00-00 00:00:00');

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
  PRIMARY KEY (`users_data_id`),
  KEY `users_data_id` (`users_data_id`),
  KEY `users_data_id_2` (`users_data_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf32 COLLATE=utf32_romanian_ci AUTO_INCREMENT=26 ;

--
-- Salvarea datelor din tabel `users_data`
--

INSERT INTO `users_data` (`users_data_id`, `nume`, `prenume`, `adresa`, `localitate`, `sexul`, `ziua`, `luna`, `anul`) VALUES
(24, 'Bocsan', 'Andrei', 'Str ... ', 'Galati', 'Masculin', 15, 1, 1998),
(25, 'fd', 'sdfxssd', 'sdf', '', '', 0, 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
