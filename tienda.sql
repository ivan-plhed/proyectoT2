-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 12-02-2025 a las 19:35:16
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `linea_pedidos`
--

CREATE TABLE `linea_pedidos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pedido_id` bigint(20) UNSIGNED NOT NULL,
  `id_producto` int(11) NOT NULL,
  `nombre_producto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `precio_producto` double(8,2) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_total` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2025_01_31_171009_create_productos_table', 1),
(4, '2025_02_12_123437_create_pedidos_table', 2),
(5, '2025_02_12_123444_create_linea_pedidos_table', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_compra` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
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
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(6,2) NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `name`, `price`, `img`, `created_at`, `updated_at`) VALUES
(1, 'Akko V3 Pro ', 9.95, 'akko_v3_pro_sw.jpg', '2025-02-06 10:08:24', '2025-02-06 10:08:24'),
(2, 'EK68', 14.95, 'ek68_kb.jpg', '2025-02-06 10:08:24', '2025-02-06 10:08:24'),
(3, 'Epomaker  Flamingo', 16.99, 'epomaker_flamingo_sw.jpg', '2025-02-06 10:08:24', '2025-02-06 10:08:24'),
(4, 'Sunzit ABS', 11.50, 'sunzit_abs_kc.jpg', '2025-02-06 10:08:24', '2025-02-06 10:08:24'),
(5, 'Glorious Panda', 12.99, 'glorious_panda_sw.jpg', '2025-02-06 10:08:24', '2025-02-06 10:08:24'),
(6, 'Holy Panda', 16.00, 'holy_panda_sw.jpg', '2025-02-06 10:08:24', '2025-02-06 10:08:24'),
(7, 'Jaketsai PBT', 22.95, 'jaketsai_pbt_kc.jpg', '2025-02-06 10:08:24', '2025-02-06 10:08:24'),
(8, 'Magic Refiner RK68', 80.95, 'magic_refiner_rk68_kb.jpg', '2025-02-06 10:08:24', '2025-02-06 10:08:24'),
(9, 'Outemu Cream', 17.50, 'outemu_cream_sw.jpg', '2025-02-06 10:08:24', '2025-02-06 10:08:24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dni` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `dni`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '48394859A', 'admin', 'admin@tienda.com', '2025-02-06 10:08:24', '$2y$10$FCGtSYSalTzmVymRiTwEie3YVAyDp9AIMxNKFnnqnRRN2YXwN938m', 'admin', '4zytO76O34trw3OjgLUHYCxWReNRrTdHyYKUIhd8wN65RJ0c9kQ8TlL7i8jE', '2025-02-06 10:08:24', '2025-02-06 10:08:24'),
(2, '68574938Z', 'user', 'user@tienda.com', '2025-02-06 10:08:24', '$2y$10$IoEZumWcXed27xCmv7AMjOWDd5rBKHdm1h0FuH4EDIOZClplYMRUy', 'user', 'NbtcvJyTMIYrNdXjrM7iX3JfmNJziEFyFja1h5TmvcMTauD4SeMxxjcMZJJ8', '2025-02-06 10:08:24', '2025-02-06 10:08:24'),
(3, '62947591V', 'Mia Boehm MD', 'jeffry.emmerich@example.org', '2025-02-06 10:08:24', '$2y$10$6/mBc4G2z2P2H7i4L5nWZOtX70gGodtcORiZFwSze3WMgGoPW1tQe', 'user', 'JMD5PYeADQ', '2025-02-06 10:08:24', '2025-02-06 10:08:24'),
(4, '40187623M', 'Afton Gibson', 'ryan.yoshiko@example.org', '2025-02-06 10:08:24', '$2y$10$ZJH2AvxWrmPup85FonNPxOVe5Qc/izv7tFPDWgILmGMwVC.a52Juu', 'user', 'btaFJUu4KZ', '2025-02-06 10:08:24', '2025-02-06 10:08:24'),
(5, '23407998O', 'Miss Cierra Cartwright', 'runte.lisandro@example.org', '2025-02-06 10:08:24', '$2y$10$y8Em8Q9uqVQk9pn.kDNuq.wguHdUhjNDE33Gl1z6HUSW40L7JLoPa', 'user', 'QiqU1pYKFp', '2025-02-06 10:08:24', '2025-02-06 10:08:24'),
(6, '66836169H', 'Dr. Gabriella Wiegand III', 'johnny.jones@example.net', '2025-02-06 10:08:24', '$2y$10$A8AitTGtXx204g1dVC.2QeLEVMzVihfXLs2KHvH7k3G5jbS/HxQki', 'user', 'ezAI6TS7sX', '2025-02-06 10:08:24', '2025-02-06 10:08:24');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `linea_pedidos`
--
ALTER TABLE `linea_pedidos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `linea_pedidos`
--
ALTER TABLE `linea_pedidos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
