-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2019 alle 07:43
-- Versione del server: 5.6.15-log
-- PHP Version: 5.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `biblioteca`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `anagrafica`
--

CREATE TABLE IF NOT EXISTS `anagrafica` (
  `CF` varchar(16) NOT NULL,
  `Nome` varchar(20) NOT NULL,
  `Cognome` varchar(20) NOT NULL,
  `Eta` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`CF`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `anagrafica`
--

INSERT INTO `anagrafica` (`CF`, `Nome`, `Cognome`, `Eta`) VALUES
('AECFCHADFAHIDHEF', 'Tristano', 'Querques', 52),
('AEEHDEAEEIDIICHD', 'Grimaldo', 'Donadelli', 22),
('BFIGICCBDCDABEBG', 'Sidonia', 'Nuzzachi', 11),
('BGFCGGADHIIGEBCB', 'Raimondo', 'Leuchi', 42),
('CEHHAEBGDDABGHEH', 'Bonaldo', 'Cerrato', 44),
('CHEGBHBGEGHHGHHB', 'Antelmo', 'Ceramelli', 47),
('DFCF25A27R9875Y', 'Mario', 'Rossi', 23),
('DGGIBAIHAECBGEFC', 'Severa', 'Nuschese', 12),
('EAACEGECDDCEIEGI', 'Calogera', 'Ciampi', 21),
('EDCBCGEEBIAGBFFB', 'Geremia', 'Deioannon', 45),
('EHCDCCCFBBIFCIAE', 'Nazzaro', 'Giannoccari', 25),
('FBAICCFIDEGDFICG', 'Antonello', 'Cerello', 65),
('FDIBBDIABBEBHFDG', 'Capitolina', 'Cianferra', 32),
('GBDBDIEHGBHIEDID', 'Nicea', 'Giaquinta', 12),
('GCFGFAHGDBFBDACB', 'Odorico', 'Iaconi', 36),
('GGHGIGBBEIHHABCE', 'Oreste', 'Iagulli', 42),
('HACDBAHGGGHDHDAE', 'Niceto', 'Giardina', 75),
('HBHEIIBEGEGEEEBA', 'Galatea', 'Doni', 65),
('HCHGHGCGEAACHCHE', 'Minervina', 'Giampaolo', 25),
('IDAAGIAEAHDEGDBH', 'Lamberto', 'Fabiani', 23),
('IEBCFECIHGCDIIHI', 'Odidone', 'Iaconelli', 45);

-- --------------------------------------------------------

--
-- Struttura della tabella `lettrure`
--

CREATE TABLE IF NOT EXISTS `lettrure` (
  `CodFiscale` varchar(16) NOT NULL,
  `Isbn_libro` varchar(13) NOT NULL,
  `Data` date NOT NULL,
  PRIMARY KEY (`CodFiscale`,`Isbn_libro`,`Data`),
  KEY `Isbn_libro` (`Isbn_libro`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `lettrure`
--

INSERT INTO `lettrure` (`CodFiscale`, `Isbn_libro`, `Data`) VALUES
('DGGIBAIHAECBGEFC', '9788807491931', '2017-01-03'),
('GGHGIGBBEIHHABCE', '9788807491931', '2017-01-10'),
('CEHHAEBGDDABGHEH', '9788817008280', '2017-01-18'),
('EDCBCGEEBIAGBFFB', '9788831724715', '2017-01-17'),
('FBAICCFIDEGDFICG', '9788834415672', '2017-01-10'),
('DFCF25A27R9875Y', '9788837084165', '2016-12-07'),
('DGGIBAIHAECBGEFC', '9788845279928', '2017-01-31'),
('FDIBBDIABBEBHFDG', '9788845279928', '2016-11-15'),
('IDAAGIAEAHDEGDBH', '9788845280740', '2017-01-24'),
('BFIGICCBDCDABEBG', '9788854181748', '2017-01-20'),
('BGFCGGADHIIGEBCB', '9788854181748', '2017-01-16'),
('GCFGFAHGDBFBDACB', '9788854181748', '2017-01-14'),
('EDCBCGEEBIAGBFFB', '9788858119334', '2017-01-02'),
('GCFGFAHGDBFBDACB', '9788858119334', '2017-01-16'),
('BGFCGGADHIIGEBCB', '9788861900172', '2017-01-11'),
('CHEGBHBGEGHHGHHB', '9788861929562', '2017-01-13'),
('EAACEGECDDCEIEGI', '9788861929562', '2017-01-19'),
('CHEGBHBGEGHHGHHB', '9788869830051', '2017-01-08'),
('GBDBDIEHGBHIEDID', '9788872161074', '2017-01-03'),
('GCFGFAHGDBFBDACB', '9788872161074', '2017-01-10'),
('EDCBCGEEBIAGBFFB', '9788873804611', '2017-01-01'),
('EDCBCGEEBIAGBFFB', '9788873804611', '2017-01-12'),
('GGHGIGBBEIHHABCE', '9788877686640', '2017-01-14'),
('BFIGICCBDCDABEBG', '9788877686817', '2017-01-05'),
('HACDBAHGGGHDHDAE', '9788878197213', '2017-01-07');

-- --------------------------------------------------------

--
-- Struttura della tabella `libri`
--

CREATE TABLE IF NOT EXISTS `libri` (
  `Isbn` varchar(13) NOT NULL,
  `Titiolo` varchar(100) NOT NULL,
  `Autore` varchar(50) NOT NULL,
  `Npagine` int(11) NOT NULL,
  PRIMARY KEY (`Isbn`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `libri`
--

INSERT INTO `libri` (`Isbn`, `Titiolo`, `Autore`, `Npagine`) VALUES
('88869930157', 'D Annunzio e la magia della moda', 'Sorge Paola', 227),
('9788807491931', 'Una storia naturale della curiosità', 'Manguel Alberto', 117),
('9788809208384', 'Dialoghi di fine secolo', 'Angela Piero', 163),
('9788817008280', '1000 luoghi da vedere nella vita', 'Schultz Patricia', 232),
('9788817047173', 'L uomo che vendeva il cielo', 'Battaglia Romano', 187),
('9788817065429', 'Anatomie. Storia culturale del corpo umano', 'Aldersey-Williams Hugh', 248),
('9788831724715', 'Ariosto: i metodi e i mondi possibili', 'Casadei Alberto', 188),
('9788834415672', 'Alla scoperta del mondo', 'James Peter', 119),
('9788837084165', 'Alberghi', 'Chiarabini P. Attilio', 207),
('9788838931451', 'Diario londinese', 'Mazzetti Lorenza', 194),
('9788841873267', '200 zuppe super', 'Lewis Sara', 245),
('9788842809784', 'Introduzione all esistenzialismo', 'Abbagnano Nicola', 233),
('9788845279928', 'Essenza della Spagna', 'Unamuno Miguel de', 108),
('9788845280740', 'Spie e zie', 'Ginzberg Siegmund', 221),
('9788845931130', 'Addio a tutto questo', 'Graves Robert', 122),
('9788845931208', 'Bassani', 'White T. H.', 112),
('9788854181748', 'Tutte le opere. Ediz. integrale', 'Alighieri Dante', 216),
('9788858119334', 'E così vorresti fare lo scrittore', 'Culicchia Giuseppe', 199),
('9788861140776', 'Adobe Photoshop Elements 5.0 e 6.0. La grande guida', 'Celano Roberto', 110),
('9788861141445', 'Access avanzato. Basi di dati. Con CD-ROM', 'Vaccaro Silvia', 243),
('9788861142718', 'Adobe Flash CS5 professional. La grande guida. Con DVD-ROM', 'Castrofino Nicola', 164),
('9788861143029', 'Adobe Photoshop CS4. Guida pratica', 'Discardi Matteo', 197),
('9788861900172', 'A piedi', 'Sabelli Fioretti Claudio', 144),
('9788861929562', 'Diario di un uomo deluso', 'Barbellion W. N. P.', 155),
('9788869830051', 'Fiaba per il Natale', 'Andreas-Salom', 122),
('9788872161074', 'Il gatto giorno per giorno', 'Allegri Roberto', 141),
('9788873804611', 'Raccontare la scienza', 'Angela Piero', 145),
('9788876955136', 'Dai generi letterari all estetica dei media', 'Terzo Leonardo', 246),
('9788877686640', 'Cosa trovi nell acqua', 'Orsenigo Vittorio', 189),
('9788877686817', 'Teoria della cartolina', 'Lapaque', 194),
('9788878197213', 'La filosofia del Rinascimento', 'Abbagnano Nicola', 134),
('9788878994478', '101 ricette con la Nutella', 'Krug Roberto', 100),
('9788883353277', 'Atomi & bit. Le ragioni del digitale e del multimediale', 'Mari Luca', 182),
('9788883723049', 'E'' facile seguire i consigli della nonna', 'Bosso Bianca', 133),
('9788884514936', 'Un po  di scienza per tutti', 'Claude', 220);

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `lettrure`
--
ALTER TABLE `lettrure`
  ADD CONSTRAINT `lettrure_ibfk_1` FOREIGN KEY (`CodFiscale`) REFERENCES `anagrafica` (`CF`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lettrure_ibfk_2` FOREIGN KEY (`Isbn_libro`) REFERENCES `libri` (`Isbn`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
