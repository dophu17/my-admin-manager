-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2016 at 04:40 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myadminmanager`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci,
  `name_slug` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `icon` text COLLATE utf8_unicode_ci,
  `tag` text COLLATE utf8_unicode_ci,
  `orderby` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `last_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `name_slug`, `icon`, `tag`, `orderby`, `created_at`, `updated_at`, `last_user`) VALUES
(1, 'Đậu hữ thơm', 'dau-hu-thom', NULL, 'dauhuthom', NULL, '2016-10-07 14:26:09', NULL, 1),
(2, 'Category 111', 'category-111', '1475825191-before.png.png', 'category1', NULL, '2016-10-07 14:26:31', '2016-10-07 14:37:26', 1),
(3, 'Category 2', 'category-2', NULL, 'category2', 1, '2016-10-07 14:28:36', '2016-10-07 14:38:07', 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories_products`
--

CREATE TABLE `categories_products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `subject` text COLLATE utf8_unicode_ci,
  `from_name` text COLLATE utf8_unicode_ci,
  `from_email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `created_at` datetime DEFAULT NULL,
  `is_read` tinyint(1) DEFAULT NULL COMMENT '0: not read; 1:read'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `subject`, `from_name`, `from_email`, `content`, `created_at`, `is_read`) VALUES
(1, 'tets', 'phu', 'dophu17@gmail.com', 'test content', '2016-10-07 05:09:00', 0),
(2, 'tets 2', 'phu 2', 'dophu17@gmail.com', 'test content 2', '2016-10-07 11:10:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `news_id` int(11) DEFAULT NULL,
  `name` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci,
  `name_slug` text COLLATE utf8_unicode_ci,
  `avatar` text COLLATE utf8_unicode_ci,
  `description` text COLLATE utf8_unicode_ci,
  `content` text COLLATE utf8_unicode_ci,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `last_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `name`, `name_slug`, `avatar`, `description`, `content`, `created_at`, `updated_at`, `last_user`) VALUES
