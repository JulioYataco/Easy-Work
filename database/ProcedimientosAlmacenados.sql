USE EasyWork;

-- PROCEDIMIENTOS ALMACENADOS

-- CRUD DE PROVEEDORES --

-- Registrar
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


-- Listar proveedores
DELIMITER $$
CREATE PROCEDURE spu_proveedores_listar()
BEGIN
	SELECT * FROM proveedores
	WHERE estado = '1' ORDER BY idproveedor DESC;
END $$


-- Modificar proveedor
DELIMITER $$
CREATE PROCEDURE spu_proveedores_modificar
(
	IN _idproveedor	INT,
	IN _iddistrito 	INT,
	IN _nombres 		VARCHAR(30),
	IN _apellidos 	VARCHAR(30),
	IN _fechanac 		DATE,
	IN _telefono 		CHAR(11),
	IN _correo 			VARCHAR(70),
	IN _clave 			VARCHAR(100),
	IN _fotoperfil 	VARCHAR(100)
)
BEGIN
	IF _telefono = '' THEN SET _telefono = NULL; END IF;
	IF _fotoperfil = '' THEN SET _fotoperfil = NULL; END IF;
	
		UPDATE proveedores SET
			iddistrito 	= _iddistrito,
			nombre 			= _nombres,
			apellidos 	= _apellidos,
			fechanac 		= _fechanac,
			telefono 		= _telefono,
			correo 			= _correo,
			clave 			= _clave,
			fotoperfil 	= _fotoperfil
			WHERE idproveedor = _idproveedor;
END $$


-- Eliminar proveedor
DELIMITER $$
CREATE PROCEDURE spu_proveedores_eliminar(IN _idproveedor INT)
BEGIN
	-- Cambiar de estado
	UPDATE proveedores SET estado = '0', fechabaja = NOW()
		WHERE idproveedor = _idproveedor;
END $$


-- Login para proveedor (Usuario)
DELIMITER $$
CREATE PROCEDURE spu_proveedor_login
(
	IN _correo VARCHAR(70)
)
BEGIN
	SELECT * 
		FROM proveedores
		WHERE correo = _correo;
END $$

CALL spu_proveedor_login('juliocesar@gmail.com');

SELECT * FROM proveedores
-- CRUD de departamentos

-- Listar
DELIMITER $$
CREATE PROCEDURE spu_departamentos_listar()
BEGIN
	SELECT * FROM departamentos ORDER BY iddepartamento;
END $$


-- CRUD de Provincias
DELIMITER $$
CREATE PROCEDURE spu_provincias_listar
(
in _iddepartamento varchar(2)
)
BEGIN
	SELECT * 
		FROM provincias 
			WHERE iddepartamento = _iddepartamento ORDER BY idprovincia;
END $$


-- CRUD de Distritos
DELIMITER $$
CREATE PROCEDURE spu_distritos_listar
(
IN _idprovincia varchar(4)
)
BEGIN
	SELECT * 
		FROM distritos
			WHERE idprovincia = _idprovincia ORDER BY iddistrito;
END $$

CALL spu_distritos_listar(1010);

select * from proveedores