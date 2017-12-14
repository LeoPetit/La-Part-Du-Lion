DROP TABLE IF EXISTS pointEquipe, coordonnees, quartier, competenceEquipe, competence, inventaire, mapItem, effetItem, effet, item, utilisateur, equipe;

CREATE TABLE equipe (
  id         INT NOT NULL AUTO_INCREMENT,
  nom        VARCHAR(25),
  descriptif TEXT,
  couleur    VARCHAR(25),


  PRIMARY KEY (id)
);

INSERT INTO equipe VALUES (default, 'Technomancien', 'Des trucs', '#36003A');
INSERT INTO equipe VALUES (default, 'Vosge', 'Des machins', '#88035C');
INSERT INTO equipe VALUES (default, 'Jaures', 'Des bidules', '#02A6B5');
INSERT INTO equipe VALUES (default, 'Miotte', 'Des bidules', '#067E00');
INSERT INTO equipe VALUES (default, 'VieilleVille', 'Des bidules', '#D07700');
INSERT INTO equipe VALUES (default, 'CentreVille', 'Des bidules', '#012943');
INSERT INTO equipe VALUES (default, 'Residence', 'Des bidules', '#A20010');

CREATE TABLE utilisateur (
  id          INT NOT NULL AUTO_INCREMENT,
  pseudo      VARCHAR(25),
  mdp         VARCHAR(25),
  email       VARCHAR(25),
  gold        INT,
  pointAction   INT,
  equipe_id   INT,

  PRIMARY KEY (id),

  CONSTRAINT fk_equipe_id_utilisateur FOREIGN KEY (equipe_id) REFERENCES equipe (id)
);

INSERT INTO utilisateur VALUES (default, 'Leo', '0000', 'test@gmail.com',  150, 10, 1);
INSERT INTO utilisateur VALUES (default, 'Jeremy', '1111', 'test1@gmail.com', 1550, 10, 2);
INSERT INTO utilisateur VALUES (default, 'Melvin', '2222', 'test2@gmail.com',  180, 10, 3);

CREATE TABLE item (
  id            INT NOT NULL AUTO_INCREMENT,
  nom           VARCHAR(25),
  coutAchat     INT,
  coutRessource INT,
  libelle VARCHAR(50),

  PRIMARY KEY (id)
);

INSERT INTO item VALUES(default, 'Piege classique', 60, 1, '+2PC, +60G / -1 PA');
INSERT INTO item VALUES(default, 'Piege etrange', 20, 2, '+20 G');

CREATE TABLE effet (
  id      INT NOT NULL AUTO_INCREMENT,
  libelle TEXT,
  valeur  INT,
  element VARCHAR(25),
  cible   VARCHAR(25),


  PRIMARY KEY (id)
);

INSERT INTO effet VALUE (default, '-1 PA', -1, 'Ressource', 'cible');
INSERT INTO effet VALUE (default, '+2 PC', 2, 'Classement', 'joueur');
INSERT INTO effet VALUE (default, '+60 G', 60, 'Gold', 'joueur');
INSERT INTO effet VALUE (default, '+20 G', 20, 'Gold', 'joueur');

CREATE TABLE effetItem (
  id       INT NOT NULL AUTO_INCREMENT,
  item_id  INT,
  effet_id INT,

  PRIMARY KEY (id),

  CONSTRAINT fk_effetItem_id_item FOREIGN KEY (item_id) REFERENCES item (id),
  CONSTRAINT fk_effetItem_id_effet FOREIGN KEY (effet_id) REFERENCES effet (id)
);

INSERT INTO effetItem VALUES (default, 1,1);
INSERT INTO effetItem VALUES (default, 1,2);
INSERT INTO effetItem VALUES (default, 1,3);
INSERT INTO effetItem VALUES (default, 2,4);

CREATE TABLE mapItem (
  id      INT NOT NULL AUTO_INCREMENT,
  item_id INT,
  lat     DOUBLE(8, 6),
  longi   DOUBLE(7, 6),
  duree   INT,

  PRIMARY KEY (id),

  CONSTRAINT fk_map_id_item FOREIGN KEY (item_id) REFERENCES item (id)
);

CREATE TABLE inventaire (
  id      INT NOT NULL AUTO_INCREMENT,
  user_id INT,
  item_id INT,

  PRIMARY KEY (id),

  CONSTRAINT fk_user_id_inventaire FOREIGN KEY (user_id) REFERENCES utilisateur (id),
  CONSTRAINT fk_item_id_inventaire FOREIGN KEY (item_id) REFERENCES item (id)
);

