-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 03, 2023 at 08:27 AM
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
-- Database: `fiMax`
--

-- --------------------------------------------------------

--
-- Table structure for table `Transactions`
--

CREATE TABLE `Transactions` (
  `transaction_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `symbol` varchar(10) NOT NULL,
  `transaction_type` enum('buy','sell') NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `transaction_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Transactions`
--

INSERT INTO `Transactions` (`transaction_id`, `user_id`, `symbol`, `transaction_type`, `quantity`, `price`, `transaction_date`) VALUES
(3, 2, 'GOOGL', 'buy', 10, 16.07, '2023-07-05 22:17:47'),
(5, 2, 'GOOGL', 'buy', 30, 10.55, '2023-07-04 22:17:47'),
(7, 2, 'GOOGL', 'buy', 85, 10.30, '2023-06-16 22:17:47'),
(8, 2, 'MSFT', 'sell', 96, 3.03, '2023-06-25 22:17:47'),
(9, 2, 'GOOGL', 'sell', 54, 6.70, '2023-06-15 22:17:47'),
(11, 2, 'GOOGL', 'sell', 54, 17.08, '2023-07-09 22:17:47'),
(12, 2, 'GOOGL', 'sell', 20, 10.32, '2023-06-18 22:17:47'),
(13, 2, 'MSFT', 'sell', 71, 6.06, '2023-07-24 22:17:47'),
(15, 2, 'GOOGL', 'sell', 72, 7.82, '2023-06-30 22:17:47'),
(16, 2, 'GOOGL', 'buy', 42, 18.96, '2023-07-18 22:17:47'),
(17, 2, 'GOOGL', 'sell', 1, 3.41, '2023-06-29 22:17:47'),
(18, 2, 'MSFT', 'sell', 69, 12.26, '2023-06-18 22:17:47'),
(22, 2, 'MSFT', 'buy', 2, 16.84, '2023-06-09 22:17:47'),
(24, 2, 'GOOGL', 'buy', 62, 13.63, '2023-07-15 22:17:47'),
(25, 2, 'GOOGL', 'buy', 58, 7.51, '2023-06-09 22:17:47'),
(26, 2, 'GOOGL', 'sell', 93, 2.59, '2023-06-27 22:17:47'),
(27, 2, 'GOOGL', 'buy', 40, 2.90, '2023-07-17 22:17:47'),
(29, 2, 'MSFT', 'sell', 6, 13.14, '2023-06-12 22:17:47'),
(30, 2, 'MSFT', 'buy', 21, 11.75, '2023-07-29 22:17:47'),
(31, 2, 'AMZN', 'sell', 77, 14.35, '2023-07-30 22:17:47'),
(32, 2, 'GOOGL', 'buy', 71, 8.66, '2023-06-15 22:17:47'),
(33, 2, 'GOOGL', 'sell', 9, 16.23, '2023-07-01 22:17:47'),
(34, 2, 'MSFT', 'buy', 3, 10.16, '2023-07-21 22:17:47'),
(35, 2, 'MSFT', 'sell', 80, 6.52, '2023-08-02 22:17:47'),
(37, 2, 'GOOGL', 'sell', 7, 19.60, '2023-07-07 22:17:47'),
(38, 2, 'MSFT', 'buy', 90, 6.23, '2023-06-26 22:17:47'),
(39, 2, 'AMZN', 'sell', 29, 11.59, '2023-06-16 22:17:47'),
(40, 2, 'GOOGL', 'sell', 29, 10.21, '2023-07-07 22:17:47'),
(41, 2, 'MSFT', 'sell', 55, 20.00, '2023-07-26 22:17:47'),
(42, 2, 'GOOGL', 'buy', 26, 17.55, '2023-07-11 22:17:47'),
(43, 2, 'MSFT', 'buy', 24, 2.37, '2023-06-25 22:17:47'),
(44, 2, 'GOOGL', 'buy', 74, 4.43, '2023-06-24 22:17:47'),
(45, 2, 'GOOGL', 'sell', 22, 9.39, '2023-07-06 22:17:47'),
(47, 2, 'GOOGL', 'buy', 4, 17.78, '2023-07-28 22:17:47'),
(48, 2, 'AMZN', 'buy', 17, 3.38, '2023-07-27 22:17:47'),
(50, 2, 'GOOGL', 'sell', 25, 20.43, '2023-07-27 22:17:47'),
(51, 2, 'AMZN', 'sell', 8, 15.38, '2023-07-12 22:17:47'),
(52, 2, 'GOOGL', 'buy', 85, 5.92, '2023-06-22 22:17:47'),
(53, 2, 'GOOGL', 'sell', 52, 16.01, '2023-07-22 22:17:47'),
(54, 2, 'GOOGL', 'buy', 33, 13.81, '2023-07-20 22:17:47'),
(56, 2, 'MSFT', 'sell', 36, 8.47, '2023-06-15 22:17:47'),
(57, 2, 'GOOGL', 'buy', 88, 9.88, '2023-06-27 22:17:47'),
(58, 2, 'AMZN', 'buy', 58, 11.83, '2023-06-04 22:17:47'),
(59, 2, 'MSFT', 'buy', 14, 13.89, '2023-06-15 22:17:47'),
(61, 2, 'AMZN', 'buy', 89, 8.99, '2023-07-12 22:17:47'),
(62, 2, 'AMZN', 'sell', 48, 8.09, '2023-07-13 22:17:47'),
(63, 2, 'GOOGL', 'sell', 31, 7.18, '2023-06-25 22:17:47'),
(64, 2, 'GOOGL', 'buy', 67, 17.07, '2023-07-31 22:17:47'),
(65, 2, 'MSFT', 'sell', 83, 19.32, '2023-07-28 22:17:47'),
(66, 2, 'GOOGL', 'sell', 46, 9.16, '2023-06-23 22:17:47'),
(68, 2, 'MSFT', 'buy', 65, 15.06, '2023-06-28 22:17:47'),
(69, 2, 'GOOGL', 'sell', 45, 13.15, '2023-06-21 22:17:47'),
(70, 2, 'AMZN', 'buy', 66, 13.24, '2023-07-27 22:17:47'),
(71, 2, 'GOOGL', 'buy', 56, 15.13, '2023-06-12 22:17:47'),
(74, 2, 'GOOGL', 'buy', 86, 13.96, '2023-06-23 22:17:47'),
(75, 2, 'GOOGL', 'sell', 15, 9.27, '2023-06-25 22:17:47'),
(76, 2, 'GOOGL', 'buy', 86, 14.91, '2023-06-09 22:17:47'),
(77, 2, 'MSFT', 'buy', 19, 15.85, '2023-07-23 22:17:47'),
(78, 2, 'MSFT', 'sell', 17, 16.45, '2023-07-12 22:17:47'),
(79, 2, 'GOOGL', 'buy', 84, 15.02, '2023-06-04 22:17:47'),
(80, 2, 'GOOGL', 'sell', 90, 11.27, '2023-06-11 22:17:47'),
(81, 2, 'GOOGL', 'sell', 19, 4.31, '2023-07-17 22:17:47'),
(82, 2, 'GOOGL', 'sell', 94, 15.47, '2023-06-15 22:17:47'),
(83, 2, 'GOOGL', 'buy', 88, 5.30, '2023-07-06 22:17:47'),
(84, 2, 'MSFT', 'sell', 87, 18.83, '2023-06-12 22:17:47'),
(85, 2, 'MSFT', 'buy', 22, 18.74, '2023-06-17 22:17:47'),
(87, 2, 'GOOGL', 'sell', 10, 17.64, '2023-06-11 22:17:47'),
(88, 2, 'AMZN', 'buy', 69, 14.12, '2023-07-20 22:17:47'),
(90, 2, 'MSFT', 'sell', 7, 12.07, '2023-06-30 22:17:47'),
(92, 2, 'MSFT', 'sell', 65, 12.69, '2023-06-05 22:17:47'),
(96, 2, 'MSFT', 'buy', 65, 20.90, '2023-08-01 22:17:47'),
(99, 2, 'AMZN', 'buy', 64, 8.55, '2023-06-05 22:17:47'),
(100, 2, 'MSFT', 'sell', 55, 7.65, '2023-08-01 22:17:47');

--
-- Triggers `Transactions`
--
DELIMITER $$
CREATE TRIGGER `update_user_asset` AFTER INSERT ON `Transactions` FOR EACH ROW BEGIN
    DECLARE stock_value DECIMAL(18, 2);
    
    IF NEW.transaction_type = 'buy' THEN
        SET stock_value = NEW.price * NEW.quantity;
    ELSE
        SET stock_value = -1 * NEW.price * NEW.quantity;
    END IF;
    
    UPDATE Users
    SET assets = money + stock_value
    WHERE user_id = NEW.user_id;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_user_money` AFTER INSERT ON `Transactions` FOR EACH ROW BEGIN
    DECLARE stock_value DECIMAL(18, 2);
    
    IF NEW.transaction_type = 'buy' THEN
        SET stock_value = NEW.price * NEW.quantity;
    ELSE
        SET stock_value = -1 * NEW.price * NEW.quantity;
    END IF;
    
    UPDATE Users
    SET money = money + stock_value
    WHERE UserID = NEW.user_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `UserID` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `dob` date DEFAULT NULL,
  `registration_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `assets` decimal(18,2) DEFAULT 0.00,
  `money` decimal(18,2) DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`UserID`, `username`, `email`, `password`, `first_name`, `last_name`, `dob`, `registration_date`, `assets`, `money`) VALUES
(2, 'admin', 'admin22@test.com', '$2y$10$oNuXTPa586n4U0ji2voPGueejOkAP63bCy/8BCees3N1lpl9iZoyC', 'Tung', 'Le', '2023-02-02', '2023-08-03 08:36:51', 2870169.58, 80307.81);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Transactions`
--
ALTER TABLE `Transactions`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Transactions`
--
ALTER TABLE `Transactions`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Transactions`
--
ALTER TABLE `Transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `Users` (`UserID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
