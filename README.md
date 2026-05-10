# 🎓 EDU-KIDS — Plateforme Éducative pour Enfants

[![Laravel](https://img.shields.io/badge/Laravel-11-red?logo=laravel)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.x-blue?logo=php)](https://php.net)


> Site web éducatif interactif destiné aux enfants du préscolaire et du primaire. Il propose des leçons, des quiz et des jeux ludiques pour faciliter l'apprentissage de manière amusante et engageante.

---

## ✨ Fonctionnalités

### 🔐 Authentification & Administration
- Inscription et connexion sécurisées
- Tableau de bord administrateur
- Gestion des niveaux et des catégories

### 🧒 Section Préscolaire
- **Alphabet** — apprentissage des lettres avec quiz
- **Chiffres** — reconnaissance des nombres avec quiz
- **Formes** — cercle, triangle, rectangle... avec audio et quiz
- **Couleurs** — identification des couleurs avec quiz

### 📚 Section Primaire
- **Animaux** — vocabulaire illustré + quiz
- **Fruits** — apprentissage visuel + quiz
- **Légumes** — fiches illustrées + quiz
- **Transport** — moyens de transport + quiz
- **Corps humain** — parties du corps + quiz
- **Fournitures scolaires** — vocabulaire de classe + quiz

### 🎮 Jeux Éducatifs
- **Memory** — jeu de mémoire par paires
- **Puzzle** — assemblage d'images
- **Drag & Drop** — glisser-déposer interactif

---

## 🛠️ Technologies utilisées

| Technologie | Usage |
|-------------|-------|
| **Laravel 11** | Framework PHP backend |
| **Blade** | Moteur de templates frontend |
| **MySQL** | Base de données |
| **Vite** | Bundler JS/CSS |
| **JavaScript** | Interactivité (jeux, quiz) |

---

## 🚀 Installation

### Prérequis
- PHP >= 8.1
- Composer
- Node.js & npm
- MySQL

### Étapes

```bash
git clone https://github.com/meryem-chamlali/EDU-KIDS-Laravel.git
cd EDU-KIDS-Laravel
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate
npm run dev
php artisan serve
```



---


<p align="center">Réalisé avec ❤️ dans le cadre d'un projet académique</p>
