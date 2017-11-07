DROP TABLE IF EXISTS pointEquipe, coordonnees, quartier, competenceEquipe, competence, inventaire, item, utilisateur, equipe;

CREATE TABLE equipe (
  id         INT NOT NULL AUTO_INCREMENT,
  nom        VARCHAR(25),
  descriptif TEXT,

  PRIMARY KEY (id)
);

CREATE TABLE utilisateur (
  id          INT NOT NULL AUTO_INCREMENT,
  pseudo      VARCHAR(25),
  mdp         VARCHAR(25),
  email       VARCHAR(25),
  pointAction INT,
  gold        INT,
  equipe_id   INT,

  PRIMARY KEY (id),

  CONSTRAINT fk_equipe_id_utilisateur FOREIGN KEY (equipe_id) REFERENCES equipe (id)
);

CREATE TABLE item (
  id      INT NOT NULL AUTO_INCREMENT,
  nom     VARCHAR(25),
  libelle VARCHAR(25),
  effet   VARCHAR(25),

  PRIMARY KEY (id)
);

CREATE TABLE inventaire (
  id      INT NOT NULL AUTO_INCREMENT,
  user_id INT,
  item_id INT,

  PRIMARY KEY (id),

  CONSTRAINT fk_user_id_inventaire FOREIGN KEY (user_id) REFERENCES utilisateur (id),
  CONSTRAINT fk_item_id_inventaire FOREIGN KEY (item_id) REFERENCES item (id)
);

CREATE TABLE competence (
  id        INT AUTO_INCREMENT NOT NULL,
  nom       VARCHAR(25),
  coutTotal INT,
  paye      INT,

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
  id      INT NOT NULL AUTO_INCREMENT,
  nom     VARCHAR(25),
  QG      BOOLEAN,
  revenus INT,

  PRIMARY KEY (id)
);

/*Technomancien*/
INSERT INTO quartier VALUES(default, 'Technomancien1', false, 10);
INSERT INTO quartier VALUES(default, 'Technomancien2', false, 10);
INSERT INTO quartier VALUES(default, 'Technomancien3', true, 10);
INSERT INTO quartier VALUES(default, 'Technomancien4', false, 10);
INSERT INTO quartier VALUES(default, 'Technomancien5', false, 10);
INSERT INTO quartier VALUES(default, 'Technomancien6', false, 10);

/*Vosge*/
INSERT INTO quartier VALUES(default, 'Vosge1', false, 10);
INSERT INTO quartier VALUES(default, 'Vosge2', false, 10);
INSERT INTO quartier VALUES(default, 'Vosge3', true, 10);
INSERT INTO quartier VALUES(default, 'Vosge4', false, 10);
INSERT INTO quartier VALUES(default, 'Vosge5', false, 10);

/*Jaures*/
INSERT INTO quartier VALUES(default, 'Jaures1', false, 10);
INSERT INTO quartier VALUES(default, 'Jaures2', false, 10);
INSERT INTO quartier VALUES(default, 'Jaures3', true, 10);
INSERT INTO quartier VALUES(default, 'Jaures4', false, 10);
INSERT INTO quartier VALUES(default, 'Jaures5', false, 10);
INSERT INTO quartier VALUES(default, 'Jaures6', false, 10);

/*Miotte*/
INSERT INTO quartier VALUES(default, 'Miotte1', false, 10);
INSERT INTO quartier VALUES(default, 'Miotte2', false, 10);
INSERT INTO quartier VALUES(default, 'Miotte3', true, 10);
INSERT INTO quartier VALUES(default, 'Miotte4', false, 10);
INSERT INTO quartier VALUES(default, 'Miotte5', false, 10);



CREATE TABLE coordonnees (
  id    INT NOT NULL AUTO_INCREMENT,
  lat   DOUBLE(8, 6),
  longi DOUBLE(7, 6),

  quartier_id int,

  PRIMARY KEY (id),

  CONSTRAINT fk_quartier_id_coordonnees FOREIGN KEY (quartier_id) REFERENCES quartier (id)
);

