USE EasyWork;

-- PROCEDIMIENTOS ALMACENADOS

-- ----------------------------------------------------------------------------------------------
														-- CRUD DE PROVEEDORES --
-- ----------------------------------------------------------------------------------------------

-- Registrar
-- ----------------------------------------------------
DELIMITER $$
CREATE PROCEDURE spu_proveedores_registrar
(
	IN _iddistrito 	INT,
	IN _nombres 		VARCHAR(30),
	IN _apellidos 	VARCHAR(30),
	IN _fechanac 		DATE,
	IN _telefono 		CHAR(11),
	IN _correo 			VARCHAR(70),
	IN _clave 			VARCHAR(100),
	IN _fotoperfil 	VARCHAR(100),
	IN _nivelacceso CHAR(1)
)
BEGIN
	IF _telefono = '' THEN SET _telefono = NULL; END IF;
	IF _fotoperfil = '' THEN SET _fotoperfil = NULL; END IF;
	
	INSERT INTO proveedores (iddistrito, nombres, apellidos, fechanac, telefono, correo, clave, fotoperfil, nivelacceso, estado, fecharegistro, fechabaja)
		VALUES (_iddistrito, _nombres, _apellidos, _fechanac, _telefono, _correo, _clave, _fotoperfil, _nivelacceso, '1', NOW(), NULL);
END $$

CALL spu_proveedores_registrar('021207', 'Julio Smith', 'Yataco herrera', '16/11/2001', '993212855', 'juliosmithyataco@gmail.com', '$2y$10$XqAbF2NvJF63qsMqUxLYL.Iu1uqejHjcXrLguQ0snpjECIND6yW0S', NULL, 'A');
SELECT * FROM distritos
-- Listar proveedores
-------------------------------------------------------------
DELIMITER $$
CREATE PROCEDURE spu_proveedores_listar
(
	IN _idproveedor INT
)
BEGIN
	SELECT nombres, apellidos, fechanac, telefono, correo
		FROM proveedores
		WHERE idproveedor = _idproveedor;
END $$

CALL spu_proveedores_listar(2)
SELECT * FROM proveedores



-- Modificar proveedor
---------------------------------------------------------------
DELIMITER $$
CREATE PROCEDURE spu_proveedores_modificar
(
	IN _idproveedor	INT,
	IN _nombres 		VARCHAR(30),
	IN _apellidos 	VARCHAR(30),
	IN _fechanac 		DATE,
	IN _telefono 		CHAR(11),
	IN _correo 			VARCHAR(70)
)
BEGIN
	IF _telefono = '' THEN SET _telefono = NULL; END IF;
	
		UPDATE proveedores SET
			nombres 		= _nombres,
			apellidos 	= _apellidos,
			fechanac 		= _fechanac,
			telefono 		= _telefono,
			correo 			= _correo
			WHERE idproveedor = _idproveedor;
END $$


-- Eliminar proveedor
-- --------------------------------------------------------------------
DELIMITER $$
CREATE PROCEDURE spu_proveedores_eliminar(IN _idproveedor INT)
BEGIN
	-- Cambiar de estado
	UPDATE proveedores SET estado = '0', fechabaja = NOW()
		WHERE idproveedor = _idproveedor;
END $$


-- Login para proveedor (Usuario)
-- --------------------------------------------------------------------
DELIMITER $$
CREATE PROCEDURE spu_proveedor_login
(
	IN _correo VARCHAR(70)
)
BEGIN
	SELECT 
		PROV.idproveedor, DIST.iddistrito, DIST.nombredistrito,
		PROV.nombres, PROV.apellidos, PROV.fechanac, PROV.telefono,
		PROV.correo, PROV.clave, PROV.fotoperfil, PROV.nivelacceso
	FROM proveedores PROV
	LEFT JOIN distritos DIST ON DIST.iddistrito = PROV.iddistrito
	WHERE correo = _correo AND estado = 1;
END $$

-- Modificar calve de accesos
DELIMITER $$
CREATE PROCEDURE spu_proveedor_clave_modificar
(
	IN _idproveedor INT,
	IN _clave VARCHAR(100)
)
BEGIN
	UPDATE proveedores SET
		clave = _clave
		WHERE idproveedor = _idproveedor;
END $$

CALL spu_proveedor_login('juliocesar@gmail.com');

SELECT * FROM proveedores


