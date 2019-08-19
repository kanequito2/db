--
CREATE TABLE empleado(
    cedula INT(10) PRIMARY KEY,
    primer_nombre VARCHAR(30) NOT NULL,
    salario INT(15) NOT NULL
);
--

--
CREATE TABLE empresa(
    codigo INT(10) PRIMARY KEY,
    nombre VARCHAR(30) NOT NULL,
    gerente VARCHAR(30) NOT NULL
);
--

--
CREATE TABLE factura(
    id INT(10) PRIMARY KEY,
    fecha DATE NOT NULL,
    valor INT(10) NOT NULL,
    codigo_empresa INT(10),
    empleado_cedula INT(10),
    FOREIGN KEY (codigo_empresa) REFERENCES empresa(codigo),
    FOREIGN KEY (empleado_cedula) REFERENCES empleado(cedula)
);
--

--
CREATE TABLE detalle_venta(
    codigo INT(10),
    factura INT(10),
    pista INT(2),
    album VARCHAR(30),
    artista INT(10),
    disco VARCHAR(30),
    FOREIGN KEY (factura) REFERENCES factura(id),
    PRIMARY KEY (codigo,factura),
    FOREIGN KEY (pista,album,artista) REFERENCES pista(numero,album,artista),
    FOREIGN KEY (disco) REFERENCES disco(codigo)
);
--

--
CREATE TABLE disco(
    codigo VARCHAR(30) PRIMARY KEY,
    precio INT(10) NOT NULL,
    fecha_lanzamiento DATE NOT NULL,
    album VARCHAR(30) NOT NULL,
    artista INT(10) NOT NULL,
    FOREIGN KEY (album,artista) REFERENCES album(nombre,artista)
);
--

--
CREATE TABLE album(
    nombre VARCHAR(30),
    artista INT(10),
    PRIMARY KEY (nombre,artista),
    FOREIGN KEY (artista) REFERENCES artista(codigo)
);
--

--
CREATE TABLE pista(
    numero INT(2),
    nombre VARCHAR(30) NOT NULL,
    album VARCHAR(30),
    artista INT(10),
    FOREIGN KEY (album, artista) REFERENCES album(nombre,artista),
    PRiMAry KEY (numero,album)
);
--

--
CREATE TABLE artista(
    codigo INT(10) PRIMARY KEY,
    nombre_artistico VARCHAR(30) NOT NULL,
    genero_musical VARCHAR(30) NOT NULL,
    tipo ENUM ('solista','banda') NOT NULL,
    numero_id_manager VARCHAR(10) NOT NULL,
    tipo_id_manager ENUM ('CC','pasaporte') NOT NULL,
    FOREIGN KEY (numero_id_manager,tipo_id_manager) REFERENCES manager(numero_id,tipo_id)
);
--

--
CREATE TABLE solista(
    codigo INT(10) PRIMARY KEY,
    nombre VARCHAR(30) NOT NULL,
    tipo_identificacion ENUM('CC','pasaporte') NOT NULL,
    numero_identificacion VARCHAR(10) NOT NULL,
    nacionalidad VARCHAR(3) NOT NULL,
    FOREIGN KEY (codigo) REFERENCES artista(codigo)
);
--

--
CREATE TABLE banda(
    codigo INT(10) PRIMARY KEY,
    FOREIGN KEY (codigo) REFERENCES artista(codigo)
);
--

--
CREATE TABLE integrante(
    banda INT(10) NOT NULL,
    nombre VARCHAR(30) NOT NULL,
    tipo_id ENUM ('CC','pasaporte') NOT NULL,
    numero_id VARCHAR(10) NOT NULL,
    cargo VARCHAR(30) NOT NULL,
    FOREIGN KEY (banda) REFERENCES banda(codigo),
    PRIMARY KEY(tipo_id,numero_id)
);
--

--
CREATE TABLE contrato(
    codigo INT(10) PRIMARY KEY,
    fecha_afiliacion DATE NOT NULL,
    fecha_finalizacion DATE,
    salario INT(15) NOT NULL,
    artista INT(10),
    numero_id_manager VARCHAR(10),
    tipo_id_manager ENUM ('CC','pasaporte'),
    FOREIGN KEY (artista) REFERENCES artista(codigo),
    FOREIGN KEY (numero_id_manager,tipo_id_manager) REFERENCES manager(numero_identificacion,tipo_identificacion)
);
--

--
CREATE TABLE manager(
    numero_identificacion VARCHAR(10),
    tipo_identificacion ENUM ('CC','pasaporte'),
    nombre VARCHAR(30) NOT NULL,
    sexo ENUM('F','M') NOT NULL,
    nacionalidad VARCHAR(3) NOT NULL,
    PRIMARY KEY(numero_identificacion,tipo_identificacion)
);
--