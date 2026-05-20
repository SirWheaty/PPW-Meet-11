<?php
/**
 * Tugas Pemrograman PHP
 * 1. Profil Diri dalam Tabel HTML dengan Variabel PHP
 * 2. Fungsi Hitung IMT (Indeks Massa Tubuh)
 * 3. Informasi Bulan Sekarang & Sisa Hari dalam Bulan Ini
 */

// ==========================================
// Bagian 1: Data Profil Diri (Variabel PHP)
// ==========================================
$nama = "Arya Setiya";
$nim = "25/524857/SV/26529";
$prodi = "Teknik Informatika";
$asal_kota = "Semarang";


// ==========================================
// Bagian 2: Fungsi Hitung IMT
// ==========================================
function hitungIMT($berat_kg, $tinggi_cm) {
    // Mengubah tinggi dari cm ke meter
    $tinggi_m = $tinggi_cm / 100;
    
    // Rumus IMT = Berat (kg) / (Tinggi (m) * Tinggi (m))
    if ($tinggi_m > 0) {
        $imt = $berat_kg / ($tinggi_m * $tinggi_m);
    } else {
        return ['nilai' => 0, 'kategori' => 'Data tidak valid'];
    }
    
    // Menentukan kategori berdasarkan standar umum/Kemenkes RI
    if ($imt < 18.5) {
        $kategori = 'Kurus';
        $kelas_css = 'status-kurus';
    } elseif ($imt >= 18.5 && $imt < 25.0) {
        $kategori = 'Normal';
        $kelas_css = 'status-normal';
    } elseif ($imt >= 25.0 && $imt < 27.0) {
        $kategori = 'Gemuk';
        $kelas_css = 'status-gemuk';
    } else {
        $kategori = 'Obesitas';
        $kelas_css = 'status-obesitas';
    }
    
    return [
        'nilai' => round($imt, 1),
        'kategori' => $kategori,
        'kelas' => $kelas_css
    ];
}

// Contoh data uji untuk IMT
$berat_badan = 70; // dalam kg
$tinggi_badan = 172; // dalam cm
$hasil_imt = hitungIMT($berat_badan, $tinggi_badan);


// ==========================================
// Bagian 3: Waktu dan Tanggal (Fungsi date)
// ==========================================
// Mengatur timezone ke Asia/Jakarta agar akurat
date_default_timezone_set('Asia/Jakarta');

// Array nama bulan dalam bahasa Indonesia
$bulan_indonesia = [
    1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
    'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
];

$angka_bulan = (int)date('n'); // 1 sampai 12
$nama_bulan_sekarang = $bulan_indonesia[$angka_bulan];

$hari_ini = (int)date('j'); // Tanggal hari ini (1-31)
$total_hari_bulan_ini = (int)date('t'); // Jumlah hari di bulan ini (28-31)
$hari_tersisa = $total_hari_bulan_ini - $hari_ini;

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas Pemrograman PHP - Profil & Fungsi</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f7f6;
            color: #333;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
        }
        .card {
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
            padding: 25px;
            margin-bottom: 25px;
            border-left: 5px solid #2c3e50;
        }
        .card h2 {
            margin-top: 0;
            color: #2c3e50;
            border-bottom: 2px solid #ecf0f1;
            padding-bottom: 10px;
            font-size: 1.4rem;
        }
        /* Style Tabel Profil */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        table th, table td {
            padding: 12px 15px;
            text-align: left;
        }
        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        table tr {
            border-bottom: 1px solid #dee2e6;
        }
        table th {
            background-color: #34495e;
            color: white;
            width: 30%;
        }
        /* Style IMT */
        .imt-box {
            display: inline-block;
            padding: 10px 20px;
            border-radius: 4px;
            font-weight: bold;
            margin-top: 10px;
        }
        .status-kurus { background-color: #ffeaa7; color: #d63031; }
        .status-normal { background-color: #55efc4; color: #00b894; }
        .status-gemuk { background-color: #ffeaa7; color: #e17055; }
        .status-colors { display: flex; gap: 10px; margin-top: 15px; font-size: 0.9rem; }
        .status-obesitas { background-color: #ff7675; color: #d63031; }
        .badge { padding: 3px 8px; border-radius: 3px; font-weight: bold; }
        /* Style Info Waktu */
        .highlight {
            font-size: 1.2rem;
            font-weight: bold;
            color: #2980b9;
        }
        footer {
            text-align: center;
            margin-top: 40px;
            font-size: 0.9rem;
            color: #7f8c8d;
        }
    </style>
</head>
<body>

<div class="container">

    <!-- BAGIAN 1: Profil Diri -->
    <div class="card">
        <h2>1. Profil Diri</h2>
        <table>
            <tr>
                <th>Biodata</th>
                <th>Informasi</th>
            </tr>
            <tr>
                <td><strong>Nama</strong></td>
                <td><?php echo $nama; ?></td>
            </tr>
            <tr>
                <td><strong>NIM</strong></td>
                <td><?php echo $nim; ?></td>
            </tr>
            <tr>
                <td><strong>Program Studi</strong></td>
                <td><?php echo $prodi; ?></td>
            </tr>
            <tr>
                <td><strong>Asal Kota</strong></td>
                <td><?php echo $asal_kota; ?></td>
            </tr>
        </table>
    </div>

    <!-- BAGIAN 2: Hitung IMT -->
    <div class="card">
        <h2>2. Penghitung Indeks Massa Tubuh (IMT)</h2>
        <p>Dengan berat badan <strong><?php echo $berat_badan; ?> kg</strong> dan tinggi <strong><?php echo $tinggi_badan; ?> cm</strong>:</p>
        
        <div class="imt-box <?php echo $hasil_imt['kelas']; ?>">
            Nilai IMT: <?php echo $hasil_imt['nilai']; ?> — Kategori: <?php echo $hasil_imt['kategori']; ?>
        </div>

        <div class="status-colors">
            Keterangan: 
            <span class="badge status-kurus">Kurus (< 18.5)</span>
            <span class="badge status-normal">Normal (18.5 - 24.9)</span>
            <span class="badge status-gemuk">Gemuk (25.0 - 26.9)</span>
            <span class="badge status-obesitas">Obesitas (≥ 27.0)</span>
        </div>
    </div>

    <!-- BAGIAN 3: Informasi Bulan -->
    <div class="card">
        <h2>3. Informasi Bulan & Waktu</h2>
        <p>Bulan sekarang adalah bulan: <span class="highlight"><?php echo $nama_bulan_sekarang; ?></span></p>
        <p>Hari ini tanggal: <strong><?php echo $hari_ini; ?></strong> dari total <strong><?php echo $total_hari_bulan_ini; ?></strong> hari.</p>
        
        <?php if ($hari_tersisa > 0): ?>
            <p>Jumlah hari yang tersisa di bulan <?php echo $nama_bulan_sekarang; ?> ini adalah: <span class="highlight"><?php echo $hari_tersisa; ?> hari lagi</span>.</p>
        <?php else: ?>
            <p><span class="highlight">Hari ini adalah hari terakhir di bulan ini!</span></p>
        <?php endif; ?>
    </div>

    <footer>
        <p>Dibuat secara dinamis menggunakan PHP <?php echo phpversion(); ?></p>
    </footer>

</div>

</body>
</html>