INSERT INTO inventaire VALUES(default, 1, 1);
INSERT INTO inventaire VALUES(default, 1, 1);
INSERT INTO inventaire VALUES(default, 1, 1);
INSERT INTO inventaire VALUES(default, 1, 2);
INSERT INTO inventaire VALUES(default, 2, 1);

CREATE TABLE competence (
  id        INT AUTO_INCREMENT NOT NULL,
  nom       VARCHAR(25),
  coutTotal INT,
  coutPaye  INT,

  PRIMARY KEY (id)
);

CREATE TABLE competenceEquipe (
  id            INT AUTO_INCREMENT NOT NULL,
  equipe_id     INT,
  competence_id INT,

  PRIMARY KEY (id),

  CONSTRAINT fk_equipe_id_competenceEquipe FOREIGN KEY (equipe_id) REFERENCES equipe (id),
  CONSTRAINT fk_competence_id_competenceEquipe FOREIGN KEY (competence_id) REFERENCES competence (id)
);

CREATE TABLE quartier (
  id        INT NOT NULL AUTO_INCREMENT,
  nom       VARCHAR(25),
  QG        BOOLEAN,
  revenus   INT,
  equipe_id INT,

  PRIMARY KEY (id),

  CONSTRAINT fk_equipe_id_quartier FOREIGN KEY (equipe_id) REFERENCES equipe (id)
);

/*Technomancien*/
INSERT INTO quartier VALUES (default, 'Technomancien1', FALSE, 10, 1);
INSERT INTO quartier VALUES (default, 'Technomancien2', FALSE, 10, 1);
INSERT INTO quartier VALUES (default, 'Technomancien3', TRUE, 10, 1);
INSERT INTO quartier VALUES (default, 'Technomancien4', FALSE, 10, 1);
INSERT INTO quartier VALUES (default, 'Technomancien5', FALSE, 10, 1);
INSERT INTO quartier VALUES (default, 'Technomancien6', FALSE, 10, 1);

/*Vosge*/
INSERT INTO quartier VALUES (default, 'Vosge1', FALSE, 10, 2);
INSERT INTO quartier VALUES (default, 'Vosge2', FALSE, 10, 2);
INSERT INTO quartier VALUES (default, 'Vosge3', TRUE, 10, 2);
INSERT INTO quartier VALUES (default, 'Vosge4', FALSE, 10, 2);
INSERT INTO quartier VALUES (default, 'Vosge5', FALSE, 10, 2);

/*Jaures*/
INSERT INTO quartier VALUES (default, 'Jaures1', FALSE, 10, 3);
INSERT INTO quartier VALUES (default, 'Jaures2', FALSE, 10, 3);
INSERT INTO quartier VALUES (default, 'Jaures3', TRUE, 10, 3);
INSERT INTO quartier VALUES (default, 'Jaures4', FALSE, 10, 3);
INSERT INTO quartier VALUES (default, 'Jaures5', FALSE, 10, 3);
INSERT INTO quartier VALUES (default, 'Jaures6', FALSE, 10, 3);

/*Miotte*/
INSERT INTO quartier VALUES (default, 'Miotte1', FALSE, 10, 4);
INSERT INTO quartier VALUES (default, 'Miotte2', FALSE, 10, 4);
INSERT INTO quartier VALUES (default, 'Miotte3', TRUE, 10, 4);
INSERT INTO quartier VALUES (default, 'Miotte4', FALSE, 10, 4);
INSERT INTO quartier VALUES (default, 'Miotte5', FALSE, 10, 4);

/*Vieille ville*/
INSERT INTO quartier VALUES (default, 'VieilleVille1', FALSE, 10, 5);
INSERT INTO quartier VALUES (default, 'VieilleVille2', FALSE, 10, 5);
INSERT INTO quartier VALUES (default, 'VieilleVille3', FALSE, 10, 5);
INSERT INTO quartier VALUES (default, 'VieilleVille4', FALSE, 10, 5);
INSERT INTO quartier VALUES (default, 'VieilleVille5', FALSE, 10, 5);

/*Centre ville*/
INSERT INTO quartier VALUES (default, 'CentreVille1', FALSE, 10, 6);
INSERT INTO quartier VALUES (default, 'CentreVille2', FALSE, 10, 6);
INSERT INTO quartier VALUES (default, 'CentreVille3', FALSE, 10, 6);
INSERT INTO quartier VALUES (default, 'CentreVille4', FALSE, 10, 6);
INSERT INTO quartier VALUES (default, 'CentreVille5', FALSE, 10, 6);

/*Residence*/
INSERT INTO quartier VALUES (default, 'Residence1', FALSE, 10, 7);
INSERT INTO quartier VALUES (default, 'residence2', FALSE, 10, 7);
INSERT INTO quartier VALUES (default, 'Residence3', FALSE, 10, 7);
INSERT INTO quartier VALUES (default, 'Residence4', FALSE, 10, 7);

