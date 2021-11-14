-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2021 年 10 月 15 日 07:01
-- 伺服器版本： 10.4.18-MariaDB
-- PHP 版本： 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `attendancedb`
--

-- --------------------------------------------------------

--
-- 資料表結構 `attendance`
--

CREATE TABLE `attendance` (
  `id` int(13) NOT NULL,
  `classID` int(9) NOT NULL,
  `studentID` int(9) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `status` enum('present','late','earlyLeave','sickLeave','personalLeave','absent') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `attendance`
--

INSERT INTO `attendance` (`id`, `classID`, `studentID`, `date`, `time`, `status`) VALUES
(1111111111, 123456789, 200413958, '2021-10-05', '19:49:09', 'present'),
(1111111112, 123456789, 200373237, '2021-10-08', '22:32:54', 'present'),
(1111111113, 123456789, 200413958, '2021-10-01', '14:32:54', 'late'),
(1111111114, 123456789, 200373237, '2021-10-06', '16:23:10', 'earlyLeave');

-- --------------------------------------------------------

--
-- 資料表結構 `class`
--

CREATE TABLE `class` (
  `id` int(9) NOT NULL,
  `name` varchar(3) NOT NULL,
  `description` varchar(200) NOT NULL,
  `teacherID` int(9) NOT NULL,
  `academicYear` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `class`
--

INSERT INTO `class` (`id`, `name`, `description`, `teacherID`, `academicYear`) VALUES
(123456777, '2B', 'Higher Diploma in Software Engineering', 201116523, 2021),
(123456789, '2A', 'Higher Diploma in Software Engineering', 201116523, 2021);

-- --------------------------------------------------------

--
-- 資料表結構 `studentclass`
--

CREATE TABLE `studentclass` (
  `studentID` int(9) NOT NULL,
  `classID` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `studentclass`
--

INSERT INTO `studentclass` (`studentID`, `classID`) VALUES
(200373237, 123456789),
(200413958, 123456789);

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `id` int(9) NOT NULL,
  `firstName` varchar(30) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  `password` varchar(64) NOT NULL,
  `role` enum('admin','teacher','student','') NOT NULL,
  `suspended` bit(1) DEFAULT b'1',
  `mobile` int(8) NOT NULL,
  `school` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `user`
--

INSERT INTO `user` (`id`, `firstName`, `lastName`, `password`, `role`, `suspended`, `mobile`, `school`) VALUES
(200000000, 'admin', '', 'admin', 'admin', b'1', 12345678, 'LWL'),
(200373237, 'Johnson', 'Chong', 'chong12319', 'student', b'1', 65867246, 'LWL'),
(200408463, 'Vincy', 'Pun', 'vincypun', 'student', b'1', 66954348, 'LWL'),
(200413958, 'Alvin', 'Cheung', 'alvincheung', 'student', b'1', 98695229, 'LWL'),
(201116523, 'Ada', 'Yuen', 'adayuen', 'teacher', b'1', 39282640, 'LWL');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_class_ID_classID` (`classID`),
  ADD KEY `fk_user_ID_studentID` (`studentID`);

--
-- 資料表索引 `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_ID_teacherID` (`teacherID`);

--
-- 資料表索引 `studentclass`
--
ALTER TABLE `studentclass`
  ADD PRIMARY KEY (`studentID`,`classID`),
  ADD KEY `classID` (`classID`);

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1111111115;

--
-- 已傾印資料表的限制式
--

--
-- 資料表的限制式 `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `fk_class_ID_classID` FOREIGN KEY (`classID`) REFERENCES `class` (`id`),
  ADD CONSTRAINT `fk_user_ID_studentID` FOREIGN KEY (`studentID`) REFERENCES `user` (`id`);

--
-- 資料表的限制式 `class`
--
ALTER TABLE `class`
  ADD CONSTRAINT `fk_user_ID_teacherID` FOREIGN KEY (`teacherID`) REFERENCES `user` (`id`);

--
-- 資料表的限制式 `studentclass`
--
ALTER TABLE `studentclass`
  ADD CONSTRAINT `studentclass_ibfk_1` FOREIGN KEY (`classID`) REFERENCES `class` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `studentclass_ibfk_2` FOREIGN KEY (`studentID`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
