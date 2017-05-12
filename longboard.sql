-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Client :  localhost
-- Généré le :  Lun 03 Avril 2017 à 09:43
-- Version du serveur :  5.6.35
-- Version de PHP :  7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `longboard`
--

-- --------------------------------------------------------

--
-- Structure de la table `longboards`
--

CREATE TABLE `longboards` (
  `Longueur` text NOT NULL,
  `Largeur` text NOT NULL,
  `Poids` text NOT NULL,
  `Prix` text NOT NULL,
  `Type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `longboards`
--

INSERT INTO `longboards` (`Longueur`, `Largeur`, `Poids`, `Prix`, `Type`) VALUES
('99cm', '22,25cm', '1,5kg', '180€', 'FREESTYLE'),
('99cm', '22,25cm', '1,5Kg', '180€', 'DANCING');