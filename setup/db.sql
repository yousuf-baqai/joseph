-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2020 at 04:55 PM
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
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('0k7a90gs7u78feltkpsk0natldrfffch', '::1', 1602158869, '__ci_last_regenerate|i:1602158869;user_email|s:20:\"masteradmin@demo.com\";user_name|s:12:\"Master Admin\";user_image|s:9:\"user2.png\";user_id|s:1:\"1\";user_role|s:1:\"1\";'),
('356o1tscauoum529ua12604juvom5gv5', '::1', 1602166045, '__ci_last_regenerate|i:1602166045;user_email|s:20:\"masteradmin@demo.com\";user_name|s:12:\"Master Admin\";user_image|s:9:\"user1.png\";user_id|s:1:\"1\";user_role|s:1:\"1\";'),
('4276k7o0f7ojkidi3e6odpct8e0avo1c', '::1', 1602168877, '__ci_last_regenerate|i:1602168707;user_email|s:20:\"masteradmin@demo.com\";user_name|s:12:\"Master Admin\";user_image|s:9:\"user1.png\";user_id|s:1:\"1\";user_role|s:1:\"1\";'),
('4ejdli4hrpa942t9oqjsds5u7p2nl6r2', '::1', 1602162965, '__ci_last_regenerate|i:1602162965;user_email|s:20:\"masteradmin@demo.com\";user_name|s:12:\"Master Admin\";user_image|s:9:\"user2.png\";user_id|s:1:\"1\";user_role|s:1:\"1\";'),
('6kdsagteuogfpemj48h7g755mghftcai', '::1', 1602168382, '__ci_last_regenerate|i:1602168382;user_email|s:20:\"masteradmin@demo.com\";user_name|s:12:\"Master Admin\";user_image|s:9:\"user1.png\";user_id|s:1:\"1\";user_role|s:1:\"1\";'),
('7pjscrmaci4snkpvq6r5uu2mn4sgs8vl', '::1', 1602157162, '__ci_last_regenerate|i:1602157162;user_email|s:20:\"masteradmin@demo.com\";user_name|s:12:\"Master Admin\";user_image|s:9:\"user2.png\";user_id|s:1:\"1\";user_role|s:1:\"1\";'),
('ar7r890trp56ti13737flu4krkv93qv1', '::1', 1602165744, '__ci_last_regenerate|i:1602165744;user_email|s:20:\"masteradmin@demo.com\";user_name|s:12:\"Master Admin\";user_image|s:9:\"user1.png\";user_id|s:1:\"1\";user_role|s:1:\"1\";'),
('ctrtn60envt2pfsk5svagokrs47m9ghc', '::1', 1602160591, '__ci_last_regenerate|i:1602160591;user_email|s:20:\"masteradmin@demo.com\";user_name|s:12:\"Master Admin\";user_image|s:9:\"user2.png\";user_id|s:1:\"1\";user_role|s:1:\"1\";'),
('d9f9g25h6grjd9h63mscequs8d2d36a7', '::1', 1602167703, '__ci_last_regenerate|i:1602167703;user_email|s:20:\"masteradmin@demo.com\";user_name|s:12:\"Master Admin\";user_image|s:9:\"user1.png\";user_id|s:1:\"1\";user_role|s:1:\"1\";'),
('e9scc0slqut3ml3kl5cfmdc9ba7o5vl2', '::1', 1602159212, '__ci_last_regenerate|i:1602159212;user_email|s:20:\"masteradmin@demo.com\";user_name|s:12:\"Master Admin\";user_image|s:9:\"user2.png\";user_id|s:1:\"1\";user_role|s:1:\"1\";'),
('fd3892mneobe94uu5qlnhj6ido7ieb3o', '::1', 1602163272, '__ci_last_regenerate|i:1602163272;user_email|s:20:\"masteradmin@demo.com\";user_name|s:12:\"Master Admin\";user_image|s:9:\"user2.png\";user_id|s:1:\"1\";user_role|s:1:\"1\";'),
('g1gm54qsjdje06q7c8jelc8cgdda6b38', '::1', 1602163612, '__ci_last_regenerate|i:1602163612;user_email|s:20:\"masteradmin@demo.com\";user_name|s:12:\"Master Admin\";user_image|s:9:\"user2.png\";user_id|s:1:\"1\";user_role|s:1:\"1\";'),
('ha27k3r24oeddvkj61rch6eqm8t2ekg4', '::1', 1602164221, '__ci_last_regenerate|i:1602164221;user_email|s:20:\"masteradmin@demo.com\";user_name|s:12:\"Master Admin\";user_image|s:9:\"user2.png\";user_id|s:1:\"1\";user_role|s:1:\"1\";'),
('i97pjkh0nojfntkhue8fdq17veoqn66b', '::1', 1602159932, '__ci_last_regenerate|i:1602159932;user_email|s:20:\"masteradmin@demo.com\";user_name|s:12:\"Master Admin\";user_image|s:9:\"user2.png\";user_id|s:1:\"1\";user_role|s:1:\"1\";'),
('iujagfh4nkithmmibsgtcfm376b8dnus', '::1', 1602162663, '__ci_last_regenerate|i:1602162663;user_email|s:20:\"masteradmin@demo.com\";user_name|s:12:\"Master Admin\";user_image|s:9:\"user2.png\";user_id|s:1:\"1\";user_role|s:1:\"1\";'),
('l144qf5q6hn6crohcktef7snn81qu9q3', '::1', 1602168707, '__ci_last_regenerate|i:1602168707;user_email|s:20:\"masteradmin@demo.com\";user_name|s:12:\"Master Admin\";user_image|s:9:\"user1.png\";user_id|s:1:\"1\";user_role|s:1:\"1\";'),
('omafn0hlni1r0ge70tsqclph306ofgd7', '::1', 1602165432, '__ci_last_regenerate|i:1602165432;user_email|s:20:\"masteradmin@demo.com\";user_name|s:12:\"Master Admin\";user_image|s:9:\"user1.png\";user_id|s:1:\"1\";user_role|s:1:\"1\";'),
('p8uu5iu190jdrmgqvjdkcrf1oabkec77', '::1', 1602166921, '__ci_last_regenerate|i:1602166921;user_email|s:20:\"masteradmin@demo.com\";user_name|s:12:\"Master Admin\";user_image|s:9:\"user1.png\";user_id|s:1:\"1\";user_role|s:1:\"1\";'),
('pc45r1498o58i0m7fkugkh02camdkqgr', '::1', 1602162362, '__ci_last_regenerate|i:1602162362;user_email|s:20:\"masteradmin@demo.com\";user_name|s:12:\"Master Admin\";user_image|s:9:\"user2.png\";user_id|s:1:\"1\";user_role|s:1:\"1\";'),
('qtahht69t319pk04mfu2erdr00l09gdr', '::1', 1602157517, '__ci_last_regenerate|i:1602157517;user_email|s:20:\"masteradmin@demo.com\";user_name|s:12:\"Master Admin\";user_image|s:9:\"user2.png\";user_id|s:1:\"1\";user_role|s:1:\"1\";'),
('r43sotoco1heeg7tj1o4ql2go4je17qg', '::1', 1602166606, '__ci_last_regenerate|i:1602166606;user_email|s:20:\"masteradmin@demo.com\";user_name|s:12:\"Master Admin\";user_image|s:9:\"user1.png\";user_id|s:1:\"1\";user_role|s:1:\"1\";'),
('tcb27d6oquj73g8lt8im9j9903mjgljo', '::1', 1602164724, '__ci_last_regenerate|i:1602164724;user_email|s:20:\"masteradmin@demo.com\";user_name|s:12:\"Master Admin\";user_image|s:9:\"user1.png\";user_id|s:1:\"1\";user_role|s:1:\"1\";'),
('ubef7a82tkdu8equjesef42vpjf447l7', '::1', 1602163915, '__ci_last_regenerate|i:1602163915;user_email|s:20:\"masteradmin@demo.com\";user_name|s:12:\"Master Admin\";user_image|s:9:\"user2.png\";user_id|s:1:\"1\";user_role|s:1:\"1\";'),
('uko35ri5k2u17t9l9ijc0chqrrtgpepv', '::1', 1602159595, '__ci_last_regenerate|i:1602159595;user_email|s:20:\"masteradmin@demo.com\";user_name|s:12:\"Master Admin\";user_image|s:9:\"user2.png\";user_id|s:1:\"1\";user_role|s:1:\"1\";'),
('ve9vp756ggnsbilm2jc44lh250de3adp', '::1', 1602167328, '__ci_last_regenerate|i:1602167328;user_email|s:20:\"masteradmin@demo.com\";user_name|s:12:\"Master Admin\";user_image|s:9:\"user1.png\";user_id|s:1:\"1\";user_role|s:1:\"1\";'),
('vmb7i7v6i40afbkllccf736kt50blihu', '::1', 1602168042, '__ci_last_regenerate|i:1602168042;user_email|s:20:\"masteradmin@demo.com\";user_name|s:12:\"Master Admin\";user_image|s:9:\"user1.png\";user_id|s:1:\"1\";user_role|s:1:\"1\";');

