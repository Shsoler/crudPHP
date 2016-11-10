CREATE TABLE `Consultorio`.`Paciente` ( 
	`id` INT NOT NULL AUTO_INCREMENT , 
	`nome` VARCHAR(100) NOT NULL , 
	`tel` VARCHAR(11) NOT NULL , 
	`sexo` CHAR(1) NOT NULL , `idade` INT NOT NULL 
	) ENGINE = InnoDB;

CREATE TABLE Consultorio.Medico(
	id int NOT NULL AUTO_INCREMENT,
	nome VARCHAR(100) NOT NULL,
	tel VARCHAR(11) NOT NULL,
	especialidade VARCHAR(100) NOT NULL
)



CREATE TABLE Consultorio.Consulta(
	id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
	datacon DATETIME NOT NULL,
	medico_id int ,
    FOREIGN KEY (medico_id) REFERENCES Medico(id),
	paciente_id int, 
    FOREIGN KEY (paciente_id) REFERENCES Paciente(id)
)