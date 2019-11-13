-- CREATE DATABASE "academico";
-- DELETE FROM "Curso";
CREATE TABLE "Curso" (
"id" serial,
"nome" varchar(100) NOT NULL,
"area" varchar(100) NOT NULL,
"cargaHoraria" int NOT NULL,
"dataFundacao" date NOT NULL,
	CONSTRAINT "CursoPK" PRIMARY KEY ("id"));


INSERT INTO "Curso" ("nome", "area", "cargaHoraria", "dataFundacao") VALUES
('Ciências Contabeis', 'Empresarial', 280, '11-11-1999');