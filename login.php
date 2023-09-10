<!-- Ne placez donc JAMAIS le moindre code HTML avant d'utiliser setcookie !
 -->

 <?php

$postData = $_POST;

if (isset($postData['email']) &&  isset($postData['password'])) {
    foreach ($users as $user) {
        if (
            $user['email'] === $postData['email'] &&
            $user['password'] === $postData['password']
        ) {
            $loggedUser = [
                'email' => $user['email'],
            ];

            /**
             * Cookie qui expire dans un an
             */
            setcookie(
                'LOGGED_USER',
                $loggedUser['email'],
                [
                    'expires' => time() + 24*3600,
                    'secure' => true,
                    'httponly' => true,
                ]
            );

            $_SESSION['LOGGED_USER'] = $loggedUser['email'];
        } else {
            $errorMessage = sprintf('Les informations envoyées ne permettent pas de vous identifier : (%s/%s)',
                $postData['email'],
                $postData['password']
            );
        }
    }
}

// Si le cookie ou la session sont présentes
if (isset($_COOKIE['LOGGED_USER']) || isset($_SESSION['LOGGED_USER'])) {
    $loggedUser = [
        'email' => $_COOKIE['LOGGED_USER'] ?? $_SESSION['LOGGED_USER'],
    ];
}
?>

<?php if(!isset($loggedUser)): ?>
<form action="home.php" method="post">
    <?php if(isset($errorMessage)) : ?>
        <div class="alert alert-danger" role="alert">
            <?php echo($errorMessage); ?>
        </div>
    <?php endif; ?>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" aria-describedby="email-help" placeholder="you@exemple.com">
        <div id="email-help" class="form-text">L'email utilisé lors de la création de compte.</div>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Mot de passe</label>
        <input type="password" class="form-control" id="password" name="password">
    </div>
    <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
    <p>Vous n'avez pas encore de compte? Créez un pour avoir un acces illimité au site</p>
    <form action="<?php echo($rootUrl . 'recipes/user_create.php'); ?>" method="post">
    <?php if(isset($errorMessage)) : ?>
        <div class="alert alert-danger" role="alert">
            <?php echo($errorMessage); ?>
        </div>
    <?php endif; ?>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" aria-describedby="email-help" placeholder="you@exemple.com">
        <div id="email-help" class="form-text">Tapez votre email</div>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Mot de passe</label>
        <input type="password" class="form-control" id="password" name="password">
    </div>
    <div class="mb-3">
        <label for="age" class="form-label">Your age</label>
        <input type="numbers" class="form-control" id="age" name="age">
    </div>
    <div class="mb-3">
        <label for="full_name" class="form-label">Full name</label>
        <input type="text" class="form-control" id="full_name" name="full_name">
    </div>
    <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
<?php else: ?>
    <div class="alert alert-success" role="alert">
        Bonjour <?php echo($loggedUser['email']); ?> !
    </div>
<?php endif; ?>