-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2018 at 09:08 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `judiciary_website`
--

-- --------------------------------------------------------

--
-- Table structure for table `cause_list`
--

CREATE TABLE `cause_list` (
  `id` int(11) NOT NULL,
  `dates` varchar(225) NOT NULL,
  `case_number` varchar(115) NOT NULL,
  `parties` varchar(225) NOT NULL,
  `witness` int(11) NOT NULL,
  `advocate_plaintiff` varchar(50) NOT NULL,
  `advocate_defendant` varchar(50) NOT NULL,
  `division` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cause_list`
--

INSERT INTO `cause_list` (`id`, `dates`, `case_number`, `parties`, `witness`, `advocate_plaintiff`, `advocate_defendant`, `division`) VALUES
(1, '1/10/2018', 'LAND CASE NO. 106/2018', 'JUMA MHENZO MAHALK VS JOHN KUSH LEORDAD', 2, 'SALHEH AHMAD', 'ISRAEL CRUZ', 3),
(2, '2/10/2018', 'LAND CASE NO. 152/2018', 'JOHN LUKUKI VS PASCAL NJEBD', 5, 'JERHEH ZELHE', 'PHILIPO KOMBA', 3);

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` int(11) NOT NULL,
  `zone_id` int(11) NOT NULL,
  `division` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `zone_id`, `division`) VALUES
(1, 1, 'Court Of Appeal'),
(2, 1, 'High Court'),
(3, 2, 'Court Of Appeal Registry'),
(4, 2, 'High Court Registry'),
(5, 3, 'Court Of Appeal Registry'),
(6, 3, 'High Court Registry');

-- --------------------------------------------------------

--
-- Table structure for table `judgments`
--

CREATE TABLE `judgments` (
  `id` int(11) NOT NULL,
  `division` int(11) NOT NULL,
  `case_no` varchar(50) NOT NULL,
  `parties` varchar(225) DEFAULT NULL,
  `descriptions` text,
  `attachment` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `language` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `translation` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `language`, `translation`) VALUES
(1, 'sw', 'Kichwa cha Habari'),
(2, 'sw', 'Inaonekana ya kwamba lugha mpya ilijitokeza wakati wenyeji wa pwani, waliokuwa wasemaji wa lugha za Kibantu, walipopokea maneno mengi hasa ya Kiarabu katika mawasiliano yao. Kwa hiyo msingi wa Kiswahili ni sarufi na msamiati wa Kibantu pamoja na maneno mengi ya Kiarabu. Imekadiriwa ya kwamba karibu theluthi moja ya maneno ya Kiswahili yana asili ya Kiarabu.\r\n\r\nKando ya Kiarabu toka zamani pia kuna athira ya lugha mbalimbali kama Kiajemi, Kihindi na Kireno. '),
(3, 'sw', 'Anza sasa kutumia Yii');

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1537030655),
('m130524_201442_init', 1537030961),
('m150207_210500_i18n_init', 1537030676);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `attachment` varchar(25) NOT NULL,
  `title` varchar(60) NOT NULL,
  `descriptions` text NOT NULL,
  `time` datetime NOT NULL,
  `author` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `attachment`, `title`, `descriptions`, `time`, `author`) VALUES
