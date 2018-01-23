DROP TABLE IF EXISTS pointEquipe, coordonnees, quartier, competenceEquipe, competence, inventaire, mapItem, effetItem, effet, item, utilisateur, equipe;

CREATE TABLE equipe (
  id         INT NOT NULL AUTO_INCREMENT,
  nom        VARCHAR(25),
  descriptif TEXT,
  couleur    VARCHAR(25),


  PRIMARY KEY (id)
);

INSERT INTO equipe VALUES (default, 'Clan Technomancien', 'De nombreuses corporations et hommes d’affaires se sont alliés pour former le clan des technomanciens, des recherches scientifiques, innovations technologique, aux fils des siècles ce clan s’est spécialisé dans ces domaines, sous couvert des nombreuses entreprises implantées sur leur territoire.', '#36003A');
INSERT INTO equipe VALUES (default, 'Clan des Exilés', 'Ce clan contrôlant la partie nord de belfort, doit son nom aux agents qui le composent : Tous anciennement membres des 6 autres clans, renégats, bannis, ils se sont rassemblés pour former un clan et ont réussit à établir leur domination sur les quartiers nord. Mais leurs vengeance ne fait que commencer, ils comptent bien ne pas arrêter leur conquête.', '#88035C');
INSERT INTO equipe VALUES (default, 'Clan des Résistants', 'Le territoire de ce clan est l’objet de nombreuses convoitises, malgré les nombreuses attaques des clan voisins, aucun n’a réussi à prendre le contrôle. Les Agents sur place lassés de ces changements incessant de propriétaire, ont décidés de créer leur propre clan et contrôler enfin cette zone.', '#02A6B5');
INSERT INTO equipe VALUES (default, 'Clan de la Tour', 'Historiquement, cette tour était les yeux de la cité de Belfort, jadis poste avancé du clan de la forteresse, la garnison postée est devenu indépendante suite à une querelle avec leurs supérieurs. C’est ainsi qu’est né le clan de la tour.', '#067E00');
INSERT INTO equipe VALUES (default, 'Clan de la Forteresse', 'Le clan de la forteresse du lion, la protège depuis des siècles. De nombreuses légendes spéculent sur ce que garde le clan, mais personnes à ce jour n’a réussi à percer les secrets que renferme cette imposante batisse.', '#D07700');
INSERT INTO equipe VALUES (default, 'Clan des Negociants', 'Etablit dans le centre ville, le clan des négociants est une alliance des plus riches commerçants de la cité du lion. Ce clan a pour but le profits et le contrôle, avide de conquête, il utilise ses nombreux moyens financiers pour permettre à ses agents de capturer le maximum de territoires', '#012943');
INSERT INTO equipe VALUES (default, 'Clan des Veilleurs', 'Du haut de leurs immeubles, le clan des veilleurs, surveille son territoire. N’espérez pas vous infiltré incognito sur leurs terrains ! Tout le monde se connaît et ils ne sont pas friand des inconnus sur leurs terres.', '#A20010');

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
  link VARCHAR(255),
  rayon INT DEFAULT NULL,
  temps INT DEFAULT NULL,

  PRIMARY KEY (id)
);

INSERT INTO item VALUES(default, 'Piege basique', 90, 2, '+2PC, +60G / -1 PA', 'application/assets/images/items/png/Piege_basique.png', 50, 2);
INSERT INTO item VALUES(default, 'Bouclier', 120, 1, 'Invulnerabilité', 'application/assets/images/items/png/Bouclier.png', NULL, NULL);
INSERT INTO item VALUES(default, 'Bouclier divin', 500, 2, 'Invulnerabilité', 'application/assets/images/items/png/BouclierDivin.png', NULL, 1);
INSERT INTO item VALUES(default, 'Piege assassin', 150, 1, '+4 PC / -4 PA', 'application/assets/images/items/png/Piege_basique.png', 3, 3);
INSERT INTO item VALUES(default, 'Piege pick-pocket', 150, 2, '+2 PA, +200G / -100G', 'application/assets/images/items/png/Piege_basique.png', 5, 3);

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
INSERT INTO quartier VALUES (default, 'QG Technomanciens', TRUE, 10, 1);
INSERT INTO quartier VALUES (default, 'Zone IUT', FALSE, 10, 1);
INSERT INTO quartier VALUES (default, 'Sud techn''hom', FALSE, 10, 1);
INSERT INTO quartier VALUES (default, 'Etang techn''hom', FALSE, 10, 1);
INSERT INTO quartier VALUES (default, 'Nord techn''hom', FALSE, 10, 1);

/*Vosge*/
INSERT INTO quartier VALUES (default, 'Pointe Nord', FALSE, 10, 2);
INSERT INTO quartier VALUES (default, 'Marché des Vosges', FALSE, 10, 2);
INSERT INTO quartier VALUES (default, 'QG Exilés', TRUE, 10, 2);
INSERT INTO quartier VALUES (default, 'Zone Courbet', FALSE, 10, 2);
INSERT INTO quartier VALUES (default, 'Champ de Mars', FALSE, 10, 2);

/*Jaures*/
INSERT INTO quartier VALUES (default, 'Saint Joseph', FALSE, 10, 3);
INSERT INTO quartier VALUES (default, 'Nord-Est Jaures', FALSE, 10, 3);
INSERT INTO quartier VALUES (default, 'QG Résistants', TRUE, 10, 3);
INSERT INTO quartier VALUES (default, 'Ancien Hopital', FALSE, 10, 3);
INSERT INTO quartier VALUES (default, 'Maison du Peuple', FALSE, 10, 3);
INSERT INTO quartier VALUES (default, 'Tour des affaires', FALSE, 10, 3);

/*Miotte*/
INSERT INTO quartier VALUES (default, 'Etang des forges', FALSE, 10, 4);
INSERT INTO quartier VALUES (default, 'Tour de la Miotte', FALSE, 10, 4);
INSERT INTO quartier VALUES (default, 'QG de la Tour', TRUE, 10, 4);
INSERT INTO quartier VALUES (default, 'Brisach', FALSE, 10, 4);
INSERT INTO quartier VALUES (default, 'Vauban', FALSE, 10, 4);

