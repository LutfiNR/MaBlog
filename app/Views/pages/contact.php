
<section class="w-full flex flex-col items-center justify-between">
    <?= view('components/elements/roll') ?>
    <div
        class="w-full h-auto md:h-[75vh] border-b-2 border-solid border-dark dark:border-light
         flex  flex-col md:flex-row items-center justify-center text-dark dark:text-light">
        <div class='w-full md:w-1/2 h-full border-r-2 border-solid border-dark dark:border-light flex justify-center'>
            <img src="<?= base_url('images/avatar-2.png') ?>" alt="lutfi"
                class='w-4/5  xs:w-3/4 md:w-full h-full object-contain object-center' priority
                sizes="(max-width: 768px) 100vw,(max-width: 1180px) 50vw, 50vw" />
        </div>
        <div class="w-full  md:w-3/5 flex flex-col items-start justify-center px-5 xs:px-10 md:px-16 pb-8">
            <h2 class="font-bold capitalize  text-2xl xs:text-3xl sm:text-4xl">Let's Connect!</h2>
            <?= view('components/contact/form') ?>
        </div>
    </div>
</section>