
<?php


$title = "Главная страница";
require_once __DIR__."/../parts/header.php" ?>
<div class="alert <?= $_SESSION["alert"] ?>" role="alert">
    <?= nl2br($_SESSION["msg"]) ?>
</div>
<h2>Посты</h2>
<div class="container">
<a class="col-mb-4 btn btn-primary mt-5 mb-3 p-3" href="../../insertPost.php">
    Добавить новую запись
    </a>
</div>
<div class="row">
    <?php
    $i=1;
    foreach ($posts as $post): ?>
    <div class="card mt-3 p-2 col-md-4 col-sm-6" >
        <img src="<?=$post->photo ? 'uploads/'.$post->photo : '' ?>" class="card-img-top img-small" style="height: 380px " alt="Фото">
        <div class="card-body">
            <h5 class="card-title"><?=$post->title ?></h5>
            <p class="card-text">
                <?=date_format(new DateTime($post->datePimlication),'d.m.Y')?></p>
        <a class="btn btn-info p-2" style="width: 100%;"  href="/showPost.php?id=<?=$post->id;?>">Подробно</a>
    </div>
</div>
    <?php endforeach; ?>
</div>
<?php require_once __DIR__."/../parts/footer.php"?>

