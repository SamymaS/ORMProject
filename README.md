# ORMProject

## **Description**
Ce projet est une implémentation d'un ORM (Object-Relational Mapping) en PHP. 
L'objectif principal est de permettre une interaction simple entre les entités PHP et une base de données MySQL via des principes d'architecture logicielle tels que 
`Repository Pattern`, `Adapter Pattern`, et l'utilisation des `Value Objects`.

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
   - Encapsulation de types complexes dans des objets pour améliorer la lisibilité et la validation (par exemple, `Uid` pour les identifiants uniques).

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
```

---

### **3. Implémentation des Fichiers**

#### **Fichier `config/config.php`**
- Contient les paramètres de connexion à la base de données.

#### **Fichier `src/Adapter/DatabaseAdapter.php`**
- Classe responsable de l'interaction avec PDO pour la connexion et les requêtes SQL.

#### **Fichier `src/Entity/News.php`**
- Représentation PHP de la table `news`.
- Encapsulation des propriétés et validation des données.

#### **Fichier `src/ValueObject/Uid.php`**
- Classe pour gérer les identifiants UUID.

#### **Fichier `src/Repository/NewsRepository.php`**
- Gère les opérations en lecture/écriture pour la table `news`.
- Contient des méthodes comme `findById`, `findAll`, `save`, `update`, et `delete`.

#### **Fichier `src/Manager/EntityManager.php`**
- Classe principale pour orchestrer les opérations CRUD via le Repository.

#### **Fichier `public/index.php`**
- Point d'entrée pour tester les fonctionnalités via des actions passées en paramètre GET (`?action=read`).

---

### **4. Tests Réalisés**
- **Lecture des News** :
  - URL : `http://localhost/ORMProject/public/index.php?action=read`
  - Affiche les informations des news stockées en base.
- **Insertion et Suppression** :
  - Testées via des appels dans `index.php`.


---

## **Exemple d'Utilisation**
1. Cloner le projet :
   ```bash
   git clone https://github.com/SamymaS/ORMProject.git
   ```

2. Installer les dépendances Composer :
   ```bash
   composer install
   ```

3. Configurer la base de données dans `config/config.php`.

4. Accéder au projet via le navigateur :
   ```plaintext
   http://localhost/ORMProject/public/index.php?action=read
   ```

## **Ce projet remplit les conditions des consignes demandées, il respecte les principes suivants :**
1. Récupérer une entrée en base de données :
   ```Réalisation dans le projet :
   - La classe 'NewsRepository' inclut des méthodes comme 'findById' et 'findAll'
     qui exécutent des requêtes SQL pour récupérer des données de la bdd.
   - Ces requêtes récupèrent les informations depuis la tables 'news'.
   ```
2. Transmettre à l'application sous forme d'objet métier :
   ```Réalisation dans le projet :
   - Les résultats des requêtes SQL sont transformés en instances de la classe 'News',
     qui est une entité métier.
   - La méthode 'mapRowToNews' dans 'NewsRepository' assure la transformation des données
     brutes SQL en objets News.
   - Ces objets 'News' contiennent des prorpiétés comme 'id', 'content' et 'createdAt',
     accessibles via des méthodes de type "getter".
   ```
3. Respect des desings passés en revue :
   ```Repository Pattern :
   - Utilisé dans la classe 'NewsRepository' pour isoler la logique d'accès aux données.
   ```
   ```Adapter Pattern :
   - Implémenter via la classe 'DatabaseAdapter", qui gère la connexion à la base de données
     en encapsulant l'utilisation de PDO.
   ```
   ```Separation of Concerns :
   - Les responsabilités sont séparées entre les adapteurs (gestion des bases de données),
     les repositories (gestion des requêtes SQL), et les entités (représentation métier).
   ```
Validation :
1. Objectif : Le projet transforme bien une entrée de la base de données en ojet métier
   grâce aux méthodes du repository.
2. Précision dans la consigne : l'objectif est atteint si la récupération et la transformation respectent les designs discutés (Repository et Adapter patterns), ce qui est le cas dans mon projet.

3. 
   ```Point de validation supplémentaires :
   - L'objet métier ('News') est exploité dans l'application (par exemple, affiché dans
     index.php').
   - La récupération des données est conforme à un ORM simple (sans gestion des états ou
     relations complexes).
   ```

   ---

## **Prochaines Étapes**
- Ajouter un Query Builder pour générer des requêtes SQL dynamiques.
- Intégrer des tests unitaires pour valider chaque composant.
- Permettre la gestion de plusieurs entités avec une architecture extensible.
- Ajouter des logs pour tracer les erreurs et les actions effectuées.

## **Auteur**
Samy Boudaoud M1 DEV IOT
