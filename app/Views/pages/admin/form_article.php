<?php
// If the article data is empty (i.e., we are creating a new article), set default values for the article
if (empty($data['article'])) {
    $data['article'] = [
        'title' => 'Insert your title here', // Default title
        'description' => 'Insert your description here', // Default description
        'readingtime' => '0', // Default reading time
        'is_featured' => '0', // Default 'is featured' status
        'image' => 'Insert your image link here', // Default image URL
        'body' => 'Insert your content here', // Default body content
        'categories' => [], // No categories selected by default
    ];
    // Set the form action to create a new article
    $formAction = '/admin/article/create';
} else {
    // If data exists (editing an existing article), set the form fields with existing article data
    $data['article'] = [
        'id' => $data['article']['id'], // Article ID
        'title' => $data['article']['title'], // Existing article title
        'description' => $data['article']['description'], // Existing article description
        'reading_time' => $data['article']['reading_time'], // Existing article reading time
        'is_featured' => $data['article']['is_featured'], // Existing article 'is featured' status
        'image' => $data['article']['image_src'], // Existing article image URL
        'body' => $data['article']['body'], // Existing article body content
        'categories' => $data['article']['categories'], // Existing article categories
    ];
    // Set the form action to edit the existing article
    $formAction = '/admin/article/edit/' . $data['article']['id'];
}
?>

<!-- Begin the article form section -->
<section class="bg-white dark:bg-gray-800 p-6">
    <h2 class="text-lg font-semibold text-gray-700 capitalize dark:text-white">Create Article</h2>

    <!-- Form to create or edit article -->
    <form id="form" action="<?= $formAction ?>" method="POST" class="mt-6">
        <div class="flex flex-col gap-y-8 mt-6">
            
            <!-- Title Field -->
            <div>
                <label class="text-gray-700 dark:text-gray-200" for="title">Title :</label>
                <input required id="title" name="title" type="text" value="<?= $data['article']['title'] ?>" 
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
            </div>
            
            <!-- Description Field -->
            <div>
                <label class="text-gray-700 dark:text-gray-200" for="description">Description :</label>
                <input required id="description" name="description" type="text" value="<?= $data['article']['description'] ?>"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
            </div>
            
            <!-- Reading Time Field -->
            <div>
                <label class="text-gray-700 dark:text-gray-200" for="readingtime">Reading Time :</label>
                <input required id="readingtime" name="readingtime" type="number" value="<?= $data['article']['reading_time'] ?>"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
            </div>
            
            <!-- Image Path Field -->
            <div>
                <label class="text-gray-700 dark:text-gray-200" for="image">Image Path :</label>
                <input required id="image" name="image" type="text" value="<?= $data['article']['image'] ?>"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
            </div>
            
            <!-- Categories Checkboxes -->
            <div>
                <label class="text-gray-700 dark:text-gray-200" for="categories">Categories :</label>
                <div class="flex flex-wrap gap-4 mt-2">
                    <!-- Loop through available categories and generate checkboxes -->
                    <?php foreach ($data['categories'] as $category): ?>
                        <?php
                        $id = htmlspecialchars($category['id']); // Category ID
                        $name = htmlspecialchars($category['name']); // Category name
                        $isChecked = in_array($category['name'], $data['article']['categories']) ? 'checked' : ''; // Check if category is already selected
                        ?>
                        <div>
                            <input id="category-<?= $id ?>" name="categories[]" type="checkbox" value="<?= $id ?>" class="mr-2" <?= $isChecked ?>>
                            <label for="category-<?= $id ?>" class="text-gray-700 dark:text-gray-200"><?= $name ?></label>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Is Featured Checkbox -->
            <div>
                <label class="text-gray-700 dark:text-gray-200" for="is_featured">Is Featured :</label>
                <input id="is_featured" name="is_featured" type="checkbox" value="1"
                    <?= $data['article']['is_featured'] == 1 ? 'checked' : '' ?> class="mr-2">
                <label for="is_featured" class="text-gray-700 dark:text-gray-200">Yes</label>
            </div>
            
            <!-- Body Content Editor (Rich Text Editor using Quill.js) -->
            <div>
                <label class="text-gray-700 dark:text-gray-200" for="body">Content :</label>
                <div id="toolbar-container" class="mt-4">
                    <!-- Quill.js Toolbar with various formatting options -->
                    <span class="ql-formats">
                        <select class="ql-size"></select>
                    </span>
                    <span class="ql-formats">
                        <button class="ql-bold"></button>
                        <button class="ql-italic"></button>
                        <button class="ql-underline"></button>
                        <button class="ql-strike"></button>
                    </span>
                    <span class="ql-formats">
                        <select class="ql-color"></select>
                        <select class="ql-background"></select>
                    </span>
                    <span class="ql-formats">
                        <button class="ql-script" value="sub"></button>
                        <button class="ql-script" value="super"></button>
                    </span>
                    <span class="ql-formats">
                        <button class="ql-header" value="1"></button>
                        <button class="ql-header" value="2"></button>
                        <button class="ql-header" value="3"></button>
                        <button class="ql-blockquote"></button>
                        <button class="ql-code-block"></button>
                    </span>
                    <span class="ql-formats">
                        <button class="ql-list" value="ordered"></button>
                        <button class="ql-list" value="bullet"></button>
                        <button class="ql-indent" value="-1"></button>
                        <button class="ql-indent" value="+1"></button>
                        <select class="ql-align"></select>
                    </span>
                    <span class="ql-formats">
                        <button class="ql-formula"></button>
                    </span>
                    <span class="ql-formats">
                        <button class="ql-clean"></button>
                    </span>
                </div>
                <!-- Quill.js Editor container -->
                <div id="editor" class="h-64"></div>
            </div>
        </div>

        <!-- Form action buttons -->
        <div class="flex justify-end mt-6 gap-12">
            <!-- Cancel Button -->
            <button onclick="window.location.href='/admin/articles'" type="button"
                class="transition-all px-12 py-2 text-sm font-medium text-white bg-red-600 rounded-md hover:bg-red-500 focus:outline-none focus:ring focus:ring-red-300">Cancel</button>
            <!-- Save Button -->
            <button type="submit" class="inline-flex items-center justify-center px-12 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300">Save</button>
        </div>
    </form>
</section>

<?php
// Initialize the Quill.js editor with the specified toolbar and syntax options
echo "<script>
    const quill = new Quill('#editor', {
        modules: {
            syntax: true,
            toolbar: '#toolbar-container',
        },
        theme: 'snow',
    });
</script>";

// Set the content of the Quill editor to the existing article body if editing
echo "<script>
    quill.root.innerHTML = ".json_encode($data['article']['body']).";
    
    // Ensure that the body content from Quill is appended before submitting the form
    const form = document.getElementById('form');
    form.addEventListener('formdata', (event) => {
        event.formData.append('body', quill.getSemanticHTML().replace(/&nbsp;/g, ' '));
    });
</script>";
?>

