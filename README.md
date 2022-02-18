# Projet cube 1 - Groupe 1

Le Ministère des Solidarités et de la Santé souhaite une application mobile et un site web afin de proposer des ressources et outils pour à la fois créer, renforcer et enrichir les relations des citoyens en accord avec les autres ministères. 

(Scénario fictif )

## Objectif du projet

Permettre au Ministère des Solidarités et de la Santé, d’avoir une plateforme accessible à tous les citoyens peu importe leurs âges, situations sociales, ou origines. 

L’objectif étant d’améliorer la qualité de vie ainsi que de bâtir des liens relationnels de qualité entre les citoyens. 

Cette plateforme va devoir rendre accessible diverses ressources pour les usagers. 

La plateforme devra inclure un catalogue avec différentes sections en fonction du type de la ressources, ou de son contenue (catégories). 

Elle devra permettre à ces utilisateurs de créer, modifier & supprimer leurs ressources. 

De plus les citoyens auront la possibilité de partager leurs ressources avec les autres citoyens ou même de la rendre publique. 

## Documentation

[Lien vers la doc ici ]

## Créer la base de donnée

```bash
php artisan migrate:fresh --seed 
```

## Naviguer sur le site
Accueil 
```
Front office    <base URL>
```


Authentification
```
Connexion       <base URL>/connexion
Inscription     <base URL>/inscription
Deconnexion     <base URL>/deconnexion
```

Page utilisateur
```
Mon compte      <base URL>/compte/mon-profil
```

Les ressources
```
Consulter       <base URL>/ressources/{id}
Créer           <base URL>/ressources/creer
Modifier        <base URL>/ressources/modifier/{id}
Supprimer       <base URL>/ressources/supprimer
```

## Contribution
Le projet cube1 est un projet a titre éducatif vous êtes libre de le cloner et de faire ce que vous voulez avec mais aucune amélioration ne seras accepter. 

## License
[MIT](https://choosealicense.com/licenses/mit/)
