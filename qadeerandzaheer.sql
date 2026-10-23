-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2026 at 07:27 PM
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
-- Database: `qadeerandzaheer`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `title` varchar(300) NOT NULL,
  `paragraph` varchar(600) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title`, `paragraph`, `image_path`, `created_at`, `updated_at`) VALUES
(1, 'Safeguard Your IP. Strengthen', 'Aziz & Ismail advises on trademarks, patents, designs, and copyrights—helping businesses protect what they create in Pakistan and beyond.', 'uploads/banners/1756370595_the-law-firms.jpg', '2025-08-26 13:21:11', '2025-08-28 18:08:16'),
(2, 'Trademark Registration Made Simple', 'From clearance searches and filing to oppositions and renewals—we handle the process end-to-end with clear timelines and fees.', 'uploads/banners/1756370604_aziz-and-co.jpg', '2025-08-26 13:23:47', '2025-08-28 15:48:01'),
(3, 'Practical Legal Counsel for Innovators', 'Responsive, business-minded attorneys delivering fast turnarounds, strong enforcement, and global portfolio management.', 'uploads/banners/1756370610_aziz-and-co.jpg', '2025-08-26 13:24:06', '2025-08-28 15:48:24');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `short_description` varchar(900) NOT NULL,
  `content` longtext NOT NULL,
  `featured_image` varchar(600) NOT NULL,
  `author` varchar(599) NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `category_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `slug` varchar(255) DEFAULT NULL,
  `meta_title` varchar(500) NOT NULL,
  `meta_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `short_description`, `content`, `featured_image`, `author`, `date`, `created_at`, `updated_at`, `category_id`, `status`, `slug`, `meta_title`, `meta_description`) VALUES
(17, 'Find the Best Job Opportunities and Build Your Career', '<p data-start=\"530\" data-end=\"713\">Looking for the right career opportunity? Discover the latest job openings across multiple industries and find the perfect role that matches your skills, experience, and career goals.</p>', '<h2 data-section-id=\"aesq1j\" data-start=\"738\" data-end=\"774\">Discover New Career Opportunities</h2><p data-start=\"776\" data-end=\"1044\">Finding the right job is one of the most important steps in building a successful career. Whether you are a fresh graduate, an experienced professional, or someone looking for a career change, the right opportunity can help you grow both personally and professionally.</p><p data-start=\"1046\" data-end=\"1290\">Today many companies are looking for talented individuals who are motivated, skilled, and ready to contribute to their organizations. By exploring the latest job openings, you can discover positions that match your qualifications and interests.</p><hr data-start=\"1292\" data-end=\"1295\"><h2 data-section-id=\"1vo22h9\" data-start=\"1297\" data-end=\"1334\">Why Choosing the Right Job Matters</h2><p data-start=\"1336\" data-end=\"1529\">Selecting the right job does not only mean earning a salary. It also means finding a workplace where you can learn new skills, gain valuable experience, and build a strong professional network.</p><p data-start=\"1531\" data-end=\"1564\">A good job opportunity can offer:</p><p data-start=\"1566\" data-end=\"1769\">Professional growth and development<br data-start=\"1601\" data-end=\"1604\">\r\nA positive and supportive work environment<br data-start=\"1646\" data-end=\"1649\">\r\nOpportunities to learn new technologies and skills<br data-start=\"1699\" data-end=\"1702\">\r\nCareer advancement and promotions<br data-start=\"1735\" data-end=\"1738\">\r\nLong term stability and success</p><p data-start=\"1771\" data-end=\"1868\">When you choose the right role, it helps you stay motivated and confident in your career journey.</p><hr data-start=\"1870\" data-end=\"1873\"><h2 data-section-id=\"1k720l7\" data-start=\"1875\" data-end=\"1923\">Job Opportunities Across Different Industries</h2><p data-start=\"1925\" data-end=\"2112\">There are many industries that offer excellent career opportunities today. Some of the most in demand sectors include technology, marketing, healthcare, finance, education, and logistics.</p><p data-start=\"2114\" data-end=\"2184\">Companies are constantly searching for professionals in areas such as:</p><p data-start=\"2186\" data-end=\"2366\">Digital marketing specialists<br data-start=\"2215\" data-end=\"2218\">\r\nWeb developers and designers<br data-start=\"2246\" data-end=\"2249\">\r\nCustomer service representatives<br data-start=\"2281\" data-end=\"2284\">\r\nSales executives<br data-start=\"2300\" data-end=\"2303\">\r\nAdministrative professionals<br data-start=\"2331\" data-end=\"2334\">\r\nFinance and accounting experts</p><p data-start=\"2368\" data-end=\"2482\">No matter your background or experience level, there are opportunities available that can match your career goals.</p><hr data-start=\"2484\" data-end=\"2487\"><h2 data-section-id=\"2ydcfv\" data-start=\"2489\" data-end=\"2522\">Tips for Finding the Right Job</h2><p data-start=\"2524\" data-end=\"2683\">Searching for the right job can sometimes feel challenging. However, with the right approach, you can increase your chances of finding the perfect opportunity.</p><p data-start=\"2685\" data-end=\"2880\">Update your resume regularly<br data-start=\"2713\" data-end=\"2716\">\r\nHighlight your key skills and achievements<br data-start=\"2758\" data-end=\"2761\">\r\nApply for jobs that match your experience<br data-start=\"2802\" data-end=\"2805\">\r\nPrepare well for interviews<br data-start=\"2832\" data-end=\"2835\">\r\nContinue learning new skills and technologies</p><p data-start=\"2882\" data-end=\"2976\">By staying proactive and focused, you can find the job that best fits your professional goals.</p><hr data-start=\"2978\" data-end=\"2981\"><h2 data-section-id=\"16sleu9\" data-start=\"2983\" data-end=\"3017\">Start Your Career Journey Today</h2><p data-start=\"3019\" data-end=\"3261\">The job market is full of opportunities for individuals who are ready to take the next step in their careers. Whether you are just starting out or looking for a better role, exploring new job openings can open doors to exciting possibilities.</p><p data-start=\"3263\" data-end=\"3382\">Take the first step today and discover job opportunities that can help you build a brighter and more successful future.</p><hr data-start=\"3384\" data-end=\"3387\"><p data-start=\"3389\" data-end=\"3434\">If you want, I can also create these for you:</p><p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p data-start=\"3436\" data-end=\"3642\" data-is-last-node=\"\" data-is-only-node=\"\">SEO optimized <strong data-start=\"3450\" data-end=\"3488\">H1 H2 H3 structure for a Jobs page</strong><br data-start=\"3488\" data-end=\"3491\">\r\nSchema markup for jobs page for Google<br data-start=\"3529\" data-end=\"3532\">\r\nA <strong data-start=\"3534\" data-end=\"3575\">Laravel or WordPress Jobs page layout</strong><br data-start=\"3575\" data-end=\"3578\">\r\nOr a <strong data-start=\"3583\" data-end=\"3641\">career page UI structure that converts more applicants</strong>.</p>', 'Dashboard_assets/1773378605_photo-1542744173-8e7e53415bb0.jpg', 'Sufiyan Shakeel', '2026-03-12', '2026-03-13 13:10:05', '2026-03-13 13:10:05', 5, 1, 'find-the-best-job-opportunities-and-build-your-career', 'Find the Best Job Opportunities and Build Your Career', 'Explore the latest job opportunities across different industries. Find the right career path, apply for jobs, and grow professionally with the best employment opportunities available today.'),
(18, 'Top Career Opportunities for Professionals Looking for Growth', '<p data-start=\"296\" data-end=\"499\">Looking to grow your career in a fast paced and professional environment? Discover exciting opportunities in digital marketing and web development where your skills and creativity can make a real impact.</p>', '<h2 data-section-id=\"1gsmf23\" data-start=\"514\" data-end=\"569\">Build Your Future with Exciting Career Opportunities</h2><p data-start=\"571\" data-end=\"856\">Finding the right job is more than just getting employment. It is about building a career that allows you to grow, learn, and achieve your professional goals. Many companies today are looking for passionate individuals who can contribute their skills and ideas to help businesses grow.</p><p data-start=\"858\" data-end=\"1004\">If you are someone who is motivated, creative, and ready to work in a professional environment, there are excellent opportunities waiting for you.</p><hr data-start=\"1006\" data-end=\"1009\"><h2 data-section-id=\"gkfihn\" data-start=\"1011\" data-end=\"1041\">Digital Marketing Executive</h2><p data-start=\"1043\" data-end=\"1248\">Digital marketing has become one of the fastest growing career fields in the modern business world. Companies rely on digital platforms to reach customers, promote products, and build strong online brands.</p><p data-start=\"1250\" data-end=\"1430\">A Digital Marketing Executive plays an important role in managing online campaigns, creating marketing strategies, and improving brand visibility across different digital channels.</p><p data-start=\"1432\" data-end=\"1741\">Professionals in this role are responsible for managing social media platforms, optimizing websites for search engines, analyzing campaign performance, and generating leads through online marketing activities. This role is ideal for individuals who enjoy creativity, strategy, and data driven decision making.</p><p data-start=\"1743\" data-end=\"1887\">Working in digital marketing also offers continuous learning opportunities because online platforms and marketing tools are constantly evolving.</p><hr data-start=\"1889\" data-end=\"1892\"><h2 data-section-id=\"t3mr0j\" data-start=\"1894\" data-end=\"1910\">Web Developer</h2><p data-start=\"1912\" data-end=\"2104\">Web development is another highly valuable career path in today’s digital world. Businesses depend on websites to connect with customers, showcase their services, and manage online operations.</p><p data-start=\"2106\" data-end=\"2364\">A Web Developer is responsible for designing, building, and maintaining websites that are responsive, user friendly, and technically efficient. This role requires knowledge of web technologies such as HTML, CSS, JavaScript, and modern development frameworks.</p><p data-start=\"2366\" data-end=\"2531\">Web developers work closely with designers and marketing teams to ensure websites provide a smooth user experience while maintaining strong performance and security.</p><p data-start=\"2533\" data-end=\"2681\">This career path is ideal for individuals who enjoy solving technical problems, building digital products, and working with innovative technologies.</p><hr data-start=\"2683\" data-end=\"2686\"><h2 data-section-id=\"1entasl\" data-start=\"2688\" data-end=\"2727\">Why These Careers Are in High Demand</h2><p data-start=\"2729\" data-end=\"2928\">Both digital marketing and web development are among the most in demand professions today. As businesses continue to move online, the need for skilled professionals in these fields continues to grow.</p><p data-start=\"2930\" data-end=\"3086\">These careers offer several benefits including professional growth, competitive salaries, skill development, and opportunities to work on exciting projects.</p><hr data-start=\"3088\" data-end=\"3091\"><h2 data-section-id=\"16sleu9\" data-start=\"3093\" data-end=\"3127\">Start Your Career Journey Today</h2><p data-start=\"3129\" data-end=\"3343\">The right opportunity can change the direction of your career. Whether you are interested in marketing, technology, or digital innovation, these roles provide the perfect platform to build your professional future.</p><p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p data-start=\"3345\" data-end=\"3438\" data-is-last-node=\"\" data-is-only-node=\"\">Explore these opportunities and take the first step toward a rewarding and successful career.</p>', 'Dashboard_assets/1773379829_photo-1522202176988-66273c2fd55f.jpg', 'Sufiyan Shakeel', '2026-03-12', '2026-03-13 13:30:29', '2026-03-13 13:30:29', 5, 1, 'top-career-opportunities-for-professionals-looking-for-growth', 'Top Career Opportunities for Professionals Looking for Growth', 'Explore exciting job opportunities in digital marketing and web development. Discover roles that help you grow your career, develop new skills, and work in a dynamic environment.'),
(19, 'How to Find the Right Job and Grow Your Professional Career', '<p data-start=\"264\" data-end=\"442\">Finding the right job can open the door to a successful and rewarding career. Learn how to explore new opportunities, improve your skills, and build a strong professional future.</p>', '<h2 data-section-id=\"ow7j01\" data-start=\"457\" data-end=\"497\">Finding the Right Job for Your Future</h2><p data-start=\"499\" data-end=\"718\">Choosing the right job is an important step in building a successful career. A good job does not only provide financial stability but also helps you grow professionally, gain valuable experience, and develop new skills.</p><p data-start=\"720\" data-end=\"1023\">In today’s competitive job market, companies are looking for individuals who are passionate, motivated, and ready to contribute to their organization. Whether you are a fresh graduate or an experienced professional, finding the right opportunity can make a significant difference in your career journey.</p><hr data-start=\"1025\" data-end=\"1028\"><h2 data-section-id=\"2k37m3\" data-start=\"1030\" data-end=\"1060\">Importance of Career Growth</h2><p data-start=\"1062\" data-end=\"1273\">A successful career is built on continuous learning and development. When you work in an environment that supports growth, you gain new experiences that help you improve your abilities and expand your knowledge.</p><p data-start=\"1275\" data-end=\"1514\">Career growth allows professionals to develop leadership skills, improve communication abilities, and gain industry specific expertise. Over time, this growth opens the door to better job opportunities and higher professional achievements.</p><hr data-start=\"1516\" data-end=\"1519\"><h2 data-section-id=\"tepw5w\" data-start=\"1521\" data-end=\"1554\">Skills That Employers Look For</h2><p data-start=\"1556\" data-end=\"1807\">Employers today value professionals who can adapt to changing environments and bring innovative ideas to the workplace. Some of the most valuable skills that companies look for include communication, problem solving, teamwork, and technical expertise.</p><p data-start=\"1809\" data-end=\"2028\">Having strong digital skills, analytical thinking, and the ability to learn quickly can also help professionals stand out in the job market. Continuous learning and skill development are essential for long term success.</p><hr data-start=\"2030\" data-end=\"2033\"><h2 data-section-id=\"1xyu3rs\" data-start=\"2035\" data-end=\"2081\">Preparing Yourself for Better Opportunities</h2><p data-start=\"2083\" data-end=\"2349\">If you want to improve your chances of getting a good job, it is important to focus on personal and professional development. Keeping your resume updated, improving your technical knowledge, and preparing for interviews can help you stand out among other candidates.</p><p data-start=\"2351\" data-end=\"2497\">Networking with professionals, attending workshops, and learning new tools can also increase your chances of finding the right career opportunity.</p><hr data-start=\"2499\" data-end=\"2502\"><h2 data-section-id=\"1efqvy9\" data-start=\"2504\" data-end=\"2537\">Build a Successful Career Path</h2><p data-start=\"2539\" data-end=\"2765\">The journey toward a successful career requires dedication, patience, and continuous effort. By exploring new opportunities, improving your skills, and staying focused on your goals, you can build a strong professional future.</p><p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p data-start=\"2767\" data-end=\"2956\" data-is-last-node=\"\" data-is-only-node=\"\">Every job opportunity is a step toward growth and learning. With the right mindset and determination, you can create a career path that leads to long term success and personal satisfaction.</p>', 'Dashboard_assets/1773380229_photo-1551836022-d5d88e9218df.jpg', 'Sufiyan Shakeel', '2026-03-12', '2026-03-13 13:37:09', '2026-03-13 13:37:09', 5, 1, 'how-to-find-the-right-job-and-grow-your-professional-career', 'How to Find the Right Job and Grow Your Professional Career', 'Learn how to find the right job, improve your career opportunities, and build a successful professional future with the right skills and strategies.');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(800) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `updated_at`, `created_at`) VALUES
(3, 'Sales Tax', '2025-08-26 15:08:10', '2025-08-26 15:08:10'),
(4, 'Income Tax', '2025-08-26 15:08:19', '2025-08-26 15:08:19'),
(5, 'jobss', '2026-03-11 14:32:25', '2026-03-11 14:06:12');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `industry` varchar(255) DEFAULT NULL,
  `company_size` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `user_id`, `company_name`, `email`, `phone`, `website`, `industry`, `company_size`, `country`, `city`, `address`, `logo`, `description`, `status`, `created_at`, `updated_at`) VALUES
(3, 2, 'benish', 'weboctane@gmail.com', '+9209090909', 'https://dev.weboctane.tech/', 'software enginneer', '12', 'austrila', 'sweden', 'test', 'companies/LwGp3CQPaTtivjKsigoAeG2WT5stWoGiKdqFe6FB.jpg', 'test', 'inactive', '2026-03-24 16:22:49', '2026-03-24 16:22:49'),
(4, 2, 'Dickerson Hansen Plc', 'gyhukabu@mailinator.com', '+1 (875) 545-5795', 'https://www.cyd.mobi', 'Atque quia ut dolor', 'Hoffman Dotson Trading', 'Odit amet labore om', 'Illum vero qui nisi', 'Ea sunt alias qui so', NULL, 'Sed veniam irure ma', 'inactive', '2026-04-04 11:53:02', '2026-04-04 11:53:02'),
(6, 2, 'Kinney Meyers LLC', 'cekikydany@mailinator.com', '+1 (213) 638-5075', 'https://www.xovywi.co.uk', 'Dolorum dolor culpa', 'Odom and Blake Traders', 'Dolores aut alias ve', 'Laborum praesentium', 'Beatae doloribus con', NULL, 'Tenetur rem corrupti', 'inactive', '2026-06-16 14:47:06', '2026-06-16 14:47:06');

-- --------------------------------------------------------

--
-- Table structure for table `conditions`
--

CREATE TABLE `conditions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `condition_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `condition_subcategory_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `badge_text` varchar(255) DEFAULT NULL,
  `hero_description` text DEFAULT NULL,
  `hero_image_url` varchar(500) DEFAULT NULL,
  `estimated_sessions` varchar(50) DEFAULT NULL,
  `stat_one` varchar(50) DEFAULT NULL,
  `stat_two` varchar(50) DEFAULT NULL,
  `stat_three` varchar(50) DEFAULT NULL,
  `causes` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`causes`)),
  `symptoms` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`symptoms`)),
  `roadmap_steps` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`roadmap_steps`)),
  `cta_heading` varchar(255) DEFAULT NULL,
  `cta_text` varchar(500) DEFAULT NULL,
  `cta_button_text` varchar(100) DEFAULT NULL,
  `cta_button_link` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `conditions`
