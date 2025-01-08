-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Client: 127.0.0.1
-- Généré le: Jeu 30 Mars 2023 à 20:51
-- Version du serveur: 5.5.27-log
-- Version de PHP: 5.4.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `technosoft`
--

-- --------------------------------------------------------

--
-- Structure de la table `abonnement`
--

CREATE TABLE IF NOT EXISTS `abonnement` (
  `id_abonne` int(11) NOT NULL AUTO_INCREMENT,
  `tiers` varchar(100) NOT NULL,
  `typeabonne` varchar(100) NOT NULL,
  `montabonne` int(11) NOT NULL,
  PRIMARY KEY (`id_abonne`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `abonnement`
--

INSERT INTO `abonnement` (`id_abonne`, `tiers`, `typeabonne`, `montabonne`) VALUES
(3, 'eleves', 'payant', 300),
(4, 'personnel', 'gratuit', 0);

-- --------------------------------------------------------

--
-- Structure de la table `absence`
--

CREATE TABLE IF NOT EXISTS `absence` (
  `id_absence` int(11) NOT NULL AUTO_INCREMENT,
  `heuredebut` time NOT NULL,
  `heurefin` time NOT NULL,
  `date_absence` date NOT NULL,
  `matricule` varchar(200) NOT NULL,
  `id_classe` int(11) NOT NULL,
  `id_matiere` int(11) NOT NULL,
  `etat` varchar(100) NOT NULL,
  `session` varchar(300) NOT NULL,
  PRIMARY KEY (`id_absence`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Contenu de la table `absence`
--

INSERT INTO `absence` (`id_absence`, `heuredebut`, `heurefin`, `date_absence`, `matricule`, `id_classe`, `id_matiere`, `etat`, `session`) VALUES
(24, '07:30:00', '08:30:00', '2023-02-16', 'ddafaef', 6, 7, 'justifier', '2022-2023'),
(25, '07:30:00', '08:30:00', '2023-02-16', 'dbhtrh', 6, 7, 'justifier', '2022-2023'),
(26, '07:30:00', '08:30:00', '2023-02-16', 'cfdd', 6, 7, 'non justifier', '2022-2023'),
(27, '07:30:00', '08:30:00', '2023-02-13', 'A12', 6, 7, 'justifier', '2022-2023');

-- --------------------------------------------------------

--
-- Structure de la table `caisseinscription`
--

CREATE TABLE IF NOT EXISTS `caisseinscription` (
  `id_caisseinscript` int(11) NOT NULL AUTO_INCREMENT,
  `montverse` int(11) NOT NULL,
  `dateverse` date NOT NULL,
  `heureverse` time NOT NULL,
  `matricule` varchar(300) NOT NULL,
  `nom_session` varchar(100) NOT NULL,
  PRIMARY KEY (`id_caisseinscript`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Contenu de la table `caisseinscription`
--

INSERT INTO `caisseinscription` (`id_caisseinscript`, `montverse`, `dateverse`, `heureverse`, `matricule`, `nom_session`) VALUES
(1, 3000, '2022-12-22', '00:00:00', 'A12', '2022-2023'),
(18, 2000, '2022-12-27', '15:31:00', 'A3045AZ', '2022-2023'),
(19, 7000, '2022-12-27', '17:00:00', 'A12', '2022-2023'),
(20, -7, '2022-12-27', '17:25:00', 'A12', '2022-2023'),
(21, 7, '2022-12-27', '18:01:00', 'A12', '2022-2023'),
(22, 28000, '2022-12-27', '18:20:00', 'A3045AZ', '2022-2023'),
(23, 10000, '2023-02-09', '15:50:00', 'cfdd', '2022-2023'),
(24, 10000, '2023-02-09', '15:51:00', 'ddafaef', '2022-2023'),
(25, 2000, '2023-02-09', '15:51:00', 'dbhtrh', '2022-2023'),
(26, 10000, '2023-02-28', '23:20:00', '191470', '2022-2023');

-- --------------------------------------------------------

--
-- Structure de la table `caissescolarite`
--

CREATE TABLE IF NOT EXISTS `caissescolarite` (
  `id_caissescolarite` int(11) NOT NULL AUTO_INCREMENT,
  `montverse` int(11) NOT NULL,
  `dateverse` date NOT NULL,
  `heureverse` time NOT NULL,
  `matricule` varchar(1000) NOT NULL,
  `nom_session` varchar(100) NOT NULL,
  PRIMARY KEY (`id_caissescolarite`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Contenu de la table `caissescolarite`
--

INSERT INTO `caissescolarite` (`id_caissescolarite`, `montverse`, `dateverse`, `heureverse`, `matricule`, `nom_session`) VALUES
(8, 20000, '2022-12-28', '23:35:00', 'A12', '2022-2023'),
(9, 5000, '2022-12-28', '23:36:00', 'A12', '2022-2023'),
(10, 5000, '2022-12-30', '13:35:00', 'A12', '2022-2023'),
(11, 5000, '2022-12-30', '13:37:00', 'A12', '2022-2023'),
(12, 5000, '2022-12-30', '13:37:00', 'A12', '2022-2023'),
(13, 5000, '2022-12-30', '13:40:00', 'A12', '2022-2023');

-- --------------------------------------------------------

--
-- Structure de la table `classe`
--

CREATE TABLE IF NOT EXISTS `classe` (
  `id_classe` int(11) NOT NULL AUTO_INCREMENT,
  `nom_classe` varchar(500) NOT NULL,
  `montscolarite` int(11) NOT NULL,
  `montinscription` int(11) NOT NULL,
  `id_section` int(11) NOT NULL,
  `selecte` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_classe`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `classe`
--

INSERT INTO `classe` (`id_classe`, `nom_classe`, `montscolarite`, `montinscription`, `id_section`, `selecte`) VALUES
(4, 'from 1', 70000, 30000, 7, ''),
(5, '6M2', 70000, 5000, 6, ''),
(6, '4M1', 75000, 10000, 6, '');

-- --------------------------------------------------------

--
-- Structure de la table `conseil`
--

CREATE TABLE IF NOT EXISTS `conseil` (
  `id_conseil` int(11) NOT NULL AUTO_INCREMENT,
  `lieu` varchar(1000) NOT NULL,
  `date_conseil` date NOT NULL,
  `heure_conseil` time NOT NULL,
  `session` varchar(100) NOT NULL,
  `numero` int(11) NOT NULL,
  PRIMARY KEY (`id_conseil`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `conseil`
--

INSERT INTO `conseil` (`id_conseil`, `lieu`, `date_conseil`, `heure_conseil`, `session`, `numero`) VALUES
(1, '', '0000-00-00', '00:00:00', '2022-2023', 0),
(4, 'salle de 6M2', '2023-03-01', '00:00:00', '2022-2023', 0),
(5, 'salle de 6M2', '2023-03-03', '00:00:00', '2022-2023', 1),
(6, 'salle de 6M2', '2023-03-06', '00:00:00', '2022-2023', 2),
(7, 'bureau', '2023-02-21', '00:00:00', '2022-2023', 3),
(8, 'bureau', '2023-02-28', '00:00:00', '2022-2023', 4),
(9, 'computer room', '2023-02-27', '00:00:00', '2022-2023', 5),
(10, 'room', '2023-03-10', '15:00:00', '2022-2023', 6);

-- --------------------------------------------------------

--
-- Structure de la table `decisiondisciplinaire`
--

CREATE TABLE IF NOT EXISTS `decisiondisciplinaire` (
  `id_decision` int(11) NOT NULL AUTO_INCREMENT,
  `id_conseil` int(11) NOT NULL,
  `matricule` varchar(200) NOT NULL,
  `sanction` varchar(1000) NOT NULL,
  `nbrejour` int(11) NOT NULL,
  `debutsanction` date NOT NULL,
  `finsanction` date NOT NULL,
  PRIMARY KEY (`id_decision`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `dureemprunt`
--

CREATE TABLE IF NOT EXISTS `dureemprunt` (
  `id_duree` int(11) NOT NULL AUTO_INCREMENT,
  `duree_emprunt` int(11) NOT NULL,
  PRIMARY KEY (`id_duree`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `dureemprunt`
--

INSERT INTO `dureemprunt` (`id_duree`, `duree_emprunt`) VALUES
(1, 4);

-- --------------------------------------------------------

--
-- Structure de la table `eleves`
--

CREATE TABLE IF NOT EXISTS `eleves` (
  `id_eleve` int(11) NOT NULL AUTO_INCREMENT,
  `nom_eleve` varchar(1000) NOT NULL,
  `prenom_eleve` varchar(500) NOT NULL,
  `matricule` varchar(500) NOT NULL,
  `datenaiss_eleve` date NOT NULL,
  `lieunaiss_eleve` varchar(500) NOT NULL,
  `dateentre_eleve` date NOT NULL,
  `sexe_eleve` varchar(100) NOT NULL,
  `nationalite_eleve` varchar(500) NOT NULL,
  `adresse_eleve` varchar(5000) NOT NULL,
  `maladie_eleve` varchar(10000) NOT NULL,
  `apteeps` varchar(5) NOT NULL,
  `autreinfo_eleve` varchar(10000) NOT NULL,
  `photo_eleve` varchar(5000) NOT NULL,
  `nompere` varchar(1000) NOT NULL,
  `telephonepere` int(11) NOT NULL,
  `nomere` varchar(1000) NOT NULL,
  `telephonemere` int(11) NOT NULL,
  `nomtitteur` varchar(1000) NOT NULL,
  `telephonetitteur` int(11) NOT NULL,
  `selecte` varchar(10) NOT NULL,
  PRIMARY KEY (`id_eleve`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Contenu de la table `eleves`
--

INSERT INTO `eleves` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `matricule`, `datenaiss_eleve`, `lieunaiss_eleve`, `dateentre_eleve`, `sexe_eleve`, `nationalite_eleve`, `adresse_eleve`, `maladie_eleve`, `apteeps`, `autreinfo_eleve`, `photo_eleve`, `nompere`, `telephonepere`, `nomere`, `telephonemere`, `nomtitteur`, `telephonetitteur`, `selecte`) VALUES
(11, 'ben lepont', 'jean claude', 'A12', '0000-00-00', 'baham', '0000-00-00', 'maxulin', 'camerounais(e)', '', '', 'oui', '', '9d8b625991014e904b309f301fdea7f7.jpg', '', 0, '', 0, '', 0, ''),
(12, 'achille tawokam', 'jean claude', 'A3045AZ', '2001-03-16', 'baham', '2022-09-05', 'maxulin', 'camerounais', 'tamdja place des fetes', '', 'oui', '', '', 'kenmogne emmanuel', 677421176, 'yimdjo albertine', 699388115, 'yimdjo albertine', 676584454, ''),
(13, 'qwerty', 'jean claude', 'cfdd', '2023-02-09', 'baham', '2023-02-09', 'maxulin', 'camerounais(e)', '', '', 'oui', '', '', '', 0, '', 0, '', 0, ''),
(14, 'xdgreh', 'jean claude', 'ddafaef', '0000-00-00', 'baham', '0000-00-00', 'feminin', 'camerounais(e)', '', '', 'oui', '', '', '', 0, '', 0, '', 0, ''),
(15, 'glykjsrhsre', 'jean claude', 'dbhtrh', '0000-00-00', 'baham', '0000-00-00', 'maxulin', 'camerounais(e)', '', '', 'oui', '', '', '', 0, '', 0, '', 0, ''),
(16, 'TAWOKAM KENMOGNE', 'ACHILLE SYLVAIN', '191470', '2023-02-15', 'NKONSANGBA', '2023-02-28', 'maxulin', 'camerounais(e)', '', '', 'oui', '', '9ceda43bd9724c9ab304fceae8b9a797.jpg', '', 0, '', 0, '', 0, '');

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `emploitempseleve`
--
CREATE TABLE IF NOT EXISTS `emploitempseleve` (
`id_classe` int(11)
,`id_matiere` int(11)
,`id_employer` int(11)
,`nom_session` varchar(100)
,`heuredebut` time
,`heurefin` time
,`lundi` varchar(11)
,`mardi` varchar(11)
,`mercredi` varchar(11)
,`jeudi` varchar(11)
,`vendredi` varchar(11)
,`samedi` varchar(11)
);
-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `emploitempsprof`
--
CREATE TABLE IF NOT EXISTS `emploitempsprof` (
`id_employer` int(11)
,`id_matiere` int(11)
,`id_classe` int(11)
,`nom_session` varchar(100)
,`heuredebut` time
,`heurefin` time
,`lundi` varchar(11)
,`mardi` varchar(11)
,`mercredi` varchar(11)
,`jeudi` varchar(11)
,`vendredi` varchar(11)
,`samedi` varchar(11)
);
-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `emploitempsprofs`
--
CREATE TABLE IF NOT EXISTS `emploitempsprofs` (
`id_matiere` int(11)
,`id_employer` int(11)
,`id_classe` int(11)
,`nom_session` varchar(100)
,`heuredebut` time
,`heurefin` time
,`lundi` varchar(11)
,`matlundi` varchar(11)
,`mardi` varchar(11)
,`matmardi` varchar(11)
,`mercredi` varchar(11)
,`matmercredi` varchar(11)
,`jeudi` varchar(11)
,`matjeudi` varchar(11)
,`vendredi` varchar(11)
,`matvendredi` varchar(11)
,`samedi` varchar(11)
,`matsamedi` varchar(11)
);
-- --------------------------------------------------------

--
-- Structure de la table `employer`
--

CREATE TABLE IF NOT EXISTS `employer` (
  `id_employer` int(11) NOT NULL AUTO_INCREMENT,
  `nom_employer` varchar(1000) NOT NULL,
  `telephone1_employer` int(11) NOT NULL,
  `telephone2_employer` int(11) NOT NULL,
  `sexe_employer` varchar(10) NOT NULL,
  `adresseMail_employer` varchar(1000) NOT NULL,
  `quartier_employer` varchar(1000) NOT NULL,
  `id_fonction` int(11) NOT NULL,
  `datenaiss_employer` date NOT NULL,
  `travaildepuis` varchar(5) NOT NULL,
  `grandiplome` varchar(100) NOT NULL,
  `specialitediplome` varchar(1000) NOT NULL,
  `cv_employer` varchar(1000) NOT NULL,
  `photo_employer` varchar(1000) NOT NULL,
  `numerourgence` int(11) NOT NULL,
  `salaireemployer` int(11) NOT NULL,
  `mdpemployer` varchar(1000) NOT NULL,
  `selecte` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_employer`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Contenu de la table `employer`
--

INSERT INTO `employer` (`id_employer`, `nom_employer`, `telephone1_employer`, `telephone2_employer`, `sexe_employer`, `adresseMail_employer`, `quartier_employer`, `id_fonction`, `datenaiss_employer`, `travaildepuis`, `grandiplome`, `specialitediplome`, `cv_employer`, `photo_employer`, `numerourgence`, `salaireemployer`, `mdpemployer`, `selecte`) VALUES
(17, 'bonne jean', 677667766, 0, 'maxulin', 'achille@gmail.com', '', 3, '0000-00-00', '1995', 'PROBATOIRE', '', 'aicha.docx', '', 655445544, 0, 'a06d983f5e4a80847b4ce3fc94c38707', ''),
(18, 'achille tawokam', 699388115, 653064033, 'maxulin', 'achilletawokam@gmail.com', 'tamdja', 1, '2001-03-16', '2021', 'BACC', 'informatique', '', '', 698322000, 0, '15c69a8cb28f7aee5c8ba5065194af96', '');

-- --------------------------------------------------------

--
-- Structure de la table `etageres`
--

CREATE TABLE IF NOT EXISTS `etageres` (
  `id_etagere` int(11) NOT NULL AUTO_INCREMENT,
  `nom_etagere` varchar(300) NOT NULL,
  PRIMARY KEY (`id_etagere`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `etageres`
--

INSERT INTO `etageres` (`id_etagere`, `nom_etagere`) VALUES
(1, 'roman'),
(2, 'LIvre litterature');

-- --------------------------------------------------------

--
-- Structure de la table `evaluation`
--

CREATE TABLE IF NOT EXISTS `evaluation` (
  `id_evaluation` int(11) NOT NULL AUTO_INCREMENT,
  `matricule` mediumtext NOT NULL,
  `id_classe` int(11) NOT NULL,
  `sequence` varchar(100) NOT NULL,
  `note` int(11) NOT NULL,
  `id_matiere` int(11) NOT NULL,
  `coef` int(11) NOT NULL,
  `dateenreg` date NOT NULL,
  `session` varchar(20) NOT NULL,
  PRIMARY KEY (`id_evaluation`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4374 ;

--
-- Contenu de la table `evaluation`
--

INSERT INTO `evaluation` (`id_evaluation`, `matricule`, `id_classe`, `sequence`, `note`, `id_matiere`, `coef`, `dateenreg`, `session`) VALUES
(4362, 'A12', 6, 'sequence 1', 10, 7, 5, '2023-02-14', '2022-2023'),
(4363, 'cfdd', 6, 'sequence 1', 12, 7, 5, '2023-02-14', '2022-2023'),
(4364, 'ddafaef', 6, 'sequence 1', 15, 7, 5, '2023-02-14', '2022-2023'),
(4365, 'dbhtrh', 6, 'sequence 1', 5, 7, 5, '2023-02-14', '2022-2023'),
(4366, 'A12', 6, 'sequence 1', 15, 10, 3, '2023-02-21', '2022-2023'),
(4367, 'cfdd', 6, 'sequence 1', 17, 10, 3, '2023-02-21', '2022-2023'),
(4368, 'ddafaef', 6, 'sequence 1', 0, 10, 3, '2023-02-21', '2022-2023'),
(4369, 'dbhtrh', 6, 'sequence 1', 0, 10, 3, '2023-02-21', '2022-2023'),
(4370, 'A12', 6, 'sequence 1', 2, 13, 2, '2023-02-21', '2022-2023'),
(4371, 'cfdd', 6, 'sequence 1', 13, 13, 2, '2023-02-21', '2022-2023'),
(4372, 'ddafaef', 6, 'sequence 1', 8, 13, 2, '2023-02-21', '2022-2023'),
(4373, 'dbhtrh', 6, 'sequence 1', 10, 13, 2, '2023-02-21', '2022-2023');

-- --------------------------------------------------------

--
-- Structure de la table `fonction`
--

CREATE TABLE IF NOT EXISTS `fonction` (
  `id_fonction` int(11) NOT NULL AUTO_INCREMENT,
  `nom_fonction` varchar(1000) NOT NULL,
  `inscription` varchar(5) NOT NULL,
  `scolarite` varchar(5) NOT NULL,
  `gest_enseignent` varchar(5) NOT NULL,
  `discipline_eleves` varchar(5) NOT NULL,
  `enseignement` varchar(5) NOT NULL DEFAULT 'NON',
  `autres` varchar(5) NOT NULL DEFAULT 'NON',
  PRIMARY KEY (`id_fonction`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Contenu de la table `fonction`
--

INSERT INTO `fonction` (`id_fonction`, `nom_fonction`, `inscription`, `scolarite`, `gest_enseignent`, `discipline_eleves`, `enseignement`, `autres`) VALUES
(1, 'Censeur', 'OUI', 'NON', 'OUI', 'OUI', 'OUI', 'OUI'),
(3, 'Professeur', 'NON', 'NON', 'NON', 'OUI', 'OUI', 'OUI'),
(4, 'Infirmiere', 'NON', 'NON', 'NON', 'NON', 'OUI', 'OUI'),
(7, 'BibliothÃ©caire', 'NON', 'NON', 'NON', 'NON', 'NON', 'OUI'),
(10, 'Intendant', 'OUI', 'OUI', 'OUI', 'NON', 'NON', 'NON'),
(11, 'Surveillant GÃ©nÃ©ral', 'NON', 'NON', 'OUI', 'OUI', 'OUI', 'OUI');

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

CREATE TABLE IF NOT EXISTS `inscription` (
  `id_inscript` int(11) NOT NULL AUTO_INCREMENT,
  `matricule` varchar(300) NOT NULL,
  `id_section` int(11) NOT NULL,
  `id_classe` int(11) NOT NULL,
  `montinscription` int(11) NOT NULL,
  `montverseinscription` int(11) NOT NULL,
  `resteinscription` int(11) NOT NULL,
  `redouble` varchar(5) NOT NULL,
  `date_inscription` date NOT NULL,
  `nom_session` varchar(100) NOT NULL,
  `etatinscription` varchar(100) NOT NULL,
  PRIMARY KEY (`id_inscript`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `inscription`
--

INSERT INTO `inscription` (`id_inscript`, `matricule`, `id_section`, `id_classe`, `montinscription`, `montverseinscription`, `resteinscription`, `redouble`, `date_inscription`, `nom_session`, `etatinscription`) VALUES
(1, 'A12', 6, 6, 10000, 10000, 0, 'non', '2022-12-22', '2022-2023', 'solde'),
(3, 'A3045AZ', 7, 4, 30000, 30000, 0, 'non', '2022-12-27', '2022-2023', 'solde'),
(4, 'cfdd', 6, 6, 10000, 10000, 0, 'non', '2023-02-09', '2022-2023', 'solde'),
(5, 'ddafaef', 6, 6, 10000, 10000, 0, 'non', '2023-02-09', '2022-2023', 'solde'),
(6, 'dbhtrh', 6, 6, 10000, 2000, 8000, 'non', '2023-02-09', '2022-2023', 'non solde'),
(7, '191470', 6, 6, 10000, 10000, 0, 'non', '2023-02-28', '2022-2023', 'solde');

-- --------------------------------------------------------

--
-- Structure de la table `jours`
--

CREATE TABLE IF NOT EXISTS `jours` (
  `id_jour` int(11) NOT NULL AUTO_INCREMENT,
  `nom_jour` varchar(500) NOT NULL,
  PRIMARY KEY (`id_jour`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `jours`
--

INSERT INTO `jours` (`id_jour`, `nom_jour`) VALUES
(2, 'lundi'),
(3, 'mardi'),
(4, 'mercredi'),
(5, 'jeudi'),
(6, 'vendredi');

-- --------------------------------------------------------

--
-- Structure de la table `livres`
--

CREATE TABLE IF NOT EXISTS `livres` (
  `id_livre` int(11) NOT NULL AUTO_INCREMENT,
  `nom_livre` varchar(300) NOT NULL,
  `id_typelivre` int(11) NOT NULL,
  `id_etagere` int(11) NOT NULL,
  `nbrelivre` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  PRIMARY KEY (`id_livre`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `livres`
--

INSERT INTO `livres` (`id_livre`, `nom_livre`, `id_typelivre`, `id_etagere`, `nbrelivre`, `stock`) VALUES
(1, 'La marmite de koka-Mbala', 2, 2, 10, 10),
(2, 'petit jo', 1, 1, 5, 5),
(3, 'science de la vie et de la terre', 2, 2, 6, 8);

-- --------------------------------------------------------

--
-- Structure de la table `matieres`
--

CREATE TABLE IF NOT EXISTS `matieres` (
  `id_matiere` int(11) NOT NULL AUTO_INCREMENT,
  `nom_matiere` varchar(1000) NOT NULL,
  `id_typmat` int(11) NOT NULL,
  `selecte` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_matiere`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Contenu de la table `matieres`
--

INSERT INTO `matieres` (`id_matiere`, `nom_matiere`, `id_typmat`, `selecte`) VALUES
(6, 'Philosophie', 9, ''),
(7, 'Français', 9, ''),
(8, 'Anglais', 9, ''),
(9, 'Mathematique', 8, ''),
(10, 'Informatique', 8, ''),
(11, 'Svt', 8, ''),
(12, 'Chimie', 8, ''),
(13, 'Physique', 8, '');

-- --------------------------------------------------------

--
-- Structure de la table `periode`
--

CREATE TABLE IF NOT EXISTS `periode` (
  `id_periode` int(11) NOT NULL AUTO_INCREMENT,
  `heuredebut` time NOT NULL,
  `heurefin` time NOT NULL,
  `typeperiode` varchar(100) NOT NULL,
  PRIMARY KEY (`id_periode`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Contenu de la table `periode`
--

INSERT INTO `periode` (`id_periode`, `heuredebut`, `heurefin`, `typeperiode`) VALUES
(11, '07:30:00', '08:30:00', 'cours'),
(12, '08:30:00', '09:30:00', 'cours'),
(13, '09:30:00', '10:00:00', 'cours'),
(29, '10:00:00', '10:20:00', 'pause');

-- --------------------------------------------------------

--
-- Structure de la table `pertelivre`
--

CREATE TABLE IF NOT EXISTS `pertelivre` (
  `id_pertelivre` int(11) NOT NULL AUTO_INCREMENT,
  `date_perte` date NOT NULL,
  `type_perte` varchar(200) NOT NULL,
  `quantite` int(11) NOT NULL,
  `message` varchar(1000) NOT NULL,
  PRIMARY KEY (`id_pertelivre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `programme`
--

CREATE TABLE IF NOT EXISTS `programme` (
  `id_programme` int(11) NOT NULL AUTO_INCREMENT,
  `id_classe` int(11) NOT NULL,
  `id_matiere` int(11) NOT NULL,
  `id_employer` int(11) NOT NULL,
  `jour` varchar(100) NOT NULL,
  `heuredebut` time NOT NULL,
  `heurefin` time NOT NULL,
  `payeheure` int(11) NOT NULL,
  `nom_session` varchar(100) NOT NULL,
  PRIMARY KEY (`id_programme`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=89 ;

--
-- Contenu de la table `programme`
--

INSERT INTO `programme` (`id_programme`, `id_classe`, `id_matiere`, `id_employer`, `jour`, `heuredebut`, `heurefin`, `payeheure`, `nom_session`) VALUES
(82, 6, 1000000, 0, '', '10:00:00', '10:20:00', 0, ''),
(83, 6, 7, 18, 'lundi', '07:30:00', '08:30:00', 0, '2022-2023'),
(84, 6, 7, 18, 'lundi', '08:30:00', '09:30:00', 0, '2022-2023'),
(85, 5, 10, 18, 'mardi', '08:30:00', '09:30:00', 0, '2022-2023'),
(86, 5, 10, 18, 'mardi', '09:30:00', '10:00:00', 0, '2022-2023'),
(87, 6, 10, 17, 'mardi', '08:30:00', '09:30:00', 0, '2022-2023'),
(88, 6, 13, 17, 'lundi', '09:30:00', '10:00:00', 0, '2022-2023');

-- --------------------------------------------------------

--
-- Structure de la table `scolarite`
--

CREATE TABLE IF NOT EXISTS `scolarite` (
  `id_scolarite` int(11) NOT NULL AUTO_INCREMENT,
  `montscolarite` int(11) NOT NULL,
  `montverse` int(11) NOT NULL,
  `restescolarite` int(11) NOT NULL,
  `matricule` varchar(1000) NOT NULL,
  `nom_session` varchar(100) NOT NULL,
  `etatscolarite` varchar(20) NOT NULL,
  PRIMARY KEY (`id_scolarite`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `scolarite`
--

INSERT INTO `scolarite` (`id_scolarite`, `montscolarite`, `montverse`, `restescolarite`, `matricule`, `nom_session`, `etatscolarite`) VALUES
(1, 75000, 45000, 30000, 'A12', '2022-2023', 'non solde');

-- --------------------------------------------------------

--
-- Structure de la table `tabsection`
--

CREATE TABLE IF NOT EXISTS `tabsection` (
  `id_section` int(11) NOT NULL AUTO_INCREMENT,
  `nom_section` varchar(500) NOT NULL,
  `selecte` varchar(10) NOT NULL,
  PRIMARY KEY (`id_section`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `tabsection`
--

INSERT INTO `tabsection` (`id_section`, `nom_section`, `selecte`) VALUES
(6, 'Francophone', ''),
(7, 'Anglophone', '');

-- --------------------------------------------------------

--
-- Structure de la table `tabsession`
--

CREATE TABLE IF NOT EXISTS `tabsession` (
  `id_session` int(11) NOT NULL AUTO_INCREMENT,
  `nom_session` varchar(100) NOT NULL,
  `selecte` varchar(15) NOT NULL,
  PRIMARY KEY (`id_session`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `tabsession`
--

INSERT INTO `tabsession` (`id_session`, `nom_session`, `selecte`) VALUES
(6, '2024-2025', ''),
(7, '2022-2023', '');

-- --------------------------------------------------------

--
-- Structure de la table `traduitconseil`
--

CREATE TABLE IF NOT EXISTS `traduitconseil` (
  `id_traduit` int(11) NOT NULL AUTO_INCREMENT,
  `matricule` varchar(1000) NOT NULL,
  `id_classe` int(11) NOT NULL,
  `id_conseil` int(11) NOT NULL,
  `motif` varchar(5000) NOT NULL,
  `date_traduit` date NOT NULL,
  `session` varchar(200) NOT NULL,
  PRIMARY KEY (`id_traduit`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `traduitconseil`
--

INSERT INTO `traduitconseil` (`id_traduit`, `matricule`, `id_classe`, `id_conseil`, `motif`, `date_traduit`, `session`) VALUES
(1, 'dbhtrh', 6, 10, 'vagabondage', '2023-02-16', '2022-2023'),
(2, 'dbhtrh', 6, 6, 'bagarre', '2023-02-16', '2022-2023'),
(3, 'ddafaef', 6, 10, 'kiou9u', '2023-02-16', '2022-2023');

-- --------------------------------------------------------

--
-- Structure de la table `typelivre`
--

CREATE TABLE IF NOT EXISTS `typelivre` (
  `id_typelivre` int(11) NOT NULL AUTO_INCREMENT,
  `nom_typelivre` varchar(200) NOT NULL,
  PRIMARY KEY (`id_typelivre`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `typelivre`
--

INSERT INTO `typelivre` (`id_typelivre`, `nom_typelivre`) VALUES
(1, 'litteraire 4eme'),
(2, 'scientifique 6eme');

-- --------------------------------------------------------

--
-- Structure de la table `typematiere`
--

CREATE TABLE IF NOT EXISTS `typematiere` (
  `id_typmat` int(11) NOT NULL AUTO_INCREMENT,
  `nom_typmat` varchar(500) NOT NULL,
  `selecte` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_typmat`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Contenu de la table `typematiere`
--

INSERT INTO `typematiere` (`id_typmat`, `nom_typmat`, `selecte`) VALUES
(8, 'Scientifique', ''),
(9, 'Litteraire', '');

-- --------------------------------------------------------

--
-- Structure de la vue `emploitempseleve`
--
DROP TABLE IF EXISTS `emploitempseleve`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `emploitempseleve` AS select `programme`.`id_classe` AS `id_classe`,`programme`.`id_matiere` AS `id_matiere`,`programme`.`id_employer` AS `id_employer`,`programme`.`nom_session` AS `nom_session`,`programme`.`heuredebut` AS `heuredebut`,`programme`.`heurefin` AS `heurefin`,(case when (`programme`.`jour` = 'lundi') then `programme`.`id_matiere` else '' end) AS `lundi`,(case when (`programme`.`jour` = 'mardi') then `programme`.`id_matiere` else '' end) AS `mardi`,(case when (`programme`.`jour` = 'mercredi') then `programme`.`id_matiere` else '' end) AS `mercredi`,(case when (`programme`.`jour` = 'jeudi') then `programme`.`id_matiere` else '' end) AS `jeudi`,(case when (`programme`.`jour` = 'vendredi') then `programme`.`id_matiere` else '' end) AS `vendredi`,(case when (`programme`.`jour` = 'samedi') then `programme`.`id_matiere` else '' end) AS `samedi` from `programme`;

-- --------------------------------------------------------

--
-- Structure de la vue `emploitempsprof`
--
DROP TABLE IF EXISTS `emploitempsprof`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `emploitempsprof` AS select `programme`.`id_employer` AS `id_employer`,`programme`.`id_matiere` AS `id_matiere`,`programme`.`id_classe` AS `id_classe`,`programme`.`nom_session` AS `nom_session`,`programme`.`heuredebut` AS `heuredebut`,`programme`.`heurefin` AS `heurefin`,(case when (`programme`.`jour` = 'lundi') then `programme`.`id_classe` else '' end) AS `lundi`,(case when (`programme`.`jour` = 'mardi') then `programme`.`id_classe` else '' end) AS `mardi`,(case when (`programme`.`jour` = 'mercredi') then `programme`.`id_classe` else '' end) AS `mercredi`,(case when (`programme`.`jour` = 'jeudi') then `programme`.`id_classe` else '' end) AS `jeudi`,(case when (`programme`.`jour` = 'vendredi') then `programme`.`id_classe` else '' end) AS `vendredi`,(case when (`programme`.`jour` = 'samedi') then `programme`.`id_classe` else '' end) AS `samedi` from `programme`;

-- --------------------------------------------------------

--
-- Structure de la vue `emploitempsprofs`
--
DROP TABLE IF EXISTS `emploitempsprofs`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `emploitempsprofs` AS select `programme`.`id_matiere` AS `id_matiere`,`programme`.`id_employer` AS `id_employer`,`programme`.`id_classe` AS `id_classe`,`programme`.`nom_session` AS `nom_session`,`programme`.`heuredebut` AS `heuredebut`,`programme`.`heurefin` AS `heurefin`,(case when (`programme`.`jour` = 'lundi') then `programme`.`id_classe` else '' end) AS `lundi`,(case when (`programme`.`jour` = 'lundi') then `programme`.`id_matiere` else '' end) AS `matlundi`,(case when (`programme`.`jour` = 'mardi') then `programme`.`id_classe` else '' end) AS `mardi`,(case when (`programme`.`jour` = 'mardi') then `programme`.`id_matiere` else '' end) AS `matmardi`,(case when (`programme`.`jour` = 'mercredi') then `programme`.`id_classe` else '' end) AS `mercredi`,(case when (`programme`.`jour` = 'mercredi') then `programme`.`id_matiere` else '' end) AS `matmercredi`,(case when (`programme`.`jour` = 'jeudi') then `programme`.`id_classe` else '' end) AS `jeudi`,(case when (`programme`.`jour` = 'jeudi') then `programme`.`id_matiere` else '' end) AS `matjeudi`,(case when (`programme`.`jour` = 'vendredi') then `programme`.`id_classe` else '' end) AS `vendredi`,(case when (`programme`.`jour` = 'vendredi') then `programme`.`id_matiere` else '' end) AS `matvendredi`,(case when (`programme`.`jour` = 'samedi') then `programme`.`id_classe` else '' end) AS `samedi`,(case when (`programme`.`jour` = 'samedi') then `programme`.`id_matiere` else '' end) AS `matsamedi` from `programme`;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
