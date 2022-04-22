-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 10, 2022 at 11:39 AM
-- Server version: 8.0.27
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dairy_product_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `attribute`
--

DROP TABLE IF EXISTS `attribute`;
CREATE TABLE IF NOT EXISTS `attribute` (
  `attr_id` int NOT NULL AUTO_INCREMENT,
  `pid` int NOT NULL,
  `size_id` int DEFAULT NULL,
  `qty` int DEFAULT NULL,
  `price` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `mfg_date` date DEFAULT NULL,
  `expire_date` date DEFAULT NULL,
  PRIMARY KEY (`attr_id`)
) ENGINE=MyISAM AUTO_INCREMENT=72 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `attribute`
--

INSERT INTO `attribute` (`attr_id`, `pid`, `size_id`, `qty`, `price`, `mfg_date`, `expire_date`) VALUES
(1, 1, 4, 2, '130', '2022-04-01', '2022-05-28'),
(4, 2, 1, 11, '40', '2022-04-06', '2022-06-01'),
(5, 2, 2, 22, '70', '2022-04-03', '2022-06-24'),
(6, 2, 9, 23, '360', '2022-03-31', '2022-05-27'),
(17, 4, 1, 34, '42.75', '2022-04-01', '2022-05-28'),
(19, 5, 1, 56, '17.17', '2022-04-01', '2022-06-05'),
(9, 6, 2, 34, '298.99', '2022-04-06', '2022-06-03'),
(11, 8, 5, 32, '27.50', '2022-03-29', '2022-06-04'),
(23, 9, 1, 21, '160', '2022-04-04', '2022-05-27'),
(15, 3, 1, 42, '87.20', '2022-04-02', '2022-06-04'),
(16, 3, 11, 34, '313.50', '2022-04-06', '2022-06-04'),
(18, 4, 2, 13, '100', '2022-04-07', '2022-05-25'),
(20, 5, 3, 12, '120.20', '2022-04-04', '2022-05-26'),
(70, 7, 1, 34, '449.02', '2022-03-31', '2022-05-11'),
(24, 9, 11, 33, '650', '2022-04-06', '2022-05-27'),
(25, 10, 2, 34, '44.45', '2022-04-16', '2022-06-25'),
(30, 11, 4, 21, '47.47', '2022-04-08', '2022-06-05'),
(29, 11, 6, 23, '12', '2022-04-01', '2022-05-13'),
(31, 12, 1, 42, '275.75', '2022-04-01', '2022-05-27'),
(32, 13, 1, 21, '76.50', '2022-04-03', '2022-06-16'),
(33, 14, 1, 23, '90', '2022-03-30', '2022-05-12'),
(35, 15, 15, 35, '34', '2022-03-30', '2022-06-01'),
(36, 15, 11, 21, '68', '2022-04-01', '2022-05-19'),
(37, 16, 1, 11, '160', '2022-03-28', '2022-06-03'),
(39, 17, 4, 23, '270', '2022-04-06', '2022-05-20'),
(40, 17, 8, 26, '135', '2022-04-05', '2022-05-27'),
(42, 18, 18, 24, '51.70', '2022-04-02', '2022-06-04'),
(43, 18, 3, 43, '100', '2022-04-07', '2022-05-26'),
(48, 19, 11, 54, '124.08', '2022-03-31', '2022-07-01'),
(46, 20, 19, 21, '45.12', '2022-04-10', '2022-05-17'),
(47, 20, 16, 32, '25', '2022-04-06', '2022-05-26'),
(50, 21, 20, 21, '19', '2022-03-30', '2022-05-27'),
(51, 21, 1, 23, '100', '2022-02-28', '2022-05-26'),
(52, 22, 7, 43, '70', '2022-03-28', '2022-05-10'),
(54, 23, 8, 43, '292.50', '2022-04-07', '2022-05-27'),
(55, 23, 7, 21, '135', '2022-04-11', '2022-05-31'),
(57, 24, 21, 12, '68.25', '2022-04-02', '2022-05-20'),
(58, 24, 2, 23, '225', '2022-04-04', '2022-05-27'),
(60, 25, 1, 36, '50', '2022-03-28', '2022-05-26'),
(61, 25, 3, 27, '250', '2022-04-09', '2022-06-02'),
(62, 26, 2, 39, '29', '2022-04-01', '2022-05-27'),
(68, 28, 22, 34, '83', '2022-04-04', '2022-05-17'),
(67, 28, 6, 65, '22.50', '2022-04-13', '2022-05-28'),
(69, 29, 1, 54, '142.50', '2022-04-06', '2022-05-28'),
(71, 7, 13, 23, '550', '2022-04-01', '2022-05-18');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

