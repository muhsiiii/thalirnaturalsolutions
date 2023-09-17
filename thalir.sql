-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2023 at 06:46 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thalir`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id` int(10) UNSIGNED NOT NULL,
  `customerid` int(11) NOT NULL DEFAULT 0,
  `name` varchar(64) NOT NULL,
  `email` varchar(128) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(1024) NOT NULL,
  `landmark` varchar(500) NOT NULL,
  `pincode` varchar(10) NOT NULL,
  `city` varchar(50) NOT NULL,
  `district` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `type` varchar(20) NOT NULL,
  `default_address` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id`, `customerid`, `name`, `email`, `mobile`, `phone`, `address`, `landmark`, `pincode`, `city`, `district`, `state`, `type`, `default_address`) VALUES
(1, 2, 'MUHAMMED SHAMMAS', '', '8157853040', '', 'Calicut , Perambra , Nochad', 'Perambra', '673614', 'Nochad', 'Calicut', 'Kerala', '', '1'),
(2, 4, 'Biniya', '', '07356568111', '', 'Cyberpark,Palazhi,Kozhikode', 'Hilite mall', '673016', 'Kozhikode', 'Kozhikode', 'Kerala', '', '1'),
(5, 7, 'gujhjk', '', '7846498', '', 'ghhjhkjudsjy', 'fxhnhf', '5985995', 'fdxhtf', 'fdhfjuy', 'fdxhjf', '', '1'),
(6, 8, 'cfgdfuqjf', '', '', '', 'ftdyfy', '', '6790', 'dafdyjqwku,', 'kdi', '', '', '0'),
(8, 11, 'gytrtt', '', '252322501210', '', 'vccvfdgfgfyjg hjhgghhg ghugukuiuo\r\nghfghffg ghfffg', 'fggtth', '673658', 'arhjkio', 'kozhikode', 'kerala', '', '1'),
(9, 12, 'jjkjkk', '', '9865452310', '', 'vgfgvghgh hhh hghhhuhuiiii', 'gfgfggggg', '545566656', 'erere', 'w222', 'Kerala', '', '1'),
(10, 9, 'Tets', '', '98452548', '', 'Hdhjdj', 'Mphss', '673521', 'calicut', 'Kozhikode', 'Kerala', '', '1'),
(11, 1, 'Aiswarya', '', '9539005339', '', 'Sahya Building, 3rd Floor, Unit-2F\r\nGov. Cyberpark, Kozhikode', 'Hilite mall', '673620', 'Calicut', 'Kozhikode', 'Kerala', '', '0'),
(12, 1, 'Aishwarya', '', '9539005339', '', 'Dhh', 'Hilite', '673620', 'Kozhikode', 'Kozhikode', 'kerala', '', '0'),
(13, 16, 'SHAMMAS', '', '8157853040', '', 'Calicut', 'Calicut', '673614', 'Calicut', 'Calicut', 'Kerala', '', '1'),
(14, 16, 'SHAMMASS', '', '8157853040', '', 'Calicut', 'CALICUT', '673614', 'Calicut', 'Calicut', 'Kerala', '', '0'),
(16, 17, 'rish', '', '8139865830', '', 'gadgfye hsfjhhe huuyyhhgjh', 'mndjhfjehf', '673689', 'jhejwehwe', 'jhuyutbfsdb', 'nkejekfjfj', '', '1'),
(17, 1, 'Argg', '', '88888', '', 'Wdgvh', 'Hilite', '673620', 'Kozhikode', 'Kozhikode', 'kerala', '', '1'),
(19, 18, 'Rishal', '', '6282712271', '', 'Calicut', 'Calicut', '123456', 'Calicut', 'Calicut', 'Kerala', '', '0'),
(20, 15, 'Sikha', '', '9563855670', '', 'Kolancheri house,parambayil', 'kuttiyadi', '986532', 'Bengaluru', 'Maharashtra', 'India', '', '0'),
(21, 18, 'sdfsdf', '', '8157853040', '', 'sdgg', 'fdsf', '52745', 'df', 'sdgsd', 'gsd', '', '1'),
(22, 8, 'samyuktha', '', '7994322066', '', 'fxdhgfjhhdhjyfg', 'puthiyappa', '546646674', 'fhgmgjkgdshklj', 'kozhikode', 'kerala', '', '1'),
(23, 8, 'megha', '', '8281986810', '', 'ghjfyhjkgk', 'aef', '673303568', 'sdvgxdf', 'Kozhikode', 'Kerala', '', '0'),
(25, 15, 'rish', '', '8139865830', '', 'gadgfye hsfjhhe huuyyhhgjh', 'biriyani', '623845', 'orange', 'yellow', 'snacks', '', '0'),
(26, 15, 'ghgh', '', '32135698963', '', 'gfgfyhgwsdfghjk fvbnm, hghhghj', 'dgfytyeeqe', '6565323', 'dfwerrfgff', 'asdfgh', 'cvcgdrw', '', '1'),
(27, 10, 'Adarsh Jose', '', '9526162457', '', 'kallenplackal(H),\r\nVannathichira(po),\r\nkozhikode', 'Near Toddy Shop', '673513', 'Kuttiyadi', 'Kozhikode', 'Kerala', '', '1'),
(28, 24, 'dfsdf', '', '8157853040', '', 'dsfd', 'Perambra', '123456', 'Nochad', 'Calicut', 'Kerala', '', '1'),
(29, 27, 'THALIR NATURAL SOLUTIONS', '', '08883848782', '', '6/1585\r\nPALAKKAD ROAD, CHERPULASSERY, PALKKAD, PALAKKAD, KERALA', 'opposite Silver World,', '679503', 'CHERPULASSERY', 'Palakkad', 'Kerala', '', '1'),
(30, 29, 'SuperAdmin', '', '8157853040', '', 'Calicut rdtfygui', 'Perambra', '673614', 'Nochad', 'Calicut', 'Kerala', '', '1'),
(31, 31, 'Fayis', '', '9961912384', '', 'Ek house nellaya', 'School', '679335', 'Cherpulassery', 'Palakkad', 'Kerala', '', '1'),
(32, 34, 'Resmi V R', '', '8943273799', '', '', 'Near St. Michaels Church Randar', '686673', 'Muvattupuzha', 'Ernakulam', 'Kerala', '', '1'),
(33, 32, 'Thalir', '', '8606387830', '', 'dgdfg', 'fdgdf', '680306', 'gdgf', 'fdgfdg', '644', '', '0'),
(34, 32, 'Jiss Anto', '8606387830', '8606387830', '8606387830', 'Puthusserypady House', 'Palliyara', '680306', 'Ollur', 'Thrissur', 'Kerala', '', '1'),
(35, 32, 'Jiaadsfsdfsd', '8606387830', '8606387830', '8606387830', 'dsfdsfdsf', 'dsfsdf', '680306', 'fdsfsdfsdfsd', 'Thrissursdfs', 'Keraladfds', '', '0'),
(36, 28, 'Fayis Ek', '9961912384', '9961912384', '9961912384', 'Fayis ek , edamanakuzhyil house nellaya post 679335', 'Near E.N.U.P. School', '679335', 'Nellaya', 'Palakkad', 'Kerala', '', '0'),
(37, 28, 'Fayis', '9961912384', '9961912384', '9961912384', 'Edamanakuzhyil house nellaya 679335', 'Enup school', '679335', 'Nellaya', 'Palakkad', 'Kerala', '', '0'),
(38, 32, 'fvvd', '8606387830', '8606387830', '8606387830', 'fdfd', 'dfgf', '680306', 'fdd', 'Thrissur', 'Kerala', '', '0'),
(39, 32, 'vvffd', '8606387830', '8606387830', '8606387830', 'sadsd', 'asdsad', '680307', 'acs', 'Thrissur', 'Kerala', '', '0'),
(40, 32, 'Jiss', '8606387830', '8606387830', '8606387830', 'dcec', 'Test', '680306', 'Thrissur', 'Thrissur', 'Kerala', '', '0'),
(41, 35, 'Shen Shibu', '7306976136', '7306976136', '7306976136', 'Panampadickal malayil\nKurichimuttom p o\nEdayaranmula\nPathanamthitta', 'Near st Stephen\'s church', '689531', 'Kozhencherry', 'Pathanamthitta', 'Kerala', '', '0'),
(42, 35, 'Shen shibu', '7306976136', '7306976136', '7306976136', 'Panampadickal malayil\nKurichimuttom po\nEdayaranmula\nPathanamthitta', 'St', '689531', 'Kozhencherry', 'Pathanamthitta', 'Kerala', '', '0'),
(43, 35, 'Shen', '7306976136', '7306976136', '7306976136', 'Panampadickal malayil kurichimuttom po edayaranmula Pathanamthitta', 'St', '689531', 'Kozhencherry', 'Pathanamthitta', 'Kerala', '', '0'),
(44, 35, 'Shen shibu', '7306976136', '7306976136', '7306976136', 'Panampadickal malayil kurichimuttom po edayaranmula Pathanamthitta', 'St Joseph Church', '689531', 'Kozhencherry', 'Pathanamthitta', 'Kerala', '', '1'),
(45, 36, 'Arun Kumar', '', '6282288212', '', '', 'Ayapankavu', '678595', 'Ayapankavu', 'Palakkad', 'Kerala', '', '1'),
(46, 37, 'Aswathy', '', '09061007400', '', '', 'Village office paliyekkara', '680301', 'Thrissur', 'Thrissur', 'Kerala', '', '1'),
(47, 28, 'Fayiz', '9961912384', '9961912384', '9961912384', 'Edamanakuzhyil house', 'Up school', '679335', 'Nellaya', 'Palakkad', 'Kerala', '', '0'),
(48, 28, 'Fayiz', '9961912384', '9961912384', '9961912384', 'Edamanakuzhyil house', 'Up school', '679335', 'Nellaya', 'Palakkad', 'Kerala', '', '0'),
(49, 28, 'Fayiz Ek', '9961912384', '9961912384', '9961912384', 'Edamanakuzhyil House', 'Up School', '679335', 'Nellaya', 'Palakkad', 'Kerala', '', '1'),
(50, 38, 'Viju S Anand', '', '9446310287', '', '', 'West of Japan Water Tank', '688539', 'Cherthala', 'Alappuzha', 'Kerala', '', '0'),
(51, 38, 'Viju S Anand', '', '9446310287', '', '', 'West of Japan Water Tank', '688539', 'Cherthala', 'Alappuzha', 'Kerala', '', '0'),
(52, 38, 'Viju S Anand', '', '9446310287', '', '', 'West Of Japan Water Tank', '688539', 'Cherthala', 'Alappuzha', 'Kerala', '', '1'),
(53, 39, 'PRASOON R KRISHNA', '', '08547877288', '', '', 'Mayithara Japan water tank', '688539', 'Cherthala', 'Alappuzha', 'Kerala', '', '1'),
(54, 40, 'Sreejith', '9745555991', '9745555991', '9745555991', 'Areekkara House', 'Sreeramaswami temple', '680601', 'Vellattanjur', 'Thrissur', 'Kerala', '', '0'),
(55, 40, 'Sreejith', '9745555991', '9745555991', '9745555991', 'Areekkara house', 'Sreeramaswami temple', '680601', 'Vellattanjur', 'Thrissur', 'Kerala', '', '1'),
(56, 41, 'Arun K', '', '09562218794', '', '', 'aa', '670604', 'Kannur', 'Kannur', 'Kerala', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` enum('1','2','3','4') NOT NULL DEFAULT '4',
  `name` varchar(64) NOT NULL DEFAULT '',
  `image` varchar(128) NOT NULL DEFAULT '',
  `url` varchar(128) NOT NULL DEFAULT '',
  `disporder` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `type`, `name`, `image`, `url`, `disporder`) VALUES
(2, '1', 'Thalir Hair care range products Banner', '/uploads/banners/ThalirHaircarerangeproductsBanner_1.jpeg', 'https://thalirnaturalsolutions.com/category/2/0', 1),
(4, '1', 'Thalir Ayurvedic Hair care product offer page', '/uploads/banners/ThalirAyurvedicHaircareproductofferpage_1.jpeg', 'https://thalirnaturalsolutions.com/product/7', 1),
(5, '1', 'Thalir Aloe Vera Shampoo offer page', '/uploads/banners/ThalirAloeVeraShampooofferpage_1.jpeg', 'https://thalirnaturalsolutions.com/product/12', 1),
(6, '3', 'Thalir Ayurvedic Hair Care oil offer Page', '/uploads/banners/ThalirAyurvedicHairCareoilofferPage_3.jpeg', 'https://thalirnaturalsolutions.com/product/7', 1),
(7, '3', 'Thalir Aloe Vera Shampoo Offer page', '/uploads/banners/ThalirAloeVeraShampooOfferpage_3.jpeg', 'https://thalirnaturalsolutions.com/product/12', 1),
(9, '2', 'Banner One', '/uploads/banners/BannerOne_2.jpg', 'https://test1.erebsindia.com/', 1),
(12, '2', 'Banner Two', '/uploads/banners/Banner2_2.jpg', 'https://test1.erebsindia.com/', 1),
(13, '2', 'Happy Customers banner', '/uploads/banners/HappyCustomersbanner_2.jpg', 'https://test1.erebsindia.com/', 1);

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(64) NOT NULL DEFAULT '',
  `title` varchar(150) NOT NULL DEFAULT '',
  `content` longtext DEFAULT NULL,
  `image` varchar(128) NOT NULL DEFAULT '',
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `type`, `title`, `content`, `image`, `status`, `created_at`, `updated_at`) VALUES
(5, 'Blog', 'Blog 1', '<p>The Thalir Natural Solutions Group is a leading consumer products and wellness service provider in the Ayurveda segment in India. Hailing from an ancient tradition of Ayurveda, Thalir is known for the authenticity of the products and services.</p>', 'uploads/blogs/blog-1331019.jpg', 'Active', '2022-11-03 04:08:09', '2022-11-19 05:03:28'),
(6, 'Blog', 'Blog 2', '<p>The Thalir Natural Solutions Group is a leading consumer products and wellness service provider in the Ayurveda segment in India. Hailing from an ancient tradition of Ayurveda, Thalir is known for the authenticity of the products and services.</p>', 'uploads/blogs/blog-2331019.jpg', 'Active', '2022-11-03 04:08:47', '2022-11-19 05:03:17'),
(7, 'Blog', 'Blog 3', '<p>The Thalir Natural Solutions Group is a leading consumer products and wellness service provider in the Ayurveda segment in India. Hailing from an ancient tradition of Ayurveda, Thalir is known for the authenticity of the products and services.</p>', 'uploads/blogs/blog-3331019.jpg', 'Active', '2022-11-03 04:09:48', '2022-11-19 05:03:07');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(10) UNSIGNED NOT NULL,
  `uniqueid` varchar(32) NOT NULL DEFAULT '',
  `productid` int(11) NOT NULL DEFAULT 0,
  `unitid` int(11) NOT NULL DEFAULT 0,
  `color_id` int(11) NOT NULL DEFAULT 0,
  `quantity` smallint(6) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `uniqueid`, `productid`, `unitid`, `color_id`, `quantity`, `created_at`) VALUES
(361, '15', 7, 0, 0, 2, '2022-11-21 12:50:00'),
(362, '15', 12, 0, 0, 3, '2022-11-21 12:50:00'),
(382, '10', 7, 0, 0, 11, '2022-11-24 14:07:00'),
(403, '30', 7, 0, 0, 2, '2023-02-09 17:27:00'),
(424, '29', 12, 0, 0, 1, '2023-02-22 16:56:00'),
(425, '29', 7, 0, 0, 1, '2023-02-22 16:56:00'),
(437, '33', 7, 0, 0, 1, '2023-03-16 15:48:00'),
(483, '16821156967523', 12, 0, 0, 1, '2023-04-22 03:51:00'),
(489, '16821173962608', 7, 0, 0, 1, '2023-04-22 04:19:00'),
(492, '16821644026847', 7, 0, 0, 1, '2023-04-22 17:25:00'),
(494, '16821944672181', 7, 0, 0, 1, '2023-04-23 01:58:00'),
(500, '16821965856777', 7, 0, 0, 1, '2023-04-23 02:51:00'),
(501, '16821965856777', 12, 0, 0, 1, '2023-04-23 02:53:00'),
(502, '16822303593078', 7, 0, 0, 1, '2023-04-23 11:43:00'),
(505, '16822312515628', 7, 0, 0, 1, '2023-04-23 12:02:00'),
(506, '16824944625826', 7, 0, 0, 6, '2023-04-26 13:04:00'),
(507, '16825931048953', 7, 0, 0, 1, '2023-04-27 16:28:00'),
(511, '16826336806346', 7, 0, 0, 1, '2023-04-28 04:25:00'),
(512, '16826490646177', 7, 0, 0, 1, '2023-04-28 08:09:00'),
(513, '16826613084947', 7, 0, 0, 2, '2023-04-28 11:27:00'),
(517, '16829979281018', 12, 0, 0, 2, '2023-05-02 09:23:00'),
(518, '16830032992085', 7, 0, 0, 5, '2023-05-02 10:25:00'),
(519, '16830140238490', 12, 0, 0, 1, '2023-05-02 13:23:00'),
(521, '16830501265996', 12, 0, 0, 1, '2023-05-02 23:29:00'),
(524, '8', 7, 0, 0, 7, '2023-05-03 09:41:00'),
(525, '16830871037324', 12, 0, 0, 13, '2023-05-03 09:42:00'),
(526, '16830872282173', 12, 0, 0, 1, '2023-05-03 09:43:00'),
(527, '8', 12, 0, 0, 1, '2023-05-03 10:01:00'),
(528, '16830885176670', 12, 0, 0, 1, '2023-05-03 10:05:00'),
(529, '16830864472400', 12, 0, 0, 3, '2023-05-03 11:00:00'),
(538, '16834077195672', 7, 0, 0, 1, '2023-05-07 02:45:00'),
(539, '16834080419999', 12, 0, 0, 1, '2023-05-07 02:50:00'),
(544, '16835153682692', 7, 0, 0, 1, '2023-05-08 09:08:00'),
(549, '16835345463987', 7, 0, 0, 6, '2023-05-08 15:34:00'),
(550, '16835403116320', 7, 0, 0, 1, '2023-05-08 15:35:00'),
(553, '16835400115617', 7, 0, 0, 1, '2023-05-08 16:32:00'),
(554, '16835722651123', 7, 0, 0, 1, '2023-05-09 00:28:00'),
(559, '16836055084410', 7, 0, 0, 1, '2023-05-09 12:56:00'),
(560, '16836834653872', 7, 0, 0, 1, '2023-05-10 07:21:00'),
(561, '16836834653872', 12, 0, 0, 1, '2023-05-10 07:21:00'),
(564, '16836926023663', 12, 0, 0, 1, '2023-05-10 09:54:00'),
(565, '16838034299425', 7, 0, 0, 1, '2023-05-11 16:41:00'),
(577, '16839557501919', 12, 0, 0, 1, '2023-05-13 10:59:00'),
(580, '16842066349880', 7, 0, 0, 2, '2023-05-16 08:55:00'),
(582, '16842187795223', 7, 0, 0, 1, '2023-05-16 12:06:00'),
(583, '16842135445774', 12, 0, 0, 1, '2023-05-16 12:08:00'),
(584, '16842364389650', 7, 0, 0, 1, '2023-05-16 16:57:00'),
(588, '16843815686716', 7, 0, 0, 2, '2023-05-18 09:28:00'),
(589, '16844001681957', 7, 0, 0, 2, '2023-05-18 14:26:00'),
(590, '16844697704230', 7, 0, 0, 2, '2023-05-19 11:09:00'),
(591, '16844859845804', 7, 0, 0, 3, '2023-05-19 14:17:00'),
(592, '16844939257416', 12, 0, 0, 1, '2023-05-19 16:28:00'),
(594, '16845814807310', 7, 0, 0, 1, '2023-05-20 16:48:00'),
(596, '16847291507512', 7, 0, 0, 2, '2023-05-22 10:50:00'),
(598, '16849226557989', 7, 0, 0, 2, '2023-05-24 15:49:00'),
(599, '16849253741260', 12, 0, 0, 1, '2023-05-24 16:20:00'),
(600, '16849253741260', 7, 0, 0, 1, '2023-05-24 16:20:00'),
(619, '16849423868146', 12, 0, 0, 1, '2023-05-24 21:03:00'),
(625, '16849850767321', 12, 0, 0, 2, '2023-05-25 09:21:00'),
(633, '16849972426425', 7, 0, 0, 4, '2023-05-25 12:18:00'),
(637, '16850112261256', 7, 0, 0, 1, '2023-05-25 16:17:00'),
(646, '16849910498523', 7, 0, 0, 1, '2023-05-25 16:38:00'),
(652, '16850137463814', 12, 0, 0, 1, '2023-05-25 16:52:00'),
(654, '16850203988680', 7, 0, 0, 1, '2023-05-25 18:44:00'),
(669, '16852573427069', 12, 0, 0, 1, '2023-05-28 12:37:00'),
(671, '16853324795669', 12, 0, 0, 1, '2023-05-29 10:25:00'),
(672, '16858188547929', 12, 0, 0, 1, '2023-06-04 00:31:00'),
(674, '16860396296840', 7, 0, 0, 2, '2023-06-06 14:01:00');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(64) NOT NULL DEFAULT '',
  `image` varchar(128) NOT NULL DEFAULT '',
  `desc` varchar(1024) NOT NULL DEFAULT '',
  `disporder` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `desc`, `disporder`) VALUES
