<?php

namespace App\Controllers;

use App\Models\ModelRW;
use App\Controllers\CoronaAPI;
use App\Models\ModelWarga;

class DashboardWarga extends BaseController
{
    public function __construct()
    {
        $this->ModelRW = new ModelRW();
        $this->ModelWarga = new ModelWarga();
        $this->validation             = service('validation');
        $this->CoronaAPI = new CoronaAPI();
        $this->session        = service('session');
    }

    public function index()
    {
            $tempdata = session()->getTempdata('data');
            $tempdata['jml_warga'] = $this->ModelRW->countWarga();
            $tempdata['jml_aktif'] = $this->ModelRW->countAktif();
            $data = [
                    'title' => 'Dashboard Warga - LaporPak',
            ];
            $kode = $tempdata['kode_rt'];
            $tempdata['corona'] = $this->CoronaAPI->getData();
            $tempdata['rt'] = $this->ModelWarga->getData($kode);
            $tempdata['wilayah'] = $this->ModelWarga->getPerumahan();
            $tempdata['rw'] = $this->ModelWarga->getRW();

            /*echo "<pre>";
            print_r ($tempdata);
            echo "</pre>";*/
            
            echo view('layout/header', $data);
            echo view('layout/navbar_warga', $tempdata);
            echo view('dashboard/warga/dashboard', $tempdata);
            echo view('layout/footer');
            
    }

    public function surat_pengantar()
    {
        $tempdata = session()->getTempdata('data');
        $data = [
            'title' => 'Pengajuan Surat Pengantar Warga - LaporPak',
            'jenis' => $this->ModelWarga->getJenisSurat(),
        ];

        echo view('layout/header', $data);
        echo view('layout/navbar_warga', $tempdata);
        echo view('dashboard/warga/form_surat', $data);
        echo view('layout/footer');
    }

    public function data_wilayah()
    {
        $data['wilayah'] = $this->ModelWarga->getAllWilayah();
        $tempdata = session()->getTempdata('data');
        $data['title'] = 'Informasi Wilayah - LaporPak';


        /*echo "<pre>";
        print_r ($data['wilayah']);
        echo "</pre>";*/

        echo view('layout/header', $data);
        echo view('layout/navbar_warga', $tempdata);
        echo view('dashboard/rw/data_wilayah', $data);
        echo view('layout/footer');
    }

    public function status_pengajuan()
    {
        $tempdata = session()->getTempdata('data');
        $data['title'] = 'Status Pengajuan - LaporPak';

        
        
        

        $kode = $tempdata['nik'];
        $data['surat'] = $this->ModelWarga->getAdministrasi($kode);

        /*echo "<pre>";
        print_r($data);
        echo "</pre>";*/

        echo view('layout/header', $data);
        echo view('layout/navbar_warga', $tempdata);
        echo view('dashboard/warga/data_administrasi', $data);
        echo view('layout/footer');
    }

    /*public function data_warga()
    {
        $data['warga'] = $this->ModelRW->getAllWarga();
        $tempdata = session()->getTempdata('data');
        $data['title'] = 'Daftar Warga - LaporPak';


        /*echo "<pre>";
        print_r ($data);
        echo "</pre>";*/

        /*echo view('layout/header', $data);
        echo view('layout/navbar', $tempdata);
        echo view('dashboard/rw/data_warga', $data);
        echo view('layout/footer');
    }*/

}


?>