/*Vieille ville*/
INSERT INTO quartier VALUES (default, 'Atria', FALSE, 10, 5);
INSERT INTO quartier VALUES (default, 'Tour 46', FALSE, 10, 5);
INSERT INTO quartier VALUES (default, 'Square du souvenir', FALSE, 10, 5);
INSERT INTO quartier VALUES (default, 'Citadelle', FALSE, 10, 5);
INSERT INTO quartier VALUES (default, 'QG Forteresse', TRUE, 10, 5);

/*Centre ville*/
INSERT INTO quartier VALUES (default, 'QG Négociants', TRUE, 10, 6);
INSERT INTO quartier VALUES (default, 'Corbis', FALSE, 10, 6);
INSERT INTO quartier VALUES (default, 'Gare', FALSE, 10, 6);
INSERT INTO quartier VALUES (default, 'Rue piétone', FALSE, 10, 6);
INSERT INTO quartier VALUES (default, '4 AS', FALSE, 10, 6);

/*Residence*/
INSERT INTO quartier VALUES (default, 'Condorcet', FALSE, 10, 7);
INSERT INTO quartier VALUES (default, 'Nouvelles Résidences', FALSE, 10, 7);
INSERT INTO quartier VALUES (default, 'Kennedy', FALSE, 10, 7);
INSERT INTO quartier VALUES (default, 'QG Veilleurs', TRUE, 10, 7);
INSERT INTO quartier VALUES (default, 'Bois Essert', FALSE, 10, 7);

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
INSERT INTO coordonnees VALUES (default, 47.640519, 6.841999, 4);
INSERT INTO coordonnees VALUES (default, 47.641022, 6.849813, 4);
INSERT INTO coordonnees VALUES (default, 47.645567, 6.847317, 4);
INSERT INTO coordonnees VALUES (default, 47.648009, 6.846030, 4);
INSERT INTO coordonnees VALUES (default, 47.647021, 6.839655, 4);
INSERT INTO coordonnees VALUES (default, 47.641268, 6.841759, 4);
INSERT INTO coordonnees VALUES (default, 47.640519, 6.841999, 4);
#Quartier 5
INSERT INTO coordonnees VALUES (default, 47.648009, 6.846030, 5);
INSERT INTO coordonnees VALUES (default, 47.647021, 6.839655, 5);
INSERT INTO coordonnees VALUES (default, 47.652596, 6.836780, 5);
INSERT INTO coordonnees VALUES (default, 47.654016, 6.837638, 5);
INSERT INTO coordonnees VALUES (default, 47.655295, 6.842595, 5);
INSERT INTO coordonnees VALUES (default, 47.648009, 6.846030, 5);

/*VOSGE*/
#Quartier 1
INSERT INTO coordonnees VALUES (default, 47.654016, 6.837638, 6);
INSERT INTO coordonnees VALUES (default, 47.655295, 6.842595, 6);
INSERT INTO coordonnees VALUES (default, 47.654558, 6.844930, 6);
INSERT INTO coordonnees VALUES (default, 47.654471, 6.848245, 6);
INSERT INTO coordonnees VALUES (default, 47.656916, 6.845605, 6);
INSERT INTO coordonnees VALUES (default, 47.661406, 6.843471, 6);
INSERT INTO coordonnees VALUES (default, 47.660774, 6.838065, 6);
INSERT INTO coordonnees VALUES (default, 47.657742, 6.836604, 6);
INSERT INTO coordonnees VALUES (default, 47.656369, 6.837484, 6);
INSERT INTO coordonnees VALUES (default, 47.654016, 6.837638, 6);
#Quartier 2
INSERT INTO coordonnees VALUES (default, 47.655295, 6.842595, 7);
INSERT INTO coordonnees VALUES (default, 47.654558, 6.844930, 7);
INSERT INTO coordonnees VALUES (default, 47.654471, 6.848245, 7);
INSERT INTO coordonnees VALUES (default, 47.652343, 6.850378, 7);
INSERT INTO coordonnees VALUES (default, 47.649527, 6.852927, 7);
INSERT INTO coordonnees VALUES (default, 47.648009, 6.846030, 7);
INSERT INTO coordonnees VALUES (default, 47.655295, 6.842595, 7);
#Quartier 3
INSERT INTO coordonnees VALUES (default, 47.656916, 6.845605, 8);
INSERT INTO coordonnees VALUES (default, 47.661406, 6.843471, 8);
INSERT INTO coordonnees VALUES (default, 47.661010, 6.850524, 8);
INSERT INTO coordonnees VALUES (default, 47.659079, 6.853424, 8);
INSERT INTO coordonnees VALUES (default, 47.656916, 6.845605, 8);
#Quartier 4
INSERT INTO coordonnees VALUES (default, 47.656916, 6.845605, 9);
INSERT INTO coordonnees VALUES (default, 47.659079, 6.853424, 9);
INSERT INTO coordonnees VALUES (default, 47.655299, 6.860324, 9);
INSERT INTO coordonnees VALUES (default, 47.652343, 6.850378, 9);
INSERT INTO coordonnees VALUES (default, 47.654471, 6.848245, 9);
INSERT INTO coordonnees VALUES (default, 47.656916, 6.845605, 9);
#Quartier 5
INSERT INTO coordonnees VALUES (default, 47.652343, 6.850378, 10);
INSERT INTO coordonnees VALUES (default, 47.655299, 6.860324, 10);
INSERT INTO coordonnees VALUES (default, 47.653384, 6.869119, 10);
INSERT INTO coordonnees VALUES (default, 47.652415, 6.864722, 10);
INSERT INTO coordonnees VALUES (default, 47.649527, 6.852927, 10);
INSERT INTO coordonnees VALUES (default, 47.652343, 6.850378, 10);

