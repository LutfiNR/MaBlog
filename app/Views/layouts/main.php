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
                    colors: {
                        dark: "#1b1b1b",
                        light: "#fff",
                        accent: "#7B00D3",
                        accentDark: "#ffdb4d",
                        gray: "#747474",
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
    <link rel="stylesheet" href="<?= base_url('css/navbar.css'); ?>">
</head>

<body class="font-inter bg-white text-gray-900 antialiased">
    <!-- Navbar -->
    <header>
        <?= view('components/navbar/navbar'); ?>
    </header>

    <!-- Main Content -->
    <main class="">
        <?= isset($data['content']) ? view($data['content']) : ''; ?>
    </main>

    <!-- Footer -->
        <?=  view('components/footer/footer'); ?>

    <script src="<?= base_url('js/navbar.js') ?>"></script>
</body>

</html>