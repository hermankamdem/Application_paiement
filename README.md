# 📊 Application de Gestion de la Paie des Professeurs

## 📋 Table des matières
- [Description](#description)
- [Fonctionnalités](#fonctionnalités)
- [Architecture](#architecture)
- [Prérequis](#prérequis)
- [Installation](#installation)
- [Structure du projet](#structure-du-projet)
- [Utilisation](#utilisation)
- [Rôles et Accès](#rôles-et-accès)
- [Sécurité](#sécurité)
- [Points à améliorer](#points-à-améliorer)
- [Technologies utilisées](#technologies-utilisées)
- [Auteur](#auteur)

---

## 📝 Description

**Application de Gestion de la Paie des Professeurs** est une application web développée en **PHP/MySQL** permettant de gérer efficacement la paie des professeurs et vacataires d'une institution éducative.

Cette application offre une interface intuitive pour :
- L'enregistrement et la gestion des comptables
- La gestion des informations des professeurs (permanents et vacataires)
- Le suivi et la gestion de la paie
- L'accès sécurisé via authentification par rôle

---

## ✨ Fonctionnalités

### 🔐 Authentification et Contrôle d'Accès
- **Portail d'accueil** : Sélection du type d'utilisateur (Administrateur/Comptable)
- **Authentification des comptables** : Vérification des identifiants via base de données
- **Authentification des administrateurs** : Code PIN pour accès administrateur

### 👥 Gestion des Comptables
- **Enregistrement** : Ajout de nouveaux comptables avec les informations :
  - Nom, Prénom
  - Sexe, Âge
  - Code comptable
  - Identifiant unique
- **Suppression** : Retrait des comptables de la base de données
- **Vérification des doublons** : Contrôle des identifiants uniques

### 📚 Gestion des Professeurs
- **Enregistrement des permanents** : Gestion des professeurs permanents
- **Enregistrement des vacataires** : Gestion des professeurs vacataires
- **Stockage des informations** : Données de paie et historique

### 💰 Gestion de la Paie
- Suivi des salaires
- Gestion des différentes catégories de professeurs
- Intégration avec la base de données comptable

---

## 🏗️ Architecture

### Architecture générale
```
Application Web (3 couches)
│
├── Couche Présentation (Frontend)
│   ├── Fichiers HTML
│   ├── Feuilles de style CSS
│   └── Scripts JavaScript
│
├── Couche Métier (Backend)
│   ├── Scripts PHP
│   └── Logique de traitement
│
└── Couche Données
    └── Base de données MySQL (THIB)
```

### Flux de l'application
```
index.html (Accueil)
    ├── Administrateur → administrateur.html → [Enregistrer/Supprimer Comptable]
    └── Comptable → comptable.html → [Connexion] → Gestion de la paie
```

---

## 📦 Prérequis

Avant d'installer l'application, assurez-vous que vous avez :

- **Serveur Web** : Apache (WAMP, XAMPP ou LAMP)
- **PHP** : Version 5.3 ou supérieure
- **MySQL** : Version 5.0 ou supérieure
- **Navigateur Web** : Chrome, Firefox, Edge, Safari (récent)
- **jQuery** : Inclus dans le projet (jquery.min.js)

### Vérification de l'environnement
```bash
# Vérifier PHP
php -v

# Vérifier MySQL
mysql -u root -p
```

---

## 🚀 Installation

### Étape 1 : Préparation du serveur
1. Assurez-vous que **WAMP** (ou XAMPP) est installé et lancé
2. Apache et MySQL doivent être actifs

### Étape 2 : Placement des fichiers
1. Copiez le dossier du projet dans le répertoire `www` de WAMP :
   ```
   C:\wamp\www\thib\
   ```

### Étape 3 : Création de la base de données
La base de données est créée **automatiquement** lors du premier enregistrement d'un comptable via le script `traitement.php`. 

Tables créées automatiquement :
- **comptable** : Stocke les informations des comptables

```sql
CREATE TABLE comptable (
    nom VARCHAR(15),
    prenom VARCHAR(15),
    sexe CHAR(1),
    age INT(2),
    code_compt CHAR(10),
    identifiant VARCHAR(11) UNIQUE
);
```

### Étape 4 : Accès à l'application
Ouvrez votre navigateur et accédez à :
```
http://localhost/thib/index.html
```

### Étape 5 : Création des premiers utilisateurs
1. **Première connexion administrateur** :
   - Utilisez l'un des codes prédéfinis (voir [Rôles et Accès](#rôles-et-accès))
   
2. **Enregistrement du premier comptable** :
   - Via le menu administrateur
   - Complétez le formulaire avec les données requises

---

## 📁 Structure du Projet

```
thib/
├── 📄 README.md                          # Ce fichier
├── 📄 index.html                         # Page d'accueil principale
├── 📄 index1.html                        # Variante index
│
├── 👤 ADMINISTRATEUR
│   ├── administrateur.html               # Menu administrateur (avec vérification PIN)
│   ├── administrateur1.html              # Formulaire d'enregistrement comptable
│   ├── administrateur1.php               # Traitement enregistrement comptable
│   ├── administrateur2.html              # Page suppression comptable
│   ├── traitement sup.php                # Logique suppression comptable
│   └── traitement sup2.php               # Traitement suppression
│
├── 💼 COMPTABLE
│   ├── comptable.html                    # Page de connexion comptable
│   ├── conect.php                        # Vérification identifiants comptable
│   ├── session.php                       # Gestion session comptable
│   └── text.php                          # Tableau de paie (référencé)
│
├── 📚 PROFESSEURS
│   ├── permanant.html                    # Enregistrement professeurs permanents
│   ├── vacataire.html                    # Enregistrement professeurs vacataires
│   ├── gestion vacataire.php             # Gestion des vacataires
│   ├── gv.php                            # Variante gestion vacataires
│   ├── vacat.html                        # Interface vacataires
│   └── inscriptin2.php                   # Traitement inscription vacataires
│
├── 📝 FORMULAIRES
│   ├── formulaire.html                   # Formulaire général d'enregistrement
│   ├── form.css                          # Styles formulaires
│   ├── form.js                           # Scripts formulaires
│   ├── form0.js                          # Scripts additionnels
│   └── traitement.php                    # Traitement principal formulaire
│   └── inscriptin.php                    # Traitement enregistrement
│
├── 🎨 STYLES ET SCRIPTS
│   ├── se1.css                           # Feuille de styles principale
│   ├── jquery.min.js                     # Bibliothèque jQuery
│   └── menu.htm                          # Menu navigation
│
├── 📄 PAGES ADDITIONNELLES
│   ├── presentation.html                 # Page présentation
│   ├── presentation1.html                # Variante présentation
│   ├── confirmation de mot de passe.html # Confirmation mot de passe
│   ├── titre.html                        # Titre application
│   ├── evolsal.html                      # Évolution salaires
│   ├── suprimer.html                     # Interface suppression
│   ├── p.html                            # Page test
│   ├── p1.php                            # Script test
│   ├── p..html                           # Page test
│   └── test0.html                        # Page test
│
├── 📊 DONNÉES TEMPORAIRES
│   ├── nom.txt                           # Stockage nom utilisateur
│   ├── sexe.txt                          # Stockage sexe utilisateur
│
├── 🖼️ RESSOURCES IMAGES
│   ├── acceuil.jpg                       # Image fond d'accueil
│   ├── logo TJ.png                       # Logo institution
│   ├── fform.jpg                         # Image formulaire
│   ├── gauche.gif                        # Flèche gauche
│   ├── gauche1.gif                       # Flèche gauche variante
│   ├── images.jpeg                       # Image générale
│   ├── ka.jpeg.webp                      # Image WebP
│   ├── kamdem.jpg.jpg                    # Photo
│   ├── tchonang.jpeg                     # Photo
│   ├── tchonang1.jpeg                    # Photo
│   └── photo/                            # Dossier photos additionnelles
│
└── 🗂️ AUTRES
    ├── photo.exe                         # Application photo (non utilisée)
    └── thib.exe                          # Application THIB (non utilisée)
```

---

## 💻 Utilisation

### 🚪 Page d'Accueil
1. Accédez à `http://localhost/thib/index.html`
2. Choisissez votre rôle :
   - **Administrateur** : Gestion du système
   - **Comptable** : Gestion de la paie

### 👨‍💼 Mode Administrateur

#### Accès :
1. Cliquez sur "Administrateur" depuis l'accueil
2. Entrez l'un des codes PIN autorisés
3. Codes disponibles : 
   ```
   setphCoop
   StephCoop
   90210
   tchonang
   herman
   THIB
   ```

#### Tâches disponibles :
- **Enregistrer un comptable** : Accédez à `administrateur1.html`
  - Remplissez le formulaire avec :
    - Nom et Prénom
    - Sexe et Âge
    - Code comptable
    - Identifiant unique
  
- **Supprimer un comptable** : Accédez à `administrateur2.html`
  - Saisissez l'identifiant du comptable à supprimer

### 💼 Mode Comptable

#### Connexion :
1. Cliquez sur "Comptable" depuis l'accueil
2. Entrez vos identifiants :
   - **Nom** : Nom enregistré dans la base de données
   - **Identifiant** : Identifiant unique attribué

#### Tâches disponibles :
- Consulter les informations de paie
- Gérer les professeurs
- Accéder à l'historique de paie

---

## 👥 Rôles et Accès

### 1️⃣ Administrateur
| Fonction | Accès | Description |
|----------|-------|-------------|
| Enregistrement Comptable | ✅ | Ajouter nouveaux comptables |
| Suppression Comptable | ✅ | Retirer comptables du système |
| Gestion Professeurs | ⚠️ | Limité |
| Consultation Paie | ❌ | Non accessible |

**Authentification** : Code PIN (6 codes disponibles)

### 2️⃣ Comptable
| Fonction | Accès | Description |
|----------|-------|-------------|
| Enregistrement Comptable | ❌ | Non autorisé |
| Suppression Comptable | ❌ | Non autorisé |
| Gestion Professeurs | ✅ | Accès complet |
| Consultation Paie | ✅ | Lecture seule |

**Authentification** : Identifiant + Mot de passe (Base de données)

### 3️⃣ Professeur (Futur)
- Permanents : Gestion par comptable
- Vacataires : Enregistrement autonome

---

## 🔒 Sécurité

### Points actuels
✅ **Implémentés** :
- Authentification par identifiant pour comptables
- Contrôle d'accès administrateur par code PIN
- Identifiants uniques pour comptables
- Stockage de sessions utilisateur

⚠️ **À améliorer** :
- **Pas de hachage de mots de passe** : Les codes PIN sont en clair dans le HTML
- **Pas de chiffrement** : Données transmises sans HTTPS
- **Injection SQL** : Code vulnérable (utilisation de `mysql_*` obsolète)
- **Stockage insécurisé** : Données sensibles dans fichiers `.txt`
- **Pas de validation côté serveur** : Peu de vérification des données
- **Session faible** : Gestion basique des sessions

### Recommandations de Sécurité

#### Courte terme :
```php
// ✅ Utiliser mysqli_prepare pour éviter les injections SQL
$stmt = $mysqli->prepare("SELECT identifiant FROM comptable WHERE nom = ? AND identifiant = ?");
$stmt->bind_param("ss", $nom, $identifiant);
$stmt->execute();

// ✅ Hacher les codes PIN
password_hash($code, PASSWORD_BCRYPT);

// ✅ Utiliser HTTPS en production
// ✅ Valider et nettoyer les entrées utilisateur
// ✅ Utiliser des sessions sécurisées
```

#### Longue terme :
- Migrer vers **MySQLi** ou **PDO**
- Implémenter **HTTPS/SSL**
- Ajouter **2FA** (authentification double)
- Utiliser un **gestionnaire de sessions robuste**
- Implémenter **CSRF tokens**
- Ajouter **logging et audit**

---

## ⚠️ Points à Améliorer

### 🐛 Bugs et Problèmes Identifiés

#### 1. **Extension MySQL obsolète**
```php
// ❌ Obsolète et non sécurisé
mysql_connect();
mysql_select_db();
mysql_query();

// ✅ À utiliser
mysqli_connect();
mysqli_select_db();
mysqli_query();
// Ou utiliser PDO
```

#### 2. **Injection SQL**
```php
// ❌ Vulnérable
$donne="select nom,identifiant from comptable where nom='$nom' and identifiant='$identifiant'";

// ✅ Sécurisé (préparé)
$stmt = $mysqli->prepare("SELECT nom, identifiant FROM comptable WHERE nom = ? AND identifiant = ?");
```

#### 3. **Codes PIN en clair**
```javascript
// ❌ Exposé en HTML
pass=["setphCoop","StephCoop","90210","tchonang","tocli","THIB"];

// ✅ À stocker en base de données
```

#### 4. **Stockage de données sensibles en fichiers texte**
```php
// ❌ Non sécurisé
file_put_contents('nom.txt', $_POST['nom']);
file_put_contents('sexe.txt', $sx);

// ✅ Utiliser les sessions
$_SESSION['nom'] = $_POST['nom'];
$_SESSION['sexe'] = $sx;
```

#### 5. **Pas de validation des données**
- Vérifier les types et longueurs
- Nettoyer les entrées HTML/JavaScript
- Valider les formats de données

#### 6. **Interface utilisateur**
- Design dépassé
- Pas de responsive design
- Pas d'accessibilité (WCAG)
- Messages d'erreur peu explicites

### 📋 Checklist d'Amélioration

- [ ] Migrer MySQL → MySQLi/PDO
- [ ] Implémenter HTTPS
- [ ] Hacher les mots de passe/PIN
- [ ] Ajouter validation côté serveur
- [ ] Utiliser les sessions PHP proprement
- [ ] Refonte UI/UX (Bootstrap, Tailwind)
- [ ] Ajouter tests unitaires
- [ ] Documentation API
- [ ] Logging des actions
- [ ] Gestion des erreurs améliorée
- [ ] Responsive design
- [ ] 2FA pour administrateur

---

## 🛠️ Technologies Utilisées

### Frontend
| Technologie | Version | Utilisation |
|------------|---------|-----------|
| **HTML5** | 5 | Structure des pages |
| **CSS3** | 3 | Styles et mise en page |
| **JavaScript** | ES5 | Interactivité client |
| **jQuery** | 1.x/3.x | Manipulation DOM |

### Backend
| Technologie | Version | Utilisation |
|------------|---------|-----------|
| **PHP** | 5.3+ | Logique serveur |
| **MySQL** | 5.0+ | Base de données |
| **Apache** | 2.x | Serveur web |

### Environnement Local
| Outil | Rôle |
|------|------|
| **WAMP** | Stack web local |
| **phpMyAdmin** | Gestion base de données |

### Stack Complète
```
WAMP Stack
├── Windows (Système d'exploitation)
├── Apache 2.4 (Serveur web)
├── MySQL 5.7 (Base de données)
└── PHP 7.x (Langage serveur)
```

---

## 🤝 Contribution et Support

### Signaler un Bug
1. Vérifiez que le bug n'existe pas déjà
2. Décrivez précisément le problème
3. Fournissez les étapes de reproduction
4. Indiquez l'environnement (PHP, MySQL, navigateur)

### Suggestions d'Amélioration
- Ouverture à toute suggestion
- Priorité donnée à la sécurité
- Focus sur l'UX utilisateur

---

## 📄 Licence

Ce projet est destiné à un usage interne au sein de l'institution éducative. Tous droits réservés.

---

## 👤 Auteur

**Développé par** : Équipe de développement  
**Institution** : [À compléter]  
**Date de création** : [À compléter]  
**Dernière mise à jour** : 13 novembre 2025

### Contacts
- **Email** : [À compléter]
- **Téléphone** : [À compléter]
- **Support** : [À compléter]

---

## 📞 Support et Maintenance

### Problèmes Courants

#### Q: La connexion à MySQL échoue
**R:** Vérifiez que :
1. MySQL est lancé
2. Les identifiants sont corrects (défaut : root, pas de mot de passe)
3. La base de données `thib` existe

#### Q: Le fichier formulaire ne s'enregistre pas
**R:** Vérifiez que :
1. Tous les champs sont remplis
2. L'identifiant n'existe pas déjà
3. Les permissions du dossier sont correctes

#### Q: L'administrateur ne peut pas se connecter
**R:** Vérifiez que :
1. Vous entrez l'un des 6 codes autorisés exactement
2. La casse est respectée
3. Les espaces ne sont pas à l'origine du problème

### Maintenance Régulière

```bash
# Sauvegarder la base de données
mysqldump -u root thib > backup_thib.sql

# Vérifier l'intégrité des données
mysql -u root thib < backup_thib.sql

# Nettoyer les fichiers temporaires
rm nom.txt sexe.txt
```

---

## 🗺️ Feuille de Route Future

### Version 2.0
- [ ] Refonte UI/UX moderne
- [ ] Authentification OAuth2
- [ ] API REST
- [ ] Dashboards analytiques
- [ ] Export PDF/Excel

### Version 3.0
- [ ] Gestion multi-établissements
- [ ] Mobile app
- [ ] Intégration comptabilité
- [ ] Automatisation paie

---

**Document généré le : 13 novembre 2025**  
**Pour toute question, contactez l'équipe d'administration système**
