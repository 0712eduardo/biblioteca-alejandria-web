-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-01-2026 a las 23:06:41
-- Versión del servidor: 8.0.39
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `biblioteca`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `agregar_lector` (IN `p_nom` VARCHAR(100), IN `p_dir` VARCHAR(200), IN `p_tel` VARCHAR(30), IN `p_con` VARCHAR(10))   BEGIN
    INSERT INTO lectores (nom_lector, direccion, telefono, condicion)
    VALUES (p_nom, p_dir, p_tel, p_con);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `agregar_libro` (IN `p_titulo` VARCHAR(200), IN `p_autor` VARCHAR(200), IN `p_portada` VARCHAR(255), IN `p_anio` INT, IN `p_id_categoria` INT, IN `p_stock_total` INT, IN `p_stock_disponible` INT, IN `p_condicion` VARCHAR(20))   BEGIN
  INSERT INTO libro (titulo, autor, portada, anio, id_categoria, stock_total, stock_disponible, condicion)
  VALUES (p_titulo, p_autor, p_portada, p_anio, p_id_categoria, p_stock_total, p_stock_disponible, p_condicion);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `agregar_perfil` (IN `p_nombre_perfil` VARCHAR(50), IN `p_estado` CHAR(1))   BEGIN
  INSERT INTO perfil (nombre_perfil, estado)
  VALUES (p_nombre_perfil, p_estado);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `agregar_prestamo` (IN `p_id_libro` INT, IN `p_id_lector` INT, IN `p_fechaP` DATE, IN `p_fechaD` DATE, IN `p_cantidad` INT, IN `p_condicion` VARCHAR(15))   BEGIN
  DECLARE v_stock_actual INT;
  DECLARE v_id_prestamo INT;
  DECLARE v_msg VARCHAR(255);


  SELECT stock_disponible INTO v_stock_actual
  FROM libro
  WHERE id_libro = p_id_libro
  LIMIT 1;

  IF v_stock_actual IS NULL THEN
    SIGNAL SQLSTATE '45000'
    SET MESSAGE_TEXT = 'Error: Libro no encontrado';
  END IF;

  IF v_stock_actual < p_cantidad THEN
    SET v_msg = CONCAT('Error: Stock insuficiente. Disponible: ', v_stock_actual);
    SIGNAL SQLSTATE '45000'
    SET MESSAGE_TEXT = v_msg;
  END IF;


  INSERT INTO prestamo (id_libro, id_lector, fechaPrestamo, fechaDevolucion, cantidad, condicion)
  VALUES (p_id_libro, p_id_lector, p_fechaP, p_fechaD, p_cantidad, p_condicion);

  SET v_id_prestamo = LAST_INSERT_ID();

 
  IF UPPER(p_condicion) = 'ACTIVO' THEN
    UPDATE libro
    SET stock_disponible = stock_disponible - p_cantidad
    WHERE id_libro = p_id_libro;
  END IF;


  INSERT INTO factura(id_prestamo, tipo, fecha, subtotal, igv, total, condicion)
  VALUES(v_id_prestamo, 'PRESTAMO', CURDATE(), 0, 0, 0, 'HABILITADO');

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `agregar_usuario` (IN `p_nombre` VARCHAR(200), IN `p_usuario` VARCHAR(100), IN `p_pass` VARCHAR(255), IN `p_id_perfil` INT, IN `p_estado` CHAR(1))   BEGIN
  INSERT INTO usuario (nombre, usuario, pass, id_perfil, estado)
  VALUES (p_nombre, p_usuario, p_pass, p_id_perfil, p_estado);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `consultar_lector_por_id` (IN `p_id` INT)   BEGIN
    SELECT id_lector, nom_lector, direccion, telefono, condicion
    FROM lectores
    WHERE id_lector = p_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `consultar_usuario_por_id` (IN `p_id` INT)   BEGIN
  SELECT id_usuario, nombre, usuario, pass, id_perfil, estado
  FROM usuario
  WHERE id_usuario = p_id
  LIMIT 1;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `editar_lector` (IN `p_nom` VARCHAR(100), IN `p_dir` VARCHAR(200), IN `p_tel` VARCHAR(30), IN `p_id` INT, IN `p_con` VARCHAR(10))   BEGIN
    UPDATE lectores
    SET nom_lector = p_nom,
        direccion   = p_dir,
        telefono    = p_tel,
        condicion   = p_con
    WHERE id_lector = p_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `editar_libro` (IN `p_id_libro` INT, IN `p_titulo` VARCHAR(200), IN `p_autor` VARCHAR(200), IN `p_portada` VARCHAR(255), IN `p_anio` INT, IN `p_id_categoria` INT, IN `p_stock_total` INT, IN `p_stock_disponible` INT, IN `p_condicion` VARCHAR(20))   BEGIN
  UPDATE libro
  SET 
    titulo = p_titulo,
    autor = p_autor,
    portada = IF(p_portada = '' OR p_portada IS NULL, portada, p_portada),
    anio = p_anio,
    id_categoria = p_id_categoria,
    stock_total = p_stock_total,
    stock_disponible = p_stock_disponible,
    condicion = p_condicion
  WHERE id_libro = p_id_libro;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `editar_perfil` (IN `p_id_perfil` INT, IN `p_nombre_perfil` VARCHAR(50), IN `p_estado` CHAR(1))   BEGIN
  UPDATE perfil
  SET nombre_perfil = p_nombre_perfil,
      estado = p_estado
  WHERE id_perfil = p_id_perfil;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `editar_prestamo` (IN `p_id` INT, IN `p_id_libro_new` INT, IN `p_id_lector` INT, IN `p_fechaP` DATE, IN `p_fechaD` DATE, IN `p_cantidad_new` INT, IN `p_condicion_new` VARCHAR(15))   BEGIN
  DECLARE v_id_libro_old INT;
  DECLARE v_cantidad_old INT;
  DECLARE v_condicion_old VARCHAR(15);
  DECLARE v_stock_new INT;
  DECLARE v_delta INT;
  DECLARE v_msg VARCHAR(255);


  SELECT id_libro, cantidad, condicion
    INTO v_id_libro_old, v_cantidad_old, v_condicion_old
  FROM prestamo
  WHERE idprestamo = p_id
  LIMIT 1;

  IF v_id_libro_old IS NULL THEN
    SET v_msg = 'Préstamo no encontrado';
    SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = v_msg;
  END IF;

  IF v_id_libro_old = p_id_libro_new THEN
    SET v_delta = p_cantidad_new - v_cantidad_old;

    IF v_condicion_old = p_condicion_new THEN
      IF p_condicion_new = 'ACTIVO' THEN
        IF v_delta > 0 THEN
          SELECT stock_disponible INTO v_stock_new FROM libro WHERE id_libro = p_id_libro_new LIMIT 1;
          IF v_stock_new IS NULL THEN
            SET v_msg = 'Libro no encontrado';
            SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = v_msg;
          END IF;
          IF v_stock_new < v_delta THEN
            SET v_msg = CONCAT('Stock insuficiente. Disponible: ', v_stock_new);
            SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = v_msg;
          END IF;
          UPDATE libro SET stock_disponible = stock_disponible - v_delta WHERE id_libro = p_id_libro_new;
        ELSEIF v_delta < 0 THEN
          UPDATE libro SET stock_disponible = stock_disponible + ABS(v_delta) WHERE id_libro = p_id_libro_new;
        END IF;
      END IF;

    ELSE
      IF v_condicion_old = 'ACTIVO' AND p_condicion_new = 'INACTIVO' THEN
        UPDATE libro SET stock_disponible = stock_disponible + v_cantidad_old WHERE id_libro = v_id_libro_old;
      ELSEIF v_condicion_old = 'INACTIVO' AND p_condicion_new = 'ACTIVO' THEN
        SELECT stock_disponible INTO v_stock_new FROM libro WHERE id_libro = p_id_libro_new LIMIT 1;
        IF v_stock_new IS NULL THEN
          SET v_msg = 'Libro destino no encontrado';
          SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = v_msg;
        END IF;
        IF v_stock_new < p_cantidad_new THEN
          SET v_msg = CONCAT('Stock insuficiente. Disponible: ', v_stock_new);
          SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = v_msg;
        END IF;
        UPDATE libro SET stock_disponible = stock_disponible - p_cantidad_new WHERE id_libro = p_id_libro_new;
      END IF;
    END IF;

  ELSE
    IF v_condicion_old = 'ACTIVO' THEN
      UPDATE libro SET stock_disponible = stock_disponible + v_cantidad_old WHERE id_libro = v_id_libro_old;
    END IF;

    IF p_condicion_new = 'ACTIVO' THEN
      SELECT stock_disponible INTO v_stock_new FROM libro WHERE id_libro = p_id_libro_new LIMIT 1;
      IF v_stock_new IS NULL THEN
        SET v_msg = 'Libro destino no encontrado';
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = v_msg;
      END IF;
      IF v_stock_new < p_cantidad_new THEN
        SET v_msg = CONCAT('Stock insuficiente en libro destino. Disponible: ', v_stock_new);
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = v_msg;
      END IF;
      UPDATE libro SET stock_disponible = stock_disponible - p_cantidad_new WHERE id_libro = p_id_libro_new;
    END IF;
  END IF;

  UPDATE prestamo
  SET id_libro = p_id_libro_new,
      id_lector = p_id_lector,
      fechaPrestamo = p_fechaP,
      fechaDevolucion = p_fechaD,
      cantidad = p_cantidad_new,
      condicion = p_condicion_new
  WHERE idprestamo = p_id;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `editar_usuario` (IN `p_id` INT, IN `p_nombre` VARCHAR(200), IN `p_usuario` VARCHAR(100), IN `p_pass` VARCHAR(255), IN `p_id_perfil` INT, IN `p_estado` CHAR(1))   BEGIN
  DECLARE v_pass_actual VARCHAR(255);

 
  SELECT pass INTO v_pass_actual FROM usuario WHERE id_usuario = p_id;

  IF p_pass = '' THEN
    SET p_pass = v_pass_actual;
  END IF;

  UPDATE usuario
  SET nombre = p_nombre,
      usuario = p_usuario,
      pass = p_pass,
      id_perfil = p_id_perfil,
      estado = p_estado
  WHERE id_usuario = p_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `eliminar_lector` (IN `p_id` INT, IN `p_con` VARCHAR(10))   BEGIN
    UPDATE lectores
    SET condicion = p_con
    WHERE id_lector = p_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `eliminar_libro` (IN `p_id_libro` INT, IN `p_condicion` VARCHAR(20))   BEGIN
  UPDATE libro
  SET condicion = p_condicion
  WHERE id_libro = p_id_libro;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `eliminar_perfil` (IN `p_id_perfil` INT)   BEGIN
  UPDATE perfil
  SET estado = 'I'
  WHERE id_perfil = p_id_perfil;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `eliminar_prestamo` (IN `p_id` INT, IN `p_condicion` VARCHAR(15))   eliminar: BEGIN
    DECLARE v_id_libro INT;
    DECLARE v_cantidad INT;
    DECLARE v_condicion_actual VARCHAR(15);


    SELECT id_libro, cantidad, condicion
    INTO v_id_libro, v_cantidad, v_condicion_actual
    FROM prestamo
    WHERE idprestamo = p_id;


    IF v_condicion_actual = 'INACTIVO' THEN
        UPDATE prestamo SET condicion = UPPER(p_condicion) WHERE idprestamo = p_id;
        SELECT 'OK' AS mensaje;
        LEAVE eliminar;
    END IF;


    IF UPPER(p_condicion) = 'INACTIVO' THEN
        UPDATE libro
        SET stock_disponible = stock_disponible + v_cantidad
        WHERE id_libro = v_id_libro;
    END IF;

 
    UPDATE prestamo
    SET condicion = UPPER(p_condicion)
    WHERE idprestamo = p_id;

    SELECT 'OK' AS mensaje;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `eliminar_usuario` (IN `p_id` INT, IN `p_estado` CHAR(1))   BEGIN
  UPDATE usuario
  SET estado = p_estado
  WHERE id_usuario = p_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `listar_autores_libros` ()   BEGIN
  SELECT DISTINCT autor 
  FROM libro 
  WHERE condicion = 'ACTIVO';
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `listar_libros` ()   BEGIN
  SELECT 
    l.id_libro,
    l.portada,
    l.titulo,
    l.autor,
    l.anio,
    l.id_categoria,
    c.nombre AS nombre_categoria,
    l.stock_total,
    l.stock_disponible,
    l.condicion
  FROM libro l
  LEFT JOIN categoria c ON l.id_categoria = c.idcategoria;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `listar_libros_por_autor` (IN `p_autor` VARCHAR(200))   BEGIN
  SELECT l.titulo, l.anio, c.nombre AS categoria, l.stock_disponible
  FROM libro l
  LEFT JOIN categoria c ON l.id_categoria = c.idcategoria
  WHERE l.autor = p_autor;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `listar_perfiles` ()   BEGIN
  SELECT id_perfil, nombre_perfil, estado
  FROM perfil;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `listar_prestamos` ()   BEGIN
    SELECT 
        p.idprestamo,
        l.titulo AS libro,
        lec.nom_lector AS lector,
        p.fechaPrestamo,
        p.fechaDevolucion,
        p.cantidad,
        p.condicion
    FROM prestamo p
    INNER JOIN libro l ON p.id_libro = l.id_libro
    INNER JOIN lectores lec ON p.id_lector = lec.id_lector
    ORDER BY p.idprestamo DESC;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `listar_usuarios` ()   BEGIN
  SELECT 
    u.id_usuario,
    u.nombre,
    u.usuario,
    u.id_perfil,
    p.nombre_perfil,
    u.estado
  FROM usuario u
  LEFT JOIN perfil p ON u.id_perfil = p.id_perfil
  ORDER BY u.id_usuario DESC;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `registrar_factura_prestamo` (IN `p_id_prestamo` INT, IN `p_tipo` VARCHAR(15), IN `p_subtotal` DECIMAL(10,2), IN `p_igv` DECIMAL(10,2), IN `p_total` DECIMAL(10,2))   BEGIN
  INSERT INTO factura(id_prestamo, tipo, fecha, subtotal, igv, total, condicion)
  VALUES(p_id_prestamo, p_tipo, CURDATE(), p_subtotal, p_igv, p_total, 'HABILITADO');
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_actualizarCategoria` (IN `p_id` INT, IN `p_nombre` VARCHAR(100), IN `p_descripcion` VARCHAR(255))   BEGIN
  UPDATE categoria
  SET nombre = p_nombre, descripcion = p_descripcion
  WHERE idcategoria = p_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_eliminarCategoria` (IN `p_id` INT)   BEGIN
  UPDATE categoria
  SET condicion = 'I'
  WHERE idcategoria = p_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insertarCategoria` (IN `p_nombre` VARCHAR(100), IN `p_descripcion` VARCHAR(255))   BEGIN
  INSERT INTO categoria (nombre, descripcion, condicion)
  VALUES (p_nombre, p_descripcion, 'A');
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_listarCategoria` ()   BEGIN
  SELECT idcategoria, nombre, descripcion, condicion
  FROM categoria
  ORDER BY idcategoria DESC;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `idcategoria` int NOT NULL,
  `nombre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `descripcion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `condicion` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idcategoria`, `nombre`, `descripcion`, `condicion`) VALUES
(1, 'Literatura', 'Novelas y cuentos', 'A'),
(2, 'Ciencia', 'Libros científicos', 'A'),
(3, 'Tecnología', 'Informática y sistemas', 'A'),
(4, 'Historia', 'Eventos históricos', 'A'),
(5, 'Infantil', 'Libros para niños', 'A'),
(6, 'Educación', 'Material educativo', 'A'),
(7, 'Autoayuda', 'Desarrollo personal', 'A'),
(8, 'Arte', 'Música y pintura', 'A'),
(9, 'Filosofía', 'Reflexión y pensamiento', 'A'),
(10, 'Matemáticas', 'Álgebra y cálculo', 'A'),
(11, 'Administración', 'Gestión y negocios', 'A'),
(12, 'Salud', 'Medicina y bienestar', 'A'),
(13, 'Idioma Inglés', 'Aprendizaje del idioma', 'A'),
(14, 'Psicología', 'Conducta humana', 'A'),
(15, 'Derecho', 'Leyes y normas', 'A'),
(16, 'Religión', 'Estudios teológicos', 'A'),
(17, 'Medio Ambiente', 'Naturaleza y ecología', 'A'),
(18, 'Economía', 'Finanzas y mercados', 'A'),
(19, 'Ingeniería', 'Ciencias aplicadas', 'A'),
(20, 'Deportes', 'Actividad física y reglas', 'A'),
(23, 'CIENCIA', 'GVUTGVUTGUT', 'I');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `id_factura` int NOT NULL,
  `id_prestamo` int NOT NULL,
  `tipo` enum('PRESTAMO','MULTA') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fecha` date NOT NULL,
  `subtotal` decimal(10,2) DEFAULT '0.00',
  `igv` decimal(10,2) DEFAULT '0.00',
  `total` decimal(10,2) DEFAULT '0.00',
  `condicion` enum('HABILITADO','INHABILITADO') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'HABILITADO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`id_factura`, `id_prestamo`, `tipo`, `fecha`, `subtotal`, `igv`, `total`, `condicion`) VALUES
