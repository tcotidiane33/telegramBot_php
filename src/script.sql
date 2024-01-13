-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 13 jan. 2024 à 21:27
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
  `IDCOMMANDE` int(128) NOT NULL,
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
  `ADDRESS` varchar(45) NOT NULL,
  `CITY` varchar(45) NOT NULL,
  `COUNTRY` varchar(45) NOT NULL,
  `STATE` varchar(15) NOT NULL,
  `CODEPOSTAL` int(15) NOT NULL,
  `ERRORMESSAGE` varchar(200) DEFAULT NULL,
  `STATUT` varchar(200) DEFAULT NULL,
  `DATECREATION` datetime DEFAULT NULL,
  `DATEMODIFICATION` datetime DEFAULT NULL,
  `DATEPAIEMENT` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
  MODIFY `IDCOMMANDE` int(128) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
