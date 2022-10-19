-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 15 أكتوبر 2022 الساعة 15:26
-- إصدار الخادم: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `children_world`
--

-- --------------------------------------------------------

--
-- بنية الجدول `activities`
--

CREATE TABLE `activities` (
  `Id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `goal` varchar(500) NOT NULL,
  `details` varchar(500) NOT NULL,
  `img` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- بنية الجدول `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `username` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `password`) VALUES
(1, 'آية', 'Ayoosh', '202cb962ac59075b964b07152d234b70'),
(2, '', 'aya21', '202cb962ac59075b964b07152d234b70'),
(3, 'سجود', 'sjood', '202cb962ac59075b964b07152d234b70'),
(4, 'sjood', 'sjoood', '202cb962ac59075b964b07152d234b70'),
(5, 'sjood', 'sjo2od', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- بنية الجدول `grade`
--

CREATE TABLE `grade` (
  `Id` int(11) NOT NULL,
  `grade` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `grade`
--

INSERT INTO `grade` (`Id`, `grade`) VALUES
(12, 'البستان'),
(13, 'البراعم'),
(14, 'التمهيدي'),
(15, 'البستان - العباقرة');

-- --------------------------------------------------------

--
-- بنية الجدول `homework`
--

CREATE TABLE `homework` (
  `Id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `file` varchar(200) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `teacher` varchar(200) NOT NULL,
  `grade` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `homework`
--

INSERT INTO `homework` (`Id`, `title`, `file`, `date`, `teacher`, `grade`) VALUES
(1, 'نغم', 'f.jpg', '0000-00-00 00:00:00', '', 'البستان'),
(2, 'الرقم 1', 'pass.docx', '0000-00-00 00:00:00', 'هبة', 'التمهيدي - الابتكار'),
(3, ' رقم 5', 'f.jpg', '0000-00-00 00:00:00', 'هبة', 'التمهيدي - الابتكار'),
(5, ';xldkv', 'bf7a4b88981b708e4677d0dc18ba4186', '0000-00-00 00:00:00', 'هبة', 'التمهيدي - الابتكار'),
(6, ';l', 'تحليل.docx', '0000-00-00 00:00:00', 'هبة', 'البستان'),
(7, ';skdf', 'download (1).jpg', '0000-00-00 00:00:00', 'هبة', 'البستان'),
(10, ';dlfg', 'f.jpg', '2022-09-29 16:18:24', 'هبة', 'التمهيدي - الابتكار'),
(11, 'aaya', 'تحليل.docx', '2022-09-30 05:38:45', 'هبة', 'التمهيدي - الابتكار'),
(12, 'حرف الواو', '', '2022-09-30 05:41:53', 'هبة', 'البستان'),
(13, 'حرف الواو', '1664516617.docx', '2022-09-30 05:43:36', 'هبة', 'التمهيدي - الابتكار'),
(14, 'hi', '1664517483.jpg', '2022-09-30 05:58:02', 'Aya', 'البستان'),
(15, 'hh', '1664520743.jpg', '2022-09-30 06:52:22', 'هبة', 'التمهيدي - العباقرة'),
(16, 'kyl;fgh', '1664815067.docx', '2022-10-03 16:37:47', 'هبة', 'البراعم'),
(17, 'التراث الفلسطيني', '1665152475.docx', '2022-10-07 14:21:15', 'سجود', 'التمهيدي'),
(18, 'الوضوء', '1665152502.png', '2022-10-07 14:21:41', 'سجود', 'البراعم'),
(19, 'واجب', '1665247756.jpg', '2022-10-08 16:49:15', 'أيوش', 'التمهيدي'),
(20, 'حروف الجر', '1665684687.jpg', '2022-10-13 18:11:27', 'سجود سليمان', 'البراعم');

-- --------------------------------------------------------

--
-- بنية الجدول `rate`
--

CREATE TABLE `rate` (
  `Id` int(11) NOT NULL,
  `teacher` varchar(200) NOT NULL,
  `student` varchar(200) NOT NULL,
  `grade` varchar(200) NOT NULL,
  `month` varchar(200) NOT NULL,
  `rate` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `rate`
--

INSERT INTO `rate` (`Id`, `teacher`, `student`, `grade`, `month`, `rate`) VALUES
(4, 'سجود سليمان', '', 'البستان', 'شهر 10/2022', 'مؤدب وامور'),
(5, 'سجود سليمان', '', 'البستان', 'شهر 10/2022', 'مؤدب وامور'),
(6, 'سجود سليمان', 'عمر حسن عمر', 'البستان', 'شهر 10/2022', 'مؤدب'),
(7, 'سجود سليمان', 'عمر حسن عمر', 'البستان', 'شهر 10/2022', 'عاقل'),
(8, 'سجود سليمان', 'عمر حسن عمر', 'البستان', 'شهر 10/2022', 'مزز'),
(9, 'سجود سليمان', 'عمر حسن عمر', 'البستان', 'شهر 10/2022', 'تقييم'),
(10, 'سجود سليمان', 'عمر حسن عمر', 'البستان', 'شهر 10/2022', 'تقييم'),
(11, 'سجود سليمان', 'عمر حسن عمر', 'البستان', 'شهر 10/2022', 'تقييم'),
(12, 'سجود سليمان', 'عمر حسن عمر', 'البستان', 'شهر 10/2022', 'تقييم يسم');

-- --------------------------------------------------------

--
-- بنية الجدول `reply-homework`
--

CREATE TABLE `reply-homework` (
  `Id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `homework_id` int(11) NOT NULL,
  `img` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `title` varchar(200) NOT NULL,
  `teacher` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `reply-homework`
--

INSERT INTO `reply-homework` (`Id`, `student_id`, `homework_id`, `img`, `date`, `title`, `teacher`) VALUES
(1, 18, 0, '1665781964.jpg', '0000-00-00', '', ''),
(2, 18, 14, '1665781978.jpg', '0000-00-00', '', ''),
(3, 18, 14, '1665782015.', '0000-00-00', '', ''),
(4, 18, 14, '1665782064.jpg', '0000-00-00', '', ''),
(5, 18, 14, '1665782109.', '0000-00-00', '', ''),
(6, 18, 14, '1665782123.', '0000-00-00', '', ''),
(7, 18, 14, '1665782164.', '2022-10-14', '', ''),
(8, 18, 20, '1665815185.jpg', '2022-10-15', 'حروف الجر', 'سجود سليمان');

-- --------------------------------------------------------

--
-- بنية الجدول `student`
--

CREATE TABLE `student` (
  `Id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `pass` varchar(200) NOT NULL,
  `grade` varchar(200) NOT NULL,
  `date_of_birth` date NOT NULL,
  `pic` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `student`
--

INSERT INTO `student` (`Id`, `name`, `phone`, `username`, `pass`, `grade`, `date_of_birth`, `pic`) VALUES
(15, 'عمر احمد عمر', '059540968', 'omar', '202cb962ac59075b964b07152d234b70', 'البراعم', '2022-10-13', NULL),
(17, 'شدن', '059540', 'shadan', '202cb962ac59075b964b07152d234b70', 'البستان', '2022-10-21', NULL),
(18, 'عمر حسن عمر', '059540', 'omaar', '202cb962ac59075b964b07152d234b70', 'البراعم', '2022-10-21', NULL),
(19, 'يوسف حسن عمر', '059540', 'shadan', '202cb962ac59075b964b07152d234b70', 'البستان', '2022-10-21', NULL),
(20, 'ابراهيم محمد عمر', '059540', 'shadan', '202cb962ac59075b964b07152d234b70', 'البستان', '2022-10-21', NULL);

-- --------------------------------------------------------

--
-- بنية الجدول `teacher`
--

CREATE TABLE `teacher` (
  `Id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `pass` varchar(200) NOT NULL,
  `grade` varchar(200) NOT NULL,
  `specialization` varchar(200) NOT NULL,
  `pic` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `teacher`
--

INSERT INTO `teacher` (`Id`, `name`, `phone`, `username`, `pass`, `grade`, `specialization`, `pic`) VALUES
(3, 'حسنية', '123', 'محمد', '452526d91243c7b659dd6c0ee3b756e1', 'التمهيدي - الابتكار', 'حسني', NULL),
(5, 'أيوش', '056586546', 'aya', '202cb962ac59075b964b07152d234b70', 'التمهيدي', 'تكنولوجيا', NULL),
(6, 'آية', '059', 'aya', '202cb962ac59075b964b07152d234b70', 'البستان', 'تربية', NULL),
(7, 'آية', '056', 'ayaa', '202cb962ac59075b964b07152d234b70', 'التمهيدي - الابتكار', 'تكنولوجيا', NULL),
(9, 'سجود سليمان', '056687985', 'sjood', '202cb962ac59075b964b07152d234b70', 'البستان', 'تربية طفل', NULL),
(10, 'اية', '04665', '25aya', '202cb962ac59075b964b07152d234b70', 'البستان', 'تربية', NULL);

-- --------------------------------------------------------

--
-- بنية الجدول `user`
--

CREATE TABLE `user` (
  `Id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `profile_picture` varchar(200) NOT NULL,
  `type` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- بنية الجدول `weekly-plan`
--

CREATE TABLE `weekly-plan` (
  `Id` int(11) NOT NULL,
  `grade` varchar(20) NOT NULL,
  `day` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `Arabic` varchar(2500) NOT NULL,
  `Maths` varchar(2500) NOT NULL,
  `Islami` varchar(2500) NOT NULL,
  `Quran` varchar(2500) NOT NULL,
  `Sciences` varchar(2500) NOT NULL,
  `Einglish` varchar(2500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `weekly-plan`
--

INSERT INTO `weekly-plan` (`Id`, `grade`, `day`, `date`, `Arabic`, `Maths`, `Islami`, `Quran`, `Sciences`, `Einglish`) VALUES
(1, 'البستان', 'الاحد', '2022-06-16', 'يليبل', 'يبل', 'بيل', 'يبل', 'يبل', 'يبليبل'),
(2, 'البستان', 'الاحد', '2022-06-16', 'يليبل', 'يبل', 'بيل', 'يبل', 'يبل', 'يبليبل'),
(3, 'البستان', 'الاحد', '2022-06-16', 'يليبل', 'يبل', 'بيل', 'يبل', 'يبل', 'يبليبل'),
(4, 'البستان', 'الاحد', '2022-06-16', 'يليبل', 'يبل', 'بيل', 'يبل', 'يبل', 'يبليبل'),
(5, 'البستان', 'الاحد', '2022-06-16', 'يليبل', 'يبل', 'بيل', 'قرآن', 'يبل', 'يبليبل'),
(6, 'البستان', 'الاحد', '2022-06-16', 'يليبل', 'يبل', 'بيل', 'يبل', 'يبل', 'يبليبل'),
(7, 'البراعم', 'الثلاثاء', '2022-06-17', 'عربي', 'حاسوب', 'دين', 'قرآن', 'علوم', 'انجليزي'),
(8, 'البراعم', 'الثلاثاء', '2022-06-24', 'd;lfkgdfg', ';ldfkg', ';dflkg', 'd;lfg', ';dslkg', 's;dlfkgdfg'),
(9, 'البستان', 'الاحد', '2022-10-16', 'احد', 'احد', 'احد', 'اجد', 'احد', 'احد'),
(10, 'البستان', 'الاثنين', '2022-10-17', 'اثنين', 'اثنين', 'اثنين', 'اثنين', 'اثنين', 'اثنين'),
(11, 'البستان', 'الثلاثاء', '2022-10-18', 'ثلاثاء', 'ثلاثاءث', 'ثلاثاءثل', 'ثلاثائ', 'ثلاثء', 'ثاثء'),
(12, 'البستان', 'الاربعاء', '2022-10-19', 'اربعاء', 'اربعاء', 'اربعاء', 'اربعاء', 'اربعاء', 'اربعاء'),
(13, 'البستان', 'الخميس', '2022-10-20', 'الخميس', 'الخميس', 'الخميس', 'الخميس', 'الخميس', 'الخميس'),
(14, 'التمهيدي', 'الاحد', '2022-06-01', 's;lf', 's;dfkog', ';sdkf', ';sldkg', 'a;kfg', 'a/slkf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `homework`
--
ALTER TABLE `homework`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `rate`
--
ALTER TABLE `rate`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `reply-homework`
--
ALTER TABLE `reply-homework`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `weekly-plan`
--
ALTER TABLE `weekly-plan`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `grade`
--
ALTER TABLE `grade`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `homework`
--
ALTER TABLE `homework`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `rate`
--
ALTER TABLE `rate`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `reply-homework`
--
ALTER TABLE `reply-homework`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `weekly-plan`
--
ALTER TABLE `weekly-plan`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
