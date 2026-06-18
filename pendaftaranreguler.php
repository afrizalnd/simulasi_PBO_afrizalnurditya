<?php
// Menyertakan file abstract class induk
require_once 'pendaftaran.php';

class PendaftaranReguler extends Pendaftaran {
    // Properti tambahan spesifik jalur Reguler (private untuk enkapsulasi)
    private $pilihanProdi;
    private $lokasiKampus;

    // Constructor Subclass
    public function __construct($data = []) {
        // Jika data dikirim (saat looping hasil query), petakan ke induk dan anak
        if (!empty($data)) {
            parent::__construct($data);
            $this->pilihanProdi = $data['pilihan_prodi'] ?? '';
            $this->lokasiKampus = $data['lokasi_kampus'] ?? '';
        }
    }

    // Mengimplementasikan metode abstrak hitungTotalBiaya (dikongkritkan dahulu)
    public function hitungTotalBiaya() {
        return $this->biayaPendaftaranDasar;
    }

    // Mengimplementasikan metode abstrak tampilkanInfoJalur (dikongkritkan dahulu)
    public function tampilkanInfoJalur() {
        return "Jalur: Reguler | Prodi: " . $this->pilihanProdi . " | Kampus: " . $this->lokasiKampus;
    }

    /**
     * Metode Query Spesifik untuk mengambil data Jalur Reguler saja
     * @param mysqli $db Objek koneksi database MySQLi
     * @return array Kumpulan data mahasiswa jalur Reguler
     */
    public function getDaftarReguler($db) {
        $query = "SELECT id_pendaftaran, nama_calon, asal_sekolah, nilai_ujian, biaya_pendaftaran_dasar, jalur_pendaftaran, pilihan_prodi, lokasi_kampus 
                  FROM tabel_pendaftaran 
                  WHERE jalur_pendaftaran = 'Reguler'";
        
        $result = $db->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
?>