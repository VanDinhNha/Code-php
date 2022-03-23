-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2022 at 03:26 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quanlynv`
--

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `manv` int(10) NOT NULL,
  `ho` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `ten` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `phai` tinyint(4) NOT NULL,
  `ngaysinh` date NOT NULL,
  `diachi` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mapb` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`manv`, `ho`, `ten`, `phai`, `ngaysinh`, `diachi`, `mapb`) VALUES
(1, 'Nguyễn ', 'Đăng Khoa', 1, '1990-06-21', '25C tổ 6, KP1, Tân Hiệp', 'CNTT'),
(3, 'Trần Thị', 'Ngọc Mai', 0, '2012-02-10', '05/2 Huỳnh Văn Nghệ, Bửu Long, Biên Hòa', 'CNTT'),
(4, 'Thái Quốc', 'Thắng', 1, '1994-06-30', '2/3/4 ĐT 620, Bửu Long, Biên Hòa', 'CNTT'),
(5, 'Nguyễn Quốc ', 'Phong', 1, '1993-03-12', '4 Nguyễn Thiện Thuật, TPHCM', 'CNTT'),
(6, 'Lý Vinh ', 'Toàn', 1, '1994-06-16', '3/2 Tân Vạn, BH', 'CNTT'),
(7, 'Lê Văn', 'Em', 1, '1989-07-05', '3/4 Đồng Khởi, Tam Hiệp, Biên Hòa', 'DDT'),
(8, 'Nguyễn Thanh', 'Phong', 1, '1996-01-11', '12 Nguyễn Ái Quốc, Biên Hòa', 'DDT'),
(9, 'Phạm Thị Thanh', 'Thủy', 0, '1994-09-15', '12 Nguyễn Ái Quốc, Biên Hòa', 'DT'),
(10, 'Nguyễn Thị', 'Nga', 0, '1994-04-07', '6/6 Nguyễn Ái Quốc, Tân Phong, Biên Hòa', 'TCHC'),
(11, 'Cao Thị', 'Xuân', 0, '1988-10-20', '12 tổ 2 KP1 Tân Hiệp, BH', 'TCHC');

-- --------------------------------------------------------

--
-- Table structure for table `phongban`
--

CREATE TABLE `phongban` (
  `mapb` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `tenpb` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `phongban`
--

INSERT INTO `phongban` (`mapb`, `tenpb`) VALUES
('CNTT', 'Công nghệ thông tin'),
('DDT', 'Điện điện tử'),
('DT', 'Đào tạo'),
('TCHC', 'Tổ chức hành chánh');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`manv`),
  ADD KEY `mapb` (`mapb`);

--
-- Indexes for table `phongban`
--
ALTER TABLE `phongban`
  ADD PRIMARY KEY (`mapb`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `manv` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `nhanvien_ibfk_1` FOREIGN KEY (`mapb`) REFERENCES `phongban` (`mapb`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
