-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2023 at 02:15 AM
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
  `aptFair` int(11) NOT NULL,
  `tenantName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `apartment`
--

INSERT INTO `apartment` (`apartmentID`, `apartmentName`, `building`, `aptOwner`, `aptFair`, `tenantName`) VALUES
(1, 'BKabboAP1A', 'Kabbo', 'Malek', 10000, NULL),
(2, 'BKabboAP2B', 'Kabbo', 'Malek', 12000, NULL),
(3, 'BLabboAP7A', 'Labbo', 'Bonna', 8000, NULL),
(4, 'BLabboAP7F', 'Labbo', 'Bonna', 20000, 'Jubayer'),
(5, 'BPabboAP0D', 'Pabbo', 'Jamir', 13000, NULL),
(6, 'BPabboAP2C', 'Pabbo', 'Jamir', 8000, NULL);

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
  `buildingLoc` varchar(255) NOT NULL,
  `buildingStor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `building`
--

INSERT INTO `building` (`buildingID`, `buildingName`, `buildingLoc`, `buildingStor`) VALUES
(20, 'Labbo', 'Dhanmondi', 12),
(21, 'Kabbo', 'Gulshan-1', 10),
(22, 'Pabbo', 'Mirpur', 22);

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
-- Table structure for table `deed`
--

CREATE TABLE `deed` (
  `deedID` int(11) NOT NULL,
  `tenantID` int(11) NOT NULL,
  `deedPath` varchar(255) NOT NULL,
  `ext` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deed`
--

INSERT INTO `deed` (`deedID`, `tenantID`, `deedPath`, `ext`) VALUES
(11, 11, '/ams/users/tenants/deed/An online platform for inventors and investors -Formatted Paper.pdf', 'pdf'),
(12, 11, '/ams/users/tenants/deed/Kazi Nayeem Hossain_page-0001.jpg', 'jpg');

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
(1, 'BKabboAP1A', 0),
(2, 'BKabboAP2B', 0),
(3, 'BLabboAP7A', 0),
(4, 'BLabboAP7F', 1400),
(5, 'BPabboAP0D', 0),
(6, 'BPabboAP2C', 0);

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
(4, 'November', 'io', 98, 969, 6986, 986, 0, 986, 9829, 2023, 'BLabboAP0N', 9927),
(5, 'January', 'Hakim', 111, 11, 11, 11, 0, 111, 0, 2023, 'BLabboAP1A', 0),
(6, 'April', 'Karishma', 12, 90, 34, 21, 0, 0, 133, 2023, 'BPabboAP1C', 145),
(7, 'January', 'Jahir', 23, 23, 23, 23, 0, 879, 925, 2023, 'BHabboAP3J', 948),
(8, 'April', 'Hakim', 90, 90, 9, 9, 0, 879, 897, 2023, 'BHabboAP3J', 987),
(9, 'April', 'Karishma', 22000, 900, 1500, 1000, 0, 20000, 1400, 2023, 'BLabboAP7F', 23400);

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
(1, 'April', 'Karishma', 900, 1500, 1000, '22000', 'BLabboAP7F', '2023-04-06 23:32:17', '2023-04-07');

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
(1, 'Jubayer', 'Ahmed', 'Block -F, Road- 06, House-12', 'adada', 'asf', 'Dhaka', 'fefwe', 'BLabboAP7F', 'Labbo', '01571364363', 20000, '2023-04-06', 'shahadatnayeem23@gmail.com', 'April', 999765432, '/ams/users/tenants/tenantsNID/kate-macate-xmddEHyCisc-unsplash.jpg', '/ams/users/tenants/tenantsNID/kate-macate-xmddEHyCisc-unsplash.jpg', '/ams/users/tenants/tenantsNID/alexander-hipp-iEEBWgY_6lA-unsplash.jpg');

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
-- Indexes for table `deed`
--
ALTER TABLE `deed`
  ADD PRIMARY KEY (`deedID`);

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
  MODIFY `apartmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `building`
--
ALTER TABLE `building`
  MODIFY `buildingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `complain`
--
ALTER TABLE `complain`
  MODIFY `cmpID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `deed`
--
ALTER TABLE `deed`
  MODIFY `deedID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `dues`
--
ALTER TABLE `dues`
  MODIFY `dueID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoiceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
  MODIFY `rentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `tenantID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
