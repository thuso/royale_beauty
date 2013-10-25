<?php
    define("SERVER", "127.0.0.1");
    define("USER", "root");
    define("PSW", "");
    define("DBNAME", "royale_beauty3");
     define("CREATEDB", "CREATE DATABASE IF NOT EXISTS royale_beauty3");
     
    define("CREATETB1","CREATE TABLE IF NOT EXISTS `address`(
  `CUSTOMER_ID` int(11) NOT NULL,
  `STREET_NAME` varchar(50) DEFAULT NULL,
  `PROVINCE` varchar(50) DEFAULT NULL,
  `POSTAL_CODE` varchar(4) DEFAULT NULL,
  `HOUSE_NUMBER` int(11) DEFAULT NULL,
  PRIMARY KEY (`CUSTOMER_ID`)
)");

"--
-- Dumping data for table `address`
--";

define("INERT","INSERT INTO `address` (`CUSTOMER_ID`, `STREET_NAME`, `PROVINCE`, `POSTAL_CODE`, `HOUSE_NUMBER`) VALUES
(1, '10th', 'Gauteng', '0152', 2479),
(2, 'jesus', 'hugh', '2452', 512311),
(3, 'fefe', 'Free state', '0569', 0),
(4, 'kelo', 'North west', '0189', 0),
(5, '', 'Gauteng', '', 0),
(6, 'bnbnb', 'Gauteng', '455', 3553),
(7, '20th', 'Gauteng', '1619', 123)");

?>
