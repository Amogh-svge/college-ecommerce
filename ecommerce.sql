-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2022 at 05:30 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no-image',
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`, `image`, `slug`, `parent_id`) VALUES
(6, 'Mobile', '<p>Wireless handheld device that allows users to make and receive calls. While the earliest generation of mobile phones could only make and receive calls, today’s mobile phones do a lot more, accommodating web browsers, games, cameras, video players and navigational systems.</p>', '2022-06-04 07:39:45', '2022-06-04 07:39:45', '629b623e90bc22204samsung-galaxy-a52.jpg', 'mobile', 0),
(7, 'Laptop', 'Small, portable  with a screen and . Laptops typically have a  form factor with the screen mounted on the inside of the upper lid and the keyboard on the inside of the lower lid, although 2 in 1 with a detachable keyboard are often marketed as laptops or as having a laptop mode. Laptops are folded shut for transportation, and thus are suitable for mobile use. Its name comes from lap as it was deemed practical to be placed on a person\'s lap when being used. Today, laptops are used in a variety of settings, such as at work, in education, for playing games, listening music and for general home computer use.', '2022-06-04 07:40:04', '2022-06-04 07:40:04', '629b5f9c3f6ab2204alienwarem15.jpg', 'laptop', 0),
(8, 'Headset', '<p>Headsets connect over a telephone or a computer, allowing the user to speak and listen while keeping both hands free. They are commonly used in customer service and technical support centers, where employees can converse with customers while typing information into a computer. Also common among computer gamers are headsets, which will let them talk with each other and hear others, as well as use their keyboards and mouse to play the game.</p>', '2022-06-04 07:40:28', '2022-06-12 01:02:49', '629c4d3791f382205fausto-sandoval-w5m3PIGvkqI-unsplash.jpg', 'headsets', 0);

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `Name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '''no-name''',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_notes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`id`, `user_id`, `order_id`, `Name`, `email`, `phone`, `country`, `state`, `city`, `street_address`, `order_notes`, `created_at`, `updated_at`) VALUES
(1, 9, 1, 'Asahi Yamato', 'Asahidono@yahoo.com', '977-9841526526', 'Nepal', 'Karnali', 'Kathmandu', 'Asan', 'I like to shake it shake it', '2022-06-21 02:44:05', '2022-06-21 02:44:05'),
(2, 17, 4, 'Jake Shrestha', 'jakeshrestha@yahoo.com', '977-9818456234', 'Nepal', 'Bagmati', 'Kathmandu', 'Bholkha 22', 'I want this to be delivered asap', '2022-06-27 03:22:02', '2022-06-27 03:22:02');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_03_15_084447_create_categories_table', 1),
(14, '2022_03_17_163245_create_product_table', 2),
(15, '2022_03_18_070743_old_price', 2),
(16, '2022_05_07_031503_update_product_specification', 3),
(17, '2022_04_10_031703_addshort_desc', 4),
(18, '2022_05_02_093108_create_orders_table', 5),
(19, '2022_05_02_093944_create_order_items_table', 5),
(20, '2022_05_20_145041_review_table', 6),
(21, '2022_06_13_062034_create_checkout_controllers_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `order_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` double(8,2) NOT NULL,
  `sub_total` double(13,2) NOT NULL,
  `shipping_price` double(8,2) NOT NULL,
  `total_price` double(13,2) NOT NULL,
  `vendor_status` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT 'not_approved',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `order_status`, `discount`, `sub_total`, `shipping_price`, `total_price`, `vendor_status`, `created_at`, `updated_at`) VALUES
(1, 9, 'purchased', 0.00, 4556.00, 25.00, 4581.00, 'not_approved', '2022-06-21 02:39:28', '2022-06-21 02:44:05'),
(2, 1, 'cart', 0.00, 44555.00, 25.00, 44580.00, 'not_approved', '2022-06-21 22:53:42', '2022-06-21 22:59:14'),
(3, 15, 'cart', 0.00, 5112.00, 25.00, 5137.00, 'not_approved', '2022-06-24 03:31:25', '2022-06-24 03:31:45'),
(4, 17, 'purchased', 0.00, 119000.00, 25.00, 119025.00, 'not_approved', '2022-06-27 03:20:23', '2022-06-27 03:22:02');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED DEFAULT NULL,
  `product_price` double(8,2) NOT NULL DEFAULT 0.00,
  `total` double(13,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `product_id`, `order_id`, `quantity`, `product_price`, `total`, `created_at`, `updated_at`) VALUES
