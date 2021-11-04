CREATE DATABASE exercise3;

USE exercise3;

CREATE TABLE `exercise3`.`usuario` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `cpf` VARCHAR(11) NOT NULL,
  `nome` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `cpf_UNIQUE` (`cpf` ASC) VISIBLE);

CREATE TABLE `exercise3`.`info` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `cpf` VARCHAR(11) NOT NULL,
  `genero` ENUM('M', 'F') NOT NULL,
  `ano_nascimento` INT(4) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `cpf_UNIQUE` (`cpf` ASC) VISIBLE,
  CONSTRAINT `fk_info_1`
    FOREIGN KEY (`cpf`)
    REFERENCES `exercise3`.`usuario` (`cpf`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


INSERT INTO usuario (cpf, nome) VALUES 
(16798125050, "Luke Skywalker"),
(59875804045, "Bruce Wayne"),
(04707649025, "Diane Prince"),
(21142450040, "Bruce Banner"),
(83257946074, "Harley Quinn"),
(07583509025, "Peter Parker");

INSERT INTO info (cpf, genero, ano_nascimento) VALUES 
(16798125050, "M", 1976),
(59875804045, "M", 1960),
(04707649025, "F", 1988),
(21142450040, "M", 1954),
(83257946074, "F", 1970),
(07583509025, "M", 1972);

SELECT CONCAT(u.nome, " - ", i.genero) AS usuario, 
IF(YEAR(NOW()) - i.ano_nascimento > 50, "SIM", "NÃO") AS maior_50_anos
FROM usuario AS u
JOIN info AS i ON u.cpf = i.cpf
WHERE i.genero = "M"
AND u.cpf != "59875804045" # Batman não vale
ORDER BY u.nome DESC;