(2, 'Hair Care', '/uploads/category/HairCare.png', 'Discover 100% toxin-free and safe hair care products by Thalir Natural Solutions\'. Whether it’s hair fall, dandruff, frizzy hair, or anything else – Thalir has a product for you. Get closer to the goodness of nature with our range of hair care products made with natural ingredients.', 1),
(3, 'Body Care', '/uploads/category/BodyCare.png', '', 1),
(4, 'Skin Care', '/uploads/category/SkinCare.png', '', 3);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(64) NOT NULL DEFAULT '',
  `email` varchar(64) NOT NULL DEFAULT '',
  `phone` varchar(13) NOT NULL DEFAULT '',
  `password` varchar(64) NOT NULL DEFAULT '',
  `address` varchar(1024) NOT NULL DEFAULT '',
  `pincode` varchar(10) NOT NULL DEFAULT '',
  `area` varchar(64) NOT NULL DEFAULT '',
  `district` varchar(64) NOT NULL DEFAULT '',
  `state` varchar(64) NOT NULL DEFAULT '',
  `latitude` varchar(64) NOT NULL DEFAULT '',
  `longitude` varchar(64) NOT NULL DEFAULT '',
  `join_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `phone`, `password`, `address`, `pincode`, `area`, `district`, `state`, `latitude`, `longitude`, `join_on`) VALUES
(1, 'Aishwarya', 'aiswaryamohandasnp@gmail.com', '9539005339', '25d55ad283aa400af464c76d713c07ad', '', '', '', '', '', '', '', '2022-10-27 11:15:00'),
(2, 'Shammas', 'shammasnhd@gmail.com', '8157853040', '25f9e794323b453885f5181f1b624d0b', '', '', '', '', '', '', '', '2022-10-27 12:12:00'),
(3, 'Samyuktha K', 'samyukthasathyan@gmail.com', '7994322065', 'e36a39c3bd74ff882f9cfff49d7e2cd4', '', '', '', '', '', '', '', '2022-10-27 12:16:00'),
(4, 'Mega', 'mega@gmail.com', '7907605285', '25d55ad283aa400af464c76d713c07ad', '', '', '', '', '', '', '', '2022-10-27 17:56:00'),
(5, 'Samyuktha K', 'samyukthafwdywjkfl@gmail.com', '7902941327', '25d55ad283aa400af464c76d713c07ad', '', '', '', '', '', '', '', '2022-11-01 13:01:00'),
(6, 'Samyuktha', 'gshsjjg@gmail.com', '7994322064', '25d55ad283aa400af464c76d713c07ad', '', '', '', '', '', '', '', '2022-11-01 15:26:00'),
(7, 'Sayujya', 'gfghv@gmail.com', '7895245852', '25d55ad283aa400af464c76d713c07ad', '', '', '', '', '', '', '', '2022-11-02 15:16:00'),
(8, 'Samyuktha', 'samyukthasam@gmail.com', '7994322066', '25d55ad283aa400af464c76d713c07ad', '', '', '', '', '', '', '', '2022-11-02 15:44:00'),
(9, 'Testy', 'arshadmp75@gmail.com', '9847234464', '25d55ad283aa400af464c76d713c07ad', '', '', '', '', '', '', '', '2022-11-08 17:14:00'),
(10, 'Adarsh Jose', 'adarshjose5430@gmail.com', '9526162457', 'b7f15b7a9b5ec2dd98896706f65efd23', '', '', '', '', '', '', '', '2022-11-08 17:17:00'),
(11, 'Arya Stark', 'arya@gmail.com', '9446744570', '17f2e361f69ebd6bddf0eca8f58877c7', '', '', '', '', '', '', '', '2022-11-08 17:29:00'),
(12, 'Ggff', 'superadmin@gmail.com', '9865452310', '0b28a5799a32c687dad2c5183718ceac', '', '', '', '', '', '', '', '2022-11-08 17:52:00'),
(13, 'Simily C', 'similycsimily@gmail.com', '8139865830', 'aba736169a70c89014b71ebe231e48f9', '', '', '', '', '', '', '', '2022-11-12 16:38:00'),
(14, 'Mekha', 'meghaprasanthk30@gmail.com', '9495539810', '226c769e0e83c6d83dc26649504ba9f2', '', '', '', '', '', '', '', '2022-11-15 18:16:00'),
(15, 'Sikha', 'sikhamaloo@gmail.com', '8590655935', 'fb737c6f95aab829a0c2c0bb0a01cdf4', '', '', '', '', '', '', '', '2022-11-16 11:48:00'),
(16, 'Megha', 'megha@gmail.com', '8281986810', '25f9e794323b453885f5181f1b624d0b', '', '', '', '', '', '', '', '2022-11-16 14:45:00'),
(17, 'Rish', 'rish@gmail.com', '8921658090', 'e40f01afbb1b9ae3dd6747ced5bca532', '', '', '', '', '', '', '', '2022-11-16 17:48:00'),
(18, 'Rishal', 'shammasnhd@gmail.com', '6282712271', '642645be63449d2d6a8efe0c7ba6dac8', '', '', '', '', '', '', '', '2022-11-18 10:00:00'),
(19, 'Athira', 'hr@erebsindia.com', '7356568444', '25f9e794323b453885f5181f1b624d0b', '', '', '', '', '', '', '', '2022-11-18 12:51:00'),
(20, 'Samyuktha', 'samyuktha@gmail.com', '7994322067', '25d55ad283aa400af464c76d713c07ad', '', '', '', '', '', '', '', '2022-11-18 13:04:00'),
(21, 'Shammas', 'shammasnhd@gmail.com', '9745695211', 'b416a96c874832e66440472c77968cb3', '', '', '', '', '', '', '', '2022-11-18 14:56:00'),
(22, 'Nimna', 'nimna', '8848401565', '6677dfb8d118dbea4d136eeaebba4c45', '', '', '', '', '', '', '', '2022-11-26 12:03:00'),
(23, '', '', '2123542526', 'd2d9fa0e5993cb7ce0497f9d400464ab', '', '', '', '', '', '', '', '2022-11-26 12:10:00'),
(24, 'Nithin', 'shammasnhd@gmail.com', '9539667370', 'b3353b2a99d764433b166f47f2cc264d', '', '', '', '', '', '', '', '2022-11-26 12:17:00'),
(25, 'Tystwyt123245555', 'qrsqdytqdws334343', '1234567894', '482933c442cdf2a8b9a972ce2b7417bc', '', '', '', '', '', '', '', '2022-12-03 12:04:00'),
(26, 'Www2w2', 'fqwqgf454', '1234567891', '482933c442cdf2a8b9a972ce2b7417bc', '', '', '', '', '', '', '', '2022-12-03 12:13:00'),
(27, 'THALIR NATURAL SOLUTIONS', 'thalirnaturalsolutions@gmail.com', '8883848782', 'c1d5259794fe5a2a17767dc78a7e605c', '', '', '', '', '', '', '', '2023-01-04 01:58:00'),
(28, 'Fayis', 'fayizyousaf3@gmail.com', '9961912384', '6d2969c77e14c84591b55e3f7b5b69fd', '', '', '', '', '', '', '', '2023-01-15 23:09:00'),
(29, 'Sam', 'samyukthasathyan12@gmail.com', '7994322061', '986ed72a04a5191631e97dacb9660df1', '', '', '', '', '', '', '', '2023-01-18 12:14:00'),
(30, 'Ali Akbar', 'akkuakbarcpy8@gmail.com', '9656590451', '15ff87befa2a9a2c3197b90aa7180468', '', '', '', '', '', '', '', '2023-02-09 17:25:00'),
(31, 'Fayizi', 'fayizyousaf3@gmail.com', '8281362384', '86efe8a7390c52662342c8b59bf6182e', '', '', '', '', '', '', '', '2023-02-09 17:30:00'),
(32, 'Jiss Anto', 'jissanto@gmail.com', '8606387830', '157abcfecb5f6fd69fc243a40444384a', '', '', '', '', '', '', '', '2023-02-11 17:43:00'),
(33, 'Yoosaf', 'yousafaliek@gmail.com', '9037591865', '45e6f9a014f9caf47544c25c505d4096', '', '', '', '', '', '', '', '2023-03-16 15:45:00'),
(34, 'Resmi Binoy', 'resmivrajan15@gmail.com', '8943273799', 'de129e4f4a0631a6efd64a3952089fdf', '', '', '', '', '', '', '', '2023-04-20 18:27:00'),
(35, 'Shen Shibu', '7306976136', '7306976136', '7306976136', 'Panampadickal malayil\nKurichimuttom p o\nEdayaranmula\nPathanamthitta', '689531', 'Kozhencherry', 'Pathanamthitta', 'Kerala', '', '', '2023-04-27 16:32:00'),
(36, 'Nabeel', 'nckmgm@gmail.com', '9633009393', '1b0da331f9ab1673b0c575cd043c4392', '', '', '', '', '', '', '', '2023-05-01 15:14:00'),
(37, 'Aswathy  P C', 'ashwathychandra@gmail.com', '9061007400', 'fe3db7eb16d0a1d1ba1a87c48b937a93', '', '', '', '', '', '', '', '2023-05-01 23:03:00'),
(38, 'Viju S Anand', 'vijuviolin@gmail.com', '9446310287', 'fab9deff509ab4ab4aceda5c584d2fd2', '', '', '', '', '', '', '', '2023-05-10 07:26:00'),
(39, 'PRASOON R KRISHNA', 'prasoonrkrishna@gmail.com', '8547877288', '830ef3820612c739bc43f28b17026171', '', '', '', '', '', '', '', '2023-05-17 10:44:00'),
(40, 'Sreejith', '9745555991', '9745555991', '9745555991', 'Areekkara House', '680601', 'Vellattanjur', 'Thrissur', 'Kerala', '', '', '2023-05-20 16:53:00'),
(41, 'Arun K', 'karunsabari@gmail.com', '9562218794', '83fa08a4c8dc0db0f5d3c70f66c9950d', '', '', '', '', '', '', '', '2023-05-24 16:23:00'),
(42, 'TEST', 'test@gmail.com', '9778422970', '16d7a4fca7442dda3ad93c9a726597e4', '', '', '', '', '', '', '', '2023-05-31 15:49:00');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_06_28_171356_create_categories_table', 1),
(5, '2021_03_08_073317_create_products_table', 1),
(6, '2021_03_08_103354_create_product_units_table', 1),
(7, '2021_03_08_103408_create_orders_table', 1),
(8, '2021_03_08_103419_create_ordered_items_table', 1),
(9, '2021_03_08_111135_create_customers_table', 1),
(10, '2021_03_12_074648_create_carts_table', 1),
(11, '2021_05_31_203235_create_banners_table', 1),
(12, '2021_05_31_203255_create_product_colors_table', 1),
(13, '2021_07_24_182326_create_notifications_table', 1),
(14, '2021_08_25_094025_create_sub_categories_table', 1),
(15, '2022_10_14_124322_alter_table_products_add_new_fields', 1),
(16, '2022_10_16_095601_create_table_settings', 1),
(17, '2022_10_16_103516_alter_table_settings_add_new_fields', 1),
(18, '2022_10_16_134753_create_table_address', 1),
(19, '2022_10_16_185007_alter_table_ordered_items_add_new_field_product_name', 1),
(20, '2022_10_16_212620_alter_table_orders_add_new_field_paymentid', 1),
(21, '2022_10_20_115421_create_blogs_table', 1),
(22, '2022_10_22_183254_alter_table_ordered_items__add_new_field_offerprice', 1),
(23, '2022_10_23_045855_create_table_product_ingredients', 1),
(24, '2022_10_24_060529_create_table_product_benifits', 1),
(25, '2022_10_24_074857_create_table_product_reviews', 1),
(26, '2022_10_24_180836_create_table_shop_reviews', 1),
(27, '2022_10_25_024542_alter_table_settings_add_new_field_ourstory', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(128) NOT NULL DEFAULT '',
  `sub_title` varchar(1024) NOT NULL DEFAULT '',
  `url` varchar(256) NOT NULL DEFAULT '',
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `title`, `sub_title`, `url`, `created_at`) VALUES
(1, 'Shop for 699 or above and get flat 50% off', 'Shop for 699 or above and get flat 50% off', 'https://test1.erebsindia.com', '2022-10-27 12:14:00');

-- --------------------------------------------------------

--
-- Table structure for table `ordered_items`
--

CREATE TABLE `ordered_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `orderid` int(11) NOT NULL DEFAULT 0,
  `productid` int(11) NOT NULL DEFAULT 0,
  `unit_name` varchar(32) NOT NULL DEFAULT '',
  `quantity` smallint(6) NOT NULL DEFAULT 1,
  `amount` double(8,2) NOT NULL DEFAULT 0.00,
  `product_name` varchar(200) NOT NULL DEFAULT '',
  `offerprice` double(8,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ordered_items`
--

INSERT INTO `ordered_items` (`id`, `orderid`, `productid`, `unit_name`, `quantity`, `amount`, `product_name`, `offerprice`) VALUES
(1, 1, 6, '', 2, 200.00, 'moisturizer', 180.00),
(2, 1, 10, '', 2, 450.00, 'Shampoo', 430.00),
(3, 2, 7, '', 1, 200.00, 'conditioner', 150.00),
(4, 3, 11, '', 1, 290.00, 'SHAMPOO', 280.00),
(5, 4, 12, '', 1, 120.00, 'Lipstick', 100.00),
(6, 5, 10, '', 1, 450.00, 'Shampoo', 430.00),
(7, 6, 10, '', 1, 450.00, 'Shampoo', 430.00),
(8, 7, 11, '', 1, 290.00, 'SHAMPOO', 280.00),
(9, 7, 6, '', 1, 200.00, 'moisturizer', 180.00),
(10, 7, 13, '', 1, 140.00, 'cosmetics', 100.00),
(11, 7, 7, '', 1, 200.00, 'conditioner', 150.00),
(12, 7, 12, '', 1, 120.00, 'Lipstick', 100.00),
(13, 8, 11, '', 1, 290.00, 'SHAMPOO', 280.00),
(14, 9, 13, '', 1, 140.00, 'cosmetics', 100.00),
(15, 10, 15, '', 2, 150.00, 'Conditioner', 150.00),
(16, 10, 6, '', 1, 200.00, 'moisturizer', 180.00),
(17, 10, 11, '', 1, 290.00, 'SHAMPOO', 280.00),
(18, 10, 17, '', 1, 180.00, 'Powder', 180.00),
(19, 11, 11, '', 1, 290.00, 'SHAMPOO', 0.00),
(20, 12, 6, '', 1, 200.00, 'moisturizer', 180.00),
(21, 12, 11, '', 1, 290.00, 'SHAMPOO', 280.00),
(22, 13, 11, '', 1, 290.00, 'SHAMPOO', 0.00),
(23, 14, 12, '', 1, 120.00, 'Lipstick', 100.00),
(24, 15, 13, '', 2, 140.00, 'cosmetics', 100.00),
(25, 15, 7, '', 1, 200.00, 'conditioner', 150.00),
(26, 15, 12, '', 1, 120.00, 'Lipstick', 100.00),
(27, 15, 6, '', 1, 200.00, 'moisturizer', 180.00),
(28, 16, 11, '', 2, 290.00, 'SHAMPOO', 280.00),
(29, 16, 13, '', 1, 140.00, 'cosmetics', 100.00),
(30, 16, 14, '', 2, 100.00, 'Cream', 100.00),
(31, 17, 10, '', 1, 450.00, 'Shampoo', 430.00),
(32, 18, 12, '', 1, 120.00, 'Lipstick', 100.00),
(33, 18, 7, '', 5, 200.00, 'conditioner', 150.00),
(34, 19, 12, '', 1, 120.00, 'Lipstick', 100.00),
(35, 20, 7, '', 1, 200.00, 'conditioner', 150.00),
(36, 21, 16, '', 6, 200.00, 'Serum', 200.00),
(37, 21, 18, '', 7, 250.00, 'Sunscreen', 250.00),
(38, 21, 19, '', 5, 140.00, 'Compact', 140.00),
(39, 21, 7, '', 7, 200.00, 'conditioner', 150.00),
(40, 22, 7, '', 1, 200.00, 'conditioner', 150.00),
(41, 22, 12, '', 1, 120.00, 'Lipstick', 100.00),
(42, 23, 12, '', 1, 120.00, 'Lipstick', 0.00),
(43, 23, 7, '', 1, 200.00, 'conditioner', 0.00),
(44, 24, 12, '', 1, 120.00, 'Lipstick', 0.00),
(45, 25, 12, '', 1, 120.00, 'Lipstick', 100.00),
(46, 26, 12, '', 1, 120.00, 'Lipstick', 100.00),
(47, 27, 13, '', 1, 140.00, 'cosmetics', 100.00),
(48, 27, 14, '', 1, 100.00, 'Cream', 100.00),
(49, 27, 11, '', 1, 290.00, 'SHAMPOO', 280.00),
(50, 27, 15, '', 1, 150.00, 'Conditioner', 150.00),
(51, 28, 7, '', 1, 200.00, 'conditioner', 150.00),
(52, 28, 12, '', 1, 120.00, 'Lipstick', 100.00),
(53, 29, 16, '', 1, 200.00, 'Serum', 0.00),
(54, 29, 11, '', 1, 290.00, 'SHAMPOO', 0.00),
(55, 29, 19, '', 4, 140.00, 'Compact', 0.00),
(56, 29, 18, '', 3, 250.00, 'Sunscreen', 0.00),
(57, 29, 17, '', 2, 180.00, 'Powder', 0.00),
(58, 29, 6, '', 4, 200.00, 'moisturizer', 0.00),
(59, 29, 7, '', 3, 200.00, 'conditioner', 0.00),
(60, 29, 12, '', 4, 120.00, 'Lipstick', 0.00),
(61, 29, 13, '', 2, 140.00, 'cosmetics', 0.00),
(62, 29, 14, '', 2, 100.00, 'Cream', 0.00),
(63, 29, 15, '', 2, 150.00, 'Conditioner', 0.00),
(64, 29, 10, '', 2, 450.00, 'Shampoo', 0.00),
(65, 30, 7, '', 1, 200.00, 'conditioner', 150.00),
(66, 30, 12, '', 1, 120.00, 'Lipstick', 100.00),
(67, 30, 13, '', 1, 140.00, 'cosmetics', 100.00),
(68, 30, 14, '', 1, 100.00, 'Cream', 100.00),
(69, 30, 10, '', 1, 450.00, 'Shampoo', 430.00),
(70, 30, 11, '', 1, 290.00, 'SHAMPOO', 280.00),
(71, 30, 15, '', 1, 150.00, 'Conditioner', 150.00),
(72, 30, 16, '', 1, 200.00, 'Serum', 200.00),
(73, 30, 6, '', 1, 200.00, 'moisturizer', 180.00),
(74, 30, 17, '', 1, 180.00, 'Powder', 180.00),
(75, 30, 18, '', 1, 250.00, 'Sunscreen', 250.00),
(76, 30, 19, '', 1, 140.00, 'Compact', 140.00),
(77, 31, 13, '', 2, 140.00, 'cosmetics', 100.00),
(78, 31, 10, '', 2, 450.00, 'Shampoo', 430.00),
(79, 31, 7, '', 4, 200.00, 'conditioner', 150.00),
(80, 31, 15, '', 1, 150.00, 'Conditioner', 150.00),
(81, 32, 19, '', 3, 140.00, 'Compact', 0.00),
(82, 33, 12, '', 1, 120.00, 'Lipstick', 100.00),
(83, 34, 16, '', 2, 200.00, 'Serum', 200.00),
(84, 35, 7, '', 1, 200.00, 'conditioner', 150.00),
(85, 35, 12, '', 1, 120.00, 'Lipstick', 100.00),
(86, 36, 11, '', 4, 290.00, 'SHAMPOO', 0.00),
(87, 36, 15, '', 4, 150.00, 'Conditioner', 0.00),
(88, 36, 16, '', 3, 200.00, 'Serum', 0.00),
(89, 36, 6, '', 2, 200.00, 'moisturizer', 0.00),
(90, 36, 17, '', 2, 180.00, 'Powder', 0.00),
(91, 36, 18, '', 2, 250.00, 'Sunscreen', 0.00),
(92, 36, 19, '', 2, 140.00, 'Compact', 0.00),
(93, 36, 7, '', 1, 200.00, 'conditioner', 0.00),
(94, 36, 12, '', 1, 120.00, 'Lipstick', 0.00),
(95, 36, 13, '', 1, 140.00, 'cosmetics', 0.00),
(96, 36, 14, '', 1, 100.00, 'Cream', 0.00),
(97, 37, 7, '', 5, 200.00, 'conditioner', 150.00),
(98, 37, 13, '', 4, 140.00, 'cosmetics', 100.00),
(99, 37, 10, '', 2, 450.00, 'Shampoo', 430.00),
(100, 38, 12, '', 1, 120.00, 'Lipstick', 100.00),
(101, 39, 12, '', 4, 120.00, 'Lipstick', 100.00),
(102, 39, 13, '', 3, 140.00, 'cosmetics', 100.00),
(103, 39, 14, '', 2, 100.00, 'Cream', 100.00),
(104, 39, 7, '', 3, 200.00, 'conditioner', 150.00),
(105, 39, 10, '', 2, 450.00, 'Shampoo', 430.00),
(106, 39, 11, '', 2, 290.00, 'SHAMPOO', 280.00),
(107, 39, 15, '', 2, 150.00, 'Conditioner', 150.00),
(108, 39, 16, '', 2, 200.00, 'Serum', 200.00),
(109, 39, 6, '', 1, 200.00, 'moisturizer', 180.00),
(110, 39, 17, '', 1, 180.00, 'Powder', 180.00),
(111, 39, 18, '', 1, 250.00, 'Sunscreen', 250.00),
(112, 39, 19, '', 1, 140.00, 'Compact', 140.00),
(113, 40, 7, '', 1, 200.00, 'conditioner', 150.00),
(114, 41, 12, '', 1, 120.00, 'Lipstick', 0.00),
(115, 42, 12, '', 1, 120.00, 'Lipstick', 0.00),
(116, 43, 10, '', 1, 450.00, 'Shampoo', 0.00),
(117, 43, 7, '', 3, 200.00, 'conditioner', 0.00),
(118, 43, 12, '', 1, 120.00, 'Lipstick', 0.00),
(119, 43, 13, '', 1, 140.00, 'cosmetics', 0.00),
(120, 43, 14, '', 1, 100.00, 'Cream', 0.00),
(121, 44, 12, '', 1, 120.00, 'Lipstick', 0.00),
(122, 44, 13, '', 1, 140.00, 'cosmetics', 0.00),
(123, 44, 7, '', 1, 200.00, 'conditioner', 0.00),
(124, 45, 12, '', 1, 120.00, 'Lipstick', 0.00),
(125, 45, 13, '', 1, 140.00, 'cosmetics', 0.00),
(126, 46, 7, '', 1, 200.00, 'conditioner', 150.00),
(127, 46, 19, '', 1, 140.00, 'Compact', 140.00),
(128, 46, 12, '', 1, 120.00, 'Lipstick', 100.00),
(129, 47, 13, '', 2, 140.00, 'cosmetics', 0.00),
(130, 47, 19, '', 1, 140.00, 'Compact', 0.00),
(131, 47, 11, '', 1, 290.00, 'SHAMPOO', 0.00),
(132, 47, 14, '', 1, 100.00, 'Cream', 0.00),
(133, 48, 19, '', 1, 140.00, 'Compact', 140.00),
(134, 49, 11, '', 1, 290.00, 'SHAMPOO', 0.00),
(135, 49, 13, '', 2, 140.00, 'cosmetics', 0.00),
(136, 49, 12, '', 1, 120.00, 'Lipstick', 0.00),
(137, 49, 7, '', 1, 200.00, 'conditioner', 0.00),
(138, 50, 13, '', 2, 140.00, 'cosmetics', 0.00),
(139, 50, 11, '', 2, 290.00, 'SHAMPOO', 0.00),
(140, 50, 12, '', 1, 120.00, 'Lipstick', 0.00),
(141, 51, 7, '', 1, 200.00, 'conditioner', 0.00),
(142, 52, 11, '', 2, 290.00, 'SHAMPOO', 0.00),
(143, 53, 15, '', 3, 150.00, 'Conditioner', 0.00),
(144, 53, 13, '', 1, 140.00, 'cosmetics', 0.00),
(145, 54, 12, '', 1, 120.00, 'Lipstick', 100.00),
(146, 54, 13, '', 1, 140.00, 'cosmetics', 100.00),
(147, 55, 13, '', 10, 140.00, 'cosmetics', 100.00),
(148, 55, 11, '', 2, 290.00, 'SHAMPOO', 280.00),
(149, 56, 7, '', 1, 200.00, 'conditioner', 0.00),
(150, 57, 12, '', 1, 120.00, 'Lipstick', 100.00),
(151, 58, 13, '', 1, 140.00, 'cosmetics', 100.00),
(152, 59, 14, '', 1, 100.00, 'Cream', 100.00),
(153, 60, 11, '', 1, 290.00, 'SHAMPOO', 280.00),
(154, 61, 7, '', 2, 200.00, 'conditioner', 0.00),
(155, 61, 12, '', 2, 120.00, 'Lipstick', 0.00),
(156, 61, 13, '', 2, 140.00, 'cosmetics', 0.00),
(157, 62, 7, '', 2, 200.00, 'conditioner', 0.00),
(158, 63, 12, '', 1, 120.00, 'Lipstick', 100.00),
(159, 64, 7, '', 1, 200.00, 'conditioner', 150.00),
(160, 64, 14, '', 1, 100.00, 'Cream', 100.00),
(161, 65, 7, '', 1, 200.00, 'conditioner', 0.00),
(162, 66, 11, '', 3, 290.00, 'SHAMPOO', 280.00),
(163, 67, 7, '', 1, 399.00, 'Thalir Ayurvedic Hair Care Oil- 100ml', 0.00),
(164, 68, 21, '', 1, 200.00, 'Test One', 0.00),
(165, 69, 7, '', 1, 399.00, 'Thalir Ayurvedic Hair Care Oil- 100ml', 0.00),
(166, 70, 7, '', 1, 399.00, 'Thalir Ayurvedic Hair Care Oil- 100ml', 0.00),
(167, 71, 7, '', 1, 399.00, 'Thalir Ayurvedic Hair Care Oil- 100ml', 0.00),
(168, 72, 7, '', 1, 399.00, 'Thalir Ayurvedic Hair Care Oil- 100ml', 0.00),
(169, 73, 7, '', 1, 399.00, 'Thalir Ayurvedic Hair Care Oil- 100ml', 0.00),
(170, 74, 7, '', 2, 399.00, 'Thalir Ayurvedic Hair Care Oil- 100ml', 360.00),
(171, 75, 7, '', 1, 399.00, 'Thalir Ayurvedic Hair Care Oil- 100ml', 0.00),
(172, 76, 7, '', 1, 399.00, 'Thalir Ayurvedic Hair Care Oil- 100ml', 0.00),
(173, 77, 7, '', 1, 399.00, 'Thalir Ayurvedic Hair Care Oil- 100ml', 0.00),
(174, 78, 7, '', 1, 399.00, 'Thalir Ayurvedic Hair Care Oil- 100ml', 0.00),
(175, 79, 7, '', 1, 399.00, 'Thalir Ayurvedic Hair Care Oil- 100ml', 0.00),
(176, 80, 7, '', 1, 399.00, 'Thalir Ayurvedic Hair Care Oil- 100ml', 0.00),
(177, 81, 7, '', 1, 399.00, 'Thalir Ayurvedic Hair Care Oil- 100ml', 0.00),
(178, 82, 7, '', 1, 399.00, 'Thalir Ayurvedic Hair Care Oil- 100ml', 0.00),
(179, 83, 7, '', 1, 399.00, 'Thalir Ayurvedic Hair Care Oil- 100ml', 0.00),
(180, 84, 7, '', 4, 399.00, 'Thalir Ayurvedic Hair Care Oil- 100ml', 0.00),
(181, 85, 7, '', 1, 399.00, 'Thalir Ayurvedic Hair Care Oil- 100ml', 0.00),
(182, 86, 7, '', 3, 399.00, 'Thalir Ayurvedic Hair Care Oil- 100ml', 360.00),
(183, 87, 12, '', 1, 199.00, 'Thalir Aloe Vera Shampoo -100 ml', 170.00),
(184, 88, 7, '', 2, 399.00, 'Thalir Ayurvedic Hair Care Oil- 100ml', 0.00),
(185, 89, 7, '', 1, 399.00, 'Thalir Ayurvedic Hair Care Oil- 100ml', 0.00),
(186, 90, 12, '', 1, 199.00, 'Thalir Aloe Vera Shampoo -100 ml', 170.00),
(187, 91, 12, '', 1, 199.00, 'Thalir Aloe Vera Shampoo -100 ml', 0.00),
(188, 92, 12, '', 1, 199.00, 'Thalir Aloe Vera Shampoo -100 ml', 0.00),
(189, 93, 12, '', 1, 199.00, 'Thalir Aloe Vera Shampoo -100 ml', 0.00),
(190, 94, 12, '', 1, 199.00, 'Thalir Aloe Vera Shampoo -100 ml', 0.00),
(191, 94, 7, '', 1, 399.00, 'Thalir Ayurvedic Hair Care Oil- 100ml', 0.00),
(192, 95, 12, '', 1, 199.00, 'Thalir Aloe Vera Shampoo -100 ml', 0.00),
(193, 95, 7, '', 2, 399.00, 'Thalir Ayurvedic Hair Care Oil- 100ml', 0.00),
(194, 96, 7, '', 4, 399.00, 'Thalir Ayurvedic Hair Care Oil- 100ml', 0.00),
(195, 97, 12, '', 10, 199.00, 'Thalir Aloe Vera Shampoo -100 ml', 0.00),
(196, 98, 12, '', 1, 199.00, 'Thalir Aloe Vera Shampoo -100 ml', 0.00),
(197, 99, 12, '', 1, 199.00, 'Thalir Aloe Vera Shampoo -100 ml', 0.00),
(198, 100, 12, '', 1, 199.00, 'Thalir Aloe Vera Shampoo -100 ml', 0.00),
(199, 101, 12, '', 1, 199.00, 'Thalir Aloe Vera Shampoo -100 ml', 0.00),
(200, 101, 7, '', 1, 399.00, 'Thalir Ayurvedic Hair Care Oil- 100ml', 0.00),
(201, 102, 12, '', 1, 199.00, 'Thalir Aloe Vera Shampoo -100 ml', 0.00),
(202, 103, 12, '', 1, 199.00, 'Thalir Aloe Vera Shampoo -100 ml', 170.00),
(203, 104, 12, '', 1, 199.00, 'Thalir Aloe Vera Shampoo -100 ml', 0.00),
(204, 105, 12, '', 1, 199.00, 'Thalir Aloe Vera Shampoo -100 ml', 0.00),
(205, 105, 7, '', 1, 399.00, 'Thalir Ayurvedic Hair Care Oil- 100ml', 0.00),
(206, 106, 12, '', 1, 199.00, 'Thalir Aloe Vera Shampoo -100 ml', 0.00),
(207, 106, 7, '', 1, 399.00, 'Thalir Ayurvedic Hair Care Oil- 100ml', 0.00),
(208, 107, 7, '', 1, 399.00, 'Thalir Ayurvedic Hair Care Oil- 100ml', 360.00),
(209, 108, 7, '', 1, 399.00, 'Thalir Ayurvedic Hair Care Oil- 100ml', 360.00),
(210, 109, 7, '', 2, 399.00, 'Thalir Ayurvedic Hair Care Oil- 100ml', 0.00),
(211, 110, 12, '', 1, 199.00, 'Thalir Aloe Vera Shampoo -100 ml', 170.00),
(212, 111, 12, '', 1, 199.00, 'Thalir Aloe Vera Shampoo -100 ml', 170.00),
(213, 111, 7, '', 1, 399.00, 'Thalir Ayurvedic Hair Care Oil- 100ml', 360.00),
(214, 112, 7, '', 1, 399.00, 'Thalir Ayurvedic Hair Care Oil- 100ml', 360.00),
(215, 112, 12, '', 1, 199.00, 'Thalir Aloe Vera Shampoo -100 ml', 170.00),
(216, 113, 12, '', 1, 199.00, 'Thalir Aloe Vera Shampoo -100 ml', 0.00),
(217, 114, 7, '', 6, 399.00, 'Thalir Ayurvedic Hair Care Oil- 100ml', 0.00),
(218, 115, 7, '', 1, 399.00, 'Thalir Ayurvedic Hair Care Oil- 100ml', 0.00),
(219, 115, 12, '', 1, 199.00, 'Thalir Aloe Vera Shampoo -100 ml', 0.00),
(220, 116, 7, '', 1, 399.00, 'Thalir Ayurvedic Hair Care Oil- 100ml', 0.00),
(221, 117, 12, '', 1, 199.00, 'Thalir Aloe Vera Shampoo -100 ml', 0.00),
(222, 117, 7, '', 1, 399.00, 'Thalir Ayurvedic Hair Care Oil- 100ml', 0.00),
(223, 118, 7, '', 1, 399.00, 'Thalir Ayurvedic Hair Care Oil- 100ml', 0.00),
(224, 119, 7, '', 1, 360.00, 'Thalir Ayurvedic Hair Care Oil- 100ml', 360.00),
(225, 120, 7, '', 3, 360.00, 'Thalir Ayurvedic Hair Care Oil- 100ml', 360.00),
(226, 121, 12, '', 1, 170.00, 'Thalir Aloe Vera Shampoo -100 ml', 170.00),
(227, 122, 7, '', 1, 360.00, 'Thalir Ayurvedic Hair Care Oil- 100ml', 360.00),
(228, 123, 7, '', 2, 360.00, 'Thalir Ayurvedic Hair Care Oil- 100ml', 360.00),
(229, 124, 7, '', 1, 360.00, 'Thalir Ayurvedic Hair Care Oil- 100ml', 360.00),
(230, 124, 12, '', 1, 170.00, 'Thalir Aloe Vera Shampoo -100 ml', 170.00),
(231, 125, 7, '', 1, 360.00, 'Thalir Ayurvedic Hair Care Oil- 100ml', 360.00),
(232, 125, 12, '', 1, 170.00, 'Thalir Aloe Vera Shampoo -100 ml', 170.00),
(233, 126, 7, '', 1, 360.00, 'Thalir Ayurvedic Hair Care Oil- 100ml', 360.00),
(234, 127, 12, '', 1, 170.00, 'Thalir Aloe Vera Shampoo -100 ml', 170.00),
(235, 128, 12, '', 1, 170.00, 'Thalir Aloe Vera Shampoo -100 ml', 170.00),
(236, 129, 12, '', 1, 170.00, 'Thalir Aloe Vera Shampoo -100 ml3r33434435', 170.00);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `customerid` int(11) NOT NULL DEFAULT 0,
  `addressid` int(11) NOT NULL DEFAULT 0,
  `productid` int(11) NOT NULL DEFAULT 0,
  `unit_name` varchar(32) NOT NULL DEFAULT '',
  `price` double(8,2) NOT NULL DEFAULT 0.00,
  `offerprice` double(8,2) NOT NULL DEFAULT 0.00,
  `quantity` smallint(6) NOT NULL DEFAULT 0,
  `paytype` enum('CoD','Online') NOT NULL DEFAULT 'CoD',
  `paystatus` enum('Success','Pending','Failed') NOT NULL DEFAULT 'Pending',
  `status` enum('New','Accepted','Processing','Cancelled','Delivered','Rejected') NOT NULL DEFAULT 'New',
  `details` varchar(512) NOT NULL DEFAULT '',
  `order_on` datetime DEFAULT NULL,
  `paymentid` varchar(50) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customerid`, `addressid`, `productid`, `unit_name`, `price`, `offerprice`, `quantity`, `paytype`, `paystatus`, `status`, `details`, `order_on`, `paymentid`) VALUES
