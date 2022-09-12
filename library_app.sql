-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2022 at 08:35 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `sub_title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `cat_id` int(11) NOT NULL,
  `author_name` varchar(255) DEFAULT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `image` varchar(255) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 1 COMMENT '1=Active, 2=InActive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `title`, `sub_title`, `description`, `cat_id`, `author_name`, `quantity`, `image`, `status`) VALUES
(9, 'Villa For sell in Dhaka', 'Villa', '<p>- Bathroom: 2 -&nbsp;Parking: Yes -&nbsp;Room: 2 -&nbsp;Sq Ft: 1000 -&nbsp;Energy Class:&nbsp;</p>\r\n', 10, 'Parvej Hossain', 5, '708962_1604231427_4.jpg', 1),
(10, 'Office For Rent In Dhaka', 'Dhaka', '<p>- Bathroom: 2 -&nbsp;Parking: Yes -&nbsp;Room: 1 -&nbsp;Sq Ft: 3000 -&nbsp;Energy Class: A+</p>\r\n', 8, 'Abdur Rahman Masum', 10, '54451_download.jpg', 1),
(11, 'Office For Sell ', 'chadpur', '<p>- Bathroom: 2 -&nbsp;Parking: Yes -&nbsp;Room: 1 -&nbsp;Sq Ft: 2000 -&nbsp;Energy Class: A</p>\r\n', 0, 'Mehedi Hasan Shawn', 5, '935122_best-hotels-travel-thailand-tourism-wallpaper-preview.jpg', 1),
(12, 'Home for rent', 'Brahmanbariya', '<p>- Bathroom: 2 -&nbsp;Parking: Yes -&nbsp;Room: 1 -&nbsp;Sq Ft: 3000 -&nbsp;Energy Class: A+</p>\r\n', 22, 'Shohanur Rahman Shohan', 6, '395010_download.jpg', 1),
(13, 'Office for rent', 'chadpur', '<p>- Bathroom: 5 -&nbsp;Parking: Yes -&nbsp;Room: 5 -&nbsp;Sq Ft: 9000 -&nbsp;Energy Class: A+</p>\r\n', 20, 'Sabbir Ahmed', 3, '633629_booking-best-hotels-bangkok-tourism-wallpaper-preview.jpg', 1),
(14, 'Home for rent', 'Barishal', '<p>- Bathroom: 2 -&nbsp;Parking: Yes -&nbsp;Room: 1 -&nbsp;Sq Ft: 3000 -&nbsp;Energy Class: A+</p>\r\n', 21, 'Jargic Rahman', 5, '823252_images (1).jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `booking_list`
--

CREATE TABLE `booking_list` (
  `id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rcv_date` date NOT NULL,
  `rtn_date` date NOT NULL,
  `booking_date` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT 4 COMMENT '1=Activated, 2=Returned, 3=Canceled, 4=Pending '
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking_list`
--

INSERT INTO `booking_list` (`id`, `book_id`, `user_id`, `rcv_date`, `rtn_date`, `booking_date`, `status`) VALUES
(2, 7, 6, '2022-09-09', '2022-09-30', '2022-09-12', 4),
(4, 8, 6, '2022-09-13', '2022-09-30', '2022-09-12', 4);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `cat_desc` text DEFAULT NULL,
  `is_parent` int(11) NOT NULL DEFAULT 0 COMMENT '0 = Parent Category',
  `status` int(1) NOT NULL DEFAULT 1 COMMENT '1=Active, 2=InActive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `cat_desc`, `is_parent`, `status`) VALUES
(8, 'Dhaka', '<p>Agargaon, Dhaka has a plot.</p>\r\n', 0, 1),
(9, 'Abdur Rahman Masum ', '<p>He has a 5 plot in Dhaka</p>\r\n', 8, 1),
(10, 'Comilla', '', 0, 1),
(11, 'Sabbiir AHmed', '<p>He has 4 plot in comilla District</p>\r\n', 10, 1),
(20, 'Chadpur', '', 0, 1),
(21, 'Barishal', '', 0, 1),
(22, 'Brahmanbariya', '', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `role` int(1) NOT NULL DEFAULT 2 COMMENT '1=Admin, 2=User',
  `status` int(1) NOT NULL DEFAULT 1 COMMENT '0=inactive, 1=active',
  `join_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fullname`, `email`, `password`, `phone`, `address`, `image`, `role`, `status`, `join_date`) VALUES
(1, 'Shohanur Rahman Shohan', 'shohanur51362@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '01731578788', 'Dhaka', '218309_shohan.jpg', 1, 1, '2022-08-24'),
(4, 'Abdur Rahman Masum', 'masum@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '01731578788', 'Agargaon, Dhaka', '154588_photo-1620921598973-84c8edfd29f2.jpg', 2, 1, '2022-09-11'),
(6, 'Parvej Hossain', 'parvej@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', NULL, NULL, NULL, 2, 1, '2022-09-12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_list`
--
ALTER TABLE `booking_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `booking_list`
--
ALTER TABLE `booking_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
