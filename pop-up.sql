-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2017-04-21 23:11:59
-- 服务器版本： 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pop-up`
--

-- --------------------------------------------------------

--
-- 表的结构 `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `comment_by_id` int(11) NOT NULL,
  `comment_by_name` varchar(60) NOT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `dateTime` datetime NOT NULL,
  `removed` varchar(3) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `comments`
--

INSERT INTO `comments` (`id`, `comment`, `comment_by_id`, `comment_by_name`, `profile_pic`, `dateTime`, `removed`, `post_id`) VALUES
(54, '666', 14, 'wenxuan_han', 'assets/images/profile_pics/wenxuan_han2ad8db01a6ec2a03fbd4b7dee9db148en.jpeg', '2017-04-17 00:54:26', 'no', 95),
(55, 'll', 3, 'niu_bi', 'assets/images/profile_pics/niu_bi2b3841d66aadb9d8b72cecac07ab7daan.jpeg', '2017-04-19 00:42:40', 'no', 96),
(56, 'ðŸ˜˜', 3, 'niu_bi', 'assets/images/profile_pics/niu_bi2b3841d66aadb9d8b72cecac07ab7daan.jpeg', '2017-04-19 19:11:19', 'no', 103),
(57, 'sasdasd', 3, 'niu_bi', 'assets/images/profile_pics/niu_bi2b3841d66aadb9d8b72cecac07ab7daan.jpeg', '2017-04-20 20:48:54', 'no', 98),
(58, 'cc', 0, '', 'wenxuan_han', '2017-04-21 15:55:23', 'no', 117);

-- --------------------------------------------------------

--
-- 表的结构 `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `likes`
--

INSERT INTO `likes` (`id`, `username`, `profile_pic`, `user_id`, `post_id`) VALUES
(36, 'wenxuan_han', 'assets/images/profile_pics/wenxuan_han2ad8db01a6ec2a03fbd4b7dee9db148en.jpeg', 14, 86),
(37, 'wenxuan_han', 'assets/images/profile_pics/wenxuan_han2ad8db01a6ec2a03fbd4b7dee9db148en.jpeg', 14, 95),
(38, 'wenxuan_han', 'assets/images/profile_pics/wenxuan_han2ad8db01a6ec2a03fbd4b7dee9db148en.jpeg', 14, 91),
(39, 'wenxuan_han', 'assets/images/profile_pics/wenxuan_han2ad8db01a6ec2a03fbd4b7dee9db148en.jpeg', 14, 94),
(40, 'niu_bi', 'assets/images/profile_pics/niu_bi2b3841d66aadb9d8b72cecac07ab7daan.jpeg', 3, 98),
(41, 'niu_bi', 'assets/images/profile_pics/niu_bi2b3841d66aadb9d8b72cecac07ab7daan.jpeg', 3, 103),
(42, 'niu_bi', 'assets/images/profile_pics/niu_bi2b3841d66aadb9d8b72cecac07ab7daan.jpeg', 3, 110),
(43, 'wenxuan_han', 'assets/images/profile_pics/wenxuan_han2ad8db01a6ec2a03fbd4b7dee9db148en.jpeg', 14, 115),
(44, 'wenxuan_han', 'assets/images/profile_pics/wenxuan_han2ad8db01a6ec2a03fbd4b7dee9db148en.jpeg', 14, 114),
(45, 'niu_bi', 'assets/images/profile_pics/niu_bi2b3841d66aadb9d8b72cecac07ab7daan.jpeg', 3, 109),
(46, 'niu_bi', 'assets/images/profile_pics/niu_bi2b3841d66aadb9d8b72cecac07ab7daan.jpeg', 3, 97),
(47, 'wenxuan_han', 'assets/images/profile_pics/wenxuan_han2ad8db01a6ec2a03fbd4b7dee9db148en.jpeg', 14, 118),
(48, '', 'wenxuan_han', 0, 117);

-- --------------------------------------------------------

--
-- 表的结构 `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `user_to_id` int(11) NOT NULL,
  `user_from_id` int(11) NOT NULL,
  `message_body` text NOT NULL,
  `date` datetime NOT NULL,
  `opened` varchar(3) NOT NULL,
  `seen` varchar(3) NOT NULL,
  `deleted` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `messages`
--