(1, 4, 0, 0, '', 1220.00, 1220.00, 0, 'CoD', 'Pending', 'Processing', '', '2022-10-28 06:42:00', ''),
(2, 5, 0, 0, '', 150.00, 150.00, 0, 'CoD', 'Pending', 'New', '', '2022-11-01 07:36:00', ''),
(3, 1, 0, 0, '', 280.00, 280.00, 0, 'CoD', 'Pending', 'New', '', '2022-11-01 07:52:00', ''),
(4, 7, 0, 0, '', 100.00, 100.00, 0, 'CoD', 'Pending', 'New', '', '2022-11-02 09:48:00', ''),
(5, 8, 0, 0, '', 430.00, 430.00, 0, 'CoD', 'Pending', 'New', '', '2022-11-02 11:33:00', ''),
(6, 1, 0, 0, '', 430.00, 430.00, 0, 'CoD', 'Pending', 'Cancelled', '', '2022-11-03 09:59:00', ''),
(7, 8, 0, 0, '', 810.00, 810.00, 0, 'CoD', 'Pending', 'Cancelled', '', '2022-11-03 11:38:00', ''),
(8, 8, 0, 0, '', 280.00, 280.00, 0, 'CoD', 'Pending', 'Cancelled', '', '2022-11-04 06:22:00', ''),
(9, 8, 6, 0, '', 100.00, 100.00, 0, 'CoD', 'Pending', 'Cancelled', '', '2022-11-07 11:59:00', ''),
(10, 12, 9, 0, '', 940.00, 940.00, 0, 'CoD', 'Pending', 'New', '', '2022-11-08 13:08:00', ''),
(11, 12, 9, 0, '', 280.00, 280.00, 0, 'Online', 'Pending', 'New', '', '2022-11-08 13:09:00', ''),
(12, 12, 9, 0, '', 460.00, 460.00, 0, 'CoD', 'Pending', 'New', '', '2022-11-08 13:11:00', ''),
(13, 12, 9, 0, '', 280.00, 280.00, 0, 'Online', 'Pending', 'New', '', '2022-11-08 13:18:00', ''),
(14, 12, 9, 0, '', 100.00, 100.00, 0, 'CoD', 'Pending', 'New', '', '2022-11-08 14:12:00', ''),
(15, 8, 6, 0, '', 630.00, 630.00, 0, 'CoD', 'Pending', 'Cancelled', '', '2022-11-10 06:21:00', ''),
(16, 9, 10, 0, '', 860.00, 860.00, 0, 'CoD', 'Pending', 'New', '', '2022-11-10 06:37:00', ''),
(17, 1, 11, 0, '', 430.00, 430.00, 0, 'CoD', 'Pending', 'New', '', '2022-11-11 06:10:00', ''),
(18, 1, 11, 0, '', 850.00, 850.00, 0, 'CoD', 'Pending', 'New', '', '2022-11-14 05:37:00', ''),
(19, 1, 11, 0, '', 100.00, 100.00, 0, 'CoD', 'Pending', 'New', '', '2022-11-14 07:13:00', ''),
(20, 1, 11, 0, '', 150.00, 150.00, 0, 'CoD', 'Pending', 'New', '', '2022-11-14 07:21:00', ''),
(21, 15, 15, 0, '', 4700.00, 4700.00, 0, 'CoD', 'Pending', 'New', '', '2022-11-16 12:12:00', ''),
(22, 17, 16, 0, '', 250.00, 250.00, 0, 'CoD', 'Pending', 'New', '', '2022-11-16 12:26:00', ''),
(23, 1, 12, 0, '', 250.00, 250.00, 0, 'Online', 'Pending', 'New', '', '2022-11-17 11:26:00', ''),
(24, 1, 12, 0, '', 100.00, 100.00, 0, 'Online', 'Pending', 'New', '', '2022-11-17 11:26:00', ''),
(25, 1, 11, 0, '', 100.00, 100.00, 0, 'CoD', 'Pending', 'New', '', '2022-11-17 11:27:00', ''),
(26, 1, 11, 0, '', 100.00, 100.00, 0, 'CoD', 'Pending', 'New', '', '2022-11-17 11:28:00', ''),
(27, 15, 15, 0, '', 630.00, 630.00, 0, 'CoD', 'Pending', 'New', '', '2022-11-17 11:44:00', ''),
(28, 15, 15, 0, '', 250.00, 250.00, 0, 'CoD', 'Pending', 'Cancelled', '', '2022-11-17 11:45:00', ''),
(29, 18, 19, 0, '', 5280.00, 5280.00, 0, 'Online', 'Pending', 'New', '', '2022-11-18 04:38:00', ''),
(30, 18, 19, 0, '', 2260.00, 2260.00, 0, 'CoD', 'Pending', 'New', '', '2022-11-18 04:40:00', ''),
(31, 15, 20, 0, '', 1810.00, 1810.00, 0, 'CoD', 'Pending', 'Cancelled', '', '2022-11-18 04:42:00', ''),
(32, 8, 6, 0, '', 420.00, 420.00, 0, 'Online', 'Pending', 'New', '', '2022-11-18 06:01:00', ''),
(33, 1, 11, 0, '', 100.00, 100.00, 0, 'CoD', 'Pending', 'New', '', '2022-11-18 06:04:00', ''),
(34, 8, 6, 0, '', 400.00, 400.00, 0, 'CoD', 'Pending', 'New', '', '2022-11-18 06:43:00', ''),
(35, 8, 6, 0, '', 250.00, 250.00, 0, 'CoD', 'Pending', 'New', '', '2022-11-18 06:48:00', ''),
(36, 8, 6, 0, '', 4270.00, 4270.00, 0, 'Online', 'Pending', 'Cancelled', '', '2022-11-18 06:50:00', ''),
(37, 15, 20, 0, '', 2010.00, 2010.00, 0, 'CoD', 'Pending', 'Cancelled', '', '2022-11-18 06:58:00', ''),
(38, 1, 11, 0, '', 100.00, 100.00, 0, 'CoD', 'Pending', 'New', '', '2022-11-18 07:20:00', ''),
(39, 15, 20, 0, '', 4220.00, 4220.00, 0, 'CoD', 'Pending', 'Cancelled', '', '2022-11-18 07:31:00', ''),
(40, 15, 20, 0, '', 150.00, 150.00, 0, 'CoD', 'Pending', 'Cancelled', '', '2022-11-18 07:31:00', ''),
(41, 1, 11, 0, '', 100.00, 100.00, 0, 'Online', 'Pending', 'New', '', '2022-11-18 09:18:00', ''),
(42, 1, 11, 0, '', 100.00, 100.00, 0, 'Online', 'Pending', 'New', '', '2022-11-18 09:20:00', ''),
(43, 8, 23, 0, '', 1180.00, 1180.00, 0, 'Online', 'Pending', 'New', '{\"razorpay_payment_id\":\"pay_Khsd04COXvbbs9\",\"payment_status\":\"Success\",\"payment_request_id\":\"order_Khscm734J9RA5m\"}', '2022-11-19 11:25:00', 'pay_Khsd04COXvbbs9'),
(44, 8, 23, 0, '', 350.00, 350.00, 0, 'Online', 'Pending', 'New', '{\"razorpay_payment_id\":\"pay_KhsdxPpHKYBnXr\",\"payment_status\":\"Success\",\"payment_request_id\":\"order_KhsdsHg2TH6lHZ\"}', '2022-11-19 11:26:00', 'pay_KhsdxPpHKYBnXr'),
(45, 8, 23, 0, '', 200.00, 200.00, 0, 'Online', 'Pending', 'New', '{\"razorpay_payment_id\":\"pay_KhsexXqtagYNUW\",\"payment_status\":\"Success\",\"payment_request_id\":\"order_Khseq6nw5mQwvR\"}', '2022-11-19 11:27:00', 'pay_KhsexXqtagYNUW'),
(46, 15, 26, 0, '', 390.00, 390.00, 0, 'CoD', 'Pending', 'New', '', '2022-11-19 11:37:00', ''),
(47, 8, 23, 0, '', 720.00, 720.00, 0, 'Online', 'Pending', 'New', '{\"razorpay_payment_id\":\"pay_KiaR3IYeqe5Ojl\",\"payment_status\":\"Success\",\"payment_request_id\":\"order_KiaQwHUs7knWlA\"}', '2022-11-21 06:16:00', 'pay_KiaR3IYeqe5Ojl'),
(48, 1, 11, 0, '', 140.00, 140.00, 0, 'CoD', 'Pending', 'New', '', '2022-11-21 06:42:00', ''),
(49, 15, 26, 0, '', 730.00, 730.00, 0, 'Online', 'Pending', 'New', '{\"razorpay_payment_id\":\"pay_KibQIUJsFUQZU1\",\"payment_status\":\"Success\",\"payment_request_id\":\"order_KibPkul2FJe7AF\"}', '2022-11-21 07:14:00', 'pay_KibQIUJsFUQZU1'),
(50, 8, 23, 0, '', 860.00, 860.00, 0, 'Online', 'Pending', 'New', '{\"razorpay_payment_id\":\"pay_KibgB3Xr6UkBrq\",\"payment_status\":\"Success\",\"payment_request_id\":\"order_Kibg5qQT1SZJ7F\"}', '2022-11-21 07:29:00', 'pay_KibgB3Xr6UkBrq'),
(51, 1, 11, 0, '', 150.00, 150.00, 0, 'Online', 'Pending', 'New', '', '2022-11-21 08:00:00', ''),
(52, 1, 11, 0, '', 560.00, 560.00, 0, 'Online', 'Pending', 'New', '', '2022-11-21 08:01:00', ''),
(53, 8, 23, 0, '', 550.00, 550.00, 0, 'Online', 'Pending', 'New', '', '2022-11-21 09:35:00', ''),
(54, 8, 23, 0, '', 200.00, 200.00, 0, 'CoD', 'Pending', 'New', '', '2022-11-21 09:36:00', ''),
(55, 10, 27, 0, '', 1560.00, 1560.00, 0, 'CoD', 'Pending', 'New', '', '2022-11-21 11:58:00', ''),
(56, 10, 27, 0, '', 150.00, 150.00, 0, 'Online', 'Pending', 'Accepted', '{\"razorpay_payment_id\":\"pay_KigXU76BUQScs3\",\"payment_status\":\"Success\",\"payment_request_id\":\"order_KigXKOLrWXtKGL\"}', '2022-11-21 12:14:00', 'pay_KigXU76BUQScs3'),
(57, 10, 27, 0, '', 100.00, 100.00, 0, 'CoD', 'Pending', 'Processing', '', '2022-11-21 12:15:00', ''),
(58, 10, 27, 0, '', 100.00, 100.00, 0, 'CoD', 'Pending', 'Rejected', '', '2022-11-21 12:15:00', ''),
(59, 10, 27, 0, '', 100.00, 100.00, 0, 'CoD', 'Pending', 'New', '', '2022-11-21 12:16:00', ''),
(60, 10, 27, 0, '', 280.00, 280.00, 0, 'CoD', 'Pending', 'Cancelled', '', '2022-11-21 12:16:00', ''),
(61, 1, 17, 0, '', 700.00, 700.00, 0, 'Online', 'Pending', 'New', '', '2022-11-22 07:36:00', ''),
(62, 24, 28, 0, '', 300.00, 300.00, 0, 'Online', 'Pending', 'New', '', '2022-11-26 06:48:00', ''),
(63, 8, 6, 0, '', 100.00, 100.00, 0, 'CoD', 'Pending', 'New', '', '2022-12-03 06:16:00', ''),
(64, 8, 22, 0, '', 250.00, 250.00, 0, 'CoD', 'Pending', 'New', '', '2022-12-09 04:28:00', ''),
(65, 8, 22, 0, '', 150.00, 150.00, 0, 'Online', 'Pending', 'New', '{\"razorpay_payment_id\":\"pay_KqBvn9fVZBOSkQ\",\"payment_status\":\"Success\",\"payment_request_id\":\"order_KqBv1Oy4A0LGUS\"}', '2022-12-10 09:01:00', 'pay_KqBvn9fVZBOSkQ'),
(66, 9, 10, 0, '', 840.00, 840.00, 0, 'CoD', 'Pending', 'Cancelled', '', '2023-01-03 10:09:00', ''),
(67, 27, 29, 0, '', 360.00, 360.00, 0, 'Online', 'Pending', 'New', '', '2023-01-03 20:29:00', ''),
(68, 29, 30, 0, '', 180.00, 180.00, 0, 'Online', 'Pending', 'New', '', '2023-02-01 05:28:00', ''),
(69, 29, 30, 0, '', 360.00, 360.00, 0, 'Online', 'Pending', 'New', '', '2023-02-01 05:30:00', ''),
(70, 31, 31, 0, '', 360.00, 360.00, 0, 'Online', 'Pending', 'New', '{\"razorpay_payment_id\":\"pay_LEM6Nbvbnt0OYC\",\"payment_status\":\"Failed\",\"payment_request_id\":\"order_LEM5zl1HbitEav\"}', '2023-02-09 13:03:00', 'pay_LEM6Nbvbnt0OYC'),
(71, 31, 31, 0, '', 360.00, 360.00, 0, 'Online', 'Pending', 'New', '', '2023-02-09 13:30:00', ''),
(72, 8, 22, 0, '', 360.00, 360.00, 0, 'Online', 'Pending', 'New', '', '2023-02-10 04:53:00', ''),
(73, 8, 22, 0, '', 360.00, 360.00, 0, 'Online', 'Pending', 'New', '', '2023-02-10 04:59:00', ''),
(74, 8, 22, 0, '', 720.00, 720.00, 0, 'CoD', 'Pending', 'New', '', '2023-02-10 05:00:00', ''),
(75, 8, 23, 0, '', 360.00, 360.00, 0, 'Online', 'Pending', 'New', '', '2023-02-10 05:02:00', ''),
(76, 8, 23, 0, '', 360.00, 360.00, 0, 'Online', 'Pending', 'New', '', '2023-02-10 05:02:00', ''),
(77, 8, 23, 0, '', 360.00, 360.00, 0, 'Online', 'Pending', 'New', '', '2023-02-10 05:05:00', ''),
(78, 8, 23, 0, '', 360.00, 360.00, 0, 'Online', 'Pending', 'New', '', '2023-02-10 06:06:00', ''),
(79, 8, 23, 0, '', 360.00, 360.00, 0, 'Online', 'Pending', 'New', '', '2023-02-10 06:07:00', ''),
(80, 8, 23, 0, '', 360.00, 360.00, 0, 'Online', 'Pending', 'New', '', '2023-02-10 06:29:00', ''),
(81, 8, 23, 0, '', 360.00, 360.00, 0, 'Online', 'Pending', 'New', '', '2023-02-10 06:36:00', ''),
(82, 8, 23, 0, '', 360.00, 360.00, 0, 'Online', 'Pending', 'Cancelled', '', '2023-02-10 06:43:00', ''),
(83, 8, 23, 0, '', 360.00, 360.00, 0, 'Online', 'Pending', 'New', '', '2023-02-10 07:13:00', ''),
(84, 8, 23, 0, '', 1440.00, 1440.00, 0, 'Online', 'Pending', 'New', '', '2023-02-10 07:31:00', ''),
(85, 8, 22, 0, '', 360.00, 360.00, 0, 'Online', 'Pending', 'New', '', '2023-02-11 05:44:00', ''),
(86, 29, 30, 0, '', 1080.00, 1080.00, 0, 'CoD', 'Pending', 'New', '', '2023-02-13 05:22:00', ''),
(87, 29, 30, 0, '', 170.00, 170.00, 0, 'CoD', 'Pending', 'New', '', '2023-02-13 05:22:00', ''),
(88, 29, 30, 0, '', 720.00, 720.00, 0, 'Online', 'Pending', 'New', '{\"razorpay_payment_id\":\"LGzbq7V7cm3ik4\",\"payment_status\":\"Failed\",\"payment_request_id\":\"order_LGzO3UwbeG4fOT\"}', '2023-02-16 04:47:00', 'LGzbq7V7cm3ik4'),
(89, 8, 22, 0, '', 360.00, 360.00, 0, 'Online', 'Pending', 'New', '', '2023-03-08 07:21:00', ''),
(90, 8, 6, 0, '', 170.00, 170.00, 0, 'CoD', 'Pending', 'New', '', '2023-03-17 04:46:00', ''),
(91, 8, 6, 0, '', 170.00, 170.00, 0, 'Online', 'Pending', 'New', '', '2023-03-17 04:55:00', ''),
(92, 8, 6, 0, '', 170.00, 170.00, 0, 'Online', 'Pending', 'New', '', '2023-03-17 04:56:00', ''),
(93, 8, 6, 0, '', 170.00, 170.00, 0, 'Online', 'Pending', 'New', '', '2023-03-17 05:54:00', ''),
(94, 8, 6, 0, '', 530.00, 530.00, 0, 'Online', 'Pending', 'New', '', '2023-03-17 06:29:00', ''),
(95, 8, 6, 0, '', 890.00, 890.00, 0, 'Online', 'Pending', 'New', '', '2023-03-21 06:34:00', ''),
(96, 8, 22, 0, '', 1440.00, 1440.00, 0, 'Online', 'Pending', 'New', '', '2023-03-23 08:48:00', ''),
(97, 8, 22, 0, '', 1700.00, 1700.00, 0, 'Online', 'Pending', 'New', '', '2023-03-23 10:41:00', ''),
(98, 34, 32, 0, '', 170.00, 170.00, 0, 'Online', 'Pending', 'New', '{\"razorpay_payment_id\":\"undefined\",\"payment_status\":\"Failed\",\"payment_request_id\":\"Lg3QLmjMaFRC4c\"}', '2023-04-20 12:59:00', 'undefined'),
(99, 34, 32, 0, '', 170.00, 170.00, 0, 'Online', 'Pending', 'New', '{\"razorpay_payment_id\":\"pay_Lg3STs41jIArk8\",\"payment_status\":\"Failed\",\"payment_request_id\":\"order_Lg3SMnOiTjiPbh\"}', '2023-04-20 13:01:00', 'pay_Lg3STs41jIArk8'),
(100, 34, 32, 0, '', 170.00, 170.00, 0, 'Online', 'Pending', 'New', '{\"razorpay_payment_id\":\"pay_Lg3TvQwbNAyILV\",\"payment_status\":\"Failed\",\"payment_request_id\":\"order_Lg3Tkjswf1p4EU\"}', '2023-04-20 13:02:00', 'pay_Lg3TvQwbNAyILV'),
(101, 32, 33, 0, '', 530.00, 530.00, 0, 'Online', 'Pending', 'New', '', '2023-04-21 21:04:00', ''),
(102, 32, 33, 0, '', 170.00, 170.00, 0, 'Online', 'Pending', 'New', '', '2023-04-21 21:04:00', ''),
(103, 32, 33, 0, '', 170.00, 170.00, 0, 'CoD', 'Pending', 'New', '', '2023-04-21 22:09:00', ''),
(104, 32, 34, 0, '', 170.00, 170.00, 0, 'Online', 'Success', 'New', '{\"razorpay_payment_id\":\"pay_LgbYtp5BDe0uDz\",\"payment_status\":\"Success\",\"payment_request_id\":\"order_LgbYcOT4RF0dwe\"}', '2023-04-21 22:22:00', 'pay_LgbYtp5BDe0uDz'),
(105, 32, 34, 0, '', 530.00, 530.00, 0, 'Online', 'Pending', 'New', '{\"razorpay_payment_id\":\"pay_LgbcriALz2kKcW\",\"payment_status\":\"Success\",\"payment_request_id\":\"order_LgbclGE4Iyhixo\"}', '2023-04-21 22:26:00', 'pay_LgbcriALz2kKcW'),
(106, 32, 33, 0, '', 530.00, 530.00, 0, 'Online', 'Success', 'New', '{\"razorpay_payment_id\":\"pay_LgbpfWncl8zB6w\",\"payment_status\":\"Success\",\"payment_request_id\":\"order_LgbpYzUxIjH6wX\"}', '2023-04-21 22:38:00', 'pay_LgbpfWncl8zB6w'),
(107, 32, 35, 0, '', 360.00, 360.00, 0, 'CoD', 'Pending', 'New', '', '2023-04-21 22:50:00', ''),
(108, 28, 36, 0, '', 360.00, 360.00, 0, 'CoD', 'Pending', 'New', '', '2023-04-22 12:00:00', ''),
(109, 28, 37, 0, '', 720.00, 720.00, 0, 'Online', 'Success', 'New', '{\"razorpay_payment_id\":\"pay_LgpX1djBfTDadp\",\"payment_status\":\"Success\",\"payment_request_id\":\"order_LgpWUkGMJXggzf\"}', '2023-04-22 12:02:00', 'pay_LgpX1djBfTDadp'),
(110, 32, 39, 0, '', 170.00, 170.00, 0, 'CoD', 'Pending', 'New', '', '2023-04-22 20:29:00', ''),
(111, 32, 40, 0, '', 530.00, 575.00, 0, 'CoD', 'Success', 'Accepted', '', '2023-04-22 20:49:00', ''),
(112, 35, 43, 0, '', 530.00, 575.00, 0, 'CoD', 'Success', 'Accepted', '', '2023-04-27 11:06:00', ''),
(113, 35, 44, 0, '', 170.00, 215.00, 0, 'Online', 'Failed', 'New', '{\"razorpay_payment_id\":\"pay_LitFDsvsZtftk0\",\"payment_status\":\"Failed\",\"payment_request_id\":\"order_LitElIndyQZfbx\"}', '2023-04-27 11:21:00', 'pay_LitFDsvsZtftk0'),
(114, 36, 45, 0, '', 2160.00, 2205.00, 0, 'Online', 'Success', 'Delivered', '{\"razorpay_payment_id\":\"pay_LkM6LGL2qFOCrZ\",\"payment_status\":\"Success\",\"payment_request_id\":\"order_LkM2axYhCL6N6d\"}', '2023-05-01 09:48:00', 'pay_LkM6LGL2qFOCrZ'),
(115, 37, 46, 0, '', 530.00, 575.00, 0, 'Online', 'Failed', 'Rejected', '{\"razorpay_payment_id\":\"pay_LlY7ZqpHv41PZV\",\"payment_status\":\"Failed\",\"payment_request_id\":\"order_LlY7KPcRSqt0lG\"}', '2023-05-04 10:15:00', 'pay_LlY7ZqpHv41PZV'),
(116, 37, 46, 0, '', 360.00, 405.00, 0, 'Online', 'Failed', 'Rejected', '', '2023-05-04 10:18:00', ''),
(117, 32, 34, 0, '', 530.00, 575.00, 0, 'Online', 'Pending', 'New', '', '2023-05-06 20:52:00', ''),
(118, 32, 34, 0, '', 360.00, 405.00, 0, 'Online', 'Pending', 'New', '', '2023-05-06 20:55:00', ''),
(119, 32, 34, 0, '', 360.00, 405.00, 0, 'CoD', 'Pending', 'New', '', '2023-05-06 20:57:00', ''),
(120, 32, 34, 0, '', 1080.00, 1125.00, 0, 'Online', 'Pending', 'New', '', '2023-05-06 20:57:00', ''),
(121, 32, 34, 0, '', 170.00, 215.00, 0, 'CoD', 'Pending', 'New', '', '2023-05-07 02:31:00', ''),
(122, 28, 48, 0, '', 360.00, 405.00, 0, 'Online', 'Success', 'New', '{\"razorpay_payment_id\":\"pay_LmWZmLzILsp635\",\"payment_status\":\"Success\",\"payment_request_id\":\"order_LmWZbjl7d59UTt\"}', '2023-05-07 02:54:00', 'pay_LmWZmLzILsp635'),
(123, 28, 49, 0, '', 720.00, 765.00, 0, 'Online', 'Success', 'Processing', '{\"razorpay_payment_id\":\"pay_LnHB235diLL9ZY\",\"payment_status\":\"Failed\",\"payment_request_id\":\"order_LnHAgMQWYsmXL3\"}', '2023-05-09 00:29:00', 'pay_LnHB235diLL9ZY'),
(124, 38, 52, 0, '', 530.00, 575.00, 0, 'Online', 'Success', 'Delivered', '{\"razorpay_payment_id\":\"pay_Lnmx92HKRO4DQp\",\"payment_status\":\"Success\",\"payment_request_id\":\"order_Lnmwy7oR2jgDBE\"}', '2023-05-10 07:34:00', 'pay_Lnmx92HKRO4DQp'),
(125, 39, 53, 0, '', 530.00, 575.00, 0, 'Online', 'Success', 'Delivered', '{\"razorpay_payment_id\":\"pay_LqbyHIUbCEdX8k\",\"payment_status\":\"Success\",\"payment_request_id\":\"order_Lqbxm9RqznhVx6\"}', '2023-05-17 10:46:00', 'pay_LqbyHIUbCEdX8k'),
(126, 40, 55, 0, '', 360.00, 405.00, 0, 'Online', 'Success', 'Delivered', '{\"razorpay_payment_id\":\"pay_LrttusFgnCB2jR\",\"payment_status\":\"Success\",\"payment_request_id\":\"order_LrttdPczCnbLYL\"}', '2023-05-20 16:58:00', 'pay_LrttusFgnCB2jR'),
(127, 41, 56, 0, '', 170.00, 215.00, 0, 'Online', 'Success', 'New', '{\"razorpay_payment_id\":\"pay_LyaBkbIynpCjl4\",\"payment_status\":\"Failed\",\"payment_request_id\":\"undefined\"}', '2023-06-06 14:13:00', 'pay_LyaBkbIynpCjl4'),
(128, 41, 56, 0, '', 170.00, 215.00, 0, 'Online', 'Success', 'Processing', '', '2023-06-06 14:15:00', ''),
(129, 41, 56, 0, '', 170.00, 215.00, 0, 'Online', 'Pending', 'New', '', '2023-06-16 14:45:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `cat_id` int(11) NOT NULL DEFAULT 0,
  `subcat_id` int(11) NOT NULL DEFAULT 0,
  `stock_avalible` int(11) NOT NULL DEFAULT 1,
  `name` varchar(128) NOT NULL DEFAULT '',
  `desc` varchar(1024) NOT NULL DEFAULT '',
  `disclaimer` varchar(4096) NOT NULL DEFAULT '',
  `price` double(8,2) NOT NULL DEFAULT 0.00,
  `offerprice` double(8,2) NOT NULL DEFAULT 0.00,
  `best_seller` enum('0','1') NOT NULL DEFAULT '0',
  `featured` enum('0','1') NOT NULL DEFAULT '0',
  `trending` enum('0','1') NOT NULL DEFAULT '0',
  `status` enum('Available','Not Available') NOT NULL DEFAULT 'Not Available',
  `image` varchar(128) NOT NULL DEFAULT '',
  `image2` varchar(128) NOT NULL DEFAULT '',
  `image3` varchar(128) NOT NULL DEFAULT '',
  `image4` varchar(128) NOT NULL DEFAULT '',
  `image5` varchar(128) DEFAULT NULL,
  `image6` varchar(128) DEFAULT NULL,
  `heading` varchar(128) NOT NULL DEFAULT '',
  `sub_heading` varchar(256) NOT NULL DEFAULT '',
  `features` varchar(512) NOT NULL DEFAULT '',
  `row_status` enum('New','Delete') NOT NULL DEFAULT 'New'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `cat_id`, `subcat_id`, `stock_avalible`, `name`, `desc`, `disclaimer`, `price`, `offerprice`, `best_seller`, `featured`, `trending`, `status`, `image`, `image2`, `image3`, `image4`, `image5`, `image6`, `heading`, `sub_heading`, `features`, `row_status`) VALUES