CREATE TABLE coordonnees (
  id          INT NOT NULL AUTO_INCREMENT,
  lat         DOUBLE(8, 6),
  longi       DOUBLE(7, 6),

  quartier_id INT,

  PRIMARY KEY (id),

  CONSTRAINT fk_quartier_id_coordonnees FOREIGN KEY (quartier_id) REFERENCES quartier (id)
);

/*TECHNOMANCIEN*/
#Quartier 1
INSERT INTO coordonnees VALUES (default, 47.646239, 6.818084, 1);
INSERT INTO coordonnees VALUES (default, 47.647182, 6.824770, 1);
INSERT INTO coordonnees VALUES (default, 47.645348, 6.828197, 1);
INSERT INTO coordonnees VALUES (default, 47.641843, 6.827979, 1);
INSERT INTO coordonnees VALUES (default, 47.640323, 6.831121, 1);
INSERT INTO coordonnees VALUES (default, 47.646907, 6.833193, 1);
INSERT INTO coordonnees VALUES (default, 47.651733, 6.825826, 1);
INSERT INTO coordonnees VALUES (default, 47.650075, 6.821675, 1);
INSERT INTO coordonnees VALUES (default, 47.646239, 6.818084, 1);
#Quartier 2
INSERT INTO coordonnees VALUES (default, 47.640323, 6.831121, 2);
INSERT INTO coordonnees VALUES (default, 47.646907, 6.833193, 2);
INSERT INTO coordonnees VALUES (default, 47.652596, 6.836780, 2);
INSERT INTO coordonnees VALUES (default, 47.647021, 6.839655, 2);
INSERT INTO coordonnees VALUES (default, 47.641268, 6.841759, 2);
INSERT INTO coordonnees VALUES (default, 47.639374, 6.832471, 2);
INSERT INTO coordonnees VALUES (default, 47.640323, 6.831121, 2);
#Quartier 3
INSERT INTO coordonnees VALUES (default, 47.639374, 6.832471, 3);
INSERT INTO coordonnees VALUES (default, 47.641268, 6.841759, 3);
INSERT INTO coordonnees VALUES (default, 47.640519, 6.841999, 3);
INSERT INTO coordonnees VALUES (default, 47.636957, 6.842716, 3);
INSERT INTO coordonnees VALUES (default, 47.635987, 6.835030, 3);
INSERT INTO coordonnees VALUES (default, 47.639374, 6.832471, 3);
#Quartier 4
INSERT INTO coordonnees VALUES (default, 47.636957, 6.842716, 4);
INSERT INTO coordonnees VALUES (default, 47.640519, 6.841999, 4);
INSERT INTO coordonnees VALUES (default, 47.641022, 6.849813, 4);
INSERT INTO coordonnees VALUES (default, 47.638297, 6.851494, 4);
INSERT INTO coordonnees VALUES (default, 47.635416, 6.852630, 4);
INSERT INTO coordonnees VALUES (default, 47.634774, 6.851097, 4);
INSERT INTO coordonnees VALUES (default, 47.637044, 6.844263, 4);
INSERT INTO coordonnees VALUES (default, 47.636948, 6.842731, 4);
INSERT INTO coordonnees VALUES (default, 47.636957, 6.842716, 4);
#Quartier 5
INSERT INTO coordonnees VALUES (default, 47.640519, 6.841999, 5);
INSERT INTO coordonnees VALUES (default, 47.641022, 6.849813, 5);
INSERT INTO coordonnees VALUES (default, 47.645567, 6.847317, 5);
INSERT INTO coordonnees VALUES (default, 47.648009, 6.846030, 5);
INSERT INTO coordonnees VALUES (default, 47.647021, 6.839655, 5);
INSERT INTO coordonnees VALUES (default, 47.641268, 6.841759, 5);
INSERT INTO coordonnees VALUES (default, 47.640519, 6.841999, 5);
#Quartier 6
INSERT INTO coordonnees VALUES (default, 47.648009, 6.846030, 6);
INSERT INTO coordonnees VALUES (default, 47.647021, 6.839655, 6);
INSERT INTO coordonnees VALUES (default, 47.652596, 6.836780, 6);
INSERT INTO coordonnees VALUES (default, 47.654016, 6.837638, 6);
INSERT INTO coordonnees VALUES (default, 47.655295, 6.842595, 6);
INSERT INTO coordonnees VALUES (default, 47.648009, 6.846030, 6);