(1, 1, 'PRESTAMO', '2024-01-08', 0.00, 0.00, 0.00, 'HABILITADO'),
(2, 2, 'PRESTAMO', '2024-01-18', 0.00, 0.00, 0.00, 'HABILITADO'),
(3, 3, 'PRESTAMO', '2024-02-05', 0.00, 0.00, 0.00, 'HABILITADO'),
(4, 4, 'PRESTAMO', '2024-02-20', 0.00, 0.00, 0.00, 'HABILITADO'),
(5, 5, 'PRESTAMO', '2024-03-03', 0.00, 0.00, 0.00, 'HABILITADO'),
(6, 6, 'PRESTAMO', '2024-03-15', 0.00, 0.00, 0.00, 'HABILITADO'),
(7, 7, 'PRESTAMO', '2024-04-02', 0.00, 0.00, 0.00, 'HABILITADO'),
(8, 8, 'PRESTAMO', '2024-04-21', 0.00, 0.00, 0.00, 'HABILITADO'),
(9, 9, 'PRESTAMO', '2024-05-06', 0.00, 0.00, 0.00, 'HABILITADO'),
(10, 10, 'PRESTAMO', '2024-05-19', 0.00, 0.00, 0.00, 'HABILITADO'),
(11, 11, 'PRESTAMO', '2024-06-04', 0.00, 0.00, 0.00, 'HABILITADO'),
(12, 12, 'PRESTAMO', '2024-06-26', 0.00, 0.00, 0.00, 'HABILITADO'),
(13, 13, 'PRESTAMO', '2024-07-07', 0.00, 0.00, 0.00, 'HABILITADO'),
(14, 14, 'PRESTAMO', '2024-07-29', 0.00, 0.00, 0.00, 'HABILITADO'),
(15, 15, 'PRESTAMO', '2024-08-03', 0.00, 0.00, 0.00, 'HABILITADO'),
(16, 16, 'PRESTAMO', '2024-08-22', 0.00, 0.00, 0.00, 'HABILITADO'),
(17, 17, 'PRESTAMO', '2024-09-11', 0.00, 0.00, 0.00, 'HABILITADO'),
(18, 18, 'PRESTAMO', '2024-09-27', 0.00, 0.00, 0.00, 'HABILITADO'),
(19, 19, 'PRESTAMO', '2024-10-08', 0.00, 0.00, 0.00, 'HABILITADO'),
(20, 20, 'PRESTAMO', '2024-10-23', 0.00, 0.00, 0.00, 'HABILITADO'),
(21, 21, 'PRESTAMO', '2024-11-06', 0.00, 0.00, 0.00, 'HABILITADO'),
(22, 22, 'PRESTAMO', '2024-11-17', 0.00, 0.00, 0.00, 'HABILITADO'),
(23, 23, 'PRESTAMO', '2024-12-03', 0.00, 0.00, 0.00, 'HABILITADO'),
(24, 24, 'PRESTAMO', '2024-12-19', 0.00, 0.00, 0.00, 'HABILITADO'),
(25, 25, 'PRESTAMO', '2025-01-09', 0.00, 0.00, 0.00, 'HABILITADO'),
(26, 26, 'PRESTAMO', '2025-01-27', 0.00, 0.00, 0.00, 'HABILITADO'),
(27, 27, 'PRESTAMO', '2025-02-08', 0.00, 0.00, 0.00, 'HABILITADO'),
(28, 28, 'PRESTAMO', '2025-02-24', 0.00, 0.00, 0.00, 'HABILITADO'),
(29, 29, 'PRESTAMO', '2025-03-12', 0.00, 0.00, 0.00, 'HABILITADO'),
(30, 30, 'PRESTAMO', '2025-03-29', 0.00, 0.00, 0.00, 'HABILITADO'),
(31, 31, 'PRESTAMO', '2025-04-14', 0.00, 0.00, 0.00, 'HABILITADO'),
(32, 32, 'PRESTAMO', '2025-04-28', 0.00, 0.00, 0.00, 'HABILITADO'),
(33, 33, 'PRESTAMO', '2025-05-09', 0.00, 0.00, 0.00, 'HABILITADO'),
(34, 34, 'PRESTAMO', '2025-05-25', 0.00, 0.00, 0.00, 'HABILITADO'),
(35, 35, 'PRESTAMO', '2025-06-10', 0.00, 0.00, 0.00, 'HABILITADO'),
(36, 36, 'PRESTAMO', '2025-06-29', 0.00, 0.00, 0.00, 'HABILITADO'),
(37, 37, 'PRESTAMO', '2025-07-05', 0.00, 0.00, 0.00, 'HABILITADO'),
(38, 38, 'PRESTAMO', '2025-07-18', 0.00, 0.00, 0.00, 'HABILITADO'),
(39, 39, 'PRESTAMO', '2025-08-02', 0.00, 0.00, 0.00, 'HABILITADO'),
(40, 40, 'PRESTAMO', '2025-08-23', 0.00, 0.00, 0.00, 'HABILITADO'),
(41, 41, 'PRESTAMO', '2025-09-11', 0.00, 0.00, 0.00, 'HABILITADO'),
(42, 42, 'PRESTAMO', '2025-09-28', 0.00, 0.00, 0.00, 'HABILITADO'),
(43, 43, 'PRESTAMO', '2025-10-04', 0.00, 0.00, 0.00, 'HABILITADO'),
(44, 44, 'PRESTAMO', '2025-10-22', 0.00, 0.00, 0.00, 'HABILITADO'),
(45, 45, 'PRESTAMO', '2025-11-03', 0.00, 0.00, 0.00, 'HABILITADO'),
(46, 46, 'PRESTAMO', '2025-11-15', 0.00, 0.00, 0.00, 'HABILITADO'),
(47, 47, 'PRESTAMO', '2025-11-27', 0.00, 0.00, 0.00, 'HABILITADO'),
(48, 48, 'PRESTAMO', '2025-11-29', 0.00, 0.00, 0.00, 'HABILITADO'),
(49, 49, 'PRESTAMO', '2025-11-30', 0.00, 0.00, 0.00, 'HABILITADO'),
(50, 50, 'PRESTAMO', '2025-11-30', 0.00, 0.00, 0.00, 'HABILITADO'),
(51, 52, 'PRESTAMO', '2025-11-16', 0.00, 0.00, 0.00, 'HABILITADO'),
(52, 53, 'PRESTAMO', '2025-11-25', 0.00, 0.00, 0.00, 'HABILITADO'),
(53, 54, 'PRESTAMO', '2025-11-25', 0.00, 0.00, 0.00, 'HABILITADO'),
(54, 55, 'PRESTAMO', '2025-11-25', 0.00, 0.00, 0.00, 'HABILITADO'),
(55, 57, 'PRESTAMO', '2025-11-25', 0.00, 0.00, 0.00, 'HABILITADO'),
(56, 59, 'PRESTAMO', '2025-11-25', 20.00, 3.60, 23.60, 'HABILITADO'),
(57, 60, 'PRESTAMO', '2025-11-30', 0.00, 0.00, 0.00, 'HABILITADO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lectores`
--

CREATE TABLE `lectores` (
  `id_lector` int NOT NULL,
  `nom_lector` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `direccion` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `telefono` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `condicion` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'ACTIVO',
  `fecha_registro` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `lectores`
--

INSERT INTO `lectores` (`id_lector`, `nom_lector`, `direccion`, `telefono`, `condicion`, `fecha_registro`) VALUES
(1, 'BRYAN MENDOZA', 'AV. PERU 123', '987654322', 'ACTIVO', '2025-11-17 02:12:27'),
(2, 'ANDREA SALAZAR', 'JR. LIMA 456', '912345678', 'ACTIVO', '2025-11-17 02:12:27'),
(3, 'Carlos Gómez', 'Av. Arequipa 890', '956789012', 'ACTIVO', '2025-11-17 02:12:27'),
(4, 'Lucía Torres', 'Mz C Lt 10', '934567890', 'ACTIVO', '2025-11-17 02:12:27'),
(5, 'Jorge Rivas', 'Calle Sol 245', '945612378', 'ACTIVO', '2025-11-17 02:12:27'),
(6, 'Rosa Castillo', 'Av. Grau 900', '923456789', 'ACTIVO', '2025-11-17 02:12:27'),
(7, 'Miguel Paredes', 'Jr. Progreso 112', '978123456', 'ACTIVO', '2025-11-17 02:12:27'),
(8, 'Diana Huamán', 'Calle Luna 301', '963258741', 'ACTIVO', '2025-11-17 02:12:27'),
(9, 'Luis Ramos', 'Av. Bolívar 521', '956147258', 'ACTIVO', '2025-11-17 02:12:27'),
(10, 'Fiorella Mendiola', 'Pasaje Río 77', '987321654', 'ACTIVO', '2025-11-17 02:12:27'),
(11, 'Kevin Salvatierra', 'Av. Brasil 340', '954789632', 'ACTIVO', '2025-11-17 02:12:27'),
(12, 'Mariela Quispe', 'Jr. Unión 122', '912876543', 'ACTIVO', '2025-11-17 02:12:27'),
(13, 'Alonso Gamarra', 'Calle Norte 45', '934125768', 'ACTIVO', '2025-11-17 02:12:27'),
(14, 'Sofía Chávez', 'Av. Colonial 900', '987654120', 'ACTIVO', '2025-11-17 02:12:27'),
(15, 'Marco Aliaga', 'Mz D Lt 18', '923451789', 'ACTIVO', '2025-11-17 02:12:27'),
(16, 'Yuliana Díaz', 'Calle Sur 77', '965478123', 'ACTIVO', '2025-11-17 02:12:27'),
(17, 'José Palomino', 'Av. Puno 210', '954216789', 'ACTIVO', '2025-11-17 02:12:27'),
(18, 'Daniela Lazo', 'Jr. Callao 550', '978452316', 'ACTIVO', '2025-11-17 02:12:27'),
(19, 'Renzo Morales', 'Av. Cusco 513', '945789632', 'ACTIVO', '2025-11-17 02:12:27'),
(20, 'Claudia Soto', 'Calle Real 98', '987213645', 'ACTIVO', '2025-11-17 02:12:27'),
(21, 'Eduardo Salinas', 'Jr. Pisac 77', '956324178', 'ACTIVO', '2025-11-17 02:12:27'),
(22, 'Mariana Ríos', 'Av. Tingo 100', '912345980', 'ACTIVO', '2025-11-17 02:12:27'),
(23, 'Pedro Cabello', 'Pasaje Uno 33', '934215876', 'ACTIVO', '2025-11-17 02:12:27'),
(24, 'Fernanda García', 'Mz F Lt 20', '978963254', 'ACTIVO', '2025-11-17 02:12:27'),
(25, 'Samuel Zevallos', 'Av. Huaraz 444', '954789102', 'ACTIVO', '2025-11-17 02:12:27'),
(26, 'Jéssica Huerta', 'Calle Oro 55', '923874561', 'ACTIVO', '2025-11-17 02:12:27'),
(27, 'Héctor López', 'Av. Piura 600', '987159753', 'ACTIVO', '2025-11-17 02:12:27'),
(28, 'Karla Ochoa', 'Jr. Lima 289', '945632178', 'ACTIVO', '2025-11-17 02:12:27'),
(29, 'Cristian Ramos', 'Calle Paz 15', '963741258', 'ACTIVO', '2025-11-17 02:12:27'),
(30, 'Valeria Silva', 'Av. Sol 501', '934872615', 'ACTIVO', '2025-11-17 02:12:27'),
(31, 'Ximena Flores', 'Jr. Azul 709', '978214365', 'ACTIVO', '2025-11-17 02:12:27'),
(32, 'Ignacio Torres', 'Av. Norte 900', '954789654', 'ACTIVO', '2025-11-17 02:12:27'),
(33, 'Nicolás Vega', 'Calle Uno 14', '923456710', 'ACTIVO', '2025-11-17 02:12:27'),
(34, 'Thiago Ríos', 'Av. El Bosque 88', '987456321', 'ACTIVO', '2025-11-17 02:12:27'),
(35, 'Alessandra Peña', 'Jr. Los Olivos 31', '956123987', 'ACTIVO', '2025-11-17 02:12:27'),
(36, 'Martín Castañeda', 'Calle Sol 122', '945741258', 'ACTIVO', '2025-11-17 02:12:27'),
(37, 'Julieta Campos', 'Av. Arica 77', '987963258', 'ACTIVO', '2025-11-17 02:12:27'),
(38, 'Sebastián Poma', 'Jr. San Juan 19', '934589621', 'ACTIVO', '2025-11-17 02:12:27'),
(39, 'Paola Villanueva', 'Calle Lima 65', '978741236', 'ACTIVO', '2025-11-17 02:12:27'),
(40, 'Gustavo Bravo', 'Av. Central 421', '954258369', 'ACTIVO', '2025-11-17 02:12:27'),
(41, 'Alejandra Núñez', 'Mz L Lt 05', '923654789', 'ACTIVO', '2025-11-17 02:12:27'),
(42, 'Ricardo Benavides', 'Calle Sur 88', '987852147', 'ACTIVO', '2025-11-17 02:12:27'),
(43, 'Luz Cárdenas', 'Jr. Piérola 321', '956987123', 'ACTIVO', '2025-11-17 02:12:27'),
(44, 'Mateo Gonzales', 'Av. Tarapacá 200', '945123698', 'ACTIVO', '2025-11-17 02:12:27'),
(45, 'Camila Vargas', 'Calle Uno 501', '963258147', 'ACTIVO', '2025-11-17 02:12:27'),
(46, 'Javier Paredes', 'Av. Grau 620', '978456123', 'ACTIVO', '2025-11-17 02:12:27'),
(47, 'Patricia Aguilar', 'Jr. Santa Rosa 11', '954321654', 'ACTIVO', '2025-11-17 02:12:27'),
(48, 'Rodrigo Cantú', 'Av. Miraflores 315', '987654987', 'ACTIVO', '2025-11-17 02:12:27'),
(49, 'Mónica Ibáñez', 'Calle Oro 92', '923741256', 'ACTIVO', '2025-11-17 02:12:27'),
(50, 'Diego Sánchez', 'Av. Primavera 101', '956874123', 'ACTIVO', '2025-11-17 02:12:27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro`
--

CREATE TABLE `libro` (
  `id_libro` int NOT NULL,
  `titulo` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `autor` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `portada` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `anio` int NOT NULL,
  `id_categoria` int DEFAULT NULL,
  `condicion` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `stock_total` int DEFAULT '0',
  `stock_disponible` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `libro`
--

INSERT INTO `libro` (`id_libro`, `titulo`, `autor`, `portada`, `anio`, `id_categoria`, `condicion`, `stock_total`, `stock_disponible`) VALUES
(1, 'CIEN AÑOS DE SOLEDAD', 'GABRIEL GARCÍA MÁRQUEZ', '1763349222_descarga - 2025-11-16T221334.845.jpg', 1967, 1, 'ACTIVO', 10, 5),
(2, 'DON QUIJOTE DE LA MANCHA', 'MIGUEL DE CERVANTES', '1763347364_122858226.jpg', 1605, 1, 'ACTIVO', 8, 4),
(3, 'EL PRINCIPITO', 'ANTOINE DE SAINT-EXUPÉRY', '1763347379_71AVK5VIAzL._AC_UF1000,1000_QL80_.jpg', 1943, 1, 'ACTIVO', 12, 12),
(5, 'COSMOS', 'CARL SAGAN', '1763347412_descarga - 2025-11-16T214323.842.jpg', 1980, 2, 'ACTIVO', 9, 8),
(6, 'CÓDIGO LIMPIO', 'ROBERT C. MARTIN', '1763349315_descarga - 2025-11-16T214401.971.jpg', 2008, 3, 'ACTIVO', 6, 6),
(7, 'INTRODUCCIÓN A LA PROGRAMACIÓN', 'PAUL DEITEL', '1763349338_descarga - 2025-11-16T214454.187.jpg', 2015, 3, 'ACTIVO', 10, 10),
(8, 'ESTRUCTURAS DE DATOS EN JAVA', 'NARASIMHA KARUMANCHI', '1763347560_descarga - 2025-11-16T214551.299.jpg', 2017, 3, 'ACTIVO', 6, 6),
(9, 'HISTORIA DEL PERÚ', 'CARLOS CONTRERAS', '1763349359_descarga - 2025-11-16T214621.438.jpg', 2017, 4, 'ACTIVO', 8, 8),
(10, 'SAPIENS', 'YUVAL NOAH HARARI', '1763347630_descarga - 2025-11-16T214657.155.jpg', 2011, 4, 'ACTIVO', 10, 10),
(11, 'EL GATO ENSOMBRERADO', 'DR. SEUSS', '1763347664_descarga - 2025-11-16T214731.955.jpg', 1957, 5, 'ACTIVO', 6, 6),
(12, 'LA ORUGA MUY HAMBRIENTA', 'ERIC CARLE', '1763480855_descarga (7).jpg', 1969, 5, 'ACTIVO', 5, 5),
(13, 'DIDÁCTICA GENERAL', 'JEAN PIAGET', '1763349493_descarga - 2025-11-16T214858.628.jpg', 2001, 6, 'ACTIVO', 7, 7),
(14, 'TEORÍA DEL APRENDIZAJE', 'DAVID AUSUBEL', '1763349517_descarga - 2025-11-16T214945.605.jpg', 1976, 6, 'ACTIVO', 6, 6),
(16, 'PIENSE Y HÁGASE RICO', 'NAPOLEóN HILL', '1763347825_descarga - 2025-11-16T215013.654.jpg', 1937, 7, 'ACTIVO', 9, 9),
(17, 'HISTORIA DEL ARTE', 'E. H. GOMBRICH', '1763347893_descarga - 2025-11-16T215124.173.jpg', 1950, 8, 'ACTIVO', 6, 6),
(18, 'TEORíA MUSICAL MODERNA', 'ENRIC HERRERA', '1763348008_descarga - 2025-11-16T215316.803.jpg', 1980, 8, 'ACTIVO', 5, 5),
(19, 'LA REPÚBLICA', 'PLATÓN', '1763349589_descarga - 2025-11-16T215353.364.jpg', -380, 9, 'ACTIVO', 6, 6),
(20, 'MEDITACIONES', 'MARCO AURELIO', '1763348065_descarga - 2025-11-16T215417.113.jpg', 180, 9, 'ACTIVO', 7, 4),
(21, 'CÁLCULO', 'JAMES STEWART', '1763349627_descarga - 2025-11-16T215452.942.jpg', 2015, 10, 'ACTIVO', 10, 10),
(22, 'ÁLGEBRA LINEAL Y SUS APLICACIONES', 'DAVID LAY', '1763348196_descarga - 2025-11-16T215626.322.jpg', 2016, 10, 'ACTIVO', 8, 8),
(23, 'ADMINISTRACIÓN MODERNA', 'ROBBINS & COULTER', '1763348236_descarga - 2025-11-16T215707.684.jpg', 2016, 11, 'ACTIVO', 6, 6),
(24, 'FUNDAMENTOS DE MARKETING', 'PHILIP KOTLER', '1763348268_descarga - 2025-11-16T215739.045.jpg', 2014, 11, 'ACTIVO', 7, 7),
(25, 'ANATOMÍA HUMANA', 'HENRY GRAY', '1763348302_descarga - 2025-11-16T215812.116.jpg', 2015, 12, 'ACTIVO', 5, 5),
(26, 'NUTRICION Y DIETÉTICA', 'L. BROWN', '1763348351_descarga - 2025-11-16T215903.021.jpg', 2012, 12, 'ACTIVO', 7, 7),
(27, 'ENGLISH GRAMMAR IN USE', 'RAYMOND MURPHY', '1763348409_descarga - 2025-11-16T215928.451.jpg', 2019, 13, 'ACTIVO', 12, 12),
(28, 'VOCABULARY BUILDER', 'MERRIAM-WEBSTER', '1763348434_descarga - 2025-11-16T220025.875.jpg', 2010, 13, 'ACTIVO', 9, 9),
(29, 'PSICOLOGÍA GENERAL', 'DAVID MYERS', '1763348462_descarga - 2025-11-16T220056.002.jpg', 2014, 14, 'ACTIVO', 7, 7),
(30, 'EL CEREBRO Y LA CONDUCTA', 'KOLB & WHISHAW', '1763348512_descarga - 2025-11-16T220144.700.jpg', 2015, 14, 'ACTIVO', 5, 5),
(31, 'INTRODUCCIÓN AL DERECHO', 'NORBERTO BOBBIO', '1763348553_descarga - 2025-11-16T220215.861.jpg', 1990, 15, 'ACTIVO', 6, 6),
(32, 'CÓDIGO PENAL PERUANO', 'MINISTERIO DE JUSTICIA', '1763348616_descarga - 2025-11-16T220329.300.jpg', 2023, 15, 'ACTIVO', 12, 12),
(33, 'LA BIBLIA', 'DESCONOCIDO', '1763348641_descarga - 2025-11-16T220352.517.jpg', 100, 16, 'ACTIVO', 10, 10),
(34, 'EL CORÁN', 'MAHOMA', '1763348671_descarga - 2025-11-16T220422.890.jpg', 632, 16, 'ACTIVO', 8, 8),
(35, 'CALENTAMIENTO GLOBAL', 'GEORGE PHILANDER', '1763348727_descarga - 2025-11-16T220517.434.jpg', 2018, 17, 'ACTIVO', 7, 7),
(36, 'ECOLOGÍA MODERNA', 'MANUEL C. MOLLES', '1763348770_descarga - 2025-11-16T220555.242.jpg', 2015, 17, 'ACTIVO', 6, 6),
(37, 'ECONOMÍA PARA NO ECONOMISTAS', 'ALFRED MILL', '1763348870_descarga - 2025-11-16T220741.345.jpg', 2010, 18, 'ACTIVO', 7, 7),
(38, 'PADRE RICO, PADRE POBRE', 'ROBERT KIYOSAKI', '1763348899_descarga - 2025-11-16T220810.923.jpg', 1997, 18, 'ACTIVO', 10, 10),
(40, 'MECÁNICA DE MATERIALES', 'BEER & JOHNSTON', '1763348947_descarga - 2025-11-16T220847.568.jpg', 2015, 19, 'ACTIVO', 7, 7),
(41, 'REGLAMENTO OFICIAL DE FÚTBOL', 'FIFA', '1763348981_descarga - 2025-11-16T220932.460.jpg', 2023, 20, 'ACTIVO', 10, 10),
(42, 'ENTRENAMIENTO DEPORTIVO', 'BOMPA', '1763349022_descarga - 2025-11-16T221013.231.jpg', 2005, 20, 'ACTIVO', 6, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE `perfil` (
  `id_perfil` int NOT NULL,
  `nombre_perfil` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `estado` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`id_perfil`, `nombre_perfil`, `estado`) VALUES
(1, 'ADMINISTRADOR', 'A'),
(2, 'LECTOR', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamo`
--

CREATE TABLE `prestamo` (
  `idprestamo` int NOT NULL,
  `id_libro` int NOT NULL,
  `id_lector` int NOT NULL,
  `fechaPrestamo` date NOT NULL,
  `fechaDevolucion` date NOT NULL,
  `cantidad` int NOT NULL,
  `condicion` enum('ACTIVO','INACTIVO') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'ACTIVO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `prestamo`
--

INSERT INTO `prestamo` (`idprestamo`, `id_libro`, `id_lector`, `fechaPrestamo`, `fechaDevolucion`, `cantidad`, `condicion`) VALUES
(1, 1, 5, '2024-01-08', '2024-01-22', 1, 'ACTIVO'),
(2, 2, 12, '2024-01-18', '2024-02-02', 1, 'ACTIVO'),
(3, 3, 8, '2024-02-05', '2024-02-20', 1, 'ACTIVO'),
(4, 5, 20, '2024-02-18', '2024-03-03', 1, 'ACTIVO'),
(5, 6, 7, '2024-03-02', '2024-03-17', 1, 'ACTIVO'),
(6, 7, 14, '2024-03-15', '2024-03-30', 2, 'ACTIVO'),
(7, 8, 30, '2024-04-01', '2024-04-16', 1, 'ACTIVO'),
(8, 9, 1, '2024-04-12', '2024-04-27', 1, 'ACTIVO'),
(9, 10, 2, '2024-05-01', '2024-05-16', 1, 'ACTIVO'),
(10, 11, 33, '2024-05-18', '2024-06-02', 1, 'ACTIVO'),
(11, 12, 18, '2024-06-03', '2024-06-18', 1, 'ACTIVO'),
(12, 13, 25, '2024-06-22', '2024-07-07', 1, 'ACTIVO'),
(13, 14, 40, '2024-07-05', '2024-07-20', 1, 'ACTIVO'),
(14, 16, 3, '2024-07-18', '2024-08-02', 1, 'ACTIVO'),
(15, 17, 9, '2024-08-01', '2024-08-16', 1, 'ACTIVO'),
(16, 18, 10, '2024-08-15', '2024-08-30', 1, 'ACTIVO'),
(17, 19, 11, '2024-09-01', '2024-09-16', 2, 'ACTIVO'),
(18, 20, 13, '2024-09-15', '2024-09-30', 1, 'ACTIVO'),
(19, 21, 15, '2024-10-01', '2024-10-16', 1, 'ACTIVO'),
(20, 22, 22, '2024-10-15', '2024-10-30', 1, 'ACTIVO'),
(21, 23, 24, '2024-11-02', '2024-11-17', 1, 'ACTIVO'),
(22, 24, 29, '2024-11-12', '2024-11-27', 1, 'ACTIVO'),
(23, 25, 45, '2024-11-25', '2024-12-10', 1, 'ACTIVO'),
(24, 26, 31, '2024-12-01', '2024-12-16', 1, 'ACTIVO'),
(25, 27, 27, '2024-12-05', '2024-12-20', 2, 'ACTIVO'),
(26, 28, 35, '2024-12-10', '2024-12-25', 1, 'ACTIVO'),
(27, 29, 38, '2024-12-15', '2024-12-30', 1, 'ACTIVO'),
(28, 30, 41, '2024-12-18', '2025-01-02', 1, 'ACTIVO'),
(29, 31, 44, '2024-12-22', '2025-01-06', 1, 'ACTIVO'),
(30, 32, 50, '2024-12-28', '2025-01-12', 1, 'ACTIVO'),
(31, 1, 8, '2025-01-05', '2025-01-20', 1, 'ACTIVO'),
(32, 2, 12, '2025-01-15', '2025-01-30', 1, 'ACTIVO'),
(33, 3, 22, '2025-02-03', '2025-02-18', 1, 'ACTIVO'),
(34, 5, 10, '2025-02-12', '2025-02-27', 1, 'ACTIVO'),
(35, 6, 18, '2025-02-25', '2025-03-12', 1, 'ACTIVO'),
(36, 7, 5, '2025-03-03', '2025-03-18', 2, 'ACTIVO'),
(37, 8, 27, '2025-03-10', '2025-03-25', 1, 'ACTIVO'),
(38, 9, 32, '2025-04-01', '2025-04-16', 1, 'ACTIVO'),
(39, 10, 4, '2025-04-10', '2025-04-25', 1, 'ACTIVO'),
(40, 11, 2, '2025-04-22', '2025-05-07', 1, 'ACTIVO'),
(41, 12, 15, '2025-05-05', '2025-05-20', 1, 'ACTIVO'),
(42, 13, 37, '2025-05-15', '2025-05-30', 2, 'ACTIVO'),
(43, 14, 40, '2025-06-02', '2025-06-17', 1, 'ACTIVO'),
(44, 16, 42, '2025-06-10', '2025-06-25', 1, 'ACTIVO'),
(45, 17, 11, '2025-06-18', '2025-07-03', 1, 'ACTIVO'),
(46, 18, 33, '2025-07-05', '2025-07-20', 1, 'ACTIVO'),
(47, 19, 48, '2025-08-01', '2025-08-16', 1, 'ACTIVO'),
(48, 20, 25, '2025-09-10', '2025-09-25', 1, 'ACTIVO'),
(49, 21, 44, '2025-10-05', '2025-10-20', 2, 'ACTIVO'),
(50, 22, 19, '2025-11-02', '2025-11-17', 1, 'ACTIVO'),
(52, 2, 47, '2025-11-16', '2025-11-28', 2, 'ACTIVO'),
(53, 5, 24, '2025-11-25', '2025-11-30', 1, 'ACTIVO'),
(54, 1, 15, '2025-11-25', '2025-12-04', 4, 'ACTIVO'),
(55, 20, 5, '2025-11-11', '2025-12-07', 2, 'ACTIVO'),
(57, 20, 5, '2025-11-25', '2025-11-26', 1, 'ACTIVO'),
(59, 6, 1, '2025-11-03', '2025-11-20', 1, 'ACTIVO'),
(60, 2, 1, '2025-11-16', '2025-12-01', 2, 'ACTIVO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int NOT NULL,
  `nombre` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `usuario` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pass` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_perfil` int DEFAULT NULL,
  `estado` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `usuario`, `pass`, `id_perfil`, `estado`) VALUES
(2, 'YEFREY', 'cabro', '4d186321c1a7f0f354b297e8914ab240', 2, 'I'),
(3, 'ACHUI', 'achui', '6d5f4bf194187e91e5c83ca8f207b754', 1, 'A'),
(4, 'NICHO', 'bnicho', 'b8b4b727d6f5d1b61fff7be687f7970f', 1, 'A'),
(5, 'YEFREY MENDOZA', 'hola', '2c90685654aa42f61d086fb56e8fd3cd', 2, 'I'),
(6, 'EDUARDO DELGADO', 'edu', '2c90685654aa42f61d086fb56e8fd3cd', 1, 'A'),
(7, 'JOSE VEGA', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, 'A');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vlista_factura`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vlista_factura` (
`cantidad` int
,`condicion` enum('HABILITADO','INHABILITADO')
,`direccion` varchar(200)
,`fecha` date
,`id_factura` int
,`idprestamo` int
,`igv` decimal(10,2)
,`libro` varchar(100)
,`nom_cliente` varchar(100)
,`subtotal` decimal(10,2)
,`telefono` varchar(30)
,`tipo` enum('PRESTAMO','MULTA')
,`total` decimal(10,2)
);

-- --------------------------------------------------------

--
-- Estructura para la vista `vlista_factura`
--
DROP TABLE IF EXISTS `vlista_factura`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vlista_factura`  AS SELECT `f`.`id_factura` AS `id_factura`, `f`.`tipo` AS `tipo`, `f`.`fecha` AS `fecha`, `f`.`subtotal` AS `subtotal`, `f`.`igv` AS `igv`, `f`.`total` AS `total`, `f`.`condicion` AS `condicion`, `p`.`idprestamo` AS `idprestamo`, `l`.`nom_lector` AS `nom_cliente`, `l`.`direccion` AS `direccion`, `l`.`telefono` AS `telefono`, `lb`.`titulo` AS `libro`, `p`.`cantidad` AS `cantidad` FROM (((`factura` `f` join `prestamo` `p` on((`f`.`id_prestamo` = `p`.`idprestamo`))) join `lectores` `l` on((`p`.`id_lector` = `l`.`id_lector`))) join `libro` `lb` on((`p`.`id_libro` = `lb`.`id_libro`))) ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idcategoria`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`id_factura`),
  ADD KEY `id_prestamo` (`id_prestamo`);

--
-- Indices de la tabla `lectores`
--
ALTER TABLE `lectores`
  ADD PRIMARY KEY (`id_lector`);

--
-- Indices de la tabla `libro`
--
ALTER TABLE `libro`
  ADD PRIMARY KEY (`id_libro`),
  ADD KEY `fk_libro_categoria` (`id_categoria`);

--
-- Indices de la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`id_perfil`);

--
-- Indices de la tabla `prestamo`
--
ALTER TABLE `prestamo`
  ADD PRIMARY KEY (`idprestamo`),
  ADD KEY `id_libro` (`id_libro`),
  ADD KEY `id_lector` (`id_lector`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_perfil` (`id_perfil`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idcategoria` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `id_factura` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT de la tabla `lectores`
--
ALTER TABLE `lectores`
  MODIFY `id_lector` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `libro`
--
ALTER TABLE `libro`
  MODIFY `id_libro` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT de la tabla `perfil`
--
ALTER TABLE `perfil`
  MODIFY `id_perfil` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `prestamo`
--
ALTER TABLE `prestamo`
  MODIFY `idprestamo` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `factura_ibfk_1` FOREIGN KEY (`id_prestamo`) REFERENCES `prestamo` (`idprestamo`);

--
-- Filtros para la tabla `libro`
--
ALTER TABLE `libro`
  ADD CONSTRAINT `fk_libro_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`idcategoria`);

--
-- Filtros para la tabla `prestamo`
--
ALTER TABLE `prestamo`
  ADD CONSTRAINT `prestamo_ibfk_1` FOREIGN KEY (`id_libro`) REFERENCES `libro` (`id_libro`),
  ADD CONSTRAINT `prestamo_ibfk_2` FOREIGN KEY (`id_lector`) REFERENCES `lectores` (`id_lector`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_perfil`) REFERENCES `perfil` (`id_perfil`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