DROP TABLE IF EXISTS `brand`;
CREATE TABLE IF NOT EXISTS `brand` (
  `brand_id` int NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(100) NOT NULL,
  PRIMARY KEY (`brand_id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_id`, `brand_name`) VALUES
(1, 'Amul'),
(2, 'Amul Taaza'),
(3, 'The Baker\'s Dozen'),
(4, 'Fresho'),
(5, 'Britannia'),
(6, 'Fresho Signature'),
(7, 'Milky Mist'),
(8, 'D\'Lecta'),
(9, 'kwality walls'),
(10, 'KOTS'),
(11, 'Puramate'),
(12, 'AKSHAYAKALPA'),
(13, 'Murginns'),
(14, 'Havmor'),
(15, 'Nestle'),
(16, 'Parle'),
(17, 'Foodpecker'),
(18, 'Cothas'),
(19, 'NIC'),
(20, 'Open Secret'),
(21, 'Britannia'),
(22, 'Wingreens Farms');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `cid` int NOT NULL AUTO_INCREMENT,
  `cname` varchar(100) NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cid`, `cname`) VALUES
(1, 'Dairy'),
(2, 'Bakery'),
(3, 'Cake');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

DROP TABLE IF EXISTS `contactus`;
CREATE TABLE IF NOT EXISTS `contactus` (
  `contact_id` int NOT NULL AUTO_INCREMENT,
  `contact_name` varchar(30) NOT NULL,
  `contact_email` varchar(30) NOT NULL,
  `message` varchar(100) NOT NULL,
  PRIMARY KEY (`contact_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`contact_id`, `contact_name`, `contact_email`, `message`) VALUES
(1, 'Mansi', 'mansi3@gmail.com', 'For Deliveryboy');

-- --------------------------------------------------------

--
-- Table structure for table `flavour`
--

DROP TABLE IF EXISTS `flavour`;
CREATE TABLE IF NOT EXISTS `flavour` (
  `flav_id` int NOT NULL AUTO_INCREMENT,
  `flav_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`flav_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `flavour`
--

INSERT INTO `flavour` (`flav_id`, `flav_name`) VALUES
(1, 'Chocolate'),
(2, 'Strawberry'),
(3, 'Plain'),
(4, 'Nuts'),
(5, 'Garlic'),
(6, 'Elaichi'),
(7, 'Coconut'),
(8, 'Vanilla'),
(9, 'Natural');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

DROP TABLE IF EXISTS `image`;
CREATE TABLE IF NOT EXISTS `image` (
  `i_id` int NOT NULL AUTO_INCREMENT,
  `url` varchar(200) NOT NULL,
  `pid` int NOT NULL,
  PRIMARY KEY (`i_id`)
) ENGINE=MyISAM AUTO_INCREMENT=82 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`i_id`, `url`, `pid`) VALUES
(1, '16493273940.webp', 1),
(2, '16493273941.webp', 1),
(3, '16493273942.webp', 1),
(4, '16493278430.webp', 2),
(5, '16493278431.webp', 2),
(6, '16493278432.webp', 2),
(7, '16493284720.webp', 3),
(8, '16493284721.webp', 3),
(9, '16493284722.webp', 3),
(10, '16493292350.webp', 4),
(11, '16493292351.webp', 4),
(12, '16493296050.webp', 5),
(13, '16493296051.webp', 5),
(14, '16493296052.webp', 5),
(15, '16493299370.webp', 6),
(16, '16493299371.webp', 6),
(19, '16493309430.webp', 7),
(18, '16493299373.webp', 6),
(20, '16493309431.webp', 7),
(21, '16493309432.webp', 7),
(22, '16493312290.webp', 8),
(23, '16493312291.webp', 8),
(24, '16493312292.webp', 8),
(25, '16493317880.webp', 9),
(26, '16493317882.webp', 9),
(27, '16493317881.webp', 9),
(28, '16493343870.webp', 10),
(29, '16493343420.webp', 10),
(30, '16493350210.webp', 11),
(31, '16493350211.webp', 11),
(32, '16493350212.webp', 11),
(33, '16493356220.webp', 12),
(34, '16493356221.webp', 12),
(35, '16493356222.webp', 12),
(36, '16493363250.webp', 13),
(37, '16493363251.webp', 13),
(38, '16493363252.webp', 13),
(39, '16493367420.webp', 14),
(40, '16493367421.webp', 14),
(41, '16493367432.webp', 14),
(42, '16493371700.webp', 15),
(43, '16493371701.webp', 15),
(44, '16493371702.webp', 15),
(45, '16493376410.webp', 16),
(46, '16493376411.webp', 16),
(47, '16493376412.webp', 16),
(48, '16493379400.webp', 17),
(49, '16493379401.webp', 17),
(50, '16493379402.webp', 17),
(51, '16494068440.webp', 18),
(52, '16494068441.webp', 18),
(53, '16494068442.webp', 18),
(54, '16494073740.webp', 19),
(55, '16494073741.webp', 19),
(56, '16494073742.webp', 19),
(57, '16494077240.webp', 20),
(58, '16494077241.webp', 20),
(59, '16494077242.webp', 20),
(60, '16494081740.webp', 21),
(61, '16494081741.webp', 21),
(62, '16494081742.webp', 21),
(63, '16494086400.webp', 22),
(64, '16494086401.webp', 22),
(65, '16494086402.webp', 22),
(66, '16494092370.webp', 23),
(67, '16494092371.webp', 23),
(68, '16494098450.webp', 24),
(69, '16494098453.webp', 24),
(70, '16494098451.webp', 24),
(71, '16494098452.webp', 24),
(72, '16494104340.webp', 25),
(73, '16494104341.webp', 25),
(74, '16494104342.webp', 25),
(75, '16494109210.webp', 26),
(76, '16494109211.webp', 26),
(77, '16494115330.webp', 28),
(78, '16494115331.webp', 28),
(79, '16494115332.webp', 28),
(80, '16494121110.webp', 29),
(81, '16494121111.webp', 29);

