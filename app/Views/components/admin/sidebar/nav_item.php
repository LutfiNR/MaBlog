<?php

/**
 * Generates a navigation menu item with dynamic active state and custom icon.
 * 
 * This code dynamically generates the HTML for a navigation menu item. It checks
 * whether the current page or section matches the target menu item and applies
 * the 'active' class accordingly to highlight the current item. Additionally, 
 * it allows for a custom icon to be displayed next to the menu item label.
 * 
 * @param string $segment The URI segment used to match the active state of the menu item.
 * @param string $icon The HTML for the icon to be displayed next to the menu item.
 * @param string $name The name or label of the menu item.
 * 
 * @return string The HTML for the navigation menu item with the appropriate classes.
 */
$currentSegment = service('uri')->getSegment(2);  // Get the second URI segment (used to determine the current page or section)

// Determine if the current segment matches the target segment (used for highlighting active menu items)
$active = ($currentSegment === $segment) 
    ? 'bg-gray-200 text-gray-700 dark:bg-gray-700 dark:text-gray-200'  // Apply active styles if the segments match
    : 'text-gray-600 dark:text-gray-400 ';  // Apply default styles if the segments don't match

?>

<a class="flex items-center px-4 py-2 mt-5 transition-colors duration-300 transform rounded-lg  
    hover:bg-gray-100 dark:hover:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-200 
    <?= $active ?>"  
    href="<?= route_to('admin/' . $segment); ?>">

    <?= $icon ?>

    <span class="mx-4 font-medium"><?= $name ?></span>  

</a>
