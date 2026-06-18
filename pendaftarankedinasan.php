<?php
// Menyertakan file abstract class induk
require_once 'pendaftaran.php';

class PendaftaranKedinasan extends Pendaftaran {
    // Properti tambahan spesifik jalur Kedinasan
    private $skIkatanDinas;
    private $instansiSponsor;

    // Constructor Subclass
    public function __construct($data = []) {
        if (!empty($data)) {
            parent::__construct($data);
            $this->skIkatanDinas   = $data['sk_ikatan_dinas'] ?? '';
            $this->instansiSponsor = $data['instansi_sponsor'] ?? '';
        }
    }

    // Mengimplementasikan metode abstrak hitungTotalBiaya (dikongkritkan dahulu)
    public function hitungTotalBiaya() {
        return $this->biayaPendaftaranDasar;
    }

    // Mengimplementasikan metode abstrak tampilkanInfoJalur (dikongkritkan dahulu)
    public function tampilkanInfoJalur() {
        return "Jalur: Kedinasan | No SK: " . $this->skIkatanDinas . " | Sponsor: " . $this->instansiSponsor;
    }

    /**
     * Metode Query Spesifik untuk mengambil data Jalur Kedinasan saja
     * @param mysqli $db Objek koneksi database MySQLi
     * @return array Kumpulan data mahasiswa jalur Kedinasan
     */
    public function getDaftarKedinasan($db) {
        $query = "SELECT id_pendaftaran, nama_calon, asal_sekolah, nilai_ujian, biaya_pendaftaran_dasar, jalur_pendaftaran, sk_ikatan_dinas, instansi_sponsor 
                  FROM tabel_pendaftaran 
                  WHERE jalur_pendaftaran = 'Kedinasan'";
        
        $result = $db->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
?>