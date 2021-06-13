-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 13, 2021 lúc 02:36 AM
-- Phiên bản máy phục vụ: 10.4.18-MariaDB
-- Phiên bản PHP: 7.4.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qlks`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `age`
--

CREATE TABLE `age` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `publish` tinyint(1) NOT NULL,
  `sort` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `age`
--

INSERT INTO `age` (`id`, `name`, `publish`, `sort`, `created_at`, `updated_at`) VALUES
(1, '< 30', 1, 2, '2021-05-16 00:28:19', '2021-05-16 00:28:42'),
(2, '30 - 40', 1, 3, '2021-05-17 08:24:26', NULL),
(3, '41 - 50', 1, 4, '2021-05-17 08:24:34', '2021-05-30 03:59:43'),
(4, '51 - 60', 1, 5, '2021-05-17 08:24:44', NULL),
(5, '> 60', 1, 6, '2021-05-17 08:24:50', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `branch`
--

CREATE TABLE `branch` (
  `id` int(11) NOT NULL,
  `parentid` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `publish` tinyint(1) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `branch`
--

INSERT INTO `branch` (`id`, `parentid`, `name`, `publish`, `created_at`, `updated_at`) VALUES
(1, 0, 'Khoa công nghệ thông tin', 1, '2021-05-15 23:05:17', NULL),
(2, 1, 'Kỹ thuật phần mềm', 1, '2021-05-15 23:05:24', NULL),
(3, 1, 'Khoa học máy tính', 1, '2021-05-16 07:11:55', NULL),
(4, 1, 'Hệ thống thông tin', 1, '2021-05-16 07:12:10', NULL),
(5, 0, 'Điện', 1, '2021-05-16 07:12:16', NULL),
(6, 5, 'Điện điện tử', 1, '2021-05-16 07:12:25', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `id_gv` int(11) NOT NULL,
  `id_content` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`id`, `id_gv`, `id_content`, `status`) VALUES
(61, 5, 6, 1),
(62, 5, 5, 2),
(63, 5, 4, 3),
(64, 5, 3, 2),
(65, 5, 2, 3),
(66, 5, 11, 2),
(67, 5, 10, 3),
(68, 5, 9, 2),
(69, 5, 8, 3),
(70, 5, 7, 2),
(71, 6, 6, 2),
(72, 6, 5, 2),
(73, 6, 4, 1),
(74, 6, 3, 2),
(75, 6, 2, 3),
(76, 6, 11, 2),
(77, 6, 10, 1),
(78, 6, 9, 2),
(79, 6, 8, 2),
(80, 6, 7, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment_ntd`
--