/*JAURES*/
#Quartier 1
INSERT INTO coordonnees VALUES (default, 47.648009, 6.846030, 11);
INSERT INTO coordonnees VALUES (default, 47.649527, 6.852927, 11);
INSERT INTO coordonnees VALUES (default, 47.647001, 6.854765, 11);
INSERT INTO coordonnees VALUES (default, 47.646353, 6.855105, 11);
INSERT INTO coordonnees VALUES (default, 47.645567, 6.847317, 11);
INSERT INTO coordonnees VALUES (default, 47.648009, 6.846030, 11);
#Quartier 2
INSERT INTO coordonnees VALUES (default, 47.649527, 6.852927, 12);
INSERT INTO coordonnees VALUES (default, 47.651843, 6.862375, 12);
INSERT INTO coordonnees VALUES (default, 47.648514, 6.861984, 12);
INSERT INTO coordonnees VALUES (default, 47.647001, 6.854765, 12);
INSERT INTO coordonnees VALUES (default, 47.649527, 6.852927, 12);
#Quartier 3
INSERT INTO coordonnees VALUES (default, 47.647001, 6.854765, 13);
INSERT INTO coordonnees VALUES (default, 47.646353, 6.855105, 13);
INSERT INTO coordonnees VALUES (default, 47.642129, 6.857168, 13);
INSERT INTO coordonnees VALUES (default, 47.644991, 6.857910, 13);
INSERT INTO coordonnees VALUES (default, 47.645468, 6.858790, 13);
INSERT INTO coordonnees VALUES (default, 47.646017, 6.861161, 13);
INSERT INTO coordonnees VALUES (default, 47.646270, 6.862599, 13);
INSERT INTO coordonnees VALUES (default, 47.648514, 6.861984, 13);
INSERT INTO coordonnees VALUES (default, 47.647001, 6.854765, 13);
#Quartier 4
INSERT INTO coordonnees VALUES (default, 47.646353, 6.855105, 14);
INSERT INTO coordonnees VALUES (default, 47.645567, 6.847317, 14);
INSERT INTO coordonnees VALUES (default, 47.641966, 6.857160, 14);
INSERT INTO coordonnees VALUES (default, 47.642129, 6.857168, 14);
INSERT INTO coordonnees VALUES (default, 47.646353, 6.855105, 14);
#Quartier 5
INSERT INTO coordonnees VALUES (default, 47.641966, 6.857160, 15);
INSERT INTO coordonnees VALUES (default, 47.645567, 6.847317, 15);
INSERT INTO coordonnees VALUES (default, 47.641022, 6.849813, 15);
INSERT INTO coordonnees VALUES (default, 47.641561, 6.857178, 15);
INSERT INTO coordonnees VALUES (default, 47.641966, 6.857160, 15);
#Quartier 6
INSERT INTO coordonnees VALUES (default, 47.641561, 6.857178, 16);
INSERT INTO coordonnees VALUES (default, 47.641966, 6.857160, 16);
INSERT INTO coordonnees VALUES (default, 47.642129, 6.857168, 16);
INSERT INTO coordonnees VALUES (default, 47.644991, 6.857910, 16);
INSERT INTO coordonnees VALUES (default, 47.645468, 6.858790, 16);
INSERT INTO coordonnees VALUES (default, 47.646017, 6.861161, 16);
INSERT INTO coordonnees VALUES (default, 47.646270, 6.862599, 16);
INSERT INTO coordonnees VALUES (default, 47.643611, 6.862722, 16);
INSERT INTO coordonnees VALUES (default, 47.642736, 6.861899, 16);
INSERT INTO coordonnees VALUES (default, 47.640793, 6.859676, 16);
INSERT INTO coordonnees VALUES (default, 47.641561, 6.857178, 16);

/*MIOTTE*/
#Quartier 1
INSERT INTO coordonnees VALUES (default, 47.643611, 6.862722, 17);
INSERT INTO coordonnees VALUES (default, 47.648980, 6.866716, 17);
INSERT INTO coordonnees VALUES (default, 47.651372, 6.874116, 17);
INSERT INTO coordonnees VALUES (default, 47.653040, 6.875095, 17);
INSERT INTO coordonnees VALUES (default, 47.650305, 6.867458, 17);
INSERT INTO coordonnees VALUES (default, 47.652415, 6.864722, 17);
INSERT INTO coordonnees VALUES (default, 47.651843, 6.862375, 17);
INSERT INTO coordonnees VALUES (default, 47.648514, 6.861984, 17);
INSERT INTO coordonnees VALUES (default, 47.646270, 6.862599, 17);
INSERT INTO coordonnees VALUES (default, 47.643611, 6.862722, 17);
#Quartier 2
INSERT INTO coordonnees VALUES (default, 47.642736, 6.861899, 18);
INSERT INTO coordonnees VALUES (default, 47.643611, 6.862722, 18);
INSERT INTO coordonnees VALUES (default, 47.648980, 6.866716, 18);
INSERT INTO coordonnees VALUES (default, 47.651372, 6.874116, 18);
INSERT INTO coordonnees VALUES (default, 47.649783, 6.876406, 18);
INSERT INTO coordonnees VALUES (default, 47.645624, 6.877666, 18);
INSERT INTO coordonnees VALUES (default, 47.640274, 6.867888, 18);
INSERT INTO coordonnees VALUES (default, 47.642736, 6.861899, 18);
#Quartier 3
INSERT INTO coordonnees VALUES (default, 47.649783, 6.876406, 19);
INSERT INTO coordonnees VALUES (default, 47.645624, 6.877666, 19);
INSERT INTO coordonnees VALUES (default, 47.647855, 6.884806, 19);
INSERT INTO coordonnees VALUES (default, 47.654389, 6.894944, 19);
INSERT INTO coordonnees VALUES (default, 47.655046, 6.894217, 19);
INSERT INTO coordonnees VALUES (default, 47.649874, 6.881173, 19);
INSERT INTO coordonnees VALUES (default, 47.649783, 6.876406, 19);
#Quartier 4
INSERT INTO coordonnees VALUES (default, 47.640274, 6.867888, 20);
INSERT INTO coordonnees VALUES (default, 47.645624, 6.877666, 20);
INSERT INTO coordonnees VALUES (default, 47.647855, 6.884806, 20);
INSERT INTO coordonnees VALUES (default, 47.646266, 6.888396, 20);
INSERT INTO coordonnees VALUES (default, 47.644276, 6.888619, 20);
INSERT INTO coordonnees VALUES (default, 47.641397, 6.877597, 20);
INSERT INTO coordonnees VALUES (default, 47.639277, 6.872369, 20);
INSERT INTO coordonnees VALUES (default, 47.640274, 6.867888, 20);
#Quartier 5
INSERT INTO coordonnees VALUES (default, 47.639277, 6.872369, 21);
INSERT INTO coordonnees VALUES (default, 47.641397, 6.877597, 21);
INSERT INTO coordonnees VALUES (default, 47.644276, 6.888619, 21);
INSERT INTO coordonnees VALUES (default, 47.642709, 6.888996, 21);
INSERT INTO coordonnees VALUES (default, 47.638592, 6.883007, 21);
INSERT INTO coordonnees VALUES (default, 47.638366, 6.879393, 21);
INSERT INTO coordonnees VALUES (default, 47.639277, 6.872369, 21);