--

INSERT INTO `conditions` (`id`, `condition_category_id`, `condition_subcategory_id`, `title`, `slug`, `badge_text`, `hero_description`, `hero_image_url`, `estimated_sessions`, `stat_one`, `stat_two`, `stat_three`, `causes`, `symptoms`, `roadmap_steps`, `cta_heading`, `cta_text`, `cta_button_text`, `cta_button_link`, `is_active`, `created_at`, `updated_at`) VALUES
(3, 1, 1, 'Neck Pain', 'neck-pain', 'Musculoskeletal care', 'A simple recovery roadmap designed to ease pain, improve movement, and build strong long term support.', 'assets/images/conditions/neck-pain-LmTI8O.jpg', '4 to 8', 'Home', 'Targeted', 'Guided', '[\"Poor posture and prolonged screen time\",\"Poor posture and prolonged screen time\"]', '[\"Neck stiffness and pain with turning\"]', '[\"Assessment of posture, neck mobility, and pain triggers Hands on soft tissue release and gentle joint mobility work Targeted strengthening for neck and upper back support muscles Posture correction plan plus home exercises and workstation guidance\"]', 'Book your session', 'BooK Now', 'Book Now', '/submit-medical-history', 1, '2025-12-16 14:40:28', '2026-01-02 02:27:16'),
(4, 1, 4, 'Lower Back Pain', 'lower-back-pain', 'Musculoskeletal care', 'Poor lifting mechanics and weak core control Muscle strain or joint irritation Prolonged sitting and reduced mobility', NULL, '6 to 12', 'Home', 'Targeted', 'Guided', '[\"Poor lifting mechanics and weak core control\",\"Muscle strain or joint irritation\",\"Prolonged sitting and reduced mobility\"]', '[\"Low back pain and morning stiffness\",\"Pain with bending or getting up\",\"Tightness after sitting long\",\"Reduced ability to lift or walk comfortably\",\"Pain referral to hip or leg sometimes\"]', '[\"Movement assessment to identify the pain source and triggers Pain relief strategies including guided mobility and safe positions Core strengthening and hip stability training Functional retraining for bending, lifting, sitting, and walking\"]', 'Book your session', 'Book Now', 'Book Now', '/submit-medical-history', 1, '2025-12-18 18:54:13', '2025-12-18 18:54:13'),
(5, 1, 2, 'Upper Back Pain', 'upper-back-pain', 'Musculoskeletal care', 'Desk posture and rounded shoulders Muscle imbalance and trigger points Thoracic spine stiffness', 'assets/images/conditions/upper-back-pain-X8yCRJ.jpg', '3 to 6', 'Home', 'Targeted', 'Guided', '[\"Desk posture and rounded shoulders\",\"Muscle imbalance and trigger points\",\"Thoracic spine stiffness\"]', '[\"Pain between shoulder blades\",\"Tightness with deep breathing or rotation\",\"Discomfort with long sitting\",\"Muscle fatigue in upper back\",\"Reduced upper back mobility\"]', '[\"Thoracic mobility assessment and posture screening Soft tissue work for tight upper back muscles Mobility exercises for thoracic extension and rotation Strengthening for postural muscles plus daily routine plan\"]', 'Book your session', NULL, 'Book Now', '/submit-medical-history', 1, '2025-12-18 19:00:08', '2026-01-02 02:59:12'),
(6, 1, 5, 'Shoulder Pain', 'shoulder-pain', 'Musculoskeletal care', 'Overuse and rotator cuff strain Poor shoulder mechanics and posture Joint stiffness or tendon irritation', NULL, '6 to 10', 'Home', 'Targeted', 'Guided', '[\"Overuse and rotator cuff strain\",\"Poor shoulder mechanics and posture\",\"Poor shoulder mechanics and posture\"]', '[\"Pain with lifting the arm\",\"Difficulty reaching overhead or behind\",\"Night pain and discomfort on lying\",\"Shoulder weakness\",\"Reduced shoulder range\"]', '[\"Shoulder assessment for mobility, strength, and movement pattern Pain reducing techniques and controlled mobility work Rotator cuff and shoulder blade strengthening Functional retraining for reaching, lifting, and daily activity\"]', 'Book your session', NULL, 'Book Now', '/submit-medical-history', 1, '2025-12-18 19:09:10', '2025-12-18 19:09:10'),
(7, 1, 6, 'Elbow Pain', 'elbow-pain', 'Musculoskeletal care', 'Repetitive gripping and lifting Tendon overload from work or sports Poor technique and muscle imbalance', NULL, '4 to 8', 'Home', 'Targeted', 'Guided', '[\"Repetitive gripping and lifting\",\"Tendon overload from work or sports\",\"Poor technique and muscle imbalance\"]', '[\"Pain on the inner or outer elbow\",\"Grip weakness\",\"Pain with twisting or lifting\",\"Tenderness around the elbow\",\"Flare ups with repetitive tasks\"]', '[\"Tendon assessment and load management plan Soft tissue release and targeted mobility Progressive strengthening for forearm and grip support Technique correction plus home program for recovery\"]', 'Book your session', NULL, 'Book Now', '/submit-medical-history', 1, '2025-12-18 19:13:05', '2025-12-18 19:13:05'),
(8, 1, 7, 'Hand and Wrist Pain', 'hand-and-wrist-pain', 'Musculoskeletal care', 'Repetitive strain and poor ergonomics Tendon irritation or minor sprain Nerve compression in some cases', NULL, '4 to 8', 'Home', 'Targeted', 'Guided', '[\"Repetitive strain and poor ergonomics\",\"Tendon irritation or minor sprain\",\"Nerve compression in some cases\"]', '[\"Wrist pain with typing or lifting\",\"Reduced grip strength\",\"Stiffness and tenderness\",\"Swelling sometimes\",\"Tingling or numbness sometimes\"]', '[\"Assessment of wrist mobility, grip, and nerve involvement Pain relief strategies and gentle mobility work Strengthening for wrist stability and functional grip Ergonomic corrections plus home exercise routine\"]', 'Book your session', NULL, 'Book Now', '/submit-medical-history', 1, '2025-12-18 19:28:49', '2025-12-18 19:48:59'),
(9, 1, 8, 'Hip Pain', 'hip-pain', 'Musculoskeletal care', 'Muscle imbalance and weak hip support Joint stiffness and movement restriction Overuse or tendon irritation', NULL, '6 to 10', 'Home', 'Targeted', 'Guided', '[\"Muscle imbalance and weak hip support\",\"Joint stiffness and movement restriction\",\"Overuse or tendon irritation\"]', '[\"Pain in groin, side hip, or buttock\",\"Pain with walking or stairs\",\"Hip stiffness especially after rest\",\"Reduced rotation and flexibility\",\"Discomfort with prolonged sitting\"]', '[\"Hip and gait assessment to find the movement cause Mobility work to reduce stiffness and improve range Strengthening for glutes and hip stabilizers Functional training for walking, stairs, and daily movement\"]', 'Book your session', NULL, 'Book Now', '/submit-medical-history', 1, '2025-12-18 19:52:38', '2025-12-18 19:52:38'),
(10, 1, 9, 'Knee Pain', 'knee-pain', 'Musculoskeletal care', 'Weak hip support and knee overload Tendon irritation or cartilage stress Old injury or movement misalignment', NULL, '6 to 12', 'Home', 'Targeted', 'Guided', '[\"Weak hip support and knee overload\",\"Tendon irritation or cartilage stress\",\"Old injury or movement misalignment\"]', '[\"Pain with stairs or squatting\",\"Stiffness after sitting\",\"Swelling sometimes\",\"Feeling of instability\",\"Pain during walking or standing long\"]', '[\"Knee alignment and movement assessment Pain relief and mobility work for knee and hip Strengthening for quads, hips, and stability muscles Return to function plan for stairs, walking, and activity\"]', 'Book your session', NULL, 'Book Now', '/submit-medical-history', 1, '2025-12-18 20:16:04', '2025-12-18 20:16:04'),
(11, 1, 10, 'Foot and Ankle Pain', 'foot-and-ankle-pain', 'Musculoskeletal care', 'Ankle sprain history or tendon overload Poor footwear and poor foot mechanics Plantar fascia irritation in some cases', NULL, '4 to 10', 'Home', 'Targeted', 'Guided', '[\"Ankle sprain history or tendon overload\",\"Poor footwear and poor foot mechanics\",\"Plantar fascia irritation in some cases\"]', '[\"Pain with walking or standing\",\"Swelling or tenderness around ankle\",\"Heel pain or arch discomfort\",\"Stiffness especially morning\",\"Balance discomfort on uneven surfaces\"]', '[\"Assessment of ankle stability, foot mechanics, and gait Mobility work and swelling control strategies if needed Strength and balance training for ankle and foot support Walking retraining and footwear guidance plus home plan\"]', 'Book your session', NULL, 'Book Now', '/submit-medical-history', 1, '2025-12-18 20:22:10', '2025-12-18 20:22:10'),
(12, 1, 11, 'Muscle Strains and Ligament Injuries', 'muscle-strains-and-ligament-injuries', 'Musculoskeletal care', 'Sudden overload or awkward movement Sports injury or poor warm up Weak support muscles and fatigue', NULL, '6 to 12', 'Home', 'Targeted', 'Guided', '[\"Sudden overload or awkward movement\",\"Sports injury or poor warm up\",\"Weak support muscles and fatigue\"]', '[\"Sharp pain at injury site\",\"Swelling and tenderness\",\"Reduced strength and control\",\"Limited movement\",\"Pain with loading or stretching\"]', '[\"Injury assessment and safe stage based rehab plan Pain control and protected mobility during healing Progressive strengthening and stability training Return to activity program to prevent reinjury\"]', 'Book your session', NULL, 'Book Now', '/submit-medical-history', 1, '2025-12-18 20:26:18', '2025-12-18 20:26:18'),
(13, 1, 12, 'Joint Stiffness and Arthritis', 'joint-stiffness-and-arthritis', 'Musculoskeletal care', 'Age related joint changes Reduced activity and mobility loss Inflammation flare ups in some cases', NULL, '8 to 16', 'Home', 'Targeted', 'Guided', '[\"Age related joint changes\",\"Reduced activity and mobility loss\",\"Inflammation flare ups in some cases\"]', '[\"Morning stiffness\",\"Joint pain with movement\",\"Reduced range of motion\",\"Swelling sometimes\",\"Difficulty with stairs, walking, or grip\"]', '[\"Joint assessment to set safe movement goals Mobility routine to improve range and reduce stiffness Strengthening to protect joints and improve function Long term plan for flare management and daily activity\"]', 'Book your session', NULL, 'Book Now', '/submit-medical-history', 1, '2025-12-18 20:28:41', '2025-12-18 20:28:41'),
(14, 1, 13, 'Postural and Work Related Pain', 'postural-and-work-related-pain', 'Musculoskeletal care', 'Long sitting and poor desk setup Repetitive tasks and muscle imbalance Weak core and postural muscles', NULL, '3 to 6', 'Home', 'Targeted', 'Guided', '[\"Long sitting and poor desk setup\",\"Repetitive tasks and muscle imbalance\",\"Weak core and postural muscles\"]', '[\"Neck and shoulder tightness\",\"Upper back ache after work\",\"Headaches from tension\",\"Fatigue and stiffness\",\"Pain that returns daily\"]', '[\"Posture and movement assessment including workstation habits Soft tissue release and mobility for tight areas Strengthening for core, upper back, and shoulder support Ergonomic corrections plus daily reset routine and home program\"]', 'Book your session', NULL, 'Book Now', '/submit-medical-history', 1, '2025-12-18 20:31:20', '2025-12-18 20:31:20'),
(15, 2, 3, 'Stroke Rehabilitation', 'stroke-rehabilitation', 'Neurological Conditions', 'Stroke affects brain control of movement and balance Weakness and coordination changes after stroke', NULL, '12 to 30', 'Home', 'Targeted', 'Guided', '[\"Stroke affects brain control of movement and balance\",\"Weakness and coordination changes after stroke\"]', '[\"Weakness on one side\",\"Difficulty walking or standing\",\"Poor balance and coordination\",\"Stiffness or spasticity\",\"Reduced independence in daily tasks\"]', '[\"Neuro assessment for strength, balance, gait, and function Mobility and walking retraining with safe progression Strength and task specific training for daily activities Home program with regular progression and caregiver guidance if needed\"]', 'Book your session', NULL, 'Book Now', '/submit-medical-history', 1, '2025-12-18 20:36:49', '2025-12-18 20:36:49'),
(16, 2, 14, 'Paralysis and Weakness', 'paralysis-and-weakness', 'Neurological Conditions', 'Neurological injury or illness Nerve involvement or prolonged immobility', NULL, '12 to 24', 'Home', 'Targeted', 'Guided', '[\"Neurological injury or illness\",\"Nerve involvement or prolonged immobility\"]', '[\"Reduced strength in limbs\",\"Difficulty standing, walking, or transfers\",\"Fatigue and poor endurance\",\"Balance problems\",\"Reduced functional control\"]', '[\"Detailed assessment for mobility level and safety Assisted strengthening and movement re education Balance and functional training for independence Progress tracking with gradual advancement at home\"]', 'Book your session', NULL, 'Book Now', '/submit-medical-history', 1, '2025-12-18 20:45:05', '2025-12-18 20:45:05'),
(17, 2, 15, 'Nerve Injuries', 'nerve-injuries', 'Neurological Conditions', 'Nerve compression or irritation Trauma or repetitive strain Post surgery nerve sensitivity sometimes', NULL, '6 to 14', 'Home', 'Targeted', 'Guided', '[\"Nerve compression or irritation\",\"Trauma or repetitive strain\",\"Post surgery nerve sensitivity sometimes\"]', '[\"Tingling or numbness\",\"Burning or sharp pain\",\"Weakness in arm or leg\",\"Reduced grip or foot control\",\"Symptoms worse with certain positions\"]', '[\"Assessment to identify nerve involvement and triggers Nerve mobility exercises and symptom calming strategies Strengthening and movement retraining for function Posture and activity modification plus home program\"]', 'Book your session', NULL, 'Book Now', '/submit-medical-history', 1, '2025-12-18 20:48:20', '2025-12-18 20:48:20'),
(18, 2, 16, 'Parkinson’s Disease', 'parkinsons-disease', 'Neurological Conditions', 'Progressive neurological condition affecting movement control', NULL, '10 to 24', 'Home', 'Targeted', 'Guided', '[\"Progressive neurological condition affecting movement control\"]', '[\"Stiffness and slower movement\",\"Balance issues and falls risk\",\"Shuffling gait and difficulty turning\",\"Reduced coordination\",\"Fatigue with activity\"]', '[\"Assessment for gait, balance, posture, and mobility limits Mobility exercises and posture training Balance and walking drills to improve stability and confidence Strength and daily function routine with safe progression\"]', 'Book your session', NULL, 'Book Now', '/submit-medical-history', 1, '2025-12-18 20:53:18', '2025-12-18 20:53:18'),
(19, 2, 17, 'Multiple Sclerosis MS', 'multiple-sclerosis-ms', 'Neurological Conditions', 'Nervous system condition affecting strength and endurance', NULL, '10 to 24', 'Home', 'Targeted', 'Guided', '[\"Nervous system condition affecting strength and endurance\"]', '[\"Fatigue and weakness\",\"Balance and coordination issues\",\"Muscle stiffness or spasticity\",\"Reduced walking tolerance\",\"Flare related mobility changes\"]', '[\"Assessment with energy management planning Strength and mobility program tailored to tolerance Balance training and gait support drills Home routine with pacing and progression guidance\"]', 'Book your session', NULL, 'Book Now', '/submit-medical-history', 1, '2025-12-18 20:55:39', '2025-12-18 20:55:39'),
(20, 2, 18, 'Balance and Coordination Issues', 'balance-and-coordination-issues', 'Neurological Conditions', 'Neurological factors or vestibular dysfunction Weakness and poor proprioception', NULL, '6 to 12', 'Home', 'Targeted', 'Guided', '[\"Neurological factors or vestibular dysfunction\",\"Weakness and poor proprioception\"]', '[\"Unsteadiness while walking\",\"Fear of falling\",\"Difficulty turning or changing direction\",\"Stumbling on uneven surfaces\",\"Reduced confidence outdoors\"]', '[\"Assessment for balance system and movement control Balance retraining and coordination drills Strengthening for legs and core stability Walking and functional training with progress checks\"]', 'Book your session', NULL, 'Book Now', '/submit-medical-history', 1, '2025-12-18 21:13:49', '2025-12-18 21:13:49'),
(21, 2, 19, 'Gait Disorders', 'gait-disorders', 'Neurological Conditions', 'Neurological weakness or coordination issues Joint pain or imbalance affecting walking Post stroke or injury patterns', NULL, '8 to 16', 'Home', 'Targeted', 'Guided', '[\"Neurological weakness or coordination issues\",\"Joint pain or imbalance affecting walking\",\"Post stroke or injury patterns\"]', '[\"Uneven walking pattern\",\"Dragging foot or reduced step length\",\"Instability and fatigue while walking\",\"Difficulty on stairs\",\"Reduced walking speed\"]', '[\"Gait assessment to identify pattern and limitations Walking retraining with targeted cues and exercises Strengthening for hips, knees, ankles, and core Functional practice for stairs, turns, and endurance\"]', 'Book your session', NULL, 'Book Now', '/submit-medical-history', 1, '2025-12-18 21:22:35', '2025-12-18 21:22:35'),
(22, 2, 20, 'Neurological Mobility Limitations', 'neurological-mobility-limitations', 'Neurological Conditions', 'Nervous system conditions limiting movement planning and control', NULL, '12 to 30', 'Home', 'Targeted', 'Guided', '[\"Nervous system conditions limiting movement planning and control\"]', '[\"Reduced mobility and endurance\",\"Weakness or stiffness\",\"Poor balance\",\"Difficulty with daily activities\",\"Dependence in transfers or walking\"]', '[\"Assessment for safe mobility level and goals Mobility and transfer training for daily independence Strength and balance work to improve control Home progression plan with regular adjustments\"]', 'Book your session', NULL, 'Book Now', '/submit-medical-history', 1, '2025-12-18 21:24:44', '2025-12-18 21:24:44'),
(23, 3, 21, 'Jaw Pain TMJ Disorders', 'jaw-pain-tmj-disorders', 'Cranial Facial and TMJ Conditions', 'Jaw muscle tension and clenching Jaw joint irritation and poor alignment Neck posture contribution and stress', NULL, '4 to 10', 'Home', 'Targeted', 'Guided', '[\"Jaw muscle tension and clenching\",\"Jaw joint irritation and poor alignment\",\"Neck posture contribution and stress\"]', '[\"Jaw pain or tightness\",\"Clicking or locking\",\"Pain while chewing\",\"Limited mouth opening\",\"Headache and neck tightness\"]', '[\"Assessment of jaw movement, neck posture, and muscle tension Soft tissue release for jaw and neck muscles Jaw mobility and control exercises Posture correction and home program to reduce recurrence\"]', 'Book your session', NULL, 'Book Now', '/submit-medical-history', 1, '2025-12-19 13:50:12', '2025-12-19 13:50:12'),
(24, 3, 22, 'Facial Pain', 'facial-pain', 'Cranial Facial and TMJ Conditions', 'Muscle tension and trigger points TMJ issues or nerve sensitivity Neck posture contribution', NULL, '4 to 10', 'Home', 'Targeted', 'Guided', '[\"Muscle tension and trigger points\",\"TMJ issues or nerve sensitivity\",\"Neck posture contribution\"]', '[\"Facial aching or tightness\",\"Tenderness around jaw or cheek\",\"Pain with chewing sometimes\",\"Headache association\",\"Neck tightness\"]', '[\"Assessment to identify jaw and neck involvement Soft tissue release and calming strategies Mobility and controlled movement exercises Home program plus posture correction support\"]', 'Book your session', NULL, 'Book Now', '/submit-medical-history', 1, '2025-12-19 13:52:50', '2025-12-19 13:52:50'),
(25, 3, 23, 'Headaches', 'headaches', 'Cranial Facial and TMJ Conditions', 'Neck and upper back tension Postural strain and muscle trigger points Stress and reduced mobility', NULL, '4 to 8', 'Home', 'Targeted', 'Guided', '[\"Neck and upper back tension\",\"Postural strain and muscle trigger points\",\"Stress and reduced mobility\"]', '[\"Head pain with neck tightness\",\"Pressure or heaviness around head\",\"Pain after screen time\",\"Reduced focus during episodes\",\"Shoulder and upper back tension\"]', '[\"Assessment of cervical mobility and postural load Soft tissue release and mobility work Strengthening for neck and upper back support Home routine for posture reset and symptom control\"]', 'Book your session', NULL, 'Book Now', '/submit-medical-history', 1, '2025-12-19 13:54:42', '2025-12-19 13:54:42'),
(26, 3, 24, 'Cervicogenic Headaches', 'cervicogenic-headaches', 'Cranial Facial and TMJ Conditions', 'Upper neck joint dysfunction Posture related overload Muscle tightness around neck and shoulders', NULL, '6 to 10', 'Home', 'Targeted', 'Guided', '[\"Upper neck joint dysfunction\",\"Posture related overload\",\"Muscle tightness around neck and shoulders\"]', '[\"Headache starting from the neck\",\"Pain with neck rotation\",\"One sided head pain sometimes\",\"Shoulder and upper back tightness\",\"Stiff neck\"]', '[\"Assessment of upper cervical joints and movement pattern Manual therapy for mobility restoration Strengthening and posture correction plan Home program to prevent recurrence\"]', 'Book your session', NULL, 'Book Now', '/submit-medical-history', 1, '2025-12-19 13:57:49', '2025-12-19 13:57:49'),
(27, 3, 25, 'Tension Type Headaches', 'tension-type-headaches', 'Cranial Facial and TMJ Conditions', 'Stress and muscle tension Poor posture and prolonged sitting Tight scalp, neck, and shoulder muscles', NULL, '3 to 6', 'Home', 'Targeted', 'Guided', '[\"Stress and muscle tension\",\"Poor posture and prolonged sitting\",\"Tight scalp, neck, and shoulder muscles\"]', '[\"Tight band like head pressure\",\"Neck and shoulder tightness\",\"Head fatigue and heaviness\",\"Symptoms after long work hours\",\"Reduced sleep quality sometimes\"]', '[\"Assessment for postural tension and trigger areas Soft tissue release and relaxation based mobility Strengthening for posture support muscles Home routine for daily tension control\"]', 'Book your session', NULL, 'Book Now', '/submit-medical-history', 1, '2025-12-19 14:04:57', '2025-12-19 14:04:57'),
(28, 3, 26, 'Migraines', 'migraines', 'Cranial Facial and TMJ Conditions', 'Neurological sensitivity with triggers Neck tension and posture may contribute Lifestyle triggers such as sleep and stress', NULL, '4 to 10', 'Home', 'Targeted', 'Guided', '[\"Neurological sensitivity with triggers\",\"Neck tension and posture may contribute\",\"Lifestyle triggers such as sleep and stress\"]', '[\"Throbbing head pain\",\"Light or sound sensitivity\",\"Nausea sometimes\",\"Reduced activity tolerance\",\"Neck tightness during attacks sometimes\"]', '[\"Assessment of neck contribution and posture strain Mobility and stability work for neck and upper back Trigger support plan and movement guidance Home program for prevention and symptom control support\"]', 'Book your session', NULL, 'Book Now', '/submit-medical-history', 1, '2025-12-19 14:06:42', '2025-12-19 14:06:42'),
(29, 3, 27, 'Neck Related Cranial Pain', 'neck-related-cranial-pain', 'Cranial Facial and TMJ Conditions', 'Upper neck stiffness and trigger points Posture related overload Muscle imbalance in neck and shoulders', NULL, '4 to 8', 'Home', 'Targeted', 'Guided', '[\"Upper neck stiffness and trigger points\",\"Posture related overload\",\"Muscle imbalance in neck and shoulders\"]', '[\"Pain at base of skull\",\"Head heaviness with neck tightness\",\"Pain with looking up or turning\",\"Shoulder tightness\",\"Reduced neck range\"]', '[\"Assessment of upper neck mobility and posture Manual therapy and soft tissue release Strength and posture retraining Home routine for long term control\"]', 'Book your session', NULL, 'Book Now', '/submit-medical-history', 1, '2025-12-19 14:08:29', '2025-12-19 14:08:29'),
(30, 4, 28, 'Vertigo', 'vertigo', 'Vestibular and Balance Conditions', 'Inner ear or vestibular dysfunction Motion sensitivity and balance system disruption Neck contribution sometimes', NULL, '4 to 8', 'Home', 'Targeted', 'Guided', '[\"Inner ear or vestibular dysfunction\",\"Motion sensitivity and balance system disruption\",\"Neck contribution sometimes\"]', '[\"Spinning sensation\",\"Dizziness with movement\",\"Nausea sometimes\",\"Unsteady walking\",\"Fear of sudden head movement\"]', '[\"Assessment of vestibular function and balance control Vestibular exercises to reduce dizziness episodes Balance training to improve stability and confidence Home program with progression and monitoring\"]', 'Book your session', NULL, 'Book Now', '/submit-medical-history', 1, '2025-12-19 14:20:57', '2025-12-19 14:20:57'),
(31, 4, 29, 'Dizziness', 'dizziness', 'Vestibular and Balance Conditions', 'Vestibular sensitivity or poor balance control Deconditioning and weakness Neck tension contribution sometimes', NULL, '4 to 10', 'Home', 'Targeted', 'Guided', '[\"Vestibular sensitivity or poor balance control\",\"Deconditioning and weakness\",\"Neck tension contribution sometimes\"]', '[\"Lightheadedness or unsteady feeling\",\"Difficulty focusing while moving\",\"Motion sensitivity\",\"Fear of walking in busy environments\",\"Balance discomfort\"]', '[\"Assessment to identify vestibular and movement triggers Balance and gaze stability exercises Strength and walking stability training Home program with gradual exposure progression\"]', 'Book your session', NULL, 'Book Now', '/submit-medical-history', 1, '2025-12-19 14:23:00', '2025-12-19 14:23:00'),
(32, 4, 30, 'Balance Disorders', 'balance-disorders', 'Vestibular and Balance Conditions', 'Vestibular dysfunction Neurological factors Weakness and reduced proprioception', NULL, '6 to 12', 'Home', 'Targeted', 'Guided', '[\"Vestibular dysfunction\",\"Neurological factors\",\"Weakness and reduced proprioception\"]', '[\"Unsteady standing or walking\",\"Difficulty turning\",\"Frequent stumbles\",\"Fear of falling\",\"Poor stability on uneven ground\"]', '[\"Balance assessment and fall risk screening Balance retraining drills and coordination work Strengthening for legs and core stability Functional walking practice with progression\"]', 'Book your session', NULL, 'Book Now', '/submit-medical-history', 1, '2025-12-19 14:26:06', '2025-12-19 14:26:06'),
(33, 4, 31, 'Frequent Falls', 'frequent-falls', 'Vestibular and Balance Conditions', 'Poor balance and weakness Slow reaction time and gait issues Dizziness or sensory issues', NULL, '6 to 14', 'Home', 'Targeted', 'Guided', '[\"Poor balance and weakness\",\"Slow reaction time and gait issues\",\"Dizziness or sensory issues\"]', '[\"Repeated falls or near falls\",\"Instability while walking\",\"Fear of walking alone\",\"Difficulty on stairs\",\"Reduced confidence outdoors\"]', '[\"Fall risk assessment and home safety review Balance training and reaction time drills Strengthening for legs, hips, and core Walking and functional task training to improve safety\"]', 'Book your session', NULL, 'Book Now', '/submit-medical-history', 1, '2025-12-19 14:29:16', '2025-12-19 14:29:16'),
(34, 4, 32, 'Motion Sensitivity', 'motion-sensitivity', 'Vestibular and Balance Conditions', 'Vestibular sensitivity and movement intolerance Post vertigo patterns Poor balance confidence', NULL, '4 to 10', 'Home', 'Targeted', 'Guided', '[\"Vestibular sensitivity and movement intolerance\",\"Post vertigo patterns\",\"Poor balance confidence\"]', '[\"Dizziness with head movement\",\"Nausea with travel or crowds\",\"Discomfort in busy visual environments\",\"Avoidance of movement\",\"Unsteady feeling\"]', '[\"Assessment to identify motion triggers Graded exposure exercises to rebuild tolerance Balance and gaze stability training Home program with step by step progression\"]', 'Book your session', NULL, 'Book Now', '/submit-medical-history', 1, '2025-12-19 14:32:19', '2025-12-19 14:32:19'),
(35, 4, 33, 'Postural Instability', 'postural-instability', 'Vestibular and Balance Conditions', 'Core weakness and poor postural control Balance dysfunction Neurological factors sometimes', NULL, '6 to 12', 'Home', 'Targeted', 'Guided', '[\"Core weakness and poor postural control\",\"Balance dysfunction\",\"Neurological factors sometimes\"]', '[\"Swaying while standing\",\"Unsteady turns\",\"Difficulty standing for long\",\"Reduced confidence walking\",\"Increased falls risk\"]', '[\"Assessment of core control and balance strategy Core strengthening and postural control training Balance drills and gait stability work Home plan with progress checks and upgrades\"]', 'Book your session', NULL, 'Book Now', '/submit-medical-history', 1, '2025-12-19 14:34:55', '2025-12-19 14:34:55'),
(36, 5, 35, 'Joint Replacement Recovery', 'joint-replacement-recovery', 'Post Surgical Rehabilitation', 'Post surgery stiffness, swelling, and weakness Reduced movement due to healing phase', NULL, '10 to 20', 'Home', 'Targeted', 'Guided', '[\"Post surgery stiffness, swelling, and weakness\",\"Reduced movement due to healing phase\"]', '[\"Pain and stiffness around the joint\",\"Swelling and tightness\",\"Difficulty walking or stairs\",\"Reduced strength\",\"Limited range of motion\"]', '[\"Post surgical assessment and safe stage planning Mobility work to restore range and reduce stiffness Strengthening for joint support and walking stability Functional training for stairs, transfers, and daily tasks\"]', 'Book your session', NULL, 'Book Now', '/submit-medical-history', 1, '2025-12-19 14:44:47', '2025-12-19 14:44:47'),
(37, 5, 36, 'Spine Surgery Rehabilitation', 'spine-surgery-rehabilitation', 'Post Surgical Rehabilitation', 'Healing tissue and protective stiffness Weak core and movement fear Reduced mobility after rest', NULL, '10 to 20', 'Home', 'Targeted', 'Guided', '[\"Healing tissue and protective stiffness\",\"Weak core and movement fear\",\"Reduced mobility after rest\"]', '[\"Back stiffness and tightness\",\"Weakness and low endurance\",\"Limited bending and rotation\",\"Pain with prolonged sitting\",\"Reduced confidence in movement\"]', '[\"Assessment to ensure safe movement boundaries Gentle mobility and core activation progression Strengthening and posture retraining for spine support Functional retraining for sitting, walking, and daily activity\"]', 'Book your session', NULL, 'Book Now', '/submit-medical-history', 1, '2025-12-19 14:47:36', '2025-12-19 14:47:36'),
(38, 5, 37, 'Fracture Recovery', 'fracture-recovery', 'Post Surgical Rehabilitation', 'Immobilization stiffness and muscle weakness Reduced joint movement after healing Pain with re loading the limb', NULL, '8 to 16', 'Home', 'Targeted', 'Guided', '[\"Immobilization stiffness and muscle weakness\",\"Reduced joint movement after healing\",\"Pain with re loading the limb\"]', '[\"Stiffness in nearby joints\",\"Weakness and reduced control\",\"Swelling sometimes\",\"Pain with walking or lifting\",\"Reduced functional movement\"]', '[\"Assessment of range, strength, and function Mobility restoration and swelling control if needed Strengthening and stability progression Return to walking and daily activities training\"]', 'Book your session', NULL, 'Book Now', '/submit-medical-history', 1, '2025-12-19 14:50:43', '2025-12-19 14:50:43'),
(39, 5, 38, 'Orthopedic Surgery Rehab', 'orthopedic-surgery-rehab', 'Post Surgical Rehabilitation', 'Post operative swelling and stiffness Weakness due to reduced activity Movement restriction during healing', NULL, '10 to 20', 'Home', 'Targeted', 'Guided', '[\"Post operative swelling and stiffness\",\"Weakness due to reduced activity\",\"Movement restriction during healing\"]', '[\"Pain and limited movement\",\"Weakness in the affected area\",\"Swelling and tightness\",\"Difficulty with daily tasks\",\"Reduced endurance\"]', '[\"Assessment and stage based rehab plan Mobility and pain control strategies Progressive strengthening and stability work Functional retraining for safe return to activity\"]', 'Book your session', NULL, 'Book Now', '/submit-medical-history', 1, '2025-12-19 14:54:28', '2025-12-19 14:54:28'),
(40, 5, 39, 'Neurological Surgery Rehab', 'neurological-surgery-rehab', 'Post Surgical Rehabilitation', 'Post surgery changes in nerve control Weakness and coordination deficits Reduced balance and endurancePost surgery changes in nerve control Weakness and coordination deficits Reduced balance and endurance', NULL, '12 to 30', 'Home', 'Targeted', 'Guided', '[\"Post surgery changes in nerve control\",\"Post surgery changes in nerve control\",\"Reduced balance and endurance\"]', '[\"Weakness in limbs\",\"Poor coordination\",\"Balance issues\",\"Walking difficulty\",\"Fatigue with activity\"]', '[\"Neuro assessment for mobility, balance, and function Walking and balance retraining with safe progression Strength and task based training for independence Home program with regular monitoring and upgrades\"]', 'Book your session', NULL, 'Book Now', '/submit-medical-history', 1, '2025-12-19 14:57:02', '2025-12-19 14:57:02'),
(41, 6, 40, 'Sports Injuries', 'sports-injuries', 'Sports and Injury Conditions', 'Overload, poor technique, and sudden impact Inadequate warm up or recovery Muscle imbalance and weak stabilizers', NULL, '6 to 12', 'Home', 'Targeted', 'Guided', '[\"Overload, poor technique, and sudden impact\",\"Inadequate warm up or recovery\",\"Muscle imbalance and weak stabilizers\"]', '[\"Pain during activity\",\"Swelling or tenderness\",\"Reduced performance\",\"Weakness or instability\",\"Pain returning after restarts\"]', '[\"Assessment to identify the injured tissue and movement fault Pain control and mobility restoration Strength and stability training specific to sport demands Return to sport progression and injury prevention plan\"]', 'Book your session', NULL, 'Book Now', '/submit-medical-history', 1, '2025-12-19 15:03:49', '2025-12-19 15:03:49'),
(42, 6, 41, 'Muscle Tears', 'muscle-tears', 'Sports and Injury Conditions', 'Sudden sprinting or overload Poor flexibility and fatigue Previous injury risk', NULL, '6 to 12', 'Home', 'Targeted', 'Guided', '[\"Sudden sprinting or overload\",\"Poor flexibility and fatigue\",\"Previous injury risk\"]', '[\"Sudden sharp pain\",\"Bruising or swelling sometimes\",\"Weakness in the muscle\",\"Pain with stretching\",\"Reduced ability to load\"]', '[\"Assessment and safe healing timeline planning Protected mobility and pain control early phase Progressive strengthening and functional loading Return to running or activity with prevention guidance\"]', 'Book your session', NULL, 'Book Now', '/submit-medical-history', 1, '2025-12-19 15:06:14', '2025-12-19 15:06:14'),
(43, 6, 42, 'Ligament Sprains', 'ligament-sprains', 'Sports and Injury Conditions', 'Twisting injury or sudden change of direction Poor stability and weak support muscles Sports or fall impact', NULL, '6 to 12', 'Home', 'Targeted', 'Guided', '[\"Twisting injury or sudden change of direction\",\"Poor stability and weak support muscles\",\"Sports or fall impact\"]', '[\"Swelling and tenderness\",\"Pain with weight bearing\",\"Instability feeling\",\"Reduced range of motion\",\"Difficulty walking or stairs\"]', '[\"Assessment of stability and injury grade Swelling control and mobility restoration Strengthening and proprioception training for stability Return to activity plan and injury prevention exercises\"]', 'Book your session', NULL, 'Book Now', '/submit-medical-history', 1, '2025-12-19 15:08:08', '2025-12-19 15:08:08'),
(44, 6, 43, 'Tendon Injuries', 'tendon-injuries', 'Sports and Injury Conditions', 'Repetitive overload and overuse Poor biomechanics and weak support muscles Sudden spike in activity', NULL, '6 to 14', 'Home', 'Targeted', 'Guided', '[\"Repetitive overload and overuse\",\"Poor biomechanics and weak support muscles\",\"Sudden spike in activity\"]', '[\"Localized tendon pain\",\"Stiffness after rest\",\"Pain with repetitive movement\",\"Reduced strength\",\"Pain improves then returns with load\"]', '[\"Tendon load assessment and pain management plan Progressive strengthening to rebuild tendon capacity Mobility correction and technique improvements Home program with graded loading progression\"]', 'Book your session', NULL, 'Book Now', '/submit-medical-history', 1, '2025-12-19 15:10:18', '2025-12-19 15:10:18'),
(45, 6, 44, 'Overuse Injuries', 'overuse-injuries', 'Sports and Injury Conditions', 'Repeated stress without recovery Poor movement patterns Training load increase too quickly', NULL, '4 to 10', 'Home', 'Targeted', 'Guided', '[\"Repeated stress without recovery\",\"Poor movement patterns\",\"Training load increase too quickly\"]', '[\"Gradual pain increase over time\",\"Stiffness and fatigue\",\"Pain during repeated tasks\",\"Reduced performance\",\"Symptoms flare with activity\"]', '[\"Assessment of workload, biomechanics, and weak links Pain reduction strategies and movement correction Strengthening for endurance and joint support Return to activity plan with load management guidance\"]', 'Book your session', NULL, 'Book Now', '/submit-medical-history', 1, '2025-12-19 15:12:30', '2025-12-19 15:12:30'),
(46, 6, 45, 'Return to Activity Rehab', 'return-to-activity-rehab', 'Sports and Injury Conditions', 'Deconditioning after injury or surgery Movement fear and reduced control Weakness and poor stability', NULL, '6 to 12', 'Home', 'Targeted', 'Guided', '[\"Deconditioning after injury or surgery\",\"Movement fear and reduced control\",\"Weakness and poor stability\"]', '[\"Lack of confidence in movement\",\"Weakness and low endurance\",\"Pain with higher activity\",\"Poor balance or coordination\",\"Reduced performance\"]', '[\"Functional assessment to set safe activity goals Strength and stability training to meet demands Movement retraining and sport or work specific drills Gradual return plan with monitoring and progression\"]', 'Book your session', NULL, 'Book Now', '/submit-medical-history', 1, '2025-12-19 15:14:13', '2025-12-19 15:14:13'),
(47, 7, 46, 'Chronic Back Pain', 'chronic-back-pain', 'Chronic Pain Conditions', 'Long term movement dysfunction and weakness Posture strain and poor core control Recurring flare patterns', NULL, '8 to 16', 'Home', 'Targeted', 'Guided', '[\"Long term movement dysfunction and weakness\",\"Posture strain and poor core control\",\"Recurring flare patterns\"]', '[\"Persistent back pain\",\"Stiffness and reduced mobility\",\"Pain with sitting or standing long\",\"Sleep disruption sometimes\",\"Fear of movement\"]', '[\"Assessment to identify contributing movement patterns Pain calming strategies and graded mobility work Strengthening for core and hip support Long term self management plan with progress tracking\"]', 'Book your session', NULL, 'Book Now', '/submit-medical-history', 1, '2025-12-19 15:22:31', '2025-12-19 15:22:31'),
(48, 7, 47, 'Chronic Neck Pain', 'chronic-neck-pain', 'Chronic Pain Conditions', 'Posture overload and recurring muscle tension Weak support muscles and poor mobility Stress related tightness', 'https://rajahospital.com/wp-content/uploads/2024/02/Pain-In-the-Neck-cause-raja-hospital-1024x683.png', '6 to 12', 'Home', 'Targeted', 'Guided', '[\"Posture overload and recurring muscle tension\",\"Weak support muscles and poor mobility\",\"Stress related tightness\"]', '[\"Ongoing neck tightness\",\"Pain with prolonged screen time\",\"Headaches sometimes\",\"Shoulder heaviness\",\"Reduced range of motion\"]', '[\"Assessment of posture, mobility, and daily triggers Manual therapy and mobility exercises for relief Strengthening and endurance training for neck support Home routine for long term prevention and control\"]', 'Book your session', NULL, 'Book Now', '/submit-medical-history', 1, '2025-12-19 15:26:06', '2026-01-01 21:20:56'),
(49, 7, 48, 'Long Term Joint Pain', 'long-term-joint-pain', 'Chronic Pain Conditions', 'Joint wear changes and weakness Reduced mobility and activity Inflammation flare ups sometimes', NULL, '8 to 16', 'Home', 'Targeted', 'Guided', '[\"Joint wear changes and weakness\",\"Reduced mobility and activity\",\"Inflammation flare ups sometimes\"]', '[\"Joint pain with movement\",\"Morning stiffness\",\"Reduced range of motion\",\"Swelling sometimes\",\"Difficulty with stairs or grip\"]', '[\"Assessment of joint function and safe limits Mobility work to reduce stiffness Strengthening to protect the joint and improve function Long term plan for flare management and daily activity\"]', 'Book your session', NULL, 'Book Now', '/submit-medical-history', 1, '2025-12-19 15:28:37', '2025-12-19 15:28:37'),
(50, 7, 49, 'Widespread Musculoskeletal Pain', 'widespread-musculoskeletal-pain', 'Chronic Pain Conditions', 'Generalized sensitivity and long term pain patterns Deconditioning and poor movement tolerance Stress and sleep impact', NULL, '10 to 20', 'Home', 'Targeted', 'Guided', '[\"Generalized sensitivity and long term pain patterns\",\"Deconditioning and poor movement tolerance\",\"Stress and sleep impact\"]', '[\"Pain in multiple areas\",\"Fatigue and low stamina\",\"Stiffness and heaviness\",\"Poor sleep sometimes\",\"Reduced activity tolerance\"]', '[\"Assessment focused on safe tolerance and function goals Gentle graded exercises to rebuild strength and confidence Mobility and breathing based relaxation strategies Progressive plan with pacing and monitoring\"]', 'Book your session', NULL, 'Book Now', '/submit-medical-history', 1, '2025-12-19 15:31:22', '2025-12-19 15:31:22'),
(51, 7, 50, 'Movement Related Pain', 'movement-related-pain', 'Chronic Pain Conditions', 'Faulty movement mechanics and weakness Poor stability and mobility imbalance Repetitive strain patterns', NULL, '6 to 12', 'Home', 'Targeted', 'Guided', '[\"Faulty movement mechanics and weakness\",\"Poor stability and mobility imbalance\",\"Repetitive strain patterns\"]', '[\"Pain during specific movements\",\"Tightness and stiffness\",\"Reduced strength or control\",\"Pain after activity\",\"Fear of repeating the movement\"]', '[\"Assessment to identify the painful movement pattern Movement correction and mobility restoration Strengthening for stability and control Gradual return to activity with prevention plan\"]', 'Book your session', NULL, 'Book Now', '/submit-medical-history', 1, '2025-12-19 15:35:26', '2025-12-19 15:35:26'),
(52, 8, 51, 'Age Related Joint Pain', 'age-related-joint-pain', 'Geriatric Conditions', 'Age related joint changes Weakness and reduced flexibility Lower activity levels', NULL, '6 to 12', 'Home', 'Targeted', 'Guided', '[\"Age related joint changes\",\"Weakness and reduced flexibility\",\"Lower activity levels\"]', '[\"Joint pain with walking or stairs\",\"Morning stiffness\",\"Reduced mobility\",\"Balance discomfort sometimes\",\"Fatigue with activity\"]', '[\"Assessment of mobility, strength, and safety Gentle mobility work and pain reduction strategies Strengthening for joint support and walking confidence Home routine with safe progression and monitoring\"]', 'Book your session', NULL, 'Book Now', '/submit-medical-history', 1, '2025-12-19 15:43:23', '2025-12-19 15:43:23'),
(53, 8, 52, 'Reduced Mobility', 'reduced-mobility', 'Geriatric Conditions', 'Weakness and deconditioning Pain avoidance and stiffness Post illness or post surgery decline', NULL, '8 to 16', 'Home', 'Targeted', 'Guided', '[\"Weakness and deconditioning\",\"Pain avoidance and stiffness\",\"Post illness or post surgery decline\"]', '[\"Difficulty standing or walking long\",\"Slow movement and fatigue\",\"Reduced balance\",\"Stiff joints\",\"Dependence in daily tasks\"]', '[\"Functional assessment to set mobility goals Strength and endurance training with gradual progression Balance and walking practice for daily independence Home program plus progress tracking and safety guidance\"]', 'Book your session', NULL, 'Book Now', '/submit-medical-history', 1, '2025-12-19 15:49:45', '2025-12-19 15:49:45'),
(54, 8, 53, 'Balance Issues in Older Adults', 'balance-issues-in-older-adults', 'Geriatric Conditions', 'Weakness, slower reactions, sensory changes Vestibular or neurological factors Reduced confidence and activity', NULL, '6 to 14', 'Home', 'Targeted', 'Guided', '[\"Weakness, slower reactions, sensory changes\",\"Vestibular or neurological factors\",\"Reduced confidence and activity\"]', '[\"Unsteady walking\",\"Fear of falling\",\"Difficulty turning\",\"Stumbling on uneven surfaces\",\"Reduced outdoor confidence\"]', '[\"Balance and fall risk assessment Strengthening for legs and core stability Balance drills and gait retraining Home safety tips and progressive training plan\"]', 'Book your session', NULL, 'Book Now', '/submit-medical-history', 1, '2025-12-19 15:53:39', '2025-12-19 15:53:39'),
(55, 8, 56, 'Fall Prevention Needs', 'fall-prevention-needs', 'Geriatric Conditions', 'Poor balance and strength Medication or dizziness influence sometimes Home hazards and low confidence', NULL, '6 to 14', 'Home', 'Targeted', 'Guided', '[\"Poor balance and strength\",\"Medication or dizziness influence sometimes\",\"Home hazards and low confidence\"]', '[\"Repeated near falls\",\"Instability during walking\",\"Slow reactions\",\"Difficulty on stairs\",\"Fear of walking alone\"]', '[\"Fall risk screening and functional testing Strength and balance training with reaction drills Walking and stair training for safer movement Home advice for safe setup plus progress monitoring\"]', 'Book your session', NULL, 'Book Now', '/submit-medical-history', 1, '2025-12-19 16:13:17', '2025-12-19 16:13:17'),
(56, 9, 57, 'Pelvic Floor Dysfunction', 'pelvic-floor-dysfunction', 'Pelvic and Functional Conditions', 'Weak pelvic floor muscles or poor coordination Post pregnancy changes or surgery effects Core instability and posture contribution', NULL, '6 to 12', 'Home', 'Targeted', 'Guided', '[\"Weak pelvic floor muscles or poor coordination\",\"Post pregnancy changes or surgery effects\",\"Core instability and posture contribution\"]', '[\"Pelvic discomfort or heaviness\",\"Weak core support\",\"Low back or hip discomfort sometimes\",\"Poor stability during movement\",\"Reduced control during daily activity\"]', '[\"Private assessment focused on core and pelvic control Breathing and pelvic floor coordination training Core strengthening and posture based stability work Home program with gradual progression and monitoring\"]', 'Book your session', NULL, 'Book Now', '/submit-medical-history', 1, '2025-12-19 16:29:50', '2025-12-19 16:29:50'),
(57, 9, 58, 'Core Weakness', 'core-weakness', 'Pelvic and Functional Conditions', 'Sedentary lifestyle and deconditioning Post pregnancy or post surgery weakness Poor posture and movement patterns', NULL, '4 to 10', 'Home', 'Targeted', 'Guided', '[\"Sedentary lifestyle and deconditioning\",\"Post pregnancy or post surgery weakness\",\"Poor posture and movement patterns\"]', '[\"Low back strain with activity\",\"Poor posture and fatigue\",\"Reduced stability while walking or lifting\",\"Muscle imbalance discomfort\",\"Low endurance\"]', '[\"Assessment of core control and movement patterns Activation training and stability exercises Strengthening with functional progression for daily tasks Home routine plus posture correction and monitoring\"]', 'Book your session', NULL, 'Book Now', '/submit-medical-history', 1, '2025-12-19 16:50:38', '2025-12-19 16:50:38'),
(58, 9, 59, 'Functional Movement Limitations', 'functional-movement-limitations', 'Pelvic and Functional Conditions', 'Mobility restrictions and weakness Old injuries and poor movement habits Pain related movement avoidance', NULL, '6 to 12', 'Home', 'Targeted', 'Guided', '[\"Mobility restrictions and weakness\",\"Old injuries and poor movement habits\",\"Pain related movement avoidance\"]', '[\"Difficulty with squatting or stairs\",\"Reduced range and stiffness\",\"Poor balance or control\",\"Pain during movement\",\"Reduced confidence in activity\"]', '[\"Functional assessment to identify limitations and goals Mobility restoration and movement correction Strengthening for stability and control Return to daily activity plan with home program\"]', 'Book your session', NULL, 'Book Now', '/submit-medical-history', 1, '2025-12-19 16:52:34', '2025-12-19 16:52:34');

