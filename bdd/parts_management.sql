-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Mer 13 Février 2019 à 10:53
-- Version du serveur :  5.7.24-0ubuntu0.18.04.1
-- Version de PHP :  7.2.15-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `parts_management`
--

-- --------------------------------------------------------

--
-- Structure de la table `famille`
--

CREATE TABLE `famille` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `famille`
--

INSERT INTO `famille` (`id`, `name`) VALUES
(1, 'Moteur'),
(2, 'Boîte de vitesse'),
(3, 'Pont'),
(4, 'Suspension'),
(5, 'Essieu'),
(6, 'Instrument'),
(7, 'Cabine'),
(8, 'Autres 1'),
(9, 'Autres 2');

-- --------------------------------------------------------

--
-- Structure de la table `fournisseur`
--

CREATE TABLE `fournisseur` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `fournisseur`
--

INSERT INTO `fournisseur` (`id`, `name`) VALUES
(1, 'Mercedes'),
(2, 'FEBI'),
(3, 'EURORICAMBI'),
(4, 'Autre 1'),
(5, 'Autre 2');

-- --------------------------------------------------------

--
-- Structure de la table `migration_versions`
--

CREATE TABLE `migration_versions` (
  `version` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `migration_versions`
--

INSERT INTO `migration_versions` (`version`) VALUES
('20190107100520'),
('20190108164941'),
('20190108170715'),
('20190108170908'),
('20190108171157'),
('20190110095829');

-- --------------------------------------------------------

--
-- Structure de la table `mouvement`
--

CREATE TABLE `mouvement` (
  `id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `dimension` decimal(10,2) NOT NULL,
  `weight` decimal(10,2) DEFAULT NULL,
  `machine_attribution` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `type` int(11) NOT NULL,
  `fournisseur_id` int(11) DEFAULT NULL,
  `famille_id` int(11) DEFAULT NULL,
  `sous_famille_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `mouvement`
--

INSERT INTO `mouvement` (`id`, `quantity`, `dimension`, `weight`, `machine_attribution`, `created_at`, `type`, `fournisseur_id`, `famille_id`, `sous_famille_id`) VALUES
(1, 2, '3.00', '2.50', NULL, '2019-01-10 10:26:06', 1, 2, 3, 8),
(2, 2, '3.00', '2.50', NULL, '2019-01-10 10:30:18', 1, 2, 3, 8),
(3, 20, '3.00', '6.50', NULL, '2019-01-10 10:59:33', 1, 2, 1, 4),
(4, 7, '2.00', '1.50', NULL, '2019-01-10 11:00:45', 1, 2, 2, 6),
(5, 2, '1.00', '3.00', NULL, '2019-01-15 16:24:29', 1, 3, 4, NULL),
(6, 5, '1.00', '2.00', NULL, '2019-01-15 16:32:01', 1, 3, 4, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `piece`
--

CREATE TABLE `piece` (
  `id` int(11) NOT NULL,
  `fournisseur_id` int(11) DEFAULT NULL,
  `famille_id` int(11) DEFAULT NULL,
  `sous_famille_id` int(11) DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stock_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `piece`
--

INSERT INTO `piece` (`id`, `fournisseur_id`, `famille_id`, `sous_famille_id`, `location`, `stock_quantity`) VALUES
(1, 1, 1, 1, '6|2|3', 10),
(2, 2, 2, 6, '1|2|4', 12),
(3, 2, 1, 4, '||5', 20),
(4, 3, 4, NULL, '1|1|1', 7);

-- --------------------------------------------------------

--
-- Structure de la table `sous_famille`
--

CREATE TABLE `sous_famille` (
  `id` int(11) NOT NULL,
  `famille_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `sous_famille`
--

INSERT INTO `sous_famille` (`id`, `famille_id`, `name`) VALUES
(1, 1, '2638'),
(2, 1, 'MP1'),
(3, 1, 'MP2'),
(4, 1, 'MP3'),
(5, 2, 'G155'),
(6, 2, 'G210'),
(7, 2, 'G240'),
(8, 3, 'Avant'),
(9, 3, 'Arrière 1'),
(10, 3, 'Arrière 2'),
(11, 3, 'Interpont'),
(12, 4, 'Avant'),
(13, 4, 'Arrière'),
(14, 5, 'Avant'),
(15, 5, 'Arrière 1'),
(16, 5, 'Arrière 2'),
(17, 6, 'Module'),
(18, 6, 'Capteur'),
(19, 6, 'Indicateur'),
(20, 6, 'Autre 1'),
(21, 6, 'Autre 2');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `famille`
--
ALTER TABLE `famille`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `fournisseur`
--
ALTER TABLE `fournisseur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migration_versions`
--
ALTER TABLE `migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `mouvement`
--
ALTER TABLE `mouvement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_5B51FC3E670C757F` (`fournisseur_id`),
  ADD KEY `IDX_5B51FC3E97A77B84` (`famille_id`),
  ADD KEY `IDX_5B51FC3E71DF2E6E` (`sous_famille_id`);

--
-- Index pour la table `piece`
--
ALTER TABLE `piece`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_44CA0B23670C757F` (`fournisseur_id`),
  ADD KEY `IDX_44CA0B2397A77B84` (`famille_id`),
  ADD KEY `IDX_44CA0B2371DF2E6E` (`sous_famille_id`);

--
-- Index pour la table `sous_famille`
--
ALTER TABLE `sous_famille`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_77A8A5E97A77B84` (`famille_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `famille`
--
ALTER TABLE `famille`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `fournisseur`
--
ALTER TABLE `fournisseur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `mouvement`
--
ALTER TABLE `mouvement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `piece`
--
ALTER TABLE `piece`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `sous_famille`
--
ALTER TABLE `sous_famille`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `mouvement`
--
ALTER TABLE `mouvement`
  ADD CONSTRAINT `FK_5B51FC3E670C757F` FOREIGN KEY (`fournisseur_id`) REFERENCES `fournisseur` (`id`),
  ADD CONSTRAINT `FK_5B51FC3E71DF2E6E` FOREIGN KEY (`sous_famille_id`) REFERENCES `sous_famille` (`id`),
  ADD CONSTRAINT `FK_5B51FC3E97A77B84` FOREIGN KEY (`famille_id`) REFERENCES `famille` (`id`);

--
-- Contraintes pour la table `piece`
--
ALTER TABLE `piece`
  ADD CONSTRAINT `FK_44CA0B23670C757F` FOREIGN KEY (`fournisseur_id`) REFERENCES `fournisseur` (`id`),
  ADD CONSTRAINT `FK_44CA0B2371DF2E6E` FOREIGN KEY (`sous_famille_id`) REFERENCES `sous_famille` (`id`),
  ADD CONSTRAINT `FK_44CA0B2397A77B84` FOREIGN KEY (`famille_id`) REFERENCES `famille` (`id`);

--
-- Contraintes pour la table `sous_famille`
--
ALTER TABLE `sous_famille`
  ADD CONSTRAINT `FK_77A8A5E97A77B84` FOREIGN KEY (`famille_id`) REFERENCES `famille` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
