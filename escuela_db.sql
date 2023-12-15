-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: localhost    Database: escuela_db
-- ------------------------------------------------------
-- Server version	8.0.34

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cursos`
--

DROP TABLE IF EXISTS `cursos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cursos` (
  `id_curso` int NOT NULL AUTO_INCREMENT,
  `nombre_curso` varchar(100) NOT NULL,
  PRIMARY KEY (`id_curso`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cursos`
--

LOCK TABLES `cursos` WRITE;
/*!40000 ALTER TABLE `cursos` DISABLE KEYS */;
INSERT INTO `cursos` VALUES (1,'Matemática Basica'),(2,'Lenguaje y Literatura'),(3,'Ciencias Naturales'),(4,'Ciencias Sociales'),(5,'Computacion Basica'),(6,'Educación Física'),(7,'Musica'),(8,'Artes Plasticas'),(9,'Matematica avanzada'),(10,'Fisica Fundamental'),(11,'Biologia'),(12,'Educación Artística'),(13,'Educación Religiosa'),(14,'Computación'),(15,'Inglés'),(16,'Programacion'),(17,'Quimica'),(18,'Etica Profesional'),(19,'Computacion Avanzada');
/*!40000 ALTER TABLE `cursos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalle_curso_usuario_profesor`
--

DROP TABLE IF EXISTS `detalle_curso_usuario_profesor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `detalle_curso_usuario_profesor` (
  `id_detalle_curso_usuario_profesor` int NOT NULL AUTO_INCREMENT,
  `id_usuario` int NOT NULL,
  `id_curso` int NOT NULL,
  PRIMARY KEY (`id_detalle_curso_usuario_profesor`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_curso` (`id_curso`),
  CONSTRAINT `detalle_curso_usuario_profesor_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`),
  CONSTRAINT `detalle_curso_usuario_profesor_ibfk_2` FOREIGN KEY (`id_curso`) REFERENCES `cursos` (`id_curso`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_curso_usuario_profesor`
--

LOCK TABLES `detalle_curso_usuario_profesor` WRITE;
/*!40000 ALTER TABLE `detalle_curso_usuario_profesor` DISABLE KEYS */;
INSERT INTO `detalle_curso_usuario_profesor` VALUES (1,1976,2),(2,1976,3),(3,1976,4),(4,1977,1),(5,1977,9),(6,1977,10),(7,1977,17),(8,1978,5),(9,1978,14),(10,1978,16),(11,1978,19),(12,1979,6),(13,1979,7),(14,1979,8),(15,1979,12),(16,1980,11),(17,1980,13),(18,1980,15),(19,1981,18);
/*!40000 ALTER TABLE `detalle_curso_usuario_profesor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalle_grado_cursos`
--

DROP TABLE IF EXISTS `detalle_grado_cursos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `detalle_grado_cursos` (
  `id_detalle_grado_curso` int NOT NULL AUTO_INCREMENT,
  `id_grado` int NOT NULL,
  `id_detalle_curso_usuario_profesor` int NOT NULL,
  PRIMARY KEY (`id_detalle_grado_curso`),
  KEY `id_grado` (`id_grado`),
  KEY `id_detalle_curso_usuario_profesor` (`id_detalle_curso_usuario_profesor`),
  CONSTRAINT `detalle_grado_cursos_ibfk_1` FOREIGN KEY (`id_grado`) REFERENCES `grado` (`id_grado`),
  CONSTRAINT `detalle_grado_cursos_ibfk_2` FOREIGN KEY (`id_detalle_curso_usuario_profesor`) REFERENCES `detalle_curso_usuario_profesor` (`id_detalle_curso_usuario_profesor`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_grado_cursos`
--

LOCK TABLES `detalle_grado_cursos` WRITE;
/*!40000 ALTER TABLE `detalle_grado_cursos` DISABLE KEYS */;
INSERT INTO `detalle_grado_cursos` VALUES (1,1,1),(2,1,2),(3,1,3),(4,1,4),(5,1,8),(6,1,12),(7,1,13),(8,1,14),(9,2,1),(10,2,2),(11,2,3),(12,2,4),(13,2,8),(14,2,12),(15,2,13),(16,2,14),(17,3,16),(18,3,9),(19,3,15),(20,3,18),(21,4,16),(22,4,9),(23,4,15),(24,4,18),(25,5,9),(26,5,18),(27,5,17),(28,5,10),(29,6,9),(30,6,18),(31,6,17),(32,6,10),(33,7,18),(34,7,11),(35,7,7),(36,7,19),(37,7,5),(38,7,6),(39,8,18),(40,8,11),(41,8,7),(42,8,5),(43,8,6),(44,8,19);
/*!40000 ALTER TABLE `detalle_grado_cursos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalle_grado_usuario_estudiante`
--

DROP TABLE IF EXISTS `detalle_grado_usuario_estudiante`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `detalle_grado_usuario_estudiante` (
  `id_detalle_grado_usuario_estudiante` int NOT NULL AUTO_INCREMENT,
  `id_usuario` int NOT NULL,
  `id_grado` int NOT NULL,
  PRIMARY KEY (`id_detalle_grado_usuario_estudiante`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_grado` (`id_grado`),
  CONSTRAINT `detalle_grado_usuario_estudiante_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`),
  CONSTRAINT `detalle_grado_usuario_estudiante_ibfk_2` FOREIGN KEY (`id_grado`) REFERENCES `grado` (`id_grado`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_grado_usuario_estudiante`
--

LOCK TABLES `detalle_grado_usuario_estudiante` WRITE;
/*!40000 ALTER TABLE `detalle_grado_usuario_estudiante` DISABLE KEYS */;
INSERT INTO `detalle_grado_usuario_estudiante` VALUES (1,1982,2);
/*!40000 ALTER TABLE `detalle_grado_usuario_estudiante` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grado`
--

DROP TABLE IF EXISTS `grado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `grado` (
  `id_grado` int NOT NULL AUTO_INCREMENT,
  `nombre_grado` varchar(100) NOT NULL,
  `id_seccion` int NOT NULL,
  PRIMARY KEY (`id_grado`),
  KEY `id_seccion` (`id_seccion`),
  CONSTRAINT `grado_ibfk_1` FOREIGN KEY (`id_seccion`) REFERENCES `seccion` (`id_seccion`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grado`
--

LOCK TABLES `grado` WRITE;
/*!40000 ALTER TABLE `grado` DISABLE KEYS */;
INSERT INTO `grado` VALUES (1,'Sexto Primaria',1),(2,'Sexto Primaria',2),(3,'Primero Básico',1),(4,'Primero Básico',2),(5,'Segundo Básico',1),(6,'Segundo Básico',2),(7,'Tercero Básico',1),(8,'Tercero Básico',2);
/*!40000 ALTER TABLE `grado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rol`
--

DROP TABLE IF EXISTS `rol`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rol` (
  `id_rol` int NOT NULL AUTO_INCREMENT,
  `nombre_rol` varchar(50) NOT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rol`
--

LOCK TABLES `rol` WRITE;
/*!40000 ALTER TABLE `rol` DISABLE KEYS */;
INSERT INTO `rol` VALUES (1,'Profesor'),(2,'Secretaria'),(3,'Estudiante');
/*!40000 ALTER TABLE `rol` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seccion`
--

DROP TABLE IF EXISTS `seccion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `seccion` (
  `id_seccion` int NOT NULL AUTO_INCREMENT,
  `nombre_seccion` varchar(50) NOT NULL,
  PRIMARY KEY (`id_seccion`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seccion`
--

LOCK TABLES `seccion` WRITE;
/*!40000 ALTER TABLE `seccion` DISABLE KEYS */;
INSERT INTO `seccion` VALUES (1,'A'),(2,'B');
/*!40000 ALTER TABLE `seccion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `id_usuario` int NOT NULL AUTO_INCREMENT,
  `DPI` varchar(240) NOT NULL,
  `nombre_us` varchar(50) NOT NULL,
  `apellido_us` varchar(50) NOT NULL,
  `telefono_us` varchar(50) NOT NULL,
  `id_rol` int NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `contrasenia` varchar(240) NOT NULL,
  `estado` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `unique_DPI` (`DPI`),
  UNIQUE KEY `usuario` (`usuario`),
  KEY `id_rol` (`id_rol`),
  CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=2070 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1975,'9482736458473','Ana','López','56473829',2,'ana_lopez','123',1),(1976,'1837460090007','Julieta','Soto','91827364',1,'julieta_soto','123',1),(1977,'2460028560009','Mateo','Hernández','74639285',1,'mateo_hdez','123',1),(1978,'3638200083991','Abril','Alvarez','46382975',1,'abril_alvarez','123',1),(1979,'4837400000000','Emilio','Moreno','28374651',1,'emilio_m','123',1),(1980,'5600089090909','Catalina','Muñoz','38475629',1,'catalina_m','123',1),(1981,'6182736458470','Manuel','García','56473829',1,'manuel_garcia','123',1),(1982,'7837999192807','Valentina','Guerrero','91827364',3,'valentina_g','123',1),(1983,'8101928564839','Luna','Sánchez','74639285',3,'luna_sanchez','123',1),(1984,'9638297483921','Iker','Díaz','46382975',3,'iker_diaz','123',1),(1985,'1037465900074','Renata','Vargas','28374651',3,'renata_v','123',0),(1986,'1147382910921','Hugo','Herrera','38475629',3,'hugo_herrera','123',0),(1987,'1282006458473','Olivia','González','56473829',3,'olivia_g','123',1),(1988,'1337465192847','Nicolás','Álvarez','91827364',3,'nicolas_a','123',1),(1989,'1463928560000','Zoe','Fernández','74639285',3,'zoe_f','123',1),(1990,'1538291100110','David','Pérez','46382975',3,'david_perez','123',1),(1991,'1690905928374','Violeta','Martínez','28374651',3,'violeta_m','123',1),(1992,'1797382910921','Samuel','López','38475629',3,'samuel_l','123',1),(1993,'1882736458473','Emma','Suárez','56473829',3,'emma_suarez','123',1),(1994,'1937465192847','Leonardo','Hernández','91827364',3,'leonardo_h','123',1),(1995,'2059134678290','Diego','González','12345678',3,'diego_g','123',1),(1996,'2123680974523','María','Sánchez','23456789',3,'maria_s','123',1),(1997,'2251093847562','Andrés','Hernández','34567890',3,'andres_h','123',1),(1998,'2323857690432','Ana','Martínez','45678901',3,'ana_m','123',1),(1999,'2428671093456','Lucas','Gómez','56789012',3,'lucas_g','123',1),(2000,'2545109384752','Valentina','Rodríguez','67890123',3,'valentina_r','123',1),(2001,'2692345678901','Santiago','López','78901234',3,'santiago_l00','123',1),(2002,'2767819023456','Camila','Fernández','89012345',3,'camila_f','123',1),(2003,'2834678290134','Juan','Pérez','90123456',3,'juan_p','123',1),(2004,'2976543210987','Laura','Díaz','01234567',3,'laura_d','123',1),(2005,'3065432190876','Mateo','Martínez','76543210',3,'mateo_m','123',1),(2006,'3154321098765','Isabela','Gómez','65432109',3,'isabela_g','123',1),(2007,'3243210987654','Diego','Hernández','54321098',3,'diego_h','123',1),(2008,'3332109876543','Sofía','García','43210987',3,'sofia_g','123',1),(2009,'3421098765432','Daniel','Pérez','32109876',3,'daniel_p','123',1),(2010,'3556789012345','Valeria','Fernández','21098765',3,'valeria_f','123',1),(2011,'3612345678901','Luis','Martínez','10987654',3,'luis_m','123',1),(2012,'3798765432109','Abril','Gómez','09876543',3,'abril_g','123',1),(2013,'3809876543210','Lucía','Hernández','98765432',3,'lucia_h','123',1),(2014,'3910987654321','Miguel','Rodríguez','87654321',3,'miguel_r','123',1),(2015,'4021098765432','Paula','Pérez','76543210',3,'paula_p','123',1),(2016,'4132100076543','Marcos','García','65432109',3,'marcos_g','123',1),(2017,'4243210987654','Carolina','López','54321098',3,'carolina_l','123',1),(2018,'4354320098765','Javier','Hernández','43210987',3,'javier_h','123',1),(2019,'4465432190876','Valentina','Pérez','32109876',3,'valentina_p','123',1),(2020,'4576543210987','Alejandro','Fernández','21098765',3,'alejandro_f','123',1),(2021,'4634600290134','Olivia','Martínez','10987654',3,'olivia_m','123',1),(2022,'4743210987654','Julieta','Gómez','09876543',3,'julieta_g','123',1),(2023,'4854321098765','Tomás','Hernández','98765432',3,'tomas_h','123',1),(2024,'4965432190876','Camila','Rodríguez','87654321',3,'camila_r','123',1),(2025,'50003210987','David','Pérez','44444444',1,'david_p','123',1),(2026,'5143210987600','Elena','García','65432109',3,'elena_g','123',1),(2027,'5232109876543','Santiago','López','54321098',3,'santiago_l','123',1),(2028,'5321098760032','Isabela','Hernández','43210987',3,'isabela_h','123',1),(2029,'5410987000321','Samuel','Rodríguez','32109876',3,'samuel_r','123',1),(2030,'5509876543210','Abril','Pérez','21098765',3,'abril_p','123',1),(2031,'5634567890123','Carmen','Soto','12345678',3,'carmen_s','123',1),(2032,'5745600001234','Eduardo','Martínez','23456789',3,'eduardo_m','123',1),(2033,'5856789000345','Fernanda','González','34567890',3,'fernanda_g','123',1),(2034,'5967890000456','Gustavo','López','45678901',3,'gustavo_l','123',1),(2035,'6078901234567','Inés','Hernández','56789012',3,'ines_h','123',1),(2036,'6189012300678','Jorge','Pérez','67890123',3,'jorge_p','123',1),(2037,'6290123456789','Karen','García','78901234',3,'karen_g','123',1),(2038,'6301210567890','Luis','Rodríguez','89012345',3,'luis_r','123',1),(2039,'6412345678901','Martha','Fernández','90123456',3,'martha_f','123',1),(2040,'6523456789012','Nicolás','Hernández','01234567',3,'nicolas_h','123',1),(2041,'6634567890123','Olivia','Pérez','12345678',3,'olivia_p','123',1),(2042,'6745678901234','Pablo','Gómez','23456789',3,'pablo_g','123',1),(2043,'6856789012345','Quetzal','Martínez','34567890',3,'quetzal_m','123',1),(2044,'6967890123456','Rosa','López','45678901',3,'rosa_l','123',1),(2045,'7078901234567','Sergio','González','56789012',3,'sergio_g','123',1),(2046,'7189012345678','Teresa','Hernández','67890123',3,'teresa_h','123',1),(2047,'7290123456789','Ulises','Pérez','78901234',3,'ulises_p','123',1),(2048,'7301234567890','Viviana','García','89012345',3,'viviana_g','123',1),(2049,'7412345678901','Walter','Rodríguez','90123456',3,'walter_r','123',1),(2050,'7523456789012','Ximena','Fernández','01234567',3,'ximena_f','123',1),(2051,'7634567890123','Yolanda','Hernández','12345678',3,'yolanda_h','123',1),(2052,'7745678901234','Zacarías','Gómez','23456789',3,'zacarias_g','123',1),(2053,'7856789012345','Valentina','López','34567890',3,'valentina_l','123',1),(2054,'7967890123456','Uriel','González','45678901',3,'uriel_g','123',1),(2055,'8078901234567','Tomasa','Hernández','56789012',3,'tomasa_h','123',1),(2056,'8189012345678','Sofía','Martínez','67890123',3,'sofia_m','123',1),(2057,'8290123456789','Ramón','López','78901234',3,'ramon_l','123',1),(2058,'8301234567890','Paola','García','89012345',3,'paola_g','123',1),(2059,'8412345678901','Omar','Rodríguez','90123456',3,'omar_r','123',1),(2060,'8523456789012','Natalia','Fernández','01234567',3,'natalia_f','123',1),(2061,'8634567890123','Mateo','Hernández','12345678',3,'mateo_h','123',1),(2062,'8745678901234','Laura','Gómez','23456789',3,'laura_g','123',1),(2063,'8856789012345','Karen','López','34567890',3,'karen_l','123',1),(2064,'8967890123456','Jorge','González','45678901',3,'jorge_g','123',1),(2065,'9078901234567','Juan','Hernández','56789012',3,'juan_h','123',1),(2066,'9189012345678','Inés','Martínez','67890123',3,'ines_m','123',1),(2067,'9290123456789','Gustavo','López','78901234',3,'gustavo_l2','123',1),(2068,'9301234567890','Fernanda','García','89012345',3,'fernanda_g00','123',1),(2069,'4512425871245','Ozuna','Peregri','4444444',3,'ozuna_15','123',1);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-12-14 22:59:43
