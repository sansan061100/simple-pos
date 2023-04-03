-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 03 Apr 2023 pada 00.10
-- Versi server: 8.0.30
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_larapos`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `category`
--

CREATE TABLE `category` (
  `id` int NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(6, 'Laptop'),
(7, 'Handphone'),
(8, 'Cashier');

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `id` int NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` text,
  `phone_number` varchar(25) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`id`, `name`, `address`, `phone_number`, `created_at`, `updated_at`) VALUES
(1, 'Sansan', 'tes', '08123123', '2023-04-02 07:14:22', '2023-04-02 07:16:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `order`
--

CREATE TABLE `order` (
  `id` int NOT NULL,
  `invoice_code` varchar(255) DEFAULT NULL,
  `amount` int DEFAULT NULL,
  `paid` int DEFAULT NULL,
  `change` int DEFAULT NULL,
  `discount` int DEFAULT NULL,
  `tax` int DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `customer_id` int NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_product`
--

CREATE TABLE `order_product` (
  `id` int NOT NULL,
  `order_id` int NOT NULL,
  `stocks_id` int NOT NULL,
  `discount` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `product`
--

CREATE TABLE `product` (
  `id` int NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `sku` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `purchase_price` int DEFAULT NULL,
  `selling_price` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `stocks`
--

CREATE TABLE `stocks` (
  `id` int NOT NULL,
  `product_id` int NOT NULL,
  `qty` int DEFAULT NULL,
  `purchase_price` int DEFAULT NULL,
  `selling_price` int DEFAULT NULL,
  `description` text,
  `status` tinyint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` tinyint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 'Sansan', 'admin', '$2y$10$4Ko90aMdEwEDKEmYp/Gg5ekSvO8Pe1UzIKqZTf5eDa5iJklLSKH1i', NULL, NULL, NULL, 1),
(1003, 'Cashier 2', 'cashier2', '$2y$10$cdLCP8L4k6gPGl3dxefud./MWq0BzbgCEYwWwd3tSVvlL/7vHiznm', NULL, '2023-04-02 05:34:19', '2023-04-02 05:35:47', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_order_customer1_idx` (`customer_id`),
  ADD KEY `fk_order_user1_idx` (`user_id`);

--
-- Indeks untuk tabel `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_order_product_order1_idx` (`order_id`),
  ADD KEY `fk_order_product_stocks1_idx` (`stocks_id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_product_category_idx` (`category_id`);

--
-- Indeks untuk tabel `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_stock_product1_idx` (`product_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `category`
--
ALTER TABLE `category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `order`
--
ALTER TABLE `order`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `order_product`
--
ALTER TABLE `order_product`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `product`
--
ALTER TABLE `product`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1005;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `fk_order_customer1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`),
  ADD CONSTRAINT `fk_order_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Ketidakleluasaan untuk tabel `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `fk_order_product_order1` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`),
  ADD CONSTRAINT `fk_order_product_stocks1` FOREIGN KEY (`stocks_id`) REFERENCES `stocks` (`id`);

--
-- Ketidakleluasaan untuk tabel `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_product_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Ketidakleluasaan untuk tabel `stocks`
--
ALTER TABLE `stocks`
  ADD CONSTRAINT `fk_stock_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