-- Mostrar grafico
DELIMITER $$
CREATE PROCEDURE spu_proveedores_grafico_listar()
BEGIN
	SELECT YEAR(fecharegistro) AS 'anio', COUNT(*) AS 'cantidad' FROM proveedores
		GROUP BY YEAR(fecharegistro);
END $$

-- -------------------------------------------------------------------------------------------
													-- LISTAR UBIGEO
-- -------------------------------------------------------------------------------------------

-- Listar departamentos
-- ------------------------------------------------------------------
DELIMITER $$
CREATE PROCEDURE spu_departamentos_listar()
BEGIN
	SELECT * FROM departamentos ORDER BY iddepartamento;
END $$


-- listar Provincias
-- ------------------------------------------------------------------
DELIMITER $$
CREATE PROCEDURE spu_provincias_listar
(
	IN _iddepartamento VARCHAR(2)
)
BEGIN
	SELECT * 
		FROM provincias 
			WHERE iddepartamento = _iddepartamento ORDER BY idprovincia;
END $$

CALL spu_provincias_listar('02')


-- 	Listar Distritos
-- --------------------------------------------------------------------
DELIMITER $$
CREATE PROCEDURE spu_distritos_listar
(
	IN _idprovincia VARCHAR(4)
)
BEGIN
	SELECT * 
		FROM distritos
			WHERE idprovincia = _idprovincia ORDER BY iddistrito;
END $$

CALL spu_distritos_listar(1010);

SELECT * FROM proveedores


-- ----------------------------------------------------------------------------------------------------------------
													-- CRUD DE SERVICIOS --
-- ----------------------------------------------------------------------------------------------------------------

-- Registrar servicios
-- ---------------------------------------------------------------------------------------
DELIMITER $$
CREATE PROCEDURE spu_servicios_registrar
(
	IN _idproveedor	INT, 	-- FK
	IN _idcategoria	INT, 	-- FK
	IN _servicio			VARCHAR(50),
	IN _descripcion 	VARCHAR(550),
	IN _ubicacion		VARCHAR(70),
	IN _nivel				TINYINT, -- 1(Muy bajo) - 5(Experto)
	IN _fotoportada	VARCHAR(100)
)
BEGIN
	IF _ubicacion = '' THEN SET _ubicacion = NULL; END IF;
		IF _fotoportada = '' THEN SET _fotoportada = NULL; END IF;
	
	INSERT INTO servicios (idproveedor, idcategoria, servicio, descripcion, ubicacion, nivel, fotoportada, favorito, fechahora)
		VALUES (_idproveedor, _idcategoria, _servicio, _descripcion, _ubicacion, _nivel, _fotoportada, NULL, NOW());
END $$

CALL spu_servicios_registrar(2, 1, 'Maderita', 'Realizamos todo tipos de: Puertas, ventanas, sillas, etc. de la mejor calidad y con los mejores precios.', 'Girón ubire 303', '4', NULL);
CALL spu_servicios_registrar(2, 2, 'Armando Casas', 'Especialista en todos los procedimientos de construcción, resaltante en maestro de obra. A muy comodo precio y de buena calidad', 'En tu casa', '3', NULL);
CALL spu_servicios_registrar(2, 2, 'Prueba', 'Especialista en todos los procedimientos de construcción, resaltante en maestro de obra. A muy comodo precio y de buena calidad', 'En tu casa', '3');

-- Listar servicios
-- -------------------------------------------------------------------------------------------------------
DELIMITER $$
CREATE PROCEDURE spu_servicios_listar()
BEGIN
	SELECT SERV.idservicio, PROV.idproveedor, CONCAT(PROV.nombres, ' ', PROV.apellidos) AS 'proveedor',
				 CAT.nombrecategoria, SERV.servicio, SERV.descripcion, SERV.ubicacion,
				 SERV.nivel, SERV.fotoportada
		  FROM servicios SERV
			INNER JOIN proveedores PROV ON PROV.idproveedor = SERV.idproveedor
			INNER JOIN categorias CAT ON CAT.idcategoria = SERV.idcategoria
			WHERE SERV.estado = '1'
			ORDER BY idservicio DESC;
END $$

-- Listar un servicio especifico
-- ----------------------------------------------------------------------------------------------
DELIMITER $$
CREATE PROCEDURE spu_servicios_listar_ondata(IN _idproveedor INT)
BEGIN
	SELECT SERV.idservicio, PROV.idproveedor, PROV.nombres, PROV.apellidos, CAT.nombrecategoria,
					SERV.servicio, SERV.descripcion, SERV.ubicacion, SERV.nivel, SERV.fotoportada, SERV.estado
		FROM servicios SERV 
		INNER JOIN proveedores PROV ON PROV.idproveedor = SERV.idproveedor
		INNER JOIN categorias CAT ON CAT.idcategoria = SERV.idcategoria
		WHERE PROV.idproveedor = _idproveedor AND SERV.estado = '1' ORDER BY idservicio DESC;
