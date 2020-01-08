<?php
declare(strict_types=1);

require __DIR__.'/../autoload.php';


if (isset($_FILES['image'], $_POST['biography'])) {
   $image =  $_FILES['image'];
   $biography = $_POST['biography'];
   $id = $_SESSION['user']['user_id'];
   $likes = 0;

   $destination = '../../assets/img/'.date('ymd').'-'.$image['name'];
//    die(var_dump($image));
//    die(var_dump($destination ));
//    die(var_dump($destination ));

    move_uploaded_file($image['tmp_name'], $destination);

    $query = "INSERT INTO `posts` (post_id, image, description, post_likes) VALUES(:post_id, :image, :description, :post_likes)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':post_id', $id);
    $stmt->bindParam(':image', $destination);
    $stmt->bindParam(':description', $biography);
    $stmt->bindParam(':post_likes', $likes);
    $stmt->execute();







    header('Location: /../../../index.php');
    exit;





}