## Site DinoVert par Louis TOTAIN

<p>
Ce site a pour but d'évaluer mes compétences acquises en Laravel en licence pro CDA depuis le début de l'année.
</p>

<p>
Ce site est un site de vente Immobilière assez spécial car on peut y vendre : </p>

<p>- Des Maisons,</p>
<p>- Des Appartements,</p>
<h5>- Et des Enclos à dinosaures.</h5>

<br>
<p>On peut aussi y consulter des articles.</p>
<br>

<p>
Il est constitué d'une partie client/visiteur et d'une partie administration accessible sur "/login" avec cet identifiant/mot de passe :
</p>

<p>- admin@gmail.com</p>
<p>- password</p>


## Installation

Copier/coller "https://github.com/louistotain/DinoVert.git" puis cloner le repository.

Ensuite créer une table ayant le nom de votre variable d'environnement "DB_DATABASE" dans le .env.

Enfin, lancer la commande "composer install" puis une fois fini "npm run dev". Il ne reste plus cas faire
les migrations et le seeder avec "php artisan migrate:refresh --seed"

Vous pouvez maintenant lancer et profiter du site avec "php artisan serve" !






