<div
    class="px-2  md:px-10 bg-accent dark:bg-accentDark text-light dark:text-dark py-2 flex items-center justify-around flex-wrap text-lg sm:text-xl font-medium mx-5  md:mx-10 rounded-lg">
    <time class="m-3">
        <?= date("F j, Y", strtotime($article['published_at'])) ?>
    </time>
    <span class="m-3">
        <!-- <ViewCounter slug={blogSlug} /> -->100
    </span>
    <div class="m-3"><?= $article['reading_time'] ?></div>
    <a href="/categories/<?= slugify($article['categories'][0]) ?>" class="m-3">
        #<?= slugify($article['categories'][0]) ?>
    </a>
</div>