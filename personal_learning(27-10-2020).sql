-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 27, 2020 at 08:23 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `personal_learning_2`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `Id` int(11) NOT NULL,
  `Title` varchar(60) NOT NULL,
  `Picture` varchar(255) NOT NULL,
  `Contant` text NOT NULL,
  `Prix` int(11) NOT NULL,
  `Id_category` int(11) NOT NULL,
  `Id_sub_category` int(11) NOT NULL,
  `Id_formation` int(11) NOT NULL,
  `Id_niveau` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`Id`, `Title`, `Picture`, `Contant`, `Prix`, `Id_category`, `Id_sub_category`, `Id_formation`, `Id_niveau`) VALUES
(1, 'Un simple exemple', 'Image01', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce finibus eros vitae metus ultrices fringilla. Duis tristique ante nec ante semper volutpat. Donec mollis tortor ornare justo consectetur volutpat. In aliquam aliquam ligula, vitae condimentum ante ornare vel. Vestibulum tincidunt blandit venenatis. Sed mauris mi, facilisis ultrices urna eu, lacinia laoreet dui. Nunc nec elit vel ante commodo aliquet sagittis ut est.\r\n\r\nFusce a lectus consectetur, gravida leo et, commodo magna. Aenean tristique velit sit amet velit malesuada rhoncus id non augue. Vestibulum vitae facilisis leo. Sed sodales vehicula laoreet. Quisque et consequat felis, et feugiat tellus. Sed sed gravida leo. Praesent efficitur leo in elit dignissim, sed rhoncus leo consectetur. Praesent id faucibus erat. Phasellus nisl enim, aliquet eget vulputate a, cursus quis velit. Proin mattis at urna eget euismod. Aliquam fringilla tempor velit nec efficitur. Mauris facilisis metus eget maximus maximus.\r\n\r\nQuisque quis bibendum risus, id porta velit. Sed bibendum aliquam neque at vulputate. Nulla in quam scelerisque, scelerisque diam convallis, euismod elit. Proin posuere lorem justo, non gravida diam mattis sed. Nulla facilisi. Curabitur ac ante id dui feugiat lacinia. Maecenas ac posuere est. Mauris efficitur, lectus vitae mattis varius, lacus ex congue quam, at feugiat diam massa a elit. Quisque hendrerit egestas sollicitudin. Ut molestie consectetur nulla eget lobortis.\r\n\r\nVivamus suscipit arcu vitae libero commodo, vitae ultricies justo fringilla. Ut ultrices neque ut arcu semper, non aliquam arcu tempus. Mauris rhoncus volutpat erat vel consectetur. Duis fringilla tincidunt fringilla. Mauris consectetur purus non elit vulputate luctus. Nulla eget egestas nulla. Aenean libero urna, tincidunt eget nibh in, euismod eleifend urna. Vivamus est nibh, tempor convallis est eu, eleifend pretium neque. Morbi malesuada, erat ac congue luctus, justo elit sodales quam, hendrerit tincidunt felis sem ut ante. Proin eu lacinia dolor, id imperdiet ante. Sed nec molestie massa, sed tristique erat. In hac habitasse platea dictumst. Nunc rutrum massa sit amet justo interdum aliquam. Suspendisse bibendum nisl sit amet neque laoreet, et rutrum nisl ultrices. Aenean vulputate placerat mauris sit amet molestie. Aenean sit amet augue non quam fringilla mattis. ', 10, 3, 4, 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `Id` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`Id`, `Name`) VALUES
(1, 'Mathématique'),
(2, 'Physique appliquée'),
(3, 'Biologie'),
(4, 'Mécanique');

-- --------------------------------------------------------

--
-- Table structure for table `formations`
--

CREATE TABLE `formations` (
  `Id_formation` int(11) NOT NULL,
  `Formation_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `formations`
--

INSERT INTO `formations` (`Id_formation`, `Formation_name`) VALUES
(1, 'Initiale'),
(2, 'Continue');

-- --------------------------------------------------------

--
-- Table structure for table `niveaux`
--

CREATE TABLE `niveaux` (
  `Id_niveau` int(11) NOT NULL,
  `Niveau_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `niveaux`
--

INSERT INTO `niveaux` (`Id_niveau`, `Niveau_name`) VALUES
(1, 'Elémentaire'),
(2, 'Secondaire'),
(3, 'CAP/BEP (niveau 3)'),
(4, 'Bac (niveau 4)'),
(5, 'Bac+2 (niveau 5)'),
(6, 'Bac+3/4 (niveau 6)'),
(7, 'Licence pro (niveau 6)'),
(8, 'Bac+5 (niveau 7)'),
(9, 'Bac+8 (niveau 8)');

-- --------------------------------------------------------

--
-- Table structure for table `statuts`
--

CREATE TABLE `statuts` (
  `Id_statut` int(11) NOT NULL,
  `Statut_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `statuts`
--

INSERT INTO `statuts` (`Id_statut`, `Statut_name`) VALUES
(1, 'Elève'),
(2, 'Formateur'),
(3, 'Apprenant'),
(4, 'Professeur');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `Id` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`Id`, `Name`) VALUES
(1, 'Arithmétique'),
(2, 'Géométrie'),
(3, 'Génétique'),
(4, 'Bio-mécanique');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `Id_type` int(11) NOT NULL,
  `Type_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`Id_type`, `Type_name`) VALUES
(1, 'administrator'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Id` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Firstname` varchar(30) NOT NULL,
  `Email` varchar(60) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Phone` int(15) NOT NULL,
  `Code` int(30) NOT NULL,
  `Id_statut` int(11) NOT NULL,
  `Id_formation` int(11) NOT NULL,
  `Id_niveau` int(11) NOT NULL,
  `Id_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Id`, `Name`, `Firstname`, `Email`, `Password`, `Phone`, `Code`, `Id_statut`, `Id_formation`, `Id_niveau`, `Id_type`) VALUES
(1, 'Bonansea', 'Thomas', 'admin', '$2y$12$I0hbITxcFmX4Qp9o7/18SuoC6tnGN7DbtbwqufTmGmQ.hYN49U1j6', 0, 0, 2, 2, 9, 1),
(2, 'Neige', 'Jean', 'azerty@666', '$2y$12$O6zrPqzLEcGPq3aTH3Rrf.iVk7jBJ1NmJ39DgUJjh3iyKbd.qXPYm', 6, 1, 4, 2, 9, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Id_formation` (`Id_formation`),
  ADD KEY `Id_niveau` (`Id_niveau`),
  ADD KEY `Id_sub_category` (`Id_sub_category`),
  ADD KEY `Id_category` (`Id_category`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `formations`
--
ALTER TABLE `formations`
  ADD PRIMARY KEY (`Id_formation`);

--
-- Indexes for table `niveaux`
--
ALTER TABLE `niveaux`
  ADD PRIMARY KEY (`Id_niveau`);

--
-- Indexes for table `statuts`
--
ALTER TABLE `statuts`
  ADD PRIMARY KEY (`Id_statut`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`Id_type`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `users_ibfk_1` (`Id_statut`),
  ADD KEY `users_ibfk_2` (`Id_formation`),
  ADD KEY `users_ibfk_3` (`Id_niveau`),
  ADD KEY `users_ibfk_4` (`Id_type`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `formations`
--
ALTER TABLE `formations`
  MODIFY `Id_formation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `niveaux`
--
ALTER TABLE `niveaux`
  MODIFY `Id_niveau` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `statuts`
--
ALTER TABLE `statuts`
  MODIFY `Id_statut` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `Id_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`Id_formation`) REFERENCES `formations` (`Id_formation`),
  ADD CONSTRAINT `articles_ibfk_2` FOREIGN KEY (`Id_niveau`) REFERENCES `niveaux` (`Id_niveau`),
  ADD CONSTRAINT `articles_ibfk_3` FOREIGN KEY (`Id_category`) REFERENCES `categories` (`Id`),
  ADD CONSTRAINT `articles_ibfk_4` FOREIGN KEY (`Id_sub_category`) REFERENCES `sub_categories` (`Id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`Id_statut`) REFERENCES `statuts` (`Id_statut`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`Id_formation`) REFERENCES `formations` (`Id_formation`),
  ADD CONSTRAINT `users_ibfk_3` FOREIGN KEY (`Id_niveau`) REFERENCES `niveaux` (`Id_niveau`),
  ADD CONSTRAINT `users_ibfk_4` FOREIGN KEY (`Id_type`) REFERENCES `types` (`Id_type`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