-- --------------------------------------------------------

--
-- Table structure for table `condition_categories`
--

CREATE TABLE `condition_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `condition_categories`
--

INSERT INTO `condition_categories` (`id`, `name`, `slug`, `sort_order`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Musculoskeletal MSK Conditions', 'musculoskeletal-msk-conditions', 0, 1, '2025-12-16 16:21:36', '2025-12-16 16:21:36'),
(2, 'Neurological Conditions', 'neurological-conditions', 0, 1, '2025-12-16 16:57:45', '2025-12-16 16:57:45'),
(3, 'Cranial Facial and TMJ Conditions', 'cranial-facial-and-tmj-conditions', 0, 1, '2025-12-18 21:25:50', '2025-12-18 21:25:50'),
(4, 'Vestibular and Balance Conditions', 'vestibular-and-balance-conditions', 0, 1, '2025-12-19 14:09:14', '2025-12-19 14:09:14'),
(5, 'Post Surgical Rehabilitation', 'post-surgical-rehabilitation', 0, 1, '2025-12-19 14:36:05', '2025-12-19 14:36:05'),
(6, 'Sports and Injury Conditions', 'sports-and-injury-conditions', 0, 1, '2025-12-19 14:58:16', '2025-12-19 14:58:16'),
(7, 'Chronic Pain Conditions', 'chronic-pain-conditions', 0, 1, '2025-12-19 15:14:51', '2025-12-19 15:14:51'),
(8, 'Geriatric Conditions', 'geriatric-conditions', 0, 1, '2025-12-19 15:37:42', '2025-12-19 15:37:42'),
(9, 'Pelvic and Functional Conditions', 'pelvic-and-functional-conditions', 0, 1, '2025-12-19 16:23:07', '2025-12-19 16:23:07');

-- --------------------------------------------------------

--
-- Table structure for table `condition_subcategories`
--

CREATE TABLE `condition_subcategories` (
  `id` int(11) NOT NULL,
  `condition_category_id` int(11) NOT NULL,
  `name` varchar(800) NOT NULL,
  `slug` varchar(800) DEFAULT NULL,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `condition_subcategories`
--

INSERT INTO `condition_subcategories` (`id`, `condition_category_id`, `name`, `slug`, `sort_order`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 1, 'Neck Pain', 'neck-pain', 1, 1, '2025-12-16 16:48:26', '2025-12-16 16:48:26'),
(2, 1, 'Upper Back Pain', 'upper-back-pain', 1, 1, '2025-12-16 16:49:09', '2025-12-16 16:53:32'),
(3, 2, 'Stroke Rehabilitation', 'stroke-rehabilitation', 1, 1, '2025-12-16 17:01:05', '2025-12-16 17:01:05'),
(4, 1, 'Lower Back Pain', 'lower-back-pain', 1, 1, '2025-12-18 18:20:49', '2025-12-18 18:20:49'),
(5, 1, 'Shoulder Pain', 'shoulder-pain', 1, 1, '2025-12-18 18:21:29', '2025-12-18 18:21:29'),
(6, 1, 'Elbow Pain', 'elbow-pain', 1, 1, '2025-12-18 18:21:52', '2025-12-18 18:21:52'),
(7, 1, 'Hand and Wrist Pain', 'hand-and-wrist-pain', 1, 1, '2025-12-18 18:22:14', '2025-12-18 18:22:14'),
(8, 1, 'Hip Pain', 'hip-pain', 1, 1, '2025-12-18 18:23:18', '2025-12-18 18:23:18'),
(9, 1, 'Knee Pain', 'knee-pain', 1, 1, '2025-12-18 18:23:37', '2025-12-18 18:23:37'),
(10, 1, 'Foot and Ankle Pain', 'foot-and-ankle-pain', 1, 1, '2025-12-18 18:23:57', '2025-12-18 18:23:57'),
(11, 1, 'Muscle Strains and Ligament Injuries', 'muscle-strains-and-ligament-injuries', 1, 1, '2025-12-18 18:24:15', '2025-12-18 18:24:15'),
(12, 1, 'Joint Stiffness and Arthritis', 'joint-stiffness-and-arthritis', 1, 1, '2025-12-18 18:24:36', '2025-12-18 18:24:36'),
(13, 1, 'Postural and Work Related Pain', 'postural-and-work-related-pain', 1, 1, '2025-12-18 18:24:58', '2025-12-18 18:24:58'),
(14, 2, 'Paralysis and Weakness', 'paralysis-and-weakness', 1, 1, '2025-12-18 20:37:33', '2025-12-18 20:37:33'),
(15, 2, 'Nerve Injuries', 'nerve-injuries', 1, 1, '2025-12-18 20:37:53', '2025-12-18 20:37:53'),
(16, 2, 'Parkinson’s Disease', 'parkinsons-disease', 1, 1, '2025-12-18 20:38:13', '2025-12-18 20:38:13'),
(17, 2, 'Multiple Sclerosis MS', 'multiple-sclerosis-ms', 1, 1, '2025-12-18 20:39:46', '2025-12-18 20:39:46'),
(18, 2, 'Balance and Coordination Issues', 'balance-and-coordination-issues', 1, 1, '2025-12-18 20:40:35', '2025-12-18 20:40:35'),
(19, 2, 'Gait Disorders', 'gait-disorders', 1, 1, '2025-12-18 20:40:59', '2025-12-18 20:40:59'),
(20, 2, 'Neurological Mobility Limitations', 'neurological-mobility-limitations', 1, 1, '2025-12-18 20:41:34', '2025-12-18 20:41:34'),
(21, 3, 'Jaw Pain TMJ Disorders', 'jaw-pain-tmj-disorders', 1, 1, '2025-12-18 21:26:08', '2025-12-18 21:26:58'),
(22, 3, 'Facial Pain', 'facial-pain', 1, 1, '2025-12-18 21:27:40', '2025-12-18 21:27:40'),
(23, 3, 'Headaches', 'headaches', 1, 1, '2025-12-18 21:28:17', '2025-12-18 21:28:17'),
(24, 3, 'Cervicogenic Headaches', 'cervicogenic-headaches', 1, 1, '2025-12-18 21:28:32', '2025-12-18 21:28:32'),
(25, 3, 'Tension Type Headaches', 'tension-type-headaches', 1, 1, '2025-12-18 21:29:19', '2025-12-18 21:29:19'),
(26, 3, 'Migraines', 'migraines', 1, 1, '2025-12-18 21:29:33', '2025-12-18 21:29:33'),
(27, 3, 'Neck Related Cranial Pain', 'neck-related-cranial-pain', 1, 1, '2025-12-18 21:29:59', '2025-12-18 21:29:59'),
(28, 4, 'Vertigo', 'vertigo', 1, 1, '2025-12-19 14:09:37', '2025-12-19 14:09:37'),
(29, 4, 'Dizziness', 'dizziness', 1, 1, '2025-12-19 14:09:54', '2025-12-19 14:09:54'),
(30, 4, 'Balance Disorders', 'balance-disorders', 1, 1, '2025-12-19 14:10:09', '2025-12-19 14:10:09'),
(31, 4, 'Frequent Falls', 'frequent-falls', 1, 1, '2025-12-19 14:10:22', '2025-12-19 14:10:22'),
(32, 4, 'Motion Sensitivity', 'motion-sensitivity', 1, 1, '2025-12-19 14:10:38', '2025-12-19 14:10:38'),
(33, 4, 'Postural Instability', 'postural-instability', 1, 1, '2025-12-19 14:10:59', '2025-12-19 14:10:59'),
(35, 5, 'Joint Replacement Recovery', 'joint-replacement-recovery', 1, 1, '2025-12-19 14:37:28', '2025-12-19 14:37:28'),
(36, 5, 'Spine Surgery Rehabilitation', 'spine-surgery-rehabilitation', 1, 1, '2025-12-19 14:37:44', '2025-12-19 14:37:44'),
(37, 5, 'Fracture Recovery', 'fracture-recovery', 1, 1, '2025-12-19 14:37:58', '2025-12-19 14:37:58'),
(38, 5, 'Orthopedic Surgery Rehab', 'orthopedic-surgery-rehab', 1, 1, '2025-12-19 14:38:22', '2025-12-19 14:38:22'),
(39, 5, 'Neurological Surgery Rehab', 'neurological-surgery-rehab', 1, 1, '2025-12-19 14:38:53', '2025-12-19 14:38:53'),
(40, 6, 'Sports Injuries', 'sports-injuries', 1, 1, '2025-12-19 14:58:40', '2025-12-19 14:58:40'),
(41, 6, 'Muscle Tears', 'muscle-tears', 1, 1, '2025-12-19 14:59:07', '2025-12-19 14:59:07'),
(42, 6, 'Ligament Sprains', 'ligament-sprains', 1, 1, '2025-12-19 14:59:19', '2025-12-19 14:59:19'),
(43, 6, 'Tendon Injuries', 'tendon-injuries', 1, 1, '2025-12-19 14:59:49', '2025-12-19 14:59:49'),
(44, 6, 'Overuse Injuries', 'overuse-injuries', 1, 1, '2025-12-19 15:00:10', '2025-12-19 15:00:10'),
(45, 6, 'Return to Activity Rehab', 'return-to-activity-rehab', 1, 1, '2025-12-19 15:00:32', '2025-12-19 15:00:32'),
(46, 7, 'Chronic Back Pain', 'chronic-back-pain', 1, 1, '2025-12-19 15:15:07', '2025-12-19 15:15:07'),
(47, 7, 'Chronic Neck Pain', 'chronic-neck-pain', 1, 1, '2025-12-19 15:15:41', '2025-12-19 15:15:41'),
(48, 7, 'Long Term Joint Pain', 'long-term-joint-pain', 1, 1, '2025-12-19 15:15:50', '2025-12-19 15:15:50'),
(49, 7, 'Widespread Musculoskeletal Pain', 'widespread-musculoskeletal-pain', 1, 1, '2025-12-19 15:16:07', '2025-12-19 15:16:07'),
(50, 7, 'Movement Related Pain', 'movement-related-pain', 1, 1, '2025-12-19 15:16:18', '2025-12-19 15:16:18'),
(51, 8, 'Age Related Joint Pain', 'age-related-joint-pain', 1, 1, '2025-12-19 15:38:11', '2025-12-19 15:38:11'),
(52, 8, 'Reduced Mobility', 'reduced-mobility', 1, 1, '2025-12-19 15:38:28', '2025-12-19 15:38:28'),
(53, 8, 'Balance Issues in Older Adults', 'balance-issues-in-older-adults', 1, 1, '2025-12-19 15:38:51', '2025-12-19 15:38:51'),
(54, 8, 'Balance Issues in Older Adults', 'balance-issues-in-older-adults', 1, 1, '2025-12-19 15:39:07', '2025-12-19 15:39:07'),
(55, 8, 'Post Fracture Rehab', 'post-fracture-rehab', 1, 1, '2025-12-19 15:40:28', '2025-12-19 15:40:28'),
(56, 8, 'Fall Prevention Needs', 'fall-prevention-needs', 1, 1, '2025-12-19 16:06:57', '2025-12-19 16:06:57'),
(57, 9, 'Pelvic Floor Dysfunction', 'pelvic-floor-dysfunction', 1, 1, '2025-12-19 16:24:51', '2025-12-19 16:24:51'),
(58, 9, 'Core Weakness', 'core-weakness', 1, 1, '2025-12-19 16:25:09', '2025-12-19 16:25:09'),
(59, 9, 'Functional Movement Limitations', 'functional-movement-limitations', 1, 1, '2025-12-19 16:25:30', '2025-12-19 16:25:30');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(800) NOT NULL,
  `email` varchar(900) NOT NULL,
  `country` varchar(900) NOT NULL,
  `phone` varchar(900) NOT NULL,
  `message` varchar(900) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `country`, `phone`, `message`, `created_at`, `updated_at`) VALUES
(198, 'Benish Khan', 'benishk800@gmail.com', 'Pakistan', '03478356711', 'tyr', '2026-08-29 06:16:12', '2026-08-29 06:16:12');

-- --------------------------------------------------------

--
-- Table structure for table `contact_settings`
--

CREATE TABLE `contact_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `note` varchar(255) DEFAULT NULL,
  `address` text NOT NULL,
  `phones` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`phones`)),
  `emails` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`emails`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_settings`
--

INSERT INTO `contact_settings` (`id`, `note`, `address`, `phones`, `emails`, `created_at`, `updated_at`) VALUES
(1, '+92', '305, Frere Business Centre, Frere Road, Adjacent Akhbar Market, Saddar, Karachi-75350 (Pakistan)', '[\"0092-21-2772944, 2772945, 2721357, 2721359, 2750546, 2750547\"]', '[\"azizismail@cyber.net.pk\",\"info@azizismail.com\"]', '2025-08-27 20:18:29', '2025-08-27 20:32:15');

-- --------------------------------------------------------

--
-- Table structure for table `corporate`
--

CREATE TABLE `corporate` (
  `id` int(11) NOT NULL,
  `corporate_id` int(11) NOT NULL,
  `block_type` enum('heading','paragraph','list','image') NOT NULL,
  `content` text NOT NULL,
  `image` varchar(800) DEFAULT NULL,
  `sort_order` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `corporate`
--

INSERT INTO `corporate` (`id`, `corporate_id`, `block_type`, `content`, `image`, `sort_order`, `created_at`, `updated_at`) VALUES
(1, 1, 'heading', 'empowerings', 'uploads/corporate/1743333556_tARMa60ui8.jpg', 39, '2025-03-30 18:19:16', '2025-03-30 18:19:16'),
(2, 1, 'heading', 'empowerings', 'uploads/corporate/1743333618_Qi4gnTT4ok.jpg', 39, '2025-03-30 18:20:18', '2025-03-30 18:20:18'),
(3, 1, 'list', 'Velit placeat iusto', NULL, 1, '2025-03-30 18:24:51', '2025-03-30 18:24:51');

-- --------------------------------------------------------

--
-- Table structure for table `disciplines`
--

CREATE TABLE `disciplines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `menu_group` varchar(255) DEFAULT NULL,
  `menu_title` varchar(255) DEFAULT NULL,
  `menu_icon` varchar(255) DEFAULT NULL,
  `breadcrumb_title` varchar(255) DEFAULT NULL,
  `hero_title` varchar(255) NOT NULL,
  `hero_highlight` varchar(255) DEFAULT NULL,
  `hero_description` text DEFAULT NULL,
  `hero_button_1_text` varchar(255) DEFAULT NULL,
  `hero_button_1_link` varchar(255) DEFAULT NULL,
  `hero_button_2_text` varchar(255) DEFAULT NULL,
  `hero_button_2_link` varchar(255) DEFAULT NULL,
  `hero_image` varchar(255) DEFAULT NULL,
  `expertise_title` varchar(255) DEFAULT NULL,
  `expertise_highlight` varchar(255) DEFAULT NULL,
  `expertise_description` text DEFAULT NULL,
  `left_card_icon` varchar(255) DEFAULT NULL,
  `left_card_title` varchar(255) DEFAULT NULL,
  `left_role_1` varchar(255) DEFAULT NULL,
  `left_role_2` varchar(255) DEFAULT NULL,
  `left_role_3` varchar(255) DEFAULT NULL,
  `right_card_title` varchar(255) DEFAULT NULL,
  `right_role_1` varchar(255) DEFAULT NULL,
  `right_role_2` varchar(255) DEFAULT NULL,
  `right_role_3` varchar(255) DEFAULT NULL,
  `right_role_4` varchar(255) DEFAULT NULL,
  `right_role_5` varchar(255) DEFAULT NULL,
  `right_role_6` varchar(255) DEFAULT NULL,
  `right_role_7` varchar(255) DEFAULT NULL,
  `right_role_8` varchar(255) DEFAULT NULL,
  `cta_title` varchar(255) DEFAULT NULL,
  `cta_description` varchar(255) DEFAULT NULL,
  `cta_phone` varchar(100) DEFAULT NULL,
  `cta_button_1_text` varchar(255) DEFAULT NULL,
  `cta_button_2_text` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `disciplines`
