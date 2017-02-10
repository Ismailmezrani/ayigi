-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 10 Février 2017 à 18:45
-- Version du serveur :  5.7.11
-- Version de PHP :  7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ayigi`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE `administrateur` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `datedenaissance` date NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` int(11) DEFAULT NULL,
  `datederniereconnexion` date NOT NULL,
  `profil` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `administrateur`
--

INSERT INTO `administrateur` (`id`, `nom`, `prenom`, `datedenaissance`, `email`, `telephone`, `datederniereconnexion`, `profil`, `username`, `password`, `roles`) VALUES
(2, 'King', 'test', '2011-01-01', 'test@test', 8098766, '2011-01-01', 'Super Admin', 'prince', 'prince', 'a:1:{i:0;s:10:"ROLE_ADMIN";}'),
(4, 'user', 'user', '2011-01-01', 'user@gl.com', 98767768, '2011-01-01', 'Superviseur', 'user', '$2y$13$Lmkm4corE1zQ/tTApuuyFuQdBvSb4Wa6tDX82fcFtGkbnnYNrXBpW', 'a:1:{i:0;s:10:"ROLE_ADMIN";}'),
(5, 'prince', 'carter', '2011-01-01', 'teste@gmm.com', 98764354, '2016-11-26', 'Super Admin', 'ettet', '$2y$13$Lmkm4corE1zQ/tTApuuyFuQdBvSb4Wa6tDX82fcFtGkbnnYNrXBpW', 'a:1:{i:0;s:10:"ROLE_ADMIN";}'),
(6, 'ali', 'ali', '2011-01-01', 'ali', 0, '2016-11-26', 'Super Admin', 'ali', '$2y$13$Lmkm4corE1zQ/tTApuuyFuQdBvSb4Wa6tDX82fcFtGkbnnYNrXBpW', 'a:1:{i:0;s:10:"ROLE_ADMIN";}'),
(10, 'kiiik', 'kiiik', '2012-01-01', 'kkkkk@gmi.com', 556, '2012-01-01', NULL, 'mplp', '$2y$13$fiNYhw9krqEdSQg8NgDqaeFLF.wDiFCuPJl8QNgEfu3TTsJ0e5Du6', 'a:1:{i:0;s:10:"ROLE_ADMIN";}');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `numeroclient` int(11) NOT NULL,
  `datedenaissance` date NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` int(11) DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`id`, `nom`, `prenom`, `numeroclient`, `datedenaissance`, `email`, `telephone`, `username`, `password`, `roles`) VALUES
(1, 'ismail', 'mezrani', 2, '2012-02-03', 'ismai@gmail.com', 5264, 'Isma', '', 'a:1:{i:0;s:11:"ROLE_CLIENT";}'),
(2, 'ismail', 'ismail', 222, '2014-02-03', 'ssss@gmail.com', 592, 'Ismail', '', 'a:1:{i:0;s:11:"ROLE_CLIENT";}'),
(4, 'ismail', 'dd', 4, '2012-01-01', 'dsss@gmail.com', 6666, 'ismail2', '', 'a:1:{i:0;s:11:"ROLE_CLIENT";}'),
(5, 'ss', 'mezrani', 3, '2012-01-01', 'sssss@gmail.com', 5, 'oooo', '', 'a:1:{i:0;s:11:"ROLE_CLIENT";}'),
(9, 'ismail', 'ismail', 36, '2012-01-01', 'is@gmail.com', 3665, 'dd', '', 'a:1:{i:0;s:11:"ROLE_CLIENT";}'),
(11, 'ismail', 'ismail', 367, '2012-01-01', 'is@gmail.coms', 3665, 'ddmm', '', 'a:1:{i:0;s:11:"ROLE_CLIENT";}'),
(13, 'ismail', 'ismail', 3672, '2012-01-01', 'is@gmail.comffs', 3665, 'ddmmdd', '', 'a:1:{i:0;s:11:"ROLE_CLIENT";}'),
(14, 'ismail', 'ismail', 36722, '2012-01-01', 'is@gmail.comffss', 36654, 'ddmmddss', '', 'a:1:{i:0;s:11:"ROLE_CLIENT";}'),
(17, 'ismail', 'ismail', 3672211, '2012-01-01', 'isff@gmail.comffsss', 366542, 'ssss', '', 'a:1:{i:0;s:11:"ROLE_CLIENT";}'),
(18, 'ismail', 'ismail', 36722111, '2012-01-01', 'isff@gmail.comffssss', 366542, 'ssssf', '', 'a:1:{i:0;s:11:"ROLE_CLIENT";}'),
(21, 'ddd', 'dsds', 6, '2012-01-01', '65@gmail.com', 64, 'mdr', '$2y$13$Lmkm4corE1zQ/tTApuuyFuQdBvSb4Wa6tDX82fcFtGkbnnYNrXBpW', 'a:1:{i:0;s:11:"ROLE_CLIENT";}'),
(23, 'ismail', 'dd', 35557, '2012-01-01', 'loool1@gm.com', 4, 'loll1', '$2y$13$tAU09HMATFvu6x5adiWVt.bf2BNJeQqHt8KUB2Nh6lkXd5NaoMl7y', 'a:1:{i:0;s:11:"ROLE_CLIENT";}'),
(25, 'lool', 'lool', 612321, '2012-01-01', 'admin@gmail.com', 56151, 'admin1', '$2y$13$PLh6jBJRVz6vL/9S4KI0UOE2MW6TP7xPnPeXPlawayPcPRiSDdARW', 'a:1:{i:0;s:10:"ROLE_ADMIN";}'),
(26, 'lool', 'lool', 587, '2012-01-01', 'mppl@gmail.com', 2545, 'ppp', '$2y$13$qVuP3pWPXBKLIT405ubzbum5gV/Ue8XRgfG1VvTxViNJdxzzBRsl6', 'a:1:{i:0;s:11:"ROLE_CLIENT";}'),
(28, 'lools', 'sss', 1561, '2012-01-01', 'ssdss@gmail.com', 4454, 'sss', '$2y$13$0fuKDspOpjHjcEnTNf7nvedoHQIyC5DCtYz7nnjo.75jJ.CAHqs4e', 'a:1:{i:0;s:11:"ROLE_CLIENT";}'),
(29, 'cxc', 'ccc', 478, '2012-01-01', 'ccc@gmail.com', 84984, 'cc', '$2y$13$GXIWDY1sMKhu3h9pzCKQKuTh1mFURN23QXbV99g8ta/ds28o4GOxy', 'a:1:{i:0;s:11:"ROLE_CLIENT";}'),
(30, 'MEZRANI', 'ISMAIL', 262, '2012-01-01', 'ismailmezrani@gmail.com', 659456816, 'ismail1', '$2y$13$97fxkZCNILsAxahPrR.IeulhXE9EDB1YMSw8XtrkG8o5Oe7jNW/16', 'a:1:{i:0;s:11:"ROLE_CLIENT";}');

-- --------------------------------------------------------

--
-- Structure de la table `devise`
--

CREATE TABLE `devise` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `taux` double DEFAULT NULL,
  `full_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `devise`
