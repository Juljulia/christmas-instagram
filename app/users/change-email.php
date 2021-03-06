<?php
require __DIR__.'/../autoload.php';

require __DIR__.'/show-user-info.php';


if (isset($_POST['current'], $_POST['new'], $_POST['confirm'])) {
    $current = filter_var(trim($_POST['current'], FILTER_SANITIZE_EMAIL));
    $new = filter_var(trim($_POST['new'], FILTER_SANITIZE_EMAIL));
    $confirm = filter_var(trim($_POST['confirm'], FILTER_SANITIZE_EMAIL));


    if ($current === $info[0]['email']) {
        if ($new === $confirm) {


            $query = "UPDATE `users` SET email = :email WHERE user_id = :id";
            $stmt = $pdo->prepare($query);
            if (!$stmt) {
                die(var_dump($pdo->errorInfo()));
            }
            $stmt->bindParam(':id', $userId, PDO::PARAM_STR);
            $stmt->bindParam(':email', $new);
            $stmt->execute();
        }
    }
}

header('Location: /../../../settings.php');
exit;
