-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 06 Septembre 2021 à 18:43
-- Version du serveur :  5.6.15-log
-- Version de PHP :  5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `jobboard_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `contract`
--

CREATE TABLE IF NOT EXISTS `contract` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `contract`
--

INSERT INTO `contract` (`id`, `name`) VALUES
(1, 'CDD'),
(2, 'CDI'),
(3, 'Alternance'),
(4, 'Stage');

-- --------------------------------------------------------

--
-- Structure de la table `jobs`
--

CREATE TABLE IF NOT EXISTS `jobs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `profession_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `contract_id` int(11) NOT NULL,
  `company` varchar(255) NOT NULL,
  `job_title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `salary` varchar(255) NOT NULL,
  `contact_user` varchar(255) NOT NULL,
  `contact_email` varchar(255) NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `post_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Contenu de la table `jobs`
--

INSERT INTO `jobs` (`id`, `profession_id`, `location_id`, `contract_id`, `company`, `job_title`, `description`, `salary`, `contact_user`, `contact_email`, `post_date`, `post_update`) VALUES
(1, 2, 1, 3, 'Subskill', 'Développeur Back', 'Agence digitale indépendante créée en 2008, Subskill se positionne comme un acteur de la transformation digitale des entreprises. Ils sont des Digital Experience Makers !', 'Non renseigné', 'Olivier Ross', 'olivier.ross@subskill.com', '2021-09-03 15:11:56', '2021-09-06 15:37:41'),
(2, 1, 2, 2, 'Microsoft Inc', 'Ingénieur DevOps', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent sed orci fringilla, sagittis enim id, luctus metus. Duis a magna urna. Fusce dui neque, pellentesque at tellus et, malesuada commodo lacus. Mauris a porttitor mi, a rutrum lacus. In quis el', '98k', 'Neil Boyd', 'neil.boyd@example.com', '2021-09-03 15:11:56', '2021-09-06 15:37:41'),
(3, 1, 1, 1, 'Cisco', 'Ingénieur réseau', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce mollis nec erat vitae porta. Fusce rhoncus erat nunc, sed dictum sem dignissim eu. Vivamus nec purus quis leo finibus interdum vitae ut justo. Nam porta auctor dolor, consequat volutpat libero', '70k', 'Marc Noel', 'marc.noel@cisco.com', '2021-09-04 13:15:15', '2021-09-06 15:37:41'),
(4, 1, 1, 1, 'Microsoft Inc.', 'Développeur junior C# (H/F)', 'Aliquam volutpat sed dolor in blandit. Cras sed dictum diam. Cras accumsan porttitor sem. In tempor ac tellus ac tristique. Fusce at odio diam. Sed laoreet elementum porttitor. Proin nec ligula vel velit iaculis efficitur. Phasellus nec dui mattis, sceler', '20k', 'jean', 'jean@gmail.com', '2021-09-04 13:17:43', '2021-09-06 15:37:41'),
(6, 2, 1, 3, 'Microsoft Inc.', 'Développeur junior C# (H/F)', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression.', '20k', 'DUPONT Jean', 'jean.dupont@microsoft.com', '2021-09-04 14:31:16', '2021-09-06 15:37:41'),
(7, 2, 1, 2, 'Tech solutions', 'Developpeur Full Stack', 'Au sein d''une petite équipe de 3 développeurs fonctionnant en méthode agile, vous toucherez à tous les aspects du développement. Vous aurez aussi l''appui d''experts externes qui nous accompagnent dans des domaines tels que l''infra, le sql et les intégratio', '40k', 'Laurent Panier', 'laurent.panier@techsolutions.fr', '2021-09-04 14:44:56', '2021-09-06 15:37:41'),
(8, 5, 5, 2, 'Atlas', 'Chef de projet IA [H/F]', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam a massa massa. Sed et libero varius, tristique arcu sit amet, luctus turpis. Praesent quis suscipit nunc. Donec quis dictum libero, et malesuada orci. Suspendisse iaculis felis a purus convall', '50k', 'Ronald Byrd', 'ronald.byrd@atlas.com', '2021-09-05 11:35:50', '2021-09-06 15:37:41'),
(9, 3, 4, 4, 'Tech Center', 'Stage - Intégrateur Web Wordpress [H/F]', 'Nulla facilisi. Vivamus sit amet libero risus. Suspendisse enim odio, sodales id ligula non, vestibulum molestie velit. Phasellus ut felis urna. Praesent sed velit eu libero facilisis faucibus id nec magna. Sed sit amet tristique lectus, vel elementum lig', 'Non rémunéré', 'Layla Lopez', 'layla.lopez@techcenter.com', '2021-09-05 11:38:38', '2021-09-06 15:37:41'),
(10, 6, 3, 1, 'Marseille Tech', 'Graphiste [H/F]', 'Sed eu est suscipit, hendrerit tellus id, auctor lorem. Ut quis mollis urna. Sed sodales purus in lacinia iaculis. Sed et justo eget leo consectetur dapibus sit amet in elit. Cras ultricies cursus mi, in molestie massa vulputate et. Maecenas interdum impe', '25k', 'Laurent Noel', 'laurent.noel@marseille.tech', '2021-09-05 11:41:07', '2021-09-06 15:37:41'),
(11, 4, 1, 2, 'Tech Industry', 'Modélisateur Blender [H/F]', 'Phasellus posuere dui sollicitudin urna ultricies, quis lobortis justo malesuada. Aenean vel velit ac nulla pretium consequat a vel nisi. Nulla non nulla tortor. Vivamus elementum est elit, sit amet mollis massa aliquet et. Pellentesque magna mauris, vehi', '35k', 'Camila Harrison', 'camila.harrison@techindustry.com', '2021-09-05 11:43:15', '2021-09-06 15:37:41'),
(13, 2, 1, 3, 'SNCF', 'Alternant Développeur Back (H/F)', 'In tempor gravida porttitor. Vivamus lobortis pellentesque lacus, non ornare justo ullamcorper nec. Duis sed lectus a ligula tincidunt tincidunt. In scelerisque eros vel elit dignissim, sit amet hendrerit nisi ultricies. Aliquam erat volutpat. In convalli', '25k', 'Jennifer Owens', 'jennifer.owens@sncf.fr', '2021-09-06 09:05:35', '2021-09-06 15:37:41'),
(14, 2, 1, 3, 'Avis vérifiés', 'Alternant Développeur Back (H/F)', 'Curabitur lorem mauris, consectetur ac nisl eu, molestie varius quam. Aliquam a molestie risus. Etiam aliquet massa tincidunt elit lobortis aliquam. Fusce id dapibus ante, quis tincidunt elit. Maecenas in iaculis nulla, in blandit diam. Vestibulum pretium', '20k', 'Jamie Fuller', 'jamie.fuller@avisverifies.fr', '2021-09-06 15:11:54', '2021-09-06 15:37:41'),
(15, 2, 1, 3, 'IBM', 'Développeur Réseau [H/F]', 'In hendrerit diam vitae ex egestas, eu rutrum nibh pellentesque. Integer fermentum sapien a velit iaculis rhoncus. Nunc bibendum, mauris id aliquam mattis, lorem nibh bibendum ligula, cursus pretium nisl ex id nunc. In vitae sapien finibus, congue neque i', '20k', 'Dolores Williamson', 'dolores.williamson@ibm.com', '2021-09-06 15:13:57', '2021-09-06 15:37:41'),
(16, 2, 1, 2, 'LCL', 'Développeur Blockchain [H/F]', 'Pellentesque in bibendum diam, eget ultrices turpis. Donec eros ipsum, tempus ut nisi at, posuere pellentesque eros. Sed venenatis lorem quis risus ultrices, eu rhoncus erat luctus. In ac arcu enim. Suspendisse pulvinar diam vitae massa ullamcorper fermen', '50k', 'Beverly Pena', 'beverly.pena@lcl.fr', '2021-09-06 15:15:00', '2021-09-06 15:37:41'),
(17, 2, 1, 4, 'Crédit agricole', 'Stagiaire développeur [H/F]', 'Sed commodo vehicula metus, eu volutpat justo sodales et. Aliquam dictum dictum leo. Nullam eget elit dui. Cras non elit ut tellus aliquet placerat. Curabitur non turpis mattis, vestibulum ligula in, gravida erat. Interdum et malesuada fames ac ante ipsum', 'Non rémunéré', 'Diane Bailey', 'diane.bailey@creditagricole.fr', '2021-09-06 15:16:22', '2021-09-06 15:37:41'),
(18, 2, 1, 1, 'AXA', 'Développeur junior C# (H/F)', 'Aliquam turpis erat, euismod ut hendrerit at, dapibus vitae nunc. Aenean posuere, justo et luctus elementum, quam enim venenatis magna, non vestibulum sem ipsum ac nisl. Pellentesque interdum posuere tellus, in lobortis risus tristique a. Nunc nisl neque,', '20k', 'Javier Castillo', 'javier.castillo@axa.fr', '2021-09-06 15:17:31', '2021-09-06 15:37:41'),
(19, 2, 1, 2, 'Orange', 'Développeur Fullstack [H/F]', 'Fusce at urna massa. Praesent egestas mi dui, tempor dictum nulla lacinia eget. Morbi quis lectus faucibus ipsum sagittis venenatis. Cras luctus, dui non ornare mattis, sem elit fermentum lacus, tempor euismod urna purus et ex. Aenean faucibus leo nibh, e', '98k', 'Marion Alvarez', 'marion.alvarez@orange.fr', '2021-09-06 15:19:12', '2021-09-06 15:37:41'),
(20, 2, 1, 4, 'Thales', 'Stagiaire développeur [H/F]', 'Quisque sed sagittis erat, vitae laoreet orci. Phasellus quis efficitur velit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Sed vel tempor urna. Quisque a ante lobortis mi posuere efficitur ac id massa. Nunc temp', 'Non rémunéré', 'Amber Hawkins', 'amber.hawkins@thales.fr', '2021-09-06 15:20:43', '2021-09-06 15:37:41'),
(21, 2, 1, 2, 'Bouygues', 'Dev Ops', 'Quisque sed sagittis erat, vitae laoreet orci. Phasellus quis efficitur velit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Sed vel tempor urna. Quisque a ante lobortis mi posuere efficitur ac id massa. Nunc temp', '50k', 'Michele Spencer', 'michele.spencer@bouygues.fr', '2021-09-06 15:28:23', '2021-09-06 15:37:41'),
(22, 2, 1, 2, 'JP Tech', 'Développeur informatique  ', 'Fusce at urna massa. Praesent egestas mi dui, tempor dictum nulla lacinia eget. Morbi quis lectus faucibus ipsum sagittis venenatis. Cras luctus, dui non ornare mattis, sem elit fermentum lacus, tempor euismod urna purus et ex. Aenean faucibus leo nibh, e', '20k', 'Alfredo Spencer', 'alfredo.spencer@jptech.fr', '2021-09-06 15:34:07', '2021-09-06 15:54:13');

-- --------------------------------------------------------

--
-- Structure de la table `location`
--

CREATE TABLE IF NOT EXISTS `location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `location`
--

INSERT INTO `location` (`id`, `name`) VALUES
(1, 'Paris'),
(2, 'Bordeaux'),
(3, 'Marseille'),
(4, 'Lille'),
(5, 'Lyon');

-- --------------------------------------------------------

--
-- Structure de la table `profession`
--

CREATE TABLE IF NOT EXISTS `profession` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `profession`
--

INSERT INTO `profession` (`id`, `name`) VALUES
(1, 'Ingénieur'),
(2, 'Développeur'),
(3, 'Intégrateur'),
(4, 'Modélisateur'),
(5, 'Chef de projet'),
(6, 'Graphiste');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
