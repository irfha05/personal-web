<?php
include "koneksi.php";

if (isset($_POST['submit_komentar'])) {
    $id_artikel = $_POST['id_artikel'];
    $nama_komentator = mysqli_real_escape_string($db, $_POST['nama_komentator']);
    $isi_komentar = mysqli_real_escape_string($db, $_POST['isi_komentar']);
    $tanggal_komentar = date('Y-m-d H:i:s');

    $sql = "INSERT INTO tbl_komentar (id_artikel, nama_komentator, isi_komentar, tanggal_komentar) 
            VALUES ('$id_artikel', '$nama_komentator', '$isi_komentar', '$tanggal_komentar')";
    mysqli_query($db, $sql);
    header("Location: ".$_SERVER['PHP_SELF']."?search=".urlencode($_GET['search'] ?? '')."&page=".($_GET['page'] ?? 1));
    exit;
}

// Pencarian dan pagination
$search = isset($_GET['search']) ? mysqli_real_escape_string($db, $_GET['search']) : '';
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 3;
$offset = ($page - 1) * $limit;

// Hitung total data
$count_sql = "SELECT COUNT(*) as total FROM tbl_artikel WHERE nama_artikel LIKE '%$search%'";
$count_result = mysqli_query($db, $count_sql);
$total_rows = mysqli_fetch_assoc($count_result)['total'];
$total_pages = ceil($total_rows / $limit);

// Ambil artikel
$sql = "SELECT * FROM tbl_artikel WHERE nama_artikel LIKE '%$search%' ORDER BY id_artikel DESC LIMIT $limit OFFSET $offset";
$query = mysqli_query($db, $sql);
?>

