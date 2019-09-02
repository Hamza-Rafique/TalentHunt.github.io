-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2019 at 12:03 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `search_engine_tl`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `c_id` int(255) NOT NULL,
  `p_id` int(255) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `p_image` varchar(255) NOT NULL,
  `p_quantity` varchar(255) NOT NULL,
  `p_rate` varchar(255) NOT NULL,
  `total_amount` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`c_id`, `p_id`, `p_name`, `user_id`, `ip_address`, `p_image`, `p_quantity`, `p_rate`, `total_amount`) VALUES
(65, 29, 'Guava(Amrood)', '6', '1', '5c419ce83a02b4.88601571.jpg', '1', '600', '600'),
(66, 5, 'Mango', '6', '1', '5c4197d25e56b5.51641523.jpg', '1', '300', '300'),
(67, 30, 'Guava(Amrood)', '6', '1', '5c419d25675663.13599814.jpg', '6', '400', '2400');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`id`, `image`) VALUES
(2, '5c188bdd4c1054.26645621.png'),
(3, '5c188d3d1e2182.36353213.jpg'),
(4, '5c188d626c55a9.48021691.jpg'),
(5, '5c189293765904.37887031.jpg'),
(6, '5c1b64cb673c12.08705728.jpg'),
(7, '5c1b64da67e5a1.62243516.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `my_menu`
--

CREATE TABLE `my_menu` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `page` varchar(255) DEFAULT NULL,
  `sort_order` int(11) NOT NULL,
  `cat_type` varchar(255) DEFAULT NULL,
  `image` varchar(43) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `my_menu`
--

INSERT INTO `my_menu` (`id`, `title`, `parent_id`, `page`, `sort_order`, `cat_type`, `image`) VALUES
(1, 'home', NULL, 'index.php', 1, NULL, ''),
(2, 'Product', NULL, NULL, 100, NULL, ''),
(3, 'Services', NULL, NULL, 2, NULL, ''),
(4, 'about', NULL, 'about.php', 100, NULL, ''),
(7, 'Photography', 2, 'product1.php', 100, 'category', ''),
(8, 'Music', 2, 'product2.php', 100, 'category', ''),
(9, 'Dance', 2, 'product3.php', 100, 'category', ''),
(10, 'Free Style', 2, 'product4.php', 100, 'category', ''),
(11, 'Art', 2, 'product5.php', 100, 'category', ''),
(21, 'Film', 2, 'film.php', 100, 'category', ''),
(22, 'others', 2, 'others.php', 100, 'category', ''),
(23, 'Action', 7, 'photography.php', 100, 'sub_category', '1.jpg'),
(24, 'Animal', 7, 'photography.php', 100, 'sub_category', '2.jpg'),
(25, 'ArchiTecture', 7, 'photography.php', 100, 'sub_category', '3.jpg'),
(26, 'Black&White', 7, 'photography.php', 100, 'sub_category', '4.jpg'),
(27, 'nature', 7, 'photography.php', 100, 'sub_category', '5.jpg'),
(28, 'Rock', 8, 'music.php', 100, 'sub_category', '6.jpg'),
(29, 'POP', 8, 'music.php', 100, 'sub_category', '7.jpg'),
(30, 'Hip Hop', 8, 'music.php', 100, 'sub_category', '8.jpg'),
(31, 'Electronic', 8, 'music.php', 100, 'sub_category', '9.jpg'),
(32, 'Classical', 8, 'music.php', 100, 'sub_category', '10.jpg'),
(33, 'Hip Hop', 9, 'dance.php', 100, 'sub_category', '11.jpg'),
(34, 'Belly', 9, 'dance.php', 100, 'sub_category', '12.jpg'),
(35, 'Swing', 9, 'dance.php', 100, 'sub_category', '13.jpg'),
(36, 'Jazz', 9, 'dance.php', 100, 'sub_category', '14.jpg'),
(37, 'Ballet', 9, 'dance.php', 100, 'sub_category', '15.jpg'),
(38, 'Bhangra', 9, 'dance.php', 100, 'sub_category', '16.jpg'),
(39, 'BodyPop', 10, 'freestyle.php', 100, 'sub_category', '17.jpg'),
(40, 'Juggling', 10, 'freestyle.php', 100, 'sub_category', '18.jpg'),
(41, 'BeatBox', 10, 'freestyle.php', 100, 'sub_category', '19.jpg'),
(42, 'WaterSports', 10, 'freestyle.php', 100, 'sub_category', '20.jpg'),
(43, 'Rap', 10, 'freestyle.php', 100, 'sub_category', '21.jpeg'),
(44, 'Skiing', 10, 'freestyle.php', 100, 'sub_category', '22.jpg'),
(45, 'Tatoo', 11, 'art.php', 100, 'sub_category', '23.jpg'),
(46, 'Abstract', 11, 'art.php', 100, 'sub_category', '24.jpg'),
(47, 'Comic', 11, 'art.php', 100, 'sub_category', '25.jpg'),
(48, 'Sketch', 11, 'art.php', 100, 'sub_category', '26.jpg'),
(49, 'Oil painting', 11, 'art.php', 100, 'sub_category', '27.jpg'),
(50, 'Water color', 11, 'art.php', 100, 'sub_category', '28.jpg'),
(51, 'Still life', 11, 'art.php', 100, 'sub_category', '29.jpg'),
(52, 'Drama', 21, 'film.php', 100, 'sub_category', '30.png'),
(53, 'Crime', 21, 'film.php', 100, 'sub_category', '31.jpg'),
(54, 'Thriller', 21, 'film.php', 100, 'sub_category', '32.jpg'),
(55, 'Action', 21, 'film.php', 100, 'sub_category', '33.jpg'),
(56, 'Skifi', 21, 'film.php', 100, 'sub_category', '34.jpg'),
(57, 'Hurror', 21, 'film.php', 100, 'sub_category', '35.jpg'),
(58, 'Comedy', 21, 'film.php', 100, 'sub_category', '36.jpg'),
(59, 'Others', 21, 'film.php', 100, 'sub_category', '37.jpg'),
(60, 'Street Per.', 22, 'others.php', 100, 'sub_category', '38.jpg'),
(61, 'sync act', 22, 'others.php', 100, 'sub_category', '39.jpg'),
(62, 'Animal trick', 22, 'others.php', 100, 'sub_category', '40.jpg'),
(63, 'Magician', 22, 'others.php', 100, 'sub_category', '41.jpg'),
(64, 'Mime', 22, 'others.php', 100, 'sub_category', '42.jpg'),
(65, 'Modeling', 22, 'others.php', 100, 'sub_category', '43.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `p_category` varchar(255) NOT NULL,
  `p_quality` varchar(255) NOT NULL,
  `p_rate` varchar(255) NOT NULL,
  `p_quantity` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `add_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `user_id`, `p_category`, `p_quality`, `p_rate`, `p_quantity`, `description`, `picture`, `add_time`) VALUES
(2, 'Bitter Gourd', 0, '1', 'Meduim/B', '400', '222', 'This is a this', '5c418e95c07109.43690430.jpg', '2019-01-18 13:30:13'),
(3, 'pepper', 0, '1', 'Low/C', '222', '2', 'eeeeeeeeeeee', '5c418ef38b0625.54362397.jpg', '2019-01-18 13:31:47'),
(4, 'Mango', 6, '2', 'High/A', '400', '35', 'This is a mango of high quality', '5c4197a6987ab8.97988775.jpg', '2019-01-18 14:08:54'),
(5, 'Mango', 6, '2', 'Meduim/B', '300', '40', 'This is a mango of B quality', '5c4197d25e56b5.51641523.jpg', '2019-01-18 14:09:38'),
(6, 'Mango', 6, '2', 'Low/C', '250', '100', 'This is a mango of Lowquality', '5c4198034e2484.28083491.jpg', '2019-01-18 14:10:27'),
(7, 'Orange', 6, '2', 'High/A', '500', '60', 'This is a Orange of high quality', '5c4198285e9b54.85987629.jpg', '2019-01-18 14:11:04'),
(8, 'Orange', 6, '2', 'Meduim/B', '400', '101', 'This is a Orange of B/Meduim quality', '5c419850b84c24.99115065.jpg', '2019-01-18 14:11:44'),
(9, 'Orange', 6, '2', 'Low/C', '410', '422', 'This is a Orange of Low quality', '5c419876916dd9.04289818.jpg', '2019-01-18 14:12:22'),
(10, 'Orange', 6, '2', 'Meduim/B', '500', '594', 'This is a Orange of Meduim quality', '5c4198a323aec7.80339195.jpg', '2019-01-18 14:13:07'),
(11, 'potato', 6, '1', 'High/A', '1000', '10000', 'This is a potato seeds of high quality', '5c4199198ec506.63289106.jpg', '2019-01-18 14:15:05'),
(12, 'potato', 6, '1', 'Meduim/B', '700', '3000', 'This is a potato seed of meduim quality', '5c41994e5a8bc5.86887508.jpg', '2019-01-18 14:15:58'),
(13, 'potato', 6, '1', 'Low/C', '100', '5000', 'This is a potato seed of Low quality', '5c419976189f66.32189848.jpg', '2019-01-18 14:16:38'),
(14, 'potato', 6, '1', 'High/A', '600', '40000', 'This is a potato seed of High quality', '5c41999e1a3457.56112013.jpg', '2019-01-18 14:17:18'),
(15, 'Dates', 6, '2', 'High/A', '1000', '10000', 'This is a date of High quality', '5c4199e4adacb1.17632822.jpg', '2019-01-18 14:18:28'),
(16, 'Dates', 6, '2', 'Meduim/B', '400', '3000', 'This is a date of meduim quality', '5c419a0ce28c23.84153682.jpg', '2019-01-18 14:19:08'),
(17, 'Dates', 6, '2', 'Low/C', '300', '300', 'This is a date of lowquality', '5c419a32604c82.06266627.jpg', '2019-01-18 14:19:46'),
(18, 'Wheat', 6, '3', 'High/A', '2500', '10000', 'This is a crop of wheat of meduim quality', '5c419a6fb79f46.45087127.jpg', '2019-01-18 14:20:47'),
(19, 'Wheat', 6, '3', 'High/A', '3000', '10000', 'This is a crop of wheat of high quality', '5c419a97d54e66.17110110.jpg', '2019-01-18 14:21:27'),
(20, 'Wheat', 6, '3', 'Low/C', '1500', '4000', 'This is a crop of wheat of Low quality', '5c419ac4834e45.35762383.jpg', '2019-01-18 14:22:12'),
(21, 'Tomato', 6, '1', 'Meduim/B', '300', '5000', 'This is a seeds of tomato of meduim quality', '5c419b1613a1f6.61838740.jpg', '2019-01-18 14:23:34'),
(22, 'Tomato', 6, '1', 'High/A', '500', '6000', 'This is a seeds of tomato of High quality', '5c419b3e5451a4.29966617.jpg', '2019-01-18 14:24:14'),
(23, 'Cotton', 6, '3', 'High/A', '300', '3000', 'This is a Crop of cotton of meduim quality', '5c419bac9aef69.86121395.jpg', '2019-01-18 14:26:04'),
(24, 'Cotton', 6, '3', 'Meduim/B', '500', '4000', 'This is a Crop of cotton of meduim quality', '5c419be12e3f28.34114604.jpg', '2019-01-18 14:26:57'),
(25, 'Cotton', 6, '3', 'Low/C', '150', '30000', 'This is a Crop of cotton of low quality', '5c419c02b16d35.39603888.jpg', '2019-01-18 14:27:30'),
(26, 'Cotton', 6, '3', 'High/A', '330', '333', 'This is a Crop of cotton of meduim quality', '5c419c38997045.59502677.jpg', '2019-01-18 14:28:24'),
(27, 'Cotton', 6, '3', 'Low/C', '444', '333333', 'This is a Crop of cotton of low quality', '5c419c5c649904.50199160.jpg', '2019-01-18 14:29:00'),
(28, 'Guava(Amrood)', 6, '2', 'High/A', '200', '4000', 'This is a Fruit of Guava of high quality', '5c419cc4dc1181.28018808.jpg', '2019-01-18 14:30:44'),
(29, 'Guava(Amrood)', 6, '2', 'High/A', '600', '4000000', 'This is a Fruit of Guava of high quality', '5c419ce83a02b4.88601571.jpg', '2019-01-18 14:31:20'),
(30, 'Guava(Amrood)', 6, '2', 'Low/C', '400', '5000', 'This is a Fruit of Guava of low quality', '5c419d25675663.13599814.jpg', '2019-01-18 14:32:21'),
(32, 'Onion', 6, '1', 'Meduim/B', '600', '600', 'This is a seeds of onion of meduimquality', '5c419e20b77880.31237338.jpg', '2019-01-18 14:36:32'),
(33, 'Onion', 6, '1', 'High/A', '600', '8000', 'This is a seeds of onion of high quality', '5c419e52da0b95.15218564.jpg', '2019-01-18 14:37:22'),
(34, 'Bitter Gourd', 6, '1', 'Meduim/B', '800', '7878', 'This is a seeds of bitter huard of meduim quality', '5c419ea8b74e10.40539948.jpg', '2019-01-18 14:38:48'),
(35, 'Bitter Gourd', 6, '1', 'Low/C', '878', '890', 'This is a seeds of bitter guard of low quality', '5c419edba724e9.51525586.jpg', '2019-01-18 14:39:39'),
(36, 'Bitter Gourd', 6, '1', 'Meduim/B', '444', '3000', 'This is a seeds of bitter guard of meduim quality', '5c419f25715045.15785155.jpg', '2019-01-18 14:40:53'),
(37, 'Bitter Gourd', 6, '1', 'High/A', '404', '555995', 'This is a seeds of bitter guard of high quality', '5c419f55f33d63.01557957.jpg', '2019-01-18 14:41:41');

-- --------------------------------------------------------

--
-- Table structure for table `product_category_name`
--

CREATE TABLE `product_category_name` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `p_c_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_category_name`
--

INSERT INTO `product_category_name` (`p_id`, `p_name`, `p_c_type`) VALUES
(1, 'Orange', 2),
(2, 'Banana', 2),
(3, 'Strawberry', 2),
(4, 'Jujubar(Ber)', 2),
(5, 'Sweet Melon', 2),
(6, 'WaterMelon', 2),
(7, 'Sugercane(Ganderi)', 2),
(8, 'Pomegranate(Anaar)', 2),
(9, 'Grape Fruit', 2),
(10, 'Irani Apple', 2),
(11, 'Golden Apple', 2),
(12, 'Guava(Amrood)', 2),
(13, 'pear', 2),
(14, 'Custered Apple', 2),
(15, 'Kiwi', 2),
(16, 'Papaya', 2),
(17, 'Tangor(Fruiter)', 2),
(18, 'Sweet Lemon', 2),
(19, 'Coconut(Nariyal)', 2),
(21, 'Bae Fruite', 2),
(22, 'Spodilla(checku)', 2),
(23, 'Dried Apricot', 2),
(24, 'Mango', 2),
(25, 'Grewia(Falsa)', 2),
(26, 'Peaches ', 2),
(27, 'Plums ', 2),
(28, 'Jamun (Jambolan or syzygium) ', 2),
(29, 'Lychee', 2),
(30, 'Dates', 2),
(32, 'Cotton', 3),
(33, 'Fodder', 3),
(34, 'Maize', 3),
(35, 'Rice', 3),
(36, 'Pulses', 3),
(37, 'Sun Flower', 3),
(38, 'Wheat', 3),
(39, 'Sugarcane', 3),
(40, 'Oilseeds', 1),
(41, 'Onion', 1),
(42, 'Ladyfinger', 1),
(43, 'Bitter Gourd', 1),
(44, 'Mint', 1),
(45, 'Bottler Gourd', 1),
(46, 'Brinjal', 1),
(47, 'Tomato', 1),
(48, 'potato', 1),
(49, 'spinach', 1),
(50, 'Cocumber', 1),
(51, 'pepper', 1),
(52, 'Redish', 1),
(53, 'Cabbage', 1),
(54, 'Sweet peppers', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_category_type`
--

CREATE TABLE `product_category_type` (
  `p_c_id` int(11) NOT NULL,
  `p_c_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_category_type`
--

INSERT INTO `product_category_type` (`p_c_id`, `p_c_type`) VALUES
(1, 'Seeds'),
(2, 'Fruits'),
(3, 'Crops');

-- --------------------------------------------------------

--
-- Table structure for table `product_quality`
--

CREATE TABLE `product_quality` (
  `q_id` int(11) NOT NULL,
  `q_quality` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_quality`
--

INSERT INTO `product_quality` (`q_id`, `q_quality`) VALUES
(1, 'High/A'),
(2, 'Meduim/B'),
(3, 'Low/C');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `user_id` int(255) NOT NULL,
  `categories` varchar(100) NOT NULL,
  `time_of_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sub_category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `title`, `description`, `user_id`, `categories`, `time_of_add`, `sub_category`) VALUES
(28, '5cb199b583dd05.99728152.jpg', 'hey', 2183, '11', '2019-04-13 08:11:33', '46'),
(29, '5cb19e2345f7b7.54240397.jpg', 'new post', 2183, '8', '2019-04-13 08:30:27', '30'),
(30, '5cb19ee6105347.83584267.jpg', 'hh', 2183, '7', '2019-04-13 08:33:42', '24'),
(31, '5cb1a0f300ff11.31093869.jpg', 'flag', 2183, '11', '2019-04-13 08:42:27', '48'),
(32, '5cb1b8562a7e66.80760705.jpg', 'i am here', 2182, '9', '2019-04-13 10:22:14', '34'),
(33, '5cb1bc89c65ba7.56807748.jpg', 'mmm', 2182, '9', '2019-04-13 10:40:09', '35'),
(34, '5cb1bedadb16b3.67866772.jpg', 'james', 2182, '11', '2019-04-13 10:50:02', '48'),
(36, '5cb1f97dec0219.24114510.jpg', 'jj', 2183, '9', '2019-04-13 15:00:13', '35'),
(37, '5cb20217ada772.21270394.jpg', 'an', 2183, '7', '2019-04-13 15:36:55', '24'),
(38, '5cb23103932794.11629343.jpg', '1', 2183, '7', '2019-04-13 18:57:07', '23'),
(39, '5cb23115481bb0.79341919.jpg', '2', 2183, '7', '2019-04-13 18:57:25', '23'),
(40, '5cb23125f007b2.38991024.jpg', '3', 2183, '7', '2019-04-13 18:57:41', '23'),
(41, '5cb231336a3888.46375307.jpg', '4', 2183, '7', '2019-04-13 18:57:55', '23'),
(42, '5cb231452c74c4.35129918.jpg', '5', 2183, '7', '2019-04-13 18:58:13', '23'),
(43, '5cb2317075b791.17666727.jpg', 'a', 2183, '7', '2019-04-13 18:58:56', '24'),
(44, '5cb23180231736.07728061.jpg', 'b', 2183, '7', '2019-04-13 18:59:12', '24'),
(45, '5cb23198bdbc45.71153105.jpg', 'c', 2183, '7', '2019-04-13 18:59:36', '24'),
(46, '5cb231a934b747.95728706.jpg', 'd', 2183, '7', '2019-04-13 18:59:53', '24'),
(47, '5cb231bab4da23.03062098.jpg', 'e', 2183, '7', '2019-04-13 19:00:10', '24'),
(48, '5cb232148340b6.18250392.jpg', '1', 2183, '7', '2019-04-13 19:01:40', '25'),
(49, '5cb23224bb0986.52590845.jpg', '2', 2183, '7', '2019-04-13 19:01:56', '25'),
(50, '5cb232350ef418.05021205.jpg', '3', 2183, '7', '2019-04-13 19:02:13', '25'),
(51, '5cb23248006717.15510101.jpg', '4', 2183, '7', '2019-04-13 19:02:31', '25'),
(52, '5cb23256b38337.25800031.jpg', '5', 2183, '7', '2019-04-13 19:02:46', '25'),
(53, '5cb232769d86c1.17178113.jpg', 'a', 2183, '7', '2019-04-13 19:03:18', '26'),
(54, '5cb23287c10316.79125020.jpg', 'b', 2183, '7', '2019-04-13 19:03:35', '26'),
(55, '5cb2329b5fc028.63751404.jpg', 'c', 2183, '7', '2019-04-13 19:03:55', '26'),
(56, '5cb232ace53503.82805342.jpg', 'd', 2183, '7', '2019-04-13 19:04:12', '26'),
(57, '5cb232c3a26fe2.99906188.jpg', 'e', 2183, '7', '2019-04-13 19:04:35', '26'),
(58, '5cb232e703d045.03414178.jpg', '1', 2183, '7', '2019-04-13 19:05:11', '27'),
(59, '5cb232f862d6c8.50011878.jpg', '2', 2183, '7', '2019-04-13 19:05:28', '27'),
(60, '5cb23360cce8f0.77379214.jpg', '3', 2183, '7', '2019-04-13 19:07:12', '27'),
(61, '5cb233751daf78.82831620.jpg', '4', 2183, '7', '2019-04-13 19:07:33', '27'),
(62, '5cb2338ec02d38.75304348.jpg', '5', 2183, '7', '2019-04-13 19:07:58', '27'),
(63, '5cb234064015b4.52335644.jpg', 'a', 2183, '11', '2019-04-13 19:09:58', '45'),
(64, '5cb2341c5ad692.05644503.jpg', 'b', 2183, '11', '2019-04-13 19:10:20', '45'),
(65, '5cb23434aeb547.68444847.jpg', 'c', 2183, '11', '2019-04-13 19:10:44', '45'),
(66, '5cb234484a94d7.42377243.jpg', 'd', 2183, '11', '2019-04-13 19:11:04', '45'),
(67, '5cb2345b51b8e9.86646558.jpg', 'e', 2183, '11', '2019-04-13 19:11:23', '45'),
(68, '5cb234820561a0.27157523.jpg', '1', 2183, '11', '2019-04-13 19:12:02', '46'),
(69, '5cb234966152c2.40052301.jpg', '2', 2183, '11', '2019-04-13 19:12:22', '46'),
(70, '5cb234a7242248.67122929.jpg', '3', 2183, '11', '2019-04-13 19:12:39', '46'),
(71, '5cb234b5c50689.85146517.jpg', '4', 2183, '11', '2019-04-13 19:12:53', '46'),
(72, '5cb234c916baa2.56124631.jpg', '5', 2183, '11', '2019-04-13 19:13:13', '46'),
(73, '5cb234db8ead86.59495011.jpg', 'a', 2183, '11', '2019-04-13 19:13:31', '47'),
(74, '5cb23521a66db6.25399151.jpg', 'b', 2183, '11', '2019-04-13 19:14:41', '47'),
(75, '5cb235300d4221.38788869.jpg', 'c', 2183, '11', '2019-04-13 19:14:56', '47'),
(76, '5cb23543d92bf7.09276673.jpg', 'd', 2183, '11', '2019-04-13 19:15:15', '47'),
(77, '5cb235944b1419.97528742.jpg', 'e', 2183, '11', '2019-04-13 19:16:36', '47'),
(78, '5cb23639067bc1.76015206.jpg', '1', 2183, '11', '2019-04-13 19:19:21', '48'),
(79, '5cb2364faac483.58324076.jpg', '2', 2183, '11', '2019-04-13 19:19:43', '48'),
(80, '5cb23669e3e600.36533779.jpg', '3', 2183, '11', '2019-04-13 19:20:09', '48'),
(81, '5cb236805da334.49552362.jpg', '4', 2183, '11', '2019-04-13 19:20:32', '48'),
(82, '5cb2369e072ee5.57654805.jpg', '5', 2183, '11', '2019-04-13 19:21:02', '48'),
(83, '5cb2377b4d89e8.87937582.jpg', 'a', 2183, '11', '2019-04-13 19:24:43', '50'),
(84, '5cb2378e2a6b49.46341760.jpg', 'b', 2183, '11', '2019-04-13 19:25:02', '50'),
(85, '5cb2379dd4cc93.44615216.jpg', 'c', 2183, '11', '2019-04-13 19:25:17', '50'),
(86, '5cb237adcf3682.79838408.jpg', 'd', 2183, '11', '2019-04-13 19:25:33', '50'),
(87, '5cb237bd42b626.41585205.jpg', 'e', 2183, '11', '2019-04-13 19:25:49', '50'),
(88, '5cb237e8da4f18.12769836.jpg', '1', 2183, '11', '2019-04-13 19:26:32', '51'),
(89, '5cb237f947f398.67343077.jpg', '2', 2183, '11', '2019-04-13 19:26:49', '51'),
(90, '5cb23807669426.28237597.jpg', '3', 2183, '11', '2019-04-13 19:27:03', '51'),
(91, '5cb2381b5575d5.58425467.jpg', '4', 2183, '11', '2019-04-13 19:27:23', '51'),
(92, '5cb2382af3de09.05373580.jpg', '5', 2183, '11', '2019-04-13 19:27:38', '51'),
(93, '5cb2384b74b652.28923179.jpg', '1', 2183, '11', '2019-04-13 19:28:11', '49'),
(94, '5cb2385b586d75.27089611.jpg', '2', 2183, '11', '2019-04-13 19:28:27', '49'),
(95, '5cb2386a64a1c4.36010095.jpg', '3', 2183, '11', '2019-04-13 19:28:42', '49'),
(96, '5cb23886043ad9.66392962.jpg', '4', 2183, '11', '2019-04-13 19:29:10', '49'),
(97, '5cb23896aed277.64864583.jpg', '5', 2183, '11', '2019-04-13 19:29:26', '49'),
(98, '5cb2c5d6ce1d27.12719814.jpg', 'nn', 2182, '8', '2019-04-14 05:32:06', '29'),
(99, '5cb2c607193665.51146540.jpg', 'nn2', 2183, '8', '2019-04-14 05:32:55', '29'),
(100, '5cb2cc3beba8b0.58991024.jpg', 'wajid', 2182, '8', '2019-04-14 05:59:23', '29');

-- --------------------------------------------------------

--
-- Table structure for table `question_likes`
--

CREATE TABLE `question_likes` (
  `id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `likes` int(10) UNSIGNED DEFAULT '0',
  `dislikes` int(10) UNSIGNED DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `question_likes`
--

INSERT INTO `question_likes` (`id`, `question_id`, `user_id`, `likes`, `dislikes`) VALUES
(1, 1, 2156, 1, 1),
(2, 1, 2157, 1, 1),
(3, 5, 2160, NULL, 1),
(4, 5, 2161, NULL, 1),
(128, 25, 2182, 1, 0),
(129, 24, 2182, 0, 1),
(130, 22, 2182, 1, 0),
(131, 21, 2182, 1, 0),
(133, 26, 2182, 0, 1),
(134, 23, 2182, 1, 0),
(154, 26, 2164, 1, 0),
(156, 27, 2164, 0, 1),
(157, 24, 2164, 1, 0),
(159, 23, 2164, 1, 0),
(172, 24, 2183, 1, 0),
(174, 25, 2183, 0, 1),
(175, 26, 2183, 0, 1),
(178, 23, 2183, 1, 0),
(179, 27, 2183, 1, 0),
(181, 29, 2183, 1, 0),
(182, 31, 2183, 1, 0),
(183, 32, 2182, 1, 0),
(184, 33, 2182, 1, 0),
(185, 34, 2182, 1, 0),
(186, 36, 2183, 1, 0),
(187, 30, 2183, 0, 1),
(188, 37, 2183, 0, 1),
(189, 45, 2183, 1, 0),
(190, 34, 2183, 1, 0),
(191, 28, 2183, 1, 0),
(192, 38, 2183, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sessions_assignment`
--

CREATE TABLE `sessions_assignment` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sessions_assignment`
--

INSERT INTO `sessions_assignment` (`id`, `name`, `password`) VALUES
(1, 'Hamza', 'Joshan'),
(2, 'Shaibi Jatt', 'shaibijtt'),
(3, 'Faheem Khan', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `repassword` varchar(100) NOT NULL,
  `picture` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `about` varchar(100) NOT NULL,
  `time` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `repassword`, `picture`, `gender`, `about`, `time`) VALUES
(1, 'usman', 'usman@gmail.com', 'hamzajoshan', '', '', '', '', '0000-00-00 00:00:00.000000'),
(2164, 'Mohammad Ali', 'mali@example.com', '123', '', '', '', '', '0000-00-00 00:00:00.000000'),
(2180, 'hamza', 'hamzajoshan@gmail.com', 'hamza', '', '', '', '', '0000-00-00 00:00:00.000000'),
(2181, 'usman', 'usman@gmail.com', '', '', '5c9a61ca044d15.34402987.jpg', 'male', 'Singer', '2019-03-26 10:30:50.000000'),
(2182, 'Wajid', 'wajid@gmail.com', '123', '123', '5c9a6258123e03.45713012.jpg', 'male', 'Singer', '2019-03-26 10:33:12.000000'),
(2183, 'tanzeel', 'tanzeel@gmail.com', '123', '123', '5ca9c7ea13bce1.86711193.jpg', 'male', 'Singer', '2019-04-07 02:50:34.000000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `my_menu`
--
ALTER TABLE `my_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question_likes`
--
ALTER TABLE `question_likes`
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
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `question_likes`
--
ALTER TABLE `question_likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=193;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2184;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
