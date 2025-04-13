<div class="group flex flex-col items-center text-dark">
    <a href="<?= $url ?>" class="h-full rounded-xl overflow-hidden">
        <img src="<?= $imgSrc ?>" alt="<? $title ?>" width="" height=""
            class=" aspect-[4/3] w-full h-full object-cover object-center  group-hover:scale-105 transition-all ease duration-300 "
            sizes="(max-width: 640px) 100vw,(max-width: 1024px) 50vw, 33vw" />
    </a>

    <div class="flex flex-col w-full mt-4">
        <span class="uppercase text-accent font-semibold text-xs sm:text-sm">
            <?= $tag ?>
        </span>
        <a href="<?= $url ?>" class="inline-block my-1">
            <h2 class="font-semibold capitalize  text-base sm:text-lg">
                <span class="bg-gradient-to-r from-accent/50 to-accent/50
              
              bg-[length:0px_6px]
              group-hover:bg-[length:100%_6px] bg-left-bottom bg-no-repeat transition-[background-size] duration-500 ">
                    <?= $title ?>
                </span>
            </h2>
        </a>

        <span class="capitalize text-gray font-semibold text-sm  sm:text-base">
            <?= date("F d, Y", strtotime($publishedAt)) ?>
        </span>
    </div>
</div>