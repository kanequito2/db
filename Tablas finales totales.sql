--
CREATE TABLE Detalle_Venta(
    codigo                  INT(10),
    factura                 INT(20),
    pista                   INT(2),
    album                   VARCHAR(),
    artista                 INT(3),
    disco                   VARCHAR(7),
PRIMARY KEY(codigo,factura),
FOREIGN KEY(album) REFERENCES Album (nombre),
FOREIGN KEY(artista) REFERENCES Artista (codigo),
FOREIGN KEY(factura) REFERENCES Factura (codigo),
FOREIGN KEY(pista) REFERENCES Pista (codigo),
FOREIGN KEY(disco) REFERENCES Disco (codigo)
);
--
 
--
CREATE TABLE Disco(
    codigo      VARCHAR(7)  PRIMARY KEY,
    precio      INT(5) NOT NULL,
    fecha_lanz  DATE NOT NULL,
    album       VARCHAR() NOT NULL,
    artista     INT(3) NOT NULL,
FOREIGN KEY(album) REFERENCES Album (nombre),
FOREIGN KEY(artista) REFERENCES Artista (codigo)
);
--
 
--
CREATE TABLE Album(
    nombre  VARCHAR(),
    artista INT(3) ,
PRIMARY KEY(nombre, artista),
FOREIGN KEY(artista)REFERENCES Artista (codigo),
);
--
 
--
CREATE TABLE Pista_Virtual(
    numero             INT(2),
    nombre             VARCHAR()   NOT NULL,
    album              VARCHAR(),
    artista            INT(3),
    
    FOREIGN KEY(album), REFERENCES Album (nombre),
    FOREIGN KEY(artista)REFERENCES Artista (codigo),
    PRIMARY KEY(numero,album,artista)
 ); 
--
 
--
CREATE TABLE Artista(
    codigo              INT(3)     PRIMARY KEY ,
    nombre              VARCHAR() NOT NULL,
    genero_musical      VARCHAR()    NOT NULL,
    tipo                VARCHAR()      NOT NULL,
    numero_id_manager   VARCHAR() NOT NULL,
FOREIGN KEY (numero_id_manager) REFERENCES Manager(numero_id_manager)
);
--
 
--
CREATE TABLE Solista(
    codigo              INT(3),
    nombre              VARCHAR()   NOT NULL,
    tipo_id             VARCHAR(),
    numero_id           VARCHAR(),
    nacionalidad        VARCHAR(),
PRIMARY KEY(codigo),
FOREIGN KEY(codigo) REFERENCES Artista (codigo)
);
--
 
--
CREATE TABLE Banda(
    codigo_banda    INT(3)     PRIMARY KEY,
    FOREIGN KEY(codigo) REFERENCES Artista (codigo)
);
--
 
--
CREATE TABLE Integrante(
    codigo_banda   INT(3) NOT NULL,
    nombre         VARCHAR() NOT NULL,
    tipo_id        VARCHAR(),
    numero_id      VARCHAR(),
    cargo          VARCHAR() NOT NULL,
    PRIMARY KEY(tipo_id, numero_id),
    FOREIGN KEY (codigo_banda) REFERENCES Banda(codigo)
);
--
 
--
CREATE TABLE Contrato(
    codigo_contrato       INT(10)     PRIMARY KEY,
    fecha_afiliacion      DATE NOT NULL,
    fecha_finalizacion    DATE NOT NULL,
    salario               INT()  NOT NULL,
    artista               INT(3) NOT NULL,
    manager               VARCHAR()  NOT NULL,
FOREIGN KEY (artista) REFERENCES Artista(codigo),
FOREIGN KEY (manager) REFERENCES Manager (codigo)
);
--
 
--
CREATE TABLE Manager(
    numero_id_manager  VARCHAR(),
    tipo_id  VARCHAR() NOT NULL,
    nombre   VARCHAR() NOT NULL,
    sexo     VARCHAR() NOT NULL,
    nacionalidad VARCHAR() NOT NULL,
	FOREIGN KEY(numero_id_manager,tipo_id) REFERENCES Artista (numero_id_manager),
	PRIMARY KEY(numero_id_manager, tipo_id)
);
--
 








 