END $$

-- Listar contactos al seleccionar un servicio
-- ----------------------------------------------------------------------------------------------
DELIMITER $$
CREATE PROCEDURE spu_servicios_listar_ondata(IN _servicio INT)
BEGIN
	SELECT SERV.idservicio, PROV.idproveedor, PROV.nombres, PROV.apellidos, CAT.nombrecategoria,
					SERV.servicio, SERV.descripcion, SERV.ubicacion, SERV.nivel, SERV.fotoportada, 
					CNT.idcontacto
		FROM servicios SERV 
		INNER JOIN proveedores PROV ON PROV.idproveedor = SERV.idproveedor
		INNER JOIN contactos CNT ON CNT.`idcontacto` = CNT.`idcontacto`
		INNER JOIN categorias CAT ON CAT.idcategoria = SERV.idcategoria
		WHERE PROV.idproveedor = 2 ORDER BY idservicio DESC;
END $$

-- -----------------------------------------------------
						-- FILTROS DE SERVICIO --
-- -----------------------------------------------------

-- Listar servicios por categoria
-- ----------------------------------------------------------------------------------------------
DELIMITER $$
CREATE PROCEDURE spu_servicio_categoria_listar(IN _idcategoria INT)
BEGIN
	SELECT SERV.idservicio, PROV.idproveedor, CONCAT(PROV.nombres, ' ', PROV.apellidos) AS 'proveedor',
				 CAT.nombrecategoria, SERV.servicio, SERV.descripcion, SERV.ubicacion,
				 SERV.nivel, SERV.fotoportada
		  FROM servicios SERV
			INNER JOIN proveedores PROV ON PROV.idproveedor = SERV.idproveedor
			INNER JOIN categorias CAT ON CAT.idcategoria = SERV.idcategoria
			WHERE CAT.idcategoria = _idcategoria AND SERV.estado = '1'
			ORDER BY SERV.fechahora;
END $$

-- Lista los servicios de acuerdo al departamento
-- ---------------------------------------------------------------------------------------------------------
DELIMITER $$
CREATE PROCEDURE spu_servicio_departamentos_listar(IN _iddepartamento VARCHAR(2))
BEGIN
	SELECT proveedores.`iddistrito`, servicios.`idservicio`, proveedores.`iddistrito`, servicios.`idproveedor`,
					servicios.`idcategoria`, servicios.`servicio`, servicios.`descripcion`, servicios.ubicacion,
					servicios.`nivel`, servicios.`fotoportada`, servicios.`favorito`, servicios.`fechahora`,
					servicios.`estado`, provincias.`iddepartamento`
	FROM servicios 
	INNER JOIN proveedores ON proveedores.`idproveedor` = servicios.`idproveedor`
	INNER JOIN distritos ON distritos.`iddistrito` = proveedores.`iddistrito`
	INNER JOIN provincias ON provincias.`idprovincia` = distritos.`idprovincia`
	WHERE iddepartamento = _iddepartamento AND servicios.estado = '1';
END $$

-- Lista los servicios de acuerdo a la provincia
-- ---------------------------------------------------------------------------------------------------------
DELIMITER $$
CREATE PROCEDURE spu_servicio_provincia_listar(IN _idprovincia VARCHAR(4))
BEGIN
	SELECT proveedores.`iddistrito`, servicios.`idservicio`, proveedores.`iddistrito`, servicios.`idproveedor`,
					servicios.`idcategoria`, servicios.`servicio`, servicios.`descripcion`, servicios.ubicacion,
					servicios.`nivel`, servicios.`fotoportada`, servicios.`favorito`, servicios.`fechahora`,
					servicios.`estado`
	FROM servicios 
	INNER JOIN proveedores ON proveedores.`idproveedor` = servicios.`idproveedor`
	INNER JOIN distritos ON distritos.`iddistrito` = proveedores.`iddistrito`
	WHERE idprovincia = _idprovincia AND servicios.estado = '1';
END $$

