<?php
/*
Crea excepcions personalitzades per tractar els possibles errors que hi pugui haver en la validació del formulari de l'exercici anterior.
*/
declare(strict_types=1);
session_start();

class UsernameException extends Exception
{}

class EmailException extends Exception
{}

$username = trim($_POST['username'] ?? '');
$email = trim($_POST['email'] ?? '');

$errors = [];

try {
    if ($username === '') {
        throw new UsernameException("Username no pot estar buit.");
    }
    if (mb_strlen($username) < 3 || mb_strlen($username) > 20) {
        throw new UsernameException("L'username ha de tenir entre 3 i 20 caràcters.");
    }
} catch (UsernameException $fault) {
    $errors[] = $fault->getMessage();
}

try {
    if ($email === '') {
        throw new EmailException("Email no pot estar buit.");
    }
    if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
        throw new EmailException("L'email no té un format vàlid.");
    }
} catch (EmailException $fault) {
    $errors[] = $fault->getMessage();
}

if (empty($errors) === false) {
    echo "Hi ha errors:<br>";
    foreach ($errors as $i => $error) {
        echo ($i + 1) . ". " . htmlspecialchars($error) . "<br>";
    }
    echo '<a href="form_exception.html">Tornar al formulari</a>';
    
} else {
    $_SESSION['username'] = $username;
    $_SESSION['email'] = $email;

    echo "Usuari: " . htmlspecialchars($username) . "<br>";
    echo "Email: " . htmlspecialchars($email) . "<br>";
}