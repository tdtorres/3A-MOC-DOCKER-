CREATE TABLE book(
        ISBN      Varchar (50) NOT NULL ,
        title     Varchar (50) NOT NULL ,
        author    Varchar (50) NOT NULL ,
        overview  Varchar (50) NOT NULL ,
        picture   Varchar (50) NOT NULL ,
        viewCount Int NOT NULL
    ,CONSTRAINT book_PK PRIMARY KEY (ISBN)
)ENGINE=InnoDB;

CREATE TABLE user(
        idUser Int  Auto_increment  NOT NULL ,
        login  Varchar (50) NOT NULL ,
        mdp    Varchar (50) NOT NULL
    ,CONSTRAINT user_PK PRIMARY KEY (idUser)
)ENGINE=InnoDB;

CREATE TABLE userLibrary(
        idUserLibrary Int  Auto_increment  NOT NULL ,
        Libelle       Varchar (50) NOT NULL ,
        description   Varchar (50) NOT NULL ,
        idUser        Int NOT NULL
    ,CONSTRAINT userLibrary_PK PRIMARY KEY (idUserLibrary)

    ,CONSTRAINT userLibrary_user_FK FOREIGN KEY (idUser) REFERENCES user(idUser)
)ENGINE=InnoDB;

CREATE TABLE contains(
        ISBN          Varchar (50) NOT NULL ,
        idUserLibrary Int NOT NULL
    ,CONSTRAINT contains_PK PRIMARY KEY (ISBN,idUserLibrary)

    ,CONSTRAINT contains_book_FK FOREIGN KEY (ISBN) REFERENCES book(ISBN)
    ,CONSTRAINT contains_userLibrary0_FK FOREIGN KEY (idUserLibrary) REFERENCES userLibrary(idUserLibrary)
)ENGINE=InnoDB;