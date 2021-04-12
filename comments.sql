-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : lun. 12 avr. 2021 à 17:41
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
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `film_id` int(11) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `date`, `user_id`, `film_id`, `text`) VALUES
(1, '2021-03-31', 34, 222, 'Cool film !!!'),
(2, '2021-03-03', 34, 234, 'Je n\'ai rien pigé.'),
(4, '2021-04-14', 34, 222, 'Wow!'),
(36, '2021-04-08', 41, 32574, 'super film!\r\n'),
(37, '2021-04-08', 35, 578, 'Le meilleur film du monde entier ! '),
(38, '2021-04-08', 45, 593, 'Y a que des vieux films en noir et blanc sur ce site... vraiment domage'),
(39, '2021-04-08', 48, 20530, 'Moi non plus je ne veux pas me marier.'),
(40, '2021-04-09', 35, 618, 'Quel film raciste!'),
(41, '2021-04-09', 35, 895, 'Magnifique film, recommandé 100%'),
(42, '2021-04-09', 35, 82120, 'Bravo, le meilleur arroseur du monde.');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
