# Comment utiliser des outils d'analyseurs statiques de code (Linters) et configurer une intégration continue (CI)

## Description

Ce projet vise à expliquer comment utiliser les linters et configurer une intégration continue dans votre projet. C'est un très bon moyen d'apprendre à installer et utiliser correctement des outils d'analyseurs statiques de code et de pouvoir configurer des pipelines.

## Pré-requis

- PHP 8.2
- Composer 2.5.5

## Installation du projet

Pour obtenir une copie locale et la faire fonctionner, suivez les étapes suivantes :

1. Clonez le projet avec la commande suivante :
   ```bash
   git clone https://github.com/Sam-rst/WebAppTMASMART.git
   ```

2. Dirigez-vous dans à la racine du projet dans un terminal
   ```bash
   cd WebAppTMASMART
   ```

3. Installer les dépendances Composer du fichier [./composer.json](./composer.json) en effectuant la commande suivante :
   ```bash
    composer install
   ```

4. Si vous souhaitez installer d'autres dépendances ou être sûr que les outils sont bien installés :
   ```bash
    composer require phploc/phploc
    composer require squizlabs/php_codesniffer
    composer require phpmd/phpmd
   ```

Votre installation est maintenant terminée !

## Lancement du serveur PHP en local

Pour lancer le serveur PHP et faire fonctionner l'application, veuillez exécutez cette commande :
   ```bash
   php -S localhost:8000 -t src
   ```

Cela va lancer le serveur depuis le répertoire [src/](src/) qui est le coeur même de l'application.

## Fonctionnement de l'application

L'application est divisé en plusieurs pages :
- La __page d'accueil__ : [src/index.php](src/index.php) qui liste toutes les annonces.
- La page permettant d'__ajouter des annonces__ : [src/add_post.php](src/add_post.php) qui sont stockées non pas dans une BDD mais dans un fichier json : [data/posts.json](data/posts.json).
- La page permettant de __modifier une annonce__ : [src/edit_post.php](src/edit_post.php) selon l'id de l'annonce que l'on récupère depuis une requête GET.
- La page __à propos__ : : [src/about.php](src/about.php).
- La page __Contact__ qui permet de contacter le gérant du blog : [src/contact.php](src/contact.php) (Non fonctionnel).

## Fonctionnement des outils d'analyseurs statiques de code

Pour utiliser l'outil [phploc](https://github.com/sebastianbergmann/phploc) qui permet de mesurer la taille d'un projet PHP et en connaître des statistiques sur la qualité du code :
```bash
# Se diriger dans la racine du projet
php ./vendor/bin/phploc src
```

Pour utiliser l'outil [phpmd](https://github.com/phpmd/phpmd) qui est projet dérivé de PHP Depend et vise à être l'équivalent PHP de l'outil Java bien connu PMD. PHPMD peut être considéré comme une application frontend conviviale pour le flux de données brutes mesurées par PHP Depend :
```bash
# Se diriger dans la racine du projet
php ./vendor/bin/phpmd src format ruleset
```

Pour utiliser l'outil [phplcs](https://github.com/sebastianbergmann/phploc) qui permet de tokeniser les fichiers PHP, JavaScript et CSS et de détecter les violations d'un ensemble défini de normes de codage. :
```bash
# Se diriger dans la racine du projet
php ./vendor/bin/phpcs src
```

## Mise en place d'une intégration continue avec GitHub Actions (CI)

Pour créer un workflow CI, vous pouvez suivre les étapes suivantes :
1. Créer un dossier [.github/workflows/](.github/workflows/) à la racine du projet :
   ```bash
   mkdir .github/workflows/
   ```
2. Créer un fichier [ci.yml](.github/workflows/ci.yml) dans [.github/workflows](.github/workflows) :
   ```bash
   cd .github/workflows/
   touch ci.yml
   ```
3. Insérer le code suivant : 
   ```yml
   name: CI

   on: [push, pull_request]

   jobs:
   build:
      runs-on: ubuntu-latest
   
      steps:
         - uses: actions/checkout@v2
         - name: Set up PHP
         uses: shivammathur/setup-php@v2
         with:
            php-version: '7.4'
         - name: Install dependencies
         run: composer install --prefer-dist --no-progress --no-suggest
         - name: Run PHPMD
         run: vendor/binphpmd src/ text cleancode,codesize
         - name: Run PHPCS
         run: vendor/bin/phpcs --standard=PSR12 src/
   ```

4. Le prochain push executera la pipeline