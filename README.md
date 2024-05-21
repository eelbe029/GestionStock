# **Gestion de stock Informatique**

## **Objets/Attributs:**

- Articles :
    1. Ordinateur
    2. Ecran
    3. Imprimante
    4. Scanner
    5. Téléphone
    6. Switch
    7. Souris
    8. Clavier
    9. Disque
    10. Routeur
    11. Cable RJ45
    12. Onduleur

**Attributs** : Modèle de l’article, Marque de l’article, Date de création, Etat (commande, en stock ou assigne)

- Emplacement (La personne et/ou le département auquel un article est assigne)

**Attributs** : Nom de la personne, Nom du département

Quantité est un attribut qui sera calcule dynamiquement prenant en compte le nombre d’articles sorti du stock et d’articles présent actuellement dans le stock

**Schéma relation-entité de la base qui sera utilisée:**

<a href="#"><img src="https://i.ibb.co/bJjN5sP/Capture-d-cran-2024-05-21-121511.png" alt="Schema Relactionnel"></a>

## **Fonctionnalité Principales:**

- Fenêtre d’entrée :
    1. Permets d’entrer un nouvel article en tant que « commande » ou « en stock ».
    2. Permets de transitionne l’état d’un objet de « commande » a « en stock ».
    3. Permets de déclarer le retour d’un article sorti au stock.
- Fenêtre de sortie :
    1. Permets d’assigner un article a un département/un personnel.
    2. Permets la suppression d’un article du stock.
- Vue sur le stock entrant:
  - Permet de voir l’entièreté du stock entré pour chaque année.
- Vue sur le stock sortant :
  - Permets de voir l’entièreté du stock que l’on a sorti du stock entrant pour chaque année.
- Vue sur l’état du stock :
  - Permets de voir l’état du stock actuel (stock entrant moins stock sortant) ainsi que la quantité encore disponible de chaque type d’article et la quantité sortie du stock de chaque article.
- Vue sur l’article individuel :
  - Permets de voir un article individuel, tous ses détails et attribut ainsi que son assignation, date d’assignation et historique d’assignation.