(3, 'News 1', 'news-1', '1477577142-timthumb.jpg', '<h1>Đ&agrave;o Chi Anh th&ocirc;i điều h&agrave;nh KAfe Group</h1>\r\n\r\n<h3>Một năm sau khi nhận được khoản đầu tư 5,5 triệu USD từ quỹ ngoại, Đ&agrave;o Chi Anh - s&aacute;ng lập vi&ecirc;n KAfe Group kh&ocirc;ng c&ograve;n giữ vai tr&ograve; điều h&agrave;nh hệ thống.</h3>\r\n', '<h1>Đ&agrave;o Chi Anh th&ocirc;i điều h&agrave;nh KAfe Group</h1>\r\n\r\n<h3>Một năm sau khi nhận được khoản đầu tư 5,5 triệu USD từ quỹ ngoại, Đ&agrave;o Chi Anh - s&aacute;ng lập vi&ecirc;n KAfe Group kh&ocirc;ng c&ograve;n giữ vai tr&ograve; điều h&agrave;nh hệ thống. &nbsp;</h3>\r\n\r\n<ul>\r\n	<li><a href="http://kinhdoanh.vnexpress.net/tin-tuc/khoi-nghiep/60-phut-quyet-dinh-5-5-trieu-usd-dau-tu-vao-start-up-cua-nu-dau-bep-3298396.html?utm_source=detail&amp;utm_medium=box_relatedtop&amp;utm_campaign=boxtracking" title="60 phút quyết định 5,5 triệu USD đầu tư vào start-up của nữ đầu bếp">60 ph&uacute;t quyết định 5,5 triệu USD đầu tư v&agrave;o start-up của nữ đầu bếp</a></li>\r\n</ul>\r\n\r\n<p>Ng&agrave;y 27/10, Đ&agrave;o Chi Anh - s&aacute;ng lập vi&ecirc;n&nbsp;C&ocirc;ng ty TNHH Ẩm thực KAfe (KAfe Group) cho biết đ&atilde; ngừng l&agrave;m việc với tư c&aacute;ch người điều h&agrave;nh của đơn vị n&agrave;y. Vị tr&iacute; Gi&aacute;m đốc điều h&agrave;nh (CEO) của KAfe Group sẽ được sớm d&agrave;nh cho một người kh&aacute;c đảm nhiệm, đồng thời Chi Anh kh&ocirc;ng c&ograve;n tham gia v&agrave;o hoạt động kinh doanh KAfe Group.&nbsp;</p>\r\n\r\n<p>Trao đổi với&nbsp;<em>VnExpress</em>, đại diện KAfe Group cho biết đ&acirc;y l&agrave; quyết định của ban l&atilde;nh đạo c&ocirc;ng ty v&agrave; c&aacute; nh&acirc;n nữ s&aacute;ng lập vi&ecirc;n. Đơn vị n&agrave;y đang cử một th&agrave;nh vi&ecirc;n Hội đồng quản trị điều h&agrave;nh doanh nghiệp trong thời gian t&igrave;m kiếm CEO mới. &nbsp;</p>\r\n\r\n<table align="center" border="0" cellpadding="3" cellspacing="0">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt="dao-chi-anh-thoi-dieu-hanh-kafe-group" data-pwidth="470.40625" data-width="357" src="http://img.f25.kinhdoanh.vnecdn.net/2016/10/27/dao-chi-anh-1-7881-1445250348-5303-1477567111.jpg" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Đ&agrave;o Chi Anh được coi l&agrave; tấm gương với nhiều người khởi nghiệp sau khi ph&aacute;t triển kh&aacute; th&agrave;nh c&ocirc;ng KAfe Group.</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Trong khi đ&oacute;, theo Cổng th&ocirc;ng tin đăng k&yacute; doanh nghiệp Quốc gia, ng&agrave;y 25/10, KAfe Group đ&atilde; thay đổi th&ocirc;ng tin về vốn điều lệ, tăng mạnh từ 16 tỷ đồng l&ecirc;n gần 245 tỷ. To&agrave;n bộ nguồn vốn của doanh nghiệp được đăng k&yacute; trước đ&acirc;y l&agrave; vốn tư nh&acirc;n th&igrave; nay được c&ocirc;ng bố l&agrave; vốn nước ngo&agrave;i. Tuy vậy, đại diện KAfe Group chưa x&aacute;c nhận th&ocirc;ng tin n&agrave;y.</p>\r\n\r\n<p>Đ&agrave;o Chi Anh sinh năm 1984 l&agrave; một đầu bếp v&agrave; t&aacute;c giả của những cuốn s&aacute;ch, chương tr&igrave;nh dạy nấu ăn đ&atilde; th&agrave;nh lập dự &aacute;n khởi nghiệp KAfe từ năm 2013. Đ&acirc;y l&agrave; chuỗi caf&eacute; phục vụ đồ ăn lai &Acirc;u-&Aacute; nhắm tới kh&aacute;ch h&agrave;ng trẻ, c&aacute; t&iacute;nh v&agrave; th&iacute;ch đồ ăn chất lượng, tươi, gi&aacute; cả phải chăng&nbsp;với 4 thương hiệu gồm The KAfe, The KAfe Village, The KAfe Box v&agrave; The Burger Box.&nbsp;</p>\r\n\r\n<p>C&aacute;ch đ&acirc;y một năm, dự &aacute;n nhận được khoản đầu tư 5,5 triệu USD (hơn 120 tỷ đồng) từ Cassia Investments - một c&ocirc;ng ty c&oacute; trụ sở ở Hong Kong (Trung Quốc), chuy&ecirc;n đầu tư v&agrave;o thị trường đại lục v&agrave; Đ&ocirc;ng Nam &Aacute;. Khi đ&oacute;, Chi Anh từng chia sẻ mục ti&ecirc;u trở th&agrave;nh chuỗi qu&aacute;n c&agrave; ph&ecirc; - nh&agrave; h&agrave;ng dẫn đầu Việt Nam trong 5 năm. Hiện KAfe Group c&oacute; 11 cửa h&agrave;ng tại H&agrave; Nội v&agrave; 3 địa điểm tại TP HCM.&nbsp;</p>\r\n\r\n<p><strong>Ngọc Tuy&ecirc;n</strong></p>\r\n', '2016-10-27 21:05:42', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci,
  `name_slug` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` text COLLATE utf8_unicode_ci,
  `price` double DEFAULT NULL,
  `price_promotion` double DEFAULT NULL,
  `color` text COLLATE utf8_unicode_ci,
  `weight` float DEFAULT NULL,
  `height` float DEFAULT NULL,
  `made_in` text COLLATE utf8_unicode_ci,
  `version_year` int(4) DEFAULT NULL,
  `model` text COLLATE utf8_unicode_ci,
  `tag` text COLLATE utf8_unicode_ci,
  `description` text COLLATE utf8_unicode_ci,
  `status` tinyint(1) DEFAULT NULL COMMENT '0: stock; 1: not stock',
  `orderby` int(11) DEFAULT NULL,
  `is_feature` int(11) DEFAULT NULL,
  `is_new` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `last_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `name_slug`, `avatar`, `price`, `price_promotion`, `color`, `weight`, `height`, `made_in`, `version_year`, `model`, `tag`, `description`, `status`, `orderby`, `is_feature`, `is_new`, `created_at`, `updated_at`, `last_user`) VALUES
