-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 20, 2017 at 04:26 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(100) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_passwd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_email`, `admin_passwd`) VALUES
(1, 'admin@admin.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(100) NOT NULL,
  `brand_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(2, 'LG'),
(3, 'Apple'),
(4, 'Google\r\n    '),
(5, 'Ericcson'),
(7, 'Toshiba'),
(8, 'Dell'),
(9, 'Samsung');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `p_id` int(100) NOT NULL,
  `ip_addr` varchar(255) NOT NULL,
  `qty` int(255) NOT NULL,
  `p_index` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`p_id`, `ip_addr`, `qty`, `p_index`) VALUES
(13, '::1', 1, 9);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(100) NOT NULL,
  `cat_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Laptops Slim'),
(2, 'Computers\r\n    \r\n'),
(3, 'Cameras\r\n    '),
(4, 'Mobiles'),
(12, 'iPads'),
(13, 'Game Consoles');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(100) NOT NULL,
  `customer_ip` varchar(255) NOT NULL,
  `customer_name` text NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_pass` varchar(100) NOT NULL,
  `customer_country` text NOT NULL,
  `customer_city` text NOT NULL,
  `customer_contact` varchar(255) NOT NULL,
  `customer_image` text NOT NULL,
  `customer_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_ip`, `customer_name`, `customer_email`, `customer_pass`, `customer_country`, `customer_city`, `customer_contact`, `customer_image`, `customer_address`) VALUES
(35, '127.0.0.1', 'Eugene ', 'eugenesleator17@gmail.com', 'password', 'ISO 3166-2:VU', 'city', '003531487874', 'profile6jpeg', 'some new house,\r\nsome new street,\r\nsome new district\r\n'),
(36, '127.0.0.1', 'Eilish', 'eilish@email.com', 'popopo', 'ISO 3166-2:IN', 'hkkjh', '8983498020', 'profile3.jpeg', 'o[i[oui[uou'),
(38, '127.0.0.1', 'Patrick', 'patrick@patrick.com', 'patrick', 'ISO 3166-2:AL', 'Dublin', '003531487874', 'profile8png', 'my address\r\nis some house\r\nsomewhere\r\nsome city \r\n\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(100) NOT NULL,
  `prod_id` int(100) NOT NULL,
  `cust_id` int(100) NOT NULL,
  `qty` int(100) NOT NULL,
  `invoice_no` int(100) NOT NULL,
  `order_date` date DEFAULT NULL,
  `order_status` text NOT NULL,
  `ip_addr` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `prod_id`, `cust_id`, `qty`, `invoice_no`, `order_date`, `order_status`, `ip_addr`) VALUES
