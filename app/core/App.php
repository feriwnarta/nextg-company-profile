<?php

/**
 * kelas ini digunakan untuk mempermudah heki dalam memahami alur projek ini
 * kelas app ini memiliki fungsi untuk menentukan routing berdasarkan url
 * apapun yang diketik di url akan dihandle oleh kelas ini
 */
class App
{
    private $controller = 'home';
    private $method = 'index';
    private $parameter = array();

    /**
     * constructor class app digunakan untuk membuat routingan
     */
    public function __construct()
    {
        $url = $this->clearUrl();

        // ambil controller berdasarkan data url yang sudah diparse ke array menggunakan function clear url
        if (isset($url[0]) && $this->file_exist_case_insensitive('app/controllers/' . $url[0] . '.php')) {
            $this->controller = $url[0];
            unset($url[0]);
        }

        // require_once('app/controllers/' . $this->controller . '.php');
        $this->require_once_case_insensitive('app/controllers/' . $this->controller . '.php');
        // buat objek controller
        $this->controller = new $this->controller;

        // ambil method berdasarkan data url yang sudah diparse ke array menggunakan function clear url
        if (isset($url[1]) && method_exists($this->controller, $url[1])) {
            $this->method = $url[1];
            unset($url[1]);
        }

        // ambil parameter berdasarkan data url yang sudah diparse ke array menggunakan function clear url
        if (!empty($url)) {
            $this->parameter = array_values($url);
        }

        // jalan method user func untuk memanggil kelas controller dan methodnya
        call_user_func_array([$this->controller, $this->method], $this->parameter);
    }

    /**
     * function yang digunakan untuk memisahkan data yang diterima $_GET(url)
     * setiap data url displit berdasarkan controller / method / parameter
     * setiap data url displit dengan delimiter ( / )
     * function mengembalikan array [controller, method, parameter]
     */
    private function clearUrl()
    {
        if (isset($_GET['url'])) {
            $url = $_GET['url'];
            $url = rtrim($url, '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        } else {
            return array();
        }
    }


    function file_exist_case_insensitive($file_path) {
        // ambil nama file dan direktori
        $dirname = dirname($file_path);
        $filename = basename($file_path);

        // cari semua file dalam direktori
        $files = glob($dirname . '/*');

        // loop setiap file dan periksa apakah ada file dengan nama yang sama tanpa memperhatikan case sensitive
        foreach ($files as $file) {
            if (strcasecmp(basename($file), $filename) == 0) {
                return true;
            }
        }

        // jika tidak ditemukan, kembalikan false
        return false;
    }

    function require_once_case_insensitive($file_path) {
        // ambil nama file dan direktori
        $dirname = dirname($file_path);
        $filename = basename($file_path);

        // cari semua file dalam direktori
        $files = glob($dirname . '/*');

        // loop setiap file dan periksa apakah ada file dengan nama yang sama tanpa memperhatikan case sensitive
        foreach ($files as $file) {
            if (strcasecmp(basename($file), $filename) == 0) {
                require_once($file);
                return true;
            }
        }

        // jika tidak ditemukan, tampilkan pesan kesalahan
        return false;
    }

}