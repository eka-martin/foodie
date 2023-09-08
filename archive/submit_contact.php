<?php

if (
    (!isset($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
    || (!isset($_POST['message']) || empty($_POST['message']))
) {
    echo ('Il faut un email et un message pour soumettre le formulaire.');

    // Arrête l'exécution de PHP
    return;
}

$email = $_POST['email'];
$message = $_POST['message'];

?>

<!-- L'ENVOI D'IMAGE  -->

<?php
$dossier = 'uploads/';
$fichier = basename($_FILES['screenshot']['name']);
// On renomme le fichier avec la fonction uniqid
$nouveaunom = uniqid(basename($_FILES['name']));
// Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
if (isset($_FILES['screenshot']) && $_FILES['screenshot']['error'] == 0) {
    // Testons si le fichier n'est pas trop gros
    if ($_FILES['screenshot']['size'] <= 1000000) {
        // Testons si l'extension est autorisée
        $fileInfo = pathinfo($_FILES['screenshot']['name']);
        $extension = $fileInfo['extension'];
        $allowedExtensions = ['jpg', 'jpeg', 'gif', 'png'];
        if (in_array($extension, $allowedExtensions)) {

                        // On peut valider le fichier et le stocker définitivement
                        move_uploaded_file($_FILES['screenshot']['tmp_name'], $dossier.$nouveaunom.'.'.$extension);
                        echo "L'envoi a bien été effectué !";
        }
    }
}
?>

<!-- Lorsque vous mettrez le script sur Internet à l'aide d'un logiciel FTP, 
vérifiez que le dossier « Uploads » sur le serveur existe, et qu'il a les droits d'écriture. 
Pour ce faire, sous FileZilla par exemple, faites un clic droit sur le dossier et choisissez 
« Attributs du fichier ».
Cela vous permettra d'éditer les droits du dossier (on parle de CHMOD). Mettez les droits à 733, 
ainsi PHP pourra placer les fichiers téléversés dans ce dossier.
 -->

<h1>Message bien reçu !</h1>

<div class="card">

    <div class="card-body">
        <h5 class="card-title">Rappel de vos informations</h5>
        <p class="card-text"><b>Email</b> :
            <?php echo ($email); ?>
        </p>
        <!-- htmlspecialchars est très important ça evite XSS par utilisateur 
        en utisinat method POST au lieu de GET on evite d'apparetre des données dans URL de site-->
        <p class="card-text"><b>Message</b> :
            <?php echo htmlspecialchars($message); ?>
        </p>
    </div>
</div>