# ecf-symfony-entities

## API Rest avec Symfony

**Objectif :** 
    - Configurer un environnement de développement.
    - Développer des composants métier.

**Durée estimée :** 1h30

### 1. Préparation de l'environnement

Faites un FORK de ce dépôt et nommez le "ecf-symfony-api-XX" (remplacez XX par vos initiales).

Utilisez le fichier `docker-compose.yml` fourni pour créer les conteneurs.

Démarrez le conteneur et installez un nouveau projet Symfony via Composer.

### 2. Configuration et Dépendances

* Configurez votre fichier `.env` pour lier Symfony à la base de données MariaDB.
    * Les paramètres de la base de données sont visibles dans le fichier `docker-compose.yml`.
* Installez le package **API Platform**.
* Configurer **API Platform** pour que l'adresse de base http://localhost/ pointe directement sur l'API


### 3. Création de l'Entité

Créez l'entité **Legume** qui doit être exposée en tant que ressource API. 

Les attributs requis sont :

| Attribut | Signification | Type |
| :--- | :--- | :--- |
| **id** | identifiant du légume | Integer (Auto-incrément) |
| **name** | nom du légume | String (32) |
| **variety** | variété du légume | String (64) |
| **primaryColor** | couleur principale du légume | String (50) |
| **lifeTime** | durée de conservation en jours | Integer |
| **price** | prix au kilo | Float / Decimal |


### 4. Persistance et Test

* Générez et exécutez la migration pour créer la table en base de données.
* Accédez à l'interface Swagger.
* Ajoutez les 3 légumes suivants via une requête `POST`.
    - Pour chaque requête, faire une capture d'écran de la réponse de l'API et la déposer dans le répertoire "screenshots" du dépôt.

| name | variety | primaryColor | lifetime | price |
| :--- | :--- | :--- | :--- | :--- |
| Apple | Golden | Green | 90 | 1.99 |  
| Kiwi | Hayward | Green | 40 | 2.45 |  
| Pineapple | Victoria | yellowgreen | 20 | 3.99 |  

* Accéder à la base de données et faires une capture d'écran des données de la table puis la déposer dans le répertoire "screenshots" du dépôt.


### 5. Procédure

Créer un fichier `INSTALL.md` à la racine du dépôt et y mettre votre procédure d'installation de Symfony (création du conteneur, installation, ajout d'api platform)

### 6. Sauvegarde

COMMIT + Push puis envoyer le lien de votre dépôt **par email** à l'évaluateur.

---

### Critères d'évaluation
* Conteneur et Symfony fonctionnels.
* Configuration correcte de la base de données.
* Entité `Legume` conforme et correctement annotée pour l'API.
* Migration effectuée sans erreur.
* Captures d'écrans déposées dans le répertoire screenshots.
* Présence des données en base via les tests API.