--

INSERT INTO `devise` (`id`, `nom`, `taux`, `full_name`) VALUES
(1, 'EUR', 0.8764, 'EURO'),
(2, 'USD', 0.987, 'DOLLAR'),
(3, 'GNF', 0, 'Franc guinéen'),
(4, 'XOF', 0, 'Franc CFA'),
(5, 'TND', NULL, 'Dinar tunisien');

-- --------------------------------------------------------

--
-- Structure de la table `etablissement`
--

CREATE TABLE `etablissement` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `adresse` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ville` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `codepostal` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `datecreation` date NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `etablissement`
--

INSERT INTO `etablissement` (`id`, `nom`, `adresse`, `ville`, `codepostal`, `telephone`, `email`, `datecreation`, `username`, `password`, `roles`) VALUES
(2, 'K12', 'k1sada 262', 'K1s', '2561', '556', 'k1@gmail.com', '2017-02-07', 'k1admin', '$2y$13$iTI/JUrhnDFwr7iEvFCJiOgOM3CUv6Vl94QQzZX1xmQq8ru5qK4dK', 'a:1:{i:0;s:15:"ROLE_PARTENAIRE";}'),
(3, 'lool', 'lool', 'loool', '564654', '65465465', 'lool@gmaiL.com', '2017-02-01', 'kkkkk', '$2y$13$iTI/JUrhnDFwr7iEvFCJiOgOM3CUv6Vl94QQzZX1xmQq8ru5qK4dK', 'a:1:{i:0;s:15:"ROLE_PARTENAIRE";}'),
(4, 'ddd', 'loool', 'tunise', '265', 'ddd', 'ddd@mail.com', '2017-02-10', '3d', '$2y$13$nG63FM97tVJCXcXfjkjD4ehTaIWZli/oN4uuK7PXdzuyvDzLqQYIq', 'a:1:{i:0;s:15:"ROLE_PARTENAIRE";}');

-- --------------------------------------------------------

--
-- Structure de la table `etablissement_pays_destination`
--

CREATE TABLE `etablissement_pays_destination` (
  `etablissement_id` int(11) NOT NULL,
  `pays_destination_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `etablissement_pays_destination`
