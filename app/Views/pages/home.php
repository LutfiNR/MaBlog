<div class="w-full inline-block">
    <article class="flex flex-col items-start justify-end mx-5 sm:mx-10 relative h-[60vh] sm:h-[85vh]">
        <div class="absolute top-0 left-0 bottom-0 right-0 h-full
            bg-gradient-to-b from-transparent from-0% to-dark/90 rounded-3xl z-0"></div>

        <img src="https://dicoding-assets.sgp1.cdn.digitaloceanspaces.com/blog/wp-content/uploads/2022/02/BLOG-Mengenal-Lebih-Dekat-Apa-itu-React-1536x806.jpg"
            alt="Getting Started with SQL"
            class="w-full h-full object-center object-cover rounded-3xl -z-10 absolute" />
        <div
            class=' w-full lg:w-3/4 p-6 sm:p-8 md:p-12  lg:p-16 flex flex-col items-start justify-center z-0 text-light'>
            <?= view('components/elements/tag', ['tag' => 'Web Development', 'class' => '']) ?>
            <a href={blog.url} class='mt-6'>
                <h1 class='font-manrope font-bold capitalize text-lg sm:text-xl md:text-3xl lg:text-4xl'>
                    <span class='bg-gradient-to-r from-accent to-accent  bg-[length:0px_6px]
                hover:bg-[length:100%_6px] bg-left-bottom bg-no-repeat transition-[background-size] duration-500 '>
                        React Web Development
                    </span>
                </h1>
            </a>
            <p class='font-inter hidden  sm:inline-block mt-4 md:text-lg lg:text-xl'>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore at quaerat voluptas expedita vitae
                maxime, dolor facere tempora quos commodi obcaecati tenetur praesentium facilis rem. Iste voluptatem
                similique autem ipsum.
            </p>
        </div>
    </article>
</div>

<section
    class="w-full mt-16 sm:mt-24  md:mt-32 px-5 sm:px-10 md:px-24  sxl:px-32 flex flex-col items-center justify-center">
    <h2 class="w-full inline-block font-bold capitalize text-2xl md:text-4xl text-dark">Featured Posts</h2>

    <div class="grid grid-cols-2 grid-rows-2 gap-6  mt-10 sm:mt-16">
        <article class=" col-span-2  sxl:col-span-1 row-span-2 relative">
            <?= view('layouts/blog/layout_one', ['imgSrc' => 'https://dicoding-assets.sgp1.cdn.digitaloceanspaces.com/blog/wp-content/uploads/2022/02/BLOG-Mengenal-Lebih-Dekat-Apa-itu-React-1536x806.jpg', 'title' => 'React Web Development', 'tag' => 'React', 'url' => '/']) ?>
        </article>
        <article class=" col-span-2 sm:col-span-1 row-span-1 relative">
            <?= view('layouts/blog/layout_two', ['imgSrc' => 'https://dicoding-assets.sgp1.cdn.digitaloceanspaces.com/blog/wp-content/uploads/2022/02/BLOG-Mengenal-Lebih-Dekat-Apa-itu-React-1536x806.jpg', 'title' => 'React Web Development', 'tag' => 'React', 'url' => '/', 'publishedAt' => '2025-05-12']) ?>
        </article>
        <article class="col-span-2 sm:col-span-1 row-span-1 relative">
            <?= view('layouts/blog/layout_two', ['imgSrc' => 'https://dicoding-assets.sgp1.cdn.digitaloceanspaces.com/blog/wp-content/uploads/2022/02/BLOG-Mengenal-Lebih-Dekat-Apa-itu-React-1536x806.jpg', 'title' => 'React Web Development', 'tag' => 'React', 'url' => '/', 'publishedAt' => '2025-05-12']) ?>
        </article>
    </div>
</section>

<section
    class="w-full  mt-16 sm:mt-24  md:mt-32 px-5 sm:px-10 md:px-24  sxl:px-32 flex flex-col items-center justify-center">
    <div class="w-full flex  justify-between">
        <h2 class="w-fit inline-block font-bold capitalize text-2xl md:text-4xl text-dark">
            Recent Posts
        </h2>
        <a href="/categories/all"
            class="inline-block font-medium text-accent underline underline-offset-2 text-base md:text-lg">
            view all
        </a>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 grid-rows-2 gap-16 mt-16">
        <article class="col-span-1 row-span-1 relative">
        <?= view('layouts/blog/layout_three', ['imgSrc' => 'https://dicoding-assets.sgp1.cdn.digitaloceanspaces.com/blog/wp-content/uploads/2022/02/BLOG-Mengenal-Lebih-Dekat-Apa-itu-React-1536x806.jpg', 'title' => 'React Web Development', 'tag' => 'React', 'url' => '/', 'publishedAt' => '2025-05-12']) ?>
        </article>
        <article class="col-span-1 row-span-1 relative">
        <?= view('layouts/blog/layout_three', ['imgSrc' => 'https://dicoding-assets.sgp1.cdn.digitaloceanspaces.com/blog/wp-content/uploads/2022/02/BLOG-Mengenal-Lebih-Dekat-Apa-itu-React-1536x806.jpg', 'title' => 'React Web Development', 'tag' => 'React', 'url' => '/', 'publishedAt' => '2025-05-12']) ?>
        </article>
        <article class="col-span-1 row-span-1 relative">
        <?= view('layouts/blog/layout_three', ['imgSrc' => 'https://dicoding-assets.sgp1.cdn.digitaloceanspaces.com/blog/wp-content/uploads/2022/02/BLOG-Mengenal-Lebih-Dekat-Apa-itu-React-1536x806.jpg', 'title' => 'React Web Development', 'tag' => 'React', 'url' => '/', 'publishedAt' => '2025-05-12']) ?>
        </article>
    </div>
</section>