--

INSERT INTO `disciplines` (`id`, `slug`, `menu_group`, `menu_title`, `menu_icon`, `breadcrumb_title`, `hero_title`, `hero_highlight`, `hero_description`, `hero_button_1_text`, `hero_button_1_link`, `hero_button_2_text`, `hero_button_2_link`, `hero_image`, `expertise_title`, `expertise_highlight`, `expertise_description`, `left_card_icon`, `left_card_title`, `left_role_1`, `left_role_2`, `left_role_3`, `right_card_title`, `right_role_1`, `right_role_2`, `right_role_3`, `right_role_4`, `right_role_5`, `right_role_6`, `right_role_7`, `right_role_8`, `cta_title`, `cta_description`, `cta_phone`, `cta_button_1_text`, `cta_button_2_text`, `created_at`, `updated_at`) VALUES
(4, 'healthcare-care', 'Healthcare', 'Healthcare & Care', 'fa-solid fa-heart-pulse', 'Healthcare & Care', 'Healthcare &', 'Care', 'Connecting exceptional healthcare professionals with organisations that deliver quality care services across the United States. We support hospitals, care providers, and healthcare organisations with trusted talent solutions.', 'View Vacancies', '/jobs', 'Contact Us', '/contact-us', 'uploads/disciplines/1787991405_healthcare.jpg', 'Specialized', 'Expertise', 'Our healthcare recruitment solutions connect skilled professionals with leading healthcare providers and care organisations.', 'fa-solid fa-user-doctor', 'Healthcare Specialists', 'Registered Nurses', 'Care Workers', 'Healthcare Assistants', 'Healthcare Roles', 'Doctors', 'Nurses', 'Medical Assistants', 'Care Coordinators', 'Support Workers', 'Clinical Staff', 'Healthcare Managers', 'Allied Health Professionals', 'Looking for your next Healthcare professional?', 'Our specialist recruitment team connects organisations with reliable healthcare talent.', '+1 424 426 7394', 'Get In Touch', 'Call Us', '2026-08-29 07:03:38', '2026-08-29 03:16:45'),
(5, 'engineering-technical', 'Engineering', 'Engineering & Technical', 'fa-solid fa-gears', 'Engineering & Technical', 'Engineering &', 'Technical', 'Connecting skilled engineers and technical professionals with companies seeking expertise, innovation, and reliable workforce solutions.', 'View Vacancies', '/jobs', 'Contact Us', '/contact-us', 'uploads/disciplines/1787991373_engineering.jpg', 'Specialized', 'Expertise', 'We provide recruitment solutions for engineering companies, manufacturing businesses, and technical service providers.', 'fa-solid fa-industry', 'Engineering Specialists', 'Engineering Managers', 'Mechanical Engineers', 'Technical Specialists', 'Technical Roles', 'Civil Engineers', 'Electrical Engineers', 'Mechanical Engineers', 'Manufacturing Engineers', 'Maintenance Engineers', 'Project Engineers', 'Technical Managers', 'Quality Engineers', 'Looking for your next Engineering professional?', 'Find experienced technical talent to support your organisation growth.', '+1 424 426 7394', 'Get In Touch', 'Call Us', '2026-08-29 07:03:38', '2026-08-29 03:16:13'),
(6, 'hospitality', 'Hospitality', 'Hospitality', 'fa-solid fa-hotel', 'Hospitality', 'Hospitality', 'Professionals', 'Helping hotels, restaurants, and hospitality groups find talented professionals who deliver outstanding customer experiences.', 'View Vacancies', '/jobs', 'Contact Us', '/contact-us', 'uploads/disciplines/1787991320_hospitality.jpg', 'Specialized', 'Expertise', 'We connect hospitality businesses with experienced professionals who understand service excellence.', 'fa-solid fa-utensils', 'Hospitality Specialists', 'Hotel Managers', 'Chefs', 'Service Staff', 'Hospitality Roles', 'Hotel Managers', 'Restaurant Managers', 'Chefs', 'Front Desk Staff', 'Guest Relations', 'Event Coordinators', 'Food & Beverage Managers', 'Hospitality Supervisors', 'Looking for your next Hospitality professional?', 'Build your team with skilled hospitality professionals.', '+1 424 426 7394', 'Get In Touch', 'Call Us', '2026-08-29 07:03:38', '2026-08-29 03:15:20'),
(7, 'transport-logistics', 'Transport', 'Transport & Logistics', 'fa-solid fa-truck', 'Transport & Logistics', 'Transport &', 'Logistics', 'Connecting logistics companies with skilled professionals who keep supply chains moving efficiently and reliably.', 'View Vacancies', '/jobs', 'Contact Us', '/contact-us', 'uploads/disciplines/1787991186_transport.jpg', 'Specialized', 'Expertise', 'Supporting transport and logistics companies with dependable workforce solutions.', 'fa-solid fa-truck-fast', 'Logistics Specialists', 'Drivers', 'Warehouse Staff', 'Operations Specialists', 'Logistics Roles', 'Delivery Drivers', 'Fleet Managers', 'Warehouse Operators', 'Logistics Coordinators', 'Supply Chain Specialists', 'Transport Managers', 'Distribution Staff', 'Operations Managers', 'Looking for your next Logistics professional?', 'Connect with reliable transport and logistics talent.', '+1 424 426 7394', 'Get In Touch', 'Call Us', '2026-08-29 07:03:38', '2026-08-29 03:13:06'),
(8, 'software-it', 'Technology', 'Software & IT', 'fa-solid fa-laptop-code', 'Software & IT', 'Software &', 'Technology', 'Connecting innovative companies with skilled software and technology professionals who drive digital transformation.', 'View Vacancies', '/jobs', 'Contact Us', '/contact-us', 'uploads/disciplines/1787990133_software.jpg', 'Specialized', 'Expertise', 'We provide technology recruitment solutions across software development, infrastructure, cloud, and cybersecurity.', 'fa-solid fa-code', 'Technology Specialists', 'Software Developers', 'Cloud Engineers', 'IT Specialists', 'Technology Roles', 'Software Engineers', 'DevOps Engineers', 'Cloud Architects', 'Cybersecurity Analysts', 'Data Analysts', 'QA Engineers', 'IT Support Specialists', 'System Administrators', 'Looking for your next Technology professional?', 'Find experienced IT talent to accelerate your digital growth.', '+1 424 426 7394', 'Get In Touch', 'Call Us', '2026-08-29 07:03:38', '2026-08-29 08:02:27');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `position` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `job_category` varchar(255) DEFAULT NULL,
  `job_type` varchar(255) DEFAULT NULL,
  `vacancy` varchar(50) DEFAULT NULL,
  `experience` varchar(50) DEFAULT NULL,
  `posted_date` date DEFAULT NULL,
  `last_date_to_apply` date DEFAULT NULL,
  `close_date` date DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `salary_from` varchar(50) DEFAULT NULL,
  `salary_to` varchar(50) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `education_level` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `long_description` longtext DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `allow_application` tinyint(1) NOT NULL DEFAULT 0,
  `approval_status` enum('pending','approved','rejected') DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `views` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `position`, `slug`, `job_category`, `job_type`, `vacancy`, `experience`, `posted_date`, `last_date_to_apply`, `close_date`, `gender`, `salary_from`, `salary_to`, `city`, `state`, `country`, `education_level`, `description`, `long_description`, `status`, `allow_application`, `approval_status`, `created_at`, `updated_at`, `views`) VALUES
