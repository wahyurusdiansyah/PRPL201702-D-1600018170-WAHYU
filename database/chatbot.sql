-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2018 at 05:03 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chatbot`
--

-- --------------------------------------------------------

--
-- Table structure for table `aiml`
--

CREATE TABLE `aiml` (
  `id` int(11) NOT NULL,
  `bot_id` int(11) NOT NULL DEFAULT '1',
  `pattern` varchar(256) NOT NULL,
  `thatpattern` varchar(256) NOT NULL,
  `template` text NOT NULL,
  `topic` varchar(256) NOT NULL,
  `filename` varchar(256) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `aiml`
--

INSERT INTO `aiml` (`id`, `bot_id`, `pattern`, `thatpattern`, `template`, `topic`, `filename`) VALUES
(1, 1, 'HELLO', '', 'hello', '', 'admin_added.aiml');

-- --------------------------------------------------------

--
-- Table structure for table `aiml_userdefined`
--

CREATE TABLE `aiml_userdefined` (
  `id` int(11) NOT NULL,
  `pattern` varchar(256) NOT NULL,
  `thatpattern` varchar(256) NOT NULL,
  `template` text NOT NULL,
  `user_id` varchar(256) NOT NULL,
  `bot_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `botpersonality`
--

CREATE TABLE `botpersonality` (
  `id` int(11) NOT NULL,
  `bot_id` tinyint(4) NOT NULL DEFAULT '0',
  `name` varchar(256) NOT NULL DEFAULT '',
  `value` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `bots`
--

CREATE TABLE `bots` (
  `bot_id` int(11) NOT NULL,
  `bot_name` varchar(256) NOT NULL,
  `bot_desc` varchar(256) NOT NULL,
  `bot_active` int(11) NOT NULL DEFAULT '1',
  `bot_parent_id` int(11) NOT NULL DEFAULT '0',
  `format` varchar(10) NOT NULL DEFAULT 'html',
  `save_state` enum('session','database') NOT NULL DEFAULT 'session',
  `conversation_lines` int(11) NOT NULL DEFAULT '7',
  `remember_up_to` int(11) NOT NULL DEFAULT '10',
  `debugemail` text NOT NULL,
  `debugshow` int(11) NOT NULL DEFAULT '1',
  `debugmode` int(11) NOT NULL DEFAULT '1',
  `error_response` text NOT NULL,
  `default_aiml_pattern` varchar(256) NOT NULL DEFAULT 'RANDOM PICKUP LINE',
  `unknown_user` varchar(256) NOT NULL DEFAULT 'Seeker'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bots`
--

INSERT INTO `bots` (`bot_id`, `bot_name`, `bot_desc`, `bot_active`, `bot_parent_id`, `format`, `save_state`, `conversation_lines`, `remember_up_to`, `debugemail`, `debugshow`, `debugmode`, `error_response`, `default_aiml_pattern`, `unknown_user`) VALUES
(1, 'Hotel Transylvania', 'PRPL v2', 1, 1, 'json', 'session', 1, 10, 'w.r.hasyim@gmail.com', 4, 1, 'keyword not found', 'RANDOM PICKUP LINE', 'Seeker');

-- --------------------------------------------------------

--
-- Table structure for table `client_properties`
--

CREATE TABLE `client_properties` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `bot_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `value` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `client_properties`
--

INSERT INTO `client_properties` (`id`, `user_id`, `bot_id`, `name`, `value`) VALUES
(1, 1, 1, 'name', 'Seeker'),
(2, 1, 1, 'ip_address', '::1'),
(3, 1, 1, 'name', 'Seeker'),
(4, 1, 1, 'ip_address', '::1'),
(5, 1, 1, 'name', 'Seeker'),
(6, 1, 1, 'ip_address', '::1'),
(7, 1, 1, 'name', 'Seeker');

-- --------------------------------------------------------

--
-- Table structure for table `conversation_log`
--

CREATE TABLE `conversation_log` (
  `id` int(11) NOT NULL,
  `input` text NOT NULL,
  `response` longtext NOT NULL,
  `user_id` int(11) NOT NULL,
  `convo_id` text NOT NULL,
  `bot_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `conversation_log`
--

INSERT INTO `conversation_log` (`id`, `input`, `response`, `user_id`, `convo_id`, `bot_id`, `timestamp`) VALUES
(1, 'hello', 'hello', 1, '', 1, '2018-05-27 07:56:58'),
(2, 'hello', 'hello', 1, '', 1, '2018-05-27 08:01:12'),
(3, 'hey', 'keyword not found', 1, '', 1, '2018-05-27 08:01:20');

-- --------------------------------------------------------

--
-- Table structure for table `myprogramo`
--

CREATE TABLE `myprogramo` (
  `id` int(11) NOT NULL,
  `user_name` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `last_ip` varchar(25) NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `myprogramo`
--

INSERT INTO `myprogramo` (`id`, `user_name`, `password`, `last_ip`, `last_login`) VALUES
(1, 'dmorton@geekcavecreations.com', '986fb4494b455629e27ba1d1ad8cfdc8', '127.0.0.1', '2017-06-18 07:49:02'),
(2, 'admin', '21232f297a57a5a743894a0e4a801fc3', '::1', '2018-05-27 07:56:15');

-- --------------------------------------------------------

--
-- Table structure for table `spellcheck`
--

CREATE TABLE `spellcheck` (
  `id` int(11) NOT NULL,
  `missspelling` varchar(100) NOT NULL,
  `correction` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `spellcheck`
--

INSERT INTO `spellcheck` (`id`, `missspelling`, `correction`) VALUES
(1, 'shakespear', 'shakespeare'),
(2, 'shakesper', 'shakespeare'),
(3, 'ws', 'william shakespeare'),
(4, 'shakespaer', 'shakespeare'),
(5, 'shakespere', 'shakespeare'),
(6, 'shakepeare', 'shakespeare'),
(7, 'shakeper', 'shakespeare'),
(8, 'willam', 'william'),
(9, 'willaim', 'william'),
(10, 'romoe', 'romeo'),
(11, 'julet', 'juliet'),
(12, 'juleit', 'juliet'),
(13, 'thats', 'that is'),
(89, 'Youa aare', 'you are'),
(88, 'that s', 'that is'),
(87, 'wot s', 'what is'),
(17, 'whats', 'what is'),
(18, 'wot', 'what'),
(19, 'wots', 'what is'),
(86, 'what s', 'what is'),
(21, 'lool', 'lol'),
(27, 'pogram', 'program'),
(23, 'progam', 'program'),
(26, 'progam', 'program'),
(28, 'r', 'are'),
(29, 'u', 'you'),
(30, 'ur', 'your'),
(31, 'v', 'very'),
(32, 'k', 'ok'),
(33, 'np', 'no problem'),
(34, 'ta', 'thank you'),
(35, 'ty', 'thank you'),
(36, 'omg', 'oh my god'),
(37, 'letts', 'lets'),
(38, 'yeah', 'yes'),
(39, 'yeh', 'yes'),
(40, 'portugues', 'portuguese'),
(41, 'hehe', 'lol'),
(42, 'ha', 'lol'),
(43, 'intersting', 'interesting'),
(44, 'qestion', 'question'),
(45, 'elrond hubbard', 'l.ron hubbard'),
(46, 'programm', 'program'),
(47, 'c\'mon', 'come on'),
(48, 'ye', 'yes'),
(49, 'im', 'i am'),
(50, 'fuckahh', 'fucker'),
(51, 'shakespeare bot', 'shakespearebot'),
(52, 'goodf', 'good'),
(53, 'dont', 'do not'),
(54, 'cos', 'because'),
(55, 'cus', 'because'),
(56, 'coz', 'because'),
(57, 'cuz', 'because'),
(58, 'isnt', 'is not'),
(59, 'isn\'t', 'is not'),
(60, 'i\'m', 'i am'),
(61, 'ima', 'i am a'),
(62, 'chheese', 'cheese'),
(63, 'watsup', 'what is up'),
(64, 'let s', 'let us'),
(65, 'he s', 'he is'),
(66, 'she\'s', 'she is'),
(67, 'i ll', 'i will'),
(68, 'they ll', 'they will'),
(69, 'you re', 'you are'),
(70, 'you ve', 'you have'),
(71, 'hy', 'hey'),
(72, 'msician', 'musician'),
(74, 'don t', 'do not'),
(75, 'can t', 'cannot'),
(76, 'favourite', 'favorite'),
(77, 'colour', 'color'),
(78, 'won t', 'will not'),
(79, 'a/s/l', 'asl'),
(80, 'haven t', 'have not'),
(81, 'doesn t', 'does not'),
(82, 'a/s/l/', 'asl'),
(83, 'wht', 'what'),
(84, 'It s been', 'It has been'),
(85, 'its been', 'it has been'),
(90, 'you re', 'you are'),
(91, 'theres', 'there is'),
(92, 'youa re', 'you are'),
(93, 'youa aare', 'you are'),
(94, 'wath', 'what'),
(95, 'waths', 'what is'),
(96, 'hy', 'hey'),
(97, 'oke', 'ok'),
(98, 'okay', 'ok'),
(99, 'errm', 'erm'),
(100, 'aare', 'are'),
(101, 'shakespeare bot', 'william shakespeare'),
(102, 'shakespearebot', 'william shakespeare'),
(103, 'werwerwer', 'war'),
(109, 'program o', 'programo'),
(106, 'ddddddddd', 'ddddddddd'),
(107, 'ddddddddd', 'ddddddddd'),
(108, 'fgfgfgfg', 'fgfgfgfg'),
(110, 'program-o', 'programo'),
(111, 'fav', 'favorite'),
(112, 'FUCK', 'FUCK'),
(113, 'U', 'YOU');

-- --------------------------------------------------------

--
-- Table structure for table `srai_lookup`
--

CREATE TABLE `srai_lookup` (
  `id` int(11) NOT NULL,
  `bot_id` int(11) NOT NULL,
  `pattern` text NOT NULL,
  `template_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Contains previously stored SRAI calls';

-- --------------------------------------------------------

--
-- Table structure for table `undefined_defaults`
--

CREATE TABLE `undefined_defaults` (
  `id` int(11) NOT NULL,
  `bot_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `pattern` text NOT NULL,
  `template` varchar(256) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `unknown_inputs`
--

CREATE TABLE `unknown_inputs` (
  `id` int(11) NOT NULL,
  `bot_id` int(11) NOT NULL,
  `input` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `unknown_inputs`
--

INSERT INTO `unknown_inputs` (`id`, `bot_id`, `input`, `user_id`, `timestamp`) VALUES
(1, 1, 'HEY', 1, '2018-05-27 08:01:20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` text NOT NULL,
  `session_id` varchar(256) NOT NULL,
  `bot_id` int(11) NOT NULL,
  `chatlines` int(11) NOT NULL,
  `ip` varchar(100) NOT NULL,
  `referer` text NOT NULL,
  `browser` text NOT NULL,
  `date_logged_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `state` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `session_id`, `bot_id`, `chatlines`, `ip`, `referer`, `browser`, `date_logged_on`, `last_update`, `state`) VALUES
(1, 'Seeker', '', 1, 0, '::1', 'http://localhost/hotelv2/user/faq.php', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', '2018-05-27 07:56:58', '2018-05-27 07:56:58', '');

-- --------------------------------------------------------

--
-- Table structure for table `wordcensor`
--

CREATE TABLE `wordcensor` (
  `censor_id` int(11) NOT NULL,
  `word_to_censor` varchar(50) NOT NULL,
  `replace_with` varchar(50) NOT NULL DEFAULT '****',
  `bot_exclude` varchar(256) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wordcensor`
--

INSERT INTO `wordcensor` (`censor_id`, `word_to_censor`, `replace_with`, `bot_exclude`) VALUES
(1, 'SHIT', 'S***', ''),
(2, 'fuck', 'f***', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aiml`
--
ALTER TABLE `aiml`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `topic` (`topic`),
  ADD KEY `thatpattern` (`thatpattern`),
  ADD KEY `pattern` (`pattern`),
  ADD KEY `bot_id` (`bot_id`);

--
-- Indexes for table `aiml_userdefined`
--
ALTER TABLE `aiml_userdefined`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `pattern` (`pattern`),
  ADD KEY `thatpattern` (`thatpattern`),
  ADD KEY `bot_id` (`bot_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `botpersonality`
--
ALTER TABLE `botpersonality`
  ADD PRIMARY KEY (`id`),
  ADD KEY `botname` (`bot_id`,`name`);

--
-- Indexes for table `bots`
--
ALTER TABLE `bots`
  ADD PRIMARY KEY (`bot_id`);

--
-- Indexes for table `client_properties`
--
ALTER TABLE `client_properties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `conversation_log`
--
ALTER TABLE `conversation_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `myprogramo`
--
ALTER TABLE `myprogramo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- Indexes for table `spellcheck`
--
ALTER TABLE `spellcheck`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `srai_lookup`
--
ALTER TABLE `srai_lookup`
  ADD PRIMARY KEY (`id`),
  ADD KEY `template_id` (`template_id`),
  ADD KEY `pattern` (`bot_id`,`pattern`(64));

--
-- Indexes for table `undefined_defaults`
--
ALTER TABLE `undefined_defaults`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unknown_inputs`
--
ALTER TABLE `unknown_inputs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wordcensor`
--
ALTER TABLE `wordcensor`
  ADD PRIMARY KEY (`censor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aiml`
--
ALTER TABLE `aiml`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `aiml_userdefined`
--
ALTER TABLE `aiml_userdefined`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `botpersonality`
--
ALTER TABLE `botpersonality`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bots`
--
ALTER TABLE `bots`
  MODIFY `bot_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `client_properties`
--
ALTER TABLE `client_properties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `conversation_log`
--
ALTER TABLE `conversation_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `myprogramo`
--
ALTER TABLE `myprogramo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `spellcheck`
--
ALTER TABLE `spellcheck`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `srai_lookup`
--
ALTER TABLE `srai_lookup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `undefined_defaults`
--
ALTER TABLE `undefined_defaults`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `unknown_inputs`
--
ALTER TABLE `unknown_inputs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wordcensor`
--
ALTER TABLE `wordcensor`
  MODIFY `censor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
