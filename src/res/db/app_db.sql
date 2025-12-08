-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Creato il: Dic 08, 2025 alle 14:12
-- Versione del server: 8.0.44
-- Versione PHP: 8.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `app_db`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `cinema`
--

CREATE TABLE `cinema` (
  `id` int NOT NULL,
  `nome` varchar(40) NOT NULL,
  `citta` varchar(40) NOT NULL,
  `numSale` int NOT NULL,
  `numPost` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dump dei dati per la tabella `cinema`
--

INSERT INTO `cinema` (`id`, `nome`, `citta`, `numSale`, `numPost`) VALUES
(1, 'Cinema Centrale', 'Milano', 8, 950),
(2, 'Cinema Moderno', 'Roma', 12, 1500),
(3, 'Arcadia', 'Firenze', 6, 600),
(4, 'Multisala Aurora', 'Torino', 10, 1200),
(5, 'Cinema Riviera', 'Bari', 5, 500),
(6, 'CineMax', 'Napoli', 14, 1800);

-- --------------------------------------------------------

--
-- Struttura della tabella `film`
--

CREATE TABLE `film` (
  `id` int NOT NULL,
  `titolo` varchar(40) NOT NULL,
  `durata` int NOT NULL,
  `anno` int NOT NULL,
  `idRegista` int NOT NULL,
  `locandina` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dump dei dati per la tabella `film`
--

INSERT INTO `film` (`id`, `titolo`, `durata`, `anno`, `idRegista`, `locandina`) VALUES
(1, 'Inception', 148, 2010, 1, 'inception.jpg'),
(2, 'Interstellar', 169, 2014, 1, 'interstellar.jpg'),
(3, 'Pulp Fiction', 154, 1994, 2, 'pulpfiction.jpg'),
(4, 'Django Unchained', 165, 2012, 2, 'django.jpg'),
(5, 'Jurassic Park', 127, 1993, 3, 'jurassicpark.jpg'),
(6, 'Schindler List', 195, 1993, 3, 'schindler.jpg'),
(7, 'Goodfellas', 146, 1990, 4, 'goodfellas.jpg'),
(8, 'The Wolf of Wall Street', 180, 2013, 4, 'wolfofwallstreet.jpg'),
(9, 'Dune', 155, 2021, 5, 'dune.jpg'),
(10, 'Arrival', 116, 2016, 5, 'arrival.jpg'),
(11, 'Spirited Away', 125, 2001, 6, 'spiritedaway.jpg'),
(12, 'Avatar', 162, 2009, 7, 'avatar.jpg'),
(13, 'Titanic', 195, 1997, 7, 'titanic.jpg'),
(14, 'The Lord of the Rings', 178, 2001, 8, 'lotr.jpg'),
(15, 'Blade Runner 2049', 163, 2017, 10, 'bladerunner2049.jpg');

-- --------------------------------------------------------

--
-- Struttura della tabella `proiezioni`
--

CREATE TABLE `proiezioni` (
  `id` int NOT NULL,
  `idCinema` int NOT NULL,
  `idFilm` int NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dump dei dati per la tabella `proiezioni`
--

INSERT INTO `proiezioni` (`id`, `idCinema`, `idFilm`, `data`) VALUES
(1, 1, 1, '2025-01-20'),
(2, 1, 2, '2025-01-22'),
(3, 1, 9, '2025-02-01'),
(4, 2, 3, '2025-01-25'),
(5, 2, 4, '2025-02-10'),
(6, 2, 12, '2025-03-15'),
(7, 3, 5, '2025-01-18'),
(8, 3, 6, '2025-01-29'),
(9, 3, 15, '2025-03-02'),
(10, 4, 7, '2025-02-05'),
(11, 4, 8, '2025-02-20'),
(12, 4, 14, '2025-03-18'),
(13, 5, 11, '2025-01-12'),
(14, 5, 9, '2025-01-30'),
(15, 5, 10, '2025-02-25'),
(16, 6, 1, '2025-02-03'),
(17, 6, 12, '2025-02-18'),
(18, 6, 13, '2025-03-05'),
(19, 1, 14, '2025-03-22'),
(20, 1, 10, '2025-03-29'),
(21, 2, 11, '2025-04-02'),
(22, 2, 1, '2025-04-10'),
(23, 3, 9, '2025-04-12'),
(24, 3, 4, '2025-04-18'),
(25, 4, 15, '2025-04-20'),
(26, 4, 2, '2025-05-03'),
(27, 5, 7, '2025-05-10'),
(28, 5, 3, '2025-05-17'),
(29, 6, 8, '2025-05-22'),
(30, 6, 5, '2025-05-30');

-- --------------------------------------------------------

--
-- Struttura della tabella `registi`
--

CREATE TABLE `registi` (
  `id` int NOT NULL,
  `nome` varchar(40) NOT NULL,
  `cognome` varchar(40) NOT NULL,
  `annoNascita` int NOT NULL,
  `annoMorte` int DEFAULT NULL,
  `nazione` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dump dei dati per la tabella `registi`
--

INSERT INTO `registi` (`id`, `nome`, `cognome`, `annoNascita`, `annoMorte`, `nazione`) VALUES
(1, 'Christopher', 'Nolan', 1970, NULL, 'UK'),
(2, 'Quentin', 'Tarantino', 1963, NULL, 'USA'),
(3, 'Steven', 'Spielberg', 1946, NULL, 'USA'),
(4, 'Martin', 'Scorsese', 1942, NULL, 'USA'),
(5, 'Denis', 'Villeneuve', 1967, NULL, 'Canada'),
(6, 'Hayao', 'Miyazaki', 1941, NULL, 'Japan'),
(7, 'James', 'Cameron', 1954, NULL, 'Canada'),
(8, 'Peter', 'Jackson', 1961, NULL, 'New Zealand'),
(9, 'Alfonso', 'Cuarón', 1961, NULL, 'Mexico'),
(10, 'Ridley', 'Scott', 1937, NULL, 'UK');

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `fullName` varchar(80) NOT NULL,
  `email` varchar(90) NOT NULL,
  `password` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`id`, `fullName`, `email`, `password`) VALUES
(1, 'diaferio samuele', 'diaferiosamuele@gmail.com', '$2y$10$uWefP8ySpCzt2V4Bg63qpuQdnrJDnvSzyoxq9y03uaYh4NemaVkE6');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `cinema`
--
ALTER TABLE `cinema`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idRegista` (`idRegista`);

--
-- Indici per le tabelle `proiezioni`
--
ALTER TABLE `proiezioni`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idCinema` (`idCinema`),
  ADD KEY `idFilm` (`idFilm`);

--
-- Indici per le tabelle `registi`
--
ALTER TABLE `registi`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `cinema`
--
ALTER TABLE `cinema`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT per la tabella `film`
--
ALTER TABLE `film`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT per la tabella `proiezioni`
--
ALTER TABLE `proiezioni`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT per la tabella `registi`
--
ALTER TABLE `registi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT per la tabella `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `film`
--
ALTER TABLE `film`
  ADD CONSTRAINT `film_ibfk_1` FOREIGN KEY (`idRegista`) REFERENCES `registi` (`id`);

--
-- Limiti per la tabella `proiezioni`
--
ALTER TABLE `proiezioni`
  ADD CONSTRAINT `proiezioni_ibfk_1` FOREIGN KEY (`idCinema`) REFERENCES `cinema` (`id`),
  ADD CONSTRAINT `proiezioni_ibfk_2` FOREIGN KEY (`idFilm`) REFERENCES `film` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
