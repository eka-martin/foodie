<?php 
// IRL $db = new PDO('mysql:host=sql.hebergeur.com;dbname=mabase;charset=utf8', 'pierre.durand', 's3cr3t');
// ?> 

<?php

const MYSQL_HOST = 'localhost';
const MYSQL_PORT = 3306;
const MYSQL_NAME = 'we_love_food';
const MYSQL_USER = 'root';
const MYSQL_PASSWORD = 'root';

try {
    $mysqlClient = new PDO(
        sprintf('mysql:host=%s;dbname=%s;port=%s', MYSQL_HOST, MYSQL_NAME, MYSQL_PORT),
        MYSQL_USER,
        MYSQL_PASSWORD
    );
    $mysqlClient->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(Exception $exception) {
    die('Erreur : '.$exception->getMessage());
}

// Si tout va bien, on peut continuer

// On récupère tout le contenu de la table recipes
// On ne concatène JAMAIS une requête SQL pour passer des variables, au risque de créer des injections SQL !
$sqlQuery = "SELECT * FROM recipes WHERE author = :author AND is_enabled = :is_enabled";
$recipesStatement = $mysqlClient->prepare($sqlQuery);
$recipesStatement->execute([
    'author' => $_GET['author'],
    'is_enabled' => true,
]);
$recipes = $recipesStatement->fetchAll();

// On affiche chaque recette une à une
foreach ($recipes as $recipe) {
?>
    <p><?php echo $recipe['title']; ?></p>
<?php
}
?>