<!DOCTYPE html>
<html lang="en" class="transition-colors duration-300">
<head>
    <meta charset="UTF-8">
    <title>Personal Web | Home</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = { darkMode: 'class' };
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

    <header class="relative bg-blue-900 dark:bg-gray-800 text-white text-center p-6 text-2xl font-bold shadow">
        Personal Web | Irfha Najla Qisti Asfia`u Romadlon
        <button onclick="toggleDarkMode()" class="absolute right-6 top-6 text-white hover:scale-110 transition" title="Toggle Theme">
            <svg id="icon-moon" xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 fill-current" viewBox="0 0 24 24">
                <path d="M21 12.79A9 9 0 0111.21 3a7 7 0 1010 9.79z" />
            </svg>
            <svg id="icon-sun" xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 fill-current hidden" viewBox="0 0 24 24">
                <path d="M12 4.75a.75.75 0 01.75-.75h.5a.75.75 0 010 1.5h-.5A.75.75 0 0112 4.75zM12 18.25a.75.75 0 01.75.75h-.5a.75.75 0 010-1.5h.5a.75.75 0 01-.75.75zM4.75 12a.75.75 0 01-.75.75v-.5a.75.75 0 011.5 0v.5A.75.75 0 014.75 12zM18.25 12a.75.75 0 01.75.75v-.5a.75.75 0 01-1.5 0v.5a.75.75 0 01.75-.75zM7.03 7.03a.75.75 0 01.53-.22.75.75 0 01.53 1.28l-.35.35a.75.75 0 11-1.06-1.06l.35-.35zM16.97 16.97a.75.75 0 01.53-.22.75.75 0 01.53 1.28l-.35.35a.75.75 0 11-1.06-1.06l.35-.35zM16.97 7.03a.75.75 0 011.06 1.06l-.35.35a.75.75 0 11-1.06-1.06l.35-.35zM7.03 16.97a.75.75 0 011.06 1.06l-.35.35a.75.75 0 11-1.06-1.06l.35-.35zM12 8a4 4 0 100 8 4 4 0 000-8z" />
            </svg>
        </button>
    </header>

    <nav class="bg-blue-700 dark:bg-gray-700 text-white py-3 shadow">
        <ul class="flex justify-center space-x-8 font-medium text-lg">
            <li><a href="index.php" class="hover:underline">Artikel</a></li>
            <li><a href="gallery.php" class="hover:underline">Gallery</a></li>
            <li><a href="about.php" class="hover:underline">About</a></li>
            <li><a href="admin/login.php" class="hover:underline">Login</a></li>
        </ul>
    </nav>

    <main class="max-w-6xl mx-auto p-6 grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
        <!-- Artikel Utama -->
        <section class="md:col-span-2 bg-white dark:bg-gray-800 p-6 rounded shadow">
            <h2 class="text-xl font-bold mb-4 border-b border-gray-300 dark:border-gray-600 pb-2">Artikel Terbaru</h2>
            <!-- Search Form -->
            <form method="GET" class="mb-6 flex gap-2">
                <input type="text" name="search" placeholder="Cari artikel..." value="<?php echo htmlspecialchars($search); ?>" class="w-full px-4 py-2 rounded border dark:bg-gray-700 dark:text-white" />
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Cari</button>
            </form>

            <div class="space-y-6">
                <?php while ($data = mysqli_fetch_array($query)): ?>
                <div class='border-b border-gray-200 dark:border-gray-600 pb-6'>
                    <!-- Tag -->
                    <div class='flex flex-wrap items-center gap-2 mb-3'>
                        <?php foreach (explode(',', $data['tag_artikel']) as $tag): ?>
                        <span class='bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded-full dark:bg-blue-900 dark:text-blue-300'><?php echo htmlspecialchars(trim($tag)); ?></span>
                        <?php endforeach; ?>
                    </div>
                    <!-- Judul -->
                    <h3 class='text-2xl font-bold text-gray-900 dark:text-white leading-snug mb-1'><?php echo htmlspecialchars($data['nama_artikel']); ?></h3>
                    <!-- Meta -->
                    <p class='text-sm text-gray-500 dark:text-gray-400 mb-4'>
                        <span class='font-medium text-gray-800 dark:text-gray-200'><?php echo htmlspecialchars($data['nama_penulis']); ?></span> &bull;
                        <?php echo date("F j, Y", strtotime($data['tanggal_publish'])); ?> • 
                        <?php echo floor(str_word_count(strip_tags($data['isi_artikel'])) / 200 * 60); ?> minutes read
                    </p>
                    <!-- Gambar -->
                    <?php if (!empty($data['gambar_artikel'])): ?>
                        <img src='images/<?php echo htmlspecialchars($data['gambar_artikel']); ?>' class='w-full h-64 object-cover mb-4 rounded-lg shadow-sm' alt='Gambar Artikel'>
                    <?php endif; ?>
                    <!-- Isi Artikel -->
                    <p class='text-justify text-gray-800 dark:text-gray-100'><?php echo nl2br(htmlspecialchars($data['isi_artikel'])); ?></p>
                    <!-- Komentar -->
                    <div class='mt-6 p-4 bg-gray-50 dark:bg-gray-700 rounded-lg border border-gray-200 dark:border-gray-600 shadow-sm'>
                        <h4 class='text-md font-bold mb-2 text-gray-800 dark:text-white'>Komentar:</h4>
                        <?php
                        $id_artikel = $data['id_artikel'];
                        $komentar_query = mysqli_query($db, "SELECT * FROM tbl_komentar WHERE id_artikel=$id_artikel ORDER BY tanggal_komentar DESC");
                        while ($komentar = mysqli_fetch_assoc($komentar_query)):
                        ?>
                        <div class='mb-4 border-b pb-2 border-gray-300 dark:border-gray-600'>
                            <div class='flex items-start space-x-3'>
                                <img src='https://api.dicebear.com/7.x/personas/svg?seed=<?php echo urlencode($komentar['nama_komentator']); ?>' class='w-8 h-8 rounded-full'>
                                <div>
                                    <span class='font-semibold text-gray-800 dark:text-white'><?php echo htmlspecialchars($komentar['nama_komentator']); ?></span>
                                    <span class='text-xs text-gray-500 dark:text-gray-400'>(<?php echo date("d M Y", strtotime($komentar['tanggal_komentar'])); ?>)</span>
                                    <p class='text-sm text-gray-700 dark:text-gray-300 mt-1'><?php echo nl2br(htmlspecialchars($komentar['isi_komentar'])); ?></p>
                                </div>
                            </div>
                        </div>
                        <?php endwhile; ?>
                    </div>
                    <!-- Form Komentar -->
                    <div class='mt-4 p-4 bg-white dark:bg-gray-800 rounded-lg border border-gray-300 dark:border-gray-600'>
                        <form action='' method='POST' class='space-y-3'>
                            <input type='hidden' name='id_artikel' value='<?php echo $data['id_artikel']; ?>'>
                            <input type='text' name='nama_komentator' placeholder='Nama Anda' required class='w-full px-4 py-2 rounded border dark:bg-gray-700 dark:text-white'>
                            <textarea name='isi_komentar' placeholder='Tulis komentar...' required class='w-full px-4 py-2 rounded border dark:bg-gray-700 dark:text-white'></textarea>
                            <button type='submit' name='submit_komentar' class='bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded'>Kirim Komentar</button>
                        </form>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>

            <!-- Pagination -->
            <div class='flex justify-center mt-8 space-x-2'>
                <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                    <?php
                    $active = ($i == $page) ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-800 dark:bg-gray-700 dark:text-white';
                    ?>
                    <a href="?search=<?php echo urlencode($search); ?>&page=<?php echo $i; ?>" class="px-4 py-2 rounded <?php echo $active; ?>"><?php echo $i; ?></a>
                <?php endfor; ?>
            </div>
        </section>

        <!-- Sidebar -->
        <aside class="bg-white dark:bg-gray-800 p-6 rounded shadow">
            <h2 class="text-lg font-bold mb-4 border-b border-gray-300 dark:border-gray-600 pb-2">Daftar Artikel</h2>
            <ul class="space-y-2 list-disc list-inside text-gray-700 dark:text-gray-200">
                <?php
                $sidebar_query = mysqli_query($db, "SELECT * FROM tbl_artikel ORDER BY id_artikel DESC LIMIT 10");
                while ($data = mysqli_fetch_array($sidebar_query)) {
                    echo "<li><a href='artikel_detail.php?id=" . $data['id_artikel'] . "' class='text-blue-600 hover:underline'>" . htmlspecialchars($data['nama_artikel']) . "</a></li>";
                }
                ?>
            </ul>
        </aside>
    </main>

    <footer class="bg-blue-800 dark:bg-gray-800 text-white text-center py-4 mt-10 shadow-inner">
        &copy; <?php echo date('Y'); ?> | Created by Irfha Najla Qisti Asfia`u Romadlon
    </footer>
</body>
</html>
