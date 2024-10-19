-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2024 at 11:39 PM
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
-- Database: `dvsmining_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `resume` varchar(255) NOT NULL,
  `applied_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `job_id`, `name`, `email`, `phone`, `resume`, `applied_at`) VALUES
(1, 3, 'Hitesh bhagwat', 'hiteshbhagwat97@gmail.com', '09370632058', 'Hitesh_Resume.docx.pdf', '2024-10-06 10:33:07'),
(2, 3, 'Hitesh bhagwat', 'hiteshbhagwat97@gmail.com', '09370632058', 'Hitesh_Resume.docx.pdf', '2024-10-06 10:33:17'),
(3, 3, 'Hitesh bhagwat', 'hiteshbhagwat97@gmail.com', '09370632058', 'Hitesh_Resume.docx.pdf', '2024-10-06 10:33:26'),
(4, 3, 'Hitesh bhagwat', 'hiteshbhagwat97@gmail.com', '09370632058', 'Gulati_Sir_Website_Proposal.pdf', '2024-10-06 10:34:10'),
(5, 3, 'Hitesh bhagwat', 'hiteshbhagwat97@gmail.com', '09370632058', 'Invoice (1).pdf', '2024-10-06 10:37:25'),
(6, 3, 'Hitesh bhagwat', 'hiteshbhagwat97@gmail.com', '09370632058', 'DATA_TANVI.docx.pdf', '2024-10-06 10:37:40'),
(7, 3, 'Hitesh bhagwat', 'hiteshbhagwat97@gmail.com', '09370632058', 'sqft_invoice.pdf', '2024-10-06 10:39:14'),
(8, 3, 'Michael Ross', 'companyiconicpages@gmail.com', '07038214873', 'Hitesh_Resume.docx.pdf', '2024-10-06 10:39:27'),
(9, 3, 'Hitesh bhagwat', 'hiteshbhagwat97@gmail.com', '09370632058', 'Gulati_Sir_Website_Proposal.pdf', '2024-10-06 10:40:38'),
(10, 3, 'Hitesh bhagwat', 'hiteshbhagwat97@gmail.com', '09370632058', 'Hitesh_Resume.docx.pdf', '2024-10-06 10:42:32');

-- --------------------------------------------------------

--
-- Table structure for table `blog_post`
--

