
create database cumbiarebelde DEFAULT CHARACTER SET utf8;

use cumbiarebelde;

create table video(
	id int auto_increment,
	titulo varchar(255),
	link varchar(20),
	constraint pk_video primary key (id)
)DEFAULT CHARACTER SET utf8;

create table noticia(
	id int auto_increment,
	titulo varchar(255),
	contenido text,
	imagen varchar(255),
	fecha date,
	constraint pk_noticia primary key (id)
)DEFAULT CHARACTER SET utf8;

create table banda(
	nombre varchar(255),
	imagen varchar(255),
	biografia text,
	constraint pk_banda primary key (nombre)
)DEFAULT CHARACTER SET utf8;

create table disco(
	nombre varchar(255),
	imagen varchar(255),
	banda varchar(255),
	constraint pk_disco primary key (nombre,banda),
	constraint fk_discobanda foreign key (banda) references banda (nombre) ON DELETE CASCADE ON UPDATE CASCADE
)DEFAULT CHARACTER SET utf8;

create table imagen(
	id int auto_increment,
	imagen varchar(255),
	banda varchar(255),
	constraint pk_imagen primary key (id),
	constraint fk_imagenbanda foreign key (banda) references banda (nombre)  ON DELETE CASCADE ON UPDATE CASCADE
)DEFAULT CHARACTER SET utf8;

create table concurso(
	email varchar(255),
	nombre varchar(255),
	edad int,
	sexo varchar(9),
	comuna varchar(100),
	bandas text,
	comentario text,
	constraint pk_concurso primary key (email)
)DEFAULT CHARACTER SET utf8;




INSERT INTO `banda` (`nombre`, `imagen`, `biografia`) VALUES
('Los Pata e Cumbia', 'images/imgLos Pata e Cumbia.jpg', '<p>\r\n                    LOS PATA E CUMBIA es una banda chilena conformada en el año 2009 por seis músicos provenientes del rock. Está inspirada principalmente en los conjuntos de cumbia psicodélica de los 60’ y 70’ como la cumbia peruana “chicha”, pero sus canciones hacen que la fusión de estilos sea mucho más ecléctica.</p>\r\n\r\n<p>Al poco tiempo ganaron una importante selección para formar parte de su primer sello perteneciente a la Fundación Música de Chile, lo que les permitió editar su segundo disco (“La Lucha Continúa”). Como resultado de esto comenzaron a tocar en los escenarios más importantes de Santiago, y al poco tiempo girando a otras ciudades y países como Francia y Bélgica (“Primer Cojo Tour año 2011”).</p>\r\n\r\n	<p>Éste 2012 y motivados por la edición de su última producción discográfica (“Planeta Pata e Cumbia”), Los Pata e Cumbia realizan una nueva gira por Francia y Bélgica, y agregando por primera vez Alemania, estrenando y promocionando en exclusiva su último disco.</p>\r\n\r\n<p>La particularidad de sus shows es algo que les ha ayudado a cautivar al público en poco tiempo, pues en Chile son una de las pocas bandas que ocupa máscaras de lucha libre para tocar, y al mismo tiempo buscan convertir el concierto en una fiesta donde todos puedan bailar y disfrutar de la música.\r\n                    </p>');


INSERT INTO `disco` (`nombre`, `imagen`, `banda`) VALUES
('La lucha continúa', 'images/Los Pata e Cumbia-La lucha continua.jpg', 'Los Pata e Cumbia'),
('Planeta', 'images/Los Pata e Cumbia-Planeta.jpg', 'Los Pata e Cumbia'),
('Seca mis lagrimas', 'images/Los Pata e Cumbia-Seca mis lagrimas.jpg', 'Los Pata e Cumbia');


INSERT INTO `imagen` (`id`, `imagen`, `banda`) VALUES
(5, 'images/Los Pata e Cumbia1.jpg', 'Los Pata e Cumbia'),
(6, 'images/Los Pata e Cumbia2.jpg', 'Los Pata e Cumbia'),
(7, 'images/Los Pata e Cumbia3.jpg', 'Los Pata e Cumbia'),
(8, 'images/Los Pata e Cumbia4.jpg', 'Los Pata e Cumbia');