INSERT INTO `messages` (`id`, `user_to_id`, `user_from_id`, `message_body`, `date`, `opened`, `seen`, `deleted`) VALUES
(1, 1, 7, 'Hi haha', '2017-04-05 22:58:39', 'yes', 'no', 'no'),
(2, 1, 7, 'Hi buudy', '2017-04-05 23:00:25', 'yes', 'no', 'no'),
(3, 1, 7, 'Wassup', '2017-04-05 23:00:31', 'yes', 'no', 'no'),
(4, 7, 1, 'Nothing bro', '2017-04-05 23:03:16', 'yes', 'no', 'no'),
(5, 7, 1, 'boring', '2017-04-05 23:03:20', 'yes', 'no', 'no'),
(6, 1, 7, 'there\r\n', '2017-04-07 15:08:15', 'yes', 'no', 'no'),
(7, 1, 7, 'tomorrow', '2017-04-07 15:12:36', 'yes', 'no', 'no'),
(8, 1, 7, 'we are playing cricket', '2017-04-07 15:12:48', 'yes', 'no', 'no'),
(9, 1, 7, 'come along', '2017-04-07 15:12:54', 'yes', 'no', 'no'),
(10, 1, 7, 'we will play', '2017-04-07 15:13:00', 'yes', 'no', 'no'),
(11, 1, 7, 'text me back', '2017-04-07 15:13:12', 'yes', 'no', 'no'),
(12, 1, 7, 'text me back', '2017-04-07 15:14:11', 'yes', 'no', 'no'),
(13, 1, 7, 'text me back', '2017-04-07 15:15:20', 'yes', 'no', 'no'),
(14, 1, 7, 'text me back', '2017-04-07 15:17:22', 'yes', 'no', 'no'),
(15, 1, 7, 'text me back', '2017-04-07 15:17:48', 'yes', 'no', 'no'),
(16, 1, 7, 'text me back', '2017-04-07 15:18:07', 'yes', 'no', 'no'),
(17, 1, 7, 'text me back', '2017-04-07 15:18:27', 'yes', 'no', 'no'),
(18, 1, 7, 'text me back', '2017-04-07 15:18:50', 'yes', 'no', 'no'),
(19, 1, 7, 'text me back', '2017-04-07 15:19:25', 'yes', 'no', 'no'),
(20, 1, 7, 'text me back', '2017-04-07 15:20:01', 'yes', 'no', 'no'),
(21, 1, 7, 'text me back', '2017-04-07 15:20:25', 'yes', 'no', 'no'),
(22, 1, 7, 'text me back', '2017-04-07 15:20:46', 'yes', 'no', 'no'),
(23, 1, 7, 'text me back', '2017-04-07 15:21:11', 'yes', 'no', 'no'),
(24, 1, 7, 'text me back', '2017-04-07 15:21:53', 'yes', 'no', 'no'),
(25, 1, 7, 'text me back', '2017-04-07 15:22:31', 'yes', 'no', 'no'),
(26, 1, 7, 'text me back', '2017-04-07 15:23:06', 'yes', 'no', 'no'),
(27, 1, 7, 'text me back', '2017-04-07 15:23:34', 'yes', 'no', 'no'),
(28, 1, 7, 'text me back', '2017-04-07 15:37:37', 'yes', 'no', 'no'),
(29, 1, 7, 'text me back', '2017-04-07 15:38:28', 'yes', 'no', 'no'),
(30, 1, 7, 'text me back', '2017-04-07 15:39:08', 'yes', 'no', 'no'),
(31, 1, 7, 'text me back', '2017-04-07 15:40:59', 'yes', 'no', 'no'),
(32, 1, 7, 'text me back', '2017-04-07 15:42:34', 'yes', 'no', 'no'),
(33, 1, 7, 'text me back', '2017-04-07 15:43:09', 'yes', 'no', 'no'),
(34, 1, 7, 'text me back', '2017-04-07 15:43:35', 'yes', 'no', 'no'),
(35, 1, 7, 'text me back', '2017-04-07 15:44:36', 'yes', 'no', 'no'),
(36, 1, 7, 'text me back', '2017-04-07 15:47:37', 'yes', 'no', 'no'),
(37, 1, 7, 'text me back', '2017-04-07 15:47:58', 'yes', 'no', 'no'),
(38, 1, 7, '123456789012345', '2017-04-07 17:58:59', 'yes', 'no', 'no'),
(39, 3, 7, 'hii bro', '2017-04-07 18:04:09', 'yes', 'yes', 'no'),
(40, 6, 7, 'hi han\r\n', '2017-04-07 18:11:50', 'yes', 'no', 'no'),
(41, 6, 7, 'there??\r\n', '2017-04-08 02:20:08', 'yes', 'no', 'no'),
(42, 6, 7, 'Hi\r\n', '2017-04-09 16:24:23', 'yes', 'no', 'no'),
(43, 1, 7, 'fijhweijfbiwejb', '2017-04-11 14:30:40', 'yes', 'no', 'no'),
(44, 7, 1, '!!!!', '2017-04-11 14:49:28', 'yes', 'no', 'no'),
(45, 4, 7, 'vdhvhj', '2017-04-12 19:22:51', 'no', 'no', 'no'),
(46, 1, 7, 'New Message', '2017-04-13 14:32:55', 'no', 'no', 'no'),
(47, 1, 7, 'New Message', '2017-04-13 14:33:03', 'no', 'no', 'no'),
(48, 1, 7, 'new message2', '2017-04-13 14:37:13', 'no', 'no', 'no'),
(49, 1, 7, 'message new one', '2017-04-13 14:37:39', 'no', 'no', 'no'),
(50, 1, 7, 'hi there', '2017-04-14 01:10:27', 'no', 'yes', 'no'),
(51, 7, 6, 'Yep bro\r\n', '2017-04-14 13:48:34', 'yes', 'no', 'no'),
(52, 8, 7, 'hii', '2017-04-14 13:56:30', 'no', 'no', 'no'),
(53, 1, 3, 'hello', '2017-04-14 15:43:26', 'no', 'no', 'no'),
(54, 2, 3, 'lu jj', '2017-04-14 15:51:36', 'yes', 'no', 'no'),
(55, 2, 3, 'why so big', '2017-04-14 15:54:25', 'yes', 'no', 'no'),
(56, 2, 3, 'hello', '2017-04-14 16:29:29', 'yes', 'no', 'no'),
(57, 3, 2, 'ioiuhbiuhbiu', '2017-04-14 16:31:06', 'yes', 'yes', 'no'),
(58, 0, 10, 'hi', '2017-04-15 00:53:46', 'no', 'no', 'no'),
(59, 3, 14, 'hi', '2017-04-17 12:32:12', 'yes', 'yes', 'no'),
(60, 3, 14, 'nice', '2017-04-19 15:47:09', 'yes', 'yes', 'no'),
(61, 14, 3, 'hello', '2017-04-19 18:40:17', 'yes', 'yes', 'no'),
(62, 14, 3, 'hh', '2017-04-19 18:40:47', 'yes', 'yes', 'no'),
(63, 3, 14, 'll', '2017-04-19 18:41:18', 'yes', 'yes', 'no'),
(64, 3, 14, 'ff', '2017-04-19 19:08:30', 'yes', 'yes', 'no'),
(65, 3, 14, 'aaa', '2017-04-19 19:09:35', 'yes', 'yes', 'no'),
(66, 3, 14, 'asd', '2017-04-19 19:09:38', 'yes', 'yes', 'no'),
(67, 3, 14, 'jk', '2017-04-19 22:39:18', 'yes', 'yes', 'no'),
(68, 14, 3, 'fgfdgfdgdfgfdgfdgdfgdfgdfgfdgfdgdfgdfgdfgdfgdfg', '2017-04-19 22:47:30', 'yes', 'yes', 'no'),
(69, 14, 3, 'dfgdfg', '2017-04-19 22:51:44', 'yes', 'yes', 'no'),
(70, 14, 3, 'cv', '2017-04-19 22:51:51', 'yes', 'yes', 'no'),
(71, 14, 3, '666', '2017-04-19 23:09:30', 'yes', 'yes', 'no'),
(72, 1, 3, 'gfg', '2017-04-20 00:11:35', 'no', 'no', 'no'),
(73, 1, 3, 'as', '2017-04-20 00:14:09', 'no', 'no', 'no'),
(74, 14, 3, 'nice', '2017-04-20 00:17:00', 'yes', 'yes', 'no'),
(75, 6, 14, 'no', '2017-04-20 00:18:45', 'no', 'no', 'no'),
(76, 3, 14, 'nice', '2017-04-20 15:46:11', 'yes', 'yes', 'no'),
(77, 3, 14, 'nice', '2017-04-20 15:46:19', 'yes', 'yes', 'no'),
(78, 2, 14, 'nihao\r\n', '2017-04-20 15:47:08', 'no', 'no', 'no'),
(79, 2, 14, 'ghddhhgfhg\r\njghkjgkjhg\r\njgbmjgbmj', '2017-04-20 15:47:21', 'no', 'no', 'no');

