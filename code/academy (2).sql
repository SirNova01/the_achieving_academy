-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2022 at 09:53 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `academy`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(100) NOT NULL,
  `article_id` varchar(255) NOT NULL,
  `title` mediumtext NOT NULL,
  `body` longtext NOT NULL,
  `cover_pic` longtext NOT NULL,
  `category` varchar(100) NOT NULL,
  `date` varchar(20) NOT NULL,
  `day` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `article_id`, `title`, `body`, `cover_pic`, `category`, `date`, `day`) VALUES
(3, '613593907600ca42eae4c36.52536774', 'WHO WE ARE', '\r\nWHO WE ARE\r\nFounder Jennifer Y. Smith launched the Achieving Academy in 2016 starting with 1 teen and 1 young adult. As she mentored them, she took detailed notes of the questions they were asking. Then she began to survey their peers. In 2018 she took a life skills training course and begin launching her own life skills workshops to introduce teens to the program.\r\n\r\n​\r\n\r\nFinally, in 2019, Jennifer Smith created the Youth Academic & Community Outreach Awards (also known as the YACO Awards) and partnered with HPD Officer Sheldon Theragood, founder of non-profit organization TheraGood Deeds. The 2019 YACO Awards was a huge success, recognizing kids in the Houston community with excelling academically, showcasing amazing community service and even being kidpreneurs. \r\n\r\n​\r\n\r\nThe Achieving Academy is more than just about teaching life skills. That\'s just one component. It\'s about helping individuals achieve their goals.', '../blog_images/1541966095professional photo.webp', '923874660600ca3776cc2b2.09169462', '2021-01-19 23:33:18', '2021-01-19'),
(4, '1700436054600ca482ad4e28.83554004', 'THE ACHIEVING ACADEMY PRODUCTIONS', 'Our newly created production division creates opportunities for teenagers and young adults to gain real life skills in areas such as film production and acting. \r\n\r\n\r\n\r\nVolunteers (both crew and actors) receive film credit, experience on a real production, food on set and a nominal gift card amount as a gas reimbursement. Community contributions are needed to cover the expenses of the production which includes purchasing gift cards for the crew and actors. ', '../blog_images/2008654876Film Set.webp', '1034099607600ca3f2ddf843.52061575', '2021-01-19 23:33:18', '2021-01-19'),
(5, '2098269220600ca4fb599e44.89552830', 'COLLABORATIONS WITH NONPROFITS', 'Watch for us as we make 2021 the Year of Collaborations. We look forward to joining with students, organizations & businesses in the community and around the US.', '../blog_images/2096125215IMG-9925.webp', '1034099607600ca3f2ddf843.52061575', '2021-01-19 23:33:18', '2021-01-19'),
(6, '1511840269600ca5f942cef8.14149198', 'LIST OF SCHOLARSHIPS', 'Coming Soon: \r\n\r\n​\r\n\r\nSoon we will be posting scholarships to share with juniors and seniors to help them with resources as they work towards continuing education after high school. ', '../blog_images/1348798207Image by Alexander Mils.webp', '1130165117600ca3beea9396.94451255', '2021-01-19 23:33:18', '2021-01-19');

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` int(100) NOT NULL,
  `category_id` varchar(255) NOT NULL,
  `category_name` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `category_id`, `category_name`) VALUES
(2, '923874660600ca3776cc2b2.09169462', 'About Achieving Academy'),
(3, '1130165117600ca3beea9396.94451255', 'Scholarships'),
(4, '1034099607600ca3f2ddf843.52061575', 'Achieving Academy Updates');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(100) NOT NULL,
  `course_id` varchar(255) NOT NULL,
  `course_name` mediumtext NOT NULL,
  `description` longtext NOT NULL,
  `price` varchar(255) NOT NULL,
  `dp` longtext NOT NULL,
  `rating` varchar(200) NOT NULL,
  `duration` varchar(200) NOT NULL,
  `status` varchar(20) NOT NULL,
  `date` varchar(20) NOT NULL,
  `day` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_id`, `course_name`, `description`, `price`, `dp`, `rating`, `duration`, `status`, `date`, `day`) VALUES
