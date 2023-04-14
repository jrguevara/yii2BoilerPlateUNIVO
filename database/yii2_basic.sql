-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 25, 2023 at 01:13 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yii2_basic`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('Administrador', '1', 1677807726),
('DemoRol', '2', 1677807737);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('/debug/*', 2, NULL, NULL, NULL, 1677807204, 1677807204),
('/gii/*', 2, NULL, NULL, NULL, 1677807211, 1677807211),
('/gridview/*', 2, NULL, NULL, NULL, 1677807174, 1677807174),
('/rbac/*', 2, NULL, NULL, NULL, 1677807195, 1677807195),
('/site/*', 2, NULL, NULL, NULL, 1677807256, 1677807256),
('/usuarios/*', 2, NULL, NULL, NULL, 1677807263, 1677807263),
('Administrador', 1, 'Rol de Administrador del sistema', NULL, NULL, 1677807604, 1677807684),
('DemoRol', 1, 'Rol para demosntacion', NULL, NULL, 1677807665, 1677807665),
('PermisoAdmin', 2, 'Este es el permiso para el administrador', NULL, NULL, 1677807368, 1677807368),
('PermisoDemo', 2, 'Este es un permiso para DEmostracion', NULL, NULL, 1677807505, 1677807505);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('PermisoAdmin', '/debug/*'),
('PermisoAdmin', '/gii/*'),
('PermisoAdmin', '/gridview/*'),
('PermisoDemo', '/gridview/*'),
('PermisoAdmin', '/rbac/*'),
('PermisoAdmin', '/site/*'),
('PermisoDemo', '/site/*'),
('PermisoAdmin', '/usuarios/*'),
('Administrador', 'PermisoAdmin'),
('DemoRol', 'PermisoDemo');

-- --------------------------------------------------------

--
-- Table structure for table `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bitacora`
--

CREATE TABLE `tbl_bitacora` (
  `id_bitacora` int(11) NOT NULL,
  `id_registro` int(11) NOT NULL,
  `controlador` varchar(25) NOT NULL,
  `accion` varchar(25) NOT NULL,
  `data_original` text NOT NULL,
  `data_modificada` text NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Table structure for table `tbl_error_log`
--

CREATE TABLE `tbl_error_log` (
  `id_error_log` int(11) NOT NULL,
  `controller` varchar(50) NOT NULL,
  `mensaje` text NOT NULL,
  `us_id` int(11) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_usuarios`
--

CREATE TABLE `tbl_usuarios` (
  `id_usuario` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `apellido` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `imagen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_usuarios`
--

INSERT INTO `tbl_usuarios` (`id_usuario`, `username`, `nombre`, `apellido`, `auth_key`, `password_hash`, `email`, `imagen`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Admin', 'Admin', 'AxK42pI4nqEvIyBOBUJVfSR9oRTq-chL', '$2y$13$vfsku0ucja/nzCddYYjL3upKL9uDe/gUyNXK0gqTX0eJ7nFTRIrEu', 'admin@outlook.com', '/avatars/6_iFu3jKc-1Qmp51WicY_bb5mzyGBqT5.gif', 1, 1677203598, 1677203598),
(2, 'demo', 'demo', 'demo', '_LDZ2AUvtDDoy36zC6bJhNgJRM9rYO3D', '$2y$13$hGFn5B62kUT0kmTZtQS8We5sIj0vsg1mDH/dyf/j1tZVatVcD4khi', 'demo@outlook.com', '/avatars/default.png', 1, 1677203935, 1677203935);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`),
  ADD KEY `idx-auth_assignment-user_id` (`user_id`);

--
-- Indexes for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Indexes for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indexes for table `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `tbl_bitacora`
--
ALTER TABLE `tbl_bitacora`
  ADD PRIMARY KEY (`id_bitacora`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indexes for table `tbl_error_log`
--
ALTER TABLE `tbl_error_log`
  ADD PRIMARY KEY (`id_error_log`),
  ADD KEY `us_id` (`us_id`);

--
-- Indexes for table `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_bitacora`
--
ALTER TABLE `tbl_bitacora`
  ADD CONSTRAINT `tbl_bitacora_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `tbl_usuarios` (`id_usuario`);

--
-- Constraints for table `tbl_error_log`
--
ALTER TABLE `tbl_error_log`
  ADD CONSTRAINT `tbl_error_log_ibfk_1` FOREIGN KEY (`us_id`) REFERENCES `tbl_usuarios` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
