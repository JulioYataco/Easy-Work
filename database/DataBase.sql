USE EasyWork

-- Creación de DEPARTAMENTOS, PROVINCIAS, DISTRITOS
-- Inserción de datos en la tabla de UBIGEO 

-- Creamos las tablas
CREATE TABLE proveedores
(
idproveedor		INT AUTO_INCREMENT PRIMARY KEY,
iddistrito		VARCHAR(6)		NOT NULL, -- FK
nombres				VARCHAR(30)		NOT NULL,
apellidos 		VARCHAR(30) 	NOT NULL,
fechanac			DATE 					NOT NULL,
telefono			CHAR(11)					NULL,
correo				VARCHAR(70) 	NOT NULL, -- UK
clave 				VARCHAR(100) 	NOT NULL,
fotoperfil		VARCHAR(100) 			NULL,
nivelacceso		CHAR(1) 			NOT NULL DEFAULT 'U', -- U (Usuario) / A (Administrador)
estado				CHAR(1) 			NOT NULL DEFAULT '1', -- 1(Activo) / 0 (inactivo)
fecharegistro DATETIME 			NOT NULL DEFAULT NOW(),
fechabaja 		DATETIME 					NULL,
CONSTRAINT uk_usu_correo UNIQUE (correo)
)ENGINE = INNODB;


CREATE TABLE horarios
(
idhorario			INT AUTO_INCREMENT PRIMARY KEY,
idproveedor		INT 				NOT NULL, -- FK
dialaborable	VARCHAR(40) NOT NULL,
horainicio 		TIME 				NOT NULL,
horafinal			TIME 				NOT NULL,
CONSTRAINT fk_idproveedor_hor FOREIGN KEY (idproveedor) REFERENCES proveedores (idproveedor),
CONSTRAINT uk_idproveedor_hor UNIQUE (idproveedor)
)
ENGINE = INNODB;

CREATE TABLE comentarios
(
idcomentario			INT AUTO_INCREMENT PRIMARY KEY,
idproveedor				INT 					NOT NULL, -- FK
idusuariocomenta 	INT 					NOT NULL, -- FK
comentario				VARCHAR(250) 	NOT NULL,
puntuacion				TINYINT				NOT NULL,
fechahora					DATETIME			NOT NULL DEFAULT NOW(),
estado						CHAR(1) 			NOT NULL DEFAULT '1', -- 1(Activo) / 0 (inactivo)	
CONSTRAINT fk_idproveedor_com FOREIGN KEY (idproveedor) REFERENCES PROVEEDORES (idproveedor),
CONSTRAINT fk_idusuariocomenta_com FOREIGN KEY (idusuariocomenta) REFERENCES PROVEEDORES (idproveedor)
)ENGINE = INNODB;

CREATE TABLE categorias
(
idcategoria			INT AUTO_INCREMENT PRIMARY KEY,
nombrecategoria	VARCHAR(50) NOT NULL,
fechacategoria 	DATETIME 		NOT NULL DEFAULT NOW(),
CONSTRAINT uk_categoria_nombrecategoria UNIQUE (nombrecategoria)
)ENGINE = INNODB;


CREATE TABLE galerias
(
idgaleria		INT AUTO_INCREMENT PRIMARY KEY,
idservicio 	INT 			NOT NULL, -- FK
tiporecurso CHAR(1) 	NOT NULL, -- F (fotos), V (Videos)
recurso			VARCHAR(100) 	NULL,
CONSTRAINT fk_idservicio_srv FOREIGN KEY (idservicio) REFERENCES servicios (idservicio)
)ENGINE = INNODB;

CREATE TABLE tiporedessociales
(
idtiporedsocial INT AUTO_INCREMENT PRIMARY KEY,
redsocial				VARCHAR(20) NOT NULL,
fechahora				DATETIME		NOT NULL DEFAULT NOW(),
estado					CHAR(1) 		NOT NULL DEFAULT '1' -- 1(Activo) / 0 (inactivo)	
)ENGINE = INNODB;

CREATE TABLE redessociales
(
idredsocial			INT AUTO_INCREMENT PRIMARY KEY,
idproveedor 		INT 				NOT NULL,
idtiporedsocial	INT 				NOT NULL,
nombrecuenta		VARCHAR(50) NOT NULL,
link						VARCHAR(500)		NULL,
estado					CHAR(1) 		NOT NULL DEFAULT '1', -- 1(Activo) / 0 (inactivo)	
CONSTRAINT fk_idproveedor_rds FOREIGN KEY (idproveedor) REFERENCES proveedores (idproveedor),
CONSTRAINT fk_idtiporedsocial_rds FOREIGN KEY (idtiporedsocial) REFERENCES tiporedessociales (idtiporedsocial)
)ENGINE = INNODB;


CREATE TABLE contactos
(
idcontacto		INT AUTO_INCREMENT PRIMARY KEY,
idproveedor		INT 		NOT NULL,
celular				CHAR(9) NOT NULL,
telefono			CHAR(9)			NULL,	
email 				VARCHAR(70) NULL,
estado				CHAR(1) NOT NULL DEFAULT '1', -- 1(Activo) / 0 (inactivo)	
CONSTRAINT fk_idproveedor_cnt FOREIGN KEY (idproveedor) REFERENCES proveedores (idproveedor)
)ENGINE = INNODB;


CREATE TABLE servicios
(
idservicio		INT AUTO_INCREMENT PRIMARY KEY,
idproveedor		INT 					NOT NULL, -- FK
idcategoria		INT 					NOT NULL, -- FK
servicio			VARCHAR(50) 	NOT NULL,
descripcion 	VARCHAR(550) 	NOT NULL,
ubicacion			VARCHAR(70)				NULL,
nivel					TINYINT				NOT NULL, -- 1(Muy bajo) - 5(Experto)
fotoportada		VARCHAR(100)			NULL,
favorito			DATETIME					NULL,
fechahora			DATETIME			NOT NULL DEFAULT NOW(),
estado				CHAR(1) 			NOT NULL DEFAULT '1', -- 1(Activo) / 0 (inactivo)				
CONSTRAINT fk_idproveedor_srv	FOREIGN KEY (idproveedor) REFERENCES proveedores (idproveedor),
CONSTRAINT fk_idcategoria_srv FOREIGN KEY (idcategoria) REFERENCES categorias (idcategoria)
)ENGINE = INNODB;