/*VIEILLE VILLE*/
#Quartier 1
INSERT INTO coordonnees VALUES (default, 47.640793, 6.859676, 22);
INSERT INTO coordonnees VALUES (default, 47.642736, 6.861899, 22);
INSERT INTO coordonnees VALUES (default, 47.640274, 6.867888, 22);
INSERT INTO coordonnees VALUES (default, 47.639002, 6.865914, 22);
INSERT INTO coordonnees VALUES (default, 47.639161, 6.864465, 22);
INSERT INTO coordonnees VALUES (default, 47.639363, 6.862351, 22);
INSERT INTO coordonnees VALUES (default, 47.639211, 6.862169, 22);
INSERT INTO coordonnees VALUES (default, 47.639384, 6.861289, 22);
INSERT INTO coordonnees VALUES (default, 47.640793, 6.859676, 22);
#Quartier 2
INSERT INTO coordonnees VALUES (default, 47.639002, 6.865914, 23);
INSERT INTO coordonnees VALUES (default, 47.639161, 6.864465, 23);
INSERT INTO coordonnees VALUES (default, 47.639363, 6.862351, 23);
INSERT INTO coordonnees VALUES (default, 47.639211, 6.862169, 23);
INSERT INTO coordonnees VALUES (default, 47.639384, 6.861289, 23);
INSERT INTO coordonnees VALUES (default, 47.638698, 6.861161, 23);
INSERT INTO coordonnees VALUES (default, 47.638156, 6.859595, 23);
INSERT INTO coordonnees VALUES (default, 47.636624, 6.860051, 23);
INSERT INTO coordonnees VALUES (default, 47.637547, 6.862502, 23);
INSERT INTO coordonnees VALUES (default, 47.637251, 6.864562, 23);
INSERT INTO coordonnees VALUES (default, 47.639002, 6.865914, 23);
#Quartier 3
INSERT INTO coordonnees VALUES (default, 47.640793, 6.859676, 24);
INSERT INTO coordonnees VALUES (default, 47.639384, 6.861289, 24);
INSERT INTO coordonnees VALUES (default, 47.638698, 6.861161, 24);
INSERT INTO coordonnees VALUES (default, 47.638156, 6.859595, 24);
INSERT INTO coordonnees VALUES (default, 47.636624, 6.860051, 24);
INSERT INTO coordonnees VALUES (default, 47.635261, 6.861714, 24);
INSERT INTO coordonnees VALUES (default, 47.635057, 6.862915, 24);
INSERT INTO coordonnees VALUES (default, 47.632045, 6.863920, 24);
INSERT INTO coordonnees VALUES (default, 47.630772, 6.863180, 24);
INSERT INTO coordonnees VALUES (default, 47.632423, 6.861514, 24);
INSERT INTO coordonnees VALUES (default, 47.637495, 6.857856, 24);
INSERT INTO coordonnees VALUES (default, 47.640793, 6.859676, 24);
#Quartier 4
INSERT INTO coordonnees VALUES (default, 47.630772, 6.863180, 25);
INSERT INTO coordonnees VALUES (default, 47.632045, 6.863920, 25);
INSERT INTO coordonnees VALUES (default, 47.635057, 6.862915, 25);
INSERT INTO coordonnees VALUES (default, 47.635261, 6.861714, 25);
INSERT INTO coordonnees VALUES (default, 47.636624, 6.860051, 25);
INSERT INTO coordonnees VALUES (default, 47.637547, 6.862502, 25);
INSERT INTO coordonnees VALUES (default, 47.637251, 6.864562, 25);
INSERT INTO coordonnees VALUES (default, 47.639002, 6.865914, 25);
INSERT INTO coordonnees VALUES (default, 47.640274, 6.867888, 25);
INSERT INTO coordonnees VALUES (default, 47.639277, 6.872369, 25);
INSERT INTO coordonnees VALUES (default, 47.638366, 6.879393, 25);
INSERT INTO coordonnees VALUES (default, 47.630000, 6.862815, 25);
INSERT INTO coordonnees VALUES (default, 47.630772, 6.863180, 25);
#Quartier 5
INSERT INTO coordonnees VALUES (default, 47.630000, 6.862815, 26);
INSERT INTO coordonnees VALUES (default, 47.638366, 6.879393, 26);
INSERT INTO coordonnees VALUES (default, 47.636038, 6.881191, 26);
INSERT INTO coordonnees VALUES (default, 47.629603, 6.878607, 26);
INSERT INTO coordonnees VALUES (default, 47.624986, 6.862916, 26);
INSERT INTO coordonnees VALUES (default, 47.630000, 6.862815, 26);