(1, 'sản phẩm 1', 'san-pham-1', '1477218792-hinh-nen-dien-thoai-dep-nhat-7.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p><strong>Thời Tam Quốc ph&acirc;n tranh, đ&atilde; chứng kiến sự xuất hiện của c&aacute;c anh h&ugrave;ng c&aacute;i thế, những vị qu&acirc;n sư lỗi lạc v&agrave; những mưu kế l&agrave;m thay đổi cả b&aacute;nh xe lịch sử. Sau đ&acirc;y l&agrave; những mưu kế nổi bật nhất được đời đời truyền tụng, như những giai thoại c&oacute; một kh&ocirc;ng hai trong sử s&aacute;ch.</strong></p>\r\n\r\n<p><em>Tiếp theo&nbsp;<a href="http://www.daikynguyenvn.com/van-hoa/van-hoa-truyen-thong/nhung-muu-ke-noi-tieng-nhat-thoi-tam-quoc.html">phần 1</a>,&nbsp;<a href="http://www.daikynguyenvn.com/van-hoa/nhung-muu-ke-loi-hai-nhat-tung-duoc-gia-cat-luong-tu-ma-y-va-cac-anh-hung-tam-quoc-su-dung-phan-1.html">phần 2</a>&nbsp;v&agrave;&nbsp;<a href="http://www.daikynguyenvn.com/van-hoa/12-muu-ke-noi-tieng-nhat-thoi-dai-gia-cat-luong-van-con-gia-tri-den-ngay-nay-phan-3.html">phần 3</a></em></p>\r\n\r\n<p><strong>1. B&agrave;ng Thống hiến Li&ecirc;n ho&agrave;n kế cho T&agrave;o Th&aacute;o</strong></p>\r\n\r\n<p>T&agrave;o Th&aacute;o diệt Vi&ecirc;n Thiệu, ph&aacute; Kinh Ch&acirc;u, mang 80 vạn qu&acirc;n theo Trường Giang tiến về ph&iacute;a đ&ocirc;ng. Đại qu&acirc;n dừng lại ở H&aacute;n Giang, T&agrave;o Th&aacute;o trỏ roi về Giang Đ&ocirc;ng, c&oacute; &yacute; muốn thống nhất thi&ecirc;n hạ. Tuy nhi&ecirc;n, Tướng sĩ qu&acirc;n T&agrave;o đều l&agrave; người phương bắc, kh&ocirc;ng quen thủy thổ. Khi tập luyện tr&ecirc;n s&ocirc;ng, qu&acirc;n sĩ bị s&oacute;ng gi&oacute; l&agrave;m cho n&ocirc;n mửa, hoa mắt ch&oacute;ng mặt. B&agrave;ng Thống vốn l&agrave; một mưu sĩ ở đất Giang Đ&ocirc;ng đến gặp T&agrave;o Th&aacute;o, hiến kế:</p>\r\n\r\n<p>&ldquo;<em>Nếu d&ugrave;ng d&acirc;y th&eacute;p buộc chặt thuyền lớn thuyền nhỏ v&agrave;o với nhau, cứ 30 hoặc 50 thuyền l&agrave;m một, ở tr&ecirc;n, trải v&aacute;n gỗ, thứ nhất tướng sĩ c&oacute; thể đi tr&ecirc;n thuyền như tr&ecirc;n đất bằng, chiến m&atilde; cũng c&oacute; thể đi lại, thứ hai l&agrave; li&ecirc;n ho&agrave;n lại, thể t&iacute;ch của chiến thuyền rất lớn, c&oacute; thể giảm được c&aacute;i khổ v&igrave; tr&ograve;ng tr&agrave;nh, s&oacute;ng gi&oacute; tr&ecirc;n s&ocirc;ng kh&ocirc;ng c&ograve;n đ&aacute;ng sợ nữa.</em>&ldquo;</p>\r\n\r\n<p><img alt="v" src="https://daikynguyenvn.com/wp-content/uploads/2016/10/Untitled-1-17.jpg" style="height:400px; width:800px" /></p>\r\n\r\n<p>B&agrave;ng Thống hiến kế buộc thuyền cho T&agrave;o Th&aacute;o, khiến Th&aacute;o mừng rỡ v&igrave; giải được mối lo lớn nhất.</p>\r\n\r\n<p>T&agrave;o Th&aacute;o liền nghe theo. B&agrave;ng Thống lại n&oacute;i dối rằng phải về Giang Đ&ocirc;ng khuy&ecirc;n Chu Du của Đ&ocirc;ng Ng&ocirc; đầu h&agrave;ng. Th&aacute;o cũng gật đầu ưng thuận kh&ocirc;ng ch&uacute;t nghi ngờ.</p>\r\n\r\n<p><iframe frameborder="0" height="360" src="http://video.daikynguyenvn.com/embed.php?vid=3bb80ffcb" width="640"></iframe></p>\r\n\r\n<p>T&agrave;o Th&aacute;o đương nhi&ecirc;n kh&ocirc;ng biết ở Đ&ocirc;ng Ng&ocirc;, đại đ&ocirc; đốc Chu Du đ&atilde;&nbsp;sớm đ&atilde; c&oacute; một kế hoạch tỉ mỉ. Chu Du nhờ B&agrave;ng Thống bầy kế li&ecirc;n ho&agrave;n thuyền, khiến cho c&aacute;c chiến thuyền của T&agrave;o Th&aacute;o kh&oacute;a chặt v&agrave;o với nhau, để tiện đ&aacute;nh hỏa c&ocirc;ng. Chu Du c&ograve;n kết hợp với l&atilde;o tướng Ho&agrave;ng C&aacute;i sử dụng khổ nhục kế. Ho&agrave;ng C&aacute;i bị đ&aacute;nh&nbsp;đến toạc da r&aacute;ch thịt, sau đ&oacute; gửi cho T&agrave;o Th&aacute;o một bức mật thư xin l&agrave;m nội ứng để giết Chu Du.</p>\r\n', NULL, NULL, NULL, NULL, NULL, '2016-10-23 17:53:01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `key` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `value` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `default_value` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `label` text COLLATE utf8_unicode_ci,
  `description` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `default_value`, `label`, `description`) VALUES
