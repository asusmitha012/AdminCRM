-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2024 at 10:03 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin_crm`
--

-- --------------------------------------------------------

--
-- Table structure for table `client_details`
--

CREATE TABLE `client_details` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `gender` int(15) NOT NULL,
  `country` int(15) NOT NULL,
  `zip` varchar(100) NOT NULL,
  `citizen` varchar(100) NOT NULL,
  `passport` varchar(255) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `manager` int(15) NOT NULL,
  `department` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `region` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `city` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `status` int(15) NOT NULL DEFAULT 1,
  `verify` int(15) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `client_details`
--

INSERT INTO `client_details` (`id`, `first_name`, `last_name`, `gender`, `country`, `zip`, `citizen`, `passport`, `email_id`, `manager`, `department`, `address`, `region`, `dob`, `city`, `tel`, `file`, `status`, `verify`, `created_at`, `updated_at`) VALUES
(1, 'Edwin', 'Client', 1, 76, '641103', 'Indian', 'gre545798E', 'edwin@yopmail.com', 0, '', '9/126 Indira Nagar, Irugur', '', '2008-01-01', 'Coimbatore', '7956996596', '', 1, 1, '2024-09-28 12:21:22', '2024-11-26 15:39:50'),
(3, 'Shravan', 'Zek', 0, 32, '', '', '', 'shravan123@yopmail.com', 0, '', '', '', '2008-01-01', '', '6596586548', '', 1, 0, '2024-10-04 13:37:51', '2024-10-04 13:37:51'),
(4, 'Mithun', 'Menon', 0, 14, '', '', '', 'mithun567@yopmail.com', 0, '', '', '', '2008-01-01', '', '6444985465656', '', 1, 0, '2024-10-04 13:44:26', '2024-10-04 13:44:26'),
(5, 'Test', 'Test', 0, 4, '', 'sdfafdssadf', 'gregeg54', 'test345@yopmail.com', 2, '', '', '', '2008-01-01', '', '6595985665', '', 1, 0, '2024-10-04 13:51:19', '2024-10-16 16:21:16'),
(9, 'Bravio', 'Benky', 1, 76, '', 'gerger', 'fsgasf5', 'bravo@yopmail.com', 1, '', '', '', '2008-01-01', '', '09952247055', '', 1, 0, '2024-10-04 17:23:33', '2024-11-26 15:09:06');

-- --------------------------------------------------------

--
-- Table structure for table `client_documents`
--

CREATE TABLE `client_documents` (
  `id` int(15) NOT NULL,
  `contact_id` int(15) NOT NULL,
  `file_id` varchar(255) NOT NULL,
  `file_passport` varchar(255) NOT NULL,
  `file_statement` varchar(255) NOT NULL,
  `file_id_verify` int(15) NOT NULL,
  `file_passport_verify` int(15) NOT NULL,
  `file_statement_verify` int(15) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `client_documents`
--

INSERT INTO `client_documents` (`id`, `contact_id`, `file_id`, `file_passport`, `file_statement`, `file_id_verify`, `file_passport_verify`, `file_statement_verify`, `created_at`, `updated_at`) VALUES
(1, 1, 'almas_TSL.xlsx', '2023-Disclosure-of-Information-(Pillar_III_)_(2).pdf', 'images3.jpeg', 1, 1, 1, '2024-10-15 12:33:45', '2024-10-25 12:59:25');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `country` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country`) VALUES
(1, 'Afghanistan'),
(2, 'Albania'),
(3, 'Algeria'),
(4, 'Andorra'),
(5, 'Angola'),
(6, 'Antigua and Barbuda'),
(7, 'Argentina'),
(8, 'Armenia'),
(9, 'Australia'),
(10, 'Austria'),
(11, 'Azerbaijan'),
(12, 'Bahamas'),
(13, 'Bahrain'),
(14, 'Bangladesh'),
(15, 'Barbados'),
(16, 'Belarus'),
(17, 'Belgium'),
(18, 'Belize'),
(19, 'Benin'),
(20, 'Bhutan'),
(21, 'Bolivia'),
(22, 'Bosnia and Herzegovina'),
(23, 'Botswana'),
(24, 'Brazil'),
(25, 'Brunei'),
(26, 'Bulgaria'),
(27, 'Burkina Faso'),
(28, 'Burundi'),
(29, 'Cabo Verde'),
(30, 'Cambodia'),
(31, 'Cameroon'),
(32, 'Canada'),
(33, 'Central African Republic'),
(34, 'Chad'),
(35, 'Chile'),
(36, 'China'),
(37, 'Colombia'),
(38, 'Comoros'),
(39, 'Congo, Democratic Republic of the'),
(40, 'Congo, Republic of the'),
(41, 'Costa Rica'),
(42, 'Croatia'),
(43, 'Cuba'),
(44, 'Cyprus'),
(45, 'Czech Republic'),
(46, 'Denmark'),
(47, 'Djibouti'),
(48, 'Dominica'),
(49, 'Dominican Republic'),
(50, 'Ecuador'),
(51, 'Egypt'),
(52, 'El Salvador'),
(53, 'Equatorial Guinea'),
(54, 'Eritrea'),
(55, 'Estonia'),
(56, 'Eswatini'),
(57, 'Ethiopia'),
(58, 'Fiji'),
(59, 'Finland'),
(60, 'France'),
(61, 'Gabon'),
(62, 'Gambia'),
(63, 'Georgia'),
(64, 'Germany'),
(65, 'Ghana'),
(66, 'Greece'),
(67, 'Grenada'),
(68, 'Guatemala'),
(69, 'Guinea'),
(70, 'Guinea-Bissau'),
(71, 'Guyana'),
(72, 'Haiti'),
(73, 'Honduras'),
(74, 'Hungary'),
(75, 'Iceland'),
(76, 'India'),
(77, 'Indonesia'),
(78, 'Iran'),
(79, 'Iraq'),
(80, 'Ireland'),
(81, 'Israel'),
(82, 'Italy'),
(83, 'Jamaica'),
(84, 'Japan'),
(85, 'Jordan'),
(86, 'Kazakhstan'),
(87, 'Kenya'),
(88, 'Kiribati'),
(89, 'Korea, North'),
(90, 'Korea, South'),
(91, 'Kuwait'),
(92, 'Kyrgyzstan'),
(93, 'Laos'),
(94, 'Latvia'),
(95, 'Lebanon'),
(96, 'Lesotho'),
(97, 'Liberia'),
(98, 'Libya'),
(99, 'Liechtenstein'),
(100, 'Lithuania'),
(101, 'Luxembourg'),
(102, 'Madagascar'),
(103, 'Malawi'),
(104, 'Malaysia'),
(105, 'Maldives'),
(106, 'Mali'),
(107, 'Malta'),
(108, 'Marshall Islands'),
(109, 'Mauritania'),
(110, 'Mauritius'),
(111, 'Mexico'),
(112, 'Micronesia'),
(113, 'Moldova'),
(114, 'Monaco'),
(115, 'Mongolia'),
(116, 'Montenegro'),
(117, 'Morocco'),
(118, 'Mozambique'),
(119, 'Myanmar'),
(120, 'Namibia'),
(121, 'Nauru'),
(122, 'Nepal'),
(123, 'Netherlands'),
(124, 'New Zealand'),
(125, 'Nicaragua'),
(126, 'Niger'),
(127, 'Nigeria'),
(128, 'North Macedonia'),
(129, 'Norway'),
(130, 'Oman'),
(131, 'Pakistan'),
(132, 'Palau'),
(133, 'Palestine'),
(134, 'Panama'),
(135, 'Papua New Guinea'),
(136, 'Paraguay'),
(137, 'Peru'),
(138, 'Philippines'),
(139, 'Poland'),
(140, 'Portugal'),
(141, 'Qatar'),
(142, 'Romania'),
(143, 'Russia'),
(144, 'Rwanda'),
(145, 'Saint Kitts and Nevis'),
(146, 'Saint Lucia'),
(147, 'Saint Vincent and the Grenadines'),
(148, 'Samoa'),
(149, 'San Marino'),
(150, 'Sao Tome and Principe'),
(151, 'Saudi Arabia'),
(152, 'Senegal'),
(153, 'Serbia'),
(154, 'Seychelles'),
(155, 'Sierra Leone'),
(156, 'Singapore'),
(157, 'Slovakia'),
(158, 'Slovenia'),
(159, 'Solomon Islands'),
(160, 'Somalia'),
(161, 'South Africa'),
(162, 'South Sudan'),
(163, 'Spain'),
(164, 'Sri Lanka'),
(165, 'Sudan'),
(166, 'Suriname'),
(167, 'Sweden'),
(168, 'Switzerland'),
(169, 'Syria'),
(170, 'Taiwan'),
(171, 'Tajikistan'),
(172, 'Tanzania'),
(173, 'Thailand'),
(174, 'Timor-Leste'),
(175, 'Togo'),
(176, 'Tonga'),
(177, 'Trinidad and Tobago'),
(178, 'Tunisia'),
(179, 'Turkey'),
(180, 'Turkmenistan'),
(181, 'Tuvalu'),
(182, 'Uganda'),
(183, 'Ukraine'),
(184, 'United Arab Emirates'),
(185, 'United Kingdom'),
(186, 'United States'),
(187, 'Uruguay'),
(188, 'Uzbekistan'),
(189, 'Vanuatu'),
(190, 'Vatican City'),
(191, 'Venezuela'),
(192, 'Vietnam'),
(193, 'Yemen'),
(194, 'Zambia'),
(195, 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `mt_demo_account`
--

CREATE TABLE `mt_demo_account` (
  `id` int(100) NOT NULL,
  `login` int(100) NOT NULL,
  `contact_id` int(100) NOT NULL,
  `master_password` varchar(255) NOT NULL,
  `invest_password` varchar(255) NOT NULL,
  `phone_password` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `leverage` varchar(255) NOT NULL,
  `status` int(100) NOT NULL DEFAULT 1,
  `account_type` int(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mt_live_account`
--

CREATE TABLE `mt_live_account` (
  `id` int(100) NOT NULL,
  `login` int(100) NOT NULL,
  `contact_id` int(100) NOT NULL,
  `currency` int(100) NOT NULL,
  `master_password` varchar(255) NOT NULL,
  `invest_password` varchar(255) NOT NULL,
  `phone_password` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `leverage` varchar(255) NOT NULL,
  `status` int(100) NOT NULL DEFAULT 1,
  `account_type` int(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staff_details`
--

CREATE TABLE `staff_details` (
  `staff_id` int(15) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `gender` int(15) NOT NULL,
  `staff_position` int(15) NOT NULL,
  `department` varchar(255) NOT NULL,
  `status` int(15) NOT NULL DEFAULT 1,
  `employee_id` varchar(255) DEFAULT NULL,
  `email_id` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_by` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff_details`
--

INSERT INTO `staff_details` (`staff_id`, `first_name`, `last_name`, `dob`, `gender`, `staff_position`, `department`, `status`, `employee_id`, `email_id`, `country`, `city`, `zip`, `address`, `phone`, `file`, `created_at`, `updated_at`, `created_by`) VALUES
(1, 'Susmitha', 'Sush', '2000-02-01', 2, 1, 'Sales', 1, NULL, 'sush@yopmail.com', '46', 'Dubai', '9859', '9/126 xyz, ABC', '+97150660806 ', '', '2024-09-28 12:31:24', '2024-10-01 13:03:17', 1),
(2, 'Madhu', 'Shah', '2001-03-01', 2, 2, 'Sales', 1, NULL, 'madhu@yopmail.com', '123', 'yua', '46767', '123,xyz', '6578658988', '', '2024-10-01 14:56:14', '2024-10-01 14:56:14', 1);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(100) NOT NULL,
  `contact_id` int(100) NOT NULL,
  `login` int(100) NOT NULL,
  `action` int(100) NOT NULL,
  `type` int(100) NOT NULL,
  `actual_amt` float NOT NULL,
  `credited_amt` float NOT NULL,
  `charges` float NOT NULL DEFAULT 0,
  `status` int(100) NOT NULL,
  `processed` int(100) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_by` int(100) NOT NULL,
  `updated_by` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `contact_id`, `login`, `action`, `type`, `actual_amt`, `credited_amt`, `charges`, `status`, `processed`, `created_on`, `updated_on`, `created_by`, `updated_by`) VALUES
(1, 1, 8948, 1, 2, 10, 10, 0, 1, 0, '2024-11-26 08:46:19', '2024-11-28 08:49:18', 0, NULL),
(2, 1, 8948, 1, 2, 10, 10, 0, 1, 1, '2024-11-26 08:47:01', '2024-11-28 08:41:48', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` int(11) NOT NULL,
  `position` varchar(255) NOT NULL,
  `contact_id` int(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `position`, `contact_id`, `name`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, '2', 1, 'Edwin Client', 'edwin@yopmail.com', '482c811da5d5b4bc6d497ffa98491e38', '2024-09-28 12:21:22', '2024-09-28 14:27:26'),
(2, '1', 1, 'Susmitha Sush', 'sush@yopmail.com', '482c811da5d5b4bc6d497ffa98491e38', '2024-09-28 12:31:24', '2024-09-28 12:31:24'),
(3, '1', 2, 'Madhu Shah', 'madhu@yopmail.com', '482c811da5d5b4bc6d497ffa98491e38', '2024-10-01 14:56:14', '2024-10-01 14:56:14'),
(5, '2', 3, 'Shravan Zek', 'shravan123@yopmail.com', '949cf98ec98cc73ab000aa69b462a7bd', '2024-10-04 13:37:51', '2024-10-04 13:37:51'),
(6, '2', 4, 'Mithun Menon', 'mithun567@yopmail.com', '02e08c9d5e70fe3d91e00a9bd0ffa78f', '2024-10-04 13:44:26', '2024-10-04 13:44:26'),
(7, '2', 5, 'Test Test', 'test345@yopmail.com', '5f9cb9a06e267c868d57ab4d947c6297', '2024-10-04 13:51:19', '2024-10-04 13:51:19'),
(11, '2', 9, 'Bravio Benky', 'bravo@yopmail.com', '5f9cb9a06e267c868d57ab4d947c6297', '2024-10-04 17:23:33', '2024-10-04 17:25:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client_details`
--
ALTER TABLE `client_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_documents`
--
ALTER TABLE `client_documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mt_demo_account`
--
ALTER TABLE `mt_demo_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mt_live_account`
--
ALTER TABLE `mt_live_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff_details`
--
ALTER TABLE `staff_details`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client_details`
--
ALTER TABLE `client_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `client_documents`
--
ALTER TABLE `client_documents`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mt_demo_account`
--
ALTER TABLE `mt_demo_account`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mt_live_account`
--
ALTER TABLE `mt_live_account`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff_details`
--
ALTER TABLE `staff_details`
  MODIFY `staff_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
