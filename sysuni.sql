
-- -----------------------------------------------------
-- Schema sysuni
-- -----------------------------------------------------
CREATE DATABASE IF NOT EXISTS `sysuni` DEFAULT CHARACTER SET utf8 ;
USE `sysuni` ;

-- -----------------------------------------------------
-- Table `sysuni`.`aluno`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sysuni`.`aluno` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `sexo` char(1) not null,
  `endereco` VARCHAR(45) NOT NULL,
  `telefone` VARCHAR(12) NOT NULL,
  `cpf` VARCHAR(11) UNIQUE NOT NULL,
  `matricula` VARCHAR(11) UNIQUE NULL,
  `status` enum('0','1') DEFAULT 1 NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sysuni`.`curso`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sysuni`.`curso` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(30) NULL,
  `sigla` VARCHAR(4) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sysuni`.`turma`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sysuni`.`turma` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `curso_id` INT NOT NULL,
  `letra` CHAR NOT NULL,
  `periodo` INT(1) NOT NULL,
  `ano` INT(4) NOT NULL,
  `semestre` INT(1) NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_turma_curso`
    FOREIGN KEY (`curso_id`)
    REFERENCES `sysuni`.`curso` (`id`)
    )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sysuni`.`historico`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sysuni`.`aluno_turma` (
  `turma_id` INT NOT NULL,
  `aluno_id` INT NOT NULL,
  CONSTRAINT `fk_turma_aluno_turma`
    FOREIGN KEY (`turma_id`)
    REFERENCES `sysuni`.`turma` (`id`),
  CONSTRAINT `fk_aluno_aluno_turma`
    FOREIGN KEY (`aluno_id`)
    REFERENCES `sysuni`.`aluno` (`id`)
    )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sysuni`.`sistema`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sysuni`.`sistema` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL,
  `login` VARCHAR(15) NULL,
  `senha` VARCHAR(45) NULL,
  `status` enum('0','1') DEFAULT 1 NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;

INSERT INTO `aluno` (`id`, `nome`, `sexo`, `endereco`, `telefone`, `cpf`,`matricula`, `status`) VALUES
(1, 'Joao Pedro Marques Souto', 'M', 'Rua Andalicio Ferraz', '44955444239', '45678912300',NULL,'1'),
(2, 'Roberto Onofre dos Reis', 'M', 'Avenida Sergio Rocha', '73955446688', '24868752311',NULL,'1'),
(3, 'Roger Alves Otoni', 'M', 'Rua Limpido Azul', '33984562175', '12345678911',NULL,'1'),
(4, 'Luzia Santos Ramalho', 'F', 'Rua Acacia Dourada', '21921548795', '27568456233',NULL,'0');


INSERT INTO `curso` (`id`, `nome`, `sigla`) VALUES
(1, 'Engenharia', 'ENG'),
(2, 'Sistemas de Informacao', 'SI'),
(3, 'Administracao', 'ADM');


INSERT INTO `turma` (`id`, `curso_id`, `letra`, `periodo`, `ano`, `semestre`) VALUES
(1, 1, 'A', 1, 2019, 1),
(2, 2, 'A', 5, 2020, 1),
(3, 2, 'B', 5, 2020, 1),
(4, 3, 'A', 1, 2019, 1);


INSERT INTO `sistema`(`id`,`nome`,`login`,`senha`,`status`) VALUES
('1','Administrador','adm',SHA1('adm'),'1');

