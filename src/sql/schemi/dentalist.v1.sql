/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dump della struttura del database dentalist
DROP DATABASE IF EXISTS `dentalist`;
CREATE DATABASE IF NOT EXISTS `dentalist` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `dentalist`;

-- Dump della struttura di tabella dentalist.prenotazione
DROP TABLE IF EXISTS `prenotazione`;
CREATE TABLE IF NOT EXISTS `prenotazione` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_utente` int(11) NOT NULL,
  `visita` varchar(50) NOT NULL,
  `giorno` date NOT NULL,
  `orario` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_utente` (`id_utente`),
  CONSTRAINT `FK_prenotazione_utente` FOREIGN KEY (`id_utente`) REFERENCES `utente` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

-- Dump dei dati della tabella dentalist.prenotazione: ~0 rows (circa)
DELETE FROM `prenotazione`;

-- Dump della struttura di tabella dentalist.utente
DROP TABLE IF EXISTS `utente`;
CREATE TABLE IF NOT EXISTS `utente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `cognome` varchar(100) NOT NULL,
  `cf` varchar(16) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `profilo` tinytext NOT NULL,
  `indirizzo` varchar(100) NOT NULL,
  `telefono` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `cf` (`cf`)
) ENGINE=InnoDB AUTO_INCREMENT=114 DEFAULT CHARSET=utf8mb4;

-- Dump dei dati della tabella dentalist.utente: ~31 rows (circa)
DELETE FROM `utente`;
INSERT INTO `utente` (`id`, `nome`, `cognome`, `cf`, `email`, `password`, `profilo`, `indirizzo`, `telefono`) VALUES
	(23, 'Admin', '', '', 'admin@dentalist.it', '45a1f3a4458f3901faa1b483186d79067f56787bda85a9de98316fa31c45c38c', 'admin', '', ''),
	(24, 'Luigi', 'Verdi', 'PPPLLLNNN1234567', 'luigi.verdi@gmail.com', '51e8ea280b44e16934d4d611901f3d3afc41789840acdff81942c2f65009cd52', 'utente', 'Via Roma 2', '3333333333'),
	(25, 'Marco', 'Bianchi', 'MMMBNNNN1234567', 'marco.bianchi@gmail.com', '51e8ea280b44e16934d4d611901f3d3afc41789840acdff81942c2f65009cd52', 'utente', 'Via Milano 3', '3333333334'),
	(26, 'Paolo', 'Rossi', 'PPPRSSNNN1234567', 'paolo.rossi@gmail.com', '51e8ea280b44e16934d4d611901f3d3afc41789840acdff81942c2f65009cd52', 'utente', 'Via Napoli 4', '3333333335'),
	(27, 'Anna', 'Neri', 'AANERRNNN1234567', 'anna.neri@gmail.com', '51e8ea280b44e16934d4d611901f3d3afc41789840acdff81942c2f65009cd52', 'utente', 'Via Firenze 5', '3333333336'),
	(28, 'Giulia', 'Gialli', 'GGGLLLNNN1234567', 'giulia.gialli@gmail.com', '51e8ea280b44e16934d4d611901f3d3afc41789840acdff81942c2f65009cd52', 'utente', 'Via Torino 6', '3333333337'),
	(29, 'Luca', 'Blu', 'LLBBLNNNN1234567', 'luca.blu@gmail.com', '51e8ea280b44e16934d4d611901f3d3afc41789840acdff81942c2f65009cd52', 'utente', 'Via Bologna 7', '3333333338'),
	(30, 'Francesco', 'Verdi', 'FFVVNNNN1234567', 'francesco.verdi@gmail.com', '51e8ea280b44e16934d4d611901f3d3afc41789840acdff81942c2f65009cd52', 'utente', 'Via Genova 8', '3333333339'),
	(31, 'Simona', 'Grigi', 'SSGGIINNN1234567', 'simona.grigi@gmail.com', '51e8ea280b44e16934d4d611901f3d3afc41789840acdff81942c2f65009cd52', 'utente', 'Via Lecce 9', '3333333340'),
	(32, 'Michele', 'Arancioni', 'MMAAONNN1234567', 'michele.arancioni@gmail.com', '51e8ea280b44e16934d4d611901f3d3afc41789840acdff81942c2f65009cd52', 'utente', 'Via Palermo 10', '3333333341'),
	(33, 'Francesca', 'Galli', 'FFGAANNN1234567', 'francesca.galli@gmail.com', '51e8ea280b44e16934d4d611901f3d3afc41789840acdff81942c2f65009cd52', 'utente', 'Via Catania 11', '3333333342'),
	(34, 'Andrea', 'Cialli', 'AACLLNNN1234567', 'andrea.cialli@gmail.com', '51e8ea280b44e16934d4d611901f3d3afc41789840acdff81942c2f65009cd52', 'utente', 'Via Bari 12', '3333333343'),
	(35, 'Rita', 'Lupo', 'RRLUPNNN1234567', 'rita.lupo@gmail.com', '51e8ea280b44e16934d4d611901f3d3afc41789840acdff81942c2f65009cd52', 'utente', 'Via Pescara 13', '3333333344'),
	(36, 'Matteo', 'Santo', 'MMSNTNNN1234567', 'matteo.santo@gmail.com', '51e8ea280b44e16934d4d611901f3d3afc41789840acdff81942c2f65009cd52', 'utente', 'Via Rimini 14', '3333333345'),
	(37, 'Giovanni', 'Verde', 'GGVVNNNN1234567', 'giovanni.verde@gmail.com', '51e8ea280b44e16934d4d611901f3d3afc41789840acdff81942c2f65009cd52', 'utente', 'Via Taranto 15', '3333333346'),
	(38, 'Sara', 'Vio', 'SSVIONNN1234567', 'sara.vio@gmail.com', '51e8ea280b44e16934d4d611901f3d3afc41789840acdff81942c2f65009cd52', 'utente', 'Via Sorrento 16', '3333333347'),
	(39, 'Tommaso', 'Sanna', 'TTSNNNN1234567', 'tommaso.sanna@gmail.com', '51e8ea280b44e16934d4d611901f3d3afc41789840acdff81942c2f65009cd52', 'utente', 'Via Perugia 17', '3333333348'),
	(40, 'Elena', 'Marrone', 'EEMRNNN1234567', 'elena.marrone@gmail.com', '51e8ea280b44e16934d4d611901f3d3afc41789840acdff81942c2f65009cd52', 'utente', 'Via Mantova 18', '3333333349'),
	(41, 'Claudio', 'Paolo', 'CCPPNNNN1234567', 'claudio.paolo@gmail.com', '51e8ea280b44e16934d4d611901f3d3afc41789840acdff81942c2f65009cd52', 'utente', 'Via Lecce 19', '3333333350'),
	(42, 'Laura', 'De Luca', 'LLDLNNN1234567', 'laura.deluca@gmail.com', '51e8ea280b44e16934d4d611901f3d3afc41789840acdff81942c2f65009cd52', 'utente', 'Via Messina 20', '3333333351'),
	(43, 'Alessandro', 'Marra', 'AAMRNNNN1234567', 'alessandro.marra@gmail.com', '51e8ea280b44e16934d4d611901f3d3afc41789840acdff81942c2f65009cd52', 'utente', 'Via Roma 21', '3333333352'),
	(44, 'Federico', 'Vitale', 'FFVTNNNN1234567', 'federico.vitale@gmail.com', '51e8ea280b44e16934d4d611901f3d3afc41789840acdff81942c2f65009cd52', 'utente', 'Via Foggia 22', '3333333353'),
	(45, 'Marta', 'Caruso', 'MMCNNNN1234567', 'marta.caruso@gmail.com', '51e8ea280b44e16934d4d611901f3d3afc41789840acdff81942c2f65009cd52', 'utente', 'Via Cagliari 23', '3333333354'),
	(46, 'Riccardo', 'Pascali', 'RRPCNNNN1234567', 'riccardo.pascali@gmail.com', '51e8ea280b44e16934d4d611901f3d3afc41789840acdff81942c2f65009cd52', 'utente', 'Via Parma 24', '3333333355'),
	(47, 'Chiara', 'Serrano', 'CCSNNNNN1234567', 'chiara.serrano@gmail.com', '51e8ea280b44e16934d4d611901f3d3afc41789840acdff81942c2f65009cd52', 'utente', 'Via Ancona 25', '3333333356'),
	(48, 'Giuseppe', 'Trento', 'GGTTNNNN1234567', 'giuseppe.trento@gmail.com', '51e8ea280b44e16934d4d611901f3d3afc41789840acdff81942c2f65009cd52', 'utente', 'Via Trieste 26', '3333333357'),
	(49, 'Monica', 'Battaglia', 'MMBTNNNN1234567', 'monica.battaglia@gmail.com', '51e8ea280b44e16934d4d611901f3d3afc41789840acdff81942c2f65009cd52', 'utente', 'Via Cosenza 27', '3333333358'),
	(50, 'Salvatore', 'Fiorentino', 'SSFFNNNN1234567', 'salvatore.fiorentino@gmail.com', '51e8ea280b44e16934d4d611901f3d3afc41789840acdff81942c2f65009cd52', 'utente', 'Via Matera 28', '3333333359'),
	(51, 'Loredana', 'Pellini', 'LLPENN1234567', 'loredana.pellini@gmail.com', '51e8ea280b44e16934d4d611901f3d3afc41789840acdff81942c2f65009cd52', 'utente', 'Via Frosinone 29', '3333333360'),
	(52, 'Emanuele', 'Castellani', 'EECNNNN1234567', 'emanuele.castellani@gmail.com', '51e8ea280b44e16934d4d611901f3d3afc41789840acdff81942c2f65009cd52', 'utente', 'Via Lucca 30', '3333333361'),
	(53, 'Vincenzo', 'Di Stefano', 'VVDSNNNN1234567', 'vincenzo.distefano@gmail.com', '51e8ea280b44e16934d4d611901f3d3afc41789840acdff81942c2f65009cd52', 'utente', 'Via Pisa 31', '3333333362'),
	(113, 'Lorenzo', 'Porporato', 'PRPLNZ98M29L219F', 'lorusfrizzantoni@hotmail.it', '0b14d501a594442a01c6859541bcb3e8164d183d32937b851835442f69d5c94e', 'utente', 'Via Monfalcone 153', '3395601176');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

-- Creazione utente "dentalist" + permessi sul db
CREATE USER 'dentalist'@'localhost' IDENTIFIED BY 'k48whXFfeKsiOv4FhrLo';
GRANT USAGE ON *.* TO 'dentalist'@'localhost';