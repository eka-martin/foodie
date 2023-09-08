<html>
    <head>
        <meta charset="utf-8"/>
        <title>Ceci est une page HTML de test</title>
    </head>

    <body>
        <h2>Page de test</h2>
        <p>
            Cette page contient <strong>uniquement</strong> du code HTML.<br/>


            Voici quelques petits tests :


        </p>

        <ul>
            <li style="color: blue;">Texte en bleu</li>
            <li style="color: red;">Texte en rouge</li>
            <li style="color: green;">Texte en vert</li>
        </ul>
    </body>
</html>

<?php
$grade = 20;

if ($grade == 0) {
    echo "Tu es vraiment un gros nul !!!";
}

elseif ($grade == 5) {
    echo "Tu es très mauvais";
}

elseif ($grade == 7) {
    echo "Tu es mauvais";
}

elseif ($grade == 10) {
    echo "Tu as pile poil la moyenne, c'est un peu juste…";
}

elseif ($grade == 12) {
    echo "Tu es assez bon";
}

elseif ($grade == 16) {
    echo "Tu te débrouilles très bien !";
}

elseif ($grade == 20) {
    echo "Excellent travail, c'est parfait !";
}

else {
    echo "Désolé, je n'ai pas de message à afficher pour cette note";
}
?>

<!-- La meme function
Le switch ne peut tester que l'égalité. -->


<?php
$grade = 12;

switch ($grade) // on indique sur quelle variable on travaille
{ 
    case 0: // dans le cas où $grade vaut 0
        echo "Tu es vraiment un gros nul !!!";
    break;
    
    case 5: // dans le cas où $grade vaut 5
        echo "Tu es très mauvais";
    break;
    
    case 7: // dans le cas où $grade vaut 7
        echo "Tu es mauvais";
    break;
    
    case 10: // etc. etc.
        echo "Tu as pile poil la moyenne, c'est un peu juste…";
    break;
    
    case 12:
        echo "Tu es assez bon";
    break;
    
    case 16:
        echo "Tu te débrouilles très bien !";
    break;
    
    case 20:
        echo "Excellent travail, c'est parfait !";
    break;
    
    default:
        echo "Désolé, je n'ai pas de message à afficher pour cette note";
}
?>

<!-- Syntax classic  -->

<?php
$userAge = 24;

if ($userAge >= 18) {
	$isAdult = true;
}
else {
	$isAdult = false;
}
?>

<!-- Syntax ternaire  -->

<?php
$userAge = 24;

$isAdult = ($userAge >= 18) ? true : false;

// Ou mieux, dans ce cas précis
$isAdult = ($userAge >= 18);
?>

<?php

$mickael = ['Mickaël Andrieu', 'mickael.andrieu@exemple.com', 'S3cr3t', 34];
$mathieu = ['Mathieu Nebra', 'mathieu.nebra@exemple.com', 'devine', 33];
$laurene = ['Laurène Castor', 'laurene.castor@exemple.com', 'P4ssw0rD', 28];

$users = [$mickael, $mathieu, $laurene];

$lines = 3; // nombre d'utilisateurs dans le tableau
$counter = 0;

while ($counter < $lines) {
    echo $users[$counter][0] . ' ' . $users[$counter][1] . '<br />';
    $counter++; // Ne surtout pas oublier la condition de sortie !
}


for ($lines = 0; $lines <= 2; $lines++)
{
    echo $users[$lines][0] . ' ' . $users[$lines][1] . '<br />';
}

?>

<!-- Si vous hésitez entre les deux, il suffit simplement de vous poser la question suivante : 
« Est-ce que je sais d'avance combien de fois je veux que mes instructions soient répétées ? ».

Si la réponse est oui, alors la boucle for  est tout indiquée.

Sinon, alors il vaut mieux utiliser la boucle while -->

<?php

// 2 exemples
$romanSalad = [
    'title' => 'Salade Romaine',
    'recipe' => 'Etape 1 : Lavez la salade ; Etape 2 : euh ...',
    'author' => 'laurene.castor@exemple.com',
    'is_enabled' => true,
];

$sushis = [
    'title' => 'Sushis',
    'recipe' => 'Etape 1 : du saumon ; Etape 2 : du riz',
    'author' => 'laurene.castor@exemple.com',
    'is_enabled' => false,
];

function isValidRecipe(array $recipe) : bool
{
    if (array_key_exists('is_enabled', $recipe)) {
        $isEnabled = $recipe['is_enabled'];
    } else {
        $isEnabled = false;
    }

    return $isEnabled;
}
// Répond true !
$isRomandSaladValid = isValidRecipe($romanSalad);
echo $isRomandSaladValid;

// Répond false !
$isSushisValid = isValidRecipe($sushis);
echo $isSushisValid;