/*VOSGE*/
#Quartier 1
INSERT INTO coordonnees VALUES (default, 47.654016, 6.837638, 7);
INSERT INTO coordonnees VALUES (default, 47.655295, 6.842595, 7);
INSERT INTO coordonnees VALUES (default, 47.654558, 6.844930, 7);
INSERT INTO coordonnees VALUES (default, 47.654471, 6.848245, 7);
INSERT INTO coordonnees VALUES (default, 47.656916, 6.845605, 7);
INSERT INTO coordonnees VALUES (default, 47.661406, 6.843471, 7);
INSERT INTO coordonnees VALUES (default, 47.660774, 6.838065, 7);
INSERT INTO coordonnees VALUES (default, 47.657742, 6.836604, 7);
INSERT INTO coordonnees VALUES (default, 47.656369, 6.837484, 7);
INSERT INTO coordonnees VALUES (default, 47.654016, 6.837638, 7);
#Quartier 2
INSERT INTO coordonnees VALUES (default, 47.655295, 6.842595, 8);
INSERT INTO coordonnees VALUES (default, 47.654558, 6.844930, 8);
INSERT INTO coordonnees VALUES (default, 47.654471, 6.848245, 8);
INSERT INTO coordonnees VALUES (default, 47.652343, 6.850378, 8);
INSERT INTO coordonnees VALUES (default, 47.649527, 6.852927, 8);
INSERT INTO coordonnees VALUES (default, 47.648009, 6.846030, 8);
INSERT INTO coordonnees VALUES (default, 47.655295, 6.842595, 8);
#Quartier 3
INSERT INTO coordonnees VALUES (default, 47.656916, 6.845605, 9);
INSERT INTO coordonnees VALUES (default, 47.661406, 6.843471, 9);
INSERT INTO coordonnees VALUES (default, 47.661010, 6.850524, 9);
INSERT INTO coordonnees VALUES (default, 47.659079, 6.853424, 9);
INSERT INTO coordonnees VALUES (default, 47.656916, 6.845605, 9);
#Quartier 4
INSERT INTO coordonnees VALUES (default, 47.656916, 6.845605, 10);
INSERT INTO coordonnees VALUES (default, 47.659079, 6.853424, 10);
INSERT INTO coordonnees VALUES (default, 47.655299, 6.860324, 10);
INSERT INTO coordonnees VALUES (default, 47.652343, 6.850378, 10);
INSERT INTO coordonnees VALUES (default, 47.654471, 6.848245, 10);
INSERT INTO coordonnees VALUES (default, 47.656916, 6.845605, 10);
#Quartier 5
INSERT INTO coordonnees VALUES (default, 47.652343, 6.850378, 11);
INSERT INTO coordonnees VALUES (default, 47.655299, 6.860324, 11);
INSERT INTO coordonnees VALUES (default, 47.653384, 6.869119, 11);
INSERT INTO coordonnees VALUES (default, 47.652415, 6.864722, 11);
INSERT INTO coordonnees VALUES (default, 47.649527, 6.852927, 11);
INSERT INTO coordonnees VALUES (default, 47.652343, 6.850378, 11);

