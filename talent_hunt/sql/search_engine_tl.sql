-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2019 at 11:38 AM
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
-- Table structure for table `add_cmp`
--

CREATE TABLE `add_cmp` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `cat` int(100) NOT NULL,
  `sub_cat` int(100) NOT NULL,
  `start` varchar(255) NOT NULL,
  `end` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_cmp`
--

INSERT INTO `add_cmp` (`id`, `name`, `cat`, `sub_cat`, `start`, `end`) VALUES
(6, 'hamza', 9, 33, '1563786718', '1563873118'),
(9, 'singing mania', 8, 32, '', ''),
(10, 'photo world', 7, 24, '', ''),
(11, 'tatoo zone', 11, 45, '', ''),
(13, 'new here', 10, 39, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `add_to`
--

CREATE TABLE `add_to` (
  `id` int(100) NOT NULL,
  `cmp_id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_to`
--

INSERT INTO `add_to` (`id`, `cmp_id`, `user_id`, `status`) VALUES
(30, 6, 2182, '5d2ee831b36a93.62014119.jpg'),
(31, 6, 2181, '5d2eeb20823f01.47894077.jpg'),
(32, 6, 2225, '5d2eeb6eeab6c7.08589388.jpg'),
(33, 6, 2240, '5d2eec50926503.95913425.jpg'),
(34, 9, 2183, '5d3007b297ebd3.91038177.jpg'),
(56, 6, 2183, '5d357dde865bd8.53039979.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `allot`
--

CREATE TABLE `allot` (
  `allot_id` int(255) NOT NULL,
  `cart_id` int(255) NOT NULL,
  `agent_id` int(100) NOT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `allot`
--

INSERT INTO `allot` (`allot_id`, `cart_id`, `agent_id`, `status`) VALUES
(4, 54, 2243, 'completed'),
(5, 55, 2243, 'completed'),
(6, 58, 2244, 'alloted'),
(8, 59, 2245, 'alloted');

-- --------------------------------------------------------

--
-- Table structure for table `bidding_details`
--

CREATE TABLE `bidding_details` (
  `id` int(11) NOT NULL,
  `b_id` varchar(255) NOT NULL,
  `bid_amount` varchar(255) NOT NULL,
  `cust_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bidding_details`
--

INSERT INTO `bidding_details` (`id`, `b_id`, `bid_amount`, `cust_id`) VALUES
(2, '2', '1358', '6'),
(3, '3', '598', '6'),
(4, '4', '26998', '11'),
(5, '4', '29698', '11'),
(6, '4', '32668', '11'),
(7, '4', '35935', '11'),
(8, '5', '499', '11'),
(9, '7', '721', ''),
(10, '7', '794', ''),
(11, '7', '874', '');

-- --------------------------------------------------------

--
-- Table structure for table `bid_products`
--

CREATE TABLE `bid_products` (
  `id` int(255) NOT NULL,
  `owner_id` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `cat_id` varchar(255) NOT NULL,
  `sub_cat_id` varchar(200) NOT NULL,
  `start_time` varchar(255) NOT NULL,
  `expire_time` varchar(255) NOT NULL,
  `bidding_amount` bigint(20) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bid_products`
--

INSERT INTO `bid_products` (`id`, `owner_id`, `image`, `cat_id`, `sub_cat_id`, `start_time`, `expire_time`, `bidding_amount`, `address`) VALUES
(7, '', '5d6b6f6b15ea3.png', '11', '49', '1567321963', '1567408363', 655, 'kdjdkjkfjfj');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `c_id` int(255) NOT NULL,
  `p_id` int(255) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `p_image` varchar(255) NOT NULL,
  `p_rate` int(255) NOT NULL,
  `status_admin` varchar(255) DEFAULT NULL,
  `status_agent` varchar(255) DEFAULT NULL,
  `status_over` varchar(255) DEFAULT NULL,
  `p_owner` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`c_id`, `p_id`, `p_name`, `user_id`, `p_image`, `p_rate`, `status_admin`, `status_agent`, `status_over`, `p_owner`) VALUES