INSERT INTO `noticia` (`id`, `titulo`, `contenido`, `imagen`, `fecha`) VALUES
(9, 'Chico Trujillo animará el verano musical en Suiza', ' <p>Paleo Festival, una de las manifestaciones musicales más concurridas del verano en Suiza, presentará en su próxima edición de julio una bien cuidada selección de grupos tropicales sudamericanos, confirmaron hoy sus organizadores al presentar el programa del evento.</p>\r\n\r\n<p>Reconocidos grupos, como el peruano Cumbia All Starts, los argentinos de Karamelo Santo y La Yegros, el colombiano Meridian Brothers, el chileno Chico Trujillo, además del grupo de fusión con influencia venezolana, Family Atlantica, desfilarán en la zona Aldea del Mundo, de Paleo.</p>\r\n\r\n<p>Se trata de una enorme carpa temática que cada año se levanta en este festival para acoger a representantes de estilos musicales de países y regiones alejadas y, por tanto, menos conocidos en Europa.</p>\r\n\r\n<p>“Este año, la Aldea del Mundo escalará la cadena montañosa más larga del mundo, los Andes, que recorren a lo largo de 7.000 kilómetros la costa occidental de Sudamérica, y rendiremos honor a su diversidad cultural y musical”, comentaron los organizadores.</p>\r\n\r\n<p>En la elección de grupos para ese bloque -explicaron- se tomó en cuenta a aquellos que lograron crear una mixtura de la tradicional cumbia y tonalidades contemporáneas, incluyendo la música electrónica, el rock, el “hip hop” y el “reggae”.</p>\r\n\r\n<p>El festival se inaugurará el 22 de julio y será Karamelo Santo, quien dará el punto de partida a esta sección, bautizada como Andes, en la trigésimo novena edición del reconocido festival, al que también acudirán cantantes y grupos de la talla de Elton John, Vanessa Paradis, Placebo, The Black Eyes, entre otros.</p>\r\n\r\n<p>Al día siguiente será el turno del colombiano Meridian Brothers, un conjunto de tintes psicodélicos y que sale de lo común por su sonoridad experimental, que le ha conducido por un sendero plagado de originalidades, incluida la de la salsa electrónica.</p>\r\n\r\n<p>La tercera noche del festival tocarán los peruanos de Cumbia All Stars, que harán bailar al público con una música, que -entre todos los grupos sudamericanos invitados por Paleo- es la que más conserva el estilo de la cumbia de los años setenta, aunque con una notoria influencia de la música tropical de la región amazónica de Perú.</p>\r\n\r\n<p>Cerrarán estas noches de baile en la Aldea del Mundo Chico Trujillo, un obligado de las noches bailables de su país y que ha sabido fusionar la cumbia con otros estilos, tales que el “ska”, el “reggae” y el rock, manteniendo un espíritu netamente latino.</p>\r\n\r\n\r\n<p>Fuente: <strong>El Dínamo</strong></p>', 'images/2014-06-16chicotrujillosuiza.png', '2014-06-16'),
(10, 'Juana Fé lanzó su nuevo single "No vayayay"', 'Juana Fe presentó su nuevo single, “No Vayayay”, interpretada junto a la vocalista de Mákina Kandela, Carmen Vilches, el que se difundirá en radios y que ya está disponible en la web de La Makinita.</p>\r\n                    \r\n<p>La canción es “una metáfora acerca de la desmemoria y la pérdida del compromiso activo con las ganas de transformar esta sociedad en algo más colectivo y humano”, señaló Juan Ayala, vocalista de la banda que también popularizó “Callejero”.</p>\r\n\r\n<p>“No Vayayay” se nutre de múltiples ritmos latinos para derivar en un experimento de estudio. “Por lo general, nuestras grabaciones siempre han sido pensadas para que suenen iguales en vivo, pero en este caso no. La grabación fue planteada como un proceso distinto, se trabajó con muchos instrumentos sin pensar en la puesta en escena, entendiendo que el estudio también da la libertad de jugar con colores que el recital a veces no ofrece, son espacios distintos y también es sabroso entenderlo así”, explicó Ayala.</p>\r\n\r\n<p>En esta misma línea, destaca la participación de Carmen Vilches. “Es curioso, pero es la primera vez que integramos una voz femenina en nuestras grabaciones. Hace un tiempo que veníamos tocando con Mákina Kandela así que era necesario dejar registro de la amistad que nos une. Los aportes de distintos colegas y amigos nos ayudan a encontrar siempre nueva magia en este oficio de musiqueros, ya lo hicimos con Nano Stern, ahora con Mákina Kandela y ¡seguro que se vienen muchas colaboraciones más en el futuro!”, agregó.</p>\r\n\r\n<p>La gira de verano llevará a Juana Fe a recorrer gran parte del país y a presentarse oficialmente ante el público mexicano en el show por los 15 años del festival Vive Latino.</p>\r\n\r\n<p>Fechas de la gira de verano de Juana Fe:<br><br>\r\n\r\n29.01 Chillán<br>\r\n30.01 Concierto acústico El Merkén<br>\r\n01.02 Rip Curl Surfmusic Festival, Pichilemu<br>\r\n02.02 Vilcún<br>\r\n05.02 La Serena<br>\r\n07.02 Festival El Camarón de Freirina<br>\r\n08.02 Rock en el Parque, Valparaíso<br>\r\n09.02 La Ligua<br>\r\n15.02 XLII versión del Festival Cantar del Diguillin, El Carmen<br>\r\n21.02 Verano en Taltal<br>\r\n23.02 Los Ángeles<br>\r\n30.03 Vive Latino, México<br>\r\n02.04 y 05.04 Festival Verde, Panamá <br>\r\n</p>\r\n\r\n<p>Fuente: <strong>www.soychile.cl</strong></p>', 'images/2014-06-16noticia2.png', '2014-06-16'),
(11, 'Villa Cariño nominados al Premio Altazor', ' Este 2014 se realizará una nueva versión de los premios nacionales Altazor, en ellos se busca premiar y homenajear a todas las artes chilenas independientemente de su área, en este contexto la #Cumbialoka a sido nominada a este distinguido premio, como mejor Album Tropical gracias a nuestro último trabajo, La Fiesta es de nosotros.</p>\r\n\r\n<p>Como banda estamos muy agradecidos y emocionados por la nominación, que no es más que un hermoso reconocimiento a los largos años de trabajo... GRACIAS VILLANOS!!!\r\n</p>\r\n\r\n<p>Fuente: <strong>www.villacarino.cl</strong></p>', 'images/2014-06-16noticia1.png', '2014-06-16');



INSERT INTO `video` (`id`, `titulo`, `link`) VALUES
(2, 'Pata e Cumbia - Estoy en mi mejor momento', 'XJ4inq5QKMc');