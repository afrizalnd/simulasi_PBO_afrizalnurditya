<?php
// 1. Menyertakan file koneksi dan seluruh komponen file class
require_once 'koneksi.php';
require_once 'pendaftaran.php';
require_once 'PendaftaranReguler.php';
require_once 'PendaftaranPrestasi.php';
require_once 'PendaftaranKedinasan.php';

// Inisialisasi koneksi database
$koneksiObj = new Koneksi();
$db = $koneksiObj->db;

// Instansiasi objek subclass untuk memanggil metode query spesifik (Tahap 4)
$regulerObj   = new PendaftaranReguler();
$prestasiObj  = new PendaftaranPrestasi();
$kedinasanObj = new PendaftaranKedinasan();

// Mengambil data dalam bentuk array asosiatif (Select + Where dari Tahap 4)
$dataReguler   = $regulerObj->getDaftarReguler($db);
$dataPrestasi  = $prestasiObj->getDaftarPrestasi($db);
$dataKedinasan = $kedinasanObj->getDaftarKedinasan($db);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Pendaftaran Mahasiswa Baru</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; margin: 30px; background-color: #f4f6f9; color: #333; }
        h1 { text-align: center; color: #2c3e50; margin-bottom: 40px; font-weight: 700; }
        .jalur-section { background: #fff; padding: 25px; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.04); margin-bottom: 40px; }
        .jalur-title { font-size: 22px; font-weight: bold; padding-bottom: 8px; margin-bottom: 15px; border-bottom: 3px solid #34495e; }
        
        /* Pembeda warna visual tiap kelompok jalur */
        .Reguler .jalur-title { border-color: #3498db; color: #2980b9; }
        .Prestasi .jalur-title { border-color: #2ecc71; color: #27ae60; }
        .Kedinasan .jalur-title { border-color: #e67e22; color: #d35400; }
        
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { padding: 12px 15px; text-align: left; border-bottom: 1px solid #eceff1; font-size: 14px; }
        th { background-color: #34495e; color: white; text-transform: uppercase; letter-spacing: 0.5px; }
        tr:hover { background-color: #f8f9fa; }
        .text-right { text-align: right; }
        .empty { text-align: center; color: #7f8c8d; font-style: italic; padding: 20px; }
    </style>
</head>
<body>

    <h1>Sistem Informasi Pendaftaran Mahasiswa Baru</h1>

    <div class="jalur-section Reguler">
        <div class="jalur-title">Kategori Kumpulan: Jalur Reguler</div>
        <table>
            <thead>
                <tr>
                    <th>Nama Calon</th>
                    <th>Asal Sekolah</th>
                    <th>Nilai Ujian</th>
                    <th>Biaya Dasar</th>
                    <th>Spesifikasi Info Jalur (Atribut Unik Anak)</th>
                    <th class="text-right">Total Biaya (Polimorfik)</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($dataReguler)): ?>
                    <?php foreach ($dataReguler as $row): ?>
                        <?php 
                        // Instansiasi menjadi objek konkrit di dalam loop agar aman
                        $mhs = new PendaftaranReguler($row); 
                        ?>
                        <tr>
                            <td><strong><?= htmlspecialchars($row['nama_calon']); ?></strong></td>
                            <td><?= htmlspecialchars($row['asal_sekolah']); ?></td>
                            <td><?= htmlspecialchars($row['nilai_ujian']); ?></td>
                            <td>Rp <?= number_format($row['biaya_pendaftaran_dasar'], 0, ',', '.'); ?></td>
                            
                            <td><?= $mhs->tampilkanInfoJalur(); ?></td>
                            <td class="text-right"><strong>Rp <?= number_format($mhs->hitungTotalBiaya(), 0, ',', '.'); ?></strong></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="6" class="empty">Tidak ada data pendaftaran jalur Reguler.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <div class="jalur-section Prestasi">
        <div class="jalur-title">Kategori Kumpulan: Jalur Prestasi</div>
        <table>
            <thead>
                <tr>
                    <th>Nama Calon</th>
                    <th>Asal Sekolah</th>
                    <th>Nilai Ujian</th>
                    <th>Biaya Dasar</th>
                    <th>Spesifikasi Info Jalur (Atribut Unik Anak)</th>
                    <th class="text-right">Total Biaya (Polimorfik)</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($dataPrestasi)): ?>
                    <?php foreach ($dataPrestasi as $row): ?>
                        <?php 
                        $mhs = new PendaftaranPrestasi($row); 
                        ?>
                        <tr>
                            <td><strong><?= htmlspecialchars($row['nama_calon']); ?></strong></td>
                            <td><?= htmlspecialchars($row['asal_sekolah']); ?></td>
                            <td><?= htmlspecialchars($row['nilai_ujian']); ?></td>
                            <td>Rp <?= number_format($row['biaya_pendaftaran_dasar'], 0, ',', '.'); ?></td>
                            
                            <td><?= $mhs->tampilkanInfoJalur(); ?></td>
                            <td class="text-right"><strong>Rp <?= number_format($mhs->hitungTotalBiaya(), 0, ',', '.'); ?></strong></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="6" class="empty">Tidak ada data pendaftaran jalur Prestasi.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <div class="jalur-section Kedinasan">
        <div class="jalur-title">Kategori Kumpulan: Jalur Kedinasan</div>
        <table>
            <thead>
                <tr>
                    <th>Nama Calon</th>
                    <th>Asal Sekolah</th>
                    <th>Nilai Ujian</th>
                    <th>Biaya Dasar</th>
                    <th>Spesifikasi Info Jalur (Atribut Unik Anak)</th>
                    <th class="text-right">Total Biaya (Polimorfik)</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($dataKedinasan)): ?>
                    <?php foreach ($dataKedinasan as $row): ?>
                        <?php 
                        $mhs = new PendaftaranKedinasan($row); 
                        ?>
                        <tr>
                            <td><strong><?= htmlspecialchars($row['nama_calon']); ?></strong></td>
                            <td><?= htmlspecialchars($row['asal_sekolah']); ?></td>
                            <td><?= htmlspecialchars($row['nilai_ujian']); ?></td>
                            <td>Rp <?= number_format($row['biaya_pendaftaran_dasar'], 0, ',', '.'); ?></td>
                            
                            <td><?= $mhs->tampilkanInfoJalur(); ?></td>
                            <td class="text-right"><strong>Rp <?= number_format($mhs->hitungTotalBiaya(), 0, ',', '.'); ?></strong></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="6" class="empty">Tidak ada data pendaftaran jalur Kedinasan.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

</body>
</html>