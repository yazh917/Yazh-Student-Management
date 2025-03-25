-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2024 at 12:02 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yzstudentmanagementsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `IDAdmin` int(50) NOT NULL,
  `AdminName` varchar(100) NOT NULL,
  `PasswordAD` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`IDAdmin`, `AdminName`, `PasswordAD`) VALUES
(1001, 'ONG', 'ae5495699');

-- --------------------------------------------------------

--
-- Table structure for table `admin_logins`
--

CREATE TABLE `admin_logins` (
  `LoginID` int(11) NOT NULL,
  `IDAdmin` int(50) DEFAULT NULL,
  `login_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_logins`
--

INSERT INTO `admin_logins` (`LoginID`, `IDAdmin`, `login_date`) VALUES
(1, 1001, '2024-12-12 16:23:52'),
(2, 1001, '2024-12-12 16:26:32'),
(3, 1001, '2024-12-12 16:27:52'),
(4, 1001, '2024-12-12 18:02:52'),
(5, 1001, '2024-12-12 19:54:21'),
(6, 1001, '2024-12-13 00:44:18'),
(7, 1001, '2024-12-13 00:48:48');

-- --------------------------------------------------------

--
-- Table structure for table `admission`
--

CREATE TABLE `admission` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `IC` varchar(20) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Phone` varchar(20) NOT NULL,
  `Message` text DEFAULT NULL,
  `Status` enum('Pending','Approved','Rejected') DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admission`
--

INSERT INTO `admission` (`ID`, `Name`, `IC`, `Email`, `Phone`, `Message`, `Status`) VALUES
(1, 'ONG', '123456', 'ong@gmail.com', '123456', 'Hello', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `IDCourse` int(50) NOT NULL,
  `CourseName` varchar(255) NOT NULL,
  `CourseImage` varchar(255) DEFAULT NULL,
  `IDTeacher` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`IDCourse`, `CourseName`, `CourseImage`, `IDTeacher`) VALUES
(1, 'Diploma in Information Technology', 'image/DIT.jpg', '1002'),
(2, 'Diploma in Digital Marketing', 'image/DDM.jpg', NULL),
(3, 'Diploma in Business Management', 'image/DBM.jpg', NULL),
(4, 'Diploma in Fashion Design', 'image/DFD.jpg', NULL),
(5, 'Diploma in Graphic Design', 'image/DGD.jpg', NULL),
(6, 'Diploma in Early Childhood Education', 'image/DECE.jpg', NULL),
(7, 'Bachelor of Law (LLB)', 'image/BL.jpg', NULL),
(8, 'Bachelor of Computer Science', 'image/BCS.jpg', NULL),
(9, 'Bachelor of Marketing', 'image/BM.jpg', NULL),
(10, 'Bachelor of Human Resource Management', 'image/BHR.jpg', NULL),
(11, 'Bachelor of Biomedical Science', 'image/BBS.jpg', NULL),
(12, 'Bachelor of Accounting', 'image/BA.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `StudentID` int(11) NOT NULL,
  `StudentName` varchar(100) NOT NULL,
  `PasswordST` varchar(255) NOT NULL,
  `EmailST` varchar(100) NOT NULL,
  `Phone` text NOT NULL,
  `CourseName` varchar(255) NOT NULL,
  `TeacherName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`StudentID`, `StudentName`, `PasswordST`, `EmailST`, `Phone`, `CourseName`, `TeacherName`) VALUES
(20620, 'yangzhi', 'yangzhi', 'ongyangzhi@gmail.com', '0112152423', 'Diploma in IT', 'Alex Chong');

-- --------------------------------------------------------

--
-- Table structure for table `student_courses`
--

CREATE TABLE `student_courses` (
  `ID` int(11) NOT NULL,
  `StudentID` int(11) NOT NULL,
  `CourseID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_logins`
--

CREATE TABLE `student_logins` (
  `LoginID` int(11) NOT NULL,
  `StudentID` int(11) NOT NULL,
  `login_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_logins`
--

INSERT INTO `student_logins` (`LoginID`, `StudentID`, `login_date`) VALUES
(1, 20620, '2024-12-13 02:48:08'),
(2, 20620, '2024-12-13 03:13:01'),
(3, 20620, '2024-12-13 03:13:48'),
(4, 20620, '2024-12-13 03:20:40'),
(5, 20620, '2024-12-13 14:08:43');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `IDSubject` int(11) NOT NULL,
  `SubjectName` varchar(255) NOT NULL,
  `SubjectImage` varchar(255) DEFAULT NULL,
  `IDCourse` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`IDSubject`, `SubjectName`, `SubjectImage`, `IDCourse`) VALUES
(1, 'Cloud Computing', 'Subject Diploma in Information Technology/CC.JPG', 1),
(2, 'Cybersecurity', 'Subject Diploma in Information Technology/CS.JPG', 1),
(3, 'Database Management Software', 'Subject Diploma in Information Technology/DM.JPG', 1),
(4, 'Data Structure', 'Subject Diploma in Information Technology/DS.JPG', 1),
(5, 'Fundamentals Programming', 'Subject Diploma in Information Technology/FP.JPG', 1),
(6, 'Human-Computer Interaction', 'Subject Diploma in Information Technology/HCI.JPG', 1),
(7, 'Oriented Operation Programming', 'Subject Diploma in Information Technology/OOP.JPG', 1),
(8, 'Operating System', 'Subject Diploma in Information Technology/OS.JPG', 1),
(9, 'Business Ethic', 'Subject DDM/BE.jpg', 2),
(10, 'Content Marketing', 'Subject DDM/CM.jpg', 2),
(11, 'Communication', 'Subject DDM/Com.jpg', 2),
(12, 'Digital Marketing Strategies', 'Subject DDM/DMS.jpg', 2),
(13, 'E-Commerce', 'Subject DDM/ECM.jpg', 2),
(14, 'Marketing Research', 'Subject DDM/MR.jpg', 2),
(17, 'Online Advertising', 'Subject DDM/OA.jpg', 2),
(18, 'Social Media Marketing', 'Subject DDM/SMM.jpg', 2),
(19, 'Business Communication', 'Subject DBM/BC.jpg', 3),
(20, 'Business Ethic', 'Subject DBM/BE.jpg', 3),
(21, 'Business Law', 'Subject DBM/BL.jpg', 3),
(22, 'Business Statistics', 'Subject DBM/BS.jpg', 3),
(23, 'Entrepreneurship ', 'Subject DBM/ESHIP.jpg', 3),
(24, 'Human Resources', 'Subject DBM/HR.jpg', 3),
(25, 'International Business', 'Subject DBM/IB.jpg', 3),
(26, 'Operating Management', 'Subject DBM/OM.jpg', 3),
(27, 'Draping Techniques', 'Subject DFD/DT.jpg', 4),
(28, 'Fashion Design Principle', 'Subject DFD/FDP.jpg', 4),
(29, 'Fashion Illustration', 'Subject DFD/FI.jpg', 4),
(30, 'Fashion Marketing and Merchandising', 'Subject DFD/FMM.jpg', 4),
(31, 'Fashion Technology', 'Subject DFD/FT.jpg', 4),
(32, 'History of Fashion', 'Subject DFD/HF.jpg', 4),
(33, 'Pattern Making and Garment Construction', 'Subject DFD/PMGC.jpg', 4),
(34, 'Textile Science', 'Subject DFD/TS.jpg', 4),
(35, 'Branding and Identity Design', 'Subject DGD/BID.jpg', 5),
(36, 'Digital Imaging', 'Subject DGD/DG.jpg', 5),
(37, 'Drawing and Illustration', 'Subject DGD/DI.jpg', 5),
(38, 'Fundamentals of Graphic Design', 'Subject DGD/FGD.jpg', 5),
(39, 'Packaging Design', 'Subject DGD/PD.jpg', 5),
(40, 'Typography', 'Subject DGD/TYPO.jpg', 5),
(41, 'User Experience (UX) and User Interface (UI) Design', 'Subject DGD/UXUI.jpg', 5),
(42, 'Web Design Principle', 'Subject DGD/WDP.jpg', 5),
(43, 'Creative Arts and Music for Young Children', 'Subject DECE/AMC.jpg', 6),
(44, 'Child Growth and Development', 'Subject DECE/CGD.jpg', 6),
(45, 'Early Childhood Curriculum Planning', 'Subject DECE/ECCP.jpg', 6),
(46, 'Health, Safety, and Nutrition', 'Subject DECE/HSN.jpg', 6),
(47, 'Introduction to Early Childhood Education', 'Subject DECE/IECE.jpg', 6),
(48, 'Language and Literacy Development', 'Subject DECE/LLD.jpg', 6),
(49, 'Mathematics and Science for Early Learners', 'Subject DECE/MSC.jpg', 6),
(50, 'Psychology of Learning and Development', 'Subject DECE/PLD.jpg', 6),
(51, 'Administrative Law', 'Subject BLAW/AL.jpg', 7),
(52, 'Constitutional Law', 'Subject BLAW/CL.jpg', 7),
(53, 'Criminal Law', 'Subject BLAW/CRIL.jpg', 7),
(54, 'Equity and Trusts', 'Subject BLAW/ET.jpg', 7),
(55, 'Introduction to Law', 'Subject BLAW/IL.jpg', 7),
(56, 'Legal Methods and Writing', 'Subject BLAW/LMW.jpg', 7),
(57, 'Property Law', 'Subject BLAW/PL.jpg', 7),
(58, 'Tort Law', 'Subject BLAW/TL.jpg', 7),
(59, 'Analytics', 'Subject BCS/ANA.jpg', 8),
(60, 'Computer Graphics', 'Subject BCS/CG.jpg', 8),
(61, 'Computational Mathematics', 'Subject BCS/CM.jpg', 8),
(62, 'Discrete Mathematic', 'Subject BCS/DM.jpg', 8),
(63, 'IT Project Management', 'Subject BCS/IPM.jpg', 8),
(64, 'Machine Learning', 'Subject BCS/ML.jpg', 8),
(65, 'Network Security Design', 'Subject BCS/NSD.jpg', 8),
(66, 'Software Engineering', 'Subject BCS/SE.jpg', 8),
(67, 'Consumer Behaviours', 'Subject BMKT/CB.jpg', 9),
(68, 'Customer Relationship Management', 'Subject BMKT/CRM.jpg', 9),
(69, 'Finance', 'Subject BMKT/FI.jpg', 9),
(70, 'Global Marketing', 'Subject BMKT/GM.jpg', 9),
(71, 'Operation Management', 'Subject BMKT/OM.jpg', 9),
(72, 'Product Management', 'Subject BMKT/PM.jpg', 9),
(73, 'Retailing', 'Subject BMKT/RE.jpg', 9),
(74, 'Service Marketing', 'Subject BMKT/SM.jpg', 9),
(75, 'Conflict Resolution and Negotiation', 'Subject BHR/CRN.jpg', 10),
(76, 'Ethics in Human Resource Management', 'Subject BHR/EHRM.jpg', 10),
(77, 'HR Analytics', 'Subject BHR/HA.jpg', 10),
(79, 'Human Resource Planning and Development', 'Subject BHR/HRPD.jpg', 10),
(80, 'International Human Resource Management', 'Subject BHR/IHRM.jpg', 10),
(81, 'Performance Management', 'Subject BHR/PM.jpg', 10),
(82, 'Recruitment and Selection', 'Subject BHR/RS.jpg', 10),
(83, 'Strategic Human Resource Management', 'Subject BHR/SHRM.jpg', 10),
(84, 'Biomedical Instrumentation', 'Subject BBS/BI.jpg', 11),
(85, 'Cell Biology', 'Subject BBS/CB.jpg', 11),
(86, 'Genetics and Genomics', 'Subject BBS/GG.jpg', 11),
(87, 'Human Anatomy and Physiology', 'Subject BBS/HAP.jpg', 11),
(88, 'Molecular Biology', 'Subject BBS/MB.jpg', 11),
(89, 'Medical Microbiology', 'Subject BBS/MM.jpg', 11),
(90, 'Pathology', 'Subject BBS/PATH.jpg', 11),
(91, 'Pharmacology', 'Subject BBS/PHAR.jpg', 11),
(92, 'Auditing and Assurance', 'Subject BACC/AA.jpg', 12),
(93, 'Accounting Information Systems', 'Subject BACC/AIS.jpg', 12),
(94, 'Cost Accounting', 'Subject BACC/CA.jpg', 12),
(95, 'Corporate Reporting', 'Subject BACC/CR.jpg', 12),
(96, 'Financial Accounting', 'Subject BACC/FA.jpg', 12),
(97, 'Management Accounting', 'Subject BACC/MA.jpg', 12),
(98, 'Principles of Accounting', 'Subject BACC/PA.jpg', 12),
(99, 'Taxation', 'Subject BACC/TXT.jpg', 12);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `IDTeacher` varchar(50) NOT NULL,
  `TeacherName` varchar(100) NOT NULL,
  `Email` varchar(500) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Description` text NOT NULL,
  `PersonalPhoto` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`IDTeacher`, `TeacherName`, `Email`, `Password`, `Description`, `PersonalPhoto`) VALUES
('1001', 'Alex Harper', 'Alex@gmail.com', 'teacher', 'Alex Harper has over 10 years of experience in digital marketing. He/she has worked as a digital marketing consultant for several multinational companies, specializing in SEO, social media strategy, and content marketing. Alex is known for creating innovative campaigns that significantly increase brand awareness and customer engagement. Alex is passionate about teaching, combining real-world examples with the latest trends to prepare students for success in the digital marketing industry.', 'image/AlexHarper.jpg'),
('1002', 'Alex Chong', '', '', 'Alex Chong is a seasoned IT professional with over 15 years of experience in the technology sector. With a focus on system architecture, cybersecurity, and cloud computing, he has led projects for startups and Fortune 500 companies. Known for his problem-solving skills, Alex has developed robust and scalable IT solutions to improve organizational efficiency. As a mentor and educator, he is committed to sharing his expertise to prepare the next generation of IT professionals for the rapidly evolving technology landscape.', 'image/Mr.Alex Chong.jpg'),
('1003', 'Dr. Michael Lee', '', '', 'Dr. Michael Lee is an experienced business consultant and educator with extensive experience in business management, finance, and organizational leadership. His courses are designed to teach students the ins and outs of running a successful business, from decision making to financial planning. Dr. Lee incorporates real-world case studies and industry insights into his classes to prepare students for leadership roles in a variety of fields. When not teaching, Dr. Lee is frequently invited to speak at international business conferences and writes articles for leading business journals.', 'image/Dr.Michael Lee.jpg'),
('1004', 'Sophia Cheng', '', '', 'Sophia Cheng has over 12 years of experience in the fashion design industry, having worked with renowned international brands. She excels at combining creativity with market trends to create innovative and practical designs. Sophia is passionate about teaching, guiding students in their technical skills and artistic vision. She also organizes fashion shows and design competitions to provide students with practical experience.', 'image/Sophia Cheng.jpg'),
('1005', 'Emily Wong', '', '', 'Emily Wong has over 8 years of experience as a graphic designer, having worked on projects ranging from branding to user interface design. She has worked with top agencies to create visually stunning campaigns for international clients. Emily is committed to teaching the fundamentals of design while inspiring students to be creative and innovative. She often incorporates industry trends and real-world projects into her courses to prepare students for careers in graphic design.', 'image/EmilyWong.jpg'),
('1006', 'Linda Chan', '', '', 'Linda Chan has over 10 years of experience in early childhood education, specializing in child development and creative teaching methods. She has worked with various kindergartens to implement innovative learning programs that promote cognitive and emotional growth in young children. Linda is passionate about creating a nurturing environment for children that seamlessly blends fun and learning. Her expertise includes designing age-appropriate curriculum and mentoring aspiring educators in the field.', 'image/LindaChan.jpg'),
('1007', 'Dr James Tan', '', '', 'Dr James Tan has over 15 years of legal practice, specialising in constitutional law, criminal justice and international relations. He has served as a legal consultant and lawyer, representing high-profile cases in national and international tribunals. Dr Tan is passionate about mentoring future legal professionals, combining theoretical knowledge with practical insights in his teaching. He frequently conducts seminars, publishes legal research and is a sought-after speaker at legal conferences around the world.', 'image/Dr. James Tan.jpg'),
('1008', 'Professor Ethan Wong', '', '', 'Professor Ethan Wong has over 12 years of experience in computer science, specializing in artificial intelligence, software development, and cloud computing. He has led numerous research projects that have contributed to advances in machine learning and distributed systems. As a passionate educator, Professor Wong incorporates hands-on programming exercises and cutting-edge technologies into his courses to help students prepare for the rapidly evolving tech industry.', 'image/Ethan Wong.jpg'),
('1009', 'Ms. Rachel Lim ', '', '', 'Ms. Rachel Lim has over 10 years of experience in the marketing field, specializing in branding, digital advertising and market research. She has worked with leading multinational companies to design impactful marketing campaigns to drive customer engagement and revenue growth. Rachel is committed to developing students’ creativity and strategic thinking, combining real-world case studies with the latest marketing tools and techniques.', 'image/Ms. Rachel Lim.jpg'),
('1010', 'Mr Daniel Teo', '', '', 'Mr Daniel Teo has over 12 years of experience in the field of Information Technology, specialising in Network Systems, Cybersecurity and Cloud Computing. He has worked with multinational companies to design and implement secure and scalable IT infrastructures. Daniel is committed to teaching students how to tackle real-world IT challenges, incorporating hands-on projects and emerging technologies into his courses.', 'image/Mr Daniel Teo.jpg'),
('1011', 'Dr. Sarah Lim', '', '', 'Dr. Sarah Lim has over 10 years of experience in the biomedical field, specializing in molecular biology, human anatomy, and clinical research. She has led groundbreaking research in the field of cell biology, contributing to advances in medical diagnostics and treatments. Sarah is committed to inspiring her students by combining rigorous academic training with hands-on laboratory experience.', 'image/Dr. Sarah Lim.jpg'),
('1012', 'Mr. Benjamin Tan', '', '', 'Mr. Benjamin Tan has over 15 years of experience in the accounting field, specializing in financial reporting, tax compliance and auditing. He has worked with top accounting firms and multinational corporations, leading teams to streamline processes and ensure compliance. Benjamin is passionate about preparing students for the professional world by combining theoretical principles accounting with real-world case studies.', 'image/Mr Benjamin Tan.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_logins`
--

CREATE TABLE `teacher_logins` (
  `LoginID` int(11) NOT NULL,
  `IDTeacher` varchar(50) DEFAULT NULL,
  `login_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher_logins`
--

INSERT INTO `teacher_logins` (`LoginID`, `IDTeacher`, `login_date`) VALUES
(1, '1001', '2024-12-12 17:45:00'),
(2, '1001', '2024-12-13 00:53:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`IDAdmin`);

--
-- Indexes for table `admin_logins`
--
ALTER TABLE `admin_logins`
  ADD PRIMARY KEY (`LoginID`),
  ADD KEY `IDAdmin` (`IDAdmin`);

--
-- Indexes for table `admission`
--
ALTER TABLE `admission`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`IDCourse`),
  ADD KEY `FK_IDTeacher` (`IDTeacher`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`StudentID`),
  ADD UNIQUE KEY `EmailST` (`EmailST`);

--
-- Indexes for table `student_courses`
--
ALTER TABLE `student_courses`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `StudentID` (`StudentID`),
  ADD KEY `CourseID` (`CourseID`);

--
-- Indexes for table `student_logins`
--
ALTER TABLE `student_logins`
  ADD PRIMARY KEY (`LoginID`),
  ADD KEY `StudentID` (`StudentID`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`IDSubject`),
  ADD KEY `IDCourse` (`IDCourse`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`IDTeacher`);

--
-- Indexes for table `teacher_logins`
--
ALTER TABLE `teacher_logins`
  ADD PRIMARY KEY (`LoginID`),
  ADD KEY `IDTeacher` (`IDTeacher`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_logins`
--
ALTER TABLE `admin_logins`
  MODIFY `LoginID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `admission`
--
ALTER TABLE `admission`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `IDCourse` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `student_courses`
--
ALTER TABLE `student_courses`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_logins`
--
ALTER TABLE `student_logins`
  MODIFY `LoginID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `IDSubject` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `teacher_logins`
--
ALTER TABLE `teacher_logins`
  MODIFY `LoginID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_logins`
--
ALTER TABLE `admin_logins`
  ADD CONSTRAINT `admin_logins_ibfk_1` FOREIGN KEY (`IDAdmin`) REFERENCES `admin` (`IDAdmin`) ON DELETE CASCADE;

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `FK_IDTeacher` FOREIGN KEY (`IDTeacher`) REFERENCES `teacher` (`IDTeacher`);

--
-- Constraints for table `student_courses`
--
ALTER TABLE `student_courses`
  ADD CONSTRAINT `student_courses_ibfk_1` FOREIGN KEY (`StudentID`) REFERENCES `student` (`StudentID`),
  ADD CONSTRAINT `student_courses_ibfk_2` FOREIGN KEY (`CourseID`) REFERENCES `course` (`IDCourse`);

--
-- Constraints for table `student_logins`
--
ALTER TABLE `student_logins`
  ADD CONSTRAINT `student_logins_ibfk_1` FOREIGN KEY (`StudentID`) REFERENCES `student` (`StudentID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `subjects_ibfk_1` FOREIGN KEY (`IDCourse`) REFERENCES `course` (`IDCourse`);

--
-- Constraints for table `teacher_logins`
--
ALTER TABLE `teacher_logins`
  ADD CONSTRAINT `teacher_logins_ibfk_1` FOREIGN KEY (`IDTeacher`) REFERENCES `teacher` (`IDTeacher`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
