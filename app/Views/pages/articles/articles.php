<?php
// Get the second segment of the URI (usually the category slug)
// If it's not empty, use it; otherwise, use 'all' as the default category.
$param = service('uri')->getSegment(2);
$category = ($param != '') ? $param : 'all'; 
?>

<article class="mt-12 flex flex-col text-dark dark:text-light">
  <!-- Section for the title and description of the page -->
  <div class="px-5 sm:px-10 md:px-24 sxl:px-32 flex flex-col">
    <!-- Title of the page, dynamically created using the category parameter -->
    <h1 class="mt-6 font-semibold text-2xl md:text-4xl lg:text-5xl">#<?= slugify($category) ?></h1>
    
    <!-- Description or tagline about the category or articles -->
    <span class="mt-2 inline-block">
      Discover more categories and expand your knowledge!
    </span>
  </div>
  
  <!-- Component for rendering categories. This will display a list of categories available -->
  <?= view('components/articles/categories', ['categories' => $data['categories'], 'currentCategory' => slugify($category)]) ?>
  
  <!-- Articles grid section: displaying the articles dynamically from the $data['articles'] array -->
  <div
    class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 grid-rows-2 gap-16 mt-5 sm:mt-10 md:mt-24 sxl:mt-32 px-5 sm:px-10 md:px-24 sxl:px-32">
    
    <!-- Loop through each article in the data array -->
    <?php foreach ($data['articles'] as $article): ?>
      <article class="col-span-1 row-span-1 relative">
        <!-- Render the article layout using a custom layout component for each article -->
        <?= view('layouts/blog/layout_three', [
          'imageSrc' => $article['image_src'], // Article image source
          'title' => $article['title'], // Article title
          'categories' => $article['categories'], // Categories of the article
          'slug' => $article['slug'], // Article slug for the URL
          'publishedAt' => $article['created_at'] // Published date of the article
        ]) ?>
      </article>
    <?php endforeach; ?>
  </div>
</article>
