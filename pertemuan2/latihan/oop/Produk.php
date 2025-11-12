<?php

class Produk {

    //property
    public $judul, $penerbit, $harga;

    public function __construct($judul, $penerbit, $harga) {
        $this ->judul = $judul;
        $this ->penerbit = $penerbit;
        $this ->harga = $harga;
    }

    public function getLabel() {
        return $this->judul . "||" . $this->penerbit;
    }

}

class Komik extends Produk {
    public $jmlHalaman;

    public function __construct($judul, $penerbit, $harga, $jmlHalaman) {
        $this->jmlHalaman = $jmlHalaman;
        parent::__construct($judul, $penerbit, $harga);
    }

    public function getLabel() {
        return $this->judul;
    }

    public function getInfoKomik() {
        echo "Label:" . parent::getLabel();
        echo "<br>";
        echo "Harga:" . $this->harga;
        echo "<br>";
        echo "Jumlah Halaman:" . $this->jmlHalaman;
        echo "<br>";
    }
}

$komik1 = new Komik('Naruto', 'Gramedia', 100000, 180);
//$komik1->getInfoKomik();
echo $komik1->judul;
?>