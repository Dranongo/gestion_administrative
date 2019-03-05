-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 05 mars 2019 à 16:04
-- Version du serveur :  5.7.19
-- Version de PHP :  7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `gestion_administrative`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie_socio_professionnelle`
--

DROP TABLE IF EXISTS `categorie_socio_professionnelle`;
CREATE TABLE IF NOT EXISTS `categorie_socio_professionnelle` (
  `id_categorie_socio_professionnelle` int(11) NOT NULL AUTO_INCREMENT,
  `code_categorie_socio_professionnelle` varchar(255) NOT NULL,
  `nom_categorie_socio_professionnelle` varchar(255) NOT NULL,
  PRIMARY KEY (`id_categorie_socio_professionnelle`),
  UNIQUE KEY `code_categorie_socio_professionnelle` (`code_categorie_socio_professionnelle`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categorie_socio_professionnelle`
--

INSERT INTO `categorie_socio_professionnelle` (`id_categorie_socio_professionnelle`, `code_categorie_socio_professionnelle`, `nom_categorie_socio_professionnelle`) VALUES
(1, 'STAGI_APPRENTI', 'Stage ou apprenti'),
(2, 'OUVRIERS_QUALI', 'Ouvriers qualifiés'),
(3, 'ETAM', 'Employés Techniciens Agent de Maîtrise'),
(4, 'CADRE_PRO_INTELLEC', 'Cadres et professions intellectuelles supérieures'),
(5, 'CADRE_DIRIG', 'Cadres dirigeants');

-- --------------------------------------------------------

--
-- Structure de la table `contact_urgence`
--

