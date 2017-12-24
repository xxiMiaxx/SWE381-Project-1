-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 14, 2017 at 09:01 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `h2`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` varchar(225) NOT NULL,
  `author` varchar(225) NOT NULL,
  `ISBN` varchar(225) NOT NULL,
  `status` enum('0','1') DEFAULT '0',
  `categoryID` int(11) NOT NULL,
  `book_desc` varchar(255) CHARACTER SET utf8 NOT NULL,
  `image_url` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `author`, `ISBN`, `status`, `categoryID`, `book_desc`, `image_url`) VALUES
(1, 'the giver', 'mg', '13245678999', '0', 2, 'great book', 'http://www.ravenoak.net/wp-content/uploads/2015/08/thegiver.jpg'),
(8, 'harry poter', 'uhiu', 'iuhs', '1', 1, 'For many of the 40 million Americans who undergo anesthesia each year, it is the source of great fear and fascination. From the famous first demonstration of anesthesia in the Ether Dome at Massachusetts General   ', 'https://vignette.wikia.nocookie.net/harrypotter/images/b/bd/7xmtxRc9nQnCuWINuTT4SMP5NJc.jpg/revision/latest/scale-to-width-down/333?cb=20130803164345'),
(15, 'the perfect theory', 'r', 'r', '1', 1, 'r', 'https://images-na.ssl-images-amazon.com/images/I/41l0At8n52L._SX346_BO1,204,203,200_.jpg'),
(16, 'V.S CHOUS', 'MICHAL SOUTH', '879873763865', '0', 2, 'Once he begins it, Jonas\'s training makes clear his uniqueness, for the Receiver of Memory is just that—a person who bears the burden of the memories from all of history, and who is the only one allowed access to books beyond schoolbooks.', 'https://i2.wp.com/www.casualoptimist.com/wp-content/uploads/2017/03/conjuring-light-design-Will-Staehle.jpg'),
(17, 'fire and stars', '', '', '0', 2, 'Once he begins it, Jonas\'s training makes clear his uniqueness, for the Receiver of Memory is just that—a person who bears the burden of the memories from all of history.', 'http://justcreative.com/wp-content/uploads/2016/12/of-fire-and-stars_Audrey-Coulthurst.jpg'),
(18, 'looking for alaska', 'john green', '757265763596759', '0', 3, 'Once he begins it, Jonas\'s training makes clear his uniqueness, for the Receiver of Memory is just that—a person who bears the burden of the memories from all of history.', 'https://static1.squarespace.com/static/55db3b44e4b01e5be14cad77/t/578e54eb6a4963877603ec6d/1468945648607/?format=1000w'),
(19, 'paper towns', 'john green', '7676868685865', '0', 3, 'Once he begins it, Jonas\'s training makes clear his uniqueness, for the Receiver of Memory is just that—a person who bears the burden of the memories from all of history.', 'https://static1.squarespace.com/static/55db3b44e4b01e5be14cad77/t/578e5321ebbd1a7b3c15aa85/1468945191072/?format=300w'),
(20, 'wild and beautiful', 'hail h', '76686868686', '0', 3, 'Once he begins it, Jonas\'s training makes clear his uniqueness, for the Receiver of Memory is just that—a person who bears the burden of the memories from all of history,', 'https://i.pinimg.com/736x/fe/d3/78/fed37829d347bb217e6116d4977e7458--book-covers-september.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `ID` int(11) NOT NULL,
  `cat_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`ID`, `cat_name`) VALUES
(1, 'self-help'),
(2, 'fiction'),
(3, 'young adults');

-- --------------------------------------------------------

--
-- Table structure for table `currently`
--

CREATE TABLE `currently` (
  `cur_id` int(11) NOT NULL,
  `cur_due` date NOT NULL,
  `b_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `issued_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `currently`
--

INSERT INTO `currently` (`cur_id`, `cur_due`, `b_id`, `u_id`, `issued_date`) VALUES
(2, '2018-04-11', 10, 3, '2017-12-15');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `his_id` int(11) NOT NULL,
  `b_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`his_id`, `b_id`, `u_id`) VALUES
(1, 9, 3),
(5, 19, 3);

-- --------------------------------------------------------

--
-- Table structure for table `noti`
--

CREATE TABLE `noti` (
  `noti_id` int(11) NOT NULL,
  `noti_user` int(11) NOT NULL,
  `noti_book` int(11) NOT NULL,
  `noti_msg` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT 'Please return the book immediately'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `noti`
--

INSERT INTO `noti` (`noti_id`, `noti_user`, `noti_book`, `noti_msg`) VALUES
(1, 3, 8, 'This notification to remember you to back the book'),
(2, 3, 17, 'Please return the book immediately');

-- --------------------------------------------------------

--
-- Table structure for table `record`
--

CREATE TABLE `record` (
  `ID` int(11) NOT NULL,
  `ID_Currently` int(11) NOT NULL,
  `ID_History` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `bookname` varchar(255) NOT NULL,
  `req_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`bookname`, `req_id`, `u_id`) VALUES
('', 1, 0),
('', 2, 0),
('new book', 3, 1),
('new book', 4, 1),
('bookish', 5, 1),
('boohhhh', 6, 1),
('boohhhh', 7, 1),
('S', 8, 3),
('2017', 9, 3),
('2017', 10, 3),
('reema', 11, 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Password` varchar(32) NOT NULL,
  `type` enum('0','1') NOT NULL DEFAULT '1',
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `Name`, `Password`, `type`, `email`, `image`) VALUES
(1, 'lamia', 'f98ed07a4d5f50f7de1410d905f1477f', '0', 'tt@gmail.com', ''),
(2, 'nnn', 'nnn', '0', 'nnn', ''),
(3, 'hind', 'c70fd4260c9eb90bc0ba9d047c068eb8', '1', 'ali@gmail.com', 'mmm.jpg'),
(33, 'uuu', '202cb962ac59075b964b07152d234b70', '1', 'eee', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ISBN` (`ISBN`),
  ADD KEY `categoryID` (`categoryID`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `currently`
--
ALTER TABLE `currently`
  ADD PRIMARY KEY (`cur_id`),
  ADD KEY `b_id` (`b_id`),
  ADD KEY `u_id` (`u_id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`his_id`),
  ADD KEY `b_id` (`b_id`),
  ADD KEY `u_id` (`u_id`);

--
-- Indexes for table `noti`
--
ALTER TABLE `noti`
  ADD PRIMARY KEY (`noti_id`),
  ADD KEY `noti_book` (`noti_book`),
  ADD KEY `noti_user` (`noti_user`);

--
-- Indexes for table `record`
--
ALTER TABLE `record`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`req_id`),
  ADD KEY `u_id` (`u_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `currently`
--
ALTER TABLE `currently`
  MODIFY `cur_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `his_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `noti`
--
ALTER TABLE `noti`
  MODIFY `noti_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `record`
--
ALTER TABLE `record`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `req_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`categoryID`) REFERENCES `categories` (`ID`);

--
-- Constraints for table `requests`
--
ALTER TABLE `requests`
  ADD CONSTRAINT `requests_ibfk_1` FOREIGN KEY (`req_id`) REFERENCES `users` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
