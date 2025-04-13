<?php
$query = service('request')->getGet('category');
$category = isset($query) ? $query : 'all';

$articles = [
    [
        'title' => 'Article 1',
        'slug' => 'article-1',
        'category' => 'category-1',
        'image' => 'https://via.placeholder.com/150',
        'description' => 'Description of article 1',
    ],
    [
        'title' => 'Article 2',
        'slug' => 'article-2',
        'category' => 'category-2',
        'image' => 'https://via.placeholder.com/150',
        'description' => 'Description of article 2',
    ]
    ];
$categories = [
    'category-1',
    'category-2'
];
?>

<article class="mt-12 flex flex-col text-dark">
      <div class=" px-5 sm:px-10  md:px-24  sxl:px-32 flex flex-col">
        <h1 class="mt-6 font-semibold text-2xl md:text-4xl lg:text-5xl">#<?=$category?></h1>
        <span class="mt-2 inline-block">
          Discover more categories and expand your knowledge!
        </span>
      </div>
      <?= view('components/articles/categories', ['categories'=> $categories, 'currentCategory'=> $category]) ?>
      <div class="grid  grid-cols-1 sm:grid-cols-2  lg:grid-cols-3 grid-rows-2 gap-16 mt-5 sm:mt-10 md:mt-24 sxl:mt-32 px-5 sm:px-10 md:px-24 sxl:px-32">
        <!-- {blogs.map((blog, index) => (
          <article class="col-span-1 row-span-1 relative">
            <BlogLayoutThree blog={blog} />
          </article>
        ))} -->
      </div>
    </article>