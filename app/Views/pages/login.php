<?php 
// Check if there's an error message in the session and display it using an alert
$error = session()->getFlashdata('error');
if ($error) {
    echo "<script>alert('$error');</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin | Mablog</title>

    <!-- Favicon: The small image shown on browser tabs -->
    <link rel="shortcut icon" type="image/png" href="<?= base_url('/images/logo-upik.png'); ?>">

    <!-- SEO Meta Tags for better search engine optimization -->
    <meta name="description" content="Login page for the blog.">
    <meta name="keywords" content="login, blog, articles, posts, news">

    <!-- Google Fonts for typography -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Manrope:wght@200..800&display=swap" rel="stylesheet">

    <!-- Tailwind CSS CDN for utility-first CSS framework -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        // Customizing Tailwind configuration for fonts
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        inter: ['Inter', 'sans-serif'],  // Inter font for the body
                        manrope: ['Manrope', 'sans-serif'],  // Manrope font for headings
                    },
                }
            }
        }
    </script>
</head>

<body class="font-inter bg-gray-100 dark:bg-gray-900 antialiased w-full h-screen flex items-center justify-center">
    <!-- Main container for the login form -->
    <div class="w-full max-w-sm mx-auto overflow-hidden bg-white rounded-lg shadow-md dark:bg-gray-800">
        <div class="px-6 py-4">
            <!-- Logo section centered at the top -->
            <div class="flex justify-center mx-auto">
                <img class="w-auto h-7 sm:h-8" src="/images/logo-upik.png" alt="">
            </div>

            <!-- Title and instructions for the login page -->
            <h3 class="mt-3 text-xl font-medium text-center text-gray-600 dark:text-gray-200">Welcome Back</h3>
            <p class="mt-1 text-center text-gray-500 dark:text-gray-400">Please Login</p>

            <!-- Login form that sends data via POST method to the login route -->
            <form action="<?= route_to('/login'); ?>" method="POST">
                <!-- Username input field -->
                <div class="w-full mt-4">
                    <input required name="username"
                        class="block w-full px-4 py-2 mt-2 text-gray-700 dark:text-gray-200 placeholder-gray-500 bg-white border rounded-lg dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 focus:border-blue-400 dark:focus:border-blue-300 focus:ring-opacity-40 focus:outline-none focus:ring focus:ring-blue-300"
                        type="text" placeholder="Username" aria-label="User Name" />
                </div>

                <!-- Password input field -->
                <div class="w-full mt-4">
                    <input required name="password"
                        class="block w-full px-4 py-2 mt-2 text-gray-700 dark:text-gray-200 placeholder-gray-500 bg-white border rounded-lg dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 focus:border-blue-400 dark:focus:border-blue-300 focus:ring-opacity-40 focus:outline-none focus:ring focus:ring-blue-300"
                        type="password" placeholder="Password" aria-label="Password" />
                </div>

                <!-- Submit button to sign in -->
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
