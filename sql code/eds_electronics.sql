-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2019 at 06:53 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eds_electronics`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `added_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `email`, `password`, `added_date`) VALUES
(1, 'RojenMoktan', 'rojen_admin123@eds.com', '$2y$10$O3uOOaVhbiKo9hvqp8.67.grBwAi5i7nZj3hXNQdSdSBE/hk9lPRO', '2019-01-05 00:00:00'),
(2, 'Admin', 'admin987@gmail.com', '$2y$10$wM7RX6hUbfik5I0OklHR1upS/ABKE.xakkSEnZULX.Qp74SVxTNNS', '2019-01-05 00:00:00'),
(3, 'eds', 'eds123@gmail.com', '$2y$10$LK/AM0tFXBNbV23SlZ3aA.KIE1yLVfM1qiL0XlHKijNBgU2skbyce', '2019-01-05 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `billing_address`
--

CREATE TABLE `billing_address` (
  `billing_id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `post_code` varchar(10) NOT NULL,
  `phone_no` varchar(50) NOT NULL,
  `billed_date` datetime NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `total_items` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `billing_address`
--

INSERT INTO `billing_address` (`billing_id`, `firstname`, `lastname`, `email`, `address`, `city`, `country`, `post_code`, `phone_no`, `billed_date`, `payment_method`, `total_items`, `total`, `status`) VALUES
(1, 'Alma', 'Junior', 'Alma.Jr@yahoo.com', '456 Champs', 'Paris', 'France', '+33', '213 234 5432', '2019-01-06 00:00:00', 'cash on delivery', 2, 4549, 'shipped'),
(2, 'Alma', 'Junior', 'Alma.Jr@yahoo.com', '456 Champs', 'Paris', 'France', '+33', '213 234 5432', '2019-01-06 00:00:00', 'cash on delivery', 2, 500, 'pending'),
(3, 'Alma', 'Junior', 'Alma.Jr@yahoo.com', '456 Champs', 'Paris', 'France', '+33', '213 234 5432', '2019-01-06 00:00:00', 'cash on delivery', 0, 500, 'pending'),
(4, 'Alma', 'Junior', 'Alma.Jr@yahoo.com', '456 Champs', 'Paris', 'France', '+33', '213 234 5432', '2019-01-06 00:00:00', 'cash on delivery', 0, 500, 'pending'),
(5, 'Alma', 'Junior', 'Alma.Jr@yahoo.com', '456 Champs', 'Paris', 'France', '+33', '213 234 5432', '2019-01-06 00:00:00', 'cash on delivery', 0, 500, 'pending'),
(6, 'Alma', 'Junior', 'Alma.Jr@yahoo.com', '456 Champs', 'Paris', 'France', '+33', '213 234 5432', '2019-01-06 00:00:00', 'cash on delivery', 0, 500, 'pending'),
(7, 'Alma', 'Junior', 'Alma.Jr@yahoo.com', '456 Champs', 'Paris', 'France', '+33', '213 234 5432', '2019-01-06 00:00:00', 'cash on delivery', 0, 500, 'pending'),
(8, 'Alma', 'Junior', 'Alma.Jr@yahoo.com', '456 Champs', 'Paris', 'France', '+33', '213 234 5432', '2019-01-06 00:00:00', 'cash on delivery', 0, 500, 'pending'),
(9, 'Alma', 'Junior', 'Alma.Jr@yahoo.com', '456 Champs', 'Paris', 'France', '+33', '213 234 5432', '2019-01-06 00:00:00', 'cash on delivery', 0, 500, 'pending'),
(10, 'Alma', 'Junior', 'Alma.Jr@yahoo.com', '456 Champs', 'Paris', 'France', '+33', '213 234 5432', '2019-01-06 00:00:00', 'cash on delivery', 1, 100, 'pending'),
(11, 'Alma', 'Junior', 'Alma.Jr@yahoo.com', '456 Champs', 'Paris', 'France', '+33', '213 234 5432', '2019-01-06 00:00:00', 'cash on delivery', 1, 100, 'pending'),
(12, 'Alma', 'Junior', 'Alma.Jr@yahoo.com', '456 Champs', 'Paris', 'France', '+33', '213 234 5432', '2019-01-06 00:00:00', 'cash on delivery', 1, 100, 'pending'),
(13, 'Daniel', 'Johnson', 'johnson@gmail.com', 'Valley Way', 'Hull', 'United Kingdom', '+44', '7143240977', '2019-01-06 00:00:00', 'cash on delivery', 1, 3999, 'pending'),
(14, 'Daniel', 'Johnson', 'johnson@gmail.com', 'Valley Way', 'Hull', 'United Kingdom', '+44', '7143240977', '2019-01-06 00:00:00', 'cash on delivery', 1, 3999, 'pending'),
(15, 'Rojen', 'Moktan', 'rojen.tmg123@gmail.com', 'Jorpati', 'Kathmandu', 'Nepal', '+977', '9808383431', '2019-01-06 00:00:00', 'cash on delivery', 1, 1000, 'pending'),
(16, 'Rojen', 'Moktan', 'rojen.tmg123@gmail.com', 'Jorpati', 'Kathmandu', 'Nepal', '+977', '9808383431', '2019-01-06 00:00:00', 'paypal', 1, 1000, 'pending'),
(17, 'Rojen', 'Moktan', 'rojen.tmg123@gmail.com', 'Jorpati', 'Kathmandu', 'Nepal', '+977', '9808383431', '2019-01-06 00:00:00', 'paypal', 1, 1000, 'pending'),
(18, 'Rojen', 'Moktan', 'rojen.tmg123@gmail.com', 'Jorpati', 'Kathmandu', 'Nepal', '+977', '9808383431', '2019-01-06 00:00:00', 'paypal', 1, 1000, 'pending'),
(19, 'Rojen', 'Moktan', 'rojen.tmg123@gmail.com', 'Jorpati', 'Kathmandu', 'Nepal', '+977', '9808383431', '2019-01-06 00:00:00', 'paypal', 1, 1000, 'pending'),
(20, 'Rojen', 'Moktan', 'rojen.tmg123@gmail.com', 'Jorpati', 'Kathmandu', 'Nepal', '+977', '9808383431', '2019-01-06 00:00:00', 'paypal', 1, 1000, 'pending'),
(21, 'Rojen', 'Moktan', 'rojen.tmg123@gmail.com', 'Jorpati', 'Kathmandu', 'Nepal', '+977', '9808383431', '2019-01-12 00:00:00', 'paypal', 1, 1000, 'pending'),
(22, 'Rojen', 'Moktan', 'rojen.tmg123@gmail.com', 'Jorpati', 'Kathmandu', 'Nepal', '+977', '9808383431', '2019-01-13 00:00:00', 'paypal', 3, 4550, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `category_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `name`, `description`, `category_img`) VALUES
(1, 'TV', 'We sell all kinds of televisions, mostly larger televisions. We sell products from Samsung, Sony, Toshiba, Panasonic, etc. Click to see more...', 'images/tv.jpg'),
(2, 'Camera', 'We sell all kinds of cameras, mostly larger one. We sell products from like GoPro Hero, Drone, flim making cameras, normal cameras etc.\r\n', 'images/camera.jpg'),
(3, 'Mobile', 'Prices range vary according to the quality of mobile. We sell products from Samsung, Iphones, Nokia, Sony, Panasonic, etc. To see more click to see more...', 'images/mobile.png'),
(4, 'Gaming', 'We sell all kinds of Gaming tools. Prices range vary according to the quality of Game. We sell products from Sony, Toshiba, Panasonic, Nintendo etc. ', 'images/gaming.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `postal_code` varchar(10) NOT NULL,
  `phone_no` varchar(50) NOT NULL,
  `added_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `firstname`, `lastname`, `email`, `password`, `address`, `city`, `country`, `postal_code`, `phone_no`, `added_date`) VALUES
(1, 'Tom', 'Jackson', 'jacksonHot@gmail.com', '$2y$10$LvEcyRqbCUlTghYAUNQeqOoZEOJOJDusxpfAarpJcUaBC/SKLaUnu', 'Broad St.', 'Birmingham', 'UK', '+44', '01604 23656', '2019-01-05 00:00:00'),
(2, 'John', 'Watson', 'johnwatson1998@hotmail.com', '$2y$10$LmXn/BOhBE3SPohLjBYLqeRu9mIUpT.VZK7eddUsO8kLdUr2I4LEW', 'Bay Road', 'Boston', 'UK', '+44', '617 234 493', '2019-01-05 00:00:00'),
(3, 'Harry', 'Andrew', 'Ha1991@gmail.com', '$2y$10$CGPQ0FPBeHxQl0oPHnhMWOjEVgWnKUGXnLubZllsBWu5Tvu8LaUxq', 'Imperial BLVD', 'Los Angelos', 'USA', '+1', '213 234 643', '2019-01-05 00:00:00'),
(4, 'Amenda', 'Peterson', 'Peterson000@outlook.com', '$2y$10$3U3o8BCEXdrddnw/CPK5ZeFaiNv03SjgUQNBM2PBs.cY63qW9cS5.', 'ELM street ', 'Toronto', 'Canada', '+44', '714 234 4353', '2019-01-05 00:00:00'),
(5, 'Alma', 'Junior', 'Alma.Jr@yahoo.com', '$2y$10$c0Uv/vG3hNtqVtxW69BykOclbIlXBiXNuLOYpo3nxOxQLr/4r4Er6', '456 Champs', 'Paris', 'France', '+33', '213 234 5432', '2019-01-05 00:00:00'),
(6, 'Hari', 'Bahadur', 'bahadur321@gmail.com', '$2y$10$huBWi.WOu6wEv5kVzPPhJ.VMlHlQbEHm2gem8CHGh8EMCCof5C/cS', 'Boudha', 'Kathmandu', 'Nepal', '+977', '9804356567', '2019-01-05 00:00:00'),
(7, 'Andrea', 'White', 'WhiteAnd@hotmail.com', '$2y$10$8VHRYjtEMrsWDJZDdeUCgOL2lkUXGaEYJugYsntTHUhi3fOE.H9im', 'All Lane', 'Seattle', 'USA ', '+1', '213 343 4353', '2019-01-05 00:00:00'),
(8, 'Angela', 'Mathew', 'Angela1999@gmail.com', '$2y$10$0MvY7/7Ke8qsia/UZUDB5Otk4m494MWvN3H5tbAGq3JiBOVdva1H.', 'Keungsgatan', 'Stockholm', 'Sweeden', '+46', '09318 213444', '2019-01-05 00:00:00'),
(9, 'Daniel', 'Johnson', 'johnson@gmail.com', '$2y$10$C8qlDN580HhsxJWDTI9WR.Oyn2wgYP0.Y0.S0PrY4/c49bXuEIO02', 'Valley Way', 'Hull', 'UK', '+44', '714 324 0977', '2019-01-05 00:00:00'),
(10, 'Rojen', 'Moktan', 'rojen.tmg123@gmail.com', '$2y$10$ispDzxPIFP5TbwN4tuy7WetTD.qcvmuFwCPieXk4GspLDgFumMvw.', 'Jorpati', 'Kathmandu', 'Nepal', '+977', '9808383431', '2019-01-05 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `manufacturer_id` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `featured` varchar(3) NOT NULL,
  `added_date` datetime NOT NULL,
  `admin_id` int(11) NOT NULL,
  `product_img` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `name`, `price`, `manufacturer_id`, `brand`, `description`, `featured`, `added_date`, `admin_id`, `product_img`, `category_id`) VALUES
(1, 'TCL TV', 349, '5590D233', 'Prime', '- Dimension (W X H X D): withstand 48.1\" X 30\" X 6\" <br>\r\n- It offers more than 3,000 channels including more than 40,000 movies and online \r\n  episodes<br>\r\n- Supports 4K Ultra HD screen with support of HDR features <br>\r\n- Resolution: 3840 X 2160 <br>\r\n- Input: a headphone jack, audio output, ethernet connection, 4 HDMI cables <br>\r\n- Weight: 40 pounds <br>\r\n- Color: black <br>', 'no', '2019-01-06 00:00:00', 1, 'images/tv1.jpg', 1),
(2, 'Ultra TV ', 699, 'Ha234d4', 'Samsung', '- Dimension (W X H X D): withstand 68.1\" X 40\" X 6\" <br>\r\n- It offers more than 8,000 channels including more than 40,000 movies and online \r\n  episodes<br>\r\n- Supports 8K Ultra HD screen with support of HDR features <br>\r\n- Resolution: 7840 X 4160 <br>\r\n- Input: a headphone jack, audio output, ethernet connection, 4 HDMI cables <br>\r\n- Weight: 60 pounds <br>\r\n- Color: grey <br>', 'yes', '2019-01-06 00:00:00', 1, 'images/tv2.jpg', 1),
(3, 'Wc Cam', 1500, '988923A2', 'Nikon', '- 4K recording + sensor which can take upto 30fps  <br>\r\n- 2 inch screen + 180 deg wide lens. So that you dont miss any chances to capture \r\n  beautiful moments<br>\r\n- Remote control service with 10,000mah battery power <br>\r\n- Resolution: 3840 X 2160 <br>\r\n- Waterproof system  system upto 50m of depth with support of both android and \r\n  IOS software <br>\r\n- Weight: 40 pounds <br>\r\n- Color: black <br>', 'no', '2019-01-06 00:00:00', 1, 'images/camera1.jpg', 2),
(4, 'S9 Plus', 1000, '28Js1Da43', 'Samsung', '- Dimensions: 158.1 x 73.8 x 8.5 mm. <br>\r\n- Weight: 189g. <br>\r\n- Screen size: 6.2-inch. <br>\r\n- CPU: Snapdragon 845 / Exynos 9810. <br>\r\n- RAM: 6GB. <br>\r\n- Storage: 64GB or 128GB (region dependent) <br>\r\n- Camera: Dual 12MP rear, 8MP front. <br>\r\n- Battery: 3,500mAh. <br>', 'yes', '2019-01-06 00:00:00', 1, 'images/mobile1.jpg', 3),
(5, 'Super C', 3999, 'SrMS10', 'Ultra', '- VR Ready Select models. <br>\r\n- Processor Intel Core i5-8400. <br>\r\n- RAM 8GB. <br>\r\n- Graphics Card AMD Radeon RX 560. <br>\r\n- Storage 1TB, 7,200-rpm hard drive. <br>\r\n- Accessories Keyboard, Mouse and Headphone <br>', 'yes', '2019-01-06 00:00:00', 1, 'images/game10.PNG', 4),
(6, 'PS 3', 200, 'Han34a', 'Sony', '- VR not Ready Select models. <br> \r\n- Processor Intel Core i5-8400. <br> \r\n- RAM 8GB.  <br>\r\n- Graphics Card AMD Radeon RX 560. <br> \r\n- Storage 0.5TB, 3,200-rpm hard drive.  <br>\r\n- Accessories Headphone  <br>', 'no', '2019-01-06 00:00:00', 1, 'images/game1.jpg', 4),
(7, 'Old TV', 100, 'ja45a2', 'Geon', '- Dimension (W X H X D): withstand 48.1\" X 30\" X 6\" <br>\r\n- It offers more than 3,000 channels including more than 40,000 movies and online \r\n  episodes<br>\r\n- Supports 4K Ultra HD screen with support of HDR features <br>\r\n- Resolution: 3840 X 2160 <br>\r\n- Input: a headphone jack, audio output, ethernet connection, 4 HDMI cables <br>\r\n- Weight: 40 pounds <br>\r\n- Color: black <br>\r\n', 'no', '2019-01-06 00:00:00', 1, 'images/tv3.jpg', 1),
(8, 'Tye48', 2500, 'ja45a2', 'Nikon', '- 4K recording + sensor which can take upto 30fps  <br>\r\n- 2 inch screen + 180 deg wide lens. So that you dont miss any chances to capture beautiful moments <br>\r\n- Remote control service with 10,000mah battery power  <br>\r\n- Resolution: 3840 X 2160  <br>\r\n- Waterproof system system upto 50m of depth with support of both android and IOS software  <br>\r\n- Weight: 40 pounds <br> \r\n- Color: black <br>', 'no', '2019-01-06 00:00:00', 1, 'images/camera2.PNG', 2),
(9, 'Leicia', 550, 'joI98a', 'Huawei', '- Dimensions: 158.1 x 73.8 x 8.5 mm. <br>\r\n- Weight: 189g.  <br>\r\n- Screen size: 5.2-inch. <br> \r\n- CPU: Snapdragon 845 / Exynos 9810. <br> \r\n- RAM: 6GB.  <br>\r\n- Storage: 64GB or 128GB (region dependent) <br> \r\n- Camera: Dual 12MP rear, 8MP front.  <br>\r\n- Battery: 3,500mAh.  <br>', 'no', '2019-01-06 00:00:00', 1, 'images/mobile2.jpg', 3),
(10, 'Controller ', 100, 'yo89a', 'Sony', '- VR Ready Select models. <br>\r\n- Processor Intel Core i5-8400. <br> \r\n- RAM 8GB.  <br>\r\n- Graphics Card AMD Radeon RX 560.  <br>\r\n- Storage 1TB, 7,200-rpm hard drive.  <br>\r\n- Accessories Keyboard, Mouse and Headphone <br>', 'no', '2019-01-06 00:00:00', 1, 'images/game2.jpg', 4),
(11, 'Video Cam', 2999, 'dha49', 'Mate Pro', '- 4K recording + sensor which can take upto 30fps  <br>\r\n- 2 inch screen + 180 deg wide lens. So that you dont miss any chances to capture beautiful moments <br>\r\n- Remote control service with 10,000mah battery power  <br>\r\n- Resolution: 3840 X 2160  <br>\r\n- Waterproof system system upto 50m of depth with support of both android and IOS software  <br>\r\n- Weight: 40 pounds <br> \r\n- Color: black <br>', 'no', '2019-01-06 00:00:00', 1, 'images/camera3.jpg', 2),
(12, 'iphone', 1050, 'yt38er', 'Apple', '- Dimensions: 158.1 x 73.8 x 8.5 mm. <br>\r\n- Weight: 189g.  <br>\r\n- Screen size: 6.2-inch. <br> \r\n- CPU: Snapdragon 845 / Exynos 9810. <br> \r\n- RAM: 6GB.  <br>\r\n- Storage: 64GB or 128GB (region dependent) <br> \r\n- Camera: Dual 12MP rear, 8MP front.  <br>\r\n- Battery: 3,500mAh.  <br>', 'no', '2019-01-06 00:00:00', 1, 'images/mobile3.jpg', 3),
(13, 'PSP', 650, 'oeiw1', 'Sony', '- VR Ready Select models. <br>\r\n- Processor Intel Core i5-8400. <br> \r\n- RAM 8GB.  <br>\r\n- Graphics Card AMD Radeon RX 560. <br> \r\n- Storage 1TB, 7,200-rpm hard drive.  <br>\r\n- Accessories Keyboard, Mouse and Headphone <br>', 'no', '2019-01-06 00:00:00', 1, 'images/game3.jpg', 4),
(14, 'TV stand', 99, 'ou34T', 'BAR', '- Dimension (W X H X D): withstand 48.1\" X 30\" X 6\" <br>\r\n- Supports 4K Ultra HD screen with support of HDR features <br>\r\n- Input: a headphone jack, audio output, ethernet connection, 4 HDMI cables <br>\r\n- Weight: 40 pounds <br>\r\n- Color: black <br>\r\n', 'no', '2019-01-06 00:00:00', 1, 'images/tv4.jpg', 1),
(15, 'S1', 450, '5.3.as', 'Nikon', '- 4K recording + sensor which can take upto 30fps  <br>\r\n- 2 inch screen + 180 deg wide lens. So that you dont miss any chances to capture beautiful moments <br>\r\n- Remote control service with 10,000mah battery power  <br>\r\n- Resolution: 3840 X 2160  <br>\r\n- Waterproof system system upto 50m of depth with support of both android and IOS software  <br>\r\n- Weight: 40 pounds <br> \r\n- Color: black <br>\r\n', 'no', '2019-01-06 00:00:00', 1, 'images/camera4.png', 2),
(16, 'Rock', 99, '3645.a', 'Nokia', '- Dimensions: 158.1 x 73.8 x 8.5 mm. <br>\r\n- Weight: 189g.  <br>\r\n- Screen size: 6.2-inch. <br> \r\n- CPU: Snapdragon 845 / Exynos 9810. <br> \r\n- RAM: 6GB.  <br>\r\n- Storage: 64GB or 128GB (region dependent) <br> \r\n- Camera: Dual 12MP rear, 8MP front.  <br>\r\n- Battery: 3,500mAh.  <br>\r\n', 'no', '2019-01-06 00:00:00', 1, 'images/mobile4.jpeg', 3),
(17, 'PS 4', 460, 'yo.yo45', 'Sony', '- VR Ready Select models. <br> \r\n- Processor Intel Core i5-8400. <br> \r\n- RAM 8GB.  <br>\r\n- Graphics Card AMD Radeon RX 560.  <br>\r\n- Storage 1TB, 7,200-rpm hard drive.  <br>\r\n- Accessories Keyboard, Mouse and Headphone  <br>', 'no', '2019-01-06 00:00:00', 1, 'images/game4.jpg', 4),
(18, 'slim tv', 6999, 'tv.89.c', 'AnKer', '- Dimension (W X H X D): withstand 48.1\" X 30\" X 6\" <br>\r\n- It offers more than 3,000 channels including more than 40,000 movies and online \r\n  episodes<br>\r\n- Supports 4K Ultra HD screen with support of HDR features <br>\r\n- Resolution: 3840 X 2160 <br>\r\n- Input: a headphone jack, audio output, ethernet connection, 4 HDMI cables <br>\r\n- Weight: 40 pounds <br>\r\n- Color: black <br>', 'no', '2019-01-06 00:00:00', 1, 'images/tv5.jpg', 1),
(19, 'CCTV', 250, 'ty.d.45', 'Cam 4', '- 4K recording + sensor which can take upto 30fps  <br>\r\n- 2 inch screen + 180 deg wide lens. So that you dont miss any chances to capture beautiful moments <br>\r\n- Remote control service with 10,000mah battery power  <br>\r\n- Resolution: 3840 X 2160  <br>\r\n- Waterproof system system upto 50m of depth with support of both android and IOS software  <br>\r\n- Weight: 40 pounds <br> \r\n- Color: black <br>\r\n', 'no', '2019-01-06 00:00:00', 1, 'images/camera5.png', 2),
(20, 'S9', 999, 'sam.s9', 'Samsung', '- Dimensions: 158.1 x 73.8 x 8.5 mm. <br>\r\n- Weight: 189g.  <br>\r\n- Screen size: 6.2-inch. <br> \r\n- CPU: Snapdragon 845 / Exynos 9810. <br> \r\n- RAM: 6GB.  <br>\r\n- Storage: 64GB or 128GB (region dependent) <br> \r\n- Camera: Dual 12MP rear, 8MP front.  <br>\r\n- Battery: 3,500mAh.  <br>', 'no', '2019-01-06 00:00:00', 1, 'images/mobile4.jpg', 3),
(21, 'Control', 150, 'cont.9813', 'Sony', '\r\n- VR Ready Select models. <br> \r\n- Processor Intel Core i5-8400. <br> \r\n- RAM 8GB.  <br>\r\n- Graphics Card AMD Radeon RX 560.  <br>\r\n- Storage 1TB, 7,200-rpm hard drive.  <br>\r\n- Accessories Keyboard, Mouse and Headphone  <br>\r\n ', 'no', '2019-01-06 00:00:00', 1, 'images/game5.jpg', 4),
(22, 'VR 45', 2999, 'vr.real.36', 'VaRR', '- VR Ready Select models. <br> \r\n- Processor Intel Core i5-8400. <br> \r\n- RAM 8GB.  <br>\r\n- Graphics Card AMD Radeon RX 560.  <br>\r\n- Storage 1TB, 7,200-rpm hard drive.  <br>\r\n- Accessories Keyboard, Mouse and Headphone  <br>\r\n ', 'yes', '2019-01-06 00:00:00', 1, 'images/game6.jpg', 4),
(23, 'lg phone', 600, 'lifes.good', 'LG', '- Dimensions: 158.1 x 73.8 x 8.5 mm. <br>\r\n- Weight: 189g.  <br>\r\n- Screen size: 6.2-inch. <br> \r\n- CPU: Snapdragon 845 / Exynos 9810. <br> \r\n- RAM: 6GB.  <br>\r\n- Storage: 64GB or 128GB (region dependent) <br> \r\n- Camera: Dual 12MP rear, 8MP front.  <br>\r\n- Battery: 3,500mAh.  <br>', 'no', '2019-01-06 00:00:00', 1, 'images/mobile5.jpg', 3),
(24, 'Rec. Cam', 30000, 't5a.55', 'UltraCam', '- 4K recording + sensor which can take upto 30fps  <br>\r\n- 2 inch screen + 180 deg wide lens. So that you dont miss any chances to capture beautiful moments <br>\r\n- Remote control service with 10,000mah battery power  <br>\r\n- Resolution: 3840 X 2160  <br>\r\n- Waterproof system system upto 50m of depth with support of both android and IOS software  <br>\r\n- Weight: 40 pounds <br> \r\n- Color: black <br>', 'yes', '2019-01-06 00:00:00', 1, 'images/camera6.png', 2),
(25, 'Bend V', 7999, 'bd.76', 'OnKwn', '- Dimension (W X H X D): withstand 48.1\" X 30\" X 6\" <br>\r\n- It offers more than 3,000 channels including more than 40,000 movies and online \r\n  episodes<br>\r\n- Supports 4K Ultra HD screen with support of HDR features <br>\r\n- Resolution: 3840 X 2160 <br>\r\n- Input: a headphone jack, audio output, ethernet connection, 4 HDMI cables <br>\r\n- Weight: 40 pounds <br>\r\n- Color: black <br>\r\n', 'no', '2019-01-06 00:00:00', 1, 'images/tv6.jpg', 1),
(26, 'Toy', 300, 'odod99', 'Old ', '- VR Ready Select models. <br> \r\n- Processor Intel Core i5-8400. <br> \r\n- RAM 8GB.  <br>\r\n- Graphics Card AMD Radeon RX 560.  <br>\r\n- Storage 1TB, 7,200-rpm hard drive.  <br>\r\n- Accessories Keyboard, Mouse and Headphone  <br>\r\n ', 'no', '2019-01-06 00:00:00', 1, 'images/game7.jpg', 4),
(27, 'G call', 15000, 'g9', 'Gold', '- Dimensions: 158.1 x 73.8 x 8.5 mm. <br>\r\n- Weight: 189g.  <br>\r\n- Screen size: 6.2-inch. <br> \r\n- CPU: Snapdragon 845 / Exynos 9810. <br> \r\n- RAM: 6GB.  <br>\r\n- Storage: 64GB or 128GB (region dependent) <br> \r\n- Camera: Dual 12MP rear, 8MP front.  <br>\r\n- Battery: 3,500mAh.  <br>', 'no', '2019-01-06 00:00:00', 1, 'images/mobile6.jpg', 3),
(28, 'Go Pro', 200, 'pro.98', 'Hero', '- 4K recording + sensor which can take upto 30fps  <br>\r\n- 2 inch screen + 180 deg wide lens. So that you dont miss any chances to capture beautiful moments <br>\r\n- Remote control service with 10,000mah battery power  <br>\r\n- Resolution: 3840 X 2160  <br>\r\n- Waterproof system system upto 50m of depth with support of both android and IOS software  <br>\r\n- Weight: 40 pounds <br> \r\n- Color: black <br>\r\n\r\n', 'no', '2019-01-06 00:00:00', 1, 'images/camera7.jpg', 2),
(29, 'Fold98', 4999, 'tv234', 'Panasonic', '- Dimension (W X H X D): withstand 48.1\" X 30\" X 6\" <br>\r\n- It offers more than 3,000 channels including more than 40,000 movies and online \r\n  episodes<br>\r\n- Supports 4K Ultra HD screen with support of HDR features <br>\r\n- Resolution: 3840 X 2160 <br>\r\n- Input: a headphone jack, audio output, ethernet connection, 4 HDMI cables <br>\r\n- Weight: 40 pounds <br>\r\n- Color: black <br>\r\n', 'no', '2019-01-06 00:00:00', 1, 'images/tv7.jpg', 1),
(30, 'Drone', 2000, 'dr.832', 'DJI', '- 4K recording + sensor which can take upto 30fps  <br>\r\n- 2 inch screen + 180 deg wide lens. So that you dont miss any chances to capture beautiful moments <br>\r\n- Remote control service with 10,000mah battery power  <br>\r\n- Resolution: 3840 X 2160  <br>\r\n- Waterproof system system upto 50m of depth with support of both android and IOS software  <br>\r\n- Weight: 40 pounds <br> \r\n- Color: black <br>', 'no', '2019-01-06 00:00:00', 1, 'images/camera8.jpg', 2),
(31, 'Moto 45', 1500, 'otom.roll', 'Motorolla', '- Dimensions: 158.1 x 73.8 x 8.5 mm. <br>\r\n- Weight: 189g.  <br>\r\n- Screen size: 6.2-inch. <br> \r\n- CPU: Snapdragon 845 / Exynos 9810. <br> \r\n- RAM: 6GB.  <br>\r\n- Storage: 64GB or 128GB (region dependent) <br> \r\n- Camera: Dual 12MP rear, 8MP front.  <br>\r\n- Battery: 3,500mAh.  <br>\r\n', 'no', '2019-01-06 00:00:00', 1, 'images/mobile7.jpg', 3),
(32, 'PS 5', 800, 'ps65', 'Sony', '- VR Ready Select models. <br> \r\n- Processor Intel Core i5-8400. <br> \r\n- RAM 8GB.  <br>\r\n- Graphics Card AMD Radeon RX 560.  <br>\r\n- Storage 1TB, 7,200-rpm hard drive.  <br>\r\n- Accessories Keyboard, Mouse and Headphone  <br>', 'no', '2019-01-06 00:00:00', 1, 'images/game8.jpg', 4),
(33, 'Goltv', 200, 'go34.45', 'Old', '- Dimension (W X H X D): withstand 48.1\" X 30\" X 6\" <br>\r\n- It offers more than 3,000 channels including more than 40,000 movies and online \r\n  episodes<br>\r\n- Supports 4K Ultra HD screen with support of HDR features <br>\r\n- Resolution: 3840 X 2160 <br>\r\n- Input: a headphone jack, audio output, ethernet connection, 4 HDMI cables <br>\r\n- Weight: 40 pounds <br>\r\n- Color: black <br>\r\n', 'no', '2019-01-06 00:00:00', 1, 'images/tv8.jpg', 1),
(34, 'Spin', 2500, 'sp35', 'Fold', '- Dimensions: 158.1 x 73.8 x 8.5 mm. <br>\r\n- Weight: 189g.  <br>\r\n- Screen size: 6.2-inch. <br> \r\n- CPU: Snapdragon 845 / Exynos 9810. <br> \r\n- RAM: 6GB.  <br>\r\n- Storage: 64GB or 128GB (region dependent) <br> \r\n- Camera: Dual 12MP rear, 8MP front.  <br>\r\n- Battery: 3,500mAh.  <br>', 'no', '2019-01-06 00:00:00', 1, 'images/mobile8.jpg', 3),
(35, 'gimble', 300, 'gb.bg', 'Gimbal', '- 4K recording + sensor which can take upto 30fps  <br>\r\n- 2 inch screen + 180 deg wide lens. So that you dont miss any chances to capture beautiful moments <br>\r\n- Remote control service with 10,000mah battery power  <br>\r\n- Resolution: 3840 X 2160  <br>\r\n- Waterproof system system upto 50m of depth with support of both android and IOS software  <br>\r\n- Weight: 40 pounds <br> \r\n- Color: black <br>', 'no', '2019-01-06 00:00:00', 1, 'images/camera8.PNG', 2),
(36, 'tv 39', 500, 'dg.00.123', 'Yellow', '- Dimension (W X H X D): withstand 48.1\" X 30\" X 6\" <br>\r\n- It offers more than 3,000 channels including more than 40,000 movies and online \r\n  episodes<br>\r\n- Supports 4K Ultra HD screen with support of HDR features <br>\r\n- Resolution: 3840 X 2160 <br>\r\n- Input: a headphone jack, audio output, ethernet connection, 4 HDMI cables <br>\r\n- Weight: 40 pounds <br>\r\n- Color: yellow <br>', 'no', '2019-01-06 00:00:00', 1, 'images/tv9.PNG', 1),
(37, 'Vintage', 600, 'vt.ant', 'Antenna', '- Dimension (W X H X D): withstand 48.1\" X 30\" X 6\" <br>\r\n- It offers more than 3,000 channels including more than 40,000 movies and online \r\n  episodes<br>\r\n- Supports 4K Ultra HD screen with support of HDR features <br>\r\n- Resolution: 3840 X 2160 <br>\r\n- Input: a headphone jack, audio output, ethernet connection, 4 HDMI cables <br>\r\n- Weight: 40 pounds <br>\r\n- Color: black <br>', 'no', '2019-01-06 00:00:00', 1, 'images/tv10.jpg', 1),
(38, 'Dr 34', 2500, 'dr.00.00.R', 'DJI', '- 4K recording + sensor which can take upto 30fps  <br>\r\n- 2 inch screen + 180 deg wide lens. So that you dont miss any chances to capture beautiful moments <br>\r\n- Remote control service with 10,000mah battery power  <br>\r\n- Resolution: 3840 X 2160  <br>\r\n- Waterproof system system upto 50m of depth with support of both android and IOS software  <br>\r\n- Weight: 40 pounds <br> \r\n- Color: black <br>\r\n', 'yes', '2019-01-06 00:00:00', 1, 'images/camera9.jpg', 2),
(39, 'Samsung X', 1500, 'fold.180*', 'Samsung', '- Dimensions: 158.1 x 73.8 x 8.5 mm. <br>\r\n- Weight: 189g.  <br>\r\n- Screen size: 6.2-inch. <br> \r\n- CPU: Snapdragon 845 / Exynos 9810. <br> \r\n- RAM: 6GB.  <br>\r\n- Storage: 64GB or 128GB (region dependent) <br> \r\n- Camera: Dual 12MP rear, 8MP front.  <br>\r\n- Battery: 3,500mAh.  <br>', 'no', '2019-01-06 00:00:00', 1, 'images/mobile10.png', 1),
(40, 'Video G', 10, 'mario.99', 'Vintage', '- VR Ready Select models. <br> \r\n- Processor Intel Core i5-8400. <br> \r\n- RAM 8GB.  <br>\r\n- Graphics Card AMD Radeon RX 560.  <br>\r\n- Storage 1TB, 7,200-rpm hard drive.  <br>\r\n- Accessories Keyboard, Mouse and Headphone  <br>', 'no', '2019-01-06 00:00:00', 1, 'images/game9.jpg', 4),
(41, 'Stone', 1200, 'rck.st.99', 'Rock', '- Dimensions: 158.1 x 73.8 x 8.5 mm. <br>\r\n- Weight: 189g.  <br>\r\n- Screen size: 6.2-inch. <br> \r\n- CPU: Snapdragon 845 / Exynos 9810. <br> \r\n- RAM: 6GB.  <br>\r\n- Storage: 64GB or 128GB (region dependent) <br> \r\n- Camera: Dual 12MP rear, 8MP front.  <br>\r\n- Battery: 3,500mAh.  <br>\r\n', 'no', '2019-01-06 00:00:00', 1, 'images/mobile11.png', 3);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `review_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `review_detail` text NOT NULL,
  `posted_date` datetime NOT NULL,
  `status` varchar(11) NOT NULL DEFAULT 'no',
  `product_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`review_id`, `rating`, `review_detail`, `posted_date`, `status`, `product_id`, `customer_id`) VALUES
(1, 5, 'This the best product that i have used so far. I have no regret buying this product and I hope no one had ever faced problem with this product. This brand never fails to amaze me with its new product. I would recommed all the people to give atleast a try. ', '2019-01-06 00:00:00', 'yes', 2, 8),
(2, 5, 'This the best product that i have used so far. I have no regret buying this product and I hope no one had ever faced problem with this product. This brand never fails to amaze me with its new product. I would recommed all the people to give atleast a try. ', '2019-01-06 00:00:00', 'yes', 5, 8),
(3, 5, 'This the best product that i have used so far. I have no regret buying this product and I hope no one had ever faced problem with this product. This brand never fails to amaze me with its new product. I would recommed all the people to give atleast a try. ', '2019-01-06 00:00:00', 'yes', 24, 8),
(4, 3, 'Previously I had bought this same product from another site. It was really disappointing with the quality of the product. So, i spent some times in eds electronic searching for the same product. I ordered the product and it was dilivered within 24 hr. I found out that the product i bought from another site was fake when I compared the same product I bought from eds store at same price. From now, I will always buy from eds store.', '2019-01-06 00:00:00', 'yes', 2, 9),
(5, 3, 'Previously I had bought this same product from another site. It was really disappointing with the quality of the product. So, i spent some times in eds electronic searching for the same product. I ordered the product and it was dilivered within 24 hr. I found out that the product i bought from another site was fake when I compared the same product I bought from eds store at same price. From now, I will always buy from eds store.', '2019-01-06 00:00:00', 'yes', 4, 9),
(6, 3, 'Previously I had bought this same product from another site. It was really disappointing with the quality of the product. So, i spent some times in eds electronic searching for the same product. I ordered the product and it was dilivered within 24 hr. I found out that the product i bought from another site was fake when I compared the same product I bought from eds store at same price. From now, I will always buy from eds store.', '2019-01-06 00:00:00', 'yes', 5, 9),
(7, 3, 'Previously I had bought this same product from another site. It was really disappointing with the quality of the product. So, i spent some times in eds electronic searching for the same product. I ordered the product and it was dilivered within 24 hr. I found out that the product i bought from another site was fake when I compared the same product I bought from eds store at same price. From now, I will always buy from eds store.', '2019-01-06 00:00:00', 'yes', 22, 9),
(8, 3, 'Previously I had bought this same product from another site. It was really disappointing with the quality of the product. So, i spent some times in eds electronic searching for the same product. I ordered the product and it was dilivered within 24 hr. I found out that the product i bought from another site was fake when I compared the same product I bought from eds store at same price. From now, I will always buy from eds store.', '2019-01-06 00:00:00', 'yes', 24, 9),
(9, 4, 'I am so glad that i bought this product from eds and never spent bucks searching elsewhere because everything are authentic here. eds electronic has won my trust. By the way, I also like the services provided by eds staff. Thank You...', '2019-01-06 00:00:00', 'yes', 2, 6),
(10, 4, 'I am so glad that i bought this product from eds and never spent bucks searching elsewhere because everything are authentic here. eds electronic has won my trust. By the way, I also like the services provided by eds staff. Thank You...', '2019-01-06 00:00:00', 'yes', 5, 6),
(11, 4, 'I am so glad that i bought this product from eds and never spent bucks searching elsewhere because everything are authentic here. eds electronic has won my trust. By the way, I also like the services provided by eds staff. Thank You...', '2019-01-06 00:00:00', 'yes', 24, 6),
(12, 5, 'This the best product that i have used so far. I have no regret buying this product and I hope no one had ever faced problem with this product. This brand never fails to amaze me with its new product. I would recommed all the people to give atleast a try. ', '2019-01-06 00:00:00', 'yes', 4, 6),
(13, 5, 'This the best product that i have used so far. I have no regret buying this product and I hope no one had ever faced problem with this product. This brand never fails to amaze me with its new product. I would recommed all the people to give atleast a try. ', '2019-01-06 00:00:00', 'yes', 22, 6),
(14, 2, 'Let me start by saying I bought this product because one of my friend told that eds store is one of the best store by products from. But once I bought this product, I found out that it was not the way my friend thinks. I dont know why, I felt that way. But, you guys wont regret buying products from here. ', '2019-01-06 00:00:00', 'yes', 2, 3),
(15, 2, 'Let me start by saying I bought this product because one of my friend told that eds store is one of the best store by products from. But once I bought this product, I found out that it was not the way my friend thinks. I dont know why, I felt that way. But, you guys wont regret buying products from here. ', '2019-01-06 00:00:00', 'yes', 22, 3),
(16, 1, 'It was my worst nightmare buying this product. I was not expecting this kind of performance from eds. I thought eds store was one of the best in the world but you failed to satisfy me this time. I wish the this wont happen next time.', '2019-01-06 00:00:00', 'yes', 22, 9),
(17, 5, 'This the best product that i have used so far. I have no regret buying this product and I hope no one had ever faced problem with this product. This brand never fails to amaze me with its new product. I would recommed all the people to give atleast a try.', '2019-01-06 00:00:00', 'yes', 4, 10),
(18, 4, 'I am so glad that i bought this product from eds and never spent bucks searching elsewhere because everything are authentic here. eds electronic has won my trust. By the way, I also like the services provided by eds staff. Thank You...\r\n\r\n', '2019-01-06 00:00:00', 'yes', 2, 10),
(19, 3, 'Previously I had bought this same product from another site. It was really disappointing with the quality of the product. So, i spent some times in eds electronic searching for the same product. I ordered the product and it was dilivered within 24 hr. I found out that the product i bought from another site was fake when I compared the same product I bought from eds store at same price. From now, I will always buy from eds store.', '2019-01-06 00:00:00', 'yes', 5, 10),
(20, 1, 'It was my worst nightmare buying this product. I was not expecting this kind of performance from eds. I thought eds store was one of the best in the world but you failed to satisfy me this time. I wish the this wont happen next time.', '2019-01-06 00:00:00', 'yes', 2, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `billing_address`
--
ALTER TABLE `billing_address`
  ADD PRIMARY KEY (`billing_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`),
  ADD KEY `id` (`category_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `id` (`product_id`),
  ADD KEY `fk_p_category` (`category_id`),
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `admin_id_2` (`admin_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `fk_r_product` (`product_id`),
  ADD KEY `fk_r_customer` (`customer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `billing_address`
--
ALTER TABLE `billing_address`
  MODIFY `billing_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_p_admin` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_p_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `fk_r_customer` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_r_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
