-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 11 Janvier 2019 à 10:16
-- Version du serveur :  10.1.8-MariaDB
-- Version de PHP :  5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `snowboard`
--

-- --------------------------------------------------------

--
-- Structure de la table `chatbot`
--

CREATE TABLE `chatbot` (
  `Longueur` text NOT NULL,
  `Largeur` text NOT NULL,
  `Poids` text NOT NULL,
  `Prix` text NOT NULL,
  `Type` text NOT NULL,
  `Rep1` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Rep2` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Rep3` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `chatbot`
--

INSERT INTO `chatbot` (`Longueur`, `Largeur`, `Poids`, `Prix`, `Type`, `Rep1`, `Rep2`, `Rep3`) VALUES
('100', '30', '3', '140', 'SLALOM', 'Bonjour', 'Que puis-je faire pour vous ?', 'Pour tout renseignement, contactez notre service client'),
('110', '30', '2', '160', 'FREESTYLE', 'Bonjour', 'Que puis-je faire pour vous ?', 'Pour tout renseignement, contactez notre service client'),
('115', '27', '2', '180', 'DANCING', 'Bonjour', 'Que puis-je faire pour vous ?', 'Pour tout renseignement, contactez notre service client'),
('120', '25', '3', '200', 'SLIDE', 'Bonjour', 'Que puis-je faire pour vous ?', 'Pour tout renseignement, contactez notre service client'),
('122', '23', '3', '220', 'CRUISING', 'Bonjour', 'Que puis-je faire pour vous ?', 'Pour tout renseignement, contactez notre service client');

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE `commentaires` (
  `id` int(11) NOT NULL,
  `id_fiche` int(11) NOT NULL,
  `pseudo` varchar(255) COLLATE utf8_bin NOT NULL,
  `commentaire` text COLLATE utf8_bin NOT NULL,
  `date_commentaire` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `id_fiche`, `pseudo`, `commentaire`, `date_commentaire`) VALUES
(77, 2, 'Skater_26', 'Super planche nestblock ! Je vous la recommande vivement !\r\n			', '2019-01-06 12:57:12'),
(78, 2, 'Bob13', 'Bonjour, allez-vous recevoir d''autres coloris ?\r\n			', '2019-01-06 12:57:54'),
(79, 1, 'Kiara12', 'Une planche gÃ©nial : la LOADED TAN TIEN', '2019-01-06 12:58:59'),
(0, 3, 'ee', '				Votre commentaire ici.\r\n			ee', '2019-01-10 12:30:33'),
(0, 3, 'ee', '				Votre commentaire ici.\r\n			ee', '2019-01-10 12:30:33'),
(0, 3, 'jose', '				Votre commeeentaire ici.\r\n			', '2019-01-10 12:32:01'),
(0, 3, 'jose', '				Votre commeeentaire ici.\r\n			', '2019-01-10 12:32:01');

-- --------------------------------------------------------

--
-- Structure de la table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `nom` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `contacts`
--

INSERT INTO `contacts` (`id`, `nom`, `email`, `message`) VALUES
(0, 'eee', 'eee@text.com', '			eee');

-- --------------------------------------------------------

--
-- Structure de la table `longboards`
--

CREATE TABLE `longboards` (
  `id` int(11) NOT NULL,
  `Nom` text NOT NULL,
  `Longueur` text NOT NULL,
  `Largeur` text NOT NULL,
  `Poids` text NOT NULL,
  `Prix` text NOT NULL,
  `Type` text NOT NULL,
  `imageproduit` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `longboards`
--

INSERT INTO `longboards` (`id`, `Nom`, `Longueur`, `Largeur`, `Poids`, `Prix`, `Type`, `imageproduit`) VALUES
(1, 'Sector 9 Rise and Fall', '99cm', '22.25cm', '1,5Kg', '180€', 'FREESTYLE', './images/produit/longboards/00000001.jpg'),
(2, 'Loaded Tan Tien', '99cm', '22,25cm', '1,5kg', '180€', 'FREESTYLE', './images/produit/longboards/00000002.jpg'),
(3, 'Cosmo Cosmic Dancer', '99cm', '22,25cm', '1,5Kg', '180€', 'DANCING', './images/produit/longboards/00000003.jpg'),
(4, 'Fw Nest Block', '99cm', '22,25cm', '1,5Kg', '180€', 'DANCING', './images/produit/longboards/00000004.jpg'),
(5, 'Fw Nest Block', '99cm', '22,25cm', '1,5Kg', '180€', 'DANCING', './images/produit/longboards/00000004.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `marques`
--

CREATE TABLE `marques` (
  `id` int(11) NOT NULL,
  `nom` text NOT NULL,
  `logo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `marques`
--

INSERT INTO `marques` (`id`, `nom`, `logo`) VALUES
(1, 'ARBOR', './images/logo/arbor.jpg'),
(2, 'FLYING', './images/logo/flying.jpg'),
(3, 'MADRID', './images/logo/madrid.jpg'),
(4, 'MIND', './images/logo/mind.jpg'),
(5, 'SECTOR', './images/logo/sector.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE `membre` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `mot_de_passe` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `online`
--

CREATE TABLE `online` (
  `id` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `user_ip` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `online`
--

INSERT INTO `online` (`id`, `time`, `user_ip`) VALUES
(1, 1546679757, '11588');

-- --------------------------------------------------------

--
-- Structure de la table `reponses`
--

CREATE TABLE `reponses` (
  `id` int(11) NOT NULL,
  `reponse` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `reponses`
--

INSERT INTO `reponses` (`id`, `reponse`) VALUES
(226, 'Merci '),
(227, '			Merci'),
(228, 'La semaine prochaine !'),
(0, '			edd');

-- --------------------------------------------------------

--
-- Structure de la table `roues`
--

CREATE TABLE `roues` (
  `id` int(11) NOT NULL,
  `nom` text NOT NULL,
  `size` text NOT NULL,
  `description` text NOT NULL,
  `prix` text NOT NULL,
  `imageproduit` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `roues`
--

INSERT INTO `roues` (`id`, `nom`, `size`, `description`, `prix`, `imageproduit`) VALUES
(1, 'Sector 9 Skiddles', '70mm', 'The Sector 9 Skiddles are the first sideset freeride wheels from Sector 9 and they sure are tasty. Coming with both rounded inner and outer edges, the Skiddles are sure to have extremely predictable release and hookup. With their sideset core they have a really forgiving release from traction, making your freeriding easier than ever. And they come in 5 delicious colors as well. With the all new Skiddles formula, these wheels are sure to paint your roads with thane lines. The Sector 9 Skiddles are sure to shred the thanebow.', '50€', './images/produit/roues/00000001.jpg'),
(2, 'SRAD Release', '72mm', 'The R.A.D. Release wheels are designed to let you release your inner freeriding beast. James Kelly and Louis Pilloni, the founders of R.A.D. Wheels are monsters on the hills. If you haven''t seen any of their freeriding videos then do yourself a favor and go watch some. The R.A.D. Release wheels have a big crown core that creates a dense hold around your bearing. This gives you an overall higher roll speed and smoother slides. They are a center-set, stone-ground, and round-lipped wheel that get better and better as you wear into the different layers of urethane. The 78a option has a lot of grip so they will really perform best when freeriding at higher speeds, otherwise they do have a tendency to grip up rather quick. The 80a option is great for mild speeds and will last a little bit longer than the 78a''s. These wheels are truly an amazing wheel and are definitely taking the longboarding world by storm.', '56€', './images/produit/roues/00000002.jpg'),
(3, 'Orangatang Keanu', '660mm', 'The Keanu is the baby brother of Orangatang''s new center set freeride wheel. Being a 66mm wheel, this is perfect to setup on your top-mount boards as well as those boards that are prone to wheel bite. The supportive core in this wheel not only supports the urethane giving you smoother slides, but also gives it an awesome roll speed. Teaming up with its 66mm size makes this wheel perfect for throwing on your little cruiser setup. There’s no way you could go wrong with the Keanu. The smaller size makes 360 stand-up slides and quick slides easier than ever.', '50€', './images/produit/roues/00000003.jpg'),
(4, 'Orangatang Kilmer', '69mm', 'The Kilmer is the middle child in Orangatangs new lineup of the ultimate freeride wheel. Coming in at 69mm it''s the most versatile of the wheels that could be setup on most boards. This center set wheel is the perfect combination of acceleration and roll speed. Having a supportive core gives the Kilmer an even better roll speed as well as making your slides a lot smoother and thus less high siding and falling off. This will put your standie game to a whole new level. What says freeride wheel more than being fast, being center set, and being made out of the awesome Orangatang thane? This wheel is definitely taking over our setups and we couldn''t be happier.', '54€', './images/produit/roues/00000004.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `stock`
--

CREATE TABLE `stock` (
  `id` int(11) NOT NULL,
  `code` char(10) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `quantite` int(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `stock`
--

INSERT INTO `stock` (`id`, `code`, `nom`, `quantite`, `date`) VALUES
(1, '11', 'qt1', 980, '2018-12-12 12:41:08');

-- --------------------------------------------------------

--
-- Structure de la table `trucks`
--

CREATE TABLE `trucks` (
  `id` int(11) NOT NULL,
  `nom` text NOT NULL,
  `longboard` text NOT NULL,
  `angle` text NOT NULL,
  `couleur` text NOT NULL,
  `description` text NOT NULL,
  `prix` text NOT NULL,
  `imageproduit` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `trucks`
--

INSERT INTO `trucks` (`id`, `nom`, `longboard`, `angle`, `couleur`, `description`, `prix`, `imageproduit`) VALUES
(1, 'Paris Savant', '180mm', '50 Degree', 'Red', 'The long awaited, highly anticipated Paris Savants are finally here. Paris trucks has always been a name you can trust, and now they come in a forged truck! What’s a forged truck? It''s a block of aluminum, pressed to precision dimensions. What does that mean for your riding? It gives you the perfect dimensions and pinpoint responsiveness of a precision truck, with stronger construction, all at half of the cost. What’s not to love about that?These trucks come in at 180mm, with a 50 degree baseplate, giving you the perfect combination of stability and maneuverability. The amazing thing about Paris trucks is their incredible lean with a responsive turn. It''s a "best of both worlds" kind of longboarding truck. With a bushing insert plug in the center of these Savants, they have even more lean than you can imagine. Overall, the Paris Savants are perfect for those looking to go fast, race, freeride, slide, and cruise around, all with a ton of stability.', '150€', './images/produit/trucks/00000001.jpg'),
(2, 'Bear Grizzly 852''s', '180mm', '52 Degree', 'Comic Print', 'Bear Grizzly 852 trucks are one of the most versatile trucks on the market. Due to the shape of the truck’s hanger you can flip it over to adjust the performance of your truck. If you flip it the truck will have a lower turning radius and be much more stable for downhill and higher-speed shredding. If you keep it standard the truck remains very turny and responsive. Bear Grizzly 852 trucks are essentially a great option for almost any setup out there. We like to run these trucks on boards with big cutouts and wheel wells so that we can put large wheels on our boards and still get a lot of turning!', '60€', './images/produit/trucks/00000002.jpg'),
(3, 'Bear Grizzly 852''s', '180mm', '52 Degree', 'Black', 'Bear Grizzly 852 trucks are one of the most versatile trucks on the market. Due to the shape of the truck’s hanger you can flip it over to adjust the performance of your truck. If you flip it the truck will have a lower turning radius and be much more stable for downhill and higher-speed shredding. If you keep it standard the truck remains very turny and responsive. Bear Grizzly 852 trucks are essentially a great option for almost any setup out there. We like to run these trucks on boards with big cutouts and wheel wells so that we can put large wheels on our boards and still get a lot of turning!', '50€', './images/produit/trucks/00000003.jpg'),
(4, 'Paris', '180mm', '50 Degree', 'Silver V2 ', 'Paris Trucks are super solid and are an easy option for a rider looking for a “go anywhere and do anything” truck. They have a couple upgrades from the original Paris Trucks that everyone loves. They have a stronger hanger that is less prone to bending. More kingpin clearance in the bushing seat, allowing riders to carve more with much more ease and fluidity. They also have a new branded grade 8 kingpin to up the strength and steez factor. And to top it off they are now using a higher quality pivot cup for longer life and a smoother turn. You just can’t go wrong with the glory that is PARIS TRUCKS!', '50€', './images/produit/trucks/00000004.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `id_longboard` int(11) NOT NULL,
  `nom_publieur` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `videos`
--

INSERT INTO `videos` (`id`, `id_longboard`, `nom_publieur`, `description`, `url`) VALUES
(3, 1, 'Philadephia Demo', 'Démonstration', 'https://www.youtube.com/embed/a7JAFhVaafg'),
(4, 1, 'Marouane', 'Démonstration', 'videos/videoplayback.webm');

-- --------------------------------------------------------

--
-- Structure de la table `vues`
--

CREATE TABLE `vues` (
  `idproduit` int(255) NOT NULL,
  `nbreVue` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
