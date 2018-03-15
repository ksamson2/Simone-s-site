-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2016 at 06:07 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test2`
--

-- --------------------------------------------------------

--
-- Table structure for table `advert`
--

CREATE TABLE `advert` (
  `ad_id` int(11) NOT NULL,
  `user` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `artist` varchar(100) NOT NULL,
  `genre` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `price` decimal(20,2) NOT NULL,
  `image` blob NOT NULL,
  `postDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `advert`
--

INSERT INTO `advert` (`ad_id`, `user`, `user_id`, `item_name`, `description`, `artist`, `genre`, `type`, `price`, `image`, `postDate`) VALUES
(78, 'Niklaus', 2, 'The birds', 'There''s always space for nature', 'Jason Todd', 'Abstract', 'Digital Photography', '456876.00', 0x75706c6f6164732f31343234383135315f6c617267652e6a7067, '2016-11-05'),
(79, 'Wallace ', 6, 'Drifting', 'A ballerina drifting off', 'Peter Parker', 'Abstract', 'Watercolor', '45879.00', 0x75706c6f6164732f38313030346136323934396333663565613938333764336165313934393864642e6a7067, '2016-11-07'),
(80, 'Wallace ', 6, 'Sensational', 'A moment that makes you look twice', 'Jason Todd', 'Expressionism', 'Photoshop', '544698.00', 0x75706c6f6164732f312e6a7067, '2016-11-07'),
(81, 'Jon', 4, 'Bright eyed wonder', 'A perched owl', 'Tony Stark ', 'Modernism', 'Pen and Ink', '78900.00', 0x75706c6f6164732f61313635623165356462343066336563303566383735396631653334623930652e6a7067, '2016-11-07'),
(82, 'Jon', 4, 'A story in purple', 'The way the world drains the ballerina', 'Bruce Wayne', 'Expressionism', 'Watercolor', '65400.00', 0x75706c6f6164732f37653633613637646530613832303237623237643864333365366566393930642e6a7067, '2016-11-07'),
(83, 'Jon', 4, 'Mother of dragons ', 'A breathtaking replica of Daenerys Targaryen', 'Samwell Tarly', 'Photorealism', 'Acrylic Painting ', '850000.00', 0x75706c6f6164732f64356562613566643031356239373566336434616162363431646138356334652e6a7067, '2016-11-07'),
(84, 'Wallace ', 6, 'Blink', 'A beautiful fusion of colour and detail depicting an eye', 'Bruce Wayne', 'Modernism', 'Watercolor', '22200.00', 0x75706c6f6164732f36666431366334306631663435613336386535386561656534393138643062322e6a7067, '2016-11-07'),
(85, 'Henry', 7, 'The moment', 'Two ballet dancers dans perfection', 'Bruce Wayne', 'Expressionism', 'Acrylic Painting ', '450000.00', 0x75706c6f6164732f33316533366464653535653130363765383233353534366436613531353766662e6a7067, '2016-11-07'),
(88, 'Henry', 7, 'The palace', 'A courtyard depiction', 'Samwell Tarly', 'Digital', 'Photoshop', '25000.00', 0x75706c6f6164732f31373461313765343462666563396331316636633962663430636266346361352e6a7067, '2016-11-07'),
(89, 'Henry', 7, 'The wisps', 'A double exposure wonder', 'Peter Parker', 'Digital', 'Double Exposure Photography', '34000.00', 0x75706c6f6164732f544d45346955492e6a7067, '2016-11-07'),
(91, 'Michael', 8, 'The air ', 'A mountainous landscape ', 'Tony Stark ', 'Digital', 'Digital Photography', '45000.00', 0x75706c6f6164732f332e6a7067, '2016-11-07'),
(92, 'Michael', 8, 'Trooper', 'A Star Wars delight: stormtrooper art ', 'Jason Todd', 'Digital', 'Double Exposure Photography', '890000.00', 0x75706c6f6164732f3235393036372d537461725f576172732d73746f726d74726f6f7065722d446f75626c655f4578706f737572652d426174746c655f6f665f486f74682e6a7067, '2016-11-07'),
(93, 'Michael', 8, 'The city ', 'The city invades ', 'Samwell Tarly', 'Digital', 'Double Exposure Photography', '65000.00', 0x75706c6f6164732f35373330323437626264373731383661636230396639373332363639383363612e6a7067, '2016-11-07'),
(94, 'Niklaus', 2, 'Joy ', 'A bright depiction of a mother and child elephant', 'Tony Stark ', 'Modernism', 'Gouache', '452000.00', 0x75706c6f6164732f61663933626432376439666534343236646134366532383166336365366263662e6a7067, '2016-11-07'),
(95, 'Niklaus', 2, 'Hiro', 'A design of an anime character', 'Bruce Wayne', 'Abstract', 'Screen printing', '78900.00', 0x75706c6f6164732f61326535333035373136626231666336346666646335623065386532333531352e6a7067, '2016-11-07');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart` int(11) NOT NULL,
  `ad_id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart`, `ad_id`, `user`, `owner_id`) VALUES
(3, 78, 5, 0),
(4, 78, 5, 0),
(5, 92, 2, 0),
(6, 85, 2, 0),
(7, 95, 7, 0);

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `sent_on` date NOT NULL,
  `send_to` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `user_id`, `message`, `sent_on`, `send_to`) VALUES
(1, 4, 'Hi there, the double exposure ad "The Birds" looks really interesting. What is your selling price? ', '2016-11-07', 'nick@m.com'),
(2, 2, 'Hi Jon, I would like to make an offer on your post "Mother of dragons. " Please get back to me if you''re still interested. ', '2016-11-07', 'j@s.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `birthday` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `image` blob NOT NULL,
  `work` varchar(100) NOT NULL,
  `interests` text NOT NULL,
  `area` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `surname`, `password`, `birthday`, `email`, `image`, `work`, `interests`, `area`) VALUES
(2, 'Niklaus', 'Mikaelson', '5', '0000-00-00', 'nick@m.com', 0x75706c6f6164732f6a6f736570682d6d6f7267616e2d7468652d6f726967696e616c732d6b6c6175732d68642d77616c6c70617065722e6a7067, 'Staying alive', 'Art Renaissace', 'New Orleans'),
(4, 'Jon', 'Snow', '1', '0000-00-00', 'j@s.com', 0x75706c6f6164732f6a6f6e2d736e6f772d646f65736e742d6b6e6f772e6a7067, 'Knight', 'Digital Photography', 'Snow'),
(6, 'Wallace ', 'Wells', '6', '0000-00-00', 'w@w.com', 0x75706c6f6164732f74756d626c725f6c6636706e735a4d6b4d3171676e66696e6f315f3530302e706e67, '', 'Street art', 'Toronto'),
(7, 'Henry', 'Talbot', '4', '0000-00-00', 'h@talbot.com', 0x75706c6f6164732f45766572797468696e675f796f755f6e6565645f746f5f6b6e6f775f61626f75745f446f776e746f6e5f41626265795f735f48656e72795f54616c626f742e6a7067, 'Racer', 'Art Nouveau', 'Talbot'),
(8, 'Michael', 'Ross', '8', '0000-00-00', 'm@ross.com', 0x75706c6f6164732f31283234292e6a7067, 'Consultant', 'Photography', 'Ross');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advert`
--
ALTER TABLE `advert`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advert`
--
ALTER TABLE `advert`
  MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;
--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
