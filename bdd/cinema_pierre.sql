-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : lun. 20 mars 2023 à 21:52
-- Version du serveur : 5.7.39
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `cinema_pierre`
--

-- --------------------------------------------------------

--
-- Structure de la table `acteur`
--

CREATE TABLE `acteur` (
  `id_acteur` int(11) NOT NULL,
  `id_personne` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `acteur`
--

INSERT INTO `acteur` (`id_acteur`, `id_personne`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 9),
(5, 11),
(6, 12),
(7, 13),
(8, 14),
(9, 15),
(10, 19),
(11, 20),
(12, 21),
(13, 22);

-- --------------------------------------------------------

--
-- Structure de la table `appartenir`
--

CREATE TABLE `appartenir` (
  `id_film` int(11) NOT NULL,
  `id_genre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `appartenir`
--

INSERT INTO `appartenir` (`id_film`, `id_genre`) VALUES
(5, 4),
(1, 3),
(3, 3),
(6, 3),
(4, 3),
(2, 2),
(7, 2),
(9, 2),
(10, 3),
(11, 3),
(12, 2),
(13, 2),
(14, 8),
(15, 1),
(16, 6),
(8, 5);

-- --------------------------------------------------------

--
-- Structure de la table `casting`
--

CREATE TABLE `casting` (
  `id_film` int(11) NOT NULL,
  `id_acteur` int(11) NOT NULL,
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `casting`
--

INSERT INTO `casting` (`id_film`, `id_acteur`, `id_role`) VALUES
(1, 1, 2),
(3, 1, 2),
(6, 1, 2),
(7, 7, 3),
(2, 7, 4),
(8, 7, 5),
(1, 9, 6),
(10, 2, 2),
(11, 3, 2),
(12, 7, 7),
(13, 4, 8),
(15, 8, 9),
(7, 5, 10),
(16, 6, 11),
(9, 10, 12),
(14, 11, 13),
(5, 12, 14),
(4, 13, 1),
(11, 1, 2),
(11, 2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `film`
--

CREATE TABLE `film` (
  `id_film` int(11) NOT NULL,
  `titre` varchar(50) COLLATE utf8_bin NOT NULL,
  `synopsis` text COLLATE utf8_bin NOT NULL,
  `annee_sortie` int(11) NOT NULL,
  `duree` int(11) NOT NULL,
  `note` int(11) NOT NULL,
  `id_realisateur` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `film`
--

INSERT INTO `film` (`id_film`, `titre`, `synopsis`, `annee_sortie`, `duree`, `note`, `id_realisateur`) VALUES
(1, 'Spider-Man', 'Orphelin, Peter Parker est élevé par sa tante May et son oncle Ben dans le quartier Queens de New York. Tout en poursuivant ses études à l\'université, il trouve un emploi de photographe au journal Daily Bugle. Il partage son appartement avec Harry Osborn, son meilleur ami, et rêve de séduire la belle Mary Jane.', 2002, 121, 5, 4),
(2, 'Titanic', 'En 1997, l\'épave du Titanic est l\'objet d\'une exploration fiévreuse, menée par des chercheurs de trésor en quête d\'un diamant bleu qui se trouvait à bord. Frappée par un reportage télévisé, l\'une des rescapées du naufrage, âgée de 102 ans, Rose DeWitt, se rend sur place et évoque ses souvenirs. 1912. Fiancée à un industriel arrogant, Rose croise sur le bateau un artiste sans le sou.\r\n', 1998, 196, 5, 5),
(3, 'Spider-Man 2', 'Ecartelé entre son identité secrète de Spider-Man et sa vie d\'étudiant, Peter Parker n\'a pas réussi à garder celle qu\'il aime, Mary Jane, qui est aujourd\'hui comédienne et fréquente quelqu\'un d\'autre. Guidé par son seul sens du devoir, Peter vit désormais chacun de ses pouvoirs à la fois comme un don et comme une malédiction.', 2004, 127, 4, 4),
(4, 'The Batman', 'Dans sa deuxième année de lutte contre le crime, le milliardaire et justicier masqué Batman explore la corruption qui sévit à Gotham et notamment comment elle pourrait être liée à sa propre famille, les Wayne, à qui il doit toute sa fortune. En parallèle, il enquête sur les meurtres d\'un tueur en série qui se fait connaître sous le nom de Sphinx et sème des énigmes cruelles sur son passage.', 2022, 175, 3, 7),
(5, 'Avatar 2', 'Jake Sully et Ney\'tiri ont formé une famille et font tout pour rester aussi soudés que possible. Ils sont cependant contraints de quitter leur foyer et d\'explorer les différentes régions encore mystérieuses de Pandora. Lorsqu\'une ancienne menace refait surface, Jake va devoir mener une guerre difficile contre les humains.', 2022, 192, 3, 5),
(6, 'Spider-Man 3', 'Peter Parker a enfin réussi à concilier son amour pour Mary-Jane et ses devoirs de super-héros, mais l\'horizon s\'obscurcit. La brutale mutation de son costume, qui devient noir, décuple ses pouvoirs et transforme également sa personnalité pour laisser ressortir l\'aspect sombre et vengeur que Peter s\'efforce de contrôler.', 2007, 139, 4, 4),
(7, 'Le Loup De Wall Street', 'Sa licence de courtier en poche, et les narines déjà pleines de cocaïne, Jordan Belfort est prêt à conquérir Wall Street. Ce jour d\'octobre, un krach, le plus important depuis 1929, vient piétiner ses rêves de grandeur. C\'est finalement à Long Island qu\'il échoue et qu\'il monte sa propre affaire de courtage. Son créneau : le hors-cote. Sa méthode : l\'arnaque. Son équipe : des vendeurs ou des petits trafiquants.', 2013, 179, 5, 1),
(8, 'Shutter Island', 'En 1954, une meurtrière, extrêmement dangereuse, placée en centre de détention psychiatrique disparaît sur l\'île de Shutter Island. Deux officiers du corps fédéral des marshals, Teddy Daniels et Chuck Aule, sont envoyés sur place pour enquêter. Très vite, Teddy Daniels comprend que le personnel de l\'établissement cache quelque chose. Seul indice dont il dispose : un bout de papier sur lequel est griffonnée une suite de chiffres entrecoupée de lettres.', 2010, 138, 5, 1),
(9, 'The Irishman', 'Frank Sheeran est un ancien soldat de la Seconde Guerre mondiale devenu escroc et tueur à gages. À travers son personnage, on découvre le monde du crime organisé dans l\'Amérique de l\'après-guerre. Le film relate la disparition du légendaire dirigeant syndicaliste Jimmy Hoffa, qui reste l\'un des mystères insondables de l\'histoire de États-Unis.', 2019, 210, 3, 1),
(10, 'The Amazing Spider-Man', 'Abandonné par ses parents lorsqu\'il était enfant, Peter Parker, alias Spider-Man, a été élevé par son oncle et sa tante. Cependant, Peter voudrait comprendre qui il est pour pouvoir accepter son parcours. Il entame alors une quête pour élucider la disparition de ses parents, ce qui le conduit rapidement à Oscorp et au laboratoire du Dr Curt Connors. Spider-Man va bientôt se retrouver face au Lézard, l\'alter ego de Connors. En décidant d\'utiliser ses pouvoirs, il va embrasser son destin.', 2012, 136, 3, 9),
(11, 'Spider-Man : No Way Home', 'Avec l\'identité de Spiderman désormais révélée, celui-ci est démasqué et n\'est plus en mesure de séparer sa vie normale en tant que Peter Parker des enjeux élevés d\'être un superhéros. Lorsque Peter demande de l\'aide au docteur Strange, les enjeux deviennent encore plus dangereux, l\'obligeant à découvrir ce que signifie vraiment être Spiderman.', 2021, 150, 2, 10),
(12, 'J.Edgar', 'À la tête du FBI depuis presque 50 ans, Edgar Hoover devient l\'un des plus puissants Américains. Ayant servi sous huit présidents et pendant trois guerres, Hoover utilise à la fois une méthode impitoyable et épique pour assurer la sécurité de son pays. En projetant un personnage prudent en public et en privé, il laisse peu dans son cercle intérieur. Parmi ses proches, il y a Clyde Tolson et Helen Gandy, sa secrétaire fidèle.', 2011, 137, 3, 6),
(13, 'Gran Torino', 'Walt Kowalski, un vétéran de la guerre de Corée, vient de perdre sa femme. Seul, misanthrope, bougon et raciste, il veille jalousement sur sa Ford Gran Torino, râlant sans cesse contre les habitants de son quartier, en majorité d\'origine asiatique. Un jour, son jeune voisin, Tao, tente de lui voler sa voiture sous la pression d\'un gang. Walt s\'aperçoit bientôt que l\'adolescent est littéralement harcelé par les jeunes caïds. Prenant la défense de Tao, Walt devient malgré lui le héros du quartier.', 2008, 116, 4, 6),
(14, 'Titane', 'Un homme soutenant être un enfant ayant disparu il y a plus de 10 ans auparavant est réuni avec son père, un ancien pompier instable dans la vie. Il est ramené par les inspecteurs de la douane dans un aéroport; or, son arrivée coïncide avec une série de crimes inexpliqués dans la région.', 2021, 108, 2, 3),
(15, 'Il n\'est jamais trop tard', 'Synopsis. Fraîchement licencié d\'un poste qu\'il occupait depuis des années, Larry Crowne décide de s\'inscrire à l\'Université pour reprendre ses études. Ce changement de vie professionnelle prend une tournure plus personnelle lorsqu\'il tombe sous le charme de son professeur d\'expression orale, Mme Tainot.', 2011, 99, 2, 8),
(16, 'Glass Onion : Une histoire à couteau tirés', 'Le détective de renommée mondiale Benoit Blanc se rend en Grèce pour élucider un mystère impliquant un milliardaire et son équipe hétéroclite d\'amis.', 2022, 139, 3, 11);

-- --------------------------------------------------------

--
-- Structure de la table `genre`
--

CREATE TABLE `genre` (
  `id_genre` int(11) NOT NULL,
  `nom_genre` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `genre`
--

INSERT INTO `genre` (`id_genre`, `nom_genre`) VALUES
(1, 'Romance'),
(2, 'Drame'),
(3, 'Action'),
(4, 'Science-Fiction'),
(5, 'Thriller'),
(6, 'Film à énigme'),
(7, 'Comédie'),
(8, 'Horreur');

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

CREATE TABLE `personne` (
  `id_personne` int(11) NOT NULL,
  `nom` varchar(50) COLLATE utf8_bin NOT NULL,
  `prenom` varchar(50) COLLATE utf8_bin NOT NULL,
  `sexe` varchar(50) COLLATE utf8_bin NOT NULL,
  `date_naissance` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `personne`
--

INSERT INTO `personne` (`id_personne`, `nom`, `prenom`, `sexe`, `date_naissance`) VALUES
(1, 'McGuire', 'Tobey', 'Homme', '1975-06-27'),
(2, 'Garfield', 'Andrew', 'Homme', '1983-08-20'),
(3, 'Holland', 'Tom', 'Homme', '1996-06-01'),
(4, 'Scorsese', 'Martin', 'Homme', '1942-11-17'),
(5, 'Nolan', 'Christopher', 'Homme', '1970-07-30'),
(6, 'Ducournau', 'Julia', 'Femme', '1983-11-18'),
(7, 'Raimi', 'Sam', 'Homme', '1959-10-23'),
(8, 'Cameron', 'James', 'Homme', '1954-08-16'),
(9, 'Eastwood', 'Clint', 'Homme', '1930-05-31'),
(10, 'Reeves', 'Matt', 'Homme', '1966-04-27'),
(11, 'Robbie', 'Margot', 'Femme', '1990-07-02'),
(12, 'Cline', 'Madelyn', 'Femme', '1997-12-25'),
(13, 'Di Caprio', 'Leonardo', 'Homme', '1974-11-11'),
(14, 'Hanks', 'Tom', 'Homme', '1956-07-09'),
(15, 'Molina', 'Alfred', 'Homme', '1953-05-24'),
(16, 'Webb', 'Marc', 'Homme', '1974-08-31'),
(17, 'Watts', 'Jon', 'Homme', '1981-06-28'),
(18, 'Johnson', 'Rian', 'Homme', '1973-12-17'),
(19, 'De Niro', 'Robert', 'Homme', '1943-08-17'),
(20, 'Roussel', 'Agathe', 'Femme', '1988-06-14'),
(21, 'Worthington', 'Sam', 'Homme', '1976-08-02'),
(22, 'Pattinson', 'Robert', 'Homme', '1986-05-13'),
(25, 'Smoke', 'Pop', 'Homme', '2023-03-04');

-- --------------------------------------------------------

--
-- Structure de la table `realisateur`
--

CREATE TABLE `realisateur` (
  `id_realisateur` int(11) NOT NULL,
  `id_personne` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `realisateur`
--

INSERT INTO `realisateur` (`id_realisateur`, `id_personne`) VALUES
(1, 4),
(2, 5),
(3, 6),
(4, 7),
(5, 8),
(6, 9),
(7, 10),
(8, 14),
(9, 16),
(10, 17),
(11, 18);

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `nom_role` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`id_role`, `nom_role`) VALUES
(1, 'Batman'),
(2, 'Spiderman'),
(3, 'Jordan Belfort'),
(4, 'Jack Dawson'),
(5, 'Teddy Daniels'),
(6, 'Dr. Octopus'),
(7, 'J. Edgar Hoover'),
(8, 'Walt Kowalski'),
(9, 'Larry Crowne'),
(10, 'Naomi Lapaglia'),
(11, 'Whiskey'),
(12, 'Franck Sheeran'),
(13, 'Alexia'),
(14, 'Jake Sully');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `acteur`
--
ALTER TABLE `acteur`
  ADD PRIMARY KEY (`id_acteur`),
  ADD KEY `FK_acteur_personne` (`id_personne`);

--
-- Index pour la table `appartenir`
--
ALTER TABLE `appartenir`
  ADD KEY `id_film` (`id_film`),
  ADD KEY `id_genre` (`id_genre`);

--
-- Index pour la table `casting`
--
ALTER TABLE `casting`
  ADD KEY `FK__film` (`id_film`),
  ADD KEY `FK__acteur` (`id_acteur`),
  ADD KEY `FK__role` (`id_role`);

--
-- Index pour la table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id_film`),
  ADD KEY `FK_film_realisateur` (`id_realisateur`);

--
-- Index pour la table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id_genre`);

--
-- Index pour la table `personne`
--
ALTER TABLE `personne`
  ADD PRIMARY KEY (`id_personne`);

--
-- Index pour la table `realisateur`
--
ALTER TABLE `realisateur`
  ADD PRIMARY KEY (`id_realisateur`),
  ADD KEY `FK_realisateur_personne` (`id_personne`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `acteur`
--
ALTER TABLE `acteur`
  MODIFY `id_acteur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `film`
--
ALTER TABLE `film`
  MODIFY `id_film` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT pour la table `genre`
--
ALTER TABLE `genre`
  MODIFY `id_genre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `personne`
--
ALTER TABLE `personne`
  MODIFY `id_personne` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `realisateur`
--
ALTER TABLE `realisateur`
  MODIFY `id_realisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `acteur`
--
ALTER TABLE `acteur`
  ADD CONSTRAINT `FK_acteur_personne` FOREIGN KEY (`id_personne`) REFERENCES `personne` (`id_personne`);

--
-- Contraintes pour la table `appartenir`
--
ALTER TABLE `appartenir`
  ADD CONSTRAINT `FK__film_id` FOREIGN KEY (`id_film`) REFERENCES `film` (`id_film`),
  ADD CONSTRAINT `FK__genre` FOREIGN KEY (`id_genre`) REFERENCES `genre` (`id_genre`);

--
-- Contraintes pour la table `casting`
--
ALTER TABLE `casting`
  ADD CONSTRAINT `FK__acteur` FOREIGN KEY (`id_acteur`) REFERENCES `acteur` (`id_acteur`),
  ADD CONSTRAINT `FK__film` FOREIGN KEY (`id_film`) REFERENCES `film` (`id_film`),
  ADD CONSTRAINT `FK__role` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`);

--
-- Contraintes pour la table `film`
--
ALTER TABLE `film`
  ADD CONSTRAINT `FK_film_realisateur` FOREIGN KEY (`id_realisateur`) REFERENCES `realisateur` (`id_realisateur`);

--
-- Contraintes pour la table `realisateur`
--
ALTER TABLE `realisateur`
  ADD CONSTRAINT `FK_realisateur_personne` FOREIGN KEY (`id_personne`) REFERENCES `personne` (`id_personne`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
