-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-04-2017 a las 23:06:41
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: 'prensa'
--
CREATE DATABASE prensa CHARACTER SET utf8 COLLATE utf8_general_ci;
USE prensa;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla 'noticia'
--

CREATE TABLE IF NOT EXISTS noticia (
  idnoticia int(11) NOT NULL,
  titulonoticia varchar(120) NOT NULL,
  textonoticia text NOT NULL,
  imgnoticia varchar(200) NOT NULL,
  idnota int(11) NOT NULL,
  PRIMARY KEY (idnoticia)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='El detalle de las noticias';

--
-- Volcado de datos para la tabla 'noticia'
--

INSERT INTO noticia (idnoticia, titulonoticia, textonoticia, imgnoticia, idnota) VALUES
(1, 'Buseros proponen renunciar al subsidio al transporte a cambio de aumentar $0.13 centavos al pasaje', '<p>Las gremiales de buses y microbuses aglutinadas en AEAS y Rutas Unidas llegaron hasta Casa Presidencial para presentar la solicitud de que se les elimine el subsidio al transporte a cambio de aumentar el pasaje a $0.33 centavos, es decir, 13 centavos más.</p><p>Genaro Ramírez, de AEAS, manifesó que han realizado varias peticiones al Gobierno como el cambio de unidades, pero sus peticiones no han tenido eco.</p><p>Los buseros expresaron que con la compensión mensual que les entrega el Gobierno -que es de 200 para microbuses y 400 para los buses- "no salen" ni con los gastos de mantenimiento para las unidades.</p><p>"Ya es hora que el Presidente reoriente un nuevo planteamiento económico diferente para el sector transporte", expresó Juan Pablo Álvarez, de Rutas Unidas.</p><p>Ramírez recordó que desde el 2012 existe un estudio que establece que la tarifa del pasaje debe ser de $0.83 centavos.</p>', 'img/buseros-renunciarian-al-subsidio.jpg', 1),
(2, 'Obispos salvadoreños dicen que el Papa Francisco ora por canonización de Monseñor Romero', '<p>Los obispos salvadoreños se declararon regocijados por la visita Ad Limina Apostolorum (visita a las tumbas de los Apóstoles) en el Vaticano y su encuentro el papa Francisco, lo que muchos ven como una "cosa providencial que estemos en Roma (Italia) en estos días", refiriéndose a la víspera de los 37 años del asesinato del beato Óscar Romero.</p><p>"Ha sido una emoción estar casi dos horas con el Papa Francisco comentando sobre El Salvador", monseñor Fabio Colíndres, uno de los obispos que viajó a Roma.</p><p>Monseñor Gregorio Rosa Chávez, también mostró su emoción, por la coincidencia de la visita y aseguró "que nunca en la vida había pasado algo parecido", además que destacó que la reunión era sin agenda y parte de ello significaba la discusión del tema monseñor Romero.</p><p>Colíndres aseguró que también hablaron de la realidad que vive el país y que el pontífice los animó  en la fe, para orar por la violencia. Agregó que fue importante y "feliz discutir el tema de monseñor  Romero" y aseguró que su Santidad "también esta orando, unido a nosotros, por una pronta canonización".</p>', 'img/obispos-el-salvador-en-vaticano.jpg', 2),
(3, 'Un Brasil espectacular asegura su clasificación al Mundial, mientras Argentina cae a la zona de repechaje', '<p>Si las eliminatorias sudamericanas para el Mundial de Rusia terminaran hoy, Argentina tendría que jugar un repechaje contra una selección de Oceanía para lograr un cupo. Todo debido a la derrota de la celeste en Bolivia con marcador de 2 a 0, sin contar con la participación de Leonel Messi sancionado para un total de cuatro partidos.</p><p>La derrota de Argentina se da en medio de rumores reportados por medios de ese país que hablan de una posible salida del entrenador Edgardo Bauza.</p><h3>Brasil está imparable</h3><p>Por otra parte, Brasil mira de lejos a las selecciones que le siguen en la tabla de posiciones de estas eliminatorias, luego de derrotar a la selección de Paraguay en el estadio Arena Corinthians de Sao Paulo, encadenando 8 victorias consecutivas.</p><p>Neymar, que lleva seis goles en las eliminatorias suramericanas, ofreció otra exhibición y desatascó en la segunda mitad el juego de una selección brasileña, que entró al Itaquerao de Sao Paulo algo fría, pero que se fue con 33 puntos en las alforjas a falta de cuatro jornadas.</p>', 'img/eliminatoria-sudamericana-neymar.jpg', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla 'tipo'
--

CREATE TABLE IF NOT EXISTS tipo (
  idnota int(11) NOT NULL,
  tiponota varchar(30) NOT NULL,
  PRIMARY KEY (idnota)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Almacena los tipos de nota que se pueden publicar';

--
-- Volcado de datos para la tabla 'tipo'
--

INSERT INTO tipo (idnota, tiponota) VALUES
(1, 'Noticias'),
(2, 'Sociales'),
(3, 'Deportes');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
