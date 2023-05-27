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

CREATE TABLE Caracter\_academico(cod_academ serial PRIMARY KEY,
nomb_academ varchar(20));

CREATE TABLE Instituciones(cod_inst serial PRIMARY KEY,
nomb_inst varchar(50),
cod_academ INT,
cod_sector INT,
CONSTRAINT fk_cod_academ FOREIGN KEY (cod_academ) REFERENCES Caracter_academico(cod_academ),
CONSTRAINT fk_cod_sector FOREIGN KEY (cod_sector) REFERENCES sectores(cod_sector));


CREATE TABLE Inst_por_municipio(cod_inst_munic varchar(5) PRIMARY KEY,
    direccion varchar(50),
	telefono varchar(50),
	norma varchar(50),
	fecha_creacion DATE,
	programas_vigente int NOT NULL CHECK(programas_vigente>=0),
	acreditada varchar(1),
	fecha_acreditacion DATE,
	resolucion_acreditacion varchar(50),
	vigencia int CHECK(vigencia>0),
	nit varchar(50),
	pagina_web varchar(50),


	
	cod_juridica INT,
	cod_seccional INT,
	cod_admon INT,
	cod_norma INT,
	cod_estado int,
    cod_munic INT,
    CONSTRAINT fk_juridica FOREIGN KEY (cod_juridica) REFERENCES Naturaleza_juridica(cod_juridica),
    CONSTRAINT fk_cod_seccional FOREIGN KEY (cod_seccional) REFERENCES seccional(cod_seccional),
    CONSTRAINT fk_cod_admon FOREIGN KEY (cod_admon) REFERENCES Acto_admon(cod_admon),
    CONSTRAINT fk_cod_norma FOREIGN KEY (cod_norma) REFERENCES Norma_creacion(cod_norma),
    CONSTRAINT fk_cod_estado FOREIGN KEY (cod_estado) REFERENCES Estados(cod_estado),
    CONSTRAINT fk_cod_munic FOREIGN KEY (cod_munic) REFERENCES Municipios(cod_munic)
   );

CREATE TABLE Rectoria(fecha_inicio DATE,
fecha_final DATE,
cod_cargo INT,
cod_nomb INT,
cod_munic INT,
cod_inst INT,
cod_directivo INT
);
ALTER TABLE rectoria ADD CONSTRAINT pk_cod_rectoria PRIMARY KEY(cod_cargo,cod_nomb,cod_inst);
ALTER TABLE rectoria ADD CONSTRAINT fk_cod_cargo FOREIGN KEY(cod_cargo) REFERENCES cargos(cod_cargo);
ALTER TABLE rectoria ADD CONSTRAINT fk_cod_nomb FOREIGN KEY(cod_nomb) REFERENCES acto_nombramiento(cod_nombram);
ALTER TABLE rectoria ADD CONSTRAINT fk_cod_directivo FOREIGN KEY(cod_directivo) REFERENCES Directivos(cod_directivo);
