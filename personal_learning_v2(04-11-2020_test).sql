-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 04, 2020 at 12:21 PM
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
-- Database: `personal_learning`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `Id` int(11) NOT NULL,
  `Title` varchar(60) NOT NULL,
  `Picture` varchar(255) NOT NULL,
  `Content` text NOT NULL,
  `Date` varchar(11) NOT NULL,
  `Id_category` int(11) NOT NULL,
  `Id_sub_category` int(11) NOT NULL,
  `Id_formation` int(11) NOT NULL,
  `Id_niveau` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`Id`, `Title`, `Picture`, `Content`, `Date`, `Id_category`, `Id_sub_category`, `Id_formation`, `Id_niveau`) VALUES
(1, 'Espace', 'espace(5)', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce finibus eros vitae metus ultrices fringilla. Duis tristique ante nec ante semper volutpat. Donec mollis tortor ornare justo consectetur volutpat. In aliquam aliquam ligula, vitae condimentum ante ornare vel. Vestibulum tincidunt blandit venenatis. Sed mauris mi, facilisis ultrices urna eu, lacinia laoreet dui. Nunc nec elit vel ante commodo aliquet sagittis ut est.\r\n\r\nFusce a lectus consectetur, gravida leo et, commodo magna. Aenean tristique velit sit amet velit malesuada rhoncus id non augue. Vestibulum vitae facilisis leo. Sed sodales vehicula laoreet. Quisque et consequat felis, et feugiat tellus. Sed sed gravida leo. Praesent efficitur leo in elit dignissim, sed rhoncus leo consectetur. Praesent id faucibus erat. Phasellus nisl enim, aliquet eget vulputate a, cursus quis velit. Proin mattis at urna eget euismod. Aliquam fringilla tempor velit nec efficitur. Mauris facilisis metus eget maximus maximus.\r\n\r\nQuisque quis bibendum risus, id porta velit. Sed bibendum aliquam neque at vulputate. Nulla in quam scelerisque, scelerisque diam convallis, euismod elit. Proin posuere lorem justo, non gravida diam mattis sed. Nulla facilisi. Curabitur ac ante id dui feugiat lacinia. Maecenas ac posuere est. Mauris efficitur, lectus vitae mattis varius, lacus ex congue quam, at feugiat diam massa a elit. Quisque hendrerit egestas sollicitudin. Ut molestie consectetur nulla eget lobortis.\r\n\r\nVivamus suscipit arcu vitae libero commodo, vitae ultricies justo fringilla. Ut ultrices neque ut arcu semper, non aliquam arcu tempus. Mauris rhoncus volutpat erat vel consectetur. Duis fringilla tincidunt fringilla. Mauris consectetur purus non elit vulputate luctus. Nulla eget egestas nulla. Aenean libero urna, tincidunt eget nibh in, euismod eleifend urna. Vivamus est nibh, tempor convallis est eu, eleifend pretium neque. Morbi malesuada, erat ac congue luctus, justo elit sodales quam, hendrerit tincidunt felis sem ut ante. Proin eu lacinia dolor, id imperdiet ante. Sed nec molestie massa, sed tristique erat. In hac habitasse platea dictumst. Nunc rutrum massa sit amet justo interdum aliquam. Suspendisse bibendum nisl sit amet neque laoreet, et rutrum nisl ultrices. Aenean vulputate placerat mauris sit amet molestie. Aenean sit amet augue non quam fringilla mattis. ', '10/10/2000', 3, 4, 2, 5),
(20, 'Volumineux mais pas gros', 'cameleon(1)', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque eleifend, felis et semper fringilla, dolor metus sodales odio, eu ultricies sapien leo et sem. Praesent rhoncus ante tellus, at porttitor nibh tincidunt facilisis. In molestie pretium dolor non rutrum. Praesent quis turpis mauris. Morbi dignissim suscipit dolor et ullamcorper. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Curabitur quis eros vel ipsum vulputate blandit. Sed eget orci condimentum, tristique urna sit amet, malesuada est. Cras pellentesque velit sed ullamcorper bibendum. Nam porta at nunc at vehicula. Pellentesque habitant morbi tristique senectus et netus et malesuada.', '14/10/2020', 4, 2, 2, 4),
(21, 'Lent mais agile !', 'cameleon(2)', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque eleifend, felis et semper fringilla, dolor metus sodales odio, eu ultricies sapien leo et sem. Praesent rhoncus ante tellus, at porttitor nibh tincidunt facilisis. In molestie pretium dolor non rutrum. Praesent quis turpis mauris. Morbi dignissim suscipit dolor et ullamcorper. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Curabitur quis eros vel ipsum vulputate blandit. Sed eget orci condimentum, tristique urna sit amet, malesuada est. Cras pellentesque velit sed ullamcorper bibendum. Nam porta at nunc at vehicula. Pellentesque habitant morbi tristique senectus et netus et malesuada.', '09/04/1999', 2, 1, 1, 8),
(22, 'Sans angles morts et indépendants', 'cameleon(3)', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque eleifend, felis et semper fringilla, dolor metus sodales odio, eu ultricies sapien leo et sem. Praesent rhoncus ante tellus, at porttitor nibh tincidunt facilisis. In molestie pretium dolor non rutrum. Praesent quis turpis mauris. Morbi dignissim suscipit dolor et ullamcorper. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Curabitur quis eros vel ipsum vulputate blandit. Sed eget orci condimentum, tristique urna sit amet, malesuada est. Cras pellentesque velit sed ullamcorper bibendum. Nam porta at nunc at vehicula. Pellentesque habitant morbi tristique senectus et netus et malesuada.', '58', 2, 4, 1, 3),
(23, 'Les préjugés sur les vieilles branches', 'cameleon(4)', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque eleifend, felis et semper fringilla, dolor metus sodales odio, eu ultricies sapien leo et sem. Praesent rhoncus ante tellus, at porttitor nibh tincidunt facilisis. In molestie pretium dolor non rutrum. Praesent quis turpis mauris. Morbi dignissim suscipit dolor et ullamcorper. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Curabitur quis eros vel ipsum vulputate blandit. Sed eget orci condimentum, tristique urna sit amet, malesuada est. Cras pellentesque velit sed ullamcorper bibendum. Nam porta at nunc at vehicula. Pellentesque habitant morbi tristique senectus et netus et malesuada.', '45', 3, 1, 1, 7),
(24, 'Cosmos', 'espace(7)', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque eleifend, felis et semper fringilla, dolor metus sodales odio, eu ultricies sapien leo et sem. Praesent rhoncus ante tellus, at porttitor nibh tincidunt facilisis. In molestie pretium dolor non rutrum. Praesent quis turpis mauris. Morbi dignissim suscipit dolor et ullamcorper. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Curabitur quis eros vel ipsum vulputate blandit. Sed eget orci condimentum, tristique urna sit amet, malesuada est. Cras pellentesque velit sed ullamcorper bibendum. Nam porta at nunc at vehicula. Pellentesque habitant morbi tristique senectus et netus et malesuada.', '32', 2, 3, 1, 2),
(25, 'Abysse', 'espace(3)', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque eleifend, felis et semper fringilla, dolor metus sodales odio, eu ultricies sapien leo et sem. Praesent rhoncus ante tellus, at porttitor nibh tincidunt facilisis. In molestie pretium dolor non rutrum. Praesent quis turpis mauris. Morbi dignissim suscipit dolor et ullamcorper. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Curabitur quis eros vel ipsum vulputate blandit. Sed eget orci condimentum, tristique urna sit amet, malesuada est. Cras pellentesque velit sed ullamcorper bibendum. Nam porta at nunc at vehicula. Pellentesque habitant morbi tristique senectus et netus et malesuada.', '12', 2, 2, 2, 5),
(26, 'Couleurs', 'cameleon(7)', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque eleifend, felis et semper fringilla, dolor metus sodales odio, eu ultricies sapien leo et sem. Praesent rhoncus ante tellus, at porttitor nibh tincidunt facilisis. In molestie pretium dolor non rutrum. Praesent quis turpis mauris. Morbi dignissim suscipit dolor et ullamcorper. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Curabitur quis eros vel ipsum vulputate blandit. Sed eget orci condimentum, tristique urna sit amet, malesuada est. Cras pellentesque velit sed ullamcorper bibendum. Nam porta at nunc at vehicula. Pellentesque habitant morbi tristique senectus et netus et malesuada.', '33', 2, 3, 2, 4),
(27, 'Camouflage', 'cameleon(11)', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque eleifend, felis et semper fringilla, dolor metus sodales odio, eu ultricies sapien leo et sem. Praesent rhoncus ante tellus, at porttitor nibh tincidunt facilisis. In molestie pretium dolor non rutrum. Praesent quis turpis mauris. Morbi dignissim suscipit dolor et ullamcorper. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Curabitur quis eros vel ipsum vulputate blandit. Sed eget orci condimentum, tristique urna sit amet, malesuada est. Cras pellentesque velit sed ullamcorper bibendum. Nam porta at nunc at vehicula. Pellentesque habitant morbi tristique senectus et netus et malesuada.', '99', 3, 4, 2, 6),
(28, 'Sur une branche', 'cameleon(13)', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque eleifend, felis et semper fringilla, dolor metus sodales odio, eu ultricies sapien leo et sem. Praesent rhoncus ante tellus, at porttitor nibh tincidunt facilisis. In molestie pretium dolor non rutrum. Praesent quis turpis mauris. Morbi dignissim suscipit dolor et ullamcorper. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Curabitur quis eros vel ipsum vulputate blandit. Sed eget orci condimentum, tristique urna sit amet, malesuada est. Cras pellentesque velit sed ullamcorper bibendum. Nam porta at nunc at vehicula. Pellentesque habitant morbi tristique senectus et netus et malesuada.', '55', 1, 3, 1, 4),
(29, 'Les Astres', 'espace(1)', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque eleifend, felis et semper fringilla, dolor metus sodales odio, eu ultricies sapien leo et sem. Praesent rhoncus ante tellus, at porttitor nibh tincidunt facilisis. In molestie pretium dolor non rutrum. Praesent quis turpis mauris. Morbi dignissim suscipit dolor et ullamcorper. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Curabitur quis eros vel ipsum vulputate blandit. Sed eget orci condimentum, tristique urna sit amet, malesuada est. Cras pellentesque velit sed ullamcorper bibendum. Nam porta at nunc at vehicula. Pellentesque habitant morbi tristique senectus et netus et malesuada.', '88', 2, 1, 2, 6),
(30, 'Jungle', 'cameleon(5)', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque eleifend, felis et semper fringilla, dolor metus sodales odio, eu ultricies sapien leo et sem. Praesent rhoncus ante tellus, at porttitor nibh tincidunt facilisis. In molestie pretium dolor non rutrum. Praesent quis turpis mauris. Morbi dignissim suscipit dolor et ullamcorper. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Curabitur quis eros vel ipsum vulputate blandit. Sed eget orci condimentum, tristique urna sit amet, malesuada est. Cras pellentesque velit sed ullamcorper bibendum. Nam porta at nunc at vehicula. Pellentesque habitant morbi tristique senectus et netus et malesuada.', '44', 1, 3, 2, 5),
(31, 'L\'abime', 'espace(2)', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque eleifend, felis et semper fringilla, dolor metus sodales odio, eu ultricies sapien leo et sem. Praesent rhoncus ante tellus, at porttitor nibh tincidunt facilisis. In molestie pretium dolor non rutrum. Praesent quis turpis mauris. Morbi dignissim suscipit dolor et ullamcorper. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Curabitur quis eros vel ipsum vulputate blandit. Sed eget orci condimentum, tristique urna sit amet, malesuada est. Cras pellentesque velit sed ullamcorper bibendum. Nam porta at nunc at vehicula. Pellentesque habitant morbi tristique senectus et netus et malesuada.', '66', 2, 1, 1, 1),
(32, 'Queue enroulé', 'cameleon(10)', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque eleifend, felis et semper fringilla, dolor metus sodales odio, eu ultricies sapien leo et sem. Praesent rhoncus ante tellus, at porttitor nibh tincidunt facilisis. In molestie pretium dolor non rutrum. Praesent quis turpis mauris. Morbi dignissim suscipit dolor et ullamcorper. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Curabitur quis eros vel ipsum vulputate blandit. Sed eget orci condimentum, tristique urna sit amet, malesuada est. Cras pellentesque velit sed ullamcorper bibendum. Nam porta at nunc at vehicula. Pellentesque habitant morbi tristique senectus et netus et malesuada.', '33', 3, 2, 2, 6),
(33, 'Langue et dentition', 'cameleon(6)', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque eleifend, felis et semper fringilla, dolor metus sodales odio, eu ultricies sapien leo et sem. Praesent rhoncus ante tellus, at porttitor nibh tincidunt facilisis. In molestie pretium dolor non rutrum. Praesent quis turpis mauris. Morbi dignissim suscipit dolor et ullamcorper. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Curabitur quis eros vel ipsum vulputate blandit. Sed eget orci condimentum, tristique urna sit amet, malesuada est. Cras pellentesque velit sed ullamcorper bibendum. Nam porta at nunc at vehicula. Pellentesque habitant morbi tristique senectus et netus et malesuada.', '55', 2, 2, 1, 7),
(34, 'Ciel étoilé', 'espace(4)', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque eleifend, felis et semper fringilla, dolor metus sodales odio, eu ultricies sapien leo et sem. Praesent rhoncus ante tellus, at porttitor nibh tincidunt facilisis. In molestie pretium dolor non rutrum. Praesent quis turpis mauris. Morbi dignissim suscipit dolor et ullamcorper. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Curabitur quis eros vel ipsum vulputate blandit. Sed eget orci condimentum, tristique urna sit amet, malesuada est. Cras pellentesque velit sed ullamcorper bibendum. Nam porta at nunc at vehicula. Pellentesque habitant morbi tristique senectus et netus et malesuada.', '9', 2, 2, 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `Id_category` int(11) NOT NULL,
  `Category_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`Id_category`, `Category_name`) VALUES
(1, 'Mathématique'),
(2, 'Physique appliquée'),
(3, 'Biologie'),
(4, 'Mécanique');

-- --------------------------------------------------------

--
-- Table structure for table `exercices`
--

CREATE TABLE `exercices` (
  `Id` int(11) NOT NULL,
  `Title` varchar(60) NOT NULL,
  `Picture` varchar(255) NOT NULL,
  `Content` text NOT NULL,
  `Date` varchar(11) NOT NULL,
  `Id_package` int(11) NOT NULL,
  `Price` int(11) NOT NULL,
  `Id_category` int(11) NOT NULL,
  `Id_sub_category` int(11) NOT NULL,
  `Id_formation` int(11) NOT NULL,
  `Id_niveau` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `exercices`
--

INSERT INTO `exercices` (`Id`, `Title`, `Picture`, `Content`, `Date`, `Id_package`, `Price`, `Id_category`, `Id_sub_category`, `Id_formation`, `Id_niveau`) VALUES
(2, 'Beau ciel ce matin', 'fox(3)', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas gravida suscipit sem, vitae fringilla eros ultricies sit amet. Sed quis nibh augue. Vivamus ullamcorper eleifend efficitur. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Phasellus molestie, elit et ornare euismod, nunc mauris rhoncus mauris, vitae convallis metus libero a tellus. Nullam quis elit arcu. Nunc feugiat sem nec ante convallis pulvinar. Aenean ex ante, dignissim at nisi eget, tempus bibendum enim. Vivamus turpis est, facilisis.', '02/08/2020', 3, 25, 1, 3, 2, 5),
(13, 'Tu me vois ou je vais me cacher ailleur ?', 'frog(1)', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas gravida suscipit sem, vitae fringilla eros ultricies sit amet. Sed quis nibh augue. Vivamus ullamcorper eleifend efficitur. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Phasellus molestie, elit et ornare euismod, nunc mauris rhoncus mauris, vitae convallis metus libero a tellus. Nullam quis elit arcu. Nunc feugiat sem nec ante convallis pulvinar. Aenean ex ante, dignissim at nisi eget, tempus bibendum enim. Vivamus turpis est, facilisis.', '05/08/2020', 7, 32, 2, 4, 1, 9),
(14, 'La neige c\'est tros bien !', 'fox(4)', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas gravida suscipit sem, vitae fringilla eros ultricies sit amet. Sed quis nibh augue. Vivamus ullamcorper eleifend efficitur. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Phasellus molestie, elit et ornare euismod, nunc mauris rhoncus mauris, vitae convallis metus libero a tellus. Nullam quis elit arcu. Nunc feugiat sem nec ante convallis pulvinar. Aenean ex ante, dignissim at nisi eget, tempus bibendum enim. Vivamus turpis est, facilisis.', '06/08/2020', 3, 11, 2, 1, 1, 7),
(15, 'J\'adore les feuilles humides !', 'frog(3)', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas gravida suscipit sem, vitae fringilla eros ultricies sit amet. Sed quis nibh augue. Vivamus ullamcorper eleifend efficitur. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Phasellus molestie, elit et ornare euismod, nunc mauris rhoncus mauris, vitae convallis metus libero a tellus. Nullam quis elit arcu. Nunc feugiat sem nec ante convallis pulvinar. Aenean ex ante, dignissim at nisi eget, tempus bibendum enim. Vivamus turpis est, facilisis.', '07/08/2020', 9, 25, 3, 3, 2, 2),
(16, 'La neige c\'est trop bien - le retour', 'fox(9)', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas gravida suscipit sem, vitae fringilla eros ultricies sit amet. Sed quis nibh augue. Vivamus ullamcorper eleifend efficitur. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Phasellus molestie, elit et ornare euismod, nunc mauris rhoncus mauris, vitae convallis metus libero a tellus. Nullam quis elit arcu. Nunc feugiat sem nec ante convallis pulvinar. Aenean ex ante, dignissim at nisi eget, tempus bibendum enim. Vivamus turpis est, facilisis.', '08/08/2020', 6, 65, 4, 2, 2, 6),
(17, 'Minuscule !', 'frog(16)', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas gravida suscipit sem, vitae fringilla eros ultricies sit amet. Sed quis nibh augue. Vivamus ullamcorper eleifend efficitur. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Phasellus molestie, elit et ornare euismod, nunc mauris rhoncus mauris, vitae convallis metus libero a tellus. Nullam quis elit arcu. Nunc feugiat sem nec ante convallis pulvinar. Aenean ex ante, dignissim at nisi eget, tempus bibendum enim. Vivamus turpis est, facilisis.', '09/08/2020', 6, 96, 2, 1, 1, 6),
(18, 'Mendicité chez le sauvage', 'fox(11)', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas gravida suscipit sem, vitae fringilla eros ultricies sit amet. Sed quis nibh augue. Vivamus ullamcorper eleifend efficitur. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Phasellus molestie, elit et ornare euismod, nunc mauris rhoncus mauris, vitae convallis metus libero a tellus. Nullam quis elit arcu. Nunc feugiat sem nec ante convallis pulvinar. Aenean ex ante, dignissim at nisi eget, tempus bibendum enim. Vivamus turpis est, facilisis.', '10/08/2020', 9, 65, 2, 3, 1, 4),
(19, 'Le dendrobate acrobate', 'frog(4)', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas gravida suscipit sem, vitae fringilla eros ultricies sit amet. Sed quis nibh augue. Vivamus ullamcorper eleifend efficitur. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Phasellus molestie, elit et ornare euismod, nunc mauris rhoncus mauris, vitae convallis metus libero a tellus. Nullam quis elit arcu. Nunc feugiat sem nec ante convallis pulvinar. Aenean ex ante, dignissim at nisi eget, tempus bibendum enim. Vivamus turpis est, facilisis.', '11/08/2020', 5, 44, 2, 2, 1, 6),
(20, 'Enchanteur !', 'frog(19)', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas gravida suscipit sem, vitae fringilla eros ultricies sit amet. Sed quis nibh augue. Vivamus ullamcorper eleifend efficitur. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Phasellus molestie, elit et ornare euismod, nunc mauris rhoncus mauris, vitae convallis metus libero a tellus. Nullam quis elit arcu. Nunc feugiat sem nec ante convallis pulvinar. Aenean ex ante, dignissim at nisi eget, tempus bibendum enim. Vivamus turpis est, facilisis.', '12/08/2020', 4, 66, 2, 2, 1, 6),
(21, 'Enchanteur (II)', 'frog(20)', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas gravida suscipit sem, vitae fringilla eros ultricies sit amet. Sed quis nibh augue. Vivamus ullamcorper eleifend efficitur. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Phasellus molestie, elit et ornare euismod, nunc mauris rhoncus mauris, vitae convallis metus libero a tellus. Nullam quis elit arcu. Nunc feugiat sem nec ante convallis pulvinar. Aenean ex ante, dignissim at nisi eget, tempus bibendum enim. Vivamus turpis est, facilisis.', '13/08/2020', 4, 77, 2, 3, 2, 1),
(22, 'Qu\'il est meugnon !', 'fox(7)', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas gravida suscipit sem, vitae fringilla eros ultricies sit amet. Sed quis nibh augue. Vivamus ullamcorper eleifend efficitur. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Phasellus molestie, elit et ornare euismod, nunc mauris rhoncus mauris, vitae convallis metus libero a tellus. Nullam quis elit arcu. Nunc feugiat sem nec ante convallis pulvinar. Aenean ex ante, dignissim at nisi eget, tempus bibendum enim. Vivamus turpis est, facilisis.', '14/08/2020', 8, 55, 3, 3, 1, 4);

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
-- Table structure for table `lessons`
--

CREATE TABLE `lessons` (
  `Id` int(11) NOT NULL,
  `Title` varchar(60) NOT NULL,
  `Picture` varchar(255) NOT NULL,
  `Content` text NOT NULL,
  `Date` varchar(11) NOT NULL,
  `Id_package` int(11) NOT NULL,
  `Price` int(11) NOT NULL,
  `Id_category` int(11) NOT NULL,
  `Id_sub_category` int(11) NOT NULL,
  `Id_formation` int(11) NOT NULL,
  `Id_niveau` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lessons`
--

INSERT INTO `lessons` (`Id`, `Title`, `Picture`, `Content`, `Date`, `Id_package`, `Price`, `Id_category`, `Id_sub_category`, `Id_formation`, `Id_niveau`) VALUES
(1, 'L\'affection a l\'état sauvage', 'wolf(9)', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas gravida suscipit sem, vitae fringilla eros ultricies sit amet. Sed quis nibh augue. Vivamus ullamcorper eleifend efficitur. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Phasellus molestie, elit et ornare euismod, nunc mauris rhoncus mauris, vitae convallis metus libero a tellus. Nullam quis elit arcu. Nunc feugiat sem nec ante convallis pulvinar. Aenean ex ante, dignissim at nisi eget, tempus bibendum enim. Vivamus turpis est, facilisis.', '15/09/2020', 6, 11, 1, 3, 1, 4),
(2, 'Les rapaces regardent rarement vers le haut', 'howl(12)', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas gravida suscipit sem, vitae fringilla eros ultricies sit amet. Sed quis nibh augue. Vivamus ullamcorper eleifend efficitur. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Phasellus molestie, elit et ornare euismod, nunc mauris rhoncus mauris, vitae convallis metus libero a tellus. Nullam quis elit arcu. Nunc feugiat sem nec ante convallis pulvinar. Aenean ex ante, dignissim at nisi eget, tempus bibendum enim. Vivamus turpis est, facilisis.', '16/09/2020', 4, 66, 2, 4, 1, 7),
(3, 'Sacré profil !', 'howl(7)', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas gravida suscipit sem, vitae fringilla eros ultricies sit amet. Sed quis nibh augue. Vivamus ullamcorper eleifend efficitur. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Phasellus molestie, elit et ornare euismod, nunc mauris rhoncus mauris, vitae convallis metus libero a tellus. Nullam quis elit arcu. Nunc feugiat sem nec ante convallis pulvinar. Aenean ex ante, dignissim at nisi eget, tempus bibendum enim. Vivamus turpis est, facilisis.', '17/09/2020', 7, 65, 3, 1, 2, 2),
(4, 'Travail d\'équipe', 'wolf(2)', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas gravida suscipit sem, vitae fringilla eros ultricies sit amet. Sed quis nibh augue. Vivamus ullamcorper eleifend efficitur. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Phasellus molestie, elit et ornare euismod, nunc mauris rhoncus mauris, vitae convallis metus libero a tellus. Nullam quis elit arcu. Nunc feugiat sem nec ante convallis pulvinar. Aenean ex ante, dignissim at nisi eget, tempus bibendum enim. Vivamus turpis est, facilisis.', '18/09/2020', 10, 99, 1, 3, 1, 5),
(5, 'Les ténébreux sont tous des Alpha', 'wolf(5)', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas gravida suscipit sem, vitae fringilla eros ultricies sit amet. Sed quis nibh augue. Vivamus ullamcorper eleifend efficitur. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Phasellus molestie, elit et ornare euismod, nunc mauris rhoncus mauris, vitae convallis metus libero a tellus. Nullam quis elit arcu. Nunc feugiat sem nec ante convallis pulvinar. Aenean ex ante, dignissim at nisi eget, tempus bibendum enim. Vivamus turpis est, facilisis.', '19/09/2020', 9, 22, 3, 3, 1, 3),
(6, 'Les chasses nocturnes redoutables', 'wolf(3)', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas gravida suscipit sem, vitae fringilla eros ultricies sit amet. Sed quis nibh augue. Vivamus ullamcorper eleifend efficitur. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Phasellus molestie, elit et ornare euismod, nunc mauris rhoncus mauris, vitae convallis metus libero a tellus. Nullam quis elit arcu. Nunc feugiat sem nec ante convallis pulvinar. Aenean ex ante, dignissim at nisi eget, tempus bibendum enim. Vivamus turpis est, facilisis.', '20/09/2020', 8, 88, 2, 1, 2, 2),
(7, 'Méfiant ou intrigué ?', 'howl(14)', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas gravida suscipit sem, vitae fringilla eros ultricies sit amet. Sed quis nibh augue. Vivamus ullamcorper eleifend efficitur. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Phasellus molestie, elit et ornare euismod, nunc mauris rhoncus mauris, vitae convallis metus libero a tellus. Nullam quis elit arcu. Nunc feugiat sem nec ante convallis pulvinar. Aenean ex ante, dignissim at nisi eget, tempus bibendum enim. Vivamus turpis est, facilisis.', '21/09/2020', 7, 25, 2, 2, 1, 7),
(8, 'Le marcher de l\'immobilié chez les hiboux', 'howl(10)', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas gravida suscipit sem, vitae fringilla eros ultricies sit amet. Sed quis nibh augue. Vivamus ullamcorper eleifend efficitur. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Phasellus molestie, elit et ornare euismod, nunc mauris rhoncus mauris, vitae convallis metus libero a tellus. Nullam quis elit arcu. Nunc feugiat sem nec ante convallis pulvinar. Aenean ex ante, dignissim at nisi eget, tempus bibendum enim. Vivamus turpis est, facilisis.', '22/09/2020', 4, 33, 3, 2, 2, 2),
(9, 'Un solo vocal a ne pas louper !', 'wolf(7)', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas gravida suscipit sem, vitae fringilla eros ultricies sit amet. Sed quis nibh augue. Vivamus ullamcorper eleifend efficitur. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Phasellus molestie, elit et ornare euismod, nunc mauris rhoncus mauris, vitae convallis metus libero a tellus. Nullam quis elit arcu. Nunc feugiat sem nec ante convallis pulvinar. Aenean ex ante, dignissim at nisi eget, tempus bibendum enim. Vivamus turpis est, facilisis.', '23/09/2020', 8, 22, 3, 4, 2, 4),
(10, 'Aprés le concert de la veille, un jeune talent se dévoile !', 'wolf(13)', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas gravida suscipit sem, vitae fringilla eros ultricies sit amet. Sed quis nibh augue. Vivamus ullamcorper eleifend efficitur. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Phasellus molestie, elit et ornare euismod, nunc mauris rhoncus mauris, vitae convallis metus libero a tellus. Nullam quis elit arcu. Nunc feugiat sem nec ante convallis pulvinar. Aenean ex ante, dignissim at nisi eget, tempus bibendum enim. Vivamus turpis est, facilisis.', '24/09/2020', 5, 55, 2, 3, 1, 4);

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
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `Id_package` int(11) NOT NULL,
  `Num_package` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`Id_package`, `Num_package`) VALUES
(1, 6215),
(2, 3160),
(3, 6402),
(4, 9764),
(5, 3465),
(6, 7532),
(7, 7896),
(8, 3415),
(9, 5489),
(10, 6521);

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
  `Id_sub_category` int(11) NOT NULL,
  `Sub_category_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`Id_sub_category`, `Sub_category_name`) VALUES
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
  ADD PRIMARY KEY (`Id_category`);

--
-- Indexes for table `exercices`
--
ALTER TABLE `exercices`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Id_category` (`Id_category`,`Id_sub_category`,`Id_formation`,`Id_niveau`),
  ADD KEY `Id_sub_category` (`Id_sub_category`),
  ADD KEY `Id_formation` (`Id_formation`),
  ADD KEY `Id_niveau` (`Id_niveau`),
  ADD KEY `Id_package` (`Id_package`);

--
-- Indexes for table `formations`
--
ALTER TABLE `formations`
  ADD PRIMARY KEY (`Id_formation`);

--
-- Indexes for table `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Id_category` (`Id_category`),
  ADD KEY `Id_sub_category` (`Id_sub_category`),
  ADD KEY `Id_formation` (`Id_formation`,`Id_niveau`),
  ADD KEY `Id_niveau` (`Id_niveau`),
  ADD KEY `Id_package` (`Id_package`);

--
-- Indexes for table `niveaux`
--
ALTER TABLE `niveaux`
  ADD PRIMARY KEY (`Id_niveau`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`Id_package`);

--
-- Indexes for table `statuts`
--
ALTER TABLE `statuts`
  ADD PRIMARY KEY (`Id_statut`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`Id_sub_category`);

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
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `Id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `exercices`
--
ALTER TABLE `exercices`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `formations`
--
ALTER TABLE `formations`
  MODIFY `Id_formation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lessons`
--
ALTER TABLE `lessons`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `niveaux`
--
ALTER TABLE `niveaux`
  MODIFY `Id_niveau` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `Id_package` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `statuts`
--
ALTER TABLE `statuts`
  MODIFY `Id_statut` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `Id_sub_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  ADD CONSTRAINT `articles_ibfk_3` FOREIGN KEY (`Id_category`) REFERENCES `categories` (`Id_category`),
  ADD CONSTRAINT `articles_ibfk_4` FOREIGN KEY (`Id_sub_category`) REFERENCES `sub_categories` (`Id_sub_category`);

--
-- Constraints for table `exercices`
--
ALTER TABLE `exercices`
  ADD CONSTRAINT `exercices_ibfk_1` FOREIGN KEY (`Id_category`) REFERENCES `categories` (`Id_category`),
  ADD CONSTRAINT `exercices_ibfk_2` FOREIGN KEY (`Id_sub_category`) REFERENCES `sub_categories` (`Id_sub_category`),
  ADD CONSTRAINT `exercices_ibfk_3` FOREIGN KEY (`Id_formation`) REFERENCES `formations` (`Id_formation`),
  ADD CONSTRAINT `exercices_ibfk_4` FOREIGN KEY (`Id_niveau`) REFERENCES `niveaux` (`Id_niveau`),
  ADD CONSTRAINT `exercices_ibfk_5` FOREIGN KEY (`Id_package`) REFERENCES `packages` (`Id_package`);

--
-- Constraints for table `lessons`
--
ALTER TABLE `lessons`
  ADD CONSTRAINT `lessons_ibfk_1` FOREIGN KEY (`Id_category`) REFERENCES `categories` (`Id_category`),
  ADD CONSTRAINT `lessons_ibfk_2` FOREIGN KEY (`Id_sub_category`) REFERENCES `sub_categories` (`Id_sub_category`),
  ADD CONSTRAINT `lessons_ibfk_3` FOREIGN KEY (`Id_formation`) REFERENCES `formations` (`Id_formation`),
  ADD CONSTRAINT `lessons_ibfk_4` FOREIGN KEY (`Id_niveau`) REFERENCES `niveaux` (`Id_niveau`),
  ADD CONSTRAINT `lessons_ibfk_5` FOREIGN KEY (`Id_package`) REFERENCES `packages` (`Id_package`);

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