-- Lista los servicios de acuerdo a los distritos
-- ---------------------------------------------------------------------------------------------------------
DELIMITER $$
CREATE PROCEDURE spu_servicio_distrito_listar(IN _iddistrito VARCHAR(6))
BEGIN
	SELECT proveedores.`iddistrito`, servicios.`idservicio`, proveedores.`iddistrito`, servicios.`idproveedor`,
					servicios.`idcategoria`, servicios.`servicio`, servicios.`descripcion`,
					servicios.ubicacion, servicios.`nivel`, servicios.`fotoportada`,
					servicios.`favorito`, servicios.`fechahora`, servicios.`estado`
	FROM servicios 
	INNER JOIN proveedores ON proveedores.`idproveedor` = servicios.`idproveedor`
	WHERE iddistrito = _iddistrito AND servicios.estado = '1';
END $$

-- Modificar servicio
-- ---------------------------------------------------------------------------------------------------------
DELIMITER $$
CREATE PROCEDURE spu_servicios_modificar
(
	IN _idservicio INT,
	IN _idproveedor	INT, 	-- FK
	IN _idcategoria	INT, 	-- FK
	IN _servicio			VARCHAR(50),
	IN _descripcion 	VARCHAR(550),
	IN _ubicacion		VARCHAR(70),
	IN _nivel				TINYINT, -- 1(Muy bajo) - 5(Experto)
	IN _fotoportada	VARCHAR(100)
)
BEGIN
	IF _ubicacion = '' THEN SET _ubicacion = NULL; END IF;
	IF _fotoportada = '' THEN SET _fotoportada = NULL; END IF;
	
	UPDATE servicios SET
		idproveedor = _idproveedor,
		idcategoria = _idcategoria,
		servicio = _servicio,
		descripcion = _descripcion,
		ubicacion = _ubicacion,
		nivel = _nivel,
		fotoportada	= _fotoportada
	WHERE idservicio = _idservicio;
	
END $$	

-- Eliminar un servicio
-- ---------------------------------------------------------------------------------------------------------
DELIMITER $$
CREATE PROCEDURE spu_servicios_elimimar(IN _idservicio INT)
BEGIN
		UPDATE servicios SET
			estado = '0'
			WHERE idservicio = _idservicio;
END $$

-- Obtener un solo dato (PENDIENTE)
-- ---------------------------------------------------------------------------------------------------------
DELIMITER $$
CREATE PROCEDURE spu_servicio_onedata(IN _idservicio INT)
BEGIN
	SELECT  *
		FROM servicios
		INNER JOIN proveedores ON proveedores.idproveedor = servicios.idproveedor
		LEFT JOIN contactos ON contactos.`idcontacto` = contactos.`idcontacto`
		WHERE contactos.`idcontacto` = 2 AND servicios.`estado` = '1'
		ORDER BY idservicio DESC;
END $$
CALL spu_servicio_onedata(7)

-- Capturando id del comentario por proveedor
-- ---------------------------------------------------------------------------------------------------------
DELIMITER $$
CREATE PROCEDURE spu_servicio_contacto_proveedor(IN _idproveedor INT)
BEGIN
	SELECT * FROM contactos WHERE idproveedor = 2;
END $$

-- Capturando id del comentario por proveedor
-- ---------------------------------------------------------------------------------------------------------
DELIMITER $$
CREATE PROCEDURE spu_servicio_redessociales_proveedor(IN _idproveedor INT)
BEGIN
	SELECT RDS.`idredsocial`, RDS.`idproveedor`, TRDS.`redsocial`,
					RDS.`nombrecuenta`, RDS.`link`
	FROM redessociales RDS
	INNER JOIN tiporedessociales TRDS ON TRDS.`idtiporedsocial` = RDS.`idtiporedsocial` 
	WHERE RDS.idproveedor = 2 AND RDS.`estado` = '1';
END $$

-- ---------------------------------------------------------------------------------------------------------------------------
														-- CRUD DE REDES SOCIALES
-- ---------------------------------------------------------------------------------------------------------------------------

-- Registrar Red social
-- ---------------------------------------------------------------------------------------------------------

DELIMITER $$
CREATE PROCEDURE spu_redessociales_registrar
( 
	IN _idproveedor INT,
	IN _idtiporedsocial INT,
	IN _nombrecuenta VARCHAR(50),
	IN _link	VARCHAR(500)
)
BEGIN
	IF _link = '' THEN SET _link = NULL; END IF;
	
	INSERT INTO redessociales (idproveedor, idtiporedsocial, nombrecuenta, link) 
		VALUES (_idproveedor, _idtiporedsocial, _nombrecuenta, _link);
END $$


