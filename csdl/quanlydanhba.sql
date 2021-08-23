-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2021 at 01:44 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quanlydanhba`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id_admin` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(20) DEFAULT NULL,
  `ten` varchar(20) DEFAULT NULL,
  `sdt` varchar(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id_admin`, `user_name`, `password`, `ten`, `sdt`) VALUES
(1, 'hungph98', '1', 'Phạm Hoàng Hưng', '034565757');

-- --------------------------------------------------------

--
-- Table structure for table `can_bo`
--

CREATE TABLE `can_bo` (
  `id_can_bo` int(11) NOT NULL,
  `id_phong_ban` int(11) DEFAULT NULL,
  `ten` varchar(30) DEFAULT NULL,
  `chuc_vu` varchar(30) DEFAULT NULL,
  `sdt_co_quan` varchar(9) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `sdt_di_dong` varchar(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `can_bo`
--

INSERT INTO `can_bo` (`id_can_bo`, `id_phong_ban`, `ten`, `chuc_vu`, `sdt_co_quan`, `email`, `sdt_di_dong`) VALUES
(0, 0, '$ho_va_ten', '$chuc_vu', '$sdt_co_q', '$email', '$sdt_di_d'),
(2, 2, 'Hồng Hường', 'Người yêu', '1', 'huong@gmail', '1'),
(3, 3, 'Lại Văn Sâm', 'Dẫn chương trình', '32423', 'sam@gmail.com', '23423'),
(4, 4, 'Nguyễn Văn Phúc', 'Giảng viên', '2222', 'phuc@gmail.com', '233324'),
(5, 5, 'Lý Hoàng Nam', 'Trưởng phòng', '232399', 'nam@gmail.com', '22331'),
(6, 6, 'Kiều Tuấn Dũng', 'Giáo viên', '34', 'dung@gmail.com', '324'),
(7, 7, 'Trần Hưng Đạo', 'Tướng', '324', 'hdv@gmail.com', '324'),
(8, 8, 'Lý Trần Bằng', 'Phó Phòng', '3432423', 'bang@gmail.com', '4543543'),
(9, 9, 'Hoàng Xuân Vinh', 'Nhân viên', '235678', 'ving@gmail.com', '324234'),
(10, 10, 'Nguyễn Văn Hùng', 'Thư ký', '34234', 'hunghung@gmail.com', '321312'),
(13, 0, 'Phạm Hoàng Hưng', 'Sinh viên', '1998', 'hungdz@gmail.com', '2345'),
(15, 0, 'Phạm Hoàng Hưng', 'Sinh viên', '1998', 'hungdz@gmail.com', '2345'),
(20, 9, 'Nguyễn Văn A', 'sinh viên', '1234', 'a@email.com', '321432');

-- --------------------------------------------------------

--
-- Table structure for table `don_vi`
--

CREATE TABLE `don_vi` (
  `id_don_vi` int(11) NOT NULL,
  `ten` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `don_vi`
--

INSERT INTO `don_vi` (`id_don_vi`, `ten`) VALUES
(1, 'Ban giám hiệu'),
(2, 'Khoa Kinh tế'),
(3, 'Khoa CNTT'),
(4, 'Sở Y tế'),
(5, 'Trung tâm tin học');

-- --------------------------------------------------------

--
-- Table structure for table `phong_ban`
--

CREATE TABLE `phong_ban` (
  `id_phong_ban` int(11) NOT NULL,
  `id_don_vi` int(11) DEFAULT NULL,
  `ten_phong_ban` varchar(20) DEFAULT NULL,
  `dia_chi` varchar(50) DEFAULT NULL,
  `sdt` varchar(10) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `website` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `phong_ban`
--

INSERT INTO `phong_ban` (`id_phong_ban`, `id_don_vi`, `ten_phong_ban`, `dia_chi`, `sdt`, `email`, `website`) VALUES
(1, 1, 'Bộ môn Hệ thống thôn', 'Tầng 3 - Nhà C3', '343223', 'httt@gmail.com', 'www.httt.com'),
(2, 2, 'Phòng hiệu trưởng', 'Tầng 3 - Nhà C1', '324234', 'hieutruong@gmail.com', 'www.dhtl.com'),
(3, 3, 'Bộ môn Toán', 'Tầng 4 nhà B1', '3432', 'hung@gmail.com', 'wwwhung.com'),
(4, 4, 'Công đoàn', 'Tâng 5 nhà B4', '423', 'congdong@gmail.com', 'wwwww'),
(5, 5, 'Phòng thí nghiệm', 'tầng 2 nhà c1', '3423', 'thinghiem@gmail.com', 'wwww.eddd.com'),
(6, 6, 'Nhà thi đấu', 'Tầng 9 nhà A3', '32321', 'hhh@gmail.com', 'ẻwerwe'),
(7, 7, 'Phòng LĐTB & XH', 'Tầng 3 nhà B5', '423', 'ldtbxh@gmail.com', 'www.phimmoi.com'),
(8, 8, 'Phòng kế toán', 'Tầng 1 nhà A2', '3423', 'ketoan@gmail.com', 'www.ketoan.com'),
(9, 9, 'Bộ môn Kỹ thuật phần', 'Tầng 2 - Nhà C5', '23456', 'ktpm@gmail.com', 'www.ktpm.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `can_bo`
--
ALTER TABLE `can_bo`
  ADD PRIMARY KEY (`id_can_bo`),
  ADD KEY `id_phong_ban` (`id_phong_ban`);

--
-- Indexes for table `don_vi`
--
ALTER TABLE `don_vi`
  ADD PRIMARY KEY (`id_don_vi`);

--
-- Indexes for table `phong_ban`
--
ALTER TABLE `phong_ban`
  ADD PRIMARY KEY (`id_phong_ban`),
  ADD KEY `id_don_vi` (`id_don_vi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `don_vi`
--
ALTER TABLE `don_vi`
  ADD CONSTRAINT `don_vi_ibfk_1` FOREIGN KEY (`id_don_vi`) REFERENCES `phong_ban` (`id_don_vi`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
