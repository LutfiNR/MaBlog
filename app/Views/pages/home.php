<div class="w-full inline-block">
    <article class="flex flex-col items-start justify-end mx-5 sm:mx-10 relative h-[60vh] sm:h-[85vh]">
        <div class="absolute top-0 left-0 bottom-0 right-0 h-full
            bg-gradient-to-b from-transparent from-0% to-dark/90 rounded-3xl z-0"></div>

        <img src="<?=$data['lastArticle']['image_src']?>"
            alt="<?=$data['lastArticle']['title']?>"
            class="w-full h-full object-center object-cover rounded-3xl -z-10 absolute" />
        <div
            class=' w-full lg:w-3/4 p-6 sm:p-8 md:p-12  lg:p-16 flex flex-col items-start justify-center z-0 text-light'>
                    <?= view('components/elements/tag', ['mainCategory' => $data['lastArticle']['categories'][0], 'class' => '']) ?>
            <a href="article/<?=$data['lastArticle']['slug']?>" class='mt-6'>
                <h1 class='font-manrope font-bold capitalize text-lg sm:text-xl md:text-3xl lg:text-4xl'>
                    <span class='bg-gradient-to-r from-accent to-accent  bg-[length:0px_6px] dark:from-accentDark/50 
                dark:to-accentDark/50
                hover:bg-[length:100%_6px] bg-left-bottom bg-no-repeat transition-[background-size] duration-500 '>
                        <?=$data['lastArticle']['title']?>
                    </span>
                </h1>
            </a>
            <p class='font-inter hidden  sm:inline-block mt-4 md:text-lg lg:text-xl'>
                <?=$data['lastArticle']['description']?>
            </p>
        </div>
    </article>
</div>

<section
    class="w-full mt-16 sm:mt-24  md:mt-32 px-5 sm:px-10 md:px-24  sxl:px-32 flex flex-col items-center justify-center">
    <h2 class="w-full inline-block font-bold capitalize text-2xl md:text-4xl text-dark dark:text-light">Featured Posts</h2>

    <div class="grid grid-cols-2 grid-rows-2 gap-6  mt-10 sm:mt-16">
        <article class=" col-span-2  sxl:col-span-1 row-span-2 relative">
            <?= view('layouts/blog/layout_one', ['imageSrc' => $data['featuredArticles'][0]['image_src'], 'title' => $data['featuredArticles'][0]['title'], 'categories' => $data['featuredArticles'][0]['categories'], 'slug' => $data['featuredArticles'][0]['slug']]) ?>
        </article>
        <article class=" col-span-2 sm:col-span-1 row-span-1 relative">
            <?= view('layouts/blog/layout_two', ['imageSrc' => $data['featuredArticles'][1]['image_src'], 'title' => $data['featuredArticles'][1]['title'], 'categories' => $data['featuredArticles'][1]['categories'], 'slug' => $data['featuredArticles'][1]['slug'],'publishedAt'=> $data['featuredArticles'][1]['created_at']]) ?>
        </article>
        <article class="col-span-2 sm:col-span-1 row-span-1 relative">
            <?= view('layouts/blog/layout_two', ['imageSrc' => $data['featuredArticles'][2]['image_src'], 'title' => $data['featuredArticles'][2]['title'], 'categories' => $data['featuredArticles'][2]['categories'], 'slug' => $data['featuredArticles'][2]['slug'],'publishedAt'=> $data['featuredArticles'][2]['created_at']]) ?>
        </article>
    </div>
</section>

<section
    class="w-full  mt-16 sm:mt-24  md:mt-32 px-5 sm:px-10 md:px-24  sxl:px-32 flex flex-col items-center justify-center">
    <div class="w-full flex  justify-between">
        <h2 class="w-fit inline-block font-bold capitalize text-2xl md:text-4xl text-dark dark:text-light">
            Recent Posts
        </h2>
        <a href="/articles/all"
            class="inline-block font-medium text-accent underline underline-offset-2 text-base md:text-lg dark:text-accentDark">
            view all
        </a>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 grid-rows-2 gap-16 mt-16">
    <?php foreach ($data['articles'] as $article): ?>
        <article class="col-span-1 row-span-1 relative">
            <?= view('layouts/blog/layout_three', ['imageSrc' => $article['image_src'], 'title' => $article['title'], 'categories' => $article['categories'], 'slug' => $article['slug'],'publishedAt'=> $article['created_at']]) ?>
        </article>   
    <?php endforeach; ?> 
    </div>
</section>