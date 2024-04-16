-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2024 at 05:30 PM
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
-- Database: `assignment`
--

-- --------------------------------------------------------

--
-- Table structure for table `cal_carbonfootprint3`
--

CREATE TABLE `cal_carbonfootprint3` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `people` int(11) NOT NULL,
  `home_size` varchar(255) NOT NULL,
  `food` int(11) NOT NULL,
  `water` int(11) NOT NULL,
  `household` int(11) NOT NULL,
  `waste` int(11) NOT NULL,
  `recycle` varchar(3) DEFAULT NULL,
  `recycling_categories` varchar(255) DEFAULT NULL,
  `personal_miles` int(255) DEFAULT NULL,
  `public_miles` int(255) DEFAULT NULL,
  `flight_distance` varchar(255) DEFAULT NULL,
  `total_carbon_footprint` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cal_carbonfootprint3`
--

INSERT INTO `cal_carbonfootprint3` (`id`, `email`, `people`, `home_size`, `food`, `water`, `household`, `waste`, `recycle`, `recycling_categories`, `personal_miles`, `public_miles`, `flight_distance`, `total_carbon_footprint`, `timestamp`) VALUES
(34, 'sylvia@gmail.com', 4, 'small', 5, 2, 3, 3, '0', 's:7:\"plastic\";', 10000, 0, 'medium', 74, '2024-04-16 12:19:14'),
(35, 'sylvia@gmail.com', 5, 'medium', 5, 2, 4, 3, '0', 's:7:\"plastic\";', 10000, 0, 'short', 69, '2024-04-15 12:19:58'),
(36, 'sylvia@gmail.com', 2, 'apartment', 2, 2, 3, 4, '0', 's:8:\"aluminum\";', 1000, 1000, 'long', 76, '2024-04-16 12:20:41'),
(37, 'sylvia@gmail.com', 4, 'medium', 5, 1, 3, 3, '0', 's:10:\"food_waste\";', 0, 0, 'medium', 76, '2024-04-16 12:22:04'),
(38, 'sylvia@gmail.com', 3, 'small', 4, 2, 3, 3, '0', 's:5:\"paper\";', 10000, 10000, 'medium', 66, '2024-04-14 12:22:31'),
(39, 'sylvia@gmail.com', 2, 'apartment', 1, 1, 3, 3, '0', 's:7:\"plastic\";', 10000, 10000, 'long', 87, '2024-04-16 12:23:00'),
(40, 'sylvia@gmail.com', 2, 'apartment', 4, 3, 2, 2, '0', 's:5:\"paper\";', 10000, 1000, 'medium', 79, '2024-04-16 12:23:27'),
(41, 'sylvia@gmail.com', 6, 'small', 4, 2, 5, 3, '0', 's:7:\"plastic\";', 1000, 10000, 'medium', 56, '2024-04-16 12:23:59'),
(42, 'sylvia@gmail.com', 4, 'medium', 5, 3, 3, 4, '0', 's:5:\"paper\";', 10000, 0, 'short', 64, '2024-04-14 12:24:28'),
(43, 'sylvia@gmail.com', 5, 'large', 7, 4, 2, 3, '0', '', 0, 0, 'medium', 68, '2024-04-16 12:25:17'),
(44, 'sylvia@gmail.com', 5, 'medium', 4, 2, 3, 3, '0', 's:5:\"paper\";', 1000, 10000, 'medium', 65, '2024-04-16 12:26:29'),
(45, 'sylvia@gmail.com', 4, 'apartment', 7, 2, 4, 2, 'yes', 's:10:\"food_waste\";', 1000, 10000, 'medium', 70, '2024-04-17 12:29:54'),
(46, 'sylvia@gmail.com', 4, 'medium', 6, 3, 3, 3, 'yes', 's:7:\"plastic\";', 1000, 1000, 'medium', 72, '2024-04-16 14:41:11');

-- --------------------------------------------------------

--
-- Table structure for table `carbon_footprint_categories`
--

CREATE TABLE `carbon_footprint_categories` (
  `footprint_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `usertype` varchar(10) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`email`, `password`, `username`, `usertype`) VALUES
