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
('AdminRol', '1', 1677807726),
('UsuarioRol', '2', 1677807737);

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
('/users/*', 2, NULL, NULL, NULL, 1711184695, 1711184695),
('/users/users/update', 2, NULL, NULL, NULL, 1711532792, 1711532792),
('/users/users/view', 2, NULL, NULL, NULL, 1711532786, 1711532786),
('AdminRol', 1, 'Rol para Administradores del sistema', NULL, NULL, 1677807604, 1712393101),
('PermisoAdmin', 2, 'Permiso para roles de Administrador', NULL, NULL, 1677807368, 1712392943),
('PermisoUsuario', 2, 'Permiso para roles de usuario', NULL, NULL, 1677807505, 1712392977),
('UsuarioRol', 1, 'Rol para usuarios del sistema', NULL, NULL, 1677807665, 1712393075);

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
('PermisoUsuario', '/gridview/*'),
('PermisoAdmin', '/rbac/*'),
('PermisoAdmin', '/site/*'),
('PermisoUsuario', '/site/*'),
('PermisoAdmin', '/users/*'),
('PermisoUsuario', '/users/users/update'),
('PermisoUsuario', '/users/users/view'),
('AdminRol', 'PermisoAdmin'),
('UsuarioRol', 'PermisoUsuario');

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
-- Table structure for table `error_log`
--

CREATE TABLE `error_log` (
  `id_error_log` int(11) NOT NULL,
  `controller` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `id_user` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id_log` int(11) NOT NULL,
  `id_record` int(11) NOT NULL,
  `controller` varchar(25) NOT NULL,
  `action` varchar(25) NOT NULL,
  `original_data` text NOT NULL,
  `updated_data` text NOT NULL,
  `id_user` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `name`, `lastname`, `auth_key`, `password_hash`, `email`, `picture`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Admin', 'Administrador', 'AxK42pI4nqEvIyBOBUJVfSR9oRTq-chL', '$2y$13$0rNFkKca0Vbo8K1XK1gtoeysY4lS4rg3RrycanNNCxilHlXGHfChm', 'admin@email.com', '/avatars/default.png', 1, 1677203598, 1677203598),
(2, 'usuario', 'usuario', 'registrado', '_LDZ2AUvtDDoy36zC6bJhNgJRM9rYO3D', '$2y$13$t.6BcOSVcwwYyX3vtLA7LOh9LG7FOvGEbCkSS.QpT7xpmhTij56Y6', 'usuario@email.com', '/avatars/default.png', 1, 1677203935, 1677203935);

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
-- Indexes for table `error_log`
--
ALTER TABLE `error_log`
  ADD PRIMARY KEY (`id_error_log`),
  ADD KEY `us_id` (`id_user`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id_log`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `error_log`
--
ALTER TABLE `error_log`
  MODIFY `id_error_log` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- Constraints for table `error_log`
--
ALTER TABLE `error_log`
  ADD CONSTRAINT `error_log_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `log`
--
ALTER TABLE `log`
  ADD CONSTRAINT `log_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);