/*JAURES*/
#Quartier 1
INSERT INTO coordonnees VALUES (default, 47.648009, 6.846030, 12);
INSERT INTO coordonnees VALUES (default, 47.649527, 6.852927, 12);
INSERT INTO coordonnees VALUES (default, 47.647001, 6.854765, 12);
INSERT INTO coordonnees VALUES (default, 47.646353, 6.855105, 12);
INSERT INTO coordonnees VALUES (default, 47.645567, 6.847317, 12);
INSERT INTO coordonnees VALUES (default, 47.648009, 6.846030, 12);
#Quartier 2
INSERT INTO coordonnees VALUES (default, 47.649527, 6.852927, 13);
INSERT INTO coordonnees VALUES (default, 47.651843, 6.862375, 13);
INSERT INTO coordonnees VALUES (default, 47.648514, 6.861984, 13);
INSERT INTO coordonnees VALUES (default, 47.647001, 6.854765, 13);
INSERT INTO coordonnees VALUES (default, 47.649527, 6.852927, 13);
#Quartier 3
INSERT INTO coordonnees VALUES (default, 47.647001, 6.854765, 14);
INSERT INTO coordonnees VALUES (default, 47.646353, 6.855105, 14);
INSERT INTO coordonnees VALUES (default, 47.642129, 6.857168, 14);
INSERT INTO coordonnees VALUES (default, 47.644991, 6.857910, 14);
INSERT INTO coordonnees VALUES (default, 47.645468, 6.858790, 14);
INSERT INTO coordonnees VALUES (default, 47.646017, 6.861161, 14);
INSERT INTO coordonnees VALUES (default, 47.646270, 6.862599, 14);
INSERT INTO coordonnees VALUES (default, 47.648514, 6.861984, 14);
INSERT INTO coordonnees VALUES (default, 47.647001, 6.854765, 14);
#Quartier 4
INSERT INTO coordonnees VALUES (default, 47.646353, 6.855105, 15);
INSERT INTO coordonnees VALUES (default, 47.645567, 6.847317, 15);
INSERT INTO coordonnees VALUES (default, 47.641966, 6.857160, 15);
INSERT INTO coordonnees VALUES (default, 47.642129, 6.857168, 15);
INSERT INTO coordonnees VALUES (default, 47.646353, 6.855105, 15);
#Quartier 5
INSERT INTO coordonnees VALUES (default, 47.641966, 6.857160, 16);
INSERT INTO coordonnees VALUES (default, 47.645567, 6.847317, 16);
INSERT INTO coordonnees VALUES (default, 47.641022, 6.849813, 16);
INSERT INTO coordonnees VALUES (default, 47.641561, 6.857178, 16);
INSERT INTO coordonnees VALUES (default, 47.641966, 6.857160, 16);
#Quartier 6
INSERT INTO coordonnees VALUES (default, 47.641561, 6.857178, 17);
INSERT INTO coordonnees VALUES (default, 47.641966, 6.857160, 17);
INSERT INTO coordonnees VALUES (default, 47.642129, 6.857168, 17);
INSERT INTO coordonnees VALUES (default, 47.644991, 6.857910, 17);
INSERT INTO coordonnees VALUES (default, 47.645468, 6.858790, 17);
INSERT INTO coordonnees VALUES (default, 47.646017, 6.861161, 17);
INSERT INTO coordonnees VALUES (default, 47.646270, 6.862599, 17);
INSERT INTO coordonnees VALUES (default, 47.643611, 6.862722, 17);
INSERT INTO coordonnees VALUES (default, 47.642736, 6.861899, 17);
INSERT INTO coordonnees VALUES (default, 47.640793, 6.859676, 17);
INSERT INTO coordonnees VALUES (default, 47.641561, 6.857178, 17);

/*MIOTTE*/
#Quartier 1
INSERT INTO coordonnees VALUES (default, 47.643611, 6.862722, 18);
INSERT INTO coordonnees VALUES (default, 47.648980, 6.866716, 18);
INSERT INTO coordonnees VALUES (default, 47.651372, 6.874116, 18);
INSERT INTO coordonnees VALUES (default, 47.653040, 6.875095, 18);
INSERT INTO coordonnees VALUES (default, 47.650305, 6.867458, 18);
INSERT INTO coordonnees VALUES (default, 47.652415, 6.864722, 18);
INSERT INTO coordonnees VALUES (default, 47.651843, 6.862375, 18);
INSERT INTO coordonnees VALUES (default, 47.648514, 6.861984, 18);
INSERT INTO coordonnees VALUES (default, 47.646270, 6.862599, 18);
INSERT INTO coordonnees VALUES (default, 47.643611, 6.862722, 18);
#Quartier 2
INSERT INTO coordonnees VALUES (default, 47.642736, 6.861899, 19);
INSERT INTO coordonnees VALUES (default, 47.643611, 6.862722, 19);
INSERT INTO coordonnees VALUES (default, 47.648980, 6.866716, 19);
INSERT INTO coordonnees VALUES (default, 47.651372, 6.874116, 19);
INSERT INTO coordonnees VALUES (default, 47.649783, 6.876406, 19);
INSERT INTO coordonnees VALUES (default, 47.645624, 6.877666, 19);
INSERT INTO coordonnees VALUES (default, 47.640274, 6.867888, 19);
INSERT INTO coordonnees VALUES (default, 47.642736, 6.861899, 19);
#Quartier 3
INSERT INTO coordonnees VALUES (default, 47.649783, 6.876406, 20);
INSERT INTO coordonnees VALUES (default, 47.645624, 6.877666, 20);
INSERT INTO coordonnees VALUES (default, 47.647855, 6.884806, 20);
INSERT INTO coordonnees VALUES (default, 47.654389, 6.894944, 20);
INSERT INTO coordonnees VALUES (default, 47.655046, 6.894217, 20);
INSERT INTO coordonnees VALUES (default, 47.649874, 6.881173, 20);
INSERT INTO coordonnees VALUES (default, 47.649783, 6.876406, 20);
#Quartier 4
INSERT INTO coordonnees VALUES (default, 47.640274, 6.867888, 21);
INSERT INTO coordonnees VALUES (default, 47.645624, 6.877666, 21);
INSERT INTO coordonnees VALUES (default, 47.647855, 6.884806, 21);
INSERT INTO coordonnees VALUES (default, 47.646266, 6.888396, 21);
INSERT INTO coordonnees VALUES (default, 47.644276, 6.888619, 21);
INSERT INTO coordonnees VALUES (default, 47.641397, 6.877597, 21);
INSERT INTO coordonnees VALUES (default, 47.639277, 6.872369, 21);
INSERT INTO coordonnees VALUES (default, 47.640274, 6.867888, 21);
#Quartier 5
INSERT INTO coordonnees VALUES (default, 47.639277, 6.872369, 22);
INSERT INTO coordonnees VALUES (default, 47.641397, 6.877597, 22);
INSERT INTO coordonnees VALUES (default, 47.644276, 6.888619, 22);
INSERT INTO coordonnees VALUES (default, 47.642709, 6.888996, 22);
INSERT INTO coordonnees VALUES (default, 47.638592, 6.883007, 22);
INSERT INTO coordonnees VALUES (default, 47.638366, 6.879393, 22);
INSERT INTO coordonnees VALUES (default, 47.639277, 6.872369, 22);

