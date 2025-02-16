CREATE DATABASE onlineShop CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- Sélection de la base de données
USE onlineShop;

-- Création de la table des produits
CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY, -- Ajout de AUTO_INCREMENT pour générer automatiquement les IDs
    name VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    image VARCHAR(255),
    category VARCHAR(100),
    description TEXT,
    quantity INT DEFAULT 0
);

-- Création de la table des caractéristiques
CREATE TABLE features (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT NOT NULL,
    feature TEXT NOT NULL,
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
);

-- Insertion des données dans la table products
-- Suppression explicite de la colonne 'id' pour laisser AUTO_INCREMENT générer les valeurs automatiquement
-- Insérer tous les produits à partir des données JSON
INSERT INTO products (name, price, image, category, description, quantity) VALUES
('Apple TV', 249.99, 'apple-tv.png', 'computers', 'L\'Apple TV est un appareil conçu par Apple qui permet la communication sans fil entre un ordinateur et un téléviseur. Il est disponible depuis fin mars 2007 dans sa première version. L\'appareil ressemble alors par sa forme à un Mac mini, bien qu\'il ne fasse que la moitié de sa hauteur. Il communique par réseau sans fil ou Ethernet, avec un appareil iOS ou avec un ordinateur (sous Mac OS X ou sous Windows) par le biais du logiciel iTunes, permettant ainsi de diffuser le contenu vidéo et audio sur le téléviseur, via éventuellement un amplificateur audio-vidéo. (<a href=\'https://fr.wikipedia.org/wiki/Apple_TV\' target=\'_blank\'>Wikipédia</a>)', 0),
('Canon EOS 5D Mark II', 2999.99, 'camera-1.png', 'cameras', 'Le Canon EOS 5D Mark II est un appareil photographique reflex numérique à objectif interchangeable équipé d\'un capteur 24×36 de 21 mégapixels, annoncé le 17 septembre 2008 et retiré du catalogue Canon japonais à la fin décembre 2012 puis du catalogue français à la mi-mars 2013. Il permet, pour la première fois sur ce type d\'appareil, de filmer en vidéo HD 1080p (1920×1080 pixels). Canon a reçu, pour ce boîtier, le prix TIPA (Technical Image Press Association) du meilleur reflex « expert » en 2009. (<a href=\'https://fr.wikipedia.org/wiki/Canon_EOS_5D_Mark_II\' target=\'_blank\'>Wikipédia</a>)', 0),
('Nikon D7000', 549.99, 'camera-2.png', 'cameras', 'Le Nikon D7000 est un appareil photographique reflex numérique, présenté par Nikon le 15 septembre 2010. Il remplace le D90 comme reflex de milieu de gamme. (<a href=\'https://fr.wikipedia.org/wiki/Nikon_D7000\' target=\'_blank\'>Wikipédia</a>)', 0),
('Canon PowerShot SD1300', 299.99, 'camera-3.png', 'cameras', 'Tout est une question de puissance du contraste. Des couleurs qui défient les conventions. Des courbes douces et élégantes qui fusionnent l\'art et la technologie en un appareil photo conçu pour être source d\'inspiration. L\'appareil photo PowerShot SD1300 IS Digital ELPH capte votre monde tout autant qu\'il exprime votre originalité au moyen d\'innovations audacieuses, dont un remarquable rendement par faible luminosité. Tout semble correct. Prenez-le en main… et tout semble effectivement bien. (<a href=\'http://canon.ca/inetCA/fr/products?m=gp&pid=3521#_010\' target=\'_blank\'>Canon Canada</a>)', 0),
('Portable', 699.99, 'laptop-1.png', 'computers', 'Portable idéal pour un étudiant ou un joueur occasionnel. L\'ordinateur dispose de plusieurs ports (HDMI, USB, Ethernet, etc.) pouvant accueillir plusieurs périphériques. Le portable est équipé d\'un processus i5 de troisième génération, de 8 Go de mémoire et d\'un disque dur SSD de 256 Go. De plus, ce portable est équipé d\'une carte graphique NVIDIA GeForce GTX 660M.', 0),
('Portable professionnel', 599.99, 'laptop-2.png', 'computers', 'Portable professionnel idéal pour le travail à la maison ou dans une petite entreprise. L’ordinateur dispose d’un grand nombre de ports (HDMI, VGA, USB, Ethernet, etc.) ce qui facilite le branchement de différents périphériques. Le portable est équipé d’un processeur i5 de troisième génération, de 8 Go de RAM et d’un disque dur SSD de 256 Go.', 0),
('iMac 27"', 2299.99, 'mac.png', 'computers', 'L\'iMac est la gamme d’ordinateurs tout-en-un grand public d’Apple depuis 1998. Les premiers modèles, à écran cathodique, ont relancé la marque Apple à la fin des années 1990. Six générations de cet ordinateur de bureau ont été commercialisées en quatorze ans, du premier modèle coloré aux formes rondes au tout-en-un à écran plat 16:9 (27 pouces) aujourd\'hui en vente. Les appareils sont animés par les systèmes d\'exploitations d\'Apple : Mac OS 9 pour les premières générations, puis macOS. (<a href=\'https://fr.wikipedia.org/wiki/IMac\' target=\'_blank\'>Wikipédia</a>)', 0),
('Moniteur 19"', 149.99, 'monitor.png', 'screens', 'Moniteur LCD de 19 pouces pouvant être branché via VGA, HDMI et DVI. Cet écran est facilement ajustable dans plusieurs positions, afin de maximiser le confort de l’utilisateur.', 0),
('Console PS3', 349.99, 'ps3.png', 'consoles', 'La PlayStation 3 (abrégé officiellement PS3) est une console de jeux vidéo de septième génération commercialisée par Sony. Elle est sortie le 11 novembre 2006 au Japon, le 17 novembre 2006 en Amérique du Nord et le 23 mars 2007 en Europe. Elle succède à la PlayStation 2 et concurrence la Xbox 360, et indirectement la Wii. (<a href=\'https://fr.wikipedia.org/wiki/PlayStation_3\' target=\'_blank\'>Wikipédia</a>)', 0),
('Téléviseur 50"', 899.99, 'tv.png', 'screens', 'Téléviseur de 50" possédant une résolution de 1080p. Ce téléviseur est parfait pour visionner vos séries préférées. De plus, cette télévision possède trois prises HDMI et un support natif pour la technologie Chromecast.', 0),
('Console Wii', 199.99, 'wii.png', 'consoles', 'La Wii est une console de jeux vidéo de salon du fabricant japonais Nintendo. Console de la septième génération, tout comme la Xbox 360 et la PlayStation 3 avec lesquelles elle est en rivalité, elle est la console de salon la plus vendue de sa génération et a comme particularité d\'utiliser un accéléromètre capable de détecter la position, l\'orientation et les mouvements dans l\'espace de la manette. (<a href=\'https://fr.wikipedia.org/wiki/Wii\' target=\'_blank\'>Wikipédia</a>)', 0),
('Console Xbox One', 399.99, 'xbox.png', 'consoles', 'La Xbox One est une console de jeux vidéo de huitième génération développée par Microsoft. Dévoilée le 21 mai 2013, elle succède à la Xbox 360 et se place en concurrence frontale avec la PlayStation 4 de Sony, et plus indirectement avec la Wii U de Nintendo. Elle est disponible depuis le 22 novembre 2013 dans treize pays et depuis septembre 2014 dans vingt-six autres pays. D\'abord uniquement commercialisée avec Kinect, Microsoft propose la console seule à partir du 9 juin 2014. (<a href=\'https://fr.wikipedia.org/wiki/Xbox_One\' target=\'_blank\'>Wikipédia</a>)', 0),
('Manette Xbox 360', 29.99, 'xbox-controller.png', 'consoles', 'Manette pouvant être branchée à une console Xbox 360 et un PC. Cette manette vous permettra de jouer à vos jeux vidéo préférés. De plus, cette manette est sans fil et comporte un port pour casque d écoute.', 0);



