<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin | Mablog</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="<?= base_url('/images/logo-upik.png'); ?>">

    <!-- SEO Meta Tags -->
    <meta name="description" content="Login page for the blog.">
    <meta name="keywords" content="login, blog, articles, posts, news">

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
</head>

<body class="font-inter bg-light text-gray-900 antialiased w-full h-screen flex items-center justify-center">

    <div class="w-full max-w-sm mx-auto overflow-hidden bg-light rounded-lg shadow-md">
        <div class="px-6 py-4">
            <div class="flex justify-center mx-auto">
                <img class="w-auto h-7 sm:h-8" src="https://merakiui.com/images/logo.svg" alt="">
            </div>

            <h3 class="mt-3 text-xl font-medium text-center text-dark ">Welcome Back</h3>

            <p class="mt-1 text-center text-dark ">Login</p>

            <form action="<?= route_to('/login'); ?>" method="POST">
                <div class="w-full mt-4">

                    <input required name="username"
                        class="block w-full px-4 py-2 mt-2 text-dark placeholder-gray bg-white border rounded-lg focus:border-blue-400 focus:ring-opacity-40 focus:outline-none focus:ring focus:ring-blue-300"
                        type="text" placeholder="Username" aria-label="User Name" />
                </div>

                <div class="w-full mt-4">
                    <input required name="password"
                        class="block w-full px-4 py-2 mt-2 text-dark placeholder-gray bg-white border rounded-lg focus:border-blue-400  focus:ring-opacity-40 focus:outline-none focus:ring focus:ring-blue-300"
                        type="password" placeholder="Password" aria-label="Password" />
                </div>

                <div class="w-full mt-12">

                    <button
                        class="w-full px-6 py-3 text-sm font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-500 rounded-lg hover:bg-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-50">
                        Sign In
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>