/*CENTRE VILLE*/
#Quartier 1
INSERT INTO coordonnees VALUES (default, 47.624986, 6.862916, 27);
INSERT INTO coordonnees VALUES (default, 47.630000, 6.862815, 27);
INSERT INTO coordonnees VALUES (default, 47.630772, 6.863180, 27);
INSERT INTO coordonnees VALUES (default, 47.632423, 6.861514, 27);
INSERT INTO coordonnees VALUES (default, 47.631503, 6.860902, 27);
INSERT INTO coordonnees VALUES (default, 47.631409, 6.856589, 27);
INSERT INTO coordonnees VALUES (default, 47.630006, 6.856192, 27);
INSERT INTO coordonnees VALUES (default, 47.626594, 6.859034, 27);
INSERT INTO coordonnees VALUES (default, 47.623779, 6.861324, 27);
INSERT INTO coordonnees VALUES (default, 47.624986, 6.862916, 27);
#Quartier 2
INSERT INTO coordonnees VALUES (default, 47.632423, 6.861514, 28);
INSERT INTO coordonnees VALUES (default, 47.631503, 6.860902, 28);
INSERT INTO coordonnees VALUES (default, 47.631409, 6.856589, 28);
INSERT INTO coordonnees VALUES (default, 47.634075, 6.857284, 28);
INSERT INTO coordonnees VALUES (default, 47.637495, 6.857856, 28);
INSERT INTO coordonnees VALUES (default, 47.632423, 6.861514, 28);
#Quartier 3
INSERT INTO coordonnees VALUES (default, 47.630006, 6.856192, 29);
INSERT INTO coordonnees VALUES (default, 47.634075, 6.857284, 29);
INSERT INTO coordonnees VALUES (default, 47.634061, 6.853701, 29);
INSERT INTO coordonnees VALUES (default, 47.630006, 6.856192, 29);
#Quartier 4
INSERT INTO coordonnees VALUES (default, 47.634061, 6.853701, 30);
INSERT INTO coordonnees VALUES (default, 47.635416, 6.852630, 30);
INSERT INTO coordonnees VALUES (default, 47.638297, 6.851494, 30);
INSERT INTO coordonnees VALUES (default, 47.637495, 6.857856, 30);
INSERT INTO coordonnees VALUES (default, 47.634075, 6.857284, 30);
INSERT INTO coordonnees VALUES (default, 47.634061, 6.853701, 30);
#Quartier 5
INSERT INTO coordonnees VALUES (default, 47.637495, 6.857856, 31);
INSERT INTO coordonnees VALUES (default, 47.638297, 6.851494, 31);
INSERT INTO coordonnees VALUES (default, 47.641022, 6.849813, 31);
INSERT INTO coordonnees VALUES (default, 47.641561, 6.857178, 31);
INSERT INTO coordonnees VALUES (default, 47.640793, 6.859676, 31);
INSERT INTO coordonnees VALUES (default, 47.637495, 6.857856, 31);

/*RESI*/
#Quartier 1
INSERT INTO coordonnees VALUES (default, 47.635987, 6.835030, 32);
INSERT INTO coordonnees VALUES (default, 47.636388, 6.838195, 32);
INSERT INTO coordonnees VALUES (default, 47.626581, 6.846320, 32);
INSERT INTO coordonnees VALUES (default, 47.627937, 6.840301, 32);
INSERT INTO coordonnees VALUES (default, 47.635987, 6.835030, 32);
#Quartier 2
INSERT INTO coordonnees VALUES (default, 47.636388, 6.838195, 33);
INSERT INTO coordonnees VALUES (default, 47.626581, 6.846320, 33);
INSERT INTO coordonnees VALUES (default, 47.634774, 6.851097, 33);
INSERT INTO coordonnees VALUES (default, 47.637044, 6.844263, 33);
INSERT INTO coordonnees VALUES (default, 47.636957, 6.842716, 33);
INSERT INTO coordonnees VALUES (default, 47.636388, 6.838195, 33);
#Quartier 3
INSERT INTO coordonnees VALUES (default, 47.634774, 6.851097, 34);
INSERT INTO coordonnees VALUES (default, 47.635416, 6.852630, 34);
INSERT INTO coordonnees VALUES (default, 47.634061, 6.853701, 34);
INSERT INTO coordonnees VALUES (default, 47.630006, 6.856192, 34);
INSERT INTO coordonnees VALUES (default, 47.626594, 6.859034, 34);
INSERT INTO coordonnees VALUES (default, 47.626317, 6.855299, 34);
INSERT INTO coordonnees VALUES (default, 47.626581, 6.846320, 34);
INSERT INTO coordonnees VALUES (default, 47.634774, 6.851097, 34);
#Quartier 4
INSERT INTO coordonnees VALUES (default, 47.626317, 6.855299, 35);
INSERT INTO coordonnees VALUES (default, 47.626581, 6.846320, 35);
INSERT INTO coordonnees VALUES (default, 47.620377, 6.849008, 35);
INSERT INTO coordonnees VALUES (default, 47.620339, 6.852536, 35);
INSERT INTO coordonnees VALUES (default, 47.626317, 6.855299, 35);
#Quartier 5
INSERT INTO coordonnees VALUES (default, 47.636957, 6.842716, 36);
INSERT INTO coordonnees VALUES (default, 47.640519, 6.841999, 36);
INSERT INTO coordonnees VALUES (default, 47.641022, 6.849813, 36);
INSERT INTO coordonnees VALUES (default, 47.638297, 6.851494, 36);
INSERT INTO coordonnees VALUES (default, 47.635416, 6.852630, 36);
INSERT INTO coordonnees VALUES (default, 47.634774, 6.851097, 36);
INSERT INTO coordonnees VALUES (default, 47.637044, 6.844263, 36);
INSERT INTO coordonnees VALUES (default, 47.636948, 6.842731, 36);
INSERT INTO coordonnees VALUES (default, 47.636957, 6.842716, 36);

CREATE TABLE pointEquipe (
  id          INT NOT NULL AUTO_INCREMENT,
  quartier_id INT,
  equipe_id   INT,
  nbPoints    INT,

  PRIMARY KEY (id),

  CONSTRAINT fk_quartier_id_pointEquipe FOREIGN KEY (quartier_id) REFERENCES quartier (id),
  CONSTRAINT fk_equipe_id_pointEquipe FOREIGN KEY (equipe_id) REFERENCES equipe (id)
);

