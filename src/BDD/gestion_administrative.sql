-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 18 fév. 2019 à 08:24
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.14

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
-- Structure de la table `categorie_socio-professionnelle`
--

DROP TABLE IF EXISTS `categorie_socio-professionnelle`;
CREATE TABLE IF NOT EXISTS `categorie_socio-professionnelle` (
  `id_categorie_socio-professionnelle` int(11) NOT NULL AUTO_INCREMENT,
  `code_categorie_socio_professionnelle` varchar(255) NOT NULL,
  `nom_categorie` varchar(255) NOT NULL,
  PRIMARY KEY (`id_categorie_socio-professionnelle`),
  UNIQUE KEY `code_categorie_socio_professionnelle` (`code_categorie_socio_professionnelle`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categorie_socio-professionnelle`
--

INSERT INTO `categorie_socio-professionnelle` (`id_categorie_socio-professionnelle`, `code_categorie_socio_professionnelle`, `nom_categorie`) VALUES
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
  `telephone_contact_urgence` varchar(10) NOT NULL,
  `id_salarie` int(11) NOT NULL,
  PRIMARY KEY (`id_contact_urgence`),
  KEY `id_salarie` (`id_salarie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `document`
--

DROP TABLE IF EXISTS `document`;
CREATE TABLE IF NOT EXISTS `document` (
  `id_document` int(11) NOT NULL AUTO_INCREMENT,
  `nom_document` varchar(255) NOT NULL,
  `content_document` text NOT NULL,
  `id_salarie` int(11) NOT NULL,
  `id_type_document` int(11) NOT NULL,
  PRIMARY KEY (`id_document`),
  KEY `id_salarie` (`id_salarie`),
  KEY `id_type_document` (`id_type_document`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

DROP TABLE IF EXISTS `formation`;
CREATE TABLE IF NOT EXISTS `formation` (
  `id_formation` int(11) NOT NULL AUTO_INCREMENT,
  `formation_niveau` varchar(255) NOT NULL,
  `organisme_lieu` varchar(255) NOT NULL,
  `annee_formation_debut` date NOT NULL,
  `annee_formation_fin` date NOT NULL,
  `obtenu` tinyint(1) NOT NULL,
  `id_salarie` int(11) NOT NULL,
  PRIMARY KEY (`id_formation`),
  KEY `id_salarie` (`id_salarie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `renseignement_poste`
--

DROP TABLE IF EXISTS `renseignement_poste`;
CREATE TABLE IF NOT EXISTS `renseignement_poste` (
  `id_renseignement_poste` int(11) NOT NULL AUTO_INCREMENT,
  `code_renseignement_poste` varchar(255) NOT NULL,
  `intitule_poste_renseignement` varchar(255) NOT NULL,
  PRIMARY KEY (`id_renseignement_poste`),
  UNIQUE KEY `code_renseignement_poste` (`code_renseignement_poste`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

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
(23, 'Monsieur', 'Fonteyn', 'Maximilien', '', 'huh', '1998-06-24', 'ui', 'ughio', '', '65987', 'Mont Saint Aignan', '767957134', 'maximilien.fonteyn@gmail.com', 'maximilien.fonteyn@gmail.com', '100000000000000', 68, 1, 'Célibataire', '', 1, '', 1, 1, '');

-- --------------------------------------------------------

--
-- Structure de la table `salarie_categorie_socio-professionnelle`
--

DROP TABLE IF EXISTS `salarie_categorie_socio-professionnelle`;
CREATE TABLE IF NOT EXISTS `salarie_categorie_socio-professionnelle` (
  `id_salaire` int(11) NOT NULL,
  `id_categorie_socio-professionnelle` int(11) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  KEY `id_salaire` (`id_salaire`),
  KEY `id_categorie_socio-professionnelle` (`id_categorie_socio-professionnelle`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `date_fin_contrat` int(11) NOT NULL,
  KEY `salarie_id` (`id_salarie`),
  KEY `id_renseignement_poste` (`id_renseignement_poste`),
  KEY `id_type_contrat` (`id_type_contrat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `travailleur_etranger`
--

INSERT INTO `travailleur_etranger` (`id_travailleur_etranger`, `autorisation_travail`, `date_autorisation_embauche`, `num_carte_sejour`, `date_limite_validite`, `id_salarie`) VALUES
(1, 0, '1998-06-24', '15698', '2019-06-30', 19),
(2, 0, '2008-07-15', '4698789863', '7888-06-20', 21),
(3, 0, '2008-07-15', '4698789863', '7888-06-20', 22),
(4, 0, '2008-07-15', '4698789863', '7888-06-20', 23);

-- --------------------------------------------------------

--
-- Structure de la table `type_contrat`
--

DROP TABLE IF EXISTS `type_contrat`;
CREATE TABLE IF NOT EXISTS `type_contrat` (
  `id_type_contrat` int(11) NOT NULL AUTO_INCREMENT,
  `code_type_contrat` varchar(255) NOT NULL,
  `libelle_type_contrat` varchar(255) NOT NULL,
  PRIMARY KEY (`id_type_contrat`),
  UNIQUE KEY `code_type_contrat` (`code_type_contrat`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `type_contrat`
--

INSERT INTO `type_contrat` (`id_type_contrat`, `code_type_contrat`, `libelle_type_contrat`) VALUES
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
  `label_type_document` text NOT NULL,
  `unique_code` int(11) NOT NULL,
  `statut_etranger` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_type_document`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Contraintes pour la table `salarie_categorie_socio-professionnelle`
--
ALTER TABLE `salarie_categorie_socio-professionnelle`
  ADD CONSTRAINT `salarie_categorie_socio-professionnelle_ibfk_1` FOREIGN KEY (`id_salaire`) REFERENCES `salarie` (`id_salarie`),
  ADD CONSTRAINT `salarie_categorie_socio-professionnelle_ibfk_2` FOREIGN KEY (`id_categorie_socio-professionnelle`) REFERENCES `categorie_socio-professionnelle` (`id_categorie_socio-professionnelle`);

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