--

INSERT INTO `etablissement_pays_destination` (`etablissement_id`, `pays_destination_id`) VALUES
(2, 1),
(3, 4),
(4, 6),
(4, 7);

-- --------------------------------------------------------

--
-- Structure de la table `paiement_done`
--

CREATE TABLE `paiement_done` (
  `id` int(11) NOT NULL,
  `client_id` int(11) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  `pays_destination_id` int(11) DEFAULT NULL,
  `etablissements_id` int(11) DEFAULT NULL,
  `devise_id` int(11) DEFAULT NULL,
  `datepaiement` date DEFAULT NULL,
  `montant` int(11) DEFAULT NULL,
  `montantrecu` double DEFAULT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prenom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telephone` int(11) DEFAULT NULL,
  `message` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `etat` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `paiement_done`
--

INSERT INTO `paiement_done` (`id`, `client_id`, `service_id`, `pays_destination_id`, `etablissements_id`, `devise_id`, `datepaiement`, `montant`, `montantrecu`, `nom`, `prenom`, `telephone`, `message`, `etat`) VALUES
(1, NULL, 4, 1, NULL, NULL, '2017-02-10', NULL, NULL, 'dd', 'dd', 223123, 'cdc', 0),
(2, NULL, 4, 1, NULL, NULL, '2017-02-10', NULL, NULL, 'fff', 'ff', 365, 'ddd', 0),
(3, NULL, 4, 1, NULL, NULL, '2017-02-10', NULL, NULL, 'ddd', 'dd', 3, 'dd', 0),
(4, NULL, 4, 1, NULL, NULL, '2017-02-10', NULL, NULL, 'dd', NULL, NULL, NULL, 0),
(5, NULL, 4, 1, NULL, NULL, '2017-02-10', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(6, NULL, 4, 1, NULL, NULL, '2017-02-10', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(7, NULL, 4, 1, NULL, NULL, '2017-02-10', NULL, NULL, 'd', NULL, NULL, 'dd', 0),
(8, NULL, 4, 1, NULL, NULL, '2017-02-10', NULL, NULL, 'd', NULL, NULL, 'dd', 0),
(9, NULL, 4, 1, NULL, NULL, '2017-02-10', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(10, 26, 4, 1, 2, 1, '2017-02-10', 200, 1986219.925, NULL, NULL, NULL, NULL, 1),
(11, NULL, 4, 1, NULL, NULL, '2017-02-10', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(12, NULL, 4, 1, NULL, NULL, '2017-02-10', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(13, NULL, 4, 1, NULL, NULL, '2017-02-10', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(14, NULL, 4, 1, NULL, NULL, '2017-02-10', NULL, NULL, 'ddd', NULL, NULL, NULL, 0),
(15, NULL, 4, 1, NULL, NULL, '2017-02-10', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(16, NULL, 4, 1, NULL, NULL, '2017-02-10', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(17, NULL, 4, 1, NULL, NULL, '2017-02-10', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(18, NULL, 4, 1, NULL, NULL, '2017-02-10', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(19, NULL, 4, 1, NULL, NULL, '2017-02-10', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(20, NULL, 4, 1, NULL, NULL, '2017-02-10', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(21, NULL, 4, 1, NULL, NULL, '2017-02-10', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(22, NULL, 4, 1, NULL, NULL, '2017-02-10', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(23, NULL, 4, 1, NULL, NULL, '2017-02-10', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(24, NULL, 4, 1, NULL, NULL, '2017-02-10', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(25, NULL, 4, 1, NULL, NULL, '2017-02-10', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(26, NULL, 4, 1, NULL, NULL, '2017-02-10', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(27, NULL, 4, 1, NULL, NULL, '2017-02-10', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(28, NULL, 4, 1, NULL, NULL, '2017-02-10', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(29, NULL, 4, 1, NULL, NULL, '2017-02-10', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(30, NULL, 4, 1, NULL, NULL, '2017-02-10', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(31, NULL, 4, 1, NULL, NULL, '2017-02-10', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(32, NULL, 4, 1, NULL, NULL, '2017-02-10', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(33, NULL, 4, 1, NULL, NULL, '2017-02-10', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(34, NULL, 4, 1, NULL, NULL, '2017-02-10', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(35, NULL, 4, 1, NULL, NULL, '2017-02-10', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(36, NULL, 4, 1, NULL, NULL, '2017-02-10', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(37, NULL, 4, 1, NULL, NULL, '2017-02-10', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(38, 26, 4, 1, 2, 1, '2017-02-10', 25, 248277.495, NULL, NULL, NULL, NULL, 1),
(39, NULL, 4, 1, NULL, NULL, '2017-02-10', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(40, NULL, 4, 1, NULL, NULL, '2017-02-10', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(41, NULL, 4, 1, NULL, NULL, '2017-02-10', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(42, NULL, 4, 1, NULL, NULL, '2017-02-10', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(43, NULL, 4, 1, NULL, NULL, '2017-02-10', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(44, NULL, 4, 1, NULL, NULL, '2017-02-10', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(45, NULL, 4, 1, NULL, NULL, '2017-02-10', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(46, NULL, 4, 1, NULL, NULL, '2017-02-10', NULL, NULL, NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Structure de la table `pays_destination`
--

CREATE TABLE `pays_destination` (
  `id` int(11) NOT NULL,
  `continent` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `codepostal` int(11) DEFAULT NULL,
  `devis_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `pays_destination`
--

INSERT INTO `pays_destination` (`id`, `continent`, `nom`, `codepostal`, `devis_id`) VALUES
(1, 'Africa', 'Guinée', 224, 3),
(3, 'Africa', 'Senegale', 221, 4),
(4, 'Africa', 'Mali', 223, 4),
(5, 'Africa', 'Côte d\'ivoire', 225, 4),
(6, 'Europe', 'France', 331, 1),
(7, 'Afrique', 'tunisie', 522, 5);

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `service`
--

INSERT INTO `service` (`id`, `nom`, `description`) VALUES
(1, 'Scolarité', 'Payer la scolarité'),
(2, 'Pharmacie', 'Frais de pharmacie'),
(3, 'Santé', 'Paiement des frais de santé'),
(4, 'lool', 'loool');

-- --------------------------------------------------------

--
-- Structure de la table `service_etablissement`
--

CREATE TABLE `service_etablissement` (
  `service_id` int(11) NOT NULL,
  `etablissement_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `service_etablissement`
--

INSERT INTO `service_etablissement` (`service_id`, `etablissement_id`) VALUES
(4, 2);

-- --------------------------------------------------------

--
-- Structure de la table `tarif_service`
--

CREATE TABLE `tarif_service` (
  `id` int(11) NOT NULL,
  `service_id` int(11) DEFAULT NULL,
  `etablissement_id` int(11) DEFAULT NULL,
  `montant` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `tarif_service`
--

INSERT INTO `tarif_service` (`id`, `service_id`, `etablissement_id`, `montant`) VALUES
(1, 4, 2, 50);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `administrateur`
--
ALTER TABLE `administrateur`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_32EB52E8F85E0677` (`username`),
  ADD UNIQUE KEY `UNIQ_32EB52E8E7927C74` (`email`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_C7440455E223C3F4` (`numeroclient`),
  ADD UNIQUE KEY `UNIQ_C7440455E7927C74` (`email`),
  ADD UNIQUE KEY `UNIQ_C7440455F85E0677` (`username`);

--
-- Index pour la table `devise`
--
ALTER TABLE `devise`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_43EDA4DF6C6E55B5` (`nom`);

--
-- Index pour la table `etablissement`
--
ALTER TABLE `etablissement`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_20FD592CF85E0677` (`username`);

--
-- Index pour la table `etablissement_pays_destination`
--
ALTER TABLE `etablissement_pays_destination`
  ADD PRIMARY KEY (`etablissement_id`,`pays_destination_id`),
  ADD KEY `IDX_EE58B955FF631228` (`etablissement_id`),
  ADD KEY `IDX_EE58B955D3356485` (`pays_destination_id`);

--
-- Index pour la table `paiement_done`
--
ALTER TABLE `paiement_done`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_EF17AA0619EB6921` (`client_id`),
  ADD KEY `IDX_EF17AA06ED5CA9E6` (`service_id`),
  ADD KEY `IDX_EF17AA06D3356485` (`pays_destination_id`),
  ADD KEY `IDX_EF17AA06D23B76CD` (`etablissements_id`),
  ADD KEY `IDX_EF17AA06F4445056` (`devise_id`);

--
-- Index pour la table `pays_destination`
--
ALTER TABLE `pays_destination`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_90B170336C6E55B5` (`nom`),
  ADD KEY `IDX_90B1703341DEFADA` (`devis_id`);

--
-- Index pour la table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `service_etablissement`
--
ALTER TABLE `service_etablissement`
  ADD PRIMARY KEY (`service_id`,`etablissement_id`),
  ADD KEY `IDX_F042E3AEED5CA9E6` (`service_id`),
  ADD KEY `IDX_F042E3AEFF631228` (`etablissement_id`);

--
-- Index pour la table `tarif_service`
--
ALTER TABLE `tarif_service`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_92FCE897ED5CA9E6` (`service_id`),
  ADD UNIQUE KEY `UNIQ_92FCE897FF631228` (`etablissement_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649F85E0677` (`username`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `administrateur`
--
ALTER TABLE `administrateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT pour la table `devise`
--
ALTER TABLE `devise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `etablissement`
--
ALTER TABLE `etablissement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `paiement_done`
--
ALTER TABLE `paiement_done`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT pour la table `pays_destination`
--
ALTER TABLE `pays_destination`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `tarif_service`
--
ALTER TABLE `tarif_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `etablissement_pays_destination`
--
ALTER TABLE `etablissement_pays_destination`
  ADD CONSTRAINT `FK_EE58B955D3356485` FOREIGN KEY (`pays_destination_id`) REFERENCES `pays_destination` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_EE58B955FF631228` FOREIGN KEY (`etablissement_id`) REFERENCES `etablissement` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `paiement_done`
--
ALTER TABLE `paiement_done`
  ADD CONSTRAINT `FK_EF17AA0619EB6921` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `FK_EF17AA06D23B76CD` FOREIGN KEY (`etablissements_id`) REFERENCES `etablissement` (`id`),
  ADD CONSTRAINT `FK_EF17AA06D3356485` FOREIGN KEY (`pays_destination_id`) REFERENCES `pays_destination` (`id`),
  ADD CONSTRAINT `FK_EF17AA06ED5CA9E6` FOREIGN KEY (`service_id`) REFERENCES `service` (`id`),
  ADD CONSTRAINT `FK_EF17AA06F4445056` FOREIGN KEY (`devise_id`) REFERENCES `devise` (`id`);

--
-- Contraintes pour la table `pays_destination`
--
ALTER TABLE `pays_destination`
  ADD CONSTRAINT `FK_90B1703341DEFADA` FOREIGN KEY (`devis_id`) REFERENCES `devise` (`id`);

--
-- Contraintes pour la table `service_etablissement`
--
ALTER TABLE `service_etablissement`
  ADD CONSTRAINT `FK_F042E3AEED5CA9E6` FOREIGN KEY (`service_id`) REFERENCES `service` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_F042E3AEFF631228` FOREIGN KEY (`etablissement_id`) REFERENCES `etablissement` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `tarif_service`
--
ALTER TABLE `tarif_service`
  ADD CONSTRAINT `FK_92FCE897ED5CA9E6` FOREIGN KEY (`service_id`) REFERENCES `service` (`id`),
  ADD CONSTRAINT `FK_92FCE897FF631228` FOREIGN KEY (`etablissement_id`) REFERENCES `etablissement` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
