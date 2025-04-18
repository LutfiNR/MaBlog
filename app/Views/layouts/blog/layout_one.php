<div class="group inline-block overflow-hidden rounded-xl w-full h-full">
    <div class="absolute top-0 left-0 bottom-0 right-0 h-full
            bg-gradient-to-b from-transparent from-0% to-dark/90 rounded-xl z-10
            "></div>
    <img src="<?= $imageSrc?>"
        alt="<?= $title?>" width="" height=""
        class="w-full h-full object-center object-cover rounded-xl group-hover:scale-105 transition-all ease duration-300"
        sizes="(max-width: 1180px) 100vw, 50vw" />

    <div class="w-full absolute bottom-0 p-4 xs:p-6 sm:p-10 z-20">
        <?= view('components/elements/tag', ['mainCategory' => $categories[0], 'class' => 'px-6 text-xs  sm:text-sm py-1 sm:py-2 !border ']) ?>
        <a href="/article/<?=$slug?>" class="mt-6">
            <h2 class="font-bold capitalize text-sm xs:text-base sm:text-xl md:text-2xl text-light mt-2 sm:mt-4">
                <span
                    class="bg-gradient-to-r from-accent to-accent bg-[length:0px_6px] dark:from-accentDark/50 dark:to-accentDark/50
                group-hover:bg-[length:100%_6px] bg-left-bottom bg-no-repeat transition-[background-size] duration-500 ">
                    <?= $title?>
                </span>
            </h2>
        </a>
    </div>
</div>