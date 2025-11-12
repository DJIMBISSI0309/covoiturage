ALTER TABLE reservations
ADD COLUMN latitude DECIMAL(10, 8) NULL COMMENT 'Latitude de la position du client',
ADD COLUMN longitude DECIMAL(11, 8) NULL COMMENT 'Longitude de la position du client',
ADD COLUMN last_location_update TIMESTAMP NULL COMMENT 'Dernière mise à jour de la position',
--ADD COLUMN status VARCHAR(20) NOT NULL DEFAULT 'en_attente' COMMENT 'État de la réservation (en_attente, en_cours, terminee, annulee)';

create table administrateur(
  idadmin int primary key auto_increment,
  idutilisateur int ,
  nom_admin text,
  Email_admin  text,
  mot_de_passe text,
  FOREIGN KEY (idutilisateur) REFERENCES utilisateur (idutilisateur)

)ENGINE=InnoDB;