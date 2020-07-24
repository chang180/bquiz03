-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 
-- 伺服器版本： 10.4.11-MariaDB
-- PHP 版本： 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `db03`
--

-- --------------------------------------------------------

--
-- 資料表結構 `movie`
--

CREATE TABLE `movie` (
  `id` int(10) UNSIGNED NOT NULL COMMENT '流水號',
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '電影名稱',
  `level` tinyint(1) UNSIGNED NOT NULL COMMENT '分級',
  `length` int(3) UNSIGNED NOT NULL COMMENT '長度',
  `ondate` date NOT NULL COMMENT '放映日期',
  `publish` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '發行商',
  `director` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '導演',
  `trailer` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '預告影片',
  `poster` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '預告海報',
  `intro` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '電影介紹',
  `rank` int(10) UNSIGNED NOT NULL COMMENT '排序',
  `sh` int(1) UNSIGNED NOT NULL COMMENT '顯示'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `movie`
--

INSERT INTO `movie` (`id`, `name`, `level`, `length`, `ondate`, `publish`, `director`, `trailer`, `poster`, `intro`, `rank`, `sh`) VALUES
(1, '院線片01', 1, 90, '2020-07-25', '院線片01的發行商', '院線片01的導演', '03B01v.mp4', '03B01.png', '院線片01的劇情介紹劇情介紹劇情介紹劇情介紹劇情介紹劇情介紹劇情介紹劇情介紹劇情介紹', 1, 1),
(3, '院線片02', 2, 90, '2020-07-25', '院線片02的發行商', '院線片02的導演', '03B02v.mp4', '03B03.png', '院線片02的劇情介紹劇情介紹劇情介紹劇情介紹劇情介紹劇情介紹劇情介紹劇情介紹劇情介紹', 2, 1),
(4, '院線片03', 3, 90, '2020-07-26', '院線片03的發行商', '院線片03的導演', '03B03v.mp4', '03B03.png', '院線片03的劇情介紹劇情介紹劇情介紹劇情介紹劇情介紹劇情介紹劇情介紹劇情介紹劇情介紹', 3, 1),
(5, '院線片04', 4, 90, '2020-07-25', '院線片04的發行商', '院線片04的導演', '03B04v.mp4', '03B04.png', '院線片04的劇情介紹劇情介紹劇情介紹劇情介紹劇情介紹劇情介紹劇情介紹劇情介紹劇情介紹', 4, 1),
(6, '院線片05', 1, 90, '2020-07-24', '院線片05的發行商', '院線片05的導演', '03B05v.mp4', '03B05.png', '院線片05的劇情介紹劇情介紹劇情介紹劇情介紹劇情介紹劇情介紹劇情介紹劇情介紹劇情介紹', 5, 1),
(7, '院線片06', 2, 90, '2020-07-23', '院線片06的發行商', '院線片06的導演', '03B06v.mp4', '03B06.png', '院線片06的劇情介紹劇情介紹劇情介紹劇情介紹劇情介紹劇情介紹劇情介紹劇情介紹劇情介紹', 6, 1),
(8, '院線片07', 3, 90, '2020-07-23', '院線片07的發行商', '院線片07的導演', '03B07v.mp4', '03B07.png', '院線片07的劇情介紹劇情介紹劇情介紹劇情介紹劇情介紹劇情介紹劇情介紹劇情介紹劇情介紹', 7, 1),
(9, '院線片08', 4, 90, '2020-07-24', '院線片08的發行商', '院線片08的導演', '03B08v.mp4', '03B08.png', '院線片08的劇情介紹劇情介紹劇情介紹劇情介紹劇情介紹劇情介紹劇情介紹劇情介紹劇情介紹', 8, 1),
(10, '院線片09', 1, 90, '2020-07-24', '院線片09的發行商', '院線片09的導演', '03B09v.mp4', '03B09.png', '院線片09的劇情介紹劇情介紹劇情介紹劇情介紹劇情介紹劇情介紹劇情介紹劇情介紹劇情介紹', 9, 1),
(11, '院線片10', 2, 90, '2020-07-24', '院線片10的發行商', '院線片10的導演', '03B10v.mp4', '03B10.png', '院線片10的劇情介紹劇情介紹劇情介紹劇情介紹劇情介紹劇情介紹劇情介紹劇情介紹劇情介紹', 10, 1);

-- --------------------------------------------------------

--
-- 資料表結構 `ord`
--

CREATE TABLE `ord` (
  `id` int(10) UNSIGNED NOT NULL,
  `no` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `movie` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `session` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `qt` tinyint(1) UNSIGNED NOT NULL,
  `seat` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `ord`
--

INSERT INTO `ord` (`id`, `no`, `movie`, `date`, `session`, `qt`, `seat`) VALUES
(7, '202007240001', '院線片05', '2020-07-25', '14:00~16:00', 1, 'a:1:{i:0;s:2:\"11\";}'),
(8, '202007240008', '院線片07', '2020-07-25', '16:00~18:00', 1, 'a:1:{i:0;s:2:\"11\";}'),
(9, '202007240009', '院線片10', '2020-07-25', '14:00~16:00', 1, 'a:1:{i:0;s:2:\"11\";}'),
(10, '202007240010', '院線片07', '2020-07-25', '16:00~18:00', 1, 'a:1:{i:0;s:1:\"8\";}');

-- --------------------------------------------------------

--
-- 資料表結構 `poster`
--

CREATE TABLE `poster` (
  `id` int(10) UNSIGNED NOT NULL,
  `path` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rank` int(10) UNSIGNED NOT NULL,
  `sh` int(1) UNSIGNED NOT NULL,
  `ani` int(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `poster`
--

INSERT INTO `poster` (`id`, `path`, `name`, `rank`, `sh`, `ani`) VALUES
(11, '03A01.jpg', '預告片1', 1, 1, 4),
(12, '03A02.jpg', '預告片2', 11, 1, 4),
(13, '03A03.jpg', '預告片3', 12, 1, 3),
(14, '03A04.jpg', '預告片4', 14, 1, 1),
(15, '03A05.jpg', '預告片5', 16, 1, 1),
(16, '03A06.jpg', '預告片1', 15, 1, 1),
(17, '03A07.jpg', '預告片7', 16, 1, 1),
(18, '03A08.jpg', '預告片8', 17, 1, 1),
(19, '03A09.jpg', '預告片9', 18, 1, 3);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `ord`
--
ALTER TABLE `ord`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `poster`
--
ALTER TABLE `poster`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `movie`
--
ALTER TABLE `movie`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '流水號', AUTO_INCREMENT=12;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `ord`
--
ALTER TABLE `ord`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `poster`
--
ALTER TABLE `poster`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
