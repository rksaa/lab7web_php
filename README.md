# Praktikum 7 – Dasar PHP dan Pemrosesan Form

Mata kuliah: Pemrograman Web
Nama: Riksa Siddiq Alrizki | NIM: 312510015 | Kelas: I253D

## 1. Tujuan
- Menjalankan PHP di web server lokal dan memahami bahwa PHP dieksekusi di sisi server.
- Menggunakan variabel, operator, percabangan, perulangan, array, dan function.
- Memproses data form dengan metode GET dan POST.
- Melakukan validasi input di sisi server dan mengamankan output dengan `htmlspecialchars()`.
- Membuat aplikasi sederhana Formulir Data Mahasiswa.

## 2. Perangkat
- XAMPP (Apache) sebagai web server lokal
- PHP (bawaan XAMPP)
- Text editor (mis. VS Code)
- Browser (Chrome/Edge)

## 3. Cara Menjalankan Server Lokal
1. Buka **XAMPP Control Panel**, klik **Start** pada **Apache** hingga berwarna hijau (MySQL tidak diperlukan).
2. Salin folder proyek ke `C:\xampp\htdocs\` sehingga menjadi `C:\xampp\htdocs\lab7web_php\`.
3. Buka browser dan akses `http://localhost/lab7web_php/`.
4. Pilih latihan dari daftar tautan di halaman utama.

Catatan: file PHP harus dibuka lewat `http://localhost/...`, bukan `file:///...`, agar kodenya dijalankan oleh server.

## 4. Struktur File
```
lab7web_php/
├── index.php          # Latihan 1 + daftar tautan latihan
├── latihan2.php       # Variabel, operator, percabangan
├── latihan3.php       # Perulangan dan array
├── latihan4.php       # Function
├── cari.php           # Latihan 5 – form GET
├── latihan6.php       # Latihan 6 – form POST
├── latihan7.php       # Latihan 7 – pengolahan data sederhana
├── mini_project.php   # Mini project – Formulir Data Mahasiswa
├── eksperimen.php     # Eksperimen mandiri 1–5
├── README.md
└── screenshots/       # screenshot1.png – screenshot9.png
```

## 5. Ringkasan Hasil

### Latihan 1 – Menjalankan PHP
Halaman menampilkan teks "PHP berhasil dijalankan" dan waktu server. Kode PHP tidak tampil sebagai teks, artinya sudah dieksekusi oleh Apache.

**Screenshot 1** – Output Latihan 1
![Screenshot 1](screenshots/screenshot1.png)

### Latihan 2 – Variabel, Operator, Percabangan
Nilai akhir = 30% tugas + 30% UTS + 40% UAS. Dengan tugas 85, UTS 78, UAS 90, nilai akhir 84,90 dan predikat B.

**Screenshot 2** – Output Latihan 2
![Screenshot 2](screenshots/screenshot2.png)

### Latihan 3 – Perulangan dan Array
Array mahasiswa ditampilkan dengan `foreach` dalam daftar bernomor. Ditambahkan tiga nama baru (Eka, Fajar, Gita), total tujuh nama.

**Screenshot 3** – Output Latihan 3
![Screenshot 3](screenshots/screenshot3.png)

### Latihan 4 – Function
`hitungDiskon()` menghasilkan Rp135.000 (150.000 diskon 10%). Ditambah `luasPersegiPanjang()` (8 × 5 = 40) dan `statusKelulusan()` (72 = Lulus, 45 = Tidak Lulus).

**Screenshot 4** – Output Latihan 4
![Screenshot 4](screenshots/screenshot4.png)

### Latihan 5 – Form GET
Kata kunci "bekasi" dikirim lewat URL (`cari.php?kata=bekasi`) lalu ditampilkan kembali dengan `htmlspecialchars()`. GET tidak boleh dipakai untuk data sensitif karena datanya terlihat di URL.

**Screenshot 5** – Output Latihan 5
![Screenshot 5](screenshots/screenshot5.png)

### Latihan 6 – Form POST
Data dikirim lewat body request, tidak muncul di URL. Data lengkap ditampilkan sebagai "Data diterima".

**Screenshot 6** – Latihan 6, input valid
![Screenshot 6](screenshots/screenshot6.png)

**Screenshot 7** – Latihan 6, input kosong (validasi browser)
![Screenshot 7](screenshots/screenshot7.png)

### Latihan 7 – Pengolahan Data Sederhana
Form menghitung subtotal = harga × jumlah. Contoh: barang "sabun", jumlah 7, subtotal Rp14.000.

**Screenshot 8** – Latihan 7, input valid
![Screenshot 8](screenshots/screenshot8.png)

### Mini Project – Formulir Data Mahasiswa
Form berisi nama, NIM, program studi, semester, dan email (POST). Bagian pemrosesan dipisah dari tampilan HTML. Jika valid, ringkasan data ditampilkan; jika ada error, semua pesan kesalahan ditampilkan sekaligus.

**Screenshot 9** – Mini project, input valid
![Screenshot 9](screenshots/screenshot9.png)

### Eksperimen Mandiri
Terdapat di `eksperimen.php`: (1) rata-rata tiga nilai, (2) pencarian nama dari array lewat GET, (3) function `formatRupiah()`, (4) validasi NIM hanya angka dengan panjang 8–12 digit, (5) tombol reset. Tombol reset hanya mengosongkan isian di browser tanpa mengirim apa pun ke server, sedangkan submit mengirim request baru sehingga PHP memproses data lagi.

## 6. Kasus Input Valid dan Tidak Valid

### Input valid
| No | Form | Input | Hasil |
|---|---|---|---|
| 1 | Latihan 6 | Nama: Riksa, Program Studi: Teknik Informatika | Data diterima dan ditampilkan (Screenshot 6) |
| 2 | Latihan 7 | Barang: sabun, jumlah: 7 | Subtotal Rp14.000 ditampilkan (Screenshot 8) |
| 3 | Mini project | Nama: Riksa Siddiq, NIM: 312510015, Teknik Informatika, semester 3, email valid | Ringkasan data mahasiswa ditampilkan (Screenshot 9) |

### Input tidak valid
| No | Form | Input | Hasil |
|---|---|---|---|
| 1 | Latihan 6 | Kolom Nama dikosongkan | Browser menolak pengiriman dengan pesan "Please fill out this field." (Screenshot 7) |
| 2 | Latihan 7 | Jumlah 0 atau negatif | Validasi PHP menolak dan menampilkan "Periksa kembali nama barang, harga, dan jumlah." |
| 3 | Mini project | Email tanpa format valid (mis. `riksa@`) atau semester 20 | Pesan "Format email tidak valid." dan/atau "Semester harus berupa angka 1–14." ditampilkan |

Catatan: pada kasus 1, penolakan dilakukan oleh atribut HTML `required` di browser. Validasi tersebut hanya membantu pengguna, sedangkan validasi PHP di server tetap menjadi pemeriksaan utama karena request bisa dikirim tanpa melalui form.

## 7. Kesimpulan
PHP berjalan di sisi server dan menghasilkan HTML untuk browser. Data form dapat dikirim dengan GET atau POST. Semua input harus divalidasi di server, dan output diamankan dengan `htmlspecialchars()` untuk mencegah tag HTML atau skrip dari input pengguna dijalankan.
