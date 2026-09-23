# Course Manager — Plateforme de gestion de cours et d'étudiants

Application web Symfony permettant de gérer des étudiants et des cours, avec inscription des étudiants aux cours, authentification, et interface d'administration complète.

## Contexte

Ce projet reprend, dans un contexte simplifié et démontrable, le type de travail que j'ai mené pendant deux ans chez Progress Engineering : la maintenance et l'évolution d'une plateforme web universitaire en Symfony (stabilisation post-migration, développement de nouvelles fonctionnalités, gestion des besoins utilisateurs).

## Fonctionnalités

- **Authentification** — inscription, connexion, déconnexion, protection des routes sensibles
- **Gestion des étudiants** — création, consultation, modification, suppression (CRUD complet)
- **Gestion des cours** — création, consultation, modification, suppression (CRUD complet)
- **Inscription aux cours** — relation many-to-many entre étudiants et cours
- **Tableau de bord** — vue d'ensemble avec statistiques (nombre d'étudiants, de cours)

## Stack technique

Symfony · Doctrine ORM · Twig · MySQL · Bootstrap 5 · Symfony Security

## Installation

Prérequis : PHP 8.2+, Composer, MySQL.

```bash
git clone https://github.com/MRSI2/course-manager.git
cd course-manager
composer install
```

Configurer la base de données dans `.env` (ou `.env.local`) :

```
DATABASE_URL="mysql://root:@127.0.0.1:3306/course_manager?serverVersion=8.0"
```

Puis :

```bash
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
php -S localhost:8000 -t public
```

L'application est alors accessible sur `http://localhost:8000`.

## Structure du projet

```
course-manager/
├── src/
│   ├── Entity/          # Student, Course, User
│   ├── Controller/      # StudentController, CourseController, SecurityController, HomeController
│   ├── Repository/      # Requêtes personnalisées
│   ├── Security/        # Authentification personnalisée
│   └── Form/            # Formulaires (RegistrationForm...)
├── templates/            # Vues Twig
├── migrations/           # Historique des évolutions de la base de données
└── config/
```

## Points techniques notables

- Relation **ManyToMany** entre `Student` et `Course`, avec accès bidirectionnel
- Système d'authentification Symfony Security (formulaire de connexion personnalisé, hashage des mots de passe, option "se souvenir de moi")
- Protection des routes CRUD par attribut `#[IsGranted('IS_AUTHENTICATED_FULLY')]`
- Génération du schéma de base de données via les migrations Doctrine

## Améliorations possibles

- Vérification d'email à l'inscription
- reCAPTCHA sur le formulaire d'inscription
- Tests automatisés (PHPUnit)
- Rôles utilisateurs différenciés (administrateur / étudiant)
