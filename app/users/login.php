<?php
declare(strict_types=1);


require __DIR__.'/../autoload.php';


if (isset($_POST['email'],$_POST['password'] )) {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    $statement = $pdo->prepare('SELECT * FROM users WHERE email = :email');
    if (!$statement) {
        die(var_dump($pdo->errorInfo()));
    }
    $statement->bindParam(':email', $email, PDO::PARAM_STR);
    $statement->execute();

    $user = $statement->fetch(PDO::FETCH_ASSOC);





    if (!$user) {
        redirect('/login.php');
    }
    if (password_verify($_POST['password'], $user['password_hash'])) {


        unset($user['password_hash']);
        $_SESSION['user'] = $user;
        header('location: ../../index.php');
        exit;



    }else{
        header('location: /login.php');
        exit;
    }

    }




