-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2023 at 12:11 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apartment`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `adminName` varchar(255) NOT NULL,
  `adminEmail` varchar(255) NOT NULL,
  `adminPass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `adminName`, `adminEmail`, `adminPass`) VALUES
(1, 'Admin', 'admin@apartment.com', '2ecd7c7018910ded870da48a9fd4384d');

-- --------------------------------------------------------

--
-- Table structure for table `apartment`
--

CREATE TABLE `apartment` (
  `apartmentID` int(11) NOT NULL,
  `apartmentName` varchar(255) NOT NULL,
  `building` varchar(255) NOT NULL,
  `aptOwner` varchar(255) NOT NULL,
  `aptFair` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `apartment`
--

INSERT INTO `apartment` (`apartmentID`, `apartmentName`, `building`, `aptOwner`, `aptFair`) VALUES
(5, 'BLabboAP0A', 'Labbo', 'Khalek', 0),
(7, 'BHabboAP3J', 'Habbo', 'Malek', 0),
(8, 'BKabboAP6C', 'Kabbo', 'Khalek', 0),
(9, 'BLabboAP7F', 'Labbo', 'Bonna', 8989),
(12, 'BKabboAP14M', 'Kabbo', 'Khalek', 0),
(13, 'BLabboAP1A', 'Labbo', 'Bonna', 0),
(14, 'BKabboAP0A', 'Kabbo', 'Khalek', 0),
(16, 'BKabboAP6N', 'Kabbo', 'Bonna', 0),
(17, 'BLabboAP6Q', 'Labbo', 'Malek', 0),
(18, 'BLabboAP0N', 'Labbo', 'Bonna', 0),
(19, 'BKabboAP0O', 'Kabbo', 'Malek', 0),
(20, 'BLabboAP11L', 'Labbo', 'Bonna', 0),
(21, 'BKabboAP9L', 'Kabbo', 'Bonna', 0),
(22, 'BLabboAP5J', 'Labbo', 'Malek', 0),
(23, 'BHabboAP5N', 'Habbo', 'Bonna', 0);

--
-- Triggers `apartment`
--
DELIMITER $$
CREATE TRIGGER `addtodues` AFTER INSERT ON `apartment` FOR EACH ROW INSERT INTO dues VALUES (null, New.apartmentName, '0')
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `building`
--

CREATE TABLE `building` (
  `buildingID` int(11) NOT NULL,
  `buildingName` varchar(255) NOT NULL,
  `buildingLoc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `building`
--

INSERT INTO `building` (`buildingID`, `buildingName`, `buildingLoc`) VALUES
(1, 'Labbo', 'Gulshan-1'),
(2, 'Kabbo', 'Gulshan-2'),
(3, 'Habbo', 'Dhanmondi');

-- --------------------------------------------------------

--
-- Table structure for table `complain`
--

CREATE TABLE `complain` (
  `cmpID` int(11) NOT NULL,
  `cmpEmail` varchar(255) NOT NULL,
  `cmpDetails` varchar(1000) NOT NULL,
  `cmpApt` varchar(255) NOT NULL,
  `cmpTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `action` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complain`
--

INSERT INTO `complain` (`cmpID`, `cmpEmail`, `cmpDetails`, `cmpApt`, `cmpTime`, `action`) VALUES
(1, 'test@test.com', 'lorem ipsum', 'B01AP02A', '2023-02-15 08:30:24', 1),
(2, 'test@test.com', 'Nam a arcu nec ex blandit faucibus. Vestibulum nisl dui, molestie sit amet rhoncus pharetra, laoreet ac magna. Donec facilisis, neque vel semper suscipit, turpis nibh finibus dolor, ac feugiat massa sapien eu ex. Suspendisse malesuada elit non dolor vestibulum mattis. Sed interdum, enim sed pharetra dapibus, elit ligula laoreet.', 'B01AP01A', '2023-02-15 08:51:32', 0);

-- --------------------------------------------------------

--
-- Table structure for table `dues`
--

CREATE TABLE `dues` (
  `dueID` int(11) NOT NULL,
  `dueApt` varchar(255) NOT NULL,
  `dueAmount` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dues`
--

INSERT INTO `dues` (`dueID`, `dueApt`, `dueAmount`) VALUES
(1, 'BKabboAP0A', 531347),
(3, 'BKabboAP6N', 0),
(4, 'BLabboAP6Q', 0),
(5, 'BLabboAP0N', 0),
(7, 'BKabboAP0O', 0),
(8, 'BKabboAP0O', 0),
(9, 'BLabboAP11L', 0),
(10, 'BKabboAP9L', 0),
(11, 'BLabboAP5J', 100),
(12, 'BHabboAP5N', 0);

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoiceID` int(11) NOT NULL,
  `month` varchar(50) NOT NULL,
  `receivedFrom` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `gasBill` int(11) NOT NULL,
  `elcBill` int(11) NOT NULL,
  `otherBill` int(11) NOT NULL,
  `rentDue` int(11) NOT NULL,
  `monthlyRent` int(11) NOT NULL,
  `newDue` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `apartment` varchar(11) NOT NULL,
  `total` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoiceID`, `month`, `receivedFrom`, `amount`, `gasBill`, `elcBill`, `otherBill`, `rentDue`, `monthlyRent`, `newDue`, `year`, `apartment`, `total`) VALUES
(3, 'September', 'hy', 5, 697, 5687, 5789, 0, 97, 12265, 2023, 'BKabboAP9L', 12270),
(4, 'November', 'io', 98, 969, 6986, 986, 0, 986, 9829, 2023, 'BLabboAP0N', 9927);

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `managerID` int(11) NOT NULL,
  `managerName` varchar(255) NOT NULL,
  `managerEmail` varchar(255) NOT NULL,
  `managerPass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`managerID`, `managerName`, `managerEmail`, `managerPass`) VALUES
(1, 'Manager01', 'manager01@apartment.com', '429a714ddc77d167d6f6c7c1eca1e362');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payID` int(11) NOT NULL,
  `staffType` varchar(255) NOT NULL,
  `staffName` varchar(255) NOT NULL,
  `staffBld` varchar(255) NOT NULL,
  `payMonth` varchar(255) NOT NULL,
  `payAmount` int(11) NOT NULL,
  `payDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payID`, `staffType`, `staffName`, `staffBld`, `payMonth`, `payAmount`, `payDate`) VALUES
