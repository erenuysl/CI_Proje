-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 17 Mar 2024, 17:52:30
-- Sunucu sürümü: 10.4.28-MariaDB
-- PHP Sürümü: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `proje`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `branches`
--

CREATE TABLE `branches` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tetikleyiciler `branches`
--
DELIMITER $$
CREATE TRIGGER `branches_delete` BEFORE DELETE ON `branches` FOR EACH ROW INSERT INTO branches_log (created_at, log_type, user_id, old_title, old_address)
VALUES (NOW(), "Branches Delete", "1", OLD.title, OLD.address)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `branches_update` BEFORE UPDATE ON `branches` FOR EACH ROW INSERT INTO branches_log (created_at, log_type, user_id, old_title, old_address)
VALUES (NOW(), "Branches Update", "1", OLD.title, OLD.address)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `branches_log`
--

CREATE TABLE `branches_log` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `log_type` varchar(20) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `old_title` varchar(250) NOT NULL,
  `old_adress` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `img_url` varchar(255) NOT NULL,
  `title` varchar(150) NOT NULL,
  `rank` tinyint(4) NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tetikleyiciler `brands`
--
DELIMITER $$
CREATE TRIGGER `brands_delete` BEFORE DELETE ON `brands` FOR EACH ROW INSERT INTO brands_log (created_at, log_type, user_id, old_id, old_img_url, old_title, old_rank, old_is_active) 
VALUES (NOW(), "Brands Delete", "1", OLD.id, OLD.img_url, OLD.title, OLD.rank, OLD.is_active)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `brands_update` BEFORE UPDATE ON `brands` FOR EACH ROW INSERT INTO brands_log (created_at, log_type, user_id, old_id, old_img_url, old_title, old_rank, old_is_active)
VALUES (NOW(), "Brands Update", "1", OLD.id, OLD.img_url, OLD.title, OLD.rank, OLD.is_active)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `brands_log`
--

CREATE TABLE `brands_log` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `log_type` varchar(255) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `old_id` int(11) NOT NULL,
  `old_img_url` varchar(255) NOT NULL,
  `old_title` varchar(255) NOT NULL,
  `old_rank` tinytext NOT NULL,
  `old_is_active` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `img_url` varchar(255) NOT NULL,
  `title` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `rank` tinyint(4) NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tetikleyiciler `products`
--
DELIMITER $$
CREATE TRIGGER `products_delete` BEFORE DELETE ON `products` FOR EACH ROW INSERT INTO products_log (created_at, log_type, user_id, old_id, old_img_url, old_title, old_description, old_rank, old_is_active)
VALUES (NOW(), "Products Delete", "1", OLD.id, OLD.img_url, OLD.title, OLD.description, OLD.rank, OLD.is_active)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `products_update` BEFORE UPDATE ON `products` FOR EACH ROW INSERT INTO products_log (created_at, log_type, user_id, old_id, old_img_url, old_title, old_description, old_rank, old_is_active)
VALUES (NOW(), "Products Update", "1", OLD.id, OLD.img_url, OLD.title, OLD.description, OLD.rank, OLD.is_active)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `products_log`
--

CREATE TABLE `products_log` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `log_type` varchar(255) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `old_id` int(11) NOT NULL,
  `old_img_url` varchar(255) NOT NULL,
  `old_title` varchar(255) NOT NULL,
  `old_description` text NOT NULL,
  `old_rank` tinyint(4) NOT NULL,
  `old_is_active` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `product_categories`
--

CREATE TABLE `product_categories` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `rank` tinyint(4) NOT NULL,
  `is_cover` tinyint(4) NOT NULL,
  `img_url` varchar(255) NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tetikleyiciler `product_images`
--
DELIMITER $$
CREATE TRIGGER `product_images_delete` BEFORE DELETE ON `product_images` FOR EACH ROW INSERT INTO product_images_log (created_at, log_type, user_id, old_id, old_product_id, old_rank, old_is_cover, old_img_url, old_is_active)
VALUES (NOW(), "Product Images Delete", "1", OLD.id, OLD.product_id, OLD.rank, OLD.is_cover, OLD.img_url, OLD.is_active)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `product_images_update` BEFORE UPDATE ON `product_images` FOR EACH ROW INSERT INTO product_images_log (created_at, log_type, user_id, old_id, old_product_id, old_rank, old_is_cover, old_img_url, old_is_active)
VALUES (NOW(), "Product Images Update", "1", OLD.id, OLD.product_id, OLD.rank, OLD.is_cover, OLD.img_url, OLD.is_active)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `product_images_log`
--

CREATE TABLE `product_images_log` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `log_type` varchar(255) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `old_id` int(11) NOT NULL,
  `old_product_id` int(11) NOT NULL,
  `old_rank` tinyint(4) NOT NULL,
  `old_is_cover` tinyint(4) NOT NULL,
  `old_img_url` varchar(255) NOT NULL,
  `old_is_active` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `references`
--

