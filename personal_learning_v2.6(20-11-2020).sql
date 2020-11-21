-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 21, 2020 at 06:27 PM
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
  `Id_article` int(11) NOT NULL,
  `Title` varchar(60) NOT NULL,
  `Picture` varchar(255) NOT NULL,
  `Describ` text NOT NULL,
  `Content` text NOT NULL,
  `Date` varchar(11) NOT NULL,
  `Id_package` int(11) NOT NULL,
  `Id_category` int(11) NOT NULL,
  `Id_sub_category` int(11) NOT NULL,
  `Id_formation` int(11) NOT NULL,
  `Id_niveau` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`Id_article`, `Title`, `Picture`, `Describ`, `Content`, `Date`, `Id_package`, `Id_category`, `Id_sub_category`, `Id_formation`, `Id_niveau`) VALUES
(1, 'Regarder le soleil ou une éclipse sans danger !', 'space_05', 'Lors d\'une éclipse solaire, il est très important de protéger ses yeux. Depuis des centaines d\'années, les astronomes se servent de différentes méthodes pour observer le Soleil de façon sécuritaire. Entre autres, la boîte à éclipse solaire permet d\'observer une petite image du Soleil à travers une boîte fermée.', '<intro class=\"intro\">\r\n<h3>Intro</h3>\r\n<p>Lors d\'une éclipse solaire, il est très important de protéger ses yeux. Depuis des centaines d\'années, les astronomes se servent de différentes méthodes pour observer le Soleil de façon sécuritaire. Entre autres, la boîte à éclipse solaire permet d\'observer une petite image du Soleil à travers une boîte fermée.</p><br />\r\n<p class=\"global_goal\">\r\nIl s\'agit d\'<u>un support pratique</u>.<br /><br />Cela vous permettrat de regarder indirectement le soleil ou l\'éclipse.\r\n</p>\r\n\r\n<h3>Une alternative aux lunettes polarisées <leg class=\"indication\">1er support - pratique</leg></h3>\r\n<p>\r\nEn suivant le principe de la chambre noire, votre systeme correctement orienté captera la lumiere du soleil par un trou et sera projeté au fond de la boite. Il vous restera a regarder par un autre trou pour votre cette projection\r\n</p>', '10/10/2020', 2, 1, 2, 2, 1),
(21, 'Lent mais agile !', 'chameleon_02', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque eleifend, felis et semper fringilla, dolor metus sodales odio, eu ultricies sapien leo et sem. Praesent rhoncus ante tellus, at porttitor nibh tincidunt facilisis. In molestie pretium dolor non rutrum. Praesent quis turpis mauris. Morbi dignissim suscipit dolor et ullamcorper. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Curabitur quis eros vel ipsum vulputate blandit. Sed eget orci condimentum, tristique urna sit amet, malesuada est. Cras pellentesque velit sed ullamcorper bibendum. Nam porta at nunc at vehicula. Pellentesque habitant morbi tristique senectus et netus et malesuada.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque eleifend, felis et semper fringilla, dolor metus sodales odio, eu ultricies sapien leo et sem. Praesent rhoncus ante tellus, at porttitor nibh tincidunt facilisis. In molestie pretium dolor non rutrum. Praesent quis turpis mauris. Morbi dignissim suscipit dolor et ullamcorper. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Curabitur quis eros vel ipsum vulputate blandit. Sed eget orci condimentum, tristique urna sit amet, malesuada est. Cras pellentesque velit sed ullamcorper bibendum. Nam porta at nunc at vehicula. Pellentesque habitant morbi tristique senectus et netus et malesuada.', '15/10/2020', 3, 2, 1, 1, 8),
(22, 'Invisible', 'wolf_03', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque eleifend, felis et semper fringilla, dolor metus sodales odio, eu ultricies sapien leo et sem. Praesent rhoncus ante tellus, at porttitor nibh tincidunt facilisis. In molestie pretium dolor non rutrum. Praesent quis turpis mauris. Morbi dignissim suscipit dolor et ullamcorper. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Curabitur quis eros vel ipsum vulputate blandit. Sed eget orci condimentum, tristique urna sit amet, malesuada est. Cras pellentesque velit sed ullamcorper bibendum. Nam porta at nunc at vehicula. Pellentesque habitant morbi tristique senectus et netus et malesuada.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque eleifend, felis et semper fringilla, dolor metus sodales odio, eu ultricies sapien leo et sem. Praesent rhoncus ante tellus, at porttitor nibh tincidunt facilisis. In molestie pretium dolor non rutrum. Praesent quis turpis mauris. Morbi dignissim suscipit dolor et ullamcorper. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Curabitur quis eros vel ipsum vulputate blandit. Sed eget orci condimentum, tristique urna sit amet, malesuada est. Cras pellentesque velit sed ullamcorper bibendum. Nam porta at nunc at vehicula. Pellentesque habitant morbi tristique senectus et netus et malesuada.', '2020/10/16', 8, 2, 1, 2, 2),
(23, 'Les préjugés sur les vieilles branches', 'chameleon_06', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque eleifend, felis et semper fringilla, dolor metus sodales odio, eu ultricies sapien leo et sem. Praesent rhoncus ante tellus, at porttitor nibh tincidunt facilisis. In molestie pretium dolor non rutrum. Praesent quis turpis mauris. Morbi dignissim suscipit dolor et ullamcorper. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Curabitur quis eros vel ipsum vulputate blandit. Sed eget orci condimentum, tristique urna sit amet, malesuada est. Cras pellentesque velit sed ullamcorper bibendum. Nam porta at nunc at vehicula. Pellentesque habitant morbi tristique senectus et netus et malesuada.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque eleifend, felis et semper fringilla, dolor metus sodales odio, eu ultricies sapien leo et sem. Praesent rhoncus ante tellus, at porttitor nibh tincidunt facilisis. In molestie pretium dolor non rutrum. Praesent quis turpis mauris. Morbi dignissim suscipit dolor et ullamcorper. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Curabitur quis eros vel ipsum vulputate blandit. Sed eget orci condimentum, tristique urna sit amet, malesuada est. Cras pellentesque velit sed ullamcorper bibendum. Nam porta at nunc at vehicula. Pellentesque habitant morbi tristique senectus et netus et malesuada.', '17/10/2020', 5, 3, 1, 1, 7),
(24, 'Cosmos', 'space_07', 'Lorem ipsum dolor <strong>blue</strong>sit amet, consectetur adipiscing elit. Quisque eleifend, felis et semper fringilla, dolor metus sodales odio, eu ultricies sapien leo et sem. Praesent rhoncus ante tellus, at porttitor nibh tincidunt facilisis. In molestie pretium dolor non rutrum. Praesent quis turpis mauris. Morbi dignissim suscipit dolor et ullamcorper. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Curabitur quis eros vel ipsum vulputate blandit. Sed eget orci condimentum, tristique urna sit amet, malesuada est. Cras pellentesque velit sed ullamcorper bibendum. Nam porta at nunc at vehicula. Pellentesque habitant morbi tristique senectus et netus et malesuada.', 'Lorem ipsum dolor <strong>blue</strong>sit amet, consectetur adipiscing elit. Quisque eleifend, felis et semper fringilla, dolor metus sodales odio, eu ultricies sapien leo et sem. Praesent rhoncus ante tellus, at porttitor nibh tincidunt facilisis. In molestie pretium dolor non rutrum. Praesent quis turpis mauris. Morbi dignissim suscipit dolor et ullamcorper. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Curabitur quis eros vel ipsum vulputate blandit. Sed eget orci condimentum, tristique urna sit amet, malesuada est. Cras pellentesque velit sed ullamcorper bibendum. Nam porta at nunc at vehicula. Pellentesque habitant morbi tristique senectus et netus et malesuada.', '18/10/2020', 6, 2, 3, 1, 2),
(25, 'Abysse', 'space_01', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque eleifend, felis et semper fringilla, dolor metus sodales odio, eu ultricies sapien leo et sem. Praesent rhoncus ante tellus, at porttitor nibh tincidunt facilisis. In molestie pretium dolor non rutrum. Praesent quis turpis mauris. Morbi dignissim suscipit dolor et ullamcorper. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Curabitur quis eros vel ipsum vulputate blandit. Sed eget orci condimentum, tristique urna sit amet, malesuada est. Cras pellentesque velit sed ullamcorper bibendum. Nam porta at nunc at vehicula. Pellentesque habitant morbi tristique senectus et netus et malesuada.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque eleifend, felis et semper fringilla, dolor metus sodales odio, eu ultricies sapien leo et sem. Praesent rhoncus ante tellus, at porttitor nibh tincidunt facilisis. In molestie pretium dolor non rutrum. Praesent quis turpis mauris. Morbi dignissim suscipit dolor et ullamcorper. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Curabitur quis eros vel ipsum vulputate blandit. Sed eget orci condimentum, tristique urna sit amet, malesuada est. Cras pellentesque velit sed ullamcorper bibendum. Nam porta at nunc at vehicula. Pellentesque habitant morbi tristique senectus et netus et malesuada.', '19/10/2020', 7, 2, 2, 2, 5),
(26, 'Malin', 'fox_07', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque eleifend, felis et semper fringilla, dolor metus sodales odio, eu ultricies sapien leo et sem. Praesent rhoncus ante tellus, at porttitor nibh tincidunt facilisis. In molestie pretium dolor non rutrum. Praesent quis turpis mauris. Morbi dignissim suscipit dolor et ullamcorper. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Curabitur quis eros vel ipsum vulputate blandit. Sed eget orci condimentum, tristique urna sit amet, malesuada est. Cras pellentesque velit sed ullamcorper bibendum. Nam porta at nunc at vehicula. Pellentesque habitant morbi tristique senectus et netus et malesuada.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque eleifend, felis et semper fringilla, dolor metus sodales odio, eu ultricies sapien leo et sem. Praesent rhoncus ante tellus, at porttitor nibh tincidunt facilisis. In molestie pretium dolor non rutrum. Praesent quis turpis mauris. Morbi dignissim suscipit dolor et ullamcorper. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Curabitur quis eros vel ipsum vulputate blandit. Sed eget orci condimentum, tristique urna sit amet, malesuada est. Cras pellentesque velit sed ullamcorper bibendum. Nam porta at nunc at vehicula. Pellentesque habitant morbi tristique senectus et netus et malesuada.', '20/10/2020', 9, 2, 3, 2, 4),
(27, 'J\'adore les feuilles humides', 'frog_19', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque eleifend, felis et semper fringilla, dolor metus sodales odio, eu ultricies sapien leo et sem. Praesent rhoncus ante tellus, at porttitor nibh tincidunt facilisis. In molestie pretium dolor non rutrum. Praesent quis turpis mauris. Morbi dignissim suscipit dolor et ullamcorper. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Curabitur quis eros vel ipsum vulputate blandit. Sed eget orci condimentum, tristique urna sit amet, malesuada est. Cras pellentesque velit sed ullamcorper bibendum. Nam porta at nunc at vehicula. Pellentesque habitant morbi tristique senectus et netus et malesuada.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque eleifend, felis et semper fringilla, dolor metus sodales odio, eu ultricies sapien leo et sem. Praesent rhoncus ante tellus, at porttitor nibh tincidunt facilisis. In molestie pretium dolor non rutrum. Praesent quis turpis mauris. Morbi dignissim suscipit dolor et ullamcorper. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Curabitur quis eros vel ipsum vulputate blandit. Sed eget orci condimentum, tristique urna sit amet, malesuada est. Cras pellentesque velit sed ullamcorper bibendum. Nam porta at nunc at vehicula. Pellentesque habitant morbi tristique senectus et netus et malesuada.', '21/10/2020', 10, 3, 4, 2, 6),
(28, 'Dendrobate acrobate', 'frog_18', 'Lorem ipsum <strong>dentition</strong> dolor sit amet, consectetur adipiscing elit. Quisque eleifend, felis et semper fringilla, dolor metus sodales odio, eu ultricies sapien leo et sem. Praesent rhoncus ante tellus, at porttitor nibh tincidunt facilisis. In molestie pretium dolor non rutrum. Praesent quis turpis mauris. Morbi dignissim suscipit dolor et ullamcorper. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Curabitur quis eros vel ipsum vulputate blandit. Sed eget orci condimentum, tristique urna sit amet, malesuada est. Cras pellentesque velit sed ullamcorper bibendum. Nam porta at nunc at vehicula. Pellentesque habitant morbi tristique senectus et netus et malesuada.', 'Lorem ipsum <strong>dentition</strong> dolor sit amet, consectetur adipiscing elit. Quisque eleifend, felis et semper fringilla, dolor metus sodales odio, eu ultricies sapien leo et sem. Praesent rhoncus ante tellus, at porttitor nibh tincidunt facilisis. In molestie pretium dolor non rutrum. Praesent quis turpis mauris. Morbi dignissim suscipit dolor et ullamcorper. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Curabitur quis eros vel ipsum vulputate blandit. Sed eget orci condimentum, tristique urna sit amet, malesuada est. Cras pellentesque velit sed ullamcorper bibendum. Nam porta at nunc at vehicula. Pellentesque habitant morbi tristique senectus et netus et malesuada.', '22/10/2020', 1, 1, 3, 1, 4),
(35, 'Hécatombe immobilière chez les hiboux', 'owl_07', 'Les <strong><dfn>Hiboux</dfn></strong>, ces <strong><dfn>rapaces</dfn></strong> en voient de disparition sont rarement visible meme dans les zones les plus rurales, mais il se peut que vous en connaissiez un qui passe a une heure et dans un lieu precise dans sa ronde en quete d\'un nouveau <strong><dfn>foyer</dfn></strong>. Réjouissez-vous, en plus d\'etre un privilégier rien que pour l\'avoir vue, vous pouvez lui venir en aide ! Si vous avez du terrain boisé ou la posibilité de lui en allouer un, vous pouvez lui offrir un foyer qui lui sauvera surement la vie !', '<intro class=\"intro\">\r\n			<h3>Intro</h3>\r\n			<p>\r\n				Ce n\'est pas nouveau, les animaux sauvages ont de mois en mois de territoire ou de territoire sain pour vivre et cela depuis un moment deja.\r\n			</p>\r\n			<p>\r\n				Que ce soit pour exploiter ces terrains pour assouvir l\'aviditer des Hommes ou subvenir a des besoins en perpétuels croissances pour la meme raison, le délogement des animaux est trés répendue.\r\n			</p><br>\r\n			<p>\r\n				Les <strong><dfn>Hiboux</dfn></strong> en font partie. Ces <strong><dfn>rapaces</dfn></strong> en voient de disparition sont rarement visible meme dans les zones les plus rurales, mais il se peut que vous en connaissiez un qui passe a une heure precise dans un lieu precis faire sa ronde en quete d\'un nouveau <strong><dfn>foyer</dfn></strong>. Réjouissez-vous, en plus d\'etre un privilégier rien que pour l\'avoir vue, vous pouvez lui venir en aide ! Si vous avez du terrain boisé ou la posibilité de lui en allouer un, vous pouvez lui offrir un foyer qui lui sauvera surement la vie ! Pour les plus cartésiens, dites vous que ce rapace a un role dans <strong><dfn>l\'écosysteme</dfn></strong> qui pourra vous profiter.\r\n			</p><br>\r\n			<p>Mais pour que cela fonctionne, il faut comprendre cet oiseau de proie fier, principalement solitaire.</p><br><br>\r\n\r\n			<p class=\"global_goal\">Ce corpus pédagogiques comprenants <u>deux supports théoriques</u> et <u>un support pratique</u>.<br><br>Cela vous permettrat de beaucoup mieux connaitre et comprendre cet animal pour l\'aiguiller vers un nouveau nid au sein d\'un nouvel habitat plus accueillant, répondant a ses besoins, ajoutant ainsi une pierre a l\'édifice de la préservation des especes.</p>\r\n		</intro>\r\n\r\n		<h3>Méfiant ou intrigué ?<leg class=\"indication\">1er support - théorique</leg></h3>\r\n		<p>Avec ses grands yeux et sa stature fière et imposante, le hiboux est un animal intrigant et fascinant. Pourtant, ces oiseaux mystérieux sont méconnus du grand public. Ils sont très discrets, il est donc très difficile d’en rencontrer à l’état sauvage. Afin de mieux les connaitre, voici une liste de hiboux que l’on peut trouver en France, qui ont chacun leurs particularités.</p>\r\n		\r\n		<h3>Plus présent qu\'il nid parait <leg class=\"indication\">2eme support - théorique</leg></h3>\r\n		<p>Ce majestueux oiseau carnivore peut vivre dans des milieux très variés, bien qu’il préfère les milieux forestiers et les falaises. Il se nourrit de tout ce que l’homme peut considérer comme parasites, à savoir toutes sortes de rongeurs et petits animaux (rats, souris, hérissons, etc.), ainsi que d’autres oiseaux comme les pigeons dont il est très friand. Il lui arrive même parfois d’être charognard, se nourrissant de restes de proies que d’autres prédateurs n’ont pas daigné finir.</p>\r\n\r\n		<h3>Un foyer chaleureux <leg class=\"indication\">3eme support - pratique</leg></h3>\r\n		<p>En créant des compartiments adaptés aux besoins et à l\'habitat de chaques espèces, cette construction devient la meilleure maison pour les hiboux, tant en hiver pour se protéger du froid et se nourrir, qu\'au printemps pour pondre.</p>', '2020/11/09', 4, 3, 2, 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `basket`
--

CREATE TABLE `basket` (
  `Id_basket` int(11) NOT NULL,
  `Id_package` int(11) NOT NULL,
  `Id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `basket`
--

INSERT INTO `basket` (`Id_basket`, `Id_package`, `Id_user`) VALUES
(1, 1, 2),
(16, 9, 3);

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
  `Id_exercice` int(11) NOT NULL,
  `Title` varchar(60) NOT NULL,
  `Picture` varchar(255) NOT NULL,
  `Describ` text NOT NULL,
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

INSERT INTO `exercices` (`Id_exercice`, `Title`, `Picture`, `Describ`, `Content`, `Date`, `Id_package`, `Price`, `Id_category`, `Id_sub_category`, `Id_formation`, `Id_niveau`) VALUES
(2, 'Comme une feuille', 'frog_17', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas gravida suscipit sem, vitae fringilla eros ultricies sit amet. Sed quis nibh augue. Vivamus ullamcorper eleifend efficitur. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Phasellus molestie, elit et ornare euismod, nunc mauris rhoncus mauris, vitae convallis metus libero a tellus. Nullam quis elit arcu. Nunc feugiat sem nec ante convallis pulvinar. Aenean ex ante, dignissim at nisi eget, tempus bibendum enim. Vivamus turpis est, facilisis.', '', '02/08/2020', 1, 25, 1, 3, 2, 5),
(13, 'Sombre', 'space_05', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas gravida suscipit sem, vitae fringilla eros ultricies sit amet. Sed quis nibh augue. Vivamus ullamcorper eleifend efficitur. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Phasellus molestie, elit et ornare euismod, nunc mauris rhoncus mauris, vitae convallis metus libero a tellus. Nullam quis elit arcu. Nunc feugiat sem nec ante convallis pulvinar. Aenean ex ante, dignissim at nisi eget, tempus bibendum enim. Vivamus turpis est, facilisis.', '', '05/08/2020', 7, 8, 2, 4, 1, 9),
(14, 'Ne pas bouger', 'frog_05', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas gravida suscipit sem, vitae fringilla eros ultricies sit amet. Sed quis nibh augue. Vivamus ullamcorper eleifend efficitur. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Phasellus molestie, elit et ornare euismod, nunc mauris rhoncus mauris, vitae convallis metus libero a tellus. Nullam quis elit arcu. Nunc feugiat sem nec ante convallis pulvinar. Aenean ex ante, dignissim at nisi eget, tempus bibendum enim. Vivamus turpis est, facilisis.', '', '06/08/2020', 1, 11, 2, 1, 1, 7),
(15, 'Silencieux !', 'fox_02', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas gravida suscipit sem, vitae fringilla eros ultricies sit amet. Sed quis nibh augue. Vivamus ullamcorper eleifend efficitur. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Phasellus molestie, elit et ornare euismod, nunc mauris rhoncus mauris, vitae convallis metus libero a tellus. Nullam quis elit arcu. Nunc feugiat sem nec ante convallis pulvinar. Aenean ex ante, dignissim at nisi eget, tempus bibendum enim. Vivamus turpis est, facilisis.', '', '07/08/2020', 9, 14, 3, 3, 2, 2),
(16, 'Vide', 'space_02', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas gravida suscipit sem, vitae fringilla eros ultricies sit amet. Sed quis nibh augue. Vivamus ullamcorper eleifend efficitur. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Phasellus molestie, elit et ornare euismod, nunc mauris rhoncus mauris, vitae convallis metus libero a tellus. Nullam quis elit arcu. Nunc feugiat sem nec ante convallis pulvinar. Aenean ex ante, dignissim at nisi eget, tempus bibendum enim. Vivamus turpis est, facilisis.', '', '08/08/2020', 6, 18, 4, 2, 2, 6),
(17, 'Gigantesque !', 'space_03', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas gravida suscipit sem, vitae fringilla eros ultricies sit amet. Sed quis nibh augue. Vivamus ullamcorper eleifend efficitur. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Phasellus molestie, elit et ornare euismod, nunc mauris rhoncus mauris, vitae convallis metus libero a tellus. Nullam quis elit arcu. Nunc feugiat sem nec ante convallis pulvinar. Aenean ex ante, dignissim at nisi eget, tempus bibendum enim. Vivamus turpis est, facilisis.', '', '09/08/2020', 6, 12, 2, 1, 1, 6),
(18, 'J\'adore la neige !', 'fox_11', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas gravida suscipit sem, vitae fringilla eros ultricies sit amet. Sed quis nibh augue. Vivamus ullamcorper eleifend efficitur. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Phasellus molestie, elit et ornare euismod, nunc mauris rhoncus mauris, vitae convallis metus libero a tellus. Nullam quis elit arcu. Nunc feugiat sem nec ante convallis pulvinar. Aenean ex ante, dignissim at nisi eget, tempus bibendum enim. Vivamus turpis est, facilisis.', '', '10/08/2020', 9, 17, 2, 3, 1, 4),
(19, 'Jamais seul', 'wolf_01', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas gravida suscipit sem, vitae fringilla eros ultricies sit amet. Sed quis nibh augue. Vivamus ullamcorper eleifend efficitur. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Phasellus molestie, elit et ornare euismod, nunc mauris rhoncus mauris, vitae convallis metus libero a tellus. Nullam quis elit arcu. Nunc feugiat sem nec ante convallis pulvinar. Aenean ex ante, dignissim at nisi eget, tempus bibendum enim. Vivamus turpis est, facilisis.', '', '11/08/2020', 8, 44, 2, 2, 1, 6),
(20, 'Etrange, l\'animal', 'chameleon_07', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas gravida suscipit sem, vitae fringilla eros ultricies sit amet. Sed quis nibh augue. Vivamus ullamcorper eleifend efficitur. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Phasellus molestie, elit et ornare euismod, nunc mauris rhoncus mauris, vitae convallis metus libero a tellus. Nullam quis elit arcu. Nunc feugiat sem nec ante convallis pulvinar. Aenean ex ante, dignissim at nisi eget, tempus bibendum enim. Vivamus turpis est, facilisis.', '', '12/08/2020', 5, 19, 2, 2, 1, 6),
(21, 'La hight-tech inspiré par la nature', 'chameleon_08', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas gravida suscipit sem, vitae fringilla eros ultricies sit amet. Sed quis nibh augue. Vivamus ullamcorper eleifend efficitur. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Phasellus molestie, elit et ornare euismod, nunc mauris rhoncus mauris, vitae convallis metus libero a tellus. Nullam quis elit arcu. Nunc feugiat sem nec ante convallis pulvinar. Aenean ex ante, dignissim at nisi eget, tempus bibendum enim. Vivamus turpis est, facilisis.', '', '13/08/2020', 5, 21, 2, 3, 2, 1),
(22, 'Camouflé', 'chameleon_03', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas gravida suscipit sem, vitae fringilla eros ultricies sit amet. Sed quis nibh augue. Vivamus ullamcorper eleifend efficitur. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Phasellus molestie, elit et ornare euismod, nunc mauris rhoncus mauris, vitae convallis metus libero a tellus. Nullam quis elit arcu. Nunc feugiat sem nec ante convallis pulvinar. Aenean ex ante, dignissim at nisi eget, tempus bibendum enim. Vivamus turpis est, facilisis.', '', '14/08/2020', 3, 55, 2, 3, 1, 4),
(23, 'Un foyer chaleureux', 'house_01', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla ut volutpat nulla. Vivamus finibus turpis ipsum, in lobortis orci convallis at. Suspendisse viverra, leo quis mattis sagittis, nibh sem tristique nunc, vitae pellentesque nibh felis aliquam neque. Sed porttitor turpis quam, ac rutrum risus consequat at. Aenean elementum, dui at imperdiet ultricies, enim arcu maximus tortor, ut sollicitudin mauris leo in ex. Donec tempus tristique nunc, eget tristique lectus luctus quis. Maecenas ut sapien est. Proin vel dictum risus. Vivamus mi neque, mattis ac dolor at, blandit tristique mi. Donec in accumsan lorem, eget suscipit diam. Vivamus id nisi est.', '<p class=\"intro\">Cours pratique sur la fabrication d\'un nid pour Hibou</p>\r\n<span>- Sommaire -</span>\r\n<ul>\r\n<li>Les differents matériaux a utiliser et pourquoi ?</li>\r\n<li>EPI kézako</li>\r\n<li>Qu\'est ce qu\'un marteau et comme maitriser cet engin ?</li>\r\n<li>La nécessité d\'utiliser des clous</li>\r\n<li>Assemblé des planches de bois pour avoir la forme voulu</li>\r\n<li>L\'empreinte humaine et le sauvage</li>\r\n<li>Choix et Préparation de l\'emplacement</li>\r\n<li>Installation du nouveau logement</li>\r\n</ul>\r\n\r\n<span>- Details -</span>\r\n<ul>\r\n<li>Savoir technique rudimentaire</li>\r\n<li>Nécessite un minimum l\'outillage</li>\r\n<li>Durée totale du support : 30 min</li>\r\n</ul>', '2020/11/09', 4, 24, 3, 2, 2, 4),
(24, 'Une alternative aux lunettes polarisées', 'space_06', 'Entre autres, la boîte à éclipse solaire permet d\'observer une petite image du Soleil à travers une boîte fermée.', '<p class=\"intro\">Cours pratique sur la fabrication d\'une boite noire</p>\r\n<span>- Sommaire -</span>\r\n<ul>\r\n<li>Les differents matériaux a utiliser et pourquoi ?</li>\r\n<li>Un peu d\'optique</li>\r\n<li>L\'oeil humain</li>\r\n<li>Outillage</li>\r\n<li>Utilisation</li>\r\n</ul>\r\n\r\n<span>- Details -</span>\r\n<ul>\r\n<li>Savoir technique rudimentaire</li>\r\n<li>Nécessite un minimum l\'outillage</li>\r\n<li>Durée totale du support : 10 min</li>\r\n</ul>', '11/11/2020', 2, 15, 1, 2, 2, 1);

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
  `Id_lesson` int(11) NOT NULL,
  `Title` varchar(60) NOT NULL,
  `Picture` varchar(255) NOT NULL,
  `Describ` text NOT NULL,
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

INSERT INTO `lessons` (`Id_lesson`, `Title`, `Picture`, `Describ`, `Content`, `Date`, `Id_package`, `Price`, `Id_category`, `Id_sub_category`, `Id_formation`, `Id_niveau`) VALUES
(1, 'Minuscule', 'frog_06', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas gravida suscipit sem, vitae fringilla eros ultricies sit amet. Sed quis nibh augue. Vivamus ullamcorper eleifend efficitur. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Phasellus molestie, elit et ornare euismod, nunc mauris rhoncus mauris, vitae convallis metus libero a tellus. Nullam quis elit arcu. Nunc feugiat sem nec ante convallis pulvinar. Aenean ex ante, dignissim at nisi eget, tempus bibendum enim. Vivamus turpis est, facilisis.', '', '15/09/2020', 1, 11, 1, 3, 1, 4),
(2, 'Année lumiere ?', 'space_06', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas gravida suscipit sem, vitae fringilla eros ultricies sit amet. Sed quis nibh augue. Vivamus ullamcorper eleifend efficitur. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Phasellus molestie, elit et ornare euismod, nunc mauris rhoncus mauris, vitae convallis metus libero a tellus. Nullam quis elit arcu. Nunc feugiat sem nec ante convallis pulvinar. Aenean ex ante, dignissim at nisi eget, tempus bibendum enim. Vivamus turpis est, facilisis.', '', '16/09/2020', 7, 5, 2, 4, 1, 7),
(3, 'Ridiculement lent', 'space_04', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas gravida suscipit sem, vitae fringilla eros ultricies sit amet. Sed quis nibh augue. Vivamus ullamcorper eleifend efficitur. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Phasellus molestie, elit et ornare euismod, nunc mauris rhoncus mauris, vitae convallis metus libero a tellus. Nullam quis elit arcu. Nunc feugiat sem nec ante convallis pulvinar. Aenean ex ante, dignissim at nisi eget, tempus bibendum enim. Vivamus turpis est, facilisis.', '', '17/09/2020', 7, 7, 3, 1, 2, 2),
(4, 'Bien caché ou je bouge ?', 'frog_11', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas gravida suscipit sem, vitae fringilla eros ultricies sit amet. Sed quis nibh augue. Vivamus ullamcorper eleifend efficitur. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Phasellus molestie, elit et ornare euismod, nunc mauris rhoncus mauris, vitae convallis metus libero a tellus. Nullam quis elit arcu. Nunc feugiat sem nec ante convallis pulvinar. Aenean ex ante, dignissim at nisi eget, tempus bibendum enim. Vivamus turpis est, facilisis.', '', '18/09/2020', 10, 9, 1, 3, 1, 5),
(5, 'Les ténébreux sont tous des Alpha', 'wolf_10', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas gravida suscipit sem, vitae fringilla eros ultricies sit amet. Sed quis nibh augue. Vivamus ullamcorper eleifend efficitur. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Phasellus molestie, elit et ornare euismod, nunc mauris rhoncus mauris, vitae convallis metus libero a tellus. Nullam quis elit arcu. Nunc feugiat sem nec ante convallis pulvinar. Aenean ex ante, dignissim at nisi eget, tempus bibendum enim. Vivamus turpis est, facilisis.', '', '19/09/2020', 8, 22, 2, 1, 2, 2),
(6, 'Les chasses nocturnes redoutables', 'wolf_12', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas gravida suscipit sem, vitae fringilla eros ultricies sit amet. Sed quis nibh augue. Vivamus ullamcorper eleifend efficitur. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Phasellus molestie, elit et ornare euismod, nunc mauris rhoncus mauris, vitae convallis metus libero a tellus. Nullam quis elit arcu. Nunc feugiat sem nec ante convallis pulvinar. Aenean ex ante, dignissim at nisi eget, tempus bibendum enim. Vivamus turpis est, facilisis.', 'Un', '20/09/2020', 8, 9, 2, 1, 2, 2),
(7, 'Méfiant ou intrigué ?', 'owl_03', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas gravida suscipit sem, vitae fringilla eros ultricies sit amet. Sed quis nibh augue. Vivamus ullamcorper eleifend efficitur. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Phasellus molestie, elit et ornare euismod, nunc mauris rhoncus mauris, vitae convallis metus libero a tellus. Nullam quis elit arcu. Nunc feugiat sem nec ante convallis pulvinar. Aenean ex ante, dignissim at nisi eget, tempus bibendum enim. Vivamus turpis est, facilisis.', '<p class=\"intro\">Cours théorique sur le comportement et les habitudes du hibou.</p>\r\n<span>- Sommaire -</span>\r\n<ul>\r\n<li>La sociabilité des Hiboux</li>\r\n<li>Son rapport avec les autres especes et l\'Homme</li>\r\n<li>De la diversité comme chez les Hommes ?</li>\r\n<li>Ce qu\'il le met a l\'aise</li>\r\n<li>Ce qu\'il le met mal a l\'aise</li>\r\n</ul>\r\n<span>- Details -</span>\r\n<ul>\r\n<li>Savoir théorique de niveau Bac environ</li>\r\n<li>Nécessite d\'etre confortablement installé</li>\r\n<li>Durée totale du support : 20 min</li>\r\n</ul>', '21/09/2020', 4, 10, 3, 2, 2, 4),
(8, 'Plus présent qu\'il nid parait', 'owl_07', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas gravida suscipit sem, vitae fringilla eros ultricies sit amet. Sed quis nibh augue. Vivamus ullamcorper eleifend efficitur. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Phasellus molestie, elit et ornare euismod, nunc mauris rhoncus mauris, vitae convallis metus libero a tellus. Nullam quis elit arcu. Nunc feugiat sem nec ante convallis pulvinar. Aenean ex ante, dignissim at nisi eget, tempus bibendum enim. Vivamus turpis est, facilisis.', '<p class=\"intro\">Cours théorique sur l\'habitat du hibou. Quel est-il et pourquoi ?</p>\r\n						<span>- Sommaire -</span>\r\n						<ul>\r\n							<li>Connaitre les milieux de vie des Hiboux</li>\r\n							<li>Que mange-t-il ?</li>\r\n							<li>Ce qu\'il recherche</li>\r\n							<li>Ce qu\'il fuit</li>\r\n							<li>L\'ecosysteme don fait partie un Hibou</li>\r\n							<li>Chaine alimentaire</li>\r\n							<li>La toilette d\'un rapace</li>\r\n							<li>Solitaire ? Vraiment ?</li>\r\n						</ul>\r\n\r\n						<span>- Details -</span>\r\n						<ul>\r\n							<li>Savoir théorique de niveau Bac environ</li>\r\n							<li>Nécessite d\'etre confortablement installé</li>\r\n							<li>Durée totale du support : 20 min</li>\r\n						</ul>', '22/09/2020', 4, 5, 3, 2, 2, 4),
(9, 'Une bonne vue', 'chameleon_04', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas gravida suscipit sem, vitae fringilla eros ultricies sit amet. Sed quis nibh augue. Vivamus ullamcorper eleifend efficitur. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Phasellus molestie, elit et ornare euismod, nunc mauris rhoncus mauris, vitae convallis metus libero a tellus. Nullam quis elit arcu. Nunc feugiat sem nec ante convallis pulvinar. Aenean ex ante, dignissim at nisi eget, tempus bibendum enim. Vivamus turpis est, facilisis.', 'Deux', '23/09/2020', 3, 7, 2, 3, 1, 4),
(10, 'Branché !', 'chameleon_05', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas gravida suscipit sem, vitae fringilla eros ultricies sit amet. Sed quis nibh augue. Vivamus ullamcorper eleifend efficitur. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Phasellus molestie, elit et ornare euismod, nunc mauris rhoncus mauris, vitae convallis metus libero a tellus. Nullam quis elit arcu. Nunc feugiat sem nec ante convallis pulvinar. Aenean ex ante, dignissim at nisi eget, tempus bibendum enim. Vivamus turpis est, facilisis.', '', '24/09/2020', 3, 55, 2, 3, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `library`
--

CREATE TABLE `library` (
  `Id_library` int(11) NOT NULL,
  `Id_package` int(11) NOT NULL,
  `Id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `library`
--

INSERT INTO `library` (`Id_library`, `Id_package`, `Id_user`) VALUES
(1, 8, 2),
(2, 7, 2),
(15, 1, 3),
(16, 2, 3),
(17, 5, 3);

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
  `Num_package` int(11) NOT NULL,
  `Price_package` int(11) NOT NULL,
  `Picture_package` varchar(255) NOT NULL,
  `Title_package` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`Id_package`, `Num_package`, `Price_package`, `Picture_package`, `Title_package`) VALUES
(1, 2051, 22, 'frog_18', 'Titre 1'),
(2, 3160, 15, 'space_05', 'Titre 2'),
(3, 6402, 17, 'chamelon_02', 'Titre 3'),
(4, 9764, 61, 'owl_07', 'Titre 4'),
(5, 3465, 13, 'chameleon_06', 'Titre 5'),
(6, 7532, 41, 'space_07', 'Titre 6'),
(7, 7896, 27, 'space_01', 'Titre 7'),
(8, 3415, 34, 'wolf_03', 'Titre 8'),
(9, 5489, 64, 'fox_07', 'Titre 9'),
(10, 6521, 21, 'frog_19', 'Titre 10');

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
  `Phone` varchar(15) NOT NULL,
  `Code` varchar(30) NOT NULL,
  `Id_statut` int(11) NOT NULL,
  `Id_formation` int(11) NOT NULL,
  `Id_niveau` int(11) NOT NULL,
  `Id_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Id`, `Name`, `Firstname`, `Email`, `Password`, `Phone`, `Code`, `Id_statut`, `Id_formation`, `Id_niveau`, `Id_type`) VALUES
(1, 'Bonansea', 'Thomas', 'admin', '$2y$12$I0hbITxcFmX4Qp9o7/18SuoC6tnGN7DbtbwqufTmGmQ.hYN49U1j6', '0', '0', 2, 2, 9, 1),
(2, 'Neige', 'Jean', 'azerty@666', '$2y$12$O6zrPqzLEcGPq3aTH3Rrf.iVk7jBJ1NmJ39DgUJjh3iyKbd.qXPYm', '6', '1', 4, 2, 9, 2),
(3, 'smith', 'smith', 'smith@smith', '$2y$12$sS3q5iuqXWJ69yHH6OCyR.QXVlx4lj/DLTrLOGEwrRqNy1miIQC/W', '', '', 3, 2, 5, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`Id_article`),
  ADD KEY `Id_formation` (`Id_formation`),
  ADD KEY `Id_niveau` (`Id_niveau`),
  ADD KEY `Id_sub_category` (`Id_sub_category`),
  ADD KEY `Id_category` (`Id_category`),
  ADD KEY `Id_package` (`Id_package`);

--
-- Indexes for table `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`Id_basket`),
  ADD KEY `Id_package` (`Id_package`,`Id_user`),
  ADD KEY `Id_user` (`Id_user`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`Id_category`);

--
-- Indexes for table `exercices`
--
ALTER TABLE `exercices`
  ADD PRIMARY KEY (`Id_exercice`),
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
  ADD PRIMARY KEY (`Id_lesson`),
  ADD KEY `Id_category` (`Id_category`),
  ADD KEY `Id_sub_category` (`Id_sub_category`),
  ADD KEY `Id_formation` (`Id_formation`,`Id_niveau`),
  ADD KEY `Id_niveau` (`Id_niveau`),
  ADD KEY `Id_package` (`Id_package`);

--
-- Indexes for table `library`
--
ALTER TABLE `library`
  ADD PRIMARY KEY (`Id_library`),
  ADD KEY `Id_package` (`Id_package`),
  ADD KEY `Id_user` (`Id_user`);

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
  MODIFY `Id_article` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `basket`
--
ALTER TABLE `basket`
  MODIFY `Id_basket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `Id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `exercices`
--
ALTER TABLE `exercices`
  MODIFY `Id_exercice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `formations`
--
ALTER TABLE `formations`
  MODIFY `Id_formation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lessons`
--
ALTER TABLE `lessons`
  MODIFY `Id_lesson` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `library`
--
ALTER TABLE `library`
  MODIFY `Id_library` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  ADD CONSTRAINT `articles_ibfk_4` FOREIGN KEY (`Id_sub_category`) REFERENCES `sub_categories` (`Id_sub_category`),
  ADD CONSTRAINT `articles_ibfk_5` FOREIGN KEY (`Id_package`) REFERENCES `packages` (`Id_package`);

--
-- Constraints for table `basket`
--
ALTER TABLE `basket`
  ADD CONSTRAINT `basket_ibfk_1` FOREIGN KEY (`Id_user`) REFERENCES `users` (`Id`),
  ADD CONSTRAINT `basket_ibfk_2` FOREIGN KEY (`Id_package`) REFERENCES `packages` (`Id_package`);

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
-- Constraints for table `library`
--
ALTER TABLE `library`
  ADD CONSTRAINT `library_ibfk_1` FOREIGN KEY (`Id_package`) REFERENCES `packages` (`Id_package`),
  ADD CONSTRAINT `library_ibfk_2` FOREIGN KEY (`Id_user`) REFERENCES `users` (`Id`);

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