(7, 'Security', 'Rahim', 'B01', 'February', 3000, '2023-01-20 15:57:45'),
(8, 'Cleaner', 'Jorina', 'B01', 'May', 400, '2023-01-20 15:58:03'),
(9, 'Security', 'Rahim', 'B01', 'January', 3000, '2023-01-20 15:58:40');

-- --------------------------------------------------------

--
-- Table structure for table `rent`
--

CREATE TABLE `rent` (
  `rentID` int(11) NOT NULL,
  `rentMonth` varchar(255) NOT NULL,
  `rentReceived` varchar(255) NOT NULL,
  `rentGas` int(255) NOT NULL,
  `rentCurrent` int(255) NOT NULL,
  `rentOthers` int(255) NOT NULL,
  `rentAmount` varchar(255) NOT NULL,
  `rentApt` varchar(255) NOT NULL,
  `rentDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `rentDateOnly` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rent`
--

INSERT INTO `rent` (`rentID`, `rentMonth`, `rentReceived`, `rentGas`, `rentCurrent`, `rentOthers`, `rentAmount`, `rentApt`, `rentDate`, `rentDateOnly`) VALUES
(2, 'August', 'Hakim', 0, 0, 0, '14000', 'BKabboAP6C', '2023-01-21 10:35:45', ''),
(3, 'October', 'Hakim', 0, 0, 0, '16000', 'BLabboAP6C', '2023-01-21 10:35:36', ''),
(4, 'January', 'Jahir', 0, 0, 0, '30000', 'BHabboAP6C', '2023-02-15 18:39:49', ''),
(5, 'October', 'Karishma', 0, 0, 0, '90000', 'BLabboAP6C', '2023-01-21 10:35:05', ''),
(6, 'January', 'Labonno', 0, 0, 0, '90000', 'BKabboAP6C', '2023-01-21 09:28:23', ''),
(7, 'January', 'Labonno', 0, 0, 0, '16000', 'BLabboAP4E', '2023-01-28 05:42:40', ''),
(12, 'February', 'Labonno', 0, 0, 0, '16000', 'BHabboAP6C', '2023-02-06 19:08:21', ''),
(13, 'February', 'Hakim', 1200, 3000, 500, '13000', 'BKabboAP5D', '2023-02-11 11:54:15', ''),
(14, 'January', 'j', 89, 0, 0, '78', 'BLabboAP0A', '2023-02-12 07:26:13', '2023-02-12'),
(15, 'January', 'l', 7, 0, 9, '87', 'BLabboAP0A', '2023-02-12 07:26:55', '2023-02-12'),
(16, 'January', 'Jahir', 300, 400, 100, '7000', 'BKabboAP0A', '2023-02-17 19:48:12', '2023-02-17'),
(17, 'January', 'Jahir', 9786, 876, 90786, '78', 'BKabboAP0A', '2023-02-17 20:44:44', '2023-02-17'),
(18, 'January', 'Karishma', 400, 300, 2000, '78000', 'BKabboAP0A', '2023-02-17 20:55:16', '2023-02-17'),
(19, 'January', 'lkjsv', 45345, 44, 453245, '3241', 'BKabboAP0A', '2023-03-18 16:58:17', '2023-03-18'),
(20, 'January', 'aa', 2, 22, 2, '2', 'BLabboAP0A', '2023-03-22 07:55:57', '2023-03-22'),
(21, 'January', 'aa', 65, 865, 865, '87', 'apartment', '2023-03-22 09:33:19', '2023-03-22'),
(22, 'October', 'mm', 6798, 57, 575, '77', 'apartment', '2023-03-22 09:44:54', '2023-03-22'),
(23, 'September', 'hy', 697, 5687, 5789, '5', 'apartment', '2023-03-22 09:46:40', '2023-03-22'),
(24, 'November', 'io', 969, 6986, 986, '98', 'apartment', '2023-03-22 11:06:44', '2023-03-22');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `roleid` int(11) NOT NULL,
  `roleName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`roleid`, `roleName`) VALUES
(1, 'Security'),
(2, 'Caretaker'),
(5, 'Cleaner'),
(6, 'Maid'),
(7, 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staffID` int(11) NOT NULL,
  `staffName` varchar(255) NOT NULL,
  `staffContact` char(255) NOT NULL,
  `staffFather` varchar(255) NOT NULL,
  `staffAddr` varchar(255) NOT NULL,
  `staffRole` varchar(255) NOT NULL,
  `staffStart` date NOT NULL,
  `staffBuilding` varchar(255) NOT NULL,
  `staffNidFront` varchar(255) NOT NULL,
  `staffNidBack` varchar(255) NOT NULL,
  `staffPicture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staffID`, `staffName`, `staffContact`, `staffFather`, `staffAddr`, `staffRole`, `staffStart`, `staffBuilding`, `staffNidFront`, `staffNidBack`, `staffPicture`) VALUES