(4, 6, 1, 2, 1000.00, 2000.00, '2022-06-21 02:42:03', '2022-06-21 02:42:12'),
(5, 22, 1, 2, 1278.00, 2556.00, '2022-06-21 02:43:12', '2022-06-21 02:43:21'),
(6, 22, 2, 2, 1278.00, 2556.00, '2022-06-21 22:53:42', '2022-06-21 22:59:14'),
(7, 4, 2, 1, 41999.00, 41999.00, '2022-06-21 22:53:50', '2022-06-21 22:53:50'),
(8, 22, 3, 4, 1278.00, 5112.00, '2022-06-24 03:31:25', '2022-06-24 03:31:45'),
(9, 27, 4, 1, 118000.00, 118000.00, '2022-06-27 03:20:23', '2022-06-27 03:20:23'),
(10, 6, 4, 1, 1000.00, 1000.00, '2022-06-27 03:20:36', '2022-06-27 03:20:36');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `prod_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prod_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `price` decimal(8,2) NOT NULL DEFAULT 0.00,
  `old_price` double DEFAULT NULL,
  `specification` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no-specifications',
  `short_desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `prod_name`, `prod_desc`, `image`, `category_id`, `created_at`, `updated_at`, `price`, `old_price`, `specification`, `short_desc`, `users_id`) VALUES
