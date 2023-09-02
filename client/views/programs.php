<?php require "inc/header.php"; ?>

<header>
  <?php require "inc/navbar.php"; ?>
</header>

<main>

  <div class="container max-sm:px-5">
    <h1 class="text-center text-4xl font-bold py-10">Програми</h1>
  </div>

  <section class="container mx-auto max-sm:px-10">
    <ul class="grid md:grid-cols-2 lg:grid-cols-3 gap-10">
      <li class="p-5 rounded shadow-xl">
        <h2 class="text-center text-4xl">Хранителен Режим</h2>
        <ul class="flex flex-col gap-4 ms:px-10 my-7 ms:my-10">
          <li class="flex gap-5">
            <i class="fa-solid fa-check text-2xl text-green-500"></i>
            <span>Изготвяне на режима спрямо вашите цели и възможности</span>
          </li>
          <li class="flex gap-5">
            <i class="fa-solid fa-check text-2xl text-green-500"></i>
            <span>Изготвен според вашия тип тяло</span>
          </li>
          <li class="flex gap-5">
            <i class="fa-solid fa-check text-2xl text-green-500"></i>
            <span>Създаден в съответствие с вашите хранителни навици</span>
          </li>
          <li class="flex gap-5">
            <i class="fa-solid fa-check text-2xl text-green-500"></i>
            <span>Съобразен с начина ви на живот</span>
          </li>
          <li class="flex gap-5">
            <i class="fa-solid fa-check text-2xl text-green-500"></i>
            <span>Изготвен с предпочитане от вас храни</span>
          </li>
          <li class="flex gap-5">
            <i class="fa-solid fa-check text-2xl text-green-500"></i>
            <span>Информация за дневния калориен прием</span>
          </li>
          <li class="flex gap-5">
            <i class="fa-solid fa-check text-2xl text-green-500"></i>
            <span>Информация за дневния прием на вода</span>
          </li>
          <li class="flex gap-5">
            <i class="fa-solid fa-check text-2xl text-green-500"></i>
            <span>Специфични детайли за храната</span>
          </li>
        </ul>
        <div class="flex items-center justify-center gap-5">
          <span class="font-bold">Цена: </span>
          <span>
            <span class="text-4xl">50</span>
            лв.
          </span>
        </div>
        <div class="mt-10 text-center">
          <a href="/contacts" class="btn py-5 inline-block">Поръчай сега!</a>
        </div>
      </li>
      <li class="p-5 rounded shadow-xl flex flex-col justify-between">
        <div>
          <h2 class="text-center text-4xl">Тренировъчен Режим</h2>
          <ul class="flex flex-col gap-4 ms:px-10 my-7 ms:my-10">
            <li class="flex gap-5">
              <i class="fa-solid fa-check text-2xl text-green-500"></i>
              <span>Спрямо стаж във фитнес залата</span>
            </li>
            <li class="flex gap-5">
              <i class="fa-solid fa-check text-2xl text-green-500"></i>
              <span>Здравословно състояние</span>
            </li>
            <li class="flex gap-5">
              <i class="fa-solid fa-check text-2xl text-green-500"></i>
              <span>Физическа активност</span>
            </li>
            <li class="flex gap-5">
              <i class="fa-solid fa-check text-2xl text-green-500"></i>
              <span>Воля</span>
            </li>
            <li class="flex gap-5">
              <i class="fa-solid fa-check text-2xl text-green-500"></i>
              <span>Характеристики</span>
            </li>
          </ul>
        </div>
        <div>
          <div class="flex items-center justify-center gap-5">
            <span class="font-bold">Цена: </span>
            <span>
              <span class="text-4xl">50</span>
              лв.
            </span>
          </div>
          <div class="mt-10 text-center">
            <a href="/contacts" class="btn py-5 inline-block">Поръчай сега!</a>
          </div>
        </div>
      </li>
      <li class="p-5 rounded shadow-xl flex flex-col justify-between">
        <div>
          <h2 class="text-center text-4xl">Хранителен Режим + Тренировъчен Режим</h2>
          <ul class="flex flex-col gap-4 ms:px-10 my-7 ms:my-10">
            <li class="flex gap-5">
              <i class="fa-solid fa-check text-2xl text-green-500"></i>
              <span>Хранителен Режим</span>
            </li>
            <li class="flex gap-5">
              <i class="fa-solid fa-check text-2xl text-green-500"></i>
              <span>Тренировъчен Режим</span>
            </li>
          </ul>
        </div>
        <div>
          <div class="flex items-center justify-center gap-5">
            <span class="font-bold">Цена: </span>
            <span>
              <span class="text-4xl">80</span>
              лв.
            </span>
          </div>
          <div class="mt-10 text-center">
            <a href="/contacts" class="btn py-5 inline-block">Поръчай сега!</a>
          </div>
        </div>
      </li>
    </ul>
  </section>

</main>

<?php require "inc/footer.php"; ?>
