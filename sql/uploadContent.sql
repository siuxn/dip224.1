-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 01, 2024 at 03:09 PM
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
-- Database: `assignment`
--

-- --------------------------------------------------------

--
-- Table structure for table `uploadContent`
--

CREATE TABLE `uploadContent` (
  `contentID` int(11) NOT NULL,
  `typeOfContent` varchar(50) NOT NULL,
  `categoryOfContent` varchar(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(3000) NOT NULL,
  `content` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `uploadContent`
--

INSERT INTO `uploadContent` (`contentID`, `typeOfContent`, `categoryOfContent`, `title`, `description`, `content`) VALUES
(38, 'Image', 'Dietary Choice', 'How to enhance sustainability\r\n', 'Small changes in our daily routines can have significant benefits. Plus, we can always support enhancing sustainability on larger scales, such as carbon removal through tree planting offset programs. There is a lot to choose from like the One Month carbon offset which will allow you to make a great difference in just one month. Determine your total emissions using an ecological footprint counter first, and then choose one of the best carbon offset providers to remove your carbon emissions. By making earth-friendly choices and encouraging others to do so, you can make a huge difference in the planet’s health, from the climate and habitats for animals, to the conservation of natural resources… making the ‘real’ distinction between carbon footprints vs ecological footprints, just how low you can get yours.', '85934chart-differences-carbon-footprint-ecological-footprint.png'),
(40, 'Image', 'Energy Consumption', 'How To Reduce Carbon Foot Print\r\n', 'Get your heat & electricity from “green” suppliers.\r\nEnergy industries across Europe have the highest carbon footprint compared to all other sectors. The one change you can make to offset your carbon emissions is to switch to green suppliers that use renewable sources to produce it. Choosing such suppliers will allow them to become more competitive in the market and lead to reduced prices.\r\nHere is How to Switch to a Green Energy Supplier →.\r\n\r\nBuy efficient appliances with high-energy labels.\r\nEnergy labelling of electronic appliances is pretty standardised in Europe. It goes from A (very efficient) to G (least efficient). While shopping for appliances, always check the label as an appliance with label A will be environmentally friendly because it uses less electrical input to operate. \r\n\r\nLearn about How to Shop Green Home Appliances →, check our manual entry on', '89398transport-carbon-footprint.jpg'),
(44, 'Image', 'Environmental Issue', 'Carbon Footprint of Tourism', 'Tourism is responsible for roughly 8% of the world’s carbon emissions. From plane flights and boat rides to souvenirs and lodging, various activities contribute to tourism’s carbon footprint. The majority of this footprint is emitted by visitors from high-income countries, with U.S. travelers at the top of the list. As the number of people who can afford to travel grows, so will tourism’s environmental footprint.\r\n\r\nKeep reading to learn about some of the different ways that travel produces CO2. ', '28694Carbon-Footprint-Tourism-Chart-STI-Web-2.png'),
(58, 'Video', 'Environmental Issue', 'Explanation on carbon footprint', 'You\'ve probably been hearing a lot about climate change and how you should reduce your carbon footprint. But what\'s that exactly? Just like an actual footprint, it\'s a mark you leave upon the environment. No, not with your shoes but with every action that releases \"Carbons\". Those are the harmful gases, such as Co2, which are pumped out by burning fossil fuels, like oil or gas.', '78595simpleshow explains the Carbon Footprint.mp4'),
(62, 'Image', 'Environmental Issue', 'What is a carbon footprint?', 'A carbon footprint is the total amount of greenhouse gases (including carbon dioxide and methane) that are generated by our actions.\r\n\r\nThe average carbon footprint for a person in the United States is 16 tons, one of the highest rates in the world. Globally, the average carbon footprint is closer to 4 tons. ', '97966Top-10-Tips-to-Reduce-Your-Carbon-Footprint-for-2022-and-beyond-Top-image.jpg'),
(63, 'Image', 'Energy Consumption', 'How can we reduce the carbon footprint in the logistics area of our company?', 'One of the great environmental challenges that we must urgently face, if we want to live on a habitable planet, is to find a solution, as soon as possible, to the global warming of the Earth.\r\n\r\nA serious problem caused, among other factors, by the emission of polluting gases that impact the atmosphere and cause the so-called greenhouse effect or carbon footprint that we are all leaving behind.\r\n\r\nWhat logistics solutions should we adopt to reduce environmental damage? Naeco recommends what actions to take to achieve this.\r\n\r\nWhat do we mean when we talk about carbon footprint and how is it calculated?\r\nThe carbon footprint is known as the totality of greenhouse gases (GHG) emitted through direct or indirect actions, generated both by people and organizations, as well as by events and products. But do we know how to calculate the CO2 we generate?\r\n\r\nTo calculate the carbon footprint that your organization generates, it is necessary to know exactly the levels of pollution or greenhouse effect emissions (GHG) that we produce every day. This requires collecting data on the carbon footprint that we leave directly and indirectly through our business activities, electricity consumption, use of packaging, materials, transportation, waste management, etc.\r\n\r\nThe carbon footprint is measured in tons of CO2 equivalent and is calculated by multiplying the activity data by emission factors. The result we obtain will help us to reduce greenhouse emissions, identify potential savings, meet environmental requirements required by law, introduce improvements that minimize our CO2 footprint and incidentally, significantly improve our social reputation.\r\n\r\n', '133411613664530.jpg'),
(65, 'Image', 'Dietary Choice', 'Carbon Footprint Emittion', 'Changing the foods you eat can have a big impact on your carbon footprint. Many of these changes will also be beneficial for your health! For example, shifting to a vegetarian meal one day a week for one year could save the equivalent of driving 1,160 miles.  (4)\r\n\r\nBut you don’t have to be fully vegetarian or vegan to make an impact. By switching to less carbon-intensive animal sources (such as fish and chicken) you will go a long way to reducing your footprint. For example, replacing all beef consumption with chicken for one year would save the equivalent of driving 993 miles. (5)', '14188Carbon-Footprint-Scrorecard.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `uploadContent`
--
ALTER TABLE `uploadContent`
  ADD PRIMARY KEY (`contentID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `uploadContent`
--
ALTER TABLE `uploadContent`
  MODIFY `contentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
