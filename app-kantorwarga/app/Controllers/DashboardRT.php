<?php

namespace App\Controllers;

use App\Models\ModelRT;
use App\Controllers\CoronaAPI;

class DashboardRT extends BaseController
{
    public function __construct()
    {
        $this->ModelRT = new ModelRT();
        $this->validation             = service('validation');
        $this->session        = service('session');
        $this->CoronaAPI = new CoronaAPI();
    }

    public function index()
    {
            $tempdata = session()->getTempdata('data');
            $kode = $tempdata['kode_rt'];
            $tempdata['jml_warga'] = $this->ModelRT->countWarga($kode);
            $tempdata['jml_aktif'] = $this->ModelRT->countAktif($kode);
            $tempdata['jml_rt'] = $this->ModelRT->countRT();
            $tempdata['jml_wilayah'] = $this->ModelRT->countWilayah();
            $tempdata['corona'] = $this->CoronaAPI->getData();
            $tempdata['wilayah'] = $this->ModelRT->getPerumahan();
            $tempdata['pengajuan_all'] = $this->ModelRT->getPengajuan($kode);
            $tempdata['pengajuan_acc'] = $this->ModelRT->getPengajuanAcc($kode);
            $tempdata['pengajuan_dec'] = $this->ModelRT->getPengajuanDec($kode);
        //info rw
            $id = $tempdata['nik'];
            $tempdata['rt'] = $this->ModelRT->getDataRT($id);
            $data = [
                    'title' => 'Dashboard RT - LaporPak',
                ];

            /*echo "<pre>";
            print_r ($tempdata);
            echo "</pre>";
                /**/ 
            echo view('layout/header', $data);
            echo view('layout/navbar_rt', $tempdata);
            echo view('dashboard/rt/dashboard', $tempdata);
            echo view('layout/footer');/**/
            
    }

    public function data_warga()
    {
        $tempdata = session()->getTempdata('data');
        $data['title'] = 'Daftar Warga - LaporPak';
        $kode = $tempdata['kode_rt'];
        $data['warga'] = $this->ModelRT->getAllWarga($kode);
        
        /*echo "<pre>";
        print_r ($tempdata);
        echo "</pre>";*/
        
        echo view('layout/header', $data);
        echo view('layout/navbar_rt',$tempdata);
        echo view('dashboard/rt/data_warga', $data);
        echo view('layout/footer');
            
    }

    public function data_wilayah()
    {
        $data['wilayah'] = $this->ModelRT->getAllWilayah();
        $tempdata = session()->getTempdata('data');
        $data['title'] = 'Informasi Wilayah - LaporPak';


        /*echo "<pre>";
        print_r ($data['wilayah']);
        echo "</pre>";*/

        echo view('layout/header', $data);
        echo view('layout/navbar_rt', $tempdata);
        echo view('dashboard/rt/data_wilayah', $data);
        echo view('layout/footer');
    }

    public function pengajuan_surat()
    {
        $tempdata = session()->getTempdata('data');
        $data['title'] = 'Daftar Pengajuan - LaporPak';
        
        $kode_rt = $tempdata['kode_rt'];
        $data['surat'] = $this->ModelRT->getAllSurat($kode_rt);
      
        
        echo view('layout/header', $data);
        echo view('layout/navbar_rt', $tempdata);
        echo view('dashboard/rt/data_administrasi', $data);
        echo view('layout/footer');/**/
    }

}


?>