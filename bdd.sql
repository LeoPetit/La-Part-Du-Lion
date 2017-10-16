DROP TABLE IF EXISTS pointEquipe, quartier, coordonnees,  competenceEquipe, competence, inventaire, item, utilisateur, equipe;

CREATE TABLE equipe(
	id int NOT NULL AUTO_INCREMENT,
	nom varchar(25),
	descriptif text,

	PRIMARY KEY(id)
);

CREATE TABLE utilisateur (
	id int NOT NULL AUTO_INCREMENT,
	pseudo varchar(25),
	mdp varchar(25),
	email varchar(25),
	pointAction int,
	gold int,
	equipe_id int,

	PRIMARY KEY(id),

	CONSTRAINT fk_equipe_id_utilisateur FOREIGN KEY (equipe_id) REFERENCES equipe(id)
);

CREATE TABLE item(
	id int NOT NULL AUTO_INCREMENT,
	nom varchar(25),
	libelle varchar(25),
	effet varchar(25),

	PRIMARY KEY(id)
);

CREATE TABLE inventaire(
	id int NOT NULL AUTO_INCREMENT,
	user_id int,
	item_id int,

	PRIMARY KEY(id),

	CONSTRAINT fk_user_id_inventaire FOREIGN KEY (user_id) REFERENCES utilisateur(id),
	CONSTRAINT fk_item_id_inventaire FOREIGN KEY (item_id) REFERENCES item(id)
);

CREATE TABLE competence(
	id int AUTO_INCREMENT NOT NULL,
	nom varchar(25),
	coutTotal int,
	paye int,

	PRIMARY KEY(id)
);

CREATE TABLE competenceEquipe(
	id int AUTO_INCREMENT NOT NULL,
	equipe_id int,
	competence_id int,

	PRIMARY KEY(id),

	CONSTRAINT fk_equipe_id_competenceEquipe FOREIGN KEY (equipe_id) REFERENCES equipe(id),
	CONSTRAINT fk_competence_id_competenceEquipe FOREIGN KEY (competence_id) REFERENCES competence(id)
);

CREATE TABLE coordonnees(
  id int NOT NULL AUTO_INCREMENT,
  longi double(7,6),
  lat double(8,6),

  PRIMARY KEY (id)
);

CREATE TABLE quartier(
	id int NOT NULL AUTO_INCREMENT,
	nom varchar(25),
	QG boolean,
	revenus int,
	coordonees_id int,

	PRIMARY KEY(id),

  CONSTRAINT fk_coordonnees_id_quartier FOREIGN KEY (coordonees_id) REFERENCES coordonnees(id)
);

CREATE TABLE pointEquipe(
	id int NOT NULL AUTO_INCREMENT,
	quartier_id int,
	equipe_id int,
	nbPoints int,

	PRIMARY KEY(id),

	CONSTRAINT fk_quartier_id_pointEquipe FOREIGN KEY (quartier_id) REFERENCES quartier(id),
	CONSTRAINT fk_equipe_id_pointEquipe FOREIGN KEY (equipe_id) REFERENCES equipe(id)
);