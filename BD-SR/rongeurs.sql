-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 16 Décembre 2015 à 17:44
-- Version du serveur :  10.1.8-MariaDB
-- Version de PHP :  5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `rongeurs`
--

-- --------------------------------------------------------

--
-- Structure de la table `collection`
--

CREATE TABLE `collection` (
  `numColl` bigint(20) UNSIGNED NOT NULL,
  `userId` bigint(20) UNSIGNED NOT NULL,
  `titre` varchar(40) NOT NULL,
  `Description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `collection`
--

INSERT INTO `collection` (`numColl`, `userId`, `titre`, `Description`) VALUES
(1, 11, 'Figurines Batman', 'Voici ma collection de figurines Batman que j''adore collectionner. Je suis heureux de pouvoir la partager avec vous...'),
(2, 12, 'DVD star wars', 'ma collection de dvd Star Wars.'),
(12, 14, 'Timbres d''Europe', 'Voici ma collection de timbres marquant tous mes voyages en Europe.'),
(13, 13, 'Petites cuillÃ¨res', 'Lors de mes dÃ©placements dans les pays, j''ai achetÃ© au fur et Ã  mesure des cuillÃ¨res souvenir.'),
(15, 11, 'jeux nintendo wii', 'Voici ma collection de jeux nintendo Wii.'),
(16, 17, 'Toutes mes guitares', 'Voici toute ma collection de guitare depuis que je fais de la musique.'),
(17, 19, 'Mes mÃ©dailles et trophÃ©es', 'Victoires en championnats, participation Ã  des galas, etc'),
(18, 20, 'Mes petites pierres', 'Lors de mes voyages autour du monde j''aime bien de ramasser des cailloux...');

-- --------------------------------------------------------

--
-- Structure de la table `groupe`
--

CREATE TABLE `groupe` (
  `grpId` bigint(20) UNSIGNED NOT NULL,
  `userId` bigint(20) UNSIGNED NOT NULL,
  `numColl` bigint(20) UNSIGNED NOT NULL,
  `genre` varchar(40) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `groupe`
--

INSERT INTO `groupe` (`grpId`, `userId`, `numColl`, `genre`, `type`) VALUES
(1, 11, 1, 'PHYSIQUE', 'Figurines'),
(2, 12, 2, 'VIRTUEL', 'DVD'),
(15, 14, 12, 'PHYSIQUE', 'Timbres'),
(16, 13, 13, 'PHYSIQUE', 'CuillÃ¨re'),
(18, 11, 15, 'VIRTUEL', 'jeux vidÃ©o'),
(19, 17, 16, 'PHYSIQUE', 'Guitar'),
(20, 19, 17, 'PHYSIQUE', 'TrophÃ©e'),
(21, 20, 18, 'PHYSIQUE', 'cailloux');

-- --------------------------------------------------------

--
-- Structure de la table `item`
--

CREATE TABLE `item` (
  `itemId` bigint(20) UNSIGNED NOT NULL,
  `numColl` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(200) NOT NULL,
  `dateAjout` date NOT NULL,
  `urlImg` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `item`
--

INSERT INTO `item` (`itemId`, `numColl`, `nom`, `dateAjout`, `urlImg`) VALUES
(1, 1, 'Figurine Batman Arkham city', '2015-12-10', 'http://ecx.images-amazon.com/images/I/81R9WlBnlsL._SL1500_.jpg'),
(2, 1, 'figurines Batman 1989', '2015-12-13', 'http://www.legionsofgotham.org/ActionFigures/Movie/1989/1989toybizbatmanpaintedfacevariant.jpg'),
(3, 15, 'Super mario galaxy 2', '2015-12-13', 'http://wiimedia.ign.com/wii/image/article/108/1089355/super-mario-galaxy-2-20100513110348946.jpg'),
(4, 13, 'Petite cuillÃ¨re en argent d''IsraÃ«l', '2015-12-13', 'http://images.delcampe.com/img_large/auction/000/210/849/836_001.jpg'),
(5, 2, 'Star wars Ã©pisode IV', '2015-12-13', 'http://ecx.images-amazon.com/images/I/818H4DxhAaL._SX342_.jpg'),
(6, 12, 'Timbre France Europe', '2015-12-14', 'http://www.gplr12.fr/services/autocollants/marianne_bleu_europe_20g_080-2013.jpg'),
(7, 12, 'Timbre Belgique World', '2015-12-14', 'http://r.llb.be/image/f8/525d4a3b357090649b7a10f8.jpg'),
(8, 12, 'Timbre deutsch Reich 1941', '2015-12-14', 'http://assets.catawiki.nl/assets/2013/7/10/4/9/0/490beb5a-e97e-11e2-89e3-b7870cf8f48b.jpg'),
(9, 13, 'petite cuillÃ¨re Bethune France', '2015-12-14', 'http://pmcdn.priceminister.com/photo/ancienne-petite-cuillere-de-collection-bethune-france-decoration-849787415_ML.jpg'),
(10, 15, 'The legend of Zelda Twilight Princess', '2015-12-14', 'http://img.qj.net/uploads/articles_module2/74444/zeldainside_1164693444_qjpreviewth.jpg'),
(11, 2, 'IntÃ©grale DVD star wars', '2015-12-14', 'https://i.ytimg.com/vi/LBzVyD0X9BU/maxresdefault.jpg'),
(12, 17, 'Football cup 2008 LiÃ¨ges', '2015-12-15', 'http://images.clipartpanda.com/football-championship-trophy-Q661-01.jpg'),
(13, 18, 'caillou vert', '2015-12-16', 'http://www.geoforum.fr/uploads/monthly_03_2011/post-9948-0-64764700-1301415478.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `usrId` bigint(20) UNSIGNED NOT NULL,
  `usrName` varchar(100) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`usrId`, `usrName`, `password`) VALUES
(11, 'Mulot', 'mariobros64'),
(12, 'Guillaume', 'Rabateur'),
(13, 'Biche', 'alexandre'),
(14, 'Castor', 'Pollux'),
(17, 'Test_alpha', 'mdp42'),
(18, 'Test_beta', 'mdp43'),
(19, 'gori', '1210'),
(20, 'Boulay', 'mdp45');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `collection`
--
ALTER TABLE `collection`
  ADD PRIMARY KEY (`numColl`),
  ADD UNIQUE KEY `numColl` (`numColl`),
  ADD KEY `userId` (`userId`);

--
-- Index pour la table `groupe`
--
ALTER TABLE `groupe`
  ADD PRIMARY KEY (`grpId`),
  ADD UNIQUE KEY `grpId` (`grpId`),
  ADD KEY `userId` (`userId`,`numColl`),
  ADD KEY `numColl` (`numColl`);

--
-- Index pour la table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`itemId`),
  ADD UNIQUE KEY `itemId` (`itemId`),
  ADD KEY `numColl` (`numColl`,`nom`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`usrId`) USING BTREE,
  ADD UNIQUE KEY `usrId` (`usrId`) USING BTREE;

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `collection`
--
ALTER TABLE `collection`
  MODIFY `numColl` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT pour la table `groupe`
--
ALTER TABLE `groupe`
  MODIFY `grpId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT pour la table `item`
--
ALTER TABLE `item`
  MODIFY `itemId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `usrId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `collection`
--
ALTER TABLE `collection`
  ADD CONSTRAINT `collection_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`usrId`);

--
-- Contraintes pour la table `groupe`
--
ALTER TABLE `groupe`
  ADD CONSTRAINT `groupe_ibfk_1` FOREIGN KEY (`numColl`) REFERENCES `collection` (`numColl`),
  ADD CONSTRAINT `groupe_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `users` (`usrId`);

--
-- Contraintes pour la table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`numColl`) REFERENCES `collection` (`numColl`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
