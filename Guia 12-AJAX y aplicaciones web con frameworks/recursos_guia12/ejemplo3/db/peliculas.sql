-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-05-2016 a las 17:07:09
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: 'peliculas'
--
CREATE DATABASE IF NOT EXISTS `peliculas` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `peliculas`;

-- --------------------------------------------------------

--
-- Deshabilitar chequeo de claves|llaves foráneas
--
SET FOREIGN_KEY_CHECKS=0;


--
-- Estructura de tabla para la tabla 'director'
--

CREATE TABLE IF NOT EXISTS director (
  iddirector int(11) NOT NULL AUTO_INCREMENT,
  nombre varchar(80) NOT NULL,
  nacionalidad varchar(30) NOT NULL,
  PRIMARY KEY (iddirector)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Volcado de datos para la tabla 'director'
--

INSERT INTO director (iddirector, nombre, nacionalidad) VALUES
(1, 'Chris Columbus', 'Estadounidense'),
(2, 'Lee Daniels', 'Estadounidense'),
(3, 'Terry Gilliam', 'Estadounidense'),
(4, 'Richard LaGravenese', 'Estadounidense'),
(5, 'Eric Bress', 'Estadounidense'),
(6, 'Barry Sonnenfeld', 'Estadounidense'),
(7, 'Anne Fletcher', 'Estadounidense'),
(8, 'Frank Darabont', 'Franc'),
(9, 'Peter Jackson', 'Neozeland'),
(10, 'George Lucas', 'Estadounidense'),
(11, 'Manoj Nelliyattu Shyamalan', 'Indú'),
(12, 'Gabriele Muccino', 'Italiano'),
(13, 'Frank Coraci', 'Estadounidense'),
(14, 'Zack Snyder', 'Estadounidense'),
(15, 'Joss Whedon', 'Estadounidense');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla 'genero'
--

CREATE TABLE IF NOT EXISTS genero (
  idgenero int(11) NOT NULL AUTO_INCREMENT,
  generopelicula varchar(30) NOT NULL,
  PRIMARY KEY (idgenero)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla 'genero'
--

INSERT INTO genero (idgenero, generopelicula) VALUES
(1, 'Acción'),
(2, 'Drama'),
(3, 'Aventura'),
(4, 'Comedia Romántica'),
(5, 'Suspenso'),
(6, 'Musical'),
(7, 'Familiar'),
(8, 'Infantil'),
(9, 'Ciencia ficción');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla 'pelicula'
--

CREATE TABLE IF NOT EXISTS pelicula (
  idpelicula int(11) NOT NULL,
  titulopelicula varchar(120) NOT NULL,
  descripcion text NOT NULL,
  imgpelicula varchar(200) NOT NULL,
  tituloOriginal varchar(60) NOT NULL,
  idgenero int(11) NOT NULL,
  iddirector int(11) NOT NULL,
  duracion int(25) NOT NULL,
  PRIMARY KEY (idpelicula),
  KEY idgenero (idgenero),
  KEY peliculas_ibfk_2 (iddirector)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla 'pelicula'
--

INSERT INTO pelicula (idpelicula, titulopelicula, descripcion, imgpelicula, tituloOriginal, idgenero, iddirector, duracion) VALUES
(1, 'Percy Jackson y el Ladrón del Rayo', 'La historia narra la vida de un estudiante que descubre ser hijo de Poseidón, a raíz de esto se ve envuelto en una carrera contra el tiempo para impedir que los dioses griegos inicien una guerra que tiene como campo de batalla el continente americano de hoy en día.', 'img/percy-jackson-y-el-ladron-del-rayo.jpg', 'Percy Jackson & the Olympians: The lightning thief ', 1, 1, 119),
(2, 'Los Vengadores 2 - La era de Ultrón', 'El destino del planeta pende de un hilo cuando Tony Stark intenta hacer funcionar un inactivo programa para mantener la paz. Las cosas le salen mal y los héroes más poderosos, incluyendo Iron Man, Capitán América, la Viuda Negra, Thor, el Increíble Hulk y Ojo de Halcón, se ven enfrentados a la prueba definitiva.\r\nCuando el villano Ultrón aparece, es tarea de Los Vengadores el detenerle antes de que lleve a cabo sus terribles planes para el mundo. Inesperadas alianzas y acción por doquier sientan las bases para una épica aventura global.\r\n', 'img/los-vengadores-la-era-de-ultron.jpg', 'Avengers: Age of Ultron', 1, 15, 141),
(3, 'Batman v Superman: El origen de la justicia', 'Superman se ha convertido en la figura más controvertida del mundo. Mientras que muchos siguen creyendo que es un emblema de esperanza, otro gran número de personas lo consideran una amenaza para la humanidad. Para el influyente Bruce Wayne, Superman es claramente un peligro para la sociedad, su poder resulta imprudente y alejado de la mano del gobierno. Por eso, ante el temor de las acciones que pueda llevar a cabo un superhéroe con unos poderes casi divinos, decide ponerse la máscara y la capa para poner a raya al superhéroe de Metrópolis.\r\nMientras que la opinión pública debate sobre el interrogante de cuál es realmente el héroe que necesitan, el Hombre de Acero y Batman, enfrentados entre sí, se sumergen en una contienda el uno contra el otro. La rivalidad entre ellos está alimentada por el rencor y la venganza, y nada puede disuadirlos de librar esta guerra. Hostigados por el multimillonario Lex Luthor, Batman y Superman se ven las caras en una lucha sin precedentes.', 'img/batman-v-superman-el-origen-de-la-justicia.jpg', 'Batman v Superman: Dawn of Justice', 1, 14, 151),
(4, 'PD. Te Amo', 'La vida de Holly (Hilary Swank) se ve truncada cuando su marido, Gerry (Gerard Butler), muere. Incapaz de salir adelante por sí misma, su madre y sus amigos intentan animarla. Un día, después de su 30 cumpleaños, Holly recibe una carta de Gerry animándola a salir, a divertirse, a seguir adelante. Cada mes recibirá una carta firmada con un "Posdata: Te amo", que le devolverán las ganas de vivir.', 'img/post-data-te-amo.jpg', 'P.S. I love you', 4, 4, 115),
(5, 'Efecto mariposa', 'Evan Treborn, un joven que se está esforzando por superar unos dolorosos recuerdos de su infancia, descubre una técnica que le permite viajar atrás en el tiempo y ocupar su cuerpo de niño para poder cambiar el curso de su dolorosa historia. Sin embargo también descubre que cualquier mínimo cambio en el pasado altera enormemente su futuro.', 'img/efecto-mariposa.jpg', 'The Butterfly Effect', 5, 5, 100),
(6, 'Vacaciones en familia', 'Un ejecutivo preocupado por no perderse unas vacaciones con su familia decide llevarlos a vacacionar al mismo lugar donde tendrá una importante reunión de trabajo, pero sin decírselos', 'img/vacaciones-en-familia.jpg', 'RV', 7, 6, 98),
(7, 'La propuesta', 'Una poderosa editora llamada Margaret (Sandra Bullock) al enfrentarse ante la posibilidad de ser deportada a su país de origen, Canadá, decide comprometerse con su asistente Andrew (Ryan Reynolds) con el propósito de evitarlo', 'img/la-propuesta.jpg', 'The proposal', 4, 7, 108),
(8, 'Milagros inesperados', 'La película narra la vida de Paul Edgecomb (Tom Hanks), quien siendo un anciano de 108 años, cuenta su historia como oficial de la Milla Verde, una penitenciaría del estado de Luisiana, durante la década de 1930. Edgecomb cuenta que entre sus presos tuvo un personaje con poderes sobrenaturales, capaz de sanar a personas.', 'img/la-milla-verde.jpg', 'The Green Mile', 2, 8, 189),
(9, 'El Señor de los anillos: La comunidad del anillo', 'En la Tierra Media, el Señor Oscuro Sauron creó los Grandes Anillos de Poder, forjados por los herreros Elfos. Tres para los reyes Elfos, siete para los Señores Enanos, y nueve para los Hombres Mortales. Secretamente, Sauron también forjó un anillo maestro, el Anillo Único, que contiene en sí el poder para esclavizar a toda la Tierra Media. Con la ayuda de un grupo de amigos y de valientes aliados, Frodo emprende un peligroso viaje con la misión de destruir el Anillo Único. Pero el Señor Oscuro Sauron, quien creara el Anillo, envía a sus servidores para perseguir al grupo. Si Sauron lograra recuperar el Anillo, sería el final de la Tierra Media.', 'img/senor-de-los-anillos-comunidad-del-anillo.jpg', 'The Lord of The Rings: The fellowship of the ring', 3, 9, 178),
(10, 'La Guerra de las Galaxias: Episodio I - La amenaza fantasma', 'La historia se sitúa temporalmente 32 años antes de la batalla de Yavin. Narra los sucesos de la batalla de Naboo y se muestra cómo el senador Palpatine empieza su gran conspiración para llegar a ser Emperador de toda la galaxia. En ella podemos ver al, entonces, joven Anakin Skywalker de nueve años de edad libre de todo rastro del Lado Oscuro, que vive como esclavo con su madre en Tatooine. Allí conoce a un maestro Jedi llamado Qui-Gon Jinn, quien escapando con la reina de Naboo, nota en el pequeño Skywalker una poderosa fluctuación de la Fuerza.', 'img/episodio-i-la-amenaza-fantasma.jpg', 'Star Wars: Episode I - The Phantom Menace', 9, 10, 136),
(11, 'El sexto sentido', 'El psicólogo infantil Malcolm Crowe (Bruce Willis), vive con el horrible recuerdo de un paciente al cual trató erróneamente y a quien condujo a la desgracia intentando ayudarle. En su b&uacute;squeda de redención se fija en Cole (Haley Joel Osment), un niño de 9 años extraño e introvertido que necesita un tratamiento inminente. Decidido a compensar su pasado error, Malcolm tratará de acercarse a él y ayudarle, y poco a poco, irá ganándose su confianza. Será entonces cuando el pequeño Cole exprese por primera vez el escalofriante secreto que le atormenta: posee un don que le permite ver y escuchar a los espíritus atormentados que deambulan por el mundo, invisibles e intangibles. Estos fantasmas parecen querer algo de Cole, algún tipo de ayuda, algo que quieren que haga por ellos, y el niño vive el día a día horrorizado de ellos y de sí mismo. Según sus propias palabras, esos espíritus son gente muerta que cree estar viva a&uacute;n, envuelta en una ilusi&oacute;n, y su incomunicaci&oacute;n les causa un profundo sufrimiento. Malcolm, desconcertado por esa descripci&oacute;n, har&aacute; cuanto est&eacute; en su mano para hallar una cura.', 'img/sexto-sentido.jpg', 'The Sixth Sense', 5, 8, 107),
(12, 'En busca de la felicidad', 'Chris Gardner es un padre de familia que lucha por sobrevivir. A pesar de sus valientes intentos para mantener a la familia a flote, la madre de su hijo de cinco años Christopher comienza a derrumbarse a causa de la tensión constante de la presión económica; incapaz de soportarlo, en contra de sus sentimientos, decide marcharse. Chris comienza tenazmente a buscar un trabajo mejor pagado empleando todas las técticas comerciales que conoce. Consigue unas prácticas en una prestigiosa corredora de bolsa y, a pesar de no percibir ningún salario, acepta con la esperanza de finalizar el plan de estudios con un trabajo y un futuro prometedor. Sin colchón económico alguno, pronto echan a Chris y a su hijo del piso en el que viven y se ven obligados a vivir en centros de acogida, estaciones de autobús, cuartos de baño o allí donde encuentren refugio para pasar la noche.', 'img/en-busca-de-la-felicidad.jpg', 'Pursuit of happyness', 2, 12, 117),
(13, 'Click', 'Michael Newman (Adam Sandler) está casado con la bella Donna (Kate Beckinsale) y tienen dos hijos fantásticos, Ben (Joseph Castanon) y Samantha (Tatum McCann). Pero no puede verlos mucho porque dedica muchas duras y largas horas a su empresa arquitectónica con la débil esperanza de que su desagradecido jefe (David Hasselhoff) reconozca algún día su inestimable contribución y le convierta en socio.', 'img/click.jpg', 'Click', 7, 13, 107);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla pelicula
--
ALTER TABLE pelicula
  ADD CONSTRAINT pelicula_ibfk_1 FOREIGN KEY (idgenero) REFERENCES genero (idgenero) ON UPDATE CASCADE,
  ADD CONSTRAINT pelicula_ibfk_2 FOREIGN KEY (iddirector) REFERENCES director (iddirector) ON UPDATE CASCADE;

--
-- Habilitar nuevamente las restricciones de clave|llave foránea
--
SET FOREIGN_KEY_CHECKS=1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