(1, 'Rahim', '01785673212', '', '', 'security', '2023-01-10', 'B02', '/apartment/users/staff/staffsNID/davisuko-5E5N49RWtbA-unsplash.jpg', '/apartment/users/staff/staffsNID/chris-lawton-5IHz5WhosQE-unsplash.jpg', '/apartment/users/staff/staffsNID/user02.jpg'),
(3, 'Jorina', '01785673768', '', '', 'cleaner', '2023-01-19', 'B03', '/apartment/users/staff/staffsNID/davisuko-5E5N49RWtbA-unsplash.jpg', '/apartment/users/staff/staffsNID/chris-lawton-5IHz5WhosQE-unsplash.jpg', '/apartment/users/staff/staffsNID/user02.jpg'),
(4, 'Harun', '01785673767', '', '', 'caretaker', '2023-01-26', 'B03', '/apartment/users/staff/staffsNID/kkk.png', '/apartment/users/staff/staffsNID/kkk.png', '/apartment/users/staff/staffsNID/kkk.png'),
(5, 'Manik', '01785673767', '', '', 'security', '2023-01-11', 'Kabbo', '/apartment/users/staff/staffsNID/kkk.png', '/apartment/users/staff/staffsNID/kkk.png', '/apartment/users/staff/staffsNID/kkk.png');

-- --------------------------------------------------------

