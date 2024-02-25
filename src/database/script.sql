-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 16 jan. 2024 à 15:19
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `cinet`
--

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `IDCOMMANDE` int(11) NOT NULL,
  `IDCLIENT` int(128) DEFAULT NULL,
  `MONTANT` varchar(200) DEFAULT NULL,
  `CURRENCY` varchar(3) NOT NULL,
  `TRANSID` varchar(200) DEFAULT NULL,
  `ABONNEMENT` varchar(200) DEFAULT NULL,
  `METHODE` varchar(200) DEFAULT NULL,
  `PAYID` varchar(200) DEFAULT NULL,
  `BUYERNAME` varchar(200) DEFAULT NULL,
  `BUYERSURNAME` varchar(25) NOT NULL,
  `DESCRIPTION` text NOT NULL,
  `CHANNELS` varchar(25) NOT NULL,
  `TRANSSTATUS` varchar(200) DEFAULT NULL,
  `SIGNATURE` varchar(200) DEFAULT NULL,
  `EMAIL` varchar(45) NOT NULL,
  `PHONE` varchar(200) DEFAULT NULL,
  `BUYERADDRESS` varchar(45) NOT NULL,
  `CITY` varchar(45) NOT NULL,
  `COUNTRY` varchar(45) NOT NULL,
  `BUYERSTATE` varchar(15) NOT NULL,
  `CODEPOSTAL` int(15) NOT NULL,
  `ERRORMESSAGE` varchar(200) DEFAULT NULL,
  `STATUT` varchar(200) DEFAULT NULL,
  `DATECREATION` datetime DEFAULT NULL,
  `DATEMODIFICATION` datetime DEFAULT NULL,
  `DATEPAIEMENT` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`IDCOMMANDE`, `IDCLIENT`, `MONTANT`, `CURRENCY`, `TRANSID`, `ABONNEMENT`, `METHODE`, `PAYID`, `BUYERNAME`, `BUYERSURNAME`, `DESCRIPTION`, `CHANNELS`, `TRANSSTATUS`, `SIGNATURE`, `EMAIL`, `PHONE`, `BUYERADDRESS`, `CITY`, `COUNTRY`, `BUYERSTATE`, `CODEPOSTAL`, `ERRORMESSAGE`, `STATUT`, `DATECREATION`, `DATEMODIFICATION`, `DATEPAIEMENT`) VALUES
