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
    header("Location: ".$_SERVER['PHP_SELF']); // Refresh agar tidak double submit
    exit;
}

if (!isset($_GET['id'])) {
    echo "Artikel tidak ditemukan.";
    exit;
}

$id_artikel = (int) $_GET['id'];
$sql = "SELECT * FROM tbl_artikel WHERE id_artikel = $id_artikel";
$result = mysqli_query($db, $sql);

if (mysqli_num_rows($result) == 0) {
    echo "Artikel tidak ditemukan.";
    exit;
}

$data = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo htmlspecialchars($data['nama_artikel']); ?> - Detail Artikel</title>
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

  <!-- Header -->
  <header class="relative bg-blue-900 dark:bg-gray-800 text-white text-center p-6 text-2xl font-bold shadow">
    Detail Artikel | Irfha Najla Qisti Asfia`u Romadlon
    <button onclick="toggleDarkMode()" class="absolute right-6 top-6 text-white hover:scale-110 transition" title="Toggle Theme">
      <svg id="icon-moon" xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 fill-current" viewBox="0 0 24 24">
        <path d="M21 12.79A9 9 0 0111.21 3a7 7 0 1010 9.79z" />
      </svg>
      <svg id="icon-sun" xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 fill-current hidden" viewBox="0 0 24 24">
        <path d="M12 4.75a.75.75 0 01.75-.75h.5a.75.75 0 010 1.5h-.5A.75.75 0 0112 4.75zM12 18.25a.75.75 0 01.75.75h-.5a.75.75 0 010-1.5h.5a.75.75 0 01-.75.75zM4.75 12a.75.75 0 01-.75.75v-.5a.75.75 0 011.5 0v.5A.75.75 0 014.75 12zM18.25 12a.75.75 0 01.75.75v-.5a.75.75 0 01-1.5 0v.5a.75.75 0 01.75-.75zM7.03 7.03a.75.75 0 01.53-.22.75.75 0 01.53 1.28l-.35.35a.75.75 0 11-1.06-1.06l.35-.35zM16.97 16.97a.75.75 0 01.53-.22.75.75 0 01.53 1.28l-.35.35a.75.75 0 11-1.06-1.06l.35-.35zM16.97 7.03a.75.75 0 011.06 1.06l-.35.35a.75.75 0 11-1.06-1.06l.35-.35zM7.03 16.97a.75.75 0 011.06 1.06l-.35.35a.75.75 0 11-1.06-1.06l.35-.35zM12 8a4 4 0 100 8 4 4 0 000-8z" />
      </svg>
    </button>
  </header>

  <!-- Main content -->
  <main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <article class="bg-white dark:bg-gray-800 p-6 sm:p-8 rounded shadow">
      <h1 class="text-2xl sm:text-3xl font-bold mb-4"><?php echo htmlspecialchars($data['nama_artikel']); ?></h1>
      <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">
        Penulis: <strong><?php echo htmlspecialchars($data['nama_penulis']); ?></strong> | 
        Tanggal: <?php echo date('d M Y', strtotime($data['tanggal_publish'])); ?>
      </p>

      <?php if (!empty($data['gambar_artikel'])): ?>
        <img src="images/<?php echo htmlspecialchars($data['gambar_artikel']); ?>" alt="Gambar Artikel" class="w-full h-auto max-h-96 object-cover rounded-lg mb-6">
      <?php endif; ?>

      <!-- Tag -->
      <div class="mb-6 flex flex-wrap gap-2">
        <?php foreach (explode(',', $data['tag_artikel']) as $tag): ?>
          <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded text-xs dark:bg-blue-900 dark:text-blue-300"><?php echo htmlspecialchars(trim($tag)); ?></span>
        <?php endforeach; ?>
      </div>

      <!-- Isi Artikel -->
      <div class="prose prose-sm sm:prose lg:prose-lg dark:prose-invert max-w-none">
        <?php echo nl2br(htmlspecialchars($data['isi_artikel'])); ?>
      </div>

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

      <div class="mt-8">
        <a href="index.php" class="text-blue-600 hover:underline text-sm sm:text-base">&larr; Kembali ke daftar artikel</a>
      </div>
    </article>
  </main>

  <!-- Footer -->
  <footer class="bg-blue-800 dark:bg-gray-800 text-white text-center py-4 mt-10 shadow-inner">
    &copy; <?php echo date('Y'); ?> | Created by Irfha Najla Qisti Asfia`u Romadlon
  </footer>
</body>
</html>