/*TECHNOMANCIEN*/
#Quartier 1
INSERT INTO coordonnees VALUES (default, 47.646239, 6.818084,1);
INSERT INTO coordonnees VALUES (default, 47.647182, 6.824770,1);
INSERT INTO coordonnees VALUES (default, 47.645348, 6.828197,1);
INSERT INTO coordonnees VALUES (default, 47.641843, 6.827979,1);
INSERT INTO coordonnees VALUES (default, 47.640323, 6.831121,1);
INSERT INTO coordonnees VALUES (default, 47.646907, 6.833193,1);
INSERT INTO coordonnees VALUES (default, 47.651733, 6.825826,1);
INSERT INTO coordonnees VALUES (default, 47.650075, 6.821675,1);
INSERT INTO coordonnees VALUES (default, 47.646239, 6.818084,1);
#Quartier 2
INSERT INTO coordonnees VALUES (default, 47.640323, 6.831121,2);
INSERT INTO coordonnees VALUES (default, 47.646907, 6.833193,2);
INSERT INTO coordonnees VALUES (default, 47.652596, 6.836780,2);
INSERT INTO coordonnees VALUES (default, 47.641268, 6.841759,2);
INSERT INTO coordonnees VALUES (default, 47.639374, 6.832471,2);
INSERT INTO coordonnees VALUES (default, 47.640323, 6.831121,2);
#Quartier 3
INSERT INTO coordonnees VALUES (default, 47.639374, 6.832471,3);
INSERT INTO coordonnees VALUES (default, 47.641268, 6.841759,3);
INSERT INTO coordonnees VALUES (default, 47.636957, 6.842716,3);
INSERT INTO coordonnees VALUES (default, 47.635987, 6.835030,3);
INSERT INTO coordonnees VALUES (default, 47.639374, 6.832471,3);
#Quartier 4
INSERT INTO coordonnees VALUES (default, 47.636957, 6.842716,4);
INSERT INTO coordonnees VALUES (default, 47.640519, 6.841999,4);
INSERT INTO coordonnees VALUES (default, 47.641022, 6.849813,4);
INSERT INTO coordonnees VALUES (default, 47.635416, 6.852630,4);
INSERT INTO coordonnees VALUES (default, 47.634774, 6.851097,4);
INSERT INTO coordonnees VALUES (default, 47.637044, 6.844263,4);
INSERT INTO coordonnees VALUES (default, 47.636948, 6.842731,4);
INSERT INTO coordonnees VALUES (default, 47.636957, 6.842716,4);
#Quartier 5
INSERT INTO coordonnees VALUES (default, 47.636957, 6.842716,5);
INSERT INTO coordonnees VALUES (default, 47.640519, 6.841999,5);
INSERT INTO coordonnees VALUES (default, 47.648009, 6.846030,5);
INSERT INTO coordonnees VALUES (default, 47.647021, 6.839655,5);
INSERT INTO coordonnees VALUES (default, 47.636957, 6.842716,5);
#Quartier 6
INSERT INTO coordonnees VALUES (default, 47.648009, 6.846030,6);
INSERT INTO coordonnees VALUES (default, 47.647021, 6.839655,6);
INSERT INTO coordonnees VALUES (default, 47.652596, 6.836780,6);
INSERT INTO coordonnees VALUES (default, 47.654016, 6.837638,6);
INSERT INTO coordonnees VALUES (default, 47.655295, 6.842595,6);
INSERT INTO coordonnees VALUES (default, 47.648009, 6.846030,6);

/*VOSGE*/
#Quartier 1
INSERT INTO coordonnees VALUES (default, 47.654016, 6.837638,7);
INSERT INTO coordonnees VALUES (default, 47.655295, 6.842595,7);
INSERT INTO coordonnees VALUES (default, 47.654890, 6.844651,7);
INSERT INTO coordonnees VALUES (default, 47.654558, 6.844930,7);
INSERT INTO coordonnees VALUES (default, 47.654471, 6.848245,7);
INSERT INTO coordonnees VALUES (default, 47.656916, 6.845605,7);
INSERT INTO coordonnees VALUES (default, 47.661406, 6.843471,7);
INSERT INTO coordonnees VALUES (default, 47.660774, 6.838065,7);
INSERT INTO coordonnees VALUES (default, 47.657742, 6.836604,7);
INSERT INTO coordonnees VALUES (default, 47.656369, 6.837484,7);
INSERT INTO coordonnees VALUES (default, 47.654016, 6.837638,7);
#Quartier 2
INSERT INTO coordonnees VALUES (default, 47.654890, 6.844651,8);
INSERT INTO coordonnees VALUES (default, 47.654558, 6.844930,8);
INSERT INTO coordonnees VALUES (default, 47.654471, 6.848245,8);
INSERT INTO coordonnees VALUES (default, 47.649527, 6.852927,8);
INSERT INTO coordonnees VALUES (default, 47.648009, 6.846030,8);
INSERT INTO coordonnees VALUES (default, 47.654890, 6.844651,8);
#Quartier 3
INSERT INTO coordonnees VALUES (default, 47.656916, 6.845605,9);
INSERT INTO coordonnees VALUES (default, 47.661406, 6.843471,9);
INSERT INTO coordonnees VALUES (default, 47.661010, 6.850524,9);
INSERT INTO coordonnees VALUES (default, 47.659079, 6.853424,9);
INSERT INTO coordonnees VALUES (default, 47.656916, 6.845605,9);
#Quartier 4
INSERT INTO coordonnees VALUES (default, 47.656916, 6.845605,10);
INSERT INTO coordonnees VALUES (default, 47.659079, 6.853424,10);
INSERT INTO coordonnees VALUES (default, 47.655299, 6.860324,10);
INSERT INTO coordonnees VALUES (default, 47.652343, 6.850378,10);
INSERT INTO coordonnees VALUES (default, 47.656916, 6.845605,10);
#Quartier 5
INSERT INTO coordonnees VALUES (default, 47.648009, 6.846030,11);
INSERT INTO coordonnees VALUES (default, 47.652343, 6.850378,11);
INSERT INTO coordonnees VALUES (default, 47.655299, 6.860324,11);
INSERT INTO coordonnees VALUES (default, 47.653384, 6.869119,11);
INSERT INTO coordonnees VALUES (default, 47.652414, 6.864779,11);
INSERT INTO coordonnees VALUES (default, 47.652125, 6.864693,11);
INSERT INTO coordonnees VALUES (default, 47.649527, 6.852927,11);
INSERT INTO coordonnees VALUES (default, 47.648009, 6.846030,11);