(9, 0, '45100', 'XOF', '20240113221131', NULL, NULL, NULL, 'nova', 'super', 'Classical Mythology (x1)Author: Mark P. O. MorfordOUT OF THE SILENT PLANET (x1)Author: C.S. Lewis', 'ALL', NULL, NULL, 'support@kondronetworks.com', '002250769469844', 'Abidjan Cocody RI13', 'Abidjan', 'CI', 'Lagunes', 0, NULL, NULL, '2024-01-13 22:11:31', NULL, NULL),
(10, 65, '45100', 'XOF', '20240113222910', NULL, NULL, NULL, 'nova', 'super', 'Classical Mythology (x1)Author: Mark P. O. MorfordOUT OF THE SILENT PLANET (x1)Author: C.S. Lewis', 'ALL', NULL, NULL, 'support@kondronetworks.com', '002250769469844', 'Abidjan Cocody RI13', 'Abidjan', 'CI', 'Lagunes', 0, NULL, NULL, '2024-01-13 22:29:10', NULL, NULL),
(11, 65, '45100', 'XOF', '20240113223007', NULL, NULL, NULL, 'nova', 'super', 'Classical Mythology (x1)Author: Mark P. O. MorfordOUT OF THE SILENT PLANET (x1)Author: C.S. Lewis', 'ALL', NULL, NULL, 'support@kondronetworks.com', '002250769469844', 'Abidjan Cocody RI13', 'Abidjan', 'CI', 'Lagunes', 0, NULL, NULL, '2024-01-13 22:30:07', NULL, NULL),
(12, 65, '29000', 'XOF', '20240113224644', NULL, NULL, NULL, 'nova', 'super', 'Galileo\'s Daughter: A Historical Memoir of Science, Faith, and Love (x1)Author: Dava SobelZachary Taylor: Soldier, Planter, Statesman of the Old Southwest (x1)Author: K. Jack Bauer', 'ALL', NULL, NULL, 'support@kondronetworks.com', '002250769469844', 'Abidjan Cocody RI13', 'Abidjan', 'CI', 'Lagunes', 0, NULL, NULL, '2024-01-13 22:46:44', NULL, NULL),
(13, 65, '207000', 'XOF', '20240113230120', NULL, NULL, NULL, 'nova', 'super', 'Life\'s Little Instruction Book (Life\'s Little Instruction Books (Paperback)) (x1)Author: H. Jackson BrownStarship Troopers (x1)Author: Robert A. HeinleinAn Atmosphere of Eternity: Stories of India (x1)Author: David Iglehart', 'ALL', NULL, NULL, 'support@kondronetworks.com', '002250769469844', 'Abidjan Cocody RI13', 'Abidjan', 'CI', 'Lagunes', 0, NULL, NULL, '2024-01-13 23:01:20', NULL, NULL),
(14, 65, '164000', 'XOF', '20240113230913', NULL, NULL, NULL, 'nova', 'super', 'OUT OF THE SILENT PLANET (x2)Author: C.S. LewisFlu: The Story of the Great Influenza Pandemic of 1918 and the Search for the Virus That Caused It (x1)Author: Gina Bari KolataInto the Wild (x1)Author: Jon KrakauerChocolate Jesus (x2)Author: Stephan Jaramillo', 'ALL', NULL, NULL, 'support@kondronetworks.com', '002250769469844', 'Abidjan Cocody RI13', 'Abidjan', 'CI', 'Lagunes', 0, NULL, NULL, '2024-01-13 23:09:13', NULL, NULL),
(15, 65, '164000', 'XOF', '20240113230916', NULL, NULL, NULL, 'nova', 'super', 'OUT OF THE SILENT PLANET (x2)Author: C.S. LewisFlu: The Story of the Great Influenza Pandemic of 1918 and the Search for the Virus That Caused It (x1)Author: Gina Bari KolataInto the Wild (x1)Author: Jon KrakauerChocolate Jesus (x2)Author: Stephan Jaramillo', 'ALL', NULL, NULL, 'support@kondronetworks.com', '002250769469844', 'Abidjan Cocody RI13', 'Abidjan', 'CI', 'Lagunes', 0, NULL, NULL, '2024-01-13 23:09:16', NULL, NULL),
(16, 65, '164000', 'XOF', '20240113230950', NULL, NULL, NULL, 'nova', 'super', 'OUT OF THE SILENT PLANET (x2)Author: C.S. LewisFlu: The Story of the Great Influenza Pandemic of 1918 and the Search for the Virus That Caused It (x1)Author: Gina Bari KolataInto the Wild (x1)Author: Jon KrakauerChocolate Jesus (x2)Author: Stephan Jaramillo', 'ALL', NULL, NULL, 'support@kondronetworks.com', '002250769469844', 'Abidjan Cocody RI13', 'Abidjan', 'CI', 'Lagunes', 0, NULL, NULL, '2024-01-13 23:09:50', NULL, NULL),
(17, 65, '164000', 'XOF', '20240113231033', NULL, NULL, NULL, 'nova', 'super', 'OUT OF THE SILENT PLANET (x2)Author: C.S. LewisFlu: The Story of the Great Influenza Pandemic of 1918 and the Search for the Virus That Caused It (x1)Author: Gina Bari KolataInto the Wild (x1)Author: Jon KrakauerChocolate Jesus (x2)Author: Stephan Jaramillo', 'ALL', NULL, NULL, 'support@kondronetworks.com', '002250769469844', 'Abidjan Cocody RI13', 'Abidjan', 'CI', 'Lagunes', 0, NULL, NULL, '2024-01-13 23:10:33', NULL, NULL),
(18, 65, '200', 'XOF', '20240115112435', NULL, NULL, NULL, 'nova', 'super', 'Classical Mythology (x1)Author: Mark P. O. MorfordClara Callan (x1)Author: Richard Bruce Wright', 'ALL', NULL, NULL, 'support@kondronetworks.com', '002250769469844', 'Abidjan Cocody RI13', 'Abidjan', 'CI', 'Lagunes', 0, NULL, NULL, '2024-01-15 11:24:35', NULL, NULL),
(19, 65, '77000', 'XOF', '20240115112602', NULL, NULL, NULL, 'nova', 'super', 'OUT OF THE SILENT PLANET (x1)Author: C.S. LewisFlu: The Story of the Great Influenza Pandemic of 1918 and the Search for the Virus That Caused It (x1)Author: Gina Bari Kolata', 'ALL', NULL, NULL, 'support@kondronetworks.com', '002250769469844', 'Abidjan Cocody RI13', 'Abidjan', 'CI', 'Lagunes', 0, NULL, NULL, '2024-01-15 11:26:02', NULL, NULL),
(20, 65, '8000', 'XOF', '20240116124031', NULL, NULL, NULL, 'nova', 'super', 'OUT OF THE SILENT PLANET (x2)Author: C.S. Lewis', 'ALL', NULL, NULL, 'support@kondronetworks.com', '002250769469844', 'Abidjan Cocody RI13', 'Abidjan', 'CI', 'Lagunes', 0, NULL, NULL, '2024-01-16 12:40:31', NULL, NULL),
(21, 65, '8000', 'XOF', '20240116124032', NULL, NULL, NULL, 'nova', 'super', 'OUT OF THE SILENT PLANET (x2)Author: C.S. Lewis', 'ALL', NULL, NULL, 'support@kondronetworks.com', '002250769469844', 'Abidjan Cocody RI13', 'Abidjan', 'CI', 'Lagunes', 0, NULL, NULL, '2024-01-16 12:40:32', NULL, NULL),
(22, 65, '8000', 'XOF', '20240116124123', NULL, NULL, NULL, 'nova', 'super', 'OUT OF THE SILENT PLANET (x2)Author: C.S. Lewis', 'ALL', NULL, NULL, 'support@kondronetworks.com', '002250769469844', 'Abidjan Cocody RI13', 'Abidjan', 'CI', 'Lagunes', 0, NULL, NULL, '2024-01-16 12:41:23', NULL, NULL),
(23, 65, '23500', 'XOF', '20240116124159', NULL, NULL, NULL, 'nova', 'super', 'The Accidental Virgin (x1)Author: Valerie FrankelThe Tao of Pooh (x1)Author: Benjamin HoffSeabiscuit (x1)Author: LAURA HILLENBRAND', 'ALL', NULL, NULL, 'support@kondronetworks.com', '002250769469844', 'Abidjan Cocody RI13', 'Abidjan', 'CI', 'Lagunes', 0, NULL, NULL, '2024-01-16 12:41:59', NULL, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`IDCOMMANDE`),
  ADD KEY `pk_commande` (`IDCOMMANDE`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `IDCOMMANDE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