(16, 'Registered Nurse', 'registered-nurse', NULL, 'Part Time', '5', 'Entry / Graduate', '2026-08-29', '2026-08-31', '2026-08-31', NULL, '60000', '85000', 'Los Angeles', 'California', 'USA', 'Bachelor of Science in Nursing (BSN)', '<p>Provide compassionate patient care, monitor health conditions, administer medications, and support healthcare teams in delivering quality medical services.</p>', '<p>We are looking for a skilled Registered Nurse to join our healthcare team. The ideal candidate will provide professional nursing care, maintain patient records, assist doctors during treatments, and ensure a safe and comfortable environment for patients. Responsibilities include monitoring patient health, administering medications, educating patients and families, and following healthcare standards and safety procedures.</p>', 1, 1, 'approved', '2026-08-29 13:29:26', '2026-09-05 03:06:17', 2),
(17, 'Software Engineer', 'software-engineer', 'Information Technology', 'Full Time', '3', '3 yr', '2026-08-29', '2026-09-30', '2026-10-01', 'Any', '80000', '120000', 'New York', 'New York', 'USA', 'Bachelor Degree in Computer Science', 'Develop scalable software solutions, write clean code, and collaborate with teams to build innovative digital products.', 'We are seeking a talented Software Engineer responsible for designing, developing, testing, and maintaining software applications. The candidate should have strong programming skills, problem solving abilities, and experience working with modern development practices.', 1, 1, 'approved', '2026-08-29 13:29:26', '2026-09-05 03:06:12', 2),
(18, 'Marketing Manager', 'marketing-manager', NULL, 'Part Time', '2', '4 yr', NULL, NULL, NULL, 'Male', '70000', '100000', 'Chicago', 'Illinois', 'USA', 'Bachelor Degree in Marketing', '<p>Lead marketing campaigns, develop strategies, and drive brand growth through creative and data driven solutions.</p>', '<p>We are hiring a Marketing Manager to lead our marketing initiatives and develop strategies that increase brand awareness and customer engagement. The ideal candidate will manage campaigns, analyze market trends, coordinate with creative teams, and improve business growth.</p>', 1, 1, 'approved', '2026-08-29 13:29:26', '2026-08-31 01:17:13', 0),
(19, 'Customer Support Specialist', 'customer-support-specialist', 'Customer Service', 'Full Time', '6', '1 yr', '2026-08-29', '2026-09-30', '2026-10-01', 'Any', '40000', '60000', 'Houston', 'Texas', 'USA', 'Bachelor Degree', 'Assist customers, resolve inquiries, and provide excellent support to ensure customer satisfaction.', 'We are looking for a Customer Support Specialist to handle customer requests, resolve issues, and maintain positive relationships with clients. The candidate will communicate with customers through different channels and provide accurate information.', 1, 1, 'approved', '2026-08-29 13:29:26', '2026-08-29 13:29:26', 0),
(20, 'Graphic Designer', 'graphic-designer', NULL, 'Remote Work', '2', '2 yr', NULL, NULL, NULL, NULL, '50000', '75000', 'Miami', 'Florida', 'USA', 'Diploma / Bachelor Degree in Design', '<p>Create engaging visual designs, marketing materials, and digital assets while maintaining brand consistency.</p>', '<p>We are seeking a creative Graphic Designer to develop high quality visual content for digital and print platforms. The candidate should have strong design skills, creativity, and attention to detail.</p>', 1, 1, 'approved', '2026-08-29 13:29:26', '2026-08-31 01:17:28', 0);

