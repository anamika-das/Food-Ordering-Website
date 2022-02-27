-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2021 at 06:02 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food_shala`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(30) NOT NULL,
  `client_ip` varchar(255) DEFAULT NULL,
  `user_id` int(30) DEFAULT NULL,
  `product_id` int(30) NOT NULL,
  `qty` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category_list`
--

CREATE TABLE `category_list` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category_list`
--

INSERT INTO `category_list` (`id`, `name`) VALUES
(1, 'Beverages'),
(3, 'Best Sellers'),
(4, 'Meals'),
(8, 'Snaks');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `address` text NOT NULL,
  `mobile` text NOT NULL,
  `email` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `address`, `mobile`, `email`, `status`) VALUES
(6, 'Bikash Khan', 'Word No 11 Malbazaar', '0787230420', 'bikash@gmail.com', 1),
(7, 'Shubham Khan', 'Bibarda, Bankura', '8972525100', 'shubham@gmail.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_list`
--

CREATE TABLE `order_list` (
  `id` int(30) NOT NULL,
  `order_id` int(30) NOT NULL,
  `product_id` int(30) NOT NULL,
  `qty` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_list`
--

INSERT INTO `order_list` (`id`, `order_id`, `product_id`, `qty`) VALUES
(15, 6, 7, 1),
(16, 6, 4, 3),
(17, 7, 5, 1),
(18, 7, 4, 2),
(19, 7, 8, 2);

-- --------------------------------------------------------

--
-- Table structure for table `product_list`
--

CREATE TABLE `product_list` (
  `id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL,
  `category_id` int(30) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` float NOT NULL DEFAULT 0,
  `img_path` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0= unavailable, 2 Available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_list`
--

INSERT INTO `product_list` (`id`, `user_id`, `category_id`, `name`, `description`, `price`, `img_path`, `status`) VALUES
(1, 3, 4, 'Breakfast Sandwich', 'Breakfast sandwiches are served at fast-food restaurants and delicatessens or bought as fast, ready to heat and eat sandwiches from a store.', 20, 'pexels-angele-j-139746.jpg', 1),
(3, 3, 4, 'Naan', 'Naan is a leavened flatbread mostly cooked in a tandoor (clay oven). It is one of the most ordered flatbreads in Indian restaurants & is eaten with a curry or dal (lentils).', 15, 'pexels-francesco-paggiaro-1117862.jpg', 0),
(4, 2, 3, 'Puff Pastry', 'Puff pastry, also known as pâte feuilletée, is a flaky light pastry made from a laminated dough composed of dough and butter or other solid fat. ', 150, 'pexels-jeff-wang-441486.jpg', 1),
(5, 3, 3, 'Sausage', 'A sausage is a type of meat product usually made from ground meat, often pork, beef, or poultry, along with salt, spices and other flavourings.', 200, 'pexels-mali-maeder-929137.jpg', 1),
(6, 2, 3, 'Kati Roll', 'A kati roll is a street-food dish originating from Kolkata, West Bengal. In its original form, it is a skewer-roasted kebab wrapped in a paratha bread.', 250, 'pexels-nishant-aneja-2955819.jpg', 1),
(7, 3, 3, 'Shrimp Fish', 'A spicy seafood dish made from fish or prawns in a dark red and fiery tangy sauce. Shrimpfish, also called razorfish, are five small species of marine fishes.', 300, 'pexels-maria-bortolotto-6270541.jpg', 1),
(8, 2, 3, 'Rotisserie Chicken', 'Rotisserie chicken is a chicken dish that is cooked on a rotisserie by using direct heat in which the chicken is placed next to the heat source.', 450, 'pexels-samer-daboul-2233730.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `system_settings`
--

CREATE TABLE `system_settings` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `cover_img` text NOT NULL,
  `about_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `system_settings`
--

INSERT INTO `system_settings` (`id`, `name`, `email`, `contact`, `cover_img`, `about_content`) VALUES
(1, 'Food Shala', 'admin@gmail.com', '+918597564283', 'pexels-ella-olsson-1640777.jpg', '&lt;p style=&quot;text-align: center; background: transparent; position: relative; font-family: Arial, Helvetica, Bangla402, sans-serif;&quot;&gt;&lt;span style=&quot;color: rgb(0, 0, 0); font-family: Bangla904, &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; text-align: justify;&quot;&gt;&amp;nbsp;is simply dummied&amp;nbsp;text of the printing and typesetting industry. Lorem Ipsum has been the industry&rsquo;s standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/span&gt;&lt;span style=&quot;color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Arial, Bangla402, sans-serif; font-weight: 400; text-align: justify;&quot;&gt;&lt;br style=&quot;font-family: Arial, Helvetica, Bangla402, sans-serif;&quot;&gt;&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center; background: transparent; position: relative; font-family: Arial, Helvetica, Bangla402, sans-serif;&quot;&gt;&lt;/p&gt;&lt;h2 style=&quot;font-size: 28px; background: transparent; position: relative; font-family: Arial, Helvetica, Bangla402, sans-serif;&quot;&gt;Where does it come from?&lt;/h2&gt;&lt;p style=&quot;text-align: center; margin-bottom: 15px; padding: 0px;&quot;&gt;&lt;font color=&quot;#000000&quot; face=&quot;Open Sans, Arial, Bangla402, sans-serif&quot; style=&quot;font-family: Arial, Helvetica, Bangla243, sans-serif;&quot;&gt;Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.&lt;/font&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center; margin-bottom: 15px; padding: 0px;&quot;&gt;&lt;font color=&quot;#000000&quot; face=&quot;Open Sans, Arial, Bangla402, sans-serif&quot; style=&quot;font-family: Arial, Helvetica, Bangla243, sans-serif;&quot;&gt;&lt;br style=&quot;font-family: Arial, Helvetica, Bangla243, sans-serif;&quot;&gt;&lt;/font&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center; margin-bottom: 15px; padding: 0px;&quot;&gt;&lt;font color=&quot;#000000&quot; face=&quot;Open Sans, Arial, Bangla402, sans-serif&quot; style=&quot;font-family: Arial, Helvetica, Bangla243, sans-serif;&quot;&gt;The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.&lt;/font&gt;&lt;/p&gt;&lt;p style=&quot;font-family: Arial, Helvetica, Bangla402, sans-serif;&quot;&gt;&lt;/p&gt;'),
(2, 'VK Restaurants', 'vk@gmail.com', '+9148 8542 623', 'pexels-ella-olsson-1640777.jpg', '&lt;p style=&quot;text-align: center; background: transparent; position: relative; font-family: Arial, Helvetica, Bangla402, sans-serif;&quot;&gt;&lt;span style=&quot;color: rgb(0, 0, 0); font-family: Bangla904, &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; text-align: justify;&quot;&gt;&amp;nbsp;is simply dummied&amp;nbsp;text of the printing and typesetting industry. Lorem Ipsum has been the industry&rsquo;s standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/span&gt;&lt;span style=&quot;color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Arial, Bangla402, sans-serif; font-weight: 400; text-align: justify;&quot;&gt;&lt;br style=&quot;font-family: Arial, Helvetica, Bangla402, sans-serif;&quot;&gt;&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center; background: transparent; position: relative; font-family: Arial, Helvetica, Bangla402, sans-serif;&quot;&gt;&lt;/p&gt;&lt;h2 style=&quot;font-size: 28px; background: transparent; position: relative; font-family: Arial, Helvetica, Bangla402, sans-serif;&quot;&gt;Where does it come from?&lt;/h2&gt;&lt;p style=&quot;text-align: center; margin-bottom: 15px; padding: 0px;&quot;&gt;&lt;font color=&quot;#000000&quot; face=&quot;Open Sans, Arial, Bangla402, sans-serif&quot; style=&quot;font-family: Arial, Helvetica, Bangla243, sans-serif;&quot;&gt;Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.&lt;/font&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center; margin-bottom: 15px; padding: 0px;&quot;&gt;&lt;font color=&quot;#000000&quot; face=&quot;Open Sans, Arial, Bangla402, sans-serif&quot; style=&quot;font-family: Arial, Helvetica, Bangla243, sans-serif;&quot;&gt;&lt;br style=&quot;font-family: Arial, Helvetica, Bangla243, sans-serif;&quot;&gt;&lt;/font&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center; margin-bottom: 15px; padding: 0px;&quot;&gt;&lt;font color=&quot;#000000&quot; face=&quot;Open Sans, Arial, Bangla402, sans-serif&quot; style=&quot;font-family: Arial, Helvetica, Bangla243, sans-serif;&quot;&gt;The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.&lt;/font&gt;&lt;/p&gt;&lt;p style=&quot;font-family: Arial, Helvetica, Bangla402, sans-serif;&quot;&gt;&lt;/p&gt;'),
(3, 'HPL Hotel', 'hpl@gmail.com', '+918597564283', '1621507800_Capture.JPG', '&lt;p style=&quot;text-align: center; background: transparent; position: relative; font-family: Arial, Helvetica, Bangla402, sans-serif;&quot;&gt;&lt;span style=&quot;color: rgb(0, 0, 0); font-family: Bangla904, &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; text-align: justify;&quot;&gt;&amp;nbsp;is simply dummied&amp;nbsp;text of the printing and typesetting industry. Lorem Ipsum has been the industry&rsquo;s standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/span&gt;&lt;span style=&quot;color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Arial, Bangla402, sans-serif; font-weight: 400; text-align: justify;&quot;&gt;&lt;br style=&quot;font-family: Arial, Helvetica, Bangla402, sans-serif;&quot;&gt;&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center; background: transparent; position: relative; font-family: Arial, Helvetica, Bangla402, sans-serif;&quot;&gt;&lt;/p&gt;&lt;h2 style=&quot;font-size: 28px; background: transparent; position: relative; font-family: Arial, Helvetica, Bangla402, sans-serif;&quot;&gt;Where does it come from?&lt;/h2&gt;&lt;p style=&quot;text-align: center; margin-bottom: 15px; padding: 0px;&quot;&gt;&lt;font color=&quot;#000000&quot; face=&quot;Open Sans, Arial, Bangla402, sans-serif&quot; style=&quot;font-family: Arial, Helvetica, Bangla243, sans-serif;&quot;&gt;Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.&lt;/font&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center; margin-bottom: 15px; padding: 0px;&quot;&gt;&lt;font color=&quot;#000000&quot; face=&quot;Open Sans, Arial, Bangla402, sans-serif&quot; style=&quot;font-family: Arial, Helvetica, Bangla243, sans-serif;&quot;&gt;&lt;br style=&quot;font-family: Arial, Helvetica, Bangla243, sans-serif;&quot;&gt;&lt;/font&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center; margin-bottom: 15px; padding: 0px;&quot;&gt;&lt;font color=&quot;#000000&quot; face=&quot;Open Sans, Arial, Bangla402, sans-serif&quot; style=&quot;font-family: Arial, Helvetica, Bangla243, sans-serif;&quot;&gt;The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.&lt;/font&gt;&lt;/p&gt;&lt;p style=&quot;font-family: Arial, Helvetica, Bangla402, sans-serif;&quot;&gt;&lt;/p&gt;');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 2 COMMENT '1=admin , 2 = staff'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `type`) VALUES
(1, 'Food Shala', 'admin@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 1),
(2, 'VK Restaurant', 'vk@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 2),
(3, 'HPL Hotel', 'hpl@gmail.com', '01cfcd4f6b8770febfb40cb906715822', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `user_id` int(30) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `address` varchar(300) NOT NULL,
  `preferences` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `first_name`, `last_name`, `email`, `password`, `mobile`, `address`, `preferences`) VALUES
(2, 'Bikash', 'Khan', 'bikash@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '0787230420', 'Word No 11 Malbazaar', 2),
(3, 'Shubham', 'Khan', 'shubham@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '8972525100', 'Bibarda, Bankura', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_list`
--
ALTER TABLE `category_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_list`
--
ALTER TABLE `order_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_list`
--
ALTER TABLE `product_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_settings`
--
ALTER TABLE `system_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `category_list`
--
ALTER TABLE `category_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `order_list`
--
ALTER TABLE `order_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `product_list`
--
ALTER TABLE `product_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `system_settings`
--
ALTER TABLE `system_settings`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
