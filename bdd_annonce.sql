-- Création d'un utilisateur
-- Pas obligatoire
-- --------------------------------------------------------
CREATE DATABASE IF NOT EXISTS `bdd_projet_annonce` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
use `bdd_projet_annonce`;

CREATE USER IF NOT EXISTS 'u_annonce'@'localhost' IDENTIFIED BY 'SJzEeqLb2HHeNYVV';
GRANT USAGE ON * . * TO 'u_annonce'@'localhost' IDENTIFIED BY 'SJzEeqLb2HHeNYVV' WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0 ;
GRANT ALL PRIVILEGES ON `bdd_projet_annonce` . * TO 'u_annonce'@'localhost';
-- 
-- -------------------------------------------------------- 

-- Structure de la table T_Energie
CREATE TABLE IF NOT EXISTS `T_Energie`
(
    E_id_engie int PRIMARY KEY NOT NULL AUTO_INCREMENT,
    E_description text(500) default NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- Structure de la table T_typeMaison
CREATE TABLE IF NOT EXISTS `T_typeMaison`
(
    T_type ENUM('T1','T2','T3','T4','T5','T6') PRIMARY KEY NOT NULL, 
    T_description text(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


-- Structure de la table T_utilisateur
CREATE TABLE IF NOT EXISTS `T_utilisateur`
(
    U_mail varchar(40) PRIMARY KEY NOT NULL,
    U_mdp varchar(25) NOT NULL,
    U_pseudo varchar(25) NOT NULL,
    U_nom varchar(25) NOT NULL,
    U_prenom varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


-- Structure de la table T_annonce
CREATE TABLE IF NOT EXISTS `T_annonce`
(
    A_idannonce int PRIMARY KEY NOT NULL AUTO_INCREMENT,
    A_datePost DATETIME NOT NULL,
    A_etat ENUM('en cours','publiée','archivée'),
    A_titre varchar(50) NOT NULL,
    A_cout_loyer numeric(7,2) NOT NULL,
    A_cout_charges numeric(5,2) NOT NULL,
    A_type_chauffage ENUM('collectif','individuel'),
    A_superficie int NOT NULL,
    A_description text(1000) NOT NULL,
    A_adresse varchar(255) NOT NULL,
    A_ville varchar(255) NOT NULL,
    A_CP int(5) NOT NULL,
    T_type ENUM('T1','T2','T3','T4','T5','T6'),
    E_id_engie int,
    CONSTRAINT FK_ANNONCE_MAISON FOREIGN KEY (T_type) REFERENCES T_typeMaison(T_type),
    CONSTRAINT FK_ANNONCE_ENERGIE FOREIGN KEY (E_id_engie) REFERENCES T_Energie(E_id_engie)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- Structure de la table T_photo
CREATE TABLE IF NOT EXISTS `T_photo`
(
    P_idphoto int PRIMARY KEY NOT NULL AUTO_INCREMENT,
    P_titre varchar(50) NOT NULL,
    P_nom varchar(25) NOT NULL,
    A_idannonce int,
    CONSTRAINT FK_PHOTO_ANNONCE FOREIGN KEY (A_idannonce) REFERENCES T_annonce(A_idannonce)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- Structure de la table T_message
CREATE TABLE IF NOT EXISTS `T_message`
(
    M_dateheure_message DATETIME NOT NULL,
    M_texte_message text(500) NOT NULL,
    idannonce int NOT NULL,
    U_mail varchar(40) NOT NULL,
    CONSTRAINT PK_MSG PRIMARY KEY (idannonce, U_mail),
    CONSTRAINT FK_MSG_ANNONCE FOREIGN KEY (idannonce) REFERENCES T_annonce(A_idannonce),
    CONSTRAINT FK_MSG_UTI FOREIGN KEY (U_mail) REFERENCES T_utilisateur(U_mail)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
