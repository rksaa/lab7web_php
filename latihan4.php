<!DOCTYPE html>
<html lang="id"><head><meta charset="UTF-8"><title>Latihan 4</title></head><body>
<h2>Latihan 4 - Function</h2>
<?php
function hitungDiskon($harga, $persen) {
    $potongan = $harga * ($persen / 100);
    return $harga - $potongan;
}
function luasPersegiPanjang($panjang, $lebar) {
    return $panjang * $lebar;
}
function statusKelulusan($nilai) {
    return $nilai >= 60 ? "Lulus" : "Tidak Lulus";
}

$hargaAkhir = hitungDiskon(150000, 10);
echo "Harga setelah diskon: Rp" . number_format($hargaAkhir, 0, ",", ".") . "<br>";
echo "Luas persegi panjang 8 x 5: " . luasPersegiPanjang(8, 5) . "<br>";
echo "Nilai 72: " . statusKelulusan(72) . "<br>";
echo "Nilai 45: " . statusKelulusan(45);
?>
<p><a href="index.php">Kembali</a></p>
</body></html>