DROP TABLE IF EXISTS `contact_urgence`;
CREATE TABLE IF NOT EXISTS `contact_urgence` (
  `id_contact_urgence` int(11) NOT NULL AUTO_INCREMENT,
  `nom_contact_urgence` varchar(255) NOT NULL,
  `prenom_contact_urgence` varchar(255) NOT NULL,
  `lien_contact_urgence` varchar(255) NOT NULL,
  `telephone_contact_urgence` varchar(10) NOT NULL,
  `id_salarie` int(11) NOT NULL,
  PRIMARY KEY (`id_contact_urgence`),
  KEY `id_salarie` (`id_salarie`)
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `contact_urgence`
--

INSERT INTO `contact_urgence` (`id_contact_urgence`, `nom_contact_urgence`, `prenom_contact_urgence`, `lien_contact_urgence`, `telephone_contact_urgence`, `id_salarie`) VALUES
(19, 'Biniou', 'Schnaps', '', '1234567890', 123),
(20, 'Heya', 'pa', 'ici', '987654321', 127),
(21, 'Papa', 'Papap', 'Papa', '987654321', 128),
(22, 'Papa', 'Papap', 'Papa', '987654321', 129),
(23, 'Clenche', 'jean', 'Papa', '987654321', 130),
(24, 'ici', 'id', 'pa', '987654321', 131),
(25, 'po', 'pm', 'papa', '987654321', 132),
(26, 'po', 'pm', 'papa', '987654321', 133),
(27, 'po', 'pm', 'papa', '987654321', 134),
(28, 'po', 'pm', 'papa', '987654321', 135),
(29, 'hello', 'pap', 'pay', '987654321', 136),
(30, 'hello', 'pap', 'pay', '987654321', 137),
(31, 'hello', 'pap', 'pay', '987654321', 138),
(32, 'hello', 'pap', 'pay', '987654321', 139),
(33, 'hello', 'pap', 'pay', '987654321', 140),
(34, 'hello', 'pap', 'pay', '987654321', 141),
(35, 'hello', 'papa', 'papa', '987654321', 142),
(36, 'hello', 'papa', 'papa', '987654321', 143),
(37, 'hello', 'papa', 'papa', '987654321', 144),
(38, 'hello', 'papa', 'papa', '987654321', 145),
(39, 'nom', 'pren', 'pap', '1234567890', 146),
(40, 'ici', 'pa', 'papa', '987654321', 147),
(41, 'papa', 'mama', 'papa', '987654321', 148),
(42, 'papa', 'mama', 'papa', '987654321', 149),
(43, 'papa', 'mama', 'papa', '987654321', 150),
(44, 'papa', 'mama', 'papa', '987654321', 151),
(45, 'papa', 'mama', 'papa', '987654321', 152),
(46, 'papa', 'mama', 'papa', '987654321', 153),
(47, 'papa', 'mama', 'papa', '987654321', 154),
(48, 'papa', 'mama', 'papa', '987654321', 155),
(49, 'papa', 'mama', 'papa', '987654321', 156),
(50, 'papa', 'mama', 'papa', '987654321', 157),
(51, 'papa', 'mama', 'papa', '987654321', 158),
(52, 'papa', 'mama', 'papa', '987654321', 159),
(53, 'papa', 'mama', 'papa', '987654321', 160),
(54, 'papa', 'mama', 'papa', '987654321', 161),
(55, 'papa', 'mama', 'papa', '987654321', 162),
(56, 'papa', 'mama', 'papa', '987654321', 163),
(57, 'papa', 'mama', 'papa', '987654321', 164),
(58, 'papa', 'mama', 'papa', '987654321', 165),
(59, 'papa', 'mama', 'papa', '987654321', 166),
(60, 'papa', 'mama', 'papa', '987654321', 167),
(61, 'papa', 'mama', 'papa', '987654321', 168),
(62, 'papa', 'mama', 'papa', '987654321', 169),
(63, 'papa', 'mama', 'papa', '987654321', 170),
(64, 'papa', 'mama', 'papa', '987654321', 171),
(65, 'papa', 'mama', 'papa', '987654321', 172),
(66, 'papa', 'mama', 'papa', '987654321', 173),
(67, 'papa', 'mama', 'papa', '987654321', 174),
(68, 'papa', 'mama', 'papa', '987654321', 175),
(69, 'papa', 'mama', 'papa', '987654321', 176),
(70, 'papa', 'mama', 'papa', '987654321', 177),
(71, 'papa', 'mama', 'papa', '987654321', 178),
(72, 'papa', 'mamn', 'papa', '987654321', 179),
(73, 'papa', 'mamn', 'papa', '987654321', 180),
(74, 'papa', 'mamn', 'papa', '987654321', 181),
(75, 'papa', 'mamn', 'papa', '987654321', 182),
(76, 'papa', 'mamn', 'papa', '987654321', 183),
(77, 'papa', 'mamn', 'papa', '987654321', 184),
(78, 'papa', 'mamn', 'papa', '987654321', 185),
(79, 'papa', 'mamn', 'papa', '987654321', 186),
(80, 'papa', 'mamn', 'papa', '987654321', 187),
(81, 'papa', 'mamn', 'papa', '987654321', 188),
(82, 'papa', 'mamn', 'papa', '987654321', 189),
(83, 'papa', 'mama', 'parent', '987654321', 190);

-- --------------------------------------------------------

--
-- Structure de la table `document`
--

DROP TABLE IF EXISTS `document`;
CREATE TABLE IF NOT EXISTS `document` (
  `id_document` int(11) NOT NULL AUTO_INCREMENT,
  `nom_document` varchar(255) NOT NULL,
  `id_salarie` int(11) NOT NULL,
  `id_type_document` int(11) NOT NULL,
  PRIMARY KEY (`id_document`),
  KEY `id_salarie` (`id_salarie`),
  KEY `id_type_document` (`id_type_document`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `document`
--

INSERT INTO `document` (`id_document`, `nom_document`, `id_salarie`, `id_type_document`) VALUES
(1, 'Maximilien Fonteyn - Rapport d\'étonnement.docx', 164, 2),
(2, 'Maximilien Fonteyn - Rapport d\'étonnement.docx', 165, 2),
(3, 'Maximilien Fonteyn - Rapport d\'étonnement.docx', 166, 2),
(4, 'Maximilien Fonteyn - Rapport d\'étonnement.docx', 167, 2),
(5, 'Maximilien Fonteyn - Rapport d\'étonnement.docx', 168, 2),
(6, 'Maximilien Fonteyn - Rapport d\'étonnement.docx', 169, 2),
(7, 'Maximilien Fonteyn - Rapport d\'étonnement.docx', 170, 2),
(8, 'Maximilien Fonteyn - Rapport d\'étonnement.docx', 171, 2),
(9, 'Maximilien Fonteyn - Rapport d\'étonnement.docx', 172, 2),
(10, 'CV_1551792884_10.docx', 173, 2),
(11, 'CV_1551792965_11.docx', 174, 2),
(12, 'CV_1551793205_12.docx', 175, 2),
(13, 'CV_1551793225_13.docx', 176, 2),
(14, 'CV_1551793232_14.docx', 177, 2),
(15, 'CV_1551793901_15.docx', 178, 2),
(16, 'DIPLOME_1551797950_16.', 181, 3),
(17, 'DIPLOME_1551798059_17.', 182, 3),
(18, 'DIPLOME_1551799450_18.', 183, 3),
(19, 'DIPLOME_1551799453_19.', 184, 3),
(20, 'DIPLOME_1551799453_20.', 185, 3),
(21, 'DIPLOME_1551799454_21.', 186, 3),
(22, 'DIPLOME_1551799965_22.docx', 187, 3),
(23, 'DIPLOME_1551800274_23.docx', 188, 3),
(24, 'DIPLOME_1551800332_24.docx', 189, 3),
(25, 'CDT_1551800392_25.docx', 190, 7),
(26, 'CAL_FORMA_1551800392_26.docx', 190, 17);

-- --------------------------------------------------------

--
-- Structure de la table `enfant`
--

DROP TABLE IF EXISTS `enfant`;
CREATE TABLE IF NOT EXISTS `enfant` (
  `id_enfant` int(11) NOT NULL AUTO_INCREMENT,
  `nom_enfant` varchar(255) NOT NULL,
  `prenom_enfant` varchar(255) NOT NULL,
  `date_naissance_enfant` date NOT NULL,
  `id_salarie` int(11) NOT NULL,
  PRIMARY KEY (`id_enfant`),
  KEY `id_salarie` (`id_salarie`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `enfant`
--

INSERT INTO `enfant` (`id_enfant`, `nom_enfant`, `prenom_enfant`, `date_naissance_enfant`, `id_salarie`) VALUES
(27, 'nom1', 'prenom1', '2021-02-01', 130),
(28, 'enfant2', 'bonjour2', '2016-05-02', 130);

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

DROP TABLE IF EXISTS `formation`;
CREATE TABLE IF NOT EXISTS `formation` (
  `id_formation` int(11) NOT NULL AUTO_INCREMENT,
  `nom_formation` varchar(255) NOT NULL,
  `niveau_formation` varchar(255) NOT NULL,
  `organisme_formation` varchar(255) NOT NULL,
  `lieu_formation` varchar(255) NOT NULL,
  `annee_formation_debut` date NOT NULL,
  `annee_formation_fin` date NOT NULL,
  `obtenu` tinyint(1) NOT NULL,
  `id_salarie` int(11) NOT NULL,
  PRIMARY KEY (`id_formation`),
  KEY `id_salarie` (`id_salarie`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `formation`
--

INSERT INTO `formation` (`id_formation`, `nom_formation`, `niveau_formation`, `organisme_formation`, `lieu_formation`, `annee_formation_debut`, `annee_formation_fin`, `obtenu`, `id_salarie`) VALUES
(3, 'BAC', 'Niveau V bis et VI', 'Lycee', 'Vernon', '2014-03-04', '2018-07-05', 1, 129),
(4, 'bac', 'Niveau I', 'Lycee', 'Vernon', '2014-03-30', '2018-08-05', 1, 130);

-- --------------------------------------------------------

--
-- Structure de la table `renseignement_poste`
--

DROP TABLE IF EXISTS `renseignement_poste`;
CREATE TABLE IF NOT EXISTS `renseignement_poste` (
  `id_renseignement_poste` int(11) NOT NULL AUTO_INCREMENT,
  `code_renseignement_poste` varchar(255) NOT NULL,
  `nom_renseignement_poste` varchar(255) NOT NULL,
  PRIMARY KEY (`id_renseignement_poste`),
  UNIQUE KEY `code_renseignement_poste` (`code_renseignement_poste`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `renseignement_poste`
--

INSERT INTO `renseignement_poste` (`id_renseignement_poste`, `code_renseignement_poste`, `nom_renseignement_poste`) VALUES
(1, 'CONSULTANT', 'Consultant'),
(2, 'FULL_STACK_DEV', 'Développeur full-stack'),
(3, 'BIG_DATA_ANALYST', 'Big data analyst'),
(4, 'DATA_ANALYST', 'Data analyst'),
(5, 'BUSINESS_DEV', 'Développeur business'),
(6, 'RRH', 'Responsable des Ressources Humaines'),
(7, 'INTERSHIP_HUMAN_DEV', 'Stagiaire développeur humain');

-- --------------------------------------------------------

--
-- Structure de la table `salarie`
--

DROP TABLE IF EXISTS `salarie`;
CREATE TABLE IF NOT EXISTS `salarie` (
  `id_salarie` int(11) NOT NULL AUTO_INCREMENT,
  `qualite_salarie` varchar(255) NOT NULL,
  `nom_salarie` varchar(255) NOT NULL,
  `prenom_salarie` varchar(255) NOT NULL,
  `nom_jeune_fille_salarie` varchar(255) NOT NULL,
  `nationalite_salarie` varchar(255) NOT NULL,
  `date_naissance_salarie` date NOT NULL,
  `lieu_naissance_salarie` varchar(255) NOT NULL,
  `adresse_salarie` varchar(255) NOT NULL,
  `adresse2_salarie` varchar(255) NOT NULL,
  `code_postal_salarie` varchar(5) NOT NULL,
  `ville_habitat_salarie` varchar(255) NOT NULL,
  `telephone_salarie` varchar(10) NOT NULL,
  `mail_professionnel_salarie` varchar(255) NOT NULL,
  `mail_personnel_salarie` varchar(255) NOT NULL,
  `num_secu_salarie` varchar(15) NOT NULL,
  `remuneration_salarie` int(6) NOT NULL,
  `salarie_en_poste` tinyint(1) NOT NULL,
  `situation_familiale_salarie` varchar(255) NOT NULL,
  `langues_etrangeres` text NOT NULL,
  `autre_activite_salarie` tinyint(1) NOT NULL,
  `details_autre_activite_salarie` varchar(255) NOT NULL,
  `autorisation_travail_responsable_legaux` tinyint(1) NOT NULL,
  `statut_handicap_salarie` tinyint(1) NOT NULL,
  `taux_invalidite` varchar(255) NOT NULL,
  PRIMARY KEY (`id_salarie`)
) ENGINE=InnoDB AUTO_INCREMENT=191 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `salarie`
--

INSERT INTO `salarie` (`id_salarie`, `qualite_salarie`, `nom_salarie`, `prenom_salarie`, `nom_jeune_fille_salarie`, `nationalite_salarie`, `date_naissance_salarie`, `lieu_naissance_salarie`, `adresse_salarie`, `adresse2_salarie`, `code_postal_salarie`, `ville_habitat_salarie`, `telephone_salarie`, `mail_professionnel_salarie`, `mail_personnel_salarie`, `num_secu_salarie`, `remuneration_salarie`, `salarie_en_poste`, `situation_familiale_salarie`, `langues_etrangeres`, `autre_activite_salarie`, `details_autre_activite_salarie`, `autorisation_travail_responsable_legaux`, `statut_handicap_salarie`, `taux_invalidite`) VALUES
(12, 'Monsieur', 'Clenche', 'Jean', 'Fonteyn', 'France', '1998-02-01', 'Vernon', '36 bis bidule', '', '27200', 'Vernon', '232210388', 'maximilien.fonteyn@gmail.com', 'maximilien.fonteyn@gmail.com', '100000000000000', 10, 0, 'Concubin(e)', 'eefefe', 0, 'Vidéo', 1, 0, 'Fou'),
(13, 'Monsieur', 'Clenche', 'Jean', 'Fonteyn', 'France', '1998-02-01', 'Vernon', '36 bis bidule', '', '27200', 'Vernon', '232210388', 'maximilien.fonteyn@gmail.com', 'maximilien.fonteyn@gmail.com', '100000000000000', 10, 0, 'Concubin(e)', 'eefefe', 0, 'Vidéo', 1, 0, 'Fou'),
(14, 'Monsieur', 'Fonteyn', 'Maximilien', 'Fonteyn', 'nanana', '2008-02-15', 'la', '36 bis bidule', '', '27200', 'idiot', '123654789', 'maximilien.fonteyn@gmail.com', 'maximilien.fonteyn@gmail.com', '100000000000000', 65, 0, 'Célibataire', 'hello', 1, '', 1, 1, ''),
(15, 'Monsieur', 'Fonteyn', 'Maximilien', 'Fonteyn', 'nanana', '2008-02-15', 'la', '36 bis bidule', '', '27200', 'idiot', '123654789', 'maximilien.fonteyn@gmail.com', 'maximilien.fonteyn@gmail.com', '100000000000000', 65, 0, 'Célibataire', 'hello', 1, '', 1, 1, ''),
(16, 'Monsieur', 'Fonteyn', 'Maximilien', 'Fonteyn', 'nanana', '2008-02-15', 'la', '36 bis bidule', '', '27200', 'idiot', '123654789', 'maximilien.fonteyn@gmail.com', 'maximilien.fonteyn@gmail.com', '100000000000000', 65, 0, 'Célibataire', 'hello', 1, '', 1, 1, ''),
(17, 'Monsieur', 'Fonteyn', 'Maximilien', 'Fonteyn', 'nanana', '2008-02-15', 'la', '36 bis bidule', '', '27200', 'idiot', '123654789', 'maximilien.fonteyn@gmail.com', 'maximilien.fonteyn@gmail.com', '100000000000000', 65, 0, 'Célibataire', 'hello', 1, '', 1, 1, ''),
(18, 'Monsieur', 'Fonteyn', 'Maximilien', 'Fonteyn', 'nanana', '2008-02-15', 'la', '36 bis bidule', '', '27200', 'idiot', '123654789', 'maximilien.fonteyn@gmail.com', 'maximilien.fonteyn@gmail.com', '100000000000000', 65, 0, 'Célibataire', 'hello', 1, '', 1, 1, ''),
(19, 'Monsieur', 'Fonteyn', 'Maximilien', 'Fonteyn', 'nanana', '2008-02-15', 'la', '36 bis bidule', '', '27200', 'idiot', '123654789', 'maximilien.fonteyn@gmail.com', 'maximilien.fonteyn@gmail.com', '100000000000000', 65, 0, 'Célibataire', 'hello', 1, '', 1, 1, ''),
(20, 'Monsieur', 'Fonteyn', 'Maximilien', '', 'huh', '1998-06-24', 'ui', 'ughio', '', '65987', 'Mont Saint Aignan', '767957134', 'maximilien.fonteyn@gmail.com', 'maximilien.fonteyn@gmail.com', '100000000000000', 68, 1, 'Célibataire', '', 1, '', 1, 1, ''),
(21, 'Monsieur', 'Fonteyn', 'Maximilien', '', 'huh', '1998-06-24', 'ui', 'ughio', '', '65987', 'Mont Saint Aignan', '767957134', 'maximilien.fonteyn@gmail.com', 'maximilien.fonteyn@gmail.com', '100000000000000', 68, 1, 'Célibataire', '', 1, '', 1, 1, ''),
(22, 'Monsieur', 'Fonteyn', 'Maximilien', '', 'huh', '1998-06-24', 'ui', 'ughio', '', '65987', 'Mont Saint Aignan', '767957134', 'maximilien.fonteyn@gmail.com', 'maximilien.fonteyn@gmail.com', '100000000000000', 68, 1, 'Célibataire', '', 1, '', 1, 1, ''),
(23, 'Monsieur', 'Fonteyn', 'Maximilien', '', 'huh', '1998-06-24', 'ui', 'ughio', '', '65987', 'Mont Saint Aignan', '767957134', 'maximilien.fonteyn@gmail.com', 'maximilien.fonteyn@gmail.com', '100000000000000', 68, 1, 'Célibataire', '', 1, '', 1, 1, ''),
(24, 'Monsieur', 'Fonteyn', 'Maximilien', 'Fonteyn', 'France', '1998-06-24', 'Vernon', '36 bis sente de la fosse diard', '', '27200', 'Le Havre', '782585595', 'ezio12@hotmail.fr', 'ezio12@hotmail.fr', '100000000000000', 56, 0, 'Célibataire', '', 0, '', 0, 0, ''),
(25, 'Madame', 'Clenche', 'Jean', 'Hello', 'Belge', '2005-02-01', 'Ici', 'la-bas', 'en face', '76600', 'Paumé', '123456789', 'bidule@email.fr', 'truc@email.com', '100000000000000', 100, 1, 'Pacsé(e)', '', 0, '', 0, 1, 'fou'),
(26, 'Madame', 'Clenche', 'Jean', 'Hello', 'Belge', '2005-02-01', 'Ici', 'la-bas', 'en face', '76600', 'Paumé', '123456789', 'bidule@email.fr', 'truc@email.com', '100000000000000', 100, 1, 'Pacsé(e)', '', 0, '', 0, 1, 'fou'),
(27, 'Madame', 'Clenche', 'Jean', 'Hello', 'Belge', '2005-02-01', 'Ici', 'la-bas', 'en face', '76600', 'Paumé', '123456789', 'bidule@email.fr', 'truc@email.com', '100000000000000', 100, 1, 'Pacsé(e)', '', 0, '', 0, 1, 'fou'),
(28, 'Madame', 'Clenche', 'Jean', 'Hello', 'Belge', '2005-02-01', 'Ici', 'la-bas', 'en face', '76600', 'Paumé', '123456789', 'bidule@email.fr', 'truc@email.com', '100000000000000', 100, 1, 'Pacsé(e)', '', 0, '', 0, 1, 'fou'),
(29, 'Madame', 'Clenche', 'Jean', 'Hello', 'Belge', '2005-02-01', 'Ici', 'la-bas', 'en face', '76600', 'Paumé', '123456789', 'bidule@email.fr', 'truc@email.com', '100000000000000', 100, 1, 'Pacsé(e)', '', 0, '', 0, 1, 'fou'),
(30, 'Madame', 'Clenche', 'Jean', 'Hello', 'Belge', '2005-02-01', 'Ici', 'la-bas', 'en face', '76600', 'Paumé', '123456789', 'bidule@email.fr', 'truc@email.com', '100000000000000', 100, 1, 'Pacsé(e)', '', 0, '', 0, 1, 'fou'),
(31, 'Madame', 'Clenche', 'Jean', 'Hello', 'Belge', '2005-02-01', 'Ici', 'la-bas', 'en face', '76600', 'Paumé', '123456789', 'bidule@email.fr', 'truc@email.com', '100000000000000', 100, 1, 'Pacsé(e)', '', 0, '', 0, 1, 'fou'),
(32, 'Madame', 'Clenche', 'Jean', 'Fonteyn', 'France', '2003-04-05', 'Vernon', '36 bis sente de la fosse diard', '', '27200', 'Le Havre', '213654789', 'g@gtm.com', 't@tpm.com', '203456987452145', 658, 1, 'Pacsé(e)', 'Etrangères', 0, '', 0, 1, 'Fou'),
(33, 'Madame', 'Clenche', 'Jean', 'Fonteyn', 'France', '2003-04-05', 'Vernon', '36 bis sente de la fosse diard', '', '27200', 'Le Havre', '213654789', 'g@gtm.com', 't@tpm.com', '203456987452145', 658, 1, 'Pacsé(e)', 'Etrangères', 0, '', 0, 1, 'Fou'),
(34, 'Madame', 'Clenche', 'Jean', 'Fonteyn', 'France', '2003-04-05', 'Vernon', '36 bis sente de la fosse diard', '', '27200', 'Le Havre', '213654789', 'g@gtm.com', 't@tpm.com', '203456987452145', 658, 1, 'Pacsé(e)', 'Etrangères', 0, '', 0, 1, 'Fou'),
(35, 'Madame', 'Clenche', 'Jean', 'Fonteyn', 'France', '2003-04-05', 'Vernon', '36 bis sente de la fosse diard', '', '27200', 'Le Havre', '213654789', 'g@gtm.com', 't@tpm.com', '203456987452145', 658, 1, 'Pacsé(e)', 'Etrangères', 0, '', 0, 1, 'Fou'),
(36, 'Madame', 'Clenche', 'Jean', 'Fonteyn', 'France', '2003-04-05', 'Vernon', '36 bis sente de la fosse diard', '', '27200', 'Le Havre', '213654789', 'g@gtm.com', 't@tpm.com', '203456987452145', 658, 1, 'Pacsé(e)', 'Etrangères', 0, '', 0, 1, 'Fou'),
(37, 'Madame', 'Clenche', 'Jean', 'Fonteyn', 'France', '2003-04-05', 'Vernon', '36 bis sente de la fosse diard', '', '27200', 'Le Havre', '213654789', 'g@gtm.com', 't@tpm.com', '203456987452145', 658, 1, 'Pacsé(e)', 'Etrangères', 0, '', 0, 1, 'Fou'),
(38, 'Madame', 'Clenche', 'Jean', 'Fonteyn', 'France', '2003-04-05', 'Vernon', '36 bis sente de la fosse diard', '', '27200', 'Le Havre', '213654789', 'g@gtm.com', 't@tpm.com', '203456987452145', 658, 1, 'Pacsé(e)', 'Etrangères', 0, '', 0, 1, 'Fou'),
(39, 'Madame', 'Clenche', 'Jean', 'Fonteyn', 'France', '2003-04-05', 'Vernon', '36 bis sente de la fosse diard', '', '27200', 'Le Havre', '213654789', 'g@gtm.com', 't@tpm.com', '203456987452145', 658, 1, 'Pacsé(e)', 'Etrangères', 0, '', 0, 1, 'Fou'),
(40, 'Monsieur', 'ldcmlc', 'scsccsc', 'scscs', 'cs', '1998-06-24', 'Vernon', '36 bis sente de la fosse diard', '', '27200', 'ek,ck,dce', '782585595', 'ezio12@hotmail.fr', 'ezio12@hotmail.fr', '100000000000000', 58, 1, 'Concubin(e)', '', 0, '', 0, 0, ''),
(41, 'Monsieur', 'ldcmlc', 'scsccsc', 'scscs', 'cs', '1998-06-24', 'Vernon', '36 bis sente de la fosse diard', '', '27200', 'ek,ck,dce', '782585595', 'ezio12@hotmail.fr', 'ezio12@hotmail.fr', '100000000000000', 58, 1, 'Concubin(e)', '', 0, '', 0, 0, ''),
(42, 'Monsieur', 'ldcmlc', 'scsccsc', 'scscs', 'cs', '1998-06-24', 'Vernon', '36 bis sente de la fosse diard', '', '27200', 'ek,ck,dce', '782585595', 'ezio12@hotmail.fr', 'ezio12@hotmail.fr', '100000000000000', 58, 1, 'Concubin(e)', '', 0, '', 0, 0, ''),
(43, 'Monsieur', 'ldcmlc', 'scsccsc', 'scscs', 'cs', '1998-06-24', 'Vernon', '36 bis sente de la fosse diard', '', '27200', 'ek,ck,dce', '782585595', 'ezio12@hotmail.fr', 'ezio12@hotmail.fr', '100000000000000', 58, 1, 'Concubin(e)', '', 0, '', 0, 0, ''),
(44, 'Monsieur', 'ldcmlc', 'scsccsc', 'scscs', 'cs', '1998-06-24', 'Vernon', '36 bis sente de la fosse diard', '', '27200', 'ek,ck,dce', '782585595', 'ezio12@hotmail.fr', 'ezio12@hotmail.fr', '100000000000000', 58, 1, 'Concubin(e)', '', 0, '', 0, 0, ''),
(45, 'Monsieur', 'ldcmlc', 'scsccsc', 'scscs', 'cs', '1998-06-24', 'Vernon', '36 bis sente de la fosse diard', '', '27200', 'ek,ck,dce', '782585595', 'ezio12@hotmail.fr', 'ezio12@hotmail.fr', '100000000000000', 58, 1, 'Concubin(e)', '', 0, '', 0, 0, ''),
(46, 'Monsieur', 'ldcmlc', 'scsccsc', 'scscs', 'cs', '1998-06-24', 'Vernon', '36 bis sente de la fosse diard', '', '27200', 'ek,ck,dce', '782585595', 'ezio12@hotmail.fr', 'ezio12@hotmail.fr', '100000000000000', 58, 1, 'Concubin(e)', '', 0, '', 0, 0, ''),
(47, 'Monsieur', 'ldcmlc', 'scsccsc', 'scscs', 'cs', '1998-06-24', 'Vernon', '36 bis sente de la fosse diard', '', '27200', 'ek,ck,dce', '782585595', 'ezio12@hotmail.fr', 'ezio12@hotmail.fr', '100000000000000', 58, 1, 'Concubin(e)', '', 0, '', 0, 0, ''),
(48, 'Monsieur', 'ldcmlc', 'scsccsc', 'scscs', 'cs', '1998-06-24', 'Vernon', '36 bis sente de la fosse diard', '', '27200', 'ek,ck,dce', '782585595', 'ezio12@hotmail.fr', 'ezio12@hotmail.fr', '100000000000000', 58, 1, 'Concubin(e)', '', 0, '', 0, 0, ''),
(49, 'Monsieur', 'ldcmlc', 'scsccsc', 'scscs', 'cs', '1998-06-24', 'Vernon', '36 bis sente de la fosse diard', '', '27200', 'ek,ck,dce', '782585595', 'ezio12@hotmail.fr', 'ezio12@hotmail.fr', '100000000000000', 58, 1, 'Concubin(e)', '', 0, '', 0, 0, ''),
(50, 'Monsieur', 'ldcmlc', 'scsccsc', 'scscs', 'cs', '1998-06-24', 'Vernon', '36 bis sente de la fosse diard', '', '27200', 'ek,ck,dce', '782585595', 'ezio12@hotmail.fr', 'ezio12@hotmail.fr', '100000000000000', 58, 1, 'Concubin(e)', '', 0, '', 0, 0, ''),
(51, 'Monsieur', 'ldcmlc', 'scsccsc', 'scscs', 'cs', '1998-06-24', 'Vernon', '36 bis sente de la fosse diard', '', '27200', 'ek,ck,dce', '782585595', 'ezio12@hotmail.fr', 'ezio12@hotmail.fr', '100000000000000', 58, 1, 'Concubin(e)', '', 0, '', 0, 0, ''),
(52, 'Monsieur', 'ldcmlc', 'scsccsc', 'scscs', 'cs', '1998-06-24', 'Vernon', '36 bis sente de la fosse diard', '', '27200', 'ek,ck,dce', '782585595', 'ezio12@hotmail.fr', 'ezio12@hotmail.fr', '100000000000000', 58, 1, 'Concubin(e)', '', 0, '', 0, 0, ''),
(53, 'Monsieur', 'ldcmlc', 'scsccsc', 'scscs', 'cs', '1998-06-24', 'Vernon', '36 bis sente de la fosse diard', '', '27200', 'ek,ck,dce', '782585595', 'ezio12@hotmail.fr', 'ezio12@hotmail.fr', '100000000000000', 58, 1, 'Concubin(e)', '', 0, '', 0, 0, ''),
(54, 'Monsieur', 'ldcmlc', 'scsccsc', 'scscs', 'cs', '1998-06-24', 'Vernon', '36 bis sente de la fosse diard', '', '27200', 'ek,ck,dce', '782585595', 'ezio12@hotmail.fr', 'ezio12@hotmail.fr', '100000000000000', 58, 1, 'Concubin(e)', '', 0, '', 0, 0, ''),
(55, 'Monsieur', 'ldcmlc', 'scsccsc', 'scscs', 'cs', '1998-06-24', 'Vernon', '36 bis sente de la fosse diard', '', '27200', 'ek,ck,dce', '782585595', 'ezio12@hotmail.fr', 'ezio12@hotmail.fr', '100000000000000', 58, 1, 'Concubin(e)', '', 0, '', 0, 0, ''),
(56, 'Monsieur', 'ldcmlc', 'scsccsc', 'scscs', 'cs', '1998-06-24', 'Vernon', '36 bis sente de la fosse diard', '', '27200', 'ek,ck,dce', '782585595', 'ezio12@hotmail.fr', 'ezio12@hotmail.fr', '100000000000000', 58, 1, 'Concubin(e)', '', 0, '', 0, 0, ''),
(57, 'Monsieur', 'ldcmlc', 'scsccsc', 'scscs', 'cs', '1998-06-24', 'Vernon', '36 bis sente de la fosse diard', '', '27200', 'ek,ck,dce', '782585595', 'ezio12@hotmail.fr', 'ezio12@hotmail.fr', '100000000000000', 58, 1, 'Concubin(e)', '', 0, '', 0, 0, ''),
(58, 'Monsieur', 'ldcmlc', 'scsccsc', 'scscs', 'cs', '1998-06-24', 'Vernon', '36 bis sente de la fosse diard', '', '27200', 'ek,ck,dce', '782585595', 'ezio12@hotmail.fr', 'ezio12@hotmail.fr', '100000000000000', 58, 1, 'Concubin(e)', '', 0, '', 0, 0, ''),
(59, 'Monsieur', 'ldcmlc', 'scsccsc', 'scscs', 'cs', '1998-06-24', 'Vernon', '36 bis sente de la fosse diard', '', '27200', 'ek,ck,dce', '782585595', 'ezio12@hotmail.fr', 'ezio12@hotmail.fr', '100000000000000', 58, 1, 'Concubin(e)', '', 0, '', 0, 0, ''),
(60, 'Monsieur', 'ldcmlc', 'scsccsc', 'scscs', 'cs', '1998-06-24', 'Vernon', '36 bis sente de la fosse diard', '', '27200', 'ek,ck,dce', '782585595', 'ezio12@hotmail.fr', 'ezio12@hotmail.fr', '100000000000000', 58, 1, 'Concubin(e)', '', 0, '', 0, 0, ''),
(61, 'Monsieur', 'ldcmlc', 'scsccsc', 'scscs', 'cs', '1998-06-24', 'Vernon', '36 bis sente de la fosse diard', '', '27200', 'ek,ck,dce', '782585595', 'ezio12@hotmail.fr', 'ezio12@hotmail.fr', '100000000000000', 58, 1, 'Concubin(e)', '', 0, '', 0, 0, ''),
(62, 'Monsieur', 'ldcmlc', 'scsccsc', 'scscs', 'cs', '1998-06-24', 'Vernon', '36 bis sente de la fosse diard', '', '27200', 'ek,ck,dce', '782585595', 'ezio12@hotmail.fr', 'ezio12@hotmail.fr', '100000000000000', 58, 1, 'Concubin(e)', '', 0, '', 0, 0, ''),
(63, 'Monsieur', 'ldcmlc', 'scsccsc', 'scscs', 'cs', '1998-06-24', 'Vernon', '36 bis sente de la fosse diard', '', '27200', 'ek,ck,dce', '782585595', 'ezio12@hotmail.fr', 'ezio12@hotmail.fr', '100000000000000', 58, 1, 'Concubin(e)', '', 0, '', 0, 0, ''),
(64, 'Monsieur', 'ldcmlc', 'scsccsc', 'scscs', 'cs', '1998-06-24', 'Vernon', '36 bis sente de la fosse diard', '', '27200', 'ek,ck,dce', '782585595', 'ezio12@hotmail.fr', 'ezio12@hotmail.fr', '100000000000000', 58, 1, 'Concubin(e)', '', 0, '', 0, 0, ''),
(65, 'Monsieur', 'ldcmlc', 'scsccsc', 'scscs', 'cs', '1998-06-24', 'Vernon', '36 bis sente de la fosse diard', '', '27200', 'ek,ck,dce', '782585595', 'ezio12@hotmail.fr', 'ezio12@hotmail.fr', '100000000000000', 58, 1, 'Concubin(e)', '', 0, '', 0, 0, ''),
(66, 'Monsieur', 'ldcmlc', 'scsccsc', 'scscs', 'cs', '1998-06-24', 'Vernon', '36 bis sente de la fosse diard', '', '27200', 'ek,ck,dce', '782585595', 'ezio12@hotmail.fr', 'ezio12@hotmail.fr', '100000000000000', 58, 1, 'Concubin(e)', '', 0, '', 0, 0, ''),
(67, 'Monsieur', 'ldcmlc', 'scsccsc', 'scscs', 'cs', '1998-06-24', 'Vernon', '36 bis sente de la fosse diard', '', '27200', 'ek,ck,dce', '782585595', 'ezio12@hotmail.fr', 'ezio12@hotmail.fr', '100000000000000', 58, 1, 'Concubin(e)', '', 0, '', 0, 0, ''),
(68, 'Monsieur', 'ldcmlc', 'scsccsc', 'scscs', 'cs', '1998-06-24', 'Vernon', '36 bis sente de la fosse diard', '', '27200', 'ek,ck,dce', '782585595', 'ezio12@hotmail.fr', 'ezio12@hotmail.fr', '100000000000000', 58, 1, 'Concubin(e)', '', 0, '', 0, 0, ''),
(69, 'Monsieur', 'ldcmlc', 'scsccsc', 'scscs', 'cs', '1998-06-24', 'Vernon', '36 bis sente de la fosse diard', '', '27200', 'ek,ck,dce', '782585595', 'ezio12@hotmail.fr', 'ezio12@hotmail.fr', '100000000000000', 58, 1, 'Concubin(e)', '', 0, '', 0, 0, ''),
(70, 'Monsieur', 'ldcmlc', 'scsccsc', 'scscs', 'cs', '1998-06-24', 'Vernon', '36 bis sente de la fosse diard', '', '27200', 'ek,ck,dce', '782585595', 'ezio12@hotmail.fr', 'ezio12@hotmail.fr', '100000000000000', 58, 1, 'Concubin(e)', '', 0, '', 0, 0, ''),
(71, 'Monsieur', 'ldcmlc', 'scsccsc', 'scscs', 'cs', '1998-06-24', 'Vernon', '36 bis sente de la fosse diard', '', '27200', 'ek,ck,dce', '782585595', 'ezio12@hotmail.fr', 'ezio12@hotmail.fr', '100000000000000', 58, 1, 'Concubin(e)', '', 0, '', 0, 0, ''),
(72, 'Monsieur', 'ldcmlc', 'scsccsc', 'scscs', 'cs', '1998-06-24', 'Vernon', '36 bis sente de la fosse diard', '', '27200', 'ek,ck,dce', '782585595', 'ezio12@hotmail.fr', 'ezio12@hotmail.fr', '100000000000000', 58, 1, 'Concubin(e)', '', 0, '', 0, 0, ''),
(73, 'Monsieur', 'ldcmlc', 'scsccsc', 'scscs', 'cs', '1998-06-24', 'Vernon', '36 bis sente de la fosse diard', '', '27200', 'ek,ck,dce', '782585595', 'ezio12@hotmail.fr', 'ezio12@hotmail.fr', '100000000000000', 58, 1, 'Concubin(e)', '', 0, '', 0, 0, ''),
(74, 'Monsieur', 'ldcmlc', 'scsccsc', 'scscs', 'cs', '1998-06-24', 'Vernon', '36 bis sente de la fosse diard', '', '27200', 'ek,ck,dce', '782585595', 'ezio12@hotmail.fr', 'ezio12@hotmail.fr', '100000000000000', 58, 1, 'Concubin(e)', '', 0, '', 0, 0, ''),
(75, 'Monsieur', 'ldcmlc', 'scsccsc', 'scscs', 'cs', '1998-06-24', 'Vernon', '36 bis sente de la fosse diard', '', '27200', 'ek,ck,dce', '782585595', 'ezio12@hotmail.fr', 'ezio12@hotmail.fr', '100000000000000', 58, 1, 'Concubin(e)', '', 0, '', 0, 0, ''),
(76, 'Monsieur', 'ldcmlc', 'scsccsc', 'scscs', 'cs', '1998-06-24', 'Vernon', '36 bis sente de la fosse diard', '', '27200', 'ek,ck,dce', '782585595', 'ezio12@hotmail.fr', 'ezio12@hotmail.fr', '100000000000000', 58, 1, 'Concubin(e)', '', 0, '', 0, 0, ''),
(77, 'Monsieur', 'ldcmlc', 'scsccsc', 'scscs', 'cs', '1998-06-24', 'Vernon', '36 bis sente de la fosse diard', '', '27200', 'ek,ck,dce', '782585595', 'ezio12@hotmail.fr', 'ezio12@hotmail.fr', '100000000000000', 58, 1, 'Concubin(e)', '', 0, '', 0, 0, ''),
(78, 'Monsieur', 'ldcmlc', 'scsccsc', 'scscs', 'cs', '1998-06-24', 'Vernon', '36 bis sente de la fosse diard', '', '27200', 'ek,ck,dce', '782585595', 'ezio12@hotmail.fr', 'ezio12@hotmail.fr', '100000000000000', 58, 1, 'Concubin(e)', '', 0, '', 0, 0, ''),
(79, 'Monsieur', 'ldcmlc', 'scsccsc', 'scscs', 'cs', '1998-06-24', 'Vernon', '36 bis sente de la fosse diard', '', '27200', 'ek,ck,dce', '782585595', 'ezio12@hotmail.fr', 'ezio12@hotmail.fr', '100000000000000', 58, 1, 'Concubin(e)', '', 0, '', 0, 0, ''),
(80, 'Monsieur', 'ldcmlc', 'scsccsc', 'scscs', 'cs', '1998-06-24', 'Vernon', '36 bis sente de la fosse diard', '', '27200', 'ek,ck,dce', '782585595', 'ezio12@hotmail.fr', 'ezio12@hotmail.fr', '100000000000000', 58, 1, 'Concubin(e)', '', 0, '', 0, 0, ''),
(81, 'Monsieur', 'ldcmlc', 'scsccsc', 'scscs', 'cs', '1998-06-24', 'Vernon', '36 bis sente de la fosse diard', '', '27200', 'ek,ck,dce', '782585595', 'ezio12@hotmail.fr', 'ezio12@hotmail.fr', '100000000000000', 58, 1, 'Concubin(e)', '', 0, '', 0, 0, ''),
(82, 'Monsieur', 'ldcmlc', 'scsccsc', 'scscs', 'cs', '1998-06-24', 'Vernon', '36 bis sente de la fosse diard', '', '27200', 'ek,ck,dce', '782585595', 'ezio12@hotmail.fr', 'ezio12@hotmail.fr', '100000000000000', 58, 1, 'Concubin(e)', '', 0, '', 0, 0, ''),
(83, 'Monsieur', 'ldcmlc', 'scsccsc', 'scscs', 'cs', '1998-06-24', 'Vernon', '36 bis sente de la fosse diard', '', '27200', 'ek,ck,dce', '782585595', 'ezio12@hotmail.fr', 'ezio12@hotmail.fr', '100000000000000', 58, 1, 'Concubin(e)', '', 0, '', 0, 0, ''),
(84, 'Monsieur', 'ldcmlc', 'scsccsc', 'scscs', 'cs', '1998-06-24', 'Vernon', '36 bis sente de la fosse diard', '', '27200', 'ek,ck,dce', '782585595', 'ezio12@hotmail.fr', 'ezio12@hotmail.fr', '100000000000000', 58, 1, 'Concubin(e)', '', 0, '', 0, 0, ''),
(85, 'Monsieur', 'ldcmlc', 'scsccsc', 'scscs', 'cs', '1998-06-24', 'Vernon', '36 bis sente de la fosse diard', '', '27200', 'ek,ck,dce', '782585595', 'ezio12@hotmail.fr', 'ezio12@hotmail.fr', '100000000000000', 58, 1, 'Concubin(e)', '', 0, '', 0, 0, ''),
(86, 'Monsieur', 'ldcmlc', 'scsccsc', 'scscs', 'cs', '1998-06-24', 'Vernon', '36 bis sente de la fosse diard', '', '27200', 'ek,ck,dce', '782585595', 'ezio12@hotmail.fr', 'ezio12@hotmail.fr', '100000000000000', 58, 1, 'Concubin(e)', '', 0, '', 0, 0, ''),
(87, 'Monsieur', 'ldcmlc', 'scsccsc', 'scscs', 'cs', '1998-06-24', 'Vernon', '36 bis sente de la fosse diard', '', '27200', 'ek,ck,dce', '782585595', 'ezio12@hotmail.fr', 'ezio12@hotmail.fr', '100000000000000', 58, 1, 'Concubin(e)', '', 0, '', 0, 0, ''),
(88, 'Monsieur', 'ldcmlc', 'scsccsc', 'scscs', 'cs', '1998-06-24', 'Vernon', '36 bis sente de la fosse diard', '', '27200', 'ek,ck,dce', '782585595', 'ezio12@hotmail.fr', 'ezio12@hotmail.fr', '100000000000000', 58, 1, 'Concubin(e)', '', 0, '', 0, 0, ''),
(89, 'Monsieur', 'ldcmlc', 'scsccsc', 'scscs', 'cs', '1998-06-24', 'Vernon', '36 bis sente de la fosse diard', '', '27200', 'ek,ck,dce', '782585595', 'ezio12@hotmail.fr', 'ezio12@hotmail.fr', '100000000000000', 58, 1, 'Concubin(e)', '', 0, '', 0, 0, ''),
(90, 'Monsieur', 'Fonteyn', 'Maximilien', 'Maximilien', 'France', '6985-06-05', 'Vernon', '36 Bis sente de la fosse Diard', '', '27200', 'Vernon', '767957134', 'maximilien.fonteyn@gmail.com', 'maximilien.fonteyn@gmail.com', '100000000000000', 56, 1, 'Concubin(e)', '', 0, '', 0, 0, ''),
(91, 'Monsieur', 'Fonteyn', 'Maximilien', 'Maximilien', 'France', '6985-06-05', 'Vernon', '36 Bis sente de la fosse Diard', '', '27200', 'Vernon', '767957134', 'maximilien.fonteyn@gmail.com', 'maximilien.fonteyn@gmail.com', '100000000000000', 56, 1, 'Concubin(e)', '', 0, '', 0, 0, ''),
(92, 'Monsieur', 'Fonteyn', 'Maximilien', 'Maximilien', 'France', '6985-06-05', 'Vernon', '36 Bis sente de la fosse Diard', '', '27200', 'Vernon', '767957134', 'maximilien.fonteyn@gmail.com', 'maximilien.fonteyn@gmail.com', '100000000000000', 56, 1, 'Concubin(e)', '', 0, '', 0, 0, ''),
(93, 'Monsieur', 'Fonteyn', 'Maximilien', 'Fonteyn', 'fe', '8585-05-02', 'Vernon', '36 bis sente de la fosse diard', '', '27200', 'fer', '767957134', 'maximilien.fonteyn@gmail.com', 'maximilien.fonteyn@gmail.com', '100000000000000', 85, 1, 'Concubin(e)', '', 0, '', 0, 0, ''),
(94, 'Monsieur', 'Fonteyn', 'Maximilien', 'Fonteyn', 'f', '8585-02-05', 'Vernon', '36 bis sente de la fosse diard', '', '27200', 'Le Havre', '782585595', 'ezio12@hotmail.fr', 'ezio12@hotmail.fr', '111111111111111', 65, 0, 'Concubin(e)', '', 0, '', 0, 0, ''),
(95, 'Monsieur', 'Fonteyn', 'Maximilien', 'Fonteyn', 'France', '3298-06-05', 'Vernon', '36 bis sente de la fosse diard', '', '27200', 'Rouen', '767957134', 'maximilien.fonteyn@gmail.com', 'maximilien.fonteyn@gmail.com', '111111111111100', 65, 0, 'Concubin(e)', '', 0, '', 0, 0, ''),
(96, 'Monsieur', 'f', 'p', '', 'gt', '5687-07-09', 'r', 'a', '', '98765', 'D', '987654321', 'a@mail.com', 'f@mail.com', '222222222222222', 98, 0, 'Concubin(e)', '', 0, '', 0, 0, ''),
(97, 'Monsieur', 'f', 'p', '', 'gt', '5687-07-09', 'r', 'a', '', '98765', 'D', '987654321', 'a@mail.com', 'f@mail.com', '222222222222222', 98, 0, 'Concubin(e)', '', 0, '', 0, 0, ''),
(98, 'Monsieur', 'f', 'p', '', 'gt', '5687-07-09', 'r', 'a', '', '98765', 'D', '987654321', 'a@mail.com', 'f@mail.com', '222222222222222', 98, 0, 'Concubin(e)', '', 0, '', 0, 0, ''),
(99, 'Monsieur', 'f', 'p', '', 'gt', '5687-07-09', 'r', 'a', '', '98765', 'D', '987654321', 'a@mail.com', 'f@mail.com', '222222222222222', 98, 0, 'Concubin(e)', '', 0, '', 0, 0, ''),
(100, 'Monsieur', 'f', 'p', '', 'gt', '5687-07-09', 'r', 'a', '', '98765', 'D', '987654321', 'a@mail.com', 'f@mail.com', '222222222222222', 98, 0, 'Concubin(e)', '', 0, '', 0, 0, ''),
(101, 'Monsieur', 'f', 'p', '', 'gt', '5687-07-09', 'r', 'a', '', '98765', 'D', '987654321', 'a@mail.com', 'f@mail.com', '222222222222222', 98, 0, 'Concubin(e)', '', 0, '', 0, 0, ''),
(102, 'Monsieur', 'Clenche', 'Jean', '', 'France', '3456-02-01', 'ICI', 'la bas', '', '13455', 'ville', '123456789', 'jeanclenche@mail.com', 'perso@mail.fr', '123456789654387', 8000, 1, 'Marié(e)', 'Etragnères', 0, '', 0, 0, ''),
(103, 'Monsieur', 'fonteyn', 'biniou', '', 'GH', '9880-05-05', 'OI', 'ajv', '', '98757', 'ville', '986543456', 'k@hail.com', 'o@gt.fr', '222222222222222', 987, 1, 'Célibataire', 'langues', 0, '', 0, 0, ''),
(104, 'Monsieur', 'fonteyn', 'biniou', '', 'GH', '9880-05-05', 'OI', 'ajv', '', '98757', 'ville', '986543456', 'k@hail.com', 'o@gt.fr', '222222222222222', 987, 1, 'Célibataire', 'langues', 0, '', 0, 0, ''),
(105, 'Monsieur', 'fonteyn', 'biniou', '', 'GH', '9880-05-05', 'OI', 'ajv', '', '98757', 'ville', '986543456', 'k@hail.com', 'o@gt.fr', '222222222222222', 987, 1, 'Célibataire', 'langues', 0, '', 0, 0, ''),
(106, 'Monsieur', 'f', 'f', '', 'fz', '2015-02-03', 'f', 'fa', '', '98775', 'a', '912345676', 'mpa@gom.fr', 'poam@ao.com', '222222222222222', 14, 1, 'Marié(e)', '', 0, '', 0, 0, ''),
(107, 'Monsieur', 'f', 'f', '', 'fz', '2015-02-03', 'f', 'fa', '', '98775', 'a', '912345676', 'mpa@gom.fr', 'poam@ao.com', '222222222222222', 14, 1, 'Marié(e)', '', 0, '', 0, 0, ''),
(108, 'Monsieur', 'f', 'f', '', 'fz', '2015-02-03', 'f', 'fa', '', '98775', 'a', '912345676', 'mpa@gom.fr', 'poam@ao.com', '222222222222222', 14, 1, 'Marié(e)', '', 0, '', 0, 0, ''),
(109, 'Monsieur', 'f', 'f', '', 'fz', '2015-02-03', 'f', 'fa', '', '98775', 'a', '912345676', 'mpa@gom.fr', 'poam@ao.com', '222222222222222', 14, 1, 'Marié(e)', '', 0, '', 0, 0, ''),
(110, 'Monsieur', 'gy', 'f', '', 'i', '2024-06-02', 'omp', 'aze', '', '98765', 'zd', '987654321', 'ma@oi.com', 'op@ao.fr', '222222222222222', 14, 0, 'Concubin(e)', '', 0, '', 0, 0, ''),
(111, 'Monsieur', 'mpa', 'pa', '', 'f', '2016-02-02', 'az', 's', '', '9876', 'a', '987654321', 'mpa@fra.com', 'mpa@com.fr', '100000000000060', 15, 0, 'Marié(e)', '', 0, '', 0, 0, ''),
(112, 'Monsieur', 'mpa', 'pa', '', 'f', '2016-02-02', 'az', 's', '', '9876', 'a', '987654321', 'mpa@fra.com', 'mpa@com.fr', '100000000000060', 15, 0, 'Marié(e)', '', 0, '', 0, 0, ''),
(113, 'Monsieur', 'mpa', 'pa', '', 'f', '2016-02-02', 'az', 's', '', '9876', 'a', '987654321', 'mpa@fra.com', 'mpa@com.fr', '100000000000060', 15, 0, 'Marié(e)', '', 0, '', 0, 0, ''),
(114, 'Monsieur', 'mpa', 'pa', '', 'f', '2016-02-02', 'az', 's', '', '9876', 'a', '987654321', 'mpa@fra.com', 'mpa@com.fr', '100000000000060', 15, 0, 'Marié(e)', '', 0, '', 0, 0, ''),
(115, 'Monsieur', 'mpa', 'pa', '', 'f', '2016-02-02', 'az', 's', '', '9876', 'a', '987654321', 'mpa@fra.com', 'mpa@com.fr', '100000000000060', 15, 0, 'Marié(e)', '', 0, '', 0, 0, ''),
(116, 'Monsieur', 'mpa', 'pa', '', 'f', '2016-02-02', 'az', 's', '', '9876', 'a', '987654321', 'mpa@fra.com', 'mpa@com.fr', '100000000000060', 15, 0, 'Marié(e)', '', 0, '', 0, 0, ''),
(117, 'Monsieur', 'f', 'a', 'f', 'f', '2020-01-02', 'f', 'f', '', '14568', 'a', '987654321', 'mpa@co.com', 'mds@a.fr', '100000000000000', 20, 0, 'Concubin(e)', '', 0, '', 0, 0, ''),
(118, 'Monsieur', 'f', 'a', 'f', 'f', '2020-01-02', 'f', 'f', '', '14568', 'a', '987654321', 'mpa@co.com', 'mds@a.fr', '100000000000000', 20, 0, 'Concubin(e)', '', 0, '', 0, 0, ''),
(119, 'Monsieur', 'a', 'f', '', 'f', '2022-05-05', 'fe', 'dfz', '', '9876', 'ad', '987678769', 'mpa@co.com', 'd@mail.com', '100000000000000', 9, 1, 'Marié(e)', '', 0, '', 0, 0, ''),
(120, 'Monsieur', 'f', 'O', '', 'p', '9865-07-07', 'o', 'o', '', '18765', 'u', '987654321', 'pa@mail.fr', 'map@mail.com', '100000000000000', 4, 0, 'Marié(e)', '', 0, '', 0, 0, ''),
(121, 'Monsieur', 'f', 'O', '', 'p', '9865-07-07', 'o', 'o', '', '18765', 'u', '987654321', 'pa@mail.fr', 'map@mail.com', '100000000000000', 4, 0, 'Marié(e)', '', 0, '', 0, 0, ''),
(122, 'Monsieur', 'f', 'O', '', 'p', '9865-07-07', 'o', 'o', '', '18765', 'u', '987654321', 'pa@mail.fr', 'map@mail.com', '100000000000000', 4, 0, 'Marié(e)', '', 0, '', 0, 0, ''),
(123, 'Monsieur', 'p', 'a', '', 'a', '2023-10-02', 'if', 'fdf', '', '9876', 'p', '987654321', 'mp@map.com', 'pa@gti.fr', '100000000000000', 11, 0, 'Marié(e)', '', 0, '', 0, 0, ''),
(124, 'Monsieur', 'f', 'f', '', 'a', '2016-02-03', 'a', 'a', '', '976', 'A', '987678769', 'ma@oi.com', 'op@ao.fr', '100000000000000', 12, 0, 'Pacsé(e)', '', 0, '', 0, 0, ''),
(125, 'Monsieur', 'f', 'f', '', 'a', '2016-02-03', 'a', 'a', '', '976', 'A', '987678769', 'ma@oi.com', 'op@ao.fr', '100000000000000', 12, 0, 'Pacsé(e)', '', 0, '', 0, 0, ''),
(126, 'Monsieur', 'f', 'f', '', 'a', '2016-02-03', 'a', 'a', '', '976', 'A', '987678769', 'ma@oi.com', 'op@ao.fr', '100000000000000', 12, 0, 'Pacsé(e)', '', 0, '', 0, 0, ''),
(127, 'Monsieur', 'f', 'f', '', 'a', '2016-02-03', 'a', 'a', '', '976', 'A', '987678769', 'ma@oi.com', 'op@ao.fr', '100000000000000', 12, 0, 'Pacsé(e)', '', 0, '', 0, 0, ''),
(128, 'Monsieur', 'a', 'a', 'a', 'a', '2016-04-04', 'a', 'a', 'a', '98766', 'V', '987654321', 'mpa@co.com', 'op@ao.fr', '100000000000000', 4, 0, 'Marié(e)', '', 0, '', 0, 0, ''),
(129, 'Monsieur', 'a', 'a', 'a', 'a', '2016-04-04', 'a', 'a', 'a', '98766', 'V', '987654321', 'mpa@co.com', 'op@ao.fr', '100000000000000', 4, 0, 'Marié(e)', '', 0, '', 0, 0, ''),
(130, 'Monsieur', 'a', 'a', 'a', 'a', '2022-03-03', 'a', 'a', 'a', '9878', 'a', '1234567890', 'mpa@fra.com', 'mpa@com.fr', '100000000000001', 5, 1, 'Pacsé(e)', '', 0, '', 0, 1, 'fkoefkoe'),
(131, 'Monsieur', 'a', 'a', 'a', 'a', '2021-10-02', 'al', 'd', 'd', '9876', 'AE', '1234567890', 'ma@oi.com', 'op@ao.fr', '100000000000000', 3, 1, 'Concubin(e)', '', 0, '', 0, 0, ''),
(132, 'Monsieur', 'a', 'a', 'a', 'a', '2021-10-02', 'al', 'd', 'd', '9876', 'AE', '1234567890', 'ma@oi.com', 'op@ao.fr', '100000000000000', 3, 1, 'Concubin(e)', '', 0, '', 0, 0, ''),
(133, 'Monsieur', 'a', 'a', 'a', 'a', '2021-10-02', 'al', 'd', 'd', '9876', 'AE', '1234567890', 'ma@oi.com', 'op@ao.fr', '100000000000000', 3, 1, 'Concubin(e)', '', 0, '', 0, 0, ''),
(134, 'Monsieur', 'a', 'a', 'a', 'a', '2021-10-02', 'al', 'd', 'd', '9876', 'AE', '1234567890', 'ma@oi.com', 'op@ao.fr', '100000000000000', 3, 1, 'Concubin(e)', '', 0, '', 0, 0, ''),
(135, 'Monsieur', 'a', 'a', 'a', 'a', '2021-10-02', 'al', 'd', 'd', '9876', 'AE', '1234567890', 'ma@oi.com', 'op@ao.fr', '100000000000000', 3, 1, 'Concubin(e)', '', 0, '', 0, 0, ''),
(136, 'Monsieur', 'a', 'a', 'a', 'a', '2021-10-02', 'al', 'd', 'd', '9876', 'AE', '1234567890', 'ma@oi.com', 'op@ao.fr', '100000000000000', 3, 1, 'Concubin(e)', '', 0, '', 0, 0, ''),
(137, 'Monsieur', 'a', 'a', 'a', 'a', '2021-10-02', 'al', 'd', 'd', '9876', 'AE', '1234567890', 'ma@oi.com', 'op@ao.fr', '100000000000000', 3, 1, 'Concubin(e)', '', 0, '', 0, 0, ''),
(138, 'Monsieur', 'a', 'a', 'a', 'a', '2021-10-02', 'al', 'd', 'd', '9876', 'AE', '1234567890', 'ma@oi.com', 'op@ao.fr', '100000000000000', 3, 1, 'Concubin(e)', '', 0, '', 0, 0, ''),
(139, 'Monsieur', 'a', 'a', 'a', 'a', '2021-10-02', 'al', 'd', 'd', '9876', 'AE', '1234567890', 'ma@oi.com', 'op@ao.fr', '100000000000000', 3, 1, 'Concubin(e)', '', 0, '', 0, 0, ''),
(140, 'Monsieur', 'a', 'a', 'a', 'a', '2021-10-02', 'al', 'd', 'd', '9876', 'AE', '1234567890', 'ma@oi.com', 'op@ao.fr', '100000000000000', 3, 1, 'Concubin(e)', '', 0, '', 0, 0, ''),
(141, 'Monsieur', 'a', 'a', 'a', 'a', '2021-10-02', 'al', 'd', 'd', '9876', 'AE', '1234567890', 'ma@oi.com', 'op@ao.fr', '100000000000000', 3, 1, 'Concubin(e)', '', 0, '', 0, 0, ''),
(142, 'Monsieur', 'a', 'a', '', 'a', '2021-10-03', 'a', 'a', 'a', '9876', 'z', '987654321', 'mpa@co.com', 'o@gt.fr', '100000000000000', 3, 0, 'Concubin(e)', '', 0, '', 0, 0, ''),
(143, 'Monsieur', 'a', 'a', '', 'a', '2021-10-03', 'a', 'a', 'a', '9876', 'z', '987654321', 'mpa@co.com', 'o@gt.fr', '100000000000000', 3, 0, 'Concubin(e)', '', 0, '', 0, 0, ''),
(144, 'Monsieur', 'a', 'a', '', 'a', '2021-10-03', 'a', 'a', 'a', '9876', 'z', '987654321', 'mpa@co.com', 'o@gt.fr', '100000000000000', 3, 0, 'Concubin(e)', '', 0, '', 0, 0, ''),
(145, 'Monsieur', 'a', 'a', '', 'a', '2021-10-03', 'a', 'a', 'a', '9876', 'z', '987654321', 'mpa@co.com', 'o@gt.fr', '100000000000000', 3, 0, 'Concubin(e)', '', 0, '', 0, 0, ''),
(146, 'Monsieur', 'a', 'a', 'a', 'a', '2021-10-03', 'a', 'a', '', '9876', 'a', '987654321', 'ma@oi.com', 'd@mail.com', '100000000000000', 5, 0, 'Célibataire', '', 0, '', 0, 0, ''),
(147, 'Monsieur', 'a', 'a', 'a', 'a', '2021-10-03', 'a', 'a', '', '9876', 'a', '987654321', 'ma@oi.com', 'd@mail.com', '100000000000000', 5, 0, 'Célibataire', '', 0, '', 0, 0, ''),
(148, 'Monsieur', 'a', 'a', 'a', 'jfe', '2022-10-03', 'omp', 'aze', '', '59876', 'ad', '987678769', 'g@mail.com', 'd@mail.com', '100000000000002', 16, 0, 'Célibataire', '', 0, '', 0, 0, ''),
(149, 'Monsieur', 'a', 'a', 'a', 'jfe', '2022-10-03', 'omp', 'aze', '', '59876', 'ad', '987678769', 'g@mail.com', 'd@mail.com', '100000000000002', 16, 0, 'Célibataire', '', 0, '', 0, 0, ''),
(150, 'Monsieur', 'a', 'a', 'a', 'jfe', '2022-10-03', 'omp', 'aze', '', '59876', 'ad', '987678769', 'g@mail.com', 'd@mail.com', '100000000000002', 16, 0, 'Célibataire', '', 0, '', 0, 0, ''),
(151, 'Monsieur', 'a', 'a', 'a', 'jfe', '2022-10-03', 'omp', 'aze', '', '59876', 'ad', '987678769', 'g@mail.com', 'd@mail.com', '100000000000002', 16, 0, 'Célibataire', '', 0, '', 0, 0, ''),
(152, 'Monsieur', 'a', 'a', 'a', 'jfe', '2022-10-03', 'omp', 'aze', '', '59876', 'ad', '987678769', 'g@mail.com', 'd@mail.com', '100000000000002', 16, 0, 'Célibataire', '', 0, '', 0, 0, ''),
(153, 'Monsieur', 'a', 'a', 'a', 'jfe', '2022-10-03', 'omp', 'aze', '', '59876', 'ad', '987678769', 'g@mail.com', 'd@mail.com', '100000000000002', 16, 0, 'Célibataire', '', 0, '', 0, 0, ''),
(154, 'Monsieur', 'a', 'a', 'a', 'jfe', '2022-10-03', 'omp', 'aze', '', '59876', 'ad', '987678769', 'g@mail.com', 'd@mail.com', '100000000000002', 16, 0, 'Célibataire', '', 0, '', 0, 0, ''),
(155, 'Monsieur', 'a', 'a', 'a', 'jfe', '2022-10-03', 'omp', 'aze', '', '59876', 'ad', '987678769', 'g@mail.com', 'd@mail.com', '100000000000002', 16, 0, 'Célibataire', '', 0, '', 0, 0, ''),
(156, 'Monsieur', 'a', 'a', 'a', 'jfe', '2022-10-03', 'omp', 'aze', '', '59876', 'ad', '987678769', 'g@mail.com', 'd@mail.com', '100000000000002', 16, 0, 'Célibataire', '', 0, '', 0, 0, ''),
(157, 'Monsieur', 'a', 'a', 'a', 'jfe', '2022-10-03', 'omp', 'aze', '', '59876', 'ad', '987678769', 'g@mail.com', 'd@mail.com', '100000000000002', 16, 0, 'Célibataire', '', 0, '', 0, 0, ''),
(158, 'Monsieur', 'a', 'a', 'a', 'jfe', '2022-10-03', 'omp', 'aze', '', '59876', 'ad', '987678769', 'g@mail.com', 'd@mail.com', '100000000000002', 16, 0, 'Célibataire', '', 0, '', 0, 0, ''),
(159, 'Monsieur', 'a', 'a', 'a', 'jfe', '2022-10-03', 'omp', 'aze', '', '59876', 'ad', '987678769', 'g@mail.com', 'd@mail.com', '100000000000002', 16, 0, 'Célibataire', '', 0, '', 0, 0, ''),
(160, 'Monsieur', 'a', 'a', 'a', 'jfe', '2022-10-03', 'omp', 'aze', '', '59876', 'ad', '987678769', 'g@mail.com', 'd@mail.com', '100000000000002', 16, 0, 'Célibataire', '', 0, '', 0, 0, ''),
(161, 'Monsieur', 'a', 'a', 'a', 'jfe', '2022-10-03', 'omp', 'aze', '', '59876', 'ad', '987678769', 'g@mail.com', 'd@mail.com', '100000000000002', 16, 0, 'Célibataire', '', 0, '', 0, 0, ''),
(162, 'Monsieur', 'a', 'a', 'a', 'jfe', '2022-10-03', 'omp', 'aze', '', '59876', 'ad', '987678769', 'g@mail.com', 'd@mail.com', '100000000000002', 16, 0, 'Célibataire', '', 0, '', 0, 0, ''),
(163, 'Monsieur', 'a', 'a', 'a', 'jfe', '2022-10-03', 'omp', 'aze', '', '59876', 'ad', '987678769', 'g@mail.com', 'd@mail.com', '100000000000002', 16, 0, 'Célibataire', '', 0, '', 0, 0, ''),
(164, 'Monsieur', 'a', 'a', 'a', 'jfe', '2022-10-03', 'omp', 'aze', '', '59876', 'ad', '987678769', 'g@mail.com', 'd@mail.com', '100000000000002', 16, 0, 'Célibataire', '', 0, '', 0, 0, ''),
(165, 'Monsieur', 'a', 'a', 'a', 'jfe', '2022-10-03', 'omp', 'aze', '', '59876', 'ad', '987678769', 'g@mail.com', 'd@mail.com', '100000000000002', 16, 0, 'Célibataire', '', 0, '', 0, 0, ''),
(166, 'Monsieur', 'a', 'a', 'a', 'jfe', '2022-10-03', 'omp', 'aze', '', '59876', 'ad', '987678769', 'g@mail.com', 'd@mail.com', '100000000000002', 16, 0, 'Célibataire', '', 0, '', 0, 0, ''),
(167, 'Monsieur', 'a', 'a', 'a', 'jfe', '2022-10-03', 'omp', 'aze', '', '59876', 'ad', '987678769', 'g@mail.com', 'd@mail.com', '100000000000002', 16, 0, 'Célibataire', '', 0, '', 0, 0, ''),
(168, 'Monsieur', 'a', 'a', 'a', 'jfe', '2022-10-03', 'omp', 'aze', '', '59876', 'ad', '987678769', 'g@mail.com', 'd@mail.com', '100000000000002', 16, 0, 'Célibataire', '', 0, '', 0, 0, ''),
(169, 'Monsieur', 'a', 'a', 'a', 'jfe', '2022-10-03', 'omp', 'aze', '', '59876', 'ad', '987678769', 'g@mail.com', 'd@mail.com', '100000000000002', 16, 0, 'Célibataire', '', 0, '', 0, 0, ''),
(170, 'Monsieur', 'a', 'a', 'a', 'jfe', '2022-10-03', 'omp', 'aze', '', '59876', 'ad', '987678769', 'g@mail.com', 'd@mail.com', '100000000000002', 16, 0, 'Célibataire', '', 0, '', 0, 0, ''),
(171, 'Monsieur', 'a', 'a', 'a', 'jfe', '2022-10-03', 'omp', 'aze', '', '59876', 'ad', '987678769', 'g@mail.com', 'd@mail.com', '100000000000002', 16, 0, 'Célibataire', '', 0, '', 0, 0, ''),
(172, 'Monsieur', 'a', 'a', 'a', 'jfe', '2022-10-03', 'omp', 'aze', '', '59876', 'ad', '987678769', 'g@mail.com', 'd@mail.com', '100000000000002', 16, 0, 'Célibataire', '', 0, '', 0, 0, ''),
(173, 'Monsieur', 'a', 'a', 'a', 'jfe', '2022-10-03', 'omp', 'aze', '', '59876', 'ad', '987678769', 'g@mail.com', 'd@mail.com', '100000000000002', 16, 0, 'Célibataire', '', 0, '', 0, 0, ''),
(174, 'Monsieur', 'a', 'a', 'a', 'jfe', '2022-10-03', 'omp', 'aze', '', '59876', 'ad', '987678769', 'g@mail.com', 'd@mail.com', '100000000000002', 16, 0, 'Célibataire', '', 0, '', 0, 0, ''),
(175, 'Monsieur', 'a', 'a', 'a', 'jfe', '2022-10-03', 'omp', 'aze', '', '59876', 'ad', '987678769', 'g@mail.com', 'd@mail.com', '100000000000002', 16, 0, 'Célibataire', '', 0, '', 0, 0, ''),
(176, 'Monsieur', 'a', 'a', 'a', 'jfe', '2022-10-03', 'omp', 'aze', '', '59876', 'ad', '987678769', 'g@mail.com', 'd@mail.com', '100000000000002', 16, 0, 'Célibataire', '', 0, '', 0, 0, ''),
(177, 'Monsieur', 'a', 'a', 'a', 'jfe', '2022-10-03', 'omp', 'aze', '', '59876', 'ad', '987678769', 'g@mail.com', 'd@mail.com', '100000000000002', 16, 0, 'Célibataire', '', 0, '', 0, 0, ''),
(178, 'Monsieur', 'a', 'a', 'a', 'jfe', '2022-10-03', 'omp', 'aze', '', '59876', 'ad', '987678769', 'g@mail.com', 'd@mail.com', '100000000000002', 16, 0, 'Célibataire', '', 0, '', 0, 0, ''),
(179, 'Monsieur', 'a', 'a', '', 'a', '2023-09-02', 'hgrkj', 'aze', 'a', '98765', 'az', '987654321', 'k@hail.com', 'op@ao.fr', '100000000000001', 4, 0, 'Pacsé(e)', '', 0, '', 0, 0, ''),
(180, 'Monsieur', 'a', 'a', '', 'a', '2023-09-02', 'hgrkj', 'aze', 'a', '98765', 'az', '987654321', 'k@hail.com', 'op@ao.fr', '100000000000001', 4, 0, 'Pacsé(e)', '', 0, '', 0, 0, ''),
(181, 'Monsieur', 'a', 'a', '', 'a', '2023-09-02', 'hgrkj', 'aze', 'a', '98765', 'az', '987654321', 'k@hail.com', 'op@ao.fr', '100000000000001', 4, 0, 'Pacsé(e)', '', 0, '', 0, 0, ''),
(182, 'Monsieur', 'a', 'a', '', 'a', '2023-09-02', 'hgrkj', 'aze', 'a', '98765', 'az', '987654321', 'k@hail.com', 'op@ao.fr', '100000000000001', 4, 0, 'Pacsé(e)', '', 0, '', 0, 0, ''),
(183, 'Monsieur', 'a', 'a', '', 'a', '2023-09-02', 'hgrkj', 'aze', 'a', '98765', 'az', '987654321', 'k@hail.com', 'op@ao.fr', '100000000000001', 4, 0, 'Pacsé(e)', '', 0, '', 0, 0, ''),
(184, 'Monsieur', 'a', 'a', '', 'a', '2023-09-02', 'hgrkj', 'aze', 'a', '98765', 'az', '987654321', 'k@hail.com', 'op@ao.fr', '100000000000001', 4, 0, 'Pacsé(e)', '', 0, '', 0, 0, ''),
(185, 'Monsieur', 'a', 'a', '', 'a', '2023-09-02', 'hgrkj', 'aze', 'a', '98765', 'az', '987654321', 'k@hail.com', 'op@ao.fr', '100000000000001', 4, 0, 'Pacsé(e)', '', 0, '', 0, 0, ''),
(186, 'Monsieur', 'a', 'a', '', 'a', '2023-09-02', 'hgrkj', 'aze', 'a', '98765', 'az', '987654321', 'k@hail.com', 'op@ao.fr', '100000000000001', 4, 0, 'Pacsé(e)', '', 0, '', 0, 0, ''),
(187, 'Monsieur', 'a', 'a', '', 'a', '2023-09-02', 'hgrkj', 'aze', 'a', '98765', 'az', '987654321', 'k@hail.com', 'op@ao.fr', '100000000000001', 4, 0, 'Pacsé(e)', '', 0, '', 0, 0, ''),
(188, 'Monsieur', 'a', 'a', '', 'a', '2023-09-02', 'hgrkj', 'aze', 'a', '98765', 'az', '987654321', 'k@hail.com', 'op@ao.fr', '100000000000001', 4, 0, 'Pacsé(e)', '', 0, '', 0, 0, ''),
(189, 'Monsieur', 'a', 'a', '', 'a', '2023-09-02', 'hgrkj', 'aze', 'a', '98765', 'az', '987654321', 'k@hail.com', 'op@ao.fr', '100000000000001', 4, 0, 'Pacsé(e)', '', 0, '', 0, 0, ''),
(190, 'Monsieur', 'a', 'a', '', 'a', '2023-09-02', 'hgrkj', 'aze', 'a', '98765', 'az', '987654321', 'k@hail.com', 'op@ao.fr', '100000000000001', 4, 0, 'Pacsé(e)', '', 0, '', 0, 0, '');

-- --------------------------------------------------------

--
-- Structure de la table `salarie_categorie_socio_professionnelle`
--

DROP TABLE IF EXISTS `salarie_categorie_socio_professionnelle`;
CREATE TABLE IF NOT EXISTS `salarie_categorie_socio_professionnelle` (
  `id_salarie` int(11) NOT NULL,
  `id_categorie_socio_professionnelle` int(11) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  KEY `id_categorie_socio-professionnelle` (`id_categorie_socio_professionnelle`),
  KEY `id_salarie` (`id_salarie`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `salarie_categorie_socio_professionnelle`
--

INSERT INTO `salarie_categorie_socio_professionnelle` (`id_salarie`, `id_categorie_socio_professionnelle`, `date_debut`, `date_fin`) VALUES
(37, 2, '2006-04-03', '2008-12-08'),
(38, 2, '2006-04-03', '2008-12-08'),
(39, 2, '2006-04-03', '2008-12-08'),
(40, 1, '9981-04-05', '6888-05-14'),
(41, 1, '9981-04-05', '6888-05-14'),
(42, 1, '9981-04-05', '6888-05-14'),
(43, 1, '9981-04-05', '6888-05-14'),
(44, 1, '9981-04-05', '6888-05-14'),
(45, 1, '9981-04-05', '6888-05-14'),
(46, 1, '9981-04-05', '6888-05-14'),
(47, 1, '9981-04-05', '6888-05-14'),
(48, 1, '9981-04-05', '6888-05-14'),
(49, 1, '9981-04-05', '6888-05-14'),
(50, 1, '9981-04-05', '6888-05-14'),
(51, 1, '9981-04-05', '6888-05-14'),
(52, 1, '9981-04-05', '6888-05-14'),
(53, 1, '9981-04-05', '6888-05-14'),
(54, 1, '9981-04-05', '6888-05-14'),
(55, 1, '9981-04-05', '6888-05-14'),
(56, 1, '9981-04-05', '6888-05-14'),
(57, 1, '9981-04-05', '6888-05-14'),
(58, 1, '9981-04-05', '6888-05-14'),
(59, 1, '9981-04-05', '6888-05-14'),
(60, 1, '9981-04-05', '6888-05-14'),
(61, 1, '9981-04-05', '6888-05-14'),
(62, 1, '9981-04-05', '6888-05-14'),
(63, 1, '9981-04-05', '6888-05-14'),
(64, 1, '9981-04-05', '6888-05-14'),
(65, 1, '9981-04-05', '6888-05-14'),
(66, 1, '9981-04-05', '6888-05-14'),
(67, 1, '9981-04-05', '6888-05-14'),
(68, 1, '9981-04-05', '6888-05-14'),
(69, 1, '9981-04-05', '6888-05-14'),
(70, 1, '9981-04-05', '6888-05-14'),
(71, 1, '9981-04-05', '6888-05-14'),
(72, 1, '9981-04-05', '6888-05-14'),
(73, 1, '9981-04-05', '6888-05-14'),
(74, 1, '9981-04-05', '6888-05-14'),
(75, 1, '9981-04-05', '6888-05-14'),
(76, 1, '9981-04-05', '6888-05-14'),
(77, 1, '9981-04-05', '6888-05-14'),
(78, 1, '9981-04-05', '6888-05-14'),
(79, 1, '9981-04-05', '6888-05-14'),
(80, 1, '9981-04-05', '6888-05-14'),
(81, 1, '9981-04-05', '6888-05-14'),
(82, 1, '9981-04-05', '6888-05-14'),
(83, 1, '9981-04-05', '6888-05-14'),
(84, 1, '9981-04-05', '6888-05-14'),
(85, 1, '9981-04-05', '6888-05-14'),
(86, 1, '9981-04-05', '6888-05-14'),
(87, 1, '9981-04-05', '6888-05-14'),
(88, 1, '9981-04-05', '6888-05-14'),
(89, 1, '9981-04-05', '6888-05-14'),
(90, 1, '0895-07-31', '0252-05-04'),
(91, 1, '0895-07-31', '0252-05-04'),
(92, 1, '0895-07-31', '0252-05-04'),
(93, 1, '6665-05-25', '9652-08-05'),
(94, 1, '6826-05-06', '6943-05-08'),
(95, 4, '6893-08-04', '9835-08-31'),
(96, 2, '8678-09-09', '0987-08-07'),
(97, 2, '8678-09-09', '0987-08-07'),
(98, 2, '8678-09-09', '0987-08-07'),
(99, 2, '8678-09-09', '0987-08-07'),
(100, 2, '8678-09-09', '0987-08-07'),
(101, 2, '8678-09-09', '0987-08-07'),
(102, 2, '2019-02-27', '2020-06-09'),
(103, 2, '4321-07-01', '7896-08-09'),
(104, 2, '4321-07-01', '7896-08-09'),
(105, 2, '4321-07-01', '7896-08-09'),
(106, 1, '2026-08-06', '2032-10-26'),
(107, 1, '2026-08-06', '2032-10-26'),
(108, 1, '2026-08-06', '2032-10-26'),
(109, 1, '2026-08-06', '2032-10-26'),
(110, 5, '2015-05-27', '2023-09-04'),
(111, 3, '2012-11-23', '2032-10-10'),
(112, 3, '2012-11-23', '2032-10-10'),
(113, 3, '2012-11-23', '2032-10-10'),
(114, 3, '2012-11-23', '2032-10-10'),
(115, 3, '2012-11-23', '2032-10-10'),
(116, 3, '2012-11-23', '2032-10-10'),
(117, 2, '2024-03-03', '2039-07-28'),
(118, 2, '2024-03-03', '2039-07-28'),
(119, 3, '2022-03-04', '2014-06-03'),
(120, 4, '2022-09-01', '2022-04-28'),
(121, 4, '2022-09-01', '2022-04-28'),
(122, 4, '2022-09-01', '2022-04-28'),
(123, 4, '2016-04-03', '2023-08-04'),
(124, 3, '2017-03-03', '2018-02-03'),
(125, 3, '2017-03-03', '2018-02-03'),
(126, 3, '2017-03-03', '2018-02-03'),
(127, 3, '2017-03-03', '2018-02-03'),
(128, 3, '2017-10-03', '2021-11-03'),
(129, 3, '2017-10-03', '2021-11-03'),
(130, 3, '2021-10-04', '2020-04-28'),
(131, 2, '2019-01-03', '2021-04-03'),
(132, 2, '2019-01-03', '2021-04-03'),
(133, 2, '2019-01-03', '2021-04-03'),
(134, 2, '2019-01-03', '2021-04-03'),
(135, 2, '2019-01-03', '2021-04-03'),
(136, 2, '2019-01-03', '2021-04-03'),
(137, 2, '2019-01-03', '2021-04-03'),
(138, 2, '2019-01-03', '2021-04-03'),
(139, 2, '2019-01-03', '2021-04-03'),
(140, 2, '2019-01-03', '2021-04-03'),
(141, 2, '2019-01-03', '2021-04-03'),
(142, 3, '2022-10-04', '2022-10-03'),
(143, 3, '2022-10-04', '2022-10-03'),
(144, 3, '2022-10-04', '2022-10-03'),
(145, 3, '2022-10-04', '2022-10-03'),
(146, 3, '2021-10-03', '2021-09-03'),
(147, 3, '2021-10-03', '2021-09-03'),
(148, 1, '2022-11-03', '2021-10-04'),
(149, 1, '2022-11-03', '2021-10-04'),
(150, 1, '2022-11-03', '2021-10-04'),
(151, 1, '2022-11-03', '2021-10-04'),
(152, 1, '2022-11-03', '2021-10-04'),
(153, 1, '2022-11-03', '2021-10-04'),
(154, 1, '2022-11-03', '2021-10-04'),
(155, 1, '2022-11-03', '2021-10-04'),
(156, 1, '2022-11-03', '2021-10-04'),
(157, 1, '2022-11-03', '2021-10-04'),
(158, 1, '2022-11-03', '2021-10-04'),
(159, 1, '2022-11-03', '2021-10-04'),
(160, 1, '2022-11-03', '2021-10-04'),
(161, 1, '2022-11-03', '2021-10-04'),
(162, 1, '2022-11-03', '2021-10-04'),
(163, 1, '2022-11-03', '2021-10-04'),
(164, 1, '2022-11-03', '2021-10-04'),
(165, 1, '2022-11-03', '2021-10-04'),
(166, 1, '2022-11-03', '2021-10-04'),
(167, 1, '2022-11-03', '2021-10-04'),
(168, 1, '2022-11-03', '2021-10-04'),
(169, 1, '2022-11-03', '2021-10-04'),
(170, 1, '2022-11-03', '2021-10-04'),
(171, 1, '2022-11-03', '2021-10-04'),
(172, 1, '2022-11-03', '2021-10-04'),
(173, 1, '2022-11-03', '2021-10-04'),
(174, 1, '2022-11-03', '2021-10-04'),
(175, 1, '2022-11-03', '2021-10-04'),
(176, 1, '2022-11-03', '2021-10-04'),
(177, 1, '2022-11-03', '2021-10-04'),
(178, 1, '2022-11-03', '2021-10-04'),
(179, 4, '2022-10-04', '2016-01-05'),
(180, 4, '2022-10-04', '2016-01-05'),
(181, 4, '2022-10-04', '2016-01-05'),
(182, 4, '2022-10-04', '2016-01-05'),
(183, 4, '2022-10-04', '2016-01-05'),
(184, 4, '2022-10-04', '2016-01-05'),
(185, 4, '2022-10-04', '2016-01-05'),
(186, 4, '2022-10-04', '2016-01-05'),
(187, 4, '2022-10-04', '2016-01-05'),
(188, 4, '2022-10-04', '2016-01-05'),
(189, 4, '2022-10-04', '2016-01-05'),
(190, 4, '2022-10-04', '2016-01-05');

-- --------------------------------------------------------

--
-- Structure de la table `salarie_renseignement_poste_type_contrat`
--

DROP TABLE IF EXISTS `salarie_renseignement_poste_type_contrat`;
CREATE TABLE IF NOT EXISTS `salarie_renseignement_poste_type_contrat` (
  `id_salarie` int(11) NOT NULL,
  `id_renseignement_poste` int(11) NOT NULL,
  `id_type_contrat` int(11) NOT NULL,
  `date_entree_entreprise` date NOT NULL,
  `date_fin_contrat` date DEFAULT NULL,
  KEY `id_salarie` (`id_salarie`) USING BTREE,
  KEY `id_renseignement_poste` (`id_renseignement_poste`) USING BTREE,
  KEY `id_type_contrat` (`id_type_contrat`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `salarie_renseignement_poste_type_contrat`
--

INSERT INTO `salarie_renseignement_poste_type_contrat` (`id_salarie`, `id_renseignement_poste`, `id_type_contrat`, `date_entree_entreprise`, `date_fin_contrat`) VALUES
(12, 4, 4, '2009-05-20', '2013-04-26'),
(13, 4, 4, '2009-05-20', '2013-04-26'),
(14, 4, 4, '2009-05-20', '2013-04-26'),
(35, 4, 4, '2009-05-20', '2013-04-26'),
(36, 4, 4, '2009-05-20', '2013-04-26'),
(37, 4, 4, '2009-05-20', '2013-04-26'),
(38, 4, 4, '2009-05-20', '2013-04-26'),
(101, 3, 2, '8986-06-07', NULL),
(102, 4, 3, '2019-02-28', NULL),
(103, 3, 2, '0767-08-09', NULL),
(104, 3, 2, '0767-08-09', NULL),
(105, 3, 2, '0767-08-09', NULL),
(106, 5, 5, '2004-10-08', NULL),
(107, 5, 5, '2004-10-08', NULL),
(108, 5, 5, '2004-10-08', NULL),
(109, 5, 5, '2004-10-08', NULL),
(110, 6, 4, '2015-04-26', NULL),
(111, 7, 5, '2017-09-12', NULL),
(112, 7, 5, '2017-09-12', NULL),
(113, 7, 5, '2017-09-12', NULL),
(114, 7, 5, '2017-09-12', NULL),
(115, 7, 5, '2017-09-12', NULL),
(116, 7, 5, '2017-09-12', NULL),
(117, 3, 5, '2025-08-01', NULL),
(118, 3, 5, '2025-08-01', NULL),
(119, 3, 3, '2022-03-03', NULL),
(120, 5, 3, '2022-11-06', NULL),
(121, 5, 3, '2022-11-06', NULL),
(122, 5, 3, '2022-11-06', NULL),
(123, 3, 6, '2023-10-05', NULL),
(124, 3, 3, '2022-10-03', NULL),
(125, 3, 3, '2022-10-03', NULL),
(126, 3, 3, '2022-10-03', NULL),
(127, 3, 3, '2022-10-03', NULL),
(128, 4, 2, '2021-10-04', NULL),
(129, 4, 2, '2021-10-04', NULL),
(130, 3, 3, '2022-03-04', NULL),
(131, 2, 2, '2017-02-02', NULL),
(132, 2, 2, '2017-02-02', NULL),
(133, 2, 2, '2017-02-02', NULL),
(134, 2, 2, '2017-02-02', NULL),
(135, 2, 2, '2017-02-02', NULL),
(136, 2, 2, '2017-02-02', NULL),
(137, 2, 2, '2017-02-02', NULL),
(138, 2, 2, '2017-02-02', NULL),
(139, 2, 2, '2017-02-02', NULL),
(140, 2, 2, '2017-02-02', NULL),
(141, 2, 2, '2017-02-02', NULL),
(142, 1, 2, '2018-03-05', NULL),
(143, 1, 2, '2018-03-05', NULL),
(144, 1, 2, '2018-03-05', NULL),
(145, 1, 2, '2018-03-05', NULL),
(146, 4, 3, '2022-10-03', NULL),
(147, 4, 3, '2022-10-03', NULL),
(148, 2, 2, '2023-07-04', NULL),
(149, 2, 2, '2023-07-04', NULL),
(150, 2, 2, '2023-07-04', NULL),
(151, 2, 2, '2023-07-04', NULL),
(152, 2, 2, '2023-07-04', NULL),
(153, 2, 2, '2023-07-04', NULL),
(154, 2, 2, '2023-07-04', NULL),
(155, 2, 2, '2023-07-04', NULL),
(156, 2, 2, '2023-07-04', NULL),
(157, 2, 2, '2023-07-04', NULL),
(158, 2, 2, '2023-07-04', NULL),
(159, 2, 2, '2023-07-04', NULL),
(160, 2, 2, '2023-07-04', NULL),
(161, 2, 2, '2023-07-04', NULL),
(162, 2, 2, '2023-07-04', NULL),
(163, 2, 2, '2023-07-04', NULL),
(164, 2, 2, '2023-07-04', NULL),
(165, 2, 2, '2023-07-04', NULL),
(166, 2, 2, '2023-07-04', NULL),
(167, 2, 2, '2023-07-04', NULL),
(168, 2, 2, '2023-07-04', NULL),
(169, 2, 2, '2023-07-04', NULL),
(170, 2, 2, '2023-07-04', NULL),
(171, 2, 2, '2023-07-04', NULL),
(172, 2, 2, '2023-07-04', NULL),
(173, 2, 2, '2023-07-04', NULL),
(174, 2, 2, '2023-07-04', NULL),
(175, 2, 2, '2023-07-04', NULL),
(176, 2, 2, '2023-07-04', NULL),
(177, 2, 2, '2023-07-04', NULL),
(178, 2, 2, '2023-07-04', NULL),
(179, 4, 4, '2015-08-11', NULL),
(180, 4, 4, '2015-08-11', NULL),
(181, 4, 4, '2015-08-11', NULL),
(182, 4, 4, '2015-08-11', NULL),
(183, 4, 4, '2015-08-11', NULL),
(184, 4, 4, '2015-08-11', NULL),
(185, 4, 4, '2015-08-11', NULL),
(186, 4, 4, '2015-08-11', NULL),
(187, 4, 4, '2015-08-11', NULL),
(188, 4, 4, '2015-08-11', NULL),
(189, 4, 4, '2015-08-11', NULL),
(190, 4, 4, '2015-08-11', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `travailleur_etranger`
--

DROP TABLE IF EXISTS `travailleur_etranger`;
CREATE TABLE IF NOT EXISTS `travailleur_etranger` (
  `id_travailleur_etranger` int(11) NOT NULL AUTO_INCREMENT,
  `autorisation_travail` tinyint(1) NOT NULL,
  `date_autorisation_embauche` date NOT NULL,
  `num_carte_sejour` varchar(10) NOT NULL,
  `date_limite_validite` date NOT NULL,
  `id_salarie` int(11) NOT NULL,
  PRIMARY KEY (`id_travailleur_etranger`),
  KEY `id_salarie` (`id_salarie`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `travailleur_etranger`
--

INSERT INTO `travailleur_etranger` (`id_travailleur_etranger`, `autorisation_travail`, `date_autorisation_embauche`, `num_carte_sejour`, `date_limite_validite`, `id_salarie`) VALUES
(20, 1, '2016-05-06', '1000000003', '2020-09-30', 130);

-- --------------------------------------------------------

--
-- Structure de la table `type_contrat`
--

DROP TABLE IF EXISTS `type_contrat`;
CREATE TABLE IF NOT EXISTS `type_contrat` (
  `id_type_contrat` int(11) NOT NULL AUTO_INCREMENT,
  `code_type_contrat` varchar(255) NOT NULL,
  `nom_type_contrat` varchar(255) NOT NULL,
  PRIMARY KEY (`id_type_contrat`),
  UNIQUE KEY `code_type_contrat` (`code_type_contrat`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `type_contrat`
--

INSERT INTO `type_contrat` (`id_type_contrat`, `code_type_contrat`, `nom_type_contrat`) VALUES
(1, 'CDD', 'Contrat à Durée Déterminée'),
(2, 'CDI', 'Contrat à Durée Indéterminée'),
(3, 'CONTRAT_PRO', 'Contrat de professionnalisation'),
(4, 'CONTRAT_APPRENTI', 'Contrat d\'apprentissage'),
(5, 'STAGE', 'Stage'),
(6, 'CTT', 'Interim'),
(7, 'PRESTA', 'Prestataire');

-- --------------------------------------------------------

--
-- Structure de la table `type_document`
--

DROP TABLE IF EXISTS `type_document`;
CREATE TABLE IF NOT EXISTS `type_document` (
  `id_type_document` int(11) NOT NULL AUTO_INCREMENT,
  `code_type_document` varchar(255) NOT NULL,
  `nom_type_document` varchar(255) NOT NULL,
  `statut_etranger` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_type_document`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `type_document`
--

INSERT INTO `type_document` (`id_type_document`, `code_type_document`, `nom_type_document`, `statut_etranger`) VALUES
(1, 'CI', 'Carte d\'identité', NULL),
(2, 'CV', 'CV', NULL),
(3, 'DIPLOME', 'Diplôme', NULL),
(4, 'RIB', 'Relevé d\'Identité Bancaire', NULL),
(5, 'DPAE', 'Déclaration Préalable à l\'Embauche', NULL),
(6, 'CERFA', 'Formulaire administratif réglementé', NULL),
(7, 'CDT', 'Contrat de Travail', NULL),
(8, 'CDP', 'Contrat de professionnalisation', 0),
(9, 'AMP', 'Affiliation Mutuelle et Prévoyance', NULL),
(10, 'FP', 'Fiche de Poste', NULL),
(11, 'ACV', 'Attestation Carte Vitale', NULL),
(12, 'CDS', 'Carte de Séjour', NULL),
(13, 'ADT', 'Autorisation de Travail', NULL),
(14, 'CONTRAT_FORMA', 'Contrat de Formation', NULL),
(15, 'PROG_FORMA', 'Programme de Formation', NULL),
(16, 'CONV_FORMA', 'Convention de Formation', NULL),
(17, 'CAL_FORMA', 'Calendrier de Formation', NULL),
(18, 'VM', 'Visite Médicale', NULL),
(19, 'PASS', 'Passeport', NULL),
(20, 'PERM_CONDUIRE', 'Permis de Conduire', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `type_document_type_contrat`
--

DROP TABLE IF EXISTS `type_document_type_contrat`;
CREATE TABLE IF NOT EXISTS `type_document_type_contrat` (
  `id_type_document` int(11) NOT NULL,
  `id_type_contrat` int(11) NOT NULL,
  PRIMARY KEY (`id_type_document`,`id_type_contrat`),
  KEY `id_type_contrat` (`id_type_contrat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `contact_urgence`
--
ALTER TABLE `contact_urgence`
  ADD CONSTRAINT `contact_urgence_ibfk_1` FOREIGN KEY (`id_salarie`) REFERENCES `salarie` (`id_salarie`);

--
-- Contraintes pour la table `document`
--
ALTER TABLE `document`
  ADD CONSTRAINT `document_ibfk_1` FOREIGN KEY (`id_salarie`) REFERENCES `salarie` (`id_salarie`),
  ADD CONSTRAINT `document_ibfk_2` FOREIGN KEY (`id_type_document`) REFERENCES `type_document` (`id_type_document`);

--
-- Contraintes pour la table `enfant`
--
ALTER TABLE `enfant`
  ADD CONSTRAINT `enfant_ibfk_1` FOREIGN KEY (`id_salarie`) REFERENCES `salarie` (`id_salarie`);

--
-- Contraintes pour la table `formation`
--
ALTER TABLE `formation`
  ADD CONSTRAINT `formation_ibfk_1` FOREIGN KEY (`id_salarie`) REFERENCES `salarie` (`id_salarie`);

--
-- Contraintes pour la table `salarie_categorie_socio_professionnelle`
--
ALTER TABLE `salarie_categorie_socio_professionnelle`
  ADD CONSTRAINT `salarie_categorie_socio_professionnelle_ibfk_1` FOREIGN KEY (`id_salarie`) REFERENCES `salarie` (`id_salarie`),
  ADD CONSTRAINT `salarie_categorie_socio_professionnelle_ibfk_2` FOREIGN KEY (`id_categorie_socio_professionnelle`) REFERENCES `categorie_socio_professionnelle` (`id_categorie_socio_professionnelle`);

--
-- Contraintes pour la table `salarie_renseignement_poste_type_contrat`
--
ALTER TABLE `salarie_renseignement_poste_type_contrat`
  ADD CONSTRAINT `salarie_renseignement_poste_type_contrat_ibfk_1` FOREIGN KEY (`id_renseignement_poste`) REFERENCES `renseignement_poste` (`id_renseignement_poste`),
  ADD CONSTRAINT `salarie_renseignement_poste_type_contrat_ibfk_2` FOREIGN KEY (`id_salarie`) REFERENCES `salarie` (`id_salarie`),
  ADD CONSTRAINT `salarie_renseignement_poste_type_contrat_ibfk_3` FOREIGN KEY (`id_type_contrat`) REFERENCES `type_contrat` (`id_type_contrat`);

--
-- Contraintes pour la table `travailleur_etranger`
--
ALTER TABLE `travailleur_etranger`
  ADD CONSTRAINT `travailleur_etranger_ibfk_1` FOREIGN KEY (`id_salarie`) REFERENCES `salarie` (`id_salarie`);

--
-- Contraintes pour la table `type_document_type_contrat`
--
ALTER TABLE `type_document_type_contrat`
  ADD CONSTRAINT `type_document_type_contrat_ibfk_1` FOREIGN KEY (`id_type_document`) REFERENCES `type_document` (`id_type_document`),
  ADD CONSTRAINT `type_document_type_contrat_ibfk_2` FOREIGN KEY (`id_type_contrat`) REFERENCES `type_contrat` (`id_type_contrat`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
