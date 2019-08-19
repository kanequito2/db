--
CREATE TABLE cliente(
    documento_identidad INT(10)     PRIMARY KEY,
    tipo_de_documento   VARCHAR(4)  NOT NULL,
    tipo_de_persona     VARCHAR(10) NOT NULL,
    nombre              VARCHAR(30) NOT NULL,
    direccion           VARCHAR(30) NOT NULL,
    telefono            INT(10)     NOT NULL 
);
--
 
--
CREATE TABLE herramienta(
    codigo                  INT(10)     PRIMARY KEY,
    nombre                  VARCHAR(20) NOT NULL,
    cantidad_disponible     INT(4)      NOT NULL,
    valor_prestamo_semana   INT(20)     NOT NULL 
);
--
 
--
CREATE TABLE detalle_herramienta_prestamo(
    cantidad_prestada   INT(4)  NOT NULL,
    valor_prestamo      INT(20) NOT NULL,
    codigo_prestamo     INT(10),
    codigo_herramienta  INT(10),
    PRIMARY KEY(codigo_prestamo, codigo_herramienta),
FOREIGN KEY(codigo_prestamo) REFERENCES prestamo (codigo_prestamo),
FOREIGN KEY(codigo_herramienta) REFERENCES herramienta (codigo)
);
--
 
--
CREATE TABLE factura(
    id                INT(10),
    documento_cliente INT(10) ,
    cedula_trabajador INT(10),
    PRIMARY KEY(id, documento_cliente),
	FOREIGN KEY(cedula_trabajador) REFERENCES estandar(cedula_trabajador),
FOREIGN KEY(documento_cliente)REFERENCES cliente (documento_identidad),
);
--
 
--
CREATE TABLE prestamo(
    codigo_prestamo             INT(10)      NOT NULL,
    fecha_prestamo              DATE         NOT NULL,
    fecha_programada_devolucion DATE         NOT NULL,
    fecha_devolucion            DATE         NOT NULL,
    estado                      VARCHAR(1)   NOT NULL,
    id_factura                  INT(10)      NOT NULL,
    cliente_factura             INT(10)      NOT NULL,
    FOREIGN KEY(id_factura, cliente_factura) REFERENCES factura (id, documento_cliente),
    PRIMARY KEY(codigo_prestamo, cliente_factura, id_factura)
 ); 
--
 
--
CREATE TABLE producto(
    codigo              INT(10)     PRIMARY KEY ,
    nombre              VARCHAR(30) NOT NULL,
    precio              INT(20)     NOT NULL,
    cantidad_disponible INT(3)      NOT NULL,
    marca               VARCHAR(20) NOT NULL
);
--
 
--
CREATE TABLE detalle_venta_producto(
    valor_de_venta      INT(20)  NOT NULL,
    cantidad_vendida    INT(4)   NOT NULL,
    codigo_producto     INT (10),
    id_factura          INT(10),
    cliente_factura     INT(10),
PRIMARY KEY(codigo_producto, id_factura, cliente_factura),
    FOREIGN KEY(id_factura, cliente_factura) REFERENCES factura (id, documento_cliente),
    
FOREIGN KEY(codigo_producto) REFERENCES producto (codigo)
);
--
 
--
CREATE TABLE acarreo(
    nro_registro    INT(10)     PRIMARY KEY,
    estado_acarreo  VARCHAR(1)  NOT NULL,
    placa_carro     VARCHAR(10),
    id_factura      INT(10),
    cliente_factura INT(10), 
    FOREIGN KEY (id_factura, cliente_factura) REFERENCES factura (id, documento_cliente),
	FOREIGN KEY(placa_carro) REFERENCES carro (placa)
);
--
 
--
CREATE TABLE carro(
    placa   VARCHAR(10) PRIMARY KEY,
    modelo  VARCHAR(20) NOT NULL,
    estado  VARCHAR(1)  NOT NULL
);
--
 
--
CREATE TABLE trabajador(
    cedula              INT(10)     PRIMARY KEY,
    nombre              VARCHAR(30) NOT NULL,
    fecha_nacimiento    DATE        NOT NULL,
    tipo_de_sangre      VARCHAR(5)  NOT NULL,
    eps                 VARCHAR(20) NOT NULL,
    tipo                VARCHAR(1)  NOT NULL
);
--
 
--
CREATE TABLE conductor(
    cedula_trabajador   INT(10)     PRIMARY KEY,
    tipo_de_licencia    VARCHAR(10) NOT NULL,
    numero_de_licencia  INT(10)     NOT NULL,
    placa_carro         VARCHAR(10) NOT NULL,
	FOREIGN KEY(placa_carro) REFERENCES carro (placa),
	FOREIGN KEY(cedula_trabajador) REFERENCES trabajador (cedula)
);
--
 
--
CREATE TABLE estandar(
    cedula_trabajador   INT(10) PRIMARY KEY, 
    cedula_jefe         INT(10) ,
    cedula_asistido     INT(10), 
	FOREIGN KEY(cedula_asistido) REFERENCES administrador (cedula),
	FOREIGN KEY(cedula_jefe) REFERENCES administrador (cedula),
	FOREIGN KEY(cedula_trabajador) REFERENCES trabajador (cedula)
);
--
 
--
CREATE TABLE administrador(
    cedula              INT(10)     PRIMARY KEY,
    nombre              VARCHAR(30) NOT NULL,
    fecha_nacimiento    DATE        NOT NULL,
    tipo_de_sangre      VARCHAR(5)  NOT NULL,
    eps                 VARCHAR(20) NOT NULL,
    codigo_acceso       VARCHAR(10) NOT NULL 
);
--
 
--
CREATE TABLE contrato(
    codigo_contrato     INT(10) PRIMARY KEY,
    fecha_nacimiento    DATE NOT NULL,
    salario             INT(20) NOT NULL,
    cedula_conductor    INT(10); 
    cedula_estandar     INT(10);
	FOREIGN KEY(cedula_estandar) REFERENCES estandar (cedula_trabajador),
	FOREIGN KEY (cedula_conductor)REFERENCES conductor (cedula_trabajador)
);
--





TABLAS AISLADAS


 
--
CREATE TABLE estandar(
    cedula              INT(10)     PRIMARY KEY,
    nombre              VARCHAR(30) NOT NULL,
    fecha_nacimiento    DATE        NOT NULL,
    tipo_de_sangre      VARCHAR(5)  NOT NULL,
    eps                 VARCHAR(20) NOT NULL,
    cedula_jefe         INT(10) NOT NULL,
    cedula_asistido     INT(10) NOT NULL,
    FOREIGN KEY(cedula_jefe)REFERENCES administrador(cedula) ON       DELETE CASCADE,
	FOREIGN KEY(cedula_asistido)REFERENCES administrador(cedula) ON DELETE CASCADE) engine=innodb;
--
 
--
CREATE TABLE administrador(
    cedula              INT(10)     PRIMARY KEY,
    nombre              VARCHAR(30) NOT NULL,
    fecha_nacimiento    DATE        NOT NULL,
    tipo_de_sangre      VARCHAR(5)  NOT NULL,
    eps                 VARCHAR(20) NOT NULL,
    codigo_acceso       VARCHAR(10) NOT NULL 
)engine=innodb;
--