<?php
function formatRupiah($angka) {
    return "Rp" . number_format($angka, 0, ",", ".");
}

// 1. Rata-rata tiga komponen nilai
$tugas = 85; $uts = 78; $uas = 90;
$rataRata = ($tugas + $uts + $uas) / 3;

// 2. Pencarian nama dari array (GET)
$daftarNama = ["Alya", "Bima", "Citra", "Doni", "Eka", "Fajar"];
$q = trim($_GET["q"] ?? "");
$hasilCari = [];
if ($q !== "") {
    foreach ($daftarNama as $n) {
        if (stripos($n, $q) !== false) $hasilCari[] = $n;
    }
}

// 4. Validasi NIM: hanya angka, panjang 8-12 digit
$nimInput = ""; $nimPesan = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nimInput = trim($_POST["nim"] ?? "");
    if (!ctype_digit($nimInput)) {
        $nimPesan = "NIM hanya boleh berisi angka.";
    } elseif (strlen($nimInput) < 8 || strlen($nimInput) > 12) {
        $nimPesan = "Panjang NIM harus 8–12 digit.";
    } else {
        $nimPesan = "NIM valid: " . $nimInput;
    }
}
?>
<!DOCTYPE html>
<html lang="id"><head><meta charset="UTF-8"><title>Eksperimen Mandiri</title></head><body>
<h2>Eksperimen Mandiri</h2>

<h3>1. Nilai rata-rata</h3>
<p>Tugas <?= $tugas ?>, UTS <?= $uts ?>, UAS <?= $uas ?> → rata-rata <?= number_format($rataRata, 2) ?></p>

<h3>2. Cari nama (GET)</h3>
<form method="GET">
  <input name="q" type="text" value="<?= htmlspecialchars($q, ENT_QUOTES, "UTF-8") ?>">
  <button type="submit">Cari</button>
</form>
<?php if ($q !== ""): ?>
  <?php if ($hasilCari): ?>
    <ul><?php foreach ($hasilCari as $n): ?><li><?= htmlspecialchars($n) ?></li><?php endforeach; ?></ul>
  <?php else: ?>
    <p>Tidak ditemukan.</p>
  <?php endif; ?>
<?php endif; ?>

<h3>3. Format Rupiah</h3>
<p><?= formatRupiah(1500000) ?> | <?= formatRupiah(75000) ?></p>

<h3>4 &amp; 5. Validasi NIM dan tombol reset</h3>
<form method="POST">
  <label>NIM <input name="nim" type="text" value="<?= htmlspecialchars($nimInput, ENT_QUOTES, "UTF-8") ?>"></label>
  <button type="submit">Kirim</button>
  <button type="reset">Reset</button>
</form>
<?php if ($nimPesan !== "") echo "<p>" . htmlspecialchars($nimPesan) . "</p>"; ?>
<p><a href="index.php">Kembali</a></p>
</body></html>
