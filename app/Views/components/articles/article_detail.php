<?php

/**
 * Article Detail Component
 * 
 * This component is used to display article metadata such as the article's creation date,
 * reading time, category, and an associated static number (e.g., "100" which could represent likes or views).
 * Dynamic content such as the creation date, reading time, and categories are passed into the component.
 * 
 * @param array $article Contains article data including created_at, reading_time, and categories.
 */
?>

<div
    class="px-2 md:px-10 bg-accent dark:bg-accentDark text-light dark:text-dark py-2 flex items-center justify-around flex-wrap text-lg sm:text-xl font-medium mx-5 md:mx-10 rounded-lg">

    <!-- Article Creation Date -->
    <time class="m-3">
        <?= date("F j, Y", strtotime($article['created_at'])) ?> <!-- Formats the article creation date -->
    </time>

    <!-- Static Placeholder (e.g., Views or Likes) -->
    <span class="m-3">
        100 <!-- Static value representing views, likes, or other metrics -->
    </span>

    <!-- Article Reading Time -->
    <div class="m-3"><?= $article['reading_time'] ?> min</div> <!-- Dynamic reading time from the article data -->

    <!-- Article Category Link -->
    <a href="/categories/<?= slugify($article['categories'][0]) ?>" class="m-3">
        #<?= slugify($article['categories'][0]) ?> <!-- Dynamic category name, slugified for use in the URL -->
    </a>

</div>
