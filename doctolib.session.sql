CREATE TABLE IF NOT EXISTS PATIENT (
  PRIMARY KEY (mail),
  mail      VARCHAR(42) NOT NULL,
  nom       VARCHAR(42),
  prenom    VARCHAR(42),
  telephone VARCHAR(42),
  mdp       VARCHAR(42)
);

CREATE TABLE IF NOT EXISTS PRACTICIEN (
  PRIMARY KEY (mail),
  mail       VARCHAR(42) NOT NULL,
  nom        VARCHAR(42),
  prenom     VARCHAR(42),
  telephone  VARCHAR(42),
  ville      VARCHAR(42),
  specialite VARCHAR(42),
  mdp        VARCHAR(42)
);

CREATE TABLE IF NOT EXISTS RDV (
  PRIMARY KEY (id),
  id      INT NOT NULL,
  date    VARCHAR(42),
  horaire VARCHAR(42),
  mail_1  VARCHAR(42) NOT NULL,
  mail_2  VARCHAR(42) NOT NULL
);

ALTER TABLE RDV ADD FOREIGN KEY (mail_2) REFERENCES PATIENT (mail);
ALTER TABLE RDV ADD FOREIGN KEY (mail_1) REFERENCES PRACTICIEN (mail);
