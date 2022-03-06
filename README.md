# 3A-MOC-DOCKER-
# Dockerize Everything! - Groupe 1
## Projet ESGI de 3ème année MOC
### Par Kilian CASSAIGNE, Sarah KOUTA-LOPATEY, Théo TORRES DA COSTA

## Sujet choisi
Sujet #2 : Application web

## Les outils utilisés
**Base de données** : MariaDB

**Langages utilisés** : PHP, MySQL

**pas de framework employé** suite à des problèmes fonctionnels avec Symfony.

## Instructions de fonctionnement de la base de données

Dans le conteneur MariaBD (image majestyk/bd), la base de données n'est pas installée par defaut. 

Pour l'installer, il faut : 
* se déplacer dans le répertoire
```
cd /var/lib/mysql/import
```
 
* Exécuter la commande :
```
mysql -u root -proot
```

* puis :
```
CREATE DATABASE bibliotheque;
```
* Sortir de MariaDB en pressant la touche **CTRL** et **C** en simultanée.
* Exécuter la commande :
```
mysql -u root -proot bibliotheque < import.sql
```

La base de données est à présent installée dans MariaDB.