/*VIEILLE VILLE*/
#Quartier 1
INSERT INTO coordonnees VALUES (default, 47.640793, 6.859676, 23);
INSERT INTO coordonnees VALUES (default, 47.642736, 6.861899, 23);
INSERT INTO coordonnees VALUES (default, 47.640274, 6.867888, 23);
INSERT INTO coordonnees VALUES (default, 47.639002, 6.865914, 23);
INSERT INTO coordonnees VALUES (default, 47.639161, 6.864465, 23);
INSERT INTO coordonnees VALUES (default, 47.639363, 6.862351, 23);
INSERT INTO coordonnees VALUES (default, 47.639211, 6.862169, 23);
INSERT INTO coordonnees VALUES (default, 47.639384, 6.861289, 23);
INSERT INTO coordonnees VALUES (default, 47.640793, 6.859676, 23);
#Quartier 2
INSERT INTO coordonnees VALUES (default, 47.639002, 6.865914, 24);
INSERT INTO coordonnees VALUES (default, 47.639161, 6.864465, 24);
INSERT INTO coordonnees VALUES (default, 47.639363, 6.862351, 24);
INSERT INTO coordonnees VALUES (default, 47.639211, 6.862169, 24);
INSERT INTO coordonnees VALUES (default, 47.639384, 6.861289, 24);
INSERT INTO coordonnees VALUES (default, 47.638698, 6.861161, 24);
INSERT INTO coordonnees VALUES (default, 47.638156, 6.859595, 24);
INSERT INTO coordonnees VALUES (default, 47.636624, 6.860051, 24);
INSERT INTO coordonnees VALUES (default, 47.637547, 6.862502, 24);
INSERT INTO coordonnees VALUES (default, 47.637251, 6.864562, 24);
INSERT INTO coordonnees VALUES (default, 47.639002, 6.865914, 24);
#Quartier 3
INSERT INTO coordonnees VALUES (default, 47.640793, 6.859676, 25);
INSERT INTO coordonnees VALUES (default, 47.639384, 6.861289, 25);
INSERT INTO coordonnees VALUES (default, 47.638698, 6.861161, 25);
INSERT INTO coordonnees VALUES (default, 47.638156, 6.859595, 25);
INSERT INTO coordonnees VALUES (default, 47.636624, 6.860051, 25);
INSERT INTO coordonnees VALUES (default, 47.635261, 6.861714, 25);
INSERT INTO coordonnees VALUES (default, 47.635057, 6.862915, 25);
INSERT INTO coordonnees VALUES (default, 47.632045, 6.863920, 25);
INSERT INTO coordonnees VALUES (default, 47.630772, 6.863180, 25);
INSERT INTO coordonnees VALUES (default, 47.632423, 6.861514, 25);
INSERT INTO coordonnees VALUES (default, 47.637495, 6.857856, 25);
INSERT INTO coordonnees VALUES (default, 47.640793, 6.859676, 25);
#Quartier 4
INSERT INTO coordonnees VALUES (default, 47.630772, 6.863180, 26);
INSERT INTO coordonnees VALUES (default, 47.632045, 6.863920, 26);
INSERT INTO coordonnees VALUES (default, 47.635057, 6.862915, 26);
INSERT INTO coordonnees VALUES (default, 47.635261, 6.861714, 26);
INSERT INTO coordonnees VALUES (default, 47.636624, 6.860051, 26);
INSERT INTO coordonnees VALUES (default, 47.637547, 6.862502, 26);
INSERT INTO coordonnees VALUES (default, 47.637251, 6.864562, 26);
INSERT INTO coordonnees VALUES (default, 47.639002, 6.865914, 26);
INSERT INTO coordonnees VALUES (default, 47.640274, 6.867888, 26);
INSERT INTO coordonnees VALUES (default, 47.639277, 6.872369, 26);
INSERT INTO coordonnees VALUES (default, 47.638366, 6.879393, 26);
INSERT INTO coordonnees VALUES (default, 47.630000, 6.862815, 26);
INSERT INTO coordonnees VALUES (default, 47.630772, 6.863180, 26);
#Quartier 5
INSERT INTO coordonnees VALUES (default, 47.630000, 6.862815, 27);
INSERT INTO coordonnees VALUES (default, 47.638366, 6.879393, 27);
INSERT INTO coordonnees VALUES (default, 47.636038, 6.881191, 27);
INSERT INTO coordonnees VALUES (default, 47.629603, 6.878607, 27);
INSERT INTO coordonnees VALUES (default, 47.624986, 6.862916, 27);
INSERT INTO coordonnees VALUES (default, 47.630000, 6.862815, 27);

