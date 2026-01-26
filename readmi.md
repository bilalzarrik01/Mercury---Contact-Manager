## Projet - Application de gestion de contacts (Laravel)

Application web Laravel pour gerer des contacts regroupes par groupes. Le projet illustre l'architecture MVC, Eloquent ORM, les relations, la validation et les vues Blade.

## Technologies / contraintes

- Laravel (MVC)
- Eloquent ORM
- Base de donnees relationnelle (MySQL ou SQLite)
- Relations Eloquent : hasMany / belongsTo
- Validation des formulaires
- Blade Templates

## User Stories et criteres d'acceptation

### US-01 - Creer un groupe
- Formulaire de creation de groupe
- Groupe enregistre en base de donnees
- Liste des groupes visible
- Nom du groupe obligatoire

### US-02 - Modifier / supprimer un groupe
- Modifier le nom d'un groupe
- Supprimer un groupe
- Suppression geree proprement (contacts associes geres ou supprimes)

### US-03 - Ajouter un contact
- Formulaire avec :
  - Nom
  - Email
  - Telephone
  - Groupe (liste deroulante)
- Validation des champs
- Contact enregistre en base de donnees

### US-04 - Voir la liste des contacts
- Liste des contacts affichee
- Affichage du groupe associe a chaque contact
- Vue Blade avec boucle @foreach

### US-05 - Modifier un contact
- Formulaire pre-rempli
- Possibilite de changer le groupe
- Mise a jour enregistree en base

### US-06 - Supprimer un contact
- Bouton de suppression
- Confirmation implicite ou explicite
- Contact supprime de la base de donnees

### US-07 - Filtrer les contacts par groupe
- Selection d'un groupe
- Affichage uniquement des contacts lies a ce groupe
- Utilisation de la relation Eloquent ($group->contacts)

### US-08 - Rechercher un contact
- Champ de recherche par nom
- Recherche insensible a la casse
- Resultats mis a jour apres soumission du formulaire
- Utilisation d'une requete Eloquent (where / like)

### US-09 - Messages flash
- Message de succes apres :
  - creation
  - modification
  - suppression
- Message d'erreur en cas d'echec
- Messages visibles dans les vues Blade

## Relations Eloquent attendues

- Group
  - hasMany(Contact::class)
- Contact
  - belongsTo(Group::class)

## UML (obligatoire)

### Diagramme de cas d'utilisation
- Acteur : Utilisateur
- Cas principaux :
  - Gerer les groupes
  - Gerer les contacts
  - Associer un contact a un groupe
  - Filtrer les contacts

### Diagramme de classes
- Entites principales :
  - Group
  - Contact
- Documenter les relations, attributs et methodes principales
