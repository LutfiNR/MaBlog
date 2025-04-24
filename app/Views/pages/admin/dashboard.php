<?= view('components/admin/statistic'); ?>
<!-- This includes a view component that likely displays some kind of statistics on the admin dashboard. -->

<section class="bg-white dark:bg-gray-900">
    <div class="container px-6 py-10 mx-auto">
        <!-- Title of the Section -->
        <h1 class="text-2xl font-semibold text-gray-800 capitalize lg:text-3xl dark:text-white">Top Articles</h1>

        <!-- Grid layout to display articles in two columns (on larger screens) -->
        <div class="grid grid-cols-1 gap-8 mt-8 md:mt-16 md:grid-cols-2">
            <!-- Loop through the top articles and display each one in a separate box -->
            <?php foreach ($data['top_articles'] as $article): ?>
                <div class="lg:flex">
                    <!-- Article image displayed on the left (on large screens) -->
                    <img class="object-cover w-full h-56 rounded-lg lg:w-64" src="<?= $article['image_src'] ?>"
                        alt="<?= $article['title'] ?>">

                    <div class="flex flex-col justify-between py-6 lg:mx-6">
                        <!-- Link to the article page -->
                        <a href="<?= base_url('article/' . $article['slug']) ?>"
                            class="text-xl font-semibold text-gray-800 hover:underline dark:text-white ">
                            <?= $article['title'] ?>
                        </a>
                        
                        <!-- Article creation date -->
                        <span class="text-sm text-gray-500 dark:text-gray-300">On:
                            <?= date('d F Y', strtotime($article['created_at'])) ?></span>
                        <!-- Article total visits count -->
                        <span class="text-sm text-gray-500 dark:text-gray-300">
                            Total Visited : <?= $article['visited'] ?>
                        </span>
                        <!-- Author name -->
                        <span class="text-sm text-gray-500 dark:text-gray-300">
                            Author : <?= $article['author_name'] ?>
                        </span>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
