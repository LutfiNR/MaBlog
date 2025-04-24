<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta Tags for Character Set and Viewport Configuration -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Title of the Page -->
    <title><?= isset($data['title']) ? htmlspecialchars($data['title']) : 'MaBlog'; ?></title>

    <!-- Favicon: Small icon that represents the website in browser tabs -->
    <link rel="shortcut icon" type="image/png" href="<?= base_url('/images/logo-upik.png'); ?>">

    <!-- SEO Meta Tags -->
    <!-- Meta description for search engines -->
    <meta name="description"
        content="<?= isset($data['description']) ? htmlspecialchars($data['description']) : 'MaBlog is a simple blog application'; ?>">
    <!-- Meta keywords for search engine optimization -->
    <meta name="keywords"
        content="<?= isset($data['keywords']) ? htmlspecialchars($data['keywords']) : 'blog, articles, posts, news'; ?>">

    <!-- Google Fonts -->
    <!-- Preconnect to Google's font servers for faster loading -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- Link to the specific Google fonts used in the layout -->
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Manrope:wght@200..800&display=swap"
        rel="stylesheet">

    <!-- Tailwind CSS -->
    <!-- Including the Tailwind CSS framework for utility-first CSS styling -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com?plugins=typography"></script>

    <!-- Custom Tailwind Configuration -->
    <!-- Define custom settings like colors, animations, and breakpoints for the project -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        inter: ['Inter', 'sans-serif'],
                        manrope: ['Manrope', 'sans-serif'],
                    },
                    colors: {
                        dark: "#1b1b1b",   <!-- Dark theme color -->
                        light: "#fff",     <!-- Light theme color -->
                        accent: "#7B00D3", <!-- Accent color used for highlights -->
                        accentDark: "#ffdb4d", <!-- Darker variant of the accent color -->
                        gray: "#747474",   <!-- Gray color for text or borders -->
                    },
                    animation: {
                        roll: "roll 24s linear infinite"  <!-- Keyframe animation to scroll content -->
                    },
                    keyframes: {
                        roll: {
                            "0%": { transform: "translateX(100%)" }, <!-- Starting position of the animation -->
                            "100%": { transform: "translateX(-100%)" } <!-- Ending position of the animation -->
                        }
                    },
                    screens: {
                        sxl: "1180px",  <!-- Custom breakpoint for screens larger than 1180px -->
                        xs: "480px"     <!-- Custom breakpoint for screens larger than 480px -->
                    }
                }
            }
        }
    </script>

    <!-- Custom Stylesheets -->
    <!-- Link to custom CSS for the navbar and global styles -->
    <link rel="stylesheet" href="<?= base_url('css/navbar.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('css/global.css'); ?>">
</head>

<body class="font-inter bg-light dark:bg-dark text-gray-900 antialiased">
    <!-- Navbar Section -->
    <!-- The header includes the navigation bar component -->
    <header>
        <?= view('components/navbar/navbar'); ?>
    </header>

    <!-- Main Content Section -->
    <!-- The content of the page is dynamically loaded using the 'content' variable -->
    <main class="">
        <?= isset($data['content']) ? view($data['content']) : ''; ?>
    </main>

    <!-- Footer Section -->
    <!-- The footer is included at the bottom of the page, ensuring the layout is consistent across pages -->
    <?= view('components/footer/footer'); ?>

    <!-- Custom JavaScript -->
    <!-- Link to the JavaScript file for the navbar functionality -->
    <script src="<?= base_url('js/navbar.js') ?>"></script>
</body>

</html>
