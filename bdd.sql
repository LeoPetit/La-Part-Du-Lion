DROP TABLE IF EXISTS pointEquipe, quartier, coordonnees, competenceEquipe, competence, inventaire, item, utilisateur, equipe;

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

CREATE TABLE coordonnees (
  id    INT NOT NULL AUTO_INCREMENT,
  lat   DOUBLE(8, 6),
  longi DOUBLE(7, 6),

  PRIMARY KEY (id)
);

INSERT INTO coordonnees VALUES (default, 47.646239, 6.818084);
INSERT INTO coordonnees VALUES (default, 47.647182, 6.824770);
INSERT INTO coordonnees VALUES (default, 47.645348, 6.828197);
INSERT INTO coordonnees VALUES (default, 47.641843, 6.827979);
INSERT INTO coordonnees VALUES (default, 47.640323, 6.831121);
INSERT INTO coordonnees VALUES (default, 47.646907, 6.833193);
INSERT INTO coordonnees VALUES (default, 47.651733, 6.825826);
INSERT INTO coordonnees VALUES (default, 47.650075, 6.821675);
INSERT INTO coordonnees VALUES (default, 47.646239, 6.818084);
/*INSERT INTO coordonnees VALUES (default, );
INSERT INTO coordonnees VALUES (default, );
INSERT INTO coordonnees VALUES (default, );
INSERT INTO coordonnees VALUES (default, );
INSERT INTO coordonnees VALUES (default, );
INSERT INTO coordonnees VALUES (default, );
INSERT INTO coordonnees VALUES (default, );
INSERT INTO coordonnees VALUES (default, );
INSERT INTO coordonnees VALUES (default, );
INSERT INTO coordonnees VALUES (default, );
INSERT INTO coordonnees VALUES (default, );
INSERT INTO coordonnees VALUES (default, );
INSERT INTO coordonnees VALUES (default, );
INSERT INTO coordonnees VALUES (default, );
INSERT INTO coordonnees VALUES (default, );
INSERT INTO coordonnees VALUES (default, );
INSERT INTO coordonnees VALUES (default, );
INSERT INTO coordonnees VALUES (default, );
INSERT INTO coordonnees VALUES (default, );*/


CREATE TABLE quartier (
  id            INT NOT NULL AUTO_INCREMENT,
  nom           VARCHAR(25),
  QG            BOOLEAN,
  revenus       INT,
  coordonees_id INT,

  PRIMARY KEY (id),

  CONSTRAINT fk_coordonnees_id_quartier FOREIGN KEY (coordonees_id) REFERENCES coordonnees (id)
);

CREATE TABLE pointEquipe (
  id          INT NOT NULL AUTO_INCREMENT,
  quartier_id INT,
  equipe_id   INT,
  nbPoints    INT,

  PRIMARY KEY (id),

  CONSTRAINT fk_quartier_id_pointEquipe FOREIGN KEY (quartier_id) REFERENCES quartier (id),
  CONSTRAINT fk_equipe_id_pointEquipe FOREIGN KEY (equipe_id) REFERENCES equipe (id)
);