(13, 15, 35, 1, 34979012, '2017-11-15', 'Completed', '127.0.0.1'),
(14, 12, 35, 9, 201709055, '2017-11-15', 'Completed', '127.0.0.1'),
(15, 12, 36, 9, 2029777401, '2017-11-16', 'Completed', '127.0.0.1'),
(17, 3, 35, 1, 706715423, '2017-11-16', 'Completed', '127.0.0.1'),
(18, 3, 35, 1, 1494111255, '2017-11-16', 'Completed', '127.0.0.1'),
(19, 3, 35, 1, 1711349780, '2017-11-16', 'Completed', '127.0.0.1'),
(20, 2, 35, 1, 982223632, '2017-11-16', 'Completed', '127.0.0.1'),
(21, 2, 35, 1, 75295034, '2017-11-16', 'Completed', '127.0.0.1'),
(23, 15, 35, 1, 686254683, '2017-11-16', 'Completed', '127.0.0.1'),
(24, 15, 35, 1, 1318821436, '2017-11-16', 'Completed', '127.0.0.1'),
(25, 15, 35, 1, 1637141796, '2017-11-16', 'Completed', '127.0.0.1'),
(26, 2, 35, 1, 734311547, '2017-11-16', 'in Progress', '127.0.0.1'),
(27, 11, 36, 1, 1787950587, '2017-11-16', 'Completed', '127.0.0.1'),
(28, 16, 35, 1, 1394429510, '2017-11-16', 'Completed', '127.0.0.1'),
(30, 17, 35, 1, 2066404975, '2017-11-16', 'Completed', '127.0.0.1'),
(31, 5, 35, 1, 297534906, '2017-11-16', 'in Progress', '127.0.0.1'),
(34, 3, 35, 1, 476639405, '2017-11-16', 'in Progress', '127.0.0.1'),
(37, 16, 35, 1, 1812586405, '2017-11-16', 'in Progress', '127.0.0.1'),
(39, 6, 35, 1, 801408216, '2017-11-16', 'in Progress', '127.0.0.1'),
(41, 9, 35, 1, 2114415927, '2017-11-16', 'in Progress', '127.0.0.1'),
(42, 2, 36, 1, 1406966303, '2017-11-17', 'Completed', '127.0.0.1'),
(43, 12, 36, 1, 656929855, '2017-11-18', 'Completed', '127.0.0.1'),
(45, 4, 36, 1, 817422014, '2017-11-18', 'Completed', '127.0.0.1'),
(46, 16, 38, 1, 1460801684, '2017-11-18', 'in Progress', '127.0.0.1');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `paym_id` int(100) NOT NULL,
  `amount` int(100) NOT NULL,
  `cust_id` int(100) NOT NULL,
  `prod_id` int(100) NOT NULL,
  `trx_id` varchar(100) NOT NULL,
  `currency` text NOT NULL,
  `payment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`paym_id`, `amount`, `cust_id`, `prod_id`, `trx_id`, `currency`, `payment_date`) VALUES
(14, 999, 35, 15, '7W593909AL4195346', 'USD', '2017-11-15'),
(15, 3600, 35, 12, '1DT5404276398002W', 'EUR', '2017-11-15'),
(16, 3600, 36, 12, '8J84123593267933B', 'EUR', '2017-11-16'),
(17, 855, 38, 7, '32133333CE717233D', 'EUR', '2017-11-16'),
(18, 55, 35, 3, '5JE75810HK8535747', 'EUR', '2017-11-16'),
(20, 55, 35, 3, '58B433921J7318520', 'EUR', '2017-11-16'),
(21, 150, 35, 2, '47A04069TH3491135', 'EUR', '2017-11-16'),
(22, 150, 35, 2, '47A04069TH3491135', 'EUR', '2017-11-16'),
(23, 990, 35, 1, '8A9978200F118780K', 'EUR', '2017-11-16'),
(24, 999, 35, 15, '1CN97981KN253434K', 'EUR', '2017-11-16'),
(25, 999, 35, 15, '1CN97981KN253434K', 'EUR', '2017-11-16'),
(26, 999, 35, 15, '7HJ00842M6670673M', 'EUR', '2017-11-16'),
(27, 150, 35, 2, '1CE341530B841971A', 'EUR', '2017-11-16'),
(28, 550, 36, 11, '1YJ09598EL071964N', 'EUR', '2017-11-16'),
(29, 400, 35, 16, '3S008817MW560980D', 'EUR', '2017-11-16'),
(30, 400, 35, 0, '3S008817MW560980D', 'EUR', '2017-11-16'),
(31, 400, 35, 17, '72L22577LX697461K', 'EUR', '2017-11-16'),
(32, 999, 35, 5, '9P932595VN871333F', 'EUR', '2017-11-16'),
(35, 55, 35, 3, '8F314932SV6736009', 'EUR', '2017-11-16'),
(36, 800, 35, 7, '15R79348EP0653254', 'EUR', '2017-11-16'),
(37, 0, 35, 0, '', '', '2017-11-16'),
(38, 400, 35, 16, '26315356X06851255', 'EUR', '2017-11-16'),
(39, 0, 35, 0, '', '', '2017-11-16'),
(40, 400, 35, 6, '37P48266UG660882M', 'EUR', '2017-11-16'),
(41, 0, 35, 0, '', '', '2017-11-16'),
(42, 999, 35, 9, '4L8251407W715093H', 'EUR', '2017-11-16'),
(43, 150, 36, 2, '8GD05375PK6063339', 'EUR', '2017-11-17'),
(44, 1300, 36, 12, '90P75031H0097420S', 'EUR', '2017-11-18'),
(45, 1300, 36, 0, '90P75031H0097420S', 'EUR', '2017-11-18'),
(46, 700, 36, 4, '08R77416GF8058054', 'EUR', '2017-11-18'),
(47, 955, 38, 16, '5CF76965934558904', 'EUR', '2017-11-18');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(100) NOT NULL,
  `product_cat` int(100) NOT NULL,
  `product_brand` int(100) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_price` int(100) NOT NULL,
  `product_desc` text NOT NULL,
  `product_image` text NOT NULL,
  `product_keywords` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_cat`, `product_brand`, `product_title`, `product_price`, `product_desc`, `product_image`, `product_keywords`) VALUES
(2, 2, 2, 'router', 150, '<p>description description description description description description description description description description description description description description description description description description description description description description description description description description description description description&nbsp;										description </p>', 'images23.jpeg', 'router, lg, computers'),
(3, 1, 2, 'Accessories Laptop', 55, '<p>description description description description description description description description description description description description description description description description description description description description description description description description description description description description description description description description description description description description description description description description description description description description description description description&nbsp;										</p>', 'images28.jpeg', 'accessories,accessory,bag,LG,lg'),
(4, 1, 5, 'laptop from Admin', 700, '<i><b>description description description										description description description description description description description</b></i>', 'laptop2.jpeg', 'laptop, admin'),
(5, 2, 9, 'Edited Laptop ', 900, '<h1><b><i>This is the new description of this product&nbsp;</i></b></h1>', 'boxing_computer.gif', 'laptop, admin'),
(6, 2, 7, 'Desktotp PC', 400, '<p>A <strong>desktop computer</strong> is a personal <strong>computer</strong>\r\n that fits on or under a desk. They usually consist of a monitor, \r\nkeyboard, mouse and either a horizontal or vertical (tower) form factor.\r\n Unlike a laptop, which is portable, a <strong>desktop computer</strong> is meant to stay at one location.										</p>', 'images30.jpeg', 'desktop,pc,computer,dell'),
(8, 1, 3, 'test', 800, '<p>ghdhdhgd										</p>', 'images.jpeg', 'computer,memory,RAM,desktop'),
(9, 1, 7, 'laptop computer', 999, '<p>luiouoiuoi</p>', 'images2.jpeg', 'accessories,accessory,bag,LG,lg'),
(11, 2, 7, 'Home PC', 400, '<p>A <strong>laptop</strong>, often called a <strong>notebook</strong> or \"<strong>notebook</strong>\r\n computer\", is a small, portable personal computer with a \"clamshell\" \r\nform factor, an alphanumeric keyboard on the lower part of the \r\n\"clamshell\" and a thin LCD or LED computer screen on the upper part, \r\nwhich is opened up to use the computer.										</p>', 'images30.jpeg', 'toshiba,computer,desktop,pc,home'),
(12, 4, 2, 'Mobile Phone', 400, '<p>A <strong>mobile phone</strong> is a wireless handheld device \r\nthat allows users to make calls and send text messages, among other \r\nfeatures. The earliest generation of <strong>mobile phones</strong> could only make and receive calls. ... A <strong>mobile phone</strong> may also be known as a <strong>cellular phone</strong> or simply cellphone.										</p>', 'images11.jpeg', 'mobille, phone, LG, updated'),
(13, 4, 3, ' Phone', 500, '<p>A <strong>mobile phone</strong> is a wireless handheld device \r\nthat allows users to make calls and send text messages, among other \r\nfeatures. The earliest generation of <strong>mobile phones</strong> could only make and receive calls. ... A <strong>mobile phone</strong> may also be known as a <strong>cellular phone</strong> or simply cellphone.										</p>', 'images26.jpeg', 'phone,mobile, apple'),
(14, 12, 3, 'iPad', 800, '<p>The <strong>iPad</strong> device is roughly the size of a sheet\r\n of paper and weighs 1.5 pounds. The screen is a 9.7-inch LED backlit \r\nglossy multi-touch screen, capable of displaying up to 1024x768 pixel \r\nresolution (2048x1536 resolution in the Retina Display of the <strong>iPad</strong> 3 and iPad4).										</p>', 'images9.jpeg', 'ipad,apple,touchscreen,smartphone,smart'),
(15, 12, 4, 'Tablet', 999, '<p>A <strong>tablet</strong> computer, commonly shortened to <strong>tablet</strong>,\r\n is a portable PC, typically with a mobile operating system and LCD \r\ntouchscreen display processing circuitry, and a rechargeable battery in a\r\n single thin, flat package.</p>', 'images19.jpeg', 'tablets,google'),
(16, 2, 2, 'Accessories', 400, '<p><strong>Accessories</strong> for your <strong>computer</strong>. <strong>Accessories</strong> such as a keyboard and mouse may be essential in order to operate your <strong>computer</strong>. ... <strong>Computer accessories</strong> are also called <strong>computer</strong> peripherals and can include printers and scanners and storage devices.</p>', 'images28.jpeg', 'accessories,accessory,bag,LG,lg,computer'),
(17, 12, 3, 'iPad', 400, '<p>khjkhkjhjkh<br />jkllkjlkj<br />sgd<br />g<br />sfg<br />ssgs<br />zgfgfz</p>', 'images17.jpeg', 'ipad,apple,touchscreen,smartphone,smart'),
(18, 1, 8, 'Dell Laptop ZX29', 500, '<p>15-inch gaming laptop with high-performance graphics. Featuring the latest IntelÂ® and AMDÂ® processors and dual cooling fans.</p>', 'images3.jpeg', 'dell,laptop, amd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`p_index`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`paym_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `p_index` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `paym_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