-- --------------------------------------------------------

--
-- Table structure for table `job_applications`
--

CREATE TABLE `job_applications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `job_id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `cv` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `full_name` varchar(800) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_applications`
--

INSERT INTO `job_applications` (`id`, `job_id`, `email`, `phone`, `city`, `cv`, `message`, `status`, `created_at`, `updated_at`, `full_name`) VALUES
(28, 16, 'benishk800@gmail.com', '03160109634', 'Karachi', 'job-cvs/uN5kiY3RjnP1LS8BvLVDGh4d8b2AXmmIwV46Iuv1.pdf', 'test', 0, '2026-08-29 08:30:13', '2026-08-29 08:30:13', 'benish nisar'),
(29, 18, 'weboctane@gmail.com', '03160109634', 'Karachi', 'job-cvs/ihKJMAVf3TUHxEYTlWnd4VbcP6BZoH7I1ZNhaYJL.pdf', 'test', 0, '2026-08-29 08:39:54', '2026-08-29 08:39:54', 'test order');

-- --------------------------------------------------------

--
-- Table structure for table `job_categories`
--

CREATE TABLE `job_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_types`
--

CREATE TABLE `job_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`id`, `email`, `token`, `created_at`) VALUES
(16, 'benishk800@gmail.com', 'U5aRO5GTHJgbou9F00RnEQs2MO09ipzBAl3WrFz5yRnvTvRzbzb4h7bq56WYbeGf', '2025-12-20 02:45:15'),
(17, 'benishk800@gmail.com', 'a2r70whSFbYbCvIlvH8MfxP5DjX6cg7PKKC8OftLBz5AwSY7UmqxA7Aeu1n1DKPJ', '2025-12-20 13:52:56');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role_name` varchar(800) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `role_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2025-12-15 19:19:57', '2025-12-15 19:19:57'),
(2, 'users', '2025-12-16 03:20:01', '2025-12-16 03:20:01'),
(3, 'company', '2026-03-09 14:08:54', '2026-03-09 14:08:54');