-- Modificar una red social
-- ---------------------------------------------------------------------------------------------------------
DELIMITER $$
CREATE PROCEDURE spu_redessociales_modificar
(
	IN _idredsocial INT,
	IN _idproveedor	INT,
	IN _idtiporedsocial INT,
	IN _nombrecuenta VARCHAR(50),
	IN _link	VARCHAR(500)
)
BEGIN
	IF _link = '' THEN SET _link = NULL; END IF;
	
		UPDATE redessociales SET
			idredsocial = _idredsocial,
			idproveedor = _idproveedor,
			idtiporedsocial = _idtiporedsocial,
			nombrecuenta = _nombrecuenta,
			link = _link
		WHERE idredsocial = _idredsocial;
END $$


-- Listar Red social por proveedor (Funcional)
-- ---------------------------------------------------------------------------------------------------------
DELIMITER $$
CREATE PROCEDURE spu_redessociales_listar_onedata(IN _idproveedor INT)
BEGIN
		SELECT RDS.`idredsocial`, RDS.`idproveedor`, TRS.`redsocial`, RDS.`nombrecuenta`,
						RDS.link
			FROM redessociales RDS
			INNER JOIN tiporedessociales TRS ON TRS.`idtiporedsocial` = RDS.`idtiporedsocial`
			WHERE idproveedor = 2 AND RDS.estado = '1' 
			ORDER BY RDS.idredsocial DESC;
END $$

CALL spu_redessociales_listar_onedata(2)

-- Eliminar una red social
-- ---------------------------------------------------------------------------------------------------------
DELIMITER $$
CREATE PROCEDURE spu_rededssociales_eliminar
(
	IN _idredsocial INT
)
BEGIN
	UPDATE redessociales SET estado = '0'
		WHERE idredsocial	= _idredsocial;
END $$

-- listar redes sociales por proveedor
-- ---------------------------------------------------------------------------------------------------------
DELIMITER $$
CREATE PROCEDURE spu_listar_redessociales(IN _idproveedor INT)
BEGIN 
	SELECT RDS.`idredsocial`, RDS.`idproveedor`, TRS.`redsocial`, RDS.`nombrecuenta`,
						RDS.link
			FROM redessociales RDS
			INNER JOIN tiporedessociales TRS ON TRS.`idtiporedsocial` = RDS.`idtiporedsocial`
			WHERE idproveedor = 2 AND RDS.estado = '1' 
			ORDER BY RDS.idredsocial DESC;
END $$

CALL spu_listar_redessociales(2)

-- Listar una sola red social
-- ---------------------------------------------------------------------------------------------------------
DELIMITER $$
CREATE PROCEDURE spu_list_one_data_redsoci(IN _idredsocial INT)
BEGIN 
	SELECT * FROM redessociales WHERE idredsocial = _idredsocial AND estado = '1';
END $$

CALL spu_list_one_data_redsoci(4)

SELECT * FROM comentarios

-- --------------------------------------------------------------------------------------------------------------------------
													-- CRUD DE HORARIOS
-- --------------------------------------------------------------------------------------------------------------------------

-- Registrar Horarios
-- ---------------------------------------------------------------------------------------------------------
DELIMITER $$
CREATE PROCEDURE spu_horario_registrar
(
	IN _idproveedor INT,
	IN _dialaborable VARCHAR(40),
	IN _horainicio TIME,
	IN _horafinal TIME
)
BEGIN
	INSERT INTO horarios(idproveedor, dialaborable, horainicio, horafinal)
		VALUES (_idproveedor, _dialaborable, _horainicio, _horafinal);
END $$

-- Listar horario
-- ---------------------------------------------------------------------------------------------------------
DELIMITER $$
CREATE PROCEDURE spu_horario_listar(IN _idproveedor INT)
BEGIN
	SELECT idhorario, idproveedor, dialaborable, horainicio, horafinal
		FROM horarios
		WHERE idproveedor = _idproveedor;
END $$


-- Listar un horario
-- ---------------------------------------------------------------------------------------------------------
DELIMITER $$
CREATE PROCEDURE spu_horario_onedata(IN _idhorario INT)
BEGIN
	SELECT * FROM horarios
		WHERE idhorario = _idhorario;
END $$

-- Modificar horario
-- ---------------------------------------------------------------------------------------------------------
DELIMITER $$
CREATE PROCEDURE spu_horario_modificar
(
	IN _idproveedor INT,
	IN _dialaborable VARCHAR(40),
	IN _horainicio TIME,
	IN _horafinal TIME
)
BEGIN
	UPDATE horarios SET
		dialaborable 	= _dialaborable,
		horainicio 		= _horainicio,
		horafinal 		= _horafinal
		WHERE idproveedor = _idproveedor;