(1, 'uploads/attach1', 'MAHAKAMA KUU WAJADILI MIKAKATI YA KUMALIZA MASHAURI MAHAKAMA', 'Jaji Mfawidhi wa Mahakama Kuu Kanda ya Mbeya, Mhe. Robert  Makaramba amewataka mahakimu wa kanda hiyo  kutambua kuwa wao ni walinzi wa haki na wanapokuwa katika utekelezaji wa majukumu yao wahakikishe wanatenda haki bila kuzingatia rangi, dini, wala hadhi ya watu wanaowahudumia.', '2018-10-08 11:19:00', 1),
(2, 'uploads/attach1', 'WANANCHI MBEYA WAELIMISHWA KUHUSU MIRATHI NA WOSIA', 'Jaji wa Mahakama Kuu ya Tanzania kanda ya Mbeya Mhe.Dkt. Mary Levira ametoa wito kwa wananchi wa kanda hiyo kuhakikisha wanaandaa ushahidi unaojitosheleza ili wanapofika mahakamani waweze kuhudumiwa kwa wepesi na kupata haki wanazostahili. ', '2018-10-08 11:19:00', 1),
(3, 'uploads/attach1', 'BAADHI YA VIONGOZI NA WATUMISHI WA MAHAKAMA YA TANZANIA WAJA', 'Jaji Mfawidhi Mahakamu Kuu, Kanda ya Tabora, Mhe. Salvatory Bongole amefanya ziara ya kikazi   kwa kutembelea na kukagua shughuli mbalimbali za Mahakama mkoani Kigoma pamoja na ukaguzi wa maendeleo ya ujenzi wa Mahakama Kuu, Kanda tarajiwa ya Kigoma.', '2018-10-08 11:19:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `source_message`
--

CREATE TABLE `source_message` (
  `id` int(11) NOT NULL,
  `category` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8_unicode_ci,
  `attachment` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `source_message`
--

INSERT INTO `source_message` (`id`, `category`, `message`, `attachment`) VALUES
(1, 'db', 'Heading', ''),
(2, 'db', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', ''),
(3, 'db', 'Get started with Yii', ''),
(11, 'db', 'Many blogs provide commentary on a particular subject or topic, ranging from politics to sports. Others function as more personal online diaries, and others function more as online brand advertising of a particular individual or company. A typical blog combines text, digital images, and links to other blogs, web pages, and other media related to its topic.', 'uploads/services3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Admin', '_VqqMUl0uI25I6ByrHM4bnmQpZ18gsR6', '$2y$13$ouwJ.rXAQ0H3mfcsDPZp7u9IjZnOA5DNyHmVGct.kFPO7dPIoDPkG', NULL, 'isra.ezra02@gmail.com', 10, 1537375180, 1537375180);

-- --------------------------------------------------------

--
-- Table structure for table `user_responses`
--

CREATE TABLE `user_responses` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `contact` varchar(25) DEFAULT NULL,
  `message_type` enum('Complaints','Suggestions') NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_responses`
--

INSERT INTO `user_responses` (`id`, `username`, `contact`, `message_type`, `message`) VALUES
(1, 'Manyangudu', '0717 256177', 'Suggestions', 'We can all be as one'),
(2, 'John IncMan', 'mymail@gmail.com', 'Suggestions', 'Why us..and not the res of the world? I would appreciate it if someone would have gone far and research.'),
(3, 'Jesse Kalinga', '0655234254', 'Complaints', 'Multi Statistic and Analytic Yii2 Module for your website. Yandex, Google ... Redis Counter implements fast atomic counters using Redis storage. Created by'),
(4, 'Joshua Gondwe', 'samson@somemail.com', 'Complaints', 'I had to come to the court the other day where I had to find a person askin to be bribed by the colligue.');

-- --------------------------------------------------------

--
-- Table structure for table `vacancies`
--

CREATE TABLE `vacancies` (
  `id` int(11) NOT NULL,
  `position` varchar(50) NOT NULL,
  `duties` text NOT NULL,
  `type` enum('PART-TIME','FULL-TIME') NOT NULL,
  `location` varchar(25) NOT NULL,
  `posted_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vacancies`
--

INSERT INTO `vacancies` (`id`, `position`, `duties`, `type`, `location`, `posted_by`) VALUES
(1, 'Systems Analyst', '\r\n    Analysing operations and interpreting the associated system requirements for a range of online banking initiatives\r\n    Designing efficient and effective financial and client management systems from the ground up\r\n    Writing technical specifications and liaising with IT staff and providers\r\n    Budgeting and analysing phases of systems implementation for internal initiatives and external clients\r\n    Working with software designers to understand product application and potential limitations, including system testing\r\n', 'FULL-TIME', 'HQC Financial', 1),
(2, 'Construction Project Manager', '\r\n    Bachelor of Civil Engineering, or equivalent\r\n    Extensive experience on high profile projects\r\n    Strong RMS/RTA experience\r\n    Excellent leadership skills\r\n    Client relationship expertise\r\n    Ability to work autonomously\r\n', 'PART-TIME', 'Arusha', 1);

-- --------------------------------------------------------

--
-- Table structure for table `zones`
--

CREATE TABLE `zones` (
  `id` int(11) NOT NULL,
  `zone` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `zones`
--

INSERT INTO `zones` (`id`, `zone`) VALUES
(1, 'COURT OF APPEAL'),
(2, 'HIGH COURT MAIN REGISTRY'),
(3, 'HIGH COURT ZONES'),
(4, 'HIGH COURT DIVISIONS'),
(5, 'RESIDENT MAGISTRATES\' COURTS'),
(6, 'DISTRICT COURTS'),
(7, 'PRIMARY COURTS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cause_list`
--
ALTER TABLE `cause_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `division` (`division`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `zone_id` (`zone_id`);

--
-- Indexes for table `judgments`
--
ALTER TABLE `judgments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `division_id` (`division`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`,`language`),
  ADD KEY `idx_message_language` (`language`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author` (`author`);

--
-- Indexes for table `source_message`
--
ALTER TABLE `source_message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_source_message_category` (`category`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- Indexes for table `user_responses`
--
ALTER TABLE `user_responses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vacancies`
--
ALTER TABLE `vacancies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zones`
--
ALTER TABLE `zones`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cause_list`
--
ALTER TABLE `cause_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `judgments`
--
ALTER TABLE `judgments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `source_message`
--
ALTER TABLE `source_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_responses`
--
ALTER TABLE `user_responses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vacancies`
--
ALTER TABLE `vacancies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `zones`
--
ALTER TABLE `zones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `fk_message_source_message` FOREIGN KEY (`id`) REFERENCES `source_message` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
