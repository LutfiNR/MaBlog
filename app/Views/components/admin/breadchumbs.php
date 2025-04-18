<?php
$segments = array_slice(service('uri')->getSegments(),1);
?>            
<div class="bg-gray-200 dark:bg-gray-800">
    <div class="container flex items-center px-6 py-4 mx-auto overflow-x-auto whitespace-nowrap">
        <a href="/admin" class="text-gray-600 dark:text-gray-200">
            <i class="fa-solid fa-house"></i>
        </a>
        <?php foreach ($segments as $segment): ?>
            <span class="mx-5 text-gray-500 dark:text-gray-300 rtl:-scale-x-100">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                </svg>
            </span>
            <a href="/admin/<?=$segment?>" class="text-gray-600 dark:text-gray-200"><?=unslugify($segment)?></a>
        <?php  endforeach; ?>

        
    </div>
</div>