--
-- Table structure for table `tenant`
--

CREATE TABLE `tenant` (
  `tenantID` int(11) NOT NULL,
  `tenantName` varchar(255) NOT NULL,
  `fatherName` varchar(255) NOT NULL,
  `pAddress` varchar(255) NOT NULL,
  `po` varchar(255) NOT NULL,
  `ps` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `village` varchar(255) NOT NULL,
  `apartmentName` varchar(255) NOT NULL,
  `building` varchar(11) NOT NULL,
  `tenantContact` char(255) NOT NULL,
  `monRent` int(11) NOT NULL,
  `tenantStart` date NOT NULL,
  `tenantEmail` varchar(255) NOT NULL,
  `lastPaid` varchar(255) NOT NULL,
  `nidNumber` int(255) NOT NULL,
  `nidFrontDir` varchar(255) NOT NULL,
  `nidBackDir` varchar(255) NOT NULL,
  `profilepic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tenant`
--

INSERT INTO `tenant` (`tenantID`, `tenantName`, `fatherName`, `pAddress`, `po`, `ps`, `district`, `village`, `apartmentName`, `building`, `tenantContact`, `monRent`, `tenantStart`, `tenantEmail`, `lastPaid`, `nidNumber`, `nidFrontDir`, `nidBackDir`, `profilepic`) VALUES
(11, 'Jubayer', '', '', '', '', '', '', 'BHabboAP6C', 'Habbo', '0123456789', 0, '2023-01-13', 'jubayer@example.com', 'February', 0, '/apartment/users/tenants/tenantsNID/davisuko-5E5N49RWtbA-unsplash.jpg', '/apartment/users/tenants/tenantsNID/chris-lawton-5IHz5WhosQE-unsplash.jpg', '/apartment/users/tenants/tenantsNID/user02.jpg'),
(12, 'Fahim', 'Ahmed Aziz', 'banani', 'idk', 'idk', 'Dhaka', 'idk', 'BLabboAP5E', 'Labbo', '01571364368', 90000, '2023-01-04', 'fahim@example.com', 'January', 999765432, '/apartment/users/tenants/tenantsNID/davisuko-5E5N49RWtbA-unsplash.jpg', '/apartment/users/tenants/tenantsNID/chris-lawton-5IHz5WhosQE-unsplash.jpg', '/apartment/users/tenants/tenantsNID/user02.jpg'),
(14, 'Shahadat', '', '', '', '', '', '', 'BKabboAP6C', 'Kabbo', '0123456788', 0, '2023-01-01', 'sn23@test.com', 'January', 0, '/apartment/users/tenants/tenantsNID/kkk.png', '/apartment/users/tenants/tenantsNID/kkk.png', '/apartment/users/tenants/tenantsNID/kkk.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `apartment`
--
ALTER TABLE `apartment`
  ADD PRIMARY KEY (`apartmentID`),
  ADD UNIQUE KEY `apartmentName` (`apartmentName`);

--
-- Indexes for table `building`
--
ALTER TABLE `building`
  ADD PRIMARY KEY (`buildingID`);

--
-- Indexes for table `complain`
--
ALTER TABLE `complain`
  ADD PRIMARY KEY (`cmpID`);

--
-- Indexes for table `dues`
--
ALTER TABLE `dues`
  ADD PRIMARY KEY (`dueID`),
  ADD KEY `due` (`dueApt`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoiceID`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`managerID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payID`);

--
-- Indexes for table `rent`
--
ALTER TABLE `rent`
  ADD PRIMARY KEY (`rentID`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`roleid`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staffID`);

--
-- Indexes for table `tenant`
--
ALTER TABLE `tenant`
  ADD PRIMARY KEY (`tenantID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `apartment`
--
ALTER TABLE `apartment`
  MODIFY `apartmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `building`
--
ALTER TABLE `building`
  MODIFY `buildingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `complain`
--
ALTER TABLE `complain`
  MODIFY `cmpID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `dues`
--
ALTER TABLE `dues`
  MODIFY `dueID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoiceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `managerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `rent`
--
ALTER TABLE `rent`
  MODIFY `rentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `roleid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staffID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tenant`
--
ALTER TABLE `tenant`
  MODIFY `tenantID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