END $$

-- ------------------------------------------------------------------------------------------------------------------------
													-- CRUD DE CONTACTOS
-- ------------------------------------------------------------------------------------------------------------------------

-- Registrar
-- ---------------------------------------------------------------------------------------------------------
DELIMITER $$
CREATE PROCEDURE spu_contactos_registrar
(
	IN _idproveedor INT,
	IN _celular CHAR(9),
	IN _telefono CHAR(9),
	IN _email VARCHAR(70)
)
BEGIN 
	IF _telefono = '' THEN SET _telefono = NULL; END IF;
	IF _email = '' THEN SET _email = NULL; END IF; 
	
	INSERT INTO contactos (idproveedor, celular, telefono, email)
		VALUES (_idproveedor, _celular, _telefono, _email);
END $$

-- Modificar
-- ---------------------------------------------------------------------------------------------------------
DELIMITER $$
CREATE PROCEDURE spu_contactos_modificar
(
	IN _idcontacto INT,
	IN _celular	CHAR(9),
	IN _telefono CHAR(9),
	IN _email	VARCHAR(50)
)
BEGIN
	IF _telefono = '' THEN SET _telefono = NULL; END IF;
	IF _email = '' THEN SET _email = NULL; END IF; 
	
		UPDATE contactos SET
			celular = _celular,
			telefono = _telefono,
			email = _email
		WHERE idcontacto = _idcontacto;
END $$


-- Listar (No se usa en las tablas)
-- ---------------------------------------------------------------------------------------------------------
DELIMITER $$
CREATE PROCEDURE spu_contactos_listar()
BEGIN 
	SELECT * FROM contactos WHERE estado = '1';
END $$

-- Listar un solo contacto
-- ---------------------------------------------------------------------------------------------------------
DELIMITER $$
CREATE PROCEDURE spu_list_one_data_contac
(
	IN _idcontacto INT
)
BEGIN 
	SELECT * FROM contactos WHERE idcontacto = _idcontacto AND estado = '1';
END $$

CALL spu_list_one_data_contac(20)


-- listar contacto
-- ---------------------------------------------------------------------------------------------------------
DELIMITER $$
CREATE PROCEDURE spu_listar_contacto(IN _idproveedor INT)
BEGIN 
	SELECT * FROM contactos WHERE idproveedor = _idproveedor AND estado = '1';
END $$


-- LISTAR LOS CONTACTOS POR CADA SERVICIO (DE ACUERDO A SU PROVEEDOR)
-- ---------------------------------------------------------------------------------------------------------
DELIMITER $$
CREATE PROCEDURE spu_contactos_onedata(IN _idproveedor INT)
BEGIN 
	SELECT * FROM contactos WHERE idproveedor = _idproveedor AND estado = '1';
END $$


-- Listar oneData para obtener datos y poder modificar
-- ---------------------------------------------------------------------------------------------------------
DELIMITER $$
CREATE PROCEDURE spu_contactos_listar_onecontacto_proveedor(IN _idproveedor INT)
BEGIN 
	SELECT * FROM contactos WHERE idproveedor = _idproveedor AND estado = '1';
END $$

CALL spu_contactos_listar_onecontacto_proveedor(2)

-- Eliminar contactos
-- ---------------------------------------------------------------------------------------------------------
DELIMITER $$
CREATE PROCEDURE spu_eliminar_contacto
(
	IN _idcontacto INT
)
BEGIN
	UPDATE contactos SET estado = '0'
	WHERE idcontacto = _idcontacto;
END $$

-- Listar oneData por servicios
-- ---------------------------------------------------------------------------------------------------------
DELIMITER $$
CREATE PROCEDURE spu_contactos_listar_servicio(IN _servicio INT)
BEGIN
		SELECT * 
		FROM contactos
		INNER JOIN proveedores ON proveedores.`iddistrito` = contactos.`idproveedor`
		INNER JOIN servicios ON servicios.`idservicio` = servicio.idservicio
		WHERE servicios.idservicio = 2
END $$


-- --------------------------------------------------------------------------------------------------------------------
													-- CRUD DE COMENTARIOS
-- --------------------------------------------------------------------------------------------------------------------

