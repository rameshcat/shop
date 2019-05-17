-- MySQL dump 10.13  Distrib 5.7.26, for Linux (x86_64)
--
-- Host: localhost    Database: phpshop
-- ------------------------------------------------------
-- Server version	5.7.26-0ubuntu0.18.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `sort_order` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '1',
  `category_description` text NOT NULL,
  `category_image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'Шины',1,1,'Колеса важный элемент любого автомобиля, а шины, в свою очередь, делают езду на дороге безопасной и комфортной. Поскольку на колеса приходится основная нагрузка, то экономить на резине не стоит, поскольку покупка некачественных изделий приведет к аварийным ситуациям на дороге и сложности управления транспортным средством. По сути, автомобильные шины это резиновая оболочка колеса, которая ставится на обод. Состоит из таких частей: каркаса, протекторного рисунка, защитного слоя, борта и бокового элемента. Шины делят на летние, зимние и всесезонные от правильного выбора напрямую зависит безопасность на дороге и легкость управления транспортом','/template/images/home/categoryTyres.png'),(2,'Диски',2,1,'Диски на авто являются незаменимым атрибутом любого транспортного средства. Но когда речь заходит о солидности, статусе и безопасности, то важнейшим моментом является качество и состояние автодисков','/template/images/home/categoryDiscs.png'),(3,'Аккумуляторы',3,1,'Большой ассортимент аккумуляторов для авто и мототехники – все это предлагает вашему вниманию наш интернет-магазин. Здесь представлены АКБ известных брендов с проверенной репутацией, которые не один десяток лет поставляют на рынок качественные и надежные источники питания. Многие из представленных в нашем каталоге аккумуляторов изначально устанавливаются на новенькие авто некоторых производителей и идут в базовой комплектации машин. ','/template/images/home/categoryBataryes.png'),(4,'Масла',4,1,'У каждого владельца авто рано или поздно возникает необходимость замены масла в двигателе.  Для двигателя смазочный материал играет ключевую роль: при правильном выборе и своевременной замене срок службы всех узлов увеличивается в разы. В документации к транспортному средству указывается рекомендуемая марка моторного масла: пока машина на гарантии, нужно использовать именно ее. Цена рекомендуемого средства при этом может быть достаточно высокой.','/template/images/home/categoryOils.png');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `price` float NOT NULL,
  `availability` int(11) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `is_new` int(11) NOT NULL DEFAULT '0',
  `is_recommended` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (34,'Continental ContiCrossContact UHP 235/55 R17 99H FR',1,1839707,4229,1,'Continental','Continental ContiCrossContact UHP 235/55 R17 99H FR',0,0,1),(36,'Barum Vanis 2 215/70 R15C 109/107R',1,2028027,2098,1,'Barum','Barum Vanis 2 215/70 R15C 109/107R',0,1,1),(37,'Premiorri Solazo 195/55 R15 85V',1,2019487,899,1,'Premiorri','Premiorri Solazo 195/55 R15 85V',0,1,1),(38,'Zeetex SU1000 255/55 R18 109V XL',1,1953212,1925,1,'Zeetex','Zeetex SU1000 255/55 R18 109V XL',0,0,1),(39,'Goodyear Eagle Sport 185/70 R14 88H',1,1602042,1819,0,'Goodyear','Goodyear Eagle Sport 185/70 R14 88H',0,0,1),(40,'Rosava WQ-101',1,2028367,585,1,'Rosava','Rosava WQ-101',0,1,1),(41,'TechLine 645 BD R16 W6.5 PCD5x112 ET45 DIA57.1',2,1129365,2039,1,'TechLine','TechLine 645 BD R16 W6.5 PCD5x112 ET45 DIA57.1',1,1,1),(42,'Rial Kibo DBLP R17 W7.5 PCD5x108 ET47 DIA70.1',2,1128670,3864,1,'Rial','Rial Kibo DBLP R17 W7.5 PCD5x108 ET47 DIA70.1',0,0,1),(43,'ZW BK846 GP R17 W7 PCD5x114.3 ET45 DIA67.1',2,683364,2814,1,'ZW','ZW BK846 GP R17 W7 PCD5x114.3 ET45 DIA67.1',1,0,1),(44,'VARTA BD 6CT- 70Aз L JP',3,355025,2462,1,'VARTA','VARTA BD 6CT- 70Aз L JP',0,0,1),(45,'Масло Liqui Moly Top Tec 4100 5W-40 ',4,1563832,1164,1,'Liqui Moly','Масло Liqui Moly Top Tec 4100 5W-40 ',0,0,1),(46,'Toyo Open Country H/T 235/55 R17 99H',1,123123,2997,1,'Toyo','Toyo Open Country H/T 235/55 R17 99H',1,1,1),(47,'Sportmax Racing 3111Z WPWB R15 W6.5 PCD5x112 ET38 DIA67.1',2,123124,1644,1,'Sportmax Racing','Sportmax Racing 3111Z WPWB R15 W6.5 PCD5x112 ET38 DIA67.1',1,1,1),(54,'Bosch 6CT-63 S5 Silver Plus',3,1231222,2082,1,'Bosch','Bosch 6CT-63 S5 Silver Plus',1,1,1);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_order`