-- Insertion des données dans la table features
INSERT INTO features (product_id, feature) VALUES
(1, 'Processeur Apple A8'),
(1, 'Mémoire vive de 2Go'),
(1, 'Stockage de 32 ou 64 Go en mémoire flash'),
(1, 'Connectivités: USB Type-C, HDMI, récepteur infrarouge'),
(1, 'Réseau: Wi-Fi (802.11a/b/g/n/ac), 10/100 Ethernet, Bluetooth, AirPlay'),
(2, 'Reflex numérique en alliage de magnésium à objectifs interchangeables de monture EF'),
(2, 'Capteur CMOS avec matrice de Bayer (RVB) de 35,8 × 23,9 mm (format 24×36)'),
(2, 'Processeur d\'images DIGIC 4'),
(2, '21 millions de pixels. L\'information de couleur est codée sur 14 bits'),
(2, 'Ratio image 3:2'),
(3, 'Capteur CMOS 16,2 mégapixels au format Nikon DX'),
(3, 'Processeur d images Nikon EXPEED 2'),
(3, 'Vidéo full HD (1920x1080)'),
(3, 'Mise au point autofocus 39 points avec quatre modes zone AF, dont le suivi 3D'),
(3, 'Sensibilité ISO du capteur allant de 100 à 25600 ISO (position Hi2)'),
(4, 'Fonction AUTO intelligente qui choisit les réglages appropriés parmi 18 situations de prise de vues prédéfinies.'),
(4, 'Résolution de 12,1 mégapixels simplifiant l\'impression d\'images grand format nettes et détaillées.'),
(4, 'Écran ACL clair et lumineux aux couleurs pures de 2,7 po pour prendre et visionner les images.'),
(4, 'Couleurs nettes et stylisées convenant à toute personnalité.'),
(4, 'Prise de vues en mode faible éclairage dans des conditions de faible luminosité.'),
(5, 'Processus i5 de troisième génération'),
(5, '8 Go de RAM'),
(5, 'Disque SSD de 256 Go'),
(5, 'Ports HDMI, USB et Ethernet'),
(5, 'Carte graphique NVIDIA GeForce GTX 660M'),
(6, 'Processus i5 de troisième génération'),
(6, '8 Go de RAM'),
(6, 'Disque SSD de 256 Go'),
(6, 'Ports HDMI, VGA, USB, Ethernet et Firewire'),
(6, 'Construction robuste'),
(7, 'Processeur quadricœur Intel Core i5 à 3,2 GHz (jusqu’à 3,6 GHz avec Turbo Boost)'),
(7, '8 Go (2 x 4 Go) de mémoire DDR3 à 1 867 MHz'),
(7, 'Disque dur de 1 To à 7 200 tr/min'),
(7, 'Processeur graphique AMD Radeon R9 M380 avec 2 Go de mémoire GDDR5'),
(7, 'Caméra FaceTime HD'),
(8, 'Écran de 19\"'),
(8, 'Entrées VGA, HDMI et DVI'),
(8, 'Ajustable dans plusieurs positions'),
(8, 'Écran mat limitant les reflets'),
(8, 'Garantie 2 ans'),
(9, 'Processeur Cell cadencé à 3.2 Ghz'),
(9, 'Processeur graphique Nvidia à 550 Mhz'),
(9, '256 Mo de mémoire principale XDR à 3.2 Ghz / 256 Mo de mémoire vidéo GDDR3 à 700 Mhz'),
(9, 'Lecteur Blu-Ray (54 Go maximum)'),
(9, 'Disque dur détachable (2 pouces et demi)'),
(10, 'Résolution de 1920 x 1080'),
(10, 'Rapport d image de 16:9'),
(10, 'Trois ports HDMI'),
(10, 'Intègre la technologie Chromecast'),
(11, 'Microprocesseur Unit Broadway Power PC'),
(11, 'Processeur graphique (AMD) ATI Hollywood cadencé à 243 MHz'),
(11, 'Mémoire de 24 Mo de 1TSRAM + 64 Mo de 1TSRAM de MoSys Technology'),
(11, 'Lecteur DVD Panasonic Matsushita Electronic'),
(11, '2 Prises USB 2.0, Sortie Vidéo/Audio YUV et Sortie RVB'),
(12, 'CPU : x86 AMD 8 coeurs (1,6 GHz d après les estimations)'),
(12, 'GPU : 1,23 TFLOPS, a priori proche de l AMD RADEON 7790'),
(12, '8 Go de RAM DDR3 à 68,3 Go/s'),
(12, 'Lecteur Blu-ray'),
(12, 'Disque dur 500 Go'),
(13, 'Manette sans fil 2.4GHz avec adapteur USB'),
(13, 'Compacte et ergonomique'),
(13, 'Port pour casque d écoute pour Xbox Live');



