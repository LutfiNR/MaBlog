<div class="group grid grid-cols-12 gap-4 items-center text-dark">
  <a href="<?=$url?>" class=" col-span-12  lg:col-span-4 h-full rounded-xl overflow-hidden">
    <img src="<?= $imgSrc ?>" alt="<? $title ?>" width="" height=""
      class="aspect-square w-full h-full object-cover object-center group-hover:scale-105 transition-all ease duration-300"
      sizes="(max-width: 640px) 100vw,(max-width: 1024px) 50vw, 33vw" />
  </a>

  <div class="col-span-12  lg:col-span-8 w-full">
    <span class="inline-block w-full uppercase text-accent font-semibold text-xs sm:text-sm">
      <?= $tag ?>
    </span>
    <a href="<?=$url?>" class="inline-block my-1">
      <h2 class="font-semibold capitalize text-base sm:text-lg">
        <span
          class="bg-gradient-to-r from-accent/50  bg-[length:0px_6px]
                group-hover:bg-[length:100%_6px] bg-left-bottom bg-no-repeat transition-[background-size] duration-500 ">
          <?= $title ?>
        </span>
      </h2>
    </a>

    <span class="inline-block w-full capitalize text-gray font-semibold  text-xs sm:text-base">
      <?= date("F d, Y", strtotime($publishedAt)) ?>
    </span>
  </div>
</div>