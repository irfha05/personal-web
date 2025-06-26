<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location:login.php');
    exit;
}
require_once("../koneksi.php");
$username = $_SESSION['username'];
$sql = "SELECT * FROM tbl_user WHERE username = '$username'";
$query = mysqli_query($db, $sql);
$hasil = mysqli_fetch_array($query);

// Hitung total artikel & gallery
$jumlah_artikel = mysqli_num_rows(mysqli_query($db, "SELECT id_artikel FROM tbl_artikel"));
$jumlah_gallery = mysqli_num_rows(mysqli_query($db, "SELECT id_gallery FROM tbl_gallery"));
?>
<!DOCTYPE html>
<html lang="en" class="transition-colors duration-300">

<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
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

<body class="bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-100 min-h-screen font-sans">

    <!-- Header -->
    <header class="relative bg-blue-900 dark:bg-gray-800 text-white text-center py-6 shadow">
        <h1 class="text-3xl font-bold">Halaman Administrator</h1>
        <button onclick="toggleDarkMode()" class="absolute right-6 top-6 text-white hover:scale-110 transition"
            title="Toggle Theme">
            <!-- Moon icon -->
            <svg id="icon-moon" xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 fill-current" viewBox="0 0 24 24">
                <path d="M21 12.79A9 9 0 0111.21 3a7 7 0 1010 9.79z" />
            </svg>
            <!-- Sun icon -->
            <svg id="icon-sun" xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 fill-current hidden"
                viewBox="0 0 24 24">
                <path
                    d="M12 4.75a.75.75 0 01.75-.75h.5a.75.75 0 010 1.5h-.5A.75.75 0 0112 4.75zM12 18.25a.75.75 0 01.75.75h-.5a.75.75 0 010-1.5h.5a.75.75 0 01-.75.75zM4.75 12a.75.75 0 01-.75.75v-.5a.75.75 0 011.5 0v.5A.75.75 0 014.75 12zM18.25 12a.75.75 0 01.75.75v-.5a.75.75 0 01-1.5 0v.5a.75.75 0 01.75-.75zM7.03 7.03a.75.75 0 01.53-.22.75.75 0 01.53 1.28l-.35.35a.75.75 0 11-1.06-1.06l.35-.35zM16.97 16.97a.75.75 0 01.53-.22.75.75 0 01.53 1.28l-.35.35a.75.75 0 11-1.06-1.06l.35-.35zM16.97 7.03a.75.75 0 011.06 1.06l-.35.35a.75.75 0 11-1.06-1.06l.35-.35zM7.03 16.97a.75.75 0 011.06 1.06l-.35.35a.75.75 0 11-1.06-1.06l.35-.35zM12 8a4 4 0 100 8 4 4 0 000-8z" />
            </svg>
        </button>
    </header>

    <!-- Container -->
    <div class="flex max-w-7xl mx-auto mt-8 px-4 gap-6">

        <!-- Sidebar -->
        <aside class="w-1/4 bg-white dark:bg-gray-800 rounded shadow p-6">
            <h2 class="text-xl font-semibold text-blue-700 dark:text-blue-400 mb-4 text-center">MENU</h2>
            <ul class="space-y-2 text-gray-700 dark:text-gray-200">
                <li><a href="beranda_admin.php" class="block hover:text-blue-500">Beranda</a></li>
                <li><a href="data_artikel.php" class="block hover:text-blue-500">Kelola Artikel</a></li>
                <li><a href="data_gallery.php" class="block hover:text-blue-500">Kelola Gallery</a></li>
                <li><a href="about.php" class="block hover:text-blue-500">About</a></li>
                <li>
                    <a href="logout.php" onclick="return confirm('Apakah anda yakin ingin keluar?');"
                        class="block text-red-600 hover:underline font-medium">Logout</a>
                </li>
            </ul>
        </aside>

        <!-- Main Content -->
        <main class="w-3/4 bg-white dark:bg-gray-800 rounded shadow p-6">
            <div class="text-lg mb-4">
                Halo, <strong class="text-blue-700 dark:text-blue-400"><?php echo $_SESSION['username']; ?></strong>!
                Apa kabar? 😊
            </div>
            <p class="text-sm text-gray-600 dark:text-gray-400">Silakan gunakan menu di samping untuk mengelola data.
            </p>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mt-6">
                <div class="bg-white dark:bg-gray-900 shadow rounded p-4 text-center border-t-4 border-blue-600">
                    <h3 class="text-xl font-semibold text-blue-700 dark:text-blue-400">Artikel</h3>
                    <p class="text-3xl font-bold text-gray-800 dark:text-white"><?php echo $jumlah_artikel; ?></p>
                </div>

                <div class="bg-white dark:bg-gray-900 shadow rounded p-4 text-center border-t-4 border-green-600">
                    <h3 class="text-xl font-semibold text-green-700 dark:text-green-400">Gallery</h3>
                    <p class="text-3xl font-bold text-gray-800 dark:text-white"><?php echo $jumlah_gallery; ?></p>
                </div>
            </div>
        </main>
    </div>

    <!-- Footer -->
    <footer class="bg-blue-800 dark:bg-gray-800 text-white text-center py-4 mt-10 shadow-inner">
        &copy; <?php echo date('Y'); ?> | Created by Irfha Najla Qisti Asfia`u Romadlon
    </footer>

</body>

</html>