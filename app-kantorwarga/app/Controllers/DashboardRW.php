<?php

namespace App\Controllers;

use App\Controllers\CoronaAPI;
use App\Models\ModelRW;

class DashboardRW extends BaseController
{
    public function __construct()
    {
        $this->ModelRW = new ModelRW();
        $this->validation             = service('validation');
        $this->session        = service('session');
        $this->Kawal = new CoronaAPI();
    }

    public function index()
    {
        
        $tempdata = session()->getTempdata('data');
        //get info jumlah
        $tempdata['jml_warga'] = $this->ModelRW->countWarga();
        $tempdata['jml_aktif'] = $this->ModelRW->countAktif();
        $tempdata['jml_rt'] = $this->ModelRW->countRT();
        $tempdata['jml_wilayah'] = $this->ModelRW->countWilayah();
        $tempdata['pengajuan_all'] = $this->ModelRW->getPengajuan();
        $tempdata['pengajuan_acc'] = $this->ModelRW->getPengajuanAccRT();
        //info rw
        $tempdata['rw'] = $this->ModelRW->getDataRW();
        //info kawal
        $tempdata['corona'] = $this->Kawal->getData();
        /*echo "<pre>";
        print_r ($tempdata['rw']);
        echo "</pre>";*/
            
        $data = [
                'title' => 'Dashboard RW - LaporPak',
            ];
            
        echo view('layout/header', $data);
        echo view('layout/navbar_rw', $tempdata);
        echo view('dashboard/rw/dashboard', $tempdata);
        echo view('layout/footer');
            
    }

    public function data_warga()
    {
        $data['warga'] = $this->ModelRW->getAllWarga();
        $tempdata = session()->getTempdata('data');
        $data['title'] = 'Daftar Warga - LaporPak';

        
        /*echo "<pre>";
        print_r ($data);
        echo "</pre>";*/
        
        echo view('layout/header', $data);
        echo view('layout/navbar_rw',$tempdata);
        echo view('dashboard/rw/data_warga', $data);
        echo view('layout/footer');
            
    }
    
    public function data_rt()
    {
        $data['rt'] = $this->ModelRW->getAllRT();
        $tempdata = session()->getTempdata('data');
        $data['title'] = 'Daftar Rukun Tetangga - LaporPak';


        /*echo "<pre>";
        print_r ($data);
        echo "</pre>";*/

        echo view('layout/header', $data);
        echo view('layout/navbar_rw', $tempdata);
        echo view('dashboard/rw/data_rt', $data);
        echo view('layout/footer');
    }

    public function data_wilayah()
    {
        $data['wilayah'] = $this->ModelRW->getAllWilayah();
        $tempdata = session()->getTempdata('data');
        $data['title'] = 'Informasi Wilayah - LaporPak';

        
        /*echo "<pre>";
        print_r ($data['wilayah']);
        echo "</pre>";*/
        
        echo view('layout/header', $data);
        echo view('layout/navbar_rw', $tempdata);
        echo view('dashboard/rw/data_wilayah', $data);
        echo view('layout/footer');
    }

    public function pengajuan_surat()
    {
        $tempdata = session()->getTempdata('data');
        $data['title'] = 'Daftar Pengajuan - LaporPak';
    
        $data['surat'] = $this->ModelRW->getAllSurat();
      
        
        echo view('layout/header', $data);
        echo view('layout/navbar_rw', $tempdata);
        echo view('dashboard/rw/data_administrasi', $data);
        echo view('layout/footer');
         
    }

}


?>