-- --------------------------------------------------------

--
-- Table structure for table `saved_jobs`
--

CREATE TABLE `saved_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `job_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `saved_jobs`
--

INSERT INTO `saved_jobs` (`id`, `user_id`, `job_id`, `created_at`, `updated_at`) VALUES
(3, 20, 4, '2026-03-10 16:02:01', '2026-03-10 16:02:01'),
(4, 20, 5, '2026-03-10 17:35:52', '2026-03-10 17:35:52'),
(5, 2, 4, '2026-04-09 14:47:50', '2026-04-09 14:47:50'),
(6, 2, 5, '2026-06-05 11:52:13', '2026-06-05 11:52:13');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `description` longtext DEFAULT NULL,
  `sort_order` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(566) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `slug`, `description`, `sort_order`, `is_active`, `created_at`, `updated_at`, `image`) VALUES
(1, 'income taxs', 'income-taxs', '<h2 class=\"\"><font face=\"Arial\" style=\"font-weight: normal;\">Tailored one-on-one therapy sessions designed to treat pain, restore movement, and strengthen your body.</font><span style=\"font-weight: normal; font-family: Arial;\">We create custom plans based on your condition, lifestyle, and goals.</span></h2><h2 class=\"\"><span style=\"font-weight: normal; font-family: Arial;\">We help with:</span></h2><h2 class=\"\"><font face=\"Arial\"><span style=\"white-space: normal; font-weight: normal;\"><span style=\"white-space:pre\">	</span>•<span style=\"white-space:pre\">	</span>Back &amp; neck pain</span></font></h2><h2 class=\"\"><font face=\"Arial\"><span style=\"white-space: normal; font-weight: normal;\"><span style=\"white-space:pre\">	</span>•<span style=\"white-space:pre\">	</span>Joint stiffness</span></font></h2><h2 class=\"\"><font face=\"Arial\"><span style=\"white-space: normal; font-weight: normal;\"><span style=\"white-space:pre\">	</span>•<span style=\"white-space:pre\">	</span>Posture issues</span></font></h2><h2 class=\"\"><font face=\"Arial\"><span style=\"white-space: normal; font-weight: normal;\"><span style=\"white-space:pre\">	</span>•<span style=\"white-space:pre\">	</span>Muscle imbalances</span></font></h2><h2 class=\"\"><font face=\"Arial\"><span style=\"white-space: normal; font-weight: normal;\"><span style=\"white-space:pre\">	</span>•<span style=\"white-space:pre\">	</span>Mobility problems</span></font></h2><div><br></div>', 1, 1, '2025-08-26 19:06:29', '2025-12-04 15:37:30', 'uploads/services/income-taxs-1764833738.webp'),
(2, 'Sale Tax (Law and Procedures)', 'sale-tax-law-and-procedures', '<h3 class=\"\"><span style=\"font-size: 24px; font-weight: 400;\"></span></h3><h3 class=\"\"><span style=\"font-size: 24px; font-weight: 400;\">Evidence-based techniques to reduce chronic or acute pain without relying heavily on medication.</span></h3><div><span style=\"font-size: 24px; font-family: Nunito, sans-serif;\">Includes:</span></div><h3 class=\"\"><span style=\"font-size: 24px; font-weight: 400; white-space: normal;\"><span style=\"white-space:pre\">	</span>•<span style=\"white-space:pre\">	</span>Manual therapy</span></h3><h3 class=\"\"><span style=\"font-size: 24px; font-weight: 400; white-space: normal;\"><span style=\"white-space:pre\">	</span>•<span style=\"white-space:pre\">	</span>Guided exercises</span></h3><h3 class=\"\"><span style=\"font-size: 24px; font-weight: 400; white-space: normal;\"><span style=\"white-space:pre\">	</span>•<span style=\"white-space:pre\">	</span>Heat/ice therapy plans</span></h3><h3 class=\"\"><span style=\"font-size: 24px; font-weight: 400; white-space: normal;\"><span style=\"white-space:pre\">	</span>•<span style=\"white-space:pre\">	</span>Pain-relief routines</span></h3><h3 class=\"\"><span style=\"font-size: 24px; font-weight: 400; white-space: normal;\"><span style=\"white-space:pre\">	</span>•<span style=\"white-space:pre\">	</span>Postural correction</span></h3>', 2, 1, '2025-08-26 20:34:10', '2025-12-04 15:39:59', 'uploads/services/sale-tax-law-and-procedures-1764833999.png'),
(3, 'Post-Injury Rehabilitation', 'post-injury-rehabilitation', '<h3 class=\"\"><span style=\"font-size: 24px; font-weight: 400;\">Recover stronger after accidents, sprains, muscle tears, or sports injuries.</span></h3><h3 class=\"\"><span style=\"font-size: 24px; font-weight: 400;\">We assist your healing process and help prevent future injuries.</span></h3><h3 class=\"\"><span style=\"font-size: 24px; font-weight: 400;\"><br></span></h3><h3 class=\"\"><span style=\"font-size: 24px; font-weight: 400;\">Ideal for:</span></h3><h3 class=\"\"><span style=\"font-size: 24px; font-weight: 400; white-space: normal;\"><span style=\"white-space:pre\">	</span>•<span style=\"white-space:pre\">	</span>Sports injuries</span></h3><h3 class=\"\"><span style=\"font-size: 24px; font-weight: 400; white-space: normal;\"><span style=\"white-space:pre\">	</span>•<span style=\"white-space:pre\">	</span>Strains &amp; sprains</span></h3><h3 class=\"\"><span style=\"font-size: 24px; font-weight: 400; white-space: normal;\"><span style=\"white-space:pre\">	</span>•<span style=\"white-space:pre\">	</span>Tendon issues</span></h3><h3 class=\"\"><span style=\"font-size: 24px; font-weight: 400; white-space: normal;\"><span style=\"white-space:pre\">	</span>•<span style=\"white-space:pre\">	</span>Muscle fatigue recovery</span></h3><div><br></div>', 3, 1, '2025-08-29 13:15:19', '2025-12-04 15:41:37', 'uploads/services/assitance-in-book-keeping-1756553655.jpg'),
(4, 'Post-Surgical Rehabilitation', 'post-surgical-rehabilitation', '<h3 class=\"\"><span style=\"font-size: 24px; font-weight: normal;\">Supportive and medically-guided rehab following surgeries such as:</span></h3><h3 class=\"\"><span style=\"font-size: 24px; font-weight: normal;\">ACL repair, joint replacement, spinal surgery, fractures, and more.</span></h3><h3 class=\"\"><span style=\"font-size: 24px; font-weight: normal;\"><br></span></h3><h3 class=\"\"><span style=\"font-size: 24px; font-weight: normal;\">Focus areas:</span></h3><h3 class=\"\"><span style=\"font-size: 24px; white-space: normal; font-weight: normal;\"><span style=\"white-space:pre\">	</span>•<span style=\"white-space:pre\">	</span>Regaining strength</span></h3><h3 class=\"\"><span style=\"font-size: 24px; white-space: normal; font-weight: normal;\"><span style=\"white-space:pre\">	</span>•<span style=\"white-space:pre\">	</span>Improving mobility</span></h3><h3 class=\"\"><span style=\"font-size: 24px; white-space: normal; font-weight: normal;\"><span style=\"white-space:pre\">	</span>•<span style=\"white-space:pre\">	</span>Speeding up healing</span></h3><h3 class=\"\"><span style=\"font-size: 24px; white-space: normal; font-weight: normal;\"><span style=\"white-space:pre\">	</span>•<span style=\"white-space:pre\">	</span>Preventing complications</span></h3><h3 class=\"\"><br></h3>', 4, 1, '2025-08-29 13:17:29', '2025-12-04 15:42:06', 'uploads/services/company-law-law-and-procedures-1756553666.jpg'),
(5, 'At-Home Physiotherapy Sessions', 'at-home-physiotherapy-sessions', '<h3 class=\"\"><span style=\"font-size: 24px; font-weight: normal;\">Skip the clinic — our professionals guide you from the comfort of your home.</span></h3><h3 class=\"\"><span style=\"font-size: 24px; font-weight: normal;\">Perfect for seniors, busy individuals, or anyone who prefers personalized care at home.</span></h3><div><br></div>', 5, 1, '2025-08-29 13:20:56', '2025-12-04 15:42:42', 'uploads/services/trademark-law-and-procedures-1756553681.jpg'),
(6, 'Online / Virtual Rehabilitation', 'online-virtual-rehabilitation', '<h3 class=\"\"><span style=\"font-size: 24px; font-weight: normal;\">Convenient video-based rehab sessions supported by our app and tools.</span></h3><h3 class=\"\"><span style=\"font-size: 24px; font-weight: normal;\">You get real-time guidance, progress tracking, and exercise monitoring.</span></h3><div><br></div>', 6, 1, '2025-08-29 13:23:20', '2025-12-04 15:43:21', 'uploads/services/copyrights-law-and-procedures-1756553692.jpg'),
(7, 'Preventive & Wellness Programs', 'preventive-wellness-programs', '<p>Stay strong, mobile, and healthy with routine rehab + mobility training programs.</p><p><br></p><p>Includes:</p><p><span style=\"white-space: normal;\"><span style=\"white-space:pre\">	</span>•<span style=\"white-space:pre\">	</span>Flexibility & mobility routines</span></p><p><span style=\"white-space: normal;\"><span style=\"white-space:pre\">	</span>•<span style=\"white-space:pre\">	</span>Strength & stability training</span></p><p><span style=\"white-space: normal;\"><span style=\"white-space:pre\">	</span>•<span style=\"white-space:pre\">	</span>Desk-job posture programs</span></p><p><span style=\"white-space: normal;\"><span style=\"white-space:pre\">	</span>•<span style=\"white-space:pre\">	</span>Home workout & recovery plans</span></p><div><br></div>', 7, 1, '2025-12-04 15:44:16', '2025-12-04 15:44:16', 'uploads/services/preventive-wellness-programs-1764834256.jpg'),
(8, 'Chronic Condition Management', 'chronic-condition-management', '<p>Long-term physical conditions require long-term support — we help you manage them effectively.</p><p><br></p><p>We support:</p><p><span style=\"white-space: normal;\"><span style=\"white-space:pre\">	</span>•<span style=\"white-space:pre\">	</span>Arthritis</span></p><p><span style=\"white-space: normal;\"><span style=\"white-space:pre\">	</span>•<span style=\"white-space:pre\">	</span>Sciatica</span></p><p><span style=\"white-space: normal;\"><span style=\"white-space:pre\">	</span>•<span style=\"white-space:pre\">	</span>Chronic back pain</span></p><p><span style=\"white-space: normal;\"><span style=\"white-space:pre\">	</span>•<span style=\"white-space:pre\">	</span>Shoulder & knee issues</span></p><p><span style=\"white-space: normal;\"><span style=\"white-space:pre\">	</span>•<span style=\"white-space:pre\">	</span>Neck tension & migraines (MSK-related)</span></p><div><br></div>', 8, 1, '2025-12-04 15:44:50', '2025-12-04 15:44:50', 'uploads/services/chronic-condition-management-1764834290.png'),
(9, 'Corporate & Workplace Wellness', 'corporate-workplace-wellness', '<p>Custom solutions for companies to reduce workplace injuries and boost employee well-being.</p><p><br></p><p>Services include:</p><p><span style=\"white-space: normal;\"><span style=\"white-space:pre\">	</span>•<span style=\"white-space:pre\">	</span>Ergonomic assessments</span></p><p><span style=\"white-space: normal;\"><span style=\"white-space:pre\">	</span>•<span style=\"white-space:pre\">	</span>Posture workshops</span></p><p><span style=\"white-space: normal;\"><span style=\"white-space:pre\">	</span>•<span style=\"white-space:pre\">	</span>Therapy sessions for teams</span></p><div><br></div>', 10, 1, '2025-12-04 15:45:40', '2025-12-04 15:45:40', 'uploads/services/corporate-workplace-wellness-1764834340.png'),
(10, 'Pediatric Physiotherapy', 'pediatric-physiotherapy', '<p>Gentle, age-appropriate therapy for children dealing with mobility delays, injuries, or posture issues.</p>', 10, 1, '2025-12-04 15:46:14', '2025-12-04 15:46:14', 'uploads/services/pediatric-physiotherapy-1764834374.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(800) DEFAULT NULL,
  `lastname` varchar(800) NOT NULL,
  `email` varchar(500) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `mobile_phone` varchar(50) DEFAULT NULL,
  `password` varchar(500) DEFAULT NULL,
  `gender` varchar(500) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `city` varchar(500) DEFAULT NULL,
  `country` varchar(500) DEFAULT NULL,
  `zip_code` varchar(500) DEFAULT NULL,
  `address_line1` varchar(500) DEFAULT NULL,
  `address_line2` varchar(500) DEFAULT NULL,
  `role_id` int(11) NOT NULL,
  `organization` varchar(500) DEFAULT NULL,
  `profile_img` varchar(500) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `phone`, `mobile_phone`, `password`, `gender`, `date_of_birth`, `city`, `country`, `zip_code`, `address_line1`, `address_line2`, `role_id`, `organization`, `profile_img`, `created_at`, `updated_at`) VALUES