CREATE TABLE `blog_post` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `main_image` varchar(255) DEFAULT NULL,
  `introduction` text DEFAULT NULL,
  `main_content` text DEFAULT NULL,
  `conclusion` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog_post`
--

INSERT INTO `blog_post` (`id`, `title`, `description`, `main_image`, `introduction`, `main_content`, `conclusion`, `created_at`) VALUES
(1, 'Why Choose DVSMining for Your Mining Needs', 'Learn why DVSMining is the best choice for all your mining needs with our exceptional services and experienced professionals.', 'choose_dvsmining.jpg', 'Choosing the right mining partner is crucial for success.', 'DVSMining offers state-of-the-art technology, expert staff, and efficient mining processes to ensure quality and timely completion of projects.', 'Partner with DVSMining to experience quality service and sustainable mining solutions.', '2024-10-03 14:51:10'),
(2, 'The Future of Mining with DVSMining', 'Explore how DVSMining is leading the way in adopting advanced technology for sustainable mining.', 'future_of_mining.jpg', 'Mining is evolving rapidly with new technologies.', 'At DVSMining, we are committed to adopting cutting-edge technologies to make mining more efficient and environmentally friendly.', 'DVSMining is dedicated to sustainable practices for a brighter future.', '2024-10-03 14:51:10'),
(3, 'DVSMining: Safety and Sustainability', 'Safety and sustainability are at the core of our operations at DVSMining.', 'safety_sustainability.jpg', 'Safety is paramount in the mining industry.', 'DVSMining ensures all safety protocols are followed strictly, and we emphasize sustainable mining practices that protect the environment.', 'Trust DVSMining for a safe and sustainable mining solution.', '2024-10-03 14:51:10'),
(4, 'How DVSMining Contributes to Local Communities', 'DVSMining believes in giving back to the community by creating jobs and supporting local initiatives.', 'community_contribution.jpg', 'Mining impacts communities, and at DVSMining, we strive for a positive impact.', 'We actively engage in local development, provide job opportunities, and support community welfare initiatives.', 'DVSMining is committed to creating long-lasting benefits for local communities.', '2024-10-03 14:51:10'),
(5, 'Innovative Technologies Used by DVSMining', 'DVSMining uses innovative technologies to improve efficiency and minimize environmental impact.', 'innovative_technologies.jpg', 'Innovation is key to our success at DVSMining.', 'We use the latest mining technology, including automation and eco-friendly solutions, to enhance productivity while reducing the environmental footprint.', 'DVSMining stays ahead with technology to deliver the best results.', '2024-10-03 14:51:10'),
(6, 'DVSMining’s Expertise in Mineral Exploration', 'With years of expertise, DVSMining is a leader in mineral exploration and extraction.', 'mineral_exploration.jpg', 'Exploring and extracting minerals require expertise.', 'DVSMining has a team of experienced geologists and engineers who are skilled in finding and extracting valuable mineral resources efficiently.', 'Count on DVSMining for expert mineral exploration and extraction services.', '2024-10-03 14:51:10'),
(7, 'Environmental Commitment at DVSMining', 'We at DVSMining are committed to minimizing the environmental impact of our operations.', 'environmental_commitment.jpg', 'Environmental responsibility is a core value at DVSMining.', 'Our mining operations are designed to minimize environmental damage, and we take initiatives to restore mining areas.', 'DVSMining is dedicated to responsible mining that respects the environment.', '2024-10-03 14:51:10'),
(8, 'DVSMining: A Trusted Partner for Your Mining Projects', 'Discover why DVSMining is trusted by clients for a wide range of mining projects.', 'trusted_partner.jpg', 'Building trust in mining takes years of dedication and proven results.', 'DVSMining has consistently delivered high-quality mining services, making us the trusted choice for many projects.', 'Choose DVSMining for reliable, efficient, and trustworthy mining services.', '2024-10-03 14:51:10');

-- --------------------------------------------------------

--
-- Table structure for table `contact_form`
--

CREATE TABLE `contact_form` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `enquiry_types` enum('General','Service','Project','Support') DEFAULT NULL,
  `suggestion_types` enum('General','Service','Project') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_form`
--

