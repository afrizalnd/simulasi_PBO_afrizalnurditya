<?php
// Menyertakan file abstract class induk
require_once 'pendaftaran.php';

class PendaftaranPrestasi extends Pendaftaran {
    // Properti tambahan spesifik jalur Prestasi
    private $jenisPrestasi;
    private $tingkatPrestasi;

    // Constructor Subclass
    public function __construct($data = []) {
        if (!empty($data)) {
            parent::__construct($data);
            $this->jenisPrestasi   = $data['jenis_prestasi'] ?? '';
            $this->tingkatPrestasi = $data['tingkat_prestasi'] ?? '';
        }
    }

    // Mengimplementasikan metode abstrak hitungTotalBiaya (dikongkritkan dahulu)
    public function hitungTotalBiaya() {
        return $this->biayaPendaftaranDasar - 50000;
    }

    // Mengimplementasikan metode abstrak tampilkanInfoJalur (dikongkritkan dahulu)
    public function tampilkanInfoJalur() {
        return "Jalur: Prestasi | Jenis: " . $this->jenisPrestasi . " | Tingkat: " . $this->tingkatPrestasi;
    }

    /**
     * Metode Query Spesifik untuk mengambil data Jalur Prestasi saja
     * @param mysqli $db Objek koneksi database MySQLi
     * @return array Kumpulan data mahasiswa jalur Prestasi
     */
    public function getDaftarPrestasi($db) {
        $query = "SELECT id_pendaftaran, nama_calon, asal_sekolah, nilai_ujian, biaya_pendaftaran_dasar, jalur_pendaftaran, jenis_prestasi, tingkat_prestasi 
                  FROM tabel_pendaftaran 
                  WHERE jalur_pendaftaran = 'Prestasi'";
        
        $result = $db->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
?>