<?php

/**
 * Statistic Section Component
 * 
 * This component displays statistics related to visitors and articles in the admin dashboard.
 * The statistics include "Today Visitor", "All Visitor", and "Total Articles". 
 * Dynamic data such as the total number of articles is injected into the component.
 * 
 * @param array $data Contains statistics like total articles, which is dynamically injected.
 */
?>

<div class="bg-white dark:bg-gray-900">
    <div class="container px-6 py-8 mx-auto">
        <!-- Section Title -->
        <h1 class="text-2xl font-semibold text-gray-800 capitalize lg:text-3xl dark:text-white">Overview</h1>

        <div class="grid grid-cols-1 gap-8 mt-6 xl:mt-12 xl:gap-12 md:grid-cols-2 lg:grid-cols-3">
            
            <!-- Today's Visitor Card -->
            <div class="w-full p-8 space-y-8 text-center border border-gray-200 rounded-lg dark:border-gray-700">
                <p class="font-medium text-gray-500 uppercase dark:text-gray-300">Today Visitor</p>
                <h2 class="text-6xl font-semibold text-gray-800 uppercase dark:text-gray-100">
                    0 <!-- Static placeholder for Today's Visitor count -->
                </h2>
            </div>
            
            <!-- All Visitors Card -->
            <div class="w-full p-8 space-y-8 text-center border border-gray-200 rounded-lg dark:border-gray-700">
                <p class="font-medium text-gray-500 uppercase dark:text-gray-300">All Visitor</p>
                <h2 class="text-6xl font-semibold text-gray-800 uppercase dark:text-gray-100">
                    0 <!-- Static placeholder for All Visitor count -->
                </h2>
            </div>
            
            <!-- Total Articles Card -->
            <div class="w-full p-8 space-y-8 text-center border border-gray-200 rounded-lg dark:border-gray-700">
                <p class="font-medium text-gray-500 uppercase dark:text-gray-300">Total Articles</p>
                <h2 class="text-6xl font-semibold text-gray-800 uppercase dark:text-gray-100">
                    <?= $data['total_articles'] ?> <!-- Dynamically injected total articles count -->
                </h2>
            </div>
        </div>
    </div>
</div>