/* POINT TECHNOMANCIEN */
INSERT INTO pointEquipe VALUES (default, 1, 1, 10);
INSERT INTO pointEquipe VALUES (default, 2, 1, 10);
INSERT INTO pointEquipe VALUES (default, 3, 1, 10);
INSERT INTO pointEquipe VALUES (default, 4, 1, 10);
INSERT INTO pointEquipe VALUES (default, 5, 1, 10);
INSERT INTO pointEquipe VALUES (default, 6, 1, 0);
INSERT INTO pointEquipe VALUES (default, 7, 1, 0);
INSERT INTO pointEquipe VALUES (default, 8, 1, 0);
INSERT INTO pointEquipe VALUES (default, 9, 1, 0);
INSERT INTO pointEquipe VALUES (default, 10, 1, 0);
INSERT INTO pointEquipe VALUES (default, 11, 1, 0);
INSERT INTO pointEquipe VALUES (default, 12, 1, 0);
INSERT INTO pointEquipe VALUES (default, 13, 1, 0);
INSERT INTO pointEquipe VALUES (default, 14, 1, 0);
INSERT INTO pointEquipe VALUES (default, 15, 1, 0);
INSERT INTO pointEquipe VALUES (default, 16, 1, 0);
INSERT INTO pointEquipe VALUES (default, 17, 1, 0);
INSERT INTO pointEquipe VALUES (default, 18, 1, 0);
INSERT INTO pointEquipe VALUES (default, 19, 1, 0);
INSERT INTO pointEquipe VALUES (default, 20, 1, 0);
INSERT INTO pointEquipe VALUES (default, 21, 1, 0);
INSERT INTO pointEquipe VALUES (default, 22, 1, 0);
INSERT INTO pointEquipe VALUES (default, 23, 1, 0);
INSERT INTO pointEquipe VALUES (default, 24, 1, 0);
INSERT INTO pointEquipe VALUES (default, 25, 1, 0);
INSERT INTO pointEquipe VALUES (default, 26, 1, 0);
INSERT INTO pointEquipe VALUES (default, 27, 1, 0);
INSERT INTO pointEquipe VALUES (default, 28, 1, 0);
INSERT INTO pointEquipe VALUES (default, 29, 1, 0);
INSERT INTO pointEquipe VALUES (default, 30, 1, 0);
INSERT INTO pointEquipe VALUES (default, 31, 1, 0);
INSERT INTO pointEquipe VALUES (default, 32, 1, 0);
INSERT INTO pointEquipe VALUES (default, 33, 1, 0);
INSERT INTO pointEquipe VALUES (default, 34, 1, 0);
INSERT INTO pointEquipe VALUES (default, 35, 1, 0);
INSERT INTO pointEquipe VALUES (default, 36, 1, 0);

/* POINT VOSGE */
INSERT INTO pointEquipe VALUES (default, 1, 2, 0);
INSERT INTO pointEquipe VALUES (default, 2, 2, 0);
INSERT INTO pointEquipe VALUES (default, 3, 2, 0);
INSERT INTO pointEquipe VALUES (default, 4, 2, 0);
INSERT INTO pointEquipe VALUES (default, 5, 2, 0);
INSERT INTO pointEquipe VALUES (default, 6, 2, 10);
INSERT INTO pointEquipe VALUES (default, 7, 2, 10);
INSERT INTO pointEquipe VALUES (default, 8, 2, 10);
INSERT INTO pointEquipe VALUES (default, 9, 2, 10);
INSERT INTO pointEquipe VALUES (default, 10, 2, 10);
INSERT INTO pointEquipe VALUES (default, 11, 2, 0);
INSERT INTO pointEquipe VALUES (default, 12, 2, 0);
INSERT INTO pointEquipe VALUES (default, 13, 2, 0);
INSERT INTO pointEquipe VALUES (default, 14, 2, 0);
INSERT INTO pointEquipe VALUES (default, 15, 2, 0);
INSERT INTO pointEquipe VALUES (default, 16, 2, 0);
INSERT INTO pointEquipe VALUES (default, 17, 2, 0);
INSERT INTO pointEquipe VALUES (default, 18, 2, 0);
INSERT INTO pointEquipe VALUES (default, 19, 2, 0);
INSERT INTO pointEquipe VALUES (default, 20, 2, 0);
INSERT INTO pointEquipe VALUES (default, 21, 2, 0);
INSERT INTO pointEquipe VALUES (default, 22, 2, 0);
INSERT INTO pointEquipe VALUES (default, 23, 2, 0);
INSERT INTO pointEquipe VALUES (default, 24, 2, 0);
INSERT INTO pointEquipe VALUES (default, 25, 2, 0);
INSERT INTO pointEquipe VALUES (default, 26, 2, 0);
INSERT INTO pointEquipe VALUES (default, 27, 2, 0);
INSERT INTO pointEquipe VALUES (default, 28, 2, 0);
INSERT INTO pointEquipe VALUES (default, 29, 2, 0);
INSERT INTO pointEquipe VALUES (default, 30, 2, 0);
INSERT INTO pointEquipe VALUES (default, 31, 2, 0);
INSERT INTO pointEquipe VALUES (default, 32, 2, 0);
INSERT INTO pointEquipe VALUES (default, 33, 2, 0);
INSERT INTO pointEquipe VALUES (default, 34, 2, 0);
INSERT INTO pointEquipe VALUES (default, 35, 2, 0);
INSERT INTO pointEquipe VALUES (default, 36, 2, 0);

