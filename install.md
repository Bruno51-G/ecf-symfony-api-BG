# Créer un projet d'API Rest avec Symfony 

## Étapes 
- Créer le container Docker
    - Serveur Web avec PHP et certains outils préinstallés
    - Base de données
- Installer Symfony dans le container
- Tester l'installation
- Installer les dépendances nécessaires à un projet de type API Rest
- Configurer l'API
- Tester l'API
- Créer une application frontend utilisant l'API
- Tester l'application frontend

## Préparation

1. En local, créer un répertoire **vide**
2. Dans ce répertoire, copier les fichiers suivants :
    - [docker-compose.yml](./docker-compose.yml)
    - [Dockerfile](./Dockerfile)
    - [conf/000-default.conf](./conf/000-default.conf)
    - Structure de fichiers attendue : 
        - VotreRepertoire/
            - conf/
                - 000-default.conf
            - docker-compose.yml
            - Dockerfile
3. Dans un terminal Se positionner dans le répertoire
4. Exécuter la commande `docker compose up -d --build`
    voir les conteneurs `docker ps`
    entrer dans le conteneur `docker exec -it (nom du conteneur) bash`

## Dockerfile 

## docker-compose.yml 

## conf/000-default.conf

Après avoir exécuté la commande `docker compose up`, le container est créé et lancé.

pour voir les conteneurs: `docker ps`

pour entrer dans le conteneur: `docker exec -it (nom du conteneur) bash`

1. Accéder au terminal du container web (myapi-symfony-2503-apache2)
2. Se positionner sur le chemin '/var/www/html' --> entrer dans le conteneur docker exec -it (nom du conteneur) bash
    - Bien vérifier qu'il est vide (le vider si nécessaire) `ls -a`
3. Lancer l'installation de Symfony
    - `composer create-project symfony/skeleton:"8.0.*" .`
    - (Pensez à bien mettre le . à la fin de la commande (. = répertoire courant))
4. Patienter...

L'installation de Symfony est terminée

- Accéder à l'url http://127.0.0.1:8000
- Vous devriez voir la page par défaut de Symfony.

## Installation des dépendances Symfony


composer require api 


Cette commande va installer les dépendances nécessaires pour un projet d'API Rest.

Une fois les dépendances installées, accéder à l'url [http://localhost:8000/index.php/api/](http://localhost:8000/index.php/api/). Vous devriez voir une page ayant pour titre "Hello API Platform.

Le projet étant destiné à n'accueillir qu'une API, nous allons le configurer pour que l'adresse de base [http://localhost:8000/](http://localhost:8000/) pointe directement sur l'API.

Ouvrir le fichier `myapi/config/routes/api_platform.yaml`

Puis commenter la ligne `prefix: /api` en la prefixant avec un hashtag comme ceci : `# prefix: /api`.

mettre formats:
        json: ['application/json'] 
en dessous de title attention à ne pas oublier la tabulation pour json: ['application/json']


# Configurer et créer la base de données

Ouvrir le fichier `myapi/.env`

Commenter la ligne `DATABASE_URL="postgre.....

et ajouter en dessous la ligne suivante : 

`DATABASE_URL="mysql://user:user@db:3306/db_myapi?serverVersion=11.8.5-MariaDB&charset=utf8mb4"`

Direction le terminal du conteneur Web :

```bash
cd /var/www/html
php bin/console doctrine:database:create
```

## Créer la 1ère entité.

```bash
cd /var/www/html
composer require symfony/maker-bundle --dev
php bin/console make:entity
```

## Sauvegarder les changements

```bash
cd /var/www/html
php bin/console make:migration
php bin/console doctrine:migrations:migrate
```

# Autres commandes de migrations : 

```bash
# Afficher la version de la migration en cours
php bin/console doctrine:migrations:current   
# Afficher la version de la dernière migration  
php bin/console doctrine:migrations:latest   
# Afficher la liste de toutes les migrations et leurs statuts  
php bin/console doctrine:migrations:list     
# Afficher des informations sur l'état actuel des migrations et autres   
php bin/console doctrine:migrations:status      