-- Supprimer les tables existantes si elles existent (pour éviter les conflits)
-- Drop existing tables if they exist
DROP TABLE IF EXISTS User;
DROP TABLE IF EXISTS Role;

-- Create the Role table
CREATE TABLE Role (
    RoleID INT AUTO_INCREMENT PRIMARY KEY,
    RoleName VARCHAR(50) NOT NULL UNIQUE
);

-- Create the User table
CREATE TABLE User (
    UserID INT AUTO_INCREMENT PRIMARY KEY,
    FirstName VARCHAR(50) NOT NULL,
    LastName VARCHAR(50) NOT NULL,
    Email VARCHAR(100) NOT NULL UNIQUE,
    Password VARCHAR(255) NOT NULL,
    Phone VARCHAR(15),
    Address VARCHAR(255),
    RoleID INT NOT NULL,
    FOREIGN KEY (RoleID) REFERENCES Role(RoleID)
);

-- Insert data into Role table
INSERT INTO Role (RoleName) VALUES ('Admin'), ('Seller'), ('Customer');

-- Insert data into User table
INSERT INTO User (FirstName, LastName, Email, Password, Phone, Address, RoleID) 
VALUES 
    -- Admins
    ('John', 'Smith', 'john.smith@example.com', 'hashedpassword1', '1234567890', '123 Main St, City A', 1),
    ('Emma', 'Brown', 'emma.brown@example.com', 'hashedpassword2', '0987654321', '456 Elm St, City B', 1),

    -- Sellers
    ('Michael', 'Johnson', 'michael.johnson@example.com', 'hashedpassword3', '5678901234', '789 Oak St, City C', 2),
    ('Linda', 'Wilson', 'linda.wilson@example.com', 'hashedpassword4', '6789012345', '123 Birch St, City D', 2),

    -- Customers
    ('Sophia', 'Taylor', 'sophia.taylor@example.com', 'hashedpassword5', '2345678901', '101 Pine St, City E', 3),
    ('James', 'Anderson', 'james.anderson@example.com', 'hashedpassword6', '3456789012', '202 Maple St, City F', 3),
    ('Olivia', 'Martinez', 'olivia.martinez@example.com', 'hashedpassword7', '4567890123', '303 Cedar St, City G', 3),
    ('Liam', 'Garcia', 'liam.garcia@example.com', 'hashedpassword8', '5678901234', '404 Birch St, City H', 3),
    ('Isabella', 'Hernandez', 'isabella.hernandez@example.com', 'hashedpassword9', '6789012345', '505 Walnut St, City I', 3);