CREATE TABLE `references` (
  `id` int(11) NOT NULL,
  `img_url` varchar(255) NOT NULL,
  `title` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `rank` tinyint(4) NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tetikleyiciler `references`
--
DELIMITER $$
CREATE TRIGGER `references_delete` BEFORE DELETE ON `references` FOR EACH ROW INSERT INTO `references_log` (created_at, log_type, user_id, old_id, old_img_url, old_title, old_description, old_rank, old_is_active)
VALUES (NOW(), "References Delete", "1", OLD.id, OLD.img_url, OLD.title, OLD.description, OLD.rank, OLD.is_active)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `references_update` BEFORE UPDATE ON `references` FOR EACH ROW INSERT INTO `references_log` (created_at, log_type, user_id, old_id, old_img_url, old_title, old_description, old_rank, old_is_active)
VALUES (NOW(), "REFERENCES UPDATE", "1", OLD.id, OLD.img_url, OLD.title, OLD.description, OLD.rank, OLD.is_active)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `references_log`
--

CREATE TABLE `references_log` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `log_type` varchar(255) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `old_id` int(11) NOT NULL,
  `old_img_url` varchar(255) NOT NULL,
  `old_title` varchar(150) NOT NULL,
  `old_description` text NOT NULL,
  `old_rank` tinyint(4) NOT NULL,
  `old_is_active` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `img_url` varchar(255) NOT NULL,
  `title` varchar(150) NOT NULL,
  `url` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `rank` tinyint(4) NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tetikleyiciler `services`
--
DELIMITER $$
CREATE TRIGGER `services_delete` BEFORE DELETE ON `services` FOR EACH ROW INSERT INTO services_log (created_at, log_type, user_id, old_id, old_img_url, old_title, old_url, old_description, old_rank, old_is_active) 
VALUES (NOW(), "Services Delete", "1", OLD.id, OLD.img_url, OLD.title, OLD.url, OLD.description, OLD.rank, OLD.is_active)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `services_update` BEFORE UPDATE ON `services` FOR EACH ROW INSERT INTO services_log (created_at, log_type, user_id, old_id, old_img_url, old_title, old_url, old_description, old_rank, old_is_active) 
VALUES (NOW(), "Services Update", "1", OLD.id, OLD.img_url, OLD.title, OLD.url, OLD.description, OLD.rank, OLD.is_active)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `services_log`
--

CREATE TABLE `services_log` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `log_type` varchar(255) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `old_id` int(11) NOT NULL,
  `old_img_url` varchar(255) NOT NULL,
  `old_title` varchar(150) NOT NULL,
  `old_url` varchar(255) NOT NULL,
  `old_description` text NOT NULL,
  `old_rank` tinyint(4) NOT NULL,
  `old_is_active` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `company_name` varchar(150) NOT NULL,
  `address` varchar(255) NOT NULL,
  `about_us` text NOT NULL,
  `slogan` varchar(255) NOT NULL,
  `mission` text NOT NULL,
  `vision` text NOT NULL,
  `img_url` varchar(255) NOT NULL,
  `mobile_image_url` varchar(255) NOT NULL,
  `favicon` varchar(255) NOT NULL,
  `phone1` varchar(150) NOT NULL,
  `phone2` varchar(150) NOT NULL,
  `email` varchar(255) NOT NULL,
  `facebook` varchar(150) NOT NULL,
  `twitter` varchar(150) NOT NULL,
  `instagram` varchar(150) NOT NULL,
  `linkedin` varchar(150) NOT NULL,
  `gsm1` varchar(80) NOT NULL,
  `gsm2` varchar(80) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tetikleyiciler `settings`
--
DELIMITER $$
CREATE TRIGGER `settings_delete` BEFORE DELETE ON `settings` FOR EACH ROW INSERT INTO settings_log (created_at, log_type, user_id, old_id, old_company_name, old_address, old_about_us, old_slogan, old_mission, old_vision, old_image_url, old_mobile_image_url, old_favicon, old_phone1, old_phone2, old_email, old_facebook, old_twitter, old_instagram, old_linkedin, old_gsm1, old_gsm2) 
VALUES (NOW(), "Settings Delete", "1", OLD.id, OLD.company_name, OLD.address, OLD.about_us, OLD.slogan, OLD.mission, OLD.vision, OLD.img_url, OLD.mobile_image_url, OLD.favicon, OLD.phone1, OLD.phone2, OLD.email, OLD.facebook, OLD.twitter, OLD.instagram, OLD.linkedin, OLD.gsm1, OLD.gsm2)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `settings_update` BEFORE UPDATE ON `settings` FOR EACH ROW INSERT INTO settings_log (created_at, log_type, user_id, old_id, old_company_name, old_address, old_about_us, old_slogan, old_mission, old_vision, old_image_url, old_mobile_image_url, old_favicon, old_phone1, old_phone2, old_email, old_facebook, old_twitter, old_instagram, old_linkedin, old_gsm1, old_gsm2) 
VALUES (NOW(), "Settings Update", "1", OLD.id, OLD.company_name, OLD.address, OLD.about_us, OLD.slogan, OLD.mission, OLD.vision, OLD.img_url, OLD.mobile_image_url, OLD.favicon, OLD.phone1, OLD.phone2, OLD.email, OLD.facebook, OLD.twitter, OLD.instagram, OLD.linkedin, OLD.gsm1, OLD.gsm2)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `settings_log`
--

CREATE TABLE `settings_log` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `log_type` varchar(255) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `old_id` int(11) NOT NULL,
  `old_company_name` varchar(150) NOT NULL,
  `old_address` varchar(255) NOT NULL,
  `old_about_us` text NOT NULL,
  `old_slogan` varchar(255) NOT NULL,
  `old_mission` text NOT NULL,
  `old_vision` text NOT NULL,
  `old_image_url` varchar(255) NOT NULL,
  `old_mobile_image_url` varchar(255) NOT NULL,
  `old_favicon` varchar(255) NOT NULL,
  `old_phone1` varchar(150) NOT NULL,
  `old_phone2` varchar(150) NOT NULL,
  `old_email` varchar(255) NOT NULL,
  `old_facebook` varchar(150) NOT NULL,
  `old_twitter` varchar(150) NOT NULL,
  `old_instagram` varchar(150) NOT NULL,
  `old_linkedin` varchar(150) NOT NULL,
  `old_gsm1` varchar(80) DEFAULT NULL,
  `old_gsm2` varchar(80) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `full_name` varchar(150) NOT NULL,
  `company` varchar(150) NOT NULL,
  `img_url` varchar(255) NOT NULL,
  `rank` tinyint(4) NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tetikleyiciler `testimonials`
--
DELIMITER $$
CREATE TRIGGER `testimonials_delete` BEFORE DELETE ON `testimonials` FOR EACH ROW INSERT INTO testimonials_log (created_at, log_type, user_id, old_id, old_title, old_description, old_full_name, old_company, old_img_url, old_rank, old_is_active) 
VALUES (NOW(), "Testimonials Delete", "1", OLD.id, OLD.title, OLD.description, OLD.full_name, OLD.company, OLD.img_url, OLD.rank, OLD.is_active)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `testimonials_update` BEFORE UPDATE ON `testimonials` FOR EACH ROW INSERT INTO testimonials_log (created_at, log_type, user_id, old_id, old_title, old_description, old_full_name, old_company, old_img_url, old_rank, old_is_active) 
VALUES (NOW(), "Testimonials Update", "1", OLD.id, OLD.title, OLD.description, OLD.full_name, OLD.company, OLD.img_url, OLD.rank, OLD.is_active)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `testimonials_log`
--

CREATE TABLE `testimonials_log` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `log_type` varchar(255) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `old_id` int(11) NOT NULL,
  `old_title` varchar(150) NOT NULL,
  `old_description` text NOT NULL,
  `old_full_name` varchar(150) NOT NULL,
  `old_company` varchar(150) NOT NULL,
  `old_img_url` varchar(255) NOT NULL,
  `old_rank` tinyint(4) NOT NULL,
  `old_is_active` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `img_url` varchar(255) NOT NULL,
  `email` varchar(150) NOT NULL,
  `name` varchar(150) NOT NULL,
  `surname` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `is_active` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tetikleyiciler `users`
--
DELIMITER $$
CREATE TRIGGER `users_delete` BEFORE DELETE ON `users` FOR EACH ROW INSERT INTO users_log (created_at, log_type, user_id, old_id, old_img_url, old_email, old_name, old_name, old_surname, old_password, old_is_active) 
VALUES (NOW(), "Users Delete", "1", OLD.id, old.img_url, old.email, old.name, old.surname, old.password, old.is_active)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `users_update` BEFORE UPDATE ON `users` FOR EACH ROW INSERT INTO users_log (created_at, log_type, user_id, old_id, old_img_url, old_email, old_name, old_name, old_surname, old_password, old_is_active) 
VALUES (NOW(), "Users Update", "1", OLD.id, old.img_url, old.email, old.name, old.surname, old.password, old.is_active)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users_log`
--

CREATE TABLE `users_log` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `log_type` varchar(255) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `old_id` int(11) NOT NULL,
  `old_img_url` varchar(255) NOT NULL,
  `old_email` varchar(150) NOT NULL,
  `old_name` varchar(150) NOT NULL,
  `old_surname` varchar(150) NOT NULL,
  `old_password` varchar(150) NOT NULL,
  `old_is_active` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `branches_log`
--
ALTER TABLE `branches_log`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `brands_log`
--
ALTER TABLE `brands_log`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `references`
--
ALTER TABLE `references`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `branches`
--
ALTER TABLE `branches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `branches_log`
--
ALTER TABLE `branches_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `brands_log`
--
ALTER TABLE `brands_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `references`
--
ALTER TABLE `references`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