(6, 4, 0, -4, 'moisturizer', '<p>Lorem Ipsum is simply dummy text of the printing and types industry.&nbsp;</p>', '', 200.00, 180.00, '1', '1', '1', 'Available', 'uploads/products/moisturizer230526.jpg', '', '', '', NULL, NULL, 'moisturizer', '', 'Features', 'Delete'),
(7, 2, 1, 37, 'Thalir Ayurvedic Hair Care Oil- 100ml', '<p>Thalir Ayurvedic&nbsp;Hair care&nbsp;oil gives your hair the necessary nourishment to help fight hair and scalp problems. It is a nutrient-rich oil that provides soothing care to dull, lifeless, weak hair and tired scalp to help transform their texture and health. Apply Thalir hair care oil on the hair strands to smooth down and seal the cuticles and restore hair&rsquo;s natural shine and softness. Regular use of the Thalir oil helps to grow hair faster, almost 4 to 6 weeks for complete hair growth.</p>', '<p>1. The product contains natural ingredients &amp; may change color and fragrance, without losing effectiveness.</p>\r\n\r\n<p>2. Even natural ingredients can cause and trigger existing allergies. A patch test is recommended.</p>\r\n\r\n<p>3.<em>&nbsp;</em>In case of any rashes or allergy, please consult a specialist.</p>\r\n\r\n<p>4. All images shown are for illustration purpose only, actual results may vary.&nbsp;</p>\r\n\r\n<p>5. For external use only. Store in a cool &amp; dry place.</p>\r\n\r\n<p>6. Both Men and women can use at age of 10 years and above</p>', 399.00, 360.00, '0', '1', '1', 'Available', 'uploads/products/thalir-ayurvedic-hair-care-oil-100ml020205.jpeg', 'uploads/products/thalir-ayurvedic-hair-care-oil-100ml4011142.png', 'uploads/products/thalir-ayurvedic-hair-care-oil-100ml4111143.png', 'uploads/products/thalir-ayurvedic-hair-care-oil-100ml4111144.png', '', '', '', '', 'Solution for Hair loss & Dandruff | Boosts Hair Growth', 'New'),
(10, 3, 0, -3, 'Shampoo', '<p>Tackle hair loss, scalp buildups and dull, weak hair with Thalir Aloe vera.The shampoo, formulated with natural ingredients, helps strengthen hair follicles and clarify blocked roots. Suitable for all hair types, this shampoo cleanses and moisturizes your hair and scalp and helps to improve hair texture. It is infused with Pure Aloe vera extract with strong antioxidant properties that help protect the scalp and hair, promotes blood circulation to the roots. Aloe vera rich in 75 potentially active constituents that are vitamins, enzymes, minerals, sugars, lignin, saponins, salicylic acids and amino acids.Vitamins It contains vitamins A (beta-carotene), C and E, which are antioxidants. It also contains vitamin B12, folic acid, and choline. Nourishes scalp and roots. This Shampoo keeps the scalp clean and hair conditioned. It can be used to hydrate the roots and scalp and help make hair look healthy and lustrous.</p>', '', 450.00, 430.00, '1', '0', '1', 'Available', 'uploads/products/shampoo330527.png', '', '', '', NULL, NULL, 'THALIR ALOE VERA SHAMPOO FOR SMOOTH-SILKY HAIR DANDRUFF CLEANER-100 ML', '', 'Features', 'Delete'),
(11, 3, 0, -1, 'SHAMPOO', '<p>Tackle hair loss, scalp buildups and dull, weak hair with Thalir Aloe vera.The shampoo, formulated with natural ingredients, helps strengthen hair follicles and clarify blocked roots. Suitable for all hair types, this shampoo cleanses and moisturizes your hair and scalp and helps to improve hair texture. It is infused with Pure Aloe vera extract with strong antioxidant properties that help protect the scalp and hair, promotes blood circulation to the roots. Aloe vera rich in 75 potentially active constituents that are vitamins, enzymes, minerals, sugars, lignin, saponins, salicylic acids and amino acids.Vitamins It contains vitamins A (beta-carotene), C and E, which are antioxidants. It also contains vitamin B12, folic acid, and choline. Nourishes scalp and roots. This Shampoo keeps the scalp clean and hair conditioned. It can be used to hydrate the roots and scalp and help make hair look healthy and lustrous.</p>', '', 290.00, 280.00, '1', '0', '1', 'Available', 'uploads/products/aloe-vera-shampoo380527.png', 'uploads/products/aloe-vera-shampoo3805272.png', 'uploads/products/aloe-vera-shampoo3805273.jpg', 'uploads/products/aloe-vera-shampoo3805274.jpg', NULL, NULL, 'THALIR ALOE VERA SHAMPOO FOR SMOOTH-SILKY HAIR DANDRUFF CLEANER-100 ML', '', 'Features', 'Delete'),
(12, 2, 2, 42, 'Thalir Aloe Vera Shampoo -100 ml3r33434435', '<p>Tackle hair loss, scalp buildups and dull, weak hair with Thalir Aloe vera.The shampoo, formulated with natural ingredients, helps strengthen hair follicles and clarify blocked roots. Suitable for all hair types, this shampoo cleanses and moisturizes your hair and scalp and helps to improve hair texture. It is infused with Pure Aloe vera extract with strong antioxidant properties that help protect the scalp and hair, promotes blood circulation to the roots. Aloe vera rich in 75 potentially active constituents that are vitamins, enzymes, minerals, sugars, lignin, saponins, salicylic acids and amino acids.Vitamins It contains vitamins A (beta-carotene), C and E, which are antioxidants. It also contains vitamin B12, folic acid, and choline. Nourishes scalp and roots. This Shampoo keeps the scalp clean and hair conditioned. It can be used to hydrate the roots and scalp and help make hair look healthy and lustrous.</p>', '<p>1. The product contains natural ingredients &amp; may change color and fragrance, without losing effectiveness.</p>\r\n\r\n<p>2. Even natural ingredients can cause and trigger existing allergies. A patch test is recommended.</p>\r\n\r\n<p>3. In case of any rashes or allergy, please consult a specialist.</p>\r\n\r\n<p>4. All images shown are for illustration purpose only, actual results may vary.</p>\r\n\r\n<p>5. For external use only. Store in a cool &amp; dry place.</p>', 199.00, 170.00, '0', '1', '1', 'Available', 'uploads/products/thalir-aloe-vera-shampoo-100-ml371114.png', 'uploads/products/thalir-aloe-vera-shampoo-100-ml3711142.png', 'uploads/products/thalir-aloe-vera-shampoo-100-ml3711143.png', 'uploads/products/thalir-aloe-vera-shampoo-100-ml3711144.png', 'uploads/products/thalir-aloe-vera-shampoo-100-ml3r334344352603065.jpg', '', '', '', 'Reduces Hair Fall & Makes Hair Soft Shine', 'New'),
(13, 2, 0, -18, 'cosmetics', '<p>The reason why we adhere to the strictest ingredient sourcing channels, the most disciplined process of preparation, at the hands of only the most qualified experts. creating every single product to perfection. Our root to rack systems and quality checks follow international standards of hygiene, to bring you a plethora of unmatched products that make every life healthy, happy and beautiful: both inside and out, because at Thalir it is all about being honest to the core.</p>', '', 140.00, 100.00, '1', '1', '1', 'Available', 'uploads/products/cosmetics050429.jpg', 'uploads/products/cosmetics0504292.jpg', 'uploads/products/cosmetics0504293.jpg', 'uploads/products/cosmetics0504294.jpg', NULL, NULL, 'cosmetics heading', 'Product sub heading', 'Product features', 'Delete'),
(14, 2, 0, -9, 'Cream', '<p>The reason why we adhere to the strictest ingredient sourcing channels, the most disciplined process of preparation, at the hands of only the most qualified experts. creating every single product to perfection. Our root to rack systems and quality checks follow international standards of hygiene, to bring you a plethora of unmatched products that make every life healthy, happy and beautiful: both inside and out, because at Thalir it is all about being honest to the core.</p>', '', 100.00, 100.00, '0', '0', '0', 'Available', 'uploads/products/cream490407.png', '', '', '', NULL, NULL, 'Cream', 'Cream', 'Features', 'Delete'),
(15, 3, 0, -8, 'Conditioner', '<p>The Thalir Natural Solutions Group is a leading consumer products and wellness service provider in the Ayurveda segment in India. Hailing from an ancient tradition of Ayurveda, Thalir is known for the authenticity of the products and services.</p>', '', 150.00, 150.00, '1', '0', '0', 'Available', 'uploads/products/conditioner590407.png', '', '', '', NULL, NULL, 'Conditioner', 'Conditioner', 'Features', 'Delete'),
(16, 3, 0, -9, 'Serum', '<p>The Thalir Natural Solutions Group is a leading consumer products and wellness service provider in the Ayurveda segment in India. Hailing from an ancient tradition of Ayurveda, Thalir is known for the authenticity of the products and services.</p>', '', 200.00, 200.00, '1', '0', '0', 'Available', 'uploads/products/serum040507.png', '', '', '', NULL, NULL, 'Serum', 'Serum', 'Features', 'Delete'),
(17, 4, 0, -3, 'Powder', '<p>The Thalir Natural Solutions Group is a leading consumer products and wellness service provider in the Ayurveda segment in India. Hailing from an ancient tradition of Ayurveda, Thalir is known for the authenticity of the products and services.</p>', '', 180.00, 180.00, '1', '0', '0', 'Available', 'uploads/products/powder090507.png', '', '', '', NULL, NULL, 'Powder', 'Powder', 'Features', 'Delete'),
(18, 4, 0, -10, 'Sunscreen', '<p>The Thalir Natural Solutions Group is a leading consumer products and wellness service provider in the Ayurveda segment in India. Hailing from an ancient tradition of Ayurveda, Thalir is known for the authenticity of the products and services.</p>', '', 250.00, 250.00, '1', '0', '0', 'Available', 'uploads/products/sunscreen120507.png', '', '', '', NULL, NULL, 'Sunscreen', 'Sunscreen', 'Features', 'Delete'),
(19, 4, 0, 0, 'Compact', '<p>The Thalir Natural Solutions Group is a leading consumer products and wellness service provider in the Ayurveda segment in India. Hailing from an ancient tradition of Ayurveda, Thalir is known for the authenticity of the products and services.</p>', '', 140.00, 140.00, '1', '0', '0', 'Not Available', 'uploads/products/compact160507.png', '', '', '', NULL, NULL, 'Compact', 'Compact', 'Features', 'Delete'),
(20, 2, 0, 1, 'Foundation', '<p>The Thalir Natural Solutions Group is a leading consumer products and wellness service provider in the Ayurveda segment in India. Hailing from an ancient tradition of Ayurveda, Thalir is known for the authenticity of the products and services.</p>', '', 210.00, 210.00, '0', '0', '0', 'Available', 'uploads/products/foundation190507.png', '', '', '', NULL, NULL, 'Foundation', 'Foundation', '', 'Delete'),
(21, 2, 0, 0, 'Test One', '<p><strong>dsf fsdf sdf sdf</strong></p>', '<p>1. The product contains natural ingredients &amp; may change color and fragrance, without losing effectiveness.</p>\r\n\r\n<p>2. Even natural ingredients can cause and trigger existing allergies. A patch test is recommended.</p>\r\n\r\n<p>3. In case of any rashes or allergy, please consult a specialist.</p>', 200.00, 180.00, '1', '0', '0', 'Available', 'uploads/products/test-one050814.png', 'uploads/products/test-one4511052.png', '', '', NULL, NULL, 'Something goes here', 'Something goes here', 'Something goes here, Something goes here', 'Delete'),
(22, 2, 1, 1, 'test', '<p>aaaaaaaaaa</p>', '<p>aaaaaaaaaaaaaa</p>', 3.00, 50.00, '0', '0', '0', 'Available', 'uploads/products/test541131.jpg', 'uploads/products/test5411312.jpg', 'uploads/products/test5411313.jpg', 'uploads/products/test5411314.jpg', NULL, NULL, 'zzzz', 'fgggggf', 'yghygguy', 'Delete'),
(26, 2, 2, 1, 'ereee', '<p>ergrererrtrtyrtrt</p>', '<p>wefwfwfwwww</p>', 500.00, 200.00, '0', '1', '1', 'Available', 'uploads/products/ereee340306.jpg', 'uploads/products/ereee3403062.png', '', '', '', '', 'ertete', 'ertetetettertete', 'dfbfdddd', 'New'),
(27, 2, 1, 1, 'hghg', '<p>hhhj</p>', '<p>jjjhhjhj</p>', 120.00, 100.00, '0', '0', '0', 'Available', 'uploads/products/hghg350216.jpg', '', '', '', '', '', '', '', '', 'New');

