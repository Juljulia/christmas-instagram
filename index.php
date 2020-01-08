<?php
declare(strict_types=1);
require __DIR__.'/app/autoload.php';
require __DIR__.'/app/redirect.php';
require __DIR__.'/views/header.php';
require __DIR__.'/app/users/feedcontent.php';
require __DIR__.'/app/users/show-user-info.php';




?>

<link rel="stylesheet" href="/assets/styles/like-animation.css">
<link rel="stylesheet" href="/assets/styles/index.css">
<link rel="stylesheet" href="/assets/styles/main.css">


<div class="posts" >
<?php foreach ($posts as $post): ?>
    <div class="post-container slide">

            <div class="img-container">

                <img class="img-post" src="<?php echo $post['image']; ?>" alt="img" class="img">
            </div>

            <div class="like-container">
                <div class="like-img hover ">
                    <img class="like-heart-img not-liked" src="/assets/img/heart-empty.svg" alt="">
                    <img class="bookmark-img" src="/assets/img/bookmark.svg" alt="">
                </div>
            </div>

            <div class="profile-like-container">
                <div class="profile-right-container">
                    <img src="<?php echo $info[0]['profile_picture'] ?>" alt="">

                    <div>
                        <p><?php echo $post['username']; ?></p>
                        <p>100 Followers</p>
                    </div>

                </div>

                <div class="follow-button"><p>Follow</p></div>

            </div>

                <p class="Description">Description</p>
                <div class="biography-section">

                <p><?php echo $post['description'] ?></p>
                </div>



    </div>
<?php endforeach; ?>

</div>

<section class="button-container"><a href="/upload.php"><button>+</button></a></section>

<script src="/assets/scripts/like.js"></script>