(4, 'Samsung galaxy a52', '<p>Before moving forward, it’s pertinent to understand that there are two variants of this phone. One with 4G connectivity, and the other with 5G, whose name goes by <a href=\"https://www.gadgetbytenepal.com/samsung-galaxy-a52s-5g-long-term-review/\">Galaxy A52s</a>. This article is dedicated to the standard Galaxy A52 which is void of a 5G connection. Having said that, these two phones are basically one and the same except for the difference in the chipset, refresh rates( 90Hz vs 120Hz), and the said cellular connectivity.</p><p>Samsung officially launched the Galaxy A52 in Nepal back in March at a fairly competitive price. It is one of the best-selling midrange phones of 2021 from Samsung, thanks to its superb specs at an exceptional price.</p><p>Because of the ongoing pandemic, Samsung Nepal hasn’t been able to keep up with the demand, and buyers were felt frustrated for months. However, the phone is now available for purchase in limited quantities from select retail outlets all over Nepal. So, make sure you grab one before the stock runs out.</p>', '629b623e90bc22204samsung-galaxy-a52.jpg', 6, '2022-06-04 08:01:38', '2022-06-04 08:01:38', '41999.00', NULL, '<ul><li><strong>Body:</strong>&nbsp;75.1 x 159.9 x 8.4mm, 189 gm, IP67 dust/water resistant</li><li><strong>Display:</strong> 6.5-inches “Infinity-O” Super AMOLED panel, 90Hz refresh rate, 407 PPI</li><li><strong>Resolution:</strong> Full-HD+ (2400 x 1080 pixels), 20:9 aspect ratio</li><li><strong>Chipset:</strong> Qualcomm Snapdragon 720G (8nm)</li><li><strong>CPU:</strong>&nbsp;Octa-core (2×2.3 GHz Kryo 465 Gold &amp; 6×1.8 GHz Kryo 465 Silver)</li><li><strong>GPU:</strong>&nbsp;Adreno 618</li><li><strong>Memory:</strong> 4/6/8GB LPDDR4X RAM, 128/256GB storage (expandable)</li><li><strong>Software &amp; UI:</strong> Android 11 with Samsung’s One UI 3.1 on top</li><li><strong>Rear Camera:</strong> Quad (with LED flash);<br>– 64MP f/1.8 primary lens, AF, OIS<br>– 12MP f/2.2 ultra-wide lens, 123º FOV<br>– 5MP f/2.4 macro sensor<br>– 5MP f/2.4 depth sensor</li><li><strong>Front Camera:</strong> 32MP f/2.2 sensor (punch-hole cutout)</li><li><strong>Audio:</strong> Stereo speakers with Dolby Atmos audio, 3.5mm headphone jack</li><li><strong>Security:</strong>&nbsp;Optical in-display fingerprint scanner, Face unlock</li><li><strong>Connectivity:</strong> Dual-SIM (Nano), WiFi 802.11 a/b/g/n/ac (Dual-band), Bluetooth 5.0, GPS / AGPS / Glonass / Galileo / Beidou, NFC, USB Type-C, 4G LTE</li><li><strong>Battery:</strong> 4500mAh with 25W fast charging (15W adapter provided)</li><li><strong>Color options:</strong> Awesome – Black, Blue, White, Violet (No white color in Nepal)</li></ul>', 'Before moving forward, it’s pertinent to understand that there are two variants of this phone. One with 4G connectivity, and the other with 5G, whose name goes by Galaxy A52s. This article is dedicated to the standard Galaxy A52 .', 3),
(6, 'Dell f1 headset', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias, adipisci blanditiis modi vel vitae laudantium omnis sequi maiores illo culpa provident distinctio pariatur tenetur assumenda accusantium, atque iste eos maxime id, laborum officia! Cupiditate, sequi incidunt dolorem accusamus perferendis rem dolore nobis impedit suscipit voluptates natus consequuntur odio nemo quo?</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias, adipisci blanditiis modi vel vitae laudantium omnis sequi maiores illo culpa provident distinctio pariatur tenetur assumenda accusantium, atque iste eos maxime id, laborum officia! Cupiditate, sequi incidunt dolorem accusamus perferendis rem dolore nobis impedit suscipit voluptates natus consequuntur odio nemo quo?</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias, adipisci blanditiis modi vel vitae laudantium omnis sequi maiores illo culpa provident distinctio pariatur tenetur assumenda accusantium, atque iste eos maxime id, laborum officia! Cupiditate, sequi incidunt dolorem accusamus perferendis rem dolore nobis impedit suscipit voluptates natus consequuntur odio nemo quo?</p>', '629c4d3791f382205fausto-sandoval-w5m3PIGvkqI-unsplash.jpg', 8, '2022-06-05 00:44:11', '2022-06-05 00:44:11', '1000.00', NULL, '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias, adipisci blanditiis modi vel vitae laudantium omnis sequi maiores illo culpa provident distinctio pariatur tenetur assumenda accusantium, atque iste eos maxime id, laborum officia! Cupiditate, sequi incidunt dolorem accusamus perferendis rem dolore nobis impedit suscipit voluptates natus consequuntur odio nemo quo?</p>', 'A new cool looking headset that has modern and gaming look to it. A very trending device in the market currently with its cool looking feel as well as rgb-lit lights which gives it a gaming look.', 4),
(12, 'Samsung Galaxy S22', '<p>Samsung Nepal has finally launched the new Galaxy S22 series in Nepal. All three phones in this lineup are available for pre-booking from today (February 23) and come bundled with some exciting offers. In this article, we will go through the specs, features, availability, official price, and pre-booking offers of the Samsung Galaxy S22 and S22 Plus in Nepal.</p><p>Samsung has also collaborated with 15 different commercial brands for Equal Installment Plan (EIP) at 0% for a period of 6 to 12 months. Moreover, you can even trade in your old phone for a discount on the new S22 series.</p><p>Unlike the Galaxy S22 Ultra, this year’s S22 and S22 Plus don’t bring any significant changes in their design. Still, they have smaller form factors compared to their respective predecessors.</p><p>That’s because Samsung has reduced the screen size on both phones by a marginal 0.1-inch. Vanilla S22 has a 6.1-inch screen, whereas the S22 Plus sports a 6.6-inch panel. The latter sports a peak brightness of 1,750 nits while the former has a peak of 1,300 nits. Also, the bezels are a lot more symmetrical now.</p>', '629c7d9f12c832205samsung-s22.png', 6, '2022-06-05 04:00:39', '2022-06-05 09:14:32', '112999.00', NULL, '<p>Samsung Nepal has finally launched the new Galaxy S22 series in Nepal. All three phones in this lineup are available for pre-booking from today (February 23) and come bundled with some exciting offers. In this article, we will go through the specs, features, availability, official price, and pre-booking offers of the Samsung Galaxy S22 and S22 Plus in Nepal.</p><p>Samsung has also collaborated with 15 different commercial brands for Equal Installment Plan (EIP) at 0% for a period of 6 to 12 months. Moreover, you can even trade in your old phone for a discount on the new S22 series.</p><p>Unlike the Galaxy S22 Ultra, this year’s S22 and S22 Plus don’t bring any significant changes in their design. Still, they have smaller form factors compared to their respective predecessors.</p><p>That’s because Samsung has reduced the screen size on both phones by a marginal 0.1-inch. Vanilla S22 has a 6.1-inch screen, whereas the S22 Plus sports a 6.6-inch panel. The latter sports a peak brightness of 1,750 nits while the former has a peak of 1,300 nits. Also, the bezels are a lot more symmetrical now.</p>', 'Samsung Nepal has finally launched the new Galaxy S22 series in Nepal. All three phones in this lineup are available for pre-booking from today (February 23) and come bundled with some exciting offers.', 1),
(18, 'Samsung Galaxy A21', '<p>Samsung Galaxy A21 features an almost bezel-less, Infinity-O display with a selfie-camera cutout in the upper left corner. The Helio P35 chipset will power the device accompanied by 4GB of RAM and 64GB of expandable internal storage. A large 4,000mAh battery will keep the lights on. The Galaxy A21 is available for starting price of $249.99.</p>', '62a31f1b48c962210Samsung-Galaxy-A21s-Black-best-price-in-Sri-Lanka.jpg', 6, '2022-06-10 04:53:19', '2022-06-10 04:53:19', '45000.00', NULL, '<figure class=\"table\"><table><thead><tr><th colspan=\"2\"><h3><strong>DISPLAY</strong></h3></th></tr></thead><tbody><tr><th><strong>Size:</strong></th><td>6.5 inches</td></tr><tr><th><strong>Resolution:</strong></th><td>1600 x 720 pixels, 20:9 ratio, 270 PPI</td></tr><tr><th><strong>Technology:</strong></th><td>IPS LCD</td></tr><tr><th><strong>Refresh rate:</strong></th><td>60Hz</td></tr><tr><th><strong>Screen-to-body:</strong></th><td>79.20 %</td></tr><tr><th><strong>Features:</strong></th><td>Ambient light sensor, Proximity sensor</td></tr></tbody></table></figure><figure class=\"table\"><table><thead><tr><th colspan=\"2\"><h3><strong>HARDWARE</strong></h3></th></tr></thead><tbody><tr><th><strong>System chip:</strong></th><td>Mediatek Helio P35 MT6765 (12 nm)</td></tr><tr><th><strong>Processor:</strong></th><td>Octa-core, 4x 2.3GHz Cortex-A53 + 4x 1.8GHz Cortex-A53, 64-bit</td></tr><tr><th><strong>GPU:</strong></th><td>PowerVR GE8320</td></tr><tr><th><strong>RAM:</strong></th><td>3GB LPDDR4</td></tr><tr><th><strong>Internal storage:</strong></th><td>32GB (eMMC 5.1), available to use: 19.8 GB</td></tr><tr><th><strong>Storage expansion:</strong></th><td>microSDXC up to 512 GB</td></tr><tr><th><strong>Device type:</strong></th><td>Smartphone</td></tr><tr><th><strong>OS:</strong></th><td>Android (10), Samsung One UI</td></tr></tbody></table></figure>', 'Samsung Galaxy A21 features an almost bezel-less, Infinity-O display with a selfie-camera cutout in the upper left corner.', 1),
(21, 'Google pixel 6', '<p>After months of wait, Google has finally pulled the curtains off the Pixel 6 series—with the main highlight of the show being the new custom Tensor System on a Chip (SoC). So, let’s walk through the specs, features, expected price, and availability of Google Pixel 6 and Pixel 6 Pro in Nepal.</p><h2><strong>Google Pixel 6, Pixel 6 Pro Overview:</strong></h2><h3><strong>Design and Display</strong></h3><p>As evident from all the rumors and leaks, the Pixel 6 series has a huge camera bar on the back that runs through the full width of the phone. Both devices come with a glossy glass back (Gorilla Glass 6) and an aluminum frame. However, the frame on the Pro model is polished whereas it is matte textured on the vanilla model.</p><p>Over on the front, Pixel 6 Pro comes with a slightly curved 6.7-inch QHD+ AMOLED panel with variable refresh up to 120Hz. The Pixel 6, on the other hand, settles for a smaller and less sharp 6.4-inch FHD+ OLED screen that lays flat entirely. The refresh rate is also capped at 90Hz here.</p>', '62a82457c06732214google-pixel-6.png', 6, '2022-06-14 00:17:00', '2022-06-14 00:17:00', '85000.00', NULL, '<figure class=\"table\"><table><tbody><tr><td>&nbsp;</td><td><strong>Pixel 6</strong></td><td><strong>Pixel 6 Pro</strong></td></tr><tr><td>Dimension (H x W x D)</td><td>6.2” x 2.9” x 6.4”</td><td>6.5” x 3.0” x 6.7”</td></tr><tr><td>IP rating</td><td colspan=\"2\">IP68 dust-and-water resistant</td></tr><tr><td>Display</td><td>6.4” OLED, 90Hz, HDR, Gorilla Glass Victus</td><td>6.7” OLED, 120Hz, HDR, Gorilla Glass Victus</td></tr><tr><td>Resolution</td><td>FHD+ (1080 x 2340), 20:9 aspect ratio, 411 PPI</td><td>QHD+ (1440 x 3120), 19.5:9 aspect ratio, 512 PPI</td></tr><tr><td>Chipset</td><td colspan=\"2\">Google Tensor (5nm), Titan M2 (coprocessor)</td></tr><tr><td>RAM</td><td>8GB LPDDR5</td><td>12GB LPDDR5</td></tr><tr><td>Internal Storage</td><td>128/256GB UFS 3.1</td><td>128/256/512GB UFS 3.1</td></tr><tr><td>OS</td><td colspan=\"2\">Android 12 (3 years of Android update, 5 years of security patches)</td></tr><tr><td>Rear Camera</td><td>Dual (50MP primary, OIS + 12MP ultrawide sensor)</td><td>Triple (50MP, OIS + 12MP ultrawide + 4X telephoto sensor, OIS)</td></tr><tr><td>Selfie Camera</td><td>8MP, f/2.0</td><td>11.1MP, f/2.2</td></tr><tr><td>Audio</td><td colspan=\"2\">Stereo speakers</td></tr><tr><td>Security</td><td colspan=\"2\">In-display fingerprint scanner, Titan M2 security</td></tr><tr><td>Connectivity</td><td>5G, Wi-Fi 6, Bluetooth 5.2</td><td>5G, Wi-Fi 6, Bluetooth 5.2 Ultra-wideband</td></tr><tr><td>Battery</td><td>4,614mAh, 30W fast charging, Wireless Charging</td><td>5,003mAh, 30W fast charging, Wireless Charging</td></tr></tbody></table></figure>', 'After months of wait, Google has finally pulled the curtains off the Pixel 6 series—with the main highlight of the show being the new custom Tensor System on a Chip (SoC).', 3),
(22, 'Redragon H120 Wired Gaming Headset with Microphone', '<p>Crystal clear sound and excellent noise isolation brings you a total immersion into your gaming session. The 40mm neodymium directional drivers with 103dB sensitivity deliver extreme audio precision, while the soft padded closed ear cups offer advanced passive noise isolation. The headset offers ultimate comfort for prolonged gaming sessions through its low weight and noise reducing closed ear cups using soft comfortable signature memory foam with highly adjustable headband for perfect fit. Highly adjustable noise cancelling microphone offers optimized noise and echo cancelling technology for your voice chat during gaming sessions. This product comes with 2 PIN 3.5mm connections, 1 is used for AUDIO and 1 is used for MIC. In case the customer connects the audio pin only the mic will not function Also if used with a device which has only 1 3.5mm input port the mic will not function as the customer would have most likely connected the audio PIN.</p>', 'redragon.png', 8, '2022-06-14 00:27:56', '2022-06-14 00:30:10', '1278.00', NULL, '<ul><li>Crystal clear sound and excellent noise isolation brings you a total immersion into your gaming session; The 40mm neodymium directional drivers with 103dB sensitivity deliver extreme audio precision, while the soft padded Closed ear cups offer advanced passive noise isolation.</li><li>The headset offers ultimate comfort for prolonged gaming sessions through its low weight and noise reducing closed ear cups using soft comfortable signature memory foam with highly adjustable headband for perfect fit.</li><li>Highly adjustable noise cancelling microphone; the highly adjustable microphone offers optimized noise and echo cancelling technology for your voice chat during gaming sessions.</li><li>High quality cable with smart in-line volume control, the 6 foot long high quality cable comes with a gold plated 3.5mm connector and smart in-line volume controller which offers convenient and precise volume control.</li><li>Included is a 2 x 3.5mm to 1 x 3.5mm adapter ensuring complete compatibility to support all your devices such as PC, Laptop, Mobile, Console and more.</li></ul>', 'Crystal clear sound and excellent noise isolation brings you a total immersion into your gaming session; The 40mm neodymium directional drivers with 103dB sensitivity deliver extreme audio precision', 3),
(23, 'Asus ROG Strix G15 2021 G513QC Ryzen 5 5600H', '<p>Asus ROG Strix G15 2021 G513QC Gaming Laptop with&nbsp;5000-series AMD Ryzen 5 5600H processor (Featuring Hexa-core CPU), NVIDIA RTX 3050 Graphics Card with 4GB of GDDR6 VRAM, 16GB DDR4 RAM (Expandable up to 32GB), 512GB SSD Storage, Additional HDD slot for storage expansion, 15.6-inch IPS display with Full-HD (1920 x 1080 pixels) resolution, 144Hz refresh rate, 2x 4W Stereo speakers setup with Dolby Atmos support, RGB Backlit keyboard, 90Whr battery</p>', '62b82a61b12592226811QpiYXe-L._AC_SL1500_-removebg-preview.png', 7, '2022-06-26 03:59:02', '2022-06-26 03:59:02', '158000.00', NULL, '<figure class=\"table\"><table><tbody><tr><td>Brand</td><td><a href=\"https://itti.com.np/laptops-by-brands/asus-laptop-nepal\">ASUS</a></td></tr><tr><td>CPU</td><td>AMD Ryzen 5 5600H Mobile Processor (6-core/12-thread, 16MB cache, up to 4.2 GHz max boost)</td></tr><tr><td>Graphics</td><td>NVIDIA GeForce RTX 3050 4GB GDDR6 VRAM</td></tr><tr><td>Memory</td><td>16GB DDR4&nbsp;</td></tr><tr><td>Display</td><td>15.6-inch IPS display,&nbsp;Full-HD (1920 x 1080 pixels) resolution; 144Hz refresh rate; 16:9 aspect ratio</td></tr><tr><td>Type</td><td><a href=\"https://itti.com.np/gaming-laptops-nepal\">Gaming Laptop</a></td></tr></tbody></table></figure><figure class=\"table\"><table><tbody><tr><td>Storage</td><td>512GB SSD</td></tr><tr><td>Battery</td><td>4-cell Li-ion, 56WHrs, 4S1P</td></tr><tr><td>Keyboard</td><td>Backlit Chiclet RGB keyboard</td></tr></tbody></table></figure>', 'Asus ROG Strix G15 2021 G513QC Gaming Laptop with 5000-series AMD Ryzen 5 5600H processor (Featuring Hexa-core CPU), NVIDIA RTX 3050 Graphics Card with 4GB of GDDR6 VRAM,.', 1),
(24, 'Pandora Ryzen 14 AMD Ryzen 7 5700U', '<p>Ripple Pandora Ryzen carries a minimal design language with a silver matte finish. The laptop measures just <strong>15mm</strong> in thickness and weighs about <strong>0.98kg</strong>. Most parts of the laptop are made out of magnesium die-cast alloy including the top cover and the lid. For ports, it comes with 2X USB 3.2, 1X USB 2.0, 1X USB type C, 1X HDMI, 1X RJ45, 1X DC-in, Micro SD, and Audio I/O. It supports USB PD charging via USB Type-C.</p><p>In terms of processing power, the new version of the Pandora is equipped with a <strong>Ryzen 7 5700U</strong> processor from AMD. It has 8 cores based on the Zen 2 microarchitecture clocked at 1.8GHz to 4.3GHz (Turbo).</p><p>It is a 7nm chip but it is not based on the new Zen 3 architecture that can be seen on the faster <strong>Ryzen 7 5800U</strong>. For GPU, it has an integrated Radeon Vega 8 with 8 CUs and up to 1900 MHz.</p><p>This is paired with <strong>8GB of DDR4 RAM</strong> which can be upgraded up to 32GB. For storage, it comes with a <strong>256GB NVMe SSD</strong> and has an extra PCIE4 slot for expansion as well.</p><p>&nbsp;</p>', '62b94b5d38c082227pandora_ryzen14.png', 7, '2022-06-27 00:32:02', '2022-06-27 00:32:02', '110000.00', NULL, '<ul><li>Pandora Ryzen is 14” Full HD IPS display with a 60Hz screen refresh rate</li><li>The 14\'\'100% SRGB 60Hz |14\'\' FHD | IPS | 302nits brightness screen generates a crisp resolution of FHD 1920 x 1080</li><li>Incorporates the present-day Ryzen 7 5700U processor</li><li>Packs a durable Nvme Solid State Drive up to 1TB and RAM up to 32GB</li><li>Includes Radeon Vega 8 graphics</li><li>The modish laptop weights around 0.98kgs</li><li>High Definition Audio, Build-in 2W 2 speakers, Realtek ALC256 D3 mode support, Sound Blaster™ Cinema 6</li></ul>', 'Pandora Ryzen is 14” Full HD IPS display with a 60Hz screen refresh rate\r\nThe 14\'\'100% SRGB 60Hz |14\'\' FHD | IPS | 302nits brightness screen generates a crisp resolution of FHD 1920 x 1080.', 4),
(26, 'Mi Notebook Pro 2022', '<p>Xiaomi is on a launch spree in Nepal. Following the debut of two new members of the flagship <a href=\"https://www.gadgetbytenepal.com/xiaomi-12-price-nepal/\">Xiaomi 12</a> series a few days ago, the firm has now introduced two new ultrabooks in Nepal under ‘Mi’ branding—the Mi Notebook Pro, and Notebook Ultra. Here, we will walk through the specs, features, availability, and official price of the Mi Notebook Pro and Mi Notebook Ultra in Nepal.</p><h3><strong>Design and Display</strong></h3><p>To begin with, the Mi Notebook Pro and Ultra both feature a 6-series aerospace aluminum alloy body with a grey color finish. The latter weighs 1.79kg while the former is a comparatively lightweight machine that weighs 1.46kg.</p><p>In terms of display, the Pro variant flaunts a 14-inch TrueLife screen with a 2.5K resolution. Whereas, the non-Pro variant has a 15.6-inch Mi TrueLife+ display with 3K resolution and a 90Hz refresh rate. Likewise, both devices have a 16:10 aspect ratio, 100% sRGB color gamut, DC dimming, and TÜV Rheinland low blue light emission certification.</p><p><br>&nbsp;</p>', 'gsmarena_001-removebg-preview.png', 7, '2022-06-27 00:40:18', '2022-06-27 00:45:22', '109999.00', NULL, '<ul><li><strong>Display:</strong><ul><li>Pro: 14-inch TrueLife display, 2.5K (2560 x 1600), 215 PPI, 16:10 aspect ratio, 100% sRGB</li><li>Ultra: 15.6-inch Mi TrueLife+ display, 3.2K (3200 x 2000), 242 PPI, 16:10 aspect ratio, 100% sRGB, 90Hz</li></ul></li><li><strong>Display Feature:</strong> DC dimming, TÜV Rheinland certification for low-light</li><li><strong>Keyboard:</strong> 3-level backlit, scissor mechanism</li><li><strong>Processor:</strong><ul><li>Pro: Intel Core i5-11300H</li><li>Ultra: Intel Core i7-11370H</li></ul></li><li><strong>RAM: </strong>16GB DDR4@3200 RAM, 512GB PCIe NVMe SSD</li><li><strong>Graphics:</strong> Integrated Intel Iris Xe</li><li><strong>Webcam:</strong> 720p webcam</li><li><strong>Audio:</strong> 2x 2W speakers with DTS Audio</li><li><strong>Connectivity:</strong> WiFi 802.11 ax, Bluetooth 5.1</li><li><strong>Ports:</strong><ul><li>Pro: 1x USB Type-C, 1x Thunderbolt 4, 1x USB 3.2 Gen 1 Type-A, 1x USB 2.0 Type-A</li><li>Ultra: 1x USB Type-C, 1x Thunderbolt 4, 1x USB 3.2 Gen 1 Type-A, 1x USB 2.0 Type-A, 1x HDMI, 1x 3.5mm audio jack</li></ul></li><li><strong>Battery:</strong><ul><li>Pro: 56Wh</li><li>Ultra: 70Wh</li></ul></li><li><strong>Charging:</strong> 65W AC adapter</li><li><strong>Biometrics:</strong> Fingerprint sensor with Windows Hello</li></ul>', 'To begin with, the Mi Notebook Pro and Ultra both feature a 6-series aerospace aluminum alloy body with a grey color finish. The latter weighs 1.79kg while the former is a comparatively lightweight machine that weighs 1.46kg.', 4),
(27, 'Dell Inspiron 7391 i5 10th Gen', '<p>Brand new Dell Inspiron 7391 with 10th Gen Intel Core i5-10210U processor, 8GB RAM, 256GB SSD storage, 13.3-inch Full-HD (1920 x 1080 pixels) Display, Stereo speakers tuned with Waves MaxxAudio Pro, a Super thin and <a href=\"https://itti.com.np/ultrabook-laptop-nepal\">super-light budget ultrabook</a> with 0.59-inch thickness and 955 grams (2.1 lbs) weight</p>', '62b950c8aa6332227inspiron7391.jpg', 7, '2022-06-27 00:55:09', '2022-06-27 00:55:09', '118000.00', NULL, '<figure class=\"table\"><table><tbody><tr><td>CPU</td><td>10th Generation Intel&nbsp;Core i5-10210U Processor&nbsp;</td></tr><tr><td>RAM</td><td>8GB, onboard, LPDDR3, 2133MHz</td></tr><tr><td>Graphics</td><td>Intel UHD Graphic</td></tr><tr><td>Display</td><td>13.3-inch Truelife LED (1920 x 1080 pixels) Narrow Border Wide Viewing Angle Display</td></tr><tr><td>Connections</td><td>1 x HDMI 1.4b<br>1 x USB 3.1 Gen 1 Type-C (PD/power delivery)<br>1 x USB 3.1 Gen 1<br>1 x Micro SD card reader<br>1 x Headphone &amp; Microphone Audio Jack</td></tr><tr><td>Networking</td><td>802.11ac + Bluetooth 4.1, Dual Band 2.4&amp;5 GHz, 1x1</td></tr><tr><td>Storage</td><td>256GB SSD</td></tr><tr><td>Size: Height x width x depth&nbsp;</td><td>Height: 14.9 – 16.8mm (0.59 – 0.66\") x Width: 307.6mm (12.11\") x Depth: 204.7mm (8.06\"</td></tr><tr><td>Battery</td><td>4-cell 52Whr \"smart\" lithium-ion</td></tr><tr><td>Camera Webcam</td><td>HD RGB camera</td></tr><tr><td>Weight</td><td>955 Gram 2.1Lbs</td></tr><tr><td>Audio</td><td>(2) tuned speakers, audio processing by Waves MaxxAudio® Pro<br>(1) combo headphone/microphone jack</td></tr></tbody></table></figure>', 'Brand new Dell Inspiron 7391 with 10th Gen Intel Core i5-10210U processor, 8GB RAM, 256GB SSD storage, 13.3-inch Full-HD (1920 x 1080 pixels) Display, Stereo speakers tuned with Waves MaxxAudio Pro, a Super thin and super-light budget ultrabook .', 4);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `reviews` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ratings` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `product_id`, `reviews`, `ratings`, `created_at`, `updated_at`) VALUES
(2, 9, 22, 'Very good build quality of the product. Really apreciate it', 4, '2022-06-14 07:32:00', '2022-06-14 07:32:00'),
(3, 1, 21, 'good device but display quality is bad', 3, '2022-06-15 00:16:36', '2022-06-15 00:16:36'),
(4, 15, 23, 'Specs are pretty good. Build quality is plastic but feels premium. 144Hz screen feels smooth along with large touch pad with excellent palm rejection. No noticeable keyboard flex. Only problem I have is about the battery which is actually 56Whr and not 90Whr as mentioned in the description', 4, '2022-06-26 04:00:31', '2022-06-26 04:00:31');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` char(35) NOT NULL DEFAULT 'user',
  `description` text NOT NULL DEFAULT 'no-description',
  `created_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `role`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Vendor', '<p>The group of people responsible for adding and deleting new products.</p>', '2022-06-09 14:52:02', '2022-06-09 03:22:02'),
(2, 'User', '<p>A user is <strong>someone who uses something and is almost always said in reference to what they are using</strong>. There are a few special senses of user to be aware of. Sometimes calling someone a user is meant to imply that the person “uses” people. That is, they manipulate or exploit other people for selfish reasons.</p>', '2022-06-09 14:50:01', '2022-06-09 03:20:01'),
(3, 'Super Admin', '<p>A Super Administrator is <strong>a user who has complete access to all objects, folders, role templates, and groups in the system</strong>. A deployment can have one or more Super Administrators. A Super Administrator can create users, groups, and other super administrators.</p>', '2022-06-12 12:20:12', '2022-06-12 00:50:12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL DEFAULT 2,
  `role_checker` bigint(11) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `role_id`, `role_checker`, `created_at`, `updated_at`) VALUES
(1, 'Amogh', 'Amoghshakya@gmail.com', NULL, '$2y$10$aPUWwlikHdcVfxUxsmg8FuWsRBoCo7qdVJViHuWvvLJp.SPoat9xu', 'FuFIY2kealwm4viTvk9EzBQ2QhgQZM4kcYD3LxFIqupXUctnohSra5fXOVZ8', 1, 1, '2022-04-15 02:41:23', '2022-04-15 02:41:23'),
(3, 'Ramesh', 'Rameshprasad123@gmail.com', NULL, '$2y$10$i.EefWdEilx7nsX47yShC.uLaxgSz6UesRmI15BGy7bze5D7AuIDK', 'HqxKsF7RSKyfc75DdYRhBQsYZxP2eMUlNfFzRSgU6xsvfuts48HiXlqylc3m', 1, 1, '2022-05-09 10:26:02', '2022-05-09 10:26:02'),
(4, 'Anil', 'Anilsapkota@gmail.com', NULL, '$2y$10$f5e8iepHDiXhBbXP/Q6aiO.cSljHKtEU7JdRi8oRQDwX0BS5jIM7i', NULL, 1, 1, '2022-06-02 02:17:11', '2022-06-02 02:17:11'),
(6, 'Pokemon', 'Pokemonsan@hotmail.com', NULL, '$2y$10$KS04Ewfnjjh70SKGgSPBJejwXBJ8eOZ1LnEYYroLB5GaItoQeZ.HO', NULL, 2, 0, '2022-06-10 10:33:28', '2022-06-10 10:33:28'),
(9, 'Asahi', 'Asahidono@yahoo.com', NULL, '$2y$10$b2WlOswjjua3bG0oFKmIxe/2ei2c7lIu/o8qnEEMu0UraSZP/mjQK', NULL, 2, 0, '2022-06-10 23:13:03', '2022-06-27 01:50:58'),
(15, 'Sakura', 'sakuramiyawaki@gmail.com', NULL, '$2y$10$KlDZjCaHp1onWAmAXcSIEe6XOjyDzLvTKyawr1x2GpMa3sdzGdymG', NULL, 2, 0, '2022-06-10 23:36:34', '2022-06-11 09:50:51'),
(17, 'Jake ', 'jakeshrestha@yahoo.com', NULL, '$2y$10$9x0NOLtFFlVDFzh9zl.RG.V2.hHX2mJzd/xoQdUTyC9gcwRcxUtDu', NULL, 1, 1, '2022-06-27 01:39:37', '2022-06-27 01:41:30'),
(18, 'Naruto', 'narutoshakya@gmail.com', NULL, '$2y$10$StjG5IlqbfHsWvBWDwULvu2x3OQj2sXrlxGSw.GyFLAYu0mJ6BApq', NULL, 3, 0, '2022-06-27 01:47:03', '2022-06-27 01:47:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`id`),
  ADD KEY `checkout_order_id_foreign` (`order_id`),
  ADD KEY `checkout_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_category_id_foreign` (`category_id`),
  ADD KEY `product_users_id_foreign` (`users_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_user_id_foreign` (`user_id`),
  ADD KEY `reviews_product_id_foreign` (`product_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `checkout`
--
ALTER TABLE `checkout`
  ADD CONSTRAINT `checkout_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `checkout_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `product_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
