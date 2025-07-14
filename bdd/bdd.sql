CREATE TABLE membre (
    id_membre INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(100),
    date_naissance DATE,
    genre VARCHAR(10),
    email VARCHAR(100),
    ville VARCHAR(100),
    mdp VARCHAR(255),
    image_profil VARCHAR(255)
);

CREATE TABLE categorie_objet (
    id_categorie INT PRIMARY KEY AUTO_INCREMENT,
    nom_categorie VARCHAR(100)
);

CREATE TABLE objet (
    id_objet INT PRIMARY KEY AUTO_INCREMENT,
    nom_objet VARCHAR(100),
    id_categorie INT,
    id_membre INT,
    FOREIGN KEY (id_categorie) REFERENCES categorie_objet(id_categorie),
    FOREIGN KEY (id_membre) REFERENCES membre(id_membre)
);

CREATE TABLE images_objet (
    id_image INT PRIMARY KEY AUTO_INCREMENT,
    id_objet INT,
    nom_image VARCHAR(255),
    FOREIGN KEY (id_objet) REFERENCES objet(id_objet)
);

CREATE TABLE emprunt (
    id_emprunt INT PRIMARY KEY AUTO_INCREMENT,
    id_objet INT,
    id_membre INT,
    date_emprunt DATE,
    date_retour DATE,
    FOREIGN KEY (id_objet) REFERENCES objet(id_objet),
    FOREIGN KEY (id_membre) REFERENCES membre(id_membre)
);

INSERT INTO membre (nom, date_naissance, genre, email, ville, mdp, image_profil) VALUES
('Mialy', '1990-03-12', 'F', 'mialy@example.com', 'Antananarivo', 'mialy123', 'mialy.jpg'),
('Tojo', '1985-07-22', 'M', 'tojo@example.com', 'Fianarantsoa', 'tojo123', 'tojo.jpg'),
('Hanta', '1994-11-05', 'F', 'hanta@example.com', 'Mahajanga', 'hanta123', 'hanta.jpg'),
('Eric', '1988-09-14', 'M', 'eric@example.com', 'Toamasina', 'eric123', 'eric.jpg');
Herizo
INSERT INTO categorie_objet (nom_categorie) VALUES
('Esthétique'),
('Bricolage'),
('Mécanique'),
('Cuisine');
Herizo
-- id_membre de 1 à 4
-- id_categorie de 1 à 4

INSERT INTO objet (nom_objet, id_categorie, id_membre) VALUES
-- Mialy
('Sèche-cheveux', 1, 1), ('Crème hydratante', 1, 1), ('Pinceau maquillage', 1, 1), ('Marteau', 2, 1),
('Tournevis', 2, 1), ('Pompe à air', 3, 1), ('Clé anglaise', 3, 1), ('Mixeur', 4, 1),
('Casserole', 4, 1), ('Grille-pain', 4, 1),

-- Tojo
('Perceuse', 2, 2), ('Scie', 2, 2), ('Clé à molette', 3, 2), ('Filtre moteur', 3, 2),
('Fouet', 4, 2), ('Poêle', 4, 2), ('Shampoing', 1, 2), ('Lisseur', 1, 2),
('Trousse de maquillage', 1, 2), ('Four', 4, 2),

-- Hanta
('Fer à friser', 1, 3), ('Blush', 1, 3), ('Visseuse', 2, 3), ('Niveau laser', 2, 3),
('Injecteur diesel', 3, 3), ('Batterie', 3, 3), ('Marmite', 4, 3), ('Balance cuisine', 4, 3),
('Crayon à sourcils', 1, 3), ('Couteau de cuisine', 4, 3),

-- Eric
('Tournevis plat', 2, 4), ('Scie sauteuse', 2, 4), ('Pompe manuelle', 3, 4), ('Bougie allumage', 3, 4),
('Micro-ondes', 4, 4), ('Cuiseur riz', 4, 4), ('Gel coiffant', 1, 4), ('Peigne chauffant', 1, 4),
('Wok', 4, 4), ('Clé dynamométrique', 3, 4);
Herizo
INSERT INTO images_objet (id_objet, nom_image)
SELECT id_objet, CONCAT('objet_', id_objet, '.jpg') FROM objet;
Herizo
INSERT INTO emprunt (id_objet, id_membre, date_emprunt, date_retour) VALUES
(1, 2, '2025-07-01', '2025-07-08'),
(5, 3, '2025-07-02', '2025-07-10'),
(8, 4, '2025-07-03', NULL),
(12, 1, '2025-07-04', '2025-07-12'),
(15, 3, '2025-07-05', NULL),
(19, 1, '2025-07-06', '2025-07-15'),
(22, 2, '2025-07-07', NULL),
(28, 4, '2025-07-08', NULL),
(33, 2, '2025-07-09', '2025-07-18'),
(39, 3, '2025-07-10', NULL);