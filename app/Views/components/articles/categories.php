<?php

/**
 * Categories Component for Articles Page
 * 
 * This component is used to display a list of categories associated with articles.
 * Each category is displayed as a clickable link, allowing users to navigate to articles
 * under a specific category.
 * 
 * @param array $categories An array of category data (name of the category) to be displayed.
 * @param string $currentCategory The currently active category (if any) for highlighting purposes.
 */
?>

<div class="px-0 md:px-10 sxl:px-20 mt-10 border-t-2 text-dark dark:text-light border-b-2 border-solid border-dark dark:border-light py-4 flex items-start flex-wrap font-medium mx-5 md:mx-10">
    <?php foreach ($categories as $cat): ?>
        <!-- Render each category as a clickable link -->
        <?= view('components/articles/category', [
          'link' => "/articles/" . slugify($cat['name']), // Creates the URL based on category name
          'name' => slugify($cat['name']), // Slugifies the category name for URL-safe format
          'currentCategory' => $currentCategory, // Pass the current category for potential highlighting
        ]); ?>
    <?php endforeach; ?>
</div>
