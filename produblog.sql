-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2021 at 02:37 PM
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
  `username` varchar(255) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `datum` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`idComment`, `idPost`, `idUsers`, `username`, `comment`, `datum`) VALUES
(1, 1, 20, 'test123', 'Very good post', '2021-01-20'),
(3, 1, 20, 'test123', 'css is niet goed', '2021-01-22'),
(5, 1, 20, 'test123', 'Test case 3', '2021-01-25'),
(6, 5, 20, 'test123', 'top gedaan', '2021-01-25'),
(7, 20, 8, 'admin', 'werelds', '2021-01-26'),
(8, 21, 8, 'admin', 'geweldig', '2021-01-26'),
(9, 26, 25, 'SlimSyndieNL', 'Hoi! We speak more Dutch on this site then English, but we\'d be glad to help! This sounds like a \"gated reverb\". The rever has a gate after it to cut off the quiter part', '2021-01-27'),
(10, 32, 24, 'JackStartoff', 'Oh! That\'s how you do it! Thanks!', '2021-01-27');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `idPost` int(11) NOT NULL,
  `idUsers` int(11) NOT NULL,
  `postname` varchar(64) DEFAULT NULL,
  `postcontent` longtext NOT NULL,
  `file_ops` varchar(255) DEFAULT NULL,
  `datum` date DEFAULT NULL,
  `admin_post` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`idPost`, `idUsers`, `postname`, `postcontent`, `file_ops`, `datum`, `admin_post`) VALUES