(1, '1', '11', '10', 'Pagination admin', 'Pagination in page admin only'),
(2, '2', '6', '5', 'Pagination public', 'Pagination in page public only');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `title1` text COLLATE utf8_unicode_ci,
  `title2` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sex` tinyint(4) DEFAULT NULL COMMENT '1:men; 0: women',
  `avatar` text COLLATE utf8_unicode_ci,
  `address` text COLLATE utf8_unicode_ci,
  `birthday` date DEFAULT NULL,
  `phone` int(12) DEFAULT NULL,
  `fax` int(12) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `last_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `sex`, `avatar`, `address`, `birthday`, `phone`, `fax`, `created_at`, `updated_at`, `last_user`) VALUES
(1, 'dophu17', 'dophu17@gmail.com', '$2y$10$somMbRc6oyI7y4yfNRp09u98F0Eb4yTnDSzakHY2Kd8QxdkXQo35y', 'TWrEVOFHKfO6ONQCzi7YbwCbCBOXG6bvOoLbJlh9WdL3ThW3iOgGNU3dLuCG', NULL, '1475809344-Untitled6.png', NULL, '1970-01-01', NULL, NULL, NULL, '2016-10-07 03:02:24', 1),
(2, 'phu', 'phu.dht@chiroro.com.vn', '$2y$10$Y6ZOTnKdviqSrZguinm/.eEEjkbMq6GtdW0f/l70pe3Eou3jKJd3y', 'e90Uc2usV8sePgreCPzFhWnDRBM88xiIzwesE5O6HDVV43Lr83YMdGg6PhFm', NULL, NULL, NULL, NULL, NULL, NULL, '2016-09-19 05:35:11', '2016-09-19 05:35:18', NULL),
(4, 'phu', 'dophu177@gmail.com', '$2y$10$7PRV/26G.URAWegbRz1D6OOp4ZoZaU3N8RIAmdVLiW5LGicg4GYYq', NULL, 1, NULL, '165 Thoai Ngoc Hau', '1994-07-01', 1696452584, 22222, '2016-10-02 06:25:53', NULL, 1),
(5, 'phu 2', 'dophu1771@gmail.com', '$2y$10$ej4OazRFd6/8fUCEoJmW6OxLFo2cAZwcRPm7/fCvARV4jDeX2h6OO', NULL, 1, NULL, '165 Thoai Ngoc Hau', '1993-07-01', 1696452584, 22222, '2016-10-02 06:44:39', NULL, 1),
(6, 'phu 3', 'dophu17717@gmail.com', '$2y$10$KP17Qr3aNTHA1M7V2J9JMeLZZ6Usc7V40lUpEduGjL6TKAA7Zsmpa', NULL, 1, NULL, '165 Thoai Ngoc Hau', '1993-07-01', 1696452584, 22222, '2016-10-02 06:45:21', NULL, 1),
(7, 'phu', 'dophu1718@gmail.com', '123456', NULL, 1, NULL, '165 Thoai Ngoc Hau', '1993-07-01', 1696452584, 22222, '2016-10-02 07:00:29', NULL, 1),
(8, 'phu', 'dophu17188@gmail.com', '123456', NULL, NULL, NULL, '165 Thoai Ngoc Hau', '1993-07-01', 1696452584, 22222, '2016-10-02 07:02:57', NULL, 1),
(9, 'do phu 22222', 'dophu0000@gmail.com', '$2y$10$ky03WYqqDAK1Tepwntu9muK/v3LojM5BmgggRbBU7wX2DEFD4hXC6', NULL, NULL, NULL, NULL, '1970-01-01', NULL, NULL, '2016-10-02 07:13:25', NULL, 1),
(10, 'phu upload 33334', 'dophu176666@gmail.com', '$2y$10$u9vSWzoif7AN/swDp/q6X.hJQssGFkdOs15sEHVbzLCnwIuK9nzTi', NULL, NULL, '1475591423-hinh-nen-dien-thoai-dep-nhat-7.jpg', '165 Thoai Ngoc Hau', '1970-01-01', NULL, NULL, '2016-10-02 08:03:20', '2016-10-04 14:39:15', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories_products`
--
ALTER TABLE `categories_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `categories_products`
--
ALTER TABLE `categories_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
