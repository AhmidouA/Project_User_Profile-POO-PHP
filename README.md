# README

## Description du Projet

Ce projet consiste en une interface utilisateur (UI) permettant de gérer les utilisateurs. Il offre les fonctionnalités CRUD (Create, Read, Update, Delete) pour manipuler les données des utilisateurs. L'ensemble du projet est développé en utilisant la programmation orientée objet (POO) avec PHP.

## Fonctionnalités

1. **CRUD Utilisateur**: Vous pouvez créer, afficher, mettre à jour et supprimer des utilisateurs.
2. **Interface Utilisateur Conviviale**: L'interface utilisateur est conçue pour être conviviale et intuitive, facilitant ainsi la manipulation des données des utilisateurs.
3. **Gestion des Erreurs**: Des messages d'erreur et de succès sont affichés pour informer l'utilisateur des actions effectuées avec succès ou des erreurs rencontrées lors de l'exécution des opérations CRUD.
4. **Sécurité**: Le projet intègre des mesures de sécurité pour éviter les vulnérabilités telles que les injections SQL.

## Structure du Projet

1. **Classes PHP**: Toutes les fonctionnalités sont mises en œuvre à l'aide de classes PHP, organisées de manière logique pour faciliter la maintenance et l'extension du projet.
2. **Dossier Include**: Le dossier `include` contient toutes les classes et fichiers nécessaires au bon fonctionnement du projet, à l'exception du fichier `index.php` qui se trouve à la racine du projet.
3. **Fichier Dotenv**: Le projet utilise un fichier `.env` pour stocker les variables d'environnement sensibles, comme les informations de connexion à la base de données.
4. **Dossier Data**: Le dossier `data` contient le script `init_table.sql` pour initialiser la structure de la base de données et éventuellement les données de test. Il contient également un fichier pour la connexion à la base de données.

## Installation et Configuration

1. Clonez le projet depuis le référentiel GitHub.
2. Créez une copie du fichier `.env.example` et renommez-la en `.env`. Remplissez les informations de connexion à votre base de données.
3. Exécutez le script `init_table.sql` dans votre base de données pour initialiser la structure de la table des utilisateurs.
4. Ouvrez le projet dans votre éditeur de code préféré.
5. Lancez un serveur PHP local ou configurez votre serveur web pour exécuter le projet.
6. Accédez à l'interface utilisateur dans votre navigateur pour commencer à utiliser l'application.

## Développement et Contribution

Si vous souhaitez contribuer à ce projet, veuillez :

- Fork ce dépôt.
- Créez une branche pour votre fonctionnalité (`git checkout -b feature/YourFeature`).
- Committez vos modifications (`git commit -m 'Ajouter une nouvelle fonctionnalité'`).
- Poussez vers la branche (`git push origin feature/YourFeature`).
- Ouvrez une demande d'extraction sur le dépôt d'origine.

## Auteur

Ce projet a été développé par [Votre Nom] et est disponible sous licence [Licence].

---

Merci d'utiliser notre application! Si vous avez des questions ou des commentaires, n'hésitez pas à nous contacter.