INSERT INTO `contact_form` (`id`, `name`, `email`, `phone`, `message`, `created_at`, `enquiry_types`, `suggestion_types`) VALUES
(1, 'Hitesh bhagwat', 'hitesh.bhagwat.ai@ghrietn.raisoni.net', '7038214873', 'ass asdasdasd adad', '2024-09-10 20:16:55', NULL, NULL),
(2, 'Hitesh bhagwat', 'hitesh.bhagwat.ai@ghrietn.raisoni.net', '7038214873', 'ass asdasdasd adad', '2024-09-10 20:17:54', NULL, NULL),
(3, 'Hitesh bhagwat', 'hiteshbhagwat97@gmail.com', '9370632058', 'Hi This is Hitesh', '2024-09-10 20:18:11', NULL, NULL),
(4, 'Hitesh bhagwat', 'hiteshbhagwat97@gmail.com', '9370632058', 'Hi This is Hitesh', '2024-09-10 20:19:42', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(6) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_list`
--

CREATE TABLE `job_list` (
  `id` int(11) NOT NULL,
  `job_title` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `job_type` enum('Full-time','Part-time','Contract','Internship') NOT NULL,
  `salary` decimal(10,2) DEFAULT NULL,
  `description` text NOT NULL,
  `requirements` text DEFAULT NULL,
  `posted_date` datetime DEFAULT current_timestamp(),
  `application_deadline` datetime DEFAULT NULL,
  `status` enum('Open','Closed') DEFAULT 'Open'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job_list`
--

INSERT INTO `job_list` (`id`, `job_title`, `company_name`, `location`, `job_type`, `salary`, `description`, `requirements`, `posted_date`, `application_deadline`, `status`) VALUES
(1, 'Mining Engineer', 'DVSMining Ltd.', 'Rajasthan', 'Full-time', 800000.00, 'Responsible for planning and directing mining operations.', 'B.Tech in Mining Engineering, 3+ years of experience.', '2024-10-04 19:47:43', '2024-12-01 00:00:00', 'Closed'),
(2, 'Geologist', 'DVSMining Ltd.', 'Chhattisgarh', 'Full-time', 700000.00, 'Conduct geological surveys and research.', 'M.Sc. in Geology, 2+ years of experience.', '2024-10-04 19:47:43', '2024-11-15 00:00:00', 'Open'),
(3, 'Mine Supervisor', 'DVSMining Ltd.', 'Madhya Pradesh', 'Full-time', 600000.00, 'Supervise mining operations and ensure safety compliance.', 'B.Tech in Mining Engineering, 5+ years of experience.', '2024-10-04 19:47:43', '2024-11-20 00:00:00', 'Open'),
(4, 'Environmental Engineer', 'DVSMining Ltd.', 'Odisha', 'Full-time', 750000.00, 'Ensure compliance with environmental regulations in mining.', 'B.Tech in Environmental Engineering, 4+ years of experience.', '2024-10-04 19:47:43', '2024-12-05 00:00:00', 'Open'),
(5, 'Safety Officer', 'DVSMining Ltd.', 'Karnataka', 'Full-time', 500000.00, 'Implement safety policies and conduct training.', 'Diploma in Safety Management, 3+ years of experience.', '2024-10-04 19:47:43', '2024-11-30 00:00:00', 'Open'),
(6, 'Heavy Equipment Operator', 'DVSMining Ltd.', 'Uttar Pradesh', 'Full-time', 400000.00, 'Operate heavy machinery for mining activities.', 'High School Diploma, certification in heavy equipment operation.', '2024-10-04 19:47:43', '2024-11-10 00:00:00', 'Open'),
(7, 'Drilling Engineer', 'DVSMining Ltd.', 'Gujarat', 'Full-time', 850000.00, 'Plan and manage drilling operations.', 'B.Tech in Drilling Engineering, 4+ years of experience.', '2024-10-04 19:47:43', '2024-11-25 00:00:00', 'Open'),
(8, 'Miner', 'DVSMining Ltd.', 'Jharkhand', 'Full-time', 300000.00, 'Extract minerals from underground mines.', 'High School Diploma, experience in mining preferred.', '2024-10-04 19:47:43', '2024-12-10 00:00:00', 'Open'),
(9, 'Geophysicist', 'DVSMining Ltd.', 'Himachal Pradesh', 'Full-time', 900000.00, 'Conduct geophysical surveys for resource identification.', 'M.Sc. in Geophysics, 3+ years of experience.', '2024-10-04 19:47:43', '2024-12-15 00:00:00', 'Open'),
(10, 'Mine Planner', 'DVSMining Ltd.', 'Maharashtra', 'Full-time', 800000.00, 'Develop strategic mine plans and schedules.', 'B.Tech in Mining Engineering, 5+ years of experience.', '2024-10-04 19:47:43', '2024-11-28 00:00:00', 'Open');

-- --------------------------------------------------------

--
-- Table structure for table `news_post`
--

CREATE TABLE `news_post` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `main_image` varchar(255) DEFAULT NULL,
  `introduction` text DEFAULT NULL,
  `main_content` text DEFAULT NULL,
  `conclusion` text DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news_post`
--

INSERT INTO `news_post` (`id`, `title`, `description`, `main_image`, `introduction`, `main_content`, `conclusion`, `author`, `created_at`, `updated_at`) VALUES
(1, 'New Mining Project Launched by DVSmining', 'DVSmining has started a new mining project aimed at expanding its reach in the mineral sector.', 'project_launch.jpg', 'DVSmining proudly announces the launch of its latest mining project.', 'This project is expected to increase mineral production by 25%, providing significant value to stakeholders.', 'DVSmining is committed to sustainable mining practices.', 'DVSmining Team', '2024-10-04 13:45:41', '2024-10-04 13:45:41'),
(2, 'Sustainable Mining Practices at DVSmining', 'A look into the sustainable mining practices adopted by DVSmining.', 'sustainable_mining.jpg', 'At DVSmining, sustainability is at the core of all operations.', 'We have implemented eco-friendly practices to reduce the environmental impact of our mining operations.', 'DVSmining continues to prioritize sustainability and environmental conservation.', 'DVSmining Team', '2024-10-04 13:45:41', '2024-10-04 13:45:41'),
(3, 'DVSmining Reaches Record Mineral Production', 'DVSmining has achieved a record in mineral production for the year 2024.', 'record_production.jpg', 'We are excited to announce our highest mineral production numbers yet.', 'The increase is attributed to new technologies and better mining techniques.', 'This milestone showcases DVSmining’s dedication to excellence.', 'DVSmining Team', '2024-10-04 13:45:41', '2024-10-04 13:45:41'),
(4, 'Community Development Programs by DVSmining', 'DVSmining is actively involved in community development initiatives.', 'community_development.jpg', 'Our community development programs aim to support local communities.', 'We focus on education, healthcare, and employment opportunities for local people.', 'DVSmining believes in giving back to the community.', 'DVSmining Team', '2024-10-04 13:45:41', '2024-10-04 13:45:41'),
(5, 'New Safety Measures Adopted by DVSmining', 'DVSmining introduces new safety measures to protect miners.', 'safety_measures.jpg', 'We have implemented advanced safety protocols across all sites.', 'The safety of our workforce is of utmost importance, and we have invested in modern equipment.', 'DVSmining will continue to improve working conditions for our employees.', 'DVSmining Team', '2024-10-04 13:45:41', '2024-10-04 13:45:41'),
(6, 'DVSmining Partners with Local Universities', 'A strategic partnership with local universities for research and development.', 'university_partnership.jpg', 'DVSmining is proud to partner with local institutions.', 'The collaboration aims to promote innovation in mining technologies.', 'Together, we aim to build a better future for the mining industry.', 'DVSmining Team', '2024-10-04 13:45:41', '2024-10-04 13:45:41'),
(7, 'DVSmining Expands Exploration Activities', 'DVSmining announces the expansion of exploration activities.', 'exploration_expansion.jpg', 'We are expanding our exploration activities to discover new mineral resources.', 'The new exploration sites show promising mineral deposits.', 'DVSmining is committed to responsible exploration.', 'DVSmining Team', '2024-10-04 13:45:41', '2024-10-04 13:45:41'),
(8, 'DVSmining to Attend Global Mining Expo 2024', 'DVSmining to participate in the Global Mining Expo 2024.', 'global_expo.jpg', 'We are excited to announce our participation in the Global Mining Expo.', 'Our team will present the latest innovations and achievements at the event.', 'Visit our booth at the expo for more information.', 'DVSmining Team', '2024-10-04 13:45:41', '2024-10-04 13:45:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`) VALUES
(1, 'admin@dvsmining.org', '$2y$10$wH3TOINJvXjJQZ3gH9D1T.AgQfIcXcX2FE1MNrsZR8FSIYZFp1Ppu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_id` (`job_id`);

--
-- Indexes for table `blog_post`
--
ALTER TABLE `blog_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_form`
--
ALTER TABLE `contact_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_list`
--
ALTER TABLE `job_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_post`
--
ALTER TABLE `news_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `blog_post`
--
ALTER TABLE `blog_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `contact_form`
--
ALTER TABLE `contact_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `job_list`
--
ALTER TABLE `job_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `news_post`
--
ALTER TABLE `news_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applications`
--
ALTER TABLE `applications`
  ADD CONSTRAINT `applications_ibfk_1` FOREIGN KEY (`job_id`) REFERENCES `job_list` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
