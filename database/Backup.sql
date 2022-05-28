/*
SQLyog Professional v12.5.1 (64 bit)
MySQL - 10.4.17-MariaDB : Database - easywork
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`easywork` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `easywork`;

/*Table structure for table `categorias` */

DROP TABLE IF EXISTS `categorias`;

CREATE TABLE `categorias` (
  `idcategoria` int(11) NOT NULL AUTO_INCREMENT,
  `nombrecategoria` varchar(50) NOT NULL,
  `fechacategoria` datetime NOT NULL DEFAULT current_timestamp(),
  `estado` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idcategoria`),
  UNIQUE KEY `uk_categoria_nombrecategoria` (`nombrecategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

/*Data for the table `categorias` */

insert  into `categorias`(`idcategoria`,`nombrecategoria`,`fechacategoria`,`estado`) values 
(1,'Carpinteria','2022-04-20 14:18:40','1'),
(2,'Albaliñeria','2022-04-20 14:19:25','1'),
(3,'Informático ','2022-05-23 02:48:18','0'),
(4,'Deporte','2022-05-23 14:07:20','1'),
(5,'Salud','2022-05-23 14:07:30','1'),
(6,'Asistente','2022-05-23 14:07:41','1'),
(7,'Seguridad','2022-05-23 14:07:58','1'),
(8,'Evento','2022-05-27 12:48:29','0'),
(9,'Fiesta Eventos','2022-05-27 12:49:28','0');

/*Table structure for table `comentarios` */

DROP TABLE IF EXISTS `comentarios`;

CREATE TABLE `comentarios` (
  `idcomentario` int(11) NOT NULL AUTO_INCREMENT,
  `idproveedor` int(11) NOT NULL,
  `idusuariocomenta` int(11) NOT NULL,
  `comentario` varchar(250) NOT NULL,
  `puntuacion` tinyint(4) NOT NULL,
  `fechahora` datetime NOT NULL DEFAULT current_timestamp(),
  `estado` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idcomentario`),
  KEY `fk_idproveedor_com` (`idproveedor`),
  KEY `fk_idusuariocomenta_com` (`idusuariocomenta`),
  CONSTRAINT `fk_idproveedor_com` FOREIGN KEY (`idproveedor`) REFERENCES `proveedores` (`idproveedor`),
  CONSTRAINT `fk_idusuariocomenta_com` FOREIGN KEY (`idusuariocomenta`) REFERENCES `proveedores` (`idproveedor`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4;

/*Data for the table `comentarios` */

insert  into `comentarios`(`idcomentario`,`idproveedor`,`idusuariocomenta`,`comentario`,`puntuacion`,`fechahora`,`estado`) values 
(1,4,9,'MUY MUY malo',1,'2022-05-25 12:13:39','0'),
(2,4,2,'Ya no me ',1,'2022-05-27 01:30:24','0'),
(3,10,2,'Recomendadisimo ',4,'2022-05-27 11:51:02','1'),
(4,4,2,'Hola soy julio',3,'2022-05-27 01:12:23','0'),
(5,4,2,'Por favor info',4,'2022-05-27 01:20:02','0'),
(6,4,10,'Le recomiendo vender',2,'2022-05-27 02:16:42','0'),
(7,4,10,'Cuanto demora?',1,'2022-05-27 02:17:43','0'),
(8,4,10,'Cuanto demora?',2,'2022-05-27 02:17:55','0'),
(9,4,10,'Cuanto demora?',2,'2022-05-27 02:17:58','0'),
(10,4,9,'Hola soy una prueba',3,'2022-05-27 09:31:29','1'),
(11,4,9,'Hola soy una prueba2',3,'2022-05-27 09:31:35','1'),
(15,10,10,'Lista mi comentario?',2,'2022-05-27 10:50:35','0'),
(17,10,10,'Excelente servicio',1,'2022-05-27 11:08:26','0'),
(18,10,10,'No me gusta nada',1,'2022-05-27 11:08:52','0'),
(19,9,2,'Morales bien ahí',5,'2022-05-27 11:18:56','1'),
(20,10,2,'Queda por los molinos',4,'2022-05-27 11:49:06','0'),
(21,13,13,'Que buen servicio',4,'2022-05-27 13:47:48','1'),
(22,13,13,'Recomentadismo',5,'2022-05-27 13:48:02','1'),
(23,11,8,'Muy caro esta',2,'2022-05-27 14:49:52','1'),
(24,9,2,'Muy malo',1,'2022-05-27 17:22:37','1'),
(25,9,10,'Hola yo comente',4,'2022-05-27 18:00:29','1'),
(26,11,9,'sdsd',3,'2022-05-27 18:14:34','0'),
(31,11,9,'puedo registrar comentario?',1,'2022-05-27 18:22:48','0'),
(32,11,9,'Hola soy prueba de brick',5,'2022-05-27 18:24:25','0'),
(35,11,2,'Creo que tambien deberias ofrecer descuentos pro cantidad',3,'2022-05-27 18:37:44','1'),
(37,11,4,'Muy bien trabajo amigo',4,'2022-05-27 23:28:33','1'),
(38,8,4,'Hola julio, saludos',4,'2022-05-28 00:36:50','0');

/*Table structure for table `contactos` */

DROP TABLE IF EXISTS `contactos`;

CREATE TABLE `contactos` (
  `idcontacto` int(11) NOT NULL AUTO_INCREMENT,
  `idproveedor` int(11) NOT NULL,
  `celular` char(9) NOT NULL,
  `telefono` char(9) DEFAULT NULL,
  `email` varchar(70) DEFAULT NULL,
  `estado` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idcontacto`),
  KEY `fk_idproveedor_cnt` (`idproveedor`),
  CONSTRAINT `fk_idproveedor_cnt` FOREIGN KEY (`idproveedor`) REFERENCES `proveedores` (`idproveedor`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4;

/*Data for the table `contactos` */

insert  into `contactos`(`idcontacto`,`idproveedor`,`celular`,`telefono`,`email`,`estado`) values 
(1,2,'123456789','475242424','Juliocesaryataco@gmail.com','0'),
(2,4,'946556464','365244225','juanca@gmail.com','0'),
(3,4,'995562615','266454614','Juliocesaryataco@gmail.com','0'),
(4,4,'995562615','752366556','JuanCa@gmail.com','1'),
(15,2,'987654321',NULL,'julio@sds','0'),
(16,2,'987654232',NULL,'sdddd@sds','0'),
(17,2,'945654321',NULL,'sssss@sds','0'),
(18,2,'987654121',NULL,'ccccc@sds','0'),
(19,2,'987954321',NULL,'vvvvv@sds','0'),
(20,2,'987654321','123456888','Juliocesaryataco@gmail.com','0'),
(21,8,'995562615','662432676','Juliocesaryataco@gmail.com','0'),
(22,2,'987654321','456221455','Juliocesar@gmail.com','0'),
(23,2,'978484651','746262626','Jullsaravia21@gmail.com','0'),
(24,11,'922511514','457566666','jeancyto@gmail.com','0'),
(25,10,'963696369','453654564','jorgeloco@gmail.com','1'),
(26,9,'988987552','455545554','moralejas@gmail.com','1'),
(27,2,'985265555','445578521','Juliocesaryataco@gmail.com','0'),
(28,2,'987332111','455221366','Juliocesaryataco@gmail.com','0'),
(29,2,'946556464','457512233','Juliocesaryataco@gmail.com','1'),
(30,13,'999215211','462555555','robertomartines21@gmail.com','1');

/*Table structure for table `departamentos` */

DROP TABLE IF EXISTS `departamentos`;

CREATE TABLE `departamentos` (
  `iddepartamento` varchar(2) NOT NULL,
  `nombredepartamento` varchar(45) NOT NULL,
  PRIMARY KEY (`iddepartamento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `departamentos` */

insert  into `departamentos`(`iddepartamento`,`nombredepartamento`) values 
('01','Amazonas'),
('02','Áncash'),
('03','Apurímac'),
('04','Arequipa'),
('05','Ayacucho'),
('06','Cajamarca'),
('07','Callao'),
('08','Cusco'),
('09','Huancavelica'),
('10','Huánuco'),
('11','Ica'),
('12','Junín'),
('13','La Libertad'),
('14','Lambayeque'),
('15','Lima'),
('16','Loreto'),
('17','Madre de Dios'),
('18','Moquegua'),
('19','Pasco'),
('20','Piura'),
('21','Puno'),
('22','San Martín'),
('23','Tacna'),
('24','Tumbes'),
('25','Ucayali');

/*Table structure for table `distritos` */

DROP TABLE IF EXISTS `distritos`;

CREATE TABLE `distritos` (
  `iddistrito` varchar(6) NOT NULL,
  `nombredistrito` varchar(45) NOT NULL,
  `idprovincia` varchar(4) NOT NULL,
  PRIMARY KEY (`iddistrito`),
  KEY `fk_idprovincia` (`idprovincia`),
  CONSTRAINT `fk_idprovincia` FOREIGN KEY (`idprovincia`) REFERENCES `provincias` (`idprovincia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `distritos` */

insert  into `distritos`(`iddistrito`,`nombredistrito`,`idprovincia`) values 
('010101','Chachapoyas','0101'),
('010102','Asunción','0101'),
('010103','Balsas','0101'),
('010104','Cheto','0101'),
('010105','Chiliquin','0101'),
('010106','Chuquibamba','0101'),
('010107','Granada','0101'),
('010108','Huancas','0101'),
('010109','La Jalca','0101'),
('010110','Leimebamba','0101'),
('010111','Levanto','0101'),
('010112','Magdalena','0101'),
('010113','Mariscal Castilla','0101'),
('010114','Molinopampa','0101'),
('010115','Montevideo','0101'),
('010116','Olleros','0101'),
('010117','Quinjalca','0101'),
('010118','San Francisco de Daguas','0101'),
('010119','San Isidro de Maino','0101'),
('010120','Soloco','0101'),
('010121','Sonche','0101'),
('010201','Bagua','0102'),
('010202','Aramango','0102'),
('010203','Copallin','0102'),
('010204','El Parco','0102'),
('010205','Imaza','0102'),
('010206','La Peca','0102'),
('010301','Jumbilla','0103'),
('010302','Chisquilla','0103'),
('010303','Churuja','0103'),
('010304','Corosha','0103'),
('010305','Cuispes','0103'),
('010306','Florida','0103'),
('010307','Jazan','0103'),
('010308','Recta','0103'),
('010309','San Carlos','0103'),
('010310','Shipasbamba','0103'),
('010311','Valera','0103'),
('010312','Yambrasbamba','0103'),
('010401','Nieva','0104'),
('010402','El Cenepa','0104'),
('010403','Río Santiago','0104'),
('010501','Lamud','0105'),
('010502','Camporredondo','0105'),
('010503','Cocabamba','0105'),
('010504','Colcamar','0105'),
('010505','Conila','0105'),
('010506','Inguilpata','0105'),
('010507','Longuita','0105'),
('010508','Lonya Chico','0105'),
('010509','Luya','0105'),
('010510','Luya Viejo','0105'),
('010511','María','0105'),
('010512','Ocalli','0105'),
('010513','Ocumal','0105'),
('010514','Pisuquia','0105'),
('010515','Providencia','0105'),
('010516','San Cristóbal','0105'),
('010517','San Francisco de Yeso','0105'),
('010518','San Jerónimo','0105'),
('010519','San Juan de Lopecancha','0105'),
('010520','Santa Catalina','0105'),
('010521','Santo Tomas','0105'),
('010522','Tingo','0105'),
('010523','Trita','0105'),
('010601','San Nicolás','0106'),
('010602','Chirimoto','0106'),
('010603','Cochamal','0106'),
('010604','Huambo','0106'),
('010605','Limabamba','0106'),
('010606','Longar','0106'),
('010607','Mariscal Benavides','0106'),
('010608','Milpuc','0106'),
('010609','Omia','0106'),
('010610','Santa Rosa','0106'),
('010611','Totora','0106'),
('010612','Vista Alegre','0106'),
('010701','Bagua Grande','0107'),
('010702','Cajaruro','0107'),
('010703','Cumba','0107'),
('010704','El Milagro','0107'),
('010705','Jamalca','0107'),
('010706','Lonya Grande','0107'),
('010707','Yamon','0107'),
('020101','Huaraz','0201'),
('020102','Cochabamba','0201'),
('020103','Colcabamba','0201'),
('020104','Huanchay','0201'),
('020105','Independencia','0201'),
('020106','Jangas','0201'),
('020107','La Libertad','0201'),
('020108','Olleros','0201'),
('020109','Pampas Grande','0201'),
('020110','Pariacoto','0201'),
('020111','Pira','0201'),
('020112','Tarica','0201'),
('020201','Aija','0202'),
('020202','Coris','0202'),
('020203','Huacllan','0202'),
('020204','La Merced','0202'),
('020205','Succha','0202'),
('020301','Llamellin','0203'),
('020302','Aczo','0203'),
('020303','Chaccho','0203'),
('020304','Chingas','0203'),
('020305','Mirgas','0203'),
('020306','San Juan de Rontoy','0203'),
('020401','Chacas','0204'),
('020402','Acochaca','0204'),
('020501','Chiquian','0205'),
('020502','Abelardo Pardo Lezameta','0205'),
('020503','Antonio Raymondi','0205'),
('020504','Aquia','0205'),
('020505','Cajacay','0205'),
('020506','Canis','0205'),
('020507','Colquioc','0205'),
('020508','Huallanca','0205'),
('020509','Huasta','0205'),
('020510','Huayllacayan','0205'),
('020511','La Primavera','0205'),
('020512','Mangas','0205'),
('020513','Pacllon','0205'),
('020514','San Miguel de Corpanqui','0205'),
('020515','Ticllos','0205'),
('020601','Carhuaz','0206'),
('020602','Acopampa','0206'),
('020603','Amashca','0206'),
('020604','Anta','0206'),
('020605','Ataquero','0206'),
('020606','Marcara','0206'),
('020607','Pariahuanca','0206'),
('020608','San Miguel de Aco','0206'),
('020609','Shilla','0206'),
('020610','Tinco','0206'),
('020611','Yungar','0206'),
('020701','San Luis','0207'),
('020702','San Nicolás','0207'),
('020703','Yauya','0207'),
('020801','Casma','0208'),
('020802','Buena Vista Alta','0208'),
('020803','Comandante Noel','0208'),
('020804','Yautan','0208'),
('020901','Corongo','0209'),
('020902','Aco','0209'),
('020903','Bambas','0209'),
('020904','Cusca','0209'),
('020905','La Pampa','0209'),
('020906','Yanac','0209'),
('020907','Yupan','0209'),
('021001','Huari','0210'),
('021002','Anra','0210'),
('021003','Cajay','0210'),
('021004','Chavin de Huantar','0210'),
('021005','Huacachi','0210'),
('021006','Huacchis','0210'),
('021007','Huachis','0210'),
('021008','Huantar','0210'),
('021009','Masin','0210'),
('021010','Paucas','0210'),
('021011','Ponto','0210'),
('021012','Rahuapampa','0210'),
('021013','Rapayan','0210'),
('021014','San Marcos','0210'),
('021015','San Pedro de Chana','0210'),
('021016','Uco','0210'),
('021101','Huarmey','0211'),
('021102','Cochapeti','0211'),
('021103','Culebras','0211'),
('021104','Huayan','0211'),
('021105','Malvas','0211'),
('021201','Caraz','0212'),
('021202','Huallanca','0212'),
('021203','Huata','0212'),
('021204','Huaylas','0212'),
('021205','Mato','0212'),
('021206','Pamparomas','0212'),
('021207','Pueblo Libre','0212'),
('021208','Santa Cruz','0212'),
('021209','Santo Toribio','0212'),
('021210','Yuracmarca','0212'),
('021301','Piscobamba','0213'),
('021302','Casca','0213'),
('021303','Eleazar Guzmán Barron','0213'),
('021304','Fidel Olivas Escudero','0213'),
('021305','Llama','0213'),
('021306','Llumpa','0213'),
('021307','Lucma','0213'),
('021308','Musga','0213'),
('021401','Ocros','0214'),
('021402','Acas','0214'),
('021403','Cajamarquilla','0214'),
('021404','Carhuapampa','0214'),
('021405','Cochas','0214'),
('021406','Congas','0214'),
('021407','Llipa','0214'),
('021408','San Cristóbal de Rajan','0214'),
('021409','San Pedro','0214'),
('021410','Santiago de Chilcas','0214'),
('021501','Cabana','0215'),
('021502','Bolognesi','0215'),
('021503','Conchucos','0215'),
('021504','Huacaschuque','0215'),
('021505','Huandoval','0215'),
('021506','Lacabamba','0215'),
('021507','Llapo','0215'),
('021508','Pallasca','0215'),
('021509','Pampas','0215'),
('021510','Santa Rosa','0215'),
('021511','Tauca','0215'),
('021601','Pomabamba','0216'),
('021602','Huayllan','0216'),
('021603','Parobamba','0216'),
('021604','Quinuabamba','0216'),
('021701','Recuay','0217'),
('021702','Catac','0217'),
('021703','Cotaparaco','0217'),
('021704','Huayllapampa','0217'),
('021705','Llacllin','0217'),
('021706','Marca','0217'),
('021707','Pampas Chico','0217'),
('021708','Pararin','0217'),
('021709','Tapacocha','0217'),
('021710','Ticapampa','0217'),
('021801','Chimbote','0218'),
('021802','Cáceres del Perú','0218'),
('021803','Coishco','0218'),
('021804','Macate','0218'),
('021805','Moro','0218'),
('021806','Nepeña','0218'),
('021807','Samanco','0218'),
('021808','Santa','0218'),
('021809','Nuevo Chimbote','0218'),
('021901','Sihuas','0219'),
('021902','Acobamba','0219'),
('021903','Alfonso Ugarte','0219'),
('021904','Cashapampa','0219'),
('021905','Chingalpo','0219'),
('021906','Huayllabamba','0219'),
('021907','Quiches','0219'),
('021908','Ragash','0219'),
('021909','San Juan','0219'),
('021910','Sicsibamba','0219'),
('022001','Yungay','0220'),
('022002','Cascapara','0220'),
('022003','Mancos','0220'),
('022004','Matacoto','0220'),
('022005','Quillo','0220'),
('022006','Ranrahirca','0220'),
('022007','Shupluy','0220'),
('022008','Yanama','0220'),
('030101','Abancay','0301'),
('030102','Chacoche','0301'),
('030103','Circa','0301'),
('030104','Curahuasi','0301'),
('030105','Huanipaca','0301'),
('030106','Lambrama','0301'),
('030107','Pichirhua','0301'),
('030108','San Pedro de Cachora','0301'),
('030109','Tamburco','0301'),
('030201','Andahuaylas','0302'),
('030202','Andarapa','0302'),
('030203','Chiara','0302'),
('030204','Huancarama','0302'),
('030205','Huancaray','0302'),
('030206','Huayana','0302'),
('030207','Kishuara','0302'),
('030208','Pacobamba','0302'),
('030209','Pacucha','0302'),
('030210','Pampachiri','0302'),
('030211','Pomacocha','0302'),
('030212','San Antonio de Cachi','0302'),
('030213','San Jerónimo','0302'),
('030214','San Miguel de Chaccrampa','0302'),
('030215','Santa María de Chicmo','0302'),
('030216','Talavera','0302'),
('030217','Tumay Huaraca','0302'),
('030218','Turpo','0302'),
('030219','Kaquiabamba','0302'),
('030220','José María Arguedas','0302'),
('030301','Antabamba','0303'),
('030302','El Oro','0303'),
('030303','Huaquirca','0303'),
('030304','Juan Espinoza Medrano','0303'),
('030305','Oropesa','0303'),
('030306','Pachaconas','0303'),
('030307','Sabaino','0303'),
('030401','Chalhuanca','0304'),
('030402','Capaya','0304'),
('030403','Caraybamba','0304'),
('030404','Chapimarca','0304'),
('030405','Colcabamba','0304'),
('030406','Cotaruse','0304'),
('030407','Ihuayllo','0304'),
('030408','Justo Apu Sahuaraura','0304'),
('030409','Lucre','0304'),
('030410','Pocohuanca','0304'),
('030411','San Juan de Chacña','0304'),
('030412','Sañayca','0304'),
('030413','Soraya','0304'),
('030414','Tapairihua','0304'),
('030415','Tintay','0304'),
('030416','Toraya','0304'),
('030417','Yanaca','0304'),
('030501','Tambobamba','0305'),
('030502','Cotabambas','0305'),
('030503','Coyllurqui','0305'),
('030504','Haquira','0305'),
('030505','Mara','0305'),
('030506','Challhuahuacho','0305'),
('030601','Chincheros','0306'),
('030602','Anco_Huallo','0306'),
('030603','Cocharcas','0306'),
('030604','Huaccana','0306'),
('030605','Ocobamba','0306'),
('030606','Ongoy','0306'),
('030607','Uranmarca','0306'),
('030608','Ranracancha','0306'),
('030609','Rocchacc','0306'),
('030610','El Porvenir','0306'),
('030611','Los Chankas','0306'),
('030701','Chuquibambilla','0307'),
('030702','Curpahuasi','0307'),
('030703','Gamarra','0307'),
('030704','Huayllati','0307'),
('030705','Mamara','0307'),
('030706','Micaela Bastidas','0307'),
('030707','Pataypampa','0307'),
('030708','Progreso','0307'),
('030709','San Antonio','0307'),
('030710','Santa Rosa','0307'),
('030711','Turpay','0307'),
('030712','Vilcabamba','0307'),
('030713','Virundo','0307'),
('030714','Curasco','0307'),
('040101','Arequipa','0401'),
('040102','Alto Selva Alegre','0401'),
('040103','Cayma','0401'),
('040104','Cerro Colorado','0401'),
('040105','Characato','0401'),
('040106','Chiguata','0401'),
('040107','Jacobo Hunter','0401'),
('040108','La Joya','0401'),
('040109','Mariano Melgar','0401'),
('040110','Miraflores','0401'),
('040111','Mollebaya','0401'),
('040112','Paucarpata','0401'),
('040113','Pocsi','0401'),
('040114','Polobaya','0401'),
('040115','Quequeña','0401'),
('040116','Sabandia','0401'),
('040117','Sachaca','0401'),
('040118','San Juan de Siguas','0401'),
('040119','San Juan de Tarucani','0401'),
('040120','Santa Isabel de Siguas','0401'),
('040121','Santa Rita de Siguas','0401'),
('040122','Socabaya','0401'),
('040123','Tiabaya','0401'),
('040124','Uchumayo','0401'),
('040125','Vitor','0401'),
('040126','Yanahuara','0401'),
('040127','Yarabamba','0401'),
('040128','Yura','0401'),
('040129','José Luis Bustamante Y Rivero','0401'),
('040201','Camaná','0402'),
('040202','José María Quimper','0402'),
('040203','Mariano Nicolás Valcárcel','0402'),
('040204','Mariscal Cáceres','0402'),
('040205','Nicolás de Pierola','0402'),
('040206','Ocoña','0402'),
('040207','Quilca','0402'),
('040208','Samuel Pastor','0402'),
('040301','Caravelí','0403'),
('040302','Acarí','0403'),
('040303','Atico','0403'),
('040304','Atiquipa','0403'),
('040305','Bella Unión','0403'),
('040306','Cahuacho','0403'),
('040307','Chala','0403'),
('040308','Chaparra','0403'),
('040309','Huanuhuanu','0403'),
('040310','Jaqui','0403'),
('040311','Lomas','0403'),
('040312','Quicacha','0403'),
('040313','Yauca','0403'),
('040401','Aplao','0404'),
('040402','Andagua','0404'),
('040403','Ayo','0404'),
('040404','Chachas','0404'),
('040405','Chilcaymarca','0404'),
('040406','Choco','0404'),
('040407','Huancarqui','0404'),
('040408','Machaguay','0404'),
('040409','Orcopampa','0404'),
('040410','Pampacolca','0404'),
('040411','Tipan','0404'),
('040412','Uñon','0404'),
('040413','Uraca','0404'),
('040414','Viraco','0404'),
('040501','Chivay','0405'),
('040502','Achoma','0405'),
('040503','Cabanaconde','0405'),
('040504','Callalli','0405'),
('040505','Caylloma','0405'),
('040506','Coporaque','0405'),
('040507','Huambo','0405'),
('040508','Huanca','0405'),
('040509','Ichupampa','0405'),
('040510','Lari','0405'),
('040511','Lluta','0405'),
('040512','Maca','0405'),
('040513','Madrigal','0405'),
('040514','San Antonio de Chuca','0405'),
('040515','Sibayo','0405'),
('040516','Tapay','0405'),
('040517','Tisco','0405'),
('040518','Tuti','0405'),
('040519','Yanque','0405'),
('040520','Majes','0405'),
('040601','Chuquibamba','0406'),
('040602','Andaray','0406'),
('040603','Cayarani','0406'),
('040604','Chichas','0406'),
('040605','Iray','0406'),
('040606','Río Grande','0406'),
('040607','Salamanca','0406'),
('040608','Yanaquihua','0406'),
('040701','Mollendo','0407'),
('040702','Cocachacra','0407'),
('040703','Dean Valdivia','0407'),
('040704','Islay','0407'),
('040705','Mejia','0407'),
('040706','Punta de Bombón','0407'),
('040801','Cotahuasi','0408'),
('040802','Alca','0408'),
('040803','Charcana','0408'),
('040804','Huaynacotas','0408'),
('040805','Pampamarca','0408'),
('040806','Puyca','0408'),
('040807','Quechualla','0408'),
('040808','Sayla','0408'),
('040809','Tauria','0408'),
('040810','Tomepampa','0408'),
('040811','Toro','0408'),
('050101','Ayacucho','0501'),
('050102','Acocro','0501'),
('050103','Acos Vinchos','0501'),
('050104','Carmen Alto','0501'),
('050105','Chiara','0501'),
('050106','Ocros','0501'),
('050107','Pacaycasa','0501'),
('050108','Quinua','0501'),
('050109','San José de Ticllas','0501'),
('050110','San Juan Bautista','0501'),
('050111','Santiago de Pischa','0501'),
('050112','Socos','0501'),
('050113','Tambillo','0501'),
('050114','Vinchos','0501'),
('050115','Jesús Nazareno','0501'),
('050116','Andrés Avelino Cáceres Dorregaray','0501'),
('050201','Cangallo','0502'),
('050202','Chuschi','0502'),
('050203','Los Morochucos','0502'),
('050204','María Parado de Bellido','0502'),
('050205','Paras','0502'),
('050206','Totos','0502'),
('050301','Sancos','0503'),
('050302','Carapo','0503'),
('050303','Sacsamarca','0503'),
('050304','Santiago de Lucanamarca','0503'),
('050401','Huanta','0504'),
('050402','Ayahuanco','0504'),
('050403','Huamanguilla','0504'),
('050404','Iguain','0504'),
('050405','Luricocha','0504'),
('050406','Santillana','0504'),
('050407','Sivia','0504'),
('050408','Llochegua','0504'),
('050409','Canayre','0504'),
('050410','Uchuraccay','0504'),
('050411','Pucacolpa','0504'),
('050412','Chaca','0504'),
('050501','San Miguel','0505'),
('050502','Anco','0505'),
('050503','Ayna','0505'),
('050504','Chilcas','0505'),
('050505','Chungui','0505'),
('050506','Luis Carranza','0505'),
('050507','Santa Rosa','0505'),
('050508','Tambo','0505'),
('050509','Samugari','0505'),
('050510','Anchihuay','0505'),
('050511','Oronccoy','0505'),
('050601','Puquio','0506'),
('050602','Aucara','0506'),
('050603','Cabana','0506'),
('050604','Carmen Salcedo','0506'),
('050605','Chaviña','0506'),
('050606','Chipao','0506'),
('050607','Huac-Huas','0506'),
('050608','Laramate','0506'),
('050609','Leoncio Prado','0506'),
('050610','Llauta','0506'),
('050611','Lucanas','0506'),
('050612','Ocaña','0506'),
('050613','Otoca','0506'),
('050614','Saisa','0506'),
('050615','San Cristóbal','0506'),
('050616','San Juan','0506'),
('050617','San Pedro','0506'),
('050618','San Pedro de Palco','0506'),
('050619','Sancos','0506'),
('050620','Santa Ana de Huaycahuacho','0506'),
('050621','Santa Lucia','0506'),
('050701','Coracora','0507'),
('050702','Chumpi','0507'),
('050703','Coronel Castañeda','0507'),
('050704','Pacapausa','0507'),
('050705','Pullo','0507'),
('050706','Puyusca','0507'),
('050707','San Francisco de Ravacayco','0507'),
('050708','Upahuacho','0507'),
('050801','Pausa','0508'),
('050802','Colta','0508'),
('050803','Corculla','0508'),
('050804','Lampa','0508'),
('050805','Marcabamba','0508'),
('050806','Oyolo','0508'),
('050807','Pararca','0508'),
('050808','San Javier de Alpabamba','0508'),
('050809','San José de Ushua','0508'),
('050810','Sara Sara','0508'),
('050901','Querobamba','0509'),
('050902','Belén','0509'),
('050903','Chalcos','0509'),
('050904','Chilcayoc','0509'),
('050905','Huacaña','0509'),
('050906','Morcolla','0509'),
('050907','Paico','0509'),
('050908','San Pedro de Larcay','0509'),
('050909','San Salvador de Quije','0509'),
('050910','Santiago de Paucaray','0509'),
('050911','Soras','0509'),
('051001','Huancapi','0510'),
('051002','Alcamenca','0510'),
('051003','Apongo','0510'),
('051004','Asquipata','0510'),
('051005','Canaria','0510'),
('051006','Cayara','0510'),
('051007','Colca','0510'),
('051008','Huamanquiquia','0510'),
('051009','Huancaraylla','0510'),
('051010','Hualla','0510'),
('051011','Sarhua','0510'),
('051012','Vilcanchos','0510'),
('051101','Vilcas Huaman','0511'),
('051102','Accomarca','0511'),
('051103','Carhuanca','0511'),
('051104','Concepción','0511'),
('051105','Huambalpa','0511'),
('051106','Independencia','0511'),
('051107','Saurama','0511'),
('051108','Vischongo','0511'),
('060101','Cajamarca','0601'),
('060102','Asunción','0601'),
('060103','Chetilla','0601'),
('060104','Cospan','0601'),
('060105','Encañada','0601'),
('060106','Jesús','0601'),
('060107','Llacanora','0601'),
('060108','Los Baños del Inca','0601'),
('060109','Magdalena','0601'),
('060110','Matara','0601'),
('060111','Namora','0601'),
('060112','San Juan','0601'),
('060201','Cajabamba','0602'),
('060202','Cachachi','0602'),
('060203','Condebamba','0602'),
('060204','Sitacocha','0602'),
('060301','Celendín','0603'),
('060302','Chumuch','0603'),
('060303','Cortegana','0603'),
('060304','Huasmin','0603'),
('060305','Jorge Chávez','0603'),
('060306','José Gálvez','0603'),
('060307','Miguel Iglesias','0603'),
('060308','Oxamarca','0603'),
('060309','Sorochuco','0603'),
('060310','Sucre','0603'),
('060311','Utco','0603'),
('060312','La Libertad de Pallan','0603'),
('060401','Chota','0604'),
('060402','Anguia','0604'),
('060403','Chadin','0604'),
('060404','Chiguirip','0604'),
('060405','Chimban','0604'),
('060406','Choropampa','0604'),
('060407','Cochabamba','0604'),
('060408','Conchan','0604'),
('060409','Huambos','0604'),
('060410','Lajas','0604'),
('060411','Llama','0604'),
('060412','Miracosta','0604'),
('060413','Paccha','0604'),
('060414','Pion','0604'),
('060415','Querocoto','0604'),
('060416','San Juan de Licupis','0604'),
('060417','Tacabamba','0604'),
('060418','Tocmoche','0604'),
('060419','Chalamarca','0604'),
('060501','Contumaza','0605'),
('060502','Chilete','0605'),
('060503','Cupisnique','0605'),
('060504','Guzmango','0605'),
('060505','San Benito','0605'),
('060506','Santa Cruz de Toledo','0605'),
('060507','Tantarica','0605'),
('060508','Yonan','0605'),
('060601','Cutervo','0606'),
('060602','Callayuc','0606'),
('060603','Choros','0606'),
('060604','Cujillo','0606'),
('060605','La Ramada','0606'),
('060606','Pimpingos','0606'),
('060607','Querocotillo','0606'),
('060608','San Andrés de Cutervo','0606'),
('060609','San Juan de Cutervo','0606'),
('060610','San Luis de Lucma','0606'),
('060611','Santa Cruz','0606'),
('060612','Santo Domingo de la Capilla','0606'),
('060613','Santo Tomas','0606'),
('060614','Socota','0606'),
('060615','Toribio Casanova','0606'),
('060701','Bambamarca','0607'),
('060702','Chugur','0607'),
('060703','Hualgayoc','0607'),
('060801','Jaén','0608'),
('060802','Bellavista','0608'),
('060803','Chontali','0608'),
('060804','Colasay','0608'),
('060805','Huabal','0608'),
('060806','Las Pirias','0608'),
('060807','Pomahuaca','0608'),
('060808','Pucara','0608'),
('060809','Sallique','0608'),
('060810','San Felipe','0608'),
('060811','San José del Alto','0608'),
('060812','Santa Rosa','0608'),
('060901','San Ignacio','0609'),
('060902','Chirinos','0609'),
('060903','Huarango','0609'),
('060904','La Coipa','0609'),
('060905','Namballe','0609'),
('060906','San José de Lourdes','0609'),
('060907','Tabaconas','0609'),
('061001','Pedro Gálvez','0610'),
('061002','Chancay','0610'),
('061003','Eduardo Villanueva','0610'),
('061004','Gregorio Pita','0610'),
('061005','Ichocan','0610'),
('061006','José Manuel Quiroz','0610'),
('061007','José Sabogal','0610'),
('061101','San Miguel','0611'),
('061102','Bolívar','0611'),
('061103','Calquis','0611'),
('061104','Catilluc','0611'),
('061105','El Prado','0611'),
('061106','La Florida','0611'),
('061107','Llapa','0611'),
('061108','Nanchoc','0611'),
('061109','Niepos','0611'),
('061110','San Gregorio','0611'),
('061111','San Silvestre de Cochan','0611'),
('061112','Tongod','0611'),
('061113','Unión Agua Blanca','0611'),
('061201','San Pablo','0612'),
('061202','San Bernardino','0612'),
('061203','San Luis','0612'),
('061204','Tumbaden','0612'),
('061301','Santa Cruz','0613'),
('061302','Andabamba','0613'),
('061303','Catache','0613'),
('061304','Chancaybaños','0613'),
('061305','La Esperanza','0613'),
('061306','Ninabamba','0613'),
('061307','Pulan','0613'),
('061308','Saucepampa','0613'),
('061309','Sexi','0613'),
('061310','Uticyacu','0613'),
('061311','Yauyucan','0613'),
('070101','Callao','0701'),
('070102','Bellavista','0701'),
('070103','Carmen de la Legua Reynoso','0701'),
('070104','La Perla','0701'),
('070105','La Punta','0701'),
('070106','Ventanilla','0701'),
('070107','Mi Perú','0701'),
('080101','Cusco','0801'),
('080102','Ccorca','0801'),
('080103','Poroy','0801'),
('080104','San Jerónimo','0801'),
('080105','San Sebastian','0801'),
('080106','Santiago','0801'),
('080107','Saylla','0801'),
('080108','Wanchaq','0801'),
('080201','Acomayo','0802'),
('080202','Acopia','0802'),
('080203','Acos','0802'),
('080204','Mosoc Llacta','0802'),
('080205','Pomacanchi','0802'),
('080206','Rondocan','0802'),
('080207','Sangarara','0802'),
('080301','Anta','0803'),
('080302','Ancahuasi','0803'),
('080303','Cachimayo','0803'),
('080304','Chinchaypujio','0803'),
('080305','Huarocondo','0803'),
('080306','Limatambo','0803'),
('080307','Mollepata','0803'),
('080308','Pucyura','0803'),
('080309','Zurite','0803'),
('080401','Calca','0804'),
('080402','Coya','0804'),
('080403','Lamay','0804'),
('080404','Lares','0804'),
('080405','Pisac','0804'),
('080406','San Salvador','0804'),
('080407','Taray','0804'),
('080408','Yanatile','0804'),
('080501','Yanaoca','0805'),
('080502','Checca','0805'),
('080503','Kunturkanki','0805'),
('080504','Langui','0805'),
('080505','Layo','0805'),
('080506','Pampamarca','0805'),
('080507','Quehue','0805'),
('080508','Tupac Amaru','0805'),
('080601','Sicuani','0806'),
('080602','Checacupe','0806'),
('080603','Combapata','0806'),
('080604','Marangani','0806'),
('080605','Pitumarca','0806'),
('080606','San Pablo','0806'),
('080607','San Pedro','0806'),
('080608','Tinta','0806'),
('080701','Santo Tomas','0807'),
('080702','Capacmarca','0807'),
('080703','Chamaca','0807'),
('080704','Colquemarca','0807'),
('080705','Livitaca','0807'),
('080706','Llusco','0807'),
('080707','Quiñota','0807'),
('080708','Velille','0807'),
('080801','Espinar','0808'),
('080802','Condoroma','0808'),
('080803','Coporaque','0808'),
('080804','Ocoruro','0808'),
('080805','Pallpata','0808'),
('080806','Pichigua','0808'),
('080807','Suyckutambo','0808'),
('080808','Alto Pichigua','0808'),
('080901','Santa Ana','0809'),
('080902','Echarate','0809'),
('080903','Huayopata','0809'),
('080904','Maranura','0809'),
('080905','Ocobamba','0809'),
('080906','Quellouno','0809'),
('080907','Kimbiri','0809'),
('080908','Santa Teresa','0809'),
('080909','Vilcabamba','0809'),
('080910','Pichari','0809'),
('080911','Inkawasi','0809'),
('080912','Villa Virgen','0809'),
('080913','Villa Kintiarina','0809'),
('080914','Megantoni','0809'),
('081001','Paruro','0810'),
('081002','Accha','0810'),
('081003','Ccapi','0810'),
('081004','Colcha','0810'),
('081005','Huanoquite','0810'),
('081006','Omachaç','0810'),
('081007','Paccaritambo','0810'),
('081008','Pillpinto','0810'),
('081009','Yaurisque','0810'),
('081101','Paucartambo','0811'),
('081102','Caicay','0811'),
('081103','Challabamba','0811'),
('081104','Colquepata','0811'),
('081105','Huancarani','0811'),
('081106','Kosñipata','0811'),
('081201','Urcos','0812'),
('081202','Andahuaylillas','0812'),
('081203','Camanti','0812'),
('081204','Ccarhuayo','0812'),
('081205','Ccatca','0812'),
('081206','Cusipata','0812'),
('081207','Huaro','0812'),
('081208','Lucre','0812'),
('081209','Marcapata','0812'),
('081210','Ocongate','0812'),
('081211','Oropesa','0812'),
('081212','Quiquijana','0812'),
('081301','Urubamba','0813'),
('081302','Chinchero','0813'),
('081303','Huayllabamba','0813'),
('081304','Machupicchu','0813'),
('081305','Maras','0813'),
('081306','Ollantaytambo','0813'),
('081307','Yucay','0813'),
('090101','Huancavelica','0901'),
('090102','Acobambilla','0901'),
('090103','Acoria','0901'),
('090104','Conayca','0901'),
('090105','Cuenca','0901'),
('090106','Huachocolpa','0901'),
('090107','Huayllahuara','0901'),
('090108','Izcuchaca','0901'),
('090109','Laria','0901'),
('090110','Manta','0901'),
('090111','Mariscal Cáceres','0901'),
('090112','Moya','0901'),
('090113','Nuevo Occoro','0901'),
('090114','Palca','0901'),
('090115','Pilchaca','0901'),
('090116','Vilca','0901'),
('090117','Yauli','0901'),
('090118','Ascensión','0901'),
('090119','Huando','0901'),
('090201','Acobamba','0902'),
('090202','Andabamba','0902'),
('090203','Anta','0902'),
('090204','Caja','0902'),
('090205','Marcas','0902'),
('090206','Paucara','0902'),
('090207','Pomacocha','0902'),
('090208','Rosario','0902'),
('090301','Lircay','0903'),
('090302','Anchonga','0903'),
('090303','Callanmarca','0903'),
('090304','Ccochaccasa','0903'),
('090305','Chincho','0903'),
('090306','Congalla','0903'),
('090307','Huanca-Huanca','0903'),
('090308','Huayllay Grande','0903'),
('090309','Julcamarca','0903'),
('090310','San Antonio de Antaparco','0903'),
('090311','Santo Tomas de Pata','0903'),
('090312','Secclla','0903'),
('090401','Castrovirreyna','0904'),
('090402','Arma','0904'),
('090403','Aurahua','0904'),
('090404','Capillas','0904'),
('090405','Chupamarca','0904'),
('090406','Cocas','0904'),
('090407','Huachos','0904'),
('090408','Huamatambo','0904'),
('090409','Mollepampa','0904'),
('090410','San Juan','0904'),
('090411','Santa Ana','0904'),
('090412','Tantara','0904'),
('090413','Ticrapo','0904'),
('090501','Churcampa','0905'),
('090502','Anco','0905'),
('090503','Chinchihuasi','0905'),
('090504','El Carmen','0905'),
('090505','La Merced','0905'),
('090506','Locroja','0905'),
('090507','Paucarbamba','0905'),
('090508','San Miguel de Mayocc','0905'),
('090509','San Pedro de Coris','0905'),
('090510','Pachamarca','0905'),
('090511','Cosme','0905'),
('090601','Huaytara','0906'),
('090602','Ayavi','0906'),
('090603','Córdova','0906'),
('090604','Huayacundo Arma','0906'),
('090605','Laramarca','0906'),
('090606','Ocoyo','0906'),
('090607','Pilpichaca','0906'),
('090608','Querco','0906'),
('090609','Quito-Arma','0906'),
('090610','San Antonio de Cusicancha','0906'),
('090611','San Francisco de Sangayaico','0906'),
('090612','San Isidro','0906'),
('090613','Santiago de Chocorvos','0906'),
('090614','Santiago de Quirahuara','0906'),
('090615','Santo Domingo de Capillas','0906'),
('090616','Tambo','0906'),
('090701','Pampas','0907'),
('090702','Acostambo','0907'),
('090703','Acraquia','0907'),
('090704','Ahuaycha','0907'),
('090705','Colcabamba','0907'),
('090706','Daniel Hernández','0907'),
('090707','Huachocolpa','0907'),
('090709','Huaribamba','0907'),
('090710','Ñahuimpuquio','0907'),
('090711','Pazos','0907'),
('090713','Quishuar','0907'),
('090714','Salcabamba','0907'),
('090715','Salcahuasi','0907'),
('090716','San Marcos de Rocchac','0907'),
('090717','Surcubamba','0907'),
('090718','Tintay Puncu','0907'),
('090719','Quichuas','0907'),
('090720','Andaymarca','0907'),
('090721','Roble','0907'),
('090722','Pichos','0907'),
('090723','Santiago de Tucuma','0907'),
('100101','Huanuco','1001'),
('100102','Amarilis','1001'),
('100103','Chinchao','1001'),
('100104','Churubamba','1001'),
('100105','Margos','1001'),
('100106','Quisqui (Kichki)','1001'),
('100107','San Francisco de Cayran','1001'),
('100108','San Pedro de Chaulan','1001'),
('100109','Santa María del Valle','1001'),
('100110','Yarumayo','1001'),
('100111','Pillco Marca','1001'),
('100112','Yacus','1001'),
('100113','San Pablo de Pillao','1001'),
('100201','Ambo','1002'),
('100202','Cayna','1002'),
('100203','Colpas','1002'),
('100204','Conchamarca','1002'),
('100205','Huacar','1002'),
('100206','San Francisco','1002'),
('100207','San Rafael','1002'),
('100208','Tomay Kichwa','1002'),
('100301','La Unión','1003'),
('100307','Chuquis','1003'),
('100311','Marías','1003'),
('100313','Pachas','1003'),
('100316','Quivilla','1003'),
('100317','Ripan','1003'),
('100321','Shunqui','1003'),
('100322','Sillapata','1003'),
('100323','Yanas','1003'),
('100401','Huacaybamba','1004'),
('100402','Canchabamba','1004'),
('100403','Cochabamba','1004'),
('100404','Pinra','1004'),
('100501','Llata','1005'),
('100502','Arancay','1005'),
('100503','Chavín de Pariarca','1005'),
('100504','Jacas Grande','1005'),
('100505','Jircan','1005'),
('100506','Miraflores','1005'),
('100507','Monzón','1005'),
('100508','Punchao','1005'),
('100509','Puños','1005'),
('100510','Singa','1005'),
('100511','Tantamayo','1005'),
('100601','Rupa-Rupa','1006'),
('100602','Daniel Alomía Robles','1006'),
('100603','Hermílio Valdizan','1006'),
('100604','José Crespo y Castillo','1006'),
('100605','Luyando','1006'),
('100606','Mariano Damaso Beraun','1006'),
('100607','Pucayacu','1006'),
('100608','Castillo Grande','1006'),
('100609','Pueblo Nuevo','1006'),
('100610','Santo Domingo de Anda','1006'),
('100701','Huacrachuco','1007'),
('100702','Cholon','1007'),
('100703','San Buenaventura','1007'),
('100704','La Morada','1007'),
('100705','Santa Rosa de Alto Yanajanca','1007'),
('100801','Panao','1008'),
('100802','Chaglla','1008'),
('100803','Molino','1008'),
('100804','Umari','1008'),
('100901','Puerto Inca','1009'),
('100902','Codo del Pozuzo','1009'),
('100903','Honoria','1009'),
('100904','Tournavista','1009'),
('100905','Yuyapichis','1009'),
('101001','Jesús','1010'),
('101002','Baños','1010'),
('101003','Jivia','1010'),
('101004','Queropalca','1010'),
('101005','Rondos','1010'),
('101006','San Francisco de Asís','1010'),
('101007','San Miguel de Cauri','1010'),
('101101','Chavinillo','1011'),
('101102','Cahuac','1011'),
('101103','Chacabamba','1011'),
('101104','Aparicio Pomares','1011'),
('101105','Jacas Chico','1011'),
('101106','Obas','1011'),
('101107','Pampamarca','1011'),
('101108','Choras','1011'),
('110101','Ica','1101'),
('110102','La Tinguiña','1101'),
('110103','Los Aquijes','1101'),
('110104','Ocucaje','1101'),
('110105','Pachacutec','1101'),
('110106','Parcona','1101'),
('110107','Pueblo Nuevo','1101'),
('110108','Salas','1101'),
('110109','San José de Los Molinos','1101'),
('110110','San Juan Bautista','1101'),
('110111','Santiago','1101'),
('110112','Subtanjalla','1101'),
('110113','Tate','1101'),
('110114','Yauca del Rosario','1101'),
('110201','Chincha Alta','1102'),
('110202','Alto Laran','1102'),
('110203','Chavin','1102'),
('110204','Chincha Baja','1102'),
('110205','El Carmen','1102'),
('110206','Grocio Prado','1102'),
('110207','Pueblo Nuevo','1102'),
('110208','San Juan de Yanac','1102'),
('110209','San Pedro de Huacarpana','1102'),
('110210','Sunampe','1102'),
('110211','Tambo de Mora','1102'),
('110301','Nasca','1103'),
('110302','Changuillo','1103'),
('110303','El Ingenio','1103'),
('110304','Marcona','1103'),
('110305','Vista Alegre','1103'),
('110401','Palpa','1104'),
('110402','Llipata','1104'),
('110403','Río Grande','1104'),
('110404','Santa Cruz','1104'),
('110405','Tibillo','1104'),
('110501','Pisco','1105'),
('110502','Huancano','1105'),
('110503','Humay','1105'),
('110504','Independencia','1105'),
('110505','Paracas','1105'),
('110506','San Andrés','1105'),
('110507','San Clemente','1105'),
('110508','Tupac Amaru Inca','1105'),
('120101','Huancayo','1201'),
('120104','Carhuacallanga','1201'),
('120105','Chacapampa','1201'),
('120106','Chicche','1201'),
('120107','Chilca','1201'),
('120108','Chongos Alto','1201'),
('120111','Chupuro','1201'),
('120112','Colca','1201'),
('120113','Cullhuas','1201'),
('120114','El Tambo','1201'),
('120116','Huacrapuquio','1201'),
('120117','Hualhuas','1201'),
('120119','Huancan','1201'),
('120120','Huasicancha','1201'),
('120121','Huayucachi','1201'),
('120122','Ingenio','1201'),
('120124','Pariahuanca','1201'),
('120125','Pilcomayo','1201'),
('120126','Pucara','1201'),
('120127','Quichuay','1201'),
('120128','Quilcas','1201'),
('120129','San Agustín','1201'),
('120130','San Jerónimo de Tunan','1201'),
('120132','Saño','1201'),
('120133','Sapallanga','1201'),
('120134','Sicaya','1201'),
('120135','Santo Domingo de Acobamba','1201'),
('120136','Viques','1201'),
('120201','Concepción','1202'),
('120202','Aco','1202'),
('120203','Andamarca','1202'),
('120204','Chambara','1202'),
('120205','Cochas','1202'),
('120206','Comas','1202'),
('120207','Heroínas Toledo','1202'),
('120208','Manzanares','1202'),
('120209','Mariscal Castilla','1202'),
('120210','Matahuasi','1202'),
('120211','Mito','1202'),
('120212','Nueve de Julio','1202'),
('120213','Orcotuna','1202'),
('120214','San José de Quero','1202'),
('120215','Santa Rosa de Ocopa','1202'),
('120301','Chanchamayo','1203'),
('120302','Perene','1203'),
('120303','Pichanaqui','1203'),
('120304','San Luis de Shuaro','1203'),
('120305','San Ramón','1203'),
('120306','Vitoc','1203'),
('120401','Jauja','1204'),
('120402','Acolla','1204'),
('120403','Apata','1204'),
('120404','Ataura','1204'),
('120405','Canchayllo','1204'),
('120406','Curicaca','1204'),
('120407','El Mantaro','1204'),
('120408','Huamali','1204'),
('120409','Huaripampa','1204'),
('120410','Huertas','1204'),
('120411','Janjaillo','1204'),
('120412','Julcán','1204'),
('120413','Leonor Ordóñez','1204'),
('120414','Llocllapampa','1204'),
('120415','Marco','1204'),
('120416','Masma','1204'),
('120417','Masma Chicche','1204'),
('120418','Molinos','1204'),
('120419','Monobamba','1204'),
('120420','Muqui','1204'),
('120421','Muquiyauyo','1204'),
('120422','Paca','1204'),
('120423','Paccha','1204'),
('120424','Pancan','1204'),
('120425','Parco','1204'),
('120426','Pomacancha','1204'),
('120427','Ricran','1204'),
('120428','San Lorenzo','1204'),
('120429','San Pedro de Chunan','1204'),
('120430','Sausa','1204'),
('120431','Sincos','1204'),
('120432','Tunan Marca','1204'),
('120433','Yauli','1204'),
('120434','Yauyos','1204'),
('120501','Junin','1205'),
('120502','Carhuamayo','1205'),
('120503','Ondores','1205'),
('120504','Ulcumayo','1205'),
('120601','Satipo','1206'),
('120602','Coviriali','1206'),
('120603','Llaylla','1206'),
('120604','Mazamari','1206'),
('120605','Pampa Hermosa','1206'),
('120606','Pangoa','1206'),
('120607','Río Negro','1206'),
('120608','Río Tambo','1206'),
('120609','Vizcatan del Ene','1206'),
('120701','Tarma','1207'),
('120702','Acobamba','1207'),
('120703','Huaricolca','1207'),
('120704','Huasahuasi','1207'),
('120705','La Unión','1207'),
('120706','Palca','1207'),
('120707','Palcamayo','1207'),
('120708','San Pedro de Cajas','1207'),
('120709','Tapo','1207'),
('120801','La Oroya','1208'),
('120802','Chacapalpa','1208'),
('120803','Huay-Huay','1208'),
('120804','Marcapomacocha','1208'),
('120805','Morococha','1208'),
('120806','Paccha','1208'),
('120807','Santa Bárbara de Carhuacayan','1208'),
('120808','Santa Rosa de Sacco','1208'),
('120809','Suitucancha','1208'),
('120810','Yauli','1208'),
('120901','Chupaca','1209'),
('120902','Ahuac','1209'),
('120903','Chongos Bajo','1209'),
('120904','Huachac','1209'),
('120905','Huamancaca Chico','1209'),
('120906','San Juan de Iscos','1209'),
('120907','San Juan de Jarpa','1209'),
('120908','Tres de Diciembre','1209'),
('120909','Yanacancha','1209'),
('130101','Trujillo','1301'),
('130102','El Porvenir','1301'),
('130103','Florencia de Mora','1301'),
('130104','Huanchaco','1301'),
('130105','La Esperanza','1301'),
('130106','Laredo','1301'),
('130107','Moche','1301'),
('130108','Poroto','1301'),
('130109','Salaverry','1301'),
('130110','Simbal','1301'),
('130111','Victor Larco Herrera','1301'),
('130201','Ascope','1302'),
('130202','Chicama','1302'),
('130203','Chocope','1302'),
('130204','Magdalena de Cao','1302'),
('130205','Paijan','1302'),
('130206','Rázuri','1302'),
('130207','Santiago de Cao','1302'),
('130208','Casa Grande','1302'),
('130301','Bolívar','1303'),
('130302','Bambamarca','1303'),
('130303','Condormarca','1303'),
('130304','Longotea','1303'),
('130305','Uchumarca','1303'),
('130306','Ucuncha','1303'),
('130401','Chepen','1304'),
('130402','Pacanga','1304'),
('130403','Pueblo Nuevo','1304'),
('130501','Julcan','1305'),
('130502','Calamarca','1305'),
('130503','Carabamba','1305'),
('130504','Huaso','1305'),
('130601','Otuzco','1306'),
('130602','Agallpampa','1306'),
('130604','Charat','1306'),
('130605','Huaranchal','1306'),
('130606','La Cuesta','1306'),
('130608','Mache','1306'),
('130610','Paranday','1306'),
('130611','Salpo','1306'),
('130613','Sinsicap','1306'),
('130614','Usquil','1306'),
('130701','San Pedro de Lloc','1307'),
('130702','Guadalupe','1307'),
('130703','Jequetepeque','1307'),
('130704','Pacasmayo','1307'),
('130705','San José','1307'),
('130801','Tayabamba','1308'),
('130802','Buldibuyo','1308'),
('130803','Chillia','1308'),
('130804','Huancaspata','1308'),
('130805','Huaylillas','1308'),
('130806','Huayo','1308'),
('130807','Ongon','1308'),
('130808','Parcoy','1308'),
('130809','Pataz','1308'),
('130810','Pias','1308'),
('130811','Santiago de Challas','1308'),
('130812','Taurija','1308'),
('130813','Urpay','1308'),
('130901','Huamachuco','1309'),
('130902','Chugay','1309'),
('130903','Cochorco','1309'),
('130904','Curgos','1309'),
('130905','Marcabal','1309'),
('130906','Sanagoran','1309'),
('130907','Sarin','1309'),
('130908','Sartimbamba','1309'),
('131001','Santiago de Chuco','1310'),
('131002','Angasmarca','1310'),
('131003','Cachicadan','1310'),
('131004','Mollebamba','1310'),
('131005','Mollepata','1310'),
('131006','Quiruvilca','1310'),
('131007','Santa Cruz de Chuca','1310'),
('131008','Sitabamba','1310'),
('131101','Cascas','1311'),
('131102','Lucma','1311'),
('131103','Marmot','1311'),
('131104','Sayapullo','1311'),
('131201','Viru','1312'),
('131202','Chao','1312'),
('131203','Guadalupito','1312'),
('140101','Chiclayo','1401'),
('140102','Chongoyape','1401'),
('140103','Eten','1401'),
('140104','Eten Puerto','1401'),
('140105','José Leonardo Ortiz','1401'),
('140106','La Victoria','1401'),
('140107','Lagunas','1401'),
('140108','Monsefu','1401'),
('140109','Nueva Arica','1401'),
('140110','Oyotun','1401'),
('140111','Picsi','1401'),
('140112','Pimentel','1401'),
('140113','Reque','1401'),
('140114','Santa Rosa','1401'),
('140115','Saña','1401'),
('140116','Cayalti','1401'),
('140117','Patapo','1401'),
('140118','Pomalca','1401'),
('140119','Pucala','1401'),
('140120','Tuman','1401'),
('140201','Ferreñafe','1402'),
('140202','Cañaris','1402'),
('140203','Incahuasi','1402'),
('140204','Manuel Antonio Mesones Muro','1402'),
('140205','Pitipo','1402'),
('140206','Pueblo Nuevo','1402'),
('140301','Lambayeque','1403'),
('140302','Chochope','1403'),
('140303','Illimo','1403'),
('140304','Jayanca','1403'),
('140305','Mochumi','1403'),
('140306','Morrope','1403'),
('140307','Motupe','1403'),
('140308','Olmos','1403'),
('140309','Pacora','1403'),
('140310','Salas','1403'),
('140311','San José','1403'),
('140312','Tucume','1403'),
('150101','Lima','1501'),
('150102','Ancón','1501'),
('150103','Ate','1501'),
('150104','Barranco','1501'),
('150105','Breña','1501'),
('150106','Carabayllo','1501'),
('150107','Chaclacayo','1501'),
('150108','Chorrillos','1501'),
('150109','Cieneguilla','1501'),
('150110','Comas','1501'),
('150111','El Agustino','1501'),
('150112','Independencia','1501'),
('150113','Jesús María','1501'),
('150114','La Molina','1501'),
('150115','La Victoria','1501'),
('150116','Lince','1501'),
('150117','Los Olivos','1501'),
('150118','Lurigancho','1501'),
('150119','Lurin','1501'),
('150120','Magdalena del Mar','1501'),
('150121','Pueblo Libre','1501'),
('150122','Miraflores','1501'),
('150123','Pachacamac','1501'),
('150124','Pucusana','1501'),
('150125','Puente Piedra','1501'),
('150126','Punta Hermosa','1501'),
('150127','Punta Negra','1501'),
('150128','Rímac','1501'),
('150129','San Bartolo','1501'),
('150130','San Borja','1501'),
('150131','San Isidro','1501'),
('150132','San Juan de Lurigancho','1501'),
('150133','San Juan de Miraflores','1501'),
('150134','San Luis','1501'),
('150135','San Martín de Porres','1501'),
('150136','San Miguel','1501'),
('150137','Santa Anita','1501'),
('150138','Santa María del Mar','1501'),
('150139','Santa Rosa','1501'),
('150140','Santiago de Surco','1501'),
('150141','Surquillo','1501'),
('150142','Villa El Salvador','1501'),
('150143','Villa María del Triunfo','1501'),
('150201','Barranca','1502'),
('150202','Paramonga','1502'),
('150203','Pativilca','1502'),
('150204','Supe','1502'),
('150205','Supe Puerto','1502'),
('150301','Cajatambo','1503'),
('150302','Copa','1503'),
('150303','Gorgor','1503'),
('150304','Huancapon','1503'),
('150305','Manas','1503'),
('150401','Canta','1504'),
('150402','Arahuay','1504'),
('150403','Huamantanga','1504'),
('150404','Huaros','1504'),
('150405','Lachaqui','1504'),
('150406','San Buenaventura','1504'),
('150407','Santa Rosa de Quives','1504'),
('150501','San Vicente de Cañete','1505'),
('150502','Asia','1505'),
('150503','Calango','1505'),
('150504','Cerro Azul','1505'),
('150505','Chilca','1505'),
('150506','Coayllo','1505'),
('150507','Imperial','1505'),
('150508','Lunahuana','1505'),
('150509','Mala','1505'),
('150510','Nuevo Imperial','1505'),
('150511','Pacaran','1505'),
('150512','Quilmana','1505'),
('150513','San Antonio','1505'),
('150514','San Luis','1505'),
('150515','Santa Cruz de Flores','1505'),
('150516','Zúñiga','1505'),
('150601','Huaral','1506'),
('150602','Atavillos Alto','1506'),
('150603','Atavillos Bajo','1506'),
('150604','Aucallama','1506'),
('150605','Chancay','1506'),
('150606','Ihuari','1506'),
('150607','Lampian','1506'),
('150608','Pacaraos','1506'),
('150609','San Miguel de Acos','1506'),
('150610','Santa Cruz de Andamarca','1506'),
('150611','Sumbilca','1506'),
('150612','Veintisiete de Noviembre','1506'),
('150701','Matucana','1507'),
('150702','Antioquia','1507'),
('150703','Callahuanca','1507'),
('150704','Carampoma','1507'),
('150705','Chicla','1507'),
('150706','Cuenca','1507'),
('150707','Huachupampa','1507'),
('150708','Huanza','1507'),
('150709','Huarochiri','1507'),
('150710','Lahuaytambo','1507'),
('150711','Langa','1507'),
('150712','Laraos','1507'),
('150713','Mariatana','1507'),
('150714','Ricardo Palma','1507'),
('150715','San Andrés de Tupicocha','1507'),
('150716','San Antonio','1507'),
('150717','San Bartolomé','1507'),
('150718','San Damian','1507'),
('150719','San Juan de Iris','1507'),
('150720','San Juan de Tantaranche','1507'),
('150721','San Lorenzo de Quinti','1507'),
('150722','San Mateo','1507'),
('150723','San Mateo de Otao','1507'),
('150724','San Pedro de Casta','1507'),
('150725','San Pedro de Huancayre','1507'),
('150726','Sangallaya','1507'),
('150727','Santa Cruz de Cocachacra','1507'),
('150728','Santa Eulalia','1507'),
('150729','Santiago de Anchucaya','1507'),
('150730','Santiago de Tuna','1507'),
('150731','Santo Domingo de Los Olleros','1507'),
('150732','Surco','1507'),
('150801','Huacho','1508'),
('150802','Ambar','1508'),
('150803','Caleta de Carquin','1508'),
('150804','Checras','1508'),
('150805','Hualmay','1508'),
('150806','Huaura','1508'),
('150807','Leoncio Prado','1508'),
('150808','Paccho','1508'),
('150809','Santa Leonor','1508'),
('150810','Santa María','1508'),
('150811','Sayan','1508'),
('150812','Vegueta','1508'),
('150901','Oyon','1509'),
('150902','Andajes','1509'),
('150903','Caujul','1509'),
('150904','Cochamarca','1509'),
('150905','Navan','1509'),
('150906','Pachangara','1509'),
('151001','Yauyos','1510'),
('151002','Alis','1510'),
('151003','Allauca','1510'),
('151004','Ayaviri','1510'),
('151005','Azángaro','1510'),
('151006','Cacra','1510'),
('151007','Carania','1510'),
('151008','Catahuasi','1510'),
('151009','Chocos','1510'),
('151010','Cochas','1510'),
('151011','Colonia','1510'),
('151012','Hongos','1510'),
('151013','Huampara','1510'),
('151014','Huancaya','1510'),
('151015','Huangascar','1510'),
('151016','Huantan','1510'),
('151017','Huañec','1510'),
('151018','Laraos','1510'),
('151019','Lincha','1510'),
('151020','Madean','1510'),
('151021','Miraflores','1510'),
('151022','Omas','1510'),
('151023','Putinza','1510'),
('151024','Quinches','1510'),
('151025','Quinocay','1510'),
('151026','San Joaquín','1510'),
('151027','San Pedro de Pilas','1510'),
('151028','Tanta','1510'),
('151029','Tauripampa','1510'),
('151030','Tomas','1510'),
('151031','Tupe','1510'),
('151032','Viñac','1510'),
('151033','Vitis','1510'),
('160101','Iquitos','1601'),
('160102','Alto Nanay','1601'),
('160103','Fernando Lores','1601'),
('160104','Indiana','1601'),
('160105','Las Amazonas','1601'),
('160106','Mazan','1601'),
('160107','Napo','1601'),
('160108','Punchana','1601'),
('160110','Torres Causana','1601'),
('160112','Belén','1601'),
('160113','San Juan Bautista','1601'),
('160201','Yurimaguas','1602'),
('160202','Balsapuerto','1602'),
('160205','Jeberos','1602'),
('160206','Lagunas','1602'),
('160210','Santa Cruz','1602'),
('160211','Teniente Cesar López Rojas','1602'),
('160301','Nauta','1603'),
('160302','Parinari','1603'),
('160303','Tigre','1603'),
('160304','Trompeteros','1603'),
('160305','Urarinas','1603'),
('160401','Ramón Castilla','1604'),
('160402','Pebas','1604'),
('160403','Yavari','1604'),
('160404','San Pablo','1604'),
('160501','Requena','1605'),
('160502','Alto Tapiche','1605'),
('160503','Capelo','1605'),
('160504','Emilio San Martín','1605'),
('160505','Maquia','1605'),
('160506','Puinahua','1605'),
('160507','Saquena','1605'),
('160508','Soplin','1605'),
('160509','Tapiche','1605'),
('160510','Jenaro Herrera','1605'),
('160511','Yaquerana','1605'),
('160601','Contamana','1606'),
('160602','Inahuaya','1606'),
('160603','Padre Márquez','1606'),
('160604','Pampa Hermosa','1606'),
('160605','Sarayacu','1606'),
('160606','Vargas Guerra','1606'),
('160701','Barranca','1607'),
('160702','Cahuapanas','1607'),
('160703','Manseriche','1607'),
('160704','Morona','1607'),
('160705','Pastaza','1607'),
('160706','Andoas','1607'),
('160801','Putumayo','1608'),
('160802','Rosa Panduro','1608'),
('160803','Teniente Manuel Clavero','1608'),
('160804','Yaguas','1608'),
('170101','Tambopata','1701'),
('170102','Inambari','1701'),
('170103','Las Piedras','1701'),
('170104','Laberinto','1701'),
('170201','Manu','1702'),
('170202','Fitzcarrald','1702'),
('170203','Madre de Dios','1702'),
('170204','Huepetuhe','1702'),
('170301','Iñapari','1703'),
('170302','Iberia','1703'),
('170303','Tahuamanu','1703'),
('180101','Moquegua','1801'),
('180102','Carumas','1801'),
('180103','Cuchumbaya','1801'),
('180104','Samegua','1801'),
('180105','San Cristóbal','1801'),
('180106','Torata','1801'),
('180201','Omate','1802'),
('180202','Chojata','1802'),
('180203','Coalaque','1802'),
('180204','Ichuña','1802'),
('180205','La Capilla','1802'),
('180206','Lloque','1802'),
('180207','Matalaque','1802'),
('180208','Puquina','1802'),
('180209','Quinistaquillas','1802'),
('180210','Ubinas','1802'),
('180211','Yunga','1802'),
('180301','Ilo','1803'),
('180302','El Algarrobal','1803'),
('180303','Pacocha','1803'),
('190101','Chaupimarca','1901'),
('190102','Huachon','1901'),
('190103','Huariaca','1901'),
('190104','Huayllay','1901'),
('190105','Ninacaca','1901'),
('190106','Pallanchacra','1901'),
('190107','Paucartambo','1901'),
('190108','San Francisco de Asís de Yarusyacan','1901'),
('190109','Simon Bolívar','1901'),
('190110','Ticlacayan','1901'),
('190111','Tinyahuarco','1901'),
('190112','Vicco','1901'),
('190113','Yanacancha','1901'),
('190201','Yanahuanca','1902'),
('190202','Chacayan','1902'),
('190203','Goyllarisquizga','1902'),
('190204','Paucar','1902'),
('190205','San Pedro de Pillao','1902'),
('190206','Santa Ana de Tusi','1902'),
('190207','Tapuc','1902'),
('190208','Vilcabamba','1902'),
('190301','Oxapampa','1903'),
('190302','Chontabamba','1903'),
('190303','Huancabamba','1903'),
('190304','Palcazu','1903'),
('190305','Pozuzo','1903'),
('190306','Puerto Bermúdez','1903'),
('190307','Villa Rica','1903'),
('190308','Constitución','1903'),
('200101','Piura','2001'),
('200104','Castilla','2001'),
('200105','Catacaos','2001'),
('200107','Cura Mori','2001'),
('200108','El Tallan','2001'),
('200109','La Arena','2001'),
('200110','La Unión','2001'),
('200111','Las Lomas','2001'),
('200114','Tambo Grande','2001'),
('200115','Veintiseis de Octubre','2001'),
('200201','Ayabaca','2002'),
('200202','Frias','2002'),
('200203','Jilili','2002'),
('200204','Lagunas','2002'),
('200205','Montero','2002'),
('200206','Pacaipampa','2002'),
('200207','Paimas','2002'),
('200208','Sapillica','2002'),
('200209','Sicchez','2002'),
('200210','Suyo','2002'),
('200301','Huancabamba','2003'),
('200302','Canchaque','2003'),
('200303','El Carmen de la Frontera','2003'),
('200304','Huarmaca','2003'),
('200305','Lalaquiz','2003'),
('200306','San Miguel de El Faique','2003'),
('200307','Sondor','2003'),
('200308','Sondorillo','2003'),
('200401','Chulucanas','2004'),
('200402','Buenos Aires','2004'),
('200403','Chalaco','2004'),
('200404','La Matanza','2004'),
('200405','Morropon','2004'),
('200406','Salitral','2004'),
('200407','San Juan de Bigote','2004'),
('200408','Santa Catalina de Mossa','2004'),
('200409','Santo Domingo','2004'),
('200410','Yamango','2004'),
('200501','Paita','2005'),
('200502','Amotape','2005'),
('200503','Arenal','2005'),
('200504','Colan','2005'),
('200505','La Huaca','2005'),
('200506','Tamarindo','2005'),
('200507','Vichayal','2005'),
('200601','Sullana','2006'),
('200602','Bellavista','2006'),
('200603','Ignacio Escudero','2006'),
('200604','Lancones','2006'),
('200605','Marcavelica','2006'),
('200606','Miguel Checa','2006'),
('200607','Querecotillo','2006'),
('200608','Salitral','2006'),
('200701','Pariñas','2007'),
('200702','El Alto','2007'),
('200703','La Brea','2007'),
('200704','Lobitos','2007'),
('200705','Los Organos','2007'),
('200706','Mancora','2007'),
('200801','Sechura','2008'),
('200802','Bellavista de la Unión','2008'),
('200803','Bernal','2008'),
('200804','Cristo Nos Valga','2008'),
('200805','Vice','2008'),
('200806','Rinconada Llicuar','2008'),
('210101','Puno','2101'),
('210102','Acora','2101'),
('210103','Amantani','2101'),
('210104','Atuncolla','2101'),
('210105','Capachica','2101'),
('210106','Chucuito','2101'),
('210107','Coata','2101'),
('210108','Huata','2101'),
('210109','Mañazo','2101'),
('210110','Paucarcolla','2101'),
('210111','Pichacani','2101'),
('210112','Plateria','2101'),
('210113','San Antonio','2101'),
('210114','Tiquillaca','2101'),
('210115','Vilque','2101'),
('210201','Azángaro','2102'),
('210202','Achaya','2102'),
('210203','Arapa','2102'),
('210204','Asillo','2102'),
('210205','Caminaca','2102'),
('210206','Chupa','2102'),
('210207','José Domingo Choquehuanca','2102'),
('210208','Muñani','2102'),
('210209','Potoni','2102'),
('210210','Saman','2102'),
('210211','San Anton','2102'),
('210212','San José','2102'),
('210213','San Juan de Salinas','2102'),
('210214','Santiago de Pupuja','2102'),
('210215','Tirapata','2102'),
('210301','Macusani','2103'),
('210302','Ajoyani','2103'),
('210303','Ayapata','2103'),
('210304','Coasa','2103'),
('210305','Corani','2103'),
('210306','Crucero','2103'),
('210307','Ituata','2103'),
('210308','Ollachea','2103'),
('210309','San Gaban','2103'),
('210310','Usicayos','2103'),
('210401','Juli','2104'),
('210402','Desaguadero','2104'),
('210403','Huacullani','2104'),
('210404','Kelluyo','2104'),
('210405','Pisacoma','2104'),
('210406','Pomata','2104'),
('210407','Zepita','2104'),
('210501','Ilave','2105'),
('210502','Capazo','2105'),
('210503','Pilcuyo','2105'),
('210504','Santa Rosa','2105'),
('210505','Conduriri','2105'),
('210601','Huancane','2106'),
('210602','Cojata','2106'),
('210603','Huatasani','2106'),
('210604','Inchupalla','2106'),
('210605','Pusi','2106'),
('210606','Rosaspata','2106'),
('210607','Taraco','2106'),
('210608','Vilque Chico','2106'),
('210701','Lampa','2107'),
('210702','Cabanilla','2107'),
('210703','Calapuja','2107'),
('210704','Nicasio','2107'),
('210705','Ocuviri','2107'),
('210706','Palca','2107'),
('210707','Paratia','2107'),
('210708','Pucara','2107'),
('210709','Santa Lucia','2107'),
('210710','Vilavila','2107'),
('210801','Ayaviri','2108'),
('210802','Antauta','2108'),
('210803','Cupi','2108'),
('210804','Llalli','2108'),
('210805','Macari','2108'),
('210806','Nuñoa','2108'),
('210807','Orurillo','2108'),
('210808','Santa Rosa','2108'),
('210809','Umachiri','2108'),
('210901','Moho','2109'),
('210902','Conima','2109'),
('210903','Huayrapata','2109'),
('210904','Tilali','2109'),
('211001','Putina','2110'),
('211002','Ananea','2110'),
('211003','Pedro Vilca Apaza','2110'),
('211004','Quilcapuncu','2110'),
('211005','Sina','2110'),
('211101','Juliaca','2111'),
('211102','Cabana','2111'),
('211103','Cabanillas','2111'),
('211104','Caracoto','2111'),
('211105','San Miguel','2111'),
('211201','Sandia','2112'),
('211202','Cuyocuyo','2112'),
('211203','Limbani','2112'),
('211204','Patambuco','2112'),
('211205','Phara','2112'),
('211206','Quiaca','2112'),
('211207','San Juan del Oro','2112'),
('211208','Yanahuaya','2112'),
('211209','Alto Inambari','2112'),
('211210','San Pedro de Putina Punco','2112'),
('211301','Yunguyo','2113'),
('211302','Anapia','2113'),
('211303','Copani','2113'),
('211304','Cuturapi','2113'),
('211305','Ollaraya','2113'),
('211306','Tinicachi','2113'),
('211307','Unicachi','2113'),
('220101','Moyobamba','2201'),
('220102','Calzada','2201'),
('220103','Habana','2201'),
('220104','Jepelacio','2201'),
('220105','Soritor','2201'),
('220106','Yantalo','2201'),
('220201','Bellavista','2202'),
('220202','Alto Biavo','2202'),
('220203','Bajo Biavo','2202'),
('220204','Huallaga','2202'),
('220205','San Pablo','2202'),
('220206','San Rafael','2202'),
('220301','San José de Sisa','2203'),
('220302','Agua Blanca','2203'),
('220303','San Martín','2203'),
('220304','Santa Rosa','2203'),
('220305','Shatoja','2203'),
('220401','Saposoa','2204'),
('220402','Alto Saposoa','2204'),
('220403','El Eslabón','2204'),
('220404','Piscoyacu','2204'),
('220405','Sacanche','2204'),
('220406','Tingo de Saposoa','2204'),
('220501','Lamas','2205'),
('220502','Alonso de Alvarado','2205'),
('220503','Barranquita','2205'),
('220504','Caynarachi','2205'),
('220505','Cuñumbuqui','2205'),
('220506','Pinto Recodo','2205'),
('220507','Rumisapa','2205'),
('220508','San Roque de Cumbaza','2205'),
('220509','Shanao','2205'),
('220510','Tabalosos','2205'),
('220511','Zapatero','2205'),
('220601','Juanjuí','2206'),
('220602','Campanilla','2206'),
('220603','Huicungo','2206'),
('220604','Pachiza','2206'),
('220605','Pajarillo','2206'),
('220701','Picota','2207'),
('220702','Buenos Aires','2207'),
('220703','Caspisapa','2207'),
('220704','Pilluana','2207'),
('220705','Pucacaca','2207'),
('220706','San Cristóbal','2207'),
('220707','San Hilarión','2207'),
('220708','Shamboyacu','2207'),
('220709','Tingo de Ponasa','2207'),
('220710','Tres Unidos','2207'),
('220801','Rioja','2208'),
('220802','Awajun','2208'),
('220803','Elías Soplin Vargas','2208'),
('220804','Nueva Cajamarca','2208'),
('220805','Pardo Miguel','2208'),
('220806','Posic','2208'),
('220807','San Fernando','2208'),
('220808','Yorongos','2208'),
('220809','Yuracyacu','2208'),
('220901','Tarapoto','2209'),
('220902','Alberto Leveau','2209'),
('220903','Cacatachi','2209'),
('220904','Chazuta','2209'),
('220905','Chipurana','2209'),
('220906','El Porvenir','2209'),
('220907','Huimbayoc','2209'),
('220908','Juan Guerra','2209'),
('220909','La Banda de Shilcayo','2209'),
('220910','Morales','2209'),
('220911','Papaplaya','2209'),
('220912','San Antonio','2209'),
('220913','Sauce','2209'),
('220914','Shapaja','2209'),
('221001','Tocache','2210'),
('221002','Nuevo Progreso','2210'),
('221003','Polvora','2210'),
('221004','Shunte','2210'),
('221005','Uchiza','2210'),
('230101','Tacna','2301'),
('230102','Alto de la Alianza','2301'),
('230103','Calana','2301'),
('230104','Ciudad Nueva','2301'),
('230105','Inclan','2301'),
('230106','Pachia','2301'),
('230107','Palca','2301'),
('230108','Pocollay','2301'),
('230109','Sama','2301'),
('230110','Coronel Gregorio Albarracín Lanchipa','2301'),
('230111','La Yarada los Palos','2301'),
('230201','Candarave','2302'),
('230202','Cairani','2302'),
('230203','Camilaca','2302'),
('230204','Curibaya','2302'),
('230205','Huanuara','2302'),
('230206','Quilahuani','2302'),
('230301','Locumba','2303'),
('230302','Ilabaya','2303'),
('230303','Ite','2303'),
('230401','Tarata','2304'),
('230402','Héroes Albarracín','2304'),
('230403','Estique','2304'),
('230404','Estique-Pampa','2304'),
('230405','Sitajara','2304'),
('230406','Susapaya','2304'),
('230407','Tarucachi','2304'),
('230408','Ticaco','2304'),
('240101','Tumbes','2401'),
('240102','Corrales','2401'),
('240103','La Cruz','2401'),
('240104','Pampas de Hospital','2401'),
('240105','San Jacinto','2401'),
('240106','San Juan de la Virgen','2401'),
('240201','Zorritos','2402'),
('240202','Casitas','2402'),
('240203','Canoas de Punta Sal','2402'),
('240301','Zarumilla','2403'),
('240302','Aguas Verdes','2403'),
('240303','Matapalo','2403'),
('240304','Papayal','2403'),
('250101','Calleria','2501'),
('250102','Campoverde','2501'),
('250103','Iparia','2501'),
('250104','Masisea','2501'),
('250105','Yarinacocha','2501'),
('250106','Nueva Requena','2501'),
('250107','Manantay','2501'),
('250201','Raymondi','2502'),
('250202','Sepahua','2502'),
('250203','Tahuania','2502'),
('250204','Yurua','2502'),
('250301','Padre Abad','2503'),
('250302','Irazola','2503'),
('250303','Curimana','2503'),
('250304','Neshuya','2503'),
('250305','Alexander Von Humboldt','2503'),
('250401','Purus','2504');

/*Table structure for table `galerias` */

DROP TABLE IF EXISTS `galerias`;

CREATE TABLE `galerias` (
  `idgaleria` int(11) NOT NULL AUTO_INCREMENT,
  `idservicio` int(11) NOT NULL,
  `titulo` varchar(30) NOT NULL,
  `descripcion` varchar(70) DEFAULT NULL,
  `imagen` varchar(100) DEFAULT NULL,
  `estado` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idgaleria`),
  KEY `fk_idservicio_srv` (`idservicio`),
  CONSTRAINT `fk_idservicio_srv` FOREIGN KEY (`idservicio`) REFERENCES `servicios` (`idservicio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `galerias` */

/*Table structure for table `horarios` */

DROP TABLE IF EXISTS `horarios`;

CREATE TABLE `horarios` (
  `idhorario` int(11) NOT NULL AUTO_INCREMENT,
  `idproveedor` int(11) NOT NULL,
  `dialaborable` varchar(40) NOT NULL,
  `horainicio` time NOT NULL,
  `horafinal` time NOT NULL,
  PRIMARY KEY (`idhorario`),
  UNIQUE KEY `uk_idproveedor_hor` (`idproveedor`),
  CONSTRAINT `fk_idproveedor_hor` FOREIGN KEY (`idproveedor`) REFERENCES `proveedores` (`idproveedor`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

/*Data for the table `horarios` */

insert  into `horarios`(`idhorario`,`idproveedor`,`dialaborable`,`horainicio`,`horafinal`) values 
(1,2,'Lunes - Viernes','09:00:00','21:00:00'),
(2,4,'Sabados - Domingos','05:00:00','12:00:00'),
(4,11,'Interdiario','06:00:00','20:00:00'),
(5,10,'Lunes - Viernes','08:00:00','21:00:00'),
(6,8,'Lunes - Viernes','07:00:00','20:00:00'),
(7,13,'Todos los Días','10:00:00','20:00:00');

/*Table structure for table `proveedores` */

DROP TABLE IF EXISTS `proveedores`;

CREATE TABLE `proveedores` (
  `idproveedor` int(11) NOT NULL AUTO_INCREMENT,
  `iddistrito` varchar(6) NOT NULL,
  `nombres` varchar(30) NOT NULL,
  `apellidos` varchar(30) NOT NULL,
  `fechanac` date NOT NULL,
  `telefono` char(11) DEFAULT NULL,
  `correo` varchar(70) NOT NULL,
  `clave` varchar(100) NOT NULL,
  `fotoperfil` varchar(100) DEFAULT NULL,
  `nivelacceso` char(1) NOT NULL DEFAULT 'U',
  `estado` char(1) NOT NULL DEFAULT '1',
  `fecharegistro` datetime NOT NULL DEFAULT current_timestamp(),
  `fechabaja` datetime DEFAULT NULL,
  PRIMARY KEY (`idproveedor`),
  UNIQUE KEY `uk_usu_correo` (`correo`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

/*Data for the table `proveedores` */

insert  into `proveedores`(`idproveedor`,`iddistrito`,`nombres`,`apellidos`,`fechanac`,`telefono`,`correo`,`clave`,`fotoperfil`,`nivelacceso`,`estado`,`fecharegistro`,`fechabaja`) values 
(2,'110201','Julio Cesar','Yataco Saravia','1992-07-19','987535444','juliocesar@gmail.com','$2y$10$DP8vmN5iblK5FxCV6h2ZOOMCLC2YQxyYcVsEVGaeBasQczzU6mLGK','2805202224803.jpg','U','1','2022-04-04 23:25:11',NULL),
(3,'110107','Josue Alberto','Pachas Bartolo','0000-00-00','51987654321','pachasjosue@gmail.com','pachas123',NULL,'U','0','2022-04-05 21:25:47',NULL),
(4,'110205','Juan Carlos','Álvarez Remires','2001-10-17','956 147 852','juancarlos@gmail.com','$2y$10$PPy56M5X.hVWLoD5ZlL8UeUoQY85QLPvaGLGr/N5ZjNpr3tCGKY6i','27052022231829.jpeg','U','1','2022-04-09 13:32:42',NULL),
(5,'110207','Smith','Morales Jeri','2002-06-13','(51) 987 65','papitosmith@gmail.com','$2y$10$WZ5WXV7OpFTyh5cY0EtKl.Br618WJiiMCUO5.aatjgNJMJ1BtwAu6',NULL,'U','1','2022-04-09 20:40:06',NULL),
(7,'110207','Jair Josué','Avalos Alcarraz','2001-07-26','985 231 456','jairjosue@gmail.com','$2y$10$s4P2Egb2c6Xhf/b7jKXHOum.DfHYs7FLNnINnaMvhFkSHYyqD3HnK',NULL,'U','1','2022-05-16 13:40:44',NULL),
(8,'021207','Julio Smith','Yataco Herrera','2001-11-16','993212844','juliosmithyataco@gmail.com','$2y$10$DlNuNGJjti8XxN23VPBjZu5B0.5eT8Qfy6HOizVRAKDt9kKO7vQr.','2805202205448.jpg','A','1','2022-05-16 13:59:14',NULL),
(9,'110210','Smith','Morales Albites','2001-10-17','956 147 852','moralessmith@gmail.com','$2y$10$zHXRyODzYmG116Y7iZnLqeLfVJj.cQ6Jk4PCq3h9RbClY9VWDtxV6',NULL,'U','1','2022-05-23 14:52:56',NULL),
(10,'010101','Jorge Dilan','Gavilán Artues','1996-11-20','983 699 966','jorgegavilan@gmail.com','$2y$10$klV343tNSG.ho/kmDNl1ju78e3diEQ4BUO2x782B6H/m89bHPEYlO',NULL,'U','1','2022-05-24 17:12:54',NULL),
(11,'110102','Jean Carlos','Felix Castilla','1992-01-29','987 456 123','jeancarlos@gmail.com','$2y$10$yCDtGHsW8bVtI.6XD4eibOxUtZrCKWBpE5bJaZlrqiOH2jwJ4TPiW',NULL,'U','1','2022-05-25 12:56:58',NULL),
(12,'110502','Mario Jose','Ochoa Carshul','1990-04-12','982 100 145','mariojose@gmail.com','$2y$10$lqZhgqNEE4Nzf8.f3/T98Oj1Mih4WBEj/VzitVObqzEDJxq0NxSay',NULL,'U','0','2022-05-25 13:50:49',NULL),
(13,'110301','Roberto Martin','Avalos Rosales','1999-11-12','999553223','robertomartin@gmail.com','$2y$10$tbvPu6nI/Wdy7.yHLSZN/.PHx1S7oX9f2Hy1rTAAc3uCXjNncdy0u',NULL,'U','1','2022-05-27 13:38:46',NULL);

/*Table structure for table `provincias` */

DROP TABLE IF EXISTS `provincias`;

CREATE TABLE `provincias` (
  `idprovincia` varchar(4) NOT NULL,
  `nombreprovincia` varchar(45) NOT NULL,
  `iddepartamento` varchar(2) NOT NULL,
  PRIMARY KEY (`idprovincia`),
  KEY `fk_iddepartamento` (`iddepartamento`),
  CONSTRAINT `fk_iddepartamento` FOREIGN KEY (`iddepartamento`) REFERENCES `departamentos` (`iddepartamento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `provincias` */

insert  into `provincias`(`idprovincia`,`nombreprovincia`,`iddepartamento`) values 
('0101','Chachapoyas','01'),
('0102','Bagua','01'),
('0103','Bongará','01'),
('0104','Condorcanqui','01'),
('0105','Luya','01'),
('0106','Rodríguez de Mendoza','01'),
('0107','Utcubamba','01'),
('0201','Huaraz','02'),
('0202','Aija','02'),
('0203','Antonio Raymondi','02'),
('0204','Asunción','02'),
('0205','Bolognesi','02'),
('0206','Carhuaz','02'),
('0207','Carlos Fermín Fitzcarrald','02'),
('0208','Casma','02'),
('0209','Corongo','02'),
('0210','Huari','02'),
('0211','Huarmey','02'),
('0212','Huaylas','02'),
('0213','Mariscal Luzuriaga','02'),
('0214','Ocros','02'),
('0215','Pallasca','02'),
('0216','Pomabamba','02'),
('0217','Recuay','02'),
('0218','Santa','02'),
('0219','Sihuas','02'),
('0220','Yungay','02'),
('0301','Abancay','03'),
('0302','Andahuaylas','03'),
('0303','Antabamba','03'),
('0304','Aymaraes','03'),
('0305','Cotabambas','03'),
('0306','Chincheros','03'),
('0307','Grau','03'),
('0401','Arequipa','04'),
('0402','Camaná','04'),
('0403','Caravelí','04'),
('0404','Castilla','04'),
('0405','Caylloma','04'),
('0406','Condesuyos','04'),
('0407','Islay','04'),
('0408','La Uniòn','04'),
('0501','Huamanga','05'),
('0502','Cangallo','05'),
('0503','Huanca Sancos','05'),
('0504','Huanta','05'),
('0505','La Mar','05'),
('0506','Lucanas','05'),
('0507','Parinacochas','05'),
('0508','Pàucar del Sara Sara','05'),
('0509','Sucre','05'),
('0510','Víctor Fajardo','05'),
('0511','Vilcas Huamán','05'),
('0601','Cajamarca','06'),
('0602','Cajabamba','06'),
('0603','Celendín','06'),
('0604','Chota','06'),
('0605','Contumazá','06'),
('0606','Cutervo','06'),
('0607','Hualgayoc','06'),
('0608','Jaén','06'),
('0609','San Ignacio','06'),
('0610','San Marcos','06'),
('0611','San Miguel','06'),
('0612','San Pablo','06'),
('0613','Santa Cruz','06'),
('0701','Prov. Const. del Callao','07'),
('0801','Cusco','08'),
('0802','Acomayo','08'),
('0803','Anta','08'),
('0804','Calca','08'),
('0805','Canas','08'),
('0806','Canchis','08'),
('0807','Chumbivilcas','08'),
('0808','Espinar','08'),
('0809','La Convención','08'),
('0810','Paruro','08'),
('0811','Paucartambo','08'),
('0812','Quispicanchi','08'),
('0813','Urubamba','08'),
('0901','Huancavelica','09'),
('0902','Acobamba','09'),
('0903','Angaraes','09'),
('0904','Castrovirreyna','09'),
('0905','Churcampa','09'),
('0906','Huaytará','09'),
('0907','Tayacaja','09'),
('1001','Huánuco','10'),
('1002','Ambo','10'),
('1003','Dos de Mayo','10'),
('1004','Huacaybamba','10'),
('1005','Huamalíes','10'),
('1006','Leoncio Prado','10'),
('1007','Marañón','10'),
('1008','Pachitea','10'),
('1009','Puerto Inca','10'),
('1010','Lauricocha ','10'),
('1011','Yarowilca ','10'),
('1101','Ica ','11'),
('1102','Chincha ','11'),
('1103','Nasca ','11'),
('1104','Palpa ','11'),
('1105','Pisco ','11'),
('1201','Huancayo ','12'),
('1202','Concepción ','12'),
('1203','Chanchamayo ','12'),
('1204','Jauja ','12'),
('1205','Junín ','12'),
('1206','Satipo ','12'),
('1207','Tarma ','12'),
('1208','Yauli ','12'),
('1209','Chupaca ','12'),
('1301','Trujillo ','13'),
('1302','Ascope ','13'),
('1303','Bolívar ','13'),
('1304','Chepén ','13'),
('1305','Julcán ','13'),
('1306','Otuzco ','13'),
('1307','Pacasmayo ','13'),
('1308','Pataz ','13'),
('1309','Sánchez Carrión ','13'),
('1310','Santiago de Chuco ','13'),
('1311','Gran Chimú ','13'),
('1312','Virú ','13'),
('1401','Chiclayo ','14'),
('1402','Ferreñafe ','14'),
('1403','Lambayeque ','14'),
('1501','Lima ','15'),
('1502','Barranca ','15'),
('1503','Cajatambo ','15'),
('1504','Canta ','15'),
('1505','Cañete ','15'),
('1506','Huaral ','15'),
('1507','Huarochirí ','15'),
('1508','Huaura ','15'),
('1509','Oyón ','15'),
('1510','Yauyos ','15'),
('1601','Maynas ','16'),
('1602','Alto Amazonas ','16'),
('1603','Loreto ','16'),
('1604','Mariscal Ramón Castilla ','16'),
('1605','Requena ','16'),
('1606','Ucayali ','16'),
('1607','Datem del Marañón ','16'),
('1608','Putumayo','16'),
('1701','Tambopata ','17'),
('1702','Manu ','17'),
('1703','Tahuamanu ','17'),
('1801','Mariscal Nieto ','18'),
('1802','General Sánchez Cerro ','18'),
('1803','Ilo ','18'),
('1901','Pasco ','19'),
('1902','Daniel Alcides Carrión ','19'),
('1903','Oxapampa ','19'),
('2001','Piura ','20'),
('2002','Ayabaca ','20'),
('2003','Huancabamba ','20'),
('2004','Morropón ','20'),
('2005','Paita ','20'),
('2006','Sullana ','20'),
('2007','Talara ','20'),
('2008','Sechura ','20'),
('2101','Puno ','21'),
('2102','Azángaro ','21'),
('2103','Carabaya ','21'),
('2104','Chucuito ','21'),
('2105','El Collao ','21'),
('2106','Huancané ','21'),
('2107','Lampa ','21'),
('2108','Melgar ','21'),
('2109','Moho ','21'),
('2110','San Antonio de Putina ','21'),
('2111','San Román ','21'),
('2112','Sandia ','21'),
('2113','Yunguyo ','21'),
('2201','Moyobamba ','22'),
('2202','Bellavista ','22'),
('2203','El Dorado ','22'),
('2204','Huallaga ','22'),
('2205','Lamas ','22'),
('2206','Mariscal Cáceres ','22'),
('2207','Picota ','22'),
('2208','Rioja ','22'),
('2209','San Martín ','22'),
('2210','Tocache ','22'),
('2301','Tacna ','23'),
('2302','Candarave ','23'),
('2303','Jorge Basadre ','23'),
('2304','Tarata ','23'),
('2401','Tumbes ','24'),
('2402','Contralmirante Villar ','24'),
('2403','Zarumilla ','24'),
('2501','Coronel Portillo ','25'),
('2502','Atalaya ','25'),
('2503','Padre Abad ','25'),
('2504','Purús','25');

/*Table structure for table `redessociales` */

DROP TABLE IF EXISTS `redessociales`;

CREATE TABLE `redessociales` (
  `idredsocial` int(11) NOT NULL AUTO_INCREMENT,
  `idproveedor` int(11) NOT NULL,
  `idtiporedsocial` int(11) NOT NULL,
  `nombrecuenta` varchar(50) NOT NULL,
  `link` varchar(500) DEFAULT NULL,
  `estado` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idredsocial`),
  KEY `fk_idproveedor_rds` (`idproveedor`),
  KEY `fk_idtiporedsocial_rds` (`idtiporedsocial`),
  CONSTRAINT `fk_idproveedor_rds` FOREIGN KEY (`idproveedor`) REFERENCES `proveedores` (`idproveedor`),
  CONSTRAINT `fk_idtiporedsocial_rds` FOREIGN KEY (`idtiporedsocial`) REFERENCES `tiporedessociales` (`idtiporedsocial`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4;

/*Data for the table `redessociales` */

insert  into `redessociales`(`idredsocial`,`idproveedor`,`idtiporedsocial`,`nombrecuenta`,`link`,`estado`) values 
(1,2,5,'Mendez','https://www.youtube.com/c/LosM%C3%A9ndez/featured','0'),
(2,2,2,'Julio Cesar',NULL,'0'),
(3,2,3,'julio.YS','https://www.youtube.com/c/LosM%C3%A9ndez/featured','0'),
(4,4,2,'Carlos','https://www.facebook.com/dante.yataco','1'),
(5,2,5,'Mendez','https://www.youtube.com/c/LosM%C3%A9ndez/featured','0'),
(6,2,2,'Julio','https://www.facebook.com/search/top?q=julio%20cesar%20yataco%20saravia','0'),
(7,9,5,'Remix',NULL,'0'),
(8,9,2,'sssssssssssssssssssssssssssssssssssssssss',NULL,'0'),
(9,2,5,'Mendez','https://www.youtube.com/c/LosM%C3%A9ndez','0'),
(10,2,5,'sJULIO','sd','0'),
(11,10,2,'Jorge','https://www.youtube.com/c/LosM%C3%A9ndez/featured','1'),
(12,9,1,'Moralejas','https://www.facebook.com/dante.yataco','1'),
(13,2,2,'Mendez',' facebook : https://www.facebook.com/losmendez ','0'),
(14,2,5,'JULIO',' youtube: https://www.youtube.com/c/EDteam','0'),
(15,2,4,'Holquetalsoylapruebadeque estamal',' facebook : https://www.facebook.com/losmendez ','0'),
(16,8,1,'Mendez','https://www.youtube.com/c/LosM%C3%A9ndez','0'),
(17,2,4,'Moralejas','https://www.youtube.com/c/LosM%C3%A9ndez','0'),
(18,2,2,'Julitos','https://www.facebook.com/search/top?q=julio%20cesar%20yataco%20saravia','1'),
(19,13,5,'Roberto Martin','https://www.youtube.com/watch?v=Y-OhzQpsRwI','0'),
(20,13,2,'Roberto','https://www.facebook.com/dante.yataco','1'),
(21,13,4,'Robertuto',' facebook : https://www.facebook.com/losmendez ','1'),
(22,9,4,'sd',' facebook : https://www.facebook.com/losmendez ','1');

/*Table structure for table `servicios` */

DROP TABLE IF EXISTS `servicios`;

CREATE TABLE `servicios` (
  `idservicio` int(11) NOT NULL AUTO_INCREMENT,
  `idproveedor` int(11) NOT NULL,
  `idcategoria` int(11) NOT NULL,
  `servicio` varchar(50) NOT NULL,
  `descripcion` varchar(550) NOT NULL,
  `ubicacion` varchar(70) DEFAULT NULL,
  `nivel` tinyint(4) NOT NULL,
  `fotoportada` varchar(100) DEFAULT NULL,
  `favorito` datetime DEFAULT NULL,
  `fechahora` datetime NOT NULL DEFAULT current_timestamp(),
  `estado` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idservicio`),
  KEY `fk_idproveedor_srv` (`idproveedor`),
  KEY `fk_idcategoria_srv` (`idcategoria`),
  CONSTRAINT `fk_idcategoria_srv` FOREIGN KEY (`idcategoria`) REFERENCES `categorias` (`idcategoria`),
  CONSTRAINT `fk_idproveedor_srv` FOREIGN KEY (`idproveedor`) REFERENCES `proveedores` (`idproveedor`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8mb4;

/*Data for the table `servicios` */

insert  into `servicios`(`idservicio`,`idproveedor`,`idcategoria`,`servicio`,`descripcion`,`ubicacion`,`nivel`,`fotoportada`,`favorito`,`fechahora`,`estado`) values 
(1,2,1,'Maderita','Realizamos todo tipos de: Puertas, ventanas, sillas, etc. de la mejor calidad y con los mejores precios.','Girón ubire 303',4,'20220528021741.jpg',NULL,'2022-04-24 22:32:13','0'),
(2,2,2,'Armando Casas','Especialista en todos los procedimientos de construcción, etc resaltante en maestro de obra. A muy comodo precio y de buena calidad','En tu casa',3,'20220528094624.jpeg','2022-05-27 12:19:45','2022-04-25 16:09:08','1'),
(3,2,2,'Prueba','Especialista en todos los procedimientos de construcción, resaltante en maestro de obra. A muy comodo precio y de buena calidad','En tu casa',3,'20220523105615.jpg',NULL,'2022-04-27 18:54:29','0'),
(4,2,2,'Prueba','Especialista en todos los procedimientos de construcción, resaltante en maestro de obra. A muy comodo precio y de buena calidad','En tu casa',3,NULL,NULL,'2022-04-27 19:23:02','0'),
(5,2,2,'Holaaa','que hace?','sssss',4,'2804202222846.jpeg',NULL,'2022-04-27 19:28:46','0'),
(6,2,2,'QUIENEEESEEEHOMBREEEEE','XD','....',5,'2804202223203.jpeg',NULL,'2022-04-27 19:32:03','0'),
(7,2,2,'Papi Smith','Prueba de pruebas Prueba de pruebas Prueba de pruebas Prueba de pruebas Prueba de pruebas Prueba de pruebas Prueba de pruebas','en clases',2,'2804202234011.PNG',NULL,'2022-04-27 20:40:11','0'),
(8,2,2,'Maestro de obras','armando casas','tu casa',5,NULL,NULL,'2022-05-02 16:30:15','0'),
(9,2,1,'Sillas CSS','Hacemos todo tipo de sillas amuebladas a un muy buen precio, ¡APROVECHA!','La villa central 230',5,NULL,NULL,'2022-05-03 00:13:01','0'),
(10,4,1,'Mr. Madera','Ofrecemos todo tipo de amueblado, sillas, carpetas, mesas, camas, puertas, ventanas, cuadros, etc. Aprovecha nuestros descuentos y sobre todo nuestra calidad','Calle urlaola, #202 costado de mercadito',5,'1105202213750.jpg',NULL,'2022-05-10 18:37:50','1'),
(11,2,2,'Maestro de obra','Especialista en todos los paso/capas de la contrucción','Psj. Primara #322',3,NULL,NULL,'2022-05-16 15:27:04','0'),
(42,2,1,'Leñol 1.0','Se hacen mesas','Av. Prado',4,NULL,NULL,'2022-05-19 01:19:49','0'),
(43,2,1,'Leñol 2.0','Se hacen mesas css.','Av. Castillas #1212, costado de colegio Prado',5,'20220528094944.jpg',NULL,'2022-05-19 01:21:23','1'),
(44,2,2,'Don Cajon PROMAX','Se hacen cajonsitos A buen precio y de la mejor calidad 2.0','Av. Primavera #111',4,'20220523105243.jpg',NULL,'2022-05-19 01:25:47','0'),
(45,2,2,'ProyectoX','Armamos simplificaciones sobre planos postRen y Getrun','Av.linaers',3,NULL,NULL,'2022-05-20 01:59:33','0'),
(46,4,7,'GuachiMan','Especialista en camuflaje, apto para toda la noche. 100% Siempre atento con todo lo que pasa','Domicilio',5,NULL,NULL,'2022-05-23 14:10:26','1'),
(47,4,5,'Enfermera Lucila','Se realizan todo tipo de vacuanciones, cuidados a ancianos y mucho más. 100% seguro','Domicilio',3,'23052022211247.jpg',NULL,'2022-05-23 14:12:47','1'),
(48,4,4,'Malting Power','Entrenador de fulbtol, para academias y con una alta experiencia en campeonatos','Campo deportivo. Balconcito',4,'23052022211514.jpg',NULL,'2022-05-23 14:15:14','1'),
(49,2,2,'sds','sds','sd',2,NULL,NULL,'2022-05-23 15:09:06','0'),
(50,4,5,'Terapea Cds','Especialista en terapeas intensivas con una mejora continua','Domicilio',4,'23052022221105.jpg',NULL,'2022-05-23 15:11:05','1'),
(51,9,7,'Ojo de Alcón ','Cuida tu casasa!! con las unas camaras de seguridad que ofrecemos, las 24 horas.','Calle Los angeles Av. Rosario #211.',3,'23052022221745.jpg',NULL,'2022-05-23 15:17:45','1'),
(52,9,6,'Ventas Voladoras','Especialista en ventas de cualquier producto, eleva tus ventas con nuestros asesores y has que tu negocio crezca','Calle Bernaola, costado del banco BCP',4,'23052022222539.jpg',NULL,'2022-05-23 15:25:39','1'),
(53,4,7,'OJITO JITO','Salir de casa sin preocuparse por la seguridad de tu casa, es nuestra especialidad. ¡APROVECHA!','Urb. Loaysa, costado de libreria \"Mayi\"',3,'23052022230042.jpg',NULL,'2022-05-23 16:00:42','1'),
(55,4,7,'sdsds','Ofrecemos camaras de seguridad activas las 24/7, despreocupate al salir de casa que nosotros nos encargamos. Todo en la palma de tu mano. ¡INSTALACIÓN INMEDIATA!\r\n','sds',2,'23052022231004.jpg',NULL,'2022-05-23 16:10:04','0'),
(56,10,4,'Arbitraje Gabilan','Se entrena a personas con alta complejidad en el futbol ','Campo deportivo',4,NULL,NULL,'2022-05-24 17:14:17','0'),
(57,10,4,'Arbitraje Lur','Esta es una prueba para verificar si los departamentos funcionan','Donde sea mano',5,'2505202203944.png',NULL,'2022-05-24 17:39:44','1'),
(58,11,5,'Old cuidados','Nos especializamos en el cuidado de personas ancianas en todo lo que corresponda salud y estado','Av. garcia #322',4,'25052022202819.jpg',NULL,'2022-05-25 13:28:19','1'),
(59,8,4,'Full Libre','Especialistas en llevar a equipos de bajo nivel a un nivel muy muy superior. compromiso, sacrificio entrega es todo lo que se requiere para el exito, aprovecha!','Calle Manonguita #211 al costado de brosteria',4,'20220527094811.jpg',NULL,'2022-05-25 14:05:44','1'),
(60,2,7,'Monky Avisa','Despreocupate que nosotros te avisamo, con nuestras camaras de alta resolución. 100% Siempre atento con todo lo que pasa. ESTAMOS ALERTA LAS 24 HORAS\r\n','Calle. los marfiles. psj. Benito #217',4,'20220525115128.jpg',NULL,'2022-05-25 16:51:05','0'),
(61,2,4,'Arbitraje Lateral','Especialista en bandas laterales, con alta experiencia en diferentes campeonatos','Campo Balconcito,  Av. Progreso',5,'27052022195740.jpg',NULL,'2022-05-27 12:57:40','0'),
(62,2,2,'sd','sd','sd',1,'27052022195925.jpg',NULL,'2022-05-27 12:59:25','0'),
(63,13,1,'Camaras','Estamos alerta a todo lo que ocurre','Av. chavez',4,'20220527085101.jpg',NULL,'2022-05-27 13:47:25','0'),
(64,13,2,'sdsd','sd','sd',2,'27052022205151.jpg',NULL,'2022-05-27 13:51:51','0'),
(65,8,2,'Prueba','PruebaPrueba Prueba Prueba Prueba Prueba Prueba Prueba Prueba PruebaPrueba PruebaPruebaPruebaPrueba','Prueba',2,NULL,NULL,'2022-05-28 01:32:58','1');

/*Table structure for table `tiporedessociales` */

DROP TABLE IF EXISTS `tiporedessociales`;

CREATE TABLE `tiporedessociales` (
  `idtiporedsocial` int(11) NOT NULL AUTO_INCREMENT,
  `redsocial` varchar(20) NOT NULL,
  `fechahora` datetime NOT NULL DEFAULT current_timestamp(),
  `estado` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idtiporedsocial`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tiporedessociales` */

insert  into `tiporedessociales`(`idtiporedsocial`,`redsocial`,`fechahora`,`estado`) values 
(1,'WhatsApp','2022-05-20 21:51:46','1'),
(2,'Facebook','2022-05-20 21:52:00','1'),
(3,'Instagram','2022-05-20 21:52:33','0'),
(4,'TikTok','2022-05-20 21:52:50','1'),
(5,'YouTube','2022-05-21 20:42:07','1'),
(6,'Gmail','2022-05-23 01:02:58','0'),
(7,'Gmail','2022-05-27 12:51:15','0');

/* Procedure structure for procedure `spu_categorias_eliminar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_categorias_eliminar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_categorias_eliminar`(
	IN _idcategoria INT
)
BEGIN
	UPDATE categorias SET estado = '0'
		WHERE idcategoria	= _idcategoria;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_categorias_listar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_categorias_listar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_categorias_listar`()
BEGIN
	SELECT * FROM categorias
	where estado = '1' ORDER BY idcategoria;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_categorias_modificar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_categorias_modificar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_categorias_modificar`( 
	IN _idcategoria int,
	in _nombrecategoria VARCHAR(50)
)
BEGIN
	update categorias set
		nombrecategoria = _nombrecategoria
	where idcategoria = _idcategoria;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_categorias_onedata` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_categorias_onedata` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_categorias_onedata`(in _idcategoria int)
BEGIN
	SELECT * FROM categorias where idcategoria = _idcategoria ORDER BY idcategoria and estado = '1';
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_categorias_registrar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_categorias_registrar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_categorias_registrar`( in _nombrecategoria VARCHAR(50))
BEGIN
	INSERT INTO categorias (nombrecategoria, fechacategoria)
		VALUES (_nombrecategoria, NOW());
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_categoria_ondata_listar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_categoria_ondata_listar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_categoria_ondata_listar`(In _idcategoria INT)
begin
	select * from categorias
		where idcategoria = _idcategoria;
end */$$
DELIMITER ;

/* Procedure structure for procedure `spu_comentarios_listar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_comentarios_listar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_comentarios_listar`(IN _idproveedor INT)
BEGIN
	SELECT comentarios.`idcomentario`, comentarios.`idproveedor`, comentarios.`idusuariocomenta`,
				CONCAT(proveedores.nombres,' ',proveedores.apellidos) AS 'nombreyapellido',  comentarios.`comentario`,
				comentarios.`fechahora`, comentarios.`puntuacion`
	FROM comentarios 
	INNER JOIN proveedores ON proveedores.`idproveedor` = comentarios.`idusuariocomenta`
	WHERE comentarios.estado = 1 AND comentarios.`idproveedor` = _idproveedor;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_comentarios_registrar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_comentarios_registrar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_comentarios_registrar`(
	IN _idproveedor INT,
	IN _idusuariocomenta INT,
	IN _comentario VARCHAR(250), 
	IN _puntuacion TINYINT
)
BEGIN
	INSERT INTO comentarios (idproveedor, idusuariocomenta, comentario, puntuacion, fechahora)
		VALUES (_idproveedor, _idusuariocomenta, _comentario, _puntuacion, NOW());
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_comentario_eliminar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_comentario_eliminar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_comentario_eliminar`(in _idcomentario int)
begin
	update comentarios set estado = '0'
		where idcomentario = _idcomentario;
end */$$
DELIMITER ;

/* Procedure structure for procedure `spu_comentario_modificar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_comentario_modificar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_comentario_modificar`(
	in _idcomentario int,
	in _comentario varchar(250),
	in _puntuacion tinyint
)
begin 
	update comentarios set
		comentario = _comentario,
		puntuacion = _puntuacion,
		fechahora = now()
	where idcomentario = _idcomentario;
end */$$
DELIMITER ;

/* Procedure structure for procedure `spu_comentario_onedata_listar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_comentario_onedata_listar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_comentario_onedata_listar`(IN _idcomentario INT)
BEGIN
	SELECT * FROM comentarios WHERE idcomentario = _idcomentario AND estado = '1';
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_contactos_listar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_contactos_listar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_contactos_listar`()
BEGIN 
	select * from contactos where estado = '1';
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_contactos_listar_onecontacto_proveedor` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_contactos_listar_onecontacto_proveedor` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_contactos_listar_onecontacto_proveedor`(IN _idproveedor INT)
BEGIN 
	SELECT * FROM contactos WHERE idproveedor = _idproveedor AND estado = '1';
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_contactos_modificar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_contactos_modificar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_contactos_modificar`(
	in _idcontacto int,
	in _celular	CHAR(9),
	in _telefono char(9),
	in _email	varchar(50)
)
begin
	if _telefono = '' then set _telefono = null; end if;
	IF _email = '' THEN SET _email = NULL; END IF; 
	
		update contactos SET
			celular = _celular,
			telefono = _telefono,
			email = _email
		where idcontacto = _idcontacto;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_contactos_onedata` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_contactos_onedata` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_contactos_onedata`(IN _idproveedor INT)
BEGIN 
	SELECT * FROM contactos WHERE idproveedor = _idproveedor AND estado = '1';
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_contactos_registrar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_contactos_registrar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_contactos_registrar`(
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
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_convert_administrador` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_convert_administrador` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_convert_administrador`(
  IN _idproveedor INT
)
BEGIN
  UPDATE proveedores SET 
		nivelacceso = 'U' 
	WHERE idproveedor = _idproveedor;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_departamentos_listar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_departamentos_listar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_departamentos_listar`()
begin
	select * from departamentos order by iddepartamento;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_distritos_listar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_distritos_listar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_distritos_listar`(
IN _idprovincia varchar(4)
)
BEGIN
	SELECT * 
		FROM distritos
			WHERE idprovincia = _idprovincia ORDER BY iddistrito;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_eliminar_contacto` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_eliminar_contacto` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_eliminar_contacto`(
	in _idcontacto int
)
begin
	update contactos set estado = '0'
	where idcontacto = _idcontacto;
end */$$
DELIMITER ;

/* Procedure structure for procedure `spu_eliminar_proveedores` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_eliminar_proveedores` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_eliminar_proveedores`(
	IN _idproveedor INT
)
BEGIN
   UPDATE proveedores SET 
		estado = 0 WHERE 
		idproveedor = _idproveedor;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_graficos_categorias_servicios_listar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_graficos_categorias_servicios_listar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_graficos_categorias_servicios_listar`()
BEGIN
	SELECT (nombrecategoria) AS 'Categoria',COUNT(nombrecategoria) AS 'Publicaciones' 
	FROM servicios
	INNER JOIN categorias ON categorias.`idcategoria` = servicios.`idcategoria`
	where servicios.`estado` = 1
	GROUP BY (nombrecategoria);
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_graficos_proveedores_listar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_graficos_proveedores_listar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_graficos_proveedores_listar`()
begin
	select year (fecharegistro) as 'fecha',count(*) AS 'cantidad' from proveedores
	group by year(fecharegistro);
end */$$
DELIMITER ;

/* Procedure structure for procedure `spu_graficos_servicios_nivel_listar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_graficos_servicios_nivel_listar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_graficos_servicios_nivel_listar`()
BEGIN
	SELECT (nivel) AS 'Nivel',COUNT(nivel) AS 'Servicios' 
	FROM servicios
	where `estado` = '1'
	GROUP BY (nivel);
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_hacer_administrador` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_hacer_administrador` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_hacer_administrador`(
	IN _idproveedor INT
)
BEGIN
	UPDATE proveedores SET 
		nivelacceso = 'A' 
	WHERE idproveedor = _idproveedor;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_horario_listar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_horario_listar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_horario_listar`(IN _idproveedor INT)
BEGIN
	SELECT idhorario, idproveedor, dialaborable, horainicio, horafinal
		FROM horarios
		WHERE idproveedor = _idproveedor;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_horario_modificar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_horario_modificar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_horario_modificar`(
	IN _idproveedor INT,
	IN _dialaborable VARCHAR(40),
	IN _horainicio TIME,
	IN _horafinal TIME
)
BEGIN
	update horarios set
		dialaborable 	= _dialaborable,
		horainicio 		= _horainicio,
		horafinal 		= _horafinal
		where idproveedor = _idproveedor;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_horario_onedata` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_horario_onedata` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_horario_onedata`(IN _idhorario INT)
BEGIN
	SELECT * FROM horarios
		WHERE idhorario = _idhorario;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_horario_registrar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_horario_registrar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_horario_registrar`(
	IN _idproveedor int,
	in _dialaborable VARCHAR(40),
	IN _horainicio TIME,
	IN _horafinal TIME
)
begin
	insert into horarios(idproveedor, dialaborable, horainicio, horafinal)
		values (_idproveedor, _dialaborable, _horainicio, _horafinal);
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_listar_admin` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_listar_admin` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_listar_admin`()
BEGIN
  SELECT PROV.idproveedor, DIST.nombredistrito, PROV.nombres,
         PROV.apellidos, PROV.correo  
  FROM proveedores PROV
  INNER JOIN distritos DIST ON DIST.iddistrito = PROV.iddistrito 
   WHERE PROV.estado = 1 AND nivelacceso = 'A';
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_listar_contacto` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_listar_contacto` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_listar_contacto`(IN _idproveedor INT)
BEGIN 
	SELECT * FROM contactos WHERE idproveedor = _idproveedor AND estado = '1';
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_listar_proveedor_activo` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_listar_proveedor_activo` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_listar_proveedor_activo`()
BEGIN
  SELECT PROV.idproveedor, DIST.nombredistrito, PROV.nombres,
         PROV.apellidos, PROV.correo  
  FROM proveedores PROV
  INNER JOIN distritos DIST ON DIST.iddistrito = PROV.iddistrito 
   WHERE PROV.estado = 1 AND nivelacceso = 'U';
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_listar_proveedor_inactivo` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_listar_proveedor_inactivo` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_listar_proveedor_inactivo`()
BEGIN
 SELECT PROV.idproveedor, DIST.nombredistrito, PROV.nombres,
         PROV.apellidos, PROV.correo  
  FROM proveedores PROV
  INNER JOIN distritos DIST ON DIST.iddistrito = PROV.iddistrito 
  WHERE PROV.estado = 0;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_listar_redessociales` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_listar_redessociales` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_listar_redessociales`(IN _idproveedor INT)
BEGIN 
	SELECT RDS.`idredsocial`, RDS.`idproveedor`, TRS.`redsocial`, RDS.`nombrecuenta`,
						RDS.link
			FROM redessociales RDS
			INNER JOIN tiporedessociales TRS ON TRS.`idtiporedsocial` = RDS.`idtiporedsocial`
			WHERE idproveedor = _idproveedor AND RDS.estado = '1' 
			ORDER BY RDS.idredsocial DESC;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_list_one_data_contac` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_list_one_data_contac` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_list_one_data_contac`(
	IN _idcontacto int
)
begin 
	select * from contactos where idcontacto = _idcontacto and estado = '1';
end */$$
DELIMITER ;

/* Procedure structure for procedure `spu_list_one_data_redsoci` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_list_one_data_redsoci` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_list_one_data_redsoci`(IN _idredsocial INT)
BEGIN 
	SELECT * FROM redessociales WHERE idredsocial = _idredsocial AND estado = '1';
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_proveedores_eliminar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_proveedores_eliminar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_proveedores_eliminar`(IN _idproveedor INT)
begin
	-- Cambiar de estado
	update proveedores set estado = '0', fechabaja = now()
		where idproveedor = _idproveedor;
end */$$
DELIMITER ;

/* Procedure structure for procedure `spu_proveedores_grafico_listar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_proveedores_grafico_listar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_proveedores_grafico_listar`()
BEGIN
	select YEAR(fecharegistro) AS 'anio', Count(*) AS 'cantidad' FROM proveedores
		group by year(fecharegistro);
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_proveedores_listar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_proveedores_listar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_proveedores_listar`(
	IN _idproveedor INT
)
BEGIN
	SELECT nombres, apellidos, fechanac, telefono, correo
		FROM proveedores
		WHERE idproveedor = _idproveedor;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_proveedores_modificar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_proveedores_modificar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_proveedores_modificar`(
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
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_proveedores_obtener_ondata` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_proveedores_obtener_ondata` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_proveedores_obtener_ondata`(IN _idproveedor INT)
BEGIN
	SELECT * FROM proveedores WHERE idproveedor = _idproveedor;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_proveedores_onedata_listar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_proveedores_onedata_listar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_proveedores_onedata_listar`(IN _idproveedor INT)
BEGIN
	SELECT * FROM proveedores where idproveedor = _idproveedor;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_proveedores_registrar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_proveedores_registrar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_proveedores_registrar`(
	IN _iddistrito 	VARCHAR(6),
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
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_proveedor_agregarfoto` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_proveedor_agregarfoto` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_proveedor_agregarfoto`(
	in _idproveedor int,
	in _fotoperfil varchar(100)
)
begin
	update proveedores set
		fotoperfil = _fotoperfil
	where idproveedor = _idproveedor;
end */$$
DELIMITER ;

/* Procedure structure for procedure `spu_proveedor_clave_modificar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_proveedor_clave_modificar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_proveedor_clave_modificar`(
	IN _idproveedor INT,
	IN _clave VARCHAR(100)
)
BEGIN
	UPDATE proveedores SET
		clave = _clave
		where idproveedor = _idproveedor;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_proveedor_login` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_proveedor_login` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_proveedor_login`(
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
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_provincias` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_provincias` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_provincias`()
begin
	select * from provincias order by idprovincia;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_provincias_listar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_provincias_listar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_provincias_listar`(
in _iddepartamento varchar(2)
)
BEGIN
	SELECT * FROM provincias 
			WHERE iddepartamento = _iddepartamento ORDER BY idprovincia;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_reactivar_proveedor` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_reactivar_proveedor` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_reactivar_proveedor`(
	IN _idproveedor INT
)
BEGIN
  UPDATE proveedores SET 
		estado = 1 
	WHERE idproveedor = _idproveedor;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_rededssociales_eliminar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_rededssociales_eliminar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_rededssociales_eliminar`(
	in _idredsocial int
)
begin
	update redessociales SET estado = '0'
		where idredsocial	= _idredsocial;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_redessociales_listar_onedata` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_redessociales_listar_onedata` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_redessociales_listar_onedata`(IN _idproveedor INT)
BEGIN
		SELECT RDS.`idredsocial`, RDS.`idproveedor`, TRS.`redsocial`, RDS.`nombrecuenta`,
						RDS.link
			FROM redessociales RDS
			INNER JOIN tiporedessociales TRS ON TRS.`idtiporedsocial` = RDS.`idtiporedsocial`
			WHERE idproveedor = _idproveedor AND RDS.estado = '1' 
			ORDER BY RDS.idredsocial DESC;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_redessociales_modificar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_redessociales_modificar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_redessociales_modificar`(
	IN _idredsocial INT,
	IN _idproveedor	int,
	in _idtiporedsocial int,
	IN _nombrecuenta varchar(50),
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
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_redessociales_registrar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_redessociales_registrar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_redessociales_registrar`( 
	IN _idproveedor INT,
	IN _idtiporedsocial INT,
	IN _nombrecuenta VARCHAR(50),
	in _link	varchar(500)
)
BEGIN
	if _link = '' then set _link = null; end if;
	
	INSERT INTO redessociales (idproveedor, idtiporedsocial, nombrecuenta, link) 
		VALUES (_idproveedor, _idtiporedsocial, _nombrecuenta, _link);
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_redsocial_registrar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_redsocial_registrar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_redsocial_registrar`( 
	in _idproveedor int,
	IN _redsocial VARCHAR(20),
	in _nombrecuenta varchar(50)
)
BEGIN
	INSERT INTO redessociales (idproveedor, redsocial, nombrecuenta) 
		VALUES (_idproveedor, _redsocial, _nombrecuenta);
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_servicios_activos_listar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_servicios_activos_listar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_servicios_activos_listar`()
begin
	SELECT servicios.`idservicio`, categorias.`nombrecategoria`, servicios.`servicio`, 
					CONCAT(proveedores.`apellidos`, ' ', proveedores.`nombres`) AS 'proveedor',
					servicios.`ubicacion`, servicios.`nivel`
	from servicios 
	inner join proveedores on proveedores.`idproveedor` = servicios.`idproveedor`
	INNER JOIN categorias ON categorias.`idcategoria` = servicios.`idcategoria`
	where servicios.`estado` = 1;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_servicios_buscar_nombrecategoria` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_servicios_buscar_nombrecategoria` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_servicios_buscar_nombrecategoria`(IN _nombrecategoria VARCHAR(50))
BEGIN
 SELECT servicios.idservicio,
        categorias.`idcategoria`,servicios.servicio, proveedores.nombres, proveedores.apellidos, servicios.descripcion, servicios.ubicacion, servicios.nivel,
        CONCAT(categorias.`nombrecategoria`, '')  AS 'categori'
 FROM servicios
 INNER JOIN categorias ON categorias.`idcategoria` = servicios.`idcategoria`
  INNER JOIN proveedores ON proveedores.`idproveedor` = servicios.`idproveedor`
 WHERE nombrecategoria = _nombrecategoria;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_servicios_elimimar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_servicios_elimimar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_servicios_elimimar`(in _idservicio INT)
begin
		update servicios set
			estado = '0'
			Where idservicio = _idservicio;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_servicios_inactivo_listar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_servicios_inactivo_listar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_servicios_inactivo_listar`()
BEGIN
	SELECT servicios.`idservicio`, categorias.`nombrecategoria`, servicios.`servicio`,
					CONCAT(proveedores.`apellidos`, ' ', proveedores.`nombres`) AS 'proveedor',
					servicios.`ubicacion`, servicios.`nivel`
	FROM servicios 
	INNER JOIN proveedores ON proveedores.`idproveedor` = servicios.`idproveedor`
	INNER JOIN categorias ON categorias.`idcategoria` = servicios.`idcategoria`
	WHERE servicios.`estado` = 0;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_servicios_listar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_servicios_listar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_servicios_listar`()
BEGIN
	SELECT SERV.idservicio, PROV.idproveedor, CONCAT(PROV.nombres, ' ', PROV.apellidos) AS 'proveedor',
				 CAT.nombrecategoria, SERV.servicio, SERV.descripcion, SERV.ubicacion,
				 SERV.nivel, SERV.fotoportada
		  FROM servicios SERV
			INNER JOIN proveedores PROV ON PROV.idproveedor = SERV.idproveedor
			INNER JOIN categorias CAT ON CAT.idcategoria = SERV.idcategoria
			where SERV.estado = '1'
			ORDER BY idservicio DESC;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_servicios_listar_ondata` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_servicios_listar_ondata` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_servicios_listar_ondata`(IN _idproveedor INT)
BEGIN
	SELECT SERV.idservicio, PROV.idproveedor, PROV.nombres, PROV.apellidos, CAT.nombrecategoria,
					SERV.servicio, SERV.descripcion, SERV.ubicacion, SERV.nivel, SERV.fotoportada, SERV.estado
		FROM servicios SERV 
		INNER JOIN proveedores PROV ON PROV.idproveedor = SERV.idproveedor
		INNER JOIN categorias CAT ON CAT.idcategoria = SERV.idcategoria
		WHERE PROV.idproveedor = _idproveedor and SERV.estado = '1' ORDER BY idservicio DESC;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_servicios_modificar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_servicios_modificar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_servicios_modificar`(
	In _idservicio INT,
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
	where idservicio = _idservicio;
	
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_servicios_registrar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_servicios_registrar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_servicios_registrar`(
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
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_servicio_categoria_listar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_servicio_categoria_listar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_servicio_categoria_listar`(IN _idcategoria INT)
BEGIN
	SELECT SERV.idservicio, PROV.idproveedor, CONCAT(PROV.nombres, ' ', PROV.apellidos) AS 'proveedor',
				 CAT.nombrecategoria, SERV.servicio, SERV.descripcion, SERV.ubicacion,
				 SERV.nivel, SERV.fotoportada
		  FROM servicios SERV
			INNER JOIN proveedores PROV ON PROV.idproveedor = SERV.idproveedor
			INNER JOIN categorias CAT ON CAT.idcategoria = SERV.idcategoria
			WHERE CAT.idcategoria = _idcategoria and SERV.estado = '1'
			order by SERV.fechahora;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_servicio_contacto_proveedor` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_servicio_contacto_proveedor` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_servicio_contacto_proveedor`(IN _idproveedor INT)
BEGIN
	SELECT * FROM contactos WHERE idproveedor = _idproveedor;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_servicio_departamentos_listar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_servicio_departamentos_listar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_servicio_departamentos_listar`(IN _iddepartamento VARCHAR(2))
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
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_servicio_distrito_listar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_servicio_distrito_listar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_servicio_distrito_listar`(IN _iddistrito VARCHAR(6))
BEGIN
	select proveedores.`iddistrito`, servicios.`idservicio`, proveedores.`iddistrito`, servicios.`idproveedor`,
					servicios.`idcategoria`, servicios.`servicio`, servicios.`descripcion`,
					servicios.ubicacion, servicios.`nivel`, servicios.`fotoportada`,
					servicios.`favorito`, servicios.`fechahora`, servicios.`estado`
	from servicios 
	inner join proveedores on proveedores.`idproveedor` = servicios.`idproveedor`
	where iddistrito = _iddistrito AND servicios.estado = '1';
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_servicio_eliminar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_servicio_eliminar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_servicio_eliminar`(
	IN _idservicio INT
)
BEGIN
   UPDATE servicios SET 
		estado = 0 WHERE 
		idservicio = _idservicio;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_servicio_onedata` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_servicio_onedata` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_servicio_onedata`(IN _idservicio int)
begin
	Select * from servicios
		where idservicio = _idservicio and estado = '1';
end */$$
DELIMITER ;

/* Procedure structure for procedure `spu_servicio_provincia_listar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_servicio_provincia_listar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_servicio_provincia_listar`(IN _idprovincia VARCHAR(4))
BEGIN
	SELECT proveedores.`iddistrito`, servicios.`idservicio`, proveedores.`iddistrito`, servicios.`idproveedor`,
					servicios.`idcategoria`, servicios.`servicio`, servicios.`descripcion`, servicios.ubicacion,
					servicios.`nivel`, servicios.`fotoportada`, servicios.`favorito`, servicios.`fechahora`,
					servicios.`estado`
	FROM servicios 
	INNER JOIN proveedores ON proveedores.`idproveedor` = servicios.`idproveedor`
	INNER JOIN distritos ON distritos.`iddistrito` = proveedores.`iddistrito`
	WHERE idprovincia = _idprovincia AND servicios.estado = '1';
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_servicio_reactivar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_servicio_reactivar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_servicio_reactivar`(
	IN _idservicio INT
)
BEGIN
  UPDATE servicios SET 
		estado = 1 
	WHERE idservicio = _idservicio;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_servicio_redessociales_proveedor` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_servicio_redessociales_proveedor` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_servicio_redessociales_proveedor`(IN _idproveedor INT)
BEGIN
	SELECT RDS.`idredsocial`, RDS.`idproveedor`, TRDS.`redsocial`,
					RDS.`nombrecuenta`, RDS.`link`
	FROM redessociales RDS
	inner join tiporedessociales TRDS on TRDS.`idtiporedsocial` = RDS.`idtiporedsocial` 
	WHERE RDS.idproveedor = 2 and RDS.`estado` = '1';
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_tiporededssociales_eliminar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_tiporededssociales_eliminar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_tiporededssociales_eliminar`(
	IN _idtiporedsocial INT
)
BEGIN
	UPDATE tiporedessociales SET estado = '0'
		WHERE idtiporedsocial	= _idtiporedsocial;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_tiporedessociales_listar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_tiporedessociales_listar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_tiporedessociales_listar`()
begin
	select * from tiporedessociales
	where estado = '1'
	order by idtiporedsocial;
end */$$
DELIMITER ;

/* Procedure structure for procedure `spu_tiporedessociales_modificar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_tiporedessociales_modificar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_tiporedessociales_modificar`( 
	in _idtiporedsocial int,
	IN _redsocial VARCHAR(20)
)
BEGIN
	update tiporedessociales set 
			redsocial	= _redsocial
			where idtiporedsocial = _idtiporedsocial;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_tiporedessociales_onedata` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_tiporedessociales_onedata` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_tiporedessociales_onedata`( in _idtiporedsocial int)
BEGIN
	SELECT * FROM tiporedessociales
	WHERE idtiporedsocial = _idtiporedsocial
	ORDER BY idtiporedsocial;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_tiporedessociales_registrar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_tiporedessociales_registrar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_tiporedessociales_registrar`( 
IN _redsocial VARCHAR(20)
)
BEGIN
	INSERT INTO tiporedessociales (redsocial, fechahora) 
		VALUES (_redsocial, now());
END */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
