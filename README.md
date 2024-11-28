# ORMProject

## **Description**
Ce projet est une implémentation simplifiée d'un ORM (Object-Relational Mapping) en PHP. L'objectif principal est de permettre une interaction simple entre les entités PHP et une base de données MySQL via des principes d'architecture logicielle tels que Repository Pattern, Adapter Pattern, et l'utilisation des Value Objects.

---

## **Consignes Initiales**
- Utilisation des **principes d'interface**.
- Respect de l'architecture logicielle :
  - **EntityManager** : Gestionnaire principal pour les opérations CRUD (Create, Read, Update, Delete) avec la base de données.
  - **Repository** : Gestion des requêtes en lecture.
  - **Adapter** : Gestion des interactions avec la base via un driver (PDO).
- Gestion des exceptions pour les erreurs.
- Utilisation de **PDO** pour la connexion à la base de données.
- Mise en place d'un **Query Builder** simplifié pour générer des requêtes SQL dynamiques.
- La base de données est représentée par une table `news` avec les colonnes suivantes :
  - `id` : Identifiant unique (UUID).
  - `content` : Contenu de la news.
  - `created_at` : Date de création.

---

## **Principes d'Architecture Utilisés**
1. **Repository Pattern** : 
   - Isoler les interactions avec la base de données dans une couche dédiée.
   - Permet de centraliser et réutiliser les méthodes d'accès aux données.

2. **Adapter Pattern** :
   - Fournir une interface uniforme pour interagir avec la base de données via PDO.
   - Faciliter le remplacement ou l'évolution de la technologie utilisée.

3. **Value Object** :
   - Encapsulation de types complexes dans des objets dédiés pour améliorer la lisibilité et la validation (par exemple, `Uid` pour les identifiants uniques).

---

## **Étapes Réalisées**

### **1. Configuration de l'Environnement**
- Installation de XAMPP pour utiliser Apache et MySQL.
- Configuration de MySQL :
  - Création de l'utilisateur `orm_user` et de la base de données `orm_project`.
  - Ajout des permissions à `orm_user`.
- Installation de Composer pour la gestion des dépendances PHP.

---

### **2. Mise en Place de l'Arborescence**
```plaintext
ORMProject/
├── config/
│   └── config.php          # Configuration de la connexion à la base de données
├── public/
│   └── index.php           # Point d'entrée principal pour tester le projet
├── src/
│   ├── Entity/             # Classes représentant les tables
│   │   └── News.php        # Entité pour la table `news`
│   ├── Repository/         # Gestion des requêtes en base
│   │   └── NewsRepository.php
│   ├── Adapter/            # Gestion des interactions avec la base
│   │   └── DatabaseAdapter.php
│   ├── ValueObject/        # Gestion des objets de valeur
│   │   └── Uid.php         # Objet de valeur pour les UUID
│   └── Manager/            # Gestionnaire principal pour CRUD
│       └── EntityManager.php
├── vendor/                 # Géré par Composer
├── composer.json           # Configuration des dépendances
└── .gitignore              # Fichiers à ignorer par Git