/* POINT RESISTANT */
INSERT INTO pointEquipe VALUES (default, 1, 3, 0);
INSERT INTO pointEquipe VALUES (default, 2, 3, 0);
INSERT INTO pointEquipe VALUES (default, 3, 3, 0);
INSERT INTO pointEquipe VALUES (default, 4, 3, 0);
INSERT INTO pointEquipe VALUES (default, 5, 3, 0);
INSERT INTO pointEquipe VALUES (default, 6, 3, 0);
INSERT INTO pointEquipe VALUES (default, 7, 3, 0);
INSERT INTO pointEquipe VALUES (default, 8, 3, 0);
INSERT INTO pointEquipe VALUES (default, 9, 3, 0);
INSERT INTO pointEquipe VALUES (default, 10, 3, 0);
INSERT INTO pointEquipe VALUES (default, 11, 3, 10);
INSERT INTO pointEquipe VALUES (default, 12, 3, 10);
INSERT INTO pointEquipe VALUES (default, 13, 3, 10);
INSERT INTO pointEquipe VALUES (default, 14, 3, 10);
INSERT INTO pointEquipe VALUES (default, 15, 3, 10);
INSERT INTO pointEquipe VALUES (default, 16, 3, 10);
INSERT INTO pointEquipe VALUES (default, 17, 3, 0);
INSERT INTO pointEquipe VALUES (default, 18, 3, 0);
INSERT INTO pointEquipe VALUES (default, 19, 3, 0);
INSERT INTO pointEquipe VALUES (default, 20, 3, 0);
INSERT INTO pointEquipe VALUES (default, 21, 3, 0);
INSERT INTO pointEquipe VALUES (default, 22, 3, 0);
INSERT INTO pointEquipe VALUES (default, 23, 3, 0);
INSERT INTO pointEquipe VALUES (default, 24, 3, 0);
INSERT INTO pointEquipe VALUES (default, 25, 3, 0);
INSERT INTO pointEquipe VALUES (default, 26, 3, 0);
INSERT INTO pointEquipe VALUES (default, 27, 3, 0);
INSERT INTO pointEquipe VALUES (default, 28, 3, 0);
INSERT INTO pointEquipe VALUES (default, 29, 3, 0);
INSERT INTO pointEquipe VALUES (default, 30, 3, 0);
INSERT INTO pointEquipe VALUES (default, 31, 3, 0);
INSERT INTO pointEquipe VALUES (default, 32, 3, 0);
INSERT INTO pointEquipe VALUES (default, 33, 3, 0);
INSERT INTO pointEquipe VALUES (default, 34, 3, 0);
INSERT INTO pointEquipe VALUES (default, 35, 3, 0);
INSERT INTO pointEquipe VALUES (default, 36, 3, 0);

/* POINT TOUR */
INSERT INTO pointEquipe VALUES (default, 1, 4, 0);
INSERT INTO pointEquipe VALUES (default, 2, 4, 0);
INSERT INTO pointEquipe VALUES (default, 3, 4, 0);
INSERT INTO pointEquipe VALUES (default, 4, 4, 0);
INSERT INTO pointEquipe VALUES (default, 5, 4, 0);
INSERT INTO pointEquipe VALUES (default, 6, 4, 0);
INSERT INTO pointEquipe VALUES (default, 7, 4, 0);
INSERT INTO pointEquipe VALUES (default, 8, 4, 0);
INSERT INTO pointEquipe VALUES (default, 9, 4, 0);
INSERT INTO pointEquipe VALUES (default, 10, 4, 0);
INSERT INTO pointEquipe VALUES (default, 11, 4, 0);
INSERT INTO pointEquipe VALUES (default, 12, 4, 0);
INSERT INTO pointEquipe VALUES (default, 13, 4, 0);
INSERT INTO pointEquipe VALUES (default, 14, 4, 0);
INSERT INTO pointEquipe VALUES (default, 15, 4, 0);
INSERT INTO pointEquipe VALUES (default, 16, 4, 0);
INSERT INTO pointEquipe VALUES (default, 17, 4, 10);
INSERT INTO pointEquipe VALUES (default, 18, 4, 10);
INSERT INTO pointEquipe VALUES (default, 19, 4, 10);
INSERT INTO pointEquipe VALUES (default, 20, 4, 10);
INSERT INTO pointEquipe VALUES (default, 21, 4, 10);
INSERT INTO pointEquipe VALUES (default, 22, 4, 0);
INSERT INTO pointEquipe VALUES (default, 23, 4, 0);
INSERT INTO pointEquipe VALUES (default, 24, 4, 0);
INSERT INTO pointEquipe VALUES (default, 25, 4, 0);
INSERT INTO pointEquipe VALUES (default, 26, 4, 0);
INSERT INTO pointEquipe VALUES (default, 27, 4, 0);
INSERT INTO pointEquipe VALUES (default, 28, 4, 0);
INSERT INTO pointEquipe VALUES (default, 29, 4, 0);
INSERT INTO pointEquipe VALUES (default, 30, 4, 0);
INSERT INTO pointEquipe VALUES (default, 31, 4, 0);
INSERT INTO pointEquipe VALUES (default, 32, 4, 0);
INSERT INTO pointEquipe VALUES (default, 33, 4, 0);
INSERT INTO pointEquipe VALUES (default, 34, 4, 0);
INSERT INTO pointEquipe VALUES (default, 35, 4, 0);
INSERT INTO pointEquipe VALUES (default, 36, 4, 0);

/* POINT DEFENSEUR */
INSERT INTO pointEquipe VALUES (default, 1, 5, 0);
INSERT INTO pointEquipe VALUES (default, 2, 5, 0);
INSERT INTO pointEquipe VALUES (default, 3, 5, 0);
INSERT INTO pointEquipe VALUES (default, 4, 5, 0);
INSERT INTO pointEquipe VALUES (default, 5, 5, 0);
INSERT INTO pointEquipe VALUES (default, 6, 5, 0);
INSERT INTO pointEquipe VALUES (default, 7, 5, 0);
INSERT INTO pointEquipe VALUES (default, 8, 5, 0);
INSERT INTO pointEquipe VALUES (default, 9, 5, 0);
INSERT INTO pointEquipe VALUES (default, 10, 5, 0);
INSERT INTO pointEquipe VALUES (default, 11, 5, 0);
INSERT INTO pointEquipe VALUES (default, 12, 5, 0);
INSERT INTO pointEquipe VALUES (default, 13, 5, 0);
INSERT INTO pointEquipe VALUES (default, 14, 5, 0);
INSERT INTO pointEquipe VALUES (default, 15, 5, 0);
INSERT INTO pointEquipe VALUES (default, 16, 5, 0);
INSERT INTO pointEquipe VALUES (default, 17, 5, 0);
INSERT INTO pointEquipe VALUES (default, 18, 5, 0);
INSERT INTO pointEquipe VALUES (default, 19, 5, 0);
INSERT INTO pointEquipe VALUES (default, 20, 5, 0);
INSERT INTO pointEquipe VALUES (default, 21, 5, 0);
INSERT INTO pointEquipe VALUES (default, 22, 5, 10);
INSERT INTO pointEquipe VALUES (default, 23, 5, 10);
INSERT INTO pointEquipe VALUES (default, 24, 5, 10);
INSERT INTO pointEquipe VALUES (default, 25, 5, 10);
INSERT INTO pointEquipe VALUES (default, 26, 5, 10);
INSERT INTO pointEquipe VALUES (default, 27, 5, 0);
INSERT INTO pointEquipe VALUES (default, 28, 5, 0);
INSERT INTO pointEquipe VALUES (default, 29, 5, 0);
INSERT INTO pointEquipe VALUES (default, 30, 5, 0);
INSERT INTO pointEquipe VALUES (default, 31, 5, 0);
INSERT INTO pointEquipe VALUES (default, 32, 5, 0);
INSERT INTO pointEquipe VALUES (default, 33, 5, 0);
INSERT INTO pointEquipe VALUES (default, 34, 5, 0);
INSERT INTO pointEquipe VALUES (default, 35, 5, 0);
INSERT INTO pointEquipe VALUES (default, 36, 5, 0);

