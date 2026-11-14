<!DOCTYPE html>
<html lang="id"><head><meta charset="UTF-8"><title>Latihan 3</title></head><body>
<?php
$mahasiswa = ["Alya", "Bima", "Citra", "Doni", "Eka", "Fajar", "Gita"];
echo "<h3>Daftar Mahasiswa</h3><ol>";
foreach ($mahasiswa as $nama) {
    echo "<li>" . htmlspecialchars($nama) . "</li>";
}
echo "</ol>";
?>
<p><a href="index.php">Kembali</a></p>
</body></html>
