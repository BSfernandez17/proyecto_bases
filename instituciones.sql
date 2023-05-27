CREATE TABLE sectores(cod_sector serial PRIMARY KEY,
nomb_sector varchar(80));

CREATE TABLE Departamentos(cod_depto serial PRIMARY KEY, 
nomb_depto varchar(50));

CREATE TABLE Municipios(cod_munic serial PRIMARY KEY, 
nomb_munic varchar(50),
cod_depto INT,
CONSTRAINT fk_cod_depto FOREIGN KEY (cod_depto) REFERENCES Departamentos(cod_depto));

CREATE TABLE Norma_creacion(cod_norma serial PRIMARY KEY,
nomb_norma varchar(100));

CREATE TABLE Acto_admon(cod_admon serial PRIMARY KEY,
nomb_admon varchar (80));

CREATE TABLE seccional(cod_seccional serial PRIMARY KEY,
nomb_seccional varchar (20));

CREATE TABLE Naturaleza_juridica(cod_juridica serial PRIMARY KEY,
nomb_juridica varchar(80));

CREATE TABLE Estados(cod_estado serial PRIMARY KEY,
nomb_estado varchar(20));


CREATE TABLE Directivos(cod_directivo serial PRIMARY KEY,
nomb_directivo varchar(50));

CREATE TABLE Cargos(cod_cargo serial PRIMARY KEY,
nomb_cargo varchar(50));

CREATE TABLE Acto_nombramiento(cod_nombram serial PRIMARY KEY,
nomb_nombram varchar (50));

CREATE TABLE sectores (cod_sector serial PRIMARY KEY,
nomb_sector varchar(50));

CREATE TABLE Caracter_academico(cod_academ serial PRIMARY KEY,
nomb_academ varchar(20));

CREATE TABLE Instituciones(cod_inst serial PRIMARY KEY,
nomb_inst varchar(50),
cod_academ INT,
cod_sector INT,
CONSTRAINT fk_cod_academ FOREIGN KEY (cod_academ) REFERENCES Caracter_academico(cod_academ),
CONSTRAINT fk_cod_sector FOREIGN KEY (cod_sector) REFERENCES sectores(cod_sector));
