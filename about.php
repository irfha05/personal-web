<?php include "koneksi.php"; ?>
<!DOCTYPE html>
<html lang="en" class="transition-colors duration-300">

<head>
    <meta charset="UTF-8">
    <title>About | Personal Web</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = { darkMode: 'class' }

        function toggleDarkMode() {
            const root = document.documentElement;
            root.classList.toggle('dark');
            const isDark = root.classList.contains('dark');
            localStorage.setItem('theme', isDark ? 'dark' : 'light');
            document.getElementById('icon-sun').classList.toggle('hidden', !isDark);
            document.getElementById('icon-moon').classList.toggle('hidden', isDark);
        }

        window.onload = () => {
            const theme = localStorage.getItem('theme');
            const isDark = theme === 'dark';
            if (isDark) document.documentElement.classList.add('dark');
            setTimeout(() => {
                document.getElementById('icon-sun').classList.toggle('hidden', !isDark);
                document.getElementById('icon-moon').classList.toggle('hidden', isDark);
            }, 0);
        };
    </script>
</head>

<body class="bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-100 font-sans transition-all duration-300">

    <!-- Header -->
    <header class="relative bg-teal-900 dark:bg-gray-800 text-white text-center p-6 text-2xl font-bold shadow">
        About Me | Irfha Najla Qisti Asfia`u Romadlon
        <button onclick="toggleDarkMode()" class="absolute right-6 top-6 text-white hover:scale-110 transition"
            title="Toggle Theme">
            <svg id="icon-moon" xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 fill-current" viewBox="0 0 24 24">
                <path d="M21 12.79A9 9 0 0111.21 3a7 7 0 1010 9.79z" />
            </svg>
            <svg id="icon-sun" xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 fill-current hidden"
                viewBox="0 0 24 24">
                <path
                    d="M12 4.75a.75.75 0 01.75-.75h.5a.75.75 0 010 1.5h-.5A.75.75 0 0112 4.75zM12 18.25a.75.75 0 01.75.75h-.5a.75.75 0 010-1.5h.5a.75.75 0 01-.75.75zM4.75 12a.75.75 0 01-.75.75v-.5a.75.75 0 011.5 0v.5A.75.75 0 014.75 12zM18.25 12a.75.75 0 01.75.75v-.5a.75.75 0 01-1.5 0v.5a.75.75 0 01.75-.75zM7.03 7.03a.75.75 0 01.53-.22.75.75 0 01.53 1.28l-.35.35a.75.75 0 11-1.06-1.06l.35-.35zM16.97 16.97a.75.75 0 01.53-.22.75.75 0 01.53 1.28l-.35.35a.75.75 0 11-1.06-1.06l.35-.35zM16.97 7.03a.75.75 0 011.06 1.06l-.35.35a.75.75 0 11-1.06-1.06l.35-.35zM7.03 16.97a.75.75 0 011.06 1.06l-.35.35a.75.75 0 11-1.06-1.06l.35-.35zM12 8a4 4 0 100 8 4 4 0 000-8z" />
            </svg>
        </button>
    </header>

    <!-- Navigation -->
    <nav class="bg-teal-700 dark:bg-gray-700 text-white py-3 shadow">
        <ul class="flex justify-center space-x-8 font-medium text-lg">
            <li><a href="index.php" class="hover:underline">Artikel</a></li>
            <li><a href="gallery.php" class="hover:underline">Gallery</a></li>
            <li><a href="about.php" class="hover:underline">About</a></li>
            <li><a href="admin/login.php" class="hover:underline">Login</a></li>
        </ul>
    </nav>

    <!-- About Content -->
    <main class="max-w-4xl mx-auto p-6 bg-white dark:bg-gray-800 rounded shadow mt-10">
        <h2
            class="text-xl font-bold mb-4 text-blue-700 dark:text-blue-400 border-b border-gray-300 dark:border-gray-600 pb-2">
            Tentang Saya
        </h2>

        <!-- Profile Section -->
        <div class="flex flex-col md:flex-row items-center gap-6 mb-6">
            <img src="images/fto 2.jpg" alt="Foto Profil" class="w-40 h-40 rounded-full object-cover shadow-lg">
            <div class="text-gray-700 dark:text-gray-200 text-justify">
                <?php
                $sql = "SELECT * FROM tbl_about ORDER BY id_about DESC LIMIT 1";
                $query = mysqli_query($db, $sql);
                while ($data = mysqli_fetch_array($query)) {
                    echo "<p class='leading-relaxed'>" . nl2br(htmlspecialchars($data['about'])) . "</p>";
                }
                ?>
            </div>
        </div>

        <!-- Social Media Section -->
        <div class="mt-10">
            <div class="flex space-x-6 items-center">
                <!-- Instagram -->
                <a href="https://instagram.com/itsnaqis.ar" target="_blank"
                    class="flex items-center space-x-2 text-pink-600 hover:text-pink-800 dark:text-pink-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 fill-current" viewBox="0 0 24 24">
                        <path
                            d="M7.75 2A5.75 5.75 0 002 7.75v8.5A5.75 5.75 0 007.75 22h8.5A5.75 5.75 0 0022 16.25v-8.5A5.75 5.75 0 0016.25 2h-8.5zM4.5 7.75A3.25 3.25 0 017.75 4.5h8.5A3.25 3.25 0 0119.5 7.75v8.5a3.25 3.25 0 01-3.25 3.25h-8.5A3.25 3.25 0 014.5 16.25v-8.5zm7.5 1.5a4.25 4.25 0 100 8.5 4.25 4.25 0 000-8.5zm0 1.5a2.75 2.75 0 110 5.5 2.75 2.75 0 010-5.5zm4.88-3.13a.88.88 0 11-1.75 0 .88.88 0 011.75 0z" />
                    </svg>
                    <span>Instagram</span>
                </a>

                <!-- WhatsApp -->
                <a href="https://wa.me/6289524108860" target="_blank"
                    class="flex items-center space-x-2 text-green-600 hover:text-green-800 dark:text-green-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 fill-current" viewBox="0 0 24 24">
                        <path
                            d="M12 2C6.48 2 2 6.27 2 11.52c0 2.07.72 3.99 1.94 5.57L2 22l5.2-1.37A10.45 10.45 0 0012 21c5.52 0 10-4.27 10-9.52C22 6.27 17.52 2 12 2zm.01 17.45c-1.65 0-3.25-.43-4.63-1.24l-.33-.2-3.07.81.82-2.98-.22-.35a8.3 8.3 0 01-1.27-4.37c0-4.52 3.77-8.2 8.42-8.2 4.65 0 8.42 3.68 8.42 8.2s-3.77 8.2-8.42 8.2zm4.47-6.02c-.25-.12-1.48-.73-1.71-.82-.23-.08-.4-.12-.57.13-.17.25-.65.82-.8.99-.15.17-.3.19-.56.06-.25-.12-1.05-.39-2-1.25-.74-.66-1.24-1.48-1.39-1.73-.15-.25-.02-.38.11-.5.12-.12.25-.3.38-.45.12-.15.17-.25.26-.42.08-.17.04-.31-.02-.44-.07-.12-.57-1.36-.78-1.86-.2-.48-.41-.42-.57-.43-.15-.01-.31-.01-.48-.01s-.44.06-.67.31c-.23.25-.87.86-.87 2.1 0 1.24.89 2.43 1.01 2.6.12.17 1.76 2.7 4.28 3.78.6.26 1.07.42 1.44.54.61.19 1.17.16 1.61.1.49-.07 1.48-.6 1.7-1.19.21-.6.21-1.11.15-1.22-.06-.1-.22-.17-.46-.29z" />
                    </svg>
                    <span>WhatsApp</span>
                </a>
            </div>
        </div>

        <!-- Maps Section -->
        <div class="mt-8">
            <h3 class="text-lg font-semibold mb-3 text-blue-600 dark:text-blue-300">Lokasi Saya</h3>
            <div class="w-full h-64 rounded-lg overflow-hidden shadow-lg">
                <iframe class="w-full h-full"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d991.1908324239905!2d107.81064725306433!3d-6.424446632754414!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6947aedca30445%3A0x449d9ac4e7c47c5a!2sToko%20zelani%2Firfha%20call!5e0!3m2!1sid!2sid!4v1751388225351!5m2!1sid!2sid" 
                    style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-teal-800 dark:bg-gray-800 text-white text-center py-4 mt-10 shadow-inner">
        &copy; <?php echo date('Y'); ?> | Created by Irfha Najla Qisti Asfia`u Romadlon
    </footer>

</body>

</html>