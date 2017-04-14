-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3308
-- Generation Time: 2017-04-15 00:18:30
-- 服务器版本： 10.1.19-MariaDB
-- PHP Version: 5.6.28

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
(1, 'good', 3, 'niu_bi', 'assets/images/profile_pics/niu_bia7c6a80077b4ad9adeeb90a4708b3eb0n.jpeg', '2017-03-16 18:06:54', 'no', 15),
(2, 'nice', 3, 'niu_bi', 'assets/images/profile_pics/niu_bia7c6a80077b4ad9adeeb90a4708b3eb0n.jpeg', '2017-03-16 18:07:43', 'no', 15),
(3, 'nintendo', 3, 'niu_bi', 'assets/images/profile_pics/niu_bia7c6a80077b4ad9adeeb90a4708b3eb0n.jpeg', '2017-03-16 18:11:05', 'no', 15),
(6, 'lu jj', 3, 'niu_bi', 'assets/images/profile_pics/niu_bia7c6a80077b4ad9adeeb90a4708b3eb0n.jpeg', '2017-03-16 18:50:25', 'no', 15),
(8, 'great', 3, 'niu_bi', 'assets/images/profile_pics/niu_bia7c6a80077b4ad9adeeb90a4708b3eb0n.jpeg', '2017-03-16 18:59:40', 'no', 15),
(9, 'lu jj', 3, 'niu_bi', 'assets/images/profile_pics/niu_bia7c6a80077b4ad9adeeb90a4708b3eb0n.jpeg', '2017-03-17 14:10:19', 'no', 13),
(10, 'lala', 1, 'yujiw_wu', 'assets/images/profile_pics/defaults/head_carrot.png', '2017-03-21 12:49:41', 'no', 15),
(11, 'lu kk', 1, 'yujiw_wu', 'assets/images/profile_pics/defaults/head_carrot.png', '2017-03-21 12:54:56', 'no', 16),
(13, 'hao', 3, 'niu_bi', 'assets/images/profile_pics/niu_bia7c6a80077b4ad9adeeb90a4708b3eb0n.jpeg', '2017-03-21 22:26:07', 'no', 19),
(15, 'undefined', 3, 'niu_bi', 'assets/images/profile_pics/niu_bia7c6a80077b4ad9adeeb90a4708b3eb0n.jpeg', '2017-03-29 17:18:07', 'no', 0),
(16, 'undefined', 3, 'niu_bi', 'assets/images/profile_pics/niu_bia7c6a80077b4ad9adeeb90a4708b3eb0n.jpeg', '2017-03-29 17:18:09', 'no', 0),
(17, 'undefined', 3, 'niu_bi', 'assets/images/profile_pics/niu_bia7c6a80077b4ad9adeeb90a4708b3eb0n.jpeg', '2017-03-29 17:18:12', 'no', 0),
(18, 'undefined', 3, 'niu_bi', 'assets/images/profile_pics/niu_bia7c6a80077b4ad9adeeb90a4708b3eb0n.jpeg', '2017-03-29 17:18:13', 'no', 0),
(19, 'undefined', 3, 'niu_bi', 'assets/images/profile_pics/niu_bia7c6a80077b4ad9adeeb90a4708b3eb0n.jpeg', '2017-03-29 17:18:14', 'no', 0),
(20, 'undefined', 3, 'niu_bi', 'assets/images/profile_pics/niu_bia7c6a80077b4ad9adeeb90a4708b3eb0n.jpeg', '2017-03-29 17:18:26', 'no', 0),
(21, 'undefined', 3, 'niu_bi', 'assets/images/profile_pics/niu_bia7c6a80077b4ad9adeeb90a4708b3eb0n.jpeg', '2017-03-29 17:18:27', 'no', 0),
(22, 'undefined', 3, 'niu_bi', 'assets/images/profile_pics/niu_bia7c6a80077b4ad9adeeb90a4708b3eb0n.jpeg', '2017-03-29 17:18:27', 'no', 0),
(23, 'undefined', 3, 'niu_bi', 'assets/images/profile_pics/niu_bia7c6a80077b4ad9adeeb90a4708b3eb0n.jpeg', '2017-03-29 17:18:29', 'no', 0),
(24, 'undefined', 3, 'niu_bi', 'assets/images/profile_pics/niu_bia7c6a80077b4ad9adeeb90a4708b3eb0n.jpeg', '2017-03-29 17:18:31', 'no', 0),
(25, 'undefined', 3, 'niu_bi', 'assets/images/profile_pics/niu_bia7c6a80077b4ad9adeeb90a4708b3eb0n.jpeg', '2017-03-29 17:18:31', 'no', 0),
(26, 'undefined', 3, 'niu_bi', 'assets/images/profile_pics/niu_bia7c6a80077b4ad9adeeb90a4708b3eb0n.jpeg', '2017-03-29 17:18:31', 'no', 0),
(27, 'undefined', 3, 'niu_bi', 'assets/images/profile_pics/niu_bia7c6a80077b4ad9adeeb90a4708b3eb0n.jpeg', '2017-03-29 17:18:31', 'no', 0),
(28, 'undefined', 3, 'niu_bi', 'assets/images/profile_pics/niu_bia7c6a80077b4ad9adeeb90a4708b3eb0n.jpeg', '2017-03-29 17:18:31', 'no', 0),
(29, 'undefined', 3, 'niu_bi', 'assets/images/profile_pics/niu_bia7c6a80077b4ad9adeeb90a4708b3eb0n.jpeg', '2017-03-29 17:18:35', 'no', 0),
(30, 'undefined', 3, 'niu_bi', 'assets/images/profile_pics/niu_bia7c6a80077b4ad9adeeb90a4708b3eb0n.jpeg', '2017-03-29 17:18:36', 'no', 0),
(31, 'undefined', 3, 'niu_bi', 'assets/images/profile_pics/niu_bia7c6a80077b4ad9adeeb90a4708b3eb0n.jpeg', '2017-03-29 17:18:36', 'no', 0),
(32, 'undefined', 3, 'niu_bi', 'assets/images/profile_pics/niu_bia7c6a80077b4ad9adeeb90a4708b3eb0n.jpeg', '2017-03-29 17:18:36', 'no', 0),
(33, 'undefined', 3, 'niu_bi', 'assets/images/profile_pics/niu_bia7c6a80077b4ad9adeeb90a4708b3eb0n.jpeg', '2017-03-29 17:18:36', 'no', 0),
(34, 'asd', 0, '', 'undefined', '2017-03-29 17:19:23', 'no', 20),
(35, 'good', 3, 'niu_bi', 'assets/images/profile_pics/niu_bia7c6a80077b4ad9adeeb90a4708b3eb0n.jpeg', '2017-03-29 17:34:17', 'no', 20),
(36, 'asd', 3, 'niu_bi', 'assets/images/profile_pics/niu_bia7c6a80077b4ad9adeeb90a4708b3eb0n.jpeg', '2017-03-29 17:39:02', 'no', 20),
(37, 'ps4ðŸ˜˜', 3, 'niu_bi', 'assets/images/profile_pics/niu_bia7c6a80077b4ad9adeeb90a4708b3eb0n.jpeg', '2017-04-04 20:49:46', 'no', 26),
(38, 'hhhk', 3, 'niu_bi', 'assets/images/profile_pics/niu_bia7c6a80077b4ad9adeeb90a4708b3eb0n.jpeg', '2017-04-07 16:40:31', 'no', 35),
(42, 'han', 3, 'niu_bi', 'assets/images/profile_pics/niu_bia7c6a80077b4ad9adeeb90a4708b3eb0n.jpeg', '2017-04-07 16:47:23', 'no', 35),
(43, 'ðŸ’’ðŸ¨ðŸŒ†ðŸ¯ðŸŽ‘ðŸŽƒðŸŽ‹ðŸŽðŸŽ‡ðŸ¨ðŸµðŸ´ðŸ½ðŸ˜˜ðŸ˜žðŸ˜¢ðŸ˜ðŸ˜žðŸ½', 3, 'niu_bi', 'assets/images/profile_pics/niu_bia7c6a80077b4ad9adeeb90a4708b3eb0n.jpeg', '2017-04-07 17:28:25', 'no', 35),
(44, 'nice', 3, 'niu_bi', 'assets/images/profile_pics/niu_bia7c6a80077b4ad9adeeb90a4708b3eb0n.jpeg', '2017-04-07 19:12:45', 'no', 38),
(46, 'DFGDFG', 3, 'niu_bi', 'assets/images/profile_pics/niu_bia7c6a80077b4ad9adeeb90a4708b3eb0n.jpeg', '2017-04-14 16:22:04', 'no', 51),
(47, 'kkkðŸ˜˜', 3, 'niu_bi', 'assets/images/profile_pics/niu_bia7c6a80077b4ad9adeeb90a4708b3eb0n.jpeg', '2017-04-14 16:38:59', 'no', 55),
(48, 'laji', 3, 'niu_bi', 'assets/images/profile_pics/niu_bia7c6a80077b4ad9adeeb90a4708b3eb0n.jpeg', '2017-04-14 17:15:46', 'no', 57),
(49, 'ttðŸ½', 3, 'niu_bi', 'assets/images/profile_pics/niu_bia7c6a80077b4ad9adeeb90a4708b3eb0n.jpeg', '2017-04-14 17:31:23', 'no', 57);

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
(1, 'niu_bi', 'assets/images/profile_pics/niu_bia7c6a80077b4ad9adeeb90a4708b3eb0n.jpeg', 3, 13),
(2, 'niu_bi', 'assets/images/profile_pics/niu_bia7c6a80077b4ad9adeeb90a4708b3eb0n.jpeg', 3, 15),
(3, 'niu_bi', 'assets/images/profile_pics/niu_bia7c6a80077b4ad9adeeb90a4708b3eb0n.jpeg', 3, 14),
(5, 'niu_bi', 'assets/images/profile_pics/niu_bia7c6a80077b4ad9adeeb90a4708b3eb0n.jpeg', 3, 12),
(6, 'niu_bi', 'assets/images/profile_pics/niu_bia7c6a80077b4ad9adeeb90a4708b3eb0n.jpeg', 3, 11),
(7, 'niu_bi', 'assets/images/profile_pics/niu_bia7c6a80077b4ad9adeeb90a4708b3eb0n.jpeg', 3, 10),
(8, 'niu_bi', 'assets/images/profile_pics/niu_bia7c6a80077b4ad9adeeb90a4708b3eb0n.jpeg', 3, 9),
(9, 'niu_bi', 'assets/images/profile_pics/niu_bia7c6a80077b4ad9adeeb90a4708b3eb0n.jpeg', 3, 8),
(10, 'niu_bi', 'assets/images/profile_pics/niu_bia7c6a80077b4ad9adeeb90a4708b3eb0n.jpeg', 3, 7),
(11, 'yujiw_wu', 'assets/images/profile_pics/defaults/head_carrot.png', 1, 16),
(12, 'niu_bi', 'assets/images/profile_pics/niu_bia7c6a80077b4ad9adeeb90a4708b3eb0n.jpeg', 3, 16),
(13, 'niu_bi', 'assets/images/profile_pics/niu_bia7c6a80077b4ad9adeeb90a4708b3eb0n.jpeg', 3, 4),
(14, 'niu_bi', 'assets/images/profile_pics/niu_bia7c6a80077b4ad9adeeb90a4708b3eb0n.jpeg', 3, 18),
(15, 'niu_bi', 'assets/images/profile_pics/niu_bia7c6a80077b4ad9adeeb90a4708b3eb0n.jpeg', 3, 19),
(16, 'yujiw_wu', 'assets/images/profile_pics/defaults/head_carrot.png', 1, 19),
(17, 'yujiw_wu', 'assets/images/profile_pics/defaults/head_carrot.png', 1, 15),
(18, 'yujiw_wu', 'assets/images/profile_pics/defaults/head_carrot.png', 1, 2),
(19, 'niu_bi', 'assets/images/profile_pics/niu_bia7c6a80077b4ad9adeeb90a4708b3eb0n.jpeg', 3, 20),
(20, 'niu_bi', 'assets/images/profile_pics/niu_bia7c6a80077b4ad9adeeb90a4708b3eb0n.jpeg', 3, 21),
(21, 'niu_bi', 'assets/images/profile_pics/niu_bia7c6a80077b4ad9adeeb90a4708b3eb0n.jpeg', 3, 22),
(22, 'niu_bi', 'assets/images/profile_pics/niu_bia7c6a80077b4ad9adeeb90a4708b3eb0n.jpeg', 3, 17),
(23, 'niu_bi', 'assets/images/profile_pics/niu_bia7c6a80077b4ad9adeeb90a4708b3eb0n.jpeg', 3, 5),
(24, 'niu_bi', 'assets/images/profile_pics/niu_bia7c6a80077b4ad9adeeb90a4708b3eb0n.jpeg', 3, 3),
(25, 'niu_bi', 'assets/images/profile_pics/niu_bia7c6a80077b4ad9adeeb90a4708b3eb0n.jpeg', 3, 27),
(26, 'niu_bi', 'assets/images/profile_pics/niu_bia7c6a80077b4ad9adeeb90a4708b3eb0n.jpeg', 3, 30),
(27, 'niu_bi', 'assets/images/profile_pics/niu_bia7c6a80077b4ad9adeeb90a4708b3eb0n.jpeg', 3, 31),
(28, 'niu_bi', 'assets/images/profile_pics/niu_bia7c6a80077b4ad9adeeb90a4708b3eb0n.jpeg', 3, 38),
(29, 'niu_bi', 'assets/images/profile_pics/niu_bia7c6a80077b4ad9adeeb90a4708b3eb0n.jpeg', 3, 51),
(30, 'niu_bi', 'assets/images/profile_pics/niu_bia7c6a80077b4ad9adeeb90a4708b3eb0n.jpeg', 3, 55),
(31, 'niu_bi', 'assets/images/profile_pics/niu_bia7c6a80077b4ad9adeeb90a4708b3eb0n.jpeg', 3, 56),
(32, 'niu_bi', 'assets/images/profile_pics/niu_bia7c6a80077b4ad9adeeb90a4708b3eb0n.jpeg', 3, 57);

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
(39, 3, 7, 'hii bro', '2017-04-07 18:04:09', 'yes', 'no', 'no'),
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
(57, 3, 2, 'ioiuhbiuhbiu', '2017-04-14 16:31:06', 'yes', 'no', 'no');

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
(2, 'hello world', 3, 'niu_bi', '2017-02-25 17:08:08', 'no', 'no', 1),
(3, 'ni hao', 3, 'niu_bi', '2017-02-25 17:14:18', 'no', 'no', 1),
(4, 'game over', 3, 'niu_bi', '2017-02-26 17:45:11', 'no', 'no', 1),
(5, 'gou', 3, 'niu_bi', '2017-02-26 17:58:41', 'no', 'no', 1),
(7, 'han wen xuan', 3, 'niu_bi', '2017-03-02 15:03:03', 'no', 'no', 1),
(8, 'have a nice day ', 3, 'niu_bi', '2017-03-02 15:58:23', 'no', 'no', 1),
(9, 'facebook', 3, 'niu_bi', '2017-03-02 16:18:19', 'no', 'no', 1),
(10, 'wenhan', 2, 'wen_han', '2017-03-14 21:07:26', 'no', 'no', 1),
(11, 'iron man', 2, 'wen_han', '2017-03-14 21:07:37', 'no', 'no', 1),
(12, 'kim', 2, 'wen_han', '2017-03-14 21:07:45', 'no', 'no', 1),
(13, 'lu jj', 2, 'wen_han', '2017-03-14 21:07:57', 'no', 'no', 1),
(14, 'gta5', 3, 'niu_bi', '2017-03-14 21:09:05', 'no', 'no', 1),
(15, 'switch', 3, 'niu_bi', '2017-03-15 11:06:58', 'no', 'no', 2),
(16, 'sunday', 1, 'yujiw_wu', '2017-03-21 12:54:36', 'no', 'no', 2),
(17, 'shabi', 3, 'niu_bi', '2017-03-21 17:13:44', 'no', 'no', 1),
(18, 'jibajibajibajibajibajibajibajibajibajibajibajibajibajibajibajibajibajibajibajibajibajibajibajibajibajibajibajibajibajibajibajibajibajibajibajibajibajibajibajibajibajibajibajibajiba', 3, 'niu_bi', '2017-03-21 21:46:28', 'no', 'no', 1),
(19, 'kkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk', 3, 'niu_bi', '2017-03-21 21:59:43', 'no', 'no', 2),
(20, 'monday', 3, 'niu_bi', '2017-03-21 22:28:51', 'no', 'no', 1),
(21, 'dsf', 3, 'niu_bi', '2017-03-22 17:37:53', 'no', 'yes', 1),
(22, 'hao', 3, 'niu_bi', '2017-03-27 16:05:11', 'no', 'yes', 1),
(23, 'jj', 3, 'niu_bi', '2017-03-28 18:15:06', 'no', 'yes', 0),
(24, 'fff', 3, 'niu_bi', '2017-04-04 18:38:11', 'no', 'no', 0),
(25, 'lalala\r\n	            			', 3, 'niu_bi', '2017-04-04 18:48:59', 'no', 'no', 0),
(26, 'nihao\r\n	            			', 3, 'niu_bi', '2017-04-04 18:50:06', 'no', 'no', 0),
(27, 'Shared from niu_bi: nihao\n	            			', 3, 'niu_bi', '2017-04-04 20:49:51', 'no', 'no', 1),
(28, 'xboxðŸ‘ðŸ˜¢', 3, 'niu_bi', '2017-04-04 20:50:54', 'no', 'no', 0),
(29, 'ðŸ˜	            				\r\n	            			', 3, 'niu_bi', '2017-04-04 20:51:21', 'no', 'no', 0),
(30, 'Shared from niu_bi: ðŸ˜	            				\n	            			', 3, 'niu_bi', '2017-04-04 20:54:26', 'no', 'no', 1),
(31, 'ðŸ’‹', 3, 'niu_bi', '2017-04-04 20:54:50', 'no', 'no', 1),
(33, 'Shared from niu_bi: ðŸ’‹', 3, 'niu_bi', '2017-04-07 16:22:54', 'no', 'no', 0),
(34, 'ðŸ˜¢	            				\r\n	            			', 3, 'niu_bi', '2017-04-07 16:23:19', 'no', 'no', 0),
(35, 'Shared from niu_bi: ðŸ˜¢	            				\n	            			', 3, 'niu_bi', '2017-04-07 16:40:19', 'no', 'no', 0),
(43, '<iframe src=''https://www.youtube.com/embed/ojRj2JK5oCI\n'' width=''420'' height=''315''></iframe>', 3, 'niu_bi', '2017-04-07 20:22:19', 'no', 'no', 0),
(50, 'Shared from niu_bi: Shared from niu_bi: <iframe src="https://www.youtube.com/embed/a_odVQK-TSc\n" height="315" width="420"></iframe> ', 3, 'niu_bi', '2017-04-07 21:30:10', 'no', 'yes', 0),
(51, '<iframe src=''https://www.youtube.com/embed/Yml1Cihh43E\n'' width=''420'' height=''315''></iframe> ', 3, 'niu_bi', '2017-04-07 21:30:51', 'no', 'no', 1),
(53, 'Shared from niu_bi: <iframe src="https://www.youtube.com/embed/Yml1Cihh43E\n" height="315" width="420"></iframe> ', 3, 'niu_bi', '2017-04-07 21:48:14', 'no', 'yes', 0),
(54, 'Shared from niu_bi: <iframe src="https://www.youtube.com/embed/Yml1Cihh43E\n" height="315" width="420"></iframe> ', 3, 'niu_bi', '2017-04-14 16:22:49', 'no', 'yes', 0),
(55, 'niucesdfsfdssðŸ˜˜ðŸ˜šðŸ˜šðŸ˜³ðŸ˜³', 3, 'niu_bi', '2017-04-14 16:27:28', 'no', 'no', 1),
(56, '<img src=''assets/images/post_pics/niu_bi0ce0c42fd00447d74d77de3d92f14243yellow-man.png'' width=''70%''>', 3, 'niu_bi', '2017-04-14 16:27:46', 'no', 'no', 1),
(57, '<img src=''assets/images/post_pics/niu_bi7291c8b69b0658f75c80417c1f4e7af6yellow-man.png'' width=''70%''>', 3, 'niu_bi', '2017-04-14 17:05:09', 'no', 'no', 1),
(58, '<iframe src=''https://www.youtube.com/embed/M11SvDtPBhA'' width=''420'' height=''315''></iframe>', 3, 'niu_bi', '2017-04-14 18:06:45', 'no', 'no', 0);

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
(3, 'Niu', 'Bi', 'niu_bi', 'cswuyujieapp@126.com', '040b7cf4a55014e185813e0644502ea9', '2017-02-16', 'assets/images/profile_pics/niu_bia7c6a80077b4ad9adeeb90a4708b3eb0n.jpeg', 0, 4, 'no'),
(4, 'Ninad', 'Kak', 'ninad_kak', 'ninadbandodkar@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2017-02-17', 'assets/images/profile_pics/defaults/head_sun_flower.png', 0, 0, 'no'),
(5, 'Nikil', 'Lesh', 'nikil_lesh', 'hah@gmail.com', '040b7cf4a55014e185813e0644502ea9', '2017-03-04', 'assets/images/profile_pics/defaults/head_emerald.png', 0, 0, 'no'),
(6, 'Niu', 'Bi2', 'niu_bi2', 'niubi2p@126.com', '040b7cf4a55014e185813e0644502ea9', '2017-02-16', 'assets/images/profile_pics/defaults/head_emerald.png', 0, 0, 'no'),
(7, 'Niu', 'Bi3', 'niu_bi3', 'niubi3@126.com', '040b7cf4a55014e185813e0644502ea9', '2017-02-16', 'assets/images/profile_pics/defaults/head_emerald.png', 0, 0, 'no'),
(8, 'Niu', 'Bi7', 'niu_bi7', 'niubi7@126.com', '040b7cf4a55014e185813e0644502ea9', '2017-02-16', 'assets/images/profile_pics/defaults/head_emerald.png', 0, 0, 'no'),
(9, 'Test1', 'Test1', 'test1_test1', 'test1@gmail.com', '040b7cf4a55014e185813e0644502ea9', '2017-04-05', 'assets/images/profile_pics/defaults/head_deep_blue.png', 0, 0, 'yes');

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
(3, 22, 'male', '6TH ', 'Bloomington', 'IN', 'cHIA', '', 0, 0),
(4, 11, 'female', '', '', '', '', '', 0, 0),
(5, 0, 'male', '', '', '', '', '', 0, 0),
(6, 0, 'male', '', '', '', '', '', 0, 0),
(7, 0, 'male', '', '', '', '', '', 0, 0),
(8, 0, 'male', '', '', '', '', '', 0, 0);

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
(1, 3, 'no'),
(2, 3, 'no'),
(3, 1, 'no'),
(3, 2, 'no'),
(3, 5, 'no'),
(5, 3, 'no');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- 使用表AUTO_INCREMENT `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- 使用表AUTO_INCREMENT `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
--
-- 使用表AUTO_INCREMENT `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- 使用表AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
