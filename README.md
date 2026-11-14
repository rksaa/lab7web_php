# Praktikum 7 – Dasar PHP dan Pemrosesan Form

Folder: `lab7_php` (letakkan di `htdocs` XAMPP, jalankan Apache, buka `http://localhost/lab7_php/`).

## Struktur File
| File | Isi |
|---|---|
| `index.php` | Latihan 1 + daftar tautan latihan |
| `latihan2.php` | Variabel, operator, percabangan |
| `latihan3.php` | Perulangan dan array |
| `latihan4.php` | Function |
| `cari.php` | Form GET |
| `latihan6.php` | Form POST |
| `latihan7.php` | Pengolahan data sederhana |
| `mini_project.php` | Formulir Data Mahasiswa |
| `eksperimen.php` | Eksperimen mandiri 1–5 |

## Latihan 1 – Menjalankan PHP
Langkah: nyalakan Apache di XAMPP, simpan `index.php` di `htdocs/lab7_php`, buka `http://localhost/lab7_php/`.
Hasil: kode PHP dijalankan server sehingga yang tampil adalah teks "PHP berhasil dijalankan" dan waktu server, bukan kode `<?php ... ?>`.

![Latihan 1](screenshots/latihan1.png)

## Latihan 2 – Variabel, Operator, Percabangan
Nilai akhir = 30% tugas + 30% UTS + 40% UAS. Dengan tugas 85, UTS 78, UAS 90 hasilnya 84,90 → predikat B. Percabangan `if-elseif-else` menentukan predikat A/B/C/D.
Pengujian: nilai diubah (mis. 100/100/100 → A, 50/50/50 → D) dan predikat ikut berubah.

![Latihan 2](screenshots/latihan2.png)

## Latihan 3 – Perulangan dan Array
Array `$mahasiswa` ditampilkan dengan `foreach` dalam daftar `<ol>`. Ditambahkan tiga nama baru (Eka, Fajar, Gita), total tujuh nama.

![Latihan 3](screenshots/latihan3.png)

## Latihan 4 – Function
`hitungDiskon()` mengembalikan harga setelah potongan (150.000 diskon 10% = Rp135.000). Ditambah `luasPersegiPanjang()` dan `statusKelulusan()` (lulus jika nilai ≥ 60). `number_format()` dipakai untuk format angka.

![Latihan 4](screenshots/latihan4.png)

## Latihan 5 – Form GET
Data dikirim lewat URL, contoh `cari.php?kata=php`. Perubahan URL terlihat di address bar. GET tidak dipakai untuk data sensitif seperti kata sandi karena datanya tampak di URL dan riwayat browser.

![Latihan 5](screenshots/latihan5.png)

## Latihan 6 – Form POST
Data dikirim di body request, tidak muncul di URL. Server memeriksa kolom kosong dan `htmlspecialchars()` mengamankan output.
Pengujian: input lengkap menampilkan data; input kosong menampilkan pesan wajib diisi; input seperti `<b>tes</b>` atau tanda kutip tampil sebagai teks biasa, bukan diproses sebagai HTML.

![Latihan 6](screenshots/latihan6.png)

## Latihan 7 – Pengolahan Data Sederhana
Subtotal = harga × jumlah. Validasi di PHP: nama tidak kosong, harga numerik dan ≥ 0, jumlah bilangan bulat ≥ 1.
Pengujian: harga desimal diterima; jumlah 0, jumlah negatif, dan data tidak sesuai menampilkan pesan error. Validasi HTML (`required`, `min`) hanya membantu pengguna, validasi PHP tetap pemeriksaan utama karena request bisa dikirim tanpa melalui form.

![Latihan 7](screenshots/latihan7.png)

## Mini Project – Formulir Data Mahasiswa
Form berisi nama, NIM, program studi, semester, dan email, dikirim dengan POST. Validasi server-side:
- Nama, NIM, dan program studi wajib diisi
- Semester bilangan bulat 1–14 (`ctype_digit`)
- Email divalidasi dengan `filter_var(..., FILTER_VALIDATE_EMAIL)`

Bagian pemrosesan ditaruh di atas file, bagian tampilan HTML di bawah. Semua pesan error ditampilkan sekaligus; jika valid, ringkasan data ditampilkan dengan `htmlspecialchars()` (fungsi `e()`). Input sebelumnya tetap terisi saat ada error.

![Mini project – error](screenshots/mini_error.png)
![Mini project – berhasil](screenshots/mini_sukses.png)

## Eksperimen Mandiri
1. Rata-rata tiga nilai = (tugas + UTS + UAS) / 3.
2. Pencarian GET pada array nama memakai `stripos()` (tidak peka huruf besar/kecil).
3. Fungsi `formatRupiah()` memakai `number_format()`.
4. Validasi NIM: hanya angka (`ctype_digit`) dengan panjang 8–12 digit (ketentuan yang saya tetapkan).
5. Tombol reset (`type="reset"`) hanya mengosongkan isi form di browser tanpa mengirim apa pun ke server. Kirim ulang (submit) mengirim request baru ke server sehingga PHP memproses data lagi. Reset tidak menghapus hasil yang sudah ditampilkan server.

![Eksperimen](screenshots/eksperimen.png)

## Kesimpulan
PHP berjalan di sisi server dan menghasilkan HTML untuk browser. Data form dapat dikirim dengan GET atau POST, dan seluruh input wajib divalidasi di server serta output diamankan dengan `htmlspecialchars()`.
