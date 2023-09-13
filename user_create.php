<?php
session_start();

include_once('./../config/mysql.php');
include_once('./../config/user.php');
include_once('./../variables.php');

// Vérification du formulaire soumis
if (
    !isset($_POST['email']) 
    || !isset($_POST['password'])
    || !isset($_POST['age'])
    || !isset($_POST['full_name'])
    )
{
	echo 'Il faut tout l\'information pour créer un compte';
    return;
}	

$email = $_POST['email'];
$password = $_POST['password'];
$age = $_POST['age'];
$full_name = $_POST['full_name'];

// Faire l'insertion en base
$insertUser = $mysqlClient->prepare('INSERT INTO users(email, password, full_name, age) VALUES (:email, :password, :full_name, :age)');
$insertUser->execute([
    'email' => $email,
    'password' => $password,
    'full_name' => $full_name,
    'age' => $age,
    
]) or die(print_r($db->errorInfo()));

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de Recettes - Création de recette</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
        rel="stylesheet"
    >
</head>
<body class="d-flex flex-column min-vh-100">
    <div class="container">

    <!-- MESSAGE DE SUCCES -->
    <?php include_once($rootPath.'/header.php'); ?>
        <h1>L'utilisateur est crée avec succès !</h1>
        
         </div>
    <?php include_once($rootPath.'/footer.php'); ?>
</body>
</html>