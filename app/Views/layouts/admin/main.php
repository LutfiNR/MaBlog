<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Basic Page Setup -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Dynamic Page Title -->
    <title><?= isset($data['title']) ? htmlspecialchars($data['title']) : 'MaBlog'; ?></title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="<?= base_url('/images/logo-upik.png'); ?>">

    <!-- SEO Meta Tags -->
    <meta name="description" content="<?= isset($data['description']) ? htmlspecialchars($data['description']) : 'MaBlog is a simple blog application'; ?>">
    <meta name="keywords" content="<?= isset($data['keywords']) ? htmlspecialchars($data['keywords']) : 'blog, articles, posts, news'; ?>">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Manrope:wght@200..800&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/f0d8b8088c.js" crossorigin="anonymous"></script>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Highlight.js for Syntax Highlighting -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/highlight.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/styles/atom-one-dark.min.css" />

    <!-- KaTeX for Math Rendering -->
    <script src="https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/katex.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/katex.min.css" />
    
    <!-- Quill Editor Styles and Scripts -->
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>

</head>

<body class="font-inter bg-white text-gray-900 h-screen overflow-hidden antialiased flex">

    <?php
    // Sidebar for admin panel navigation
    echo view('components/admin/sidebar/sidebar');
    ?>

    <main class="flex-auto overflow-y-auto bg-white dark:bg-gray-900">
        <?php
        // Breadcrumb navigation for current page context
        echo view('components/admin/breadchumbs');

        // Dynamically render main content view
        echo isset($data['content']) ? view($data['content']) : '';
        ?>
    </main>
    
</body>
</html>
