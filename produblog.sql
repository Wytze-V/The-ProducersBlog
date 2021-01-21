-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2021 at 01:21 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `idComment` int(11) NOT NULL,
  `idPost` int(11) NOT NULL,
  `idUsers` int(11) NOT NULL,
  `commentcontent` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `idPost` int(11) NOT NULL,
  `idUsers` int(11) NOT NULL,
  `postname` varchar(64) DEFAULT NULL,
  `postcontent` varchar(255) DEFAULT NULL,
  `File_ops` varchar(255) DEFAULT NULL,
  `datum` date DEFAULT NULL,
  `admin_post` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`idPost`, `idUsers`, `postname`, `postcontent`, `File_ops`, `datum`, `admin_post`) VALUES
(1, 11, 'jaja', '<p>test123</p>', NULL, '2021-01-05', NULL),
(2, 11, 'nieuw2', '<p><strong>ja</strong></p>', NULL, '2021-01-05', NULL),
(3, 11, 'testuser', '<p>testid</p>', NULL, '2021-01-06', NULL),
(4, 11, 'test2', '<p>testuserid</p>', NULL, '2021-01-06', NULL),
(5, 12, 'produtestid', '<p>test</p>', NULL, '2021-01-06', NULL),
(6, 11, 'testpostaction', '<p>testdiebende</p>', NULL, '2021-01-12', NULL),
(7, 11, 'testzonder edit', 'test', NULL, '2021-01-13', NULL),
(8, 12, 'test12345', 'testpost1234', NULL, '2021-01-14', NULL),
(9, 19, 'Hello world', 'Itpsum Lorum', NULL, '2021-01-14', NULL),
(10, 19, 'I\'m making music!', 'Hello, I am making music! I hope I get to make more of it soon!', NULL, '2021-01-15', NULL),
(11, 19, 'Programming and music: Possable?', 'Is there a way to mix together programming and music? I really hope so!', NULL, '2021-01-15', NULL),
(12, 19, 'We should make more genres!', 'Like electropunk or somthing?', NULL, '2021-01-15', NULL),
(13, 19, 'A harmonic analysis of the Silent Night', 'This old christian classic has many secrets from a composing perspective.', NULL, '2021-01-15', NULL),
(14, 19, 'Will the music blog send me to the post view page?', 'I really hope so', NULL, '2021-01-15', NULL),
(15, 19, 'Is Ipsum Lorum the new hit genre?', 'Content', NULL, '2021-01-15', NULL),
(16, 19, 'This is a post', 'So it is', NULL, '2021-01-18', NULL),
(17, 19, 'Testpost', 'Deze post is opgeslagen', NULL, '2021-01-18', NULL),
(18, 8, 'What happens if I try to post this as a site article?', 'Will the button below work and show up in the database?', NULL, '2021-01-20', NULL),
(19, 8, 'pls dont spaghetti', 'no spaghet', NULL, '2021-01-20', NULL),
(20, 8, 'Just checking values', 'As always, same as it ever was with these things', NULL, '2021-01-20', NULL),
(21, 8, 'Are ye bork now, son?', 'well?', NULL, '2021-01-21', 1),
(22, 8, 'Ok let\'s see if this REALLY works', 'let\'s hope so!', NULL, '2021-01-21', 1),
(23, 8, 'ok so let\'s really break this shit', 'by not clicking the button', NULL, '2021-01-21', NULL),
(24, 8, 'Ok this really works tho right?', 'uh I hope so', NULL, '2021-01-21', NULL),
(25, 19, 'I can\'t see the button! What does this mean?', 'I hope it still works!', NULL, '2021-01-21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `idUsers` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `usertype` varchar(32) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`idUsers`, `username`, `password`, `usertype`, `email`, `date`) VALUES
(3, 'test1234producer', '$2y$10$VHleGLeZ1CxBj2D7p5kFF.Js9kdtY1NVToVJs3D/bca3HrLQjuwOi', 'producer', 'test1234@hotmail.com', '2021-01-15'),
(4, 'wytze', '$2y$10$zpJFTlPg2/doubgO4Ryz6.n7sEzdRGXqgp3Vr7ArsNVFxP.6I.dHy', 'gebruiker', 'wytze@ehshs.com', '2021-01-13'),
(6, 'robin', '$2y$10$q6mlo2pxPKBoVTIaGhjdTejn8CmQWwUKjl8yzO5JzKpJDZ/vBtnLa', 'admin', 'me@school.nl', '2021-01-13'),
(7, 'testkees1', '$2y$10$nGjzDYkLd3ZmpizwSY5/xueTf24xS26aQkvAshkp9MLYct2.hxqGi', 'producer', 'test@test.nl', '2021-01-18'),
(8, 'admin', '$2y$10$f6E7ZzHPn8JppMKEbu6m..MuFG1FH50TPKu74ZoSnaXBLjA0R3UDS', 'admin', 'admin@hotmail.com', '2021-01-14'),
(9, 'tester123Admin', '$2y$10$GESQq82rx9HScVBMGTbkCOsrhB3Qt89n8gtRqua/GkV7FC43yrXVO', 'admin', 'tester123@hotmail.com', '2021-01-15'),
(11, 'robinprodu', '$2y$10$WmusLxKvj5EWMDHWpp.LruklqSEQ0RwjCTVlbEvRVdoj4QxQaTfFG', 'producer', 'jaja@hotmail.com', '2021-01-13'),
(12, 'producer', '$2y$10$J/jqiPOsjOVubgatgzHhTOXlKCGJ2P8mnrw/wWS1KpO.loX5h51vi', 'producer', 'producer@hotmail.com', '2021-01-13'),
(13, 'tester123', '$2y$10$MN3NXgf2djKE1SmJVgKRAuvOaWCUo9UMMwF/VchXGGddoUgiwgxKS', 'gebruiker', 'test123@gmail.com', '2021-01-13'),
(16, 'testfunctie4', '$2y$10$CNQxIi8cFB8bLIm84xwNIOMCr8u8UyyBCtZjEcE3ySJMZuWCJkj6W', 'gebruiker', 'testfunctie4@hotmail.com', '2021-01-13'),
(17, 'testdatum', '$2y$10$KqkO9.SSRUKinrlaHetOaurdHa3LPuODBt5HU3aHaXZAFacK0tdDm', 'gebruiker', 'testdatum@gmail.com', '2021-01-13'),
(18, 'testdatum2', '$2y$10$.AAQwyyTqMllwNfkQvdHeOcTEdJardqx1rmbHwKMQ1rpeLyeT5eBG', 'gebruiker', 'testdatum2@hotmail.com', '2021-01-13'),
(19, 'Wytzeproducer', '$2y$10$MCA2hYE7lICVaDUzRagWqeyDQIfNYqP4j2bo4GAtxUrnXonWHs1BS', 'producer', 'Wytzeprodu@gmail.com', '2021-01-18'),
(20, 'Robby', '$2y$10$CZmDRJ16RoNq3a.HKm9hz.fYYfpJSyfaUe6EpAi7otDjJ6wUnHgzm', 'gebruiker', 'Robby@gmail.com', '2021-01-18'),
(21, 'Hans', '$2y$10$oqkZ6nSF4H6YabqZ7Hp4R.EXcAKzbTon2DZGRzFsxwGJWh1QDfwa2', 'gebruiker', 'Hans@gmail.com', '2021-01-18'),
(22, 'GewoonWytze', '$2y$10$JN5e8RiySs2A/Jdkp/Ji4eckayTgC62vM7y2f8xBmf2pF1e2TkKkK', 'gebruiker', 'Gewoon@gmail', '2021-01-19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`idComment`) USING BTREE,
  ADD KEY `idPost` (`idPost`),
  ADD KEY `idUsers` (`idUsers`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`idPost`) USING BTREE,
  ADD KEY `idUsers` (`idUsers`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUsers`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `idComment` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `idPost` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `idUsers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`idPost`) REFERENCES `post` (`idPost`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`idUsers`) REFERENCES `users` (`idUsers`);

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`idUsers`) REFERENCES `users` (`idUsers`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
