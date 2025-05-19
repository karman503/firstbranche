/*create database universite;*/

create table IF NOT EXISTS module
(
	code_module int primary key,
	nom_module varchar(40),
	coeff_module int,
	volume_module int,
	num_filiere int references filiere(num_filiere)
);

create table IF NOT EXISTS note
(
	num_note int primary key,
	controle_continue float,
	controle_finale float,
	semestre int,
	annee int,
	code_module int references module(code_module),
	numero_etudiant int references etudiant(numero_etudiant)
);

create table IF NOT EXISTS filiere
(
	num_filiere int primary key,
	nom_filiere varchar(40)
);

create table IF NOT EXISTS etudiant
(
 	numero_etudiant int primary key,
	nom_etudiant varchar(80),
	mot_passe_etudiant varchar(80),
	sexe_etudiant varchar(80),
	adresse_etudiant varchar(80),
	niveau_etudiant int,
	num_filiere int  references filiere(num_filiere)
);

create table IF NOT EXISTS enseignant
(
	numero_enseignant int primary key,
	nom_enseignant varchar(80),
	sexe_enseignant varchar(80),
	email_enseignant varchar(80),
	telmobile_enseignant int,
	telfixe_enseignant int,
	adresse_enseignant varchar(80),
	grade_enseignant varchar(80)
);

create table IF NOT EXISTS enseigner
(
	code_module int references module(code_module),
	numero_enseignant int references enseignant(numero_enseignant)
);
/*------------- INSERTION Filiere -----------*/
INSERT INTO filiere values(1,'Biologie & Geologie');
INSERT INTO filiere values(2,'Mathematiques');
INSERT INTO filiere values(3,'Informatique');
INSERT INTO filiere values(4,'Physique & Chimie');
INSERT INTO filiere values(5,'Droit');
/*------------- INSERTION ENSEIGNANTS -----------*/
INSERT INTO ENSEIGNANT values(1,'ABDILLAHI GUELLEH ADEN','MASCULIN','abdillahiguelleh@gmail.com',77111111,21111111,'Djibouti','ENSEIGNANT CHERCHEUR');
INSERT INTO ENSEIGNANT values(2,'MOHAMED YOUSSOUF HASSAN','MASCULIN','mohamedyoussouf@gmail.com',77222222,21222222,'QUARTIER 7','MAITRE DE CONFERENCE');
INSERT INTO ENSEIGNANT values(3,'YACIN MOHAMED CHEHEM','MASCULIN','yacinmohamed@gmail.com',77333333,21333333,'PK12','ENSEIGNANT CHERCHEUR');
INSERT INTO ENSEIGNANT values(4,'KADRA HASSAN DJILAL','FEMININ','kadrahassan@gmail.com',77444444,21444444,'EINGUELLA','ENSEIGNANT CHERCHEUR');
INSERT INTO ENSEIGNANT values(5,'LEILA HASSAN ADEN','FEMININ','leilahassan@gmail.com',77555555,21555555,'QUARTIER 7','MAITRE DE CONFERENCE');
INSERT INTO ENSEIGNANT values(6,'HABIBA MOUSSA ALI','FEMININ','habibamoussa@gmail.com',77666666,21666666,'HODAN','ENSEIGNANT CHERCHEUR');
INSERT INTO ENSEIGNANT values(7,'ASSIA BILAL ALI','FEMININ','assiabilal@gmail.com',77777777,21777777,'PK12','ENSEIGNANT CHERCHEUR');
INSERT INTO ENSEIGNANT values(8,'HASSAN HOUSSEIN ALI','MASCULIN','hassanhoussein@gmail.com',77888888,21888888,'PK12','MAITRE DE CONFERENCE');
/*------------- INSERTION MODULES -----------*/
INSERT INTO MODULE VALUES(11,'ADMINISTRATION DES BASES DE DONNEES',6,60,3);
INSERT INTO MODULE VALUES(22,'ANALYSE POUR INFORMATIQUE',6,48,3);
INSERT INTO MODULE VALUES(33,'BIOLOGIE VEGETAL',4,50,1);
INSERT INTO MODULE VALUES(44,'ANALYSE NOMBRES REELS',5,48,2);
INSERT INTO MODULE VALUES(55,'CHIMIE DES SOLUTIONS',6,60,4);
INSERT INTO MODULE VALUES(66,'RELATIONS INTERNATIONALES',3,48,5);
/*------------- INSERTION ETUDIANTS -----------*/
INSERT INTO etudiant values (3247,'ELMI ABASS ABDALLAH','12AZ','Masculin','QUARTIER 7',1,3);
INSERT INTO etudiant values (3243,'ISMAIL ALI AHMED','HBBZ','Masculin','QUARTIER 3',1,3);
INSERT INTO etudiant values (2045,'SAID ABDALLAH SAID','KLAZ','Masculin','QUARTIER 2',1,1);
INSERT INTO etudiant values (1619,'MOUHOUMED ADEN ALI','QWXZ','Masculin','QUARTIER 7',2,2);
INSERT INTO etudiant values (2837,'ABDICHAKOUR HASSAN ABDI','HOOPZ','Masculin','PK12',2,4);
INSERT INTO etudiant values (9101,'OSMAN FARAH HASSAAN','128Z','Masculin','CHEICK MOUSSA',2,5);
INSERT INTO etudiant values (1624,'ASMA AHMED SAAD','12KLZ','Masculin','QUARTIER 7',3,4);
INSERT INTO etudiant values (0395,'ABDI MOHAMED  ABDI','12BZ','Masculin','QUARTIER 5',3,1);
INSERT INTO etudiant values (3044,'KHALID ABDALLAH ELMI','1290','Masculin','QUARTIER 1',3,3);
/*---------- NOTES ------------*/
INSERT INTO NOTE VALUES (21,14.5,16,3,2020,11,3247);
INSERT INTO NOTE VALUES (22,16,17,3,2021,22,3243);
INSERT INTO NOTE VALUES (23,16,11,3,2022,33,2045);
INSERT INTO NOTE VALUES (24,12.5,18,3,2020,44,1619);
INSERT INTO NOTE VALUES (25,11,19,4,2022,55,2837);
INSERT INTO NOTE VALUES (26,15.5,13,2,2019,66,9101);
INSERT INTO NOTE VALUES (27,14.5,16,3,2020,22,3247);
INSERT INTO NOTE VALUES (28,16,17,3,2021,11,3243);
INSERT INTO NOTE VALUES (29,17,14,3,2021,33,2045);
/*--------- ENSEIGNER ----------*/
INSERT INTO ENSEIGNER values(11,3);
INSERT INTO ENSEIGNER values(22,1);
INSERT INTO ENSEIGNER values(33,2);
INSERT INTO ENSEIGNER values(44,5);
INSERT INTO ENSEIGNER values(55,6);
INSERT INTO ENSEIGNER values(66,4);
INSERT INTO ENSEIGNER values(11,7);
