-- deleta e logo depois cria a base de dados, se ainda não existe. Então, declara que o uso dela
DROP database if exists db_cep_consulta;
CREATE database if not exists db_cep_consulta DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE db_cep_consulta;
-- começa a declarar as tabelas, pela ordem de tabelas mais independentes para as mais dependentes, no relacionamento do modelo.
-- primeiro, tabela de login
CREATE table IF NOT EXISTS tb_cep(
  -- atributos
  cd_id INT UNSIGNED NOT NULL auto_increment,
  -- chave primária
  nm_logradouro VARCHAR(200) NOT NULL,
  -- chave unica index
  cd_uf VARCHAR(3) NOT NULL,
  nm_cidade VARCHAR(100) NOT NULL,
  cd_cep varchar(10) NOT NULL,
  -- definicao das chaves
  -- primaria
  constraint pk_cep primary key (cd_id)
) CHARACTER SET utf8mb4;