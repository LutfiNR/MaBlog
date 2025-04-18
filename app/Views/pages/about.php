<?php
$skillList = [
    'HTML',
    'CSS',
    'JavaScript',
    'PHP',
    'MySQL',
    'CodeIgniter 4',
    'Tailwind CSS',
    'Bootstrap',
    'Git & GitHub',
];
?>

<section class="w-full flex flex-col items-center justify-between">
    <?= view('components/elements/roll') ?>
    <div
        class='w-full md:h-[75vh] border-b-2 border-solid border-dark dark:border-light flex flex-col md:flex-row items-center justify-center text-dark dark:text-light'>
        <div class='w-full md:w-1/2 h-full border-r-2 border-solid border-dark dark:border-light flex justify-center'>
            <img src="<?= base_url('images/avatar.png') ?>" alt="lutfi"
                class='w-4/5  xs:w-3/4 md:w-full h-full object-contain object-center' priority
                sizes="(max-width: 768px) 100vw,(max-width: 1180px) 50vw, 50vw" />
        </div>

        <div class='w-full md:w-1/2 flex flex-col text-left items-start justify-center px-5 xs:p-10 pb-10 lg:px-16'>
            <h2 class='font-bold capitalize text-4xl xs:text-5xl sxl:text-6xl  text-center lg:text-left'>
                Dream Big, Work Hard, Achieve More!
            </h2>
            <p class='font-medium capitalize mt-4 text-base'>
                Hello, I'm Lutfi Nur Rohman, a junior web developer with a passion for creating beautiful and functional
                websites. I have experience with HTML, CSS, JavaScript. I am always eager to learn new
                technologies and improve my skills. I enjoy working on projects that challenge me and allow me to grow
                as a developer. I believe in the power of collaboration and teamwork to achieve great results. I am
                committed to delivering high-quality work that meets the needs of my clients.
            </p>
        </div>
    </div>
</section>
<section class="w-full flex flex-col p-5 xs:p-10 sm:p-12 md:p-16 lg:p-20 border-b-2 border-solid border-dark dark:border-light
     text-dark dark:text-light">
    <span class="font-semibold text-lg sm:text-3xl md:text-4xl text-accent dark:text-accentDark">
        I'm comfortable in...
    </span>
    <ul class="flex flex-wrap mt-8 justify-center  xs:justify-start">
        <?php foreach ($skillList as $item): ?>
            <li
                class="font-semibold inline-block capitalize text-base xs:text-lg sm:text-xl  md:text-2xl py-2 xs:py-3 sm:py-4 lg:py-5 px-4 xs:px-6 sm:px-8 lg:px-12 border-2 border-solid border-dark dark:border-light rounded mr-3 mb-3 xs:mr-4 xs:mb-4  md:mr-6 md:mb-6 hover:scale-105 transition-all ease duration-200 cursor-pointer dark:font-normal">
                <?= $item ?>
            </li>
        <?php endforeach; ?>
    </ul>
</section>
<h2
    class="mt-8 font-semibold text-lg md:text-2xl self-start mx-5 xs:mx-10 sm:mx-12 md:mx-16 lg:mx-20 text-dark dark:text-light dark:font-normal">
    Have a project in mind? Reach out to me 📞 from
    <a href="/contact" class="!underline underline-offset-2">here</a> and let's make it happen.
</h2>