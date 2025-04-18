<?php
$currentSegment = service('uri')->getSegment(2);
$active = ($currentSegment === $segment) ? 'bg-gray-200 text-gray-700 dark:bg-gray-700 dark:text-gray-200' : 'text-gray-600 dark:text-gray-400 ';
?>

<a class="flex items-center px-4 py-2 mt-5 transition-colors duration-300 transform rounded-lg  hover:bg-gray-100 dark:hover:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-200  <?= $active ?>"
    href="<?= route_to('admin/' . $segment); ?>">
    <?= $icon ?>
    <span class="mx-4 font-medium"><?= $name ?></span>

</a>