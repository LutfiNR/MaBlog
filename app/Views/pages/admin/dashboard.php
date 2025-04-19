<?= view('components/admin/statistic'); ?>

<section class="bg-white dark:bg-gray-900">
    <div class="container px-6 py-10 mx-auto">
        <h1 class="text-2xl font-semibold text-gray-800 capitalize lg:text-3xl dark:text-white">Top Articles</h1>

        <div class="grid grid-cols-1 gap-8 mt-8 md:mt-16 md:grid-cols-2">
            <?php foreach ($data['top_articles'] as $article): ?>
                <div class="lg:flex">
                    <img class="object-cover w-full h-56 rounded-lg lg:w-64" src="<?= $article['image_src'] ?>"
                        alt="<?= $article['title'] ?>">

                    <div class="flex flex-col justify-between py-6 lg:mx-6">
                        <a href="<?= base_url('article/' . $article['slug']) ?>"
                            class="text-xl font-semibold text-gray-800 hover:underline dark:text-white ">
                            <?= $article['title'] ?>
                        </a>
                        
                        <span class="text-sm text-gray-500 dark:text-gray-300">On:
                            <?= date('d F Y', strtotime($article['created_at'])) ?></span>
                        <span class="text-sm text-gray-500 dark:text-gray-300">
                            Total Visited : <?= $article['visited'] ?>
                        </span>
                        <span class="text-sm text-gray-500 dark:text-gray-300">
                            Author : <?= $article['author_name'] ?>
                        </span>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
</section>