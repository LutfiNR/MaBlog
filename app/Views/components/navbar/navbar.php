<?php
// Header / Navbar Component
?>

<header class="w-full py-8 px-5 sm:px-10 flex items-center justify-between font-manrope">

    <?php
    // Logo and Brand Link
    ?>
    <a href="/" class="flex items-center text-dark font-manrope dark:text-light">
        <span class="font-bold dark:font-semibold text-lg md:text-xl">MaBlog</span>
    </a>

    <?php
    // Hamburger button for mobile view
    ?>
    <button class="inline-block sm:hidden z-50" onclick="toggleMenu()" aria-label="Hamburger Menu">
        <div class="w-6 cursor-pointer transition-all ease duration-300">
            <div class="relative" id="hamburger">
                <span class="absolute top-0 inline-block w-full h-0.5 bg-dark dark:bg-light rounded transition-all ease duration-200 top-line">&nbsp;</span>
                <span class="absolute top-0 inline-block w-full h-0.5 bg-dark dark:bg-light rounded transition-all ease duration-200 middle-line">&nbsp;</span>
                <span class="absolute top-0 inline-block w-full h-0.5 bg-dark dark:bg-light rounded transition-all ease duration-200 bottom-line">&nbsp;</span>
            </div>
        </div>
    </button>

    <?php
    // Mobile navigation menu (appears when hamburger is clicked)
    ?>
    <nav class="-top-[5rem] w-max py-3 px-6 sm:px-8 border border-solid border-dark rounded-full font-medium capitalize items-center flex sm:hidden
        fixed right-1/2 translate-x-1/2 bg-light/80 backdrop-blur-sm z-50 transition-all ease duration-300"
        id="mobile-nav">
        <a href="/" class="mr-2">Home</a>
        <a href="/articles" class="mx-2">Articles</a>
        <a href="/about" class="mx-2">About</a>
        <a href="/contact" class="mx-2">Contact</a>
    </nav>

    <?php
    // Desktop navigation menu (visible on medium screens and up)
    ?>
    <nav class="w-max py-3 px-8 border border-solid border-dark rounded-full font-medium capitalize items-center hidden sm:flex
        fixed right-1/2 translate-x-1/2 bg-light/80 backdrop-blur-sm z-50">
        <a href="/" class="mr-2">Home</a>
        <a href="/articles" class="mx-2">Articles</a>
        <a href="/about" class="mx-2">About</a>
        <a href="/contact" class="mx-2">Contact</a>
    </nav>

    <?php
    // Social media icons (only visible on larger screens)
    ?>
    <div class="hidden sm:flex items-center">
        <a href="https://upiknurrohman.my.id" rel="noopener noreferrer" class="inline-block w-6 h-6 mr-4"
           aria-label="Reach out to my Website" target="_blank">
            <?= view('components/icons/website'); ?>
        </a>
        <a href="https://instagram.com/lut.upi?igshid=NGExMmI2YTkyZ" rel="noopener noreferrer"
           class="inline-block w-6 h-6 mr-4" aria-label="Reach out to me via Instagram" target="_blank">
            <?= view('components/icons/instagram'); ?>
        </a>
        <a href="https://github.com/LutfiNR" rel="noopener noreferrer"
           class="inline-block w-6 h-6 mr-4 dark:fill-light"
           aria-label="Check my profile on Github" target="_blank">
            <?= view('components/icons/github'); ?>
        </a>
        <a href="https://youtube.com/@lutfinurrohman1238" rel="noopener noreferrer"
           class="inline-block w-6 h-6 mr-4" aria-label="Check my profile on Youtube" target="_blank">
            <?= view('components/icons/youtube'); ?>
        </a>
    </div>

</header>
