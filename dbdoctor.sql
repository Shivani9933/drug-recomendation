-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2020 at 06:47 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbdoctor`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblaccount`
--

CREATE TABLE `tblaccount` (
  `iAccountId` int(11) NOT NULL,
  `sAccountName` varchar(100) NOT NULL,
  `sOwnerName` varchar(200) NOT NULL,
  `sAddress` varchar(500) NOT NULL,
  `sCity` varchar(100) NOT NULL,
  `sState` varchar(500) NOT NULL,
  `sStateCode` varchar(10) NOT NULL DEFAULT '',
  `sCounrty` varchar(500) NOT NULL DEFAULT '',
  `sPincode` varchar(10) NOT NULL,
  `sOfficeAddress` text NOT NULL,
  `sOfficeCity` varchar(500) NOT NULL DEFAULT '',
  `sOfficeState` varchar(500) NOT NULL DEFAULT '',
  `sOfficeStateCode` varchar(10) NOT NULL DEFAULT '',
  `sOfficeCountry` varchar(500) NOT NULL DEFAULT '',
  `sOfficePincode` varchar(10) NOT NULL DEFAULT '',
  `sOfficePhone` varchar(50) NOT NULL DEFAULT '',
  `sPhone` varchar(15) NOT NULL,
  `sPANNo` varchar(20) NOT NULL,
  `sEmail` varchar(100) NOT NULL,
  `sBankName` varchar(100) NOT NULL,
  `sAccountNo` varchar(100) NOT NULL,
  `sIFSCCode` varchar(100) NOT NULL,
  `sGSTNo` varchar(50) NOT NULL,
  `sIEC` varchar(50) NOT NULL DEFAULT '',
  `sGstFile` varchar(500) NOT NULL DEFAULT '',
  `sBrokerageType` varchar(50) NOT NULL DEFAULT '',
  `sBrokerageAmount` varchar(50) NOT NULL DEFAULT '0',
  `sCreatedTimestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblaccount`
--

INSERT INTO `tblaccount` (`iAccountId`, `sAccountName`, `sOwnerName`, `sAddress`, `sCity`, `sState`, `sStateCode`, `sCounrty`, `sPincode`, `sOfficeAddress`, `sOfficeCity`, `sOfficeState`, `sOfficeStateCode`, `sOfficeCountry`, `sOfficePincode`, `sOfficePhone`, `sPhone`, `sPANNo`, `sEmail`, `sBankName`, `sAccountNo`, `sIFSCCode`, `sGSTNo`, `sIEC`, `sGstFile`, `sBrokerageType`, `sBrokerageAmount`, `sCreatedTimestamp`) VALUES
(4, 'GEMINI EDIBLE & FATS (INDIA) PVT LTD ( KPT )', '', 'SURVEY NO:1607/2, INDUSTRIAL PARK,', 'KRISHNAPATNAM ', 'Andhra Pradesh', '', 'INDIA', '524323', '8-2-334/70.&.71, ROAD NO:5,\r\nBANJARA HILLS\r\n', 'HYDERABAD ', 'Telangana', '', 'INDIA', '500034', '', '', 'AADCG5150F', '', 'AXIS BANK LTD', '008010200081467', 'UTIB0000008', '37AADCG5150F1ZT', '', 'gstfiles/.htaccess', 'Per Metric Ton', '75', '2018-05-16 05:42:33'),
(5, 'OLIVIA IMPEX PVT LTD', '', 'PREMIER HOUSE PLOT NO:38, CENTRAL ROAD MIDC ANDHERI EAST', 'MUMBAI ', 'Maharashtra', '', 'INDIA', '400093', 'SAVOY CHAMBERS 4TH FLOOR,OFFICE NO:401\r\nJUNCTION OF VITHAL BHAI PATEL ROAD, \r\nAND DATTATRY ROAD,SHASHTRY NAGAR,\r\nSANTACRUZ WEST\r\n', ' MUMBAI', 'Maharashtra', '', 'INDIA', '400054', '', '', 'AAACO4346A', '', 'ICICI BANK ', '054451000003', 'ICIC0000544', '27AAACO4346A1ZV', '', '', 'Per Metric Ton', '50', '2018-05-16 06:20:15'),
(7, 'PAWAN OIL INDUSTRIES', '', 'SURVEY NO:136, GAGAN PAHAD RR DISTRICT,', 'HYDERABAD ', 'Telangana', '', 'INDIA', '500052', '', '', 'Telangana', '', '', '', '', '', 'AACFP3655J', '', '', '', '', '36AACFP3655J1Z2', '0998007960', '', 'Per Metric Ton', '100', '2018-05-16 06:34:28'),
(8, 'PAWAN REFINERIES PVT LTD', '', 'PLOT NO.24, SY NO.118/A AND 118E, MOTHIGHANAPUR VILLAGE BALANAGAR MANDAL, DIST\r\n', 'MAHABOOBNAGAR ', 'Telangana', '', 'INDIA', '509202', '', '', 'Telangana', '', '', '', '', '', 'AAICP5374K', '', '', '', '', '36AAICP5374K1ZW', '', '', 'Per Metric Ton', '100', '2018-05-16 06:36:32'),
(9, 'BIO-PHARMA LABORATORIES (P) LTD', '', 'PLOT NO:104 B & C,SRI S V CO-OP.CREDIT SOCIETY, IDA,BOLLARAM, JINNARAM (M) MEDAK DIST.\r\n', ' BOLLARAM', 'Telangana', '', 'INDIA', '502325', '', '', '', '', '', '', '', '', 'AAACB8366K', '', '', '', '', '36AAACB8366K1ZC', '', '', 'Percentage', '0.50', '2018-05-16 06:38:26'),
(10, 'HARGUN AGRO INDUSTRIES PVT LTD', '', 'PLOT NO:7-4-150/4, PART 1A, GAGAN PAHAD, RAJENDRA NAGAR DISTRICT:\r\n', 'HYDERABAD ', 'Telangana', '', 'INDIA', '500077', '', '', 'Telangana', '', '', '', '', '', 'AADCH4806P', '', '', '', '', '36AADCH4806P1Z8', '0915006979', '', 'Per Metric Ton', '100', '2018-05-16 06:40:04'),
(11, 'BIOMAX FUELS LIMITED', '', 'PLOT NO:S&T, PHASE,III  VIZAG SPECIAL ECONOMIC ZONE, DUVVADA', ' VISAKHAPATNAM', 'Andhra Pradesh', '', 'INDIA', '530046', '', '', '', '', '', '', '', '', 'AACCB6876C', '', '', '', '', '37AACCB6876C1ZM', '', '', 'Per Metric Ton', '100', '2018-05-16 06:41:34'),
(12, 'SANTHOSHIMATHAA EDIBLE OILS REFINERY PVT LTD', '', 'PLOT NO:39-B, SURVEY NO:245 PART, INDUSTRIAL PARK, APIIC-IAIA, VAKALAPUDI,\r\n', 'KAKINADA', 'Andhra Pradesh', '', 'INDIA', '533005', '', '', '', '', '', '', '', '', 'AARCS1166P', '', '', '', '', '37AARCS1166P1ZI', '', '', 'Per Metric Ton', '100', '2018-05-16 06:42:51'),
(13, 'SANTHOSHIMATHAA OILS AND FATS PVT LTD', '', 'SY NO.252, EPURU-BIT 1B,PANTAPALEM (VILLAGE), MUTHUKUR MANDAL\r\nSRI POTTISRIRAMALU,\r\n', 'NELLORE', 'Andhra Pradesh', '', 'INDIA', '524344', '', '', '', '', '', '', '', '', 'AAVCS7453D', '', '', '', '', '37AAVCS7453D3ZR', '', '', 'Per Metric Ton', '100', '2018-05-16 06:44:49'),
(14, 'SANTHOSHIMATHA OIL PACKAGING INDUSTRIES ( KKD )', '', 'PLOT NO.9, IDA, RAMANAYYA PETA, EAST GODAVARI ( DISTRICT )', 'KAKINADA', 'Andhra Pradesh', '', 'INDIA', '533005', '', '', '', '', '', '', '', '', 'ABAFS0079C', '', '', '', '', '37ABAFS0079C1ZG', '', '', 'Per Metric Ton', '100', '2018-05-16 06:46:56'),
(15, 'JAITHRA FEEDS & FATS PRIVATE LIMITED ', '', '3-40, VELERU (P.O),\r\n BAPULAPADU MANDAL,\r\n KRISHNA DISTRICT,\r\n', 'VELERU', 'ANDHRA PRADESH', '', 'INDIA', '521110', '', '', '', '', '', '', '', '', 'AAECJ1114B', '', '', '', '', '37AAECJ1114B1Z9', '', '', '', '0', '2018-05-16 06:49:00'),
(16, 'SOUTH INDIA KRISHNA OIL AND FATS PVT LTD', '', 'SURVEY NO:275,279,280 & 231, EPURU BIT -1B, PANTAPALEM, MUTHUKUR MANDAL', 'NELLORE', 'Andhra Pradesh', '', 'INDIA', '524344', '', '', '', '', '', '', '', '', 'AANCS3846A', '', '', '', '', '37AANCS3846A1ZA', '', '', 'Per Metric Ton', '75', '2018-05-16 06:50:20'),
(17, 'TVARUR OILS AND FATS PVT LTD', '', 'VILLAGE: KARUPPUR\r\nVIA. ADIYAKKAMANGALAM,\r\n', 'THIRUVARUR', 'TAMILNADU', '33', 'INDIA', '611101', '', '', '', '', '', '', '', '', 'AAECT7561Q', '', '', '', '', '33AAECT7561Q1ZP', '', '', '', '0', '2018-05-16 07:00:45'),
(18, 'KIRTI AGRO TECH LIMITED', '', '591, KIRTI AREA, BORAMANI', 'SHOLAPUR', 'Maharashtra', '', 'INDIA', '', '', '', '', '', '', '', '', '', 'AACCK3945M', '', '', '', '', '27AACCK3945M1Z5', '', '', 'Per Metric Ton', '75', '2018-05-16 07:02:38'),
(19, 'KIRTI DALL MILLS LTD (L)', '', 'G-90/95, MIDC , KIRTI CIRCLE', 'LATUR', 'Maharashtra', '', 'INDIA', '413512', '', '', '', '', '', '', '', '', 'AAACK7418F', '', '', '', '', '27AAACK7418F1ZM', '', '', 'Per Metric Ton', '74.98', '2018-05-16 07:04:22'),
(20, 'ADM AGRO INDUSTRIES LATUR & VIZAG PVT LTD', '', 'G 75-86, MIDC AREA,\r\n', 'LATUR', 'Maharashtra', '', 'INDIA', '413512', '', '', '', '', '', '', '', '', 'AAACT0700F', '', '', '', '', '27AAACT0700F1ZY', '', '', 'Per Metric Ton', '50', '2018-05-16 07:06:03'),
(21, 'GAJANAN INDUSTRIES', '', 'S NO:290/B/A 290/B/O, N H 7 GOLLAPALLY,MAHABUBNAGAR\r\n', 'JEDCHERALA', 'Telangana', '', 'INDIA', '509301', '', '', '', '', '', '', '', '', 'AAFFG0506J', '', '', '', '', '36AAFFG0506J1ZO', '', '', 'Per Metric Ton', '100', '2018-05-16 07:07:36'),
(22, 'BRAHMA CHEMICALS', '', 'GHAT NO: 411-B,\r\nBELGAUM-VENGURLA ROAD,\r\nTQ: CHANDGAD, DIST:KOLHAPUR\r\n', 'HALKARNI', 'MAHARASHTRA', '27', 'INDIA', '416552', '16/2, BRAHMA \r\nCHIDAMBAR NAGAR,\r\n', ' BELGAUM', 'KARNATAKA', '', 'INDIA', '590006', '', '', 'AADFB1979Q', '', '', '', '', '27AADFB1979Q1ZT', '', '', '', '0', '2018-05-16 07:09:56'),
(23, 'RAJESH CHEMICALS', '', '17/15, MGR STREET,', ' CHITTOOR', 'Andhra Pradesh', '', 'INDIA', '517001', '', '', '', '', '', '', '', '', 'AKTPR6021R', '', '', '', '', '37AKTPR6021R1Z5', '', '', 'Per Metric Ton', '100', '2018-05-16 07:11:30'),
(24, 'TARWANI SOAP INDUSTRIES', '', 'VILLAGE: DUSERA, MANA BASTI, BLOCK: ABHANPUR,  DIST:\r\n', 'RAIPUR', 'Chattisgarh', '', 'INDIA', '492001', '', '', 'Chattisgarh', '', '', '', '', '', 'AAOFT9412H', '', '', '', '', '22AAOFT9412H1Z1', 'AAOFT9412H', '', 'Per Metric Ton', '100', '2018-05-16 07:13:01'),
(25, 'SIRMAUR SOAP FACTORY', '', 'D-20, PARSAKHERA INDUSTRIAL AREA, RAMPUR ROAD,', 'BAREILLY', 'Uttar Pradesh', '', 'INDIA', '243502', '', '', '', '', '', '', '', '', 'ABAFS3866P', '', '', '', '', '09ABAFS3866P1ZF', 'ABAFS3866P', '', 'Per Metric Ton', '100', '2018-05-16 07:14:56'),
(26, 'SIRMAUR SOAPS AND ALLIED PRODUCTS PRIVATE LIMITED', '', 'VILLAGE : SATUIYA KHAS TEHSIL, MEERGANJ', 'BAREILLY ', 'Uttar Pradesh', '', 'INDIA', '243501', '', '', '', '', '', '', '', '', 'AAFCA5475P', '', '', '', '', '09AAFCA5475P1ZZ', '2917500042', '', 'Per Metric Ton', '100', '2018-05-16 07:16:29'),
(27, 'SITAL SOAP PACKAGING PVT LTD', '', 'VILLAGE:CHHERIKHEDI, POST:MANDIR HASOUD, DISTRICT,', ' RAIPUR', 'Chattisgarh', '', 'INDIA', '492101', '', '', '', '', '', '', '', '', 'AAICS5904N', '', '', '', '', '22AAICS5904N1Z4', 'AAICS5904N', '', 'Per Metric Ton', '100', '2018-05-16 07:17:44'),
(28, 'S S INDUSTRIES', '', 'SEDIKHEDI\r\n', 'RAIPUR', 'CHHATTISGARH', '22', 'INDIA', '492001', '', '', '', '', '', '', '', '', 'ACTPD1437H', '', '', '', '', '22ACTPD1437H1ZU', '', '', '', '0', '2018-05-16 07:18:55'),
(29, 'SURI UDYOG', '', 'PLOT NO: 112/B, LIGHT INDUSTRIAL AREA,', 'BHILAI', 'Chattisgarh', '', 'INDIA', '490026', '', '', '', '', '', '', '', '', 'AARFS5664D', '', '', '', '', '22AARFS5664D1Z1', '', '', 'Per Metric Ton', '100', '2018-05-16 07:20:09'),
(30, 'JVL OIL REFINERY', '', '(A UNIT OF JVL AGRO INDUSTRIES LTD.) J.L .NO:149, P.O.DEBHONG,P.S. BHABANIPUR, \r\nDISTRICT:PURBA MEDINIPUR\r\n', 'HALDIA ', 'West Bengal', '', 'INDIA', '721657', '', '', '', '', '', '', '', '', 'AAACJ5704B', '', '', '', '', '19AAACJ5704B1ZZ', '', '', 'Per Metric Ton', '0', '2018-05-16 07:21:32'),
(31, 'BALAJI CHEMICALS', '', '63/2B, KSHUDIRAM BOSE SARANI\r\n', 'KOLKATA', 'West Bengal', '', 'INDIA', '700037', '', '', '', '', '', '', '', '', 'AFQPK9745M', '', '', '', '', '19AFQPK9745M1ZD', '', '', 'Per Metric Ton', '0', '2018-05-16 07:23:38'),
(32, 'S K TRADERS', '', '2ND FLOOR, 157, GOENKA MANSION, RABINDRA SARANI,', 'KOLKATA', 'West Bengal', '', 'INDIA', '711106', '', '', '', '', '', '', '', '', 'AKZPA7619N', '', '', '', '', '19AKZPA7619N2Z7', 'AKZPA7619N', '', 'Per Metric Ton', '0', '2018-05-16 07:25:06'),
(33, 'SARAIWWALAA AGRR REFINERIES LIMITED', '', '460/2, PLOT NO: 2 & 11, MANKHAL,\r\nAPIIC, IDA, MAHESHWARAM MANDAL,\r\n', 'RANGA REDDY DISTRICT', 'TELANGANA', '36', 'INDIA', '501359', '', '', '', '', '', '', '', '', 'AAFCS6410C', '', '', '', '', '36AAFCS6410C1ZQ', '', '', '', '0', '2018-05-16 07:26:37'),
(34, 'SARAIWWALAA AGRR REFINERIES LTD', '', 'EPURU-1B PANTAPALEM REVENUE\r\nVILLAGE KORUMAGANI\r\nMUTHUKURU MANDAL\r\n', 'NELLORE ', 'ANDHRA PRADESH', '37', 'INDIA', '524344', '', '', '', '', '', '', '', '', 'AAFCS6410C', '', '', '', '', '37AAFCS6410C1ZO', '', '', '', '0', '2018-05-16 07:28:01'),
(35, 'S V REFINERIES PRIVATE LIMITED', '', 'SURVEY NO.406/2, PLOT NO.3 & 10, IDA PHASE-I, MANKHAL, ', 'MAHESHWARAM', 'Telangana', '', 'INDIA', '', '', '', '', '', '', '', '', '', 'AAWCS5221J', '', '', '', '', '36AAWCS5221J1ZV', '', '', 'Per Metric Ton', '100', '2018-05-16 07:29:08'),
(36, 'PRIYANKA REFINERIES PVT LTD UNIT-II', '', 'SURVEY NO:479P TO 482P, APIIC, IDA-MANKHAL,MAHESHWARAM MANDAL,', ' RANGA REDDY DISTRICT', 'Telangana', '', 'INDIA', '501359', '', '', '', '', '', '', '', '', 'AABCP2112Q', '', '', '', '', ' 36AABCP2112Q1ZD', '', '', '', '0', '2018-05-16 07:30:39'),
(37, 'AGARWAL INDUSTRIES PVT LTD', '', 'PLOT NO:5A/1, VAKALAPUDI IDA,THAMMAVARAM VILLAGE,', 'KAKINADA', 'Andhra Pradesh', '', 'INDIA', '533005', '', '', '', '', '', '', '', '', 'AACCA0094R', '', '', '', '', '37AACCA0094R1ZA', '', '', 'Per Metric Ton', '75', '2018-05-16 07:32:10'),
(38, 'LOHIYA EDIBLE OILS PRIVATE LIMITED', '', 'S.NO.460/2 & 479 TO 482, MANKHAL, MAHESHWARAM,', ' RANGAREDDY', 'Telangana', '', 'INDIA', '501359', '', '', '', '', '', '', '', '', 'AABCL0085C', '', '', '', '', '36AABCL0085C1ZY', '', '', 'Per Metric Ton', '70', '2018-05-16 07:33:15'),
(39, 'LOHIYA EDIBLE OILS PVT LTD UNIT-II', '', 'PLOT NO:25, IDA, APIIC INDUSTRIAL AREA,VAKALPUDI,', 'KAKINADA', 'Andhra Pradesh', '', 'INDIA', '533005', '', '', '', '', '', '', '', '', 'AABCL0085C', '', '', '', '', '37AABCL0085C1ZW', '', '', 'Per Metric Ton', '70', '2018-05-16 07:34:30'),
(40, 'GAYATRI SEVA SANSTHAN', '', 'DHOOM MANIKPUR\r\nDISTl: GOUTHAMBUDHA NAGAR\r\n', 'DADRI-TAHASIL', 'UTTAR PRADESH', '09', 'INDIA', '', '', '', '', '', '', '', '', '', 'AAATG1960H', '', '', '', '', '09AAATG1960H1ZQ', '', '', '', '0', '2018-05-16 07:37:33'),
(41, 'DEEP CHAND ARYA INDUSTRIES', '', 'KHASRA NO: 1403,VILLAGE & POST:DHOOM MANIKPUR,TEHSIL:DADRI, DISTRICT: GAUTAM BUDH NAGAR,', ' DADRI', 'Uttar Pradesh', '', 'INDIA', '203208', '', '', '', '', '', '', '', '', 'AAGFD7936G', '', '', '', '', '09AAGFD7936G1Z6', '', '', 'Per Metric Ton', '100', '2018-05-16 07:38:50'),
(42, 'FOREVER BODY CARE INDUSTRIES', '', 'K.NO.190, RAIPUR  INDUSTRIAL AREA,BHAGWANPUR,TEHSIL ROORKEE, DIST, HARIDWAR, ', ' ROORKEE', 'Uttarakhand', '', 'INDIA', '247661', '', '', '', '', '', '', '', '', 'AABFF8536B', '', '', '', '', '05AABFF8536B2ZS', '', '', 'Per Metric Ton', '100', '2018-05-16 07:40:29'),
(43, 'DEVILAL KUTIR SOAP', '', 'PRAGTI PATH, CHITTOR ROAD,\r\n', 'BHILWARA', 'Rajasthan', '', 'INDIA', '311001', '', '', '', '', '', '', '', '', 'AMPLPS6361F', '', '', '', '', '08AMLPS6361F1ZN', '1304008525', '', 'Per Metric Ton', '0', '2018-05-16 07:42:08'),
(44, 'GRTM INDUSTRIES PVT LTD', '', 'CHANDRAPURAM ,DERATHU, DISTRICT:AJMER', 'NASIRABAD ', 'Rajasthan', '', 'INDIA', '305601', '', '', '', '', '', '', '', '', 'AADCG3873H', '', '', '', '', '08AADCG3873H1ZG', '', '', '', '0', '2018-05-16 07:43:34'),
(45, 'HARICHANDANA AGRO TECH LIMITED', '', 'KANKIPADU ROAD, KESARAPALLI GANNAVARAM MANDAL KRISHNA DIST,\r\n', 'VIJAYAWADA ', 'Andhra Pradesh', '', 'INDIA', '', 'D,NO:59-4-7, SHOP NO:2,\r\n SOUNDARYA APARTMENT IIIRD LINE,\r\n ASHOK NAGAR NEAR I.T.I BUS STOP\r\n', ' VIJAYAWADA', '', '', 'INDIA', '520010', '', '', 'AAACH8875M', '', '', '', '', '37AAACH8875M1ZU', '', '', 'Per Metric Ton', '100', '2018-05-16 07:45:51'),
(46, 'SATYAKALA AGRO OIL PRODUCTS LTD', '', 'GANGURU PENAMALURU MANDALAM KRISHNA DIST\r\n', 'VIJAYAWADA', 'Andhra Pradesh', '', 'INDIA', '521139', '', '', '', '', '', '', '', '', 'AADCS1285K', '', '', '', '', '37AADCS1285K1Z2', '', '', 'Per Metric Ton', '100', '2018-05-16 07:47:44'),
(47, 'MAYURA INDUSTRIES', '', 'OFFICE:S.NO.330/1, VIA KANAVARAM, RAJANAGARAM MANDAL, E.G.DT.', 'KANAVARAM', 'Andhra Pradesh', '', 'INDIA', '533296', '', '', '', '', '', '', '', '', 'AAVFM9575B', '', '', '', '', '37AAVFM9575B1ZM', '2614001716', '', 'Per Metric Ton', '100', '2018-05-16 07:49:28'),
(48, 'SREE JALARAM SOAP FACTORY', '', '18 KM STONE, SHOLAPUR ROAD,POST:SAKET (KHURD)', 'AHMEDNAGAR', 'Maharashtra', '', 'INDIA', '414001', 'HANTEL CIRCLE SHEJARI\r\nBANGAL CHOWKI\r\n', 'AHMEDNAGAR', '', '', 'INDIA', '414001', '', '', 'AASFS9881K', '', '', '', '', '27AASFS9881K1Z0', '', '', 'Percentage', '0.50', '2018-05-16 07:52:34'),
(49, 'PRABHAT SOAP INDUSTRIES', '', '18 KM STONE,SHOLAPUR ROAD, POST:SAKET (KHURD)\r\n', 'AHMEDNAGAR', 'Maharashtra', '', 'INDIA', '414001', '', '', '', '', '', '', '', '', 'AAGFP3681G', '', '', '', '', '27AAGFP3681G1Z2', '', '', 'Percentage', '0.50', '2018-05-16 07:54:27'),
(50, 'RATTAN SOAP WORKS', '', 'SECTION 25, OPP VENUS CINEMA, DISTRICT: THANE,', 'ULHASNAGAR', 'Maharashtra', '', 'INDIA', '421004', '', '', '', '', '', '', '', '', 'AALPW2849Q', '', '', '', '', '27AALPW2849Q1ZK', '', '', 'Per Metric Ton', '0', '2018-05-16 07:56:10'),
(51, 'KRISHNA ANTIOXIDANTS PRIVATE LIMITED', '', 'PLOT NO:A-13, \r\nGANE KHADPOLI, MIDC ,\r\nTALUKA CHIPLUN,\r\n', 'DIST.RATNAGIRI', 'MAHARASHTRA', '27', 'INDIA', '415603', '', '', '', '', '', '', '', '', 'AAACK1793M', '', '', '', '', '27AAACK1793M1Z5', '', '', '', '0', '2018-05-16 07:57:44'),
(52, 'KEDIA ORGANIC CHEMICALS PVT LTD', '', 'N.49/2, ADDITIONAL AMBERNATH MIDC', 'DIST: THANE ', 'Maharashtra', '', 'INDIA', '421506', ' B-111, PUNIT INDL. PREMISES,\r\nPLOT NO:11 & 11A,\r\n THANE BELAPUR ROAD, TURBHE,\r\n', ' NAVI MUMBAI', '', '', 'INDIA', '400705', '', '', 'AABCK0355Q', '', '', '', '', '27AABCK0355Q1Z8', '', '', 'Per Metric Ton', '100', '2018-05-16 07:59:54'),
(53, 'THE GOWTHAMI SOLVENT OILS LTD', '', 'POST BOX NO:7, PYDIPARRU, DISTRICT, WEST GODAVARI ', 'TANUKU', 'Andhra Pradesh', '', 'INDIA', '534211', '', '', '', '', '', '', '', '', 'AAACT6359A', '', '', '', '', '37AAACT6359A1ZG', '', '', 'Per Metric Ton', '100', '2018-05-16 08:01:19'),
(54, 'AMAR INDUSTRIES', '', 'NO.27, KALINGARAYAN 1ST LANE, OLD WASHERMENPET,\r\n', 'CHENNAI', 'Tamil Nadu', '', 'INDIA', '600021', '', '', '', '', '', '', '', '', 'AAHPJ7027R', '', '', '', '', '33AAHPJ7027R1ZA', '', '', 'Per Metric Ton', '100', '2018-05-16 08:03:27'),
(55, 'AMAR JAIN INDUSTRY', '', 'KHAILAND MARKET, P R MARG \r\n', 'AJMER', 'Rajasthan', '', 'INDIA', '', '', '', '', '', '', '', '', '', 'AAHPJ7027R', '', '', '', '', '08AAHPJ7027R1Z3', '', '', 'Per Metric Ton', '100', '2018-05-16 08:07:44'),
(56, 'RAJ SOAP FACTORY', '', ' SWAMY DAYANAND MARG\r\nOLD TALKIES ROAD,\r\n', 'AMBALA CITY ', 'HARYANA', '06', 'INDIA', '134003', '', '', '', '', '', '', '', '', 'ADGPB3596F', '', '', '', '', '06ADGPB3596F1ZP', '', '', '', '0', '2018-05-16 08:09:44'),
(57, 'GIAN SOAP FACTORY', '', '68, HSIDC SECTOR-3, NEAR NAMASTE CHOWK\r\n', 'KARNAL', 'Haryana', '', 'INDIA', '', '', '', '', '', '', '', '', '', 'AAAFG9803B', '', '', '', '', '06AAAFG9803B1ZV', '', '', 'Per Metric Ton', '0', '2018-05-16 08:10:50'),
(58, 'ANGAN FOODS PVT LTD', '', 'R.S.NO:254/6, KOYYALAGUDEM ROAD,GOPALAPURAM  WEST GODAVARI DIST,\r\n', 'RAJAHMUNDRY', 'Andhra Pradesh', '', 'INDIA', '534316', 'MR.NAVEEN NAYYAR\r\nFLAT NO-207, M K SIGNATURE APARTMENTS,\r\nN. RAJU STREET, GANDHIPURAM,\r\n', ' RAJAHMUNDRY', '', '', 'INDIA', '533103', '', '', 'AAICS7642F', '', '', '', '', '37AAICS7642F1Z3', '', '', 'Per Metric Ton', '100', '2018-05-16 08:14:11'),
(59, 'SIFAT AGRO INDUSTRIES', '', '4/9/269/1A PART ROOM NO.9, KISHAN BAGH, RAJENDER NAGAR,', 'HYDERABAD ', 'Telangana', '', 'INDIA', '500195', '', '', 'Telangana', '', '', '', '', '', 'AWEPS2934F', '', '', '', '', '36AWEPS2934F2ZF', '', '', 'Per Metric Ton', '100', '2018-05-16 08:15:32'),
(60, 'SWASTIK OLEOCHEMS LIMITED', '', '7/3/141, GAGAN PAHAD, RAJENDRANAGAR, R.R.DIST,', 'HYDERABAD', 'Telangana', '', 'INDIA', '501323', '', '', '', '', '', '', '', '', 'AADCS4170K', '', '', '', '', '36AADCS4170K1Z6', '0998005363', '', 'Per Metric Ton', '100', '2018-05-16 08:16:52'),
(61, 'SMI ENTERPRISES', '', 'P.O. CHAKULIA, DISTRICT: EAST SINGHBHUM\r\n', 'CHAKULIA ', 'Jharkhand', '', 'INDIA', '832301', '', '', '', '', '', '', '', '', 'ADAPR9979A', '', '', '', '', '20ADAPR9979A1ZK', '', '', 'Per Metric Ton', '100', '2018-05-16 08:18:05'),
(62, '3F INDUSTRIES LTD', '', 'SURVEY NO:1604, EPURU, 1-B, PANTAPALEM VILLAGE, MUTTUKUR MANDAL, SPSR DIST:NELLORE\r\n', 'KRISHNAPATNAM', 'Andhra Pradesh', '', 'INDIA', '524323', '', '', '', '', '', '', '', '', 'AAACF2643K', '', '', '', '', '37AAACF2643K1ZM', '', '', 'Per Metric Ton', '100', '2018-05-16 08:19:38'),
(63, ' R J TRADING COMPANY', '', ' VILL PAWA KHAKAT G.T.ROAD, NEAR CIVIL AIRPORT', 'LUDHIANA ', 'Punjab', '', 'INDIA', '141120', '', '', '', '', '', '', '', '', 'ABKPA7371D', '', '', '', '', '03ABKPA7371D1Z3', '', '', 'Per Metric Ton', '100', '2018-05-16 08:22:56'),
(64, 'VISHAL SOAP FACTORY', '', 'TANANG FATA PANDARPUR ROAD, TANANG', 'SANGLI ', 'Maharashtra', '', 'INDIA', '416410', '', '', '', '', '', '', '', '', 'AAIPN2238B', '', '', '', '', '27AAIPN2238B1ZO', '', '', 'Per Metric Ton', '100', '2018-05-16 08:24:46'),
(65, 'TIRUMALA CHEMICAL ALLIED INDUSTRIES', '', 'SURVEY NO:116, MANGALPALLY VILLAGE: NEAR IBRAHIMPATNAM R R DISTRICT\r\n', 'MANGALPALLY ', 'Telangana', '', 'INDIA', '501510', '', '', '', '', '', '', '', '', 'AAFFT4517L', '', '', '', '', '36AAFFT4517L1ZW', '', '', 'Per Metric Ton', '60', '2018-05-16 08:26:56'),
(66, 'TIRUMALA OIL CHEM INDIA PVT LTD', '', 'SURVEY NO:364,NOMULA VILLAGE, MANCHAL MANDAL, RANGAREDDY DISTRICT,\r\n', ' NOMULA', 'Telangana', '', 'INDIA', '501508', '', '', '', '', '', '', '', '', 'AADCT1345B', '', '', '', '', '36AADCT1345B1ZT', '', '', 'Per Metric Ton', '100', '2018-05-16 08:28:43'),
(67, 'AJANTA SOAP WORKS', '', 'PLOT NO:11/12, RAMTEKDI, INDUSTRIAl AREA HADAPSAR,', 'POONA', 'Maharashtra', '', 'INDIA', '411013', '', '', '', '', '', '', '', '', 'AAHFA2831Q', '', '', '', '', '27AAHFA2831Q1Z5', '', '', 'Per Metric Ton', '100', '2018-05-16 08:30:18'),
(68, 'LIBERTY CHEMICALS INDUSTRIES', '', 'E-37, INDUSTRIAL AREA, OLD\r\n', 'BHATINDA', 'Punjab', '', 'INDIA', '151001', '', '', 'Punjab', '', '', '', '', '', 'AFBPP7044R', '', '', '', '', '03AFBPP7044R1Z2', '', '', 'Per Metric Ton', '100', '2018-05-16 08:31:30'),
(69, 'LIBERTY SABAN UDYOG', '', 'E-34, OLD INDUSTRIAL AREA,\r\n', 'BHATINDA', 'Punjab', '', 'INDIA', '151001', '', '', '', '', '', '', '', '', 'ACNPK2081Q', '', '', '', '', '03ACNPK2081Q1Z8', '', '', 'Per Metric Ton', '100', '2018-05-16 08:32:39'),
(70, 'SHRI RAM OIL TRADERS', '', 'DHAB WASTI RAM\r\n', 'AMRITSAR', 'Punjab', '', 'INDIA', '143001', '', '', '', '', '', '', '', '', 'AAEFS5373E', '', '', '', '', '03AAEFS5373E1ZE', '1201002532', '', 'Percentage', '0.50', '2018-05-16 08:33:42'),
(72, 'R K SOAP FACTORY', '', 'VILLAGE : UPARWARA, BLOCK : ABHANPUR DIST,\r\n', 'RAIPUR', 'Chattisgarh', '', 'INDIA', '492001', '', '', '', '', '', '', '', '', 'ABLPT2998Q', '', '', '', '', '22ABLPT2998Q1ZL', '', '', 'Per Metric Ton', '0', '2018-05-16 08:36:42'),
(73, 'GULSHAN SOAP FACTORY', '', 'VILLAGE : JODHPUR, DIST', 'BHATINDA', 'Punjab', '', 'INDIA', '', '2480, OLD BUS STAND,\r\nNEAR MAHAVEER EYE HOSPITAL,\r\nMEHNA MARG,', 'BHATINDA', '', '', 'INDIA', '151001', '', '', 'AAEPW9242L', '', '', '', '', '03AAEPW9242L2Z9', '', '', 'Per Metric Ton', '100', '2018-05-16 08:38:39'),
(74, 'LAKSHMI OIL & CHEMICALS', '', 'D-3, INDUSTRIAL GROWTH CENTRE, MANSA ROAD,', 'BHATINDA', 'Punjab', '', 'INDIA', '151001', '', '', '', '', '', '', '', '', 'AADPW1029J', '', '', '', '', '03AADPW1029J1ZU', '', '', 'Per Metric Ton', '100', '2018-05-16 08:39:43'),
(75, 'SAVERA SOAP MILL', '', 'PATIALA ROAD,OPP\" ELECT SUBSTATION, OUT SIDE OCTRAI ', ' SUNAM ', '', '', 'INDIA', '148028', '', '', '', '', '', '', '', '', 'AAKFS1608L', '', '', '', '', '03AAKFS1608L1Z7', '', '', '', '0', '2018-05-16 08:40:57'),
(76, 'S & K TRADING CO', '', '39, SWALEY NAGAR, RAMPUR ROAD,', 'BAREILLY', 'Uttar Pradesh', '', 'INDIA', '243502', '', '', '', '', '', '', '', '', 'AGUPG7612E', '', '', '', '', '09AGUPG7612E1Z7', '', '', 'Per Metric Ton', '0', '2018-05-16 08:43:16'),
(77, 'SAGAR SOAPS', '', 'A-7, UDYOG PURAM', 'MEERUT', 'Andaman and Nicobar Islands', '', 'INDIA', '250103', '', '', 'Andaman and Nicobar Islands', '', '', '', '', '', 'ABSFS1299Q', '', '', '', '', '09ABSFS1299Q1ZW', '', '', '', '0', '2018-05-16 08:44:58'),
(78, 'WIPRO ENTERPRISES PRIVATE LIMITED (A)', '', 'SURVEY NO:3903, POST BOX NO:12, TAMBEPURA ROAD, DISTRICT: JALGAON', 'AMALNER', 'Maharashtra', '', 'INDIA', '425401', '', '', 'Maharashtra', '', '', '', '', '', 'AAJCA0072C', '', '', '', '', '27AAJCA0072C1Z5', '0713005408', '', 'Per Metric Ton', '0', '2018-05-16 08:47:11'),
(79, 'WIPRO ENTERPRISES PVT LTD (B)', '', 'PLOT NO:77 EPIP PHASE-1, JHARMAJARI, TAHASIL NALAGAR DISTRICT:SALON', 'BADDI', 'Himachal Pradesh', '', 'INDIA', '174103', '', '', 'Himachal Pradesh', '', '', '', '', '', ' AAJCA0072C', '', '', '', '', '02AAJCA0072C1ZH', '0713005408', '', 'Per Metric Ton', '0', '2018-05-16 08:49:05'),
(80, 'WIPRO ENTERPRISES PVT LIMITED (H)', '', 'PLOT NO:99 TO 104, SECTOR 6A, SIDCUI, IIE', 'HARIDWAR', 'Uttarakhand', '', 'INDIA', '249403', '', '', 'Uttarakhand', '', '', '', '', '', 'AAJCA0072C', '', '', '', '', '05AAJCA0072C2ZA', '0713005408', '', 'Per Metric Ton', '0', '2018-05-16 08:50:46'),
(81, 'ANCHOR HEALTH & BEAUTY CARE PRIVATE LIMITED', '', 'MARATHON NEXTGEN, \"INNOVA\"201,\'C\' WING, OFF GANAPATRAO KADAM MARG, OPP.PENNINSULA\r\nCORPORATE PARK, LOWER PAREL (WEST)\r\n', 'MUMBAI', 'Maharashtra', '', 'INDIA', '400013', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0397079443', '', '', '0', '2018-05-16 08:52:05'),
(82, 'ANCHOR HEALTH & BEAUTY CARE PVT LTD', '', 'PLOT NO:50 TO 53, BHUJ- BHACHU ROAD, VILLAGE PADHAR, TA-BHUJ, \r\nDI-KUTCH.\r\n', 'BHUJ', 'Gujarat', '', 'INDIA', '370105', '', '', '', '', '', '', '', '', 'AAACA4990N', '', '', '7', '', '24AAACA4990N2ZD', '0397079443', '', 'Per Metric Ton', '100', '2018-05-16 08:53:42'),
(83, 'DEEPAK BROKERS', '', '208, NALANDA ENCLAVE,OPP:SUDAMA RESORT, PRITAM NAGAR,1ST SLOPE ELISBRIDGE,', 'AHMEDABAD', 'Gujarat', '', 'INDIA', '380006', '', '', '', '', '', '', '', '', 'AAGHS6585J', '', '', '', '', '24AAGHS6585J1ZL', '', '', '', '0', '2018-05-16 08:55:13'),
(84, 'MEHRAMAT AGRO INDUSTRIES', '', 'SNO:113/2,115/2,1ST FLOOR, ROOM NO: 5,\r\nNSR COMPLEX, NALLAPADU ROAD,\r\nOPP HOUSE BOARD STATUE,\r\n', 'GUNTUR', 'ANDHRA PRADESH', '37', 'INDIA', '522005', '', '', '', '', '', '', '', '', 'ALUPK3073C', '', '', '', '', '37ALUPK3073C2ZX', '', '', '', '0', '2018-05-16 08:57:04'),
(85, 'SHREE SIDDHIVINAYAKA AGRO EXTRACTIONS PVT LTD', '', 'SUVERY NO:74/2, PART D.NO.6-56, VILLAGE: ALLIPUR, MDL:DISTRICT: MEDAK\r\n', 'ZAHEERABAD ', 'Telangana', '', 'INDIA', '502220', '', '', '', '', '', '', '', '', 'AAFCS0362R', '', '', '', '', '36AAFCS0362R1ZW', '', '', 'Per Metric Ton', '0', '2018-05-16 08:58:26'),
(86, 'KHANDA BIO FUELS', '', 'SY NO:101/39/A1 & A2 HOTHI,<B> VILLAGE ZAHEERABAD MANDAL, MEDAK DISTRICT,\r\n', 'ZAHEERABAD', 'Telangana', '', 'INDIA', '502220', '', '', '', '', '', '', '', '', 'AAOFK0465H', '', '', '', '', '36AAOFK0465H1Z6', '', '', 'Per Metric Ton', '100', '2018-05-16 09:00:00'),
(87, 'RAMCHARAN OIL INDUSTRIES', '', 'SURVEY NO: 72-73, KATEDAN INDUSTRIAL ESTATE\r\n', 'HYDERABAD', 'Telangana', '', 'INDIA', '500252', '15-2-449/7,KISHANGUNJ,\r\n', 'HYDERABAD', '', '', '', '500012', '', '', 'AADFR4621B', '', '', '', '', '36AADFR4621B1ZO', '', '', 'Per Metric Ton', '100', '2018-05-16 09:05:39'),
(88, 'SREE RAMA INDUSTRIES', '', 'SY NO.765 766 761/EE, BURGUL, SHADNAGAR, MAHBUBNAGAR DISTRICT\r\n', 'SHADNAGAR', 'Telangana', '', 'INDIA', '509216', '', '', '', '', '', '', '', '', 'ADAFS1979D', '', '', '', '', '36ADAFS1979D1Z1', '', '', 'Per Metric Ton', '100', '2018-05-16 09:06:45'),
(89, 'ADANI WILMAR LIMITED (MANTR)', '', 'TUNGABHADRA POST, MANTRALAYAM MANDAL,KURNOOL DIST,', 'MANTRALAYAM', 'Andhra Pradesh', '', 'INDIA', '518397', '8-2-120/112/88 & 89, \r\nIV FLOOR, ROAD NO:2, \r\n BANJARA HILLS,\r\n\r\n', 'HYDERABAD', 'Telangana', '', 'INDIA', '500033', '', '', 'AABCA8056G', '', '', '', '', '37AABCA8056G1ZO', '', '', 'Per Metric Ton', '50', '2018-05-16 09:09:08'),
(90, 'ADANI WILMAR LTD (KKD)', '', 'SURVEY NO: 268/269 & 287,NEAR  LIGHT HOUSE ', 'KAKINADA ', 'Andhra Pradesh', '', 'INDIA', '533005', '', '', '', '', '', '', '', '', 'AABCA8056G', '', '', '', '', '37AABCA8056G1ZO', '', '', 'Per Metric Ton', '50', '2018-05-16 09:10:57'),
(91, 'ADANI WILMAR LTD (MANGALORE)', '', 'SURVEY NO:5,6 & 7, BAIKAMPADY INDUSTRIAL AREA,', 'MANGALORE', 'Karnataka', '', 'INDIA', '575011', '', '', '', '', '', '', '', '', 'AABCA8056G', '', '', '', '', '29AABCA8056G1ZL', '', '', 'Per Metric Ton', '50', '2018-05-16 09:14:54'),
(92, 'I K OILS', '', '16/65, BASAPURAM  ROAD, KURNOOL DIST,', 'ADONI', 'Andhra Pradesh', '', 'INDIA', '518301', '', '', '', '', '', '', '', '', 'ASQPS7176M', '', '', '7', '', '37ASQPS7176M2ZI', '', '', 'Per Metric Ton', '100', '2018-05-16 09:48:25'),
(93, 'I K EXTRACTIONS', '', '16/65, BASAPURAM ROAD, DISTRICT:KURNOOL,\r\n', 'ADONI', 'Andhra Pradesh', '', 'INDIA', '518301', '', '', '', '', '', '', '', '', 'ABPPS3805H', '', '', '', '', '37ABPPS3805H2Z9', '', '', 'Per Metric Ton', '0', '2018-05-16 09:49:46'),
(94, 'KANPUR EDIBLES PVT LTD', '', '51/58-A, SHAKKARPATTI, (FAC RAINA) DEHAT\r\n', 'KANPUR', 'Uttar Pradesh', '', 'INDIA', '', '', '', '', '', '', '', '', '', 'AABCK2413K', '', '', '', '', '09AABCK2413K1ZN', '', '', '', '0', '2018-05-16 10:51:04'),
(95, 'GENERAL MARKETING COMPANY', '', '10/359-A, PERUMUGAM - FEROKE', 'KOZHIKODE', 'Kerala', '', 'INDIA', '673631', '', '', '', '', '', '', '', '', 'AACFG5882G', '', '', '', '', '32AACFG5882G1ZH', '', '', '', '0', '2018-05-16 10:52:42'),
(96, 'EVERGREEN ENERGY INC', '', 'A-302, APEX COMMRCIAL, CENTER, NEAR YASH PLAZA, VARACHHA ROAD,', 'SURAT', 'Gujarat', '', 'INDIA', '395006', '', '', '', '', '', '', '', '', 'AACFE6528K', '', '', '', '', '24AACFE6528K1ZE', '', '', '', '0', '2018-05-16 10:54:30'),
(97, 'G L AGENCIES', '', '82, THEVMAR PILLIYAR, KOVIL STREET,', 'VIRUDHUNAGAR', 'Tamil Nadu', '', 'INDIA', '626001', '', '', '', '', '', '', '', '', 'ABKPL4285', '', '', '', '', '33ABKPL4285H1ZI', '', '', 'Per Metric Ton', '100', '2018-05-16 10:55:58'),
(99, 'DIVINE OLEO FORMULATIONS (INDIA) LLP', '', 'GALA NO.1462,RANGARA COMPOUND, SURVEY NO.121, NR.ASHOK LEYLAND ANTONY COMMERCIAL VEHICLE, MUMBAI PANVEL ROAD, VILLAGE ADIVALI KIRAWALI,', 'RAIGAD', 'Maharashtra', '', 'INDIA', '410208', '', '', '', '', '', '', '', '', 'AAKFD5354Q', '', '', '', '', '27AAKFD5354Q1ZR', '', '', 'Per Metric Ton', '100', '2018-05-16 10:59:24'),
(100, 'DINESH SALES CORPORATION ', '', 'OFFICE NO.15, PRAFULLA CHS, A.G. PAWAR LANE, NEAR VOLTAS B HOUSE, OPP VARDHAMAN HEIGHTS, BYCULLA (EAST)\r\n', 'MUMBAI', 'Maharashtra', '', 'INDIA', '400027', '', '', '', '', '', '', '', '', 'AACPL5020H', '', '', '', '', '27AACPL5020H1Z2', '', '', 'Per Metric Ton', '100', '2018-05-16 11:00:41'),
(101, 'NEO OIL PRODUCTS', '', '110B, RAMBHAUBHOGLE MARG\r\nGORAPDEV ROAD COTTON GREEN\r\n', 'MUMBAI', 'MAHARASHTRA', '27', 'INDIA', '400033', '', '', '', '', '', '', '', '', 'AAAFN5407G', '', '', '', '', '27AAAFN5407G1ZI', '', '', '', '0', '2018-05-16 11:02:58'),
(102, 'GAJANAN EXTRACTION LIMITED', '', 'POST BOX NO:10, PARALI ROAD,\r\nPARLI-VAIJNATH,\r\nNEAR SINCHAN BHAVAN\r\n', 'PARLI', 'MAHARASHTRA', '27', 'INDIA', '431515', '', '', '', '', '', '', '', '', 'AAACG8493J', '', '', '', '', '27AAACG8493J1Z4', '', '', '', '0', '2018-05-16 11:06:15'),
(103, 'RMR COMMODITIES (R)', '', '18-138, OPP IIFL, MAIN ROAD, DOWALAISWARAM, DIST E.G,', 'RAJAHMUNDRY', 'Andhra Pradesh', '', 'INDIA', '533125', '', '', '', '', '', '', '', '', 'AIQPR6006B', '', '', '', '', '37AIQPR6006B1Z8', '', '', 'Per Metric Ton', '100', '2018-05-16 13:10:38'),
(104, 'VISHAL ENTERPRISES', '', 'SURVEY NO:2399/2A, NEAR MIRAJ PANDHARPUR HIGH WAY,TANANG PHATA,\r\nCITY TANANG, TALUKA, MIRAJ DISTRICT\r\n', ' SANGLI', 'Maharashtra', '', 'INDIA', '416410', '', '', 'Maharashtra', '', '', '', '', '', 'ACCPN1596J', '', '', '', '', '27ACCPN1596J1ZA', '', 'gstfiles/GST Vishal Enterprises-Sangli.jpg', 'Per Metric Ton', '100', '2018-05-16 13:19:23'),
(105, 'LIMAR SKINCARE PRODUCTS', '', 'D NO:XVIII/609, MAIN ROAD,ENGAPUZHA PUDUPPADY P.O\r\n', 'KOZHIKODE', 'Kerala', '', 'INDIA', '673586', '', '', '', '', '', '', '', '', 'ALLPS5499M', '', '', '', '', '32ALLPS5499M1Z6', '', '', 'Percentage', '0.50', '2018-05-16 13:52:55'),
(106, 'JAI BABA INDUSTRIES', '', 'VILLAGE:JARVAYA, TEHSIL, DHAMDHA DIST:DURG\r\n', 'BHILAI', 'Chattisgarh', '', 'INDIA', '490003', '', '', 'Andaman and Nicobar Islands', '', '', '', '', '', 'ABZPC3462E', '', '', '', '', '22ABZPC3462E1ZS', '', '', 'Per Metric Ton', '100', '2018-05-16 13:58:14'),
(107, 'MANAK PETROLUBE (INDIA)', '', 'PLOT NO: 9-F, HIRE HALLI, INDUSTRIAL AREA,', 'TUMKUR ', 'Karnataka', '', 'INDIA', '', '', '', 'Andaman and Nicobar Islands', '', '', '', '', '', 'AASFM1507A', '', '', '', '', '29AASFM1507A1ZG', '', '', '', '0', '2018-05-16 14:03:39'),
(108, ' V S CHEMICALS INDUSTRIES', '', 'B-65, PARSAKHERA INDUSTRIAL AREA,', 'BEREILLY', 'Uttar Pradesh', '', 'INDIA', '243502', '', '', 'Andaman and Nicobar Islands', '', '', '', '', '', 'AAEFV3809Q', '', '', '', '', '09AAEFV3809Q1ZH', '', '', '', '0', '2018-05-16 14:05:58'),
(109, 'ABHAY SOLVENTS PVT LTD', '', 'POST BOX NO:13, HOSPET ROAD,', 'KOPPAL', 'Karnataka', '', 'INDIA', '583231', '', '', '', '', '', '', '', '', 'AACCA1264D', '', '', '', '', '29AACCA1284D1ZY', '', '', 'Per Metric Ton', '100', '2018-05-17 06:24:37'),
(110, 'TGV SRAAC LIMITED', '', 'GONDIPARLA VILLAGE.\r\n', 'KURNOOL', 'Andhra Pradesh', '', 'INDIA', '518003', '40-304, 2ND FLOOR, K.J. COMPLEX,\r\nBHAGYA NAGAR,', 'KURNOOL', 'Andhra Pradesh', '', 'INDIA', '518004', '', '', 'AACCS8581M1', '', '', '', '', '37AACCS8581M1ZM', '0988002884', '', 'Per Metric Ton', '100', '2018-05-17 07:03:03'),
(111, 'TGV SRAAC LIMITED ( C.S LYE DIVISION )', '', 'GODIPARLA VILLAGE:\r\n', 'KURNOOL', 'Andhra Pradesh', '', 'INDIA', '518003', '', '', '', '', '', '', '', '', 'AACCS8581M', '', '', '', '', '37AACCS8581M1ZM', '', '', 'Per Metric Ton', '100', '2018-05-17 07:04:08'),
(112, 'VAIBHAV EDIBLES PVT LTD', '', '24/40, JAIN VIHAR, BIRHANA ROAD,', 'KANPUR', 'Uttar Pradesh', '', 'INDIA', '208001', '', '', 'Andaman and Nicobar Islands', '', '', '', '', '', ' AABCV6380L', '', '', '', '', '09AABCV6380L1ZS', '', '', 'Per Metric Ton', '0', '2018-05-17 07:45:20'),
(113, 'SUNITA UDYOG', '', '111-B, LIGHT INDUSTRIAL AREA, DISTRICT: DURG,', 'BHILAI', 'Chattisgarh', '', 'INDIA', '490026', '', '', 'Chattisgarh', '', '', '', '', '', 'AAQFS2054J', '', '', '', '', '22AAQFS2054J1Z3', '', '', 'Per Metric Ton', '100', '2018-05-17 07:51:47'),
(114, 'ACCORD COMMODITIES SDN BHD', '', 'SUITE NO: 9-15, 9TH FLOOR, WISMA ZELAN NO:1, JALAN TASIK PERMAISURI 2, BANDAR TUN RAZAK,\r\nCHERAS, 56000', 'KUALA LUMPUR', '=', '', 'MALAYSIA', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '2018-05-17 09:00:41'),
(115, 'NORTH EMERALD (M) SDN. BHD', '', 'NO: 10-03-2, LORONG BATU NILAM,4A, BANDAR BUKIT TINGGI 41200 KLANG, ', 'SELANGOR DARUL EHSAN', '', '', 'MALAYSIA', '', '', '', 'Andaman and Nicobar Islands', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '2018-05-17 09:01:47'),
(116, 'OLEOCOMM GLOBAL SDN BHD', '', 'SUITE 3A-01, BLOCK C, PLAZA MONT KIARA, JALAN KIARA 1,50480 \r\n', 'KUALA LUMPUR', '', '', ' MALAYSIA', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '2018-05-17 09:02:46'),
(117, 'OLEOCOMM INTERNATIONAL LIMITED', '', '1203, THE SOVEREIGN, 99 MEYER ROAD,', '', '', '', 'SINGAPORE', '437920', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Per Metric Ton', '0', '2018-05-17 09:04:44'),
(118, 'OLIVIA OLEO PTE LTD ', '', '24 RAFFLES PLACE, # 12-05,', 'CLIFFORD CENTRE', '', '', 'SINGAPORE', '048621', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '2018-05-17 09:05:36'),
(119, 'SARLAX (ASIA) PTE. LTD.', '', '15-2, INTERNATIONAL PLAZA, 10, ', 'ANSON ROAD,', '', '', 'SINGAPORE', '079903', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '2018-05-17 09:07:45'),
(120, 'GEMINI EDIBLE & FATS (INDIA) PVT LIMITED (KKD)', '', 'SURVEY NO:176, 176/2, SURYARAOPET,GP THAMMAVARAM VILLAGE.', 'KAKINADA', 'Andhra Pradesh', '', 'INDIA', '533005', '', '', 'Andhra Pradesh', '', '', '', '', '', 'AADCG5150F', '', '', '', '', '37AADCG5150F1ZT', '', '', 'Per Metric Ton', '75', '2018-05-17 10:01:12'),
(121, 'PRAKASH SOAP INDUSTRIES', '', 'BISAULI ROAD,\r\n', 'BADAUN', 'Uttar Pradesh', '', 'INDIA', '243601', '', '', 'Andaman and Nicobar Islands', '', '', '', '', '', 'ACRPJ2380B', '', '', '', '', '09ACRPJ2380B1ZM', '', '', '', '0', '2018-05-17 10:05:08'),
(122, 'S & V SOAP WORKS', '', '6-A, INDUSTRIAL STATE, CIVIL LINE', 'RAMPUR', 'Uttar Pradesh', '', 'INDIA', '244901', '', '', '=', '', '', '', '', '', 'ADGPV8608Q', '', '', '', '', '09ADGPV8608Q1ZH', '', '', 'Per Metric Ton', '0', '2018-05-17 10:06:53'),
(123, 'KISAN OIL EXPELLER', '', '39, DHEERKHERA\r\nINDUSTRIES AREA,\r\nMEERUT ROAD,\r\n', 'HAPUR', 'Uttar Pradesh', '', 'INDIA', '245101', '', '', 'Uttar Pradesh', '', '', '', '', '', 'ACEPG1341C', '', '', '', '', '09ACEPG1341C1Z9', '', '', '', '0', '2018-05-17 10:08:57'),
(124, 'EMAMI AGRO TECH LIMITED', '', 'ZERO POINT, PANTAPALEM, VILLAGE:MUTHUKUR, DIST:NELLORE\r\n', 'KRISHNAPATNAM', 'Andhra Pradesh', '', 'INDIA', '533001', '687, ANANDAPUR \r\nEM BY PASS\r\n', 'KOLKATA', 'West Bengal', '', 'INDIA', '700107', '', '', 'AABCN7953M', '', '', '', '', '37AABCN7953M1ZU', '', '', 'Per Metric Ton', '100', '2018-05-17 10:12:25'),
(125, 'GAURAV SOAP FACTORY', '', 'GAT NO:263/6, GHONDHALE MALA, NAGAR DEVALE,', 'AHMEDNAGAR', 'Maharashtra', '', 'INDIA', '414002', '', '', 'Maharashtra', '', 'INDIA', '', '', '', 'AIIPG8292L', '', '', '', '', '27AIIPG8292L1ZN', '', '', '', '0', '2018-05-17 10:15:11'),
(126, 'SAI KRIPA OIL TRADERS', '', 'PLOT NO:154/155/1, GANDHINAGAR, CHINCHWAD ROAD,\r\n', 'KOLHAPUR', 'Maharashtra', '', 'INDIA', '416119', '', '', 'Maharashtra', '', 'INDIA', '', '', '', 'ABDPB1565H', '', '', '', '', '27ABDPB1565H1ZZ', '', '', 'Per Metric Ton', '100', '2018-05-17 10:18:15'),
(127, 'DINESH SOAP FACTORY', '', 'PRESS ROAD,', 'BHAVNAGAR', 'Gujarat', '', 'INDIA', '364001', '', '', 'Gujarat', '', '', '', '', '', 'AABFD4632Q', '', '', '', '', '24AABFD4632Q1ZB', 'AABFD4632Q', '', 'Per Metric Ton', '100', '2018-05-17 11:17:21'),
(128, 'AJAY CHEMICALS', '', 'PRESS ROAD, AAGRIYAWAD,', 'BHAVNAGAR ', 'Gujarat', '', 'INDIA', '364001', '', '', 'Gujarat', '', '', '', '', '', 'ACIPB7335H', '', '', '', '', '24ACIPB7335H1ZU', '', '', 'Per Metric Ton', '100', '2018-05-17 11:20:36'),
(129, 'RENOL ENTERPRISES', '', 'KOTHARIYA SURVEY NO:238,\r\nPLOT NO:34, B/H, VIKAS EXPORTS,\r\nGONDAL HIGH WAY,\r\n', 'RAJKOT', 'Gujarat', '', 'INDIA', '360002', '', '', 'Gujarat', '', '', '', '', '', 'AAKFR3494D', '', '', '', '', '24AAKFR3494D1Z5', '', '', '', '0', '2018-05-17 11:22:13'),
(130, 'RIPAL POLYMERS', '', 'KOTHARIYA, SURVEY NO:238,PLOT NO:34, B/H,VIKAS EXPORTS, NEAR M.TECH INDUST GONDAL HIGH WAY,', 'RAJKOT', 'Gujarat', '', 'INDIA', '360002', '', '', 'Gujarat', '', '', '', '', '', 'AAKFR8020K', '', '', '8', '', '24AAKFR8020K1Z2', '', '', 'Per Metric Ton', '200', '2018-05-17 11:23:38'),
(131, 'SWASTIK VEGETABLE OIL PRODUCTS PVT LTD', '', '7-3-141, GAGANPAHAD, RAJENDAR NGAR, RANGAREDDY DIST.', 'HYDERABAD', 'Telangana', '', 'INDIA', '501323', '', '', 'Telangana', '', '', '', '', '', 'AADCS2224G', '', '', '', '', '36AADCS2224G1ZO', '', '', 'Per Metric Ton', '100', '2018-05-18 05:57:52'),
(132, 'KIRAN SABUN UDYOG', '', '77/3, OLD DHAN MANDI\r\n', 'SRIGANGANAGAR', 'Rajasthan', '', 'INDIA', '335001', '', '', 'Rajasthan', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '2018-05-18 05:58:55'),
(133, 'GOPIKA SOAP INDUSTRIES', '', 'PLOT NO:154/155/1, \r\nGANDHINAGAR,\r\nCHINCHWAD ROAD,\r\n', 'KOLHAPUR', 'Maharashtra', '', 'INDIA', '', '', '', 'Maharashtra', '', '', '', '', '', 'ABDPB1622M', '', '', '', '', '27ABDPB1622M1ZY', '', '', '', '0', '2018-05-18 06:05:42'),
(134, 'SHIV SHANKAR SOAP WORKS', '', 'VILLAGE:JARVAYA, TEHSIL, DHAMDHA DIST:DURG\r\n', 'BHILAI', 'Chattisgarh', '', 'INDIA', '490003', '', '', 'Chattisgarh', '', '', '', '', '', 'ACTFS0511M', '', '', '', '', '22ACTFS0511M1ZO', '', '', 'Per Metric Ton', '100', '2018-05-18 06:07:38'),
(135, 'SHIVAGARH SOAP AND CHEMICALS PVT LTD', '', '45, SHIVPURI,NEAR NIRMALA CONVENT SCHOOL,', 'BULANDSHAHAR', 'Uttar Pradesh', '', 'INDIA', '203001', '', '', 'Uttar Pradesh', '', '', '', '', '', 'AANCS7182H', '', '', '', '', '09AANCS7182H1ZQ', '', '', '', '0', '2018-05-18 06:09:23'),
(136, 'SHREE VINAYAK OILS CORPORATION', '', 'N-54, MIDC AREA, NEAR BHARAT PETROLEUM, AJANTHA ROAD,', 'JALGAON ', 'Maharashtra', '', 'INDIA', '425003', '', '', 'Maharashtra', '', '', '', '', '', 'AHMPA4649L', '', '', '', '', '27AHMPA4649L1ZZ', '', '', 'Per Metric Ton', '100', '2018-05-18 06:11:27'),
(137, 'SIDHARTH TRADING CO', '', 'KHSARA NO:276/154, VILLAGE HIRAWALA KANOTA', 'JAIPUR', 'Rajasthan', '', 'INDIA', '303012', '', '', 'Rajasthan', '', '', '', '', '', 'AAIHS0631P', '', '', '', '', '08AAIHS0631P1ZQ', '', '', 'Per Metric Ton', '0', '2018-05-18 06:13:31'),
(138, 'SRI SINGHAL FOAMS PVT LTD', '', 'NASRIGANJ ', 'PATNA ', 'Bihar', '', 'INDIA', '800012', 'OPP.CATHOLIC CHURCH\r\nASHOK RAJ PATH\r\n', 'PATNA ', 'Bihar', '', '', '800004', '', '', 'AAECS5089G', '', '', '', '', '10AAECS5089G1ZG', '', '', '', '0', '2018-05-18 06:15:28'),
(139, 'KRANTI SOAPS PVT LTD', '', 'VILLAGE:GURUWALI\r\nTAR TARAN ROAD,\r\nO/S OCTROI POST.\r\n', 'AMRITSAR', 'Punjab', '', 'INDIA', '143001', '', '', 'Punjab', '', '', '', '', '', 'AACCK8224H', '', '', '', '', '03AACCK8224H1ZS', '', '', '', '0', '2018-05-18 06:17:24'),
(140, 'SHAKTI DETERGENT PVT LTD', '', 'VILLAGE:GURUWALI\r\nTARN TARAN ROAD,\r\n', 'AMRITSAR', 'Punjab', '', 'INDIA', '143001', '', '', 'Punjab', '', '', '', '', '', 'AAJCS6956K', '', '', '', '', '03AAJCS6956K1ZV', '', '', '', '0', '2018-05-18 06:18:47'),
(141, 'DOLSON INTERNATIONAL', '', 'PREMIER HOUSE PLOT NO:38, CENTRAL ROAD, MIDC ANDHERI (EAST),', 'MUMBAI', 'Maharashtra', '', 'INDIA', '400093', '', '', 'Maharashtra', '', '', '', '', '', 'ALRPS7134F', '', '', '', '', '27ALRPS7134F1ZM', '', '', 'Per Metric Ton', '0', '2018-05-18 06:21:19'),
(142, 'PT.ENERGY FEEDS INDONESIA', '', 'GEDUNG DESPRA  LT.6, JL. PAHLAWAN NO.8', 'SEMARANG', '', '', 'INDONESIA', '50132', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '2018-05-18 07:23:26'),
(143, 'KWALITY CHEM PVT LTD', '', '24, MATRIKA MARG, KISHNA KUNJ, ADRASH TOLE\r\n', 'BIRATNAGAR - 9 ', '', '', 'NEPAL', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Per Metric Ton', '0', '2018-05-18 07:52:55'),
(144, 'FAREAST SUCCESS INTERNATIONAL LIMITED ', '', 'NO.620 TIANHE NORTH ROAD, PARC OASIS T, 20/F, ROOM 2004,', 'GUANGZHOU', '', '', 'CHINA', '510630', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '2018-05-18 07:54:53'),
(145, 'SREENIVASA ENTERPRISES', '', '1/227, G8, B.C.C. ROAD, DIST,  ANANTAPUR', 'PAMIDI', 'Andhra Pradesh', '', 'INDIA', '515775', '', '', 'Andhra Pradesh', '', '', '', '', '', 'AAUPN8446P', '', '', '', '', '37AAUPN8446P1ZG', '', '', '', '0', '2018-05-18 08:13:03'),
(146, 'YASH VEGETABLE OILS PVT LTD', '', 'PLOT NO.5A/7, IDA VAKALAPUDI, EAST GODAVARI DIST,', 'KAKINADA ', 'Andhra Pradesh', '', 'INDIA', '533005', '', '', 'Andhra Pradesh', '', '', '', '', '', 'AAACY6999D', '', '', '', '', '37AAACY6999D1ZR', '', '', 'Per Metric Ton', '75', '2018-05-18 08:14:22'),
(147, 'NIDHI AGENCIES', '', 'PLOT NO:13A & 13B,SURVEY NO.261, GAGANPAHAD,RAJENDRA NAGAR, RR DIST,\r\n', 'HYDERABAD', 'Telangana', '', 'INDIA', '501323', '', '', 'Telangana', '', '', '', '', '', 'ABCPB8911E', '', '', '', '', '36ABCPB8911E1Z3', '', '', 'Per Metric Ton', '100', '2018-05-18 09:05:03'),
(148, 'GROVER ASSOCIATES PVT LTD          ', '', 'G-58, MASJID MOTH\r\nGREATER KAILASH-II,', 'NEW DELHI', 'Delhi', '', 'India', '110048', '', '', 'Andaman and Nicobar Islands', '', '', '', '', '', 'AAACG0709M', '', '', '', '', '07AAACG0709M1ZP', '', '', '', '0', '2018-05-18 10:00:21'),
(149, 'FORTUNE BIOTECH LIMITED', '', 'SURVEY NO:803, 804, & 806,\r\nRAIGIRI MANDAL,\r\nNALGONDA DISTRICT,', 'BHONGIR', 'Telangana', '', 'India', '', '6-6-125, ANNAM GARDENS,\r\nKAVADIGUDA,', 'SECUNDRABAD', 'Telangana', '', 'India', '500380', '', '', '', '', '', '', '', '', '', '', '', '0', '2018-05-18 10:03:34'),
(150, 'GIANCHAND & SONS', '', 'KUNJPURA ROAD\r\nNEAR RANDHIR CINEMA\r\n', 'KARNAL', 'Haryana', '', 'INDIA', '132001', '', '', 'Haryana', '', '', '', '', '', 'AACFG0203D', '', '', '', '', '06AACFG0203D1ZD', '', '', '', '0', '2018-05-18 10:07:00'),
(151, 'SAC INDUSTRIES', '', 'BRANCH 180/1,\r\nWALPARAI ROAD,\r\nAVALCHINNAM PALAYAM\r\n', 'POLLACHI ', 'Tamil Nadu', '', 'INDIA', '642123', '', '', 'Tamil Nadu', '', '', '', '', '', 'AACAS3816R', '', '', '', '', '33AACAS3816R1Z4', '', '', '', '0', '2018-05-18 10:09:56'),
(152, 'GRAMODHAYA VANITHA KENDRAM', '', 'SY NO:462/3, NEW INDUSTRIAL, DEVELOPMENT AREA, KANJIKODE,', 'PALAKKAD', 'Kerala', '', 'INDIA', '678621', '', '', 'Kerala', '', '', '', '', '', 'AACAG0697E', '', '', '', '', '32AACAG0697E1ZO', '', '', 'Percentage', '.50', '2018-05-18 10:11:32'),
(153, 'GREEN TRADERS', '', '81, LAXMAN SHAHAY LANE, GURUDAWARA ROAD,', 'GAYA ', 'Bihar', '', 'INDIA', '823001', '', '', 'Bihar', '', '', '', '', '', 'AJZPD6457E', '', '', '', '', '10AJZPD6457E1Z6', '', '', 'Per Metric Ton', '100', '2018-05-18 10:12:53'),
(154, 'OSWAL SOAP FACTORY', '', '200, JHOTWARA, INDUSTRIAL AREA,', 'JAIPUR', 'Rajasthan', '', 'INDIA', '302012', '', '', 'Rajasthan', '', '', '', '', '', 'AAAFO1751G', '', '', '', '', '08AAAFO1751G1ZI', '', '', '', '0', '2018-05-18 10:15:48'),
(155, 'PALMS RESOURCES PTE LTD', '', '101 CECIL STREET 20-09, TONG ENG BUILDING,', 'SINGAPORE ', '', '', 'SINGAPORE ', '069533', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '2018-05-18 10:17:44'),
(156, 'PAN OLEO ENTERPRISES PVT LIMITED', '', '202, QUANTUM TOWERS,\r\nRAMBAUG, S.V.ROAD,\r\nMALAD - WEST,', 'MUMBAI', 'Maharashtra', '', 'INDIA', '400064', '', '', 'Maharashtra', '', '', '', '', '', 'AAECP9927E', '', '', '', '', '27AAECP9927E1Z5', '', '', '', '0', '2018-05-18 10:20:33'),
(157, 'D T PATIL SOAPS & DETERGENTS', '', 'A-23, NEAR BANK OF INDIA, FIVE STAR  M.I.D.C, KAGAL,', 'KOLHAPUR', 'Maharashtra', '', 'INDIA', '416234', '', '', 'Maharashtra', '', '', '', '', '', 'AAEFD6433E', '', '', '', '', '27AAEFD6433E1ZO', '', '', '', '0', '2018-05-18 10:22:58'),
(158, 'NATURAL VANASPATI LIMITED', '', 'SURVEY NO.100 .112 & 113,THIMMAPUR VILLAGE,KOTHUR (M), DIST, MAHABOOBNAGAR,\r\n', 'THIMMAPUR ', 'Telangana', '', 'INDIA', '509325', '', '', 'Telangana', '', '', '', '', '', 'AAACK8362Q', '', '', '', '', '36AAACK8362Q1ZV', '', '', 'Per Metric Ton', '100', '2018-05-18 10:25:48'),
(159, 'LOHIYA INDUSTRIES', '', 'PLOT NO:6-66, SURVEY NO:165, GAGANPAHAD R.R.DIST,', 'HYDERABAD', 'Telangana', '', 'INDIA', '509323', '', '', 'Telangana', '', '', '', '', '', 'AAAFL7645J', '', '', '', '', '36AAAFL7645J1Z2', '', '', 'Per Metric Ton', '70', '2018-05-18 10:27:03'),
(160, 'LUXMI GRAM UDYOG SAMITI', '', 'NILOWAL ROAD,\r\nVILLAGE:CHHAJLA,\r\nTEHSIL-\r\n', 'SUNAM', 'Punjab', '', 'INDIA', '148028', '', '', 'Punjab', '', '', '', '', '', 'AAAAL3140K', '', '', '', '', '03AAAAL3140K1Z1', '', '', '', '0', '2018-05-18 10:28:37'),
(161, 'CROWN INDUSTRIES', '', '188-191, VASANTDADA INDUSTRIAL ESTATE,', 'SANGLI', 'Maharashtra', '', 'INDIA', '416416', '', '', 'Maharashtra', '', '', '', '', '', 'AADFC4829Q', '', '', '', '', '27AADFC4829Q1ZX', '3110024331', '', 'Per Metric Ton', '100', '2018-05-18 10:30:22'),
(162, 'LYKIS SOAPS PRIVATE LIMITED ', '', 'GAT NO.503, A/P. KAVATEPIRAN TAL - MIRAJ, DIST', 'SANGLI ', 'Maharashtra', '', 'INDIA', '416417', '', '', 'Maharashtra', '', '', '', '', '', 'AACCL9172D', '', '', '', '', '27AACCL9172D1ZG', '', '', 'Per Metric Ton', '100', '2018-05-18 10:31:41'),
(163, 'MANGLAM ENTERPRISES', '', '22 RDA COLONY, HEERAPUR TATIBANDH ', 'RAIPUR', 'Chattisgarh', '', 'INDIA', '492001', '', '', 'Chattisgarh', '', '', '', '', '', 'DOAPK8314A', '', '', '', '', '22DOAPK8314A1ZM', '', '', '', '0', '2018-05-18 13:49:54'),
(164, 'KARTIK INDUSTRIES', '', 'VILLAGE:KAKREL, TAH:SOMANI', 'RAJNANDGAON', 'Chattisgarh', '', 'INDIA', '491441', '', '', '', '', '', '', '', '', 'AFFPJ6833E', '', '', '', '', '22AFFPJ6833E1ZS', '', '', '', '0', '2018-05-19 09:46:00'),
(165, 'KTV HEALTH FOOD PVT LTD', '', '7/3, ARUL NAGAR, SALAI KODUNGAIYUR\r\n', 'CHENNAI', 'Tamil Nadu', '', 'INDIA', '600118', '', '', '', '', '', '', '', '', 'AABCK8863F', '', '', '', '', '33AABCK8863F1ZH', '', '', 'Per Metric Ton', '100', '2018-05-19 09:50:15'),
(166, 'ADANI WILMAR LIMITED (KPT)', '', 'NO: 292 & 317, PANTAPALM (EPURU 1B) VILLAGE: MUTHUKURU MANDAL,SRI POTTISRIRAMALU\r\n\r\n', 'NELLORE DIST,', 'Andhra Pradesh', '', 'INDIA', '524323', '', '', '', '', '', '', '', '', 'AABCA8056G', '', '', '', '', '37AABCA8056G1ZO', '', '', 'Per Metric Ton', '50', '2018-05-19 09:52:10'),
(167, 'AL-FAH ASSOCIATES', '', 'MUTTOM, ERNAKULAM DISTRICT,', 'ALUVA ', 'Kerala', '', 'INDIA', '683106', '', '', '', '', '', '', '', '', 'AGVPB5488L', '', '', '', '', '32AGVPB5488L1ZT', '', '', 'Per Metric Ton', '100', '2018-05-19 09:55:01'),
(168, 'ARUN INDUSTRIES', '', 'DOOR NO.7-3-111, GAGANPAHAD, R.R.DIST.\r\n', 'HYDERABAD', 'Tamil Nadu', '', 'INDIA', '500252', '', '', '', '', '', '', '', '', 'ABMPS7166G', '', '', '', '', '36ABMPS7166G1Z3', '', '', '', '0', '2018-05-19 09:57:58'),
(169, 'BHAI GEHLA SINGH JASWANT SINGH', '', 'G.I.-123, PHASE 2ND, MAYA PURI,\r\n\r\n', 'NEW DELHI', 'Delhi', '', 'INDIA', '110064', '', '', '', '', '', '', '', '', 'AAAFB5246P', '', '', '', '', '07AAAFB5246P1Z8', '', '', '', '0', '2018-05-19 10:01:23'),
(170, 'SURINDER SOAP MILLS', '', '7644/1, BIRLA NILES, SUBZI MANDI,\r\n\r\n', 'DELHI', 'Delhi', '', 'INDIA', '110007', '', '', '', '', '', '', '', '', 'AABFS5715R', '', '', '', '', '07AABFS5715R1ZO', '', '', '', '0', '2018-05-19 10:02:44'),
(171, 'BEST CHEM', '', '14-7-343, BEGUM BAZAR,', 'HYDERABAD', 'Telangana', '', 'INDIA', '500012', '', '', '', '', '', '', '', '', 'AALFB1324R', '', '', '', '', '36AALFB1324R2Z4', '', '', 'Per Metric Ton', '100', '2018-05-19 10:51:25'),
(172, 'PURANMAL & COMPANY', '', 'F-73-B, SHANKER MARG, K.C.ROAD, BANI PARK,', 'JAIPUR', 'Rajasthan', '', 'INDIA', '302016', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Per Metric Ton', '0', '2018-05-19 12:21:32'),
(173, 'GUPTA OIL BROKER', '', 'D-27, 2ND FLOOR, CHANDPOLE ANAJ MANDI,', 'JAIPUR', 'Rajasthan', '', 'INDIA', '302001', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '2018-05-19 12:23:42'),
(174, 'KIRTI BROKERS', '', '303, ANAND MANGAL-2,BEHIND OMKAR HOUSE,NEAR STADIUM 5 WAYS,', 'AHMEDABAD', 'Gujarat', '', 'INDIA', '380009', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '2018-05-24 13:37:34'),
(175, 'GODAVARI EDIBLE BRAN OIL LIMITED', '', 'VENKAPALLI, POST:DWARAPUDI, MANDAPETA MANDAL (EAST GODAVARI)\r\n\r\n\r\n', 'DWARAPUDI', 'Andhra Pradesh', '', 'INDIA', '533341', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Per Metric Ton', '0', '2018-05-25 06:55:32'),
(176, 'SWADISHT OILS PVT LTD', '', 'VILL- CHIRAURA, RANIA,', 'KANPUR DEHAT', 'Uttar Pradesh', '', 'INDIA', '', 'REG. OFFECE- PREET VATIKA, G-1, GROUND FLOOR, 3/40, VISHNUPURI', 'KANPUR', 'Uttar Pradesh', '', 'INDIA', '208002', '', '', 'AAECA6774E', '', '', '', '', '09AAECA6774E1ZJ', '', '', '', '0', '2018-05-25 09:42:39'),
(177, 'DHANLAXMI OIL MILL', '', 'NAVAGAM ', 'KAPADVANJ', 'Gujarat', '', 'INDIA', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '2018-05-25 11:27:47'),
(178, 'DIAMOND SOAP & CHEMICALS', '', 'E-5, SAROJINI NAGAR,', 'LUCKNOW', 'Uttar Pradesh', '', 'INDIA', '', '', '', '', '', '', '', '', '', 'ABZPG1794K', '', '', '', '', '09ABZPG1794K1ZS', '', '', '', '0', '2018-05-26 08:26:59'),
(179, 'K L ENTERPRISES', '', 'PLOT NO:44/B, LIGHT INDUSTRIAL AREA,', 'BHILAI', 'Chattisgarh', '', 'INDIA', '490026', '', '', '', '', '', '', '', '', 'AACFK8645H', '', '', '', '', '22AACFK8645H1ZD', '', '', 'Per Metric Ton', '100', '2018-05-30 08:25:40'),
(180, 'KIRTI DALL MILLS LIMITED (N)', '', 'A-1, MIDC, KIRTI CIRCLE, KRUSHNOOR TQ, NAIGAON, DIST:', 'NANDED', 'Maharashtra', '', 'INDIA', '413001', '', '', '', '', '', '', '', '', 'AAACK7418F', '', '', '', '', '27AAACK7418F1ZM', '', '', 'Per Metric Ton', '75', '2018-06-01 11:10:54'),
(181, 'RMR COMMODITIES (H)', '', '27-3/2, L B NAGAR, NEREDMET, MALKAJGIRI,\r\n', 'HYDERABAD', 'Telangana', '', 'INDIA', '500047', '', '', '', '', '', '', '', '', 'AIQPR6006B', '', '', '', '', '36AIQPR6006B1ZA', '', '', 'Per Metric Ton', '100', '2018-06-02 10:20:20'),
(182, 'ECO GREEN FUELS PVT LTD', '', 'E4 9B, KIADB ROAD, 2ND PHASE, PEENYA INDUSTRIAL AREA,', 'BANGALORE', 'Karnataka', '', 'INDIA', '560058', '', '', '', '', '', '', '', '', 'AACCE0963B', '', '', '', '', '29AACCE0963B1ZY', '', '', 'Per Metric Ton', '100', '2018-06-04 10:55:18');
INSERT INTO `tblaccount` (`iAccountId`, `sAccountName`, `sOwnerName`, `sAddress`, `sCity`, `sState`, `sStateCode`, `sCounrty`, `sPincode`, `sOfficeAddress`, `sOfficeCity`, `sOfficeState`, `sOfficeStateCode`, `sOfficeCountry`, `sOfficePincode`, `sOfficePhone`, `sPhone`, `sPANNo`, `sEmail`, `sBankName`, `sAccountNo`, `sIFSCCode`, `sGSTNo`, `sIEC`, `sGstFile`, `sBrokerageType`, `sBrokerageAmount`, `sCreatedTimestamp`) VALUES
(183, 'SRI CHAKRA OILS & EXTRACTION PVT LTD', '', 'SURVEY NO.8-1B, RAJANAGARAM -ANAPARTHI ROAD,EAST GODAVARI DIST,', 'PEERAMACHANDRAPURAM', 'Andhra Pradesh', '', 'INDIA', '533342', '', '', '', '', '', '', '', '', 'AALCS4875K', '', '', '', '', '37AALCS4875K3ZI', '', '', 'Per Metric Ton', '100', '2018-06-11 10:20:25'),
(184, 'OMEX AGRO & FERTILIZERS PVT LIMTED', '', 'GHAT NO:91/2, BUDHODA VILLAGE, TQ, AUSA', 'LATUR', 'Maharashtra', '', 'INDIA', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '2018-06-13 08:28:42'),
(185, 'VIRAT GRAM UDYOG SAMITI', '', 'UGRAHAN ROAD, VILLAGE:CHHAJLA, TEHSIL-\r\n', 'SUNAM', 'Punjab', '', 'INDIA', '148028', '', '', '', '', '', '', '', '', 'AAAAV6734H', '', '', '', '', '03AAAAV6734H1ZK', '', '', '', '0', '2018-06-16 06:28:56'),
(186, 'JOCIL LIMITED', '', 'VILLAGE:DOKIPARRU, MEDIKONDUR MANDAL, DISTRICT:GUNTUR\r\n\r\n\r\n', 'DOKIPARRU', 'Andhra Pradesh', '', 'INDIA', '522438', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '2018-06-19 11:11:19'),
(187, 'ARC INDIA PETROLEUM PRIVATE LIMITED', '', 'SURVEY NO:290/1-3B, KUMARAPURAM VILLAGE, PAYAKARAOPETA MANDAL, DISTRICT,', 'VISAKHAPATNAM', 'Andhra Pradesh', '', 'INDIA', '531127', '', '', '', '', '', '', '', '', 'AAHCA644N', '', '', '', '', '37AAHCA6444N1Z7', '', '', 'Per Metric Ton', '100', '2018-06-21 07:26:54'),
(188, 'VIJAY TRADING COMPANY', '', '27/7-1, DHAB WASTI RAM,', 'AMRITSAR', 'Punjab', '', 'INDIA', '143001', '', '', '', '', '', '', '', '', 'ABBPK5742M', '', '', '', '', '03ABBPK5742M1ZO', '', '', 'Per Metric Ton', '100', '2018-06-23 12:04:59'),
(189, 'SRI AISHWARYA REFINERY PVT LTD', '', 'SY NO: 280/A3,  ANKIREDDY GUDEM (V), CHOUTUPPAL (M), DIST: NALGONDA\r\n', 'CHOUTOPPAL', 'Telangana', '', 'INDIA', '508252', '16-11-1-5/A/A, SALEEM NAGAR, MALAKPET,\r\n', 'HYDERABAD', 'Telangana', '', 'INDIA', '500036', '', '', 'AAPCS5573E', '', '', '', '', '36AAPCS5573E2ZX', '', '', 'Per Metric Ton', '100', '2018-06-25 09:43:04'),
(190, 'KRISHNA SABUN UDYOG', '', 'AT VILLAGE-KAKREL, TAH-SOMNI', 'RAJNANDGAON', 'Chattisgarh', '', 'INDIA', '491441', '', '', '', '', '', '', '', '9329092709', 'ADPPJ5908A', '', '', '', '', '22ADPPJ5908A1ZW', '', '', 'Per Metric Ton', '0', '2018-06-25 10:37:41'),
(191, 'SANTHOSHIMATHA OIL PACKAGING INDUSTRIES ( KPT )', '', 'SY.NO.314/B & 314/C, BESIDE EENADU, OFFICE, CHEMUDUGUNTA (V), VENKATACHALAM (M),\r\n\r\n\r\n', 'NELLORE', 'Andhra Pradesh', '', 'INDIA', '524320', '', '', '', '', '', '', '', '', 'ABAFS0079C', '', '', '', '', '37ABAFS0079C1ZG', '', '', 'Per Metric Ton', '100', '2018-06-27 13:43:11'),
(192, 'SUNITHA OIL AND CHEMICALS', '', 'PLOT NO.16, ALI NAGAR, SY NO.40, UDAMGADDA, MAILARDEVPALLY, RAJENDER NAGAR,', 'HYDERABAD', 'Telangana', '', 'INDIA', '500018', '', '', '', '', '', '', '', '', 'ACAPK8731A', '', '', '', '', '36ACAPK8731A2ZZ', '', '', 'Per Metric Ton', '100', '2018-06-29 08:08:16'),
(193, 'RAMU SOAP MILLS', '', 'CHANDANA ROAD, SAINI SCHOOL,\r\n\r\n', 'KAITHAL', 'Haryana', '', 'INDIA', '136027', '', '', '', '', '', '', '', '', 'AIQPK0388P', '', '', '', '', '06AIQPK0388P2ZH', '', '', '', '0', '2018-07-02 07:56:27'),
(194, 'DEEPAK TRADING COMPANY', 'Narayan Reddy', 'SREE KRUPA MARKET, MALAKPET,', 'HYDERABAD', 'Telangana', '', 'INDIA', '500036', 'SREE KRUPA MARKET, MALAKPET,', 'HYDERABAD', 'Telangana', '', 'INDIA', '500036', '9849028056', '9849028056', 'AABFD3106D', '', '', '', '', '36AABFD3106D1Z6', '', '', '', '0', '2018-07-07 12:35:14'),
(195, 'RAVINDRA OIL AND SOAP MILL', '', 'SEKHA ROAD, MORAWALI PAHI,\r\n\r\n', 'BARNALA', 'Punjab', '', 'INDIA', '148101', '', '', '', '', '', '', '', '', 'ABMPB5896J', '', '', '', '', '03ABMPB5896J1ZD', '', '', '', '0', '2018-07-11 07:05:01'),
(196, 'SAN CHEMICALS', '', 'PLOT NO.47, INDUSTRIAL AREA, WAIDHAN, DIST.', 'SINGRAULI', 'Madhya Pradesh', '', 'INDIA', '486886', '', '', '', '', '', '', '', '', 'ABEFS8831L', '', '', '', '', '23ABEFS8831L1ZU', '', 'gstfiles/GST SAN Chemicals - Singrauli.pdf', 'Per Metric Ton', '100', '2018-07-11 13:53:04'),
(197, 'SRI VENKATARAMA OIL INDUSTRIES PVT LTD', '', 'HUSSENPURAM\r\n', 'SAMALKOT', 'Andhra Pradesh', '', 'INDIA', '533440', '', '', '', '', '', '', '', '', 'AADCS1673D', '', '', '', '', '37AADCS1673D1ZH', '', '', 'Per Metric Ton', '100', '2018-07-12 12:10:19'),
(198, 'HINDUSTAN SOAP FACTORY', '', 'CHANDIGARH ROAD, LAKHNAUR, NEAR KURALI DIST. MOHALI', 'KURALI', 'Punjab', '', 'INDIA', '140103', '', '', '', '', '', '', '', '', 'ARGPP3469F', '', '', '', '', '03ARGPP3469F1ZS', '', '', 'Per Metric Ton', '100', '2018-07-13 12:58:51'),
(199, 'MULTI COMMODITY INTERNATIONAL LTD', '', 'SUITE NO.3526 C/O 8 TEMASEK BOULEVARD#35-03 ', 'SUNTECH TOWER  3', '', '', 'SINGAPORE', '038988', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Per Metric Ton', '0', '2018-07-19 06:59:03'),
(200, 'SHREE MAHAVIR SOAP UDYOG', '', 'A.T. ROAD, ADABARI\r\n', 'GUWAHATI ', 'Assam', '', 'INDIA', '781014', '', '', '', '', '', '', '', '', 'ASMPB2736N', '', '', '', '', '18ASMPB2736N1ZE', '', '', 'Per Metric Ton', '100', '2018-07-21 12:40:18'),
(201, 'G M INDUSTRIES', '', 'ALEMGIRI GANJ,', 'BAREILLY', 'Uttar Pradesh', '', 'INDIA', '', '', '', '', '', '', '', '', '', 'AAFFG3623G', '', '', '', '', '09AAFFG3623G1ZK', '', '', 'Per Metric Ton', '0', '2018-08-02 06:28:06'),
(202, 'ESS ARR SOAP MILLS', '', 'BAJA ROAD,\r\n', 'JAITU', 'Punjab', '', 'INDIA', '151202', '', '', '', '', '', '', '', '', 'AJQPM6988E', '', '', '', '', '03AJQPM6988E1ZP', '', '', 'Per Metric Ton', '100', '2018-08-10 13:47:16'),
(203, 'GREEN COSMETIC', '', '67/376, BODHGAYA DHANAWA OPP PARVATI COLD STORAGE\r\n\r\n', 'GAYA', 'Bihar', '', 'INDIA', '823001', '', '', '', '', '', '', '', '', 'ACPPA4491C', '', '', '', '', '10ACPPA4491C2Z3', '', '', 'Per Metric Ton', '100', '2018-08-11 13:14:17'),
(204, 'MANAK PETROLEUM & CHEMICALS ', '', 'PLOT NO.121, HAROHALLI INDUSTRIAL AREA, 1ST PHASE, KANAKAPURA ROAD,', 'BANGALORE', 'Karnataka', '', 'INDIA', '562112', '', '', '', '', '', '', '', '', 'ABEFM9337R', '', '', '', '', '29ABEFM9337R1Z9', '', '', 'Per Metric Ton', '100', '2018-08-16 12:26:16'),
(205, 'SHRI BALAJI ENTERPRISES', '', 'POST BOX NO.27, BALAJI INDUSTRIAL ESTATE JYOTHI NAGAR,', 'MOODBIDRI', 'Karnataka', '', 'INDIA', '574227', '', '', '', '', '', '', '', '', 'ACEPP2835J', '', '', '', '', '29ACEPP2835J1ZA', '', '', 'Per Metric Ton', '100', '2018-08-23 11:04:52'),
(206, 'ADANI WILMAR LTD (HALDIA)', '', 'DEVHOG HPL LINK ROAD, JI NO:149,', 'HALDIA', 'West Bengal', '', 'INDIA', '721657', '', '', '', '', '', '', '', '', 'AABCA8056G', '', '', '', '', '19AABCA8056G1ZM', '', '', 'Per Metric Ton', '0', '2018-08-25 07:01:47'),
(207, 'HEALTHY HEART FOODS', '', 'SURVEY NO:118, THIMMAPUR VILL KOTHUR MANDAL MAHBOOB NAGAR DISTRICT', 'THIMMAPUR', 'Telangana', '', 'INDIA', '', '', '', '', '', '', '', '', '', 'AAAFL7646M', '', '', '', '', '36AAAFL7646M1ZV', '', '', 'Per Metric Ton', '100', '2018-08-25 11:30:27'),
(208, 'KALEESUWARI REFINERY AND INDUSTRY PVT LTD', '', 'PHASE-III, INDUSTRIAL PARK VAKALAPUDI', 'KAKINADA', 'Andhra Pradesh', '', 'INDIA', '533005', '', '', '', '', '', '', '', '', 'AABCN7337H', '', '', '', '', '37AABCN7337H1ZB', '', '', 'Per Metric Ton', '50', '2018-08-28 13:26:06'),
(209, 'RAJ SOAP & CHEMICAL UDYOG', '', 'CHAWAND KA MAND, RAMGARH ROAD, SAIPURA,', 'JAIPUR', 'Rajasthan', '', 'INDIA', '302027', '', '', '', '', '', '', '', '', 'AARPT0013F', '', '', '', '', '08AARPT0013F1ZS', '', '', 'None', '0', '2018-09-03 12:22:01'),
(210, 'HEERA TRADING COMPANY ', '', '71/117 SUTAR KHANA', 'KANPUR', 'Uttar Pradesh', '', 'INDIA', '', '', '', '', '', '', '', '', '', 'BPQPJ0266P', '', '', '', '', '09BPQPJ0266P1Z5', '', '', 'None', '0', '2018-09-05 11:52:22'),
(211, 'KAMAL ENTERPRISES', '', 'PLOT NO:1A, NR INTERNATIONAL HOTEL, WACO RADIO COMPOUND, NEAR PETROL PUMP\r\n', 'ULHASNAGAR ', 'Maharashtra', '', 'INDIA', '421004', '', '', '', '', '', '', '', '', 'AAOPW4796K', '', '', '', '', '27AAOPW4796K1ZJ', '', '', 'Per Metric Ton', '100', '2018-09-06 11:04:48'),
(212, 'GANAPATI SOAP INDUSTRIES', '', 'SY NO.97, PART II, MALLARDEVPALLY, R.R. DIST,', 'HYDERABAD', 'Telangana', '', 'INDIA', '500018', '', '', '', '', '', '', '', '', 'AEFPK5350G', '', '', '', '', '36AFEPK5350G1ZL', '', '', 'Per Metric Ton', '100', '2018-09-11 07:34:29'),
(214, 'KOGKTV FOOD PRODUCTS INDIA PVT LTD', '', 'C-85, SIPCOT INDUSTRIAL COMPLEX,', 'TUTICORIN', 'Tamil Nadu', '', 'INDIA', '628008', '', '', '', '', '', '', '', '', 'AACCK5451A', '', '', '', '', '33AACCK5451A1Z4', '', '', 'Per Metric Ton', '100', '2018-09-12 12:58:09'),
(215, 'PEE CEE COSMA SOPE LIMITED', '', '51/52, MALANPUR, INDUSTRIAL AREA, DIST: BHIND\r\n\r\n', 'MALANPUR', 'Madhya Pradesh', '', 'INDIA', '477117', '', '', '', '', '', '', '', '', 'AAACP7280L', '', '', '', '', '23AAACP7280L1Z8', '', '', 'Per Metric Ton', '0', '2018-09-15 12:55:20'),
(216, 'PAWAN AGRO INDUSTRIES', '', 'SURVEY NO:136, GAGAN PAHAD, R.R.DISTRICT\r\n\r\n', 'HYDERABAD', 'Telangana', '', 'INDIA', '509323', '', '', '', '', '', '', '', '', 'AACFP3653Q', '', '', '', '', '36AACFP3653Q1ZQ', '', '', 'Per Metric Ton', '100', '2018-09-20 07:14:43'),
(217, 'BHANU AGRO & ALLIED PRODUCTS', '', 'PLOT NO:2, BHAVANIPURAM, AMEENPUR,VILLAGE, PATANCHERU MANDAL\r\n\r\n', 'MADAK DISTRICT', 'Telangana', '', 'INDIA', '502302', '', '', '', '', '', '', '', '', 'BGCPR1127G', '', '', '', '', '36BGCPR1127G1ZM', '', '', 'Per Metric Ton', '100', '2018-09-20 07:19:22'),
(218, 'RITHIKA ENTERPRISES', '', 'PLOT NO.274, MAHBOOB MANSION, MALAKPET', 'HYDERABAD', 'Telangana', '', 'INDIA', '', '', '', '', '', '', '', '', '', 'AHOPD5092J', '', '', '', '', '36AHOPD5092J1ZO', '', '', 'Per Metric Ton', '100', '2018-09-25 06:05:44'),
(219, 'RAMA SOAP INDUSTRIES', '', 'NAWADA ROAD, GANDHI NAGAR, NEAR INDIAN HERBS\r\n', 'SAHARANPUR ', 'Uttar Pradesh', '', 'INDIA', '247001', '', '', '', '', '', '', '', '', 'AGUPS4959C', '', '', '', '', '09AGUPS4959C1ZN', '', '', 'Per Metric Ton', '0', '2018-09-28 05:40:04'),
(220, 'ASIAD PAINTS LIMITED', '', '28TH, K.M.STONE, HOSUR ROAD, BALAGRANAHALLI VILLAGE, ANEKAL TALUKA\r\n', 'BANGALORE', 'Karnataka', '', 'INDIA', '562107', '', '', '', '', '', '', '', '', 'AAACA8676P', '', '', '', '', '29AAACA8676P1ZT', '', '', 'Per Metric Ton', '100', '2018-09-29 12:55:15'),
(221, 'PARAS VANASPATI PVT LTD', '', 'PLOT NO.724,729,736, URLA, INDUSTRIAL AREA,\r\n', 'RAIPUR', 'Chattisgarh', '', 'INDIA', '', '', '', '', '', '', '', '', '', 'AABCP4677J', '', '', '', '', '22AABCP4677J1ZA', '', '', 'Per Metric Ton', '100', '2018-10-04 06:42:08'),
(222, 'SHIVNATH UDYOG', '', 'POST, TEDESARA,\r\n', 'RAJNANDGAON', 'Chattisgarh', '', 'INDIA', '491441', '', '', '', '', '', '', '', '', 'ARLPD8213E', '', '', '', '', '22ARLPD8213E1Z9', '', '', 'Per Metric Ton', '100', '2018-10-04 07:07:34'),
(223, 'BRS REFINERIES', '', '190/1A, 190/E, 190/3,RAMESHWARAM ROAD, ANNARAM VILLAGE, FAROOQNAGAR, MANDAL', 'MAHABUBNAGAR DIST', 'Telangana', '', 'INDIA', '509228', '', '', '', '', '', '', '', '', 'AAPFB4287R', '', '', '', '', '36AAPFB4287R1ZH', '', '', 'Per Metric Ton', '100', '2018-10-06 09:24:18'),
(224, 'GOLDEN CHEMICALS', '', '383, SURKHA CHAWNI,', 'BAREILLY', 'Uttar Pradesh', '', 'INDIA', '', '', '', '', '', '', '', '', '', 'AACFG4876G', '', '', '', '', '09AACFG4876G1Z6', '', '', 'Per Metric Ton', '0', '2018-10-09 09:55:19'),
(225, 'MMR ENTERPRISES', '', '2-366, JALPALLY (VILLAGE), SAROORNAGAR (MANDAL), RANGAREDDY DIST,', 'HYDERABAD', 'Telangana', '', 'INDIA', '500005', '', '', '', '', '', '', '', '', 'APTPR2250P', '', '', '', '', '36APTPR2250P1Z2', '', '', 'Per Metric Ton', '100', '2018-10-10 13:48:27'),
(226, 'NAGINDAS HIRALAL BHAYANI', '', '30/31/, MADHAV DARSHAN COMPLEX, WAGHAWADI RAOD,', 'BHAVNAGAR', 'Gujarat', '', 'INDIA', '364001', '', '', '', '', '', '', '', '', 'AACFN2803L', '', '', '', '', '24AACFN2803L1ZH', '2404000161', '', 'Per Metric Ton', '100', '2018-10-13 08:16:15'),
(227, 'UNITED INDUSTRIES', '', '63/2B. KHUDIRAM BOSE, SARANI\r\n', 'KOLKATA', 'West Bengal', '', 'INDIA', '700037', '', '', '', '', '', '', '', '', 'AEUPK9042G', '', '', '', '', '19AEUPK9042G1ZY', '', '', 'Per Metric Ton', '100', '2018-10-25 06:11:58'),
(228, 'LOHIYA VEG OILS PRIVATE LIMITED ', '', 'UNIT:PLOT NO.3, PHASE-II, IDA, MANKHAL, MAHESHWARAM MANDAL,', 'RANGA REDDY DIST,', 'Telangana', '', 'INDIA', '', '', '', '', '', '', '', '', '', 'AAACL9449D', '', '', '', '', '36AAACL9449D1ZF', '', '', 'Per Metric Ton', '70', '2018-10-26 06:20:16'),
(229, 'KUTIR UDYOG AKHADHYA TEL SABUN ', '', 'A-5 ISHMAILPUR ROAD, INDUSTRIAL ESTATE, NEAR CROSSING', 'KASGANJ', 'Uttar Pradesh', '', 'INDIA', '207123', '', '', '', '', '', '', '', '', 'AABTK0839N', '', '', '', '', '09AABTK0839N1Z8', '', '', 'Per Metric Ton', '0', '2018-10-29 07:46:22'),
(230, 'NAVABHARAT LIMITED', '', '17/474, SRINIVASAPURAM ROAD,UPPALAMETTA, JANGAREDDIGUDEM, WEST GODAVARI DISTRICT,\r\n\r\n\r\n', 'JANGAREDDIGUDEM ', 'Andhra Pradesh', '', 'INDIA', '534447', '8-2-325, ROAD NO.3, BANJARA HILLS', 'HYDERABAD', 'Telangana', '', '', '500034', '', '', 'AABCN8128L', '', '', '', '', '37AABCN8128L1Z3', '0904008240 ', '', 'Per Metric Ton', '75', '2018-10-31 07:29:35'),
(231, 'ARVEE INTERNATIONAL PTE LTD', '', 'ADD ; 10 ANSON ROAD, #27-09 ', 'INTERNATIONAL PLAZA', '', '', 'SINGAPORE', '079903', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Per Metric Ton', '0', '2018-10-31 07:34:36'),
(232, 'GODREJ CONSUMERS PRODUCTS LTD', '', 'U-30, INDUSTRIALL AREA, MALANPUR, DIST, BHIND', 'MALANPUR', 'Madhya Pradesh', '', 'INDIA', '477116', '', '', '', '', '', '', '', '', 'AABCG3365J', '', '', '', '', '23AABCG3365J1ZQ', '', '', 'Per Metric Ton', '0', '2018-10-31 09:02:58'),
(233, 'LIBERTY SOAP INDUSTRIES', '', 'D-22, GROWTH CENTER, MANSA ROAD, ', 'BHATINDA', 'Punjab', '', 'INDIA', '151001', '', '', '', '', '', '', '', '', 'AISPK5790M', '', '', '', '', '03AISPK5790M1ZK', '', '', 'Per Metric Ton', '100', '2018-11-13 09:29:49'),
(234, 'ADANI WILMAR LTD UNIT-II (KPT)', '', 'SURVEY NO.1601, EPURU 1B, PANTAPALEM VILLAGE,MUTHUKUR MANDAL, KRISHNAPATNAM ', 'NELLORE DISTRICT,', 'Andhra Pradesh', '', 'INDIA', '524323', '', '', '', '', '', '', '', '', 'AABCA8056G', '', '', '', '', '37AABCA8056G1ZO', '', '', 'Per Metric Ton', '50', '2018-11-14 09:22:10'),
(235, 'HARGUN AGRO INDUSTRIES PVT LTD (KPT)', '', 'SURVEY NO.2508/AB, SURVEPALLI, BIT-II, KRISHNAPATNAM PORT ROAD, SPSR', 'NELLORE', 'Andhra Pradesh', '', 'INDIA', '524321', '', '', '', '', '', '', '', '', 'AADCH4806P', '', '', '', '', '37AADCH4806P1Z6', '', '', 'Per Metric Ton', '100', '2018-11-19 08:42:16'),
(236, 'BL ENTERPRISES', '', 'E-19, BULANDSHAHAR ROAD, INDUSTRIAL AREA,', 'GHAZIABAD', 'Uttar Pradesh', '', 'INDIA', '201001', '', '', '', '', '', '', '', '', 'AGQPS7548P', '', '', '', '', '09AGQPS7548P1Z1', '', '', 'Per Metric Ton', '0', '2018-11-19 10:11:31'),
(237, 'BHATINDA SOAP & CHEMICAL MILLS', '', 'D-15,16, FOCAL POINT, DABWALI ROAD,', 'BHATINDA', 'Punjab', '', 'INDIA', '151001', '', '', '', '', '', '', '', '', 'AGLPR0854N', '', '', '', '', '03AGLPR0854N1ZO', '', '', 'Per Metric Ton', '0', '2018-11-19 10:12:56'),
(238, 'J K TRADING COMPANY', '', 'SHOP NO.38 GANDHI MARKET', 'BHATINDA', 'Punjab', '', 'INDIA', '151001', '', '', '', '', '', '', '', '', 'CHTPA8177Q', '', '', '', '', '03CHTPA8177Q1ZJ', '', '', 'Per Metric Ton', '0', '2018-11-19 10:19:48'),
(239, 'VENKATESHWARA BIO FULES ', '', 'HOUSE NO.12-1-79, PLOT NO.14, PADMAVATHI COLONY, BANDALGUDA, NAGOLE, UPPAL, ', 'MEDCHAL - MALKAJGIRI,', 'Telangana', '', 'INDIA', '', '', '', '', '', '', '', '', '', 'ABDFM4989Q', '', '', '', '', '36ABDFM4989Q1Z9', '', '', 'Per Metric Ton', '100', '2018-11-20 11:16:35'),
(240, 'KRISHNA ENTERPRISES', '', 'FLAT NO.F1, ROOM NO.01, SRI RAMA TOWERS, SIMHADRINAGAR, VALASAPAKALA,', 'KAKINADA', 'Andhra Pradesh', '', 'INDIA', '533005', 'H.NO.1-6-1/2/6, CHAITANYAPURI,', 'HYDERABAD', 'Telangana', '', 'INDIA', '500060', '24042069', '', 'ADGPP5966D', '', '', '', '', '37AGDPP5966D1Z5', '', '', 'Per Metric Ton', '100', '2018-11-20 11:31:50'),
(241, 'TEJA PETRO CHEM ', '', 'H.NO.1-83, SANGI GUDA, SHAMSHABAD', 'RANGA REDDY', 'Telangana', '', 'INDIA', '501218', '', '', '', '', '', '', '', '', 'AIXPK1126A', '', '', '', '', '36AIXPK1126A1ZH', '', '', 'Per Metric Ton', '100', '2018-11-27 13:11:17'),
(242, 'K R TRADERS', '', 'SY.NO.39, NEAR NITYA FINE CHEMICALS, SAGAR ROAD, KULKULPALLE (V), MADGUL (M), \r\n\r\n', 'MAHABOOBNAGAR DIST,', 'Telangana', '', 'INDIA', '509327', '', '', '', '', '', '', '', '', 'APDPA5135Q', '', '', '', '', '36APDPA5135Q1ZR', '', '', 'Per Metric Ton', '100', '2018-11-28 12:40:43'),
(243, 'MAHALAXMI INDUSTRIES', '', 'PLOT NO.218 K I A D B INDUTRIAL AREA, VIA SANATHANARASAPURA', 'TUMKUR', 'Karnataka', '', 'INDIA', '572128', '', '', '', '', '', '', '', '', 'AIFPJ6426Q', '', '', '', '', '29AIFPJ6426Q1ZL', '', '', 'Per Metric Ton', '100', '2018-11-30 07:56:05'),
(244, 'MRJ\'S CROWN INDUSTRIES PVT LTD', '', 'GAT NO.503/AP KAVATHEPIRAN TAL.MIRAJ DIST,', 'SANGLI', 'Maharashtra', '', 'INDIA', '416417', '', '', '', '', '', '', '', '', 'AACCL9172D', '', '', '', '', '27AACCL9172D1ZG', 'AACCL9172D', '', 'Per Metric Ton', '100', '2018-11-30 09:58:48'),
(246, 'SURI SOAP INDUSTRIES', '', 'IND STATE, NANDINI ROAD, ', 'BHILAI', 'Chandigarh', '', 'INDIA', '490026', '', '', '', '', '', '', '', '', 'ACIFS3567N', '', '', '', '', '22ACIFS3567N1ZN', '', '', 'Per Metric Ton', '100', '2018-12-04 09:40:24'),
(247, 'PANKAJ SOAP INDUSTRIES', '', 'SILVER- ESTATE, VERKA MAJITHA, BY PASS,', 'AMRITSAR', 'Punjab', '', 'INDIA', '143001', '', '', '', '', '', '', '', '', 'AAEFP8913B', '', '', '', '', '03AAEFP8913B1ZN', 'AAEFP8913B', '', 'Per Metric Ton', '0', '2018-12-05 08:41:38'),
(248, 'BINJUSARIA PAPERS PVT LTD', '', 'SURVEY NO.27 TO 32 & 87, CHINNA ELIKICHERLA (VIL),KONDURG (MDL), SHADNAGAR', 'MAHABOOBNAGAR DISTRICT,', 'Telangana', '', 'INDIA', '509207', '', '', '', '', '', '', '', '', 'AAGCB7545N', '', '', '', '', '36AAGCB7545N1Z5', '', '', 'Per Metric Ton', '0', '2018-12-08 11:16:22'),
(249, 'GAURAV LUBRICANTS INDUSTRIES PRIVATE LIMITED ', '', 'SURVEY NO.15, BALABADRAPURAM VILLAGE, BIKAVOLU', 'EAST GODAVARI DIST,', 'Andhra Pradesh', '', 'INDIA', '533343', '', '', '', '', '', '', '', '', 'AAFCG7515C', '', '', '', '', '37AAFCG7515C2ZR', '', '', 'Per Metric Ton', '100', '2018-12-11 07:22:20'),
(250, 'SHARDA INDUSTRIES', '', 'D-22, M.I.D.C.,', 'AMRAVATI', 'Maharashtra', '', 'INDIA', '444607', '', '', '', '', '', '', '', '', 'AAAHM8509W', '', '', '', '', '27AAAHM8509E1ZA', '', '', 'Per Metric Ton', '100', '2018-12-11 13:31:32'),
(251, 'MANTORA OIL PRODUCTS PRIVATE LIMITED ', '', 'RANIA, DEHAT ', 'KANPUR', 'Uttar Pradesh', '', 'INDIA', '209304', '', '', '', '', '', '', '', '', 'AABCM8155E', '', '', '', '', '09AABCM8155E1ZF', '', '', 'Per Metric Ton', '0', '2018-12-12 10:41:36'),
(252, 'OM SAI INDUSTRIES', '', 'H.T.BAFNA COMPOUND,NEAR JEEVAN JYOT EYE HOSPITAL, PALGHAR (EAST), \r\n', 'DIST PALGHAR,', 'Maharashtra', '', 'INDIA', '401404', '', '', '', '', '', '', '', '', 'AAIPB7296H', '', '', '', '', '27AAIPB7296H1ZG', '', '', 'Per Metric Ton', '100', '2018-12-15 09:23:37'),
(253, 'AMAN ENTERPRISES', '', '3903, STREET NO.1, DURGAPURI HAIBOWAL KALAN,', 'LUDHIANA', 'Punjab', '', 'INDIA', '141001', '', '', '', '', '', '', '', '', 'DRAPS0905Q', '', '', '', '', '03DRAPS0905Q1ZM', '', '', 'Per Metric Ton', '100', '2018-12-17 12:42:41'),
(254, 'HEMANK SOAP & CHEMICALS PVT LTD', '', 'G-144, HEERAWALA INDUSTRIAL AREA, BASSI, KANOTA.', 'JAIPUR', 'Rajasthan', '', 'INDIA', '303012', '', '', '', '', '', '', '', '', 'AAACH5935J', '', '', '', '', '08AAACH5935J1ZE', '1306005990', '', 'Per Metric Ton', '100', '2018-12-21 10:50:02'),
(255, 'SIDDHARTH GRAMUDYOG SANSTHAN', '', 'GRAM KAITHAL GATE ', 'CHANDAUSI', 'Uttar Pradesh', '', 'INDIA', '244412', '', '', '', '', '', '', '', '', 'AAEAS5754L', '', '', '', '', '09AAEAS5745L1ZW', '', '', 'Per Metric Ton', '0', '2018-12-26 12:37:29'),
(256, 'HARI KAMAL SOAP INDUSTRIES', '', 'BUDAUN UJHANI ROAD, NAUSHERA\r\n\r\n', 'BADAUN', 'Uttar Pradesh', '', 'INDIA', '243601', '', '', '', '', '', '', '', '', 'AJCPV5133C', '', '', '', '', '09AJCPV5133C1ZB', '', '', 'Per Metric Ton', '0', '2019-01-02 13:06:23'),
(257, 'BANSAL SOAP PRODUCTS', '', 'E-38, INDUSTRIAL AREA,', 'BHATINDA', 'Punjab', '', 'INDIA', '151001', '', '', '', '', '', '', '', '', 'ABGPB7551C', '', '', '', '', '03ABGPB7551C1ZA', '', '', 'Percentage', '.50', '2019-01-04 11:03:17'),
(258, 'NEW STAR ENTERPRISES', '', '28-3-448, ARAVINDA NAGAR, MYPADU ROAD, ', 'NELLORE', 'Andhra Pradesh', '', 'INDIA', '524002', '', '', '', '', '', '', '', '', 'AALFN0637P', '', '', '', '', '37AALFN0637P1ZP', '', '', 'Per Metric Ton', '100', '2019-01-07 10:41:23'),
(259, 'SHREE RAM SOAP AND DETERGENTS', '', 'NEW HANSI ROAD, NEAR HSIIDC,', 'JIND', 'Haryana', '', 'INDIA', '126102', '', '', '', '', '', '', '', '', 'AFKPK3398A', '', '', '', '', '06AFKPK3398A1ZI', 'AFKPK3398A', '', 'Per Metric Ton', '100', '2019-01-07 12:43:34'),
(260, 'CHEMFINE', '', 'SURVEY NO.55 AND 64/2, CHENDURTHI, GOLLAPROLU, ', 'EAST GODAVARI,', 'Andhra Pradesh', '', 'INDIA', '533449', '', '', '', '', '', '', '', '', 'ADZPS6314H', '', '', '', '', '37ADZPS6314H1ZU', '', '', 'Per Metric Ton', '0', '2019-01-08 11:33:12'),
(261, 'SHANKAR SOAP WORKS', '', 'VILLAGE:UPARAWARA, BLOCK - ABHANPUR. DIST,\r\n\r\n', 'RAIPUR', 'Chattisgarh', '', 'INDIA', '492001', '', '', '', '', '', '', '', '', 'ABLPT2997B', '', '', '', '', '22ABLPT2997B1ZH', '', '', 'Per Metric Ton', '0', '2019-01-09 10:33:51'),
(262, 'BENGANI FOOD PRODUCTS PRIVATE LIMITED ', '', '46C, JAWAHAR LAL NEHRU ROAD, EVEREST HOUSE, 13TH FLOOR, FLAT NO.13B,', 'KOLKATA', 'West Bengal', '', 'INDIA', '700071', '', '', '', '', '', '', '', '', 'AABCB2682F', '', '', '', '', '19AABCB2682F1ZR', '', '', 'Per Metric Ton', '100', '2019-01-18 10:28:29'),
(263, 'NIDISA ENTERPRISES', '', 'PLOT NO:11/12, RAMTEKDI, INDUSTRIAL AREA, HADAPSAR\r\n', 'POONA', 'Maharashtra', '', 'INDIA', '411013', '', '', '', '', '', '', '', '', 'AHMPM7578G', '', '', '', '', '27AHMPM7578G1ZO', 'AHMPM7578G', '', 'Per Metric Ton', '100', '2019-01-19 11:48:38'),
(264, 'RAJINDER KUMAR & SONS', '', 'HAMBRAN - MULLANPUR ROAD,', 'LUDHIANA', 'Maharashtra', '', 'INDIA', '141001', '', '', '', '', '', '', '', '', 'ALMPM2504L', '', '', '', '', '03ALMPM2504L2Z5', '', '', 'Per Metric Ton', '0', '2019-01-19 12:04:14'),
(265, 'OM GRAMODHYOG SEWA SANSTHAN', '', 'DHEERKHERA INDUSTRIAL AREA, HAPUR MEERUT ROAD, 4TH KM STONE NEAR ', 'HAPUR', 'Uttar Pradesh', '', 'INDIA', '245101', '', '', '', '', '', '', '', '', 'AAAAO0384N', '', '', '', '', '09AAAAO0384N1Z8', '', '', 'Per Metric Ton', '0', '2019-01-23 13:01:04'),
(266, 'BHOLENATH TRADING COMPANY', '', '1ST FLOOR, H.NO.15-9-36, MAHABOOBGUNJ,', 'HYDERABAD ', 'Telangana', '', 'INDIA', '0', '', '', '', '', '', '', '', '', 'AKKPT8462H', '', '', '', '', '36AKKPT8462H1ZI', '', '', 'Per Metric Ton', '100', '2019-01-25 09:34:32'),
(267, 'SHRI GANESH TRADERS', '', 'SHOP NO.C51, MARKET YARD,', 'SHOLAPUR', 'Maharashtra', '', 'INDIA', '0', '', '', '', '', '', '', '', '', 'AAIPZ4302Q', '', '', '', '', '27AAIPZ4302Q1ZO', '', '', 'Per Metric Ton', '0', '2019-01-25 09:36:20'),
(268, 'ASHOKA INDUSTRIES', '', 'A-6, TRIUPATI GARDEN BASSI, INDUSTRIAL AREA, AGRA ROAD,\r\n', 'JAIPUR', 'Rajasthan', '', 'INDIA', '303301', '', '', '', '', '', '', '', '', 'AAEHA9023P', '', '', '', '', '08AAEHA9023P1ZO', '', '', 'Per Metric Ton', '0', '2019-01-25 10:12:46'),
(269, 'ADANI WILMAR LTD (MUNDRA)', '', 'SURVEY NO:169, PLOT NO:P1,P2,P3, ADANI PORT ROAD, VILLAGE : DHRUB, TALUKA : MUNDRA, DIST:KUTCH,\r\n\r\n', 'MUNDRA', 'Gujarat', '', 'INDIA', '370421', '', '', '', '', '', '', '', '', 'AABCA8056G', '', '', '', '', '24AABCA8056G1ZV', '', '', 'Per Metric Ton', '75', '2019-01-28 13:01:09'),
(270, 'MODERN SOAP FACTORY', '', 'MIRAJ PANDARPUR ROAD, TANANG PHATA, A/P MALGAON TALUKA MIRAJ , DISTRICT', 'SANGLI', 'Maharashtra', '', 'INDIA', '416410', '', '', '', '', '', '', '', '', 'ADEPN3583G', '', '', '', '', '27ADEPN3583G1ZE', '', '', 'Per Metric Ton', '100', '2019-02-01 07:36:26'),
(271, 'PANCHRATNA DETERGENTS', '', 'MIRAJ PANDARPUR ROAD,TANANG PHATA, A/P MALGAON TALUKA MIRAJ , DISTRICT', 'SANGLI ', 'Maharashtra', '', 'INDIA', '416410', '', '', '', '', '', '', '', '', 'AZHPN0986A', '', '', '', '', '27AZHPN0986A1ZD', '', '', 'Per Metric Ton', '100', '2019-02-01 07:38:14'),
(272, 'SHRI DURGA SILICATE WORKS', '', 'GOW SHALA ROAD,', 'HATHRAS', 'Uttar Pradesh', '', 'INDIA', '204101', '', '', '', '', '', '', '', '', 'ABCPA2361D', '', '', '', '', '09ABCPA2361D1ZB', '', '', 'Per Metric Ton', '0', '2019-02-11 08:05:35'),
(273, 'N K PROTEINS PVT LTD', '', 'PLOT NO.880, KADI THOR ROAD,DISTRICT:MEHSANA\r\n', 'THOR', 'Gujarat', '', 'INDIA', '', '', '', '', '', '', '', '', '', 'AAACN9377N', '', '', '', '', '24AAACN9377N1ZU', '', '', 'Per Metric Ton', '0', '2019-02-20 11:10:57'),
(274, 'ACCORD HEALTH & BEAUTY PRODUCTS SDN BHD', '', 'SUITE NO.9-15, 9TH FLOOR,WISMA ZELAN NO.1, JALAN TASIK PERMAISURI 2, BANDAR TUN RAZAK, HERAS,56000 ', 'KUALA LUMPUR, ', '', '', 'MALAYSIA', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Per Metric Ton', '0', '2019-02-21 07:35:16'),
(275, 'VISHESH EXIM (INDIA) PVT LTD', '', '303, ANUKOOL CHSL, MANISH PARK, PUMP HOUSE, ANDHERI (E)\r\n\r\n\r\n', 'MUMBAI', 'Maharashtra', '', 'INDIA', '400093', 'ROOM NO.15, 2ND FLOOR,PURSHOTTAM BHAVAN, 1/3 ISSAJI STREET,VADGADI, MASJID BUNDER (W)', '', 'Maharashtra', '', 'INDIA', '400003', '', '', 'AACCV9273H', '', '', '', '', '27AACCV9273H1ZW', '', '', 'Per Metric Ton', '100', '2019-02-22 07:18:04'),
(276, 'VISHAL OLEOCHEM ', '', 'VISHAL KUNJ, MANOR ROAD, GHOLVIRA, PALGHAR (E), DIST, THANE', 'PALGHAR', 'Maharashtra', '', 'INDIA', '401404', '', '', '', '', '', '', '', '', 'AADFV0441M', '', '', '', '', '27AADFV0441M1Z2', '', '', 'Per Metric Ton', '100', '2019-02-22 10:33:13'),
(277, 'UNION AGRO', 'UNION AGRO', '201, 1ST FLOOR, S.P. TOWER, SABSE NAGAR', 'RAJNANDGAON', 'Chattisgarh', '', 'INDIA', '491557', '201, 1ST FLOOR, S.P. TOWER, SABSE NAGAR, RAJNANDGAON CG', '', '', '', '', '', '', '', 'AFRPT7896M', 'vinod_vpnl@yahoo.co.in', 'AXIS BANK LTD', '916020008797838', 'UTIB0000521', '22AFRPT7896M1Z8', '', '', 'Per Metric Ton', '100', '2019-03-01 07:36:49'),
(278, 'R K ENTERPRISES', '', '100, CHOWK TILAK BAZAR', 'DELHI', '', '', 'INDIA', '110006', '', '', '', '', '', '', '', '', 'AADPA2911R', 'rk@rkentp.in', 'STATE BANK OF INDIA', '62247626865', 'SBIN0005714', '07AADPA2911R2ZQ', '', '', 'Per Metric Ton', '100', '2019-03-16 12:59:53'),
(279, 'LOKESH OIL MILL ', '', 'PLOT NO.55, ROAD, NO.12, I.D.A KATTEDAN, ', 'HYDERABAD', 'Telangana', '', 'INDIA', '500077', '', '', '', '', '', '', '', '', 'AKFPK8441E', '', '', '', '', '36AKFPK8441E1Z7', '', '', 'Per Metric Ton', '100', '2019-03-18 09:05:35'),
(280, 'EMITA LIMITED', '', '502-503, 5TH FLOOR, GOLDEN CHAMBER, NEW LINK ROAD, ANDHERI WEST MUMBAI', 'MUMBAI SUBURBAN', 'Maharashtra', '', 'INDIA', '400053', '', '', '', '', '', '', '', '', 'AAGCT5839F', '', '', '', '', '27AAGCT5839F1Z2', 'AAGCT5839F', '', 'Per Metric Ton', '100', '2019-03-20 05:49:23'),
(281, 'MEERA OIL COMPANY', '', 'SURVEY NO.136, GAGAN PAHAD, R.R. DISTRICT,', 'HYDERABAD', 'Telangana', '', 'INDIA', '500077', '', '', '', '', '', '', '', '', 'AAYPA8993L', '', '', '', '', '36AAYPA8993L1ZN', 'AAYPA8993L', '', 'Per Metric Ton', '100', '2019-03-22 11:33:50'),
(282, 'GREENSHIFT BIOFUELS PVT LTD', '', 'PLOT NO.546, SOMPURA 2ND STAGE NELAMANGALA TALUKA,', 'BANGALORE', 'Karnataka', '', 'INDIA', '562132', '', '', '', '', '', '', '', '', 'AAHCG5521A', '', '', '', '', '29AAHCG5521A1ZX', '', '', 'Per Metric Ton', '100', '2019-03-26 13:53:06'),
(283, 'SAIBINI INORGANIC', '', '88/A, HONGA INDUSTRIAL ESTATE, HONGA,', 'BELGAUM', 'Karnataka', '', 'INDIA', '591113', '', '', '', '', '', '', '', '', 'ABSFS7230F', '', '', '', '', '29ABSFS7230F1ZQ', '', '', 'Per Metric Ton', '100', '2019-03-27 08:49:21'),
(284, 'TIWANA OIL MILLS PVT LTD', '', 'VILL:KHARORI, SIRHIND PATIALA ROAD, DIST-FATEHGARH', 'SAHIB', 'Punjab', '', 'INDIA', '140406', '', '', '', '', '', '', '', '', 'AACCT9719Q', '', '', '', '', '03AACCT9719Q1ZQ', '', '', 'Per Metric Ton', '100', '2019-04-12 11:19:40'),
(285, 'ELITE NATURAL OILS & FUELS PVT LTD', '', 'SURVEY NO.55 AND 64/2, CHENDURTHI, GOLLAPROLU, , ,', 'EAST GODAVARI DISTRICT,', 'Andhra Pradesh', '', 'INDIA', '533449', '', '', '', '', '', '', '', '', 'AADCE8812C', '', '', '', '', '37AADCE8812C1ZU', '', '', 'Per Metric Ton', '0', '2019-04-15 08:21:52'),
(286, 'A&M IMPEX', '', 'BUNGLOW # 8-1-402/114, GULSHAN COLONY,', 'HYDERABAD', 'Telangana', '', 'INDIA', '500008', '', '', '', '', '', '', '', '', 'AAYFA3894Q', '', '', '', '', '36AAYFA3894Q2Z7', '', '', 'Per Metric Ton', '100', '2019-04-20 13:01:25'),
(287, 'LAXMI DURGA SOAP & CHEMICALS', '', 'SIDDHARTH NAGAR,', 'HATHRAS', 'Uttar Pradesh', '', 'INDIA', '204101', '', '', '', '', '', '', '', '', 'ABNPG8225B', '', '', '', '', '09ABNPG8225B1ZR', '', '', 'Per Metric Ton', '0', '2019-05-01 09:01:09'),
(288, 'SRI HIRA OIL MILLS', '', '16/65, BASSAPURAM ROAD, KURNOOL DIST,', 'ADONI', 'Andhra Pradesh', '', 'INDIA', '518301', '', '', '', '', '', '', '', '', 'AACHK1016Q', '', '', '', '', '37AACHK1016Q2Z3', '', '', 'Per Metric Ton', '100', '2019-05-02 13:47:08'),
(289, 'PEE CEE COSMA SOPE LIMITED.,', '', '7TH K.M, STONE, VILLAGE ADALPUR, POST TORDANYAL,', 'DHOLPUR', 'Rajasthan', '', 'INDIA', '328001', '', '', '', '', '', '', '', '', 'AAACP7280L', '', '', '', '', '08AAACP7280L1ZO', '', '', 'Per Metric Ton', '0', '2019-05-09 14:08:35'),
(290, 'RAJDHANI TRADING CO ', '', 'SHOP NO.18/1, 2ND FLOOR, GOKUL ROAD, ', 'LUDHIANA', 'Punjab', '', 'INDIA', '141001', '', '', '', '', '', '', '', '', 'AATFR3855P', '', '', '', '', '03AATFR3855P1ZE', '', '', 'Per Metric Ton', '0', '2019-05-14 12:33:40'),
(291, 'KRISHNA ANTIOXIDANTS PVT LTD', '', 'UNIT NO:2, PLOT NO:B 23/24, MIDC LOTE PARSHURAM VILLAGE:AWASHI,\r\n', 'TALUKA KHED', 'Maharashtra', '', 'INDIA', '415722', '', '', '', '', '', '', '', '', 'AAACK1793M', '', '', '', '', '27AAACK1793M1Z5', '', '', 'Per Metric Ton', '100', '2019-05-15 06:36:29'),
(292, 'PT. SAWITAMA MAKMUR INDONESIA', '', 'JT. DANAU SUNTER SELATAN KOMPLEK RUKO ROYAL SUNTER BLOK F/7 2ND FLOOR ', 'JAKARTA UTARA ', '', '', 'INDONESIA', '14350', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Per Metric Ton', '0', '2019-05-24 11:13:27'),
(293, 'SSD SOAP INDUSTRIES', '', 'VILLAGE: UPARWARA, BLOCK-ABHANPUR, DIST,', 'RAIPUR', 'Chandigarh', '', 'INDIA', '492001', '', '', '', '', '', '', '', '', 'ABLPT2929D', '', '', '', '', '22ABLPT2929D1ZP', '', '', 'Per Metric Ton', '100', '2019-05-27 08:51:22'),
(294, 'BALAJI OIL INDUSTRIES PVT LTD', '', '39 IIND MAIN ROAD, SIPCO INDUSTRIAL COMPLEX,', 'RANIPET', 'Tamil Nadu', '', 'INDIA', '632403', '', '', '', '', '', '', '', '', 'AAACB2534K', '', '', '', '', '33AAACB2534K1ZO', '', '', 'Per Metric Ton', '100', '2019-05-28 09:29:02'),
(295, 'SUHAIL TRADING CO', '', '', 'HYDERABAD ', 'Telangana', '', 'INDIA', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Per Metric Ton', '0', '2019-06-01 07:23:32'),
(296, 'R P EDIBLE OILS PVT LTD', '', 'PLOT NO:815,816, & 189, VILLAGE:CHIRAURA, RANIA KANPUR-DEHAT\r\n', 'KANPUR', 'Uttar Pradesh', '', 'INDIA', '209304', '', '', '', '', '', '', '', '', 'AAECS4337H', '', '', '', '', '09AAECS4337H1Z8', '', '', 'Per Metric Ton', '0', '2019-06-11 12:12:00'),
(297, 'PEE CEE COSMA SOPE LTD', '', '655, VILLAGE ARTONI,', 'AGRA', 'Uttar Pradesh', '', 'INDIA', '282007', '', '', '', '', '', '', '', '', 'AAACP7280L', '', '', '', '', '09AAACP7280L2ZX', '', '', 'Per Metric Ton', '0', '2019-06-12 10:48:44'),
(298, 'SHAMBHAVI COMMERCIAL CORPORATION', '', 'SHOP NO.87, NEW GURANCHA BAZAR, BHAJI PALA BAZAR,', 'JALGAON', 'Maharashtra', '', 'INDIA', '425003', '', '', '', '', '', '', '', '', 'ASTPA2235N', '', '', '', '', '27ASTPA2235N1ZF', '', '', 'Per Metric Ton', '100', '2019-06-14 06:27:56'),
(299, 'SWASTIK SOAP INDUSTRIES', '', 'NA, OPP. AMBUJA MALL, BALODA BAZAR ROAD,  SADDU', 'RAIPUR', 'Chattisgarh', '', 'INDIA', '492001', '', '', '', '', '', '', '', '', 'AKGPK0645K', '', '', '', '', '22AKGPK0645K1ZC', '', '', 'Per Metric Ton', '0', '2019-06-20 08:15:34'),
(300, 'PRATHAM AGRO VET INDUSTRIES', '', 'SURVEY NO.193P, AT.POST. INDRAD, TA. KADI, DISTRICT, MEHSANA,', 'KADI', 'Gujarat', '', 'INDIA', '382715', '', '', '', '', '', '', '', '', 'AAHFP0758M', '', '', '', '', '24AAHFP0758M1ZY', '', '', 'Per Metric Ton', '100', '2019-06-24 10:16:57'),
(301, 'AQSA TRADERS', '', '1, NEAR DR. ABUL HASAN, BAZAR MADHODASS, SIKANDRABAD', 'BULANDSHAHAR', 'Uttar Pradesh', '', 'INDIA', '203205', '', '', '', '', '', '', '', '', 'ABBPY3033D', '', '', '', '', '09ABBPY3033D1ZT', '', '', 'Per Metric Ton', '100', '2019-06-28 10:27:50'),
(302, 'SR BRAHMMAS AGRO PRODUCTS PVT LTD', '', 'VILLAGE:UPPUGAL, ZAFFARGADH MANDAL, DISTRICT,', 'JANGAON', 'Telangana', '', 'INDIA', '506143', '', '', '', '', '', '', '', '', 'AAVCS6599L', '', '', '', '', '36AAVCS6599L1Z1', '', '', 'Per Metric Ton', '100', '2019-07-02 10:13:25'),
(303, 'VIJAY KUMAR AJAY KUMAR', '', 'UNIT NO.106, AGGARWAL CITY SQUARE, PLOT NO.10, DIST. CENTRE, MANGLAM PLACE, SECTOR-3, ROHINI,', 'DELHI', 'Delhi', '', 'INDIA', '110085', '', '', '', '', '', '', '', '', 'AAOPJ5700C', '', '', '', '', '07AAOPJ5700C1Z1', '3315007101', '', 'Per Metric Ton', '100', '2019-07-12 08:21:45'),
(304, 'GEETA SOAP FACTORY', '', 'NEW AUTO MARKET,  NEAR RAILWAY PHATAK,\r\n', 'SIRSA', 'Haryana', '', 'INDIA', '125055', '', '', '', '', '', '', '', '', 'ACPPR2746B', '', '', '', '', '06ACPPR2746B1ZK', '', '', 'Per Metric Ton', '0', '2019-07-16 06:39:43'),
(305, 'MASUMI ENTERPRISES', '', 'B-1103, LOTUS HILL VIEW CHS LTD, BAL RAJESHWAR ROAD, MULUND (WEST),', 'MUMBAI', 'Maharashtra', '', 'INDIA', '400080', '', '', '', '', '', '', '', '', 'AAFPG3177K', '', '', '', '', '27AAFPG3177K1ZJ', '', '', 'Per Metric Ton', '100', '2019-07-17 13:09:19'),
(306, 'SHIVKRUPA INDUSTRIES', '', 'PLOT NO.D-24, MIDC, DISTRICT, BULDHANA,', 'KHAMGAON', 'Maharashtra', '', 'INDIA', '444303', '', '', '', '', '', '', '', '', 'CNNPM4258E', '', '', '', '', '27CNNPM4258E1ZP', '', '', 'Per Metric Ton', '0', '2019-07-20 09:09:16'),
(307, 'OSWAL UDYOG', '', 'PLOT NO:132, ROAD NO:25, KATTEDAN,  I.D.A, RANGA REDDY DISTRICT,\r\n', 'HYDERABAD', 'Telangana', '', 'INDIA', '500077', '', '', '', '', '', '', '', '', 'APMPS1814D', '', '', '', '', '36APMPS1814D1ZX', '', '', 'Per Metric Ton', '100', '2019-07-22 12:43:27'),
(308, 'UNIVERSAL BIO FUELS PVT LTD', '', 'PLOT NO:36, INDUSTRIAL PARK, VAKALAPUDI RURAL MANDAL\r\n', 'KAKINADA', 'Andhra Pradesh', '', 'INDIA', '533005', '', '', '', '', '', '', '', '', 'AAACU8305M', '', '', '', '', '37AAACU8305M1Z0', '', '', 'Per Metric Ton', '75', '2019-07-24 13:45:22'),
(309, 'BANSAL MANUFACTURING CO', '', 'E-38, INDUSTRIAL AREA,', 'BHATINDA', 'Punjab', '', 'INDIA', '151001', '', '', '', '', '', '', '', '', 'AAUHS9446L', '', '', '', '', '03AAUHS9446L1Z9', '', '', 'Per Metric Ton', '0', '2019-07-30 05:43:44'),
(310, 'SHREE OMKAR SOAP WORKS', '', 'VILLAGE:KAITHAL', 'CHANDAUSI', 'Uttar Pradesh', '', 'INDIA', '244412', '', '', '', '', '', '', '', '', 'AHDPV9761B', '', '', '', '', '09AHDPV9761B1ZZ', '', '', 'Per Metric Ton', '0', '2019-07-31 05:59:34'),
(311, 'ASIAN SOAP WORKS', '', '5, NEW LATI PLOT,', 'RAJKOT', 'Gujarat', '', 'INDIA', '360003', '', '', '', '', '', '', '', '', 'AADFA3673Q', '', '', '', '', '24AADFA3673Q1Z5', '', '', 'Per Metric Ton', '100', '2019-08-02 07:18:30'),
(312, 'ADL ENTERPRISES', '', '9 4 77/A/156, AL HASNATH COLONY, TOLICHOWKI', 'HYDERABAD', 'Telangana', '', 'INDIA', '500035', '', '', '', '', '', '', '', '', 'AAVFA2202P', '', '', '', '', '36AAVFA2202P1Z5', '', '', 'Per Metric Ton', '100', '2019-08-05 13:34:10'),
(313, 'HIRANAND & SONS', '', 'F-164, ROAD NO.11, VKI AREA,', 'JAIPUR', 'Rajasthan', '', 'INDIA', '302013', '', '', '', '', '', '', '', '', 'ABCPC2419C', '', '', '', '', '08ABCPC2419C1ZE', 'ABCPC2419C', '', 'Per Metric Ton', '100', '2019-08-05 13:55:22'),
(314, 'GANAPATI EDIBLES PVT LTD', '', '74/2, COLLECTOR GANJ, ', 'KANPUR', 'Uttar Pradesh', '', 'INDIA', '208001', '', '', '', '', '', '', '', '', 'AABCG4338F', '', '', '', '', '09AABCG4338F1ZQ', '', '', 'Per Metric Ton', '0', '2019-08-06 10:24:21'),
(315, 'KESHAV ENTERPRISES', '', 'VILLAGE:HUSSAINPUR, OPP: AMALTAS HOTEL, G.T.ROAD,\r\n', 'LUDHIANA ', 'Punjab', '', 'INDIA', '141001', '', '', '', '', '', '', '', '', 'ADMPR2718K', '', '', '', '', '03ADMPR2718K2ZB', '', '', 'Per Metric Ton', '0', '2019-08-10 08:10:43'),
(316, 'DEEP CHAND ARYA INDUSTRIES ( DELHI )', '', '455, KHARI BAOLI,', 'DELHI', '', '', 'INDIA', '110006', '', '', '', '', '', '', '', '', 'AAGFD7936G', '', '', '', '', '07AAGFD7936G1ZA', '', '', 'Per Metric Ton', '100', '2019-08-26 12:46:25'),
(317, 'MANJU ENTERPRISES', '', 'PLOT NO.29, 3RD ROAD, EAST GODAVARI,', 'PEDDAPURAM', 'Andhra Pradesh', '', 'INDIA', '533437', '', '', '', '', '', '', '', '', 'AJJPV3543R', '', '', '', '', '37AJJPV3543R1Z8', '', '', 'Per Metric Ton', '100', '2019-08-27 07:52:49'),
(318, 'KIRTI AGRO VET LTD', '', 'B-30, NEW ADDITIONAL MIDC,', 'LATUR', 'Maharashtra', '', 'INDIA', '413531', '', '', '', '', '', '', '', '', 'AACCK6480D', '', '', '', '', '27AACCK6480D1ZK', '', '', 'Per Metric Ton', '75', '2019-08-28 10:42:27'),
(319, 'AVM ENTERPRISES', '', 'PHASE-II, SHED NO.32, IDA CHERLAPALLY,', 'HYDERABAD', 'Telangana', '', 'INDIA', '500051', '', '', '', '', '', '', '', '', 'AAIFA0264E', '', '', '', '', '36AAIFA0264E1ZV', '', '', 'Per Metric Ton', '100', '2019-08-28 12:50:44'),
(320, 'SHIV KRUPA ENTERPRISES', '', 'SURVEY NO. 90, PLOT NO. 75, PADANA, GANDHIDHAM ( KUTCH )', 'GANDHIDHAM ', 'Gujarat', '', 'INDIA', '370201', '', '', '', '', '', '', '', '', 'APGPM7738W', '', '', '', '', '24APGPM7738E1ZT', '', '', 'Per Metric Ton', '0', '2019-09-04 06:30:37'),
(321, 'MODULUS COSMETICS', '', 'VILLAGE:GONDPUR JAI CHAND, TEHSIL- HAROLI, DISTRICT - UNA,\r\n\r\n', 'GONDPUR', 'Himachal Pradesh', '', 'INDIA', '176601', '', '', '', '', '', '', '', '', 'ACVPD4864C', '', '', '', '', '02ACVPD4864C3ZP', '', '', 'Per Metric Ton', '0', '2019-09-04 08:16:52'),
(322, 'MAYA CHEMICALS', '', 'NARMADA PARA, GUDHIYARI ROAD,', 'RAIPUR', 'Chattisgarh', '', 'INDIA', '492001', '', '', '', '', '', '', '', '', 'ADBPG9525G', '', '', '', '', '22ADBPG9525G1ZW', '', '', 'Per Metric Ton', '100', '2019-09-06 13:56:00'),
(323, 'JAY LAXMI SOAP WORKS', '', 'VILLAGE : KAITHAL,', 'CHANDAUSI', 'Uttar Pradesh', '', 'INDIA', '244412', '', '', '', '', '', '', '', '', 'ABRPR4710J', '', '', '', '', '09ABRPR4710J1Z5', '', '', 'Per Metric Ton', '0', '2019-09-24 12:42:00'),
(324, 'IMPERIAL OILS & CHEMICALS', '', 'PLOT NO.B 32, SCHEME NO.78 PART II, NEW LOHA MANDI,\r\n\r\n\r\n', 'INDORE', 'Madhya Pradesh', '', 'INDIA', '452010', '', '', '', '', '', '', '', '', 'AHUPM8142L', '', '', '', '', '23AHUPM8142L2ZQ', '', '', 'Per Metric Ton', '100', '2019-09-26 11:19:19'),
(325, 'EURO AGROTECH INDIA PVT LTD', '', 'PLOT NO.33/8, PHASE-III, IDA PASHAMYALARAM, ', 'SANGAREDDY DISTRICT,', 'Telangana', '', 'INDIA', '502307', '', '', '', '', '', '', '', '', 'AAECE0366J', '', '', '', '', '36AAECE0366J1ZN', '', '', 'Per Metric Ton', '100', '2019-10-03 10:04:02'),
(326, 'GP GLOBAL ENERGY PRIVATE LIMITED', '', 'D NO.1-1/4, CHAKRADWARABANDAM, RAJANAGARAM MANDALAM, ', 'EAST GODAVARI DISTRICT,', 'Andhra Pradesh', '', 'INDIA', '533001', '', '', '', '', '', '', '', '', 'AAICA3281E', '', '', '', '', '37AAICA3281E1ZS', '', '', 'Per Metric Ton', '100', '2019-10-10 12:52:17'),
(327, 'ANURA BIOFUELS PRIVATE LIMITED', '', '4TH FLOOR, H.NO.7-102/18,19,31 AND 32S, FLAT NO.405, GRAND RESIDENCY, NAGENDRA NAGAR, HABSIGUDA ', 'MEDCHAL - MALKAJGIRI,', 'Telangana', '', 'INDIA', '500007', '', '', '', '', '', '', '', '', 'AARCA5208J', '', '', '', '', '36AARCA5208J1ZF', '', '', 'Per Metric Ton', '100', '2019-10-10 13:01:42'),
(328, 'SHIV SHAKTI SOAP INDUSTRIES', '', 'SURATGARH ROAD VILLAGE.AHMEDPURA MANDI PILIBANGA ', 'DISTRICT, HANUMANGARH', 'Rajasthan', '', 'INDIA', '335803', '', '', '', '', '', '', '', '', 'ALPPJ2818M', '', '', '', '', '08ALPPJ2818M4ZI', '', '', 'Per Metric Ton', '0', '2019-10-16 13:06:27'),
(329, 'LAXMI VENKATESHWARA INDUSTRIES', '', 'NAGARKURNOOL ROAD, DISTRICT, MAHABUBNAGAR', 'JEDCHERALA', 'Telangana', '', 'INDIA', '0', '', '', '', '', '', '', '', '', 'AAAFL6428R', '', '', '', '', '36AAAFL6428R1ZR', '', '', 'Per Metric Ton', '100', '2019-10-25 11:56:48'),
(330, 'BENGANI COMMODITIES PRAVATE LIMITED', '', '47B, NALINI SETH ROAD, 3RD FLOOR,', 'KOLKATA', 'West Bengal', '', 'INDIA', '700007', '', '', '', '', '', '', '', '', 'AACCB9302P', '', '', '', '', '19AACCB9302P1ZA', '', '', 'Per Metric Ton', '100', '2019-10-31 14:12:29'),
(331, 'HOME LINEN IMPEX', '', 'A-220/1, PHASE 1,  ASHOK VIHAR,', 'DELHI', 'Delhi', '', 'INDIA', '110052', '', '', '', '', '', '', '', '', 'AEUPG0079B', '', '', '', '', '07AEUPG0079B1ZM', '', '', 'Per Metric Ton', '100', '2019-11-14 06:44:30'),
(332, 'REFKINGS COTTSOYA PVT LTD', '', 'PLOT NO. A-17, PHASE-I, ADDITIONAL MIDC AREA,', 'JALNA ', 'Maharashtra', '', 'INDIA', '431203', '', '', '', '', '', '', '', '', 'AAICR1766R', '', '', '', '', '27AAICR1766R1ZJ', '', '', 'Per Metric Ton', '100', '2019-11-18 08:17:45'),
(333, 'WAX INDIA', '', '262/4, MY NEST, POST OFFICE LANE,WADALA (W)\r\n\r\n\r\n', 'MUMBAI', 'Maharashtra', '', 'INDIA', '400031', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Per Metric Ton', '100', '2019-12-02 10:10:29'),
(334, 'PATTABHI AGRO FOODS PRIVATE LIMITED ', '', 'VALUTHIMMAPURAM ROAD, EAST GODAVARI,', 'PEDDAPURAM', 'Andhra Pradesh', '', 'INDIA', '533437', '', '', '', '', '', '', '', '', 'AADCP7270P', '', '', '', '', '37AADCP7270P2ZP', '', '', 'Per Metric Ton', '100', '2019-12-05 08:29:17'),
(335, ' S V OIL & CHEMICAL INDUSTRIES', '', 'PLOT NO: 15, KIADB, INDUSTRIAL AREA, DISTRICT: BIDAR\r\n\r\n\r\n', 'HUMNABAD', 'Karnataka', '', 'INDIA', '585330', '', '', '', '', '', '', '', '', 'ABPFS1661M', '', '', '', '', '29ABPFS1661M1ZF', '', '', 'Per Metric Ton', '100', '2019-12-19 06:23:16'),
(336, 'SUMA REFINERIES PVT LTD', '', 'D NO.1-1/4, CHAKRADWARABANDAM, RAJANAGARAM MANDALAM, ', 'EAST GODAVARI DISTRICT,', 'Andhra Pradesh', '', 'INDIA', '533001', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Per Metric Ton', '100', '2019-12-23 08:00:41'),
(337, 'AMARON ASSOCIATES', '', 'SURVEY NO.100 AND 113, PART NEAR RAIWAY STATION ROAD, KOTHUR, THIMMPAUR', 'MAHABUBNAGAR', 'Telangana', '', 'INDIA', '509325', '', '', '', '', '', '', '', '', 'ACWPG5076G', '', '', '', '', '36ACWPG5076G2Z5', '', '', 'Per Metric Ton', '0', '2019-12-24 11:03:17'),
(338, 'Naresh Kabra', '', 'Test', 'Ichalkaranji', 'Maharashtra', '', '', '', '', '', '', '', '', '', '', '9999', '', 'naresh.wwe@gmail.com', '', '', '', '', '', '', '', '', '2020-01-09 12:54:49');

-- --------------------------------------------------------

--
-- Table structure for table `tblappointment`
--

CREATE TABLE `tblappointment` (
  `iId` int(11) NOT NULL,
  `sDate` varchar(20) NOT NULL,
  `sTime` varchar(20) NOT NULL,
  `iPatient` int(11) NOT NULL,
  `sSymptons` varchar(1000) NOT NULL,
  `sPrescription` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblappointment`
--

INSERT INTO `tblappointment` (`iId`, `sDate`, `sTime`, `iPatient`, `sSymptons`, `sPrescription`) VALUES
(1, '2020-01-09', '21:00', 338, 'Test Update', 'Test Update'),
(2, '2020-01-09', '22:00', 338, 'Test', 'Test'),
(3, '2020-01-10', '10:00', 338, 'Test Symptom\r\nHeadache\r\nFever', 'Test'),
(4, '2020-01-16', '15:33', 338, 'Test', '');

-- --------------------------------------------------------

--
-- Table structure for table `tblfirm`
--

CREATE TABLE `tblfirm` (
  `iFirmId` int(11) NOT NULL,
  `sFirmName` varchar(500) NOT NULL,
  `sOwnerName` varchar(500) NOT NULL,
  `sAddress` text NOT NULL,
  `sCity` varchar(500) NOT NULL,
  `sState` varchar(500) NOT NULL,
  `sStateCode` varchar(10) NOT NULL,
  `sPincode` varchar(10) NOT NULL,
  `sPhone` varchar(20) NOT NULL,
  `sEmail` varchar(50) NOT NULL,
  `sPANNo` varchar(50) NOT NULL,
  `sBankName` varchar(500) NOT NULL DEFAULT '',
  `sAccountNo` varchar(500) NOT NULL DEFAULT '',
  `sIFSCCode` varchar(20) NOT NULL DEFAULT '',
  `sGSTNo` varchar(20) NOT NULL,
  `sPassword` varchar(500) NOT NULL,
  `sCreatedTimestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sType` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblfirm`
--

INSERT INTO `tblfirm` (`iFirmId`, `sFirmName`, `sOwnerName`, `sAddress`, `sCity`, `sState`, `sStateCode`, `sPincode`, `sPhone`, `sEmail`, `sPANNo`, `sBankName`, `sAccountNo`, `sIFSCCode`, `sGSTNo`, `sPassword`, `sCreatedTimestamp`, `sType`) VALUES
(3, 'Dr. Sharma Clinic', 'Dr. Vijay Sharma', '15-1-503/ ASHOK MARKET, FEEL KHANA,', 'Ichalkaraji', 'Maharashtra', '', '416115', '9405621460', 'test@admin.com', '', '', '', '', '', 'test', '2018-05-16 05:31:02', 'D'),
(4, 'Dr. Sharma Clinic', 'Dr. Vijay Sharma', '15-1-503/ ASHOK MARKET, FEEL KHANA,', 'Ichalkaraji', 'Maharashtra', '', '416115', '9405621460', 'testc@admin.com', '', '', '', '', '', 'testc', '2018-05-16 05:31:02', 'C');

-- --------------------------------------------------------

--
-- Table structure for table `tblstatecode`
--

CREATE TABLE `tblstatecode` (
  `iId` int(11) NOT NULL,
  `sState` varchar(50) NOT NULL,
  `sStateCode` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblstatecode`
--

INSERT INTO `tblstatecode` (`iId`, `sState`, `sStateCode`) VALUES
(1, 'Andaman and Nicobar Islands', '35'),
(2, 'Andhra Pradesh', '37'),
(3, 'Arunachal Pradesh', '12'),
(4, 'Assam', '18'),
(5, 'Bihar', '10'),
(6, 'Chandigarh', '4'),
(7, 'Chattisgarh', '22'),
(8, 'Dadra and Nagar Haveli', '26'),
(9, 'Daman and Diu', '25'),
(10, 'Delhi', '7'),
(11, 'Goa', '30'),
(12, 'Gujarat', '24'),
(13, 'Haryana', '6'),
(14, 'Himachal Pradesh', '2'),
(15, 'Jammu and Kashmir', '1'),
(16, 'Jharkhand', '20'),
(17, 'Karnataka', '29'),
(18, 'Kerala', '32'),
(19, 'Lakshadweep Islands', '31'),
(20, 'Madhya Pradesh', '23'),
(21, 'Maharashtra', '27'),
(22, 'Manipur', '14'),
(23, 'Meghalaya', '17'),
(24, 'Mizoram', '15'),
(25, 'Nagaland', '13'),
(26, 'Odisha', '21'),
(27, 'Pondicherry', '34'),
(28, 'Punjab', '3'),
(29, 'Rajasthan', '8'),
(30, 'Sikkim', '11'),
(31, 'Tamil Nadu', '33'),
(32, 'Telangana', '36'),
(33, 'Tripura', '16'),
(34, 'Uttar Pradesh', '9'),
(35, 'Uttarakhand', '5'),
(36, 'West Bengal', '19'),
(37, '', ''),
(38, '=', '=');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblaccount`
--
ALTER TABLE `tblaccount`
  ADD PRIMARY KEY (`iAccountId`);

--
-- Indexes for table `tblappointment`
--
ALTER TABLE `tblappointment`
  ADD PRIMARY KEY (`iId`);

--
-- Indexes for table `tblfirm`
--
ALTER TABLE `tblfirm`
  ADD PRIMARY KEY (`iFirmId`);

--
-- Indexes for table `tblstatecode`
--
ALTER TABLE `tblstatecode`
  ADD PRIMARY KEY (`iId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblaccount`
--
ALTER TABLE `tblaccount`
  MODIFY `iAccountId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=339;

--
-- AUTO_INCREMENT for table `tblappointment`
--
ALTER TABLE `tblappointment`
  MODIFY `iId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblfirm`
--
ALTER TABLE `tblfirm`
  MODIFY `iFirmId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblstatecode`
--
ALTER TABLE `tblstatecode`
  MODIFY `iId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
