-- Nastavení pro databázi
SET NAMES utf8mb4;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

-- Tabulka registrovaných uživatelů (mohou nahrávat informace o filmech)
DROP TABLE IF EXISTS `uzivatele`;
CREATE TABLE `uzivatele` (
  `id` int NOT NULL AUTO_INCREMENT,
  `jmeno` varchar(100) NOT NULL,
  `heslo` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `jmeno` (`jmeno`)
);

INSERT INTO `uzivatele` (`id`, `jmeno`, `heslo`) VALUES
(1, 'pavel', 'pavel'),
(2, 'alena', 'heslo'),
(3, 'petr', '12345');

-- Tabulka filmů
DROP TABLE IF EXISTS `filmy`;
CREATE TABLE `filmy` (
  `nazev` varchar(255) NOT NULL,
  `reziser` varchar(100) NOT NULL,
  `rok_vydani` int NOT NULL,
  `zobrazeno` int unsigned NOT NULL DEFAULT 0,
  `zanr` varchar(255) NOT NULL, 
  `subzanr`varchar(255)
  PRIMARY KEY (`nazev`)
);

-- Příklad vložení dat do tabulky filmů
INSERT INTO `filmy` (`nazev`, `reziser`, `rok_vydani`, `zobrazeno`, `zanr`, `subzanr`) VALUES
('Pulp Fiction', 'Quentin Tarantino', 1994, 0, 'Akční', 'Drama'),
('Forrest Gump', 'Robert Zemeckis', 1994, 0, 'Komedie', 'Romantika');