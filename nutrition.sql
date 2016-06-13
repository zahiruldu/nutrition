-- phpMyAdmin SQL Dump
-- version 4.4.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 21, 2015 at 03:10 PM
-- Server version: 5.5.41
-- PHP Version: 5.6.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `nutrition`
--

-- --------------------------------------------------------

--
-- Table structure for table `foods`
--

CREATE TABLE IF NOT EXISTS `foods` (
  `food_id` int(11) NOT NULL,
  `food_name` varchar(255) DEFAULT NULL,
  `food_description` text,
  `food_category` int(11) DEFAULT NULL,
  `calories` float DEFAULT NULL,
  `protein` float DEFAULT NULL,
  `omega_fatty_acids` float DEFAULT NULL,
  `monosaturated_fat` float DEFAULT NULL,
  `polyunsaturated_fat` float DEFAULT NULL,
  `cholesterol` float DEFAULT NULL,
  `saturated_fat` float DEFAULT NULL,
  `total_fat` float DEFAULT NULL,
  `carbohydrates` float DEFAULT NULL,
  `sugars` float DEFAULT NULL,
  `fiber` float DEFAULT NULL,
  `water` float DEFAULT NULL,
  `calcium` float DEFAULT NULL,
  `copper` float DEFAULT NULL,
  `iodine` float DEFAULT NULL,
  `iron` float DEFAULT NULL,
  `magnesium` float DEFAULT NULL,
  `manganese` float DEFAULT NULL,
  `phosphorus` float DEFAULT NULL,
  `potassium` float DEFAULT NULL,
  `selenium` float DEFAULT NULL,
  `sodium` float DEFAULT NULL,
  `zinc` float DEFAULT NULL,
  `choline` float DEFAULT NULL,
  `vitamin_a_ui` float DEFAULT NULL,
  `vitamin_b1_thiamin` float DEFAULT NULL,
  `vitamin_b2_riboflavin` float DEFAULT NULL,
  `vitamin_b3_niacin` float DEFAULT NULL,
  `vitamin_b5_pantothenic_acid` float DEFAULT NULL,
  `vitamin_b6_pyridoxin` float DEFAULT NULL,
  `vitamin_b9_folate` float DEFAULT NULL,
  `vitamin_b12_cobalamin` float DEFAULT NULL,
  `vitamin_c` float DEFAULT NULL,
  `vitamin_d` float DEFAULT NULL,
  `vitamin_e` float DEFAULT NULL,
  `vitamin_k` float DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=119 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `foods`
--

INSERT INTO `foods` (`food_id`, `food_name`, `food_description`, `food_category`, `calories`, `protein`, `omega_fatty_acids`, `monosaturated_fat`, `polyunsaturated_fat`, `cholesterol`, `saturated_fat`, `total_fat`, `carbohydrates`, `sugars`, `fiber`, `water`, `calcium`, `copper`, `iodine`, `iron`, `magnesium`, `manganese`, `phosphorus`, `potassium`, `selenium`, `sodium`, `zinc`, `choline`, `vitamin_a_ui`, `vitamin_b1_thiamin`, `vitamin_b2_riboflavin`, `vitamin_b3_niacin`, `vitamin_b5_pantothenic_acid`, `vitamin_b6_pyridoxin`, `vitamin_b9_folate`, `vitamin_b12_cobalamin`, `vitamin_c`, `vitamin_d`, `vitamin_e`, `vitamin_k`, `created_at`) VALUES
(1, 'Beef', 'Meat item', 1, 142, 21, 20, 2.5, 0.2, 43, 1.7, 6, 0, 0, 0, 72.4, 23, 0.1, 8, 1.5, 22, 0, 198, 333, 26, 54, 3.8, 86, 0, 0.1, 0.1, 6.6, 0.6, 0.6, 13, 1, 0, 0, 0.3, 1.2, NULL),
(2, 'Venison', 'Meat item', 1, 187, 26, 94, 1.9, 0.4, 98, 4, 8, 0, 0, 0, 64.2, 14, 0.1, 0, 3.3, 24, 0, 228, 364, 10.5, 78, 5.2, 102, 0, 0.5, 0.3, 9.3, 0.8, 0.5, 0, 2.3, 0, 0, 0.7, 1.4, NULL),
(3, 'Kangaroo, loin', 'Meat item', 1, 88, 21, 50, 0.26, 0.3, 65, 0.3, 1, 0, 0, 0, 75.4, 3, 0.17, 0, 3.4, 26, 0, 220, 350, 20, 40, 2.3, 0, 0, 0.22, 0.41, 4.2, 0.55, 0.86, 0, 1.9, 0, 0, 1.5, 0, NULL),
(4, 'Kangaroo, rump', 'Meat item', 1, 89, 20.3, 200, 0.22, 0.2, 57, 0.2, 0.8, 0, 0, 0, 75.5, 3, 0.14, 0, 2.3, 24, 0, 220, 320, 20, 47, 2.3, 0, 0, 0.18, 0.44, 3.5, 0.52, 0.78, 0, 2, 0, 0, 1.6, 0, NULL),
(5, 'Rabbit', 'Meat item', 1, 173, 33, 140, 0.9, 0.7, 123, 1.1, 3.5, 0, 0, 0, 61.4, 18, 0.2, 0, 4.9, 31, 0, 240, 343, 15.2, 45, 2.4, 130, 0, 0, 0.1, 6.4, 0, 0.3, 8, 6.5, 0, 0, 0.4, 1.5, NULL),
(6, 'Lamb', 'Meat item', 1, 220, 31, 120, 1.8, 1.3, 501, 3, 9, 0, 0, 0, 56.7, 8, 7.1, 4, 8.3, 22, 0.5, 420, 221, 111, 56, 7.9, 0, 24943, 0.1, 0.1, 11.2, 0.8, 0.5, 4, 0.4, 1.2, 0, 0, 0, NULL),
(7, 'Chicken, breast ', 'Meat item', 1, 110, 23, 40, 0.3, 0.3, 58, 0.3, 1.2, 0, 0, 0, 74.8, 11, 0, 6, 0.7, 28, 0, 196, 255, 17.8, 65, 0.8, 73.4, 21, 0.1, 0.1, 11.2, 0.8, 0.5, 4, 0.4, 1.2, 0, 0.1, 0.2, NULL),
(8, 'Chicken, whole', 'Meat item', 1, 293, 28, 250, 4.8, 3, 90, 3.6, 13.2, 0, 0, 0, 58.7, 24, 0.1, 8, 1.4, 22, 0, 165, 237, 17.3, 96, 2.7, 0, 95, 0.1, 0.2, 7.1, 1.1, 0.3, 7, 0.3, 0, 0, 0.3, 2.4, NULL),
(9, 'Duck, whole', 'Meat item', 1, 337, 19, 390, 12.9, 3.7, 84, 9.7, 28, 0, 0, 0, 139, 11, 0.23, 1, 2.7, 16, 0.02, 156, 204, 0.02, 59, 1.9, 31, 168, 0.2, 0.2, 3.9, 1, 0.2, 13, 0.3, 2.8, 0, 0.7, 5.5, NULL),
(10, 'Duck, breast ', 'Meat item', 1, 123, 20, 70, 1.2, 0.6, 77, 1.3, 4.3, 0, 0, 0, 0, 3, 0.3, 0, 4.5, 22, 0, 186, 268, 13.9, 57, 0.7, 0, 53, 0.4, 0.3, 3.4, 0.8, 0.6, 25, 0.8, 0, 0, 0, 0, NULL),
(11, 'Turkey, whole', 'Meat item', 1, 157, 30, 70, 0.6, 0.9, 69, 1, 3, 0, 0, 0, 1.1, 19, 0, 6, 1.3, 28, 0, 219, 305, 32.1, 64, 2, 83.4, 0, 0.1, 0.1, 6.8, 0.7, 0.5, 6, 0.4, 0, 0, 0.1, 0, NULL),
(12, 'Turkey, breast ', 'Meat item', 1, 104, 17, 25, 0.5, 0.3, 43, 0.3, 1.7, 4, 4, 0, 0, 8, 0.1, 0, 1.4, 21, 0, 162, 302, 22.8, 0, 1.3, 66.4, 33, 0.1, 0.3, 0.1, 0.2, 0.1, 4, 0.1, 5.7, 0, 0.1, 0, NULL),
(13, 'Egg, Chicken', 'Meat item', 9, 143, 13, 74, 3.8, 1.4, 423, 3, 10, 0, 0, 0, 75.8, 53, 0.1, 49, 1.8, 12, 0, 191, 134, 31.7, 140, 1.1, 251, 487, 0.1, 0.5, 0.1, 1.4, 0.1, 47, 1.3, 0, 35, 1, 0.3, NULL),
(14, 'Egg, Turkey', 'Meat item', 9, 171, 14, 79, 4.6, 1.7, 933, 4, 12, 1, 0, 0, 72.5, 99, 0.1, 0, 4.1, 13, 0, 170, 142, 34.3, 151, 1.6, 0, 554, 0.1, 0.5, 0, 1.9, 0.1, 71, 1.7, 0, 0, 0, 0, NULL),
(15, 'Egg, Duck', 'Meat item', 9, 185, 13, 102, 6.5, 1.2, 146, 4, 14, 1, 1, 0, 70.8, 64, 0.1, 0, 3.8, 17, 0, 220, 222, 36.4, 146, 1.4, 263, 674, 0.2, 0.4, 0.2, 1.9, 0.3, 80, 5.4, 0, 0, 1.3, 0.4, NULL),
(16, 'Sardines', 'Meat item', 1, 208, 25, 1480, 3.9, 5.1, 142, 2, 11, 0, 0, 0, 59.6, 382, 0.2, 36, 2.9, 39, 0.1, 490, 387, 52.7, 505, 1.3, 85, 108, 0.1, 0.2, 5.2, 0.6, 0.2, 12, 8.9, 0, 272, 2, 2.6, NULL),
(17, 'Oyster', 'Meat item', 1, 68, 7, 672, 0.3, 1, 53, 1, 2, 4, 0, 0, 85.2, 45, 4.5, 60, 6.7, 47, 0.4, 135, 156, 63.7, 211, 90.8, 65, 100, 0.1, 0.1, 1.4, 0.2, 0.1, 10, 19.5, 3.7, 320, 0.9, 0.1, NULL),
(18, 'Organic Yogurt, plain ', 'Dairy Item', 2, 61, 3, 27, 0.9, 0.1, 13, 2, 3, 5, 5, 0, 87.9, 121, 0, 14, 0.1, 12, 0, 95, 155, 2.2, 46, 0.6, 15.2, 99, 0, 0.1, 0.1, 0.4, 0, 7, 0.4, 0.5, 0, 0.1, 0.2, NULL),
(19, 'Organic Cheese, goat ', 'Dairy Item', 2, 452, 31, 0, 8.1, 0.8, 105, 25, 36, 2, 2, 0, 29, 895, 0.6, 35, 1.9, 54, 0.3, 729, 48, 5.5, 346, 1.6, 15.4, 1745, 0.1, 1.2, 2.4, 0.4, 0.1, 4, 0.1, 0, 0, 0.3, 3, NULL),
(20, 'Organic Cheese, feta', 'Dairy Item', 2, 264, 14, 265, 4.6, 0.6, 89, 15, 21, 4, 4, 0, 55.2, 493, 0, 14, 0.7, 19, 0, 337, 62, 15, 1116, 2.9, 15.4, 422, 0.2, 0.08, 1, 1, 0.4, 32, 1.7, 0, 0, 0.2, 1.8, NULL),
(21, 'Organic Cheese, ricotta ', 'Dairy Item', 2, 174, 11, 112, 3.6, 0.4, 51, 8, 13, 3, 0, 0, 71.7, 207, 0, 14, 0.4, 11, 0, 158, 105, 14.5, 84, 1.2, 17.5, 445, 0, 0.2, 0.1, 0.2, 0, 12, 0.3, 0, 0, 0.1, 1.1, NULL),
(22, 'Cottage Cheese, organic', 'Dairy Item', 2, 98, 11, 17, 0.8, 0.1, 17, 2, 4, 3, 3, 0, 79.8, 83, 0, 14, 0.1, 8, 0, 159, 104, 9.7, 364, 0.4, 18.4, 140, 0, 0.2, 0.1, 0.6, 0, 12, 0.4, 0, 0, 0.1, 0, NULL),
(23, 'Kefir', 'Dairy Item', 2, 68, 3, 75, 0.8, 0.2, 13, 2, 3, 6.5, 5, 0, 0, 0, 0, 10, 0, 10, 0, 91, 143, 3.7, 40, 0.4, 14.3, 102, 0, 0.2, 0.1, 0.4, 0, 5, 0.4, 0, 40, 0.1, 0.2, NULL),
(24, 'Milk, raw', 'Dairy Item', 2, 60, 3, 75, 0.8, 0.2, 10, 1.9, 3.3, 5.3, 5.3, 0, 88.3, 113, 0, 10, 0, 10, 0, 91, 143, 3.7, 40, 0.4, 14.3, 102, 0, 0.2, 0.1, 0.4, 0, 5, 0.4, 0, 40, 0.1, 0.2, NULL),
(25, 'Butter, organic unsalted', 'Dairy Item', 2, 725, 1.1, 96.325, 19.89, 1.8, 146, 53.8, 81.5, 0, 0, 0, 15.2, 17, 0.005, 6.8, 0, 2, 0, 17, 23, 2, 10, 0.04, 18.8, 932, 0, 0, 0, 0.1, 0, 6, 0.2, 0, 0, 8.95, 7, NULL),
(26, 'Ghee, organic unsalted', 'Dairy Item', 2, 883.96, 0.3, 0, 27.28, 2, 290, 65, 99.9, 0, 0, 0, 0, 4, 0.001, 0, 0, 0, 0, 3, 5, 0, 2, 0.01, 0, 1060, 0.001, 0.005, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL),
(27, 'Almonds, toasted', 'Nuts item', 3, 597, 19.5, 6, 35.87, 12.8, 0, 3.7, 52.37, 4.8, 4.8, 8.8, 3.7, 250, 1.097, 0, 3.9, 260, 2.5, 480, 740, 3.2, 5, 3.69, 52.1, 11, 0.19, 1.4, 3.9, 0.38, 0.13, 29, 0, 0, 0, 28.14, 0, NULL),
(28, 'Almond butter', 'Nuts item', 3, 597, 19.5, 6, 35.87, 12.8, 0, 3.7, 52.37, 4.8, 4.8, 8.8, 3.7, 250, 1.097, 0, 3.9, 260, 2.5, 480, 740, 3.2, 5, 3.69, 52.1, 11, 0.19, 1.4, 3.9, 0.38, 0.13, 29, 0, 0, 0, 28.14, 0, NULL),
(29, 'Macadamia nuts, toasted', 'Nuts item', 3, 732, 7.6, 0, 61.41, 0.9, 0, 10.3, 75.31, 4.5, 4.5, 6, 1.6, 48, 0.36, 0, 1.8, 95, 5.1, 200, 330, 10, 3, 1.2, 44.6, 0, 0.28, 0.28, 0.1, 0.4, 0.28, 11, 0, 1, 0, 9.5, 0, NULL),
(30, 'Brazil nuts, toasted', 'Nuts item', 3, 689, 14.4, 0, 21.81, 29, 0, 14.8, 65.61, 2.4, 2.4, 8.5, 2.4, 150, 2, 0, 2.2, 350, 0.85, 660, 560, 920, 2, 4.1, 0, 2, 0.6, 0.43, 0.6, 0.13, 0.27, 22, 0, 0, 0, 8.45, 0, NULL),
(31, 'Pumpkin seeds, toasted', 'Nuts item', 3, 577, 24.4, 0, 14.12, 20.8, 0, 8.4, 43.32, 13.7, 13.7, 10.2, 6.9, 43, 1.4, 0, 14.9, 535, 3, 1174, 820, 5.6, 20, 7.46, 63, 38, 0.21, 0.32, 1.7, 0.3, 0.1, 58, 0, 2, 0, 2.6, 47.2, NULL),
(32, 'Sesame seeds', 'Nuts item', 3, 573, 18, 376, 18.8, 21.8, 0, 7, 49.7, 23.4, 0.3, 11.8, 4.7, 975, 4.1, 0, 14.5, 351, 2.5, 629, 468, 5.7, 11, 7.8, 25.6, 9, 0.8, 0.2, 4.5, 0.1, 0.8, 97, 0, 0, 0, 0.3, 0, NULL),
(33, 'Walnuts, toasted', 'Nuts item', 3, 693, 14.4, 0, 12.11, 49.6, 0, 4.4, 66.11, 3, 2.7, 6.4, 3, 89, 1.4, 0, 2.5, 150, 3.2, 370, 440, 2, 3, 2.53, 39.2, 9, 0.33, 0.18, 1.4, 0.66, 0.43, 70, 0, 0, 0, 19.94, 0, NULL),
(34, 'Hazelnuts, toasted', 'Nuts item', 3, 642, 14.8, 0, 48.78, 7.2, 0, 2.7, 58.68, 5.1, 4.4, 10.4, 4.6, 86, 1.5, 0, 3.2, 160, 3.5, 310, 680, 1, 3, 2.2, 45.6, 7, 0.39, 0.17, 2.2, 1, 0.56, 113, 0, 0, 0, 0, 0, NULL),
(35, 'Peanuts, toasted', 'Nuts item', 3, 567, 24.7, 0, 23.05, 14.9, 0, 7.1, 45.05, 8.9, 5.1, 8.2, 4.8, 54, 0.81, 0, 2.3, 160, 1.7, 370, 540, 12, 1, 3, 55.3, 0, 0.79, 0.12, 15, 3.6, 0.65, 240, 0, 0, 0, 16, 14.2, NULL),
(36, 'Peanut butter, organic', 'Nuts item', 3, 629, 24.3, 0, 37.66, 4.5, 0, 9.4, 51.56, 9.7, 5.5, 6.5, 2, 55, 0.533, 16, 1.77, 165, 1.567, 343, 608, 14.8, 25, 2.77, 0, 0, 0.105, 0.12, 12.4, 0.8, 0.12, 155, 0, 6, 0, 0.1, 0.5, NULL),
(37, 'Alfalfa, cooked ', 'Legumes item', 4, 22, 3.2, 0, 0, 0, 0, 0, 0.1, 0.5, 0.5, 2.2, 93.9, 19, 0.125, 0, 0.78, 21, 0.18, 65, 58, 4.8, 39, 0.5, 8, 155, 0.09, 0.09, 0.3, 0.37, 0, 120, 0, 36, 0, 2, 30.5, NULL),
(38, 'Beans, Black cooked', 'Legumes item', 4, 132, 9, 105, 0, 0.2, 0, 0, 0.5, 24, 0, 9, 65.7, 27, 0.2, 0, 2.1, 70, 0.4, 140, 355, 1.2, 1, 1.1, 0, 6, 0.2, 0.1, 0.5, 0.2, 0.1, 149, 0, 0, 0, 0, 0, NULL),
(39, 'Beans, kidney cooked', 'Legumes item', 4, 87, 7.9, 0, 0.04, 0.3, 0, 0.1, 0.5, 9.1, 0.6, 7.2, 71.1, 34, 0.31, 0, 1.7, 38, 0.36, 130, 290, 0, 8, 1, 3.4, 0, 0.07, 0, 0.4, 0.05, 0.07, 130, 0, 0, 0, 0.1, 0.9, NULL),
(40, 'Beans, Pinto cooked', 'Legumes item', 4, 143, 9, 137, 0.1, 0.2, 0, 0.1, 0.7, 26, 0.3, 9, 63, 46, 0.2, 0, 2.1, 50, 0.5, 147, 436, 6.2, 1, 1, 35.3, 0, 0.2, 0.1, 0.3, 0.2, 0.2, 172, 0, 0.8, 0, 0.9, 3.5, NULL),
(41, 'Cashews, toasted', 'Legumes item', 4, 582, 17, 7.5, 31.14, 7.5, 0, 8.4, 45.04, 16.8, 5.5, 5.9, 3.5, 34, 1.9, 0, 5, 250, 1.4, 530, 550, 33, 11, 5.5, 61, 0, 0.64, 0.19, 1.8, 1.9, 0.35, 25, 0, 0, 0, 5.3, 0, NULL),
(42, 'Chickpeas, cooked', 'Legumes item', 4, 107, 6.3, 43, 0.49, 1, 0, 0.2, 2.1, 13.3, 0.6, 4.7, 67.6, 45, 31, 0, 1.8, 27, 0.76, 86, 140, 6, 7, 1, 42.8, 10, 0, 0, 1.55, 0.07, 0.14, 63, 0, 1.3, 0, 1.87, 4, NULL),
(43, 'Lentils, cooked', 'Legumes item', 4, 77, 6.8, 37, 0.07, 0.2, 0, 0.1, 0.4, 9.5, 0.5, 3.7, 73.8, 17, 0.28, 0, 2, 25, 0.33, 91, 220, 6, 8, 0.9, 32.7, 2, 0.08, 0.06, 1.53, 0.25, 0.15, 20, 0, 1.5, 0, 0.14, 1.7, NULL),
(44, 'Peas, cooked', 'Legumes item', 4, 42, 3, 15, 0, 0.1, 0, 0, 0.2, 7, 4, 2.8, 88.9, 42, 0.1, 0, 2, 26, 0.2, 55, 240, 0.7, 4, 0.4, 17.4, 1030, 0.1, 0.1, 0.5, 0.7, 0.1, 29, 0, 47.9, 0, 0.4, 25, NULL),
(45, 'Coconut oil, organic unrefined', 'Oil item', 5, 862, 0, 0, 5.8, 1.8, 0, 86.5, 100, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL),
(46, 'Cod liver oil', 'Oil item', 5, 902, 0, 19736, 46.7, 22.5, 570, 22.6, 100, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 100014, 0, 0, 0, 0, 0, 0, 0, 0, 10001, 0, 0, NULL),
(47, 'Olive oil, pure extra virgin', 'Oil item', 5, 812, 0, 0, 65.44, 8, 0, 14.1, 91.9, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1.1, 0, 0, 0, 0.01, 0, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL),
(48, 'Fish oil, general', 'Oil item', 5, 902, 0, 24093, 33.8, 31.9, 710, 29.9, 100, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 332, 0, 0, NULL),
(49, 'Flaxseed oil, cold pressed', 'Oil item', 5, 884, 0, 53304, 20.2, 66, 0, 9.4, 100, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 17.5, 0, NULL),
(50, 'Hempseed oil, cold pressed', 'Oil item', 5, 840, 0, 16500, 10.7, 68.6, 0, 7.83, 87, 0, 0, 0, 0.1, 0, 0, 110, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.15, 0, NULL),
(51, 'Amaranth, cooked', 'whole grain items', 6, 102, 0, 0, 0, 0, 0, 0, 1.6, 18.7, 0, 2.1, 75.2, 47, 0.1, 0, 2.1, 65, 0.9, 148, 135, 5.5, 6, 0.9, 0, 0, 0, 0, 0.2, 0, 0.1, 22, 0, 0, 0, 0.2, 0, NULL),
(52, 'Barley, cooked', 'whole grain items', 6, 99, 2.9, 33, 0.1, 0.4, 0, 0.4, 0.9, 18, 0, 3.5, 71.7, 11, 0.4, 0, 1, 28, 0.2, 76, 68, 0, 11, 0.4, 21, 11, 0.22, 0, 1.5, 0.03, 0.03, 3, 0, 0, 0, 0.08, 1.3, NULL),
(53, 'Brown rice, cooked', 'whole grain items', 6, 152, 2.9, 13, 0.33, 0.3, 0, 0.2, 1, 31.8, 0.3, 1.5, 63.5, 5, 0.2, 0, 0.5, 49, 1.7, 130, 75, 0, 3, 0.9, 0, 0, 0.14, 0.02, 1.7, 0.28, 0.17, 16, 0, 0, 0, 0.82, 0, NULL),
(54, 'Buckwheat, cooked', 'whole grain items', 6, 92, 3, 14, 0.2, 0.2, 0, 0.1, 0.6, 19.9, 0.9, 2.7, 75.6, 7, 0.1, 0, 0.8, 51, 0.4, 70, 88, 2.2, 4, 0.6, 20.1, 0, 0, 0, 0.9, 0.4, 0.1, 14, 0, 0, 0, 0.1, 1.9, NULL),
(55, 'Corn, cooked', 'whole grain items', 6, 93, 3, 18, 0.22, 0.4, 0, 0.1, 1, 16.8, 3.5, 2.7, 74.2, 2, 0.55, 0, 0.5, 18, 0.11, 71, 121, 0, 0, 0.6, 29.1, 20, 0, 0.03, 1.2, 0.9, 0.1, 31, 0, 3, 0, 0.1, 0.4, NULL),
(56, 'Millet, cooked', 'whole grain items', 6, 116, 3.5, 28, 0.2, 0.5, 0, 0.2, 1, 22.5, 0.1, 1.2, 71.4, 3, 0.2, 0, 0.63, 44, 0.3, 100, 62, 0.9, 2, 0.91, 11.2, 3, 0.11, 0.08, 1.33, 0.2, 0.1, 19, 0, 0, 0, 0.02, 0.3, NULL),
(57, 'Oats, rolled, cooked', 'whole grain items', 6, 65, 2, 18, 0.57, 0.5, 0, 0.2, 1.4, 10.2, 0, 1.7, 83, 9, 0.102, 1, 0.9, 24, 1.214, 80, 53, 1.5, 1, 0.42, 7.4, 3, 0.103, 0.026, 0, 0.06, 0.01, 6, 0, 0, 0, 0.1, 0.3, NULL),
(58, 'Quinoa, cooked', 'whole grain items', 6, 120, 4, 0, 0, 0, 0, 0, 2, 21.3, 0, 2.8, 71.6, 17, 0.2, 0, 1.5, 64, 0.6, 152, 172, 2.8, 7, 1.1, 0, 1, 0.1, 0.1, 0.4, 0, 0.1, 42, 0, 0, 0, 0.6, 0, NULL),
(59, 'Rye bread, cooked', 'whole grain items', 6, 252, 9, 60, 0.68, 1, 0, 0.5, 2.4, 45.6, 2.2, 5.2, 37.2, 51, 0.215, 48, 1.67, 37, 1.045, 115, 143, 10, 0, 1, 14.6, 2, 0.219, 0.054, 1.04, 0.23, 0.08, 51, 0, 0, 0, 0.21, 1.2, NULL),
(60, 'Spelt, cooked', 'whole grain items', 6, 127, 5, 0, 0, 0, 0, 0, 0.9, 26.4, 0, 3.9, 66.6, 10, 0.2, 0, 1.7, 49, 1.1, 150, 143, 4, 5, 1.3, 0, 1, 0.1, 0, 2.6, 0, 0.1, 13, 0, 0, 0, 0.3, 0, NULL),
(61, 'Apple', 'fruit item', 7, 49, 0.3, 9, 0, 0, 0, 0, 0, 10.7, 10.5, 2.3, 84.8, 5, 0.021, 25.7, 0.16, 4, 0.048, 9, 115, 0, 2, 0.08, 3.4, 6, 0.031, 0.01, 0.1, 0, 0.06, 0, 0, 5, 0, 0.21, 2.2, NULL),
(62, 'Apricot', 'fruit item', 7, 49, 0.3, 0, 0, 0, 0, 0, 0, 11.1, 10.8, 2.5, 85, 3, 0.029, 0, 0.17, 4, 0, 8, 90, 0, 2, 0.07, 2.8, 18, 0.02, 0.01, 0.1, 0.2, 0.04, 0, 0, 5, 0, 1.27, 3.3, NULL),
(63, 'Banana ', 'fruit item', 7, 113, 1.5, 27, 0, 0, 0, 0, 0.1, 25, 18.3, 3.7, 68.8, 10, 0, 0, 0.4, 38, 0, 0, 322, 0, 2, 0.2, 9.8, 64, 0.04, 0.07, 0.4, 0.3, 0.4, 20, 0, 19, 0, 0.1, 0.5, NULL),
(64, 'Blackberry', 'fruit item', 7, 50, 1.4, 94, 0, 0, 0, 0, 0.3, 7.5, 7.5, 6.1, 84.2, 30, 0.16, 0, 0.42, 30, 0.55, 29, 114, 2, 0, 0.24, 8.5, 373, 0.02, 0.03, 0.3, 0.35, 0, 36, 0, 38, 0, 1.4, 19.8, NULL),
(65, 'Blueberry', 'fruit item', 7, 52, 0.6, 58, 0, 0, 0, 0, 0.1, 11.3, 10.8, 1.8, 87.3, 4, 0.24, 0, 0, 4, 0.04, 9, 66, 0, 0, 0.07, 6, 119, 0.02, 0.06, 0, 0.1, 0.1, 5, 0, 13, 0, 0.47, 19.3, NULL),
(66, 'Cherry', 'fruit item', 7, 59, 0.8, 26, 0, 0, 0, 0, 0.2, 12.9, 10.9, 1.5, 82.8, 22, 0, 0, 0.28, 8, 0, 21, 230, 0, 0, 0.1, 6.1, 64, 0.033, 0.025, 0.5, 0.2, 0, 5, 0, 19, 0, 0.1, 2.1, NULL),
(67, 'Date', 'fruit item', 7, 289, 2, 0, 0, 0, 0, 0, 0.2, 67.2, 65.9, 9.7, 16, 47, 0.19, 0, 2.6, 50, 0.47, 58, 730, 0, 14, 0.6, 9.9, 19, 0, 0.1, 1.4, 0.8, 0.2, 15, 0, 5, 0, 0, 2.7, NULL),
(68, 'Fig', 'fruit item', 7, 46, 1.4, 0, 0, 0, 0, 0, 0.3, 8.1, 8.1, 3.3, 85.9, 38, 0, 0, 0.3, 9, 0, 14, 180, 0, 0, 0.3, 4.7, 142, 0.02, 0.03, 0.4, 0.3, 0.1, 6, 0, 3, 0, 0.1, 4.7, NULL),
(69, 'Grape', 'fruit item', 7, 76, 0.9, 11, 0, 0, 0, 0, 0.2, 16.3, 16.3, 3.5, 80.7, 10, 0.1, 0, 0.42, 8, 0.08, 19, 270, 0, 5, 0.22, 5.6, 66, 0.03, 0, 0.15, 0.1, 0.3, 2, 0, 10, 0, 0.5, 14.6, NULL),
(70, 'Honey', 'fruit item', 7, 450, 0.4, 0, 0, 0, 0, 0, 0.1, 117.4, 117.4, 0, 23.2, 11, 0, 0, 0.29, 4, 0.272, 4, 89, 0, 20, 3.72, 2.2, 0, 0, 0, 0, 0, 0.02, 0, 0, 0, 0, 0, 0, NULL),
(71, 'Kiwi', 'fruit item', 7, 52, 1.2, 42, 0, 0, 0, 0, 0.2, 9.1, 9.1, 3.8, 83.1, 28, 0.132, 0, 0.37, 15, 0.13, 28, 273, 1.3, 4, 0.14, 7.8, 87, 0.01, 0.03, 0.05, 0.2, 0.02, 26, 0, 71, 0, 1.1, 40.3, NULL),
(72, 'Mandarin', 'fruit item', 7, 45, 0.9, 18, 0, 0, 0, 0, 0.2, 9, 9, 1.4, 88.2, 31, 0.032, 0, 0.46, 15, 0.022, 16, 150, 0, 3, 0.12, 10.2, 61, 0.058, 0.023, 0.23, 0.2, 0.05, 0, 0, 58, 0, 0.2, 0, NULL),
(73, 'Mango', 'fruit item', 7, 54, 0.9, 37, 0, 0, 0, 0, 0.2, 11.6, 11.2, 1.5, 84.1, 7, 0.12, 0, 0.3, 8, 0.2, 14, 197, 0, 1, 0.18, 7.6, 366, 0.018, 0.037, 0.84, 0.11, 0, 14, 0, 26, 0, 1.3, 4.2, NULL),
(74, 'Maple Syrup', 'fruit item', 7, 305, 0, 0, 0, 0, 0, 0, 0.3, 79.2, 79.2, 0, 42.6, 89, 0.098, 0, 1.6, 19, 4.386, 3, 271, 0.8, 12, 5.59, 1.6, 0, 0.008, 0.013, 0.04, 0.05, 0, 0, 0, 0, 0, 0, 0, NULL),
(75, 'Melon, honey dew', 'fruit item', 7, 35, 0.7, 33, 0, 0, 0, 0, 0.3, 7.1, 7.1, 1, 89.8, 39, 0, 0, 0.3, 16, 0, 11, 160, 0, 44, 0.2, 7.6, 30, 0.02, 0.02, 0.2, 0.2, 0.1, 19, 0, 20, 0, 0, 2.9, NULL),
(76, 'Melon, water', 'fruit item', 7, 30, 0.4, 0, 0, 0, 0, 0, 0.3, 6.4, 6.4, 0.6, 90.6, 6, 0.035, 0.2, 0.42, 7, 0.036, 16, 123, 0, 2, 0.25, 4.1, 499, 0.019, 0.013, 0.19, 0.17, 0.04, 0, 0, 8, 0, 0, 0.1, NULL),
(77, 'Nectarine', 'fruit item', 7, 43, 1.2, 2, 0, 0, 0, 0, 0.1, 8.1, 8.1, 2.1, 87, 9, 0.073, 0, 0.14, 7, 0.092, 26, 242, 0, 0, 0.11, 6.2, 66, 0.02, 0.038, 1.21, 0.19, 0.02, 0, 0, 12, 0, 0.8, 2.2, NULL),
(78, 'Orange', 'fruit item', 7, 41, 1, 9, 0, 0, 0, 0, 0.1, 8, 8, 2.4, 86.7, 25, 0.06, 15, 0.37, 11, 0, 20, 147, 0, 3, 0.15, 8.4, 72, 0.083, 0.038, 0.2, 0.3, 0.03, 43, 0, 53, 0, 0.22, 0, NULL),
(79, 'Peach', 'fruit item', 7, 46, 1, 2, 0, 0, 0, 0, 0.1, 9, 8.5, 2.3, 85.7, 7, 0.067, 1.8, 0.3, 9, 0.041, 21, 241, 0, 2, 0.12, 6.1, 147, 0.006, 0.023, 1.01, 0.17, 0.02, 4, 0, 9, 0, 0.7, 2.6, NULL),
(80, 'Pineapple', 'fruit item', 7, 49, 0.5, 17, 0, 0, 0, 0, 0.1, 10.5, 10.5, 1.9, 85, 6, 0.06, 0, 0.35, 13, 0.49, 7, 130, 0, 4, 0.2, 5.5, 17, 0.05, 0.015, 0.1, 0.2, 0.1, 18, 0, 12, 0, 0, 0.7, NULL),
(81, 'Pomegranate', 'fruit item', 7, 78, 1.9, 0, 0, 0, 0, 0, 0.2, 13.5, 13.5, 6.4, 76.2, 14, 0, 0, 0.5, 9, 0, 0, 210, 0, 4, 0.4, 7.6, 40, 0.01, 0.02, 0.4, 0.4, 0.1, 38, 0, 14, 0, 0.6, 16.4, NULL),
(82, 'Prune', 'fruit item', 7, 200, 2.3, 17, 0, 0, 0, 0, 0.4, 43.9, 31, 7.8, 37.1, 52, 0.26, 0, 1.1, 42, 0.32, 58, 700, 0, 7, 0.8, 10.1, 400, 0, 0, 0.9, 0.4, 0.2, 4, 0, 2, 0, 0.4, 59.4, NULL),
(83, 'Raspberry', 'fruit item', 7, 53, 1.2, 126, 0, 0, 0, 0, 0.3, 7.4, 7, 6.1, 84.6, 28, 0.104, 0, 0.6, 22, 0.565, 37, 169, 1.2, 1, 0.36, 12.3, 28, 0.037, 0.027, 0.036, 0.39, 0.05, 34, 0, 32, 0, 0.77, 7.8, NULL),
(84, 'Strawberry', 'fruit item', 7, 25, 0.7, 65, 0, 0, 0, 0, 0.2, 3.9, 3.9, 2.5, 92.1, 18, 0.065, 0, 0.58, 8, 0.328, 24, 158, 1, 3, 0.18, 5.7, 12, 0.02, 0.05, 0.1, 0.09, 0.02, 39, 0, 45, 0, 0.32, 2.2, NULL),
(85, 'Sultana ', 'fruit item', 7, 317, 2.8, 0, 0, 0, 0, 0, 0.9, 75, 75, 4.4, 16, 56, 0.441, 0.2, 2, 37, 0.28, 95, 910, 0.4, 36, 0.54, 0, 23, 0.18, 0, 0.5, 0, 0, 0, 0, 0, 0, 0, 0, NULL),
(86, 'Avocado', 'Vegetable item', 8, 205, 2, 110, 12.81, 2.7, 0, 4.8, 21.4, 0.5, 0.5, 2.8, 71, 14, 0.271, 0, 0.64, 27, 0.232, 48, 509, 0, 4, 0.56, 14.2, 170, 0.077, 0.14, 1.99, 0.86, 0.11, 59, 0, 11, 0, 1.94, 21, NULL),
(87, 'Beetroot', 'Vegetable item', 8, 48, 1.9, 0, 0, 0, 0, 0, 0, 8.3, 8.3, 3.8, 85.9, 7, 0.059, 0, 0.84, 24, 0.317, 37, 257, 0, 51, 0.75, 0.4, 4, 0.023, 0.017, 0.35, 0, 0.13, 84, 0, 4, 0, 0.08, 400, NULL),
(88, 'Broccoli', 'Vegetable item', 8, 31, 4.6, 0, 0, 0, 0, 0.1, 0.3, 0.4, 0.4, 3.8, 89, 33, 0.054, 0, 0.85, 21, 0.23, 72, 305, 0, 22, 0.6, 40.1, 278, 0.063, 0.193, 0.42, 0.49, 0.1, 31, 0, 57, 0, 0.18, 141, NULL),
(89, 'Brussel Sprouts', 'Vegetable item', 8, 37, 4, 0, 0, 0, 0, 0, 0.3, 2.2, 2.2, 4.7, 87.9, 15, 0, 0, 0.89, 18, 0, 0, 336, 0, 30, 0.3, 40.6, 158, 0.075, 0.141, 0, 0, 0, 38, 0, 63, 0, 0.4, 140, NULL),
(90, 'Bok Choy', 'Vegetable item', 8, 19, 2.6, 0, 0, 0, 0, 0, 0.2, 0.6, 0.6, 2.4, 94.8, 86, 0.041, 4.1, 1.46, 19, 0.269, 28, 260, 0, 59, 0.36, 12.1, 538, 0.114, 0.125, 0, 0, 0.52, 40, 0, 18, 0, 0.14, 34, NULL),
(91, 'Cabbage, all varieties ', 'Vegetable item', 8, 26, 1.6, 0, 0, 0, 0, 0, 0.1, 3.5, 3.5, 2.8, 90.6, 35, 0.022, 0, 0.51, 15, 0.124, 38, 275, 0, 14, 0.25, 20.3, 6, 0.051, 0.046, 0.43, 0.14, 0.1, 11, 0, 43, 0, 0, 109, NULL),
(92, 'Carrots', 'Vegetable item', 8, 30, 1.2, 0, 0, 0, 0, 0, 0.3, 4.1, 3.7, 3.3, 89.9, 31, 0.053, 0, 0.28, 12, 0.322, 35, 270, 0, 40, 0.2, 8.8, 6820, 0.02, 0.035, 0.28, 0.14, 0.02, 32, 0, 4, 0, 0.2, 13.7, NULL),
(93, 'Cauliflower', 'Vegetable item', 8, 24, 2.2, 0, 0, 0, 0, 0, 0.2, 2, 2, 2.8, 91.4, 17, 0.03, 0, 0.47, 15, 0.165, 47, 278, 0, 31, 0.25, 39.1, 12, 0.064, 0.09, 0.42, 0.5, 0.04, 42, 0, 52, 0, 0, 13.8, NULL),
(94, 'Coriander, cilantro', 'Vegetable item', 8, 39, 3.1, 0, 0, 0, 0, 0.1, 0.7, 3.7, 3.7, 3.5, 88.6, 84, 0.02, 0, 6.8, 18, 0.4, 40, 520, 0, 28, 0.4, 12.8, 2, 0.1, 0.15, 0.52, 0, 0, 62, 0, 48, 0, 2.5, 310, NULL),
(95, 'Celery', 'Vegetable item', 8, 18, 0.8, 0, 0, 0, 0, 0, 0.1, 2.8, 1.5, 1.8, 93.8, 53, 0.026, 0, 0.3, 12, 0.16, 35, 325, 2.2, 91, 0.26, 7.9, 63, 0.034, 0.024, 0.48, 0, 0.04, 12, 0, 5, 0, 0.02, 37.8, NULL),
(96, 'Garlic', 'Vegetable item', 8, 124, 6.1, 20, 0.22, 1.2, 0, 0.8, 2.8, 10.2, 1.5, 16.9, 59.9, 30, 0, 0, 1.7, 25, 0, 0, 510, 0, 8, 1, 23.2, 10, 0.09, 0.06, 0.8, 0.6, 1.2, 3, 0, 11, 0, 0.1, 1.7, NULL),
(97, 'Ginger', 'Vegetable item', 8, 31, 0.8, 0, 0, 0, 0, 0.1, 0.4, 4.8, 1.7, 2.8, 90.4, 17, 0, 0, 0.6, 28, 0, 0, 240, 0, 11, 0.4, 28.8, 30, 0.01, 0.03, 0.9, 0.2, 0.2, 11, 0, 3, 0, 0.3, 0.1, NULL),
(98, 'Greens, collard', 'Vegetable item', 8, 49, 2, 0, 0, 0.2, 0, 0, 0.4, 4.9, 0.4, 2.8, 91.8, 140, 0, 0, 1.2, 20, 0.4, 30, 116, 0.5, 16, 0.2, 31.8, 8114, 0, 0.1, 0.6, 0.2, 0.1, 93, 0, 18.2, 0, 0.9, 440, NULL),
(99, 'Greens, mustard', 'Vegetable item', 8, 18.3, 2.3, 0, 0, 0, 0, 0, 0.3, 0.7, 0.7, 1.8, 93.8, 130, 0, 0, 0.7, 11, 0, 0, 450, 0, 3, 0.1, 0.3, 1550, 0.06, 0.09, 0.6, 0.1, 0.1, 278, 0, 100, 0, 1.2, 300, NULL),
(100, 'Kale', 'Vegetable item', 8, 28, 2, 0, 0, 0, 0, 0, 0, 6, 1.3, 2, 91.2, 72, 0.2, 0, 0.9, 18, 0.4, 28, 228, 0.9, 23, 0.2, 0.4, 13623, 0.1, 0.1, 0.5, 0, 0.1, 13, 0, 41, 0, 0.9, 817, NULL),
(101, 'Kohlrabi', 'Vegetable item', 8, 40, 3.9, 0, 0, 0, 0, 0, 0.1, 4.4, 4.4, 3.4, 86.2, 25, 0, 0, 0.69, 26, 0.1, 45, 478, 0, 16, 0.4, 13.2, 28, 0.067, 0.047, 0.53, 0.2, 0.2, 12, 0, 55, 0, 0.5, 0.1, NULL),
(102, 'Leek', 'Vegetable item', 8, 29, 1.9, 0, 0, 0, 0, 0, 0.4, 3.3, 3.3, 3.2, 90.7, 30, 0.057, 0, 0.63, 13, 0.408, 39, 232, 0, 15, 0.27, 0, 226, 0.045, 0.072, 0.36, 0, 0.08, 0, 0, 27, 0, 0.35, 25.4, NULL),
(103, 'Lettuce', 'Vegetable item', 8, 9.5, 1, 0, 0, 0, 0, 0, 0.1, 0.4, 0.4, 1.5, 95.5, 19, 0.055, 2.1, 0.61, 11, 0.14, 25, 205, 0.5, 26, 0.21, 13.4, 120, 0.032, 0.032, 0.43, 0, 0.05, 24, 0, 4, 0, 0.04, 174, NULL),
(104, 'Olives, black', 'Vegetable item', 8, 210, 2.1, 118, 14.87, 2.1, 0, 2.6, 20.4, 2.6, 0, 3.3, 67.5, 52, 0.145, 2.2, 1.75, 23, 0.078, 10, 72, 0, 1472, 0, 10.3, 406, 0, 0, 0, 0, 0.02, 0, 0, 1, 0, 7.25, 2.59, NULL),
(105, 'Onion', 'Vegetable item', 8, 30.3, 1.7, 0, 0, 0, 0, 0, 0.2, 4.6, 4.5, 1.9, 90.5, 22, 0, 0, 0.5, 11, 0, 0, 140, 0, 13, 0.1, 6.8, 610, 0.02, 0.06, 1.1, 0, 0, 25, 0, 32, 0, 0, 0.5, NULL),
(106, 'Parsely', 'Vegetable item', 8, 23.8, 2.4, 0, 0, 0, 0, 0, 0.2, 0.6, 0.6, 4.7, 89.2, 190, 0, 6.6, 2.7, 36, 0, 58, 1530, 0.2, 58, 0.7, 12.8, 3810, 0.15, 0.33, 1.1, 0, 0, 55, 0, 132, 0, 0.7, 1640, NULL),
(107, 'Parsnip', 'Vegetable item', 8, 61.8, 2, 0, 0, 0, 0, 0, 0.3, 10.9, 5.3, 3.9, 81.8, 40, 0.074, 0, 0.31, 25, 0.158, 57, 414, 0, 20, 0.42, 27, 10, 0.07, 0.099, 1.08, 0.24, 0.06, 19, 0, 9, 0, 0.22, 1, NULL),
(108, 'Potato, sweet', 'Vegetable item', 8, 71, 2, 0, 0, 0, 0, 0, 0, 14.2, 0.2, 2.4, 78.8, 6, 0.056, 0, 0.42, 14, 0.134, 44, 441, 2.7, 11, 0.3, 10.8, 15741, 0.067, 0.02, 0.17, 0.18, 0.08, 36, 0, 12.8, 0, 0.9, 2.1, NULL),
(109, 'Radish, black, red', 'Vegetable item', 8, 14.8, 0.8, 0, 0, 0, 0, 0, 0.2, 1.9, 1.9, 1.1, 94.9, 25, 0, 0, 1.1, 9, 0, 20, 180, 0, 20, 0.2, 6.8, 10, 0.03, 0.03, 0.4, 0.1, 0, 25, 0, 23, 0, 0, 0.3, NULL),
(110, 'Silverbeet, chard', 'Vegetable item', 8, 19.5, 1.9, 0, 0, 0, 0, 0, 0.3, 1.3, 1.3, 2.3, 91.9, 87, 0.087, 0, 2.8, 30, 1.307, 34, 283, 0, 237, 0.61, 28.7, 1631, 0.031, 0.138, 0.22, 0, 0.88, 42, 0, 15, 0, 0.16, 317, NULL),
(111, 'Spinach', 'Vegetable item', 8, 28.4, 3.1, 0, 0, 0, 0, 0, 0.4, 0.8, 0.8, 4.8, 91.6, 65, 0.048, 8.5, 3.91, 83, 0.858, 43, 623, 0, 26, 0.73, 19.7, 2256, 0.062, 0.185, 1.27, 0, 0.18, 85, 0, 19, 0, 1.36, 494, NULL),
(112, 'Seaweed, dulse', 'Seafood item', 10, 275, 22, 0, 0, 0, 0, 0, 1.5, 44, 0, 0, 0, 215, 0.35, 5000, 33, 270, 1, 0, 7800, 0, 1700, 3, 0, 660, 0.075, 1.9, 1.9, 0, 9, 0, 6.8, 6.5, 0, 1.7, 0, NULL),
(113, 'Seaweed, Irish moss', 'Seafood item', 10, 49, 2, 47, 0, 0, 0, 0, 0, 12, 0.6, 1.3, 81.3, 72, 0.1, 40000, 8.9, 144, 0.4, 157, 63, 0.7, 67, 1.9, 12.9, 118, 0, 0.5, 0.2, 0, 0.1, 182, 0, 3, 0, 0.9, 5, NULL),
(114, 'Seaweed, kelp', 'Seafood item', 10, 43, 2, 0, 0, 0, 0, 0, 1, 10, 1, 1, 81.6, 168, 0.1, 260000, 2.8, 121, 0.64, 42, 89, 53, 233, 3.1, 12.8, 116, 0.1, 0.2, 0.5, 0.6, 0, 180, 0, 3, 0, 0.9, 66, NULL),
(115, 'Seaweed, kombu', 'Seafood item', 10, 167, 8.7, 0, 0.19, 0.21, 0, 0.3, 1.1, 24, 0, 33.2, 9.9, 800, 0.4, 433, 5.9, 700, 0.4, 120, 4600, 0, 2300, 3.9, 95, 20, 0.48, 0, 2.9, 0, 0, 0, 0, 0, 2, 0.5, 0, NULL),
(116, 'Seaweed, nori', 'Seafood item', 10, 188, 41.4, 0, 0.2, 1.39, 0, 0.55, 3.7, 44.3, 0, 36, 0, 280, 0.55, 2100, 11.4, 300, 3.72, 700, 2400, 9, 530, 3.6, 0, 2300, 0.69, 2.33, 11.7, 1.18, 0.59, 57.6, 57.6, 210, 0, 4.6, 390, NULL),
(117, 'Turnip', 'Vegetable item', 8, 24, 1.4, 0, 0, 0, 0, 0, 0, 3.7, 3.4, 1.8, 92.4, 21, 0, 0, 0.31, 8, 0, 0, 310, 0, 25, 0.2, 0.3, 7626, 0.037, 0.041, 0.72, 0, 0, 11, 0, 17, 0, 1.9, 368, NULL),
(118, 'Watercress', 'Vegetable item', 8, 26, 2.9, 0, 0, 0, 0, 0, 0.4, 0.8, 0.7, 3.8, 90.8, 85, 0, 0, 3, 23, 0, 0, 570, 0, 48, 0.7, 9, 1980, 0.02, 0.16, 0.8, 0.3, 0.1, 280, 0, 101, 0, 1, 250, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `food_categories`
--

CREATE TABLE IF NOT EXISTS `food_categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food_categories`
--

INSERT INTO `food_categories` (`category_id`, `category_name`, `created_at`) VALUES
(1, 'Meat, fish and Poultry', NULL),
(2, 'Dairy', NULL),
(3, 'Nuts and Seeds', NULL),
(4, 'Legumes', NULL),
(5, 'Oils', NULL),
(6, 'Wholegrains', NULL),
(7, 'Fruits', NULL),
(8, 'Vegetables', NULL),
(9, 'Egg', NULL),
(10, 'Seafood', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `recipe`
--

CREATE TABLE IF NOT EXISTS `recipe` (
  `recipe_id` int(11) NOT NULL,
  `recipe` varchar(255) DEFAULT NULL,
  `ingredients` varchar(255) DEFAULT NULL,
  `amount` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `supplements`
--

CREATE TABLE IF NOT EXISTS `supplements` (
  `supplement_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `food_id` int(11) NOT NULL,
  `qty` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` enum('a','b') NOT NULL DEFAULT 'a',
  `status` enum('0','1') NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `user_type`, `status`, `created_at`, `updated_at`) VALUES
(17, 'sdsfbdfb', 'tintin@hi.com', '6b3f4e05e3985277838734c8ef367fb7', 'a', '1', '2015-05-06 20:15:53', NULL),
(18, 'Demo', 'demo@demo.com', '8addd915c1b805507cf4b8b93a46bb9c', 'a', '0', '2015-05-25 11:19:34', NULL),
(19, 'hbdfhbdfh', 'sfsdvdf@drhd.dffdg', '8c27343743eb03024260a878e1142fdc', 'a', '0', '2015-05-31 12:03:09', NULL),
(20, 'Zahirul', 'zahirul.arb@gmail.com', '3b7060aa2d1d565643e85bb1ceee38ef', 'a', '1', '2015-07-03 11:12:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE IF NOT EXISTS `user_profile` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `age` varchar(255) DEFAULT NULL,
  `height` float DEFAULT NULL,
  `weight` float DEFAULT NULL,
  `bmr` varchar(255) DEFAULT NULL,
  `calory_need` varchar(255) DEFAULT NULL,
  `body_fat` varchar(255) DEFAULT NULL,
  `activity_level` varchar(255) DEFAULT NULL,
  `goal` varchar(255) DEFAULT NULL,
  `add_adhd` enum('0','1') NOT NULL DEFAULT '0',
  `adrenal_burnout` enum('0','1') NOT NULL DEFAULT '0',
  `anemia` enum('0','1') NOT NULL DEFAULT '0',
  `alzheimer` enum('0','1') NOT NULL DEFAULT '0',
  `arthritis` enum('0','1') NOT NULL DEFAULT '0',
  `autism` enum('0','1') NOT NULL DEFAULT '0',
  `autoimmune_thyroiditis` enum('0','1') NOT NULL DEFAULT '0',
  `depression` enum('0','1') NOT NULL DEFAULT '0',
  `diabetes` enum('0','1') NOT NULL DEFAULT '0',
  `digestive_problem` enum('0','1') NOT NULL DEFAULT '0',
  `eye_conditions` varchar(255) DEFAULT NULL,
  `high_cholesterol` varchar(255) DEFAULT NULL,
  `hypertension` enum('0','1') NOT NULL DEFAULT '0',
  `ibd_celiac_crohn_disease` enum('0','1') NOT NULL DEFAULT '0',
  `insomnia` enum('0','1') NOT NULL DEFAULT '0',
  `kidney_disorders` enum('0','1') NOT NULL DEFAULT '0',
  `liver_disorders` enum('0','1') NOT NULL DEFAULT '0',
  `polycystic_ovary_syndrome` enum('0','1') NOT NULL DEFAULT '0',
  `pyroluria` enum('0','1') NOT NULL DEFAULT '0',
  `skin_conditions` varchar(255) DEFAULT NULL,
  `stroke` enum('0','1') NOT NULL DEFAULT '0',
  `varicose_veins` enum('0','1') NOT NULL DEFAULT '0',
  `vegan` enum('0','1') NOT NULL DEFAULT '0',
  `vegetarian` enum('0','1') NOT NULL DEFAULT '0',
  `meat_fish_poultry` enum('0','1') NOT NULL DEFAULT '0',
  `dairy` enum('0','1') NOT NULL DEFAULT '0',
  `nuts_seeds` enum('0','1') NOT NULL DEFAULT '0',
  `legumes` enum('0','1') NOT NULL DEFAULT '0',
  `oils` enum('0','1') NOT NULL DEFAULT '0',
  `wholegrains` enum('0','1') NOT NULL DEFAULT '0',
  `fruits` enum('0','1') NOT NULL DEFAULT '0',
  `vegetables` enum('0','1') NOT NULL DEFAULT '0',
  `egg` enum('0','1') NOT NULL DEFAULT '0',
  `seafood` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`user_id`, `user_name`, `gender`, `age`, `height`, `weight`, `bmr`, `calory_need`, `body_fat`, `activity_level`, `goal`, `add_adhd`, `adrenal_burnout`, `anemia`, `alzheimer`, `arthritis`, `autism`, `autoimmune_thyroiditis`, `depression`, `diabetes`, `digestive_problem`, `eye_conditions`, `high_cholesterol`, `hypertension`, `ibd_celiac_crohn_disease`, `insomnia`, `kidney_disorders`, `liver_disorders`, `polycystic_ovary_syndrome`, `pyroluria`, `skin_conditions`, `stroke`, `varicose_veins`, `vegan`, `vegetarian`, `meat_fish_poultry`, `dairy`, `nuts_seeds`, `legumes`, `oils`, `wholegrains`, `fruits`, `vegetables`, `egg`, `seafood`) VALUES
(15, 'Md. Zahirul Haque', 'male', '22', 153, 54, '1421.153', '2180.14075125', 'medium', 'level2', 'maintain', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', 'color_blindness', '1', '1', '1', '1', '1', '1', '1', '1', 'cold_sores', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '1', '1'),
(17, 'Zahirul Haque', 'male', '27', 156, 68, '1594.723', '1913.6676', 'medium', 'level1', 'maintain', '1', '0', '1', '0', '0', '0', '0', '0', '0', '0', 'none', '0', '0', '0', '0', '0', '0', '0', '0', 'none', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1'),
(18, 'Zahirul', 'male', '27', 120, 68, '1421.959', '0', 'medium', 'level2', 'maintain', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'none', '0', '0', '0', '0', '0', '0', '0', '0', 'none', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(20, 'Zahirul', 'female', '26', 150, 50, '1262.063', '2179.546875', 'high', 'level3', 'maintain', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'cataracts', '0', '0', '0', '0', '0', '0', '1', '0', 'cold_sores', '0', '0', '1', '0', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `foods`
--
ALTER TABLE `foods`
  ADD PRIMARY KEY (`food_id`);

--
-- Indexes for table `food_categories`
--
ALTER TABLE `food_categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `recipe`
--
ALTER TABLE `recipe`
  ADD PRIMARY KEY (`recipe_id`);

--
-- Indexes for table `supplements`
--
ALTER TABLE `supplements`
  ADD PRIMARY KEY (`supplement_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `foods`
--
ALTER TABLE `foods`
  MODIFY `food_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=119;
--
-- AUTO_INCREMENT for table `food_categories`
--
ALTER TABLE `food_categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `recipe`
--
ALTER TABLE `recipe`
  MODIFY `recipe_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `supplements`
--
ALTER TABLE `supplements`
  MODIFY `supplement_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