CREATE TABLE `comment_ntd` (
  `id` int(11) NOT NULL,
  `id_ntd` int(11) NOT NULL,
  `id_content` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comment_ntd`
--

INSERT INTO `comment_ntd` (`id`, `id_ntd`, `id_content`, `status`) VALUES
(71, 16, 16, 3),
(72, 16, 15, 2),
(73, 16, 14, 2),
(74, 16, 13, 3),
(75, 16, 12, 2),
(76, 16, 21, 2),
(77, 16, 20, 3),
(78, 16, 19, 2),
(79, 16, 18, 2),
(80, 16, 17, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `content`
--

CREATE TABLE `content` (
  `id` int(11) NOT NULL,
  `id_criteria` int(11) NOT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `content`
--

INSERT INTO `content` (`id`, `id_criteria`, `content`, `created_at`, `updated_at`) VALUES
(2, 6, 'Tầm nhìn , sứ mạng và văn hóa của CSGD đáp ứng nhu cầu và sự hài lòng của các bên liên quan', '2021-05-17 08:10:56', NULL),
(3, 6, 'Cơ sở vật chất , các phương tiện dạy học , các phòng thí nghiệm thiết bị và công cụ đáp ứng nhu cầu về đào tạo , NCKH và phục vụ cộng đồng', '2021-05-17 08:12:24', NULL),
(4, 6, 'Kế hoạch chiến lược ĐBCL ( bao gồm chiến lược , chính sách, sự tham gia của các bên liên quan, các hoạt động ) thể hiện việc thúc đẩy công tác ĐBCL và tập huấn nâng cao năng lực', '2021-05-17 08:14:02', NULL),
(5, 6, 'Cơ chế phản hồi của các bên liên quan thể hiện rõ ràng', '2021-05-17 08:14:50', NULL),
(6, 6, 'Cơ chế phản hồi của các bên liên quan phù hợp', '2021-05-17 08:15:09', NULL),
(7, 7, 'Quy trình thiết kế và phát triển chương trình dạy học( CTDH ) rõ ràng', '2021-05-17 08:18:22', NULL),
(8, 7, 'Mục tiêu của chương trình đào tạo( CTĐT ) xác định rõ ràng', '2021-05-17 08:18:53', NULL),
(9, 7, 'Mục tiêu của CTĐT phù hợp với sứ mạng và tầm nhìn của Trường', '2021-05-17 08:19:53', NULL),
(10, 7, 'Mục tiêu của CTĐT phù hợp với muc tiêu của giáo dục đại học quy định tại Luật giáo dục đại học', '2021-05-17 08:20:41', NULL),
(11, 7, 'Chuẩn đầu ra ( CĐR ) của CTĐT được xác định rõ ràng', '2021-05-17 08:21:10', NULL),
(12, 9, 'Tầm nhìn , sứ mạng và văn hóa của CSGD đáp ứng nhu cầu và sự hài lòng của các bên liên quan', '2021-06-01 10:07:43', NULL),
(13, 9, '	Cơ sở vật chất , các phương tiện dạy học , các phòng thí nghiệm thiết bị và công cụ đáp ứng nhu cầu về đào tạo , NCKH và phục vụ cộng đồng', '2021-06-01 10:07:49', NULL),
(14, 9, 'Kế hoạch chiến lược ĐBCL ( bao gồm chiến lược , chính sách, sự tham gia của các bên liên quan, các hoạt động ) thể hiện việc thúc đẩy công tác ĐBCL và tập huấn nâng cao năng lực', '2021-06-01 10:07:56', NULL),
(15, 9, 'Cơ chế phản hồi của các bên liên quan thể hiện rõ ràng', '2021-06-01 10:08:04', NULL),
(16, 9, 'Cơ chế phản hồi của các bên liên quan phù hợp', '2021-06-01 10:08:10', NULL),
(17, 10, 'Chuẩn đầu ra ( CĐR ) của CTĐT được xác định rõ ràng', '2021-06-01 10:08:43', NULL),
(18, 10, 'Mục tiêu của CTĐT phù hợp với muc tiêu của giáo dục đại học quy định tại Luật giáo dục đại học', '2021-06-01 10:08:49', NULL),
(19, 10, 'Mục tiêu của CTĐT phù hợp với sứ mạng và tầm nhìn của Trường', '2021-06-01 10:08:54', NULL),
(20, 10, 'Mục tiêu của chương trình đào tạo( CTĐT ) xác định rõ ràng', '2021-06-01 10:09:00', NULL),
(21, 10, '	Quy trình thiết kế và phát triển chương trình dạy học( CTDH ) rõ ràng', '2021-06-01 10:09:05', NULL),
(22, 2, 'Cơ chế phản hồi của các bên liên quan phù hợp', '2021-06-09 07:52:40', NULL),
(23, 2, 'Cơ chế phản hồi của các bên liên quan thể hiện rõ ràng', '2021-06-09 07:52:47', NULL),
(24, 2, 'Kế hoạch chiến lược ĐBCL ( bao gồm chiến lược , chính sách, sự tham gia của các bên liên quan, các hoạt động ) thể hiện việc thúc đẩy công tác ĐBCL và tập huấn nâng cao năng lực', '2021-06-09 07:52:54', NULL),
(25, 2, 'Cơ sở vật chất , các phương tiện dạy học , các phòng thí nghiệm thiết bị và công cụ đáp ứng nhu cầu về đào tạo , NCKH và phục vụ cộng đồng', '2021-06-09 07:53:01', NULL),
(26, 2, 'Tầm nhìn , sứ mạng và văn hóa của CSGD đáp ứng nhu cầu và sự hài lòng của các bên liên quan', '2021-06-09 07:53:07', NULL),
(27, 11, 'Chuẩn đầu ra ( CĐR ) của CTĐT được xác định rõ ràng', '2021-06-09 07:53:22', NULL),
(28, 11, 'Mục tiêu của CTĐT phù hợp với muc tiêu của giáo dục đại học quy định tại Luật giáo dục đại học', '2021-06-09 07:53:28', NULL),
(29, 11, 'Mục tiêu của CTĐT phù hợp với sứ mạng và tầm nhìn của Trường', '2021-06-09 07:53:33', NULL),
(30, 11, 'Mục tiêu của chương trình đào tạo( CTĐT ) xác định rõ ràng', '2021-06-09 07:53:38', NULL),
(31, 11, '	Quy trình thiết kế và phát triển chương trình dạy học( CTDH ) rõ ràng', '2021-06-09 07:53:43', NULL),
(32, 4, 'Tầm nhìn , sứ mạng và văn hóa của CSGD đáp ứng nhu cầu và sự hài lòng của các bên liên quan', '2021-06-13 01:39:47', NULL),
(33, 4, '	Cơ sở vật chất , các phương tiện dạy học , các phòng thí nghiệm thiết bị và công cụ đáp ứng nhu cầu về đào tạo , NCKH và phục vụ cộng đồng', '2021-06-13 01:39:52', NULL),
(34, 4, '	Kế hoạch chiến lược ĐBCL ( bao gồm chiến lược , chính sách, sự tham gia của các bên liên quan, các hoạt động ) thể hiện việc thúc đẩy công tác ĐBCL và tập huấn nâng cao năng lực', '2021-06-13 01:39:58', NULL),
(35, 4, '	Cơ chế phản hồi của các bên liên quan thể hiện rõ ràng', '2021-06-13 01:40:03', NULL),
(36, 4, 'Cơ chế phản hồi của các bên liên quan phù hợp', '2021-06-13 01:40:10', NULL),
(38, 12, '	Mục tiêu của chương trình đào tạo( CTĐT ) xác định rõ ràng', '2021-06-13 01:40:38', NULL),
(39, 12, 'Mục tiêu của CTĐT phù hợp với sứ mạng và tầm nhìn của Trường', '2021-06-13 01:40:44', NULL),
(40, 12, 'Mục tiêu của CTĐT phù hợp với muc tiêu của giáo dục đại học quy định tại Luật giáo dục đại học', '2021-06-13 01:40:49', NULL),
(41, 12, 'Chuẩn đầu ra ( CĐR ) của CTĐT được xác định rõ ràng', '2021-06-13 01:40:56', NULL),
(42, 12, 'Quy trình thiết kế và phát triển chương trình dạy học( CTDH ) rõ ràng', '2021-06-13 01:54:03', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contentcmt`
--

CREATE TABLE `contentcmt` (
  `id` int(11) NOT NULL,
  `tieuchi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parentid` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `contentcmt`
--

INSERT INTO `contentcmt` (`id`, `tieuchi`, `parentid`, `created_at`) VALUES
(1, 'Về kỹ năng, kiến thức', 0, '2021-05-31 11:09:43'),
(3, 'Kiến thức chuyên ngành', 1, '2021-05-31 11:12:16'),
(4, 'Kỹ năng sử dụng ngoại ngữ', 1, '2021-05-31 11:15:57'),
(5, 'Kỹ năng sử dụng CNTT', 1, '2021-05-31 11:16:12'),
(6, 'Mức tự chủ và trách nhiệm', 0, '2021-05-31 11:16:24'),
(7, 'Hăng hái,nhiệt tình đối với công việc', 6, '2021-05-31 11:17:09'),
(8, 'Năng động sáng tạo trong công việc', 6, '2021-05-31 11:17:30'),
(9, 'Có tinh thần học hỏi,khắc phục mọi khó khăn để vươn lên', 6, '2021-05-31 11:18:01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `co_so`
--

CREATE TABLE `co_so` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `co_so`
--

INSERT INTO `co_so` (`id`, `name`) VALUES
(1, 'Thư viện, thư viện số'),
(2, 'Phòng thí nghiệm'),
(3, 'Phòng máy tính'),
(4, 'Mạng internet'),
(5, 'Phòng học lý thuyết');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `criteria`
--

CREATE TABLE `criteria` (
  `id` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `publish` tinyint(1) NOT NULL,
  `sort` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `criteria`
--

INSERT INTO `criteria` (`id`, `id_role`, `name`, `publish`, `sort`, `created_at`, `updated_at`) VALUES
(2, 2, 'Chiến lược,chính sách,cơ chế', 1, 3, '2021-05-15 23:19:27', NULL),
(4, 3, 'Chiến lược,chính sách,cơ chế', 1, 1, '2021-05-15 23:22:53', NULL),
(6, 4, 'Chiến lược,chính sách,cơ chế', 1, 1, '2021-05-17 08:09:58', NULL),
(7, 4, 'Mục tiêu ,CĐR , bản mô tả CTĐT , phương pháp dạy học và học , đánh giá kết quả học tập', 1, 2, '2021-05-17 08:17:43', NULL),
(9, 1, 'Chiến lược,chính sách,cơ chế', 1, 1, '2021-06-01 10:07:06', NULL),
(10, 1, 'Mục tiêu ,CĐR , bản mô tả CTĐT , phương pháp dạy học và học , đánh giá kết quả học tập', 1, 2, '2021-06-01 10:08:22', NULL),
(11, 2, 'Mục tiêu ,CĐR , bản mô tả CTĐT , phương pháp dạy học và học , đánh giá kết quả học tập', 1, 4, '2021-06-09 07:52:11', NULL),
(12, 3, 'Mục tiêu ,CĐR , bản mô tả CTĐT , phương pháp dạy học và học , đánh giá kết quả học tập', 1, 2, '2021-06-13 01:40:21', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `daotao`
--

CREATE TABLE `daotao` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `daotao`
--

INSERT INTO `daotao` (`id`, `name`) VALUES
(1, 'Thực hành'),
(2, 'Các môn cơ sở ngành'),
(3, 'Các môn chuyên ngành'),
(4, 'Các môn khoa học cơ bản'),
(5, 'Tham quan thực tế'),
(6, 'Kỹ năng mềm'),
(7, 'Đồ án môn học'),
(8, 'Thực tập tốt nghiệp');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giangvien`
--

CREATE TABLE `giangvien` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `id_level` int(11) NOT NULL,
  `id_age` int(11) NOT NULL,
  `date_cmt` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `giangvien`
--

INSERT INTO `giangvien` (`id`, `fullname`, `gender`, `id_level`, `id_age`, `date_cmt`) VALUES
(5, 'Võ Khánh Duy', 'Nam', 6, 2, '2021-05-30'),
(6, 'Võ Khánh Duy', 'Nam', 6, 2, '2021-05-30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoatdong`
--

CREATE TABLE `hoatdong` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hoatdong`
--

INSERT INTO `hoatdong` (`id`, `name`) VALUES
(1, 'Công nghiệp,đầu tư,xây dựng'),
(2, 'Nông nghiệp, lâm nghiệp, thủy sản'),
(3, 'Vận tải, bưu chính, Viễn thông, CNTT'),
(4, 'Thương mại, du lịch'),
(5, 'Giáo dục'),
(6, 'Y tế');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `info_oldsv`
--

CREATE TABLE `info_oldsv` (
  `id` int(11) NOT NULL,
  `hoten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gioitinh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ngaysinh` date NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `chuyennganh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tencoquan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `diachi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `thunhap` int(11) NOT NULL,
  `van_dung` int(11) NOT NULL,
  `id_lhcoquan` int(11) NOT NULL,
  `id_mucdo` int(11) NOT NULL,
  `start` year(4) NOT NULL,
  `end` year(4) NOT NULL,
  `y_kien` text COLLATE utf8_unicode_ci NOT NULL,
  `status_job` int(11) NOT NULL,
  `status_job_month` int(11) NOT NULL,
  `status_right` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `info_sv`
--

CREATE TABLE `info_sv` (
  `id` int(11) NOT NULL,
  `hoten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gioitinh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `chuyennganh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `diachi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `start` year(4) NOT NULL,
  `end` year(4) NOT NULL,
  `y_kien` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `info_sv`
--

INSERT INTO `info_sv` (`id`, `hoten`, `gioitinh`, `chuyennganh`, `diachi`, `email`, `start`, `end`, `y_kien`) VALUES
(1, 'Võ Khánh Duy', 'Nam', 'Kỹ thuật phần mềm', 'Cần Thơ', 'vkduy240398@gmail.com', 2016, 2020, 'sdasd'),
(2, 'Võ Khánh Duy', 'Nam', 'Kỹ thuật phần mềm', 'Cần Thơ', 'vkduy240398@gmail.com', 2016, 2020, ''),
(3, 'Võ Khánh Duy', 'Nam', 'Kỹ thuật phần mềm', 'Cần Thơ', 'vkduy240398@gmail.com', 2016, 2020, 'sdasd');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `level`
--

CREATE TABLE `level` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `publish` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `level`
--

INSERT INTO `level` (`id`, `name`, `publish`, `created_at`, `updated_at`) VALUES
(1, 'Tiến sĩ', 1, '2021-05-15 22:50:58', '2021-05-15 22:51:32'),
(2, 'Phó giáo sư', 1, '2021-05-15 22:52:02', NULL),
(3, 'Giáo sư, viện sĩ', 1, '2021-05-15 22:52:16', NULL),
(4, 'Thạc sĩ', 1, '2021-05-15 22:52:23', NULL),
(5, 'Đại học', 1, '2021-05-15 22:52:32', NULL),
(6, 'Tiến sĩ khoa học', 1, '2021-05-15 22:52:41', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lh_coquan`
--

CREATE TABLE `lh_coquan` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `lh_coquan`
--

INSERT INTO `lh_coquan` (`id`, `name`) VALUES
(1, 'Cơ quan / doanh  nghiệp nhà nước'),
(2, 'Doanh nghiệp tư nhân'),
(3, 'Doanh nghiệp liên doanh nước ngoài'),
(4, 'Tự tạo việc làm');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaihinh`
--

CREATE TABLE `loaihinh` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loaihinh`
--

INSERT INTO `loaihinh` (`id`, `name`) VALUES
(1, 'Nhà nước'),
(2, 'Liên doanh'),
(3, 'Tổ chức phi chính phủ'),
(4, 'Cổ phần'),
(5, 'Trách nhiệm hữu hạn'),
(6, ' 100% vốn nước ngoài'),
(7, 'Tư nhân');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2021-05-05-071150', 'App\\Database\\Migrations\\Users', 'default', 'App', 1621092439, 1),
(2, '2021-05-14-173800', 'App\\Database\\Migrations\\Role', 'default', 'App', 1621092439, 1),
(3, '2021-05-14-220609', 'App\\Database\\Migrations\\Branch', 'default', 'App', 1621092439, 1),
(4, '2021-05-15-061135', 'App\\Database\\Migrations\\Criteria', 'default', 'App', 1621092440, 1),
(5, '2021-05-15-072524', 'App\\Database\\Migrations\\Content', 'default', 'App', 1621092440, 1),
(6, '2021-05-15-154335', 'App\\Database\\Migrations\\Level', 'default', 'App', 1621093526, 2),
(7, '2021-05-15-155730', 'App\\Database\\Migrations\\Age', 'default', 'App', 1621099333, 3),
(8, '2021-05-15-212156', 'App\\Database\\Migrations\\UserThird', 'default', 'App', 1621114156, 4),
(9, '2021-05-17-012256', 'App\\Database\\Migrations\\Comment', 'default', 'App', 1621988012, 5),
(10, '2021-05-29-214526', 'App\\Database\\Migrations\\Giangvien', 'default', 'App', 1622324838, 6),
(11, '2021-05-31-035332', 'App\\Database\\Migrations\\Nhatuyendung', 'default', 'App', 1622433372, 7),
(12, '2021-05-31-040047', 'App\\Database\\Migrations\\ContentCmt', 'default', 'App', 1622433757, 8),
(14, '2021-06-02-012703', 'App\\Database\\Migrations\\CommentNtd', 'default', 'App', 1622597566, 9),
(15, '2021-06-02-013313', 'App\\Database\\Migrations\\NganhTuyenDung', 'default', 'App', 1622597653, 10),
(16, '2021-06-02-013440', 'App\\Database\\Migrations\\NoiDungNtd', 'default', 'App', 1622599620, 11),
(17, '2021-06-03-020150', 'App\\Database\\Migrations\\Loaihinh', 'default', 'App', 1622685962, 12),
(18, '2021-06-03-021359', 'App\\Database\\Migrations\\Hoatdong', 'default', 'App', 1622686496, 13),
(19, '2021-06-03-021808', 'App\\Database\\Migrations\\Vitri', 'default', 'App', 1622686985, 14),
(20, '2021-06-03-023306', 'App\\Database\\Migrations\\Phamvi', 'default', 'App', 1622687618, 15),
(21, '2021-06-03-023652', 'App\\Database\\Migrations\\Mucdo', 'default', 'App', 1622687843, 16),
(22, '2021-06-05-183406', 'App\\Database\\Migrations\\InfoGeneral', 'default', 'App', 1622918411, 17),
(24, '2021-06-05-192130', 'App\\Database\\Migrations\\LhCoquan', 'default', 'App', 1622924154, 18),
(25, '2021-06-05-192241', 'App\\Database\\Migrations\\Chuyenmon', 'default', 'App', 1622924155, 18),
(26, '2021-06-05-192340', 'App\\Database\\Migrations\\Yeuto', 'default', 'App', 1622924155, 18),
(29, '2021-06-05-201426', 'App\\Database\\Migrations\\CoSo', 'default', 'App', 1622924156, 18),
(30, '2021-06-05-192652', 'App\\Database\\Migrations\\Nguyennhan', 'default', 'App', 1622925719, 19),
(31, '2021-06-05-192957', 'App\\Database\\Migrations\\Daotao', 'default', 'App', 1622930059, 20),
(32, '2021-06-05-190425', 'App\\Database\\Migrations\\InfoOldsv', 'default', 'App', 1623038663, 21),
(33, '2021-06-09-030935', 'App\\Database\\Migrations\\OldNguyennhan', 'default', 'App', 1623208280, 22),
(34, '2021-06-09-031904', 'App\\Database\\Migrations\\OldSvyeuto', 'default', 'App', 1623208804, 23),
(35, '2021-06-11-212615', 'App\\Database\\Migrations\\OldSvdaotao', 'default', 'App', 1623446886, 24),
(36, '2021-06-11-215750', 'App\\Database\\Migrations\\OldSvcoso', 'default', 'App', 1623448714, 25),
(37, '2021-06-12-013636', 'App\\Database\\Migrations\\OldSvCmt', 'default', 'App', 1623461943, 26),
(38, '2021-06-12-183415', 'App\\Database\\Migrations\\InfoSv', 'default', 'App', 1623524072, 27),
(39, '2021-06-12-185454', 'App\\Database\\Migrations\\CommnentSv', 'default', 'App', 1623524145, 28);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mucdo`
--

CREATE TABLE `mucdo` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `mucdo`
--

INSERT INTO `mucdo` (`id`, `name`) VALUES
(1, 'Đáp ứng yêu cầu của công việc , có thể sử dụng được ngay'),
(2, 'Cơ bản đáp ứng yêu cầu của công việc nhưng phải đào tạo thêm'),
(3, 'Phải đào tạo lại hoặc đào tạo bổ sung ít nhất 6 tháng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nganh_tuyen_dung`
--

CREATE TABLE `nganh_tuyen_dung` (
  `id` int(11) NOT NULL,
  `id_ntd` int(11) NOT NULL,
  `id_branch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nganh_tuyen_dung`
--

INSERT INTO `nganh_tuyen_dung` (`id`, `id_ntd`, `id_branch`) VALUES
(18, 16, 6),
(19, 16, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguyennhan`
--

CREATE TABLE `nguyennhan` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nguyennhan`
--

INSERT INTO `nguyennhan` (`id`, `name`) VALUES
(1, 'Tiếp tục học nâng cao'),
(2, 'Chưa có ý định tìm việc'),
(3, 'Nhu cầu tuyển dụng ít'),
(4, 'Trình độ ngoại ngữ chưa đáp ứng'),
(5, 'Thiếu kinh nghiệm làm việc'),
(6, 'Thiếu thông tin việc làm');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhatuyendung`
--

CREATE TABLE `nhatuyendung` (
  `id` int(11) NOT NULL,
  `hoten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `chucvu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tencoquan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `diachi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sodienthoai` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `loaihinh` int(11) NOT NULL,
  `hoatdong` int(11) NOT NULL,
  `posi` int(11) NOT NULL,
  `each_data` int(11) NOT NULL,
  `data_tuyendung` int(11) NOT NULL,
  `dapung` int(11) NOT NULL,
  `number_sv` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhatuyendung`
--

INSERT INTO `nhatuyendung` (`id`, `hoten`, `chucvu`, `tencoquan`, `diachi`, `sodienthoai`, `email`, `loaihinh`, `hoatdong`, `posi`, `each_data`, `data_tuyendung`, `dapung`, `number_sv`, `created_at`) VALUES
(16, 'Võ Khánh Duy', 'giám đốc', 'optech', 'Cần Thơ', '0982824398', 'vkduy240398@gmail.com', 7, 6, 3, 3, 6, 3, 0, '2021-06-13 07:21:15');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `noidungntd`
--

CREATE TABLE `noidungntd` (
  `id` int(11) NOT NULL,
  `id_ntd` int(11) NOT NULL,
  `id_contentcmt` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `noidungntd`
--

INSERT INTO `noidungntd` (`id`, `id_ntd`, `id_contentcmt`, `status`) VALUES
(61, 16, 9, 2),
(62, 16, 8, 2),
(63, 16, 7, 3),
(64, 16, 5, 3),
(65, 16, 4, 0),
(66, 16, 3, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `old_svcoso`
--

CREATE TABLE `old_svcoso` (
  `id` int(11) NOT NULL,
  `id_old_sv` int(11) NOT NULL,
  `id_coso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `old_svdaotao`
--

CREATE TABLE `old_svdaotao` (
  `id` int(11) NOT NULL,
  `id_old_sv` int(11) NOT NULL,
  `id_daotao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `old_svnguyennhan`
--

CREATE TABLE `old_svnguyennhan` (
  `id` int(11) NOT NULL,
  `id_old_sv` int(11) NOT NULL,
  `id_nguyennhan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `old_svyeuto`
--

CREATE TABLE `old_svyeuto` (
  `id` int(11) NOT NULL,
  `id_old_sv` int(11) NOT NULL,
  `id_yeuto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `old_sv_cmt`
--

CREATE TABLE `old_sv_cmt` (
  `id` int(11) NOT NULL,
  `id_old_sv` int(11) NOT NULL,
  `id_content` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phamvi`
--

CREATE TABLE `phamvi` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phamvi`
--

INSERT INTO `phamvi` (`id`, `name`) VALUES
(1, 'Trong nước'),
(2, 'Ngoài nước'),
(3, 'Trong và ngoài nước');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `publish` tinyint(1) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `role`
--

INSERT INTO `role` (`id`, `name`, `publish`, `created_at`, `updated_at`) VALUES
(1, 'Nhà tuyển dụng', 1, '2021-05-15 22:35:29', NULL),
(2, 'Cựu sinh viên', 1, '2021-05-15 22:35:33', NULL),
(3, 'Sinh viên', 1, '2021-05-15 22:35:37', NULL),
(4, 'giảng viên', 1, '2021-05-15 22:36:04', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sv_comment`
--

CREATE TABLE `sv_comment` (
  `id` int(11) NOT NULL,
  `id_sv` int(11) NOT NULL,
  `id_content` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sv_comment`
--

INSERT INTO `sv_comment` (`id`, `id_sv`, `id_content`, `status`) VALUES
(1, 1, 36, 1),
(2, 1, 35, 2),
(3, 1, 34, 3),
(4, 1, 33, 2),
(5, 1, 32, 3),
(6, 1, 42, 2),
(7, 1, 41, 3),
(8, 1, 40, 2),
(9, 1, 39, 3),
(10, 1, 38, 2),
(11, 2, 36, 2),
(12, 2, 35, 1),
(13, 2, 34, 2),
(14, 2, 33, 3),
(15, 2, 32, 2),
(16, 2, 42, 2),
(17, 2, 41, 3),
(18, 2, 40, 2),
(19, 2, 39, 2),
(20, 2, 38, 2),
(21, 3, 36, 1),
(22, 3, 35, 1),
(23, 3, 34, 3),
(24, 3, 33, 2),
(25, 3, 32, 4),
(26, 3, 42, 3),
(27, 3, 41, 5),
(28, 3, 40, 5),
(29, 3, 39, 5),
(30, 3, 38, 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(255) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `publish` tinyint(1) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `fullname`, `username`, `password`, `email`, `address`, `avatar`, `publish`, `created_at`, `updated_at`) VALUES
(5, 'Duy', 'admin', '$2y$10$F1mrywCWc/wot6mAmhe/eeooPS0CyR3sT/MIwrft2wJO.fhGNuy9q', 'admin@gmail.com', 'Quận Ninh Kiều TP Cần Thơ', 'admin.png', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_third`
--

CREATE TABLE `user_third` (
  `id` int(11) NOT NULL,
  `id_role` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `birthday` date DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `posi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `ori` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `sort` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user_third`
--

INSERT INTO `user_third` (`id`, `id_role`, `fullname`, `birthday`, `phone`, `address`, `email`, `username`, `password`, `posi`, `avatar`, `gender`, `ori`, `sort`, `created_at`, `updated_at`) VALUES
(6, '4', 'Khánh Duy', '1998-09-24', '0982824398', 'Cần Thơ', 'vkduy240398@gmail.com', 'khanhduy', '$2y$10$h0pGMur.JlqzKXhGBso7YeuKt1kH2raCydYDQvWcM11HWrlyv0p5G', 'Giảng viên', 'khanhduy.jpg', 'Nữ', 'CTUT', 0, '2021-05-16 08:02:54', NULL),
(7, '1', 'vo duy', '1998-09-24', '0982824398', 'Cần Thơ', 'vkduy240398@gmail.com', 'user12', '$2y$10$Zb5kDZa658ZcrFIGMcjkUeiFPDlhGlSWbi2CwF53DDw9a6AgVD5PS', 'Giám đốc', 'user12.png', 'Nam', 'CTUT', 0, '2021-05-16 08:05:41', NULL),
(8, '4', 'vo duy', '1998-09-24', '0982824398', 'Cần Thơ', 'vkduy240398@gmail.com', 'user122', '$2y$10$K6st9Tr7x.XC.8DnArDLEekq4SueFyU6GUxC.9e/ia4VfYdLqYNhm', 'Giảng viên', 'user122.png', 'Nam', 'CTUT', 0, '2021-05-16 09:06:31', NULL),
(9, '3', 'Võ Khánh Duy', '1998-03-24', '0982824398', 'Cần Thơ', 'vkduy240398@gmail.com', 'user', '$2y$10$aiQdlCeMaUkx5Z1hAig5Ze3ZbugQSZef1e73suYHb/bc93QSR5YV.', 'Sinh viên', 'user.png', 'Nam', '', 0, '2021-05-29 14:02:29', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vitri`
--

CREATE TABLE `vitri` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `vitri`
--

INSERT INTO `vitri` (`id`, `name`) VALUES
(1, 'Nhân viên văn phòng'),
(2, 'Quản lý kỹ thuật'),
(3, 'Nhân viên kỹ thuật'),
(4, 'Lãnh đạo');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `yeuto`
--

CREATE TABLE `yeuto` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `yeuto`
--

INSERT INTO `yeuto` (`id`, `name`) VALUES
(1, 'Trình độ chuyên môn'),
(2, 'Trình độ tin học'),
(3, 'Ý thức thái độ'),
(4, 'Trình độ ngoại ngữ'),
(5, 'Kinh nghiệm làm việc'),
(6, 'Sức khỏe');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `age`
--
ALTER TABLE `age`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_gv` (`id_gv`),
  ADD KEY `id_content` (`id_content`);

--
-- Chỉ mục cho bảng `comment_ntd`
--
ALTER TABLE `comment_ntd`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_content` (`id_content`),
  ADD KEY `id_ntd` (`id_ntd`);

--
-- Chỉ mục cho bảng `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `contentcmt`
--
ALTER TABLE `contentcmt`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `co_so`
--
ALTER TABLE `co_so`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `criteria`
--
ALTER TABLE `criteria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_role` (`id_role`);

--
-- Chỉ mục cho bảng `daotao`
--
ALTER TABLE `daotao`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `giangvien`
--
ALTER TABLE `giangvien`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_age` (`id_age`),
  ADD KEY `id_level` (`id_level`);

--
-- Chỉ mục cho bảng `hoatdong`
--
ALTER TABLE `hoatdong`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `info_oldsv`
--
ALTER TABLE `info_oldsv`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_lhcoquan` (`id_lhcoquan`);

--
-- Chỉ mục cho bảng `info_sv`
--
ALTER TABLE `info_sv`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `lh_coquan`
--
ALTER TABLE `lh_coquan`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `loaihinh`
--
ALTER TABLE `loaihinh`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `mucdo`
--
ALTER TABLE `mucdo`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nganh_tuyen_dung`
--
ALTER TABLE `nganh_tuyen_dung`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_branch` (`id_branch`),
  ADD KEY `id_ntd` (`id_ntd`);

--
-- Chỉ mục cho bảng `nguyennhan`
--
ALTER TABLE `nguyennhan`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nhatuyendung`
--
ALTER TABLE `nhatuyendung`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nhatuyendung_ibfk_1` (`hoatdong`),
  ADD KEY `nhatuyendung_ibfk_2` (`loaihinh`),
  ADD KEY `nhatuyendung_ibfk_3` (`posi`),
  ADD KEY `nhatuyendung_ibfk_4` (`dapung`),
  ADD KEY `nhatuyendung_ibfk_5` (`each_data`);

--
-- Chỉ mục cho bảng `noidungntd`
--
ALTER TABLE `noidungntd`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_ntd` (`id_ntd`),
  ADD KEY `id_contentcmt` (`id_contentcmt`);

--
-- Chỉ mục cho bảng `old_svcoso`
--
ALTER TABLE `old_svcoso`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_old_sv` (`id_old_sv`),
  ADD KEY `id_coso` (`id_coso`);

--
-- Chỉ mục cho bảng `old_svdaotao`
--
ALTER TABLE `old_svdaotao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_daotao` (`id_daotao`),
  ADD KEY `id_old_sv` (`id_old_sv`);

--
-- Chỉ mục cho bảng `old_svnguyennhan`
--
ALTER TABLE `old_svnguyennhan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_nguyennhan` (`id_nguyennhan`),
  ADD KEY `id_old_sv` (`id_old_sv`);

--
-- Chỉ mục cho bảng `old_svyeuto`
--
ALTER TABLE `old_svyeuto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_old_sv` (`id_old_sv`),
  ADD KEY `id_yeuto` (`id_yeuto`);

--
-- Chỉ mục cho bảng `old_sv_cmt`
--
ALTER TABLE `old_sv_cmt`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_content` (`id_content`),
  ADD KEY `id_old_sv` (`id_old_sv`);

--
-- Chỉ mục cho bảng `phamvi`
--
ALTER TABLE `phamvi`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sv_comment`
--
ALTER TABLE `sv_comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_sv` (`id_sv`),
  ADD KEY `id_content` (`id_content`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user_third`
--
ALTER TABLE `user_third`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `vitri`
--
ALTER TABLE `vitri`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `yeuto`
--
ALTER TABLE `yeuto`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `age`
--
ALTER TABLE `age`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `branch`
--
ALTER TABLE `branch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT cho bảng `comment_ntd`
--
ALTER TABLE `comment_ntd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT cho bảng `content`
--
ALTER TABLE `content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT cho bảng `contentcmt`
--
ALTER TABLE `contentcmt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `co_so`
--
ALTER TABLE `co_so`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `criteria`
--
ALTER TABLE `criteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `daotao`
--
ALTER TABLE `daotao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `giangvien`
--
ALTER TABLE `giangvien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `hoatdong`
--
ALTER TABLE `hoatdong`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `info_oldsv`
--
ALTER TABLE `info_oldsv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `info_sv`
--
ALTER TABLE `info_sv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `level`
--
ALTER TABLE `level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `lh_coquan`
--
ALTER TABLE `lh_coquan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `loaihinh`
--
ALTER TABLE `loaihinh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT cho bảng `mucdo`
--
ALTER TABLE `mucdo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `nganh_tuyen_dung`
--
ALTER TABLE `nganh_tuyen_dung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `nguyennhan`
--
ALTER TABLE `nguyennhan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `nhatuyendung`
--
ALTER TABLE `nhatuyendung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `noidungntd`
--
ALTER TABLE `noidungntd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT cho bảng `old_svcoso`
--
ALTER TABLE `old_svcoso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `old_svdaotao`
--
ALTER TABLE `old_svdaotao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `old_svnguyennhan`
--
ALTER TABLE `old_svnguyennhan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `old_svyeuto`
--
ALTER TABLE `old_svyeuto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `old_sv_cmt`
--
ALTER TABLE `old_sv_cmt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT cho bảng `phamvi`
--
ALTER TABLE `phamvi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `sv_comment`
--
ALTER TABLE `sv_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `user_third`
--
ALTER TABLE `user_third`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `vitri`
--
ALTER TABLE `vitri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `yeuto`
--
ALTER TABLE `yeuto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`id_gv`) REFERENCES `giangvien` (`id`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`id_content`) REFERENCES `content` (`id`);

--
-- Các ràng buộc cho bảng `comment_ntd`
--
ALTER TABLE `comment_ntd`
  ADD CONSTRAINT `comment_ntd_ibfk_1` FOREIGN KEY (`id_content`) REFERENCES `content` (`id`),
  ADD CONSTRAINT `comment_ntd_ibfk_2` FOREIGN KEY (`id_ntd`) REFERENCES `nhatuyendung` (`id`);

--
-- Các ràng buộc cho bảng `criteria`
--
ALTER TABLE `criteria`
  ADD CONSTRAINT `criteria_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id`);

--
-- Các ràng buộc cho bảng `giangvien`
--
ALTER TABLE `giangvien`
  ADD CONSTRAINT `giangvien_ibfk_1` FOREIGN KEY (`id_age`) REFERENCES `age` (`id`),
  ADD CONSTRAINT `giangvien_ibfk_2` FOREIGN KEY (`id_level`) REFERENCES `level` (`id`);

--
-- Các ràng buộc cho bảng `nganh_tuyen_dung`
--
ALTER TABLE `nganh_tuyen_dung`
  ADD CONSTRAINT `nganh_tuyen_dung_ibfk_1` FOREIGN KEY (`id_branch`) REFERENCES `branch` (`id`),
  ADD CONSTRAINT `nganh_tuyen_dung_ibfk_2` FOREIGN KEY (`id_ntd`) REFERENCES `nhatuyendung` (`id`);

--
-- Các ràng buộc cho bảng `nhatuyendung`
--
ALTER TABLE `nhatuyendung`
  ADD CONSTRAINT `nhatuyendung_ibfk_1` FOREIGN KEY (`hoatdong`) REFERENCES `hoatdong` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `nhatuyendung_ibfk_2` FOREIGN KEY (`loaihinh`) REFERENCES `loaihinh` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `nhatuyendung_ibfk_3` FOREIGN KEY (`posi`) REFERENCES `vitri` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `nhatuyendung_ibfk_4` FOREIGN KEY (`dapung`) REFERENCES `mucdo` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `nhatuyendung_ibfk_5` FOREIGN KEY (`each_data`) REFERENCES `phamvi` (`id`) ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `noidungntd`
--
ALTER TABLE `noidungntd`
  ADD CONSTRAINT `noidungntd_ibfk_1` FOREIGN KEY (`id_ntd`) REFERENCES `nhatuyendung` (`id`),
  ADD CONSTRAINT `noidungntd_ibfk_2` FOREIGN KEY (`id_contentcmt`) REFERENCES `contentcmt` (`id`);

--
-- Các ràng buộc cho bảng `old_svcoso`
--
ALTER TABLE `old_svcoso`
  ADD CONSTRAINT `old_svcoso_ibfk_1` FOREIGN KEY (`id_old_sv`) REFERENCES `info_oldsv` (`id`),
  ADD CONSTRAINT `old_svcoso_ibfk_2` FOREIGN KEY (`id_coso`) REFERENCES `co_so` (`id`);

--
-- Các ràng buộc cho bảng `old_svdaotao`
--
ALTER TABLE `old_svdaotao`
  ADD CONSTRAINT `old_svdaotao_ibfk_1` FOREIGN KEY (`id_daotao`) REFERENCES `daotao` (`id`),
  ADD CONSTRAINT `old_svdaotao_ibfk_2` FOREIGN KEY (`id_old_sv`) REFERENCES `info_oldsv` (`id`);

--
-- Các ràng buộc cho bảng `old_svnguyennhan`
--
ALTER TABLE `old_svnguyennhan`
  ADD CONSTRAINT `old_svnguyennhan_ibfk_1` FOREIGN KEY (`id_nguyennhan`) REFERENCES `nguyennhan` (`id`),
  ADD CONSTRAINT `old_svnguyennhan_ibfk_2` FOREIGN KEY (`id_old_sv`) REFERENCES `info_oldsv` (`id`);

--
-- Các ràng buộc cho bảng `old_svyeuto`
--
ALTER TABLE `old_svyeuto`
  ADD CONSTRAINT `old_svyeuto_ibfk_1` FOREIGN KEY (`id_old_sv`) REFERENCES `info_oldsv` (`id`),
  ADD CONSTRAINT `old_svyeuto_ibfk_2` FOREIGN KEY (`id_yeuto`) REFERENCES `yeuto` (`id`);

--
-- Các ràng buộc cho bảng `old_sv_cmt`
--
ALTER TABLE `old_sv_cmt`
  ADD CONSTRAINT `old_sv_cmt_ibfk_1` FOREIGN KEY (`id_content`) REFERENCES `content` (`id`),
  ADD CONSTRAINT `old_sv_cmt_ibfk_2` FOREIGN KEY (`id_old_sv`) REFERENCES `info_oldsv` (`id`);

--
-- Các ràng buộc cho bảng `sv_comment`
--
ALTER TABLE `sv_comment`
  ADD CONSTRAINT `sv_comment_ibfk_1` FOREIGN KEY (`id_sv`) REFERENCES `info_sv` (`id`),
  ADD CONSTRAINT `sv_comment_ibfk_2` FOREIGN KEY (`id_content`) REFERENCES `content` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
