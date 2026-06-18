<?php

// Mendefinisikan abstract class Pendaftaran
abstract class Pendaftaran {
    // Properti terenkapsulasi (protected) sesuai kolom database di Tahap 1
    protected $id_pendaftaran;
    protected $nama_calon;
    protected $asal_sekolah;
    protected $nilai_ujian;
    protected $biayaPendaftaranDasar;

    // Constructor untuk memetakan/mapping data langsung dari kolom database
    public function __construct($data) {
        $this->id_pendaftaran         = $data['id_pendaftaran'] ?? null;
        $this->nama_calon             = $data['nama_calon'] ?? '';
        $this->asal_sekolah           = $data['asal_sekolah'] ?? '';
        $this->nilai_ujian             = $data['nilai_ujian'] ?? 0.0;
        // Memetakan dari kolom database 'biaya_pendaftaran_dasar' ke properti camelCase
        $this->biayaPendaftaranDasar  = $data['biaya_pendaftaran_dasar'] ?? 0.0;
    }

    // =========================================================================
    // METODE ABSTRAK (Wajib Kosong / Tanpa Isi/Body)
    // =========================================================================
    
    // Wajib diimplementasikan kelas anak untuk menghitung total biaya pendaftaran + surcharge
    abstract public function hitungTotalBiaya();

    // Wajib diimplementasikan kelas anak untuk menampilkan spesifikasi info jalur pendaftaran
    abstract public function tampilkanInfoJalur();
}