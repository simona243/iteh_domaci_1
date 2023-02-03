-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2023 at 09:19 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `biblioteka`
--

-- --------------------------------------------------------

--
-- Table structure for table `knjiga`
--

CREATE TABLE `knjiga` (
  `id` int(11) NOT NULL,
  `naziv` varchar(50) NOT NULL,
  `autor` varchar(50) NOT NULL,
  `cena` int(11) NOT NULL,
  `opis` varchar(250) NOT NULL,
  `zanr` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `knjiga`
--

INSERT INTO `knjiga` (`id`, `naziv`, `autor`, `cena`, `opis`, `zanr`) VALUES
(1, 'Portret jedne dame', 'Henri Džejms', 1151, 'Naravno, među svojim mnogim teorijama, mlada devojka je imala i čitavu kolekciju pogleda na problem braka. A jedno od prvih na toj listi bilo je njeno shvatanje da je vulgarno misliti previše o tome.', 2),
(2, 'Šljivin cvet u vazi od zlata', 'Nepoznati pisac', 1500, 'Nepoznati autor iz XVI veka ostavio je za sobom veličanstveno delo. Legenda kaže da ga je napisao da bi osvetio smrt svoga oca. Stranice rukopisa je natrljao otrovom, i poslao ih očevom ubici. Po predanju, žrtva nije prestajala da čita knjigu i umrla', 3),
(3, 'Ljubavnik ledi Četerli', 'Dejvid Herbert Lorens', 1299, 'Naše doba je u suštini tragično doba i zato odbijamo da ga shvatimo tragično. Došlo je do sloma, nalazimo se među ruševinama, počinjemo da izgrađujemo nova mala staništa, gajimo nove male nade.', 3),
(4, 'Crni leptiri', 'Modi', 899, 'Priča koja eksplodira kao tempirana bomba\r\n\r\nRoman je adaptiran po seriji „Crni leptiri“.\r\n\r\nSpokojan sam iako ne bih smeo da budem.', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `email`, `password`) VALUES
(1, 'simona', 'vujnovic', 'simona@gmail.com', 'simona');

-- --------------------------------------------------------

--
-- Table structure for table `zanr`
--

CREATE TABLE `zanr` (
  `id_zanra` int(11) NOT NULL,
  `naziv_zanra` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `zanr`
--

INSERT INTO `zanr` (`id_zanra`, `naziv_zanra`) VALUES
(1, 'akcioni'),
(2, 'biografija'),
(3, 'Drama'),
(4, 'Horor'),
(5, 'Kuvari'),
(6, 'Psihologija');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `knjiga`
--
ALTER TABLE `knjiga`
  ADD PRIMARY KEY (`id`),
  ADD KEY `zanr` (`zanr`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zanr`
--
ALTER TABLE `zanr`
  ADD PRIMARY KEY (`id_zanra`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `knjiga`
--
ALTER TABLE `knjiga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `zanr`
--
ALTER TABLE `zanr`
  MODIFY `id_zanra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `knjiga`
--
ALTER TABLE `knjiga`
  ADD CONSTRAINT `knjiga_ibfk_1` FOREIGN KEY (`zanr`) REFERENCES `zanr` (`id_zanra`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