('admin@gmail.com', '123', 'admin', 'admin'),
('e@gmail.com', '1', '123', 'user'),
('irene@gmail.com', 'irene123', 'irene', 'user'),
('irenecheong2016@gmail.com', 'Cheong1234', 'Cheongjysb', 'user'),
('irenecheong333@gmail.com', 'Cheong1234', 'hihihi', 'user'),
('lala@gmail.com', 'IreneCheong123', 'lala', 'user'),
('rae@gmail.com', '12345678', 'rae', 'user'),
('sylvia@gmail.com', 'sylvia123', 'Sylvia', 'user'),
('ww@gmail.com', '12345678', 'su_weii', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `recycling_categories`
--

CREATE TABLE `recycling_categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recycling_categories`
--

INSERT INTO `recycling_categories` (`category_id`, `category_name`) VALUES
(4, 'aluminium'),
(6, 'food waste'),
(1, 'glass'),
(3, 'paper'),
(2, 'plastic'),
(5, 'steel');

-- --------------------------------------------------------

--
-- Table structure for table `survey_responses`
--

CREATE TABLE `survey_responses` (
  `id` int(11) NOT NULL,
  `Design` int(11) NOT NULL,
  `Navigation` int(11) NOT NULL,
  `Usability` int(11) NOT NULL,
  `Met_needs` text NOT NULL,
  `Improvements` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `survey_responses`
--

INSERT INTO `survey_responses` (`id`, `Design`, `Navigation`, `Usability`, `Met_needs`, `Improvements`) VALUES
(1, 5, 2, 3, 'Very', 'testing');

-- --------------------------------------------------------

--
-- Table structure for table `uploadcontent`
--

CREATE TABLE `uploadcontent` (
  `contentID` int(11) NOT NULL,
  `typeOfContent` varchar(50) NOT NULL,
  `categoryOfContent` varchar(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(3000) NOT NULL,
  `content` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `uploadcontent`
--

INSERT INTO `uploadcontent` (`contentID`, `typeOfContent`, `categoryOfContent`, `title`, `description`, `content`) VALUES
(38, 'Image', 'Dietary Choice', 'How to enhance sustainability\r\n', 'Small changes in our daily routines can have significant benefits. Plus, we can always support enhancing sustainability on larger scales, such as carbon removal through tree planting offset programs. There is a lot to choose from like the One Month carbon offset which will allow you to make a great difference in just one month. Determine your total emissions using an ecological footprint counter first, and then choose one of the best carbon offset providers to remove your carbon emissions. By making earth-friendly choices and encouraging others to do so, you can make a huge difference in the planet’s health, from the climate and habitats for animals, to the conservation of natural resources… making the ‘real’ distinction between carbon footprints vs ecological footprints, just how low you can get yours.', '85934chart-differences-carbon-footprint-ecological-footprint.png'),
(40, 'Image', 'Energy Consumption', 'How To Reduce Carbon Foot Print\r\n', 'Get your heat & electricity from “green” suppliers.\r\nEnergy industries across Europe have the highest carbon footprint compared to all other sectors. The one change you can make to offset your carbon emissions is to switch to green suppliers that use renewable sources to produce it. Choosing such suppliers will allow them to become more competitive in the market and lead to reduced prices.\r\nHere is How to Switch to a Green Energy Supplier →.\r\n\r\nBuy efficient appliances with high-energy labels.\r\nEnergy labelling of electronic appliances is pretty standardised in Europe. It goes from A (very efficient) to G (least efficient). While shopping for appliances, always check the label as an appliance with label A will be environmentally friendly because it uses less electrical input to operate. \r\n\r\nLearn about How to Shop Green Home Appliances →, check our manual entry on', '89398transport-carbon-footprint.jpg'),
(44, 'Image', 'Environmental Issue', 'Carbon Footprint of Tourism', 'Tourism is responsible for roughly 8% of the world’s carbon emissions. From plane flights and boat rides to souvenirs and lodging, various activities contribute to tourism’s carbon footprint. The majority of this footprint is emitted by visitors from high-income countries, with U.S. travelers at the top of the list. As the number of people who can afford to travel grows, so will tourism’s environmental footprint.\r\n\r\nKeep reading to learn about some of the different ways that travel produces CO2. ', '28694Carbon-Footprint-Tourism-Chart-STI-Web-2.png'),
(58, 'Video', 'Environmental Issue', 'Explanation on carbon footprint', 'You\'ve probably been hearing a lot about climate change and how you should reduce your carbon footprint. But what\'s that exactly? Just like an actual footprint, it\'s a mark you leave upon the environment. No, not with your shoes but with every action that releases \"Carbons\". Those are the harmful gases, such as Co2, which are pumped out by burning fossil fuels, like oil or gas.', '78595simpleshow explains the Carbon Footprint.mp4'),
(63, 'Image', 'Energy Consumption', 'How can we reduce the carbon footprint in the logistics area of our company?', 'One of the great environmental challenges that we must urgently face, if we want to live on a habitable planet, is to find a solution, as soon as possible, to the global warming of the Earth.\r\n\r\nA serious problem caused, among other factors, by the emission of polluting gases that impact the atmosphere and cause the so-called greenhouse effect or carbon footprint that we are all leaving behind.\r\n\r\nWhat logistics solutions should we adopt to reduce environmental damage? Naeco recommends what actions to take to achieve this.\r\n\r\nWhat do we mean when we talk about carbon footprint and how is it calculated?\r\nThe carbon footprint is known as the totality of greenhouse gases (GHG) emitted through direct or indirect actions, generated both by people and organizations, as well as by events and products. But do we know how to calculate the CO2 we generate?\r\n\r\nTo calculate the carbon footprint that your organization generates, it is necessary to know exactly the levels of pollution or greenhouse effect emissions (GHG) that we produce every day. This requires collecting data on the carbon footprint that we leave directly and indirectly through our business activities, electricity consumption, use of packaging, materials, transportation, waste management, etc.\r\n\r\nThe carbon footprint is measured in tons of CO2 equivalent and is calculated by multiplying the activity data by emission factors. The result we obtain will help us to reduce greenhouse emissions, identify potential savings, meet environmental requirements required by law, introduce improvements that minimize our CO2 footprint and incidentally, significantly improve our social reputation.\r\n\r\n', '133411613664530.jpg'),
(65, 'Image', 'Dietary Choice', 'Carbon Footprint Emittion', 'Changing the foods you eat can have a big impact on your carbon footprint. Many of these changes will also be beneficial for your health! For example, shifting to a vegetarian meal one day a week for one year could save the equivalent of driving 1,160 miles.  (4)\r\n\r\nBut you don’t have to be fully vegetarian or vegan to make an impact. By switching to less carbon-intensive animal sources (such as fish and chicken) you will go a long way to reducing your footprint. For example, replacing all beef consumption with chicken for one year would save the equivalent of driving 993 miles. (5)', '14188Carbon-Footprint-Scrorecard.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cal_carbonfootprint3`
--
ALTER TABLE `cal_carbonfootprint3`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carbon_footprint_categories`
--
ALTER TABLE `carbon_footprint_categories`
  ADD PRIMARY KEY (`footprint_id`,`category_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`email`) USING BTREE;

--
-- Indexes for table `recycling_categories`
--
ALTER TABLE `recycling_categories`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `category_name` (`category_name`);

--
-- Indexes for table `survey_responses`
--
ALTER TABLE `survey_responses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uploadcontent`
--
ALTER TABLE `uploadcontent`
  ADD PRIMARY KEY (`contentID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cal_carbonfootprint3`
--
ALTER TABLE `cal_carbonfootprint3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `recycling_categories`
--
ALTER TABLE `recycling_categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `survey_responses`
--
ALTER TABLE `survey_responses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `uploadcontent`
--
ALTER TABLE `uploadcontent`
  MODIFY `contentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carbon_footprint_categories`
--
ALTER TABLE `carbon_footprint_categories`
  ADD CONSTRAINT `carbon_footprint_categories_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `recycling_categories` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
