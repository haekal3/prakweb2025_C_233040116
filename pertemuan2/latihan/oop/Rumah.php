<?php

class Rumah{
    
    //property
    public $warnaCat = "Putih";
    public $jmlKamar = 10;
    public $alamat = "Jl. setiabudhi";

    //method

    public function __construct($warnaCat, $jmlKamar) {
        $this->warnaCat = $warnaCat;
        $this->jmlKamar = $jmlKamar;
    }

    public function kunciPintu() {
        return "Rumah ini dikunci";
    }

    public function gantiWarna($warnaCat) {
        $this->warnaCat = $warnaCat;
    }
}

function pasangListrik($rumah) {
    return "Rumah ini dipasang listrik, warna rumahnya adalah" . $rumah->warnaCat;
}

$rumahAndi = new Rumah(' Ungu', 2);
echo pasangListrik($rumahAndi);

echo "<br>";
//Rumah saya
$rumahSaya = new Rumah('Biru', 10);
//$rumahSaya->gantiWarna('Biru');
echo "Rumah saya:" . $rumahSaya->warnaCat;
echo "<br>";
echo "Jumlah kamar: " . $rumahSaya->jmlKamar;
echo "<br>";
echo "<br>";

//Rumah Tetangga
$rumahTetangga = new Rumah('Hijau', 1);
//$rumahTetangga->gantiWarna('Hijau');
echo "Rumah tetangga:" . $rumahTetangga->warnaCat;
echo "<br>";
echo "Jumlah kamar: " . $rumahTetangga->jmlKamar;
echo "<br>";

?>