(2, 'Sparrow Sharp', 'Sharp', 'info@sparrowsharp.com', '+1 424 426 7394', '+1 424 426 7394', '$2y$10$4E0Eg/rjYPU8v1k7wIBzSuauk64jK/HmsbgMYMhukM7MtJaX5POc6', 'male', '2009-06-29', 'karachi', 'Pakistan', '90013', 'j 3/4 Pak jumhuria colony P.N.S shifa road karachi near DSRA clinic', 'j 3/4 Pak jumhuria colony P.N.S shifa road karachi near DSRA clinic', 1, 'info@sparrowsharp.com', 'assets/profile_images/1787989924_pngtree-man-avatar-image-for-profile-png-image_13001877.png', '2025-04-03 06:24:10', '2026-08-29 02:52:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_companies_user_id` (`user_id`);

--
-- Indexes for table `conditions`
--
ALTER TABLE `conditions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `idx_conditions_title` (`title`),
  ADD KEY `idx_conditions_active` (`is_active`),
  ADD KEY `idx_conditions_category_id` (`condition_category_id`),
  ADD KEY `idx_conditions_subcategory_id` (`condition_subcategory_id`);

--
-- Indexes for table `condition_categories`
--
ALTER TABLE `condition_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `condition_subcategories`
--
ALTER TABLE `condition_subcategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `condition_subcategories_condition_category_id_index` (`condition_category_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_settings`
--
ALTER TABLE `contact_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `corporate`
--
ALTER TABLE `corporate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `disciplines`
--
ALTER TABLE `disciplines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `jobs_slug_unique` (`slug`);

--
-- Indexes for table `job_applications`
--
ALTER TABLE `job_applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_applications_job_id_index` (`job_id`);

--
-- Indexes for table `job_categories`
--
ALTER TABLE `job_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `job_categories_name_unique` (`name`);

--
-- Indexes for table `job_types`
--
ALTER TABLE `job_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `job_types_name_unique` (`name`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saved_jobs`
--
ALTER TABLE `saved_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_user_job` (`user_id`,`job_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `services_slug_unique` (`slug`),
  ADD KEY `idx_services_active_sort` (`is_active`,`sort_order`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `conditions`
--
ALTER TABLE `conditions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `condition_categories`
--
ALTER TABLE `condition_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `condition_subcategories`
--
ALTER TABLE `condition_subcategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=199;

--
-- AUTO_INCREMENT for table `contact_settings`
--
ALTER TABLE `contact_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `corporate`
--
ALTER TABLE `corporate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `disciplines`
--
ALTER TABLE `disciplines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `job_applications`
--
ALTER TABLE `job_applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `job_categories`
--
ALTER TABLE `job_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_types`
--
ALTER TABLE `job_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `saved_jobs`
--
ALTER TABLE `saved_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `companies`
--
ALTER TABLE `companies`
  ADD CONSTRAINT `fk_companies_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `condition_subcategories`
--
ALTER TABLE `condition_subcategories`
  ADD CONSTRAINT `condition_subcategories_condition_category_id_fk` FOREIGN KEY (`condition_category_id`) REFERENCES `condition_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `job_applications`
--
ALTER TABLE `job_applications`
  ADD CONSTRAINT `job_applications_job_id_foreign` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
