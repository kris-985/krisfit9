<?php require "inc/header.php"; ?>
<?php require "inc/navbar.php"; ?>

<main>

  <div class="container max-sm:px-5">
    <h1 class="text-center text-4xl font-bold py-10">Контакти</h1>
  </div>
  
  <section class="container mx-auto">
    <form method="post">
      <div class="mb-5">
        <label class="inline-block mb-2" for="fullname">Име и фамилия</label>
        <input type="text" name="fullname" id="fullname" class="outline-none py-3 px-6 border w-full">
      </div>
      <div class="mb-5">
        <label class="inline-block mb-2" for="phone">Телефон</label>
        <input type="tel" name="phone" id="phone" class="outline-none py-3 px-6 border w-full">
      </div>
      <div class="mb-5">
        <label class="inline-block mb-2" for="email">E-mail</label>
        <input type="email" name="email" id="email" class="outline-none py-3 px-6 border w-full">
      </div>
      <div class="mb-5">
        <label class="inline-block mb-2" for="product">Продукт</label>
        <select name="product" id="product" class="outline-none py-3 px-6 border w-full">
          <option value="hr">Хранителен Режим</option>
          <option value="hr">Тренировъчен Режим</option>
          <option value="dbl">И двете</option>
        </select>
      </div>
      <div class="mb-5">
        <label for="message" class="message">Съобщение</label>
        <textarea name="message" id="message" rows="10" class="outline-none py-3 px-6 border w-full"></textarea>
      </div>
      <div>
        <button type="submit" class="btn py-4 px-6 inline-block">Изпрати</button>
      </div>
    </form>
  </section>

</main>

<?php require "inc/footer.php"; ?>