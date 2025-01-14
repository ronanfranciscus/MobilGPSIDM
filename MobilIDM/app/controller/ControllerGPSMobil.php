<?php

namespace app\controller {

    use app\model\Mobil;

    class controllermobil
    {
        private $mobil,$kdmobil,$nopol,$user;
        function __construct(Mobil $mobil)
        {
            $this->mobil = $mobil;
        }

        function showall()
        {
            $cars = $this->mobil->showall();

            if (!empty($cars)) {
                foreach ($cars as $car) {
                    echo "Kode mobil : " . $car['gmi_kodemobil'] . " || " . "Nomor Polisi : " . $car['gmi_nopolisi'] . " || " . "User pembuat : " . $car['gmi_create_by'] . PHP_EOL;
                }
            } else {
                echo "Tidak ada yang ditampilkan" . PHP_EOL;
            }
        }

        function add(string $kdmobil, string $nopol, string $user){

            $this->mobil->addmobil($kdmobil,$nopol,$user);
            echo "Kode mobil : $kdmobil dengan nomor polisi $nopol berhasil diinsert".PHP_EOL;
        }

        function remove(string $kdmobil){
            $this->mobil->removemobil($kdmobil);
            echo "Kode mobil : $kdmobil berhasil terhapus".PHP_EOL;
        }

        function find(string $kdmobil){
            $cars=$this->mobil->showmobil($kdmobil);
            if ($cars) {  // Check if the result is not false
                echo "Kode mobil : " . $cars['gmi_kodemobil'] . " || " .
                     "Nomor Polisi : " . $cars['gmi_nopolisi'] . " || " .
                     "User pembuat : " . $cars['gmi_create_by'] . PHP_EOL;
            } else {
                echo "engga ada data" . PHP_EOL;
            }
        }
    }
}