-- --------------------------------------------------------

--
-- 表的结构 `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `text` text NOT NULL,
  `added_by_id` int(11) NOT NULL,
  `added_by_name` varchar(60) NOT NULL,
  `date` datetime NOT NULL,
  `user_closed` varchar(3) NOT NULL,
  `deleted` varchar(3) NOT NULL,
  `likes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `posts`
--

INSERT INTO `posts` (`id`, `text`, `added_by_id`, `added_by_name`, `date`, `user_closed`, `deleted`, `likes`) VALUES
(91, '666', 14, 'wenxuan_han', '2017-04-17 00:49:58', 'no', 'no', 1),
(92, '<img src=\'assets/images/post_pics/wenxuan_han553d8bfc4c0f216924dbf5d5e971aba3haha.jpg\' width=\'70%\'>', 14, 'wenxuan_han', '2017-04-17 00:50:15', 'no', 'no', 0),
(94, '<embed src=\'assets/images/post_videos/wenxuan_han02666b52d696ff1a0c7a40a714b25989CH11.mp4\' autoplay=\'false\' width=\'420\' height=\'315\'></embed>', 14, 'wenxuan_han', '2017-04-17 00:51:35', 'no', 'no', 1),
(95, '<iframe src=\'https://www.youtube.com/embed/M11SvDtPBhA\' width=\'420\' height=\'315\'></iframe>', 14, 'wenxuan_han', '2017-04-17 00:52:01', 'no', 'no', 1),
(96, '666', 3, 'niu_bi', '2017-04-18 23:41:56', 'no', 'no', 0),
(97, 'asdasd', 3, 'niu_bi', '2017-04-19 00:31:37', 'no', 'no', 1),
(98, '<img src=\'assets/images/post_pics/niu_bib48c6824a33b881a0abfd753979a20bfJason2.jpg\' width=\'70%\'>', 3, 'niu_bi', '2017-04-19 00:31:48', 'no', 'no', 1),
(99, '<strong>Shared from niu_bi: </strong><img src=\"assets/images/post_pics/niu_bib48c6824a33b881a0abfd753979a20bfJason2.jpg\" width=\"70%\">', 14, 'wenxuan_han', '2017-04-19 00:42:18', 'no', 'no', 0),
(100, '<strong>Shared from niu_bi: </strong>asdasd', 14, 'wenxuan_han', '2017-04-19 00:42:32', 'no', 'no', 0),
(101, '<strong>Shared from niu_bi: </strong><img src=\"assets/images/post_pics/niu_bib48c6824a33b881a0abfd753979a20bfJason2.jpg\" width=\"70%\">', 14, 'wenxuan_han', '2017-04-19 12:46:43', 'no', 'no', 0),
(102, '<strong>Shared from niu_bi: </strong><br><img src=\"assets/images/post_pics/niu_bib48c6824a33b881a0abfd753979a20bfJason2.jpg\" width=\"70%\">', 14, 'wenxuan_han', '2017-04-19 12:47:47', 'no', 'no', 0),
(103, '<strong>Shared from wenxuan_han: </strong><br><strong>Shared from niu_bi: </strong>asdasd', 14, 'wenxuan_han', '2017-04-19 12:47:53', 'no', 'no', 1),
(104, '<strong>Shared from wenxuan_han: </strong><br><iframe src=\"https://www.youtube.com/embed/M11SvDtPBhA\" height=\"315\" width=\"420\"></iframe>', 14, 'wenxuan_han', '2017-04-19 12:48:09', 'no', 'no', 0),
(105, '<strong>Shared from wenxuan_han: </strong><br><img src=\"assets/images/post_pics/wenxuan_han553d8bfc4c0f216924dbf5d5e971aba3haha.jpg\" width=\"70%\">', 14, 'wenxuan_han', '2017-04-19 12:48:22', 'no', 'no', 0),
(106, '555', 6, 'niu_bi2', '2017-04-19 14:52:48', 'no', 'no', 0),
(107, '<img src=\'assets/images/post_pics/niu_bi2814fe9fd6d9043d7d7ade0b0b6f37548Jason1.jpg\' width=\'70%\'>', 6, 'niu_bi2', '2017-04-19 14:52:54', 'no', 'no', 0),
(108, '<strong>Shared from niu_bi2: </strong><br><img src=\"assets/images/post_pics/niu_bi2814fe9fd6d9043d7d7ade0b0b6f37548Jason1.jpg\" width=\"70%\">', 14, 'wenxuan_han', '2017-04-19 15:07:33', 'no', 'yes', 0),
(109, '<strong>Shared from wenxuan_han: </strong><br><strong>Shared from wenxuan_han: </strong><br><img src=\"assets/images/post_pics/wenxuan_han553d8bfc4c0f216924dbf5d5e971aba3haha.jpg\" width=\"70%\">', 3, 'niu_bi', '2017-04-19 16:35:44', 'no', 'no', 1),
(110, '<img src=\'assets/images/post_pics/wenxuan_haneb0952c25ee707acb918ef2a8d324d45Jason1.jpg\' width=\'70%\'>', 14, 'wenxuan_han', '2017-04-19 16:55:11', 'no', 'no', 1),
(111, '<strong>Shared from wenxuan_han: </strong><br><strong>Shared from niu_bi: </strong><br><img src=\"assets/images/post_pics/niu_bib48c6824a33b881a0abfd753979a20bfJason2.jpg\" width=\"70%\">', 14, 'wenxuan_han', '2017-04-20 00:30:19', 'no', 'no', 0),
(112, '<strong>Shared from wenxuan_han: </strong><br><img src=\"assets/images/post_pics/wenxuan_haneb0952c25ee707acb918ef2a8d324d45Jason1.jpg\" width=\"70%\">', 14, 'wenxuan_han', '2017-04-20 00:30:25', 'no', 'no', 0),
(113, 'ggg', 14, 'wenxuan_han', '2017-04-20 00:31:28', 'no', 'no', 0),
(114, '<strong>Shared from wenxuan_han: </strong><br>ggg', 14, 'wenxuan_han', '2017-04-20 00:31:31', 'no', 'no', 1),
(115, '<strong>Shared from wenxuan_han: </strong><br><strong>Shared from wenxuan_han: </strong><br>ggg', 14, 'wenxuan_han', '2017-04-20 00:31:35', 'no', 'no', 1),
(116, '<strong>Shared from niu_bi: </strong><br><img src=\"assets/images/post_pics/niu_bib48c6824a33b881a0abfd753979a20bfJason2.jpg\" width=\"70%\">', 14, 'wenxuan_han', '2017-04-20 20:48:58', 'no', 'no', 0),
(117, '<strong>Shared from niu_bi: </strong><br><strong>Shared from wenxuan_han: </strong><br><strong>Shared from wenxuan_han: </strong><br><img src=\"assets/images/post_pics/wenxuan_han553d8bfc4c0f216924dbf5d5e971aba3haha.jpg\" width=\"70%\">', 14, 'wenxuan_han', '2017-04-20 20:49:08', 'no', 'no', 1),
(118, '<strong>Shared from wenxuan_han: </strong><br><img src=\"assets/images/post_pics/wenxuan_han553d8bfc4c0f216924dbf5d5e971aba3haha.jpg\" width=\"70%\">', 3, 'niu_bi', '2017-04-21 00:44:18', 'no', 'no', 1);

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `signup_date` date NOT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `num_posts` int(11) NOT NULL DEFAULT '0',
  `num_bumps` int(11) NOT NULL DEFAULT '0',
  `user_closed` varchar(3) NOT NULL DEFAULT 'yes'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `email`, `password`, `signup_date`, `profile_pic`, `num_posts`, `num_bumps`, `user_closed`) VALUES
