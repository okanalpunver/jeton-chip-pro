-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: db:3306
-- Üretim Zamanı: 28 Nis 2023, 13:09:08
-- Sunucu sürümü: 5.7.41
-- PHP Sürümü: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `jetonchip`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Berkant Deniz', 'berkantdeniz@gmail.com', '2023-04-28 15:56:13', '$2y$10$yqKPTpgrIlETqdDwbu.h7.Mm2pob.xsTiQFVip3SKaZyiZoyfWvPu', 'OecOmz4IGB', '2023-04-28 15:56:13', '2023-04-28 15:56:13');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `bank_accounts`
--

CREATE TABLE `bank_accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `site_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_free_atm` tinyint(1) NOT NULL DEFAULT '0',
  `account_holder` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iban` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `bank_accounts`
--

INSERT INTO `bank_accounts` (`id`, `site_id`, `name`, `logo`, `is_free_atm`, `account_holder`, `iban`, `branch_number`, `account_number`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Ziraat Bankası', '/frontend/img/banks/ziraat.jpg', 1, 'PAYTR ÖDEME HİZMETLERİ AŞ', 'TR31 0001 0013 3362 7295 4850 05', '1333', '62729548-5005', '7&24 Masrafsız Ödeme Kabul Edilir.', 0, '2023-04-28 15:56:13', '2023-04-28 15:56:13'),
(2, 1, 'Akbank', '/frontend/img/banks/akbank.jpg', 1, 'PAYTR ÖDEME HİZMETLERİ AŞ', 'TR28 0004 6001 7188 8000 1251 40', '0348', '0193433', '7&24 Masrafsız Ödeme Kabul Edilir.', 0, '2023-04-28 15:56:13', '2023-04-28 15:56:13'),
(3, 1, 'Yapı Kredi', '/frontend/img/banks/yapikredi.jpg', 1, 'PAYTR ÖDEME HİZMETLERİ AŞ', 'TR57 0006 7010 0000 0043 9911 91', '00203', '43991191', '7&24 Masrafsız Ödeme Kabul Edilir.', 0, '2023-04-28 15:56:13', '2023-04-28 15:56:13'),
(4, 1, 'QNB Finansbank', '/frontend/img/banks/finansbank.jpg', 1, 'PAYTR ÖDEME HİZMETLERİ AŞ', 'TR79 0011 1000 0000 0057 2447 03', '00937', '57244703', '7&24 Masrafsız Ödeme Kabul Edilir.', 0, '2023-04-28 15:56:13', '2023-04-28 15:56:13'),
(5, 1, 'İş Bankası', '/frontend/img/banks/is-bankasi.jpg', 1, 'PAYTR ÖDEME HİZMETLERİ AŞ', 'TR24 0006 4000 0013 4350 5661 70', '3435', '0566170', '7&24 Masrafsız Ödeme Kabul Edilir.', 0, '2023-04-28 15:56:13', '2023-04-28 15:56:13'),
(6, 1, 'Deniz Bank', '/frontend/img/banks/denizbank.jpg', 0, 'PAYTR ÖDEME HİZMETLERİ AŞ', 'TR02 0013 4000 0040 0880 7000 20', '3530', '4008807-364', '7&24 Masrafsız Ödeme Kabul Edilir.', 0, '2023-04-28 15:56:13', '2023-04-28 15:56:13'),
(7, 1, 'Halk Bank', '/frontend/img/banks/halkbank.jpg', 0, 'PAYTR ÖDEME HİZMETLERİ AŞ', 'TR73 0001 2009 4300 0010 2608 92', '430', '10260892', '7&24 Masrafsız Ödeme Kabul Edilir.', 0, '2023-04-28 15:56:13', '2023-04-28 15:56:13'),
(8, 1, 'PTT Bank', '/frontend/img/banks/ptt.jpg', 0, 'PAYTR ÖDEME HİZMETLERİ AŞ', NULL, NULL, '10093523', '7&24 Masrafsız Ödeme Kabul Edilir.', 0, '2023-04-28 15:56:13', '2023-04-28 15:56:13'),
(9, 1, 'TEB', '/frontend/img/banks/teb.jpg', 0, 'PAYTR ÖDEME HİZMETLERİ AŞ', 'TR39 0003 2000 0000 0036 0488 81', '703', '36048881', '7&24 Masrafsız Ödeme Kabul Edilir.', 0, '2023-04-28 15:56:13', '2023-04-28 15:56:13'),
(10, 1, 'Vakıf Bank', '/frontend/img/banks/vakifbank.jpg', 0, 'PAYTR ÖDEME HİZMETLERİ AŞ', 'TR02 0001 5001 5800 7303 8783 58', '4', '00158007303878358', '7&24 Masrafsız Ödeme Kabul Edilir.', 0, '2023-04-28 15:56:13', '2023-04-28 15:56:13');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `site_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `categories`
--

INSERT INTO `categories` (`id`, `site_id`, `name`, `photo`, `created_at`, `updated_at`) VALUES
(1, 1, 'Zynga Poker Chip', 'images/R470iJdxdwZqGpsQyqXHtrAsHI5LixHwxlgQjA2r.png', '2023-04-28 15:56:13', '2023-04-28 15:56:13');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `category_order`
--

CREATE TABLE `category_order` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `qty` bigint(20) UNSIGNED NOT NULL,
  `price` decimal(12,6) UNSIGNED NOT NULL,
  `extra` json DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_05_08_180728_create_admins_table', 1),
(4, '2019_05_09_230826_create_permission_tables', 1),
(5, '2019_05_10_020517_create_sites_table', 1),
(6, '2019_05_10_022020_create_categories_table', 1),
(7, '2019_05_10_022028_create_products_table', 1),
(8, '2019_05_10_220821_create_pages_table', 1),
(9, '2019_05_10_225728_create_bank_accounts_table', 1),
(10, '2019_05_17_150717_create_orders_table', 1),
(11, '2019_05_20_163050_create_testimonials_table', 1),
(12, '2019_05_21_010935_create_payments_table', 1),
(13, '2019_05_24_215228_create_category_order_table', 1),
(14, '2019_09_21_092556_create_sellers_table', 1),
(15, '2019_09_21_102203_create_settings_table', 1),
(16, '2019_10_19_103456_create_news_table', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `site_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci,
  `body` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `site_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(12,4) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '-1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `site_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hash` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `total_amount` decimal(12,6) NOT NULL,
  `payment_amount` decimal(12,6) NOT NULL,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `test_mode` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` char(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tc_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `response` json NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `qty` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `price` decimal(8,2) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `products`
--

INSERT INTO `products` (`id`, `category_id`, `qty`, `status`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 5000, 0, 10.00, '2023-04-28 15:56:13', '2023-04-28 15:56:13'),
(2, 1, 10000, 0, 20.00, '2023-04-28 15:56:13', '2023-04-28 15:56:13'),
(3, 1, 15000, 0, 30.00, '2023-04-28 15:56:13', '2023-04-28 15:56:13'),
(4, 1, 20000, 0, 40.00, '2023-04-28 15:56:13', '2023-04-28 15:56:13'),
(5, 1, 25000, 0, 50.00, '2023-04-28 15:56:13', '2023-04-28 15:56:13'),
(6, 1, 30000, 0, 60.00, '2023-04-28 15:56:13', '2023-04-28 15:56:13'),
(7, 1, 40000, 0, 80.00, '2023-04-28 15:56:13', '2023-04-28 15:56:13'),
(8, 1, 50000, 0, 100.00, '2023-04-28 15:56:13', '2023-04-28 15:56:13'),
(9, 1, 60000, 0, 120.00, '2023-04-28 15:56:13', '2023-04-28 15:56:13'),
(10, 1, 70000, 0, 140.00, '2023-04-28 15:56:13', '2023-04-28 15:56:13'),
(11, 1, 80000, 0, 160.00, '2023-04-28 15:56:13', '2023-04-28 15:56:13'),
(12, 1, 90000, 0, 180.00, '2023-04-28 15:56:13', '2023-04-28 15:56:13'),
(13, 1, 100000, 0, 200.00, '2023-04-28 15:56:13', '2023-04-28 15:56:13');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sellers`
--

CREATE TABLE `sellers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` decimal(12,2) NOT NULL DEFAULT '0.00',
  `qty` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'buy', '100B - 50TL', '2023-04-28 15:56:13', '2023-04-28 15:56:13');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sites`
--

CREATE TABLE `sites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fqdn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `analytics_id` char(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` char(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsapp` char(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skype` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tawk_to` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kampanya_line1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kampanya_line2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` text COLLATE utf8mb4_unicode_ci,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `background` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'tr',
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'TRY',
  `theme` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'theme-4',
  `skin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `heading_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `heading_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `out_of_stock` tinyint(1) NOT NULL DEFAULT '0',
  `netgsm_status` tinyint(1) NOT NULL DEFAULT '0',
  `netgsm_header` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `netgsm_message` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `paytr_merchant_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paytr_merchant_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paytr_merchant_salt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paytr_test_mode` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `sites`
--

INSERT INTO `sites` (`id`, `name`, `fqdn`, `analytics_id`, `email`, `phone`, `address`, `whatsapp`, `skype`, `facebook`, `twitter`, `instagram`, `tawk_to`, `kampanya_line1`, `kampanya_line2`, `home_text`, `about`, `logo`, `background`, `image1`, `lang`, `currency`, `theme`, `skin`, `heading_1`, `heading_2`, `out_of_stock`, `netgsm_status`, `netgsm_header`, `netgsm_message`, `status`, `paytr_merchant_id`, `paytr_merchant_key`, `paytr_merchant_salt`, `paytr_test_mode`, `created_at`, `updated_at`) VALUES
(1, 'Jetonchip', 'localhost:8000', NULL, 'info@localhost:8000', '5432556933', 'Merkez / Çanakkale', '5432556933', 'chipmip', 'chipmip', 'chipmip', 'chipmip', NULL, NULL, NULL, NULL, 'Müşteri odaklı e-pin satış sitesi chipmip.com oyun sektöründe uzun yılların deneyimiyle olumlu olumsuz tek menfaati müşteri memnuniyeti olan örnek site olarak gurur duyuyoruz.\n\nMevcut çalışma arkadaşlarımızla müşterilerimize en hızlı ve güvenilir şekilde hizmet vermekteyiz.Bulunduğumuz sektörde geçmiş yıllara dayanan deneyimimizle siz müşterilerimizin önce memnuniyeti sonra da oyun keyfini en iyi şekilde yaşamasını kendimize görev bildik  ve bunu daha iyi noktalara taşımak için oyun sektöründeki yaşanan güncel ve teknolojik sistemleri sitemize eklemek için tam zamanlı çalışmalarımızı yürütmekteyiz.\n\nSitemiz siz müşterilerimize en iyi hizmeti vermek için deneyimli çalışanlarımızla 7/24  hizmet vermektedir.\n\nMevcut olan sektörde en iyi şekilde hizmet verebilmek için gerekli tüm çalışmalarımız profesyonel ekibimiz tarafıyla hazırlanmış olup oluşabilecek tüm sorunları müşteri memnuniyetimiz için en asgari  seviyeye çekmiş bulunmaktayız.\n\nJETONCHİP.COM', 'images/Xuw5alsGBkGoK5qLDjSwuFjAqlUdU4DxE1bTWiQN.png', NULL, NULL, 'tr', 'TRY', 'theme-4', 'red', 'Zynga Poker Chip', '7/24 Hızlı Sipariş Ver', 0, 0, NULL, NULL, 1, '135621', '5u4bg8Tp8LXDPYLK', 'RC24UX4wCLHYgDEt', 1, '2023-04-28 15:56:13', '2023-04-28 15:56:13');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `site_id` bigint(20) UNSIGNED NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `point` tinyint(3) UNSIGNED NOT NULL DEFAULT '5',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `testimonials`
--

INSERT INTO `testimonials` (`id`, `site_id`, `content`, `name`, `point`, `created_at`, `updated_at`) VALUES
(1, 1, 'Bir çok yerden alışveriş yaptım ilk defa bu kadar samimi ve çalışkan ilgili çalışanlar görüyorum ilginiz için teşekkür ederim.', 'Mehmet G.', 4, '2023-04-28 15:56:13', '2023-04-28 15:56:13'),
(2, 1, 'Tavsiye üzerine geldim. Arkadaşım önermişti gerçekten anlattığı kadar var hem çok hızlılar hem de güvenilir siparişimi 10 dakika içinde teslim ettiler.', 'Tamer A.', 5, '2023-04-28 15:56:13', '2023-04-28 15:56:13'),
(3, 1, 'Hem ucuz hem güvenilir teşekkürler chipmip.com', 'Deniz T.', 5, '2023-04-28 15:56:13', '2023-04-28 15:56:13'),
(4, 1, 'Normalde yorum yapmam ama hakediyorsunuz gerçekten çok hızlı ve çalışkansınız.', 'Nermin S.', 5, '2023-04-28 15:56:13', '2023-04-28 15:56:13'),
(5, 1, 'Bir çok yerden aldım.Zaman sıkıntısı çekiyorum hızlı olmasına önem veriyorum alışverişimin aradığımı  sonunda buldum teşekkürler', 'Ahmet D.', 5, '2023-04-28 15:56:13', '2023-04-28 15:56:13'),
(6, 1, 'Alışveriş yapmadan önce her site gibi olduğu düşündüm ama deneyince gerçekten memnun kaldım.', 'Can T.', 5, '2023-04-28 15:56:13', '2023-04-28 15:56:13'),
(7, 1, 'Uygun fiyat çalışkanlık güven hepsi bir arada çok teşekkür ediyorum ilginiz için', 'Yılmaz H.', 5, '2023-04-28 15:56:13', '2023-04-28 15:56:13');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `site_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` char(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `site_id`, `name`, `email`, `phone`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'Volkan Baskın', 'baskinvolkan@gmail.com', '5325610200', '2023-04-28 15:56:13', '$2y$10$i19yX2BqObrVGLcm2d/p6.Zdj15ZIhZQ58ajBWu7E0PzTjEwTJMnq', 'EqoysfwuEo', '2023-04-28 15:56:13', '2023-04-28 15:56:13');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Tablo için indeksler `bank_accounts`
--
ALTER TABLE `bank_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_site_id_index` (`site_id`);

--
-- Tablo için indeksler `category_order`
--
ALTER TABLE `category_order`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Tablo için indeksler `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Tablo için indeksler `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `news_site_id_index` (`site_id`);

--
-- Tablo için indeksler `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Tablo için indeksler `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_site_id_index` (`site_id`);

--
-- Tablo için indeksler `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_index` (`category_id`);

--
-- Tablo için indeksler `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Tablo için indeksler `sellers`
--
ALTER TABLE `sellers`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`);

--
-- Tablo için indeksler `sites`
--
ALTER TABLE `sites`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sites_fqdn_unique` (`fqdn`),
  ADD UNIQUE KEY `sites_email_unique` (`email`);

--
-- Tablo için indeksler `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_site_id_email_unique` (`site_id`,`email`),
  ADD KEY `users_site_id_index` (`site_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `bank_accounts`
--
ALTER TABLE `bank_accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Tablo için AUTO_INCREMENT değeri `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `category_order`
--
ALTER TABLE `category_order`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Tablo için AUTO_INCREMENT değeri `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Tablo için AUTO_INCREMENT değeri `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `sellers`
--
ALTER TABLE `sellers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `sites`
--
ALTER TABLE `sites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_site_id_foreign` FOREIGN KEY (`site_id`) REFERENCES `sites` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
