# Système de Gestion de Bibliothèque

Ce projet est un système de gestion de bibliothèque qui permet de gérer les membres et les livres, ainsi que les emprunts de livres par les membres. Il utilise PHP et la Programmation Orientée Objet (POO).

## Structure du Projet

app/
├── controllers/
│ ├── MembreController.php
│ ├── LivreController.php
│ └── EmpruntController.php
├── models/
│ ├── Membre.php
│ ├── Livre.php
│ └── Emprunt.php
└── views/
├── membre/
│ ├── index.php
│ └── show.php
├── livre/
│ ├── index.php
│ └── show.php
public/
├── assets/
│ ├── css/
│ └── js/
├── index.php
config/
└── database.php


La structure du projet est la suivante :

- **app**  
  Contient le code source principal de l'application.
  - **controllers**  
    Les contrôleurs de l'application qui gèrent la logique de traitement des requêtes.
  - **models**  
    Les modèles qui interagissent avec la base de données.
  - **views**  
    Les vues qui génèrent l'interface utilisateur.

- **config**  
  Contient les fichiers de configuration de l'application.

- **public**  
  Contient les fichiers accessibles publiquement, tels que les fichiers CSS, JavaScript et les images.

## Installation

1. Clonez le dépôt :
   ```bash
   git clone https://github.com/GasyCoder/tp-essgam-licence-l2.git

2. Accédez au répertoire du projet :
    ```bash
    cd tp-essgam-licence-l2

3. Configurez la base de données dans `config/database.php` :
    ```php
    <?php

    $db_host = 'localhost';
    $db_name = 'bibliotheque';
    $db_user = 'root';
    $db_pass = '';

    try {
        $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo 'Connexion échouée : ' . $e->getMessage();
    }

    ?>

4. Créez la base de données et les tables nécessaires :
    ```sql
    CREATE DATABASE bibliotheque;

    USE bibliotheque;

    CREATE TABLE membres (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nom VARCHAR(255) NOT NULL
    );

    CREATE TABLE livres (
        id INT AUTO_INCREMENT PRIMARY KEY,
        titre VARCHAR(255) NOT NULL
    );

    CREATE TABLE emprunts (
        id INT AUTO_INCREMENT PRIMARY KEY,
        membre_id INT NOT NULL,
        livre_id INT NOT NULL,
        FOREIGN KEY (membre_id) REFERENCES membres(id),
        FOREIGN KEY (livre_id) REFERENCES livres(id)
    );
    ```

## Utilisation

1. Démarrez un serveur PHP intégré depuis le répertoire `public` :
    ```bash
    php -S localhost:8000 -t public
    ```

2. Accédez à l'application dans votre navigateur à l'adresse :
    ```
    http://localhost:8000
    ```

## Fonctionnalités

- Ajouter un nouveau membre
- Ajouter un nouveau livre
- Emprunter des livres pour un membre
- Voir la liste des membres
- Voir la liste des livres
- Voir les emprunts (livres empruntés par les membres)
- Voir les détails d'un membre (y compris les livres empruntés)
- Voir les détails d'un livre (y compris les membres l'ayant emprunté)

## Contribution

Les contributions sont les bienvenues ! Veuillez soumettre une pull request ou ouvrir une issue pour discuter des modifications que vous souhaitez apporter.

## Licence

Ce projet est sous licence MIT. Voir le fichier [LICENSE](LICENSE) pour plus de détails.
