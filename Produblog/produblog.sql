-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 06 jan 2021 om 11:32
-- Serverversie: 10.4.14-MariaDB
-- PHP-versie: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `produblog`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `comment`
--

CREATE TABLE `comment` (
  `idComment` int(11) NOT NULL,
  `commentcontent` varchar(255) DEFAULT NULL,
  `Users_idUsers` int(11) NOT NULL,
  `Post_idPost` int(11) NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `post`
--

CREATE TABLE `post` (
  `idPost` int(11) NOT NULL,
  `idUsers` int(11) NOT NULL,
  `postname` varchar(64) DEFAULT NULL,
  `postcontent` varchar(255) DEFAULT NULL,
  `File_ops` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `post`
--

INSERT INTO `post` (`idPost`, `idUsers`, `postname`, `postcontent`, `File_ops`, `date`) VALUES
(1, 11, 'jaja', '<p>test123</p>', NULL, '2021-01-05'),
(2, 11, 'nieuw2', '<p><strong>ja</strong></p>', NULL, '2021-01-05'),
(3, 11, 'testuser', '<p>testid</p>', NULL, '2021-01-06'),
(4, 11, 'test2', '<p>testuserid</p>', NULL, '2021-01-06'),
(5, 12, 'produtestid', '<p>test</p>', NULL, '2021-01-06');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `idUsers` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `usertype` varchar(32) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`idUsers`, `username`, `password`, `usertype`, `email`) VALUES
(3, 'test1234', '$2y$10$VHleGLeZ1CxBj2D7p5kFF.Js9kdtY1NVToVJs3D/bca3HrLQjuwOi', 'gebruiker', 'test1234@hotmail.com'),
(4, 'wytze', '$2y$10$zpJFTlPg2/doubgO4Ryz6.n7sEzdRGXqgp3Vr7ArsNVFxP.6I.dHy', 'gebruiker', 'wytze@ehshs.com'),
(6, 'robin', '$2y$10$q6mlo2pxPKBoVTIaGhjdTejn8CmQWwUKjl8yzO5JzKpJDZ/vBtnLa', 'admin', 'me@school.nl'),
(7, 'testkees', '$2y$10$nGjzDYkLd3ZmpizwSY5/xueTf24xS26aQkvAshkp9MLYct2.hxqGi', 'gebruiker', 'test@test.nl'),
(8, 'admin', '$2y$10$f6E7ZzHPn8JppMKEbu6m..MuFG1FH50TPKu74ZoSnaXBLjA0R3UDS', 'admin', 'admin123@hotmail.com'),
(9, 'tester123', '$2y$10$GESQq82rx9HScVBMGTbkCOsrhB3Qt89n8gtRqua/GkV7FC43yrXVO', 'gebruiker', 'tester123@hotmail.com'),
(11, 'robinprodu', '$2y$10$WmusLxKvj5EWMDHWpp.LruklqSEQ0RwjCTVlbEvRVdoj4QxQaTfFG', 'producer', 'jaja@hotmail.com'),
(12, 'producer', '$2y$10$J/jqiPOsjOVubgatgzHhTOXlKCGJ2P8mnrw/wWS1KpO.loX5h51vi', 'producer', 'producer@hotmail.com');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`idComment`,`Users_idUsers`,`Post_idPost`);

--
-- Indexen voor tabel `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`idPost`) USING BTREE,
  ADD KEY `idUsers` (`idUsers`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUsers`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `comment`
--
ALTER TABLE `comment`
  MODIFY `idComment` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `post`
--
ALTER TABLE `post`
  MODIFY `idPost` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `idUsers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`idUsers`) REFERENCES `users` (`idUsers`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;