<?php

namespace App\Controllers;
use App\Models\ModelAuth;


class Auth extends BaseController
{
    public function __construct()
    {
        $this->ModelAuth = new ModelAuth();
        $this->validation             = service('validation');
        $this->session        = service('session');
    }
    public function login_proses()
    {

        $data    = [
            'username'        => $this->request->getPost('username'),
            'password'    => $this->request->getPost('password'),
        ];
        
        if ($data) {
            $result = $this->ModelAuth->userLogin($data);
            
            if ($result) {
                
                $id = $result->nik;
                $query = $this->ModelAuth->getDataUser($id);
                $data = [
                    'is_login' => true,
                    'id' => $query['id_user'],
                    'nik' => $query['nik'],
                    'role' => $query['role'],
                    'status_aktif' => $query['isActive'],
                    'no_kk' => $query['no_kk'],
                    'nama_lengkap' => $query['nama_lengkap'],
                    'tempat' => $query['tempat'],
                    'tgl_lahir' => $query['tgl_lahir'],
                    'jenis_kelamin' => $query['jenis_kelamin'],
                    'goldar' => $query['goldar'],
                    'kode_rt' => $query['kode_rt'],
                    'blok_rumah' => $query['blok_rumah'],
                    'no_telp' => $query['no_telp'],
                    'pekerjaan' => $query['pekerjaan'],
                    'agama' => $query['agama'],
                    'status_kawin' => $query['status_kawin'],
                    
                ];
                
                if($result->role == 'RW' && $data['status_aktif'] == 1){
                    $this->session->set($data);
                    return redirect()->to('dashboardrw', session()->setTempdata('data', $data, 14400));
                    
                }elseif($result->role == 'RT' && $data['status_aktif'] == 1){
                    $this->session->set($data);
                    return redirect()->to('dashboardrt', session()->setTempdata('data', $data, 14400));
                }elseif($result->role == 'Warga' && $data['status_aktif'] == 1){
                    $this->session->set($data);
                    return redirect()->to('dashboardwarga', session()->setTempdata('data', $data, 14400));
                }else{
                    echo "<script>";
                    echo " alert('Akun Anda Belum Aktif ?!');      
                    window.location.href='" . base_url('/login') . "';
                    </script>";
                }
                

            } else {
                echo "<script>";
                echo " alert('Username/Password Salah !!');      
                window.location.href='" . base_url('/login') . "';
                </script>";
            }
        } else {
            $error = $this->validation->getErrors();
            $this->session->setFlashdata('error', $error);
            return redirect()->to('/login');
        }

    }


    public function logout()
    {
        unset($_SESSION['data']);
        unset($_SESSION['tempdata']);
        $this->session->destroy();
        return redirect('login');
    }
}


?>