(54, 101, 'test', 2182, '5cc568fabd00d5.66774279.jpg', 1200, NULL, NULL, NULL, 2183),
(55, 104, 'test', 2242, '5cc56a69b08265.21044140.jpg', 2333, NULL, NULL, NULL, 2225),
(58, 34, 'james', 2183, '5cb1bedadb16b3.67866772.jpg', 2000, NULL, NULL, NULL, 2182),
(59, 100, 'my', 2183, '5cc568bb9da048.94519107.jpg', 2500, NULL, NULL, NULL, 2233),
(60, 103, 'test 3', 2183, '5cc5695081bf71.60571353.jpg', 1500, NULL, NULL, NULL, 2182);

-- --------------------------------------------------------

--
-- Table structure for table `my_menu`
--

CREATE TABLE `my_menu` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `cat_type` varchar(255) DEFAULT NULL,
  `image` varchar(43) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `my_menu`
--

INSERT INTO `my_menu` (`id`, `title`, `parent_id`, `cat_type`, `image`) VALUES
(2, 'Product', NULL, NULL, ''),
(3, 'Services', NULL, NULL, ''),
(4, 'about', NULL, NULL, ''),
(7, 'Photography', 2, 'category', ''),
(8, 'Music', 2, 'category', ''),
(9, 'Dance', 2, 'category', ''),
(10, 'Free Style', 2, 'category', ''),
(11, 'Art', 2, 'category', ''),
(21, 'Short Film', 2, 'category', ''),
(22, 'others', 2, 'category', ''),
(23, 'Action', 7, 'sub_category', '1.jpg'),
(24, 'Animal', 7, 'sub_category', '2.jpg'),
(25, 'ArchiTecture', 7, 'sub_category', '3.jpg'),
(26, 'Black&White', 7, 'sub_category', '4.jpg'),
(27, 'nature', 7, 'sub_category', '5.jpg'),
(28, 'Rock', 8, 'sub_category', '6.jpg'),
(29, 'POP', 8, 'sub_category', '7.jpg'),
(30, 'Hip Hop', 8, 'sub_category', '8.jpg'),
(31, 'Electronic', 8, 'sub_category', '9.jpg'),
(32, 'Classical', 8, 'sub_category', '10.jpg'),
(33, 'Hip Hop', 9, 'sub_category', '11.jpg'),
(34, 'Belly', 9, 'sub_category', '12.jpg'),
(35, 'Swing', 9, 'sub_category', '13.jpg'),
(36, 'Jazz', 9, 'sub_category', '14.jpg'),
(37, 'Ballet', 9, 'sub_category', '15.jpg'),
(38, 'Bhangra', 9, 'sub_category', '16.jpg'),
(39, 'BodyPop', 10, 'sub_category', '17.jpg'),
(40, 'Juggling', 10, 'sub_category', '18.jpg'),
(41, 'BeatBox', 10, 'sub_category', '19.jpg'),
(42, 'WaterSports', 10, 'sub_category', '20.jpg'),
(43, 'Rap', 10, 'sub_category', '21.jpeg'),
(44, 'Skiing', 10, 'sub_category', '22.jpg'),
(45, 'Tatoo', 11, 'sub_category', '23.jpg'),
(46, 'Abstract', 11, 'sub_category', '24.jpg'),
(47, 'Comic', 11, 'sub_category', '25.jpg'),
(48, 'Sketch', 11, 'sub_category', '26.jpg'),
(49, 'Painting', 11, 'sub_category', '27.jpg'),
(50, 'Water color', 11, 'sub_category', '28.jpg'),
(51, 'Still life', 11, 'sub_category', '29.jpg'),
(52, 'Drama', 21, 'sub_category', '30.png'),
(53, 'Crime', 21, 'sub_category', '31.jpg'),
(54, 'Thriller', 21, 'sub_category', '32.jpg'),
(55, 'Action', 21, 'sub_category', '33.jpg'),
(56, 'Skifi', 21, 'sub_category', '34.jpg'),
(57, 'Hurror', 21, 'sub_category', '35.jpg'),
(58, 'Comedy', 21, 'sub_category', '36.jpg'),
(59, 'Others', 21, 'sub_category', '37.jpg'),
(60, 'Street Per.', 22, 'sub_category', '38.jpg'),
(61, 'sync act', 22, 'sub_category', '39.jpg'),
(62, 'Animal trick', 22, 'sub_category', '40.jpg'),
(63, 'Magician', 22, 'sub_category', '41.jpg'),
(64, 'Mime', 22, 'sub_category', '42.jpg'),
(65, 'Modeling', 22, 'sub_category', '43.jpg');

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
  `sub_category` varchar(255) NOT NULL,
  `rate` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `title`, `description`, `user_id`, `categories`, `time_of_add`, `sub_category`, `rate`) VALUES
