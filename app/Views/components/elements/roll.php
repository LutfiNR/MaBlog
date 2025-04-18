<?php
$insights = [
    'Creating beautiful and functional websites.',
    'Experience HTML, CSS, JavaScript',
    '20+ projects completed',
    'Hardworking and dedicated',
]
    ?>

<div class="w-full bg-accent dark:bg-accentDark text-light dark:text-dark whitespace-nowrap overflow-hidden">
  <div
    class="animate-roll  w-full py-2 sm:py-3 flex items-center justify-center capitalize font-semibold tracking-wider text-sm sm:text-base">
    <?php foreach ($insights as $insight) { ?>
      <div>
        <?php echo $insight; ?> <span class="px-4">|</span>
      </div>
    <?php } ?>
  </div>
</div>