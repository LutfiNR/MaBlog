<article>
  <!-- Article Header Section -->
  <div class="mb-8 text-center relative w-full h-[70vh] bg-dark">
    <!-- Overlay Section for Centered Text -->
    <div
      class="w-full z-10 flex flex-col items-center justify-center absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
      <!-- Tag for the main category of the article (this uses a separate component for rendering the tag) -->
      <?= view('components/elements/tag', ['mainCategory' => $data['article']['categories'][0], 'class' => 'px-6 text-sm py-2']) ?>
      
      <!-- Article Title (Responsive font size and styling applied here) -->
      <h1
        class="inline-block mt-6 font-semibold capitalize text-light text-2xl md:text-3xl lg:text-5xl !leading-normal relative w-5/6">
        <?= $data['article']['title'] ?>
      </h1>
    </div>
    
    <!-- Dark background overlay with opacity -->
    <div class="absolute top-0 left-0 right-0 bottom-0 h-full bg-dark/60 dark:bg-dark/40"></div>
    
    <!-- Article Image (full width and height with object-cover to fit the image properly) -->
    <img src=<?= $data['article']['image_src'] ?> alt=<?= $data['article']['title'] ?> width="" height=""
      class="aspect-square w-full h-full object-cover object-center" priority sizes="100vw" />
  </div>
  
  <!-- Article Detail Section (Uses a separate component for displaying the detailed content of the article) -->
  <?= view('components/articles/article_detail', ['article' => $data['article']]) ?>

  <!-- Table of Contents and Article Content Layout -->
  <div class="grid grid-cols-12 gap-y-8 lg:gap-8 sxl:gap-16 mt-8 px-5 md:px-10">
    
    <!-- Table of Contents Section (Sticky and scrollable, shown as a collapsible details block) -->
    <div class="col-span-12 lg:col-span-4">
      <details
        class="border-[1px] border-solid border-dark dark:border-light text-dark dark:text-light rounded-lg p-4 sticky top-6 max-h-[80vh] overflow-hidden overflow-y-auto"
        open>
        <summary class="text-lg font-semibold capitalize cursor-pointer">
          Table Of Content
        </summary>
        
        <!-- Table of Contents content injected here -->
        <div class="mt-4 font-in text-base">
            <?= $data['toc'] ?>
        </div>
      </details>
    </div>
    
    <!-- Main Article Content (Rendered body content of the article with styling for different elements like blockquotes, figures, etc.) -->
    <content class='col-span-12 lg:col-span-8 font-in prose sm:prose-base md:prose-lg max-w-max text-dark dark:text-light
    prose-blockquote:bg-accent/20 
    prose-blockquote:p-2
    prose-blockquote:px-6
    prose-blockquote:border-accent
    prose-blockquote:not-italic
    prose-blockquote:rounded-r-lg

    prose-figure:relative
    prose-figcaption:mt-1
    prose-figcaption:mb-2

    prose-li:marker:text-accent
    dark:prose-invert
    dark:prose-blockquote:border-accentDark
    dark:prose-blockquote:bg-accentDark/20
    dark:prose-li:marker:text-accentDark

    first-letter:text-3xl
    sm:first-letter:text-5xl'>
      <!-- Render the article's body content here -->
      <?= $data['article']['body'] ?>
    </content>
  </div>
</article>