-- --------------------------------------------------------

--
-- Table structure for table `norder`
--

DROP TABLE IF EXISTS `norder`;
CREATE TABLE IF NOT EXISTS `norder` (
  `o_id` int NOT NULL AUTO_INCREMENT,
  `uid` int NOT NULL,
  `code` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `amount` varchar(100) NOT NULL,
  `discount` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `o_name` varchar(100) NOT NULL,
  `o_email` varchar(100) NOT NULL,
  `o_phone` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `pincode` int NOT NULL,
  `o_status` int NOT NULL COMMENT '0-Placed,1-Processing,2-Shipped,3-Delivered\r\n',
  `o_date` date NOT NULL,
  `payment_id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `d_b_id` int DEFAULT NULL,
  PRIMARY KEY (`o_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `norder`
--

INSERT INTO `norder` (`o_id`, `uid`, `code`, `amount`, `discount`, `o_name`, `o_email`, `o_phone`, `address`, `city`, `pincode`, `o_status`, `o_date`, `payment_id`, `d_b_id`) VALUES
(1, 10, 'NEW30', '991.35', '110.15', 'Priyanka', 'priyankashingala1@gmail.com', '7890678900', 'Abc cirlce', 'Surat', 395006, 3, '2022-05-08', 'pay_JGqgIK3CuJukwv', 13),
(2, 2, 'NEW20', '1465.5', '100', 'Dhruvisha', 'dhruvibalar@gmail.com', '9890566434', 'krishna park soc.', 'Surat', 395008, 0, '2022-04-09', 'pay_JHDeQvtnCABDWQ', 13),
(3, 2, 'NEW20', '1467.5', '100', 'Dhruvisha', 'dhruvibalar@gmail.com', '7890678900', 'krishna park soc.', 'Surat', 395008, 2, '2022-05-09', 'pay_JHDi5X0McniGx0', NULL),
(4, 9, 'NEW40', '719.1', '126.9', 'Komal', 'komaldesai@gmail.com', '9909090909', 'ring road', 'Surat', 395006, 2, '2022-06-09', 'pay_JHDlqvD9FlmYVq', 16);

-- --------------------------------------------------------

--
-- Table structure for table `orderdetail`
--

DROP TABLE IF EXISTS `orderdetail`;
CREATE TABLE IF NOT EXISTS `orderdetail` (
  `o_d_id` int NOT NULL AUTO_INCREMENT,
  `o_id` int NOT NULL,
  `pid` int NOT NULL,
  `o_qty` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `o_price` varchar(100) NOT NULL,
  `o_size_id` varchar(100) NOT NULL,
  PRIMARY KEY (`o_d_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orderdetail`
--

INSERT INTO `orderdetail` (`o_d_id`, `o_id`, `pid`, `o_qty`, `o_price`, `o_size_id`) VALUES
(1, 1, 12, '2', '275.75', '100 g'),
(2, 1, 7, '1', '550', '150 g'),
(3, 2, 26, '2', '29', '250 g'),
(4, 2, 28, '2', '22.50', '200 ml'),
(5, 2, 23, '5', '292.50', '500 ml'),
(6, 3, 3, '5', '313.50', '400 g'),
(7, 4, 11, '3', '12', '200 ml'),
(8, 4, 17, '3', '270', '1 L');

-- --------------------------------------------------------

--
-- Table structure for table `packtype`
--

DROP TABLE IF EXISTS `packtype`;
CREATE TABLE IF NOT EXISTS `packtype` (
  `pack_id` int NOT NULL AUTO_INCREMENT,
  `pack_name` varchar(100) NOT NULL,
  PRIMARY KEY (`pack_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `packtype`
--

INSERT INTO `packtype` (`pack_id`, `pack_name`) VALUES
(1, 'Carton'),
(2, 'Pouch'),
(3, 'Cups'),
(4, 'Tubs'),
(5, 'Tin'),
(6, 'Bottle');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `pid` int NOT NULL AUTO_INCREMENT,
  `pname` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `cid` int NOT NULL,
  `s_c_id` int NOT NULL,
  `description` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `ingredients` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `brand_id` int NOT NULL,
  `flav_id` int DEFAULT NULL,
  `pack_id` int NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pid`, `pname`, `cid`, `s_c_id`, `description`, `ingredients`, `brand_id`, `flav_id`, `pack_id`) VALUES
(1, 'Homogenised Toned Milk', 1, 2, 'Amul Taaza Homogenized Toned Milk is fully wholesome and entirely luscious. It has a low-fat, low-carb, low-calorie and standard protein content', 'Toned Milk, Fat 3.0 % minimum, SNF 8.5 % minimum.', 2, NULL, 1),
(2, 'Malai Fresh Paneer', 1, 3, 'Paneer is also called cottage cheese. Amul Fresh Paneer is made from pure milk, hygenically packed untouched by hand. It adheres to FASSAI norms. Amul fresh paneer is a rich source of Protein.', 'Milk', 1, NULL, 2),
(3, 'Lavash', 2, 18, 'Crunchy 100% whole wheat flatbread with no maida which is a favourite with dips! Savour this yummy lavash and share it with your loved ones.', 'Wholewheat Flour (Atta), Honey, Sesame Seeds, Iodized Salt, Yeast.', 3, NULL, 2),
(4, 'Milk Bread', 2, 11, 'Relish freshly baked, milky white, soft and spongy bread every morning. Make every bite delicious with buttery sandwiches or sweet and tangy jam sandwiches. Made with the finest ingredients and baked ', NULL, 4, NULL, 2),
(5, 'Gobbles - Bar Cake, Fruity Fun', 3, 21, 'Britannia Veg Fruit Cake is 100% vegetarian prepared with the goodness of little fruit bits and milk.', 'Refined Wheat Flour, Sugar, Edible Hydrogenated Vegetable Oil, Maltose Syrup, Edible Starch, Fruit Products, Iodised Salt, Preservatives, Acidity Regulator, Baking Powder, Raising Agent', 5, NULL, 2),
(6, 'Chocolate Cheese Cake - Eggless', 3, 23, 'Our Fresho Signature\'s Chocolate Cheesecake will instantly become one of your favourites. Its exquisite layers of flavours and texture will slowly melt in your mouth leaving behind a mild chocolate ta', 'Cream Cheese Filling, Milk Solids, Dark Chocolate, Sugar, Cocoa Solids, Corn Flour, Egg Replacer, Cookie Base, Choco Chip, Cake Gel, Acidity Regulators, Preservative, Emulsifier.', 6, 1, 1),
(7, 'Belgium Chocolate Truffle Cake', 3, 24, 'Fresho Signature\'s Belgium Chocolate Truffle Cake is a delightful surprise of soft chocolatey layers.', 'Chocolate Filling (Chocolate Ganache, Butter, Whipping Cream), Eggless Sponge [sugar, Refined Wheat Flour (Maida), Milk Solids, Refined Sunflower Oil, Cocoa Solids, Emulsifiers & Stabilizers (Ins 475, Ins 471, Ins 433 & Ins 415), Modified Starch (Ins 1440, Ins 1412, Ins 1442), Caramel (150d), Baking Powder, Raising Agent (Ins 450 (I)), Dextrose And Iodised Salt), Water, Refined Sunflower Oil], Chocolate Glaze [dark Compound (Sugar, Edible Vegetable Fat (Hydrogenated), Cocoa Solids & Emulsifiers (Ins 491, Ins 322), Fat Emulsion (Vegetable Cream), Liquid Glucose], Cocoa Crumb [butter, Brown Sugar, Almond Powder, Refined Wheat Flour (Maida), Cocoa Powder, Cocoa Nib, Iodized Salt, Dark Compound] Contains Permitted Natural Colour (Ins 150d) And Contains Added Flavour (Nature Identical And Artificial Flavoring Substance - Chocolate, Vanilla)', 6, 1, 1),
(8, 'Fruit Yoghurt - Strawberry', 1, 9, 'Real Fruit Yoghurt', 'Pasteurized Toned Milk Curd ( Active Culture), Strawberry Fruit Crush, Sugar, Thickening Agent,Acidifying Agent and Class II Preservative. Yoghurt enriched with Natural Fruit &  flavour.', 7, 2, 3),
(9, 'Cream Cheese', 1, 6, 'D\'lecta cream cheese is India\'s premium and leading cream cheese used by all top bakers & chefs.', 'Pasteurised milk & cream, Iodised Salt, Stabilisers (INS 410, INS 407), Cheese Culture', 8, 3, 4),
(10, 'Pizza Base', 2, 12, 'Fresho understands your love for pizza. It’s here with the ultimate Pizza Base to make your dreams of eating it easy peasy.', NULL, 4, 0, 2),
(11, 'Masti Buttermilk - Spice', 1, 7, 'Amul Masti Spice Buttermilk is a natural milk-based drink which will refresh you immediately on a hot summer afternoon.', 'Amul Masti Spice Buttermilk is made with milk solids, salt, common salt, spices, condiments and permitted stabilizer.', 1, NULL, 1),
(12, 'Frozen Dessert - Fruit & Nut', 1, 20, 'Its a delicious mess of contradictions. Succulent fruit and crunchy nuts trapped in scoops of creamy dessert. It is not just nice, its twice as nice! The magic you taste in every scoop comes from many', 'Water, Hazelnut Flavoured Confectionery (12.4%), (Water, Sugar, Milk Solids, Palm Oil, Liquid Glucose, Maldoxtrein, Cocoa Solid, Emulsifier - E471, Stabiliser - E410, E412, Contains Permitted Synthetic Food Colour - E102, E122, E110, E133, E143 And Added Flavour - Artificial Hazelnut Flavouring Substances), Sugar, Palm Oil, Milk Solid, Liquid Glucose, Cashew Nuts(3.2%), Raisins (3.2%), Almond (1.6%), Vegetable Protein (soy), Emulsifier (E471), Stabilisers - E410, E412 E407. Contains Permitted Synthetic Food Colors - E102, E110, And Added Flavour - Nature Identical Flavouring Substance.', 9, 4, 4),
(13, 'Twist Khari', 2, 15, 'Specially prepared for you to enjoy it a more twisted way for the original taste of khari-\"Khao Toh Jaano.\" Mini Khari\'s are small twist khari\'s made as per unique recipes which render them a distingu', 'Wheat Flour, Veg Fats, Salt, Cumin Seed', 10, NULL, 1),
(14, 'Cooker Cake Mix - Chocolate', 3, 24, 'Bring a homemade taste to your next celebration by baking a fresh and delicious. Celebrate birthdays and special occasions or, make for those “just because” moments', 'Refined Wheat Flour(Maida), Sugar, Whey Protein, Baking Powder, Cocoa Solids(6%), Chocolate Flavour Hydrognated vegetable oil, Iodised Salt, Emulsifiers and Stabilizers (E471,E477,E415) RaisingAgents E500(ii), E341(i),E341(ii), Colour(E150a,E151,E155)', 11, 1, 1),
(15, 'Curd - Set, Artisanal, Organic', 1, 5, 'Made from pure and certified organic milk, this artisanal curd is the perfect combination of health and taste. Loaded with several essential nutrients, the curd is comparatively lighter on the stomach', 'Pasteurised Milk, Active Live Cultures, Thickener (INS440)', 12, NULL, 3),
(16, 'Garlic & Herbs Butter', 1, 1, 'A mouth-watering combination of smooth creamy butter, freshly crushed garlic cloves and fresh herbs.', 'Energy-725.0 Kcal, Protein-0.3 gm, Carbohydrates-0.4 gm, Sugar-0.0 gm, Fat-80.0 gm, Sodium-850.0 mg.', 13, 5, 1),
(17, 'Dry Fruit Malai Ice Cream', 1, 20, 'Ice cream made with thickened milk and rich dry fruits like almonds, pistachio.\r\nHavmor is every ice cream lovers dream come true. Ice cream loves you, now pamper yourself with some Havmor Ice cream', 'Made From Milk and Milk Products.', 14, 4, 4),
(18, 'Ragi Loaf', 2, 10, 'A daily dose of nutritious whole wheat bread with a unique healthier calcium-rich ‘Ragi’ touch. No maida.', 'Wholewheat Flour (Atta), Ragi Flour (6%), Butter, Sugar, Iodized Salt, Yeast, Sourdough, Gluten, Flour Treatment Agent (Amylases).', 3, NULL, 1),
(19, 'Milkmaid Sweetened Condensed Milk', 1, 4, 'MILKMAID is rich and creamy, sweetened condensed milk - the dessert partner that helps you make a range of mouth-watering sweets at home - be it payasam, ice creams, cakes and much more', 'Milk Solids And Sugar', 15, NULL, 5),
(20, 'Rusk - Real Elaichi', 2, 13, 'Rusk is a hard twice-baked bread. It was originally discovered to preserve bread during the dry weather, the best way to relish this crispy tea-time snack is to eat if after dipping it in tea or coffe', 'Wheat Flour, Sugar, Edible Vegetable Oil, Yeast, Milk Solids, Salt, Butter, Wheat Gluten, [Lecithin of Soya Origin (Sodium Stearoy-2-Lactylates, Tartaric Acid Esters of Mono and Di-Glycerides, Mono & Fatty Acids) of Edible Vegetable Oils], Wheat Fibre, [Cardamom (0.08%), Antioxidant [300], Improver [1100].', 16, 6, 2),
(21, 'Coconut Mithai Cake - Pure Veg', 3, 22, 'An indulgent aromatic coconut cake that will remind you of good old home made coconut mithai.', 'Desiccated Coconut, Wheat Flour (Rawa), Sugar, Milk Solids, Pure Ghee, Raising Agents (541(1)), Emulsifier And Stabilizer (445, 415, 420) Contains Class Ii Preservatives (282, 200) Contains Added Synthetic Flavouring Substance (Vanilla)', 17, 7, 2),
(22, 'Vanilla Milkshake', 1, 8, 'For those breaking colds from coffee. Available in 250ml tamper-proof PP bottles. Best served cold.  It contains a 100% Natural Flavour of Vanilla. Relish this refreshing Vanilla Milkshake and enjoy y', 'Naturally Flavoured Vanilla Mixed With Toned Milk 3.0% Fat & 8.5% SNF', 18, 8, 6),
(23, 'Natural Ice Cream - Apricot', 1, 20, 'The king of fruits adds a delightful flavour to your scoop.', 'Weight, ‎380 Grams ; Volume, ‎500 Millilitres ; Ingredient Type, ‎Food Safe & Reusable packaging ; Brand, ‎NIC Natural Ice Creams ; Region Produced In, ‎India.', 19, 9, 4),
(24, 'Choco Almond Nutty Cookies - With No Maida, Healthy', 2, 14, 'With Almond as the main ingredient, our Choco Almond Nutty Cookies are made with 40-50% nuts.', 'Almonds (26%), Dark Compound (25%) [Sugar, Edible Vegetable Fat (Hydrogenated), Cocoa Solids, Emulsifiers (Ins 491, 322)], Peanuts (22%), Rice Crispy (5%) (Rice Flour, Wheat Flour, Sugar, Malt, Salt, Milk Powder), Honey, Oligofructose, Sugar, Sunflower Oil, Liquid Glucose, Cocoa Powder, Antioxidant (Ins 322), Edible Common Salt, Cocoa Butter Contains Permitted Natural Colour (Ins 150C) And Added Flavour (Natural Flavouring Substances) Contains Oligofructose (Dietary Fiber) 5 Gm/100 Gm', 20, 4, 1),
(25, 'Safed Makkhan', 1, 1, 'Amul Safed Makkhan is a slow-churned cultured butter made from pure Amul milk.', 'Milk Solids', 1, NULL, 1),
(26, 'Center Filled Cookie - Dark Chocolate', 2, 16, 'Rich, dark and crunchy chocolate cookies filled with liquid and dark chocolate creme, baked to perfection by Fresho Signature.', 'Refined Wheat Flour, Sugar, Margarine, Water, Milk Solids, Glucose Syrup, Food Additive (INS 450(I)), Cocoa Solids, Raising Agent (INS 500(ii)), Emulsifier (INS 322(I)), Iodised Salt, Permitted Synthetic Colour - (INS 150d), Added Flavour (Natural Flavouring Substance – Vanilla).', 6, 1, 1),
(28, 'Winkin\' Cow Vanillicious Thick Milkshake', 1, 8, 'Britannia Winkin\' Cow Thick Vanilla Milk Shake brings the goodness of vanilla milkshakes in a convenient and lasting tetra pack.', 'Prepared using Standardised Milk, Sugar, Water, Emulsifier and Stabilizers, Acidity Regulator, Iodised Salt, Added Flavours [Natural And Artificial (Vanilla) Flavouring Substances]', 5, 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `promocode`
--

DROP TABLE IF EXISTS `promocode`;
CREATE TABLE IF NOT EXISTS `promocode` (
  `promo_id` int NOT NULL AUTO_INCREMENT,
  `code` varchar(100) NOT NULL,
  `uid` int NOT NULL COMMENT '0-All',
  `promo_type` int NOT NULL COMMENT '0-flat,1-percentage',
  `amount` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `s_date` date NOT NULL,
  `e_date` date NOT NULL,
  `min_order` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `no_use` int NOT NULL,
  `promo_status` int NOT NULL COMMENT '0-active ,1-deactive',
  PRIMARY KEY (`promo_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `promocode`
--

INSERT INTO `promocode` (`promo_id`, `code`, `uid`, `promo_type`, `amount`, `s_date`, `e_date`, `min_order`, `no_use`, `promo_status`) VALUES
(1, 'NEW30', 10, 1, '10', '2022-04-09', '2022-04-19', '750', 5, 0),
(2, 'NEW20', 2, 0, '100', '2022-04-09', '2022-04-30', '1000', 6, 0),
(3, 'NEW40', 9, 1, '15', '2022-04-10', '2022-04-28', '800', 7, 0);

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

DROP TABLE IF EXISTS `rating`;
CREATE TABLE IF NOT EXISTS `rating` (
  `r_id` int NOT NULL AUTO_INCREMENT,
  `rating` float NOT NULL,
  `review` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `r_date` date NOT NULL,
  `pid` int NOT NULL,
  `uid` varchar(12) NOT NULL,
  PRIMARY KEY (`r_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`r_id`, `rating`, `review`, `r_date`, `pid`, `uid`) VALUES
(1, 4, 'Good', '2022-04-08', 7, '7'),
(2, 3, 'Excellent', '2022-04-08', 7, '10'),
(3, 3, 'Good', '2022-04-08', 22, '10'),
(4, 3, 'Good', '2022-04-08', 21, '10');

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

DROP TABLE IF EXISTS `size`;
CREATE TABLE IF NOT EXISTS `size` (
  `size_id` int NOT NULL AUTO_INCREMENT,
  `size_name` varchar(100) NOT NULL,
  PRIMARY KEY (`size_id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`size_id`, `size_name`) VALUES
(1, '100 g'),
(2, '250 g'),
(3, '500 g'),
(4, '1 L'),
(5, '100 ml'),
(6, '200 ml'),
(7, '250 ml'),
(8, '500 ml'),
(9, '1 kg'),
(10, '2 kg'),
(11, '400 g'),
(12, '64 g'),
(13, '150 g'),
(14, '700 ml'),
(15, '200 g'),
(16, '175 g'),
(17, '125 g'),
(18, '230 g'),
(19, '300 g'),
(20, '35 g'),
(21, '75 g'),
(22, '800 ml');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

DROP TABLE IF EXISTS `subcategories`;
CREATE TABLE IF NOT EXISTS `subcategories` (
  `s_c_id` int NOT NULL AUTO_INCREMENT,
  `cid` int NOT NULL,
  `scname` varchar(100) NOT NULL,
  PRIMARY KEY (`s_c_id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`s_c_id`, `cid`, `scname`) VALUES
(1, 1, 'Butter & Margarine'),
(2, 1, 'Milk'),
(3, 1, 'Paneer, Tofu & Cream'),
(4, 1, 'Condensed, Powdered Milk'),
(5, 1, 'Curd'),
(6, 1, 'Cheese'),
(7, 1, 'Buttermilk & Lassi'),
(8, 1, 'Flavoured, Soya Milk'),
(9, 1, 'Yogurt & Shrikhand'),
(10, 2, 'Brown, Wheat & Multigrain Bread'),
(11, 2, 'Milk, White & Sandwich Bread'),
(12, 2, 'Buns, Pavs & Pizza Base'),
(13, 2, 'Rusks'),
(14, 2, 'Bakery Biscuits, Cookies'),
(15, 2, 'Khari & Cream Rolls'),
(16, 2, 'Premium Cookies'),
(18, 2, 'Bread Sticks & Lavash'),
(19, 2, 'Puffs, Patties, Sandwiches'),
(20, 1, 'Ice Creams & Desserts'),
(21, 3, 'Tea Cakes & Slice Cakes'),
(22, 3, 'Muffins & Cup Cakes'),
(23, 3, 'Pastries & Brownies'),
(24, 3, 'Birthday & Party Cakes');

-- --------------------------------------------------------

--
-- Table structure for table `userregistration`
--

DROP TABLE IF EXISTS `userregistration`;
CREATE TABLE IF NOT EXISTS `userregistration` (
  `uid` int NOT NULL AUTO_INCREMENT,
  `uname` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `phone` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `u_type` int DEFAULT '0' COMMENT '0-user,1-admin,2-deliveryboy\r\n',
  `dob` date DEFAULT NULL,
  `terms` int NOT NULL DEFAULT '0',
  `token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `url` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `u_status` int NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `userregistration`
--

INSERT INTO `userregistration` (`uid`, `uname`, `phone`, `email`, `password`, `u_type`, `dob`, `terms`, `token`, `url`, `u_status`) VALUES
(1, 'Bali', '9781230590', 'balipatel123@gmail.com', 'bali123', 0, '2000-06-08', 1, NULL, NULL, 0),
(2, 'Dhruvisha', '9213456790', 'dhruvibalar@gmail.com', 'dhruviii', 0, '1997-07-24', 1, NULL, NULL, 0),
(3, 'Brinda', '9876590490', 'brindabhalala@gmail.com', 'brinda@123', 0, '2007-05-09', 1, NULL, NULL, 0),
(4, 'keyur', '9123856960', 'keyurdonda@gmail.com', '123donda', 0, '1992-07-08', 1, NULL, NULL, 0),
(5, 'Kunika', '9802345670', 'kunikadhaduk@gmail.com', 'kuni@456', 0, '1992-07-08', 1, NULL, NULL, 0),
(6, 'Bansi', '9234562380', 'bansiradadiya@gmail.com', 'bansi789', 0, '1992-07-08', 1, NULL, NULL, 0),
(7, 'Harshad', '9098345260', 'harshadantala2@gmail.com', 'hari123', 0, '1992-07-08', 1, NULL, NULL, 0),
(8, 'Sharda', '9046378560', 'sharda2@gmail.com', 'sharda43', 0, '1992-07-08', 1, NULL, NULL, 0),
(9, 'Komal', '9876098610', 'komaldesai@gmail.com', 'desai789', 0, '1992-07-08', 1, NULL, NULL, 0),
(10, 'Priyanka', '9870675320', 'priyankashingala1@gmail.com', 'pinku@123', 0, '2001-08-21', 1, '', NULL, 0),
(11, 'Ashika', '9909090909', 'ashika122@gmail.com', 'ashu@22', 0, '2002-06-20', 1, NULL, NULL, 0),
(12, 'Dhurvi', '9078909878', 'dhurvi2@gmail.com', 'dhurvi@90', 0, '2001-06-13', 1, NULL, NULL, 0),
(15, 'Priyanka', '9876543210', 'pinku123@gmail.com', '123', 1, '2022-04-17', 1, NULL, NULL, 0),
(13, 'Krinal', '9664949780', 'krinalsavani71@gmail.com', 'ksk@123', 2, '2002-06-21', 1, '', '1649500809.jpg', 0),
(14, 'Avani', '9967407970', 'avanivadadoriya8@gmail.com', 'avani@234', 1, '2001-05-10', 1, '', '1649500975.jpg', 0),
(16, 'Mahesh', '9890566434', 'mahesh@gmail.com', 'mahesh@234', 2, '2000-11-21', 1, NULL, '1649500543.webp', 0),
(17, 'Hasti', '8890098778', 'hasti@gmail.com', 'hasti', 2, '2005-06-09', 1, NULL, '1649500771.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

DROP TABLE IF EXISTS `wishlist`;
CREATE TABLE IF NOT EXISTS `wishlist` (
  `w_id` int NOT NULL AUTO_INCREMENT,
  `uid` int NOT NULL,
  `pid` int NOT NULL,
  PRIMARY KEY (`w_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`w_id`, `uid`, `pid`) VALUES
(1, 10, 10),
(2, 10, 28),
(3, 10, 26);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
