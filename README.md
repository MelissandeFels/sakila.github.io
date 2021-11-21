# sakila.github.io

Explication du projet : <br>
Ce projet est dans le cadre d'un examen professionnel continu dans la formation Développement Web et Web mobile.<br>
Le but est de réaliser un site qui propose la consultation et la réservation de films.
<br><br>
Les outils utilisés :<br>
PHP, MySQL Workbench, Bootstrap, Visual Studio
<br><br>
Comment lancer le projet ? <br>
Le site est lancé depuis le serveur web xampp (ou mampp) selon votre système d'exploitation.
<br><br>
Les pages du site : <br>
- La page d'authentification : permet au staff de se connecter au site afin qu'il gére les réservations des clients.<br>
Cette page récupère un identifiant et un mot de passe qui permettent de vérifier l'identitité du staff.<br>
Dans la base de données, le staff ne possède aucun mot de passe. J'ai du faire un 'UPDATE' sur le champ 'password' de la table 'staff'.<br>
- La page 'home' (ou 'index.php') : il faut savoir qu'il existe 2 magasins qui possède des films sur le site de Sakila. Un staff appartient donc à un magasin. Une fois le staff identifié, il est redirigé vers la page 'home' du magasin 1 ou 2 du site.<br> 
Sur cette page, il possède une vue d'ensemble des films, un menu d'entête composé de 4 boutons :
- 'Logout' : qui permet au staff de se déconnecter,<br>
- 'Rental of customer' : qui permet de voir les réservations effectuées et calculées ce jour pour un client donné.<br>
- 'Search rental' : qui permet de rechercher les réservations par dates (date de début et date de fin).<br>
- 'Customers information' : qui concerne principalement les informations des clients (en cours d'amélioration pour les boutons ajouter, supprimer et modifier les informations d'un client).<br>
<br><br>
A partir de la page 'home' (ou 'index.php'), je vais pouvoir réserver un film pour un client (l'ajout du client est en cours d'amélioration) ou voir les informations du film (en cours).<br>
Le staff a éventuellement, la possibilité de rechercher un film à partir de la catégorie et du titre (une barre de recherche est proposée pour cela).<br>
<br><br>
Ce que je souhaite améliorer ?<br>
- La session utilisateur : Pour le moment, j'ai effectué une session pour le staff et non pour le client. Je souhaite que le client puisse avoir accès au site dans un système d'authentification où il pourra effectuer, lui-même, la sélection de ses films car, actuellement, c'est la staff qui choisi pour le client. Ainsi, si le client sélectionne ses films, le staff n'aura qu'une vue d'ensemble des réservations, des informations des clients ou pour un client, des retards de réservations (rendu du film au magasin),..<br>
- Vérification de l'identifiant et du mot de passe : en fonction des données de la base lors de l'authentification, je souhaite comparer les informations entrées dans les champs de saisies et les informations en base de données afin de rendre le site plus sécurisé.<br>
- Une option 'Inscription' : au site par le client (ou le staff si nouveau dans un magasin).
- La date de retour : lors de l'insertion d'une réservation, la date de retour ('return_date') me renvoie ceci '2021-11-23 00:00:00'. Cela est en voie de modification.<br>
- Les 'select option' de la vue de réservation d'un film : je souhaite effectuer des conditions qui bloquent la sélection du même identifiant.<br>
- Les boutons 'add(+), supp(x), update(/..)' de la vue 'Customers information' : ils sont en cours de modifications et ne sont pas fonctionnels pour le moment. Je récupère seulement les clients dans cette vue.<br>
<br><br>
Difficultés rencontrées :<br>
La compréhension de la base de données 'Sakila' fournit, fut complexe. Cette partie est considérée comme essentielle à la mise en oeuvre du site. Cela m'a pris pas mal de temps à comprendre.<br>
La création du site devait correspondre avec la structure de la base. Cette partie fut complexe dans le sens où il fallait décider à quel moment je vais retrouver l'identifiant utilisateur (customer_id) sur le site, l'identifiant de l'inventaire (inventory_id), le magasin (store_id) et ainsi de suite. Par ailleurs, la conception du site pourait être améliorée dans une nouvelle version (à voir).<br>
<br><br>
Je vous remercie de votre attention.
