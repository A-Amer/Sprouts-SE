

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

create database Sprouts;
use Sprouts;
--
-- Database: `Sprouts`
--


-- --------------------------------------------------------

--
-- Table structure for table `center_schedule`
--

CREATE TABLE `center_schedule` (
  `courseID` int(10) NOT NULL,
  `day` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `startTime` time NOT NULL,
  `endTime` time NOT NULL,
  `open` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `center_schedule`
--

INSERT INTO `center_schedule` (`courseID`, `day`, `startTime`, `endTime`, `open`) VALUES
(1, 'monday', '06:00:00', '09:00:00', 1),
(1, 'sunday', '11:00:00', '12:00:00', 1),
(1, 'sunday', '12:00:00', '14:00:00', 1),
(1, 'wednesday', '16:00:00', '18:00:00', 1),
(5, 'tuesday', '13:00:00', '14:00:00', 1),
(6, 'sunday', '11:00:00', '12:00:00', 1),
(9, 'tuesday', '18:00:00', '20:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `ID` int(10) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Description` text COLLATE utf8_unicode_ci NOT NULL,
  `instructorID` int(10) NOT NULL,
  `maxNumber` int(10) NOT NULL,
  `price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`ID`, `name`, `Description`, `instructorID`, `maxNumber`, `price`) VALUES
(1, 'math1', 'course math', 1, 3, 300),
(4, 'new media', 'media ', 47, 15, 400),
(5, 'translation ', 'for beginner', 48, 40, 200),
(6, 'decoration', 'beginners ', 49, 30, 1500),
(9, 'math5', 'prequistes math4', 55, 15, 100),
(10, 'Presentaion skills', 'prequistes technical writing', 57, 30, 100);



-- --------------------------------------------------------

--
-- Table structure for table `students_notifications`
--

-- --------------------------------------------------------

--
-- Table structure for table `student_schedule`
--

CREATE TABLE `student_schedule` (
  `studentID` int(10) NOT NULL,
  `courseID` int(10) NOT NULL,
  `day` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `startTime` time NOT NULL,
  `endTime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `student_schedule`
--

INSERT INTO `student_schedule` (`studentID`, `courseID`, `day`, `startTime`, `endTime`) VALUES
(3, 6, 'sunday', '11:00:00', '12:00:00'),
(5, 1, 'monday', '05:00:00', '07:00:00'),
(8, 1, 'monday', '06:00:00', '09:00:00'),
(18, 1, 'monday', '06:00:00', '09:00:00'),
(23, 1, 'monday', '06:00:00', '09:00:00'),
(53, 5, 'tuesday', '13:00:00', '14:00:00'),
(53, 6, 'sunday', '11:00:00', '12:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Id` int(10) NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `privilage` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Id`, `email`, `password`, `name`, `privilage`) VALUES
(1, 'instructor@gmail.com', '123', 'Instructor Name', 1),
(3, 'student@gmail.com', '1234', 'Student Name', 2),
(4, 'admin@gmail.com', '1234', 'Admin Name', 0),
(5, 'ziad@gmail.com', 'ziad1', 'ziad ', 2),
(7, 'mohamed_HASSAN96@HOTMAIL.COM', '12345', 'Zefo', 2),
(8, 'hamdy@gmail.com', '123', 'Moahmed Hamdy', 2),
(10, 'admin1@gmail.com', '123', 'admin1', 0),
(18, 'ahmed@gmail.com', '123', 'Ahmed ismael', 2),
(23, 'hassan@gmail.com', '123', 'mohamed', 2),
(25, 'admin2@gmail.com', '123', 'admin2', 0),
(47, 'samorty@live.com', '2041995', 'samar mohamed ', 1),
(48, 'dandan_184@hotmail.com', '012345', 'Dana Hani Ahmed', 1),
(49, 'merna_beauty_girl@hotmail.com', 'mirnahanii', 'mirna hani', 1),
(50, 'toukhy55_mido@hotmail.com', '123456789', 'toukhy', 2),
(53, 'salah_slmy@hotmail.com', 'baboes', 'salah', 2),
(54, 'Mohamed_hamdy@hotamil.com', '123', 'Mohamed Hamdy', 2),
(55, 'mohamed_h@gmail.com', '123', 'Mohamed Hamdy', 1),
(56, 'mohmed_hassan96@hotmail.com', '100000', 'Mohamed Zeftawey', 0),
(57, 'Anas@gmail.com', '123', 'Anas El Shazly', 1),
(61, 'A_hesham@gmail.com', '112233', 'Ahmed Hesham', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `center_schedule`
--
ALTER TABLE `center_schedule`
  ADD PRIMARY KEY (`courseID`,`day`,`startTime`,`endTime`),
  ADD KEY `courseID` (`courseID`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `instructorID` (`instructorID`);


--
-- Indexes for table `student_schedule`
--
ALTER TABLE `student_schedule`
  ADD PRIMARY KEY (`studentID`,`courseID`),
  ADD KEY `studentID` (`studentID`),
  ADD KEY `courseID` (`courseID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `center_schedule`
--
ALTER TABLE `center_schedule`
  ADD CONSTRAINT `center_schedule_ibfk_1` FOREIGN KEY (`courseID`) REFERENCES `courses` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`instructorID`) REFERENCES `users` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_schedule`
--
ALTER TABLE `student_schedule`
  ADD CONSTRAINT `student_schedule_ibfk_1` FOREIGN KEY (`studentID`) REFERENCES `users` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_schedule_ibfk_2` FOREIGN KEY (`courseID`) REFERENCES `courses` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
