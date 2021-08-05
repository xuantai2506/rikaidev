-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th8 05, 2021 lúc 04:19 PM
-- Phiên bản máy phục vụ: 10.2.37-MariaDB
-- Phiên bản PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `rikaivn_vi`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lovaweb_article`
--

CREATE TABLE `lovaweb_article` (
  `article_id` int(11) NOT NULL,
  `article_menu_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `keywords` text DEFAULT NULL,
  `img` varchar(255) DEFAULT 'no',
  `img_desktop` varchar(255) DEFAULT NULL,
  `img_mobile` varchar(255) DEFAULT NULL,
  `img_note` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `price` float DEFAULT 0,
  `block` int(11) DEFAULT 0,
  `flat` int(11) DEFAULT 0,
  `open_sale` int(11) DEFAULT 0,
  `type` int(11) DEFAULT 0,
  `upload_id` bigint(20) DEFAULT 0,
  `comment` text CHARACTER SET utf8mb4 DEFAULT NULL,
  `content` longtext CHARACTER SET utf8mb4 DEFAULT NULL,
  `is_active` int(1) DEFAULT 1,
  `hot` int(1) DEFAULT 0,
  `views` bigint(20) DEFAULT 1,
  `created_time` int(11) DEFAULT 0,
  `modified_time` int(11) DEFAULT 0,
  `user_id` int(11) DEFAULT 0,
  `link` longtext CHARACTER SET utf8mb4 DEFAULT NULL,
  `linhvuc` text DEFAULT NULL,
  `tamnhin` text DEFAULT NULL,
  `thanhtich` text DEFAULT NULL,
  `doitac` text DEFAULT NULL,
  `work_point` int(11) NOT NULL DEFAULT 0,
  `jp_proficiency` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `lovaweb_article`
--