-- Obtenemos un datos de proveedores
-- ---------------------------------------------------------------------------------------------------------
DELIMITER $$
CREATE PROCEDURE spu_proveedores_obtener_ondata(IN _idproveedor INT)
BEGIN
	SELECT * FROM proveedores WHERE idproveedor = _idproveedor;
END $$

-- Registrar
-- ---------------------------------------------------------------------------------------------------------
DELIMITER $$
CREATE PROCEDURE spu_comentarios_registrar
(
	IN _idproveedor INT,
	IN _idusuariocomenta INT,
	IN _comentario VARCHAR(250), 
	IN _puntuacion TINYINT
)
BEGIN
	INSERT INTO comentarios (idproveedor, idusuariocomenta, comentario, puntuacion, fechahora)
		VALUES (_idproveedor, _idusuariocomenta, _comentario, _puntuacion, NOW());
END $$

CALL spu_comentarios_registrar(2, 2, 'Excelente servicio', '5');

-- Listar Comentarios por idcomentario
-- ---------------------------------------------------------------------------------------------------------
DELIMITER $$
CREATE PROCEDURE spu_comentario_onedata_listar(IN _idcomentario INT)
BEGIN
	SELECT * FROM comentarios WHERE idcomentario = _idcomentario AND estado = '1';
END $$

-- Listar Comentarios por idcomentario
-- ---------------------------------------------------------------------------------------------------------
DELIMITER $$
CREATE PROCEDURE spu_comentario_modificar
(
	IN _idcomentario INT,
	IN _comentario VARCHAR(250),
	IN _puntuacion TINYINT
)
BEGIN 
	UPDATE comentarios SET
		comentario = _comentario,
		puntuacion = _puntuacion,
		fechahora = NOW()
	WHERE idcomentario = _idcomentario;
END $$

-- Listar Comentarios por idcomentario
-- ---------------------------------------------------------------------------------------------------------
DELIMITER $$
CREATE PROCEDURE spu_comentario_eliminar(IN _idcomentario INT)
BEGIN
	UPDATE comentarios SET estado = '0'
		WHERE idcomentario = _idcomentario;
END $$


-- Listar Comentarios (/)
-- ---------------------------------------------------------------------------------------------------------
DELIMITER $$
CREATE PROCEDURE spu_comentarios_listar(IN _idproveedor INT)
BEGIN
	SELECT PROV.idproveedor, COM.idcomentario, COM.idusuariocomenta,
	CONCAT(PROV.nombres,' ',PROV.apellidos) AS nombreyapellido,
        COM.comentario , COM.fechahora, COM.puntuacion
	FROM comentarios COM
	INNER JOIN proveedores PROV ON PROV.idproveedor = COM.idproveedor
	WHERE PROV.estado = 1 AND COM.estado = 1 AND COM.idproveedor = _idproveedor;
END $$



-- Listar Comentarios (PRUEBA)
-- ---------------------------------------------------------------------------------------------------------
DELIMITER $$
CREATE PROCEDURE spu_comentarios_listar(IN _idservicio INT)
BEGIN
	SELECT PROV.idproveedor, COM.idcomentario, COM.idusuariocomenta,
	CONCAT(PROV.nombres,' ',PROV.apellidos) AS nombreyapellido,
        COM.comentario , COM.fechahora, COM.puntuacion
	FROM comentarios COM
	INNER JOIN proveedores PROV ON PROV.idproveedor = COM.idproveedor
	INNER JOIN servicios ON servicios.`idservicio` = proveedores.
	WHERE PROV.estado = 1 AND COM.idproveedor = _idproveedor;
END $$

SELECT * FROM servicios
SELECT * FROM proveedores
SELECT * FROM comentarios
-- -----------------------------------------------------------------------------------------------------------------------
													-- ADMINISTRADOR (Tipo red social)
-- -----------------------------------------------------------------------------------------------------------------------


-- Listar
-- ---------------------------------------------------------------------------------------------------------
DELIMITER $$
CREATE PROCEDURE spu_tiporedessociales_listar()
BEGIN
	SELECT * FROM tiporedessociales
	WHERE estado = '1'
	ORDER BY idtiporedsocial;
END $$

-- Registrar
-- ---------------------------------------------------------------------------------------------------------
DELIMITER $$
CREATE PROCEDURE spu_tiporedessociales_registrar
( 
IN _redsocial VARCHAR(20)
)
BEGIN
	INSERT INTO tiporedessociales (redsocial, fechahora) 
		VALUES (_redsocial, NOW());
END $$

