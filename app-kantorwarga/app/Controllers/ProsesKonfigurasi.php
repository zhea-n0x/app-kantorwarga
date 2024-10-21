<?php

namespace App\Controllers;
use App\Models\ModelKonfigurasi;


class ProsesKonfigurasi extends BaseController
{
    public function __construct()
    {   
        $this->ModelKonfigurasi = new ModelKonfigurasi();
        $this->session = \Config\Services::session();
    }

    public function kode_rt()
    {
        $kode = $this->request->getVar('kode_rt');

        foreach($kode as $key=>$value){
            $data = [
                'id_rt' =>$value,
            ];
            $this->ModelKonfigurasi->insertKodeRT($data);
        }

        $jumlah = $this->request->getVar('jumlah');
        $data = $this->session->setTempdata('jumlah',$jumlah,4000);
        return redirect()->to('/config_rw2',$data);
    }

    public function konfig_rw()
    {
        $id_wilayah = rand(0000,9999);
        $sekretaris = $this->request->getVar('sekretaris');
        $bendahara = $this->request->getVar('bendahara');

        if($bendahara == '' && $sekretaris == ''){
            $sekretaris = 'Belum Ada';
            $bendahara = 'Belum Ada';
        }

        $data = [
            'role' => 'RW',
            'id_wilayah' => $id_wilayah,
            'ketua' => $this->request->getVar('ketua'),
            'sekretaris' => $sekretaris,
            'bendahara' => $bendahara,
            'jumlah' => $this->request->getVar('jml'),
            'latitude' => $this->request->getVar('lat'),
            'no_urut_rw' => $this->request->getVar('no_rw'),
            'longitude' => $this->request->getVar('long'),
            'provinsi' => $this->request->getVar('nama_provinsi'),
            'kota' => $this->request->getVar('nama_kota'),
            'kecamatan' => $this->request->getVar('nama_kecamatan'),
            'kelurahan' => $this->request->getVar('nama_kelurahan'),
            'perumahan' => $this->request->getVar('nama_perumahan'),
        ];
        
        return redirect()->to('/konfigurasi/config_profil', session()->setTempdata('data', $data, 4000));
        
    }