(1, 'Yujie', 'Wu', 'yujiw_wu', 'yujie@iu.edu', 'e10adc3949ba59abbe56e057f20f883e', '2017-02-09', 'assets/images/profile_pics/defaults/head_carrot.png', 0, 0, 'no'),
(2, 'Wen', 'Han', 'wen_han', 'Hanw@iu.edu', 'e10adc3949ba59abbe56e057f20f883e', '2017-02-16', 'assets/images/profile_pics/defaults/head_deep_blue.png', 0, 0, 'no'),
(3, 'Niu', 'Bi', 'niu_bi', 'cswuyujieapp@126.com', '040b7cf4a55014e185813e0644502ea9', '2017-02-16', 'assets/images/profile_pics/niu_bi2b3841d66aadb9d8b72cecac07ab7daan.jpeg', 0, 4, 'no'),
(4, 'Ninad', 'Kak', 'ninad_kak', 'ninadbandodkar@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2017-02-17', 'assets/images/profile_pics/defaults/head_sun_flower.png', 0, 0, 'no'),
(5, 'Nikil', 'Lesh', 'nikil_lesh', 'hah@gmail.com', '040b7cf4a55014e185813e0644502ea9', '2017-03-04', 'assets/images/profile_pics/defaults/head_emerald.png', 0, 0, 'no'),
(6, 'Niu', 'Bi2', 'niu_bi2', 'niubi2p@126.com', '040b7cf4a55014e185813e0644502ea9', '2017-02-16', 'assets/images/profile_pics/defaults/head_emerald.png', 0, 0, 'no'),
(7, 'Niu', 'Bi3', 'niu_bi3', 'niubi3@126.com', '040b7cf4a55014e185813e0644502ea9', '2017-02-16', 'assets/images/profile_pics/defaults/head_emerald.png', 0, 0, 'no'),
(8, 'Niu', 'Bi7', 'niu_bi7', 'niubi7@126.com', '040b7cf4a55014e185813e0644502ea9', '2017-02-16', 'assets/images/profile_pics/defaults/head_emerald.png', 0, 0, 'no'),
(9, 'Test1', 'Test1', 'test1_test1', 'test1@gmail.com', '040b7cf4a55014e185813e0644502ea9', '2017-04-05', 'assets/images/profile_pics/defaults/head_deep_blue.png', 0, 0, 'yes'),
(14, 'Wenxuan', 'Han', 'wenxuan_han', '1053301328@qq.com', '040b7cf4a55014e185813e0644502ea9', '2017-04-15', 'assets/images/profile_pics/wenxuan_han2ad8db01a6ec2a03fbd4b7dee9db148en.jpeg', 0, 0, 'no');

