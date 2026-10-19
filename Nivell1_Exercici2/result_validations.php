<?php
/*
Programa en PHP diverses normes de validació pels camps del formulari. 
Com per exemple que el camp no sigui buit o que compleixi determinades circumstàncies simples
com ser un nombre en cas de ser un camp numèric.
*/
declare(strict_types=1);
session_start();

$username = trim($_POST['username'] ?? '');
$email = trim($_POST['email'] ?? '');

$errors = [];

if ($username === '') {
    $errors[] = "Username no pot estar buit.";
} elseif (mb_strlen($username) < 3 || strlen($username) > 20) {
    $errors[] = "L'username ha de tenir entre 3 i 20 caràcters.";
}

if ($email === '') {
    $errors[] = "Email no pot estar buit.";
} elseif (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
    $errors[] = "L'email no té un format vàlid.";
}

if (empty($errors) === false) {
    echo "Hi ha errors:<br>";
    foreach ($errors as $i => $error) {
        echo ($i + 1) . ". " . htmlspecialchars($error) . "<br>";
    }
    echo '<a href="form_validations.html">Tornar al formulari</a>';
    
} else {
    $_SESSION['username'] = $username;
    $_SESSION['email'] = $email;

    echo "Usuari: " . htmlspecialchars($username) . "<br>";
    echo "Email: " . htmlspecialchars($email) . "<br>";
}