(28, '5cb199b583dd05.99728152.jpg', 'hey', 2183, '11', '2019-04-16 02:06:08', '46', 2000),
(29, '5cb19e2345f7b7.54240397.jpg', 'new post', 2183, '8', '2019-04-13 08:30:27', '30', 0),
(31, '5cb1a0f300ff11.31093869.jpg', 'flag', 2183, '11', '2019-04-16 02:06:08', '48', 2000),
(32, '5cb1b8562a7e66.80760705.jpg', 'i am here', 2182, '9', '2019-04-13 10:22:14', '34', 0),
(33, '5cb1bc89c65ba7.56807748.jpg', 'mmm', 2182, '9', '2019-04-13 10:40:09', '35', 0),
(34, '5cb1bedadb16b3.67866772.jpg', 'james', 2182, '11', '2019-04-16 02:06:08', '48', 2000),
(36, '5cb1f97dec0219.24114510.jpg', 'jj', 2183, '9', '2019-04-13 15:00:13', '35', 0),
(37, '5cb20217ada772.21270394.jpg', 'an', 2183, '7', '2019-04-16 02:06:42', '24', 4000),
(38, '5cb23103932794.11629343.jpg', '1', 2183, '7', '2019-04-16 02:06:42', '23', 4000),
(39, '5cb23115481bb0.79341919.jpg', '2', 2183, '7', '2019-04-16 02:06:42', '23', 4000),
(40, '5cb23125f007b2.38991024.jpg', '3', 2183, '7', '2019-04-16 02:06:42', '23', 4000),
(41, '5cb231336a3888.46375307.jpg', '4', 2183, '7', '2019-04-16 02:06:42', '23', 4000),
(42, '5cb231452c74c4.35129918.jpg', '5', 2183, '7', '2019-04-16 02:06:42', '23', 4000),
(43, '5cb2317075b791.17666727.jpg', 'a', 2183, '7', '2019-04-16 02:06:42', '24', 4000),
(44, '5cb23180231736.07728061.jpg', 'b', 2183, '7', '2019-04-16 02:06:42', '24', 4000),
(45, '5cb23198bdbc45.71153105.jpg', 'c', 2183, '7', '2019-04-16 02:06:42', '24', 4000),
(46, '5cb231a934b747.95728706.jpg', 'd', 2183, '7', '2019-04-16 02:06:42', '24', 4000),
(47, '5cb231bab4da23.03062098.jpg', 'e', 2183, '7', '2019-04-16 02:06:42', '24', 4000),
(48, '5cb232148340b6.18250392.jpg', '1', 2183, '7', '2019-04-16 02:06:42', '25', 4000),
(49, '5cb23224bb0986.52590845.jpg', '2', 2183, '7', '2019-04-16 02:06:42', '25', 4000),
(50, '5cb232350ef418.05021205.jpg', '3', 2183, '7', '2019-04-16 02:06:42', '25', 4000),
(51, '5cb23248006717.15510101.jpg', '4', 2183, '7', '2019-04-16 02:06:42', '25', 4000),
(52, '5cb23256b38337.25800031.jpg', '5', 2183, '7', '2019-04-16 02:06:42', '25', 4000),
(53, '5cb232769d86c1.17178113.jpg', 'a', 2183, '7', '2019-04-16 02:06:42', '26', 4000),
(54, '5cb23287c10316.79125020.jpg', 'b', 2183, '7', '2019-04-16 02:06:42', '26', 4000),
(55, '5cb2329b5fc028.63751404.jpg', 'c', 2183, '7', '2019-04-16 02:06:42', '26', 4000),
(56, '5cb232ace53503.82805342.jpg', 'd', 2183, '7', '2019-04-16 02:06:42', '26', 4000),
(57, '5cb232c3a26fe2.99906188.jpg', 'e', 2183, '7', '2019-04-16 02:06:42', '26', 4000),
(58, '5cb232e703d045.03414178.jpg', '1', 2183, '7', '2019-04-16 02:06:42', '27', 4000),
(59, '5cb232f862d6c8.50011878.jpg', '2', 2183, '7', '2019-04-16 02:06:42', '27', 4000),
(60, '5cb23360cce8f0.77379214.jpg', '3', 2183, '7', '2019-04-16 02:06:42', '27', 4000),
(61, '5cb233751daf78.82831620.jpg', '4', 2183, '7', '2019-04-16 02:06:42', '27', 4000),
(62, '5cb2338ec02d38.75304348.jpg', '5', 2183, '7', '2019-04-16 02:06:42', '27', 4000),
(63, '5cb234064015b4.52335644.jpg', 'a', 2183, '11', '2019-04-16 02:06:08', '45', 2000),
(64, '5cb2341c5ad692.05644503.jpg', 'b', 2183, '11', '2019-04-16 02:06:08', '45', 2000),
(65, '5cb23434aeb547.68444847.jpg', 'c', 2183, '11', '2019-04-16 02:06:08', '45', 2000),
(66, '5cb234484a94d7.42377243.jpg', 'd', 2183, '11', '2019-04-16 02:06:08', '45', 2000),
(67, '5cb2345b51b8e9.86646558.jpg', 'e', 2183, '11', '2019-04-16 02:06:08', '45', 2000),
(68, '5cb234820561a0.27157523.jpg', '1', 2183, '11', '2019-04-16 02:06:08', '46', 2000),
(69, '5cb234966152c2.40052301.jpg', '2', 2183, '11', '2019-04-16 02:06:08', '46', 2000),
(70, '5cb234a7242248.67122929.jpg', '3', 2183, '11', '2019-04-16 02:06:08', '46', 2000),
(71, '5cb234b5c50689.85146517.jpg', '4', 2183, '11', '2019-04-16 02:06:08', '46', 2000),
(72, '5cb234c916baa2.56124631.jpg', '5', 2183, '11', '2019-04-16 02:06:08', '46', 2000),
(73, '5cb234db8ead86.59495011.jpg', 'a', 2183, '11', '2019-04-16 02:06:08', '47', 2000),
(74, '5cb23521a66db6.25399151.jpg', 'b', 2183, '11', '2019-04-16 02:06:08', '47', 2000),
(75, '5cb235300d4221.38788869.jpg', 'c', 2183, '11', '2019-04-16 02:06:08', '47', 2000),
(76, '5cb23543d92bf7.09276673.jpg', 'd', 2183, '11', '2019-04-16 02:06:08', '47', 2000),
(77, '5cb235944b1419.97528742.jpg', 'e', 2183, '11', '2019-04-16 02:06:08', '47', 2000),
(78, '5cb23639067bc1.76015206.jpg', '1', 2183, '11', '2019-04-16 02:06:08', '48', 2000),
(79, '5cb2364faac483.58324076.jpg', '2', 2183, '11', '2019-04-16 02:06:08', '48', 2000),
(80, '5cb23669e3e600.36533779.jpg', '3', 2183, '11', '2019-04-16 02:06:08', '48', 2000),
(81, '5cb236805da334.49552362.jpg', '4', 2183, '11', '2019-04-16 02:06:08', '48', 2000),
(82, '5cb2369e072ee5.57654805.jpg', '5', 2183, '11', '2019-04-16 02:06:08', '48', 2000),
(83, '5cb2377b4d89e8.87937582.jpg', 'a', 2183, '11', '2019-04-16 02:06:08', '50', 2000),
(84, '5cb2378e2a6b49.46341760.jpg', 'b', 2183, '11', '2019-04-16 02:06:08', '50', 2000),
(85, '5cb2379dd4cc93.44615216.jpg', 'c', 2183, '11', '2019-04-16 02:06:08', '50', 2000),
(86, '5cb237adcf3682.79838408.jpg', 'd', 2183, '11', '2019-04-16 02:06:08', '50', 2000),
(87, '5cb237bd42b626.41585205.jpg', 'e', 2183, '11', '2019-04-16 02:06:08', '50', 2000),
(88, '5cb237e8da4f18.12769836.jpg', '1', 2183, '11', '2019-04-16 02:06:08', '51', 2000),
(89, '5cb237f947f398.67343077.jpg', '2', 2183, '11', '2019-04-16 02:06:08', '51', 2000),
(90, '5cb23807669426.28237597.jpg', '3', 2183, '11', '2019-04-16 02:06:08', '51', 2000),
(91, '5cb2381b5575d5.58425467.jpg', '4', 2183, '11', '2019-04-16 02:06:08', '51', 2000),
(92, '5cb2382af3de09.05373580.jpg', '5', 2183, '11', '2019-04-16 02:06:08', '51', 2000),
(93, '5cb2384b74b652.28923179.jpg', '1', 2183, '11', '2019-04-16 02:06:08', '49', 2000),
(94, '5cb2385b586d75.27089611.jpg', '2', 2183, '11', '2019-04-16 02:06:08', '49', 2000),
(95, '5cb2386a64a1c4.36010095.jpg', '3', 2183, '11', '2019-04-16 02:06:08', '49', 2000),
(96, '5cb23886043ad9.66392962.jpg', '4', 2183, '11', '2019-04-16 02:06:08', '49', 2000),
(97, '5cb23896aed277.64864583.jpg', '5', 2183, '11', '2019-04-16 02:06:08', '49', 2000),
(100, '5cc568bb9da048.94519107.jpg', 'my', 2233, '7', '2019-04-28 08:47:55', '24', 2500),
(101, '5cc568fabd00d5.66774279.jpg', 'test', 2183, '7', '2019-04-28 08:48:58', '23', 1200),
(103, '5cc5695081bf71.60571353.jpg', 'test 3', 2182, '7', '2019-04-28 08:50:24', '23', 1500),
(104, '5cc56a69b08265.21044140.jpg', 'test', 2225, '7', '2019-04-28 08:55:05', '24', 2333),
(106, '5cc6afa48dca73.70637801.jpg', 'in', 2182, '10', '2019-04-29 08:02:44', '40', 0),
(107, '5cc6b7ce2a18d6.92697502.jpg', 'new post', 2238, '8', '2019-04-29 08:37:34', '29', 0),
(108, '5d281657c10a71.30903590.jpg', 'trend', 2183, '9', '2019-07-12 05:10:47', '37', 0),
(109, '5d2d6c00841e32.89167919.png', 'hey', 2182, '', '2019-07-16 06:17:36', '', 0);

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
(182, 31, 2183, 1, 0),
(183, 32, 2182, 1, 0),
(184, 33, 2182, 1, 0),
(185, 34, 2182, 1, 0),
(186, 36, 2183, 1, 0),
(187, 30, 2183, 0, 1),
(188, 37, 2183, 0, 1),
(189, 45, 2183, 1, 0),
(190, 34, 2183, 0, 1),
(192, 38, 2183, 0, 1),
(193, 36, 2182, 1, 0),
(194, 37, 2182, 0, 1),
(195, 42, 2182, 1, 0),
(197, 33, 2183, 0, 1),
(201, 107, 2183, 1, 0),
(203, 54, 2183, 0, 1),
(205, 32, 2183, 1, 0),
(206, 48, 2183, 1, 0),
(207, 28, 2183, 1, 0),
(211, 29, 2183, 1, 0),
(213, 30, 2182, 1, 0),
(216, 108, 2182, 0, 1),
(218, 110, 2182, 1, 0),
(221, 41, 2182, 1, 0),
(222, 40, 2182, 1, 0),
(223, 38, 2182, 1, 0),
(224, 39, 2182, 1, 0),
(225, 109, 2182, 1, 0),
(226, 107, 2182, 1, 0),
(227, 100, 2182, 1, 0),
(228, 37, 2233, 1, 0),
(229, 44, 2183, 1, 0),
(230, 45, 2182, 1, 0),
(231, 54, 2182, 0, 1),
(232, 103, 2182, 1, 0),
(233, 102, 2182, 1, 0),
(237, 105, 2237, 1, 0),
(240, 38, 2234, 1, 0),
(241, 39, 2234, 1, 0),
(242, 40, 2234, 1, 0),
(243, 41, 2234, 0, 1),
(244, 103, 2234, 0, 1),
(245, 101, 2234, 1, 0),
(246, 84, 2234, 1, 0),
(247, 106, 2182, 1, 0),
(250, 40, 2183, 0, 1),
(251, 103, 2183, 1, 0),
(255, 104, 2183, 1, 0),
(256, 58, 2183, 1, 0),
(257, 100, 2183, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `occupation` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `repassword` varchar(100) NOT NULL,
  `picture` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `time` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `occupation`, `password`, `repassword`, `picture`, `gender`, `time`) VALUES