INSERT INTO `lovaweb_article` (`article_id`, `article_menu_id`, `name`, `slug`, `title`, `description`, `keywords`, `img`, `img_desktop`, `img_mobile`, `img_note`, `address`, `price`, `block`, `flat`, `open_sale`, `type`, `upload_id`, `comment`, `content`, `is_active`, `hot`, `views`, `created_time`, `modified_time`, `user_id`, `link`, `linhvuc`, `tamnhin`, `thanhtich`, `doitac`, `work_point`, `jp_proficiency`) VALUES
(2011, 800, 'Data scipntist - Phân tích dữ liệu', 'data-scipntist-phan-tich-du-lieu', '', '', '', 'data-scipntist-phan-tich-du-lieu-1627987706.png', NULL, NULL, '', NULL, 500, 0, 0, 0, 0, 3523, '01/07~ 30/07/2021', '<div class=\"img_job_detail\"><img alt=\"\" src=\"../images/jobbanner/job-detail.png\" /></div>\r\n\r\n<p><strong><span style=\"color:#0086d1\">1. Nội dung c&ocirc;ng việc:</span></strong></p>\r\n\r\n<p>- Thiết kế v&agrave; ph&aacute;t triển dịch vụ</p>\r\n\r\n<p>- Thiết kế lược đồ cơ sở dữ liệu</p>\r\n\r\n<p>- Viết m&atilde; code đẹp v&agrave; c&oacute; thể bảo tr&igrave;</p>\r\n\r\n<p>- Thảo luận với nh&oacute;m về hệ thống/ kiến tr&uacute;c của phần mềm</p>\r\n\r\n<p>- Đ&agrave;o tạo kĩ sư phần mềm ở tr&igrave;nh độ sơ cấp, trung cấp</p>\r\n\r\n<hr />\r\n<p><strong><span style=\"color:#0086d1\">2. Y&ecirc;u cầu:</span></strong></p>\r\n\r\n<p><strong>* Điều kiện bắt buộc:</strong></p>\r\n\r\n<p>- C&oacute; tr&ecirc;n 2 năm kinh nghiệm với Backend ( Ruby, Rails)</p>\r\n\r\n<p>- C&oacute; kinh nghiệp với Ruby ở Rails</p>\r\n\r\n<p>- C&oacute; kin nghiệm với MySQL hoặc PostgreSQL</p>\r\n\r\n<p>- C&oacute; hứng th&uacute; trong việc học ng&ocirc;n ngữ lập tr&igrave;nh mới v&agrave; kỹ thuật</p>\r\n\r\n<p>- C&oacute; khả năng giao tiếp bằng tiếng anh</p>\r\n\r\n<p><strong>* Điều kiện khuyến kh&iacute;ch:</strong></p>\r\n\r\n<p>- Đ&atilde; quen với unit test ở Rails</p>\r\n\r\n<p>- C&oacute; kinh nghiệm với sự ph&aacute;t triển frontend (ReactJS, VueJS, jQuery)</p>\r\n\r\n<p>- C&oacute; kinh nghiệm với dịch vụ web Amazon&gt;</p>\r\n\r\n<hr />\r\n<p><strong><span style=\"color:#0086d1\">3. Chế độ &amp; quyền lợi:</span></strong></p>\r\n\r\n<p>- Bảo hiểm</p>\r\n\r\n<p>- Chăm s&oacute;c sức khỏe định k&igrave;</p>\r\n\r\n<p>- Tăng lương: 2 lần /năm</p>\r\n\r\n<p>- Trợ cấp chi ph&iacute; đi lại</p>\r\n\r\n<p>- Hỗ trợ tiền nh&agrave;</p>\r\n\r\n<p>- Thưởng 2 th&aacute;ng lương</p>\r\n\r\n<hr />', 1, 1, 19, 1627985820, 1628046531, 25, '', '', '', '', 'my sql,microsoft', 11, 3),
(2012, 801, 'Node JS - Lập trình mobile', 'node-js-lap-trinh-mobile', '', '', '', 'node-js-lap-trinh-mobile-1628051559.png', NULL, NULL, '', NULL, 300, 0, 0, 0, 0, 3535, '01/07~ 30/07/2021', '', 1, 1, 4, 1628051520, 1628063187, 25, '', '', '', '', '', 11, 1),
(2013, 800, 'Lập trình viên C#', 'lap-trinh-vien-c', '', '', '', 'lap-trinh-vien-c-1628064177.png', NULL, NULL, '', NULL, 400, 0, 0, 0, 0, 3536, '01/07~ 30/07/2021', '<p><strong>1. Nội dung c&ocirc;ng việc:</strong></p>\r\n\r\n<p>- Thiết kế v&agrave; ph&aacute;t triển dịch vụ</p>\r\n\r\n<p>- Thiết kế lược đồ cơ sở dữ liệu</p>\r\n\r\n<p>- Viết m&atilde; code đẹp v&agrave; c&oacute; thể bảo tr&igrave;</p>\r\n\r\n<p>- Thảo luận với nh&oacute;m về hệ thống/ kiến tr&uacute;c của phần mềm</p>\r\n\r\n<p>- Đ&agrave;o tạo kĩ sư phần mềm ở tr&igrave;nh độ sơ cấp, trung cấp</p>\r\n\r\n<hr />\r\n<p><strong>2. Y&ecirc;u cầu:</strong></p>\r\n\r\n<p><strong>* Điều kiện bắt buộc:</strong></p>\r\n\r\n<p>- C&oacute; tr&ecirc;n 2 năm kinh nghiệm với Backend ( Ruby, Rails)</p>\r\n\r\n<p>- C&oacute; kinh nghiệp với Ruby ở Rails</p>\r\n\r\n<p>- C&oacute; kin nghiệm với MySQL hoặc PostgreSQL</p>\r\n\r\n<p>- C&oacute; hứng th&uacute; trong việc học ng&ocirc;n ngữ lập tr&igrave;nh mới v&agrave; kỹ thuật</p>\r\n\r\n<p>- C&oacute; khả năng giao tiếp bằng tiếng anh</p>\r\n\r\n<p><strong>* Điều kiện khuyến kh&iacute;ch:</strong></p>\r\n\r\n<p>- Đ&atilde; quen với unit test ở Rails</p>\r\n\r\n<p>- C&oacute; kinh nghiệm với sự ph&aacute;t triển frontend (ReactJS, VueJS, jQuery)</p>\r\n\r\n<p>- C&oacute; kinh nghiệm với dịch vụ web Amazon</p>\r\n\r\n<hr />\r\n<p><strong>3. Chế độ &amp; quyền lợi:</strong></p>\r\n\r\n<p>- Bảo hiểm</p>\r\n\r\n<p>- Chăm s&oacute;c sức khỏe định k&igrave;</p>\r\n\r\n<p>- Tăng lương: 2 lần /năm</p>\r\n\r\n<p>- Trợ cấp chi ph&iacute; đi lại</p>\r\n\r\n<p>- Hỗ trợ tiền nh&agrave;</p>\r\n\r\n<p>- Thưởng 2 th&aacute;ng lương</p>\r\n', 1, 1, 8, 1628064000, 1628065947, 25, '', '', '', '', '', 15, 3),
(2014, 800, 'Lập trình viên REACT', 'lap-trinh-vien-react', '', '', '', 'lap-trinh-vien-react-1628064227.png', NULL, NULL, '', NULL, 600, 0, 0, 0, 0, 3537, '01/07~ 30/07/2021', '<p><strong>1. Nội dung c&ocirc;ng việc:</strong></p>\r\n\r\n<p>- Thiết kế v&agrave; ph&aacute;t triển dịch vụ</p>\r\n\r\n<p>- Thiết kế lược đồ cơ sở dữ liệu</p>\r\n\r\n<p>- Viết m&atilde; code đẹp v&agrave; c&oacute; thể bảo tr&igrave;</p>\r\n\r\n<p>- Thảo luận với nh&oacute;m về hệ thống/ kiến tr&uacute;c của phần mềm</p>\r\n\r\n<p>- Đ&agrave;o tạo kĩ sư phần mềm ở tr&igrave;nh độ sơ cấp, trung cấp</p>\r\n\r\n<hr />\r\n<p><strong>2. Y&ecirc;u cầu:</strong></p>\r\n\r\n<p><strong>* Điều kiện bắt buộc:</strong></p>\r\n\r\n<p>- C&oacute; tr&ecirc;n 2 năm kinh nghiệm với Backend ( Ruby, Rails)</p>\r\n\r\n<p>- C&oacute; kinh nghiệp với Ruby ở Rails</p>\r\n\r\n<p>- C&oacute; kin nghiệm với MySQL hoặc PostgreSQL</p>\r\n\r\n<p>- C&oacute; hứng th&uacute; trong việc học ng&ocirc;n ngữ lập tr&igrave;nh mới v&agrave; kỹ thuật</p>\r\n\r\n<p>- C&oacute; khả năng giao tiếp bằng tiếng anh</p>\r\n\r\n<p><strong>* Điều kiện khuyến kh&iacute;ch:</strong></p>\r\n\r\n<p>- Đ&atilde; quen với unit test ở Rails</p>\r\n\r\n<p>- C&oacute; kinh nghiệm với sự ph&aacute;t triển frontend (ReactJS, VueJS, jQuery)</p>\r\n\r\n<p>- C&oacute; kinh nghiệm với dịch vụ web Amazon&gt;</p>\r\n\r\n<hr />\r\n<p><strong>3. Chế độ &amp; quyền lợi:</strong></p>\r\n\r\n<p>- Bảo hiểm</p>\r\n\r\n<p>- Chăm s&oacute;c sức khỏe định k&igrave;</p>\r\n\r\n<p>- Tăng lương: 2 lần /năm</p>\r\n\r\n<p>- Trợ cấp chi ph&iacute; đi lại</p>\r\n\r\n<p>- Hỗ trợ tiền nh&agrave;</p>\r\n\r\n<p>- Thưởng 2 th&aacute;ng lương</p>\r\n', 1, 1, 2, 1628064180, 1628065917, 25, '', '', '', '', '', 14, 3),
(2015, 800, 'Node JS - Lập trình app mobile ', 'node-js-lap-trinh-app-mobile', '', '', '', 'node-js-lap-trinh-mobile-3-1628064272.png', NULL, NULL, '', NULL, 700, 0, 0, 0, 0, 3538, '01/07~ 30/07/2021', '<p><strong>1. Nội dung c&ocirc;ng việc:</strong></p>\r\n\r\n<p>- Thiết kế v&agrave; ph&aacute;t triển dịch vụ</p>\r\n\r\n<p>- Thiết kế lược đồ cơ sở dữ liệu</p>\r\n\r\n<p>- Viết m&atilde; code đẹp v&agrave; c&oacute; thể bảo tr&igrave;</p>\r\n\r\n<p>- Thảo luận với nh&oacute;m về hệ thống/ kiến tr&uacute;c của phần mềm</p>\r\n\r\n<p>- Đ&agrave;o tạo kĩ sư phần mềm ở tr&igrave;nh độ sơ cấp, trung cấp</p>\r\n\r\n<hr />\r\n<p><strong>2. Y&ecirc;u cầu:</strong></p>\r\n\r\n<p><strong>* Điều kiện bắt buộc:</strong></p>\r\n\r\n<p>- C&oacute; tr&ecirc;n 2 năm kinh nghiệm với Backend ( Ruby, Rails)</p>\r\n\r\n<p>- C&oacute; kinh nghiệp với Ruby ở Rails</p>\r\n\r\n<p>- C&oacute; kin nghiệm với MySQL hoặc PostgreSQL</p>\r\n\r\n<p>- C&oacute; hứng th&uacute; trong việc học ng&ocirc;n ngữ lập tr&igrave;nh mới v&agrave; kỹ thuật</p>\r\n\r\n<p>- C&oacute; khả năng giao tiếp bằng tiếng anh</p>\r\n\r\n<p><strong>* Điều kiện khuyến kh&iacute;ch:</strong></p>\r\n\r\n<p>- Đ&atilde; quen với unit test ở Rails</p>\r\n\r\n<p>- C&oacute; kinh nghiệm với sự ph&aacute;t triển frontend (ReactJS, VueJS, jQuery)</p>\r\n\r\n<p>- C&oacute; kinh nghiệm với dịch vụ web Amazon&gt;</p>\r\n\r\n<hr />\r\n<p><strong>3. Chế độ &amp; quyền lợi:</strong></p>\r\n\r\n<p>- Bảo hiểm</p>\r\n\r\n<p>- Chăm s&oacute;c sức khỏe định k&igrave;</p>\r\n\r\n<p>- Tăng lương: 2 lần /năm</p>\r\n\r\n<p>- Trợ cấp chi ph&iacute; đi lại</p>\r\n\r\n<p>- Hỗ trợ tiền nh&agrave;</p>\r\n\r\n<p>- Thưởng 2 th&aacute;ng lương</p>\r\n', 1, 1, 3, 1628064180, 1628065866, 25, '', '', '', '', '', 11, 1),
(2016, 800, 'My SQL Data scipt - Phân tích dữ liệu', 'my-sql-data-scipt-phan-tich-du-lieu', '', '', '', 'my-sql-data-scipt-phan-tich-du-lieu-1628064346.png', NULL, NULL, '', NULL, 800, 0, 0, 0, 0, 3539, '01/07~ 30/07/2021', '<p><img alt=\"\" src=\"https://rikaidev.jetart.com.vn/images/jobbanner/job-detail.png\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>1. Nội dung c&ocirc;ng việc:</strong></p>\r\n\r\n<p>- Thiết kế v&agrave; ph&aacute;t triển dịch vụ</p>\r\n\r\n<p>- Thiết kế lược đồ cơ sở dữ liệu</p>\r\n\r\n<p>- Viết m&atilde; code đẹp v&agrave; c&oacute; thể bảo tr&igrave;</p>\r\n\r\n<p>- Thảo luận với nh&oacute;m về hệ thống/ kiến tr&uacute;c của phần mềm</p>\r\n\r\n<p>- Đ&agrave;o tạo kĩ sư phần mềm ở tr&igrave;nh độ sơ cấp, trung cấp</p>\r\n\r\n<hr />\r\n<p><strong>2. Y&ecirc;u cầu:</strong></p>\r\n\r\n<p><strong>* Điều kiện bắt buộc:</strong></p>\r\n\r\n<p>- C&oacute; tr&ecirc;n 2 năm kinh nghiệm với Backend ( Ruby, Rails)</p>\r\n\r\n<p>- C&oacute; kinh nghiệp với Ruby ở Rails</p>\r\n\r\n<p>- C&oacute; kin nghiệm với MySQL hoặc PostgreSQL</p>\r\n\r\n<p>- C&oacute; hứng th&uacute; trong việc học ng&ocirc;n ngữ lập tr&igrave;nh mới v&agrave; kỹ thuật</p>\r\n\r\n<p>- C&oacute; khả năng giao tiếp bằng tiếng anh</p>\r\n\r\n<p><strong>* Điều kiện khuyến kh&iacute;ch:</strong></p>\r\n\r\n<p>- Đ&atilde; quen với unit test ở Rails</p>\r\n\r\n<p>- C&oacute; kinh nghiệm với sự ph&aacute;t triển frontend (ReactJS, VueJS, jQuery)</p>\r\n\r\n<p>- C&oacute; kinh nghiệm với dịch vụ web Amazon&gt;</p>\r\n\r\n<hr />\r\n<p><strong>3. Chế độ &amp; quyền lợi:</strong></p>\r\n\r\n<p>- Bảo hiểm</p>\r\n\r\n<p>- Chăm s&oacute;c sức khỏe định k&igrave;</p>\r\n\r\n<p>- Tăng lương: 2 lần /năm</p>\r\n\r\n<p>- Trợ cấp chi ph&iacute; đi lại</p>\r\n\r\n<p>- Hỗ trợ tiền nh&agrave;</p>\r\n\r\n<p>- Thưởng 2 th&aacute;ng lương</p>\r\n', 1, 1, 7, 1628064240, 1628066080, 25, '', '', '', '', '', 13, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lovaweb_article_menu`
--

CREATE TABLE `lovaweb_article_menu` (
  `article_menu_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `keywords` text DEFAULT NULL,
  `parent` int(11) DEFAULT 0,
  `sort` int(11) DEFAULT 1,
  `comment` text CHARACTER SET utf8mb4 DEFAULT NULL,
  `icon` text DEFAULT NULL,
  `plus` varchar(255) DEFAULT NULL,
  `is_active` int(1) DEFAULT 1,
  `hot` int(1) DEFAULT 0,
  `img` varchar(255) DEFAULT 'no',
  `created_time` int(11) DEFAULT 0,
  `modified_time` int(11) DEFAULT 0,
  `user_id` int(11) DEFAULT 0,
  `img1` varchar(255) DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `lovaweb_article_menu`
--

INSERT INTO `lovaweb_article_menu` (`article_menu_id`, `category_id`, `name`, `slug`, `title`, `description`, `keywords`, `parent`, `sort`, `comment`, `icon`, `plus`, `is_active`, `hot`, `img`, `created_time`, `modified_time`, `user_id`, `img1`) VALUES
(800, 1, 'Software Engineer', 'software-engineer', '', '', '', 0, 1, '', '', '', 1, 0, 'software-engineer-1628044966.png', 1627984618, 1628044966, 25, 'no'),
(801, 1, 'Mobile Enginee', 'mobile-enginee', '', '', '', 0, 2, '', '', '', 1, 0, 'mobile-enginee-1628045020.png', 1627984628, 1628045020, 25, 'no'),
(802, 1, 'Web Engineer', 'web-engineer', '', '', '', 0, 3, '', '', '', 1, 0, 'web-engineer-1628045029.png', 1627984637, 1628045029, 25, 'no'),
(803, 1, 'AI Engineer', 'ai-engineer', '', '', '', 0, 4, '', '', '', 1, 0, 'ai-engineer-1628045040.png', 1627984646, 1628045040, 25, 'no'),
(804, 1, 'Tester Engineer', 'tester-engineer', '', '', '', 0, 5, '', '', '', 1, 0, 'tester-engineer-1628045049.png', 1627984656, 1628045049, 25, 'no'),
(805, 7, 'Hỗ trợ hoàn thiện CV', 'ho-tro-hoan-thien-cv', '', '', '', 0, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing', '', '', 1, 0, 'ho-tro-hoan-thien-cv-1628048885.png', 1628048885, 1628049050, 25, 'rczckj22-805-ho-tro-hoan-thien-cv.png'),
(806, 7, 'Hỗ trợ sau khi onboard', 'ho-tro-sau-khi-onboard', '', '', '', 0, 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing', '', '', 1, 0, 'ho-tro-sau-khi-onboard-1628048915.png', 1628048898, 1628049040, 25, 'hj1pmptw-806-ho-tro-sau-khi-onboard.png'),
(807, 7, 'Tư vấn miễn phí', 'tu-van-mien-phi', '', '', '', 0, 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing', '', '', 1, 0, 'tu-van-mien-phi-1628048935.png', 1628048935, 1628049057, 25, '085wwfrq-807-tu-van-mien-phi.png'),
(808, 7, 'Doanh nghiệp chất lượng', 'doanh-nghiep-chat-luong', '', '', '', 0, 4, 'Lorem ipsum dolor sit amet, consectetur adipiscing', '', '', 1, 0, 'oanh-nghiep-chat-luong-1628048948.png', 1628048948, 1628049065, 25, 'pn4a235a-808-doanh-nghiep-chat-luong.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lovaweb_calendar`
--

CREATE TABLE `lovaweb_calendar` (
  `calendar_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_event` int(11) DEFAULT NULL,
  `comment` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lovaweb_category`
--

CREATE TABLE `lovaweb_category` (
  `category_id` int(11) NOT NULL,
  `type_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(30) DEFAULT NULL,
  `plus` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `keywords` text DEFAULT NULL,
  `comment` text CHARACTER SET utf8mb4 DEFAULT NULL,
  `is_active` int(1) DEFAULT 1,
  `hot` int(1) DEFAULT 0,
  `sort` int(11) DEFAULT 1,
  `menu_main` int(1) DEFAULT 0,
  `sort_hide` int(11) DEFAULT 1,
  `menu_sm` int(1) DEFAULT 0,
  `img` varchar(255) DEFAULT 'no',
  `icon` varchar(255) DEFAULT NULL,
  `created_time` int(11) DEFAULT 0,
  `modified_time` int(11) DEFAULT 0,
  `user_id` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `lovaweb_category`
--

INSERT INTO `lovaweb_category` (`category_id`, `type_id`, `name`, `slug`, `plus`, `title`, `description`, `keywords`, `comment`, `is_active`, `hot`, `sort`, `menu_main`, `sort_hide`, `menu_sm`, `img`, `icon`, `created_time`, `modified_time`, `user_id`) VALUES
(1, 1, 'Danh sách việc làm', 'all-job', '', '', '', '', 'Tư vấn chuyển việc miễn phí', 1, 0, 1, 1, 1, 1, 'danh-sach-viec-lam-1628051482.png', 'Việc làm mới nhất', 0, 1628051482, 25),
(2, 15, 'Trình độ tiếng Nhật', 'japanese-level', '', '', '', '', '', 1, 0, 1, 0, 1, 0, 'no', '', 0, 1627982427, 25),
(3, 15, 'Địa điểm làm việc', 'work-point', '', '', '', '', '', 1, 0, 4, 0, 4, 0, 'no', '', 0, 1627983587, 25),
(4, 15, 'Thu nhập', 'earnings', NULL, NULL, NULL, NULL, NULL, 1, 0, 2, 0, 2, 0, 'no', NULL, 0, 1627983588, 25),
(5, 15, 'Thời điểm chuyển việc dự kiến', 'time-change-job', NULL, NULL, NULL, NULL, NULL, 1, 0, 3, 0, 3, 0, 'no', NULL, 0, 1627983589, 25),
(6, 1, 'Liên hệ', 'contact', '', '', '', '', 'Liên hệ với chúng tôi', 1, 0, 3, 1, 3, 1, 'lien-he-1628064444.png', '', 0, 1628064462, 25),
(7, 1, 'Tại sao chọn chúng tôi', 'why-choose', NULL, NULL, NULL, NULL, NULL, 1, 0, 2, 0, 2, 1, 'no', NULL, 0, 1627983590, 25),
(8, 1, 'Điều khoản sử dụng thông tin cá nhân', 'terms-use', '', '', '', '', '<p>Ch&iacute;nh s&aacute;ch bảo mật n&agrave;y m&ocirc; tả c&aacute;ch dữ liệu của bạn được thu thập, sử dụng, xử l&yacute; v&agrave; chuyển tiếp v&agrave; những quyền của bạn li&ecirc;n quan đến dữ liệu c&aacute; nh&acirc;n của bạn.</p>\r\n\r\n<h3>Thu thập th&ocirc;ng tin của bạn</h3>\r\n\r\n<p>Mục đ&iacute;ch ch&iacute;nh của ch&uacute;ng t&ocirc;i l&agrave; tạo điều kiện thuận lợi cho qu&aacute; tr&igrave;nh tuyển dụng. Ch&uacute;ng t&ocirc;i đ&aacute;p ứng c&aacute;c y&ecirc;u cầu của người sử dụng đối với c&aacute;c cơ hội việc l&agrave;m IT v&agrave; tạo điều kiện thuận lợi cho việc nộp đơn xin việc cho nh&agrave; tuyển dụng th&ocirc;ng qua trang web của ch&uacute;ng t&ocirc;i. Để thực hiện nghĩa vụ ph&aacute;p l&yacute; v&agrave; kinh doanh của ch&uacute;ng t&ocirc;i, ch&uacute;ng t&ocirc;i thu thập th&ocirc;ng tin c&aacute; nh&acirc;n m&agrave; bạn cung cấp cho ch&uacute;ng t&ocirc;i khi truy cập trang web của ch&uacute;ng t&ocirc;i. Ch&uacute;ng t&ocirc;i cũng thu thập th&ocirc;ng tin về c&aacute;ch bạn sử dụng trang web của ch&uacute;ng t&ocirc;i. Ch&uacute;ng t&ocirc;i sử dụng th&ocirc;ng tin n&agrave;y để gi&uacute;p bạn t&igrave;m được c&ocirc;ng việc ph&ugrave; hợp, cải tiến dịch vụ của ch&uacute;ng t&ocirc;i v&agrave; ph&acirc;n t&iacute;ch, khắc phục c&aacute;c khiếm khuyết. Để sử dụng c&aacute;c dịch vụ của ch&uacute;ng t&ocirc;i, bạn sẽ được y&ecirc;u cầu cung cấp cho ch&uacute;ng t&ocirc;i c&aacute;c dữ liệu c&aacute; nh&acirc;n của bạn như t&ecirc;n, địa chỉ email v&agrave; hồ sơ ứng tuyển của bạn.</p>\r\n\r\n<p>Trong qu&aacute; tr&igrave;nh tuyển dụng, ch&uacute;ng t&ocirc;i cũng c&oacute; thể lưu trữ th&ecirc;m những th&ocirc;ng tin c&oacute; thể quan trọng kh&aacute;c.</p>\r\n\r\n<h3>C&aacute;ch ch&uacute;ng t&ocirc;i sử dụng th&ocirc;ng tin của bạn</h3>\r\n\r\n<p>Để c&oacute; thể cung cấp sản phẩm v&agrave; dịch vụ của ch&uacute;ng t&ocirc;i cho bạn, th&ocirc;ng tin của bạn sẽ được lưu lại, xử l&yacute; v&agrave; tiết lộ bởi ch&uacute;ng t&ocirc;i theo c&aacute;c c&aacute;ch sau:</p>\r\n\r\n<ul>\r\n	<li>Để tạo thuận lợi cho qu&aacute; tr&igrave;nh tuyển dụng, ch&uacute;ng t&ocirc;i kết hợp th&ocirc;ng tin của bạn với c&aacute;c cơ hội việc l&agrave;m IT;</li>\r\n	<li>Cho ph&eacute;p th&ocirc;ng tin chi tiết về c&aacute;c kỹ năng v&agrave; kinh nghiệm của bạn được xem bởi những c&ocirc;ng ty m&agrave; ch&uacute;ng t&ocirc;i cảm thấy c&oacute; thể quan t&acirc;m đến bạn.</li>\r\n	<li>Cho ph&eacute;p ch&uacute;ng t&ocirc;i gửi cho bạn dịch vụ email &ldquo;Job Robot&rdquo; của ch&uacute;ng t&ocirc;i, d&ugrave; c&oacute; sự đồng &yacute; hoặc kh&ocirc;ng đồng &yacute; r&otilde; r&agrave;ng từ bạn. Dịch vụ n&agrave;y sẽ gửi email cho bạn c&aacute;c th&ocirc;ng tin về c&aacute;c c&ocirc;ng việc mới nhất c&oacute; li&ecirc;n quan đến lĩnh vực v&agrave; kinh nghiệm chuy&ecirc;n m&ocirc;n của bạn. Trường hợp bạn được gửi th&ocirc;ng tin chi tiết về c&ocirc;ng việc th&ocirc;ng qua dịch vụ &ldquo;Job Robot,&rdquo; bạn c&oacute; thể hủy đăng k&yacute; c&aacute;c cập nhật đ&oacute; bất cứ l&uacute;c n&agrave;o bằng nhấp v&agrave;o link hủy đăng k&yacute; ở cuối mỗi email &ldquo;Job Robot,&rdquo;</li>\r\n	<li>Th&ocirc;ng b&aacute;o cho bạn về c&aacute;c cơ hội việc l&agrave;m IT v&agrave; c&aacute;c b&agrave;i tập IT m&agrave; ch&uacute;ng t&ocirc;i cho rằng c&oacute; thể bạn quan t&acirc;m;</li>\r\n	<li>Cập nhật cho bạn về h&agrave;ng ho&aacute; v&agrave; dịch vụ do đối t&aacute;c kinh doanh b&ecirc;n thứ ba của ch&uacute;ng t&ocirc;i cung cấp li&ecirc;n quan đến ng&agrave;nh của bạn. Bạn c&oacute; thể chọn kh&ocirc;ng tham gia bất cứ l&uacute;c n&agrave;o từ c&aacute;c email như vậy bằng c&aacute;ch nhấp v&agrave;o link hủy đăng k&yacute;.</li>\r\n	<li>Bảo vệ mối quan hệ kinh doanh của ch&uacute;ng t&ocirc;i với bạn như một người sử dụng trang web của ch&uacute;ng t&ocirc;i;</li>\r\n	<li>Th&ocirc;ng b&aacute;o cho bạn về c&aacute;c sản phẩm v&agrave; dịch vụ (li&ecirc;n quan đến lĩnh vực của bạn v&agrave; sở th&iacute;ch nghề nghiệp của bạn) do ch&uacute;ng t&ocirc;i hoặc c&aacute;c c&ocirc;ng ty trong nh&oacute;m của ch&uacute;ng t&ocirc;i cung cấp th&ocirc;ng qua c&aacute;c c&ocirc;ng cụ quảng c&aacute;o của ch&uacute;ng t&ocirc;i. Những th&ocirc;ng tin n&agrave;y c&oacute; thể bao gồm th&ocirc;ng tin về c&aacute;c ứng cử vi&ecirc;n / chuy&ecirc;n gia tư vấn đ&atilde; đăng k&yacute; gần đ&acirc;y, c&aacute;c hội thảo kh&aacute;ch h&agrave;ng đang sắp xếp, cập nhật thị trường, c&aacute;c phần mềm mới hoặc c&aacute;c kho&aacute; đ&agrave;o tạo m&agrave; bạn c&oacute; thể quan t&acirc;m;</li>\r\n	<li>Thực hiện c&aacute;c nghĩa vụ của ch&uacute;ng t&ocirc;i ph&aacute;t sinh từ bất kỳ hợp đồng n&agrave;o được k&yacute; kết giữa bạn v&agrave; ch&uacute;ng t&ocirc;i.</li>\r\n	<li>Th&ocirc;ng b&aacute;o cho bạn về những thay đổi dịch vụ của ch&uacute;ng t&ocirc;i.</li>\r\n</ul>\r\n\r\n<h3>Quyền truy cập của bạn đối với dữ liệu được lưu trữ, thay đổi v&agrave; phản đối của bạn đối với việc xử l&yacute; dữ liệu</h3>\r\n\r\n<p>Bạn c&oacute; thể li&ecirc;n hệ ch&uacute;ng t&ocirc;i tại talents@rikai.technology&nbsp;trong trường hợp bạn:</p>\r\n\r\n<ul>\r\n	<li>C&oacute; bất kỳ y&ecirc;u cầu n&agrave;o về th&ocirc;ng tin của bạn m&agrave; ch&uacute;ng t&ocirc;i đang c&oacute;;</li>\r\n	<li>Mong muốn x&aacute;c nhận những thay đổi về th&ocirc;ng tin của bạn hoặc chỉnh sửa những th&ocirc;ng tin m&agrave; ch&uacute;ng t&ocirc;i đang c&oacute; về bạn;</li>\r\n	<li>C&oacute; bất kỳ y&ecirc;u cầu n&agrave;o về qu&aacute; tr&igrave;nh xử l&yacute; th&ocirc;ng tin c&aacute; nh&acirc;n của bạn tại RIKAI;</li>\r\n	<li>Quyết định bất cứ l&uacute;c n&agrave;o rằng bạn kh&ocirc;ng muốn nhận những email quảng c&aacute;o từ ch&uacute;ng t&ocirc;i hoặc c&aacute;c c&ocirc;ng ty trong nh&oacute;m ch&uacute;ng t&ocirc;i. Trong trường hợp đ&oacute;, bạn vui l&ograve;ng nhấp v&agrave;o link huỷ đăng k&yacute; ở ph&iacute;a cuối mỗi email quảng c&aacute;o của ch&uacute;ng t&ocirc;i hoặc gửi email y&ecirc;u cầu huỷ đăng k&yacute; đến talents@rikai.technology;</li>\r\n</ul>\r\n\r\n<h3>Hyperlinks</h3>\r\n\r\n<p>Trang web của ch&uacute;ng t&ocirc;i c&oacute; thể chứa li&ecirc;n kết đến c&aacute;c trang web kh&aacute;c nằm ngo&agrave;i tầm kiểm so&aacute;t của ch&uacute;ng t&ocirc;i v&agrave; kh&ocirc;ng được bao gồm trong bản tuy&ecirc;n bố n&agrave;y. Nếu bạn truy cập v&agrave;o c&aacute;c trang web kh&aacute;c th&ocirc;ng qua c&aacute;c li&ecirc;n kết từ trang web của ch&uacute;ng t&ocirc;i, nh&agrave; khai th&aacute;c c&aacute;c trang web đ&oacute; c&oacute; thể thu thập th&ocirc;ng tin của bạn, ch&uacute;ng sẽ được sử dụng bởi họ theo ch&iacute;nh s&aacute;ch bảo mật của họ, c&oacute; thể kh&aacute;c với ch&uacute;ng t&ocirc;i.</p>\r\n\r\n<h3>Chất lượng dữ liệu</h3>\r\n\r\n<p>Ch&uacute;ng t&ocirc;i tin tưởng v&agrave;o bạn để đảm bảo rằng th&ocirc;ng tin của bạn l&agrave; ho&agrave;n chỉnh, ch&iacute;nh x&aacute;c v&agrave; đ&uacute;ng với hiện tại. Xin vui l&ograve;ng th&ocirc;ng b&aacute;o cho ch&uacute;ng t&ocirc;i kịp thời về bất kỳ sự thay đổi hoặc kh&ocirc;ng ch&iacute;nh x&aacute;c n&agrave;o trong th&ocirc;ng tin của bạn.</p>\r\n\r\n<h3>Lưu trữ dữ liệu</h3>\r\n\r\n<p>Ch&uacute;ng t&ocirc;i lưu dữ liệu của bạn nhằm mục đ&iacute;ch cung cấp c&aacute;c dịch vụ tuyển dụng trong tương lai cho bạn v&agrave; để quản l&yacute; mối quan hệ kinh doanh. Trong trường hợp quan hệ kinh doanh chấm dứt, ch&uacute;ng t&ocirc;i x&aacute;c nhận rằng ch&uacute;ng t&ocirc;i sẽ x&oacute;a dữ liệu c&aacute; nh&acirc;n của bạn theo c&aacute;c nghĩa vụ ph&aacute;p l&yacute; của ch&uacute;ng t&ocirc;i.</p>\r\n\r\n<h3>C&aacute;c biện ph&aacute;p an ninh</h3>\r\n\r\n<p>Ch&uacute;ng t&ocirc;i c&oacute; c&aacute;c biện ph&aacute;p an to&agrave;n kỹ thuật v&agrave; tổ chức ph&ugrave; hợp để đảm bảo sự an to&agrave;n cho th&ocirc;ng tin của bạn v&agrave; để bảo vệ n&oacute; trước h&agrave;nh động cố &yacute; hoặc v&ocirc; t&igrave;nh thao t&uacute;ng, hủy hoại, mất m&aacute;t hoặc truy cập tr&aacute;i ph&eacute;p.</p>\r\n\r\n<p>Bất chấp những nỗ lực của ch&uacute;ng t&ocirc;i về bảo mật, điều quan trọng cần lưu &yacute; l&agrave; Internet kh&ocirc;ng phải l&agrave; phương tiện truyền th&ocirc;ng an to&agrave;n. Th&ocirc;ng tin c&aacute; nh&acirc;n được truyền th&ocirc;ng qua internet c&oacute; thể bị chặn bởi người kh&aacute;c. Ch&uacute;ng t&ocirc;i kh&ocirc;ng thể đảm bảo t&iacute;nh bảo mật của th&ocirc;ng tin c&aacute; nh&acirc;n được gửi cho ch&uacute;ng t&ocirc;i qua trang web n&agrave;y. Bằng c&aacute;ch sử dụng trang web n&agrave;y v&agrave; nhập dữ liệu c&aacute; nh&acirc;n của bạn, bạn chấp nhận v&agrave; tự chịu mọi rủi ro nếu c&oacute; do đường truyền internet g&acirc;y ra.</p>\r\n\r\n<h3>Những thay đổi đối với Ch&iacute;nh s&aacute;ch Bảo mật n&agrave;y</h3>\r\n\r\n<p>Ch&uacute;ng t&ocirc;i bảo lưu quyền thay đổi Ch&iacute;nh s&aacute;ch Bảo mật của ch&uacute;ng t&ocirc;i bất cứ l&uacute;c n&agrave;o theo &yacute; của ch&uacute;ng t&ocirc;i. Mọi thay đổi ch&uacute;ng t&ocirc;i thực hiện đối với Ch&iacute;nh s&aacute;ch Bảo mật của ch&uacute;ng t&ocirc;i trong tương lai sẽ được đăng tr&ecirc;n trang n&agrave;y. Ch&uacute;ng t&ocirc;i khuyến kh&iacute;ch bạn kiểm tra Ch&iacute;nh s&aacute;ch Bảo mật n&agrave;y bất cứ khi n&agrave;o bạn truy cập trang web của ch&uacute;ng t&ocirc;i để biết bất kỳ cập nhật hoặc thay đổi n&agrave;o.</p>\r\n\r\n<h4>COOKIE L&Agrave; G&Igrave;?</h4>\r\n\r\n<p>Cookie l&agrave; một tập tin nhỏ chứa chữ c&aacute;i v&agrave; số m&agrave; ch&uacute;ng t&ocirc;i lưu trữ tr&ecirc;n tr&igrave;nh duyệt hoặc ổ cứng của m&aacute;y t&iacute;nh nếu bạn đồng &yacute;. Cookie chứa th&ocirc;ng tin được chuyển tới ổ cứng m&aacute;y t&iacute;nh của bạn.</p>\r\n\r\n<h4>CH&Uacute;NG T&Ocirc;I SỬ DỤNG NHỮNG LOẠI COOKIE N&Agrave;O?</h4>\r\n\r\n<p>Ch&uacute;ng t&ocirc;i sử dụng 2 loại cookie tr&ecirc;n trang web của ch&uacute;ng t&ocirc;i:</p>\r\n\r\n<p><strong>&lsquo;Session Cookie&rsquo;</strong></p>\r\n\r\n<p>Đ&acirc;y l&agrave; c&aacute;c cookie tạm thời, chỉ tồn tại trong khoảng thời gian bạn truy cập trang web (hoặc nghi&ecirc;m t&uacute;c hơn, cho đến khi bạn đ&oacute;ng tr&igrave;nh duyệt sau khi truy cập trang web). Cookie phi&ecirc;n gi&uacute;p trang web của ch&uacute;ng t&ocirc;i nhớ những g&igrave; bạn đ&atilde; chọn tr&ecirc;n trang trước, do đ&oacute; tr&aacute;nh phải nhập lại th&ocirc;ng tin. Tr&ecirc;n trang web của ch&uacute;ng t&ocirc;i, c&aacute;c cookie n&agrave;y kh&ocirc;ng chứa th&ocirc;ng tin c&aacute; nh&acirc;n v&agrave; kh&ocirc;ng thể sử dụng để x&aacute;c định bạn.</p>\r\n\r\n<p><strong>&lsquo;Persistent Cookie&rsquo;</strong></p>\r\n\r\n<p>Đ&acirc;y l&agrave; c&aacute;c cookie vẫn c&ograve;n tr&ecirc;n thiết bị của bạn sau khi bạn đ&atilde; truy cập trang web của ch&uacute;ng t&ocirc;i. C&aacute;c cookie n&agrave;y gi&uacute;p ch&uacute;ng t&ocirc;i x&aacute;c định bạn l&agrave; kh&aacute;ch truy cập duy nhất (bằng c&aacute;ch lưu trữ số ngẫu nhi&ecirc;n được tạo ra).</p>\r\n\r\n<h4>TẠI SAO CH&Uacute;NG T&Ocirc;I SỬ DỤNG COOKIE?</h4>\r\n\r\n<p>Để điều chỉnh trang web của ch&uacute;ng t&ocirc;i sao cho ph&ugrave; hợp với nhu cầu cụ thể của bạn, ch&uacute;ng t&ocirc;i sử dụng c&aacute;c c&ocirc;ng nghệ kh&aacute;c nhau, bao gồm cookie, để cho ph&eacute;p ch&uacute;ng t&ocirc;i ph&acirc;n biệt bạn với những người d&ugrave;ng kh&aacute;c tr&ecirc;n trang web của ch&uacute;ng t&ocirc;i.</p>\r\n\r\n<p>Ch&uacute;ng t&ocirc;i sử dụng cookie để:</p>\r\n\r\n<ul>\r\n	<li>Nhận diện v&agrave; đếm số người d&ugrave;ng truy cập v&agrave; c&aacute;c trang hoặc c&aacute;c phần kh&aacute;c nhau của một trang m&agrave; họ đ&atilde; truy cập tr&ecirc;n trang của ch&uacute;ng t&ocirc;i;</li>\r\n	<li>Xem người d&ugrave;ng sử dụng trang web như thế n&agrave;o. V&igrave; dụ, ch&uacute;ng t&ocirc;i sử dụng Google Analytics, một dịch vụ ph&acirc;n t&iacute;ch web phổ biến được cung cấp bởi Google Inc. Google Analytics sử dụng cookie để gi&uacute;p ch&uacute;ng t&ocirc;i ph&acirc;n t&iacute;ch c&aacute;ch người d&ugrave;ng truy cập trang web của ch&uacute;ng t&ocirc;i. Điều n&agrave;y gi&uacute;p ch&uacute;ng t&ocirc;i cải tiến c&aacute;ch hoạt động của trang web của ch&uacute;ng t&ocirc;i bằng c&aacute;ch đảm bảo rằng người d&ugrave;ng truy cập đang t&igrave;m kiếm những g&igrave; họ đang t&igrave;m kiếm một c&aacute;ch dễ d&agrave;ng. T&igrave;m hiểu th&ecirc;m về c&aacute;ch c&aacute;c cookie n&agrave;y được sử dụng tr&ecirc;n trang&nbsp;</li>\r\n	<li>Khi bạn sử dụng rikai.com, cookie quảng c&aacute;o sẽ được đặt tr&ecirc;n m&aacute;y t&iacute;nh của bạn để ch&uacute;ng t&ocirc;i c&oacute; thể hiểu bạn quan t&acirc;m đến điều g&igrave;. Đối t&aacute;c quảng c&aacute;o hiển thị h&igrave;nh ảnh của ch&uacute;ng t&ocirc;i, AdRoll, cho ph&eacute;p ch&uacute;ng t&ocirc;i giới thiệu đến bạn những mẫu quảng c&aacute;o của ch&uacute;ng t&ocirc;i tr&ecirc;n c&aacute;c [trang web của c&ocirc;ng ty kh&aacute;c] dựa tr&ecirc;n trải nghiệm của bạn tại rikai.com. C&aacute;c kỹ thuật m&agrave; đối t&aacute;c của ch&uacute;ng t&ocirc;i sử dụng kh&ocirc;ng thu thập th&ocirc;ng tin c&aacute; nh&acirc;n như t&ecirc;n, địa chỉ email, địa chỉ bưu điện hoặc số điện thoại của bạn. Bạn c&oacute; thể truy cập v&agrave;o trang n&agrave;y để chọn kh&ocirc;ng tham gia AdRoll v&agrave; hiển thị quảng c&aacute;o từ đối t&aacute;c của AdRoll (trong đ&oacute; c&oacute; Rikai).</li>\r\n</ul>\r\n\r\n<p>T&oacute;m lại, bằng c&aacute;ch sử dụng cookie, ch&uacute;ng t&ocirc;i c&oacute; thể cải thiện trải nghiệm của bạn khi bạn sử dụng trang web của ch&uacute;ng t&ocirc;i v&agrave; cho ph&eacute;p ch&uacute;ng t&ocirc;i li&ecirc;n tục cải tiến trang web v&agrave; dịch vụ của ch&uacute;ng t&ocirc;i cho bạn. Cookie của ch&uacute;ng t&ocirc;i đ&atilde; được thiết lập trong tr&igrave;nh duyệt của ch&uacute;ng t&ocirc;i v&agrave; ch&uacute;ng t&ocirc;i sẽ giả định rằng bạn đồng &yacute; th&ocirc;ng qua việc sử dụng cokkie li&ecirc;n tục tr&ecirc;n trang web của ch&uacute;ng t&ocirc;i. Bạn c&oacute; thể tắt một số cookie nhất định như được tr&igrave;nh b&agrave;y dưới đ&acirc;y. Nếu bạn tắt c&aacute;c cookie n&agrave;y, ch&uacute;ng t&ocirc;i kh&ocirc;ng thể đảm bảo trang web sẽ hoạt động như thế n&agrave;o với bạn.</p>\r\n\r\n<h4>QUẢN L&Yacute; COOKIE CỦA BẠN</h4>\r\n\r\n<p>Bật cookie sẽ đảm bảo bạn nhận được trải nghiệm người d&ugrave;ng tối ưu từ trang web của ch&uacute;ng t&ocirc;i.</p>\r\n\r\n<p>Hầu hết c&aacute;c tr&igrave;nh duyệt tự động chấp nhận cookie, nhưng bạn c&oacute; thể tắt chức năng n&agrave;y bất cứ l&uacute;c n&agrave;o v&agrave; thiết lập tr&igrave;nh duyệt của bạn để th&ocirc;ng b&aacute;o cho bạn bất cứ khi n&agrave;o một cookie được gửi đi. Bạn c&oacute; thể sử dụng c&agrave;i đặt tr&igrave;nh duyệt để chặn tất cả hoặc một số cookie. Xin lưu &yacute; rằng nếu bạn chặn tất cả c&aacute;c cookie bạn kh&ocirc;ng thể truy cập v&agrave;o tất cả hoặc một phần của trang web của ch&uacute;ng t&ocirc;i.</p>\r\n\r\n<p>Thay đổi c&agrave;i đặt cookie của bạn kh&aacute;c nhau trong c&aacute;c tr&igrave;nh duyệt kh&aacute;c nhau. Để dễ d&agrave;ng cho bạn, ch&uacute;ng t&ocirc;i đ&atilde; bao gồm c&aacute;c hướng dẫn về thay đổi c&agrave;i đặt của bạn trong c&aacute;c tr&igrave;nh duyệt phổ biến nhất dưới đ&acirc;y:</p>\r\n\r\n<h4>KH&Ocirc;NG THAM GIA GOOGLE&rsquo;S DOUBLECLICK</h4>\r\n\r\n<p>Bất kỳ ai kh&ocirc;ng muốn sử dụng cookie DoubleClick của Google đều c&oacute; thể chọn kh&ocirc;ng tham gia. Lựa chọn &ldquo;kh&ocirc;ng tham gia&rdquo; n&agrave;y chỉ d&agrave;nh ri&ecirc;ng cho tr&igrave;nh duyệt m&agrave; bạn đang sử dụng khi bạn nhấp v&agrave;o n&uacute;t &ldquo;Chọn kh&ocirc;ng tham gia&rdquo;&nbsp;<a href=\"https://www.google.com/policies/technologies/ads/\">tại đ&acirc;y</a>.</p>\r\n\r\n<h4>L&Agrave;M THẾ N&Agrave;O ĐỂ KIỂM TRA COOKIE C&Oacute; ĐƯỢC K&Iacute;CH HOẠT HAY KH&Ocirc;NG TR&Ecirc;N NỀN TẢNG WINDOWS</h4>\r\n\r\n<p><strong>Microsoft Internet Explorer</strong></p>\r\n\r\n<p>1. Chọn &lsquo;C&ocirc;ng cụ&rsquo; ở ph&iacute;a tr&ecirc;n c&ugrave;ng của tr&igrave;nh duyệt v&agrave; sau đ&oacute; chọn &lsquo;Lựa chọn Internet&rsquo; sau đ&oacute; nhấp v&agrave;o tab &lsquo;Bảo mật&rsquo; 2. Đảm bảo rằng mức độ Bảo mật của bạn được đặt th&agrave;nh Trung b&igrave;nh hoặc thấp hơn, để cho ph&eacute;p cookie trong tr&igrave;nh duyệt của bạn 3. C&agrave;i đặt tr&ecirc;n mức Trung b&igrave;nh sẽ tắt cookie trong tr&igrave;nh duyệt của bạn.</p>\r\n\r\n<p><strong>Mozilla Firefox</strong></p>\r\n\r\n<p>1. Chọn &lsquo;C&ocirc;ng cụ&rsquo; ở ph&iacute;a tr&ecirc;n c&ugrave;ng của tr&igrave;nh duyệt v&agrave; sau đ&oacute; chọn &lsquo;Lựa chọn&rsquo; 2. Sau đ&oacute; nhấp v&agrave;o biểu tượng &lsquo;Bảo mật&rsquo; 3. Nhấp v&agrave;o Cookies, v&agrave; chọn &lsquo;cho ph&eacute;p trang web c&agrave;i đặt cookies&rsquo;.</p>\r\n\r\n<p><strong>Google Chrome</strong></p>\r\n\r\n<p>1. Chọn &lsquo;C&ocirc;ng cụ&rsquo; ở ph&iacute;a tr&ecirc;n c&ugrave;ng của tr&igrave;nh duyệt v&agrave; sau đ&oacute; chọn &lsquo;Lựa chọn&rsquo; 2. Nhấp v&agrave;o tab &lsquo;Ph&iacute;a dưới hood&rsquo;, đến khu vực &lsquo;Bảo mật&rsquo;, v&agrave; chọn n&uacute;t &lsquo;C&agrave;i đặt Nội dung&rsquo; 3. Chọn &lsquo;cho ph&eacute;p c&agrave;i đặt dữ liệu c&aacute; nh&acirc;n&rsquo;.</p>\r\n\r\n<p><strong>Safari</strong></p>\r\n\r\n<p>1. Chọn biểu tượng &lsquo;cog&rsquo; ở ph&iacute;a tr&ecirc;n c&ugrave;ng của tr&igrave;nh duyệt v&agrave; chọn &lsquo;Quyền ưu ti&ecirc;n&rsquo; 2. Chọn &lsquo;Bảo vệ&rsquo; v&agrave; đ&aacute;nh dấu v&agrave;o lựa chọn &lsquo;Chặn cookie của b&ecirc;n thứ ba v&agrave; quảng c&aacute;o&rsquo; 3. Chọn &lsquo;Lưu&rsquo;. C&aacute;ch để kiểm tra cookie đ&atilde; được bật d&agrave;nh cho nền tảng apple Microsoft Internet Explorer 5.0 tr&ecirc;n OSX 1. Chọn &lsquo;Kh&aacute;m ph&aacute;&rsquo; ở ph&iacute;a tr&ecirc;n c&ugrave;ng của tr&igrave;nh duyệt v&agrave; chọn &lsquo;Quyền ưu ti&ecirc;n&rsquo; 2. K&eacute;o xuống phần &lsquo;Cookies&rsquo; b&ecirc;n dưới &lsquo;File nhận được&rsquo; 3. Chọn &lsquo;Kh&ocirc;ng bao giờ hỏi&rsquo;.</p>\r\n\r\n<p><strong>Safari on OSX</strong></p>\r\n\r\n<p>1. Chọn &lsquo;Safari&rsquo; ở ph&iacute;a tr&ecirc;n c&ugrave;ng của tr&igrave;nh duyệt v&agrave; chọn &lsquo;Quyền ưu ti&ecirc;n&rsquo; 2. Nhấp &lsquo;Bảo vệ&rsquo; sau đ&oacute; nhấp &lsquo;Chấp nhận cookie&rsquo; 3. Chọn &lsquo;Chỉ từ trang web m&agrave; bạn trỏ tới&rsquo;</p>\r\n', 1, 0, 4, 0, 4, 0, 'dieu-khoan-su-dung-thong-tin-ca-nhan-1628070224.png', '', 0, 1628071002, 25),
(10, 2, 'Phần liên quan trang chủ', 'slider', '', '', '', '', '', 1, 0, 10, 0, 10, 0, 'no', '', 0, 1609313070, 25);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lovaweb_category_type`
--

CREATE TABLE `lovaweb_category_type` (
  `type_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(30) DEFAULT NULL,
  `sort` int(11) DEFAULT 1,
  `is_active` int(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `lovaweb_category_type`
--

INSERT INTO `lovaweb_category_type` (`type_id`, `name`, `slug`, `sort`, `is_active`) VALUES
(1, 'Bài viết', 'article_manager', 1, 1),
(2, 'Hình ảnh', 'gallery_manager', 3, 1),
(7, 'Đăng ký email', 'register_email', 6, 1),
(15, 'Dữ liệu khác', 'others_manager', 2, 1),
(20, 'Thư liên hệ', 'contact_list', 5, 1),
(21, 'Thư đăng ký chuyển việc', 'recuiment_list', 4, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lovaweb_constant`
--

CREATE TABLE `lovaweb_constant` (
  `constant_id` int(11) NOT NULL,
  `constant` varchar(50) DEFAULT NULL,
  `value` text CHARACTER SET utf8mb4 DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `type` int(2) DEFAULT 0,
  `sort` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `lovaweb_constant`
--

INSERT INTO `lovaweb_constant` (`constant_id`, `constant`, `value`, `name`, `type`, `sort`) VALUES
(1, 'date', 'd/m/Y', 'Kiểu hiển thị ngày tháng năm', 3, 1),
(2, 'time', 'H:i', 'Kiểu hiển thị giờ phút', 3, 2),
(3, 'timezone', 'Asia/Bangkok', 'Múi giờ', 3, 4),
(4, 'title', 'IT Talents - Tư vấn chuyển việc miễn phí trực tiếp / online', 'Title (trang chủ)', 0, 1),
(5, 'description', 'IT Talents - Tư vấn chuyển việc miễn phí trực tiếp / online', 'Description (trang chủ)', 0, 2),
(6, 'keywords', '', 'Keywords (trang chủ)', 0, 3),
(7, 'email_contact', 'hathienvan58@gmail.com', 'Email', 0, 9),
(8, 'tell_contact', '03-6770-6161', 'Hotline', 0, 10),
(9, 'fulldate', 'D, d/m/Y', 'Kiểu hiển ngày đầy đủ', 3, 3),
(10, 'SMTP_username', 'hathienvan58@gmail.com', 'Tài khoản email', 1, 0),
(11, 'SMTP_password', 'hsiibpnzcijiskau', 'Mật khẩu email', 1, 0),
(12, 'error_page', '', 'Thông báo ngừng hoạt động', 0, 19),
(13, 'file_logo', '/uploads/files/logo.png', 'Logo front-end', 0, 6),
(14, 'SMTP_secure', 'ssl', 'Sử dụng xác thực', 1, 0),
(15, 'SMTP_host', 'smtp.gmail.com', 'Máy chủ (SMTP) Thư gửi đi', 1, 0),
(16, 'SMTP_port', '465', 'Cổng gửi mail', 1, 0),
(17, 'backup_auto', '', 'Tự động sao lưu', 2, 0),
(18, 'backup_filetype', 'sql', 'Định dạng lưu file CSDL', 2, 0),
(19, 'backup_filecount', '1', 'Số file CSDL lưu lại', 2, 0),
(20, 'backup_email', 'lovaweb2020@gmail.com', 'Email nhận thông báo và file', 2, 0),
(21, 'SMTP_mailname', 'RIKAI', 'Tên tài khoản email', 1, 0),
(22, 'link_facebook', 'https://www.facebook.com/', 'Facebook', 5, 1),
(24, 'link_behance', 'https://behance.com/', 'Behance', 5, 3),
(25, 'address_contact', '501 Qus Akihabara Building, 91 Sakumagashi, Kanda, Chiyoda-ku, Tokyo', 'Địa chỉ', 0, 15),
(28, 'google_analytics', '', 'Google analytics', 4, 4),
(29, 'chat_online', '<!-- Load Facebook SDK for JavaScript -->\r\n      <div id=\"fb-root\"></div>\r\n      <script>\r\n        window.fbAsyncInit = function() {\r\n          FB.init({\r\n            xfbml            : true,\r\n            version          : \'v11.0\'\r\n          });\r\n        };\r\n\r\n        (function(d, s, id) {\r\n        var js, fjs = d.getElementsByTagName(s)[0];\r\n        if (d.getElementById(id)) return;\r\n        js = d.createElement(s); js.id = id;\r\n        js.src = \'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js\';\r\n        fjs.parentNode.insertBefore(js, fjs);\r\n      }(document, \'script\', \'facebook-jssdk\'));</script>\r\n\r\n      <!-- Your Chat Plugin code -->\r\n      <div class=\"fb-customerchat\"\r\n        attribution=\"setup_tool\"\r\n        page_id=\"111560383660844\">\r\n      </div>', 'Script Chat Online', 4, 5),
(31, 'google_calendar', '', 'Google Calendar (Account)', 4, 3),
(34, 'link_youtube', 'https://www.youtube.com/', 'Youtube', 5, 8),
(73, 'script_bottom', '', 'Script cuối trang', 4, 7),
(74, 'script_body', '', 'Script sau body', 4, 6),
(75, 'fb_app_id', '', 'Facebook App ID', 4, 2),
(76, 'link_linkedin', 'https://www.linkedin.com/in/', 'LinkedIn', 5, 5),
(77, 'upload_img_max_w', '3200', 'Kích thước ảnh tối đa', 6, 1),
(78, 'upload_max_size', '536870912', 'Dung lượng tối đa', 6, 2),
(79, 'upload_checking_mode', 'mild', 'Kiểu kiểm tra file tải lên', 6, 3),
(80, 'upload_type', '1,4,5,6,7,8,9,10,11', 'Loại files cho phép', 6, 4),
(81, 'upload_ext', '', 'Phần mở rộng bị cấm', 6, 5),
(82, 'upload_mime', '', 'Loại mime bị cấm', 6, 6),
(83, 'upload_img_max_h', '1800', 'Kích thước ảnh tối đa', 6, 1),
(84, 'upload_auto_resize', '1', 'Tự động resize ảnh', 6, 1),
(86, 'meta_author', 'CÔNG TY TNHH CÔNG NGHỆ RIKAI', 'Meta author', 0, 4),
(88, 'meta_site_name', 'https://rikai.com', 'Meta site name', 0, 5),
(89, 'meta_copyright', '© Copyright 2021 by RIKAI . All Rights Reserved', 'Meta copyright', 0, 8),
(90, 'image_thumbnailUrl', '/uploads/files/logo.png', 'Image : thumbnailUrl', 0, 7),
(92, 'link_instagram', 'https://www.instagram.com/', 'Instagram', 5, 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lovaweb_contact`
--

CREATE TABLE `lovaweb_contact` (
  `contact_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `is_active` int(1) DEFAULT 1,
  `ip` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT 'fa-send-o',
  `created_time` int(11) DEFAULT 0,
  `modified_time` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `lovaweb_contact`
--

INSERT INTO `lovaweb_contact` (`contact_id`, `name`, `address`, `email`, `phone`, `content`, `is_active`, `ip`, `icon`, `created_time`, `modified_time`) VALUES
(62, 'Van Ha Thien', '316 Nguyen Luong Bang STreet', 'lovaweb2020@gmail.com', '0766708619', '<div marginwidth=\"0\" marginheight=\"0\" style=\"font-family:Arial,serif;\"><table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\" style=\"table-layout:fixed;\"><tbody><tr><td width=\"100%\" valign=\"top\" bgcolor=\"#f5f5f5\" style=\"border-top:3px solid #579902;padding:0;\"><table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\" style=\"margin:0 auto;width:100%;\"><tbody><tr><td bgcolor=\"white\" style=\"padding:10px 0; text-align: center;\"><a href=\"https://rikaidev.jetart.com.vn\" target=\"_blank\"><img src=\"https://rikaidev.jetart.com.vn/uploads/files/logo.png\" style=\"max-height:70px;max-width:80%;\" alt=\"https://rikai.com\" border=\"0\"></a></td></tr></tbody></table><div style=\"min-height:35px\">&nbsp;</div><table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\" style=\"min-width:290px;margin:0 auto;font-size:13px;color:#666666;font-weight:normal;text-align:left;font-family:Arial,serif;line-height:18px;\" width=\"620\"><tbody><tr><td style=\"border-left:6px solid #fb651b;font-size:13px;color:#666666;font-weight:normal;text-align:left;font-family:Arial,serif;line-height:18px;vertical-align:top;padding:15px 8px 25px 20px;\" bgcolor=\"#fdfdfd\"><p style=\"margin: 10px 0\">Chào <b> Van Ha Thien</b>,</p><p style=\"margin: 10px 0\">Xin chân thành cảm ơn Quý khách đã quan tâm và sử dụng dịch vụ của chúng tôi!\nYêu cầu của Quý khách đã gửi thành công. Chúng tôi sẽ phản hồi lại trong vòng 24h tới.</p><p style=\"margin: 10px 0\"><b style=\"text-decoration:underline;\">THÔNG TIN CỦA QUÝ KHÁCH:</b><br/><label style=\"font-weight:600;padding-left:12px;\">Họ và tên </label> Van Ha Thien<br/><label style=\"font-weight:600;padding-left:12px;\">Số điện thoại: </label> 0766708619<br/><label style=\"font-weight:600;padding-left:12px;\">Email: </label> lovaweb2020@gmail.com<br/><label style=\"font-weight:600;padding-left:12px;\">Địa chỉ: </label> 316 Nguyen Luong Bang STreet<br/><label style=\"font-weight:600;padding-left:12px;\">Thắc mắc của bạn:</label> a<br/><label style=\"font-weight:600;padding-left:12px;\">IP: </label> 116.105.169.236<br/><label style=\"font-weight:600;padding-left:12px;\">Ngày gửi liên hệ: </label> 05/08/2021 10:28<br/></p><p style=\"margin: 10px 0\">Đây là hộp thư tự động. Sau thời gian trên nếu quý khách chưa nhân được phản hồi từ nhân viên của chúng tôi, rất có thể đã gặp sự cố nhỏ nào đó vì vậy Quý khách có thể liên hệ trực tiếp chúng tôi để nhận được những thông tin nhanh nhất.</p><p style=\"margin: 10px 0\">Chân thành cảm ơn!</p></td></tr></tbody></table><div style=\"min-height:35px\">&nbsp;</div></div>', 0, '116.105.169.236', 'fa-car', 1628134113, 1628134121);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lovaweb_core_privilege`
--

CREATE TABLE `lovaweb_core_privilege` (
  `privilege_id` bigint(20) NOT NULL,
  `role_id` int(11) DEFAULT 0,
  `type` varchar(30) DEFAULT NULL,
  `privilege_slug` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `lovaweb_core_privilege`
--

INSERT INTO `lovaweb_core_privilege` (`privilege_id`, `role_id`, `type`, `privilege_slug`) VALUES
(293, 2, 'tool', 'tool_delete'),
(294, 2, 'tool', 'tool_site'),
(295, 2, 'tool', 'tool_keywords'),
(296, 2, 'tool', 'tool_update'),
(330, 2, 'core', 'core_mail'),
(1528, 1, 'tool', 'tool_delete'),
(1529, 1, 'tool', 'tool_site'),
(1530, 1, 'tool', 'tool_keywords'),
(1531, 1, 'tool', 'tool_ipdie'),
(1532, 1, 'tool', 'tool_update'),
(1707, 1, 'gift', 'category_edit;22'),
(1708, 1, 'gift', 'gift_menu_add;22'),
(1709, 1, 'gift', 'gift_menu_edit;22'),
(1710, 1, 'gift', 'gift_menu_del;22'),
(1711, 1, 'gift', 'gift_list;22'),
(1712, 1, 'gift', 'gift_add;22'),
(1713, 1, 'gift', 'gift_edit;22'),
(1714, 1, 'gift', 'gift_del;22'),
(2102, 2, 'product', 'category_edit;37'),
(2103, 2, 'product', 'product_menu_add;37'),
(2193, 1, 'location', 'category_edit;39'),
(2194, 1, 'location', 'location_menu_add;39'),
(2195, 1, 'location', 'location_menu_edit;39'),
(2196, 1, 'location', 'location_menu_del;39'),
(2197, 1, 'location', 'location_list;39'),
(2198, 1, 'location', 'location_add;39'),
(2199, 1, 'location', 'location_edit;39'),
(2200, 1, 'location', 'location_del;39'),
(2201, 1, 'location', 'category_edit;40'),
(2202, 1, 'location', 'location_menu_add;40'),
(2203, 1, 'location', 'location_menu_edit;40'),
(2204, 1, 'location', 'location_menu_del;40'),
(2205, 1, 'location', 'location_list;40'),
(2206, 1, 'location', 'location_add;40'),
(2207, 1, 'location', 'location_edit;40'),
(2208, 1, 'location', 'location_del;40'),
(2248, 1, 'direction', 'direction_add'),
(2249, 1, 'direction', 'direction_edit'),
(2250, 1, 'direction', 'direction_del'),
(2251, 1, 'street', 'street_add'),
(2252, 1, 'street', 'street_edit'),
(2253, 1, 'street', 'street_del'),
(2254, 1, 'pages', 'plugin_page_add'),
(2255, 1, 'pages', 'plugin_page_edit'),
(2256, 1, 'pages', 'plugin_page_del'),
(2290, 1, 'road', 'road_add'),
(2291, 1, 'road', 'road_edit'),
(2292, 1, 'road', 'road_del'),
(2649, 1, 'bds_business', 'category_edit;50'),
(2650, 1, 'bds_business', 'bds_business_menu_add;50'),
(2651, 1, 'bds_business', 'bds_business_menu_edit;50'),
(2652, 1, 'bds_business', 'bds_business_menu_del;50'),
(2653, 1, 'bds_business', 'bds_business_list;50'),
(2654, 1, 'bds_business', 'bds_business_add;50'),
(2655, 1, 'bds_business', 'bds_business_edit;50'),
(2656, 1, 'bds_business', 'bds_business_del;50'),
(2776, 1, 'project', 'category_edit;13'),
(2777, 1, 'project', 'project_menu_add;13'),
(2778, 1, 'project', 'project_menu_edit;13'),
(2779, 1, 'project', 'project_menu_del;13'),
(2780, 1, 'project', 'project_list;13'),
(2781, 1, 'project', 'project_add;13'),
(2782, 1, 'project', 'project_edit;13'),
(2783, 1, 'project', 'project_del;13'),
(2784, 1, 'project', 'category_edit;53'),
(2785, 1, 'project', 'project_menu_add;53'),
(2786, 1, 'project', 'project_menu_edit;53'),
(2787, 1, 'project', 'project_menu_del;53'),
(2788, 1, 'project', 'project_list;53'),
(2789, 1, 'project', 'project_add;53'),
(2790, 1, 'project', 'project_edit;53'),
(2791, 1, 'project', 'project_del;53'),
(2792, 9, 'category', 'product_manager'),
(2793, 9, 'product', 'product_list;37'),
(2794, 9, 'product', 'product_add;37'),
(2795, 9, 'product', 'product_edit;37'),
(2796, 9, 'product', 'product_del;37'),
(2797, 11, 'category', 'article_manager'),
(2798, 11, 'category', 'gallery_manager'),
(2799, 11, 'category', 'project_manager'),
(2800, 11, 'category', 'product_manager'),
(2801, 11, 'category', 'location_manager'),
(2802, 11, 'category', 'street_manager'),
(2803, 11, 'category', 'road_manager'),
(2804, 11, 'category', 'direction_manager'),
(2805, 11, 'category', 'others_manager'),
(2806, 11, 'category', 'plugin_page'),
(2809, 11, 'config', 'config_socialnetwork'),
(2813, 11, 'pages', 'plugin_page_add'),
(2814, 11, 'pages', 'plugin_page_edit'),
(2815, 11, 'pages', 'plugin_page_del'),
(2816, 1, 'prjname', 'prjname_add'),
(2817, 1, 'prjname', 'prjname_edit'),
(2818, 1, 'prjname', 'prjname_del'),
(2830, 12, 'category', 'article_manager'),
(2831, 12, 'category', 'gallery_manager'),
(2832, 12, 'category', 'project_manager'),
(2833, 12, 'category', 'product_manager'),
(2834, 12, 'category', 'location_manager'),
(2835, 12, 'category', 'road_manager'),
(2836, 12, 'category', 'street_manager'),
(2837, 12, 'category', 'direction_manager'),
(2838, 12, 'category', 'prjname_manager'),
(2839, 12, 'category', 'others_manager'),
(2840, 12, 'category', 'plugin_page'),
(2841, 12, 'pages', 'plugin_page_add'),
(2842, 12, 'pages', 'plugin_page_edit'),
(2843, 12, 'pages', 'plugin_page_del'),
(2908, 12, 'article', 'category_edit;9'),
(2909, 12, 'article', 'article_menu_add;9'),
(2910, 12, 'article', 'article_menu_edit;9'),
(2911, 12, 'article', 'article_menu_del;9'),
(2912, 12, 'article', 'article_list;9'),
(2913, 12, 'article', 'article_add;9'),
(2914, 12, 'article', 'article_edit;9'),
(2915, 12, 'article', 'article_del;9'),
(2916, 12, 'article', 'category_edit;51'),
(2917, 12, 'article', 'article_menu_add;51'),
(2918, 12, 'article', 'article_menu_edit;51'),
(2919, 12, 'article', 'article_menu_del;51'),
(2920, 12, 'article', 'article_list;51'),
(2921, 12, 'article', 'article_add;51'),
(2922, 12, 'article', 'article_edit;51'),
(2923, 12, 'article', 'article_del;51'),
(2924, 12, 'article', 'category_edit;7'),
(2925, 12, 'article', 'article_menu_add;7'),
(2926, 12, 'article', 'article_menu_edit;7'),
(2927, 12, 'article', 'article_menu_del;7'),
(2928, 12, 'article', 'article_list;7'),
(2929, 12, 'article', 'article_add;7'),
(2930, 12, 'article', 'article_edit;7'),
(2931, 12, 'article', 'article_del;7'),
(2932, 12, 'project', 'category_edit;13'),
(2933, 12, 'project', 'project_menu_add;13'),
(2934, 12, 'project', 'project_menu_edit;13'),
(2935, 12, 'project', 'project_menu_del;13'),
(2936, 12, 'project', 'project_list;13'),
(2937, 12, 'project', 'project_add;13'),
(2938, 12, 'project', 'project_edit;13'),
(2939, 12, 'project', 'project_del;13'),
(2940, 12, 'project', 'category_edit;53'),
(2941, 12, 'project', 'project_menu_add;53'),
(2942, 12, 'project', 'project_menu_edit;53'),
(2943, 12, 'project', 'project_menu_del;53'),
(2944, 12, 'project', 'project_list;53'),
(2945, 12, 'project', 'project_add;53'),
(2946, 12, 'project', 'project_edit;53'),
(2947, 12, 'project', 'project_del;53'),
(2948, 12, 'gallery', 'category_edit;4'),
(2949, 12, 'gallery', 'gallery_menu_add;4'),
(2950, 12, 'gallery', 'gallery_menu_edit;4'),
(2951, 12, 'gallery', 'gallery_menu_del;4'),
(2952, 12, 'gallery', 'gallery_list;4'),
(2953, 12, 'gallery', 'gallery_add;4'),
(2954, 12, 'gallery', 'gallery_edit;4'),
(2955, 12, 'gallery', 'gallery_del;4'),
(2956, 12, 'gallery', 'category_edit;52'),
(2957, 12, 'gallery', 'gallery_menu_add;52'),
(2958, 12, 'gallery', 'gallery_menu_edit;52'),
(2959, 12, 'gallery', 'gallery_menu_del;52'),
(2960, 12, 'gallery', 'gallery_list;52'),
(2961, 12, 'gallery', 'gallery_add;52'),
(2962, 12, 'gallery', 'gallery_edit;52'),
(2963, 12, 'gallery', 'gallery_del;52'),
(2964, 12, 'product', 'category_edit;37'),
(2965, 12, 'product', 'product_menu_add;37'),
(2966, 12, 'product', 'product_menu_edit;37'),
(2967, 12, 'product', 'product_menu_del;37'),
(2968, 12, 'product', 'product_list;37'),
(2969, 12, 'product', 'product_add;37'),
(2970, 12, 'product', 'product_edit;37'),
(2971, 12, 'product', 'product_del;37'),
(2980, 12, 'location', 'category_edit;39'),
(2981, 12, 'location', 'location_menu_add;39'),
(2982, 12, 'location', 'location_menu_edit;39'),
(2983, 12, 'location', 'location_menu_del;39'),
(2984, 12, 'location', 'location_list;39'),
(2985, 12, 'location', 'location_add;39'),
(2986, 12, 'location', 'location_edit;39'),
(2987, 12, 'location', 'location_del;39'),
(2988, 12, 'location', 'category_edit;40'),
(2989, 12, 'location', 'location_menu_add;40'),
(2990, 12, 'location', 'location_menu_edit;40'),
(2991, 12, 'location', 'location_menu_del;40'),
(2992, 12, 'location', 'location_list;40'),
(2993, 12, 'location', 'location_add;40'),
(2994, 12, 'location', 'location_edit;40'),
(2995, 12, 'location', 'location_del;40'),
(2996, 12, 'road', 'road_add'),
(2997, 12, 'road', 'road_edit'),
(2998, 12, 'road', 'road_del'),
(2999, 12, 'street', 'street_add'),
(3000, 12, 'street', 'street_edit'),
(3001, 12, 'street', 'street_del'),
(3002, 12, 'direction', 'direction_add'),
(3003, 12, 'direction', 'direction_edit'),
(3004, 12, 'direction', 'direction_del'),
(3005, 12, 'prjname', 'prjname_add'),
(3006, 12, 'prjname', 'prjname_edit'),
(3007, 12, 'prjname', 'prjname_del'),
(3008, 12, 'backup', 'backup_data'),
(3009, 12, 'backup', 'backup_config'),
(3010, 12, 'config', 'config_general'),
(3011, 12, 'config', 'config_smtp'),
(3012, 12, 'config', 'config_datetime'),
(3013, 12, 'config', 'config_plugins'),
(3014, 12, 'config', 'config_socialnetwork'),
(3015, 12, 'config', 'config_search'),
(3016, 12, 'config', 'config_upload'),
(3017, 12, 'tool', 'tool_delete'),
(3018, 12, 'tool', 'tool_site'),
(3019, 12, 'tool', 'tool_keywords'),
(3020, 12, 'tool', 'tool_ipdie'),
(3021, 12, 'tool', 'tool_update'),
(3022, 12, 'core', 'core_role'),
(3023, 12, 'core', 'core_user'),
(3024, 12, 'core', 'core_dashboard'),
(3025, 12, 'core', 'core_mail'),
(3026, 12, 'info', 'Info_diary'),
(3027, 12, 'info', 'Info_php'),
(3028, 12, 'info', 'Info_site'),
(3029, 12, 'info', 'Info_expansion'),
(3030, 11, 'article', 'category_edit;9'),
(3031, 11, 'article', 'article_menu_add;9'),
(3032, 11, 'article', 'article_menu_edit;9'),
(3033, 11, 'article', 'article_menu_del;9'),
(3034, 11, 'article', 'article_list;9'),
(3035, 11, 'article', 'article_add;9'),
(3036, 11, 'article', 'article_edit;9'),
(3037, 11, 'article', 'article_del;9'),
(3038, 11, 'article', 'category_edit;51'),
(3039, 11, 'article', 'article_menu_add;51'),
(3040, 11, 'article', 'article_menu_edit;51'),
(3041, 11, 'article', 'article_menu_del;51'),
(3042, 11, 'article', 'article_list;51'),
(3043, 11, 'article', 'article_add;51'),
(3044, 11, 'article', 'article_edit;51'),
(3045, 11, 'article', 'article_del;51'),
(3046, 11, 'article', 'category_edit;7'),
(3047, 11, 'article', 'article_menu_add;7'),
(3048, 11, 'article', 'article_menu_edit;7'),
(3049, 11, 'article', 'article_menu_del;7'),
(3050, 11, 'article', 'article_list;7'),
(3051, 11, 'article', 'article_add;7'),
(3052, 11, 'article', 'article_edit;7'),
(3053, 11, 'article', 'article_del;7'),
(3054, 11, 'gallery', 'category_edit;4'),
(3055, 11, 'gallery', 'gallery_menu_add;4'),
(3056, 11, 'gallery', 'gallery_menu_edit;4'),
(3057, 11, 'gallery', 'gallery_menu_del;4'),
(3058, 11, 'gallery', 'gallery_list;4'),
(3059, 11, 'gallery', 'gallery_add;4'),
(3060, 11, 'gallery', 'gallery_edit;4'),
(3061, 11, 'gallery', 'gallery_del;4'),
(3062, 11, 'gallery', 'category_edit;52'),
(3063, 11, 'gallery', 'gallery_menu_add;52'),
(3064, 11, 'gallery', 'gallery_menu_edit;52'),
(3065, 11, 'gallery', 'gallery_menu_del;52'),
(3066, 11, 'gallery', 'gallery_list;52'),
(3067, 11, 'gallery', 'gallery_add;52'),
(3068, 11, 'gallery', 'gallery_edit;52'),
(3069, 11, 'gallery', 'gallery_del;52'),
(3070, 11, 'project', 'category_edit;13'),
(3071, 11, 'project', 'project_menu_add;13'),
(3072, 11, 'project', 'project_menu_edit;13'),
(3073, 11, 'project', 'project_menu_del;13'),
(3074, 11, 'project', 'project_list;13'),
(3075, 11, 'project', 'project_add;13'),
(3076, 11, 'project', 'project_edit;13'),
(3077, 11, 'project', 'project_del;13'),
(3078, 11, 'project', 'category_edit;53'),
(3079, 11, 'project', 'project_menu_add;53'),
(3080, 11, 'project', 'project_menu_edit;53'),
(3081, 11, 'project', 'project_menu_del;53'),
(3082, 11, 'project', 'project_list;53'),
(3083, 11, 'project', 'project_add;53'),
(3084, 11, 'project', 'project_edit;53'),
(3085, 11, 'project', 'project_del;53'),
(3133, 11, 'product', 'product_list;37'),
(3134, 11, 'product', 'product_add;37'),
(3135, 11, 'product', 'product_edit;37'),
(3136, 11, 'product', 'product_del;37'),
(3137, 11, 'product', 'owner_real;37'),
(3138, 11, 'product', 'owner_cus;37'),
(3325, 1, 'info', 'sys_info_diary'),
(3326, 1, 'info', 'sys_info_php'),
(3327, 1, 'info', 'sys_info_site'),
(3328, 1, 'info', 'sys_info_expansion'),
(3331, 1, 'core', 'core_role'),
(3332, 1, 'core', 'core_user'),
(3333, 1, 'core', 'core_dashboard'),
(3334, 1, 'core', 'core_mail'),
(3834, 1, 'car', 'category_edit;67'),
(3835, 1, 'car', 'car_menu_add;67'),
(3836, 1, 'car', 'car_menu_edit;67'),
(3837, 1, 'car', 'car_menu_del;67'),
(3838, 1, 'car', 'car_list;67'),
(3839, 1, 'car', 'car_add;67'),
(3840, 1, 'car', 'car_edit;67'),
(3841, 1, 'car', 'car_del;67'),
(3976, 1, 'tour', 'category_edit;70'),
(3977, 1, 'tour', 'tour_menu_add;70'),
(3978, 1, 'tour', 'tour_menu_edit;70'),
(3979, 1, 'tour', 'tour_menu_del;70'),
(3980, 1, 'tour', 'tour_list;70'),
(3981, 1, 'tour', 'tour_add;70'),
(3982, 1, 'tour', 'tour_edit;70'),
(3983, 1, 'tour', 'tour_del;70'),
(4925, 1, 'question', 'question_add'),
(4926, 1, 'question', 'question_edit'),
(4927, 1, 'question', 'question_del'),
(5216, 1, 'document', 'category_edit;109'),
(5217, 1, 'document', 'document_menu_add;109'),
(5218, 1, 'document', 'document_menu_edit;109'),
(5219, 1, 'document', 'document_menu_del;109'),
(5220, 1, 'document', 'document_list;109'),
(5221, 1, 'document', 'document_add;109'),
(5222, 1, 'document', 'document_edit;109'),
(5223, 1, 'document', 'document_del;109'),
(5615, 1, 'product', 'category_edit;130'),
(5616, 1, 'product', 'product_menu_add;130'),
(5617, 1, 'product', 'product_menu_edit;130'),
(5618, 1, 'product', 'product_menu_del;130'),
(5619, 1, 'product', 'product_list;130'),
(5620, 1, 'product', 'product_add;130'),
(5621, 1, 'product', 'product_edit;130'),
(5622, 1, 'product', 'product_del;130'),
(6004, 1, 'gallery', 'category_edit;10'),
(6005, 1, 'gallery', 'gallery_menu_add;10'),
(6006, 1, 'gallery', 'gallery_menu_edit;10'),
(6007, 1, 'gallery', 'gallery_menu_del;10'),
(6008, 1, 'gallery', 'gallery_list;10'),
(6009, 1, 'gallery', 'gallery_add;10'),
(6010, 1, 'gallery', 'gallery_edit;10'),
(6011, 1, 'gallery', 'gallery_del;10'),
(6116, 1, 'config', 'config_general'),
(6117, 1, 'config', 'config_smtp'),
(6118, 1, 'config', 'config_datetime'),
(6119, 1, 'config', 'config_plugins'),
(6120, 1, 'config', 'config_socialnetwork'),
(6121, 1, 'config', 'config_upload'),
(6171, 2, 'category', 'article_manager'),
(6172, 2, 'category', 'gallery_manager'),
(6173, 2, 'category', 'contact_list'),
(6174, 2, 'category', 'plugin_page'),
(6175, 2, 'article', 'category_edit;1'),
(6176, 2, 'article', 'article_menu_add;1'),
(6177, 2, 'article', 'article_menu_edit;1'),
(6178, 2, 'article', 'article_menu_del;1'),
(6179, 2, 'article', 'article_list;1'),
(6180, 2, 'article', 'article_add;1'),
(6181, 2, 'article', 'article_edit;1'),
(6182, 2, 'article', 'article_del;1'),
(6183, 2, 'article', 'category_edit;2'),
(6184, 2, 'article', 'article_menu_add;2'),
(6185, 2, 'article', 'article_menu_edit;2'),
(6186, 2, 'article', 'article_menu_del;2'),
(6187, 2, 'article', 'article_list;2'),
(6188, 2, 'article', 'article_add;2'),
(6189, 2, 'article', 'article_edit;2'),
(6190, 2, 'article', 'article_del;2'),
(6191, 2, 'article', 'category_edit;3'),
(6192, 2, 'article', 'article_menu_add;3'),
(6193, 2, 'article', 'article_menu_edit;3'),
(6194, 2, 'article', 'article_menu_del;3'),
(6195, 2, 'article', 'article_list;3'),
(6196, 2, 'article', 'article_add;3'),
(6197, 2, 'article', 'article_edit;3'),
(6198, 2, 'article', 'article_del;3'),
(6199, 2, 'gallery', 'category_edit;10'),
(6200, 2, 'gallery', 'gallery_menu_add;10'),
(6201, 2, 'gallery', 'gallery_menu_edit;10'),
(6202, 2, 'gallery', 'gallery_menu_del;10'),
(6203, 2, 'gallery', 'gallery_list;10'),
(6204, 2, 'gallery', 'gallery_add;10'),
(6205, 2, 'gallery', 'gallery_edit;10'),
(6206, 2, 'gallery', 'gallery_del;10'),
(6207, 2, 'pages', 'plugin_page_add'),
(6208, 2, 'pages', 'plugin_page_edit'),
(6209, 2, 'pages', 'plugin_page_del'),
(6210, 2, 'config', 'config_general'),
(6211, 2, 'config', 'config_smtp'),
(6212, 2, 'config', 'config_datetime'),
(6213, 2, 'config', 'config_plugins'),
(6214, 2, 'config', 'config_socialnetwork'),
(6215, 2, 'config', 'config_upload'),
(6216, 2, 'backup', 'backup_data'),
(6217, 2, 'backup', 'backup_config'),
(6284, 1, 'backup', 'backup_data'),
(6285, 1, 'backup', 'backup_config'),
(6337, 1, 'others', 'category_edit;2'),
(6338, 1, 'others', 'others_menu_add;2'),
(6339, 1, 'others', 'others_menu_edit;2'),
(6340, 1, 'others', 'others_menu_del;2'),
(6341, 1, 'others', 'others_list;2'),
(6342, 1, 'others', 'others_add;2'),
(6343, 1, 'others', 'others_edit;2'),
(6344, 1, 'others', 'others_del;2'),
(6345, 1, 'others', 'category_edit;4'),
(6346, 1, 'others', 'others_menu_add;4'),
(6347, 1, 'others', 'others_menu_edit;4'),
(6348, 1, 'others', 'others_menu_del;4'),
(6349, 1, 'others', 'others_list;4'),
(6350, 1, 'others', 'others_add;4'),
(6351, 1, 'others', 'others_edit;4'),
(6352, 1, 'others', 'others_del;4'),
(6353, 1, 'others', 'category_edit;5'),
(6354, 1, 'others', 'others_menu_add;5'),
(6355, 1, 'others', 'others_menu_edit;5'),
(6356, 1, 'others', 'others_menu_del;5'),
(6357, 1, 'others', 'others_list;5'),
(6358, 1, 'others', 'others_add;5'),
(6359, 1, 'others', 'others_edit;5'),
(6360, 1, 'others', 'others_del;5'),
(6361, 1, 'others', 'category_edit;3'),
(6362, 1, 'others', 'others_menu_add;3'),
(6363, 1, 'others', 'others_menu_edit;3'),
(6364, 1, 'others', 'others_menu_del;3'),
(6365, 1, 'others', 'others_list;3'),
(6366, 1, 'others', 'others_add;3'),
(6367, 1, 'others', 'others_edit;3'),
(6368, 1, 'others', 'others_del;3'),
(6404, 1, 'article', 'category_edit;1'),
(6405, 1, 'article', 'others_menu_add;1'),
(6406, 1, 'article', 'article_menu_add;1'),
(6407, 1, 'article', 'article_menu_edit;1'),
(6408, 1, 'article', 'article_menu_del;1'),
(6409, 1, 'article', 'article_list;1'),
(6410, 1, 'article', 'article_add;1'),
(6411, 1, 'article', 'article_edit;1'),
(6412, 1, 'article', 'article_del;1'),
(6413, 1, 'article', 'category_edit;7'),
(6414, 1, 'article', 'others_menu_add;7'),
(6415, 1, 'article', 'article_menu_add;7'),
(6416, 1, 'article', 'article_menu_edit;7'),
(6417, 1, 'article', 'article_menu_del;7'),
(6418, 1, 'article', 'article_list;7'),
(6419, 1, 'article', 'article_add;7'),
(6420, 1, 'article', 'article_edit;7'),
(6421, 1, 'article', 'article_del;7'),
(6422, 1, 'article', 'category_edit;6'),
(6423, 1, 'article', 'others_menu_add;6'),
(6424, 1, 'article', 'article_menu_add;6'),
(6425, 1, 'article', 'article_menu_edit;6'),
(6426, 1, 'article', 'article_menu_del;6'),
(6427, 1, 'article', 'article_list;6'),
(6428, 1, 'article', 'article_add;6'),
(6429, 1, 'article', 'article_edit;6'),
(6430, 1, 'article', 'article_del;6'),
(6431, 1, 'article', 'category_edit;8'),
(6432, 1, 'article', 'others_menu_add;8'),
(6433, 1, 'article', 'article_menu_add;8'),
(6434, 1, 'article', 'article_menu_edit;8'),
(6435, 1, 'article', 'article_menu_del;8'),
(6436, 1, 'article', 'article_list;8'),
(6437, 1, 'article', 'article_add;8'),
(6438, 1, 'article', 'article_edit;8'),
(6439, 1, 'article', 'article_del;8'),
(6440, 1, 'category', 'article_manager'),
(6441, 1, 'category', 'others_manager'),
(6442, 1, 'category', 'gallery_manager'),
(6443, 1, 'category', 'recuiment_list'),
(6444, 1, 'category', 'contact_list'),
(6445, 1, 'category', 'register_email'),
(6446, 1, 'category', 'plugin_page');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lovaweb_core_role`
--

CREATE TABLE `lovaweb_core_role` (
  `role_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `is_active` int(1) DEFAULT 1,
  `modified_time` int(11) DEFAULT 0,
  `user_id` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `lovaweb_core_role`
--

INSERT INTO `lovaweb_core_role` (`role_id`, `name`, `comment`, `is_active`, `modified_time`, `user_id`) VALUES
(1, 'Administrator', 'Nhóm quản trị tối cao', 1, 1609919110, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lovaweb_core_user`
--

CREATE TABLE `lovaweb_core_user` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `user_name` varchar(16) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `full_name` varchar(150) DEFAULT NULL,
  `gender` int(1) DEFAULT 0,
  `birthday` int(11) DEFAULT 0,
  `apply` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `comment` text CHARACTER SET utf8mb4 DEFAULT NULL,
  `is_show` int(1) DEFAULT 0,
  `sort` int(11) DEFAULT 1,
  `img` varchar(255) DEFAULT 'no',
  `is_active` int(1) DEFAULT 1,
  `vote` bigint(20) DEFAULT 1,
  `click_vote` bigint(20) DEFAULT 1,
  `created_time` int(11) DEFAULT 0,
  `modified_time` int(11) DEFAULT 0,
  `user_id_edit` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `lovaweb_core_user`
--

INSERT INTO `lovaweb_core_user` (`user_id`, `role_id`, `user_name`, `password`, `full_name`, `gender`, `birthday`, `apply`, `email`, `phone`, `address`, `comment`, `is_show`, `sort`, `img`, `is_active`, `vote`, `click_vote`, `created_time`, `modified_time`, `user_id_edit`) VALUES
(1, 1, 'admin', '11dbf0e251708136e6d925b4959050f8', 'Administrator', 1, 928515600, 'Admin', 'hathienvan58@gmail.com', '0978572727', '', '', 0, 1, 'avatar.png', 1, 5, 1, 1408159832, 1623214064, 25),
(25, 1, 'dev', '8b2a1eae8eea494249ee2b1204b10c89', 'Long Trần', 2, 928515600, 'Thiết kế', 'tranngoclong0304@gmail.com', '07766708619', '', '', 0, 1, 'avatar.png', 1, 4, 1, 1408159832, 1604490253, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lovaweb_gallery`
--

CREATE TABLE `lovaweb_gallery` (
  `gallery_id` int(11) NOT NULL,
  `gallery_menu_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT 'no',
  `upload_id` bigint(20) DEFAULT 0,
  `comment` text CHARACTER SET utf8mb4 DEFAULT NULL,
  `content` text CHARACTER SET utf8mb4 DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `is_active` int(1) DEFAULT 1,
  `hot` int(1) DEFAULT 0,
  `views` bigint(20) DEFAULT 1,
  `created_time` int(11) DEFAULT 0,
  `modified_time` int(11) DEFAULT 0,
  `user_id` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `lovaweb_gallery`
--

INSERT INTO `lovaweb_gallery` (`gallery_id`, `gallery_menu_id`, `name`, `slug`, `title`, `description`, `keywords`, `img`, `upload_id`, `comment`, `content`, `link`, `is_active`, `hot`, `views`, `created_time`, `modified_time`, `user_id`) VALUES
(890, 1, 'Slide 1', 'slide-1', NULL, '', NULL, 'slide-1-1628043836.png', 3524, '', '', '', 1, 0, 1, 1628043780, 1628043836, 25),
(891, 1, 'Slide 2', 'slide-2', NULL, '', NULL, 'slide-2-1628043849.png', 3525, '', '', '', 1, 0, 1, 1628043840, 1628043849, 25),
(892, 1, 'Slide 3', 'slide-3', NULL, '', NULL, 'slide-3-1628043869.png', 3526, '', '', '', 1, 0, 1, 1628043900, 1628043869, 25),
(893, 2, 'Đối tác 1', 'doi-tac-1', NULL, '', NULL, 'doi-tac-1-1628049395.png', 3528, '#', '', '', 1, 0, 1, 1628049360, 1628049395, 25),
(894, 2, 'Đối tác 2', 'doi-tac-2', NULL, '', NULL, 'doi-tac-2-1628049411.png', 3529, '#', '', '', 1, 0, 1, 1628049420, 1628049411, 25),
(895, 2, 'Đối tác 3', 'doi-tac-3', NULL, '', NULL, 'doi-tac-3-1628049422.png', 3530, '#', '', '', 1, 0, 1, 1628049480, 1628049430, 25),
(896, 2, 'Đối tác 4', 'doi-tac-4', NULL, '', NULL, 'doi-tac-4-1628049444.png', 3531, '#', '', '', 1, 0, 1, 1628049540, 1628049451, 25),
(897, 2, 'Đối tác 5', 'doi-tac-5', NULL, '', NULL, 'doi-tac-5-1628049471.png', 3532, '#', '', '', 1, 0, 1, 1628049600, 1628049471, 25),
(898, 2, 'Đối tác 6', 'doi-tac-6', NULL, '', NULL, 'doi-tac-6-1628049898.png', 3533, '#', '', '', 1, 0, 1, 1628049840, 1628049898, 25);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lovaweb_gallery_menu`
--

CREATE TABLE `lovaweb_gallery_menu` (
  `gallery_menu_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `keywords` text DEFAULT NULL,
  `parent` int(11) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `comment` text CHARACTER SET utf8mb4 DEFAULT NULL,
  `is_active` int(1) DEFAULT 1,
  `hot` int(1) DEFAULT 0,
  `img` varchar(255) DEFAULT 'no',
  `created_time` int(11) DEFAULT 0,
  `modified_time` int(11) DEFAULT 0,
  `user_id` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `lovaweb_gallery_menu`
--

INSERT INTO `lovaweb_gallery_menu` (`gallery_menu_id`, `category_id`, `name`, `slug`, `title`, `description`, `keywords`, `parent`, `sort`, `comment`, `is_active`, `hot`, `img`, `created_time`, `modified_time`, `user_id`) VALUES
(1, 10, 'IT Talents', 'it-talents', '', '', '', 0, 1, 'Tư vấn chuyển việc miễn phí trực tiếp / online', 1, 0, 'no', 1627984333, 1628044057, 25),
(2, 10, 'Đối tác & khách hàng', 'doi-tac', '', '', '', 0, 2, '', 1, 0, 'no', 1627984342, 1628048078, 25);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lovaweb_link`
--

CREATE TABLE `lovaweb_link` (
  `link_id` bigint(20) NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `category` int(11) DEFAULT 0,
  `menu` int(11) DEFAULT 0,
  `post` int(11) DEFAULT 0,
  `modified_time` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `lovaweb_link`
--

INSERT INTO `lovaweb_link` (`link_id`, `link`, `category`, `menu`, `post`, `modified_time`) VALUES
(1, 'search', 0, 0, 0, 0),
(2, 'adminjet', 0, 0, 0, 0),
(3, 'home', 0, 0, 0, 0),
(4, 'all-job', 1, 0, 0, 1628051482),
(6, 'japanese-level', 2, 0, 0, 1627982427),
(7, 'work-point', 3, 0, 0, 1627983587),
(8, 'earnings', 4, 0, 0, 1627983588),
(9, 'time-change-job', 5, 0, 0, 1627983589),
(10, 'contact', 6, 0, 0, 1628064462),
(11, 'why-choose', 7, 0, 0, 1627983590),
(12, 'terms-use', 8, 0, 0, 1628071002),
(1987, 'n5', 2, 1, 0, 1627983504),
(1988, 'n4', 2, 2, 0, 1627983542),
(1989, 'n3', 2, 3, 0, 1627983549),
(1990, 'n2', 2, 4, 0, 1627983557),
(1991, 'n1', 2, 5, 0, 1627983564),
(1997, 'tokyo', 3, 11, 0, 1627983900),
(1998, 'chiba', 3, 12, 0, 1627983909),
(1999, 'gunma', 3, 13, 0, 1627983916),
(2000, 'ibaraki', 3, 14, 0, 1627983923),
(2001, 'kanagawa', 3, 15, 0, 1627983930),
(2002, 'saitama', 3, 16, 0, 1627983940),
(2003, 'tochigi', 3, 17, 0, 1627983950),
(2004, 'hokkaido', 3, 18, 0, 1627983958),
(2005, 'akita', 3, 19, 0, 1627983966),
(2006, 'aomori', 3, 20, 0, 1627983974),
(2007, 'fukushima', 3, 21, 0, 1627983983),
(2008, 'iwate', 3, 22, 0, 1627983991),
(2009, 'miyagi', 3, 23, 0, 1627983998),
(2010, 'yamagata', 3, 24, 0, 1627984007),
(2011, 'aichi', 3, 25, 0, 1627984014),
(2012, 'fukui', 3, 26, 0, 1627984022),
(2013, 'gifu', 3, 27, 0, 1627984029),
(2014, 'ishikawa', 3, 28, 0, 1627984042),
(2015, 'nagano', 3, 29, 0, 1627984048),
(2016, 'niigata', 3, 30, 0, 1627984057),
(2017, 'shizuoka', 3, 31, 0, 1627984068),
(2018, 'toyama', 3, 32, 0, 1627984074),
(2019, 'yamanashi', 3, 33, 0, 1627984082),
(2020, 'hyogo', 3, 34, 0, 1627984089),
(2021, 'kyoto', 3, 35, 0, 1627984099),
(2022, 'mie', 3, 36, 0, 1627984106),
(2023, 'nara', 3, 37, 0, 1627984115),
(2024, 'osaka', 3, 38, 0, 1627984122),
(2025, 'shiga', 3, 39, 0, 1627984129),
(2026, 'wakayama', 3, 40, 0, 1627984138),
(2027, 'hiroshima', 3, 41, 0, 1627984145),
(2028, 'okayama', 3, 42, 0, 1627984153),
(2029, 'shimane', 3, 43, 0, 1627984161),
(2030, 'tottori', 3, 44, 0, 1627984168),
(2031, 'yamaguchi', 3, 45, 0, 1627984175),
(2032, 'ehime', 3, 46, 0, 1627984182),
(2033, 'kagawa', 3, 47, 0, 1627984189),
(2034, 'kochi', 3, 48, 0, 1627984196),
(2035, 'tokushima', 3, 49, 0, 1627984208),
(2036, 'fukuoka', 3, 50, 0, 1627984214),
(2037, 'kagoshima', 3, 51, 0, 1627984222),
(2038, 'kumamoto', 3, 52, 0, 1627984231),
(2039, 'miyazaki', 3, 53, 0, 1627984237),
(2040, 'nagasaki', 3, 54, 0, 1627984244),
(2041, 'oita', 3, 55, 0, 1627984251),
(2042, 'saga', 3, 56, 0, 1627984260),
(2043, 'it-talents', 10, 1, 0, 1628044057),
(2044, 'doi-tac', 10, 2, 0, 1628048078),
(2045, 'okinawa', 3, 57, 0, 1627984408),
(2046, 'software-engineer', 1, 800, 0, 1628044966),
(2047, 'mobile-enginee', 1, 801, 0, 1628045020),
(2048, 'web-engineer', 1, 802, 0, 1628045029),
(2049, 'ai-engineer', 1, 803, 0, 1628045040),
(2050, 'tester-engineer', 1, 804, 0, 1628045049),
(2051, 'data-scipntist-phan-tich-du-lieu', 1, 800, 2011, 1628046531),
(2052, 'slide-1', 10, 1, 890, 1628043836),
(2053, 'slide-2', 10, 1, 891, 1628043849),
(2054, 'slide-3', 10, 1, 892, 1628043869),
(2055, 'ho-tro-hoan-thien-cv', 7, 805, 0, 1628049050),
(2056, 'ho-tro-sau-khi-onboard', 7, 806, 0, 1628049040),
(2057, 'tu-van-mien-phi', 7, 807, 0, 1628049057),
(2058, 'doanh-nghiep-chat-luong', 7, 808, 0, 1628049065),
(2059, 'doi-tac-1', 10, 2, 893, 1628049395),
(2060, 'doi-tac-2', 10, 2, 894, 1628049411),
(2061, 'doi-tac-3', 10, 2, 895, 1628049430),
(2062, 'doi-tac-4', 10, 2, 896, 1628049451),
(2063, 'doi-tac-5', 10, 2, 897, 1628049471),
(2064, '300-man-400-man', 4, 58, 0, 1628049663),
(2065, '400-man-500-man', 4, 59, 0, 1628049674),
(2066, '500-man-700-man', 4, 60, 0, 1628049687),
(2067, '700-man-1000-man', 4, 61, 0, 1628049698),
(2068, 'hon-1000-man', 4, 62, 0, 1628049707),
(2069, 'mong-muon-chuyen-viec-ngay', 5, 63, 0, 1628049778),
(2070, 'trong-vong-3-thang', 5, 64, 0, 1628049788),
(2071, 'trong-vong-6-thang', 5, 65, 0, 1628049802),
(2072, 'trong-vong-1-nam', 5, 66, 0, 1628049812),
(2073, 'neu-co-viec-tot-se-chuyen', 5, 67, 0, 1628049823),
(2074, 'doi-tac-6', 10, 2, 898, 1628049898),
(2075, 'node-js-lap-trinh-mobile', 1, 801, 2012, 1628063187),
(2076, 'lap-trinh-vien-c', 1, 800, 2013, 1628065947),
(2077, 'lap-trinh-vien-react', 1, 800, 2014, 1628065917),
(2078, 'node-js-lap-trinh-app-mobile', 1, 800, 2015, 1628065866),
(2079, 'my-sql-data-scipt-phan-tich-du-lieu', 1, 800, 2016, 1628065900);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lovaweb_online`
--

CREATE TABLE `lovaweb_online` (
  `online_id` bigint(20) NOT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `created_time` int(11) DEFAULT 0,
  `site` varchar(255) DEFAULT NULL,
  `agent` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `lovaweb_online`
--

INSERT INTO `lovaweb_online` (`online_id`, `ip`, `created_time`, `site`, `agent`, `user_id`) VALUES
(38850, '116.105.169.236', 1628154524, '', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lovaweb_online_daily`
--

CREATE TABLE `lovaweb_online_daily` (
  `online_daily_id` bigint(20) NOT NULL,
  `date` date DEFAULT NULL,
  `count` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `lovaweb_online_daily`
--

INSERT INTO `lovaweb_online_daily` (`online_daily_id`, `date`, `count`) VALUES
(1322, '2021-08-03', 9),
(1323, '2021-08-04', 6),
(1324, '2021-08-05', 7);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lovaweb_order`
--

CREATE TABLE `lovaweb_order` (
  `order_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `content` text CHARACTER SET utf8mb4 NOT NULL,
  `is_active` int(1) NOT NULL DEFAULT 1,
  `ip` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL DEFAULT 'fa-shopping-cart',
  `created_time` int(11) NOT NULL DEFAULT 0,
  `modified_time` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lovaweb_others`
--

CREATE TABLE `lovaweb_others` (
  `others_id` int(11) NOT NULL,
  `others_menu_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `p_from` varchar(255) DEFAULT NULL,
  `p_to` varchar(255) DEFAULT NULL,
  `sort` int(11) DEFAULT 1,
  `is_active` int(1) DEFAULT 1,
  `hot` int(1) DEFAULT 0,
  `created_time` int(11) DEFAULT 0,
  `modified_time` int(11) DEFAULT 0,
  `user_id` int(11) DEFAULT 0,
  `link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lovaweb_others_menu`
--

CREATE TABLE `lovaweb_others_menu` (
  `others_menu_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `plus` varchar(255) DEFAULT NULL,
  `menu` int(1) DEFAULT 0,
  `parent` int(11) DEFAULT NULL,
  `sort` int(11) DEFAULT 1,
  `is_active` int(1) DEFAULT 1,
  `hot` int(1) DEFAULT 0,
  `created_time` int(11) DEFAULT 0,
  `modified_time` int(11) DEFAULT 0,
  `user_id` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `lovaweb_others_menu`
--

INSERT INTO `lovaweb_others_menu` (`others_menu_id`, `category_id`, `name`, `slug`, `plus`, `menu`, `parent`, `sort`, `is_active`, `hot`, `created_time`, `modified_time`, `user_id`) VALUES
(1, 2, 'N5', 'n5', '', 0, 0, 1, 1, 0, 1627983504, 1627983504, 25),
(2, 2, 'N4', 'n4', '', 0, 0, 2, 1, 0, 1627983542, 1627983542, 25),
(3, 2, 'N3', 'n3', '', 0, 0, 3, 1, 0, 1627983549, 1627983549, 25),
(4, 2, 'N2', 'n2', '', 0, 0, 4, 1, 0, 1627983557, 1627983557, 25),
(5, 2, 'N1', 'n1', '', 0, 0, 5, 1, 0, 1627983564, 1627983564, 25),
(11, 3, 'Tokyo', 'tokyo', '', 0, 0, 1, 1, 0, 1627983900, 1627984447, 25),
(12, 3, 'Chiba', 'chiba', '', 0, 0, 2, 1, 0, 1627983909, 1627984449, 25),
(13, 3, 'Gunma', 'gunma', '', 0, 0, 3, 1, 0, 1627983916, 1627984452, 25),
(14, 3, 'Ibaraki', 'ibaraki', '', 0, 0, 4, 1, 0, 1627983923, 1627984459, 25),
(15, 3, 'Kanagawa', 'kanagawa', '', 0, 0, 5, 1, 0, 1627983930, 1627984462, 25),
(16, 3, 'Saitama', 'saitama', '', 0, 0, 6, 1, 0, 1627983940, 1627984464, 25),
(17, 3, 'Tochigi', 'tochigi', '', 0, 0, 7, 1, 0, 1627983950, 1627984465, 25),
(18, 3, 'Hokkaido', 'hokkaido', '', 0, 0, 8, 1, 0, 1627983958, 1627984467, 25),
(19, 3, 'Akita', 'akita', '', 0, 0, 9, 1, 0, 1627983966, 1627984470, 25),
(20, 3, 'Aomori', 'aomori', '', 0, 0, 10, 1, 0, 1627983974, 1627984472, 25),
(21, 3, 'Fukushima', 'fukushima', '', 0, 0, 11, 1, 0, 1627983983, 1627984475, 25),
(22, 3, 'Iwate', 'iwate', '', 0, 0, 12, 1, 0, 1627983991, 1627984478, 25),
(23, 3, 'Miyagi', 'miyagi', '', 0, 0, 13, 1, 0, 1627983998, 1627984481, 25),
(24, 3, 'Yamagata', 'yamagata', '', 0, 0, 14, 1, 0, 1627984007, 1627984483, 25),
(25, 3, 'Aichi', 'aichi', '', 0, 0, 15, 1, 0, 1627984014, 1627984485, 25),
(26, 3, 'Fukui', 'fukui', '', 0, 0, 16, 1, 0, 1627984022, 1627984491, 25),
(27, 3, 'Gifu', 'gifu', '', 0, 0, 17, 1, 0, 1627984029, 1627984493, 25),
(28, 3, 'Ishikawa', 'ishikawa', '', 0, 0, 18, 1, 0, 1627984042, 1627984497, 25),
(29, 3, 'Nagano', 'nagano', '', 0, 0, 19, 1, 0, 1627984048, 1627984501, 25),
(30, 3, 'Niigata', 'niigata', '', 0, 0, 20, 1, 0, 1627984057, 1627984505, 25),
(31, 3, 'Shizuoka', 'shizuoka', '', 0, 0, 21, 1, 0, 1627984068, 1627984508, 25),
(32, 3, 'Toyama', 'toyama', '', 0, 0, 22, 1, 0, 1627984074, 1627984510, 25),
(33, 3, 'Yamanashi', 'yamanashi', '', 0, 0, 23, 1, 0, 1627984082, 1627984512, 25),
(34, 3, 'Hyogo', 'hyogo', '', 0, 0, 24, 1, 0, 1627984089, 1627984514, 25),
(35, 3, 'Kyoto', 'kyoto', '', 0, 0, 25, 1, 0, 1627984099, 1627984517, 25),
(36, 3, 'Mie', 'mie', '', 0, 0, 26, 1, 0, 1627984106, 1627984520, 25),
(37, 3, 'Nara', 'nara', '', 0, 0, 27, 1, 0, 1627984115, 1627984522, 25),
(38, 3, 'Osaka', 'osaka', '', 0, 0, 28, 1, 0, 1627984122, 1627984524, 25),
(39, 3, 'Shiga', 'shiga', '', 0, 0, 29, 1, 0, 1627984129, 1627984526, 25),
(40, 3, 'Wakayama', 'wakayama', '', 0, 0, 30, 1, 0, 1627984138, 1627984527, 25),
(41, 3, 'Hiroshima', 'hiroshima', '', 0, 0, 31, 1, 0, 1627984145, 1627984529, 25),
(42, 3, 'Okayama', 'okayama', '', 0, 0, 32, 1, 0, 1627984153, 1627984531, 25),
(43, 3, 'Shimane', 'shimane', '', 0, 0, 33, 1, 0, 1627984161, 1627984536, 25),
(44, 3, 'Tottori', 'tottori', '', 0, 0, 34, 1, 0, 1627984168, 1627984534, 25),
(45, 3, 'Yamaguchi', 'yamaguchi', '', 0, 0, 35, 1, 0, 1627984175, 1627984538, 25),
(46, 3, 'Ehime', 'ehime', '', 0, 0, 36, 1, 0, 1627984182, 1627984540, 25),
(47, 3, 'Kagawa', 'kagawa', '', 0, 0, 37, 1, 0, 1627984189, 1627984542, 25),
(48, 3, 'Kōchi', 'kochi', '', 0, 0, 38, 1, 0, 1627984196, 1627984544, 25),
(49, 3, 'Tokushima', 'tokushima', '', 0, 0, 39, 1, 0, 1627984208, 1627984546, 25),
(50, 3, 'Fukuoka', 'fukuoka', '', 0, 0, 40, 1, 0, 1627984214, 1627984548, 25),
(51, 3, 'Kagoshima', 'kagoshima', '', 0, 0, 41, 1, 0, 1627984222, 1627984549, 25),
(52, 3, 'Kumamoto', 'kumamoto', '', 0, 0, 42, 1, 0, 1627984231, 1627984555, 25),
(53, 3, 'Miyazaki', 'miyazaki', '', 0, 0, 43, 1, 0, 1627984237, 1627984557, 25),
(54, 3, 'Nagasaki', 'nagasaki', '', 0, 0, 44, 1, 0, 1627984244, 1627984560, 25),
(55, 3, 'Oita', 'oita', '', 0, 0, 45, 1, 0, 1627984251, 1627984562, 25),
(56, 3, 'Saga', 'saga', '', 0, 0, 46, 1, 0, 1627984260, 1627984564, 25),
(57, 3, 'Okinawa', 'okinawa', '', 0, 0, 47, 1, 0, 1627984408, 1627984567, 25),
(58, 4, '300 man - 400 man', '300-man-400-man', '', 0, 0, 1, 1, 0, 1628049663, 1628049663, 25),
(59, 4, '400 man - 500 man', '400-man-500-man', '', 0, 0, 2, 1, 0, 1628049674, 1628049674, 25),
(60, 4, '500 man - 700 man', '500-man-700-man', '', 0, 0, 3, 1, 0, 1628049687, 1628049687, 25),
(61, 4, '700 man - 1000 man', '700-man-1000-man', '', 0, 0, 4, 1, 0, 1628049698, 1628049698, 25),
(62, 4, 'Hơn 1000 man', 'hon-1000-man', '', 0, 0, 5, 1, 0, 1628049707, 1628049707, 25),
(63, 5, 'Mong muốn chuyển việc ngay', 'mong-muon-chuyen-viec-ngay', '', 0, 0, 1, 1, 0, 1628049754, 1628049778, 25),
(64, 5, 'Trong vòng 3 tháng', 'trong-vong-3-thang', '', 0, 0, 2, 1, 0, 1628049788, 1628049788, 25),
(65, 5, 'Trong vòng 6 tháng', 'trong-vong-6-thang', '', 0, 0, 3, 1, 0, 1628049802, 1628049802, 25),
(66, 5, 'Trong vòng 1 năm', 'trong-vong-1-nam', '', 0, 0, 4, 1, 0, 1628049812, 1628049812, 25),
(67, 5, 'Nếu có việc tốt sẽ chuyển', 'neu-co-viec-tot-se-chuyen', '', 0, 0, 5, 1, 0, 1628049823, 1628049823, 25);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lovaweb_page`
--

CREATE TABLE `lovaweb_page` (
  `page_id` int(11) NOT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `comment` text CHARACTER SET utf8mb4 DEFAULT NULL,
  `content` longtext CHARACTER SET utf8mb4 DEFAULT NULL,
  `is_active` int(1) DEFAULT 1,
  `views` bigint(20) DEFAULT 1,
  `modified_time` int(11) DEFAULT 0,
  `user_id` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `lovaweb_page`
--

INSERT INTO `lovaweb_page` (`page_id`, `alias`, `name`, `comment`, `content`, `is_active`, `views`, `modified_time`, `user_id`) VALUES
(143, 'google_map', 'google map', '', '	<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3240.1866152296066!2d139.77745911534006!3d35.697025080190556!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60188eae9340fca1%3A0xfafa1b188ed0f89b!2sQus%20Akihabara%20Building!5e0!3m2!1svi!2s!4v1627555221662!5m2!1svi!2s\"\r\n			width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 1, 1, 1628045431, 25),
(144, 'japan_company', 'NHẬT BẢN: RIKAI株式会社 ', '', '<p>501 Qus Akihabara Building, 91 Sakumagashi, Kanda, Chiyoda-ku, Tokyo</p>\r\n', 1, 1, 1628064818, 25),
(145, 'vietnam_company', 'VIỆT NAM: CÔNG TY TNHH CÔNG NGHỆ RIKAI', '', '<p>Tầng 19, T&ograve;a nh&agrave; Th&agrave;nh Lợi, Số 03 L&ecirc; Đ&igrave;nh L&yacute;, Phường Vĩnh Trung, Quận Thanh Kh&ecirc;, Th&agrave;nh phố Đ&agrave; Nẵng.</p>\r\n\r\n<p>27A Ho&agrave;ng Việt, Phường 4, Quận T&acirc;n B&igrave;nh, Th&agrave;nh phố Hồ Ch&iacute; Minh.</p>\r\n\r\n<p>Tầng 2, số 87 Nguyễn Th&aacute;i Học, Quận Ba Đ&igrave;nh, Th&agrave;nh phố H&agrave; Nội.</p>\r\n', 1, 1, 1628064806, 25);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lovaweb_recuiment`
--

CREATE TABLE `lovaweb_recuiment` (
  `recuiment_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `dateofbirth` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `desired_working` varchar(255) DEFAULT NULL,
  `desired_income` varchar(255) DEFAULT NULL,
  `estimated_time` varchar(255) DEFAULT NULL,
  `upload_cv` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `is_active` int(1) DEFAULT 1,
  `ip` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT 'fa-send-o',
  `created_time` int(11) DEFAULT 0,
  `modified_time` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `lovaweb_recuiment`
--

INSERT INTO `lovaweb_recuiment` (`recuiment_id`, `name`, `email`, `dateofbirth`, `address`, `desired_working`, `desired_income`, `estimated_time`, `upload_cv`, `content`, `is_active`, `ip`, `icon`, `created_time`, `modified_time`) VALUES
(82, 'Van Ha Thien', 'lovaweb2020@gmail.com', '10/05/2021', '316 Nguyen Luong Bang STreet', 'Tokyo', 'Tất cả', 'Nếu có việc tốt sẽ chuyển', 'uploads/', '<div marginwidth=\"0\" marginheight=\"0\" style=\"font-family:Arial,serif;\"><table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\" style=\"table-layout:fixed;\"><tbody><tr><td width=\"100%\" valign=\"top\" bgcolor=\"#f5f5f5\" style=\"border-top:3px solid #579902;padding:0;\"><table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\" style=\"margin:0 auto;width:100%;\"><tbody><tr><td bgcolor=\"white\" style=\"padding:10px 0; text-align: center;\"><a href=\"https://rikaidev.jetart.com.vn\" target=\"_blank\"><img src=\"https://rikaidev.jetart.com.vn/uploads/files/logo.png\" style=\"max-height:70px;max-width:80%;\" alt=\"https://rikai.com\" border=\"0\"></a></td></tr></tbody></table><div style=\"min-height:35px\">&nbsp;</div><table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\" style=\"min-width:290px;margin:0 auto;font-size:13px;color:#666666;font-weight:normal;text-align:left;font-family:Arial,serif;line-height:18px;\" width=\"620\"><tbody><tr><td style=\"border-left:6px solid #fb651b;font-size:13px;color:#666666;font-weight:normal;text-align:left;font-family:Arial,serif;line-height:18px;vertical-align:top;padding:15px 8px 25px 20px;\" bgcolor=\"#fdfdfd\"><p style=\"margin: 10px 0\">Chào <b> Van Ha Thien</b>,</p><p style=\"margin: 10px 0\">Xin chân thành cảm ơn Quý khách đã quan tâm và sử dụng dịch vụ của chúng tôi!\nYêu cầu của Quý khách đã gửi thành công. Chúng tôi sẽ phản hồi lại trong vòng 24h tới.</p><p style=\"margin: 10px 0\"><b style=\"text-decoration:underline;\">THÔNG TIN ỨNG VIÊN:</b><br/><label style=\"font-weight:600;padding-left:12px;\">Họ và tên : </label> Van Ha Thien<br/><label style=\"font-weight:600;padding-left:12px;\">Email: </label> lovaweb2020@gmail.com<br/><label style=\"font-weight:600;padding-left:12px;\">Địa chỉ: </label> 316 Nguyen Luong Bang STreet<br/><label style=\"font-weight:600;padding-left:12px;\">Ngày tháng năm sinh:</label> 10/05/2021<br/><label style=\"font-weight:600;padding-left:12px;\">Địa điểm làm việc mong muốn:</label> Tokyo<br/><label style=\"font-weight:600;padding-left:12px;\">Thu nhập mong muốn:</label> Tất cả<br/><label style=\"font-weight:600;padding-left:12px;\">Thời điểm chuyển việc dự kiến:</label> Nếu có việc tốt sẽ chuyển<br/><label style=\"font-weight:600;padding-left:12px;\">Thắc mắc của bạn:</label> <br/><label style=\"font-weight:600;padding-left:12px;\">IP: </label> 116.105.169.236<br/><label style=\"font-weight:600;padding-left:12px;\">Ngày gửi liên hệ: </label> 05/08/2021 16:04<br/></p><p style=\"margin: 10px 0\">Đây là hộp thư tự động. Sau thời gian trên nếu quý khách chưa nhân được phản hồi từ nhân viên của chúng tôi, rất có thể đã gặp sự cố nhỏ nào đó vì vậy Quý khách có thể liên hệ trực tiếp chúng tôi để nhận được những thông tin nhanh nhất.</p><p style=\"margin: 10px 0\">Chân thành cảm ơn!</p></td></tr></tbody></table><div style=\"min-height:35px\">&nbsp;</div></div>', 1, '116.105.169.236', 'fa-car', 1628154247, 0),
(83, 'Van Ha Thien', 'lovaweb2020@gmail.com', '02/08/2021', '316 Nguyen Luong Bang STreet', 'Tokyo', 'Tất cả', 'Mong muốn chuyển việc ngay', 'uploads/', '<div marginwidth=\"0\" marginheight=\"0\" style=\"font-family:Arial,serif;\"><table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\" style=\"table-layout:fixed;\"><tbody><tr><td width=\"100%\" valign=\"top\" bgcolor=\"#f5f5f5\" style=\"border-top:3px solid #579902;padding:0;\"><table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\" style=\"margin:0 auto;width:100%;\"><tbody><tr><td bgcolor=\"white\" style=\"padding:10px 0; text-align: center;\"><a href=\"https://rikaidev.jetart.com.vn\" target=\"_blank\"><img src=\"https://rikaidev.jetart.com.vn/uploads/files/logo.png\" style=\"max-height:70px;max-width:80%;\" alt=\"https://rikai.com\" border=\"0\"></a></td></tr></tbody></table><div style=\"min-height:35px\">&nbsp;</div><table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\" style=\"min-width:290px;margin:0 auto;font-size:13px;color:#666666;font-weight:normal;text-align:left;font-family:Arial,serif;line-height:18px;\" width=\"620\"><tbody><tr><td style=\"border-left:6px solid #fb651b;font-size:13px;color:#666666;font-weight:normal;text-align:left;font-family:Arial,serif;line-height:18px;vertical-align:top;padding:15px 8px 25px 20px;\" bgcolor=\"#fdfdfd\"><p style=\"margin: 10px 0\">Chào <b> Van Ha Thien</b>,</p><p style=\"margin: 10px 0\">Xin chân thành cảm ơn Quý khách đã quan tâm và sử dụng dịch vụ của chúng tôi!\nYêu cầu của Quý khách đã gửi thành công. Chúng tôi sẽ phản hồi lại trong vòng 24h tới.</p><p style=\"margin: 10px 0\"><b style=\"text-decoration:underline;\">THÔNG TIN ỨNG VIÊN:</b><br/><label style=\"font-weight:600;padding-left:12px;\">Họ và tên : </label> Van Ha Thien<br/><label style=\"font-weight:600;padding-left:12px;\">Email: </label> lovaweb2020@gmail.com<br/><label style=\"font-weight:600;padding-left:12px;\">Địa chỉ: </label> 316 Nguyen Luong Bang STreet<br/><label style=\"font-weight:600;padding-left:12px;\">Ngày tháng năm sinh:</label> 02/08/2021<br/><label style=\"font-weight:600;padding-left:12px;\">Địa điểm làm việc mong muốn:</label> Tokyo<br/><label style=\"font-weight:600;padding-left:12px;\">Thu nhập mong muốn:</label> Tất cả<br/><label style=\"font-weight:600;padding-left:12px;\">Thời điểm chuyển việc dự kiến:</label> Mong muốn chuyển việc ngay<br/><label style=\"font-weight:600;padding-left:12px;\">Thắc mắc của bạn:</label> <br/><label style=\"font-weight:600;padding-left:12px;\">IP: </label> 116.105.169.236<br/><label style=\"font-weight:600;padding-left:12px;\">Ngày gửi liên hệ: </label> 05/08/2021 16:08<br/></p><p style=\"margin: 10px 0\">Đây là hộp thư tự động. Sau thời gian trên nếu quý khách chưa nhân được phản hồi từ nhân viên của chúng tôi, rất có thể đã gặp sự cố nhỏ nào đó vì vậy Quý khách có thể liên hệ trực tiếp chúng tôi để nhận được những thông tin nhanh nhất.</p><p style=\"margin: 10px 0\">Chân thành cảm ơn!</p></td></tr></tbody></table><div style=\"min-height:35px\">&nbsp;</div></div>', 0, '116.105.169.236', 'fa-car', 1628154536, 1628154571);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lovaweb_register_email`
--

CREATE TABLE `lovaweb_register_email` (
  `register_email_id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `created_time` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lovaweb_stars`
--

CREATE TABLE `lovaweb_stars` (
  `id` int(11) NOT NULL,
  `rateIndex` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `lovaweb_stars`
--

INSERT INTO `lovaweb_stars` (`id`, `rateIndex`) VALUES
(4, 3),
(5, 4),
(6, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lovaweb_uploads_tmp`
--

CREATE TABLE `lovaweb_uploads_tmp` (
  `upload_id` bigint(20) NOT NULL,
  `status` int(1) DEFAULT 0,
  `list_img` text DEFAULT NULL,
  `created_time` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `lovaweb_uploads_tmp`
--

INSERT INTO `lovaweb_uploads_tmp` (`upload_id`, `status`, `list_img`, `created_time`) VALUES
(3506, 0, NULL, 1627985009),
(3507, 0, NULL, 1627985024),
(3508, 0, NULL, 1627985027),
(3509, 0, NULL, 1627985029),
(3510, 0, NULL, 1627985030),
(3511, 0, NULL, 1627985031),
(3512, 0, NULL, 1627985084),
(3513, 0, NULL, 1627985119),
(3514, 0, NULL, 1627985124),
(3515, 0, NULL, 1627985175),
(3516, 0, NULL, 1627985180),
(3517, 0, NULL, 1627985181),
(3518, 0, NULL, 1627985224),
(3519, 0, NULL, 1627985279),
(3520, 0, NULL, 1627985556),
(3521, 0, NULL, 1627985614),
(3522, 0, NULL, 1627985654),
(3523, 1, NULL, 1627985852),
(3524, 1, NULL, 1628043817),
(3525, 1, NULL, 1628043841),
(3526, 1, NULL, 1628043853),
(3527, 0, NULL, 1628047403),
(3528, 1, NULL, 1628049369),
(3529, 1, NULL, 1628049398),
(3530, 1, NULL, 1628049414),
(3531, 1, NULL, 1628049433),
(3532, 1, NULL, 1628049453),
(3533, 1, NULL, 1628049883),
(3534, 0, NULL, 1628051508),
(3535, 1, NULL, 1628051520),
(3536, 1, NULL, 1628064014),
(3537, 1, NULL, 1628064183),
(3538, 1, NULL, 1628064230),
(3539, 1, NULL, 1628064277);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lovaweb_vote`
--

CREATE TABLE `lovaweb_vote` (
  `vote_id` bigint(20) NOT NULL,
  `session` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `vote` int(1) NOT NULL DEFAULT 0,
  `created_time` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `lovaweb_article`
--
ALTER TABLE `lovaweb_article`
  ADD PRIMARY KEY (`article_id`);

--
-- Chỉ mục cho bảng `lovaweb_article_menu`
--
ALTER TABLE `lovaweb_article_menu`
  ADD PRIMARY KEY (`article_menu_id`);

--
-- Chỉ mục cho bảng `lovaweb_category`
--
ALTER TABLE `lovaweb_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `lovaweb_category_type`
--
ALTER TABLE `lovaweb_category_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Chỉ mục cho bảng `lovaweb_constant`
--
ALTER TABLE `lovaweb_constant`
  ADD PRIMARY KEY (`constant_id`);

--
-- Chỉ mục cho bảng `lovaweb_contact`
--
ALTER TABLE `lovaweb_contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Chỉ mục cho bảng `lovaweb_core_privilege`
--
ALTER TABLE `lovaweb_core_privilege`
  ADD PRIMARY KEY (`privilege_id`);

--
-- Chỉ mục cho bảng `lovaweb_core_role`
--
ALTER TABLE `lovaweb_core_role`
  ADD PRIMARY KEY (`role_id`);

--
-- Chỉ mục cho bảng `lovaweb_core_user`
--
ALTER TABLE `lovaweb_core_user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- Chỉ mục cho bảng `lovaweb_gallery`
--
ALTER TABLE `lovaweb_gallery`
  ADD PRIMARY KEY (`gallery_id`);

--
-- Chỉ mục cho bảng `lovaweb_gallery_menu`
--
ALTER TABLE `lovaweb_gallery_menu`
  ADD PRIMARY KEY (`gallery_menu_id`);

--
-- Chỉ mục cho bảng `lovaweb_link`
--
ALTER TABLE `lovaweb_link`
  ADD PRIMARY KEY (`link_id`);

--
-- Chỉ mục cho bảng `lovaweb_online`
--
ALTER TABLE `lovaweb_online`
  ADD PRIMARY KEY (`online_id`);

--
-- Chỉ mục cho bảng `lovaweb_online_daily`
--
ALTER TABLE `lovaweb_online_daily`
  ADD PRIMARY KEY (`online_daily_id`);

--
-- Chỉ mục cho bảng `lovaweb_order`
--
ALTER TABLE `lovaweb_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Chỉ mục cho bảng `lovaweb_others`
--
ALTER TABLE `lovaweb_others`
  ADD PRIMARY KEY (`others_id`);

--
-- Chỉ mục cho bảng `lovaweb_others_menu`
--
ALTER TABLE `lovaweb_others_menu`
  ADD PRIMARY KEY (`others_menu_id`);

--
-- Chỉ mục cho bảng `lovaweb_page`
--
ALTER TABLE `lovaweb_page`
  ADD PRIMARY KEY (`page_id`);

--
-- Chỉ mục cho bảng `lovaweb_recuiment`
--
ALTER TABLE `lovaweb_recuiment`
  ADD PRIMARY KEY (`recuiment_id`);

--
-- Chỉ mục cho bảng `lovaweb_register_email`
--
ALTER TABLE `lovaweb_register_email`
  ADD PRIMARY KEY (`register_email_id`);

--
-- Chỉ mục cho bảng `lovaweb_stars`
--
ALTER TABLE `lovaweb_stars`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `lovaweb_uploads_tmp`
--
ALTER TABLE `lovaweb_uploads_tmp`
  ADD PRIMARY KEY (`upload_id`);

--
-- Chỉ mục cho bảng `lovaweb_vote`
--
ALTER TABLE `lovaweb_vote`
  ADD PRIMARY KEY (`vote_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `lovaweb_article`
--
ALTER TABLE `lovaweb_article`
  MODIFY `article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2017;

--
-- AUTO_INCREMENT cho bảng `lovaweb_article_menu`
--
ALTER TABLE `lovaweb_article_menu`
  MODIFY `article_menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=809;

--
-- AUTO_INCREMENT cho bảng `lovaweb_category`
--
ALTER TABLE `lovaweb_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `lovaweb_category_type`
--
ALTER TABLE `lovaweb_category_type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `lovaweb_constant`
--
ALTER TABLE `lovaweb_constant`
  MODIFY `constant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT cho bảng `lovaweb_contact`
--
ALTER TABLE `lovaweb_contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT cho bảng `lovaweb_core_privilege`
--
ALTER TABLE `lovaweb_core_privilege`
  MODIFY `privilege_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6447;

--
-- AUTO_INCREMENT cho bảng `lovaweb_core_role`
--
ALTER TABLE `lovaweb_core_role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `lovaweb_core_user`
--
ALTER TABLE `lovaweb_core_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `lovaweb_gallery`
--
ALTER TABLE `lovaweb_gallery`
  MODIFY `gallery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=899;

--
-- AUTO_INCREMENT cho bảng `lovaweb_gallery_menu`
--
ALTER TABLE `lovaweb_gallery_menu`
  MODIFY `gallery_menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT cho bảng `lovaweb_link`
--
ALTER TABLE `lovaweb_link`
  MODIFY `link_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2081;

--
-- AUTO_INCREMENT cho bảng `lovaweb_online`
--
ALTER TABLE `lovaweb_online`
  MODIFY `online_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38851;

--
-- AUTO_INCREMENT cho bảng `lovaweb_online_daily`
--
ALTER TABLE `lovaweb_online_daily`
  MODIFY `online_daily_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1325;

--
-- AUTO_INCREMENT cho bảng `lovaweb_order`
--
ALTER TABLE `lovaweb_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `lovaweb_others`
--
ALTER TABLE `lovaweb_others`
  MODIFY `others_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `lovaweb_others_menu`
--
ALTER TABLE `lovaweb_others_menu`
  MODIFY `others_menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT cho bảng `lovaweb_page`
--
ALTER TABLE `lovaweb_page`
  MODIFY `page_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT cho bảng `lovaweb_recuiment`
--
ALTER TABLE `lovaweb_recuiment`
  MODIFY `recuiment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT cho bảng `lovaweb_register_email`
--
ALTER TABLE `lovaweb_register_email`
  MODIFY `register_email_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `lovaweb_uploads_tmp`
--
ALTER TABLE `lovaweb_uploads_tmp`
  MODIFY `upload_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3540;

--
-- AUTO_INCREMENT cho bảng `lovaweb_vote`
--
ALTER TABLE `lovaweb_vote`
  MODIFY `vote_id` bigint(20) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