(1, 11, 'jaja', 'test123', NULL, '2021-01-05', NULL),
(3, 11, 'testuser', '<p>testid</p>', NULL, '2021-01-06', NULL),
(4, 11, 'test2', '<p>testuserid</p>', NULL, '2021-01-06', NULL),
(5, 12, 'produtestid', '<p>test</p>', NULL, '2021-01-06', NULL),
(6, 11, 'testpostaction', '<p>testdiebende</p>', NULL, '2021-01-12', NULL),
(7, 11, 'testzonder edit', 'test', NULL, '2021-01-13', NULL),
(8, 12, 'test12345', 'testpost1234', NULL, '2021-01-14', NULL),
(12, 11, 'testrobin123', 'testgeenbutton', NULL, '2021-01-21', NULL),
(13, 11, 'testgeenadmin', 'testpost', NULL, '2021-01-21', NULL),
(15, 11, 'test juiste pagina', 'testtest is nu bijgewerkt', NULL, '2021-01-22', NULL),
(20, 8, 'Nu nog betere muziek dan net!', 'Een site die kan producers helpen met muziek productie? Dat kan eidereen, maar een socialle media site specifiek gericht voor producers? Dat hebben wij (nog) niet, en dat is wat wij nu brengen! Een slim, simpel platform om muziek kennis te leren en te delen. Produblog, gescrijven door en voor muzikanten en producers.', NULL, '2021-01-26', 1),
(21, 8, 'Binnekort: Site launch!', 'Wij zijn er bijna! ', NULL, '2021-01-26', 1),
(22, 11, 'test lange tekst', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui.\r\n\r\nEtiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc, quis gravida magna mi a libero. Fusce vulputate eleifend sapien. Vestibulum purus quam, scelerisque ut, mollis sed, nonummy id, metus. Nullam accumsan lorem in dui. Cras ultricies mi eu turpis hendrerit fringilla. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; In ac dui quis mi consectetuer lacinia.\r\n\r\nNam pretium turpis et arcu. Duis arcu tortor, suscipit eget, imperdiet nec, imperdiet iaculis, ipsum. Sed aliquam ultrices mauris. Integer ante arcu, accumsan a, consectetuer eget, posuere ut, mauris. Praesent adipiscing. Phasellus ullamcorper ipsum rutrum nunc. Nunc nonummy metus. Vestibulum volutpat pretium libero. Cras id dui. Aenean ut eros et nisl sagittis vestibulum. Nullam nulla eros, ultricies sit amet, nonummy id, imperdiet feugiat, pede. Sed lectus. Donec mollis hendrerit risus. Phasellus nec sem in justo pellentesque facilisis. Etiam imperdiet imperdiet orci. Nunc nec neque. Phasellus leo dolor, tempus non, auctor et, hendrerit quis, nisi.\r\n\r\nCurabitur ligula sapien, tincidunt non, euismod vitae, posuere imperdiet, leo. Maecenas malesuada. Praesent congue erat at massa. Sed cursus turpis vitae tortor. Donec posuere vulputate arcu. Phasellus accumsan cursus velit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Sed aliquam, nisi quis porttitor congue, elit erat euismod orci, ac placerat dolor lectus quis orci. Phasellus consectetuer vestibulum elit. Aenean tellus metus, bibendum sed, posuere ac, mattis non, nunc. Vestibulum fringilla pede sit amet augue. In turpis. Pellentesque posuere. Praesent turpis.', NULL, '2021-01-26', NULL),
(23, 12, 'testen van teksten', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui.\r\n\r\nEtiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc, quis gravida magna mi a libero. Fusce vulputate eleifend sapien. Vestibulum purus quam, scelerisque ut, mollis sed, nonummy id, metus. Nullam accumsan lorem in dui. Cras ultricies mi eu turpis hendrerit fringilla. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; In ac dui quis mi consectetuer lacinia.\r\n\r\nNam pretium turpis et arcu. Duis arcu tortor, suscipit eget, imperdiet nec, imperdiet iaculis, ipsum. Sed aliquam ultrices mauris. Integer ante arcu, accumsan a, consectetuer eget, posuere ut, mauris. Praesent adipiscing. Phasellus ullamcorper ipsum rutrum nunc. Nunc nonummy metus. Vestibulum volutpat pretium libero. Cras id dui. Aenean ut eros et nisl sagittis vestibulum. Nullam nulla eros, ultricies sit amet, nonummy id, imperdiet feugiat, pede. Sed lectus. Donec mollis hendrerit risus. Phasellus nec sem in justo pellentesque facilisis. Etiam imperdiet imperdiet orci. Nunc nec neque. Phasellus leo dolor, tempus non, auctor et, hendrerit quis, nisi.\r\n\r\nCurabitur ligula sapien, tincidunt non, euismod vitae, posuere imperdiet, leo. Maecenas malesuada. Praesent congue erat at massa. Sed cursus turpis vitae tortor. Donec posuere vulputate arcu. Phasellus accumsan cursus velit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Sed aliquam, nisi quis porttitor congue, elit erat euismod orci, ac placerat dolor lectus quis orci. Phasellus consectetuer vestibulum elit. Aenean tellus metus, bibendum sed, posuere ac, mattis non, nunc. Vestibulum fringilla pede sit amet augue. In turpis. Pellentesque posuere. Praesent turpis.', NULL, '2021-01-26', NULL),
(24, 8, 'Welcome op Produblog.com!', 'Produblog is een socialle blog site gericht op en voor muziek producers en mensen die zijn geinteresserd in muziekproductie! Wij doen ons best om gezelig, hulpbaare, en interesant discussies te voeren! Wij hopen dat u kan dit site goed gebruiken.\r\n', NULL, '2021-01-27', 1),
(25, 24, 'Introductory post!', 'Hello all. I\'m new not only to this site, but to producing at large generally. I\'m beggining to take my first few steps with producing and editing my own music. I hope I can show off some stuff later with what I made!', NULL, '2021-01-27', NULL),
(26, 24, 'How to get that drum sound?', 'How do I get that \"80\'s\" sounding drum sound? I\'ve been trying to puzzle out how to get the thick, poppy sound like I heard from this song when I was playing \"Sonic Before the Sequal\". It\'s a cool sound, and I know it uses reverb but how?', 'How-to-get-that-drum-sound', '2021-01-27', NULL),
(28, 25, 'Hallo, ik ben SlimSyndi', 'Hoi, ik ben een nederlands producer onder de naam SlimSyndi. Ik maak moderne DnB en Breakbeat tracks, zoals dit. Ik wil graag mijn kennis delen met jullie delen.', 'Hallo-ik-ben-SlimSyndi', '2021-01-27', NULL),
(32, 8, 'How to make that 80s gated reverb sound!', 'Without wishing to be too pedantic, strictly speaking, the classic gated reverb effect attributed to Phil Collins was actually created by Peter Gabriel some time earlier and, interestingly, quite by accident.\r\n\r\nThey were setting up a kit for recording, and there just happened to be some sends on the channels being used for the drum mics going to an AMS reverb — and the reverb\'s returns just happened to be patched into two channels that just happened to have some noise gates strapped across them! As the drums were being tuned and hit and miked up in the studio, listeners in the control room heard the fabulous sound of the reverb being abruptly cut short by the gates on the returns. Rather than \'fix\' this, Gabriel exploited it and it became a trademark sound on his third album, particularly on the opening track, \'Intruder\'.\r\n\r\nTo create that effect authentically, send the drums to a reverb with a medium room preset selected. Now route the output of that reverb through a stereo noise gate (or patch a stereo noise gate into the reverb\'s return channels) and set an instant attack and pretty much instant release. The gate\'s hold time can be adjusted to taste, but the threshold should be adjusted carefully to avoid any \'fluttering\' during the final part of the reverb tail. For more accurate triggering of the noise gate, take a feed from the drums into the gate\'s side-chain so that the percussive attack from the drums is used to trigger it, rather than the onset of the reverb alone.\r\n\r\n', NULL, '2021-01-27', 1),
(34, 8, 'Producer Spotlight: Patricia Taxxon', 'Een van de meest productief en ruimdenkende producer in het laatste paar maanden, Patricia heeft in 2020 alleen bijna een volle album per maand geproduced. Haar style is duidelijk wel simpel en direct, maar de is zeker een sterkte punt voor haar. \"Cilantro\" van \"Bit and Pix\" is een uitbundig en poppy nummer met invloed van rap tot complextro. Als dat niet in de smaak valt, dan heeft ze zeker iets in een andere style dat jij zou wel leuk vinden. Jij kan haar werk vinden op https://patriciataxxon.bandcamp.com/ .', 'Producer-Spotlight-Patricia-Taxxon', '2021-01-27', 1);

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
(3, 'test1234', '$2y$10$VHleGLeZ1CxBj2D7p5kFF.Js9kdtY1NVToVJs3D/bca3HrLQjuwOi', 'gebruiker', 'test1234@hotmail.com', '2021-01-13'),
(4, 'wytze', '$2y$10$zpJFTlPg2/doubgO4Ryz6.n7sEzdRGXqgp3Vr7ArsNVFxP.6I.dHy', 'gebruiker', 'wytze@ehshs.com', '2021-01-13'),
(6, 'robin', '$2y$10$q6mlo2pxPKBoVTIaGhjdTejn8CmQWwUKjl8yzO5JzKpJDZ/vBtnLa', 'admin', 'me@school.nl', '2021-01-13'),
(7, 'testkees', '$2y$10$nGjzDYkLd3ZmpizwSY5/xueTf24xS26aQkvAshkp9MLYct2.hxqGi', 'gebruiker', 'test@test.nl', '2021-01-14'),
(8, 'admin', '$2y$10$f6E7ZzHPn8JppMKEbu6m..MuFG1FH50TPKu74ZoSnaXBLjA0R3UDS', 'admin', 'admin@hotmail.com', '2021-01-14'),
(9, 'tester123', '$2y$10$GESQq82rx9HScVBMGTbkCOsrhB3Qt89n8gtRqua/GkV7FC43yrXVO', 'gebruiker', 'tester123@hotmail.com', '2021-01-13'),
(11, 'robinprodu', '$2y$10$WmusLxKvj5EWMDHWpp.LruklqSEQ0RwjCTVlbEvRVdoj4QxQaTfFG', 'producer', 'jaja@hotmail.com', '2021-01-13'),
(12, 'producer', '$2y$10$J/jqiPOsjOVubgatgzHhTOXlKCGJ2P8mnrw/wWS1KpO.loX5h51vi', 'gebruiker', 'producer@hotmail.com', '2021-01-27'),
(16, 'testfunctie4', '$2y$10$CNQxIi8cFB8bLIm84xwNIOMCr8u8UyyBCtZjEcE3ySJMZuWCJkj6W', 'gebruiker', 'testfunctie4@hotmail.com', '2021-01-13'),
(17, 'testdatum', '$2y$10$KqkO9.SSRUKinrlaHetOaurdHa3LPuODBt5HU3aHaXZAFacK0tdDm', 'gebruiker', 'testdatum@gmail.com', '2021-01-13'),
(19, 'gebruikerprodu', '$2y$10$19FmXC7jaII6vCmGkC851uQjcEAGEKmBE9hW9pvgE8xoDtVa/j5He', 'gebruiker', 'gebruikerprodu@hotmail.com', '2021-01-18'),
(20, 'test123', '$2y$10$cd1s.NM25660qD//LqS.OefuP9d08rbYCJgFloQd7vf3vZavRQ1Ee', 'gebruiker', 'test123@hotmail.com', '2021-01-18'),
(21, 'producer2', '$2y$10$bCcdv1sfTzwPzAHmgVWzMeSV2kxbDideoOBx37jR7a4Wn2K6WVXI6', 'gebruiker', 'producer2@hotmail.com', '2021-01-27'),
(22, 'producer3', '$2y$10$JNfSLE.JFVl.CrUFE/aSk.z9q38L1MosijkILHkwqh5ASbu735sKO', 'gebruiker', 'producer3@hotmail.com', '2021-01-27'),
(23, 'Wytzeproducer', '$2y$10$uIglO6mnwjaSUHpd6HriDOFu9CDlCe1qKfSO7dNU.FWebnU1qPzIe', 'producer', 'Wytzeg@gmail.com', '2021-01-27'),
(24, 'JackStartoff', '$2y$10$IDT..UpdjKbD4ZQzxp5AheEd27c0nimhgnKpEfeNJIcc4blJY2nL6', 'producer', 'Jack@gmail.com', '2021-01-27'),
(25, 'SlimSyndieNL', '$2y$10$IjDrLT/qUYoJCoDHdKIAsOYvLM6z2MOK4.0R579umr8VnRrPS1rQK', 'producer', 'SyndiCyndi@gmail.com', '2021-01-27'),
(26, 'verwijdergebruiker', '$2y$10$VwGr7M0NdsYlmNqOGenqQ.mguy1YSoo1VlxKwOkSJC.oACrkXg5Hy', 'gebruiker', 'verwijdergebruiker@hotmail.com', '2021-01-27'),
(28, 'patricia', '$2y$10$6SrzNfAdeag7N7cUc3PlR.wV2MiIbSJZErR4K4/OWhbPfSR0ebGIO', 'gebruiker', 'Patricia@hotmail.com', '2021-01-27');

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
  ADD PRIMARY KEY (`idUsers`),
  ADD UNIQUE KEY `UNIQUE` (`username`),
  ADD UNIQUE KEY `UNIQUEEMAIL` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `idComment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `idPost` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `idUsers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

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
