<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Posts list</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/css/style-posts.css">
</head>
<body>
<?php

include(dirname(__DIR__) . '/components/header.php');
include(dirname(__DIR__) . '/components/nav.php');
?>
<main>
    <h1 class="main-title">Список статей</h1>
    <div class="posts-list">
        <ul>
            <?php foreach ($posts as $post) :?>
                <li>
                    <article>
                        <div class="post-info">
                            <a href="#"><?= $post->getUserName() ?></a><span class="post-time"><?= $post->getDate() ?></span>
                        </div>
                        <h2 class="post-title"><?= $post->getTitle() ?></h2>
                        <div class="post-image">
                            <img src="<?= $post->getImage() ?>" alt="post image">
                        </div>
                        <div class="post-text">
                            <p><?= $post->getText() ?></p>
                        </div>
                    </article>
                </li>
            <?php endforeach;?>
        </ul>
    </div>
</main>
<?php include(dirname(__DIR__) . '/components/footer.php'); ?>
</body>
</html>