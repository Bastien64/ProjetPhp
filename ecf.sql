

CREATE TABLE `boutique` (
  `id` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `ville` int NOT NULL,
  `adresseboutique` varchar(200) NOT NULL,
  `mailresponsable` varchar(250) NOT NULL,
  `envoyeremail` int NOT NULL,
  `fleurspeciale` int NOT NULL
  FOREIGN KEY (`envoyeremail`) REFERENCES `envoyerdesemails` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`fleurspeciale`) REFERENCES `fleurspecial` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
   FOREIGN KEY (`ville`) REFERENCES `franchise` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
) 

INSERT INTO `boutique` (`id`, `ville`, `adresseboutique`, `mailresponsable`, `envoyeremail`, `fleurspeciale`) VALUES
(53, 58, '03 rue de Framboise', 'bob@gmail.com', 1, 2);



CREATE TABLE `envoyerdesemails` (
  `id` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `typededroit` varchar(200) NOT NULL,
  `description` text NOT NULL
) ;


INSERT INTO `envoyerdesemails` (`id`, `typededroit`, `description`) VALUES
(1, 'Classique', 'L\'utilisateur peut envoyer 500 emails'),
(2, 'Prenium', 'L\'utilisateur peut envoyer 2000 emails.');



CREATE TABLE `fleurspecial` (
  `id` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `typededroit` varchar(50) NOT NULL,
  `description` text NOT NULL
);


INSERT INTO `fleurspecial` (`id`, `typededroit`, `description`) VALUES
(1, 'Toutes fleurs', 'La boutique peut avoir toutes les fleurs disponibles.'),
(2, 'Fleur d\'importation', 'Les fleurs d\'importation sont interdites');


CREATE TABLE `franchise` (
  `id` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `ville` varchar(100) NOT NULL,
  `statut` text NOT NULL,
  `utilisateur` int NOT NULL,
  FOREIGN KEY (`utilisateur`) REFERENCES `utilisateur` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;
);


INSERT INTO `franchise` (`id`, `ville`, `statut`, `utilisateur`) VALUES
(58, 'Aix', 'Close', 6),
(60, 'Oloron', 'Close', 6),
(62, 'Paris', 'Close', 6),
(63, 'Ajax', 'Close', 6),
(64, 'Florensac', 'Open', 6),
(65, 'Pinet', 'Open', 6);

CREATE TABLE `typededroit` (
  `id` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `type` varchar(250) NOT NULL,
  `description` text NOT NULL,
) ;


INSERT INTO `typededroit` (`id`, `type`, `description`) VALUES
(1, 'admin', 'Administrateur peut travailler sur tout le site'),
(2, 'boutique', 'boutique ne peut faire d\'une lecture seule');

-- --------------------------------------------------------



CREATE TABLE `utilisateur` (
  `id` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nom_utilisateur` varchar(250) NOT NULL,
  `mot_de_passe` varchar(250) NOT NULL,
  `histoire` varchar(250) NOT NULL,
  `droit` int NOT NULL,
  `email` varchar(250) NOT NULL,
  FOREIGN KEY (`droit`) REFERENCES `typededroit` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ;


INSERT INTO `utilisateur` (`id`, `nom_utilisateur`, `mot_de_passe`, `histoire`, `droit`, `email`) VALUES
(6, 'Bastien', 'qazwsx', 'Admin ', 1, 'bastienvillegas@gmail.com');

