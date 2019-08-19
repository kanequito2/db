--
CREATE TABLE empresa(
    codigo              INT(10)     PRIMARY KEY,
    nombre              VARCHAR(30) NOT NULL,
    gerente             VARCHAR(30) NOT NULL
)engine=innodb;
--
CREATE TABLE empleado(
    cedula              INT(10)     PRIMARY KEY,
    primer_nombre              VARCHAR(30) NOT NULL,
    salario              INT(15) NOT NULL
)engine=innodb;
--
--
CREATE TABLE factura(
    id                  INT(10)     PRIMARY KEY,
    fecha   DATE        NOT NULL,
    valor   INT(10) NOT NULL,
    codigo_empresa      INT(10) ,
    empleado_cedula      INT(10) ,
    FOREIGN KEY(codigo_empresa)REFERENCES empresa(codigo) ON DELETE CASCADE,
	FOREIGN KEY(empleado_cedula)REFERENCES empleado(cedula) ON DELETE CASCADE
) engine=innodb;
--


 