/*JAURES*/
#Quartier 1
INSERT INTO coordonnees VALUES (default, 47.648009, 6.846030,12);
INSERT INTO coordonnees VALUES (default, 47.649527, 6.852927,12);
INSERT INTO coordonnees VALUES (default, 47.646353, 6.855105,12);
INSERT INTO coordonnees VALUES (default, 47.645567, 6.847317,12);
INSERT INTO coordonnees VALUES (default, 47.648009, 6.846030,12);
#Quartier 2
INSERT INTO coordonnees VALUES (default, 47.649527, 6.852927,13);
INSERT INTO coordonnees VALUES (default, 47.651843, 6.862375,13);
INSERT INTO coordonnees VALUES (default, 47.648514, 6.861984,13);
INSERT INTO coordonnees VALUES (default, 47.647001, 6.854765,13);
INSERT INTO coordonnees VALUES (default, 47.649527, 6.852927,13);
#Quartier 3
INSERT INTO coordonnees VALUES (default, 47.647001, 6.854765,14);
INSERT INTO coordonnees VALUES (default, 47.649527, 6.852927,14);
INSERT INTO coordonnees VALUES (default, 47.642129, 6.857168,14);
INSERT INTO coordonnees VALUES (default, 47.644991, 6.857910,14);
INSERT INTO coordonnees VALUES (default, 47.645468, 6.858790,14);
INSERT INTO coordonnees VALUES (default, 47.646017, 6.861161,14);
INSERT INTO coordonnees VALUES (default, 47.646270, 6.862599,14);
INSERT INTO coordonnees VALUES (default, 47.647001, 6.854765,14);
#Quartier 4
INSERT INTO coordonnees VALUES (default, 47.646353, 6.855105,15);
INSERT INTO coordonnees VALUES (default, 47.645567, 6.847317,15);
INSERT INTO coordonnees VALUES (default, 47.641966, 6.857160,15);
INSERT INTO coordonnees VALUES (default, 47.645349, 6.847340,15);
INSERT INTO coordonnees VALUES (default, 47.646353, 6.855105,15);
#Quartier 5
INSERT INTO coordonnees VALUES (default, 47.641966, 6.857160,16);
INSERT INTO coordonnees VALUES (default, 47.645349, 6.847340,16);
INSERT INTO coordonnees VALUES (default, 47.641012, 6.849539,16);
INSERT INTO coordonnees VALUES (default, 47.641561, 6.857178,16);
INSERT INTO coordonnees VALUES (default, 47.641966, 6.857160,16);
#Quartier 6
INSERT INTO coordonnees VALUES (default, 47.641561, 6.857178, 17);
INSERT INTO coordonnees VALUES (default, 47.641966, 6.857160, 17);
INSERT INTO coordonnees VALUES (default, 47.642129, 6.857168, 17);
INSERT INTO coordonnees VALUES (default, 47.644991, 6.857910, 17);
INSERT INTO coordonnees VALUES (default, 47.645468, 6.858790, 17);
INSERT INTO coordonnees VALUES (default, 47.646017, 6.861161, 17);
INSERT INTO coordonnees VALUES (default, 47.646270, 6.862599, 17);
INSERT INTO coordonnees VALUES (default, 47.643600, 6.862709, 17);
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

CREATE TABLE pointEquipe (
  id          INT NOT NULL AUTO_INCREMENT,
  quartier_id INT,
  equipe_id   INT,
  nbPoints    INT,

  PRIMARY KEY (id),

  CONSTRAINT fk_quartier_id_pointEquipe FOREIGN KEY (quartier_id) REFERENCES quartier (id),
  CONSTRAINT fk_equipe_id_pointEquipe FOREIGN KEY (equipe_id) REFERENCES equipe (id)
);