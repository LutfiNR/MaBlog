<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($data['title']) ? htmlspecialchars($data['title']) : 'MaBlog'; ?></title>
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/png" href="<?= base_url('/images/logo-upik.png'); ?>">

    <!-- SEO Meta Tags -->
    <meta name="description"
        content="<?= isset($data['description']) ? htmlspecialchars($data['description']) : 'MaBlog is a simple blog application'; ?>">
    <meta name="keywords"
        content="<?= isset($data['keywords']) ? htmlspecialchars($data['keywords']) : 'blog, articles, posts, news'; ?>">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Manrope:wght@200..800&display=swap"
        rel="stylesheet">


        <script src="https://kit.fontawesome.com/f0d8b8088c.js" crossorigin="anonymus"></script>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        inter: ['Inter', 'sans-serif'],
                        manrope: ['Manrope', 'sans-serif'],
                    },
                    animation: {
                        roll: "roll 24s linear infinite"
                    },
                    keyframes: {
                        roll: {
                            "0%": { transform: "translateX(100%)" },
                            "100%": { transform: "translateX(-100%)" }
                        }
                    },
                    screens: {
                        sxl: "1180px",
                        // @media (min-width: 1180px){...}
                        xs: "480px"
                        // @media (min-width: 480px){...}
                    }
                }
            }
        }
    </script>
</head>

<body class="font-inter bg-white text-gray-900 h-screen overflow-hidden antialiased flex">

    <!-- Sidebar -->
     <?= view('components/admin/sidebar/sidebar'); ?>
     
    <!-- Main Content -->
    <main class="flex-auto overflow-y-auto bg-white dark:bg-gray-900">
        <?= view('components/admin/breadchumbs'); ?>
        <?= isset($data['content']) ? view($data['content']) : ''; ?>
    </main>
</body>

</html>