/*CENTRE VILLE*/
#Quartier 1
INSERT INTO coordonnees VALUES (default, 47.624986, 6.862916, 28);
INSERT INTO coordonnees VALUES (default, 47.630000, 6.862815, 28);
INSERT INTO coordonnees VALUES (default, 47.630772, 6.863180, 28);
INSERT INTO coordonnees VALUES (default, 47.632423, 6.861514, 28);
INSERT INTO coordonnees VALUES (default, 47.631503, 6.860902, 28);
INSERT INTO coordonnees VALUES (default, 47.631409, 6.856589, 28);
INSERT INTO coordonnees VALUES (default, 47.630006, 6.856192, 28);
INSERT INTO coordonnees VALUES (default, 47.626594, 6.859034, 28);
INSERT INTO coordonnees VALUES (default, 47.623779, 6.861324, 28);
INSERT INTO coordonnees VALUES (default, 47.624986, 6.862916, 28);
#Quartier 2
INSERT INTO coordonnees VALUES (default, 47.632423, 6.861514, 29);
INSERT INTO coordonnees VALUES (default, 47.631503, 6.860902, 29);
INSERT INTO coordonnees VALUES (default, 47.631409, 6.856589, 29);
INSERT INTO coordonnees VALUES (default, 47.634075, 6.857284, 29);
INSERT INTO coordonnees VALUES (default, 47.637495, 6.857856, 29);
INSERT INTO coordonnees VALUES (default, 47.632423, 6.861514, 29);
#Quartier 3
INSERT INTO coordonnees VALUES (default, 47.630006, 6.856192, 30);
INSERT INTO coordonnees VALUES (default, 47.634075, 6.857284, 30);
INSERT INTO coordonnees VALUES (default, 47.634061, 6.853701, 30);
INSERT INTO coordonnees VALUES (default, 47.630006, 6.856192, 30);
#Quartier 4
INSERT INTO coordonnees VALUES (default, 47.634061, 6.853701, 31);
INSERT INTO coordonnees VALUES (default, 47.635416, 6.852630, 31);
INSERT INTO coordonnees VALUES (default, 47.638297, 6.851494, 31);
INSERT INTO coordonnees VALUES (default, 47.637495, 6.857856, 31);
INSERT INTO coordonnees VALUES (default, 47.634075, 6.857284, 31);
INSERT INTO coordonnees VALUES (default, 47.634061, 6.853701, 31);
#Quartier 5
INSERT INTO coordonnees VALUES (default, 47.637495, 6.857856, 32);
INSERT INTO coordonnees VALUES (default, 47.638297, 6.851494, 32);
INSERT INTO coordonnees VALUES (default, 47.641022, 6.849813, 32);
INSERT INTO coordonnees VALUES (default, 47.641561, 6.857178, 32);
INSERT INTO coordonnees VALUES (default, 47.640793, 6.859676, 32);
INSERT INTO coordonnees VALUES (default, 47.637495, 6.857856, 32);

