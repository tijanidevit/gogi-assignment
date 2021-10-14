-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2021 at 09:22 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gogi_assignment`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `id` int(11) NOT NULL,
  `username` varchar(120) NOT NULL,
  `password` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '2021-08-26 17:50:41');

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE `assignments` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `lecturer_id` int(11) NOT NULL,
  `title` varchar(120) NOT NULL,
  `question` text NOT NULL,
  `instructions` text NOT NULL,
  `deadline` date NOT NULL,
  `max_grade` decimal(10,0) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assignments`
--

INSERT INTO `assignments` (`id`, `course_id`, `lecturer_id`, `title`, `question`, `instructions`, `deadline`, `max_grade`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 'Test Assignment', 'Test Assignment', 'Test Assignment', '2021-08-20', '23', '2021-08-29 10:03:37', '2021-08-29 10:03:37'),
(2, 1, 4, 'Arrangements to Meet', 'Why is Nigeria tough again?', 'assignmentForm assignmentForm assignmentForm assignmentForm assignmentForm assignmentForm assignmentForm assignmentForm assignmentForm assignmentForm ', '0000-00-00', '34', '2021-08-30 15:06:17', '2021-08-30 15:06:17'),
(3, 1, 4, 'Arrangements to Meet', 'Why is Nigeria tough again?', 'Data is not available, use your senses.', '2021-09-02', '34', '2021-08-30 15:15:27', '2021-08-30 15:15:27'),
(4, 1, 4, 'Arrangements to Meet', 'Why is Nigeria tough again?', 'Arrangements to Meet', '2021-09-02', '34', '2021-08-30 15:17:21', '2021-08-30 15:17:21'),
(5, 1, 4, 'Arrangements to Meet', 'Why is Nigeria tough again?', 'Arrangements to Meet', '2021-09-11', '34', '2021-08-30 15:19:21', '2021-08-30 15:19:21');

-- --------------------------------------------------------

--
-- Table structure for table `assignment_submissions`
--

CREATE TABLE `assignment_submissions` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `assignment_id` int(11) NOT NULL,
  `solution` text NOT NULL,
  `description` text NOT NULL,
  `grade` decimal(10,0) NOT NULL,
  `feedback` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assignment_submissions`
--

INSERT INTO `assignment_submissions` (`id`, `student_id`, `assignment_id`, `solution`, `description`, `grade`, `feedback`, `created_at`, `updated_at`) VALUES
(1, 2, 5, 'ghgdghd', 'hjjhfjhf', '12', 'jhj', '2021-08-29 10:05:06', '2021-08-30 19:11:34');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `level_id` int(11) NOT NULL,
  `course_title` varchar(120) NOT NULL,
  `course_code` varchar(8) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `level_id`, `course_title`, `course_code`, `created_at`, `updated_at`) VALUES
(1, 1, 'Java Programming', 'COM 217', '2021-08-29 09:41:57', '2021-08-29 09:41:57');

-- --------------------------------------------------------

--
-- Table structure for table `lecturers`
--

CREATE TABLE `lecturers` (
  `id` int(11) NOT NULL,
  `staff_id` varchar(10) NOT NULL,
  `fullname` varchar(120) NOT NULL,
  `image` varchar(120) NOT NULL,
  `email` varchar(120) NOT NULL,
  `password` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lecturers`
--

INSERT INTO `lecturers` (`id`, `staff_id`, `fullname`, `image`, `email`, `password`, `created_at`, `updated_at`) VALUES
(4, 'admin', 'Nofisat Kudira', '2017-155444__727201961721AM.jpg', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '2021-08-29 01:31:16', '2021-08-29 01:31:16');

-- --------------------------------------------------------

--
-- Table structure for table `lecturer_courses`
--

CREATE TABLE `lecturer_courses` (
  `id` int(11) NOT NULL,
  `lecturer_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE `levels` (
  `id` int(11) NOT NULL,
  `level` varchar(9) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`id`, `level`, `created_at`, `updated_at`) VALUES
(1, 'ND1', '2021-08-29 09:37:42', '2021-08-29 09:37:42'),
(2, 'ND2', '2021-08-29 09:37:42', '2021-08-29 09:37:42'),
(3, 'HND1', '2021-08-29 09:39:03', '2021-08-29 09:39:03'),
(4, 'HND2', '2021-08-29 09:39:03', '2021-08-29 09:39:03');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `solution_id` int(11) NOT NULL,
  `sent_by` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `sender_type` int(11) NOT NULL,
  `message` text NOT NULL,
  `read_status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `matric_no` varchar(120) NOT NULL,
  `fullname` varchar(120) NOT NULL,
  `image` varchar(120) NOT NULL,
  `email` varchar(120) NOT NULL,
  `password` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `matric_no`, `fullname`, `image`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'PN/CS/19/3277', 'Diane Carroll', 'students.png', 'diane.carroll@example.com', '5f4dcc3b5aa765d61d8327deb882cf99', '2021-08-28 18:08:06', '2021-08-28 18:08:06'),
