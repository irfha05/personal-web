<?php include "koneksi.php"; ?>
<!DOCTYPE html>
<html lang="en" class="transition-colors duration-300">

<head>
    <meta charset="UTF-8">
    <title>Personal Web | Home</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class'
        };

        function toggleDarkMode() {
            const root = document.documentElement;
            root.classList.toggle('dark');
            const isDark = root.classList.contains('dark');
            localStorage.setItem('theme', isDark ? 'dark' : 'light');

            // toggle icon
            document.getElementById('icon-sun').classList.toggle('hidden', !isDark);
            document.getElementById('icon-moon').classList.toggle('hidden', isDark);
        }

        window.onload = () => {
            const theme = localStorage.getItem('theme');
            const isDark = theme === 'dark';
            if (isDark) document.documentElement.classList.add('dark');

            // ensure correct icon shown
            window.setTimeout(() => {
                document.getElementById('icon-sun').classList.toggle('hidden', !isDark);
                document.getElementById('icon-moon').classList.toggle('hidden', isDark);
            }, 0);
        };
    </script>
</head>

<body class="bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-100 font-sans transition-all duration-300">

    <!-- Header -->
    <header class="relative bg-blue-900 dark:bg-gray-800 text-white text-center p-6 text-2xl font-bold shadow">
        Personal Web | Irfha Najla Qisti Asfia`u Romadlon

        <!-- Toggle Theme Button (SVG Icons) -->
        <button onclick="toggleDarkMode()" class="absolute right-6 top-6 text-white hover:scale-110 transition"
            title="Toggle Theme">
            <!-- Moon icon (light mode) -->
            <svg id="icon-moon" xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 fill-current" viewBox="0 0 24 24">
                <path d="M21 12.79A9 9 0 0111.21 3a7 7 0 1010 9.79z" />
            </svg>

            <!-- Sun icon (dark mode) -->
            <svg id="icon-sun" xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 fill-current hidden"
                viewBox="0 0 24 24">
                <path
                    d="M12 4.75a.75.75 0 01.75-.75h.5a.75.75 0 010 1.5h-.5A.75.75 0 0112 4.75zM12 18.25a.75.75 0 01.75.75h-.5a.75.75 0 010-1.5h.5a.75.75 0 01-.75.75zM4.75 12a.75.75 0 01-.75.75v-.5a.75.75 0 011.5 0v.5A.75.75 0 014.75 12zM18.25 12a.75.75 0 01.75.75v-.5a.75.75 0 01-1.5 0v.5a.75.75 0 01.75-.75zM7.03 7.03a.75.75 0 01.53-.22.75.75 0 01.53 1.28l-.35.35a.75.75 0 11-1.06-1.06l.35-.35zM16.97 16.97a.75.75 0 01.53-.22.75.75 0 01.53 1.28l-.35.35a.75.75 0 11-1.06-1.06l.35-.35zM16.97 7.03a.75.75 0 011.06 1.06l-.35.35a.75.75 0 11-1.06-1.06l.35-.35zM7.03 16.97a.75.75 0 011.06 1.06l-.35.35a.75.75 0 11-1.06-1.06l.35-.35zM12 8a4 4 0 100 8 4 4 0 000-8z" />
            </svg>
        </button>

    </header>

    <!-- Navigation -->
    <nav class="bg-blue-700 dark:bg-gray-700 text-white py-3 shadow">
        <ul class="flex justify-center space-x-8 font-medium text-lg">
            <li><a href="index.php" class="hover:underline">Artikel</a></li>
            <li><a href="gallery.php" class="hover:underline">Gallery</a></li>
            <li><a href="about.php" class="hover:underline">About</a></li>
            <li><a href="admin/login.php" class="hover:underline">Login</a></li>
        </ul>
    </nav>

    <!-- Main Content -->
    <main class="max-w-6xl mx-auto p-6 grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">

        <!-- Artikel Utama -->
        <section class="md:col-span-2 bg-white dark:bg-gray-800 p-6 rounded shadow">
            <h2 class="text-xl font-bold mb-4 border-b border-gray-300 dark:border-gray-600 pb-2">Artikel Terbaru</h2>
            <div class="space-y-6">
                <?php
                $sql = "SELECT * FROM tbl_artikel ORDER BY id_artikel DESC";
                $query = mysqli_query($db, $sql);
                while ($data = mysqli_fetch_array($query)) {
                    echo "<div class='border-b border-gray-200 dark:border-gray-600 pb-4'>";
                    echo "<h3 class='text-lg font-semibold text-blue-700 dark:text-blue-400 mb-2'>" . htmlspecialchars($data['nama_artikel']) . "</h3>";
                    echo "<p class='text-justify'>" . nl2br(htmlspecialchars($data['isi_artikel'])) . "</p>";
                    echo "</div>";
                }
                ?>
            </div>
        </section>

        <!-- Sidebar -->
        <aside class="bg-white dark:bg-gray-800 p-6 rounded shadow">
            <h2 class="text-lg font-bold mb-4 border-b border-gray-300 dark:border-gray-600 pb-2">Daftar Artikel</h2>
            <ul class="space-y-2 list-disc list-inside text-gray-700 dark:text-gray-200">
                <?php
                $sql = "SELECT * FROM tbl_artikel ORDER BY id_artikel DESC";
                $query = mysqli_query($db, $sql);
                while ($data = mysqli_fetch_array($query)) {
                    echo "<li>" . htmlspecialchars($data['nama_artikel']) . "</li>";
                }
                ?>
            </ul>
        </aside>
    </main>

    <!-- Footer -->
    <footer class="bg-blue-800 dark:bg-gray-800 text-white text-center py-4 mt-10 shadow-inner">
        &copy; <?php echo date('Y'); ?> | Created by Irfha Najla Qisti Asfia`u Romadlon
    </footer>

</body>

</html>