-- --------------------------------------------------------

--
-- Table structure for table `header_navbar`
--

CREATE TABLE `header_navbar` (
  `header_navbar_id` int(11) NOT NULL,
  `tenant_id` int(11) NOT NULL,
  `header_navbar_text` varchar(300) DEFAULT NULL,
  `header_navbar_link` text DEFAULT NULL,
  `header_navbar_column_1` text DEFAULT NULL,
  `header_navbar_column_2` text DEFAULT NULL,
  `header_navbar_order_id` int(11) NOT NULL,
  `header_navbar_parent_id` int(11) NOT NULL,
  `header_navbar_created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `header_navbar_updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `header_navbar_status` enum('enable','disable') NOT NULL DEFAULT 'enable'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `header_navbar`
--

INSERT INTO `header_navbar` (`header_navbar_id`, `tenant_id`, `header_navbar_text`, `header_navbar_link`, `header_navbar_column_1`, `header_navbar_column_2`, `header_navbar_order_id`, `header_navbar_parent_id`, `header_navbar_created_at`, `header_navbar_updated_at`, `header_navbar_status`) VALUES
(1, 0, 'test', 'test', NULL, NULL, 0, 0, '2020-10-08 14:17:32', '2020-10-08 14:17:32', 'enable');

-- --------------------------------------------------------

--
-- Table structure for table `seo`
--

CREATE TABLE `seo` (
  `seo_id` int(11) UNSIGNED NOT NULL,
  `tenant_id` int(11) NOT NULL,
  `seo_page_name` varchar(255) NOT NULL,
  `seo_page_link` varchar(255) NOT NULL,
  `seo_page_title` varchar(255) DEFAULT NULL,
  `seo_meta_title` varchar(255) DEFAULT NULL,
  `seo_meta_description` text NOT NULL,
  `seo_meta_keyword` text NOT NULL,
  `seo_meta_canonical` varchar(255) DEFAULT NULL,
  `seo_meta_index` enum('noindex, nofollow','index, nofollow','noindex, follow','index, follow') DEFAULT NULL,
  `seo_head_script` text DEFAULT NULL,
  `seo_footer_script` text DEFAULT NULL,
  `seo_status` enum('enable','disable') DEFAULT 'enable',
  `seo_created_by` int(11) DEFAULT NULL,
  `seo_created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `seo_updated_by` int(11) DEFAULT NULL,
  `seo_updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `settings_id` int(11) UNSIGNED NOT NULL,
  `tenant_id` int(11) NOT NULL,
  `settings_site_title` varchar(600) DEFAULT NULL,
  `settings_email` varchar(50) DEFAULT NULL,
  `settings_email_from` varchar(300) NOT NULL,
  `settings_email_to` varchar(300) NOT NULL,
  `settings_favicon` varchar(50) DEFAULT NULL,
  `settings_address` varchar(300) NOT NULL,
  `settings_logo` varchar(50) DEFAULT NULL,
  `settings_footer_logo` varchar(300) DEFAULT NULL,
  `settings_phone` varchar(200) NOT NULL,
  `settings_sidebar_text` text DEFAULT NULL,
  `welcome_email_subject` text DEFAULT NULL,
  `welcome_email_body` text DEFAULT NULL,
  `settings_status` enum('enable','disable') DEFAULT 'enable',
  `settings_created_by` int(11) DEFAULT NULL,
  `settings_created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `settings_updated_by` int(11) DEFAULT NULL,
  `settings_updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`settings_id`, `tenant_id`, `settings_site_title`, `settings_email`, `settings_email_from`, `settings_email_to`, `settings_favicon`, `settings_address`, `settings_logo`, `settings_footer_logo`, `settings_phone`, `settings_sidebar_text`, `welcome_email_subject`, `welcome_email_body`, `settings_status`, `settings_created_by`, `settings_created_at`, `settings_updated_by`, `settings_updated_at`) VALUES
(1, 0, 'CMS', NULL, '', 'contact@website.com', 'settings_logo1.png', '', 'settings_logo.png', NULL, '', NULL, NULL, NULL, 'enable', NULL, '2018-05-29 02:18:51', 1, '2020-09-30 16:15:21'),
(2, 1, 'CMS', NULL, '', 'contact@website.com', 'settings_logo1.png', '', 'settings_logo.png', '', '', 'sadsadasd', NULL, NULL, 'enable', NULL, '2020-04-16 07:58:22', NULL, '2020-09-30 16:15:21');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) UNSIGNED NOT NULL,
  `tenant_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_email` varchar(50) DEFAULT NULL,
  `user_phone` varchar(50) DEFAULT NULL,
  `user_password` varchar(255) DEFAULT NULL,
  `user_rest_token` varchar(255) NOT NULL,
  `user_address` varchar(255) DEFAULT NULL,
  `user_image` varchar(255) DEFAULT NULL,
  `user_role` varchar(20) DEFAULT NULL,
  `user_status` enum('enable','disable') DEFAULT 'enable',
  `user_created_by` int(11) DEFAULT NULL,
  `user_created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_updated_by` int(11) DEFAULT NULL,
  `user_updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `tenant_id`, `user_name`, `user_email`, `user_phone`, `user_password`, `user_rest_token`, `user_address`, `user_image`, `user_role`, `user_status`, `user_created_by`, `user_created_at`, `user_updated_by`, `user_updated_at`) VALUES
(1, 0, 'Master Admin', 'masteradmin@demo.com', '(888) 326-7890', '4afeaac1ade0dc2840809510008f2a062426ef0f0b59e842eb694781afeb24bd5ba03d950141e9a4cd4da9c97ce39a5f3c6c3aa6f6723ad468085eb09e15479dKejkQgTb92d8xkEDNTt3TTE4jCRdLnDdYkumr5xVSKw=', '', '5122 N. State Rd. 39\r\nLaPorte, IN 46350', 'user1.png', '1', 'enable', NULL, '2018-05-25 21:25:50', 1, '2020-10-08 13:40:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `header_navbar`
--
ALTER TABLE `header_navbar`
  ADD PRIMARY KEY (`header_navbar_id`);

--
-- Indexes for table `seo`
--
ALTER TABLE `seo`
  ADD PRIMARY KEY (`seo_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`settings_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `header_navbar`
--
ALTER TABLE `header_navbar`
  MODIFY `header_navbar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `seo`
--
ALTER TABLE `seo`
  MODIFY `seo_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `settings_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
