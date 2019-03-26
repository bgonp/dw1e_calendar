
/* TABLA usuario */ -- TO DO

CREATE TABLE profesor (
  id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
  nombre VARCHAR(15) NOT NULL,
  apellidos VARCHAR(30) NOT NULL,
  email VARCHAR(50)

) ENGINE=InnoDB;

CREATE TABLE alumno (
  id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
  nombre VARCHAR(15) NOT NULL,
  apellidos VARCHAR(30) NOT NULL,
  email VARCHAR(50),
  user_id INT,
  FOREIGN KEY (user_id) REFERENCES tb_User(user_id)
) ENGINE=InnoDB;

CREATE TABLE asignatura (
  id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
  nombre VARCHAR(15) NOT NULL,
  abrev VARCHAR(4) NOT NULL,
  id_profesor INT NOT NULL,
  url varchar(1000),
  FOREIGN KEY (id_profesor) REFERENCES profesor(id)
) ENGINE=InnoDB;

CREATE TABLE evento (
    id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    fecha DATE NOT NULL,
    comentario VARCHAR(250),
    id_asignatura INT NOT NULL,
    tipo ENUM('Exámen','Entrega','Otros') NOT NULL,
    FOREIGN KEY (id_asignatura) REFERENCES asignatura (id)
) ENGINE = InnoDB;

CREATE TABLE estudia (
  alumno_id INT,
  asignatura_id INT,
  PRIMARY KEY (alumno_id, asignatura_id),
  FOREIGN KEY (alumno_id) REFERENCES alumno (id),
  FOREIGN KEY (asignatura_id) REFERENCES asignatura (id)
) ENGINE = InnoDB;