/* POINT COMMERCANT */
INSERT INTO pointEquipe VALUES (default, 1, 6, 0);
INSERT INTO pointEquipe VALUES (default, 2, 6, 0);
INSERT INTO pointEquipe VALUES (default, 3, 6, 0);
INSERT INTO pointEquipe VALUES (default, 4, 6, 0);
INSERT INTO pointEquipe VALUES (default, 5, 6, 0);
INSERT INTO pointEquipe VALUES (default, 6, 6, 0);
INSERT INTO pointEquipe VALUES (default, 7, 6, 0);
INSERT INTO pointEquipe VALUES (default, 8, 6, 0);
INSERT INTO pointEquipe VALUES (default, 9, 6, 0);
INSERT INTO pointEquipe VALUES (default, 10, 6, 0);
INSERT INTO pointEquipe VALUES (default, 11, 6, 0);
INSERT INTO pointEquipe VALUES (default, 12, 6, 0);
INSERT INTO pointEquipe VALUES (default, 13, 6, 0);
INSERT INTO pointEquipe VALUES (default, 14, 6, 0);
INSERT INTO pointEquipe VALUES (default, 15, 6, 0);
INSERT INTO pointEquipe VALUES (default, 16, 6, 0);
INSERT INTO pointEquipe VALUES (default, 17, 6, 0);
INSERT INTO pointEquipe VALUES (default, 18, 6, 0);
INSERT INTO pointEquipe VALUES (default, 19, 6, 0);
INSERT INTO pointEquipe VALUES (default, 20, 6, 0);
INSERT INTO pointEquipe VALUES (default, 21, 6, 0);
INSERT INTO pointEquipe VALUES (default, 22, 6, 0);
INSERT INTO pointEquipe VALUES (default, 23, 6, 0);
INSERT INTO pointEquipe VALUES (default, 24, 6, 0);
INSERT INTO pointEquipe VALUES (default, 25, 6, 0);
INSERT INTO pointEquipe VALUES (default, 26, 6, 0);
INSERT INTO pointEquipe VALUES (default, 27, 6, 10);
INSERT INTO pointEquipe VALUES (default, 28, 6, 10);
INSERT INTO pointEquipe VALUES (default, 29, 6, 10);
INSERT INTO pointEquipe VALUES (default, 30, 6, 10);
INSERT INTO pointEquipe VALUES (default, 31, 6, 10);
INSERT INTO pointEquipe VALUES (default, 32, 6, 0);
INSERT INTO pointEquipe VALUES (default, 33, 6, 0);
INSERT INTO pointEquipe VALUES (default, 34, 6, 0);
INSERT INTO pointEquipe VALUES (default, 35, 6, 0);
INSERT INTO pointEquipe VALUES (default, 36, 6, 0);

/* POINT REDSTONE */
INSERT INTO pointEquipe VALUES (default, 1, 7, 0);
INSERT INTO pointEquipe VALUES (default, 2, 7, 0);
INSERT INTO pointEquipe VALUES (default, 3, 7, 0);
INSERT INTO pointEquipe VALUES (default, 4, 7, 0);
INSERT INTO pointEquipe VALUES (default, 5, 7, 0);
INSERT INTO pointEquipe VALUES (default, 6, 7, 0);
INSERT INTO pointEquipe VALUES (default, 7, 7, 0);
INSERT INTO pointEquipe VALUES (default, 8, 7, 0);
INSERT INTO pointEquipe VALUES (default, 9, 7, 0);
INSERT INTO pointEquipe VALUES (default, 10, 7, 0);
INSERT INTO pointEquipe VALUES (default, 11, 7, 0);
INSERT INTO pointEquipe VALUES (default, 12, 7, 0);
INSERT INTO pointEquipe VALUES (default, 13, 7, 0);
INSERT INTO pointEquipe VALUES (default, 14, 7, 0);
INSERT INTO pointEquipe VALUES (default, 15, 7, 0);
INSERT INTO pointEquipe VALUES (default, 16, 7, 0);
INSERT INTO pointEquipe VALUES (default, 17, 7, 0);
INSERT INTO pointEquipe VALUES (default, 18, 7, 0);
INSERT INTO pointEquipe VALUES (default, 19, 7, 0);
INSERT INTO pointEquipe VALUES (default, 20, 7, 0);
INSERT INTO pointEquipe VALUES (default, 21, 7, 0);
INSERT INTO pointEquipe VALUES (default, 22, 7, 0);
INSERT INTO pointEquipe VALUES (default, 23, 7, 0);
INSERT INTO pointEquipe VALUES (default, 24, 7, 0);
INSERT INTO pointEquipe VALUES (default, 25, 7, 0);
INSERT INTO pointEquipe VALUES (default, 26, 7, 0);
INSERT INTO pointEquipe VALUES (default, 27, 7, 0);
INSERT INTO pointEquipe VALUES (default, 28, 7, 0);
INSERT INTO pointEquipe VALUES (default, 29, 7, 0);
INSERT INTO pointEquipe VALUES (default, 30, 7, 0);
INSERT INTO pointEquipe VALUES (default, 31, 7, 0);
INSERT INTO pointEquipe VALUES (default, 32, 7, 10);
INSERT INTO pointEquipe VALUES (default, 33, 7, 10);
INSERT INTO pointEquipe VALUES (default, 34, 7, 10);
INSERT INTO pointEquipe VALUES (default, 35, 7, 10);
INSERT INTO pointEquipe VALUES (default, 36, 7, 10);