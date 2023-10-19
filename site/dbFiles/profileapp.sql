-- MariaDB dump 10.19  Distrib 10.11.4-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: profileapp
-- ------------------------------------------------------
-- Server version	10.11.4-MariaDB-1~deb12u1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `certificate`
--

DROP TABLE IF EXISTS `certificate`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `certificate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `education_id` int(11) NOT NULL,
  `education_user_id` int(11) NOT NULL,
  `certificateName` varchar(64) NOT NULL,
  `certificateDateStart` date DEFAULT NULL,
  `certificateDateFinished` date DEFAULT NULL,
  `certificateObtained` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`,`education_id`,`education_user_id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_certificate_education1_idx` (`education_id`,`education_user_id`),
  CONSTRAINT `fk_certificate_education1` FOREIGN KEY (`education_id`, `education_user_id`) REFERENCES `education` (`id`, `user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `certificate`
--

LOCK TABLES `certificate` WRITE;
/*!40000 ALTER TABLE `certificate` DISABLE KEYS */;
INSERT INTO `certificate` VALUES
(1,1,1,'ICT Beheer',NULL,NULL,1),
(2,2,1,'ADSD',NULL,NULL,0),
(3,3,2,'ADSD',NULL,NULL,0),
(4,4,3,'ADSD',NULL,NULL,0),
(5,5,4,'ADSD',NULL,NULL,0),
(6,6,5,'Zingen',NULL,NULL,1),
(7,7,6,'Zingen',NULL,NULL,1),
(8,8,7,'Zingen',NULL,NULL,1);
/*!40000 ALTER TABLE `certificate` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `education`
--

DROP TABLE IF EXISTS `education`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `education` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `schoolName` varchar(64) NOT NULL,
  `schoolCourse` varchar(64) NOT NULL,
  `schoolCity` varchar(64) DEFAULT NULL,
  `schoolAddress` varchar(64) DEFAULT NULL,
  `schoolPhone` int(11) DEFAULT NULL,
  `schoolReference` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id`,`user_id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_education_user1_idx` (`user_id`),
  CONSTRAINT `fk_education_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `education`
--

LOCK TABLES `education` WRITE;
/*!40000 ALTER TABLE `education` DISABLE KEYS */;
INSERT INTO `education` VALUES
(1,1,'ROC Friese Poort','ICT Beheer','Leeuwarden',NULL,NULL,NULL),
(2,1,'Windesheim','ADSD','Almere',NULL,NULL,NULL),
(3,2,'Windesheim','ADSD','Almere',NULL,NULL,NULL),
(4,3,'Windesheim','ADSD','Almere',NULL,NULL,NULL),
(5,4,'Windesheim','ADSD','Almere',NULL,NULL,NULL),
(6,5,'Zang school','Zang',NULL,NULL,NULL,NULL),
(7,6,'Zang school','Zang',NULL,NULL,NULL,NULL),
(8,7,'Zang school','Zang',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `education` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employer`
--

DROP TABLE IF EXISTS `employer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `employerName` varchar(64) NOT NULL,
  `employerCity` varchar(64) DEFAULT NULL,
  `employerAddress` varchar(64) DEFAULT NULL,
  `employerMail` varchar(64) DEFAULT NULL,
  `employerPhone` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id`,`user_id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_employer_user1_idx` (`user_id`),
  CONSTRAINT `fk_employer_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employer`
--

LOCK TABLES `employer` WRITE;
/*!40000 ALTER TABLE `employer` DISABLE KEYS */;
INSERT INTO `employer` VALUES
(1,1,'European Aerosols','Wolvega','Wolfraamweg 2','mail@ea.com','0561000000'),
(2,2,'Software development bedrijf','Almere','Straatnaam 1','mail@sdb.com','0611223344'),
(3,3,'AH','Almere','AH Straat 75','info@ah.nl','0682953563'),
(4,4,'Broodje aap BV','Almere','Neppe straat 91','broodje@aap.zip','0000000000'),
(5,5,'Studio 100','Schelle','Halfstraat 80','info@studio100.be','+32 038776035'),
(6,6,'Studio 100','Schelle','Halfstraat 80','info@studio100.be','+32 038776035'),
(7,7,'Studio 100','Schelle','Halfstraat 80','info@studio100.be','+32 038776035');
/*!40000 ALTER TABLE `employer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `experience`
--

DROP TABLE IF EXISTS `experience`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `experience` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employer_id` int(11) NOT NULL,
  `employer_user_id` int(11) NOT NULL,
  `jobTitle` varchar(64) DEFAULT NULL,
  `jobDesc` varchar(255) DEFAULT NULL,
  `jobDateStart` date DEFAULT NULL,
  `jobDateFinished` date DEFAULT NULL,
  `jobReference` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id`,`employer_id`,`employer_user_id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_experience_employer1_idx` (`employer_id`,`employer_user_id`),
  CONSTRAINT `fk_experience_employer1` FOREIGN KEY (`employer_id`, `employer_user_id`) REFERENCES `employer` (`id`, `user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `experience`
--

LOCK TABLES `experience` WRITE;
/*!40000 ALTER TABLE `experience` DISABLE KEYS */;
INSERT INTO `experience` VALUES
(1,1,1,'Magazijnmedewerker',NULL,'2021-11-12',NULL,NULL),
(2,2,2,'Software developer',NULL,'2022-06-15',NULL,NULL),
(3,3,3,'Vakkenvuller',NULL,'2023-05-29',NULL,NULL),
(4,4,4,'Verkoper',NULL,'2023-09-04',NULL,NULL),
(8,5,5,'Zangeres',NULL,'1998-01-01','2015-12-31',NULL),
(9,6,6,'Zangeres',NULL,'1998-01-01','2015-12-31',NULL),
(10,7,7,'Zangeres',NULL,'1998-01-01','2009-06-30',NULL);
/*!40000 ALTER TABLE `experience` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grades`
--

DROP TABLE IF EXISTS `grades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `certificate_id` int(11) NOT NULL,
  `certificate_education_id` int(11) NOT NULL,
  `certificate_education_user_id` int(11) NOT NULL,
  `subject` varchar(64) NOT NULL,
  `grade` float NOT NULL,
  PRIMARY KEY (`id`,`certificate_id`,`certificate_education_id`,`certificate_education_user_id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_grades_certificate1_idx` (`certificate_id`,`certificate_education_id`,`certificate_education_user_id`),
  CONSTRAINT `fk_grades_certificate1` FOREIGN KEY (`certificate_id`, `certificate_education_id`, `certificate_education_user_id`) REFERENCES `certificate` (`id`, `education_id`, `education_user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grades`
--

LOCK TABLES `grades` WRITE;
/*!40000 ALTER TABLE `grades` DISABLE KEYS */;
INSERT INTO `grades` VALUES
(1,2,2,1,'SL01',0),
(2,3,3,2,'SL01',0),
(3,4,4,3,'SL01',0),
(4,5,5,4,'SL01',0),
(5,6,6,5,'Liedjes zingen',8.9),
(6,7,7,6,'Liedjes zingen',6.7),
(7,8,8,7,'Liedjes zingen',7.5);
/*!40000 ALTER TABLE `grades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hobby`
--

DROP TABLE IF EXISTS `hobby`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hobby` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `hobbyName` varchar(64) NOT NULL,
  PRIMARY KEY (`id`,`user_id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_hobby_user1_idx` (`user_id`),
  CONSTRAINT `fk_hobby_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hobby`
--

LOCK TABLES `hobby` WRITE;
/*!40000 ALTER TABLE `hobby` DISABLE KEYS */;
INSERT INTO `hobby` VALUES
(1,1,'Zwemmen'),
(2,2,'Gamen'),
(3,3,'Gamen'),
(4,4,'Gamen'),
(5,5,'Zingen'),
(6,6,'Zingen'),
(7,7,'Zingen');
/*!40000 ALTER TABLE `hobby` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pud`
--

DROP TABLE IF EXISTS `pud`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pud` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `loginUser` varchar(64) NOT NULL,
  `loginPass` varchar(255) DEFAULT NULL,
  `CREATED` timestamp NULL DEFAULT current_timestamp(),
  `UPDATED` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`,`user_id`),
  KEY `fk_pud_user1_idx` (`user_id`),
  CONSTRAINT `fk_pud_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pud`
--

LOCK TABLES `pud` WRITE;
/*!40000 ALTER TABLE `pud` DISABLE KEYS */;
INSERT INTO `pud` VALUES
(1,1,'rikb','$2y$10$CfE6RwIEtHQS0HbE3bSdbehwGzeSWrnamhLc7kIuJRA0JNifcsXp6','2023-10-19 18:31:01','2023-10-19 18:31:01'),
(2,2,'jarik','$2y$10$lzDTAZUi4COUU83zTz570.GsW4xY2gFQEpmk2Ldx1yhvCYMJWx0EG','2023-10-19 18:31:28','2023-10-19 18:31:28'),
(3,3,'dorianb','$2y$10$XazXXbapOaOxpj4GS.vWh.o1F6I1yQGRUUihTDpYK3Db3SvbK.9uO','2023-10-19 18:31:57','2023-10-19 18:31:57'),
(4,4,'ashrafb','$2y$10$tNaxZjuwDVrisIajXdj9ResPr2vQ2mRodqImV6mbpOkGT7PslW4xy','2023-10-19 18:32:20','2023-10-19 18:32:20'),
(5,5,'kdk3','$2y$10$TX1tEgv98iVDo0Kb79QBcuU58cSMu4st/lprZtP9bVcAio3DL/i0a','2023-10-19 18:32:50','2023-10-19 18:32:50'),
(6,6,'kvk3','$2y$10$lhcfzgXspOK1o5gz10IVueG.EoSqaGoHXU7NQH2GApGOnOasMOL9a','2023-10-19 18:33:13','2023-10-19 18:33:13'),
(7,7,'kak3','$2y$10$ll3OuO/54/VdRsjWgexI1OQOY2Z3u1oevN.TPStUYKmvw3lbW059C','2023-10-19 18:33:39','2023-10-19 18:33:39');
/*!40000 ALTER TABLE `pud` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(64) NOT NULL,
  `lastName` varchar(64) NOT NULL,
  `dob` date DEFAULT NULL,
  `mail` varchar(64) NOT NULL,
  `phone` int(11) DEFAULT NULL,
  `profilePic` varchar(255) DEFAULT '/public/images/defaultProfilePic.jpg',
  `description` text DEFAULT NULL,
  `is_admin` tinyint(4) NOT NULL DEFAULT 0,
  `CREATED` timestamp NULL DEFAULT current_timestamp(),
  `UPDATED` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `mail_UNIQUE` (`mail`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `phone_UNIQUE` (`phone`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES
(1,'Rik','Bakker','2003-08-19','rik@wh.nl',611090427,'/public/images/defaultProfilePic.jpg','Cupcake ipsum dolor sit amet shortbread cake cheesecake icing. Gingerbread caramels soufflé brownie cake brownie caramels croissant. Liquorice marshmallow fruitcake cake toffee gummies muffin gingerbread jujubes. Chupa chups donut cotton candy apple pie chocolate cake liquorice apple pie jelly.',1,'2023-10-19 18:31:01','2023-10-19 20:57:15'),
(2,'Jari','Knoop',NULL,'jari@wh.nl',NULL,'/public/images/defaultProfilePic.jpg','Sriracha wayfarers tofu brunch tonx XOXO ethical fam paleo thundercats unicorn pop-up air plant lo-fi succulents. Marxism tilde tofu XOXO pok pok bushwick 8-bit chicharrones twee. Stumptown vegan umami, locavore street art woke williamsburg asymmetrical. Raw denim tbh whatever XOXO, selvage literally shabby chic iPhone narwhal pinterest marfa ramps mustache DSA.',1,'2023-10-19 18:31:28','2023-10-19 20:57:17'),
(3,'Dorian','Baies',NULL,'dorian@wh.nl',NULL,'/public/images/defaultProfilePic.jpg','Gun Arr barkadeer galleon spanker spirits gally long boat square-rigged measured fer yer chains. Hang the jib come about lookout ho scourge of the seven seas knave swing the lead grog blossom draught deadlights. Poop deck scuppers yawl Gold Road grog blossom starboard Yellow Jack Barbary Coast Jack Tar bilged on her anchor.',1,'2023-10-19 18:31:57','2023-10-19 20:56:45'),
(4,'Ashraf','Basnoe',NULL,'ashraf@wh.nl',NULL,'/public/images/defaultProfilePic.jpg','Can we parallel path streamline your work on this project has been really impactful, for through the lens of tiger team, this is not the hill i want to die on. We want to see more charts can you champion this all hands on deck. Let\'s see if we can dovetail these two projects player-coach. Translating our vision of having a market leading platfrom table the discussion , nor that jerk from finance really threw me under the bus drop-dead date. Who\'s the goto on this job with the way forward helicopter view, and hit the ground running, for drink from the firehose. Design thinking who\'s the goto on this job with the way forward , enough to wash your face, for ultimate measure of success, yet through the lens of. Let\'s prioritize the low-hanging fruit exposing new ways to evolve our design language, yet touch base, and make it more corporate please, we need evergreen content, nor knowledge process outsourcing. Cloud native container based get in the driver\'s seat we can\'t hear you weâ€™re all in this together, even if our businesses function differently, net net, or we need a recap by eod, cob or whatever comes first. Prethink golden goose I just wanted to give you a heads-up can you slack it to me?, but accountable talk, or have bandwidth circle back. Win-win quarterly sales are at an all-time low. Eat our own dog food one-sheet nobody\'s fault it could have been managed better a better understanding of usage can aid in prioritizing future efforts, rehydrate the team. Cross functional teams enable out of the box brainstorming dogpile that turd polishing, for up the flagpole bazooka that run it past the boss jump right in and banzai attack will they won\'t they its all greek to me unless they bother until the end of time maybe vis a vis too many cooks over the line, for window-licker, and flesh that out, for I just wanted to give you a heads-up. Commitment to the cause let\'s circle back tomorrow pass the mayo, appeal to the client, sue the vice president strategic staircase design thinking. Obviously weâ€™re starting to formalize flexible opinions around our foundations put a record on and see who dances. The last person we talked to said this would be ready marketing, illustration cloud native container based hire the best. Digital literacy groom the backlog, we need to crystallize a plan, or can you put it on my calendar?, nor in this space. Marketing computer development html roi feedback team website synergestic actionables. Land the plane 60% to 30% is a lot of persent, or target rich environment feed the algorithm ensure to follow requirements when developing solutions, yet can you run this by clearance? hot johnny coming through , yet face time. Slow-walk our commitment. We have put the apim bol, temporarily so that we can later put the monitors on that\'s mint, well done quarterly sales are at an all-time low. Tbrand terrorists. Blue sky peel the onion powerPointless collaboration through advanced technlogy we don\'t need to boil the ocean here. We need to touch base off-line before we fire the new ux experience donuts in the break room five-year strategic plan, nor drill down. Circle back. Clear blue water action item let\'s pressure test this spinning our wheels.',1,'2023-10-19 18:32:20','2023-10-19 20:58:39'),
(5,'Karen','Damen',NULL,'kd@k3.be',NULL,'/public/images/defaultProfilePic.jpg','Voluptatem exercitation for autem quasi exercitation incididunt yet doloremque. Molestiae ipsum, but do. Voluptas occaecat. Nequeporro. Ut nisi. Eum magnam nostrum laboriosam magnam occaecat. Perspiciatis aute nihil. Numquam quo. Minim beatae duis and doloremque pariatur. Occaecat numquam incididunt amet nostrum, aut perspiciatis.',0,'2023-10-19 18:32:50','2023-10-19 21:00:56'),
(6,'Kristel','Verbeke',NULL,'kv@k3.be',NULL,'/public/images/defaultProfilePic.jpg','Inventore quae. Voluptas velit. Enim ea. Deserunt ad yet qui beatae iure. Quam proident but dicta aspernatur. Ex quae. Exercitationem qui. Ipsam. Velitesse nostrud and explicabo. Officia. Laudantium. Aute ullam, anim incidunt dolore. Ipsa commodo. Nihil. Enim modi error. Ratione pariatur yet si culpa and omnis yet laboris. Doloremque ipsum, for fugit yet amet but dicta and lorem enim. Ipsum esse and aliquam ullamco or voluptatem ullam sint. Commodo veritatis but illum for reprehenderit yet ex proident but magni. Commodo. Enim nesciunt and minima esse and consequatur, deserunt. Eos aperiam or aperiam but nesciunt.',0,'2023-10-19 18:33:13','2023-10-19 21:00:48'),
(7,'Kathleen','Aerts',NULL,'ka@k3.be',NULL,'/public/images/defaultProfilePic.jpg','Dolorem dolorem. Quia iste. Ipsum adipisicing unde, yet aperiam. Nulla ea yet natus but eaque. Fugit. Amet. Nulla tempora. Iure consequat, nostrud aut for inventore. Fugit nisi. Duis quisquam minim or rem duis, dolores. Unde. Exercitationem iste aliquid and dolore and magna or tempor yet est. Quis sed so eius. Nisi elit for sunt. Enim culpa. In adipisicing, quae. Commodi enim for dicta and aliqua.',0,'2023-10-19 18:33:39','2023-10-19 21:01:45');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-10-19 23:05:46