(2181, 'usman', 'usman@gmail.com', 'artist', '123', '123', '5c9a61ca044d15.34402987.jpg', 'male', '2019-03-26 10:30:50.000000'),
(2182, 'Wajid', 'wajid@gmail.com', 'artist', '123', '123', '5c9a6258123e03.45713012.jpg', 'male', '2019-03-26 10:33:12.000000'),
(2183, 'tanzeel', 'tanzeel@gmail.com', 'artist', '123', '123', '5ca9c7ea13bce1.86711193.jpg', 'male', '2019-04-07 02:50:34.000000'),
(2225, 'mesam', 'mesam@gmail.com', 'artist', '12345678', '12345678', '', 'male', '2019-04-19 20:03:23.000000'),
(2233, 'arslan', 'arslan@gmail.com', 'user', '12345678', '12345678', '5cbb580e94d425.33183168.jpg', 'male', '2019-04-20 10:34:06.000000'),
(2234, 'admin', 'admin@gmail.com', 'admin', '12345678', '12345678', '5cc07545557002.42598884.jpg', 'male', '2019-04-24 07:40:05.000000'),
(2240, 'ali', 'ali@gmail.com', 'artist', '12345678', '12345678', '5d2eebe180b747.83983279.png', 'male', '2019-07-17 02:35:29.000000'),
(2241, 'shani', 'shani@gmail.com', '', '12345678', '12345678', '5d30039c850cc6.23391008.jpg', 'male', '2019-07-17 22:29:00.000000'),
(2242, 'shazib', 'shazib@gmail.com', 'artist', '12345678', '12345678', '5d354dc3981144.14669939.jpg', 'male', '2019-07-21 22:46:43.000000'),
(2243, 'agent1', 'agent@gmail.com', 'agent', '12345678', '12345678', '5d39474ccd1516.12018123.jpg', 'male', '2019-07-24 23:08:12.000000'),
(2244, 'agent2', 'agent2@gmail.com', 'agent', '12345678', '12345678', '5d3949096f7a09.05000260.jpg', 'male', '2019-07-24 23:15:37.000000'),
(2245, 'agent3', 'agent3@gmail.com', 'agent', '12345678', '12345678', '5d42b48f8d3b30.83285584.jpg', 'male', '2019-08-01 02:44:47.000000');

