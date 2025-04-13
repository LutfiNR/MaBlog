<div
  class=" px-0 md:px-10 sxl:px-20 mt-10 border-t-2 text-dark border-b-2 border-solid border-dark py-4 flex items-start flex-wrap font-medium mx-5 md:mx-10">
  <?php foreach ($categories as $cat): ?>
    <?= view('components/articles/category', [
      'link' => "/articles?category={$cat}",
      'name' => $cat,
      'currentCategory' => $currentCategory,
    ]); ?>
  <?php endforeach; ?>
</div>