<?php
//if data article is empty set all key into empty string
//if data article is not empty set all key into data article
if (empty($data['article'])) {
    $data['article'] = [
        'title' => 'Insert your title here',
        'description' => 'Insert your description here',
        'readingtime' => '0',
        'is_featured' => '0',
        'image' => 'Insert your image link here',
        'body' => 'Insert your content here',
        'categories' => [],
    ];
    $formAction = '/admin/article/create';
} else {
    $data['article'] = [
        'id' => $data['article']['id'],
        'title' => $data['article']['title'],
        'description' => $data['article']['description'],
        'reading_time' => $data['article']['reading_time'],
        'is_featured' => $data['article']['is_featured'],
        'image' => $data['article']['image_src'],
        'body' => $data['article']['body'],
        'categories' => $data['article']['categories'],
    ];
    $formAction = '/admin/article/edit/' . $data['article']['id'];
}

?>
<section class="bg-white dark:bg-gray-800 p-6">
    <h2 class="text-lg font-semibold text-gray-700 capitalize dark:text-white">Create Article</h2>

    <form id="form" action="<?=$formAction?>" method="POST" class="mt-6">
        <div class="flex flex-col gap-y-8 mt-6">
            <div>
                <label class="text-gray-700 dark:text-gray-200" for="title">Title :</label>
                <input required id="title" name="title" type="text" value="<?= $data['article']['title'] ?>"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
            </div>
            <div>
                <label class="text-gray-700 dark:text-gray-200" for="description">Description :</label>
                <input required id="description" name="description" type="text"
                    value="<?= $data['article']['description'] ?>"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
            </div>
            <div>
                <label class="text-gray-700 dark:text-gray-200" for="readingtime">Reading Time :</label>
                <input required id="readingtime" name="readingtime" type="number"
                    value="<?= $data['article']['reading_time'] ?>"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
            </div>
            <div>
                <label class="text-gray-700 dark:text-gray-200" for="image">Image Path :</label>
                <input required id="image" name="image" type="text" value="<?= $data['article']['image'] ?>"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
            </div>
            <div>
                <label class="text-gray-700 dark:text-gray-200" for="categories">Categories :</label>
                <div class="flex flex-wrap gap-4 mt-2">
                    <?php foreach ($data['categories'] as $category): ?>
                        <?php
                        $id = htmlspecialchars($category['id']);
                        $name = htmlspecialchars($category['name']);
                        $isChecked = in_array($category['name'], $data['article']['categories']) ? 'checked' : '';
                        ?>
                        <div>
                            <input id="category-<?= $id ?>" name="categories[]" type="checkbox" value="<?= $id ?>"
                                class="mr-2" <?= $isChecked ?>>
                            <label for="category-<?= $id ?>" class="text-gray-700 dark:text-gray-200">
                                <?= $name ?>
                            </label>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div>
                <label class="text-gray-700 dark:text-gray-200" for="is_featured">Is Featured :</label>
                <input id="is_featured" name="is_featured" type="checkbox" value="1"
                    <?= $data['article']['is_featured'] == 1 ? 'checked' : '' ?> class="mr-2">
                <label for="is_featured" class="text-gray-700 dark:text-gray-200">
                    Yes
                </label>
            </div>
            <div>
                <label class="text-gray-700 dark:text-gray-200" for="body">Content :</label>
                <div id="toolbar-container" class="mt-4">
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
                <div id="editor" class="h-64">
                </div>
            </div>
        </div>

        <div class="flex justify-end mt-6 gap-12">
            <button onclick="window.location.href='/admin/articles'" type="button"
                class="transition-all px-12 py-2 text-sm font-medium text-white bg-red-600 rounded-md hover:bg-red-500 focus:outline-none focus:ring focus:ring-red-300">
                Cancel
            </button>
            <button type="submit"
                class="inline-flex items-center justify-center px-12 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300">Save</button>
        </div>
    </form>
</section>

<?php
echo "<script>
    const quill = new Quill('#editor', {
        modules: {
            syntax: true,
            toolbar: '#toolbar-container',
        },
    theme: 'snow',
    });
    </script>"
?>
<?php
echo "<script>
    quill.root.innerHTML = ".json_encode($data['article']['body']).";
    const form = document.getElementById('form');
    form.addEventListener('formdata', (event) => {
  // Append Quill content before submitting
  event.formData.append('body', quill.getSemanticHTML().replace(/&nbsp;/g, ' '));
});
</script>"
?>