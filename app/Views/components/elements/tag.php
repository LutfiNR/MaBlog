<?php
/**
 * Element Tag Component (Used Inside Article Card)
 *
 * Displays a stylized category tag within an article card.
 * Helps users identify and navigate to a list of articles under the same category.
 *
 * @var string $mainCategory  The category name for the article.
 * @var string $class         Custom styling class to apply conditional formatting.
 */
?>

<a href="/articles/<?= slugify($mainCategory) ?>"
    class="font-manrope inline-block py-2 sm:py-3 px-6 sm:px-10 bg-dark text-light rounded-full capitalize font-semibold border-2 border-solid border-light hover:scale-105 transition-all ease duration-200 text-sm sm:text-base <?= $class ?>">
    <?= $mainCategory ?>
</a>
