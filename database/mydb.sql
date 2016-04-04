-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2015 at 03:58 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `lg_konfirmasi`
--

CREATE TABLE IF NOT EXISTS `lg_konfirmasi` (
`ID_KONFIRMASI` int(11) NOT NULL,
  `ID_CUSTOMER` int(11) DEFAULT NULL,
  `TANGGAL` date DEFAULT NULL,
  `NAMA` varchar(45) DEFAULT NULL,
  `BANK` varchar(45) DEFAULT NULL,
  `JUMLAH` double DEFAULT NULL,
  `REKENING` varchar(45) DEFAULT NULL,
  `STATUS` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `lg_nota`
--

CREATE TABLE IF NOT EXISTS `lg_nota` (
`ID_NOTA` int(11) NOT NULL,
  `ID_CUSTOMER` int(11) DEFAULT NULL,
  `TANGGAL` date DEFAULT NULL,
  `DUE_DATE` date DEFAULT NULL,
  `SHIPPING_FEE` double DEFAULT NULL,
  `SHIPPING_WIGHT` double DEFAULT NULL,
  `SHIPPING_TO` varchar(45) DEFAULT NULL,
  `SHIPPING_FROM` varchar(45) DEFAULT NULL,
  `ID_PROVINSI` varchar(45) DEFAULT NULL,
  `ID_KOTA` varchar(45) DEFAULT NULL,
  `TOTAL` double DEFAULT NULL,
  `STATUS` varchar(1) DEFAULT NULL,
  `DROPSHIP` varchar(1) DEFAULT NULL,
  `TIPE` varchar(1) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `lg_nota`
--

INSERT INTO `lg_nota` (`ID_NOTA`, `ID_CUSTOMER`, `TANGGAL`, `DUE_DATE`, `SHIPPING_FEE`, `SHIPPING_WIGHT`, `SHIPPING_TO`, `SHIPPING_FROM`, `ID_PROVINSI`, `ID_KOTA`, `TOTAL`, `STATUS`, `DROPSHIP`, `TIPE`) VALUES
(5, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL, NULL),
(7, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL, NULL),
(8, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL, NULL),
(9, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lg_nota_detail`
--

CREATE TABLE IF NOT EXISTS `lg_nota_detail` (
  `ID_NOTA` int(11) NOT NULL,
  `ID_PRODUCT` int(11) NOT NULL,
  `STOCK` int(11) DEFAULT NULL,
  `SUBTOTAL` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lg_nota_detail`
--

INSERT INTO `lg_nota_detail` (`ID_NOTA`, `ID_PRODUCT`, `STOCK`, `SUBTOTAL`) VALUES
(5, 1, 1, NULL),
(5, 2, 2, NULL),
(7, 1, 64, NULL),
(7, 2, 120, NULL),
(8, 1, 9, 72),
(8, 2, 15, 120),
(9, 1, 4, 32),
(9, 2, 5, 40);

-- --------------------------------------------------------

--
-- Table structure for table `ms_category`
--

CREATE TABLE IF NOT EXISTS `ms_category` (
`ID_CATEGORY` int(11) NOT NULL,
  `TIPE` varchar(30) DEFAULT NULL,
  `NAMA` varchar(50) DEFAULT NULL,
  `REC_STATUS` varchar(1) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `ms_category`
--

INSERT INTO `ms_category` (`ID_CATEGORY`, `TIPE`, `NAMA`, `REC_STATUS`) VALUES
(1, 'PO', 'Pre-Order', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `ms_customer`
--

CREATE TABLE IF NOT EXISTS `ms_customer` (
`ID` int(11) NOT NULL,
  `NAMA` varchar(30) DEFAULT NULL,
  `EMAIL` varchar(50) DEFAULT NULL,
  `STATUS` varchar(1) DEFAULT NULL,
  `PASSWORD` varchar(255) DEFAULT NULL,
  `ALAMAT` varchar(50) DEFAULT NULL,
  `PROVINSI` varchar(45) DEFAULT NULL,
  `KOTA` varchar(45) DEFAULT NULL,
  `KODE_POS` varchar(10) DEFAULT NULL,
  `PHONE` varchar(18) DEFAULT NULL,
  `REC_STATUS` varchar(1) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `ms_customer`
--

INSERT INTO `ms_customer` (`ID`, `NAMA`, `EMAIL`, `STATUS`, `PASSWORD`, `ALAMAT`, `PROVINSI`, `KOTA`, `KODE_POS`, `PHONE`, `REC_STATUS`) VALUES
(1, NULL, 'admin@gmail.com', NULL, 'admin', NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'argo', 'argo@mail.com', 'A', 'argoganteng', 'alamat', '7', '7', '7', '7', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `ms_item`
--

CREATE TABLE IF NOT EXISTS `ms_item` (
`ID_ITEM` int(11) NOT NULL,
  `ID_CATEGORY` int(11) DEFAULT NULL,
  `NAMA_ITEM` varchar(165) DEFAULT NULL,
  `HARGA_AWAL` double DEFAULT NULL,
  `HARGA_JUAL` double DEFAULT NULL,
  `BERAT` double DEFAULT NULL,
  `KETERANGAN` varchar(50) DEFAULT NULL,
  `MIN_ORDER` int(11) DEFAULT NULL,
  `FOTO` varchar(45) DEFAULT NULL,
  `REC_STATUS_ITEM` varchar(1) DEFAULT NULL,
  `PUBLISH_STATUS` varchar(1) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `ms_item`
--

INSERT INTO `ms_item` (`ID_ITEM`, `ID_CATEGORY`, `NAMA_ITEM`, `HARGA_AWAL`, `HARGA_JUAL`, `BERAT`, `KETERANGAN`, `MIN_ORDER`, `FOTO`, `REC_STATUS_ITEM`, `PUBLISH_STATUS`) VALUES
(1, 1, 'tes', 8, 8, 8, '8', 8, '1279e-lighht.png', 'A', 'U'),
(5, 1, 'jos', 8, 8, 8, '8', 8, '3ca44-eror2.png', 'N', NULL),
(6, 1, 'tes2', 90, 90, 90, '90', 90, '65300-save.png', 'A', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ms_stock`
--

CREATE TABLE IF NOT EXISTS `ms_stock` (
`ID_STOK` int(11) NOT NULL,
  `ID_ITEM` int(11) DEFAULT NULL,
  `WARNA` varchar(20) DEFAULT NULL,
  `STOCK` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `ms_stock`
--

INSERT INTO `ms_stock` (`ID_STOK`, `ID_ITEM`, `WARNA`, `STOCK`) VALUES
(1, 1, 'coklat', 500),
(2, 1, 'merah', 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lg_konfirmasi`
--
ALTER TABLE `lg_konfirmasi`
 ADD PRIMARY KEY (`ID_KONFIRMASI`), ADD KEY `FK_ID_CUSTOMER_idx` (`ID_CUSTOMER`);

--
-- Indexes for table `lg_nota`
--
ALTER TABLE `lg_nota`
 ADD PRIMARY KEY (`ID_NOTA`), ADD KEY `FK_ID_CUST_NOTA_idx` (`ID_CUSTOMER`);

--
-- Indexes for table `lg_nota_detail`
--
ALTER TABLE `lg_nota_detail`
 ADD PRIMARY KEY (`ID_NOTA`,`ID_PRODUCT`), ADD KEY `FK_ID_PRODUCT_idx` (`ID_PRODUCT`);

--
-- Indexes for table `ms_category`
--
ALTER TABLE `ms_category`
 ADD PRIMARY KEY (`ID_CATEGORY`);

--
-- Indexes for table `ms_customer`
--
ALTER TABLE `ms_customer`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `ms_item`
--
ALTER TABLE `ms_item`
 ADD PRIMARY KEY (`ID_ITEM`), ADD KEY `FK_ID_CATEGORY_idx` (`ID_CATEGORY`);

--
-- Indexes for table `ms_stock`
--
ALTER TABLE `ms_stock`
 ADD PRIMARY KEY (`ID_STOK`), ADD KEY `FK_ID_ITEM_idx` (`ID_ITEM`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lg_konfirmasi`
--
ALTER TABLE `lg_konfirmasi`
MODIFY `ID_KONFIRMASI` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lg_nota`
--
ALTER TABLE `lg_nota`
MODIFY `ID_NOTA` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `ms_category`
--
ALTER TABLE `ms_category`
MODIFY `ID_CATEGORY` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ms_customer`
--
ALTER TABLE `ms_customer`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ms_item`
--
ALTER TABLE `ms_item`
MODIFY `ID_ITEM` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `ms_stock`
--
ALTER TABLE `ms_stock`
MODIFY `ID_STOK` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `lg_konfirmasi`
--
ALTER TABLE `lg_konfirmasi`
ADD CONSTRAINT `FK_ID_CUSTOMER` FOREIGN KEY (`ID_CUSTOMER`) REFERENCES `ms_customer` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `lg_nota`
--
ALTER TABLE `lg_nota`
ADD CONSTRAINT `FK_ID_CUST_NOTA` FOREIGN KEY (`ID_CUSTOMER`) REFERENCES `ms_customer` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `lg_nota_detail`
--
ALTER TABLE `lg_nota_detail`
ADD CONSTRAINT `FK_ID_NOTA` FOREIGN KEY (`ID_NOTA`) REFERENCES `lg_nota` (`ID_NOTA`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `FK_ID_PRODUCT` FOREIGN KEY (`ID_PRODUCT`) REFERENCES `ms_stock` (`ID_STOK`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ms_item`
--
ALTER TABLE `ms_item`
ADD CONSTRAINT `FK_ID_CATEGORY` FOREIGN KEY (`ID_CATEGORY`) REFERENCES `ms_category` (`ID_CATEGORY`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ms_stock`
--
ALTER TABLE `ms_stock`
ADD CONSTRAINT `FK_ID_ITEM` FOREIGN KEY (`ID_ITEM`) REFERENCES `ms_item` (`ID_ITEM`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