(2, 'PN/CS/19/3954', 'Archie Thomas', 'students.png', 'archie.thomas@example.com', '5f4dcc3b5aa765d61d8327deb882cf99', '2021-08-28 18:08:07', '2021-08-28 18:08:07'),
(3, 'PN/CS/19/6820', 'Zofia Støen', 'students.png', 'zofia.stoen@example.com', '5f4dcc3b5aa765d61d8327deb882cf99', '2021-08-28 18:08:07', '2021-08-28 18:08:07'),
(4, 'PN/CS/19/1818', 'Tonya Stone', 'students.png', 'tonya.stone@example.com', '5f4dcc3b5aa765d61d8327deb882cf99', '2021-08-28 18:08:08', '2021-08-28 18:08:08'),
(5, 'PN/CS/19/4140', 'Vânia Freitas', 'students.png', 'vania.freitas@example.com', '5f4dcc3b5aa765d61d8327deb882cf99', '2021-08-28 18:08:08', '2021-08-28 18:08:08'),
(6, 'PN/CS/19/5134', 'Zackary Claire', 'students.png', 'zackary.claire@example.com', '5f4dcc3b5aa765d61d8327deb882cf99', '2021-08-28 18:08:08', '2021-08-28 18:08:08'),
(7, 'PN/CS/19/6187', 'August Andersen', 'students.png', 'august.andersen@example.com', '5f4dcc3b5aa765d61d8327deb882cf99', '2021-08-28 18:08:10', '2021-08-28 18:08:10'),
(8, 'PN/CS/19/8300', 'ثنا نكو نظر', 'students.png', 'thn.nkwnzr@example.com', '5f4dcc3b5aa765d61d8327deb882cf99', '2021-08-28 18:08:10', '2021-08-28 18:08:10'),
(9, 'PN/CS/19/4081', 'Dionésia Melo', 'students.png', 'dionesia.melo@example.com', '5f4dcc3b5aa765d61d8327deb882cf99', '2021-08-28 18:08:11', '2021-08-28 18:08:11'),
(10, 'PN/CS/19/3463', 'Sofus Abdallah', 'students.png', 'sofus.abdallah@example.com', '5f4dcc3b5aa765d61d8327deb882cf99', '2021-08-28 18:08:11', '2021-08-28 18:08:11'),
(11, 'PN/CS/19/1674', 'Kuzey Aşıkoğlu', 'students.png', 'kuzey.asikoglu@example.com', '5f4dcc3b5aa765d61d8327deb882cf99', '2021-08-28 18:10:43', '2021-08-28 18:10:43'),
(12, 'PN/CS/19/8785', 'Renee Bell', 'students.png', 'renee.bell@example.com', '5f4dcc3b5aa765d61d8327deb882cf99', '2021-08-28 18:10:43', '2021-08-28 18:10:43'),
(13, 'PN/CS/19/5664', 'طاها مرادی', 'students.png', 'th.mrdy@example.com', '5f4dcc3b5aa765d61d8327deb882cf99', '2021-08-28 18:10:44', '2021-08-28 18:10:44'),
(14, 'PN/CS/19/5288', 'Joe Watts', 'students.png', 'joe.watts@example.com', '5f4dcc3b5aa765d61d8327deb882cf99', '2021-08-28 18:10:44', '2021-08-28 18:10:44'),
(15, 'PN/CS/19/2826', 'Marion Mccoy', 'students.png', 'marion.mccoy@example.com', '5f4dcc3b5aa765d61d8327deb882cf99', '2021-08-28 18:10:45', '2021-08-28 18:10:45'),
(16, 'PN/CS/19/4438', 'پارسا حسینی', 'students.png', 'prs.hsyny@example.com', '5f4dcc3b5aa765d61d8327deb882cf99', '2021-08-28 18:10:45', '2021-08-28 18:10:45'),
(17, 'PN/CS/19/9116', 'David Chavez', 'students.png', 'david.chavez@example.com', '5f4dcc3b5aa765d61d8327deb882cf99', '2021-08-28 18:10:46', '2021-08-28 18:10:46'),
(18, 'PN/CS/19/8734', 'Dylan Lavigne', 'students.png', 'dylan.lavigne@example.com', '5f4dcc3b5aa765d61d8327deb882cf99', '2021-08-28 18:10:46', '2021-08-28 18:10:46'),
(19, 'PN/CS/19/6479', 'Selma Hansen', 'students.png', 'selma.hansen@example.com', '5f4dcc3b5aa765d61d8327deb882cf99', '2021-08-28 18:10:46', '2021-08-28 18:10:46'),
(20, 'PN/CS/19/1427', 'Melisa Muller', 'students.png', 'melisa.muller@example.com', '5f4dcc3b5aa765d61d8327deb882cf99', '2021-08-28 18:10:47', '2021-08-28 18:10:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assignments`
--
ALTER TABLE `assignments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assignment_submissions`
--
ALTER TABLE `assignment_submissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lecturers`
--
ALTER TABLE `lecturers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lecturer_courses`
--
ALTER TABLE `lecturer_courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `administrator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `assignments`
--
ALTER TABLE `assignments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `assignment_submissions`
--
ALTER TABLE `assignment_submissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lecturers`
--
ALTER TABLE `lecturers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `lecturer_courses`
--
ALTER TABLE `lecturer_courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
