<?php

namespace App\Controllers;

use App\Models\ModelWarga;
use \Mpdf\Mpdf;

class FlowdataWarga extends BaseController
{
    public function __construct()
    {
        $this->ModelWarga = new ModelWarga();
    }

    public function generate_surat()
    {
        $datas = session()->getTempdata('data');
        //init data
        $nik = $this->request->getVar('nik');
        $nama = $this->request->getVar('nama');
        $jenis = $this->request->getVar('jenis');
        $tujuan = $this->request->getVar('tujuan');
        //get rt
        $kode = $datas['kode_rt'];
        $data_rt = $this->ModelWarga->getData($kode);
        //get rw
        $data_rw = $this->ModelWarga->getRW();

        //get from table
        $jenis = $this->ModelWarga->getJenisById($jenis);
        $perumahan = $this->ModelWarga->getAllWilayah();

        var_dump($datas);
        //
        

        //get max id from administrasi
        $max = $this->ModelWarga->getIdAdministrasi();
        if ($max['id_surat'] < 1) {
            $kode = 1;
        } else {
            $kode = $max['id_surat']+1;
        }
        //add zero
        if ($max < 10) {
            $kd = '0' . $kode;
        } else {
            $kd = $kode;
        }

        
        echo "<pre>";
        var_dump($data_rt);
        echo "</pre>";

        //singkat perumahan
        $string = $perumahan['perumahan'];

        function singkat($str)
        {
            $ret = '';
            foreach (explode(' ', $str) as $word)
                $ret .= strtoupper($word[0]);
            return $ret;
        }

        $singkat = singkat($string);

        //*tahun
        $tahun = date("Y");
        $ze = 0;

        //number to roman
        $number = $data_rw['no_urut_rw'];
        function numberToRomanRepresentation($number)
        {
            $map = array('M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1);
            $returnValue = '';
            while ($number > 0) {
                foreach ($map as $roman => $int) {
                    if ($number >= $int) {
                        $number -= $int;
                        $returnValue .= $roman;
                        break;
                    }
                }
            }
            return $returnValue;
        }
        $hasil = numberToRomanRepresentation($number);

        //reverse birthdate
        $date = $data_rt['tgl_lahir'];
        function rev_date($date)
        {
            $array = explode("-", $date);
            $rev = array_reverse($array);
            $date = implode("-", $rev);
            return $date;
        }

        $rev_date = rev_date($date);

        //kota to lower


        $data = [
            'kode_jenis' => $this->request->getVar('jenis'),
            'tujuan' => $this->request->getVar('tujuan')
        ];

        $filename = $kd . $this->request->getVar('jenis') . 'rt' . $data_rt['id_rt'] . $data_rt['id_warga']. date('s').'.pdf';
        $data_admins = [

            'id_surat' => $kode,
            'id_jenis' => $this->request->getVar('jenis'),
            'id_warga' => $data_rt['id_warga'],
            'id_rt' => $data_rt['id_rt'],
            'keperluan' => strtolower($data['tujuan']),
            'file_surat' => $filename,

        ];


       $html = '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <title>' . $jenis['jenis_surat'] . '</title>
        </head>
        <style>
        .row{
  display: flex;
}
.col{
  flex: 1;
  margin: 0 1rem;
}
.square{
  background-color: red;
  flex: 1;
}

.square:after{
  content: ``;
  display: block;
  padding-bottom: 100%;
}
        </style>
        <body style="font-family: Times New Roman">
            <div class="kop-surat" style="text-align: center; font-weight: 200;">
                <h4 style="margin-bottom: -2px;">' . strtoupper($perumahan['perumahan']) . '</h4>
                <h4 style="margin-top: 8px; margin-bottom: -2px;">RT. 0' . strtoupper($data_rt['no_urut_rt']) . ' / RW. ' . $hasil . ' KELURAHAN ' . strtoupper($perumahan['kelurahan']) . '</h4>
                <h4 style="margin-top: 8px; margin-bottom: -2px;">KECAMATAN ' . strtoupper($perumahan['kecamatan']) . '</h4>
            </div>
            <hr>
            <hr style="margin-top: -10px;">
            <div class="info-surat" style="text-align: center; margin-top: -10px;">
                <h3>' . strtoupper($jenis['jenis_surat']) . '</h3>
                <hr style="width: 375px; margin-top:-8px">
                <h3 style="margin-top:-8px">NOMOR : ' . $kd . ' / ' . strtoupper($jenis['singkatan_jenis']) . ' / 0' . $data_rt['no_urut_rt'] . ' / ' . $hasil . ' / ' . $singkat . ' / ' . $tahun . '</h3>
            </div>
            <div class="isi-surat" style="text-align: justify">
                <p>&emsp; &emsp; Yang bertanda tangan dibawah ini Ketua RT. 0'. $data_rt['no_urut_rt'].' / RW. '. $hasil .' Kelurahan '. $perumahan['kelurahan'].', Kecamatan '. $perumahan['kecamatan'].', '. $perumahan['kota'].' menerangkan bahwa : </p>
            </div>
            <div class="daftar" style="margin-left:20px">
                <table style="margin-left: 20px">
                    <tr>
                        <td>1.</td>
                        <td>Nama </td>
                        <td>: </td>
                        <td>'. $data_rt['nama_lengkap'] . '</td>
                    </tr>
                    <tr>
                        <td>2.</td>
                        <td>Tempat / Tgl. Lahir &emsp; &emsp; </td>
                        <td>: </td>
                        <td>'. $data_rt['tempat'] .' / '. $rev_date . '</td>
                    </tr>
                    <tr>
                        <td>3. &nbsp;</td>
                        <td>Jenis Kelamin </td>
                        <td>: &emsp;</td>
                        <td>'. $data_rt['jenis_kelamin'] . '</td>
                    </tr>
                    <tr>
                        <td>4.</td>
                        <td>Agama </td>
                        <td>: &emsp;</td>
                        <td>' . $data_rt['agama'] . '</td>
                    </tr>
                    <tr>
                        <td>5.</td>
                        <td>Pekerjaan </td>
                        <td>: &emsp;</td>
                        <td>' . $data_rt['pekerjaan'] . '</td>
                    </tr>
                    <tr>
                        <td>6.</td>
                        <td>Status Perkawinan </td>
                        <td>: &emsp;</td>
                        <td>' . $data_rt['status_kawin'] . '</td>
                    </tr>
                    <tr>
                        <td>7.</td>
                        <td>No. KK/KTP/Passport </td>
                        <td>: &emsp;</td>
                        <td>' . $data_rt['id_warga'] . '</td>
                    </tr>
                </table>
            </div>
            <div class="isi-surat" style="text-align: justify">
                <p>&emsp; &emsp; Yang bersangkutan benar-benar telah menjadi warga '. $perumahan['perumahan']. ', selanjutnya yang bersangkutan memerlukan ' . strtoupper($jenis['jenis_surat']) . ' ini untuk '. strtoupper($data['tujuan']). '. </p>
            </div>
            <div class="isi-surat" style="text-align: justify; margin-top: -15px">
                <p>&emsp; &emsp; Demikian ' . strtoupper($jenis['jenis_surat']) . ' ini kami buat, untuk dapat dipergunakan sesuai dengan keperluannya, atas bantuan dan kerjasamanya kami ucapkan terima kasih.  </p>
            </div>
            <br>
            <div class="mengetahui" style="text-align: center; margin-bottom: 40px;">
                <p>Mengetahui,</p>
            </div>
            <div class="ttd row" style="margin-top:10px; margin-left: 80px;">
                <div class="ttdrt col" style="float: left; width: 40%; font-weight: bolder;">
                    <p style="margin-top:-5px"><b>Ketua RT. 0' . $data_rt['no_urut_rt'] .' / RW. '. $hasil . '</b></p>
                    <p style="margin-top: 100px;">('. $data_rt['ketua_rt'] .')</p>
                </div>
                <div class="ttdrw col" style="float: right; width: 40%">
                    <p style="margin-top:-24px"><b>Ketua RW. ' . $hasil . ' <br> Kel. '. $perumahan['kelurahan'] .'</br></p>
                    <p style="margin-top: 100px;">(' . $data_rw['ketua_rw'] . ')</p>
                </div>
            </div>
        </body>
        </html>
        ';

        //sent to db
        if($this->ModelWarga->insertSurat($data_admins))
        {
            echo "<script>";
            echo " alert('Pengajuan Berhasil, Silahkan Tunggu Notifikasi Selanjutnya.');
            </script>";
            $this->response->setHeader('Content-Type', 'application/pdf');
            $mpdf = new Mpdf(['format' => 'A4-P']);
            $mpdf->WriteHTML($html);
            ob_clean();
            $mpdf->Output("./administrasi/surat_warga/" . $filename, "F");
            $mpdf->Output('' . $filename . '.pdf', 'I');
        }else{
            echo "<script>";
            echo " alert('Error ?!');      
            window.location.href='" . base_url('/dashboardwarga/pengajuan_surat') . "';
            </script>";
        }
        
        //init file pdf
        
        /*
        */
    }
}


?>
<!--<ol>
    <li>Nama &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp;: &emsp; '.$data['nama'].'</li>
    <li>Tempat / Tgl. Lahir&emsp; &emsp; &emsp;: &emsp; '.$datas['tempat'].' / '. $rev_date .'</li>
    <li>Jenis Kelamin &emsp; &emsp; &emsp; &emsp; &emsp;: &emsp; '.$datas['jenis_kelamin'].'</li>
    <li>Agama &emsp; &emsp; &emsp; &emsp; &emsp;: &emsp; '.$datas['agama'].'</li>
</ol>