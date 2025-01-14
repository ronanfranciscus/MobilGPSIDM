<?php
 
 namespace app\model{
    Class Mobil{
        private $pdo;

        function __construct($pdo)
        {
            $this->pdo=$pdo;
        }

       function showall(){
        $sql="SELECT*FROM GPS_MOBIL_IDM";
        $sql=$this->pdo->query($sql);
        return $sql->fetchall();
       }

       function addmobil(string $kdmobil,string $nopol,string $user){
        $sql="INSERT INTO GPS_MOBIL_IDM(gmi_kodemobil,gmi_nopolisi,gmi_create_by) VALUES(:kodemobil,:nopol,:user)";
        $sql=$this->pdo->prepare($sql);
        $sql->bindparam(':kodemobil',$kdmobil);
        $sql->bindparam(':nopol',$nopol);
        $sql->bindparam(':user',$user);
        $sql->execute([$kdmobil,$nopol,$user]);
        //echo "Sukses insert".PHP_EOL;
       }

       function removemobil(string $kdmobil){
        $sql="DELETE FROM  GPS_MOBIL_IDM WHERE gmi_kodemobil=:kodemobil";
        $sql=$this->pdo->prepare($sql);
        $sql->bindparam(':kodemobil',$kdmobil);
        $sql->execute([$kdmobil]);
        //echo "Sukses Hapus".PHP_EOL;
       }

       function showmobil(string $kdmobil){
        
        $sql = "SELECT * FROM GPS_MOBIL_IDM WHERE gmi_kodemobil = :kodemobil";
        $sql = $this->pdo->prepare($sql);
        $sql->execute([':kodemobil' => $kdmobil]);
        return $sql->fetch();
       }
    }
 }