--

DROP TABLE IF EXISTS `product_order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `user_phone` varchar(255) NOT NULL,
  `user_comment` text NOT NULL,
  `user_id` varchar(11) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `products` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=69 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_order`
--

LOCK TABLES `product_order` WRITE;
/*!40000 ALTER TABLE `product_order` DISABLE KEYS */;
INSERT INTO `product_order` VALUES (63,'Roma','000-231-00-00','','19','2019-05-13 10:39:45','false',1),(62,'Roma','000-231-00-00','','19','2019-05-13 10:39:45','{\"54\":1}',1),(61,'asdasd','+1 88622365550','','0','2019-05-02 00:23:12','{\"46\":1}',1),(60,'asdasdsadasd','333333333333333333','','0','2019-05-02 00:21:15','{\"46\":2}',1),(59,'asd','+1 88622365550','12341234124','0','2019-05-02 00:15:53','{\"54\":1}',1),(58,'Natalia Kotelevska','+1 88622365550','asdasdasd','17','2019-05-01 19:18:16','{\"47\":1}',1),(57,'qwe','491787152216','asdfasdf','0','2019-05-01 15:17:09','{\"47\":4}',1),(56,'Natalia Kotelevska','+1 88622365550','','17','2019-05-01 10:57:22','{\"40\":2}',1),(55,'asdasd','+1 88622365550','','0','2019-04-30 23:33:11','{\"40\":4}',1),(64,'Roma','111-111-11-11','','19','2019-05-13 10:46:40','{\"54\":1}',1),(65,'Roma','123456789456123d','','19','2019-05-13 11:27:05','{\"47\":4}',1),(66,'Roma','123456789456123d','','19','2019-05-13 11:28:17','false',1),(67,'Jklkmk','111111111','123123','0','2019-05-13 19:10:24','{\"46\":2}',1),(68,'Roma','11111111','','21','2019-05-13 20:12:34','{\"43\":2}',1);
/*!40000 ALTER TABLE `product_order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (19,'Roma','roma@i.ua','$2y$10$tkz7htQf5lFU1hemrZ/NMer6whFxS7Ab2jMjmLv.ACiJLXCVHIqcu',NULL),(20,'roman','roman@sd.sd','$2y$10$ZJNNf.LhT0TwgEwp9IbsUeD.u1P1NPjRoBXAlGWGhqkC6ugVuu0/G',NULL),(21,'Roma','admin@admin.ua','$2y$10$HNU30HVSr1xokvM9XbU1gOhKNl3sL79Ce2xgouucjsjs9ofHzyU9O','admin');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `version`
--

DROP TABLE IF EXISTS `version`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `version` (
  `version` int(10) NOT NULL,
  `id` int(10) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `version`
--

LOCK TABLES `version` WRITE;
/*!40000 ALTER TABLE `version` DISABLE KEYS */;
INSERT INTO `version` VALUES (1,1);
/*!40000 ALTER TABLE `version` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-05-17 18:20:45