-- Modificar
-- ---------------------------------------------------------------------------------------------------------
DELIMITER $$
CREATE PROCEDURE spu_tiporedessociales_modificar
( 
	IN _idtiporedsocial INT,
	IN _redsocial VARCHAR(20)
)
BEGIN
	UPDATE tiporedessociales SET 
			redsocial	= _redsocial
			WHERE idtiporedsocial = _idtiporedsocial;
END $$


-- OneData Tipo red
-- ---------------------------------------------------------------------------------------------------------
DELIMITER $$
CREATE PROCEDURE spu_tiporedessociales_onedata( IN _idtiporedsocial INT)
BEGIN
	SELECT * FROM tiporedessociales
	WHERE idtiporedsocial = _idtiporedsocial
	ORDER BY idtiporedsocial;
END $$

-- Eliminar un Tipo red
-- ---------------------------------------------------------------------------------------------------------
DELIMITER $$
CREATE PROCEDURE spu_tiporededssociales_eliminar
(
	IN _idtiporedsocial INT
)
BEGIN
	UPDATE tiporedessociales SET estado = '0'
		WHERE idtiporedsocial	= _idtiporedsocial;
END $$


-- ----------------------------------------------------------------------------------------------------------------------
													-- ADMINISTRADOR (Categorias)
-- ----------------------------------------------------------------------------------------------------------------------

-- Registrar
-- ---------------------------------------------------------------------------------------------------------
DELIMITER $$
CREATE PROCEDURE spu_categorias_registrar( IN _nombrecategoria VARCHAR(50))
BEGIN
	INSERT INTO categorias (nombrecategoria, fechacategoria)
		VALUES (_nombrecategoria, NOW());
END $$

CALL spu_categorias_registrar('Albaliñeria');

-- Listar 
-- ---------------------------------------------------------------------------------------------------------
DELIMITER $$
CREATE PROCEDURE spu_categorias_listar()
BEGIN
	SELECT * FROM categorias
	WHERE estado = '1' ORDER BY idcategoria;
END $$


-- Listar un dato
-- ---------------------------------------------------------------------------------------------------------
DELIMITER $$
CREATE PROCEDURE spu_categorias_onedata(IN _idcategoria INT)
BEGIN
	SELECT * FROM categorias WHERE idcategoria = _idcategoria ORDER BY idcategoria AND estado = '1';
END $$

-- Modificar
-- ---------------------------------------------------------------------------------------------------------
DELIMITER $$
CREATE PROCEDURE spu_categorias_modificar
( 
	IN _idcategoria INT,
	IN _nombrecategoria VARCHAR(50)
)
BEGIN
	UPDATE categorias SET
		nombrecategoria = _nombrecategoria
	WHERE idcategoria = _idcategoria;
END $$


-- Eliminar un Tipo red
---- ---------------------------------------------------------------------------------------------------------
DELIMITER $$
CREATE PROCEDURE spu_categorias_eliminar
(
	IN _idcategoria INT
)
BEGIN
	UPDATE categorias SET estado = '0'
		WHERE idcategoria	= _idcategoria;
END $$


-- -----------------------------------------------------------------------------------------------------------------------
													-- GRAFICOS ESTADISTICOS
-- -----------------------------------------------------------------------------------------------------------------------

-- Proveedores registrados por año
-- ---------------------------------------------------------------------------------------------------------
DELIMITER $$
CREATE PROCEDURE spu_graficos_proveedores_listar()
BEGIN
	SELECT YEAR (fecharegistro) AS 'fecha',COUNT(*) AS 'cantidad' FROM proveedores
	GROUP BY YEAR(fecharegistro);
END $$

-- Numero de publicaciones de servicios por cateogias
DELIMITER $$
CREATE PROCEDURE spu_graficos_categorias_servicios_listar()
BEGIN
	SELECT (nombrecategoria) AS 'Categoria',COUNT(nombrecategoria) AS 'Publicaciones' 
	FROM servicios
	INNER JOIN categorias ON categorias.`idcategoria` = servicios.`idcategoria`
	WHERE servicios.`estado` = 1
	GROUP BY (nombrecategoria);
END $$

-- Numero de publicaciones de servicios por cateogias
DELIMITER $$
CREATE PROCEDURE spu_graficos_servicios_nivel_listar()
BEGIN
	SELECT (nivel) AS 'Nivel',COUNT(nivel) AS 'Servicios' 
	FROM servicios
	GROUP BY (nivel);
END $$

SELECT * FROM categorias
SELECT * FROM proveedores