-- --------------------------------------------------------

--
-- Table structure for table `voting`
--

CREATE TABLE `voting` (
  `vote_id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `cmp_id` int(100) NOT NULL,
  `img` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `voting`
--

INSERT INTO `voting` (`vote_id`, `user_id`, `cmp_id`, `img`) VALUES
(1, 2233, 6, 29),
(2, 2233, 7, 30),
(3, 2233, 6, 30),
(4, 2233, 6, 30),
(5, 2233, 6, 30),
(6, 2233, 6, 30),
(7, 2233, 6, 30),
(8, 2233, 6, 30),
(9, 2233, 6, 30),
(10, 2233, 3, 30),
(11, 2233, 6, 30),
(12, 2182, 6, 30),
(13, 2242, 6, 31),
(14, 2242, 6, 31),
(15, 2242, 6, 31),
(16, 2242, 6, 31),
(17, 2242, 6, 31),
(18, 2242, 6, 31),
(19, 2242, 6, 31),
(20, 2242, 6, 31),
(21, 2242, 6, 31),
(22, 2242, 6, 31),
(23, 2242, 6, 31),
(24, 2242, 6, 31),
(25, 2242, 6, 31),
(26, 2242, 6, 31),
(27, 2242, 6, 31);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_cmp`
--
ALTER TABLE `add_cmp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `add_to`
--
ALTER TABLE `add_to`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `allot`
--
ALTER TABLE `allot`
  ADD PRIMARY KEY (`allot_id`);

--
-- Indexes for table `bidding_details`
--
ALTER TABLE `bidding_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bid_products`
--
ALTER TABLE `bid_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`c_id`);

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
-- Indexes for table `voting`
--
ALTER TABLE `voting`
  ADD PRIMARY KEY (`vote_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_cmp`
--
ALTER TABLE `add_cmp`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `add_to`
--
ALTER TABLE `add_to`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `allot`
--
ALTER TABLE `allot`
  MODIFY `allot_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `bidding_details`
--
ALTER TABLE `bidding_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `bid_products`
--
ALTER TABLE `bid_products`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `c_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `my_menu`
--
ALTER TABLE `my_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `question_likes`
--
ALTER TABLE `question_likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=258;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2246;

--
-- AUTO_INCREMENT for table `voting`
--
ALTER TABLE `voting`
  MODIFY `vote_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
