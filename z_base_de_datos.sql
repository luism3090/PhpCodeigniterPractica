-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-08-2017 a las 00:21:27
-- Versión del servidor: 5.6.20
-- Versión de PHP: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `polizas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menus`
--

CREATE TABLE IF NOT EXISTS `menus` (
`id_elemento_menu` int(11) unsigned NOT NULL,
  `id_tipo_menu` int(11) unsigned NOT NULL,
  `hijos` char(5) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `icono` varchar(100) DEFAULT NULL,
  `id_elemento_padre_menu` int(11) DEFAULT NULL,
  `controlador` varchar(100) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=60 ;

--
-- Volcado de datos para la tabla `menus`
--

INSERT INTO `menus` (`id_elemento_menu`, `id_tipo_menu`, `hijos`, `descripcion`, `icono`, `id_elemento_padre_menu`, `controlador`) VALUES
(1, 1, 'SI', 'Administracion', 'fa fa-cog', NULL, NULL),
(2, 1, NULL, 'Layouts', 'fa fa-diamond', NULL, NULL),
(3, 1, 'SI', 'Graphs', 'fa fa-bar-chart-o', NULL, NULL),
(4, 1, NULL, 'Grid options', 'fa fa-laptop', NULL, NULL),
(5, 1, 'SI', 'Tables', 'fa fa-table', NULL, NULL),
(6, 1, 'SI', 'E-commerce', 'fa fa-shopping-cart', NULL, NULL),
(7, 1, NULL, 'Metrics', 'fa fa-pie-chart', NULL, NULL),
(8, 1, NULL, 'Other Pages', 'fa fa-files-o', NULL, NULL),
(9, 1, NULL, 'Other Pages', 'fa fa-files-o', NULL, NULL),
(10, 1, NULL, 'Other Pages', 'fa fa-files-o', NULL, NULL),
(11, 1, NULL, 'Other Pages', 'fa fa-files-o', NULL, NULL),
(12, 1, NULL, 'Other Pages', 'fa fa-files-o', NULL, NULL),
(13, 2, 'SI', 'Usuarios', 'fa fa-user', 1, NULL),
(14, 2, '', 'Buttons', '', 1, NULL),
(15, 2, '', 'Tabs y Acordions', 'fa fa-th-large', 1, NULL),
(16, 2, 'SI', 'tipografy', 'fa fa-th-large', 1, NULL),
(17, 2, NULL, 'FontAwesome', NULL, 1, NULL),
(18, 2, '', 'Css3_Animation', '', 1, NULL),
(19, 2, 'SI', 'Slider', 'fa fa-th-large', 1, NULL),
(20, 2, NULL, 'Panels', NULL, 1, NULL),
(21, 2, NULL, 'Widgets', NULL, 1, NULL),
(22, 2, NULL, 'Boostrap Model', NULL, 1, NULL),
(23, 3, NULL, 'Javascript', NULL, 19, NULL),
(24, 3, NULL, 'React JS', NULL, 19, NULL),
(25, 2, NULL, 'Ajax', NULL, 3, NULL),
(26, 2, NULL, 'Java', NULL, 3, NULL),
(27, 2, NULL, 'PHP', NULL, 3, NULL),
(28, 2, NULL, 'Sql', NULL, 3, NULL),
(29, 2, NULL, 'MYSQL', NULL, 3, NULL),
(30, 2, NULL, 'MongoDB', NULL, 3, NULL),
(31, 2, NULL, 'AngularJS', NULL, 3, NULL),
(32, 2, NULL, 'Visual', NULL, 3, NULL),
(33, 2, NULL, 'C#', NULL, 3, NULL),
(34, 2, NULL, 'Bootstrap validation', NULL, 3, NULL),
(35, 2, NULL, 'Static Tables', NULL, 5, NULL),
(36, 2, NULL, 'Data Tables', NULL, 5, NULL),
(37, 2, NULL, 'Foo Tables', NULL, 5, NULL),
(38, 2, NULL, 'JgGrid', NULL, 5, NULL),
(39, 2, NULL, 'Poducts grid', NULL, 6, NULL),
(40, 2, NULL, 'Products list', NULL, 6, NULL),
(41, 2, NULL, 'Product edit', NULL, 6, NULL),
(42, 2, NULL, 'Product detail', NULL, 6, NULL),
(43, 2, NULL, 'Cart', NULL, 6, NULL),
(44, 2, NULL, 'Orders', NULL, 6, NULL),
(45, 2, NULL, 'Credit Card form', NULL, 6, NULL),
(46, 3, NULL, 'Dato1', NULL, 16, NULL),
(47, 3, 'SI', 'Dato2', 'fa fa-th-large', 16, NULL),
(48, 3, NULL, 'Dato3', NULL, 16, NULL),
(49, 4, NULL, 'Elemento1', NULL, 47, NULL),
(50, 4, NULL, 'Elemento2', NULL, 47, NULL),
(51, 4, NULL, 'Elemento3', NULL, 47, NULL),
(52, 4, 'SI', 'Elemento4', 'fa fa-th-large', 47, NULL),
(53, 4, NULL, 'Elemento5', NULL, 47, NULL),
(54, 5, NULL, 'Otro1', NULL, 52, NULL),
(55, 5, NULL, 'Otro2', NULL, 52, NULL),
(56, 5, NULL, 'Otro3', NULL, 52, NULL),
(57, 2, NULL, 'Modificar', NULL, 13, 'Usuarios'),
(58, 2, NULL, 'Registrar', NULL, 13, 'RegistrarUsuarios'),
(59, 2, NULL, 'Permisos', NULL, 13, 'Permisos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rel_menu_usuarios`
--

CREATE TABLE IF NOT EXISTS `rel_menu_usuarios` (
  `id_elemento_menu` int(10) unsigned NOT NULL,
  `id_rol` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rel_menu_usuarios`
--

INSERT INTO `rel_menu_usuarios` (`id_elemento_menu`, `id_rol`) VALUES
(1, 1),
(13, 1),
(57, 1),
(58, 1),
(59, 1),
(14, 1),
(15, 1),
(16, 1),
(46, 1),
(47, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(54, 1),
(55, 1),
(56, 1),
(53, 1),
(48, 1),
(17, 1),
(18, 1),
(19, 1),
(23, 1),
(24, 1),
(20, 1),
(21, 1),
(22, 1),
(2, 1),
(3, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(4, 1),
(5, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(6, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(1, 2),
(13, 2),
(57, 2),
(17, 2),
(18, 2),
(20, 2),
(21, 2),
(22, 2),
(1, 3),
(14, 3),
(4, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
`id_rol` int(10) unsigned NOT NULL,
  `descripcion` varchar(45) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `descripcion`) VALUES
(1, 'SuperUsuario'),
(2, 'Administrador'),
(3, 'Cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_menu`
--

CREATE TABLE IF NOT EXISTS `tipo_menu` (
`id_tipo_menu` int(11) unsigned NOT NULL,
  `tipo` varchar(45) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `tipo_menu`
--

INSERT INTO `tipo_menu` (`id_tipo_menu`, `tipo`) VALUES
(1, 'Primer Nivel'),
(2, 'Segundo Nivel'),
(3, 'Tercer Nivel'),
(4, 'Cuarto Nivel'),
(5, 'Quinto Nivel');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
`id_usuario` int(10) unsigned NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellidos` varchar(45) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(45) NOT NULL,
  `fecha_registro` datetime DEFAULT NULL,
  `fecha_actualizacion` datetime DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  `foto` varchar(300) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=314 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellidos`, `email`, `password`, `fecha_registro`, `fecha_actualizacion`, `estado`, `foto`) VALUES
(1, 'root', 'root', 'super_usuario@outlook.com', 'superRoot', '2017-07-02 00:00:01', '2017-08-03 17:41:29', '1', 'default_avatar.png'),
(2, 'Luis', 'Mora', 'luis_mora@hotmail.com', '123452', '2017-07-02 00:00:02', '2017-07-19 11:54:20', '1', 'default_avatar.png'),
(3, 'Erick', 'Torres', 'eric_torres@hotmail.com', '12345', '2017-07-02 00:00:03', '2017-07-19 11:26:50', '1', 'default_avatar.png'),
(4, 'Juan', 'Luna', 'juan_luna@hotmail.com', '12345', '2017-07-02 00:00:04', NULL, '1', 'default_avatar.png'),
(5, 'Luis', 'Molina', 'luisame@outlook.com', '12345', '2017-07-02 00:00:05', '2017-07-17 12:33:19', '0', 'default_avatar.png'),
(6, 'Raúl', 'Fernandez', 'raul@hotmail.com', '12345', '2017-07-02 00:00:06', NULL, '1', 'default_avatar.png'),
(7, 'Ana', 'García', 'ana@hotmail.com', '12345', '2017-07-02 00:00:07', NULL, '1', 'default_avatar.png'),
(8, 'Luz', 'Moreno', 'luz@hotmail.com', '12345', '2017-07-02 00:00:08', '2017-07-31 16:08:30', '1', 'default_avatar.png'),
(9, 'Roberto', 'Huerta', 'roberto@hotmail.com', '12345', '2017-07-02 00:00:09', NULL, '1', 'default_avatar.png'),
(10, 'Veronica', 'Herrera', 'vero@hotmail.com', '12345', '2017-07-02 00:00:10', NULL, '1', 'default_avatar.png'),
(11, 'Joaquin', 'Sanchez', 'joaquin@hotmail.com', '12345', '2017-07-02 00:00:11', NULL, '1', 'default_avatar.png'),
(12, 'Angel', 'López', 'angel@hotmail.com', '12345', '2017-07-02 00:00:12', NULL, '1', 'default_avatar.png'),
(13, 'Marco', 'Suarez', 'marco@hotmail.com', '12345', '2017-07-19 13:37:39', NULL, '0', 'default_avatar.png'),
(14, 'Hugo', 'Camo', 'hugo@hotmail.com', '12345', '2017-07-19 13:51:31', NULL, '1', 'default_avatar.png'),
(16, 'Alberto', 'Garcia', 'alberto@hotmail.com', '12345', '2017-07-19 14:03:21', '2017-07-19 14:08:11', '1', 'default_avatar.png'),
(17, 'Benito', 'Moreno', 'benito@hotmail.com', '12345', '2017-07-19 14:05:53', '2017-07-19 14:09:04', '0', 'default_avatar.png'),
(18, 'Carmen', 'Rincon', 'carmen@hotmail.com', '12345', '2017-07-19 14:06:18', '2017-07-24 17:39:54', '1', 'default_avatar.png'),
(19, 'Angelica', 'Hernandez', 'angelica@hotmail.com', '12345', '2017-07-19 14:10:42', '2017-07-24 17:33:47', '1', 'default_avatar.png'),
(20, 'Daniel', 'Aguilar', 'dani@hotmail.com', '12345', '2017-07-26 12:40:13', '2017-08-04 17:03:36', '1', 'TLxPd3CmOxcHNSAjEcMNqEMlsc4ON5nfEl0D5dagwJmiM3rKs8.png'),
(309, 'Luis', 'Luis', 'luis23@hotmail.com', '12345', '2017-08-02 16:55:11', '2017-08-04 17:05:52', '1', 'default_avatar.png'),
(310, 'Luis666', 'Molina666', 'luis666@hotmail.com', '12345666', '2017-08-02 16:57:44', '2017-08-04 17:04:53', '1', 'tuQkxjAEyDDqxReRhIfKdGjgXwUHAHXsU7L6EWCvxIQTZTNEOc.png'),
(311, 'rrrr', 'Rirr', 'rrrrrr@hotamail.com', '12345', '2017-08-04 17:08:16', NULL, '1', '14r1gymLJbjOHbdoLuQd3mnYbqy2nSNzTOcg6CS2quEhGum56AnxYpwW6vC4zsbAI5sPWTzXdW80Ph8C.jpeg'),
(312, 'eee', 'eee', 'eeee@hotmail.com', '12345', '2017-08-04 17:13:35', NULL, '1', 'RviDk1fb9PuuKeA37bXRJHGlloTzqyZ4rxp25SfVijsOYPXWEWB9ugzzCulKpWTJg4P8tG9a9lUYB7Qb.png'),
(313, 'ddd', 'ddd', 'dddd@hotmail.com', '12345', '2017-08-04 17:14:43', '2017-08-04 17:16:13', '1', 'default_avatar.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_roles`
--

CREATE TABLE IF NOT EXISTS `usuarios_roles` (
  `id_usuario` int(10) unsigned NOT NULL,
  `id_rol` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios_roles`
--

INSERT INTO `usuarios_roles` (`id_usuario`, `id_rol`) VALUES
(2, 2),
(3, 2),
(4, 2),
(5, 2),
(6, 3),
(7, 3),
(8, 2),
(9, 3),
(10, 3),
(11, 3),
(12, 3),
(13, 2),
(14, 3),
(16, 3),
(17, 3),
(18, 2),
(19, 2),
(20, 3),
(1, 1),
(309, 3),
(310, 2),
(311, 3),
(312, 2),
(313, 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `menus`
--
ALTER TABLE `menus`
 ADD PRIMARY KEY (`id_elemento_menu`);

--
-- Indices de la tabla `rel_menu_usuarios`
--
ALTER TABLE `rel_menu_usuarios`
 ADD KEY `fk_rel_menu_usuarios_menus1_idx` (`id_elemento_menu`), ADD KEY `fk_rel_menu_usuarios_roles1_idx` (`id_rol`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
 ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `tipo_menu`
--
ALTER TABLE `tipo_menu`
 ADD PRIMARY KEY (`id_tipo_menu`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
 ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `usuarios_roles`
--
ALTER TABLE `usuarios_roles`
 ADD KEY `fk_usuarios_roles_roles_idx` (`id_rol`), ADD KEY `fk_usuarios_roles_usuarios1_idx` (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `menus`
--
ALTER TABLE `menus`
MODIFY `id_elemento_menu` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
MODIFY `id_rol` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tipo_menu`
--
ALTER TABLE `tipo_menu`
MODIFY `id_tipo_menu` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
MODIFY `id_usuario` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=314;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `rel_menu_usuarios`
--
ALTER TABLE `rel_menu_usuarios`
ADD CONSTRAINT `fk_rel_menu_usuarios_menus` FOREIGN KEY (`id_elemento_menu`) REFERENCES `menus` (`id_elemento_menu`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_rel_menu_usuarios_roles` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuarios_roles`
--
ALTER TABLE `usuarios_roles`
ADD CONSTRAINT `fk_usuarios_roles_roles` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_usuarios_roles_usuarios1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
