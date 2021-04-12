-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : lun. 12 avr. 2021 à 17:44
-- Version du serveur :  10.3.16-MariaDB
-- Version de PHP : 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `id16499719_retroflix`
--

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `pseudo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `valid` tinyint(1) NOT NULL DEFAULT 0,
  `recovery` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `date`, `pseudo`, `email`, `admin`, `password`, `avatar`, `valid`, `recovery`) VALUES
(35, '2021-04-07', 'kloureiro', 'Nosoypan@gmail.com', 0, '$2y$10$BVg7p9u2SrvtG7kGw6hD3OitqhucfuYnk1wwccEdu9FwRO/xJ1/wq', 'avatar/606dbd86b6f8akloureiro.jpg', 1, 'iW7HefdmLl4pa3m1MIsjHIEhfxO27Hm5MdGsMSfdO1GeyQUbAMynekZHJ36MuRnekg7Q5AiyCIsGjTwo6hotDr5wd89VT94y5Iq6'),
(36, '2021-04-08', 'paulo', 'paulolvsn@gmail.com', 1, '$2y$10$6NmafPh8JqzIpJv20K3YX.hFK2qMywg0Wt3OJ0j3CC8hOBbZa0S0i', 'avatar/606eab7a90b67waking.jpeg', 1, 'igED20UdyWk455lGVmZDHvMXpPXbFW5JkocxANbDbyBgueNWrkLkNbBru1t3gIPILGP7oGxabYeQHjtTlvwE6leoQaz6NzrSJENW'),
(46, '2021-04-08', 'gui', 'guillaumeazer@gmail.com', 0, '$2y$10$mLQ2u8OtpI0/bGMpGZfznuBqIED7aQSGupSW.SpN2MGOcgjaq/kbm', 'avatar/606f1324188f3arrow-down-square.jpg', 1, ''),
(47, '2021-04-08', 'guillaume', 'quet.guillaume.leo@gmail.com', 1, '$2y$10$rHGVCFBIIDh5sjcptq2pM.1iP3NRZ2XFas83neqnDs9.qILst5zF6', 'avatar/60705dbb04ae2arrow-down-square.jpg', 1, ''),
(48, '2021-04-08', 'cazsely', 'richardsmariagabriela@gmail.com', 1, '$2y$10$V0zdTv2CX85Ktus6xrWt/uobzpQtJjqjsAbxWeYB7AwMszxiuKmvC', 'avatar/606f1d6a5eb75lenin.png', 1, ''),
(51, '2021-04-12', 'marcelo', 'luisromeroaraya@gmail.com', 1, '$2y$10$qRm0D.u39uiArpncIzUNmubAtHto1SZ44t9Ia5b2f9mTV313Q6gL6', 'avatar/607464ef6a589marcelo.jpg', 1, '');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
