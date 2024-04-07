
#------------------------------------------------------------
#------------------------------------------------------------
                        CODE DE BASE
#------------------------------------------------------------
#------------------------------------------------------------


#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: users
#------------------------------------------------------------

CREATE TABLE users(
        id_user Int  Auto_increment  NOT NULL ,
        name    Varchar (50) NOT NULL ,
        fname   Varchar (50) NOT NULL ,
        email   Varchar (100) NOT NULL ,
        pass    Varchar (255) NOT NULL ,
        phone   Varchar (20) NOT NULL ,
        dob     Date NOT NULL
	,CONSTRAINT users_PK PRIMARY KEY (id_user)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: pots
#------------------------------------------------------------

CREATE TABLE pots(
        id_pots     Int  Auto_increment  NOT NULL ,
        name        Varchar (50) NOT NULL ,
        description Varchar (255) NOT NULL ,
        sum_limit   Float NOT NULL ,
        recipient   Varchar (50) NOT NULL ,
        organizer   Varchar (50) NOT NULL ,
        date_start  Date NOT NULL ,
        date_end    Date NOT NULL ,
        public      Bool NOT NULL ,
        total       Float NOT NULL
	,CONSTRAINT pots_PK PRIMARY KEY (id_pots)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: visitor
#------------------------------------------------------------

CREATE TABLE visitor(
        id_visitor Int  Auto_increment  NOT NULL ,
        name       Varchar (50) NOT NULL
	,CONSTRAINT visitor_PK PRIMARY KEY (id_visitor)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: pot_categories
#------------------------------------------------------------

CREATE TABLE pot_categories(
        id_cat    Int  Auto_increment  NOT NULL ,
        name      Varchar (50) NOT NULL ,
        type_name Varchar (50) NOT NULL
	,CONSTRAINT pot_category_PK PRIMARY KEY (id_cat)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: pot_types
#------------------------------------------------------------

CREATE TABLE pot_types(
        id_typ      Int  Auto_increment  NOT NULL ,
        name        Varchar (50) NOT NULL ,
        description Varchar (50) NOT NULL
	,CONSTRAINT pot_type_PK PRIMARY KEY (id_typ)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: contain
#------------------------------------------------------------

CREATE TABLE contain(
        id_typ  Int NOT NULL ,
        id_pots Int NOT NULL
	,CONSTRAINT contain_PK PRIMARY KEY (id_typ,id_pots)

	,CONSTRAINT contain_pot_type_FK FOREIGN KEY (id_typ) REFERENCES pot_types(id_typ)
	,CONSTRAINT contain_pots0_FK FOREIGN KEY (id_pots) REFERENCES pots(id_pots)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: contribute
#------------------------------------------------------------

CREATE TABLE contribute(
        id_user    Int NOT NULL ,
        id_visitor Int NOT NULL ,
        id_pots    Int NOT NULL ,
        comment    Varchar (50) NOT NULL ,
        date       Date NOT NULL ,
        sum        Float NOT NULL
	,CONSTRAINT contribute_PK PRIMARY KEY (id_user,id_visitor,id_pots)

	,CONSTRAINT contribute_users_FK FOREIGN KEY (id_user) REFERENCES users(id_user)
	,CONSTRAINT contribute_visitor0_FK FOREIGN KEY (id_visitor) REFERENCES visitor(id_visitor)
	,CONSTRAINT contribute_pots1_FK FOREIGN KEY (id_pots) REFERENCES pots(id_pots)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: conceive
#------------------------------------------------------------

CREATE TABLE conceive(
        id_pots Int NOT NULL ,
        id_user Int NOT NULL
	,CONSTRAINT conceive_PK PRIMARY KEY (id_pots,id_user)

	,CONSTRAINT conceive_pots_FK FOREIGN KEY (id_pots) REFERENCES pots(id_pots)
	,CONSTRAINT conceive_users0_FK FOREIGN KEY (id_user) REFERENCES users(id_user)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: include
#------------------------------------------------------------

CREATE TABLE include(
        id_cat Int NOT NULL ,
        id_typ Int NOT NULL
	,CONSTRAINT include_PK PRIMARY KEY (id_cat,id_typ)

	,CONSTRAINT include_pot_category_FK FOREIGN KEY (id_cat) REFERENCES pot_categories(id_cat)
	,CONSTRAINT include_pot_type0_FK FOREIGN KEY (id_typ) REFERENCES pot_types(id_typ)
)ENGINE=InnoDB;

