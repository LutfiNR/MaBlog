<?php
// Get the status message from the session, if any
$status = session()->getFlashdata('status');

// If a status message exists, display it as a browser alert using JavaScript
if ($status) {
    echo "<script>
        alert('$status');
    </script>";
}
?>

<!-- Start of the container section for Categories Page -->
<section class="container px-4 mx-auto">
    <!-- Section to display the title and the "Add Categories" button -->
    <div class="sm:flex sm:items-center sm:justify-between">
        <h2 class="text-lg font-medium text-gray-800 dark:text-white">Categories List</h2>

        <!-- Button to navigate to the "Add Categories" page -->
        <div class="flex items-center mt-4 gap-x-3">
            <button onclick="window.location.href='/admin/category/create'"
                class="flex items-center justify-center w-1/2 px-5 py-2 text-sm tracking-wide text-white transition-colors duration-200 bg-blue-500 rounded-lg sm:w-auto gap-x-2 hover:bg-blue-600 dark:hover:bg-blue-500 dark:bg-blue-600">
                <!-- FontAwesome Icon for Plus -->
                <i class="fa-solid fa-plus"></i>
                <span>Add Categories</span>
            </button>
        </div>
    </div>

    <!-- Start of the table to list all categories -->
    <div class="flex flex-col mt-6">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                <!-- Table wrapper with border and rounded corners -->
                <div class="overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg">
                    <!-- Table structure -->
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 dark:bg-gray-800">
                            <tr>
                                <!-- Table header for Category ID -->
                                <th scope="col"
                                    class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    <span>Category ID</span>
                                </th>

                                <!-- Table header for Category Name -->
                                <th scope="col"
                                    class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    Category
                                </th>

                                <!-- Table header for Edit option -->
                                <th scope="col" class="relative py-3.5 px-4">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                            <!-- Loop through all categories and display each one in a row -->
                            <?php foreach ($data['categories'] as $category): ?>
                                <tr>
                                    <!-- Display Category ID -->
                                    <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                        <h2 class="font-normal ml-6 text-gray-800 dark:text-white "><?= $category['id']?></h2>
                                    </td>

                                    <!-- Display Category Name -->
                                    <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                        <h2 class="font-normal text-gray-800 dark:text-white "><?= $category['name']?></h2>
                                    </td>

                                    <!-- Buttons for Delete and Edit actions -->
                                    <td class="px-4 py-4 text-sm whitespace-nowrap">
                                        <div class="flex items-center gap-x-6">
                                            <!-- Delete button, redirect to category delete page -->
                                            <button onclick="window.location.href='/admin/category/delete/<?= $category['id']?>'"
                                                class="text-gray-500 transition-colors duration-200 dark:hover:text-red-500 dark:text-gray-300 hover:text-red-500 focus:outline-none">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                </svg>
                                            </button>

                                            <!-- Edit button, redirect to category edit page -->
                                            <button onclick="window.location.href='/admin/category/edit/<?= $category['id']?>'"
                                                class="text-gray-500 transition-colors duration-200 dark:hover:text-yellow-500 dark:text-gray-300 hover:text-yellow-500 focus:outline-none">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