-- --------------------------------------------------------

--
-- Table structure for table `product_benefits`
--

CREATE TABLE `product_benefits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `productid` int(11) NOT NULL DEFAULT 0,
  `title` varchar(64) NOT NULL DEFAULT '',
  `desc` varchar(1024) NOT NULL DEFAULT '',
  `image` varchar(128) NOT NULL DEFAULT '',
  `disp_order` smallint(6) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_benefits`
--

INSERT INTO `product_benefits` (`id`, `productid`, `title`, `desc`, `image`, `disp_order`, `created_at`, `updated_at`) VALUES
(1, 11, 'Product Benefit', 'Product Benefit desc Product Benefit desc Product Benefit desc Product Benefit desc Product Benefit desc Product Benefit desc Product Benefit desc Product Benefit desc', '/uploads/benefits/ProductBenefit_321128.jpg', 1, NULL, NULL),
(2, 11, 'Product Benefit', 'Product Benefit desc Product Benefit desc Product Benefit desc Product Benefit desc Product Benefit desc Product Benefit desc Product Benefit desc Product Benefit desc', '/uploads/benefits/ProductBenefit_331128.jpg', 1, NULL, NULL),
(6, 19, 'Removes Sun Tan', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', '/uploads/benefits/RemovesSunTan_230621.png', 1, NULL, NULL),
(19, 13, 'Lorem Ipsum', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', '/uploads/benefits/LoremIpsum_030502.webp', 1, NULL, NULL),
(21, 14, 'Lorem Ipsum', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', '/uploads/benefits/LoremIpsum_250502.jpg', 1, NULL, NULL),
(26, 7, '', 'Care for dry and irritated scalp and breakage-prone, graying hair with Thalir Hair oil. This all-natural hair oil delivers the nutrients directly to your roots and protect the weak strands with its conditioning effect. It supports in reviving your breakage-prone hair and soothe irritated scalp. It is infused with the goodness of aloe barbadensis also called king of herbs and coconut oil. These potent actives are blended with hair-nourishing, cold-pressed oils rich in omega fatty acids, vitamin E, minerals and antioxidants. These help to condition dry scalp, nourish the roots, repair brittle strands, control graying, keep hair loss in check, boost volume and shine. it is a lightweight oil that gets easily absorbed into the scalp. Ideal for those with dry scalp and fragile hair. Results may vary depending on usage and condition of your hair.', '/uploads/benefits/_021201.png', 1, NULL, NULL),
(29, 12, '', 'Free from harmful sulphates, Our Thalir Aloe Vera Shampoo has the goodness of Aloe Vera that helps in reducing hair fall and Coconut oil that is gentle on the hair and keeps it clean, strong and nourished this also Loaded with Plant Aloe Vera it gently cleanses hair & prevents hair damage caused due to washing. It forms a protective layer that strengthens hair from within. Gentle surfactants cleanse hair & scalp without stripping. Plant Aloe Vera prevents damage & dryness, maintains the moisture balance of hair, and leaves hair soft & smooth, and keeps the hair roots strong.', '/uploads/benefits/Benefitsshampooimage_270131.png', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_colors`
--

CREATE TABLE `product_colors` (
  `id` int(10) UNSIGNED NOT NULL,
  `productid` int(11) NOT NULL DEFAULT 0,
  `name` varchar(64) NOT NULL DEFAULT '',
  `code` varchar(64) NOT NULL DEFAULT '',
  `status` enum('Enabled','Disabled') NOT NULL DEFAULT 'Enabled'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_faqs`
--

CREATE TABLE `product_faqs` (
  `id` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `question` varchar(256) NOT NULL DEFAULT '',
  `answer` varchar(512) DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `product_faqs`
--

INSERT INTO `product_faqs` (`id`, `productid`, `question`, `answer`, `created_at`, `updated_at`) VALUES
(3, 19, 'Why do i see different prices for the same product?', 'You could see,different prices for the same product,as it could be listed by many Sellers.', NULL, NULL),
(4, 19, 'Is it necessary to have an account to shop on Thalir?', 'Yes,it\'s necessary to log into your Thalir account to shop.Shopping as a logged-in user is fast & convenient and also provides extra security.', NULL, NULL),
(5, 19, 'Do sellers on Thalir ship internationally?', 'Currently,sellers on Thalir only ship within India.', NULL, NULL),
(6, 13, 'Why do i see different prices for the same product?', 'You could see different prices for the same product,as it could be listed by many sellers.', NULL, NULL),
(7, 13, 'Is it necessary to have an account to shop on Thalir?', 'Yes it\'s necessary to log into your Thalir account to shop.Shopping as a logged-in user is fast & convenient and also provides extra security.', NULL, NULL),
(8, 12, 'Is Thalir Aloe Vera Shampoo good?', 'Yes, Thalir Aloe Vera Shampoo perfect for dull and damaged hair. This safe and natural Aloe Vera shampoo is also enriched with special enzyme found in aloe called proteolytic enzymes. These enzymes effectively break down dead skin cells on the scalp that may clog hair follicles.', NULL, NULL),
(9, 12, 'Can I oil my hair before using this Thalir Aloe Vera Shampoo?', 'Yes, you can use Thalir Ayurvedic Hair care Oil before using the shampoo for best results', NULL, NULL),
(10, 14, 'Why do i see different prices for the same product?', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', NULL, NULL),
(11, 14, 'Is it necessary to have an account to shop on Thalir?', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', NULL, NULL),
(12, 7, 'Who can use this Oil?', 'Both men and women, above 13 years of age, can use this Hair Oil.', NULL, NULL),
(13, 7, 'Can we apply this Hair Oil Daily?', 'Thalir Ayurvedic Hair Care Oil is Free of toxin and harmful chemicals; it can be applied before wash on Daily basis.', NULL, NULL),
(14, 7, 'Is it Suitable for all Hair types?', 'Yes, it Suits all Hair Types.', NULL, NULL),
(15, 7, 'Does it have any artificial Fragrances?', 'No, it is made of all natural ingredients, and is completely free of artificial of artificial fragrance.', NULL, NULL),
(16, 7, 'Can we use this Hair Oil for hair growth on face?', 'The uses of Thalir Ayurvedic Hair care Oil are limited to hair and scalp. You may use hair oil for hair loss, adding strength and shine, and to nourish the scalp but you should not use it on your face.', NULL, NULL),
(17, 7, 'I have patchy Scalp, Will this Thalir Hair Care Oil Help?', 'Yes, Thalir Ayurvedic Hair Care Oil helps in soothing the scalp and promoting new hair growth, solutions for bald spots.', NULL, NULL),
(18, 7, 'Will this Thalir Hair Care Oil work for my thinning hair', 'Yes, Regular use of this Hair Oil will stop Hair fall from occurring and strengthen your hair from root to tip', NULL, NULL),
(19, 7, 'What are the benefits of Thalir Ayurvedic Hair Care Oil?', 'This hair oil includes Herbs from the midst of nature. so many potential benefits for your hair, it treats dandruff, hair loss, promotes regrowth, ads shine to the hair. Thalir hair oil prevents greying of hair, and repairs hair damage', NULL, NULL),
(21, 12, 'I have dandruff on my scalp, will this This shampoo help cure it?', 'The Ayurvedic ingredients present in the shampoo will cleanse and soothe your scalp and reduce dandruff Particles', NULL, NULL),
(22, 12, 'Does Thalir Aloe Vera shampoo cause Hair loss?', 'No. Thalir Aloe Vera Shampoo Anti Dandruff shampoo is made with Aloe Vera also Presence of Bringaraj Extract, which does not cause hair loss.', NULL, NULL),
(23, 12, 'What are the Benefits of Thalir Aloe Vera shampoo?', 'Thalir Aloe Vera Shampoo for hair helps address itchy and flaky scalp while cleansing the scalp and soothing dryness. This Aloe Vera  shampoo for dandruff is ideal for hair loss.', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_howtouse`
--

CREATE TABLE `product_howtouse` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `productid` int(11) NOT NULL DEFAULT 0,
  `step` int(11) NOT NULL DEFAULT 1,
  `desc` varchar(1024) NOT NULL DEFAULT '',
  `image` varchar(128) NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_howtouse`
--

INSERT INTO `product_howtouse` (`id`, `productid`, `step`, `desc`, `image`, `created_at`, `updated_at`) VALUES
(5, 13, 1, 'are for dry and irritated scalp and breakage-prone, graying hair with Thalir Hair oil. This all-natural hair oil delivers the nutrients directly to your roots and protect the weak strands with its conditioning effect. It supports in reviving your breakage-prone hair and soothe irritated scalp.', '/uploads/howtouse/_571112.png', NULL, NULL),
(6, 13, 2, 'are for dry and irritated scalp and breakage-prone, graying hair with Thalir Hair oil. This all-natural hair oil delivers the nutrients directly to your roots and protect the weak strands with its conditioning effect. It supports in reviving your breakage-prone hair and soothe irritated scalp.', '/uploads/howtouse/_581112.png', NULL, NULL),
(7, 13, 3, 'are for dry and irritated scalp and breakage-prone, graying hair with Thalir Hair oil. This all-natural hair oil delivers the nutrients directly to your roots and protect the weak strands with its conditioning effect. It supports in reviving your breakage-prone hair and soothe irritated scalp.', '/uploads/howtouse/_581112.png', NULL, NULL),
(8, 15, 1, 'are for dry and irritated scalp and breakage-prone, graying hair with Thalir Hair oil. This all-natural hair oil delivers the nutrients directly to your roots and protect the weak strands with its conditioning effect. It supports in reviving your breakage-prone hair and soothe irritated scalp.', '/uploads/howtouse/_021212.png', NULL, NULL),
(9, 15, 2, 'are for dry and irritated scalp and breakage-prone, graying hair with Thalir Hair oil. This all-natural hair oil delivers the nutrients directly to your roots and protect the weak strands with its conditioning effect. It supports in reviving your breakage-prone hair and soothe irritated scalp.', '/uploads/howtouse/_021212.png', NULL, NULL),
(10, 15, 3, 'are for dry and irritated scalp and breakage-prone, graying hair with Thalir Hair oil. This all-natural hair oil delivers the nutrients directly to your roots and protect the weak strands with its conditioning effect. It supports in reviving your breakage-prone hair and soothe irritated scalp.', '/uploads/howtouse/_031212.png', NULL, NULL),
(11, 11, 1, 'are for dry and irritated scalp and breakage-prone, graying hair with Thalir Hair oil. This all-natural hair oil delivers the nutrients directly to your roots and protect the weak strands with its conditioning effect. It supports in reviving your breakage-prone hair and soothe irritated scalp.', '/uploads/howtouse/_031212.png', NULL, NULL),
(12, 11, 2, 'are for dry and irritated scalp and breakage-prone, graying hair with Thalir Hair oil. This all-natural hair oil delivers the nutrients directly to your roots and protect the weak strands with its conditioning effect. It supports in reviving your breakage-prone hair and soothe irritated scalp.', '/uploads/howtouse/_041212.png', NULL, NULL),
(13, 11, 3, 'are for dry and irritated scalp and breakage-prone, graying hair with Thalir Hair oil. This all-natural hair oil delivers the nutrients directly to your roots and protect the weak strands with its conditioning effect. It supports in reviving your breakage-prone hair and soothe irritated scalp.', '/uploads/howtouse/_041212.png', NULL, NULL),
(14, 6, 1, 'are for dry and irritated scalp and breakage-prone, graying hair with Thalir Hair oil. This all-natural hair oil delivers the nutrients directly to your roots and protect the weak strands with its conditioning effect. It supports in reviving your breakage-prone hair and soothe irritated scalp.', '/uploads/howtouse/_041212.png', NULL, NULL),
(15, 6, 2, 'are for dry and irritated scalp and breakage-prone, graying hair with Thalir Hair oil. This all-natural hair oil delivers the nutrients directly to your roots and protect the weak strands with its conditioning effect. It supports in reviving your breakage-prone hair and soothe irritated scalp.', '/uploads/howtouse/_051212.png', NULL, NULL),
(16, 6, 3, 'are for dry and irritated scalp and breakage-prone, graying hair with Thalir Hair oil. This all-natural hair oil delivers the nutrients directly to your roots and protect the weak strands with its conditioning effect. It supports in reviving your breakage-prone hair and soothe irritated scalp.', '/uploads/howtouse/_051212.png', NULL, NULL),
(17, 7, 1, 'Part your Hair and Take sufficient quantity of Thalir hair oil onto your palm.', '/uploads/howtouse/_280803.png', NULL, NULL),
(18, 7, 2, 'Massage gently with your fingertips in circular motion to help it penetrate deeper. After light massage leave it on 20 minutes on head.', '/uploads/howtouse/_470803.png', NULL, NULL),
(19, 7, 3, 'After Keeping oil Wash off with Thalir Shampoo and Next, gather a section of your hair and gently blot it with a towel.', '/uploads/howtouse/_010903.png', NULL, NULL),
(20, 10, 1, 'are for dry and irritated scalp and breakage-prone, graying hair with Thalir Hair oil. This all-natural hair oil delivers the nutrients directly to your roots and protect the weak strands with its conditioning effect. It supports in reviving your breakage-prone hair and soothe irritated scalp.', '/uploads/howtouse/_121212.png', NULL, NULL),
(21, 10, 2, 'are for dry and irritated scalp and breakage-prone, graying hair with Thalir Hair oil. This all-natural hair oil delivers the nutrients directly to your roots and protect the weak strands with its conditioning effect. It supports in reviving your breakage-prone hair and soothe irritated scalp.', '/uploads/howtouse/_121212.png', NULL, NULL),
(22, 10, 3, 'are for dry and irritated scalp and breakage-prone, graying hair with Thalir Hair oil. This all-natural hair oil delivers the nutrients directly to your roots and protect the weak strands with its conditioning effect. It supports in reviving your breakage-prone hair and soothe irritated scalp.', '/uploads/howtouse/_131212.png', NULL, NULL),
(26, 14, 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', '/uploads/howtouse/_060502.webp', NULL, NULL),
(27, 14, 2, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', '/uploads/howtouse/_070502.jpg', NULL, NULL),
(28, 14, 3, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', '/uploads/howtouse/_090502.webp', NULL, NULL),
(29, 12, 1, 'Part your Hair and Take sufficient quantity of Thalir Aloe Vera Shampoo onto your palm.', '/uploads/howtouse/_131102.png', NULL, NULL),
(30, 12, 2, 'Gently Massage with fingertips and work into lather from scalp to Hair length', '/uploads/howtouse/_121102.png', NULL, NULL),
(31, 12, 3, 'Rinse of the shampoo finishing with cold water, Next gather a section of your hair and gently blot it with a towel.', '/uploads/howtouse/_141102.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_ingredients`
--

CREATE TABLE `product_ingredients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `productid` int(11) NOT NULL DEFAULT 0,
  `name` varchar(64) NOT NULL DEFAULT '',
  `desc` varchar(1024) NOT NULL DEFAULT '',
  `image` varchar(128) NOT NULL DEFAULT '',
  `disp_order` smallint(6) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_ingredients`
--

INSERT INTO `product_ingredients` (`id`, `productid`, `name`, `desc`, `image`, `disp_order`, `created_at`, `updated_at`) VALUES
(1, 11, 'Product Ingredient', 'Purified Water, Glycerin, Aloevera Extract, Kumkumadi Oil with 28 Herbs, Dicaprylyl Carbonate, Coconut Oil, Tocopherol, Saffron Extract, Lotus Extract, Radish Root Extract, Cucumber Extract, Niacinamide, D-panthenol, Propanediol, Dehydroxanthan Gum, Hyaluronic Acid, Apricot Oil, Wheatgerm Oil, Sodium PCA, Cetearyl Olivate, Sorbitan Olivate, Sodium Gluconate, Allantoin.', '/uploads/ingredients/ProductIngredient_301128.jpg', 1, NULL, NULL),
(2, 11, 'Product Ingredient', 'Purified Water, Glycerin, Aloevera Extract, Kumkumadi Oil with 28 Herbs, Dicaprylyl Carbonate, CoconNiacinamide, D-panthenol, Propanediol, Dehydroxanthan Gum, , Dehydroxanthan Gum, Hyaluronic Acid, Apricot Oil, Wheatgerm Oil, Sodium PCA, Cetearyl Olivate, Sorbitan Olivate, Sodium Gluconate, Allantoin.', '/uploads/ingredients/ProductIngredient_351128.jpg', 1, NULL, NULL),
(4, 11, 'Product Ingredient', 'Purified Water, Glycerin, Aloevera Extract, Kumkumadi Oil with 28 Herbs, Dicaprylyl Carbonate, Coconut Oil, Tocopherol, Saffron Extract, Lotus Extract.', '/uploads/ingredients/ProductIngredient_411128.jpg', 1, NULL, NULL),
(5, 11, 'Product Ingredient', 'Purified Water, Glycerin, Aloevera Extract, Kumkumadi Oil with 28 Herbs, Dicaprylyl Carbonate, Coconut Oil, Tocopherol, Saffron Extract, Lotus Extract', '/uploads/ingredients/ProductIngredient_421128.jpg', 1, NULL, NULL),
(10, 19, 'Compact', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', '/uploads/ingredients/Compact_180621.png', 1, NULL, NULL),
(11, 19, 'Compact', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', '/uploads/ingredients/Compact_190621.png', 1, NULL, NULL),
(12, 19, 'Compact', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', '/uploads/ingredients/Compact_190621.png', 1, NULL, NULL),
(13, 13, 'Lorem Ipsum', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', '/uploads/ingredients/LoremIpsum_371202.png', 1, NULL, NULL),
(16, 13, 'Lorem Ipsum', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', '/uploads/ingredients/LoremIpsum_290202.png', 1, NULL, NULL),
(17, 13, 'Lorem Ipsum', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged', '/uploads/ingredients/LoremIpsum_300202.png', 1, NULL, NULL),
(18, 13, 'Lorem Ipsum', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged', '/uploads/ingredients/LoremIpsum_320202.png', 1, NULL, NULL),
(29, 14, 'Lorem Ipsum', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', '/uploads/ingredients/LoremIpsum_150502.webp', 1, NULL, NULL),
(30, 14, 'Lorem Ipsum', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', '/uploads/ingredients/LoremIpsum_160502.webp', 1, NULL, NULL),
(31, 14, 'Lorem Ipsum', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', '/uploads/ingredients/LoremIpsum_160502.webp', 1, NULL, NULL),
(32, 14, 'Lorem Ipsum', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', '/uploads/ingredients/LoremIpsum_170502.webp', 1, NULL, NULL),
(40, 7, 'Lawsonia Innermis', 'The natural pigments from the Lawsonia Innermis leaf coat each strand. Using a natural hair dye means building a protective layer around the hair cuticles and every strand, safeguarding your hair against potential damage. Hair dyes with henna lock in moisture boosting luster and strength', '/uploads/ingredients/LawsoniaInnermis_091122.png', 1, NULL, NULL),
(41, 7, 'Emblica Officinalis', 'The vitamin-rich fruit is beneficial for hair in numerous ways. It helps in reducing dandruff by removing the flakiness and greasiness of the scalp. It also nourishes the hair and hair follicles that helps in the reduction of hair fall. It helps in balancing the sebum content of your scalp.', '/uploads/ingredients/EmblicaOfficinalis_510122.png', 1, NULL, NULL),
(42, 7, 'Hibiscus Rosa Sinensis', 'Hibiscus is a popular remedy for hair growth, promoted by herbal healers. Hibiscus also contains alpha-hydroxy acids (AHAs), amino acids, and ascorbic acid (vitamin C) that help regenerate hair structure and repair damage. Hibiscus contents helps prevent premature greying of hair.', '/uploads/ingredients/HibiscusRosaSinensis_530122.png', 1, NULL, NULL),
(43, 7, 'Coconut Oil', 'Rich in medium chain saturated fatty acids that help hydrate hair intensively and put a stop to white scalp issue. Reverses damage inflicted by heat treatment, pollution and styling products. Coconut oil also moisturizes your hair and  it works better than other oils at repairing dry hair.', '/uploads/ingredients/CoconutOil_591022.png', 1, NULL, NULL),
(44, 7, 'Aloe Vera', 'Aloe vera promotes healthy hair growth thanks to a special enzyme found in aloe called proteolytic enzymes. These enzymes effectively break down dead skin cells on the scalp that may clog hair follicles. The symptoms of an itchy scalp and flaking skin under your hair can be treated with aloe Vera.', '/uploads/ingredients/AloeVera_001122.png', 1, NULL, NULL),
(45, 7, 'Castor Oil', 'Castor oil is a natural conditioner that keeps your hair healthy, shiny, and soft. This oil contains amounts of oleic and linoleic acids and can restore normalcy to hair, also rich in antioxidants, vitamin E and essential fatty acids including omega 6 to give rich nourishing scalp care and encourages regrowth.', '/uploads/ingredients/CastorOil_000123.png', 1, NULL, NULL),
(46, 12, 'Aloe Vera', 'Aloe vera promotes healthy hair growth thanks to a special enzyme found in aloe called proteolytic enzymes. These enzymes effectively break down dead skin cells on the scalp that may clog hair follicles. The symptoms of an itchy scalp and flaking skin under your hair can be treated with aloe Vera.', '/uploads/ingredients/AloeVera_321103.png', 1, NULL, NULL),
(47, 12, 'Coconut Oil', 'Rich in medium chain saturated fatty acids that help hydrate hair intensively and put a stop to white scalp issue. Reverses damage inflicted by heat treatment, pollution and styling products. Coconut oil also moisturizes your hair and it works better than other oils at repairing dry hair.', '/uploads/ingredients/CoconutOil_431103.png', 1, NULL, NULL),
(48, 12, 'Tea Tree oil', 'Apart from soothing an itchy scalp, reducing dandruff and flaking, and preventing excess oil production, tea tree oil improves blood flow and allows nutrients to reach hair follicles, balances the pH level of the scalp, and stimulates the hair growth cycle to give you a head full of strong healthy hair.', '/uploads/ingredients/TeaTreeoil_541103.png', 1, NULL, NULL),
(49, 12, 'Bringaraj Extract', 'Bhringraj is a king of herbs, this Plant rich in iron, magnesium, vitamin D, and vitamin E. This super-effective herb is mainly used for hair problems. This is due to the presence of various nutrients in Bhringraj that provide nourishment to the hair scalp. it also prevent premature greying and help in dealing with hair loss.', '/uploads/ingredients/BringarajExtract_081204.png', 1, NULL, NULL),
(50, 12, 'Vitamin E', 'Vitamin E is essential for healthy Hair— and this includes your scalp. Poor scalp health is linked to lackluster hair quality . Vitamin E supports the scalp and gives your hair a strong base to grow from by reducing oxidative stress and preserving the protective lipid layer. Vitamin E helps Smooths Damaged Hair', '/uploads/ingredients/VitaminE_131204.png', 1, NULL, NULL),
(51, 21, 'One', '', '/uploads/ingredients/One_080206.png', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_reviews`
--

CREATE TABLE `product_reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customerid` varchar(20) NOT NULL DEFAULT '0',
  `product_id` int(11) NOT NULL DEFAULT 0,
  `customername` varchar(64) NOT NULL DEFAULT '',
  `rating` int(11) NOT NULL,
  `comment` text NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_reviews`
--

INSERT INTO `product_reviews` (`id`, `customerid`, `product_id`, `customername`, `rating`, `comment`, `status`, `created_at`, `updated_at`) VALUES
(25, '16854587322912', 7, 'Sumin', 5, 'One of the Best hair oil am used.\r\nIt’s good for people who are suffering from hair loss and dandruf.', 'Inactive', '2023-05-30 15:03:39', '2023-05-30 15:03:39'),
(26, '16854587322912', 12, 'Gayathri Arunachal', 5, 'Best shampoo , This shampoo control my hair fall and nourished deeply it is chemical free and very nice product and smell too good', 'Inactive', '2023-05-30 15:08:02', '2023-05-30 15:08:02');

-- --------------------------------------------------------

--
-- Table structure for table `product_units`
--

CREATE TABLE `product_units` (
  `id` int(10) UNSIGNED NOT NULL,
  `productid` int(11) NOT NULL DEFAULT 0,
  `name` varchar(64) NOT NULL DEFAULT '',
  `price` double(8,2) NOT NULL DEFAULT 0.00,
  `offerprice` double(8,2) NOT NULL DEFAULT 0.00,
  `disp_order` smallint(6) NOT NULL DEFAULT 1,
  `status` enum('Enabled','Disabled') NOT NULL DEFAULT 'Enabled'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `delivery_charge` double(8,2) NOT NULL DEFAULT 0.00,
  `promobanner` varchar(100) NOT NULL DEFAULT '',
  `promobannerurl` varchar(100) NOT NULL DEFAULT '',
  `website` varchar(75) NOT NULL DEFAULT '',
  `email` varchar(75) NOT NULL DEFAULT '',
  `fburl` varchar(75) NOT NULL DEFAULT '',
  `instaurl` varchar(75) NOT NULL DEFAULT '',
  `whatsappurl` varchar(75) NOT NULL DEFAULT '',
  `youtubeurl` varchar(75) NOT NULL DEFAULT '',
  `appandroidurl` varchar(75) NOT NULL DEFAULT '',
  `appiosurl` varchar(75) NOT NULL DEFAULT '',
  `terms` longtext DEFAULT NULL,
  `aboutus` longtext DEFAULT NULL,
  `returnpolicy` longtext DEFAULT NULL,
  `privacypolicy` longtext DEFAULT NULL,
  `shippingpolicy` longtext DEFAULT NULL,
  `refundpolicy` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(13) NOT NULL DEFAULT '',
  `address` varchar(1024) NOT NULL DEFAULT '',
  `pincode` varchar(10) NOT NULL DEFAULT '',
  `latitude` varchar(64) NOT NULL DEFAULT '',
  `longitude` varchar(64) NOT NULL DEFAULT '',
  `ourstory` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `delivery_charge`, `promobanner`, `promobannerurl`, `website`, `email`, `fburl`, `instaurl`, `whatsappurl`, `youtubeurl`, `appandroidurl`, `appiosurl`, `terms`, `aboutus`, `returnpolicy`, `privacypolicy`, `shippingpolicy`, `refundpolicy`, `created_at`, `updated_at`, `phone`, `address`, `pincode`, `latitude`, `longitude`, `ourstory`) VALUES
(1, 0.00, 'COD Available | Dermatologically Tested Products | Try it Today', '', '', 'Thalirnaturalsolutions@gmail.com', 'https://www.facebook.com/thalirnatural/', 'https://instagram.com/thalirnaturalsolutions.in?utm_medium=copy_link', 'http://wa.me/918883848782', 'https://www.youtube.com/channel/UCKvAQsMskSoGSI06RdqWu1A', '', '', '<p>THIS DOCUMENT IS AN ELECTRONIC RECORD IN TERMS OF INFORMATION TECHNOLOGY ACT, 2000 (&ldquo;IT ACT&rdquo;) AND RULES ISSUED THEREUNDER, AS APPLICABLE AND THE PROVISIONS PERTAINING TO ELECTRONIC RECORDS IN VARIOUS STATUTES AS AMENDED BY THE IT ACT AND IS PUBLISHED IN ACCORDANCE WITH THE PROVISIONS OF APPLICABLE LAWS, INCLUDING THE CONSUMER PROTECTION (E-COMMERCE) RULES 2020, THAT REQUIRE PUBLISHING THE RULES AND REGULATIONS, PRIVACY POLICY AND TERMS AND CONDITIONS FOR ACCESS OR USAGE OF THE WEBISTE. THIS ELECTRONIC RECORD IS GENERATED BY A COMPUTER SYSTEM AND DOES NOT REQUIRE ANY PHYSICAL OR DIGITAL SIGNATURES.</p>\r\n\r\n<p>PLEASE READ THESE TERMS AND CONDITIONS (&ldquo;T&amp;C&rdquo;) CAREFULLY. BY ACCESSING, BROWSING, USING WWW.THALIRNATURALSOLUTIONS.IN OR ANY OTHER WEBSITE, MOBILE VERSION OF THE WEBSITE OR MOBILE APPLICATION (THE TOGETHER &ldquo;WEBSITE&rdquo;) OR AVAILING ANY OF THE PRODUCTS OF HONASA CONSUMER PRIVATE LIMITED ( HEREINAFTER REFERRED TO AS &ldquo;COMPANY&rdquo; OR &ldquo;US&rdquo; OR &ldquo;WE&rdquo;) YOU INCLUDING THE PERSONS WHO BROWSES OR THE PERSONS WHO ORDERS THE PRODUCT AGREE TO BE BOUND BY ALL OF THE T&amp;C MENTIONED HEREUNDER.</p>\r\n\r\n<p>Only persons who can enter into legally binding contract under the Indian Contract Act, 1872 can use the Website and/or transact on the Website. Any minor who wishes to use or access the Website is required to conduct such transaction through their legal guardian or parents. If you represent a company, partnership firm or sole proprietorship, you shall be eligible to access and use the Website to conduct the transactions on its behalf only if you have been duly authorized by way of necessary corporate action, as may be prescribed statutorily and/or under the charter documents of such entity</p>\r\n\r\n<p>The Company reserves the right to amend or revise the T&amp;C at any time by uploading a revised or amended T&amp;C on the Website with or without prior notice. The amended T&amp;C will be effective immediately after it is uploaded on this Website. Your access or use of the Website following any such changes constitutes your acceptance to follow and You shall be bound by these T&amp;C, as amended. The version of the T&amp;C that will apply to your order will be those uploaded on the Website at the time you use or access or place your order. For this reason, we encourage you to review these T&amp;C each time you access and place your order. This T&amp;C does not alter in any way the terms or conditions of any other written agreement you may have with the Company for other products or services. If you do not agree to this T&amp;C (including any referenced policies or guidelines), please immediately terminate your use of the Website. If you would like to print this T&amp;C, please press CTRL + P.</p>\r\n\r\n<p>You may only access the Website for lawful purposes. You are solely responsible for the knowledge of and adherence to any and all laws, rules, and regulations pertaining to your use of the Website.</p>\r\n\r\n<p>PRODUCTS</p>\r\n\r\n<p>Terms of Offer: The Website offers for sale certain products (&ldquo;Products&rdquo;). The Products shall include trial products and the products offered free of cost. By placing an order for the Products through the Website, you agree to the terms and conditions set forth in this T&amp;C. The Products described on the Website, and any samples thereof we may provide to you, are for personal use only. You may not sell or resell any of the Products, or samples thereof, you receive from us unless agreed otherwise. We reserve the right, with or without notice, to cancel or reduce the quantity of any Products to be provided to you that we believe, in our sole discretion, may result in the violation of our T&amp;C.</p>\r\n\r\n<p>The Company may change, suspend, or discontinue the availability of any of the Products at any time, without any notice or liability. You acknowledge that the price payable in connection with the Product or any service, may be subject to change, without notice or liability.</p>\r\n\r\n<p>While describing our Products on our Website, we endeavour to be as accurate as possible. To the extent implied by applicable law, we do not warrant that the Product descriptions, colours, information or other content available on the Website are accurate, complete, reliable, current, or error-free. The Website may contain typographical errors or inaccuracies and may not be complete or updated. Such errors, inaccuracies or omissions may also relate to pricing and availability of the Product or services. Please note that the Product pictures are indicative and may not match the actual Product.</p>\r\n\r\n<p>Customer Solicitation: By accessing the Website or placing an order or sending any information, you are communicating with the Company electronically and you agree to receive communications (including transactional, promotional and/or commercial messages) from the Company periodically and as and when required. We may communicate with you by e-mail, SMS, phone call or by posting notices on the Website or by any other mode of communication.</p>\r\n\r\n<p>At any point of time, you have the right to withdraw your consent by following the below stated opt-out procedure.</p>\r\n\r\n<p>Opt Out Procedure: We provide 3 easy ways to opt out of from future Customer Solicitations.</p>\r\n\r\n<p>You may use the opt out link found in any email solicitation that you may receive.</p>\r\n\r\n<p>You may also choose to opt out, via sending your email by addressing to:thalirnaturalsolutions@gmail.com</p>\r\n\r\n<p>Proprietary Rights: All the brand names owned and licensed to the Company are exclusive property of the Company, its affiliates, partners or licensors, and is protected by laws of India, including laws governing all applicable forms of intellectual property. The Company has the proprietary rights and trade secrets in the Products. You shall not copy, reproduce, modify, duplicate, re-publish, re-sell or re-distribute any Product manufactured and/or distributed by the Company in whole or in part or in any other form whatsoever. The Company also has rights to all trademarks and trade dress and specific layouts of this webpage, including without limitation calls to action, text placement, images, technology, content, software and other materials, which appear on the Website, including its looks and feel. No trademark is granted in connection with the Products or the materials contained on the Website. The access to the Website does not authorize anyone to use any trademarks in any manner. The trademarks displayed on the Website whether registered or unregistered, are the intellectual property of the Company.</p>\r\n\r\n<p>Tax: If you purchase any Products, you will be responsible for paying any applicable taxes in relation to such purchase.</p>\r\n\r\n<p>WEBSITE</p>\r\n\r\n<p>Your Account: You may create and hold one user account (&ldquo;Account&rdquo;) only. You will be responsible for maintaining confidentiality of your account, password, and restricting access to your computer, and you hereby accept responsibility for all activities that occur under your Account. You acknowledge that the information you provide, in any manner whatsoever, are not confidential or proprietary and does not infringe any rights of a third party in whatsoever nature. Each Account is non-transferrable and may not be sold, traded, combined, or otherwise shared with any other person.</p>\r\n\r\n<p>If you are accessing, browsing and using the Website on someone else&rsquo;s behalf; you represent that you have the authority to bind that person to all the T&amp;C herein. In the event that the person refuses to be bound as the principal to the T&amp;C, you agree to accept liability for any harm caused by any wrongful use of the Website resulting from such access or use of the Website in whatsoever nature.</p>\r\n\r\n<p>If you know or have reasons to believe that the security of your Account has been breached, you should contact us immediately at the &lsquo;Contact Information&rsquo; provided below. If we have found a breach or suspected breach of the security of your Account, we may require you to change your password, temporarily or permanently block or suspend your account without any liability to the Company.</p>\r\n\r\n<p>We reserve the right to refuse service and/or terminate accounts without prior notice if the T&amp;C are violated or if we decide, in our sole discretion, that it would be in the Company&rsquo;s best interests to do so. You are solely responsible for all contents that you upload, post, email or otherwise transmit via the Website. The information provided to us shall be maintained by us in accordance with our Privacy Policy.</p>\r\n\r\n<p>Content; Intellectual Property; Third Party Links: In addition to making the Products available, the Website also offers information and marketing materials. The Website also offers information, both directly and through indirect links to third-party websites about nutritional and dietary supplements. The Company does not always create such information and the content published on the Website; instead, the information and content are often gathered from other sources. The Company does not endorse any such information or content and the Company expressly disclaims any and all liability in connection with the same. The Company is not responsible or liable for the information or the content or any damage or loss that may result from your access to or reliance on such information or content. To the extent that the Company does create the content on this Website, such content is protected by intellectual property laws of India. Any unauthorized use of the material may violate copyright, trademark, and/or other laws. You acknowledge that your use of the content on this Website is for personal and non-commercial use.</p>\r\n\r\n<p>We respect the intellectual property of others. In case you feel that your work has been copied in a way that constitutes copyright infringement, you can write to us at &lt;&lt; thalirnaturalsolutions.in&gt;&gt;.</p>\r\n\r\n<p>Any links to third-party websites are provided solely as a convenience to you. The Company does not endorse, affiliate, sponsor or recommend any such third-party websites. The Company is not responsible or liable for the content of or any damage or loss that may result from your access to or reliance on these third-party websites. You should always read the terms and conditions and privacy policy of a third-party website before using it. If you access or use such third-party websites, you do so at your own risk.</p>\r\n\r\n<p>Use of Website: The Company is not responsible for any damages resulting from use of the Website by anyone. You will not use the Website for any illegal purposes. You will (a) abide by all applicable local, state, national, and international laws and regulations in your use of the Website (including laws regarding intellectual property), (b) not interfere with or disrupt the use and enjoyment of the Website by other users, (c) not resell material on the Website, (d) not engage, directly or indirectly, in transmission of &ldquo;spam&rdquo;, chain letters, junk mail or any other type of unsolicited communication, and (e) not defame, harass, abuse, or disrupt other users of the Website, (f) not to do or attempt to do any action which is grossly harmful, harassing, blasphemous defamatory, obscene, pornographic, paedophilic, libellous, invasive of another&rsquo;s privacy, hateful, or racially, ethnically objectionable, disparaging, relating or encouraging money laundering or gambling, trolling, propaganda or otherwise unlawful in any manner whatever.</p>\r\n\r\n<p>License: By using this Website, you are granted a limited, non-exclusive, non-transferable right to use the content and materials on the Website in connection with your personal, non-commercial use of the Website. You may not copy, reproduce, transmit, distribute, or create derivative works of such content or information without express written authorization from the Company or the applicable third party (if third party content is at issue).</p>\r\n\r\n<p>Posting: By posting, storing, or transmitting any content on the Website, you hereby grant the Company a perpetual, worldwide, non-exclusive, royalty-free, assignable, right and license to use, copy, display, perform, create derivative works from, distribute, have distributed, transmit and assign such content in any form, in all media now known or hereinafter created, anywhere in the world, subject to the Company&rsquo;s privacy policy. The Company does not have the ability to control the nature of the user-generated content offered through the Website. You are solely responsible for your interactions with other users of the Website and any content you post. The Company is not liable for any damage or harm resulting from any posts by or interactions between the users. The Company reserves the right, but has no obligation, to monitor interactions between and among users of the Website and to remove any content the Company deems objectionable. Under no circumstances will the Company be liable in any way for any user generated content, including without limitation, for any errors or omissions in such content or for any loss or damage of any kind incurred by you as a result of the use of any such user generated content transmitted, uploaded, posted, e-mailed or otherwise made available via the Website. You hereby waive all rights to any claims against the Company for any alleged or actual infringements of any proprietary rights, rights of privacy and publicity, moral rights, and rights of attribution in connection with such user generated content.</p>\r\n\r\n<p>Site Security: You are prohibited from violating or attempting to violate the security of the Website, including, without limitation,</p>\r\n\r\n<p>accessing data not intended for you or logging onto a server or an account which you are not authorized to access;</p>\r\n\r\n<p>attempting to probe, scan or test the vulnerability of a system or network or to breach security or authentication measures without proper authorization;</p>\r\n\r\n<p>attempting to interfere with service to any other user, host or network, including, without limitation, via means of submitting a virus to the Site, overloading, &ldquo;flooding,&rdquo; &ldquo;spamming,&rdquo; &ldquo;mail bombing&rdquo; or &ldquo;crashing&rdquo;;</p>\r\n\r\n<p>sending unsolicited email, including promotions and/or advertising of products or services; or</p>\r\n\r\n<p>forging any header or any part of the header information in any email or newsgroup posting. Violations of system or network security may result in civil or criminal liability</p>\r\n\r\n<p>threatens the unity, integrity, defence, security or sovereignty of India, public order or causes incitement to the commission of any cognizable offence or prevents investigation of any offence.</p>\r\n\r\n<p>Payment Method: The Payments for the Products available on the Website may be made in the following ways:</p>\r\n\r\n<p>Payments can be made by Credit Cards, Debit Cards, Net Banking, Wallets, UPI, QR, PayPal and reward points.</p>\r\n\r\n<p>Cash on Delivery.</p>\r\n\r\n<p>Chat Facility: The chat facility has been provided to help you with any and all Website related queries. Any use of this service shall be subject to the following conditions:</p>\r\n\r\n<p>The Company may suspend the chat service at any time without notice.</p>\r\n\r\n<p>The Company or its executives are not responsible for any delay caused in attending to or replying to the queries via chat.</p>\r\n\r\n<p>Communication through chat may be stored by the Company for future reference, and the user of such service will not have the right to access such information at any future date.</p>\r\n\r\n<p>While &lsquo;chatting&rsquo;, you may not communicate any objectionable information i.e. unlawful, threatening, abusive, defamatory, obscene information.</p>\r\n\r\n<p>The chat room shall not be used to sell any products, to give suggestion on business opportunity or any other form of solicitation.</p>\r\n\r\n<p>You may proceed further and chat with our online customer care executive only if you agree to the above terms and conditions.</p>\r\n\r\n<p>Pricing and Availability: The Prices and availability of the Products, offers and services provided or offered on the Website are subject to change without prior notice and at the sole discretion of the Company. The prices displayed at the Website are inclusive of goods and sales tax (&ldquo;GST&rdquo;), but do not include a delivery charge. For all orders under INR 399 (Indian Rupees Three Hundred and Ninety-Nine only), delivery charge of INR 40 (Indian Rupees Forty only) shall be levied. All orders above INR 399 (Indian Rupees Three Hundred and Ninety-Nine only) shall be delivered without any delivery charges. The Prices and offers in offline store and online on websites and portals other than the Website may vary from the prices displayed on the Website.</p>\r\n\r\n<p>Delivery: For order containing multiple Products, delivery may be made in multiple shipments. Delivery usually takes 5-7 business days from the date of order placement. Upon placement of the order, the estimated shipping and delivery timelines shall be available on order details page. The estimated delivery times are indicative, hence there may be some unforeseeable delays, which are beyond our control. In the event, the Company is unable to deliver the Product within the estimated delivery date due to any reason, you will be notified by an e-mail the reason for such delay. You will have the right either to cancel the ordered Product or wait for the Product to be delivered. Please note that your order will be cancelled due to: (i) unavailability of the Product ordered; or (ii) at your instructions, in the event of failure to deliver the Product on the expected time of delivery by our delivery partners. You agree that the Company shall not be liable to pay for any damage or loss either direct or indirect owing to such cancellation of the order or delay in delivery.</p>\r\n\r\n<p>Tracking Facility: Upon dispatch of the Product, you will receive an email with the details of the tracking number and the courier company. Orders may also be tracked, by clicking the &lsquo;Your orders&rsquo; option on you My Accounts page. The order status can be tracked after 24 hours from the time of dispatch.</p>\r\n\r\n<p>DISCLAIMER OF WARRANTIES</p>\r\n\r\n<p>Your use of the Website and/or Products are at your sole risk. The Website and the Products are offered on an &ldquo;as is&rdquo; and &ldquo;as available&rdquo; basis. The Company expressly disclaims all warranties of any kind, whether express or implied, including, but not limited to, implied warranties of merchantability, fitness for a particular purpose and non-infringement with respect to the Products or Website content, or any reliance upon or use of the Website content or Products.</p>\r\n\r\n<p>Without limiting the generality of the foregoing, the Company makes no warranty:</p>\r\n\r\n<p>that the information provided on this Website is accurate, reliable, complete, or timely;</p>\r\n\r\n<p>that the links to third-party websites are to information that is accurate, reliable, complete, or timely;</p>\r\n\r\n<p>no advice or information, whether oral or written, obtained by you from this Website will create any warranty not expressly stated herein;</p>\r\n\r\n<p>as to the results that may be obtained from the use of the Products or that defects in the Products will be corrected; and</p>\r\n\r\n<p>regarding any Products purchased or obtained through the Website.</p>\r\n\r\n<p>The inclusion of any Products or offers on the Website at a particular time does not imply or warrant that the Products or offers will be available at any time.</p>\r\n\r\n<p>The Company shall have the right, at any time, to change or discontinue any aspect or feature of the Website, including, but not limited to, content, hours of availability and equipment needed for access or use. Further, the Website may discontinue disseminating any portion of information or category of information. The Company does not accept any responsibility and will not be liable for any loss or damage whatsoever arising out of or in connection with any ability/inability to access or to use the Website.</p>\r\n\r\n<p>LIMITATION OF LIABILITY</p>\r\n\r\n<p>The Company takes no liability or exclusive remedy, in law, in equity, or otherwise, with respect to the Website content and Products and/or for any breach of this T&amp;C. The Company will not be liable for any direct, indirect, incidental, special or consequential damages or loss in connection with this T&amp;C or the Products in any manner, including liabilities resulting from (a) the use or the inability to use the Website content or Products or allied services; (b) the cost of procuring substitute the Products or content; (c) any Products purchased or obtained or transactions entered into through the Website; or (d) any lost profits you allege, even if we have been advised of the possibility of such damages and in no event shall our maximum aggregate liability exceed.</p>\r\n\r\n<p>You agree that, to the fullest extent permitted by applicable law, neither the Company nor our affiliates, partners, or licensors will be responsible or liable (whether in contract, tort (including negligence) or otherwise) under any circumstances for any (a) interruption of business; (b) access delays or access interruptions to the Website; (c) data non-delivery, loss, theft, mis-delivery, corruption, destruction or other modification; (d) loss or damages of any sort incurred as a result of dealings with or the presence of third party website links on the Website; (e) viruses, system failures or malfunctions which may occur in connection with your use of the Website, including during hyperlink; (f) any inaccuracies or omissions in content; or (g) events beyond the reasonable control of the Company. We make no representations or warranties that defects or errors will be corrected.</p>\r\n\r\n<p>This disclaimer constitutes an essential part of this T&amp;C.</p>\r\n\r\n<p>Some jurisdictions do not allow the limitation or exclusion of liability for incidental or consequential damages so some of the above limitations may not apply to you.</p>\r\n\r\n<p>INDEMNIFICATION</p>\r\n\r\n<p>You will release, indemnify, defend and hold harmless the Company, and any of its contractors, agents, employees, officers, directors, shareholders, affiliates and assigns from all liabilities, claims, damages, costs and expenses, including reasonable attorney&rsquo;s fees and expenses, of third parties relating to or arising out of: (a) this T&amp;C or the breach of your warranties, representations and obligations under this T&amp;C; (b) the Website content or your use of the Website content; (c) the Products or your use of the Products (including trial products); (d) any intellectual property or other proprietary right of any person or entity; (e) your violation of any provision of this T&amp;C; or (f) any information or data you supplied to the Company. When the Company is threatened with suit or sued by a third party, the Company may seek written assurances from you concerning your promise to indemnify the Company; your failure to provide such assurances may be considered by the Company to be a material breach of this T&amp;C. The Company will have the right to participate in any defense by you of a third-party claim related to your use of any of the Website content or Products, with counsel of the Company choice at its expense. The Company will reasonably cooperate in any defense by you of a third-party claim at your request and expense. You will have sole responsibility to defend the Company against any claim, but you must receive the Company prior written consent regarding any related settlement. The terms of this provision will survive any termination or cancellation of this T&amp;C or your use of the Website or the Products.</p>\r\n\r\n<p>PRIVACY</p>\r\n\r\n<p>The Company believes strongly in protecting user privacy and providing You with notice of the Company&rsquo;s use of data. Please refer to the Company privacy policy, incorporated by reference herein, that is uploaded on the Website.</p>\r\n\r\n<p>GENERAL</p>\r\n\r\n<p>Force Majeure: The Company will not be deemed in default hereunder or held responsible for any cessation, interruption or delay in the performance of its obligations hereunder due to earthquake, storm, natural disaster, act of God, war, terrorism, armed conflict, labour strike, lockout, or boycott, any acts of nature labour disputes, floods, lightning, severe weather, shortages of materials, rationing, pandemic or epidemic, inducement of any virus, Trojan or other disruptive mechanisms, any event of hacking or illegal usage of the Website, utility or communication failures, revolution, civil commotion, acts of public enemies, blockade, embargo or any law, order, proclamation, regulation, ordinance, demand or requirement having legal effect of any government or any judicial authority or representative of any such government, or any other act whatsoever, whether similar or dissimilar to those referred to in this clause beyond our reasonable control. Further if Force Majeure event takes place that affects the performance of our obligations under these T&amp;C our obligations under these T&amp;C shall be suspended for the duration of Force Majeure event..</p>\r\n\r\n<p>Cessation of Operation: The Company may at any time, in its sole discretion and without advance notice to You, cease operation of the Website and distribution of the Products.</p>\r\n\r\n<p>Entire Agreement: This T&amp;C comprises the entire agreement between you and the Company and supersedes any prior agreements pertaining to the subject matter contained herein.</p>\r\n\r\n<p>Effect of Waiver: The failure of the Company to exercise or enforce any right or provision of this T&amp;C will not constitute a waiver of such right or provision. If any provision of this T&amp;C is found by a court of competent jurisdiction to be invalid, the parties nevertheless agree that the court should endeavour to give effect to the parties&rsquo; intentions as reflected in such provision, and the other provisions of this T&amp;C remain in full force and effect.</p>\r\n\r\n<p>Governing Law and Jurisdiction: This T&amp;C shall be construed in accordance with the applicable laws of India and will be governed by the laws of the state of Delhi without regard to its conflict of law principles to the contrary. Neither you nor the Company will commence or prosecute any suit, proceeding or claim to enforce the provisions of this T&amp;C, to recover damages for breach of or default of this T&amp;C, or otherwise arising under or by reason of this T&amp;C, other than in courts located in State of Delhi. By using this Website or ordering Products, you consent to the jurisdiction and venue of such courts in connection with any action, suit, proceeding or claim arising under or by reason of this T&amp;C.</p>\r\n\r\n<p>Waiver of Class Action Rights: By accepting the T&amp;C, you hereby irrevocably waive any right you may have to join claims with those of other in the form of a class action or similar procedural device, any claims arising out of, relating to, or connection with this T&amp;C must be asserted individually.</p>\r\n\r\n<p>Termination: The Company reserves the right to terminate your access to the Website if it reasonably believes, in its sole discretion, that you have breached any of the terms of this T&amp;C. Following termination, you will not be permitted to use the Website and the Company may, in its sole discretion and without advance notice to you, cancel any outstanding orders for Products. If your access to the Website is terminated, the Company reserves the right to exercise whatever means it deems necessary to prevent the unauthorized access of the Website. This T&amp;C will survive indefinitely, unless and until the Company chooses, in its sole discretion and without advance notice to You, to terminate it.</p>\r\n\r\n<p>Domestic Use: The Company makes no representation that the Website or Products are appropriate or available for use in locations outside India. The users who access the Website from outside India do so at their own risk and initiative and must bear all responsibility for compliance with any applicable local laws.</p>\r\n\r\n<p>Assignment. You may not assign your rights and obligations under this T&amp;C to anyone. The Company may assign its rights and obligations under this T&amp;C in its sole discretion and without advance notice to you.</p>\r\n\r\n<p>By using this Website or ordering Products from this Website, you agree to be bound by this T&amp;C.</p>\r\n\r\n<p>Survival. If any provision or provisions of these T&amp;C shall be held to be invalid, illegal, or unenforceable, the validity, legality and enforceability of the remaining provisions shall remain in full force and effect.</p>\r\n\r\n<p>Contact Us: Please contact us for any questions or comments (including all inquiries unrelated to copyright infringement) regarding the Products or the Website.</p>\r\n\r\n<p>Customer Service Desk:</p>\r\n\r\n<p>Email: www.thalirnaturalsolutions@gmail.com</p>\r\n\r\n<p>Phone Number: +918281362384</p>\r\n\r\n<p>Contact Days: Monday-Friday (From 9:00 Am to 6:00pm)</p>\r\n\r\n<p>Grievance officer: The name and contact details of the Grievance Officer to handle any complaints in relation to the sale of Products or use of this Website are provided.</p>', '<p>The Thalir Natural Solutions Group is a leading consumer products and wellness service provider in the Herbal segment in India. Hailing from an ancient tradition of Ayurveda, Thalir is known for the authenticity of the products and services.</p>\r\n\r\n<p>The reason why we adhere to the strictest ingredient sourcing channels, the most disciplined process of preparation, at the hands of only the most qualified experts. creating every single product to perfection. Our root to rack systems and quality checks follow international standards of hygiene, to bring you a plethora of unmatched products that make every life healthy, happy and beautiful: both inside and out, because at Thalir it is all about being honest to the core.</p>', '<p>&ndash; Returns, Refunds, Cancellations and Exchanges</p>\r\n\r\n<p>&ndash; What We Will Do Together:</p>\r\n\r\n<p>Step 1 &ndash;<br />\r\nRaise a return/ replacement request within 7 days from the date of delivery, if you&rsquo;ve received wrong or expired product(s).<br />\r\nPlease raise a request here with order and contact details -(Phone number that given in website)<br />\r\nYou can also raise a request with us using the Chat option.(whatsapp button)<br />\r\nIn case of damaged/ missing product(s), raise a return/ replacement request within 2 days from the date of delivery.</p>\r\n\r\n<p>Step 2 &ndash; Give us 2 working days to review your return request.</p>\r\n\r\n<p>Step 3 &ndash; After reviewing your return request, we will send our courier partner to pick up the products delivered to you.</p>\r\n\r\n<p>Step 4 &ndash; In case our reverse pick up service is not available at your location, you will need to self-ship the product via any reliable courier partner. We will reimburse the courier charges, either in your PayTM Wallet or to your bank account etc.</p>\r\n\r\n<p>Step 5 &ndash; After your product(s) is received, we will verify it against the claim and initiate the replacement or refund accordingly. Please note that replacement will depend upon the stock availability.</p>\r\n\r\n<p>Under what conditions can I return/ replace my product?</p>\r\n\r\n<p>Wrong product delivered<br />\r\nExpired product delivered<br />\r\nDamaged product delivered &ndash; Physical damage/ tampered product or packaging<br />\r\nIncomplete order &ndash; missing products</p>\r\n\r\n<p>Under what conditions return/ replacement requests will not be accepted?</p>\r\n\r\n<p>Opened/ used/ altered products.<br />\r\nOriginal packaging (mono cartons, labels, etc.) missing.<br />\r\nThe return/ replacement request is generated after 7 days from the date of delivery.<br />\r\nThe damaged/ missing product is reported after 2 days from the date of delivery.</p>\r\n\r\n<p>How are returns processed?</p>\r\n\r\n<p>Once you request to return a product, a pick up is organised for the item. Our courier partners will come to pick up the item within 5-7 business days after your return request has been received. This item is then brought back to our warehouse where it is checked by our quality control team. Once the product passes the quality control, a refund is initiated.</p>\r\n\r\n<p>Can I cancel my order?</p>\r\n\r\n<p>Please call us on +918883848782 (Mon &ndash; Fri &ndash; 9 am to 6 pm), and we will help you in cancelling the order.</p>\r\n\r\n<p><br />\r\nHow will I receive the refund for my cancelled or returned product?</p>\r\n\r\n<p>In case of prepaid orders, money will be returned to the bank account/ credit/debit card or where the payment was made from within 7 business working days. For Cash on Delivery orders customers will be required to provide bank details where they would like to receive the refund</p>\r\n\r\n<p>How long does it take to receive a refund for a cancelled order or returned product?</p>\r\n\r\n<p>We will process your refund within 7 business days incase of cancellation of an order.In case of returns, we will refund the money after the product has been received by our warehouse and post completion of quality check. Please note, this entire process takes 2 weeks after the return has been picked up.</p>\r\n\r\n<p>Can I return part of my order?</p>\r\n\r\n<p>Yes. You can return any products that are eligible for returns within 7 days of delivery.</p>', '<p>HOW DO WE COLLECT YOUR PERSONAL INFORMATION?</p>\r\n\r\n<p>We communicate with you through a variety of means and channels, including our Platform, email, phone or text messaging on your mobile phone, although we do generally note that our preferred means of communication is email which has the least impact on the environment. Such communications may involve giving to you, as well as receiving information from you. We collect and receive the Personal Information in the following ways.</p>\r\n\r\n<p>When you submit your Personal Information on our Platform: The Company collects and stores the Personal Information that you provide while using our Platform including when you enter your Personal Information into data fields on the Platform as part of a voluntary registration process. We also collect and store your Personal Information through sponsored social media platforms, events, etc. For example, you may submit your name, postal address, e-mail address, and/or other information in order to register, place orders for the Products, receive information about various Products, register for newsletters, receive offers, contact Company&rsquo;s customer care service, or respond to the Company&rsquo;s surveys. To protect your privacy, you should not provide the Company with any information that is not specifically requested or that you do not wish to share. You can choose not to provide certain information, but then you might not be able to use our Platform or certain features of our Platform.</p>\r\n\r\n<p><br />\r\nAutomatic collection: We automatically collect and store certain types of information whenever you interact with us. Such information includes information about your use of the Platform, your interaction with content and services available through the Platform. Like many websites, unidentifiable information may be collected using various technologies, such as cookies, Internet tags, and web beacons. Your Internet browser automatically transmits to the Platform some of this unidentifiable information, such as the URL of the Website you just visited and the browser version your computer is operating. Passive information collection technologies can make your use of the Platform easier by allowing the Company to provide better service, customize sites based on consumer preferences, compile statistics, analyze trends, and otherwise administer and improve the Platform. Certain features of the Platform may not work without use of passive information collection technologies. Information collected by these technologies cannot be used to identity you without additional identifiable information. We may also receive/store information about your location and your mobile device, including a unique identifier for your device.</p>\r\n\r\n<p>Other sources: We might receive information about you from other sources, such as updated delivery and address information from third parties, which we use to correct our records and deliver your next purchase more easily. Further, we may receive information about you from third parties that feature our Products or promotional offers if you opt-in to receive information from us. You may also choose to participate in a third party application or social media sites through which you allow us to collect (or the third party to share) Personal Information about you, including usage information. We may also receive information, such as marketing related or demographic information about you from third parties to enhance our ability to tailor our content and offer you the Products that we believe may be of interest to you. The Company is not responsible for the privacy practices of such third-party websites which it does not own, manage or control.</p>\r\n\r\n<p>WHAT PERSONAL INFORMATION DO WE COLLECT?</p>\r\n\r\n<p>&bull; The Company limits itself to collect information which is necessary to ensure accurate services and is required to process your order of the Product or provide a refund and continually improve our Products and services.</p>\r\n\r\n<p>&bull; Following are the categories of Personal Information that is collected and processed by us:</p>\r\n\r\n<p>&bull; your name, e-mail and postal addresses, phone number(s), country;</p>\r\n\r\n<p>&bull; date of birth, language preference, location;</p>\r\n\r\n<p>&bull; any open data and public records such as information about you that is openly available on the Internet;</p>\r\n\r\n<p>&bull; names of people to whom purchases have been shipped including address and telephone numbers, IP addresses;</p>\r\n\r\n<p>&bull; Product interest information and in certain circumstances, your opinions and individual preferences, etc.;</p>\r\n\r\n<p>&bull; You may also provide us with information like financial information such as bank account or credit card or debit card or other payment instrument details, password for availing the Products at our Platform;</p>\r\n\r\n<p>&bull; We may also maintain a record of your Product interests and acquire information about you from our future affiliates;</p>\r\n\r\n<p>&bull; phone numbers used to call our customer service number.</p>\r\n\r\n<p>&bull; We may collect and use technical data and related information, including but not limited to, technical information about your device, system and application software, and peripherals, that is gathered periodically to facilitate the provision of software updates, product support and other services to you (if any) related to the Platform.</p>\r\n\r\n<p>WHAT IS THE PURPOSE FOR WHICH THE PERSONAL INFORMATION IS COLLECTED?</p>\r\n\r\n<p>&bull; The Company may use your Personal Information to:</p>\r\n\r\n<p>&bull; verify your identity;</p>\r\n\r\n<p>&bull; fulfill the Product purchases and transactions;</p>\r\n\r\n<p>&bull; communicate with you about your account and activities on the Platform;</p>\r\n\r\n<p>&bull; sign up for our newsletter, respond to a survey or marketing communication;</p>\r\n\r\n<p>&bull; allow us to better serve you in responding to your requests;</p>\r\n\r\n<p>&bull; to respond to reviews, comments, or other feedback provided to us;</p>\r\n\r\n<p>&bull; administer a contest, promotion, survey or other site feature;</p>\r\n\r\n<p>&bull; ask for ratings and reviews of the Products;</p>\r\n\r\n<p>&bull; follow up with you after correspondence (live chat, email or phone inquiries);</p>\r\n\r\n<p>&bull; allow you to log in with a social media account and share activities on your social media pages;</p>\r\n\r\n<p>&bull; comply with our legal obligations, policies and procedures, including compliance with relevant industry standards and the enforcement of our terms and conditions;</p>\r\n\r\n<p>&bull; help us learn more about your shopping preferences;</p>\r\n\r\n<p>&bull; conduct marketing and performance research to assist us in measuring our customer services, benchmarking our performance and to help us improve your shopping experiences and Product offerings;</p>\r\n\r\n<p>&bull; send communication related to order updates and offers through e-mail, SMS and social media channels;</p>\r\n\r\n<p>&bull; do internal research on our Customer&rsquo;s demographics, interests, and behaviour to better understand and serve you;</p>\r\n\r\n<p>&bull; provide you with exclusive offers at the Platform, tailor content, advertisements, and we provide you, and improve the Platform and/or for internal business purposes;</p>\r\n\r\n<p>&bull; analyze trends, track Customer&rsquo;s web page movements, help identify you and your shopping cart for aggregate use;</p>\r\n\r\n<p>&bull; determine which of the store locations containing our Products may be closest to you, provide promotional offers, and to offer Products to you;</p>\r\n\r\n<p>&bull; prevent, detect, investigate and take action against crimes (including but not limited to fraud and other financial crimes), any other illegal activities, suspected fraud, or violations of Company&rsquo;s terms and conditions in any jurisdiction;</p>\r\n\r\n<p>&bull; establish, exercise or defend legal rights in connection with legal proceedings (including any prospective legal proceedings) and seek professional or legal advice in relation to such legal proceedings; and</p>\r\n\r\n<p>&bull; comply with any applicable law, regulation, legal process or enforceable governmental request.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&bull; The legal basis on which we collect your Personal Information:</p>\r\n\r\n<p>HOW WE STORE YOUR PERSONAL INFORMATION</p>\r\n\r\n<p>We may store Personal Information using our own secure on-site servers or other internally hosted technology. Your Personal Information may also be stored by third parties, via cloud services or other technology, with whom the Company has contracted, to support the Company&rsquo;s business operations.</p>\r\n\r\n<p>These third parties do not use or have access to your Personal Information other than for cloud storage and retrieval, and the Company requires such parties to employ at least the same level of security that we use to protect your Personal Information.</p>\r\n\r\n<p>DISPOSAL OF PERSONAL INFORMATION</p>\r\n\r\n<p>We will only use your Personal Information for those purposes and will make sure that your privacy is protected. We shall take reasonable steps to delete or permanently de-identify Personal Information that is no longer needed.</p>\r\n\r\n<p>DISPOSAL OF PERSONAL INFORMATION</p>\r\n\r\n<p>We will only use your Personal Information for those purposes and will make sure that your privacy is protected. We shall take reasonable steps to delete or permanently de-identify Personal Information that is no longer needed.</p>\r\n\r\n<p>POLICY REVIEW</p>\r\n\r\n<p>Please note that we review and may make changes to this Policy from time to time. When changes are made, the Policy link will include a notation &ldquo;Revised (date).&rdquo; indicating that you should review the new terms, which will be effective immediately upon posting on this page, with an updated effective date. By accessing the Platform after any changes have been made, you signify your agreement on a prospective basis to the modified Policy and any changes contained therein.</p>', '<p>The standard ground mail service is shipped via DTDC/BlueDart/Professional Courier/Ecom/IndiaPost. We try to dispatch all our orders within 24-48 hours in normal BAU days. Please be advised that shipments are not sent out on Saturdays, Sundays, or any Holidays. We do not guarantee arrival dates or times and it is dependent on the courier partner and location.</p>\r\n\r\n<p>The shipping and handling charges are mentioned at the time of check out and consumers will know about this before making payments.<br />\r\n<br />\r\n2. Once your order has been confirmed and dispatched, you will receive an email with the details of the tracking number and the courier company. We usually dispatch most orders within 1-4 business days.<br />\r\n<br />\r\n3. The estimated delivery time may vary slightly from state to state. Days excluding Saturdays, Sundays, and Holidays are calculated as working days. Product delivery may get delayed due to reasons relating to logistics issues.<br />\r\n<br />\r\n4. If you are ordering our products from a Mega Sale event, dispatches may be delayed due to increased volumes. We will target to dispatch all orders within a maximum of 7 days from the Date of Order.<br />\r\n<br />\r\n5. Split shipments are completely normal. This just means that different parts of your order may have simply been shipped from our different warehouse locations across India. Rest assured, you will only have to pay the shipping/COD charge if applicable, on the first package on you receive.</p>\r\n\r\n<p>DELIVERY POLICY<br />\r\n1. To ensure the safety and hygiene of all our customers, there might be delays in product dispatches &amp; deliveries owing to constraints on logistics due to COVID-19. In these instances, unfortunately, we would not be able to commit to dispatch or delivery timelines and request you to bear with us.<br />\r\n<br />\r\n2. Cash on Delivery (COD) option is available for all products subjected to availability, promotions and offers.<br />\r\n<br />\r\n3. We take extensive precautions on the safety of the products and its packaging while dispatching it. We pack our products in boxes, where each individual product is wrapped in bubble wrap while fragile items like bottles are safely secured with additional bubble wrap.<br />\r\n<br />\r\n4. If the shipment is tampered or damaged, please do not accept it.<br />\r\n<br />\r\n5. Orders placed on the second half of Saturday or Sunday will be dispatched within 48-72 hours.<br />\r\n<br />\r\n6. If the order is updated as delivered but the user has not received the order, the same has to be intimated to the customer service team via call or email within 24 hours of the delivery intimation, wherein you will have to give 48-72 hours to investigate with our courier partners.<br />\r\n<br />\r\n7. For all claims regarding shortages or damages must be reported to customer service within 24 hours of the order delivery. 3 working days are required to investigate and review your request. If any shipment is tampered with or damaged, please do not accept it.<br />\r\n<br />\r\n8. In case our reverse pick-up service is not available at your location, you will need to self-ship the product via any reliable courier partner. We will reimburse the courier charges.<br />\r\n<br />\r\n9. We are not responsible for damages post-delivery. We do not take responsibility for the misplacement of products post-delivery.<br />\r\n<br />\r\n10. We reserve the right to pause deliveries to any part of the country at any time if so warranted.<br />\r\n<br />\r\n11. Products with a date of expiration of below 3 months would be eligible for a return, wherein, the complete amount of the product will be credited to the concerned person. No returns or refund requests will be accepted for products whose expiry date is more than 3 months.<br />\r\n<br />\r\n12. Resellers are not eligible for Pro Points &amp; Offers.</p>', '<hr />\r\n<p>How will I receive the refund for my cancelled or returned product?</p>\r\n\r\n<p>In case of prepaid orders, money will be returned to the bank account/ credit/debit card or where the payment was made from within 7 business working days. For Cash on Delivery orders customers will be required to provide bank details where they would like to receive the refund</p>\r\n\r\n<p>How long does it take to receive a refund for a cancelled order or returned product?</p>\r\n\r\n<p>We will process your refund within 7 business days incase of cancellation of an order.In case of returns, we will refund the money after the product has been received by our warehouse and post completion of quality check. Please note, this entire process takes 2 weeks after the return has been picked up.</p>\r\n\r\n<p>Can I return part of my order?</p>\r\n\r\n<p>Yes. You can return any products that are eligible for returns within 7 days of delivery.</p>', NULL, '2023-05-30 18:33:12', '08883848782', 'Thalir Natural Solutions , Ernakulam, Kaloor', '682017', '', '', '<p>Thalir Natural Solutions the Company abode of authentic ayurvedic formulations and traditional rituals perfected for the modern-day skincare routine. Our skincare products and rituals are crafted and developed by best Ayurvedic Experts.The traditional concept of Ayurveda is seamlessly blended into a skincare routine that makes them easy and quick to perform and include in your everyday skincare routine. The best of both worlds, a concoction of the old and the new- it&rsquo;s time to discover what&rsquo;s right for skincare. It&rsquo;s time to discover Thalir.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `shop_reviews`
--

CREATE TABLE `shop_reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customername` varchar(64) NOT NULL DEFAULT '',
  `rating` int(11) NOT NULL,
  `comment` text NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `image` varchar(128) NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shop_reviews`
--

INSERT INTO `shop_reviews` (`id`, `customername`, `rating`, `comment`, `status`, `image`, `created_at`, `updated_at`) VALUES
(20, 'Aria Sanara', 5, 'I recently placed an order from Thalir Aloe Vera Shampoo and Thalir Ayurvedic Hair care oil. Needless to say, the products are amazing. While the ordering process was smooth. I accidentally put in the wrong address and had to reach out to the Thalir Natural Solutions support team. They were extremely polite, and the products were delivered sooner than expected to my doorstep.', 'Active', '/uploads/reviews/AriaSanara_030315.png', '2022-11-10 07:03:11', '2023-01-15 09:33:47'),
(21, 'Jerry James', 5, 'After multiple procedures and color treatment, my hair was in a desperate need for a detox and rejuvenation. On my quest to find products that are effective and natural, I found Thalir My hair now feels nourished and healthy from root to tip. The Thalir Hair care Range has been a game- changer, especially the oil.', 'Active', '/uploads/reviews/customer4_331210.png', '2022-11-10 07:03:26', '2023-01-15 04:10:09'),
(22, 'Rincy Mumthaz', 5, 'I wanted to use natural products for my Children and came across Thalir one years ago. And I am loving it. I use the Aloe Vera Shampoo, Hair Oil, and just love all of these. Also this website works perfectly. I would suggest you make an app also. Payment is secure and delivery was on time. This is the best brand in this category.', 'Active', '/uploads/reviews/RincyMumthaz_270515.png', '2022-11-10 07:03:45', '2023-01-19 01:20:07'),
(23, 'Sri Chezhiyanee', 5, 'Thalir  products are so good and natural. They make hair feel really healthy. I mostly use Thalir Ayurvedic Hair oil which is great for Hair loss and Dandruff solutions. It is much better than other Hair Oils Whenever I need any hair care products I buy it from Thalir Natural Solutions.', 'Active', '/uploads/reviews/SriChezhiyan_020315.png', '2022-11-10 07:04:07', '2023-06-06 10:46:55'),
(28, 'Sahil Abdullah', 5, 'I use a number of Thalir products - Thalir Ayurvedic Hair Care Oil, Aloe Vera Shampoo. I\'ve had one of the best shopping experiences. The delivery was early and easy to track. The website is stable and smooth and easy to navigate. The payment Gateway is also smooth and secure.', 'Active', '/uploads/reviews/SahilAbdullah_530515.png', '2023-01-15 12:23:52', '2023-01-15 12:23:52'),
(29, 'sfefw', 14, 'wefwfw', 'Active', '', '2023-06-06 10:46:32', '2023-06-06 10:46:32');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `cat_id` int(11) NOT NULL DEFAULT 0,
  `name` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `cat_id`, `name`) VALUES
(1, 2, 'Hair oils'),
(2, 2, 'Shampoo');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` enum('superadmin','admin','user') NOT NULL DEFAULT 'user',
  `name` varchar(64) NOT NULL DEFAULT '',
  `email` varchar(128) NOT NULL DEFAULT '',
  `password` varchar(256) NOT NULL DEFAULT '',
  `phone` varchar(13) NOT NULL DEFAULT '',
  `added_by` int(11) NOT NULL DEFAULT 0,
  `status` enum('Active','Pending','Suspended','Deleted') NOT NULL DEFAULT 'Pending',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `type`, `name`, `email`, `password`, `phone`, `added_by`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', 'admin', 'superadmin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '', 0, 'Active', 'GJ2smwE58A3Tan8sYUiMWtWK3F8I79T6mTPLnRcwttRSzdO5YMHd40nwqAR8', '2022-10-25 11:01:00', '2022-10-25 11:01:00'),
(2, 'superadmin', 'ADARSHJOSE', 'adarshjose@gmail.com', '08362d7fd59366847930c587808bc208', '', 0, 'Active', '0M0DstrtFupstgvl3DKeJKQZh0AFG6wdqiTs9L8tciLyfzjJ8Szf3MHXBXjj', '2022-10-25 11:01:00', '2022-10-25 11:01:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ordered_items`
--
ALTER TABLE `ordered_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`(191));

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_benefits`
--
ALTER TABLE `product_benefits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_colors`
--
ALTER TABLE `product_colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_faqs`
--
ALTER TABLE `product_faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_howtouse`
--
ALTER TABLE `product_howtouse`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_ingredients`
--
ALTER TABLE `product_ingredients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_units`
--
ALTER TABLE `product_units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop_reviews`
--
ALTER TABLE `shop_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=678;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ordered_items`
--
ALTER TABLE `ordered_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=237;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `product_benefits`
--
ALTER TABLE `product_benefits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `product_colors`
--
ALTER TABLE `product_colors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_faqs`
--
ALTER TABLE `product_faqs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `product_howtouse`
--
ALTER TABLE `product_howtouse`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `product_ingredients`
--
ALTER TABLE `product_ingredients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `product_reviews`
--
ALTER TABLE `product_reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `product_units`
--
ALTER TABLE `product_units`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shop_reviews`
--
ALTER TABLE `shop_reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
