<?php
// if segment 3 is 'create' and segment 4 is empty, set form action to category creation URL
$uri = service('uri');
$formAction = $uri->getSegment(3) === 'create' ? '/admin/category/create' : '/admin/category/edit/' . $uri->getSegment(4);
?>

<section class="mt-12 max-w-4xl p-6 mx-auto bg-white rounded-md shadow-md dark:bg-gray-800">
    <h2 class="text-lg font-semibold text-gray-700 capitalize dark:text-white">Category</h2>
    <!-- Form to create or edit a category -->
    <form action="<?= $formAction ?>" method="POST" class="mt-6">
        <!-- Name input field -->
        <div class="grid grid-cols-1 mt-4">
            <div>
                <label class="text-gray-700 dark:text-gray-200" for="name">Name</label>
                <!-- Text input for the category name -->
                <input placeholder="Insert Category Name" id="name" name="name" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
            </div>
        </div>

        <!-- Buttons for saving or cancelling -->
        <div class="flex gap-6 justify-end mt-6">
            <!-- Cancel button to navigate back to category list -->
            <button onclick="window.location.href='/admin/categories'" 
            type="button" class="transition-all px-12 py-2 text-sm font-medium text-white bg-red-600 rounded-md hover:bg-red-500 focus:outline-none focus:ring focus:ring-red-300">
                Cancel
            </button>
            <!-- Submit button to save the category -->
            <button type="submit" class="inline-flex items-center justify-center px-12 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300">
                Save
            </button>
        </div>
    </form>
</section>