/*RESI*/
#Quartier 1
INSERT INTO coordonnees VALUES (default, 47.635987, 6.835030, 33);
INSERT INTO coordonnees VALUES (default, 47.636388, 6.838195, 33);
INSERT INTO coordonnees VALUES (default, 47.626581, 6.846320, 33);
INSERT INTO coordonnees VALUES (default, 47.627937, 6.840301, 33);
INSERT INTO coordonnees VALUES (default, 47.635987, 6.835030, 33);
#Quartier 2
INSERT INTO coordonnees VALUES (default, 47.636388, 6.838195, 34);
INSERT INTO coordonnees VALUES (default, 47.626581, 6.846320, 34);
INSERT INTO coordonnees VALUES (default, 47.634774, 6.851097, 34);
INSERT INTO coordonnees VALUES (default, 47.637044, 6.844263, 34);
INSERT INTO coordonnees VALUES (default, 47.636957, 6.842716, 34);
INSERT INTO coordonnees VALUES (default, 47.636388, 6.838195, 34);
#Quartier 3
INSERT INTO coordonnees VALUES (default, 47.634774, 6.851097, 35);
INSERT INTO coordonnees VALUES (default, 47.635416, 6.852630, 35);
INSERT INTO coordonnees VALUES (default, 47.634061, 6.853701, 35);
INSERT INTO coordonnees VALUES (default, 47.630006, 6.856192, 35);
INSERT INTO coordonnees VALUES (default, 47.626594, 6.859034, 35);
INSERT INTO coordonnees VALUES (default, 47.626317, 6.855299, 35);
INSERT INTO coordonnees VALUES (default, 47.626581, 6.846320, 35);
INSERT INTO coordonnees VALUES (default, 47.634774, 6.851097, 35);
#Quartier 4
INSERT INTO coordonnees VALUES (default, 47.626317, 6.855299, 36);
INSERT INTO coordonnees VALUES (default, 47.626581, 6.846320, 36);
INSERT INTO coordonnees VALUES (default, 47.620377, 6.849008, 36);
INSERT INTO coordonnees VALUES (default, 47.620339, 6.852536, 36);
INSERT INTO coordonnees VALUES (default, 47.626317, 6.855299, 36);

CREATE TABLE pointEquipe (
  id          INT NOT NULL AUTO_INCREMENT,
  quartier_id INT,
  equipe_id   INT,
  nbPoints    INT,

  PRIMARY KEY (id),

  CONSTRAINT fk_quartier_id_pointEquipe FOREIGN KEY (quartier_id) REFERENCES quartier (id),
  CONSTRAINT fk_equipe_id_pointEquipe FOREIGN KEY (equipe_id) REFERENCES equipe (id)
);

#Point technomancien
INSERT INTO pointEquipe VALUES (default, 1, 1, 11);
INSERT INTO pointEquipe VALUES (default, 2, 1, 10);
INSERT INTO pointEquipe VALUES (default, 3, 1, 10);
INSERT INTO pointEquipe VALUES (default, 4, 1, 10);
INSERT INTO pointEquipe VALUES (default, 5, 1, 10);
INSERT INTO pointEquipe VALUES (default, 6, 1, 10);

#Point Vosge
INSERT INTO pointEquipe VALUES (default, 7, 2, 12);
INSERT INTO pointEquipe VALUES (default, 8, 2, 10);
INSERT INTO pointEquipe VALUES (default, 9, 2, 10);
INSERT INTO pointEquipe VALUES (default, 10, 2, 10);
INSERT INTO pointEquipe VALUES (default, 11, 2, 10);

#Point Jaures
INSERT INTO pointEquipe VALUES (default, 12, 3, 13);
INSERT INTO pointEquipe VALUES (default, 13, 3, 10);
INSERT INTO pointEquipe VALUES (default, 14, 3, 10);
INSERT INTO pointEquipe VALUES (default, 15, 3, 10);
INSERT INTO pointEquipe VALUES (default, 16, 3, 10);
INSERT INTO pointEquipe VALUES (default, 17, 3, 10);

#Point Miotte
INSERT INTO pointEquipe VALUES (default, 18, 4, 14);
INSERT INTO pointEquipe VALUES (default, 19, 4, 10);
INSERT INTO pointEquipe VALUES (default, 20, 4, 10);
INSERT INTO pointEquipe VALUES (default, 21, 4, 10);
INSERT INTO pointEquipe VALUES (default, 22, 4, 10);

#Point VieilleVille
INSERT INTO pointEquipe VALUES (default, 23, 5, 15);
INSERT INTO pointEquipe VALUES (default, 24, 5, 10);
INSERT INTO pointEquipe VALUES (default, 25, 5, 10);
INSERT INTO pointEquipe VALUES (default, 26, 5, 10);
INSERT INTO pointEquipe VALUES (default, 27, 5, 10);

#Point CentreVille
INSERT INTO pointEquipe VALUES (default, 28, 6, 16);
INSERT INTO pointEquipe VALUES (default, 29, 6, 10);
INSERT INTO pointEquipe VALUES (default, 30, 6, 10);
INSERT INTO pointEquipe VALUES (default, 31, 6, 10);
INSERT INTO pointEquipe VALUES (default, 32, 6, 10);

#Point RedStone
INSERT INTO pointEquipe VALUES (default, 33, 7, 17);
INSERT INTO pointEquipe VALUES (default, 34, 7, 10);
INSERT INTO pointEquipe VALUES (default, 35, 7, 10);
INSERT INTO pointEquipe VALUES (default, 36, 7, 10);