    public function konfig_profil()
    {
        $tempdata = session()->getTempdata('data');

        //cek role for init isactive
        if(!isset($tempdata))
        {
            echo "<script>";
            echo " alert('Eits, mau ngapain ?!');      
            window.location.href='" . base_url('/') . "';
            </script>";
        }else{
        if ($tempdata['role'] == 'RW' || $tempdata['role'] == 'RT'
        ) {
            $isactive = '1';
        } else {
            $isactive = '0';
        }
        }

        //inisiasi data
        $data_pribadi = [
            'no_kk' => $this->request->getVar('no_kk'),
            'no_telp' => $this->request->getVar('no_telp'),
            'id_warga' => $this->request->getVar('nik'),
            'nama_lengkap' => $this->request->getVar('nama'),
            'tempat' => $this->request->getVar('tempat'),
            'jenis_kelamin' => $this->request->getVar('jk'),
            'goldar' => $this->request->getVar('goldar'),
            'kode_rt' => $this->request->getVar('rt'),
            'blok_rumah' => $this->request->getVar('blok'),
            'pekerjaan' => $this->request->getVar('pekerjaan'),
            'agama' => $this->request->getVar('agama'),
            'status_kawin' => $this->request->getVar('skawin'),
            'tgl_lahir' => $this->request->getVar('tgl_lahir'),
        ];
        
        $data_user = [
            'nik' => $this->request->getVar('nik'),
            'password' => password_hash($this->request->getVar('nik'), PASSWORD_DEFAULT),
            'role' => $tempdata['role'],
            'isActive' => $isactive
        ];
        
        //proses insert data cek by role
        if($tempdata['role'] == 'RW'){
            $data_rw = [
                'id_wilayah' => $tempdata['id_wilayah'],
                'ketua_rw' => $tempdata['ketua'],
                'sekretaris_rw' => $tempdata['sekretaris'],
                'bendahara_rw' => $tempdata['bendahara'],
                'jumlah_rt' => $tempdata['jumlah'],
                'no_urut_rw' => $tempdata['no_urut_rw'],
            ];

            $data_wilayah = [
                'id_wilayah' => $tempdata['id_wilayah'],
                'lat' => $tempdata['latitude'],
                'lng' => $tempdata['longitude'],
                'provinsi' => $tempdata['provinsi'],
                'kota' => $tempdata['kota'],
                'kecamatan' => $tempdata['kecamatan'],
                'kelurahan' => $tempdata['kelurahan'],
                'perumahan' => $tempdata['perumahan'],
            ];

            $this->ModelKonfigurasi->insertWilayah($data_wilayah);
            $this->ModelKonfigurasi->insertPengurusRW($data_rw);
            $this->ModelKonfigurasi->insertDataPribadi($data_pribadi);
            $this->ModelKonfigurasi->insertUser($data_user);
            session_destroy();
            echo "<script>";
            echo " alert('Berhasil Daftar. Silahkan Login !');      
            window.location.href='" . base_url('/') . "';
            </script>";
        }elseif($tempdata['role'] == 'RT'){


            $data_rt = [
                'ketua_rt' => $tempdata['ketua'],
                'sekretaris_rt' => $tempdata['sekretaris'],
                'bendahara_rt' => $tempdata['bendahara'],
                'no_telp' => $tempdata['no_telp'],
                'no_urut_rt' => $tempdata['no_urut_rt'],
                'nik_ketua' => $data_user['nik']
            ];
            $id = $tempdata['kode'];

            $this->ModelKonfigurasi->updateRT($data_rt,$id);
            $this->ModelKonfigurasi->insertDataPribadi($data_pribadi);
            $this->ModelKonfigurasi->insertUser($data_user);
            session_destroy();
            echo "<script>";
            echo " alert('Berhasil Daftar. Silahkan Login !');      
            window.location.href='" . base_url('/') . "';
            </script>";
        }elseif($tempdata['role'] == 'Warga'){

            $this->ModelKonfigurasi->insertDataPribadi($data_pribadi);
            $this->ModelKonfigurasi->insertUser($data_user);
            session_destroy();
            echo "<script>";
            echo " alert('Berhasil Daftar. Silahkan Login !');      
            window.location.href='" . base_url('/') . "';
            </script>";
        }else{
            return 1;
        }
            
        
    }
    //verif warga
    public function verifikasi_warga()
    {
        $kode = $this->request->getVar('kode');
        $query = $this->ModelKonfigurasi->verifikasi($kode);

        $datacontainer = [
            'kode' => $kode,
            'role' => 'Warga'
        ];
        $data = $this->session->setTempdata('data', $datacontainer, 4000);
        //$data['role'] = 'Warga';

        if ($query) {

            return redirect()->to('/config_warga/daftar', $data);
        } else {
            echo "<script>";
            echo " alert('Kode tidak bisa digunakan !');
            window.location.href='" . base_url('/config_warga/verifikasi_kode') . "';
            </script>";
        }
    }

    //konfigurasi rt
    public function verifikasi()
    {
        $kode = $this->request->getVar('kode');
        $query = $this->ModelKonfigurasi->verifikasi($kode);

        $data = $this->session->setTempdata('kode', $kode, 4000);

        if($query){

            return redirect()->to('/config_rt/konfigurasi_rt',$data);

        }else{
            echo "<script>";
            echo " alert('Kode tidak bisa digunakan !');
            window.location.href='" . base_url('/config_rt/verifikasi_kode') . "';
            </script>";
        }
        
    }

    public function konfig_rt()
    {
        $sekretaris = $this->request->getVar('sekretaris');
        $bendahara = $this->request->getVar('bendahara');
        $kode = $this->request->getVar('kode');

        if($sekretaris == '' || $bendahara == '')
        {
            $sekretaris = 'Belum Ada';
            $bendahara = 'Belum Ada';
        }

        $data = [
            'role' => 'RT',
            'ketua' => $this->request->getVar('ketua'),
            'sekretaris' => $sekretaris,
            'bendahara' => $bendahara,
            'no_telp' => $this->request->getVar('no_telp'),
            'no_urut_rt' => $this->request->getVar('no_rt'),
            'kode' => $kode
        ];
        
        return redirect()->to('/konfigurasi/config_profil', session()->setTempdata('data', $data, 4000));
    }

    
}

?>