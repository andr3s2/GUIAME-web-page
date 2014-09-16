/*
Created: 28/11/2013
Modified: 16/12/2013
Model: PostgreSQL 9.1
Database: PostgreSQL 9.1
*/

-- Create tables section -------------------------------------------------

-- Table INVESTIGADOR

CREATE TABLE "INVESTIGADOR"(
 "idInvestigador" Serial NOT NULL,
 "nombreCompleto" Varchar NOT NULL,
 "rol" Smallint NOT NULL,
 "correo" Varchar NOT NULL,
 "descripcion" Varchar NOT NULL,
 "titulos" Varchar NOT NULL,
 "urlCVLAC" Varchar,
 "urlPaginaPersonal" Varchar,
 "imagen" Varchar NOT NULL
)
WITH (OIDS=FALSE)
;
COMMENT ON COLUMN "INVESTIGADOR"."rol" IS '0: profesor investigador, 1: estudiante maestría, 2: estudiante pregrado'
;

-- Add keys for table INVESTIGADOR

ALTER TABLE "INVESTIGADOR" ADD CONSTRAINT "Key1" PRIMARY KEY ("idInvestigador")
;

-- Table PUBLICACION

CREATE TABLE "PUBLICACION"(
 "idPublicacion" Serial NOT NULL,
 "referenciaCompleta" Varchar NOT NULL,
 "resumen" Varchar NOT NULL,
 "urlFuente" Varchar,
 "fechaPublicacion" Date NOT NULL,
 "imagen" Varchar NOT NULL,
 "factorImpacto" Real
)
WITH (OIDS=FALSE)
;

-- Add keys for table PUBLICACION

ALTER TABLE "PUBLICACION" ADD CONSTRAINT "Key2" PRIMARY KEY ("idPublicacion")
;

-- Table PROYECTO

CREATE TABLE "PROYECTO"(
 "idProyecto" Serial NOT NULL,
 "nombre" Varchar NOT NULL,
 "resumen" Varchar NOT NULL,
 "url" Varchar,
 "fechaInicio" Varchar NOT NULL,
 "fechaFinalizacion" Varchar,
 "entidadesFinanciadoras" Varchar,
 "imagen" Varchar NOT NULL
)
WITH (OIDS=FALSE)
;

-- Add keys for table PROYECTO

ALTER TABLE "PROYECTO" ADD CONSTRAINT "Key3" PRIMARY KEY ("idProyecto")
;

-- Table PUBLICACION_INVESTIGADOR

CREATE TABLE "PUBLICACION_INVESTIGADOR"(
 "idInvestigador" Integer NOT NULL,
 "idPublicacion" Integer NOT NULL
)
WITH (OIDS=FALSE)
;

-- Add keys for table PUBLICACION_INVESTIGADOR

ALTER TABLE "PUBLICACION_INVESTIGADOR" ADD CONSTRAINT "Key5" PRIMARY KEY ("idInvestigador","idPublicacion")
;

-- Table INVESTIGADOR_PROYECTO

CREATE TABLE "INVESTIGADOR_PROYECTO"(
 "idInvestigador" Integer NOT NULL,
 "idProyecto" Integer NOT NULL
)
WITH (OIDS=FALSE)
;

-- Add keys for table INVESTIGADOR_PROYECTO

ALTER TABLE "INVESTIGADOR_PROYECTO" ADD CONSTRAINT "Key7" PRIMARY KEY ("idInvestigador","idProyecto")
;

-- Table NOTICIA

CREATE TABLE "NOTICIA"(
 "idNoticia" Serial NOT NULL,
 "fecha" Date NOT NULL,
 "titulo" Varchar NOT NULL,
 "resumen" Varchar NOT NULL,
 "url" Varchar,
 "imagen" Varchar NOT NULL
)
WITH (OIDS=FALSE)
;

-- Add keys for table NOTICIA

ALTER TABLE "NOTICIA" ADD CONSTRAINT "Key4" PRIMARY KEY ("idNoticia")
;

-- Table PROYECTO_PUBLICACION

CREATE TABLE "PROYECTO_PUBLICACION"(
 "idProyecto" Integer NOT NULL,
 "idPublicacion" Integer NOT NULL
)
WITH (OIDS=FALSE)
;

-- Add keys for table PROYECTO_PUBLICACION

ALTER TABLE "PROYECTO_PUBLICACION" ADD CONSTRAINT "Key6" PRIMARY KEY ("idProyecto","idPublicacion")
;

-- Create relationships section ------------------------------------------------- 

ALTER TABLE "PUBLICACION_INVESTIGADOR" ADD CONSTRAINT "relInvestigadorPublicacion" FOREIGN KEY ("idInvestigador") REFERENCES "INVESTIGADOR" ("idInvestigador") ON DELETE NO ACTION ON UPDATE NO ACTION
;

ALTER TABLE "PUBLICACION_INVESTIGADOR" ADD CONSTRAINT "relPublicacionInvestigador" FOREIGN KEY ("idPublicacion") REFERENCES "PUBLICACION" ("idPublicacion") ON DELETE NO ACTION ON UPDATE NO ACTION
;

ALTER TABLE "INVESTIGADOR_PROYECTO" ADD CONSTRAINT "relInvestigadorProyecto" FOREIGN KEY ("idInvestigador") REFERENCES "INVESTIGADOR" ("idInvestigador") ON DELETE NO ACTION ON UPDATE NO ACTION
;

ALTER TABLE "INVESTIGADOR_PROYECTO" ADD CONSTRAINT "relProyectoInvestigador" FOREIGN KEY ("idProyecto") REFERENCES "PROYECTO" ("idProyecto") ON DELETE NO ACTION ON UPDATE NO ACTION
;

ALTER TABLE "PROYECTO_PUBLICACION" ADD CONSTRAINT "relPublicacionProyecto" FOREIGN KEY ("idPublicacion") REFERENCES "PUBLICACION" ("idPublicacion") ON DELETE NO ACTION ON UPDATE NO ACTION
;

ALTER TABLE "PROYECTO_PUBLICACION" ADD CONSTRAINT "relProyectoPublicacion" FOREIGN KEY ("idProyecto") REFERENCES "PROYECTO" ("idProyecto") ON DELETE NO ACTION ON UPDATE NO ACTION
;





