CREATE DATABASE IF NOT EXISTS bibliotheque;
USE bibliotheque;
CREATE TABLE book(
        isbn      Varchar (50) NOT NULL ,
        title     Varchar (50) NOT NULL ,
        author    Varchar (50) NOT NULL ,
        overview  Varchar (512) NOT NULL ,
        picture   Varchar (50) NOT NULL ,
        viewCount Int NOT NULL
    ,CONSTRAINT book_PK PRIMARY KEY (isbn)
)ENGINE=InnoDB;

INSERT INTO book (ISBN, title, author,overview,picture,viewCount)
 VALUES
('2603025457','Oiseaux en majesté','Markus Varesvuo',"Markus Varesvuo travaille sur les oiseaux européens, tout autant sur les espèces communes que les espèces les plus rares. Spécialiste de l'hiver et de la photographie d'oiseaux en action, c'est un adepte de la lumière naturelle.","",2),
('2840000202','La Tourterelle turque','François Sueur',"Le chant roucoulé de la Tourterelle turque est familier dans nos rues, dans nos jardins et dans nos parcs car c'est un oiseau sédentaire et commun aujourd'hui.","",4),
('2100770756','Python pour le data scientist','Emmanuel Jakobowicz',"Si vous vous intéressez au traitement des données avec le langage Python cet ouvrage s'adresse à vous. Que vous soyez débutant en Python ou que vous ayez une expérience significative, il vous apportera les clés pour utiliser ce langage en data science.","",23),
('2363924339','L’ Intelligence artificielle','Institut EuropIA',"L’Institut EuropIA dans toutes ses conférences, articles ou séminaires met en évidence la nécessité de s’interroger sur l’IA, ses bienfaits, son utilité et s’emploie également à faire entendre sa voix là où l’on pourrait observer des dérives dangereuses.","",34),
('2413007318','Star Wars Infinities - Intégrale','Chris Warner',"Et si Leia était devenue Dark Vador dans Un nouvel espoir ? Et si Han Solo n’était pas parvenu à secourir Luke des plaines gelées de Hoth dans L’Empire contreattaque ?","",100),
('2809489718','Les chroniques de Conan 1989 (I)','Chuck Dixon',"Dans ces récits, Conan le Barbare affronte des guerriers hyperboréens et un vieux magicien. Il est aussi poursuivi parce qu'il possède, sans le savoir, une gemme très précieuse... Vingt-septième tome de l'intégrale de Savage Sword of Conan avec une majorité d'épisodes qui n'avaient pas été publiés en France.","",15);
CREATE TABLE user(
        idUser Int  Auto_increment  NOT NULL ,
        login  Varchar (50) NOT NULL ,
        mdp    Varchar (50) NOT NULL
    ,CONSTRAINT user_PK PRIMARY KEY (idUser)
)ENGINE=InnoDB;

INSERT INTO user (idUser, login, mdp)
 VALUES
 (null,'ornytho123','Zoolove123@'),
 (null,'HeroPasta','PastaSword'),
 (null,'xX_Symfony_Xx','Il0v3W3B@');

CREATE TABLE userLibrary(
        idUserLibrary Int  Auto_increment  NOT NULL ,
        Libelle       Varchar (50) NOT NULL ,
        description   Varchar (50) NOT NULL ,
        idUser        Int NOT NULL
    ,CONSTRAINT userLibrary_PK PRIMARY KEY (idUserLibrary)

    ,CONSTRAINT userLibrary_user_FK FOREIGN KEY (idUser) REFERENCES user(idUser)
)ENGINE=InnoDB;

INSERT INTO userLibrary (idUserLibrary, Libelle, description,idUser)
 VALUES
 (null,"Les animaux c'est trop génial","les animaux c'est vraiment cool",1),
 (null,"BAGARRE","Starwars>ALL",2),
 (null,"travai","GitHub is life",2),
 (null,"CodingBook","Coding is ART",3);

CREATE TABLE contains(
        ISBN          Varchar (50) NOT NULL ,
        idUserLibrary Int NOT NULL
    ,CONSTRAINT contains_PK PRIMARY KEY (ISBN,idUserLibrary)

    ,CONSTRAINT contains_book_FK FOREIGN KEY (ISBN) REFERENCES book(ISBN)
    ,CONSTRAINT contains_userLibrary0_FK FOREIGN KEY (idUserLibrary) REFERENCES userLibrary(idUserLibrary)
)ENGINE=InnoDB;
INSERT INTO contains (ISBN, idUserLibrary)
 VALUES
 ("2603025457",1),
 ("2840000202",1),
 ("2413007318",2),
 ("2809489718",2),
 ("2100770756",3),
 ("2363924339",4),
 ("2100770756",4);



