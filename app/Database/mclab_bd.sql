-- MCLab — Estrutura do Banco de Dados
-- Gerado em: 2026-05-18
-- Apenas estrutura, sem dados.

CREATE DATABASE IF NOT EXISTS `mclab_bd`
  DEFAULT CHARACTER SET utf8mb4
  COLLATE utf8mb4_general_ci;

USE `mclab_bd`;

SET FOREIGN_KEY_CHECKS = 0;

-- -------------------------------------------------------
-- Tabela: usuarios
-- -------------------------------------------------------
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id`         int(11)      NOT NULL AUTO_INCREMENT,
  `usuario`    varchar(100) DEFAULT NULL,
  `senha`      varchar(255) NOT NULL,
  `created_at` timestamp    NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- -------------------------------------------------------
-- Tabela: insumos
-- -------------------------------------------------------
DROP TABLE IF EXISTS `insumos`;
CREATE TABLE `insumos` (
  `id`               int(11)                        NOT NULL AUTO_INCREMENT,
  `nome`             varchar(100)                   NOT NULL,
  `risco`            enum('baixo','medio','alto')   NOT NULL,
  `unidade_medida`   varchar(45)                    NOT NULL,
  `descricao`        text                           NOT NULL,
  `quantidade_atual` decimal(10,2)                  NOT NULL,
  `estoque_minimo`   decimal(10,2)                  NOT NULL,
  `data_validade`    date                           NOT NULL,
  `created_at`       timestamp                      NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- -------------------------------------------------------
-- Tabela: movimentacoes
-- -------------------------------------------------------
DROP TABLE IF EXISTS `movimentacoes`;
CREATE TABLE `movimentacoes` (
  `id`                 int(11)                  NOT NULL AUTO_INCREMENT,
  `insumo_id`          int(11)                  NOT NULL,
  `usuario_id`         int(11)                  NOT NULL,
  `tipo`               enum('entrada','saida')  DEFAULT NULL,
  `quantidade`         decimal(10,2)            DEFAULT NULL,
  `data_movimentacao`  datetime                 NOT NULL,
  `observacao`         text                     DEFAULT NULL,
  `created_at`         timestamp                NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `insumo_id` (`insumo_id`),
  KEY `usuario_id` (`usuario_id`),
  CONSTRAINT `movimentacoes_ibfk_1` FOREIGN KEY (`insumo_id`)  REFERENCES `insumos`  (`id`),
  CONSTRAINT `movimentacoes_ibfk_2` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

SET FOREIGN_KEY_CHECKS = 1;