-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 25 Aug 2015 la 18:15
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf32 COLLATE=utf32_romanian_ci AUTO_INCREMENT=61 ;

--
-- Salvarea datelor din tabel `mesaje`
--

INSERT INTO `mesaje` (`mesaj_id`, `expeditor_id`, `destinatar_id`, `subiect`, `mesaj`, `citit`, `viz_exp`, `viz_dest`, `data_mesajului`) VALUES
(54, 25, 24, 'salut', '', 0, 0, 0, '2015-08-01 20:27:16'),
(56, 26, 24, 'heyy', '', 0, 0, 0, '2015-08-01 20:27:48'),
(57, 27, 24, 'salve ', 'hello ?', 0, 0, 0, '2015-08-03 20:26:39'),
(59, 24, 25, 'admin2', '', 1, 0, 0, '2015-08-04 15:10:50'),
(60, 25, 26, 'salut', 'ce mai faci ?', 1, 0, 0, '2015-08-12 22:07:23');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `passwordrecovery`
--

CREATE TABLE IF NOT EXISTS `passwordrecovery` (
  `recovery_id` int(20) NOT NULL AUTO_INCREMENT,
  `user_id` int(20) NOT NULL,
  `hash` varchar(100) COLLATE utf32_romanian_ci NOT NULL,
  PRIMARY KEY (`recovery_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf32 COLLATE=utf32_romanian_ci AUTO_INCREMENT=14 ;

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
(13, 24, 'jkRJhYPrvIGU3DgCyXELl9qWMO2wKe');

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
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username_2` (`username`),
  KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_romanian_ci AUTO_INCREMENT=31 ;

--
-- Salvarea datelor din tabel `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `image`, `date_registered`, `user_type`, `user_status`) VALUES
(24, 'admin', '$2y$10$qLKPZhJ0uWbLUfUsGEe9W.goVdUAB93bPAluRsvrNakQV.90vgSXG', 'bocsan_andrei@yahoo.com', 'images/descărcare.jpg', '2015-08-04 14:53:29', '', ''),
(25, 'admin2', '$2y$10$YpUAsmHXndknt4ZjDhj84eo3DihXt70tb1mw/E9mRrLU1xzLaeOY2', 'admin2@yahoo.com', 'images/sad.jpg', '31-07-2015 14:42:40', '', ''),
(26, 'buyaka', '$2y$10$HKup2R.UV0uQt1kjCddTuu/0CjeN72IhcNrg0zc1QYa.uHhgAqPKu', 'buyaka@yahoo.com', '', '2015-08-01 00:25:54', '', ''),
(27, 'juya', '$2y$10$PnjMzoWTBoDrLSz9wbuyFuinObuJD1pHqQE5F1qx0OauY7W8/bfK2', 'juyaya@yahoo.com', '', '2015-08-01 16:51:37', '', ''),
(29, 'username', '$2y$10$TJ4ZKXML/QJ8fT06g5qxEOTvoMEY8gFQSc8k7G85a2NMaJXjr/Tmi', 'user@yahoo.com', '', '2015-08-04 15:05:13', '', ''),
(30, 'admin3', '$2y$10$3zT6rjh4WGUtc8feE/dBCe6G.yFkzKnGTN5x8l6ZuHSJw5Kv1xtoa', 'admin3@yahoo.com', '', '2015-08-15 22:54:25', '', '');

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
