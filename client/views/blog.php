<?php require "inc/header.php"; ?>

<?php

global $db;
$posts = $db->select("SELECT * FROM posts;");
?>

<header>
  <?php require "inc/navbar.php"; ?>
</header>

<main>
  <h1 class="text-center text-4xl font-bold py-10">Блог</h1>

  <div class="container max-sm:px-5">
    <ul class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5">
      <?php foreach($posts as $post): ?>
        <li>
          <?php if (empty($post["image_url"]) == FALSE): ?>
            <img class="w-100" src="<?= $post["image_url"] ?>" alt="<?= $post["title"] ?>">
          <?php else: ?>
            <img src="/images/default.jpg" alt="default">
          <?php endif; ?>
          <h2 class="my-4 text-2xl"><?= $post["title"] ?></h2>
          <a href="/blog/<?= $post["id"] ?>" class="btn py-4 px-6 inline-block">Прочети</a>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>

</main>

<?php require "inc/footer.php"; ?>