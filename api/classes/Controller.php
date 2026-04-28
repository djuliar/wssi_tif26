<?php
require_once 'ApiService.php';

class Controller
{
    protected $apiService;

    public function __construct()
    {
        $this->apiService = new ApiService();
    }

    public function getWeather($latitude, $longitude)
    {
        try {
            $weatherData = $this->apiService->getData($latitude, $longitude);
            return $weatherData;
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

    function formatTanggalIndonesia($date) {
        // 1. Memastikan timezone diatur ke WIB
        date_default_timezone_set('Asia/Jakarta');

        // 2. Array nama hari dalam Indonesia
        $hari = [
            'Sunday'    => 'Minggu',
            'Monday'    => 'Senin',
            'Tuesday'   => 'Selasa',
            'Wednesday' => 'Rabu',
            'Thursday'  => 'Kamis',
            'Friday'    => 'Jumat',
            'Saturday'  => 'Sabtu'
        ];

        // 3. Array nama bulan dalam Indonesia
        $bulan = [
            1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];

        // 4. Konversi string ke timestamp
        $timestamp = strtotime($date);

        // 5. Ambil data yang diperlukan
        $hari_inggris = date('l', $timestamp); // Nama hari (full)
        $hari_indo    = $hari[$hari_inggris];
        $tanggal      = date('d', $timestamp); // Angka tanggal (01-31)
        $bulan_indo   = $bulan[(int)date('m', $timestamp)]; // Bulan [1-12]
        $tahun        = date('Y', $timestamp); // Tahun (4 digit)
        $waktu        = date('H:i:s', $timestamp); // Jam:Menit:Detik

        // 6. Gabungkan format: Selasa, 28 April 2026 14:00:00
        return "$hari_indo, $tanggal $bulan_indo $tahun $waktu";
    }
}