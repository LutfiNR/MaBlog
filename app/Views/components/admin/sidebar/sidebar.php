<?php

/**
 * Sidebar navigation component for the admin dashboard.
 * 
 * This component displays the sidebar with the user profile section, navigation links,
 * and a logout button. The sidebar highlights the active navigation item based on
 * the current URL segment. The user's avatar, name, and email are displayed at the top
 * of the sidebar.
 * 
 * @param array $data User data, including profile image, name, and email.
 */
$segments = service('uri')->getSegments(2);  // Get URI segments, used to highlight the active menu item

?>

<aside class="sticky top-0 flex-none flex flex-col w-64 h-screen px-4 py-8 overflow-y-auto bg-white border-r rtl:border-r-0 rtl:border-l dark:bg-gray-900 dark:border-gray-700">
    <div class="flex flex-col items-center mt-6 -mx-2">
        <img class="object-cover w-24 h-24 mx-2 rounded-full" 
            src="<?= base_url($data['user']['image_src']) ?>" 
            alt="avatar">
        <h4 class="mx-2 mt-2 font-medium text-gray-800 dark:text-gray-200"><?= $data['user']['name'] ?></h4>
        <p class="mx-2 mt-1 text-sm font-medium text-gray-600 dark:text-gray-400"><?= $data['user']['email'] ?></p>
    </div>

    <div class="flex flex-col justify-between flex-1 mt-6">
        <nav>
            <!-- Dashboard Navigation Item -->
            <?= view('components/admin/sidebar/nav_item', [
                'segment' => 'dashboard',
                'name' => 'Dashboard',
                'icon' => '<i class="fa-solid fa-house" name="home"/></i>'
            ]) ?>

            <!-- Articles Navigation Item -->
            <?= view('components/admin/sidebar/nav_item', [
                'segment' => 'articles',
                'name' => 'Articles',
                'icon' => '<i class="fa-solid fa-newspaper" name="articles"/></i>'
            ]) ?>

            <!-- Categories Navigation Item -->
            <?= view('components/admin/sidebar/nav_item', [
                'segment' => 'categories',
                'name' => 'Categories',
                'icon' => '<i class="fa-solid fa-hashtag" name="home"/></i>'
            ]) ?>

            <!-- Logout Button -->
            <button onclick="window.location.href='<?= base_url('logout') ?>'"
                class="w-full mt-6 px-6 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-red-600 rounded-lg hover:bg-red-500 focus:outline-none focus:ring focus:ring-red-300 focus:ring-opacity-80">
                Logout
            </button>
        </nav>
    </div>
</aside>
