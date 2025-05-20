-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2025 at 07:45 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `store_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_username` varchar(100) NOT NULL,
  `admin_email` varchar(200) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_username`, `admin_email`, `admin_password`) VALUES
(1, 'admin', 'administration@gmail.com', 'administration');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'Redragon'),
(2, 'Aula'),
(3, 'Logitech'),
(7, 'rapoo'),
(8, 'Firewolf');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `product_id` int(11) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `quantity` int(100) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_title`) VALUES
(1, 'Keyboards'),
(2, 'Mouse'),
(3, 'Mouse Pads'),
(4, 'Headsets'),
(5, 'Earphones'),
(6, 'Speakers');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` int(255) NOT NULL,
  `invoice_num` int(255) NOT NULL,
  `total_products` int(255) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `amount`, `invoice_num`, `total_products`, `order_date`, `order_status`) VALUES
(1, 1, 4999, 475386139, 2, '2024-05-15 04:01:18', 'Order Confirmed'),
(2, 1, 3000, 258953179, 1, '2024-05-13 10:00:51', 'pending'),
(9, 2, 2599, 1882684714, 1, '2024-05-16 18:20:51', 'Order Confirmed'),
(10, 2, 1117, 1709823373, 1, '2024-05-16 18:20:38', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `invoice_num` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `order_id`, `invoice_num`, `amount`, `payment_mode`, `date`) VALUES
(6, 8, 356461280, 1117, 'MAYA', '2024-05-16 14:23:53'),
(7, 9, 1882684714, 2599, 'PAYPAL', '2024-05-16 18:20:51');

-- --------------------------------------------------------

--
-- Table structure for table `pending_orders`
--

CREATE TABLE `pending_orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `invoice_num` int(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(255) NOT NULL,
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pending_orders`
--

INSERT INTO `pending_orders` (`order_id`, `user_id`, `invoice_num`, `product_id`, `quantity`, `order_status`) VALUES
(1, 1, 475386139, 3, 1, 'pending'),
(2, 1, 258953179, 2, 1, 'pending'),
(3, 1, 1906270666, 2, 1, 'pending'),
(4, 2, 98014124, 4, 1, 'pending'),
(5, 2, 282648670, 6, 1, 'pending'),
(6, 2, 1975031629, 2, 1, 'pending'),
(7, 2, 1171078546, 3, 1, 'pending'),
(8, 2, 356461280, 7, 1, 'pending'),
(9, 2, 1882684714, 4, 1, 'pending'),
(10, 2, 1709823373, 7, 1, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(100) NOT NULL,
  `product_description` varchar(250) NOT NULL,
  `product_keywords` varchar(250) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `image1` varchar(255) NOT NULL,
  `image2` varchar(255) NOT NULL,
  `product_price` decimal(10,0) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_description`, `product_keywords`, `category_id`, `brand_id`, `image1`, `image2`, `product_price`, `date`, `status`) VALUES
(1, 'REDRAGON K654', 'This is a keyboard', 'keyboard, gaming', 1, 1, 'exclusive.png', 'exclusive.png', 5000, '2024-05-02 06:30:21', 'true'),
(2, 'KEYCHRON Q1 QMK', 'This is a keyboard', 'keyboard, gaming', 1, 2, 'show2.webp', 'show3.webp', 3000, '2024-05-16 09:15:19', 'true'),
(3, 'M908 GAMING MOUSE', 'This is a mouse', 'gaming, mouse', 2, 1, 'product4.webp', 'product4.webp', 1999, '2024-05-02 06:33:02', 'true'),
(4, 'REDRAGON H520 ICON', 'This is a headset', 'headset, gaming', 4, 1, 'product3.webp', 'product3.webp', 2599, '2024-05-02 06:33:52', 'true'),
(5, 'P012 MOUSE PAD', 'This is a mouse pad', 'gaming, mousepad', 3, 1, 'product7.webp', 'product7.webp', 599, '2024-05-02 09:28:30', 'true'),
(6, 'ANDANTE GS812', 'This is a speaker', 'speaker, high-quality', 6, 1, 'product5.webp', 'product5.webp', 3999, '2024-05-02 14:38:18', 'true'),
(7, 'Redragon X LTC SS-503', 'Free switching of 9 light modes via short pressing the charging box MFB, earbuds bring you a different visual effect to meet the needs of game lovers. Certificated with IPX4 waterproof rating, SS-503 wireless headphones can prevent penetration from s', 'wireless, earbuds, earphones', 5, 1, 'product6.webp', 'product6.webp', 1117, '2024-05-03 15:24:27', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `user_ip` varchar(100) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_email`, `user_password`, `user_image`, `user_ip`, `user_address`, `user_phone`) VALUES
(2, 'Rondale', 'rondale.bufete@gmail.com', '$2y$10$92uDlJ5D91cdKg0EI9FvQ.MyqmNyLC3QqBmuj4JLyGNejQt12MOu.', 'BUFETE_8R.JPG', '::1', 'Ayugan, Ocampo, Camarines Sur', '09950794708'),
(5, 'Ron', 'rondale.bufete7@gmail.com', '$2y$10$nlFRf.eoYqwQyLJ9Ehes5OY2x/JWIjuHsU0UHi2RVhcy7BGELJ0LO', 'cat1.jpg', '::1', 'asdascajsnhcasd', '09992934982'),
(6, 'Justin', 'justin@gmail.com', '$2y$10$.3DzD4APHIoUqTQSfD9Mz.Lv.9UOIZVesDS1qE3knCmLLR2v6KmjW', 'sss.png', '::1', 'asdasdsad', 'asdsadsad'),
(7, 'Lawrence', 'oliveros@gmail.com', '$2y$10$6MWwI7GCGtmOimvwMplWpOF8cxkJO/Vqco2GzYDNEf877dbYVRyqS', 'cat2.jpg', '::1', 'asdsadsadasd', 'asdsadsad');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
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
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `product_id_2` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `pending_orders`
--
ALTER TABLE `pending_orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `brand_id` (`brand_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pending_orders`
--
ALTER TABLE `pending_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `order_id` FOREIGN KEY (`order_id`) REFERENCES `pending_orders` (`order_id`);

--
-- Constraints for table `pending_orders`
--
ALTER TABLE `pending_orders`
  ADD CONSTRAINT `product_id` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `brand_id` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`brand_id`),
  ADD CONSTRAINT `category_id` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
