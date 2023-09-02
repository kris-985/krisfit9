<?php require "inc/header.php"; ?>

<?php

global $db;

$id = $_SESSION["params"]["id"];

if (empty($id)) {
  die("Invalid post id!");
}

$params = array(":id" => $id);
$posts = $db->select("SELECT * FROM posts WHERE id = :id;", $params);

if (count($posts) == 0) {
  die("Invalid post id!");
}

$post = $posts[0];
?>

<header>
  <?php require "inc/navbar.php"; ?>
</header>

<main>
  <h1 class="text-center text-4xl font-bold py-10"><?= $post["title"] ?></h1>

  <div class="container mx-auto max-w-[600px]">
    <?php if (empty($post["image_url"]) == FALSE): ?>
      <img class="w-100" src="<?= $post["image_url"] ?>" alt="<?= $post["title"] ?>">
    <?php else: ?>
      <img src="/images/default.jpg" alt="default">
    <?php endif; ?>
  </div>

  <div class="container max-sm:px-5">
    <div>
      <?= $post["text"] ?>
    </div>
  </div>

</main>

<?php require "inc/footer.php"; ?>