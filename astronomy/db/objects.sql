# author: Raymond Byczko
# file: objects.sql
# start date: 2012-05-15 May 15, 2012
# purpose: To store the positions of stars

CREATE DATABASE IF NOT EXISTS astronomy;
USE astronomy;
CREATE TABLE skyobjects
(id INT AUTO_INCREMENT, 
name VARCHAR(64),
raHrs DOUBLE NOT NULL,
raMin DOUBLE NOT NULL,
raSec DOUBLE NOT NULL,
decDeg DOUBLE NOT NULL,
decMin DOUBLE NOT NULL,
decSec DOUBLE NOT NULL,
CONSTRAINT PRIMARY KEY(id))
ENGINE = InnoDB;

CREATE TABLE constellations
(id INT AUTO_INCREMENT,
name VARCHAR(64),
CONSTRAINT PRIMARY KEY(id)
)
ENGINE = InnoDB;

CREATE TABLE skyobject_membership
(
id INT AUTO_INCREMENT,
skyobjects_id INT NOT NULL UNIQUE,
constellations_id INT NOT NULL,
CONSTRAINT PRIMARY KEY(id),
CONSTRAINT FOREIGN KEY (skyobjects_id) REFERENCES skyobjects(id),
CONSTRAINT FOREIGN KEY (constellations_id) REFERENCES constellations(id)
)
ENGINE = InnoDB;
