-- --------------------------------------------------------
-- Hôte :                        localhost
-- Version du serveur:           5.7.18-log - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Export de la structure de la base pour simplitri
CREATE DATABASE IF NOT EXISTS `simplitri` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `simplitri`;

-- Export de la structure de la table simplitri. tbl_chrono_number
CREATE TABLE IF NOT EXISTS `tbl_chrono_number` (
  `chrono_id` int(11) NOT NULL AUTO_INCREMENT,
  `chrono_type` char(50) DEFAULT NULL,
  `chrono_years` int(11) DEFAULT NULL,
  `chrono_month` int(11) DEFAULT NULL,
  `chrono_inc` int(11) DEFAULT NULL,
  PRIMARY KEY (`chrono_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Export de données de la table simplitri.tbl_chrono_number : ~1 rows (environ)
/*!40000 ALTER TABLE `tbl_chrono_number` DISABLE KEYS */;
INSERT INTO `tbl_chrono_number` (`chrono_id`, `chrono_type`, `chrono_years`, `chrono_month`, `chrono_inc`) VALUES
	(1, 'CTN', 17, 6, 13);
/*!40000 ALTER TABLE `tbl_chrono_number` ENABLE KEYS */;

-- Export de la structure de la table simplitri. tbl_contenant
CREATE TABLE IF NOT EXISTS `tbl_contenant` (
  `contenant_id` int(11) NOT NULL AUTO_INCREMENT,
  `contenant_num` char(20) NOT NULL,
  `fa_num` char(50) NOT NULL,
  `contenant_create_date` date DEFAULT NULL,
  `contenant_close_date` date DEFAULT NULL,
  `contenant_cel_bool` char(50) DEFAULT 'NON',
  `contenant_laser_n` int(11) NOT NULL DEFAULT '0',
  `contenant_laser_ne` int(11) NOT NULL DEFAULT '0',
  `contenant_laser_1` int(11) NOT NULL DEFAULT '0',
  `contenant_laser_2` int(11) NOT NULL DEFAULT '0',
  `contenant_laser_3` int(11) NOT NULL DEFAULT '0',
  `contenant_cel_n` int(11) NOT NULL DEFAULT '0',
  `contenant_cel_ne` int(11) NOT NULL DEFAULT '0',
  `contenant_cel_1` int(11) NOT NULL DEFAULT '0',
  `contenant_cel_2` int(11) NOT NULL DEFAULT '0',
  `contenant_cel_3` int(11) NOT NULL DEFAULT '0',
  `contenant_last_edit` date DEFAULT NULL,
  PRIMARY KEY (`contenant_id`),
  UNIQUE KEY `contenant_num` (`contenant_num`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Export de données de la table simplitri.tbl_contenant : ~5 rows (environ)
/*!40000 ALTER TABLE `tbl_contenant` DISABLE KEYS */;
INSERT INTO `tbl_contenant` (`contenant_id`, `contenant_num`, `fa_num`, `contenant_create_date`, `contenant_close_date`, `contenant_cel_bool`, `contenant_laser_n`, `contenant_laser_ne`, `contenant_laser_1`, `contenant_laser_2`, `contenant_laser_3`, `contenant_cel_n`, `contenant_cel_ne`, `contenant_cel_1`, `contenant_cel_2`, `contenant_cel_3`, `contenant_last_edit`) VALUES
	(1, 'CTN 17/6/12', 'ADB 17/S18/10', '2017-06-27', NULL, 'OUI', 7, 2, 7, 2, 7, 1, 6, 1, 6, 1, '2017-06-27'),
	(2, 'CTN 17/6/13', 'ADB 17/S18/10', '2017-06-27', NULL, 'NON', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2017-06-27');
/*!40000 ALTER TABLE `tbl_contenant` ENABLE KEYS */;

-- Export de la structure de la table simplitri. tbl_fa
CREATE TABLE IF NOT EXISTS `tbl_fa` (
  `fa_id` int(11) NOT NULL AUTO_INCREMENT,
  `fa_num` char(50) NOT NULL,
  PRIMARY KEY (`fa_id`),
  UNIQUE KEY `fa_num` (`fa_num`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='Table contenant toutes les information lié à la FA';

-- Export de données de la table simplitri.tbl_fa : ~1 rows (environ)
/*!40000 ALTER TABLE `tbl_fa` DISABLE KEYS */;
INSERT INTO `tbl_fa` (`fa_id`, `fa_num`) VALUES
	(1, 'ADB 17/S18/10');
/*!40000 ALTER TABLE `tbl_fa` ENABLE KEYS */;

-- Export de la structure de la table simplitri. tbl_tri_jour
CREATE TABLE IF NOT EXISTS `tbl_tri_jour` (
  `tri_jour_id` int(11) NOT NULL AUTO_INCREMENT,
  `jour` date NOT NULL,
  `LN` int(11) DEFAULT '0',
  `LNE` int(11) DEFAULT '0',
  `L1` int(11) DEFAULT '0',
  `L2` int(11) DEFAULT '0',
  `L3` int(11) DEFAULT '0',
  `CN` int(11) DEFAULT '0',
  `CNE` int(11) DEFAULT '0',
  `C1` int(11) DEFAULT '0',
  `C2` int(11) DEFAULT '0',
  `C3` int(11) DEFAULT '0',
  PRIMARY KEY (`tri_jour_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Export de données de la table simplitri.tbl_tri_jour : ~0 rows (environ)
/*!40000 ALTER TABLE `tbl_tri_jour` DISABLE KEYS */;
INSERT INTO `tbl_tri_jour` (`tri_jour_id`, `jour`, `LN`, `LNE`, `L1`, `L2`, `L3`, `CN`, `CNE`, `C1`, `C2`, `C3`) VALUES
	(1, '2017-06-27', 7, 2, 7, 2, 7, 1, 6, 1, 6, 1);
/*!40000 ALTER TABLE `tbl_tri_jour` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
