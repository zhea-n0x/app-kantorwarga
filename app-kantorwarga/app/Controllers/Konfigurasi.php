<?php

namespace App\Controllers;

use App\Models\ModelKonfigurasi;

class Konfigurasi extends BaseController
{
    public function __construct()
    {
        $this->ModelKonfigurasi = new ModelKonfigurasi();
    }
    //start konfig jumlah rt
    public function config_rw()
    {
        $data['title'] = 'Konfigurasi Kepengurusan RW - LaporPak';
        echo view('layout/header', $data);
        echo view('halaman_konfig/rw');
        echo view('layout/footer');
    }

    //konfigurasi kepengurusan rw
    public function config_rw2()
    {
        $data['title'] = 'Konfigurasi Kepengurusan RW - LaporPak';
        if (!session()->getTempdata('jumlah')) {
            echo "<script>";
            echo " alert('Silahkan atur jumlah RT dulu !');      
        window.location.href='" . site_url('/config_rw') . "';
        </script>";
        } else {
            echo view('layout/header', $data);
            echo view('halaman_konfig/rw2');
            echo view('layout/footer');
        }
    }

    //config rt
    //verifikasi kode
    public function verif_kode()
    {
        $data = [
            'title' => 'Konfigurasi Kepengurusan RT - LaporPak',
            'role' => 'RT'
        ];
        echo view('layout/header', $data);
        echo view('halaman_konfigrt/verifkode');
        echo view('layout/footer');
    }

    public function config_rt()
    {
        $data = [
            'title' => 'Konfigurasi Kepengurusan RT - LaporPak',
            'role' => 'RT'
        ];
        echo view('layout/header', $data);
        echo view('halaman_konfig/rt');
        echo view('layout/footer');
    }

    public function pengurus_rt()
    {
        $kode = session()->getTempdata('kode');
        $data = [
            'title' => 'Konfigurasi Kepengurusan RT - LaporPak',
            'role' => 'RT',
            'kode' => $kode
        ];
        echo view('layout/header', $data);
        echo view('halaman_konfigrt/rt');
        echo view('layout/footer');
    }

    //config warga
    //verifikasi warga
    public function verifikasi_warga()
    {
        $data = [
            'title' => 'Konfigurasi Warga - LaporPak',
            'role' => 'Warga'
        ];
        echo view('layout/header', $data);
        echo view('halaman_konfigwarga/verifkode');
        echo view('layout/footer');
    }

    //data diri
    public function config_profil()
    {
        $data = session()->getTempdata('data');
        $data['title'] = 'Konfigurasi Profil Pribadi - LaporPak';
        $data['kd'] = $this->ModelKonfigurasi->getKodeRT()->getResultArray();

        if(!isset($data['role']))
        {
            echo "<script>";
            echo " alert('Eits, mau ngapain ?!');      
            window.location.href='" . site_url('/') . "';
            </script>";
        }else
        {
            if ($data['role'] == 'RW') {
                echo view('layout/header', $data);
                echo view('halaman_daftardiri/rw',$data);
                echo view('layout/footer');
                
            } elseif ($data['role'] == 'RT') {
                echo view('layout/header', $data);
                echo view('halaman_daftardiri/rt',$data);
                echo view('layout/footer');
            } elseif($data['role'] == 'Warga') {
                
                /*echo "<pre>";
                print_r ($data);
                echo "</pre>";*/
                
                echo view('layout/header', $data);
                echo view('halaman_daftardiri/warga',$data);
                echo view('layout/footer');
            }else{
                echo "<script>";
                echo " alert('Eits, mau ngapain ?!');      
                window.location.href='" . site_url('/') . "';
                </script>";
            }
        }

        //testing copilot
        //input data warga
        

    }

}


/*$array_data = [
'role' => $data['role'],
'ketua' => $data['ketua'],
'id_wilayah' => $data['id_wilayah'],
'sekretaris' => $data['sekretaris'],
'bendahara' => $data['bendahara'],
'jumlah' => $data['jumlah'],
'id_wilayah' => $data['id_wilayah'],
'latitude' => $data['latitude'],
'longitude' => $data['longitude'],
'provinsi' => $data['provinsi'],
'kota' => $data['kota'],
'kecamatan' => $data['kecamatan'],
'kelurahan' => $data['kelurahan'],
'perumahan' => $data['perumahan']
];*/
?>

