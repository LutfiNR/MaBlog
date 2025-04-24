<div class="group grid grid-cols-12 gap-4 items-center text-dark dark:text-light">
    <?php
    // Image section
    ?>
    <a href="/article/<?=$slug?>" class="col-span-12 lg:col-span-4 h-full rounded-xl overflow-hidden">
        <img src="<?= $imageSrc ?>" alt="<?= $title ?>" width="" height=""
            class="aspect-square w-full h-full object-cover object-center group-hover:scale-105 transition-all ease duration-300"
            sizes="(max-width: 640px) 100vw,(max-width: 1024px) 50vw, 33vw" />
    </a>

    <?php
    // Text content section (category, title, date)
    ?>
    <div class="col-span-12 lg:col-span-8 w-full">
        <span class="inline-block w-full uppercase text-accent dark:text-accentDark font-semibold text-xs sm:text-sm">
            <?= $categories[0] ?>
        </span>
        <a href="/article/<?=$slug?>" class="inline-block my-1">
            <h2 class="font-semibold capitalize text-base sm:text-lg">
                <span class="bg-gradient-to-r from-accent/50  bg-[length:0px_6px] dark:from-accentDark/50 to-accent/50 dark:to-accentDark/50
                            group-hover:bg-[length:100%_6px] bg-left-bottom bg-no-repeat transition-[background-size] duration-500">
                    <?= $title ?>
                </span>
            </h2>
        </a>

        <span class="inline-block w-full capitalize text-gray dark:text-light/50 font-semibold text-xs sm:text-base">
            <?= date("F d, Y", strtotime($publishedAt)) ?>
        </span>
    </div>
</div>