(1, '106197701760090240261d40.42467623', 'The CROSSBEAM Curriculum', 'Budgeting is the process of creating a plan to spend your money. This spending plan is called a budget. Creating this spending plan allows you to determine in advance whether you will have enough money to do the things you need to do or would like to do. Budgeting is simply balancing your expenses with your income.', '300', '../dp/366986069good-bad-cash-l.jpg', '', 'Self Paced', 'not_published', '2021-01-21 05:25:36', '2021-01-21');

-- --------------------------------------------------------

--
-- Table structure for table `email_confirmation`
--

CREATE TABLE `email_confirmation` (
  `id` int(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `code` varchar(20) NOT NULL,
  `date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `email_confirmation`
--

INSERT INTO `email_confirmation` (`id`, `email`, `code`, `date`) VALUES
(1, 'endowed555@gmail.com', '0', '2021-01-27 20:36:12');

-- --------------------------------------------------------

--
-- Table structure for table `email_subscribers`
--

CREATE TABLE `email_subscribers` (
  `id` int(100) NOT NULL,
  `subscriber_id` varchar(255) NOT NULL,
  `email` varchar(200) NOT NULL,
  `date` varchar(20) NOT NULL,
  `day` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `email_subscribers`
--

INSERT INTO `email_subscribers` (`id`, `subscriber_id`, `email`, `date`, `day`) VALUES
(1, '1665472433600b79cea40718.07501160', 'emailaddress@gmail.com', '2021-01-23 02:20:14', '2021-01-23'),
(2, '1298238205600b7b7ae75f35.84640257', 'testmail@gmail.com', '2021-01-23 02:27:22', '2021-01-23');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(100) NOT NULL,
  `event_id` varchar(255) NOT NULL,
  `title` mediumtext NOT NULL,
  `description` longtext NOT NULL,
  `date` varchar(20) NOT NULL,
  `time` varchar(20) NOT NULL,
  `duration` varchar(20) NOT NULL,
  `venue` longtext NOT NULL,
  `dp` longtext NOT NULL,
  `date_created` varchar(20) NOT NULL,
  `day_created` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `event_id`, `title`, `description`, `date`, `time`, `duration`, `venue`, `dp`, `date_created`, `day_created`) VALUES
(3, '2082193650600be87048c704.21886231', '2020 YACO Awards', 'Join us for the 2nd Youth Academic & Community Outreach Awards', '2020-09-12', '3:00 PM', '3 hours', 'Azul Reception Hall,', '../events_dp/314458344yaco.jpg', '2021-01-23 10:12:16', '2021-01-23'),
(4, '39950158600be9262362f8.29064134', 'Life Skills Workshop', 'Guest speakers join to discuss key topics such as self esteem, confidence, self-love and even personal branding.. how you see yourself & how others view you based on image and actions. This is a workshop that you won\'t want your teen to miss. ', '2020-03-28', '10:00 AM', '3 hours', 'The Ranch Office, 12', '../events_dp/1563011056about1.png', '2021-01-23 10:15:18', '2021-01-23'),
(5, '1827882897600bea0e37acb7.89768957', 'Life Skills Students join Founder on Radio Podcast', 'Two of our current life skills students will have an opportunity to sit in with the Founder of The Achieving Academy\'s Life Skills Training School on a radio pocast recording of Sistas Talk. ', '2020-03-15', '1:00 PM', '--', 'Location is TBD', '../events_dp/106372187327f8386a7ad541299e45ea4535cb1939.jpg', '2021-01-23 10:19:10', '2021-01-23');

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

CREATE TABLE `game` (
  `id` int(100) NOT NULL,
  `level_id` varchar(255) NOT NULL,
  `level_name` longtext NOT NULL,
  `intro_text` longtext NOT NULL,
  `date` varchar(20) NOT NULL,
  `day` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `game`
--

INSERT INTO `game` (`id`, `level_id`, `level_name`, `intro_text`, `date`, `day`) VALUES
(1, '1287262734602696f932e409.44700798', 'level 1', 'This week has been a great week and the team is right on schedule with the set deadline. The team has made great progress and achievements this week. ', '2021-02-12 15:55:53', '2021-02-12');

-- --------------------------------------------------------

--
-- Table structure for table `game_question_bank`
--

CREATE TABLE `game_question_bank` (
  `id` int(100) NOT NULL,
  `question_id` varchar(255) NOT NULL,
  `level_id` varchar(255) NOT NULL,
  `question` longtext NOT NULL,
  `attachment` longtext NOT NULL,
  `option_1` longtext NOT NULL,
  `option_1_consequence` longtext NOT NULL,
  `option_1_penalty` varchar(20) NOT NULL,
  `option_2` longtext NOT NULL,
  `option_2_consequence` longtext NOT NULL,
  `option_2_penalty` varchar(20) NOT NULL,
  `option_3` longtext NOT NULL,
  `option_3_consequence` longtext NOT NULL,
  `option_3_penalty` varchar(20) NOT NULL,
  `option_4` longtext NOT NULL,
  `option_4_consequence` longtext NOT NULL,
  `option_4_penalty` varchar(20) NOT NULL,
  `answer` varchar(20) NOT NULL,
  `reason` longtext NOT NULL,
  `credits` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` int(100) NOT NULL,
  `module_id` varchar(255) NOT NULL,
  `course_id` varchar(255) NOT NULL,
  `module_index` int(100) NOT NULL,
  `module_name` mediumtext NOT NULL,
  `description` longtext NOT NULL,
  `dp` longtext NOT NULL,
  `completion_points` int(200) NOT NULL,
  `date` varchar(20) NOT NULL,
  `day` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `module_id`, `course_id`, `module_index`, `module_name`, `description`, `dp`, `completion_points`, `date`, `day`) VALUES
(1, '73324862960232b5aaa7410.65395747', '106197701760090240261d40.42467623', 1, 'Choices & Consequences', 'some description', '../dp/105547652360239685b49913.32566976academy_logo.png', 100, '2021-02-10 01:39:54', '2021-02-10'),
(2, '109020407260239685bb7810.88450428', '106197701760090240261d40.42467623', 2, 'Releasing Negative Nancy & Negative Norman', 'description', '../dp/105547652360239685b49913.32566976academy_logo.png', 100, '2021-02-10 09:17:09', '2021-02-10'),
(3, '612487725602396e6c2fe37.48169539', '106197701760090240261d40.42467623', 3, 'Overcoming Chaos', 'description', '../dp/224965939602396e6c2e362.00359583academy_logo.png', 100, '2021-02-10 09:18:46', '2021-02-10'),
(4, '7987618756023970e88e5b9.48740208', '106197701760090240261d40.42467623', 4, 'Self-E: Self evaluations ', 'description', '../dp/15333065096023970e8898d5.60145212academy_logo.png', 100, '2021-02-10 09:19:26', '2021-02-10'),
(5, '3382205636023974f909151.98140088', '106197701760090240261d40.42467623', 5, 'Staying Safe ', 'description', '../dp/9318610006023974f9076f1.47221174academy_logo.png', 100, '2021-02-10 09:20:31', '2021-02-10'),
(6, '5993280526023978f32c2f4.74154447', '106197701760090240261d40.42467623', 6, 'Budgeting & Credit Awareness', 'description', '../dp/15722094796023978f32a941.27709207academy_logo.png', 100, '2021-02-10 09:21:35', '2021-02-10'),
(7, '507233775602397dc712ae5.84862596', '106197701760090240261d40.42467623', 7, 'Employment & Continuing Education Options ', 'description', '../dp/223915504602397dc7102d3.04986105academy_logo.png', 100, '2021-02-10 09:22:52', '2021-02-10'),
(8, '5344218656023980e292a58.52257105', '106197701760090240261d40.42467623', 8, 'A Place of your Own ', 'description', '../dp/18120628566023980e291164.10750398academy_logo.png', 100, '2021-02-10 09:23:42', '2021-02-10'),
(9, '17171055636023987c436c21.60312504', '106197701760090240261d40.42467623', 9, 'Making the Transition', 'description', '../dp/5883211646023987c435005.65398119academy_logo.png', 100, '2021-02-10 09:25:32', '2021-02-10');

-- --------------------------------------------------------

--
-- Table structure for table `module_printable_resources`
--

CREATE TABLE `module_printable_resources` (
  `id` int(100) NOT NULL,
  `resource_id` varchar(255) NOT NULL,
  `module_id` varchar(255) NOT NULL,
  `course_id` varchar(255) NOT NULL,
  `title` longtext NOT NULL,
  `file_url` longtext NOT NULL,
  `note` longtext NOT NULL,
  `date` varchar(20) NOT NULL,
  `day` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `module_printable_resources`
--

INSERT INTO `module_printable_resources` (`id`, `resource_id`, `module_id`, `course_id`, `title`, `file_url`, `note`, `date`, `day`) VALUES
(2, '1137880525602647a9864649.33412457', '73324862960232b5aaa7410.65395747', '106197701760090240261d40.42467623', 'Choice Theory', '../module_printable_resources/31162616602647a97f04e2.490909611.1 fundamental-analysis-1.pdf.pdf', '', '2021-02-12 10:17:29', '2021-02-12');

-- --------------------------------------------------------

--
-- Table structure for table `module_videos`
--

CREATE TABLE `module_videos` (
  `id` int(100) NOT NULL,
  `video_id` varchar(255) NOT NULL,
  `module_id` varchar(255) NOT NULL,
  `course_id` varchar(255) NOT NULL,
  `title` longtext NOT NULL,
  `video_url` longtext NOT NULL,
  `thumb` longtext NOT NULL,
  `note` longtext NOT NULL,
  `date` varchar(20) NOT NULL,
  `day` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `module_videos`
--

INSERT INTO `module_videos` (`id`, `video_id`, `module_id`, `course_id`, `title`, `video_url`, `thumb`, `note`, `date`, `day`) VALUES
(1, '14802428260263474ed4401.84968748', '73324862960232b5aaa7410.65395747', '106197701760090240261d40.42467623', 'Choices & Consequences', '../module_videos/88741683460263474ed2030.39421169lou.mp4', '', 'some note', '2021-02-12 08:55:32', '2021-02-12'),
(2, '63274529860264157ab42e8.79460684', '73324862960232b5aaa7410.65395747', '106197701760090240261d40.42467623', 'Consequences', '../module_videos/69099992660264157aaab74.2787075801. Last Project - Congrats-UUqU8SYBZ9Q.mp4', '', 'note', '2021-02-12 09:50:31', '2021-02-12');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(100) NOT NULL,
  `notification_id` varchar(255) NOT NULL,
  `title` mediumtext NOT NULL,
  `body` longtext NOT NULL,
  `sender_id` varchar(255) NOT NULL,
  `receiver_id` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL,
  `date_sent` varchar(20) NOT NULL,
  `day_sent` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `question_bank`
--

CREATE TABLE `question_bank` (
  `id` int(100) NOT NULL,
  `question_id` varchar(255) NOT NULL,
  `quiz_id` varchar(255) NOT NULL,
  `course_id` varchar(255) NOT NULL,
  `module_id` varchar(255) NOT NULL,
  `question` longtext NOT NULL,
  `attachment` longtext NOT NULL,
  `attachment_type` varchar(20) NOT NULL,
  `option_1` longtext NOT NULL,
  `option_2` longtext NOT NULL,
  `option_3` longtext NOT NULL,
  `option_4` longtext NOT NULL,
  `correct_option` varchar(20) NOT NULL,
  `duration` varchar(20) NOT NULL,
  `points` varchar(200) NOT NULL,
  `date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question_bank`
--

INSERT INTO `question_bank` (`id`, `question_id`, `quiz_id`, `course_id`, `module_id`, `question`, `attachment`, `attachment_type`, `option_1`, `option_2`, `option_3`, `option_4`, `correct_option`, `duration`, `points`, `date`) VALUES
(1, '120988811560267cf9729ff3.70288331', '7135966126026571e41d891.30220751', '106197701760090240261d40.42467623', '73324862960232b5aaa7410.65395747', 'is this color white?', '', '', 'yes', 'no', 'maybe', 'probably', '1', '1', '12', '2021-02-12 14:04:57'),
(2, '78569053560267d31e8cbc4.24755498', '7135966126026571e41d891.30220751', '106197701760090240261d40.42467623', '73324862960232b5aaa7410.65395747', 'is this color red?', '', '', 'yes', 'no', 'maybe', 'probably', '2', '1', '12', '2021-02-12 14:05:53'),
(4, '542184006026823181e5c2.42485925', '7135966126026571e41d891.30220751', '106197701760090240261d40.42467623', '73324862960232b5aaa7410.65395747', 'is this color pink?', '', '', 'yes', 'no', 'maybe', 'probably', '2', '1', '12', '2021-02-12 14:27:13'),
(5, '403172706602682ee589a14.41615846', '7135966126026571e41d891.30220751', '106197701760090240261d40.42467623', '73324862960232b5aaa7410.65395747', 'is this color yellow', '', '', 'yes', 'no', 'maybe', 'probably', '2', '1', '12', '2021-02-12 14:30:22'),
(6, '1576280367602683862b3448.35783150', '7135966126026571e41d891.30220751', '106197701760090240261d40.42467623', '73324862960232b5aaa7410.65395747', 'is this color blue', '', '', 'yes', 'no', 'maybe', 'probably', '2', '1', '12', '2021-02-12 14:32:54');

-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

CREATE TABLE `quizzes` (
  `id` int(100) NOT NULL,
  `quiz_id` varchar(255) NOT NULL,
  `module_id` varchar(255) NOT NULL,
  `course_id` varchar(255) NOT NULL,
  `quiz_name` longtext NOT NULL,
  `question_duration` varchar(200) NOT NULL,
  `date` varchar(20) NOT NULL,
  `day` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quizzes`
--

INSERT INTO `quizzes` (`id`, `quiz_id`, `module_id`, `course_id`, `quiz_name`, `question_duration`, `date`, `day`) VALUES
(1, '7135966126026571e41d891.30220751', '73324862960232b5aaa7410.65395747', '106197701760090240261d40.42467623', 'Choices & Consequences Quiz', '2', '2021-02-12 11:23:26', '2021-02-12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `first_name` varchar(60) NOT NULL,
  `last_name` varchar(60) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `account_type` varchar(20) NOT NULL,
  `account_status` varchar(20) NOT NULL,
  `evs` varchar(20) NOT NULL,
  `parent_fullname` mediumtext NOT NULL,
  `parent_email` varchar(200) NOT NULL,
  `date` varchar(20) NOT NULL,
  `day` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `username`, `first_name`, `last_name`, `email`, `password`, `account_type`, `account_status`, `evs`, `parent_fullname`, `parent_email`, `date`, `day`) VALUES
(1, '15191348815fb1a425268710.83193391', 'Jennifer', 'Jennifer', 'Smith', 'jennifer@theachievingacademy.com', '71b6828a26ebf007f58b81970f52dce6', 'admin', 'active', 'verified', '', '', '2020-12-22 04:15:15', '2020-12-22'),
(3, '9882244106011c0ac603933.75217941', 'Calvin', 'Calvin', 'Haven', 'endowed555@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', 'active', 'verified', 'Mr Haven', 'mrhaven@gmail.com', '2021-01-27 20:36:12', '2021-01-27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_confirmation`
--
ALTER TABLE `email_confirmation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_subscribers`
--
ALTER TABLE `email_subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `game_question_bank`
--
ALTER TABLE `game_question_bank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `module_printable_resources`
--
ALTER TABLE `module_printable_resources`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `module_videos`
--
ALTER TABLE `module_videos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question_bank`
--
ALTER TABLE `question_bank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `email_confirmation`
--
ALTER TABLE `email_confirmation`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `email_subscribers`
--
ALTER TABLE `email_subscribers`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `game`
--
ALTER TABLE `game`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `game_question_bank`
--
ALTER TABLE `game_question_bank`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `module_printable_resources`
--
ALTER TABLE `module_printable_resources`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `module_videos`
--
ALTER TABLE `module_videos`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `question_bank`
--
ALTER TABLE `question_bank`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