-- --------------------------------------------------------

--
-- 表的结构 `users2`
--

CREATE TABLE `users2` (
  `id` int(11) NOT NULL,
  `age` int(3) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `street` varchar(255) NOT NULL,
  `city` varchar(55) NOT NULL,
  `province` varchar(55) NOT NULL,
  `country` varchar(55) NOT NULL,
  `background_pic` varchar(255) NOT NULL,
  `info3` int(11) NOT NULL,
  `info4` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `users2`
--

INSERT INTO `users2` (`id`, `age`, `gender`, `street`, `city`, `province`, `country`, `background_pic`, `info3`, `info4`) VALUES
(1, 0, 'male', '3th st.', 'bloomington', 'IN', 'US', '', 0, 0),
(2, 0, 'male', '', '', '', '', '', 0, 0),
(3, 21, 'male', '6TH ', 'Bloomington', 'IN', 'China', 'assets/images/themes/th5.jpg', 0, 0),
(4, 11, 'male', '', '', '', '', '', 0, 0),
(5, 0, 'male', '', '', '', '', '', 0, 0),
(6, 0, 'male', '', '', '', '', '', 0, 0),
(7, 0, 'male', '', '', '', '', '', 0, 0),
(8, 0, 'male', '', '', '', '', '', 0, 0),
(14, 19, 'male', 'center', 'Bloomington', 'ppp', 'US', 'assets/images/themes/th6.jpg', 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `user_friend`
--

CREATE TABLE `user_friend` (
  `user_id` int(11) NOT NULL,
  `friend_id` int(11) NOT NULL,
  `block` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `user_friend`
--

INSERT INTO `user_friend` (`user_id`, `friend_id`, `block`) VALUES
(0, 3, 'no'),
(1, 3, 'no'),
(2, 3, 'no'),
(2, 14, 'yes'),
(3, 0, 'no'),
(3, 1, 'no'),
(3, 2, 'no'),
(3, 5, 'no'),
(3, 12, 'yes'),
(3, 14, 'yes'),
(5, 3, 'no'),
(6, 14, 'yes'),
(12, 3, 'pnd'),
(14, 2, 'no'),
(14, 3, 'pnd'),
(14, 6, 'no');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `users2`
--
ALTER TABLE `users2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_friend`
--
ALTER TABLE `user_friend`
  ADD PRIMARY KEY (`user_id`,`friend_id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- 使用表AUTO_INCREMENT `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- 使用表AUTO_INCREMENT `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;
--
-- 使用表AUTO_INCREMENT `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;
--
-- 使用表AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
