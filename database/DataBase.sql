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
dialaborable	VARCHAR(4) 	NOT NULL,
horainicio 		TIME 				NOT NULL,
horafinal			TIME 				NOT NULL,
CONSTRAINT fk_idproveedor_hor FOREIGN KEY (idproveedor) REFERENCES proveedores (idproveedor)
)
ENGINE = INNODB;

CREATE TABLE comentarios
(
idcomentario	INT AUTO_INCREMENT PRIMARY KEY,
idproveedor		INT 					NOT NULL, -- FK
comentario		VARCHAR(250) 	NOT NULL,
puntuacion		CHAR(1)				NOT NULL,
fechahora			DATETIME			NOT NULL DEFAULT NOW()
)ENGINE = INNODB;

CREATE TABLE categorias
(
idcategoria	INT AUTO_INCREMENT PRIMARY KEY,
categoria	VARCHAR(50) NOT NULL,
fechacategoria DATETIME NOT NULL DEFAULT NOW()
)ENGINE = INNODB;


CREATE TABLE galerias
(
idgaleria	INT AUTO_INCREMENT PRIMARY KEY,
foto		VARCHAR(100) NULL,
video		VARCHAR(100) NULL
)ENGINE = INNODB;

CREATE TABLE redessociales
(
idredsocial	INT AUTO_INCREMENT PRIMARY KEY,
redsocial		CHAR(2) NOT NULL
)ENGINE = INNODB;

CREATE TABLE contactos
(
idcontacto				INT AUTO_INCREMENT PRIMARY KEY,
idredsocial 			INT 				NULL,
telefono					CHAR(11) 		NULL,
correoelectronico VARCHAR(70) NULL,
CONSTRAINT fk_idredsocial_con FOREIGN KEY (idredsocial) REFERENCES redessociales (idredsocial)
)ENGINE = INNODB;


CREATE TABLE servicios
(
idservicio		INT AUTO_INCREMENT PRIMARY KEY,
idproveedor		INT 					NOT NULL, -- FK
idcategoria		INT 					NOT NULL, -- FK
idgaleria			INT 							NULL, -- FK
servicio			VARCHAR(50) 	NOT NULL,
descripcion 	VARCHAR(150) 	NOT NULL,
direccion			VARCHAR(70)				NULL,
nivel					CHAR(1)				NOT NULL, -- 1(Muy bajo) - 5(Experto)
favorito			DATETIME					NULL,
fechahora			DATETIME			NOT NULL DEFAULT NOW(),
CONSTRAINT fk_srv_idproveedor	FOREIGN KEY (idproveedor) REFERENCES proveedores (idproveedor),
CONSTRAINT fk_srv_idcategoria FOREIGN KEY (idcategoria) REFERENCES categorias (idcategoria),
CONSTRAINT fk_srv_idgaleria FOREIGN KEY (idgaleria) REFERENCES galerias (idgaleria)
)ENGINE = INNODB;