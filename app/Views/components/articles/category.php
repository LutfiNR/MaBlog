<?php

/**
 * Category Component for Article Page
 * 
 * This component is used to display individual categories on the articles page.
 * It renders a clickable category tag that links to the articles filtered by that category.
 * The current category is highlighted with a different style.
 * 
 * @param string $link The URL to the articles filtered by the category.
 * @param string $name The name of the category, which is also used to display the category tag.
 * @param string $currentCategory The currently active category, used for highlighting.
 */
?>

<?php
// Determine the class to apply for the category (highlight if it matches the current category)
$class = ($name === $currentCategory) 
    ? 'bg-dark text-light dark:bg-light dark:text-dark' 
    : 'bg-light text-dark dark:bg-dark dark:text-light';
?>

<a href="<?= $link ?>"
  class="inline-block py-1.5 md:py-2 px-6 md:px-10 rounded-full border-2 border-solid border-dark dark:border-light hover:scale-105 transition-all ease duration-200 m-2 <?= $class ?>">
  #<?= $name ?>
</a>
