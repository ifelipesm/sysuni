CREATE DATABASE IF NOT EXISTS `sysuni2` DEFAULT CHARACTER SET utf8 ;
USE `sysuni2` ;

-- -----------------------------------------------------
-- Table `sysuni2`.`curso`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sysuni2`.`curso` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `sigla` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sysuni2`.`matriz`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sysuni2`.`matriz` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL,
  `periodos` VARCHAR(45) NULL,
  `obs` VARCHAR(45) NULL,
  `curso_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_matriz_curso`
    FOREIGN KEY (`curso_id`)
    REFERENCES `sysuni2`.`curso` (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sysuni2`.`disciplina`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sysuni2`.`disciplina` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sysuni2`.`situacao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sysuni2`.`situacao` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL,
  `impedimento` VARCHAR(1) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sysuni2`.`aluno`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sysuni2`.`aluno` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `sexo` CHAR(1) NOT NULL,
  `endereco` VARCHAR(45) NOT NULL,
  `telefone` VARCHAR(12) NOT NULL,
  `cpf` VARCHAR(11) UNIQUE NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sysuni2`.`matricula`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sysuni2`.`matricula` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `numero` VARCHAR(45) NULL,
  `aluno_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_matricula_aluno1`
    FOREIGN KEY (`aluno_id`)
    REFERENCES `sysuni2`.`aluno` (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sysuni2`.`matricula_matriz`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sysuni2`.`matricula_matriz` (
  `matricula_id` INT NOT NULL,
  `matriz_id` INT NOT NULL,
  CONSTRAINT `fk_matricula_matriz_matricula1`
    FOREIGN KEY (`matricula_id`)
    REFERENCES `sysuni2`.`matricula` (`id`),
  CONSTRAINT `fk_matricula_matriz_matriz1`
    FOREIGN KEY (`matriz_id`)
    REFERENCES `sysuni2`.`matriz` (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sysuni2`.`matriz_disciplina`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sysuni2`.`matriz_disciplina` (
  `matriz_id` INT NOT NULL,
  `disciplina_id` INT NOT NULL,
  `periodo` INT NULL,
  `carga` INT NULL,
  `sigla` VARCHAR(5) NULL,
  `complemento` VARCHAR(30) NULL,
  CONSTRAINT `fk_matriz_disciplina_disciplina1`
    FOREIGN KEY (`disciplina_id`)
    REFERENCES `sysuni2`.`disciplina` (`id`),
  CONSTRAINT `fk_matriz_disciplina_matriz1`
    FOREIGN KEY (`matriz_id`)
    REFERENCES `sysuni2`.`matriz` (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sysuni2`.`turma`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sysuni2`.`turma` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(10) NULL,
  `periodo` INT NOT NULL,
  `ano` INT NOT NULL,
  `semestre` INT NOT NULL,
  `matriz_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_turma_matriz`
    FOREIGN KEY (`matriz_id`)
    REFERENCES `sysuni2`.`matriz` (`id`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `sysuni2`.`matricula_turma`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sysuni2`.`matricula_turma` (
  `matricula_id` INT NOT NULL,
  `situacao_id` INT NOT NULL,
  `turma_id` INT NOT NULL,
  CONSTRAINT `fk_matricula_turma_matricula1`
    FOREIGN KEY (`matricula_id`)
    REFERENCES `sysuni2`.`matricula` (`id`),
  CONSTRAINT `fk_matricula_turma_situacao1`
    FOREIGN KEY (`situacao_id`)
    REFERENCES `sysuni2`.`situacao` (`id`),
  CONSTRAINT `fk_matricula_turma_turma1`
    FOREIGN KEY (`turma_id`)
    REFERENCES `sysuni2`.`turma` (`id`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `sysuni2`.`sistema`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sysuni2`.`sistema` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL DEFAULT NULL,
  `login` VARCHAR(15) NULL DEFAULT NULL,
  `senha` VARCHAR(45) NULL DEFAULT NULL,
  `status` ENUM('0', '1') NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


INSERT INTO `aluno` (`id`, `nome`, `sexo`, `endereco`, `telefone`, `cpf`) VALUES
(1, 'Joao Pedro Marques Souto', 'M', 'Rua Andalicio Ferraz', '44955444239', '45678912300'),
(2, 'Roberto Onofre dos Reis', 'M', 'Avenida Sergio Rocha', '73955446688', '24868752311'),
(3, 'Roger Alves Otoni', 'M', 'Rua Limpido Azul', '33984562175', '12345678911'),
(4, 'Luzia Santos Ramalho', 'F', 'Rua Acacia Dourada', '21921548795', '27568456233'),
(5, 'Roberto Freire de Assis', 'M', 'Avenida das Amendoeiras', '33945681242', '45268742300'),
(6, 'Moana Soares Costa', 'F', 'Rua Duque de caixias', '55921567852', '44823486511'),
(7, 'Jose da Costa Pereira', 'M', 'Rua mangabeira do sul', '22955651545', '78246521021'),
(8, 'Rogerio Almeida Carvalho', 'M', 'Rua Soares da Costa', '21978452013', '23587924600');


INSERT INTO `curso` (`id`, `nome`, `sigla`) VALUES
(1, 'Engenharia', 'ENG'),
(2, 'Sistemas de Informacao', 'SI'),
(3, 'Administracao', 'ADM'),
(4, 'Medicina', 'MED'),
(5, 'Direito', 'DIR'),
(6, 'Psicologia', 'PSI');

INSERT INTO `disciplina` (`id`, `nome`) VALUES
(1, 'Linguagens de Programacao'),
(2, 'Calculo Diferencial e Integral'),
(3, 'Algoritmos'),
(4, 'Teoria Geral da Administracao'),
(5, 'Contabilidade'),
(6, 'Planejamento Estrategico'),
(7, 'Mecanica dos Solidos'),
(8, 'Estruturas Metalicas'),
(9, 'Projeto Arquitetonico'),
(10, 'Anatomia Humana'),
(11, 'Fisiologia Humana'),
(12, 'Genetica'),
(13, 'Direito Tributario'),
(14, 'Direito Penal'),
(15, 'Direito Civil'),
(16, 'Processos Cognitivos'),
(17, 'Historia da Psicologia'),
(18, 'Psicofisiologia');

INSERT INTO `matricula` (`id`, `numero`, `aluno_id`) VALUES
(1, '5', 1),
(2, '25', 2),
(3, '35', 3),
(4, '10', 4),
(5, '12', 5),
(12, '250', 6),
(13, '150', 7),
(14, '752', 8);

INSERT INTO `matriz` (`id`, `nome`, `periodos`, `obs`, `curso_id`) VALUES
(1, '119', '1-9', 'matriz engenharia', 1),
(2, '219', '1-9', 'matriz sistemas', 2),
(3, '319', '1-9', 'matriz administracao', 3),
(4, 'MED110', '1-10', 'Matriz Medicina', 4),
(5, 'DIR110', '1-10', 'Matriz Direito', 5),
(6, 'PSI18', '1-8', 'Matriz Psicologia', 6);

INSERT INTO `matriz_disciplina` (`matriz_id`, `disciplina_id`, `periodo`, `carga`, `sigla`, `complemento`) VALUES
(1, 7, 7, 70, 'MESOL', 'ENG'),
(1, 8, 8, 70, 'ESMET', 'ENG'),
(2, 2, 1, 70, 'CDI', 'SI'),
(2, 3, 3, 70, 'ALG', 'SI'),
(5, 13, 6, 70, 'DTRI', 'DIR110 DTRI6'),
(6, 18, 4, 75, 'PFSG', 'PSI18 PFSG4'),
(4, 10, 2, 75, 'ANHM', 'MED110 ANHM2');

INSERT INTO `situacao` (`id`, `nome`, `impedimento`) VALUES
(1, 'Ativo', '0'),
(2, 'Trancamento', '1'),
(3, 'Desligamento', '1');

INSERT INTO `turma` (`id`, `nome`, `periodo`, `ano`, `semestre`, `matriz_id`) VALUES
(7, 'ENG2019211', 10, 2019, 2, 1),
(8, 'SI20202219', 9, 2020, 2, 2),
(9, '520201MED1', 5, 2020, 1, 4),
(10, '620201DIR1', 6, 2020, 1, 5),
(11, '820202PSI1', 8, 2020, 2, 6),
(12, 'ADM5202013', 5, 2020, 1, 3);


INSERT INTO `matricula_matriz` (`matricula_id`, `matriz_id`) VALUES
(1, 1),
(2, 2),
(3, 3);

INSERT INTO `matricula_turma` (`matricula_id`, `situacao_id`, `turma_id`) VALUES
(1, 1, 7),
(2, 1, 8),
(3, 2, 9),
(4, 3, 10);

INSERT INTO `sysuni2`.`sistema`(`id`,`nome`,`login`,`senha`,`status`) VALUES
('1','Administrador','adm',SHA1('adm'),'1');

ALTER TABLE `aluno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `curso`
--
ALTER TABLE `curso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `disciplina`
--
ALTER TABLE `disciplina`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `matricula`
--
ALTER TABLE `matricula`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `matriz`
--
ALTER TABLE `matriz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sistema`
--
ALTER TABLE `sistema`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `situacao`
--
ALTER TABLE `situacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `turma`
--
ALTER TABLE `turma`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
