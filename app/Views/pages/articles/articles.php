<?php
//get segment 2 use service
$param = service('uri')->getSegment(2);
$category = ($param!='') ? $param : 'all'; 
?>

<article class="mt-12 flex flex-col text-dark dark:text-light">
  <div class=" px-5 sm:px-10  md:px-24  sxl:px-32 flex flex-col">
    <h1 class="mt-6 font-semibold text-2xl md:text-4xl lg:text-5xl">#<?= slugify($category) ?></h1>
    <span class="mt-2 inline-block">
      Discover more categories and expand your knowledge!
    </span>
  </div>
  <?= view('components/articles/categories', ['categories' => $data['categories'], 'currentCategory' => slugify($category)]) ?>
  <div
    class="grid  grid-cols-1 sm:grid-cols-2  lg:grid-cols-3 grid-rows-2 gap-16 mt-5 sm:mt-10 md:mt-24 sxl:mt-32 px-5 sm:px-10 md:px-24 sxl:px-32">
    <?php foreach ($data['articles'] as $article): ?>
      <article class="col-span-1 row-span-1 relative">
        <?= view('layouts/blog/layout_three', ['imageSrc' => $article['image_src'], 'title' => $article['title'], 'categories' => $article['categories'], 'slug' => $article['slug'], 'publishedAt' => $article['created_at']]) ?>
      </article>
    <?php endforeach; ?>
  </div>
</article>