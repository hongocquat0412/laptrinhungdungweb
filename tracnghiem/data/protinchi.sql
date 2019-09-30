-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2018 at 09:29 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `protinchi`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbgiangvien`
--

CREATE TABLE IF NOT EXISTS `tbgiangvien` (
  `stt` text NOT NULL,
  `magiangvien` text NOT NULL,
  `matkhau` text NOT NULL,
  `tengiangvien` text CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `makhoa` text NOT NULL,
  `trinhdo` text NOT NULL,
  `ghichu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbkhoabieugiangvien`
--

CREATE TABLE IF NOT EXISTS `tbkhoabieugiangvien` (
  `magiangvien` text NOT NULL,
  `tiet` text NOT NULL,
  `t2` text NOT NULL,
  `t3` text NOT NULL,
  `t4` text NOT NULL,
  `t5` text NOT NULL,
  `t6` text NOT NULL,
  `t7` text NOT NULL,
  `cn` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbkhoabieuphong`
--

CREATE TABLE IF NOT EXISTS `tbkhoabieuphong` (
  `maphong` text NOT NULL,
  `p212` text NOT NULL,
  `p235` text NOT NULL,
  `p267` text NOT NULL,
  `p289` text NOT NULL,
  `p312` text NOT NULL,
  `p335` text NOT NULL,
  `p367` text NOT NULL,
  `p389` text NOT NULL,
  `p412` text NOT NULL,
  `p435` text NOT NULL,
  `p467` text NOT NULL,
  `p489` text NOT NULL,
  `p512` text NOT NULL,
  `p535` text NOT NULL,
  `p567` text NOT NULL,
  `p589` text NOT NULL,
  `p612` text NOT NULL,
  `p635` text NOT NULL,
  `p667` text NOT NULL,
  `p689` text NOT NULL,
  `p712` text NOT NULL,
  `p735` text NOT NULL,
  `p767` text NOT NULL,
  `p789` text NOT NULL,
  `p812` text NOT NULL,
  `p835` text NOT NULL,
  `p867` text NOT NULL,
  `p889` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbkhoabieusinhvien`
--

CREATE TABLE IF NOT EXISTS `tbkhoabieusinhvien` (
  `masinhvien` text NOT NULL,
  `tiet` text NOT NULL,
  `t2` text NOT NULL,
  `t3` text NOT NULL,
  `t4` text NOT NULL,
  `t5` text NOT NULL,
  `t6` text NOT NULL,
  `t7` text NOT NULL,
  `cn` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbmonhoc`
--

CREATE TABLE IF NOT EXISTS `tbmonhoc` (
  `stt` text NOT NULL,
  `mahocphan` text NOT NULL,
  `mamonhoc` text NOT NULL,
  `tenmonhoc` text NOT NULL,
  `sotinchi` text NOT NULL,
  `hocky` text NOT NULL,
  `magiangvien` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbsinhvien`
--

CREATE TABLE IF NOT EXISTS `tbsinhvien` (
  `masinhvien` text NOT NULL,
  `matkhau` text NOT NULL,
  `tensinhvien` text CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `ngaysinh` text NOT NULL,
  `ghichu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
